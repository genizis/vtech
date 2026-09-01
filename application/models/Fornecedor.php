<?php

class Fornecedor extends CI_Model{    

    public function insertFornecedor($fornecedor){
        $this->db->insert('fornecedor', $fornecedor);

        return $this->db->insert_id();
    }

    public function updateFornecedor($CodFornecedor, $fornecedor){
        $this->db->where('id_empresa', getDadosUsuarioLogado()['id_empresa']); 
        
        $this->db->where('cod_fornecedor', $CodFornecedor);
        $this->db->update('fornecedor', $fornecedor);

        if($this->db->affected_rows() > 0){
            return $CodFornecedor;
        }

        return null;
    }

    public function deleteFornecedor($CodFornecedor) {
        $this->db->where('id_empresa', getDadosUsuarioLogado()['id_empresa']); 

        $this->db->where_in('cod_fornecedor',$CodFornecedor)->delete('fornecedor');

        if($this->db->error() <> null){
            return $this->db->error();
        }

        return null;
    }

    public function getFornecedor($filter = "", $limit = null, $offset = null){
        $this->db->where('fornecedor.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        if($limit){
            $this->db->limit($limit, $offset);
        }

        //Join para pegar o segmento
        $this->db->select('fornecedor.*, segmento.nome_segmento');
        $this->db->select('(select count(*)
                              from pedido_compra
                             where pedido_compra.cod_fornecedor = fornecedor.cod_fornecedor) count_pedido');
        $this->db->select('(select count(*)
                              from movimentos_conta
                             where movimentos_conta.cod_emitente   = fornecedor.cod_fornecedor
                               and movimentos_conta.tipo_movimento = 2) count_titulo');
        $this->db->from('fornecedor');
        $this->db->join('segmento', 'segmento.cod_segmento = fornecedor.cod_segmento', 'left');

        if($filter <> ""){
            $this->db->group_start();
            $this->db->or_like('fornecedor.cod_fornecedor' ,$filter);
            $this->db->or_like('fornecedor.nome_fornecedor' ,$filter);
            $this->db->or_like('fornecedor.cnpj_cpf' ,$filter);
            $this->db->group_end();
            
        }
        
        return $query = $this->db->get()->result();
        
    }

    public function getFornecedorAtivo(){
        $this->db->where('id_empresa', getDadosUsuarioLogado()['id_empresa']); 

        //Join para pegar o segmento
        $this->db->select('fornecedor.*');
        $this->db->from('fornecedor'); 
        $this->db->where('fornecedor.ativo', '1');
        
        return $query = $this->db->get()->result();
        
    }

    public function getFornecedorCotacao($listaFornecedor = null){
        $this->db->where('id_empresa', getDadosUsuarioLogado()['id_empresa']); 

        //Join para pegar o segmento
        $this->db->select('fornecedor.*');
        $this->db->from('fornecedor');  

        if($listaFornecedor != null){
            foreach ($listaFornecedor as $key => $fornecedor){
                $this->db->where('fornecedor.cod_fornecedor !=', $fornecedor->cod_fornecedor);
            }
        }
        
        return $query = $this->db->get()->result();
        
    }

    public function getFornecedorPorDocumento($CnpjCpf){
        $this->db->where('id_empresa', getDadosUsuarioLogado()['id_empresa']); 

        $this->db->select('fornecedor.*, cidade.nome as nome_cidade, estado.uf');
        $this->db->join('cidade', 'cidade.id = fornecedor.cod_cidade', 'left');
        $this->db->join('estado', 'estado.id = cidade.estado', 'left');

        return $this->db->get_where('fornecedor', array('cnpj_cpf' => $CnpjCpf))->row();
    }

    public function getFornecedorPorNome($nomeFornecedor){
        $this->db->where('id_empresa', getDadosUsuarioLogado()['id_empresa']); 

        $this->db->select('fornecedor.*, cidade.nome as nome_cidade, estado.uf');
        $this->db->join('cidade', 'cidade.id = fornecedor.cod_cidade', 'left');
        $this->db->join('estado', 'estado.id = cidade.estado', 'left');
        $this->db->where('cnpj_cpf', ''); 
        $this->db->limit(1);

        return $this->db->get_where('fornecedor', array('nome_fornecedor' => $nomeFornecedor))->row();
    }

    public function getFornecedorPorCodigo($codFornecdor){
        $this->db->where('id_empresa', getDadosUsuarioLogado()['id_empresa']);

        $this->db->select('fornecedor.*, tb_common_municipios.nome as nome_cidade, tb_common_estados.uf');
        $this->db->join('tb_common_municipios', 'tb_common_municipios.id = fornecedor.cod_cidade', 'left');
        $this->db->join('tb_common_estados', 'tb_common_estados.id = tb_common_municipios.tb_estado_id', 'left');

        return $this->db->get_where('fornecedor', array('cod_fornecedor' => $codFornecdor))->row();
    }

    public function countAll($filter){
        $this->db->where('fornecedor.id_empresa', getDadosUsuarioLogado()['id_empresa']);
        $this->db->join('segmento', 'segmento.cod_segmento = fornecedor.cod_segmento', 'left');

        if($filter <> ""){
            $this->db->group_start();
            $this->db->or_like('fornecedor.cod_fornecedor' ,$filter);
            $this->db->or_like('fornecedor.nome_fornecedor' ,$filter);
            $this->db->or_like('fornecedor.cnpj_cpf' ,$filter);
            $this->db->group_end();
            
        }

        return $this->db->count_all_results('fornecedor');
    }    

    public function buscarPorCodigo($CodFornecedor){
        $this->db->where('fornecedor.id_empresa', getDadosUsuarioLogado()['id_empresa']); 

        $this->db->select('fornecedor.*');
        $this->db->select('tb_common_municipios.nome as nome_cidade, tb_common_estados.uf');
        $this->db->join('tb_common_municipios', 'tb_common_municipios.id = fornecedor.cod_cidade', 'left');
        $this->db->join('tb_common_estados', 'tb_common_estados.id = tb_common_municipios.tb_estado_id', 'left');

        return $this->db->get_where('fornecedor', array('cod_fornecedor' => $CodFornecedor))->row();
    }    

}
