<?php $this->load->view('gerais/header' , $menu); ?>
<?php $this->load->view('gerais/menu', $menu); ?>

<section>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('visao-geral') ?>">Visão Geral</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('producao') ?>">Produção</a></li>
            <li class="breadcrumb-item active">Consumo por Produto</a></li>
        </ol>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="<?= base_url('relatorios/consumo-produto') ?>" method="get" class="mb-0 needs-validation" novalidate>
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label for="inputTipoProduto">Data Início</label>
                                    <input class="form-control" id="inputDataInicio" type="text" name="DataInicio"
                                        value="<?= str_replace('-', '/', date("d-m-Y", strtotime($dataInicio))) ?>">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputTipoProduto">Data Fim</label>
                                    <input class="form-control" id="inputDataFim" type="text" name="DataFim"
                                        value="<?= str_replace('-', '/', date("d-m-Y", strtotime($dataFim))) ?>">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputTipoProduto">Produtos Produzidos</label>
                                    <select id="inputProduto" name="produtoProduzido[]" data-style="btn-input-primary" multiple
                                        data-actions-box="true" class="selectpicker show-tick form-control"
                                        data-live-search="true" data-actions-box="true" title="Produtos Produzidos">
                                        <?php $chave_produto = 0; foreach($lista_produto_prod as $key_produto_prod => $produto_prod) { ?>
                                        <option value="<?= $produto_prod->cod_produto ?>" <?php if($cod_produto_produzido != null){if($produto_prod->cod_produto == $cod_produto_produzido[$chave_produto]){ 
                                        if((count($cod_produto_produzido) - 1) > $chave_produto) {$chave_produto = $chave_produto + 1; } 
                                        echo "selected"; }}?>>
                                            <?= $produto_prod->cod_produto ?> -
                                            <?= $produto_prod->nome_produto ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputTipoProduto">Produtos Consumidos</label>
                                    <select id="inputProduto" name="produtoConsumido[]" data-style="btn-input-primary" multiple
                                        data-actions-box="true" class="selectpicker show-tick form-control"
                                        data-live-search="true" data-actions-box="true" title="Produtos Consumidos">
                                        <?php $chave_produto = 0; foreach($lista_produto_cons as $key_produto_cons => $produto_cons) { ?>
                                        <option value="<?= $produto_cons->cod_produto ?>" <?php if($cod_produto_consumido != null){if($produto_cons->cod_produto == $cod_produto_consumido[$chave_produto]){ 
                                        if((count($cod_produto_consumido) - 1) > $chave_produto) {$chave_produto = $chave_produto + 1; } 
                                        echo "selected"; }}?>>
                                            <?= $produto_cons->cod_produto ?> -
                                            <?= $produto_cons->nome_produto ?></option>
                                        <?php } ?>
                                    </select>
                                </div>  
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-10 mb-0">                                    
                                </div> 
                                <div class="form-group col-md-2 mb-0"> 
                                    <button type="submit" class="btn btn-outline-primary btn-block"><i class="fa-solid fa-rotate"></i> Atualizar Dados</button>
                                </div> 
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#resumido" role="tab"
                            aria-controls="home" aria-selected="true">Consumo Resumido</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#detalhado" role="tab"
                            aria-controls="profile" aria-selected="false">Consumo Detalhado</a>
                    </li>
                </ul>
                <div class="card  mb-5">
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="resumido" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="form-group col-md-2 mb-0">                                    
                                        <button type="button" id="btnExportProdutoResumido" class="btn btn-outline-warning btn-block"><i class="fa-regular fa-file-excel"></i> Exportar Excel</button>
                                    </div> 
                                    <div class="form-group col-md-10 mb-0">                                    
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-reporte small2">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">Produto consumido</th>
                                                <th scope="col">Tipo produto</th>
                                                <th scope="col">Produto produzido</th>
                                                <th scope="col" class="text-right">Produção</th>    
                                                <th scope="col" class="text-right">Consumo</th>
                                                <th scope="col" class="text-right">Custo</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($lista_consumo_resumida as $key_consumo_resumida => $consumo_resumida) { ?>
                                            <tr>
                                                <td scope="row" class="align-middle"><?= $consumo_resumida->cod_produto ?> - <?= $consumo_resumida->nome_produto ?></td>
                                                <td class="align-middle"><?= $consumo_resumida->nome_tipo_produto ?></td>
                                                <td scope="row" class="align-middle"><?= $consumo_resumida->produto_producao ?> -
                                                    <?= $consumo_resumida->nome_producao ?></td>
                                                <td
                                                    class="align-middle text-right <?php if($consumo_resumida->quant_reportada > 0) echo "text-teal"; ?>">
                                                    <?= number_format($consumo_resumida->quant_reportada, 3, ',', '.') ?> <?= $consumo_resumida->un_producao ?>
                                                </td>
                                                <td
                                                    class="align-middle text-right <?php if($consumo_resumida->quant_consumo > 0) echo "text-warning"; ?>">
                                                    <?= number_format($consumo_resumida->quant_consumo, 3, ',', '.') ?> <?= $consumo_resumida->cod_unidade_medida ?>
                                                </td>
                                                <td
                                                    class="align-middle text-right <?php if($consumo_resumida->custo_consumo > 0) echo "text-danger"; ?>">
                                                    R$
                                                    <?= number_format($consumo_resumida->custo_consumo, 2, ',', '.') ?>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php if($lista_consumo_resumida == false) { ?>
                                    <div class="text-center text-muted">
                                        <p class="font-italic mt-3">Nenhuma informação encontrada</p>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="tab-pane fade" id="detalhado" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="row">
                                    <div class="form-group col-md-2 mb-0">                                    
                                        <button type="button" id="btnExportProdutoDetalhado" class="btn btn-outline-warning btn-block"><i class="fa-regular fa-file-excel"></i> Exportar Excel</button>
                                    </div> 
                                    <div class="form-group col-md-10 mb-0">                                    
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-reporte small2">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col" class="text-center">Data</th>
                                                <th scope="col" class="text-center">Ordem</th>
                                                <th scope="col" class="text-center">Reporte</th>
                                                <th scope="col">Produto consumido</th>
                                                <th scope="col">Tipo produto</th>
                                                <th scope="col">Produto produzido</th>
                                                <th scope="col" class="text-right">Produção</th> 
                                                <th scope="col" class="text-right">Consumo</th>
                                                <th scope="col" class="text-right">Custo</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($lista_consumo_detalhado as $key_consumo_detalhado => $consumo_detalhado) { ?>
                                            <tr>
                                                <td class="align-middle text-center">
                                                    <?= str_replace('-', '/', date("d-m-Y", strtotime($consumo_detalhado->data_movimento))) ?>
                                                </td>
                                                <td class="align-middle text-center"><?= $consumo_detalhado->num_ordem_producao ?></td>
                                                <td class="align-middle text-center"><?= $consumo_detalhado->cod_reporte_producao ?></td>
                                                <td scope="row" class="align-middle"><?= $consumo_detalhado->cod_produto ?> -
                                                    <?= $consumo_detalhado->nome_produto ?>
                                                </td>                                            
                                                <td class="align-middle"><?= $consumo_detalhado->nome_tipo_produto ?></td>
                                                <td scope="row" class="align-middle"><?= $consumo_detalhado->produto_acabado ?> -
                                                    <?= $consumo_detalhado->nome_acabado ?></td>
                                                <td
                                                    class="align-middle text-right <?php if($consumo_detalhado->quant_reportada > 0) echo "text-teal"; ?>">
                                                    <?= number_format($consumo_detalhado->quant_reportada, 3, ',', '.') ?> <?= $consumo_detalhado->un_producao ?>
                                                </td>
                                                <td
                                                    class="align-middle text-right <?php if($consumo_detalhado->quant_movimentada > 0) echo "text-warning"; ?>">
                                                    <?= number_format($consumo_detalhado->quant_movimentada, 3, ',', '.') ?> <?= $consumo_detalhado->cod_unidade_medida ?>
                                                </td>
                                                <td
                                                    class="align-middle text-right <?php if($consumo_detalhado->valor_movimento > 0) echo "text-danger"; ?>">
                                                    R$ <?= number_format($consumo_detalhado->valor_movimento, 2, ',', '.') ?>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php if($lista_consumo_detalhado == false) { ?>
                                    <div class="text-center text-muted">
                                        <p class="font-italic mt-3">Nenhuma informação encontrada</p>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>

    </div>
</section>

<iframe id="downloadXLSResumido" style="display:none">
    <meta http-equiv="content-type" content="application/vnd.ms-excel; charset=UTF-8">
    <table>
        <tbody>
            <tr>
                <th colspan="8" style="text-align: left; background-color: rgb(245, 245, 245)">
                    <h1><?= $empresa->nome_empresa ?></h1>
                </th>
            </tr> 
            <tr>
                <th colspan="8" style="text-align: left; background-color: rgb(245, 245, 245)">
                    Relatório resumido de produtos consumido: <?= str_replace('-', '/', date("d-m-Y", strtotime($dataInicio))) ?> até  <?= str_replace('-', '/', date("d-m-Y", strtotime($dataFim))) ?>
                </th>
            </tr> 
            <tr>
            </tr>
        </tbody>
    </table>
    <table>
        <thead>
            <tr>
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">PRODUTO CONSUMIDO</th> 
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">UN CONSUMO</th>                
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">TIPO DO PRODUTO</th>
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">PRODUTO PRODUZIDO</th>
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">UN PRODUÇÃO</th> 
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">PRODUÇÃO</th>   
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">CONSUMIDO</th> 
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">CUSTO TOTAL</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($lista_consumo_resumida as $key_consumo_resumida => $consumo_resumida) { ?>
            <tr>
                <td style="border: 1px solid">
                    <?= $consumo_resumida->cod_produto ?> - <?= $consumo_resumida->nome_produto ?>
                </td>
                <td style="border: 1px solid">
                    <?= $consumo_resumida->cod_unidade_medida ?>
                </td>
                <td style="border: 1px solid">
                    <?= $consumo_resumida->nome_tipo_produto ?>
                </td>
                <td style="border: 1px solid">
                    <?= $consumo_resumida->produto_producao ?> - <?= $consumo_resumida->nome_producao ?>
                </td>
                <td style="border: 1px solid">
                    <?= $consumo_resumida->un_producao ?>
                </td>
                <td style="border: 1px solid">
                    <?= number_format($consumo_resumida->quant_reportada, 3, ',', '.') ?>
                </td>
                <td style="border: 1px solid">
                    <?= number_format($consumo_resumida->quant_consumo, 3, ',', '.') ?> 
                </td>
                <td style="border: 1px solid">
                    R$ <?= number_format($consumo_resumida->custo_consumo, 2, ',', '.') ?>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</iframe>

<iframe id="downloadXLSDetalhado" style="display:none">
    <meta http-equiv="content-type" content="application/vnd.ms-excel; charset=UTF-8">
    <table>
        <tbody>
            <tr>
                <th colspan="11" style="text-align: left; background-color: rgb(245, 245, 245)">
                    <h1><?= $empresa->nome_empresa ?></h1>
                </th>
            </tr> 
            <tr>
                <th colspan="11" style="text-align: left; background-color: rgb(245, 245, 245)">
                    Relatório detalhado de produtos consumidos: <?= str_replace('-', '/', date("d-m-Y", strtotime($dataInicio))) ?> até  <?= str_replace('-', '/', date("d-m-Y", strtotime($dataFim))) ?>
                </th>
            </tr> 
            <tr>
            </tr>
        </tbody>
    </table>
    <table>
        <thead>
            <tr>
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">DATA</th> 
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">ORDEM</th> 
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">REPORTE</th> 
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">PRODUTO CONSUMIDO</th> 
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">UN CONSUMO</th>                
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">TIPO DO PRODUTO</th>
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">PRODUTO PRODUZIDO</th>
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">UN PRODUÇÃO</th> 
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">PRODUÇÃO</th>   
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">CONSUMIDO</th> 
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">CUSTO TOTAL</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($lista_consumo_detalhado as $key_consumo_detalhado => $consumo_detalhado) { ?>
            <tr>
                <td style="border: 1px solid">
                    <?= str_replace('-', '/', date("d-m-Y", strtotime($consumo_detalhado->data_movimento))) ?>
                </td>
                <td style="border: 1px solid">
                    <?= $consumo_detalhado->num_ordem_producao ?>
                </td>
                <td style="border: 1px solid">
                    <?= $consumo_detalhado->cod_reporte_producao ?>
                </td>
                <td style="border: 1px solid">
                    <?= $consumo_detalhado->cod_produto ?> - <?= $consumo_detalhado->nome_produto ?>
                </td>
                <td style="border: 1px solid">
                    <?= $consumo_detalhado->cod_unidade_medida ?>
                </td>
                <td style="border: 1px solid">
                    <?= $consumo_detalhado->nome_tipo_produto ?>
                </td>
                <td style="border: 1px solid">
                    <?= $consumo_detalhado->produto_acabado ?> - <?= $consumo_detalhado->nome_acabado ?>
                </td>
                <td style="border: 1px solid">
                    <?= $consumo_detalhado->un_producao ?>
                </td>
                <td style="border: 1px solid">
                    <?= number_format($consumo_detalhado->quant_reportada, 3, ',', '.') ?>
                </td>
                <td style="border: 1px solid">
                    <?= number_format($consumo_detalhado->quant_movimentada, 3, ',', '.') ?> 
                </td>
                <td style="border: 1px solid">
                    R$ <?= number_format($consumo_detalhado->valor_movimento, 2, ',', '.') ?>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</iframe>

<script>
$('#inputDataInicio').datepicker({
    uiLibrary: 'bootstrap4'
});
$('#inputDataFim').datepicker({
    uiLibrary: 'bootstrap4'
});

$("#btnExportProdutoResumido").click(function(e) {
    var a = document.createElement('a');
    var data_type = 'data:application/vnd.ms-excel';
    var table_div = document.getElementById('downloadXLSResumido');
    var table_html = table_div.outerHTML.replace(/ /g, '%20');
    a.href = data_type + ', ' + table_html;
    a.download = 'ShopFloor - Consumo Por Produto (Resumido).xls';
    a.click();
    e.preventDefault();
});

$("#btnExportProdutoDetalhado").click(function(e) {
    var a = document.createElement('a');
    var data_type = 'data:application/vnd.ms-excel';
    var table_div = document.getElementById('downloadXLSDetalhado');
    var table_html = table_div.outerHTML.replace(/ /g, '%20');
    a.href = data_type + ', ' + table_html;
    a.download = 'ShopFloor - Consumo Por Produto (Detalhado).xls';
    a.click();
    e.preventDefault();
});

</script>

<?php $this->load->view('gerais/footer'); ?>