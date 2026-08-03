<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'vendor/autoload.php';
require_once 'application/traits/Traits.php';

class FiscalController extends CI_Controller {

    use Traits;

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

        try {
            $this->load->library('CommonNFe');
        } catch (Exception $exception) {
            $this->session->set_flashdata('erro', $exception->getMessage());
            header('location:' . $_SERVER['HTTP_REFERER']);
            exit();
        }
    }

    public function redirecionaNotaFiscal(){

        $mes = date('m');
        $ano = date('Y');

        redirect(base_url("fiscal/nota-fiscal/{$mes}/{$ano}"), "home", "refresh");

    }

    public function listarNotaFiscal(){    
        
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

        $listaNotaFiscal = $this->fiscal->getNotaFiscal($dataInicio, $dataFim, $filter);
        $totalNFs = $this->fiscal->getNotaFiscalAvulsaPorStatus($dataInicio, $dataFim);
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
            'lista_nota_fiscal' => $listaNotaFiscal,
            'total_nota_fiscal' => $totalNFs,
            'menu' => 'Fiscal'
        );

        $this->load->view('fiscal/nota-fiscal', $dados);
    }

    public function formNotaFiscal(){

        $listaCliente = $this->cliente->getCliente();
        $listaTransportador = $this->transportador->getTransportador();
        $estado = $this->tabelasauxiliares->getEstado();

        $dados = array(
            'naturezas' => $this->naturezaOperacao->getAll(),
            'indicadorFinal' => self::indicadorConsumidorFinal(),
            'indicadorPresencial' => self::indicadorPresencial(),
            'finalidade' => self::fiscalNFeFinalidade(),
            'tipoNfe' => self::operacaoFiscal(),
            'lista_cliente' => $listaCliente,
            'lista_transportador' => $listaTransportador,
            'estado' => $estado,
            'menu' => 'Fiscal'
        );


        $this->load->view('fiscal/nova-nota-fiscal', $dados);

    }

    public function inserirNotaFiscal(){

        //Validações dos campos
        $this->form_validation->set_rules('CodNatureza', 'Natureza de Operação', 'required',
            array('required' => 'Você deve selecionar uma %s'));
        $this->form_validation->set_rules('DataEmissao', 'Data de Emissão', 'required|callback_date_check',
            array('required' => 'Você deve preencher o campo %s'));
        $this->form_validation->set_rules('CodCliente', 'Cliente', 'required',
            array('required' => 'Você deve selecionar um %s'));
        $this->form_validation->set_rules('indicadorPresencial', 'Indicador de Presença', 'required',
            array('required' => 'Você deve selecionar o %s'));

        if($this->form_validation->run() == false){

            $this->session->set_flashdata('erro', validation_errors());
            $this->formNotaFiscal();

        }else {

            $dados = [
                'id_empresa' => getDadosUsuarioLogado()['id_empresa'],
                'id_natureza_operacao'  => $this->input->post('CodNatureza'),
                'data_emissao' => date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataEmissao')))),
                'cod_cliente'  => $this->input->post('CodCliente'),
                'x_ped' => $this->input->post('PedidoCliente'),
                'indicador_presenca'  => $this->input->post('indicadorPresencial'),
                'indicador_final' => $this->input->post('indicadorFinal'),
                'cod_transportador'  => $this->input->post('CodTransportador'),                
                'tipo_frete' => $this->input->post('TipoFrete'),
                'valor_frete' => str_replace(",",".",(str_replace(".","",$this->input->post('Frete')))),
                'valor_seguro' => str_replace(",",".",(str_replace(".","",$this->input->post('Seguro')))),
                'outras_despesas' => str_replace(",",".",(str_replace(".","",$this->input->post('OutrasDespesas')))),
                'valor_desconto' => str_replace(",",".",(str_replace(".","",$this->input->post('Desconto')))),
                'quant_volume' => $this->input->post('Quantidade'),
                'especie_volume' => $this->input->post('Especie'),
                'marca' => $this->input->post('Marca'),
                'placa_veiculo' => $this->input->post('PlacaVeiculo'),
                'cod_antt' => $this->input->post('CodAntt'),
                'uf_veiculo' => $this->input->post('UFVeiculo'),
                'inf_complementar' => $this->input->post('informacoesComplementares'), 
                'nf_referencia' => $this->input->post('NFReferencia'),                 
            ];

            $codNotaFiscal = $this->fiscal->insertNotaFiscal($dados);

            $this->session->set_flashdata('sucesso', 'Nota Fiscal cadastrada com sucesso');
            redirect(base_url("fiscal/nota-fiscal/editar-nota-fiscal/{$codNotaFiscal}"), "home", "refresh");

        }
    }

    public function editarNotaFiscal($codNotaFiscal){

        $listaNotaFiscal = $this->fiscal->getNotaFiscalporCodigo($codNotaFiscal);        
        $listaCliente = $this->cliente->getCliente();
        $listaTransportador = $this->transportador->getTransportador();
        $listaProdNF = $this->fiscal->getProdutosPorNF($codNotaFiscal);
        $listaProduto = $this->produto->getProdutoVenda($listaProdNF);
        $estado = $this->tabelasauxiliares->getEstado();

        if($listaNotaFiscal == null){
            redirect(base_url('fiscal/nota-fiscal'));

        }else{

            $this->load->library('CommonNFe');

            $xml = base_url($this->commonnfe->aprDir) . $listaNotaFiscal->chave . '-nfe.xml';

            $dados = array(
                'nota_fiscal' => $listaNotaFiscal,
                'naturezas' => $this->naturezaOperacao->getAll(),
                'indicadorFinal' => self::indicadorConsumidorFinal(),
                'indicadorPresencial' => self::indicadorPresencial(),
                'finalidade' => self::fiscalNFeFinalidade(),
                'tipoNfe' => self::operacaoFiscal(),
                'lista_cliente' => $listaCliente,
                'lista_transportador' => $listaTransportador,
                'lista_produto_nf' => $listaProdNF,
                'lista_produto' => $listaProduto,
                'estado' => $estado,
                'xml' => $xml,
                'menu' => 'Fiscal'
            );

            $this->load->view('fiscal/editar-nota-fiscal', $dados);
        }
    }

    public function salvarNotaFiscal($codNotaFiscal){

        //Validações dos campo e array das mensagens apresentadas
        $this->form_validation->set_rules('CodNatureza', 'Natureza de Operação', 'required',
            array('required' => 'Você deve selecionar uma %s'));
        $this->form_validation->set_rules('DataEmissao', 'Data de Emissão', 'required|callback_date_check',
            array('required' => 'Você deve preencher o campo %s'));
        $this->form_validation->set_rules('CodCliente', 'Cliente', 'required',
            array('required' => 'Você deve selecionar um %s'));
        $this->form_validation->set_rules('indicadorPresencial', 'Indicador de Presença', 'required',
            array('required' => 'Você deve selecionar o %s'));

        if($this->form_validation->run() == false){

            $this->session->set_flashdata('erro', validation_errors());
            $this->editarNotaFiscal($codNotaFiscal);

        }else {
            
            $dados = [
                'id_natureza_operacao'  => $this->input->post('CodNatureza'),
                'data_emissao' => date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataEmissao')))),
                'cod_cliente'  => $this->input->post('CodCliente'),
                'x_ped' => $this->input->post('PedidoCliente'),
                'indicador_presenca'  => $this->input->post('indicadorPresencial'),
                'indicador_final' => $this->input->post('indicadorFinal'),
                'cod_transportador'  => $this->input->post('CodTransportador'),                
                'tipo_frete' => $this->input->post('TipoFrete'),
                'valor_seguro' => str_replace(",",".",(str_replace(".","",$this->input->post('Seguro')))),
                'outras_despesas' => str_replace(",",".",(str_replace(".","",$this->input->post('OutrasDespesas')))),
                'valor_frete' => str_replace(",",".",(str_replace(".","",$this->input->post('Frete')))),
                'valor_desconto' => str_replace(",",".",(str_replace(".","",$this->input->post('Desconto')))),
                'quant_volume' => $this->input->post('Quantidade'),
                'especie_volume' => $this->input->post('Especie'),
                'marca' => $this->input->post('Marca'),
                'placa_veiculo' => $this->input->post('PlacaVeiculo'),
                'cod_antt' => $this->input->post('CodAntt'),
                'uf_veiculo' => $this->input->post('UFVeiculo'),
                'inf_complementar' => $this->input->post('informacoesComplementares'),
                'nf_referencia' => $this->input->post('NFReferencia'),    
            ];
            $this->fiscal->updateNotaFiscal($codNotaFiscal, $dados);

            $this->session->set_flashdata('sucesso', 'Nota Fiscal alterada com sucesso');
            redirect(base_url("fiscal/nota-fiscal/editar-nota-fiscal/{$codNotaFiscal}"), "home", "refresh");

        }
    }

    public function descalcularNF($codNotaFiscal){        
            
        $dados = [            
            'status' => 1,
        ];
        $this->fiscal->updateNotaFiscal($codNotaFiscal, $dados);

        $this->session->set_flashdata('sucesso', 'Nota Fiscal alterada com sucesso');
        redirect(base_url("fiscal/nota-fiscal/editar-nota-fiscal/{$codNotaFiscal}"), "home", "refresh");
        
    }

    public function inserirProdutoNF($codNotaFiscal){

        $this->form_validation->set_rules('CodProduto', 'Produto', 'required',
                    array('required' => 'Você deve selecionar um %s'));
        $this->form_validation->set_rules('Quantidade', 'Quantidade', 'required|callback_more_zero',
                    array('required' => 'Você deve preencher o campo %s'));
        $this->form_validation->set_rules('ValorUnitario', 'Valor Unitário', 'required|callback_more_zero',
                    array('required' => 'Você deve preencher o campo %s'));

        if($this->form_validation->run() == false){

            $this->session->set_flashdata('erro', validation_errors());
            redirect(base_url("fiscal/nota-fiscal/editar-nota-fiscal/{$codNotaFiscal}"), "home", "refresh");

        }else{

            $dados = [
                'cod_nota_fiscal' => $codNotaFiscal,
                'cod_produto'  => $this->input->post('CodProduto'),
                'quantidade' => str_replace(",",".",(str_replace(".","",$this->input->post('Quantidade')))),
                'valor_unitario' => str_replace(",",".",(str_replace(".","",$this->input->post('ValorUnitario'))))
            ];
            $this->fiscal->insertProdutoNF($dados);

            $this->session->set_flashdata('sucesso', 'Produto inserido com sucesso');
            redirect(base_url("fiscal/nota-fiscal/editar-nota-fiscal/{$codNotaFiscal}"), "home", "refresh");

        }
    }

    public function salvarProdutoNF(){
        $codNotaFiscal = $this->uri->segment(4);
        $seqProdutoNF = $this->uri->segment(5);

        //Validações dos campo e array das mensagens apresentadas
        $this->form_validation->set_rules('QuantidadeEdit', 'Quantidade', 'required|callback_more_zero',
            array('required' => 'Você deve preencher o campo %s'));
        $this->form_validation->set_rules('ValorUnitarioEdit', 'Valor Unitário', 'required|callback_more_zero',
            array('required' => 'Você deve preencher o campo %s'));

        if($this->form_validation->run() == false){

            $this->session->set_flashdata('erro', validation_errors());
            $this->editarNotaFiscal($codNotaFiscal);

        }else {

            $data = [
                'quantidade' => str_replace(",",".",(str_replace(".","",$this->input->post('QuantidadeEdit')))),
                'valor_unitario' => str_replace(",",".",(str_replace(".","",$this->input->post('ValorUnitarioEdit')))),
            ];
            $this->fiscal->updateProdutoNF($seqProdutoNF, $data);

            $this->session->set_flashdata('sucesso', 'Produto alterado com sucesso');
            redirect(base_url("fiscal/nota-fiscal/editar-nota-fiscal/{$codNotaFiscal}"));

        }
    }

    public function excluirProdutoNF($codNotaFiscal){

        $SeqProdutoNF = $this->input->post("excluir_todos");
        $numRegs = count($SeqProdutoNF);

        if($numRegs > 0){
            $this->fiscal->deleteProdutoNF($SeqProdutoNF);
            $this->session->set_flashdata('sucesso', 'Registro(s) selecionado(s) excluído(s)');
        }else{
            $this->session->set_flashdata('erro', 'Nenhum registro foi selecionado');
        }

        redirect(base_url("fiscal/nota-fiscal/editar-nota-fiscal/{$codNotaFiscal}"));
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
    
    public function notasEmitidas(){

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

        $listaCliente = $this->cliente->getCliente();
        $listaNotaDetalhada = $this->faturamentoNotaFiscal->getNotasEmitidasDetalhadas($dataInicio, $dataFim, $codClientes);     
        
        if($this->input->get('btnOpcao') == "DownloadXML"){
            
            $arquivos = array();
            foreach($listaNotaDetalhada as $key_nota_detalhada => $nota_detalhada) {
                $arquivos[] = $this->commonnfe->aprDir . $nota_detalhada->chave . '-nfe.xml';
            }

            $zip = new ZipArchive;
            $zipname = 'Aprovadas_' . $dataInicio . '_' . $dataFim . '.zip';
            $r = $zip->open($zipname, ZipArchive::CREATE);

            $files = $arquivos;
            foreach ($files as $file) {
                $r = $zip->addFile($file);
            }

            $r = $zip->close();

            header('Content-Type: application/zip');
            header('Content-disposition: attachment; filename='.$zipname);
            header('Content-Length: ' . filesize($zipname));
            readfile($zipname);

            redirect(base_url("relatorios/notas-emitidas?DataInicio={$dataInicio}&DataFim={$dataFim}"), "home", "refresh");
            
        }

        $dados = array(
            'dataInicio' => $dataInicio,
            'dataFim' => $dataFim,
            'cod_cliente' => $codClientes,
            'lista_cliente' => $listaCliente,
            'lista_nota_detalhada' => $listaNotaDetalhada,
            'menu' => 'Fiscal'

        );        

        $this->load->view('fiscal/notas-emitidas', $dados);        

    }

    public function downloadXML(){

        $dataInicio = $this->uri->segment(4);
        $dataFim = $this->uri->segment(5); 
        $codClientes = $this->uri->segment(6); 

        $listaNotaDetalhada = $this->faturamentoNotaFiscal->getNotasEmitidasDetalhadasDownload($dataInicio, $dataFim, $codClientes);  

        $arquivos = array();
        foreach($listaNotaDetalhada as $key_nota_detalhada => $nota_detalhada) {
            $arquivos[] = $this->commonnfe->aprDir . $nota_detalhada->chave . '-nfe.xml';
        }

        $zip = new ZipArchive;
        $zipname = 'Aprovadas_' . $dataInicio . '_' . $dataFim . '_' . getDadosUsuarioLogado()['id_empresa'] . '.zip';
        $r = $zip->open($zipname, ZipArchive::CREATE);

        $files = $arquivos;
        foreach ($files as $file) {
            $r = $zip->addFile($file);
        }

        $r = $zip->close();

        header('Content-Type: application/zip');
        header('Content-disposition: attachment; filename='.$zipname);
        header('Content-Length: ' . filesize($zipname));
        readfile($zipname);

    }

    //******************************************************** */

    public function formCliente(){

        $listaSegmento = $this->tabelasauxiliares->getSegmento();
        $listaCidade = $this->tabelasauxiliares->getCidade();
        $listaEstado = $this->tabelasauxiliares->getEstado();       

        $dados = array(
            'lista_segmento' => $listaSegmento,
            'lista_cidade' => $listaCidade,
            'lista_estado' => $listaEstado,
            'menu' => 'Cadastro'
        );

        $this->load->view('cadastros/novo-cliente', $dados);

    }   
    
    public function editarCliente($CodCliente){

        $listaCliente = $this->cliente->getClientePorCodigo($CodCliente);
        $listaSegmento = $this->tabelasauxiliares->getSegmento();
        $listaCidade = $this->tabelasauxiliares->getCidade();  
        
        if($listaCliente == null){
            redirect(base_url('cliente'));
            
        }else{ 
            $dados = array(
                'cliente' => $listaCliente,
                'lista_segmento' => $listaSegmento,
                'lista_cidade' => $listaCidade,
                'menu' => 'Cadastro'
            );
        }

        $this->load->view('cadastros/editar-cliente', $dados);

    }

    public function listaImportaCliente(){ 
        
        if(1 == null){
            redirect(base_url('cliente'));
            
        }else{ 
            $dados = array(
                'lista_cliente' => null,
                'menu' => 'Cadastro'
            );
        }

        $this->load->view('cadastros/importar-cliente', $dados);

    }

    public function importarCliente(){

        if(pathinfo($_FILES['arquivo']['name'], PATHINFO_EXTENSION) == "csv"){

            $this->importaCSV();

        }elseif(pathinfo($_FILES['arquivo']['name'], PATHINFO_EXTENSION) == "xlsx"){

            $this->importaXLS();

        }else{

            $this->session->set_flashdata('erro', 'Formato de arquivo desconhecido');

            $listaCliente = null;
            $dados = array(
                'lista_cliente' => $listaCliente,
                'menu' => 'Cadastro'
            );

            $this->load->view('cadastros/importar-cliente', $dados);

        }        
    }

    public function inserirCliente(){  

        //Validações dos campo e array das mensagens apresentadas
        $this->form_validation->set_rules('NomeCliente', 'Nome do Cliente', 'required|max_length[60]',
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
            $this->form_validation->set_rules('CnpjCpf', 'CNPJ', 'min_length[18]|callback_doc_exists', 
                array('min_length' => 'O campo %s não está completo'));
        }elseif($this->input->post('TipoPessoa') == "2" && $this->input->post('CnpjCpf') != ""){
            $this->form_validation->set_rules('CnpjCpf', 'CPF', 'min_length[14]|callback_doc_exists', 
                array('min_length' => 'O campo %s não está completo'));
        }

        if($this->input->post('CEP') != ""){
            $this->form_validation->set_rules('CEP', 'CEP', 'min_length[9]', 
                array('min_length' => 'O campo %s não está completo'));            
        }

        if($this->form_validation->run() == false){

            $this->session->set_flashdata('erro', validation_errors());
            $this->formCliente();
            
        }else {

            $data = [
                'id_empresa' => getDadosUsuarioLogado()['id_empresa'],
                'nome_cliente'  => $this->input->post('NomeCliente'),
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
                'cod_cidade' => $this->input->post('Cidade')
            ];
            $codCliente = $this->cliente->insertCliente($data);

            //Se optar por salvar e continuar, mantém na página de cadastro
            if ($this->input->post('Opcao') == 'salvarContinuar'){

                $this->session->set_flashdata('sucesso', 'Cliente cadastrado com sucesso');
                redirect(base_url('cliente/novo-cliente'));


            }else {

                $this->session->set_flashdata('sucesso', 'Cliente cadastrado com sucesso');
                redirect(base_url('cliente'));
            }            
        }        
    }   

    public function salvarCliente($codCliente){

        //Validações dos campo e array das mensagens apresentadas
        $this->form_validation->set_rules('NomeCliente', 'Nome do Cliente', 'required|max_length[60]',
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
        $cliente = $this->cliente->getClientePorCodigo($codCliente);
        if($cliente->cnpj_cpf != $this->input->post('CnpjCpf')){
            if($this->input->post('TipoPessoa') == "1" && $this->input->post('CnpjCpf') != ""){
                $this->form_validation->set_rules('CnpjCpf', 'CNPJ', 'min_length[18]|callback_doc_exists', 
                    array('min_length' => 'O campo %s não está completo'));
            }elseif($this->input->post('TipoPessoa') == "2" && $this->input->post('CnpjCpf') != ""){
                $this->form_validation->set_rules('CnpjCpf', 'CPF', 'min_length[14]|callback_doc_exists', 
                    array('min_length' => 'O campo %s não está completo'));
            }

            if($this->input->post('CEP') != ""){
                $this->form_validation->set_rules('CEP', 'CEP', 'min_length[9]', 
                    array('min_length' => 'O campo %s não está completo'));            
            }
        }

        if($this->form_validation->run() == false){

            $this->session->set_flashdata('erro', validation_errors());
            $this->editarCliente($codCliente);
            
        }else {

            $dados = [
                'nome_cliente'  => $this->input->post('NomeCliente'),
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
                'cod_cidade' => $this->input->post('Cidade')
            ];            

            $this->cliente->updateCliente($codCliente, $dados); 
            $this->session->set_flashdata('sucesso', 'Cliente alterado com sucesso');
            
            redirect(base_url('cliente'));           
        }
    }

    public function excluirCliente(){

        $CodCliente = $this->input->post("excluir_todos");
        $numRegs = count($CodCliente);

        if($numRegs > 0){

            $erro = $this->cliente->deleteCliente($CodCliente);

            //Code 1451 - Não é permitido exluir registro sendo usado por outro registro
            if ($erro['code'] == 1451){
                $this->session->set_flashdata('erro', 'Exclusão não permitida. Registro em uso por outro cadastro');
            }else{
                $this->session->set_flashdata('sucesso', 'Registro(s) selecionado(s) excluído(s)');
            } 

        }else {
            $this->session->set_flashdata('erro', 'Nenhum registro foi selecionado');
        }

        redirect(base_url('cliente'));
    }      
    
    public function doc_exists($str)
    {
        $clienteExistente = $this->cliente->getClientePorDocumento($str);
        if($clienteExistente != null){
            $this->form_validation->set_message('doc_exists', 'Já há um cliente cadastrado com o CNPJ/CPF informado');
            return false;
        }else{
            return true;
        }
    }
}