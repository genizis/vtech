<?php

class FaturamentoNotaFiscalItem extends CI_Model
{

    private static $table = 'tb_fat_nota_fiscal_item';

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

    public function getNFeItens($nfeId){
        $this->db->where('tb_fat_nota_fiscal.id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('produto.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->from('tb_fat_nota_fiscal_item');

        $this->db->select('tb_fat_nota_fiscal_item.*, (tb_fat_nota_fiscal_item.valor_unitario * tb_fat_nota_fiscal_item.quantidade) valor_fat_item');
        $this->db->select('produto.cod_produto, produto.nome_produto, produto.cod_ncm, produto.cod_cest');
        $this->db->select('produto.cod_unidade_medida, produto.peso_liq, produto.peso_bruto');
        $this->db->select('faturamento_pedido.valor_frete, faturamento_pedido.valor_seguro, faturamento_pedido.outras_despesas, faturamento_pedido.valor_desconto');
        $this->db->select('tb_fis_cfop.codigo AS cfop');
        $this->db->select('tb_fis_natureza_operacao.id AS nota_natureza_operacao_id, tb_fis_natureza_operacao.c_enq');
        $this->db->select('tb_fis_icms_origem.codigo AS icms_origem');
        $this->db->select('tb_fis_icms_cst.codigo AS icms_cst');
        $this->db->select('tb_fis_icms_csosn.codigo AS icms_csosn');
        $this->db->select('tb_fis_ipi_cst.codigo AS ipi_cst');
        $this->db->select('pis.codigo AS pis_cst');
        $this->db->select('cofins.codigo AS cofins_cst');
        $this->db->select('ncm.percentual_ipi');

        $this->db->join('tb_fat_nota_fiscal', 'tb_fat_nota_fiscal.id = tb_fat_nota_fiscal_item.tb_fat_nota_fiscal_id');
        $this->db->join('faturamento_pedido_produto', 'faturamento_pedido_produto.id=tb_fat_nota_fiscal_item.faturamento_pedido_produto_id', 'inner');
        $this->db->join('faturamento_pedido', 'faturamento_pedido.cod_faturamento_pedido = faturamento_pedido_produto.faturamento_pedido', 'inner');
        $this->db->join('produto', 'produto.cod_produto = faturamento_pedido_produto.cod_produto','inner');
        $this->db->join('tb_fis_cfop', 'tb_fis_cfop.id = tb_fat_nota_fiscal_item.tb_fis_cfop_id','inner');
        $this->db->join('tb_fis_natureza_operacao', 'tb_fis_natureza_operacao.id = tb_fat_nota_fiscal.tb_fis_natureza_operacao_id','inner');
        $this->db->join('tb_fis_icms_origem', 'tb_fis_icms_origem.id = tb_fat_nota_fiscal_item.tb_fis_icms_origem_id','inner');
        $this->db->join('tb_fis_ipi_cst', 'tb_fis_ipi_cst.id = tb_fat_nota_fiscal_item.tb_fis_ipi_cst_id','left');
        $this->db->join('tb_fis_pis_cofins_cst AS pis', 'pis.id = tb_fat_nota_fiscal_item.tb_fis_pis_cst_id','left');
        $this->db->join('tb_fis_pis_cofins_cst AS cofins', 'cofins.id = tb_fat_nota_fiscal_item.tb_fis_cofins_cst_id','left');
        $this->db->join('ncm', 'ncm.cod_ncm = produto.cod_ncm','inner');

        //CST ou CSOSN
        $this->db->join('tb_fis_icms_cst', 'tb_fis_icms_cst.id = tb_fat_nota_fiscal_item.tb_fis_icms_cst_id','left');
        $this->db->join('tb_fis_icms_csosn', 'tb_fis_icms_csosn.id = tb_fat_nota_fiscal_item.tb_fis_icms_csosn_id','left');

        $this->db->where('tb_fat_nota_fiscal.id', $nfeId);
//        $this->db->join('tipo_produto', 'tipo_produto.cod_tipo_produto = produto.cod_tipo_produto');
//        $this->db->where('faturamento_pedido.cod_faturamento_pedido', $faturamentoId);
//        $this->db->where('faturamento_pedido.estornado', 0);
//        $this->db->where('produto_venda.quant_atendida >',0);
        return $query = $this->db->get()->result();

    }

    public function getNFeItensNFce($nfeId){
        $this->db->where('tb_fat_nota_fiscal.id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('produto.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->from('tb_fat_nota_fiscal_item');

        $this->db->select('tb_fat_nota_fiscal_item.*, (tb_fat_nota_fiscal_item.valor_unitario * tb_fat_nota_fiscal_item.quantidade) valor_fat_item');
        $this->db->select('produto.cod_produto, produto.nome_produto, produto.cod_ncm, produto.cod_cest');
        $this->db->select('produto.cod_unidade_medida, produto.peso_liq, produto.peso_bruto');
        $this->db->select('venda_caixa.valor_frete');
        $this->db->select('tb_fis_cfop.codigo AS cfop');
        $this->db->select('tb_fis_natureza_operacao.id AS nota_natureza_operacao_id, tb_fis_natureza_operacao.c_enq');
        $this->db->select('tb_fis_icms_origem.codigo AS icms_origem');
        $this->db->select('tb_fis_icms_cst.codigo AS icms_cst');
        $this->db->select('tb_fis_icms_csosn.codigo AS icms_csosn');
        $this->db->select('tb_fis_ipi_cst.codigo AS ipi_cst');
        $this->db->select('pis.codigo AS pis_cst');
        $this->db->select('cofins.codigo AS cofins_cst');
        $this->db->select('ncm.percentual_ipi');

        $this->db->join('tb_fat_nota_fiscal', 'tb_fat_nota_fiscal.id = tb_fat_nota_fiscal_item.tb_fat_nota_fiscal_id');
        $this->db->join('produto_venda_caixa', 'produto_venda_caixa.seq_produto = tb_fat_nota_fiscal_item.faturamento_pedido_produto_id', 'inner');
        $this->db->join('venda_caixa', 'venda_caixa.num_venda_caixa = produto_venda_caixa.num_venda_caixa', 'inner');
        $this->db->join('produto', 'produto.cod_produto = produto_venda_caixa.cod_produto','inner');
        $this->db->join('tb_fis_cfop', 'tb_fis_cfop.id = tb_fat_nota_fiscal_item.tb_fis_cfop_id','inner');
        $this->db->join('tb_fis_natureza_operacao', 'tb_fis_natureza_operacao.id = tb_fat_nota_fiscal.tb_fis_natureza_operacao_id','inner');
        $this->db->join('tb_fis_icms_origem', 'tb_fis_icms_origem.id = tb_fat_nota_fiscal_item.tb_fis_icms_origem_id','inner');
        $this->db->join('tb_fis_ipi_cst', 'tb_fis_ipi_cst.id = tb_fat_nota_fiscal_item.tb_fis_ipi_cst_id','left');
        $this->db->join('tb_fis_pis_cofins_cst AS pis', 'pis.id = tb_fat_nota_fiscal_item.tb_fis_pis_cst_id','left');
        $this->db->join('tb_fis_pis_cofins_cst AS cofins', 'cofins.id = tb_fat_nota_fiscal_item.tb_fis_cofins_cst_id','left');
        $this->db->join('ncm', 'ncm.cod_ncm = produto.cod_ncm','left');

        //CST ou CSOSN
        $this->db->join('tb_fis_icms_cst', 'tb_fis_icms_cst.id = tb_fat_nota_fiscal_item.tb_fis_icms_cst_id','left');
        $this->db->join('tb_fis_icms_csosn', 'tb_fis_icms_csosn.id = tb_fat_nota_fiscal_item.tb_fis_icms_csosn_id','left');

        $this->db->where('tb_fat_nota_fiscal.id', $nfeId);
//        $this->db->join('tipo_produto', 'tipo_produto.cod_tipo_produto = produto.cod_tipo_produto');
//        $this->db->where('faturamento_pedido.cod_faturamento_pedido', $faturamentoId);
//        $this->db->where('faturamento_pedido.estornado', 0);
//        $this->db->where('produto_venda.quant_atendida >',0);
        return $query = $this->db->get()->result();

    }

    public function getNFeItensNFAvulsa($nfeId){
        $this->db->where('tb_fat_nota_fiscal.id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('produto.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->from('tb_fat_nota_fiscal_item');

        $this->db->select('tb_fat_nota_fiscal_item.*, (tb_fat_nota_fiscal_item.valor_unitario * tb_fat_nota_fiscal_item.quantidade) valor_fat_item');
        $this->db->select('produto.cod_produto, produto.nome_produto, produto.cod_ncm, produto.cod_cest');
        $this->db->select('produto.cod_unidade_medida, produto.peso_liq, produto.peso_bruto');
        $this->db->select('nota_fiscal.valor_frete, nota_fiscal.valor_seguro, nota_fiscal.outras_despesas, nota_fiscal.valor_desconto');
        $this->db->select('tb_fis_cfop.codigo AS cfop');
        $this->db->select('tb_fis_natureza_operacao.id AS nota_natureza_operacao_id, tb_fis_natureza_operacao.c_enq');
        $this->db->select('tb_fis_icms_origem.codigo AS icms_origem');
        $this->db->select('tb_fis_icms_cst.codigo AS icms_cst');
        $this->db->select('tb_fis_icms_csosn.codigo AS icms_csosn');
        $this->db->select('tb_fis_ipi_cst.codigo AS ipi_cst');
        $this->db->select('pis.codigo AS pis_cst');
        $this->db->select('cofins.codigo AS cofins_cst');
        $this->db->select('ncm.percentual_ipi');

        $this->db->join('tb_fat_nota_fiscal', 'tb_fat_nota_fiscal.id = tb_fat_nota_fiscal_item.tb_fat_nota_fiscal_id');
        $this->db->join('produto_nota_fiscal', 'produto_nota_fiscal.seq_produto_nf = tb_fat_nota_fiscal_item.faturamento_pedido_produto_id', 'inner');
        $this->db->join('nota_fiscal', 'nota_fiscal.cod_nota_fiscal = produto_nota_fiscal.cod_nota_fiscal', 'inner');
        $this->db->join('produto', 'produto.cod_produto = produto_nota_fiscal.cod_produto','inner');
        $this->db->join('tb_fis_cfop', 'tb_fis_cfop.id = tb_fat_nota_fiscal_item.tb_fis_cfop_id','inner');
        $this->db->join('tb_fis_natureza_operacao', 'tb_fis_natureza_operacao.id = tb_fat_nota_fiscal.tb_fis_natureza_operacao_id','inner');
        $this->db->join('tb_fis_icms_origem', 'tb_fis_icms_origem.id = tb_fat_nota_fiscal_item.tb_fis_icms_origem_id','inner');
        $this->db->join('tb_fis_ipi_cst', 'tb_fis_ipi_cst.id = tb_fat_nota_fiscal_item.tb_fis_ipi_cst_id','left');
        $this->db->join('tb_fis_pis_cofins_cst AS pis', 'pis.id = tb_fat_nota_fiscal_item.tb_fis_pis_cst_id','left');
        $this->db->join('tb_fis_pis_cofins_cst AS cofins', 'cofins.id = tb_fat_nota_fiscal_item.tb_fis_cofins_cst_id','left');
        $this->db->join('ncm', 'ncm.cod_ncm = produto.cod_ncm','left');

        //CST ou CSOSN
        $this->db->join('tb_fis_icms_cst', 'tb_fis_icms_cst.id = tb_fat_nota_fiscal_item.tb_fis_icms_cst_id','left');
        $this->db->join('tb_fis_icms_csosn', 'tb_fis_icms_csosn.id = tb_fat_nota_fiscal_item.tb_fis_icms_csosn_id','left');

        $this->db->where('tb_fat_nota_fiscal.id', $nfeId);
//        $this->db->join('tipo_produto', 'tipo_produto.cod_tipo_produto = produto.cod_tipo_produto');
//        $this->db->where('faturamento_pedido.cod_faturamento_pedido', $faturamentoId);
//        $this->db->where('faturamento_pedido.estornado', 0);
//        $this->db->where('produto_venda.quant_atendida >',0);
        return $query = $this->db->get()->result();

    }
//
//    public function getById($id)
//    {
//        $row = $this->db->get_where(self::$table, array('tb_fat_nota_fiscal.id' => $id));
//        return $row->row();
//    }

}
