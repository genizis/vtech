<?php $this->load->view('gerais/header' , $menu); ?>
<?php $this->load->view('gerais/menu', $menu); ?>

<section>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('visao-geral') ?>">Visão Geral</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('compras') ?>">Compras</a></li>
            <li class="breadcrumb-item active">Ordem de Compra</li>
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
                                        <a href="<?= base_url("compras/ordem-compra/{$mes_anterior}/{$ano_anterior}") ?>"
                                            class="btn btn-secondary link-load"><i class="fas fa-angle-left"></i></a>
                                    </div>
                                    <input type="text" class="form-control search text-center"
                                        value="<?= $descMes ?> de <?= $ano ?>" readonly>
                                    <div class="input-group-append">
                                        <a href="<?= base_url("compras/ordem-compra/{$mes_seguinte}/{$ano_seguinte}") ?>"
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
                        Ordens por status<br>
                        <span class="font-italic text-size-80">Por quantidade</span>
                    </h6>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-borderless table-sm mb-0">
                                    <tbody>
                                        <tr>
                                            <td class="text-left">
                                                Ordens com pedido
                                            </td>
                                            <td
                                                class="text-right text-dark">
                                                <?= $status_ordem->total_com_pedido ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">
                                                Ordens sem pedido
                                            </td>
                                            <td
                                                class="text-right text-dark">
                                                <?= $status_ordem->total_sem_pedido ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="table table-borderless table-sm mb-0">
                                    <tbody>
                                        <tr>
                                            <td class="text-left">
                                                Pendentes
                                            </td>
                                            <td
                                                class="text-right">
                                                <?= $status_ordem->pendente ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">
                                                Recebidas parcial
                                            </td>
                                            <td
                                                class="text-right">
                                                <?= $status_ordem->recebido_parcial ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">
                                                Recebidas total
                                            </td>
                                            <td
                                                class="text-right">
                                                <?= $status_ordem->recebido_total ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>                                
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <table class="table table-borderless table-sm mb-0 mt-0">
                            <tbody>
                                <tr>
                                    <td class="text-left pt-0 text-dark"><strong>Total de ordens</strong></td>
                                    <td class="text-right pt-0 text-dark">
                                        <strong>
                                            <?= ($status_ordem->pendente + $status_ordem->recebido_parcial + $status_ordem->recebido_total) ?>
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
                        <a class="nav-link active" data-toggle="tab" href="#ordens-emitidas">Ordens Emitidas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#ordens-para-cotar">Ordens para Cotar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#cotacao-fornecedor">Cotação Fornecedor</a>
                    </li>
                </ul>
                <div class="card  mb-3">
                    <div class="card-body">
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
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="tab-content">
                                            <div class="tab-pane fade active show" id="ordens-emitidas">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                    <a href="<?php echo base_url() ?>compras/ordem-compra/nova-ordem-compra" type="button"
                                                        class="link-load btn btn-outline-info"><i class="fas fa-plus-circle"></i> Nova Ordem de Compra</a>
                                                        <button data-toggle="modal" data-target="#elimina-ordem"
                                                            type="button" class="btn btn-outline-danger" id="btnExcluir"
                                                            disabled><i class="fas fa-trash-alt"></i> Excluir</button>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <form action="<?= base_url("compras/ordem-compra/{$mes}/{$ano}") ?>" method="GET"
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
                                                        <form
                                                            action="<?= base_url('compras/ordem-compra/excluir-ordem') ?>"
                                                            method="POST" id="formDelete" class="mb-0 needs-validation"
                                                            novalidate>
                                                            <div class="table-responsive">
                                                                <table class="table table-bordered mb-3">
                                                                    <thead class="thead-light">
                                                                        <tr>
                                                                            <th scope="col" class="text-center"><i
                                                                                    class="fa-solid fa-check"></i></th>                                                                            
                                                                            <th scope="col" class="text-center">Necessidade
                                                                            </th>
                                                                            <th scope="col" class="text-center">Ordem</th>
                                                                            <th scope="col">Produto</th>
                                                                            <th scope="col" class="text-right">Quantidade
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody class="table-sm">
                                                                        <?php foreach($lista_ordem as $key_ordem => $ordem) { ?>
                                                                        <tr>
                                                                            <td class="align-middle text-center">
                                                                                <div class="checkbox">
                                                                                    <input name="selecionar_todos[]"
                                                                                        type="checkbox" id="inputSelecionar"
                                                                                        value="<?= $ordem->num_ordem_compra ?>" 
                                                                                        <?php if($ordem->num_pedido_compra != null) echo "disabled"; ?>/>
                                                                                </div>
                                                                            </td>
                                                                            <td class="text-center align-middle">
                                                                                    <?= str_replace('-', '/', date("d-m-Y", strtotime($ordem->data_necessidade))) ?>
                                                                            </td>
                                                                            <td class="text-center align-middle"><a href="<?= base_url("compras/ordem-compra/editar-ordem-compra/{$ordem->num_ordem_compra}") ?>"
                                                                                    class="text-dark link-load"><?= $ordem->num_ordem_compra ?></a>
                                                                            </td>                                                                            
                                                                            <td class="align-middle"><a href="<?= base_url("compras/ordem-compra/editar-ordem-compra/{$ordem->num_ordem_compra}") ?>" class="text-dark link-load"
                                                                                    ><?= $ordem->cod_produto ?> - <?= $ordem->nome_produto ?></a><br>
                                                                                <?php
                                                                                    if($ordem->data_necessidade < date('Y-m-d') && $ordem->status != 3){
                                                                                        echo "<span class='badge bg-danger-light'>Atrasada</span>";

                                                                                    }else{
                                                                                        switch ($ordem->status) {
                                                                                            case 1:
                                                                                                echo "<span class='badge bg-light'>Pendente</span>";
                                                                                                break;
                                                                                            case 2:
                                                                                                echo "<span class='badge bg-info-light'>Recebida Parcial</span>";
                                                                                                break;
                                                                                            case 3:
                                                                                                echo "<span class='badge bg-teal-light'>Recebida Total</span>";
                                                                                                break;
                                                                                        } 

                                                                                    }
                                                                                ?>
                                                                                <?php if($ordem->num_pedido_compra != null){ ?>
                                                                                    <span class='badge  text-muted font-italic'><?= $ordem->num_pedido_compra ?> - <?= $ordem->nome_fornecedor ?></span>
                                                                                <?php } ?>
                                                                            </td>
                                                                            <td class="text-right text-info align-middle">
                                                                                <?= number_format((float) ($ordem->quant_pedida), 3, ',', '.') ?>
                                                                                <?= $ordem->cod_unidade_medida ?>
                                                                            </td>
                                                                        </tr>
                                                                        <?php } ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <?php if ($lista_ordem == false) { ?>
                                                            <div class="text-center text-muted">
                                                                <p class="font-italic mt-3">Nenhuma ordem de compra emitida para o período</p>
                                                            </div>
                                                            <?php } ?>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="ordens-para-cotar">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                    <a href="<?php echo base_url() ?>compras/ordem-compra/nova-ordem-compra" type="button"
                                                        class="link-load btn btn-outline-info"><i class="fas fa-plus-circle"></i> Nova Ordem de Compra</a>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <form
                                                            action="<?= base_url('compras/ordem-compra/excluir-ordem') ?>"
                                                            method="POST" id="formDeleteOC"
                                                            class="mb-0 needs-validation" novalidate>
                                                            <div class="table-responsive">
                                                                <table class="table table-bordered mb-3">
                                                                    <thead class="thead-light">
                                                                        <tr>
                                                                            <th scope="col" class="text-center">Necessidade
                                                                            </th>
                                                                            <th scope="col" class="text-center">Ordem</th>                                                                            
                                                                            <th scope="col">Produto</th>
                                                                            <th scope="col" class="text-right">Quantidade
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody class="table-sm">
                                                                        <?php $i = 0; foreach($lista_ordem as $key_ordem => $ordem) { if($ordem->num_pedido_compra == null) { $i += 1; ?>
                                                                        <tr>
                                                                            <td class="text-center align-middle">
                                                                                    <?= str_replace('-', '/', date("d-m-Y", strtotime($ordem->data_necessidade))) ?>
                                                                            </td>
                                                                            <td class="text-center align-middle"><a href="<?= base_url("compras/ordem-compra/editar-ordem-compra/{$ordem->num_ordem_compra}") ?>"
                                                                                    class="text-dark link-load"><?= $ordem->num_ordem_compra ?></a>
                                                                            </td>                                                                            
                                                                            <td class="align-middle"><a href="<?= base_url("compras/ordem-compra/editar-ordem-compra/{$ordem->num_ordem_compra}") ?>"
                                                                                    class="text-dark link-load"><?= $ordem->cod_produto ?> - <?= $ordem->nome_produto ?></a><br>
                                                                                <?php
                                                                                    if($ordem->data_necessidade < date('Y-m-d') && $ordem->status != 3){
                                                                                        echo "<span class='badge bg-danger-light'>Atrasada</span>";

                                                                                    }else{
                                                                                        switch ($ordem->status) {
                                                                                            case 1:
                                                                                                echo "<span class='badge bg-light'>Pendente</span>";
                                                                                                break;
                                                                                            case 2:
                                                                                                echo "<span class='badge bg-info-light'>Recebida Parcial</span>";
                                                                                                break;
                                                                                            case 3:
                                                                                                echo "<span class='badge bg-teal-light'>Recebida Total</span>";
                                                                                                break;
                                                                                        } 

                                                                                    }                                                        
                                                                                ?>
                                                                            </td>
                                                                            <td class="text-right text-info align-middle">
                                                                                <?= number_format((float) ($ordem->quant_pedida), 3, ',', '.') ?>
                                                                                <?= $ordem->cod_unidade_medida ?>
                                                                            </td>
                                                                        </tr>
                                                                        <?php }} ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <?php if ($i == 0) { ?>
                                                            <div class="text-center text-muted">
                                                                <p class="font-italic mt-3">Nenhuma ordem de compra sem pedido no período</p>
                                                            </div>
                                                            <?php } ?>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="cotacao-fornecedor">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <button data-toggle="modal" data-target="#nova-cotacao-fornecedor"
                                                            type="button" class="btn btn-outline-info" 
                                                            ><i class="fas fa-plus-circle"></i> Nova Cotação Fornecedor</button>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <form
                                                            action="<?= base_url('compras/ordem-compra/excluir-ordem') ?>"
                                                            method="POST" id="formDeleteOC"
                                                            class="mb-0 needs-validation" novalidate>
                                                            <div class="table-responsive">
                                                                <table class="table table-bordered mb-3">
                                                                    <thead class="thead-light">
                                                                        <tr>
                                                                            <th scope="col" class="text-left">Fornecedor
                                                                            </th>
                                                                            <th scope="col" class="text-right">Quant ordens</th> 
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php foreach($lista_fornecedor_cot as $key_fornecedor => $fornecedor) { ?>
                                                                        <tr>
                                                                            <td class="text-left align-middle"><a href="<?= base_url("compras/ordem-compra/nova-cotacao-fornecedor/{$fornecedor->cod_fornecedor}") ?>"
                                                                                    class="text-dark link-load"><?= $fornecedor->cod_fornecedor ?> - <?= $fornecedor->nome_fornecedor ?></a>
                                                                            </td>     
                                                                            <td class="text-right text-info align-middle">
                                                                                <?= number_format((float) ($fornecedor->quant_ordens), 0, ',', '.') ?>
                                                                            </td>
                                                                        </tr>
                                                                        <?php } ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <?php if ($i == 0) { ?>
                                                            <div class="text-center text-muted">
                                                                <p class="font-italic mt-3">Nenhuma cotação pendente</p>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="elimina-ordem" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Eliminar ordem de compra</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Confirma eliminação das ordens de compra selecionadas?
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger" form="formDelete">Confirma</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="nova-cotacao-fornecedor">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nova cotação de compra</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body bg-light">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form class="mb-0 needs-validation" novalidate
                                            action="<?= base_url("compras/cotacao-compra/nova-cotacao-fornecedor") ?>" method="get"
                                            id='formNovaCotacaoCompra'>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="inputFornecedor">Fornecedor <span
                                                            class="text-danger">*</span></label>
                                                    <select id="inputFornecedor" class="selectpicker show-tick form-control"
                                                        data-live-search="true" data-actions-box="true" data-style="btn-input-primary"
                                                        title="Selecione um Fornecedor" name="CodFornecedor" required>
                                                        <?php foreach($lista_fornecedor as $key_fornecedor => $fornecedor) { ?>
                                                        <option value="<?= $fornecedor->cod_fornecedor ?>"
                                                            <?php if($fornecedor->cod_fornecedor == set_value('CodFornecedor')) echo "selected"; ?>>
                                                            <?= $fornecedor->cod_fornecedor ?> -
                                                            <?= $fornecedor->nome_fornecedor ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" form="formNovaCotacaoCompra"><i class="fa-solid fa-circle-right"></i>
                    Iniciar Cotação</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>






<script>
$('.page-item>a').addClass("page-link");

$(function() {
    $.applyDataMask();
});

$("[name='selecionar_todos[]']").click(function() {
    var cont = $("[name='selecionar_todos[]']:checked").length;
    $("#btnExcluir").prop("disabled", cont ? false : true);
    $("#btnExcluirOC").prop("disabled", cont ? false : true);
});

$("[name='selecionar_todos[]']").click(function() {
    var cont = $("[name='selecionar_todos[]']:checked").length;
    $("#btnPedido").prop("disabled", cont ? false : true);
});

$('#inputDateEmissao').datepicker({
    uiLibrary: 'bootstrap4'
});

$('#inputDateEntrega').datepicker({
    uiLibrary: 'bootstrap4'
});

$("#btnPedido").on('click', function() {

    var selecionado = [];
    var i = 0;

    $("input[name='selecionar_todos[]']:checked").each(function() {
        selecionado[i] = $(this).val();
        i = i + 1;
    });

    $("#inputSelecionado").val(selecionado);
    console.log(selecionado);

});

$('#inputDataNecessidade').datepicker({
    uiLibrary: 'bootstrap4'
});

$("#inputProdutoCompra").change(function() {

    var baseurl = "<?php echo base_url(); ?>";

    var produto = $("#inputProdutoCompra").val();

    $.post(baseurl + "ajax/busca-produto", {
        produto: produto
    }, function(valor) {
        var aValor = valor.split('|');
        console.log(aValor);
        $("#idUnProd").text(aValor[0]);
        $("#inputTipoProduto").val(aValor[1]);
    });

});

<?php foreach($lista_ordem as $key_ordem_compra => $ordem_compra) { if($ordem_compra->num_pedido_compra == null) { ?>
$('#inputDataNecessidadeEdit<?= $ordem_compra->num_ordem_compra ?>').datepicker({
    uiLibrary: 'bootstrap4'
});
<?php }} ?>
</script>

<?php $this->load->view('gerais/footer'); ?>