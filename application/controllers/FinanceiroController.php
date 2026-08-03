<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FinanceiroController extends CI_Controller {

    function __construct(){
        parent::__construct();

        if(usuarioLogado() == false){

            redirect(base_url("login"), "home", "refresh");

        }

        if(getDadosUsuarioLogado()['financeiro'] != 1){

            redirect(base_url("visao-geral"), "home", "refresh");

        }

        $empresa = $this->empresa->getEmpresaPorCodigo(getDadosUsuarioLogado()['id_empresa']);
        if($empresa->data_validade < date('Y-m-d')){
            $this->session->set_flashdata('erro', 'Período de acesso finalizado, entre em 
                                           contato através do telefone (41) 9 9666 8250 ou pelo email contato@shopfloor.com.br para renovação');
            redirect(base_url('logout'), "home", "refresh");
        }
    }

    public function formConta(){

        $dados = array(
            'menu' => 'Cadastro'
        );

        $this->load->view('cadastros/nova-conta', $dados);
    }

    public function formMetodoPagamento(){

        $listaConta = $this->financeiro->getConta();

        $dados = array(
            'lista_conta' => $listaConta,
            'menu' => 'Cadastro'
        );

        $this->load->view('cadastros/novo-metodo-pagamento', $dados);
    }

    public function formCentroCusto(){

        $dados = array(
            'menu' => 'Cadastro'
        );

        $this->load->view('cadastros/novo-centro-custo', $dados);
    }

    public function formContaContabil(){

        $listaContaContabil = $this->financeiro->getContaContabil();

        $dados = array(
            'lista_conta_contabil' => $listaContaContabil,
            'menu' => 'Cadastro'
        );

        $this->load->view('cadastros/nova-conta-contabil', $dados);
    }

    public function editarConta($codConta){

        $conta = $this->financeiro->getContaPorCodigo($codConta);

        if($conta == null){
            redirect(base_url('conta'));
            
        }else{            
            $dados = array(
                'conta' => $conta,
                'menu' => 'Cadastro'
            );
        }

        $this->load->view('cadastros/editar-conta', $dados);

    }

    public function editarMetodoPagamento($codMetodoPagamento){

        $metodo_pagamento = $this->financeiro->getMetodoPagamentoPorCodigo($codMetodoPagamento);

        if($metodo_pagamento == null){
            redirect(base_url('metodo-pagamento'));
            
        }else{      
            $listaConta = $this->financeiro->getConta();

            $dados = array(
                'metodo_pagamento' => $metodo_pagamento,
                'lista_conta' => $listaConta,
                'menu' => 'Cadastro'
            );
        }

        $this->load->view('cadastros/editar-metodo-pagamento', $dados);

    }

    public function editarCentroCusto($codCentroCusto){

        $centroCusto = $this->financeiro->getCentroCustoPorCodigo($codCentroCusto);
        $orcamento_conta = $this->financeiro->getOrcamentoPorCentro($codCentroCusto);
        $listaContaContabil = $this->financeiro->getContaContabilAtivo();

        if($centroCusto == null){
            redirect(base_url('centro-custo'));
            
        }else{            
            $dados = array(
                'centro_custo' => $centroCusto,
                'lista_orcamento' => $orcamento_conta,
                'lista_conta_contabil' => $listaContaContabil,
                'menu' => 'Cadastro'
            );
        }

        $this->load->view('cadastros/editar-centro-custo', $dados);

    }

    public function editarContaContabil($codContaContabil){

        $conta_contabil = $this->financeiro->getContaContabilPorCodigo($codContaContabil);
        $orcamento_conta = $this->financeiro->getOrcamentoPorConta($codContaContabil);
        $listaCentroCusto = $this->financeiro->getCentroCustoAtivo();

        if($conta_contabil == null){
            redirect(base_url('conta-contabil'));
            
        }else{            
            $dados = array(
                'conta_contabil' => $conta_contabil,
                'lista_orcamento' => $orcamento_conta,
                'lista_centro_custo' => $listaCentroCusto,
                'menu' => 'Cadastro'
            );
        }

        $this->load->view('cadastros/editar-conta-contabil', $dados);

    }    

    public function inserirConta(){  

        //Validações dos campo e array das mensagens apresentadas
        $this->form_validation->set_rules('NomeConta', 'Nome da Conta', 'required|max_length[100]',
            array('required' => 'Você deve preencher o campo %s',
                  'max_length' => 'O campo %s não deve ter mais que 45 caracteres'));

        if($this->form_validation->run() == false){

            $this->session->set_flashdata('erro', validation_errors());
            $this->formConta();
            
        }else {

            //Conversão quantidade estoque
            $saldoInicial = floatval(str_replace(",",".",(str_replace(".","",$this->input->post('SaldoInicial')))));

            $data = [
                'id_empresa' => getDadosUsuarioLogado()['id_empresa'],
                'nome_conta'  => $this->input->post('NomeConta'),
                'ativo' => $this->input->post('Ativo')
            ];

            $codConta = $this->financeiro->insertConta($data);

            //Movimenta conta inicial
            if($saldoInicial > 0){

                if($this->input->post('TipoSaldo') == 1){

                    $dadosMovimento = [
                        'cod_conta' => $codConta,
                        'tipo_movimento' => 1,
                        'data_competencia' => date("Y-m-d"),
                        'data_vencimento' => date("Y-m-d"),
                        'data_confirmacao' => date("Y-m-d"),
                        'parcela' => '1/1',
                        'valor_titulo' => $saldoInicial,
                        'valor_confirmado' => $saldoInicial,
                        'desc_movimento' => "Saldo inicial da conta",
                        'confirmado' => 1,
                        'usuario_criacao' => getDadosUsuarioLogado()['email'],
                    ];

                    $this->financeiro->insertMovimentoConta($dadosMovimento);

                }elseif($this->input->post('TipoSaldo') == 2){

                    $dadosMovimento = [
                        'cod_conta' => $codConta,
                        'tipo_movimento' => 2,
                        'data_vencimento' => date("Y-m-d"),
                        'parcela' => '1/1',
                        'valor_titulo' => $saldoInicial,
                        'valor_confirmado' => $saldoInicial,
                        'desc_movimento' => "Saldo inicial da conta",
                        'confirmado' => 1,
                        'usuario_criacao' => getDadosUsuarioLogado()['email'],
                    ];
    
                    $this->financeiro->insertMovimentoConta($dadosMovimento);

                }
            }

            //Se optar por salvar e continuar, mantém na página de cadastro
            if ($this->input->post('Opcao') == 'salvarContinuar'){

                $this->session->set_flashdata('sucesso', 'Conta cadastrada com sucesso');
                redirect(base_url('conta/nova-conta'));


            }else {

                $this->session->set_flashdata('sucesso', 'Conta cadastrada com sucesso');
                redirect(base_url("conta/editar-conta/{$codConta}"), "home", "refresh");    
            }            
        }        
    }

    public function inserirCentroCusto(){  

        //Validações dos campo e array das mensagens apresentadas
        $this->form_validation->set_rules('CodCentroCusto', 'Código Centro de Custo', 'required|max_length[60]',
            array('required' => 'Você deve preencher o campo %s',
                  'max_length' => 'O campo %s não deve ter mais que 60 caracteres'));
        $this->form_validation->set_rules('NomeCentroCusto', 'Nome do Centro de Custo', 'required|max_length[100]',
            array('required' => 'Você deve preencher o campo %s',
                  'max_length' => 'O campo %s não deve ter mais que 100 caracteres'));

        if($this->form_validation->run() == false){

            $this->session->set_flashdata('erro', validation_errors());
            $this->formCentroCusto();
            
        }else {

            $data = [
                'id_empresa' => getDadosUsuarioLogado()['id_empresa'],
                'cod_centro_custo'  => $this->input->post('CodCentroCusto'),
                'nome_centro_custo'  => $this->input->post('NomeCentroCusto'),
                'ativo' => $this->input->post('Ativo'),
                'mov_entrada' => $this->input->post('MovEntrada'),
                'mov_saida' => $this->input->post('MovSaida'),
            ];

            $this->financeiro->insertCentroCusto($data);
            $codCentroCusto = $this->input->post('CodCentroCusto');

            //Se optar por salvar e continuar, mantém na página de cadastro
            if ($this->input->post('Opcao') == 'salvarContinuar'){

                $this->session->set_flashdata('sucesso', 'Centro de custo cadastrado com sucesso');
                redirect(base_url('centro-custo/novo-centro-custo'));


            }else {

                $this->session->set_flashdata('sucesso', 'Centro de custo cadastrado com sucesso');
                redirect(base_url("centro-custo/editar-centro-custo/{$codCentroCusto}"), "home", "refresh"); 
            }            
        }        
    }

    public function inserirOrcamento($codContaContabil){

        //Validações dos campo e array das mensagens apresentadas
        $this->form_validation->set_rules('Ano', 'Ano', 'required',
            array('required' => 'Você deve preencher o campo %s'));
        
        if($this->form_validation->run() == false){

            $this->session->set_flashdata('erro', validation_errors());
            $this->editarContaContabil($codContaContabil);
            
        }else {

            $data = [
                'id_empresa' => getDadosUsuarioLogado()['id_empresa'],
                'cod_centro_custo' => $this->input->post('CodCentroCusto'),
                'cod_conta_contabil'  => $codContaContabil,
                'ano' => $this->input->post('Ano'),
                'janeiro' => str_replace(",",".",(str_replace(".","",$this->input->post('Jan')))),
                'fevereiro' => str_replace(",",".",(str_replace(".","",$this->input->post('Fev')))),
                'marco' => str_replace(",",".",(str_replace(".","",$this->input->post('Mar')))),
                'abril' => str_replace(",",".",(str_replace(".","",$this->input->post('Abr')))),
                'maio' => str_replace(",",".",(str_replace(".","",$this->input->post('Mai')))),
                'junho' => str_replace(",",".",(str_replace(".","",$this->input->post('Jun')))),
                'julho' => str_replace(",",".",(str_replace(".","",$this->input->post('Jul')))),
                'agosto' => str_replace(",",".",(str_replace(".","",$this->input->post('Ago')))),
                'setembro' => str_replace(",",".",(str_replace(".","",$this->input->post('Set')))),
                'outubro' => str_replace(",",".",(str_replace(".","",$this->input->post('Out')))),
                'novembro' => str_replace(",",".",(str_replace(".","",$this->input->post('Nov')))),
                'dezembro' => str_replace(",",".",(str_replace(".","",$this->input->post('Dez')))),
            ];
            $this->financeiro->insertOrcamento($data);

            $this->session->set_flashdata('sucesso', 'Orçamento cadastrado com sucesso');
            redirect(base_url("conta-contabil/editar-conta-contabil/{$codContaContabil}"));           
        }        

    }

    public function inserirOrcamentoCentroCusto($codCentroCusto){

        //Validações dos campo e array das mensagens apresentadas
        $this->form_validation->set_rules('Ano', 'Ano', 'required',
            array('required' => 'Você deve preencher o campo %s'));
        
        if($this->form_validation->run() == false){

            $this->session->set_flashdata('erro', validation_errors());
            $this->editarCentroCusto($codCentroCusto);
            
        }else {

            $data = [
                'id_empresa' => getDadosUsuarioLogado()['id_empresa'],
                'cod_centro_custo' => $codCentroCusto,
                'cod_conta_contabil'  => $this->input->post('CodContaContabil'),
                'janeiro' => str_replace(",",".",(str_replace(".","",$this->input->post('Jan')))),
                'fevereiro' => str_replace(",",".",(str_replace(".","",$this->input->post('Fev')))),
                'marco' => str_replace(",",".",(str_replace(".","",$this->input->post('Mar')))),
                'abril' => str_replace(",",".",(str_replace(".","",$this->input->post('Abr')))),
                'maio' => str_replace(",",".",(str_replace(".","",$this->input->post('Mai')))),
                'junho' => str_replace(",",".",(str_replace(".","",$this->input->post('Jun')))),
                'julho' => str_replace(",",".",(str_replace(".","",$this->input->post('Jul')))),
                'agosto' => str_replace(",",".",(str_replace(".","",$this->input->post('Ago')))),
                'setembro' => str_replace(",",".",(str_replace(".","",$this->input->post('Set')))),
                'outubro' => str_replace(",",".",(str_replace(".","",$this->input->post('Out')))),
                'novembro' => str_replace(",",".",(str_replace(".","",$this->input->post('Nov')))),
                'dezembro' => str_replace(",",".",(str_replace(".","",$this->input->post('Dez')))),
            ];
            $this->financeiro->insertOrcamento($data);

            $this->session->set_flashdata('sucesso', 'Orçamento cadastrado com sucesso');
            redirect(base_url("centro-custo/editar-centro-custo/{$codCentroCusto}"));           
        }        

    }

    public function salvarOrcamento(){

        $codContaContabil = $this->uri->segment(3);
        $seq_orcamento = $this->uri->segment(4);

        $data = [
            'janeiro' => str_replace(",",".",(str_replace(".","",$this->input->post('Jan')))),
            'fevereiro' => str_replace(",",".",(str_replace(".","",$this->input->post('Fev')))),
            'marco' => str_replace(",",".",(str_replace(".","",$this->input->post('Mar')))),
            'abril' => str_replace(",",".",(str_replace(".","",$this->input->post('Abr')))),
            'maio' => str_replace(",",".",(str_replace(".","",$this->input->post('Mai')))),
            'junho' => str_replace(",",".",(str_replace(".","",$this->input->post('Jun')))),
            'julho' => str_replace(",",".",(str_replace(".","",$this->input->post('Jul')))),
            'agosto' => str_replace(",",".",(str_replace(".","",$this->input->post('Ago')))),
            'setembro' => str_replace(",",".",(str_replace(".","",$this->input->post('Set')))),
            'outubro' => str_replace(",",".",(str_replace(".","",$this->input->post('Out')))),
            'novembro' => str_replace(",",".",(str_replace(".","",$this->input->post('Nov')))),
            'dezembro' => str_replace(",",".",(str_replace(".","",$this->input->post('Dez')))),
        ];
        $this->financeiro->updateOrcamento($codContaContabil, $seq_orcamento, $data);

        $this->session->set_flashdata('sucesso', 'Orçamento salvo com sucesso');
        redirect(base_url("conta-contabil/editar-conta-contabil/{$codContaContabil}"));   

    }

    public function salvarOrcamentoCentroCusto(){

        $codCentroCusto = $this->uri->segment(3);
        $seq_orcamento = $this->uri->segment(4);

        $data = [
            'janeiro' => str_replace(",",".",(str_replace(".","",$this->input->post('Jan')))),
            'fevereiro' => str_replace(",",".",(str_replace(".","",$this->input->post('Fev')))),
            'marco' => str_replace(",",".",(str_replace(".","",$this->input->post('Mar')))),
            'abril' => str_replace(",",".",(str_replace(".","",$this->input->post('Abr')))),
            'maio' => str_replace(",",".",(str_replace(".","",$this->input->post('Mai')))),
            'junho' => str_replace(",",".",(str_replace(".","",$this->input->post('Jun')))),
            'julho' => str_replace(",",".",(str_replace(".","",$this->input->post('Jul')))),
            'agosto' => str_replace(",",".",(str_replace(".","",$this->input->post('Ago')))),
            'setembro' => str_replace(",",".",(str_replace(".","",$this->input->post('Set')))),
            'outubro' => str_replace(",",".",(str_replace(".","",$this->input->post('Out')))),
            'novembro' => str_replace(",",".",(str_replace(".","",$this->input->post('Nov')))),
            'dezembro' => str_replace(",",".",(str_replace(".","",$this->input->post('Dez')))),
        ];
        $this->financeiro->updateOrcamentoCentroCusto($codCentroCusto, $seq_orcamento, $data);

        $this->session->set_flashdata('sucesso', 'Orçamento salvo com sucesso');
        redirect(base_url("centro-custo/editar-centro-custo/{$codCentroCusto}"));   

    }

    public function excluirOrcamento($codContaContabil)
    {

        $seq_orcamento = $this->input->post("excluir_todos");
        

        $this->financeiro->deleteOrcamento($codContaContabil, $seq_orcamento);

        $this->session->set_flashdata('sucesso', 'Orçamentos excluídos com sucesso');
        redirect(base_url("conta-contabil/editar-conta-contabil/{$codContaContabil}")); 
    } 

    public function excluirOrcamentoCentroCusto($codCentroCusto)
    {

        $seq_orcamento = $this->input->post("excluir_todos");
        

        $this->financeiro->deleteOrcamentoCentroCusto($codCentroCusto, $seq_orcamento);

        $this->session->set_flashdata('sucesso', 'Orçamentos excluídos com sucesso');
        redirect(base_url("centro-custo/editar-centro-custo/{$codCentroCusto}")); 
    } 

    public function inserirMetodoPagamento(){  

        //Validações dos campo e array das mensagens apresentadas
        $this->form_validation->set_rules('NomeMetodoPagamento', 'Nome do Método de Pagamento', 'required|max_length[60]',
            array('required' => 'Você deve preencher o campo %s',
                  'max_length' => 'O campo %s não deve ter mais que 60 caracteres'));

        if($this->form_validation->run() == false){

            $this->session->set_flashdata('erro', validation_errors());
            $this->formMetodoPagamento();
            
        }else {

            $data = [
                'id_empresa' => getDadosUsuarioLogado()['id_empresa'],
                'nome_metodo_pagamento'  => $this->input->post('NomeMetodoPagamento'),
                'cod_conta' => ($this->input->post('CodConta')) ?$this->input->post('CodConta') : null,
                'taxa_operacao' => floatval(str_replace(",",".",(str_replace(".","",$this->input->post('TaxaOperacao'))))),
                'dias_recebimento'  => $this->input->post('DiasRecebimento'),
                'ativo' => $this->input->post('Ativo'),
                
            ];

            $codMetodoPagamento = $this->financeiro->insertMetodoPagamento($data);

            //Se optar por salvar e continuar, mantém na página de cadastro
            if ($this->input->post('Opcao') == 'salvarContinuar'){

                $this->session->set_flashdata('sucesso', 'Método de pagamento cadastrado com sucesso');
                redirect(base_url('metodo-pagamento/novo-metodo-pagamento'));


            }else {

                $this->session->set_flashdata('sucesso', 'Método de pagamento cadastrado com sucesso');
                redirect(base_url("metodo-pagamento/editar-metodo-pagamento/{$codMetodoPagamento}"), "home", "refresh");  
            }            
        }        
    }

    public function inserirContaContabil(){  

        //Validações dos campo e array das mensagens apresentadas
        $this->form_validation->set_rules('CodContaContabil', 'Código Centro de Custo', 'required|max_length[60]|is_unique[usuario.email]',
            array('required' => 'Você deve preencher o campo %s',
                  'max_length' => 'O campo %s não deve ter mais que 60 caracteres'));
        $this->form_validation->set_rules('NomeContaContabil', 'Nome do Centro de Custo', 'required|max_length[60]',
            array('required' => 'Você deve preencher o campo %s',
                  'max_length' => 'O campo %s não deve ter mais que 60 caracteres'));        

        if($this->form_validation->run() == false){

            $this->session->set_flashdata('erro', validation_errors());
            $this->formContaContabil();
            
        }else {

            if($this->input->post('CodContaContabilPai') != ""){
                $codContaContabil = $this->input->post('CodContaContabilPai') . "." . $this->input->post('CodContaContabil');
            }else{
                $codContaContabil = $this->input->post('CodContaContabil');
            }

            $data = [
                'id_empresa' => getDadosUsuarioLogado()['id_empresa'],
                'cod_conta_contabil'  => $codContaContabil,
                'cod_conta_contabil_pai' => $this->input->post('CodContaContabilPai'),
                'nome_conta_contabil'  => $this->input->post('NomeContaContabil'),
                'demons_result'  => $this->input->post('DemonsResult'),
                'ativo' => $this->input->post('Ativo'),
                'mov_entrada' => $this->input->post('MovEntrada'),
                'mov_saida' => $this->input->post('MovSaida'),
            ];

            $this->financeiro->insertContaContabil($data);

            //Se optar por salvar e continuar, mantém na página de cadastro
            if ($this->input->post('Opcao') == 'salvarContinuar'){

                $this->session->set_flashdata('sucesso', 'Conta contábil cadastrada com sucesso');
                redirect(base_url('conta-contabil/nova-conta-contabil'));


            }else {

                $this->session->set_flashdata('sucesso', 'Conta contábil cadastrada com sucesso');
                redirect(base_url("conta-contabil/editar-conta-contabil/{$codContaContabil}"), "home", "refresh");
            }            
        }        
    }

    public function salvarConta($codConta){

        //Validações dos campos
        $this->form_validation->set_rules('NomeConta', 'Nome da Conta', 'required|max_length[100]',
            array('required' => 'Você deve preencher o campo %s',
                  'max_length' => 'O campo %s não deve ter mais que 100 caracteres'));

        if($this->form_validation->run() == false){

            $this->session->set_flashdata('erro', validation_errors());
            $this->editarConta($codConta);
            
        }else {

            $dados = [
                'nome_conta'  => $this->input->post('NomeConta'),
                'ativo' => $this->input->post('Ativo')
            ];

            $this->financeiro->updateConta($codConta, $dados);

            $this->session->set_flashdata('sucesso', 'Conta alterada com sucesso');
            redirect(base_url("conta/editar-conta/{$codConta}"), "home", "refresh");          
        }
    }

    public function salvarCentroCusto($codCentroCusto){

        //Validações dos campos
        $this->form_validation->set_rules('NomeCentroCusto', 'Nome do CentroCusto', 'required|max_length[100]',
            array('required' => 'Você deve preencher o campo %s',
                  'max_length' => 'O campo %s não deve ter mais que 100 caracteres'));

        if($this->form_validation->run() == false){

            $this->session->set_flashdata('erro', validation_errors());
            $this->editarCentroCusto($codCentroCusto);
            
        }else {

            $dados = [
                'nome_centro_custo'  => $this->input->post('NomeCentroCusto'),
                'ativo' => $this->input->post('Ativo'),
                'mov_entrada' => $this->input->post('MovEntrada'),
                'mov_saida' => $this->input->post('MovSaida'),
            ];

            $this->financeiro->updateCentroCusto($codCentroCusto, $dados);

            $this->session->set_flashdata('sucesso', 'Centro de custo alterado com sucesso');
            redirect(base_url("centro-custo/editar-centro-custo/{$codCentroCusto}"), "home", "refresh");          
        }
    }

    public function salvarContaContabil($codContaContabil){

        //Validações dos campos
        $this->form_validation->set_rules('NomeContaContabil', 'Nome do Centro de Custo', 'required|max_length[60]',
            array('required' => 'Você deve preencher o campo %s',
                  'max_length' => 'O campo %s não deve ter mais que 60 caracteres'));  

        if($this->form_validation->run() == false){

            $this->session->set_flashdata('erro', validation_errors());
            $this->editarContaContabil($codContaContabil);
            
        }else {

            $dados = [
                'nome_conta_contabil'  => $this->input->post('NomeContaContabil'),
                'demons_result'  => $this->input->post('DemonsResult'),
                'ativo' => $this->input->post('Ativo'),
                'mov_entrada' => $this->input->post('MovEntrada'),
                'mov_saida' => $this->input->post('MovSaida'),
            ];

            $this->financeiro->updateContaContabil($codContaContabil, $dados);

            $this->session->set_flashdata('sucesso', 'Conta contábil alterado com sucesso');
            redirect(base_url("conta-contabil/editar-conta-contabil/{$codContaContabil}"), "home", "refresh");          
        }
    }

    public function salvarMetodoPagamento($codMetodoPagamento){

        //Validações dos campos
        $this->form_validation->set_rules('NomeMetodoPagamento', 'Nome do Método de Pagamento', 'required|max_length[60]',
            array('required' => 'Você deve preencher o campo %s',
                  'max_length' => 'O campo %s não deve ter mais que 60 caracteres'));  

        if($this->form_validation->run() == false){

            $this->session->set_flashdata('erro', validation_errors());
            $this->editarMetodoPagamento($codMetodoPagamento);
            
        }else {

            $dados = [
                'nome_metodo_pagamento'  => $this->input->post('NomeMetodoPagamento'),
                'cod_conta' => ($this->input->post('CodConta')) ? $this->input->post('CodConta') : null,
                'taxa_operacao' => floatval(str_replace(",",".",(str_replace(".","",$this->input->post('TaxaOperacao'))))),
                'dias_recebimento'  => $this->input->post('DiasRecebimento'),
                'ativo' => $this->input->post('Ativo'),
            ];

            $this->financeiro->updateMetodoPagamento($codMetodoPagamento, $dados);

            $this->session->set_flashdata('sucesso', 'Método de pagamento alterado com sucesso');
            redirect(base_url("metodo-pagamento/editar-metodo-pagamento/{$codMetodoPagamento}"), "home", "refresh");          
        }
    }

    public function inserirTituloContasPagar(){
        $mes = $this->uri->segment(4);
        $ano = $this->uri->segment(5);

        //Validações dos campo e array das mensagens apresentadas
        $this->form_validation->set_rules('DataCompetencia', 'Data de Competência', 'required', 
            array('required' => 'Você deve preencher o campo %s'));
        $this->form_validation->set_rules('ValorTitulo', 'Valor a Pagar', 'required|callback_more_zero',
            array('required' => 'Você deve preencher o campo %s'));        
        $this->form_validation->set_rules('DataVencimento[]', 'Data de Vencimento', 'required', 
            array('required' => 'Você deve preencher o campo %s'));

        if($this->form_validation->run() == false){

            $this->session->set_flashdata('erro', validation_errors());
            redirect(base_url("financeiro/contas-pagar/{$mes}/{$ano}"));;
            
        }else {

            $empresa = $this->empresa->getEmpresaPorCodigo(getDadosUsuarioLogado()['id_empresa']);

            $numParcela = $this->input->post('Parcelas');
            $dataVencimento = $this->input->post('DataVencimento');
            $valorParcela = $this->input->post('ValorParcela');
            $metodoPagamento = $this->input->post('CodMetodoPagamento'); 

            $valorTotal = floatval(str_replace(",",".",(str_replace(".","",$this->input->post('ValorTitulo')))));

            for ($i = 1; $i <= $numParcela; $i++) {   

                $codConta = $empresa->conta_padrao;
                $pagamento = null;

                if($metodoPagamento[$i] != null) {
                    $pagamento = $this->financeiro->getMetodoPagamentoPorCodigo($metodoPagamento[$i]);
                    if($pagamento->cod_conta != null && $pagamento->cod_conta != 0){

                        $codConta = $pagamento->cod_conta;

                    }
                }

                $usuarioLiquidacao = null;
                if($this->input->post('Confirmar') == 1){
                    $usuarioLiquidacao = getDadosUsuarioLogado()['email'];                     
                }
                
                //Cria título                
                $dadosMovimento = null;
                $dadosMovimento = [
                    'cod_conta' => $codConta,
                    'cod_metodo_pagamento' => $metodoPagamento[$i],
                    'cod_centro_custo' => $this->input->post('CodCentroCusto'),
                    'cod_conta_contabil' => $this->input->post('CodContaContabil'),
                    'cod_emitente' => $this->input->post('CodFornecedor'),
                    'data_competencia' => date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataCompetencia')))),  
                    'data_confirmacao' => ($this->input->post('DataConfirmacao')) ? date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataConfirmacao')))) : null,                  
                    'tipo_movimento' => 2,
                    'data_vencimento' => date("Y-m-d", strtotime(str_replace('/', '-', $dataVencimento[$i]))),
                    'parcela' => $i . '/' . $numParcela,
                    'desc_movimento' => $this->input->post('Descricao'),
                    'valor_titulo' => floatval(str_replace(",",".",(str_replace(".","",$valorParcela[$i])))),
                    'valor_desc_taxa' => floatval(str_replace(",",".",(str_replace(".","",$this->input->post('ValorDescontoTaxas'))))),
                    'valor_juros_multa' => floatval(str_replace(",",".",(str_replace(".","",$this->input->post('ValorMultasJustos'))))),
                    'valor_confirmado' => floatval(str_replace(",",".",(str_replace(".","",$this->input->post('ValorPagar'))))),
                    'confirmado' => ($this->input->post('Confirmar')) ? $this->input->post('Confirmar') : 0,
                    'usuario_criacao' => getDadosUsuarioLogado()['email'],
                    'usuario_liquidacao' => $usuarioLiquidacao
                ];
                $titulo = $this->financeiro->insertMovimentoConta($dadosMovimento);

            }            
        }

        $this->session->set_flashdata('sucesso', 'Título criado com sucesso');
        redirect(base_url("financeiro/contas-pagar/{$mes}/{$ano}"));

    }

    public function inserirTitulo($codConta){

        //Validações dos campo e array das mensagens apresentadas
        $this->form_validation->set_rules('DataCompetencia', 'Data de Competência', 'required', 
            array('required' => 'Você deve preencher o campo %s'));
        $this->form_validation->set_rules('ValorTitulo', 'Valor do Título', 'required|callback_more_zero',
            array('required' => 'Você deve preencher o campo %s'));        
        $this->form_validation->set_rules('DataVencimento', 'Data de Vencimento', 'required', 
            array('required' => 'Você deve preencher o campo %s'));        

        if($this->form_validation->run() == false){

            $this->session->set_flashdata('erro', validation_errors());
            redirect(base_url("financeiro/saldo-conta/movimento-conta/{$codConta}"));;
            
        }else {

            $usuarioLiquidacao = null;
            if($this->input->post('Confirmar') == 1){
                $usuarioLiquidacao = getDadosUsuarioLogado()['email'];                     
            }

            $dadosMovimento = [
                'cod_conta' => $codConta,
                'cod_centro_custo' => $this->input->post('CodCentroCusto'),
                'cod_conta_contabil' => $this->input->post('CodContaContabil'),
                'tipo_movimento' => $this->input->post('TipoMovimento'),
                'data_competencia' => date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataCompetencia')))),
                'data_confirmacao' => ($this->input->post('DataConfirmacao')) ? date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataConfirmacao')))) : null,  
                'data_vencimento' => date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataVencimento')))),
                'parcela' => '1/1',
                'desc_movimento' => $this->input->post('Descricao'),
                'valor_titulo' => str_replace(",",".",(str_replace(".","",$this->input->post('ValorTitulo')))),
                'valor_desc_taxa' => floatval(str_replace(",",".",(str_replace(".","",$this->input->post('ValorDescontoTaxas'))))),
                'valor_juros_multa' => floatval(str_replace(",",".",(str_replace(".","",$this->input->post('ValorMultasJustos'))))),
                'valor_confirmado' => floatval(str_replace(",",".",(str_replace(".","",$this->input->post('ValorConfirmado'))))),
                'confirmado' => ($this->input->post('Confirmar')) ? $this->input->post('Confirmar') : 0,
                'usuario_criacao' => getDadosUsuarioLogado()['email'],
                'usuario_liquidacao' => $usuarioLiquidacao
            ];

            $titulo = $this->financeiro->insertMovimentoConta($dadosMovimento);

        }

        $this->session->set_flashdata('sucesso', 'Título criado com sucesso');
        redirect(base_url("financeiro/saldo-conta/movimento-conta/{$codConta}"));

    }

    public function inserirTituloContasReceber(){
        $mes = $this->uri->segment(4);
        $ano = $this->uri->segment(5);

        //Validações dos campo e array das mensagens apresentadas
        $this->form_validation->set_rules('DataCompetencia', 'Data de Competência', 'required', 
            array('required' => 'Você deve preencher o campo %s'));
        $this->form_validation->set_rules('ValorTitulo', 'Valor a Receber', 'required|callback_more_zero',
            array('required' => 'Você deve preencher o campo %s'));        
        $this->form_validation->set_rules('DataVencimento[]', 'Data de Vencimento', 'required', 
            array('required' => 'Você deve preencher o campo %s'));

        if($this->form_validation->run() == false){

            $this->session->set_flashdata('erro', validation_errors());
            redirect(base_url("financeiro/contas-receber/{$mes}/{$ano}"));;
            
        }else {

            $empresa = $this->empresa->getEmpresaPorCodigo(getDadosUsuarioLogado()['id_empresa']);

            $numParcela = $this->input->post('Parcelas');
            $dataVencimento = $this->input->post('DataVencimento');
            $valorParcela = $this->input->post('ValorParcela');
            $metodoPagamento = $this->input->post('CodMetodoPagamento'); 

            $valorTotal = floatval(str_replace(",",".",(str_replace(".","",$this->input->post('ValorTitulo')))));

            for ($i = 1; $i <= $numParcela; $i++) {

                $codConta = $empresa->conta_padrao;
                $pagamento = null;

                if($metodoPagamento[$i] != null) {
                    $pagamento = $this->financeiro->getMetodoPagamentoPorCodigo($metodoPagamento[$i]);
                    if($pagamento->cod_conta != null && $pagamento->cod_conta != 0){

                        $codConta = $pagamento->cod_conta;

                    }
                }

                $usuarioLiquidacao = null;
                if($this->input->post('Confirmar') == 1){
                    $usuarioLiquidacao = getDadosUsuarioLogado()['email'];                     
                }
                
                //Criação do título                
                $dadosMovimento = null;
                $dadosMovimento = [
                    'cod_conta' => $codConta,
                    'cod_metodo_pagamento' => $metodoPagamento[$i],                    
                    'cod_centro_custo' => $this->input->post('CodCentroCusto'),
                    'cod_conta_contabil' => $this->input->post('CodContaContabil'),
                    'cod_emitente' => $this->input->post('CodCliente'),                    
                    'data_competencia' => date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataCompetencia')))),
                    'data_confirmacao' => ($this->input->post('DataConfirmacao')) ? date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataConfirmacao')))) : null, 
                    'tipo_movimento' => 1,
                    'data_vencimento' => date("Y-m-d", strtotime(str_replace('/', '-', $dataVencimento[$i]))),
                    'parcela' => $i . '/' . $numParcela,
                    'desc_movimento' => $this->input->post('Descricao'),
                    'valor_titulo' => floatval(str_replace(",",".",(str_replace(".","",$valorParcela[$i])))),
                    'valor_desc_taxa' => floatval(str_replace(",",".",(str_replace(".","",$this->input->post('ValorDescontoTaxas'))))),
                    'valor_juros_multa' => floatval(str_replace(",",".",(str_replace(".","",$this->input->post('ValorMultasJustos'))))),
                    'valor_confirmado' => floatval(str_replace(",",".",(str_replace(".","",$this->input->post('ValorReceber'))))),
                    'confirmado' => ($this->input->post('Confirmar')) ? $this->input->post('Confirmar') : 0,
                    'usuario_criacao' => getDadosUsuarioLogado()['email'],
                    'usuario_liquidacao' => $usuarioLiquidacao
                ];

                $titulo = $this->financeiro->insertMovimentoConta($dadosMovimento);
            }

        }

        $this->session->set_flashdata('sucesso', 'Título criado com sucesso');
        redirect(base_url("financeiro/contas-receber/{$mes}/{$ano}"));

    }

    public function inserirTransferencia($codConta){

        //Validações dos campo e array das mensagens apresentadas
        $this->form_validation->set_rules('DataCompetencia', 'Data de Competência', 'required|callback_date_check', 
            array('required' => 'Você deve preencher o campo %s'));
        $this->form_validation->set_rules('ValorTitulo', 'Valor do Título', 'required|callback_more_zero',
            array('required' => 'Você deve preencher o campo %s'));        
        $this->form_validation->set_rules('DataVencimento', 'Data de Vencimento', 'required', 
            array('required' => 'Você deve preencher o campo %s'));     
        $this->form_validation->set_rules('CodConta', 'Conta', 'required',
            array('required' => 'Você deve preencher o campo %s'));   

        if($this->form_validation->run() == false){

            $this->session->set_flashdata('erro', validation_errors());
            redirect(base_url("financeiro/saldo-conta/movimento-conta/{$codConta}"));;
            
        }else {

            $usuarioLiquidacao = null;
            if($this->input->post('Confirmar') == 1){
                $usuarioLiquidacao = getDadosUsuarioLogado()['email'];                     
            }

            $dadosMovimento = [
                'cod_conta' => $codConta,
                'especie_movimento' => 2,
                'tipo_movimento' => 2,
                'data_competencia' => date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataCompetencia')))),
                'data_confirmacao' => ($this->input->post('DataConfirmacao')) ? date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataConfirmacao')))) : null,  
                'data_vencimento' => date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataVencimento')))),
                'parcela' => '1/1',
                'desc_movimento' => $this->input->post('Descricao'),
                'valor_titulo' => str_replace(",",".",(str_replace(".","",$this->input->post('ValorTitulo')))),
                'valor_desc_taxa' => floatval(str_replace(",",".",(str_replace(".","",$this->input->post('ValorDescontoTaxas'))))),
                'valor_juros_multa' => floatval(str_replace(",",".",(str_replace(".","",$this->input->post('ValorMultasJustos'))))),
                'valor_confirmado' => floatval(str_replace(",",".",(str_replace(".","",$this->input->post('ValorConfirmado'))))),
                'confirmado' => ($this->input->post('Confirmar')) ? $this->input->post('Confirmar') : 0,
                'usuario_criacao' => getDadosUsuarioLogado()['email'],
                'usuario_liquidacao' => $usuarioLiquidacao
            ];
            $tituloOrigem = $this->financeiro->insertMovimentoConta($dadosMovimento);

            $dadosMovimento = null;
            $dadosMovimento = [
                'cod_titulo_rel' => $tituloOrigem,
                'cod_conta' => $this->input->post('CodConta'),
                'especie_movimento' => 2,
                'tipo_movimento' => 1,
                'data_competencia' => date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataCompetencia')))),
                'data_confirmacao' => ($this->input->post('DataConfirmacao')) ? date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataConfirmacao')))) : null,  
                'data_vencimento' => date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataVencimento')))),
                'parcela' => '1/1',
                'desc_movimento' => $this->input->post('Descricao'),
                'valor_titulo' => str_replace(",",".",(str_replace(".","",$this->input->post('ValorTitulo')))),
                'valor_desc_taxa' => floatval(str_replace(",",".",(str_replace(".","",$this->input->post('ValorDescontoTaxas'))))),
                'valor_juros_multa' => floatval(str_replace(",",".",(str_replace(".","",$this->input->post('ValorMultasJustos'))))),
                'valor_confirmado' => floatval(str_replace(",",".",(str_replace(".","",$this->input->post('ValorConfirmado'))))),
                'confirmado' => ($this->input->post('Confirmar')) ? $this->input->post('Confirmar') : 0,
                'usuario_criacao' => getDadosUsuarioLogado()['email'],
                'usuario_liquidacao' => $usuarioLiquidacao
            ];
            $tituloDestino = $this->financeiro->insertMovimentoConta($dadosMovimento);

            $dadosMovimento = null;
            $dadosMovimento = [
                'cod_conta' => $codConta,
                'confirmado' => ($this->input->post('Confirmar')) ? $this->input->post('Confirmar') : 0,
                'cod_titulo_rel' => $tituloDestino
            ];
            $this->financeiro->updateMovimentoConta($tituloOrigem, $dadosMovimento);

        }

        $this->session->set_flashdata('sucesso', 'Transferência criada com sucesso');
        redirect(base_url("financeiro/saldo-conta/movimento-conta/{$codConta}"));

    }

    public function salvarTitulo(){

        $codMovimento = $this->uri->segment(4);
        $codConta = $this->uri->segment(5);

        //Validações dos campo e array das mensagens apresentadas
        $this->form_validation->set_rules('ValorTitulo', 'Valor do Título', 'required|callback_more_zero',
            array('required' => 'Você deve preencher o campo %s'));        
        $this->form_validation->set_rules('DataVencimento', 'Data de Vencimento', 'required', 
            array('required' => 'Você deve preencher o campo %s'));

        if($this->form_validation->run() == false){

            $this->session->set_flashdata('erro', validation_errors());
            redirect(base_url("financeiro/saldo-conta/movimento-conta/{$codConta}"));
            
        }else {

            $movimento = $this->financeiro->getMovimentoPorCodigo($codMovimento);

            if($movimento->confirmado != 1){

                $usuarioLiquidacao = null;
                if($this->input->post('Confirmar') == 1){
                    $usuarioLiquidacao = getDadosUsuarioLogado()['email'];                     
                }

                $dadosMovimento = [
                    'cod_conta' => $codConta,
                    'cod_centro_custo' => $this->input->post('CodCentroCusto'),
                    'cod_conta_contabil' => $this->input->post('CodContaContabil'),
                    'data_competencia' => date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataCompetencia')))),
                    'data_vencimento' => date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataVencimento')))),
                    'data_confirmacao' => ($this->input->post('DataConfirmacao')) ? date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataConfirmacao')))) : null, 
                    'desc_movimento' => $this->input->post('Descricao'),
                    'valor_titulo' => str_replace(",",".",(str_replace(".","",$this->input->post('ValorTitulo')))),
                    'valor_desc_taxa' => floatval(str_replace(",",".",(str_replace(".","",$this->input->post('ValorDescontoTaxas'))))),
                    'valor_juros_multa' => floatval(str_replace(",",".",(str_replace(".","",$this->input->post('ValorMultasJustos'))))),
                    'valor_confirmado' => floatval(str_replace(",",".",(str_replace(".","",$this->input->post('ValorConfirmado'))))),
                    'confirmado' => ($this->input->post('Confirmar')) ? $this->input->post('Confirmar') : 0,
                    'usuario_liquidacao' => $usuarioLiquidacao
                ];

            }else{

                if($movimento->confirmado == 1 && $this->input->post('Confirmar') != 1){

                    $dadosMovimento = [
                        'cod_conta' => $codConta,
                        'data_confirmacao' => null,  
                        'valor_desc_taxa' => null,
                        'valor_juros_multa' => null,
                        'valor_confirmado' => null,
                        'confirmado' => ($this->input->post('Confirmar')) ? $this->input->post('Confirmar') : 0
                        
                    ];

                }else{

                    $dadosMovimento = [
                        'cod_conta' => $codConta,
                        'data_confirmacao' => date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataConfirmacao')))),  
                        'valor_desc_taxa' => floatval(str_replace(",",".",(str_replace(".","",$this->input->post('ValorDescontoTaxas'))))),
                        'valor_juros_multa' => floatval(str_replace(",",".",(str_replace(".","",$this->input->post('ValorMultasJustos'))))),
                        'valor_confirmado' => floatval(str_replace(",",".",(str_replace(".","",$this->input->post('ValorConfirmado'))))),
                        'confirmado' => ($this->input->post('Confirmar')) ? $this->input->post('Confirmar') : 0,
                        'usuario_liquidacao' => getDadosUsuarioLogado()['email']
                    ];

                }              

            }

            $this->financeiro->updateMovimentoConta($codMovimento, $dadosMovimento);

        }

        $this->session->set_flashdata('sucesso', 'Título alterado com sucesso');
        redirect(base_url("financeiro/saldo-conta/movimento-conta/{$codConta}"));

    }

    public function salvarTituloContasPagar($codMovimento){

        $mes = $this->uri->segment(5);
        $ano = $this->uri->segment(6);

        //Validações dos campo e array das mensagens apresentadas
        $this->form_validation->set_rules('ValorTitulo', 'Valor a Pagar', 'required|callback_more_zero',
            array('required' => 'Você deve preencher o campo %s'));        
        $this->form_validation->set_rules('DataVencimento', 'Data de Vencimento', 'required', 
            array('required' => 'Você deve preencher o campo %s'));
        $this->form_validation->set_rules('CodConta', 'Conta', 'required',
            array('required' => 'Você deve preencher o campo %s'));

        if($this->form_validation->run() == false){

            $this->session->set_flashdata('erro', validation_errors());
            redirect(base_url("financeiro/contas-pagar/{$mes}/{$ano}"));
            
        }else {

            $usuarioLiquidacao = null;
            if($this->input->post('Confirmar') == 1){
                $usuarioLiquidacao = getDadosUsuarioLogado()['email'];                     
            }

            $dadosMovimento = [
                'cod_conta' => $this->input->post('CodConta'),
                'cod_metodo_pagamento' => $this->input->post('CodMetodoPagamento'),
                'cod_emitente' => $this->input->post('CodFornecedor'),
                'cod_centro_custo' => $this->input->post('CodCentroCusto'),
                'cod_conta_contabil' => $this->input->post('CodContaContabil'),
                'tipo_movimento' => 2,
                'data_competencia' => date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataCompetencia')))),
                'data_vencimento' => date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataVencimento')))),
                'data_confirmacao' => ($this->input->post('DataConfirmacao')) ? date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataConfirmacao')))) : null,
                'desc_movimento' => $this->input->post('Descricao'),
                'valor_titulo' => str_replace(",",".",(str_replace(".","",$this->input->post('ValorTitulo')))),
                'valor_desc_taxa' => floatval(str_replace(",",".",(str_replace(".","",$this->input->post('ValorDescontoTaxas'))))),
                'valor_juros_multa' => floatval(str_replace(",",".",(str_replace(".","",$this->input->post('ValorMultasJustos'))))),
                'valor_confirmado' => floatval(str_replace(",",".",(str_replace(".","",$this->input->post('ValorPagar'))))),
                'confirmado' => ($this->input->post('Confirmar')) ? $this->input->post('Confirmar') : 0,
                'usuario_liquidacao' => $usuarioLiquidacao
            ];

            $this->financeiro->updateMovimentoConta($codMovimento, $dadosMovimento);

        }

        $this->session->set_flashdata('sucesso', 'Título alterado com sucesso');
        redirect(base_url("financeiro/contas-pagar/{$mes}/{$ano}?". $_SERVER['REQUEST_URI']));

    }

    public function salvarTituloContasReceber($codMovimento){

        $mes = $this->uri->segment(5);
        $ano = $this->uri->segment(6);

        //Validações dos campo e array das mensagens apresentadas
        $this->form_validation->set_rules('ValorTitulo', 'Valor a Receber', 'required|callback_more_zero',
            array('required' => 'Você deve preencher o campo %s'));        
        $this->form_validation->set_rules('DataVencimento', 'Data de Vencimento', 'required', 
            array('required' => 'Você deve preencher o campo %s'));
        $this->form_validation->set_rules('CodConta', 'Conta', 'required',
            array('required' => 'Você deve preencher o campo %s'));

        if($this->form_validation->run() == false){

            $this->session->set_flashdata('erro', validation_errors());
            redirect(base_url("financeiro/contas-receber/{$mes}/{$ano}"));
            
        }else {

            $usuarioLiquidacao = null;
            if($this->input->post('Confirmar') == 1){
                $usuarioLiquidacao = getDadosUsuarioLogado()['email'];                     
            }

            $dadosMovimento = [
                'cod_conta' => $this->input->post('CodConta'),
                'cod_metodo_pagamento' => $this->input->post('CodMetodoPagamento'),
                'cod_emitente' => $this->input->post('CodCliente'),
                'cod_centro_custo' => $this->input->post('CodCentroCusto'),
                'cod_conta_contabil' => $this->input->post('CodContaContabil'),
                'tipo_movimento' => 1,
                'data_competencia' => date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataCompetencia')))),
                'data_vencimento' => date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataVencimento')))),
                'data_confirmacao' => ($this->input->post('DataConfirmacao')) ? date("Y-m-d", strtotime(str_replace('/', '-', $this->input->post('DataConfirmacao')))) : null, 
                'desc_movimento' => $this->input->post('Descricao'),
                'cod_conta_contabil' => $this->input->post("CodContaContabil"),
                'valor_titulo' => str_replace(",",".",(str_replace(".","",$this->input->post('ValorTitulo')))),
                'valor_desc_taxa' => floatval(str_replace(",",".",(str_replace(".","",$this->input->post('ValorDescontoTaxas'))))),
                'valor_juros_multa' => floatval(str_replace(",",".",(str_replace(".","",$this->input->post('ValorMultasJustos'))))),
                'valor_confirmado' => floatval(str_replace(",",".",(str_replace(".","",$this->input->post('ValorReceber'))))),
                'confirmado' => ($this->input->post('Confirmar')) ? $this->input->post('Confirmar') : 0,
                'usuario_liquidacao' => $usuarioLiquidacao
            ];

            $this->financeiro->updateMovimentoConta($codMovimento, $dadosMovimento);

        }

        $this->session->set_flashdata('sucesso', 'Título alterado com sucesso');
        redirect(base_url("financeiro/contas-receber/{$mes}/{$ano}"));

    }

    public function excluirConta()
    {

        $codConta = $this->input->post("excluir_todos");
        

        $this->financeiro->deleteConta($codConta);

        $this->session->set_flashdata('sucesso', 'Registro(s) selecionado(s) excluído(s)');
        redirect(base_url('conta'));
    } 

    public function excluirMetodoPagamento()
    {

        $codMetodoPagamento = $this->input->post("excluir_todos");
        

        $this->financeiro->deleteMetodoPagamento($codMetodoPagamento);

        $this->session->set_flashdata('sucesso', 'Registro(s) selecionado(s) excluído(s)');
        redirect(base_url('metodo-pagamento'));
    } 

    public function excluirCentroCusto()
    {

        $codCentroCusto = $this->input->post("excluir_todos");
        

        $this->financeiro->deleteCentroCusto($codCentroCusto);

        $this->session->set_flashdata('sucesso', 'Registro(s) selecionado(s) excluído(s)');
        redirect(base_url('centro-custo'));
    }

    public function excluirContaContabil()
    {

        $codContaContabil = $this->input->post("excluir_todos");
        

        $this->financeiro->deleteContaContabil($codContaContabil);

        $this->session->set_flashdata('sucesso', 'Registro(s) selecionado(s) excluído(s)');
        redirect(base_url('conta-contabil'));
    }

    public function acaoTitulo($codConta)
    {

        $codMovimento = $this->input->post("selecionar_todos");

        if($this->input->post("Acao") == "Eliminar"){

            $this->financeiro->excluirTitulo($codMovimento);
            $this->session->set_flashdata('sucesso', 'Registro(s) selecionado(s) excluído(s)');

        }elseif($this->input->post("Acao") == "Confirmar"){

            foreach($codMovimento as $titulo){

                $movimento = $this->financeiro->getMovimentoPorCodigo($titulo);

                $dadosMovimento = null;
                $dadosMovimento = [
                    'cod_conta' => $movimento->cod_conta,
                    'data_confirmacao' => date("Y-m-d"),
                    'cod_centro_custo' => $movimento->cod_centro_custo,
                    'cod_conta_contabil' => $movimento->cod_conta_contabil,
                    'data_vencimento' => $movimento->data_vencimento,
                    'desc_movimento' => $movimento->desc_movimento,
                    'valor_titulo' => $movimento->valor_titulo,
                    'valor_desc_taxa' => 0,
                    'valor_juros_multa' => 0,
                    'valor_confirmado' => $movimento->valor_titulo,
                    'confirmado' => 1,
                    'usuario_liquidacao' => getDadosUsuarioLogado()['email']
                ];
    
                $this->financeiro->updateMovimentoConta($titulo, $dadosMovimento);
            }
            $this->session->set_flashdata('sucesso', 'Registro(s) selecionado(s) confirmado(s)');

        }

        redirect(base_url("financeiro/saldo-conta/movimento-conta/{$codConta}"));
    }

    public function acaoTituloContasPagar()
    {
        $mes = $this->uri->segment(4);
        $ano = $this->uri->segment(5);

        $codMovimento = $this->input->post("selecionar_todos");

        if($this->input->post("Acao") == "Eliminar"){

            $this->financeiro->excluirTituloContasPagar($codMovimento);
            $this->session->set_flashdata('sucesso', 'Registro(s) selecionado(s) excluído(s)');

        }elseif($this->input->post("Acao") == "Confirmar"){

            foreach($codMovimento as $titulo){

                $movimento = $this->financeiro->getMovimentoPorCodigo($titulo);

                $dadosMovimento = null;
                $dadosMovimento = [
                    'cod_conta' => $movimento->cod_conta,
                    'data_confirmacao' => date("Y-m-d"),
                    'cod_centro_custo' => $movimento->cod_centro_custo,
                    'cod_conta_contabil' => $movimento->cod_conta_contabil,
                    'data_vencimento' => $movimento->data_vencimento,
                    'desc_movimento' => $movimento->desc_movimento,
                    'valor_titulo' => $movimento->valor_titulo,
                    'valor_desc_taxa' => $movimento->valor_desc_taxa,
                    'valor_juros_multa' => $movimento->valor_juros_multa,
                    'valor_confirmado' => $movimento->valor_titulo - $movimento->valor_desc_taxa + $movimento->valor_juros_multa,
                    'confirmado' => 1,
                    'usuario_liquidacao' => getDadosUsuarioLogado()['email']
                ];
    
                $this->financeiro->updateMovimentoConta($titulo, $dadosMovimento);
            }
            $this->session->set_flashdata('sucesso', 'Registro(s) selecionado(s) confirmado(s)');

        }  
        
        redirect(base_url("financeiro/contas-pagar/{$mes}/{$ano}"));
    }

    public function acaoTituloContasReceber()
    {
        $mes = $this->uri->segment(4);
        $ano = $this->uri->segment(5);

        $codMovimento = $this->input->post("selecionar_todos");

        if($this->input->post("Acao") == "Eliminar"){

            $this->financeiro->excluirTituloContasReceber($codMovimento);
            $this->session->set_flashdata('sucesso', 'Registro(s) selecionado(s) excluído(s)');

        }elseif($this->input->post("Acao") == "Confirmar"){

            foreach($codMovimento as $titulo){

                $movimento = $this->financeiro->getMovimentoPorCodigo($titulo);

                $dadosMovimento = null;
                $dadosMovimento = [
                    'cod_conta' => $movimento->cod_conta,
                    'data_confirmacao' => date("Y-m-d"),
                    'cod_centro_custo' => $movimento->cod_centro_custo,
                    'cod_conta_contabil' => $movimento->cod_conta_contabil,
                    'data_vencimento' => $movimento->data_vencimento,
                    'desc_movimento' => $movimento->desc_movimento,
                    'valor_titulo' => $movimento->valor_titulo,
                    'valor_desc_taxa' => $movimento->valor_desc_taxa,
                    'valor_juros_multa' => $movimento->valor_juros_multa,
                    'valor_confirmado' => $movimento->valor_titulo - $movimento->valor_desc_taxa + $movimento->valor_juros_multa,
                    'confirmado' => 1,
                    'usuario_liquidacao' => getDadosUsuarioLogado()['email']
                ];
    
                $this->financeiro->updateMovimentoConta($titulo, $dadosMovimento);
            }
            $this->session->set_flashdata('sucesso', 'Registro(s) selecionado(s) confirmado(s)');

        }  
        
        redirect(base_url("financeiro/contas-receber/{$mes}/{$ano}"));
    }

    public function listarConta(){ 
        
        // Busca dos dados para apresentação
        $filter = ($this->input->get('buscar')) ? $this->input->get('buscar') : "";
        $offset = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

        $config = array(
            'base_url' => base_url('conta'),
            'per_page' => 15,
            'num_links' => 10,
            'uri_segment' => 2,
            'total_rows' => $this->financeiro->countAllConta($filter),
            'reuse_query_string' => true,
            'full_tag_open' => '<ul class="pagination justify-content-center  mb-0 link-load">',
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
        
        $listaConta = $this->financeiro->getConta($filter, $config["per_page"], $offset);


        $dados = array(
            'filter' => $filter,
            'pagination' => $this->pagination->create_links(),
            'lista_conta' => $listaConta,
            'menu' => 'Cadastro'
        );

        $this->load->view('cadastros/conta', $dados);
    } 

    public function listarMetodoPagamento(){ 
        
        // Busca dos dados para apresentação
        $filter = ($this->input->get('buscar')) ? $this->input->get('buscar') : "";
        $offset = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

        $config = array(
            'base_url' => base_url('metodo-pagamento'),
            'per_page' => 15,
            'num_links' => 10,
            'uri_segment' => 2,
            'total_rows' => $this->financeiro->countAllMetodoPagamento($filter),
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
        
        $listaMetodoPagamento = $this->financeiro->getMetodoPagamento($filter, $config["per_page"], $offset);


        $dados = array(
            'filter' => $filter,
            'pagination' => $this->pagination->create_links(),
            'lista_metodo_pagamento' => $listaMetodoPagamento,
            'menu' => 'Cadastro'
        );

        $this->load->view('cadastros/metodo-pagamento', $dados);
    }
    
    public function listarCentroCusto(){  
        
        // Busca dos dados para apresentação
        $filter = ($this->input->get('buscar')) ? $this->input->get('buscar') : "";
        $offset = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

        $config = array(
            'base_url' => base_url('centro-custo'),
            'per_page' => 15,
            'num_links' => 10,
            'uri_segment' => 2,
            'total_rows' => $this->financeiro->countAllCentroCusto($filter),
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
        
        $listaCentroCusto = $this->financeiro->getCentroCusto($filter, $config["per_page"], $offset);

        $dados = array(
            'filter' => $filter,
            'pagination' => $this->pagination->create_links(),
            'lista_centro_custo' => $listaCentroCusto,
            'menu' => 'Cadastro'
        );

        $this->load->view('cadastros/centro-custo', $dados);
    }

    public function listarContaContabil(){    
        
        // Busca dos dados para apresentação
        $filter = ($this->input->get('buscar')) ? $this->input->get('buscar') : "";
        $offset = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

        $config = array(
            'base_url' => base_url('conta-contabil'),
            'per_page' => 15,
            'num_links' => 10,
            'uri_segment' => 2,
            'total_rows' => $this->financeiro->countAllContaContabil($filter),
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
        
        $listaContaContabil = $this->financeiro->getContaContabil($filter, $config["per_page"], $offset);


        $dados = array(
            'filter' => $filter,
            'pagination' => $this->pagination->create_links(),
            'lista_conta_contabil' => $listaContaContabil,
            'menu' => 'Cadastro'
        );

        $this->load->view('cadastros/conta-contabil', $dados);
    }

    public function redirecionaContasPagar(){

        $mes = date('m');
        $ano = date('Y');

        redirect(base_url("financeiro/contas-pagar/{$mes}/{$ano}"), "home", "refresh");

    }

    public function redirecionaContasReceber(){

        $mes = date('m');
        $ano = date('Y');

        redirect(base_url("financeiro/contas-receber/{$mes}/{$ano}"), "home", "refresh");

    }

    public function redirecionaDREDFCGerencial(){

        $ano = date('Y');

        redirect(base_url("relatorios/dre-dfc-gerencial/{$ano}"), "home", "refresh");                

    }

    public function DREDFCGerencial(){

        $ano = $this->uri->segment(3);


        $anoAnterior = date('Y', strtotime('-1 year', strtotime(date(''.$ano.'-01'.'-01'))));
        $anoSeguinte = date('Y', strtotime('+1 year', strtotime(date(''.$ano.'-01'.'-01'))));

        $dreResult = $this->financeiro->getReceita($ano);
        $dreDeducoes = $this->financeiro->getDeducoes($ano);
        $dreCustos = $this->financeiro->getCustos($ano);
        $dreDespOper = $this->financeiro->getDespesasOper($ano);
        $dreOutReceitasNaoOper = $this->financeiro->getOutrasRecNaoOper($ano);
        $dreOutDespesasNaoOper = $this->financeiro->getOutrasDespNaoOper($ano);
        $dreInvestimentos = $this->financeiro->getInvestimentos($ano);

        $dados = array(
            'ano' => $ano,
            'ano_anterior' => $anoAnterior,
            'ano_seguinte' => $anoSeguinte,
            'dre_receita' => $dreResult,
            'dre_deducoes' => $dreDeducoes,
            'dre_custos' => $dreCustos,
            'dre_desp_oper' => $dreDespOper,
            'dre_out_rece_noper' => $dreOutReceitasNaoOper,
            'dre_out_desp_noper' => $dreOutDespesasNaoOper,
            'dre_investimentos' => $dreInvestimentos,
            'menu' => 'Financeiro'
        );

        //print_r($dreResult);

        $this->load->view('financeiro/dre-dfc-gerencial', $dados);

    }

    public function contasPagar(){

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

        $dataInicio = date('Y-m-01', strtotime(date(''.$ano.'-'.$mes.'-01')));
        $dataFim = date('Y-m-t', strtotime(date(''.$ano.'-'.$mes.'-01')));

        $mesAnterior = date('m', strtotime('-1 months', strtotime(date(''.$ano.'-'.$mes.'-01'))));
        $anoAnterior = date('Y', strtotime('-1 months', strtotime(date(''.$ano.'-'.$mes.'-01'))));
        $mesSeguinte = date('m', strtotime('+1 months', strtotime(date(''.$ano.'-'.$mes.'-01'))));
        $anoSeguinte = date('Y', strtotime('+1 months', strtotime(date(''.$ano.'-'.$mes.'-01'))));

        $fornecedorFiltro = $this->input->get('fornecedorFiltro'); 
        $metodoPagamentoFiltro = $this->input->get('MetodoPagamentoFiltro');
        $contaFinanceiraFiltro = $this->input->get('ContaFinanceiraFiltro');
        $centroCustoFiltro = $this->input->get('CentroCustoFiltro');
        $contaContabilFiltro = $this->input->get('ContaContabilFiltro');

        $listaContaAtiva = $this->financeiro->getContaResumida($dataInicio, $dataFim);
        $listaContaResumida = $this->financeiro->getTotalLancamento($dataInicio, $dataFim, $contaFinanceiraFiltro);
        $listaMetodoPagamento = $this->financeiro->getMetodoPagamentoAtivo();
        $listaTitulos = $this->financeiro->getContaPagarPendente($data, $fornecedorFiltro, $metodoPagamentoFiltro, $contaFinanceiraFiltro, $centroCustoFiltro, $contaContabilFiltro);
        $listaFornecedor = $this->fornecedor->getFornecedorAtivo();
        $listaCentroCusto = $this->financeiro->getCentroCustoAtivoDespesa();
        $listaContaContabil = $this->financeiro->getContaContabilAtivoDespesa();

        $dados = array(
            'descMes' => $descMes,
            'pagination' => "",
            'fornecedorFiltro' => $fornecedorFiltro,
            'metodoPagamentoFiltro' => $metodoPagamentoFiltro,
            'contaFinanceiraFiltro' => $contaFinanceiraFiltro,
            'centroCustoFiltro' => $centroCustoFiltro,
            'contaContabilFiltro' => $contaContabilFiltro,
            'lista_conta' => $listaContaAtiva,
            'lista_metodo_pagamento' => $listaMetodoPagamento,
            'lista_contas_pagar' => $listaTitulos,
            'lista_fornecedor' => $listaFornecedor,
            'lista_centro_custo' => $listaCentroCusto,
            'lista_conta_contabil' => $listaContaContabil,
            'lista_conta_resumida' => $listaContaResumida,
            'mes' => $mes,
            'ano' => $ano,
            'mes_anterior' => $mesAnterior,
            'ano_anterior' => $anoAnterior,
            'mes_seguinte' => $mesSeguinte,
            'ano_seguinte' => $anoSeguinte,
            'menu' => 'Financeiro'
        );

        $this->load->view('financeiro/contas-pagar', $dados);


    }

    public function contasReceber(){

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

        $dataInicio = date('Y-m-01', strtotime(date(''.$ano.'-'.$mes.'-01')));
        $dataFim = date('Y-m-t', strtotime(date(''.$ano.'-'.$mes.'-01')));

        $mesAnterior = date('m', strtotime('-1 months', strtotime(date(''.$ano.'-'.$mes.'-01'))));
        $anoAnterior = date('Y', strtotime('-1 months', strtotime(date(''.$ano.'-'.$mes.'-01'))));
        $mesSeguinte = date('m', strtotime('+1 months', strtotime(date(''.$ano.'-'.$mes.'-01'))));
        $anoSeguinte = date('Y', strtotime('+1 months', strtotime(date(''.$ano.'-'.$mes.'-01'))));

        $clienteFiltro = $this->input->get('ClienteFiltro'); 
        $metodoPagamentoFiltro = $this->input->get('MetodoPagamentoFiltro');
        $contaFinanceiraFiltro = $this->input->get('ContaFinanceiraFiltro');
        $centroCustoFiltro = $this->input->get('CentroCustoFiltro');
        $contaContabilFiltro = $this->input->get('ContaContabilFiltro');
        $vendedorFiltro = $this->input->get('VendedorFiltro');

        $listaContaAtiva = $this->financeiro->getContaResumida($dataInicio, $dataFim);
        $listaContaResumida = $this->financeiro->getTotalLancamento($dataInicio, $dataFim, $contaFinanceiraFiltro);
        $listaMetodoPagamento = $this->financeiro->getMetodoPagamentoAtivo();
        $listaTitulos = $this->financeiro->getContaReceberPendente($data, $clienteFiltro, $metodoPagamentoFiltro, $contaFinanceiraFiltro, $centroCustoFiltro, $contaContabilFiltro, $vendedorFiltro);
        $listaCliente = $this->cliente->getClienteAtivo();
        $listaCentroCusto = $this->financeiro->getCentroCustoAtivoReceita();
        $listaContaContabil = $this->financeiro->getContaContabilAtivoReceita();
        $listaVendedor = $this->vendedor->getVendedor();

        $dados = array(
            'descMes' => $descMes,
            'pagination' => "",
            'clienteFiltro' => $clienteFiltro,
            'metodoPagamentoFiltro' => $metodoPagamentoFiltro,
            'contaFinanceiraFiltro' => $contaFinanceiraFiltro,
            'centroCustoFiltro' => $centroCustoFiltro,
            'contaContabilFiltro' => $contaContabilFiltro,
            'vendedorFiltro' => $vendedorFiltro,
            'lista_conta' => $listaContaAtiva,
            'lista_metodo_pagamento' => $listaMetodoPagamento,
            'lista_contas_receber' => $listaTitulos,
            'lista_cliente' => $listaCliente,
            'lista_centro_custo' => $listaCentroCusto,
            'lista_conta_contabil' => $listaContaContabil,
            'lista_vendedor' => $listaVendedor,
            'lista_conta_resumida' => $listaContaResumida,
            'mes' => $mes,
            'ano' => $ano,
            'mes_anterior' => $mesAnterior,
            'ano_anterior' => $anoAnterior,
            'mes_seguinte' => $mesSeguinte,
            'ano_seguinte' => $anoSeguinte,
            'menu' => 'Financeiro'
        );

        $this->load->view('financeiro/contas-receber', $dados);


    }

    public function redirecionaSaldoConta(){

        $mes = date('m');
        $ano = date('Y');

        redirect(base_url("financeiro/saldo-conta/{$mes}/{$ano}"), "home", "refresh");

    }

    public function listarSaldoConta(){        
        
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

        $mesAnterior = date('m', strtotime('-1 months', strtotime(date(''.$ano.'-'.$mes.'-01'))));
        $anoAnterior = date('Y', strtotime('-1 months', strtotime(date(''.$ano.'-'.$mes.'-01'))));
        $mesSeguinte = date('m', strtotime('+1 months', strtotime(date(''.$ano.'-'.$mes.'-01'))));
        $anoSeguinte = date('Y', strtotime('+1 months', strtotime(date(''.$ano.'-'.$mes.'-01'))));

        $dataInicio = date('Y-m-01', strtotime(date(''.$ano.'-'.$mes.'-01')));
        $dataFim = date('Y-m-t', strtotime(date(''.$ano.'-'.$mes.'-01')));

        // Busca dos dados para apresentação
        $filter = ($this->input->get('buscar')) ? $this->input->get('buscar') : "";

        $listaMovimentos = $this->financeiro->getMovimentosConfirmadosPorConta($dataInicio, $dataFim);
        $listaContaAtiva = $this->financeiro->getContaResumida($dataInicio, $dataFim);
        $listaContaResumida = $this->financeiro->getTotalLancamento($dataInicio, $dataFim, null);


        $dados = array(
            'descMes' => $descMes,
            'filter' => $filter,
            'lista_conta' => $listaContaAtiva,
            'lista_titulos' => $listaMovimentos,
            'lista_conta_resumida' => $listaContaResumida,
            'mes' => $mes,
            'ano' => $ano,
            'data' => $data,
            'mes_anterior' => $mesAnterior,
            'ano_anterior' => $anoAnterior,
            'mes_seguinte' => $mesSeguinte,
            'ano_seguinte' => $anoSeguinte,
            'menu' => 'Financeiro'
        );

        $this->load->view('financeiro/saldo-conta', $dados);
    }

    public function redirecionaFinanceiro(){

        $mes = date('m');
        $ano = date('Y');

        redirect(base_url("financeiro/{$mes}/{$ano}"), "home", "refresh");

    }

    public function financeiro(){

        $mes = $this->uri->segment(2);
        $ano = $this->uri->segment(3);

        $data = date('Y-m-01', strtotime('+1 months', strtotime(date(''.$ano.'-'.$mes.'-01'))));
        $dataInicioAno = date('Y-m-01', strtotime(date(''.$ano.'-01-01')));

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

        $dataInicio = date('Y-m-01', strtotime(date(''.$ano.'-'.$mes.'-01')));
        $dataFim = date('Y-m-t', strtotime(date(''.$ano.'-'.$mes.'-01')));

        $mesAnterior = date('m', strtotime('-1 months', strtotime(date(''.$ano.'-'.$mes.'-01'))));
        $anoAnterior = date('Y', strtotime('-1 months', strtotime(date(''.$ano.'-'.$mes.'-01'))));
        $mesSeguinte = date('m', strtotime('+1 months', strtotime(date(''.$ano.'-'.$mes.'-01'))));
        $anoSeguinte = date('Y', strtotime('+1 months', strtotime(date(''.$ano.'-'.$mes.'-01'))));

        $titulosPendentes = $this->financeiro->getMovimentosPendentes($dataInicio, $dataFim);
        $titulosConfirmados = $this->financeiro->getMovimentosConfirmados($dataInicio, $dataFim); 
        
        $saldoConta = $this->financeiro->getSaldoContas();
        $listaFluxoConfirmado = $this->financeiro->getConfirmadoDia($dataInicio, $dataFim);
        $listaResultadoAno = $this->financeiro->getResultadoAno($dataInicioAno, $dataFim);

        $labelContaDia = array();
        $labelDia = array();
        $labelNomMes = array();
        $labelAno = array();
        $dadosEntradaDia = array();
        $dadosSaidaDia = array();
        $totalDespesas = 0;
        $totalReceitas = 0;
        foreach($listaFluxoConfirmado as $key_fluxo => $fluxo){

            $labelContaDia[] = str_replace('-', '/', date("d-m", strtotime($fluxo->data)));
            $labelDia[] = date("d", strtotime($fluxo->data));
            $labelNomMes[] = $fluxo->nome_mes;
            $labelAno[] = date("Y", strtotime($fluxo->data));            

            $dadosEntradaDia[] = $fluxo->entradas;
            $dadosSaidaDia[] = $fluxo->saidas * -1;

            $totalDespesas = $totalDespesas + $fluxo->saidas;
            $totalReceitas = $totalReceitas + $fluxo->entradas;

        }

        $listaFluxoPrevisto = $this->financeiro->getTitulosDia($dataInicio, $dataFim);
        $saldoInicial = $saldoConta->saldo_contas - $titulosConfirmados->entradas + $titulosConfirmados->saidas;

        $labelContaDiaPendente = array();
        $labelDiaPendente = array();
        $labelNomMesPendente = array();
        $labelAnoPendente = array();
        $saldoDia = array();
        $entradaPendenteAcumulada = 0;
        $saidaPendenteAcumulada = 0;
        foreach($listaFluxoPrevisto as $key_fluxo => $fluxo){

            $labelContaDiaPendente[] = str_replace('-', '/', date("d-m", strtotime($fluxo->data)));
            $labelDiaPendente[] = date("d", strtotime($fluxo->data));
            $labelNomMesPendente[] = $fluxo->nome_mes;
            $labelAnoPendente[] = date("Y", strtotime($fluxo->data));

            if($fluxo->data < date('Y-m-d')){

                $entradaPendenteAcumulada = $entradaPendenteAcumulada + $fluxo->entradas_pendentes;
                $saidaPendenteAcumulada = $saidaPendenteAcumulada + $fluxo->saidas_pendentes;                
                $saldoDia[] = $saldoInicial + $fluxo->entradas_confirmadas - $fluxo->saidas_confirmadas;
                $saldoInicial = $saldoInicial + $fluxo->entradas_confirmadas - $fluxo->saidas_confirmadas;

            }else{

                $saldoDia[] = $saldoInicial + ($fluxo->entradas_confirmadas + $fluxo->entradas_pendentes + $entradaPendenteAcumulada) - ($fluxo->saidas_confirmadas + $fluxo->saidas_pendentes + $saidaPendenteAcumulada);
                $saldoInicial = $saldoInicial + ($fluxo->entradas_confirmadas + $fluxo->entradas_pendentes + $entradaPendenteAcumulada) - ($fluxo->saidas_confirmadas + $fluxo->saidas_pendentes + $saidaPendenteAcumulada);
                $entradaPendenteAcumulada = 0;
                $saidaPendenteAcumulada = 0;

            }          

        }

        // Resultado ano
        $labelNomMesAno = array();
        $labelResultAno = array();
        $labelMes = array();
        $entradaMes = array(); 
        $saidaMes = array(); 
        $totalEntradaAno = 0;  
        $totalSaidaAno = 0; 
        foreach($listaResultadoAno as $resultado_mes){
            
            $labelResultAno[] = $resultado_mes->ano;
            $labelMes[] = $resultado_mes->mes;
            $labelNomMesAno[] = $resultado_mes->nome_mes;
            $entradaMes[] = $resultado_mes->entradas_confirmadas;
            $saidaMes[] = $resultado_mes->saidas_confirmadas;
            $totalEntradaAno = $totalEntradaAno + $resultado_mes->entradas_confirmadas;
            $totalSaidaAno = $totalSaidaAno + $resultado_mes->saidas_confirmadas;

        }

        $listaConta = $this->financeiro->getContaResumida($dataInicio, $dataFim);
        $listaContaContabilReceita = $this->financeiro->getLancamentosContasContabReceita($dataInicio, $dataFim);
        $listaContaContabilDespesa = $this->financeiro->getLancamentosContasContabDespesa($dataInicio, $dataFim);
        $listaCentroCustoReceita = $this->financeiro->getLancamentosCentroCustoReceita($dataInicio, $dataFim);
        $listaCentroCustoDespesa = $this->financeiro->getLancamentosCentroCustoDespesa($dataInicio, $dataFim);

        $dados = array(
            'titulos_pendente' => $titulosPendentes,
            'titulos_confirmados' => $titulosConfirmados,

            'conta' => $saldoConta,
            'descMes' => $descMes,
            'dia' => $labelContaDia,
            'entradas' => $dadosEntradaDia,
            'saidas' => $dadosSaidaDia,  
            'dia_nome' => $labelDia, 
            'nome_mes' => $labelNomMes,
            'ano' => $labelAno, 

            'dia_pendente' => $labelContaDiaPendente,
            'saldo_dia' => $saldoDia,  
            'dia_nome_pendente' => $labelDiaPendente, 
            'nome_mes_pendente' => $labelNomMesPendente,
            'ano_pendente' => $labelAnoPendente, 

            //resultado ano
            'label_ano' => $labelResultAno,
            'label_mes' => $labelMes,
            'label_nome_mes' => $labelNomMesAno,
            'entrada_mes' => $entradaMes,
            'saida_mes' => $saidaMes,
            'total_entrada_ano' => $totalEntradaAno,
            'total_saida_ano' => $totalSaidaAno,

            'lista_conta' => $listaConta,
            'lista_conta_contabil_receita' => $listaContaContabilReceita,
            'lista_conta_contabil_despesa' => $listaContaContabilDespesa,
            'lista_centro_custo_receita' => $listaCentroCustoReceita,
            'lista_centro_custo_despesa' => $listaCentroCustoDespesa,
            
            'mes' => $mes,
            'ano' => $ano,
            'mes_anterior' => $mesAnterior,
            'ano_anterior' => $anoAnterior,
            'mes_seguinte' => $mesSeguinte,
            'ano_seguinte' => $anoSeguinte,
            'menu' => 'Financeiro'
        );

        $this->load->view('financeiro/financeiro', $dados);


    }

    public function movimentoConta($codConta){

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

        $listaMovimentos = $this->financeiro->getMovimentosPorConta($codConta, $dataInicio, $dataFim);
        $listaConta = $this->financeiro->getSaldoContaPorCodigo($codConta, $dataFim); 
        if($listaConta == null){
            redirect(base_url("erro-404"));
        }
        $listaCentroCusto = $this->financeiro->getCentroCustoAtivo();  
        $listaContaContabil = $this->financeiro->getContaContabilAtivo(); 
        $listaContaAtiva = $this->financeiro->getContaAtivaDestino($listaConta->cod_conta); 
        $listaMetodoPagamento = $this->financeiro->getMetodoPagamentoAtivo();      

        $dados = array(
            'dataInicio' => $dataInicio,
            'dataFim' => $dataFim,
            'conta' => $listaConta,
            'lista_titulos' => $listaMovimentos,
            'lista_centro_custo' => $listaCentroCusto,
            'lista_conta_contabil' => $listaContaContabil,
            'lista_conta' => $listaContaAtiva,
            'lista_metodo_pagamento' => $listaMetodoPagamento,
            'menu' => 'Financeiro'
        );

        $this->load->view('financeiro/movimento-conta', $dados);

    }

    //Form Validation customizadas
    public function more_zero($str)
    {
        if(floatval(str_replace(",",".",$str)) <= 0.000){
            $this->form_validation->set_message('more_zero', 'Valor de %s deve ser maior que 0');
            return false;
        }else{
            return true;
        }
    }

    public function date_check($str)
    {
        if(date("Y-m-d", strtotime(str_replace('/', '-', $str))) > date("Y-m-d")){
            $this->form_validation->set_message('date_check', '%s não pode ser superior a data de hoje');
            return false;
        }else{
            return true;
        }
    }

    //Relatórios
    public function redirecionaLancamentoContas(){

        $mes = date('m');
        $ano = date('Y');

        redirect(base_url("relatorios/lancamento-contas/{$mes}/{$ano}"), "home", "refresh");

    }

    public function lancamentoContas(){

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
            $dataFim = date('Y-m-t');
        }

        $codContas = $this->input->get('conta'); 

        $listaConta = $this->financeiro->getContaAtivaRel();        
        $totalConta = $this->financeiro->getTotais($dataInicio, $dataFim, $codContas);
        $listaContaResumida = $this->financeiro->getTotalLancamento($dataInicio, $dataFim, $codContas);
        $listaMovimentoDetalhada = $this->financeiro->getLancamentosConta($dataInicio, $dataFim, $codContas);

        $dados = array(
            'dataInicio' => $dataInicio,
            'dataFim' => $dataFim,
            'cod_conta' => $codContas,
            'lista_conta' => $listaConta,
            'total_conta' => $totalConta,
            'lista_conta_resumida' => $listaContaResumida,
            'lista_movimento_detalhada' => $listaMovimentoDetalhada,
            'menu' => 'Financeiro'
            
        );

        $this->load->view('financeiro/lancamento-contas', $dados);

    }

    public function redirecionaFluxoCaixa(){

        $mes = date('m');
        $ano = date('Y');

        redirect(base_url("relatorios/fluxo-caixa/{$mes}/{$ano}"), "home", "refresh");

    }

    public function fluxoCaixa(){
        
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
        
        $dataInicio = date('Y-m-01', strtotime(date(''.$ano.'-'.$mes.'-01')));
        $dataFim = date('Y-m-t', strtotime(date(''.$ano.'-'.$mes.'-01')));

        $mesAnterior = date('m', strtotime('-1 months', strtotime(date(''.$ano.'-'.$mes.'-01'))));
        $anoAnterior = date('Y', strtotime('-1 months', strtotime(date(''.$ano.'-'.$mes.'-01'))));
        $mesSeguinte = date('m', strtotime('+1 months', strtotime(date(''.$ano.'-'.$mes.'-01'))));
        $anoSeguinte = date('Y', strtotime('+1 months', strtotime(date(''.$ano.'-'.$mes.'-01'))));

        $codContas = $this->input->get('conta'); 

        $listaConta = $this->financeiro->getContaAtivaRel();        
        $totalConta = $this->financeiro->getTotais($dataInicio, $dataFim, $codContas);
        $listaContaResumida = $this->financeiro->getTotalLancamento($dataInicio, $dataFim, $codContas);
        $listaFluxo = $this->financeiro->getFluxoDia($dataInicio, $dataFim, $codContas);
        $listaMovimentoDetalhada = $this->financeiro->getTitulosFluxo($dataInicio, $dataFim, $codContas);

        $dados = array(
            'descMes' => $descMes,
            'mes' => $mes,
            'ano' => $ano,
            'mes_anterior' => $mesAnterior,
            'ano_anterior' => $anoAnterior,
            'mes_seguinte' => $mesSeguinte,
            'ano_seguinte' => $anoSeguinte,
            'cod_conta' => $codContas,
            'lista_conta' => $listaConta,
            'total_conta' => $totalConta,
            'lista_conta_resumida' => $listaContaResumida,
            'lista_fluxo_dia' => $listaFluxo,
            'lista_movimento_detalhada' => $listaMovimentoDetalhada,
            'menu' => 'Financeiro'
            
        );

        $this->load->view('financeiro/fluxo-caixa', $dados);

    }

    public function redirecionaRealizadoOrcado(){

        $mes = date('m');
        $ano = date('Y');

        redirect(base_url("relatorios/realizado-orcado/{$mes}/{$ano}"), "home", "refresh");

    }

    public function RealizadoOrcado(){
        
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

        $listaCentroCusto = $this->financeiro->getCentroCustoAtivo();  
        $totalMovimento = $this->financeiro->getTotalResultado($dataInicio, $dataFim, $centro);         
        $listaResultadoDespesa = $this->financeiro->getResultadoDespesa($dataInicio, $dataFim, $centro); 
        $listaTituloDespesa = $this->financeiro->getMovimentoResultadoDespesa($dataInicio, $dataFim, $centro);
        $listaResultadoReceita = $this->financeiro->getResultadoReceita($dataInicio, $dataFim, $centro); 
        $listaTituloReceita = $this->financeiro->getMovimentoResultadoReceita($dataInicio, $dataFim, $centro);
        

        $color = "#ff8a65"; 
        $labelDespesa = array();
        $percDespesa = array();
        $colorDespesa = array();
        foreach($listaResultadoDespesa as $key_despesas => $despesa){

            $color = $this->random_color($color);
            if($despesa->cod_conta_contabil != null)
                $labelDespesa[] = "Sem conta";
            else
                $labelDespesa[] = $despesa->cod_conta_contabil . " - " . $despesa->nome_conta_contabil;
            
            $percDespesa[] = $percReceita[] = round(($despesa->valor / $totalMovimento->saidas) * 100, 1);
            $colorDespesa[] = $color;

            $despesa->color = $color;

            $orcamento = $this->financeiro->getOrcamentoPorCodigo($despesa->cod_conta_contabil, $centro, $mes, $ano);
            $despesa->orcado = $orcamento->valor_orcado;

        }

        $color = "#90a4ae"; 
        $labelReceita = array();
        $percReceita = array();
        $colorReceita = array();
        foreach($listaResultadoReceita as $key_receita => $receita){

            $color = $this->random_color($color);
            if($receita->cod_conta_contabil != null)
                $labelReceita[] = "Sem conta";
            else
                $labelReceita[] = $receita->cod_conta_contabil . " - " . $receita->nome_conta_contabil;
            
            $percReceita[] = round(($receita->valor / $totalMovimento->entradas) * 100, 1);
            $colorReceita[] = $color;

            $receita->color = $color;

            $orcamento = $this->financeiro->getOrcamentoPorCodigo($receita->cod_conta_contabil, $centro, $mes, $ano);
            $receita->orcado = $orcamento->valor_orcado;

        }

        $dados = array(
            'descMes' => $descMes,
            'mes' => $mes,
            'ano' => $ano,
            'mes_anterior' => $mesAnterior,
            'ano_anterior' => $anoAnterior,
            'mes_seguinte' => $mesSeguinte,
            'ano_seguinte' => $anoSeguinte,
            'total_despesa' => $totalMovimento,
            'centro' => $centro,
            'lista_centro_custo' => $listaCentroCusto,
            'lista_resultado_despesa' => $listaResultadoDespesa,
            'lista_titulo_despesa' => $listaTituloDespesa,
            'lista_resultado_receita' => $listaResultadoReceita,
            'lista_titulo_receta' => $listaTituloReceita,
            'label_despesa' => $labelDespesa,
            'perc_despesa' => $percDespesa,
            'color_despesa' => $colorDespesa,
            'label_receita' => $labelReceita,
            'perc_receita' => $percReceita,
            'color_receita' => $colorReceita,
            'menu' => 'Financeiro'
            
        );

        $this->load->view('financeiro/realizado-orcado', $dados);

    }

    public function getEstruturaRecursiva($listaEstrutura){
    }

    public function visaoFinanceiro(){
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

        $listaFluxo = $this->financeiro->getLancamentoDiario($dataInicio, $dataFim);
        $listaTotais = $this->financeiro->getTotaisConta($dataInicio, $dataFim);       
        
        $listaSaldoConta = $this->financeiro->getSaldosConta($dataInicio, $dataFim);
        $listaMovimentoConta = $this->financeiro->getMovimentosConta($dataInicio, $dataFim);

        $labelContaDia = array();
        $labelDia = array();
        $labelNomMes = array();
        $labelAno = array();
        $dadosEntradaDia = array();
        $dadosSaidaDia = array();
        $totalDespesas = 0;
        $totalReceitas = 0;
        foreach($listaFluxo as $key_fluxo => $fluxo){

            $labelContaDia[] = str_replace('-', '/', date("d-m", strtotime($fluxo->data)));
            $labelDia[] = date("d", strtotime($fluxo->data));
            $labelNomMes[] = $fluxo->nome_mes;
            $labelAno[] = date("Y", strtotime($fluxo->data));            

            $dadosEntradaDia[] = $fluxo->entradas;
            $dadosSaidaDia[] = $fluxo->saidas * -1;

            $totalDespesas = $totalDespesas + $fluxo->saidas;
            $totalReceitas = $totalReceitas + $fluxo->entradas;

        }

        // Despesas e Receitas Conta Contábil
        $listaDespesasContaContabil = $this->financeiro->getDespesasContaContabil($dataInicio, $dataFim);
        $listaReceitasContaContabil = $this->financeiro->getReceitasContaContabil($dataInicio, $dataFim);

        $corDespesaContaContabil = array();
        $dadosDespesaContaContabil = array();      
        foreach($listaDespesasContaContabil as $key_despesas => $despesa){

            if($key_despesas == 0){
                $corDespesaContaContabil[] = $this->random_color("");
            }else{
                $corDespesaContaContabil[] = $this->random_color($corDespesaContaContabil[$key_despesas - 1]);
            }
                        
            $dadosDespesaContaContabil[] = ($despesa->valor_total / $totalDespesas) * 100;
        }

        $corReceitaContaContabil = array();
        $dadosReceitaContaContabil = array();      
        foreach($listaReceitasContaContabil as $key_receitas => $receita){

            if($key_receitas == 0){
                $corReceitaContaContabil[] = $this->random_color("#F47C3C");
            }else{
                $corReceitaContaContabil[] = $this->random_color($corReceitaContaContabil[$key_receitas - 1]);
            }
                        
            $dadosReceitaContaContabil[] = ($receita->valor_total / $totalReceitas) * 100;
        }

        // Saldos conta
        $labelConta = array();
        $corSaldo = array();
        $dadosSaldo = array();
        foreach($listaSaldoConta as $key_conta => $conta){

            $labelConta[] = $conta->cod_conta . " - " . $conta->nome_conta;
            $dadosSaldo[] = $conta->saldo_conta;
            
            if($conta->saldo_conta > 0){
                $corSaldo[] = "#20c997";
            }else{
                $corSaldo[] = "#d9534f";
            }
        }

        $labelContaMov = array();
        $dadosEntradaDiaMov = array();
        $dadosSaidaDiaMov = array();
        foreach($listaMovimentoConta as $key_mov_conta => $mov_conta){

            if($mov_conta->entrada_confirm > 0 || $mov_conta->saida_confirm > 0){

                $labelContaMov[] = $mov_conta->cod_conta . " - " . $mov_conta->nome_conta;          

                $dadosEntradaDiaMov[] = $mov_conta->entrada_confirm;
                $dadosSaidaDiaMov[] = $mov_conta->saida_confirm * -1;

            }

        }

        // Despesas e Receitas por Centro de Custo
        $listaDespesasCentroCusto = $this->financeiro->getDespesasCentroCusto($dataInicio, $dataFim);
        $listaReceitasCentroCusto = $this->financeiro->getReceitasCentroCusto($dataInicio, $dataFim);

        $corDespesaCentroCusto = array();
        $dadosDespesaCentroCusto = array();      
        foreach($listaDespesasCentroCusto as $key_despesas => $despesa){

            if($key_despesas == 0){
                $corDespesaCentroCusto[] = $this->random_color("");
            }else{
                $corDespesaCentroCusto[] = $this->random_color($corDespesaCentroCusto[$key_despesas - 1]);
            }
                        
            $dadosDespesaCentroCusto[] = ($despesa->valor_total / $totalDespesas) * 100;
        }

        $corReceitaCentroCusto = array();
        $dadosReceitaCentroCusto = array();      
        foreach($listaReceitasCentroCusto as $key_receitas => $receita){

            if($key_receitas == 0){
                $corReceitaCentroCusto[] = $this->random_color("#F47C3C");
            }else{
                $corReceitaCentroCusto[] = $this->random_color($corReceitaCentroCusto[$key_receitas - 1]);
            }
                        
            $dadosReceitaCentroCusto[] = ($receita->valor_total / $totalReceitas) * 100;
        }

        $dados = array(
            'dataInicio' => $dataInicio,
            'dataFim' => $dataFim,

            'totais' => $listaTotais,

            'dia' => $labelContaDia,
            'entradas' => $dadosEntradaDia,
            'saidas' => $dadosSaidaDia,  
            'dia_nome' => $labelDia, 
            'nome_mes' => $labelNomMes,
            'ano' => $labelAno, 
            
            'total_despesa' => $totalDespesas,
            'total_receita' => $totalReceitas,
            
            'despesa_conta_contabil' => $listaDespesasContaContabil,            
            'cor_despesa_conta_contabil' => $corDespesaContaContabil,
            'dados_despesa_conta_contabil' => $dadosDespesaContaContabil,

            'receita_conta_contabil' => $listaReceitasContaContabil,            
            'cor_receita_conta_contabil' => $corReceitaContaContabil,
            'dados_receita_conta_contabil' => $dadosReceitaContaContabil,

            'despesa_centro_custo' => $listaDespesasCentroCusto,            
            'cor_despesa_centro_custo' => $corDespesaCentroCusto,
            'dados_despesa_centro_custo' => $dadosDespesaCentroCusto,

            'receita_centro_custo' => $listaReceitasCentroCusto,            
            'cor_receita_centro_custo' => $corReceitaCentroCusto,
            'dados_receita_centro_custo' => $dadosReceitaCentroCusto,

            'cor_saldo' => $corSaldo,
            'label_conta' => $labelConta,
            'dados_saldo' => $dadosSaldo,

            'label_conta_mov' => $labelContaMov,
            'dados_entrada_mov' => $dadosEntradaDiaMov,
            'dados_saida_mov' => $dadosSaidaDiaMov,
            
            'menu' => 'Financeiro'
        );

        $this->load->view('financeiro/indicadores-financeiro', $dados);

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