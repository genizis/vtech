<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'application/traits/Traits.php';

class VendasController extends CI_Controller {

    use Traits;

    function __construct(){
        parent::__construct();

        if(usuarioLogado() == false){

            redirect(base_url("login"), "home", "refresh");

        }

        if(getDadosUsuarioLogado()['vendas'] != 1){

            redirect(base_url("visao-geral"), "home", "refresh");

        }

        $empresa = $this->empresa->getEmpresaPorCodigo(getDadosUsuarioLogado()['id_empresa']);
        if($empresa->data_validade < date('Y-m-d')){
            $this->session->set_flashdata('erro', 'Período de acesso finalizado, entre em 
                                           contato através do telefone (41) 9 9666 8250 ou pelo email contato@shopfloor.com.br para renovação');
            redirect(base_url('logout'), "home", "refresh");
        }
    }

    public function imprimirPedido($numPedidoVenda)
    {

        $empresa = $this->empresa->getEmpresaPorCodigo(getDadosUsuarioLogado()['id_empresa']);
        $listaPedidoVenda = $this->venda->getPedidoVendaPorCodigo($numPedidoVenda);
        $listaCliente = $this->cliente->getClientePorCodigo($listaPedidoVenda->cod_cliente);
        $listaProdVenda = $this->venda->getProdutoPorPedido($numPedidoVenda);

        $situacao = "";
        if($listaPedidoVenda->situacao == 1)
            $situacao = "Orçamento";
        elseif($listaPedidoVenda->situacao == 1)
            $situacao = "Pedido de Venda";

        $dados = array(
            'empresa' => $empresa,
            'cliente' => $listaCliente,
            'pedido' => $listaPedidoVenda,
            'lista_produto' => $listaProdVenda,
            'menu' => $situacao . ' ' . $listaPedidoVenda->num_pedido_venda
        );

        $this->load->view('vendas/imprime-pedido-venda', $dados);

    }

    public function formPedidoVenda(){

        $listaCliente = $this->cliente->getCliente();
        $listaVendedor = $this->vendedor->getVendedor();
        $listaTransportador = $this->transportador->getTransportador();

        $listaSegmento = $this->tabelasauxiliares->getSegmento();
        $listaCidade = $this->tabelasauxiliares->getCidade();
        $listaEstado = $this->tabelasauxiliares->getEstado();   
        $listaPais = $this->tabelasauxiliares->getPais();    

        $dados = array(
            'lista_cliente' => $listaCliente,
            'lista_vendedor' => $listaVendedor,
            'lista_transportador' => $listaTransportador,
            'lista_segmento' => $listaSegmento,
            'lista_cidade' => $listaCidade,
            'lista_estado' => $listaEstado,
            'lista_pais' => $listaPais,
            'menu' => 'Vendas'
        );


        $this->load->view('vendas/novo-pedido-venda', $dados);

    }

    public function redirecionaFrenteCaixa(){

        $data = date("Y-m-d");

        redirect(base_url("vendas/frente-caixa/{$data}"), "home", "refresh");

    }

    public function buscarData(){

        $data = date("Y-m-d", strtotime(str_replace('/', '-', $this->input->get('dataCaixa'))));

        redirect(base_url("vendas/frente-caixa/{$data}"), "home", "refresh");

    }

    public function frenteCaixa(){

        $data = $this->uri->segment(3);

        $diaAnterior = date('Y-m-d', strtotime('-1 day', strtotime($data)));
        $diaSeguinte = date('Y-m-d', strtotime('+1 day', strtotime($data)));

        $frenteCaixa = $this->venda->getControleCaixaPorCodigo($data);
        $vendaCaixa = $this->venda->getVendaCaixa($data);
        $movimentoCaixa = $this->venda->getMovimentoCaixa($data);

        $recebimentoMetodo = $this->venda->getMetodoPagamentoPorDataCaixa($data);

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

        $this->load->library('CommonNFe');
        $dados = array(
            'descDia' => $dia,
            'descMes' => $descMes,
            'descAno' => $ano,
            'dia' => $data,
            'diaAnterior' => $diaAnterior,
            'diaSeguinte' => $diaSeguinte,
            'frente_caixa' => $frenteCaixa,
            'venda_caixa' => $vendaCaixa,
            'movimento_caixa' => $movimentoCaixa,
            'recebeimento_metodo' => $recebimentoMetodo,
            'menu' => 'Vendas',
            'baseNFeDir'=> base_url($this->commonnfe->aprDir)
        );

        $this->load->view('vendas/frente-caixa', $dados);

    }

    public function imprimirFechamentoCaixa($data)
    {

        $empresa = $this->empresa->getEmpresaPorCodigo(getDadosUsuarioLogado()['id_empresa']);
        $frenteCaixa = $this->venda->getControleCaixaPorCodigo($data);
        $vendaCaixa = $this->venda->getVendaCaixa($data);
        $movimentoCaixa = $this->venda->getMovimentoCaixa($data);

        $recebimentoMetodo = $this->venda->getMetodoPagamentoPorDataCaixaImp($data);
        $produtoVenda = $this->venda->getProdutoPorDataCaixa($data);

        $dados = array(
            'empresa' => $empresa,
            'frente_caixa' => $frenteCaixa,
            'venda_caixa' => $vendaCaixa,
            'movimento_caixa' => $movimentoCaixa,
            'recebeimento_metodo' => $recebimentoMetodo,
            'produto_venda' => $produtoVenda,
            'menu' => ''
        );

        $this->load->view('vendas/imprime-fechamento-caixa', $dados);

    }

    public function abrirCaixa(){

        $data = $this->uri->segment(3);

        $caixaAberto = $this->venda->getCaixaAberto($data);

        if($caixaAberto <> null){

            $this->session->set_flashdata('erro', 'O caixa do dia ' . str_replace('-', '/', date("d-m-Y", strtotime($caixaAberto->data_caixa))) . ' ainda está em aberto');
            redirect(base_url("vendas/frente-caixa/{$data}"), "home", "refresh");

        }

        if($data > date('Y-m-d')){

            $this->session->set_flashdata('erro', 'Não é possível abrir caixa para datas futuras');
            redirect(base_url("vendas/frente-caixa/{$data}"), "home", "refresh");

        }

        $empresa = $this->empresa->getEmpresaPorCodigo(getDadosUsuarioLogado()['id_empresa']);
        $metodoCaixa = $this->financeiro->getMetodoPagamentoPorCodigo($empresa->metodo_pagamento_frente_caixa);
        if($metodoCaixa->cod_conta == null){

            $this->session->set_flashdata('erro', 'Método de pagamento do caixa não possui conta padrão definida');
            redirect(base_url("vendas/frente-caixa/{$data}"), "home", "refresh");

        }

        // Cria registro de venda
        $dados = [
            'id_empresa'  => getDadosUsuarioLogado()['id_empresa'],
            'data_caixa' => $data,
            'saldo_inicial' => str_replace(",",".",(str_replace(".","",$this->input->post('SaldoInicial')))),
            'data_hora_abertura' => date('Y-m-d H:i:s'),
        ];
        $this->venda->inserirControleCaixa($dados);        

        //Retira dinheiro da conta para colocar no caixa
        $dadosMovimento = null;
        $dadosMovimento = [
            'cod_conta' => $metodoCaixa->cod_conta,
            'cod_metodo_pagamento' => $metodoCaixa->cod_metodo_pagamento,
            'especie_movimento' => 2,
            'tipo_movimento' => 2,
            'data_competencia' => $data,
            'data_vencimento' => $data,
            'data_confirmacao' => $data, 
            'parcela' => '1/1',
            'desc_movimento' => 'Abertura de Caixa - Data Caixa: ' .  str_replace('-', '/', date("d-m-Y", strtotime($data))),
            'valor_titulo' => str_replace(",",".",(str_replace(".","",$this->input->post('SaldoInicial')))),            
            'origem_movimento' => 4,
            'id_origem' => intval(str_replace('-', '', date("d-m-Y", strtotime($data)))),            
            'confirmado' => 1,
            'valor_confirmado' => str_replace(",",".",(str_replace(".","",$this->input->post('SaldoInicial')))),
            'valor_desc_taxa' => 0,
            'usuario_criacao' => getDadosUsuarioLogado()['email'],
            'usuario_liquidacao' => getDadosUsuarioLogado()['email'],
        ];
        $this->financeiro->insertMovimentoConta($dadosMovimento);

        $this->session->set_flashdata('sucesso', 'Caixa aberto com sucesso');
        redirect(base_url("vendas/frente-caixa/{$data}"), "home", "refresh");
    }

    public function reabrirCaixa(){

        $data = $this->uri->segment(3);

        $caixaAberto = $this->venda->getCaixaAberto();

        if($caixaAberto <> null){

            $this->session->set_flashdata('erro', 'Não é possível reabrir, o caixa do dia ' . str_replace('-', '/', date("d-m-Y", strtotime($caixaAberto->data_caixa))) . ' ainda está em aberto');
            redirect(base_url("vendas/frente-caixa/{$data}"), "home", "refresh");

        }

        // Atualiza registro de venda
        $dados = [
            'data_hora_fechamento' => null,
        ];
        $this->venda->updateControleCaixa($data, $dados);

        //Exclui títulos não confirmados
        $this->financeiro->excluirTituloOrigem(4, intval(str_replace('-', '', date("d-m-Y", strtotime($data)))));

        $this->session->set_flashdata('sucesso', 'Caixa aberto com sucesso');
        redirect(base_url("vendas/frente-caixa/{$data}"), "home", "refresh");


    }

    public function fecharCaixa(){

        $data = $this->uri->segment(3);

        $vendasSalvas = $this->venda->getVendasSalvas($data);

        if($vendasSalvas <> null){

            $this->session->set_flashdata('erro', 'Não é possível fechar caixa, ainda há vendas em aberto');
            redirect(base_url("vendas/frente-caixa/{$data}"), "home", "refresh");

        }

        $empresa = $this->empresa->getEmpresaPorCodigo(getDadosUsuarioLogado()['id_empresa']);

        $frente_caixa = $this->venda->getControleCaixaPorCodigo($data);
        $saldoCaixa = $frente_caixa->saldo_inicial + $frente_caixa->total_incremento - $frente_caixa->total_recolhimento;

        $descontoReceita = 0;
        if($saldoCaixa > 0) {

            if($frente_caixa->cod_conta == null){
                $this->session->set_flashdata('erro', 'Não é possível fechar caixa, é preciso definir um método de pagamento dinheiro');
                redirect(base_url("vendas/frente-caixa/{$data}"), "home", "refresh");
            }

            $valorTitulo = $frente_caixa->saldo_inicial + $frente_caixa->total_venda + $frente_caixa->total_incremento - $frente_caixa->total_recolhimento;

            //Retira dinheiro da conta para colocar no caixa
            $dadosMovimento = null;
            $dadosMovimento = [
                'cod_conta' => $frente_caixa->cod_conta,
                'cod_metodo_pagamento' => $frente_caixa->cod_metodo_pagamento,
                'especie_movimento' => 2,
                'tipo_movimento' => 1,
                'data_competencia' => $frente_caixa->data_caixa,
                'data_vencimento' => $frente_caixa->data_caixa,
                'data_confirmacao' => $frente_caixa->data_caixa, 
                'parcela' => '1/1',
                'desc_movimento' => 'Devolução de Caixa - Data Caixa: ' .  str_replace('-', '/', date("d-m-Y", strtotime($frente_caixa->data_caixa))),
                'valor_titulo' => $saldoCaixa,            
                'origem_movimento' => 4,
                'id_origem' => intval(str_replace('-', '', date("d-m-Y", strtotime($frente_caixa->data_caixa)))),            
                'confirmado' => 1,
                'valor_confirmado' => $saldoCaixa,
                'valor_desc_taxa' => 0,
                'usuario_criacao' => getDadosUsuarioLogado()['email'],
                'usuario_liquidacao' => getDadosUsuarioLogado()['email'],
            ];
            $this->financeiro->insertMovimentoConta($dadosMovimento);

        }else{
            $descontoReceita = $saldoCaixa;
        }

        $recebimentoMetodo = $this->venda->getMetodoPagamentoPorDataCaixa($data);
        foreach($recebimentoMetodo as $key_recebimentoMetodo => $recebimento) {

            $valorReceita = $recebimento->total_venda;
            if($frente_caixa->cod_metodo_pagamento == $recebimento->cod_metodo_pagamento)
                $valorReceita = $recebimento->total_venda + $descontoReceita;

            if($recebimento->dias_recebimento <> 0)
                $vencimento = date("Y-m-d", strtotime('+' . $recebimento->dias_recebimento . ' day', strtotime($recebimento->data_caixa)));
            else
                $vencimento = $recebimento->data_caixa;

            $valorTaxa = 0;
            if($recebimento->taxa_operacao != null && $recebimento->taxa_operacao != 0){
                $valorTaxa = $recebimento->total_venda * ($recebimento->taxa_operacao / 100);
            }

            $dadosMovimento = null;
            $dadosMovimento = [
                'cod_conta' => $recebimento->cod_conta,
                'cod_metodo_pagamento' => $recebimento->cod_metodo_pagamento,
                'cod_centro_custo' => $empresa->centro_custo_frente_caixa,
                'cod_conta_contabil' => $empresa->conta_contabil_frente_caixa,
                'tipo_movimento' => 1,
                'data_competencia' => $recebimento->data_caixa,
                'data_vencimento' => $vencimento,
                'parcela' => '1/1',
                'desc_movimento' => 'Frente de Caixa (' . $recebimento->nome_metodo_pagamento . ") - Data Caixa: " .  str_replace('-', '/', date("d-m-Y", strtotime($recebimento->data_caixa))),
                'valor_titulo' => $valorReceita,
                'origem_movimento' => 4,
                'id_origem' => intval(str_replace('-', '', date("d-m-Y", strtotime($recebimento->data_caixa)))),
                'confirmado' => 0,
                'valor_desc_taxa' => $valorTaxa,
                'usuario_criacao' => getDadosUsuarioLogado()['email'],
            ];
            $this->financeiro->insertMovimentoConta($dadosMovimento);
        }

        // Atualiza registro de venda
        $dados = [
            'data_hora_fechamento' => date('Y-m-d H:i:s'),
        ];
        $this->venda->updateControleCaixa($data, $dados);

        $this->session->set_flashdata('sucesso', 'Caixa fechado com sucesso');
        redirect(base_url("vendas/frente-caixa/{$data}"), "home", "refresh");
    }

    public function inserirNota($codCliente){

        // Cria registro de movimento
        $dados = [
            'cod_cliente' => $codCliente,
            'titulo' => $this->input->post('TituloNota'),
            'tipo_contato' => $this->input->post('TipoContato'),
            'data_nota' => date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataNota')))),
            'comentario' => $this->input->post('Comentario'),
            'usuario' => getDadosUsuarioLogado()['email'],

        ];
        $this->venda->inserirNotaCliente($dados);

        $this->session->set_flashdata('sucesso', 'Nota inserida com sucesso');
        redirect(base_url("painel/clientes/detalhe-cliente/{$codCliente}"), "home", "refresh");
    }

    public function inserirNotaVendedor($codVendedor){

        // Cria registro de movimento
        $dados = [
            'cod_cliente' => $this->input->post('CodCliente'),
            'cod_vendedor' => $codVendedor,
            'titulo' => $this->input->post('TituloNota'),
            'tipo_contato' => $this->input->post('TipoContato'),
            'data_nota' => date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataNota')))),
            'comentario' => $this->input->post('Comentario'),
            'usuario' => getDadosUsuarioLogado()['email'],

        ];
        $this->venda->inserirNotaCliente($dados);

        $this->session->set_flashdata('sucesso', 'Atendimento inserido com sucesso');
        redirect(base_url("painel/vendedores/detalhe-vendedor/{$codVendedor}#atendimentos"), "home", "refresh");
    }

    public function salvarNota($codNotaCliente){

        $nota = $this->venda->getNotaPorCodigo($codNotaCliente);

        // Cria registro de movimento
        $dados = [
            'titulo' => $this->input->post('TituloNota'),
            'tipo_contato' => $this->input->post('TipoContato'),
            'data_nota' => date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataNota')))),
            'comentario' => $this->input->post('Comentario')
        ];
        $this->venda->updateNotaCliente($codNotaCliente, $dados);

        $this->session->set_flashdata('sucesso', 'Nota atualizada com sucesso');
        redirect(base_url("painel/clientes/detalhe-cliente/{$nota->cod_cliente}"), "home", "refresh");
    }

    public function salvarNotaVendedor($codNotaCliente){

        $nota = $this->venda->getNotaPorCodigo($codNotaCliente);

        // Cria registro de movimento
        $dados = [
            'titulo' => $this->input->post('TituloNota'),
            'tipo_contato' => $this->input->post('TipoContato'),
            'data_nota' => date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataNota')))),
            'comentario' => $this->input->post('Comentario')
        ];
        $this->venda->updateNotaCliente($codNotaCliente, $dados);

        $this->session->set_flashdata('sucesso', 'Atendimento atualizado com sucesso');
        redirect(base_url("painel/vendedores/detalhe-vendedor/{$nota->cod_vendedor}#atendimentos"), "home", "refresh");
    }

    public function inserirMovimento(){

        $data = $this->uri->segment(3);
        $tipoMovimento = $this->uri->segment(4);
        $especieMovimento = $this->input->post('EspecieMovimento');

        // Verifica se há metodo de pagamento tem conta padrão definida
        $empresa = $this->empresa->getEmpresaPorCodigo(getDadosUsuarioLogado()['id_empresa']);
        $metodoCaixa = $this->financeiro->getMetodoPagamentoPorCodigo($empresa->metodo_pagamento_frente_caixa);
        if($metodoCaixa->cod_conta == null){

            $this->session->set_flashdata('erro', 'Método de pagamento do caixa não possui conta padrão definida');
            redirect(base_url("vendas/frente-caixa/{$data}"), "home", "refresh");

        }        

        // Cria registro de movimento
        $dados = [
            'id_empresa'  => getDadosUsuarioLogado()['id_empresa'],
            'data_caixa' => $data,
            'data_hora_movimento' => date('Y-m-d H:i:s'),
            'tipo_movimento' => $tipoMovimento,
            'especie_movimento' => $especieMovimento,
            'valor_movimento' => str_replace(",",".",(str_replace(".","",$this->input->post('ValorMovimento')))),
            'observacao' => $this->input->post('ObsMovimento'),

        ];
        $codMovimento = $this->venda->inserirMovimentoCaixa($dados);
        

        if($tipoMovimento == 1 && $especieMovimento == 1){
            //Retira dinheiro da conta para colocar no caixa
            $dadosMovimento = null;
            $dadosMovimento = [
                'cod_conta' => $metodoCaixa->cod_conta,
                'cod_metodo_pagamento' => $metodoCaixa->cod_metodo_pagamento,
                'especie_movimento' => 2,
                'tipo_movimento' => 2,
                'data_competencia' => $data,
                'data_vencimento' => $data,
                'data_confirmacao' => $data, 
                'parcela' => '1/1',
                'desc_movimento' => 'Transferência para o Caixa - Data Caixa: ' .  str_replace('-', '/', date("d-m-Y", strtotime($data))),
                'valor_titulo' => str_replace(",",".",(str_replace(".","",$this->input->post('ValorMovimento')))),         
                'origem_movimento' => 5,
                'id_origem' => $codMovimento,            
                'confirmado' => 1,
                'valor_confirmado' => str_replace(",",".",(str_replace(".","",$this->input->post('ValorMovimento')))),
                'valor_desc_taxa' => 0,
                'usuario_criacao' => getDadosUsuarioLogado()['email'],
                'usuario_liquidacao' => getDadosUsuarioLogado()['email'],
            ];
            $this->financeiro->insertMovimentoConta($dadosMovimento);
        }elseif($tipoMovimento == 2 && $especieMovimento == 4){
            //Retira dinheiro da conta para colocar no caixa
            $dadosMovimento = null;
            $dadosMovimento = [
                'cod_conta' => $metodoCaixa->cod_conta,
                'cod_metodo_pagamento' => $metodoCaixa->cod_metodo_pagamento,
                'especie_movimento' => 2,
                'tipo_movimento' => 1,
                'data_competencia' => $data,
                'data_vencimento' => $data,
                'data_confirmacao' => $data, 
                'parcela' => '1/1',
                'desc_movimento' => 'Recolhimento do Caixa - Data Caixa: ' .  str_replace('-', '/', date("d-m-Y", strtotime($data))),
                'valor_titulo' => str_replace(",",".",(str_replace(".","",$this->input->post('ValorMovimento')))),         
                'origem_movimento' => 5,
                'id_origem' => $codMovimento,            
                'confirmado' => 1,
                'valor_confirmado' => str_replace(",",".",(str_replace(".","",$this->input->post('ValorMovimento')))),
                'valor_desc_taxa' => 0,
                'usuario_criacao' => getDadosUsuarioLogado()['email'],
                'usuario_liquidacao' => getDadosUsuarioLogado()['email'],
            ];
            $this->financeiro->insertMovimentoConta($dadosMovimento);
        }

        $this->session->set_flashdata('sucesso', 'Movimento realizado com sucesso');
        redirect(base_url("vendas/frente-caixa/{$data}#incremento"), "home", "refresh");


    }

    public function novaVendaCaixa(){

        $data = $this->uri->segment(3);

        $empresa = $this->empresa->getEmpresaPorCodigo(getDadosUsuarioLogado()['id_empresa']);
        $listaCliente = $this->cliente->getClienteFat();
        $listaTransportador = $this->transportador->getTransportadorFat();
        $listaProduto = $this->produto->getProdutoVendaCaixa();
        $listaMetodoPagamento = $this->financeiro->getMetodoPagamentoFat();
        $listaSegmento = $this->tabelasauxiliares->getSegmento();
        $listaCidade = $this->tabelasauxiliares->getCidade();

        $dados = array(
            'empresa' => $empresa,
            'dia' => $data,
            'lista_cliente' => $listaCliente,
            'lista_transportador' => $listaTransportador,
            'lista_produto' => $listaProduto,
            'lista_metodo_pagamento' => $listaMetodoPagamento,
            'lista_segmento' => $listaSegmento,
            'lista_cidade' => $listaCidade,
            'indicadorPresencial' => self::indicadorPresencial(),
            'menu' => 'Vendas'
        );


        $this->load->view('vendas/nova-venda-caixa', $dados);

    }

    public function editarVendaCaixa(){

        $numVendaCaixa = $this->uri->segment(4);

        $vendaCaixa = $this->venda->getVendaCaixaPorCodigo($numVendaCaixa);

        $empresa = $this->empresa->getEmpresaPorCodigo(getDadosUsuarioLogado()['id_empresa']);
        $listaProdutoVendaCaixa = $this->venda->getProdutoPorVendaCaixa($numVendaCaixa);
        $listaMetodoVendaCaixa = $this->venda->getMetodoPagamentoPorVendaCaixa($numVendaCaixa);
        $listaTransportador = $this->transportador->getTransportador();

        $listaCliente = $this->cliente->getCliente();
        $listaProduto = $this->produto->getProdutoVendaCaixa();
        $listaMetodoPagamento = $this->financeiro->getMetodoPagamentoFat();

        $dados = array(
            'venda_caixa' => $vendaCaixa,
            'empresa' => $empresa,
            'produto_venda_caixa' => $listaProdutoVendaCaixa,
            'metodo_venda_caixa' => $listaMetodoVendaCaixa,
            'lista_cliente' => $listaCliente,
            'lista_transportador' => $listaTransportador,
            'lista_produto' => $listaProduto,
            'lista_metodo_pagamento' => $listaMetodoPagamento,
            'indicadorPresencial' => self::indicadorPresencial(),
            'menu' => 'Vendas'
        );        


        $this->load->view('vendas/editar-venda-caixa', $dados);

    }

    public function imprimirVendaCaixa($numVendaCaixa)
    {
        
        $empresa = $this->empresa->getEmpresaPorCodigo(getDadosUsuarioLogado()['id_empresa']);
        $vendaCaixa = $this->venda->getVendaCaixaPorCodigo($numVendaCaixa);
        $listaCliente = $this->cliente->getClientePorCodigo($vendaCaixa->cod_cliente);
        $listaProdutoVendaCaixa = $this->venda->getProdutoPorVendaCaixa($numVendaCaixa);
        $listaMetodoVendaCaixa = $this->venda->getMetodoPagamentoPorVendaCaixa($numVendaCaixa);

        $dados = array(
            'empresa' => $empresa,
            'cliente' => $listaCliente,
            'venda' => $vendaCaixa,
            'lista_produto' => $listaProdutoVendaCaixa,
            'lista_metodo' => $listaMetodoVendaCaixa,
            'menu' => ''
        );

        $this->load->view('vendas/imprime-venda-frente-caixa', $dados); 

    }

    public function inserirVendaCaixa(){
        $dataVenda = $this->uri->segment(3);

        $controleCaixa = $this->venda->getControleCaixaPorCodigo($dataVenda);

        if($controleCaixa == null){

            $this->session->set_flashdata('erro', 'Caixa do dia ' . str_replace('-', '/', date("d-m-Y", strtotime($dataVenda))) . ' não está aberto');
            redirect(base_url("vendas/frente-caixa/{$dataVenda}"), "home", "refresh");

        }

        $status = $this->input->post('Opcao');

        $codProduto = $this->input->post('codProduto[]');
        $codLote = $this->input->post('codLote[]');
        $quantProduto = $this->input->post('quantProduto[]');
        $valorUnitProdutos = $this->input->post('valorUnitProduto[]');

        $codMetodoPagamento = $this->input->post('codMetodoPagamento[]');
        $valorFormaPagamento = $this->input->post('valorFormaPagamento[]');

        // Cria registro de venda
        $dados = [
            'id_empresa'  => getDadosUsuarioLogado()['id_empresa'],
            'data_caixa' => $dataVenda,
            'data_hora_venda' => date('Y-m-d H:i:s'),
            'cod_cliente' => $this->input->post('CodCliente'),
            'cod_transportador' => $this->input->post('CodTransportador'),
            'tipo_pessoa' => $this->input->post('TipoPessoa'),
            'cnpj_cpf' => $this->input->post('CnpjCpf'),
            'tipo_desconto' => $this->input->post('TipoDesconto'),
            'valor_bruto' => str_replace(",",".",(str_replace(".","",$this->input->post('SubTotal')))),
            'valor_frete' => str_replace(",",".",(str_replace(".","",$this->input->post('ValorFrete')))),
            'valor_desconto' => str_replace(",",".",(str_replace(".","",$this->input->post('ValorDesconto')))),
            'indicador_presenca' => str_replace(",",".",(str_replace(".","",$this->input->post('indicadorPresencial')))),
            'usuario' => getDadosUsuarioLogado()['email'],
            'status' => 1,
        ];
        $numVendaCaixa = $this->venda->inserirVendaCaixa($dados);


        //Grava itens do pedido
        for ($i = 0; $i < count($codProduto); $i++) {

            $loteProduto = null;
            if($codLote[$i] != "" && $codLote[$i] != null)
                $loteProduto = $codLote[$i];            

            $dadosProd[] = (object)[
                'num_venda_caixa' => $numVendaCaixa,
                'cod_produto' => $codProduto[$i],
                'cod_lote' => $loteProduto,
                'quant_venda' => str_replace(",",".",(str_replace(".","",$quantProduto[$i]))),
                'valor_unit' => str_replace(",",".",(str_replace(".","",$valorUnitProdutos[$i]))),
            ];
        }
        $this->venda->inserirProdutosCaixa($dadosProd);

        // Gravar formas de pagamento
        for ($i = 0; $i < count($codMetodoPagamento); $i++) {

            $dadosForma[] = (object)[
                'num_venda_caixa' => $numVendaCaixa,
                'cod_metodo_pagamento' => $codMetodoPagamento[$i],
                'valor_pagamento' => str_replace(",",".",(str_replace(".","",$valorFormaPagamento[$i]))),
            ];

        }
        $this->venda->inserirFormaPagamentoCaixa($dadosForma);

        if($status == 2){

            // Valida disponibilidade de estoque
            for ($i = 0; $i < count($codProduto); $i++) {
                $quantPro = str_replace(",",".",(str_replace(".","",$quantProduto[$i])));

                $produto = $this->produto->getProdutoPorCodigo($codProduto[$i]);
                if($produto->saldo_negativo == 0 && $produto->quant_estoq < $quantPro){                    

                    $this->session->set_flashdata('erro', 'Produto <strong>(' . $produto->cod_produto . ') ' . $produto->nome_produto . '</strong> sem estoque suficiente para venda');
                    redirect(base_url("vendas/frente-caixa/editar-venda-caixa/{$numVendaCaixa}"), "home", "refresh");

                }
            }

            for ($i = 0; $i < count($codProduto); $i++) {

                $quantPro = str_replace(",",".",(str_replace(".","",$quantProduto[$i])));
                $valUnit = str_replace(",",".",(str_replace(".","",$valorUnitProdutos[$i])));

                $loteProduto = null;
                if($codLote[$i] != "" && $codLote[$i] != null)
                    $loteProduto = $codLote[$i];

                $produto = $this->produto->getProdutoPorCodigo($codProduto[$i]);

                if($produto->tipo_controle != 3){

                    // Movimenta estoque
                    $dadosEstoque = null;
                    $dadosEstoque = [
                        'id_empresa' => getDadosUsuarioLogado()['id_empresa'],
                        'data_movimento' => $dataVenda,
                        'cod_produto' => $codProduto[$i],
                        'cod_lote' => $loteProduto,
                        'origem_movimento' => 6,
                        'id_origem' => $numVendaCaixa,
                        'tipo_movimento' => 2,
                        'especie_movimento' => 5,
                        'quant_movimentada' => $quantPro,
                        'custo_mat' => $quantPro * $valUnit,
                        'valor_movimento' => $quantPro * $valUnit,
                        'usuario' => getDadosUsuarioLogado()['email'],
                    ];
                    $this->estoque->insertMovimentoEstoque($dadosEstoque);

                }
            }
        }

        // Salvar registro de venda
        $dados = [            
            'status' => $status,
        ];
        $this->venda->updateVendaCaixa($numVendaCaixa, $dados);

        $this->session->set_flashdata('sucesso', 'Venda realizada com sucesso');

        if($status == 1)
            redirect(base_url("vendas/frente-caixa/editar-venda-caixa/{$numVendaCaixa}"), "home", "refresh");
        else
            redirect(base_url("vendas/frente-caixa/{$dataVenda}"), "home", "refresh");
    }

    public function salvarVendaCaixa(){
        $numVendaCaixa = $this->uri->segment(4);

        $vendaCaixa = $this->venda->getVendaCaixaPorCodigo($numVendaCaixa);

        $status = $this->input->post('Opcao');

        if($status == 3){

            if($vendaCaixa->status == 2){

                $listaProdutoVendaCaixa = $this->venda->getProdutoPorVendaCaixa($vendaCaixa->num_venda_caixa);
                foreach($listaProdutoVendaCaixa as $key_venda_caixa => $vendaProduto) {

                    if($vendaProduto->tipo_controle != 3){

                        // Estorna estoque do produto vendido
                        $dados = null;
                        $dados = [
                            'id_empresa' => getDadosUsuarioLogado()['id_empresa'],
                            'data_movimento' => $vendaCaixa->data_caixa,
                            'cod_produto' => $vendaProduto->cod_produto,
                            'cod_lote' => $vendaProduto->cod_lote,
                            'origem_movimento' => 6,
                            'id_origem' => $vendaCaixa->num_venda_caixa,
                            'tipo_movimento' => 1,
                            'especie_movimento' => 9,
                            'quant_movimentada' => $vendaProduto->quant_venda,
                            'valor_movimento' => $vendaProduto->quant_venda * $vendaProduto->valor_unit,
                            'usuario' => getDadosUsuarioLogado()['email'],
                        ];
                        $this->estoque->insertMovimentoEstoque($dados);
                    }
                }
            }

            $dados = [
                'status' => 1,
            ];
            $this->venda->updateVendaCaixa($numVendaCaixa, $dados);

            $this->session->set_flashdata('sucesso', 'Venda reaberta com sucesso');
            redirect(base_url("vendas/frente-caixa/editar-venda-caixa/{$vendaCaixa->num_venda_caixa}"), "home", "refresh");

        }

        $codProduto = $this->input->post('codProduto[]');
        $codLote = $this->input->post('codLote[]');
        $quantProduto = $this->input->post('quantProduto[]');
        $valorUnitProdutos = $this->input->post('valorUnitProduto[]');

        $codMetodoPagamento = $this->input->post('codMetodoPagamento[]');
        $valorFormaPagamento = $this->input->post('valorFormaPagamento[]');

        // Salvar registro de venda
        $dados = [
            'id_empresa'  => getDadosUsuarioLogado()['id_empresa'],
            'cod_cliente' => $this->input->post('CodCliente'),
            'tipo_pessoa' => $this->input->post('TipoPessoa'),
            'cod_cliente' => $this->input->post('CodCliente'),
            'cod_transportador' => $this->input->post('CodTransportador'),
            'tipo_pessoa' => $this->input->post('TipoPessoa'),
            'cnpj_cpf' => $this->input->post('CnpjCpf'),
            'valor_bruto' => str_replace(",",".",(str_replace(".","",$this->input->post('SubTotal')))),
            'tipo_desconto' => $this->input->post('TipoDesconto'),
            'valor_frete' => str_replace(",",".",(str_replace(".","",$this->input->post('ValorFrete')))),
            'valor_desconto' => str_replace(",",".",(str_replace(".","",$this->input->post('ValorDesconto')))),
            'indicador_presenca' => str_replace(",",".",(str_replace(".","",$this->input->post('indicadorPresencial')))),
        ];
        $this->venda->updateVendaCaixa($numVendaCaixa, $dados);

        $this->venda->deleteProdutoVendaCaixa($numVendaCaixa);
        $this->venda->deleteFormaPagamento($numVendaCaixa);

        //Grava itens do pedido
        for ($i = 0; $i < count($codProduto); $i++) {

            $dadosProd[] = (object)[
                'num_venda_caixa' => $vendaCaixa->num_venda_caixa,
                'cod_produto' => $codProduto[$i],
                'cod_lote' => $codLote[$i],
                'quant_venda' => str_replace(",",".",(str_replace(".","",$quantProduto[$i]))),
                'valor_unit' => str_replace(",",".",(str_replace(".","",$valorUnitProdutos[$i]))),
            ];
        } 
        $this->venda->inserirProdutosCaixa($dadosProd);   
        
        // Gravar formas de pagamento
        for ($i = 0; $i < count($codMetodoPagamento); $i++) {

            $dadosForma[] = (object)[
                'num_venda_caixa' => $vendaCaixa->num_venda_caixa,
                'cod_metodo_pagamento' => $codMetodoPagamento[$i],
                'valor_pagamento' => str_replace(",",".",(str_replace(".","",$valorFormaPagamento[$i]))),
            ];

        }
        $this->venda->inserirFormaPagamentoCaixa($dadosForma);

        if($status == 2){

            // Valida disponibilidade de estoque
            for ($i = 0; $i < count($codProduto); $i++) {
                $quantPro = str_replace(",",".",(str_replace(".","",$quantProduto[$i])));

                $produto = $this->produto->getProdutoPorCodigo($codProduto[$i]);
                if($produto->saldo_negativo == 0 && $produto->quant_estoq < $quantPro){                    

                    $this->session->set_flashdata('erro', 'Produto <strong>(' . $produto->cod_produto . ') ' . $produto->nome_produto . '</strong> sem estoque suficiente para venda');
                    redirect(base_url("vendas/frente-caixa/editar-venda-caixa/{$numVendaCaixa}"), "home", "refresh");

                }
            }

            for ($i = 0; $i < count($codProduto); $i++) {                

                $quantPro = str_replace(",",".",(str_replace(".","",$quantProduto[$i])));
                $valUnit = str_replace(",",".",(str_replace(".","",$valorUnitProdutos[$i])));

                $produto = $this->produto->getProdutoPorCodigo($codProduto[$i]);

                if($produto->tipo_controle != 3){

                    // Movimenta estoque
                    $dadosEstoque = null;
                    $dadosEstoque = [
                        'id_empresa' => getDadosUsuarioLogado()['id_empresa'],
                        'data_movimento' => $vendaCaixa->data_caixa,
                        'cod_produto' => $codProduto[$i],
                        'cod_lote' => $codLote[$i],
                        'origem_movimento' => 6,
                        'id_origem' => $numVendaCaixa,
                        'tipo_movimento' => 2,
                        'especie_movimento' => 5,
                        'quant_movimentada' => $quantPro,
                        'custo_mat' => $quantPro * $valUnit,
                        'valor_movimento' => $quantPro * $valUnit,
                        'usuario' => getDadosUsuarioLogado()['email'],
                    ];
                    $this->estoque->insertMovimentoEstoque($dadosEstoque);
                }

            }

        } 

        $dados = [            
            'status' => $status,
        ];
        $this->venda->updateVendaCaixa($numVendaCaixa, $dados);

        $this->session->set_flashdata('sucesso', 'Venda realizada com sucesso');
        if($status == 1)
            redirect(base_url("vendas/frente-caixa/editar-venda-caixa/{$vendaCaixa->num_venda_caixa}"), "home", "refresh");
        else
            redirect(base_url("vendas/frente-caixa/{$vendaCaixa->data_caixa}"), "home", "refresh");

    }

    public function estornoVendaCaixa(){

        $data = $this->uri->segment(4);

        $numVendaCaixa = $this->input->post("selecionar_vendas");

        foreach($numVendaCaixa as $venda){

            $vendaCaixa = $this->venda->getVendaCaixaPorCodigo($venda);
            if($vendaCaixa->status == 2){

                $listaProdutoVendaCaixa = $this->venda->getProdutoPorVendaCaixa($vendaCaixa->num_venda_caixa);
                foreach($listaProdutoVendaCaixa as $key_venda_caixa => $vendaProduto) {


                    if($vendaProduto->tipo_controle != 3){
                        // Estorna estoque do produto vendido
                        $dados = null;
                        $dados = [
                            'id_empresa' => getDadosUsuarioLogado()['id_empresa'],
                            'data_movimento' => $vendaCaixa->data_caixa,
                            'cod_produto' => $vendaProduto->cod_produto,
                            'cod_lote' => $vendaProduto->cod_lote,
                            'origem_movimento' => 6,
                            'id_origem' => $vendaCaixa->num_venda_caixa,
                            'tipo_movimento' => 1,
                            'especie_movimento' => 9,
                            'quant_movimentada' => $vendaProduto->quant_venda,
                            'valor_movimento' => $vendaProduto->quant_venda * $vendaProduto->valor_unit,
                            'usuario' => getDadosUsuarioLogado()['email'],
                        ];
                        $this->estoque->insertMovimentoEstoque($dados);
                    }
                }
            }

            // Salvar registro de venda
            $dados = null;
            $dados = [
                'status' => 3,
            ];
            $this->venda->updateVendaCaixa($vendaCaixa->num_venda_caixa, $dados);
        }



        $this->session->set_flashdata('sucesso', 'Estorno realizado com sucesso');
        redirect(base_url("vendas/frente-caixa/{$data}"), "home", "refresh");
    }

    public function editarPedidoVenda($numPedidoVenda){

        $listaPedidoVenda = $this->venda->getPedidoVendaPorCodigo($numPedidoVenda);
        $listaVendedor = $this->vendedor->getVendedor();
        $listaTransportador = $this->transportador->getTransportador();
        $listaProdVenda = $this->venda->getProdutoPorPedido($numPedidoVenda);
        $listaProduto = $this->produto->getProdutoVenda($listaProdVenda);
        //$listaCalculoNecessidade = $this->estoque->getNecessidadePorPedidoVenda($numPedidoVenda);
        //$listaOrdemProducao = $this->estoque->getProdutoOrdemProducao(@$listaCalculoNecessidade->cod_calculo_necessidade);
        //$listaOrdemCompra = $this->estoque->getProdutoOrdemCompra(@$listaCalculoNecessidade->cod_calculo_necessidade);

        if($listaPedidoVenda == null){
            redirect(base_url('vendas/pedido-venda'));

        }else{

            $dados = array(
                'pedido' => $listaPedidoVenda,
                'lista_vendedor' => $listaVendedor,
                'lista_transportador' => $listaTransportador,
                'lista_produto_venda' => $listaProdVenda,
                'lista_produto' => $listaProduto,
                //'necessidade' => $listaCalculoNecessidade,
                //'lista_ordem_producao' => $listaOrdemProducao,
                //'lista_ordem_compra' => $listaOrdemCompra,
                'menu' => 'Vendas'
            );

            $this->load->view('vendas/editar-pedido-venda', $dados);
        }
    }

    public function dadosVendaCliente($codCliente){

        $listaCliente = $this->cliente->getClientePorCodigo($codCliente);
        $listaValores = $this->venda->getValVendaClienteporCodigo($codCliente);
        $listaPedido = $this->venda->getPedidoVendaPorCliente($codCliente);

        $dados = array(
            'cliente' => $listaCliente,
            'valores' => $listaValores,
            'pedido_venda' => $listaPedido,
            'menu' => 'Vendas',

        );                  
        $this->load->view('vendas/dados-venda-cliente', $dados);

    }

    public function editFaturamentoPedido($numPedidoVenda){        

        $listaEmpresa = $this->empresa->getEmpresaPorCodigo(getDadosUsuarioLogado()['id_empresa']);
        $listaPedido = $this->venda->getPedidoVendaAprovPorCodigo($numPedidoVenda);        
        $listaCliente = $this->cliente->getClientePorCodigo($listaPedido->cod_cliente);
        $listaFaturamento = $this->venda->getFaturamentosPorPedido($numPedidoVenda);
        $listaProdutosPedido = $this->venda->getProdutoPorPedido($numPedidoVenda);
        $listaLotesProdutoVenda = $this->venda->getLotesPorProdutoVenda($listaProdutosPedido);
        $listaProdutoFaturado = $this->venda->getProdutoFaturadoPorPedido($numPedidoVenda);
        $listaTitulosPedido = $this->financeiro->getTitulosPorPedidoVenda($numPedidoVenda);
        $listaMetodoPagamento = $this->financeiro->getMetodoPagamentoFat();
        $listaContaContabil = $this->financeiro->getContaContabilAtivoFat();
        $listaCentroCusto = $this->financeiro->getCentroCustoAtivo();
        $listaCidade = $this->tabelasauxiliares->getCidade();
        $listaNCM = $this->produto->getNCM();
        $listaEvento = $this->faturamentoNotaFiscal->getEventosNFporPedido($numPedidoVenda);

        $somaStatus = $this->venda->somaStatus($listaPedido->num_pedido_venda);
        $numsProduto = $this->venda->getCountProduto($listaPedido->num_pedido_venda);

        $status = 1;
        if($numsProduto == 0){
            $status = 1;
        }elseif(($somaStatus / $numsProduto) == 1){
            $status = 1;
        }elseif(($somaStatus / $numsProduto) == 3){
            $status = 3;
        }elseif(($somaStatus / $numsProduto) == 4){
            $status = 4;
        }else{
            $status = 2;
        }

        if($listaPedido == null){
            redirect(base_url('vendas/atendimento-pedido'));

        }else{
            $this->load->library('CommonNFe');
            //$this->load->library('ToolsNFe', ['id' => 290]);
            //$situacao = $this->toolsnfe->consultaChaveChave("41221214959355000117550040000000191221200915");

            $dados = array(
                'empresa' => $listaEmpresa,
                'pedido' => $listaPedido,
                'cliente' => $listaCliente,
                'lista_faturamento' => $listaFaturamento,
                'lista_produto' => $listaProdutosPedido,
                'lista_lote_produto' => $listaLotesProdutoVenda,
                'lista_faturamento_produto' => $listaProdutoFaturado,
                'lista_faturamento_titulo' => $listaTitulosPedido,
                'lista_centro_custo' => $listaCentroCusto,
                'lista_metodo_pagamento' => $listaMetodoPagamento,
                'lista_conta_contabil' => $listaContaContabil,
                'lista_centro_custo' => $listaCentroCusto,
                'lista_cidade' => $listaCidade,
                'lista_ncm' => $listaNCM,
                'lista_evento' => $listaEvento,
                'status' => $status,
                'menu' => 'Vendas',
                'baseNFeDir'=> base_url($this->commonnfe->aprDir)

            );                  
            $this->load->view('vendas/novo-faturamento-pedido', $dados);
        }

    }

    public function inserirFaturamento(){

        $numPedidoVenda = $this->uri->segment(4);
        $codCliente = $this->uri->segment(5);

        $this->form_validation->set_rules('DataFaturamento', 'Data de Faturamento', 'required|max_length[60]|callback_date_check',
            array('required' => 'Você deve preencher o campo %s'));

        if($this->form_validation->run() == false){

            $this->session->set_flashdata('erro', validation_errors());
            redirect(base_url("vendas/faturamento-pedido/novo-faturamento-pedido/{$numPedidoVenda}"), "home", "refresh");

        }else {

            $quantVendida = $this->input->post('quantVendida');
            $loteProduto = $this->input->post('loteVenda');
            $ValorVenda = $this->input->post('ValorVenda');

            $empresa = $this->empresa->getEmpresaPorCodigo(getDadosUsuarioLogado()['id_empresa']);
            $cliente = $this->cliente->getClientePorCodigo($codCliente);

            $pedido = $this->venda->getPedidoVendaPorCodigo($numPedidoVenda);
            
            // Valida saldo em estoque
            $lista_produto_venda = $this->venda->getProdutoPorPedido($numPedidoVenda);
            foreach($lista_produto_venda as $key_produto_venda => $produto) {

                if($produto->tipo_controle == 3)
                    continue;

                $quan_vendida = floatval(str_replace(",",".",(str_replace(".","",$quantVendida[$produto->seq_produto_venda]))));

                if($produto->saldo_negativo == 0 && $produto->quant_estoq < $quan_vendida){
                    $this->session->set_flashdata('erro', 'Produto <strong>(' . $produto->cod_produto . ') ' . $produto->nome_produto . '</strong> sem estoque suficiente para venda');
                    redirect(base_url("vendas/faturamento-pedido/novo-faturamento-pedido/{$numPedidoVenda}"), "home", "refresh");
                }
            }

            $valor_desconto = floatval(str_replace(",",".",(str_replace(".","",$this->input->post('ValorDesconto')))));

            // Cria registro de faturamento
            $data = [
                'num_pedido_venda'  => $numPedidoVenda,
                'data_faturamento' => date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataFaturamento')))),
                'serie' => $this->input->post('Serie'),
                'nota_fiscal' => $this->input->post('NotaFiscal'),
                'valor_bruto' => str_replace(",",".",(str_replace(".","",$this->input->post('ValorBruto')))),
                'valor_desconto' => str_replace(",",".",(str_replace(".","",$this->input->post('ValorDesconto')))),
                'cod_transportador' => $pedido->cod_transportador,
                'tipo_frete' => $pedido->tipo_frete,
                'valor_frete' => str_replace(",",".",(str_replace(".","",$this->input->post('ValorFrete')))),
                'valor_seguro' => str_replace(",",".",(str_replace(".","",$this->input->post('Seguro')))),
                'outras_despesas' => str_replace(",",".",(str_replace(".","",$this->input->post('OutrasDespesas')))),
                'cod_vendedor' => $pedido->cod_vendedor,
                'perc_comissao' => $pedido->perc_comissao,
                'observacoes' => $this->input->post('ObservFatur'),
                'usuario' => getDadosUsuarioLogado()['email'],
            ];
            $codFaturamentoPedido = $this->venda->insertFaturamento($data);                           

            $total_venda = 0;
            foreach($lista_produto_venda as $key_produto_venda => $produto) {

                $quan_vendida = floatval(str_replace(",",".",(str_replace(".","",$quantVendida[$produto->seq_produto_venda]))));
                $valor_venda = $quan_vendida * $produto->valor_unitario;
                $total_venda = $total_venda + $valor_venda;

                $loteVenda = null;
                if(@$loteProduto[$produto->seq_produto_venda] != null)
                    $loteVenda = $loteProduto[$produto->seq_produto_venda];

                // Movimenta estoque
                if($produto->tipo_controle != 3){
                    $dadosEstoque = null;
                    $dadosEstoque = [
                        'id_empresa' => getDadosUsuarioLogado()['id_empresa'],
                        'data_movimento' => date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataFaturamento')))),
                        'cod_produto' => $produto->cod_produto,
                        'cod_lote' => $loteVenda,
                        'origem_movimento' => 3,
                        'id_origem' => $codFaturamentoPedido,
                        'tipo_movimento' => 2,
                        'especie_movimento' => 5,
                        'quant_movimentada' => $quan_vendida,
                        'custo_mat' => $valor_venda,
                        'valor_movimento' => $valor_venda,
                        'usuario' => getDadosUsuarioLogado()['email'],
                    ];
                    $this->estoque->insertMovimentoEstoque($dadosEstoque);
                }

                $produtoVenda = $this->venda->getProdutoVendaPorCodigo($numPedidoVenda, $produto->cod_produto);

                if($produtoVenda->quant_atendida > 0){
                    if(($produtoVenda->quant_atendida + $quan_vendida) >= $produtoVenda->quant_pedida) {
                        $status = 3;
                    }else{
                        $status = 2;
                    }
                }else{
                    if($quan_vendida >= $produtoVenda->quant_pedida) {
                        $status = 3;
                    }else{
                        $status = 2;
                    }
                }

                $dados = [
                    'quant_atendida' => $produtoVenda->quant_atendida + $quan_vendida,
                    'status' => $status
                ];

                $this->venda->updateProdutoVenda($produto->seq_produto_venda, $dados);

                //@todo !!!Regra criada para atender ao faturamento de itens conforme detalhado em conversa workana dia 02-03/06/2022!!!
                //Caso quantidade seja inferior ou igual a 0 não deve inserir itemno faturamento
                //@todo Criar regra para remover do banco itens que o faturamento foi estornado?
                if ($quan_vendida <= 0) {
                    continue;
                }
                $itensFaturados = [
                    'faturamento_pedido' => $codFaturamentoPedido,
                    'cod_produto' => $produto->cod_produto,
                    'cod_lote' => $loteVenda,
                    'quantidade' => $quan_vendida,
                    'valor_unitario' => $produto->valor_unitario,
                    'custo_medio' => $produto->custo_medio,
                    'preco_venda' => $produto->preco_venda
                ];
                $this->venda->inserirProdutoVendaFaturamento($itensFaturados);
            }

            // Criação de título
            $numParcela = $this->input->post('Parcelas');
            $dataVencimento = $this->input->post('DataVencimento');
            $valorParcela = $this->input->post('ValorParcela');
            $metodoPagamento = $this->input->post('CodMetodoPagamento');            

            $valorTotal = $total_venda - $valor_desconto;

            for ($i = 1; $i <= $numParcela; $i++) {

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
                    'cod_emitente' => $codCliente,
                    'cod_vendedor' => $pedido->cod_vendedor,
                    'tipo_movimento' => 1,
                    'data_competencia' => date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataFaturamento')))),
                    'data_vencimento' => date("Y-m-d", strtotime(str_replace('/', '-', $dataVencimento[$i]))),
                    'parcela' => $i . '/' . $numParcela,
                    'desc_movimento' => "Pedido de Venda: " . $numPedidoVenda . ", " . "Faturamento: " . $codFaturamentoPedido,
                    'valor_titulo' => floatval(str_replace(",",".",(str_replace(".","",$valorParcela[$i])))),
                    'origem_movimento' => 3,
                    'id_origem' => $codFaturamentoPedido,
                    'confirmado' => 0,
                    'usuario_criacao' => getDadosUsuarioLogado()['email'],
                ];

                $this->financeiro->insertMovimentoConta($dadosMovimento);
            }
        }

        $this->session->set_flashdata('sucesso', 'Faturamento realizado com sucesso');
        redirect(base_url("vendas/faturamento-pedido/novo-faturamento-pedido/{$numPedidoVenda}"), "home", "refresh");

    }

    public function painelClientes(){
        

        $carteiraCliente = $this->venda->getCarteiraCliente();
        // Cálculo do total
        $carteiraCliente->total_cliente = $carteiraCliente->num_clientes_ativos + $carteiraCliente->num_clientes_inativos_recentes + 
                                          $carteiraCliente->num_clientes_inativos + $carteiraCliente->num_clientes_sem_compra;
        // Definição de eprcentual
        $carteiraCliente->perc_clientes_ativo = ($carteiraCliente->num_clientes_ativos / $carteiraCliente->total_cliente) * 100;
        $carteiraCliente->perc_clientes_inativos_recentes = ($carteiraCliente->num_clientes_inativos_recentes / $carteiraCliente->total_cliente) * 100;
        $carteiraCliente->perc_clientes_inativos = ($carteiraCliente->num_clientes_inativos / $carteiraCliente->total_cliente) * 100;
        $carteiraCliente->perc_clientes_sem_compra = ($carteiraCliente->num_clientes_sem_compra / $carteiraCliente->total_cliente) * 100;

        $clientesAtivos = $this->venda->getClientesAtivos();
        $clientesInativosRecentes = $this->venda->getClientesInativosRecentes();
        $clientesInativos = $this->venda->getClientesInativos();
        $clientesSemCompra = $this->venda->getClientesSemCompra();
        

        $dados = array(
            'carteira_cliente' => $carteiraCliente,
            'clientes_ativos' => $clientesAtivos,
            'clientes_inativos_recentes' => $clientesInativosRecentes,
            'clientes_inativos' => $clientesInativos,
            'clientes_sem_compra' => $clientesSemCompra,
            'menu' => 'Vendas',

        );

        $this->load->view('vendas/painel-cliente', $dados);

    }

    public function detalheCliente($codCliente){

        $empresa = $this->empresa->getEmpresaPorCodigo(getDadosUsuarioLogado()['id_empresa']);

        $dataInicio1 = "";
        $dataInicio2 = "";
        $dataInicio3 = "";
        $dataFim = "";
               
        if($dataInicio1 == ""){
            $dataInicio1 = date('Y-m-d', strtotime('-' . $empresa->clientes_ativos . ' days'));
        }

        if($dataInicio2 == ""){
            $dataInicio2 = date('Y-m-d', strtotime('-' . $empresa->clientes_inativos_recentes . ' days'));
        }

        if($dataInicio3 == ""){
            $dataInicio3 = date('0001-01-01');
        }

        if($dataFim == ""){
            $dataFim = date('Y-m-d');
        }
        
        $cliente = $this->cliente->getClientePorCodigo($codCliente);
        $dadosVendas = $this->venda->getUltimaVenda($codCliente);
        $notas = $this->cliente->getNotasPorCliente($codCliente);
        $pedidoVenda = $this->venda->getPedidoVendaPorCliente($codCliente);
        $produtoVenda = $this->venda->getProdutoPorCliente($codCliente);
        $titulo = $this->financeiro->getTitulosPorCliente($codCliente);

        if($dadosVendas != null){
            $data_inicio = new DateTime($dadosVendas->data_venda);
            $data_fim = new DateTime(date('Y-m-d'));

            $dateInterval = $data_inicio->diff($data_fim);
        }else{
            $dateInterval = null;           
        }

        $listaValores1 = $this->venda->getValoresVendas($dataInicio1, $dataFim, $codCliente);
        $listaCount1 = $this->venda->getCountVendas($dataInicio1, $dataFim, $codCliente);
        $listaProduto1 = $this->venda->getVendasProduto($dataInicio1, $dataFim, $codCliente);
        $listaValores2 = $this->venda->getValoresVendas($dataInicio2, $dataFim, $codCliente);
        $listaCount2 = $this->venda->getCountVendas($dataInicio2, $dataFim, $codCliente);
        $listaProduto2 = $this->venda->getVendasProduto($dataInicio2, $dataFim, $codCliente);
        $listaValores3 = $this->venda->getValoresVendas($dataInicio3, $dataFim, $codCliente);
        $listaCount3 = $this->venda->getCountVendas($dataInicio3, $dataFim, $codCliente);
        $listaProduto3 = $this->venda->getVendasProduto($dataInicio3, $dataFim, $codCliente);

        // Dados primeiro filtro
        $i = 0; 
        $color1 = "";
        $labelProduto1 = array();   
        $percProduto1 = array(); 
        $colorProduto1 = array(); 
        foreach($listaProduto1 as $venda_produto){

            if($i == 10) continue;

            $i += 1;

            $color1 = $this->random_color($color1);

            $labelProduto1[] = $venda_produto->nome_produto;
            $percProduto1[] = ($venda_produto->valor_total / $listaValores1->total_produto) * 100;
            $colorProduto1[] = $color1;

            $venda_produto->color = $color1;

        }

        // Dados sefunso filtro
        $i = 0; 
        $color2 = "";
        $labelProduto2 = array();   
        $percProduto2 = array(); 
        $colorProduto2 = array(); 
        foreach($listaProduto2 as $venda_produto){

            if($i == 10) continue;

            $i += 1;

            $color2 = $this->random_color($color2);

            $labelProduto2[] = $venda_produto->nome_produto;
            $percProduto2[] = ($venda_produto->valor_total / $listaValores2->total_produto) * 100;
            $colorProduto2[] = $color2;

            $venda_produto->color = $color2;

        }

        // Dados sefunso filtro
        $i = 0; 
        $color3 = "";
        $labelProduto3 = array();   
        $percProduto3 = array(); 
        $colorProduto3 = array(); 
        foreach($listaProduto3 as $venda_produto){

            if($i == 10) continue;

            $i += 1;

            $color3 = $this->random_color($color3);

            $labelProduto3[] = $venda_produto->nome_produto;
            $percProduto3[] = ($venda_produto->valor_total / $listaValores3->total_produto) * 100;
            $colorProduto3[] = $color3;

            $venda_produto->color = $color3;

        }

        $dados = array(
            'empresa' => $empresa,
            'cliente' => $cliente,
            'dados_venda' => $dadosVendas,
            'notas' => $notas,
            'pedido_venda' => $pedidoVenda,
            'produto_venda' => $produtoVenda,
            'lista_titulo' => $titulo,

            'lista_valores1' => $listaValores1,
            'lista_count1' => $listaCount1,
            'lista_produto1' => $listaProduto1,
            'label_produto1' => $labelProduto1,
            'perc_produto1' => $percProduto1,
            'color_produto1' => $colorProduto1,

            'lista_valores2' => $listaValores2,
            'lista_count2' => $listaCount2,
            'lista_produto2' => $listaProduto2,
            'label_produto2' => $labelProduto2,
            'perc_produto2' => $percProduto2,
            'color_produto2' => $colorProduto2,

            'lista_valores3' => $listaValores3,
            'lista_count3' => $listaCount3,
            'lista_produto3' => $listaProduto3,
            'label_produto3' => $labelProduto3,
            'perc_produto3' => $percProduto3,
            'color_produto3' => $colorProduto3,

            'menu' => 'Vendas'
        );

        $this->load->view('vendas/detalhe-cliente', $dados);

    }

    public function detalheVendedor($codVendedor){

        $empresa = $this->empresa->getEmpresaPorCodigo(getDadosUsuarioLogado()['id_empresa']);

        $dataInicio1 = "";
        $dataInicio2 = "";
        $dataInicio3 = "";
        $dataFim = "";
               
        if($dataInicio1 == ""){
            $dataInicio1 = date('Y-m-d', strtotime('-' . $empresa->clientes_ativos . ' days'));
        }

        if($dataInicio2 == ""){
            $dataInicio2 = date('Y-m-d', strtotime('-' . $empresa->clientes_inativos_recentes . ' days'));
        }

        if($dataInicio3 == ""){
            $dataInicio3 = date('0001-01-01');
        }

        if($dataFim == ""){
            $dataFim = date('Y-m-d');
        }
        
        $vendedor = $this->vendedor->getVendedorPorCodigo($codVendedor);
        $pedidoVenda = $this->venda->getPedidoVendaPorVendedorDetalhes($codVendedor);
        $notas = $this->vendedor->getNotasPorVendedor($codVendedor);      
        $produtoVenda = $this->venda->getProdutoPorVendedor($codVendedor);
        $listaCliente = $this->cliente->getCliente();

        $listaValores1 = $this->venda->getValoresVendas($dataInicio1, $dataFim, "", $codVendedor);
        $listaCount1 = $this->venda->getCountVendas($dataInicio1, $dataFim, "", $codVendedor);
        $listaProduto1 = $this->venda->getVendasProduto($dataInicio1, $dataFim, "", $codVendedor);
        $listaValores2 = $this->venda->getValoresVendas($dataInicio2, $dataFim, "", $codVendedor);
        $listaCount2 = $this->venda->getCountVendas($dataInicio2, $dataFim, "", $codVendedor);
        $listaProduto2 = $this->venda->getVendasProduto($dataInicio2, $dataFim, "", $codVendedor);
        $listaValores3 = $this->venda->getValoresVendas($dataInicio3, $dataFim, "", $codVendedor);
        $listaCount3 = $this->venda->getCountVendas($dataInicio3, $dataFim, "", $codVendedor);
        $listaProduto3 = $this->venda->getVendasProduto($dataInicio3, $dataFim, "", $codVendedor);

        // Dados primeiro filtro
        $i = 0; 
        $color1 = "";
        $labelProduto1 = array();   
        $percProduto1 = array(); 
        $colorProduto1 = array(); 
        foreach($listaProduto1 as $venda_produto){

            if($i == 10) continue;

            $i += 1;

            $color1 = $this->random_color($color1);

            $labelProduto1[] = $venda_produto->nome_produto;
            $percProduto1[] = ($venda_produto->valor_total / $listaValores1->total_produto) * 100;
            $colorProduto1[] = $color1;

            $venda_produto->color = $color1;

        }

        // Dados sefunso filtro
        $i = 0; 
        $color2 = "";
        $labelProduto2 = array();   
        $percProduto2 = array(); 
        $colorProduto2 = array(); 
        foreach($listaProduto2 as $venda_produto){

            if($i == 10) continue;

            $i += 1;

            $color2 = $this->random_color($color2);

            $labelProduto2[] = $venda_produto->nome_produto;
            $percProduto2[] = ($venda_produto->valor_total / $listaValores2->total_produto) * 100;
            $colorProduto2[] = $color2;

            $venda_produto->color = $color2;

        }

        // Dados sefunso filtro
        $i = 0; 
        $color3 = "";
        $labelProduto3 = array();   
        $percProduto3 = array(); 
        $colorProduto3 = array(); 
        foreach($listaProduto3 as $venda_produto){

            if($i == 10) continue;

            $i += 1;

            $color3 = $this->random_color($color3);

            $labelProduto3[] = $venda_produto->nome_produto;
            $percProduto3[] = ($venda_produto->valor_total / $listaValores3->total_produto) * 100;
            $colorProduto3[] = $color3;

            $venda_produto->color = $color3;

        }

        $dados = array(
            'empresa' => $empresa,
            'vendedor' => $vendedor,
            'notas' => $notas,
            'pedido_venda' => $pedidoVenda,
            'produto_venda' => $produtoVenda,
            'lista_cliente' => $listaCliente,

            'lista_valores1' => $listaValores1,
            'lista_count1' => $listaCount1,
            'lista_produto1' => $listaProduto1,
            'label_produto1' => $labelProduto1,
            'perc_produto1' => $percProduto1,
            'color_produto1' => $colorProduto1,

            'lista_valores2' => $listaValores2,
            'lista_count2' => $listaCount2,
            'lista_produto2' => $listaProduto2,
            'label_produto2' => $labelProduto2,
            'perc_produto2' => $percProduto2,
            'color_produto2' => $colorProduto2,

            'lista_valores3' => $listaValores3,
            'lista_count3' => $listaCount3,
            'lista_produto3' => $listaProduto3,
            'label_produto3' => $labelProduto3,
            'perc_produto3' => $percProduto3,
            'color_produto3' => $colorProduto3,

            'menu' => 'Vendas'
        );

        $this->load->view('vendas/detalhe-vendedor', $dados);

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
                'cod_vendedor'  => $this->input->post('CodVendedor'),
                'perc_comissao' => str_replace(",",".",(str_replace(".","",$this->input->post('PerComissao')))),
                'data_emissao' => date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataEmissao')))),
                'data_entrega' => date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataEntrega')))),
                'situacao' => $this->input->post('Situacao'),
                'observacoes' => $this->input->post('ObsPedidoVenda'),
                'cod_transportador'  => $this->input->post('CodTransportador'),
                'tipo_desconto' => $this->input->post('TipoDesconto'),
                'valor_desconto' => str_replace(",",".",(str_replace(".","",$this->input->post('Desconto')))),
                'valor_seguro' => str_replace(",",".",(str_replace(".","",$this->input->post('Seguro')))),
                'outras_despesas' => str_replace(",",".",(str_replace(".","",$this->input->post('OutrasDespesas')))),
                'tipo_frete' => $this->input->post('TipoFrete'),
                'valor_frete' => str_replace(",",".",(str_replace(".","",$this->input->post('Frete')))),
                'usuario_erp' => getDadosUsuarioLogado()['email'],
            ];

            $codPedidoVenda = $this->venda->insertPedidoVenda($dados);

            $this->session->set_flashdata('sucesso', 'Pedido de venda cadastrado com sucesso');
            redirect(base_url("vendas/pedido-venda/editar-pedido-venda/{$codPedidoVenda}"), "home", "refresh");

        }
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
            redirect(base_url("vendas/pedido-venda/editar-pedido-venda/{$numPedidoVenda}"), "home", "refresh");

        }else{

            $dados = [
                'num_pedido_venda' => $numPedidoVenda,
                'cod_produto'  => $this->input->post('CodProduto'),
                'quant_pedida' => str_replace(",",".",(str_replace(".","",$this->input->post('QuantPedida')))),
                'valor_unitario' => str_replace(",",".",(str_replace(".","",$this->input->post('ValorUnitario'))))
            ];

            $this->venda->insertProdutoVenda($dados);
            $this->session->set_flashdata('sucesso', 'Produto de venda inserido com sucesso');
            redirect(base_url("vendas/pedido-venda/editar-pedido-venda/{$numPedidoVenda}"), "home", "refresh");

        }
    }

    public function inserirSaida(){
        $SeqProdutoVenda = $this->uri->segment(4);
        $codProduto = $this->uri->segment(5);

        //Validações dos campos
        $this->form_validation->set_rules('DataSaida', 'Data de Saída', 'required|callback_date_check',
            array('required' => 'Você deve preencher o campo %s'));
        $this->form_validation->set_rules('QuantSaida', 'Quantidade de Saída', 'required|callback_more_zero',
            array('required' => 'Você deve preencher o campo %s'));

        if($this->form_validation->run() == false){

            $this->session->set_flashdata('erro', validation_errors());
            redirect(base_url("vendas/atendimento-pedido/novo-atendimento-pedido/{$SeqProdutoVenda}"), "home", "refresh");

        }else {

            $quantSaida = str_replace(",",".",(str_replace(".","",$this->input->post('QuantSaida'))));

            $produto = $this->produto->getProdutoPorCodigo($codProduto);
            if($produto->saldo_negativo != 1 && $produto->quant_estoq < $quantSaida){
                $this->session->set_flashdata('erro', 'Produto sem saldo suficiente para saída');
                redirect(base_url("vendas/atendimento-pedido/novo-atendimento-pedido/{$SeqProdutoVenda}"), "home", "refresh");
            }

            $dados = [
                'seq_produto_venda'  => $SeqProdutoVenda,
                'data_saida' => date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataSaida')))),
                'quant_saida' => str_replace(",",".",(str_replace(".","",$this->input->post('QuantSaida')))),
                'serie' => $this->input->post('Serie'),
                'nota_fiscal' => $this->input->post('NotaFiscal'),
                'valor_venda' => str_replace(",",".",(str_replace(".","",$this->input->post('ValorVenda')))),
                'observacoes' => $this->input->post('Observacoes')
            ];

            $codMovimentoPV = $this->venda->insertMovimentos($dados);

            // Baixa estoque do produto vendido
            $dadosEstoque = [
                'id_empresa' => getDadosUsuarioLogado()['id_empresa'],
                'data_movimento' => date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataSaida')))),
                'cod_produto' => $codProduto,
                'origem_movimento' => 3,
                'id_origem' => $codMovimentoPV,
                'tipo_movimento' => 2,
                'especie_movimento' => 5,
                'custo_mat' => str_replace(",",".",(str_replace(".","",$this->input->post('QuantSaida')))),
                'quant_movimentada' => str_replace(",",".",(str_replace(".","",$this->input->post('QuantSaida')))),
                'usuario' => getDadosUsuarioLogado()['email'],
            ];

            $this->estoque->insertMovimentoEstoque($dadosEstoque);

            $this->session->set_flashdata('sucesso', 'Saída de material inserida com sucesso');
            redirect(base_url("vendas/atendimento-pedido/novo-atendimento-pedido/{$SeqProdutoVenda}"), "home", "refresh");

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
            redirect(base_url("vendas/pedido-venda/editar-pedido-venda/{$numPedidoVenda}"));

        }
    }

    public function excluirPedido(){

        $NumPedidoVenda = $this->input->post("excluir_todos");
        $numRegs = count($NumPedidoVenda);

        if($numRegs > 0){
            $this->venda->deleteProdutoVendaPorPedido($NumPedidoVenda);
            $this->venda->deletePedido($NumPedidoVenda);
            $this->session->set_flashdata('sucesso', 'Registro(s) selecionado(s) excluído(s)');
        }else {
            $this->session->set_flashdata('erro', 'Nenhum registro foi selecionado');
        }

        redirect(base_url('vendas/pedido-venda'));
    }

    public function excluirNota(){

        $codNota = $this->input->post("excluir_todos");
        $codCliente = $this->input->post("CodCliente");

        $this->venda->deleteNota($codNota);

        $this->session->set_flashdata('sucesso', 'Registro(s) selecionado(s) excluído(s)');
        redirect(base_url("painel/clientes/detalhe-cliente/{$codCliente}#atendimentos"), "home", "refresh");
    }

    public function excluirNotaVendedor($CodVendedor){

        $codNota = $this->input->post("excluir_todos");

        $this->venda->deleteNota($codNota);

        $this->session->set_flashdata('sucesso', 'Registro(s) selecionado(s) excluído(s)');
        redirect(base_url("painel/vendedores/detalhe-vendedor/{$CodVendedor}#atendimentos"), "home", "refresh");
    }

    public function excluirMovimentoCaixa(){

        $data = $this->uri->segment(4);

        $codMovimento = $this->input->post("selecionar_movimentos");

        foreach($codMovimento as $movimento){

            //print_r($movimento . '<br>');

            $titulo = $this->financeiro->getMovimentoPorOrigem(5, $movimento);
            //print_r($titulo->cod_movimento_conta . '<br>');
            if($titulo != null){

                // Desconfirmar título
                $dadosMovimento = null;
                $dadosMovimento = [
                    'cod_conta' => $titulo->cod_conta,
                    'data_confirmacao' => null,  
                    'valor_desc_taxa' => null,
                    'valor_juros_multa' => null,
                    'valor_confirmado' => null,
                    'confirmado' => 0
                ];
                $this->financeiro->updateMovimentoConta($titulo->cod_movimento_conta, $dadosMovimento);

                // Excluir título
                $this->financeiro->excluirTitulo($titulo->cod_movimento_conta);
            }            

        }

        $this->venda->deleteMovimentoCaixa($codMovimento);
        $this->session->set_flashdata('sucesso', 'Registro(s) selecionado(s) excluído(s)');

        redirect(base_url("vendas/frente-caixa/{$data}#incremento"), "home", "refresh");
    }

    public function excluirProdutoVenda(){

        $SeqProdutoVenda = $this->input->post("excluir_todos");
        $numRegs = count($SeqProdutoVenda);

        if($numRegs > 0){
            $this->venda->deleteProdutoVenda($SeqProdutoVenda);
            $this->session->set_flashdata('sucesso', 'Registro(s) selecionado(s) excluído(s)');
        }else{
            $this->session->set_flashdata('erro', 'Nenhum registro foi selecionado');
        }

        $NmPedidoVenda = $this->input->post('NumPedidoVenda');
        redirect(base_url("vendas/pedido-venda/editar-pedido-venda/{$NmPedidoVenda}"), "home", "refresh");
    }

    public function estornarFaturamentoPedido($numPedidoVenda){

        $codFaturamento = $this->input->post("estornar_todos");

        foreach($codFaturamento as $faturamento){

            $faturamentoPedido = $this->venda->getFaturamentoPorCodigo($faturamento);
            $movimentosFaturamento = $this->venda->getMovimentoPorFaturamento($faturamento);

            foreach($movimentosFaturamento as $key_movimentos => $movimentos_estoque){

                // Estorna estoque do produto vendido
                $dados = null;
                $dados = [
                    'id_empresa' => getDadosUsuarioLogado()['id_empresa'],
                    'data_movimento' => $movimentos_estoque->data_movimento,
                    'cod_produto' => $movimentos_estoque->cod_produto,
                    'cod_lote' => $movimentos_estoque->cod_lote,
                    'origem_movimento' => 3,
                    'id_origem' => $faturamento,
                    'tipo_movimento' => 1,
                    'especie_movimento' => 9,
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

                $produtoVenda = $this->venda->getProdutoVendaPorCodigo($numPedidoVenda, $movimentos_estoque->cod_produto);

                if(($produtoVenda->quant_atendida - $movimentos_estoque->quant_movimentada) >= $produtoVenda->quant_pedida) {
                    $status = 3;
                }elseif(($produtoVenda->quant_atendida - $movimentos_estoque->quant_movimentada) == 0){
                    $status = 4;
                }else{
                    $status = 2;
                }

                $dados = [
                    'quant_atendida' => $produtoVenda->quant_atendida - $movimentos_estoque->quant_movimentada,
                    'status' => $status
                ];
                $this->venda->updateProdutoVenda($produtoVenda->seq_produto_venda, $dados);
            }

            // Atualiza faturamento
            $dados = null;
            $dados = [
                'estornado' => '1'
            ];

            $this->venda->updateFaturamento($faturamento, $dados);

            //Exclui títulos não confirmados
            $this->financeiro->excluirTituloOrigem(3, $faturamento);
        }

        $this->session->set_flashdata('sucesso', 'Registro(s) selecionado(s) estornado(s) com sucesso');
        redirect(base_url("vendas/faturamento-pedido/novo-faturamento-pedido/{$numPedidoVenda}"), "home", "refresh");

    }

    public function estornarSaidaMaterial($seqProdutoVenda = null){

        $codMovimentoPV = $this->input->post("estornar_todos");
        $numRegs = count($codMovimentoPV);

        if($numRegs > 0){

            foreach($codMovimentoPV as $movimento){

                // Atualiza sequencia do item
                $movimentoSaida = $this->venda->getMovimentosPorCodigo($movimento);
                $produtoVenda = $this->venda->getProdutoVendaPorCodigo($movimentoSaida->seq_produto_venda);

                if(($produtoVenda->quant_atendida - $movimentoSaida->quant_saida) >= $produtoVenda->quant_pedida) {
                    $status = 3;
                }elseif(($produtoVenda->quant_atendida - $movimentoSaida->quant_saida) == 0){
                    $status = 1;
                }else{
                    $status = 2;
                }

                $dados = [
                    'quant_atendida' => $produtoVenda->quant_atendida - $movimentoSaida->quant_saida,
                    'status' => $status
                ];

                $this->venda->updateProdutoVenda($produtoVenda->seq_produto_venda, $dados);

                $dados = null;

                // Atualiza reporte de produção
                $dados = [
                    'estornado' => '1'
                ];

                $this->venda->updateMovimento($movimento, $dados);

                // Baixa estoque do produto vendido
                $dadosEstoque = [
                    'id_empresa' => getDadosUsuarioLogado()['id_empresa'],
                    'data_movimento' => $movimentoSaida->data_saida,
                    'cod_produto' => $produtoVenda->cod_produto,
                    'origem_movimento' => 3,
                    'id_origem' => $movimentoSaida->cod_movimento_pv,
                    'tipo_movimento' => 1,
                    'especie_movimento' => 9,
                    'quant_movimentada' => $movimentoSaida->quant_saida,
                    'usuario' => getDadosUsuarioLogado()['email'],
                ];

                $this->estoque->insertMovimentoEstoque($dadosEstoque);

            }

            $this->session->set_flashdata('sucesso', 'Registro(s) selecionado(s) estornado(s) com sucesso');

        }else{
            $this->session->set_flashdata('erro', 'Nenhum registro foi selecionado');
        }

        redirect(base_url("vendas/atendimento-pedido/novo-atendimento-pedido/{$seqProdutoVenda}"), "home", "refresh");

    }

    public function redirecionaPedidoVenda(){

        $mes = date('m');
        $ano = date('Y');

        redirect(base_url("vendas/pedido-venda/{$mes}/{$ano}"), "home", "refresh");

    }

    public function listarPedidoVenda(){

        $mes = $this->uri->segment(3);
        $ano = $this->uri->segment(4);

        $filter = ($this->input->get('buscar')) ? $this->input->get('buscar') : "";
        $clienteFiltro = $this->input->get('ClienteFiltro');
        $statusFiltro = $this->input->get('StatusFiltro');
        $vendedorFiltro = $this->input->get('VendedorFiltro');
        $transportadorFiltro = $this->input->get('TransportadorFiltro');

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

        $listaPedidoVenda = $this->venda->getPedidoVenda($dataInicio, $dataFim, $filter, $clienteFiltro, $vendedorFiltro, $transportadorFiltro, $statusFiltro);
        $listaConfirmado = $this->venda->getVendaConfirmada($dataInicio, $dataFim);
        $listaOrcamento = $this->venda->getVendaEmOrcamento($dataInicio, $dataFim);
        $listaReprovado = $this->venda->getVendaReprovado($dataInicio, $dataFim);
        $empresa = $this->empresa->getEmpresaPorCodigo(getDadosUsuarioLogado()['id_empresa']);

        //Dados de filtro
        $listaCliente = $this->cliente->getCliente();
        $listaVendedor = $this->vendedor->getVendedor();
        $listaTransportador = $this->transportador->getTransportador();

        $dados = array(
            'descMes' => $descMes,
            'mes' => $mes,
            'ano' => $ano,
            'clienteFiltro' => $clienteFiltro,
            'lista_cliente' => $listaCliente,
            'statusFiltro' => $statusFiltro,
            'vendedorFiltro' => $vendedorFiltro,
            'lista_vendedor' => $listaVendedor,
            'transportadorFiltro' => $transportadorFiltro,
            'lista_transportador' => $listaTransportador,
            'filter' => $filter,
            'mes_anterior' => $mesAnterior,
            'ano_anterior' => $anoAnterior,
            'mes_seguinte' => $mesSeguinte,
            'ano_seguinte' => $anoSeguinte,
            'empresa' => $empresa,
            'lista_pedido' => $listaPedidoVenda,
            'venda_confirmada' => $listaConfirmado,
            'venda_orcamento' => $listaOrcamento,
            'venda_reprovada' => $listaReprovado,
            'menu' => 'Vendas'
        );

        $this->load->view('vendas/pedido-venda', $dados);
    }

    public function redirecionaCalculoComissao(){

        $mes = date('m');
        $ano = date('Y');

        redirect(base_url("vendas/calculo-comissao/{$mes}/{$ano}"), "home", "refresh");

    }

    public function listarCalculoComissao(){

        $mes = $this->uri->segment(3);
        $ano = $this->uri->segment(4);

        $filter = ($this->input->get('buscar')) ? $this->input->get('buscar') : "";
        $clienteFiltro = $this->input->get('ClienteFiltro');
        $statusFiltro = $this->input->get('StatusFiltro');
        $vendedorFiltro = $this->input->get('VendedorFiltro');
        $transportadorFiltro = $this->input->get('TransportadorFiltro');

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

        $listaPedidoVenda = $this->venda->getPedidoVenda($dataInicio, $dataFim, $filter, $clienteFiltro, $vendedorFiltro, $transportadorFiltro, $statusFiltro);
        $listaConfirmado = $this->venda->getVendaConfirmada($dataInicio, $dataFim);
        $listaOrcamento = $this->venda->getVendaEmOrcamento($dataInicio, $dataFim);
        $listaReprovado = $this->venda->getVendaReprovado($dataInicio, $dataFim);
        $empresa = $this->empresa->getEmpresaPorCodigo(getDadosUsuarioLogado()['id_empresa']);

        //Dados de filtro
        $listaCliente = $this->cliente->getCliente();
        $listaVendedor = $this->vendedor->getVendedor();
        $listaTransportador = $this->transportador->getTransportador();

        //--
        $listaVendedor = $this->venda->getVendasVendedorMeta($dataInicio, $dataFim);

        $dados = array(
            'descMes' => $descMes,
            'mes' => $mes,
            'ano' => $ano,
            'clienteFiltro' => $clienteFiltro,
            'lista_cliente' => $listaCliente,
            'statusFiltro' => $statusFiltro,
            'vendedorFiltro' => $vendedorFiltro,
            'lista_vendedor' => $listaVendedor,
            'transportadorFiltro' => $transportadorFiltro,
            'lista_transportador' => $listaTransportador,
            'filter' => $filter,
            'mes_anterior' => $mesAnterior,
            'ano_anterior' => $anoAnterior,
            'mes_seguinte' => $mesSeguinte,
            'ano_seguinte' => $anoSeguinte,
            'empresa' => $empresa,
            'lista_pedido' => $listaPedidoVenda,
            'venda_confirmada' => $listaConfirmado,
            'venda_orcamento' => $listaOrcamento,
            'venda_reprovada' => $listaReprovado,
            //--Inicio
            'lista_vendedor' => $listaVendedor,
            //-Fim
            'menu' => 'Vendas'
        );

        $this->load->view('vendas/calculo-comissao', $dados);
    }

    public function redirecionaFaturamentoVenda(){

        $mes = date('m');
        $ano = date('Y');

        redirect(base_url("vendas/faturamento-pedido/{$mes}/{$ano}"), "home", "refresh");

    }

    public function listarFaturamentoVenda(){

        $mes = $this->uri->segment(3);
        $ano = $this->uri->segment(4);

        $filter = ($this->input->get('buscar')) ? $this->input->get('buscar') : "";
        $clienteFiltro = $this->input->get('ClienteFiltro');
        $vendedorFiltro = $this->input->get('VendedorFiltro');
        $transportadorFiltro = $this->input->get('TransportadorFiltro');

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

        $listaPedidoVenda = $this->venda->getPedidoVendaAprovado($dataInicio, $dataFim, $filter, $clienteFiltro, $vendedorFiltro, $transportadorFiltro);
        $listaStatus = $this->venda->defineStatusPedido($listaPedidoVenda);

        $aFaturar = 0;
        $faturado = 0;
        foreach($listaPedidoVenda as $key_pedido => $pedido) {
            $totalPedido = $pedido->valor_total_pedido + 
                           $pedido->valor_frete +
                           $pedido->valor_seguro +
                           $pedido->outras_despesas - 
                           $pedido->valor_desconto;
            if($pedido->valor_total_faturado < $totalPedido)
                $aFaturar = $aFaturar + ($totalPedido - $pedido->valor_total_faturado);
            
            $faturado = $faturado + $pedido->valor_total_faturado;
        }

        //Dados de filtro
        $listaCliente = $this->cliente->getCliente();
        $listaVendedor = $this->vendedor->getVendedor();
        $listaTransportador = $this->transportador->getTransportador();

        $dados = array(
            'descMes' => $descMes,
            'mes' => $mes,
            'ano' => $ano,
            'clienteFiltro' => $clienteFiltro,
            'lista_cliente' => $listaCliente,
            'vendedorFiltro' => $vendedorFiltro,
            'lista_vendedor' => $listaVendedor,
            'transportadorFiltro' => $transportadorFiltro,
            'lista_transportador' => $listaTransportador,
            'filter' => $filter,
            'mes_anterior' => $mesAnterior,
            'ano_anterior' => $anoAnterior,
            'mes_seguinte' => $mesSeguinte,
            'ano_seguinte' => $anoSeguinte,
            'lista_pedido' => $listaPedidoVenda,
            'ped_status' => $listaStatus,
            'a_faturar' => $aFaturar,
            'faturado' => $faturado,
            'menu' => 'Vendas'
        );

        $this->load->view('vendas/faturamento-pedido', $dados);
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
                    'cod_vendedor'  => $this->input->post('CodVendedor'),
                    'perc_comissao' => str_replace(",",".",(str_replace(".","",$this->input->post('PerComissao')))),
                    'data_entrega' => date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataEntrega')))),
                    'observacoes' => $this->input->post('ObsPedidoVenda'),
                    'tipo_desconto' => $this->input->post('TipoDesconto'),
                    'valor_desconto' => str_replace(",",".",(str_replace(".","",$this->input->post('Desconto')))),
                    'cod_transportador'  => $this->input->post('CodTransportador'),
                    'tipo_frete' => $this->input->post('TipoFrete'),
                    'valor_frete' => str_replace(",",".",(str_replace(".","",$this->input->post('Frete')))),
                    'valor_seguro' => str_replace(",",".",(str_replace(".","",$this->input->post('Seguro')))),
                    'outras_despesas' => str_replace(",",".",(str_replace(".","",$this->input->post('OutrasDespesas')))),
                    'situacao' => $this->input->post('Situacao')
                ];

            }else{
                $data = [
                    'cod_vendedor'  => $this->input->post('CodVendedor'),
                    'perc_comissao' => str_replace(",",".",(str_replace(".","",$this->input->post('PerComissao')))),
                    'data_entrega' => date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataEntrega')))),
                    'observacoes' => $this->input->post('ObsPedidoVenda'),
                    'tipo_desconto' => $this->input->post('TipoDesconto'),
                    'cod_transportador'  => $this->input->post('CodTransportador'),
                    'tipo_frete' => $this->input->post('TipoFrete'),
                    'valor_frete' => str_replace(",",".",(str_replace(".","",$this->input->post('Frete')))),
                    'valor_desconto' => str_replace(",",".",(str_replace(".","",$this->input->post('Desconto')))),
                    'valor_seguro' => str_replace(",",".",(str_replace(".","",$this->input->post('Seguro')))),
                    'outras_despesas' => str_replace(",",".",(str_replace(".","",$this->input->post('OutrasDespesas')))),
                ];
            }

            $this->venda->updatePedidoVenda($numPedidoVenda, $data);

            $this->session->set_flashdata('sucesso', 'Pedido de venda alterado com sucesso');
            redirect(base_url("vendas/pedido-venda/editar-pedido-venda/{$numPedidoVenda}"), "home", "refresh");

        }
    }

    public function importaAtendimentosVendasExternas(){

        $dataAtendimentos =  date("Y-m-d", strtotime(str_replace('/', '-', $this->input->get('DataAtendimento'))));

        $empresa = $this->empresa->getEmpresaPorCodigo(getDadosUsuarioLogado()['id_empresa']);

        // Valida token existente e válido
        if($empresa->token_acesso_vendas_externas == null){
            // Cria novo token
            $token = $this->vendasexternas->conectaVendasExternas($empresa->integ_usuario_vendas_externas, $empresa->integ_senha_vendas_externas);

        }elseif($empresa->token_acesso_vendas_externas != null && $empresa->validade_token_vendas_externas < date('Y-m-d H:i:s')){
            // Renova Token
            $token = $this->vendasexternas->getRenovacaoToken($empresa->token_renovacao_vendas_externas);

        }else{
            // Token válido
            $token = $empresa->token_acesso_vendas_externas;
        }

        // Se token inválido, processo não continua
        if($token == false){
           redirect(base_url("vendas/pedido-venda"), "home", "refresh");
        }

        // Importa os atendimentos
        $this->vendasexternas->getAtendimentos($token, $dataAtendimentos);
        redirect(base_url("vendas/pedido-venda"), "home", "refresh");

    }

    public function redirecionaVendas(){

        $mes = date('m');
        $ano = date('Y');

        redirect(base_url("vendas/{$mes}/{$ano}"), "home", "refresh");

    }

    public function vendas(){

        $mes = $this->uri->segment(2);
        $ano = $this->uri->segment(3);

        $data = date('Y-m-01', strtotime('+1 months', strtotime(date(''.$ano.'-'.$mes.'-01'))));

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

        $dataInicioAno = date('Y-m-01', strtotime(date(''.$ano.'-01-01')));

        $dataInicio = date('Y-m-01', strtotime(date(''.$ano.'-'.$mes.'-01')));
        $dataFim = date('Y-m-t', strtotime(date(''.$ano.'-'.$mes.'-01')));

        $mesAnterior = date('m', strtotime('-1 months', strtotime(date(''.$ano.'-'.$mes.'-01'))));
        $anoAnterior = date('Y', strtotime('-1 months', strtotime(date(''.$ano.'-'.$mes.'-01'))));
        $mesSeguinte = date('m', strtotime('+1 months', strtotime(date(''.$ano.'-'.$mes.'-01'))));
        $anoSeguinte = date('Y', strtotime('+1 months', strtotime(date(''.$ano.'-'.$mes.'-01'))));

        $listaValores = $this->venda->getValoresVendas($dataInicio, $dataFim);
        $listaProduto = $this->venda->getVendasProduto($dataInicio, $dataFim);
        $listaCliente = $this->venda->getVendasCliente($dataInicio, $dataFim);

        $pedPendente = $this->venda->getVendaPendente($dataInicio, $dataFim);
        $pedOrcamento = $this->venda->getVendaOrcamento($dataInicio, $dataFim);
        $prdOrcReprov = $this->venda->getOrcamentoReprov($dataInicio, $dataFim);
        $listaVendasDia = $this->venda->getVendasPorDia($dataInicio, $dataFim);
        $listaStatus = $this->venda->getStatusVenda($dataInicio, $dataFim);
        $ticketMedio = $this->venda->getTicketMedio($dataInicio, $dataFim);
        $listaVendedor = $this->venda->getVendaVendedor($dataInicio, $dataFim);
        $listaVendasAno = $this->venda->getVendasAno($dataInicioAno, $dataFim);

        // Venda Por Dia
        $labelVendaDia = array();
        $dadosVendaDia = array();
        $dadosDescontoDia = array();
        $labelDia = array();
        $labelNomMes = array();
        $labelAno = array();
        $totalVenda = 0;
        foreach($listaVendasDia as $vendasdia){

            $labelVendaDia[] = str_replace('-', '/', date("d-m", strtotime($vendasdia->data)));
            $labelDia[] = date("d", strtotime($vendasdia->data));
            $labelNomMes[] = $vendasdia->nome_mes;
            $labelAno[] = date("Y", strtotime($vendasdia->data));
            $dadosVendaDia[] = $totalVenda + $vendasdia->venda_dia;
            $totalVenda = $totalVenda + $vendasdia->venda_dia;

        }

        // Vendas ano
        $labelNomMesAno = array();
        $labelAno = array();
        $labelMes = array();
        $vendaMes = array(); 
        $totalAno = 0;  
        foreach($listaVendasAno as $venda_mes){
            
            $labelAno[] = $venda_mes->ano;
            $labelMes[] = $venda_mes->mes;
            $labelNomMesAno[] = $venda_mes->nome_mes;
            $vendaMes[] = $venda_mes->venda_mes;
            $totalAno = $totalAno + $venda_mes->venda_mes;

        }

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
            $percProduto[] = ($venda_produto->valor_total / $listaValores->total_produto) * 100;
            $colorProduto[] = $color;

            $venda_produto->color = $color;

        }

        $dados = array(
            'lista_valores' => $listaValores,
            'lista_produto' => $listaProduto,
            'lista_cliente' => $listaCliente,
            'lista_vendedor' => $listaVendedor,

            'ticket_medio' => $ticketMedio,
            'pendente' => $pedPendente,
            'orcamento' => $pedOrcamento,
            'reprovado' => $prdOrcReprov,
            'lista_status' => $listaStatus,

            'descMes' => $descMes,
            'dia' => $labelVendaDia,
            'venda_dia' => $dadosVendaDia,
            'desconto_dia' => $dadosDescontoDia,
            'total_venda' => $totalVenda,
            'dia_nome' => $labelDia,
            'nome_mes' => $labelNomMes,
            'ano' => $labelAno,

            //venda ano
            'label_ano' => $labelAno,
            'label_mes' => $labelMes,
            'label_nome_mes' => $labelNomMesAno,
            'venda_mes' => $vendaMes,
            'total_ano' => $totalAno,

            //cliente
            'label_cliente' => $labelCliente,
            'perc_cliente' => $percCliente,
            'color_cliente' => $colorCliente,

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
            'menu' => 'Vendas'
        );

        $this->load->view('vendas/vendas', $dados);


    }

    //Relatórios
    public function vendaProduto(){

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

        $listaProdutoVend = $this->produto->getProduto();
        $totalVenda = $this->venda->totalVendaProduto($dataInicio, $dataFim, $codProdutos);
        $listaVendaDetalhada = $this->venda->vendaDetalhada($dataInicio, $dataFim, $codProdutos);
        $listaEmpresa = $this->empresa->getEmpresaPorCodigo(getDadosUsuarioLogado()['id_empresa']);

        $listaValores = $this->venda->getValoresVendas($dataInicio, $dataFim);
        $listaProduto = $this->venda->getVendasProduto($dataInicio, $dataFim);

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
            $percProduto[] = ($venda_produto->valor_total / $listaValores->total_produto) * 100;
            $colorProduto[] = $color;

            $venda_produto->color = $color;

        }

        $dados = array(
            'dataInicio' => $dataInicio,
            'dataFim' => $dataFim,
            'cod_produto' => $codProdutos,
            'lista_produto_vend' => $listaProdutoVend,
            'total_venda' => $totalVenda,
            'lista_venda_detalhada' => $listaVendaDetalhada,
            'empresa' => $listaEmpresa,

            'lista_valores' => $listaValores,
            'lista_produto' => $listaProduto,
            'label_produto' => $labelProduto,
            'perc_produto' => $percProduto,
            'color_produto' => $colorProduto,

            'menu' => 'Vendas'

        );

        $this->load->view('vendas/venda-produto', $dados);

    }

    public function vendaCliente(){

        $dataInicio = "";
        $dataFim = "";

        if($this->input->get('DataInicio') != "" && $this->input->get('DataFim') != ""){
            $dataInicio = date("Y-m-d", strtotime(str_replace('/', '-', $this->input->get('DataInicio'))));
            $dataFim = date("Y-m-d", strtotime(str_replace('/', '-', $this->input->get('DataFim'))));
        }
        $codClientes = $this->input->get('cliente');

        if($dataInicio == ""){
            $dataInicio = date('Y-m-01');
        }

        if($dataFim == ""){
            $dataFim = date('Y-m-d');
        }

        $totalVenda = $this->venda->totalVendaCliente($dataInicio, $dataFim, $codClientes);
        $listaCliente = $this->venda->getVendasCliente($dataInicio, $dataFim);
        $listaClienteDetalhada = $this->venda->clienteDetalhada($dataInicio, $dataFim, $codClientes);
        $listaVendaDetalhada = $this->venda->vendaDetalhada($dataInicio, $dataFim, "", $codClientes);
        $listaEmpresa = $this->empresa->getEmpresaPorCodigo(getDadosUsuarioLogado()['id_empresa']);

        $listaValores = $this->venda->getValoresVendas($dataInicio, $dataFim);
        

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
            'dataInicio' => $dataInicio,
            'dataFim' => $dataFim,
            'cod_cliente' => $codClientes,
            'lista_cliente' => $listaCliente,
            'total_venda' => $totalVenda,
            'lista_cliente_detalhada' => $listaClienteDetalhada,
            'lista_produto_detalhada' => $listaVendaDetalhada,
            'empresa' => $listaEmpresa,
            'menu' => 'Vendas',

            'lista_valores' => $listaValores,
            'lista_cliente' => $listaCliente,
            'label_cliente' => $labelCliente,
            'perc_cliente' => $percCliente,
            'color_cliente' => $colorCliente,

        );

        $this->load->view('vendas/venda-cliente', $dados);

    }

    public function vendaVendedor(){

        $dataInicio = "";
        $dataFim = "";

        if($this->input->get('DataInicio') != "" && $this->input->get('DataFim') != ""){
            $dataInicio = date("Y-m-d", strtotime(str_replace('/', '-', $this->input->get('DataInicio'))));
            $dataFim = date("Y-m-d", strtotime(str_replace('/', '-', $this->input->get('DataFim'))));
        }
        $codVendedores = $this->input->get('vendedor');

        if($dataInicio == ""){
            $dataInicio = date('Y-m-01');
        }

        if($dataFim == ""){
            $dataFim = date('Y-m-d');
        }

        $listaVendedorPesquisa = $this->vendedor->getVendedor();
        $totalVenda = $this->venda->totalVendaVendedor($dataInicio, $dataFim, $codVendedores);
        $listaVendedorCliente = $this->venda->vendedorCliente($dataInicio, $dataFim, $codVendedores);
        $listaVendedorProduto = $this->venda->vendedorProduto($dataInicio, $dataFim, $codVendedores);
        $listaEmpresa = $this->empresa->getEmpresaPorCodigo(getDadosUsuarioLogado()['id_empresa']);

        //--
        $listaValores = $this->venda->getValoresVendasVendedores($dataInicio, $dataFim);
        $listaVendedor = $this->venda->getVendasVendedor($dataInicio, $dataFim);

        $i = 0; 
        $color = "#ff8a65";
        $labelVendedor = array();   
        $percVendedor = array(); 
        $colorVendedor = array(); 
        foreach($listaVendedor as $venda_vendedor){

            if($i == 10) continue;

            $i += 1;

            $color = $this->random_color($color);

            $labelVendedor[] = $venda_vendedor->nome_vendedor;
            $percVendedor[] = (($venda_vendedor->total_vendas + $venda_vendedor->total_frete +
                               $venda_vendedor->total_seguro + $venda_vendedor->outras_despesas - 
                               $venda_vendedor->total_desconto) / $listaValores->total_vendas) * 100;
            $colorVendedor[] = $color;

            $venda_vendedor->color = $color;

        }

        $dados = array(
            'dataInicio' => $dataInicio,
            'dataFim' => $dataFim,
            'cod_vendedor' => $codVendedores,
            'lista_vendedor_pesquisa' => $listaVendedorPesquisa,
            'total_venda' => $totalVenda,
            'lista_vendedor_cliente' => $listaVendedorCliente,
            'lista_vendedor_produto' => $listaVendedorProduto,
            'empresa' => $listaEmpresa,

            'lista_valores' => $listaValores,
            'lista_vendedor' => $listaVendedor,
            'label_vendedor' => $labelVendedor,
            'perc_vendedor' => $percVendedor,
            'color_vendedor' => $colorVendedor,

            'menu' => 'Vendas'

        );

        $this->load->view('vendas/venda-vendedor', $dados);

    }

    public function redirecionaPainelVendedores(){

        $mes = date('m');
        $ano = date('Y');

        redirect(base_url("painel/vendedores/{$mes}/{$ano}"), "home", "refresh");

    }

    public function painelVendedores(){

        $mes = $this->uri->segment(3);
        $ano = $this->uri->segment(4);

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

        $data = date('Y-m-01', strtotime('+1 months', strtotime(date(''.$ano.'-'.$mes.'-01'))));
        $centro = ($this->input->get('centro')) ? $this->input->get('centro') : "";

        $dataInicio = date('Y-m-01', strtotime(date(''.$ano.'-'.$mes.'-01')));
        $dataFim = date('Y-m-t', strtotime(date(''.$ano.'-'.$mes.'-01')));

        $mesAnterior = date('m', strtotime('-1 months', strtotime(date(''.$ano.'-'.$mes.'-01'))));
        $anoAnterior = date('Y', strtotime('-1 months', strtotime(date(''.$ano.'-'.$mes.'-01'))));
        $mesSeguinte = date('m', strtotime('+1 months', strtotime(date(''.$ano.'-'.$mes.'-01'))));
        $anoSeguinte = date('Y', strtotime('+1 months', strtotime(date(''.$ano.'-'.$mes.'-01'))));        

         //-Inicio
         $codVendedores = $this->input->get('vendedor');
         $listaValores = $this->venda->getValoresVendasVendedoresMeta($dataInicio, $dataFim, $mes, $ano, $codVendedores);
         $listaVendedor = $this->venda->getVendasVendedorMeta($dataInicio, $dataFim);
         $listaVendedorCliente = $this->venda->vendedorCliente($dataInicio, $dataFim, $codVendedores);
 
         $totalComissao = 0;
         $i = 0; 
         $color = "#ff8a65";
         $labelVendedor = array();   
         $percVendedor = array(); 
         $colorVendedor = array(); 
         foreach($listaVendedor as $venda_vendedor){
 
            $i += 1;

            if($i < 15) 
                $color = $this->random_color($color);
            else
                $color = $this->randomHexColor();

            $colorVendedor[] = $color;
            
 
            $venda_vendedor->color = $color;

            $meta = $this->venda->getMetaMesPorVendedor($venda_vendedor->cod_vendedor, $mes, $ano);
            //$comissao = $this->venda->getComissaoPorVendedor($venda_vendedor->cod_vendedor, $venda_vendedor->total_vendas);

            // calculo da meta
            $venda_vendedor->meta = 0;    
            $venda_vendedor->variacao = 0;         
            if($meta->valor_meta != 0){
                $venda_vendedor->meta = $meta->valor_meta;
                $venda_vendedor->variacao = ($venda_vendedor->total_vendas / $venda_vendedor->meta) * 100;
            }

            $totalComissao = $totalComissao + $venda_vendedor->total_comissao;
 
         }

         $listaValores->total_comissao = $totalComissao;
 
         //-Fim

        $dados = array(
            'descMes' => $descMes,
            'mes' => $mes,
            'ano' => $ano,
            'mes_anterior' => $mesAnterior,
            'ano_anterior' => $anoAnterior,
            'mes_seguinte' => $mesSeguinte,
            'ano_seguinte' => $anoSeguinte,
            
            //-Iniicio
            'lista_vendedor_cliente' => $listaVendedorCliente,
            'lista_valores' => $listaValores,
            'lista_vendedor' => $listaVendedor,
            'label_vendedor' => $labelVendedor,
            'perc_vendedor' => $percVendedor,
            'color_vendedor' => $colorVendedor,
            //-Fim
            'menu' => 'Vendas'
            
        );

        $this->load->view('vendas/painel-vendedor', $dados);

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

    public function visaoVendas(){
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

        $listaVendasDia = $this->venda->getVendasDiaria($dataInicio, $dataFim);
        $listaVendaProduto = $this->venda->getVendaProduto($dataInicio, $dataFim);
        $listaVendaCliente = $this->venda->getVendaCliente($dataInicio, $dataFim);
        $listaVendaVendedor = $this->venda->getVendaVendedor($dataInicio, $dataFim);

        // Venda Por Dia
        $labelVendaDia = array();
        $dadosVendaDia = array();
        $dadosDescontoDia = array();
        $labelDia = array();
        $labelNomMes = array();
        $labelAno = array();
        $totalVenda = 0;
        $totalDesconto = 0;
        foreach($listaVendasDia as $vendasdia){

            $labelVendaDia[] = str_replace('-', '/', date("d-m", strtotime($vendasdia->data)));
            $labelDia[] = date("d", strtotime($vendasdia->data));
            $labelNomMes[] = $vendasdia->nome_mes;
            $labelAno[] = date("Y", strtotime($vendasdia->data));
            $dadosVendaDia[] = $vendasdia->venda_dia;
            $dadosDescontoDia[] = $vendasdia->desconto_dia;
            $totalVenda = $totalVenda + $vendasdia->venda_dia;
            $totalDesconto = $totalDesconto + $vendasdia->desconto_dia;

        }

        // Venda por Produto
        $corVenda = array();
        $dadosVenda = array();
        $dadosProduto = array();
        $codProduto = array();
        $codUnidMedida = array();
        $descProduto = array();
        $quantVenda = array();
        $valorVenda = array();
        foreach($listaVendaProduto as $key_VendaProduto => $vendaProduto){

            if($key_VendaProduto == 0){
                $corVenda[] = $this->random_color("");
            }else{
                $corVenda[] = $this->random_color($corVenda[$key_VendaProduto - 1]);
            }

            $dadosVenda[] = ($vendaProduto->valor_vendido / $totalVenda) * 100;
            $dadosProduto[] = $vendaProduto->cod_produto . " - " . $vendaProduto->nome_produto;
            $codProduto[] = $vendaProduto->cod_produto;
            $codUnidMedida[] = $vendaProduto->cod_unidade_medida;
            $descProduto[] = $vendaProduto->nome_produto;
            $quantVenda[] = $vendaProduto->quant_vendido;
            $valorVenda[] = $vendaProduto->valor_vendido;

        }

        // Venda por Cliente
        $corCliente = array();
        $dadosCliente = array();
        $codCliente = array();
        $nomeCliente = array();
        $valorDesconto = array();
        foreach($listaVendaCliente as $key_VendaCliente => $vendaCliente){

            if($key_VendaCliente == 0){
                $corCliente[] = $this->random_color("#F47C3C");
            }else{
                $corCliente[] = $this->random_color($corCliente[$key_VendaCliente - 1]);
            }

            $dadosCliente[] = ($vendaCliente->total_venda / $totalVenda) * 100;

            if($vendaCliente->total_desconto > 0){
                $codCliente[] = $vendaCliente->cod_cliente;
                $nomeCliente[] = $vendaCliente->nome_cliente;
                $valorDesconto[] = $vendaCliente->total_desconto;
            }
        }

        // Venda por Vendedor
        $codVendedor = array();
        $nomeVendedor = array();
        $vendasVendedor = array();
        $valorComissao = array();
        foreach($listaVendaVendedor as $key_VendaVendedor => $vendaVendedor){

            $codVendedor[] = $vendaVendedor->cod_vendedor;
            $nomeVendedor[] = $vendaVendedor->nome_vendedor;
            $vendasVendedor[] = $vendaVendedor->total_venda;
            $valorComissao[] = $vendaVendedor->total_comissao;

        }

        $dados = array(
            'dataInicio' => $dataInicio,
            'dataFim' => $dataFim,

            'dia' => $labelVendaDia,
            'venda_dia' => $dadosVendaDia,
            'desconto_dia' => $dadosDescontoDia,
            'total_venda' => $totalVenda,
            'total_desconto' => $totalDesconto,
            'dia_nome' => $labelDia,
            'nome_mes' => $labelNomMes,
            'ano' => $labelAno,

            'venda_produto' => $listaVendaProduto,
            'cor_venda' => $corVenda,
            'dados_venda' => $dadosVenda,
            'nome_produto' => $dadosProduto,

            'cod_produto' => $codProduto,
            'cod_unid_medida' => $codUnidMedida,
            'desc_produto' => $descProduto,
            'quant_venda' => $quantVenda,
            'valor_venda' => $valorVenda,

            'cor_cliente' => $corCliente,
            'dados_cliente' => $dadosCliente,
            'venda_cliente' => $listaVendaCliente,

            'cod_cliente' => $codCliente,
            'nome_cliente' => $nomeCliente,
            'valor_desconto' => $valorDesconto,

            'cod_vendedor' => $codVendedor,
            'nome_vendedor' => $nomeVendedor,
            'total_venda_vendedor' => $vendasVendedor,
            'total_comissao_vendedor' => $valorComissao,

            'menu' => 'Vendas'
        );

        $this->load->view('vendas/indicadores-vendas', $dados);

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

    function randomHexColor() {
        $letters = '0123456789ABCDEF';
        $color = '#';
        for ($i = 0; $i < 6; $i++) {
            $color .= $letters[rand(0, 15)];
        }
        return $color;
    }
}
