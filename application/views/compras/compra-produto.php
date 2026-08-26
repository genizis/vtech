<?php $this->load->view('gerais/header' , $menu); ?>
<?php $this->load->view('gerais/menu', $menu); ?>

<section>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('visao-geral') ?>">Visão Geral</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('compras') ?>">Compras</a></li>
            <li class="breadcrumb-item active">Compra por Produto</a></li>
        </ol>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="<?= base_url('relatorios/compra-produto') ?>" method="get" class="mb-0 needs-validation" novalidate>
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
                                <div class="form-group col-md-8">
                                    <label for="inputTipoProduto">Produto</label>
                                    <select id="inputProduto" name="produto[]" data-style="btn-input-primary" multiple
                                        data-actions-box="true" class="selectpicker show-tick form-control"
                                        data-live-search="true" data-actions-box="true" title="Produtos Comprados">
                                        <?php $chave_produto = 0; foreach($lista_produto_comp as $key_produto_comp => $produto_comp) { ?>
                                        <option value="<?= $produto_comp->cod_produto ?>" <?php if($cod_produto != null){if($produto_comp->cod_produto == $cod_produto[$chave_produto]){ 
                                        if((count($cod_produto) - 1) > $chave_produto) {$chave_produto = $chave_produto + 1; } 
                                        echo "selected"; }}?>>
                                            <?= $produto_comp->cod_produto ?> -
                                            <?= $produto_comp->nome_produto ?></option>
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
                            aria-controls="home" aria-selected="true">Compra Resumida</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#detalhado" role="tab"
                            aria-controls="profile" aria-selected="false">Compra Detalhada</a>
                    </li>
                </ul>
                <div class="card  mb-5">
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="resumido">
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
                                                <th scope="col">Produto de Compra</th>
                                                <th scope="col">Tipo do Produto</th>
                                                <th scope="col" class="text-right">Quantidade</th>
                                                <th scope="col" class="text-right">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($lista_compra_resumida as $key_compra_resumida => $compra_resumida) { ?>
                                            <tr>
                                                <td scope="row"><?= $compra_resumida->cod_produto ?> -
                                                    <?= $compra_resumida->nome_produto ?></td>
                                                <td><?= $compra_resumida->nome_tipo_produto ?></td>
                                                <td class="text-right text-info">
                                                    <?= number_format((float) ($compra_resumida->quant_comprada), 3, ',', '.') ?> <?= $compra_resumida->cod_unidade_medida ?>
                                                </td>
                                                <td class="text-right text-warning">
                                                    R$ <?= number_format((float) ($compra_resumida->total_compra), 2, ',', '.') ?>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php if($lista_compra_resumida == false) { ?>
                                    <div class="text-center text-muted">
                                        <p class="font-italic mt-3">Nenhuma informação encontrada</p>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="tab-pane fade" id="detalhado">
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
                                                <th scope="col" class="text-center">Pedido</th>
                                                <th scope="col" class="text-center">Recebimento</th>
                                                <th scope="col">Produto</th>
                                                <th scope="col">Tipo Produto</th>
                                                <th scope="col" class="text-right">Quantidade</th>
                                                <th scope="col" class="text-right">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($lista_compra_detalhada as $key_compra_detalhada => $compra_detalhada) { ?>
                                            <tr>
                                                <td class="text-center">
                                                    <?= str_replace('-', '/', date("d-m-Y", strtotime($compra_detalhada->data_movimento))) ?>
                                                </td>
                                                <td class="text-center"><?= $compra_detalhada->num_pedido_compra ?></td>
                                                <td class="text-center"><?= $compra_detalhada->cod_recebimento_material ?>
                                                </td>
                                                <td scope="row"><?= $compra_detalhada->cod_produto ?> -
                                                    <?= $compra_detalhada->nome_produto ?></td>
                                                <td><?= $compra_detalhada->nome_tipo_produto ?></td>
                                                <td class="text-right text-info">
                                                    <?= number_format((float) ($compra_detalhada->quant_movimentada), 3, ',', '.') ?> <?= $compra_detalhada->cod_unidade_medida ?>
                                                </td>
                                                <td class="text-right text-warning">
                                                    R$ <?= number_format((float) ($compra_detalhada->valor_movimento), 2, ',', '.') ?>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php if($lista_compra_detalhada == false) { ?>
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
                <th colspan="5" style="text-align: left; background-color: rgb(245, 245, 245)">
                    <h1><?= $empresa->nome_empresa ?></h1>
                </th>
            </tr> 
            <tr>
                <th colspan="5" style="text-align: left; background-color: rgb(245, 245, 245)">
                    Relatório resumido de produtos comprados: <?= str_replace('-', '/', date("d-m-Y", strtotime($dataInicio))) ?> até  <?= str_replace('-', '/', date("d-m-Y", strtotime($dataFim))) ?>
                </th>
            </tr> 
            <tr>
            </tr>
        </tbody>
    </table>
    <table>
        <thead>
            <tr>
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">PRODUTO</th> 
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">UN</th>                
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">TIPO DO PRODUTO</th>
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">QUANTIDADE</th>
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">TOTAL</th>   
            </tr>
        </thead>
        <tbody>
            <?php foreach($lista_compra_resumida as $key_compra_resumida => $compra_resumida) { ?>
            <tr>
                <td style="border: 1px solid">
                    <?= $compra_resumida->cod_produto ?> - <?= $compra_resumida->nome_produto ?>
                </td>
                <td style="border: 1px solid">
                    <?= $compra_resumida->cod_unidade_medida ?>
                </td> 
                <td style="border: 1px solid">
                    <?= $compra_resumida->nome_tipo_produto ?>
                </td> 
                <td style="border: 1px solid">
                    <?= number_format((float) ($compra_resumida->quant_comprada), 3, ',', '.') ?>
                </td> 
                <td style="border: 1px solid">
                    R$ <?= number_format((float) ($compra_resumida->total_compra), 2, ',', '.') ?>
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
                <th colspan="8" style="text-align: left; background-color: rgb(245, 245, 245)">
                    <h1><?= $empresa->nome_empresa ?></h1>
                </th>
            </tr> 
            <tr>
                <th colspan="8" style="text-align: left; background-color: rgb(245, 245, 245)">
                    Relatório detalhado de produtos comprados: <?= str_replace('-', '/', date("d-m-Y", strtotime($dataInicio))) ?> até  <?= str_replace('-', '/', date("d-m-Y", strtotime($dataFim))) ?>
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
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">PEDIDO</th> 
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">RECEBIMENTO</th>                
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">PRODUTO</th>
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">UN</th>
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">TIPO PRODUTO</th>   
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">QUANTIDADE</th> 
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">TOTAL</th>  
            </tr>
        </thead>
        <tbody>
            <?php foreach($lista_compra_detalhada as $key_compra_detalhada => $compra_detalhada) { ?>
            <tr>
                <td style="border: 1px solid">
                    <?= str_replace('-', '/', date("d-m-Y", strtotime($compra_detalhada->data_movimento))) ?>
                </td>
                <td style="border: 1px solid">
                    <?= $compra_detalhada->num_pedido_compra ?>
                </td>
                <td style="border: 1px solid">
                    <?= $compra_detalhada->cod_recebimento_material ?>
                </td> 
                <td style="border: 1px solid">
                    <?= $compra_detalhada->cod_produto ?> - <?= $compra_detalhada->nome_produto ?>
                </td> 
                <td style="border: 1px solid">
                    <?= $compra_detalhada->cod_unidade_medida ?>
                </td> 
                <td style="border: 1px solid">
                    <?= $compra_detalhada->nome_tipo_produto ?>
                </td> 
                <td style="border: 1px solid">
                    <?= number_format((float) ($compra_detalhada->quant_movimentada), 3, ',', '.') ?>
                </td>
                <td style="border: 1px solid">
                    R$ <?= number_format((float) ($compra_detalhada->valor_movimento), 2, ',', '.') ?>
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
    a.download = 'VTech - Compra Por Produto (Resumido).xls';
    a.click();
    e.preventDefault();
});

$("#btnExportProdutoDetalhado").click(function(e) {
    var a = document.createElement('a');
    var data_type = 'data:application/vnd.ms-excel';
    var table_div = document.getElementById('downloadXLSDetalhado');
    var table_html = table_div.outerHTML.replace(/ /g, '%20');
    a.href = data_type + ', ' + table_html;
    a.download = 'VTech - Compra Por Produto (Detalhado).xls';
    a.click();
    e.preventDefault();
});
</script>

<?php $this->load->view('gerais/footer'); ?>