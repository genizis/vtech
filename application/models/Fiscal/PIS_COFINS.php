<?php

class PIS_COFINS extends CI_Model
{


    public function getCSTAll()
    {
        return $this->db->get('tb_fis_pis_cofins_cst')->result();
    }

}
