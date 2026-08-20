<?php $this->load->view('gerais/header', $menu); ?>
<?php $this->load->view('gerais/menu', $menu); ?>

<section>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('visao-geral') ?>">Visão Geral</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('vendas') ?>">Vendas</a></li>
            <li class="breadcrumb-item active">Venda por Cliente</a></li>
        </ol>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card  mb-3">   
                    <h6 class="card-header bg-white text-muted">
                        Total por cliente
                    </h6>              
                    <div class="card-body">
                        <div class="tab-content" id="nav-tabContent">
                            <?php if($lista_cliente != null) { ?>
                            <div class="row mb-3">
                                <div class="col-md-12 text-center">
                                    <canvas id="graph-cliente"></canvas>
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
                <div class="row">
                    <div class="col-md-12">
                        <form action="<?= base_url('relatorios/venda-cliente') ?>" method="get" class="mb-0 needs-validation" novalidate>
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
                                    <select id="inputCliente" name="cliente[]" data-style="btn-input-primary" multiple
                                        data-actions-box="true" class="selectpicker show-tick form-control"
                                        data-live-search="true" data-actions-box="true" title="Clientes">
                                        <?php $chave_cliente = 0; foreach($lista_cliente as $key_cliente => $cliente) { ?>
                                        <option value="<?= $cliente->cod_cliente ?>" <?php if($cod_cliente != null){if($cliente->cod_cliente == $cod_cliente[$chave_cliente]){ 
                                        if((count($cod_cliente) - 1) > $chave_cliente) {$chave_cliente = $chave_cliente + 1; } 
                                        echo "selected"; }}?>>
                                            <?= $cliente->cod_cliente ?> -
                                            <?= $cliente->nome_cliente ?></option>
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
                        <a class="nav-link active" id="movimentacoes-tab" data-toggle="tab" href="#movimentacoes" role="tab" aria-controls="movimentacoes" aria-selected="true">Vendas para Clientes</a>
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
                                                <th scope="col">Cliente</th>
                                                <th scope="col" class="text-right align-middle">Produtos</th>
                                                <th scope="col" class="text-right align-middle">Adicionais</th>
                                                <th scope="col" class="text-right align-middle">Desconto</th>
                                                <th scope="col" class="text-right align-middle">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-sm">
                                            <?php foreach($lista_cliente_detalhada as $key_cliente_detalhada => $cliente_detalhada) { ?>
                                                <tr>
                                                    <td class="text-center align-middle">
                                                        <?= str_replace('-', '/', date("d-m-Y", strtotime($cliente_detalhada->data_venda))) ?>                                                       
                                                    </td>
                                                    <td class="limit-text-40 align-middle align-middle" data-toggle="tooltip" data-placement="bottom" title="<?= $cliente_detalhada->cod_cliente ?> - <?= $cliente_detalhada->nome_cliente ?>">
                                                    <a href="#" data-toggle="modal" class="text-dark"
                                                                        data-target="#venda-cliente<?= $cliente_detalhada->num_faturamento ?>"><?php
                                                            if($cliente_detalhada->cod_cliente <> 0)
                                                                echo $cliente_detalhada->cod_cliente . " - " . $cliente_detalhada->nome_cliente;
                                                            else
                                                                echo "Consumidor Final";
                                                        ?></a><br>
                                                        <span class="badge bg-info-light"><?= $cliente_detalhada->tipo_venda ?></span>
                                                        <span class="badge font-italic text-muted"><?= $cliente_detalhada->num_venda ?>
                                                            </span>
                                                    </td>
                                                    <td class="text-right align-middle <?php if($cliente_detalhada->valor_bruto > 0) echo "text-teal"; else echo "text-muted"; ?>">
                                                        R$ <?= number_format($cliente_detalhada->valor_bruto, 2, ',', '.') ?>
                                                    </td>
                                                    <td class="text-right align-middle <?php if(($cliente_detalhada->valor_frete + $cliente_detalhada->valor_seguro + $cliente_detalhada->outras_despesas) > 0) echo "text-teal"; else echo "text-muted"; ?>">
                                                        R$ <?= number_format($cliente_detalhada->valor_frete + $cliente_detalhada->valor_seguro + $cliente_detalhada->outras_despesas, 2, ',', '.') ?>
                                                    </td>
                                                    <td class="text-right align-middle <?php if($cliente_detalhada->valor_desconto > 0) echo "text-danger"; else echo "text-muted"; ?>">
                                                        R$ <?= number_format($cliente_detalhada->valor_desconto, 2, ',', '.') ?>
                                                    </td>
                                                    <td class="text-right align-middle text-teal font-weight-bold">
                                                        R$ <?= number_format($cliente_detalhada->valor_bruto + $cliente_detalhada->valor_frete + $cliente_detalhada->valor_seguro + $cliente_detalhada->outras_despesas - $cliente_detalhada->valor_desconto, 2, ',', '.') ?>
                                                </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php if ($lista_cliente_detalhada == false) { ?>
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

<?php foreach ($lista_cliente_detalhada as $key_venda => $venda) { ?>
<div class="modal fade" id="venda-cliente<?= $venda->num_faturamento ?>">
    <div class="modal-dialog modal-dialog-centered modal-xxl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detalhes da venda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modal-body-scroll bg-light">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body border-bottom">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5 class="card-title mb-0">
                                            <strong>
                                                <?php 
                                                if($venda->cod_cliente <> 0)
                                                    echo $venda->cod_cliente . " - " . $venda->nome_cliente;
                                                else
                                                    echo "Consumidor Final";
                                                ?>
                                            </strong>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-borderless table-sm mb-0">
                                            <tbody>
                                                <tr>
                                                    <td class="text-left align-middle">
                                                        Tipo de venda
                                                    </td>
                                                    <td class="text-right align-middle">
                                                        <?= $venda->tipo_venda ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle">
                                                        Pedido
                                                    </td>
                                                    <td class="text-right align-middle">
                                                        <strong><?= $venda->num_venda ?></strong>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle">
                                                        Faturamento
                                                    </td>
                                                    <td class="text-right align-middle">
                                                        <?= $venda->num_faturamento ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle">
                                                        Data
                                                    </td>
                                                    <td class="text-right align-middle">
                                                        <?= str_replace('-', '/', date("d-m-Y", strtotime($venda->data_venda))) ?> 
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <?php if($venda->nome_usuario != null){ ?>
                                        <table class="table table-borderless table-sm mb-0">
                                            <tbody>
                                                <tr>
                                                    <td class="text-left align-middle">
                                                        Usuário de venda
                                                    </td>
                                                    <td class="text-right align-middle">
                                                        <?= $venda->nome_usuario ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <?php } ?> 
                                        <?php if($venda->cod_vendedor != null){ ?>                              
                                        <table class="table table-borderless table-sm mb-0">
                                            <tbody>
                                                <tr>
                                                    <td class="text-left align-middle ">
                                                        Vendedor
                                                    </td>
                                                    <td class="text-right align-middle">
                                                        <?= $venda->nome_vendedor ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle ">
                                                        Comissão
                                                    </td>
                                                    <td class="text-right align-middle <?php if($venda->perc_comissao > 0) echo "text-info"; else echo "text-muted"; ?>">
                                                        <?= number_format($venda->perc_comissao, 2, ',', '.') ?>%
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <?php } ?>                                        
                                        <?php if($venda->cod_transportador != 0) { ?>
                                        <table class="table table-borderless table-sm mb-0">
                                            <tbody>
                                                <tr>
                                                    <td class="text-left align-middle ">
                                                        Transportador
                                                    </td>
                                                    <td class="text-right align-middle">
                                                        <?= $venda->nome_transportador ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <?php } ?>                                        
                                        <table class="table table-borderless table-sm">
                                            <tbody>
                                                <tr>
                                                    <td class="text-left align-middle">
                                                        Total em produtos
                                                    </td>
                                                    <td
                                                        class="text-right align-middle <?php if($venda->valor_bruto > 0) echo "text-teal"; else echo "text-muted"; ?>">
                                                        R$ <?= number_format($venda->valor_bruto, 2, ',', '.') ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle ">
                                                        Frete <?php if($venda->tipo_frete == 1) echo "CIF"; elseif($venda->tipo_frete == 2) echo "FOB"; else echo ""; ?>
                                                    </td>
                                                    <td
                                                        class="text-right align-middle <?php if($venda->valor_frete > 0) echo "text-teal"; else echo "text-muted"; ?>">
                                                        R$ <?= number_format($venda->valor_frete, 2, ',', '.') ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle">
                                                        Seguro
                                                    </td>
                                                    <td
                                                        class="text-right align-middle <?php if($venda->valor_seguro > 0) echo "text-teal"; else echo "text-muted"; ?>">
                                                        R$ <?= number_format($venda->valor_seguro, 2, ',', '.') ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle ">
                                                        Outras despesas
                                                    </td>
                                                    <td
                                                        class="text-right align-middle <?php if($venda->outras_despesas > 0) echo "text-teal"; else echo "text-muted"; ?>">
                                                        R$
                                                        <?= number_format($venda->outras_despesas, 2, ',', '.') ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle">
                                                        Desconto
                                                    </td>
                                                    <td
                                                        class="text-right align-middle <?php if($venda->valor_desconto > 0) echo "text-danger"; else echo "text-muted"; ?>">
                                                        R$
                                                        <?= number_format($venda->valor_desconto, 2, ',', '.') ?>
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
                                            <td class="text-left pt-0 text-dark"><strong>TOTAL VENDA</strong></td>
                                            <td
                                                class="text-right pt-0 text-teal">
                                                <strong>
                                                    R$ <?= number_format($venda->valor_bruto + $venda->valor_frete + $venda->valor_seguro + $venda->outras_despesas -
                                                      $venda->valor_desconto, 2, ',', '.') ?>
                                                </strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <?php if($venda->observacoes != "") { ?>
                        <div class="card  mt-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 mb-2">
                                        <p class="card-text text-muted mb-0">Observação</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <?= $venda->observacoes ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="col-md-8 pl-0">
                        <ul class="nav nav-tabs mb-3">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#prod-faturado<?= $venda->num_faturamento ?>">Produtos Vendidos</a>
                            </li>
                        </ul>
                        <div class="card">
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane fade active show" id="prod-faturado<?= $venda->num_faturamento ?>">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered">
                                                        <thead class="thead-light">
                                                            <tr>
                                                                <th scope="col">Produto</th>
                                                                <th scope="col" class="text-right">Quantidade</th>
                                                                <th scope="col" class="text-right">Total</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $i = 0; foreach ($lista_produto_detalhada as $key_faturamento_produto => $faturamento_produto) {
                                                                if ($faturamento_produto->venda == $venda->num_faturamento) { $i += 1; ?>
                                                            <tr>
                                                                <td class="limit-text-50 align-middle" data-toggle="tooltip"
                                                                    data-placement="bottom"
                                                                    title="<?= $faturamento_produto->nome_produto ?>">
                                                                    <?= $faturamento_produto->cod_produto ?> - <?= $faturamento_produto->nome_produto ?>
                                                                </td>
                                                                <td class="text-right text-info align-middle">
                                                                    <?= number_format($faturamento_produto->quant_venda, 3, ',', '.') ?>
                                                                    <?= $faturamento_produto->cod_unidade_medida ?>
                                                                </td>
                                                                <td class="text-right text-teal align-middle">
                                                                    R$
                                                                    <?= number_format($faturamento_produto->valor_venda, 2, ',', '.') ?>
                                                                </td>
                                                            </tr>
                                                            <?php }
                                                            } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <?php if ($i == 0) { ?>
                                                <div class="text-center text-muted">
                                                     <p class="font-italic mt-3">Nenhum produto para vender</p>
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
        a.download = 'VTech - Venda Por Cliente.xls';
        a.click();
        e.preventDefault();
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

<?php $this->load->view('gerais/footer'); ?>