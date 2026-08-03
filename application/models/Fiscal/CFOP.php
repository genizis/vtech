<?php

class CFOP extends CI_Model
{

    private static $table = 'tb_fis_cfop';

    public function getAll($filter = "", $limit = null, $offset = null)
    {

        if ($limit) {
            $this->db->limit($limit, $offset);
        }

        if ($filter <> "") {
            $this->db->group_start();
            $this->db->or_like('codigo', $filter);
            $this->db->or_like('nome', $filter);
            $this->db->group_end();
        }

        return $query = $this->db->get(self::$table)->result();

    }

    public function getById($id)
    {

        return $this->db->get_where(self::$table, array('id' => $id))->row();
    }

    public function countAll()
    {
        return $this->db->count_all_results(self::$table);
    }

}
