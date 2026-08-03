<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class ProducaoController extends CI_Controller {

    function __construct(){
        parent::__construct();

        if(usuarioLogado() == false){

            redirect(base_url("login"), "home", "refresh");

        }

        if(getDadosUsuarioLogado()['producao'] != 1){

            redirect(base_url("visao-geral"), "home", "refresh");

        }

        $empresa = $this->empresa->getEmpresaPorCodigo(getDadosUsuarioLogado()['id_empresa']);
        if($empresa->data_validade < date('Y-m-d')){
            $this->session->set_flashdata('erro', 'Período de acesso finalizado, entre em 
                                           contato através do telefone (41) 9 9666 8250 ou pelo email contato@shopfloor.com.br para renovação');
            redirect(base_url('logout'), "home", "refresh");
        }
    }

    public function imprimirOrdem($numOrdemProducao)   
    {

        $empresa = $this->empresa->getEmpresaPorCodigo(getDadosUsuarioLogado()['id_empresa']);
        $listaOrdem = $this->producao->getOrdemProducaoPorCodigo($numOrdemProducao);
        $listaProduto = $this->producao->getComponentesProducaoPorOrdemProducao($numOrdemProducao);

        $dados = array(
            'empresa' => $empresa,
            'ordem' => $listaOrdem,
            'lista_produto' => $listaProduto,
            'menu' => 'Ordem Produção ' . $listaOrdem->num_ordem_producao
        );        

        $this->load->view('producao/imprime-ordem-producao', $dados);       

    }

    public function imprimirEtiquetaProducao($codReporte)   
    {

        $empresa = $this->empresa->getEmpresaPorCodigo(getDadosUsuarioLogado()['id_empresa']);
        $listaReporte = $this->producao->getReportesPorducaoPorCodigoEtiqueta($codReporte);
        $listaMovimento = $this->estoque->getMovimentosEstoqueAcaPorReporte($listaReporte->cod_reporte_producao);
        $listaLote = $this->produto->getLoteporCodigo($listaMovimento->cod_lote, $listaReporte->cod_produto);

        $dados = array(
            'empresa' => $empresa,
            'reporte' => $listaReporte,
            'movimento_estoque' => $listaMovimento,
            'lote' => $listaLote,
            'menu' => 'Etiqueta ' 
        );    

        $this->load->view('producao/imprime-etiqueta-producao', $dados);       

    }

    public function visaoProducao(){
        $dataInicio = "";
        $dataFim = "";

        if($this->input->get('DataInicio') != "" && $this->input->get('DataFim') != ""){
            $dataInicio = date("Y-m-d", strtotime(str_replace('/', '-', $this->input->get('DataInicio'))));
            $dataFim = date("Y-m-d", strtotime(str_replace('/', '-', $this->input->get('DataFim'))));
        }

        $codProdutos = $this->input->get('produto'); 
        
        if($dataInicio == ""){
            $dataInicio = date('Y-m-01');
        }

        if($dataFim == ""){
            $dataFim = date('Y-m-d');
        }

        $listaPrudutoProd = $this->produto->getProdutoProduzido();

        $listaProducaoDia = $this->producao->getProducaoDiaria($dataInicio, $dataFim, $codProdutos);
        $listaCustoConsumo = $this->producao->getCustoProdutoConsumo($dataInicio, $dataFim, $codProdutos);
        $totalCusto = $this->producao->getCustoTotalConsumo($dataInicio, $dataFim, $codProdutos);
        $listaProducaoProduto = $this->producao->getProduçãoPorduto($dataInicio, $dataFim, $codProdutos);
        $listaQuantConsumo = $this->producao->getQuantConsumo($dataInicio, $dataFim, $codProdutos);
        

        // Produção Por Dia
        $labelProdDia = array();
        $dadosProducaoDia = array();
        $dadosPerdaDia = array();
        $labelDia = array();
        $labelNomMes = array();
        $labelAno = array();
        $totalProduzido = 0;
        $totalPerdido = 0;
        foreach($listaProducaoDia as $producaodia){

            $labelProdDia[] = str_replace('-', '/', date("d-m", strtotime($producaodia->data)));
            $labelDia[] = date("d", strtotime($producaodia->data));
            $labelNomMes[] = $producaodia->nome_mes;
            $labelAno[] = date("Y", strtotime($producaodia->data));
            $dadosProducaoDia[] = $producaodia->producao_dia;
            $totalProduzido = $totalProduzido + $producaodia->producao_dia;
            $dadosPerdaDia[] = $producaodia->perda_dia;
            $totalPerdido = $totalPerdido + $producaodia->perda_dia;

        }

        // Custo Consumo de Materiais
        $corConsumo = array();
        $dadosConsumo = array();
        $dadoProduto = array();
        $totalConsumo = 0;
        foreach($listaCustoConsumo as $key_CustoConsumo => $custoConsumo){

            if($key_CustoConsumo == 0){
                $corConsumo[] = $this->random_color("");
            }else{
                $corConsumo[] = $this->random_color($corConsumo[$key_CustoConsumo - 1]);
            }
                        
            $dadosConsumo[] = ($custoConsumo->custo_consumo / $totalCusto->custo_total) * 100;
            $dadoProduto[] = $custoConsumo->cod_produto . " - " . $custoConsumo->nome_produto;

        }

        // Quant Consumo de Materiais
        $corQuantConsumo = array();
        $dadosQuantConsumo = array();
        $dadoQuantProduto = array();
        $nomeProduto = array();
        $unidMedConsumo = array();
        foreach($listaQuantConsumo as $key_QuantConsumo => $quantConsumo){

            if($key_QuantConsumo >= 10) continue;

            $corQuantConsumo[] = "#325D88";         
            $dadosQuantConsumo[] = $quantConsumo->quant_movimentada;
            $dadoQuantProduto[] = $quantConsumo->cod_produto;
            $nomeProduto[] = $quantConsumo->nome_produto;
            $unidMedConsumo[] = $quantConsumo->cod_unidade_medida;

        }

        // Produção e Custo
        $labelProdutoProducao = array();
        $NomProdutoProd = array();
        $codUnidMedida = array();
        $dadosProdutoProducao = array();
        $dadosCustoProducao = array();
        foreach($listaProducaoProduto as $key_ProducaoProduto => $producaoProduto){

            if($key_ProducaoProduto >= 10) continue;

            $labelProdutoProducao[] = $producaoProduto->cod_produto;
            $NomProdutoProd[] = $producaoProduto->nome_produto;
            $codUnidMedida[] = $producaoProduto->cod_unidade_medida;
            $dadosProdutoProducao[] = $producaoProduto->quant_reportada;
            $dadosCustoProducao[] = $producaoProduto->custo_producao;

        }

        $dados = array(
            'dataInicio' => $dataInicio,
            'dataFim' => $dataFim,
            'cod_produto' => $codProdutos,
            'lista_produto_prod' => $listaPrudutoProd,

            'dia' => $labelProdDia,
            'producao_dia' => $dadosProducaoDia,
            'total_produzido' => $totalProduzido,
            'perda_dia' => $dadosPerdaDia,  
            'total_perdido' =>$totalPerdido,  
            'dia_nome' => $labelDia, 
            'nome_mes' => $labelNomMes,
            'ano' => $labelAno,         
            
            'consumo_produto' => $listaCustoConsumo,            
            'cor_consumo' => $corConsumo,
            'custo_produto' => $dadosConsumo,
            'nome_produto' => $dadoProduto,
            'total_custo' => $totalCusto,

            'cor_quant_consumo' => $corQuantConsumo,
            'quant_produto' => $dadosQuantConsumo,
            'cod_quant_produto' => $dadoQuantProduto,
            'nome_quant_produto' => $nomeProduto,
            'unid_med_consumo' => $unidMedConsumo,

            'produto_producao' => $labelProdutoProducao,
            'nome_produto_prod' => $NomProdutoProd,
            'cod_unidade_med' => $codUnidMedida,
            'quant_producao' => $dadosProdutoProducao,
            'custo_producao' => $dadosCustoProducao,
            
            'menu' => 'Producao'
        );

        $this->load->view('producao/indicadores-producao', $dados);

    }

    public function formOrdemProducao(){

        $listaPrudutoProd = $this->produto->getProdutoProduzido();
        $listaPedido = $this->venda->getPedidoVendaOrdemProducao();

        $dados = array(
            'lista_produto_prod' => $listaPrudutoProd,
            'lista_pedido' => $listaPedido,
            'menu' => 'Producao'
        );        

        $this->load->view('producao/nova-ordem-producao', $dados);

    }         

    public function editarOrdemProducao($numOrdemProducao){

        $listaOrdem = $this->producao->getOrdemProducaoPorCodigo($numOrdemProducao);
        $listaComponente = $this->producao->getComponentesProducaoPorOrdemProducao($numOrdemProducao);
        $listaProdutoCons = $this->produto->getProdutoOrdem($listaOrdem->cod_produto, $listaComponente);   
        
        if($listaOrdem == null){
            redirect(base_url('producao/ordem-producao'));
            
        }else{ 

            $dados = array(
                'ordem' => $listaOrdem,
                'lista_componente' => $listaComponente,
                'lista_produto_cons' => $listaProdutoCons,            
                'menu' => 'Producao'
            );        

            $this->load->view('producao/editar-ordem-producao', $dados);
        }

    }    

    public function editReporteOrdemPoducao($numOrdemProducao){

        $listaEmpresa = $this->empresa->getEmpresaPorCodigo(getDadosUsuarioLogado()['id_empresa']);
        $listaOrdemProducao = $this->producao->getOrdemProducaoPorCodigo($numOrdemProducao);
        $listaReportesProducao = $this->producao->getReportesPorducao($numOrdemProducao);
        $listaMovimentoOrdem = $this->producao->getMovimentosPorOrdemProducao($numOrdemProducao);
        $listaComponente = $this->producao->getComponentesProducaoPorOrdemProducao($numOrdemProducao);
        $listaLotesComponente = $this->producao->getLotesPorComponentes($listaComponente);
        $listaProdutoLote = $this->produto->getLotePorProdutoDentroValidade($listaOrdemProducao->cod_produto);

        if($listaOrdemProducao == null){
            redirect(base_url('producao/reporte-producao'));
            
        }else{ 

            $dados = array(
                'empresa' => $listaEmpresa,
                'ordem' => $listaOrdemProducao,
                'lista_reporte' => $listaReportesProducao,
                'lista_movimento_ordem' => $listaMovimentoOrdem,
                'lista_componente' => $listaComponente,
                'lista_produto_lote' => $listaProdutoLote,
                'lista_componente_lote' => $listaLotesComponente,
                'menu' => 'Producao'
                
            );

            $this->load->view('producao/novo-reporte-producao', $dados);
        }

    }

    public function inserirOrdemProducao(){  

        //Validações dos campo e array das mensagens apresentadas
        $this->form_validation->set_rules('CodProduto', 'Código do Produto', 'required',
            array('required' => 'Você deve preencher o campo %s'));
        $this->form_validation->set_rules('DataEmissao', 'Data de Emissão', 'required', 
            array('required' => 'Você deve preencher o campo %s'));
        $this->form_validation->set_rules('DataFim', 'Data Fim', 'required', 
            array('required' => 'Você deve preencher o campo %s'));
        $this->form_validation->set_rules('QuantPlanejada', 'Quantidade Planejada', 'required|callback_more_zero',
            array('required' => 'Você deve preencher o campo %s'));

        if($this->form_validation->run() == false){

            $this->session->set_flashdata('erro', validation_errors());
            $this->formOrdemProducao();
            
        }else {

            $dados = [
                'id_empresa' => getDadosUsuarioLogado()['id_empresa'],
                'cod_produto'  => $this->input->post('CodProduto'),
                'num_pedido_venda'  => $this->input->post('PedidoVenda'),
                'data_emissao' => date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataEmissao')))),
                'data_fim' => date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataFim')))),
                'quant_planejada' => str_replace(",",".",(str_replace(".","",$this->input->post('QuantPlanejada')))),
                'observacoes' => $this->input->post('ObsOrdemProducao'),
                'usuario' => getDadosUsuarioLogado()['email'],
            ];

            $numOrdemProducao = $this->producao->insertOrdemProducao($dados);
            if($numOrdemProducao == null){

                $this->session->set_flashdata('erro', 'Erro ao criar ordem de produção');
                $this->formOrdemProducao();

            }else{

                $quantPlan = floatval(str_replace(",",".",(str_replace(".","",$this->input->post('QuantPlanejada')))));

                //Cria componentes da ordem de produção com base na engenharia do item
                $listaComponentes = $this->engenharia->getComponentesPorEstrutura($this->input->post('CodProduto'));
                foreach($listaComponentes as $key_componentes => $componente){ 
                    
                    $dadosConsumo = null;
                    $dadosConsumo = [
                        'num_ordem_producao' => $numOrdemProducao,
                        'cod_produto'  => $componente->cod_produto_componente,
                        'quant_consumo' => $componente->quant_consumo * ($quantPlan / $componente->quant_producao)
                    ];

                    $erro = $this->producao->insertConsumo($dadosConsumo);

                    // Planeja ordens de produção e compra dos produtos da estrutura de engenharia
                    if($this->input->post('PlanejaOrdens') == '1'){ 
                        $this->planejaOrdensEstrutura($componente->cod_produto_componente,
                                                      $componente->quant_consumo * $quantPlan,
                                                      $this->input->post('PedidoVenda'),
                                                      date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataEmissao')))),
                                                      date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataFim')))),
                                                      $this->input->post('ObsOrdemProducao'));

                    }
                    
                }
                
                redirect(base_url("producao/ordem-producao/editar-ordem-producao/{$numOrdemProducao}"), "home", "refresh");
            }                       
        }        
    }

    public function planejaOrdensEstrutura($codproduto, $quantidade, $pedidoVenda, $dataEmissao, $dataFim, $observacoes){

        $produto = $this->produto->getProdutoPorCodigo($codproduto);

        //Aplica cálculo da quantidade de dia para abastecimento
        $dataFim = date('Y-m-d', strtotime('-' . $produto->tempo_abastecimento . ' days', strtotime($dataFim)));

        // Se origem 1 (produzido) cria ordem de produção, se não, cria ordem de compra
        if($produto->origem_produto == 1){

            $dados = [
                'id_empresa' => getDadosUsuarioLogado()['id_empresa'],
                'cod_produto'  => $codproduto,
                'num_pedido_venda'  => $pedidoVenda,
                'data_emissao' => $dataEmissao,
                'data_fim' => $dataFim,
                'quant_planejada' => $quantidade,
                'observacoes' => $observacoes
            ];
    
            $numOrdemProducao = $this->producao->insertOrdemProducao($dados);

            $listaComponentes = $this->engenharia->getComponentesPorEstrutura($codproduto);
            foreach($listaComponentes as $key_componentes => $componente){ 
                    
                $dadosConsumo = null;
                $dadosConsumo = [
                    'num_ordem_producao' => $numOrdemProducao,
                    'cod_produto'  => $componente->cod_produto_componente,
                    'quant_consumo' => $componente->quant_consumo * $quantidade
                ];

                $erro = $this->producao->insertConsumo($dadosConsumo);

                // Recursividade para chegar ao ponto mais baixo da estrutura
                $this->planejaOrdensEstrutura($componente->cod_produto_componente,
                                              $componente->quant_consumo * $quantidade,
                                              $pedidoVenda,
                                              $dataEmissao,
                                              $dataFim,
                                              $observacoes);
            }            

        }else{

            $dados = [
                'id_empresa' => getDadosUsuarioLogado()['id_empresa'],
                'cod_produto'  => $codproduto,
                'data_entrega' => $dataFim,
                'quant_pedida' => $quantidade,
                'observacoes' => $observacoes
            ];

            $this->compra->insertOrdemCompra($dados);

        }  
    }

    public function iniciarComponentesProducao($dadosConsumo){

        $erro = $this->producao->insertComponentesProducao($dadosConsumo);

        if($erro != null){
            return $erro;
        }

        return $erro;

    }

    public function inserirComponenteProducao($NumOrdemProducao){

        $this->form_validation->set_rules('CodProdutoCons', 'Componente de Produção', 'required',
                    array('required' => 'Você deve preencher o campo %s'));
        $this->form_validation->set_rules('QuantConsumo', 'Quantidade de Consumo', 'required|callback_more_zero',
                    array('required' => 'Você deve preencher o campo %s'));

        if($this->form_validation->run() == false){

            $this->session->set_flashdata('erro', validation_errors());
            redirect(base_url("producao/ordem-producao/editar-ordem-producao/{$NumOrdemProducao}"), "home", "refresh");

        }else{

            $dataComp = [
                'num_ordem_producao'  => $NumOrdemProducao,
                'cod_produto' => $this->input->post('CodProdutoCons'),
                'quant_consumo' => str_replace(",",".",(str_replace(".","",$this->input->post('QuantConsumo'))))
            ];

            $this->producao->insertConsumo($dataComp);
            $this->session->set_flashdata('sucesso', 'Componente cadastrado com sucesso');
            redirect(base_url("producao/ordem-producao/editar-ordem-producao/{$NumOrdemProducao}"), "home", "refresh");

        }
    }    

    public function salvarOrdemProducao($numOrdemProd){

        //Validações dos campos
        $this->form_validation->set_rules('DataFim', 'Data Fim', 'required', 
            array('required' => 'Você deve preencher o campo %s'));
        $this->form_validation->set_rules('QuantPlanejada', 'Quantidade Planejada', 'required|callback_more_zero',
            array('required' => 'Você deve preencher o campo %s'));


        if($this->form_validation->run() == false){

            $this->session->set_flashdata('erro', validation_errors());
            redirect(base_url("producao/ordem-producao/editar-ordem-producao/{$numOrdemProd}"), "home", "refresh");
            
        }else {

            $quantPlanejada = str_replace(",",".",(str_replace(".","",$this->input->post('QuantPlanejada'))));

            $ordemProducao = $this->producao->getOrdemProducaoPorCodigo($numOrdemProd); 
            $percAlteracao = $quantPlanejada / $ordemProducao->quant_planejada;

            // Ajusta Status da ordem
            if($ordemProducao->quant_produzida != 0){
                if($quantPlanejada <= $ordemProducao->quant_produzida){
                    $status = 3;
                }elseif($quantPlanejada > $ordemProducao->quant_produzida){
                    $status = 2;
                }
            }
            else{
                $status = 1;
            }

            $dados = [
                'data_fim' => date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataFim')))),
                'quant_planejada' => str_replace(",",".",(str_replace(".","",$this->input->post('QuantPlanejada')))),
                'observacoes' => $this->input->post('ObsOrdemProducao'),
                'status' => $status
            ];

            $erro = $this->producao->updateOrdemProducao($numOrdemProd, $dados);

            //Atualiza quantidade de consumo dos componenetes
            $listaComponentes = $this->producao->getComponentesProducaoPorOrdemProducao($numOrdemProd);
            foreach($listaComponentes as $key_componentes => $componente){ 

                $dadosConsumo = null;
                $dadosConsumo = [
                    'seq_componente_producao' => $componente->seq_componente_producao,
                    'quant_consumo' => $componente->quant_consumo * $percAlteracao
                ];

                $this->producao->updateComponenteProducao($componente->seq_componente_producao, $dadosConsumo);
                
            }

            if ($erro['code'] == null){
                $this->session->set_flashdata('sucesso', 'Ordem de produção alterada com sucesso');
                redirect(base_url("producao/ordem-producao/editar-ordem-producao/{$numOrdemProd}"), "home", "refresh");
                
            }else{
                $this->session->set_flashdata('erro', $erro['message']);
                redirect(base_url("producao/ordem-producao/editar-ordem-producao/{$numOrdemProd}"), "home", "refresh");

            }                          
        }  
    }

    public function salvarComponenteProducao(){
        $numOrdemProd = $this->uri->segment(4);
        $SeqComponente = $this->uri->segment(5);

        //Validações dos campos
        $this->form_validation->set_rules('QuantConsumoEdit', 'Quantidade de Consumo', 'required|callback_more_zero',
            array('required' => 'Você deve preencher o campo %s'));

        if($this->form_validation->run() == false){

            $this->session->set_flashdata('erro', validation_errors());
            redirect(base_url("producao/ordem-producao/editar-ordem-producao/{$numOrdemProd}"), "home", "refresh");
            
        }else {

            $dados = [
                'quant_consumo' => str_replace(",",".",(str_replace(".","",$this->input->post('QuantConsumoEdit'))))
            ];

            $erro = $this->producao->updateComponenteProducao($SeqComponente, $dados);

            if ($erro['code'] == null){
                $this->session->set_flashdata('sucesso', 'Componente alterado com sucesso');
                
            }else{
                $this->session->set_flashdata('erro', $erro['message']);

            }
            
            redirect(base_url("producao/ordem-producao/editar-ordem-producao/{$numOrdemProd}"), "home", "refresh");
                       
        }  
    }

    public function excluirOrdemProducao(){

        $OrdemProducao = $this->input->post("excluir_todos");
        $numRegs = count($OrdemProducao);

        if($numRegs > 0){
            $this->producao->deleteComponenteProducaoPorOrdem($OrdemProducao);

            $this->session->set_flashdata('sucesso', 'Registro(s) selecionado(s) excluído(s)');
            $erro = $this->producao->deleteOrdemProducao($OrdemProducao);

            //Code 1451 - Não é permitido exluir registro sendo usado por outro registro
            if ($erro['code'] == 1451){
                $this->session->set_flashdata('erro', 'Exclusão não permitida. Registro em uso por outro cadastro');

            }elseif($erro['code'] != null && $erro['code'] != 1451){
                $this->session->set_flashdata('erro', $erro['message']);

            }else{
                $this->session->set_flashdata('sucesso', 'Registro(s) selecionado(s) excluído(s)');

            }  

        }else {
            $this->session->set_flashdata('erro', 'Nenhum registro foi selecionado');
        }

        redirect(base_url('producao/ordem-producao'));
    }

       
    

    public function excluirComponenteProducao($numOrdemProducao){

        $SeqComponenteProd = $this->input->post("excluir_todos");
        $numRegs = count($SeqComponenteProd);

        if($numRegs > 0){
            
            $erro = $this->producao->deleteComponenteProducao($SeqComponenteProd);

            //Code 1451 - Não é permitido exluir registro sendo usado por outro registro
            if ($erro['code'] == 1451){
                $this->session->set_flashdata('erro', 'Exclusão não permitida. Registro em uso por outro cadastro');

            }elseif($erro['code'] != null && $erro['code'] != 1451){
                $this->session->set_flashdata('erro', $erro['message']);

            }else{
                $this->session->set_flashdata('sucesso', 'Registro(s) selecionado(s) excluído(s)');

            }            

        }else{ 
            $this->session->set_flashdata('erro', 'Nenhum registro foi selecionado');
        }

        redirect(base_url("producao/ordem-producao/editar-ordem-producao/{$numOrdemProducao}"), "home", "refresh");
    }

    public function redirecionaProgramacaoProducao(){

        $data = date("Y-m-d");

        redirect(base_url("producao/programacao-producao/{$data}"), "home", "refresh");

    }

    public function buscarData(){

        $data = date("Y-m-d", strtotime(str_replace('/', '-', $this->input->get('dataCaixa'))));

        redirect(base_url("producao/programacao-producao/{$data}"), "home", "refresh");

    }

    public function programacaoProducao(){

        $data = $this->uri->segment(3);

        $diaAnterior = date('Y-m-d', strtotime('-1 day', strtotime($data)));
        $diaSeguinte = date('Y-m-d', strtotime('+1 day', strtotime($data)));

        $frenteCaixa = $this->venda->getControleCaixaPorCodigo($data);
        $vendaCaixa = $this->venda->getVendaCaixa($data);
        $movimentoCaixa = $this->venda->getMovimentoCaixa($data);

        $recebimentoMetodo = $this->venda->getMetodoPagamentoPorDataCaixa($data);

        $dados = array(
            'dia' => $data,
            'diaAnterior' => $diaAnterior,
            'diaSeguinte' => $diaSeguinte,
            'frente_caixa' => $frenteCaixa,
            'venda_caixa' => $vendaCaixa,
            'movimento_caixa' => $movimentoCaixa,
            'recebeimento_metodo' => $recebimentoMetodo,
            'menu' => 'Producao'
        );

        $this->load->view('producao/programacao-producao', $dados);

    }

    public function repotarProducao(){  
        $numOrdemProducao = $this->uri->segment(4);
        $codProduto = $this->uri->segment(5);
        $quantPlanejada = $this->uri->segment(6);

        //Validações dos campos
        $this->form_validation->set_rules('DataReporte', 'Data de Reporte', 'required|callback_date_check', 
            array('required' => 'Você deve preencher o campo %s'));
        $this->form_validation->set_rules('QuantProducao', 'Quantidade Produzida', 'required|callback_more_zero', 
            array('required' => 'Você deve preencher o campo %s'));

        
        
        if($this->form_validation->run() == false){

            $this->session->set_flashdata('erro', validation_errors());
            redirect(base_url("producao/reporte-producao/novo-reporte-producao/{$numOrdemProducao}"), "home", "refresh");
            
        }else {      
            
            $produto = $this->produto->getProdutoPorCodigo($codProduto);

            $consumo = $this->input->post('consumo');
            $lote_consumo = $this->input->post('lote_consumo');

            $quantProduzida = floatval(str_replace(",",".",(str_replace(".","",$this->input->post('QuantProducao')))));
            $quantPerdida = floatval(str_replace(",",".",(str_replace(".","",$this->input->post('QuantPerda')))));

            $horaInicio = $this->input->post('inputHoraInicio');
            $horaFim = $this->input->post('inputHoraFim');

            /*$horasTrabalhadas = 0;
            if($horaInicio <> "" && $horaFim <> "")
                $horasTrabalhadas = $this->converteHorasDecimal($horaInicio, $horaFim);*/

            $horasTrabalhadas = floatval(str_replace(",",".",(str_replace(".","",$this->input->post('HorasTrabalhadas')))));

            //Valida estoque dos componentes e calcula custo dos itens consumidos
            $listaComponentes = $this->producao->getComponentesProducaoPorOrdemProducao($numOrdemProducao);

            //Valida estoque dos componentes
            foreach($listaComponentes as $key_componentes => $componente){  

                $quantConsumo = floatval(str_replace(",",".",(str_replace(".","",$consumo[$componente->seq_componente_producao])))); 

                if($componente->saldo_negativo == 0 && $componente->quant_estoq < $quantConsumo){
                    $this->session->set_flashdata('erro', 'Produto <strong>(' . $componente->cod_produto . ') ' . $componente->nome_produto . '</strong> sem estoque suficiente para consumo');
                    redirect(base_url("producao/reporte-producao/novo-reporte-producao/{$numOrdemProducao}"), "home", "refresh");
                }
            }

            $custoProducao = 0;
            $custoTotalProducao = 0;
            foreach($listaComponentes as $key_componentes => $componente){ 

                $quantConsumo = floatval(str_replace(",",".",(str_replace(".","",$consumo[$componente->seq_componente_producao])))); 
                $custoProducao = $custoProducao + ($quantConsumo * $componente->custo_medio);
            }

            $empresa = $this->empresa->getEmpresaPorCodigo(getDadosUsuarioLogado()['id_empresa']);

            if($empresa->custo_folha != 0 && $empresa->horas_consideradas != 0){
                $custoMOB = (($empresa->custo_folha / $empresa->horas_consideradas) * $horasTrabalhadas);
            }
            else {
                $custoMOB = 0;
            }            

            // Cria reporte de produção
            $dados = [
                'num_ordem_producao'  => $numOrdemProducao,
                'data_reporte' => date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataReporte')))),
                'quant_reportada' => $quantProduzida,
                'quant_perdida' => $quantPerdida,
                'hora_inicio' => $horaInicio,
                'hora_fim' => $horaFim,
                'horas_trabalhadas' => $horasTrabalhadas,
                'custo_producao' => $custoProducao,
                'custo_mob' => $custoMOB,
                'observacoes' => $this->input->post("ObsReporte"),
                'usuario' => getDadosUsuarioLogado()['email'],
            ];

            $codReporteProducao = $this->producao->insertReporteProducao($dados); 
            
            $lote = null;
            if($produto->tipo_controle == 2){

                if($this->input->post("CodLote") != null){
                    $lote = $this->input->post("CodLote");
                }
                else{
                    $lote = $codReporteProducao;

                    $dadosLote = [
                        'id_empresa' => getDadosUsuarioLogado()['id_empresa'],
                        'cod_produto' => $codProduto,
                        'cod_lote' => $lote,
                        'data_validade' => date("Y-m-d", strtotime('+' . $produto->dias_vencimento . ' days', strtotime(str_replace('/', '-', $this->input->post('DataReporte'))))),
                        'dias_aviso_venc' => 10,
                    ];
                    $this->estoque->insertLote($dadosLote);
                }

            }

            //Baixa estoque dos produtos consumidos            
            foreach($listaComponentes as $key_componentes => $componente){  
                
                $quantConsumo = floatval(str_replace(",",".",(str_replace(".","",$consumo[$componente->seq_componente_producao]))));
                $loteConsumo = null;
                if(@$lote_consumo[$componente->seq_componente_producao] != null)
                    $loteConsumo = $lote_consumo[$componente->seq_componente_producao];

                if($quantConsumo != 0){
                    $custoProducao = $quantConsumo * $componente->custo_medio;
                    $custoTotalProducao = $custoTotalProducao + $custoProducao;
                    
                    // Movimenta Estoque
                    $dadosEstoque = null;
                    $dadosEstoque = [
                        'id_empresa' => getDadosUsuarioLogado()['id_empresa'],
                        'data_movimento' => date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataReporte')))),
                        'cod_produto' => $componente->cod_produto,
                        'cod_lote' => $loteConsumo,
                        'origem_movimento' => 1,
                        'id_origem' => $codReporteProducao,
                        'tipo_movimento' => 2,
                        'especie_movimento' => 3,
                        'quant_movimentada' => $quantConsumo,
                        'custo_mat' => $custoProducao,
                        'custo_mob' => 0,
                        'valor_movimento' => $custoProducao,
                        'usuario' => getDadosUsuarioLogado()['email'],
                    ];

                    $this->estoque->insertMovimentoEstoque($dadosEstoque);
                }
            }

            //Atualiza Custo Médio produto            
            //Atualiza Custo Médio produto
            $custoMedio = $this->estoque->getCustoMedio($produto->cod_produto);
            if($custoMedio != null && $custoMedio->total_valor != 0){

                $dadosProd = null;
                $dadosProd = [
                    'custo_medio' => ($custoMedio->total_valor + ($custoTotalProducao + $custoMOB)) / ($custoMedio->total_movimentado + $quantProduzida)
                ];    
                $this->produto->updateProduto($produto->cod_produto, $dadosProd);
            }else{
    
                $dadosProd = null;
                $dadosProd = [
                    'custo_medio' => ($custoTotalProducao + $custoMOB) / $quantProduzida
                ];            
                $this->produto->updateProduto($produto->cod_produto, $dadosProd);

            }

            //Sobe estoque do produto produzido
            $dadosEstoque = [
                'id_empresa' => getDadosUsuarioLogado()['id_empresa'],
                'data_movimento' => date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataReporte')))),
                'cod_produto' => $codProduto,
                'cod_lote' => $lote,
                'origem_movimento' => 1,
                'id_origem' => $codReporteProducao,
                'tipo_movimento' => 1,
                'especie_movimento' => 2,
                'quant_movimentada' => $quantProduzida,
                'custo_mat' => $custoTotalProducao,
                'custo_mob' => $custoMOB,
                'valor_movimento' => $custoTotalProducao + $custoMOB,
                'usuario' => getDadosUsuarioLogado()['email'],
            ];
            $this->estoque->insertMovimentoEstoque($dadosEstoque);
            
            
            $this->session->set_flashdata('sucesso', 'Reporte realizado com sucesso');            
            redirect(base_url("producao/reporte-producao/novo-reporte-producao/{$numOrdemProducao}"), "home", "refresh");

        }        
    } 

    public function estornarReporteProducao($numOrdemProducao = null){

        $codReporteProd = $this->input->post("estornar_todos");
        $numRegs = count($codReporteProd);
        

        if($numRegs > 0){

            // Atualiza ordem de produção                
            $ordemProducao = $this->producao->getOrdemProducaoPorCodigo($numOrdemProducao); 
            
            foreach($codReporteProd as $reporte){ 

                // Valida saldo do produto produzido para estorno                
                $listaMovimentos = $this->estoque->getMovimentosEstoquePorReporte($reporte);

                $reporteProducao = $this->producao->getReportesPorducaoPorCodigo($reporte);

                if(($ordemProducao->quant_produzida - $reporteProducao->quant_reportada) >= $ordemProducao->quant_planejada) {
                    $status = 3;
                }elseif(($ordemProducao->quant_produzida - $reporteProducao->quant_reportada) == 0){
                    $status = 4;
                }else{
                    $status = 2;
                }  

                $dados = [
                    'quant_produzida' => $ordemProducao->quant_produzida - $reporteProducao->quant_reportada,
                    'status' => $status
                ];

                $this->producao->updateOrdemProducao($numOrdemProducao, $dados);

                $dados = null;

                // Atualiza reporte de produção                
                $dados = [
                    'estornado' => '1'
                ];
    
                $this->producao->updateReporteProducao($reporte, $dados); 

                foreach($listaMovimentos as $movimentos){
                    
                    
                    if($movimentos->especie_movimento == 2){
                        $especieMovimento = 6;
                    }elseif($movimentos->especie_movimento == 3){
                        $especieMovimento = 7;
                    }

                    if($movimentos->tipo_movimento == 1){

                        $tipoMovimento = 2;

                    }elseif($movimentos->tipo_movimento == 2){

                        $tipoMovimento = 1;

                    }

                    $dadosEstoque = null;
                    $dadosEstoque = [
                        'considera_calc_custo' => 1
                    ];

                    $this->estoque->updateMovimentoEstoque($movimentos->cod_movimento_estoque, $dadosEstoque);

                    $dadosEstoque = null;
                    $dadosEstoque = [
                        'id_empresa' => getDadosUsuarioLogado()['id_empresa'],
                        'data_movimento' => $movimentos->data_movimento,
                        'cod_produto' => $movimentos->cod_produto,
                        'cod_lote' => $movimentos->cod_lote,
                        'origem_movimento' => 1,
                        'id_origem' => $reporte,
                        'tipo_movimento' => $tipoMovimento,
                        'especie_movimento' => $especieMovimento,
                        'quant_movimentada' => $movimentos->quant_movimentada,
                        'custo_mat' => $movimentos->custo_mat,
                        'custo_mob' => $movimentos->custo_mob,
                        'valor_movimento' => $movimentos->valor_movimento,
                        'considera_calc_custo' => 1,
                        'usuario' => getDadosUsuarioLogado()['email'],
                    ];
        
                    $this->estoque->insertMovimentoEstoque($dadosEstoque);
                      
                }
            }            
            $this->session->set_flashdata('sucesso', 'Registro(s) selecionado(s) estornado(s) com sucesso');

        }else{ 
            $this->session->set_flashdata('erro', 'Nenhum registro foi selecionado');
        }

        redirect(base_url("producao/reporte-producao/novo-reporte-producao/{$numOrdemProducao}"), "home", "refresh");       

    }

    public function redirecionaOrdemProducao(){

        $mes = date('m');
        $ano = date('Y');

        redirect(base_url("producao/ordem-producao/{$mes}/{$ano}"), "home", "refresh");

    }

    public function listarOrdemProducao(){  

        $mes = $this->uri->segment(3);
        $ano = $this->uri->segment(4);

        $filter = ($this->input->get('buscar')) ? $this->input->get('buscar') : "";
        $produtoFiltro = $this->input->get('ProdutoFiltro');
        $statusFiltro = $this->input->get('StatusFiltro');
        $pedidoFiltro = $this->input->get('PedidoFiltro');

        $descMes = null;
        switch($mes){
            case 1:
                $descMes = "Janeiro";
                break;
            case 2:
                $descMes = "Fevereiro";
                break;
            case 3:
                $descMes = "Março";
                break;
            case 4:
                $descMes = "Abril";
                break;
            case 5:
                $descMes = "Maio";
                break;
            case 6:
                $descMes = "Junho";
                break;
            case 7:
                $descMes = "Julho";
                break;
            case 8:
                $descMes = "Agosto";
                break;
            case 9:
                $descMes = "Setembro";
                break;
            case 10:
                $descMes = "Outubro";
                break;
            case 11:
                $descMes = "Novembro";
                break;
            case 12:
                $descMes = "Dezembro";
                break;
        }

        if($descMes == null){
            redirect(base_url("erro-404"));            
        }

        $dataInicio = date('Y-m-01', strtotime(date(''.$ano.'-'.$mes.'-01')));
        $dataFim = date('Y-m-t', strtotime(date(''.$ano.'-'.$mes.'-01')));

        $mesAnterior = date('m', strtotime('-1 months', strtotime(date(''.$ano.'-'.$mes.'-01'))));
        $anoAnterior = date('Y', strtotime('-1 months', strtotime(date(''.$ano.'-'.$mes.'-01'))));
        $mesSeguinte = date('m', strtotime('+1 months', strtotime(date(''.$ano.'-'.$mes.'-01'))));
        $anoSeguinte = date('Y', strtotime('+1 months', strtotime(date(''.$ano.'-'.$mes.'-01'))));

        $listaOrdem = $this->producao->getOrdemProducao($dataInicio, $dataFim, $filter, $produtoFiltro, $pedidoFiltro, $statusFiltro); 
        $listaStatus = $this->producao->getStatusProducao($dataInicio, $dataFim);  
        
        //dados do filtro
        $listaPrudutoProd = $this->produto->getProdutoProduzido();
        $listaPedido = $this->venda->getPedidoVendaOrdemProducao();

        $dados = array(
            'descMes' => $descMes,
            'mes' => $mes,
            'ano' => $ano,
            'filter' => $filter,
            'produtoFiltro' => $produtoFiltro,
            'statusFiltro' => $statusFiltro,
            'pedidoFiltro' => $pedidoFiltro,
            'lista_produto_prod' => $listaPrudutoProd,
            'lista_pedido' => $listaPedido,
            'mes_anterior' => $mesAnterior,
            'ano_anterior' => $anoAnterior,
            'mes_seguinte' => $mesSeguinte,
            'ano_seguinte' => $anoSeguinte,
            'lista_ordem' => $listaOrdem,
            'lista_status' => $listaStatus, 
            'menu' => 'Producao'
        );

        $this->load->view('producao/ordem-producao', $dados);
    }

    public function redirecionaOrdemReporte(){

        $mes = date('m');
        $ano = date('Y');

        redirect(base_url("producao/reporte-producao/{$mes}/{$ano}"), "home", "refresh");

    }

    public function listarOrdemReporte(){      

        $mes = $this->uri->segment(3);
        $ano = $this->uri->segment(4);

        $filter = ($this->input->get('buscar')) ? $this->input->get('buscar') : "";

        $descMes = null;
        switch($mes){
            case 1:
                $descMes = "Janeiro";
                break;
            case 2:
                $descMes = "Fevereiro";
                break;
            case 3:
                $descMes = "Março";
                break;
            case 4:
                $descMes = "Abril";
                break;
            case 5:
                $descMes = "Maio";
                break;
            case 6:
                $descMes = "Junho";
                break;
            case 7:
                $descMes = "Julho";
                break;
            case 8:
                $descMes = "Agosto";
                break;
            case 9:
                $descMes = "Setembro";
                break;
            case 10:
                $descMes = "Outubro";
                break;
            case 11:
                $descMes = "Novembro";
                break;
            case 12:
                $descMes = "Dezembro";
                break;
        }

        if($descMes == null){
            redirect(base_url("erro-404"));            
        }

        $dataInicio = date('Y-m-01', strtotime(date(''.$ano.'-'.$mes.'-01')));
        $dataFim = date('Y-m-t', strtotime(date(''.$ano.'-'.$mes.'-01')));

        $mesAnterior = date('m', strtotime('-1 months', strtotime(date(''.$ano.'-'.$mes.'-01'))));
        $anoAnterior = date('Y', strtotime('-1 months', strtotime(date(''.$ano.'-'.$mes.'-01'))));
        $mesSeguinte = date('m', strtotime('+1 months', strtotime(date(''.$ano.'-'.$mes.'-01'))));
        $anoSeguinte = date('Y', strtotime('+1 months', strtotime(date(''.$ano.'-'.$mes.'-01'))));

        $listaOrdem = $this->producao->getOrdemReporte($dataInicio, $dataFim, $filter); 
        $listaStatus = $this->producao->getStatusProducao($dataInicio, $dataFim); 

        $dados = array(
            'descMes' => $descMes,
            'mes' => $mes,
            'ano' => $ano,
            'filter' => $filter,
            'mes_anterior' => $mesAnterior,
            'ano_anterior' => $anoAnterior,
            'mes_seguinte' => $mesSeguinte,
            'ano_seguinte' => $anoSeguinte,
            'lista_ordem' => $listaOrdem,
            'lista_status' => $listaStatus, 
            'menu' => 'Producao'
        );

        $this->load->view('producao/reporte-producao', $dados);
    }   
    

    //Relatório
    public function producaoProduto(){
        $dataInicio = "";
        $dataFim = "";

        if($this->input->get('DataInicio') != "" && $this->input->get('DataFim') != ""){
            $dataInicio = date("Y-m-d", strtotime(str_replace('/', '-', $this->input->get('DataInicio'))));
            $dataFim = date("Y-m-d", strtotime(str_replace('/', '-', $this->input->get('DataFim'))));
        }
        
        
        if($dataInicio == ""){
            $dataInicio = date('Y-m-01');
        }

        if($dataFim == ""){
            $dataFim = date('Y-m-d');
        }

        $codProdutos = $this->input->get('produto'); 
        $acao = $this->input->get('acao'); 

        $listaPrudutoProd = $this->produto->getProdutoProduzido();
        $totalProducao = $this->producao->totalProducao($dataInicio, $dataFim, $codProdutos);
        $listaProducaoResumida = $this->producao->producaoResumida($dataInicio, $dataFim, $codProdutos);
        $listaProducaoDetalhada = $this->producao->producaoDetalhada($dataInicio, $dataFim, $codProdutos);
        $listaConsumoDetalhado = $this->producao->consumoDetalhado($dataInicio, $dataFim, $codProdutos, null);
        $listaEmpresa = $this->empresa->getEmpresaPorCodigo(getDadosUsuarioLogado()['id_empresa']); 

        // Venda por produto 
        $i = 0; 
        $color = "";
        $labelProduto = array();   
        $percProduto = array(); 
        $colorProduto = array(); 
        foreach($listaProducaoResumida as $resumido){

            $color = $this->random_color($color);

            $resumido->custo_total = $resumido->custo_producao + $resumido->custo_mob;

            $labelProduto[] = $resumido->nome_produto;
            $percProduto[] = ($resumido->custo_total / $totalProducao->custo_total) * 100;
            $colorProduto[] = $color;

            $resumido->color = $color;

        }

        //exporta excel
        if($acao == 2){

            $spreadsheet = new Spreadsheet();

            $spreadsheet->getProperties()->setCreator('Maarten Balliauw')
                                         ->setLastModifiedBy('Maarten Balliauw')
                                         ->setTitle('Office 2007 XLSX Test Document')
                                         ->setSubject('Office 2007 XLSX Test Document')
                                         ->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
                                         ->setKeywords('office 2007 openxml php')
                                         ->setCategory('Test result file');
            
            foreach(range('A','F') as $coulumID) {
                $spreadsheet->getActiveSheet(0)->getColumnDimension($coulumID)->setAutosize(true);

            }
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('A1','DATA');
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('B1','ORDEM');
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('C1','PRODUTO');
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('D1','UN');
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('E1','TIPO PRODUTO');
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('F1','HRS TRABALHADAS');
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('G1','PRODUCAO');
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('H1','PERCA');
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('I1','MÃO DE OBRA');
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('J1','MATERIAIS');
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('K1','CUSTO PRODUÇÃO');
            
            $x=2; //start from row 2
            foreach($listaProducaoDetalhada as $key_producao_detalhada => $producao_detalhada) 
            {
                $spreadsheet->setActiveSheetIndex(0)->setCellValue('A'.$x, str_replace('-', '/', date("d-m-Y", strtotime($producao_detalhada->data_reporte))));
                $spreadsheet->setActiveSheetIndex(0)->setCellValue('B'.$x, $producao_detalhada->num_ordem_producao);
                $spreadsheet->setActiveSheetIndex(0)->setCellValue('C'.$x, $producao_detalhada->cod_produto . ' - ' . $producao_detalhada->nome_produto);
                $spreadsheet->setActiveSheetIndex(0)->setCellValue('D'.$x, $producao_detalhada->cod_unidade_medida);
                $spreadsheet->setActiveSheetIndex(0)->setCellValue('E'.$x, $producao_detalhada->nome_tipo_produto);
                $spreadsheet->setActiveSheetIndex(0)->setCellValue('F'.$x, number_format($producao_detalhada->horas_trabalhadas, 2, ',', '.'));
                $spreadsheet->setActiveSheetIndex(0)->setCellValue('G'.$x, number_format($producao_detalhada->quant_reportada, 3, ',', '.'));
                $spreadsheet->setActiveSheetIndex(0)->setCellValue('H'.$x, number_format($producao_detalhada->quant_perdida, 3, ',', '.'));
                $spreadsheet->setActiveSheetIndex(0)->setCellValue('I'.$x, 'R$ ' . number_format($producao_detalhada->custo_mob, 2, ',', '.'));
                $spreadsheet->setActiveSheetIndex(0)->setCellValue('J'.$x, 'R$ ' . number_format($producao_detalhada->custo_producao, 2, ',', '.'));
                $spreadsheet->setActiveSheetIndex(0)->setCellValue('K'.$x, 'R$ ' . number_format($producao_detalhada->custo_producao + $producao_detalhada->custo_mob, 2, ',', '.'));

                $x++;
            }

            $spreadsheet->getActiveSheet()->setTitle('Produção por Produto');
            $spreadsheet->setActiveSheetIndex(0);

            // Redirect output to a client’s web browser (Xlsx)
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="Produção por Produto.xlsx"');
            header('Cache-Control: max-age=0');
            // If you're serving to IE 9, then the following may be needed
            header('Cache-Control: max-age=1');

            // If you're serving to IE over SSL, then the following may be needed
            header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
            header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
            header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
            header('Pragma: public'); // HTTP/1.0

            $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
            $writer->save('php://output');
            exit;

        }

        $dados = array(
            'dataInicio' => $dataInicio,
            'dataFim' => $dataFim,
            'cod_produto' => $codProdutos,
            'lista_produto_prod' => $listaPrudutoProd,
            'total_producao' => $totalProducao,
            'lista_producao_resumida' => $listaProducaoResumida,
            'lista_producao_detalhada' => $listaProducaoDetalhada,
            'lista_consumo_detalhado' => $listaConsumoDetalhado,
            'label_produto' => $labelProduto,
            'perc_produto' => $percProduto,
            'color_produto' => $colorProduto,
            'empresa' => $listaEmpresa,
            'menu' => 'Producao'
            
        );

        $this->load->view('producao/producao-produto', $dados);        
        

    }

    public function consumoProduto(){
        $dataInicio = "";
        $dataFim = "";

        if($this->input->get('DataInicio') != "" && $this->input->get('DataFim') != ""){
            $dataInicio = date("Y-m-d", strtotime(str_replace('/', '-', $this->input->get('DataInicio'))));
            $dataFim = date("Y-m-d", strtotime(str_replace('/', '-', $this->input->get('DataFim'))));
        }
        
        
        if($dataInicio == ""){
            $dataInicio = date('Y-m-01');
        }

        if($dataFim == ""){
            $dataFim = date('Y-m-d');
        }

        $codProdutosProduzido = $this->input->get('produtoProduzido'); 
        $codProdutosConsumido = $this->input->get('produtoConsumido'); 

        $listaPrudutoProd = $this->produto->getProdutoProduzido();
        $listaPrudutoCons = $this->produto->getProduto();
        $totalProducao = $this->producao->totalCustoConsumo($dataInicio, $dataFim, $codProdutosProduzido, $codProdutosConsumido);
        $listaConsumoResumido = $this->producao->consumoResumido($dataInicio, $dataFim, $codProdutosProduzido, $codProdutosConsumido);
        $listaConsumoDetalhado = $this->producao->consumoDetalhado($dataInicio, $dataFim, $codProdutosProduzido, $codProdutosConsumido);
        $listaEmpresa = $this->empresa->getEmpresaPorCodigo(getDadosUsuarioLogado()['id_empresa']);

        $dados = array(
            'dataInicio' => $dataInicio,
            'dataFim' => $dataFim,
            'cod_produto_produzido' => $codProdutosProduzido,
            'cod_produto_consumido' => $codProdutosConsumido,
            'lista_produto_prod' => $listaPrudutoProd,
            'lista_produto_cons' => $listaPrudutoCons,
            'total_producao' => $totalProducao,
            'lista_consumo_resumida' => $listaConsumoResumido,
            'lista_consumo_detalhado' => $listaConsumoDetalhado,
            'empresa' => $listaEmpresa,
            'menu' => 'Producao'
            
        );

        $this->load->view('producao/consumo-produto', $dados);

    }

    public function fichaComposicao(){

        $arvoreProduto = null;

        $codProduto = $this->input->get('produto');

        $listaPrudutoProd = $this->produto->getProdutoProduzido();
        $estrutura = $this->engenharia->getEstruturaProdutoPorCodigo($codProduto);
        $listaEmpresa = $this->empresa->getEmpresaPorCodigo(getDadosUsuarioLogado()['id_empresa']);

        $ordem = 1;
        $nivel = 1;

        $listaEstrutura = null;
        if($estrutura != null){
            $listaEstrutura[] = (object)[
                'ordem' => $ordem,
                'nivel' => $nivel,
                'cod_produto' => $estrutura->cod_produto,
                'nome_produto' => $estrutura->nome_produto,
                'tipo_produto' => $estrutura->nome_tipo_produto,
                'quantidade' => $estrutura->quant_producao,
                'cod_unidade_medida' => $estrutura->cod_unidade_medida,
                'custo_unit' => $estrutura->custo_medio,
                'custo_total' => $estrutura->custo_medio * $estrutura->quant_producao,
                'est_pai' => 1,
            ];

            $listaEstrutura = $this->getEstruturaRecursiva($codProduto, $listaEstrutura, $ordem, $nivel);
        }       

        $dados = array(
            'cod_produto' => $codProduto,
            'lista_produto_prod' => $listaPrudutoProd,
            'lista_estrutura' => $listaEstrutura,
            'empresa' => $listaEmpresa,
            'menu' => 'Producao'
            
        );

        $this->load->view('producao/ficha-composicao', $dados);

    }

    public function getEstruturaRecursiva($codProduto, $listaEstrutura, $ordem, $nivel){

        
        $nivel = $nivel + 1;

        $lista_estrutura = $this->engenharia->getComponentesPorEstrutura($codProduto);
        if($lista_estrutura == null){
            return $listaEstrutura;
        }else{
            foreach($lista_estrutura as $key_estrutura => $estrutura){

                $ordem = $ordem + 1;  

                $negrito = 0;                
                $validaEstrutura = $this->engenharia->getComponentesPorEstrutura($estrutura->cod_produto_componente);
                if($validaEstrutura != null){
                    $negrito = 1;
                }

                $listaEstrutura[] = (object)[
                    'ordem' => $ordem,
                    'nivel' => $nivel,
                    'cod_produto' => $estrutura->cod_produto_componente,
                    'nome_produto' => $estrutura->nome_produto,
                    'tipo_produto' => $estrutura->nome_tipo_produto,
                    'quantidade' => $estrutura->quant_consumo,
                    'cod_unidade_medida' => $estrutura->cod_unidade_medida,
                    'custo_unit' => $estrutura->custo_medio,
                    'custo_total' => $estrutura->custo_medio * $estrutura->quant_consumo,
                    'est_pai' => $negrito,
                ];

                $listaEstrutura = $this->getEstruturaRecursiva($estrutura->cod_produto_componente, $listaEstrutura, $ordem, $nivel);

            }
        }

        return $listaEstrutura;

    }

    public function redirecionaProducao(){

        $mes = date('m');
        $ano = date('Y');

        redirect(base_url("producao/{$mes}/{$ano}"), "home", "refresh");

    }

    public function producao(){

        $mes = $this->uri->segment(2);
        $ano = $this->uri->segment(3);

        $data = date('Y-m-01', strtotime('+1 months', strtotime(date(''.$ano.'-'.$mes.'-01'))));

        $descMes = null;
        switch($mes){
            case 1:
                $descMes = "Janeiro";
                break;
            case 2:
                $descMes = "Fevereiro";
                break;
            case 3:
                $descMes = "Março";
                break;
            case 4:
                $descMes = "Abril";
                break;
            case 5:
                $descMes = "Maio";
                break;
            case 6:
                $descMes = "Junho";
                break;
            case 7:
                $descMes = "Julho";
                break;
            case 8:
                $descMes = "Agosto";
                break;
            case 9:
                $descMes = "Setembro";
                break;
            case 10:
                $descMes = "Outubro";
                break;
            case 11:
                $descMes = "Novembro";
                break;
            case 12:
                $descMes = "Dezembro";
                break;
        }

        if($descMes == null){
            redirect(base_url("erro-404"));            
        }

        $dataInicio = date('Y-m-01', strtotime(date(''.$ano.'-'.$mes.'-01')));
        $dataFim = date('Y-m-t', strtotime(date(''.$ano.'-'.$mes.'-01')));

        $mesAnterior = date('m', strtotime('-1 months', strtotime(date(''.$ano.'-'.$mes.'-01'))));
        $anoAnterior = date('Y', strtotime('-1 months', strtotime(date(''.$ano.'-'.$mes.'-01'))));
        $mesSeguinte = date('m', strtotime('+1 months', strtotime(date(''.$ano.'-'.$mes.'-01'))));
        $anoSeguinte = date('Y', strtotime('+1 months', strtotime(date(''.$ano.'-'.$mes.'-01'))));
        

        $listaStatus = $this->producao->getStatusProducao($dataInicio, $dataFim);         
        $custoProducao = $this->producao->getCustosProducao($dataInicio, $dataFim);
        $listaProducao = $this->producao->getProducao($dataInicio, $dataFim);
        $listaConsumo = $this->producao->getConsumo($dataInicio, $dataFim);
        $listaCustoDia = $this->producao->getCustoPorDia($dataInicio, $dataFim);
        $listaHoraDia = $this->producao->getHorasPordia($dataInicio, $dataFim);

        // Custo Produção Por Dia
        $labelCustoDia = array();
        $dadosCustoDia = array();
        $labelDia = array();
        $labelNomMes = array();
        $labelAno = array();
        $totalCusto = 0;
        foreach($listaCustoDia as $custosdia){

            $labelCustoDia[] = str_replace('-', '/', date("d-m", strtotime($custosdia->data)));
            $labelDia[] = date("d", strtotime($custosdia->data));
            $labelNomMes[] = $custosdia->nome_mes;
            $labelAno[] = date("Y", strtotime($custosdia->data));
            $dadosCustoDia[] = $totalCusto + $custosdia->custo_dia;
            $totalCusto = $totalCusto + $custosdia->custo_dia;

        }

        // Produção produto
        $i = 0; 
        $color = "";
        $labelProduto = array();   
        $custoProduto = array(); 
        $colorProduto = array(); 
        foreach($listaConsumo as $produto){

            if($i == 10) continue;

            $i += 1;

            $color = $this->random_color($color);

            $labelProduto[] = $produto->nome_produto;
            $custoProduto[] = $produto->valor_consumido;
            $colorProduto[] = $color;

            $produto->color = $color;

        }        

        $dados = array(
            'custo_producao' => $custoProducao,
            'lista_producao' => $listaProducao,
            'lista_consumo' => $listaConsumo, 
            'lista_status' => $listaStatus, 

            'descMes' => $descMes,
            'dia' => $labelCustoDia,
            'custo_dia' => $dadosCustoDia,
            'total_custo' => $totalCusto,  
            'dia_nome' => $labelDia, 
            'nome_mes' => $labelNomMes,
            'ano' => $labelAno, 
            'horas_dia' => $listaHoraDia,

            //produto
            'label_produto' => $labelProduto,
            'custo_produto' => $custoProduto,
            'color_produto' => $colorProduto,
            
            'mes' => $mes,
            'ano' => $ano,
            'mes_anterior' => $mesAnterior,
            'ano_anterior' => $anoAnterior,
            'mes_seguinte' => $mesSeguinte,
            'ano_seguinte' => $anoSeguinte,
            'menu' => 'Producao'
        );

        $this->load->view('producao/producao', $dados);


    }

    //Form Validation customizados
    public function date_check($str)
    {
        if(date("Y-m-d", strtotime(str_replace('/', '-', $str))) > date("Y-m-d")){
            $this->form_validation->set_message('date_check', '%s não pode ser superior a data de hoje');
            return false;
        }else{
            return true;
        }
    }

    public function more_zero($str)
    {
        if(floatval(str_replace(",",".",(str_replace(".","",$str)))) <= 0.000){
            $this->form_validation->set_message('more_zero', 'Valor de %s deve ser maior que 0');
            return false;
        }else{
            return true;
        }
    }

    public function converteHorasDecimal($horaInicio, $horaFim){

        $horaInicioProd = explode(":", $horaInicio);
        $horaFimProd = explode(":", $horaFim);

        $horaIni = $horaInicioProd[0] * 60;
        $minIni = $horaInicioProd[1];
        $horaFim = $horaFimProd[0] * 60;
        $minFim = $horaFimProd[1];

        if($horaInicio > $horaFim){
            $horaDecimal = ((23 * 60 + 60) - ($horaIni + $minIni)) + ($horaFim + $minFim);
        }else{
            $horaDecimal = ($horaFim + $minFim) - ($horaIni + $minIni);
        }

        return round(($horaDecimal / 60),2);

    }

    function random_color($cor_atual) {

        $color = "";
        if($cor_atual == ""){
            $color = "#64b5f6";
        }elseif($cor_atual == "#64b5f6"){
            $color = "#c78481";
        }elseif($cor_atual == "#c78481"){
            $color = "#fff176";
        }elseif($cor_atual == "#fff176"){
            $color = "#e57373";
        }elseif($cor_atual == "#e57373"){
            $color = "#a1887f";
        }elseif($cor_atual == "#a1887f"){
            $color = "#7986cb";
        }elseif($cor_atual == "#7986cb"){
            $color = "#ffd54f";
        }elseif($cor_atual == "#ffd54f"){
            $color = "#f06292";
        }elseif($cor_atual == "#f06292"){
            $color = "#ff8a65";
        }elseif($cor_atual == "#ff8a65"){
            $color = "#90a4ae";
        }elseif($cor_atual == "#90a4ae"){
            $color = "#4fc3f7";
        }elseif($cor_atual == "#4fc3f7"){
            $color = "#9575cd";
        }elseif($cor_atual == "#9575cd"){
            $color = "#4db6ac";
        }elseif($cor_atual == "#4db6ac"){
            $color = "#42a5f5";
        }elseif($cor_atual == "#42a5f5"){
            $color = "#66bb6a";
        }elseif($cor_atual == "#66bb6a"){
            $color = "#64b5f6";
        }
        

        return $color;
    }
}