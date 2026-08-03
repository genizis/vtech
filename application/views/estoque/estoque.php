<?php $this->load->view('gerais/header' , $menu); ?>
<?php $this->load->view('gerais/menu', $menu); ?>

<section>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('visao-geral') ?>">Visão Geral</a></li>
            <li class="breadcrumb-item active">Estoque</li>
        </ol>
    </div>
</section>


<section>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card  mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <a href="<?= base_url("estoque/{$mes_anterior}/{$ano_anterior}") ?>"
                                            class="btn btn-secondary link-load"><i class="fas fa-angle-left"></i></a>
                                    </div>
                                    <input type="text" class="form-control search text-center"
                                        value="<?= $descMes ?> de <?= $ano ?>" readonly>
                                    <div class="input-group-append">
                                        <a href="<?= base_url("estoque/{$mes_seguinte}/{$ano_seguinte}") ?>"
                                            class="btn btn-secondary link-load"><i class="fas fa-angle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card  mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <p class="card-text text-muted mb-0">Valor em estoque<br><span
                                        class="font-italic text-size-80">Por tipo de produto</span>
                                <p>
                            </div>
                        </div>
                        <?php if($valor_tipo_produto != null) { ?>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <canvas id="graph-tipo-produto" class=" mb-3" height="130"></canvas>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-borderless table-sm mb-0 small2">
                                    <tbody>
                                        <?php 
                                            foreach($valor_tipo_produto as $key_tipo_produto => $tipo) { ?>
                                        <tr>
                                            <td class="text-left limit-text-30"><i
                                                            class="fa fa-circle fa-xs pr-2"
                                                            style="color: <?= $tipo->color ?>"></i>
                                                <?= $tipo->nome_tipo_produto ?>
                                            </td>
                                            <td
                                                class="text-right <?php if($tipo->valor_estoque > 0) echo "text-teal"; ?>">
                                                R$ <?= number_format(($tipo->valor_estoque), 2, ',', '.') ?>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <table class="table table-borderless table-sm mb-0 mt-0 table-resultado">
                            <tbody>
                                <tr>
                                    <td class="text-left pt-0 text-dark"><strong>Total em estoque</strong></td>
                                    <td
                                        class="text-right pt-0 <?php if($total_tipo_produto > 0) echo "text-teal"; ?>">
                                        <strong>
                                            R$ <?= number_format($total_tipo_produto, 2, ',', '.') ?>
                                        </strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card  mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <p class="card-text text-muted ">Compras no ano<br><span
                                        class="font-italic text-size-80">Total comprado</span>
                                <p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center mb-2">
                                <canvas id="graph-compras-ano"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <table class="table table-borderless table-sm mb-0 mt-0 table-resultado">
                            <tbody>
                                <tr>
                                    <td class="text-left pt-0 text-dark"><strong>Total no ano</strong></td>
                                    <td
                                        class="text-right pt-0 <?php if($total_ano > 0) echo "text-info"; ?>">
                                        <strong>
                                            R$
                                            <?= number_format($total_ano, 2, ',', '.') ?>
                                        </strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4 pl-0">
                <div class="card  mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <p class="card-text text-muted mb-0">Variação do estoque no período<br><span
                                        class="font-italic text-size-80">Evolução por dia</span>
                                <p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <canvas id="graph-compras"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <table class="table table-borderless table-sm mb-0 mt-0 table-resultado">
                            <tbody>
                                <tr>
                                    <td class="text-left pt-0 text-dark"><strong>Total comprado</strong></td>
                                    <td
                                        class="text-right pt-0 <?php if($lista_recebimento->total_compras > 0) echo "text-info"; ?>">
                                        <strong>
                                            R$ <?= number_format($lista_recebimento->total_compras, 2, ',', '.') ?>
                                        </strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card  mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <p class="card-text text-muted mb-0">Comprado por Fornecedor<br><span
                                        class="font-italic text-size-80">Por valores</span>
                                <p>
                            </div>
                        </div>
                        <?php if($lista_fornecedor != null) { ?>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <canvas id="graph-fornecedor" class=" mb-3" height="130"></canvas>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12 height-scroll-200">
                                        <table class="table table-borderless table-sm mb-0 small2">
                                            <tbody>
                                                <?php foreach($lista_fornecedor as $key_fornecedor => $fornecedor) { ?>
                                                <tr>
                                                    <td class="text-left limit-text-30"><i
                                                            class="fa fa-circle fa-xs pr-2"
                                                            style="color: <?= $fornecedor->color ?>"></i>
                                                        <?= $fornecedor->nome_fornecedor ?>
                                                    </td>
                                                    <td class="text-right text-info">
                                                        R$ <?= number_format($fornecedor->total_compra + $fornecedor->total_frete +
                                                                         $fornecedor->total_seguro + $fornecedor->outras_despesas - 
                                                                         $fornecedor->total_desconto, 2, ',', '.') ?>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <?php if ($lista_fornecedor == false) { ?>
                                <div class="text-center">
                                    <p class="text-muted mb-0 font-italic ">Sem compra para o período
                                    </p>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <table class="table table-borderless table-sm mb-0 mt-0 table-resultado">
                            <tbody>
                                <tr>
                                    <td class="text-left pt-0 text-dark"><strong>Total</strong></td>
                                    <td
                                        class="text-right pt-0 <?php if($lista_recebimento->total_compras > 0) echo "text-info"; ?>">
                                        <strong>
                                            R$ <?= number_format($lista_recebimento->total_compras, 2, ',', '.') ?>
                                        </strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4 pl-0">
                <div class="card  mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <p class="card-text text-muted mb-0">Indicadores de compra<br><span
                                        class="font-italic text-size-80">Por valores</span>
                                <p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-borderless table-sm mb-0 small2">
                                    <tbody>
                                        <tr>
                                            <td class="text-left">
                                                Compras emitidas
                                            </td>
                                            <td
                                                class="text-right <?php if($totais_pedido->total_pedido > 0) echo "text-info"; ?>">
                                                R$ <?= number_format($totais_pedido->total_pedido, 2, ',', '.') ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">
                                                Compras realizadas
                                            </td>
                                            <td
                                                class="text-right <?php if($totais_pedido->total_recebido > 0) echo "text-teal"; ?>">
                                                R$ <?= number_format($totais_pedido->total_recebido, 2, ',', '.') ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">
                                                Compras pendentes
                                            </td>
                                            <td
                                                class="text-right <?php if($totais_pedido->total_pendente > 0) echo "text-muted"; ?>">
                                                R$ <?= number_format($totais_pedido->total_pendente, 2, ',', '.') ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card  mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <p class="card-text text-muted mb-0">Comprado por produto<br><span
                                        class="font-italic text-size-80">Por valores</span>
                                <p>
                            </div>
                        </div>
                        <?php if($lista_produto != null) { ?>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <canvas id="graph-produto" class=" mb-3" height="130"></canvas>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12 height-scroll-300">
                                        <table class="table table-borderless table-sm mb-0 small2">
                                            <tbody>
                                                <?php foreach($lista_produto as $key_produto => $produto) { ?>
                                                <tr>
                                                    <td class="text-left limit-text-30"><i
                                                            class="fa fa-circle fa-xs pr-2"
                                                            style="color: <?= $produto->color ?>"></i>
                                                        <?= $produto->nome_produto ?>
                                                    </td>
                                                    <td class="text-right text-info">
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
                                    <p class="text-muted mb-0 font-italic ">Sem venda para o período
                                    </p>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <table class="table table-borderless table-sm mb-0 mt-0 table-resultado">
                            <tbody>
                                <tr>
                                    <td class="text-left pt-0 text-dark"><strong>Total</strong></td>
                                    <td
                                        class="text-right pt-0 <?php if($lista_recebimento->total_produto > 0) echo "text-info"; ?>">
                                        <strong>
                                            R$ <?= number_format($lista_recebimento->total_produto, 2, ',', '.') ?>
                                        </strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<script>
$('.page-item>a').addClass("page-link");

$(function() {
    $.applyDataMask();
});

new Chart(document.getElementById("graph-tipo-produto"), {
    type: 'doughnut',
    data: {
        labels: <?php echo json_encode($label_tipo_produto); ?>,
        datasets: [{
            label: "Produtos vendidos",
            backgroundColor: <?php echo json_encode($color_tipo_produto); ?>,
            data: <?php echo json_encode($perc_tipo_produto); ?>
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
                render: function(args) {
                    if (args.percentage <= 10) {
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

new Chart(document.getElementById("graph-compras-ano"), {
    type: 'bar',
    data: {
        labels: <?php echo json_encode($label_mes); ?>,
        datasets: [{
                label: "Compras",
                backgroundColor: "#90a4ae",
                data: <?php echo json_encode($compra_mes); ?>,
                pointHitRadius: 30,
            }
        ]
    },
    options: {    
        plugins: {
            labels: {
                render: function(args) {

                    return "";

                    var compra = 0;

                    if(args.value >= 1000){

                        compra = args.value / 1000;
                        
                        return 'R$ ' + compra.toLocaleString("pt-BR", {
                            style: "decimal",
                            minimumFractionDigits: 0,
                            maximumFractionDigits: 0
                        }) + ' mil';
                    }else{

                        compra = args.value;

                        return 'R$ ' + compra.toLocaleString("pt-BR", {
                            style: "decimal",
                            minimumFractionDigits: 0,
                            maximumFractionDigits: 0
                        });
                    }                    
                },
            }
        },
        title: {
            display: false,
            text: ''
        },
        legend: {
            display: false
        },
        scales: {
            xAxes: [{
                stacked: true,
                gridLines: {
                    display: false,
                },
                ticks: {
                    callback: function(value, index, values) {
                        var mes = <?php echo json_encode($label_nome_mes); ?>;

                        return mes[index].substring(0, 3);
                    },
                }
            }],
            yAxes: [{                
                stacked: true,
                ticks: {
                    maxTicksLimit: 4,
                    beginAtZero: true,
                    fontSize: 11,
                    display: true,
                    mirror: true,
                    z: 1,
                    labelOffset: 10,
                    padding: 5,
                    maxRotation:0,
                    callback: function(value, index, values) {

                        if(value == 0){
                            return "";
                        }

                        var lbl = 0;

                        if(value >= 1000 || value <= -1000){

                            lbl = value / 1000;

                            return lbl.toLocaleString("pt-BR", {
                                style: "decimal",
                                minimumFractionDigits: 0,
                                maximumFractionDigits: 0
                            }) + ' mil';

                        }else{
                            lbl = value;

                            return lbl.toLocaleString("pt-BR", {
                                style: "decimal",
                                minimumFractionDigits: 0,
                                maximumFractionDigits: 0
                            });
                        }
                    },

                },
                gridLines: {
                    drawBorder: false,
                }
            }]
        },
        tooltips: {
            callbacks: {
                label: function(tooltipItem, data) {
                    var indice = tooltipItem.index;
                    return data.datasets[tooltipItem.datasetIndex].label + ": " + "R$ " + tooltipItem.yLabel
                        .toLocaleString("pt-BR", {
                            style: "decimal",
                            minimumFractionDigits: 2,
                            maximumFractionDigits: 2
                        });
                },
                title: function(tooltipItem, data) {
                    var indice = tooltipItem[0].index;
                    var mes = <?php echo json_encode($label_nome_mes); ?>;
                    var ano = <?php echo json_encode($label_ano); ?>;
                    return mes[indice] + " de " + ano[indice];
                }
            },
            displayColors: false,
        }

    }
});

new Chart(document.getElementById("graph-compras"), {
    type: 'line',
    data: {
        labels: <?php echo json_encode($dia); ?>,
        datasets: [{
            data: <?php echo json_encode($compra_dia); ?>,
            label: "Compras",
            borderColor: "#8E8C84",
            backgroundColor: "#8E8C84",
            fill: false,
            lineTension: 0.1,
            borderWidth: 3,
            pointHitRadius: 30,
            pointRadius: 0,
            pointHoverRadius: 0
        }]
    },
    options: {
        title: {
            display: false,
            text: ''
        },
        legend: {
            display: false
        },
        scales: {
            xAxes: [{
                stacked: true,
                gridLines: {
                    display: false,
                },
                ticks: {
                    display: false
                }
            }],
            yAxes: [{                
                ticks: {
                    maxTicksLimit: 4,
                    beginAtZero: true,
                    mirror: true,
                    fontSize: 11,
                    mirror: true,
                    labelOffset: 10,
                    padding: 5, 
                    z: 1,                                       
                    callback: function(value, index, values) {

                        if(value == 0){
                            return "";
                        }

                        var lbl = 0;

                        if(value >= 1000 || value <= -1000){

                            lbl = value / 1000;

                            return lbl.toLocaleString("pt-BR", {
                                style: "decimal",
                                minimumFractionDigits: 0,
                                maximumFractionDigits: 0
                            }) + ' mil';

                        }else{
                            lbl = value;

                            return lbl.toLocaleString("pt-BR", {
                                style: "decimal",
                                minimumFractionDigits: 0,
                                maximumFractionDigits: 0
                            });
                        }
                    },

                },
                gridLines: {
                    drawBorder: false,
                }
            }]
        },
        tooltips: {
            callbacks: {
                label: function(tooltipItem, data) {
                    var indice = tooltipItem.index;
                    return data.datasets[tooltipItem.datasetIndex].label + ": " + "R$ " + tooltipItem.yLabel
                        .toLocaleString("pt-BR", {
                            style: "decimal",
                            minimumFractionDigits: 2,
                            maximumFractionDigits: 2
                        });
                },
                title: function(tooltipItem, data) {
                    var indice = tooltipItem[0].index;
                    var dia = <?php echo json_encode($dia_nome); ?>;
                    var mes = <?php echo json_encode($nome_mes); ?>;
                    var ano = <?php echo json_encode($ano); ?>;
                    return dia[indice] + " de " + mes[indice];
                }
            },
            displayColors: false,
        }

    }
});

new Chart(document.getElementById("graph-fornecedor"), {
    type: 'doughnut',
    data: {
        labels: <?php echo json_encode($label_fornecedor); ?>,
        datasets: [{
            label: "Produtos vendidos",
            backgroundColor: <?php echo json_encode($color_fornecedor); ?>,
            data: <?php echo json_encode($perc_fornecedor); ?>
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
                render: function(args) {
                    if (args.percentage <= 10) {
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
                render: function(args) {
                    if (args.percentage <= 10) {
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