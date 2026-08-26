<?php $this->load->view('gerais/header' , $menu); ?>
<?php $this->load->view('gerais/menu', $menu); ?>

<section>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('visao-geral') ?>">Visão Geral</a></li>
            <li class="breadcrumb-item active">Financeiro</li>
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
                                        <a href="<?= base_url("financeiro/{$mes_anterior}/{$ano_anterior}") ?>"
                                            class="btn btn-secondary link-load"><i class="fas fa-angle-left"></i></a>
                                    </div>
                                    <input type="text" class="form-control search text-center filtro-data"
                                        value="<?= $descMes ?> de <?= $ano ?>" readonly>
                                    <div class="input-group-append">
                                        <a href="<?= base_url("financeiro/{$mes_seguinte}/{$ano_seguinte}") ?>"
                                            class="btn btn-secondary link-load"><i class="fas fa-angle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card  mb-3">
                    <h6 class="card-header bg-white text-muted">
                        Saldos de caixa<br>
                        <span class="font-italic text-size-80">Realizado e projetado</span>
                    </h6>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-borderless table-sm small2">
                                    <tbody>
                                        <?php foreach($lista_conta as $key_conta_resumida => $conta_resumida) { ?>
                                        <tr>
                                            <td colspan="2">
                                                <strong><?= $conta_resumida->nome_conta ?></strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left limit-text-30">
                                                Saldo confirmado
                                            </td>
                                            <td
                                                class="text-right <?php if($conta_resumida->saldo_conta > 0) echo "text-teal";
                                                                        if($conta_resumida->saldo_conta < 0) echo "text-danger"; ?>">
                                                R$ <?= number_format((float) ($conta_resumida->saldo_conta), 2, ',', '.') ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left limit-text-30">
                                                Saldo projetado
                                            </td>
                                            <td
                                                class="text-right <?php if(($conta_resumida->saldo_conta + $conta_resumida->entrada_proj - $conta_resumida->saida_proj) > 0) echo "text-teal";
                                                                        if(($conta_resumida->saldo_conta + $conta_resumida->entrada_proj - $conta_resumida->saida_proj) < 0) echo "text-danger"; ?>">
                                                R$
                                                <?= number_format((float) ($conta_resumida->saldo_conta + $conta_resumida->entrada_proj - $conta_resumida->saida_proj), 2, ',', '.') ?>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <?php if ($lista_conta == false) { ?>
                                <div class="text-center">
                                    <p class="text-muted mb-0">Nenhuma conta disponível</p>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <table class="table table-borderless table-sm mb-0 mt-0 table-resultado">
                            <tbody>
                                <tr>
                                    <td class="text-left pt-0 text-dark"><strong>Total confirmado</strong></td>
                                    <td
                                        class="text-right pt-0 <?php if($conta->saldo_contas > 0) echo "text-teal"; else echo "text-danger"; ?>">
                                        <strong>
                                            R$ <?= number_format((float) ($conta->saldo_contas), 2, ',', '.') ?>
                                        </strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-left pt-0 text-dark"><strong>Total projetado</strong></td>
                                    <td
                                        class="text-right pt-0 <?php if(($conta->saldo_contas + $titulos_pendente->entradas - $titulos_pendente->saidas) > 0) echo "text-teal"; else echo "text-danger"; ?>">
                                        <strong>
                                            R$
                                            <?= number_format((float) ($conta->saldo_contas + $titulos_pendente->entradas - $titulos_pendente->saidas), 2, ',', '.') ?>
                                        </strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card  mb-3">
                    <h6 class="card-header bg-white text-muted">
                        Resultado do ano<br>
                        <span class="font-italic text-size-80">Situação realizada</span>
                    </h6>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 text-center mb-2">
                                <canvas id="graph-resultado-ano"></canvas>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-borderless table-sm mb-0 small2">
                                    <tbody>
                                        <tr>
                                            <td class="text-left"><i class="fa fa-circle fa-xs pr-2"
                                                    style="color: #4db6ac"></i>
                                                Receitas
                                            </td>
                                            <td class="text-right text-teal">R$
                                                <?= number_format((float) ($total_entrada_ano), 2, ',', '.') ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left"><i class="fa fa-circle fa-xs pr-2"
                                                    style="color: #e57373"></i>
                                                Despesas</td>
                                            <td class="text-right text-danger">R$
                                                <?= number_format((float) ($total_saida_ano), 2, ',', '.') ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <table class="table table-borderless table-sm mb-0 mt-0 table-resultado">
                            <tbody>
                                <tr>
                                    <td class="text-left pt-0 text-dark"><strong>Resultado</strong></td>
                                    <td
                                        class="text-right pt-0 <?php if(($total_entrada_ano - $total_saida_ano) > 0) echo "text-teal"; else echo "text-danger"; ?>">
                                        <strong>
                                            R$
                                            <?= number_format((float) (($total_entrada_ano - $total_saida_ano)), 2, ',', '.') ?>
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
                        Fluxo de caixa<br>
                        <span class="font-italic text-size-80">Situação projetada</span>
                    </h6>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <canvas id="graph-previsto"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <table class="table table-borderless table-sm mb-0 mt-0 table-resultado">
                            <tbody>
                                <tr>
                                    <td class="text-left pt-0 text-dark"><strong>Previsto no final do
                                            mês</strong></td>
                                    <td
                                        class="text-right pt-0 <?php if(($conta->saldo_contas + $titulos_pendente->entradas - $titulos_pendente->saidas) > 0) echo "text-teal"; else echo "text-danger"; ?>">
                                        <strong>
                                            R$
                                            <?= number_format((float) ($conta->saldo_contas + $titulos_pendente->entradas - $titulos_pendente->saidas), 2, ',', '.') ?>
                                        </strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card  mb-3">
                    <h6 class="card-header bg-white text-muted">
                        Receitas por conta contábil<br>
                        <span class="font-italic text-size-80">Situação realizada</span>
                    </h6>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-borderless table-sm small2">
                                            <tbody>
                                                <?php  $totalReceitas = 0;
                                                       foreach($lista_conta_contabil_receita as $key_contabil => $contabil) { 
                                                        $totalReceitas = $totalReceitas + $contabil->entradas;?>
                                                <tr>
                                                    <td class="text-left limit-text-30"><i
                                                            class="fa fa-circle fa-xs pr-2" style="color: #4db6ac"></i>
                                                        <?= $contabil->nome_conta_contabil ?>
                                                    </td>
                                                    <td class="text-right text-teal">R$
                                                        <?= number_format((float) ($contabil->entradas), 2, ',', '.') ?>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <?php if ($lista_conta_contabil_receita == false) { ?>
                                <div class="text-center">
                                    <p class="text-muted font-italic">Sem lançamento de despesa por conta contábil
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
                                    <td class="text-right pt-0 text-teal">
                                        <strong>
                                            R$ <?= number_format((float) ($totalReceitas ), 2, ',', '.') ?>
                                        </strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card  mb-3">
                    <h6 class="card-header bg-white text-muted">
                        Despesas por conta contábil<br>
                        <span class="font-italic text-size-80">Situação realizada</span>
                    </h6>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-borderless table-sm small2">
                                            <tbody>
                                                <?php $totalDespesas = 0;
                                                      foreach($lista_conta_contabil_despesa as $key_contabil => $contabil) {
                                                        $totalDespesas = $totalDespesas + $contabil->saidas; ?>
                                                <tr>
                                                    <td class="text-left limit-text-30"><i
                                                            class="fa fa-circle fa-xs pr-2" style="color: #e57373"></i>
                                                        <?= $contabil->nome_conta_contabil ?>
                                                    </td>
                                                    <td class="text-right text-danger">R$
                                                        -<?= number_format((float) ($contabil->saidas), 2, ',', '.') ?>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <?php if ($lista_conta_contabil_despesa == false) { ?>
                                <div class="text-center">
                                    <p class="text-muted font-italic">Sem lançamento de despesa por conta contábil
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
                                    <td class="text-right pt-0 text-danger">
                                        <strong>
                                            R$ -<?= number_format((float) ($totalDespesas), 2, ',', '.') ?>
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
                        Totais por dia<br>
                        <span class="font-italic text-size-80">Situação realizada</span>
                    </h6>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 text-center mb-2">
                                <canvas id="graph-financeiro"></canvas>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-borderless table-sm small2">
                                    <tbody>
                                        <tr>
                                            <td class="text-left"><i class="fa fa-circle fa-xs pr-2"
                                                    style="color: #4db6ac"></i>
                                                Receitas
                                            </td>
                                            <td class="text-right text-teal">R$
                                                <?= number_format((float) ($titulos_confirmados->entradas), 2, ',', '.') ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left"><i class="fa fa-circle fa-xs pr-2"
                                                    style="color: #e57373"></i>
                                                Despesas</td>
                                            <td class="text-right text-danger">R$
                                                <?= number_format((float) ($titulos_confirmados->saidas), 2, ',', '.') ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <table class="table table-borderless table-sm mb-0 mt-0 table-resultado">
                            <tbody>
                                <tr>
                                    <td class="text-left pt-0 text-dark"><strong>Resultado</strong></td>
                                    <td
                                        class="text-right pt-0 <?php if(($titulos_confirmados->entradas - $titulos_confirmados->saidas) > 0) echo "text-teal"; else echo "text-danger"; ?>">
                                        <strong>
                                            R$
                                            <?= number_format((float) (($titulos_confirmados->entradas - $titulos_confirmados->saidas)), 2, ',', '.') ?>
                                        </strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card  mb-3">
                    <h6 class="card-header bg-white text-muted">
                        Receitas por centro de custo<br>
                        <span class="font-italic text-size-80">Situação realizada</span>
                    </h6>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-borderless table-sm small2">
                                            <tbody>
                                                <?php  $totalReceitas = 0;
                                                       foreach($lista_centro_custo_receita as $key_centro => $centro) { 
                                                        $totalReceitas = $totalReceitas + $centro->entradas;?>
                                                <tr>
                                                    <td class="text-left limit-text-30"><i
                                                            class="fa fa-circle fa-xs pr-2" style="color: #4db6ac"></i>
                                                        <?= $centro->nome_centro_custo ?>
                                                    </td>
                                                    <td class="text-right text-teal">R$
                                                        <?= number_format((float) ($centro->entradas), 2, ',', '.') ?>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <?php if ($lista_centro_custo_receita == false) { ?>
                                <div class="text-center">
                                    <p class="text-muted font-italic">Sem lançamento de receita por centro de custo
                                    </p>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <table class="table table-borderless table-sm mb-0 table-resultado">
                            <tbody>
                                <tr>
                                    <td class="text-left pt-0 text-dark"><strong>Total</strong></td>
                                    <td class="text-right pt-0 text-teal">
                                        <strong>
                                            R$ <?= number_format((float) ($totalReceitas ), 2, ',', '.') ?>
                                        </strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card  mb-3">
                    <h6 class="card-header bg-white text-muted">
                        Despesas por centro de custo<br>
                        <span class="font-italic text-size-80">Situação realizada</span>
                    </h6>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-borderless table-sm small2">
                                            <tbody>
                                                <?php $totalDespesas = 0;
                                                      foreach($lista_centro_custo_despesa as $key_centro => $centro) {
                                                        $totalDespesas = $totalDespesas + $centro->saidas; ?>
                                                <tr>
                                                    <td class="text-left limit-text-30"><i
                                                            class="fa fa-circle fa-xs pr-2" style="color: #e57373"></i>
                                                        <?= $centro->nome_centro_custo ?>
                                                    </td>
                                                    <td class="text-right text-danger">R$
                                                        -<?= number_format((float) ($centro->saidas), 2, ',', '.') ?>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <?php if ($lista_centro_custo_despesa == false) { ?>
                                <div class="text-center">
                                    <p class="text-muted font-italic ">Sem lançamento de despesa por centro de
                                        custo</p>
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
                                    <td class="text-right pt-0 text-danger">
                                        <strong>
                                            R$ -<?= number_format((float) ($totalDespesas), 2, ',', '.') ?>
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

new Chart(document.getElementById("graph-resultado-ano"), {
    type: 'bar',
    data: {
        labels: <?php echo json_encode($label_mes); ?>,
        datasets: [{
                label: "Entradas",
                backgroundColor: "#4db6ac",
                data: <?php echo json_encode($entrada_mes); ?>,
                pointHitRadius: 30,
            },
            {
                label: "Saídas",
                backgroundColor: "#e57373",
                data: <?php echo json_encode($saida_mes); ?>,
                pointHitRadius: 30,
            }
        ]
    },
    options: {
        plugins: {
            labels: {
                render: function(args) {
                    return "";
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
                stacked: false,
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
                stacked: false,
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
                    var mes = <?php echo json_encode($label_nome_mes); ?>;
                    var ano = <?php echo json_encode($label_ano); ?>;
                    return mes[indice] + " de " + ano[indice];
                }
            },
            displayColors: false,
        }

    }
});

new Chart(document.getElementById("graph-financeiro"), {
    type: 'bar',
    data: {
        labels: <?php echo json_encode($dia); ?>,
        datasets: [{
                label: "Entradas",
                backgroundColor: "#4db6ac",
                data: <?php echo json_encode($entradas); ?>,
                pointHitRadius: 30,
            },
            {
                label: "Saídas",
                backgroundColor: "#e57373",
                data: <?php echo json_encode($saidas); ?>,
                pointHitRadius: 30,
            }
        ]
    },
    options: {
        plugins: {
            labels: {
                render: function(args) {
                    return "";
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
                    display: false
                }
            }],
            yAxes: [{
                stacked: true,
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

new Chart(document.getElementById("graph-previsto"), {
    type: 'line',
    data: {
        labels: <?php echo json_encode($dia_pendente); ?>,
        datasets: [{
            data: <?php echo json_encode($saldo_dia); ?>,
            label: "Total",
            borderColor: "#20c997",
            backgroundColor: "#20c997",
            fill: false,
            lineTension: 0.1,
            borderWidth: 3,
            pointHitRadius: 30,
            pointRadius: 0,
            pointHoverRadius: 0,
        }]
    },
    plugins: [{
        beforeRender: (x, options) => {
            const c = x.chart;
            const dataset = x.data.datasets[0];
            const yScale = x.scales['y-axis-0'];
            const yPos = yScale.getPixelForValue(0);

            const gradientFill = c.ctx.createLinearGradient(0, 0, 0, c.height);
            gradientFill.addColorStop(0, '#8E8C84');
            gradientFill.addColorStop(yPos / c.height, '#8E8C84');
            gradientFill.addColorStop(yPos / c.height, '#e57373');
            gradientFill.addColorStop(1, '#e57373');

            const model = x.data.datasets[0]._meta[Object.keys(dataset._meta)[0]].dataset._model;
            model.borderColor = gradientFill;
            model.backgroundColor = gradientFill;
        },
    }],
    options: {
        responsive: true,
        title: {
            display: false,
            text: ''
        },
        legend: {
            display: false
        },
        scales: {
            xAxes: [{
                gridLines: {
                    display: false,
                },                
                ticks: {
                    align: 'end',
                    marging: 10,
                    includeBounds: false,
                    maxTicksLimit: 4,
                    fontSize: 11,
                    minRotation: 0,
                    maxRotation: 0,  
                    mirror: true,                 
                    callback: function(value, index, values) {

                        var dia = <?php echo json_encode($dia_nome_pendente); ?>;
                        var mes = <?php echo json_encode($nome_mes_pendente); ?>;

                        if(index > 0)
                            return dia[index] + " " + mes[index].substring(0, 3) + ".";

                    }
                },
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
                    var dia = <?php echo json_encode($dia_nome_pendente); ?>;
                    var mes = <?php echo json_encode($nome_mes_pendente); ?>;
                    var ano = <?php echo json_encode($ano_pendente); ?>;
                    return dia[indice] + " de " + mes[indice];
                },
            },
            displayColors: false,
        }

    }
});
</script>

<?php $this->load->view('gerais/footer'); ?>