<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VendasVendedorController extends CI_Controller {

    function __construct(){
        parent::__construct();

        if(usuarioLogado() == false){

            redirect(base_url("login-vendedor"), "home", "refresh");

        }

        if(getDadosUsuarioLogado()['tipo_acesso'] != 3){

            redirect(base_url("login-vendedor"), "home", "refresh");

        }

        $empresa = $this->empresa->getEmpresaPorCodigo(getDadosUsuarioLogado()['id_empresa']);
        if($empresa->data_validade < date('Y-m-d')){
            $this->session->set_flashdata('erro', 'Período de acesso finalizado, entre em 
                                           contato através do telefone (41) 9 9666 8250 ou pelo email contato@shopfloor.com.br para renovação');
            redirect(base_url('logout'), "home", "refresh");
        }
    } 
    
    public function logoutUsuario(){

        $this->session->sess_destroy('usuario'); 
        redirect(base_url(), "login-vendedor", "home", "refresh");
    }

    public function formPedidoVenda(){

        $listaCliente = $this->cliente->getCliente();
        $listaTransportador = $this->transportador->getTransportador();

        $dados = array(
            'lista_cliente' => $listaCliente,
            'lista_transportador' => $listaTransportador,
            'menu' => ''
        );
        

        $this->load->view('vendas/novo-pedido-venda-vendedor', $dados);

    } 

    public function formAtendimento(){

        $listaCliente = $this->cliente->getCliente();

        $dados = array(
            'lista_cliente' => $listaCliente,
            'menu' => ''
        );
        

        $this->load->view('vendas/novo-atendimento-vendedor', $dados);

    } 

    public function inserirAtendimento(){

        // Cria registro de movimento
        $dados = [
            'tipo_contato' => $this->input->post('TipoContato'),
            'cod_cliente' => $this->input->post('CodCliente'),
            'titulo' => $this->input->post('Assunto'),
            'data_nota' => date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataNota')))),
            'comentario' => $this->input->post('Comentarios'),
            'cod_vendedor' => getDadosUsuarioLogado()['cod_vendedor'],

        ];
        $this->venda->inserirNotaCliente($dados);

        $this->session->set_flashdata('sucesso', 'Nota inserida com sucesso');
        redirect(base_url("vendas/atendimentos-vendedor"), "home", "refresh");
    }

    public function inserirPedidoVenda(){  

        //Validações dos campos
        $this->form_validation->set_rules('CodCliente', 'Código do Cliente', 'required',
            array('required' => 'Você deve preencher o campo %s'));
        $this->form_validation->set_rules('DataEmissao', 'Data de Emissão', 'required|callback_date_check',
            array('required' => 'Você deve preencher o campo %s'));
        $this->form_validation->set_rules('DataEntrega', 'Data de Entrega', 'required',
            array('required' => 'Você deve preencher o campo %s'));

        if($this->form_validation->run() == false){

            $this->session->set_flashdata('erro', validation_errors());
            $this->formPedidoVenda();
            
        }else {

            $dados = [
                'id_empresa' => getDadosUsuarioLogado()['id_empresa'],
                'cod_cliente'  => $this->input->post('CodCliente'),
                'cod_vendedor' => getDadosUsuarioLogado()['cod_vendedor'],
                'perc_comissao' => str_replace(",",".",(str_replace(".","",$this->input->post('PerComissao')))), 
                'data_emissao' => date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataEmissao')))),
                'data_entrega' => date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataEntrega')))),
                'situacao' => $this->input->post('Situacao'),
                'observacoes' => $this->input->post('ObsPedidoVenda'),
                'tipo_desconto' => $this->input->post('TipoDesconto'),
                'valor_desconto' => str_replace(",",".",(str_replace(".","",$this->input->post('Desconto')))), 
                'cod_transportador'  => $this->input->post('CodTransportador'),
                'valor_seguro' => str_replace(",",".",(str_replace(".","",$this->input->post('Seguro')))),
                'outras_despesas' => str_replace(",",".",(str_replace(".","",$this->input->post('OutrasDespesas')))),
                'tipo_frete' => $this->input->post('TipoFrete'),
                'valor_frete' => str_replace(",",".",(str_replace(".","",$this->input->post('Frete')))), 
            ];
            $codPedidoVenda = $this->venda->insertPedidoVenda($dados);

            $this->session->set_flashdata('sucesso', 'Pedido de venda cadastrado com sucesso');
            redirect(base_url("vendas/pedido-venda-vendedor/editar-pedido-venda-vendedor/{$codPedidoVenda}"), "home", "refresh");
                       
        }        
    }

    public function editarPedidoVenda($numPedidoVenda){

        $listaPedidoVenda = $this->venda->getPedidoVendaPorCodigo($numPedidoVenda);
        $listaProdVenda = $this->venda->getProdutoPorPedido($numPedidoVenda);
        $listaProduto = $this->produto->getProdutoVenda(); 
        $listaMetodoPagamento = $this->financeiro->getMetodoPagamento();   
        $listaTransportador = $this->transportador->getTransportador();    

        if($listaPedidoVenda == null){
            redirect(base_url('vendas/pedido-venda'));
            
        }else{ 

            $dados = array(
                'pedido' => $listaPedidoVenda,
                'lista_produto_venda' => $listaProdVenda,
                'lista_produto' => $listaProduto,  
                'lista_metodo_pagamento' => $listaMetodoPagamento,  
                'lista_transportador' => $listaTransportador,            
                'menu' => ''
            );       

            $this->load->view('vendas/editar-pedido-venda-vendedor', $dados);
        }
    }

    public function salvarPedidoVenda($numPedidoVenda){

        //Validações dos campo e array das mensagens apresentadas
        $this->form_validation->set_rules('DataEntrega', 'Data de Entrega', 'required',
            array('required' => 'Você deve preencher o campo %s'));       

        if($this->form_validation->run() == false){

            $this->session->set_flashdata('erro', validation_errors());
            $this->editarPedidoVenda($numPedidoVenda);
            
        }else {  


            if($this->input->post('Situacao') != ""){
                $data = [
                    'perc_comissao' => str_replace(",",".",(str_replace(".","",$this->input->post('PerComissao')))), 
                    'data_entrega' => date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataEntrega')))),
                    'observacoes' => $this->input->post('ObsPedidoVenda'),
                    'tipo_desconto' => $this->input->post('TipoDesconto'),
                    'valor_desconto' => str_replace(",",".",(str_replace(".","",$this->input->post('Desconto')))), 
                    'cod_transportador'  => $this->input->post('CodTransportador'),
                    'valor_seguro' => str_replace(",",".",(str_replace(".","",$this->input->post('Seguro')))),
                    'outras_despesas' => str_replace(",",".",(str_replace(".","",$this->input->post('OutrasDespesas')))),
                    'tipo_frete' => $this->input->post('TipoFrete'),
                    'valor_frete' => str_replace(",",".",(str_replace(".","",$this->input->post('Frete')))), 
                    'situacao' => $this->input->post('Situacao')
                ];

            }else{
                $data = [
                    'perc_comissao' => str_replace(",",".",(str_replace(".","",$this->input->post('PerComissao')))), 
                    'data_entrega' => date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataEntrega')))),
                    'observacoes' => $this->input->post('ObsPedidoVenda'),
                    'tipo_desconto' => $this->input->post('TipoDesconto'),
                    'valor_desconto' => str_replace(",",".",(str_replace(".","",$this->input->post('Desconto')))), 
                    'cod_transportador'  => $this->input->post('CodTransportador'),
                    'valor_seguro' => str_replace(",",".",(str_replace(".","",$this->input->post('Seguro')))),
                    'outras_despesas' => str_replace(",",".",(str_replace(".","",$this->input->post('OutrasDespesas')))),
                    'tipo_frete' => $this->input->post('TipoFrete'),
                    'valor_frete' => str_replace(",",".",(str_replace(".","",$this->input->post('Frete')))), 
                ];
            }            

            $this->venda->updatePedidoVenda($numPedidoVenda, $data);

            $this->session->set_flashdata('sucesso', 'Pedido de venda alterado com sucesso');
            redirect(base_url("vendas/pedido-venda-vendedor/editar-pedido-venda-vendedor/{$numPedidoVenda}"), "home", "refresh");    
                       
        }  
    } 

    public function excluirProdutoVenda($seqProdutoVenda){

        $produtoVenda = $this->venda->getProdutoVendaPorSequencia($seqProdutoVenda);

        if($produtoVenda->quant_atendida > 0){

            $this->session->set_flashdata('erro', 'Exclusão não permitida, produto com quantidade atendida maior que 0');
            redirect(base_url("vendas/pedido-venda-vendedor/editar-pedido-venda-vendedor/{$produtoVenda->num_pedido_venda}"), "home", "refresh");

        }

        $this->venda->deleteProdutoVenda($seqProdutoVenda);

        $this->session->set_flashdata('sucesso', 'Produto excluído com sucesso');
        redirect(base_url("vendas/pedido-venda-vendedor/editar-pedido-venda-vendedor/{$produtoVenda->num_pedido_venda}"), "home", "refresh");    
    }

    public function inserirProdutoVenda($numPedidoVenda){

        $this->form_validation->set_rules('CodProduto', 'Código do Produto', 'required',
                    array('required' => 'Você deve preencher o campo %s'));
        $this->form_validation->set_rules('QuantPedida', 'Quantidade Pedida', 'required|callback_more_zero',
                    array('required' => 'Você deve preencher o campo %s'));
        $this->form_validation->set_rules('ValorUnitario', 'Valor Unitário', 'required|callback_more_zero',
                    array('required' => 'Você deve preencher o campo %s'));

        if($this->form_validation->run() == false){

            $this->session->set_flashdata('erro', validation_errors());
            redirect(base_url("vendas/pedido-venda-vendedor/editar-pedido-venda-vendedor/{$numPedidoVenda}"), "home", "refresh");

        }else{

            $dados = [
                'num_pedido_venda' => $numPedidoVenda,
                'cod_produto'  => $this->input->post('CodProduto'),
                'quant_pedida' => str_replace(",",".",(str_replace(".","",$this->input->post('QuantPedida')))),
                'valor_unitario' => str_replace(",",".",(str_replace(".","",$this->input->post('ValorUnitario'))))
            ];

            $this->venda->insertProdutoVenda($dados);
            $this->session->set_flashdata('sucesso', 'Produto de venda inserido com sucesso');
            redirect(base_url("vendas/pedido-venda-vendedor/editar-pedido-venda-vendedor/{$numPedidoVenda}"), "home", "refresh");

        }
    } 
    
    public function salvarProdutoVenda(){
        $numPedidoVenda = $this->uri->segment(4);
        $seqProdutoVenda = $this->uri->segment(5);

        //Validações dos campo e array das mensagens apresentadas
        $this->form_validation->set_rules('QuantPedidaEdit', 'Quantidade Pedida', 'required|callback_more_zero',
            array('required' => 'Você deve preencher o campo %s'));
        $this->form_validation->set_rules('ValorUnitarioEdit', 'Valor Unitário', 'required|callback_more_zero',
            array('required' => 'Você deve preencher o campo %s'));

        if($this->form_validation->run() == false){

            $this->session->set_flashdata('erro', validation_errors());
            $this->editarPedidoVenda($numPedidoVenda);
            
        }else {

            $quantPedida = str_replace(",",".",(str_replace(".","",$this->input->post('QuantPedidaEdit'))));
            $quantAtendida = str_replace(",",".",(str_replace(".","",$this->input->post('QuantAtendidaEdit'))));

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

            $data = [
                'quant_pedida' => str_replace(",",".",(str_replace(".","",$this->input->post('QuantPedidaEdit')))), 
                'valor_unitario' => str_replace(",",".",(str_replace(".","",$this->input->post('ValorUnitarioEdit')))),               
                'status' => $status
            ];

            $this->venda->updateProdutoVenda($seqProdutoVenda, $data);

            $this->session->set_flashdata('sucesso', 'Produto de venda alterado com sucesso');
            redirect(base_url("vendas/pedido-venda-vendedor/editar-pedido-venda-vendedor/{$numPedidoVenda}"));
                       
        }  
    }

    public function redirecionaPedidoVenda(){

        $mes = date('m');
        $ano = date('Y');

        redirect(base_url("vendas/pedido-venda-vendedor/{$mes}/{$ano}"), "home", "refresh");

    }

    public function listarPedidoVenda(){ 

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

        $listaPedidoVenda = $this->venda->getPedidoVendaPorVendedor($dataInicio, $dataFim, $filter);
        $listaStatus = $this->venda->defineStatusPedido($listaPedidoVenda);
        $empresa = $this->empresa->getEmpresaPorCodigo(getDadosUsuarioLogado()['id_empresa']);      


        $dados = array(
            'descMes' => $descMes,
            'mes' => $mes,
            'ano' => $ano,
            'filter' => $filter,
            'mes_anterior' => $mesAnterior,
            'ano_anterior' => $anoAnterior,
            'mes_seguinte' => $mesSeguinte,
            'ano_seguinte' => $anoSeguinte,
            'empresa' => $empresa,
            'lista_pedido' => $listaPedidoVenda,
            'ped_status' => $listaStatus,
            'menu' => 'Pedidos'
        );

        $this->load->view('vendas/pedido-venda-vendedor', $dados);
    }

    public function redirecionaAtendimentos(){

        $data = date("Y-m-d");

        redirect(base_url("vendas/atendimentos-vendedor/{$data}"), "home", "refresh");

    }

    public function listarAtendimentos(){ 

        $data = $this->uri->segment(3);

        $diaAnterior = date('Y-m-d', strtotime('-1 day', strtotime($data)));
        $diaSeguinte = date('Y-m-d', strtotime('+1 day', strtotime($data)));

        $filter = ($this->input->get('buscar')) ? $this->input->get('buscar') : "";

        $dia = date('d', strtotime($data));
        $mes = date('m', strtotime($data));
        $ano = date('Y', strtotime($data));

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

        $empresa = $this->empresa->getEmpresaPorCodigo(getDadosUsuarioLogado()['id_empresa']);
        $listaNotasCliente = $this->venda->getNotasClientePorVendedor($data);

        $dados = array(
            'descDia' => $dia,
            'descMes' => $descMes,
            'descAno' => $ano,
            'dia' => $data,
            'diaAnterior' => $diaAnterior,
            'diaSeguinte' => $diaSeguinte,
            'filter' => $filter,
            'empresa' => $empresa,
            'lista_notas' => $listaNotasCliente,
            'menu' => 'Atendimentos'
        );

        $this->load->view('vendas/atendimentos-vendedor', $dados);
    }

    public function redirecionaMinhasVendas(){

        $mes = date('m');
        $ano = date('Y');

        redirect(base_url("vendas/minhas-vendas-vendedor/{$mes}/{$ano}"), "home", "refresh");

    }

    public function listarMinhasVendas(){ 

        $mes = $this->uri->segment(3);
        $ano = $this->uri->segment(4);

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

        $empresa = $this->empresa->getEmpresaPorCodigo(getDadosUsuarioLogado()['id_empresa']);

        $valorSituacao = $this->venda->getTotalVendaVendedor($dataInicio, $dataFim);
        $listaValores  = $this->venda->getValoresVendasVendedor($dataInicio, $dataFim);
        $listaValoresMeta = $this->venda->getValoresVendasVendedoresMeta($dataInicio, $dataFim, $mes, $ano, getDadosUsuarioLogado()['cod_vendedor']);
        $listaCliente  = $this->venda->getVendasClienteVendedor($dataInicio, $dataFim);
        $listaProduto  = $this->venda->getVendasProdutoVendedor($dataInicio, $dataFim);

        // Venda por cliente 
        $i = 0; 
        $color = "#ff8a65";
        $labelCliente = array();   
        $percCliente = array(); 
        $colorCliente = array(); 
        foreach($listaCliente as $venda_cliente){

            if($i == 10) continue;

            $i += 1;

            $color = $this->random_color($color);

            $labelCliente[] = $venda_cliente->nome_cliente;
            $percCliente[] = (($venda_cliente->total_vendas + $venda_cliente->total_frete +
                               $venda_cliente->total_seguro + $venda_cliente->outras_despesas - 
                               $venda_cliente->total_desconto) / $listaValores->total_vendas) * 100;
            $colorCliente[] = $color;

            $venda_cliente->color = $color;

        }


        $dados = array(
            'descMes' => $descMes,
            'mes' => $mes,
            'ano' => $ano,
            'mes_anterior' => $mesAnterior,
            'ano_anterior' => $anoAnterior,
            'mes_seguinte' => $mesSeguinte,
            'ano_seguinte' => $anoSeguinte,
            'empresa' => $empresa,

            'valor_situacao' => $valorSituacao, 
            'lista_produto' => $listaProduto,
            'lista_cliente' => $listaCliente,

            'lista_valores' => $listaValoresMeta,

            //cliente
            'label_cliente' => $labelCliente,
            'perc_cliente' => $percCliente,
            'color_cliente' => $colorCliente,

            'menu' => 'Vendas'
        );

        $this->load->view('vendas/minhas-vendas-vendedor', $dados);
    }

    public function imprimirPedido($numPedidoVenda){

        $empresa = $this->empresa->getEmpresaPorCodigo(getDadosUsuarioLogado()['id_empresa']);
        $listaPedidoVenda = $this->venda->getPedidoVendaPorCodigo($numPedidoVenda);
        $listaCliente = $this->cliente->getClientePorCodigo($listaPedidoVenda->cod_cliente); 
        $listaProdVenda = $this->venda->getProdutoPorPedido($numPedidoVenda);

        $dados = array(
            'empresa' => $empresa,
            'cliente' => $listaCliente,
            'pedido' => $listaPedidoVenda,
            'lista_produto' => $listaProdVenda, 
            'menu' => ''
        );        

        $this->load->view('vendas/imprime-pedido-venda', $dados);       

    }  

    public function inserirFaturamento(){

        $numPedidoVenda = $this->uri->segment(4);
        $codCliente = $this->uri->segment(5);

        $this->form_validation->set_rules('DataFaturamento', 'Data de Faturamento', 'required|max_length[60]|callback_date_check', 
            array('required' => 'Você deve preencher o campo %s'));

        if($this->form_validation->run() == false){

            $this->session->set_flashdata('erro', validation_errors());
            redirect(base_url("vendas/pedido-venda-vendedor/editar-pedido-venda-vendedor/{$numPedidoVenda}"), "home", "refresh");
            
        }else { 

            $empresa = $this->empresa->getEmpresaPorCodigo(getDadosUsuarioLogado()['id_empresa']);
            $cliente = $this->cliente->getClientePorCodigo($codCliente);
            $pedido = $this->venda->getPedidoVendaPorCodigo($numPedidoVenda);
            $metodo = $this->financeiro->getMetodoPagamentoPorCodigo($this->input->post('CodMetodoPagamento'));

            if($metodo->cod_conta == 0 || $metodo->cod_conta == null){
                $this->session->set_flashdata('erro', 'Método de pagamento sem conta definida');
                redirect(base_url("vendas/pedido-venda-vendedor/editar-pedido-venda-vendedor/{$numPedidoVenda}"), "home", "refresh");  
            }

            $lista_produto_venda = $this->venda->getProdutoPorPedido($numPedidoVenda);
            if($lista_produto_venda == null){
                $this->session->set_flashdata('erro', 'Faturamento não permitido, nenhum produto foi inserido no pedido');
                redirect(base_url("vendas/pedido-venda-vendedor/editar-pedido-venda-vendedor/{$numPedidoVenda}"), "home", "refresh");  

            }
            foreach($lista_produto_venda as $key_produto_venda => $produto) {

                if($produto->saldo_negativo != 1 && $produto->quant_estoq < $produto->quant_pedida){
                    $this->session->set_flashdata('erro', 'Produto <strong>(' . $produto->cod_produto . ') ' . $produto->nome_produto . '</strong> sem saldo suficiente para venda');
                    redirect(base_url("vendas/pedido-venda-vendedor/editar-pedido-venda-vendedor/{$numPedidoVenda}"), "home", "refresh");  
                }
            }

            if($pedido->tipo_frete == 1){
                $valor_frete = $pedido->valor_frete;
            }else{
                $valor_frete = 0;
            }

            if($pedido->tipo_desconto == 1){
                $valor_desconto = $pedido->valor_desconto;
            }elseif($pedido->tipo_desconto == 2){
                $valor_desconto = ($pedido->valor_total_pedido + $valor_frete) * ($pedido->valor_desconto / 100);
            }            

            // Cria registro de faturamento
            $data = [
                'num_pedido_venda'  => $numPedidoVenda,
                'data_faturamento' => date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataFaturamento')))),
                'serie' => $this->input->post('Serie'),
                'nota_fiscal' => $this->input->post('NotaFiscal'),
                'cod_transportador' => $pedido->cod_transportador,
                'valor_frete' => $valor_frete,
                'valor_desconto' => $valor_desconto,
                'valor_bruto' => $pedido->valor_total_pedido,
                'cod_vendedor' => $pedido->cod_vendedor,
                'perc_comissao' => $pedido->perc_comissao,
                'observacoes' => $this->input->post('ObservFatur')
            ];
            $codFaturamentoPedido = $this->venda->insertFaturamento($data);
            
            $total_venda = 0;            
            foreach($lista_produto_venda as $key_produto_venda => $produto) {

                $valor_venda = $produto->quant_pedida * $produto->valor_unitario;
                $total_venda = $total_venda + $valor_venda;

                // Movimenta estoque
                $dadosEstoque = null;
                $dadosEstoque = [
                    'id_empresa' => getDadosUsuarioLogado()['id_empresa'],
                    'data_movimento' => date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataFaturamento')))),
                    'cod_produto' => $produto->cod_produto,
                    'origem_movimento' => 3,
                    'id_origem' => $codFaturamentoPedido,
                    'tipo_movimento' => 2,
                    'especie_movimento' => 5,
                    'quant_movimentada' => $produto->quant_pedida,
                    'custo_mat' => $valor_venda,
                    'valor_movimento' => $valor_venda,
                    'usuario' => getDadosUsuarioLogado()['usuario'],
                ];
                $this->estoque->insertMovimentoEstoque($dadosEstoque);

                $produtoVenda = $this->venda->getProdutoVendaPorCodigo($numPedidoVenda, $produto->cod_produto);

                if($produtoVenda->quant_atendida > 0){
                    if(($produtoVenda->quant_atendida + $produto->quant_pedida) >= $produtoVenda->quant_pedida) {
                        $status = 3;
                    }else{
                        $status = 2;
                    }            
                }else{
                    if($produto->quant_pedida >= $produtoVenda->quant_pedida) {
                        $status = 3;
                    }else{
                        $status = 2;
                    } 
                }

                $dados = [
                    'quant_atendida' => $produtoVenda->quant_atendida + $produto->quant_pedida,
                    'status' => $status
                ];
                $this->venda->updateProdutoVenda($produto->seq_produto_venda, $dados);

                //@todo !!!Regra criada para atender ao faturamento de itens conforme detalhado em conversa workana dia 02-03/06/2022!!!
                //Caso quantidade seja inferior ou igual a 0 não deve inserir itemno faturamento
                //@todo Criar regra para remover do banco itens que o faturamento foi estornado?
                if ($produto->quant_pedida <= 0) {
                    continue;
                }
                $itensFaturados = [
                    'faturamento_pedido' => $codFaturamentoPedido,
                    'cod_produto' => $produto->cod_produto,
                    'quantidade' => $produto->quant_pedida,
                    'valor_unitario' => $produto->valor_unitario
                ];
                $this->venda->inserirProdutoVendaFaturamento($itensFaturados);

            }

            // Criação de título
            $numParcela = $this->input->post('Parcelas');
            $dataVencimento = $this->input->post('DataVencimento');
            $valorParcela = $this->input->post('ValorParcela');

            $valorTotal = $total_venda - $valor_desconto;

            for ($i = 1; $i <= $numParcela; $i++) {              
                
                $dadosMovimento = null;
                $dadosMovimento = [
                    'cod_conta' => $metodo->cod_conta,
                    'cod_metodo_pagamento' => $this->input->post('CodMetodoPagamento'),
                    'cod_centro_custo' => $empresa->conta_contabil_vendas,
                    'cod_conta_contabil' => $empresa->conta_contabil_vendas,
                    'cod_emitente' => $codCliente,
                    'cod_vendedor' => $pedido->cod_vendedor,
                    'tipo_movimento' => 1,
                    'data_competencia' => date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataFaturamento')))),
                    'data_vencimento' => date("Y-m-d", strtotime(str_replace('/', '-', $dataVencimento[$i]))),
                    'parcela' => $i . '/' . $numParcela,
                    'desc_movimento' => $cliente->nome_cliente . " - Pedido de Venda: " . $numPedidoVenda . ", " . "Faturamento: " . $codFaturamentoPedido,
                    'valor_titulo' => floatval(str_replace(",",".",(str_replace(".","",$valorParcela[$i])))),
                    'origem_movimento' => 3,
                    'id_origem' => $codFaturamentoPedido,
                    'confirmado' => 0
                ];
                $this->financeiro->insertMovimentoConta($dadosMovimento);
            }
        }

        $this->session->set_flashdata('sucesso', 'Faturamento realizado com sucesso');
        redirect(base_url("vendas/pedido-venda-vendedor"), "home", "refresh");

    }

    //Validações do Form
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