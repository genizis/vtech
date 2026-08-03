<?php

class NaturezaOperacao extends CI_Model{

    private static $table = 'tb_fis_natureza_operacao';

    public function insert($data)
    {
        $this->db->insert(self::$table, $data);

        return $this->db->insert_id();
    }

    public function insertFCP($data)
    {
        $this->db->insert('tb_fis_icms_fcp', $data);

        return $this->db->insert_id();
    }

    public function insertICMS($data)
    {
        $this->db->insert('tb_fis_icms_aliquota', $data);

        return $this->db->insert_id();
    }

    public function update($id, $data)
    {
        $this->db->where('id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('id', $id);
        $this->db->update(self::$table, $data);

        if ($this->db->affected_rows() > 0) {
            return $id;
        }

        return NULL;
    }

    public function salvarFCP($id, $data)
    {
        $this->db->where('id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('id', $id);
        $this->db->update('tb_fis_icms_fcp', $data);

        if ($this->db->affected_rows() > 0) {
            return $id;
        }

        return NULL;
    }

    public function salvarICMS($id, $data)
    {
        $this->db->where('id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('id', $id);
        $this->db->update('tb_fis_icms_aliquota', $data);

        if ($this->db->affected_rows() > 0) {
            return $id;
        }

        return NULL;
    }

    public function deleteFCP($idFCP) {
        $this->db->where('id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->where_in('id',$idFCP)->delete('tb_fis_icms_fcp');

        if($this->db->error() <> null){
            return $this->db->error();
        }

        return null;
    } 

    public function deleteICMS($idICMS) {
        $this->db->where('id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->where_in('id',$idICMS)->delete('tb_fis_icms_aliquota');

        if($this->db->error() <> null){
            return $this->db->error();
        }

        return null;
    }

    public function deleteNatureza($natureza) {
        $this->db->where('id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->where_in('id',$natureza)->delete('tb_fis_natureza_operacao');

        if($this->db->error() <> null){
            return $this->db->error();
        }

        return null;
    }

    public function getAll($filter = "", $limit = null, $offset = null){
        $this->db->where('id_empresa', getDadosUsuarioLogado()['id_empresa']);

        if($limit){
            $this->db->limit($limit, $offset);
        }        

        if($filter <> ""){
            $this->db->group_start();
            $this->db->or_like('descricao' ,$filter);
            $this->db->or_like('nome' ,$filter);
            $this->db->group_end();
        }  
        
        $this->db->select('tb_fis_natureza_operacao.*');
        $this->db->select('(select count(*)
                              from tb_fat_nota_fiscal
                             where tb_fat_nota_fiscal.id_empresa = ' . getDadosUsuarioLogado()['id_empresa'] . '
                               and tb_fat_nota_fiscal.tb_fis_natureza_operacao_id = tb_fis_natureza_operacao.id) count_nat');

        return $query = $this->db->get('tb_fis_natureza_operacao')->result();

    }

    public function getById($id){
//        $this->db->select('tb_fis_natureza_operacao.*, empresa.percentual_credito_sn');
        $this->db->where('id_empresa', getDadosUsuarioLogado()['id_empresa']);

//        $this->db->join('empresa', 'empresa.id_empresa = tb_fis_natureza_operacao.id_empresa');
        return $this->db->get_where(self::$table, array('id' => $id))->row();
    }

    public function getFCPporNatOper($idNaturOper){

        $this->db->where('tb_fis_icms_fcp.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('tb_fis_icms_fcp.*, ncm.desc_ncm, tb_common_estados.nome as estado');
        $this->db->from('tb_fis_icms_fcp');
        $this->db->join('ncm', 'ncm.cod_ncm = tb_fis_icms_fcp.ncm');
        $this->db->join('tb_common_estados', 'tb_common_estados.uf = tb_fis_icms_fcp.uf');
        $this->db->where('tb_fis_icms_fcp.tb_fis_natureza_operacao_id', $idNaturOper);
        $this->db->order_by('tb_common_estados.uf');
        
        return $query = $this->db->get()->result();

    }

    public function getICMSporNatOper($idNaturOper){

        $this->db->where('tb_fis_icms_aliquota.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('tb_fis_icms_aliquota.*, tb_common_estados.nome as estado');
        $this->db->from('tb_fis_icms_aliquota');
        $this->db->join('tb_common_estados', 'tb_common_estados.uf = tb_fis_icms_aliquota.uf');
        $this->db->where('tb_fis_icms_aliquota.tb_fis_natureza_operacao_id', $idNaturOper);
        $this->db->order_by('tb_common_estados.uf');
        
        return $query = $this->db->get()->result();

    }

    public function getFCPporCod($idFCP){
        $this->db->where('tb_fis_icms_fcp.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('tb_fis_icms_fcp.*');
        $this->db->from('tb_fis_icms_fcp');
        $this->db->where('tb_fis_icms_fcp.id', $idFCP);
        
        return $query = $this->db->get()->row();

    }

    public function getICMSporCod($idICMS){
        $this->db->where('tb_fis_icms_aliquota.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('tb_fis_icms_aliquota.*');
        $this->db->from('tb_fis_icms_aliquota');
        $this->db->where('tb_fis_icms_aliquota.id', $idICMS);
        
        return $query = $this->db->get()->row();

    }


    public function countAll($filter = ""){
        $this->db->where('id_empresa', getDadosUsuarioLogado()['id_empresa']);

        if($filter <> ""){
            $this->db->group_start();
            $this->db->or_like('descricao' ,$filter);
            $this->db->or_like('nome' ,$filter);
            $this->db->group_end();
        }

        return $this->db->count_all_results('tb_fis_natureza_operacao');
    }

}
