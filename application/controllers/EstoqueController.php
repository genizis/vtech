<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EstoqueController extends CI_Controller {

    function __construct(){
        parent::__construct();

        if(usuarioLogado() == false){

            redirect(base_url("login"), "home", "refresh");

        }

        if(getDadosUsuarioLogado()['estoque'] != 1){

            redirect(base_url("visao-geral"), "home", "refresh");

        }

        $empresa = $this->empresa->getEmpresaPorCodigo(getDadosUsuarioLogado()['id_empresa']);
        if($empresa->data_validade < date('Y-m-d')){
            $this->session->set_flashdata('erro', 'Período de acesso finalizado, entre em 
                                           contato através do telefone (41) 9 9666 8250 ou pelo email contato@shopfloor.com.br para renovação');
            redirect(base_url('logout'), "home", "refresh");
        }
    }

    public function formInventario(){

        $dados = array(
            'menu' => 'Estoque'
        );        

        $this->load->view('estoque/novo-inventario', $dados);

    } 

    public function formRequisicaoMaterial(){

        $dados = array(
            'menu' => 'Estoque'
        );        

        $this->load->view('estoque/nova-requisicao-material', $dados);

    } 

    public function inserirInventario(){  

        //Validações dos campos
        $this->form_validation->set_rules('DataEmissao', 'Data de Emissão', 'required|callback_date_check',
            array('required' => 'Você deve preencher o campo %s'));
        $this->form_validation->set_rules('DataExecucao', 'Data de Execução', 'required|callback_date_check',
            array('required' => 'Você deve preencher o campo %s'));

        if($this->form_validation->run() == false){

            $this->session->set_flashdata('erro', validation_errors());
            $this->formInventario();
            
        }else {

            $dados = [
                'id_empresa' => getDadosUsuarioLogado()['id_empresa'],
                'data_emissao' => date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataEmissao')))),
                'data_execucao' => date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataExecucao')))),
                'observacoes' => $this->input->post('ObsInventario')
            ];

            $numInventario = $this->estoque->insertInventario($dados);

            $this->session->set_flashdata('sucesso', 'Inventário cadastrado com sucesso');
            redirect(base_url("estoque/inventario/editar-inventario/{$numInventario}"), "home", "refresh");
                       
        }        
    }

    public function inserirRequisicaoMaterial(){  

        //Validações dos campos
        $this->form_validation->set_rules('DataEmissao', 'Data de Emissão', 'required|callback_date_check',
            array('required' => 'Você deve preencher o campo %s'));
        $this->form_validation->set_rules('DataRequisicao', 'Data de Requisição', 'required|callback_date_check',
            array('required' => 'Você deve preencher o campo %s'));

        if($this->form_validation->run() == false){

            $this->session->set_flashdata('erro', validation_errors());
            $this->formRequisicaoMaterial();
            
        }else {

            $dados = [
                'id_empresa' => getDadosUsuarioLogado()['id_empresa'],
                'data_emissao' => date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataEmissao')))),
                'data_requisicao' => date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataRequisicao')))),
                'observacoes' => $this->input->post('ObsRequisicaoMaterial')
            ];

            $codRequisicaoMaterial = $this->estoque->insertRequisicaoMaterial($dados);

            $this->session->set_flashdata('sucesso', 'Requisição de material cadastrado com sucesso');
            redirect(base_url("estoque/requisicao-material/editar-requisicao-material/{$codRequisicaoMaterial}"), "home", "refresh");
                       
        }        
    }

    public function editarInventario($numInventario){

        $listaInventario = $this->estoque->getInventarioPorCodigo($numInventario);
        $listaProduto = $this->estoque->getProdutoInventario($numInventario);
        $listaProdutoInv = $this->produto->getProdutoInventario($listaProduto);

        if($listaInventario == null){
            redirect(base_url('estoque/inventario'));
            
        }else{ 

            $dados = array(
                'inventario' => $listaInventario,
                'lista_produto' => $listaProduto,
                'lista_produto_inv' => $listaProdutoInv,
                'menu' => 'Estoque'
            );

            $this->load->view('estoque/editar-inventario', $dados);
        }

    }

    public function editarRequisicaoMaterial($codRequisicaoMaterial){

        $listaRequisicao = $this->estoque->getRequisicaoMaterialPorCodigo($codRequisicaoMaterial);
        $listaProduto = $this->estoque->getProdutoRequisicaoMaterial($codRequisicaoMaterial);
        $listaProdutoReq = $this->produto->getProdutoRequisicaoMaterial($listaProduto);

        if($listaRequisicao == null){
            redirect(base_url('estoque/requisicao-material'));
            
        }else{ 

            $dados = array(
                'requisicao' => $listaRequisicao,
                'lista_produto' => $listaProduto,
                'lista_produto_req' => $listaProdutoReq,
                'menu' => 'Estoque'
            );

            $this->load->view('estoque/editar-requisicao-material', $dados);
        }

    }

    public function movimentoProduto($CodProduto){

        $dataInicio = "";
        $dataFim = "";

        if($this->input->get('DataInicio') != "" && $this->input->get('DataFim') != ""){
            $dataInicio = date("Y-m-d", strtotime(str_replace('/', '-', $this->input->get('DataInicio'))));
            $dataFim = date("Y-m-d", strtotime(str_replace('/', '-', $this->input->get('DataFim'))));
        }
        
        if($dataInicio == ""){
            $dataInicio = date("Y-m-d", strtotime(date("Y-m-d")."-12 month"));
        }

        if($dataFim == ""){
            $dataFim = date('Y-m-d');
        }

        $listaMovimentos = $this->estoque->getMovimentosEstoquePorProduto($CodProduto, $dataInicio, $dataFim);
        $listaProdutoLote = $this->produto->getLotePorProduto($CodProduto);   
        $listaProdutoLoteValidade = $this->produto->getLotePorProdutoDentroValidade($CodProduto);  
        $listaProduto = $this->estoque->getProdutoPorCodigo($CodProduto); 
        
        if($listaProduto == null){

            redirect(base_url("visao-geral}"), "home", "refresh");  

        }

        $dados = array(            
            'dataInicio' => $dataInicio,
            'dataFim' => $dataFim,
            'produto' => $listaProduto,
            'lista_movimento' => $listaMovimentos,
            'lista_produto_lote' => $listaProdutoLote,
            'lista_produto_lote_validade' => $listaProdutoLoteValidade,
            'menu' => 'Estoque'
        );

        $this->load->view('estoque/movimento-produto', $dados);

    }

    public function inserirProdutoInventario($numInventario){

        //Validações dos campo e array das mensagens apresentadas
        $this->form_validation->set_rules('CodProduto', 'Produto de Inventário', 'required',
            array('required' => 'Você deve preencher o campo %s'));
        $this->form_validation->set_rules('QuantContagem', 'Quantidade Contagem', 'required', 
            array('required' => 'Você deve preencher o campo %s'));
            
        if($this->form_validation->run() == false){

            $this->session->set_flashdata('erro', validation_errors());
            redirect(base_url("estoque/inventario/editar-inventario/{$numInventario}"), "home", "refresh");
            
        }else {


            $dados = [
                'id_empresa' => getDadosUsuarioLogado()['id_empresa'],
                'num_inventario' => $numInventario,
                'cod_produto' => $this->input->post('CodProduto'),
                'cod_lote' => $this->input->post('CodLote'),
                'quant_contagem' => str_replace(",",".",(str_replace(".","",$this->input->post('QuantContagem'))))
            ];

            $this->estoque->insertProdutoInventario($dados);

            $this->session->set_flashdata('sucesso', 'Produto de inventário inserido com sucesso');
            redirect(base_url("estoque/inventario/editar-inventario/{$numInventario}"), "home", "refresh");
        }


    }

    public function inserirLote($codProduto){

        //Validações dos campo e array das mensagens apresentadas
        $this->form_validation->set_rules('CodLote', 'Código do Lote', 'required',
            array('required' => 'Você deve preencher o campo %s'));
        $this->form_validation->set_rules('DataValidade', 'Data de Validade', 'required', 
            array('required' => 'Você deve preencher o campo %s'));
            
        if($this->form_validation->run() == false){

            $this->session->set_flashdata('erro', validation_errors());
            redirect(base_url("estoque/posicao-estoque/movimento-produto/{$codProduto}#lote"), "home", "refresh");            
            
        }else {

            $lote = $this->produto->getLoteporCodigo($this->input->post('CodLote'), $codProduto);
            if($lote != null){

                $this->session->set_flashdata('erro', 'Já há um lote para este código no sistema');
                redirect(base_url("estoque/posicao-estoque/movimento-produto/{$codProduto}#lote"), "home", "refresh"); 
                
            }  

            $dados = [
                'id_empresa' => getDadosUsuarioLogado()['id_empresa'],
                'cod_produto' => $codProduto,
                'cod_lote' => $this->input->post('CodLote'),
                'data_validade' => date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataValidade')))),
                'dias_aviso_venc' => $this->input->post('DiasAviso'),
            ];
            $this->estoque->insertLote($dados);

            $this->session->set_flashdata('sucesso', 'Lote cadastrado com sucesso');
            redirect(base_url("estoque/posicao-estoque/movimento-produto/{$codProduto}#lote"), "home", "refresh");
        }

    }

    public function editarLote(){
        $codProduto = $this->uri->segment(4);
        $codLote = $this->uri->segment(5);

        //Validações dos campo e array das mensagens apresentadas
        $this->form_validation->set_rules('DataValidade', 'Data de Validade', 'required', 
            array('required' => 'Você deve preencher o campo %s'));

        if($this->form_validation->run() == false){

            $this->session->set_flashdata('erro', validation_errors());
            redirect(base_url("estoque/posicao-estoque/movimento-produto/{$codProduto}#lote"), "home", "refresh");  

        }else {

            $data = [
                'data_validade' => date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataValidade')))),
                'dias_aviso_venc' => $this->input->post('DiasAviso'),
            ];
            $this->estoque->updateLote($codProduto, $codLote, $data);

            $this->session->set_flashdata('sucesso', 'Lote alterado com sucesso');
            redirect(base_url("estoque/posicao-estoque/movimento-produto/{$codProduto}#lote"), "home", "refresh");

        }
    }

    public function inserirProdutoRequisicao($codRequisicaoMaterial){

        //Validações dos campo e array das mensagens apresentadas
        $this->form_validation->set_rules('CodProduto', 'Produto de Inventário', 'required',
            array('required' => 'Você deve preencher o campo %s'));
        $this->form_validation->set_rules('QuantRequisicao', 'Quantidade Requisição', 'required', 
            array('required' => 'Você deve preencher o campo %s'));
            
        if($this->form_validation->run() == false){

            $this->session->set_flashdata('erro', validation_errors());
            redirect(base_url("estoque/requisicao-material/editar-requisicao-material/{$codRequisicaoMaterial}"), "home", "refresh");
            
        }else {


            $dados = [
                'id_empresa' => getDadosUsuarioLogado()['id_empresa'],
                'cod_requisicao_material' => $codRequisicaoMaterial,
                'cod_produto' => $this->input->post('CodProduto'),
                'cod_lote' => $this->input->post('CodLote'),
                'quant_requisicao' => str_replace(",",".",(str_replace(".","",$this->input->post('QuantRequisicao'))))
            ];

            $this->estoque->insertProdutoRequisicaoMaterial($dados);

            $this->session->set_flashdata('sucesso', 'Produto da requisição inserido com sucesso');
            redirect(base_url("estoque/requisicao-material/editar-requisicao-material/{$codRequisicaoMaterial}"), "home", "refresh");
        }
    }

    public function salvarInventario($numInventario){

        //Validações dos campo e array das mensagens apresentadas
        $this->form_validation->set_rules('DataExecucao', 'Data de Execução', 'required|callback_date_check',
            array('required' => 'Você deve preencher o campo %s'));       

        if($this->form_validation->run() == false){

            $this->session->set_flashdata('erro', validation_errors());
            redirect(base_url("estoque/inventario/editar-inventario/{$numInventario}"), "home", "refresh");
            
        }else {         

            $dados = [
                'data_execucao' => date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataExecucao')))),
                'observacoes' => $this->input->post('ObsInventario')
            ];

            $this->estoque->updateInventario($numInventario, $dados);

            $this->session->set_flashdata('sucesso', 'Inventário atualizado com sucesso');
            redirect(base_url("estoque/inventario/editar-inventario/{$numInventario}"), "home", "refresh");
                       
        }  
    }

    public function salvarRequisicaoMaterial($codRequisicaoMaterial){

        //Validações dos campo e array das mensagens apresentadas
        $this->form_validation->set_rules('DataRequisicao', 'Data da Requisição', 'required|callback_date_check',
            array('required' => 'Você deve preencher o campo %s'));       

        if($this->form_validation->run() == false){

            $this->session->set_flashdata('erro', validation_errors());
            redirect(base_url("estoque/requisicao-material/editar-requisicao-material/{$codRequisicaoMaterial}"), "home", "refresh");
            
        }else {         

            $dados = [
                'data_requisicao' => date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataRequisicao')))),
                'observacoes' => $this->input->post('ObsRequisicaoMaterial')
            ];

            $this->estoque->updateRequisicaoMaterial($codRequisicaoMaterial, $dados);

            $this->session->set_flashdata('sucesso', 'Requisição de material atualizado com sucesso');
            redirect(base_url("estoque/requisicao-material/editar-requisicao-material/{$codRequisicaoMaterial}"), "home", "refresh");
                       
        }  
    }

    public function salvarProduto(){
        $numInventario = $this->uri->segment(4);
        $seqProdutoInv = $this->uri->segment(5);

        //Validações dos campo e array das mensagens apresentadas
        $this->form_validation->set_rules('QuantContagemEdit', 'Quantidade Contagem', 'required',
            array('required' => 'Você deve preencher o campo %s'));

        if($this->form_validation->run() == false){

            $this->session->set_flashdata('erro', validation_errors());
            redirect(base_url("estoque/inventario/editar-inventario/{$numInventario}"), "home", "refresh");
            
        }else {

            $data = [
                'quant_contagem' => str_replace(",",".",(str_replace(".","",$this->input->post('QuantContagemEdit'))))
            ];

            $this->estoque->updateProdutoInventario($seqProdutoInv, $data);

            $this->session->set_flashdata('sucesso', 'Produto de inventário alterado com sucesso');
            redirect(base_url("estoque/inventario/editar-inventario/{$numInventario}"), "home", "refresh");
                       
        }  
    }

    public function salvarProdutoRequisicao(){
        $codRequisicaoMaterial = $this->uri->segment(4);
        $seqProdutoRequisicao = $this->uri->segment(5);

        //Validações dos campo e array das mensagens apresentadas
        $this->form_validation->set_rules('QuantRequisicaoEdit', 'Quantidade Requisição', 'required',
            array('required' => 'Você deve preencher o campo %s'));

        if($this->form_validation->run() == false){

            $this->session->set_flashdata('erro', validation_errors());
            redirect(base_url("estoque/requisicao-material/editar-requisicao-material/{$codRequisicaoMaterial}"), "home", "refresh");
            
        }else {

            $data = [
                'quant_requisicao' => str_replace(",",".",(str_replace(".","",$this->input->post('QuantRequisicaoEdit'))))
            ];

            $this->estoque->updateProdutoRequisicaoMaterial($seqProdutoRequisicao, $data);

            $this->session->set_flashdata('sucesso', 'Produto de requisição alterado com sucesso');
            redirect(base_url("estoque/requisicao-material/editar-requisicao-material/{$codRequisicaoMaterial}"), "home", "refresh");
                       
        }  
    }

    public function excluirProduto($numInventario){

        $seqProdutoInventario = $this->input->post("excluir_todos");

        $this->estoque->deleteProdutoInventario($seqProdutoInventario);
        $this->session->set_flashdata('sucesso', 'Registro(s) selecionado(s) excluído(s)');
        redirect(base_url("estoque/inventario/editar-inventario/{$numInventario}"), "home", "refresh");
        
    }

    public function excluirLote($codProduto){

        $codigoLote = $this->input->post("excluir_todos");

        $this->produto->deleteLote($codigoLote, $codProduto);
        $this->session->set_flashdata('sucesso', 'Registro(s) selecionado(s) excluído(s)');
        redirect(base_url("estoque/posicao-estoque/movimento-produto/{$codProduto}#lote"), "home", "refresh");
        
    }

    public function excluirProdutoRequisicao($codRequisicaoMaterial){

        $seqProdutoRequisicao = $this->input->post("excluir_todos");

        $this->estoque->deleteProdutoRequisicao($seqProdutoRequisicao);
        $this->session->set_flashdata('sucesso', 'Registro(s) selecionado(s) excluído(s)');
        redirect(base_url("estoque/requisicao-material/editar-requisicao-material/{$codRequisicaoMaterial}"), "home", "refresh");
        
    }

    public function excluirInventario(){

        $numInventario = $this->input->post("excluir_todos");

        $this->estoque->deleteInventario($numInventario);
        $this->session->set_flashdata('sucesso', 'Registro(s) selecionado(s) excluído(s)');
        redirect(base_url("estoque/inventario"), "home", "refresh");
        
    }

    public function executarInventario($numInventario){

        $listaInventario = $this->estoque->getInventarioPorCodigo($numInventario);
        $listaProduto = $this->estoque->getProdutoInventario($numInventario);

        foreach($listaProduto as $key_produto => $produto){

            $quantEstoq = 0;
            if($produto->tipo_controle == 2){
                $quantEstoq = $produto->quant_estoq_lote;
            }else{
                $quantEstoq = $produto->quant_estoq;
            }

            $dataProdutoInventario = null;
            $dataProdutoInventario = [
                'quant_estoq_exec' => $quantEstoq,
                'custo_medio' => $produto->custo_medio
            ];

            $this->estoque->updateProdutoInventario($produto->seq_produto_inventario, $dataProdutoInventario);

            if($quantEstoq > $produto->quant_contagem){
                $quantMovimento = $quantEstoq - $produto->quant_contagem;
                $tipoMovimento = 2;
                $especieMovimento = 15;
            }elseif($quantEstoq < $produto->quant_contagem){
                $quantMovimento =  $produto->quant_contagem - $quantEstoq;
                $tipoMovimento = 1;
                $especieMovimento = 14;
            }elseif($quantEstoq == $produto->quant_contagem){
                $quantMovimento = 0;
            }

            if($quantMovimento != 0){

                $dataEstoque = null;
                $dataEstoque = [
                    'id_empresa' => getDadosUsuarioLogado()['id_empresa'],
                    'data_movimento' => $listaInventario->data_execucao,
                    'cod_produto' => $produto->cod_produto,
                    'cod_lote' => $produto->cod_lote,
                    'origem_movimento' => 4,
                    'id_origem' => $numInventario,
                    'tipo_movimento' => $tipoMovimento,
                    'especie_movimento' => $especieMovimento,
                    'quant_movimentada' => $quantMovimento,
                    'valor_movimento' => 0,
                    'usuario' => getDadosUsuarioLogado()['email'],
                ];

                $this->estoque->insertMovimentoEstoque($dataEstoque);

            }

            
        }

        $dataInventario = [
            'status' => 2
        ];

        $this->estoque->updateInventario($numInventario, $dataInventario);

        $this->session->set_flashdata('sucesso', 'Inventário executado com sucesso');
        redirect(base_url("estoque/inventario/editar-inventario/{$numInventario}"), "home", "refresh");

    }

    public function redirecionaEstoque(){

        $mes = date('m');
        $ano = date('Y');

        redirect(base_url("estoque/{$mes}/{$ano}"), "home", "refresh");

    }

    public function estoque(){

        $mes = $this->uri->segment(2);
        $ano = $this->uri->segment(3);

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

        $data = date('Y-m-01', strtotime('+1 months', strtotime(date(''.$ano.'-'.$mes.'-01'))));

        $dataInicioAno = date('Y-m-01', strtotime(date(''.$ano.'-01-01')));
        $dataInicio = date('Y-m-01', strtotime(date(''.$ano.'-'.$mes.'-01')));
        $dataFim = date('Y-m-t', strtotime(date(''.$ano.'-'.$mes.'-01')));

        $mesAnterior = date('m', strtotime('-1 months', strtotime(date(''.$ano.'-'.$mes.'-01'))));
        $anoAnterior = date('Y', strtotime('-1 months', strtotime(date(''.$ano.'-'.$mes.'-01'))));
        $mesSeguinte = date('m', strtotime('+1 months', strtotime(date(''.$ano.'-'.$mes.'-01'))));
        $anoSeguinte = date('Y', strtotime('+1 months', strtotime(date(''.$ano.'-'.$mes.'-01'))));

        $listaRecebimento = $this->compra->getValoresCompras($dataInicio, $dataFim);
        $listaCompraAno = $this->compra->getComprasAno($dataInicioAno, $dataFim);
        $listaComprasDia = $this->compra->getComprasPorDia($dataInicio, $dataFim);
        $compraPendente = $this->compra->getCompraPendente($dataInicio, $dataFim);
        $ordensPendentes = $this->compra->getOrdensPendentes($dataInicio, $dataFim);
        $listaProduto = $this->compra->getCompraProdutoDash($dataInicio, $dataFim);
        $listaFornecedor = $this->compra->getCompraFornecedorDash($dataInicio, $dataFim);
        $totalPedido = $this->compra->getTotaisPedido($dataInicio, $dataFim);

        // Compra Por Dia
        $labelComprasDia = array();
        $dadosComprasDia = array();
        $dadosDescontoDia = array();
        $labelDia = array();
        $labelNomMes = array();
        $labelAno = array();
        $totalCompra = 0;
        foreach($listaComprasDia as $comprasdia){

            $labelComprasDia[] = str_replace('-', '/', date("d-m", strtotime($comprasdia->data)));
            $labelDia[] = date("d", strtotime($comprasdia->data));
            $labelNomMes[] = $comprasdia->nome_mes;
            $labelAno[] = date("Y", strtotime($comprasdia->data));
            $dadosComprasDia[] = $totalCompra + $comprasdia->compra_dia;
            $totalCompra = $totalCompra + $comprasdia->compra_dia;

        }

        // Compra ano
        $labelNomMesAno = array();
        $labelAno = array();
        $labelMes = array();
        $compraMes = array(); 
        $totalAno = 0;  
        foreach($listaCompraAno as $compra_mes){
            
            $labelAno[] = $compra_mes->ano;
            $labelMes[] = $compra_mes->mes;
            $labelNomMesAno[] = $compra_mes->nome_mes;
            $compraMes[] = $compra_mes->compra_mes;
            $totalAno = $totalAno + $compra_mes->compra_mes;

        }

        // Venda por cliente 
        $i = 0; 
        $color = "#ff8a65";
        $labelFornecedor = array();   
        $percFornecedor = array(); 
        $colorFornecedor = array(); 
        foreach($listaFornecedor as $venda_fornecedor){

            if($i == 10) continue;

            $i += 1;

            $color = $this->random_color($color);

            $labelFornecedor[] = $venda_fornecedor->nome_fornecedor;
            $percFornecedor[] = (($venda_fornecedor->total_compra + $venda_fornecedor->total_frete +
                                  $venda_fornecedor->total_seguro + $venda_fornecedor->outras_despesas - 
                                  $venda_fornecedor->total_desconto) / $listaRecebimento->total_compras) * 100;
            $colorFornecedor[] = $color;

            $venda_fornecedor->color = $color;

        }

        // Venda por produto 
        $i = 0; 
        $color = "";
        $labelProduto = array();   
        $percProduto = array(); 
        $colorProduto = array(); 
        foreach($listaProduto as $venda_produto){

            if($i == 10) continue;

            $i += 1;

            $color = $this->random_color($color);

            $labelProduto[] = $venda_produto->nome_produto;
            $percProduto[] = ($venda_produto->valor_total / $listaRecebimento->total_produto) * 100;
            $colorProduto[] = $color;

            $venda_produto->color = $color;

        }        

        $listaFaturamento = $this->venda->getValoresVendas($dataInicio, $dataFim); 

        $pedOrcamento = $this->venda->getVendaOrcamento($dataInicio, $dataFim);
        $prdOrcReprov = $this->venda->getOrcamentoReprov($dataInicio, $dataFim);  
        
        //--fim compras
        $ValorTipoProduto = $this->estoque->getValorEstoquePorTipoProduto($dataFim);
        $totalEstoque = 0;
        foreach($ValorTipoProduto as $tipo_produto){
            $totalEstoque = $totalEstoque + $tipo_produto->valor_estoque;
        }

        // Estoque por tipo de produto 
        $i = 0; 
        $color = "#ff8a65";
        $labelTipoProduto = array();   
        $percTipoProduto = array(); 
        $colorTipoProduto = array(); 
        foreach($ValorTipoProduto as $tipo_produto){

            if($i == 10) continue;

            $i += 1;

            $color = $this->random_color($color);

            $labelTipoProduto[] = $tipo_produto->nome_tipo_produto;
            $percTipoProduto[] = ($tipo_produto->valor_estoque / $totalEstoque) * 100;
            $colorTipoProduto[] = $color;

            $tipo_produto->color = $color;

        }

        //$listaEstoquePrevisto = $this->estoque->getEstoqueDia($dataInicio, $dataFim);

        $dados = array(
            'valor_tipo_produto' => $ValorTipoProduto,  
            'label_tipo_produto' => $labelTipoProduto,
            'perc_tipo_produto' => $percTipoProduto,
            'color_tipo_produto' => $colorTipoProduto,
            'total_tipo_produto' => $totalEstoque, 

            //-- Fim compras
            'lista_recebimento' => $listaRecebimento,
            'pendente' => $compraPendente,
            'ordens_pendente' => $ordensPendentes,
            'compra_ano' => $listaCompraAno,
            'lista_produto' => $listaProduto,
            'lista_fornecedor' => $listaFornecedor, 
            'totais_pedido' => $totalPedido,

            'descMes' => $descMes,
            'dia' => $labelComprasDia ,
            'compra_dia' => $dadosComprasDia,
            'desconto_dia' => $dadosDescontoDia,
            'total_compra' => $totalCompra,  
            'dia_nome' => $labelDia, 
            'nome_mes' => $labelNomMes,
            'ano' => $labelAno,
            
            //compra ano
            'label_ano' => $labelAno,
            'label_mes' => $labelMes,
            'label_nome_mes' => $labelNomMesAno,
            'compra_mes' => $compraMes,
            'total_ano' => $totalAno,

            //fornecedor
            'label_fornecedor' => $labelFornecedor,
            'perc_fornecedor' => $percFornecedor,
            'color_fornecedor' => $colorFornecedor,

            //produto
            'label_produto' => $labelProduto,
            'perc_produto' => $percProduto,
            'color_produto' => $colorProduto,
            
            'mes' => $mes,
            'ano' => $ano,
            'mes_anterior' => $mesAnterior,
            'ano_anterior' => $anoAnterior,
            'mes_seguinte' => $mesSeguinte,
            'ano_seguinte' => $anoSeguinte,
            'menu' => 'Estoque'
        );

        $this->load->view('estoque/estoque', $dados);


    }

    public function atenderRequisicaoMaterial($codRequisicaoMaterial){

        $listaRequisicaoMaterial = $this->estoque->getRequisicaoMaterialPorCodigo($codRequisicaoMaterial);
        $listaProduto = $this->estoque->getProdutoRequisicaoMaterial($codRequisicaoMaterial);

        foreach($listaProduto as $key_produto => $produto){

            if($produto->saldo_negativo == 0 && $produto->quant_estoq < $produto->quant_requisicao){
                $this->session->set_flashdata('erro', 'Produto <strong>(' . $produto->cod_produto . ') ' . $produto->nome_produto . '</strong> sem estoque suficiente para requisição');
                redirect(base_url("estoque/requisicao-material/editar-requisicao-material/{$codRequisicaoMaterial}"), "home", "refresh");
            }            

            $dataEstoque = null;
            $dataEstoque = [
                'id_empresa' => getDadosUsuarioLogado()['id_empresa'],
                'data_movimento' => $listaRequisicaoMaterial->data_requisicao,
                'cod_produto' => $produto->cod_produto,
                'cod_lote' => $produto->cod_lote,
                'origem_movimento' => 5,
                'id_origem' => $codRequisicaoMaterial,
                'tipo_movimento' => 2,
                'especie_movimento' => 16,
                'quant_movimentada' => $produto->quant_requisicao,
                'valor_movimento' => $produto->quant_requisicao * $produto->custo_medio,
                'usuario' => getDadosUsuarioLogado()['email'],
            ];
            $this->estoque->insertMovimentoEstoque($dataEstoque);

            $dataProdRequisicao = [
                'custo_medio' => $produto->custo_medio
            ];
            $this->estoque->updateProdutoRequisicaoMaterial($produto->seq_produto_requisicao_material, $dataProdRequisicao);

        }

        $dataRequisicao = [
            'status' => 2
        ];
        $this->estoque->updateRequisicaoMaterial($codRequisicaoMaterial, $dataRequisicao);

        $this->session->set_flashdata('sucesso', 'Requisição atendida com sucesso');
        redirect(base_url("estoque/requisicao-material/editar-requisicao-material/{$codRequisicaoMaterial}"), "home", "refresh");

    }

    public function estornoRequisicaoMaterial($codRequisicaoMaterial){

        $listaRequisicaoMaterial = $this->estoque->getRequisicaoMaterialPorCodigo($codRequisicaoMaterial);
        $listaProduto = $this->estoque->getProdutoRequisicaoMaterial($codRequisicaoMaterial);

        foreach($listaProduto as $key_produto => $produto){

            $dataEstoque = null;
            $dataEstoque = [
                'id_empresa' => getDadosUsuarioLogado()['id_empresa'],
                'data_movimento' => $listaRequisicaoMaterial->data_requisicao,
                'cod_produto' => $produto->cod_produto,
                'cod_lote' => $produto->cod_lote,
                'origem_movimento' => 5,
                'id_origem' => $codRequisicaoMaterial,
                'tipo_movimento' => 1,
                'especie_movimento' => 17,
                'quant_movimentada' => $produto->quant_requisicao,
                'valor_movimento' => $produto->quant_requisicao * $produto->custo_medio,
                'considera_calc_custo' => '1',
                'usuario' => getDadosUsuarioLogado()['email'],
            ];
            $this->estoque->insertMovimentoEstoque($dataEstoque);

        }

        $dataRequisicao = [
            'status' => 1
        ];
        $this->estoque->updateRequisicaoMaterial($codRequisicaoMaterial, $dataRequisicao);

        $this->session->set_flashdata('sucesso', 'Requisição estornada com sucesso');
        redirect(base_url("estoque/requisicao-material/editar-requisicao-material/{$codRequisicaoMaterial}"), "home", "refresh");

    }

    public function inserirMovimentoProduto($CodProduto){  

        //Validações dos campos
        $this->form_validation->set_rules('EspecieMovimento', 'Espécie do Movimento', 'required', 
            array('required' => 'Você deve preencher o campo %s'));
        $this->form_validation->set_rules('DataMovimento', 'Data do Movimento', 'required', 
            array('required' => 'Você deve preencher o campo %s'));
        $this->form_validation->set_rules('QuantMovimentada', 'Quantidade Movimentada', 'required|callback_more_zero', 
            array('required' => 'Você deve preencher o campo %s'));

        if($this->form_validation->run() == false){

            $this->session->set_flashdata('erro', validation_errors());
            redirect(base_url("estoque/posicao-estoque/movimento-produto/{$CodProduto}"), "home", "refresh");
            
        }else {   
            
            $quantMovimento = str_replace(",",".",(str_replace(".","",$this->input->post('QuantMovimentada'))));
            $valorMovimento = str_replace(",",".",(str_replace(".","",$this->input->post('ValorMovimento'))));

            $produto = $this->produto->getProdutoPorCodigo($CodProduto); 

            if($this->input->post('EspecieMovimento') == 10){

                $tipoMovimento = 1;

            }elseif($this->input->post('EspecieMovimento') == 11){

                $tipoMovimento = 2;

                if($produto->saldo_negativo == 0 && $produto->quant_estoq < $quantMovimento){                    

                    $this->session->set_flashdata('erro', 'Produto <strong>(' . $produto->cod_produto . ') ' . $produto->nome_produto . '</strong> sem estoque suficiente para o movimento');
                    redirect(base_url("estoque/posicao-estoque/movimento-produto/{$CodProduto}"), "home", "refresh");

                }
            }

            $dataEstoque = [
                'id_empresa' => getDadosUsuarioLogado()['id_empresa'],
                'data_movimento' => date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataMovimento')))),
                'cod_produto' => $CodProduto,
                'cod_lote' => $this->input->post('CodLote'),
                'origem_movimento' => 5,
                'tipo_movimento' => $tipoMovimento,
                'especie_movimento' => $this->input->post('EspecieMovimento'),                
                'quant_movimentada' => $quantMovimento,
                'valor_movimento' => $valorMovimento,
                'observacao' => $this->input->post('Observacao'),
                'usuario' => getDadosUsuarioLogado()['email'],
            ];

            $this->estoque->insertMovimentoEstoque($dataEstoque);

            // Atualização do Custo Médio
            if($this->input->post('EspecieMovimento') == "10" && $valorMovimento != 0){

                //Atualiza Custo Médio produto
                $custoMedio = $this->estoque->getCustoMedio($produto->cod_produto);
                if($custoMedio != null && $custoMedio->total_valor != 0){

                    $dadosProd = null;
                    $dadosProd = [
                        'custo_medio' => ($custoMedio->total_valor + $valorMovimento) / ($custoMedio->total_movimentado + $quantMovimento)
                    ];
        
                    $this->produto->updateProduto($produto->cod_produto, $dadosProd);
                } 

            }

            $this->session->set_flashdata('sucesso', 'Movimento do produto inserido com sucesso');
            redirect(base_url("estoque/posicao-estoque/movimento-produto/{$CodProduto}"), "home", "refresh");

        }        
    }

    public function redirecionaPosicaoEstoque(){

        $mes = date('m');
        $ano = date('Y');

        redirect(base_url("estoque/posicao-estoque/{$mes}/{$ano}"), "home", "refresh");

    }

    public function redirecionaInventario(){

        $mes = date('m');
        $ano = date('Y');

        redirect(base_url("estoque/inventario/{$mes}/{$ano}"), "home", "refresh");

    }

    public function listarInventario(){  

        $mes = $this->uri->segment(3);
        $ano = $this->uri->segment(4); 
        
        $filter = ($this->input->get('buscar')) ? $this->input->get('buscar') : "";

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

        $dataInicio = date('Y-m-01', strtotime(date(''.$ano.'-'.$mes.'-01')));
        $dataFim = date('Y-m-t', strtotime(date(''.$ano.'-'.$mes.'-01')));

        $mesAnterior = date('m', strtotime('-1 months', strtotime(date(''.$ano.'-'.$mes.'-01'))));
        $anoAnterior = date('Y', strtotime('-1 months', strtotime(date(''.$ano.'-'.$mes.'-01'))));
        $mesSeguinte = date('m', strtotime('+1 months', strtotime(date(''.$ano.'-'.$mes.'-01'))));
        $anoSeguinte = date('Y', strtotime('+1 months', strtotime(date(''.$ano.'-'.$mes.'-01'))));

        // Busca dos dados para apresentação
        $listaInventario = $this->estoque->getInventario($dataInicio, $dataFim, $filter);
        $indicadorInventario = $this->estoque->getIndicadoresInventario($dataInicio, $dataFim);


        $dados = array(
            'descMes' => $descMes,
            'mes' => $mes,
            'ano' => $ano,
            'filter' => $filter,
            'mes_anterior' => $mesAnterior,
            'ano_anterior' => $anoAnterior,
            'mes_seguinte' => $mesSeguinte,
            'ano_seguinte' => $anoSeguinte,
            'lista_inventario' => $listaInventario,
            'indicador_inventario' => $indicadorInventario,
            'menu' => 'Estoque'
        );

        $this->load->view('estoque/inventario', $dados);
    }

    public function redirecionaRequisicaoMaterial(){

        $mes = date('m');
        $ano = date('Y');

        redirect(base_url("estoque/requisicao-material/{$mes}/{$ano}"), "home", "refresh");

    }

    public function listarRequisicaoMaterial(){      

        $mes = $this->uri->segment(3);
        $ano = $this->uri->segment(4); 
        
        $filter = ($this->input->get('buscar')) ? $this->input->get('buscar') : "";

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

        $dataInicio = date('Y-m-01', strtotime(date(''.$ano.'-'.$mes.'-01')));
        $dataFim = date('Y-m-t', strtotime(date(''.$ano.'-'.$mes.'-01')));

        $mesAnterior = date('m', strtotime('-1 months', strtotime(date(''.$ano.'-'.$mes.'-01'))));
        $anoAnterior = date('Y', strtotime('-1 months', strtotime(date(''.$ano.'-'.$mes.'-01'))));
        $mesSeguinte = date('m', strtotime('+1 months', strtotime(date(''.$ano.'-'.$mes.'-01'))));
        $anoSeguinte = date('Y', strtotime('+1 months', strtotime(date(''.$ano.'-'.$mes.'-01'))));

        $listaRequisicaoMaterial = $this->estoque->getRequisicaoMaterial($dataInicio, $dataFim, $filter);
        $indicadorRequisicao = $this->estoque->getIndicadoresRequisicao($dataInicio, $dataFim);


        $dados = array(
            'descMes' => $descMes,
            'mes' => $mes,
            'ano' => $ano,
            'filter' => $filter,
            'mes_anterior' => $mesAnterior,
            'ano_anterior' => $anoAnterior,
            'mes_seguinte' => $mesSeguinte,
            'ano_seguinte' => $anoSeguinte,
            'lista_requisicao' => $listaRequisicaoMaterial,
            'indicador_requisicao' => $indicadorRequisicao,
            'menu' => 'Estoque'
        );

        $this->load->view('estoque/requisicao-material', $dados);
    }

    public function listarProdutoEstoque(){        
        
        $mes = $this->uri->segment(3);
        $ano = $this->uri->segment(4);

        if(date(''.$ano.'-'.$mes.'-01') > date('Y-m-01')){
            $this->redirecionaPosicaoEstoque();
        }

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

        $data = date('Y-m-t', strtotime(date(''.$ano.'-'.$mes.'-01')));

        $mesAnterior = date('m', strtotime('-1 months', strtotime(date(''.$ano.'-'.$mes.'-01'))));
        $anoAnterior = date('Y', strtotime('-1 months', strtotime(date(''.$ano.'-'.$mes.'-01'))));
        $mesSeguinte = date('m', strtotime('+1 months', strtotime(date(''.$ano.'-'.$mes.'-01'))));
        $anoSeguinte = date('Y', strtotime('+1 months', strtotime(date(''.$ano.'-'.$mes.'-01'))));

        $produtoFiltro = $this->input->get('produtoFiltro');
        $tipoProdutoFiltro = $this->input->get('TipoProdutoFiltro');
        $unFiltro = $this->input->get('unFiltro');

        $listaProdutoFiltro = $this->estoque->getProdutoControleEstoque();
        $listaTipoProduto = $this->tipoproduto->getTipoProduto();
        $listaUn = $this->unidademedida->getUnidadeMedida();
        $totalEstoque = $this->estoque->getProdutosEstoque($produtoFiltro, $tipoProdutoFiltro, $unFiltro);
        $totalMovimentosFuturo = $this->estoque->getMovimentosFuturos($data, $produtoFiltro, $tipoProdutoFiltro, $unFiltro);

        $config = array(
            'base_url' => base_url("estoque/posicao-estoque/{$mes}/{$ano}"),
            'per_page' => 20,
            'num_links' => 10,
            'uri_segment' => 5,
            'total_rows' => $this->estoque->countAllEstoque($produtoFiltro, $tipoProdutoFiltro, $unFiltro),
            'reuse_query_string' => true,
            'full_tag_open' => '<ul class="pagination justify-content-center mb-0 link-load">',
			'full_tag_close' => '</ul>',
			'first_link' => FALSE,
			'last_link' => FALSE,
			'first_tag_open' => '<li class="page-item">',
			'first_tag_close' => '<li class="page-item">',
			'prev_link' => '&laquo;',
			'prev_tag_open' => '<li class="page-item prev">',
			'prev_tag_close' => '</li>',
			'next_link' => '&raquo;',
			'next_tag_open' => '<li class="page-item next">',
			'next_tag_close' => '</li>',
			'last_tag_open' => '<li class="page-item">',
			'last_tag_close' => "</li>",
			'cur_tag_open' => '<li class="page-item active"><span class="page-link">',
			'cur_tag_close' => '</span></li>',
			'num_tag_open' => '<li class="page-item">',
			'num_tag_close' => '</li>'
        );

        $this->pagination->initialize($config);

        // Busca dos dados para apresentação
        $filter = ($this->input->get('buscar')) ? $this->input->get('buscar') : "";
        $offset = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
        $listaProduto = $this->estoque->getPosicaoProduto($filter, $data, $config["per_page"], $offset, $produtoFiltro, $tipoProdutoFiltro, $unFiltro);
        $ValorTipoProduto = $this->estoque->getValorEstoquePorTipoProduto();


        $dados = array(
            'pagination' => $this->pagination->create_links(),
            'descMes' => $descMes,
            'mes' => $mes,
            'ano' => $ano,
            'lista_produto' => $listaProduto,
            'valor_tipo_produto' => $ValorTipoProduto,
            'total_estoque' => $totalEstoque,
            'total_movimento_futuro' => $totalMovimentosFuturo,
            'produtoFiltro' => $produtoFiltro,
            'tipoProdutoFiltro' => $tipoProdutoFiltro,
            'unFiltro' => $unFiltro,
            'lista_produto_filtro' => $listaProdutoFiltro,
            'lista_tipo_produto' => $listaTipoProduto,
            'lista_un' => $listaUn,
            'data' => $data,
            'mes_anterior' => $mesAnterior,
            'ano_anterior' => $anoAnterior,
            'mes_seguinte' => $mesSeguinte,
            'ano_seguinte' => $anoSeguinte,
            'menu' => 'Estoque'
        );

        $this->load->view('estoque/posicao-estoque', $dados);
    } 

    public function listarCalculoNecessidade(){     
        
        // Busca dos dados para apresentação
        $filter = ($this->input->get('buscar')) ? $this->input->get('buscar') : "";
        $offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        

        $config = array(
            'base_url' => base_url('estoque/necesssidade-materiais'),
            'per_page' => 10,
            'num_links' => 10,
            'uri_segment' => 3,
            'total_rows' => $this->estoque->countAllCalculoNecessidade($filter),
            'full_tag_open' => '<ul class="pagination justify-content-center">',
			'full_tag_close' => '</ul>',
			'first_link' => FALSE,
			'last_link' => FALSE,
			'first_tag_open' => '<li class="page-item">',
			'first_tag_close' => '<li class="page-item">',
			'prev_link' => '&laquo;',
			'prev_tag_open' => '<li class="page-item prev">',
			'prev_tag_close' => '</li>',
			'next_link' => '&raquo;',
			'next_tag_open' => '<li class="page-item next">',
			'next_tag_close' => '</li>',
			'last_tag_open' => '<li class="page-item">',
			'last_tag_close' => "</li>",
			'cur_tag_open' => '<li class="page-item active"><span class="page-link">',
			'cur_tag_close' => '</span></li>',
			'num_tag_open' => '<li class="page-item">',
			'num_tag_close' => '</li>'
        );

        $listaCalculo = $this->estoque->getCalculoMRP($filter, $config["per_page"], $offset);

        $this->pagination->initialize($config);      


        $dados = array(
            'pagination' => $this->pagination->create_links(),
            'lista_calculo' => $listaCalculo,
            'menu' => 'Estoque'
        );

        $this->load->view('estoque/necessidade-material', $dados);
    }

    public function formNovoCalculo(){

        $dados = array(
            'menu' => 'Estoque'
        );
        

        $this->load->view('estoque/novo-calculo-necessidade', $dados);

    }

    public function inserirCalculo(){  

        //Validações dos campos
        $this->form_validation->set_rules('DataInicio', 'Data Início', 'required',
            array('required' => 'Você deve preencher o campo %s'));
        $this->form_validation->set_rules('DataFim', 'Data Fim', 'required',
            array('required' => 'Você deve preencher o campo %s'));

        if($this->form_validation->run() == false){

            $this->session->set_flashdata('erro', validation_errors());
            $this->formNovoCalculo();
            
        }else {            

            $dataInicio = date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataInicio'))));
            $dataFim = date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataFim'))));

            $calculoNecessidade = $this->estoque->validaDataCalculo($dataInicio);
            if($calculoNecessidade != false){

                $this->session->set_flashdata('erro', 'Já há um cálculo de necessidade dentro da data de início informada');
                redirect(base_url("estoque/necessidade-material/novo-calculo-necessidade"), "home", "refresh");

            }

            $calculoNecessidade = $this->estoque->validaDataCalculo($dataFim);
            if($calculoNecessidade != false){

                $this->session->set_flashdata('erro', 'Já há um cálculo de necessidade dentro da data de fim informada');
                redirect(base_url("estoque/necessidade-material/novo-calculo-necessidade"), "home", "refresh");

            }            

            $dados = [
                'id_empresa' => getDadosUsuarioLogado()['id_empresa'],
                'data_inicio' => $dataInicio,
                'data_fim' => $dataFim,
                'tipo_calculo' => $this->input->post('TipoCalc'),
                'observacoes' => $this->input->post('ObsCalculo')
            ];
            $codCalculo = $this->estoque->insertCalculoNecessidade($dados);

            $pedidosVenda = $this->venda->getPedidoPorDataEntrega($dataInicio, $dataFim);
            foreach($pedidosVenda as $key_produto => $venda){

                if($venda->quant_atendida == 0){

                    $dados = null;
                    $dados = [
                        'num_pedido_venda' => $venda->num_pedido_venda,
                        'cod_calculo_necessidade' => $codCalculo
                    ];
                    $this->estoque->insertCalculoNecessidadePedido($dados);
                }
            }

            $this->session->set_flashdata('sucesso', 'Cálculo de Necessidade cadastrado com sucesso');
            redirect(base_url("estoque/necessidade-material/editar-calculo-necessidade/{$codCalculo}"), "home", "refresh");
                       
        }        
    }

    public function editarCalculoNecessidade($codCalculo){

        $listaNecessidade = $this->estoque->getNecessidadePorCodigo($codCalculo);
        $listaPedido = $this->estoque->getPedidoPorCalculoNecessidade($codCalculo);  
        $listaOrdemProducao = $this->estoque->getProdutoOrdemProducao($codCalculo); 
        $listaOrdemCompra = $this->estoque->getProdutoOrdemCompra($codCalculo); 
        
        $listaPrudutoProd = $this->produto->getProdutoProduzido();
        $listaProdutoComp = $this->produto->getProdutoComprado();


        $listaProduto = $this->estoque->getProdutosPedidosPorCalculoNecessidade($codCalculo); 
        
        if($listaNecessidade == null){
            redirect(base_url('estoque/necessidade-material'));
            
        }else{ 

            $dados = array(
                'necessidade' => $listaNecessidade,
                'lista_pedido' => $listaPedido,  
                'lista_ordem_producao' => $listaOrdemProducao,   
                'lista_ordem_compra' => $listaOrdemCompra,    
                'lista_produto' => $listaProduto,   
                'lista_produto_prod' => $listaPrudutoProd, 
                'lista_produto_comp' => $listaProdutoComp,  
                'menu' => 'Estoque'
            );        

            $this->load->view('estoque/editar-calculo-necessidade', $dados);
        }

    }

    public function atualizaListaProduto($codCalculo){

        $necessidade = $this->estoque->getNecessidadePorCodigo($codCalculo);
        $this->estoque->deleteTotosPedidoCalculo($codCalculo);

        $pedidosVenda = $this->venda->getPedidoPorDataEntrega($necessidade->data_inicio, $necessidade->data_fim);
        foreach($pedidosVenda as $key_produto => $venda){

            if($venda->quant_atendida == 0){

                $dados = null;
                $dados = [
                    'num_pedido_venda' => $venda->num_pedido_venda,
                    'cod_calculo_necessidade' => $codCalculo
                ];
                $this->estoque->insertCalculoNecessidadePedido($dados);
            }

        }

        $this->session->set_flashdata('sucesso', 'Lista de pedidos de venda atualizada com sucesso');
        redirect(base_url("estoque/necessidade-material/editar-calculo-necessidade/{$codCalculo}"), "home", "refresh");

    }

    public function salvarCalculoNecessidade($codCalculo){  

        if($this->input->post('TipoCalc') != null)
            $dados = [
                'tipo_calculo' => $this->input->post('TipoCalc'),
                'observacoes' => $this->input->post('ObsCalculo')
            ];
        else
            $dados = [
                'observacoes' => $this->input->post('ObsCalculo')
            ];
        $this->estoque->updateCalculoNecessidade($codCalculo, $dados);

        $this->session->set_flashdata('sucesso', 'Cálculo de necessidade atualizado com sucesso');
        redirect(base_url("estoque/necessidade-material/editar-calculo-necessidade/{$codCalculo}"), "home", "refresh");

    }

    public function excluirPedidoCalculo($codCalculo){

        $pedidoVenda = $this->input->post("excluir_todos_pedidos");
        $this->estoque->deletePedidoCalculo($pedidoVenda);

        $this->session->set_flashdata('sucesso', 'Registro(s) selecionado(s) excluído(s)');
        redirect(base_url("estoque/necessidade-material/editar-calculo-necessidade/{$codCalculo}"));
    }

    public function calculaNecessidade($codCalculo){

        $listaNecessidade = $this->estoque->getNecessidadePorCodigo($codCalculo);

        //Cálculo necessidade bruta
        $listaProduto = $this->estoque->getNecessidadeProdutoPedido($codCalculo);
        foreach($listaProduto as $key_produto => $produto){ 
            
            $dataNecessidade = date('Y-m-d', strtotime('-' . $produto->tempo_abastecimento . ' days', strtotime($produto->data_entrega)));

            $dados = null;
            $dados = [
                'cod_produto' => $produto->cod_produto,
                'cod_calculo_necessidade' => $codCalculo,
                'data_necessidade' => $dataNecessidade,
                'tipo_necessidade' => $produto->origem_produto,
                'quant_necessidade' => $produto->quant_pedida,
            ];
            $this->estoque->insertCalculoNecessidadeProduto($dados);  
            
            $this->criaNecessidadeEstrutura($produto->cod_produto, $produto->quant_pedida, $dataNecessidade, $codCalculo);
            
        }

        if($listaNecessidade->tipo_calculo == 1){

            // Ajusta necessidade líquida
            $listaNecessidade = $this->estoque->getProdutoNecessidade($codCalculo); 
            $estoque_produto = null;
            foreach($listaNecessidade as $key_produto => $necessidade){ 

                if(!isset($estoque_produto[$necessidade->cod_produto])){
                    $produtoNecessidade = $this->estoque->getCalcEstoqueProduto($necessidade->cod_produto, $necessidade->data_necessidade, 1);
                    $estoque_produto[$necessidade->cod_produto] = $produtoNecessidade->quant_estoq + $produtoNecessidade->quant_ordem_producao + 
                                                                $produtoNecessidade->quant_ordem_compra - $produtoNecessidade->quant_consumo_producao - $produtoNecessidade->quant_pedido_venda;

                } 
                
                $produtoNecessidade = $this->estoque->getCalcEstoqueProduto($necessidade->cod_produto, $necessidade->data_necessidade, 2);
                $estoque_produto[$necessidade->cod_produto] = $estoque_produto[$necessidade->cod_produto] + $produtoNecessidade->quant_ordem_producao + $produtoNecessidade->quant_ordem_compra - 
                                                                                                            $produtoNecessidade->quant_consumo_producao;

                //Se a necessidade for menor que o item em estoque, apaga necessidade e atualiza quantidade disponível
                if($estoque_produto[$necessidade->cod_produto] >= $necessidade->quant_necessidade){

                    $estoque_produto[$necessidade->cod_produto] = $estoque_produto[$necessidade->cod_produto] - $necessidade->quant_necessidade;
                    $this->estoque->deleteProdutoCalculo($necessidade->cod_calculo_necessidade_produto);

                }elseif($estoque_produto[$necessidade->cod_produto] < $necessidade->quant_necessidade){

                    $dados = null;
                    $dados = [
                        'quant_necessidade' => $necessidade->quant_necessidade - $estoque_produto[$necessidade->cod_produto],
                    ];
                    $this->estoque->updateCalculoNecessidadeProduto($necessidade->cod_calculo_necessidade_produto, $dados);

                    $estoque_produto[$necessidade->cod_produto] = 0;

                }
                
            }
        }

        $dados = null;
        $dados = [
            'status' => 2
        ];
        $this->estoque->updateCalculoNecessidade($codCalculo, $dados);
        
        $this->session->set_flashdata('sucesso', 'Cálculo de necessidade realizada com sucesso');
        redirect(base_url("estoque/necessidade-material/editar-calculo-necessidade/{$codCalculo}#ordens-producao"));

    }

    public function criaNecessidadeEstrutura($codProduto, $quantNecessidade, $dataNecessidade, $codCalculo){

        $estrutura = $this->engenharia->getEstruturaProdutoPorCodigo($codProduto);
        if($estrutura != false){

            $listaComponente = $this->estoque->getNecessidadeProdutoEstrutura($codProduto);
            foreach($listaComponente as $componente){

                $quantNecessidadeEstrutura = $componente->quant_consumo * ($quantNecessidade / $componente->quant_producao);
                $dataNecessidadeEstrutura = date('Y-m-d', strtotime('-' . $componente->tempo_abastecimento . ' days', strtotime($dataNecessidade)));

                $dados = null;
                $dados = [
                    'cod_produto' => $componente->cod_produto_componente,
                    'cod_calculo_necessidade' => $codCalculo,
                    'data_necessidade' => $dataNecessidadeEstrutura,
                    'tipo_necessidade' => $componente->origem_produto,
                    'quant_necessidade' => $quantNecessidadeEstrutura,
                ];
                $this->estoque->insertCalculoNecessidadeProduto($dados);
                
                $this->criaNecessidadeEstrutura($componente->cod_produto_componente, $quantNecessidadeEstrutura, $dataNecessidadeEstrutura, $codCalculo);
            } 
        }
    }

    public function descalculaNecessidade($codCalculo){

        $this->estoque->deleteCalculoNecessidadeProduto($codCalculo);      

        $dados = null;
        $dados = [
            'status' => 1
        ];
        $this->estoque->updateCalculoNecessidade($codCalculo, $dados); 

        
        $this->session->set_flashdata('sucesso', 'Necessidade descálculada com sucesso');
        redirect(base_url("estoque/necessidade-material/editar-calculo-necessidade/{$codCalculo}"));

    }

    public function inserirProdutoProducao($codCalculo){  

        //Validações dos campo e array das mensagens apresentadas
        $this->form_validation->set_rules('CodProduto', 'Produto de Produção', 'required',
            array('required' => 'Você deve preencher o campo %s'));
        $this->form_validation->set_rules('DataNecessidadeProducao', 'Data de Necessidade', 'required', 
            array('required' => 'Você deve preencher o campo %s'));
        $this->form_validation->set_rules('QuantNecessariaProducao', 'Quantidade Necessária', 'required|max_length[60]|callback_more_zero', 
            array('required' => 'Você deve preencher o campo %s'));

        if($this->form_validation->run() == false){

            $this->session->set_flashdata('erro', validation_errors());
            $this->editarCalculoNecessidade($codCalculo);
            
        }else {

            $codProduto = $this->input->post('CodProduto');
            $dataNecessidade = date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataNecessidadeProducao'))));

            $calculoNecessidadeProd = $this->estoque->getNecessidadePorCodigoData($codCalculo, $codProduto, $dataNecessidade);
            if($calculoNecessidadeProd != false){

                $this->session->set_flashdata('erro', 'Já há um planejamento de produção para este produto na data informada');
                redirect(base_url("estoque/necessidade-material/editar-calculo-necessidade/{$codCalculo}#ordens-producao"));  

            }

            $dados = [
                'cod_produto' => $codProduto,
                'cod_calculo_necessidade' => $codCalculo,
                'data_necessidade' => $dataNecessidade,
                'tipo_necessidade' => 1,
                'quant_necessidade' => str_replace(",",".",(str_replace(".","",$this->input->post('QuantNecessariaProducao')))),
            ];
            $this->estoque->insertCalculoNecessidadeProduto($dados);  

            $this->session->set_flashdata('sucesso', 'Produto de produção inserido com sucesso');
            redirect(base_url("estoque/necessidade-material/editar-calculo-necessidade/{$codCalculo}#ordens-producao"));         
        }        
    }

    public function excluirProdutoProducao($codCalculo){

        $produtoProducao = $this->input->post("excluir_todos_producao");
        $this->estoque->deleteProdutoCalculo($produtoProducao);

        $this->session->set_flashdata('sucesso', 'Registro(s) selecionado(s) excluído(s)');
        redirect(base_url("estoque/necessidade-material/editar-calculo-necessidade/{$codCalculo}#ordens-producao"));
    }

    public function salvarProdutoProducao(){  

        $codCalculoProduto = $this->uri->segment(4);
        $codCalculo = $this->uri->segment(5);

        $dados = [
            'quant_necessidade' => str_replace(",",".",(str_replace(".","",$this->input->post('QuantNecessariaProducaoEdit')))),
        ];
        $this->estoque->updateCalculoNecessidadeProduto($codCalculoProduto, $dados);

        $this->session->set_flashdata('sucesso', 'Produto de produção atualizado com sucesso');
        redirect(base_url("estoque/necessidade-material/editar-calculo-necessidade/{$codCalculo}#ordens-producao"), "home", "refresh");

    }

    public function inserirProdutoCompra($codCalculo){  

        //Validações dos campo e array das mensagens apresentadas
        $this->form_validation->set_rules('CodProduto', 'Produto de Produção', 'required',
            array('required' => 'Você deve preencher o campo %s'));
        $this->form_validation->set_rules('DataNecessidadeCompra', 'Data de Necessidade', 'required', 
            array('required' => 'Você deve preencher o campo %s'));
        $this->form_validation->set_rules('QuantNecessariaCompra', 'Quantidade Necessária', 'required|max_length[60]|callback_more_zero', 
            array('required' => 'Você deve preencher o campo %s'));

        if($this->form_validation->run() == false){

            $this->session->set_flashdata('erro', validation_errors());
            $this->editarCalculoNecessidade($codCalculo);
            
        }else {

            $codProduto = $this->input->post('CodProduto');
            $dataNecessidade = date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataNecessidadeCompra'))));

            $calculoNecessidadeProd = $this->estoque->getNecessidadePorCodigoData($codCalculo, $codProduto, $dataNecessidade);
            if($calculoNecessidadeProd != false){

                $this->session->set_flashdata('erro', 'Já há um planejamento de produção para este produto na data informada');
                redirect(base_url("estoque/necessidade-material/editar-calculo-necessidade/{$codCalculo}#ordens-compra"));  

            }

            $dados = [
                'cod_produto' => $codProduto,
                'cod_calculo_necessidade' => $codCalculo,
                'data_necessidade' => $dataNecessidade,
                'tipo_necessidade' => 2,
                'quant_necessidade' => str_replace(",",".",(str_replace(".","",$this->input->post('QuantNecessariaCompra')))),
            ];
            $this->estoque->insertCalculoNecessidadeProduto($dados);  

            $this->session->set_flashdata('sucesso', 'Produto de produção inserido com sucesso');
            redirect(base_url("estoque/necessidade-material/editar-calculo-necessidade/{$codCalculo}#ordens-compra"));         
        }        
    }

    public function excluirProdutoCompra($codCalculo){

        $produtoCompra = $this->input->post("excluir_todos_compra");
        $this->estoque->deleteProdutoCalculo($produtoCompra);

        $this->session->set_flashdata('sucesso', 'Registro(s) selecionado(s) excluído(s)');
        redirect(base_url("estoque/necessidade-material/editar-calculo-necessidade/{$codCalculo}#ordens-compra"));
    }

    public function salvarProdutoCompra(){  

        $codCalculoProduto = $this->uri->segment(4);
        $codCalculo = $this->uri->segment(5);

        $dados = [
            'quant_necessidade' => str_replace(",",".",(str_replace(".","",$this->input->post('QuantNecessariaCompraEdit')))),
        ];
        $this->estoque->updateCalculoNecessidadeProduto($codCalculoProduto, $dados);

        $this->session->set_flashdata('sucesso', 'Produto de produção atualizado com sucesso');
        redirect(base_url("estoque/necessidade-material/editar-calculo-necessidade/{$codCalculo}#ordens-compra"), "home", "refresh");

    }

    public function confirmaOrdem($codCalculo){

        $produtoNecessidade = $this->estoque->getProdutoCalculoNecessidade($codCalculo);
        foreach($produtoNecessidade as $produto){

            if($produto->tipo_necessidade == 2 && $this->input->post('OrdemCompra') == 1){

                $dados = null;
                $dados = [
                    'id_empresa' => getDadosUsuarioLogado()['id_empresa'],
                    'cod_produto'  => $produto->cod_produto,
                    'data_necessidade' => $produto->data_necessidade,
                    'quant_pedida' => $produto->quant_necessidade,
                    'cod_calculo_necessidade' => $codCalculo,
                    'observacoes' => "Ordem automática gerada pelo cálculo de necessidade " . $codCalculo,
                ];    
                $this->compra->insertOrdemCompra($dados);

            }elseif($produto->tipo_necessidade == 1 && $this->input->post('OrdemProducao') == 1){

                $dados = null;
                $dados = [
                    'id_empresa' => getDadosUsuarioLogado()['id_empresa'],
                    'cod_produto'  => $produto->cod_produto,
                    'data_emissao' => date("Y-m-d"),
                    'data_fim' => $produto->data_necessidade,
                    'quant_planejada' => $produto->quant_necessidade,
                    'cod_calculo_necessidade' => $codCalculo,
                    'observacoes' => "Ordem automática gerada pelo cálculo de necessidade " . $codCalculo,
                ];    
                $numOrdemProducao = $this->producao->insertOrdemProducao($dados);
    
                $quantPlan = $produto->quant_necessidade;
    
                //Cria componentes da ordem de produção com base na engenharia do item
                $listaComponentes = $this->engenharia->getComponentesPorEstrutura($produto->cod_produto);
                foreach($listaComponentes as $componente){ 
                        
                    $dadosConsumo = null;
                    $dadosConsumo = [
                        'num_ordem_producao' => $numOrdemProducao,
                        'cod_produto'  => $componente->cod_produto_componente,
                        'quant_consumo' => $componente->quant_consumo * ($quantPlan / $componente->quant_producao)
                    ];    
                    $this->producao->insertConsumo($dadosConsumo);
                        
                }
            }
        }

        $dados = null;
        $dados = [
            'status' => 3
        ];
        $this->estoque->updateCalculoNecessidade($codCalculo, $dados);

        $this->session->set_flashdata('sucesso', 'Ordens confirmadas com sucesso');
        redirect(base_url("estoque/necessidade-material/editar-calculo-necessidade/{$codCalculo}"), "home", "refresh");

    }

    public function desconfirmaOrdem($codCalculo){

        $ordemProducao = $this->producao->getOrdemProducaoPorCalculoNecessidade($codCalculo);
        foreach($ordemProducao as $ordem){

            if($ordem->count_mov == 0){
                $this->producao->deleteComponenteProducaoPorOrdem($ordem->num_ordem_producao);
                $this->producao->deleteOrdemProducao($ordem->num_ordem_producao);
            }
        }

        $ordemCompra = $this->compra->getOrdemCompraoPorCalculoNecessidade($codCalculo);
        foreach($ordemCompra as $ordem){

            if($ordem->quant_atendida == 0){
                $this->compra->deleteOrdemCompra($ordem->num_ordem_compra);
            }
        }

        $dados = null;
        $dados = [
            'status' => 2
        ];
        $this->estoque->updateCalculoNecessidade($codCalculo, $dados);

        $this->session->set_flashdata('sucesso', 'Ordens desconfirmadas com sucesso');
        redirect(base_url("estoque/necessidade-material/editar-calculo-necessidade/{$codCalculo}"), "home", "refresh");

    }

    public function imprimirNecessidadeMaterial($codCalculo)   
    {

        $empresa = $this->empresa->getEmpresaPorCodigo(getDadosUsuarioLogado()['id_empresa']);
        
        $listaNecessidade = $this->estoque->getNecessidadePorCodigo($codCalculo);
        $listaPedido = $this->estoque->getPedidoPorCalculoNecessidade($codCalculo);  
        $listaOrdemProducao = $this->estoque->getProdutoOrdemProducao($codCalculo); 
        $listaOrdemCompra = $this->estoque->getProdutoOrdemCompra($codCalculo); 

        $dados = array(
            'empresa' => $empresa,
            'necessidade' => $listaNecessidade,
            'lista_pedido' => $listaPedido,
            'lista_producao' => $listaOrdemProducao,
            'lista_compra' => $listaOrdemCompra,
            'menu' => 'Estoque'
        );        

        $this->load->view('estoque/imprime-necessidade-material', $dados);       

    }
    
    //Relatórios
    public function movimentacoesProduto(){
        
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

        $listaProduto = $this->produto->getProdutoInventario();  
        $listaMovimentoResumido = $this->estoque->getMovimentoResumido($dataInicio, $dataFim, $codProdutos);
        $listaMovimentoDetalhada = $this->estoque->getMovimentoDetalhado($dataInicio, $dataFim, $codProdutos);
        $totalMovimento = $this->estoque->getTotalMovimento($dataInicio, $dataFim, $codProdutos);

        $dados = array(
            'dataInicio' => $dataInicio,
            'dataFim' => $dataFim,
            'cod_produto' => $codProdutos,
            'lista_produto' => $listaProduto,
            'lista_movimento_resumido' => $listaMovimentoResumido,
            'lista_movimento_detalhado' => $listaMovimentoDetalhada,
            'total_movimento' => $totalMovimento,
            'menu' => 'Estoque'
            
        );

        $this->load->view('estoque/movimentacao-produto', $dados);

    }

    public function visaoEstoque(){
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

        $listaPordutoEstoque = $this->estoque->getProdutoEstoque();
        $listaMovimentoPeriodo = $this->estoque->getMovimentoEstoque($dataInicio, $dataFim);

        $listaComprasDia = $this->compra->getComprasDiaria($dataInicio, $dataFim);
        $valorPendente = $this->compra->getCompraPendente($dataInicio, $dataFim);
        $listaCompraProduto = $this->compra->getCompraProduto($dataInicio, $dataFim);
        $listaCompraFornecedor = $this->compra->getCompraFornecedor($dataInicio, $dataFim);

        $codProdutos = "";
        $periodo = "";        

        // Estoque por Produto
        $codProdutoEstoq = array();
        $NomProdutoEstoq = array();
        $codUnidMedida = array();
        $quantEstoq = array();
        $valorEstoq = array();
        $valTotalEstoq = 0;
        foreach($listaPordutoEstoque as $produto){

            $codProdutoEstoq[] = $produto->cod_produto;
            $NomProdutoEstoq[] = $produto->nome_produto;
            $codUnidMedida[] = $produto->cod_unidade_medida;
            $quantEstoq[] = $produto->quant_estoq;
            $valorEstoq[] = $produto->custo_medio * $produto->quant_estoq;
            $valTotalEstoq = $valTotalEstoq + ($produto->custo_medio * $produto->quant_estoq);

        }

        //Movimento de estoque
        $codProdutoMov = array();
        $nomeProdutoMov = array();
        $unidMedidaMov = array();
        $dadosEntrada = array();
        $dadosSaida = array();
        $valorEntrada = 0;
        $valorSaida = 0;
        foreach($listaMovimentoPeriodo as $key_movimento => $movimento){

            $codProdutoMov[] = $movimento->cod_produto;
            $nomeProdutoMov[] = $movimento->nome_produto;
            $unidMedidaMov[] = $movimento->cod_unidade_medida;

            $dadosEntrada[] = $movimento->total_entrada;
            $dadosSaida[] = $movimento->total_saida;

            $valorEntrada = $valorEntrada + $movimento->valor_entrada;
            $valorSaida = $valorSaida + $movimento->valor_saida;
        }        

        $dados = array(
            'dataInicio' => $dataInicio,
            'dataFim' => $dataFim,

            'cod_produto_estoq' => $codProdutoEstoq,
            'nom_produto_estoq' => $NomProdutoEstoq,
            'cod_unid_medida' => $codUnidMedida,
            'quant_estoq' => $quantEstoq,   
            'valor_estoq' => $valorEstoq, 
            'valor_total_estoq' => $valTotalEstoq,
            'valor_entrada' => $valorEntrada,
            'valor_saida' => $valorSaida,
            
            'cod_produto_mov' => $codProdutoMov,            
            'nom_produto_mov' => $nomeProdutoMov,
            'cod_unid_med_mov' => $unidMedidaMov,
            'dados_entrada' => $dadosEntrada,
            'dados_saida' => $dadosSaida,
            
            'menu' => 'Estoque'
        );

        $this->load->view('estoque/indicadores-estoque', $dados);

    }


    //Form Validation customizadas
    public function more_zero($str)
    {
        if(floatval(str_replace(",",".",$str)) <= 0.000){
            $this->form_validation->set_message('more_zero', 'Valor de %s deve ser maior que 0');
            return false;
        }else{
            return true;
        }
    }

    public function date_check($str)
    {
        if(date("Y-m-d", strtotime(str_replace('/', '-', $str))) > date("Y-m-d")){
            $this->form_validation->set_message('date_check', '%s não pode ser superior a data de hoje');
            return false;
        }else{
            return true;
        }
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