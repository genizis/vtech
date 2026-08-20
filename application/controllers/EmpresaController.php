<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EmpresaController extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('Estabelecimento', 'estabelecimento');

        if(usuarioLogado() == false){

            redirect(base_url("login"), "home", "refresh");

        }
    }

    private function validarAdministrador(){
        if((int) getDadosUsuarioLogado()['tipo_acesso'] !== 1){
            show_error('Você não possui permissão para gerenciar empresas.', 403);
            return false;
        }

        return true;
    }

    private function empresaPermitida($idEmpresa){
        return $this->empresa->usuarioPodeAcessarEmpresa(
            getDadosUsuarioLogado()['email'],
            (int) $idEmpresa
        );
    }

    private function regrasCadastroEmpresa($validarDocumento = true){
        $this->form_validation->set_rules('TipoPessoa', 'Tipo Pessoa', 'required|in_list[1,2]',
            array('required' => 'Você deve preencher o campo %s'));
        $this->form_validation->set_rules('NomeEmpresa', 'Nome da Empresa', 'required|max_length[100]',
            array('required' => 'Você deve preencher o campo %s',
                  'max_length' => 'O campo %s não deve ter mais que 100 caracteres'));
        $this->form_validation->set_rules('EmailContato', 'E-mail de Contato', 'valid_email|max_length[60]',
            array('max_length' => 'O campo %s não deve ter mais que 60 caracteres',
                  'valid_email' => 'É necessário informar um e-mail válido'));
        $this->form_validation->set_rules('Endereco', 'Endereço', 'max_length[50]',
            array('max_length' => 'O campo %s não deve ter mais que 50 caracteres'));
        $this->form_validation->set_rules('Bairro', 'Bairro', 'max_length[45]',
            array('max_length' => 'O campo %s não deve ter mais que 45 caracteres'));

        $regraDocumento = $validarDocumento ? '|callback_empresa_doc_exists' : '';
        if($this->input->post('TipoPessoa') == '1' && $this->input->post('CnpjCpf') != ''){
            $this->form_validation->set_rules('CnpjCpf', 'CNPJ', 'min_length[18]' . $regraDocumento,
                array('min_length' => 'O campo %s não está completo'));
        }elseif($this->input->post('TipoPessoa') == '2' && $this->input->post('CnpjCpf') != ''){
            $this->form_validation->set_rules('CnpjCpf', 'CPF', 'min_length[14]' . $regraDocumento,
                array('min_length' => 'O campo %s não está completo'));
        }
    }

    private function dadosCadastroEmpresa(){
        return array(
            'nome_empresa' => $this->input->post('NomeEmpresa'),
            'razao_social' => $this->input->post('RazaoSocial'),
            'tipo_empresa' => $this->input->post('TipoPessoa'),
            'cnpj_cpf' => $this->input->post('CnpjCpf'),
            'tel_fixo' => $this->input->post('TelFixo'),
            'tel_cel' => $this->input->post('TelCel'),
            'email_contato' => $this->input->post('EmailContato'),
            'cep' => $this->input->post('CEP'),
            'endereco' => $this->input->post('Endereco'),
            'numero' => $this->input->post('Numero'),
            'complemento' => $this->input->post('Complemento'),
            'bairro' => $this->input->post('Bairro'),
            'cod_cidade' => $this->input->post('Cidade'),
            'conta_padrao' => $this->input->post('CodConta'),
            'metodo_pagamento_frente_caixa' => $this->input->post('MetodoPagamentoFrenteCaixa'),
            'centro_custo_frente_caixa' => $this->input->post('CentroCustoFrenteCaixa'),
            'conta_contabil_frente_caixa' => $this->input->post('ContaContabilFrenteCaixa'),
            'centro_custo_vendas' => $this->input->post('CentroCustoVendas'),
            'conta_contabil_vendas' => $this->input->post('ContaContabilVendas'),
            'centro_custo_compras' => $this->input->post('CentroCustoCompras'),
            'conta_contabil_compras' => $this->input->post('ContaContabilCompras'),
            'clientes_ativos' => $this->input->post('DiasAtivo') ?: 60,
            'clientes_inativos_recentes' => $this->input->post('InativoRecente') ?: 90,
            'natureza_caixa' => $this->input->post('NaturCaixa'),
            'insc_estadual' => $this->input->post('InscEstadual'),
            'isenta_ie' => $this->input->post('Isenta') ? 1 : 0,
            'versao_nfe' => $this->input->post('Versao'),
            'schema_nfe' => $this->input->post('SchemaNFe') ?: '',
            'csc' => $this->input->post('CSC'),
            'csc_id' => $this->input->post('CSCid'),
            'ambiente_nfe' => $this->input->post('AmbienteNFe'),
            'serie' => $this->input->post('Serie'),
            'serie_nfce' => $this->input->post('SerieNFce'),
            'modelo' => $this->input->post('Modelo') ?: '',
            'modelo_nfce' => $this->input->post('ModeloNFce') ?: '',
            'codigo_regime_tributario' => $this->input->post('CRT') ?: '',
            'percentual_credito_sn' => str_replace(',', '.', str_replace('.', '', $this->input->post('percentual_credito_sn') ?: '0')),
            'num_ultima_nf' => $this->input->post('NumUltNF'),
            'num_ultima_nfce' => $this->input->post('NumUltNFce'),
            'integ_vendas_externas' => $this->input->post('VendasExternas') ? 1 : 0,
            'integ_usuario_vendas_externas' => $this->input->post('UsuarioVendasExternas') ?: '',
            'integ_senha_vendas_externas' => $this->input->post('SenhaVendasExternas') ?: '',
            'cred_devol_vendas_externas' => $this->input->post('CreditoDevolucao'),
            'custo_folha' => str_replace(',', '.', str_replace('.', '', $this->input->post('CustoFolha') ?: '0')),
            'horas_consideradas' => str_replace(',', '.', str_replace('.', '', $this->input->post('HorasConsideradas') ?: '220'))
        );
    }

    private function dadosFormularioCadastro($empresa){
        $listaConta = array();
        $listaCentroCusto = array();
        $listaContaContabil = array();
        $listaMetodoPagamento = array();
        $listaNaturezaOperacao = array();

        if($empresa->id_empresa !== null){
            $usuarioOriginal = getDadosUsuarioLogado();
            $usuarioConsulta = $usuarioOriginal;
            $usuarioConsulta['id_empresa'] = $empresa->id_empresa;
            $this->session->set_userdata('usuario', $usuarioConsulta);

            $listaConta = $this->financeiro->getConta();
            $listaCentroCusto = $this->financeiro->getCentroCustoAtivo();
            $listaContaContabil = $this->financeiro->getContaContabilAtivo();
            $listaMetodoPagamento = $this->financeiro->getMetodoPagamento();
            $listaNaturezaOperacao = $this->naturezaOperacao->getAll();

            $this->session->set_userdata('usuario', $usuarioOriginal);
        }

        return array(
            'empresa' => $empresa,
            'lista_cidade' => $this->tabelasauxiliares->getCidade(),
            'lista_conta' => $listaConta,
            'lista_centro_custo' => $listaCentroCusto,
            'lista_conta_contabil' => $listaContaContabil,
            'lista_metodo_pagamento' => $listaMetodoPagamento,
            'lista_natureza_operacao' => $listaNaturezaOperacao,
            'menu' => 'Admin'
        );
    }

    private function novaEmpresaVazia(){
        $campos = array(
            'id_empresa' => null, 'razao_social' => '', 'nome_empresa' => '', 'tipo_empresa' => 1,
            'cnpj_cpf' => '', 'tel_fixo' => '', 'tel_cel' => '', 'email_contato' => '', 'cep' => '',
            'endereco' => '', 'numero' => '', 'complemento' => '', 'bairro' => '', 'cod_cidade' => null,
            'caminho_logo' => '', 'conta_padrao' => null, 'metodo_pagamento_frente_caixa' => null,
            'centro_custo_frente_caixa' => null, 'conta_contabil_frente_caixa' => null,
            'centro_custo_vendas' => null, 'conta_contabil_vendas' => null, 'centro_custo_compras' => null,
            'conta_contabil_compras' => null, 'natureza_caixa' => null, 'insc_estadual' => '', 'isenta_ie' => 0,
            'versao_nfe' => '', 'ambiente_nfe' => null, 'schema_nfe' => '', 'serie' => '', 'serie_nfce' => '',
            'modelo' => '', 'modelo_nfce' => '', 'csc' => '', 'csc_id' => '', 'codigo_regime_tributario' => '',
            'num_ultima_nf' => null, 'num_ultima_nfce' => null, 'caminho_certificado' => '',
            'integ_vendas_externas' => 0, 'integ_usuario_vendas_externas' => '',
            'integ_senha_vendas_externas' => '', 'cred_devol_vendas_externas' => '', 'custo_folha' => 0,
            'horas_consideradas' => 220, 'percentual_credito_sn' => 0, 'clientes_ativos' => 60,
            'clientes_inativos_recentes' => 90
        );
        return (object) $campos;
    }

    private function adicionarArquivosEmpresa(&$dados){
        if(!empty($_FILES['certificado']['name'])){
            $dados['caminho_certificado'] = 'certificado.pfx';
        }
        if(!empty($_FILES['logo']['name'])){
            $dados['caminho_logo'] = 'logo.' . pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION);
        }
        if($this->input->post('SenhaCertificado') != ''){
            $dados['senha_certificado'] = $this->input->post('SenhaCertificado');
        }
    }

    private function salvarArquivosEmpresa($idEmpresa){
        $diretorio = "clientes/{$idEmpresa}";
        foreach(array($diretorio, "{$diretorio}/xmls", "{$diretorio}/certificado", "{$diretorio}/logo") as $pasta){
            if(!is_dir($pasta)) mkdir($pasta, 0755);
        }
        if(!empty($_FILES['certificado']['name'])){
            move_uploaded_file($_FILES['certificado']['tmp_name'], "{$diretorio}/certificado/certificado.pfx");
        }
        if(!empty($_FILES['logo']['name'])){
            $nomeLogo = 'logo.' . pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION);
            move_uploaded_file($_FILES['logo']['tmp_name'], "{$diretorio}/logo/{$nomeLogo}");
        }
    }

    public function listarEmpresas(){
        if(!$this->validarAdministrador()) return;

        $usuario = getDadosUsuarioLogado();
        $filter = $this->input->get('buscar') ?: '';
        $offset = $this->uri->segment(2) ?: 0;
        $config = array(
            'base_url' => base_url('empresas'), 'per_page' => 15, 'num_links' => 10,
            'uri_segment' => 2,
            'total_rows' => $this->empresa->countEmpresasDoUsuario($usuario['email'], $filter),
            'reuse_query_string' => true,
            'full_tag_open' => '<ul class="pagination justify-content-center mb-0 link-load">',
            'full_tag_close' => '</ul>', 'first_link' => false, 'last_link' => false,
            'prev_link' => '&laquo;', 'prev_tag_open' => '<li class="page-item prev">',
            'prev_tag_close' => '</li>', 'next_link' => '&raquo;',
            'next_tag_open' => '<li class="page-item next">', 'next_tag_close' => '</li>',
            'cur_tag_open' => '<li class="page-item active"><span class="page-link">',
            'cur_tag_close' => '</span></li>', 'num_tag_open' => '<li class="page-item">',
            'num_tag_close' => '</li>'
        );
        $this->pagination->initialize($config);

        $dados = array(
            'filter' => $filter,
            'pagination' => $this->pagination->create_links(),
            'lista_empresa' => $this->empresa->getEmpresasDoUsuario($usuario['email'], $filter, $config['per_page'], $offset),
            'menu' => 'Admin'
        );
        $this->load->view('cadastros/empresa', $dados);
    }

    public function formEmpresa(){
        if(!$this->validarAdministrador()) return;
        $this->load->view('cadastros/nova-empresa', $this->dadosFormularioCadastro($this->novaEmpresaVazia()));
    }

    public function inserirEmpresa(){
        if(!$this->validarAdministrador()) return;
        $this->regrasCadastroEmpresa();

        if($this->form_validation->run() == false){
            $this->session->set_flashdata('erro', validation_errors());
            $this->formEmpresa();
            return;
        }

        $dados = $this->dadosCadastroEmpresa() + array(
            'data_validade' => date('Y-m-d', strtotime('+30 days')), 'quant_usuarios' => 5,
            'token_ibpt' => ''
        );
        $this->adicionarArquivosEmpresa($dados);
        $this->db->trans_start();
        $idEmpresa = $this->empresa->insertEmpresa($dados);
        $this->empresa->garantirAcessoEmpresa(getDadosUsuarioLogado()['email'], $idEmpresa);
        $this->estabelecimento->insertEstabelecimento(array(
            'id_empresa' => $idEmpresa,
            'tipo_estabelecimento' => 1,
            'razao_social' => $dados['razao_social'],
            'nome_estabelecimento' => $dados['nome_empresa'],
            'tipo_pessoa' => $dados['tipo_empresa'],
            'cnpj_cpf' => $dados['cnpj_cpf'],
            'tel_fixo' => $dados['tel_fixo'],
            'tel_cel' => $dados['tel_cel'],
            'email_contato' => $dados['email_contato'],
            'cep' => $dados['cep'],
            'endereco' => $dados['endereco'],
            'numero' => $dados['numero'],
            'complemento' => $dados['complemento'],
            'bairro' => $dados['bairro'],
            'cod_cidade' => $dados['cod_cidade']
        ));
        $this->db->trans_complete();

        if($this->db->trans_status() === false){
            $this->session->set_flashdata('erro', 'Não foi possível cadastrar a empresa');
            redirect(base_url('empresas/nova-empresa'));
            return;
        }
        $this->salvarArquivosEmpresa($idEmpresa);

        $this->session->set_flashdata('sucesso', 'Empresa cadastrada com sucesso');
        if($this->input->post('Opcao') == 'salvarContinuar'){
            redirect(base_url('empresas/nova-empresa'));
        }else{
            redirect(base_url("empresas/editar-empresa/{$idEmpresa}"));
        }
    }

    public function editarCadastroEmpresa($idEmpresa){
        if(!$this->validarAdministrador()) return;
        if(!$this->empresaPermitida($idEmpresa)){
            show_error('Empresa inválida ou não autorizada para este usuário.', 403);
            return;
        }

        $empresa = $this->empresa->getEmpresaPorCodigo((int) $idEmpresa);
        if($empresa === null){
            show_404();
            return;
        }

        $this->load->view('cadastros/editar-empresa', $this->dadosFormularioCadastro($empresa));
    }

    public function salvarCadastroEmpresa($idEmpresa){
        if(!$this->validarAdministrador()) return;
        if(!$this->empresaPermitida($idEmpresa)){
            show_error('Empresa inválida ou não autorizada para este usuário.', 403);
            return;
        }

        $empresaAtual = $this->empresa->getEmpresaPorCodigo((int) $idEmpresa);
        if($empresaAtual === null){
            show_404();
            return;
        }
        $this->regrasCadastroEmpresa($empresaAtual->cnpj_cpf !== $this->input->post('CnpjCpf'));

        if($this->form_validation->run() == false){
            $this->session->set_flashdata('erro', validation_errors());
            $this->editarCadastroEmpresa($idEmpresa);
            return;
        }

        $dados = $this->dadosCadastroEmpresa();
        if($this->input->post('SenhaVendasExternas') == ''){
            unset($dados['integ_senha_vendas_externas']);
        }
        $this->adicionarArquivosEmpresa($dados);
        $this->empresa->updateEmpresa((int) $idEmpresa, $dados);
        $this->salvarArquivosEmpresa((int) $idEmpresa);
        if((int) $idEmpresa === (int) getDadosUsuarioLogado()['id_empresa']){
            $usuario = getDadosUsuarioLogado();
            $usuario['nome_empresa'] = $this->input->post('NomeEmpresa');
            $this->session->set_userdata('usuario', $usuario);
        }
        $this->session->set_flashdata('sucesso', 'Empresa alterada com sucesso');
        redirect(base_url("empresas/editar-empresa/{$idEmpresa}"));
    }

    public function empresa_doc_exists($documento){
        if($this->empresa->getEmpresaPorDocumento($documento) !== null){
            $this->form_validation->set_message('empresa_doc_exists', 'Já há uma empresa cadastrada com o CNPJ/CPF informado');
            return false;
        }
        return true;
    }

    public function trocarEmpresa(){
        $usuario = getDadosUsuarioLogado();

        if((int) $usuario['tipo_acesso'] !== 1){
            show_error('Você não possui permissão para trocar de empresa.', 403);
            return;
        }

        $idEmpresa = (int) $this->input->post('IdEmpresa');
        if($idEmpresa <= 0 || !$this->empresa->usuarioPodeAcessarEmpresa($usuario['email'], $idEmpresa)){
            show_error('Empresa inválida ou não autorizada para este usuário.', 403);
            return;
        }

        $empresa = $this->empresa->getEmpresaPorCodigo($idEmpresa);
        if($empresa === null){
            show_404();
            return;
        }

        $usuario['id_empresa'] = $empresa->id_empresa;
        $usuario['nome_empresa'] = $empresa->nome_empresa;
        $this->session->set_userdata('usuario', $usuario);
        $this->session->sess_regenerate(true);
        $this->session->set_flashdata('sucesso', 'Empresa alterada para ' . $empresa->nome_empresa . '.');

        redirect(base_url('visao-geral'), 'location', 303);
    }

    public function formNaturezaOperacao(){

        $dados = array(
            'menu' => 'Admin'
        );

        $this->load->view('cadastros/nova-natureza-operacao', $dados);

    }

    public function editarMeusDados(){

        $listaUsuario = $this->usuario->getUsuarioPorCodigo(getDadosUsuarioLogado()['email']);

        if($listaUsuario == null){
            redirect(base_url('visao-geral'));

        }else{
            $dados = array(
                'usuario' => $listaUsuario,
                'menu' => 'Admin'
            );
        }

        $this->load->view('cadastros/meus-dados', $dados);

    }

    public function salvarMeusDados(){

        $this->form_validation->set_rules('NomeUsuario', 'Nome do Usuário', 'required|max_length[100]',
            array('required' => 'Você deve preencher o campo %s',
                  'max_length' => 'O campo %s não deve ter mais que 100 caracteres'));

        if($this->input->post('Senha1') <> '' || $this->input->post('Senha1') <> ''){
            $this->form_validation->set_rules('Senha1', 'Senha', 'required',
                array('required' => 'Você deve preencher o campo %s'));
            $this->form_validation->set_rules('Senha2', 'Confirma a Senha', 'required|callback_valida_senha',
                array('required' => 'Você deve preencher o campo %s'));
        }

        if($this->form_validation->run() == false){

            $this->session->set_flashdata('erro', validation_errors());
            $this->editarMeusDados($this->input->post('Email'));

        }else {

            if($this->input->post('Senha1') <> ''){

                $data = [
                    'nome_usuario' => $this->input->post('NomeUsuario'),
                    'senha' => sha1($this->input->post('Senha1')),
                ];

            }else{

                $data = [
                    'nome_usuario' => $this->input->post('NomeUsuario'),
                ];

            }

            $this->usuario->updateUsuario($this->input->post('Email'), $data);

            $this->session->set_flashdata('sucesso', 'Usuário atualizado com sucesso');
            redirect(base_url('meus-dados'));
        }
    }

    public function solicitaConexaoContaAzul(){

        $redirectURI = "https://www.shopfloor.com.br/conta-azul-integration";
        $clientID = "rbOhYqzxUWhe7uXT58ZastCUeEDwPWbs";
        $state = "FSdsfa3435afsfasg33";

        redirect("https://api.contaazul.com/auth/authorize?redirect_uri={$redirectURI}&client_id={$clientID}&scope=sales&state={$state}");

    }

    public function callbackContaAzul(){

        $code = $this->input->get('code');
        $state = $this->input->get('state');

        redirect(base_url("conecta-conta-azul/{$code}/{$state}"), 'home', 'refresh');

    }

    public function conectaContaAzul(){
        $code = $this->uri->segment(2);
        $state = $this->uri->segment(3);

        $Cod = $this->contaazul->conectaContaAzul($code, $state);

        if(is_null($Cod)){

            $this->session->set_flashdata('erro', 'Erro ao conectar Conta Azul');
            redirect(base_url('dados-empresa'), 'home', 'refresh');

        }else{

            $this->session->set_flashdata('sucesso', 'Conta Azul conectada com sucesso');
            redirect(base_url('dados-empresa'), "home", "refresh");

        }

        $empresa = $this->empresa->getEmpresaPorCodigo(getDadosUsuarioLogado()['id_empresa']);
        if($empresa->data_validade < date('Y-m-d')){
            $this->session->set_flashdata('erro', 'Período de acesso finalizado, entre em 
                                           contato através do telefone (41) 9 9666 8250 ou pelo email contato@shopfloor.com.br para renovação');
            redirect(base_url('logout'), "home", "refresh");
        }

    }

    public function retiraNotificacaoContaAzul(){

        $dados = [
            'aviso_ca' => 1
        ];

        $this->empresa->updateEmpresa(getDadosUsuarioLogado()['id_empresa'], $dados);
        redirect(base_url(), 'home', 'refresh');

    }

    public function editarEmpresa(){

        $listaEmpresa = $this->empresa->getEmpresaPorCodigo(getDadosUsuarioLogado()['id_empresa']);
        $listaCidade = $this->tabelasauxiliares->getCidade();
        $listaConta = $this->financeiro->getConta();
        $listaCentroCusto = $this->financeiro->getCentroCustoAtivo();
        $listaContaContabil = $this->financeiro->getContaContabilAtivo();
        $listaMetodoPagamento = $this->financeiro->getMetodoPagamento();
        $listaNaturezaOperacai = $this->naturezaOperacao->getAll();

        if($listaEmpresa == null){
            redirect(base_url('visao-geral'));

        }else{
            $dados = array(
                'empresa' => $listaEmpresa,
                'lista_cidade' => $listaCidade,
                'lista_conta' => $listaConta,
                'lista_centro_custo' => $listaCentroCusto,
                'lista_conta_contabil' => $listaContaContabil,
                'lista_metodo_pagamento' => $listaMetodoPagamento,
                'lista_natureza_operacao' => $listaNaturezaOperacai,
                'menu' => ''
            );
        }

        $this->load->view('cadastros/dados-empresa', $dados);

    }

    public function salvarEmpresa(){

        //Validações dos campo e array das mensagens apresentadas
        $this->form_validation->set_rules('NomeEmpresa', 'Nome da Empresa', 'required|max_length[60]',
            array('required' => 'Você deve preencher o campo %s',
                  'max_length' => 'O campo %s não deve ter mais que 60 caracteres'));
        $this->form_validation->set_rules('EmailContato', 'E-mail de Contato', 'required|valid_email|max_length[60]',
            array('required' => 'Você deve preencher o campo %s',
                  'max_length' => 'O campo %s não deve ter mais que 60 caracteres',
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

        if($this->form_validation->run() == false){

            $this->session->set_flashdata('erro', validation_errors());
            redirect(base_url('dados-empresa'), 'home', 'refresh');

        }else {

            $dados = [
                'razao_social'  => $this->input->post('RazaoSocial'),
                'nome_empresa'  => $this->input->post('NomeEmpresa'),
                'tipo_empresa' => $this->input->post('TipoPessoa'),
                'cnpj_cpf' => $this->input->post('CnpjCpf'),
                'tel_fixo' => $this->input->post('TelFixo'),
                'tel_cel' => $this->input->post('TelCel'),
                'email_contato' => $this->input->post('EmailContato'),
                'cep' => $this->input->post('CEP'),
                'endereco' => $this->input->post('Endereco'),
                'numero' => $this->input->post('Numero'),
                'complemento' => $this->input->post('Complemento'),
                'bairro' => $this->input->post('Bairro'),
                'cod_cidade' => $this->input->post('Cidade'),
                'conta_padrao' => $this->input->post('CodConta'),
                'metodo_pagamento_frente_caixa' => $this->input->post('MetodoPagamentoFrenteCaixa'),
                'centro_custo_frente_caixa' => $this->input->post('CentroCustoFrenteCaixa'),
                'conta_contabil_frente_caixa' => $this->input->post('ContaContabilFrenteCaixa'),
                'centro_custo_vendas' => $this->input->post('CentroCustoVendas'),
                'conta_contabil_vendas' => $this->input->post('ContaContabilVendas'),
                'centro_custo_compras' => $this->input->post('CentroCustoCompras'),
                'conta_contabil_compras' => $this->input->post('ContaContabilCompras'),
                'clientes_ativos' => $this->input->post('DiasAtivo'),
                'clientes_inativos_recentes' => $this->input->post('InativoRecente'),
                'natureza_caixa' => $this->input->post('NaturCaixa'),
                'insc_estadual' => $this->input->post('InscEstadual'),
                'isenta_ie' => ($this->input->post('Isenta')) ? $this->input->post('Isenta') : 0,
                'versao_nfe' => $this->input->post('Versao'),
                'schema_nfe' => $this->input->post('SchemaNFe'),
                'csc' => $this->input->post('CSC'),
                'csc_id' => $this->input->post('CSCid'),
                'ambiente_nfe' => $this->input->post('AmbienteNFe'),
                'serie' => $this->input->post('Serie'),
                'serie_nfce' => $this->input->post('SerieNFce'),
                'modelo' => $this->input->post('Modelo'),
                'modelo_nfce' => $this->input->post('ModeloNFce'),
                'codigo_regime_tributario' => $this->input->post('CRT'),
                'percentual_credito_sn' => str_replace(",",".",(str_replace(".","",$this->input->post('percentual_credito_sn')))),
                'num_ultima_nf' => $this->input->post('NumUltNF'),
                'num_ultima_nfce' => $this->input->post('NumUltNFce'),
                'integ_vendas_externas' => ($this->input->post('VendasExternas')) ? $this->input->post('VendasExternas') : 0,
                'integ_usuario_vendas_externas' => $this->input->post('UsuarioVendasExternas'),
                'integ_senha_vendas_externas' => $this->input->post('SenhaVendasExternas'),
                'cred_devol_vendas_externas' => $this->input->post('CreditoDevolucao'),
                'custo_folha' => str_replace(",",".",(str_replace(".","",$this->input->post('CustoFolha')))),
                'horas_consideradas' => str_replace(",",".",(str_replace(".","",$this->input->post('HorasConsideradas')))),
            ];

            if($_FILES['certificado']['name'] != ""){
                $dados = $dados + [
//                    'caminho_certificado' => ($_FILES['certificado']['name']) ? $_FILES['certificado']['name'] : null,
                    'caminho_certificado' => ($_FILES['certificado']['name']) ? 'certificado.pfx' : null,
                ];
            }

            if($_FILES['logo']['name'] != ""){
                $nameFile = "logo." . pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION);
                $dados = $dados + [
                    'caminho_logo' => ($_FILES['logo']['name']) ? $nameFile : null,
                ];
            }

            if($this->input->post('SenhaCertificado') != ""){
                $dados = $dados + [
                    'senha_certificado' => $this->input->post('SenhaCertificado') ? $this->input->post('SenhaCertificado') : null,
                ];
            }

            $this->empresa->updateEmpresa(getDadosUsuarioLogado()['id_empresa'], $dados);

            if(!is_dir("clientes/" . getDadosUsuarioLogado()['id_empresa'])){

                mkdir("clientes/" . getDadosUsuarioLogado()['id_empresa'], 0755);
            }
            if(!is_dir("clientes/" . getDadosUsuarioLogado()['id_empresa'] . "/xmls")){

                mkdir("clientes/" . getDadosUsuarioLogado()['id_empresa'] . "/xmls", 0755);
            }

            if(!is_dir("clientes/" . getDadosUsuarioLogado()['id_empresa'] . "/certificado")){

                mkdir("clientes/" . getDadosUsuarioLogado()['id_empresa'] . "/certificado", 0755);
            }

            if(!is_dir("clientes/" . getDadosUsuarioLogado()['id_empresa'] . "/logo")){

                mkdir("clientes/" . getDadosUsuarioLogado()['id_empresa'] . "/logo", 0755);
            }

            if($_FILES['certificado']['name'] != ""){

                $uploaddir = "clientes/" . getDadosUsuarioLogado()['id_empresa'] . "/certificado/";
                $uploadfile = $uploaddir . 'certificado.pfx';

                move_uploaded_file($_FILES['certificado']['tmp_name'], $uploadfile);

            }

            if($_FILES['logo']['name'] != ""){

                $nameFile = "logo." . pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION);

                $uploaddir = "clientes/" . getDadosUsuarioLogado()['id_empresa'] . "/logo/";
                $uploadfile = $uploaddir . $nameFile;

                move_uploaded_file($_FILES['logo']['tmp_name'], $uploadfile);

            }

            $this->session->set_flashdata('sucesso', 'Dados da empresa alterados com sucesso');
            redirect(base_url('dados-empresa'), 'home', 'refresh');
        }
    }

    public function excluirCliente()
    {

        $CodCliente = $this->input->post("excluir_todos");
        $numRegs = count($CodCliente);

        if($numRegs > 0){

            $erro = $this->cliente->deleteCliente($CodCliente);

            //Code 1451 - Não é permitido exluir registro sendo usado por outro registro
            if ($erro['code'] == 1451){
                $this->session->set_flashdata('cliente_erro', 'Exclusão não permitida. Registro em uso por outro cadastro');
            }else{
                $this->session->set_flashdata('cliente_sucesso', 'Registro(s) selecionado(s) excluído(s)');
            }

        }else {
            $this->session->set_flashdata('cliente_erro', 'Nenhum registro foi selecionado');
        }

        redirect(base_url('cliente'));
    }

    public function listarCliente(){

        $config = array(
            'base_url' => base_url('cliente'),
            'per_page' => 10,
            'num_links' => 10,
            'uri_segment' => 2,
            'total_rows' => $this->cliente->countAll(),
            'reuse_query_string' => true,
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

        $this->pagination->initialize($config);

        // Busca dos dados para apresentação
        $filter = ($this->input->get('buscar')) ? $this->input->get('buscar') : "";
        $offset = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $listaCliente = $this->cliente->getCliente($filter, $config["per_page"], $offset);


        $dados = array(
            'filter' => $filter,
            'pagination' => $this->pagination->create_links(),
            'lista_cliente' => $listaCliente,
            'menu' => ''
        );

        $this->load->view('cadastros/cliente', $dados);
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
