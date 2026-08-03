<?php

class FaturamentoNotaFiscalEvento extends CI_Model
{

    private static $table = 'tb_fat_nota_fiscal_evento';

    public function insert($data)
    {
        $this->db->insert(self::$table, $data);

        return $this->db->insert_id();
    }


}
