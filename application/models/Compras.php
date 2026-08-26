<?php

class Compras extends CI_Model{

    public function insertOrdemCompra($ordemCompra){
        $this->db->insert('ordem_compra', $ordemCompra);

        return $this->db->insert_id();
    }

    public function insertCotacaoOrdem($cotacaoCompra){
        $this->db->insert('cotacao_ordem', $cotacaoCompra);
    }

    public function insertPedidoCompra($pedidoCompra){
        $this->db->insert('pedido_compra', $pedidoCompra);

        return $this->db->insert_id();
    }

    public function insertRecebimentoMaterial($recebimentoMaterial){
        $this->db->insert('recebimento_material', $recebimentoMaterial);

        return $this->db->insert_id();        

    }

    public function inserirProdutoRecebimento($data){
        $this->db->insert('recebimento_material_produto', $data);
        return $this->db->insert_id();
    }

    public function deleteOrdemCompra($NumOrdem) {
        $this->db->where_in('num_ordem_compra',$NumOrdem)->delete('ordem_compra');
    }  

    public function deleteCotacaoOrdem($seqCotacao) {
        $this->db->where_in('seq_cotacao_compra',$seqCotacao)->delete('cotacao_ordem');
    }
    
    public function deletePedidoCompra($NumPedido) {
        $this->db->where_in('num_pedido_compra',$NumPedido)->delete('pedido_compra');
    }
    
    public function updateOrdemCompra($NumOrdem, $ordem){
        $this->db->where('num_ordem_compra', $NumOrdem);
        $this->db->update('ordem_compra', $ordem);
    }

    public function updateCotacaoOrdem($seqCotacao, $cotacao){
        $this->db->where('seq_cotacao_compra', $seqCotacao);
        $this->db->update('cotacao_ordem', $cotacao);
    }

    public function updateOrdemCompraArray($NumOrdem, $ordem) {
        $this->db->where_in('num_ordem_compra',$NumOrdem)->update('ordem_compra', $ordem);
    }

    public function updateMovimento($codMovimento, $movimento){       

        $this->db->where('cod_movimento_oc', $codMovimento);
        $this->db->update('movimentos_ordem_compra', $movimento);
    }

    public function updateRecebimento($codRecebimento, $recebimento){       

        $this->db->where('cod_recebimento_material', $codRecebimento);
        $this->db->update('recebimento_material', $recebimento);
    }

    public function updatePedidoCompra($numPedidoCompraa, $pedidocompra){
        $this->db->where('num_pedido_compra', $numPedidoCompraa);
        $this->db->update('pedido_compra', $pedidocompra);
    }

    public function getOrdem($dataInicio, $dataFim, $filter = ""){
        $this->db->where('ordem_compra.id_empresa', getDadosUsuarioLogado()['id_empresa']); 
        $this->db->where('produto.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        //Join para pegar o tipo de produto
        $this->db->select('ordem_compra.*, produto.nome_produto, produto.cod_unidade_medida, tipo_produto.nome_tipo_produto, fornecedor.nome_fornecedor');
        $this->db->from('ordem_compra');
        $this->db->join('produto', 'produto.cod_produto = ordem_compra.cod_produto'); 
        $this->db->join('tipo_produto', 'tipo_produto.cod_tipo_produto = produto.cod_tipo_produto'); 
        $this->db->join('pedido_compra', 'pedido_compra.num_pedido_compra = ordem_compra.num_pedido_compra', 'left');
        $this->db->join('fornecedor', 'fornecedor.cod_fornecedor = pedido_compra.cod_fornecedor', 'left');
        $this->db->order_by('ordem_compra.num_ordem_compra', 'desc');       

        if($filter <> ""){
            $this->db->group_start();
            $this->db->or_like('ordem_compra.num_ordem_compra' ,$filter);
            $this->db->or_like('ordem_compra.cod_produto' ,$filter);
            $this->db->or_like('nome_produto' ,$filter);
            $this->db->or_like('cod_unidade_medida' ,$filter);
            $this->db->group_end();
            
        }else{
            $this->db->where('ordem_compra.data_necessidade >= ', $dataInicio); 
            $this->db->where('ordem_compra.data_necessidade <= ', $dataFim); 
        }
        
        return $query = $this->db->get()->result();
        
    }

    public function getOrdensFornecedor($dataInicio, $dataFim){
        $this->db->where('fornecedor.id_empresa', getDadosUsuarioLogado()['id_empresa']); 
        $this->db->where('ordem_compra.id_empresa', getDadosUsuarioLogado()['id_empresa']); 

        $this->db->select('cotacao_ordem.cod_fornecedor');
        $this->db->select('fornecedor.nome_fornecedor');
        $this->db->select('count(cotacao_ordem.seq_cotacao_compra) quant_ordens');
        $this->db->from('cotacao_ordem');
        $this->db->join('ordem_compra', 'ordem_compra.num_ordem_compra = cotacao_ordem.num_ordem_compra'); 
        $this->db->join('fornecedor', 'fornecedor.cod_fornecedor = cotacao_ordem.cod_fornecedor'); 
        //$this->db->where('ordem_compra.data_necessidade >= ', $dataInicio); 
        //$this->db->where('ordem_compra.data_necessidade <= ', $dataFim); 
        $this->db->where('ordem_compra.num_pedido_compra is null'); 
        $this->db->group_by('cotacao_ordem.cod_fornecedor');
        
        return $query = $this->db->get()->result();
        
    }

    public function getStatusOrdens($dataInicio, $dataFim){

        $this->db->select('(select count(ordem_compra.num_ordem_compra)
                              from ordem_compra
                             where ordem_compra.id_empresa = ' . getDadosUsuarioLogado()['id_empresa'] . '
                               and ordem_compra.num_pedido_compra is not null
                               and ordem_compra.data_necessidade >= "' . $dataInicio . '"
                               and ordem_compra.data_necessidade <= "' . $dataFim . '") total_com_pedido');
        $this->db->select('(select count(ordem_compra.num_ordem_compra)
                              from ordem_compra
                             where ordem_compra.id_empresa = ' . getDadosUsuarioLogado()['id_empresa'] . '
                               and ordem_compra.num_pedido_compra is null
                               and ordem_compra.data_necessidade >= "' . $dataInicio . '"
                               and ordem_compra.data_necessidade <= "' . $dataFim . '") total_sem_pedido');
        $this->db->select('(select count(ordem_compra.num_ordem_compra)
                              from ordem_compra
                             where ordem_compra.id_empresa = ' . getDadosUsuarioLogado()['id_empresa'] . '
                               and ordem_compra.status = 1
                               and ordem_compra.data_necessidade >= "' . $dataInicio . '"
                               and ordem_compra.data_necessidade <= "' . $dataFim . '") pendente');
        $this->db->select('(select count(ordem_compra.num_ordem_compra)
                              from ordem_compra
                             where ordem_compra.id_empresa = ' . getDadosUsuarioLogado()['id_empresa'] . '
                               and ordem_compra.status = 2
                               and ordem_compra.data_necessidade >= "' . $dataInicio . '"
                               and ordem_compra.data_necessidade <= "' . $dataFim . '") recebido_parcial');
        $this->db->select('(select count(ordem_compra.num_ordem_compra)
                              from ordem_compra
                             where ordem_compra.id_empresa = ' . getDadosUsuarioLogado()['id_empresa'] . '
                               and ordem_compra.status = 3
                               and ordem_compra.data_necessidade >= "' . $dataInicio . '"
                               and ordem_compra.data_necessidade <= "' . $dataFim . '") recebido_total');

        return $query = $this->db->get()->row();
    }

    public function getTotaisPedido($dataInicio, $dataFim){

        $this->db->select('(select sum((select sum(ordem_compra.valor_unitario * ordem_compra.quant_pedida)
                                from ordem_compra
                               where ordem_compra.num_pedido_compra = pedido_compra.num_pedido_compra) +
                            pedido_compra.valor_frete +
                            pedido_compra.valor_seguro +
                            pedido_compra.outras_despesas -
                            if(pedido_compra.tipo_desconto = 1, pedido_compra.valor_desconto, 
                                (select sum(ordem_compra.valor_unitario * ordem_compra.quant_pedida)
                                         from ordem_compra
                                        where ordem_compra.num_pedido_compra = pedido_compra.num_pedido_compra) * (pedido_compra.valor_desconto / 100)))
                            from pedido_compra
                           where pedido_compra.id_empresa = ' . getDadosUsuarioLogado()['id_empresa'] . '
                             and pedido_compra.data_emissao >= "' . $dataInicio . '"
                             and pedido_compra.data_emissao <= "' . $dataFim . '" ) total_pedido');
        $this->db->select('(select sum(recebimento_material.valor_bruto + recebimento_material.valor_frete + recebimento_material.valor_seguro + recebimento_material.outras_despesas - recebimento_material.valor_desconto)
                              from recebimento_material
                        inner join pedido_compra on pedido_compra.num_pedido_compra = recebimento_material.num_pedido_compra
                             where pedido_compra.id_empresa = ' . getDadosUsuarioLogado()['id_empresa'] . '
                               and recebimento_material.estornado = 0
                               and recebimento_material.data_recebimento >= "' . $dataInicio . '"
                               and recebimento_material.data_recebimento <= "' . $dataFim . '") total_recebido'); 
        $this->db->select('(select sum((select sum(ordem_compra.valor_unitario * (ordem_compra.quant_pedida - ordem_compra.quant_atendida))
                                from ordem_compra
                               where ordem_compra.num_pedido_compra = pedido_compra.num_pedido_compra
                                 and ordem_compra.quant_atendida <= ordem_compra.quant_pedida) +
                            pedido_compra.valor_frete +
                            pedido_compra.valor_seguro +
                            pedido_compra.outras_despesas -
                            if(pedido_compra.tipo_desconto = 1, pedido_compra.valor_desconto, 
                                (select sum(ordem_compra.valor_unitario * ordem_compra.quant_pedida)
                                         from ordem_compra
                                        where ordem_compra.num_pedido_compra = pedido_compra.num_pedido_compra) * (pedido_compra.valor_desconto / 100)))
                            from pedido_compra
                           where pedido_compra.id_empresa = ' . getDadosUsuarioLogado()['id_empresa'] . '
                             and pedido_compra.data_emissao >= "' . $dataInicio . '"
                             and pedido_compra.data_emissao <= "' . $dataFim . '" ) total_pendente');


        return $query = $this->db->get()->row();

    }

    public function getOrdemCompraoPorCalculoNecessidade($codCalculo){
        $this->db->where('ordem_compra.id_empresa', getDadosUsuarioLogado()['id_empresa']); 

        //Join para pegar o tipo de produto
        $this->db->select('ordem_compra.*');
        $this->db->from('ordem_compra');
        $this->db->where('cod_calculo_necessidade', $codCalculo);
        
        return $this->db->get()->result();
        
    }

    public function getPedido($dataInicio, $dataFim, $filter = ""){
        $this->db->where('pedido_compra.id_empresa', getDadosUsuarioLogado()['id_empresa']); 
        $this->db->where('fornecedor.id_empresa', getDadosUsuarioLogado()['id_empresa']); 

        //Join para pegar o tipo de produto
        $this->db->select('pedido_compra.*, fornecedor.nome_fornecedor');
        $this->db->select('(select sum(ordem_compra.valor_unitario * ordem_compra.quant_pedida)
                              from ordem_compra
                             where ordem_compra.num_pedido_compra = pedido_compra.num_pedido_compra) valor_produto');  
        $this->db->select('pedido_compra.valor_frete');
        $this->db->select('pedido_compra.valor_seguro');
        $this->db->select('pedido_compra.outras_despesas');   
        $this->db->select('if(pedido_compra.tipo_desconto = 1, pedido_compra.valor_desconto, 
                                (select sum(ordem_compra.valor_unitario * ordem_compra.quant_pedida)
                                         from ordem_compra
                                        where ordem_compra.num_pedido_compra = pedido_compra.num_pedido_compra) * (pedido_compra.valor_desconto / 100)) valor_desconto');                         
        $this->db->select('(select sum(ordem_compra.quant_pedida - ordem_compra.quant_atendida)
                              from ordem_compra
                             where ordem_compra.num_pedido_compra = pedido_compra.num_pedido_compra
                               and ordem_compra.status != 3) quant_pendente');
        $this->db->select('(select count(*)
                              from recebimento_material
                             where recebimento_material.num_pedido_compra = pedido_compra.num_pedido_compra
                               and recebimento_material.estornado = 1) estornado');
        $this->db->from('pedido_compra');
        $this->db->join('fornecedor', 'fornecedor.cod_fornecedor = pedido_compra.cod_fornecedor'); 
        $this->db->order_by('pedido_compra.data_emissao', 'desc');       

        if($filter <> ""){
            $this->db->group_start();
            $this->db->or_like('pedido_compra.num_pedido_compra' ,$filter);
            $this->db->or_like('pedido_compra.cod_fornecedor' ,$filter);
            $this->db->or_like('fornecedor.nome_fornecedor' ,$filter);
            $this->db->group_end();
            
        }else{
            $this->db->where('pedido_compra.data_emissao >= ', $dataInicio); 
            $this->db->where('pedido_compra.data_emissao <= ', $dataFim); 
        }
        
        return $query = $this->db->get()->result();
        
    }

    public function getPedidoRecebimento($dataInicio, $dataFim, $filter = ""){
        $this->db->where('pedido_compra.id_empresa', getDadosUsuarioLogado()['id_empresa']); 
        $this->db->where('fornecedor.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        //Join para pegar o tipo de produto
        $this->db->select('pedido_compra.*, fornecedor.nome_fornecedor');
        $this->db->select('(select sum(ordem_compra.valor_unitario * ordem_compra.quant_pedida)
                              from ordem_compra
                             where ordem_compra.num_pedido_compra = pedido_compra.num_pedido_compra) valor_produto');  
        $this->db->select('pedido_compra.valor_frete');
        $this->db->select('pedido_compra.valor_seguro');
        $this->db->select('pedido_compra.outras_despesas');   
        $this->db->select('if(pedido_compra.tipo_desconto = 1, pedido_compra.valor_desconto, 
                                (select sum(ordem_compra.valor_unitario * ordem_compra.quant_pedida)
                                         from ordem_compra
                                        where ordem_compra.num_pedido_compra = pedido_compra.num_pedido_compra) * (pedido_compra.valor_desconto / 100)) valor_desconto');    
        $this->db->select('(select sum(recebimento_material.valor_bruto + recebimento_material.valor_frete + recebimento_material.valor_seguro + recebimento_material.outras_despesas - recebimento_material.valor_desconto)
                              from recebimento_material
                             where recebimento_material.num_pedido_compra = pedido_compra.num_pedido_compra
                               and recebimento_material.estornado = 0) valor_total');        
        $this->db->select('(select sum(ordem_compra.quant_pedida - ordem_compra.quant_atendida)
                              from ordem_compra
                             where ordem_compra.num_pedido_compra = pedido_compra.num_pedido_compra
                               and ordem_compra.status != 3) quant_pendente');
        $this->db->from('pedido_compra');
        $this->db->join('fornecedor', 'fornecedor.cod_fornecedor = pedido_compra.cod_fornecedor'); 
        $this->db->where("exists (select * from ordem_compra where ordem_compra.num_pedido_compra = pedido_compra.num_pedido_compra)");
        $this->db->order_by('pedido_compra.data_entrega', 'desc');       

        if($filter <> ""){
            $this->db->group_start();
            $this->db->or_like('pedido_compra.num_pedido_compra' ,$filter);
            $this->db->or_like('pedido_compra.cod_fornecedor' ,$filter);
            $this->db->or_like('fornecedor.nome_fornecedor' ,$filter);
            $this->db->group_end();
            
        }
        else{
            $this->db->where('pedido_compra.data_entrega >= ', $dataInicio); 
            $this->db->where('pedido_compra.data_entrega <= ', $dataFim); 
        }
        
        return $query = $this->db->get()->result();
        
    }

    public function getPedidoCompraPorCodigo($numPedidoCompra){
        $this->db->where('pedido_compra.id_empresa', getDadosUsuarioLogado()['id_empresa']); 

        $this->db->select('pedido_compra.*, fornecedor.nome_fornecedor, usuario.nome_usuario');
        $this->db->select('(select sum(ordem_compra.valor_unitario * ordem_compra.quant_pedida)
                              from ordem_compra
                             where ordem_compra.num_pedido_compra = pedido_compra.num_pedido_compra) valor_produto');  
        $this->db->select('pedido_compra.valor_frete');
        $this->db->select('pedido_compra.valor_seguro');
        $this->db->select('pedido_compra.outras_despesas');   
        $this->db->select('if(pedido_compra.tipo_desconto = 1, pedido_compra.valor_desconto, 
                                (select sum(ordem_compra.valor_unitario * ordem_compra.quant_pedida)
                                         from ordem_compra
                                        where ordem_compra.num_pedido_compra = pedido_compra.num_pedido_compra) * (pedido_compra.valor_desconto / 100)) valor_desconto_calc');   
        $this->db->select('(select sum(ordem_compra.valor_unitario * ordem_compra.quant_pedida)
                              from ordem_compra
                             where ordem_compra.num_pedido_compra = pedido_compra.num_pedido_compra) valor_pedido');
        $this->db->select('(select sum(ordem_compra.valor_unitario * (ordem_compra.quant_pedida - ordem_compra.quant_atendida))
                              from ordem_compra
                             where ordem_compra.num_pedido_compra = pedido_compra.num_pedido_compra) valor_pendente');
        $this->db->select('(select sum(ordem_compra.quant_pedida - ordem_compra.quant_atendida)
                              from ordem_compra
                             where ordem_compra.num_pedido_compra = pedido_compra.num_pedido_compra
                               and ordem_compra.status != 3) quant_pendente');
        $this->db->select('(select sum(recebimento_material.valor_bruto + recebimento_material.valor_frete + recebimento_material.valor_seguro + recebimento_material.outras_despesas - recebimento_material.valor_desconto)
                              from recebimento_material
                             where recebimento_material.num_pedido_compra = pedido_compra.num_pedido_compra
                               and recebimento_material.estornado = 0) valor_total');   
        $this->db->from('pedido_compra');
        $this->db->join('fornecedor', 'fornecedor.cod_fornecedor = pedido_compra.cod_fornecedor');
        $this->db->join('usuario', 'usuario.email = pedido_compra.usuario', 'left');    
        $this->db->where('pedido_compra.num_pedido_compra', $numPedidoCompra);
        
        return $query = $this->db->get()->row();

    }

    public function getOrdemPorPedido($numPedidoCompra){
        $this->db->where('produto.id_empresa', getDadosUsuarioLogado()['id_empresa']); 
        $this->db->where('ordem_compra.id_empresa', getDadosUsuarioLogado()['id_empresa']); 

        $this->db->select('pedido_compra.*, ordem_compra.num_ordem_compra, ordem_compra.quant_pedida, ordem_compra.quant_atendida, ordem_compra.valor_unitario, 
                           ordem_compra.cod_produto, ordem_compra.data_necessidade, ordem_compra.status, ordem_compra.observacoes,
                        produto.nome_produto, produto.cod_unidade_medida, tipo_produto.nome_tipo_produto');
        $this->db->from('pedido_compra');
        $this->db->join('ordem_compra', 'ordem_compra.num_pedido_compra = pedido_compra.num_pedido_compra');
        $this->db->join('produto', 'produto.cod_produto = ordem_compra.cod_produto');
        $this->db->join('tipo_produto', 'tipo_produto.cod_tipo_produto = produto.cod_tipo_produto');
        $this->db->where('pedido_compra.num_pedido_compra', $numPedidoCompra);
        $this->db->order_by('ordem_compra.data_necessidade', 'asc');
        
        return $query = $this->db->get()->result();

    }

    public function getOrdemPorProdutoPedido($codProduto, $numPedidoCompra, $ordem){
        $this->db->where('produto.id_empresa', getDadosUsuarioLogado()['id_empresa']); 
        $this->db->where('ordem_compra.id_empresa', getDadosUsuarioLogado()['id_empresa']); 

        $this->db->select('pedido_compra.*, ordem_compra.num_ordem_compra, ordem_compra.quant_pedida, ordem_compra.quant_atendida, ordem_compra.valor_unitario, 
                           ordem_compra.cod_produto, ordem_compra.data_necessidade, ordem_compra.status, ordem_compra.observacoes,
                        produto.nome_produto, produto.cod_unidade_medida, tipo_produto.nome_tipo_produto');
        $this->db->from('pedido_compra');
        $this->db->join('ordem_compra', 'ordem_compra.num_pedido_compra = pedido_compra.num_pedido_compra');
        $this->db->join('produto', 'produto.cod_produto = ordem_compra.cod_produto');
        $this->db->join('tipo_produto', 'tipo_produto.cod_tipo_produto = produto.cod_tipo_produto');
        $this->db->where('pedido_compra.num_pedido_compra', $numPedidoCompra);
        $this->db->where('ordem_compra.cod_produto', $codProduto);
        $this->db->order_by('ordem_compra.data_necessidade', $ordem);
        
        return $query = $this->db->get()->result();

    }

    public function getProdutoPedido($numPedidoCompra){
        $this->db->where('produto.id_empresa', getDadosUsuarioLogado()['id_empresa']); 
        $this->db->where('ordem_compra.id_empresa', getDadosUsuarioLogado()['id_empresa']); 

        $this->db->select('ordem_compra.cod_produto, produto.nome_produto, tipo_produto.nome_tipo_produto, ordem_compra.valor_unitario,
                           produto.cod_unidade_medida, sum(ordem_compra.quant_pedida) quant_pedida, sum(ordem_compra.quant_atendida) quant_recebida, sum(ordem_compra.valor_unitario * ordem_compra.quant_pedida) total_compra');
        $this->db->select('produto.tipo_controle, produto.dias_vencimento');
        $this->db->from('pedido_compra');
        $this->db->join('ordem_compra', 'ordem_compra.num_pedido_compra = pedido_compra.num_pedido_compra');
        $this->db->join('produto', 'produto.cod_produto = ordem_compra.cod_produto');
        $this->db->join('tipo_produto', 'tipo_produto.cod_tipo_produto = produto.cod_tipo_produto');
        $this->db->where('pedido_compra.num_pedido_compra', $numPedidoCompra);
        $this->db->group_by('ordem_compra.cod_produto');
        
        return $query = $this->db->get()->result();

    }

    public function getLotesPorProdutoCompra($produto_compra){
        $this->db->where('produto_lote.id_empresa', getDadosUsuarioLogado()['id_empresa']); 

        $this->db->select('produto_lote.*');
        $this->db->from('produto_lote');
        $this->db->where('produto_lote.data_validade >= CURRENT_DATE()');
        
        if($produto_compra != null){
            $this->db->group_start();
            foreach($produto_compra as $key_produto => $produto) {
                $this->db->or_where('produto_lote.cod_produto', $produto->cod_produto);
            }
            $this->db->group_end(); 
        }

        $this->db->order_by('produto_lote.data_validade', 'asc');

        return $query = $this->db->get()->result();
    }

    public function getOrdemSemPedido(){
        $this->db->where('ordem_compra.id_empresa', getDadosUsuarioLogado()['id_empresa']); 
        $this->db->where('produto.id_empresa', getDadosUsuarioLogado()['id_empresa']); 

        //Join para pegar o tipo de produto
        $this->db->select('ordem_compra.*, produto.nome_produto');
        $this->db->from('ordem_compra');
        $this->db->join('produto', 'produto.cod_produto = ordem_compra.cod_produto');
        $this->db->where('ordem_compra.num_pedido_compra is null');        
        
        return $query = $this->db->get()->result();
        
    }

    public function getOrdemAberta($filter = "", $limit = null, $offset = null){
        $this->db->where('ordem_compra.id_empresa', getDadosUsuarioLogado()['id_empresa']); 
        $this->db->where('produto.id_empresa', getDadosUsuarioLogado()['id_empresa']); 

        if($limit){
            $this->db->limit($limit, $offset);
        }

        //Join para pegar o tipo de produto
        $this->db->select('ordem_compra.*, produto.nome_produto, produto.cod_unidade_medida');
        $this->db->from('ordem_compra');
        $this->db->join('produto', 'produto.cod_produto = ordem_compra.cod_produto');
        $this->db->where('ordem_compra.status !=', '3');        

        if($filter <> ""){
            $this->db->group_start();
            $this->db->or_like('ordem_compra.num_ordem_compra' ,$filter);
            $this->db->or_like('ordem_compra.cod_produto' ,$filter);
            $this->db->or_like('nome_produto' ,$filter);
            $this->db->or_like('cod_unidade_medida' ,$filter);
            $this->db->group_end();
            
        }
        
        return $query = $this->db->get()->result();
        
    }

    public function getRecebimentos($numPedidoCompra){       

        //Join para pegar o tipo de produto
        $this->db->select('recebimento_material.*');
        $this->db->select('(recebimento_material.valor_bruto + recebimento_material.valor_frete + recebimento_material.valor_seguro + 
                            recebimento_material.outras_despesas - recebimento_material.valor_desconto) valor_total');
        $this->db->select('usuario.nome_usuario');
        $this->db->from('recebimento_material');
        $this->db->join('usuario', 'usuario.email = recebimento_material.usuario', 'left');
        $this->db->where('recebimento_material.num_pedido_compra', $numPedidoCompra);  
        $this->db->where('recebimento_material.estornado', '0');         
        $this->db->order_by('recebimento_material.cod_recebimento_material', 'desc');
        
        return $query = $this->db->get()->result();
        
    }

    public function getRecebimentoPorPedido($numPedidoCompra){
        $this->db->where('produto.id_empresa', getDadosUsuarioLogado()['id_empresa']); 

        $this->db->select('recebimento_material_produto.*, produto.nome_produto, produto.cod_unidade_medida, tipo_produto.nome_tipo_produto');
        $this->db->from('recebimento_material_produto');
        $this->db->join('produto', 'produto.cod_produto = recebimento_material_produto.cod_produto');
        $this->db->join('tipo_produto', 'tipo_produto.cod_tipo_produto = produto.cod_tipo_produto');
        $this->db->join('recebimento_material', 'recebimento_material.cod_recebimento_material = recebimento_material_produto.cod_recebimento_material');
        $this->db->where('recebimento_material.num_pedido_compra', $numPedidoCompra);
        $this->db->order_by('recebimento_material_produto.seq_produto_recebimento', 'desc');  
        
        return $query = $this->db->get()->result();

    }

    public function getMovimentoPorRecebimento($codRecebimento){
        $this->db->where('movimentos_estoque.id_empresa', getDadosUsuarioLogado()['id_empresa']); 

        $this->db->select('movimentos_estoque.*');
        $this->db->from('movimentos_estoque');
        $this->db->where('movimentos_estoque.id_origem', $codRecebimento);
        $this->db->where('movimentos_estoque.origem_movimento', '2'); 
        
        return $query = $this->db->get()->result();

    }

    public function getOrdemPorQuantPedida(){
        $this->db->where('ordem_compra.id_empresa', getDadosUsuarioLogado()['id_empresa']); 
        $this->db->where('produto.id_empresa', getDadosUsuarioLogado()['id_empresa']); 

        $this->db->select('ordem_compra.cod_produto, produto.nome_produto, sum(ordem_compra.quant_pedida) as pedida, sum(ordem_compra.quant_atendida) recebida');
        $this->db->from('ordem_compra');
        $this->db->join('produto', 'produto.cod_produto = ordem_compra.cod_produto');
        $this->db->where('ordem_compra.status !=', '3');
        $this->db->group_by('ordem_compra.cod_produto');
        $this->db->order_by('pedida', 'desc');
        $this->db->limit(5);

        return $query = $this->db->get()->result();

    }    

    public function selectOrdem($NumOrdem){

        $ordem_compra = $this->getOrdemCompraPorCodigo($NumOrdem);

        $dataNecessidade = str_replace('-', '/', date("d-m-Y", strtotime($ordem_compra->data_necessidade)));
        $quantPedida = number_format((float) ($ordem_compra->quant_pedida), 3, ',', '.');
        $valorUnitario = number_format((float) ($ordem_compra->custo_medio), 2, ',', '.');
        $valorTotal = number_format((float) ($ordem_compra->quant_pedida * $ordem_compra->custo_medio), 2, ',', '.');

        $input = "{$ordem_compra->nome_tipo_produto}|{$ordem_compra->cod_unidade_medida}|{$dataNecessidade}|{$quantPedida}|{$valorUnitario}|{$valorTotal}|{$ordem_compra->observacoes}";

        return $input;

    } 

    public function getValoresCompras($dataInicio, $dataFim){ 
        
        $this->db->where('pedido_compra.id_empresa', getDadosUsuarioLogado()['id_empresa']);  

        //Join para pegar o tipo de produto
        $this->db->select("sum(recebimento_material.valor_bruto + 
                               recebimento_material.valor_frete +
                               recebimento_material.valor_seguro +
                               recebimento_material.outras_despesas - 
                               recebimento_material.valor_desconto) total_compras");  
        $this->db->select("sum(recebimento_material.valor_bruto) total_produto");          
        $this->db->select("sum(recebimento_material.valor_frete) total_frete");
        $this->db->select("sum(recebimento_material.valor_seguro) total_seguro");
        $this->db->select("sum(recebimento_material.outras_despesas) outras_despesas");
        $this->db->select("sum(recebimento_material.valor_desconto) total_desconto");
        $this->db->from('recebimento_material');
        $this->db->join('pedido_compra', 'pedido_compra.num_pedido_compra = recebimento_material.num_pedido_compra');
        $this->db->where('recebimento_material.estornado', '0');         
        $this->db->where('recebimento_material.data_recebimento >= ', $dataInicio);
        $this->db->where('recebimento_material.data_recebimento <= ', $dataFim);

        return $this->db->get()->row(); 
        
    }

    public function getComprasPorDia($dataInicio, $dataFim){

        $this->db->select('tim.db_date as data,
                            tim.month_name as nome_mes,
                        IFNULL(compra.quant_compra, 0) as compra_dia                       
                        from time_dimension tim');
        $this->db->join('(
                            SELECT recebimento_material.data_recebimento,
                                   sum(recebimento_material.valor_bruto + 
                                       recebimento_material.valor_frete +
                                       recebimento_material.valor_seguro +
                                       recebimento_material.outras_despesas -
                                       recebimento_material.valor_desconto) quant_compra
                            FROM recebimento_material 
                            JOIN pedido_compra ON pedido_compra.num_pedido_compra = recebimento_material.num_pedido_compra
                            where pedido_compra.id_empresa = ' . getDadosUsuarioLogado()['id_empresa'] . '
                              and recebimento_material.estornado = 0
                            GROUP BY recebimento_material.data_recebimento
                        ) as compra', 'compra on compra.data_recebimento = tim.db_date ', 'left');
        $this->db->where('tim.db_date <= CURRENT_DATE()');
        $this->db->order_by('tim.db_date', 'asc');

        $this->db->where("tim.db_date >= ", $dataInicio);
        $this->db->where("tim.db_date <= ", $dataFim);

        return $query = $this->db->get()->result();   
    }

    public function getComprasAno($dataInicio, $dataFim){

        $this->db->select('tim.year as ano,
                           tim.month as mes,
                           tim.month_name as nome_mes,
                           SUM(IFNULL(compra.quant_compra, 0)) as compra_mes                       
                        from time_dimension tim');
        $this->db->join('(
                            SELECT recebimento_material.data_recebimento,
                                   sum(recebimento_material.valor_bruto + 
                                       recebimento_material.valor_frete +
                                       recebimento_material.valor_seguro +
                                       recebimento_material.outras_despesas -
                                       recebimento_material.valor_desconto) quant_compra
                            FROM recebimento_material 
                            JOIN pedido_compra ON pedido_compra.num_pedido_compra = recebimento_material.num_pedido_compra
                            where pedido_compra.id_empresa = ' . getDadosUsuarioLogado()['id_empresa'] . '
                              and recebimento_material.estornado = 0
                            GROUP BY recebimento_material.data_recebimento
                        ) as compra', 'compra on compra.data_recebimento = tim.db_date ', 'left');
        $this->db->where('tim.db_date <= CURRENT_DATE()');
        $this->db->group_by('tim.month');
        $this->db->order_by('tim.month', 'asc');

        $this->db->where("tim.db_date >= ", $dataInicio);
        $this->db->where("tim.db_date <= ", $dataFim);

        return $query = $this->db->get()->result();   
    }

    public function getCompraProdutoDash($dataInicio, $dataFim){
        $this->db->where('pedido_compra.id_empresa', getDadosUsuarioLogado()['id_empresa']); 
        $this->db->where('produto.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('produto.*');
        $this->db->select('sum(recebimento_material_produto.quantidade) quant_vendido');
        $this->db->select('sum(recebimento_material_produto.valor_unitario *
                               recebimento_material_produto.quantidade) valor_total');
        $this->db->select("concat('#',SUBSTRING((lpad(hex(round(rand() * 10000000)),6,0)),-6)) color");
        $this->db->from('recebimento_material_produto');
        $this->db->join('produto', 'produto.cod_produto = recebimento_material_produto.cod_produto');
        $this->db->join('recebimento_material', 'recebimento_material.cod_recebimento_material = recebimento_material_produto.cod_recebimento_material');
        $this->db->join('pedido_compra', 'pedido_compra.num_pedido_compra = recebimento_material.num_pedido_compra');
        $this->db->where('recebimento_material.estornado', '0');
        $this->db->group_by('recebimento_material_produto.cod_produto');
        $this->db->order_by('valor_total', 'desc');

        $this->db->where("recebimento_material.data_recebimento >= ", $dataInicio);
        $this->db->where("recebimento_material.data_recebimento <= ", $dataFim);

        return $this->db->get()->result();

    }

    public function getCompraFornecedorDash($dataInicio, $dataFim){
        $this->db->where('pedido_compra.id_empresa', getDadosUsuarioLogado()['id_empresa']); 
        $this->db->where('fornecedor.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('pedido_compra.cod_fornecedor, fornecedor.nome_fornecedor');
        $this->db->select('sum(recebimento_material.valor_bruto) total_compra');        
        $this->db->select('sum(recebimento_material.valor_frete) total_frete');
        $this->db->select('sum(recebimento_material.valor_seguro) total_seguro');
        $this->db->select('sum(recebimento_material.outras_despesas) outras_despesas');
        $this->db->select('sum(recebimento_material.valor_desconto) total_desconto');
        $this->db->select("concat('#',SUBSTRING((lpad(hex(round(rand() * 10000000)),6,0)),-6)) color");
        $this->db->from('recebimento_material');
        $this->db->join('pedido_compra', 'pedido_compra.num_pedido_compra = recebimento_material.num_pedido_compra');
        $this->db->join('fornecedor', 'fornecedor.cod_fornecedor = pedido_compra.cod_fornecedor');
        $this->db->where('recebimento_material.estornado', '0');
        $this->db->group_by('pedido_compra.cod_fornecedor');
        $this->db->order_by('total_compra', 'desc');

        $this->db->where("recebimento_material.data_recebimento >= ", $dataInicio);
        $this->db->where("recebimento_material.data_recebimento <= ", $dataFim);

        return $this->db->get()->result();

    }

    public function getStatusCompra($dataInicio, $dataFim){
        $this->db->where('ordem_compra.id_empresa', getDadosUsuarioLogado()['id_empresa']); 

        $this->db->select("count(ordem_compra.num_ordem_compra) total");
        $this->db->select("sum(if(data_necessidade < CURRENT_DATE() and ordem_compra.status != 3 and ordem_compra.status != 4, 1, 0)) atrasado");
        $this->db->select("sum(if(ordem_compra.status = 1 and data_necessidade >= CURRENT_DATE(), 1, 0)) pendente");
        $this->db->select("sum(if(ordem_compra.status = 2 and data_necessidade >= CURRENT_DATE(), 1, 0)) produzido_parcial");
        $this->db->select("sum(if(ordem_compra.status = 3, 1, 0)) produzido_total");
        $this->db->select("sum(if(ordem_compra.status = 4, 1, 0)) estornado");
        $this->db->from('ordem_compra');
        $this->db->where('ordem_compra.data_necessidade >= ', $dataInicio);
        $this->db->where('ordem_compra.data_necessidade <= ', $dataFim);

        return $query = $this->db->get()->row();


    }

    public function countAllOrdem($select = "OrdensSemPedido"){
        $this->db->where('id_empresa', getDadosUsuarioLogado()['id_empresa']); 

        if($select == "OrdensSemPedido"){
            $this->db->where('ordem_compra.num_pedido_compra is null');
        }elseif($select == "OrdensComPedido"){
            $this->db->where('ordem_compra.num_pedido_compra is not null');
        }

        return $this->db->count_all_results('ordem_compra');
    }

    public function countAllPedido(){
        $this->db->where('id_empresa', getDadosUsuarioLogado()['id_empresa']); 

        return $this->db->count_all_results('pedido_compra');
    }

    public function countAllPedidoRecebimento(){
        $this->db->where('id_empresa', getDadosUsuarioLogado()['id_empresa']); 
        $this->db->where("exists (select * from ordem_compra where ordem_compra.num_pedido_compra = pedido_compra.num_pedido_compra)");

        return $this->db->count_all_results('pedido_compra');
    }

    public function countAllOrdemAberta(){
        $this->db->where('id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $query = $this->db->where('status !=', '3')->get('ordem_compra');
        return $query->num_rows();

    }   

    public function getOrdemCompraPorCodigo($NumOrdem){
        $this->db->where('produto.id_empresa', getDadosUsuarioLogado()['id_empresa']); 

        $this->db->select('ordem_compra.*, produto.nome_produto, produto.cod_unidade_medida, produto.custo_medio, tipo_produto.nome_tipo_produto, usuario.nome_usuario');
        $this->db->select('fornecedor.cod_fornecedor, fornecedor.nome_fornecedor');
        $this->db->join('produto', 'produto.cod_produto = ordem_compra.cod_produto');
        $this->db->join('tipo_produto', 'tipo_produto.cod_tipo_produto = produto.cod_tipo_produto'); 
        $this->db->join('pedido_compra', 'pedido_compra.num_pedido_compra = ordem_compra.num_pedido_compra', 'left'); 
        $this->db->join('fornecedor', 'fornecedor.cod_fornecedor = pedido_compra.cod_fornecedor', 'left');  
        $this->db->join('usuario', 'usuario.email = ordem_compra.usuario', 'left');     
        return $this->db->get_where('ordem_compra', array('num_ordem_compra' => $NumOrdem))->row();
        
        return $query = $this->db->get()->row();

    }  

    public function getOrdemCompraSemPedidoPorCodigo($NumOrdem){
        $this->db->where('produto.id_empresa', getDadosUsuarioLogado()['id_empresa']); 

        $this->db->select('ordem_compra.*, produto.nome_produto, produto.cod_unidade_medida, produto.custo_medio, tipo_produto.nome_tipo_produto');
        $this->db->from('ordem_compra');
        $this->db->join('produto', 'produto.cod_produto = ordem_compra.cod_produto');
        $this->db->join('tipo_produto', 'tipo_produto.cod_tipo_produto = produto.cod_tipo_produto');
        $this->db->where('ordem_compra.num_ordem_compra', $NumOrdem);   
        $this->db->where('ordem_compra.num_pedido_compra is null');     
        
        return $query = $this->db->get()->row();

    }

    public function getCotacaoPorOrdem($NumOrdem){
        $this->db->where('fornecedor.id_empresa', getDadosUsuarioLogado()['id_empresa']); 
        $this->db->where('ordem_compra.id_empresa', getDadosUsuarioLogado()['id_empresa']); 

        $this->db->select('cotacao_ordem.*, fornecedor.nome_fornecedor');
        $this->db->from('cotacao_ordem');
        $this->db->join('ordem_compra', 'ordem_compra.num_ordem_compra = cotacao_ordem.num_ordem_compra');   
        $this->db->join('fornecedor', 'fornecedor.cod_fornecedor = cotacao_ordem.cod_fornecedor');      
        $this->db->where('cotacao_ordem.num_ordem_compra', $NumOrdem);  
        $this->db->order_by('cotacao_ordem.valor_unitario', 'asc'); 
        
        return $query = $this->db->get()->result();

    } 

    public function getCotacaoPorCodigo($seqCotacao){
        $this->db->where('fornecedor.id_empresa', getDadosUsuarioLogado()['id_empresa']); 
        $this->db->where('ordem_compra.id_empresa', getDadosUsuarioLogado()['id_empresa']); 

        $this->db->select('cotacao_ordem.*, fornecedor.nome_fornecedor');
        $this->db->from('cotacao_ordem');
        $this->db->join('ordem_compra', 'ordem_compra.num_ordem_compra = cotacao_ordem.num_ordem_compra');   
        $this->db->join('fornecedor', 'fornecedor.cod_fornecedor = cotacao_ordem.cod_fornecedor');      
        $this->db->where('cotacao_ordem.seq_cotacao_compra', $seqCotacao);  
        
        return $query = $this->db->get()->row();

    } 

    public function getCotacoesPorFornecedor($codFornecedor){
        $this->db->where('fornecedor.id_empresa', getDadosUsuarioLogado()['id_empresa']); 
        $this->db->where('ordem_compra.id_empresa', getDadosUsuarioLogado()['id_empresa']); 
        $this->db->where('produto.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('cotacao_ordem.*, fornecedor.nome_fornecedor, ordem_compra.cod_produto, produto.nome_produto, ordem_compra.quant_pedida');
        $this->db->from('cotacao_ordem');
        $this->db->join('ordem_compra', 'ordem_compra.num_ordem_compra = cotacao_ordem.num_ordem_compra');   
        $this->db->join('produto', 'produto.cod_produto = ordem_compra.cod_produto');  
        $this->db->join('fornecedor', 'fornecedor.cod_fornecedor = cotacao_ordem.cod_fornecedor');      
        $this->db->where('cotacao_ordem.cod_fornecedor', $codFornecedor);  
        $this->db->where('ordem_compra.num_pedido_compra is null');  
        
        return $query = $this->db->get()->result();

    }
    
    public function getRecebimentoPorCodigo($codRecebimento){  
        
        $this->db->where('recebimento_material.cod_recebimento_material', $codRecebimento); 
        return $query = $this->db->get('recebimento_material')->row();
        
    }

    public function getOrdemCompraPendente(){
        $this->db->where('ordem_compra.id_empresa', getDadosUsuarioLogado()['id_empresa']); 
        $this->db->where('produto.id_empresa', getDadosUsuarioLogado()['id_empresa']); 

        //Join para pegar o tipo de produto
        $this->db->select('ordem_compra.*, produto.nome_produto, produto.cod_unidade_medida');
        $this->db->from('ordem_compra');
        $this->db->join('produto', 'produto.cod_produto = ordem_compra.cod_produto');  
        $this->db->where('status !=', '3'); 
        $this->db->order_by('data_necessidade', 'asc'); 
        $this->db->limit(5);
        
        return $query = $this->db->get()->result();

    }

    public function getPedidoCompraPendente(){
        $this->db->where('pedido_compra.id_empresa', getDadosUsuarioLogado()['id_empresa']); 

        //Join para pegar o tipo de produto
        $this->db->select('pedido_compra.*, fornecedor.nome_fornecedor');
        $this->db->select('(select sum(ordem_compra.valor_unitario * ordem_compra.quant_pedida) 
                             from ordem_compra
                            where ordem_compra.num_pedido_compra = pedido_compra.num_pedido_compra) valor_total_pedido');
        $this->db->from('pedido_compra');
        $this->db->join('fornecedor', 'fornecedor.cod_fornecedor = pedido_compra.cod_fornecedor');
        $this->db->where('exists(select * from ordem_compra
                                  where ordem_compra.num_pedido_compra = pedido_compra.num_pedido_compra
                                    and ordem_compra.status = 1)');
        $this->db->order_by('pedido_compra.data_entrega', 'asc');
        
        return $query = $this->db->get()->result();

    }

    public function getCompraTotal(){
        $this->db->where('pedido_compra.id_empresa', getDadosUsuarioLogado()['id_empresa']); 

        $this->db->select('sum((select sum(movimentos_estoque.valor_movimento)
                              from movimentos_estoque
                             where movimentos_estoque.origem_movimento = 2
                               and movimentos_estoque.id_origem = recebimento_material.cod_recebimento_material)) valor_total');
        $this->db->from('recebimento_material');
        $this->db->join('pedido_compra', 'pedido_compra.num_pedido_compra = recebimento_material.num_pedido_compra');
        $this->db->where('recebimento_material.estornado', '0');     
        $this->db->where('recebimento_material.data_recebimento >=', date('Y-m-01'));
        $this->db->where('recebimento_material.data_recebimento <=', date('Y-m-d')); 
        
        return $query = $this->db->get()->row();
        
    }

    public function getCompraFornecedorVisaoGeral(){
        $this->db->where('pedido_compra.id_empresa', getDadosUsuarioLogado()['id_empresa']); 
        $this->db->where('fornecedor.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('pedido_compra.cod_fornecedor, fornecedor.nome_fornecedor,
                           sum(movimentos_estoque.valor_movimento) total_compra');
        $this->db->from('movimentos_estoque');
        $this->db->join('recebimento_material', 'recebimento_material.cod_recebimento_material = movimentos_estoque.id_origem');
        $this->db->join('pedido_compra', 'pedido_compra.num_pedido_compra = recebimento_material.num_pedido_compra');
        $this->db->join('fornecedor', 'fornecedor.cod_fornecedor = pedido_compra.cod_fornecedor');
        $this->db->where('movimentos_estoque.origem_movimento', '2');
        $this->db->where('movimentos_estoque.valor_movimento !=', '0');
        $this->db->where('recebimento_material.estornado', '0');
        $this->db->where('recebimento_material.data_recebimento >=', date('Y-m-01'));
        $this->db->where('recebimento_material.data_recebimento <=', date('Y-m-d')); 
        $this->db->group_by('pedido_compra.cod_fornecedor');
        $this->db->order_by('sum(movimentos_estoque.valor_movimento)', 'desc');
        $this->db->limit(3);        

        return $query = $this->db->get()->result();

    }

    //Relatórios
    public function getTotalCompra($dataInicio, $dataFim, $codProdutos){
        $this->db->where('produto.id_empresa', getDadosUsuarioLogado()['id_empresa']); 
        $this->db->where('movimentos_estoque.id_empresa', getDadosUsuarioLogado()['id_empresa']);         

        $this->db->select('sum(movimentos_estoque.valor_movimento) valor_total, sum(recebimento_material.valor_desconto) valor_desconto');
        $this->db->from('movimentos_estoque');
        $this->db->join('produto', 'produto.cod_produto = movimentos_estoque.cod_produto');
        $this->db->join('tipo_produto', 'tipo_produto.cod_tipo_produto = produto.cod_tipo_produto');
        $this->db->join('recebimento_material', 'recebimento_material.cod_recebimento_material = movimentos_estoque.id_origem');
        $this->db->where('movimentos_estoque.origem_movimento', '2');
        $this->db->where('recebimento_material.estornado', '0');

        $this->db->where("movimentos_estoque.data_movimento >= ", $dataInicio);
        $this->db->where("movimentos_estoque.data_movimento <= ", $dataFim);

        if($codProdutos != ""){
            $this->db->where_in('produto.cod_produto', $codProdutos);
        }

        return $query = $this->db->get()->row();

    }

    public function compraResumida($dataInicio, $dataFim, $codProdutos){
        $this->db->where('pedido_compra.id_empresa', getDadosUsuarioLogado()['id_empresa']); 
        $this->db->where('produto.id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('tipo_produto.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('movimentos_estoque.cod_produto, produto.nome_produto, tipo_produto.nome_tipo_produto, produto.cod_unidade_medida, 
                           sum(movimentos_estoque.quant_movimentada) quant_comprada, sum(movimentos_estoque.valor_movimento) total_compra');
        $this->db->from('movimentos_estoque');
        $this->db->join('produto', 'produto.cod_produto = movimentos_estoque.cod_produto');
        $this->db->join('tipo_produto', 'tipo_produto.cod_tipo_produto = produto.cod_tipo_produto');
        $this->db->join('recebimento_material', 'recebimento_material.cod_recebimento_material = movimentos_estoque.id_origem');
        $this->db->join('pedido_compra', 'pedido_compra.num_pedido_compra = recebimento_material.num_pedido_compra');
        $this->db->where('movimentos_estoque.origem_movimento', '2');
        $this->db->where('recebimento_material.estornado', '0');
        $this->db->group_by('movimentos_estoque.cod_produto');

        $this->db->where("movimentos_estoque.data_movimento >= ", $dataInicio);
        $this->db->where("movimentos_estoque.data_movimento <= ", $dataFim);

        if($codProdutos != ""){
            $this->db->where_in('produto.cod_produto', $codProdutos);
        }

        return $query = $this->db->get()->result();

    }

    public function compraDetalhada($dataInicio, $dataFim, $codProdutos){
        $this->db->where('pedido_compra.id_empresa', getDadosUsuarioLogado()['id_empresa']); 
        $this->db->where('produto.id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('tipo_produto.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('movimentos_estoque.data_movimento, pedido_compra.num_pedido_compra, recebimento_material.cod_recebimento_material,
                           movimentos_estoque.cod_produto, produto.nome_produto, tipo_produto.nome_tipo_produto, produto.cod_unidade_medida, 
                           movimentos_estoque.quant_movimentada, movimentos_estoque.valor_movimento');
        $this->db->from('movimentos_estoque');
        $this->db->join('produto', 'produto.cod_produto = movimentos_estoque.cod_produto');
        $this->db->join('tipo_produto', 'tipo_produto.cod_tipo_produto = produto.cod_tipo_produto');
        $this->db->join('recebimento_material', 'recebimento_material.cod_recebimento_material = movimentos_estoque.id_origem');
        $this->db->join('pedido_compra', 'pedido_compra.num_pedido_compra = recebimento_material.num_pedido_compra');
        $this->db->where('movimentos_estoque.origem_movimento', '2');
        $this->db->where('recebimento_material.estornado', '0');
        $this->db->order_by('movimentos_estoque.data_movimento', 'desc');

        $this->db->where("movimentos_estoque.data_movimento >= ", $dataInicio);
        $this->db->where("movimentos_estoque.data_movimento <= ", $dataFim);

        if($codProdutos != ""){
            $this->db->where_in('produto.cod_produto', $codProdutos);
        }

        return $query = $this->db->get()->result();

    }

    public function getTotalCompraFornecedor($dataInicio, $dataFim, $codFornecedores){
        $this->db->where('pedido_compra.id_empresa', getDadosUsuarioLogado()['id_empresa']); 
        $this->db->where('movimentos_estoque.id_empresa', getDadosUsuarioLogado()['id_empresa']);         

        $this->db->select('sum(movimentos_estoque.valor_movimento) valor_total, sum(recebimento_material.valor_desconto) valor_desconto');
        $this->db->from('movimentos_estoque');
        $this->db->join('recebimento_material', 'recebimento_material.cod_recebimento_material = movimentos_estoque.id_origem');
        $this->db->join('pedido_compra', 'pedido_compra.num_pedido_compra = recebimento_material.num_pedido_compra');
        $this->db->where('movimentos_estoque.origem_movimento', '2');
        $this->db->where('recebimento_material.estornado', '0');

        $this->db->where("movimentos_estoque.data_movimento >= ", $dataInicio);
        $this->db->where("movimentos_estoque.data_movimento <= ", $dataFim);

        if($codFornecedores != ""){
            $this->db->where_in('pedido_compra.cod_fornecedor', $codFornecedores);
        }

        return $query = $this->db->get()->row();

    }

    public function fornecedorResumida($dataInicio, $dataFim, $codFornecedores){
        $this->db->where('pedido_compra.id_empresa', getDadosUsuarioLogado()['id_empresa']); 
        $this->db->where('fornecedor.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('pedido_compra.cod_fornecedor, fornecedor.nome_fornecedor, fornecedor.cnpj_cpf, segmento.nome_segmento');
        $this->db->select("sum(recebimento_material.valor_bruto) total_produto");        
        $this->db->select("sum(recebimento_material.valor_frete) total_frete");
        $this->db->select("sum(recebimento_material.valor_seguro) total_seguro");
        $this->db->select("sum(recebimento_material.outras_despesas) outras_despesas");
        $this->db->select("sum(recebimento_material.valor_desconto) total_desconto");
        $this->db->from('recebimento_material');
        $this->db->join('pedido_compra', 'pedido_compra.num_pedido_compra = recebimento_material.num_pedido_compra');
        $this->db->join('fornecedor', 'fornecedor.cod_fornecedor = pedido_compra.cod_fornecedor');
        $this->db->join('segmento', 'segmento.cod_segmento = fornecedor.cod_segmento');
        $this->db->where('recebimento_material.estornado', '0');
        $this->db->group_by('pedido_compra.cod_fornecedor');

        $this->db->where("recebimento_material.data_recebimento >= ", $dataInicio);
        $this->db->where("recebimento_material.data_recebimento <= ", $dataFim);

        if($codFornecedores != ""){
            $this->db->where_in('pedido_compra.cod_fornecedor', $codFornecedores);
        }

        return $query = $this->db->get()->result();

    }

    public function fornecedorDetalhada($dataInicio, $dataFim, $codFornecedores){

        $this->db->where('pedido_compra.id_empresa', getDadosUsuarioLogado()['id_empresa']); 
        $this->db->where('fornecedor.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('recebimento_material.data_recebimento, pedido_compra.cod_fornecedor, fornecedor.nome_fornecedor, fornecedor.cnpj_cpf, segmento.nome_segmento');
        $this->db->select('recebimento_material.num_pedido_compra');
        $this->db->select('recebimento_material.valor_bruto');
        $this->db->select('recebimento_material.valor_desconto');
        $this->db->select('recebimento_material.outras_despesas');
        $this->db->select('recebimento_material.valor_seguro');
        $this->db->select('recebimento_material.valor_frete');
        $this->db->from('recebimento_material');
        $this->db->join('pedido_compra', 'pedido_compra.num_pedido_compra = recebimento_material.num_pedido_compra');
        $this->db->join('fornecedor', 'fornecedor.cod_fornecedor = pedido_compra.cod_fornecedor');
        $this->db->join('segmento', 'segmento.cod_segmento = fornecedor.cod_segmento');
        $this->db->where('recebimento_material.estornado', '0');
        $this->db->group_by('pedido_compra.cod_fornecedor');

        $this->db->where("recebimento_material.data_recebimento >= ", $dataInicio);
        $this->db->where("recebimento_material.data_recebimento <= ", $dataFim);

        if($codFornecedores != ""){
            $this->db->where_in('pedido_compra.cod_fornecedor', $codFornecedores);
        }

        return $query = $this->db->get()->result();

    }

    //Indicadores
    // Para o gráfico
    public function getComprasDiaria($dataInicio, $dataFim){

        $this->db->select('tim.db_date as data,
                            tim.month_name as nome_mes,
                        IFNULL(compra.quant_comprada, 0) as compra_dia                        
                        from time_dimension tim');
        $this->db->join('(
                            SELECT movimentos_estoque.data_movimento, sum(movimentos_estoque.valor_movimento) as quant_comprada
                            FROM movimentos_estoque 
                            JOIN recebimento_material ON recebimento_material.cod_recebimento_material = movimentos_estoque.id_origem
                            where movimentos_estoque.id_empresa = ' . getDadosUsuarioLogado()['id_empresa'] . '
                              and movimentos_estoque.origem_movimento = 2
                              and recebimento_material.estornado = 0
                            GROUP BY movimentos_estoque.data_movimento 
                        ) as compra', 'compra on compra.data_movimento = tim.db_date ', 'left');
        $this->db->where('tim.db_date <= CURRENT_DATE()');
        $this->db->order_by('tim.db_date', 'asc');

        $this->db->where("tim.db_date >= ", $dataInicio);
        $this->db->where("tim.db_date <= ", $dataFim);

        return $query = $this->db->get()->result();   
    }

    public function getCompraPendente($dataInicio, $dataFim){
        $this->db->where('pedido_compra.id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('ordem_compra.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('sum((ordem_compra.quant_pedida - ordem_compra.quant_atendida) * ordem_compra.valor_unitario) valor_pendente');
        $this->db->from('ordem_compra');
        $this->db->join('pedido_compra', 'pedido_compra.num_pedido_compra = ordem_compra.num_pedido_compra');
        $this->db->where('ordem_compra.status != 3');

        $this->db->where("pedido_compra.data_entrega >= ", $dataInicio);
        $this->db->where("pedido_compra.data_entrega <= ", $dataFim);

        return $this->db->get()->row();
    }

    public function getOrdensPendentes($dataInicio, $dataFim){
        $this->db->where('ordem_compra.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('count(*) quant_ordem');
        $this->db->from('ordem_compra');
        $this->db->where('ordem_compra.num_pedido_compra is null');
        $this->db->where('ordem_compra.status != 3');

        $this->db->where("ordem_compra.data_necessidade >= ", $dataInicio);
        $this->db->where("ordem_compra.data_necessidade <= ", $dataFim);

        return $this->db->get()->row();
    }

    public function getCompraProduto($dataInicio, $dataFim){
        $this->db->where('pedido_compra.id_empresa', getDadosUsuarioLogado()['id_empresa']); 
        $this->db->where('produto.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('movimentos_estoque.cod_produto, produto.nome_produto, produto.cod_unidade_medida,
                           sum(movimentos_estoque.quant_movimentada) as quant_comprada, 
                           sum(movimentos_estoque.valor_movimento) as valor_comprado');
        $this->db->from('movimentos_estoque');
        $this->db->join('produto', 'produto.cod_produto = movimentos_estoque.cod_produto');
        $this->db->join('recebimento_material', 'recebimento_material.cod_recebimento_material = movimentos_estoque.id_origem');
        $this->db->join('pedido_compra', 'pedido_compra.num_pedido_compra = recebimento_material.num_pedido_compra');
        $this->db->where('movimentos_estoque.origem_movimento', '2');
        $this->db->where('recebimento_material.estornado', '0');
        $this->db->group_by('movimentos_estoque.cod_produto');
        $this->db->order_by('sum(movimentos_estoque.valor_movimento)', 'desc');

        $this->db->where("movimentos_estoque.data_movimento >= ", $dataInicio);
        $this->db->where("movimentos_estoque.data_movimento <= ", $dataFim);

        return $query = $this->db->get()->result();

    }

    public function getCompraFornecedor($dataInicio, $dataFim){
        $this->db->where('pedido_compra.id_empresa', getDadosUsuarioLogado()['id_empresa']); 
        $this->db->where('fornecedor.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('pedido_compra.cod_fornecedor, fornecedor.nome_fornecedor,
                           sum(movimentos_estoque.quant_movimentada) quant_comprada, sum(movimentos_estoque.valor_movimento) total_compra');
        $this->db->from('movimentos_estoque');
        $this->db->join('recebimento_material', 'recebimento_material.cod_recebimento_material = movimentos_estoque.id_origem');
        $this->db->join('pedido_compra', 'pedido_compra.num_pedido_compra = recebimento_material.num_pedido_compra');
        $this->db->join('fornecedor', 'fornecedor.cod_fornecedor = pedido_compra.cod_fornecedor');
        $this->db->join('segmento', 'segmento.cod_segmento = fornecedor.cod_segmento');
        $this->db->where('movimentos_estoque.origem_movimento', '2');
        $this->db->where('recebimento_material.estornado', '0');
        $this->db->group_by('pedido_compra.cod_fornecedor');
        $this->db->order_by('sum(movimentos_estoque.valor_movimento)', 'desc');

        $this->db->where("movimentos_estoque.data_movimento >= ", $dataInicio);
        $this->db->where("movimentos_estoque.data_movimento <= ", $dataFim);

        return $query = $this->db->get()->result();

    }

}