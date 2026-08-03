<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once 'vendor/autoload.php';
require_once 'application/traits/Traits.php';

/**
 * Class VendasNFeController
 * Responsável por configurar e emitir NF-e
 * Ao clicar em emitir nf-e:
 *
 * 1 - selecionar natureza de operação
 * 2 - configurar produtos e nota fiscal
 * 3 - botão emitir - clicar
 * 4 - voltar para o faturamento e verificar status da nota
 *
 *
 * Tratamento de erros - podem ser identificados pelo método getErrors()
 */
class NotaFiscalController extends CI_Controller
{
    use Traits;

    public $errors;

    public $chaveNFe;


    function __construct()
    {
        parent::__construct();

        if (usuarioLogado() == false) {
            redirect(base_url("login"), "home", "refresh");
        }
        if (getDadosUsuarioLogado()['vendas'] != 1) {
            redirect(base_url("visao-geral"), "home", "refresh");
        }

        try {
            $this->load->library('CommonNFe');
        } catch (Exception $exception) {
            $this->session->set_flashdata('erro', $exception->getMessage());
            header('location:' . $_SERVER['HTTP_REFERER']);
            exit();
        }

    }

    /**
     * Configurar Nota Fiscal
     * 1 - Verificar se natureza de operação já está cadastrada no banco de dados para o faturmaneto informado
     * Caso esteja redireciona para a tela 2, caso não selecionar natureza de operação e gravar no bano de dados
     */
    public function configureNotaFiscal()
    {

        $codFaturamento = (int)$this->uri->segment(3);
        if (!$codFaturamento) {
            $this->session->set_flashdata('erro', 'Id do faturamento não informado');
            redirect(base_url("vendas/pedido-venda"), "home", "refresh");
        }
        //Verifica se já existe uma nota com este faturamento
        $notaFiscal = $this->faturamentoNotaFiscal->getByFaturamentoId($codFaturamento);
        if ($notaFiscal) {
            $this->session->set_flashdata('sucesso', 'Nota Fiscal já iniciada, continue configuração');
            redirect(base_url('faturamento/pedido/configurar-nfe-edit/' . $notaFiscal->id), 'home', 'refresh');
        }

        $faturamento = $this->venda->getFaturamentoPorCodigo($codFaturamento);
        $listaPedido = $this->venda->getPedidoVendaAprovPorCodigo($faturamento->num_pedido_venda);
        $listaTitulos = $this->financeiro->getTitulosPorFaturamento($codFaturamento);

        $dados = [
            'faturamentoId' => $codFaturamento,
            'menu' => 'Vendas',
            'naturezas' => $this->naturezaOperacao->getAll(),
            'indicadorFinal' => self::indicadorConsumidorFinal(),
            'indicadorPresencial' => self::indicadorPresencial(),
            'finalidade' => self::fiscalNFeFinalidade(),
            'tipoNfe' => self::operacaoFiscal(),
            'faturamento' => $faturamento,
            'pedido' => $listaPedido,
            'titulos' => $listaTitulos,
        ];
        $this->load->view('faturamento/configure', $dados);

    }

    /**
     * Editar configurações da NF-e
     * @param $id
     */
    public function configureNotaFiscalEdit($id)
    {
        $notaFiscal = $this->faturamentoNotaFiscal->getById($id);
        $produtos = $this->faturamentoNotaFiscalItem->getNFeItens($id);  
        
        $faturamento = $this->venda->getFaturamentoPorCodigo($notaFiscal->cod_faturamento_pedido);
        $listaPedido = $this->venda->getPedidoVendaAprovPorCodigo($faturamento->num_pedido_venda);
        $transportador = $this->transportador->getTransportadorById($faturamento->cod_transportador);
        $listaTitulos = $this->financeiro->getTitulosPorFaturamento($notaFiscal->cod_faturamento_pedido);

        $estado = $this->tabelasauxiliares->getEstado();

        //$this->load->library('ToolsNFe', ['id' => $id]);
        if ($notaFiscal->c_stat == 100) {
            $this->session->set_flashdata('sucesso', 'Nota Fiscal aprovada');
            redirect(base_url("faturamento/pedido/{$faturamento->cod_faturamento_pedido}/configurar-nfe"), 'home', 'refresh');
        }

        if ($notaFiscal->c_stat == 101) {
            $this->session->set_flashdata('sucesso', 'Nota Fiscal cancelada');
            redirect(base_url("faturamento/pedido/{$faturamento->cod_faturamento_pedido}/configurar-nfe"), 'home', 'refresh');
        }

        if ($notaFiscal->c_stat > 200) {
            $ch = base_url($this->commonnfe->repDir . $notaFiscal->chave . '-nfe.xml');
            $xmlNFeReprovado = ' <a href="' . $ch . '" target="_blank">XML Reprovado</a>';
            $this->session->set_flashdata('erro',
                'A última tentativa de emissão da NF-e retornou erros de validação:<br>' . '[' . $notaFiscal->c_stat .
                '] ' . $notaFiscal->x_motivo .
                $xmlNFeReprovado);
        }
        $xml = $this->simulateXML($id);
        if (!$xml) {
            $this->session->set_flashdata('erro',
                'Não foi possível gerar o XML, corrija os erros abaixo antes de tentar novamente:<br>'
                . self::arrayToHtml($this->getErrors()));
        }        

        $dados = [
            'nota' => $notaFiscal,
            'menu' => 'Vendas',
            'naturezas' => $this->naturezaOperacao->getAll(),
            'indicadorFinal' => self::indicadorConsumidorFinal(),
            'indicadorPresencial' => self::indicadorPresencial(),
            'finalidade' => self::fiscalNFeFinalidade(),
            'tipoNfe' => self::operacaoFiscal(),
            'produtos' => $produtos,
            'icmsOrigem' => $this->icms->getICMSOrigemAll(),
            'icmsCST' => $this->icms->getICMSCSTAll(),
            'icmsModBC' => self::modBC(),
            'ipiCST' => $this->ipi->getIPICSTAll(),
            'pisCofinsCST' => $this->pisCofins->getCSTAll(),
            'xml' => $xml,
            'cStat' => $notaFiscal->c_stat,
            'xMotivo' => $notaFiscal->x_motivo,
            'faturamento' => $faturamento,
            'pedido' => $listaPedido,
            'titulos' => $listaTitulos,
            'transportador' => $transportador,
            'estado' => $estado,
        ];

        $this->load->view('faturamento/configure-edit', $dados);

    }

    /**
     * Cancela emissão e retorna para o faturamento
     * @param $notaFiscalId
     * @param $faturamentoId
     */
    public function cancelarEmissaoNFe($notaFiscalId, $faturamentoId)
    {       

        $delete = $this->faturamentoNotaFiscal->delete($notaFiscalId);
        if (true === $delete) {
            $this->session->set_flashdata('sucesso', 'Nota Fiscal cancelada.');
            redirect(base_url('vendas/faturamento-pedido/novo-faturamento-pedido/' .
                              $faturamentoId), 'home', 'refresh');
        }
        $this->session->set_flashdata('erro', 'Não foi possível cancelar a nota fiscal.' . $delete);
        redirect(base_url('faturamento/pedido/configurar-nfe-edit/' . $notaFiscalId), 'home', 'refresh');
    }

    /**
     * 1 - Cadastra nota fiscal e vincula natureza de operação e faturamento a mesma
     * 2 - Processa tributação dos itens da nota
     */
    public function configureNotaFiscalSubmit()
    {
        $empresa = $this->empresa->getEmpresaById(getDadosUsuarioLogado()['id_empresa']);

        $message = '';
        $redirect = '';
        //Editar
        $nota_fiscal_id = $this->input->post('nota_fiscal_id');
        $naturezaId = $this->input->post('CodNatureza');
        $naturezaOperacao = $this->naturezaOperacao->getById($naturezaId);
        //Inserir
        if (null === $nota_fiscal_id) {            
            $faturamento = $this->input->post('faturamento_id');
            $cliente = $this->faturamentoNotaFiscal->getClienteByFaturamentoId($faturamento);            
            $dados = [
                'id_empresa' => getDadosUsuarioLogado()['id_empresa'],
                'origem_nf' => 1,
                'cod_faturamento_pedido' => $faturamento,
                'cod_cliente' => $cliente->cod_cliente,
                'data_emissao' => date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataFaturamento')))),
                'x_ped' => $this->input->post('PedidoCliente'),
                'tb_fis_natureza_operacao_id' => $naturezaId,
                'ambiente' => $empresa->ambiente_nfe,
                'indicador_presencial' => $this->input->post('indicadorPresencial'),
                'indicador_final' => $this->input->post('indicadorFinal'),
                'informacoes_complementares' => $naturezaOperacao->informacoes_complementares,
                'serie' => $empresa->serie,
                'modelo' => $empresa->modelo,
                'finalidade' => $naturezaOperacao->finalidade,
                'tipo_nfe' => $naturezaOperacao->operacao_fiscal,//Entrada/Saída
            ];
            //Imuttable data
            //idDest
            if($cliente->tipo_pessoa == 3){
                $dados['indentificador_destino'] = 3;                
            }else{
                if($empresa->codigo_uf != $cliente->codigo_uf){
                    $dados['indentificador_destino'] = 2; 
                }else{
                    $dados['indentificador_destino'] = 1; 
                }
            }

            $Regfaturamento = $this->venda->getFaturamentoPorCodigo($faturamento);
            
            if($empresa->uf == null || $empresa->uf == ""){
                $this->session->set_flashdata('erro', 'Nota Fiscal não cadastrada, sua empresa não possui cidade defnida');
                redirect(base_url("faturamento/pedido/{$faturamento}/configurar-nfe"), 'home', 'refresh');
            }
    
            if($cliente->uf == null || $cliente->uf == ""){
                $this->session->set_flashdata('erro', 'Nota Fiscal não cadastrada, seu cliente não possui cidade definida');
                redirect(base_url("faturamento/pedido/{$faturamento}/configurar-nfe"), 'home', 'refresh');
            }

            //1
            $nota_fiscal_id = $this->faturamentoNotaFiscal->insert($dados);

            //Inserir itens da nota fiscal
            $result = $this->insertNFeItem($faturamento, $nota_fiscal_id, $empresa, $cliente, $naturezaOperacao);
            //exit();
            if (!$result) {
                $venda = $this->venda->getFaturamentoPorCodigo($faturamento);
                $this->session->set_flashdata('erro', 'Não foi possível cadastrar a nota fiscal');
                redirect(base_url('vendas/faturamento-pedido/novo-faturamento-pedido/' .
                                  $venda->num_pedido_venda), 'home', 'refresh');
            }            

            $message = 'Nota Fiscal cadastrada';
            $redirect = 'faturamento/pedido/configurar-nfe-edit/' . $nota_fiscal_id;
        } else {
            $notaFiscal = $this->faturamentoNotaFiscal->getById($nota_fiscal_id);
            if (!empty($notaFiscal->cStat) && $notaFiscal->cStat < 200) {
                $this->session->set_flashdata('erro', 'Este pedido não pode ser mais atualizado, o mesmo já possui uma nota fiscal emitida');
                redirect(base_url('faturamento/pedido/configurar-nfe-edit/' . $nota_fiscal_id), 'home', 'refresh');
            }
            $dados = [
                'tb_fis_natureza_operacao_id' => $this->input->post('CodNatureza'),
                'ambiente' => $empresa->ambiente_nfe,
                'data_emissao' => date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataFaturamento')))),
                'x_ped' => $this->input->post('PedidoCliente'),
                'indicador_presencial' => $this->input->post('indicadorPresencial'),
                'indicador_final' => $this->input->post('indicadorFinal'),
                'quant_volume' => $this->input->post('Quantidade'),
                'especie_volume' => $this->input->post('Especie'),
                'marca' => $this->input->post('Marca'),
                'placa_veiculo' => $this->input->post('PlacaVeiculo'),
                'cod_antt' => $this->input->post('CodAntt'),
                'uf_veiculo' => $this->input->post('UFVeiculo'),
                'local_embarque' => $this->input->post('LocalEmbarque'),
                'uf_embarque' => $this->input->post('UFEmbarque'),
            ];
            $this->faturamentoNotaFiscal->update($nota_fiscal_id, $dados);

            $message = 'Nota Fiscal atualizada';
            $redirect = 'faturamento/pedido/configurar-nfe-edit/' . $nota_fiscal_id;
        }

        //Atualiza calculo dos tributos
        $this->updateNFeItem($nota_fiscal_id);

        $infCompProcessada = $this->input->post('informacoesComplementares');
        if($infCompProcessada == null || $infCompProcessada == ""){
            $infCompProcessada = $this->processaInfComplementar($naturezaOperacao->informacoes_complementares, $nota_fiscal_id, $empresa);
        }

        $dados = null;
        $dados = [
            'informacoes_complementares' => $infCompProcessada,
        ];
        $this->faturamentoNotaFiscal->update($nota_fiscal_id, $dados);

        $this->session->set_flashdata('sucesso', $message);
        redirect(base_url($redirect), 'home', 'refresh');
    }

    private function processaInfComplementar($informacaoComplementar, $nota_fiscal_id, $empresa){

        // [ALIQUOTA_CREDITO_ICMS] - Alíquota de Crédito ICMS Simples Nacional
        $aCredICMSSN = $empresa->percentual_credito_sn;
        // [VALOR_CREDITO_ICMS] - Valor calculado de Crédito ICMS Simples Nacional
        $vCredICMSSN = 0;
        // [VALOR_FCP] - Valor total do FCP
        $vFCP = 0;
        
        $produtos = $this->faturamentoNotaFiscalItem->getNFeItens($nota_fiscal_id);  
        $IBPTFederal = 0;
        $IBPTEstadual = 0;
        $fatProduto = 0;
        $tributos = false;
        foreach ($produtos as $item) {
            $vCredICMSSN = $vCredICMSSN + $item->icms_vcred_icms_sn;
            $vFCP = $vFCP + $item->icms_vfcpst;

            // Busca tributos IBPT
            //$tributos = $this->fiscal->getTributosIBPT($item->cod_produto);
            if($tributos != false){
                $IBPTFederal = $IBPTFederal + ($item->valor_fat_item * ($tributos['nacional'] / 100));
                $IBPTEstadual = $IBPTEstadual + ($item->valor_fat_item * ($tributos['estadual'] / 100));
                $fatProduto = $fatProduto + $item->valor_fat_item;
            }


        }

        $InfIBPT = "Voce pagou aproximadamente: R$ " . number_format($IBPTFederal, 2, ',', '.') .  
                   " de tributos federais R$ " . number_format($IBPTEstadual, 2, ',', '.') .  
                   " de tributos estaduais R$ " . number_format($fatProduto, 2, ',', '.') . " pelos produtos Fonte: IBPT";

        $informacaoComplementar = $InfIBPT . " | " . $informacaoComplementar;

        $infCompProcessada = $informacaoComplementar;

        // [ALIQUOTA_CREDITO_ICMS] - Alíquota de Crédito ICMS Simples Nacional
        if(strpos($informacaoComplementar, '[ALIQUOTA_CREDITO_ICMS]') !== false)
            $infCompProcessada = str_replace("[ALIQUOTA_CREDITO_ICMS]", number_format($aCredICMSSN, 2, ',', '.'), $infCompProcessada);

        // [VALOR_CREDITO_ICMS] - Valor calculado de Crédito ICMS Simples Nacional
        if(strpos($informacaoComplementar, '[VALOR_CREDITO_ICMS]') !== false)
            $infCompProcessada = str_replace("[VALOR_CREDITO_ICMS]", number_format($vCredICMSSN, 2, ',', '.'), $infCompProcessada);

        // [VALOR_FCP] - Valor total do FCP
        if(strpos($informacaoComplementar, '[VALOR_FCP]') !== false)
            $infCompProcessada = str_replace("[VALOR_FCP]", number_format($vFCP, 2, ',', '.'), $infCompProcessada);

        return $infCompProcessada;

    }

    /**
     * Método responsável por inserir itens da nota fiscal com valores pré-definidos
     * @param $faturamento
     * @param $notaFiscalId
     * @param $empresa
     * @param $cliente
     * @param $naturezaOperacao
     * @return bool
     */
    private function insertNFeItem($faturamento, $notaFiscalId, $empresa, $cliente, $naturezaOperacao)
    {
        $itensFaturados = $this->venda->getFaturamentoProdutos($faturamento);
        $dadosNFItens = [];

        $Regfaturamento = $this->venda->getFaturamentoPorCodigo($faturamento);

        if($empresa->uf == null || $empresa->uf == ""){
            $this->session->set_flashdata('erro', 'Nota Fiscal não cadastrada, sua empresa não possui cidade defnida');
            redirect(base_url("vendas/faturamento-pedido/novo-faturamento-pedido/{$Regfaturamento->num_pedido_venda}"), 'home', 'refresh');
        }

        if($cliente->uf == null || $cliente->uf == ""){
            $this->session->set_flashdata('erro', 'Nota Fiscal não cadastrada, seu cliente não possui cidade definida');
            redirect(base_url("vendas/faturamento-pedido/novo-faturamento-pedido/{$Regfaturamento->num_pedido_venda}"), 'home', 'refresh');
        }

        foreach ($itensFaturados as $item) {
            if($item->cod_ncm == null){
                $this->session->set_flashdata('erro', "Nota Fiscal não cadastrada, o produto {$item->cod_produto} - {$item->nome_produto} não possui NCM definida");
                redirect(base_url("vendas/faturamento-pedido/novo-faturamento-pedido/{$Regfaturamento->num_pedido_venda}"), 'home', 'refresh');
            }
        }

        foreach ($itensFaturados as $item) {
            $origem = $this->icms->getICMSOrigemByCodigo($item->cod_origem);
            $aliquotaICMS = $this->icmsAliquotas->getICMSAliquota($cliente->uf, $naturezaOperacao->id);
            $aliquotaFCP = $this->fcpAliquotas->getFCPAliquota($cliente->uf, $item->cod_ncm, $naturezaOperacao->id);

            if($cliente->tipo_pessoa == 3){
                $cfop = $naturezaOperacao->tb_fis_cfop_id_ext;
            }else{
                if($empresa->codigo_uf != $cliente->codigo_uf){
                    $cfop = $naturezaOperacao->tb_fis_cfop_id_inter;
                }else{
                    $cfop = $naturezaOperacao->tb_fis_cfop_id_estad;
                }
            }

            $cBenef = '';
            if($naturezaOperacao->c_benef != null)
                $cBenef = $naturezaOperacao->c_benef;

            $dadosNFItens[] = [
                'cod_gtin' => $item->cod_gtin,
                'quantidade' => $item->quantidade,
                'quantidade_tributavel' => ($item->cod_unidade_medida_fat == true) ? ($item->quantidade * $item->quant_faturamento) : $item->quantidade,
                'valor_unitario' => $item->valor_unitario,
                'valor_total_produtos' => ($item->valor_unitario * $item->quantidade),
                'tb_fat_nota_fiscal_id' => $notaFiscalId,
                'faturamento_pedido_id' => $faturamento,
                'faturamento_pedido_produto_id' => $item->id,
                'tb_fis_icms_origem_id' => $origem->id,
                'tb_fis_cfop_id' => $cfop,
                'tb_fis_icms_cst_id' => $naturezaOperacao->tb_fis_icms_cst_id,
                'tb_fis_icms_csosn_id' => $naturezaOperacao->tb_fis_icms_csosn_id,
                'icms_mod_bc' => $naturezaOperacao->mod_bc,
                'icms_mod_bcst' => $naturezaOperacao->mod_bc_st,
                'icms_pred_bc' => $naturezaOperacao->p_red_bc,
                'icms_pred_bcst' => $naturezaOperacao->p_red_bc_st,
                'icms_pmvast' => $naturezaOperacao->p_mvast,
                'icms_picms' => $aliquotaICMS,
                'icms_picms_st' => $aliquotaICMS,
                'icms_pfcp' => $aliquotaFCP,
                'icms_pfcpst' => $aliquotaFCP,
                'icms_pcred_sn' => $empresa->percentual_credito_sn,
                'tb_fis_ipi_cst_id' => $naturezaOperacao->tb_fis_ipi_cst_id,
                'tb_fis_pis_cst_id' => $naturezaOperacao->tb_fis_pis_cst_id,
                'pis_ppis' => $naturezaOperacao->p_pis,
                'tb_fis_cofins_cst_id' => $naturezaOperacao->tb_fis_cofins_cst_id,
                'cofins_pcofins' => $naturezaOperacao->p_cofins,
                'ipi_pipi' => $item->percentual_ipi,
                'ipi_cenq' => $item->c_enq,
                'c_benef' => $cBenef,
                'unidade_comercial' => $item->cod_unidade_medida,
                'unidade_tributavel' => ($item->cod_unidade_medida_fat == true) ? ($item->cod_unidade_medida_fat) : $item->cod_unidade_medida,
            ];
        }
        return $this->faturamentoNotaFiscal->insertAll($dadosNFItens, $notaFiscalId);
    }

    /**
     * Atualiza valores e impostos do item da nota
     * @param int $notaFiscalId
     */
    private function updateNFeItem(int $notaFiscalId)
    {
        $this->recalcularValoresUnitarios($notaFiscalId);
        $this->recalcularImpostos($notaFiscalId);

    }

    /**
     * Recalcula valor do item - UPDATE
     * @param $notaFiscalId
     */
    private function recalcularValoresUnitarios($notaFiscalId)
    {
        $notaFiscal = $this->faturamentoNotaFiscal->getById($notaFiscalId);
        $methodsToBeReSummed = [
            'valor_frete' => (float)$notaFiscal->valor_frete,
            'valor_desconto' => (float)$notaFiscal->valor_desconto,
//            'valorDespesas' => (float)$entity->getValorDespesas(),
//            'valorSeguro' => (float)$entity->getValorSeguro(),
        ];

        foreach ($methodsToBeReSummed as $method => $valorMetodo) {
            //echo $valorMetodo;
            if ($notaFiscal->total_produtos <= 0 || $valorMetodo <= 0) {
                continue;
            }
            $collection = $this->faturamentoNotaFiscalItem->getNFeItens($notaFiscalId);
            $percentualMetodo = (count($collection) > 0 && $valorMetodo > 0)
                ? ($valorMetodo / $notaFiscal->total_produtos) : 0;
            $loop = 0;
            $unitValue = 0;
            foreach ($collection as $item) {
                $loop++;
                $novoValorMetodo = $percentualMetodo *
                                   ((float)$item->valor_unitario * (float)$item->quantidade);
                $unitValue += $valorMetodo;//Soma individualmente valor do desconto do item para conferir no final
                if ($loop == count($collection)) {//se for a ultima linha
                    //se o total unitario for menor que o valor do item insere no ultimo registro a diferença
                    if ($unitValue < $valorMetodo) {
                        $novoValorMetodo += ($valorMetodo - $unitValue);
                    }
                }

                //Ex: valorDesconto = setValorDesconto
                $this->faturamentoNotaFiscalItem->update($item->id, [$method => round($novoValorMetodo, 2)]);
                
            }
        }

    }

    /**
     * Recaulcula valor dos impostos - UPDATE
     * @param int $notaFiscalId
     */
    private function recalcularImpostos(int $notaFiscalId)
    {
        $this->load->library('NFeImpostos');
        $collection = $this->faturamentoNotaFiscalItem->getNFeItens($notaFiscalId);
        foreach ($collection as $item) {
            $this->nfeimpostos->defineICMS($item);
            $this->nfeimpostos->defineICMSSN($item);
            $this->nfeimpostos->defineIPI($item);
            $this->nfeimpostos->definePIS($item);
            $this->nfeimpostos->defineCOFINS($item);
        }
    }

    /**
     * Faz a emissão da NF-e, trata erros ou autoriza documento
     * @param int $notaFiscalId
     */
    public function emitir(int $notaFiscalId)
    {
        //Verifica se já existe uma nota com mesmo ID
        $notaFiscal = $this->faturamentoNotaFiscal->getById($notaFiscalId);
        if (!empty($notaFiscal->cStat) && $notaFiscal->cStat < 200) {
            $this->session->set_flashdata('erro', 'Este pedido não pode ser mais atualizado, o mesmo já possui uma nota fiscal emitida');
            redirect(base_url('faturamento/pedido/configurar-nfe-edit/' . $notaFiscalId), 'home', 'refresh');
        }
        $xml = $this->generateXML($notaFiscalId);
        $this->load->library('ToolsNFe', ['id' => $notaFiscalId]);

        //Verifica status do servidor sefaz
        if (false == $this->toolsnfe->statusSefaz()) {
            $this->setErrors($this->toolsnfe->getErrors());
            $this->session->set_flashdata('erro', 'Servidor SEFAZ indisponível.<br/><br/>' .
                                                  self::arrayToHtml($this->getErrors()));
            redirect(base_url('faturamento/pedido/configurar-nfe-edit/' . $notaFiscalId), 'home', 'refresh');
        }

        //Verifica validade do XML
        $sentData = $this->toolsnfe->sendSefaz($xml);
        if (false === $sentData) {
            $this->setErrors($this->toolsnfe->getErrors());
            $this->session->set_flashdata('erro', 'Não foi possível emitir a nota fiscal. Corrija os erros antes de tentar novamente.<br/><br/>' .
                                                  self::arrayToHtml($this->getErrors()));
            redirect(base_url('faturamento/pedido/configurar-nfe-edit/' . $notaFiscalId), 'home', 'refresh');
        }

        //Salva dados enviados
        $stdCl = new \NFePHP\NFe\Common\Standardize($xml);
        $std = $stdCl->toStd();

        $dados = [
            'chave' => self::onlyNumbers($std->infNFe->attributes->Id),
            'numero' => ($std->infNFe->ide->nNF),
            'data_emissao' => self::dataSefazToMySQLDateTime($std->infNFe->ide->dhEmi),
            'data_saida_entrada' => ($std->infNFe->ide->dhEmi),
            'tipo_emissao' => ($std->infNFe->ide->tpEmis),
            'indicador_final' => ($std->infNFe->ide->indFinal),
            'indicador_presencial' => ($std->infNFe->ide->indPres),
            'processo_emissao' => ($std->infNFe->ide->procEmi),
        ];
        $merged = array_merge($dados, $sentData);
        if (@$merged['recibo']) {//Se houver número do recibo, documento foi recebido pela Sefaz
            sleep(1);
            $dadosRetorno = $this->toolsnfe->atualizaNotaFiscalRetornoRecibo($merged['recibo']);
            $merged = array_merge($dadosRetorno, $merged);
            if ($merged['c_stat'] == 100) {//Atualiza numeração NF-e na empresa
                $this->empresa->updateEmpresa(getDadosUsuarioLogado()['id_empresa'], ['num_ultima_nf' => $merged['numero']]);
            }
        }

        //Atualiza dados da nota fiscal enviada
        $this->faturamentoNotaFiscal->update($notaFiscalId, $merged);

        $faturamento = $this->venda->getFaturamentoPorCodigo($notaFiscal->cod_faturamento_pedido);

        if($merged['c_stat'] != 100)
            redirect(base_url('faturamento/pedido/configurar-nfe-edit/' . $notaFiscal->id), 'home', 'refresh');


        $this->session->set_flashdata('sucesso', 'Nota Fiscal emitida com sucesso');
        redirect(base_url("vendas/faturamento-pedido/novo-faturamento-pedido/{$faturamento->num_pedido_venda}"), 'home', 'refresh');
    }

    /**
     * Form cancelar
     * @param $notaFiscalId
     */
    public function cancelarNFe($notaFiscalId)
    {
        $notaFiscal = $this->faturamentoNotaFiscal->getById($notaFiscalId);

        $faturamento = $this->venda->getFaturamentoPorCodigo($notaFiscal->cod_faturamento_pedido);
        $listaPedido = $this->venda->getPedidoVendaAprovPorCodigo($faturamento->num_pedido_venda);

        //Verifica se já existe uma nota com este faturamento
        if ($notaFiscal->c_stat != 100) {
            $this->session->set_flashdata('sucesso', 'Nota Fiscal não pode ser cancelada');
            redirect(base_url('faturamento/pedido/configurar-nfe-edit/' . $notaFiscal->id), 'home', 'refresh');
        }

        $dados = [
            'menu' => 'Vendas',
            'nf'=>$notaFiscalId,
            'nota'=>$notaFiscal,
            'faturamento' => $faturamento,
            'pedido' => $listaPedido,
        ];
        $this->load->view('faturamento/cancelamento', $dados);

    }

    /**
     * Faz o cancelamento de NF-e na sefaz
     * @param int $notaFiscalId
     */
    public function cancelarNFeSubmit(int $notaFiscalId)
    {
        $notaFiscal = $this->faturamentoNotaFiscal->getById($notaFiscalId);
        if (!empty($notaFiscal->cStat) && $notaFiscal->cStat != 100) {
            $this->session->set_flashdata('erro', 'Esta nota não pode ser cancelada.');
            redirect(base_url('faturamento/pedido/configurar-nfe-edit/' . $notaFiscalId), 'home', 'refresh');
        }

        $this->load->library('ToolsNFe', ['id' => $notaFiscalId]);

        //Verifica status do servidor sefaz
        if (false == $this->toolsnfe->statusSefaz()) {
            $this->setErrors($this->toolsnfe->getErrors());
            $this->session->set_flashdata('erro', 'Servidor SEFAZ indisponível.<br/><br/>' .
                                                  self::arrayToHtml($this->getErrors()));
            redirect(base_url('faturamento/pedido/configurar-nfe-edit/' . $notaFiscalId), 'home', 'refresh');
        }

        //Verifica validade do XML
        $motivoCancelamento = $this->input->post('motivo');
        $sentData = $this->toolsnfe->cancelaSefaz($notaFiscal, $motivoCancelamento);
        if (false === $sentData) {
            $this->setErrors($this->toolsnfe->getErrors());
            $this->session->set_flashdata('erro', 'Não foi possível cancelar a nota fiscal.<br/><br/>' .
                                                  self::arrayToHtml($this->getErrors()));
            redirect(base_url('faturamento/pedido/cancelar-nfe/' . $notaFiscalId), 'home', 'refresh');
        }

        $faturamento = $this->venda->getFaturamentoPorCodigo($notaFiscal->cod_faturamento_pedido);

        $this->session->set_flashdata('sucesso', 'Nota Fiscal cancelada com sucesso');
        redirect(base_url("vendas/faturamento-pedido/novo-faturamento-pedido/{$faturamento->num_pedido_venda}"), 'home', 'refresh');
    }

    public function cartaCorrecao($notaFiscalId)
    {
        $notaFiscal = $this->faturamentoNotaFiscal->getById($notaFiscalId);

        $faturamento = $this->venda->getFaturamentoPorCodigo($notaFiscal->cod_faturamento_pedido);
        $listaPedido = $this->venda->getPedidoVendaAprovPorCodigo($faturamento->num_pedido_venda);

        //Verifica se já existe uma nota com este faturamento
        if ($notaFiscal->c_stat != 100) {
            $this->session->set_flashdata('sucesso', 'Não é possível emitir carta de correção');
            redirect(base_url('faturamento/pedido/emitir-carta-correcao/' . $notaFiscal->id), 'home', 'refresh');
        }

        $dados = [
            'menu' => 'Vendas',
            'nf'=>$notaFiscalId,
            'nota'=>$notaFiscal,
            'faturamento' => $faturamento,
            'pedido' => $listaPedido,
        ];
        $this->load->view('faturamento/carta-correcao', $dados);

    }

    public function cartaCorrecaoSubmit(int $notaFiscalId)
    {
        $notaFiscal = $this->faturamentoNotaFiscal->getById($notaFiscalId);
        if (!empty($notaFiscal->cStat) && $notaFiscal->cStat != 100) {
            $this->session->set_flashdata('erro', 'Carta de correção não pode ser emitida.');
            redirect(base_url('faturamento/pedido/emitir-carta-correcao/' . $notaFiscalId), 'home', 'refresh');
        }

        $this->load->library('ToolsNFe', ['id' => $notaFiscalId]);

        //Verifica status do servidor sefaz
        if (false == $this->toolsnfe->statusSefaz()) {
            $this->setErrors($this->toolsnfe->getErrors());
            $this->session->set_flashdata('erro', 'Servidor SEFAZ indisponível.<br/><br/>' .
                                                  self::arrayToHtml($this->getErrors()));
            redirect(base_url('faturamento/pedido/emitir-carta-correcao/' . $notaFiscalId), 'home', 'refresh');
        }

        //Verifica validade do XML
        $descricaoCorrecao = $this->input->post('correcao');
        $sentData = $this->toolsnfe->cartaCorrecao($notaFiscal, $descricaoCorrecao);
        if (false === $sentData) {
            $this->setErrors($this->toolsnfe->getErrors());
            $this->session->set_flashdata('erro', 'Carta de correção não emitida.<br/><br/>' .
                                                  self::arrayToHtml($this->getErrors()));
            redirect(base_url('faturamento/pedido/emitir-carta-correcao/' . $notaFiscalId), 'home', 'refresh');
        }

        $faturamento = $this->venda->getFaturamentoPorCodigo($notaFiscal->cod_faturamento_pedido);

        $this->session->set_flashdata('sucesso', 'Carta de correção emitida com sucesso');
        redirect(base_url("vendas/faturamento-pedido/novo-faturamento-pedido/{$faturamento->num_pedido_venda}"), 'home', 'refresh');
    }

    public function cartaCorrecaoNFeAvulsaSubmit(int $codNotaFiscal)
    {
        $notaFiscal = $this->faturamentoNotaFiscal->getByNotaFsicalAvulsa($codNotaFiscal); 
        $notaFiscalId = $notaFiscal->id;

        $notaFiscal = $this->faturamentoNotaFiscal->getById($notaFiscalId);
        if (!empty($notaFiscal->cStat) && $notaFiscal->cStat != 100) {
            $this->session->set_flashdata('erro', 'Carta de correção não pode ser emitida.');
            redirect(base_url('faturamento/pedido/emitir-carta-correcao/' . $notaFiscalId), 'home', 'refresh');
        }

        $this->load->library('ToolsNFe', ['id' => $notaFiscalId]);

        //Verifica status do servidor sefaz
        if (false == $this->toolsnfe->statusSefaz()) {
            $this->setErrors($this->toolsnfe->getErrors());
            $this->session->set_flashdata('erro', 'Servidor SEFAZ indisponível.<br/><br/>' .
                                                  self::arrayToHtml($this->getErrors()));
            redirect(base_url("fiscal/nota-fiscal/editar-nota-fiscal/{$notaFiscal->cod_faturamento_pedido}"), "home", "refresh");
        }

        //Verifica validade do XML
        $descricaoCorrecao = $this->input->post('correcao');
        $sentData = $this->toolsnfe->cartaCorrecao($notaFiscal, $descricaoCorrecao);
        if (false === $sentData) {
            $this->setErrors($this->toolsnfe->getErrors());
            $this->session->set_flashdata('erro', 'Carta de correção não emitida.<br/><br/>' .
                                                  self::arrayToHtml($this->getErrors()));
            redirect(base_url("fiscal/nota-fiscal/editar-nota-fiscal/{$notaFiscal->cod_faturamento_pedido}"), "home", "refresh");
        }

        $faturamento = $this->venda->getFaturamentoPorCodigo($notaFiscal->cod_faturamento_pedido);

        $this->session->set_flashdata('sucesso', 'Carta de correção emitida com sucesso');
        redirect(base_url("fiscal/nota-fiscal/editar-nota-fiscal/{$notaFiscal->cod_faturamento_pedido}"), "home", "refresh");
    }

    public function cancelarNFeAvulsaSubmit(int $codNotaFiscal)
    {
        $notaFiscal = $this->faturamentoNotaFiscal->getByNotaFsicalAvulsa($codNotaFiscal); 
        $notaFiscalId = $notaFiscal->id;

        $notaFiscal = $this->faturamentoNotaFiscal->getByIdAvulsa($notaFiscalId);
        if (!empty($notaFiscal->cStat) && $notaFiscal->cStat != 100) {
            $this->session->set_flashdata('erro', 'Esta nota não pode ser cancelada.');
            redirect(base_url("fiscal/nota-fiscal/editar-nota-fiscal/{$notaFiscal->cod_faturamento_pedido}"), "home", "refresh");
        }

        $this->load->library('ToolsNFe', ['id' => $notaFiscalId]);

        //Verifica status do servidor sefaz
        if (false == $this->toolsnfe->statusSefaz()) {
            $this->setErrors($this->toolsnfe->getErrors());
            $this->session->set_flashdata('erro', 'Servidor SEFAZ indisponível.<br/><br/>' .
                                                  self::arrayToHtml($this->getErrors()));
            redirect(base_url("fiscal/nota-fiscal/editar-nota-fiscal/{$notaFiscal->cod_faturamento_pedido}"), "home", "refresh");
        }

        //Verifica validade do XML
        $motivoCancelamento = $this->input->post('MotivoCancelamento');
        $sentData = $this->toolsnfe->cancelaSefaz($notaFiscal, $motivoCancelamento);
        if (false === $sentData) {
            $this->setErrors($this->toolsnfe->getErrors());
            $this->session->set_flashdata('erro', 'Não foi possível cancelar a nota fiscal.<br/><br/>' .
                                                  self::arrayToHtml($this->getErrors()));
            redirect(base_url("fiscal/nota-fiscal/editar-nota-fiscal/{$notaFiscal->cod_faturamento_pedido}"), "home", "refresh");
        }

        $dados = null;
        $dados = [            
            'status' => 4,
        ];
        $this->fiscal->updateNotaFiscal($codNotaFiscal, $dados);

        // Movimenta Estoque
        $naturezaOperacao = $this->naturezaOperacao->getById($notaFiscal->tb_fis_natureza_operacao_id);
        if($naturezaOperacao->movimenta_estoque == 1){

            if($naturezaOperacao->operacao_fiscal == 1) {

                $produtosNF = $this->faturamentoNotaFiscalItem->getNFeItensNFAvulsa($notaFiscal->id);
                foreach ($produtosNF as $key => $orderItem) {
                    // Movimenta estoque
                    $dadosEstoque = null;
                    $dadosEstoque = [
                        'id_empresa' => getDadosUsuarioLogado()['id_empresa'],
                        'data_movimento' => $notaFiscal->data_emissao,
                        'cod_produto' => $orderItem->cod_produto,
                        'origem_movimento' => 7,
                        'id_origem' => $notaFiscal->cod_faturamento_pedido,
                        'tipo_movimento' => 1,
                        'especie_movimento' => 19,
                        'quant_movimentada' => $orderItem->quantidade,
                        'custo_mat' => $orderItem->quantidade * $orderItem->valor_unitario,
                        'valor_movimento' => $orderItem->quantidade * $orderItem->valor_unitario,
                        'usuario' => getDadosUsuarioLogado()['email'],
                    ];
                    $this->estoque->insertMovimentoEstoque($dadosEstoque);
                }
            }elseif($naturezaOperacao->operacao_fiscal == 0){
                foreach ($produtosNF as $key => $orderItem) {
                    // Movimenta estoque
                    $dadosEstoque = null;
                    $dadosEstoque = [
                        'id_empresa' => getDadosUsuarioLogado()['id_empresa'],
                        'data_movimento' => $notaFiscal->data_emissao,
                        'cod_produto' => $orderItem->cod_produto,
                        'origem_movimento' => 7,
                        'id_origem' => $notaFiscal->cod_faturamento_pedido,
                        'tipo_movimento' => 2,
                        'especie_movimento' => 19,
                        'quant_movimentada' => $orderItem->quantidade,
                        'custo_mat' => $orderItem->quantidade * $orderItem->valor_unitario,
                        'valor_movimento' => $orderItem->quantidade * $orderItem->valor_unitario,
                        'usuario' => getDadosUsuarioLogado()['email'],
                    ];
                    $this->estoque->insertMovimentoEstoque($dadosEstoque);
                }
            }
        }

        $this->session->set_flashdata('sucesso', 'Nota Fiscal cancelada com sucesso');
        redirect(base_url("fiscal/nota-fiscal/editar-nota-fiscal/{$notaFiscal->cod_faturamento_pedido}"), "home", "refresh");
    }

    public function inserirNFCe($numVendaCaixa)
    {
        $empresa = $this->empresa->getEmpresaById(getDadosUsuarioLogado()['id_empresa']);
        $vendaCaixa = $this->venda->getVendaCaixaPorCodigo($numVendaCaixa);

        $message = '';
        $redirect = '';
        $notaFiscal = $this->venda->getNFVendaCaixa($numVendaCaixa);
        
        //Editar
        $nota_fiscal_id = null;
        if($notaFiscal != null)
            $nota_fiscal_id = $notaFiscal->nf_id;

        $naturezaId = $empresa->natureza_caixa;
        if ($naturezaId == null || $naturezaId == 0) { 
            $this->session->set_flashdata('erro', 'Pedido ' . $vendaCaixa->num_venda_caixa . ' não faturado, não definido natureza de operação para frente de caixa');
            redirect(base_url("vendas/frente-caixa/{$vendaCaixa->data_caixa}"), "home", "refresh");
        }

        $naturezaOperacao = $this->naturezaOperacao->getById($naturezaId);
        //Inserir
        if (null === $nota_fiscal_id) {         
            $dados = [
                'id_empresa' => getDadosUsuarioLogado()['id_empresa'],
                'origem_nf' => 2,
                'cod_faturamento_pedido' => $vendaCaixa->num_venda_caixa,
                'cod_cliente' => $vendaCaixa->cod_cliente,
                'data_emissao' => date('Y-m-d H:i:s'),
                'tb_fis_natureza_operacao_id' => $naturezaId,
                'ambiente' => $empresa->ambiente_nfe,
                'indicador_presencial' => $vendaCaixa->indicador_presenca,
                'indicador_final' => 1,
                //'informacoes_complementares' => $naturezaOperacao->informacoes_complementares,
                'serie' => $empresa->serie_nfce,
                'modelo' => $empresa->modelo_nfce,
                'finalidade' => $naturezaOperacao->finalidade,
                'tipo_nfe' => $naturezaOperacao->operacao_fiscal,//Entrada/Saída
            ];
            //Imuttable data
            //idDest
            $dados['indentificador_destino'] = 1;
                
            if($empresa->uf == null || $empresa->uf == ""){
                $this->session->set_flashdata('erro', 'Pedido ' . $vendaCaixa->num_venda_caixa . ' não faturado, sua empresa não possui cidade defnida');
                redirect(base_url("vendas/frente-caixa/{$vendaCaixa->data_caixa}"), "home", "refresh");
            }

            $nota_fiscal_id = $this->faturamentoNotaFiscal->insert($dados);
            
        } else {
            $notaFiscal = $this->faturamentoNotaFiscal->getByIdNFce($nota_fiscal_id);
            if (!empty($notaFiscal->cStat) && $notaFiscal->cStat < 200) {
                $this->session->set_flashdata('erro', 'Este pedido não pode ser mais atualizado, o mesmo já possui uma nota fiscal emitida');
                redirect(base_url('faturamento/pedido/configurar-nfe-edit/' . $nota_fiscal_id), 'home', 'refresh');
            }
            $dados = [
                'id_empresa' => getDadosUsuarioLogado()['id_empresa'],
                'cod_faturamento_pedido' => $vendaCaixa->num_venda_caixa,
                'cod_cliente' => $vendaCaixa->cod_cliente,
                'data_emissao' => date('Y-m-d H:i:s'),
                'tb_fis_natureza_operacao_id' => $naturezaId,
                'ambiente' => $empresa->ambiente_nfe,
                'indicador_presencial' => $vendaCaixa->indicador_presenca,
                'indicador_final' => 1,
                //'informacoes_complementares' => $naturezaOperacao->informacoes_complementares,
                'serie' => $empresa->serie_nfce,
                'modelo' => $empresa->modelo_nfce,
                'finalidade' => $naturezaOperacao->finalidade,
                'tipo_nfe' => $naturezaOperacao->operacao_fiscal,//Entrada/Saída
            ];
            $this->faturamentoNotaFiscal->update($nota_fiscal_id, $dados);

            $message = 'Nota Fiscal atualizada';
            $redirect = 'faturamento/pedido/configurar-nfe-edit/' . $nota_fiscal_id;
        }  
        
        //Inserir itens da nota fiscal
        $result = $this->insertNFceItem($vendaCaixa->num_venda_caixa, $nota_fiscal_id, $empresa, $naturezaOperacao, $vendaCaixa);
        //exit();
        if (!$result) {
            $venda = $this->venda->getFaturamentoPorCodigo($faturamento);
            $this->session->set_flashdata('erro', 'Nenhum item foi inserido na Nota Fiscal');
            redirect(base_url("vendas/frente-caixa/{$vendaCaixa->data_caixa}"), "home", "refresh");
        } 

        //Atualiza calculo dos tributos
        $this->updateNFceItem($nota_fiscal_id);
        $this->emitirNFce($nota_fiscal_id);


        $this->session->set_flashdata('sucesso', 'Nota Fiscal emitida com sucesso');
        redirect(base_url("vendas/frente-caixa/{$vendaCaixa->data_caixa}"), "home", "refresh");
    }

    private function insertNFceItem($numVendaCaixa, $notaFiscalId, $empresa, $naturezaOperacao, $vendaCaixa)
    {
        $this->faturamentoNotaFiscal->deleteAllItens($notaFiscalId);
        $itensFaturados = $this->venda->getProdutoPorVendaCaixa($numVendaCaixa);
        $dadosNFItens = [];

        if($empresa->uf == null || $empresa->uf == ""){
            $this->session->set_flashdata('erro', 'Pedido ' . $vendaCaixa->num_venda_caixa . ' não faturado, sua empresa não possui cidade defnida');
            redirect(base_url("vendas/frente-caixa/{$vendaCaixa->data_caixa}"), "home", "refresh");
        }

        foreach ($itensFaturados as $item) {
            $origem = $this->icms->getICMSOrigemByCodigo($item->cod_origem);
            //$aliquotaICMS = $this->icmsAliquotas->getICMSAliquota($empresa->uf, $cliente->uf);
            //$aliquotaFCP = $this->fcpAliquotas->getFCPAliquota($cliente->uf, $item->cod_ncm, $naturezaOperacao->id);
            /*if($item->cod_ncm == "" || $item->cod_ncm == null){
                $this->session->set_flashdata('erro', 'Pedido ' . $vendaCaixa->num_venda_caixa . ' não faturado, produto (' . $item->cod_produto. ') ' . $item->nome_produto . ' não possui NCM definido');
                redirect(base_url("vendas/frente-caixa/{$vendaCaixa->data_caixa}"), "home", "refresh");
            }*/

            $dadosNFItens[] = [
                'cod_gtin' => $item->cod_gtin,
                'quantidade' => $item->quant_venda,
                'quantidade_tributavel' => $item->quant_venda,
                'valor_unitario' => $item->valor_unit,
                'valor_total_produtos' => ($item->valor_unit * $item->quant_venda),
                'tb_fat_nota_fiscal_id' => $notaFiscalId,
                'faturamento_pedido_id' => $numVendaCaixa,
                'faturamento_pedido_produto_id' => $item->seq_produto,
                'tb_fis_icms_origem_id' => $origem->id,
                'tb_fis_cfop_id' => $naturezaOperacao->tb_fis_cfop_id_estad,
                'tb_fis_icms_cst_id' => $naturezaOperacao->tb_fis_icms_cst_id,
                'tb_fis_icms_csosn_id' => $naturezaOperacao->tb_fis_icms_csosn_id,
                'icms_mod_bc' => $naturezaOperacao->mod_bc,
                'icms_mod_bcst' => $naturezaOperacao->mod_bc_st,
                'icms_pred_bc' => $naturezaOperacao->p_red_bc,
                'icms_pred_bcst' => $naturezaOperacao->p_red_bc_st,
                'icms_pmvast' => $naturezaOperacao->p_mvast,
                'icms_picms' => 0,
                'icms_picms_st' => 0,
                'icms_pfcp' => 0,
                'icms_pfcpst' => 0,
                'icms_pcred_sn' => $empresa->percentual_credito_sn,
                'tb_fis_ipi_cst_id' => $naturezaOperacao->tb_fis_ipi_cst_id,
                'tb_fis_pis_cst_id' => $naturezaOperacao->tb_fis_pis_cst_id,
                'pis_ppis' => $naturezaOperacao->p_pis,
                'tb_fis_cofins_cst_id' => $naturezaOperacao->tb_fis_cofins_cst_id,
                'cofins_pcofins' => $naturezaOperacao->p_cofins,
                'ipi_pipi' => $item->percentual_ipi,
                'ipi_cenq' => $naturezaOperacao->c_enq,
                'unidade_comercial' => $item->cod_unidade_medida,
                'unidade_tributavel' => $item->cod_unidade_medida,
            ];
        }
        return $this->faturamentoNotaFiscal->insertAll($dadosNFItens, $notaFiscalId);
    }

    private function updateNFceItem(int $notaFiscalId)
    {
        $this->recalcularValoresUnitariosNFce($notaFiscalId);
        $this->recalcularImpostosNFce($notaFiscalId);

    }

    private function recalcularValoresUnitariosNFce($notaFiscalId)
    {
        $notaFiscal = $this->faturamentoNotaFiscal->getByIdNFce($notaFiscalId);
        $methodsToBeReSummed = [
            'valor_frete' => (float)$notaFiscal->valor_frete,
            'valor_desconto' => (float)$notaFiscal->valor_desconto,
//            'valorDespesas' => (float)$entity->getValorDespesas(),
//            'valorSeguro' => (float)$entity->getValorSeguro(),
        ];

        foreach ($methodsToBeReSummed as $method => $valorMetodo) {
            //echo $valorMetodo;
            if ($notaFiscal->total_produtos <= 0 || $valorMetodo <= 0) {
                continue;
            }
            $collection = $this->faturamentoNotaFiscalItem->getNFeItens($notaFiscalId);
            $percentualMetodo = (count($collection) > 0 && $valorMetodo > 0)
                ? ($valorMetodo / $notaFiscal->total_produtos) : 0;
            $loop = 0;
            $unitValue = 0;
            foreach ($collection as $item) {
                $loop++;
                $novoValorMetodo = $percentualMetodo *
                                   ((float)$item->valor_unitario * (float)$item->quantidade);
                $unitValue += $valorMetodo;//Soma individualmente valor do desconto do item para conferir no final
                if ($loop == count($collection)) {//se for a ultima linha
                    //se o total unitario for menor que o valor do item insere no ultimo registro a diferença
                    if ($unitValue < $valorMetodo) {
                        $novoValorMetodo += ($valorMetodo - $unitValue);
                    }
                }

                //Ex: valorDesconto = setValorDesconto
                $this->faturamentoNotaFiscalItem->update($item->id, [$method => round($novoValorMetodo, 2)]);
                
            }
        }

    }

    private function recalcularImpostosNFce(int $notaFiscalId)
    {
        $this->load->library('NFeImpostos');
        $collection = $this->faturamentoNotaFiscalItem->getNFeItensNFce($notaFiscalId);
        foreach ($collection as $item) {
            $this->nfeimpostos->defineICMS($item);
            $this->nfeimpostos->defineICMSSN($item);
            $this->nfeimpostos->defineIPI($item);
            $this->nfeimpostos->definePIS($item);
            $this->nfeimpostos->defineCOFINS($item);
        }
    }

    public function emitirNFce(int $notaFiscalId)
    {
        //Verifica se já existe uma nota com mesmo ID
        $notaFiscal = $this->faturamentoNotaFiscal->getByIdNFce($notaFiscalId);
        $data = $notaFiscal->data_caixa;
        if (!empty($notaFiscal->cStat) && $notaFiscal->cStat < 200) {
            $this->session->set_flashdata('erro', 'Esta venda não pode ser mais atualizado, o mesmo já possui uma nota fiscal emitida');
            redirect(base_url("vendas/frente-caixa/{$data}"), "home", "refresh");
        }        
        
        $xml = $this->generateXMLNFce($notaFiscalId);
        if (false === $xml) {
            $this->setErrors($this->getErrors());
            $this->session->set_flashdata('erro', 'Não foi possível emitir a nota fiscal para a venda <strong>' . $notaFiscal->cod_faturamento_pedido . '</strong>. Corrija os erros antes de tentar novamente:<br/>' .
                                                   self::arrayToHtml($this->getErrors()));
                                                   
            redirect(base_url("vendas/frente-caixa/{$data}"), "home", "refresh");
        }
        $this->load->library('ToolsNFce', ['id' => $notaFiscalId]);          

        //Verifica status do servidor sefaz
        try{
            if (false == $this->toolsnfce->statusSefaz()) {
                $this->setErrors($this->toolsnfce->getErrors());
                $this->session->set_flashdata('erro', 'Servidor SEFAZ indisponível.<br/><br/>' . self::arrayToHtml($this->getErrors()));
                redirect(base_url("vendas/frente-caixa/{$data}"), "home", "refresh");
            }
        } catch (Exception $e){
            //$this->setErrors($eIde->getMessage());
            $this->session->set_flashdata('erro', 'Erro comunicação com SEFAZ<br/><br/>' . "Verifique seu certificado digital");
            redirect(base_url("vendas/frente-caixa/{$data}"), "home", "refresh");
                           
        }  

        //Verifica validade do XML
        $sentData = $this->toolsnfce->sendSefaz($xml);
        if (false === $sentData) {
            $this->setErrors($this->toolsnfce->getErrors());
            $this->session->set_flashdata('erro', 'Não foi possível emitir a nota fiscal para a venda <strong>' . $notaFiscal->cod_faturamento_pedido . '</strong>. Corrija os erros antes de tentar novamente:<br/>' .
                                                   self::arrayToHtml($this->getErrors()));
                                                   
            redirect(base_url("vendas/frente-caixa/{$data}"), "home", "refresh");
        }elseif(isset($sentData->cStat) && $sentData->cStat > 200) {

            $this->session->set_flashdata('erro', 'Não foi possível emitir a nota fiscal para a venda <strong>' . $notaFiscal->cod_faturamento_pedido . '</strong>. Corrija os erros antes de tentar novamente:<br/>' .
                                                  '(' . $sentData->cStat . ') ' . $sentData->xMotivo);
                                                   
            redirect(base_url("vendas/frente-caixa/{$data}"), "home", "refresh");

        }

        //Salva dados enviados
        $stdCl = new \NFePHP\NFe\Common\Standardize($xml);
        $std = $stdCl->toStd();

        $dados = [
            'chave' => self::onlyNumbers($std->infNFe->attributes->Id),
            'numero' => ($std->infNFe->ide->nNF),
            'data_emissao' => self::dataSefazToMySQLDateTime($std->infNFe->ide->dhEmi),
            'data_saida_entrada' => ($std->infNFe->ide->dhEmi),
            'tipo_emissao' => ($std->infNFe->ide->tpEmis),
            'indicador_final' => ($std->infNFe->ide->indFinal),
            'indicador_presencial' => ($std->infNFe->ide->indPres),
            'processo_emissao' => ($std->infNFe->ide->procEmi),
        ];
        $merged = array_merge($dados, $sentData);
        if ($merged['numero_lote']) {//Se houver número do lote, documento foi recebido pela Sefaz
            //sleep(1);
            //$dadosRetorno = $this->toolsnfce->atualizaNotaFiscalRetornoRecibo($merged['recibo']);
            //$merged = array_merge($dadosRetorno, $merged);
            if ($merged['c_stat'] == 100) {//Atualiza numeração NF-e na empresa
                $this->empresa->updateEmpresa(getDadosUsuarioLogado()['id_empresa'], ['num_ultima_nfce' => $merged['numero']]);
            }
        }

        //Atualiza dados da nota fiscal enviada
        $this->faturamentoNotaFiscal->update($notaFiscalId, $merged);

        $faturamento = $this->venda->getFaturamentoPorCodigo($notaFiscal->cod_faturamento_pedido);

        if($merged['c_stat'] != 100) {
            $this->session->set_flashdata('erro', $merged['x_motivo']);
            redirect(base_url("vendas/frente-caixa/{$data}"), "home", "refresh");
        }
    }

    public function cancelarNFceSubmit($notaFiscalId)
    {
        $motivoCancelamento = $this->input->post('MotivoCancelamento');

        $notaFiscal = $this->faturamentoNotaFiscal->getByIdNFce($notaFiscalId);
        if (!empty($notaFiscal->cStat) && $notaFiscal->cStat != 100) {
            $this->session->set_flashdata('erro', 'Esta nota não pode ser cancelada.');
            redirect(base_url("vendas/frente-caixa/{$notaFiscal->data_caixa}"), "home", "refresh");
        }

        $this->load->library('ToolsNFce', ['id' => $notaFiscalId]);

        //Verifica status do servidor sefaz
        if (false == $this->toolsnfce->statusSefaz()) {
            $this->setErrors($this->toolsnfce->getErrors());
            $this->session->set_flashdata('erro', 'Servidor SEFAZ indisponível.<br/><br/>' .
                                                  self::arrayToHtml($this->getErrors()));
            redirect(base_url("vendas/frente-caixa/{$notaFiscal->data_caixa}"), "home", "refresh");
        }

        //Verifica validade do XML        
        $sentData = $this->toolsnfce->cancelaSefaz($notaFiscal, $motivoCancelamento);      
        if (false === $sentData) {
            $this->setErrors($this->toolsnfce->getErrors());
            $this->session->set_flashdata('erro', 'Não foi possível cancelar a nota fiscal.<br/><br/>' .
                                                  self::arrayToHtml($this->getErrors()));
            redirect(base_url("vendas/frente-caixa/{$notaFiscal->data_caixa}"), "home", "refresh");
        }elseif($sentData->retEvento->infEvento->cStat > 200) {

            $this->session->set_flashdata('erro', 'Não foi possível emitir a nota fiscal para a venda ' . $notaFiscal->cod_faturamento_pedido . '. Corrija os erros antes de tentar novamente.<br/><br/>' .
                                                  '(' . $sentData->retEvento->infEvento->cStat . ') ' . $sentData->retEvento->infEvento->xMotivo);

            redirect(base_url("vendas/frente-caixa/{$notaFiscal->data_caixa}"), "home", "refresh");

        }     

        $this->session->set_flashdata('sucesso', 'Nota Fiscal cancelada com sucesso');
        redirect(base_url("vendas/frente-caixa/{$notaFiscal->data_caixa}"), "home", "refresh");
    }

    /**
     * Retorna string XML ou string vazia
     * @param $notaFiscalId
     * @return string
     */
    public function simulateXML(int $notaFiscalId)
    {
        $xml = $this->generateXML($notaFiscalId);
        if (false === $xml) {
            return '';
        }
        $dom = new \DOMDocument();
        $dom->loadXML($xml);
        $dom->preserveWhiteSpace = FALSE;
        $dom->formatOutput = TRUE;
        $this->chaveNFe = $dom->getElementsByTagName('infNFe')->item(0)->getAttribute('Id');
        $xml = $dom->saveXML();
        $fh = fopen($this->commonnfe->temDir . $this->chaveNFe . '-nfe.xml', 'w+');
        fwrite($fh, $xml);
        return str_replace('<', '&lt', $xml);
    }

    public function simulateXMLAvulso(int $notaFiscalId)
    {
        $xml = $this->generateXMLAvulsa($notaFiscalId);
        if (false === $xml) {
            return '';
        }
        $dom = new \DOMDocument();
        $dom->loadXML($xml);
        $dom->preserveWhiteSpace = FALSE;
        $dom->formatOutput = TRUE;
        $this->chaveNFe = $dom->getElementsByTagName('infNFe')->item(0)->getAttribute('Id');
        $xml = $dom->saveXML();
        $fh = fopen($this->commonnfe->temDir . $this->chaveNFe . '-nfe.xml', 'w+');
        fwrite($fh, $xml);
        return str_replace('<', '&lt', $xml);
    }

    public function configureNotaFiscalAvulsaSubmit($codNotaFiscal)
    {
        $empresa = $this->empresa->getEmpresaById(getDadosUsuarioLogado()['id_empresa']);
        $notaFiscal = $this->faturamentoNotaFiscal->getByNotaFsicalAvulsa($codNotaFiscal); 
        $avulsa = $this->fiscal->getNotaFiscalporCodigo($codNotaFiscal); 
        $codNotaFiscal = $avulsa->cod_nota_fiscal;
        $cliente = $this->faturamentoNotaFiscal->getClienteByFaturamentoIdAvulsa($codNotaFiscal);    

        //Editar
        $nota_fiscal_id = null;
        if($notaFiscal != null)
            $nota_fiscal_id = $notaFiscal->id;

        $naturezaOperacao = $this->naturezaOperacao->getById($avulsa->id_natureza_operacao);
        //Inserir
        if (null === $nota_fiscal_id) { 
                    
            $dados = [
                'id_empresa' => getDadosUsuarioLogado()['id_empresa'],
                'origem_nf' => 3,
                'cod_faturamento_pedido' => $codNotaFiscal,
                'cod_cliente' => $cliente->cod_cliente,
                'data_emissao' => $avulsa->data_emissao,
                'x_ped' => $avulsa->x_ped,
                'tb_fis_natureza_operacao_id' => $avulsa->id_natureza_operacao,
                'ambiente' => $empresa->ambiente_nfe,
                'indicador_presencial' => $avulsa->indicador_presenca,
                'indicador_final' => $avulsa->indicador_final,
                'informacoes_complementares' => $avulsa->inf_complementar . ' - ' . $naturezaOperacao->informacoes_complementares,
                'quant_volume' => $avulsa->quant_volume,
                'especie_volume' => $avulsa->especie_volume,
                'marca' => $avulsa->marca,
                'placa_veiculo' => $avulsa->placa_veiculo,
                'cod_antt' => $avulsa->cod_antt,
                'uf_veiculo' => $avulsa->uf_veiculo,
                'serie' => $empresa->serie,
                'modelo' => $empresa->modelo,
                'finalidade' => $naturezaOperacao->finalidade,
                'tipo_nfe' => $naturezaOperacao->operacao_fiscal,
                'nf_referencia' => $avulsa->nf_referencia,
            ];
            //Imuttable data
            //idDest
            $dados['indentificador_destino'] = ($empresa->codigo_uf != $cliente->codigo_uf) ? 2 : 1;
            
            if($empresa->uf == null || $empresa->uf == ""){
                $this->session->set_flashdata('erro', 'Nota Fiscal não cadastrada, sua empresa não possui cidade defnida');
                redirect(base_url("fiscal/nota-fiscal/editar-nota-fiscal/{$codNotaFiscal}"), "home", "refresh");
            }
    
            if($cliente->uf == null || $cliente->uf == ""){
                $this->session->set_flashdata('erro', 'Nota Fiscal não cadastrada, seu cliente não possui cidade definida');
                redirect(base_url("fiscal/nota-fiscal/editar-nota-fiscal/{$codNotaFiscal}"), "home", "refresh");
            }
            //1
            $nota_fiscal_id = $this->faturamentoNotaFiscal->insert($dados);
                        
        } else {
            if (!empty($notaFiscal->cStat) && $notaFiscal->cStat < 200) {
                $this->session->set_flashdata('erro', 'Este pedido não pode ser mais atualizado, o mesmo já possui uma nota fiscal emitida');
                redirect(base_url("fiscal/nota-fiscal/editar-nota-fiscal/{$codNotaFiscal}"), "home", "refresh");
            }
            $dados = [
                'cod_cliente' => $cliente->cod_cliente,
                'data_emissao' => $avulsa->data_emissao,
                'x_ped' => $avulsa->x_ped,
                'tb_fis_natureza_operacao_id' => $avulsa->id_natureza_operacao,
                'ambiente' => $empresa->ambiente_nfe,
                'indicador_presencial' => $avulsa->indicador_presenca,
                'indicador_final' => $avulsa->indicador_final,
                'informacoes_complementares' => $avulsa->inf_complementar . ' - ' . $naturezaOperacao->informacoes_complementares,
                'quant_volume' => $avulsa->quant_volume,
                'especie_volume' => $avulsa->especie_volume,
                'marca' => $avulsa->marca,
                'placa_veiculo' => $avulsa->placa_veiculo,
                'cod_antt' => $avulsa->cod_antt,
                'uf_veiculo' => $avulsa->uf_veiculo,
                'serie' => $empresa->serie,
                'modelo' => $empresa->modelo,
                'finalidade' => $naturezaOperacao->finalidade,
                'tipo_nfe' => $naturezaOperacao->operacao_fiscal,
                'nf_referencia' => $avulsa->nf_referencia,
            ];
            $dados['indentificador_destino'] = ($empresa->codigo_uf != $cliente->codigo_uf) ? 2 : 1;

            $this->faturamentoNotaFiscal->update($nota_fiscal_id, $dados);
        }

        //Inserir itens da nota fiscal
        $result = $this->insertNFeItemAvulsa($codNotaFiscal, $nota_fiscal_id, $empresa, $cliente, $naturezaOperacao);
        //exit();
        if (!$result) {
            $this->session->set_flashdata('erro', 'Não foi possível inserir itens na nota fiscal');
            redirect(base_url("fiscal/nota-fiscal/editar-nota-fiscal/{$codNotaFiscal}"), "home", "refresh");
        }

        //Atualiza calculo dos tributos
        $this->updateNFAvulsaItem($nota_fiscal_id);

        $infComplementares = "";
        if($avulsa->inf_complementar != null || $avulsa->inf_complementar != ""){
            $infComplementares = $avulsa->inf_complementar;
        }

        if($naturezaOperacao->informacoes_complementares  != null || $naturezaOperacao->informacoes_complementares  != ""){
            if($infComplementares != ""){
                $infComplementares = ' - ' . $naturezaOperacao->informacoes_complementares;
            }else{
                $infComplementares = $naturezaOperacao->informacoes_complementares;
            }

        }

        $infCompProcessada = $this->processaInfComplementar($infComplementares, $nota_fiscal_id, $empresa);

        $dados = null;
        $dados = [
            'informacoes_complementares' => $infCompProcessada,
        ];
        $this->faturamentoNotaFiscal->update($nota_fiscal_id, $dados);

        $xml = $this->simulateXMLAvulso($nota_fiscal_id);
        if (!$xml) {
            $this->session->set_flashdata('erro',
                'Não foi possível gerar o XML, corrija os erros abaixo antes de tentar novamente:<br>'
                . self::arrayToHtml($this->getErrors()));
            redirect(base_url("fiscal/nota-fiscal/editar-nota-fiscal/{$codNotaFiscal}"), "home", "refresh");
        }

        $dados = null;
        $dados = [            
            'inf_complementar' => $infCompProcessada,
            'status' => 2,
        ];
        $this->fiscal->updateNotaFiscal($avulsa->cod_nota_fiscal, $dados);        

        $this->session->set_flashdata('sucesso', "Nota Fiscal calculada com sucesso");
        redirect(base_url("fiscal/nota-fiscal/editar-nota-fiscal/{$codNotaFiscal}"), "home", "refresh");
    }

    private function insertNFeItemAvulsa($codNotaFiscal, $notaFiscalId, $empresa, $cliente, $naturezaOperacao)
    {
        $this->faturamentoNotaFiscal->deleteAllItens($notaFiscalId);
        $itensFaturados = $this->fiscal->getProdutosPorNF($codNotaFiscal);
        $dadosNFItens = [];

        $avulsa = $this->fiscal->getNotaFiscalporCodigo($codNotaFiscal); 

        if($empresa->uf == null || $empresa->uf == ""){
            $this->session->set_flashdata('erro', 'Nota Fiscal não cadastrada, sua empresa não possui cidade defnida');
            redirect(base_url("fiscal/nota-fiscal/editar-nota-fiscal/{$codNotaFiscal}"), "home", "refresh");
        }

        if($cliente->uf == null || $cliente->uf == ""){
            $this->session->set_flashdata('erro', 'Nota Fiscal não cadastrada, seu cliente não possui cidade definida');
            redirect(base_url("fiscal/nota-fiscal/editar-nota-fiscal/{$codNotaFiscal}"), "home", "refresh");
        }

        foreach ($itensFaturados as $item) {
            $origem = $this->icms->getICMSOrigemByCodigo($item->cod_origem);
            $aliquotaICMS = $this->icmsAliquotas->getICMSAliquota($cliente->uf, $naturezaOperacao->id);
            $aliquotaFCP = $this->fcpAliquotas->getFCPAliquota($cliente->uf, $item->cod_ncm, $naturezaOperacao->id);
            $dadosNFItens[] = [
                'cod_gtin' => $item->cod_gtin,
                'quantidade' => $item->quantidade,
                'quantidade_tributavel' => $item->quantidade,
                'valor_unitario' => $item->valor_unitario,
                'valor_total_produtos' => ($item->valor_unitario * $item->quantidade),
                'tb_fat_nota_fiscal_id' => $notaFiscalId,
                'faturamento_pedido_id' => $codNotaFiscal,
                'faturamento_pedido_produto_id' => $item->seq_produto_nf,
                'tb_fis_icms_origem_id' => $origem->id,
                'tb_fis_cfop_id' => ($empresa->codigo_uf != $cliente->codigo_uf) ? $naturezaOperacao->tb_fis_cfop_id_inter : $naturezaOperacao->tb_fis_cfop_id_estad,
                'tb_fis_icms_cst_id' => $naturezaOperacao->tb_fis_icms_cst_id,
                'tb_fis_icms_csosn_id' => $naturezaOperacao->tb_fis_icms_csosn_id,
                'icms_mod_bc' => $naturezaOperacao->mod_bc,
                'icms_mod_bcst' => $naturezaOperacao->mod_bc_st,
                'icms_pred_bc' => $naturezaOperacao->p_red_bc,
                'icms_pred_bcst' => $naturezaOperacao->p_red_bc_st,
                'icms_pmvast' => $naturezaOperacao->p_mvast,
                'icms_picms' => $aliquotaICMS,
                'icms_picms_st' => $aliquotaICMS,
                'icms_pfcp' => $aliquotaFCP,
                'icms_pfcpst' => $aliquotaFCP,
                'icms_pcred_sn' => $empresa->percentual_credito_sn,
                'tb_fis_ipi_cst_id' => $naturezaOperacao->tb_fis_ipi_cst_id,
                'tb_fis_pis_cst_id' => $naturezaOperacao->tb_fis_pis_cst_id,
                'pis_ppis' => $naturezaOperacao->p_pis,
                'tb_fis_cofins_cst_id' => $naturezaOperacao->tb_fis_cofins_cst_id,
                'cofins_pcofins' => $naturezaOperacao->p_cofins,
                'ipi_pipi' => $item->percentual_ipi,
                'ipi_cenq' => $naturezaOperacao->c_enq,
                'unidade_comercial' => $item->cod_unidade_medida,
                'unidade_tributavel' => $item->cod_unidade_medida,
            ];
        }
        return $this->faturamentoNotaFiscal->insertAll($dadosNFItens, $notaFiscalId);
    }

    public function emitirNFAvulsa(int $codNotaFiscal)
    {

        $notaFiscal = $this->faturamentoNotaFiscal->getByNotaFsicalAvulsa($codNotaFiscal); 
        $notaFiscalId = $notaFiscal->id;
        //Verifica se já existe uma nota com mesmo ID
        $notaFiscal = $this->faturamentoNotaFiscal->getByIdAvulsa($notaFiscalId);
        if (!empty($notaFiscal->cStat) && $notaFiscal->cStat < 200) {
            $this->session->set_flashdata('erro', 'Este pedido não pode ser mais atualizado, o mesmo já possui uma nota fiscal emitida');
            redirect(base_url("fiscal/nota-fiscal/editar-nota-fiscal/{$notaFiscal->cod_faturamento_pedido}"), "home", "refresh");
        }
        $xml = $this->generateXMLAvulsa($notaFiscalId);
        $this->load->library('ToolsNFe', ['id' => $notaFiscalId]);

        //Verifica status do servidor sefaz
        if (false == $this->toolsnfe->statusSefaz()) {
            $this->setErrors($this->toolsnfe->getErrors());
            $this->session->set_flashdata('erro', 'Servidor SEFAZ indisponível.<br/><br/>' .
                                                  self::arrayToHtml($this->getErrors()));
            redirect(base_url("fiscal/nota-fiscal/editar-nota-fiscal/{$notaFiscal->cod_faturamento_pedido}"), "home", "refresh");
        }

        //Verifica validade do XML
        $sentData = $this->toolsnfe->sendSefaz($xml);
        if (false === $sentData) {
            $this->setErrors($this->toolsnfe->getErrors());
            $this->session->set_flashdata('erro', 'Não foi possível emitir a nota fiscal. Corrija os erros antes de tentar novamente.<br/><br/>' .
                                                  self::arrayToHtml($this->getErrors()));
            redirect(base_url("fiscal/nota-fiscal/editar-nota-fiscal/{$notaFiscal->cod_faturamento_pedido}"), "home", "refresh");
        }elseif(isset($sentData->cStat) && $sentData->cStat > 200) {

            $this->session->set_flashdata('erro', 'Não foi possível emitir a nota fiscal para a venda <strong>' . $notaFiscal->cod_faturamento_pedido . '</strong>. Corrija os erros antes de tentar novamente:<br/>' .
                                                  '(' . $sentData->cStat . ') ' . $sentData->xMotivo);
                                                   
            redirect(base_url("fiscal/nota-fiscal/editar-nota-fiscal/{$notaFiscal->cod_faturamento_pedido}"), "home", "refresh");

        }

        //Salva dados enviados
        $stdCl = new \NFePHP\NFe\Common\Standardize($xml);
        $std = $stdCl->toStd();

        $dados = [
            'chave' => self::onlyNumbers($std->infNFe->attributes->Id),
            'numero' => ($std->infNFe->ide->nNF),
            'data_emissao' => self::dataSefazToMySQLDateTime($std->infNFe->ide->dhEmi),
            'data_saida_entrada' => ($std->infNFe->ide->dhEmi),
            'tipo_emissao' => ($std->infNFe->ide->tpEmis),
            'indicador_final' => ($std->infNFe->ide->indFinal),
            'indicador_presencial' => ($std->infNFe->ide->indPres),
            'processo_emissao' => ($std->infNFe->ide->procEmi),
        ];
        $merged = array_merge($dados, $sentData);
        if ($merged['recibo']) {//Se houver número do recibo, documento foi recebido pela Sefaz
            sleep(1);
            $dadosRetorno = $this->toolsnfe->atualizaNotaFiscalRetornoRecibo($merged['recibo']);
            $merged = array_merge($dadosRetorno, $merged);
            if ($merged['c_stat'] == 100) {//Atualiza numeração NF-e na empresa
                $this->empresa->updateEmpresa(getDadosUsuarioLogado()['id_empresa'], ['num_ultima_nf' => $merged['numero']]);
            }
        }

        //Atualiza dados da nota fiscal enviada
        $this->faturamentoNotaFiscal->update($notaFiscalId, $merged);

        $faturamento = $this->venda->getFaturamentoPorCodigo($notaFiscal->cod_faturamento_pedido);

        if($merged['c_stat'] != 100){
            $this->session->set_flashdata('erro', 'Não foi possível emitir a nota fiscal. Corrija os erros antes de tentar novamente:<br/>' .
                                                  '(' . $merged['c_stat'] . ') ' . $merged['x_motivo']);                                                   
            redirect(base_url("fiscal/nota-fiscal/editar-nota-fiscal/{$notaFiscal->cod_faturamento_pedido}"), "home", "refresh");
        }

        $dados = null;
        $dados = [            
            'status' => 3,
        ];
        $this->fiscal->updateNotaFiscal($codNotaFiscal, $dados);

        // Movimenta Estoque
        $naturezaOperacao = $this->naturezaOperacao->getById($notaFiscal->tb_fis_natureza_operacao_id);
		$produtosNF = $this->faturamentoNotaFiscalItem->getNFeItensNFAvulsa($notaFiscal->id);
        if($naturezaOperacao->movimenta_estoque == 1){

            if($naturezaOperacao->operacao_fiscal == 1) {

                
                foreach ($produtosNF as $key => $orderItem) {
                    // Movimenta estoque
                    $dadosEstoque = null;
                    $dadosEstoque = [
                        'id_empresa' => getDadosUsuarioLogado()['id_empresa'],
                        'data_movimento' => $notaFiscal->data_emissao,
                        'cod_produto' => $orderItem->cod_produto,
                        'origem_movimento' => 7,
                        'id_origem' => $notaFiscal->cod_faturamento_pedido,
                        'tipo_movimento' => 2,
                        'especie_movimento' => 18,
                        'quant_movimentada' => $orderItem->quantidade,
                        'custo_mat' => $orderItem->quantidade * $orderItem->valor_unitario,
                        'valor_movimento' => $orderItem->quantidade * $orderItem->valor_unitario,
                        'usuario' => getDadosUsuarioLogado()['email'],
                    ];
                    $this->estoque->insertMovimentoEstoque($dadosEstoque);
                }
            }elseif($naturezaOperacao->operacao_fiscal == 0){
                foreach ($produtosNF as $key => $orderItem) {
                    // Movimenta estoque
                    $dadosEstoque = null;
                    $dadosEstoque = [
                        'id_empresa' => getDadosUsuarioLogado()['id_empresa'],
                        'data_movimento' => $notaFiscal->data_emissao,
                        'cod_produto' => $orderItem->cod_produto,
                        'origem_movimento' => 7,
                        'id_origem' => $notaFiscal->cod_faturamento_pedido,
                        'tipo_movimento' => 1,
                        'especie_movimento' => 18,
                        'quant_movimentada' => $orderItem->quantidade,
                        'custo_mat' => $orderItem->quantidade * $orderItem->valor_unitario,
                        'valor_movimento' => $orderItem->quantidade * $orderItem->valor_unitario,
                        'usuario' => getDadosUsuarioLogado()['email'],
                    ];
                    $this->estoque->insertMovimentoEstoque($dadosEstoque);
                }
            }
        }

        $this->session->set_flashdata('sucesso', 'Nota Fiscal emitida com sucesso');
        redirect(base_url("fiscal/nota-fiscal/editar-nota-fiscal/{$notaFiscal->cod_faturamento_pedido}"), "home", "refresh");
    }

    private function updateNFAvulsaItem(int $notaFiscalId)
    {
        //$this->recalcularValoresUnitariosNFAvulsa($notaFiscalId);
        $this->recalcularImpostosNFAvulsa($notaFiscalId);

    }

    private function recalcularValoresUnitariosNFAvulsa($notaFiscalId)
    {
        $notaFiscal = $this->faturamentoNotaFiscal->getByIdNFce($notaFiscalId);
        $methodsToBeReSummed = [
            'valor_frete' => (float)$notaFiscal->valor_frete,
            'valor_desconto' => (float)$notaFiscal->valor_desconto,
            'valorDespesas' => (float)$notaFiscal->outras_despesas,
            'valorSeguro' => (float)$notaFiscal->valor_seguro,
        ];

        foreach ($methodsToBeReSummed as $method => $valorMetodo) {
            //echo $valorMetodo;
            if ($notaFiscal->total_produtos <= 0 || $valorMetodo <= 0) {
                continue;
            }
            $collection = $this->faturamentoNotaFiscalItem->getNFeItens($notaFiscalId);
            $percentualMetodo = (count($collection) > 0 && $valorMetodo > 0)
                ? ($valorMetodo / $notaFiscal->total_produtos) : 0;
            $loop = 0;
            $unitValue = 0;
            foreach ($collection as $item) {
                $loop++;
                $novoValorMetodo = $percentualMetodo *
                                   ((float)$item->valor_unitario * (float)$item->quantidade);
                $unitValue += $valorMetodo;//Soma individualmente valor do desconto do item para conferir no final
                if ($loop == count($collection)) {//se for a ultima linha
                    //se o total unitario for menor que o valor do item insere no ultimo registro a diferença
                    if ($unitValue < $valorMetodo) {
                        $novoValorMetodo += ($valorMetodo - $unitValue);
                    }
                }

                //Ex: valorDesconto = setValorDesconto
                $this->faturamentoNotaFiscalItem->update($item->id, [$method => round($novoValorMetodo, 2)]);
                
            }
        }

    }

    private function recalcularImpostosNFAvulsa(int $notaFiscalId)
    {
        $this->load->library('NFeImpostos');
        $collection = $this->faturamentoNotaFiscalItem->getNFeItensNFAvulsa($notaFiscalId);
        foreach ($collection as $item) {
            $this->nfeimpostos->defineICMS($item);
            $this->nfeimpostos->defineICMSSN($item);
            $this->nfeimpostos->defineIPI($item);
            $this->nfeimpostos->definePIS($item);
            $this->nfeimpostos->defineCOFINS($item);
        }
    }
    /**
     * Método simulador de arquivo PDF da DaNFe
     * Retorno PDF browser output ou redirect com motivo do erro
     * @param int $notaFiscalId
     */
    public function simulateDaNFeAvulsa(int $notaFiscalId)
    {
        $pdf = $this->renderDanfeAvulsa($notaFiscalId);
        if (!$pdf) {
            $this->session->set_flashdata('erro',
                'Não foi possível gerar o XML, corrija os erros abaixo antes de tentar novamente:<br>'
                . self::arrayToHtml($this->getErrors()));
            echo "<center>" . $this->session->flashdata('erro') . "</center>";
            $this->session->set_flashdata('erro', '');
            //redirect(base_url('fiscal/nota-fiscal/editar-nota-fiscal/' . $notaFiscalId), 'home', 'refresh');
        }else{
            header("Content-Type: application/pdf");
            echo $pdf;
        }
    }    

    private function renderDanfeAvulsa(int $notaFiscalId)
    {
        $empresa = $this->empresa->getEmpresaById(getDadosUsuarioLogado()['id_empresa']);
        //Verifica se nota está aprovada
        $notaFiscal = $this->faturamentoNotaFiscal->getByIdAvulsa($notaFiscalId);
        if ($notaFiscal->c_stat == 100 &&
            is_file($this->commonnfe->aprDir) . $notaFiscal->chave . '-nfe.xml') {
            //$xml = file_get_contents(base_url($this->commonnfe->aprDir) . $notaFiscal->chave . '-nfe.xml', false, $context);
            $xml = file_get_contents($this->commonnfe->aprDir . $notaFiscal->chave . '-nfe.xml');
        } else {//Gera XML genérico
            $xml = $this->generateXMLAvulsa($notaFiscalId);
        }
        if (!$xml) {
            $this->setErrors('XML não encontrado.');
            return false;
        }
        $logo = "";
        if($empresa->caminho_logo != ""){
            $logo =  "data://text/plain;base64,". base64_encode(file_get_contents("clientes/" . $empresa->id_empresa . "/logo/" . $empresa->caminho_logo));
        }
        $danfe = new NFePHP\DA\NFe\Danfe($xml);
        try {
            $danfe->exibirTextoFatura = false;
            $danfe->exibirPIS = false;
            $danfe->exibirIcmsInterestadual = false;
            $danfe->exibirValorTributos = false;
            $danfe->descProdInfoComplemento = false;
            $danfe->setOcultarUnidadeTributavel(true);
            $danfe->obsContShow(false);
            $danfe->printParameters(
                $orientacao = 'P',
                $papel = 'A4',
                $margSup = 2,
                $margEsq = 2
            );
            $danfe->logoParameters($logo, $logoAlign = 'L', $mode_bw = false);
            $danfe->setDefaultFont($font = 'times');
            $danfe->setDefaultDecimalPlaces(4);
            $danfe->debugMode(false);
            $danfe->creditsIntegratorFooter('Emitido por ShopFloor');
            $pdf = $danfe->render($logo);
            return $pdf;

        } catch (\InvalidArgumentException $e) {
            $this->setErrors("Ocorreu um erro durante o processamento [IA]:" . $e->getMessage());
        } catch (\Error $exception) {
            $this->setErrors('Ocorreu um erro durante o processamento [Er]' . $exception->getMessage());
        } catch (\Exception $exception) {
            $this->setErrors('Ocorreu um erro durante o processamento [Ex]' . $exception->getMessage());
        }
        return false;
    }

    private function generateXMLAvulsa(int $notaFiscalId)
    {
        //Carrega lib responsável pela geração do XML
        $this->load->library('MakeNFeAvulsa', ['id' => $notaFiscalId]);
        try{
            $this->makenfeavulsa->getInfNFe();
        } catch (Exception $eInfNFe){
            $this->setErrors($eInfNFe->getMessage());
            return false;                
        }          

        //Identificação da NF-e
        try{
            $this->makenfeavulsa->getIde();
        } catch (Exception $eIde){
            $this->setErrors($eIde->getMessage());
            return false;                
        } 

        //Nota fiscal de referência
        try{
            $this->makenfeavulsa->getRefNFe();
        } catch (Exception $eRefNFe){
            $this->setErrors($eRefNFe->getMessage());
            return false;                
        }

        //Emitente
        try{
            $this->makenfeavulsa->getEmit();
        } catch (Exception $eEmit){
            $this->setErrors($eEmit->getMessage());
            return false;                
        } 

        //Destinatário
        try{
            $this->makenfeavulsa->getDest();
        } catch (Exception $eDest){
            $this->setErrors($eDest->getMessage());
            return false;                
        }

        //Itens
        try{
            $this->makenfeavulsa->getItens();
        } catch (Exception $eItens){
            $this->setErrors($eItens->getMessage());
            return false;                
        }

        //Transporte
        try{
            $this->makenfeavulsa->getTransporte();
        } catch (Exception $eTransporte){
            $this->setErrors($eTransporte->getMessage());
            return false;                
        }  

        //Respnsável Técnico
        $this->makenfeavulsa->getResponsavelTecnico();

        //Faturamento
        try{
            $this->makenfeavulsa->getFaturamento();
        } catch (Exception $ePagamento){
            $this->setErrors($ePagamento->getMessage());
            return false;                
        }

        //Informações Complementares
        try{
            $this->makenfeavulsa->getInformacoesComplementares();
        } catch (Exception $eInformacoesComplementares){
            $this->setErrors($eInformacoesComplementares->getMessage());
            return false;                
        } 

        if ($xml = $this->makenfeavulsa->monta()) {
            return $this->makenfeavulsa->xml;
        }

        $this->setErrors($this->makenfeavulsa->getErrors());

        return false;
    }

    public function simulateDaNFe(int $notaFiscalId)
    {
        $pdf = $this->renderDanfe($notaFiscalId);
        if (!$pdf) {
            $this->session->set_flashdata('erro',
                'Não foi possível gerar o XML, corrija os erros abaixo antes de tentar novamente:<br>'
                . self::arrayToHtml($this->getErrors()));
            redirect(base_url('faturamento/pedido/configurar-nfe-edit/' . $notaFiscalId), 'home', 'refresh');
        }
        header("Content-Type: application/pdf");
        echo $pdf;
    }

    /**
     * Método responsável por gerar o XML da DaNFe em string
     * Construção feita pela library MakeNFe
     *
     * @param int $notaFiscalId - ID da nota fiscal tabela: tb_fat_nota_fiscal
     * @return string|false string em xml no padrão Sefaz ou erro
     */
    private function generateXML(int $notaFiscalId)
    {
        //Carrega lib responsável pela geração do XML
        $this->load->library('MakeNFe', ['id' => $notaFiscalId]);
        $this->makenfe->getInfNFe();

        //Identificação da NF-e
        $this->makenfe->getIde();

        //Emitente
        $this->makenfe->getEmit();

        //Destinatário
        $this->makenfe->getDest();

        //Itens
        $this->makenfe->getItens();

        //Transporte
        $this->makenfe->getTransporte();

        //Exportação
        $this->makenfe->getExportacao();

        //Respnsável Técnico
        $this->makenfe->getResponsavelTecnico();

        //Faturamento
        $this->makenfe->getFaturamento();

        //Informações Complementares
        $this->makenfe->getInformacoesComplementares();

        if ($xml = $this->makenfe->monta()) {
            return $this->makenfe->xml;
        }

        $this->setErrors($this->makenfe->getErrors());

        return false;
    }

    public function simulateDaNFce(int $notaFiscalId)
    {
        $notaFiscal = $this->faturamentoNotaFiscal->getByIdNFce($notaFiscalId);
        $data = substr($notaFiscal->data_emissao, 0, 10);

        $pdf = $this->renderDanfce($notaFiscalId);
        if (!$pdf) {
            $this->session->set_flashdata('erro',
                'Não foi possível gerar o XML, corrija os erros abaixo antes de tentar novamente:<br>'
                . self::arrayToHtml($this->getErrors()));
            redirect(base_url("vendas/frente-caixa/{$data}"), "home", "refresh");
        }
        header("Content-Type: application/pdf");
        echo $pdf;
    }

    private function generateXMLNFce(int $notaFiscalId)
    {
        
        //Carrega lib responsável pela geração do XML
        $this->load->library('MakeNFce', ['id' => $notaFiscalId]);
        try{
            $this->makenfce->getInfNFe();
        } catch (Exception $eInfNFe){
            $this->setErrors($eInfNFe->getMessage());
            return false;                
        }          

        //Identificação da NF-e
        try{
            $this->makenfce->getIde();
        } catch (Exception $eIde){
            $this->setErrors($eIde->getMessage());
            return false;                
        }          

        //Emitente
        try{
            $this->makenfce->getEmit();
        } catch (Exception $eEmit){
            $this->setErrors($eEmit->getMessage());
            return false;                
        }         

        //Destinatário
        try{
            $this->makenfce->getDest();
        } catch (Exception $eDest){
            $this->setErrors($eDest->getMessage());
            return false;                
        }   

        //Itens
        try{
            $this->makenfce->getItens();
        } catch (Exception $eItens){
            $this->setErrors($eItens->getMessage());
            return false;                
        }         

        //Transporte        
        try{
            $this->makenfce->getTransporte(); 
        } catch (Exception $eTransporte){
            $this->setErrors($eTransporte->getMessage());
            return false;                
        }        

        //Faturamento
        try{
            $this->makenfce->getPagamento();
        } catch (Exception $ePagamento){
            $this->setErrors($ePagamento->getMessage());
            return false;                
        }         

        //Informações Complementares
        try{
            $this->makenfce->getInformacoesComplementares();
        } catch (Exception $eInformacoesComplementares){
            $this->setErrors($eInformacoesComplementares->getMessage());
            return false;                
        }         

        //Respnsável Técnico
        $this->makenfce->getResponsavelTecnico();

        if ($xml = $this->makenfce->monta()) {
            return $this->makenfce->xml;
        }        

        $this->setErrors($this->makenfce->getErrors());

        return false;
        
    }

    /**
     * Renderiza DaNFe no formato padrão da classe NFePHP\DA\NFe\Danfe
     * @param int $notaFiscalId
     * @return false|string PDF em formato raw ou false em caso de erro
     */
    private function renderDanfe(int $notaFiscalId)
    {
        $empresa = $this->empresa->getEmpresaById(getDadosUsuarioLogado()['id_empresa']);
        //Verifica se nota está aprovada
        $notaFiscal = $this->faturamentoNotaFiscal->getById($notaFiscalId);
        if ($notaFiscal->c_stat == 100 &&
            is_file($this->commonnfe->aprDir) . $notaFiscal->chave . '-nfe.xml') {
            //$xml = file_get_contents(base_url($this->commonnfe->aprDir) . $notaFiscal->chave . '-nfe.xml', false, $context);
            $xml = file_get_contents($this->commonnfe->aprDir . $notaFiscal->chave . '-nfe.xml');
        } else {//Gera XML genérico
            $xml = $this->generateXML($notaFiscalId);
        }
        if (!$xml) {
            $this->setErrors('XML não encontrado.');
            return false;
        }
        $logo = "";
        if($empresa->caminho_logo != ""){
            $logo =  "data://text/plain;base64,". base64_encode(file_get_contents("clientes/" . $empresa->id_empresa . "/logo/" . $empresa->caminho_logo));
        }
        $danfe = new NFePHP\DA\NFe\Danfe($xml);
        try {
            $danfe->exibirTextoFatura = false;
            $danfe->exibirPIS = false;
            $danfe->exibirIcmsInterestadual = false;
            $danfe->exibirValorTributos = false;
            $danfe->descProdInfoComplemento = false;
            $danfe->setOcultarUnidadeTributavel(true);
            $danfe->obsContShow(false);
            $danfe->printParameters(
                $orientacao = 'P',
                $papel = 'A4',
                $margSup = 2,
                $margEsq = 2
            );
            $danfe->logoParameters($logo, $logoAlign = 'L', $mode_bw = false);
            $danfe->setDefaultFont($font = 'times');
            $danfe->setDefaultDecimalPlaces(4);
            $danfe->debugMode(false);
            $danfe->creditsIntegratorFooter('Emitido por ShopFloor');
            $pdf = $danfe->render($logo);
            return $pdf;

        } catch (\InvalidArgumentException $e) {
            $this->setErrors("Ocorreu um erro durante o processamento [IA]:" . $e->getMessage());
        } catch (\Error $exception) {
            $this->setErrors('Ocorreu um erro durante o processamento [Er]' . $exception->getMessage());
        } catch (\Exception $exception) {
            $this->setErrors('Ocorreu um erro durante o processamento [Ex]' . $exception->getMessage());
        }
        return false;
    }

    private function renderDanfce(int $notaFiscalId)
    {
        $empresa = $this->empresa->getEmpresaById(getDadosUsuarioLogado()['id_empresa']);
        //Verifica se nota está aprovada
        $notaFiscal = $this->faturamentoNotaFiscal->getByIdNFce($notaFiscalId);
        if ($notaFiscal->c_stat == 100 &&
            is_file($this->commonnfe->aprDir) . $notaFiscal->chave . '-nfe.xml') {
            //$xml = file_get_contents(base_url($this->commonnfe->aprDir) . $notaFiscal->chave . '-nfe.xml', false, $context);
            $xml = file_get_contents($this->commonnfe->aprDir . $notaFiscal->chave . '-nfe.xml');
        } else {//Gera XML genérico
            $xml = $this->generateXML($notaFiscalId);
        }
        if (!$xml) {
            $this->setErrors('XML não encontrado.');
            return false;
        }
        $logo = "";
        if ($empresa->caminho_logo != "") {

            $logo =  "data://text/plain;base64,". base64_encode(file_get_contents("clientes/" . $empresa->id_empresa . "/logo/" . $empresa->caminho_logo));
        }
        $danfce = new NFePHP\DA\NFe\Danfce($xml);
        try {
            $danfce->debugMode(true);//seta modo debug, deve ser false em produção
            $danfce->setPaperWidth(80); //seta a largura do papel em mm max=80 e min=58
            $danfce->setMargins(2);//seta as margens
            $danfce->setDefaultFont('arial');//altera o font pode ser 'times' ou 'arial'
            $danfce->setOffLineDoublePrint(true); //ativa ou desativa a impressão conjunta das via do consumidor e da via do estabelecimento qnado a nfce for emitida em contingência OFFLINE
            //$danfce->logoParameters($logo, $logoAlign = 'C', $mode_bw = false);
            //$danfce->setPrintResume(true); //ativa ou desativa a impressao apenas do resumo
            //$danfce->setViaEstabelecimento(); //altera a via do consumidor para a via do estabelecimento, quando a NFCe for emitida em contingência OFFLINE
            //$danfce->setAsCanceled(); //força marcar nfce como cancelada 
            $danfce->creditsIntegratorFooter('ShopFloor - https://www.shopfloor.com.br');
            $pdf = $danfce->render($logo);
            header('Content-Type: application/pdf');
            return $pdf;

        } catch (\InvalidArgumentException $e) {
            $this->setErrors("Ocorreu um erro durante o processamento [IA]:" . $e->getMessage());
        } catch (\Error $exception) {
            $this->setErrors('Ocorreu um erro durante o processamento [Er]' . $exception->getMessage());
        } catch (\Exception $exception) {
            $this->setErrors('Ocorreu um erro durante o processamento [Ex]' . $exception->getMessage());
        }
        return false;
    }


    /**
     * @return mixed
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * @param mixed $errors
     */
    public function setErrors($errors): void
    {
        $this->errors = $errors;
    }

}
