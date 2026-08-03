<?php $this->load->view('gerais/header' , $menu); ?>
<?php $this->load->view('gerais/menu', $menu); ?>

<section>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('visao-geral') ?>">Visão Geral</a></li>
            <li class="breadcrumb-item active">Vendas</li>
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
                                        <a href="<?= base_url("vendas/{$mes_anterior}/{$ano_anterior}") ?>"
                                            class="btn btn-secondary link-load"><i class="fas fa-angle-left"></i></a>
                                    </div>
                                    <input type="text" class="form-control search text-center filtro-data"
                                        value="<?= $descMes ?> de <?= $ano ?>" readonly>
                                    <div class="input-group-append">
                                        <a href="<?= base_url("vendas/{$mes_seguinte}/{$ano_seguinte}") ?>"
                                            class="btn btn-secondary link-load"><i class="fas fa-angle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card  mb-3">
                    <h6 class="card-header bg-white text-muted">
                        Valores das vendas<br>
                        <span class="font-italic text-size-80">Por tipo</span>
                    </h6>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-borderless table-sm small2">
                                    <tbody>
                                        <tr>
                                            <td class="text-left">
                                                Total em produtos
                                            </td>
                                            <td class="text-right <?php if($lista_valores->total_produto > 0) echo "text-teal"; ?>">
                                                R$ <?= number_format($lista_valores->total_produto, 2, ',', '.') ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">
                                                Total frete
                                            </td>
                                            <td class="text-right <?php if($lista_valores->total_frete > 0) echo "text-teal"; ?>">
                                                R$ <?= number_format($lista_valores->total_frete, 2, ',', '.') ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">
                                                Total seguro
                                            </td>
                                            <td class="text-right <?php if($lista_valores->total_seguro > 0) echo "text-teal"; ?>">
                                                R$ <?= number_format($lista_valores->total_seguro, 2, ',', '.') ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">
                                                Outras despesas
                                            </td>
                                            <td class="text-right <?php if($lista_valores->outras_despesas > 0) echo "text-teal"; ?>">
                                                R$ <?= number_format($lista_valores->outras_despesas, 2, ',', '.') ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">
                                                Total desconto
                                            </td>
                                            <td class="text-right <?php if($lista_valores->total_desconto > 0) echo "text-danger"; ?>">
                                                R$ <?= number_format($lista_valores->total_desconto, 2, ',', '.') ?>
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
                                    <td class="text-left pt-0 text-dark"><strong>TOTAL VENDIDO</strong></td>
                                    <td class="text-right pt-0 <?php if($lista_valores->total_vendas > 0) echo "text-teal"; ?>">
                                        <strong>
                                            R$ <?= number_format($lista_valores->total_vendas, 2, ',', '.') ?>
                                        </strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card  mb-3">
                    <h6 class="card-header bg-white text-muted">
                        Vendas no ano<br>
                        <span class="font-italic text-size-80">Total vendido por mês</span>
                    </h6>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 text-center mb-2">
                                <canvas id="graph-venda-ano"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <table class="table table-borderless table-sm mb-1">
                            <tbody>
                                <tr>
                                    <td class="text-left pt-0 text-dark"><strong>TOTAL ANO</strong></td>
                                    <td
                                        class="text-right pt-0 <?php if($total_ano > 0) echo "text-teal"; ?>">
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
                <div class="card  mb-3">
                    <h6 class="card-header bg-white text-muted">
                        Vendas por vendedo<br>
                        <span class="font-italic text-size-80">Vendas e comissão</span>
                    </h6>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12 height-scroll-300">
                                        <table class="table table-borderless table-sm small2">
                                            <tbody>
                                                <?php $totalVendedor = 0; $totalComissao = 0;
                                                foreach($lista_vendedor as $key_vendedor => $vendedor) { 
                                                    $totalVendedor = $totalVendedor + $vendedor->total_venda;
                                                    $totalComissao = $totalComissao + $vendedor->total_comissao; ?>
                                                <tr>
                                                    <td colspan="2">
                                                        <strong><a href="" class="text-dark"><?= $vendedor->nome_vendedor ?></a></strong>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left limit-text-30">
                                                        Total vendido
                                                    </td>
                                                    <td class="text-right text-teal">
                                                    R$ <?= number_format($vendedor->total_venda, 2, ',', '.') ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left limit-text-30">
                                                        Total em comissão
                                                    </td>
                                                    <td class="text-right <?php if($vendedor->total_comissao > 0) echo "text-info"; ?>">
                                                    R$ <?= number_format($vendedor->total_comissao, 2, ',', '.') ?>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <?php if ($lista_vendedor == false) { ?>
                                <div class="text-center">
                                    <p class="text-muted mb-0 font-italic ">Sem venda para o período
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
                                    <td class="text-left pt-0 text-dark"><strong>TOTAL VENDIDO</strong></td>
                                    <td class="text-right pt-0 <?php if($totalVendedor > 0) echo "text-teal"; ?>">
                                        <strong>
                                            R$ <?= number_format($totalVendedor, 2, ',', '.') ?>
                                        </strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-left pt-0 text-dark"><strong>TOTAL COMISSÃO</strong></td>
                                    <td class="text-right pt-0 <?php if($totalComissao > 0) echo "text-info"; ?>">
                                        <strong>
                                            R$ <?= number_format($totalComissao, 2, ',', '.') ?>
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
                        Total vendido<br>
                        <span class="font-italic text-size-80">Acumulado por dia</span>
                    </h6>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <canvas id="graph-vendas"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <table class="table table-borderless table-sm mb-1">
                            <tbody>
                                <tr>
                                    <td class="text-left pt-0 text-dark"><strong>TOTAL VENDIDO</strong></td>
                                    <td class="text-right pt-0 <?php if($lista_valores->total_vendas > 0) echo "text-teal"; ?>">
                                        <strong>
                                            R$ <?= number_format($lista_valores->total_vendas, 2, ',', '.') ?>
                                        </strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div> 
                <div class="card  mb-3">
                    <h6 class="card-header bg-white text-muted">
                        Vendido por cliente<br>
                        <span class="font-italic text-size-80">Por valores</span>
                    </h6>
                    <div class="card-body">
                        <?php if($lista_cliente != null) { ?>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <canvas id="graph-cliente" class=" mb-3" height="130"></canvas>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12 height-scroll-200">
                                        <table class="table table-borderless table-sm mb-0 small2">
                                            <tbody>
                                                <?php foreach($lista_cliente as $key_cliente => $cliente) { ?>
                                                <tr>
                                                    <td class="text-left limit-text-30"><i
                                                            class="fa fa-circle fa-xs pr-2" style="color: <?= $cliente->color ?>"></i>
                                                        <?= $cliente->nome_cliente ?>
                                                    </td>
                                                    <td class="text-right text-teal">
                                                    R$ <?= number_format($cliente->total_vendas + $cliente->total_frete +
                                                                         $cliente->total_seguro + $cliente->outras_despesas - 
                                                                         $cliente->total_desconto, 2, ',', '.') ?>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <?php if ($lista_cliente == false) { ?>
                                <div class="text-center">
                                    <p class="text-muted mb-5 mt-5 font-italic ">Sem venda para o período
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
                                    <td class="text-left pt-0 text-dark"><strong>TOTAL</strong></td>
                                    <td class="text-right pt-0 <?php if($lista_valores->total_vendas > 0) echo "text-teal"; ?>">
                                        <strong>
                                            R$ <?= number_format($lista_valores->total_vendas, 2, ',', '.') ?>
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
                        Indicadores de venda<br>
                        <span class="font-italic text-size-80">Por valores</span>
                    </h6>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-borderless table-sm small2">
                                    <tbody>
                                        <tr>
                                            <td class="text-left">
                                                Ticket médio
                                            </td>
                                            <td class="text-right <?php if($ticket_medio->valor_venda > 0 && ($ticket_medio->valor_venda / $ticket_medio->num_venda) > 0) echo "text-teal"; ?>">
                                                R$ <?php if($ticket_medio->valor_venda > 0) echo number_format($ticket_medio->valor_venda / $ticket_medio->num_venda, 2, ',', '.'); else echo "0,00"; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">
                                                Vendas pendentes
                                            </td>
                                            <td class="text-right <?php if(0 > 0) echo "text-teal"; ?>">
                                                R$ <?= number_format(0, 2, ',', '.') ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">
                                                Em orçamento
                                            </td>
                                            <td class="text-right <?php if($orcamento != null && ($orcamento->valor_produto + $orcamento->valor_frete +
                                                                            $orcamento->valor_seguro + $orcamento->outras_despesas -
                                                                            $orcamento->valor_desconto) > 0) echo "text-secondary"; ?>">
                                                R$ <?php if($orcamento != null) echo number_format($orcamento->valor_produto + $orcamento->valor_frete +
                                                                                                   $orcamento->valor_seguro + $orcamento->outras_despesas -
                                                                                                   $orcamento->valor_desconto, 2, ',', '.'); else echo "0,00"; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">
                                                Vendas perdidas
                                            </td>
                                            <td class="text-right <?php if($reprovado != null && ($reprovado->valor_produto + $reprovado->valor_frete +
                                                                            $reprovado->valor_seguro + $reprovado->outras_despesas -
                                                                            $reprovado->valor_desconto) > 0) echo "text-danger"; ?>">
                                                R$ <?php if($reprovado != null) echo number_format($reprovado->valor_produto + $reprovado->valor_frete +
                                                                                                   $reprovado->valor_seguro + $reprovado->outras_despesas -
                                                                                                   $reprovado->valor_desconto, 2, ',', '.'); else echo "0,00"; ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card  mb-3">
                    <h6 class="card-header bg-white text-muted">
                        Vendido por produto<br>
                        <span class="font-italic text-size-80">Vendido por produto</span>
                    </h6>
                    <div class="card-body">
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
                    <div class="card-footer">
                        <table class="table table-borderless table-sm mb-1">
                            <tbody>
                                <tr>
                                    <td class="text-left pt-0 text-dark"><strong>TOTAL</strong></td>
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
            </div>
        </div>
    </div>
</section>


<script>
$('.page-item>a').addClass("page-link");

$(function() {
    $.applyDataMask();
});

new Chart(document.getElementById("graph-venda-ano"), {
    type: 'bar',
    data: {
        labels: <?php echo json_encode($label_mes); ?>,
        datasets: [{
                label: "Vendas",
                backgroundColor: "#4db6ac",
                data: <?php echo json_encode($venda_mes); ?>,
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

new Chart(document.getElementById("graph-vendas"), {
    type: 'line',
    data: {
        labels: <?php echo json_encode($dia); ?>,
        datasets: [{
                data: <?php echo json_encode($venda_dia); ?>,
                label: "Vendas",
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
                    mirror: true,
                    fontSize: 11,
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

new Chart(document.getElementById("graph-cliente"), {
    type: 'doughnut',
    data: {
        labels: <?php echo json_encode($label_cliente); ?>,
        datasets: [{
            label: "Produtos vendidos",
            backgroundColor: <?php echo json_encode($color_cliente); ?>,
            data: <?php echo json_encode($perc_cliente); ?>
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