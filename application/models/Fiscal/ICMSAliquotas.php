<?php

class ICMSAliquotas extends CI_Model
{

//    public function getICMSAliquotaFromEmissorDestinatario($)
//    {
//        $this->db->join('faturamento_pedido', 'faturamento_pedido.cod_faturamento_pedido = tb_fat_nota_fiscal.cod_faturamento_pedido', 'inner');
//        $this->db->join('cliente', 'cliente.cod_cliente = pedido_venda.cod_cliente', 'inner');
//        $row = $this->db->get_where('tb_fis_icms_aliquota', array('origem' => $origem, 'destino' => $destino))->row();
//        return $row ? $row->aliquota : 0;
//    }

    /**
     * Informar UF de origem e destino (Ex: SP, RJ)
     * @param $origem
     * @param $destino
     * @return array|mixed|object|null
     */
    public function getICMSAliquota($UFDestino, $naturOperacao)
    {
        $row = $this->db->get_where('tb_fis_icms_aliquota', array('id_empresa' => getDadosUsuarioLogado()['id_empresa'], 'tb_fis_natureza_operacao_id' => $naturOperacao, 'uf' => $UFDestino))->row();
        return $row ? $row->aliquota : 0;
    }

}
