<?php $this->load->view('gerais/header', $menu); ?>
<?php $this->load->view('gerais/menu', $menu); ?>

<section>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('visao-geral') ?>">Visão Geral</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('vendas') ?>">Vendas</a></li>
            <li class="breadcrumb-item active">Painel de Vendedor</li>
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
                                        <a href="<?= base_url("painel/vendedores/{$mes_anterior}/{$ano_anterior}") ?>" class="btn btn-secondary link-load"><i class="fas fa-angle-left"></i></a>
                                    </div>
                                    <input type="text" class="form-control search text-center filtro-data" value="<?= $descMes ?> de <?= $ano ?>" readonly>
                                    <div class="input-group-append">
                                        <a href="<?= base_url("painel/vendedores/{$mes_seguinte}/{$ano_seguinte}") ?>" class="btn btn-secondary link-load"><i class="fas fa-angle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>     
                            
                <div class="card  mb-3">
                    <h6 class="card-header bg-white text-muted">
                        Meta de vendas
                    </h6> 
                    <div class="card-body">
                        <?php if ($lista_vendedor != null) { ?>
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
                                                <td class="text-left"><i class="fa fa-circle fa-xs text-teal pr-2"></i>
                                                    Total vendido
                                                </td>
                                                <td
                                                    class="text-right <?php if($lista_valores->total_produto > 0) echo "text-teal"; ?>">
                                                    R$
                                                    <?= number_format((float) ($lista_valores->total_produto), 2, ',', '.') ?>
                                                </td>
                                            </tr>
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
                                                <td class="text-left"><i class="fa fa-circle fa-xs text-info pr-2"></i>
                                                    Total comissão
                                                </td>
                                                <td
                                                    class="text-right <?php if($lista_valores->total_comissao > 0) echo "text-info"; ?>">
                                                    R$
                                                    <?= number_format((float) ($lista_valores->total_comissao), 2, ',', '.') ?>
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
                                    <td class="text-left pt-0 text-dark"><strong>ATING. DA META</strong></td>
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
            <div class="col-md-8 pl-0">
                <ul class="nav nav-tabs mb-3">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#metas-vendas"><i class="fa-solid fa-chart-simple text-teal pr-1"></i> Metas de Vendas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#comissao-vendedor"><i class="fa-solid fa-hand-holding-dollar text-warning pr-1"></i> Comissões</a>
                    </li>
                </ul>
                <div class="card  mb-5">
                    <div class="card-body">  
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="metas-vendas" role="tabpanel" aria-labelledby="despesas-tab">                      
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col" class="text-center small2 align-middle"><i class="fa-regular fa-circle"></i></th>
                                                <th scope="col">Vendedor</th>
                                                <th scope="col" class="text-right">Vendido</th>
                                                <th scope="col" class="text-right">Meta</th>
                                                <th scope="col" class="text-right">Atingimento</th>
                                            </tr>
                                        </thead>
                                        <?php if ($lista_vendedor != false) { ?>
                                        <tbody>
                                            <?php
                                            foreach ($lista_vendedor as $key_vendedor => $vendedor) { ?>
                                                <tr>
                                                    <td scope="row" class="text-center align-middle small2">
                                                        <i class="text-muted"><i class='fa-solid fa-circle' style="color: <?= $vendedor->color ?>"></i></i>
                                                    </td>
                                                    <td scope="row">
                                                        <a href="#" data-toggle="modal" class="text-dark" data-target="#vendas-vendedor<?= $vendedor->cod_vendedor ?>"><?= $vendedor->nome_vendedor ?></a>
                                                    </td>
                                                    <td class="text-right <?php if ($vendedor->total_vendas > 0) echo "text-teal"; ?>">
                                                        R$ <?= number_format((float) ($vendedor->total_vendas), 2, ',', '.') ?>
                                                    </td>
                                                    <td class="text-right <?php if ($vendedor->meta > 0) echo "text-info"; ?>">
                                                        R$ <?= number_format((float) ($vendedor->meta), 2, ',', '.') ?>
                                                    </td>
                                                    <td class="text-right <?php if ($vendedor->variacao >= 100) echo "text-teal";
                                                                            elseif ($vendedor->variacao > 50 && $vendedor->variacao < 100) echo "text-warning";
                                                                            elseif ($vendedor->variacao > 0  && $vendedor->variacao < 50) echo "text-danger"; ?>">
                                                                            
                                                        <?= number_format((float) ($vendedor->variacao), 1, ',', '.') ?>%
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                        <?php } ?>
                                        <tbody>
                                            <tr>
                                                <td class="text-left align-middle" colspan="4">
                                                    <i>Total vendido</i>
                                                </td>
                                                <td class="text-right align-middle <?php if ($lista_valores->total_produto > 0) echo "text-teal"; ?>">
                                                    R$ <?= number_format((float) ($lista_valores->total_produto), 2, ',', '.') ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="comissao-vendedor" role="tabpanel" aria-labelledby="comissao-vendedor-tab"> 
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col" class="text-center small2 align-middle"><i class="fa-regular fa-circle"></i></th>
                                                <th scope="col">Vendedor</th>
                                                <th scope="col" class="text-right">Vendido</th>
                                                <th scope="col" class="text-right">Comissão</th>
                                            </tr>
                                        </thead>
                                        <?php if ($lista_vendedor != false) { ?>
                                        <tbody>
                                            <?php
                                            $comissaoAcum = 0;
                                            foreach ($lista_vendedor as $key_vendedor => $vendedor) { ?>
                                                <tr>
                                                    <td scope="row" class="text-center align-middle small2">
                                                        <i class="text-muted"><i class='fa-solid fa-circle' style="color: <?= $vendedor->color ?>"></i></i>
                                                    </td>
                                                    <td scope="row">
                                                        <a href="#" data-toggle="modal" class="text-dark" data-target="#vendas-vendedor<?= $vendedor->cod_vendedor ?>"><?= $vendedor->nome_vendedor ?></a>
                                                    </td>
                                                    <td class="text-right <?php if ($vendedor->total_vendas > 0) echo "text-teal"; ?>">
                                                        R$ <?= number_format((float) ($vendedor->total_vendas), 2, ',', '.') ?>
                                                    </td>
                                                    <td class="text-right <?php if ($vendedor->total_comissao > 0) echo "text-teal"; ?>">
                                                                            
                                                        R$ <?= number_format((float) ($vendedor->total_comissao), 2, ',', '.') ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                        <?php } ?>
                                        <tbody>
                                            <tr>
                                                <td class="text-left align-middle" colspan="3">
                                                    <i>Total comissão</i>
                                                </td>
                                                <td class="text-right align-middle <?php if ($lista_valores->total_comissao > 0) echo "text-teal"; ?>">
                                                    R$ <?= number_format((float) ($lista_valores->total_comissao), 2, ',', '.') ?>
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
        </div>
        <br>
    </div>
</section>

<?php foreach ($lista_vendedor as $key_vendedor => $vendedor) { ?>
    <div class="modal fade" id="vendas-vendedor<?= $vendedor->cod_vendedor ?>">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Vendas de <i><?= $vendedor->nome_vendedor ?></i></h5>
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
                                                            <th scope="col" class="text-center small2 align-middle"><i class="fa-regular fa-circle"></i></th>
                                                            <th scope="col" class="text-center">Data</th>
                                                            <th scope="col" class="text-center">Pedido</th>
                                                            <th scope="col">Cliente</th>
                                                            <th scope="col" class="text-right">Valor vendido</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="">
                                                        <?php $i = 0;
                                                        foreach($lista_vendedor_cliente as $key_vendedor_cliente => $vendedor_cliente) {
                                                            if ($vendedor->cod_vendedor === $vendedor_cliente->cod_vendedor) {
                                                                $i += 1; ?>
                                                                <tr>
                                                                    <td class="text-center align-middle small2">
                                                                        <i class="text-muted"><i class='fa-solid fa-circle' style="color: <?= $vendedor->color ?>"></i></i>
                                                                    </td>
                                                                    <td class="text-center align-middle">
                                                                        <?= str_replace('-', '/', date("d-m-Y", strtotime($vendedor_cliente->data_faturamento))) ?>
                                                                    </td>
                                                                    <td class="text-center align-middle"><?= $vendedor_cliente->num_pedido_venda ?>  </td>
                                                                    </td>
                                                                    <td class="limit-text-40 align-middle align-middle" data-toggle="tooltip" data-placement="bottom" title="<?= $vendedor_cliente->cod_cliente . " - " . $vendedor_cliente->nome_cliente; ?>">
                                                                    <?php
                                                                        if($vendedor_cliente->cod_cliente <> 0)
                                                                            echo $vendedor_cliente->cod_cliente . " - " . $vendedor_cliente->nome_cliente;
                                                                        else
                                                                            echo "0 - CONSUMIDOR FINAL";
                                                                    ?>
                                                                    </td>
                                                                    <td class="text-right align-middle text-teal">
                                                                        R$ <?= number_format((float) ($vendedor_cliente->valor_bruto), 2, ',', '.') ?>
                                                                    </td>
                                                                </tr>
                                                        <?php }
                                                        } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <?php if ($i == 0) { ?>
                                                <div class="text-center text-muted">
                                                    <p class="font-italic mt-3">Nenhuma venda realizada</p>
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
                    <a href="<?= base_url("painel/vendedores/detalhe-vendedor/{$vendedor->cod_vendedor}") ?>" type="button" class="btn btn-info link-load"><i class="fa-solid fa-address-card"></i> Detalhes do vendedor</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<div class="modal fade" id="pagar-comissao" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-xxl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pagar comissão</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modal-body-scroll bg-light">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card  mb-3">
                            <div class="card-body border-bottom">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5 class="card-title mb-0">
                                            <strong>
                                                Período de <?= $descMes ?> de <?= $ano ?>
                                            </strong>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-borderless table-sm">
                                            <tbody>
                                                <tr>
                                                    <td class="text-left align-middle">
                                                        Total produto
                                                    </td>
                                                    <td
                                                        class="text-right align-middle <?php if($frente_caixa->total_produto > 0) echo "text-teal"; else echo "text-muted"; ?>">
                                                        R$
                                                        <?= number_format((float) ($frente_caixa->total_produto), 2, ',', '.') ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle">
                                                        Total frete
                                                    </td>
                                                    <td
                                                        class="text-right align-middle <?php if($frente_caixa->total_frete > 0) echo "text-teal"; else echo "text-muted"; ?>">
                                                        R$ <?= number_format((float) ($frente_caixa->total_frete), 2, ',', '.') ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle">
                                                        Total desconto
                                                    </td>
                                                    <td
                                                        class="text-right align-middle <?php if($frente_caixa->total_desconto > 0) echo "text-danger"; else echo "text-muted"; ?>">
                                                        R$
                                                        <?= number_format((float) ($frente_caixa->total_desconto), 2, ',', '.') ?>
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
                                            <td id="idTdTotalPedido"
                                                class="text-right pt-0 <?php if(($frente_caixa->total_produto + $frente_caixa->total_frete - $frente_caixa->total_desconto) > 0) echo "text-teal"; ?>">
                                                <strong>
                                                    R$
                                                    <?= number_format((float) (($frente_caixa->total_produto + $frente_caixa->total_frete - $frente_caixa->total_desconto)), 2, ',', '.') ?>
                                                </strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card">
                            <h6 class="card-header bg-white text-muted">
                                Saldo do caixa
                            </h6>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-borderless table-sm">
                                            <tbody>
                                                <tr>
                                                    <td class="text-left align-middle ">
                                                        Saldo inicial
                                                    </td>
                                                    <td
                                                        class="text-right align-middle <?php if($frente_caixa->saldo_inicial > 0) echo "text-teal"; else echo "text-muted"; ?>">
                                                        R$
                                                        <?= number_format((float) ($frente_caixa->saldo_inicial), 2, ',', '.') ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle">
                                                        Total recolhido
                                                    </td>
                                                    <td
                                                        class="text-right align-middle <?php if($frente_caixa->total_recolhimento > 0) echo "text-danger"; else echo "text-muted"; ?>">
                                                        R$
                                                        <?= number_format((float) ($frente_caixa->total_recolhimento), 2, ',', '.') ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle ">
                                                        Total incrementado
                                                    </td>
                                                    <td
                                                        class="text-right align-middle <?php if($frente_caixa->total_incremento > 0) echo "text-teal"; else echo "text-muted"; ?>">
                                                        R$
                                                        <?= number_format((float) ($frente_caixa->total_incremento), 2, ',', '.') ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle ">
                                                        Total vendido
                                                    </td>
                                                    <td
                                                        class="text-right align-middle <?php if($frente_caixa->total_venda > 0) echo "text-teal"; else echo "text-muted"; ?>">
                                                        R$ <?= number_format((float) ($frente_caixa->total_venda), 2, ',', '.') ?>
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
                                            <td class="text-left pt-0 text-dark"><strong>SALDO FINAL</strong></td>
                                            <td
                                                class="text-right pt-0 <?php if(($frente_caixa->saldo_inicial + $frente_caixa->total_venda + $frente_caixa->total_incremento - $frente_caixa->total_recolhimento) > 0) echo "text-teal"; ?>">
                                                <strong>
                                                    R$
                                                    <?= number_format((float) ($frente_caixa->saldo_inicial + $frente_caixa->total_venda + $frente_caixa->total_incremento - $frente_caixa->total_recolhimento), 2, ',', '.') ?>
                                                </strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 pl-0">
                        <ul class="nav nav-tabs mb-3">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#pagamentos">Pagamentos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#movimentos-caixa">Movimentos Caixa</a>
                            </li>
                        </ul>
                        <form action="<?php echo base_url("vendas/fechar-caixa/{$dia}") ?>" method='post'
                            class="mb-0 needs-validation" novalidate id="fechaCaixa">
                            <div class="card">
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane fade active show" id="pagamentos">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered">
                                                            <thead class="thead-light">
                                                                <tr>
                                                                    <th scope="col">Origem da receita</th>
                                                                    <th scope="col" class="text-center">Vencimento do título
                                                                    </th>
                                                                    <th scope="col" class="text-right">Valor do titulo</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php 
                                                                $temValor = false;
                                                                $saldoCaixa = $frente_caixa->saldo_inicial + $frente_caixa->total_incremento - $frente_caixa->total_recolhimento;

                                                                $descontoReceita = 0;
                                                                if($saldoCaixa > 0) {
                                                                    $temValor = true;
                                                                ?>
                                                                <tr>
                                                                    <td>Devolução de Caixa</td>                                                                
                                                                    <td class="text-center">
                                                                        <?= str_replace('-', '/', date("d-m-Y", strtotime($frente_caixa->data_caixa))) ?>
                                                                    </td>
                                                                    <td class="text-right text-teal">R$
                                                                        <?= number_format((float) ($saldoCaixa), 2, ',', '.') ?>
                                                                    </td>
                                                                </tr>
                                                                <?php }else{
                                                                    $descontoReceita = $saldoCaixa;
                                                                } ?>
                                                                <?php 
                                                                    foreach($recebeimento_metodo as $key_recebeimento_metodo => $recebimento) { 
                                                                        $temValor = true; 

                                                                        $valorReceita = $recebimento->total_venda;
                                                                        if($frente_caixa->cod_metodo_pagamento == $recebimento->cod_metodo_pagamento)
                                                                            $valorReceita = $recebimento->total_venda + $descontoReceita;
                                                                ?>
                                                                <tr>
                                                                    <td><?= $recebimento->nome_metodo_pagamento ?></td>
                                                                    <?php if($recebimento->dias_recebimento <> 0) { ?>
                                                                    <td class="text-center">
                                                                        <?= str_replace('-', '/', date("d-m-Y", strtotime('+' . $recebimento->dias_recebimento . ' day', strtotime($recebimento->data_caixa)))) ?>
                                                                    </td>
                                                                    <?php }else{ ?>
                                                                    <td class="text-center">
                                                                        <?= str_replace('-', '/', date("d-m-Y", strtotime($recebimento->data_caixa))) ?>
                                                                    </td>
                                                                    <?php } ?>
                                                                    <td class="text-right text-teal">R$
                                                                        <?= number_format((float) ($valorReceita), 2, ',', '.') ?>
                                                                    </td>
                                                                </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <?php if($temValor == false) { ?>
                                                    <div class="text-center text-muted">
                                                        <p class="font-italic mt-3">Nenhum título para integrar ao financeiro</p>
                                                    </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="movimentos-caixa">
                                            <div class="row">
                                                <div class="col-md-12">   
                                                    <div class="table-responsive">                                                 
                                                        <table class="table table-bordered">
                                                            <thead class="thead-light">
                                                                <tr>
                                                                    <th scope="col" class="text-left">Movimento</th>
                                                                    <th scope="col">Observação</th>
                                                                    <th scope="col" class="text-right">Valor</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach($movimento_caixa as $key_movimento_caixa => $movimento) { ?>
                                                                <tr>
                                                                    <td class="text-left">
                                                                        <?php 
                                                                                if($movimento->tipo_movimento == 1)
                                                                                    echo "Incremento";
                                                                                else
                                                                                    echo "Recolhimento";
                                                                            ?>
                                                                    </td>
                                                                    <td>
                                                                        <?= $movimento->observacao ?>
                                                                    </td>
                                                                    <td
                                                                        class="text-right <?php if($movimento->tipo_movimento == 1) echo "text-teal"; else echo "text-danger"; ?>">
                                                                        R$
                                                                        <?= number_format((float) ($movimento->valor_movimento), 2, ',', '.') ?>
                                                                    </td>
                                                                </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <?php if($movimento_caixa == false) { ?>
                                                    <div class="text-center text-muted">
                                                        <p class="font-italic mt-3">Nenhum incremento ou recolhimento</p>
                                                    </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" type="button" class="btn btn-outline-warning btn-sm" id="btnImprimir"><i
                        class="fas fa-print"></i> Imprimir Fechamento</a>
                <button type="submit" class="btn btn-teal" name="Acao" value="Confirmar"
                    form="fechaCaixa"><i class="fa-solid fa-calendar-check"></i> Confirma</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>


<script>
    $('#inputDataInicio').datepicker({
        uiLibrary: 'bootstrap4'
    });
    $('#inputDataFim').datepicker({
        uiLibrary: 'bootstrap4'
    });


new Chart(document.getElementById("graph-vendas-vendedor"), {
    type: 'bar',
    data: {
        labels: ["Venda", "Meta", "Comissão"],
        datasets: [{
            backgroundColor: ["#4db6ac", "#325D88", "#29ABE0"],
            data: [<?= $lista_valores->total_produto ?>, <?= $lista_valores->total_meta?>, <?= $lista_valores->total_comissao ?>],
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
</script>

<?php $this->load->view('gerais/footer'); ?>