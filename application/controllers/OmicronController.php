<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OmicronController extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('Estabelecimento', 'estabelecimento');

        if(usuarioLogado() == true){

            redirect(base_url("visao-geral"), "home", "refresh");

        }
    }

    public function paginaNula()
	{
		redirect(base_url(), "home", "refresh");
	}    

    public function formLogin(){

        $dados = array(
            'menu' => 'Login'
        );

        $this->load->view('login', $dados);
    }

    public function confirmaEmail($idEmpresa){

        $dados = array(
            'menu' => 'Login',
            'empresa' => $idEmpresa
        );

        $this->load->view('confirmar-email', $dados);
    }

    public function reenviarEmail($idEmpresa){

        $empresa = $this->empresa->getEmpresaPorCodigo($idEmpresa);
        if($empresa == null){
            $this->session->set_flashdata('erro', 'Empresa não encontrada');
            redirect(base_url('login'), "home", "refresh");
        }
        $usuario = $this->usuario->getUsuarioPorCodigo($empresa->email_contato);
        if($usuario == null){
            $this->session->set_flashdata('erro', 'Usuario não encontrada');
            redirect(base_url('login'), "home", "refresh");
        }

        $this->email->emailBoasVindas($empresa->nome_empresa, $empresa->tel_cel, $usuario->nome_usuario, $empresa->email_contato, $empresa->data_validade, $idEmpresa, $empresa->hash_confirma_email);
        $this->session->set_flashdata('sucesso', 'E-mail reenviado, confira sua caixa de entrada e também a caixa de spam');
        redirect(base_url('login'), "home", "refresh");
    }

    public function formLoginVendedor(){

        $dados = array(
            'menu' => 'Login Vendedor'
        );

        $this->load->view('login-vendedor', $dados);
    }

    public function validaEmail(){

        $hashEmail = $this->uri->segment(2);
        $idEmpresa = $this->uri->segment(3);

        $empresa = $this->empresa->getEmpresaPorCodigoHash($idEmpresa, $hashEmail);

        if($empresa == null){
            $this->session->set_flashdata('erro', 'Verificação de e-mail não efetuada');
            redirect(base_url('login'), "home", "refresh");
        }else{
            $dados = [
                'e_mail_confirmado' => 1,
            ];
            $this->empresa->updateEmpresa($idEmpresa, $dados);

            $this->session->set_flashdata('sucesso', 'Seu e-mail foi confirmado com sucesso, prossiga com o login');
            redirect(base_url('login'), "home", "refresh");
        }
    }

    public function loginUsuario(){
        $this->form_validation->set_rules('Email', 'E-mail', 'required|valid_email|max_length[60]',
            array('required' => 'Você deve preencher o campo %s',
                  'valid_email' => 'É necessário informar um e-mail válido'));
        $this->form_validation->set_rules('Senha', 'Senha', 'required',
            array('required' => 'Você deve preencher o campo %s'));

        if($this->form_validation->run() == false){

            $this->session->set_flashdata('erro', validation_errors());
            $this->formLogin();

        }else{

            $email = $this->input->post('Email');
            $senha = sha1($this->input->post('Senha'));

            $usuario = $this->usuario->autenticar($email, $senha);
            if($usuario == null){
                $this->session->set_flashdata('erro', 'Email ou senha inválidos');
                $this->formLogin();
            }else{

                $this->empresa->garantirAcessoEmpresa($usuario->email, $usuario->id_empresa, true);
                if(!$this->empresa->usuarioPodeAcessarEmpresa($usuario->email, $usuario->id_empresa)){
                    $this->session->set_flashdata('erro', 'Usuário sem acesso ativo a uma empresa');
                    redirect(base_url('login'), "home", "refresh");
                }
                $empresa = $this->empresa->getEmpresaPorCodigo($usuario->id_empresa);

                if($empresa == null){
                    $this->session->set_flashdata('erro', 'A empresa padrão do usuário não foi encontrada');
                    redirect(base_url('login'), "home", "refresh");
                }elseif($usuario->ativo == 0){
                    $this->session->set_flashdata('erro', 'Usuário inativo, entre em contato com o administrador da sua empresa');
                    redirect(base_url('login'), "home", "refresh");
               }else{

                    $sessao = array(
                        'id_empresa' => $usuario->id_empresa,
                        'nome_empresa' => $empresa->nome_empresa,
                        'nome_usuario' => $usuario->nome_usuario,
                        'email' => $usuario->email,
                        'tipo_acesso' => $usuario->tipo_acesso,
                        'producao' => $usuario->producao,
                        'vendas' => $usuario->vendas,
                        'compras' => $usuario->compras,
                        'estoque' => $usuario->estoque,
                        'fiscal' => $usuario->fiscal,
                        'financeiro' => $usuario->financeiro,
                    );

                    $this->session->set_userdata('usuario', $sessao);
                    redirect(base_url('visao-geral'), "home", "refresh");
                }
            }
        }
    }

    public function loginUsuarioVendedor(){
        $this->form_validation->set_rules('IDCliente', 'Código da empresa', 'required',
            array('required' => 'Você deve preencher o campo %s'));
        $this->form_validation->set_rules('UsuarioVendedor', 'Usuário Vendedor', 'required',
            array('required' => 'Você deve preencher o campo %s'));
        $this->form_validation->set_rules('Senha', 'Senha', 'required',
            array('required' => 'Você deve preencher o campo %s'));

        if($this->form_validation->run() == false){

            $this->session->set_flashdata('erro', validation_errors());
            $this->formLogin();

        }else{

            $empresa = $this->input->post('IDCliente');
            $usuario = $this->input->post('UsuarioVendedor');
            $senha = sha1($this->input->post('Senha'));

            $vendedor = $this->vendedor->autenticarVendedor($empresa, $usuario, $senha);
            if($vendedor == null){
                $this->session->set_flashdata('erro', 'Vendedor inválido ou não cadastrado');
                $this->formLoginVendedor();
            }else{

                $empresa = $this->empresa->getEmpresaPorCodigo($vendedor->id_empresa);

                if($empresa->data_validade < date('Y-m-d')){
                    $this->session->set_flashdata('erro', 'Período de acesso finalizado');
                    redirect(base_url('login-vendedor'), "home", "refresh");
                }elseif($empresa->e_mail_confirmado == 0){
                    redirect(base_url('confirmar-email/' . $usuario->id_empresa), "home", "refresh");
                }elseif($vendedor->ativo == 0){
                     $this->session->set_flashdata('erro', 'Vendedor inativo, entre em contato com o administrador da sua empresa');
                    redirect(base_url('login-vendedor'), "home", "refresh");
                }else{

                    $sessao = array(
                        'id_empresa' => $vendedor->id_empresa,
                        'nome_empresa' => $empresa->nome_empresa,
                        'nome_usuario' => $vendedor->nome_vendedor,
                        'usuario' => $vendedor->nome_usuario,
                        'cod_vendedor' => $vendedor->cod_vendedor,
                        'email' => $vendedor->email,
                        'tipo_acesso' => 3,
                        'producao' => 0,
                        'vendas' => 0,
                        'compras' => 0,
                        'estoque' => 0,
                        'fiscal' => 0,
                        'financeiro' => 0,
                    );

                    $this->session->sess_expiration = 0;
                    $this->session->set_userdata('usuario', $sessao);
                    redirect(base_url('vendas/pedido-venda-vendedor'), "home", "refresh");
                }
            }
        }
    }

    public function formCadastroEmpresa(){

        $dados = array(
            'menu' => 'Cadastro Empresa'
        );

        $this->load->view('cadastro', $dados);
    }

    public function inserirEmpresa(){
        // Validação Bot
        $recaptchaResponse = $this->input->post('g-recaptcha-response');
        $secret = '6LcM4KggAAAAAKy7CEtrHa1uxzvNVCre3JBxp7mq';
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data1 = array('secret' => $secret, 'response' => $recaptchaResponse);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        $response = curl_exec($ch);
        curl_close($ch);
        $status = json_decode($response, true);
        if ($status['success'] != "1") {
            $this->session->set_flashdata('erro', 'Você é um robo?');
            $this->formCadastroEmpresa();            
        }else{
            //Validações dos campos da empresa
            $this->form_validation->set_rules('CnpjCpf', 'CNPJ/CPF', 'required',
                array('required' => 'Você deve preencher o campo %s'));
            $this->form_validation->set_rules('NomeEmpresa', 'Nome da Empresa', 'required|max_length[60]',
                array('required' => 'Você deve preencher o campo %s',
                    'max_length' => 'O campo %s não deve ter mais que 60 caracteres'));
            $this->form_validation->set_rules('TelCel', 'Telefone Celular', 'required|max_length[60]',
                array('required' => 'Você deve informar o campo %s',
                    'max_length' => 'O campo %s não deve ter mais que 20 caracteres'));

            // Validações dos campos do usuário
            $this->form_validation->set_rules('Email', 'E-mail', 'valid_email|max_length[60]|is_unique[usuario.email]',
                array('max_length' => 'O campo %s não deve ter mais que 60 caracteres',
                    'valid_email' => 'É necessário informar um e-mail válido',
                    'is_unique' => 'Já há uma empresa cadastrada com este e-mail'));
            $this->form_validation->set_rules('NomeUsuario', 'Nome do Usuário', 'required|max_length[100]',
                array('required' => 'Você deve preencher o campo %s',
                    'max_length' => 'O campo %s não deve ter mais que 100 caracteres'));
            $this->form_validation->set_rules('Senha1', 'Senha', 'required|max_length[100]|min_length[6]',
                array('required' => 'Você deve preencher o campo %s',
                    'max_length' => 'O campo %s não deve ter mais que 100 caracteres',
                    'min_length' => 'O campo %s deve ter no mínimo 6 caracteres'));
            $this->form_validation->set_rules('Senha2', 'Confirma a Senha', 'required|max_length[100]|callback_valida_senha',
                array('required' => 'Você deve preencher o campo %s',
                    'max_length' => 'O campo %s não deve ter mais que 100 caracteres'));
            $this->form_validation->set_rules('TermosCondicoes', 'Termos e Condições de Uso', 'required',
                array('required' => 'Você deve concordar os %s'));

            if($this->form_validation->run() == false){

                $this->session->set_flashdata('erro', validation_errors());
                $this->formCadastroEmpresa();

            }else{

                $ipaddress = '';
                if (isset($_SERVER['HTTP_CLIENT_IP']))
                    $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
                else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
                    $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
                else if(isset($_SERVER['HTTP_X_FORWARDED']))
                    $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
                else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
                    $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
                else if(isset($_SERVER['HTTP_FORWARDED']))
                    $ipaddress = $_SERVER['HTTP_FORWARDED'];
                else if(isset($_SERVER['REMOTE_ADDR']))
                    $ipaddress = $_SERVER['REMOTE_ADDR'];
                else
                    $ipaddress = 'UNKNOWN';

                $hashEmail = substr(bin2hex(random_bytes(16)), 1);

                $dadosEmpresa = [
                    'tipo_empresa' => $this->input->post('TipoPessoa'),
                    'cnpj_cpf' => $this->input->post('CnpjCpf'),
                    'nome_empresa'  => $this->input->post('NomeEmpresa'),
                    'razao_social'  => $this->input->post('RazaoSocial'),
                    'tel_fixo' => $this->input->post('TelFixo'),
                    'tel_cel' => $this->input->post('TelCel'),
                    'email_contato' => $this->input->post('Email'),
                    'data_validade' => date('Y-m-d', strtotime('+30 days')),
                    'ip_aceite_termo' => $ipaddress,
                    'data_hora_aceite_termo' => date('Y-m-d H:i:s'),
                    'e_mail_confirmado' => 0,
                    'hash_confirma_email' => $hashEmail,
                ];

                $idEmpresa = $this->empresa->insertEmpresa($dadosEmpresa);

                $idEstabelecimento = $this->estabelecimento->insertEstabelecimento(array(
                    'id_empresa' => $idEmpresa,
                    'tipo_estabelecimento' => 1,
                    'razao_social' => $this->input->post('RazaoSocial'),
                    'nome_estabelecimento' => $this->input->post('NomeEmpresa'),
                    'tipo_pessoa' => $this->input->post('TipoPessoa'),
                    'cnpj_cpf' => $this->input->post('CnpjCpf'),
                    'tel_fixo' => $this->input->post('TelFixo'),
                    'tel_cel' => $this->input->post('TelCel'),
                    'email_contato' => $this->input->post('Email')
                ));

                $dadosConta = [
                    'id_empresa' => $idEmpresa,
                    'id_estabelecimento' => $idEstabelecimento,
                    'nome_conta'  => "Carteira",
                    'ativo' => 1
                ];

                $codConta = $this->financeiro->insertConta($dadosConta);

                $dadosEmpresa = null;
                $dadosEmpresa = [
                    'conta_padrao' => $codConta,
                ];

                $this->empresa->updateEmpresa($idEmpresa, $dadosEmpresa);

                $dadosUnidadeMedida = array(
                    array ('id_empresa' => $idEmpresa, 'cod_unidade_medida' => 'CX', 'nome_unidade_medida' => 'Caixa'),
                    array ('id_empresa' => $idEmpresa, 'cod_unidade_medida' => 'PC', 'nome_unidade_medida' => 'Peça'),
                    array ('id_empresa' => $idEmpresa, 'cod_unidade_medida' => 'UN', 'nome_unidade_medida' => 'Unidade'),
                    array ('id_empresa' => $idEmpresa, 'cod_unidade_medida' => 'KG', 'nome_unidade_medida' => 'Quilograma'),
                    array ('id_empresa' => $idEmpresa, 'cod_unidade_medida' => 'MT', 'nome_unidade_medida' => 'Metro'),
                    array ('id_empresa' => $idEmpresa, 'cod_unidade_medida' => 'M2', 'nome_unidade_medida' => 'Metro Quadrado'),
                    array ('id_empresa' => $idEmpresa, 'cod_unidade_medida' => 'HR', 'nome_unidade_medida' => 'Hora'),
                    array ('id_empresa' => $idEmpresa, 'cod_unidade_medida' => 'LT', 'nome_unidade_medida' => 'Litro')
                );

                $this->unidademedida->insertMultUnidadeMedida($dadosUnidadeMedida);

                $dadosTipoProduto = array(
                    array ('id_empresa' => $idEmpresa, 'nome_tipo_produto' => 'Produto Acabado', 'origem_produto' => '1'),
                    array ('id_empresa' => $idEmpresa, 'nome_tipo_produto' => 'Produto Intermediário', 'origem_produto' => '1'),
                    array ('id_empresa' => $idEmpresa, 'nome_tipo_produto' => 'Matéria-Prima', 'origem_produto' => '2'),
                    array ('id_empresa' => $idEmpresa, 'nome_tipo_produto' => 'Serviço', 'origem_produto' => '2'),
                    array ('id_empresa' => $idEmpresa, 'nome_tipo_produto' => 'Outros Insumos', 'origem_produto' => '2')
                );

                $this->tipoproduto->insertMultTipoProduto($dadosTipoProduto);

                $adosUsuario = [
                    'id_empresa' => $idEmpresa,
                    'email' => $this->input->post('Email'),
                    'nome_usuario'  => $this->input->post('NomeUsuario'),
                    'senha' => sha1($this->input->post('Senha1')),
                    'tipo_acesso' => 1
                ];

                $erro = $this->usuario->insertUsuario($adosUsuario);

                /*$sessao = array(
                    'id_empresa' => $idEmpresa,
                    'nome_empresa' => $this->input->post('NomeEmpresa'),
                    'nome_usuario' => $this->input->post('NomeUsuario'),
                    'email' => $this->input->post('Email'),
                    'tipo_acesso' => 1,
                    'producao' => 1,
                    'vendas' => 1,
                    'compras' => 1,
                    'estoque' => 1,
                    'financeiro' => 1,
                );

                $this->session->set_userdata('usuario', $sessao);*/

                if(!is_dir("clientes/" . $idEmpresa)){

                    mkdir("clientes/" . $idEmpresa, 0755);
                }
                if(!is_dir("clientes/" . $idEmpresa . "/xmls")){

                    mkdir("clientes/" . $idEmpresa . "/xmls", 0755);
                }

                if(!is_dir("clientes/" . $idEmpresa . "/certificado")){

                    mkdir("clientes/" . $idEmpresa . "/certificado", 0755);
                    
                }

                $empresa = $this->empresa->getEmpresaPorCodigo($idEmpresa);
                if($empresa == null){
                    $this->session->set_flashdata('erro', 'Empresa não encontrada');
                    redirect(base_url(), "login", "refresh");
                }
                $usuario = $this->usuario->getUsuarioPorCodigo($empresa->email_contato);
                if($usuario == null){
                    $this->session->set_flashdata('erro', 'Usuario não encontrada');
                    redirect(base_url(), "login", "refresh");
                }

                // Envio de E-mail de Boas-Vindas
                $this->email->emailBoasVindas($empresa->nome_empresa, $empresa->tel_cel, $usuario->nome_usuario, $empresa->email_contato, $empresa->data_validade, $idEmpresa, $empresa->hash_confirma_email);
                
                redirect(base_url('confirmar-email/' . $idEmpresa), "home", "refresh");
            }
        }
    }

     //Form Validation customizadas
     public function valida_senha($str)
     {
         if($this->input->post('Senha1') != $str){
             $this->form_validation->set_message('valida_senha', 'Senhas informadas são diferentes');
             return false;
         }else{
             return true;
         }
     }
}
