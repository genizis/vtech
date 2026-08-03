<?php

class ICMS extends CI_Model
{

    /**
     * Padronizado para banco atual
     * @param $codigo
     * @return array|mixed|object|null
     */
    public function getICMSOrigemByCodigo($codigo)
    {
        return $this->db->get_where('tb_fis_icms_origem', array('codigo' => $codigo))->row();
    }

    public function getICMSOrigemAll()
    {
        return $this->db->get('tb_fis_icms_origem')->result();
    }

    public function getICMSCSTAll()
    {
        return $this->db->get('tb_fis_icms_cst ')->result();
    }

    public function getICMSCSOSNAll()
    {
        return $this->db->get('tb_fis_icms_csosn ')->result();
    }

}
