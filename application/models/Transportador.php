<?php

class Transportador extends CI_Model{

    public function insertTransportador($transportador){
        $this->db->insert('transportador', $transportador);

        return $this->db->insert_id();
    }

    public function updateTransportador($CodTransportador, $transportador){
        $this->db->where('id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->where('cod_transportador', $CodTransportador);
        $this->db->update('transportador', $transportador);

        if($this->db->affected_rows() > 0){
            return $CodTransportador;
        }

        return NULL;
    }

    public function deleteTransportador($CodTransportador) {
        $this->db->where('id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->where_in('cod_transportador',$CodTransportador)->delete('transportador');

        if($this->db->error() <> null){
            return $this->db->error();
        }

        return null;
    }

    public function selectTransportadorOption($codTransportador){

        $transportadores = $this->getTransportador();

        $options = "";
        $select = "";

        foreach($transportadores as $transportador){
            if($codTransportador == $transportador->cod_transportador)
                $select = "selected";
            else
                $select = "";

            $options .= "<option value='{$transportador->cod_transportador}' $select>$transportador->cod_transportador - $transportador->nome_transportador</option>".PHP_EOL;
        }

        return $options;

    }

    public function getTransportador($filter = "", $limit = null, $offset = null){
        $this->db->where('id_empresa', getDadosUsuarioLogado()['id_empresa']);

        if($limit){
            $this->db->limit($limit, $offset);
        }

        $this->db->select('transportador.*');
        $this->db->select('(select count(*)
                              from pedido_venda
                             where pedido_venda.cod_transportador = transportador.cod_transportador) count_pedido');
        $this->db->from('transportador');

        if($filter <> ""){
            $this->db->group_start();
            $this->db->or_like('cod_transportador' ,$filter);
            $this->db->or_like('nome_transportador' ,$filter);
            $this->db->or_like('cnpj_cpf' ,$filter);
            $this->db->group_end();

        }

        return $query = $this->db->get()->result();

    }

    public function getTransportadorFat(){
        $this->db->where('id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('transportador.*');
        $this->db->from('transportador');

        return $query = $this->db->get()->result();

    }

    public function selectTransportador($codTransportador){

        $transportador = $this->getTransportadorPorCodigo($codTransportador);

        $input = "{$transportador->tipo_pessoa}|{$transportador->cnpj_cpf}";

        return $input;

    }

    public function getTransportadorPorCodigo($CodTransportador){
        $this->db->where('id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('transportador.*, cidade.nome as nome_cidade, estado.uf');
        $this->db->join('cidade', 'cidade.id = transportador.cod_cidade', 'left');
        $this->db->join('estado', 'estado.id = cidade.estado', 'left');

        return $this->db->get_where('transportador', array('cod_transportador' => $CodTransportador))->row();
    }

    public function getTransportadorPorDocumento($CnpjCpf){
        $this->db->where('id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('transportador.*, cidade.nome as nome_cidade');
        $this->db->join('cidade', 'cidade.id = transportador.cod_cidade', 'left');
        $this->db->where('transportador.cnpj_cpf !=', null);
        $this->db->where('cod_vendas_externas', null);

        return $this->db->get_where('transportador', array('cnpj_cpf' => $CnpjCpf))->row();
    }

    public function getTransportadorPorCodigoVendasExternas($codTransportadorVendasExternas){
        $this->db->where('id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('transportador.*');
        return $this->db->get_where('transportador', array('cod_vendas_externas' => $codTransportadorVendasExternas))->row();
    }

    public function getTransportadorPorNome($nomeTransportador){
        $this->db->where('id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('transportador.*, cidade.nome as nome_cidade');
        $this->db->join('cidade', 'cidade.id = transportador.cod_cidade', 'left');
        $this->db->where('cnpj_cpf', null);
        $this->db->limit(1);

        return $this->db->get_where('transportador', array('nome_transportador' => $nomeTransportador))->row();
    }

    public function getTransportadorPorRazaoSocial($razaoSocial){
        $this->db->where('id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('transportador.*');
        $this->db->where('cnpj_cpf', null);
        $this->db->where('cod_vendas_externas', null);
        $this->db->limit(1);

        return $this->db->get_where('transportador', array('razao_social' => $razaoSocial))->row();
    }

    public function getTransportadorContaAzulPorCodigo($idContaAzul){
        $this->db->where('transportador.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->from('transportador');
        $this->db->where('transportador.id_conta_azul', $idContaAzul);

        return $query = $this->db->get()->row();
    }

    public function countAll($filter){
        $this->db->where('id_empresa', getDadosUsuarioLogado()['id_empresa']);  

        if($filter <> ""){
            $this->db->group_start();
            $this->db->or_like('cod_transportador' ,$filter);
            $this->db->or_like('nome_transportador' ,$filter);
            $this->db->or_like('cnpj_cpf' ,$filter);
            $this->db->group_end();

        }

        return $this->db->count_all_results('transportador');
    }

    /**
     * @todo !!!IMPORTANTE!!! ATUALIZAR TODA A BASE QUE UTILIZA ESTADO E CIDADE PARA AS TABELAS tb_common_municipios e tb_common_estados
     */
    public function getTransportadorById($CodTransportador){
        $this->db->where('transportador.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('transportador.*, tb_common_municipios.nome as nome_cidade, tb_common_estados.uf');
        $this->db->select('tb_common_municipios.id AS codigo_municipio, tb_common_estados.id AS codigo_uf');
        $this->db->join('tb_common_municipios', 'tb_common_municipios.id = transportador.cod_cidade', 'left');
        $this->db->join('tb_common_estados', 'tb_common_estados.id = tb_common_municipios.tb_estado_id', 'left');

        return $this->db->get_where('transportador', array('cod_transportador' => $CodTransportador))->row();
    }

}
