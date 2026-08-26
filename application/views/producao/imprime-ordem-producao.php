<?php $this->load->view('gerais/header' , $menu); ?>

<section>
    <div class="container-cupom mt-5">
        <div class="row border-bottom border-dark mb-3">
            <div class="col-6">
                <h3 class="text-black-50"><?= str_replace("-", "/", date("d-m-Y", strtotime($ordem->data_emissao))) ?>
                </h3>
            </div>
            <div class="col-6 text-right">
                <h3 class="text-black-50 mb-3">Ordem de Produção <strong
                        class="text-dark"><?= $ordem->num_ordem_producao ?></strong></h3>
            </div>
        </div>
        <div class="row border-bottom border-dark mb-3">
            <?php if($empresa->caminho_logo != null && $empresa->caminho_logo != "") { ?>
            <div class="col-3">                
                <img src="<?php echo base_url() . "clientes/" . $empresa->id_empresa . "/logo/" . $empresa->caminho_logo ?>"
                    alt="..." class="img-thumbnail img-responsive mb-3" >          
            </div>
            <?php } ?> 
            <div class="col-9 mb-3">
                <h1 class="text-uppercase mb-4"><strong><?= $empresa->nome_empresa ?></strong></h1>                
                <table class="table table-bordered h4">
                    <tbody>
                        <tr>
                            <td class="text-dark"><strong>DATA PRODUÇÃO</strong></td>
                            <td class="text-uppercase text-black-50 text-right"><strong><?= str_replace("-", "/", date("d-m-Y", strtotime($ordem->data_fim))) ?></strong></td>
                        </tr>
                        <tr>
                            <td class="text-dark"><strong>PEDIDO / CLIENTE</strong></td>
                            <td class="text-uppercase text-black-50 text-right"><strong><?php if($ordem->num_pedido_venda != null && $ordem->num_pedido_venda != 0) echo $ordem->num_pedido_venda . " - " . $ordem->nome_cliente; else echo "ESTOQUE"; ?></strong></td>
                        </tr>                        
                        <tr>
                            <td class="text-dark"><strong>PLANEJADOR</strong></td>
                            <td class="text-uppercase text-black-50 text-right"><strong><?php if($ordem->usuario != "" && $ordem->usuario != null) echo $ordem->nome_usuario; else echo getDadosUsuarioLogado()["nome_usuario"]; ?></strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <?php if($ordem->observacoes != ""){ ?>
        <div class="row border-bottom border-dark mb-3">
            <div class="col-12">
                <p class="lead text-uppercase"><?= nl2br($ordem->observacoes) ?></p>
            </div>
        </div>
        <?php } ?>           
        <div class="row">
            <table class="table table-bordered table-hover text-uppercase h5">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Produto Produção</th>
                        <th scope="col" class="text-center">Qtd Plan</th>
                        <th scope="col" class="text-center">Qtd Prod</th>
                        <th scope="col" class="text-center">Qtd Perd</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><span class="text-black-50"><?= $ordem->cod_produto ?></span> - <?= $ordem->nome_produto ?></td>
                        <td class="text-center"><?= number_format((float) ($ordem->quant_planejada), 3, ",", ".") ?> <?= $ordem->cod_unidade_medida ?></td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="row border-bottom border-dark mb-3">
            <table class="table table-bordered table-hover text-uppercase h5 mb-4">
                <thead class="thead-light">
                    <tr>
                        <th scope="col" class="text-center">Hora Início da Produção</th>
                        <th scope="col" class="text-center">Hora Fim da Produção</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center">:</td>
                        <td class="text-center">:</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="row border-bottom border-dark mb-3">
            <table class="table table-bordered table-hover text-uppercase h5 mb-4">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Produto Consumo</th>
                        <th scope="col" class="text-center">Lote</th>
                        <th scope="col" class="text-center">Cons Prev</th>
                        <th scope="col" class="text-center">Cons Real</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                            foreach($lista_produto as $key_produto => $produto) { ?>
                    <tr>
                        <td><span class="text-black-50"><?= $produto->cod_produto ?></span> - <?= $produto->nome_produto ?></td>
                        <td class="text-center"></td>
                        <td class="text-center"><?= number_format((float) ($produto->quant_consumo), 3, ",", ".") ?> <?= $produto->cod_unidade_medida ?></td>
                        <td class="text-center"></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php if ($lista_produto == false) { ?>
            <div class="text-center">
                <p>Nenhum produto de consumo</p>
            </div>
            <?php } ?>
        </div>
        <div class="row border-bottom border-dark mb-3">
            <h5 class="text-muted">Observações da Produção</h5>
            <div class="col-12 border mb-4">
                <br> <br> <br> <br> <br>
            </div>
        </div>
        <div class="text-center h5">
            www.shopfloor.com.br
        </div>
    </div>
</section>

<?php $this->load->view('gerais/footer'); ?>