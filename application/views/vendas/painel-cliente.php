<?php $this->load->view('gerais/header', $menu); ?>
<?php $this->load->view('gerais/menu', $menu); ?>

<section>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('visao-geral') ?>">Visão Geral</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('vendas') ?>">Vendas</a></li>
            <li class="breadcrumb-item active">Painel de Cliente</a></li>
        </ol>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card  mb-3"> 
                    <h6 class="card-header bg-white text-muted">
                        Carteira de clientes
                    </h6>                 
                    <div class="card-body">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="row mb-3">
                                <div class="col-md-12 text-center">
                                    <canvas id="graph-cliente"></canvas>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12 height-scroll-200">
                                            <table class="table table-borderless table-sm mb-0 small2">
                                                <tbody>
                                                    <tr>
                                                        <td class="text-left limit-text-30"><i
                                                                class="fa fa-circle fa-xs pr-2 text-teal"></i>
                                                            Clientes ativos
                                                        </td>
                                                        <td class="text-right text-teal">
                                                            <?= $carteira_cliente->num_clientes_ativos ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left limit-text-30"><i
                                                                class="fa fa-circle fa-xs pr-2 text-warning"></i>
                                                            Clientes inativos recentes
                                                        </td>
                                                        <td class="text-right text-warning">
                                                            <?= $carteira_cliente->num_clientes_inativos_recentes ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left limit-text-30"><i
                                                                class="fa fa-circle fa-xs pr-2 text-danger"></i>
                                                            Clientes inativos
                                                        </td>
                                                        <td class="text-right text-danger">
                                                            <?= $carteira_cliente->num_clientes_inativos ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left limit-text-30"><i
                                                                class="fa fa-circle fa-xs pr-2 text-muted"></i>
                                                            Clientes sem compra
                                                        </td>
                                                        <td class="text-right text-muted">
                                                            <?= $carteira_cliente->num_clientes_sem_compra ?>
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
                    <div class="card-footer">
                        <table class="table table-borderless table-sm mb-1">
                            <tbody>
                                <tr>
                                    <td class="text-left pt-0 text-dark"><strong>TOTAL DE CLIENTES</strong></td>
                                    <td class="text-right pt-0 text-dark">
                                        <strong>
                                            <?= $carteira_cliente->total_cliente ?>
                                        </strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>                
            </div>
            <div class="col-md-8 pl-0">
                <nav>
                    <div class="nav nav-pills flex-column flex-sm-row mb-3" id="nav-tab" role="tablist">
                        <a class="flex-sm-fill text-sm-center nav-item nav-link active" id="ativo-tab" data-toggle="tab" href="#ativo" role="tab" aria-controls="ativo" aria-selected="true"><i
                                                                class="fa fa-circle fa-xs pr-2 text-teal"></i> Ativos</a>
                        <a class="flex-sm-fill text-sm-center nav-item nav-link" data-toggle="tab" href="#inativo-recente" role="tab" aria-controls="inativo-recente" aria-selected="false"><i
                                                                class="fa fa-circle fa-xs pr-2 text-warning"></i> Inativos Recentes</a>
                        <a class="flex-sm-fill text-sm-center nav-item nav-link" data-toggle="tab" href="#inativo" role="tab" aria-controls="inativo" aria-selected="false"><i
                                                                class="fa fa-circle fa-xs pr-2 text-danger"></i> Inativos</a>
                        <a class="flex-sm-fill text-sm-center nav-item nav-link" data-toggle="tab" href="#sem-compra" role="tab" aria-controls="sem-compra" aria-selected="false"><i
                                                                class="fa fa-circle fa-xs pr-2 text-muted"></i> Sem Compra</a>
                    </div>
                </nav>
                <div class="card  mb-5">
                    <div class="card-body">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="ativo"> 
                                <div class="table-responsive">
                                    <table class="table table-bordered table-reporte">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col" class="text-center small2 align-middle"><i class="fa-regular fa-circle"></i></th>
                                                <th scope="col">Cliente</th>
                                                <th scope="col" class="text-center align-middle">Última venda</th>
                                                <th scope="col" class="text-right align-middle">Total vendido</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-sm">
                                            <?php foreach($clientes_ativos as $key_ativos => $ativo) { ?>
                                                <tr>
                                                    <td class="text-center align-middle small2">
                                                        <i class="fa fa-circle text-teal"></i>                                                      
                                                    </td>
                                                    <td class="limit-text-40 align-middle align-middle" data-toggle="tooltip" data-placement="bottom" title="<?= $ativo->cod_cliente ?> - <?= $ativo->nome_cliente ?>">
                                                    <a class="link-load text-dark" 
                                                            href="<?= base_url("painel/clientes/detalhe-cliente/{$ativo->cod_cliente}") ?>">
                                                        <?php echo $ativo->cod_cliente . " - " . $ativo->nome_cliente; ?></a><br>
                                                        <span class="badge bg-info-light">
                                                        <?php
                                                            if($ativo->tipo_pessoa == 1){
                                                                echo "Pessoa Jurídica";
                                                            }elseif($ativo->tipo_pessoa == 2){
                                                                echo "Pessoa Física";
                                                            }elseif($ativo->tipo_pessoa == 3){
                                                                echo "Pessoa Estrangeira";
                                                            }
                                                        ?>
                                                         </span>
                                                        <span class="badge font-italic text-muted"><?= $ativo->razao_social ?>
                                                            </span>
                                                    </td>
                                                    <td class="text-center align-middle text-dark">
                                                        <?= $ativo->dias_ult_venda ?> dias
                                                    </td>
                                                    <td class="text-right align-middle text-teal">
                                                        R$ <?= number_format($ativo->total_vendido, 2, ',', '.') ?>
                                                </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php if ($clientes_ativos == false) { ?>
                                    <div class="text-center text-muted">
                                        <p class="font-italic mt-3">Nenhuma cliente encontrado</p>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="tab-pane fade" id="inativo-recente">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-reporte">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col" class="text-center small2 align-middle"><i class="fa-regular fa-circle"></i></th>
                                                <th scope="col">Cliente</th>
                                                <th scope="col" class="text-center align-middle">Última venda</th>
                                                <th scope="col" class="text-right align-middle">Total vendido</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-sm">
                                            <?php foreach($clientes_inativos_recentes as $key_recentes => $recente) { ?>
                                                <tr>
                                                    <td class="text-center align-middle small2">
                                                        <i class="fa fa-circle text-warning"></i>                                                      
                                                    </td>
                                                    <td class="limit-text-40 align-middle align-middle" data-toggle="tooltip" data-placement="bottom" title="<?= $recente->cod_cliente ?> - <?= $recente->nome_cliente ?>">
                                                    <a class="link-load text-dark" 
                                                            href="<?= base_url("painel/clientes/detalhe-cliente/{$recente->cod_cliente}") ?>">
                                                        <?php echo $recente->cod_cliente . " - " . $recente->nome_cliente; ?></a><br>
                                                        <span class="badge bg-info-light">
                                                        <?php
                                                            if($recente->tipo_pessoa == 1){
                                                                echo "Pessoa Jurídica";
                                                            }elseif($recente->tipo_pessoa == 2){
                                                                echo "Pessoa Física";
                                                            }elseif($recente->tipo_pessoa == 3){
                                                                echo "Pessoa Estrangeira";
                                                            }
                                                        ?>
                                                         </span>
                                                        <span class="badge font-italic text-muted"><?= $recente->razao_social ?>
                                                            </span>
                                                    </td>
                                                    <td class="text-center align-middle text-dark">
                                                        <?= $recente->dias_ult_venda ?> dias
                                                    </td>
                                                    <td class="text-right align-middle text-teal">
                                                        R$ <?= number_format($recente->total_vendido, 2, ',', '.') ?>
                                                </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php if ($clientes_inativos_recentes == false) { ?>
                                    <div class="text-center text-muted">
                                        <p class="font-italic mt-3">Nenhuma cliente encontrado</p>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="tab-pane fade" id="inativo">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-reporte">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col" class="text-center small2 align-middle"><i class="fa-regular fa-circle"></i></th>
                                                <th scope="col">Cliente</th>
                                                <th scope="col" class="text-center align-middle">Última venda</th>
                                                <th scope="col" class="text-right align-middle">Total vendido</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-sm">
                                            <?php foreach($clientes_inativos as $key_inativo => $inativo) { ?>
                                                <tr>
                                                    <td class="text-center align-middle small2">
                                                        <i class="fa fa-circle text-danger"></i>                                                      
                                                    </td>
                                                    <td class="limit-text-40 align-middle align-middle" data-toggle="tooltip" data-placement="bottom" title="<?= $inativo->cod_cliente ?> - <?= $inativo->nome_cliente ?>">
                                                    <a class="link-load text-dark" 
                                                            href="<?= base_url("painel/clientes/detalhe-cliente/{$inativo->cod_cliente}") ?>">
                                                        <?php echo $inativo->cod_cliente . " - " . $inativo->nome_cliente; ?></a><br>
                                                        <span class="badge bg-info-light">
                                                        <?php
                                                            if($inativo->tipo_pessoa == 1){
                                                                echo "Pessoa Jurídica";
                                                            }elseif($inativo->tipo_pessoa == 2){
                                                                echo "Pessoa Física";
                                                            }elseif($inativo->tipo_pessoa == 3){
                                                                echo "Pessoa Estrangeira";
                                                            }
                                                        ?>
                                                         </span>
                                                        <span class="badge font-italic text-muted"><?= $inativo->razao_social ?>
                                                            </span>
                                                    </td>
                                                    <td class="text-center align-middle text-dark">
                                                        <?= $inativo->dias_ult_venda ?> dias
                                                    </td>
                                                    <td class="text-right align-middle text-teal">
                                                        R$ <?= number_format($inativo->total_vendido, 2, ',', '.') ?>
                                                </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php if ($clientes_inativos == false) { ?>
                                    <div class="text-center text-muted">
                                        <p class="font-italic mt-3">Nenhuma cliente encontrado</p>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="tab-pane fade" id="sem-compra">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-reporte">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col" class="text-center small2 align-middle"><i class="fa-regular fa-circle"></i></th>
                                                <th scope="col">Cliente</th>
                                                <th scope="col" class="text-center align-middle">Última venda</th>
                                                <th scope="col" class="text-right align-middle">Total vendido</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-sm">
                                            <?php foreach($clientes_sem_compra as $key_compra => $compra) { ?>
                                                <tr>
                                                    <td class="text-center align-middle small2">
                                                        <i class="fa fa-circle text-muted"></i>                                                      
                                                    </td>
                                                    <td class="limit-text-40 align-middle align-middle" data-toggle="tooltip" data-placement="bottom" title="<?= $compra->cod_cliente ?> - <?= $compra->nome_cliente ?>">
                                                    <a class="link-load text-dark" 
                                                            href="<?= base_url("painel/clientes/detalhe-cliente/{$compra->cod_cliente}") ?>">
                                                        <?php echo $compra->cod_cliente . " - " . $compra->nome_cliente; ?></a><br>
                                                        <span class="badge bg-info-light">
                                                        <?php
                                                            if($compra->tipo_pessoa == 1){
                                                                echo "Pessoa Jurídica";
                                                            }elseif($compra->tipo_pessoa == 2){
                                                                echo "Pessoa Física";
                                                            }elseif($compra->tipo_pessoa == 3){
                                                                echo "Pessoa Estrangeira";
                                                            }
                                                        ?>
                                                         </span>
                                                        <span class="badge font-italic text-muted"><?= $compra->razao_social ?>
                                                            </span>
                                                    </td>
                                                    <td class="text-center align-middle text-muted">
                                                        nunca comprou
                                                    </td>
                                                    <td class="text-right align-middle text-muted">
                                                        R$ <?= number_format($compra->total_vendido, 2, ',', '.') ?>
                                                </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php if ($clientes_sem_compra == false) { ?>
                                    <div class="text-center text-muted">
                                        <p class="font-italic mt-3">Nenhuma cliente encontrado</p>
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
                    Relatório detalhado de vendas para clientes: <?= str_replace('-', '/', date("d-m-Y", strtotime($dataInicio))) ?> até  <?= str_replace('-', '/', date("d-m-Y", strtotime($dataFim))) ?>
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
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">CLIENTE</th> 
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">VENDA</th>                
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">TOTAL PRODUTOS</th>
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">FRETE</th>
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">SEGURO</th>
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">OUTRAS DESPESAS</th>
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">DESCONTO</th>
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">TOTAL</th>   
            </tr>
        </thead>
        <tbody>
            <?php foreach($lista_cliente_detalhada as $key_cliente_detalhada => $cliente_detalhada) { ?>
            <tr>
                <td style="border: 1px solid">
                    <?= str_replace('-', '/', date("d-m-Y", strtotime($cliente_detalhada->data_venda))) ?>
                </td>
                <td style="border: 1px solid">
                <?php
                    if($cliente_detalhada->cod_cliente <> 0)
                        echo $cliente_detalhada->cod_cliente . " - " . $cliente_detalhada->nome_cliente;
                    else
                        echo "0 - Consumidor Final";
                ?>
                </td>
                <td style="border: 1px solid">
                    <?= $cliente_detalhada->num_venda ?>
                </td>
                <td style="border: 1px solid">
                    R$ <?= number_format($cliente_detalhada->valor_bruto, 2, ',', '.') ?>
                </td> 
                <td style="border: 1px solid">
                    R$ <?= number_format($cliente_detalhada->valor_frete, 2, ',', '.') ?>
                </td> 
                <td style="border: 1px solid">
                    R$ <?= number_format($cliente_detalhada->valor_seguro, 2, ',', '.') ?>
                </td> 
                <td style="border: 1px solid">
                    R$ <?= number_format($cliente_detalhada->outras_despesas, 2, ',', '.') ?>
                </td> 
                <td style="border: 1px solid">
                    R$ <?= number_format($cliente_detalhada->valor_desconto, 2, ',', '.') ?>
                </td>
                <td style="border: 1px solid">
                    R$ <?= number_format($cliente_detalhada->valor_bruto + $cliente_detalhada->valor_frete + $cliente_detalhada->valor_seguro + $cliente_detalhada->outras_despesas - $cliente_detalhada->valor_desconto, 2, ',', '.') ?>
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
        a.download = 'ShopFloor - Venda Por Cliente.xls';
        a.click();
        e.preventDefault();
    });

    new Chart(document.getElementById("graph-cliente"), {
    type: 'doughnut',
    data: {
        labels: ['Clientes Ativos', 'Clientes Inativos Recentes', 'Clientes Inativos', 'Clientes Sem Compra'],
        datasets: [{
            label: "Carteira de Clientes",
            backgroundColor: ['#20c997', '#F47C3C', '#d9534f', '#8E8C84'],
            data: [<?= $carteira_cliente->perc_clientes_ativo ?>, <?= $carteira_cliente->perc_clientes_inativos_recentes ?>, 
                   <?= $carteira_cliente->perc_clientes_inativos ?>, <?= $carteira_cliente->perc_clientes_sem_compra ?>],
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