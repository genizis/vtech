<?php

class Estabelecimento extends CI_Model{

    private function aplicarFiltro($filter){
        if($filter !== ''){
            $this->db->group_start();
            $this->db->like('nome_estabelecimento', $filter);
            $this->db->or_like('razao_social', $filter);
            $this->db->or_like('cnpj_cpf', $filter);
            $this->db->group_end();
        }
    }

    public function getEstabelecimentos($filter = '', $limit = null, $offset = null){
        $this->db->where('id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->aplicarFiltro($filter);
        $this->db->order_by('nome_estabelecimento', 'ASC');
        if($limit !== null) $this->db->limit($limit, $offset);
        return $this->db->get('estabelecimento')->result();
    }

    public function getEstabelecimentosDaEmpresa(){
        $this->db->where('id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->order_by('tipo_estabelecimento', 'ASC');
        $this->db->order_by('nome_estabelecimento', 'ASC');
        return $this->db->get('estabelecimento')->result();
    }

    public function countAll($filter = ''){
        $this->db->where('id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->aplicarFiltro($filter);
        return $this->db->count_all_results('estabelecimento');
    }

    public function buscarPorCodigo($idEstabelecimento){
        $this->db->select('estabelecimento.*');
        $this->db->select('nome_estabelecimento AS nome_empresa, tipo_pessoa AS tipo_empresa');
        $this->db->where('id_empresa', getDadosUsuarioLogado()['id_empresa']);
        return $this->db->get_where('estabelecimento', array('id_estabelecimento' => $idEstabelecimento))->row();
    }

    public function getPorDocumento($documento, $ignorarId = null){
        $this->db->where('id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('cnpj_cpf', $documento);
        if($ignorarId !== null) $this->db->where('id_estabelecimento !=', $ignorarId);
        return $this->db->get('estabelecimento')->row();
    }

    public function insertEstabelecimento($dados){
        $this->db->insert('estabelecimento', $dados);
        return $this->db->insert_id();
    }

    public function updateEstabelecimento($idEstabelecimento, $dados){
        $this->db->where('id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->where('id_estabelecimento', $idEstabelecimento);
        $this->db->update('estabelecimento', $dados);
        return $this->db->affected_rows() > 0 ? $idEstabelecimento : null;
    }
}
