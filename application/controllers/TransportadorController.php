<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TransportadorController extends CI_Controller {

    function __construct(){
        parent::__construct();

        if(usuarioLogado() == false){

            redirect(base_url("login"), "home", "refresh");

        }

        $empresa = $this->empresa->getEmpresaPorCodigo(getDadosUsuarioLogado()['id_empresa']);
        if($empresa->data_validade < date('Y-m-d')){
            $this->session->set_flashdata('erro', 'Período de acesso finalizado, entre em 
                                           contato através do telefone (41) 9 9666 8250 ou pelo email contato@shopfloor.com.br para renovação');
            redirect(base_url('logout'), "home", "refresh");
        }
    }

    public function formTransportador(){

        $listaCidade = $this->tabelasauxiliares->getCidade();
        $listaEstado = $this->tabelasauxiliares->getEstado(); 
        $listaPais = $this->tabelasauxiliares->getPais();              

        $dados = array(
            'lista_cidade' => $listaCidade,
            'lista_estado' => $listaEstado,
            'lista_pais' => $listaPais,
            'menu' => 'Cadastro'
        );

        $this->load->view('cadastros/novo-transportador', $dados);

    }   
    
    public function editarTransportador($CodTransportador){

        $listaTransportador = $this->transportador->getTransportadorPorCodigo($CodTransportador);
        $listaCidade = $this->tabelasauxiliares->getCidade();  
        $listaPais = $this->tabelasauxiliares->getPais(); 
        
        if($listaTransportador == null){
            redirect(base_url('transportador'));
            
        }else{ 
            $dados = array(
                'transportador' => $listaTransportador,
                'lista_cidade' => $listaCidade,
                'lista_pais' => $listaPais,
                'menu' => 'Cadastro'
            );
        }

        $this->load->view('cadastros/editar-transportador', $dados);

    }

    public function inserirTransportador(){  

        //Validações dos campo e array das mensagens apresentadas
        $this->form_validation->set_rules('NomeTransportador', 'Nome do Transportador', 'required|max_length[60]',
            array('required' => 'Você deve preencher o campo %s',
                  'max_length' => 'O campo %s não deve ter mais que 60 caracteres'));
        $this->form_validation->set_rules('Email', 'E-mail', 'valid_email|max_length[60]', 
            array('max_length' => 'O campo %s não deve ter mais que 60 caracteres',
                  'valid_email' => 'É necessário informar um e-mail válido'));
        $this->form_validation->set_rules('Endereco', 'Rua e Número', 'max_length[60]', 
            array('max_length' => 'O campo %s não deve ter mais que 60 caracteres'));
        $this->form_validation->set_rules('Bairro', 'Bairro', 'max_length[45]', 
            array('max_length' => 'O campo %s não deve ter mais que 45 caracteres'));

        if($this->input->post('TipoPessoa') == "1" && $this->input->post('CnpjCpf') != ""){
            $this->form_validation->set_rules('CnpjCpf', 'CNPJ', 'min_length[18]', 
                array('min_length' => 'O campo %s não está completo'));
        }elseif($this->input->post('TipoPessoa') == "2" && $this->input->post('CnpjCpf') != ""){
            $this->form_validation->set_rules('CnpjCpf', 'CPF', 'min_length[14]', 
                array('min_length' => 'O campo %s não está completo'));
        }

        if($this->input->post('CEP') != ""){
            $this->form_validation->set_rules('CEP', 'CEP', 'min_length[9]', 
                array('min_length' => 'O campo %s não está completo'));            
        }

        if($this->form_validation->run() == false){

            $this->session->set_flashdata('erro', validation_errors());
            $this->formTransportador();
            
        }else {

            $data = [
                'id_empresa' => getDadosUsuarioLogado()['id_empresa'],
                'nome_transportador'  => $this->input->post('NomeTransportador'),
                'razao_social'  => $this->input->post('RazaoSocial'),
                'tipo_pessoa' => $this->input->post('TipoPessoa'),
                'cnpj_cpf' => $this->input->post('CnpjCpf'),
                'tipo_contrib_icms' => $this->input->post('ContribuinteICMS'),
                'insc_estadual' => $this->input->post('IE'),
                'insc_municipal' => $this->input->post('IM'),
                'tel_fixo' => $this->input->post('TelFixo'),
                'tel_cel' => $this->input->post('TelCel'),
                'email' => $this->input->post('Email'),
                'cep' => $this->input->post('CEP'),
                'endereco' => $this->input->post('Endereco'),
                'numero' => $this->input->post('Numero'),
                'complemento' => $this->input->post('Complemento'),
                'bairro' => $this->input->post('Bairro'),
                'cod_cidade' => $this->input->post('Cidade'),
                'cod_pais' => ($this->input->post('Pais')) ? $this->input->post('Pais') : 1058,
                'ativo' => $this->input->post('Ativo')
            ];
            $codTransportador = $this->transportador->insertTransportador($data);

            //Se optar por salvar e continuar, mantém na página de cadastro
            if ($this->input->post('Opcao') == 'salvarContinuar'){

                $this->session->set_flashdata('sucesso', 'Transportador cadastrado com sucesso');
                redirect(base_url('transportador/novo-transportador'));


            }else {

                $this->session->set_flashdata('sucesso', 'Transportador cadastrado com sucesso');
                redirect(base_url('transportador'));
            }            
        }        
    }   

    public function salvarTransportador($codTransportador){

        //Validações dos campo e array das mensagens apresentadas
        $this->form_validation->set_rules('NomeTransportador', 'Nome do Transportador', 'required|max_length[60]',
            array('required' => 'Você deve preencher o campo %s',
                  'max_length' => 'O campo %s não deve ter mais que 60 caracteres'));
        $this->form_validation->set_rules('Email', 'E-mail', 'valid_email|max_length[60]', 
            array('max_length' => 'O campo %s não deve ter mais que 60 caracteres',
                  'valid_email' => 'É necessário informar um e-mail válido'));
        $this->form_validation->set_rules('Endereco', 'Rua e Número', 'max_length[60]', 
            array('max_length' => 'O campo %s não deve ter mais que 60 caracteres'));
        $this->form_validation->set_rules('Bairro', 'Bairro', 'max_length[45]', 
            array('max_length' => 'O campo %s não deve ter mais que 45 caracteres'));
        
        //Valida número de caracteres conforme tipo de pessoa
        if($this->input->post('TipoPessoa') == "1" && $this->input->post('CnpjCpf') != ""){
            $this->form_validation->set_rules('CnpjCpf', 'CNPJ', 'min_length[18]', 
                array('min_length' => 'O campo %s não está completo'));
        }elseif($this->input->post('TipoPessoa') == "2" && $this->input->post('CnpjCpf') != ""){
            $this->form_validation->set_rules('CnpjCpf', 'CPF', 'min_length[14]', 
                array('min_length' => 'O campo %s não está completo'));
        }

        if($this->input->post('CEP') != ""){
            $this->form_validation->set_rules('CEP', 'CEP', 'min_length[9]', 
                array('min_length' => 'O campo %s não está completo'));            
        }

        if($this->form_validation->run() == false){

            $this->session->set_flashdata('erro', validation_errors());
            $this->editarTransportador($codTransportador);
            
        }else {

            $dados = [
                'nome_transportador'  => $this->input->post('NomeTransportador'),
                'razao_social'  => $this->input->post('RazaoSocial'),
                'tipo_pessoa' => $this->input->post('TipoPessoa'),
                'cnpj_cpf' => $this->input->post('CnpjCpf'),
                'tipo_contrib_icms' => $this->input->post('ContribuinteICMS'),
                'insc_estadual' => $this->input->post('IE'),
                'insc_municipal' => $this->input->post('IM'),
                'tel_fixo' => $this->input->post('TelFixo'),
                'tel_cel' => $this->input->post('TelCel'),
                'email' => $this->input->post('Email'),
                'cep' => $this->input->post('CEP'),
                'endereco' => $this->input->post('Endereco'),
                'numero' => $this->input->post('Numero'),
                'complemento' => $this->input->post('Complemento'),
                'bairro' => $this->input->post('Bairro'),
                'cod_cidade' => $this->input->post('Cidade'),
                'cod_pais' => ($this->input->post('Pais')) ? $this->input->post('Pais') : 1058,
                'ativo' => $this->input->post('Ativo')
            ];            

            $this->transportador->updateTransportador($codTransportador, $dados); 

            $this->session->set_flashdata('sucesso', 'Transportador alterado com sucesso');
            redirect(base_url("transportador/editar-transportador/{$codTransportador}"));            
        }
    }

    public function excluirTransportador(){

        $CodTransportador = $this->input->post("excluir_todos");
        $numRegs = count($CodTransportador);

        if($numRegs > 0){

            $erro = $this->transportador->deleteTransportador($CodTransportador);

            //Code 1451 - Não é permitido exluir registro sendo usado por outro registro
            if ($erro['code'] == 1451){
                $this->session->set_flashdata('erro', 'Exclusão não permitida. Registro em uso por outro cadastro');
            }else{
                $this->session->set_flashdata('sucesso', 'Registro(s) selecionado(s) excluído(s)');
            } 

        }else {
            $this->session->set_flashdata('erro', 'Nenhum registro foi selecionado');
        }

        redirect(base_url('transportador'));
    } 

    public function listarTransportador(){    
        
        // Busca dos dados para apresentação
        $filter = ($this->input->get('buscar')) ? $this->input->get('buscar') : "";
        $offset = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

        $config = array(
            'base_url' => base_url('transportador'),
            'per_page' => 15,
            'num_links' => 10,
            'uri_segment' => 2,
            'total_rows' => $this->transportador->countAll($filter),
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
        
        $listaTransportador = $this->transportador->getTransportador($filter, $config["per_page"], $offset);
        $empresa = $this->empresa->getEmpresaPorCodigo(getDadosUsuarioLogado()['id_empresa']);

        $dados = array(
            'filter' => $filter,
            'pagination' => $this->pagination->create_links(),
            'empresa' => $empresa,
            'lista_transportador' => $listaTransportador,
            'menu' => 'Cadastro'
        );

        $this->load->view('cadastros/transportador', $dados);
    }           
}