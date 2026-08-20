<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EstabelecimentoController extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('Estabelecimento', 'estabelecimento');

        if(usuarioLogado() == false){
            redirect(base_url('login'), 'home', 'refresh');
        }
        if((int) getDadosUsuarioLogado()['tipo_acesso'] !== 1){
            show_error('Você não possui permissão para gerenciar estabelecimentos.', 403);
        }
    }

    private function regras($ignorarId = null){
        $this->form_validation->set_rules('TipoEstabelecimento', 'Tipo de Estabelecimento', 'required|in_list[1,2]',
            array('required' => 'Você deve preencher o campo %s'));
        $this->form_validation->set_rules('TipoPessoa', 'Tipo Pessoa', 'required|in_list[1,2]',
            array('required' => 'Você deve preencher o campo %s'));
        $this->form_validation->set_rules('NomeEmpresa', 'Nome do Estabelecimento', 'required|max_length[100]',
            array('required' => 'Você deve preencher o campo %s',
                  'max_length' => 'O campo %s não deve ter mais que 100 caracteres'));
        $this->form_validation->set_rules('EmailContato', 'E-mail de Contato', 'valid_email|max_length[60]',
            array('valid_email' => 'É necessário informar um e-mail válido',
                  'max_length' => 'O campo %s não deve ter mais que 60 caracteres'));
        $this->form_validation->set_rules('Endereco', 'Endereço', 'max_length[50]');
        $this->form_validation->set_rules('Bairro', 'Bairro', 'max_length[45]');

        if($this->input->post('CnpjCpf') != ''){
            $documento = $this->input->post('TipoPessoa') == '1' ? 'CNPJ' : 'CPF';
            $tamanho = $this->input->post('TipoPessoa') == '1' ? 18 : 14;
            $regraDocumento = $ignorarId === null
                ? 'callback_documento_disponivel'
                : "callback_documento_disponivel[{$ignorarId}]";
            $this->form_validation->set_rules('CnpjCpf', $documento,
                "min_length[{$tamanho}]|{$regraDocumento}",
                array('min_length' => 'O campo %s não está completo'));
        }
    }

    private function valorDecimal($campo, $padrao){
        $valor = $this->input->post($campo);
        if($valor === null || $valor === '') return $padrao;
        return str_replace(',', '.', str_replace('.', '', $valor));
    }

    private function dadosPost(){
        return array(
            'id_empresa' => getDadosUsuarioLogado()['id_empresa'],
            'tipo_estabelecimento' => $this->input->post('TipoEstabelecimento'),
            'nome_estabelecimento' => $this->input->post('NomeEmpresa'),
            'razao_social' => $this->input->post('RazaoSocial'),
            'tipo_pessoa' => $this->input->post('TipoPessoa'),
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
            'csc' => $this->input->post('CSC'), 'csc_id' => $this->input->post('CSCid'),
            'ambiente_nfe' => $this->input->post('AmbienteNFe'),
            'serie' => $this->input->post('Serie'), 'serie_nfce' => $this->input->post('SerieNFce'),
            'modelo' => $this->input->post('Modelo') ?: '',
            'modelo_nfce' => $this->input->post('ModeloNFce') ?: '',
            'codigo_regime_tributario' => $this->input->post('CRT') ?: '',
            'percentual_credito_sn' => $this->valorDecimal('percentual_credito_sn', 0),
            'num_ultima_nf' => $this->input->post('NumUltNF'),
            'num_ultima_nfce' => $this->input->post('NumUltNFce'),
            'integ_vendas_externas' => $this->input->post('VendasExternas') ? 1 : 0,
            'integ_usuario_vendas_externas' => $this->input->post('UsuarioVendasExternas') ?: '',
            'integ_senha_vendas_externas' => $this->input->post('SenhaVendasExternas') ?: '',
            'cred_devol_vendas_externas' => $this->input->post('CreditoDevolucao'),
            'custo_folha' => $this->valorDecimal('CustoFolha', 0),
            'horas_consideradas' => $this->valorDecimal('HorasConsideradas', 220)
        );
    }

    private function objetoVazio(){
        $campos = array(
            'id_estabelecimento' => null, 'id_empresa' => getDadosUsuarioLogado()['id_empresa'],
            'tipo_estabelecimento' => 1, 'razao_social' => '', 'nome_empresa' => '', 'tipo_empresa' => 1,
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

    private function dadosFormulario($registro){
        return array(
            'empresa' => $registro,
            'lista_cidade' => $this->tabelasauxiliares->getCidade(),
            'lista_conta' => $this->financeiro->getConta(),
            'lista_centro_custo' => $this->financeiro->getCentroCustoAtivo(),
            'lista_conta_contabil' => $this->financeiro->getContaContabilAtivo(),
            'lista_metodo_pagamento' => $this->financeiro->getMetodoPagamento(),
            'lista_natureza_operacao' => $this->naturezaOperacao->getAll(),
            'menu' => 'Admin'
        );
    }

    private function adicionarArquivos(&$dados){
        if(!empty($_FILES['certificado']['name'])) $dados['caminho_certificado'] = 'certificado.pfx';
        if(!empty($_FILES['logo']['name'])) $dados['caminho_logo'] = 'logo.' . pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION);
        if($this->input->post('SenhaCertificado') != '') $dados['senha_certificado'] = $this->input->post('SenhaCertificado');
    }

    private function salvarArquivos($idEstabelecimento){
        $diretorio = 'clientes/' . getDadosUsuarioLogado()['id_empresa'] . "/estabelecimentos/{$idEstabelecimento}";
        foreach(array($diretorio, "{$diretorio}/certificado", "{$diretorio}/logo") as $pasta){
            if(!is_dir($pasta)) mkdir($pasta, 0755, true);
        }
        if(!empty($_FILES['certificado']['name'])) move_uploaded_file($_FILES['certificado']['tmp_name'], "{$diretorio}/certificado/certificado.pfx");
        if(!empty($_FILES['logo']['name'])){
            $nome = 'logo.' . pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION);
            move_uploaded_file($_FILES['logo']['tmp_name'], "{$diretorio}/logo/{$nome}");
        }
    }

    public function listar(){
        $filter = $this->input->get('buscar') ?: '';
        $offset = $this->uri->segment(2) ?: 0;
        $config = array(
            'base_url' => base_url('estabelecimentos'), 'per_page' => 15, 'num_links' => 10,
            'uri_segment' => 2, 'total_rows' => $this->estabelecimento->countAll($filter),
            'reuse_query_string' => true,
            'full_tag_open' => '<ul class="pagination justify-content-center mb-0 link-load">',
            'full_tag_close' => '</ul>', 'first_link' => false, 'last_link' => false,
            'prev_link' => '&laquo;', 'prev_tag_open' => '<li class="page-item prev">', 'prev_tag_close' => '</li>',
            'next_link' => '&raquo;', 'next_tag_open' => '<li class="page-item next">', 'next_tag_close' => '</li>',
            'cur_tag_open' => '<li class="page-item active"><span class="page-link">', 'cur_tag_close' => '</span></li>',
            'num_tag_open' => '<li class="page-item">', 'num_tag_close' => '</li>'
        );
        $this->pagination->initialize($config);
        $this->load->view('cadastros/estabelecimento', array(
            'filter' => $filter, 'pagination' => $this->pagination->create_links(),
            'lista_estabelecimento' => $this->estabelecimento->getEstabelecimentos($filter, $config['per_page'], $offset),
            'menu' => 'Admin'
        ));
    }

    public function novo(){
        $this->load->view('cadastros/novo-estabelecimento', $this->dadosFormulario($this->objetoVazio()));
    }

    public function inserir(){
        $this->regras();
        if($this->form_validation->run() == false){
            $this->session->set_flashdata('erro', validation_errors());
            $this->novo();
            return;
        }
        $dados = $this->dadosPost();
        $this->adicionarArquivos($dados);
        $id = $this->estabelecimento->insertEstabelecimento($dados);
        $this->salvarArquivos($id);
        $this->session->set_flashdata('sucesso', 'Estabelecimento cadastrado com sucesso');
        redirect(base_url("estabelecimentos/editar-estabelecimento/{$id}"));
    }

    public function editar($id){
        $registro = $this->estabelecimento->buscarPorCodigo((int) $id);
        if($registro === null){ show_404(); return; }
        $this->load->view('cadastros/editar-estabelecimento', $this->dadosFormulario($registro));
    }

    public function salvar($id){
        $registro = $this->estabelecimento->buscarPorCodigo((int) $id);
        if($registro === null){ show_404(); return; }
        $this->regras((int) $id);
        if($this->form_validation->run() == false){
            $this->session->set_flashdata('erro', validation_errors());
            $this->editar($id);
            return;
        }
        $dados = $this->dadosPost();
        if($this->input->post('SenhaVendasExternas') == '') unset($dados['integ_senha_vendas_externas']);
        $this->adicionarArquivos($dados);
        $this->estabelecimento->updateEstabelecimento((int) $id, $dados);
        $this->salvarArquivos((int) $id);
        $this->session->set_flashdata('sucesso', 'Estabelecimento alterado com sucesso');
        redirect(base_url("estabelecimentos/editar-estabelecimento/{$id}"));
    }

    public function documento_disponivel($documento, $ignorarId = null){
        $ignorarId = $ignorarId !== '' ? (int) $ignorarId : null;
        if($this->estabelecimento->getPorDocumento($documento, $ignorarId) !== null){
            $this->form_validation->set_message('documento_disponivel', 'Já há um estabelecimento cadastrado com o CNPJ/CPF informado');
            return false;
        }
        return true;
    }
}
