<?php

class IPI extends CI_Model
{


    public function getIPICSTAll()
    {
        return $this->db->get('tb_fis_ipi_cst ')->result();
    }

}
