<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VisaoGeralController extends CI_Controller {

    function __construct(){
        parent::__construct();

        if(usuarioLogado() == false){

            redirect(base_url("login"), "home", "refresh");

        }

        if(getDadosUsuarioLogado()['tipo_acesso'] == 3){

            redirect(base_url("vendas/pedido-venda-vendedor"), "home", "refresh");

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

        redirect(base_url(), "home", "refresh");
    }

    function dateDifference($date_1 , $date_2)
    {
        $datetime1 = date_create($date_1);
        $datetime2 = date_create($date_2);
    
        $interval = date_diff($datetime1, $datetime2);
    
        return $interval->format('%a');
    
    }

    public function erro404()
	{
        $dados = array(
            'menu' => 'Erro 404'
        );

		$this->load->view('erro-404', $dados);
	}        

    public function visaoGeral(){
        $dados = array(
            'empresa' => $this->empresa->getEmpresaPorCodigo(getDadosUsuarioLogado()['id_empresa']),
            'lista_titulos' => $this->financeiro->getTitulospendentes(),
            'totais_dia' => $this->financeiro->getTotaisTitulosPendentesHoje(),
            'menu' => 'Visao Geral'
        );

        $this->load->view('visao-geral', $dados);
    }
}
