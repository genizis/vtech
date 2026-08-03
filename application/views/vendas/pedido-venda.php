<?php $this->load->view('gerais/header' , $menu); ?>
<?php $this->load->view('gerais/menu', $menu); ?>

<section>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('visao-geral') ?>">Visão Geral</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('vendas') ?>">Vendas</a></li>
            <li class="breadcrumb-item active">Pedido de Venda</li>
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
                                        <a href="<?= base_url("vendas/pedido-venda/{$mes_anterior}/{$ano_anterior}") ?>"
                                            class="btn btn-secondary link-load"><i class="fas fa-angle-left"></i></a>
                                    </div>
                                    <input type="text" class="form-control search text-center filtro-data"
                                        value="<?= $descMes ?> de <?= $ano ?>" readonly>
                                    <div class="input-group-append">
                                        <a href="<?= base_url("vendas/pedido-venda/{$mes_seguinte}/{$ano_seguinte}") ?>"
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
                        Totais por status
                    </h6>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-borderless table-sm">
                                    <tbody>
                                        <tr>
                                            <td class="text-left">
                                            <i class="fa-duotone fa-solid fa-circle-small pr-2 text-teal"></i> Vendas confirmadas
                                            </td>
                                            <?php                                                     
                                                $totalStatus = $venda_confirmada->valor_total_pedido +
                                                               $venda_confirmada->total_frete +
                                                               $venda_confirmada->total_seguro +
                                                               $venda_confirmada->total_outras_despesas -
                                                               $venda_confirmada->total_desconto;
                                            ?>
                                            <td class="text-right <?php if($totalStatus> 0) echo "text-teal"; else echo "text-muted"; ?>">
                                                R$ <?= number_format($totalStatus, 2, ',', '.') ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">
                                            <i class="fa-duotone fa-solid fa-circle-small pr-2 text-warning"></i> Em orçamento
                                            </td>
                                            <?php                                                     
                                                $totalStatus = $venda_orcamento->valor_total_pedido +
                                                               $venda_orcamento->total_frete +
                                                               $venda_orcamento->total_seguro +
                                                               $venda_orcamento->total_outras_despesas -
                                                               $venda_orcamento->total_desconto;
                                            ?>
                                            <td class="text-right <?php if($totalStatus> 0) echo "text-warning"; else echo "text-muted"; ?>">
                                                R$ <?= number_format($totalStatus, 2, ',', '.') ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">
                                            <i class="fa-duotone fa-solid fa-circle-small pr-2 text-danger"></i> Orçamentos reprovados
                                            </td>
                                            <?php                                                     
                                                $totalStatus = $venda_reprovada->valor_total_pedido +
                                                               $venda_reprovada->total_frete +
                                                               $venda_reprovada->total_seguro +
                                                               $venda_reprovada->total_outras_despesas -
                                                               $venda_reprovada->total_desconto;
                                            ?>
                                            <td class="text-right <?php if($totalStatus> 0) echo "text-danger"; else echo "text-muted"; ?>">
                                                R$ <?= number_format($totalStatus, 2, ',', '.') ?>
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
                        <form action="<?= base_url("vendas/pedido-venda/{$mes}/{$ano}") ?>" method="get" class="mb-0 needs-validation" novalidate>
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
                                    <select class="selectpicker show-tick form-control" multiple data-live-search="true" data-actions-box="true" title="Status" data-style="btn-input-primary" name="StatusFiltro[]">
                                        <option value="1" <?php if ($statusFiltro != null) { foreach ($statusFiltro as $status) {
                                                                    if($status == 1) echo "selected";
                                                                }}
                                                           ?>>1 - Orçamento</option>
                                        <option value="2" <?php if ($statusFiltro != null) { foreach ($statusFiltro as $status) {
                                                                    if($status == 2) echo "selected";
                                                                }}
                                                           ?>>2 - Orçamento Reprovado</option>
                                        <option value="3" <?php if ($statusFiltro != null) { foreach ($statusFiltro as $status) {
                                                                    if($status == 3) echo "selected";
                                                                }} 
                                                           ?>>3 - Venda Confirmada</option>
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
                                    <button type="submit" class="btn btn-outline-secondary btn-block"><i class="fa-regular fa-filter"></i> Filtrar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8 pl-0">
                <ul class="nav nav-tabs mb-3">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#pedidos-emitidos">Pedidos emitidos</a>
                    </li>
                </ul>
                <div class="card  mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <a href="<?php echo base_url() ?>vendas/pedido-venda/novo-pedido-venda" type="button"
                                    class="link-load btn btn-outline-info"><i class="fas fa-plus-circle"></i> Novo
                                    Pedido de
                                    Venda</a>
                                <button data-toggle="modal" data-target="#elimina-pedido" type="button"
                                    class="btn btn-outline-danger" id="btnExcluir" disabled><i
                                        class="fas fa-trash-alt"></i>
                                    Excluir</button>
                            </div>
                            <div class="col-md-6">
                                <form action="<?= base_url("vendas/pedido-venda/{$mes}/{$ano}") ?>" method="GET"
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
                            <div class="col-lg-12 col-md-12 col-xs-12">
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
                                <form action="<?= base_url('vendas/pedido-venda/excluir-pedido-venda') ?>" method="POST"
                                    id="formDelete" class="mb-0 needs-validation" novalidate>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th scope="col" class="text-center"><i
                                                            class="fa-solid fa-check"></i>
                                                    </th>
                                                    <th scope="col" class="text-center">Data emissão</th>
                                                    <th scope="col" class="text-center">Pedido</th>                                                    
                                                    <th scope="col">Cliente</th>                                                    
                                                    <th scope="col" class="text-right">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-sm">
                                                <?php foreach($lista_pedido as $key_pedido => $pedido) { ?>
                                                <tr>
                                                    <td class="align-middle">
                                                        <div class="checkbox text-center">
                                                            <input name="excluir_todos[]" type="checkbox"
                                                                value="<?= $pedido->num_pedido_venda ?>"
                                                                <?php if($pedido->count_faturamento != 0) echo "disabled"; ?> />
                                                        </div>
                                                    </td>
                                                    <td class="text-center align-middle"><a
                                                            class="link-load text-dark"
                                                            href="<?= base_url("vendas/pedido-venda/editar-pedido-venda/{$pedido->num_pedido_venda}") ?>">
                                                        <?= str_replace('-', '/', date("d-m-Y", strtotime($pedido->data_emissao))) ?>
                                                    </a>
                                                    </td>
                                                    <td scope="row" class="text-center align-middle"><a
                                                            class="link-load text-dark"
                                                            href="<?= base_url("vendas/pedido-venda/editar-pedido-venda/{$pedido->num_pedido_venda}") ?>"><?= $pedido->num_pedido_venda ?></a>
                                                    </td>                                                    
                                                    <td class="align-middle"><a class="link-load text-dark"
                                                            href="<?= base_url("vendas/pedido-venda/editar-pedido-venda/{$pedido->num_pedido_venda}") ?>"><?= $pedido->cod_cliente ?> - <?= $pedido->nome_cliente ?></a><br>
                                                        <?php  
                                                            switch ($pedido->situacao) {
                                                                case 1:
                                                                    echo "<span class='badge bg-warning-light'>Em Orçamento</span>";
                                                                    break;
                                                                case 2:
                                                                    echo "<span class='badge bg-danger-light'>Orçamento Reprovado</span>";
                                                                    break;
                                                                case 3:
                                                                    echo "<span class='badge bg-teal-light'>Venda Confirmada</span>";
                                                                    break;
                                                            }
                                                        ?>
                                                        <?php if($pedido->cod_vendedor != 0 && $pedido->cod_vendedor != null){ ?>
                                                            <span class='badge  text-muted font-italic'><?= $pedido->cod_vendedor ?> - <?= $pedido->nome_vendedor ?></span>
                                                        <?php } ?>
                                                    </td>                                                    
                                                    <td class="text-right <?php  
                                                                                switch ($pedido->situacao) {
                                                                                    case 1:
                                                                                        echo "text-warning";
                                                                                        break;
                                                                                    case 2:
                                                                                        echo "text-danger";
                                                                                        break;
                                                                                    case 3:
                                                                                        echo "text-teal";
                                                                                        break;
                                                                                }
                                                                            ?> align-middle">R$
                                                        <?= number_format($pedido->valor_total_pedido + 
                                                                          $pedido->valor_frete +
                                                                          $pedido->valor_seguro +
                                                                          $pedido->outras_despesas - 
                                                                          $pedido->valor_desconto, 2, ',', '.') ?>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <?php if ($lista_pedido == false) { ?>
                                    <div class="text-center text-muted">
                                        <p class="font-italic mt-3">Nenhum pedido emitido para o período
                                        </p>
                                    </div>
                                    <?php } ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="elimina-pedido" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Eliminar pedido</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Confirma eliminação dos pedidos de venda selecionados?
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger" form="formDelete">Confirma</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="importa-atendimento" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Importar Atendimentos - Vendas Externas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formAtendimento" class="mb-0 needs-validation" novalidate
                    action="<?= base_url("vendas/importar-atendimentos-vendas-externas") ?>" method="GET">
                    <div class="form-group">
                        <label for="inputDataAtendimento">Data dos Atendimentos</label>
                        <input type="text" class="form-control" id="inputDataAtendimento" name="DataAtendimento"
                            value="<?= str_replace('-', '/', date("d-m-Y")) ?>">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" form="formAtendimento" id="btnSpinner">Confirma</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<script>
$('.page-item>a').addClass("page-link");

$("[name='excluir_todos[]']").click(function() {
    var cont = $("[name='excluir_todos[]']:checked").length;
    $("#btnExcluir").prop("disabled", cont ? false : true);
});

$('#inputDataAtendimento').datepicker({
    uiLibrary: 'bootstrap4'
});
</script>

<?php $this->load->view('gerais/footer'); ?>