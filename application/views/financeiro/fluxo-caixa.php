<?php $this->load->view('gerais/header', $menu); ?>
<?php $this->load->view('gerais/menu', $menu); ?>

<section>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('visao-geral') ?>">Visão Geral</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('financeiro') ?>">Financeiro</a></li>
            <li class="breadcrumb-item active">Fluxo de Caixa</a></li>
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
                                        <a href="<?= base_url("relatorios/fluxo-caixa/{$mes_anterior}/{$ano_anterior}") ?>" class="btn btn-secondary link-load"><i class="fas fa-angle-left"></i></a>
                                    </div>
                                    <input type="text" class="form-control search text-center filtro-data" value="<?= $descMes ?> de <?= $ano ?>" readonly>
                                    <div class="input-group-append">
                                        <a href="<?= base_url("relatorios/fluxo-caixa/{$mes_seguinte}/{$ano_seguinte}") ?>" class="btn btn-secondary link-load"><i class="fas fa-angle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card  mb-3">                
                    <div class="card-body">
                        <nav>
                            <div class="nav nav-pills flex-column flex-sm-row mb-3" id="nav-tab" role="tablist">
                                <a class="flex-sm-fill text-sm-center nav-item nav-link active" id="result-confirmado-tab" data-toggle="tab" href="#result-confirmado" role="tab" aria-controls="result-confirmado" aria-selected="true"><i class="fa-solid fa-arrow-right-arrow-left"></i> Fluxo de Caixa</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="result-confirmado">
                                <div class="row">
                                    <div class="col-md-12 text-center mb-4">
                                        <canvas id="graph-fluxo"></canvas>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-borderless table-sm mb-0">
                                            <tbody>
                                                <tr>
                                                    <?php 
                                                          $saldo = $lista_conta_resumida->saldo_conta + $lista_conta_resumida->saida_realizadas - $lista_conta_resumida->entradas_realizadas;
                                                          if(date('Y-m-01', strtotime(date(''.$ano.'-'.$mes.'-01'))) == date("Y-m-01"))
                                                            $saldoFinalPeriodo = $saldo + (($lista_conta_resumida->entrada_confirm + $lista_conta_resumida->entrada_proj) - ($lista_conta_resumida->saida_confirm + $lista_conta_resumida->saida_proj));
                                                          else 
                                                            $saldoFinalPeriodo = $saldo + ($lista_conta_resumida->entrada_confirm - $lista_conta_resumida->saida_confirm);
                                                           ?> 
                                                    <td class="text-left pt-0 text-dark"><strong>Total</strong></td>
                                                    <td
                                                        class="text-right pt-0 <?php if($saldoFinalPeriodo > 0) echo "text-teal";
                                                                                    elseif($saldoFinalPeriodo < 0) echo "text-danger"; ?>">
                                                        <strong>
                                                            R$
                                                            <?= number_format($saldoFinalPeriodo, 2, ',', '.') ?>
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
                </div>                
                <div class="row">
                    <div class="col-md-12">
                        <form action="<?= base_url("relatorios/fluxo-caixa/{$mes}/{$ano}") ?>" method="get" class="mb-0 needs-validation" novalidate>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <select id="inputConta" name="conta[]" data-style="btn-input-primary" title="Conta Caixa" multiple data-actions-box="true" class="selectpicker show-tick form-control" data-live-search="true" data-actions-box="true">
                                        <?php $chave_conta = 0;
                                        foreach ($lista_conta as $key_conta => $conta) { ?>
                                            <option value="<?= $conta->cod_conta ?>" <?php if ($cod_conta != null) {
                                                                                            if ($conta->cod_conta == $cod_conta[$chave_conta]) {
                                                                                                if ((count($cod_conta) - 1) > $chave_conta) {
                                                                                                    $chave_conta = $chave_conta + 1;
                                                                                                }
                                                                                                echo "selected";
                                                                                            }
                                                                                        } ?>>
                                                <?= $conta->cod_conta ?> -
                                                <?= $conta->nome_conta ?> -
                                                <?= html_escape($conta->nome_estabelecimento) ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-outline-primary btn-block"><i class="fa-solid fa-rotate"></i> Atualizar Dados</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8 pl-0">
                <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="movimentacoes-tab" data-toggle="tab" href="#movimentacoes" role="tab" aria-controls="movimentacoes" aria-selected="true">Fluxo</a>
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
                                                <th scope="col" class="text-center">Dia</th>
                                                <th scope="col" class="text-right">Entradas</th>
                                                <th scope="col" class="text-right">Saídas</th>
                                                <th scope="col" class="text-right">Resultado</th>
                                                <th scope="col" class="text-right">Saldo</th>
                                            </tr>
                                        </thead>
                                        <tbody>                                     
                                            <tr>
                                                <td class="text-left align-middle" colspan="4">
                                                    <i>Saldo anterior</i>
                                                </td>
                                                <td class="text-right align-middle <?php if (round($saldo, 2) > 0) echo "text-teal";
                                                                                    elseif (round($saldo, 2) < 0) echo "text-danger"; ?>">
                                                    R$ <?= number_format($saldo, 2, ',', '.') ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tbody>
                                            <?php 
                                            $fluxoDia = array();
                                            $diaNome[] = array();
                                            $nomeNome = array();
                                            $anoNome = array();
                                            $fluxoSaldo = array();
                                            foreach ($lista_fluxo_dia as $key_fluxo_dia => $fluxo) {

                                                $saldo = $saldo + $fluxo->entradas - $fluxo->saidas;
                                                $fluxoDia[] = str_replace('-', '/', date("d-m", strtotime($fluxo->data)));
                                                $diaNome[] = date("d", strtotime($fluxo->data));
                                                $nomeNome[] = $fluxo->nome_mes;
                                                $anoNome[] = date("Y", strtotime($fluxo->data));
                                                $fluxoSaldo[] = $saldo;
                                            ?>
                                                <tr>
                                                    <td class="text-center align-middle">
                                                        <a href="#" data-toggle="modal" class="text-dark" data-target="#visualizar-dia<?= $fluxo->data ?>"><?= str_replace('-', '/', date("d-m-Y", strtotime($fluxo->data))) ?></a>
                                                    </td>
                                                    <td class="text-right align-middle <?php if ($fluxo->entradas > 0) echo "text-teal"; ?>">
                                                        R$ <?= number_format($fluxo->entradas, 2, ',', '.') ?>
                                                    </td>
                                                    <td class="text-right align-middle <?php if ($fluxo->saidas > 0) echo "text-danger"; ?>">
                                                        R$ <?php if ($fluxo->saidas > 0) echo "-"; ?><?= number_format($fluxo->saidas, 2, ',', '.') ?>
                                                    </td>
                                                    <td class="text-right align-middle <?php if (($fluxo->entradas - $fluxo->saidas) > 0) echo "text-teal";
                                                                                        elseif (($fluxo->entradas - $fluxo->saidas) < 0) echo "text-danger"; ?>">
                                                        R$ <?= number_format($fluxo->entradas - $fluxo->saidas, 2, ',', '.') ?>
                                                    </td>
                                                    <td class="text-right align-middle <?php if ($saldo > 0) echo "text-teal";
                                                                                        elseif ($saldo < 0) echo "text-danger"; ?>">
                                                        R$ <?= number_format($saldo, 2, ',', '.') ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                        </tbody>
                                    </table>
                                </div>
                                <?php if ($lista_fluxo_dia == false) { ?>
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

<?php foreach ($lista_fluxo_dia as $key_fluxo_dia => $fluxo) { ?>
    <div class="modal fade" id="visualizar-dia<?= $fluxo->data ?>">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Lançamentos em <?= str_replace('-', '/', date("d-m-Y", strtotime($fluxo->data))) ?></h5>
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
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-reporte">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th scope="col" class="text-center"><i class="fa-solid fa-check"></i></th>
                                                            <th scope="col" class="text-center">Dia</th>
                                                            <th scope="col" class="text-center">Título</th>
                                                            <th scope="col">Descrição</th>
                                                            <th scope="col" class="text-right">Valor</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="table-sm">
                                                        <?php $i = 0;
                                                        foreach ($lista_movimento_detalhada as $key_movimento_detalhada => $titulo) {
                                                            if ($titulo->data_titulo === $fluxo->data) {
                                                                $i += 1; ?>
                                                                <tr>
                                                                    <td class="text-center align-middle small2">
                                                                        <?php if ($titulo->confirmado == 1) echo "<i class='fas fa-check-circle text-teal-light'></i>";
                                                                              elseif($titulo->confirmado == 0 && $titulo->data_vencimento < date('Y-m-d')) echo "<i class='fa-solid fa-circle text-danger-light'></i>";
                                                                              else echo "<i class='fa-solid fa-circle text-light'></i>"; ?>
                                                                    </td>
                                                                    <td class="text-center align-middle">
                                                                        <?php
                                                                            if ($titulo->confirmado == 1) echo str_replace('-', '/', date("d-m-Y", strtotime($titulo->data_confirmacao))); 
                                                                            else echo str_replace('-', '/', date("d-m-Y", strtotime($titulo->data_vencimento)));
                                                                        ?>
                                                                    </td>
                                                                    <td class="text-center align-middle"><?= $titulo->cod_movimento_conta ?></td>
                                                                    </td>
                                                                    <td class="limit-text-40 align-middle align-middle" data-toggle="tooltip" data-placement="bottom" title="<?= $titulo->desc_movimento ?>">
                                                                        <?= $titulo->desc_movimento ?><br>
                                                                        <span class="badge bg-info-light"><?= $titulo->nome_conta ?>
                                                                        </span>
                                                                        <?php if ($titulo->nome_fornecedor != null) { ?>
                                                                            <span class="badge font-italic text-muted"><?= $titulo->nome_fornecedor ?>
                                                                            </span>
                                                                        <?php } elseif ($titulo->nome_cliente != null) { ?>
                                                                            <span class="badge font-italic text-muted"><?= $titulo->nome_cliente ?>
                                                                            </span>
                                                                        <?php } ?>
                                                                    </td>
                                                                    <td class="text-right align-middle <?php if ($titulo->tipo_movimento == 2) echo "text-danger"; ?>
                                                                <?php if ($titulo->tipo_movimento == 1) echo "text-teal"; ?>">
                                                                        R$
                                                                        <?php if ($titulo->tipo_movimento == 2) echo "-"; ?>
                                                                        <?php
                                                                        if ($titulo->confirmado == 1)
                                                                            echo number_format($titulo->valor_confirmado, 2, ',', '.');
                                                                        else
                                                                            echo number_format($titulo->valor_titulo, 2, ',', '.');  ?>
                                                                    </td>
                                                                </tr>
                                                        <?php }
                                                        } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <?php if ($i == 0) { ?>
                                                <div class="text-center text-muted">
                                                    <p class="font-italic mt-3">Nenhum lançamento realizado</p>
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
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

new Chart(document.getElementById("graph-fluxo"), {
    type: 'line',
    data: {
        labels: <?php echo json_encode($fluxoDia); ?>,
        datasets: [{
            data: <?php echo json_encode($fluxoSaldo); ?>,
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
            gradientFill.addColorStop(0, '#4db6ac');
            gradientFill.addColorStop(yPos / c.height, '#4db6ac');
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

                        var dia = <?php echo json_encode($diaNome); ?>;
                        var mes = <?php echo json_encode($nomeNome); ?>;

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

                        /*if(index == 3){
                            return "";
                        }*/

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
                    var dia = <?php echo json_encode($diaNome); ?>;
                    var mes = <?php echo json_encode($nomeNome); ?>;
                    var ano = <?php echo json_encode($anoNome); ?>;
                    return dia[indice] + " de " + mes[indice];
                },
            },
            displayColors: false,
        }

    }
});

    $("#btnExport").click(function(e) {
        var a = document.createElement('a');
        var data_type = 'data:application/vnd.ms-excel';
        var table_div = document.getElementById('downloadXLS');
        var table_html = table_div.outerHTML.replace(/ /g, '%20');
        a.href = data_type + ', ' + table_html;
        a.download = 'Movimento Conta.xls';
        a.click();
        e.preventDefault();
    });
</script>

<?php $this->load->view('gerais/footer'); ?>
