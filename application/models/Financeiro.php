<?php

class Financeiro extends CI_Model{

    public function insertMovimentoConta($movimentoFinanceiro){
        if(empty($movimentoFinanceiro['id_estabelecimento']) && !empty($movimentoFinanceiro['cod_conta'])){
            $contaMovimento = $this->getContaPorCodigo($movimentoFinanceiro['cod_conta']);
            if($contaMovimento !== null){
                $movimentoFinanceiro['id_estabelecimento'] = $contaMovimento->id_estabelecimento;
            }
        }
        $this->db->insert('movimentos_conta', $movimentoFinanceiro);
        $titulo = $this->db->insert_id();

        if($movimentoFinanceiro['confirmado'] == 1) {
            $conta = $this->getContaPorCodigo($movimentoFinanceiro['cod_conta']);

            if($movimentoFinanceiro['tipo_movimento'] == 1) {

                $saldoConta = $conta->saldo_conta + $movimentoFinanceiro['valor_confirmado'];

            }elseif($movimentoFinanceiro['tipo_movimento'] == 2) {

                $saldoConta = $conta->saldo_conta - $movimentoFinanceiro['valor_confirmado'];

            }

            $dados = [
                'saldo_conta' => $saldoConta
            ];
    
            $this->updateConta($conta->cod_conta, $dados);
        }  
        
        return $titulo;
    }

    public function insertConta($conta){
        $this->db->insert('conta', $conta);

        return $this->db->insert_id();
    }

    public function insertMetodoPagamento($metodo){
        $this->db->insert('metodo_pagamento', $metodo);

        return $this->db->insert_id();
    }

    public function insertCentroCusto($centroCusto){
        $this->db->insert('centro_custo', $centroCusto);

        return $this->db->insert_id();
    }

    public function insertContaContabil($ContaContabil){
        $this->db->insert('conta_contabil', $ContaContabil);

        return $this->db->insert_id();
    } 

    public function insertOrcamento($orcamento){
        $this->db->insert('orcamento', $orcamento);

        return $this->db->insert_id();
    }

    public function updateConta($codConta, $conta){
        $this->db->where('id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('cod_conta', $codConta);
        $this->db->update('conta', $conta);
    } 

    public function updateOrcamento($codContaContabil, $seq_orcamento, $orcamento){
        $this->db->where('id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('cod_conta_contabil', $codContaContabil);
        $this->db->where('seq_orcamento', $seq_orcamento);
        $this->db->update('orcamento', $orcamento);
    } 

    public function updateOrcamentoCentroCusto($codCentroCusto, $seq_orcamento, $orcamento){
        $this->db->where('id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('cod_centro_custo', $codCentroCusto);
        $this->db->where('seq_orcamento', $seq_orcamento);
        $this->db->update('orcamento', $orcamento);
    }
    
    public function updateMetodoPagamento($codMetodoPagamento, $metodo){
        $this->db->where('cod_metodo_pagamento', $codMetodoPagamento);
        $this->db->update('metodo_pagamento', $metodo);
    } 

    public function updateCentroCusto($codCentroCusto, $centroCusto){
        $this->db->where('id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('cod_centro_custo', $codCentroCusto);
        $this->db->update('centro_custo', $centroCusto);
    }

    public function updateContaContabil($codContaContabil, $ContaContabil){
        $this->db->where('id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('cod_conta_contabil', $codContaContabil);
        $this->db->update('conta_contabil', $ContaContabil);
    }

    public function updateMovimentoConta($codMovimento, $movimentoFinanceiro, $original = true){

        $movimento = $this->getMovimentoPorCodigo($codMovimento);
        
        $codConta = $movimentoFinanceiro['cod_conta'];

        if($movimento->confirmado == 0 && $movimentoFinanceiro['confirmado'] == 1) {
            $conta = $this->getContaPorCodigo($codConta);

            if($movimento->tipo_movimento == 1) {

                $saldoConta = $conta->saldo_conta + $movimentoFinanceiro['valor_confirmado'];

            }elseif($movimento->tipo_movimento == 2) {

                $saldoConta = $conta->saldo_conta - $movimentoFinanceiro['valor_confirmado'];

            }

            $dados = [
                'saldo_conta' => $saldoConta
            ];    
            $this->updateConta($codConta, $dados);

        }elseif($movimento->confirmado == 1 && $movimentoFinanceiro['confirmado'] == 0) {
            $codConta = $movimento->cod_conta;
            $conta = $this->getContaPorCodigo($codConta);

            if($movimento->tipo_movimento == 1) {

                $saldoConta = $conta->saldo_conta - $movimento->valor_confirmado;

            }elseif($movimento->tipo_movimento == 2) {

                $saldoConta = $conta->saldo_conta + $movimento->valor_confirmado;

            }

            $dados = [
                'saldo_conta' => $saldoConta
            ];
            $this->updateConta($codConta, $dados);

        }

        $this->db->where('cod_movimento_conta', $codMovimento);
        $this->db->update('movimentos_conta', $movimentoFinanceiro);

        //Atualiza título relacionado
        if($movimento->cod_titulo_rel != null){

            if($original == true){

                $movimentoRel = $this->financeiro->getMovimentoPorCodigo($movimento->cod_titulo_rel);

                if($movimentoRel->confirmado != 1){

                    $dadosMovimento = [
                        'cod_conta' => $movimentoRel->cod_conta,
                        'cod_centro_custo' => $movimentoFinanceiro['cod_centro_custo'],
                        'cod_conta_contabil' => $movimentoFinanceiro['cod_conta_contabil'],
                        'data_vencimento' => $movimentoFinanceiro['data_vencimento'],
                        'data_confirmacao' => $movimentoFinanceiro['data_confirmacao'],
                        'desc_movimento' => $movimentoFinanceiro['desc_movimento'],
                        'valor_titulo' => $movimentoFinanceiro['valor_titulo'],
                        'valor_desc_taxa' => $movimentoFinanceiro['valor_desc_taxa'],
                        'valor_juros_multa' => $movimentoFinanceiro['valor_juros_multa'],
                        'valor_confirmado' => $movimentoFinanceiro['valor_confirmado'],
                        'confirmado' => $movimentoFinanceiro['confirmado']
                    ];

                }else{

                    if($movimentoRel->confirmado == 1 && $movimentoFinanceiro['confirmado'] != 1){

                        $dadosMovimento = [
                            'cod_conta' => $movimentoRel->cod_conta,
                            'data_confirmacao' => $movimentoFinanceiro['data_confirmacao'], 
                            'valor_desc_taxa' => $movimentoFinanceiro['valor_desc_taxa'],
                            'valor_juros_multa' => $movimentoFinanceiro['valor_juros_multa'],
                            'valor_confirmado' => $movimentoFinanceiro['valor_confirmado'],
                            'confirmado' => $movimentoFinanceiro['confirmado'],
                        ];

                    }else{

                        $dadosMovimento = [
                            'cod_conta' => $movimentoRel->cod_conta,
                            'data_confirmacao' => $movimentoFinanceiro['data_confirmacao'], 
                            'valor_desc_taxa' => $movimentoFinanceiro['valor_desc_taxa'],
                            'valor_juros_multa' => $movimentoFinanceiro['valor_juros_multa'],
                            'valor_confirmado' => $movimentoFinanceiro['valor_confirmado'],
                            'confirmado' => $movimentoFinanceiro['confirmado'],
                        ];

                    }              

                }
                $this->updateMovimentoConta($movimento->cod_titulo_rel, $dadosMovimento, false);
            }
        }
    }

    public function deleteConta($codConta) {
        $this->db->where('id_empresa', getDadosUsuarioLogado()['id_empresa']); 

        $this->db->where_in('cod_conta',$codConta)->delete('conta');

        return null;
    }

    public function deleteOrcamento($codContaContabil, $ano) {
        $this->db->where('id_empresa', getDadosUsuarioLogado()['id_empresa']); 
        $this->db->where('cod_conta_contabil', $codContaContabil); 
        $this->db->where_in('seq_orcamento',$seq_orcamento)->delete('orcamento');

        return null;
    }

    public function deleteOrcamentoCentroCusto($codCentroCusto, $ano) {
        $this->db->where('id_empresa', getDadosUsuarioLogado()['id_empresa']); 
        $this->db->where('cod_centro_custo', $codCentroCusto); 
        $this->db->where_in('seq_orcamento',$seq_orcamento)->delete('orcamento');

        return null;
    }

    public function deleteMetodoPagamento($codMetodoPagamento) {
        $this->db->where('id_empresa', getDadosUsuarioLogado()['id_empresa']); 

        $this->db->where_in('cod_metodo_pagamento',$codMetodoPagamento)->delete('metodo_pagamento');

        return null;
    }

    public function deleteCentroCusto($codCentroCusto) {
        $this->db->where('id_empresa', getDadosUsuarioLogado()['id_empresa']); 

        $this->db->where_in('cod_centro_custo',$codCentroCusto)->delete('centro_custo');

        return null;
    }

    public function deleteContaContabil($codContaContabil) {
        $this->db->where('id_empresa', getDadosUsuarioLogado()['id_empresa']); 

        $this->db->where_in('cod_conta_contabil',$codContaContabil)->delete('conta_contabil');

        return null;
    }

    public function excluirTituloContasPagar($codMovimento) {

        $this->db->where_in('cod_movimento_conta',$codMovimento, 'cod_titulo_rel', $codMovimento)->delete('movimentos_conta');

        return null;
    }

    public function excluirTituloContasReceber($codMovimento) {

        $this->db->where_in('cod_movimento_conta',$codMovimento, 'cod_titulo_rel', $codMovimento)->delete('movimentos_conta');

        return null;
    }

    public function excluirTitulo($codMovimento) {

        $this->db->where_in('cod_movimento_conta',$codMovimento, 'cod_titulo_rel', $codMovimento)->delete('movimentos_conta');

        return null;
    }

    public function excluirTituloOrigem($origem, $codOrigem){
        $this->db->where('origem_movimento', $origem);
        $this->db->where('id_origem', $codOrigem);
        $this->db->where('confirmado', '0');
        $this->db->delete('movimentos_conta');
    }

    public function getTitulosPorPedidoVenda($numPedidoVenda){
        
        $this->db->select("movimentos_conta.*, conta.nome_conta, faturamento_pedido.cod_faturamento_pedido, metodo_pagamento.nome_metodo_pagamento");
        $this->db->from('movimentos_conta');        
        $this->db->join('faturamento_pedido', 'faturamento_pedido.cod_faturamento_pedido = movimentos_conta.id_origem');
        $this->db->join('conta', 'conta.cod_conta = movimentos_conta.cod_conta');
        $this->db->join('metodo_pagamento', 'metodo_pagamento.cod_metodo_pagamento = movimentos_conta.cod_metodo_pagamento', 'left');
        $this->db->where('faturamento_pedido.num_pedido_venda', $numPedidoVenda);
        $this->db->where('movimentos_conta.origem_movimento = 3');

        return $query = $this->db->get()->result();
    }  
    
    public function getTitulosPorCliente($codCliente){
        
        $this->db->select("movimentos_conta.*, conta.nome_conta, metodo_pagamento.nome_metodo_pagamento, cliente.nome_cliente, centro_custo.nome_centro_custo, conta_contabil.nome_conta_contabil");
        $this->db->select('if(movimentos_conta.confirmado = 1, movimentos_conta.data_confirmacao, movimentos_conta.data_vencimento) data_movimento');
        $this->db->select('usu_c.nome_usuario nome_usuario_criacao');
        $this->db->select('usu_l.nome_usuario nome_usuario_liquidacao');
        $this->db->from('movimentos_conta');        
        $this->db->join('cliente', 'cliente.cod_cliente = movimentos_conta.cod_emitente', 'left');
        $this->db->join('conta', 'conta.cod_conta = movimentos_conta.cod_conta');
        $this->db->join('centro_custo', 'centro_custo.cod_centro_custo = movimentos_conta.cod_centro_custo and centro_custo.id_empresa = ' . getDadosUsuarioLogado()['id_empresa'], 'left');
        $this->db->join('conta_contabil', 'conta_contabil.cod_conta_contabil = movimentos_conta.cod_conta_contabil and conta_contabil.id_empresa = ' . getDadosUsuarioLogado()['id_empresa'], 'left');
        $this->db->join('metodo_pagamento', 'metodo_pagamento.cod_metodo_pagamento = movimentos_conta.cod_metodo_pagamento', 'left');
        $this->db->join('usuario usu_c', 'usu_c.email = movimentos_conta.usuario_criacao', 'left');     
        $this->db->join('usuario usu_l', 'usu_l.email = movimentos_conta.usuario_liquidacao', 'left');  
        $this->db->where('movimentos_conta.cod_emitente', $codCliente);
        $this->db->where('movimentos_conta.tipo_movimento = 1');
        $this->db->order_by('data_movimento', 'desc');

        return $query = $this->db->get()->result();
    }

    public function getTitulosPorPedidoCompra($numPedidoCompra){
        
        $this->db->select("movimentos_conta.*, conta.nome_conta, recebimento_material.cod_recebimento_material, metodo_pagamento.nome_metodo_pagamento");
        $this->db->from('movimentos_conta');        
        $this->db->join('recebimento_material', 'recebimento_material.cod_recebimento_material = movimentos_conta.id_origem');
        $this->db->join('conta', 'conta.cod_conta = movimentos_conta.cod_conta');
        $this->db->join('metodo_pagamento', 'metodo_pagamento.cod_metodo_pagamento = movimentos_conta.cod_metodo_pagamento', 'left');
        $this->db->where('recebimento_material.num_pedido_compra', $numPedidoCompra);
        $this->db->where('movimentos_conta.origem_movimento = 2');

        return $query = $this->db->get()->result();
    }
    
    public function getTitulosPorFaturamento($codFaturamento){
        
        $this->db->select("movimentos_conta.*, conta.nome_conta, faturamento_pedido.cod_faturamento_pedido, metodo_pagamento.nome_metodo_pagamento");
        $this->db->from('movimentos_conta');        
        $this->db->join('faturamento_pedido', 'faturamento_pedido.cod_faturamento_pedido = movimentos_conta.id_origem');
        $this->db->join('conta', 'conta.cod_conta = movimentos_conta.cod_conta');
        $this->db->join('metodo_pagamento', 'metodo_pagamento.cod_metodo_pagamento = movimentos_conta.cod_metodo_pagamento', 'left');
        $this->db->where('faturamento_pedido.cod_faturamento_pedido', $codFaturamento);
        $this->db->where('movimentos_conta.origem_movimento = 3');

        return $query = $this->db->get()->result();
    } 

    public function getConta($filter = "", $limit = null, $offset = null){
        $this->db->where('conta.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        if($limit){
            $this->db->limit($limit, $offset);
        }

        if($filter <> ""){
            $this->db->group_start();
            $this->db->or_like('conta.cod_conta' ,$filter);
            $this->db->or_like('conta.nome_conta' ,$filter);
            $this->db->or_like('estabelecimento.nome_estabelecimento' ,$filter);
            $this->db->group_end();
            
        }

        $this->db->select('conta.*');
        $this->db->select('estabelecimento.nome_estabelecimento, estabelecimento.tipo_estabelecimento');
        $this->db->join('estabelecimento', 'estabelecimento.id_estabelecimento = conta.id_estabelecimento AND estabelecimento.id_empresa = conta.id_empresa');
        $this->db->select('(select count(*)
                              from movimentos_conta
                             where movimentos_conta.cod_conta = conta.cod_conta) count_mov');
               
        return $this->db->where('conta.cod_conta > 0')->get('conta')->result();
        
    }

    public function getMetodoPagamento($filter = "", $limit = null, $offset = null){
        $this->db->where('metodo_pagamento.id_empresa', getDadosUsuarioLogado()['id_empresa']);  

        if($limit){
            $this->db->limit($limit, $offset);
        }

        if($filter <> ""){
            $this->db->group_start();
            $this->db->or_like('cod_metodo_pagamento' ,$filter);
            $this->db->or_like('nome_metodo_pagamento' ,$filter);
            $this->db->or_like('nome_conta' ,$filter);
            $this->db->group_end();
            
        }

        $this->db->select('metodo_pagamento.*, conta.nome_conta, conta.id_estabelecimento, estabelecimento.nome_estabelecimento');
        $this->db->join('conta', 'conta.cod_conta = metodo_pagamento.cod_conta', 'left');
        $this->db->join('estabelecimento', 'estabelecimento.id_estabelecimento = conta.id_estabelecimento AND estabelecimento.id_empresa = conta.id_empresa', 'left');
        $this->db->select('(select count(*)
                              from movimentos_conta
                             where movimentos_conta.cod_metodo_pagamento = metodo_pagamento.cod_metodo_pagamento) count_mov');
               
        return $this->db->get('metodo_pagamento')->result();
        
    }

    public function getMetodoPagamentoFat(){
        $this->db->where('metodo_pagamento.id_empresa', getDadosUsuarioLogado()['id_empresa']);  

        $this->db->select('metodo_pagamento.*');  
        $this->db->where('metodo_pagamento.ativo', '1');             
        return $this->db->get('metodo_pagamento')->result();
        
    }

    public function getMetodoPagamentoAtivo(){
        $this->db->where('metodo_pagamento.id_empresa', getDadosUsuarioLogado()['id_empresa']);  

        $this->db->select('metodo_pagamento.*');   
        $this->db->where('metodo_pagamento.ativo', '1');            
        return $this->db->get('metodo_pagamento')->result();
        
    }

    public function getCentroCusto($filter = "", $limit = null, $offset = null){
        $this->db->where('id_empresa', getDadosUsuarioLogado()['id_empresa']);  

        if($limit){
            $this->db->limit($limit, $offset);
        }

        if($filter <> ""){
            $this->db->group_start();
            $this->db->or_like('cod_centro_custo' ,$filter);
            $this->db->or_like('nome_centro_custo' ,$filter);
            $this->db->group_end();
            
        }

        $this->db->select('centro_custo.*');
        $this->db->select('(select count(*)
                              from movimentos_conta
                             where movimentos_conta.cod_centro_custo = centro_custo.cod_centro_custo) count_mov');
               
        return $this->db->get('centro_custo')->result();
        
    }

    public function getCentroCustoFat(){
        $this->db->where('id_empresa', getDadosUsuarioLogado()['id_empresa']); 

        $this->db->select('centro_custo.*');
               
        return $this->db->get('centro_custo')->result();
        
    }

    public function getContaContabil($filter = "", $limit = null, $offset = null){
        $this->db->where('a.id_empresa', getDadosUsuarioLogado()['id_empresa']);  

        if($limit){
            $this->db->limit($limit, $offset);
        }

        if($filter <> ""){
            $this->db->group_start();
            $this->db->or_like('a.cod_conta_contabil' ,$filter);
            $this->db->or_like('a.nome_conta_contabil' ,$filter);
            $this->db->group_end();
            
        }

        $this->db->select('a.*');
        $this->db->select('(select count(*)
                              from movimentos_conta
                             where movimentos_conta.cod_conta_contabil = a.cod_conta_contabil) count_mov');
        $this->db->select('(select count(*)
                              from conta_contabil b
                             where b.cod_conta_contabil_pai = a.cod_conta_contabil
                               and b.id_empresa = ' . getDadosUsuarioLogado()['id_empresa'] . ') count_filho');
        $this->db->from('conta_contabil a');
                
        return $this->db->get()->result();
        
    }

    public function getContaContabilAtivo(){
        $this->db->where('conta_contabil.id_empresa', getDadosUsuarioLogado()['id_empresa']);  

        $this->db->select('conta_contabil.*');
        $this->db->from('conta_contabil');
        $this->db->where('conta_contabil.ativo', '1');        
               
        return $this->db->get()->result();
        
    }

    public function getContaContabilAtivoReceita(){
        $this->db->where('conta_contabil.id_empresa', getDadosUsuarioLogado()['id_empresa']);  

        $this->db->select('conta_contabil.*');
        $this->db->from('conta_contabil');
        $this->db->where('conta_contabil.ativo', '1'); 
        $this->db->where('conta_contabil.mov_entrada', '1');         
               
        return $this->db->get()->result();
        
    }

    public function getContaContabilAtivoDespesa(){
        $this->db->where('conta_contabil.id_empresa', getDadosUsuarioLogado()['id_empresa']);  

        $this->db->select('conta_contabil.*');
        $this->db->from('conta_contabil');
        $this->db->where('conta_contabil.ativo', '1'); 
        $this->db->where('conta_contabil.mov_saida', '1');         
               
        return $this->db->get()->result();
        
    }

    public function getContaContabilAtivoFat(){
        $this->db->where('conta_contabil.id_empresa', getDadosUsuarioLogado()['id_empresa']);  

        $this->db->select('conta_contabil.*');
        $this->db->from('conta_contabil');
        $this->db->where('conta_contabil.ativo', '1');
               
        return $this->db->get()->result();
        
    }

    public function getCentroCustoAtivo(){
        $this->db->where('centro_custo.id_empresa', getDadosUsuarioLogado()['id_empresa']);  

        $this->db->select('centro_custo.*');
        $this->db->from('centro_custo');
        $this->db->where('centro_custo.ativo', '1');
               
        return $this->db->get()->result();
        
    }

    public function getCentroCustoAtivoReceita(){
        $this->db->where('centro_custo.id_empresa', getDadosUsuarioLogado()['id_empresa']);  

        $this->db->select('centro_custo.*');
        $this->db->from('centro_custo');
        $this->db->where('centro_custo.ativo', '1');
        $this->db->where('centro_custo.mov_entrada', '1');
               
        return $this->db->get()->result();
        
    }

    public function getCentroCustoAtivoDespesa(){
        $this->db->where('centro_custo.id_empresa', getDadosUsuarioLogado()['id_empresa']);  

        $this->db->select('centro_custo.*');
        $this->db->from('centro_custo');
        $this->db->where('centro_custo.ativo', '1');
        $this->db->where('centro_custo.mov_saida', '1');
               
        return $this->db->get()->result();
        
    }

    public function getCentroCustoAll(){
        $this->db->where('id_empresa', getDadosUsuarioLogado()['id_empresa']);  

               
        return $this->db->get('centro_custo')->result();
        
    }    

    public function getContaContabilAll(){
        $this->db->where('id_empresa', getDadosUsuarioLogado()['id_empresa']);  

               
        return $this->db->get('conta_contabil')->result();
        
    }

    public function getContaAtiva($data, $filter = "", $limit = null, $offset = null){
        $this->db->where('conta.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        if($limit){
            $this->db->limit($limit, $offset);
        }

        if($filter <> ""){
            $this->db->group_start();
            $this->db->or_like('cod_conta' ,$filter);
            $this->db->or_like('nome_conta' ,$filter);
            $this->db->or_like('estabelecimento.nome_estabelecimento' ,$filter);
            $this->db->group_end();
            
        }

        $this->db->select('conta.*');
        $this->db->select('estabelecimento.nome_estabelecimento, estabelecimento.tipo_estabelecimento');
        $this->db->join('estabelecimento', 'estabelecimento.id_estabelecimento = conta.id_estabelecimento AND estabelecimento.id_empresa = conta.id_empresa');
        $this->db->select("(select sum(movimentos_conta.valor_confirmado)
                              from movimentos_conta
                             where movimentos_conta.cod_conta = conta.cod_conta
                               and movimentos_conta.tipo_movimento = 1
                               and movimentos_conta.confirmado = 1
                               and movimentos_conta.data_confirmacao >= '" . $data . "') valor_entrada");
        $this->db->select("(select sum(movimentos_conta.valor_confirmado)
                              from movimentos_conta
                             where movimentos_conta.cod_conta = conta.cod_conta
                               and movimentos_conta.tipo_movimento = 2
                               and movimentos_conta.confirmado = 1
                               and movimentos_conta.data_confirmacao >= '" . $data . "') valor_saida");
        $this->db->select("(select sum(movimentos_conta.valor_titulo)
                              from movimentos_conta
                             where movimentos_conta.cod_conta = conta.cod_conta
                               and movimentos_conta.tipo_movimento = 1
                               and movimentos_conta.confirmado = 0
                               and movimentos_conta.data_vencimento < '" . $data . "') proj_entrada");
        $this->db->select("(select sum(movimentos_conta.valor_titulo)
                              from movimentos_conta
                             where movimentos_conta.cod_conta = conta.cod_conta
                               and movimentos_conta.tipo_movimento = 2
                               and movimentos_conta.confirmado = 0
                               and movimentos_conta.data_vencimento < '" . $data . "') proj_saida");

        return $this->db->where('conta.ativo = 1')->get('conta')->result();
        
    }

    public function getContaAtivaRel(){
        $this->db->where('conta.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('conta.*, estabelecimento.nome_estabelecimento, estabelecimento.tipo_estabelecimento');
        $this->db->join('estabelecimento', 'estabelecimento.id_estabelecimento = conta.id_estabelecimento AND estabelecimento.id_empresa = conta.id_empresa');

        return $this->db->where('conta.ativo = 1')->get('conta')->result();
        
    }

    public function getContaAtivaDestino($idConta){
        $this->db->where('conta.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('conta.*, estabelecimento.nome_estabelecimento, estabelecimento.tipo_estabelecimento');
        $this->db->join('estabelecimento', 'estabelecimento.id_estabelecimento = conta.id_estabelecimento AND estabelecimento.id_empresa = conta.id_empresa');
        $this->db->where('conta.cod_conta != ', $idConta);  

        return $this->db->where('conta.ativo = 1')->get('conta')->result();
        
    }

    public function getSaldoConta($data, $filter = "", $limit = null, $offset = null){
        $this->db->where('conta.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        if($limit){
            $this->db->limit($limit, $offset);
        }

        if($filter <> ""){
            $this->db->group_start();
            $this->db->or_like('conta.cod_conta' ,$filter);
            $this->db->or_like('conta.nome_conta' ,$filter);
            $this->db->or_like('estabelecimento.nome_estabelecimento' ,$filter);
            $this->db->group_end();
            
        }

        $this->db->select('conta.*');
        $this->db->select('estabelecimento.nome_estabelecimento, estabelecimento.tipo_estabelecimento');
        $this->db->join('estabelecimento', 'estabelecimento.id_estabelecimento = conta.id_estabelecimento AND estabelecimento.id_empresa = conta.id_empresa');
        $this->db->select("(select sum(movimentos_conta.valor_confirmado)
                              from movimentos_conta
                             where movimentos_conta.cod_conta = conta.cod_conta
                               and movimentos_conta.tipo_movimento = 1
                               and movimentos_conta.confirmado = 1
                               and movimentos_conta.data_confirmacao >= '" . $data . "') valor_entrada");
        $this->db->select("(select sum(movimentos_conta.valor_confirmado)
                              from movimentos_conta
                             where movimentos_conta.cod_conta = conta.cod_conta
                               and movimentos_conta.tipo_movimento = 2
                               and movimentos_conta.confirmado = 1
                               and movimentos_conta.data_confirmacao >= '" . $data . "') valor_saida");
        $this->db->select("(select sum(movimentos_conta.valor_titulo)
                              from movimentos_conta
                             where movimentos_conta.cod_conta = conta.cod_conta
                               and movimentos_conta.tipo_movimento = 1
                               and movimentos_conta.confirmado = 0
                               and movimentos_conta.data_vencimento < '" . $data . "') proj_entrada");
        $this->db->select("(select sum(movimentos_conta.valor_titulo)
                              from movimentos_conta
                             where movimentos_conta.cod_conta = conta.cod_conta
                               and movimentos_conta.tipo_movimento = 2
                               and movimentos_conta.confirmado = 0
                               and movimentos_conta.data_vencimento < '" . $data . "') proj_saida");

        return $this->db->get('conta')->result();
        
    }
    

    public function getContaPagarPendente($data, $fornecedorFiltro = "", $metodoPagamentoFiltro = "", $contaFinanceiraFiltro = "", $centroCustoFiltro = "", $contaContabilFiltro = "", $estabelecimentoFiltro = ""){
        $this->db->where('estabelecimento.id_empresa', getDadosUsuarioLogado()['id_empresa']);
        
        $this->db->select("movimentos_conta.*, fornecedor.nome_fornecedor, centro_custo.nome_centro_custo, conta_contabil.nome_conta_contabil, conta.nome_conta, conta.ativo, estabelecimento.nome_estabelecimento, estabelecimento.tipo_estabelecimento");
        $this->db->select('usuario.nome_usuario');
        $this->db->from('movimentos_conta');
        $this->db->join('estabelecimento', 'estabelecimento.id_estabelecimento = movimentos_conta.id_estabelecimento');
        $this->db->join('conta', 'conta.cod_conta = movimentos_conta.cod_conta AND conta.id_empresa = estabelecimento.id_empresa', 'left');
        $this->db->join('fornecedor', 'fornecedor.cod_fornecedor = movimentos_conta.cod_emitente', 'left');
        $this->db->join('centro_custo', 'centro_custo.cod_centro_custo = movimentos_conta.cod_centro_custo and centro_custo.id_empresa = ' . getDadosUsuarioLogado()['id_empresa'], 'left');
        $this->db->join('conta_contabil', 'conta_contabil.cod_conta_contabil = movimentos_conta.cod_conta_contabil and conta_contabil.id_empresa = ' . getDadosUsuarioLogado()['id_empresa'], 'left'); 
        $this->db->join('usuario', 'usuario.email = movimentos_conta.usuario_criacao', 'left');
        $this->db->where('movimentos_conta.confirmado = 0');
        $this->db->where('movimentos_conta.tipo_movimento = 2');
        $this->db->where('movimentos_conta.data_vencimento < ', $data);
        $this->db->order_by('movimentos_conta.data_vencimento');

        if($fornecedorFiltro != ""){
            $this->db->where_in('movimentos_conta.cod_emitente', $fornecedorFiltro);
        }

        if($metodoPagamentoFiltro != ""){
            $this->db->where_in('movimentos_conta.cod_metodo_pagamento', $metodoPagamentoFiltro);
        }        

        if($contaFinanceiraFiltro != ""){
            $this->db->where_in('movimentos_conta.cod_conta', $contaFinanceiraFiltro);
        }

        if($centroCustoFiltro != ""){
            $this->db->where_in('movimentos_conta.cod_centro_custo', $centroCustoFiltro);
        }

        if($contaContabilFiltro != ""){
            $this->db->where_in('movimentos_conta.cod_conta_contabil', $contaContabilFiltro);
        }

        if($estabelecimentoFiltro != ""){
            $this->db->where_in('movimentos_conta.id_estabelecimento', $estabelecimentoFiltro);
        }
    
        return $this->db->get()->result();
    }

    public function getTotalPagarSemConta($dataFim, $estabelecimentoFiltro = ""){
        $this->db->select_sum('movimentos_conta.valor_titulo', 'total');
        $this->db->join('estabelecimento', 'estabelecimento.id_estabelecimento = movimentos_conta.id_estabelecimento');
        $this->db->where('estabelecimento.id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('movimentos_conta.tipo_movimento', 2);
        $this->db->where('movimentos_conta.confirmado', 0);
        $this->db->where('movimentos_conta.cod_conta IS NULL', null, false);
        $this->db->where('movimentos_conta.data_vencimento <=', $dataFim);
        if($estabelecimentoFiltro != ""){
            $this->db->where_in('movimentos_conta.id_estabelecimento', $estabelecimentoFiltro);
        }
        $resultado = $this->db->get('movimentos_conta')->row();
        return $resultado !== null ? (float) $resultado->total : 0;
    }

    public function getContaReceberPendente($data, $clienteFiltro = "", $metodoPagamentoFiltro = "", $contaFinanceiraFiltro = "", $centroCustoFiltro = "", $contaContabilFiltro = "", $vendedorFiltro = "", $estabelecimentoFiltro = ""){
        $this->db->where('estabelecimento.id_empresa', getDadosUsuarioLogado()['id_empresa']);
        
        $this->db->select("movimentos_conta.*, cliente.nome_cliente, centro_custo.nome_centro_custo, conta_contabil.nome_conta_contabil, conta.nome_conta, conta.ativo, estabelecimento.nome_estabelecimento, estabelecimento.tipo_estabelecimento");
        $this->db->select('usuario.nome_usuario');
        $this->db->from('movimentos_conta');
        $this->db->join('estabelecimento', 'estabelecimento.id_estabelecimento = movimentos_conta.id_estabelecimento');
        $this->db->join('conta', 'conta.cod_conta = movimentos_conta.cod_conta AND conta.id_empresa = estabelecimento.id_empresa', 'left');
        $this->db->join('cliente', 'cliente.cod_cliente = movimentos_conta.cod_emitente', 'left');
        $this->db->join('centro_custo', 'centro_custo.cod_centro_custo = movimentos_conta.cod_centro_custo and centro_custo.id_empresa = ' . getDadosUsuarioLogado()['id_empresa'], 'left');
        $this->db->join('conta_contabil', 'conta_contabil.cod_conta_contabil = movimentos_conta.cod_conta_contabil and conta_contabil.id_empresa = ' . getDadosUsuarioLogado()['id_empresa'], 'left'); 
        $this->db->join('usuario', 'usuario.email = movimentos_conta.usuario_criacao', 'left');
        $this->db->where('movimentos_conta.confirmado = 0');
        $this->db->where('movimentos_conta.tipo_movimento = 1');
        $this->db->where('movimentos_conta.data_vencimento < ', $data);
        $this->db->order_by('movimentos_conta.data_vencimento');

        if($clienteFiltro != ""){
            $this->db->where_in('movimentos_conta.cod_emitente', $clienteFiltro);
        }

        if($metodoPagamentoFiltro != ""){
            $this->db->where_in('movimentos_conta.cod_metodo_pagamento', $metodoPagamentoFiltro);
        }        

        if($contaFinanceiraFiltro != ""){
            $this->db->where_in('movimentos_conta.cod_conta', $contaFinanceiraFiltro);
        }

        if($centroCustoFiltro != ""){
            $this->db->where_in('movimentos_conta.cod_centro_custo', $centroCustoFiltro);
        }

        if($contaContabilFiltro != ""){
            $this->db->where_in('movimentos_conta.cod_conta_contabil', $contaContabilFiltro);
        }

        if($vendedorFiltro != ""){
            $this->db->where_in('movimentos_conta.cod_vendedor', $vendedorFiltro);
        }

        if($estabelecimentoFiltro != ""){
            $this->db->where_in('movimentos_conta.id_estabelecimento', $estabelecimentoFiltro);
        }
    
        return $this->db->get()->result();
    }

    public function getTotalReceberSemConta($dataFim, $estabelecimentoFiltro = ""){
        $this->db->select_sum('movimentos_conta.valor_titulo', 'total');
        $this->db->join('estabelecimento', 'estabelecimento.id_estabelecimento = movimentos_conta.id_estabelecimento');
        $this->db->where('estabelecimento.id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('movimentos_conta.tipo_movimento', 1);
        $this->db->where('movimentos_conta.confirmado', 0);
        $this->db->where('movimentos_conta.cod_conta IS NULL', null, false);
        $this->db->where('movimentos_conta.data_vencimento <=', $dataFim);
        if($estabelecimentoFiltro != ""){
            $this->db->where_in('movimentos_conta.id_estabelecimento', $estabelecimentoFiltro);
        }
        $resultado = $this->db->get('movimentos_conta')->row();
        return $resultado !== null ? (float) $resultado->total : 0;
    }

    public function getContaPorCodigo($codConta){
        $this->db->where('conta.id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->select('conta.*, estabelecimento.nome_estabelecimento, estabelecimento.tipo_estabelecimento');
        $this->db->join('estabelecimento', 'estabelecimento.id_estabelecimento = conta.id_estabelecimento AND estabelecimento.id_empresa = conta.id_empresa');

        return $this->db->get_where('conta', array('cod_conta' => $codConta))->row();
    }

    public function getMetodoPagamentoPorCodigo($codMetodoPagamento){
        $this->db->where('id_empresa', getDadosUsuarioLogado()['id_empresa']);
        

        return $this->db->get_where('metodo_pagamento', array('cod_metodo_pagamento' => $codMetodoPagamento))->row();
    }

    public function getMetodoPagamentoPorCodigoVendasExternas($codVendasExternas){
        $this->db->where('id_empresa', getDadosUsuarioLogado()['id_empresa']);
        

        return $this->db->get_where('metodo_pagamento', array('cod_vendas_externas' => $codVendasExternas))->row();
    }

    public function getMetodoPagamentoPorNome($nome){
        $this->db->where('id_empresa', getDadosUsuarioLogado()['id_empresa']); 

        $this->db->select('metodo_pagamento.*');
        $this->db->where('cod_vendas_externas', null); 
        $this->db->limit(1);

        return $this->db->get_where('metodo_pagamento', array('nome_metodo_pagamento' => $nome))->row();
    }

    public function getCentroCustoPorCodigo($codCentroCusto){
        $this->db->where('id_empresa', getDadosUsuarioLogado()['id_empresa']);
        

        return $this->db->get_where('centro_custo', array('cod_centro_custo' => $codCentroCusto))->row();
    }

    public function getContaContabilPorCodigo($codContaContabil){
        $this->db->where('conta_contabil.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('conta_contabil.*, b.nome_conta_contabil as nome_conta_contabil_pai');
        $this->db->from('conta_contabil');
        $this->db->join('conta_contabil b', 'b.cod_conta_contabil = conta_contabil.cod_conta_contabil_pai', 'left');
        $this->db->where('conta_contabil.cod_conta_contabil', $codContaContabil);
        

        return $this->db->get()->row();
    }

    public function getMovimentoPorCodigo($codMovimento){
        

        return $this->db->get_where('movimentos_conta', array('cod_movimento_conta' => $codMovimento))->row();
    }

    public function getMovimentoPorOrigem($origem, $idOrigem){
        

        return $this->db->get_where('movimentos_conta', array('origem_movimento' => $origem, 'id_origem' => $idOrigem))->row();
    }

    public function getTitulospendentes(){
        $this->db->where('conta.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('movimentos_conta.*');
        $this->db->from('movimentos_conta');
        $this->db->join('conta', 'conta.cod_conta = movimentos_conta.cod_conta');
        $this->db->where('movimentos_conta.confirmado', '0');
        $this->db->where('movimentos_conta.data_vencimento <=', date('Y-m-d'));
        $this->db->order_by('movimentos_conta.data_vencimento');

        return $query = $this->db->get()->result();


    }

    public function getTotalConta(){
        $this->db->where('conta.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('sum(conta.saldo_conta) total_conta');
        $this->db->from('conta');

        return $this->db->get()->row();

    }

    public function getEntradasSaidas(){
        $this->db->where('conta.id_empresa', getDadosUsuarioLogado()['id_empresa']); 

        $this->db->select('sum(if(movimentos_conta.tipo_movimento = 1, movimentos_conta.valor_titulo, 0)) total_entrada,
                           sum(if(movimentos_conta.tipo_movimento = 2, movimentos_conta.valor_titulo, 0)) total_saida');
        $this->db->from('movimentos_conta');
        $this->db->join('conta', 'conta.cod_conta = movimentos_conta.cod_conta'); 
        $this->db->where('movimentos_conta.confirmado', '1');
        $this->db->where('movimentos_conta.data_confirmacao >=', date('Y-m-01'));
        $this->db->where('movimentos_conta.data_confirmacao <=', date('Y-m-d')); 

        return $this->db->get()->row();
    }

    public function getTituloPorCodigoVendasExternas($codVendasExternas){
        $this->db->where('conta.id_empresa', getDadosUsuarioLogado()['id_empresa']); 
        $this->db->select('movimentos_conta.*');
        $this->db->join('conta', 'conta.cod_conta = movimentos_conta.cod_conta');        

        return $this->db->get_where('movimentos_conta', array('cod_vendas_externas' => $codVendasExternas))->row();
    }

    public function getTituloPorCodigo($codMovimento){
        $this->db->where('conta.id_empresa', getDadosUsuarioLogado()['id_empresa']); 
        $this->db->select('movimentos_conta.*');
        $this->db->join('conta', 'conta.cod_conta = movimentos_conta.cod_conta');        

        return $this->db->get_where('movimentos_conta', array('cod_movimento_conta' => $codMovimento))->row();
    }

    public function getSaldoContaPorCodigo($codConta, $dataFim){
        $this->db->where('conta.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('conta.*, estabelecimento.nome_estabelecimento, estabelecimento.tipo_estabelecimento');
        $this->db->join('estabelecimento', 'estabelecimento.id_estabelecimento = conta.id_estabelecimento AND estabelecimento.id_empresa = conta.id_empresa');
        $this->db->select("(select sum(movimentos_conta.valor_titulo)
                              from movimentos_conta
                             where movimentos_conta.cod_conta = conta.cod_conta
                               and movimentos_conta.tipo_movimento = 1
                               and movimentos_conta.confirmado = 0
                               and movimentos_conta.data_vencimento <= '" . $dataFim . "') proj_entrada");
        $this->db->select("(select sum(movimentos_conta.valor_titulo)
                              from movimentos_conta
                             where movimentos_conta.cod_conta = conta.cod_conta
                               and movimentos_conta.tipo_movimento = 2
                               and movimentos_conta.confirmado = 0
                               and movimentos_conta.data_vencimento <= '" . $dataFim . "') proj_saida");

        return $this->db->get_where('conta', array('cod_conta' => $codConta))->row();
    }

    public function getMovimentosPorConta($codConta, $dataInicio, $dataFim){ 

        $this->db->where('conta.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('movimentos_conta.*, centro_custo.nome_centro_custo, conta_contabil.nome_conta_contabil, conta.nome_conta, metodo_pagamento.nome_metodo_pagamento');
        $this->db->select('if(movimentos_conta.confirmado = 1, movimentos_conta.data_confirmacao, movimentos_conta.data_vencimento) data_movimento');
        $this->db->select('usu_c.nome_usuario usuario_criacao');
        $this->db->select('usu_l.nome_usuario usuario_liquidacao');
        $this->db->select('cliente.nome_cliente, fornecedor.nome_fornecedor');
        $this->db->from('movimentos_conta');
        $this->db->join('conta', 'conta.cod_conta = movimentos_conta.cod_conta');
        $this->db->join('fornecedor', 'fornecedor.cod_fornecedor = movimentos_conta.cod_emitente and movimentos_conta.tipo_movimento = 2 ', 'left'); 
        $this->db->join('cliente', 'cliente.cod_cliente = movimentos_conta.cod_emitente and movimentos_conta.tipo_movimento = 1 ', 'left'); 
        $this->db->join('metodo_pagamento', 'metodo_pagamento.cod_metodo_pagamento = movimentos_conta.cod_metodo_pagamento and metodo_pagamento.id_empresa = ' . getDadosUsuarioLogado()['id_empresa'], 'left'); 
        $this->db->join('centro_custo', 'centro_custo.cod_centro_custo = movimentos_conta.cod_centro_custo and centro_custo.id_empresa = ' . getDadosUsuarioLogado()['id_empresa'], 'left');
        $this->db->join('conta_contabil', 'conta_contabil.cod_conta_contabil = movimentos_conta.cod_conta_contabil and conta_contabil.id_empresa = ' . getDadosUsuarioLogado()['id_empresa'], 'left');   
        $this->db->join('usuario usu_c', 'usu_c.email = movimentos_conta.usuario_criacao', 'left');     
        $this->db->join('usuario usu_l', 'usu_l.email = movimentos_conta.usuario_liquidacao', 'left');  
        $this->db->where('if(movimentos_conta.confirmado = 1, movimentos_conta.data_confirmacao, movimentos_conta.data_vencimento) >= ', $dataInicio);
        $this->db->where('if(movimentos_conta.confirmado = 1, movimentos_conta.data_confirmacao, movimentos_conta.data_vencimento) <= ', $dataFim);
        

        if($codConta != ""){
            $this->db->where('movimentos_conta.cod_conta', $codConta);
            $this->db->order_by('data_movimento', 'asc');
            $this->db->order_by('cod_movimento_conta', 'desc');
        }else{
            $this->db->order_by('data_movimento', 'asc');
            $this->db->order_by('cod_movimento_conta', 'desc');
        }

        return $this->db->get()->result();
    }

    public function getMovimentosConfirmadosPorConta($dataInicio, $dataFim){ 

        $this->db->where('conta.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('movimentos_conta.*, centro_custo.nome_centro_custo, conta_contabil.nome_conta_contabil, conta.nome_conta, metodo_pagamento.nome_metodo_pagamento');
        $this->db->select('usu_c.nome_usuario usuario_criacao');
        $this->db->select('usu_l.nome_usuario usuario_liquidacao');
        $this->db->select('cliente.nome_cliente, fornecedor.nome_fornecedor');
        $this->db->from('movimentos_conta');
        $this->db->join('conta', 'conta.cod_conta = movimentos_conta.cod_conta');
        $this->db->join('fornecedor', 'fornecedor.cod_fornecedor = movimentos_conta.cod_emitente and movimentos_conta.tipo_movimento = 2 ', 'left'); 
        $this->db->join('cliente', 'cliente.cod_cliente = movimentos_conta.cod_emitente and movimentos_conta.tipo_movimento = 1 ', 'left'); 
        $this->db->join('metodo_pagamento', 'metodo_pagamento.cod_metodo_pagamento = movimentos_conta.cod_metodo_pagamento and metodo_pagamento.id_empresa = ' . getDadosUsuarioLogado()['id_empresa'], 'left'); 
        $this->db->join('centro_custo', 'centro_custo.cod_centro_custo = movimentos_conta.cod_centro_custo and centro_custo.id_empresa = ' . getDadosUsuarioLogado()['id_empresa'], 'left');
        $this->db->join('conta_contabil', 'conta_contabil.cod_conta_contabil = movimentos_conta.cod_conta_contabil and conta_contabil.id_empresa = ' . getDadosUsuarioLogado()['id_empresa'], 'left');   
        $this->db->join('usuario usu_c', 'usu_c.email = movimentos_conta.usuario_criacao', 'left');     
        $this->db->join('usuario usu_l', 'usu_l.email = movimentos_conta.usuario_liquidacao', 'left');  
        $this->db->where('movimentos_conta.confirmado', '1');
        $this->db->where('movimentos_conta.data_confirmacao >= ', $dataInicio);
        $this->db->where('movimentos_conta.data_confirmacao <= ', $dataFim);
        $this->db->order_by('data_confirmacao', 'asc');

        return $this->db->get()->result();
    }

    public function countAllConta($filter = ""){
        $this->db->where('conta.id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->join('estabelecimento', 'estabelecimento.id_estabelecimento = conta.id_estabelecimento AND estabelecimento.id_empresa = conta.id_empresa');

        if($filter <> ""){
            $this->db->group_start();
            $this->db->or_like('conta.cod_conta' ,$filter);
            $this->db->or_like('conta.nome_conta' ,$filter);
            $this->db->or_like('estabelecimento.nome_estabelecimento' ,$filter);
            $this->db->group_end();
            
        }

        return $this->db->count_all_results('conta');
    }

    public function countAllCentroCusto($filter = ""){
        $this->db->where('id_empresa', getDadosUsuarioLogado()['id_empresa']); 

        if($filter <> ""){
            $this->db->group_start();
            $this->db->or_like('cod_centro_custo' ,$filter);
            $this->db->or_like('nome_centro_custo' ,$filter);
            $this->db->group_end();
            
        }

        return $this->db->count_all_results('centro_custo');
    }

    public function countAllContaContabil($filter = ""){
        $this->db->where('id_empresa', getDadosUsuarioLogado()['id_empresa']);
        
        if($filter <> ""){
            $this->db->group_start();
            $this->db->or_like('conta_contabil.cod_conta_contabil' ,$filter);
            $this->db->or_like('conta_contabil.nome_conta_contabil' ,$filter);
            $this->db->group_end();
            
        }

        return $this->db->count_all_results('conta_contabil');
    }

    public function countAllMetodoPagamento($filter = ""){
        $this->db->where('id_empresa', getDadosUsuarioLogado()['id_empresa']);  

        if($filter <> ""){
            $this->db->group_start();
            $this->db->or_like('cod_metodo_pagamento' ,$filter);
            $this->db->or_like('nome_metodo_pagamento' ,$filter);
            $this->db->or_like('nome_conta' ,$filter);
            $this->db->group_end();
            
        }
               
        return $this->db->count_all_results('metodo_pagamento');
        
    }

    public function countAllMovimentos($codConta){
        
        $this->db->where('cod_conta', $codConta);
        return $this->db->count_all_results('movimentos_conta');
    }

    //Indicadores
    public function getTotaisConta($dataInicio, $dataFim){
        $this->db->where('conta.id_empresa', getDadosUsuarioLogado()['id_empresa']); 
        
        $this->db->select('sum(conta.saldo_conta) saldo_total');
        $this->db->select("sum((select sum(movimentos_conta.valor_titulo)
                              from movimentos_conta
                             where movimentos_conta.cod_conta  = conta.cod_conta
                               and movimentos_conta.tipo_movimento = 1
                               and movimentos_conta.confirmado = 0
                               and movimentos_conta.data_vencimento >= '". $dataInicio ."'
                               and movimentos_conta.data_vencimento <= '". $dataFim ."')) entrada");
        $this->db->select("sum((select sum(movimentos_conta.valor_titulo)
                              from movimentos_conta
                             where movimentos_conta.cod_conta  = conta.cod_conta
                               and movimentos_conta.tipo_movimento = 2
                               and movimentos_conta.confirmado = 0
                               and movimentos_conta.data_vencimento >= '". $dataInicio ."'
                               and movimentos_conta.data_vencimento <= '". $dataFim ."')) saida");
        $this->db->from('conta');
        $this->db->where('conta.ativo', 1);

        return $query = $this->db->get()->row();

    }

    public function getTotais($dataInicio, $dataFim, $codConta){
        $this->db->where('conta.id_empresa', getDadosUsuarioLogado()['id_empresa']); 

        $this->db->select('sum(conta.saldo_conta) saldo_total');        
        $this->db->select("sum((select sum(movimentos_conta.valor_confirmado)
                              from movimentos_conta
                             where movimentos_conta.cod_conta  = conta.cod_conta 
                               and movimentos_conta.tipo_movimento = 1
                               and movimentos_conta.confirmado = 1
                               and movimentos_conta.data_confirmacao >= '". $dataInicio ."'
                               and movimentos_conta.data_confirmacao <= '". $dataFim ."')) entrada_confirm");
        $this->db->select("sum((select sum(movimentos_conta.valor_confirmado)
                              from movimentos_conta
                             where movimentos_conta.cod_conta  = conta.cod_conta 
                               and movimentos_conta.tipo_movimento = 2
                               and movimentos_conta.confirmado = 1
                               and movimentos_conta.data_confirmacao >= '". $dataInicio ."'
                               and movimentos_conta.data_confirmacao <= '". $dataFim ."')) saida_confirm");
        $this->db->select("sum((select sum(movimentos_conta.valor_titulo)
                              from movimentos_conta
                             where movimentos_conta.cod_conta  = conta.cod_conta 
                               and movimentos_conta.tipo_movimento = 1
                               and movimentos_conta.confirmado = 0
                               and movimentos_conta.data_vencimento >= '". $dataInicio ."'
                               and movimentos_conta.data_vencimento <= '". $dataFim ."')) entrada_proj");
        $this->db->select("sum((select sum(movimentos_conta.valor_titulo)
                              from movimentos_conta
                             where movimentos_conta.cod_conta  = conta.cod_conta 
                               and movimentos_conta.tipo_movimento = 2
                               and movimentos_conta.confirmado = 0
                               and movimentos_conta.data_vencimento >= '". $dataInicio ."'
                               and movimentos_conta.data_vencimento <= '". $dataFim ."')) saida_proj");
        $this->db->from('conta');
        $this->db->where('conta.ativo', 1);

        if($codConta != ""){
            $this->db->where_in('conta.cod_conta', $codConta);
        }

        return $query = $this->db->get()->row();

    }

    public function getTotaisContaContabil($dataInicio, $dataFim, $codContaContabil){
        $this->db->where('conta_contabil.id_empresa', getDadosUsuarioLogado()['id_empresa']); 

        $this->db->select('conta_contabil.*');        
        $this->db->select("sum((select sum(movimentos_conta.valor_confirmado)
                              from movimentos_conta
                              join conta on conta.cod_conta = movimentos_conta.cod_conta
                             where conta.id_empresa = ". getDadosUsuarioLogado()['id_empresa'] ."
                               and movimentos_conta.cod_conta_contabil  = conta_contabil.cod_conta_contabil 
                               and movimentos_conta.tipo_movimento = 1
                               and movimentos_conta.confirmado = 1
                               and movimentos_conta.data_confirmacao >= '". $dataInicio ."'
                               and movimentos_conta.data_confirmacao <= '". $dataFim ."')) receita");
        $this->db->select("sum((select sum(movimentos_conta.valor_confirmado)
                              from movimentos_conta
                              join conta on conta.cod_conta = movimentos_conta.cod_conta
                             where conta.id_empresa = ". getDadosUsuarioLogado()['id_empresa'] ."
                               and movimentos_conta.cod_conta_contabil  = conta_contabil.cod_conta_contabil 
                               and movimentos_conta.tipo_movimento = 2
                               and movimentos_conta.confirmado = 1
                               and movimentos_conta.data_confirmacao >= '". $dataInicio ."'
                               and movimentos_conta.data_confirmacao <= '". $dataFim ."')) despesa");
        $this->db->from('conta_contabil');
        $this->db->where('conta_contabil.ativo', 1);

        if($codContaContabil != ""){
            $this->db->where_in('conta_contabil.cod_conta_contabil', $codContaContabil);
        }

        return $query = $this->db->get()->row();

    }

    public function getContaResumida($dataInicio, $dataFim, $codConta = ""){
        $this->db->where('conta.id_empresa', getDadosUsuarioLogado()['id_empresa']); 

        $this->db->select("conta.*, estabelecimento.nome_estabelecimento, estabelecimento.tipo_estabelecimento");
        $this->db->select("sum((select sum(movimentos_conta.valor_confirmado)
                              from movimentos_conta
                             where movimentos_conta.cod_conta  = conta.cod_conta 
                               and movimentos_conta.tipo_movimento = 1
                               and movimentos_conta.especie_movimento != 2
                               and movimentos_conta.confirmado = 1
                               and movimentos_conta.data_confirmacao >= '". $dataInicio ."'
                               and movimentos_conta.data_confirmacao <= '". $dataFim ."')) entrada_confirm");
        $this->db->select("sum((select sum(movimentos_conta.valor_confirmado)
                              from movimentos_conta
                             where movimentos_conta.cod_conta  = conta.cod_conta 
                               and movimentos_conta.tipo_movimento = 2
                               and movimentos_conta.especie_movimento != 2
                               and movimentos_conta.confirmado = 1
                               and movimentos_conta.data_confirmacao >= '". $dataInicio ."'
                               and movimentos_conta.data_confirmacao <= '". $dataFim ."')) saida_confirm");
        $this->db->select("sum((select sum(movimentos_conta.valor_titulo)
                              from movimentos_conta
                             where movimentos_conta.cod_conta  = conta.cod_conta 
                               and movimentos_conta.tipo_movimento = 1
                               and movimentos_conta.especie_movimento != 2
                               and movimentos_conta.confirmado = 0
                               and movimentos_conta.data_vencimento >= '". $dataInicio ."'
                               and movimentos_conta.data_vencimento <= '". $dataFim ."')) entrada_proj");
        $this->db->select("sum((select sum(movimentos_conta.valor_titulo)
                              from movimentos_conta
                             where movimentos_conta.cod_conta  = conta.cod_conta 
                               and movimentos_conta.tipo_movimento = 2
                               and movimentos_conta.especie_movimento != 2
                               and movimentos_conta.confirmado = 0
                               and movimentos_conta.data_vencimento >= '". $dataInicio ."'
                               and movimentos_conta.data_vencimento <= '". $dataFim ."')) saida_proj");
        $this->db->select("sum((select sum(movimentos_conta.valor_titulo)
                              from movimentos_conta
                             where movimentos_conta.cod_conta  = conta.cod_conta 
                               and movimentos_conta.tipo_movimento = 2
                               and movimentos_conta.confirmado = 0
                               and movimentos_conta.data_vencimento <= '". $dataFim ."')) saida_proj_total");
        $this->db->select("sum((select sum(movimentos_conta.valor_titulo)
                              from movimentos_conta
                             where movimentos_conta.cod_conta  = conta.cod_conta 
                               and movimentos_conta.tipo_movimento = 1
                               and movimentos_conta.confirmado = 0
                               and movimentos_conta.data_vencimento <= '". $dataFim ."')) entrada_proj_total");
        $this->db->from('conta');
        $this->db->join('estabelecimento', 'estabelecimento.id_estabelecimento = conta.id_estabelecimento AND estabelecimento.id_empresa = conta.id_empresa');
        $this->db->where('conta.ativo', 1);
        $this->db->group_by('conta.cod_conta');

        if($codConta != ""){
            $this->db->where_in('conta.cod_conta', $codConta);
        }

        return $query = $this->db->get()->result();

    }

    public function getTotalLancamento($dataInicio, $dataFim, $codConta = ""){
        $this->db->where('conta.id_empresa', getDadosUsuarioLogado()['id_empresa']); 

        $this->db->select("sum(conta.saldo_conta) saldo_conta");        
        $this->db->select("sum((select sum(movimentos_conta.valor_confirmado)
                              from movimentos_conta
                             where movimentos_conta.cod_conta  = conta.cod_conta 
                               and movimentos_conta.tipo_movimento = 1
                               and movimentos_conta.confirmado = 1
                               and movimentos_conta.data_confirmacao >= '". $dataInicio ."'
                               and movimentos_conta.data_confirmacao <= '". $dataFim ."')) entrada_confirm");
        $this->db->select("sum((select sum(movimentos_conta.valor_confirmado)
                              from movimentos_conta
                             where movimentos_conta.cod_conta  = conta.cod_conta 
                               and movimentos_conta.tipo_movimento = 2
                               and movimentos_conta.confirmado = 1
                               and movimentos_conta.data_confirmacao >= '". $dataInicio ."'
                               and movimentos_conta.data_confirmacao <= '". $dataFim ."')) saida_confirm");
        $this->db->select("sum((select sum(movimentos_conta.valor_titulo)
                              from movimentos_conta
                             where movimentos_conta.cod_conta  = conta.cod_conta 
                               and movimentos_conta.tipo_movimento = 1
                               and movimentos_conta.confirmado = 0
                               and movimentos_conta.data_vencimento <= '". $dataFim ."')) entrada_proj");
        $this->db->select("sum((select sum(movimentos_conta.valor_titulo)
                              from movimentos_conta
                             where movimentos_conta.cod_conta  = conta.cod_conta 
                               and movimentos_conta.tipo_movimento = 2
                               and movimentos_conta.confirmado = 0
                               and movimentos_conta.data_vencimento <= '". $dataFim ."')) saida_proj");
        $this->db->select("sum((select sum(movimentos_conta.valor_confirmado)
                              from movimentos_conta
                             where movimentos_conta.cod_conta  = conta.cod_conta 
                               and movimentos_conta.tipo_movimento = 1
                               and movimentos_conta.confirmado = 1
                               and movimentos_conta.data_confirmacao >= '". $dataInicio ."')) entradas_realizadas");
        $this->db->select("sum((select sum(movimentos_conta.valor_confirmado)
                              from movimentos_conta
                             where movimentos_conta.cod_conta  = conta.cod_conta 
                               and movimentos_conta.tipo_movimento = 2
                               and movimentos_conta.confirmado = 1
                               and movimentos_conta.data_confirmacao >= '". $dataInicio ."')) saida_realizadas");
        $this->db->from('conta');
        $this->db->where('conta.ativo', 1);

        if($codConta != ""){
            $this->db->where_in('conta.cod_conta', $codConta);
        }

        return $query = $this->db->get()->row();

    }

    public function getContaContabilResumida($dataInicio, $dataFim, $codContaContabil){
        $this->db->where('conta_contabil.id_empresa', getDadosUsuarioLogado()['id_empresa']); 
        
        $this->db->select('conta_contabil.*');
        $this->db->select("sum((select sum(movimentos_conta.valor_confirmado)
                              from movimentos_conta
                              join conta on conta.cod_conta = movimentos_conta.cod_conta
                             where conta.id_empresa = ". getDadosUsuarioLogado()['id_empresa'] ."
                               and movimentos_conta.cod_conta_contabil  = conta_contabil.cod_conta_contabil 
                               and movimentos_conta.tipo_movimento = 1
                               and movimentos_conta.confirmado = 1
                               and movimentos_conta.data_confirmacao >= '". $dataInicio ."'
                               and movimentos_conta.data_confirmacao <= '". $dataFim ."')) receita");
        $this->db->select("sum((select sum(movimentos_conta.valor_confirmado)
                              from movimentos_conta
                              join conta on conta.cod_conta = movimentos_conta.cod_conta
                             where conta.id_empresa = ". getDadosUsuarioLogado()['id_empresa'] ."
                               and movimentos_conta.cod_conta_contabil  = conta_contabil.cod_conta_contabil
                               and movimentos_conta.tipo_movimento = 2
                               and movimentos_conta.confirmado = 1
                               and movimentos_conta.data_confirmacao >= '". $dataInicio ."'
                               and movimentos_conta.data_confirmacao <= '". $dataFim ."')) despesa");
        $this->db->select('(select count(*)
                              from conta_contabil b
                             where b.cod_conta_contabil_pai = conta_contabil.cod_conta_contabil) count_filho');
        $this->db->from('conta_contabil');
        $this->db->group_by('conta_contabil.cod_conta_contabil');
        $this->db->where('conta_contabil.ativo', 1);

        if($codContaContabil != ""){
            $this->db->where_in('conta_contabil.cod_conta_contabil', $codContaContabil);
        }

        return $query = $this->db->get()->result();

    }

    public function getContaContabilResumidaDesc($dataInicio, $dataFim, $codContaContabil){
        $this->db->where('conta_contabil.id_empresa', getDadosUsuarioLogado()['id_empresa']); 
        
        $this->db->select('conta_contabil.*');
        $this->db->select("sum((select sum(movimentos_conta.valor_confirmado)
                              from movimentos_conta
                              join conta on conta.cod_conta = movimentos_conta.cod_conta
                             where conta.id_empresa = ". getDadosUsuarioLogado()['id_empresa'] ."
                               and movimentos_conta.cod_conta_contabil  = conta_contabil.cod_conta_contabil 
                               and movimentos_conta.tipo_movimento = 1
                               and movimentos_conta.confirmado = 1
                               and movimentos_conta.data_confirmacao >= '". $dataInicio ."'
                               and movimentos_conta.data_confirmacao <= '". $dataFim ."')) receita");
        $this->db->select("sum((select sum(movimentos_conta.valor_confirmado)
                              from movimentos_conta
                              join conta on conta.cod_conta = movimentos_conta.cod_conta
                             where conta.id_empresa = ". getDadosUsuarioLogado()['id_empresa'] ."
                               and movimentos_conta.cod_conta_contabil  = conta_contabil.cod_conta_contabil
                               and movimentos_conta.tipo_movimento = 2
                               and movimentos_conta.confirmado = 1
                               and movimentos_conta.data_confirmacao >= '". $dataInicio ."'
                               and movimentos_conta.data_confirmacao <= '". $dataFim ."')) despesa");
        $this->db->select('(select count(*)
                              from conta_contabil b
                             where b.cod_conta_contabil_pai = conta_contabil.cod_conta_contabil) count_filho');
        $this->db->from('conta_contabil');
        $this->db->group_by('conta_contabil.cod_conta_contabil');
        $this->db->order_by('length(conta_contabil.cod_conta_contabil)', 'desc');
        $this->db->order_by('conta_contabil.cod_conta_contabil', 'desc');
        $this->db->where('conta_contabil.ativo', 1);

        if($codContaContabil != ""){
            $this->db->where_in('conta_contabil.cod_conta_contabil', $codContaContabil);
        }

        return $query = $this->db->get()->result();

    }

    public function getResultadoContaContabil($contaContabilPai = null){
        $this->db->where('conta_contabil.id_empresa', getDadosUsuarioLogado()['id_empresa']); 
        
        $this->db->select('conta_contabil.*');
        $this->db->where('conta_contabil.cod_conta_contabil_pai', $contaContabilPai);
        $this->db->where('conta_contabil.ativo', 1);

        return $query = $this->db->get()->result();

    }

    public function getResultadoDespesa($dataInicio, $dataFim, $centro){
        $this->db->where('conta.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('movimentos_conta.cod_conta_contabil, conta_contabil.nome_conta_contabil');
        $this->db->select('sum(movimentos_conta.valor_confirmado) valor');
        $this->db->from('movimentos_conta');
        $this->db->join('conta', 'conta.cod_conta = movimentos_conta.cod_conta');
        $this->db->join('conta_contabil', 'conta_contabil.cod_conta_contabil = movimentos_conta.cod_conta_contabil and conta_contabil.id_empresa = ' . getDadosUsuarioLogado()['id_empresa'], 'left');
        $this->db->where('conta.ativo', 1);
        if($centro != ""){
            if($centro == "SC")
                $this->db->where('movimentos_conta.cod_centro_custo', "");
            else
                $this->db->where('movimentos_conta.cod_centro_custo', $centro);
        }
        $this->db->where('movimentos_conta.confirmado', 1);
        $this->db->where('movimentos_conta.tipo_movimento', 2);
        $this->db->where('movimentos_conta.data_confirmacao >= ', $dataInicio);
        $this->db->where('movimentos_conta.data_confirmacao <= ', $dataFim);
        $this->db->group_by('conta_contabil.cod_conta_contabil');
        $this->db->order_by('valor', 'desc');

        return $query = $this->db->get()->result();

    }

    public function getResultadoReceita($dataInicio, $dataFim, $centro){
        $this->db->where('conta.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('movimentos_conta.cod_conta_contabil, conta_contabil.nome_conta_contabil');
        $this->db->select('sum(movimentos_conta.valor_confirmado) valor');
        $this->db->from('movimentos_conta');
        $this->db->join('conta', 'conta.cod_conta = movimentos_conta.cod_conta');
        $this->db->join('conta_contabil', 'conta_contabil.cod_conta_contabil = movimentos_conta.cod_conta_contabil and conta_contabil.id_empresa = ' . getDadosUsuarioLogado()['id_empresa'], 'left');
        $this->db->where('conta.ativo', 1);
        if($centro != ""){
            if($centro == "SC")
                $this->db->where('movimentos_conta.cod_centro_custo', "");
            else
                $this->db->where('movimentos_conta.cod_centro_custo', $centro);
        }
        $this->db->where('movimentos_conta.confirmado', 1);
        $this->db->where('movimentos_conta.tipo_movimento', 1);
        $this->db->where('movimentos_conta.data_confirmacao >= ', $dataInicio);
        $this->db->where('movimentos_conta.data_confirmacao <= ', $dataFim);
        $this->db->group_by('conta_contabil.cod_conta_contabil');
        $this->db->order_by('valor', 'desc');

        return $query = $this->db->get()->result();

    }

    public function getMovimentoResultadoDespesa($dataInicio, $dataFim, $centro){
        $this->db->where('conta.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('movimentos_conta.*');
        $this->db->select('conta.nome_conta, cliente.nome_cliente, fornecedor.nome_fornecedor'); 
        $this->db->from('movimentos_conta');
        $this->db->join('conta', 'conta.cod_conta = movimentos_conta.cod_conta');
        $this->db->join('cliente', 'cliente.cod_cliente = movimentos_conta.cod_emitente', 'left');
        $this->db->join('fornecedor', 'fornecedor.cod_fornecedor = movimentos_conta.cod_emitente', 'left');
        $this->db->where('conta.ativo', 1);
        if($centro != ""){
            if($centro == "SC")
                $this->db->where('movimentos_conta.cod_centro_custo', "");
            else
                $this->db->where('movimentos_conta.cod_centro_custo', $centro);
        }
        $this->db->where('movimentos_conta.confirmado', 1);
        $this->db->where('movimentos_conta.tipo_movimento', 2);
        $this->db->where('movimentos_conta.data_confirmacao >= ', $dataInicio);
        $this->db->where('movimentos_conta.data_confirmacao <= ', $dataFim);

        return $query = $this->db->get()->result();

    }

    public function getMovimentoResultadoReceita($dataInicio, $dataFim, $centro){
        $this->db->where('conta.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('movimentos_conta.*');
        $this->db->select('conta.nome_conta, cliente.nome_cliente, fornecedor.nome_fornecedor'); 
        $this->db->from('movimentos_conta');
        $this->db->join('conta', 'conta.cod_conta = movimentos_conta.cod_conta');
        $this->db->join('cliente', 'cliente.cod_cliente = movimentos_conta.cod_emitente', 'left');
        $this->db->join('fornecedor', 'fornecedor.cod_fornecedor = movimentos_conta.cod_emitente', 'left');
        $this->db->where('conta.ativo', 1);
        if($centro != ""){
            if($centro == "SC")
                $this->db->where('movimentos_conta.cod_centro_custo', "");
            else
                $this->db->where('movimentos_conta.cod_centro_custo', $centro);
        }
        $this->db->where('movimentos_conta.confirmado', 1);
        $this->db->where('movimentos_conta.tipo_movimento', 1);
        $this->db->where('movimentos_conta.data_confirmacao >= ', $dataInicio);
        $this->db->where('movimentos_conta.data_confirmacao <= ', $dataFim);

        return $query = $this->db->get()->result();

    }

    public function getOrcamentoPorCodigo($conta, $centro, $mes, $ano){
        $this->db->where('orcamento.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        switch($mes){
            case 1:
                $this->db->select('sum(orcamento.janeiro) valor_orcado');
                break;
            case 2:
                $this->db->select('sum(orcamento.fevereiro) valor_orcado');
                break;
            case 3:
                $this->db->select('sum(orcamento.marco) valor_orcado');
                break;
            case 4:
                $this->db->select('sum(orcamento.abril) valor_orcado');
                break;
            case 5:
                $this->db->select('sum(orcamento.maio) valor_orcado');
                break;
            case 6:
                $this->db->select('sum(orcamento.junho) valor_orcado');
                break;
            case 7:
                $this->db->select('sum(orcamento.julho) valor_orcado');
                break;
            case 8:
                $this->db->select('sum(orcamento.agosto) valor_orcado');
                break;
            case 9:
                $this->db->select('sum(orcamento.setembro) valor_orcado');
                break;
            case 10:
                $this->db->select('sum(orcamento.outubro) valor_orcado');
                break;
            case 11:
                $this->db->select('sum(orcamento.novembro) valor_orcado');
                break;
            case 12:
                $this->db->select('sum(orcamento.dezembro) valor_orcado');
                break;
        }


        $this->db->from('orcamento');
        $this->db->where('orcamento.cod_conta_contabil', $conta);
        if($centro != ""){
            if($centro == "SC")
                $this->db->where('orcamento.cod_centro_custo', "");
            else
                $this->db->where('orcamento.cod_centro_custo', $centro);
        }
        $this->db->where('orcamento.ano', $ano);

        return $query = $this->db->get()->row();

    }

    public function getTotalResultado($dataInicio, $dataFim, $centro){
        $this->db->where('conta.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('sum(if(movimentos_conta.tipo_movimento = 1, movimentos_conta.valor_titulo, 0)) entradas');
        $this->db->select('sum(if(movimentos_conta.tipo_movimento = 2, movimentos_conta.valor_titulo, 0)) saidas');
        $this->db->from('movimentos_conta');   
        $this->db->join('conta', 'conta.cod_conta = movimentos_conta.cod_conta');
        $this->db->where('conta.ativo', 1);
        if($centro != ""){
            if($centro == "SC")
                $this->db->where('movimentos_conta.cod_centro_custo', "");
            else
                $this->db->where('movimentos_conta.cod_centro_custo', $centro);
        }
        $this->db->where('movimentos_conta.confirmado', 1);
        $this->db->where('movimentos_conta.data_confirmacao >= ', $dataInicio);
        $this->db->where('movimentos_conta.data_confirmacao <= ', $dataFim);

        return $query = $this->db->get()->row();

    }

    public function getMovimentosPendentes($dataInicio, $dataFim){
        $this->db->where('conta.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('sum(if(movimentos_conta.tipo_movimento = 1, movimentos_conta.valor_titulo, 0)) entradas');
        $this->db->select('sum(if(movimentos_conta.tipo_movimento = 2, movimentos_conta.valor_titulo, 0)) saidas');
        $this->db->from('movimentos_conta');
        $this->db->join('conta', 'conta.cod_conta = movimentos_conta.cod_conta');
        $this->db->where('conta.ativo', 1);
        $this->db->where('movimentos_conta.confirmado', 0);
        $this->db->where('movimentos_conta.especie_movimento !=', 2);
        $this->db->where('movimentos_conta.data_vencimento >= ', $dataInicio);
        $this->db->where('movimentos_conta.data_vencimento <= ', $dataFim);

        return $query = $this->db->get()->row();

    }

    public function getMovimentosConfirmados($dataInicio, $dataFim){
        $this->db->where('conta.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('sum(if(movimentos_conta.tipo_movimento = 1, movimentos_conta.valor_confirmado, 0)) entradas');
        $this->db->select('sum(if(movimentos_conta.tipo_movimento = 2, movimentos_conta.valor_confirmado, 0)) saidas');
        $this->db->from('movimentos_conta');
        $this->db->join('conta', 'conta.cod_conta = movimentos_conta.cod_conta');
        $this->db->where('conta.ativo', 1);
        $this->db->where('movimentos_conta.confirmado', 1);
        $this->db->where('movimentos_conta.especie_movimento !=', 2);
        $this->db->where('movimentos_conta.data_confirmacao >= ', $dataInicio);
        $this->db->where('movimentos_conta.data_confirmacao <= ', $dataFim);

        return $query = $this->db->get()->row();

    }

    public function getSaldoContas(){
        $this->db->where('conta.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('sum(conta.saldo_conta) saldo_contas');
        $this->db->from('conta');
        $this->db->where('conta.ativo', 1);

        return $query = $this->db->get()->row();

    }

    public function getConfirmadoDia($dataInicio, $dataFim){
        $this->db->where('conta.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('sum(if(movimentos_conta.tipo_movimento = 1, movimentos_conta.valor_confirmado, 0)) entradas');
        $this->db->select('sum(if(movimentos_conta.tipo_movimento = 2, movimentos_conta.valor_confirmado, 0)) saidas');
        $this->db->select('time_dimension.db_date as data, time_dimension.month_name as nome_mes');
        $this->db->from('movimentos_conta');
        $this->db->join('time_dimension', 'time_dimension.db_date = movimentos_conta.data_confirmacao');   
        $this->db->join('conta', 'conta.cod_conta = movimentos_conta.cod_conta');      
        $this->db->where("movimentos_conta.data_confirmacao >= ", $dataInicio);
        $this->db->where("movimentos_conta.data_confirmacao <= ", $dataFim);
        $this->db->where('movimentos_conta.confirmado', 1);
        $this->db->where('movimentos_conta.especie_movimento !=', 2);
        $this->db->where('conta.ativo', 1);        
        $this->db->group_by('movimentos_conta.data_confirmacao', 'asc');
        $this->db->order_by('movimentos_conta.data_confirmacao', 'asc');

        return $query = $this->db->get()->result();   
    }

    public function getTitulosDia($dataInicio, $dataFim){

        $this->db->select('tim.db_date as data,
                            tim.month_name as nome_mes,
                            IFNULL(movimento_confirmado.entradas, 0) as entradas_confirmadas,
                            IFNULL(movimento_confirmado.saidas, 0) as saidas_confirmadas,   
                            IFNULL(movimento_pendente.entradas, 0) as entradas_pendentes,
                            IFNULL(movimento_pendente.saidas, 0) as saidas_pendentes                            
                        from time_dimension tim');
        $this->db->join('(
                            SELECT movimentos_conta.data_vencimento, 
                                sum(if(movimentos_conta.tipo_movimento = 1, movimentos_conta.valor_titulo, 0)) entradas,
                                sum(if(movimentos_conta.tipo_movimento = 2, movimentos_conta.valor_titulo, 0)) saidas                                
                            FROM movimentos_conta 
                            JOIN conta ON conta.cod_conta = movimentos_conta.cod_conta
                            where conta.id_empresa = ' . getDadosUsuarioLogado()['id_empresa'] . '
                              and movimentos_conta.confirmado = 0
                              and conta.ativo = 1
                            GROUP BY movimentos_conta.data_vencimento 
                        ) as movimento_pendente', 'movimento_pendente on movimento_pendente.data_vencimento = tim.db_date ', 'left');
        $this->db->join('(
                            SELECT movimentos_conta.data_confirmacao, 
                                sum(if(movimentos_conta.tipo_movimento = 1, movimentos_conta.valor_confirmado, 0)) entradas,
                                sum(if(movimentos_conta.tipo_movimento = 2, movimentos_conta.valor_confirmado, 0)) saidas                                
                            FROM movimentos_conta 
                            JOIN conta ON conta.cod_conta = movimentos_conta.cod_conta
                            where conta.id_empresa = ' . getDadosUsuarioLogado()['id_empresa'] . '
                              and movimentos_conta.confirmado = 1
                              and conta.ativo = 1
                            GROUP BY movimentos_conta.data_confirmacao 
                        ) as movimento_confirmado', 'movimento_confirmado on movimento_confirmado.data_confirmacao = tim.db_date ', 'left');
        $this->db->order_by('tim.db_date', 'asc');

        $this->db->where("tim.db_date >= ", $dataInicio);
        $this->db->where("tim.db_date <= ", $dataFim);

        return $query = $this->db->get()->result();   
    }

    public function getResultadoAno($dataInicio, $dataFim){

        $this->db->select('tim.year as ano,
                           tim.month as mes,
                           tim.month_name as nome_mes,
                           SUM(IFNULL(movimento_confirmado.entradas, 0)) as entradas_confirmadas,
                           SUM(IFNULL(movimento_confirmado.saidas, 0)) as saidas_confirmadas                          
                        from time_dimension tim');
        $this->db->join('(
                            SELECT movimentos_conta.data_confirmacao, 
                                sum(if(movimentos_conta.tipo_movimento = 1, movimentos_conta.valor_confirmado, 0)) entradas,
                                sum(if(movimentos_conta.tipo_movimento = 2, movimentos_conta.valor_confirmado, 0)) saidas                                
                            FROM movimentos_conta 
                            JOIN conta ON conta.cod_conta = movimentos_conta.cod_conta
                            where conta.id_empresa = ' . getDadosUsuarioLogado()['id_empresa'] . '
                              and movimentos_conta.confirmado = 1
                              and movimentos_conta.especie_movimento != 2
                              and conta.ativo = 1
                            GROUP BY movimentos_conta.data_confirmacao 
                        ) as movimento_confirmado', 'movimento_confirmado on movimento_confirmado.data_confirmacao = tim.db_date ', 'left');
        $this->db->where('tim.db_date <= CURRENT_DATE()');
        $this->db->group_by('tim.month');
        $this->db->order_by('tim.month', 'asc');

        $this->db->where("tim.db_date >= ", $dataInicio);
        $this->db->where("tim.db_date <= ", $dataFim);

        return $query = $this->db->get()->result();   
    }

    public function getContasAtivasSaldos(){
        $this->db->where('conta.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('conta.*');
        $this->db->select('(select sum(movimentos_conta.))');
        $this->db->from('conta');
        $this->db->where('conta.ativo', 1);

        return $query = $this->db->get()->row();

    }

    public function getLancamentosContasContabReceita($dataInicio, $dataFim){
        $this->db->where('conta.id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('conta_contabil.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('sum(movimentos_conta.valor_confirmado) entradas');
        $this->db->select('conta_contabil.cod_conta_contabil, conta_contabil.nome_conta_contabil');        
        $this->db->from('movimentos_conta');
        $this->db->join('conta', 'conta.cod_conta = movimentos_conta.cod_conta');
        $this->db->join('conta_contabil', 'conta_contabil.cod_conta_contabil = movimentos_conta.cod_conta_contabil');
        $this->db->where("movimentos_conta.tipo_movimento", 1);
        $this->db->where("movimentos_conta.especie_movimento !=", 2);
        $this->db->where("movimentos_conta.data_confirmacao >= ", $dataInicio);
        $this->db->where("movimentos_conta.data_confirmacao <= ", $dataFim);
        $this->db->group_by('conta_contabil.cod_conta_contabil', 'asc');
        $this->db->order_by('entradas', 'desc');

        return $this->db->get()->result();

    }

    public function getLancamentosContasContabDespesa($dataInicio, $dataFim){
        $this->db->where('conta.id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('conta_contabil.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('sum(movimentos_conta.valor_confirmado) saidas');
        $this->db->select('conta_contabil.cod_conta_contabil, conta_contabil.nome_conta_contabil');        
        $this->db->from('movimentos_conta');
        $this->db->join('conta', 'conta.cod_conta = movimentos_conta.cod_conta');
        $this->db->join('conta_contabil', 'conta_contabil.cod_conta_contabil = movimentos_conta.cod_conta_contabil');
        $this->db->where("movimentos_conta.tipo_movimento", 2);
        $this->db->where("movimentos_conta.especie_movimento !=", 2);
        $this->db->where("movimentos_conta.data_confirmacao >= ", $dataInicio);
        $this->db->where("movimentos_conta.data_confirmacao <= ", $dataFim);
        $this->db->group_by('conta_contabil.cod_conta_contabil', 'asc');
        $this->db->order_by('saidas', 'desc');

        return $this->db->get()->result();

    }

    public function getLancamentosCentroCustoReceita($dataInicio, $dataFim){
        $this->db->where('conta.id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('centro_custo.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('sum(movimentos_conta.valor_confirmado) entradas');
        $this->db->select('centro_custo.cod_centro_custo, centro_custo.nome_centro_custo');        
        $this->db->from('movimentos_conta');
        $this->db->join('conta', 'conta.cod_conta = movimentos_conta.cod_conta');
        $this->db->join('centro_custo', 'centro_custo.cod_centro_custo = movimentos_conta.cod_centro_custo');
        $this->db->where("movimentos_conta.tipo_movimento", 1);
        $this->db->where("movimentos_conta.especie_movimento !=", 2);
        $this->db->where("movimentos_conta.data_confirmacao >= ", $dataInicio);
        $this->db->where("movimentos_conta.data_confirmacao <= ", $dataFim);
        $this->db->group_by('centro_custo.cod_centro_custo', 'asc');
        $this->db->order_by('entradas', 'desc');

        return $this->db->get()->result();

    }

    public function getLancamentosCentroCustoDespesa($dataInicio, $dataFim){
        $this->db->where('conta.id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('centro_custo.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('sum(movimentos_conta.valor_confirmado) saidas');
        $this->db->select('centro_custo.cod_centro_custo, centro_custo.nome_centro_custo');        
        $this->db->from('movimentos_conta');
        $this->db->join('conta', 'conta.cod_conta = movimentos_conta.cod_conta');
        $this->db->join('centro_custo', 'centro_custo.cod_centro_custo = movimentos_conta.cod_centro_custo');
        $this->db->where("movimentos_conta.tipo_movimento", 2);
        $this->db->where("movimentos_conta.especie_movimento !=", 2);
        $this->db->where("movimentos_conta.data_confirmacao >= ", $dataInicio);
        $this->db->where("movimentos_conta.data_confirmacao <= ", $dataFim);
        $this->db->group_by('centro_custo.cod_centro_custo', 'asc');
        $this->db->order_by('saidas', 'desc');

        return $this->db->get()->result();

    }

    public function getMovimentosDetalhados($dataInicio, $dataFim, $codConta, $tipoData){ 
        $this->db->where('conta.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('movimentos_conta.*, conta.nome_conta, centro_custo.nome_centro_custo, cliente.nome_cliente, fornecedor.nome_fornecedor, vendedor.nome_vendedor, conta_contabil.nome_conta_contabil, metodo_pagamento.nome_metodo_pagamento');        
        $this->db->select('usu_c.nome_usuario nome_usuario_criacao');
        $this->db->select('usu_l.nome_usuario nome_usuario_liquidacao');
        $this->db->from('movimentos_conta');
        $this->db->join('conta', 'conta.cod_conta = movimentos_conta.cod_conta');
        $this->db->join('centro_custo', 'centro_custo.cod_centro_custo = movimentos_conta.cod_centro_custo and centro_custo.id_empresa = ' . getDadosUsuarioLogado()['id_empresa'], 'left');
        $this->db->join('conta_contabil', 'conta_contabil.cod_conta_contabil = movimentos_conta.cod_conta_contabil and conta_contabil.id_empresa = ' . getDadosUsuarioLogado()['id_empresa'], 'left');
        $this->db->join('metodo_pagamento', 'metodo_pagamento.cod_metodo_pagamento = movimentos_conta.cod_metodo_pagamento and metodo_pagamento.id_empresa = ' . getDadosUsuarioLogado()['id_empresa'], 'left');
        $this->db->join('cliente', 'cliente.cod_cliente = movimentos_conta.cod_emitente', 'left');
        $this->db->join('fornecedor', 'fornecedor.cod_fornecedor = movimentos_conta.cod_emitente', 'left');
        $this->db->join('vendedor', 'vendedor.cod_vendedor = movimentos_conta.cod_vendedor', 'left');
        $this->db->join('usuario usu_c', 'usu_c.email = movimentos_conta.usuario_criacao', 'left');     
        $this->db->join('usuario usu_l', 'usu_l.email = movimentos_conta.usuario_liquidacao', 'left');  

        if($tipoData == "1"){
            $this->db->where('movimentos_conta.data_vencimento >= ', $dataInicio);
            $this->db->where('movimentos_conta.data_vencimento <= ', $dataFim);
            $this->db->order_by('data_vencimento', 'asc');
            $this->db->order_by('cod_movimento_conta', 'asc');
        }elseif($tipoData == "2"){
            $this->db->where('movimentos_conta.data_confirmacao >= ', $dataInicio);
            $this->db->where('movimentos_conta.data_confirmacao <= ', $dataFim);
            $this->db->order_by('data_confirmacao', 'asc');
            $this->db->order_by('cod_movimento_conta', 'asc');
        }elseif($tipoData == "3"){
            $this->db->where('movimentos_conta.data_competencia >= ', $dataInicio);
            $this->db->where('movimentos_conta.data_competencia <= ', $dataFim);
            $this->db->order_by('data_competencia', 'asc');
            $this->db->order_by('cod_movimento_conta', 'asc');
        }

        if($codConta != ""){
            $this->db->where_in('conta.cod_conta', $codConta);
        }

        return $query = $this->db->get()->result();
        
    }

    public function getLancamentosConta($dataInicio, $dataFim, $codConta){ 
        $this->db->where('conta.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('movimentos_conta.*, conta.nome_conta, centro_custo.nome_centro_custo, cliente.nome_cliente, fornecedor.nome_fornecedor, vendedor.nome_vendedor, conta_contabil.nome_conta_contabil, metodo_pagamento.nome_metodo_pagamento');        
        $this->db->select('if(movimentos_conta.confirmado = 1, movimentos_conta.data_confirmacao, if(movimentos_conta.data_vencimento < CURRENT_DATE(), CURRENT_DATE(), movimentos_conta.data_vencimento)) as data_titulo');   
        $this->db->select('conta.nome_conta, cliente.nome_cliente, fornecedor.nome_fornecedor'); 
        $this->db->select('usu_c.nome_usuario nome_usuario_criacao');
        $this->db->select('usu_l.nome_usuario nome_usuario_liquidacao');
        $this->db->from('movimentos_conta');
        $this->db->join('conta', 'conta.cod_conta = movimentos_conta.cod_conta');
        $this->db->join('centro_custo', 'centro_custo.cod_centro_custo = movimentos_conta.cod_centro_custo and centro_custo.id_empresa = ' . getDadosUsuarioLogado()['id_empresa'], 'left');
        $this->db->join('conta_contabil', 'conta_contabil.cod_conta_contabil = movimentos_conta.cod_conta_contabil and conta_contabil.id_empresa = ' . getDadosUsuarioLogado()['id_empresa'], 'left');
        $this->db->join('metodo_pagamento', 'metodo_pagamento.cod_metodo_pagamento = movimentos_conta.cod_metodo_pagamento and metodo_pagamento.id_empresa = ' . getDadosUsuarioLogado()['id_empresa'], 'left');
        $this->db->join('cliente', 'cliente.cod_cliente = movimentos_conta.cod_emitente', 'left');
        $this->db->join('fornecedor', 'fornecedor.cod_fornecedor = movimentos_conta.cod_emitente', 'left');
        $this->db->join('vendedor', 'vendedor.cod_vendedor = movimentos_conta.cod_vendedor', 'left');
        $this->db->join('usuario usu_c', 'usu_c.email = movimentos_conta.usuario_criacao', 'left');     
        $this->db->join('usuario usu_l', 'usu_l.email = movimentos_conta.usuario_liquidacao', 'left');
        $this->db->where('if(movimentos_conta.confirmado = 1, movimentos_conta.data_confirmacao, if(movimentos_conta.data_vencimento < CURRENT_DATE(), CURRENT_DATE(), movimentos_conta.data_vencimento)) >= ', $dataInicio);
        $this->db->where('if(movimentos_conta.confirmado = 1, movimentos_conta.data_confirmacao, if(movimentos_conta.data_vencimento < CURRENT_DATE(), CURRENT_DATE(), movimentos_conta.data_vencimento)) <= ', $dataFim);
        $this->db->order_by('data_titulo', 'asc');
        $this->db->order_by('confirmado', 'desc');
        $this->db->order_by('data_vencimento', 'asc');
        $this->db->order_by('cod_movimento_conta', 'asc');

        if($codConta != ""){
            $this->db->where_in('conta.cod_conta', $codConta);
        }

        return $query = $this->db->get()->result();
        
    }

    public function getTitulosFluxo($dataInicio, $dataFim, $codConta){ 
        $this->db->where('conta.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('movimentos_conta.confirmado, movimentos_conta.cod_movimento_conta, movimentos_conta.cod_movimento_conta'); 
        $this->db->select('movimentos_conta.desc_movimento, movimentos_conta.tipo_movimento, movimentos_conta.valor_confirmado, movimentos_conta.valor_titulo'); 
        $this->db->select('movimentos_conta.data_vencimento, movimentos_conta.data_confirmacao'); 
        $this->db->select('if(movimentos_conta.confirmado = 1, movimentos_conta.data_confirmacao, if(movimentos_conta.data_vencimento < CURRENT_DATE(), CURRENT_DATE(), movimentos_conta.data_vencimento)) as data_titulo');   
        $this->db->select('conta.nome_conta, cliente.nome_cliente, fornecedor.nome_fornecedor'); 
        $this->db->from('movimentos_conta');
        $this->db->join('conta', 'conta.cod_conta = movimentos_conta.cod_conta');
        $this->db->join('cliente', 'cliente.cod_cliente = movimentos_conta.cod_emitente', 'left');
        $this->db->join('fornecedor', 'fornecedor.cod_fornecedor = movimentos_conta.cod_emitente', 'left');
        $this->db->where('if(movimentos_conta.confirmado = 1, movimentos_conta.data_confirmacao, if(movimentos_conta.data_vencimento < CURRENT_DATE(), CURRENT_DATE(), movimentos_conta.data_vencimento)) >= ', $dataInicio);
        $this->db->where('if(movimentos_conta.confirmado = 1, movimentos_conta.data_confirmacao, if(movimentos_conta.data_vencimento < CURRENT_DATE(), CURRENT_DATE(), movimentos_conta.data_vencimento)) <= ', $dataFim);
        $this->db->order_by('data_titulo', 'asc');
        $this->db->order_by('confirmado', 'desc');
        $this->db->order_by('data_vencimento', 'asc');
        $this->db->order_by('cod_movimento_conta', 'asc');

        if($codConta != ""){
            $this->db->where_in('conta.cod_conta', $codConta);
        }

        return $query = $this->db->get()->result();
        
    }

    public function getOrcamentoPorConta($codContaContabil){
        $this->db->where('conta_contabil.id_empresa', getDadosUsuarioLogado()['id_empresa']);  
        $this->db->where('orcamento.id_empresa', getDadosUsuarioLogado()['id_empresa']);  

        $this->db->select('orcamento.*, centro_custo.nome_centro_custo');
        $this->db->select('(orcamento.janeiro + orcamento.fevereiro + orcamento.marco + orcamento.abril + orcamento.maio + orcamento.junho + orcamento.julho + 
                            orcamento.agosto + orcamento.setembro + orcamento.outubro + orcamento.novembro + orcamento.dezembro) as total_orcado');
        $this->db->from('orcamento');
        $this->db->join('conta_contabil', 'conta_contabil.cod_conta_contabil = orcamento.cod_conta_contabil');
        $this->db->join('centro_custo', 'centro_custo.cod_centro_custo = orcamento.cod_centro_custo and centro_custo.id_empresa = ' . getDadosUsuarioLogado()['id_empresa'], 'left');        
        $this->db->where('orcamento.cod_conta_contabil', $codContaContabil);
        $this->db->order_by('orcamento.ano', 'desc');

        return $query = $this->db->get()->result();
    }

    public function getOrcamentoPorCentro($codCentroCusto){
        $this->db->where('centro_custo.id_empresa', getDadosUsuarioLogado()['id_empresa']);  
        $this->db->where('orcamento.id_empresa', getDadosUsuarioLogado()['id_empresa']);  

        $this->db->select('orcamento.*, conta_contabil.nome_conta_contabil');
        $this->db->select('(orcamento.janeiro + orcamento.fevereiro + orcamento.marco + orcamento.abril + orcamento.maio + orcamento.junho + orcamento.julho + 
                            orcamento.agosto + orcamento.setembro + orcamento.outubro + orcamento.novembro + orcamento.dezembro) as total_orcado');
        $this->db->from('orcamento');
        $this->db->join('centro_custo', 'centro_custo.cod_centro_custo = orcamento.cod_centro_custo');
        $this->db->join('conta_contabil', 'conta_contabil.cod_conta_contabil = orcamento.cod_conta_contabil and conta_contabil.id_empresa = ' . getDadosUsuarioLogado()['id_empresa'], 'left');        
        $this->db->where('orcamento.cod_centro_custo', $codCentroCusto);
        $this->db->order_by('orcamento.ano', 'desc');

        return $query = $this->db->get()->result();
    }

    public function getContaContabilDetalhados($dataInicio, $dataFim, $codContaContabil){ 
        $this->db->where('conta.id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('conta_contabil.id_empresa', getDadosUsuarioLogado()['id_empresa']);  

        $this->db->select('movimentos_conta.*, conta.nome_conta, conta_contabil.nome_conta_contabil');        
        $this->db->from('movimentos_conta');
        $this->db->join('conta', 'conta.cod_conta = movimentos_conta.cod_conta');
        $this->db->join('conta_contabil', 'conta_contabil.cod_conta_contabil = movimentos_conta.cod_conta_contabil');
        $this->db->where('movimentos_conta.confirmado', '1');
        $this->db->where('movimentos_conta.data_confirmacao >= ', $dataInicio);
        $this->db->where('movimentos_conta.data_confirmacao <= ', $dataFim);
        $this->db->order_by('data_confirmacao', 'desc');
        $this->db->order_by('cod_movimento_conta', 'desc');

        if($codContaContabil != ""){
            $this->db->where_in('conta_contabil.cod_conta_contabil', $codContaContabil);
        }

        return $query = $this->db->get()->result();
        
    }

    public function getReceita($ano){

        $this->db->select('tim.month_name as nome_mes,
                           SUM(IFNULL(movimento.total, 0)) as total                          
                          FROM time_dimension tim');
        $this->db->join('(SELECT movimentos_conta.data_competencia, 
                                SUM(movimentos_conta.valor_titulo) total
                            FROM movimentos_conta 
                            JOIN conta ON conta.cod_conta = movimentos_conta.cod_conta
                            JOIN conta_contabil ON conta_contabil.cod_conta_contabil = movimentos_conta.cod_conta_contabil
                            WHERE conta.id_empresa = ' . getDadosUsuarioLogado()['id_empresa'] . '
                            AND conta_contabil.id_empresa = ' . getDadosUsuarioLogado()['id_empresa'] . '
                            AND conta_contabil.demons_result = 1
                            AND movimentos_conta.tipo_movimento = 1
                        GROUP BY movimentos_conta.data_competencia) AS movimento', 'movimento on movimento.data_competencia = tim.db_date ', 'left');
        $this->db->group_by('tim.month');
        $this->db->order_by('tim.db_date', 'asc');

        $this->db->where("tim.year", $ano);

        return $query = $this->db->get()->result();

    }

    public function getDeducoes($ano){

        $this->db->select('tim.month_name as nome_mes,
                           SUM(IFNULL(movimento.total, 0)) as total                          
                          FROM time_dimension tim');
        $this->db->join('(SELECT movimentos_conta.data_competencia, 
                                SUM(movimentos_conta.valor_titulo) total
                            FROM movimentos_conta 
                            JOIN conta ON conta.cod_conta = movimentos_conta.cod_conta
                            JOIN conta_contabil ON conta_contabil.cod_conta_contabil = movimentos_conta.cod_conta_contabil
                            WHERE conta.id_empresa = ' . getDadosUsuarioLogado()['id_empresa'] . '
                            AND conta_contabil.id_empresa = ' . getDadosUsuarioLogado()['id_empresa'] . '
                            AND conta_contabil.demons_result = 2
                            AND movimentos_conta.tipo_movimento = 2
                        GROUP BY movimentos_conta.data_competencia) AS movimento', 'movimento on movimento.data_competencia = tim.db_date ', 'left');
        $this->db->group_by('tim.month');
        $this->db->order_by('tim.db_date', 'asc');

        $this->db->where("tim.year", $ano);

        return $query = $this->db->get()->result();

    }

    public function getCustos($ano){

        $this->db->select('tim.month_name as nome_mes,
                           SUM(IFNULL(movimento.total, 0)) as total                          
                          FROM time_dimension tim');
        $this->db->join('(SELECT movimentos_conta.data_competencia, 
                                SUM(movimentos_conta.valor_titulo) total
                            FROM movimentos_conta 
                            JOIN conta ON conta.cod_conta = movimentos_conta.cod_conta
                            JOIN conta_contabil ON conta_contabil.cod_conta_contabil = movimentos_conta.cod_conta_contabil
                            WHERE conta.id_empresa = ' . getDadosUsuarioLogado()['id_empresa'] . '
                            AND conta_contabil.id_empresa = ' . getDadosUsuarioLogado()['id_empresa'] . '
                            AND conta_contabil.demons_result = 3
                            AND movimentos_conta.tipo_movimento = 2
                        GROUP BY movimentos_conta.data_competencia) AS movimento', 'movimento on movimento.data_competencia = tim.db_date ', 'left');
        $this->db->group_by('tim.month');
        $this->db->order_by('tim.db_date', 'asc');

        $this->db->where("tim.year", $ano);

        return $query = $this->db->get()->result();

    }

    public function getDespesasOper($ano){

        $this->db->select('tim.month_name as nome_mes,
                           SUM(IFNULL(movimento.total, 0)) as total                          
                          FROM time_dimension tim');
        $this->db->join('(SELECT movimentos_conta.data_competencia, 
                                SUM(movimentos_conta.valor_titulo) total
                            FROM movimentos_conta 
                            JOIN conta ON conta.cod_conta = movimentos_conta.cod_conta
                            JOIN conta_contabil ON conta_contabil.cod_conta_contabil = movimentos_conta.cod_conta_contabil
                            WHERE conta.id_empresa = ' . getDadosUsuarioLogado()['id_empresa'] . '
                            AND conta_contabil.id_empresa = ' . getDadosUsuarioLogado()['id_empresa'] . '
                            AND conta_contabil.demons_result = 4
                            AND movimentos_conta.tipo_movimento = 2
                        GROUP BY movimentos_conta.data_competencia) AS movimento', 'movimento on movimento.data_competencia = tim.db_date ', 'left');
        $this->db->group_by('tim.month');
        $this->db->order_by('tim.db_date', 'asc');

        $this->db->where("tim.year", $ano);

        return $query = $this->db->get()->result();

    }

    public function getOutrasRecNaoOper($ano){

        $this->db->select('tim.month_name as nome_mes,
                           SUM(IFNULL(movimento.total, 0)) as total                          
                          FROM time_dimension tim');
        $this->db->join('(SELECT movimentos_conta.data_competencia, 
                                SUM(movimentos_conta.valor_titulo) total
                            FROM movimentos_conta 
                            JOIN conta ON conta.cod_conta = movimentos_conta.cod_conta
                            JOIN conta_contabil ON conta_contabil.cod_conta_contabil = movimentos_conta.cod_conta_contabil
                            WHERE conta.id_empresa = ' . getDadosUsuarioLogado()['id_empresa'] . '
                            AND conta_contabil.id_empresa = ' . getDadosUsuarioLogado()['id_empresa'] . '
                            AND conta_contabil.demons_result = 5
                            AND movimentos_conta.tipo_movimento = 1
                        GROUP BY movimentos_conta.data_competencia) AS movimento', 'movimento on movimento.data_competencia = tim.db_date ', 'left');
        $this->db->group_by('tim.month');
        $this->db->order_by('tim.db_date', 'asc');

        $this->db->where("tim.year", $ano);

        return $query = $this->db->get()->result();

    }

    public function getOutrasDespNaoOper($ano){

        $this->db->select('tim.month_name as nome_mes,
                           SUM(IFNULL(movimento.total, 0)) as total                          
                          FROM time_dimension tim');
        $this->db->join('(SELECT movimentos_conta.data_competencia, 
                                SUM(movimentos_conta.valor_titulo) total
                            FROM movimentos_conta 
                            JOIN conta ON conta.cod_conta = movimentos_conta.cod_conta
                            JOIN conta_contabil ON conta_contabil.cod_conta_contabil = movimentos_conta.cod_conta_contabil
                            WHERE conta.id_empresa = ' . getDadosUsuarioLogado()['id_empresa'] . '
                            AND conta_contabil.id_empresa = ' . getDadosUsuarioLogado()['id_empresa'] . '
                            AND conta_contabil.demons_result = 6
                            AND movimentos_conta.tipo_movimento = 2
                        GROUP BY movimentos_conta.data_competencia) AS movimento', 'movimento on movimento.data_competencia = tim.db_date ', 'left');
        $this->db->group_by('tim.month');
        $this->db->order_by('tim.db_date', 'asc');

        $this->db->where("tim.year", $ano);

        return $query = $this->db->get()->result();

    }

    public function getInvestimentos($ano){

        $this->db->select('tim.month_name as nome_mes,
                           SUM(IFNULL(movimento.total, 0)) as total                          
                          FROM time_dimension tim');
        $this->db->join('(SELECT movimentos_conta.data_competencia, 
                                SUM(movimentos_conta.valor_titulo) total
                            FROM movimentos_conta 
                            JOIN conta ON conta.cod_conta = movimentos_conta.cod_conta
                            JOIN conta_contabil ON conta_contabil.cod_conta_contabil = movimentos_conta.cod_conta_contabil
                            WHERE conta.id_empresa = ' . getDadosUsuarioLogado()['id_empresa'] . '
                            AND conta_contabil.id_empresa = ' . getDadosUsuarioLogado()['id_empresa'] . '
                            AND conta_contabil.demons_result = 7
                            AND movimentos_conta.confirmado = 1
                            AND movimentos_conta.tipo_movimento = 2
                        GROUP BY movimentos_conta.data_competencia) AS movimento', 'movimento on movimento.data_competencia = tim.db_date ', 'left');
        $this->db->group_by('tim.month');
        $this->db->order_by('tim.db_date', 'asc');

        $this->db->where("tim.year", $ano);

        return $query = $this->db->get()->result();

    }

    public function getLancamentoDiario($dataInicio, $dataFim){

        $this->db->select('tim.db_date as data,
                            tim.month_name as nome_mes,
                            IFNULL(movimento.entradas, 0) as entradas,
                            IFNULL(movimento.saidas, 0) as saidas                           
                        from time_dimension tim');
        $this->db->join('(
                            SELECT movimentos_conta.data_confirmacao, 
                                sum(if(movimentos_conta.tipo_movimento = 1, movimentos_conta.valor_confirmado, 0)) entradas,
                                sum(if(movimentos_conta.tipo_movimento = 2, movimentos_conta.valor_confirmado, 0)) saidas
                            FROM movimentos_conta 
                            JOIN conta ON conta.cod_conta = movimentos_conta.cod_conta
                            where conta.id_empresa = ' . getDadosUsuarioLogado()['id_empresa'] . '
                              and conta.ativo = 1
                              and movimentos_conta.confirmado = 1
                            GROUP BY movimentos_conta.data_confirmacao 
                        ) as movimento', 'movimento on movimento.data_confirmacao = tim.db_date ', 'left');
        $this->db->where('tim.db_date <= CURRENT_DATE()');
        $this->db->order_by('tim.db_date', 'asc');

        $this->db->where("tim.db_date >= ", $dataInicio);
        $this->db->where("tim.db_date <= ", $dataFim);

        return $query = $this->db->get()->result();   
    }

    public function getFluxoDia($dataInicio, $dataFim, $codConta){
        
        $condicao = "";
        if($codConta != ""){
            $condicao = "and (";
            foreach ($codConta as $key_conta => $conta) {
                $condicao = $condicao . "movimentos_conta.cod_conta = " . $conta;   
                
                if (@end(array_keys($codConta)) != $key_conta){
                    $condicao = $condicao . " or ";
                }
            }
            $condicao = $condicao . ")";
        }

        $this->db->select('tim.db_date as data,
                            tim.month_name as nome_mes,
                            SUM(IFNULL(movimento.entradas, 0)) as entradas,
                            SUM(IFNULL(movimento.saidas, 0)) as saidas                           
                        from time_dimension tim');
        $this->db->join('(
                            SELECT movimentos_conta.data_confirmacao as data_fluxo, 
                                sum(if(movimentos_conta.tipo_movimento = 1, movimentos_conta.valor_confirmado, 0)) entradas,
                                sum(if(movimentos_conta.tipo_movimento = 2, movimentos_conta.valor_confirmado, 0)) saidas
                            FROM movimentos_conta 
                            JOIN conta ON conta.cod_conta = movimentos_conta.cod_conta
                            where conta.id_empresa = ' . getDadosUsuarioLogado()['id_empresa'] . '
                              and conta.ativo = 1
                              and movimentos_conta.confirmado = 1 '
                              . $condicao .
                              ' GROUP BY movimentos_conta.data_confirmacao                            
                            UNION 
                            SELECT if(movimentos_conta.data_vencimento < CURRENT_DATE(), CURRENT_DATE(), movimentos_conta.data_vencimento) as data_fluxo, 
                                sum(if(movimentos_conta.tipo_movimento = 1, movimentos_conta.valor_titulo, 0)) entradas,
                                sum(if(movimentos_conta.tipo_movimento = 2, movimentos_conta.valor_titulo, 0)) saidas
                            FROM movimentos_conta 
                            JOIN conta ON conta.cod_conta = movimentos_conta.cod_conta
                            where conta.id_empresa = ' . getDadosUsuarioLogado()['id_empresa'] . '
                              and conta.ativo = 1
                              and movimentos_conta.confirmado = 0 '
                              . $condicao .
                            ' GROUP BY if(movimentos_conta.data_vencimento < CURRENT_DATE(), CURRENT_DATE(), movimentos_conta.data_vencimento)
                        ) as movimento', 'movimento on movimento.data_fluxo = tim.db_date ', 'left');
        $this->db->order_by('tim.db_date');
        $this->db->group_by('tim.db_date', 'asc');

        $this->db->where("tim.db_date >= ", $dataInicio);
        $this->db->where("tim.db_date <= ", $dataFim);

        return $query = $this->db->get()->result();   
    }

    public function getDespesasContaContabil($dataInicio, $dataFim){
        $this->db->where('conta.id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('conta_contabil.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('conta_contabil.cod_conta_contabil, conta_contabil.nome_conta_contabil');
        $this->db->select('sum(movimentos_conta.valor_confirmado) valor_total');
        $this->db->from('movimentos_conta');
        $this->db->join('conta_contabil', 'conta_contabil.cod_conta_contabil = movimentos_conta.cod_conta_contabil', 'left');
        $this->db->join('conta', 'conta.cod_conta = movimentos_conta.cod_conta');
        $this->db->where('movimentos_conta.confirmado', 1);
        $this->db->where('movimentos_conta.tipo_movimento', 2);
        $this->db->where('movimentos_conta.data_confirmacao >= ', $dataInicio);
        $this->db->where('movimentos_conta.data_confirmacao <= ', $dataFim);
        $this->db->group_by('conta_contabil.cod_conta_contabil');
        $this->db->order_by('valor_total', 'desc');

        return $query = $this->db->get()->result();  

    }
    public function getDespesasCentroCusto($dataInicio, $dataFim){
        $this->db->where('conta.id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('centro_custo.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('centro_custo.cod_centro_custo, centro_custo.nome_centro_custo');
        $this->db->select('sum(movimentos_conta.valor_confirmado) valor_total');
        $this->db->from('movimentos_conta');
        $this->db->join('centro_custo', 'centro_custo.cod_centro_custo = movimentos_conta.cod_centro_custo', 'left');
        $this->db->join('conta', 'conta.cod_conta = movimentos_conta.cod_conta');
        $this->db->where('movimentos_conta.confirmado', 1);
        $this->db->where('movimentos_conta.tipo_movimento', 2);
        $this->db->where('movimentos_conta.data_confirmacao >= ', $dataInicio);
        $this->db->where('movimentos_conta.data_confirmacao <= ', $dataFim);
        $this->db->group_by('centro_custo.cod_centro_custo');
        $this->db->order_by('valor_total', 'desc');

        return $query = $this->db->get()->result();  

    }

    public function getReceitasContaContabil($dataInicio, $dataFim){
        $this->db->where('conta.id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('conta_contabil.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('conta_contabil.cod_conta_contabil, conta_contabil.nome_conta_contabil');
        $this->db->select('sum(movimentos_conta.valor_confirmado) valor_total');
        $this->db->from('movimentos_conta');
        $this->db->join('conta_contabil', 'conta_contabil.cod_conta_contabil = movimentos_conta.cod_conta_contabil', 'left');
        $this->db->join('conta', 'conta.cod_conta = movimentos_conta.cod_conta');
        $this->db->where('movimentos_conta.confirmado', 1);
        $this->db->where('movimentos_conta.tipo_movimento', 1);
        $this->db->where('movimentos_conta.data_confirmacao >= ', $dataInicio);
        $this->db->where('movimentos_conta.data_confirmacao <= ', $dataFim);
        $this->db->group_by('conta_contabil.cod_conta_contabil');
        $this->db->order_by('valor_total', 'desc');

        return $query = $this->db->get()->result();  

    }

    public function getReceitasCentroCusto($dataInicio, $dataFim){
        $this->db->where('conta.id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('centro_custo.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('centro_custo.cod_centro_custo, centro_custo.nome_centro_custo');
        $this->db->select('sum(movimentos_conta.valor_confirmado) valor_total');
        $this->db->from('movimentos_conta');
        $this->db->join('centro_custo', 'centro_custo.cod_centro_custo = movimentos_conta.cod_centro_custo', 'left');
        $this->db->join('conta', 'conta.cod_conta = movimentos_conta.cod_conta');
        $this->db->where('movimentos_conta.confirmado', 1);
        $this->db->where('movimentos_conta.tipo_movimento', 1);
        $this->db->where('movimentos_conta.data_confirmacao >= ', $dataInicio);
        $this->db->where('movimentos_conta.data_confirmacao <= ', $dataFim);
        $this->db->group_by('centro_custo.cod_centro_custo');
        $this->db->order_by('valor_total', 'desc');

        return $query = $this->db->get()->result();  

    }

    public function getSaldosConta($dataInicio, $dataFim){
        $this->db->where('conta.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('conta.*');
        $this->db->from('conta');
        $this->db->where('conta.saldo_conta != ', 0);

        return $query = $this->db->get()->result();  

    }

    public function getMovimentosConta($dataInicio, $dataFim){
        $this->db->where('conta.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('conta.*');
        $this->db->select("sum((select sum(movimentos_conta.valor_confirmado)
                              from movimentos_conta
                             where movimentos_conta.cod_conta  = conta.cod_conta
                               and movimentos_conta.tipo_movimento = 1
                               and movimentos_conta.confirmado = 1
                               and movimentos_conta.data_confirmacao >= '". $dataInicio ."'
                               and movimentos_conta.data_confirmacao <= '". $dataFim ."')) entrada_confirm");
        $this->db->select("sum((select sum(movimentos_conta.valor_confirmado)
                              from movimentos_conta
                             where movimentos_conta.cod_conta  = conta.cod_conta
                               and movimentos_conta.tipo_movimento = 2
                               and movimentos_conta.confirmado = 1
                               and movimentos_conta.data_confirmacao >= '". $dataInicio ."'
                               and movimentos_conta.data_confirmacao <= '". $dataFim ."')) saida_confirm");
        $this->db->from('conta');
        $this->db->group_by('conta.cod_conta');

        return $query = $this->db->get()->result();  

    }

    public function getImportacaoConciliacaoPorHash($codConta, $hashArquivo){
        return $this->db->get_where('conciliacao_importacao', array(
            'id_empresa' => getDadosUsuarioLogado()['id_empresa'],
            'cod_conta' => $codConta,
            'hash_arquivo' => $hashArquivo
        ))->row();
    }

    public function importarExtratoConciliacao($codConta, $arquivo, $hashArquivo, $transacoes){
        $this->db->trans_start();
        $datas = array_column($transacoes, 'data_movimento');
        $this->db->insert('conciliacao_importacao', array(
            'id_empresa' => getDadosUsuarioLogado()['id_empresa'],
            'cod_conta' => $codConta,
            'nome_arquivo' => $arquivo,
            'hash_arquivo' => $hashArquivo,
            'data_inicio' => empty($datas) ? null : min($datas),
            'data_fim' => empty($datas) ? null : max($datas),
            'data_importacao' => date('Y-m-d H:i:s'),
            'usuario_importacao' => getDadosUsuarioLogado()['email']
        ));
        $idImportacao = $this->db->insert_id();
        foreach($transacoes as $transacao){
            $transacao['id_importacao'] = $idImportacao;
            $transacao['id_empresa'] = getDadosUsuarioLogado()['id_empresa'];
            $transacao['cod_conta'] = $codConta;
            $this->db->insert('conciliacao_extrato', $transacao);
        }
        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    public function getExtratoConciliacao($codConta, $dataInicio, $dataFim){
        $this->db->select('e.*, v.id_vinculo, v.cod_movimento_conta, v.valor_conciliado');
        $this->db->select('m.tipo_movimento tipo_movimento_titulo, m.confirmado confirmado_titulo, m.data_competencia, m.data_vencimento, m.data_confirmacao, m.parcela, m.desc_movimento desc_movimento_sistema, m.valor_titulo, m.valor_desc_taxa, m.valor_juros_multa, m.valor_confirmado, m.origem_movimento, m.id_origem');
        $this->db->select('fornecedor.nome_fornecedor, cliente.nome_cliente, metodo_pagamento.nome_metodo_pagamento, usu_c.nome_usuario usuario_criacao_titulo, usu_l.nome_usuario usuario_liquidacao_titulo');
        $this->db->from('conciliacao_extrato e');
        $this->db->join('conciliacao_vinculo v', 'v.id_extrato = e.id_extrato', 'left');
        $this->db->join('movimentos_conta m', 'm.cod_movimento_conta = v.cod_movimento_conta', 'left');
        $this->db->join('fornecedor', 'fornecedor.cod_fornecedor = m.cod_emitente AND m.tipo_movimento = 2', 'left');
        $this->db->join('cliente', 'cliente.cod_cliente = m.cod_emitente AND m.tipo_movimento = 1', 'left');
        $this->db->join('metodo_pagamento', 'metodo_pagamento.cod_metodo_pagamento = m.cod_metodo_pagamento AND metodo_pagamento.id_empresa = e.id_empresa', 'left');
        $this->db->join('usuario usu_c', 'usu_c.email = m.usuario_criacao', 'left');
        $this->db->join('usuario usu_l', 'usu_l.email = m.usuario_liquidacao', 'left');
        $this->db->where('e.id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('e.cod_conta', $codConta);
        $this->db->where('e.data_movimento >=', $dataInicio);
        $this->db->where('e.data_movimento <=', $dataFim);
        $this->db->order_by('e.data_movimento', 'desc');
        $this->db->order_by('e.id_extrato', 'desc');
        return $this->db->get()->result();
    }

    public function getMovimentosDisponiveisConciliacao($codConta, $dataInicio, $dataFim){
        $this->db->select('m.*, fornecedor.nome_fornecedor, cliente.nome_cliente, metodo_pagamento.nome_metodo_pagamento');
        $this->db->from('movimentos_conta m');
        $this->db->join('conta c', 'c.cod_conta = ' . $this->db->escape($codConta) . ' AND c.id_estabelecimento = m.id_estabelecimento');
        $this->db->join('conciliacao_vinculo v', 'v.cod_movimento_conta = m.cod_movimento_conta', 'left');
        $this->db->join('fornecedor', 'fornecedor.cod_fornecedor = m.cod_emitente AND m.tipo_movimento = 2', 'left');
        $this->db->join('cliente', 'cliente.cod_cliente = m.cod_emitente AND m.tipo_movimento = 1', 'left');
        $this->db->join('metodo_pagamento', 'metodo_pagamento.cod_metodo_pagamento = m.cod_metodo_pagamento AND metodo_pagamento.id_empresa = c.id_empresa', 'left');
        $this->db->where('c.id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('v.id_vinculo IS NULL', null, false);
        $this->db->group_start();
            $this->db->group_start();
                $this->db->where('m.confirmado', 1);
                $this->db->where('m.cod_conta', $codConta);
                $this->db->where('m.data_confirmacao >=', date('Y-m-d', strtotime($dataInicio . ' -90 days')));
                $this->db->where('m.data_confirmacao <=', date('Y-m-d', strtotime($dataFim . ' +90 days')));
            $this->db->group_end();
            $this->db->or_group_start();
                $this->db->where('m.confirmado', 0);
                $this->db->group_start();
                    $this->db->where('m.cod_conta', $codConta);
                    $this->db->or_where('m.cod_conta IS NULL', null, false);
                $this->db->group_end();
                $this->db->where('m.data_vencimento >=', date('Y-m-d', strtotime($dataInicio . ' -90 days')));
                $this->db->where('m.data_vencimento <=', date('Y-m-d', strtotime($dataFim . ' +90 days')));
            $this->db->group_end();
        $this->db->group_end();
        $this->db->order_by('m.confirmado', 'asc');
        $this->db->order_by('m.data_vencimento', 'desc');
        return $this->db->get()->result();
    }

    public function conciliarExtratoMovimento($codConta, $idExtrato, $codMovimento){
        $this->db->select('e.id_extrato, e.valor, e.data_movimento, e.status, m.cod_movimento_conta, m.cod_conta cod_conta_movimento, m.tipo_movimento, m.confirmado, m.valor_titulo, m.valor_confirmado');
        $this->db->from('conciliacao_extrato e');
        $this->db->join('conta c', 'c.cod_conta = e.cod_conta');
        $this->db->join('movimentos_conta m', 'm.cod_movimento_conta = ' . $this->db->escape($codMovimento) . ' AND m.id_estabelecimento = c.id_estabelecimento');
        $this->db->join('conciliacao_vinculo v', 'v.id_extrato = e.id_extrato OR v.cod_movimento_conta = m.cod_movimento_conta', 'left');
        $this->db->where('c.id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('e.cod_conta', $codConta);
        $this->db->where('e.id_extrato', $idExtrato);
        $this->db->where('m.tipo_movimento', '(CASE WHEN e.valor >= 0 THEN 1 ELSE 2 END)', false);
        $this->db->group_start();
            $this->db->where('m.cod_conta', $codConta);
            $this->db->or_group_start();
                $this->db->where('m.confirmado', 0);
                $this->db->where('m.cod_conta IS NULL', null, false);
            $this->db->group_end();
        $this->db->group_end();
        $this->db->where('v.id_vinculo IS NULL', null, false);
        $dados = $this->db->get()->row();
        if($dados === null) return false;
        $valorBase = $dados->confirmado == 1 ? (float)$dados->valor_confirmado : (float)$dados->valor_titulo;
        $valorMovimento = $dados->tipo_movimento == 1 ? $valorBase : -$valorBase;
        if(abs((float)$dados->valor - $valorMovimento) > 0.009) return false;

        $this->db->trans_start();
        $confirmadoPelaConciliacao = 0;
        if($dados->confirmado == 0){
            $confirmadoPelaConciliacao = 1;
            $this->updateMovimentoConta($codMovimento, array(
                'cod_conta' => $codConta,
                'data_confirmacao' => $dados->data_movimento,
                'valor_confirmado' => abs((float)$dados->valor),
                'confirmado' => 1,
                'usuario_liquidacao' => getDadosUsuarioLogado()['email']
            ));
        }
        $this->db->insert('conciliacao_vinculo', array(
            'id_extrato' => $idExtrato,
            'cod_movimento_conta' => $codMovimento,
            'valor_conciliado' => abs((float)$dados->valor),
            'movimento_confirmado_conciliacao' => $confirmadoPelaConciliacao,
            'cod_conta_anterior' => $dados->cod_conta_movimento,
            'data_conciliacao' => date('Y-m-d H:i:s'),
            'usuario_conciliacao' => getDadosUsuarioLogado()['email']
        ));
        $this->db->where('id_extrato', $idExtrato)->update('conciliacao_extrato', array('status' => 'conciliado'));
        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    public function criarTituloPeloExtrato($codConta, $idExtrato, $dadosTitulo){
        $this->db->select('e.id_extrato, e.valor, e.data_movimento, c.id_estabelecimento');
        $this->db->from('conciliacao_extrato e');
        $this->db->join('conta c', 'c.cod_conta = e.cod_conta');
        $this->db->join('conciliacao_vinculo v', 'v.id_extrato = e.id_extrato', 'left');
        $this->db->where('c.id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('e.cod_conta', $codConta);
        $this->db->where('e.id_extrato', $idExtrato);
        $this->db->where('e.status', 'pendente');
        $this->db->where('v.id_vinculo IS NULL', null, false);
        $extrato = $this->db->get()->row();
        if($extrato === null || abs((float)$extrato->valor) < 0.01) return false;

        $tipoMovimento = $extrato->valor >= 0 ? 1 : 2;
        $movimento = array(
            'id_estabelecimento' => $extrato->id_estabelecimento,
            'cod_conta' => $codConta,
            'cod_metodo_pagamento' => $dadosTitulo['cod_metodo_pagamento'],
            'cod_centro_custo' => $dadosTitulo['cod_centro_custo'],
            'cod_conta_contabil' => $dadosTitulo['cod_conta_contabil'],
            'cod_emitente' => $dadosTitulo['cod_emitente'],
            'data_competencia' => $dadosTitulo['data_competencia'],
            'data_vencimento' => $dadosTitulo['data_vencimento'],
            'data_confirmacao' => $extrato->data_movimento,
            'tipo_movimento' => $tipoMovimento,
            'parcela' => '1/1',
            'desc_movimento' => $dadosTitulo['desc_movimento'],
            'valor_titulo' => abs((float)$extrato->valor),
            'valor_desc_taxa' => 0,
            'valor_juros_multa' => 0,
            'valor_confirmado' => abs((float)$extrato->valor),
            'confirmado' => 1,
            'usuario_criacao' => getDadosUsuarioLogado()['email'],
            'usuario_liquidacao' => getDadosUsuarioLogado()['email']
        );

        $this->db->trans_start();
        $codMovimento = $this->insertMovimentoConta($movimento);
        $this->db->insert('conciliacao_vinculo', array(
            'id_extrato' => $idExtrato,
            'cod_movimento_conta' => $codMovimento,
            'valor_conciliado' => abs((float)$extrato->valor),
            'movimento_confirmado_conciliacao' => 1,
            'cod_conta_anterior' => null,
            'data_conciliacao' => date('Y-m-d H:i:s'),
            'usuario_conciliacao' => getDadosUsuarioLogado()['email']
        ));
        $this->db->where('id_extrato', $idExtrato)->update('conciliacao_extrato', array('status' => 'conciliado'));
        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    public function desfazerConciliacaoExtrato($codConta, $idExtrato){
        $this->db->select('e.id_extrato, v.cod_movimento_conta, v.movimento_confirmado_conciliacao, v.cod_conta_anterior');
        $this->db->from('conciliacao_extrato e');
        $this->db->join('conta c', 'c.cod_conta = e.cod_conta');
        $this->db->join('conciliacao_vinculo v', 'v.id_extrato = e.id_extrato');
        $this->db->where('c.id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('e.cod_conta', $codConta);
        $this->db->where('e.id_extrato', $idExtrato);
        $vinculo = $this->db->get()->row();
        if($vinculo === null) return false;
        $this->db->trans_start();
        if($vinculo->movimento_confirmado_conciliacao == 1){
            $this->updateMovimentoConta($vinculo->cod_movimento_conta, array(
                'cod_conta' => $vinculo->cod_conta_anterior,
                'data_confirmacao' => null,
                'valor_confirmado' => 0,
                'confirmado' => 0,
                'usuario_liquidacao' => null
            ));
        }
        $this->db->where('id_extrato', $idExtrato)->delete('conciliacao_vinculo');
        $this->db->where('id_extrato', $idExtrato)->update('conciliacao_extrato', array('status' => 'pendente'));
        $this->db->trans_complete();
        return $this->db->trans_status();
    }

}
