<?php $this->load->view('gerais/header' , $menu); ?>
<?php $this->load->view('gerais/menu', $menu); ?>

<section>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('visao-geral') ?>">Visão Geral</a></li>
            <li class="breadcrumb-item active">Produção</li>
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
                                        <a href="<?= base_url("producao/{$mes_anterior}/{$ano_anterior}") ?>"
                                            class="btn btn-secondary"><i class="fas fa-angle-left"></i></a>
                                    </div>
                                    <input type="text" class="form-control search text-center filtro-data"
                                        value="<?= $descMes ?> de <?= $ano ?>" readonly>
                                    <div class="input-group-append">
                                        <a href="<?= base_url("producao/{$mes_seguinte}/{$ano_seguinte}") ?>"
                                            class="btn btn-secondary"><i class="fas fa-angle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card  mb-3">
                    <h6 class="card-header bg-white text-muted">
                        Ordens emitidas<br>
                        <span class="font-italic text-size-80">Por status</span>
                    </h6>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-borderless table-sm small2">
                                    <tbody>
                                        <tr>
                                            <td class="text-left"><i class="fa fa-circle fa-xs text-teal pr-2"></i>
                                                Produzido total
                                            </td>
                                            <td class="text-right">
                                                <?= $lista_status->produzido_total ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left"><i class="fa fa-circle fa-xs text-info pr-2"></i>
                                                Produzido parcial</td>
                                            <td class="text-right">
                                                <?= $lista_status->produzido_parcial ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left"><i class="fa fa-circle fa-xs text-secondary pr-2"></i>
                                                Pendentes</td>
                                            <td class="text-right">
                                                <?= $lista_status->pendente ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left"><i class="fa fa-circle fa-xs text-danger pr-2"></i>
                                                Atrasadas</td>
                                            <td class="text-right">
                                                <?= $lista_status->atrasado ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left"><i class="fa fa-circle fa-xs text-dark pr-2"></i>
                                                Estornadas</td>
                                            <td class="text-right">
                                                <?= $lista_status->estornado ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <table class="table table-borderless table-sm mb-1">
                            <tbody>
                                <tr>
                                    <td class="text-left pt-0 text-dark"><strong>TOTAL DE ORDENS</strong></td>
                                    <td class="text-right pt-0">
                                        <strong>
                                            <?= ($lista_status->produzido_total + $lista_status->produzido_parcial + $lista_status->pendente + $lista_status->atrasado + $lista_status->estornado) ?>
                                        </strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card  mb-3">
                    <h6 class="card-header bg-white text-muted">
                        Custos de produção<br>
                        <span class="font-italic text-size-80">Por material e mão de obra</span>
                    </h6>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <canvas id="graph-custo-producao"></canvas>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-borderless table-sm small2">
                                    <tbody>
                                        <tr>
                                            <td class="text-left"><i class="fa fa-circle fa-xs text-dark pr-2"></i>
                                                Custos com materiais
                                            </td>
                                            <td
                                                class="text-right <?php if($custo_producao->custo_material > 0) echo "text-danger"; ?>">
                                                R$
                                                <?= number_format($custo_producao->custo_material, 2, ',', '.') ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left"><i class="fa fa-circle fa-xs text-secondary pr-2"></i>
                                                Custos com mão de obra</td>
                                            <td
                                                class="text-right <?php if($custo_producao->custo_mob > 0) echo "text-danger"; ?>">
                                                R$
                                                <?= number_format($custo_producao->custo_mob, 2, ',', '.') ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <table class="table table-borderless table-sm mb-1">
                            <tbody>
                                <tr>
                                    <td class="text-left pt-0 text-dark"><strong>CUSTO TOTAL</strong></td>
                                    <td
                                        class="text-right pt-0 <?php if(($custo_producao->custo_material + $custo_producao->custo_mob) > 0) echo "text-danger"; ?>">
                                        <strong>
                                            R$
                                            <?= number_format(($custo_producao->custo_material + $custo_producao->custo_mob), 2, ',', '.') ?>
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
                    <h6 class="card-header bg-white text-muted">
                        Custo de produção<br>
                        <span class="font-italic text-size-80">Acumulado por dia</span>
                    </h6>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <canvas id="graph-producao"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <table class="table table-borderless table-sm mb-1">
                            <tbody>
                                <tr>
                                    <td class="text-left pt-0 text-dark"><strong>CUSTO TOTAL</strong></td>
                                    <td
                                        class="text-right pt-0 <?php if(($custo_producao->custo_material + $custo_producao->custo_mob) > 0) echo "text-danger"; ?>">
                                        <strong>
                                            R$
                                            <?= number_format(($custo_producao->custo_material + $custo_producao->custo_mob), 2, ',', '.') ?>
                                        </strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card  mb-3">
                    <h6 class="card-header bg-white text-muted">
                        Produtos produzidos<br>
                        <span class="font-italic text-size-80">Por quantidade</span>
                    </h6>
                    <div class="card-body">                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12 height-scroll-400">
                                        <table class="table table-borderless table-sm mb-0 small2">
                                            <tbody>
                                                <?php foreach($lista_producao as $key_producao => $producao) { ?>
                                                <tr>
                                                    <td class="text-left limit-text-30">
                                                        <?= $producao->nome_produto ?>
                                                    </td>
                                                    <td class="text-right text-teal">
                                                        <?= number_format($producao->total_producao, 3, ',', '.') ?>
                                                        <?= $producao->cod_unidade_medida ?>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <?php if ($lista_producao == false) { ?>
                                <div class="text-center">
                                    <p class="text-muted mb-0 font-italic ">Sem produto produzido no período
                                    </p>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>                                
            </div>
            <div class="col-md-4 pl-0">
                <div class="card  mb-3">
                    <h6 class="card-header bg-white text-muted">
                        Horas trabalhadas<br>
                        <span class="font-italic text-size-80">Por dia</span>
                    </h6>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12 height-scroll-200">
                                        <table class="table table-borderless table-sm mb-0 small2">
                                            <tbody>
                                                <?php 
                                                    $totalHoras = 0;
                                                    foreach($horas_dia as $key_dia => $hora_dia) { 
                                                        $totalHoras = $totalHoras + $hora_dia->hora_dia; ?>
                                                <tr>
                                                    <td class="text-left limit-text-30">
                                                        <?= date("d", strtotime($hora_dia->data)) ?> de <?= $descMes ?>
                                                    </td>
                                                    <td class="text-right text-dark <?php if($hora_dia->hora_dia > 0) echo "font-weight-bold" ?>">
                                                        <?= number_format($hora_dia->hora_dia, 2, ',', '.') ?> h
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <?php if ($horas_dia == false) { ?>
                                <div class="text-center">
                                    <p class="text-muted mb-0 font-italic ">Sem horas apontadas
                                    </p>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <table class="table table-borderless table-sm mb-1">
                            <tbody>
                                <tr>
                                    <td class="text-left pt-0 text-dark"><strong>HORAS TOTAIS</strong></td>
                                    <td
                                        class="text-right pt-0 <?php if(($custo_producao->custo_material + $custo_producao->custo_mob) > 0) echo "text-info"; ?>">
                                        <strong>
                                            <?= number_format($totalHoras, 2, ',', '.') ?> h
                                        </strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card  mb-3">
                    <h6 class="card-header bg-white text-muted">
                        Produtos consumidos<br>
                        <span class="font-italic text-size-80">Componentes de produção</span>
                    </h6>
                    <div class="card-body">
                        <?php if($lista_consumo != null) { ?>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <canvas id="graph-produto" class="mb-3" height="130"></canvas>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12 height-scroll-300">
                                        <table class="table table-borderless table-sm mb-0 small2">
                                            <tbody>
                                                <?php foreach($lista_consumo as $key_consumo => $consumo) { ?>
                                                <tr>
                                                    <td class="text-left limit-text-30"><i
                                                            class="fa fa-circle fa-xs pr-2" style="color: <?= $consumo->color ?>"></i>
                                                        <?= $consumo->nome_produto ?>
                                                    </td>
                                                    <td class="text-right text-info">
                                                        <?= number_format($consumo->total_consumido, 3, ',', '.') ?>
                                                        <?= $consumo->cod_unidade_medida ?>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <?php if ($lista_consumo == false) { ?>
                                <div class="text-center">
                                    <p class="text-muted mb-0 font-italic ">Sem produto consumido no período
                                    </p>
                                </div>
                                <?php } ?>
                            </div>
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

new Chart(document.getElementById("graph-custo-producao"), {
    type: 'bar',
    data: {
        labels: ["Custo Produção"],
        datasets: [{
            backgroundColor: "#3E3F3A",
            data: [<?= $custo_producao->custo_material ?>]
        },
        {
            backgroundColor: "#8E8C84",
            data: [<?= $custo_producao->custo_mob ?>]
        }]
    },
    options: {
        plugins: {
            labels: {
                render: 'percentage',
                fontColor: '#3E3F3A',
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
                stacked: false,
                gridLines: {
                    display: false,
                },
                ticks: {
                    display: false
                }
            }],
            yAxes: [{
                stacked: false  ,
                gridLines: {
                    drawBorder: false,
                },
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
                }
            }]
        },
        tooltips: {
            callbacks: {
                label: function(tooltipItem, data) {
                    var indice = tooltipItem.index;
                    return " R$ " + tooltipItem.yLabel
                        .toLocaleString("pt-BR", {
                            style: "decimal",
                            minimumFractionDigits: 2,
                            maximumFractionDigits: 2
                        });
                }
            },
            displayColors: false,
        },
    }
});

new Chart(document.getElementById("graph-producao"), {
    type: 'line',
    data: {
        labels: <?php echo json_encode($dia); ?>,
        datasets: [{
            data: <?php echo json_encode($custo_dia); ?>,
            label: "Custo",
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
                },
                ticks: {
                    align: 'inner',
                    includeBounds: false,
                    maxTicksLimit: 4,
                    fontSize: 11,
                    minRotation: 0,
                    maxRotation: 0,  
                    mirror: true,                 
                    callback: function(value, index, values) {

                        var dia = <?php echo json_encode($dia_nome); ?>;
                        var mes = <?php echo json_encode($nome_mes); ?>;

                        if(index > 0)
                            return dia[index] + " " + mes[index].substring(0, 3);

                    }
                },
            }],
            yAxes: [{
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

var ctx = document.getElementById("graph-produto");
new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: <?php echo json_encode($label_produto); ?>,
        datasets: [{
            label: "Produtos produzidos",
            backgroundColor: <?php echo json_encode($color_produto); ?>,
            data: <?php echo json_encode($custo_produto); ?>
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

                    if(args.value >= 1000){
                        lbl = args.value / 1000;

                        return lbl.toLocaleString("pt-BR", {
                                style: "decimal",
                                minimumFractionDigits: 0,
                                maximumFractionDigits: 0
                        }) + ' mil';
                    }
                    
                    return "R$ " + args.value.toLocaleString("pt-BR", {
                            style: "decimal",
                            minimumFractionDigits: 0,
                            maximumFractionDigits: 0
                    });
                },
                fontColor: 'white',
            },
        },
        tooltips: {
            enabled: false,
        },        
        cutoutPercentage: 35,  
    }
    
});
</script>

<?php $this->load->view('gerais/footer'); ?>