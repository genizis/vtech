<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once 'application/traits/Traits.php';

class NaturezaOperacaoController extends CI_Controller
{
    use Traits;

    private static $baseURL = 'fiscal/natureza-operacao';

    function __construct()
    {
        parent::__construct();

        if (usuarioLogado() == false) {

            redirect(base_url("login"), "home", "refresh");

        }
    }


    public function editar($id)
    {

        $row = $this->naturezaOperacao->getById($id);
        $fcp = $this->naturezaOperacao->getFCPporNatOper($id);
        $icms = $this->naturezaOperacao->getICMSporNatOper($id);
        $listaNCM = $this->produto->getNCM(); 
        $listaEstado = $this->tabelasauxiliares->getEstado(); 
        $empresa = $this->empresa->getEmpresaById(getDadosUsuarioLogado()['id_empresa']);
        $dados = [];
        if ($row == null) {
            redirect(base_url(self::$baseURL));
        } else {
            $dados = array(
                'row' => $row,
//                'lista_segmento' => $listaSegmento,
//                'lista_cidade' => $listaCidade,
                'menu' => 'Cadastro',
                'cfops' => $this->cfop->getAll(),
                'finalidade' => self::fiscalNFeFinalidade(),
                'tipoNfe' => self::operacaoFiscal(),
                'modBC' => self::modBC(),
                'modBCST' => self::modBCST(),
                'icmsCST' => $this->icms->getICMSCSTAll(),
                'icmsCSOSN' => $this->icms->getICMSCSOSNAll(),
                'ipiCST' => $this->ipi->getIPICSTAll(),
                'pisCofinsCST' => $this->pisCofins->getCSTAll(),
                'lista_FCP' => $fcp,
                'lista_ICMS' => $icms,
                'empresa' => $empresa,
                'lista_ncm' => $listaNCM,
                'lista_estado' => $listaEstado,
            );
        }

        $this->load->view('fiscal/naturezaOperacao/form', $dados);

    }

    public function formNaturezaOperacao(){

        $empresa = $this->empresa->getEmpresaById(getDadosUsuarioLogado()['id_empresa']);

        $this->session->set_flashdata('erro', validation_errors());
            $dados = [
                'menu' => 'Cadastro',
                'cfops' => $this->cfop->getAll(),
                'finalidade' => self::fiscalNFeFinalidade(),
                'tipoNfe' => self::operacaoFiscal(),
                'empresa' => $empresa,                

            ];
            $this->load->view('fiscal/naturezaOperacao/form-novo', $dados);

    }

    public function inserir()
    {

        /*if (!isset($_POST)) {

            $this->session->set_flashdata('erro', validation_errors());
            $dados = [
                'menu' => 'Cadastro',
                'cfops' => $this->cfop->getAll(),
                'finalidade' => self::fiscalNFeFinalidade(),
                'tipoNfe' => self::operacaoFiscal(),

            ];
            $this->load->view('fiscal/naturezaOperacao/form-novo', $dados);

        } else {*/

            $data = [
                'id_empresa' => getDadosUsuarioLogado()['id_empresa'],
                'nome' => $this->input->post('nome'),
                'tb_fis_cfop_id_estad' => $this->input->post('tb_fis_cfop_id_estad'),
                'tb_fis_cfop_id_inter' => $this->input->post('tb_fis_cfop_id_inter'),
                'tb_fis_cfop_id_ext' => $this->input->post('tb_fis_cfop_id_ext'),
                'informacoes_complementares' => $this->input->post('informComplementares'),
                'finalidade' => $this->input->post('finalidade'),
                'descricao' => $this->input->post('descInterna'),
                'operacao_fiscal' => $this->input->post('tipoNfe'),  
                'movimenta_estoque' => ($this->input->post('MovimentaEstoque')) ? $this->input->post('MovimentaEstoque') : 0,              
            ];
            $codNatureza = $this->naturezaOperacao->insert($data);

            $this->session->set_flashdata('sucesso', 'Natureza cadastrada com sucesso');
            redirect(base_url('fiscal/natureza-operacao/editar/' . $codNatureza));


        //}
    }

    public function inserirFCP($idNaturOper)
    {        

        $this->form_validation->set_rules('NCM', 'NCM', 'required',
                    array('required' => 'Você deve preencher o campo %s'));
        $this->form_validation->set_rules('AliquotaFCP', 'Alíquota', 'required|callback_more_zero',
                    array('required' => 'Você deve preencher o campo %s'));
        $this->form_validation->set_rules('UF', 'Estado', 'required',
                    array('required' => 'Você deve preencher o campo %s'));

        if($this->form_validation->run() == false){

            $this->session->set_flashdata('erro', validation_errors());
            redirect(base_url("fiscal/natureza-operacao/editar/{$idNaturOper}#fcp"), "home", "refresh");

        }else{

            $dados = [
                'id_empresa' => getDadosUsuarioLogado()['id_empresa'],
                'tb_fis_natureza_operacao_id'  => $idNaturOper,
                'uf' => $this->input->post('UF'),
                'ncm' => $this->input->post('NCM'),
                'aliquota' => str_replace(",",".",(str_replace(".","",$this->input->post('AliquotaFCP'))))
            ];
            $this->naturezaOperacao->insertFCP($dados);

            $this->session->set_flashdata('sucesso', 'Alíquota FCP cadastrada com sucesso');                      
            redirect(base_url("fiscal/natureza-operacao/editar/{$idNaturOper}#fcp"), "home", "refresh");

        }
    }

    public function inserirICMS($idNaturOper)
    {        

        $this->form_validation->set_rules('AliquotaICMS', 'Alíquota', 'required',
                    array('required' => 'Você deve preencher o campo %s'));
        $this->form_validation->set_rules('UF', 'Estado', 'required',
                    array('required' => 'Você deve preencher o campo %s'));

        if($this->form_validation->run() == false){

            $this->session->set_flashdata('erro', validation_errors());
            redirect(base_url("fiscal/natureza-operacao/editar/{$idNaturOper}#icms-aliq"), "home", "refresh");

        }else{

            $dados = [
                'id_empresa' => getDadosUsuarioLogado()['id_empresa'],
                'tb_fis_natureza_operacao_id'  => $idNaturOper,
                'uf' => $this->input->post('UF'),
                'aliquota' => str_replace(",",".",(str_replace(".","",$this->input->post('AliquotaICMS'))))
            ];
            $this->naturezaOperacao->insertICMS($dados);

            $this->session->set_flashdata('sucesso', 'Alíquota ICMS cadastrada com sucesso');                      
            redirect(base_url("fiscal/natureza-operacao/editar/{$idNaturOper}#icms-aliq"), "home", "refresh");

        }
    }

    public function salvarFCP($idFCP)
    {        

        $this->form_validation->set_rules('AliquotaFCPEdit', 'Alíquota', 'required|callback_more_zero',
                    array('required' => 'Você deve preencher o campo %s'));

        $fcp = $this->naturezaOperacao->getFCPporCod($idFCP);

        if($this->form_validation->run() == false){            

            $this->session->set_flashdata('erro', validation_errors());
            redirect(base_url("fiscal/natureza-operacao/editar/{$fcp->tb_fis_natureza_operacao_id}#fcp"), "home", "refresh");

        }else{

            $dados = [
                'aliquota' => str_replace(",",".",(str_replace(".","",$this->input->post('AliquotaFCPEdit'))))
            ];
            $this->naturezaOperacao->salvarFCP($idFCP, $dados);

            $this->session->set_flashdata('sucesso', 'Alíquota FCP atualizada com sucesso');                      
            redirect(base_url("fiscal/natureza-operacao/editar/{$fcp->tb_fis_natureza_operacao_id}#fcp"), "home", "refresh");

        }
    }

    public function salvarICMS($idICMS)
    {        

        $this->form_validation->set_rules('AliquotaICMSEdit', 'Alíquota', 'required',
                    array('required' => 'Você deve preencher o campo %s'));

        $icms = $this->naturezaOperacao->getICMSporCod($idICMS);

        if($this->form_validation->run() == false){            

            $this->session->set_flashdata('erro', validation_errors());
            redirect(base_url("fiscal/natureza-operacao/editar/{$icms->tb_fis_natureza_operacao_id}#icms-aliq"), "home", "refresh");

        }else{

            $dados = [
                'aliquota' => str_replace(",",".",(str_replace(".","",$this->input->post('AliquotaICMSEdit'))))
            ];
            $this->naturezaOperacao->salvarICMS($idICMS, $dados);

            $this->session->set_flashdata('sucesso', 'Alíquota ICMS atualizada com sucesso');                      
            redirect(base_url("fiscal/natureza-operacao/editar/{$icms->tb_fis_natureza_operacao_id}#icms-aliq"), "home", "refresh");

        }
    }

    public function excluirFCP($idNaturOper)
    {

        $idFCP = $this->input->post("excluir_todos_fcp");

        $erro = $this->naturezaOperacao->deleteFCP($idFCP);

        $this->session->set_flashdata('sucesso', 'Alíquota(s) FCP(s) excluída(s) com sucesso');  
        redirect(base_url("fiscal/natureza-operacao/editar/{$idNaturOper}#fcp"), "home", "refresh");
    }

    public function excluirICMS($idNaturOper)
    {

        $idICMS = $this->input->post("excluir_todos_icms");

        $erro = $this->naturezaOperacao->deleteFCP($idICMS);

        $this->session->set_flashdata('sucesso', 'Alíquota(s) ICMS(s) excluída(s) com sucesso');  
        redirect(base_url("fiscal/natureza-operacao/editar/{$idNaturOper}#icms-aliq"), "home", "refresh");
    }
    
    public function excluirNatureza(){

        $codNatureza = $this->input->post("excluir_todos");

        $erro = $this->naturezaOperacao->deleteNatureza($codNatureza);

        $this->session->set_flashdata('sucesso', 'Natureza(s) excluída(s) com sucesso');
        redirect(base_url('fiscal/natureza-operacao'), "home", "refresh");
    }

    public function salvar($id)
    {
        $dados = [
            'nome' => $this->input->post('nome'),
            'tb_fis_cfop_id_estad' => $this->input->post('tb_fis_cfop_id_estad'),
            'tb_fis_cfop_id_inter' => $this->input->post('tb_fis_cfop_id_inter'),
            'tb_fis_cfop_id_ext' => $this->input->post('tb_fis_cfop_id_ext'),
            'informacoes_complementares' => $this->input->post('informComplementares'),
            'finalidade' => $this->input->post('finalidade'),
            'descricao' => $this->input->post('descInterna'),
            'operacao_fiscal' => $this->input->post('tipoNfe'),
            'mod_bc' => $this->input->post('mod_bc'),
            'mod_bc_st' => $this->input->post('mod_bc_st'),
            'p_red_bc' => str_replace(",",".",(str_replace(".","",$this->input->post('p_red_bc')))),
            'p_red_bc_st' => str_replace(",",".",(str_replace(".","",$this->input->post('p_red_bc_st')))),
            'p_mvast' => str_replace(",",".",(str_replace(".","",$this->input->post('p_mvast')))),
            'p_pis' => str_replace(",",".",(str_replace(".","",$this->input->post('p_pis')))),
            'p_cofins' => str_replace(",",".",(str_replace(".","",$this->input->post('p_cofins')))),
            'tb_fis_icms_cst_id' => $this->input->post('icmsCST'),
            'tb_fis_icms_csosn_id' => $this->input->post('icmsCSOSN'),
            'ipi_suspenso' => $this->input->post('ipi_suspenso'),
            'ipi_integra_vbcicms' => $this->input->post('ipi_integra_vbcicms'),
            'pis_exclui_icms_vbc' => $this->input->post('pis_exclui_icms_vbc'),
            'tb_fis_ipi_cst_id' => (!$this->input->post('ipiCST')) ? null : $this->input->post('ipiCST'),
            'tb_fis_pis_cst_id' => $this->input->post('pisCST'),
            'tb_fis_cofins_cst_id' => $this->input->post('cofinsCST'),
            'c_enq' => $this->input->post('c_enq'),
            'c_benef' => $this->input->post('c_benef'),
            'movimenta_estoque' => ($this->input->post('MovimentaEstoque')) ? $this->input->post('MovimentaEstoque') : 0,
        ];

        $this->naturezaOperacao->update($id, $dados);
//            print_r($this->db->last_query());
//            exit();
        $this->session->set_flashdata('sucesso', 'Natureza alterada com sucesso');

        redirect(base_url('fiscal/natureza-operacao/editar/' . $id));
    }

    public function excluir()
    {

        $CodCliente = $this->input->post("excluir_todos");
        $numRegs = count($CodCliente);

        if ($numRegs > 0) {

            $erro = $this->cliente->deleteCliente($CodCliente);

            //Code 1451 - Não é permitido exluir registro sendo usado por outro registro
            if ($erro['code'] == 1451) {
                $this->session->set_flashdata('erro', 'Exclusão não permitida. Registro em uso por outro cadastro');
            } else {
                $this->session->set_flashdata('sucesso', 'Registro(s) selecionado(s) excluído(s)');
            }

        } else {
            $this->session->set_flashdata('erro', 'Nenhum registro foi selecionado');
        }

        redirect(base_url('cliente'));
    }

    public function listar()
    {
        // Busca dos dados para apresentação
        $filter = ($this->input->get('buscar')) ? $this->input->get('buscar') : "";
        $offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $config = array(
            'base_url' => base_url(self::$baseURL),
            'per_page' => 15,
            'num_links' => 10,
            'uri_segment' => 3,
            'total_rows' => $this->naturezaOperacao->countAll($filter),
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

        $rows = $this->naturezaOperacao->getAll($filter, $config["per_page"], $offset);
        $empresa = $this->empresa->getEmpresaPorCodigo(getDadosUsuarioLogado()['id_empresa']);

        $dados = array(
            'filter' => $filter,
            'pagination' => $this->pagination->create_links(),
            'empresa' => $empresa,
            'rows' => $rows,
            'menu' => '',
            'baseURL' => self::$baseURL
        );

        $this->load->view('fiscal/naturezaOperacao/index', $dados);
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
}