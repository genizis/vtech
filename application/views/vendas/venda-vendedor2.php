<?php $this->load->view('gerais/header' , $menu); ?>
<?php $this->load->view('gerais/menu', $menu); ?>

<section>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('visao-geral') ?>">Visão Geral</a></li>
            <li class="breadcrumb-item active">Venda por Vendedor</a></li>
        </ol>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="<?= base_url('relatorios/venda-vendedor') ?>" method="get" class="mb-0 needs-validation" novalidate>
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
                                    <label for="inputTipoProduto">Vendedor</label>
                                    <select id="inputVendedor" name="vendedor[]" data-style="btn-input-primary" multiple
                                        data-actions-box="true" class="selectpicker show-tick form-control"
                                        data-live-search="true" data-actions-box="true" title="Vendedores">
                                        <?php $chave_vendedor = 0; foreach($lista_vendedor as $key_vendedor => $vendedor) { ?>
                                        <option value="<?= $vendedor->cod_vendedor ?>" <?php if($cod_vendedor != null){if($vendedor->cod_vendedor == $cod_vendedor[$chave_vendedor]){ 
                                        if((count($cod_vendedor) - 1) > $chave_vendedor) {$chave_vendedor = $chave_vendedor + 1; } 
                                        echo "selected"; }}?>>
                                            <?= $vendedor->cod_vendedor ?> -
                                            <?= $vendedor->nome_vendedor ?></option>
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
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#resumida" role="tab"
                            aria-controls="home" aria-selected="true">Venda Resumida</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#cliente" role="tab"
                            aria-controls="profile" aria-selected="false">Venda por Cliente</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#produto" role="tab"
                            aria-controls="profile" aria-selected="false">Venda por Produto</a>
                    </li>
                </ul>
                <div class="card  mb-5">
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="resumida">
                                <div class="row">
                                    <div class="form-group col-md-2 mb-0">                                    
                                        <button type="button" id="btnExportVendedorResumido" class="btn btn-outline-warning btn-block"><i class="fa-regular fa-file-excel"></i> Exportar Excel</button>
                                    </div> 
                                    <div class="form-group col-md-10 mb-0">                                    
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-reporte small2">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">Vendedor</th>
                                                <th scope="col" class="text-right">Valor vendido</th>
                                                <th scope="col" class="text-right">Valor comissão</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($lista_vendedor_resumida as $key_vendedor_resumida => $vendedor_resumida) { ?>
                                            <tr>
                                                <td><?= $vendedor_resumida->cod_vendedor ?> -
                                                    <?= $vendedor_resumida->nome_vendedor ?>
                                                </td>
                                                <td class="text-right <?php if($vendedor_resumida->total_venda > 0) echo "text-teal"; ?>">
                                                    R$ <?= number_format($vendedor_resumida->total_venda, 2, ',', '.') ?>
                                                </td>
                                                <td class="text-right <?php if($vendedor_resumida->total_comissao > 0) echo "text-info"; ?>">
                                                    R$ <?= number_format($vendedor_resumida->total_comissao, 2, ',', '.') ?>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php if($lista_vendedor_resumida == false) { ?>
                                <div class="text-center text-muted">
                                    <p class="font-italic mt-3">Nenhuma informação encontrada</p>
                                </div>
                                <?php } ?>
                            </div>
                            <div class="tab-pane fade" id="cliente">
                                <div class="row">
                                    <div class="form-group col-md-2 mb-0">                                    
                                        <button type="button" id="btnExportVendedorCliente" class="btn btn-outline-warning btn-block"><i class="fa-regular fa-file-excel"></i> Exportar Excel</button>
                                    </div> 
                                    <div class="form-group col-md-10 mb-0">                                    
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-reporte small2">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col" class="text-center">Data</th>
                                                <th scope="col">Vendedor</th>   
                                                <th scope="col">Cliente</th>                                           
                                                <th scope="col" class="text-center">Pedido</th>
                                                <th scope="col" class="text-center">Faturamento</th>
                                                <th scope="col" class="text-right">Total venda</th>
                                                <th scope="col" class="text-right">Perc comissão</th>
                                                <th scope="col" class="text-right">Total comissão</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($lista_vendedor_cliente as $key_vendedor_cliente => $vendedor_cliente) { ?>
                                            <tr>
                                                <td class="text-center">
                                                    <?= str_replace('-', '/', date("d-m-Y", strtotime($vendedor_cliente->data_faturamento))) ?>
                                                </td>
                                                <td><?= $vendedor_cliente->cod_vendedor ?> -
                                                    <?= $vendedor_cliente->nome_vendedor ?>
                                                </td>    
                                                <td><?= $vendedor_cliente->cod_cliente ?> -
                                                    <?= $vendedor_cliente->nome_cliente ?>
                                                </td>                                         
                                                <td class="text-center"><?= $vendedor_cliente->num_pedido_venda ?></td>
                                                <td class="text-center"><?= $vendedor_cliente->cod_faturamento_pedido ?></td>
                                                <td class="text-right <?php if($vendedor_cliente->total_venda > 0) echo "text-teal"; ?>">
                                                    R$ <?= number_format($vendedor_cliente->total_venda, 2, ',', '.') ?>
                                                </td>
                                                <td class="text-right ">
                                                    <?= number_format($vendedor_cliente->perc_comissao, 2, ',', '.') ?>%
                                                </td>
                                                <td class="text-right <?php if($vendedor_cliente->total_comissao > 0) echo "text-info"; ?>">
                                                    R$ <?= number_format($vendedor_cliente->total_comissao, 2, ',', '.') ?>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php if($lista_vendedor_cliente == false) { ?>
                                <div class="text-center text-muted">
                                    <p class="font-italic mt-3">Nenhuma informação encontrada</p>
                                </div>
                                <?php } ?>
                            </div>
                            <div class="tab-pane fade" id="produto">
                                <div class="row">
                                    <div class="form-group col-md-2 mb-0">                                    
                                        <button type="button" id="btnExportVendedorProduto" class="btn btn-outline-warning btn-block"><i class="fa-regular fa-file-excel"></i> Exportar Excel</button>
                                    </div> 
                                    <div class="form-group col-md-10 mb-0">                                    
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-reporte small2">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col" class="text-center">Data</th>
                                                <th scope="col">Vendedor</th>   
                                                <th scope="col">Cliente</th> 
                                                <th scope="col">Produto</th>
                                                <th scope="col" class="text-right">Quantidade</th>
                                                <th scope="col" class="text-right">Valor unit</th>
                                                <th scope="col" class="text-right">Total produto</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($lista_vendedor_produto as $key_vendedor_produto => $vendedor_produto) { ?>
                                            <tr>
                                                <td class="text-center">
                                                    <?= str_replace('-', '/', date("d-m-Y", strtotime($vendedor_produto->data_faturamento))) ?>
                                                </td>
                                                <td><?= $vendedor_produto->cod_vendedor ?> -
                                                    <?= $vendedor_produto->nome_vendedor ?>
                                                </td>    
                                                <td><?= $vendedor_produto->cod_cliente ?> -
                                                    <?= $vendedor_produto->nome_cliente ?>
                                                </td>                                         
                                                <td class="text-left">
                                                    <?= $vendedor_produto->cod_produto ?> - <?= $vendedor_produto->nome_produto ?>
                                                </td>
                                                <td class="text-right <?php if($vendedor_produto->quantidade > 0) echo "text-info"; ?>">
                                                    <?= number_format($vendedor_produto->quantidade, 3, ',', '.') ?> <?= $vendedor_produto->cod_unidade_medida ?>
                                                </td>    
                                                <td class="text-right text-dark">
                                                    R$ <?= number_format($vendedor_produto->valor_unitario, 2, ',', '.') ?>
                                                </td>                                        
                                                <td class="text-right text-teal">
                                                    R$ <?= number_format($vendedor_produto->quantidade * $vendedor_produto->valor_unitario, 2, ',', '.') ?>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php if($lista_vendedor_produto == false) { ?>
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
                <th colspan="3" style="text-align: left; background-color: rgb(245, 245, 245)">
                    <h1><?= $empresa->nome_empresa ?></h1>
                </th>
            </tr> 
            <tr>
                <th colspan="3" style="text-align: left; background-color: rgb(245, 245, 245)">
                    Relatório resumido de vendas por vendedor: <?= str_replace('-', '/', date("d-m-Y", strtotime($dataInicio))) ?> até  <?= str_replace('-', '/', date("d-m-Y", strtotime($dataFim))) ?>
                </th>
            </tr> 
            <tr>
            </tr>
        </tbody>
    </table>
    <table>
        <thead>
            <tr>
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">VENDEDOR</th> 
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">VALOR VENDIDO</th>                
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">COMISSÃO</th>  
            </tr>
        </thead>
        <tbody>
            <?php foreach($lista_vendedor_resumida as $key_vendedor_resumida => $vendedor_resumida) { ?>
            <tr>
                <td style="border: 1px solid">
                    <?= $vendedor_resumida->cod_vendedor ?> - <?= $vendedor_resumida->nome_vendedor ?>
                </td>
                <td style="border: 1px solid">
                    R$ <?= number_format($vendedor_resumida->total_venda, 2, ',', '.') ?>
                </td> 
                <td style="border: 1px solid">
                    R$ <?= number_format($vendedor_resumida->total_comissao, 2, ',', '.') ?>
                </td> 
            </tr>
            <?php } ?>
        </tbody>
    </table>
</iframe>

<iframe id="downloadXLSCliente" style="display:none">
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
                    Relatório das vendas de vendedores por cliente: <?= str_replace('-', '/', date("d-m-Y", strtotime($dataInicio))) ?> até  <?= str_replace('-', '/', date("d-m-Y", strtotime($dataFim))) ?>
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
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">VENDEDOR</th>                
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">CLIENTE</th> 
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">PEDIDO</th>  
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">FATURAMENTO</th>  
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">TOTAL VENDA</th>  
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">PERC COMISSÃO</th>  
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">TOTAL COMISSÃO</th>   
            </tr>
        </thead>
        <tbody>
            <?php foreach($lista_vendedor_cliente as $key_vendedor_cliente => $vendedor_cliente) { ?>
            <tr>
                <td style="border: 1px solid">
                    <?= str_replace('-', '/', date("d-m-Y", strtotime($vendedor_cliente->data_faturamento))) ?>
                </td>
                <td style="border: 1px solid">
                    <?= $vendedor_cliente->cod_vendedor ?> - <?= $vendedor_cliente->nome_vendedor ?>
                </td> 
                <td style="border: 1px solid">
                    <?= $vendedor_cliente->cod_cliente ?> - <?= $vendedor_cliente->nome_cliente ?>
                </td> 
                <td style="border: 1px solid">
                    <?= $vendedor_cliente->num_pedido_venda ?>
                </td> 
                <td style="border: 1px solid">
                    <?= $vendedor_cliente->cod_faturamento_pedido ?>
                </td> 
                <td style="border: 1px solid">
                    R$ <?= number_format($vendedor_cliente->total_venda, 2, ',', '.') ?>
                </td> 
                <td style="border: 1px solid">
                    <?= number_format($vendedor_cliente->perc_comissao, 2, ',', '.') ?>%
                </td> 
                <td style="border: 1px solid">
                    R$ <?= number_format($vendedor_cliente->total_comissao, 2, ',', '.') ?>
                </td> 
            </tr>
            <?php } ?>
        </tbody>
    </table>
</iframe>

<iframe id="downloadXLSProduto" style="display:none">
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
                    Relatório das vendas de vendedores por produto: <?= str_replace('-', '/', date("d-m-Y", strtotime($dataInicio))) ?> até  <?= str_replace('-', '/', date("d-m-Y", strtotime($dataFim))) ?>
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
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">VENDEDOR</th>                
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">CLIENTE</th> 
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">PRODUTO</th> 
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">UN</th> 
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">QUANTIDADE</th>  
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">VALOR UNITÁRIO</th>  
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">TOTAL PRODUTO</th>   
            </tr>
        </thead>
        <tbody>
            <?php foreach($lista_vendedor_produto as $key_vendedor_produto => $vendedor_produto) { ?>
            <tr>
                <td style="border: 1px solid">
                    <?= str_replace('-', '/', date("d-m-Y", strtotime($vendedor_produto->data_faturamento))) ?>
                </td>
                <td style="border: 1px solid">
                    <?= $vendedor_produto->cod_vendedor ?> - <?= $vendedor_produto->nome_vendedor ?>
                </td> 
                <td style="border: 1px solid">
                    <?= $vendedor_produto->cod_cliente ?> - <?= $vendedor_produto->nome_cliente ?>
                </td> 
                <td style="border: 1px solid">
                    <?= $vendedor_produto->cod_produto ?> - <?= $vendedor_produto->nome_produto ?>
                </td> 
                <td style="border: 1px solid">
                    <?= $vendedor_produto->cod_unidade_medida ?>
                </td> 
                <td style="border: 1px solid">
                    <?= number_format($vendedor_produto->quantidade, 3, ',', '.') ?>
                </td> 
                <td style="border: 1px solid">
                    R$ <?= number_format($vendedor_produto->valor_unitario, 2, ',', '.') ?>
                </td> 
                <td style="border: 1px solid">
                    R$ <?= number_format($vendedor_produto->quantidade * $vendedor_produto->valor_unitario, 2, ',', '.') ?>
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

$("#btnExportVendedorResumido").click(function(e) {
    var a = document.createElement('a');
    var data_type = 'data:application/vnd.ms-excel';
    var table_div = document.getElementById('downloadXLSResumido');
    var table_html = table_div.outerHTML.replace(/ /g, '%20');
    a.href = data_type + ', ' + table_html;
    a.download = 'VTech - Venda Por Vendedor (Resumido).xls';
    a.click();
    e.preventDefault();
});

$("#btnExportVendedorCliente").click(function(e) {
    var a = document.createElement('a');
    var data_type = 'data:application/vnd.ms-excel';
    var table_div = document.getElementById('downloadXLSCliente');
    var table_html = table_div.outerHTML.replace(/ /g, '%20');
    a.href = data_type + ', ' + table_html;
    a.download = 'VTech - Venda Por Vendedor (Cliente).xls';
    a.click();
    e.preventDefault();
});

$("#btnExportVendedorProduto").click(function(e) {
    var a = document.createElement('a');
    var data_type = 'data:application/vnd.ms-excel';
    var table_div = document.getElementById('downloadXLSProduto');
    var table_html = table_div.outerHTML.replace(/ /g, '%20');
    a.href = data_type + ', ' + table_html;
    a.download = 'VTech - Venda Por Vendedor (Produto).xls';
    a.click();
    e.preventDefault();
});
</script>

<?php $this->load->view('gerais/footer'); ?>