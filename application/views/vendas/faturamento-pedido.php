<?php $this->load->view('gerais/header' , $menu); ?>
<?php $this->load->view('gerais/menu', $menu); ?>

<section>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('visao-geral') ?>">Visão Geral</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('vendas') ?>">Vendas</a></li>
            <li class="breadcrumb-item active">Faturamento de Pedido</li>
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
                                        <a href="<?= base_url("vendas/faturamento-pedido/{$mes_anterior}/{$ano_anterior}") ?>"
                                            class="btn btn-secondary link-load"><i class="fas fa-angle-left"></i></a>
                                    </div>
                                    <input type="text" class="form-control search text-center filtro-data"
                                        value="<?= $descMes ?> de <?= $ano ?>" readonly>
                                    <div class="input-group-append">
                                        <a href="<?= base_url("vendas/faturamento-pedido/{$mes_seguinte}/{$ano_seguinte}") ?>"
                                            class="btn btn-secondary link-load"><i
                                                class="fas fa-angle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card  mb-3">
                    <h6 class="card-header bg-white text-muted">
                        Pedidos aprovados
                    </h6>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-borderless table-sm">
                                    <tbody>
                                        <tr>
                                            <td class="text-left">
                                            <i class="fa-duotone fa-solid fa-circle-small pr-2 text-info"></i> Total a faturar
                                            </td>
                                            <td class="text-right <?php if($a_faturar > 0) echo "text-info"; else echo "text-muted"; ?>">
                                                R$ <?=  number_format((float) ($a_faturar), 2, ',', '.') ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">
                                            <i class="fa-duotone fa-solid fa-circle-small pr-2 text-teal"></i> Total faturado
                                            </td>
                                            <td class="text-right <?php if($faturado > 0) echo "text-teal"; else echo "text-muted"; ?>">
                                                R$ <?=  number_format((float) ($faturado), 2, ',', '.') ?>
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
                        <form action="<?= base_url("vendas/faturamento-pedido/{$mes}/{$ano}") ?>" method="get" class="mb-0 needs-validation" novalidate>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <select class="selectpicker show-tick form-control" multiple data-live-search="true" data-actions-box="true" title="Cliente" name="ClienteFiltro[]" data-style="btn-input-primary">
                                        <?php $chave_cliente = 0;
                                        foreach ($lista_cliente as $key_cliente => $cliente) { ?>
                                            <option value="<?= $cliente->cod_cliente ?>" <?php if ($clienteFiltro != null) {
                                                                                            if ($cliente->cod_cliente == $clienteFiltro[$chave_cliente]) {
                                                                                                if ((count($clienteFiltro) - 1) > $chave_cliente) {
                                                                                                    $chave_cliente = $chave_cliente + 1;
                                                                                                }
                                                                                                echo "selected";
                                                                                            }
                                                                                        } ?>>
                                                <?= $cliente->cod_cliente ?> - <?= $cliente->nome_cliente ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <select class="selectpicker show-tick form-control" multiple data-live-search="true" data-actions-box="true" title="Vendedor" name="VendedorFiltro[]" data-style="btn-input-primary">
                                        <?php $chave_vendedor = 0;
                                        foreach ($lista_vendedor as $key_vendedor => $vendedor) { ?>
                                            <option value="<?= $vendedor->cod_vendedor ?>" <?php if ($vendedorFiltro != null) {
                                                                                                                if ($vendedor->cod_vendedor == $vendedorFiltro[$chave_vendedor]) {
                                                                                                                    if ((count($vendedorFiltro) - 1) > $chave_vendedor) {
                                                                                                                        $chave_vendedor = $chave_vendedor + 1;
                                                                                                                    }
                                                                                                                    echo "selected";
                                                                                                                }
                                                                                                            } ?>>
                                                <?= $vendedor->cod_vendedor ?> -
                                                <?= $vendedor->nome_vendedor ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <select class="selectpicker show-tick form-control" multiple data-live-search="true" data-actions-box="true" title="Transportador" name="TransportadorFiltro[]" data-style="btn-input-primary">
                                        <?php $chave_transportador = 0;
                                        foreach ($lista_transportador as $key_transportador => $transportador) { ?>
                                            <option value="<?= $transportador->cod_transportador ?>" <?php if ($transportadorFiltro != null) {
                                                                                                        if ($transportador->cod_transportador == $transportadorFiltro[$chave_transportador]) {
                                                                                                            if ((count($transportadorFiltro) - 1) > $chave_transportador) {
                                                                                                                $chave_transportador = $chave_transportador + 1;
                                                                                                            }
                                                                                                            echo "selected";
                                                                                                        }
                                                                                                    } ?>>
                                                <?= $transportador->cod_transportador ?> -
                                                <?= $transportador->nome_transportador ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-outline-secondary btn-block"><i class="fa-solid fa-filter"></i> Filtrar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8 pl-0">
                <ul class="nav nav-tabs mb-3">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#pedidos-aprovados">Pedidos aprovados</a>
                    </li>
                </ul>
                <div class="card  mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6"></div>
                            <div class="col-md-6">
                                <form action="<?= base_url("vendas/faturamento-pedido/{$mes}/{$ano}") ?>" method="GET"
                                    class="mb-0 needs-validation" novalidate>
                                    <div class="input-group">
                                        <input type="text" class="form-control search" name="buscar" value="<?= $filter ?>">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-secondary"><i
                                                    class="fas fa-search"></i> Buscar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <?php if ($this->session->flashdata('erro') <> ""){ ?>
                                <div class="alert alert-danger alert-dismissible fade show" id="alert" role="alert">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>Atenção!</strong> <?= $this->session->flashdata('erro') ?>
                                </div>
                                <?php } $this->session->set_flashdata('erro', ''); ?>
                                <?php if ($this->session->flashdata('sucesso') <> ""){ ?>
                                <div class="alert alert-success alert-dismissible fade show" id="alert" role="alert">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>Muito bem!</strong>
                                    <?= $this->session->flashdata('sucesso') ?>
                                </div>
                                <?php } $this->session->set_flashdata('sucesso', ''); ?>
                                <div class="table-responsive">
                                    <table class="table table-bordered mb-3">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col" class="text-center">Data entrega</th>
                                                <th scope="col" class="text-center">Pedido</th>                                                
                                                <th scope="col">Cliente</th>
                                                <th scope="col" class="text-right">Total pedido</th>
                                                <th scope="col" class="text-right">Total faturado</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-sm">
                                            <?php foreach($lista_pedido as $key_pedido => $pedido) { ?>
                                            <tr>
                                                <td class="text-center align-middle"><a
                                                        class="link-load text-dark"
                                                        href="<?= base_url("vendas/faturamento-pedido/novo-faturamento-pedido/{$pedido->num_pedido_venda}") ?>">
                                                    <?= str_replace('-', '/', date("d-m-Y", strtotime($pedido->data_entrega))) ?>
                                                    </a>
                                                </td>
                                                <td scope="row" class="text-center align-middle"><a
                                                        class="link-load text-dark"
                                                        href="<?= base_url("vendas/faturamento-pedido/novo-faturamento-pedido/{$pedido->num_pedido_venda}") ?>"><?= $pedido->num_pedido_venda ?></a>
                                                </td>                                                
                                                <td class="align-middle"><a class="link-load text-dark"
                                                        href="<?= base_url("vendas/faturamento-pedido/novo-faturamento-pedido/{$pedido->num_pedido_venda}") ?>"><?= $pedido->cod_cliente ?> - <?= $pedido->nome_cliente ?></a><br>
                                                    <?php
                                                    if($pedido->data_entrega < date('Y-m-d') && $ped_status[$pedido->num_pedido_venda] != 3 && $ped_status[$pedido->num_pedido_venda] != 4){
                                                        echo "<span class='badge bg-danger-light'>Atrasado</span>";

                                                    }else{
                                                        switch ($ped_status[$pedido->num_pedido_venda]) {
                                                            case 1:
                                                                echo "<span class='badge bg-light'>Pendente</span>";
                                                                break;
                                                            case 2:
                                                                echo "<span class='badge bg-info-light'>Atendido Parcial</span>";
                                                                break;
                                                            case 3:
                                                                echo "<span class='badge bg-teal-light'>Atendido Total</span>";
                                                                break;
                                                            case 4:
                                                                echo "<span class='badge bg-dark text-white'>Estornado</span>";
                                                                break;
                                                        } 

                                                    }                                                        
                                                ?>
                                                <?php if($pedido->cod_vendedor != 0 && $pedido->cod_vendedor != null){ ?>
                                                    <span class='badge  text-muted font-italic'><?= $pedido->cod_vendedor ?> - <?= $pedido->nome_vendedor ?></span>
                                                <?php } ?>
                                                </td>
                                                <td class="text-right text-info align-middle">R$
                                                    <?= number_format((float) ($pedido->valor_total_pedido + 
                                                                          $pedido->valor_frete +
                                                                          $pedido->valor_seguro +
                                                                          $pedido->outras_despesas - 
                                                                          $pedido->valor_desconto), 2, ',', '.') ?>
                                                </td>
                                                <td class="text-right <?php if($pedido->valor_total_faturado > 0) echo "text-teal"; else echo "text-muted"; ?> align-middle">R$
                                                    <?=  number_format((float) ($pedido->valor_total_faturado), 2, ',', '.') ?>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php if ($lista_pedido == false) { ?>
                                <div class="text-center text-muted">
                                    <p class="font-italic mt-3">Nenhum pedido com entrega para o período
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
</section>

<script>
$('.page-item>a').addClass("page-link");

$("[name='excluir_todos[]']").click(function() {
    var cont = $("[name='excluir_todos[]']:checked").length;
    $("#btnExcluir").prop("disabled", cont ? false : true);
});
</script>

<?php $this->load->view('gerais/footer'); ?>