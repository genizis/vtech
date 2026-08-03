<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ComprasController extends CI_Controller {

    function __construct(){
        parent::__construct();

        if(usuarioLogado() == false){

            redirect(base_url("login"), "home", "refresh");

        }

        if(getDadosUsuarioLogado()['compras'] != 1){

            redirect(base_url("visao-geral"), "home", "refresh");

        }

        $empresa = $this->empresa->getEmpresaPorCodigo(getDadosUsuarioLogado()['id_empresa']);
        if($empresa->data_validade < date('Y-m-d')){
            $this->session->set_flashdata('erro', 'Período de acesso finalizado, entre em 
                                           contato através do telefone (41) 9 9666 8250 ou pelo email contato@shopfloor.com.br para renovação');
            redirect(base_url('logout'), "home", "refresh");
        }
    }

    public function imprimirPedido($numPedidoCompra)   
    {

        $empresa = $this->empresa->getEmpresaPorCodigo(getDadosUsuarioLogado()['id_empresa']);
        $listaPedidoCompra = $this->compra->getPedidoCompraPorCodigo($numPedidoCompra);
        $listaFornecedor = $this->fornecedor->buscarPorCodigo($listaPedidoCompra->cod_fornecedor); 
        $listaProdutosPedido = $this->compra->getProdutoPedido($numPedidoCompra);

        $dados = array(
            'empresa' => $empresa,
            'fornecedor' => $listaFornecedor,
            'pedido' => $listaPedidoCompra,
            'lista_produto' => $listaProdutosPedido, 
            'menu' => ''
        );        

        $this->load->view('compras/imprime-pedido-compra', $dados);       

    }

    public function formOrdemCompra(){

        $listaProdutoComp = $this->produto->getProdutoComprado();

        $dados = array(
            'lista_produto_comp' => $listaProdutoComp,
            'menu' => 'Compras'
        );        

        $this->load->view('compras/nova-ordem-compra', $dados);

    }   

    public function formPedidoCompra(){

        $listaFornecedor = $this->fornecedor->getFornecedor();

        $dados = array(
            'lista_fornecedor' => $listaFornecedor,
            'menu' => 'Compras'
        );        

        $this->load->view('compras/novo-pedido-compra', $dados);

    } 
    
    public function editarPedidoCompra($numPedidoCompra){

        $listaPedidoCompra = $this->compra->getPedidoCompraPorCodigo($numPedidoCompra);        
        $listaOrdemCompra = $this->compra->getOrdemPorPedido($numPedidoCompra);
        $listaProdutosPedido = $this->compra->getProdutoPedido($numPedidoCompra);
        $listaOrdemSemPedido = $this->compra->getOrdemSemPedido();
        $listaProdutoComp = $this->produto->getProdutoComprado();

        if($listaPedidoCompra == null){
            redirect(base_url('compras/pedido-compra'));
            
        }else{ 

            $dados = array(
                'pedido' => $listaPedidoCompra,
                'lista_ordem_compra' => $listaOrdemCompra,
                'lista_produto' => $listaProdutosPedido,                
                'lista_ordem_sem_pedido' => $listaOrdemSemPedido,
                'lista_produto_comp' => $listaProdutoComp,
                'menu' => 'Compras'
            );       

            $this->load->view('compras/editar-pedido-compra', $dados);
        }
    }

    public function editarOrdemCompra($numOrdemCompra){

        $listaOrdemCompra = $this->compra->getOrdemCompraPorCodigo($numOrdemCompra);        
        $listaCotacaoOrdem = $this->compra->getCotacaoPorOrdem($numOrdemCompra);
        $listaFornecedor = $this->fornecedor->getFornecedorCotacao($listaCotacaoOrdem);

        if($listaOrdemCompra == null){
            redirect(base_url('compras/pedido-compra'));
            
        }else{ 

            $dados = array(
                'ordem' => $listaOrdemCompra,
                'cotacao' => $listaCotacaoOrdem,
                'lista_fornecedor' => $listaFornecedor,
                'menu' => 'Compras'
            );       

            $this->load->view('compras/editar-ordem-compra', $dados);
        }
    }
    
    public function edtarRecebimentoMaterial($numPedidoCompra){

        $listaEmpresa = $this->empresa->getEmpresaPorCodigo(getDadosUsuarioLogado()['id_empresa']);
        $listaPedidoCompra = $this->compra->getPedidoCompraPorCodigo($numPedidoCompra);
        $listaRecebimentos = $this->compra->getRecebimentos($numPedidoCompra);
        $listaOrdemCompra = $this->compra->getOrdemPorPedido($numPedidoCompra);
        $listaProdutosPedido = $this->compra->getProdutoPedido($numPedidoCompra);
        $listaLotesProdutoCompra = $this->compra->getLotesPorProdutoCompra($listaProdutosPedido);
        $listaRecebimentoPedido = $this->compra->getRecebimentoPorPedido($numPedidoCompra);
        $listaConta = $this->financeiro->getContaAtivaRel();
        $listaMetodoPagamento = $this->financeiro->getMetodoPagamentoFat();
        $listaContaContabil = $this->financeiro->getContaContabilAtivoFat();
        $listaCentroCusto = $this->financeiro->getCentroCustoAtivo();
        $listaTitulosPedido = $this->financeiro->getTitulosPorPedidoCompra($numPedidoCompra);

        $listaFornecedor = $this->fornecedor->getFornecedor();

        if($listaPedidoCompra == null){
            redirect(base_url('compras/recebimento-material'));
            
        }else{ 

            $dados = array(
                'empresa' => $listaEmpresa,
                'pedido' => $listaPedidoCompra,
                'lista_recebimento' => $listaRecebimentos,
                'lista_ordem_compra' => $listaOrdemCompra,
                'lista_produto' => $listaProdutosPedido,
                'lista_lote_produto' => $listaLotesProdutoCompra,
                'lista_recebimento_pedido' => $listaRecebimentoPedido,
                'lista_conta' => $listaConta,
                'lista_metodo_pagamento' => $listaMetodoPagamento,
                'lista_conta_contabil' => $listaContaContabil,
                'lista_centro_custo' => $listaCentroCusto, 
                'lista_fornecedor' => $listaFornecedor,
                'lista_recebimento_titulo' => $listaTitulosPedido,
                'menu' => 'Compras'
                
            );

            $this->load->view('compras/novo-recebimento-material', $dados);
        }

    }  
    
    public function redirecionaCotacaoFornecedor(){

        $codFornecedor = $this->input->get('CodFornecedor');
        redirect(base_url("compras/ordem-compra/nova-cotacao-fornecedor/{$codFornecedor}"), "home", "refresh"); 
    }

    public function editarCotacaoCompra($codFornecedor){

        $listaEmpresa = $this->empresa->getEmpresaPorCodigo(getDadosUsuarioLogado()['id_empresa']);
        $listaFornecedor = $this->fornecedor->getFornecedorPorCodigo($codFornecedor);
        $listaCotacoes = $this->compra->getCotacoesPorFornecedor($codFornecedor);
        $listaOrdemSemPedido = $this->compra->getOrdemSemPedido();  
        $listaProdutoComp = $this->produto->getProdutoComprado();      

        if($listaFornecedor == null){
            redirect(base_url('compras/ordem-compra'));
            
        }else{ 

            $dados = array(
                'empresa' => $listaEmpresa,
                'fornecedor' => $listaFornecedor,
                'lista_cotacao_fornecedor' => $listaCotacoes,
                'lista_ordem_sem_pedido' => $listaOrdemSemPedido,
                'lista_produto_comp' => $listaProdutoComp,
                'menu' => 'Compras'                
            );
            $this->load->view('compras/nova-cotacao-fornecedor', $dados);
        }

    }

    public function novaOrdemCotacao($codFornecedor){  

        //Validações dos campo e array das mensagens apresentadas
        $this->form_validation->set_rules('CodProduto', 'Produto de Compra', 'required',
            array('required' => 'Você deve preencher o campo %s'));
        $this->form_validation->set_rules('DataNecessidade', 'Data de Necessidade', 'required', 
            array('required' => 'Você deve preencher o campo %s'));
        $this->form_validation->set_rules('QuantPedida', 'Quantidade Pedida', 'required|max_length[60]|callback_more_zero', 
            array('required' => 'Você deve preencher o campo %s'));
        $this->form_validation->set_rules('ValorUnitario', 'Valor Unitário', 'required',
            array('required' => 'Você deve preencher o campo %s'));

        if($this->form_validation->run() == false){

            $this->session->set_flashdata('erro', validation_errors());
            redirect(base_url("compras/pedido-compra/editar-pedido-compra/{$numPedidoCompra}"), "home", "refresh");  
            
        }else {

            $produto = $this->produto->getProdutoPorCodigo($this->input->post('CodProduto'));

            $dados = [
                'id_empresa' => getDadosUsuarioLogado()['id_empresa'],
                'cod_produto'  => $produto->cod_produto,
                'data_necessidade' => date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataNecessidade')))),
                'quant_pedida' => str_replace(",",".",(str_replace(".","",$this->input->post('QuantPedida')))),
                'observacoes' => $this->input->post('ObsOrdemCompra'),
                'valor_unitario' => $produto->custo_medio,
                'usuario' => getDadosUsuarioLogado()['email'],
            ];
            $numOrdemCompra = $this->compra->insertOrdemCompra($dados);

            $data = [
                'num_ordem_compra' => $numOrdemCompra, 
                'cod_fornecedor' => $codFornecedor,               
                'dias_entrega' => $this->input->post('DiasEntrega'),  
                'condicao_pagamento' => $this->input->post('CondicaoPag'),
                'valor_unitario' => str_replace(",",".",(str_replace(".","",$this->input->post('ValorUnitario')))),
            ];
            $this->compra->insertCotacaoOrdem($data);

            $this->session->set_flashdata('sucesso', 'Ordem de compra cadastrada com sucesso');
            redirect(base_url("compras/ordem-compra/nova-cotacao-fornecedor/{$codFornecedor}"), "home", "refresh");           
        }        
    }

    public function inserirOrdemCompra(){  

        //Validações dos campo e array das mensagens apresentadas
        $this->form_validation->set_rules('CodProduto', 'Produto de Compra', 'required',
            array('required' => 'Você deve preencher o campo %s'));
        $this->form_validation->set_rules('DataNecessidade', 'Data de Necessidade', 'required', 
            array('required' => 'Você deve preencher o campo %s'));
        $this->form_validation->set_rules('QuantPedida', 'Quantidade Pedida', 'required|max_length[60]|callback_more_zero', 
            array('required' => 'Você deve preencher o campo %s'));

        if($this->form_validation->run() == false){

            $this->session->set_flashdata('erro', validation_errors());
            $this->formOrdemCompra();
            
        }else {

            $dados = [
                'id_empresa' => getDadosUsuarioLogado()['id_empresa'],
                'cod_produto'  => $this->input->post('CodProduto'),
                'data_necessidade' => date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataNecessidade')))),
                'quant_pedida' => str_replace(",",".",(str_replace(".","",$this->input->post('QuantPedida')))),
                'observacoes' => $this->input->post('ObsOrdemCompra'),
                'usuario' => getDadosUsuarioLogado()['email'],
            ];

            $numOrdemCompra = $this->compra->insertOrdemCompra($dados);

            $this->session->set_flashdata('sucesso', 'Ordem de compra cadastrada com sucesso');
            redirect(base_url("compras/ordem-compra/editar-ordem-compra/{$numOrdemCompra}"));           
        }        
    }
    
    public function novaOrdemPedido($numPedidoCompra){  

        //Validações dos campo e array das mensagens apresentadas
        $this->form_validation->set_rules('CodProduto', 'Produto de Compra', 'required',
            array('required' => 'Você deve preencher o campo %s'));
        $this->form_validation->set_rules('DataNecessidade', 'Data de Necessidade', 'required', 
            array('required' => 'Você deve preencher o campo %s'));
        $this->form_validation->set_rules('QuantPedida', 'Quantidade Pedida', 'required|max_length[60]|callback_more_zero', 
            array('required' => 'Você deve preencher o campo %s'));
        $this->form_validation->set_rules('ValorUnitario', 'Valor Unitário', 'required',
            array('required' => 'Você deve preencher o campo %s'));

        if($this->form_validation->run() == false){

            $this->session->set_flashdata('erro', validation_errors());
            redirect(base_url("compras/pedido-compra/editar-pedido-compra/{$numPedidoCompra}"), "home", "refresh");  
            
        }else {

            $dados = [
                'id_empresa' => getDadosUsuarioLogado()['id_empresa'],
                'num_pedido_compra' => $numPedidoCompra,
                'cod_produto'  => $this->input->post('CodProduto'),
                'data_necessidade' => date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataNecessidade')))),
                'quant_pedida' => str_replace(",",".",(str_replace(".","",$this->input->post('QuantPedida')))),
                'observacoes' => $this->input->post('ObsOrdemCompra'),
                'valor_unitario' => str_replace(",",".",(str_replace(".","",$this->input->post('ValorUnitario')))),
                'usuario' => getDadosUsuarioLogado()['email'],
            ];

            $this->compra->insertOrdemCompra($dados);

            $this->session->set_flashdata('sucesso', 'Ordem de compra cadastrada com sucesso');
            redirect(base_url("compras/pedido-compra/editar-pedido-compra/{$numPedidoCompra}"), "home", "refresh");           
        }        
    }

    public function inserirPedidoCompra(){  

        //Validações dos campos
        $this->form_validation->set_rules('CodFornecedor', 'Fornecedor', 'required',
            array('required' => 'Você deve preencher o campo %s'));
        $this->form_validation->set_rules('DataEmissao', 'Data de Emissão', 'required|callback_date_check',
            array('required' => 'Você deve preencher o campo %s'));
        $this->form_validation->set_rules('DataEntrega', 'Data de Entrega', 'required',
            array('required' => 'Você deve preencher o campo %s'));

        if($this->form_validation->run() == false){

            $this->session->set_flashdata('erro', validation_errors());
            $this->formPedidoCompra();
            
        }else {

            $dados = [
                'id_empresa' => getDadosUsuarioLogado()['id_empresa'],
                'cod_fornecedor'  => $this->input->post('CodFornecedor'),
                'data_emissao' => date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataEmissao')))),
                'data_entrega' => date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataEntrega')))),
                'observacoes' => $this->input->post('ObsPedidoCompra'),
                'tipo_desconto' => $this->input->post('TipoDesconto'),
                'tipo_frete' => $this->input->post('TipoFrete'),
                'valor_frete' => str_replace(",",".",(str_replace(".","",$this->input->post('Frete')))), 
                'valor_desconto' => str_replace(",",".",(str_replace(".","",$this->input->post('Desconto')))), 
                'valor_seguro' => str_replace(",",".",(str_replace(".","",$this->input->post('Seguro')))),
                'outras_despesas' => str_replace(",",".",(str_replace(".","",$this->input->post('OutrasDespesas')))),
                'usuario' => getDadosUsuarioLogado()['email'],
            ];

            $numPedidoCompra = $this->compra->insertPedidoCompra($dados);

            $this->session->set_flashdata('sucesso', 'Pedido de compra cadastrado com sucesso');
            redirect(base_url("compras/pedido-compra/editar-pedido-compra/{$numPedidoCompra}"), "home", "refresh");
                       
        }        
    }

    public function gerarPedidoCompra(){  

        //Validações dos campos
        $this->form_validation->set_rules('CodFornecedor', 'Fornecedor', 'required',
            array('required' => 'Você deve preencher o campo %s'));
        $this->form_validation->set_rules('DataEmissao', 'Data de Emissão', 'required|callback_date_check',
            array('required' => 'Você deve preencher o campo %s'));
        $this->form_validation->set_rules('DataEntrega', 'Data de Entrega', 'required',
            array('required' => 'Você deve preencher o campo %s'));

        if($this->form_validation->run() == false){

            $this->session->set_flashdata('erro', validation_errors());
            redirect(base_url('compras/ordem-compra'));
            
        }else {

            $dados = [
                'id_empresa' => getDadosUsuarioLogado()['id_empresa'],
                'cod_fornecedor' => $this->input->post('CodFornecedor'),
                'data_emissao' => date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataEmissao')))),
                'data_entrega' => date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataEntrega')))),                
                'observacoes' => $this->input->post('ObsPedidoCompra'),
                'usuario' => getDadosUsuarioLogado()['email'],
            ];            

            $numPedidoCompra = $this->compra->insertPedidoCompra($dados);
            $numOrdemCompra = explode(",", $this->input->post("selecionado"));
            
            foreach($numOrdemCompra as $ordem){

                $ordem_compra = $this->compra->getOrdemCompraPorCodigo($ordem);
                $produto = $this->produto->getProdutoPorCodigo($ordem_compra->cod_produto);

                $dados = null;
                $dados = [
                    'num_pedido_compra' => $numPedidoCompra,
                    'valor_unitario' => $produto->custo_medio
                ];
    
                $this->compra->updateOrdemCompra($ordem, $dados);

            } 

            $this->session->set_flashdata('sucesso', 'Pedido de compra gerado com sucesso');
            redirect(base_url("compras/pedido-compra/editar-pedido-compra/{$numPedidoCompra}"), "home", "refresh");
                       
        }        
    }

    public function salvarPedidoCompra($numPedidoCompra){

        //Validações dos campo e array das mensagens apresentadas
        $this->form_validation->set_rules('DataEntrega', 'Data de Entrega', 'required',
            array('required' => 'Você deve preencher o campo %s'));        

        if($this->form_validation->run() == false){

            $this->session->set_flashdata('erro', validation_errors());
            $this->editarPedidoCompra($numPedidoCompra);
            
        }else {         

            $data = [
                'data_entrega' => date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataEntrega')))),
                'observacoes' => $this->input->post('ObsPedidoCompra'),
                'tipo_desconto' => $this->input->post('TipoDesconto'),
                'tipo_frete' => $this->input->post('TipoFrete'),
                'valor_frete' => str_replace(",",".",(str_replace(".","",$this->input->post('Frete')))), 
                'valor_desconto' => str_replace(",",".",(str_replace(".","",$this->input->post('Desconto')))), 
                'valor_seguro' => str_replace(",",".",(str_replace(".","",$this->input->post('Seguro')))),
                'outras_despesas' => str_replace(",",".",(str_replace(".","",$this->input->post('OutrasDespesas')))),
            ];

            $this->compra->updatePedidoCompra($numPedidoCompra, $data);

            $this->session->set_flashdata('sucesso', 'Pedido de compra alterado com sucesso');
            redirect(base_url("compras/pedido-compra/editar-pedido-compra/{$numPedidoCompra}"), "home", "refresh");
                       
        }  
    }

    public function inserirOrdemPedido($numPedidoCompra){

        $this->form_validation->set_rules('NumOrdemCompraAdic', 'Ordem de Compra', 'required',
                    array('required' => 'Você deve preencher o campo %s'));
        $this->form_validation->set_rules('QuantPedidaAdic', 'Quantidade Pedida', 'required|callback_more_zero',
                    array('required' => 'Você deve preencher o campo %s'));
        $this->form_validation->set_rules('ValorUnitarioAdic', 'Valor Unitário', 'required',
                    array('required' => 'Você deve preencher o campo %s'));

        if($this->form_validation->run() == false){

            $this->session->set_flashdata('erro', validation_errors());
            redirect(base_url("compras/pedido-compra/editar-pedido-compra/{$numPedidoCompra}"), "home", "refresh");

        }else{

            $numOrdemCompra = $this->input->post('NumOrdemCompraAdic');

            $dados = [
                'num_pedido_compra' => $numPedidoCompra,
                'quant_pedida' => str_replace(",",".",(str_replace(".","",$this->input->post('QuantPedidaAdic')))),
                'valor_unitario' => str_replace(",",".",(str_replace(".","",$this->input->post('ValorUnitarioAdic'))))
            ];

            $this->compra->updateOrdemCompra($numOrdemCompra, $dados);

            $this->session->set_flashdata('sucesso', 'Ordem de compra inserida com sucesso');
            redirect(base_url("compras/pedido-compra/editar-pedido-compra/{$numPedidoCompra}"), "home", "refresh");

        }
    } 

    public function inserirRecebimentoMaterial(){ 

        $numPedidoCompra = $this->uri->segment(4);
        $codFornecedor = $this->uri->segment(5);

        //Validações dos campo e array das mensagens apresentadas
        $this->form_validation->set_rules('DataRecebimento', 'Data de Recebimento', 'required|callback_date_check', 
            array('required' => 'Você deve preencher o campo %s'));        
        
        if($this->form_validation->run() == false){

            $this->session->set_flashdata('erro', validation_errors());
            redirect(base_url("compras/recebimento-material/novo-recebimento-material/{$numPedidoCompra}"), "home", "refresh");
            
        }else {   
            
            $empresa = $this->empresa->getEmpresaPorCodigo(getDadosUsuarioLogado()['id_empresa']);
            $pedido = $this->compra->getPedidoCompraPorCodigo($numPedidoCompra);
            $fornecedor = $this->fornecedor->getFornecedorPorCodigo($codFornecedor);

            // Carrega arrays
            $quantRecebida = $this->input->post('quantRecebida');
            $ValorCompra = $this->input->post('ValorCompra'); 
            $loteProduto = $this->input->post('loteVenda');

            // Validação da quantidade e valor
            $lista_produto_compra = $this->compra->getProdutoPedido($numPedidoCompra);
            /*foreach($lista_produto_compra as $key_produto_compra => $produto) {

                $quan_recebida = floatval(str_replace(",",".",(str_replace(".","",$quantRecebida[$produto->cod_produto]))));
                $valor_compra = floatval(str_replace(",",".",(str_replace(".","",$ValorCompra[$produto->cod_produto]))));

                if($quan_recebida == 0 || $valor_compra == 0){

                    $this->session->set_flashdata('erro', '<br>Quant Recebida e o Valor de Compra devem ser maior que 0<br>');
                    redirect(base_url("compras/recebimento-material/novo-recebimento-material/{$numPedidoCompra}"), "home", "refresh");

                }
            }*/

            $valor_desconto = floatval(str_replace(",",".",(str_replace(".","",$this->input->post('ValorDesconto')))));
            $valor_frete = floatval(str_replace(",",".",(str_replace(".","",$this->input->post('ValorFrete')))));
            $valor_seguro = floatval(str_replace(",",".",(str_replace(".","",$this->input->post('Seguro')))));
            $outras_despesas = floatval(str_replace(",",".",(str_replace(".","",$this->input->post('OutrasDespesas')))));

            $valoresAdicionais = $valor_frete + $valor_seguro + $outras_despesas;

            // Cria registro de recebimento
            $data = [
                'num_pedido_compra'  => $numPedidoCompra,
                'data_recebimento' => date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataRecebimento')))),
                'serie' => $this->input->post('Serie'),
                'nota_fiscal' => $this->input->post('NotaFiscal'),
                'observacoes' => $this->input->post('ObservReceb'),
                'valor_desconto' => str_replace(",",".",(str_replace(".","",$this->input->post('ValorDesconto')))),
                'tipo_frete' => $pedido->tipo_frete,
                'valor_frete' => str_replace(",",".",(str_replace(".","",$this->input->post('ValorFrete')))),
                'valor_seguro' => str_replace(",",".",(str_replace(".","",$this->input->post('Seguro')))),
                'outras_despesas' => str_replace(",",".",(str_replace(".","",$this->input->post('OutrasDespesas')))),
                'usuario' => getDadosUsuarioLogado()['email'],
            ];
            $codRecebimentoMaterial = $this->compra->insertRecebimentoMaterial($data);  

            //Pega valor total da venda
            $valor_compra_total = 0;
            foreach($lista_produto_compra as $key_produto_compra => $produto) { 

                $valor_compra = floatval(str_replace(",",".",(str_replace(".","",$ValorCompra[$produto->cod_produto]))));  
                $valor_compra_total = $valor_compra_total + $valor_compra;
                    
            }

            // Movimenta produtos            
            foreach($lista_produto_compra as $key_produto_compra => $produto) { 
                
                $quan_recebida = floatval(str_replace(",",".",(str_replace(".","",$quantRecebida[$produto->cod_produto]))));
                $valor_compra = floatval(str_replace(",",".",(str_replace(".","",$ValorCompra[$produto->cod_produto])))); 
                
                $loteCompra = null;
                if(@$loteProduto[$produto->cod_produto] != null)
                    $loteCompra = $loteProduto[$produto->cod_produto];
                

                if($quan_recebida == 0){
                    continue;
                }

                // Consiidera desconto no cálculo do custo do produto
                if($valor_desconto > 0)
                    $valorMovimento =  $valor_compra - ($valor_desconto * ($valor_compra / $valor_compra_total));
                else
                    $valorMovimento =  $valor_compra; 

                // Considera frete, seguro, outras despesas e no cálculo do custo do prouto
                if($valoresAdicionais > 0)
                    $valorMovimento =  $valorMovimento + ($valoresAdicionais * ($valor_compra / $valor_compra_total));   
                    
                
                if($produto->tipo_controle != 3){
                    //Atualiza Custo Médio produto
                    $custoMedio = $this->estoque->getCustoMedio($produto->cod_produto);
                    if($custoMedio != null && $custoMedio->total_valor != 0 && $custoMedio->total_valor != null){
    
                        $dadosProd = null;
                        $dadosProd = [
                            'custo_medio' => ($custoMedio->total_valor + $valorMovimento) / ($custoMedio->total_movimentado + $quan_recebida)
                        ];
                
                        $this->produto->updateProduto($produto->cod_produto, $dadosProd);
                    }else{
    
                        $dadosProd = null;
                        $dadosProd = [
                            'custo_medio' => $valorMovimento / $quan_recebida
                        ];            
                        $this->produto->updateProduto($produto->cod_produto, $dadosProd);
        
                    }
                }
                
                if($produto->tipo_controle != 3){

                    // Movimenta estoque
                    $dadosEstoque = null;
                    $dadosEstoque = [
                        'id_empresa' => getDadosUsuarioLogado()['id_empresa'],
                        'data_movimento' => date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataRecebimento')))),
                        'cod_produto' => $produto->cod_produto,
                        'cod_lote' => $loteCompra,
                        'origem_movimento' => 2,
                        'id_origem' => $codRecebimentoMaterial,
                        'tipo_movimento' => 1,
                        'especie_movimento' => 4,
                        'quant_movimentada' => $quan_recebida,
                        'custo_mat' => $valorMovimento,
                        'valor_movimento' => $valorMovimento,
                        'usuario' => getDadosUsuarioLogado()['email'],
                    ];
                    $erro = $this->estoque->insertMovimentoEstoque($dadosEstoque);  
                }
                
                if ($quan_recebida <= 0) {
                    continue;
                }
                $itensRecebidos = [
                    'cod_recebimento_material' => $codRecebimentoMaterial,
                    'cod_produto' => $produto->cod_produto,
                    'cod_lote' => $loteCompra,
                    'quantidade' => $quan_recebida,
                    'valor_unitario' => $produto->valor_unitario
                ];
                $this->compra->inserirProdutoRecebimento($itensRecebidos);

                //Atualiza saldo da ordem de compra
                $saldoProduto = $quan_recebida;
                $lista_ordem_produto = $this->compra->getOrdemPorProdutoPedido($produto->cod_produto, $numPedidoCompra, "asc");
                $last_key = @end(array_keys($lista_ordem_produto));                
                foreach($lista_ordem_produto as $key_ordem_produto => $ordem) {

                    if($saldoProduto > 0){

                        if(($ordem->quant_pedida - $ordem->quant_atendida) > 0 && $last_key != $key_ordem_produto){

                            $saldoOrdem = $ordem->quant_pedida - $ordem->quant_atendida;

                            if($saldoOrdem >= $saldoProduto){
                                $quantMov = $saldoProduto;
                            }else{
                                $quantMov = $saldoOrdem;
                            }

                            if($ordem->quant_atendida > 0){

                                if(($quantMov + $ordem->quant_atendida) >= $ordem->quant_pedida) {
                                    $status = 3;
                                }else{
                                    $status = 2;
                                }            
                            }else{

                                if($quantMov >= $ordem->quant_pedida) {
                                    $status = 3;
                                }else{
                                    $status = 2;
                                } 
                            }

                            $dados = null;             
                            $dados = [
                                'quant_atendida' => $ordem->quant_atendida + $quantMov,
                                'status' => $status
                            ];
            
                            $this->compra->updateOrdemCompra($ordem->num_ordem_compra, $dados);

                            $saldoProduto = $saldoProduto - $quantMov;

                        }elseif($last_key == $key_ordem_produto){

                            $quantMov = $saldoProduto;

                            if($ordem->quant_atendida > 0){

                                if(($quantMov + $ordem->quant_atendida) >= $ordem->quant_pedida) {
                                    $status = 3;
                                }else{
                                    $status = 2;
                                }            
                            }else{

                                if($quantMov >= $ordem->quant_pedida) {

                                    $status = 3;
                                }else{
                                    $status = 2;
                                } 
                            } 
                            
                            $dados = null;            
                            $dados = [
                                'quant_atendida' => $ordem->quant_atendida + $quantMov,
                                'status' => $status
                            ];
            
                            $this->compra->updateOrdemCompra($ordem->num_ordem_compra, $dados);

                        }
                    }
                    
                }                  
                               
            }  
            
            // Atualiza valor total recebimento
            $dados = null;                
            $dados = [
                'valor_bruto' => $valor_compra_total
            ];    
            $this->compra->updateRecebimento($codRecebimentoMaterial, $dados);

            // Criação de título
            $numParcela = $this->input->post('Parcelas');
            $dataVencimento = $this->input->post('DataVencimento');
            $valorParcela = $this->input->post('ValorParcela'); 
            $metodoPagamento = $this->input->post('CodMetodoPagamento');                         

            for ($i = 1; $i <= $numParcela; $i++) {    
                
                if($valorParcela[$i] == 0){
                    continue;
                } 

                $codConta = $empresa->conta_padrao;
                $pagamento = null;

                if($metodoPagamento[$i] != null) {
                    $pagamento = $this->financeiro->getMetodoPagamentoPorCodigo($metodoPagamento[$i]);
                    if($pagamento->cod_conta != null && $pagamento->cod_conta != 0){

                        $codConta = $pagamento->cod_conta;

                    }
                }
                
                $dadosMovimento = null;
                $dadosMovimento = [
                    'cod_conta' => $codConta,
                    'cod_metodo_pagamento' => $metodoPagamento[$i],
                    'cod_centro_custo' => $this->input->post('CodCentroCusto'),
                    'cod_conta_contabil' => $this->input->post('CodContaContabil'),
                    'cod_emitente' => $codFornecedor,
                    'tipo_movimento' => 2,
                    'data_competencia' => date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataRecebimento')))),
                    'data_vencimento' => date("Y-m-d", strtotime(str_replace('/', '-', $dataVencimento[$i]))),
                    'parcela' => $i . '/' . $numParcela,
                    'desc_movimento' => "Pedido de Compra: " . $numPedidoCompra . ", " . "Recebimento: " . $codRecebimentoMaterial,
                    'valor_titulo' => floatval(str_replace(",",".",(str_replace(".","",$valorParcela[$i])))),
                    'origem_movimento' => 2,
                    'id_origem' => $codRecebimentoMaterial,
                    'confirmado' => 0,
                    'usuario_criacao' => getDadosUsuarioLogado()['email'],
                ];

                $this->financeiro->insertMovimentoConta($dadosMovimento);
            }            
        } 
        
        $this->session->set_flashdata('sucesso', 'Recebimento realizado com sucesso');
        redirect(base_url("compras/recebimento-material/novo-recebimento-material/{$numPedidoCompra}"), "home", "refresh");
    }  

    public function salvarOrdemCompra(){

        $numOrdemCompra = $this->uri->segment(4);
        $URLOrigem = $this->uri->segment(5);

        $this->form_validation->set_rules('DataNecessidade', 'Data de Necessidade', 'required|max_length[60]', 
            array('required' => 'Você deve preencher o campo %s'));
        $this->form_validation->set_rules('QuantPedida', 'Quantidade Pedida', 'required|max_length[60]|callback_more_zero', 
            array('required' => 'Você deve preencher o campo %s'));

        if($this->form_validation->run() == false){

            $this->session->set_flashdata('erro', validation_errors());
            $this->editarOrdemCompra($numOrdemCompra);
            
        }else {

            $quantPedida = str_replace(",",".",$this->input->post('QuantPedida'));
            $quantAtendida = str_replace(",",".",$this->input->post('QuantAtendida'));

            // Ajusta Status da ordem
            if($quantAtendida != 0){
                if($quantPedida <= $quantAtendida){
                    $status = 3;
                }elseif($quantPedida > $quantAtendida){
                    $status = 2;
                }
            }
            else{
                $status = 1;
            }

            $dados = [
                'data_necessidade' => date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataNecessidade')))),
                'quant_pedida' => $quantPedida,
                'observacoes' => $this->input->post('ObsOrdemCompra'),
                'status' => $status
            ];

            $this->compra->updateOrdemCompra($numOrdemCompra, $dados);

            $this->session->set_flashdata('sucesso', 'Ordem de compra alterada com sucesso');

            if($URLOrigem == 1){
                redirect(base_url('compras/ordem-compra'));   
            }else{
                redirect(base_url("compras/ordem-compra/editar-ordem-compra/{$numOrdemCompra}"));   
            }        
        }
    }

    public function salvarOrdemPedido(){
        $numOrdemCompra = $this->uri->segment(4);

        //Validações dos campo e array das mensagens apresentadas
        $this->form_validation->set_rules('QuantPedidaEdit', 'Quantidade Pedida', 'required|callback_more_zero',
            array('required' => 'Você deve preencher o campo %s'));
        $this->form_validation->set_rules('ValorUnitarioEdit', 'Valor Unitário', 'required',
            array('required' => 'Você deve preencher o campo %s'));

        if($this->form_validation->run() == false){

            $this->session->set_flashdata('erro', validation_errors());
            $this->editarPedidoCompra($numOrdemCompra);
            
        }else {

            $ordem = $this->compra->getOrdemCompraPorCodigo($numOrdemCompra);
            $quantPedida = str_replace(",",".",(str_replace(".","",$this->input->post('QuantPedidaEdit'))));

            // Ajusta Status da ordem
            if($ordem->quant_atendida > 0){
                if($quantPedida <= $ordem->quant_atendida){
                    $status = 3;
                }elseif($quantPedida > $ordem->quant_atendida){
                    $status = 2;
                }
            }
            else{
                $status = 1;
            }

            $data = [
                'quant_pedida' => str_replace(",",".",(str_replace(".","",$this->input->post('QuantPedidaEdit')))), 
                'valor_unitario' => str_replace(",",".",(str_replace(".","",$this->input->post('ValorUnitarioEdit')))),               
                'status' => $status
            ];

            $this->compra->updateOrdemCompra($numOrdemCompra, $data);

            $this->session->set_flashdata('sucesso', 'Ordem de compra alterada com sucesso');
            redirect(base_url("compras/pedido-compra/editar-pedido-compra/{$ordem->num_pedido_compra}"));
                       
        }  
    }

    public function inserirCotacao($numOrdemCompra){

        //Validações dos campo e array das mensagens apresentadas
        $this->form_validation->set_rules('CodFornecedor', 'Fornecedor', 'required',
            array('required' => 'Você deve preencher o campo %s'));
        $this->form_validation->set_rules('ValorUnitario', 'Valor Unitário', 'required|callback_more_zero',
            array('required' => 'Você deve preencher o campo %s'));
            
        if($this->form_validation->run() == false){

            $this->session->set_flashdata('erro', validation_errors());
            $this->editarOrdemCompra($numOrdemCompra);
            
        }else{

            $data = [
                'num_ordem_compra' => $numOrdemCompra, 
                'cod_fornecedor' => $this->input->post('CodFornecedor'),               
                'dias_entrega' => $this->input->post('DiasEntrega'),  
                'condicao_pagamento' => $this->input->post('CondicaoPag'),
                'valor_unitario' => str_replace(",",".",(str_replace(".","",$this->input->post('ValorUnitario')))),
            ];
            $this->compra->insertCotacaoOrdem($data);
        }

        $this->session->set_flashdata('sucesso', 'Cotação inserida com sucesso');
        redirect(base_url("compras/ordem-compra/editar-ordem-compra/{$numOrdemCompra}"), "home", "refresh");

    }

    public function inserirCotacaoFornecedor($codFornecedor){

        //Validações dos campo e array das mensagens apresentadas
        $this->form_validation->set_rules('NumOrdemCompraAdic', 'Ordem de Compra', 'required',
            array('required' => 'Você deve preencher o campo %s'));
        $this->form_validation->set_rules('ValorUnitarioAdic', 'Valor Unitário', 'required|callback_more_zero',
            array('required' => 'Você deve preencher o campo %s'));
            
        if($this->form_validation->run() == false){

            $this->session->set_flashdata('erro', validation_errors());
            redirect(base_url("compras/ordem-compra/nova-cotacao-fornecedor/{$codFornecedor}"), "home", "refresh");
            
        }else{

            $data = [
                'num_ordem_compra' => $this->input->post('NumOrdemCompraAdic'),
                'cod_fornecedor' => $codFornecedor,               
                'dias_entrega' => $this->input->post('DiasEntrega'),  
                'condicao_pagamento' => $this->input->post('CondicaoPag'),
                'valor_unitario' => str_replace(",",".",(str_replace(".","",$this->input->post('ValorUnitarioAdic')))),
            ];
            $this->compra->insertCotacaoOrdem($data);
        }

        $this->session->set_flashdata('sucesso', 'Cotação inserida com sucesso');
        redirect(base_url("compras/ordem-compra/nova-cotacao-fornecedor/{$codFornecedor}"), "home", "refresh");

    }

    public function salvarCotacaoCompra(){

        $seqCotacao = $this->uri->segment(4);
        $origem = $this->uri->segment(5);

        //Validações dos campo e array das mensagens apresentadas
        $this->form_validation->set_rules('ValorUnitarioEdit', 'Valor Unitário', 'required|callback_more_zero',
            array('required' => 'Você deve preencher o campo %s'));

        $cotacao = $this->compra->getCotacaoPorCodigo($seqCotacao);
            
        if($this->form_validation->run() == false){

            $this->session->set_flashdata('erro', validation_errors());
            $this->editarOrdemCompra($cotacao->num_ordem_compra);
            
        }else{

            $data = [
                'dias_entrega' => $this->input->post('DiasEntregaEdit'),  
                'condicao_pagamento' => $this->input->post('CondicaoPag'),
                'valor_unitario' => str_replace(",",".",(str_replace(".","",$this->input->post('ValorUnitarioEdit')))),
            ];
            $this->compra->updateCotacaoOrdem($seqCotacao, $data);
        }

        $this->session->set_flashdata('sucesso', 'Cotação alterada com sucesso');
        if($origem == 1)
            redirect(base_url("compras/ordem-compra/editar-ordem-compra/{$cotacao->num_ordem_compra}"), "home", "refresh");
        elseif($origem == 2)
            redirect(base_url("compras/ordem-compra/nova-cotacao-fornecedor/{$cotacao->cod_fornecedor}"), "home", "refresh");

    }

    public function redirecionaCompras(){

        $mes = date('m');
        $ano = date('Y');

        redirect(base_url("compras/{$mes}/{$ano}"), "home", "refresh");

    }

    public function compras(){

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

        $dados = array(
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
            'menu' => 'Compras'
        );

        $this->load->view('compras/compras', $dados);


    }
    
    public function excluirOrdemCompra(){

        $numOrdemCompra = $this->input->post("selecionar_todos");

        $this->compra->deleteOrdemCompra($numOrdemCompra);
        $this->session->set_flashdata('sucesso', 'Registro(s) selecionado(s) excluído(s)');
        redirect(base_url('compras/ordem-compra'));
        
    }

    public function excluirCotacaoOrdem($numOrdemCompra){

        $seqCotacao = $this->input->post("excluir_todos");

        $this->compra->deleteCotacaoOrdem($seqCotacao);
        $this->session->set_flashdata('sucesso', 'Registro(s) selecionado(s) excluído(s)');
        redirect(base_url("compras/ordem-compra/editar-ordem-compra/{$numOrdemCompra}"));  
        
    }

    public function acaoCotacaoFornecedor($codFornecedor){

        $seqCotacao = $this->input->post("seleconar_todos");
        $acao = $this->input->post("action");

        if($acao == 1){

            $dados = [
                'id_empresa' => getDadosUsuarioLogado()['id_empresa'],
                'cod_fornecedor'  => $codFornecedor,
                'data_emissao' => date("Y-m-d"),
                'data_entrega' => date("Y-m-d"),
                'usuario' => getDadosUsuarioLogado()['email'],
            ];
            $numPedidoCompra = $this->compra->insertPedidoCompra($dados);

            foreach ($seqCotacao as $cotacoes) {
                
                $cotacao = $this->compra->getCotacaoPorCodigo($cotacoes);

                $dados = null;
                $dados = [
                    'num_pedido_compra' => $numPedidoCompra,
                    'valor_unitario' => $cotacao->valor_unitario
                ];    
                $this->compra->updateOrdemCompra($cotacao->num_ordem_compra, $dados);
                

            }

            $this->session->set_flashdata('sucesso', 'Pedido emitido com sucesso');
            redirect(base_url("compras/pedido-compra/editar-pedido-compra/{$numPedidoCompra}"));

        }elseif($acao == 2){
            $this->compra->deleteCotacaoOrdem($seqCotacao);
            $this->session->set_flashdata('sucesso', 'Registro(s) selecionado(s) excluído(s)');

            redirect(base_url("compras/ordem-compra/nova-cotacao-fornecedor/{$codFornecedor}"));
        } 
    }

    public function excluirPedidoCompra(){

        $numPedidoCompra = $this->input->post("excluir_todos");

        $this->compra->deletePedidoCompra($numPedidoCompra);
        $this->session->set_flashdata('sucesso', 'Registro(s) selecionado(s) excluído(s)');
        redirect(base_url('compras/pedido-compra'));
        
    }

    public function excluirOrdemPedido($numPedidoCompra){

        $numOrdemCompra = $this->input->post("excluir_todos");

        $data = [
            'num_pedido_compra' => null,
            'valor_unitario' => 0
        ];

        $this->compra->updateOrdemCompraArray($numOrdemCompra, $data);

        $this->session->set_flashdata('sucesso', 'Registro(s) selecionado(s) excluído(s)');
        redirect(base_url("compras/pedido-compra/editar-pedido-compra/{$numPedidoCompra}"));
    }

    public function estornarRecebimentoMaterial($numPedidoCompra){     

        $codRecebimento = $this->input->post("estornar_todos");
            
        foreach($codRecebimento as $recebimento){  
                
            $recebimentoMaterial = $this->compra->getRecebimentoPorCodigo($recebimento);
            $movimentosRecebimento = $this->compra->getMovimentoPorRecebimento($recebimento);

            // Valida saldo dos produtos para saída de estoque
            foreach($movimentosRecebimento as $key_movimentos => $movimentos_estoque){

                $produto = $this->produto->getProdutoPorCodigo($movimentos_estoque->cod_produto);
                if($produto->saldo_negativo != 1 && $produto->quant_estoq < $movimentos_estoque->quant_movimentada){
                    $this->session->set_flashdata('erro', 'Produto (' . $produto->cod_produto . ' - ' . $produto->nome_produto . ') sem saldo suficiente para estorno');
                    redirect(base_url("compras/recebimento-material/novo-recebimento-material/{$numPedidoCompra}"), "home", "refresh");  
                }

            }

            foreach($movimentosRecebimento as $key_movimentos => $movimentos_estoque){

                //Atualiza Custo Médio produto
                $custoMedio = $this->estoque->getCustoMedio($movimentos_estoque->cod_produto);
                if($custoMedio != null && $custoMedio->total_valor != 0){

                    $valCusto = ($custoMedio->total_valor - $movimentos_estoque->valor_movimento) / ($custoMedio->total_movimentado - $movimentos_estoque->quant_movimentada);

                    if($valCusto != 0 && $valCusto != null){
                        $dadosProd = null;
                        $dadosProd = [
                            'custo_medio' => ($custoMedio->total_valor - $movimentos_estoque->valor_movimento) / ($custoMedio->total_movimentado - $movimentos_estoque->quant_movimentada)
                        ]; 
                    }else{
                        $dadosProd = null;
                        $dadosProd = [
                            'custo_medio' => 0.01
                        ]; 
                    }   
                    $this->produto->updateProduto($movimentos_estoque->cod_produto, $dadosProd);
                }

                // Estorna estoque do produto comprado
                $dados = null; 
                $dados = [
                    'id_empresa' => getDadosUsuarioLogado()['id_empresa'],
                    'data_movimento' => $movimentos_estoque->data_movimento,
                    'cod_produto' => $movimentos_estoque->cod_produto,
                    'cod_lote' => $movimentos_estoque->cod_lote,
                    'origem_movimento' => 2,
                    'id_origem' => $recebimento,
                    'tipo_movimento' => 2,
                    'especie_movimento' => 8,
                    'quant_movimentada' => $movimentos_estoque->quant_movimentada,
                    'valor_movimento' => $movimentos_estoque->valor_movimento,
                    'usuario' => getDadosUsuarioLogado()['email'],
                ];

                $this->estoque->insertMovimentoEstoque($dados);
                    
                // Atualiza movimento de estoque
                $dados = null;                
                $dados = [
                    'considera_calc_custo' => '1'
                ];
        
                $this->estoque->updateMovimentoEstoque($movimentos_estoque->cod_movimento_estoque, $dados);                

                $saldoProduto = $movimentos_estoque->quant_movimentada;                

                //Atualiza saldo da ordem de compra                
                $lista_ordem_produto = $this->compra->getOrdemPorProdutoPedido($movimentos_estoque->cod_produto, $numPedidoCompra, "desc");
                $last_key = @end(array_keys($lista_ordem_produto)); 
                foreach($lista_ordem_produto as $key_ordem_produto => $ordem) {

                    if($saldoProduto > 0){

                        if($ordem->quant_atendida > 0 && $last_key != $key_ordem_produto){

                            $saldoOrdem = $ordem->quant_atendida;

                            if($saldoOrdem >= $saldoProduto){
                                $quantMov = $saldoProduto;
                            }else{
                                $quantMov = $saldoOrdem;
                            }

                            if(($ordem->quant_atendida - $quantMov) >= $ordem->quant_pedida) {
                                $status = 3;
                            }elseif(($ordem->quant_atendida - $quantMov) == 0){
                                $status = 1;
                            }else{
                                $status = 2;
                            }

                            $dados = null;             
                            $dados = [
                                'quant_atendida' => $ordem->quant_atendida - $quantMov,
                                'status' => $status
                            ];
            
                            $this->compra->updateOrdemCompra($ordem->num_ordem_compra, $dados);

                            $saldoProduto = $saldoProduto - $quantMov;

                        }elseif($last_key == $key_ordem_produto){

                            $quantMov = $saldoProduto;

                            if(($ordem->quant_atendida - $quantMov) >= $ordem->quant_pedida) {
                                $status = 3;
                            }elseif(($ordem->quant_atendida - $quantMov) == 0){
                                $status = 1;
                            }else{
                                $status = 2;
                            }

                            $dados = null;            
                            $dados = [
                                'quant_atendida' => $ordem->quant_atendida - $quantMov,
                                'status' => $status
                            ];
            
                            $this->compra->updateOrdemCompra($ordem->num_ordem_compra, $dados);

                        }
                    }
                }

                // Atualiza recebimento
                $dados = null;                
                $dados = [
                    'estornado' => '1'
                ];
        
                $this->compra->updateRecebimento($recebimento, $dados);

            } 

            //Exclui títulos não confirmados
            $this->financeiro->excluirTituloOrigem(2, $recebimento);
                
        }        
            
        $this->session->set_flashdata('sucesso', 'Registro(s) selecionado(s) estornado(s) com sucesso');

        redirect(base_url("compras/recebimento-material/novo-recebimento-material/{$numPedidoCompra}"), "home", "refresh");    

    }

    public function redirecionaOrdemCompra(){

        $mes = date('m');
        $ano = date('Y');

        redirect(base_url("compras/ordem-compra/{$mes}/{$ano}"), "home", "refresh");

    } 

    public function listarOrdem(){   
        
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
        $filter = ($this->input->get('buscar')) ? $this->input->get('buscar') : "";    
        $listaOrdem = $this->compra->getOrdem($dataInicio, $dataFim, $filter);
        $statusOrdem = $this->compra->getStatusOrdens($dataInicio, $dataFim);
        $listaCotacaoFornecedor = $this->compra->getOrdensFornecedor($dataInicio, $dataFim);
        $listaFornecedor = $this->fornecedor->getFornecedorCotacao();

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
            'status_ordem' => $statusOrdem,
            'lista_ordem' => $listaOrdem,
            'lista_fornecedor_cot' => $listaCotacaoFornecedor,
            'lista_fornecedor' => $listaFornecedor,
            'menu' => 'Compras'
        );

        $this->load->view('compras/ordem-compra', $dados);
    }

    public function redirecionaPedidoCompra(){

        $mes = date('m');
        $ano = date('Y');

        redirect(base_url("compras/pedido-compra/{$mes}/{$ano}"), "home", "refresh");

    }    

    public function listarPedidoCompra(){   
        
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
        $listaPedido = $this->compra->getPedido($dataInicio, $dataFim, $filter);
        $totalPedido = $this->compra->getTotaisPedido($dataInicio, $dataFim);

        $dados = array(
            'descMes' => $descMes,
            'mes' => $mes,
            'ano' => $ano,
            'filter' => $filter,
            'mes_anterior' => $mesAnterior,
            'ano_anterior' => $anoAnterior,
            'mes_seguinte' => $mesSeguinte,
            'ano_seguinte' => $anoSeguinte,
            'lista_pedido' => $listaPedido,
            'totais_pedido' => $totalPedido,
            'menu' => 'Compras'
        );

        $this->load->view('compras/pedido-compra', $dados);
    }

    public function redirecionaRecebimentoMaterial(){

        $mes = date('m');
        $ano = date('Y');

        redirect(base_url("compras/recebimento-material/{$mes}/{$ano}"), "home", "refresh");

    }

    public function listarRecebimentoMaterial(){   

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

        $listaPedido = $this->compra->getPedidoRecebimento($dataInicio, $dataFim, $filter);
        $totalPedido = $this->compra->getTotaisPedido($dataInicio, $dataFim);


        $dados = array(
            'descMes' => $descMes,
            'mes' => $mes,
            'ano' => $ano,
            'filter' => $filter,
            'mes_anterior' => $mesAnterior,
            'ano_anterior' => $anoAnterior,
            'mes_seguinte' => $mesSeguinte,
            'ano_seguinte' => $anoSeguinte,
            'lista_pedido' => $listaPedido,
            'totais_pedido' => $totalPedido,
            'menu' => 'Compras'
        );

        $this->load->view('compras/recebimento-material', $dados);
    }

    //Relatórios
    public function compraProduto(){
        
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

        $listaPrudutoComp = $this->produto->getProdutoComprado();        
        $totalCompra = $this->compra->getTotalCompra($dataInicio, $dataFim, $codProdutos);
        $listaCompraResumida = $this->compra->compraResumida($dataInicio, $dataFim, $codProdutos);
        $listaCompraDetalhada = $this->compra->compraDetalhada($dataInicio, $dataFim, $codProdutos);
        $listaEmpresa = $this->empresa->getEmpresaPorCodigo(getDadosUsuarioLogado()['id_empresa']);

        $dados = array(
            'dataInicio' => $dataInicio,
            'dataFim' => $dataFim,
            'cod_produto' => $codProdutos,
            'lista_produto_comp' => $listaPrudutoComp,
            'total_compra' => $totalCompra,
            'lista_compra_resumida' => $listaCompraResumida,
            'lista_compra_detalhada' => $listaCompraDetalhada,
            'empresa' => $listaEmpresa,
            'menu' => 'Compras'
            
        );

        $this->load->view('compras/compra-produto', $dados);

    }

    public function compraFornecedor(){

        $dataInicio = "";
        $dataFim = "";

        if($this->input->get('DataInicio') != "" && $this->input->get('DataFim') != ""){
            $dataInicio = date("Y-m-d", strtotime(str_replace('/', '-', $this->input->get('DataInicio'))));
            $dataFim = date("Y-m-d", strtotime(str_replace('/', '-', $this->input->get('DataFim'))));
        }
        $codFornecedores = $this->input->get('fornecedor');
        
        if($dataInicio == ""){
            $dataInicio = date('Y-m-01');
        }

        if($dataFim == ""){
            $dataFim = date('Y-m-d');
        }        

        $listaFornecedor = $this->fornecedor->getFornecedor();        
        $totalCompra = $this->compra->getTotalCompraFornecedor($dataInicio, $dataFim, $codFornecedores);
        $listaFornecedorResumida = $this->compra->fornecedorResumida($dataInicio, $dataFim, $codFornecedores);
        $listaFornecedorDetalhada = $this->compra->fornecedorDetalhada($dataInicio, $dataFim, $codFornecedores);
        $listaEmpresa = $this->empresa->getEmpresaPorCodigo(getDadosUsuarioLogado()['id_empresa']);

        $dados = array(
            'dataInicio' => $dataInicio,
            'dataFim' => $dataFim,
            'cod_fornecedor' => $codFornecedores,
            'lista_fornecedor' => $listaFornecedor,
            'total_compra' => $totalCompra,
            'lista_fornecedor_resumida' => $listaFornecedorResumida,
            'lista_fornecedor_detalhada' => $listaFornecedorDetalhada,
            'empresa' => $listaEmpresa,
            'menu' => 'Compras'
            
        );

        $this->load->view('compras/compra-fornecedor', $dados);

    }

    public function visaoCompras(){
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

        $listaComprasDia = $this->compra->getComprasDiaria($dataInicio, $dataFim);
        $valorPendente = $this->compra->getCompraPendente($dataInicio, $dataFim);
        $listaCompraProduto = $this->compra->getCompraProduto($dataInicio, $dataFim);
        $listaCompraFornecedor = $this->compra->getCompraFornecedor($dataInicio, $dataFim);

        $codProdutos = "";
        $periodo = "";        

        // Compra Por Dia
        $labelCrompDia = array();
        $dadosCrompDia = array();
        $labelDia = array();
        $labelNomMes = array();
        $labelAno = array();
        $totalCompra = 0;
        foreach($listaComprasDia as $comprasdia){

            $labelCrompDia[] = str_replace('-', '/', date("d-m", strtotime($comprasdia->data)));
            $labelDia[] = date("d", strtotime($comprasdia->data));
            $labelNomMes[] = $comprasdia->nome_mes;
            $labelAno[] = date("Y", strtotime($comprasdia->data));
            $dadosCrompDia[] = $comprasdia->compra_dia;
            $totalCompra = $totalCompra + $comprasdia->compra_dia;

        }

        // Compra por Produto
        $corCompra = array();
        $dadosCompra = array();
        $dadosProduto = array();
        $codProduto = array();
        $codUnidMedida = array();
        $descProduto = array();
        $quantCompra = array(); 
        $valorCompra = array();        
        foreach($listaCompraProduto as $key_CompraProduto => $comraProduto){

            if($key_CompraProduto == 0){
                $corCompra[] = $this->random_color("");
            }else{
                $corCompra[] = $this->random_color($corCompra[$key_CompraProduto - 1]);
            }
                        
            $dadosCompra[] = ($comraProduto->valor_comprado / $totalCompra) * 100;
            $dadosProduto[] = $comraProduto->cod_produto . " - " . $comraProduto->nome_produto;
            $codProduto[] = $comraProduto->cod_produto;
            $codUnidMedida[] = $comraProduto->cod_unidade_medida;
            $descProduto[] = $comraProduto->nome_produto;
            $quantCompra[] = $comraProduto->quant_comprada;
            $valorCompra[] = $comraProduto->valor_comprado;

        }

        // Compra por Fornecedor
        $corFornecedor = array();
        $dadosFornecedor = array();
        foreach($listaCompraFornecedor as $key_CompraFornecedor => $compraFornecedor){

            if($key_CompraFornecedor == 0){
                $corFornecedor[] = $this->random_color("#F47C3C");
            }else{
                $corFornecedor[] = $this->random_color($corFornecedor[$key_CompraFornecedor - 1]);
            }

            $dadosFornecedor[] = ($compraFornecedor->total_compra / $totalCompra) * 100;
        }

        $dados = array(
            'dataInicio' => $dataInicio,
            'dataFim' => $dataFim,

            'dia' => $labelCrompDia,
            'compra_dia' => $dadosCrompDia,
            'total_comprado' => $totalCompra,   
            'compra_pendente' => $valorPendente, 
            'dia_nome' => $labelDia, 
            'nome_mes' => $labelNomMes,
            'ano' => $labelAno,     
            
            'compra_produto' => $listaCompraProduto,            
            'cor_compra' => $corCompra,
            'dados_compra' => $dadosCompra,
            'nome_produto' => $dadosProduto,

            'cod_produto' => $codProduto,
            'cod_unid_medida' => $codUnidMedida,
            'desc_produto' => $descProduto,
            'quant_comprada' => $quantCompra,
            'valor_compra' => $valorCompra,

            'cor_fornecedor' => $corFornecedor,
            'dados_fornecedor' => $dadosFornecedor,
            'compra_fornecedor' => $listaCompraFornecedor,
            
            'menu' => 'Compras'
        );

        $this->load->view('compras/indicadores-compras', $dados);

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
        if(floatval(str_replace(",",".",$str)) <= 0.000){
            $this->form_validation->set_message('more_zero', 'Valor de %s deve ser maior que 0');
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