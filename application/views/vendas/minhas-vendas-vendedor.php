<?php $this->load->view('gerais/header' , $menu); ?>
<?php $this->load->view('gerais/menu-vendedor', $menu); ?>

<section>
    <div class="container container-vendedor">
        <div class="row">
            <div class="col-md-12">
                <div class="row mb-3">
                    <div class="col-md-12">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <a href="<?= base_url("vendas/minhas-vendas-vendedor/{$mes_anterior}/{$ano_anterior}") ?>"
                                    class="btn btn-secondary link-load"><i class="fas fa-angle-left"></i></a>
                            </div>
                            <input type="text" class="form-control search text-center filtro-data"
                                value="<?= $descMes ?> de <?= $ano ?>" readonly>
                            <div class="input-group-append">
                                <a href="<?= base_url("vendas/minhas-vendas-vendedor/{$mes_seguinte}/{$ano_seguinte}") ?>"
                                    class="btn btn-secondary link-load <?php if(date(''.$ano.'-'.$mes.'-01') == date('Y-m-01')) echo "disabled"; ?>"><i
                                        class="fas fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card  mb-3">
                            <h6 class="card-header bg-white text-muted">
                                Indicadores de venda
                            </h6>
                            <div class="card-body">
                                <div class="row">                                    
                                    <table class="table table-borderless table-sm small2">
                                        <tbody>
                                            <tr>
                                                <td class="text-left">
                                                    Vendas confirmadas
                                                </td>
                                                <td class="text-right <?php if($valor_situacao->total_confirmado > 0) echo "text-teal"; else echo "text-muted"; ?>">
                                                    R$ <?= number_format((float) ($valor_situacao->total_confirmado), 2, ',', '.') ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-left">
                                                    Em orçamento
                                                </td>
                                                <td class="text-right <?php if($valor_situacao->total_orcamento > 0) echo "text-secondary"; else echo "text-muted"; ?>">
                                                    R$ <?= number_format((float) ($valor_situacao->total_orcamento), 2, ',', '.') ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-left">
                                                    Orçamentos reprovados
                                                </td>
                                                <td class="text-right <?php if($valor_situacao->total_declinado > 0) echo "text-danger"; else echo "text-muted"; ?>">
                                                    R$ <?= number_format((float) ($valor_situacao->total_declinado), 2, ',', '.') ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                        <div class="col-md-12">
                            <div class="card  mb-3">
                                <h6 class="card-header bg-white text-muted">
                                Minhas metas
                                </h6> 
                            <div class="card-body">
                                <?php if ($lista_valores != null) { ?>
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <canvas id="graph-vendas-vendedor" class=" mb-0" height="130"></canvas>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-borderless table-sm mb-0 small2">
                                            <tbody>
                                                <tr>
                                                    <td class="text-left"><i class="fa fa-circle fa-xs text-primary pr-2"></i>
                                                    Total da meta
                                                    </td>
                                                    <td
                                                    class="text-right <?php if($lista_valores->total_meta > 0) echo "text-primary"; ?>">
                                                    R$
                                                    <?= number_format((float) ($lista_valores->total_meta), 2, ',', '.') ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left"><i class="fa fa-circle fa-xs text-teal pr-2"></i>
                                                    Total vendido
                                                    </td>
                                                    <td
                                                    class="text-right <?php if($lista_valores->total_produto > 0) echo "text-teal"; ?>">
                                                    R$
                                                    <?= number_format((float) ($lista_valores->total_produto), 2, ',', '.') ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <?php } else { ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="text-center">
                                            <p class="text-muted mb-0 font-italic ">Sem vendas para o período
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                            <div class="card-footer">
                                <table class="table table-borderless table-sm mb-1">
                                    <tbody>
                                        <tr>
                                            <td class="text-left pt-0 text-dark"><strong>ATINGIMENTO</strong></td>
                                            <td class="text-right pt-0 <?php if($lista_valores->total_meta > 0 && (($lista_valores->total_produto / $lista_valores->total_meta) * 100) >= 100) echo "text-teal"; 
                                                                        elseif($lista_valores->total_meta > 0 && (($lista_valores->total_produto / $lista_valores->total_meta) * 100) < 99
                                                                            && ( $lista_valores->total_meta > 0 && ($lista_valores->total_produto / $lista_valores->total_meta) * 100) > 50) echo "text-warning";
                                                                        else echo "text-danger" ?>">
                                            <strong>
                                                <?php if($lista_valores->total_meta > 0) echo number_format((float) (($lista_valores->total_produto / $lista_valores->total_meta) * 100), 1, ',', '.');
                                                        else echo number_format((float) (0), 1, ',', '.'); ?>%
                                            </strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-3">
                            <h6 class="card-header bg-white text-muted">
                                Vendido por cliente
                            </h6>
                            <div class="card-body">                                
                                <?php if($lista_cliente != null) { ?>
                                <div class="text-center">                                    
                                    <canvas id="graph-cliente" class=" mb-3" height="130"></canvas>
                                </div>
                                <?php } ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="height-scroll-200">
                                            <div class="table-responsive">
                                                <table class="table table-borderless table-sm mb-0 small2">
                                                    <tbody>
                                                        <?php foreach($lista_cliente as $key_cliente => $cliente) { ?>
                                                        
                                                        <tr>
                                                            <td class="text-left limit-text-30"><i
                                                                    class="fa fa-circle fa-xs pr-2" style="color: <?= $cliente->color ?>"></i>
                                                                <?= $cliente->nome_cliente ?>
                                                            </td>
                                                            <td class="text-right text-teal">
                                                            R$ <?= number_format((float) ($cliente->total_vendas + $cliente->total_frete +
                                                                                $cliente->total_seguro + $cliente->outras_despesas - 
                                                                                $cliente->total_desconto), 2, ',', '.') ?>
                                                            </td>
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>                                                
                                            </div>
                                        </div>
                                        <?php if ($lista_cliente == false) { ?>
                                        <div class="text-center">
                                            <p class="text-muted font-italic ">Sem venda para o período
                                            </p>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card  mb-3">
                            <h6 class="card-header bg-white text-muted">
                                Vendas por produto
                            </h6>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <table class="table table-borderless table-sm small2">
                                                <tbody>
                                                    <?php foreach($lista_produto as $key_produto => $produto) {  ?>
                                                    <tr>
                                                        <td colspan="2">
                                                            <strong><?= $produto->cod_produto ?> - <?= $produto->nome_produto ?></strong>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left limit-text-30">
                                                            Total em quantidade
                                                        </td>
                                                        <td class="text-right text-info">
                                                        <?= number_format((float) ($produto->quant_vendido), 3, ',', '.') ?> <?= $produto->cod_unidade_medida ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left limit-text-30">
                                                            Total em valor
                                                        </td>
                                                        <td class="text-right text-teal">
                                                        R$ <?= number_format((float) ($produto->valor_total), 2, ',', '.') ?>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <?php if ($lista_produto == false) { ?>
                                        <div class="text-center">
                                            <p class="text-muted font-italic ">Sem venda para o período
                                            </p>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
$('.page-item>a').addClass("page-link");

$("[name='excluir_todos[]']").click(function() {
    var cont = $("[name='excluir_todos[]']:checked").length;
    $("#btnExcluir").prop("disabled", cont ? false : true);
});

$('#inputDataAtendimento').datepicker({
    uiLibrary: 'bootstrap4'
});

new Chart(document.getElementById("graph-vendas-vendedor"), {
    type: 'bar',
    data: {
        labels: ["Meta", "Venda"],
        datasets: [{
            backgroundColor: ["#325D88", "#4db6ac"],
            data: [<?= $lista_valores->total_meta?>, <?= $lista_valores->total_produto ?>],
        }]
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
                    display: false
                },
            }],
            yAxes: [{
                stacked: false  ,
                gridLines: {
                    drawBorder: false,
                    color: '#FFFFFF',                    
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

</script>

<?php $this->load->view('gerais/footer-vendedor'); ?>