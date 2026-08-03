<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once 'vendor/autoload.php';
require_once 'application/libraries/CommonNFe.php';

/**
 * Class MakeNFce
 * Faz a geração do XML da NF-e
 */
class MakeNFce extends CommonNFe
{
    private $_CI;
    private $makeNFce;
    private $nota;
    private $destinatario;
    private $venda;
    private $naturezaOperacao;
    private $produtos;
    private $transportador;
    private $totais = [];

    public $xml;

    /**
     * MakeNFce constructor.
     * @param array $params
     * @throws Exception
     */
    public function __construct($params)
    {     

        parent::__construct();
        $this->makeNFce = new \NFePHP\NFe\Make();
        $this->_CI = &get_instance();
        $this->_CI->load->model('FaturamentoNotaFiscal', 'faturamentoNotaFiscal');
        $this->nota = $this->_CI->faturamentoNotaFiscal->getByIdNFce($params['id']);
        $faturamentoId = $this->nota->cod_faturamento_pedido;
        $this->venda = $this->_CI->venda->getVendaCaixaPorCodigo($faturamentoId);
        $this->naturezaOperacao = $this->_CI->naturezaOperacao->getById($this->nota->tb_fis_natureza_operacao_id);
        $this->destinatario = $this->_CI->faturamentoNotaFiscal->getClienteByFaturamentoIdNFce($this->nota->cod_faturamento_pedido);
        $this->produtos = $this->_CI->faturamentoNotaFiscalItem->getNFeItensNFce($params['id']);
        $this->transportador = $this->_CI->transportador->getTransportadorById($this->venda->cod_transportador);  

         //calculo do desconto
         $this->valorDesconto = 0;
         if($this->venda->valor_desconto > 0){
             if($this->venda->tipo_desconto == 1){
                $this->valorDesconto = $this->venda->valor_desconto;
             }else{
                $this->valorDesconto = round($this->venda->sub_total * ($this->venda->valor_desconto / 100), 2);
             }
         }
              
    }

    /**
     * Informações da NF-e
     * @return \NFePHP\NFe\Make
     */
    public function getInfNFe()
    {
         // Validação Versão NFe
         if($this->empresa->versao_nfe == "" || $this->empresa->versao_nfe == null){
            throw new InvalidArgumentException("<br>(MakeNFce) Versão de NF não definida. Reveja os dados da sua empresa");                    
        }

        $stdInfNFe = new stdClass();
        $stdInfNFe->versao = $this->empresa->versao_nfe;
        $stdInfNFe->pk_nItem = null;
        $this->makeNFce->taginfNFe($stdInfNFe);

        return $this->makeNFce;
    }

    /**
     * Identificação da NF-e
     * @return \NFePHP\NFe\Make
     * @throws Exception
     */
    public function getIde()
    {
        //Validações UF
        if($this->empresa->codigo_uf == "" || $this->empresa->codigo_uf == null){
            throw new InvalidArgumentException("<br>(MakeNFce) Sem cidade definida. Reveja os dados da sua empresa");                    
        }
        if($this->naturezaOperacao == null){
            throw new InvalidArgumentException("<br>(MakeNFce) Não há uma natureza de operação definida para o uso no Frente de Caixa. Reveja os dados da sua empresa");                    
        }        

        $dhEmi = new \DateTime(date('Y-m-d H:i:s'));
        $nNF = $this->empresa->num_ultima_nfce + 1;
        $stdIde = new stdClass();
        $stdIde->cUF = $this->empresa->codigo_uf;
        $stdIde->cNF = $this->generateCNF($dhEmi->format('y'), $dhEmi->format('m'), $nNF);
        $stdIde->natOp = $this->naturezaOperacao->nome;
        $stdIde->mod = $this->empresa->modelo_nfce;
        $stdIde->serie = $this->empresa->serie_nfce;
        $stdIde->nNF = $nNF;
        $stdIde->dhEmi = $dhEmi->format('Y-m-d\TH:i:sP');
        $stdIde->dhSaiEnt = null;
        $stdIde->tpNF = $this->naturezaOperacao->operacao_fiscal;
        $stdIde->idDest = $this->nota->indentificador_destino;
        $stdIde->cMunFG = $this->empresa->codigo_municipio;
        $stdIde->tpImp = 4;
        $stdIde->tpEmis = 1;
        $stdIde->cDV = substr($this->makeNFce->getChave(), -1);
        $stdIde->tpAmb = $this->empresa->ambiente_nfe;
        $stdIde->finNFe = $this->nota->finalidade;
        $stdIde->indFinal = $this->nota->indicador_final;
        $stdIde->indPres = $this->nota->indicador_presencial;
        $stdIde->procEmi = 0;
        $stdIde->indIntermed = 0;//Operação sem intermediador
        $stdIde->verProc = '1.0.00';
        $stdIde->dhCont = null;
        $stdIde->xJust = null;

        $this->makeNFce->tagide($stdIde);
        return $this->makeNFce;
    }

    /**
     * Informações do emitente
     * @return \NFePHP\NFe\Make
     */
    public function getEmit()
    {
        $doc = self::onlyNumbers($this->empresa->cnpj_cpf);
        $stdEmit = new stdClass();
        $stdEmit->xNome = $this->empresa->razao_social;
        $stdEmit->xFant = $this->empresa->nome_empresa;
        $stdEmit->IE = $this->empresa->insc_estadual;
        $stdEmit->IEST = '';
        $stdEmit->IM = '';
        $stdEmit->CNAE = '';
        $stdEmit->CRT = $this->empresa->codigo_regime_tributario;
        $stdEmit->CNPJ = (strlen($doc) > 11) ? $doc : ''; //indicar apenas um CNPJ ou CPF
        $stdEmit->CPF = (strlen($doc) < 14) ? $doc : '';
        $this->makeNFce->tagemit($stdEmit);

        $stdEmitEndereco = $this->builderTagEndereco(
            $this->empresa->bairro,
            $this->empresa->endereco,
            $this->empresa->numero,
            $this->empresa->nome_cidade,
            $this->empresa->uf,
            $this->empresa->codigo_municipio,
            $this->empresa->cep,
            $this->empresa->complemento,
            $this->empresa->email_contato,
            $this->empresa->tel_fixo,
        );
        $this->makeNFce->tagenderEmit($stdEmitEndereco);
        return $this->makeNFce;
    }

    /**
     * Informações do destinatário
     * @return \NFePHP\NFe\Make
     */
    public function getDest()
    {
        $stdDest = new stdClass();
        $doc = self::onlyNumbers($this->venda->cnpj_cpf);        
        if (strlen($doc) > 11) {
            $stdDest->CNPJ = $doc;
        } else {
            $stdDest->CPF = $doc;
        }
        $stdDest->idEstrangeiro = '';

        if($this->destinatario != null){

            $stdDest->xNome = $this->destinatario->nome_cliente;
            //$stdDest->indIEDest = $this->destinatario->tipo_contrib_icms;
            //$stdDest->IE = $this->handleIE(self::onlyNumbersAndLetters($this->destinatario->insc_estadual));
            //$stdDest->IM = '';
            //$stdDest->ISUF = '';

            $this->makeNFce->tagdest($stdDest);  
            
            if($this->destinatario->cep != "" && $this->destinatario->cep != null){

                if($this->destinatario->endereco == "" || $this->destinatario->endereco == null){
                    throw new InvalidArgumentException("<br>(MakeNFce) Cliente sem endereço definido");
                }elseif($this->destinatario->bairro == "" || $this->destinatario->bairro == null){
                    throw new InvalidArgumentException("<br>(MakeNFce) Cliente sem bairro definido");
                }elseif($this->destinatario->codigo_municipio == 0 || $this->destinatario->codigo_municipio == null){
                    throw new InvalidArgumentException("<br>(MakeNFce) Cliente sem cidade definido");
                }

                $stdDestEndereco = $this->builderTagEndereco(
                    $this->destinatario->bairro,
                    $this->destinatario->endereco,
                    $this->destinatario->numero,
                    $this->destinatario->nome_cidade,
                    $this->destinatario->uf,
                    $this->destinatario->codigo_municipio,
                    $this->destinatario->cep,
                    $this->destinatario->complemento,                    
                    $this->destinatario->email,
                    $this->destinatario->tel_fixo,
                );
                $this->makeNFce->tagenderDest($stdDestEndereco);
            }
        }else{
            $this->makeNFce->tagdest($stdDest);  
        }
              
        return $this->makeNFce;
    }

    /**
     * Informações dos itens da nota
     */
    public function getItens()
    {
        $itemId = 0;
        $this->totais['volumes'] = 0;
        $this->totais['pesoLiquido'] = 0;
        $this->totais['pesoBruto'] = 0;  

        try{
            $valorDesc = 0;
            $valorFrete = 0;
            $valorFreteAcumulado = 0;
            $valorDescAcumulado = 0;
            foreach ($this->produtos as $key => $orderItem) {

                 // Validação de NCM
                if($orderItem->cod_ncm == "" || $orderItem->cod_ncm == null){
                    throw new InvalidArgumentException("<br>(MakeNFce) Produto (" . $orderItem->cod_produto . ") " . $orderItem->nome_produto . " não possui NCM definido");                    
                }

                $percentProduto = $orderItem->valor_fat_item / $this->venda->sub_total;

                // Valores do frete
                if($orderItem->valor_frete > 0){
                    $valorFrete = round($orderItem->valor_frete * $percentProduto, 2);
                    $valorFreteAcumulado = $valorFreteAcumulado + $valorFrete;

                    if ($key === array_key_last($this->produtos) && $valorFreteAcumulado != $orderItem->valor_frete) {
                        $valorFrete = $valorFrete + ($orderItem->valor_frete - $valorFreteAcumulado);
                    }
                }

                // Valores do Desconto
                if($this->valorDesconto > 0){
                    $valorDesc = round($this->valorDesconto * $percentProduto, 2);
                    $valorDescAcumulado = $valorDescAcumulado + $valorDesc;

                    if ($key === array_key_last($this->produtos) && $valorDescAcumulado != $this->valorDesconto) {
                        $valorDesc = $valorDesc + ($this->valorDesconto - $valorDescAcumulado);
                    }
                }

                $gtin = 'SEM GTIN';
                if($orderItem->cod_gtin != null)
                    $gtin = $orderItem->cod_gtin;

                $itemId++;
                $stdItem = new stdClass();
                $stdItem->item = $itemId;
                $stdItem->cProd = $orderItem->cod_produto;
                $stdItem->cEAN = $gtin;//CÓDIGO DE BARRAS;
                $stdItem->xProd = self::cut($orderItem->nome_produto, 120);;
                $stdItem->NCM = $orderItem->cod_ncm;
                //$stdItem->cBenef = 'SEM CBENEF';
                $stdItem->EXTIPI = null;
                $stdItem->CFOP = $orderItem->cfop;
                $stdItem->uCom = $orderItem->unidade_comercial;
                $stdItem->qCom = $orderItem->quantidade;
                $stdItem->vUnCom = $orderItem->valor_unitario;
                $stdItem->vProd = $orderItem->valor_total_produtos;
                $stdItem->cEANTrib = 'SEM GTIN';
                $stdItem->uTrib = $orderItem->unidade_tributavel;
                $stdItem->qTrib = $orderItem->quantidade_tributavel;
                $stdItem->vUnTrib = ($stdItem->vProd > 0 && $stdItem->qTrib > 0) ? ($stdItem->vProd / $stdItem->qTrib) : 0;
                //$stdItem->vFrete = self::toSefazOrNull(0);            
                $stdItem->vFrete = self::toSefazOrNull($valorFrete);
                $stdItem->vDesc = self::toSefazOrNull($valorDesc);
                $stdItem->indTot = 1;
                $stdItem->nFCI = null;

                $this->makeNFce->tagprod($stdItem);
    //
                $this->totais['volumes'] += $stdItem->qCom;
                $this->totais['pesoLiquido'] += ((float)$orderItem->peso_liq * $stdItem->qCom);
                $this->totais['pesoBruto'] += ((float)$orderItem->peso_bruto * $stdItem->qCom);
    //            if (null !== $orderItem->getTbAdmItem()) {//Apenas para produto
    //                $this->totais['cubagem'] += ((float)$item->getCubagem() * $stdItem->qCom);
    //            }
    //
                if($orderItem->cod_cest != null) {
                    $stdc = new stdClass();
                    $stdc->item = $itemId; //item da NFe
                    $stdc->CEST = $orderItem->cod_cest;

                    $this->makeNFce->tagCEST($stdc);
                }

                //----- ICMS -----//
                if ($orderItem->icms_cst) {
                    $sdtICMS = new stdClass();
                    $sdtICMS->item = $itemId; //item da NFe
                    $sdtICMS->orig = $orderItem->icms_origem;
                    $sdtICMS->CST = $orderItem->icms_cst;
                    $sdtICMS->modBC = $orderItem->icms_mod_bc;
                    $sdtICMS->vBC = $orderItem->icms_vbc;
                    $sdtICMS->pICMS = $orderItem->icms_picms;
                    $sdtICMS->vICMS = $orderItem->icms_vicms;
                    $sdtICMS->pFCP = $orderItem->icms_pfcp;
                    $sdtICMS->vFCP = $orderItem->icms_vfcp;
                    $sdtICMS->vBCFCP = $orderItem->icms_vbcfcp;
                    $sdtICMS->modBCST = $orderItem->icms_mod_bcst;
                    $sdtICMS->pMVAST = $orderItem->icms_pmvast;
                    $sdtICMS->pRedBCST = $orderItem->icms_pred_bcst;
                    $sdtICMS->vBCST = $orderItem->icms_vbcst;
                    $sdtICMS->pICMSST = $orderItem->icms_picms_st;
                    $sdtICMS->vICMSST = $orderItem->icms_vicms_st;
                    $sdtICMS->vBCFCPST = $orderItem->icms_vbcfcpst;
                    $sdtICMS->pFCPST = $orderItem->icms_pfcpst;
                    $sdtICMS->vFCPST = $orderItem->icms_vfcpst;
                    $sdtICMS->vICMSDeson = $orderItem->icms_vicmsdeson;
                    $sdtICMS->motDesICMS = $orderItem->icms_mot_des_icms;
                    $sdtICMS->pRedBC = $orderItem->icms_pred_bc;
                    $sdtICMS->vICMSOp = $orderItem->icms_vicms_op;
                    $sdtICMS->pDif = $orderItem->icms_picms_dif;
                    $sdtICMS->vICMSDif = self::toSefazOrNull($orderItem->icms_vicms_dif, 2);
                    $sdtICMS->vBCSTRet = $orderItem->icms_vbcstret;
                    $sdtICMS->pST = $orderItem->icms_pst;
                    $sdtICMS->vICMSSTRet = $orderItem->icms_vicms_stret;
                    $sdtICMS->vBCFCPSTRet = $orderItem->icms_vbcfcpst_ret;
                    $sdtICMS->pFCPSTRet = $orderItem->icms_pfcpst_ret;
                    $sdtICMS->vFCPSTRet = $orderItem->icms_vfcpst_ret;
                    $sdtICMS->pRedBCEfet = $orderItem->icms_pred_bcefet;
                    $sdtICMS->vBCEfet = $orderItem->icms_vbcefet;
                    $sdtICMS->pICMSEfet = $orderItem->icms_picms_efet;
                    $sdtICMS->vICMSEfet = $orderItem->icms_vicms_efet;
                    $sdtICMS->vICMSSubstituto = $orderItem->icms_vicms_substituto; //NT2018.005_1.10_Fevereiro de 2019
                    $this->makeNFce->tagICMS($sdtICMS);
                }

                //----- ICMS SN-----//            
                if ($orderItem->icms_csosn) {
                    $sdtICMS = new stdClass();
                    $sdtICMS->item = $itemId; //item da NFe
                    $sdtICMS->orig = $orderItem->icms_origem;
                    $sdtICMS->CSOSN = $orderItem->icms_csosn;
                    $sdtICMS->pCredSN = $orderItem->icms_pcred_sn;
                    $sdtICMS->vCredICMSSN = $orderItem->icms_vcred_icms_sn;
                    $sdtICMS->vCredICMSSN = $orderItem->icms_vcred_icms_sn;
                    $sdtICMS->modBCST = $orderItem->icms_mod_bcst;
                    $sdtICMS->pMVAST = $orderItem->icms_pmvast;
                    $sdtICMS->pRedBCST = $orderItem->icms_pred_bcst;
                    $sdtICMS->vBCST = $orderItem->icms_vbcst;
                    $sdtICMS->pICMSST = $orderItem->icms_picms_st;
                    $sdtICMS->vICMSST = $orderItem->icms_vicms_st;
                    $sdtICMS->vBCFCPST = $orderItem->icms_vbcfcpst;
                    $sdtICMS->pFCPST = $orderItem->icms_pfcpst;
                    $sdtICMS->vFCPST = $orderItem->icms_vfcpst;
                    $sdtICMS->vBCSTRet = $orderItem->icms_vbcstret;
                    $sdtICMS->pST = $orderItem->icms_pst;
                    $sdtICMS->vICMSSTRet = $orderItem->icms_vicms_stret;
                    $sdtICMS->vBCFCPSTRet = null;
                    $sdtICMS->pFCPSTRet = null;
                    $sdtICMS->vFCPSTRet = null;
                    $sdtICMS->modBC = $orderItem->icms_mod_bc;
                    $sdtICMS->vBC = $orderItem->icms_vbc;
                    $sdtICMS->pRedBC = $orderItem->icms_pred_bc;
                    $sdtICMS->pICMS = $orderItem->icms_picms;
                    $sdtICMS->vICMS = $orderItem->icms_vicms;
                    $sdtICMS->pRedBCEfet = $orderItem->icms_pred_bcefet;
                    $sdtICMS->vBCEfet = $orderItem->icms_vbcefet;
                    $sdtICMS->pICMSEfet = $orderItem->icms_picms_efet;
                    $sdtICMS->vICMSEfet = $orderItem->icms_vicms_efet;
                    $sdtICMS->vICMSSubstituto = $orderItem->icms_vicms_substituto; //NT2018.005_1.10_Fevereiro de 2019

                    $this->makeNFce->tagICMSSN($sdtICMS);

                }

                //----- IPI -----//
                //Somente indústrias ou caso CST tenha sido informada na natureza de operação
                /*if ($orderItem->ipi_cst) {
                    $sdtIpi = new stdClass();
                    $sdtIpi->item = $itemId; //item da NFe
                    $sdtIpi->clEnq = null;
                    $sdtIpi->CNPJProd = null;
                    $sdtIpi->cSelo = $orderItem->ipi_cselo;
                    $sdtIpi->qSelo = $orderItem->ipi_qselo;
                    $sdtIpi->cEnq = $orderItem->ipi_cenq;
                    $sdtIpi->CST = $orderItem->ipi_cst;
                    $sdtIpi->vIPI = $orderItem->ipi_vipi;
                    $sdtIpi->vBC = $orderItem->ipi_vbc;
                    $sdtIpi->pIPI = $orderItem->ipi_pipi;
                    $sdtIpi->qUnid = $orderItem->ipi_qunid;
                    $sdtIpi->vUnid = $orderItem->ipi_vunid;
                    $this->makeNFce->tagIPI($sdtIpi);
                }*/
    //
    //            //----- PIS -----//
                $sdtPis = new stdClass();
                $sdtPis->item = $itemId; //item da NFe
                $sdtPis->CST = $orderItem->pis_cst;
                $sdtPis->vBC = $orderItem->pis_vbc;
                $sdtPis->pPIS = self::toSefazOrNull($orderItem->pis_ppis);
                $sdtPis->qBCProd = $orderItem->pis_qbc_prod;
                $sdtPis->vAliqProd = $orderItem->pis_valiq_prod;
                $sdtPis->vPIS = $orderItem->pis_vpis;
                $this->makeNFce->tagPIS($sdtPis);

    //            //----- COFINS -----//
                $sdtCofins = new stdClass();
                $sdtCofins->item = $itemId; //item da NFe
                $sdtCofins->CST = $orderItem->cofins_cst;
                $sdtCofins->vBC = $orderItem->cofins_vbc;
                $sdtCofins->pCOFINS = self::toSefazOrNull($orderItem->cofins_pcofins);
                $sdtCofins->qBCProd = $orderItem->cofins_qbc_prod;
                $sdtCofins->vAliqProd = $orderItem->cofins_valiq_prod;
                $sdtCofins->vCOFINS = $orderItem->cofins_vcofins;
                $this->makeNFce->tagCOFINS($sdtCofins);
    //
                $stdImposto = new stdClass();
                $stdImposto->item = $itemId; //item da NFe
                $tax = $this->requestIbpt($stdItem);
                $stdImposto->vTotTrib = $tax;
                $this->makeNFce->tagimposto($stdImposto);

    //                $stdAdProd = new stdClass();
    //                $stdAdProd->item = 1; //item da NFe
    //                $stdAdProd->infAdProd = 'informacao adicional do item';
    //                $nfe->taginfAdProd($stdAdProd);

            }
        }catch (Exception $eItens){
            throw new InvalidArgumentException($eItens->getMessage());          
        } 
    }

    

    /**
     * Informações de transporte
     */
    public function getTransporte()
    {
        $modFrete = 9;
        if($this->venda->valor_frete > 0 && $this->venda->indicador_presenca != 1){
            $modFrete = 1;
        }

        $stdFrete = new stdClass();
        $stdFrete->modFrete = $modFrete;
        $this->makeNFce->tagtransp($stdFrete);
    }

    public function getPagamento()
    {        

        $pag = new \stdClass();
        $pag->vTroco = 0;
        $this->makeNFce->tagpag($pag);

        $detPag = new \stdClass();
        $detPag->indPag = 0;
        $detPag->tPag = '01';
        $total = $this->venda->sub_total + $this->venda->valor_frete - $this->valorDesconto;
        $detPag->vPag = $total;
        $this->makeNFce->tagdetPag($detPag);        

        return $this->makeNFce;
    }

    /**
     * Informações de responsável técnico
     */
    public function getResponsavelTecnico()
    {

        $stdRespTecnico = new stdClass();
        $stdRespTecnico->CNPJ = '38597741000174'; //CNPJ da pessoa jurídica responsável pelo sistema utilizado na emissão do documento fiscal eletrônico
        $stdRespTecnico->xContato= 'Genizis Vinicius Gonçalves Meneghel'; //Nome da pessoa a ser contatada
        $stdRespTecnico->email = 'genizis@shopfloor.com.br'; //E-mail da pessoa jurídica a ser contatada
        $stdRespTecnico->fone = '41996668250'; //Telefone da pessoa jurídica/física a ser contatada
        $stdRespTecnico->CSRT = ''; //Código de Segurança do Responsável Técnico
        $stdRespTecnico->idCSRT = '0'; //Identificador do CSRT

        $this->makeNFce->taginfRespTec($stdRespTecnico);        

    }

    /**
     * Informações Complementares
     * @return \NFePHP\NFe\Make
     */
    public function getInformacoesComplementares()
    {
        $stdAd = new stdClass();
        //Available Tags
        if (null !== $this->nota->informacoes_complementares) {
            $stdAd->infCpl = str_replace("\r\n", ";", $this->nota->informacoes_complementares);
        }
        $this->makeNFce->taginfAdic($stdAd);
        return $this->makeNFce;
    }

    /**
     * Monta XML da NF-e
     * @return bool
     */
    public function monta()
    {

        try {
            $this->xml = $this->makeNFce->monta();
            return true;
        } catch (Exception $exception) {
            $this->setErrors($this->makeNFce->getErrors());
        }
        return false;
    }

    public function getErrors()
    {
        return $this->makeNFce->getErrors();
    }

    /**
     * Método genérico, padronizado, pode ser usado por vários atores, cliente, empresa, transportador, etc
     * @param $bairro
     * @param $logradouro
     * @param $numero
     * @param $municipio
     * @param $uf
     * @param $cmun
     * @param $cep
     * @param string $complemento
     * @param string $email
     * @param string $fone
     * @param string $cPais
     * @param string $xPais
     * @return stdClass
     */
    private function builderTagEndereco($bairro, $logradouro, $numero,
                                        $municipio, $uf, $cmun, $cep,
                                        $complemento = '',
                                        $email = '',
                                        $fone = '',
                                        $cPais = '1058',
                                        $xPais = 'Brasil'
    )
    {
        $stdDestEndereco = new stdClass();
        $stdDestEndereco->xLgr = self::cut($logradouro, 60);
        $stdDestEndereco->nro = (empty($numero)) ? 'S/N' : $numero;
        $stdDestEndereco->xCpl = self::cut($complemento, 60);
        $stdDestEndereco->xBairro = $bairro;
        $stdDestEndereco->cMun = $cmun;
        $stdDestEndereco->xMun = $municipio;
        $stdDestEndereco->UF = $uf;
        $stdDestEndereco->CEP = self::onlyNumbers($cep);
        $stdDestEndereco->cPais = $cPais;
        $stdDestEndereco->xPais = $xPais;
        $stdDestEndereco->fone = self::onlyNumbers($fone);
        $stdDestEndereco->email = $email;
        return $stdDestEndereco;
    }

    /**
     * Gera Código NF
     *
     * @param mixed $year
     * @param mixed $month
     * @param mixed $nNF
     * @return string
     */
    private function generateCNF($year, $month, $nNF)
    {
        $nNF = (string)$nNF;
        $tam = strlen($nNF);

        if ($tam < 4) {
            $nNF = str_pad($nNF, 4, "0", STR_PAD_RIGHT);
            $tam = 4;
        } else {
            $nNF = substr($nNF, 0, 4);
        }

        $novonCT = "";
        for ($i = $tam; $i >= 0; $i--) {
            $novonCT = $novonCT . substr($nNF, $i, 1);
        }

        return $year . $month . $novonCT;
    }

    /**
     * Trata Inscrição Estadual
     * @param string $ie
     * @return string
     */
    private function handleIE(string $ie)
    {
        $ie = strtolower($ie);
        if ($ie === 'isento') {
            return strtoupper($ie);
        }
        return self::onlyNumbers($ie);
    }

    /**
     * Faz a requisição das impostos do item
     * Requisitar token aqui: https://deolhonoimposto.ibpt.org.br/
     * @param $item
     * @return float|null
     */
    private function requestIbpt($item)
    {
        if (!$this->empresa->token_ibpt) {
            return null;
        }
        try {
            $uf = $this->empresa->uf;
            $IBPT = new \NFePHP\Ibpt\Ibpt(self::onlyNumbers($this->empresa->cnpj_cpf), $this->empresa->token_ibpt);
            $tax = $IBPT->productTaxes($uf, $item->NCM, 0, $item->xProd, $item->uCom, 1, $item->cEAN);
            return (float)$tax->valorTotal;
        } catch (\Exception $e) {
        }
        return null;

    }
}
