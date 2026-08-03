<?php

class Vendas extends CI_Model{

    public function insertPedidoVenda($pedidoVenda){
        $this->db->insert('pedido_venda', $pedidoVenda);

        return $this->db->insert_id();
    }

    public function insertProdutoVenda($produtoVenda){
        $this->db->insert('produto_venda', $produtoVenda);

        if($this->db->error() <> null){
            return $this->db->error();
        }

        return null;
    }

    public function insertFaturamento($faturamentoPedido){
        $this->db->insert('faturamento_pedido', $faturamentoPedido);

        return $this->db->insert_id();
    }

    public function inserirControleCaixa($controleCaixa){
        $this->db->insert('controle_caixa', $controleCaixa);
    }

    public function inserirNotaCliente($notaCliente){
        $this->db->insert('notas_cliente', $notaCliente);
    }

    public function inserirMovimentoCaixa($movimentoCaixa){
        $this->db->insert('movimentos_frente_caixa', $movimentoCaixa);

        return $this->db->insert_id();
    }

    public function inserirVendaCaixa($vendaCaixa){
        $this->db->insert('venda_caixa', $vendaCaixa);

        return $this->db->insert_id();
    }

    public function inserirProdutosCaixa($produtoVenda){
        $this->db->insert_batch('produto_venda_caixa', $produtoVenda);

        return $this->db->insert_id();
    }

    public function inserirFormaPagamentoCaixa($formaPagamento){
        $this->db->insert_batch('metodo_pagamento_venda_caixa', $formaPagamento);

        return $this->db->insert_id();
    }

    /**
     * @todo !!!Tabela criada para atender ao faturamento de itens conforme detalhado em conversa workana dia 02-03/06/2022!!!
     * @param array $data
     * @return int
     */
    public function inserirProdutoVendaFaturamento($data){
        $this->db->insert('faturamento_pedido_produto', $data);
        return $this->db->insert_id();
    }

    /*public function insertMovimentos($movimentosProduto){
        $this->db->insert('movimentos_produto_venda', $movimentosProduto);
        $codMovimentoPV = $this->db->insert_id();

        $produtoVenda = $this->getProdutoVendaPorCodigo($movimentosProduto['seq_produto_venda']);

        if($produtoVenda->quant_atendida > 0){
            if(($produtoVenda->quant_atendida + $movimentosProduto['quant_saida']) >= $produtoVenda->quant_pedida) {
                $status = 3;
            }else{
                $status = 2;
            }
        }else{
            if($movimentosProduto['quant_saida'] >= $produtoVenda->quant_pedida) {
                $status = 3;
            }else{
                $status = 2;
            }
        }

        $dados = [
            'quant_atendida' => $produtoVenda->quant_atendida + $movimentosProduto['quant_saida'],
            'status' => $status
        ];

        $this->venda->updateProdutoVenda($movimentosProduto['seq_produto_venda'], $dados);

        return $codMovimentoPV;

    }*/

    public function updateNotaCliente($codNotaCliente, $notaCliente){
        $this->db->where('cod_nota_cliente', $codNotaCliente);
        $this->db->update('notas_cliente', $notaCliente);
    }

    public function updatePedidoVenda($numPedidoVenda, $pedidovenda){
        $this->db->where('num_pedido_venda', $numPedidoVenda);
        $this->db->update('pedido_venda', $pedidovenda);
    }

    public function updateControleCaixa($datacaixa, $controleCaixa){
        $this->db->where('id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('data_caixa', $datacaixa);
        $this->db->update('controle_caixa', $controleCaixa);
    }

    public function updateVendaCaixa($numVendaCaixa, $vendaCaixa){
        $this->db->where('num_venda_caixa', $numVendaCaixa);
        $this->db->update('venda_caixa', $vendaCaixa);
    }

    public function updateProdutoVenda($seqProdutoVenda, $produtovenda){
        $this->db->where('seq_produto_venda', $seqProdutoVenda);
        $this->db->update('produto_venda', $produtovenda);
    }

    public function updateFaturamento($codFaturamento, $faturamento){
        $this->db->where('cod_faturamento_pedido', $codFaturamento);
        $this->db->update('faturamento_pedido', $faturamento);
    }

    public function updateMovimento($codMovimento, $movimento){
        $this->db->where('cod_movimento_pv', $codMovimento);
        $this->db->update('movimentos_produto_venda', $movimento);
    }

    public function deleteProdutoVenda($SeqProdutoVenda) {
        $this->db->where_in('seq_produto_venda',$SeqProdutoVenda)->delete('produto_venda');
    }

    public function deleteNota($codNota) {
        $this->db->where_in('cod_nota_cliente',$codNota)->delete('notas_cliente');
    }

    public function deleteProdutoVendaPorPedido($NumPedidoVenda) {
        $this->db->where_in('num_pedido_venda',$NumPedidoVenda)->delete('produto_venda');
    }

    public function deletePedido($NumPedidoVenda) {
        $this->db->where_in('num_pedido_venda',$NumPedidoVenda)->delete('pedido_venda');
    }

    public function deleteProdutoVendaCaixa($numVendaCaixa) {
        $this->db->where_in('num_venda_caixa',$numVendaCaixa)->delete('produto_venda_caixa');
    }

    public function deleteFormaPagamento($numVendaCaixa) {
        $this->db->where_in('num_venda_caixa',$numVendaCaixa)->delete('metodo_pagamento_venda_caixa');
    }

    public function deleteVendaCaixa($numVendaCaixa) {
        $this->db->where_in('num_venda_caixa',$numVendaCaixa)->delete('venda_caixa');
    }

    public function deleteMovimentoCaixa($numVendaCaixa) {
        $this->db->where_in('cod_movimento_frente_caixa',$numVendaCaixa)->delete('movimentos_frente_caixa');
    }

    public function getPedidoVendaPorCodigo($numPedidoVenda){
        $this->db->where('pedido_venda.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('pedido_venda.*, cliente.nome_cliente, usuario.nome_usuario nome_usuario_erp, vendedor.nome_vendedor nome_usuario_app');
        $this->db->select('(select sum(produto_venda.quant_atendida)
                              from produto_venda
                             where produto_venda.num_pedido_venda = pedido_venda.num_pedido_venda) quant_atendida');
        $this->db->select('(select sum(produto_venda.quant_pedida * produto_venda.valor_unitario) 
                             from produto_venda
                            where produto_venda.num_pedido_venda = pedido_venda.num_pedido_venda) valor_total_pedido');
        $this->db->from('pedido_venda');
        $this->db->join('cliente', 'cliente.cod_cliente = pedido_venda.cod_cliente');
        $this->db->join('usuario', 'usuario.email = pedido_venda.usuario_erp', 'left');
        $this->db->join('vendedor', 'vendedor.nome_usuario = pedido_venda.usuario_app', 'left');
        $this->db->where('pedido_venda.num_pedido_venda', $numPedidoVenda);

        return $query = $this->db->get()->row();

    }

    public function getPedidoPorDataEntrega($dataInicio, $dataFim){
        $this->db->where('pedido_venda.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('pedido_venda.*');
        $this->db->select('(select sum(produto_venda.quant_atendida)
                              from produto_venda
                             where produto_venda.num_pedido_venda = pedido_venda.num_pedido_venda) quant_atendida');
        $this->db->from('pedido_venda');
        $this->db->where('pedido_venda.data_entrega >=', $dataInicio);
        $this->db->where('pedido_venda.data_entrega <=', $dataFim);
        $this->db->where('pedido_venda.situacao', 3);

        return $this->db->get()->result();

    }

    public function getControleCaixaPorCodigo($dataVenda){
        $this->db->where('controle_caixa.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('controle_caixa.*');
        $this->db->select('metodo_pagamento.*');
        $this->db->select('(select sum(movimentos_frente_caixa.valor_movimento)
                              from movimentos_frente_caixa
                             where movimentos_frente_caixa.data_caixa = controle_caixa.data_caixa
                               and movimentos_frente_caixa.id_empresa = empresa.id_empresa
                               and movimentos_frente_caixa.tipo_movimento = 2) total_recolhimento');
        $this->db->select('(select sum(movimentos_frente_caixa.valor_movimento)
                              from movimentos_frente_caixa
                             where movimentos_frente_caixa.data_caixa = controle_caixa.data_caixa
                               and movimentos_frente_caixa.id_empresa = empresa.id_empresa
                               and movimentos_frente_caixa.tipo_movimento = 1) total_incremento');
        $this->db->select('(select sum(metodo_pagamento_venda_caixa.valor_pagamento) 
                             from venda_caixa
                             join metodo_pagamento_venda_caixa on metodo_pagamento_venda_caixa.num_venda_caixa = venda_caixa.num_venda_caixa
                            where venda_caixa.data_caixa = controle_caixa.data_caixa
                              and venda_caixa.id_empresa = empresa.id_empresa
                              and venda_caixa.status = 2
                              and metodo_pagamento_venda_caixa.cod_metodo_pagamento = empresa.metodo_pagamento_frente_caixa) total_venda');
        $this->db->select('(select sum(venda_caixa.valor_bruto) 
                             from venda_caixa
                            where venda_caixa.data_caixa = controle_caixa.data_caixa
                              and venda_caixa.id_empresa = controle_caixa.id_empresa
                              and venda_caixa.status = 2) total_produto');
        $this->db->select('(select sum(venda_caixa.valor_frete) 
                             from venda_caixa
                            where venda_caixa.data_caixa = controle_caixa.data_caixa
                              and venda_caixa.id_empresa = controle_caixa.id_empresa
                              and venda_caixa.status = 2) total_frete');
        $this->db->select('(select sum(if(venda_caixa.valor_desconto > 0, (if(venda_caixa.tipo_desconto = 1, venda_caixa.valor_desconto, venda_caixa.valor_bruto * (venda_caixa.valor_desconto / 100))), 0)) 
                             from venda_caixa
                            where venda_caixa.data_caixa = controle_caixa.data_caixa
                              and venda_caixa.id_empresa = controle_caixa.id_empresa
                              and venda_caixa.status = 2) total_desconto');
        $this->db->from('controle_caixa');
        $this->db->join('empresa', 'empresa.id_empresa = controle_caixa.id_empresa');
        $this->db->join('metodo_pagamento', 'metodo_pagamento.cod_metodo_pagamento = empresa.metodo_pagamento_frente_caixa', 'left');
        $this->db->where('controle_caixa.data_caixa', $dataVenda);

        return $this->db->get()->row();

    }

    public function getCaixaAberto(){
        $this->db->where('controle_caixa.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('controle_caixa.*');
        $this->db->from('controle_caixa');
        $this->db->where('controle_caixa.data_hora_fechamento is null');
        $this->db->where('controle_caixa.data_hora_abertura is not null');
        $this->db->limit(1);

        return $this->db->get()->row();

    }

    public function getVendaPorCodigoVendasExternas($codVendasExternas){
        $this->db->where('pedido_venda.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('pedido_venda.*');
        $this->db->from('pedido_venda');
        $this->db->where('pedido_venda.cod_vendas_externas', $codVendasExternas);

        return $query = $this->db->get()->row();

    }

    public function getNotaPorCodigo($codNotaCliente){

        $this->db->select('notas_cliente.*');
        $this->db->from('notas_cliente');
        $this->db->where('notas_cliente.cod_nota_cliente', $codNotaCliente);

        return $query = $this->db->get()->row();

    }

    public function getValVendaClienteporCodigo($CodCliente){

        // Pedidos aprovados
        $this->db->select('(select count(*) 
                              from pedido_venda
                              where pedido_venda.cod_cliente = ' . $CodCliente . '
                                and pedido_venda.situacao    = 3) quant_pedido_aprov');
        $this->db->select('(select sum(produto_venda.quant_pedida * produto_venda.valor_unitario) 
                              from produto_venda
                             inner join pedido_venda on pedido_venda.num_pedido_venda = produto_venda.num_pedido_venda
                             where pedido_venda.cod_cliente = ' . $CodCliente . '
                               and pedido_venda.situacao    = 3) total_pedido_aprov');

        $this->db->select('(select sum(faturamento_pedido.valor_bruto +
                                       faturamento_pedido.valor_frete +
                                       faturamento_pedido.valor_seguro + 
                                       faturamento_pedido.outras_despesas -   
                                       faturamento_pedido.valor_desconto) 
                             from faturamento_pedido
                       inner join pedido_venda on pedido_venda.num_pedido_venda = faturamento_pedido.num_pedido_venda
                            where faturamento_pedido.estornado = 0
                              and pedido_venda.cod_cliente = ' . $CodCliente . ') valor_total_faturado');
        $this->db->select('(select sum(movimentos_conta.valor_titulo) 
                             from movimentos_conta
                            where movimentos_conta.tipo_movimento = 1
                              and movimentos_conta.cod_emitente = ' . $CodCliente . ') valor_total_titulo');
        $this->db->select('(select sum(movimentos_conta.valor_titulo) 
                             from movimentos_conta
                            where movimentos_conta.confirmado = 0
                              and movimentos_conta.tipo_movimento = 1
                              and movimentos_conta.cod_emitente = ' . $CodCliente . ') valor_titulo_pendente');


        return $query = $this->db->get()->row();

    }

    public function getPedidoVendaAprovPorCodigo($numPedidoVenda){
        $this->db->where('pedido_venda.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('pedido_venda.*, cliente.nome_cliente, cliente.razao_social, cliente.tipo_pessoa, a.nome_vendedor, transportador.nome_transportador, usuario.nome_usuario nome_usuario_erp, b.nome_vendedor nome_usuario_app');
        $this->db->select('pedido_venda.valor_frete');
        $this->db->select('if(pedido_venda.tipo_desconto = 1, pedido_venda.valor_desconto, 
                                 (select sum(produto_venda.quant_pedida * produto_venda.valor_unitario) 
                                    from produto_venda
                                   where produto_venda.num_pedido_venda = pedido_venda.num_pedido_venda) * (pedido_venda.valor_desconto / 100)) valor_desconto_con');
        $this->db->select('(select sum(produto_venda.quant_pedida * produto_venda.valor_unitario) 
                             from produto_venda
                            where produto_venda.num_pedido_venda = pedido_venda.num_pedido_venda) valor_pedido');
        $this->db->select('(select sum(faturamento_pedido.valor_bruto +
                                       faturamento_pedido.valor_frete +
                                       faturamento_pedido.valor_seguro + 
                                       faturamento_pedido.outras_despesas -   
                                       faturamento_pedido.valor_desconto) 
                             from faturamento_pedido
                            where faturamento_pedido.num_pedido_venda = pedido_venda.num_pedido_venda
                              and faturamento_pedido.estornado = 0) valor_total_faturado');
        $this->db->select('(select sum(produto_venda.valor_unitario * (produto_venda.quant_pedida - produto_venda.quant_atendida))
                              from produto_venda
                             where produto_venda.num_pedido_venda = pedido_venda.num_pedido_venda) valor_pendente');
        $this->db->from('pedido_venda');
        $this->db->join('cliente', 'cliente.cod_cliente = pedido_venda.cod_cliente');
        $this->db->join('vendedor a', 'a.cod_vendedor = pedido_venda.cod_vendedor', 'left');
        $this->db->join('transportador', 'transportador.cod_transportador = pedido_venda.cod_transportador', 'left');
        $this->db->join('usuario', 'usuario.email = pedido_venda.usuario_erp', 'left');
        $this->db->join('vendedor b', 'b.nome_usuario = pedido_venda.usuario_app', 'left');
        $this->db->where('pedido_venda.num_pedido_venda', $numPedidoVenda);

        return $query = $this->db->get()->row();

    }

    public function getProdutoPorPedido($numPedidoVenda){
        $this->db->where('produto.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('produto_venda.*, produto.nome_produto, produto.cod_unidade_medida, produto.custo_medio, produto.preco_venda, 
                           produto.saldo_negativo, produto.quant_estoq, tipo_produto.nome_tipo_produto, produto.tipo_controle');
        $this->db->from('produto_venda');
        $this->db->join('produto', 'produto.cod_produto = produto_venda.cod_produto');
        $this->db->join('tipo_produto', 'tipo_produto.cod_tipo_produto = produto.cod_tipo_produto');
        $this->db->where('produto_venda.num_pedido_venda', $numPedidoVenda);

        return $query = $this->db->get()->result();

    }    

    public function getLotesPorProdutoVenda($produto_venda){
        $this->db->where('produto_lote.id_empresa', getDadosUsuarioLogado()['id_empresa']); 

        $this->db->select('produto_lote.*');
        $this->db->from('produto_lote');
        $this->db->where('produto_lote.data_validade >= CURRENT_DATE()');
        
        if($produto_venda != null){
            $this->db->group_start();
            foreach($produto_venda as $key_produto => $produto) {
                $this->db->or_where('produto_lote.cod_produto', $produto->cod_produto);
            }
            $this->db->group_end(); 
        }

        $this->db->order_by('produto_lote.data_validade', 'asc');

        return $query = $this->db->get()->result();
    }

    public function getProdutoPorVendaCaixa($numVendaCaixa){
        $this->db->where('venda_caixa.id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('produto.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('produto_venda_caixa.*, produto.nome_produto, produto.cod_gtin, produto.cod_unidade_medida, produto.cod_ncm, produto.cod_origem, produto.tipo_controle');
        $this->db->select('ncm.percentual_ipi');

        $this->db->from('produto_venda_caixa');
        $this->db->join('venda_caixa', 'venda_caixa.num_venda_caixa = produto_venda_caixa.num_venda_caixa');        
        $this->db->join('produto', 'produto.cod_produto = produto_venda_caixa.cod_produto');
        $this->db->join('ncm', 'ncm.cod_ncm = produto.cod_ncm','left');
        $this->db->where('produto_venda_caixa.num_venda_caixa', $numVendaCaixa);

        return $query = $this->db->get()->result();

    }

    public function getMetodoPagamentoPorVendaCaixa($numVendaCaixa){
        $this->db->where('venda_caixa.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('metodo_pagamento_venda_caixa.*, metodo_pagamento.nome_metodo_pagamento');
        $this->db->from('metodo_pagamento_venda_caixa');
        $this->db->join('venda_caixa', 'venda_caixa.num_venda_caixa = metodo_pagamento_venda_caixa.num_venda_caixa');
        $this->db->join('metodo_pagamento', 'metodo_pagamento.cod_metodo_pagamento = metodo_pagamento_venda_caixa.cod_metodo_pagamento');
        $this->db->where('metodo_pagamento_venda_caixa.num_venda_caixa', $numVendaCaixa);

        return $this->db->get()->result();

    }

    public function getMetodoPagamentoPorDataCaixa($dataCaixa){
        $this->db->where('venda_caixa.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('venda_caixa.data_caixa, metodo_pagamento_venda_caixa.cod_metodo_pagamento, metodo_pagamento.nome_metodo_pagamento,empresa.metodo_pagamento_frente_caixa');
        $this->db->select('metodo_pagamento.nome_metodo_pagamento, metodo_pagamento.dias_recebimento, metodo_pagamento.taxa_operacao, metodo_pagamento.cod_conta');
        $this->db->select('sum(metodo_pagamento_venda_caixa.valor_pagamento) total_venda');
        $this->db->from('metodo_pagamento_venda_caixa');
        $this->db->join('metodo_pagamento', 'metodo_pagamento.cod_metodo_pagamento = metodo_pagamento_venda_caixa.cod_metodo_pagamento');
        $this->db->join('venda_caixa', 'venda_caixa.num_venda_caixa = metodo_pagamento_venda_caixa.num_venda_caixa');        
        $this->db->join('empresa', 'empresa.id_empresa = venda_caixa.id_empresa');
        $this->db->where('venda_caixa.status', '2');
        $this->db->where('venda_caixa.data_caixa', $dataCaixa);
        $this->db->group_by('metodo_pagamento_venda_caixa.cod_metodo_pagamento');

        return $query = $this->db->get()->result();

    }

    public function getMetodoPagamentoPorDataCaixaImp($dataCaixa){
        $this->db->where('venda_caixa.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('venda_caixa.data_caixa, metodo_pagamento_venda_caixa.cod_metodo_pagamento, metodo_pagamento.nome_metodo_pagamento,empresa.metodo_pagamento_frente_caixa');
        $this->db->select('metodo_pagamento.nome_metodo_pagamento, metodo_pagamento.dias_recebimento, metodo_pagamento.taxa_operacao, metodo_pagamento.cod_conta');
        $this->db->select('sum(metodo_pagamento_venda_caixa.valor_pagamento) total_venda');
        $this->db->from('metodo_pagamento_venda_caixa');
        $this->db->join('metodo_pagamento', 'metodo_pagamento.cod_metodo_pagamento = metodo_pagamento_venda_caixa.cod_metodo_pagamento');
        $this->db->join('venda_caixa', 'venda_caixa.num_venda_caixa = metodo_pagamento_venda_caixa.num_venda_caixa');        
        $this->db->join('empresa', 'empresa.id_empresa = venda_caixa.id_empresa');
        $this->db->where('venda_caixa.status', '2');
        $this->db->where('venda_caixa.data_caixa', $dataCaixa);
        $this->db->group_by('metodo_pagamento_venda_caixa.cod_metodo_pagamento');

        return $query = $this->db->get()->result();

    }

    public function getProdutoPorDataCaixa($dataCaixa){
        $this->db->where('venda_caixa.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('produto_venda_caixa.cod_produto');
        $this->db->select('produto.nome_produto, tipo_produto.nome_tipo_produto, sum(produto_venda_caixa.quant_venda) quant_venda');
        $this->db->select('sum(produto_venda_caixa.quant_venda * produto_venda_caixa.valor_unit) total_venda');
        $this->db->from('produto_venda_caixa');
        $this->db->join('produto', 'produto.cod_produto = produto_venda_caixa.cod_produto');
        $this->db->join('tipo_produto', 'tipo_produto.cod_tipo_produto = produto.cod_tipo_produto');
        $this->db->join('venda_caixa', 'venda_caixa.num_venda_caixa = produto_venda_caixa.num_venda_caixa');
        $this->db->where('venda_caixa.status', '2');
        $this->db->where('venda_caixa.data_caixa', $dataCaixa);
        $this->db->group_by('produto_venda_caixa.cod_produto');
        $this->db->order_by('total_venda', 'desc');

        return $query = $this->db->get()->result();

    }

    public function getVendaCaixa($dataCaixa){
        $this->db->where('venda_caixa.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('venda_caixa.*, cliente.nome_cliente');
        $this->db->select('(select sum(metodo_pagamento_venda_caixa.valor_pagamento) 
                             from metodo_pagamento_venda_caixa
                            where metodo_pagamento_venda_caixa.num_venda_caixa = venda_caixa.num_venda_caixa) valor_total_pedido');
        $this->db->select('(select sum(metodo_pagamento_venda_caixa.valor_pagamento) 
                             from metodo_pagamento_venda_caixa
                            where metodo_pagamento_venda_caixa.num_venda_caixa = venda_caixa.num_venda_caixa
                              and metodo_pagamento_venda_caixa.cod_metodo_pagamento = empresa.metodo_pagamento_frente_caixa)  valor_dinheiro_pedido');
        $this->db->select('tb_fat_nota_fiscal.c_stat, tb_fat_nota_fiscal.chave, tb_fat_nota_fiscal.id as nf_id');
        $this->db->select('tb_fat_nota_fiscal.serie, tb_fat_nota_fiscal.numero');
        $this->db->from('venda_caixa');
        $this->db->join('cliente', 'cliente.cod_cliente = venda_caixa.cod_cliente', 'left');
        $this->db->join('empresa', 'empresa.id_empresa = venda_caixa.id_empresa');
        $this->db->join('tb_fat_nota_fiscal', 'tb_fat_nota_fiscal.cod_faturamento_pedido = venda_caixa.num_venda_caixa and tb_fat_nota_fiscal.c_stat = "100" and tb_fat_nota_fiscal.modelo = empresa.modelo_nfce', 'left');
        $this->db->where('venda_caixa.data_caixa', $dataCaixa);

        return $query = $this->db->get()->result();

        

    }

    public function getNFVendaCaixa($numVendaCaixa){
        $this->db->where('venda_caixa.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('venda_caixa.*');
        $this->db->select('tb_fat_nota_fiscal.c_stat, tb_fat_nota_fiscal.chave, tb_fat_nota_fiscal.id as nf_id');
        $this->db->select('tb_fat_nota_fiscal.serie, tb_fat_nota_fiscal.numero');
        $this->db->from('venda_caixa');
        $this->db->join('tb_fat_nota_fiscal', 'tb_fat_nota_fiscal.cod_faturamento_pedido = venda_caixa.num_venda_caixa and (tb_fat_nota_fiscal.c_stat > 200 or tb_fat_nota_fiscal.c_stat is null)');
        $this->db->where('venda_caixa.num_venda_caixa', $numVendaCaixa);
        $this->db->limit(1);

        return $query = $this->db->get()->row();



    }

    public function getVendasSalvas($dataCaixa){
        $this->db->where('venda_caixa.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('venda_caixa.*');
        $this->db->from('venda_caixa');
        $this->db->where('venda_caixa.data_caixa', $dataCaixa);
        $this->db->where('venda_caixa.status', '1');

        return $this->db->get()->result();

    }

    public function getMovimentoCaixa($dataCaixa){
        $this->db->where('movimentos_frente_caixa.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('movimentos_frente_caixa.*');
        $this->db->from('movimentos_frente_caixa');
        $this->db->where('movimentos_frente_caixa.data_caixa', $dataCaixa);

        return $query = $this->db->get()->result();

    }

    public function getPedidoVenda($dataInicio, $dataFim, $filter = "", $clienteFiltro = "", $vendedorFiltro = "", $transportadorFiltro = "", $statusFiltro = ""){
        $this->db->where('pedido_venda.id_empresa', getDadosUsuarioLogado()['id_empresa']);


        //Join para pegar todas informações relativas à estrutura
        $this->db->select('pedido_venda.*, cliente.nome_cliente, vendedor.nome_vendedor');
        $this->db->select('pedido_venda.valor_frete');
        $this->db->select('pedido_venda.valor_seguro');
        $this->db->select('pedido_venda.outras_despesas');
        $this->db->select('(select sum(produto_venda.quant_pedida * produto_venda.valor_unitario) 
                             from produto_venda
                            where produto_venda.num_pedido_venda = pedido_venda.num_pedido_venda) valor_total_pedido');
        $this->db->select('if(pedido_venda.tipo_desconto = 1, pedido_venda.valor_desconto, 
                                 (select sum(produto_venda.quant_pedida * produto_venda.valor_unitario) 
                                    from produto_venda
                                   where produto_venda.num_pedido_venda = pedido_venda.num_pedido_venda) * (pedido_venda.valor_desconto / 100)) valor_desconto');
        $this->db->select('(select count(*)
                            from faturamento_pedido
                           where faturamento_pedido.num_pedido_venda = pedido_venda.num_pedido_venda) count_faturamento');
        $this->db->from('pedido_venda');
        $this->db->join('cliente', 'cliente.cod_cliente = pedido_venda.cod_cliente');
        $this->db->join('vendedor', 'vendedor.cod_vendedor = pedido_venda.cod_vendedor', 'left');
        $this->db->order_by('pedido_venda.data_emissao', 'desc');

        if($filter <> ""){
            $this->db->group_start();
            $this->db->or_like('num_pedido_venda' ,$filter);
            $this->db->or_like('pedido_venda.cod_cliente' ,$filter);
            $this->db->or_like('nome_cliente' ,$filter);
            $this->db->or_like('nome_vendedor' ,$filter);
            $this->db->group_end();

        }else{
            $this->db->where('pedido_venda.data_emissao >= ', $dataInicio); 
            $this->db->where('pedido_venda.data_emissao <= ', $dataFim); 
        }

        if($clienteFiltro != ""){
            $this->db->where_in('pedido_venda.cod_cliente', $clienteFiltro);
        }
        if($statusFiltro != ""){
            $this->db->where_in('pedido_venda.situacao', $statusFiltro);
        }
        if($vendedorFiltro != ""){
            $this->db->where_in('pedido_venda.cod_vendedor', $vendedorFiltro);
        }
        if($transportadorFiltro != ""){
            $this->db->where_in('pedido_venda.cod_transportador', $transportadorFiltro);
        }

        return $query = $this->db->get()->result();

    }

    public function getPedidoVendaPorCliente($codCliente){
        $this->db->where('pedido_venda.id_empresa', getDadosUsuarioLogado()['id_empresa']);


        //Join para pegar todas informações relativas à estrutura
        $this->db->select('pedido_venda.*, cliente.nome_cliente, vendedor.nome_vendedor');
        $this->db->select('pedido_venda.valor_frete');
        $this->db->select('pedido_venda.valor_seguro');
        $this->db->select('pedido_venda.outras_despesas');
        $this->db->select('usuario.nome_usuario');
        $this->db->select('transportador.nome_transportador');
        $this->db->select('(select sum(produto_venda.quant_pedida * produto_venda.valor_unitario) 
                             from produto_venda
                            where produto_venda.num_pedido_venda = pedido_venda.num_pedido_venda) valor_total_pedido');
        $this->db->select('if(pedido_venda.tipo_desconto = 1, pedido_venda.valor_desconto, 
                                 (select sum(produto_venda.quant_pedida * produto_venda.valor_unitario) 
                                    from produto_venda
                                   where produto_venda.num_pedido_venda = pedido_venda.num_pedido_venda) * (pedido_venda.valor_desconto / 100)) valor_desconto');
        $this->db->select('(select sum(faturamento_pedido.valor_bruto +
                                       faturamento_pedido.valor_frete +
                                       faturamento_pedido.valor_seguro + 
                                       faturamento_pedido.outras_despesas -   
                                       faturamento_pedido.valor_desconto)
                              from faturamento_pedido
                             where faturamento_pedido.num_pedido_venda = pedido_venda.num_pedido_venda
                               and faturamento_pedido.estornado = 0) valor_total_faturado');
        $this->db->from('pedido_venda');
        $this->db->join('cliente', 'cliente.cod_cliente = pedido_venda.cod_cliente');
        $this->db->join('transportador', 'transportador.cod_transportador = pedido_venda.cod_transportador', 'left');
        $this->db->join('vendedor', 'vendedor.cod_vendedor = pedido_venda.cod_vendedor', 'left');
        $this->db->join('usuario', 'usuario.email = pedido_venda.usuario_erp', 'left');
        $this->db->where('pedido_venda.cod_cliente', $codCliente); 
        $this->db->order_by('pedido_venda.data_emissao', 'desc');
        

        return $query = $this->db->get()->result();
    }

    public function getProdutoPorCliente($codCliente){
        $this->db->where('produto.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('produto_venda.*, produto.nome_produto, produto.cod_unidade_medida, 
                           produto.saldo_negativo, produto.quant_estoq, tipo_produto.nome_tipo_produto, produto.tipo_controle');
        $this->db->from('produto_venda');
        $this->db->join('pedido_venda', 'pedido_venda.num_pedido_venda = produto_venda.num_pedido_venda');
        $this->db->join('produto', 'produto.cod_produto = produto_venda.cod_produto');
        $this->db->join('tipo_produto', 'tipo_produto.cod_tipo_produto = produto.cod_tipo_produto');
        $this->db->where('pedido_venda.cod_cliente', $codCliente);

        return $query = $this->db->get()->result();

    }

    public function getProdutoPorVendedor($codVendedor){
        $this->db->where('produto.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('produto_venda.*, produto.nome_produto, produto.cod_unidade_medida, 
                           produto.saldo_negativo, produto.quant_estoq, tipo_produto.nome_tipo_produto, produto.tipo_controle');
        $this->db->from('produto_venda');
        $this->db->join('pedido_venda', 'pedido_venda.num_pedido_venda = produto_venda.num_pedido_venda');
        $this->db->join('produto', 'produto.cod_produto = produto_venda.cod_produto');
        $this->db->join('tipo_produto', 'tipo_produto.cod_tipo_produto = produto.cod_tipo_produto');
        $this->db->where('pedido_venda.cod_vendedor', $codVendedor);

        return $query = $this->db->get()->result();

    }

    public function getPedidoVendaOrdemProducao(){
        $this->db->where('pedido_venda.id_empresa', getDadosUsuarioLogado()['id_empresa']);


        //Join para pegar todas informações relativas à estrutura
        $this->db->select('pedido_venda.*, cliente.nome_cliente');
        $this->db->from('pedido_venda');
        $this->db->join('cliente', 'cliente.cod_cliente = pedido_venda.cod_cliente');
        $this->db->order_by('pedido_venda.data_entrega', 'desc');

        $this->db->where('pedido_venda.situacao', 3); 

        return $query = $this->db->get()->result();

    }

    public function getVendaConfirmada($dataInicio, $dataFim){
        $this->db->where('pedido_venda.id_empresa', getDadosUsuarioLogado()['id_empresa']);


        //Join para pegar todas informações relativas à estrutura
        $this->db->select('sum(pedido_venda.valor_frete) total_frete');
        $this->db->select('sum(pedido_venda.valor_seguro) total_seguro');
        $this->db->select('sum(pedido_venda.outras_despesas) total_outras_despesas');
        $this->db->select('sum((select sum(produto_venda.quant_pedida * produto_venda.valor_unitario) 
                             from produto_venda
                            where produto_venda.num_pedido_venda = pedido_venda.num_pedido_venda)) valor_total_pedido');
        $this->db->select('sum(if(pedido_venda.tipo_desconto = 1, pedido_venda.valor_desconto, 
                                 (select sum(produto_venda.quant_pedida * produto_venda.valor_unitario) 
                                    from produto_venda
                                   where produto_venda.num_pedido_venda = pedido_venda.num_pedido_venda) * (pedido_venda.valor_desconto / 100))) total_desconto');
        $this->db->from('pedido_venda');
        $this->db->join('cliente', 'cliente.cod_cliente = pedido_venda.cod_cliente');
        $this->db->where('pedido_venda.situacao', '3');

        $this->db->where('pedido_venda.data_emissao >= ', $dataInicio); 
        $this->db->where('pedido_venda.data_emissao <= ', $dataFim); 

        return $query = $this->db->get()->row();

    }

    public function getVendaEmOrcamento($dataInicio, $dataFim){
        $this->db->where('pedido_venda.id_empresa', getDadosUsuarioLogado()['id_empresa']);


        //Join para pegar todas informações relativas à estrutura
        $this->db->select('sum(pedido_venda.valor_frete) total_frete');
        $this->db->select('sum(pedido_venda.valor_seguro) total_seguro');
        $this->db->select('sum(pedido_venda.outras_despesas) total_outras_despesas');
        $this->db->select('sum((select sum(produto_venda.quant_pedida * produto_venda.valor_unitario) 
                             from produto_venda
                            where produto_venda.num_pedido_venda = pedido_venda.num_pedido_venda)) valor_total_pedido');
        $this->db->select('sum(if(pedido_venda.tipo_desconto = 1, pedido_venda.valor_desconto, 
                                 (select sum(produto_venda.quant_pedida * produto_venda.valor_unitario) 
                                    from produto_venda
                                   where produto_venda.num_pedido_venda = pedido_venda.num_pedido_venda) * (pedido_venda.valor_desconto / 100))) total_desconto');
        $this->db->from('pedido_venda');
        $this->db->join('cliente', 'cliente.cod_cliente = pedido_venda.cod_cliente');
        $this->db->where('pedido_venda.situacao', '1');

        $this->db->where('pedido_venda.data_emissao >= ', $dataInicio); 
        $this->db->where('pedido_venda.data_emissao <= ', $dataFim); 

        return $query = $this->db->get()->row();

    }

    public function getVendaReprovado($dataInicio, $dataFim){
        $this->db->where('pedido_venda.id_empresa', getDadosUsuarioLogado()['id_empresa']);


        //Join para pegar todas informações relativas à estrutura
        $this->db->select('sum(pedido_venda.valor_frete) total_frete');
        $this->db->select('sum(pedido_venda.valor_seguro) total_seguro');
        $this->db->select('sum(pedido_venda.outras_despesas) total_outras_despesas');
        $this->db->select('sum((select sum(produto_venda.quant_pedida * produto_venda.valor_unitario) 
                             from produto_venda
                            where produto_venda.num_pedido_venda = pedido_venda.num_pedido_venda)) valor_total_pedido');
        $this->db->select('sum(if(pedido_venda.tipo_desconto = 1, pedido_venda.valor_desconto, 
                                 (select sum(produto_venda.quant_pedida * produto_venda.valor_unitario) 
                                    from produto_venda
                                   where produto_venda.num_pedido_venda = pedido_venda.num_pedido_venda) * (pedido_venda.valor_desconto / 100))) total_desconto');
        $this->db->from('pedido_venda');
        $this->db->join('cliente', 'cliente.cod_cliente = pedido_venda.cod_cliente');
        $this->db->where('pedido_venda.situacao', '2');

        $this->db->where('pedido_venda.data_emissao >= ', $dataInicio); 
        $this->db->where('pedido_venda.data_emissao <= ', $dataFim); 

        return $query = $this->db->get()->row();
        

    }

    public function getPedidoVendaPorVendedor($dataInicio, $dataFim, $filter = ""){
        $this->db->where('pedido_venda.id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('vendedor.nome_usuario', getDadosUsuarioLogado()['usuario']);

        //Join para pegar todas informações relativas à estrutura
        $this->db->select('pedido_venda.*, cliente.nome_cliente');
        $this->db->select('(select sum(produto_venda.quant_pedida * produto_venda.valor_unitario) 
                             from produto_venda
                            where produto_venda.num_pedido_venda = pedido_venda.num_pedido_venda) valor_total_pedido');
        $this->db->select('(select count(*)
                            from faturamento_pedido
                           where faturamento_pedido.num_pedido_venda = pedido_venda.num_pedido_venda) count_faturamento');
        $this->db->from('pedido_venda');
        $this->db->join('cliente', 'cliente.cod_cliente = pedido_venda.cod_cliente');
        $this->db->join('vendedor', 'vendedor.cod_vendedor = pedido_venda.cod_vendedor');
        $this->db->order_by('pedido_venda.data_entrega', 'desc');

        if($filter <> ""){
            $this->db->group_start();
            $this->db->or_like('num_pedido_venda' ,$filter);
            $this->db->or_like('pedido_venda.cod_cliente' ,$filter);
            $this->db->or_like('nome_cliente' ,$filter);
            $this->db->group_end();

        }else{
            $this->db->where('pedido_venda.data_emissao >= ', $dataInicio); 
            $this->db->where('pedido_venda.data_emissao <= ', $dataFim); 
        }

        return $query = $this->db->get()->result();

    }

    public function getPedidoVendaPorVendedorDetalhes($codVendedor){
        $this->db->where('pedido_venda.id_empresa', getDadosUsuarioLogado()['id_empresa']);


        //Join para pegar todas informações relativas à estrutura
        $this->db->select('pedido_venda.*, cliente.nome_cliente, vendedor.nome_vendedor');
        $this->db->select('pedido_venda.valor_frete');
        $this->db->select('pedido_venda.valor_seguro');
        $this->db->select('pedido_venda.outras_despesas');
        $this->db->select('usuario.nome_usuario');
        $this->db->select('transportador.nome_transportador');
        $this->db->select('(select sum(produto_venda.quant_pedida * produto_venda.valor_unitario) 
                             from produto_venda
                            where produto_venda.num_pedido_venda = pedido_venda.num_pedido_venda) valor_total_pedido');
        $this->db->select('if(pedido_venda.tipo_desconto = 1, pedido_venda.valor_desconto, 
                                 (select sum(produto_venda.quant_pedida * produto_venda.valor_unitario) 
                                    from produto_venda
                                   where produto_venda.num_pedido_venda = pedido_venda.num_pedido_venda) * (pedido_venda.valor_desconto / 100)) valor_desconto');
        $this->db->select('(select sum(faturamento_pedido.valor_bruto +
                                       faturamento_pedido.valor_frete +
                                       faturamento_pedido.valor_seguro + 
                                       faturamento_pedido.outras_despesas -   
                                       faturamento_pedido.valor_desconto)
                              from faturamento_pedido
                             where faturamento_pedido.num_pedido_venda = pedido_venda.num_pedido_venda
                               and faturamento_pedido.estornado = 0) valor_total_faturado');
        $this->db->from('pedido_venda');
        $this->db->join('cliente', 'cliente.cod_cliente = pedido_venda.cod_cliente');
        $this->db->join('transportador', 'transportador.cod_transportador = pedido_venda.cod_transportador', 'left');
        $this->db->join('vendedor', 'vendedor.cod_vendedor = pedido_venda.cod_vendedor', 'left');
        $this->db->join('usuario', 'usuario.email = pedido_venda.usuario_erp', 'left');
        $this->db->where('pedido_venda.cod_vendedor', $codVendedor); 
        $this->db->order_by('pedido_venda.data_entrega', 'desc');
        

        return $query = $this->db->get()->result();
    }

    public function getTotalVendaVendedor($dataInicio, $dataFim){

        $this->db->select("(select sum(produto_venda.valor_unitario * produto_venda.quant_pedida)
                              from produto_venda
                        inner join pedido_venda on pedido_venda.num_pedido_venda = produto_venda.num_pedido_venda
                        inner join vendedor     on vendedor.cod_vendedor         = pedido_venda.cod_vendedor
                             where pedido_venda.situacao = 3
                               and pedido_venda.data_entrega >= '" . $dataInicio . "'
                               and pedido_venda.data_entrega <= '" . $dataFim . "'
                               and vendedor.nome_usuario      = '" . getDadosUsuarioLogado()['usuario'] . "') total_confirmado");
        $this->db->select("(select sum(produto_venda.valor_unitario * produto_venda.quant_pedida)
                              from produto_venda
                        inner join pedido_venda on pedido_venda.num_pedido_venda = produto_venda.num_pedido_venda
                        inner join vendedor     on vendedor.cod_vendedor         = pedido_venda.cod_vendedor
                             where pedido_venda.situacao = 1
                               and pedido_venda.data_entrega >= '" . $dataInicio . "'
                               and pedido_venda.data_entrega <= '" . $dataFim . "'
                               and vendedor.nome_usuario      = '" . getDadosUsuarioLogado()['usuario'] . "') total_orcamento");
        $this->db->select("(select sum(produto_venda.valor_unitario * produto_venda.quant_pedida)
                              from produto_venda
                        inner join pedido_venda on pedido_venda.num_pedido_venda = produto_venda.num_pedido_venda
                        inner join vendedor     on vendedor.cod_vendedor         = pedido_venda.cod_vendedor
                             where pedido_venda.situacao = 2
                               and pedido_venda.data_entrega >= '" . $dataInicio . "'
                               and pedido_venda.data_entrega <= '" . $dataFim . "'
                               and vendedor.nome_usuario      = '" . getDadosUsuarioLogado()['usuario'] . "') total_declinado");

        return $query = $this->db->get()->row();

    }

    public function getPedidoVendaPendente(){
        $this->db->where('pedido_venda.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        //Join para pegar todas informações relativas à estrutura
        $this->db->select('pedido_venda.*, cliente.nome_cliente');
        $this->db->select('(select sum(produto_venda.valor_unitario * produto_venda.quant_pedida) 
                             from produto_venda
                            where produto_venda.num_pedido_venda = pedido_venda.num_pedido_venda) valor_total_pedido');
        $this->db->from('pedido_venda');
        $this->db->join('cliente', 'cliente.cod_cliente = pedido_venda.cod_cliente');
        $this->db->where('exists(select * from produto_venda
                                  where produto_venda.num_pedido_venda = pedido_venda.num_pedido_venda
                                    and produto_venda.status = 1)');
        $this->db->order_by('pedido_venda.data_entrega', 'asc');

        return $query = $this->db->get()->result();

    }

    public function getVendaTotal(){
        $this->db->where('pedido_venda.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('sum((select sum(movimentos_estoque.valor_movimento)
                              from movimentos_estoque
                             where movimentos_estoque.origem_movimento = 3
                               and movimentos_estoque.tipo_movimento = 2
                               and movimentos_estoque.id_origem = faturamento_pedido.cod_faturamento_pedido)) valor_total');
        $this->db->from('faturamento_pedido');
        $this->db->join('pedido_venda', 'pedido_venda.num_pedido_venda = faturamento_pedido.num_pedido_venda');
        $this->db->where('faturamento_pedido.estornado', '0');
        $this->db->where('faturamento_pedido.data_faturamento >=', date('Y-m-01'));
        $this->db->where('faturamento_pedido.data_faturamento <=', date('Y-m-d'));

        $pedidoVenda = $this->db->get_compiled_select();

        $this->db->where('controle_caixa.id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('venda_caixa.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('sum((select sum(movimentos_estoque.valor_movimento)
                              from movimentos_estoque
                             where movimentos_estoque.origem_movimento = 6
                               and movimentos_estoque.tipo_movimento = 2
                               and movimentos_estoque.id_origem = venda_caixa.num_venda_caixa)) valor_total');
        $this->db->from('venda_caixa');
        $this->db->join('controle_caixa', 'controle_caixa.data_caixa = venda_caixa.data_caixa');
        $this->db->where('venda_caixa.status', '2');
        $this->db->where('venda_caixa.data_caixa >=', date('Y-m-01'));
        $this->db->where('venda_caixa.data_caixa <=', date('Y-m-d'));

        $frenteCaixa = $this->db->get_compiled_select();

        $this->db->select('sum(vendas.valor_total) valor_total');
        $this->db->from("($pedidoVenda UNION $frenteCaixa) vendas");

        return $this->db->get()->row();

    }

    public function getPedidoVendaAprovado($dataInicio, $dataFim, $filter = "", $clienteFiltro = "", $vendedorFiltro = "", $transportadorFiltro = ""){
        $this->db->where('pedido_venda.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        //Join para pegar todas informações relativas à estrutura
        $this->db->select('pedido_venda.*, cliente.nome_cliente, vendedor.nome_vendedor');
        $this->db->select('pedido_venda.valor_frete');
        $this->db->select('pedido_venda.valor_seguro');
        $this->db->select('pedido_venda.outras_despesas');
        $this->db->select('(select sum(produto_venda.quant_pedida * produto_venda.valor_unitario) 
                             from produto_venda
                            where produto_venda.num_pedido_venda = pedido_venda.num_pedido_venda) valor_total_pedido');
        $this->db->select('if(pedido_venda.tipo_desconto = 1, pedido_venda.valor_desconto, 
                                 (select sum(produto_venda.quant_pedida * produto_venda.valor_unitario) 
                                    from produto_venda
                                   where produto_venda.num_pedido_venda = pedido_venda.num_pedido_venda) * (pedido_venda.valor_desconto / 100)) valor_desconto');
        $this->db->select('(select sum(faturamento_pedido.valor_bruto +
                                       faturamento_pedido.valor_frete +
                                       faturamento_pedido.valor_seguro + 
                                       faturamento_pedido.outras_despesas -   
                                       faturamento_pedido.valor_desconto) 
                             from faturamento_pedido
                            where faturamento_pedido.num_pedido_venda = pedido_venda.num_pedido_venda
                              and faturamento_pedido.estornado = 0) valor_total_faturado');
        $this->db->from('pedido_venda');
        $this->db->join('cliente', 'cliente.cod_cliente = pedido_venda.cod_cliente');
        $this->db->join('vendedor', 'vendedor.cod_vendedor = pedido_venda.cod_vendedor', 'left');
        $this->db->where('pedido_venda.situacao', 3);
        $this->db->order_by('pedido_venda.data_entrega', 'desc');

        if($filter <> ""){
            $this->db->group_start();
            $this->db->or_like('num_pedido_venda' ,$filter);
            $this->db->or_like('pedido_venda.cod_cliente' ,$filter);
            $this->db->or_like('nome_cliente' ,$filter);
            $this->db->or_like('nome_vendedor' ,$filter);
            $this->db->group_end();

        }else{
            $this->db->where('pedido_venda.data_entrega >= ', $dataInicio); 
            $this->db->where('pedido_venda.data_entrega <= ', $dataFim); 
        }

        if($clienteFiltro != ""){
            $this->db->where_in('pedido_venda.cod_cliente', $clienteFiltro);
        }
        if($vendedorFiltro != ""){
            $this->db->where_in('pedido_venda.cod_vendedor', $vendedorFiltro);
        }
        if($transportadorFiltro != ""){
            $this->db->where_in('pedido_venda.cod_transportador', $transportadorFiltro);
        }

        return $query = $this->db->get()->result();

    }

    public function getValoresFaturamento($dataInicio, $dataFim){
        $this->db->where('pedido_venda.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        //Join para pegar todas informações relativas à estrutura
        $this->db->select('sum(faturamento_pedido.valor_bruto +
                               faturamento_pedido.valor_frete +
                               faturamento_pedido.valor_seguro + 
                               faturamento_pedido.outras_despesas -   
                               faturamento_pedido.valor_desconto) valor_total_faturado');
        $this->db->from('faturamento_pedido');
        $this->db->join('pedido_venda', 'pedido_venda.num_pedido_venda = faturamento_pedido.num_pedido_venda');
        $this->db->where('faturamento_pedido.estornado', 0);

        $this->db->where('faturamento_pedido.data_faturamento >= ', $dataInicio); 
        $this->db->where('faturamento_pedido.data_faturamento <= ', $dataFim); 

        return $query = $this->db->get()->row();

    }

    public function getProdutoFaturadoPorPedido($numPedidoVenda){
        $this->db->where('produto.id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('pedido_venda.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('faturamento_pedido_produto.*');
        $this->db->select('produto.nome_produto, produto.cod_unidade_medida');
        $this->db->from('faturamento_pedido_produto');
        $this->db->join('produto', 'produto.cod_produto = faturamento_pedido_produto.cod_produto');
        $this->db->join('faturamento_pedido', 'faturamento_pedido.cod_faturamento_pedido = faturamento_pedido_produto.faturamento_pedido');
        $this->db->join('pedido_venda', 'pedido_venda.num_pedido_venda = faturamento_pedido.num_pedido_venda');
        $this->db->where('faturamento_pedido.num_pedido_venda', $numPedidoVenda);
        $this->db->where('faturamento_pedido.estornado', 0);

        return $query = $this->db->get()->result();

    }

    public function getProdutoFaturadoPorFaturamento($idFaturamento){
        $this->db->where('produto.id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('movimentos_estoque.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('movimentos_estoque.*, faturamento_pedido.cod_faturamento_pedido, produto.nome_produto, 
                           produto.cod_unidade_medida, tipo_produto.nome_tipo_produto, produto.cod_ncm, produto.cod_origem,
                           produto.cod_cest');
        $this->db->from('movimentos_estoque');
        $this->db->join('produto', 'produto.cod_produto = movimentos_estoque.cod_produto');
        $this->db->join('tipo_produto', 'tipo_produto.cod_tipo_produto = produto.cod_tipo_produto');
        $this->db->join('faturamento_pedido', 'faturamento_pedido.cod_faturamento_pedido = movimentos_estoque.id_origem');
        $this->db->where('movimentos_estoque.origem_movimento', '3');
        $this->db->where('faturamento_pedido.cod_faturamento_pedido', $idFaturamento);
        $this->db->where('faturamento_pedido.estornado', 0);
        $this->db->order_by('movimentos_estoque.cod_movimento_estoque', 'desc');

        return $query = $this->db->get()->result();

    }
    public function getMovimentos($SeqProdutoVenda = null){

        $this->db->where('movimentos_produto_venda.seq_produto_venda', $SeqProdutoVenda);
        $this->db->where('movimentos_produto_venda.estornado', '0');
        return $query = $this->db->get('movimentos_produto_venda')->result();

    }

    public function getFaturamentosPorPedido($NumPedidoVenda){

        $this->db->select('faturamento_pedido.*');
        $this->db->select('(select sum(faturamento_pedido_produto.quantidade * faturamento_pedido_produto.valor_unitario)
                              from faturamento_pedido_produto
                             where faturamento_pedido_produto.faturamento_pedido = faturamento_pedido.cod_faturamento_pedido) valor_total');
        $this->db->select('tb_fat_nota_fiscal.c_stat, tb_fat_nota_fiscal.chave, tb_fat_nota_fiscal.id as nf_id');
        $this->db->select('tb_fat_nota_fiscal.serie, tb_fat_nota_fiscal.numero');
        $this->db->select('vendedor.nome_vendedor');
        $this->db->select('usuario.nome_usuario');

        $this->db->from('faturamento_pedido');

        $this->db->join('tb_fat_nota_fiscal', 'tb_fat_nota_fiscal.cod_faturamento_pedido = faturamento_pedido.cod_faturamento_pedido and tb_fat_nota_fiscal.c_stat != "101"', 'left');
        $this->db->join('vendedor', 'vendedor.cod_vendedor = faturamento_pedido.cod_vendedor and vendedor.id_empresa =  ' . getDadosUsuarioLogado()['id_empresa'], 'left');
        $this->db->join('usuario', 'usuario.email = faturamento_pedido.usuario', 'left');


        $this->db->where('faturamento_pedido.num_pedido_venda', $NumPedidoVenda);

        $this->db->where('faturamento_pedido.estornado ', 0);

        return $query = $this->db->get()->result();

    }

    public function getFaturamentoPorCodigo($codFaturamentoPedido){

        $this->db->select('faturamento_pedido.*, pedido_venda.tipo_frete, pedido_venda.num_pedido_venda');
        $this->db->select('(select sum(faturamento_pedido_produto.quantidade * faturamento_pedido_produto.valor_unitario)
                                  from faturamento_pedido_produto
                                 where faturamento_pedido_produto.faturamento_pedido = faturamento_pedido.cod_faturamento_pedido) valor_total');
        $this->db->select('transportador.nome_transportador, vendedor.nome_vendedor');
        $this->db->join('pedido_venda', 'pedido_venda.num_pedido_venda = faturamento_pedido.num_pedido_venda', 'inner');
        $this->db->join('transportador', 'transportador.cod_transportador = faturamento_pedido.cod_transportador', 'left');
        $this->db->join('vendedor', 'vendedor.cod_vendedor = faturamento_pedido.cod_vendedor', 'left');
        $this->db->where('faturamento_pedido.cod_faturamento_pedido', $codFaturamentoPedido);
        return $query = $this->db->get('faturamento_pedido')->row();

    }

    public function getMovimentoPorFaturamento($codFaturamentoPedido){
        $this->db->where('movimentos_estoque.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('movimentos_estoque.*');
        $this->db->from('movimentos_estoque');
        $this->db->where('movimentos_estoque.id_origem', $codFaturamentoPedido);
        $this->db->where('movimentos_estoque.origem_movimento', '3');

        return $query = $this->db->get()->result();

    }

    public function getMovimentosPorCodigo($codMovimentoPV = null){

        $this->db->where('movimentos_produto_venda.cod_movimento_pv', $codMovimentoPV);
        return $query = $this->db->get('movimentos_produto_venda')->row();

    }

    public function getVendaCaixaPorCodigo($numVendaCaixa){


        $this->db->select('venda_caixa.*');
        $this->db->select('(select sum(produto_venda_caixa.quant_venda * produto_venda_caixa.valor_unit)
                              from produto_venda_caixa
                             where produto_venda_caixa.num_venda_caixa = venda_caixa.num_venda_caixa) sub_total');
        $this->db->select('tb_fat_nota_fiscal.c_stat, tb_fat_nota_fiscal.chave, tb_fat_nota_fiscal.id as nf_id');
        $this->db->select('tb_fat_nota_fiscal.serie, tb_fat_nota_fiscal.numero');
        $this->db->from('venda_caixa');
        $this->db->join('empresa', 'empresa.id_empresa = venda_caixa.id_empresa');
        $this->db->join('tb_fat_nota_fiscal', 'tb_fat_nota_fiscal.cod_faturamento_pedido = venda_caixa.num_venda_caixa and tb_fat_nota_fiscal.c_stat = "100" and tb_fat_nota_fiscal.modelo = empresa.modelo_nfce', 'left');
        $this->db->where('venda_caixa.num_venda_caixa', $numVendaCaixa);

        return $this->db->get()->row();

    }

    public function getProdutoVendaPorCodigo($numPedidoVenda, $codProduto){

        $this->db->select('produto_venda.*');
        $this->db->from('produto_venda');
        $this->db->where('produto_venda.num_pedido_venda', $numPedidoVenda);
        $this->db->where('produto_venda.cod_produto', $codProduto);
        return $query = $this->db->get()->row();

    }

    public function getProdutoVendaPorSequencia($seqProdutoVenda){

        $this->db->where('produto_venda.seq_produto_venda', $seqProdutoVenda);
        return $query = $this->db->get('produto_venda')->row();

    }

    public function getCountProduto($numPedidoVenda){
        $this->db->select('count(*) as total_registro');
        $this->db->where('num_pedido_venda', $numPedidoVenda);
        $query = $this->db->get('produto_venda')->row();

        return $query->total_registro;
    }

    public function getVendasPeriodo(){
        $this->db->select("(select sum(movimentos_produto_venda.valor_venda)
                            from movimentos_produto_venda
                    inner join produto_venda on produto_venda.seq_produto_venda = movimentos_produto_venda.seq_produto_venda
                    inner join pedido_venda  on pedido_venda.num_pedido_venda = produto_venda.num_pedido_venda
                        where movimentos_produto_venda.estornado    = 0
                            and movimentos_produto_venda.data_saida   = CURRENT_DATE()
                            and pedido_venda.id_empresa         = " . getDadosUsuarioLogado()['id_empresa'] . ") vendas_hoje,
                        (select sum(movimentos_produto_venda.valor_venda)
                            from movimentos_produto_venda
                    inner join produto_venda on produto_venda.seq_produto_venda = movimentos_produto_venda.seq_produto_venda
                    inner join pedido_venda  on pedido_venda.num_pedido_venda = produto_venda.num_pedido_venda
                        where movimentos_produto_venda.estornado    = 0
                            and movimentos_produto_venda.data_saida   >= CAST(DATE_FORMAT(NOW() ,'%Y-%m-01') as DATE)
                            and pedido_venda.id_empresa         = " . getDadosUsuarioLogado()['id_empresa'] . ") vendas_mes,
                        (select sum(produto_venda.valor_unitario - movimentos_produto_venda.valor_venda)
                            from movimentos_produto_venda
                    inner join produto_venda on produto_venda.seq_produto_venda = movimentos_produto_venda.seq_produto_venda
                    inner join pedido_venda  on pedido_venda.num_pedido_venda = produto_venda.num_pedido_venda
                        where movimentos_produto_venda.estornado    = 0
                            and movimentos_produto_venda.data_saida   >= CAST(DATE_FORMAT(NOW() ,'%Y-%m-01') as DATE)
                            and pedido_venda.id_empresa         = " . getDadosUsuarioLogado()['id_empresa'] . ") previsao_faturamento
                    from dual");

        return $query = $this->db->get()->row();
    }

    public function getResultadoVenda(){

        $this->db->select("(select sum(reporte_producao.custo_producao)
                                from reporte_producao
                        inner join ordem_producao on ordem_producao.num_ordem_producao = reporte_producao.num_ordem_producao
                            where reporte_producao.estornado     = 0
                                and reporte_producao.data_reporte >= CAST(DATE_FORMAT(NOW() ,'%Y-%m-01') as DATE)
                                and ordem_producao.id_empresa      = " . getDadosUsuarioLogado()['id_empresa'] . ") producao,
                            (select sum(movimentos_produto_venda.valor_venda)
                                from movimentos_produto_venda
                        inner join produto_venda on produto_venda.seq_produto_venda = movimentos_produto_venda.seq_produto_venda
                        inner join pedido_venda  on pedido_venda.num_pedido_venda = produto_venda.num_pedido_venda
                            where movimentos_produto_venda.estornado    = 0
                                and movimentos_produto_venda.data_saida   >= CAST(DATE_FORMAT(NOW() ,'%Y-%m-01') as DATE)
                                and pedido_venda.id_empresa         = " . getDadosUsuarioLogado()['id_empresa'] . ") vendas
                        from dual");

        return $query = $this->db->get()->row();
    }

    public function getQuantPorStatus(){
        $this->db->where('pedido_venda.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('if(pedido_venda.data_entrega < curdate(), 4, 
        produto_venda.status) AS status_cont, count(produto_venda.seq_produto_venda) as num_produtos');
        $this->db->from('produto_venda');
        $this->db->join('pedido_venda', 'pedido_venda.num_pedido_venda = produto_venda.num_pedido_venda');
        $this->db->where('produto_venda.status !=', '3');
        $this->db->group_by('status_cont');

        return $query = $this->db->get()->result();

    }

    public function countAll(){
        $this->db->where('pedido_venda.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        return $this->db->count_all_results('pedido_venda');
    }

    public function countAllVendasVendedor(){
        $this->db->where('pedido_venda.id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('vendedor.nome_usuario', getDadosUsuarioLogado()['usuario']);

        $this->db->join('vendedor', 'vendedor.cod_vendedor = pedido_venda.cod_vendedor');
        return $this->db->count_all_results('pedido_venda');
    }

    public function countAllProduto(){
        $this->db->where('pedido_venda.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->where('pedido_venda.situacao', 3);
        return $this->db->count_all_results('pedido_venda');
    }

    public function defineStatusPedido($listaPedidoVenda){

        $listaStatus = null;

        foreach($listaPedidoVenda as $key_pedido => $pedido){

            $somaStatus = $this->somaStatus($pedido->num_pedido_venda);
            $numsProduto = $this->getCountProduto($pedido->num_pedido_venda);

            if($numsProduto == 0){
                $status = 1;
            }elseif(($somaStatus / $numsProduto) == 1){
                $status = 1;
            }elseif(($somaStatus / $numsProduto) == 3){
                $status = 3;
            }elseif(($somaStatus / $numsProduto) == 4){
                $status = 4;
            }else{
                $status = 2;
            }

            $listaStatus[$pedido->num_pedido_venda] = $status;

        }

        if($listaStatus == null){

            return null;

        }

        return $listaStatus;

    }

    public function somaStatus($numPedidoVenda){
        $this->db->select_sum('status');
        $this->db->where('num_pedido_venda', $numPedidoVenda);
        $query = $this->db->get('produto_venda')->row();

        return $query->status;
    }

    //Relatórios
    public function totalVendaProduto($dataInicio, $dataFim, $codProdutos){
        $this->db->where('produto.id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('pedido_venda.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('produto.cod_produto');
        $this->db->select('sum(faturamento_pedido_produto.valor_unitario *
                               faturamento_pedido_produto.quantidade) valor_total');
        $this->db->from('faturamento_pedido_produto');
        $this->db->join('produto', 'produto.cod_produto = faturamento_pedido_produto.cod_produto');
        $this->db->join('faturamento_pedido', 'faturamento_pedido.cod_faturamento_pedido = faturamento_pedido_produto.faturamento_pedido');
        $this->db->join('pedido_venda', 'pedido_venda.num_pedido_venda = faturamento_pedido.num_pedido_venda');
        $this->db->where('faturamento_pedido.estornado', '0');

        $this->db->where("faturamento_pedido.data_faturamento >= ", $dataInicio);
        $this->db->where("faturamento_pedido.data_faturamento <= ", $dataFim);

        if($codProdutos != ""){
            $this->db->where_in('produto.cod_produto', $codProdutos);
        }

        $pedidoVenda = $this->db->get_compiled_select();

        $this->db->where('produto.id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('venda_caixa.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('produto.cod_produto');
        $this->db->select('sum(produto_venda_caixa.quant_venda * 
                               produto_venda_caixa.valor_unit) valor_total');
        $this->db->from('produto_venda_caixa');
        $this->db->join('produto', 'produto.cod_produto = produto_venda_caixa.cod_produto');
        $this->db->join('venda_caixa', 'venda_caixa.num_venda_caixa = produto_venda_caixa.num_venda_caixa');
        $this->db->where('venda_caixa.status', '2');
        $this->db->group_by('produto_venda_caixa.cod_produto');
        

        $this->db->where("venda_caixa.data_caixa >= ", $dataInicio);
        $this->db->where("venda_caixa.data_caixa <= ", $dataFim);

        if($codProdutos != ""){
            $this->db->where_in('produto.cod_produto', $codProdutos);
        }

        $frenteCaixa = $this->db->get_compiled_select();

        $this->db->select('sum(vendas.valor_total) valor_total');
        $this->db->from("($pedidoVenda UNION $frenteCaixa) vendas");
        $this->db->group_by('vendas.cod_produto');

        return $this->db->get()->row();

    }

    public function vendaResumida($dataInicio, $dataFim, $codProdutos){

        $this->db->where('produto.id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('pedido_venda.id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('tipo_produto.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('produto.*, tipo_produto.nome_tipo_produto');
        $this->db->select('sum(faturamento_pedido_produto.quantidade) quant_vendido');
        $this->db->select('sum(faturamento_pedido_produto.valor_unitario *
                               faturamento_pedido_produto.quantidade) total_vendido');
        $this->db->from('faturamento_pedido_produto');
        $this->db->join('produto', 'produto.cod_produto = faturamento_pedido_produto.cod_produto');
        $this->db->join('tipo_produto', 'tipo_produto.cod_tipo_produto = produto.cod_tipo_produto');
        $this->db->join('faturamento_pedido', 'faturamento_pedido.cod_faturamento_pedido = faturamento_pedido_produto.faturamento_pedido');
        $this->db->join('pedido_venda', 'pedido_venda.num_pedido_venda = faturamento_pedido.num_pedido_venda');
        $this->db->where('faturamento_pedido.estornado', '0');
        $this->db->group_by('faturamento_pedido_produto.cod_produto');
        

        $this->db->where("faturamento_pedido.data_faturamento >= ", $dataInicio);
        $this->db->where("faturamento_pedido.data_faturamento <= ", $dataFim);

        if($codProdutos != ""){
            $this->db->where_in('produto.cod_produto', $codProdutos);
        }

        $pedidoVenda = $this->db->get_compiled_select();

        $this->db->where('produto.id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('venda_caixa.id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('tipo_produto.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('produto.*, tipo_produto.nome_tipo_produto');
        $this->db->select('sum(produto_venda_caixa.quant_venda) quant_vendido');
        $this->db->select('sum(produto_venda_caixa.quant_venda * 
                               produto_venda_caixa.valor_unit) total_vendido');
        $this->db->from('produto_venda_caixa');
        $this->db->join('produto', 'produto.cod_produto = produto_venda_caixa.cod_produto');
        $this->db->join('tipo_produto', 'tipo_produto.cod_tipo_produto = produto.cod_tipo_produto');
        $this->db->join('venda_caixa', 'venda_caixa.num_venda_caixa = produto_venda_caixa.num_venda_caixa');
        $this->db->where('venda_caixa.status', '2');
        $this->db->group_by('produto_venda_caixa.cod_produto');
        

        $this->db->where("venda_caixa.data_caixa >= ", $dataInicio);
        $this->db->where("venda_caixa.data_caixa <= ", $dataFim);

        if($codProdutos != ""){
            $this->db->where_in('produto.cod_produto', $codProdutos);
        }

        $frenteCaixa = $this->db->get_compiled_select();

        $this->db->select('vendas.cod_produto, vendas.nome_produto, vendas.nome_tipo_produto, vendas.cod_unidade_medida, 
                           sum(vendas.quant_vendido) quant_vendido, sum(vendas.total_vendido) total_vendido');
        $this->db->from("($pedidoVenda UNION $frenteCaixa) vendas");
        $this->db->order_by('total_vendido', 'desc');
        $this->db->group_by('cod_produto');

        return $this->db->get()->result();

    }

    public function vendaDetalhada($dataInicio, $dataFim, $codProdutos, $codClientes = ""){
        $this->db->where('pedido_venda.id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('produto.id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('tipo_produto.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select("pedido_venda.cod_cliente, cliente.nome_cliente");
        $this->db->select("faturamento_pedido_produto.valor_unitario, faturamento_pedido_produto.preco_venda, faturamento_pedido_produto.custo_medio");
        $this->db->select('"Pedido Venda" as tipo_venda, faturamento_pedido.data_faturamento as data_venda, pedido_venda.num_pedido_venda as pedido, faturamento_pedido.cod_faturamento_pedido as venda,
                           faturamento_pedido_produto.id as num_fat_prod, faturamento_pedido_produto.cod_produto, produto.nome_produto, tipo_produto.nome_tipo_produto, produto.cod_unidade_medida, 
                           faturamento_pedido_produto.quantidade as quant_venda, (faturamento_pedido_produto.valor_unitario * faturamento_pedido_produto.quantidade) valor_venda');
        $this->db->from('faturamento_pedido_produto');
        $this->db->join('produto', 'produto.cod_produto = faturamento_pedido_produto.cod_produto');
        $this->db->join('tipo_produto', 'tipo_produto.cod_tipo_produto = produto.cod_tipo_produto');
        $this->db->join('faturamento_pedido', 'faturamento_pedido.cod_faturamento_pedido = faturamento_pedido_produto.faturamento_pedido');        
        $this->db->join('pedido_venda', 'pedido_venda.num_pedido_venda = faturamento_pedido.num_pedido_venda');
        $this->db->join('cliente', 'cliente.cod_cliente = pedido_venda.cod_cliente');
        $this->db->where('faturamento_pedido.estornado', '0');

        $this->db->where("faturamento_pedido.data_faturamento >= ", $dataInicio);
        $this->db->where("faturamento_pedido.data_faturamento <= ", $dataFim);

        if($codProdutos != ""){
            $this->db->where_in('produto.cod_produto', $codProdutos);
        }

        if($codClientes != ""){
            $this->db->where_in('pedido_venda.cod_cliente', $codClientes);
        }

        $pedidoVenda = $this->db->get_compiled_select();

        $this->db->where('venda_caixa.id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('produto.id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('tipo_produto.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select("venda_caixa.cod_cliente, IFNULL(cliente.nome_cliente, 'Consumidor') nome_cliente");
        $this->db->select("produto_venda_caixa.valor_unit as valor_unitario, 0 as preco_venda, 0 as custo_medio");
        $this->db->select('"Frente de Caixa" as tipo_venda, venda_caixa.data_caixa as data_venda, DATE_FORMAT(venda_caixa.data_caixa, "%d/%m/%Y") as pedido, venda_caixa.num_venda_caixa as venda,
                           produto_venda_caixa.seq_produto as num_fat_prod, produto_venda_caixa.cod_produto, produto.nome_produto, tipo_produto.nome_tipo_produto, produto.cod_unidade_medida, 
                           produto_venda_caixa.quant_venda, (produto_venda_caixa.quant_venda * produto_venda_caixa.valor_unit) as valor_venda');
        $this->db->from('produto_venda_caixa');
        $this->db->join('produto', 'produto.cod_produto = produto_venda_caixa.cod_produto');
        $this->db->join('tipo_produto', 'tipo_produto.cod_tipo_produto = produto.cod_tipo_produto');
        $this->db->join('venda_caixa', 'venda_caixa.num_venda_caixa = produto_venda_caixa.num_venda_caixa');
        $this->db->join('cliente', 'cliente.cod_cliente = venda_caixa.cod_cliente', 'left');
        $this->db->where('venda_caixa.status', '2');


        $this->db->where("venda_caixa.data_caixa >= ", $dataInicio);
        $this->db->where("venda_caixa.data_caixa <= ", $dataFim);

        if($codProdutos != ""){
            $this->db->where_in('produto.cod_produto', $codProdutos);
        }

        if($codClientes != ""){
            $this->db->where_in('venda_caixa.cod_cliente', $codClientes);
        }

        $frenteCaixa = $this->db->get_compiled_select();

        $this->db->select('vendas.*');
        $this->db->from("($pedidoVenda UNION $frenteCaixa) vendas");
        $this->db->order_by('vendas.data_venda', 'desc');

        return $this->db->get()->result();

    }

    public function totalVendaCliente($dataInicio, $dataFim, $codClientes){
        $this->db->where('produto.id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('movimentos_estoque.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('sum(movimentos_estoque.valor_movimento) valor_total, sum(faturamento_pedido.valor_desconto) total_desconto');
        $this->db->from('movimentos_estoque');
        $this->db->join('produto', 'produto.cod_produto = movimentos_estoque.cod_produto');
        $this->db->join('tipo_produto', 'tipo_produto.cod_tipo_produto = produto.cod_tipo_produto');
        $this->db->join('faturamento_pedido', 'faturamento_pedido.cod_faturamento_pedido = movimentos_estoque.id_origem');
        $this->db->join('pedido_venda', 'pedido_venda.num_pedido_venda = faturamento_pedido.num_pedido_venda');
        $this->db->where('movimentos_estoque.origem_movimento', '3');
        $this->db->where('movimentos_estoque.tipo_movimento', '2');
        $this->db->where('faturamento_pedido.estornado', '0');

        $this->db->where("movimentos_estoque.data_movimento >= ", $dataInicio);
        $this->db->where("movimentos_estoque.data_movimento <= ", $dataFim);

        if($codClientes != ""){
            $this->db->where_in('pedido_venda.cod_cliente', $codClientes);
        }

        $pedidoVenda = $this->db->get_compiled_select();

        $this->db->where('produto.id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('movimentos_estoque.id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('venda_caixa.id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('controle_caixa.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('sum(movimentos_estoque.valor_movimento) valor_total, 
                           if(venda_caixa.tipo_desconto = 1, venda_caixa.valor_desconto, movimentos_estoque.valor_movimento * (venda_caixa.valor_desconto / 100)) total_desconto');
        $this->db->from('movimentos_estoque');
        $this->db->join('produto', 'produto.cod_produto = movimentos_estoque.cod_produto');
        $this->db->join('tipo_produto', 'tipo_produto.cod_tipo_produto = produto.cod_tipo_produto');
        $this->db->join('venda_caixa', 'venda_caixa.num_venda_caixa = movimentos_estoque.id_origem');
        $this->db->join('controle_caixa', 'controle_caixa.data_caixa = venda_caixa.data_caixa');
        $this->db->where('movimentos_estoque.origem_movimento', '6');
        $this->db->where('movimentos_estoque.tipo_movimento', '2');
        $this->db->where('venda_caixa.status', '2');

        $this->db->where("movimentos_estoque.data_movimento >= ", $dataInicio);
        $this->db->where("movimentos_estoque.data_movimento <= ", $dataFim);

        if($codClientes != ""){
            $this->db->where_in('venda_caixa.cod_cliente', $codClientes);
        }

        $frenteCaixa = $this->db->get_compiled_select();

        $this->db->select('sum(vendas.valor_total) valor_total, sum(vendas.total_desconto) total_desconto');
        $this->db->from("($pedidoVenda UNION $frenteCaixa) vendas");

        return $this->db->get()->row();

    }

    public function getValoresVendas($dataInicio, $dataFim, $codCliente = "", $codVendedores = ""){

        $this->db->where('pedido_venda.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select("sum(faturamento_pedido.valor_bruto + faturamento_pedido.valor_frete + faturamento_pedido.valor_seguro + faturamento_pedido.outras_despesas - faturamento_pedido.valor_desconto) total_vendas");
        $this->db->select("sum(faturamento_pedido.valor_bruto) total_produto");
        $this->db->select("sum(faturamento_pedido.valor_desconto) total_desconto");
        $this->db->select("sum(faturamento_pedido.valor_frete) total_frete");
        $this->db->select("sum(faturamento_pedido.valor_seguro) total_seguro");
        $this->db->select("sum(faturamento_pedido.outras_despesas) outras_despesas");
        $this->db->from('faturamento_pedido');
        $this->db->join('pedido_venda', 'pedido_venda.num_pedido_venda = faturamento_pedido.num_pedido_venda');
        $this->db->where('faturamento_pedido.estornado', '0');
        $this->db->where('faturamento_pedido.data_faturamento >= ', $dataInicio);
        $this->db->where('faturamento_pedido.data_faturamento <= ', $dataFim);

        if($codCliente != ""){
            $this->db->where("pedido_venda.cod_cliente", $codCliente);
        }

        if($codVendedores != ""){
            $this->db->where("pedido_venda.cod_vendedor", $codVendedores);
        }

        $pedidoVenda = $this->db->get_compiled_select();
        

        $this->db->where('venda_caixa.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select("sum(venda_caixa.valor_bruto + venda_caixa.valor_frete - 
                           IF(venda_caixa.tipo_desconto = 1, venda_caixa.valor_desconto, venda_caixa.valor_bruto * (venda_caixa.valor_desconto / 100))) total_vendas");
        $this->db->select("sum(venda_caixa.valor_bruto) total_produto");
        $this->db->select("sum(IF(venda_caixa.tipo_desconto = 1, venda_caixa.valor_desconto, venda_caixa.valor_bruto * (venda_caixa.valor_desconto / 100))) total_desconto");
        $this->db->select("sum(venda_caixa.valor_frete) total_frete");
        $this->db->select("sum(0) total_seguro");
        $this->db->select("sum(0) outras_despesas");
        $this->db->from('venda_caixa');
        $this->db->where('venda_caixa.status', '2');
        $this->db->where('venda_caixa.data_caixa >= ', $dataInicio);
        $this->db->where('venda_caixa.data_caixa <= ', $dataFim);

        if($codCliente != ""){
            $this->db->where("venda_caixa.cod_cliente", $codCliente);
        }

        $frenteCaixa = $this->db->get_compiled_select();

        $this->db->select('sum(total_vendas) total_vendas');
        $this->db->select('sum(total_produto) total_produto');
        $this->db->select('sum(total_desconto) total_desconto');
        $this->db->select('sum(total_frete) total_frete');
        $this->db->select('sum(total_seguro) total_seguro');
        $this->db->select('sum(outras_despesas) outras_despesas');
        $this->db->from("($pedidoVenda UNION $frenteCaixa) valores");


        return $this->db->get()->row();

    }

    public function getCountVendas($dataInicio, $dataFim, $codCliente = "", $codVendedor = ""){

        $this->db->where('pedido_venda.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select("count(*) quant_pedidos");
        $this->db->from('faturamento_pedido');
        $this->db->join('pedido_venda', 'pedido_venda.num_pedido_venda = faturamento_pedido.num_pedido_venda');
        $this->db->where('faturamento_pedido.estornado', '0');
        $this->db->where('faturamento_pedido.data_faturamento >= ', $dataInicio);
        $this->db->where('faturamento_pedido.data_faturamento <= ', $dataFim);

        if($codCliente != ""){
            $this->db->where("pedido_venda.cod_cliente", $codCliente);
        }

        if($codVendedor != ""){
            $this->db->where("pedido_venda.cod_vendedor", $codVendedor);
        }

        $pedidoVenda = $this->db->get_compiled_select();
        

        $this->db->where('venda_caixa.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select("count(*) quant_pedidos");
        $this->db->from('venda_caixa');
        $this->db->where('venda_caixa.status', '2');
        $this->db->where('venda_caixa.data_caixa >= ', $dataInicio);
        $this->db->where('venda_caixa.data_caixa <= ', $dataFim);

        if($codCliente != ""){
            $this->db->where("venda_caixa.cod_cliente", $codCliente);
        }

        $frenteCaixa = $this->db->get_compiled_select();

        $this->db->select('sum(quant_pedidos) quant_pedidos');
        $this->db->from("($pedidoVenda UNION $frenteCaixa) valores");


        return $this->db->get()->row();

    }

    public function getUltimaVenda($codCliente = ""){

        $this->db->where('pedido_venda.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select("faturamento_pedido.data_faturamento as data_venda");
        $this->db->select("DATEDIFF(CURDATE(), faturamento_pedido.data_faturamento) dias_venda");
        $this->db->from('faturamento_pedido');
        $this->db->join('pedido_venda', 'pedido_venda.num_pedido_venda = faturamento_pedido.num_pedido_venda');
        $this->db->where('faturamento_pedido.estornado', '0');
        //$this->db->order_by('faturamento_pedido.data_faturamento', 'desc');
        //$this->db->limit(1);
        

        if($codCliente != ""){
            $this->db->where("pedido_venda.cod_cliente", $codCliente);
        }

        $pedidoVenda = $this->db->get_compiled_select();
        

        $this->db->where('venda_caixa.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select("venda_caixa.data_caixa as data_venda");
        $this->db->select("DATEDIFF(CURDATE(), venda_caixa.data_caixa) dias_venda");
        $this->db->from('venda_caixa');
        $this->db->where('venda_caixa.status', '2');
        //$this->db->order_by('venda_caixa.data_caixa', 'desc');
        //$this->db->limit(1);

        if($codCliente != ""){
            $this->db->where("venda_caixa.cod_cliente", $codCliente);
        }

        $frenteCaixa = $this->db->get_compiled_select();

        $this->db->select('data_venda');
        $this->db->select('dias_venda');
        $this->db->from("($pedidoVenda UNION $frenteCaixa) valores");
        $this->db->order_by('data_venda', 'desc');
        $this->db->limit(1);


        return $this->db->get()->row();

    }

    public function getCarteiraCliente(){

        $empresa = $this->empresa->getEmpresaPorCodigo(getDadosUsuarioLogado()['id_empresa']);

        $dataAtivo = date('Y-m-d', strtotime('-' . $empresa->clientes_ativos . ' days'));
        $dataInativoRecente = date('Y-m-d', strtotime('-' . $empresa->clientes_inativos_recentes . ' days'));

        $this->db->select("(SELECT count(*)
                              FROM cliente
                              WHERE EXISTS
                                   (SELECT faturamento_pedido.cod_faturamento_pedido
                                     FROM faturamento_pedido
                                     JOIN pedido_venda ON pedido_venda.num_pedido_venda = faturamento_pedido.num_pedido_venda
                                    WHERE faturamento_pedido.data_faturamento >= '" . $dataAtivo . "'
                                      AND pedido_venda.cod_cliente = cliente.cod_cliente
                                      AND faturamento_pedido.estornado = 0)
                                 AND cliente.id_empresa = " . $empresa->id_empresa . " ) num_clientes_ativos");
        $this->db->select("(SELECT count(*)
                              FROM cliente
                              WHERE EXISTS
                                   (SELECT faturamento_pedido.cod_faturamento_pedido
                                     FROM faturamento_pedido
                                     JOIN pedido_venda ON pedido_venda.num_pedido_venda = faturamento_pedido.num_pedido_venda
                                    WHERE faturamento_pedido.data_faturamento >= '" . $dataInativoRecente . "'
                                      AND pedido_venda.cod_cliente = cliente.cod_cliente
                                      AND faturamento_pedido.estornado = 0)
                               AND NOT EXISTS
                                   (SELECT faturamento_pedido.cod_faturamento_pedido
                                      FROM faturamento_pedido
                                      JOIN pedido_venda ON pedido_venda.num_pedido_venda = faturamento_pedido.num_pedido_venda
                                     WHERE faturamento_pedido.data_faturamento >= '" . $dataAtivo . "'
                                       AND pedido_venda.cod_cliente = cliente.cod_cliente
                                       AND faturamento_pedido.estornado = 0)
                                 AND cliente.id_empresa = " . $empresa->id_empresa . " ) num_clientes_inativos_recentes");
        $this->db->select("(SELECT count(*)
                              FROM cliente
                              WHERE EXISTS
                                   (SELECT faturamento_pedido.cod_faturamento_pedido
                                     FROM faturamento_pedido
                                     JOIN pedido_venda ON pedido_venda.num_pedido_venda = faturamento_pedido.num_pedido_venda
                                    WHERE faturamento_pedido.data_faturamento < '" . $dataInativoRecente . "'
                                      AND pedido_venda.cod_cliente = cliente.cod_cliente
                                      AND faturamento_pedido.estornado = 0)
                                AND NOT EXISTS
                                  (SELECT faturamento_pedido.cod_faturamento_pedido
                                     FROM faturamento_pedido
                                     JOIN pedido_venda ON pedido_venda.num_pedido_venda = faturamento_pedido.num_pedido_venda
                                    WHERE faturamento_pedido.data_faturamento >= '" . $dataInativoRecente . "'
                                      AND pedido_venda.cod_cliente = cliente.cod_cliente
                                      AND faturamento_pedido.estornado = 0)
                                 AND cliente.id_empresa = " . $empresa->id_empresa . " ) num_clientes_inativos");
        $this->db->select("(SELECT count(*)
                              FROM cliente
                              WHERE NOT EXISTS
                                   (SELECT faturamento_pedido.cod_faturamento_pedido
                                     FROM faturamento_pedido
                                     JOIN pedido_venda ON pedido_venda.num_pedido_venda = faturamento_pedido.num_pedido_venda
                                    WHERE pedido_venda.cod_cliente = cliente.cod_cliente
                                      AND faturamento_pedido.estornado = 0)
                                 AND cliente.id_empresa = " . $empresa->id_empresa . " ) num_clientes_sem_compra");

        return $this->db->get()->row();

    }

    public function getClientesAtivos(){

        $empresa = $this->empresa->getEmpresaPorCodigo(getDadosUsuarioLogado()['id_empresa']);

        $dataAtivo = date('Y-m-d', strtotime('-' . $empresa->clientes_ativos . ' days'));
        $dataInativoRecente = date('Y-m-d', strtotime('-' . $empresa->clientes_inativos_recentes . ' days'));

        $this->db->where('cliente.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select("cliente.cod_cliente, cliente.nome_cliente, cliente.tipo_pessoa, cliente.razao_social");
        $this->db->select("(SELECT sum(faturamento_pedido.valor_bruto + faturamento_pedido.valor_frete + faturamento_pedido.valor_seguro + faturamento_pedido.outras_despesas - faturamento_pedido.valor_desconto)
                             FROM faturamento_pedido
                             JOIN pedido_venda ON pedido_venda.num_pedido_venda = faturamento_pedido.num_pedido_venda
                             WHERE pedido_venda.cod_cliente = cliente.cod_cliente
                              AND faturamento_pedido.estornado = 0) total_vendido");
         $this->db->select("(SELECT DATEDIFF(CURDATE(), faturamento_pedido.data_faturamento)
                               FROM faturamento_pedido
                               JOIN pedido_venda ON pedido_venda.num_pedido_venda = faturamento_pedido.num_pedido_venda
                              WHERE pedido_venda.cod_cliente = cliente.cod_cliente
                                AND faturamento_pedido.estornado = 0
                           ORDER BY faturamento_pedido.data_faturamento DESC
                              LIMIT 1) dias_ult_venda");
        $this->db->from("cliente");
        $this->db->where("EXISTS(SELECT *
                                   FROM faturamento_pedido
                                   JOIN pedido_venda ON pedido_venda.num_pedido_venda = faturamento_pedido.num_pedido_venda
                                  WHERE faturamento_pedido.data_faturamento >= '" . $dataAtivo . "'
                                    AND pedido_venda.cod_cliente = cliente.cod_cliente
                                    AND faturamento_pedido.estornado = 0)");
        $this->db->order_by('dias_ult_venda', 'desc');

        return $query = $this->db->get()->result();

    }

    public function getClientesInativosRecentes(){

        $empresa = $this->empresa->getEmpresaPorCodigo(getDadosUsuarioLogado()['id_empresa']);

        $dataAtivo = date('Y-m-d', strtotime('-' . $empresa->clientes_ativos . ' days'));
        $dataInativoRecente = date('Y-m-d', strtotime('-' . $empresa->clientes_inativos_recentes . ' days'));

        $this->db->where('cliente.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select("cliente.cod_cliente, cliente.nome_cliente, cliente.tipo_pessoa, cliente.razao_social");
        $this->db->select("(SELECT sum(faturamento_pedido.valor_bruto + faturamento_pedido.valor_frete + faturamento_pedido.valor_seguro + faturamento_pedido.outras_despesas - faturamento_pedido.valor_desconto)
                             FROM faturamento_pedido
                             JOIN pedido_venda ON pedido_venda.num_pedido_venda = faturamento_pedido.num_pedido_venda
                            WHERE pedido_venda.cod_cliente = cliente.cod_cliente
                              AND faturamento_pedido.estornado = 0) total_vendido");
         $this->db->select("(SELECT DATEDIFF(CURDATE(), faturamento_pedido.data_faturamento)
                               FROM faturamento_pedido
                               JOIN pedido_venda ON pedido_venda.num_pedido_venda = faturamento_pedido.num_pedido_venda
                              WHERE pedido_venda.cod_cliente = cliente.cod_cliente
                                AND faturamento_pedido.estornado = 0
                           ORDER BY faturamento_pedido.data_faturamento DESC
                              LIMIT 1) dias_ult_venda");
        $this->db->from("cliente");
        $this->db->where("EXISTS(SELECT *
                                   FROM faturamento_pedido
                                   JOIN pedido_venda ON pedido_venda.num_pedido_venda = faturamento_pedido.num_pedido_venda
                                  WHERE faturamento_pedido.data_faturamento >= '" . $dataInativoRecente . "'
                                    AND pedido_venda.cod_cliente = cliente.cod_cliente
                                    AND faturamento_pedido.estornado = 0)");
        $this->db->where("NOT EXISTS(SELECT *
                                   FROM faturamento_pedido
                                   JOIN pedido_venda ON pedido_venda.num_pedido_venda = faturamento_pedido.num_pedido_venda
                                  WHERE faturamento_pedido.data_faturamento >= '" . $dataAtivo . "'
                                    AND pedido_venda.cod_cliente = cliente.cod_cliente
                                    AND faturamento_pedido.estornado = 0)");
        $this->db->order_by('dias_ult_venda', 'desc');

        return $query = $this->db->get()->result();

    }

    public function getClientesInativos(){

        $empresa = $this->empresa->getEmpresaPorCodigo(getDadosUsuarioLogado()['id_empresa']);

        $dataAtivo = date('Y-m-d', strtotime('-' . $empresa->clientes_ativos . ' days'));
        $dataInativoRecente = date('Y-m-d', strtotime('-' . $empresa->clientes_inativos_recentes . ' days'));

        $this->db->where('cliente.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select("cliente.cod_cliente, cliente.nome_cliente, cliente.tipo_pessoa, cliente.razao_social");
        $this->db->select("(SELECT sum(faturamento_pedido.valor_bruto + faturamento_pedido.valor_frete + faturamento_pedido.valor_seguro + faturamento_pedido.outras_despesas - faturamento_pedido.valor_desconto)
                             FROM faturamento_pedido
                             JOIN pedido_venda ON pedido_venda.num_pedido_venda = faturamento_pedido.num_pedido_venda
                            WHERE pedido_venda.cod_cliente = cliente.cod_cliente
                              AND faturamento_pedido.estornado = 0) total_vendido");
         $this->db->select("(SELECT DATEDIFF(CURDATE(), faturamento_pedido.data_faturamento)
                               FROM faturamento_pedido
                               JOIN pedido_venda ON pedido_venda.num_pedido_venda = faturamento_pedido.num_pedido_venda
                              WHERE pedido_venda.cod_cliente = cliente.cod_cliente
                                AND faturamento_pedido.estornado = 0
                           ORDER BY faturamento_pedido.data_faturamento DESC
                              LIMIT 1) dias_ult_venda");
        $this->db->from("cliente");
        $this->db->where("EXISTS(SELECT *
                                   FROM faturamento_pedido
                                   JOIN pedido_venda ON pedido_venda.num_pedido_venda = faturamento_pedido.num_pedido_venda
                                  WHERE faturamento_pedido.data_faturamento < '" . $dataInativoRecente . "'
                                    AND pedido_venda.cod_cliente = cliente.cod_cliente
                                    AND faturamento_pedido.estornado = 0)");
        $this->db->where("NOT EXISTS(SELECT *
                                   FROM faturamento_pedido
                                   JOIN pedido_venda ON pedido_venda.num_pedido_venda = faturamento_pedido.num_pedido_venda
                                  WHERE faturamento_pedido.data_faturamento >= '" . $dataInativoRecente . "'
                                    AND pedido_venda.cod_cliente = cliente.cod_cliente
                                    AND faturamento_pedido.estornado = 0)");
        $this->db->order_by('dias_ult_venda', 'desc');

        return $query = $this->db->get()->result();

    }

    public function getClientesSemCompra(){

        $empresa = $this->empresa->getEmpresaPorCodigo(getDadosUsuarioLogado()['id_empresa']);

        $dataAtivo = date('Y-m-d', strtotime('-' . $empresa->clientes_ativos . ' days'));
        $dataInativoRecente = date('Y-m-d', strtotime('-' . $empresa->clientes_inativos_recentes . ' days'));

        $this->db->where('cliente.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select("cliente.cod_cliente, cliente.nome_cliente, cliente.tipo_pessoa, cliente.razao_social");
        $this->db->select("(SELECT sum(faturamento_pedido.valor_bruto + faturamento_pedido.valor_frete + faturamento_pedido.valor_seguro + faturamento_pedido.outras_despesas - faturamento_pedido.valor_desconto)
                             FROM faturamento_pedido
                             JOIN pedido_venda ON pedido_venda.num_pedido_venda = faturamento_pedido.num_pedido_venda
                            WHERE pedido_venda.cod_cliente = cliente.cod_cliente
                              AND faturamento_pedido.estornado = 0) total_vendido");
         $this->db->select("(SELECT DATEDIFF(CURDATE(), faturamento_pedido.data_faturamento)
                               FROM faturamento_pedido
                               JOIN pedido_venda ON pedido_venda.num_pedido_venda = faturamento_pedido.num_pedido_venda
                              WHERE pedido_venda.cod_cliente = cliente.cod_cliente
                                AND faturamento_pedido.estornado = 0
                           ORDER BY faturamento_pedido.data_faturamento DESC
                              LIMIT 1) dias_ult_venda");
        $this->db->from("cliente");
        $this->db->where("NOT EXISTS(SELECT *
                                   FROM faturamento_pedido
                                   JOIN pedido_venda ON pedido_venda.num_pedido_venda = faturamento_pedido.num_pedido_venda
                                  WHERE pedido_venda.cod_cliente = cliente.cod_cliente
                                    AND faturamento_pedido.estornado = 0)");
        $this->db->order_by('dias_ult_venda', 'desc');

        return $query = $this->db->get()->result();
        
    }

    public function getValoresVendasVendedores($dataInicio, $dataFim){

        $this->db->where('pedido_venda.id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('vendedor.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select("sum(faturamento_pedido.valor_bruto + faturamento_pedido.valor_frete + faturamento_pedido.valor_seguro + faturamento_pedido.outras_despesas - faturamento_pedido.valor_desconto) total_vendas");
        $this->db->select("sum(faturamento_pedido.valor_bruto) total_produto");
        $this->db->select("sum(faturamento_pedido.valor_desconto) total_desconto");
        $this->db->select("sum(faturamento_pedido.valor_frete) total_frete");
        $this->db->select("sum(faturamento_pedido.valor_seguro) total_seguro");
        $this->db->select("sum(faturamento_pedido.outras_despesas) outras_despesas");
        $this->db->from('faturamento_pedido');
        $this->db->join('pedido_venda', 'pedido_venda.num_pedido_venda = faturamento_pedido.num_pedido_venda');
        $this->db->join('vendedor', 'vendedor.cod_vendedor = faturamento_pedido.cod_vendedor');
        $this->db->where('faturamento_pedido.estornado', '0');
        $this->db->where('faturamento_pedido.data_faturamento >= ', $dataInicio);
        $this->db->where('faturamento_pedido.data_faturamento <= ', $dataFim);


        return $this->db->get()->row();

    }

    public function getValoresVendasVendedoresMeta($dataInicio, $dataFim, $mes, $ano, $codVendedor = null){

        $this->db->where('pedido_venda.id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('vendedor.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select("sum(faturamento_pedido.valor_bruto) valor_produto");
        $this->db->select("sum(0) valor_meta");
        $this->db->from('faturamento_pedido');
        $this->db->join('pedido_venda', 'pedido_venda.num_pedido_venda = faturamento_pedido.num_pedido_venda');
        $this->db->join('vendedor', 'vendedor.cod_vendedor = faturamento_pedido.cod_vendedor');
        $this->db->where('vendedor.ativo', '1');
        $this->db->where('faturamento_pedido.estornado', '0');
        $this->db->where('faturamento_pedido.data_faturamento >= ', $dataInicio);
        $this->db->where('faturamento_pedido.data_faturamento <= ', $dataFim);
        if($codVendedor != null){
            $this->db->where('vendedor.cod_vendedor', $codVendedor);
        }

        $faturamento = $this->db->get_compiled_select();

        $this->db->where('vendedor.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select("sum(0) valor_produto");
        switch($mes){
            case 1:
                $this->db->select('sum(meta_vendedor.janeiro) valor_meta');
                break;
            case 2:
                $this->db->select('sum(meta_vendedor.fevereiro) valor_meta');
                break;
            case 3:
                $this->db->select('sum(meta_vendedor.marco) valor_meta');
                break;
            case 4:
                $this->db->select('sum(meta_vendedor.abril) valor_meta');
                break;
            case 5:
                $this->db->select('sum(meta_vendedor.maio) valor_meta');
                break;
            case 6:
                $this->db->select('sum(meta_vendedor.junho) valor_meta');
                break;
            case 7:
                $this->db->select('sum(meta_vendedor.julho) valor_meta');
                break;
            case 8:
                $this->db->select('sum(meta_vendedor.agosto) valor_meta');
                break;
            case 9:
                $this->db->select('sum(meta_vendedor.setembro) valor_meta');
                break;
            case 10:
                $this->db->select('sum(meta_vendedor.outubro) valor_meta');
                break;
            case 11:
                $this->db->select('sum(meta_vendedor.novembro) valor_meta');
                break;
            case 12:
                $this->db->select('sum(meta_vendedor.dezembro) valor_meta');
                break;
        }

        $this->db->from('meta_vendedor');
        $this->db->join('vendedor', 'vendedor.cod_vendedor = meta_vendedor.cod_vendedor');
        $this->db->where('meta_vendedor.ano', $ano);
        if($codVendedor != null){
            $this->db->where('vendedor.cod_vendedor', $codVendedor);
        }

        $meta = $this->db->get_compiled_select();
        
        $this->db->select('sum(totais.valor_produto) total_produto');
        $this->db->select('sum(totais.valor_meta) total_meta');
        $this->db->from("($faturamento UNION $meta) totais");

        return $this->db->get()->row();

    }    

    public function getStatusVenda($dataInicio, $dataFim){
        $this->db->where('pedido_venda.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select("count(produto_venda.num_pedido_venda) total");
        $this->db->select("sum(if(data_entrega < CURRENT_DATE() and produto_venda.status != 3 and produto_venda.status != 4, 1, 0)) atrasado");
        $this->db->select("sum(if(produto_venda.status = 1 and data_entrega >= CURRENT_DATE(), 1, 0)) pendente");
        $this->db->select("sum(if(produto_venda.status = 2 and data_entrega >= CURRENT_DATE(), 1, 0)) produzido_parcial");
        $this->db->select("sum(if(produto_venda.status = 3, 1, 0)) produzido_total");
        $this->db->select("sum(if(produto_venda.status = 4, 1, 0)) estornado");
        $this->db->from('produto_venda');
        $this->db->join('pedido_venda', 'pedido_venda.num_pedido_venda = produto_venda.num_pedido_venda');
        $this->db->where('pedido_venda.data_entrega >= ', $dataInicio);
        $this->db->where('pedido_venda.data_entrega <= ', $dataFim);

        return $query = $this->db->get()->row();


    }

    public function getTicketMedio($dataInicio, $dataFim){
        $this->db->where('pedido_venda.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select("count(faturamento_pedido.cod_faturamento_pedido) num_venda");
        $this->db->select("sum(faturamento_pedido.valor_bruto + faturamento_pedido.valor_frete + faturamento_pedido.valor_seguro + 
                               faturamento_pedido.outras_despesas - faturamento_pedido.valor_desconto) valor_venda");
        $this->db->from('faturamento_pedido');
        $this->db->join('pedido_venda', 'pedido_venda.num_pedido_venda = faturamento_pedido.num_pedido_venda');
        $this->db->where('faturamento_pedido.estornado', 0);
        $this->db->where('faturamento_pedido.data_faturamento >= ', $dataInicio);
        $this->db->where('faturamento_pedido.data_faturamento <= ', $dataFim);

        $pedidoVenda = $this->db->get_compiled_select();

        $this->db->where('venda_caixa.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select("count(venda_caixa.num_venda_caixa) num_venda");
        $this->db->select("sum(venda_caixa.valor_bruto + venda_caixa.valor_frete +
                            if(venda_caixa.tipo_desconto = 1, venda_caixa.valor_desconto, venda_caixa.valor_bruto * (venda_caixa.valor_desconto / 100))) valor_venda");
        $this->db->from('venda_caixa');
        $this->db->where('venda_caixa.status', 2);
        $this->db->where('venda_caixa.data_caixa >= ', $dataInicio);
        $this->db->where('venda_caixa.data_caixa <= ', $dataFim);

        $frenteCaixa = $this->db->get_compiled_select();

        $this->db->select('sum(ticket_medio.num_venda) num_venda');
        $this->db->select('sum(ticket_medio.valor_venda) valor_venda');
        $this->db->from("($pedidoVenda UNION $frenteCaixa) ticket_medio");

        return $query = $this->db->get()->row();       

    }

    public function getVendasPorDia($dataInicio, $dataFim){

        $this->db->select('tim.db_date as data,
                            tim.month_name as nome_mes,
                        sum(IFNULL(venda.quant_venda, 0)) as venda_dia                       
                        from time_dimension tim');
        $this->db->join('(
                            SELECT faturamento_pedido.data_faturamento as data_venda,
                                  SUM(faturamento_pedido.valor_bruto + 
                                  faturamento_pedido.valor_frete +
                                  faturamento_pedido.valor_seguro +
                                  faturamento_pedido.outras_despesas - 
                                  faturamento_pedido.valor_desconto) quant_venda
                             FROM faturamento_pedido 
                             JOIN pedido_venda ON pedido_venda.num_pedido_venda = faturamento_pedido.num_pedido_venda
                            WHERE pedido_venda.id_empresa = ' . getDadosUsuarioLogado()['id_empresa'] . '
                              AND faturamento_pedido.estornado = 0
                            GROUP BY faturamento_pedido.data_faturamento
                            UNION
                            SELECT venda_caixa.data_caixa as data_venda,
                                   SUM(venda_caixa.valor_bruto + 
                                   venda_caixa.valor_frete - 
                                   IF(venda_caixa.tipo_desconto = 1, venda_caixa.valor_desconto, venda_caixa.valor_bruto * (venda_caixa.valor_desconto / 100))) quant_venda
                              FROM venda_caixa
                             WHERE venda_caixa.id_empresa = ' . getDadosUsuarioLogado()['id_empresa'] . '
                               AND venda_caixa.status = 2
                          GROUP BY venda_caixa.data_caixa
                        ) as venda', 'venda on venda.data_venda = tim.db_date ', 'left');
        $this->db->where('tim.db_date <= CURRENT_DATE()');
        $this->db->order_by('tim.db_date', 'asc');
        $this->db->group_by('tim.db_date');

        $this->db->where("tim.db_date >= ", $dataInicio);
        $this->db->where("tim.db_date <= ", $dataFim);

        return $query = $this->db->get()->result();
    }

    public function getVendasAno($dataInicio, $dataFim){

        $this->db->select('tim.year as ano,
                           tim.month as mes,
                           tim.month_name as nome_mes,
                        sum(IFNULL(venda.quant_venda, 0)) as venda_mes                       
                        from time_dimension tim');
        $this->db->join('(
                            SELECT faturamento_pedido.data_faturamento as data_venda,
                                  SUM(faturamento_pedido.valor_bruto + 
                                  faturamento_pedido.valor_frete +
                                  faturamento_pedido.valor_seguro +
                                  faturamento_pedido.outras_despesas - 
                                  faturamento_pedido.valor_desconto) quant_venda
                             FROM faturamento_pedido 
                             JOIN pedido_venda ON pedido_venda.num_pedido_venda = faturamento_pedido.num_pedido_venda
                            WHERE pedido_venda.id_empresa = ' . getDadosUsuarioLogado()['id_empresa'] . '
                              AND faturamento_pedido.estornado = 0
                            GROUP BY faturamento_pedido.data_faturamento
                            UNION
                            SELECT venda_caixa.data_caixa as data_venda,
                                   SUM(venda_caixa.valor_bruto + 
                                   venda_caixa.valor_frete - 
                                   IF(venda_caixa.tipo_desconto = 1, venda_caixa.valor_desconto, venda_caixa.valor_bruto * (venda_caixa.valor_desconto / 100))) quant_venda
                              FROM venda_caixa
                             WHERE venda_caixa.id_empresa = ' . getDadosUsuarioLogado()['id_empresa'] . '
                               AND venda_caixa.status = 2
                          GROUP BY venda_caixa.data_caixa
                        ) as venda', 'venda on venda.data_venda = tim.db_date ', 'left');
        $this->db->where('tim.db_date <= CURRENT_DATE()');
        $this->db->group_by('tim.month');
        $this->db->order_by('tim.month', 'asc');

        $this->db->where("tim.db_date >= ", $dataInicio);
        $this->db->where("tim.db_date <= ", $dataFim);

        return $query = $this->db->get()->result();
    }

    public function getVendaPendente($dataInicio, $dataFim){
        $this->db->where('pedido_venda.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select("sum((SELECT SUM(faturamento_pedido.valor_bruto + 
                                   faturamento_pedido.valor_frete +
                                   faturamento_pedido.valor_seguro +
                                   faturamento_pedido.outras_despesas - 
                                   faturamento_pedido.valor_desconto)
                            FROM faturamento_pedido 
                           WHERE faturamento_pedido.num_pedido_venda = pedido_venda.num_pedido_venda
                             AND faturamento_pedido.estornado = 0)) total_faturado");
        $this->db->select('sum(pedido_venda.valor_frete) valor_frete');
        $this->db->select('sum(pedido_venda.valor_seguro)');
        $this->db->select('sum(pedido_venda.outras_despesas)');
        $this->db->select('sum((select sum(produto_venda.quant_pedida * produto_venda.valor_unitario) 
                             from produto_venda
                            where produto_venda.num_pedido_venda = pedido_venda.num_pedido_venda)) valor_produto');
        $this->db->select('sum(if(pedido_venda.tipo_desconto = 1, pedido_venda.valor_desconto, 
                                 (select sum(produto_venda.quant_pedida * produto_venda.valor_unitario) 
                                    from produto_venda
                                   where produto_venda.num_pedido_venda = pedido_venda.num_pedido_venda) * (pedido_venda.valor_desconto / 100))) valor_desconto');
        $this->db->from('pedido_venda');
        $this->db->where('pedido_venda.situacao', 3);
        //$this->db->where('(valor_produto + valor_frete + pedido_venda.valor_seguro + pedido_venda.valor_seguro - valor_desconto) >', 'total_faturado');
        $this->db->where('pedido_venda.data_entrega >= ', $dataInicio);
        $this->db->where('pedido_venda.data_entrega <= ', $dataFim);
                     
        return $this->db->get()->row();

    }

    public function getVendaOrcamento($dataInicio, $dataFim){
        $this->db->where('pedido_venda.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('sum(pedido_venda.valor_frete) valor_frete');
        $this->db->select('sum(pedido_venda.valor_seguro) valor_seguro');
        $this->db->select('sum(pedido_venda.outras_despesas) outras_despesas');
        $this->db->select('sum((select sum(produto_venda.quant_pedida * produto_venda.valor_unitario) 
                             from produto_venda
                            where produto_venda.num_pedido_venda = pedido_venda.num_pedido_venda)) valor_produto');
        $this->db->select('sum(if(pedido_venda.tipo_desconto = 1, pedido_venda.valor_desconto, 
                                 (select sum(produto_venda.quant_pedida * produto_venda.valor_unitario) 
                                    from produto_venda
                                   where produto_venda.num_pedido_venda = pedido_venda.num_pedido_venda) * (pedido_venda.valor_desconto / 100))) valor_desconto');
        $this->db->from('pedido_venda');
        $this->db->where('pedido_venda.situacao', 1);
        $this->db->where('pedido_venda.data_entrega >= ', $dataInicio);
        $this->db->where('pedido_venda.data_entrega <= ', $dataFim);

        return $this->db->get()->row();

    }

    public function getOrcamentoReprov($dataInicio, $dataFim){
        $this->db->where('pedido_venda.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('sum(pedido_venda.valor_frete) valor_frete');
        $this->db->select('sum(pedido_venda.valor_seguro) valor_seguro');
        $this->db->select('sum(pedido_venda.outras_despesas) outras_despesas');
        $this->db->select('sum((select sum(produto_venda.quant_pedida * produto_venda.valor_unitario) 
                                 from produto_venda
                                 where produto_venda.num_pedido_venda = pedido_venda.num_pedido_venda)) valor_produto');
        $this->db->select('sum(if(pedido_venda.tipo_desconto = 1, pedido_venda.valor_desconto, 
                                 (select sum(produto_venda.quant_pedida * produto_venda.valor_unitario) 
                                    from produto_venda
                                   where produto_venda.num_pedido_venda = pedido_venda.num_pedido_venda) * (pedido_venda.valor_desconto / 100))) valor_desconto');
        $this->db->from('pedido_venda');
        $this->db->where('pedido_venda.situacao', 2);
        $this->db->where('pedido_venda.data_entrega >= ', $dataInicio);
        $this->db->where('pedido_venda.data_entrega <= ', $dataFim);

        return $this->db->get()->row();

    }

    public function getVendasCliente($dataInicio, $dataFim){

        $this->db->where('pedido_venda.id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('cliente.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select("pedido_venda.cod_cliente, cliente.nome_cliente");
        $this->db->select("sum(faturamento_pedido.valor_bruto) total_vendas");
        $this->db->select("sum(faturamento_pedido.valor_desconto) total_desconto");
        $this->db->select("sum(faturamento_pedido.valor_frete) total_frete");
        $this->db->select("sum(faturamento_pedido.valor_seguro) total_seguro");
        $this->db->select("sum(faturamento_pedido.outras_despesas) outras_despesas");
        $this->db->select("concat('#',SUBSTRING((lpad(hex(round(rand() * 10000000)),6,0)),-6)) color");
        $this->db->from('faturamento_pedido');
        $this->db->join('pedido_venda', 'pedido_venda.num_pedido_venda = faturamento_pedido.num_pedido_venda');
        $this->db->join('cliente', 'cliente.cod_cliente = pedido_venda.cod_cliente');
        $this->db->where('faturamento_pedido.estornado', '0');
        $this->db->where('faturamento_pedido.data_faturamento >= ', $dataInicio);
        $this->db->where('faturamento_pedido.data_faturamento <= ', $dataFim);
        $this->db->group_by('pedido_venda.cod_cliente');
        
        $pedidoVenda = $this->db->get_compiled_select();

        $this->db->where('venda_caixa.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select("venda_caixa.cod_cliente, IFNULL(cliente.nome_cliente, 'Consumidor Final') nome_cliente");
        $this->db->select("sum(venda_caixa.valor_bruto) total_vendas");
        $this->db->select("sum(IF(venda_caixa.tipo_desconto = 1, venda_caixa.valor_desconto, venda_caixa.valor_bruto * (venda_caixa.valor_desconto / 100))) total_desconto");
        $this->db->select("sum(venda_caixa.valor_frete) total_frete");
        $this->db->select("sum(0) total_seguro");
        $this->db->select("sum(0) outras_despesas");
        $this->db->select("concat('#',SUBSTRING((lpad(hex(round(rand() * 10000000)),6,0)),-6)) color");
        $this->db->from('venda_caixa');
        $this->db->join('cliente', 'cliente.cod_cliente = venda_caixa.cod_cliente', 'left');
        $this->db->where('venda_caixa.status', '2');
        $this->db->where('venda_caixa.data_caixa >= ', $dataInicio);
        $this->db->where('venda_caixa.data_caixa <= ', $dataFim);
        $this->db->group_by('venda_caixa.cod_cliente');

        $frenteCaixa = $this->db->get_compiled_select();

        $this->db->select('clientes.*');
        $this->db->from("($pedidoVenda UNION $frenteCaixa) clientes");
        $this->db->order_by('clientes.total_vendas', 'desc');
        $this->db->group_by('clientes.cod_cliente');
        //$this->db->limit(10);

        return $this->db->get()->result();

    }
    

    public function getVendasProduto($dataInicio, $dataFim, $codCliente = "", $codVendedor = ""){

        $this->db->where('produto.id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('pedido_venda.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('produto.*');
        $this->db->select('sum(faturamento_pedido_produto.quantidade) quant_vendido');
        $this->db->select('sum(faturamento_pedido_produto.valor_unitario *
                               faturamento_pedido_produto.quantidade) valor_total');
        $this->db->select("concat('#',SUBSTRING((lpad(hex(round(rand() * 10000000)),6,0)),-6)) color");
        $this->db->from('faturamento_pedido_produto');
        $this->db->join('produto', 'produto.cod_produto = faturamento_pedido_produto.cod_produto');
        $this->db->join('faturamento_pedido', 'faturamento_pedido.cod_faturamento_pedido = faturamento_pedido_produto.faturamento_pedido');
        $this->db->join('pedido_venda', 'pedido_venda.num_pedido_venda = faturamento_pedido.num_pedido_venda');
        $this->db->where('faturamento_pedido.estornado', '0');
        $this->db->group_by('faturamento_pedido_produto.cod_produto');

        if($codCliente != ""){
            $this->db->where("pedido_venda.cod_cliente", $codCliente);
        }

        if($codVendedor != ""){
            $this->db->where("pedido_venda.cod_vendedor", $codVendedor);
        }
        

        $this->db->where("faturamento_pedido.data_faturamento >= ", $dataInicio);
        $this->db->where("faturamento_pedido.data_faturamento <= ", $dataFim);

        $pedidoVenda = $this->db->get_compiled_select();

        $this->db->where('produto.id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('venda_caixa.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('produto.*');
        $this->db->select('sum(produto_venda_caixa.quant_venda) quant_vendido');
        $this->db->select('sum(produto_venda_caixa.quant_venda * 
                               produto_venda_caixa.valor_unit) valor_total');
        $this->db->select("concat('#',SUBSTRING((lpad(hex(round(rand() * 10000000)),6,0)),-6)) color");
        $this->db->from('produto_venda_caixa');
        $this->db->join('produto', 'produto.cod_produto = produto_venda_caixa.cod_produto');
        $this->db->join('venda_caixa', 'venda_caixa.num_venda_caixa = produto_venda_caixa.num_venda_caixa');
        $this->db->where('venda_caixa.status', '2');
        $this->db->group_by('produto_venda_caixa.cod_produto');

        if($codCliente != ""){
            $this->db->where("venda_caixa.cod_cliente", $codCliente);
        }
        

        $this->db->where("venda_caixa.data_caixa >= ", $dataInicio);
        $this->db->where("venda_caixa.data_caixa <= ", $dataFim);

        $frenteCaixa = $this->db->get_compiled_select();

        $this->db->select('produtos.*');
        $this->db->from("($pedidoVenda UNION $frenteCaixa) produtos");
        $this->db->order_by('produtos.valor_total', 'desc');
        $this->db->group_by('produtos.cod_produto');
        //$this->db->limit(10);


        return $this->db->get()->result();

    }

    public function getVendasProdutoVendedor($dataInicio, $dataFim){

        $this->db->where('produto.id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('pedido_venda.id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('vendedor.nome_usuario', getDadosUsuarioLogado()['usuario']);

        $this->db->select('produto.*');
        $this->db->select('sum(faturamento_pedido_produto.quantidade) quant_vendido');
        $this->db->select('sum(faturamento_pedido_produto.valor_unitario *
                               faturamento_pedido_produto.quantidade) valor_total');
        $this->db->from('faturamento_pedido_produto');
        $this->db->join('produto', 'produto.cod_produto = faturamento_pedido_produto.cod_produto');
        $this->db->join('faturamento_pedido', 'faturamento_pedido.cod_faturamento_pedido = faturamento_pedido_produto.faturamento_pedido');
        $this->db->join('pedido_venda', 'pedido_venda.num_pedido_venda = faturamento_pedido.num_pedido_venda');
        $this->db->join('vendedor', 'vendedor.cod_vendedor = pedido_venda.cod_vendedor');
        $this->db->where('faturamento_pedido.estornado', '0');
        $this->db->order_by('valor_total', 'desc');
        $this->db->group_by('faturamento_pedido_produto.cod_produto');
        

        $this->db->where("faturamento_pedido.data_faturamento >= ", $dataInicio);
        $this->db->where("faturamento_pedido.data_faturamento <= ", $dataFim);


        return $this->db->get()->result();

    }

    public function getValoresVendasVendedor($dataInicio, $dataFim){

        $this->db->where('pedido_venda.id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('vendedor.nome_usuario', getDadosUsuarioLogado()['usuario']);

        $this->db->select("sum(faturamento_pedido.valor_bruto + faturamento_pedido.valor_frete + faturamento_pedido.valor_seguro + faturamento_pedido.outras_despesas - faturamento_pedido.valor_desconto) total_vendas");
        $this->db->select("sum(faturamento_pedido.valor_bruto) total_produto");
        $this->db->select("sum(faturamento_pedido.valor_desconto) total_desconto");
        $this->db->select("sum(faturamento_pedido.valor_frete) total_frete");
        $this->db->select("sum(faturamento_pedido.valor_seguro) total_seguro");
        $this->db->select("sum(faturamento_pedido.outras_despesas) outras_despesas");
        $this->db->from('faturamento_pedido');
        $this->db->join('pedido_venda', 'pedido_venda.num_pedido_venda = faturamento_pedido.num_pedido_venda');
        $this->db->join('vendedor', 'vendedor.cod_vendedor = pedido_venda.cod_vendedor');
        $this->db->where('faturamento_pedido.estornado', '0');
        $this->db->where('faturamento_pedido.data_faturamento >= ', $dataInicio);
        $this->db->where('faturamento_pedido.data_faturamento <= ', $dataFim);


        return $this->db->get()->row();

    }

    public function getVendasClienteVendedor($dataInicio, $dataFim){

        $this->db->where('pedido_venda.id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('cliente.id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('vendedor.nome_usuario', getDadosUsuarioLogado()['usuario']);

        $this->db->select("pedido_venda.cod_cliente, cliente.nome_cliente");
        $this->db->select("sum(faturamento_pedido.valor_bruto) total_vendas");
        $this->db->select("sum(faturamento_pedido.valor_desconto) total_desconto");
        $this->db->select("sum(faturamento_pedido.valor_frete) total_frete");
        $this->db->select("sum(faturamento_pedido.valor_seguro) total_seguro");
        $this->db->select("sum(faturamento_pedido.outras_despesas) outras_despesas");
        $this->db->select("concat('#',SUBSTRING((lpad(hex(round(rand() * 10000000)),6,0)),-6)) color");
        $this->db->from('faturamento_pedido');
        $this->db->join('pedido_venda', 'pedido_venda.num_pedido_venda = faturamento_pedido.num_pedido_venda');
        $this->db->join('vendedor', 'vendedor.cod_vendedor = pedido_venda.cod_vendedor');
        $this->db->join('cliente', 'cliente.cod_cliente = pedido_venda.cod_cliente');
        $this->db->where('faturamento_pedido.estornado', '0');
        $this->db->where('faturamento_pedido.data_faturamento >= ', $dataInicio);
        $this->db->where('faturamento_pedido.data_faturamento <= ', $dataFim);
        $this->db->group_by('pedido_venda.cod_cliente');
        $this->db->order_by('total_vendas', 'desc');

        return $this->db->get()->result();

    }

    public function clienteResumida($dataInicio, $dataFim, $codClientes){
        
        $this->db->where('pedido_venda.id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('cliente.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('pedido_venda.cod_cliente, cliente.nome_cliente, cliente.cnpj_cpf, segmento.nome_segmento');
        $this->db->select("sum(faturamento_pedido.valor_bruto) total_produto");        
        $this->db->select("sum(faturamento_pedido.valor_frete) total_frete");
        $this->db->select("sum(faturamento_pedido.valor_seguro) total_seguro");
        $this->db->select("sum(faturamento_pedido.outras_despesas) outras_despesas");
        $this->db->select("sum(faturamento_pedido.valor_desconto) total_desconto");
        $this->db->from('faturamento_pedido');
        $this->db->join('pedido_venda', 'pedido_venda.num_pedido_venda = faturamento_pedido.num_pedido_venda');
        $this->db->join('cliente', 'cliente.cod_cliente = pedido_venda.cod_cliente');
        $this->db->join('segmento', 'segmento.cod_segmento = cliente.cod_segmento', 'left');
        $this->db->where('faturamento_pedido.estornado', '0');
        $this->db->group_by('pedido_venda.cod_cliente');

        $this->db->where("faturamento_pedido.data_faturamento >= ", $dataInicio);
        $this->db->where("faturamento_pedido.data_faturamento <= ", $dataFim);

        if($codClientes != ""){
            $this->db->where_in('pedido_venda.cod_cliente', $codClientes);
        }

        $pedidoVenda = $this->db->get_compiled_select();

        $this->db->where('venda_caixa.id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('venda_caixa.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('venda_caixa.cod_cliente, cliente.nome_cliente, cliente.cnpj_cpf, segmento.nome_segmento');
        $this->db->select("sum(venda_caixa.valor_bruto) total_produto");        
        $this->db->select("sum(venda_caixa.valor_frete) total_frete");
        $this->db->select("sum(0) total_seguro");
        $this->db->select("sum(0) outras_despesas");
        $this->db->select("sum(IF(venda_caixa.tipo_desconto = 1, venda_caixa.valor_desconto, venda_caixa.valor_bruto * (venda_caixa.valor_desconto / 100))) total_desconto");
        $this->db->from('venda_caixa');
        $this->db->join('cliente', 'cliente.cod_cliente = venda_caixa.cod_cliente', 'left');
        $this->db->join('segmento', 'segmento.cod_segmento = cliente.cod_segmento', 'left');
        $this->db->where('venda_caixa.status', '2');        
        $this->db->group_by('venda_caixa.cod_cliente');

        $this->db->where('venda_caixa.data_caixa >= ', $dataInicio);
        $this->db->where('venda_caixa.data_caixa <= ', $dataFim);

        if($codClientes != ""){
            $this->db->where_in('venda_caixa.cod_cliente', $codClientes);
        }

        $frenteCaixa = $this->db->get_compiled_select();

        $this->db->select('vendas.cod_cliente, vendas.nome_cliente, vendas.cnpj_cpf, vendas.nome_segmento');
        $this->db->select('sum(vendas.total_produto) total_produto');
        $this->db->select('sum(vendas.total_frete) total_frete'); 
        $this->db->select('sum(vendas.total_seguro) total_seguro'); 
        $this->db->select('sum(vendas.outras_despesas) outras_despesas'); 
        $this->db->select('sum(vendas.total_desconto) total_desconto');         
        $this->db->from("($pedidoVenda UNION $frenteCaixa) vendas");
        $this->db->order_by('vendas.total_produto', 'desc');
        $this->db->group_by('vendas.cod_cliente');

        return $this->db->get()->result();

    }

    public function clienteDetalhada($dataInicio, $dataFim, $codClientes){
        $this->db->where('pedido_venda.id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('cliente.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('cliente.*');
        $this->db->select('"Pedido Venda" as tipo_venda, faturamento_pedido.data_faturamento as data_venda, pedido_venda.num_pedido_venda num_venda');
        $this->db->select('faturamento_pedido.cod_faturamento_pedido as num_faturamento');
        $this->db->select('faturamento_pedido.cod_vendedor, faturamento_pedido.perc_comissao, vendedor.nome_vendedor');
        $this->db->select('faturamento_pedido.valor_bruto, faturamento_pedido.valor_frete, faturamento_pedido.valor_seguro');
        $this->db->select('faturamento_pedido.outras_despesas, faturamento_pedido.valor_desconto');
        $this->db->select('usuario.nome_usuario');
        $this->db->select('faturamento_pedido.cod_transportador, transportador.nome_transportador');
        $this->db->select('faturamento_pedido.tipo_frete');
        $this->db->select('faturamento_pedido.observacoes');

        $this->db->from('faturamento_pedido');
        $this->db->join('pedido_venda', 'pedido_venda.num_pedido_venda = faturamento_pedido.num_pedido_venda');
        $this->db->join('cliente', 'cliente.cod_cliente = pedido_venda.cod_cliente');
        $this->db->join('vendedor', 'vendedor.cod_vendedor = faturamento_pedido.cod_vendedor', 'left');
        $this->db->join('usuario', 'usuario.email = faturamento_pedido.usuario', 'left');
        $this->db->join('transportador', 'transportador.cod_transportador = faturamento_pedido.cod_transportador', 'left');
        
        $this->db->where('faturamento_pedido.estornado', '0');
        $this->db->where('faturamento_pedido.data_faturamento >= ', $dataInicio);
        $this->db->where('faturamento_pedido.data_faturamento <= ', $dataFim);

        if($codClientes != ""){
            $this->db->where_in('pedido_venda.cod_cliente', $codClientes);
        }

        $pedidoVenda = $this->db->get_compiled_select();

        $this->db->where('venda_caixa.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('cliente.*');
        $this->db->select('"Frente de Caixa" as tipo_venda, venda_caixa.data_caixa as data_venda, venda_caixa.num_venda_caixa num_venda');
        $this->db->select('venda_caixa.num_venda_caixa as num_faturamento');
        $this->db->select('"" as cod_vendedor, 0 as perc_comissao, " " as nome_vendedor');
        $this->db->select('venda_caixa.valor_bruto, venda_caixa.valor_frete, 0 as valor_seguro, 0 as outras_despesas');
        $this->db->select("if(venda_caixa.tipo_desconto = 1, venda_caixa.valor_desconto, venda_caixa.valor_bruto * (venda_caixa.valor_desconto / 100)) valor_desconto");
        $this->db->select('usuario.nome_usuario');
        $this->db->select('venda_caixa.cod_transportador, transportador.nome_transportador');
        $this->db->select('0 as tipo_frete');
        $this->db->select('"" as observacoes');

        $this->db->from('venda_caixa');
        $this->db->join('cliente', 'cliente.cod_cliente = venda_caixa.cod_cliente and cliente.id_empresa = ' . getDadosUsuarioLogado()['id_empresa'], 'left');
        $this->db->join('usuario', 'usuario.email = venda_caixa.usuario', 'left');
        $this->db->join('transportador', 'transportador.cod_transportador = venda_caixa.cod_transportador', 'left');

        $this->db->where('venda_caixa.status', '2');

        $this->db->where("venda_caixa.data_caixa >= ", $dataInicio);
        $this->db->where("venda_caixa.data_caixa <= ", $dataFim);

        if($codClientes != ""){
            $this->db->where_in('venda_caixa.cod_cliente', $codClientes);
        }

        $frenteCaixa = $this->db->get_compiled_select();

        $this->db->select('vendas.*');
        $this->db->from("($pedidoVenda UNION $frenteCaixa) vendas");
        $this->db->order_by('vendas.data_venda', 'desc');

        return $this->db->get()->result();

    }

    public function totalVendaVendedor($dataInicio, $dataFim, $codVendedor){
        $this->db->where('pedido_venda.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('sum(faturamento_pedido.valor_bruto + faturamento_pedido.valor_frete - faturamento_pedido.valor_desconto) total_venda, 
                           sum(if(vendedor.cons_frete = 1, (faturamento_pedido.valor_bruto + faturamento_pedido.valor_frete - faturamento_pedido.valor_desconto),
                           (faturamento_pedido.valor_bruto - faturamento_pedido.valor_desconto)) * (pedido_venda.perc_comissao / 100)) total_comissao');
        $this->db->from('faturamento_pedido');
        $this->db->join('pedido_venda', 'pedido_venda.num_pedido_venda = faturamento_pedido.num_pedido_venda');
        $this->db->join('vendedor', 'vendedor.cod_vendedor = pedido_venda.cod_vendedor');
        $this->db->where('faturamento_pedido.estornado', '0');

        $this->db->where("faturamento_pedido.data_faturamento >= ", $dataInicio);
        $this->db->where("faturamento_pedido.data_faturamento <= ", $dataFim);

        if($codVendedor != ""){
            $this->db->where_in('pedido_venda.cod_vendedor', $codVendedor);
        }

        return $query = $this->db->get()->row();

    }

    public function getVendaVendedor($dataInicio, $dataFim){
        $this->db->where('pedido_venda.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('vendedor.cod_vendedor, vendedor.nome_vendedor');
        $this->db->select('sum(faturamento_pedido.valor_bruto + faturamento_pedido.valor_frete + 
                               faturamento_pedido.valor_seguro + faturamento_pedido.outras_despesas -
                               faturamento_pedido.valor_desconto) total_venda');
        $this->db->select('sum(faturamento_pedido.valor_bruto * (faturamento_pedido.perc_comissao / 100)) total_comissao');
        $this->db->from('faturamento_pedido');
        $this->db->join('pedido_venda', 'pedido_venda.num_pedido_venda = faturamento_pedido.num_pedido_venda');
        $this->db->join('vendedor', 'vendedor.cod_vendedor = faturamento_pedido.cod_vendedor');
        $this->db->where('faturamento_pedido.estornado', '0');

        $this->db->where("faturamento_pedido.data_faturamento >= ", $dataInicio);
        $this->db->where("faturamento_pedido.data_faturamento <= ", $dataFim);

        $this->db->order_by('total_venda', 'desc');
        $this->db->group_by('vendedor.cod_vendedor');

        return $query = $this->db->get()->result();

    }

    public function getMetaMesPorVendedor($codVendedor, $mes, $ano){

        switch($mes){
            case 1:
                $this->db->select('sum(meta_vendedor.janeiro) valor_meta');
                break;
            case 2:
                $this->db->select('sum(meta_vendedor.fevereiro) valor_meta');
                break;
            case 3:
                $this->db->select('sum(meta_vendedor.marco) valor_meta');
                break;
            case 4:
                $this->db->select('sum(meta_vendedor.abril) valor_meta');
                break;
            case 5:
                $this->db->select('sum(meta_vendedor.maio) valor_meta');
                break;
            case 6:
                $this->db->select('sum(meta_vendedor.junho) valor_meta');
                break;
            case 7:
                $this->db->select('sum(meta_vendedor.julho) valor_meta');
                break;
            case 8:
                $this->db->select('sum(meta_vendedor.agosto) valor_meta');
                break;
            case 9:
                $this->db->select('sum(meta_vendedor.setembro) valor_meta');
                break;
            case 10:
                $this->db->select('sum(meta_vendedor.outubro) valor_meta');
                break;
            case 11:
                $this->db->select('sum(meta_vendedor.novembro) valor_meta');
                break;
            case 12:
                $this->db->select('sum(meta_vendedor.dezembro) valor_meta');
                break;
        }

        $this->db->from('meta_vendedor');
        $this->db->where('meta_vendedor.cod_vendedor', $codVendedor);
        $this->db->where('meta_vendedor.ano', $ano);

        return $query = $this->db->get()->row();

    }

    public function getComissaoPorVendedor($codVendedor, $venda){
        
        $this->db->select('comissao_vendedor.perc_comissao, comissao_vendedor.ate_valor');
        $this->db->from('comissao_vendedor');
        $this->db->where('comissao_vendedor.cod_vendedor', $codVendedor);
        $this->db->where('comissao_vendedor.ate_valor >=', $venda);
        $this->db->order_by('comissao_vendedor.ate_valor', 'asc');
        $this->db->limit(1);

        return $query = $this->db->get()->row();

    }

    public function getEmissaoComissao($ano, $mes){
        $this->db->where('vendedor.id_empresa', getDadosUsuarioLogado()['id_empresa']);
        
        $this->db->select('emissao_comissao.*');
        $this->db->from('emissao_comissao');
        $this->db->join('vendedor', 'vendedor.cod_vendedor = emissao_comissao.cod_vendedor');
        $this->db->where('emissao_comissao.ano', $ano);
        $this->db->where('emissao_comissao.mes', $mes);

        return $query = $this->db->get()->result();

    }    

    public function getNotasClientePorVendedor($data){
        
        $this->db->select('notas_cliente.*');
        $this->db->select('cliente.nome_cliente');
        $this->db->from('notas_cliente');
        $this->db->join('cliente', 'cliente.cod_cliente = notas_cliente.cod_cliente');
        $this->db->where('notas_cliente.cod_vendedor', getDadosUsuarioLogado()['cod_vendedor']);
        $this->db->where('notas_cliente.data_nota', $data);

        return $query = $this->db->get()->result();

    }

    public function vendedorResumida($dataInicio, $dataFim, $codVendedor){
        $this->db->where('pedido_venda.id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('vendedor.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('faturamento_pedido.cod_vendedor, vendedor.nome_vendedor');
        $this->db->select('sum(faturamento_pedido.valor_bruto + faturamento_pedido.valor_frete - faturamento_pedido.valor_desconto) total_venda'); 
        $this->db->select('sum(if(vendedor.cons_frete = 1, (faturamento_pedido.valor_bruto + faturamento_pedido.valor_frete - faturamento_pedido.valor_desconto),
                           (faturamento_pedido.valor_bruto - faturamento_pedido.valor_desconto)) * (faturamento_pedido.perc_comissao / 100)) total_comissao');
        $this->db->from('faturamento_pedido');
        $this->db->join('pedido_venda', 'pedido_venda.num_pedido_venda = faturamento_pedido.num_pedido_venda');
        $this->db->join('vendedor', 'vendedor.cod_vendedor = faturamento_pedido.cod_vendedor');
        $this->db->where('faturamento_pedido.estornado', '0');
        $this->db->group_by('faturamento_pedido.cod_vendedor');

        $this->db->where("faturamento_pedido.data_faturamento >= ", $dataInicio);
        $this->db->where("faturamento_pedido.data_faturamento <= ", $dataFim);

        if($codVendedor != ""){
            $this->db->where_in('pedido_venda.cod_vendedor', $codVendedor);
        }

        return $query = $this->db->get()->result();

    }

    public function getVendasVendedor($dataInicio, $dataFim){
        $this->db->where('pedido_venda.id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('vendedor.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select("IFNULL(faturamento_pedido.cod_vendedor, 0) cod_vendedor, IFNULL(vendedor.nome_vendedor, 'Sem Vendedor') nome_vendedor");
        $this->db->select("sum(faturamento_pedido.valor_bruto) total_vendas");
        $this->db->select("sum(faturamento_pedido.valor_desconto) total_desconto");
        $this->db->select("sum(faturamento_pedido.valor_frete) total_frete");
        $this->db->select("sum(faturamento_pedido.valor_seguro) total_seguro");
        $this->db->select("sum(faturamento_pedido.outras_despesas) outras_despesas");
        $this->db->select("concat('#',SUBSTRING((lpad(hex(round(rand() * 10000000)),6,0)),-6)) color");
        $this->db->from('faturamento_pedido');
        $this->db->join('pedido_venda', 'pedido_venda.num_pedido_venda = faturamento_pedido.num_pedido_venda');
        $this->db->join('vendedor', 'vendedor.cod_vendedor = faturamento_pedido.cod_vendedor');
        $this->db->where('faturamento_pedido.estornado', '0');
        $this->db->where('faturamento_pedido.data_faturamento >= ', $dataInicio);
        $this->db->where('faturamento_pedido.data_faturamento <= ', $dataFim);
        $this->db->group_by('faturamento_pedido.cod_vendedor');

        $pedidoVenda = $this->db->get_compiled_select();

        $this->db->select('vendedores.*');
        $this->db->from("($pedidoVenda) vendedores");
        $this->db->order_by('vendedores.total_vendas', 'desc');
        $this->db->group_by('vendedores.cod_vendedor');

        return $query = $this->db->get()->result();

    }

    public function getVendasVendedorMeta($dataInicio, $dataFim){
        $this->db->where('vendedor.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('vendedor.cod_vendedor, vendedor.nome_vendedor');
        $this->db->select('(SELECT SUM((faturamento_pedido.valor_bruto * faturamento_pedido.perc_comissao) / 100)
                             FROM faturamento_pedido
                            WHERE faturamento_pedido.cod_vendedor      = vendedor.cod_vendedor
                              AND faturamento_pedido.estornado         = 0
                              AND faturamento_pedido.data_faturamento >= "' . $dataInicio . '" 
                              AND faturamento_pedido.data_faturamento <= "' . $dataFim . '") total_comissao');
        $this->db->select('(SELECT SUM(faturamento_pedido.valor_bruto)
                             FROM faturamento_pedido
                            WHERE faturamento_pedido.cod_vendedor      = vendedor.cod_vendedor
                              AND faturamento_pedido.estornado         = 0
                              AND faturamento_pedido.data_faturamento >= "' . $dataInicio . '" 
                              AND faturamento_pedido.data_faturamento <= "' . $dataFim . '") total_vendas');
        $this->db->from('vendedor');
        $this->db->where('vendedor.ativo', '1');

        $pedidoVenda = $this->db->get_compiled_select();
        
        $this->db->select('vendedores.cod_vendedor, vendedores.nome_vendedor');
        $this->db->select('IFNULL(sum(vendedores.total_comissao), 0) total_comissao');
        $this->db->select('IFNULL(sum(vendedores.total_vendas), 0) total_vendas');
        $this->db->from("($pedidoVenda) vendedores");
        $this->db->order_by('total_comissao', 'desc');
        $this->db->group_by('vendedores.cod_vendedor');

        return $query = $this->db->get()->result();

    }

    public function vendedorCliente($dataInicio, $dataFim, $codVendedor){
        $this->db->where('pedido_venda.id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('vendedor.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select("IFNULL(faturamento_pedido.cod_vendedor, 0) cod_vendedor, IFNULL(vendedor.nome_vendedor, 'Sem Vendedor') nome_vendedor");
        $this->db->select('cliente.cod_cliente, cliente.nome_cliente');
        $this->db->select('pedido_venda.num_pedido_venda');
        $this->db->select('usuario.nome_usuario');
        $this->db->select('faturamento_pedido.valor_bruto');
        $this->db->select('faturamento_pedido.observacoes');
        $this->db->select('faturamento_pedido.data_faturamento, faturamento_pedido.cod_faturamento_pedido, faturamento_pedido.perc_comissao,
                           (faturamento_pedido.valor_bruto + faturamento_pedido.valor_frete + faturamento_pedido.valor_seguro + faturamento_pedido.outras_despesas - faturamento_pedido.valor_desconto)
                           * (faturamento_pedido.perc_comissao / 100) total_comissao');
        $this->db->select('faturamento_pedido.tipo_frete');
        $this->db->select('faturamento_pedido.valor_bruto');
        $this->db->select('faturamento_pedido.valor_frete');
        $this->db->select('faturamento_pedido.valor_seguro');
        $this->db->select('faturamento_pedido.outras_despesas');
        $this->db->select('faturamento_pedido.valor_desconto');
        $this->db->select('faturamento_pedido.cod_transportador, transportador.nome_transportador');
        $this->db->from('faturamento_pedido');
        $this->db->join('pedido_venda', 'pedido_venda.num_pedido_venda = faturamento_pedido.num_pedido_venda');
        $this->db->join('vendedor', 'vendedor.cod_vendedor = faturamento_pedido.cod_vendedor');
        $this->db->join('cliente', 'cliente.cod_cliente = pedido_venda.cod_cliente');
        $this->db->join('transportador', 'transportador.cod_transportador = faturamento_pedido.cod_transportador', 'left');
        $this->db->join('usuario', 'usuario.email = faturamento_pedido.usuario', 'left');
        $this->db->where('faturamento_pedido.estornado', '0');
        $this->db->where('faturamento_pedido.cod_vendedor !=', null);
        $this->db->order_by('faturamento_pedido.data_faturamento', 'desc');
        $this->db->group_by('faturamento_pedido.cod_faturamento_pedido');

        $this->db->where("faturamento_pedido.data_faturamento >= ", $dataInicio);
        $this->db->where("faturamento_pedido.data_faturamento <= ", $dataFim);

        if($codVendedor != ""){
            $this->db->where_in('faturamento_pedido.cod_vendedor', $codVendedor);
        }

        return $query = $this->db->get()->result();

    }

    public function vendedorProduto($dataInicio, $dataFim, $codVendedor){
        $this->db->where('pedido_venda.id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('vendedor.id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('produto.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select("IFNULL(faturamento_pedido.cod_vendedor, 0) cod_vendedor, IFNULL(vendedor.nome_vendedor, 'Sem Vendedor') nome_vendedor");
        $this->db->select('cliente.cod_cliente, cliente.nome_cliente, pedido_venda.num_pedido_venda, 
                           faturamento_pedido.data_faturamento, faturamento_pedido.cod_faturamento_pedido,
                           faturamento_pedido_produto.cod_produto, produto.nome_produto, produto.cod_unidade_medida,
                           faturamento_pedido_produto.quantidade, faturamento_pedido_produto.valor_unitario');
        $this->db->from('faturamento_pedido');
        $this->db->join('faturamento_pedido_produto', 'faturamento_pedido_produto.faturamento_pedido = faturamento_pedido.cod_faturamento_pedido');
        $this->db->join('produto', 'produto.cod_produto = faturamento_pedido_produto.cod_produto');
        $this->db->join('pedido_venda', 'pedido_venda.num_pedido_venda = faturamento_pedido.num_pedido_venda');
        $this->db->join('vendedor', 'vendedor.cod_vendedor = faturamento_pedido.cod_vendedor');
        $this->db->join('cliente', 'cliente.cod_cliente = pedido_venda.cod_cliente');
        $this->db->where('faturamento_pedido.estornado', '0');
        $this->db->where('faturamento_pedido.cod_vendedor !=', null);
        $this->db->order_by('faturamento_pedido.data_faturamento', 'desc');
        
        $this->db->where("faturamento_pedido.data_faturamento >= ", $dataInicio);
        $this->db->where("faturamento_pedido.data_faturamento <= ", $dataFim);

        if($codVendedor != ""){
            $this->db->where_in('faturamento_pedido.cod_vendedor', $codVendedor);
        }

        return $query = $this->db->get()->result();

    }

    //Indicadores
    public function getVendasDiaria($dataInicio, $dataFim){

        $this->db->select('tim.db_date as data,
                            tim.month_name as nome_mes,
                        IFNULL(venda.quant_venda, 0) as venda_dia,
                        IFNULL(venda.quant_desconto, 0) as desconto_dia                          
                        from time_dimension tim');
        $this->db->join('(
                            SELECT movimentos_estoque.data_movimento, sum(movimentos_estoque.valor_movimento) as quant_venda,
                                   sum(faturamento_pedido.valor_desconto) as quant_desconto
                            FROM movimentos_estoque 
                            JOIN faturamento_pedido ON faturamento_pedido.cod_faturamento_pedido = movimentos_estoque.id_origem
                            where movimentos_estoque.id_empresa = ' . getDadosUsuarioLogado()['id_empresa'] . '
                              and movimentos_estoque.origem_movimento = 3
                              and faturamento_pedido.estornado = 0
                            GROUP BY movimentos_estoque.data_movimento
                            UNION
                            SELECT movimentos_estoque.data_movimento, sum(movimentos_estoque.valor_movimento) as quant_venda,
                            if(venda_caixa.tipo_desconto = 1, venda_caixa.valor_desconto, movimentos_estoque.valor_movimento * (venda_caixa.valor_desconto / 100)) as quant_desconto
                            FROM movimentos_estoque 
                            JOIN venda_caixa ON venda_caixa.num_venda_caixa = movimentos_estoque.id_origem
                            where movimentos_estoque.id_empresa = ' . getDadosUsuarioLogado()['id_empresa'] . '
                              and movimentos_estoque.origem_movimento = 6
                              and movimentos_estoque.tipo_movimento = 2
                              and venda_caixa.status = 2
                            GROUP BY movimentos_estoque.data_movimento
                        ) as venda', 'venda on venda.data_movimento = tim.db_date ', 'left');
        $this->db->where('tim.db_date <= CURRENT_DATE()');
        $this->db->order_by('tim.db_date', 'asc');

        $this->db->where("tim.db_date >= ", $dataInicio);
        $this->db->where("tim.db_date <= ", $dataFim);

        return $query = $this->db->get()->result();
    }

    public function getVendaProduto($dataInicio, $dataFim){
        $this->db->where('pedido_venda.id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('produto.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('movimentos_estoque.cod_produto, produto.nome_produto, produto.cod_unidade_medida,
                           sum(movimentos_estoque.quant_movimentada) as quant_vendido, 
                           sum(movimentos_estoque.valor_movimento) as valor_vendido');
        $this->db->from('movimentos_estoque');
        $this->db->join('produto', 'produto.cod_produto = movimentos_estoque.cod_produto');
        $this->db->join('faturamento_pedido', 'faturamento_pedido.cod_faturamento_pedido = movimentos_estoque.id_origem');
        $this->db->join('pedido_venda', 'pedido_venda.num_pedido_venda = faturamento_pedido.num_pedido_venda');
        $this->db->where('movimentos_estoque.origem_movimento', '3');
        $this->db->where('faturamento_pedido.estornado', '0');
        $this->db->group_by('movimentos_estoque.cod_produto');

        $this->db->where("movimentos_estoque.data_movimento >= ", $dataInicio);
        $this->db->where("movimentos_estoque.data_movimento <= ", $dataFim);

        $pedidoVenda = $this->db->get_compiled_select();

        $this->db->where('controle_caixa.id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('produto.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('movimentos_estoque.cod_produto, produto.nome_produto, produto.cod_unidade_medida,
                           sum(movimentos_estoque.quant_movimentada) as quant_vendido, 
                           sum(movimentos_estoque.valor_movimento) as valor_vendido');
        $this->db->from('movimentos_estoque');
        $this->db->join('produto', 'produto.cod_produto = movimentos_estoque.cod_produto');
        $this->db->join('venda_caixa', 'venda_caixa.num_venda_caixa = movimentos_estoque.id_origem');
        $this->db->join('controle_caixa', 'controle_caixa.data_caixa = venda_caixa.data_caixa');
        $this->db->where('movimentos_estoque.origem_movimento', '6');
        $this->db->where('venda_caixa.status', '2');
        $this->db->group_by('movimentos_estoque.cod_produto');

        $this->db->where("movimentos_estoque.data_movimento >= ", $dataInicio);
        $this->db->where("movimentos_estoque.data_movimento <= ", $dataFim);


        $frenteCaixa = $this->db->get_compiled_select();

        $this->db->select('vendas.cod_produto, vendas.nome_produto, vendas.cod_unidade_medida,
                           sum(vendas.quant_vendido) as quant_vendido, 
                           sum(vendas.valor_vendido) as valor_vendido');
        $this->db->from("($pedidoVenda UNION $frenteCaixa) vendas");
        $this->db->group_by('vendas.cod_produto');
        $this->db->order_by('sum(vendas.valor_vendido)', 'desc');

        return $this->db->get()->result();

    }

    public function getVendaCliente($dataInicio, $dataFim){
        $this->db->where('pedido_venda.id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('cliente.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('pedido_venda.cod_cliente, cliente.nome_cliente,
                           sum(movimentos_estoque.quant_movimentada) quant_venda, sum(movimentos_estoque.valor_movimento) total_venda,
                           sum(faturamento_pedido.valor_desconto) total_desconto');
        $this->db->from('movimentos_estoque');
        $this->db->join('faturamento_pedido', 'faturamento_pedido.cod_faturamento_pedido = movimentos_estoque.id_origem');
        $this->db->join('pedido_venda', 'pedido_venda.num_pedido_venda = faturamento_pedido.num_pedido_venda');
        $this->db->join('cliente', 'cliente.cod_cliente = pedido_venda.cod_cliente');
        $this->db->where('movimentos_estoque.origem_movimento', '3');
        $this->db->where('faturamento_pedido.estornado', '0');
        $this->db->group_by('pedido_venda.cod_cliente');

        $this->db->where("movimentos_estoque.data_movimento >= ", $dataInicio);
        $this->db->where("movimentos_estoque.data_movimento <= ", $dataFim);

        $pedidoVenda = $this->db->get_compiled_select();

        $this->db->where('controle_caixa.id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('venda_caixa.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('venda_caixa.cod_cliente, cliente.nome_cliente,
                           sum(movimentos_estoque.quant_movimentada) quant_venda, sum(movimentos_estoque.valor_movimento) total_venda,
                           if(venda_caixa.tipo_desconto = 1, venda_caixa.valor_desconto, movimentos_estoque.valor_movimento * (venda_caixa.valor_desconto / 100)) total_desconto');
        $this->db->from('movimentos_estoque');
        $this->db->join('venda_caixa', 'venda_caixa.num_venda_caixa = movimentos_estoque.id_origem');
        $this->db->join('controle_caixa', 'controle_caixa.data_caixa = venda_caixa.data_caixa');
        $this->db->join('cliente', 'cliente.cod_cliente = venda_caixa.cod_cliente and cliente.id_empresa = ' . getDadosUsuarioLogado()['id_empresa'], 'left');
        $this->db->where('movimentos_estoque.origem_movimento', '6');
        $this->db->where('venda_caixa.status', '2');
        $this->db->group_by('venda_caixa.cod_cliente');

        $this->db->where("movimentos_estoque.data_movimento >= ", $dataInicio);
        $this->db->where("movimentos_estoque.data_movimento <= ", $dataFim);


        $frenteCaixa = $this->db->get_compiled_select();

        $this->db->select('vendas.cod_cliente, vendas.nome_cliente,
                           sum(vendas.quant_venda) quant_venda, sum(vendas.total_venda) total_venda,
                           sum(vendas.total_desconto) total_desconto');
        $this->db->from("($pedidoVenda UNION $frenteCaixa) vendas");
        $this->db->group_by('vendas.cod_cliente');
        $this->db->order_by('sum(vendas.total_venda)', 'desc');

        return $this->db->get()->result();

    }

    public function getVendaClienteVisaoGeral(){


        $this->db->where('pedido_venda.id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('cliente.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('pedido_venda.cod_cliente, cliente.nome_cliente,
                           sum(movimentos_estoque.valor_movimento) total_venda');
        $this->db->from('movimentos_estoque');
        $this->db->join('faturamento_pedido', 'faturamento_pedido.cod_faturamento_pedido = movimentos_estoque.id_origem');
        $this->db->join('pedido_venda', 'pedido_venda.num_pedido_venda = faturamento_pedido.num_pedido_venda');
        $this->db->join('cliente', 'cliente.cod_cliente = pedido_venda.cod_cliente');
        $this->db->where('movimentos_estoque.origem_movimento', '3');
        $this->db->where('movimentos_estoque.valor_movimento !=', 0);
        $this->db->where('faturamento_pedido.estornado', '0');
        $this->db->where('faturamento_pedido.data_faturamento >=', date('Y-m-01'));
        $this->db->where('faturamento_pedido.data_faturamento <=', date('Y-m-d'));
        $this->db->group_by('pedido_venda.cod_cliente');

        $pedidoVenda = $this->db->get_compiled_select();

        $this->db->where('controle_caixa.id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('venda_caixa.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('venda_caixa.cod_cliente, cliente.nome_cliente,
                           sum(movimentos_estoque.valor_movimento) total_venda');
        $this->db->from('movimentos_estoque');
        $this->db->join('venda_caixa', 'venda_caixa.num_venda_caixa = movimentos_estoque.id_origem');
        $this->db->join('controle_caixa', 'controle_caixa.data_caixa = venda_caixa.data_caixa');
        $this->db->join('cliente', 'cliente.cod_cliente = venda_caixa.cod_cliente and cliente.id_empresa = ' . getDadosUsuarioLogado()['id_empresa'], 'left');
        $this->db->where('movimentos_estoque.origem_movimento', '6');
        $this->db->where('movimentos_estoque.valor_movimento !=', 0);
        $this->db->where('venda_caixa.status', '2');
        $this->db->where('controle_caixa.data_caixa >=', date('Y-m-01'));
        $this->db->where('controle_caixa.data_caixa <=', date('Y-m-d'));
        $this->db->group_by('venda_caixa.cod_cliente');


        $frenteCaixa = $this->db->get_compiled_select();

        $this->db->select('vendas.cod_cliente, vendas.nome_cliente,
                           sum(vendas.total_venda) total_venda');
        $this->db->from("($pedidoVenda UNION $frenteCaixa) vendas");
        $this->db->group_by('vendas.cod_cliente');
        $this->db->order_by('sum(vendas.total_venda)', 'desc');
        $this->db->limit(3);


        return $this->db->get()->result();

    }

    public function getFaturamentoProdutos($faturamentoId){

        $this->db->where('produto.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->from('faturamento_pedido_produto');
        $this->db->select('faturamento_pedido_produto.*, produto.*');
        $this->db->select('ncm.percentual_ipi');
        $this->db->select('tb_fis_natureza_operacao.id AS nota_natureza_operacao_id, tb_fis_natureza_operacao.c_enq');
        $this->db->select('tb_fis_natureza_operacao.converter_icms_em_desconto');
        $this->db->select('tb_fis_natureza_operacao.tb_fis_ipi_cst_id, tb_fis_natureza_operacao.tb_fis_pis_cst_id');
        $this->db->select('tb_fis_natureza_operacao.tb_fis_cofins_cst_id');

        $this->db->join('faturamento_pedido', 'faturamento_pedido.cod_faturamento_pedido = faturamento_pedido_produto.faturamento_pedido', 'inner');
        $this->db->join('tb_fat_nota_fiscal', 'tb_fat_nota_fiscal.cod_faturamento_pedido = faturamento_pedido.cod_faturamento_pedido', 'inner');
        $this->db->join('produto', 'produto.cod_produto = faturamento_pedido_produto.cod_produto', 'inner');
        $this->db->join('ncm', 'ncm.cod_ncm = produto.cod_ncm','left');
        $this->db->join('tb_fis_natureza_operacao', 'tb_fis_natureza_operacao.id = tb_fat_nota_fiscal.tb_fis_natureza_operacao_id','inner');

        $this->db->where("faturamento_pedido_produto.faturamento_pedido = ", $faturamentoId);

        $this->db->group_start();
        $this->db->where('tb_fat_nota_fiscal.c_stat != ', "101");
        $this->db->or_where('tb_fat_nota_fiscal.c_stat is null ');
        $this->db->group_end();

        return $this->db->get()->result();

    }
    
}
