<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FornecedorController extends CI_Controller {

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

    public function formFornecedor(){

        $listaSegmento = $this->tabelasauxiliares->getSegmento();
        $listaCidade = $this->tabelasauxiliares->getCidade();  
        $listaPais = $this->tabelasauxiliares->getPais();      

        $dados = array(
            'lista_segmento' => $listaSegmento,
            'lista_cidade' => $listaCidade,
            'lista_pais' => $listaPais,
            'menu' => 'Cadastro'
        );

        $this->load->view('cadastros/novo-fornecedor', $dados);

    }  
    
    public function editarFornecedor($CodFornecedor){

        $listaFornecedor = $this->fornecedor->buscarPorCodigo($CodFornecedor);
        $listaSegmento = $this->tabelasauxiliares->getSegmento();
        $listaCidade = $this->tabelasauxiliares->getCidade();  
        $listaPais = $this->tabelasauxiliares->getPais(); 
        
        if($listaFornecedor == null){
            redirect(base_url('fornecedor'));
            
        }else{ 

            $dados = array(
                'fornecedor' => $listaFornecedor,
                'lista_segmento' => $listaSegmento,
                'lista_cidade' => $listaCidade,
                'lista_pais' => $listaPais,
                'menu' => 'Cadastro'
            );

            $this->load->view('cadastros/editar-fornecedor', $dados);
        }

    }

    public function listaImportaFornecedor(){ 
        
        if(1 == null){
            redirect(base_url('fornecedor'));
            
        }else{ 
            $dados = array(
                'lista_fornecedor' => null,
                'menu' => 'Cadastro'
            );
        }

        $this->load->view('cadastros/importar-fornecedor', $dados);

    }

    public function importarFornecedor(){

        if(pathinfo($_FILES['arquivo']['name'], PATHINFO_EXTENSION) == "csv"){

            $this->importaCSV();

        }elseif(pathinfo($_FILES['arquivo']['name'], PATHINFO_EXTENSION) == "xlsx"){

            $this->importaXLS();

        }else{

            $this->session->set_flashdata('erro', 'Formato de arquivo desconhecido');

            $listaFornecedor = null;
            $dados = array(
                'lista_fornecedor' => $listaFornecedor,
                'menu' => 'Cadastro'
            );

            $this->load->view('cadastros/importar-fornecedor', $dados);

        }        
    }

    public function importaCSV(){

        $listaFornecedor = null;
        $numrow = 0;
        if (($handle = fopen($_FILES['arquivo']['tmp_name'], "r")) != false) {
            while (($row = fgetcsv($handle, 1000, ";")) != false) {
                //$row = iconv('UTF-8', 'ISO-8859-1', $row);
                //$row = array_map("utf8_encode", $row); //added

                $numrow++;
                if($this->input->post('cabecalho') == '1' && $numrow == 1){
                    continue;
                }
                
                
                $codFornecedor = null;

                if(strlen($row[0]) == 14 || strlen($row[0]) == 18 || strlen($row[0]) == 0){                    

                    if($row[0] != 0){                            
                        $fornecedor = $this->fornecedor->getFornecedorPorDocumento($row[0]);
                    }else{
                        $fornecedor = $this->fornecedor->getFornecedorPorNome($row[1]);
                    }

                    if($fornecedor != null){
                        $codFornecedor = $fornecedor->cod_fornecedor;
                        $resultado = 3;
                        $descResultado = "<strong>Não possível importar</strong><br>
                                        Fornecedor já cadastrado na base dados";
                    }elseif($row[1] == ""){
                        $resultado = 3;
                        $descResultado = "<strong>Não possível importar</strong><br>
                                        Fornecedor sem nome definido";
                    }else{

                        $resultado = 1;
                        $descResultado = "<strong>Importado com sucesso</strong>";

                        if(strlen($row[0]) == 14){
                            $tipoPessoa = 2;
                        }else{
                            $tipoPessoa = 1;
                        }

                        //Busca código segmento
                        $codSegmento = 0;
                        if(@$row[2] != ""){
                            $segmento = $this->tabelasauxiliares->getSegmentoPorNome($row[2]);
                            if($segmento != null){
                                $codSegmento = $segmento->cod_segmento;
                            }else{
                                $row[2] = "";
                                $resultado = 2;
                                $descResultado = "<strong>Importação realizada, porém, incompleta</strong>";
                            }
                        }

                        //Busca código estado
                        $codEstado = null;
                        if(@$row[8] != ""){
                            $estado = $this->tabelasauxiliares->getEstadoPorSigla($row[8]);
                            if($estado != null){
                                $codEstado = $estado->id;
                            }else{
                                $row[8] = "";
                                $resultado = 2;
                                $descResultado = "<strong>Importação realizada, porém, incompleta</strong>";
                            }
                        }

                        //Busca código cidade
                        $codCidade = null;
                        if(@$row[9] != ""){
                            $cidade = $this->tabelasauxiliares->getCidadePorNome($row[9]);
                            if($cidade != null){
                                $codCidade = $cidade->id;
                            }else{
                                $row[9] = "";
                                $resultado = 2;
                                $descResultado = "<strong>Importação incompleta</strong>";
                            }
                        }

                        $data = [
                            'id_empresa' => getDadosUsuarioLogado()['id_empresa'],
                            'nome_fornecedor' => $row[1],
                            'tipo_pessoa' => $tipoPessoa,
                            'cnpj_cpf' => $row[0],
                            'cod_segmento' => $codSegmento,
                            'tel_fixo' => @$row[3],
                            'tel_cel' => @$row[4],
                            'email' => @$row[5],
                            'endereco' => @$row[6],
                            'bairro' => @$row[7],
                            'cod_estado' => $codEstado,
                            'cod_cidade' => $codCidade
                        ];
            
                        $codFornecedor = $this->fornecedor->insertFornecedor($data);                        
                    }                       

                }else{
                    $resultado = 3;
                    $descResultado = "<strong>Não possível importar</strong><br>
                                      CNPJ ou CPF fora do padrão esperado";
                }

                $listaFornecedor[] = (object)[
                    'cod_fornecedor' => $codFornecedor,
                    'cnpj_cpf' => $row[0],
                    'nome_fornecedor' => $row[1],
                    'nome_segmento' => @$row[2],
                    'tel_fixo' => @$row[3],
                    'tel_cel' => @$row[4],
                    'email' => @$row[5],
                    'endereco' => @$row[6],
                    'bairro' => @$row[7],
                    'estado' => @$row[8],
                    'cidade' => @$row[9],
                    'resultado' => $resultado,
                    'desc_resultado' => $descResultado
                ];
            }

            fclose($handle);

            $this->session->set_flashdata('sucesso', 'Importação finalizada');
        }

        $dados = array(
            'lista_fornecedor' => $listaFornecedor,
            'menu' => 'Cadastro'
        );

        $this->load->view('cadastros/importar-fornecedor', $dados);

    }

    public function importaXLS(){

        $this->load->library('SimpleXLSX');

        $listaFornecedor = null;
        if(!empty($_FILES['arquivo']['tmp_name'])){

            if ( $xlsx = SimpleXLSX::parse($_FILES['arquivo']['tmp_name']) ) {
                foreach ($xlsx->rows() as $r => $row) {
                    
                    if($this->input->post('cabecalho') == '1' && $r == 0){
                        continue;
                    } 
                    
                    $codFornecedor = null;

                    if(strlen($row[0]) == 14 || strlen($row[0]) == 18 || strlen($row[0]) == 0){

                        if($row[0] != 0){                            
                            $fornecedor = $this->fornecedor->getFornecedorPorDocumento($row[0]);
                        }else{
                            $fornecedor = $this->fornecedor->getFornecedorPorNome($row[1]);
                        }
                        
                        if($fornecedor != null){
                            $codFornecedor = $fornecedor->cod_fornecedor;
                            $resultado = 3;
                            $descResultado = "<strong>Não possível importar</strong><br>
                                            Fornecedor já cadastrado na base dados";
                        }elseif($row[1] == ""){
                            $resultado = 3;
                            $descResultado = "<strong>Não possível importar</strong><br>
                                            Fornecedor sem nome definido";
                        }else{

                            $resultado = 1;
                            $descResultado = "<strong>Importado com sucesso</strong>";

                            if(strlen($row[0]) == 14){
                                $tipoPessoa = 2;
                            }else{
                                $tipoPessoa = 1;
                            }

                            //Busca código segmento
                            $codSegmento = 0;
                            if(@$row[2] != ""){
                                $segmento = $this->tabelasauxiliares->getSegmentoPorNome($row[2]);
                                if($segmento != null){
                                    $codSegmento = $segmento->cod_segmento;
                                }else{
                                    $row[2] = "";
                                    $resultado = 2;
                                    $descResultado = "<strong>Importação realizada, porém, incompleta</strong>";
                                }
                            }

                            //Busca código estado
                            $codEstado = null;
                            if(@$row[8] != ""){
                                $estado = $this->tabelasauxiliares->getEstadoPorSigla($row[8]);
                                if($estado != null){
                                    $codEstado = $estado->id;
                                }else{
                                    $row[8] = "";
                                    $resultado = 2;
                                    $descResultado = "<strong>Importação realizada, porém, incompleta</strong>";
                                }
                            }

                            //Busca código cidade
                            $codCidade = null;
                            if(@$row[9] != ""){
                                $cidade = $this->tabelasauxiliares->getCidadePorNome($row[9]);
                                if($cidade != null){
                                    $codCidade = $cidade->id;
                                }else{
                                    $row[9] = "";
                                    $resultado = 2;
                                    $descResultado = "<strong>Importação incompleta</strong>";
                                }
                            }

                            $data = [
                                'id_empresa' => getDadosUsuarioLogado()['id_empresa'],
                                'nome_fornecedor'  => $row[1],
                                'tipo_pessoa' => $tipoPessoa,
                                'cnpj_cpf' => $row[0],
                                'cod_segmento' => $codSegmento,
                                'tel_fixo' => @$row[3],
                                'tel_cel' => @$row[4],
                                'email' => @$row[5],
                                'endereco' => @$row[6],
                                'bairro' => @$row[7],
                                'cod_estado' => $codEstado,
                                'cod_cidade' => $codCidade
                            ];
                
                            $codFornecedor = $this->fornecedor->insertFornecedor($data);                        
                        }                       

                    }else{
                        $resultado = 3;
                        $descResultado = "<strong>Não possível importar</strong><br>
                                          CNPJ ou CPF fora do padrão esperado";
                    }

                    $listaFornecedor[] = (object)[
                        'cod_fornecedor' => $codFornecedor,
                        'cnpj_cpf' => $row[0],
                        'nome_fornecedor' => $row[1],
                        'nome_segmento' => @$row[2],
                        'tel_fixo' => @$row[3],
                        'tel_cel' => @$row[4],
                        'email' => @$row[5],
                        'endereco' => @$row[6],
                        'bairro' => @$row[7],
                        'estado' => @$row[8],
                        'cidade' => @$row[9],
                        'resultado' => $resultado,
                        'desc_resultado' => $descResultado
                    ];

                }

                $this->session->set_flashdata('sucesso', 'Importação finalizada');

            } else {

                $this->session->set_flashdata('erro', SimpleXLSX::parseError());
            }            
        }

        $dados = array(
            'lista_fornecedor' => $listaFornecedor,
            'menu' => 'Cadastro'
        );

        $this->load->view('cadastros/importar-fornecedor', $dados);
    }

    public function inserirFornecedor(){  

        //Validações dos campo e array das mensagens apresentadas
        $this->form_validation->set_rules('NomeFornecedor', 'Nome do Fornecedor', 'required|max_length[60]',
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
            $this->form_validation->set_rules('CnpjCpf', 'CNPJ', 'min_length[18]|callback_doc_exists', 
                array('min_length' => 'O campo %s não está completo'));
        }elseif($this->input->post('TipoPessoa') == "2" && $this->input->post('CnpjCpf') != ""){
            $this->form_validation->set_rules('CnpjCpf', 'CPF', 'min_length[14]|callback_doc_exists', 
                array('min_length' => 'O campo %s não está completo'));
        }

        if($this->form_validation->run() == false){

            $this->session->set_flashdata('erro', validation_errors());
            $this->formFornecedor();
            
        }else {

            $data = [
                'id_empresa' => getDadosUsuarioLogado()['id_empresa'],
                'nome_fornecedor'  => $this->input->post('NomeFornecedor'),
                'razao_social'  => $this->input->post('RazaoSocial'),
                'tipo_pessoa' => $this->input->post('TipoPessoa'),
                'cnpj_cpf' => $this->input->post('CnpjCpf'),
                'cod_segmento' => $this->input->post('Segmento'),
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

            $CodFornecedor = $this->fornecedor->insertFornecedor($data);

            //Se optar por salvar e continuar, mantém na página de cadastro
            if ($this->input->post('Opcao') == 'salvarContinuar'){

                $this->session->set_flashdata('sucesso', 'Fornecedor cadastrado com sucesso');
                redirect(base_url('fornecedor/novo-fornecedor'));


            }else {

                $this->session->set_flashdata('sucesso', 'Fornecedor cadastrado com sucesso');
                redirect(base_url("fornecedor/editar-fornecedor/{$CodFornecedor}")); 
            }            
        }        
    }

    public function salvarFornecedor($CodFornecedor){

        //Validações dos campo e array das mensagens apresentadas
        $this->form_validation->set_rules('NomeFornecedor', 'Nome do Fornecedor', 'required|max_length[60]',
            array('required' => 'Você deve preencher o campo %s',
                  'max_length' => 'O campo %s não deve ter mais que 60 caracteres'));
        $this->form_validation->set_rules('Email', 'E-mail', 'valid_email|max_length[60]', 
            array('max_length' => 'O campo %s não deve ter mais que 60 caracteres',
                  'valid_email' => 'É necessário informar um e-mail válido'));
        $this->form_validation->set_rules('Endereco', 'Rua e Número', 'max_length[60]', 
            array('max_length' => 'O campo %s não deve ter mais que 60 caracteres'));
        $this->form_validation->set_rules('Bairro', 'Bairro', 'max_length[45]', 
            array('max_length' => 'O campo %s não deve ter mais que 45 caracteres'));

        $fornecedor = $this->fornecedor->getFornecedorPorCodigo($CodFornecedor);
        if($fornecedor->cnpj_cpf != $this->input->post('CnpjCpf')){
            if($this->input->post('TipoPessoa') == "1" && $this->input->post('CnpjCpf') != ""){
                $this->form_validation->set_rules('CnpjCpf', 'CNPJ', 'min_length[18]|callback_doc_exists', 
                    array('min_length' => 'O campo %s não está completo'));
            }elseif($this->input->post('TipoPessoa') == "2" && $this->input->post('CnpjCpf') != ""){
                $this->form_validation->set_rules('CnpjCpf', 'CPF', 'min_length[14]|callback_doc_exists', 
                    array('min_length' => 'O campo %s não está completo'));
            }
        }

        if($this->form_validation->run() == false){

            $this->session->set_flashdata('erro', validation_errors());
            $this->editarFornecedor($CodFornecedor);
            
        }else {

            $dados = [
                'nome_fornecedor'  => $this->input->post('NomeFornecedor'),
                'razao_social'  => $this->input->post('RazaoSocial'),
                'tipo_pessoa' => $this->input->post('TipoPessoa'),
                'cnpj_cpf' => $this->input->post('CnpjCpf'),
                'cod_segmento' => $this->input->post('Segmento'),
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

            $Cod = $this->fornecedor->updateFornecedor($CodFornecedor, $dados);
            
            $this->session->set_flashdata('sucesso', 'Fornecedor alterado com sucesso');
            redirect(base_url("fornecedor/editar-fornecedor/{$CodFornecedor}"));             
        }
    }

    public function excluirFornecedor(){

        $CodFornecedor = $this->input->post("excluir_todos");
        $numRegs = count($CodFornecedor);

        if($numRegs > 0){
            
            $erro = $this->fornecedor->deleteFornecedor($CodFornecedor);

            //Code 1451 - Não é permitido exluir registro sendo usado por outro registro
            if ($erro['code'] == 1451){
                $this->session->set_flashdata('erro', 'Exclusão não permitida. Registro em uso por outro cadastro');
            }else{
                $this->session->set_flashdata('sucesso', 'Registro(s) selecionado(s) excluído(s)');
            }

        }else {
            $this->session->set_flashdata('erro', 'Nenhum registro foi selecionado');
        }

        redirect(base_url('fornecedor'));
    }

    public function listarFornecedor(){   
        
        // Busca dos dados para apresentação
        $filter = ($this->input->get('buscar')) ? $this->input->get('buscar') : "";
        $offset = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

        $config = array(
            'base_url' => base_url('fornecedor'),
            'per_page' => 15,
            'num_links' => 10,
            'uri_segment' => 2,
            'total_rows' => $this->fornecedor->countAll($filter),
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
        $listaFornecedor = $this->fornecedor->getFornecedor($filter, $config["per_page"], $offset);

        $dados = array(
            'filter' => $filter,
            'pagination' => $this->pagination->create_links(),
            'lista_fornecedor' => $listaFornecedor,
            'menu' => 'Cadastro'
        );

        $this->load->view('cadastros/fornecedor', $dados);
    } 

    public function doc_exists($str)
    {
        $fornecedorExistente = $this->fornecedor->getFornecedorPorDocumento($str);
        if($fornecedorExistente != null){
            $this->form_validation->set_message('doc_exists', 'Já há um fornecedor cadastrado com o CNPJ/CPF informado');
            return false;
        }else{
            return true;
        }
    }
    
}