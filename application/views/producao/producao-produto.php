<?php $this->load->view('gerais/header', $menu); ?>
<?php $this->load->view('gerais/menu', $menu); ?>

<section>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('visao-geral') ?>">Visão Geral</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('producao') ?>">Produção</a></li>
            <li class="breadcrumb-item active">Produção por Produto</a></li>
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
                            <?php if($lista_producao_resumida != null) { ?>
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
                                                    <?php foreach($lista_producao_resumida as $key_produto => $produto) { ?>
                                                    <tr>
                                                        <td class="text-left limit-text-30"><i
                                                                class="fa fa-circle fa-xs pr-2" style="color: <?= $produto->color ?>"></i>
                                                            <?= $produto->nome_produto ?>
                                                        </td>
                                                        <td class="text-right text-danger">
                                                        R$ <?= number_format((float) ($produto->custo_total), 2, ',', '.') ?>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <?php if ($lista_producao_resumida == false) { ?>
                                    <div class="text-center">
                                        <p class="text-muted mb-5 mt-5 font-italic ">Sem produção para o período
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
                                    <td class="text-left pt-0 text-dark"><strong>CUSTO TOTAL</strong></td>
                                    <td class="text-right pt-0 <?php if($total_producao->custo_total > 0) echo "text-danger"; ?>">
                                        <strong>
                                            R$ <?= number_format((float) ($total_producao->custo_total), 2, ',', '.') ?>
                                        </strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <form action="<?= base_url('relatorios/producao-produto') ?>" method="get" class="mb-0 needs-validation"
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
                                        data-live-search="true" data-actions-box="true" title="Produtos Produzidos">
                                        <?php $chave_produto = 0; foreach($lista_produto_prod as $key_produto_prod => $produto_prod) { ?>
                                        <option value="<?= $produto_prod->cod_produto ?>" <?php if($cod_produto != null){if($produto_prod->cod_produto == $cod_produto[$chave_produto]){ 
                                        if((count($cod_produto) - 1) > $chave_produto) {$chave_produto = $chave_produto + 1; } 
                                        echo "selected"; }}?>>
                                            <?= $produto_prod->cod_produto ?> -
                                            <?= $produto_prod->nome_produto ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-outline-primary btn-block" name="acao" value="1"><i class="fa-solid fa-rotate"></i> Atualizar Dados</button>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-outline-warning btn-block no-spinner" name="acao" value="2"><i class="fa-regular fa-file-excel"></i> Exportar Excel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8 pl-0">
                <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="movimentacoes-tab" data-toggle="tab" href="#movimentacoes" role="tab" aria-controls="movimentacoes" aria-selected="true">Produtos Produzidos</a>
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
                                                <th scope="col" class="text-center">Ordem</th>
                                                <th scope="col">Produto</th>
                                                <th scope="col" class="text-center">Hrs Trab.</th>
                                                <th scope="col" class="text-right">Produção</th>
                                                <th scope="col" class="text-right">Perca</th>
                                                <th scope="col" class="text-right">Custo produção</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-sm">
                                            <?php foreach($lista_producao_detalhada as $key_producao_detalhada => $producao_detalhada) { ?>
                                                <tr>
                                                    <td class="text-center align-middle">
                                                        <?= str_replace('-', '/', date("d-m-Y", strtotime($producao_detalhada->data_reporte))) ?>                                                     
                                                    </td>
                                                    <td class="text-center align-middle"><?= $producao_detalhada->num_ordem_producao ?></td>
                                                    <td class="limit-text-40 align-middle align-middle" data-toggle="tooltip" data-placement="bottom" title="<?= $producao_detalhada->cod_produto ?> - <?= $producao_detalhada->nome_produto ?>">
                                                        <a href="#" data-toggle="modal" class="text-dark" data-target="#visualizar-produto<?= $producao_detalhada->cod_reporte_producao ?>"><?= $producao_detalhada->cod_produto ?> - <?= $producao_detalhada->nome_produto ?></a><br>
                                                        <span class="badge bg-info-light"><?= $producao_detalhada->nome_tipo_produto ?></span>
                                                        
                                                    </td>
                                                    <td class="text-center align-middle"><?= number_format((float) ($producao_detalhada->horas_trabalhadas), 2, ',', '.') ?> h</td>
                                                    <td
                                                        class="text-right align-middle <?php if($producao_detalhada->quant_reportada > 0) echo "text-info"; ?>">
                                                        <?= number_format((float) ($producao_detalhada->quant_reportada), 3, ',', '.') ?> <?= $producao_detalhada->cod_unidade_medida ?>
                                                    </td>
                                                    <td
                                                        class="text-right align-middle <?php if($producao_detalhada->quant_perdida > 0) echo "text-warning"; ?>">
                                                        <?= number_format((float) ($producao_detalhada->quant_perdida), 3, ',', '.') ?> <?= $producao_detalhada->cod_unidade_medida ?>
                                                    </td>
                                                    <td
                                                        class="text-right align-middle <?php if(($producao_detalhada->custo_mob + $producao_detalhada->custo_producao) > 0) echo "text-danger"; ?>">
                                                        R$ <?= number_format((float) ($producao_detalhada->custo_mob + $producao_detalhada->custo_producao), 2, ',', '.') ?><br>
                                                        
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php if ($lista_producao_detalhada == false) { ?>
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

<?php foreach ($lista_producao_detalhada as $key_produtos => $produto) { ?>
<div class="modal fade" id="visualizar-produto<?= $produto->cod_reporte_producao ?>">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Destalhes do produto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modal-body-scroll bg-light">
                <div class="row mb-3">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <p class="mb-1 font-weight-bold">Data do reporte</p>
                                        <p><?= str_replace('-', '/', date("d-m-Y", strtotime($produto->data_reporte))) ?></p>
                                    </div>
                                    <div class="col-md-4">
                                        <p class="mb-1 font-weight-bold">Reporte de produção</p>
                                        <p><?= $produto->cod_reporte_producao; ?></p>
                                    </div>
                                    <div class="col-md-4">
                                        <p class="mb-1 font-weight-bold">Ordem de produção</p>
                                        <p><?= $produto->num_ordem_producao; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    
                                    <div class="col-md-8">
                                        <p class="mb-1 font-weight-bold">Produto</p>
                                        <p><?= $produto->cod_produto; ?> - <?= $produto->nome_produto; ?></p>
                                    </div>
                                    <div class="col-md-4">
                                        <p class="mb-1 font-weight-bold">Tipo de produto</p>
                                        <p><?= $producao_detalhada->nome_tipo_produto ?></p>
                                    </div>
                                </div>
                                <hr class="mt-0">
                                <div class="row">
                                    <div class="col-md-4">
                                        <p class="mb-1 font-weight-bold">Quant produzida</p>
                                        <p class="text-info"><?= number_format((float) ($produto->quant_reportada), 3, ',', '.') ?> <?= $produto->cod_unidade_medida ?></p>
                                    </div>
                                    <div class="col-md-4">
                                        <p class="mb-1 font-weight-bold">Quant perdida</p>
                                        <p class="text-warning"><?= number_format((float) ($produto->quant_perdida), 3, ',', '.') ?> <?= $produto->cod_unidade_medida ?></p>
                                    </div>
                                    <div class="col-md-4">
                                        <p class="mb-1 font-weight-bold">Horas trabalhadas</p>
                                        <p> <?= number_format((float) ($produto->horas_trabalhadas), 2, ',', '.') ?> h</p>
                                    </div>                                    
                                </div>
                                <div class="row">                                    
                                    <div class="col-md-4">
                                        <p class="mb-1 font-weight-bold">Custo MOB</p>
                                        <p class="text-dark">R$ <?= number_format((float) ($produto->custo_mob), 2, ',', '.') ?></p>
                                    </div>
                                    <div class="col-md-4">
                                        <p class="mb-1 font-weight-bold">Custo MAT</p>
                                        <p class="text-dark">R$ <?= number_format((float) ($produto->custo_producao), 2, ',', '.') ?></p>
                                    </div>
                                    <div class="col-md-4">
                                        <p class="mb-1 font-weight-bold">Custo total</p>
                                        <p class="text-danger">R$ <?= number_format((float) ($produto->custo_mob + $produto->custo_producao), 2, ',', '.') ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="mb-1 font-weight-bold">Produtos consumidos</p>
                                    </div>
                                    <div class="col-md-12">
                                        <table class="table table-bordered">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th scope="col">Produto</th>
                                                    <th scope="col">Tipo produto</th>
                                                    <th scope="col" class="text-right">Consumo</th>
                                                    <th scope="col" class="text-right">Custo</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    $i = 0;
                                                    foreach($lista_consumo_detalhado as $key_consumo_detalhado => $consumo_detalhado) { 
                                                        if($consumo_detalhado->cod_reporte_producao == $produto->cod_reporte_producao) { $i = $i + 1; ?>
                                                <tr>
                                                    <td scope="row" class="limit-text-40 align-middle" data-toggle="tooltip" data-placement="bottom" title="<?= $consumo_detalhado->cod_produto ?> - <?= $consumo_detalhado->nome_produto ?>">
                                                        <?= $consumo_detalhado->cod_produto ?> - <?= $consumo_detalhado->nome_produto ?>
                                                    </td>                                            
                                                    <td class="align-middle"><?= $consumo_detalhado->nome_tipo_produto ?></td>
                                                    <td
                                                        class="align-middle text-right <?php if($consumo_detalhado->quant_movimentada > 0) echo "text-warning"; ?>">
                                                        <?= number_format((float) ($consumo_detalhado->quant_movimentada), 3, ',', '.') ?> <?= $consumo_detalhado->cod_unidade_medida ?>
                                                    </td>
                                                    <td
                                                        class="align-middle text-right <?php if($consumo_detalhado->valor_movimento > 0) echo "text-danger"; ?>">
                                                        R$ <?= number_format((float) ($consumo_detalhado->valor_movimento), 2, ',', '.') ?>
                                                    </td>
                                                </tr>
                                                <?php }} ?>
                                            </tbody>
                                        </table>
                                        <?php if ($i == 0) { ?>
                                        <div class="text-center text-muted">
                                            <p class="font-italic mt-3">Nenhum produto consumido</p>
                                        </div>
                                        <?php } ?>
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