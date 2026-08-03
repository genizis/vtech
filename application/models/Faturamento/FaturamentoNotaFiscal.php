<?php

class FaturamentoNotaFiscal extends CI_Model
{

    private static $table = 'tb_fat_nota_fiscal';

    public function insert($data)
    {
        $this->db->insert(self::$table, $data);

        return $this->db->insert_id();
    }

    public function update($id, $data)
    {

        $this->db->where('id', $id);
        $this->db->update(self::$table, $data);

        if ($this->db->affected_rows() > 0) {
            return $id;
        }

        return NULL;
    }

    public function delete($id)
    {
        $this->db->where('id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('id', $id)->delete(self::$table);
        if ($this->db->error()['message'] != '') {
            return $this->db->error();
        }
        return true;

    }

    public function deleteAllItens($id)
    {
        $this->db->where('tb_fat_nota_fiscal_id', $id)->delete('tb_fat_nota_fiscal_item');
        if ($this->db->error()['message'] != '') {
            return $this->db->error();
        }
        return true;

    }

    /**
     * @param $dadosNFItens
     * @param $nfId
     * @return bool
     */
    public function insertAll($dadosNFItens, $nfId)
    {
        $this->db->trans_start();
        $this->db->trans_strict(false);

        //Caso não haja itens na nota - pode haver informações faltantes
        if (count($dadosNFItens) <= 0) {
            $this->db->delete(self::$table, ['id' => $nfId]);
            return false;
        }
        foreach ($dadosNFItens as $item) {
            $this->db->insert('tb_fat_nota_fiscal_item', $item);
//            print_r($this->db->last_query());
//            exit();
        }

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $this->db->delete(self::$table, ['id' => $nfId]);
            return FALSE;
        } else {
            $this->db->trans_commit();
            return TRUE;
        }

    }

    public function getByNotaFsicalAvulsa($codNotaFiscal)
    {
        $this->db->select('tb_fat_nota_fiscal.*, nota_fiscal.valor_frete, nota_fiscal.valor_desconto');
        $this->db->from('tb_fat_nota_fiscal');
        $this->db->join('nota_fiscal', 'nota_fiscal.cod_nota_fiscal = tb_fat_nota_fiscal.cod_faturamento_pedido', 'inner');
        $this->db->where('tb_fat_nota_fiscal.cod_faturamento_pedido', $codNotaFiscal);
        $this->db->where('tb_fat_nota_fiscal.origem_nf', 3);
        $this->db->limit(1);
        return $query = $this->db->get()->row();

    }

    public function getByIdAvulsa($id)
    {
        $this->db->select('tb_fat_nota_fiscal.*, nota_fiscal.valor_frete, nota_fiscal.valor_desconto');
        $this->db->select('(SELECT SUM(valor_total_produtos ) FROM tb_fat_nota_fiscal_item nfi WHERE tb_fat_nota_fiscal.id=nfi.tb_fat_nota_fiscal_id) AS total_produtos');
        $this->db->select('nota_fiscal.cod_nota_fiscal');
        $this->db->join('nota_fiscal', 'nota_fiscal.cod_nota_fiscal = tb_fat_nota_fiscal.cod_faturamento_pedido', 'inner');
        $row = $this->db->get_where(self::$table, array('tb_fat_nota_fiscal.id' => $id));
        return $row->row();

    }

    public function getById($id)
    {
        $this->db->select('tb_fat_nota_fiscal.*, faturamento_pedido.valor_frete, faturamento_pedido.valor_desconto');
        $this->db->select('(SELECT SUM(valor_total_produtos ) FROM tb_fat_nota_fiscal_item nfi WHERE tb_fat_nota_fiscal.id=nfi.tb_fat_nota_fiscal_id) AS total_produtos');
        $this->db->select('faturamento_pedido.num_pedido_venda');
        $this->db->join('faturamento_pedido', 'faturamento_pedido.cod_faturamento_pedido = tb_fat_nota_fiscal.cod_faturamento_pedido', 'inner');
        $row = $this->db->get_where(self::$table, array('tb_fat_nota_fiscal.id' => $id));
        return $row->row();

    }

    public function getByIdNFce($id)
    {
        $this->db->select('tb_fat_nota_fiscal.*, venda_caixa.valor_frete, venda_caixa.valor_desconto, venda_caixa.data_caixa');
        $this->db->select('(SELECT SUM(valor_total_produtos ) FROM tb_fat_nota_fiscal_item nfi WHERE tb_fat_nota_fiscal.id=nfi.tb_fat_nota_fiscal_id) AS total_produtos');
        $this->db->select('venda_caixa.num_venda_caixa');
        $this->db->join('venda_caixa', 'venda_caixa.num_venda_caixa = tb_fat_nota_fiscal.cod_faturamento_pedido', 'inner');
        $row = $this->db->get_where(self::$table, array('tb_fat_nota_fiscal.id' => $id));
        return $row->row();

    }

    public function getByFaturamentoId($id)
    {
        $this->db->join('faturamento_pedido', 'faturamento_pedido.cod_faturamento_pedido = tb_fat_nota_fiscal.cod_faturamento_pedido', 'inner');
        $this->db->group_start();
        $this->db->where('tb_fat_nota_fiscal.c_stat != ', "101");
        $this->db->or_where('tb_fat_nota_fiscal.c_stat is null ');
        $this->db->group_end();
        $row = $this->db->get_where(self::$table, array('faturamento_pedido.cod_faturamento_pedido' => $id));
        return $row->row();
    }

    public function getProdutoFaturadoPorFaturamento($faturamentoId)
    {
        $this->db->where('produto.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('faturamento_pedido.cod_faturamento_pedido, produto.nome_produto, 
                           produto.cod_unidade_medida, tipo_produto.nome_tipo_produto, produto.cod_ncm, produto.cod_origem,
                           produto.cod_cest');
        $this->db->select('produto_venda.valor_unitario, produto_venda.quant_pedida');
        $this->db->from('pedido_venda');
        $this->db->join('faturamento_pedido', 'faturamento_pedido.num_pedido_venda = pedido_venda.num_pedido_venda');
        $this->db->join('produto_venda', 'pedido_venda.num_pedido_venda=produto_venda.num_pedido_venda', 'inner');
        $this->db->join('produto', 'produto.cod_produto = produto_venda.cod_produto');
        $this->db->join('tipo_produto', 'tipo_produto.cod_tipo_produto = produto.cod_tipo_produto');
        $this->db->where('faturamento_pedido.cod_faturamento_pedido', $faturamentoId);
        $this->db->where('faturamento_pedido.estornado', 0);
        $this->db->where('produto_venda.quant_atendida >', 0);
        return $query = $this->db->get()->result();

    }


    /**
     * @param $faturamentoId
     * @return array|mixed|object|null
     * @todo !!!IMPORTANTE!!! ATUALIZAR TODA A BASE QUE UTILIZA ESTADO E CIDADE PARA AS TABELAS tb_common_municipios e
     *     tb_common_estados
     */   

    public function getClienteByFaturamentoId($faturamentoId)
    {
        $this->db->select('cliente.*');
        $this->db->select('tb_common_municipios.nome as nome_cidade, tb_common_estados.uf');
        $this->db->select('tb_common_municipios.id AS codigo_municipio, tb_common_estados.id AS codigo_uf');
        $this->db->select('tb_common_pais.bacen AS codigo_pais, tb_common_pais.nome_pt AS nome_pais');
        $this->db->join('pedido_venda', 'pedido_venda.num_pedido_venda = faturamento_pedido.num_pedido_venda', 'inner');
        $this->db->join('cliente', 'cliente.cod_cliente = pedido_venda.cod_cliente', 'inner');
        $this->db->join('tb_common_municipios', 'tb_common_municipios.id = cliente.cod_cidade', 'left');
        $this->db->join('tb_common_estados', 'tb_common_estados.id = tb_common_municipios.tb_estado_id', 'left');
        $this->db->join('tb_common_pais', 'tb_common_pais.bacen = cliente.cod_pais', 'left');
        $row = $this->db->get_where('faturamento_pedido', array('faturamento_pedido.cod_faturamento_pedido' => $faturamentoId));
        return $row->row();
    }

    public function getClienteByFaturamentoIdNFce($vendaId)
    {
        $this->db->select('cliente.*');
        $this->db->select('tb_common_municipios.nome as nome_cidade, tb_common_estados.uf');
        $this->db->select('tb_common_municipios.id AS codigo_municipio, tb_common_estados.id AS codigo_uf');
        $this->db->join('cliente', 'cliente.cod_cliente = venda_caixa.cod_cliente', 'inner');
        $this->db->join('tb_common_municipios', 'tb_common_municipios.id = cliente.cod_cidade', 'left');
        $this->db->join('tb_common_estados', 'tb_common_estados.id = tb_common_municipios.tb_estado_id', 'left');
        $row = $this->db->get_where('venda_caixa', array('venda_caixa.num_venda_caixa' => $vendaId));
        return $row->row();
    }

    public function getClienteByFaturamentoIdAvulsa($codNotaFiscal)
    {
        $this->db->select('cliente.*');
        $this->db->select('tb_common_municipios.nome as nome_cidade, tb_common_estados.uf');
        $this->db->select('tb_common_municipios.id AS codigo_municipio, tb_common_estados.id AS codigo_uf');
        $this->db->join('cliente', 'cliente.cod_cliente = nota_fiscal.cod_cliente', 'inner');
        $this->db->join('tb_common_municipios', 'tb_common_municipios.id = cliente.cod_cidade', 'left');
        $this->db->join('tb_common_estados', 'tb_common_estados.id = tb_common_municipios.tb_estado_id', 'left');
        $row = $this->db->get_where('nota_fiscal', array('nota_fiscal.cod_nota_fiscal' => $codNotaFiscal));
        return $row->row();
    }

    /**
     * * @param $id
     * @return array|mixed|object|null
     * @todo !!!IMPORTANTE!!! ATUALIZAR TODA A BASE QUE UTILIZA ESTADO E CIDADE PARA AS TABELAS tb_common_municipios e
     *     tb_common_estados
     */
    public function getClienteByNotaFiscalId($id)
    {
        $this->db->select('cliente.*');
        $this->db->select('tb_common_municipios.nome as nome_cidade, tb_common_estados.uf');
        $this->db->select('tb_common_municipios.id AS codigo_municipio, tb_common_estados.id AS codigo_uf');
        $this->db->join('faturamento_pedido', 'faturamento_pedido.cod_faturamento_pedido = tb_fat_nota_fiscal.cod_faturamento_pedido', 'inner');
        $this->db->join('pedido_venda', 'pedido_venda.num_pedido_venda = faturamento_pedido.num_pedido_venda', 'inner');
        $this->db->join('cliente', 'cliente.cod_cliente = pedido_venda.cod_cliente', 'inner');
        $this->db->join('tb_common_municipios', 'tb_common_municipios.id = cliente.cod_cidade', 'left');
        $this->db->join('tb_common_estados', 'tb_common_estados.id = tb_common_municipios.tb_estado_id', 'left');
        $row = $this->db->get_where(self::$table, array('tb_fat_nota_fiscal.id' => $id));
        return $row->row();
    }

    public function getEventosNFporPedido($numPedidoVenda){

        $this->db->where('tb_fat_nota_fiscal.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('tb_fat_nota_fiscal_evento.*, tb_fat_nota_fiscal.*');
        $this->db->from('tb_fat_nota_fiscal_evento');
        $this->db->join('tb_fat_nota_fiscal', 'tb_fat_nota_fiscal.id = tb_fat_nota_fiscal_evento.tb_fat_nota_fiscal_id');  
        $this->db->join('faturamento_pedido', 'faturamento_pedido.cod_faturamento_pedido = tb_fat_nota_fiscal.cod_faturamento_pedido'); 
        $this->db->where("tb_fat_nota_fiscal.origem_nf", 1);  
        $this->db->where("faturamento_pedido.num_pedido_venda", $numPedidoVenda); 
        $this->db->order_by("tb_fat_nota_fiscal_evento.dh_evento", "desc");

        return $this->db->get()->result();
        
    }

    public function getNotasEmitidasDetalhadas($dataInicio, $dataFim, $codClientes){

        $this->db->where('tb_fat_nota_fiscal.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('tb_fat_nota_fiscal.*, cliente.nome_cliente, cliente.cnpj_cpf, faturamento_pedido.num_pedido_venda');
        $this->db->select('(SELECT SUM((tb_fat_nota_fiscal_item.quantidade * tb_fat_nota_fiscal_item.valor_unitario) +
                                        IFNULL(tb_fat_nota_fiscal_item.valor_frete, 0) +
                                        IFNULL(tb_fat_nota_fiscal_item.valor_seguro, 0) +
                                        IFNULL(tb_fat_nota_fiscal_item.valor_despesas, 0) -
                                        IFNULL(tb_fat_nota_fiscal_item.valor_desconto, 0))
                              FROM tb_fat_nota_fiscal_item
                             WHERE tb_fat_nota_fiscal_item.tb_fat_nota_fiscal_id = tb_fat_nota_fiscal.id) total_nota');
        $this->db->from('tb_fat_nota_fiscal');
        $this->db->join('cliente', 'cliente.cod_cliente = tb_fat_nota_fiscal.cod_cliente', 'left');  
        $this->db->join('faturamento_pedido', 'faturamento_pedido.cod_faturamento_pedido = tb_fat_nota_fiscal.cod_faturamento_pedido'); 
        $this->db->where("tb_fat_nota_fiscal.chave is not null ");  

        $this->db->where("tb_fat_nota_fiscal.data_emissao >= ", $dataInicio);
        $this->db->where("tb_fat_nota_fiscal.data_emissao <= ", $dataFim);

        if($codClientes != ""){
            $this->db->where_in('tb_fat_nota_fiscal.cod_cliente', $codClientes);
        }

        return $this->db->get()->result();
        
    }

    public function getNotasEmitidasDetalhadasDownload($dataInicio, $dataFim, $codClientes){

        $this->db->where('tb_fat_nota_fiscal.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('tb_fat_nota_fiscal.*, cliente.nome_cliente, cliente.cnpj_cpf');
        $this->db->select('(SELECT SUM((tb_fat_nota_fiscal_item.quantidade * tb_fat_nota_fiscal_item.valor_unitario) +
                                        IFNULL(tb_fat_nota_fiscal_item.valor_frete, 0) +
                                        IFNULL(tb_fat_nota_fiscal_item.valor_seguro, 0) +
                                        IFNULL(tb_fat_nota_fiscal_item.valor_despesas, 0) -
                                        IFNULL(tb_fat_nota_fiscal_item.valor_desconto, 0))
                              FROM tb_fat_nota_fiscal_item
                             WHERE tb_fat_nota_fiscal_item.tb_fat_nota_fiscal_id = tb_fat_nota_fiscal.id) total_nota');
        $this->db->from('tb_fat_nota_fiscal');
        $this->db->join('cliente', 'cliente.cod_cliente = tb_fat_nota_fiscal.cod_cliente', 'left');  
        $this->db->where("tb_fat_nota_fiscal.chave is not null ");  
        $this->db->where("tb_fat_nota_fiscal.c_stat", 100);     

        $this->db->where("tb_fat_nota_fiscal.data_emissao >= ", $dataInicio);
        $this->db->where("tb_fat_nota_fiscal.data_emissao <= ", $dataFim);

        if($codClientes != ""){
            $this->db->where_in('tb_fat_nota_fiscal.cod_cliente', $codClientes);
        }

        return $this->db->get()->result();
        
    }


}
