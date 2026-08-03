<?php

class Fiscal extends CI_Model{ 

    public function getNotaFiscal($dataInicio, $dataFim, $filter){
        $this->db->where('nota_fiscal.id_empresa', getDadosUsuarioLogado()['id_empresa']);

        //Join para pegar o segmento
        $this->db->select('nota_fiscal.*, cliente.nome_cliente');
        $this->db->select('tb_fis_natureza_operacao.operacao_fiscal, tb_fis_natureza_operacao.nome');
        $this->db->from('nota_fiscal');   
        $this->db->join('tb_fis_natureza_operacao', 'tb_fis_natureza_operacao.id = nota_fiscal.id_natureza_operacao');  
        $this->db->join('cliente', 'cliente.cod_cliente = nota_fiscal.cod_cliente');  
        $this->db->order_by('nota_fiscal.data_emissao', 'desc');            

        if($filter <> ""){
            $this->db->group_start();
            $this->db->or_like('nota_fiscal.cod_nota_fiscal' ,$filter);
            $this->db->or_like('cliente.nome_cliente' ,$filter);
            $this->db->or_like('tb_fis_natureza_operacao.nome' ,$filter);
            $this->db->group_end();
            
        }else{
            $this->db->where('nota_fiscal.data_emissao >= ', $dataInicio); 
            $this->db->where('nota_fiscal.data_emissao <= ', $dataFim); 
        }        
        
        return $query = $this->db->get()->result();
        
    }

    public function getNotaFiscalAvulsaPorStatus($dataInicio, $dataFim){

        $this->db->select('(select sum((select sum(produto_nota_fiscal.quantidade * produto_nota_fiscal.valor_unitario)
                                          from produto_nota_fiscal
                                         where produto_nota_fiscal.cod_nota_fiscal = nota_fiscal.cod_nota_fiscal)
                                       + nota_fiscal.valor_seguro 
                                       + nota_fiscal.outras_despesas 
                                       - nota_fiscal.valor_desconto)
                              from nota_fiscal
                             where nota_fiscal.id_empresa = ' . getDadosUsuarioLogado()['id_empresa'] . '
                               and(nota_fiscal.status = 1
                                or nota_fiscal.status = 2)
                               and nota_fiscal.data_emissao >= "' . $dataInicio . '"
                               and nota_fiscal.data_emissao <= "' . $dataFim . '") tota_pendente');
        $this->db->select('(select sum((select sum(produto_nota_fiscal.quantidade * produto_nota_fiscal.valor_unitario)
                                          from produto_nota_fiscal
                                         where produto_nota_fiscal.cod_nota_fiscal = nota_fiscal.cod_nota_fiscal)
                                       + nota_fiscal.valor_seguro 
                                       + nota_fiscal.outras_despesas 
                                       - nota_fiscal.valor_desconto)
                              from nota_fiscal
                             where nota_fiscal.id_empresa = ' . getDadosUsuarioLogado()['id_empresa'] . '
                               and nota_fiscal.status = 3
                               and nota_fiscal.data_emissao >= "' . $dataInicio . '"
                               and nota_fiscal.data_emissao <= "' . $dataFim . '") tota_emitida');
        $this->db->select('(select sum((select sum(produto_nota_fiscal.quantidade * produto_nota_fiscal.valor_unitario)
                                          from produto_nota_fiscal
                                         where produto_nota_fiscal.cod_nota_fiscal = nota_fiscal.cod_nota_fiscal)
                                       + nota_fiscal.valor_seguro 
                                       + nota_fiscal.outras_despesas 
                                       - nota_fiscal.valor_desconto)
                              from nota_fiscal
                             where nota_fiscal.id_empresa = ' . getDadosUsuarioLogado()['id_empresa'] . '
                               and nota_fiscal.status = 4
                               and nota_fiscal.data_emissao >= "' . $dataInicio . '"
                               and nota_fiscal.data_emissao <= "' . $dataFim . '") tota_cancelado');

        return $query = $this->db->get()->row();
        
    }

    public function insertNotaFiscal($notaFiscal){
        $this->db->insert('nota_fiscal', $notaFiscal);

        return $this->db->insert_id();
    }

    public function insertProdutoNF($produtoNF){
        $this->db->insert('produto_nota_fiscal', $produtoNF);

        return $this->db->insert_id();
    }

    public function updateNotaFiscal($codNotaFiscal, $notaFiscal){
        $this->db->where('id_empresa', getDadosUsuarioLogado()['id_empresa']); 
        
        $this->db->where('cod_nota_fiscal', $codNotaFiscal);
        $this->db->update('nota_fiscal', $notaFiscal);

        return NULL;
    }

    public function updateProdutoNF($seqProdutoNF, $produtoNotaFiscal){
        
        $this->db->where('seq_produto_nf', $seqProdutoNF);
        $this->db->update('produto_nota_fiscal', $produtoNotaFiscal);

        if($this->db->affected_rows() > 0){
            return $codVendedor;
        }

        return NULL;
    }

    public function deleteProdutoNF($SeqProdutoNF) {
        $this->db->where_in('seq_produto_nf',$SeqProdutoNF)->delete('produto_nota_fiscal');
    }

    public function countAllNF(){
        $this->db->where('id_empresa', getDadosUsuarioLogado()['id_empresa']); 

        return $this->db->count_all_results('nota_fiscal');
    }

    public function getNotaFiscalporCodigo($codNotaFiscal){
        $this->db->where('nota_fiscal.id_empresa', getDadosUsuarioLogado()['id_empresa']); 
        //$this->db->where('tb_fat_nota_fiscal.id_empresa', getDadosUsuarioLogado()['id_empresa']); 

        $this->db->select('nota_fiscal.*');
        $this->db->select('(select sum(produto_nota_fiscal.quantidade * produto_nota_fiscal.valor_unitario)
                              from produto_nota_fiscal
                             where produto_nota_fiscal.cod_nota_fiscal = nota_fiscal.cod_nota_fiscal) valor_total');
        $this->db->select('tb_fat_nota_fiscal.c_stat, tb_fat_nota_fiscal.x_motivo, tb_fat_nota_fiscal.chave, tb_fat_nota_fiscal.id as nf_id');
        $this->db->join('tb_fat_nota_fiscal', 'tb_fat_nota_fiscal.cod_faturamento_pedido = nota_fiscal.cod_nota_fiscal 
                                               and tb_fat_nota_fiscal.origem_nf = 3
                                               and tb_fat_nota_fiscal.id_empresa = ' . getDadosUsuarioLogado()['id_empresa'], 'left');

        return $this->db->get_where('nota_fiscal', array('cod_nota_fiscal' => $codNotaFiscal))->row();
    }    

    public function getProdutosPorNF($codNotaFiscal){
        $this->db->where('nota_fiscal.id_empresa', getDadosUsuarioLogado()['id_empresa']); 
        $this->db->where('produto.id_empresa', getDadosUsuarioLogado()['id_empresa']); 

        $this->db->select('produto_nota_fiscal.*, produto.nome_produto, produto.cod_unidade_medida, tipo_produto.nome_tipo_produto, produto.cod_ncm, produto.cod_origem, produto.cod_gtin');
        $this->db->select('ncm.percentual_ipi');
        $this->db->from('produto_nota_fiscal');  
        $this->db->join('produto', 'produto.cod_produto = produto_nota_fiscal.cod_produto');  
        $this->db->join('ncm', 'ncm.cod_ncm = produto.cod_ncm','left');
        $this->db->join('tipo_produto', 'tipo_produto.cod_tipo_produto = produto.cod_tipo_produto');  
        $this->db->join('nota_fiscal', 'nota_fiscal.cod_nota_fiscal = produto_nota_fiscal.cod_nota_fiscal');  
        $this->db->where('nota_fiscal.cod_nota_fiscal', $codNotaFiscal);

        return $query = $this->db->get()->result();
    }

    public function getNotaFiscalEmitida($filter = "", $limit = null, $offset = null){
        $this->db->where('tb_fat_nota_fiscal.id_empresa', getDadosUsuarioLogado()['id_empresa']); 

        if($limit){
            $this->db->limit($limit, $offset);
        }

        //Join para pegar o segmento
        $this->db->select('tb_fat_nota_fiscal.*, cliente.nome_cliente');
        $this->db->select('tb_fis_natureza_operacao.operacao_fiscal, tb_fis_natureza_operacao.nome');
        $this->db->from('tb_fat_nota_fiscal');   
        $this->db->join('tb_fis_natureza_operacao', 'tb_fis_natureza_operacao.id = tb_fat_nota_fiscal.tb_fis_natureza_operacao_id');  
        $this->db->join('cliente', 'cliente.cod_cliente = tb_fat_nota_fiscal.cod_cliente', 'left');             

        if($filter <> ""){
            $this->db->group_start();
            $this->db->or_like('tb_fat_nota_fiscal.serie' ,$filter);
            $this->db->or_like('tb_fat_nota_fiscal.numero' ,$filter);
            $this->db->or_like('cliente.nome_cliente' ,$filter);
            $this->db->or_like('tb_fis_natureza_operacao.nome' ,$filter);
            $this->db->group_end();
            
        }
        $this->db->order_by('tb_fat_nota_fiscal.data_emissao', 'desc'); 
        
        return $query = $this->db->get()->result();
        
    }

    // Integrações externas

    public function getTributosIBPT($codProduto){

        $produto = $this->produto->getProdutoPorCodigo($codProduto);
        $empresa = $this->empresa->getEmpresaPorCodigo(getDadosUsuarioLogado()['id_empresa']);

        $descProduto = str_replace(" ", "%" , $produto->desc_produto);

        $url = "https://apidoni.ibpt.org.br/api/v1/produtos?" . 
        "token=TotO-gmGlAu-HX6Zp9nsvVLCfdMOVhXYDRKAPaOsnj1YrXJeXDnj4-SIRvxzlGuS&" .
        "cnpj=43628408000115&" .
        "codigo={$produto->cod_ncm}&". 
        "uf={$empresa->uf}&" . 
        "ex=0&" . 
        "descricao={$descProduto}&" .
        "unidadeMedida={$produto->cod_unidade_medida}&" . 
        "valor={$produto->preco_venda}&" . 
        "gtin=SEM%20GETIN";

        // Realizando conexão
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        // Resultado da consulta
        $result = curl_exec($ch);
        $response =  curl_getinfo($ch, CURLINFO_HTTP_CODE);

        // Finalizando conexão
        curl_close($ch);

        $dados = json_decode($result, true);

        if(@$dados['Message'] != ""){
            $this->session->set_flashdata('erro', 'Integração IBPT: ' . $dados['Message']);
            return false;
        }

        if($dados != null){
            $tributos = [
                'estadual' => $dados['Estadual'],
                'nacional' => $dados['Nacional'],
            ];
        }else{
            $tributos = [
                'estadual' => 0,
                'nacional' => 0,
            ];
        }
        

        return $tributos;
    }

    /*********************** */
    
    public function autenticarVendedor($empresa, $usuario, $senha){
        return $this->db->get_where('vendedor', array('id_empresa' => $empresa, 'nome_usuario' => $usuario, 'senha' => $senha))->row();
    }

    public function insertVendedor($vendedor){
        $this->db->insert('vendedor', $vendedor);

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

    public function deleteVendedor($codVendedor) {
        $this->db->where('id_empresa', getDadosUsuarioLogado()['id_empresa']); 

        $this->db->where_in('cod_vendedor',$codVendedor)->delete('vendedor');

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

        $this->db->select('vendedor.*, cidade.nome as nome_cidade, estado.uf');
        $this->db->join('cidade', 'cidade.id = vendedor.cod_cidade', 'left');
        $this->db->join('estado', 'estado.id = cidade.estado', 'left');

        return $this->db->get_where('vendedor', array('cod_vendedor' => $CodVendedor))->row();
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

    public function selectVendedor($codVendedor = null){

        $vendedor = $this->getVendedorPorCodigo($codVendedor);

        $input = number_format($vendedor->perc_comissao, 2, ',', '.');

        return $input;

    }

}