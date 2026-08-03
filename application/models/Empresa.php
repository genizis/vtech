<?php

class Empresa extends CI_Model{

    public function insertEmpresa($empresa){
        $this->db->insert('empresa', $empresa);

        return $this->db->insert_id();
    }

    public function updateEmpresa($idEmpresa, $empresa){

        $this->db->where('id_empresa', $idEmpresa);
        $this->db->update('empresa', $empresa);

        if($this->db->affected_rows() > 0){
            return $idEmpresa;
        }

        return NULL;
    }

    public function getEmpresaPorCodigo($idEmpresa){
        $this->db->select('empresa.*, tb_common_municipios.nome as nome_cidade, tb_common_estados.uf');
        $this->db->join('tb_common_municipios', 'tb_common_municipios.id = empresa.cod_cidade', 'left');
        $this->db->join('tb_common_estados', 'tb_common_estados.id = tb_common_municipios.tb_estado_id', 'left');
        return $this->db->get_where('empresa', array('id_empresa' => $idEmpresa))->row();
    }

    public function getEmpresaPorCodigoHash($idEmpresa, $hashEmail){
        $this->db->select('empresa.*');
        $this->db->from('empresa');
        $this->db->where('id_empresa', $idEmpresa);
        $this->db->where('hash_confirma_email', $hashEmail);

        return $this->db->get()->row();
    }

    public function getParametrosEmpresa($idEmpresa){
        $this->db->select('empresa.*');
        $this->db->select('(select count(*)
                              from usuario
                             where usuario.ativo = 1
                               and usuario.id_empresa = empresa.id_empresa) num_usuario');
        return $this->db->get_where('empresa', array('id_empresa' => $idEmpresa))->row();
    }

    /**
     * @todo !!!IMPORTANTE!!! ATUALIZAR TODA A BASE QUE UTILIZA ESTADO E CIDADE PARA AS TABELAS tb_common_municipios e tb_common_estados
     */
    public function getEmpresaById($idEmpresa){
        $this->db->select('empresa.*, tb_common_municipios.nome as nome_cidade, tb_common_estados.uf');
        $this->db->select('tb_common_municipios.id AS codigo_municipio, tb_common_estados.id AS codigo_uf');
        $this->db->join('tb_common_municipios', 'tb_common_municipios.id = empresa.cod_cidade', 'left');
        $this->db->join('tb_common_estados', 'tb_common_estados.id = tb_common_municipios.tb_estado_id', 'left');
        return $this->db->get_where('empresa', array('id_empresa' => $idEmpresa))->row();
    }
}
