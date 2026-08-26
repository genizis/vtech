<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once 'vendor/autoload.php';
require_once 'application/libraries/CommonNFe.php';

/**
 * Class ToolsNFe
 * Faz a comunicação com servidores da Sefaz e executa eventos
 */
class ToolsNFe extends CommonNFe
{

    private $_CI;

    public $xml;

    /**
     * MakeNFe constructor.
     * @param array $params
     * @throws Exception
     */
    public function __construct($params)
    {
        parent::__construct();
        $this->_CI = &get_instance();
    }

    /**
     * Método que verifica se serviço está operacional
     * Teste certificado, senha, e se serviço está em operação
     * Retona true(operacional) ou false(não disponível)
     * @return bool
     */
    public function statusSefaz()
    {
        $tools = $this->sefazTools();
        if (false === $tools) {

            return false;
        }
        $response = $tools->sefazStatus();
        $stdCl = new \NFePHP\NFe\Common\Standardize($response);
        $std = $stdCl->toStd();
        if ($std->cStat == "107") {//Serviço em operação
            return true;
        }
        return false;
    }

    /**
     * Envia para sefaz e trata resposta
     * @param string $xml
     * @return false|array
     */
    public function sendSefaz(string $xml)
    {
        try {
            $tools = $this->sefazTools();            
            $chaveNFe = $this->readXML($xml)->getChaveNFe();
            $fileNameNFe = $chaveNFe . '-nfe.xml';    
            
            //Assina NF-e
            $signedXml = $tools->signNFe($xml);
            $fh = fopen($this->assDir . $fileNameNFe, 'w+');
            fwrite($fh, $signedXml);

            //Envia para sefaz
            $toSend = file_get_contents($this->assDir . $fileNameNFe);
            $lote = substr(str_replace(',', '', number_format((float) (microtime(true) * 1000000), 0)), 0, 15);
            $sent = $tools->sefazEnviaLote([$toSend], $lote);

            //Move para pasta enviadas
            rename($this->assDir . $fileNameNFe, $this->envDir . $fileNameNFe);

            //Salva envio
            $retEnviNFe = $this->temDir . date('Ymd') . '/' . $lote . '-retEnviNFe.xml';
            $fh = fopen($retEnviNFe, 'w+');
            fwrite($fh, $sent);

            //Processa retorno do lote enviado
            $loteEnviado = file_get_contents($retEnviNFe);
            $dadosEnviados = [
                'numero_lote' => $lote
            ];
            $dadosLoteEnviado = $this->atualizaNotaFiscalRetornoLote($loteEnviado);
            return array_merge($dadosEnviados, $dadosLoteEnviado);
        } catch (Exception $exception) {
            $errors = $this->schemaErrorBeautifier($exception->getMessage());
            $this->setErrors($errors);
            return false;
        }
    }

    public function cancelaSefaz($notaFiscal, string $motivo)
    {
        try {
            $tools = $this->sefazTools();
            $response = $tools->sefazCancela($notaFiscal->chave, $motivo, $notaFiscal->protocolo);
            $stdCl = new \NFePHP\NFe\Common\Standardize($response);
            $std = $stdCl->toStd();

            if ($std->retEvento->infEvento->cStat == 135) {
                $xmlCancelado = \NFePHP\NFe\Complements::toAuthorize($tools->lastRequest, $response);

                $fileNameNFe = $notaFiscal->chave . '-nfe.xml';

                //move para pasta canceladas
                $fh = fopen($this->canDir . $fileNameNFe, 'w+');
                fwrite($fh, $xmlCancelado);

                $this->adicionaEventoNotaFiscal($notaFiscal, $std, $motivo);

                $this->_CI->faturamentoNotaFiscal->update($notaFiscal->id, ['c_stat' => 101, 'x_motivo' => 'Cancelamento de NF-e homologado']);

                return true;
            }

            //Duplicidade de evento
            if ($std->retEvento->infEvento->cStat == 573) {
                $this->adicionaEventoNotaFiscalDuplicidade($notaFiscal, $motivo);
                $this->_CI->faturamentoNotaFiscal->update($notaFiscal->id, ['c_stat' => 101, 'x_motivo' => 'Cancelamento de NF-e homologado']);
                return true;
            }
            $this->setErrors('Não foi possível cancelar a nota.');
            return false;
        } catch (\Exception $exception) {
            $this->setErrors('Não foi possível cancelar a nota(2) - '.$exception->getMessage());
            return false;
        }
    }

    public function cartaCorrecao($notaFiscal, string $correcao)
    {
        try {
            $tools = $this->sefazTools();
            $response = $tools->sefazCCe($notaFiscal->chave, $correcao, 1);
            $stdCl = new \NFePHP\NFe\Common\Standardize($response);
            $std = $stdCl->toStd();

            if ($std->retEvento->infEvento->cStat == 135 || $std->retEvento->infEvento->cStat == 136) {
                $xmlCorrecao = \NFePHP\NFe\Complements::toAuthorize($tools->lastRequest, $response);

                $fileNameNFe = $notaFiscal->chave . '-nfe.xml';

                //move para pasta carta de correção
                $fh = fopen($this->cceDir . $fileNameNFe, 'w+');
                fwrite($fh, $xmlCorrecao);

                $this->adicionaEventoNotaFiscal($notaFiscal, $std, $correcao);

                return true;
            }

            //Duplicidade de evento
            if ($std->retEvento->infEvento->cStat == 573) {
                $this->adicionaEventoNotaFiscalDuplicidade($notaFiscal, $correcao);
                return true;
            }
            $this->setErrors('Não foi possível emitir carta de correção.');
            return false;
        } catch (\Exception $exception) {
            $this->setErrors('Não foi possível emitir carta de correção(2) - '.$exception->getMessage());
            return false;
        }
    }

    public function consultaChaveChave($chave)
    {
        try {
            $tools = $this->sefazTools();
            $response = $tools->sefazConsultaChave($chave);
            $stdCl = new \NFePHP\NFe\Common\Standardize($response);
            
            return $stdCl->toStd();
        } catch (\Exception $exception) {
            $this->setErrors('Não foi possível consultar status - '.$exception->getMessage());
            return false;
        }
    }

    private function adicionaEventoNotaFiscal($notaFiscal, stdClass $std, string $descricao)
    {
        $infEvento = $std->retEvento->infEvento;
        $dhRegEvento = self::dataSefazToMySQLDateTime($infEvento->dhRegEvento);
        $dados = [
            'tb_fat_nota_fiscal_id' => $notaFiscal->id,
            'c_stat' => $infEvento->cStat,
            'x_motivo' => $infEvento->xMotivo,
            'n_prot_evento' => $infEvento->nProt,
            'dh_evento' => date('Y-m-d H:i:s'),
            'tp_evento' => $infEvento->tpEvento,
            'dh_reg_evento' => $dhRegEvento,
        ];
        $dadosEvento = [];
        //Evento CCe
        if ($infEvento->tpEvento == 110110) {
            $dadosEvento = [
                'n_seq_evento' => $infEvento->nSeqEvento,
                'x_correcao ' => $descricao,
            ];
        }
        //Evento cancelamento
        if ($infEvento->tpEvento == 110111) {
            $dadosEvento = [
                'n_seq_evento' => 1,
                'x_just' => $descricao,
            ];
        }
        $arrayData = array_merge($dados, $dadosEvento);
        $this->_CI->faturamentoNotaFiscalEvento->insert($arrayData);
    }

    private function adicionaEventoNotaFiscalDuplicidade($notaFiscal, string $descricao)
    {
        $dados = [
            'tb_fat_nota_fiscal_id' => $notaFiscal->id,
            'c_stat' => 135,
            'x_motivo' => 'Cancelamento NF-e',
            'n_prot_evento' => time(),
            'dh_evento' => date('Y-m-d H:i:s'),
            'tp_evento' => 1101111,
            'dh_reg_evento' => date('Y-m-d H:i:s'),
            'x_just' => $descricao,
            'n_seq_evento' => 1,
        ];
        $this->_CI->faturamentoNotaFiscalEvento->insert($dados);
    }

    /**
     * Carrega certificado A1
     * @return false|\NFePHP\NFe\Tools
     * @todo informar local do certificado
     */
    private function sefazTools()
    {
        try {
            $arr = [
                "atualizacao" => "2021-11-03 18:01:21",
                "tpAmb" => (int)$this->empresa->ambiente_nfe,
                "razaosocial" => $this->empresa->razao_social,
                "cnpj" => self::onlyNumbers($this->empresa->cnpj_cpf),
                "siglaUF" => $this->empresa->uf,
                "schemes" => $this->empresa->schema_nfe,
                "versao" => $this->empresa->versao_nfe,
                "tokenIBPT" => "",
                "CSC" => "",
                "CSCid" => "",
                "proxyConf" => [
                    "proxyIp" => "",
                    "proxyPort" => "",
                    "proxyUser" => "",
                    "proxyPass" => ""
                ]
            ];
            //monta o config.json
            $configJson = json_encode($arr);

            //carrega o conteudo do certificado.
            $certificado = file_get_contents("clientes/" . getDadosUsuarioLogado()['id_empresa'] . "/certificado/certificado.pfx");

            //intancia a classe tools
            $tools = new \NFePHP\NFe\Tools($configJson, \NFePHP\Common\Certificate::readPfx($certificado, $this->empresa->senha_certificado));
            $soap = new \NFePHP\Common\Soap\SoapCurl(\NFePHP\Common\Certificate::readPfx($certificado, $this->empresa->senha_certificado));

            $tools->loadSoapClass($soap);
            $tools->soap->httpVersion('1.1');
            return $tools;
        } catch (Exception $exception) {
            $this->setErrors($exception->getMessage());
            return false;
        }
    }

    /**
     * Método a ser executado logo após o envio a sefaz, faz o tratamento dos dados enviados a partir do recibo XML
     * Este recibo fica salvo na pasta temporárias
     * @param $loteEnviado
     * @return array
     */
    private function atualizaNotaFiscalRetornoLote($loteEnviado)
    {
        $loteStd = new \NFePHP\NFe\Common\Standardize($loteEnviado);
        $lote = $loteStd->toStd();
        $dadosLote = [
            'c_stat' => $lote->cStat,
            'x_motivo' => $lote->xMotivo,
            'data_recebimento' => self::dataSefazToMySQLDateTime($lote->dhRecbto),
        ];
        if ($lote->cStat == "103") {//Lote recebido com sucesso
            $dadosLote = ['recibo' => $lote->infRec->nRec];
        }
        return $dadosLote;
    }

    /**
     * Faz a consulta do recibo na Sefaz e trata conforme aprovado ou reprovado
     * @param $recibo
     * @return array
     */
    public function atualizaNotaFiscalRetornoRecibo($recibo)
    {
        $retorno = $this->consultaReciboNFe($recibo);
        $standard = new \NFePHP\NFe\Common\Standardize($retorno);
        $std = $standard->toStd();
        //104 - Lote Processado
        if ($std->cStat == "104" && isset($std->protNFe->infProt)) {
            $date = $std->dhRecbto;
            //Atualiza com dadoda consulta do recibo
            $dadosLote = [
                'c_stat' => $std->protNFe->infProt->cStat,
                'x_motivo' => $std->protNFe->infProt->xMotivo,
                'data_recebimento' => self::dataSefazToMySQLDateTime($date),
            ];


            $NFeEnviadaFileName = $std->protNFe->infProt->chNFe . '-nfe.xml';

            //processa erros > 200
            //download xml com erro
            //move para reprovadas
            if ($std->protNFe->infProt->cStat > 200) {
                rename($this->envDir . $NFeEnviadaFileName, $this->repDir . $NFeEnviadaFileName);
            }

            //Aprovada
            //Adiciona protocolo de autorização
            $dadosAprovacao = [];
            if ($std->protNFe->infProt->cStat == 100) {
                rename($this->envDir . $NFeEnviadaFileName, $this->aprDir . $NFeEnviadaFileName);
                $dadosAprovacao = [
                    'protocolo' => $std->protNFe->infProt->nProt,
                    'digest_value' => $std->protNFe->infProt->digVal,
                ];
                $xmlAprovado = file_get_contents($this->aprDir . $NFeEnviadaFileName);
                $this->adicionaProtocoloNFe($xmlAprovado, $retorno, $NFeEnviadaFileName);
            }

            return array_merge($dadosLote, $dadosAprovacao);

        }
    }

    /**
     * Consulta recibo do lote da nota enviada na sefaz e salva na pasta temporárias
     * @param $recibo
     * @return string XML da consulta
     */
    private function consultaReciboNFe($recibo)
    {
        $tools = $this->sefazTools();
        $consulta = $tools->sefazConsultaRecibo($recibo);
        $fh = fopen($this->temDir . date('Ymd') . '/' . $recibo . '-retConsReciNFe.xml', 'w+');
        fwrite($fh, $consulta);
        return $consulta;
    }

    /**
     * Caso a NF-e tenha sido aprovada (cStat = 100),
     * adiciona protocolo de autorização no XML para comprovar a autenticidade do documento
     * @param string $xmlAprovado
     * @param string $retornoConsultaRecibo
     * @param string $NFeFileName
     * @return bool
     */
    private function adicionaProtocoloNFe(string $xmlAprovado, string $retornoConsultaRecibo, string $NFeFileName)
    {
        try {
            $auth = \NFePHP\NFe\Complements::toAuthorize($xmlAprovado, $retornoConsultaRecibo);
            $fh = fopen($this->aprDir . $NFeFileName, 'w+');
            fwrite($fh, $auth);
            return true;
        } catch (Exception $exception) {
            $this->setErrors($exception->getMessage());
            return false;
        }
    }

    /**
     * Trata erros de valiçao do XML contra PL Schema e retorna array normalizado
     * @param $errors
     * @return array
     */
    private function schemaErrorBeautifier($errors)
    {
        $motivos = [];
        $val = explode("Element '{http://www.portalfiscal.inf.br/", $errors);
        $baseURL = '{http://www.portalfiscal.inf.br/nfe}';
        if ($errors != '200OK') {
            for ($i = 0; $i < count($val); $i++) {
                $a = $val[$i];
                $value = self::getStringBetween($a, "nfe}", "': ");
                $issue = self::getStringBetween($a, "': '", "' is not a valid value");
                if ($value !== '' && $issue !== '') {
                    $motivos[] = "O campo [" . $value . "] possui valor inválido '" . $issue . "' <br/>";
                }
                $issue = self::getStringBetween($a, "This element is not expected. Expected is ( $baseURL", ").");
                if ($value !== '' && $issue !== '') {
                    $motivos[] = "Antes da tag [" . $value . "] o elemento esperado é: [" . $issue . "] <br/>";
                }
                $issue = self::getStringBetween($a, "This element is not expected. Expected is one of ( $baseURL", ").");
                if ($value !== '' && $issue !== '') {
                    $motivos[] = "Antes da tag [" . $value . "] os elementos esperados são: [" .
                                 str_replace($baseURL, '', $issue) . "] <br/>";
                }
                $issue = self::getStringBetween($a, "Missing child element(s). Expected is ( $baseURL", " ).");
                if ($value !== '' && $issue !== '') {
                    $motivos[] = "Na tag [" . $value . "] - falta o elemento: [" . $issue . "] <br/>";
                }
                $issue = self::getStringBetween($a, "Missing child element(s). Expected is one of ( $baseURL", " ).");
                if ($value !== '' && $issue !== '') {
                    $motivos[] = "Na tag [" . $value . "] - faltam os elementos: [" .
                                 str_replace($baseURL, '', $issue) .
                                 "] <br/>";
                }
                //IE Ex:
                //This XML is not valid. Element '{http://www.portalfiscal.inf.br/nfe}IE': [facet 'pattern']
                // The value 'b0450087727' is not accepted by the pattern 'ISENTO|[0-9]{2,14}'
                $issue = self::getStringBetween($a, "[facet 'pattern'] The value '", "' is not accepted by the pattern");
                if ($value !== '' && $issue !== '') {
                    $motivos[] = "O valor do elemento [" . $value . "] não é válido: [" .
                                 str_replace($baseURL, '', $issue) . "] <br/>";
                }
            }
        }
        return $motivos;
    }
}
