<?php $this->load->view('gerais/header' , $menu); ?>
<?php $this->load->view('gerais/menu', $menu); ?>

<section>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('visao-geral') ?>">Visão Geral</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('compras') ?>">Compras</a></li>
            <li class="breadcrumb-item active">Compra por Fornecedor</a></li>
        </ol>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="<?= base_url('relatorios/compra-fornecedor') ?>" method="get"
                    class="mb-0 needs-validation" novalidate>
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
                                    <label for="inputTipoProduto">Fornecedor</label>
                                    <select id="inputFornecedor" name="fornecedor[]" data-style="btn-input-primary" multiple
                                        data-actions-box="true" class="selectpicker show-tick form-control"
                                        data-live-search="true" data-actions-box="true" title="Fornecedores">
                                        <?php $chave_fornecedor = 0; foreach($lista_fornecedor as $key_fornecedor => $fornecedor) { ?>
                                        <option value="<?= $fornecedor->cod_fornecedor ?>" <?php if($cod_fornecedor != null){if($fornecedor->cod_fornecedor == $cod_fornecedor[$chave_fornecedor]){ 
                                        if((count($cod_fornecedor) - 1) > $chave_fornecedor) {$chave_fornecedor = $chave_fornecedor + 1; } 
                                        echo "selected"; }}?>>
                                            <?= $fornecedor->cod_fornecedor ?> -
                                            <?= $fornecedor->nome_fornecedor ?></option>
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
                            <div class="tab-pane fade show active" id="resumido" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="form-group col-md-2 mb-0">                                    
                                        <button type="button" id="btnExportFornecedorResumido" class="btn btn-outline-warning btn-block"><i class="fa-regular fa-file-excel"></i> Exportar Excel</button>
                                    </div> 
                                    <div class="form-group col-md-10 mb-0">                                    
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-reporte small2">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col" class="align-middle">Fornecedor</th>
                                                <th scope="col" class="text-center align-middle">CNPJ/CPF</th>
                                                <th scope="col" class="text-right align-middle" width="100">Total produtos</th>
                                                <th scope="col" class="text-right align-middle" width="100">Frete</th>
                                                <th scope="col" class="text-right align-middle" width="100">Seguro</th>
                                                <th scope="col" class="text-right align-middle" width="100">Out. desp.</th>
                                                <th scope="col" class="text-right align-middle" width="100">Desconto</th>
                                                <th scope="col" class="text-right align-middle" width="100">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($lista_fornecedor_resumida as $key_fornecedor_resumida => $fornecedor_resumida) { ?>
                                            <tr>
                                                <td class="align-middle"><?= $fornecedor_resumida->cod_fornecedor ?> -
                                                    <?= $fornecedor_resumida->nome_fornecedor ?></td>
                                                <td class="text-center align-middle"><?= $fornecedor_resumida->cnpj_cpf ?></td>
                                                <td class="text-right align-middle <?php if($fornecedor_resumida->total_produto > 0) echo "text-warning"; ?>">
                                                    R$ <?= number_format($fornecedor_resumida->total_produto, 2, ',', '.') ?>
                                                </td>
                                                <td class="text-right align-middle <?php if($fornecedor_resumida->total_frete > 0) echo "text-warning"; ?>">
                                                    R$ <?= number_format($fornecedor_resumida->total_frete, 2, ',', '.') ?>
                                                <td class="text-right align-middle <?php if($fornecedor_resumida->total_seguro > 0) echo "text-warning"; ?>">
                                                    R$ <?= number_format($fornecedor_resumida->total_seguro, 2, ',', '.') ?>
                                                <td class="text-right align-middle <?php if($fornecedor_resumida->outras_despesas > 0) echo "text-warning"; ?>">
                                                    R$ <?= number_format($fornecedor_resumida->outras_despesas, 2, ',', '.') ?>
                                                </td>
                                                <td class="text-right align-middle <?php if($fornecedor_resumida->total_desconto > 0) echo "text-teal"; ?>">
                                                    R$ <?= number_format($fornecedor_resumida->total_desconto, 2, ',', '.') ?>
                                                </td>
                                                <td class="text-right align-middle text-warning font-weight-bold">
                                                    R$ <?= number_format($fornecedor_resumida->total_produto + $fornecedor_resumida->total_frete - $fornecedor_resumida->total_desconto, 2, ',', '.') ?>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>                                
                                <?php if($lista_fornecedor_resumida == false) { ?>
                                    <div class="text-center text-muted">
                                        <p class="font-italic mt-3">Nenhuma informação encontrada</p>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="tab-pane fade" id="detalhado">
                                <div class="row">
                                    <div class="form-group col-md-2 mb-0">                                    
                                        <button type="button" id="btnExportFornecedorDetalhado" class="btn btn-outline-warning btn-block"><i class="fa-regular fa-file-excel"></i> Exportar Excel</button>
                                    </div> 
                                    <div class="form-group col-md-10 mb-0">                                    
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-reporte small2">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col" class="text-center align-middle">Data</th>
                                                <th scope="col" class="align-middle">Fornecedor</th>
                                                <th scope="col" class="text-center align-middle">Pedido</th>
                                                <th scope="col" class="text-right align-middle" width="100">Produtos</th>
                                                <th scope="col" class="text-right align-middle" width="100">Frete</th>
                                                <th scope="col" class="text-right align-middle" width="100">Seguro</th>
                                                <th scope="col" class="text-right align-middle" width="100">Out. desp.</th>
                                                <th scope="col" class="text-right align-middle" width="100">Desconto</th>
                                                <th scope="col" class="text-right align-middle" width="100">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($lista_fornecedor_detalhada as $key_fornecedor_detalhada => $fornecedor_detalhada) { ?>
                                            <tr>
                                                <td class="text-center">
                                                    <?= str_replace('-', '/', date("d-m-Y", strtotime($fornecedor_detalhada->data_recebimento))) ?>
                                                </td>
                                                <td><?= $fornecedor_detalhada->cod_fornecedor ?> -
                                                    <?= $fornecedor_detalhada->nome_fornecedor ?></td>
                                                <td class="text-center"><?= $fornecedor_detalhada->num_pedido_compra ?></td>
                                                <td class="text-right align-middle <?php if($fornecedor_detalhada->valor_bruto > 0) echo "text-warning"; ?>">
                                                    R$ <?= number_format($fornecedor_detalhada->valor_bruto, 2, ',', '.') ?>
                                                </td>
                                                <td class="text-right align-middle <?php if($fornecedor_detalhada->valor_frete > 0) echo "text-warning"; ?>">
                                                    R$ <?= number_format($fornecedor_detalhada->valor_frete, 2, ',', '.') ?>
                                                </td>
                                                <td class="text-right align-middle <?php if($fornecedor_detalhada->valor_seguro > 0) echo "text-warning"; ?>">
                                                    R$ <?= number_format($fornecedor_detalhada->valor_seguro, 2, ',', '.') ?>
                                                </td>
                                                <td class="text-right align-middle <?php if($fornecedor_detalhada->outras_despesas > 0) echo "text-warning"; ?>">
                                                    R$ <?= number_format($fornecedor_detalhada->outras_despesas, 2, ',', '.') ?>
                                                </td>
                                                <td class="text-right align-middle <?php if($fornecedor_detalhada->valor_desconto > 0) echo "text-teal"; ?>">
                                                    R$ <?= number_format($fornecedor_detalhada->valor_desconto, 2, ',', '.') ?>
                                                </td>
                                                <td class="text-right align-middle text-warning font-weight-bold">
                                                    R$ <?= number_format($fornecedor_detalhada->valor_bruto + $fornecedor_detalhada->valor_frete + $fornecedor_detalhada->valor_seguro + $fornecedor_detalhada->outras_despesas - $fornecedor_detalhada->valor_desconto, 2, ',', '.') ?>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php if($lista_fornecedor_detalhada == false) { ?>
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
                    Relatório resumido de compras para fornecedor: <?= str_replace('-', '/', date("d-m-Y", strtotime($dataInicio))) ?> até  <?= str_replace('-', '/', date("d-m-Y", strtotime($dataFim))) ?>
                </th>
            </tr> 
            <tr>
            </tr>
        </tbody>
    </table>
    <table>
        <thead>
            <tr>
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">FORNECEDOR</th> 
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">CNPJ/CPF</th>                
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">TOTAL PRODUTOS</th>
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">FRETE</th>
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">SEGURO</th>
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">OUTRAS DESPESAS</th>
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">DESCONTO</th>
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">TOTAL</th>   
            </tr>
        </thead>
        <tbody>
            <?php foreach($lista_fornecedor_resumida as $key_fornecedor_resumida => $fornecedor_resumida) { ?>
            <tr>
                <td style="border: 1px solid">
                    <?= $fornecedor_resumida->cod_fornecedor ?> - <?= $fornecedor_resumida->nome_fornecedor ?>
                </td> 
                <td style="border: 1px solid">
                    <?= $fornecedor_resumida->cnpj_cpf ?>
                </td> 
                <td style="border: 1px solid">
                    R$ <?= number_format($fornecedor_resumida->total_produto, 2, ',', '.') ?>
                </td> 
                <td style="border: 1px solid">
                    R$ <?= number_format($fornecedor_resumida->total_frete, 2, ',', '.') ?>
                </td> 
                <td style="border: 1px solid">
                    R$ <?= number_format($fornecedor_resumida->total_seguro, 2, ',', '.') ?>
                </td> 
                <td style="border: 1px solid">
                    R$ <?= number_format($fornecedor_resumida->outras_despesas, 2, ',', '.') ?>
                </td>
                <td style="border: 1px solid">
                    R$ <?= number_format($fornecedor_resumida->total_desconto, 2, ',', '.') ?>
                </td>
                <td style="border: 1px solid">
                    R$ <?= number_format($fornecedor_resumida->total_produto + $fornecedor_resumida->total_frete - $fornecedor_resumida->total_desconto, 2, ',', '.') ?>
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
                <th colspan="9" style="text-align: left; background-color: rgb(245, 245, 245)">
                    <h1><?= $empresa->nome_empresa ?></h1>
                </th>
            </tr> 
            <tr>
                <th colspan="9" style="text-align: left; background-color: rgb(245, 245, 245)">
                    Relatório detalhado de compras para fornecedor: <?= str_replace('-', '/', date("d-m-Y", strtotime($dataInicio))) ?> até  <?= str_replace('-', '/', date("d-m-Y", strtotime($dataFim))) ?>
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
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">FORNECEDOR</th> 
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">COMPRA</th>                
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">TOTAL PRODUTOS</th>
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">FRETE</th>
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">SEGURO</th>
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">OUTRAS DESPESAS</th>
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">DESCONTO</th>
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">TOTAL</th>   
            </tr>
        </thead>
        <tbody>
            <?php foreach($lista_fornecedor_detalhada as $key_fornecedor_detalhada => $fornecedor_detalhada) { ?>
            <tr>
                <td style="border: 1px solid">
                    <?= str_replace('-', '/', date("d-m-Y", strtotime($fornecedor_detalhada->data_recebimento))) ?>
                </td>
                <td style="border: 1px solid">
                    <?= $fornecedor_detalhada->cod_fornecedor ?> - <?= $fornecedor_detalhada->nome_fornecedor ?>
                </td>
                <td style="border: 1px solid">
                    <?= $fornecedor_detalhada->num_pedido_compra ?>
                </td>
                <td style="border: 1px solid">
                    R$ <?= number_format($fornecedor_detalhada->valor_bruto, 2, ',', '.') ?>
                </td> 
                <td style="border: 1px solid">
                    R$ <?= number_format($fornecedor_detalhada->valor_frete, 2, ',', '.') ?>
                </td> 
                <td style="border: 1px solid">
                    R$ <?= number_format($fornecedor_detalhada->valor_seguro, 2, ',', '.') ?>
                </td> 
                <td style="border: 1px solid">
                    R$ <?= number_format($fornecedor_detalhada->outras_despesas, 2, ',', '.') ?>
                </td> 
                <td style="border: 1px solid">
                    R$ <?= number_format($fornecedor_detalhada->valor_desconto, 2, ',', '.') ?>
                </td>
                <td style="border: 1px solid">
                    R$ <?= number_format($fornecedor_detalhada->valor_bruto + $fornecedor_detalhada->valor_frete + $fornecedor_detalhada->valor_seguro + $fornecedor_detalhada->outras_despesas - $fornecedor_detalhada->valor_desconto, 2, ',', '.') ?>
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

$("#btnExportFornecedorResumido").click(function(e) {
    var a = document.createElement('a');
    var data_type = 'data:application/vnd.ms-excel';
    var table_div = document.getElementById('downloadXLSResumido');
    var table_html = table_div.outerHTML.replace(/ /g, '%20');
    a.href = data_type + ', ' + table_html;
    a.download = 'ShopFloor - Compra Por Fornecedor (Resumido).xls';
    a.click();
    e.preventDefault();
});

$("#btnExportFornecedorDetalhado").click(function(e) {
    var a = document.createElement('a');
    var data_type = 'data:application/vnd.ms-excel';
    var table_div = document.getElementById('downloadXLSDetalhado');
    var table_html = table_div.outerHTML.replace(/ /g, '%20');
    a.href = data_type + ', ' + table_html;
    a.download = 'ShopFloor - Compra Por Fornecedor (Detalhado).xls';
    a.click();
    e.preventDefault();
});
</script>

<?php $this->load->view('gerais/footer'); ?>