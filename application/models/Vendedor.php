<?php

class Vendedor extends CI_Model{ 
    
    public function autenticarVendedor($empresa, $usuario, $senha){
        return $this->db->get_where('vendedor', array('id_empresa' => $empresa, 'nome_usuario' => $usuario, 'senha' => $senha))->row();
    }

    public function insertVendedor($vendedor){
        $this->db->insert('vendedor', $vendedor);

        return $this->db->insert_id();
    }

    public function insertComissao($comissao){
        $this->db->insert('comissao_vendedor', $comissao);

        return $this->db->insert_id();
    }

    public function insertMeta($meta){
        $this->db->insert('meta_vendedor', $meta);

        return $this->db->insert_id();
    }

    public function updateVendedor($codVendedor, $vendedor){
        $this->db->where('id_empresa', getDadosUsuarioLogado()['id_empresa']); 
        
        $this->db->where('cod_vendedor', $codVendedor);
        $this->db->update('vendedor', $vendedor);

        if($this->db->affected_rows() > 0){
            return $codVendedor;
        }

        return NULL;
    }

    public function updateComissao($idComissao, $comissao){
        
        $this->db->where('id_comissao', $idComissao);
        $this->db->update('comissao_vendedor', $comissao);

        return NULL;
    }

    public function updateMeta($idMeta, $meta){
        
        $this->db->where('id_meta', $idMeta);
        $this->db->update('meta_vendedor', $meta);

        return NULL;
    }

    public function deleteVendedor($codVendedor) {
        $this->db->where('id_empresa', getDadosUsuarioLogado()['id_empresa']); 

        $this->db->where_in('cod_vendedor',$codVendedor)->delete('vendedor');

        if($this->db->error() <> null){
            return $this->db->error();
        }

        return null;
    }

    public function deleteComissao($codComissao) {

        $this->db->where_in('id_comissao',$codComissao)->delete('comissao_vendedor');

        if($this->db->error() <> null){
            return $this->db->error();
        }

        return null;
    }

    public function deleteMeta($codMeta) {

        $this->db->where_in('id_meta',$codMeta)->delete('meta_vendedor');

        if($this->db->error() <> null){
            return $this->db->error();
        }

        return null;
    }

    public function getVendedor($filter = "", $limit = null, $offset = null){
        $this->db->where('id_empresa', getDadosUsuarioLogado()['id_empresa']); 

        if($limit){
            $this->db->limit($limit, $offset);
        }

        //Join para pegar o segmento
        $this->db->select('vendedor.*');
        $this->db->select('(select count(*)
                              from pedido_venda
                             where pedido_venda.cod_vendedor = vendedor.cod_vendedor) count_pedido');
        $this->db->from('vendedor');      

        if($filter <> ""){
            $this->db->group_start();
            $this->db->or_like('cod_vendedor' ,$filter);
            $this->db->or_like('nome_vendedor' ,$filter);
            $this->db->group_end();
            
        }
        
        return $query = $this->db->get()->result();
        
    }

    public function getVendedorPorCodigo($CodVendedor){
        $this->db->where('id_empresa', getDadosUsuarioLogado()['id_empresa']); 

        $this->db->select('vendedor.*');
        $this->db->select('tb_common_municipios.nome as nome_cidade, tb_common_estados.uf');
        $this->db->join('tb_common_municipios', 'tb_common_municipios.id = vendedor.cod_cidade', 'left');
        $this->db->join('tb_common_estados', 'tb_common_estados.id = tb_common_municipios.tb_estado_id', 'left');

        return $this->db->get_where('vendedor', array('cod_vendedor' => $CodVendedor))->row();
    }

    public function getVendedorPorUsuario($usuario){
        $this->db->where('id_empresa', getDadosUsuarioLogado()['id_empresa']); 

        $this->db->select('vendedor.*');

        return $this->db->get_where('vendedor', array('nome_usuario' => $usuario))->row();
    }

    public function getMetaPorAnoVendedor($CodVendedor, $ano){

        $this->db->select('meta_vendedor.*');
        $this->db->from('meta_vendedor');
        $this->db->where('meta_vendedor.cod_vendedor', $CodVendedor);
        $this->db->where('meta_vendedor.ano', $ano);

        return $this->db->get()->row();
    }

    public function getComissaoVendedor($CodVendedor){

        $this->db->select('comissao_vendedor.*');

        return $this->db->get_where('comissao_vendedor', array('cod_vendedor' => $CodVendedor))->result();
    }

    public function getMetaVendedor($CodVendedor){ 

        $this->db->select('meta_vendedor.*');
        $this->db->select('(meta_vendedor.janeiro + meta_vendedor.fevereiro + meta_vendedor.marco + meta_vendedor.abril + meta_vendedor.maio + meta_vendedor.junho + meta_vendedor.julho + 
                            meta_vendedor.agosto + meta_vendedor.setembro + meta_vendedor.outubro + meta_vendedor.novembro + meta_vendedor.dezembro) as total_meta');
        $this->db->from('meta_vendedor');      
        $this->db->where('meta_vendedor.cod_vendedor', $CodVendedor);
        $this->db->order_by('meta_vendedor.ano', 'desc');

        return $query = $this->db->get()->result();
    }
    
    public function getVendedorPorCodigoVendasExternas($CodVendasExternas){
        $this->db->where('id_empresa', getDadosUsuarioLogado()['id_empresa']); 

        $this->db->select('vendedor.*, cidade.nome as nome_cidade, estado.uf');
        $this->db->join('cidade', 'cidade.id = vendedor.cod_cidade', 'left');
        $this->db->join('estado', 'estado.id = cidade.estado', 'left');

        return $this->db->get_where('vendedor', array('cod_vendas_externas' => $CodVendasExternas))->row();
    } 

    public function getVendedorPorNome($nomeVendedor){
        $this->db->where('id_empresa', getDadosUsuarioLogado()['id_empresa']); 

        $this->db->select('vendedor.*, cidade.nome as nome_cidade, estado.uf');
        $this->db->join('cidade', 'cidade.id = vendedor.cod_cidade', 'left');
        $this->db->join('estado', 'estado.id = cidade.estado', 'left');
        $this->db->limit(1);

        return $this->db->get_where('vendedor', array('nome_vendedor' => $nomeVendedor))->row();
    } 

    public function getNotasPorVendedor($codVendedor){

        $this->db->select('notas_cliente.*');
        $this->db->select('usuario.nome_usuario, vendedor.nome_vendedor');
        $this->db->select('cliente.nome_cliente');
        $this->db->from('notas_cliente');
        $this->db->join('usuario', 'usuario.email = notas_cliente.usuario', 'left');
        $this->db->join('vendedor', 'vendedor.cod_vendedor = notas_cliente.cod_vendedor', 'left');
        $this->db->join('cliente', 'cliente.cod_cliente = notas_cliente.cod_cliente');
        $this->db->where('notas_cliente.cod_vendedor', $codVendedor); 
        $this->db->order_by('notas_cliente.data_nota', 'desc');

        return $query = $this->db->get()->result();
    }

    public function countAll($filter){
        $this->db->where('id_empresa', getDadosUsuarioLogado()['id_empresa']); 

        if($filter <> ""){
            $this->db->group_start();
            $this->db->or_like('cod_vendedor' ,$filter);
            $this->db->or_like('nome_vendedor' ,$filter);
            $this->db->group_end();
            
        }

        return $this->db->count_all_results('vendedor');
    }

    public function selectVendedor($codVendedor = null){

        $vendedor = $this->getVendedorPorCodigo($codVendedor);

        $input = number_format($vendedor->perc_comissao, 2, ',', '.');

        return $input;

    }

}