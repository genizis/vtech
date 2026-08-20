<?php $this->load->view('gerais/header', $menu); ?>
<?php $this->load->view('gerais/menu', $menu); ?>

<section>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('visao-geral') ?>">Visão Geral</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('vendas') ?>">Vendas</a></li>
            <li class="breadcrumb-item active">Venda por Produto</a></li>
        </ol>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card  mb-3"> 
                    <h6 class="card-header bg-white text-muted">
                        Total por produto
                    </h6>                 
                    <div class="card-body">                        
                        <div class="tab-content" id="nav-tabContent">
                            <?php if($lista_produto != null) { ?>
                            <div class="row mb-3">
                                <div class="col-md-12 text-center">
                                    <canvas id="graph-produto"></canvas>
                                </div>
                            </div>
                            <?php } ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12 height-scroll-200">
                                            <table class="table table-borderless table-sm mb-0 small2">
                                                <tbody>
                                                    <?php foreach($lista_produto as $key_produto => $produto) { ?>
                                                    <tr>
                                                        <td class="text-left limit-text-30"><i
                                                                class="fa fa-circle fa-xs pr-2" style="color: <?= $produto->color ?>"></i>
                                                            <?= $produto->nome_produto ?>
                                                        </td>
                                                        <td class="text-right text-teal">
                                                        R$ <?= number_format($produto->valor_total, 2, ',', '.') ?>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <?php if ($lista_produto == false) { ?>
                                    <div class="text-center">
                                        <p class="text-muted mb-5 mt-5 font-italic ">Sem venda para o período
                                        </p>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <table class="table table-borderless table-sm mb-1">
                            <tbody>
                                <tr>
                                    <td class="text-left pt-0 text-dark"><strong>TOTAL VENDIDO</strong></td>
                                    <td class="text-right pt-0 <?php if($lista_valores->total_produto > 0) echo "text-teal"; ?>">
                                        <strong>
                                            R$ <?= number_format($lista_valores->total_produto, 2, ',', '.') ?>
                                        </strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <form action="<?= base_url('relatorios/venda-produto') ?>" method="get" class="mb-0 needs-validation"
                        novalidate>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input class="form-control" id="inputDataInicio" type="text" name="DataInicio"
                                            value="<?= str_replace('-', '/', date("d-m-Y", strtotime($dataInicio))) ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <input class="form-control" id="inputDataFim" type="text" name="DataFim"
                                            value="<?= str_replace('-', '/', date("d-m-Y", strtotime($dataFim))) ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <select id="inputProduto" name="produto[]" data-style="btn-input-primary" multiple
                                        data-actions-box="true" class="selectpicker show-tick form-control"
                                        data-live-search="true" data-actions-box="true" title="Produtos Vendidos">
                                        <?php $chave_produto = 0; foreach($lista_produto_vend as $key_produto_vend => $produto_vend) { ?>
                                        <option value="<?= $produto_vend->cod_produto ?>" <?php if($cod_produto != null){if($produto_vend->cod_produto == $cod_produto[$chave_produto]){ 
                                                if((count($cod_produto) - 1) > $chave_produto) {$chave_produto = $chave_produto + 1; } 
                                                echo "selected"; }}?>>
                                            <?= $produto_vend->cod_produto ?> -
                                            <?= $produto_vend->nome_produto ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-outline-primary btn-block"><i class="fa-solid fa-rotate"></i> Atualizar Dados</button>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <a href="<?= base_url() ?>" type="button" class="btn btn-outline-warning btn-block" id="btnExport"><i class="fa-regular fa-file-excel"></i> Exportar Excel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8 pl-0">
                <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="movimentacoes-tab" data-toggle="tab" href="#movimentacoes" role="tab" aria-controls="movimentacoes" aria-selected="true">Produtos Vendidos</a>
                    </li>
                </ul>
                <div class="card  mb-5">
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="movimentacoes" role="tabpanel" aria-labelledby="movimentacoes-tab">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-reporte">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col" class="text-center">Data</th>
                                                <th scope="col">Produto vendido</th>
                                                <th scope="col" class="text-center">Pedido / Caixa</th>
                                                <th scope="col" class="text-center">Venda</th>
                                                <th scope="col" class="text-right">Quantidade</th>
                                                <th scope="col" class="text-right">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-sm">
                                            <?php foreach($lista_venda_detalhada as $key_venda_detalhada => $venda_detalhada) { ?>
                                                <tr>
                                                    <td class="text-center align-middle">
                                                        <?= str_replace('-', '/', date("d-m-Y", strtotime($venda_detalhada->data_venda))) ?>                                                       
                                                    </td>
                                                    <td class="limit-text-40 align-middle align-middle" data-toggle="tooltip" data-placement="bottom" title="<?= $venda_detalhada->cod_produto ?> - <?= $venda_detalhada->nome_produto ?>">
                                                        <a href="#" data-toggle="modal" class="text-dark" data-target="#visualizar-produto<?php if($venda_detalhada->tipo_venda == "") echo "1" . $venda_detalhada->num_fat_prod; else echo "2" . $venda_detalhada->num_fat_prod; ?>"><?= $venda_detalhada->cod_produto ?> - <?= $venda_detalhada->nome_produto ?></a><br>
                                                        <span class="badge bg-info-light"><?= $venda_detalhada->tipo_venda ?></span>
                                                        <span class="badge font-italic text-muted"><?= $venda_detalhada->nome_cliente ?>
                                                            </span>
                                                    </td>
                                                    <td class="text-center align-middle"><?= $venda_detalhada->pedido ?></td>
                                                    <td class="text-center align-middle"><?= $venda_detalhada->venda ?></td>
                                                    <td class="text-right text-info align-middle">
                                                    <?= number_format($venda_detalhada->quant_venda, 3, ',', '.') ?> <?= $venda_detalhada->cod_unidade_medida ?>
                                                    </td>
                                                    <td class="text-right text-teal align-middle">
                                                        R$ <?= number_format($venda_detalhada->valor_venda, 2, ',', '.') ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php if ($lista_venda_detalhada == false) { ?>
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

<?php foreach ($lista_venda_detalhada as $key_produtos => $produto) { ?>
<div class="modal fade" id="visualizar-produto<?php if($produto->tipo_venda == "") echo "1" . $produto->num_fat_prod; else echo "2" . $produto->num_fat_prod; ?>">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Destalhes do produto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modal-body-scroll bg-light">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <p class="mb-1 font-weight-bold">Tipo de venda</p>
                                        <p><?= $produto->tipo_venda; ?></p>
                                    </div>
                                    <div class="col-md-4">
                                        <p class="mb-1 font-weight-bold">Pedido</p>
                                        <p><?= $produto->pedido; ?></p>
                                    </div>
                                    <div class="col-md-4">
                                        <p class="mb-1 font-weight-bold">Venda</p>
                                        <p><?= $produto->venda; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <p class="mb-1 font-weight-bold">Data da venda</p>
                                        <p><?= str_replace('-', '/', date("d-m-Y", strtotime($produto->data_venda))) ?></p>
                                    </div>
                                    <div class="col-md-8">
                                        <p class="mb-1 font-weight-bold">Cliente</p>
                                        <p><?= $produto->cod_cliente; ?> - <?= $produto->nome_cliente; ?></p>
                                    </div>
                                </div>
                                <hr class="mt-0">
                                <div class="row">
                                    <div class="col-md-8">
                                        <p class="mb-1 font-weight-bold">Produto</p>
                                        <p><?= $produto->cod_produto; ?> - <?= $produto->nome_produto; ?></p>
                                    </div>
                                    <div class="col-md-4">
                                        <p class="mb-1 font-weight-bold">Tipo produto</p>
                                        <p><?= $produto->nome_tipo_produto; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <p class="mb-1 font-weight-bold">Quantidade</p>
                                        <p class="text-info"><?= number_format($produto->quant_venda, 3, ',', '.') ?> <?= $produto->cod_unidade_medida ?></p>
                                    </div>
                                    <div class="col-md-4">
                                        <p class="mb-1 font-weight-bold">Preço de venda</p>
                                        <p class="text-dark">R$ <?= number_format($produto->preco_venda, 2, ',', '.') ?></p>
                                    </div>
                                    <div class="col-md-4">
                                        <p class="mb-1 font-weight-bold">Preço vendido</p>
                                        <p>
                                            <span class="text-teal">R$ <?= number_format($produto->valor_unitario, 2, ',', '.') ?></span>
                                            <?php if($produto->preco_venda != 0 && $produto->valor_unitario != $produto->preco_venda){ ?>
                                                <span class="badge <?php if(($produto->valor_unitario / $produto->preco_venda) > 1) echo "bg-teal-light"; else echo "bg-danger-light"; ?>">
                                                <?php if($produto->valor_unitario / $produto->preco_venda > 1) echo '<i class="fa-solid fa-arrow-up"></i>'; else echo '<i class="fa-solid fa-arrow-down"></i>'; ?> 
                                                <?php 
                                                    if($produto->valor_unitario > $produto->preco_venda)
                                                        echo number_format(($produto->valor_unitario / $produto->preco_venda * 100) - 100, 1, ',', '.');
                                                    else
                                                        echo number_format(100 - ($produto->valor_unitario / $produto->preco_venda * 100), 1, ',', '.');
                                                    ?>%
                                                </span>
                                            <?php } ?>
                                        </p>
                                    </div>                                    
                                </div>
                                <div class="row">                                    
                                    <div class="col-md-4">
                                        <p class="mb-1 font-weight-bold">Custo médio</p>
                                        <p class="text-dark">R$ <?= number_format($produto->custo_medio, 2, ',', '.') ?></p>
                                    </div>
                                    <div class="col-md-4">
                                        <p class="mb-1 font-weight-bold">Total vendido</p>
                                        <p class="text-teal">R$ <?= number_format($produto->valor_venda, 2, ',', '.') ?></p>
                                    </div>
                                    <div class="col-md-4">
                                        <p class="mb-1 font-weight-bold">Margem</p>
                                        <p class="text-dark"><?= number_format((($produto->valor_venda - ($produto->custo_medio *  $produto->quant_venda)) / $produto->valor_venda) * 100, 0, ',', '.') ?>%</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
<?php } ?>

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
                    Relatório detalhado de produtos vendidos: <?= str_replace('-', '/', date("d-m-Y", strtotime($dataInicio))) ?> até  <?= str_replace('-', '/', date("d-m-Y", strtotime($dataFim))) ?>
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
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">ORIGEM</th> 
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">PEDIDO / DATA CAIXA</th> 
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">FATURAMENTO / VENDA CAIXA</th>                
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">PRODUTO</th>
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">UN</th>
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">TIPO PRODUTO</th>   
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">QUANTIDADE</th> 
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">TOTAL</th>  
            </tr>
        </thead>
        <tbody>
            <?php foreach($lista_venda_detalhada as $key_venda_detalhada => $venda_detalhada) { ?>
            <tr>
                <td style="border: 1px solid">
                    <?= str_replace('-', '/', date("d-m-Y", strtotime($venda_detalhada->data_venda))) ?>
                </td>
                <td style="border: 1px solid">
                    <?= $venda_detalhada->tipo_venda ?>
                </td>
                <td style="border: 1px solid">
                    <?= $venda_detalhada->pedido ?>
                </td>
                <td style="border: 1px solid">
                    <?= $venda_detalhada->venda ?>
                </td> 
                <td style="border: 1px solid">
                    <?= $venda_detalhada->cod_produto ?> - <?= $venda_detalhada->nome_produto ?>
                </td> 
                <td style="border: 1px solid">
                    <?= $venda_detalhada->cod_unidade_medida ?>
                </td> 
                <td style="border: 1px solid">
                    <?= $venda_detalhada->nome_tipo_produto ?>
                </td> 
                <td style="border: 1px solid">
                    <?= number_format($venda_detalhada->quant_venda, 3, ',', '.') ?>
                </td>
                <td style="border: 1px solid">
                    R$ <?= number_format($venda_detalhada->valor_venda, 2, ',', '.') ?>
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

    $("#btnExport").click(function(e) {
        var a = document.createElement('a');
        var data_type = 'data:application/vnd.ms-excel';
        var table_div = document.getElementById('downloadXLSDetalhado');
        var table_html = table_div.outerHTML.replace(/ /g, '%20');
        a.href = data_type + ', ' + table_html;
        a.download = 'VTech - Venda Por Produto.xls';
        a.click();
        e.preventDefault();
    });

new Chart(document.getElementById("graph-produto"), {
    type: 'doughnut',
    data: {
        labels: <?php echo json_encode($label_produto); ?>,
        datasets: [{
            label: "Produtos vendidos",
            backgroundColor: <?php echo json_encode($color_produto); ?>,
            data: <?php echo json_encode($perc_produto); ?>
        }]
    },    
    options: {            
        responsive: true,        
        legend: {
            display: false,
        },
        pieceLabel: {
            mode: 'value'
        },
        plugins: {
            labels: {
                render: function (args) {
                    if(args.percentage <= 10){
                        return "";
                    }

                    return args.value.toLocaleString("pt-BR", {
                            style: "decimal",
                            minimumFractionDigits: 1,
                            maximumFractionDigits: 1
                    }) + "%";
                },
                fontColor: 'white',
            }
        },
        tooltips: {
            enabled: false,
        },        
        cutoutPercentage: 35,  
    }
    
});

</script>

<?php $this->load->view('gerais/footer'); ?>