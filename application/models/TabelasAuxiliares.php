<?php

class TabelasAuxiliares extends CI_Model{

    public function getCidade(){

        $this->db->select('tb_common_municipios.*, tb_common_estados.uf');
        $this->db->from('tb_common_municipios');
        $this->db->join('tb_common_estados', 'tb_common_estados.id = tb_common_municipios.tb_estado_id');
        $this->db->where('tb_common_municipios.id !=', 0);
        $this->db->order_by('tb_common_municipios.nome');

        return $query = $this->db->get()->result();

    } 

    public function getCidadePorEstado($idEstado = null){
        $this->db->select('tb_common_municipios.*, tb_common_estados.uf');
        $this->db->from('tb_common_municipios');
        $this->db->join('tb_common_estados', 'tb_common_estados.id = tb_common_municipios.tb_estado_id');
        $this->db->where('tb_common_estados.uf', $idEstado);
        $this->db->order_by('tb_common_municipios.nome');

        return $this->db->get()->result();
        
    } 

    public function selectCidade($idEstado = null){

        $cidades = $this->getCidadePorEstado($idEstado);

        $options = "";

        foreach($cidades as $cidade){
            $options .= "<option value='{$cidade->id}'>$cidade->nome</option>".PHP_EOL;
        }

        return $options;

    }
    
    public function getEstado(){
                
        return $this->db->where('id !=', 0)->get('tb_common_estados')->result();
        
    } 

    public function getPais(){
                
        return $this->db->where('id !=', 0)->get('tb_common_pais')->result();
        
    } 

    public function getSegmento(){
                
        return $this->db->get('segmento')->result();
        
    } 

    public function getSegmentoPorNome($nomeSegmento){

        $this->db->from('segmento');
        $this->db->where('segmento.nome_segmento', $nomeSegmento);

        return $query = $this->db->get()->row();
    }

    public function getEstadoPorSigla($siglaEstado){

        $this->db->from('tb_common_estados');
        $this->db->where('tb_common_estados.uf', $siglaEstado);

        return $query = $this->db->get()->row();
    }

    public function getCidadePorNome($nomeCidade, $uf = null){

        $this->db->select('tb_common_municipios.*');
        $this->db->from('tb_common_municipios');
        $this->db->join('tb_common_estados', 'tb_common_estados.id = tb_common_municipios.tb_estado_id');
        $this->db->where('tb_common_municipios.nome', $nomeCidade);
        if($uf !== null && $uf !== ''){
            $this->db->where('tb_common_estados.uf', $uf);
        }

        return $query = $this->db->get()->row();
    }

}
