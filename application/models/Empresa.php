<?php

class Empresa extends CI_Model{

    public function getEmpresasDoUsuario($email, $filter = "", $limit = null, $offset = null){
        $this->db->select('empresa.*');
        $this->db->from('usuario_empresa');
        $this->db->join('empresa', 'empresa.id_empresa = usuario_empresa.id_empresa');
        $this->db->where('usuario_empresa.email_usuario', $email);
        $this->db->where('usuario_empresa.ativo', 1);

        if($filter !== ""){
            $this->db->group_start();
            $this->db->like('empresa.nome_empresa', $filter);
            $this->db->or_like('empresa.razao_social', $filter);
            $this->db->or_like('empresa.cnpj_cpf', $filter);
            $this->db->group_end();
        }

        $this->db->order_by('empresa.nome_empresa', 'ASC');
        if($limit !== null){
            $this->db->limit($limit, $offset);
        }

        return $this->db->get()->result();
    }

    public function countEmpresasDoUsuario($email, $filter = ""){
        $this->db->from('usuario_empresa');
        $this->db->join('empresa', 'empresa.id_empresa = usuario_empresa.id_empresa');
        $this->db->where('usuario_empresa.email_usuario', $email);
        $this->db->where('usuario_empresa.ativo', 1);

        if($filter !== ""){
            $this->db->group_start();
            $this->db->like('empresa.nome_empresa', $filter);
            $this->db->or_like('empresa.razao_social', $filter);
            $this->db->or_like('empresa.cnpj_cpf', $filter);
            $this->db->group_end();
        }

        return $this->db->count_all_results();
    }

    public function getEmpresaPorDocumento($documento){
        return $this->db->get_where('empresa', array('cnpj_cpf' => $documento))->row();
    }

    public function getEmpresasPermitidas($email, $idEmpresaPadrao = null){
        $this->db->select('empresa.id_empresa, empresa.nome_empresa, usuario_empresa.empresa_padrao');
        $this->db->from('usuario_empresa');
        $this->db->join('empresa', 'empresa.id_empresa = usuario_empresa.id_empresa');
        $this->db->where('usuario_empresa.email_usuario', $email);
        $this->db->where('usuario_empresa.ativo', 1);
        $this->db->order_by('usuario_empresa.empresa_padrao', 'DESC');
        $this->db->order_by('empresa.nome_empresa', 'ASC');
        $empresas = $this->db->get()->result();

        if(empty($empresas) && $idEmpresaPadrao !== null){
            $this->garantirAcessoEmpresa($email, $idEmpresaPadrao, true);
            return $this->getEmpresasPermitidas($email);
        }

        return $empresas;
    }

    public function usuarioPodeAcessarEmpresa($email, $idEmpresa){
        return $this->db->get_where('usuario_empresa', array(
            'email_usuario' => $email,
            'id_empresa' => $idEmpresa,
            'ativo' => 1
        ))->num_rows() === 1;
    }

    public function garantirAcessoEmpresa($email, $idEmpresa, $empresaPadrao = false){
        $vinculoExistente = $this->db->get_where('usuario_empresa', array(
            'email_usuario' => $email,
            'id_empresa' => $idEmpresa
        ))->row();

        if($vinculoExistente !== null){
            return;
        }

        $dados = array(
            'email_usuario' => $email,
            'id_empresa' => $idEmpresa,
            'ativo' => 1,
            'empresa_padrao' => $empresaPadrao ? 1 : 0
        );

        $this->db->insert('usuario_empresa', $dados);
    }

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
        $this->db->select('empresa.*');
        if($this->db->table_exists('tb_common_municipios') && $this->db->table_exists('tb_common_estados')){
            $this->db->select('tb_common_municipios.nome as nome_cidade, tb_common_estados.uf');
            $this->db->join('tb_common_municipios', 'tb_common_municipios.id = empresa.cod_cidade', 'left');
            $this->db->join('tb_common_estados', 'tb_common_estados.id = tb_common_municipios.tb_estado_id', 'left');
        }else{
            $this->db->select('NULL as nome_cidade, NULL as uf', false);
        }
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
        $this->db->select('empresa.*');
        if($this->db->table_exists('tb_common_municipios') && $this->db->table_exists('tb_common_estados')){
            $this->db->select('tb_common_municipios.nome as nome_cidade, tb_common_estados.uf');
            $this->db->select('tb_common_municipios.id AS codigo_municipio, tb_common_estados.id AS codigo_uf');
            $this->db->join('tb_common_municipios', 'tb_common_municipios.id = empresa.cod_cidade', 'left');
            $this->db->join('tb_common_estados', 'tb_common_estados.id = tb_common_municipios.tb_estado_id', 'left');
        }else{
            $this->db->select('NULL as nome_cidade, NULL as uf, NULL as codigo_municipio, NULL as codigo_uf', false);
        }
        return $this->db->get_where('empresa', array('id_empresa' => $idEmpresa))->row();
    }
}
