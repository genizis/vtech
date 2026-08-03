<?php

class FCPAliquotas extends CI_Model
{

    /**
     * Informar UF de destino e ncm do produto
     * @param $UFDestino
     * @param $ncm
     * @return int
     */
    public function getFCPAliquota($UFDestino, $ncm, $naturOperacao)
    {

        $row = $this->db->get_where('tb_fis_icms_fcp', array('id_empresa' => getDadosUsuarioLogado()['id_empresa'], 'uf' => $UFDestino, 'ncm' => $ncm, 'tb_fis_natureza_operacao_id' => $naturOperacao))->row();
        return $row ? $row->aliquota : null;
    }

}
