<?php $this->load->view('gerais/header' , $menu); ?>
<?php $this->load->view('gerais/menu', $menu); ?>

<section>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('visao-geral') ?>">Visão Geral</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('compras') ?>">Compras</a></li>
            <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>compras/ordem-compra">Ordem de Compra</a>
            </li>
            <li class="breadcrumb-item active">Editar Ordem de Compra</a></li>
        </ol>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card  mb-3">
                    <div class="card-body">
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
                                <form class="needs-validation" novalidate
                                    action="<?= base_url("compras/ordem-compra/editar-ordem-compra/{$ordem->num_ordem_compra}") ?>"
                                    method="POST" id="OrdemCompra">
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label class="control-label" for="inputNumOrdemCompra">Ordem de Compra</label>
                                            <input class="form-control" id="inputNumOrdemCompra" type="text" readonly
                                            name="NumOrdemCompraEdit" value="<?= $ordem->num_ordem_compra ?>">
                                        </div>
                                        <div class="form-group col-md-8">
                                            <label class="control-label" for="inputProdutoCompra">Produto de Compra</label>
                                            <input class="form-control" id="inputProdutoCompra" type="text" readonly
                                                value="<?= $ordem->cod_produto ?> - <?= $ordem->nome_produto ?>"
                                                name="CodProdutoEdit">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label class="control-label" for="inputTipoProduto">Tipo de Produto</label>
                                            <input class="form-control" id="inputTipoProduto" type="text" readonly
                                            name="TipoProdutoEdit" value="<?= $ordem->nome_tipo_produto ?>">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputDataNecessidade">Data de Necessidade</label>
                                            <input type="text" class="form-control" id="inputDataNecessidade"
                                                name="DataNecessidade"
                                                <?php if($ordem->num_pedido_compra != null) echo "readonly"; ?>
                                                value="<?= str_replace('-', '/', date("d-m-Y", strtotime($ordem->data_necessidade))) ?>">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputQuantPedida">Quantidade Pedida <span
                                                            class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <input type="text" class="form-control"
                                                        <?php if($ordem->num_pedido_compra != null) echo "readonly"; ?>
                                                        value="<?= $ordem->quant_pedida ?>" 
                                                        data-mask="#.##0,000" data-mask-reverse="true"
                                                    id="inputQuantPedida"
                                                    name="QuantPedida" required>
                                                <div class="input-group-append">
                                                    <span class="input-group-text"
                                                                style="width: 40px;"><?= $ordem->cod_unidade_medida ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="inputObservacao">Observações da Ordem de Compra</label>
                                            <textarea class="form-control" rows="3" id="inputObservacao"
                                            <?php if($ordem->num_pedido_compra != null) echo "readonly"; ?>
                                                name="ObsOrdemCompra"><?= $ordem->observacoes ?></textarea>
                                        </div>
                                    </div>
                                </form>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h6>Lista de Cotações</h6>
                                        <div class="row  button-pane">
                                            <div class="col-lg-12 col-md-12 col-xs-12">
                                                <button data-toggle="modal" data-target="#nova-cotacao" type="button"
                                                <?php if($ordem->num_pedido_compra != null) echo "disabled"; ?>
                                                    class="btn btn-outline-info btn-sm"><i
                                                        class="fas fa-plus-circle"></i> Adicionar Cotação</button>
                                                <button data-toggle="modal" data-target="#elimina-cotacao" type="button"
                                                    class="btn btn-outline-danger btn-sm" id="excluirCotacao" disabled><i
                                                        class="fas fa-trash-alt"></i>
                                                    Excluir</button>
                                            </div>
                                        </div>
                                        <form class="mb-0 needs-validation" novalidate
                                            action="<?= base_url("compras/cotacao-compra/excluir-cotacao-compra/{$ordem->num_ordem_compra}") ?>"
                                            method="POST" id="DeleteCotacaoOrdem">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th scope="col" class="text-center"><i
                                                                    class="fa-solid fa-check"></i></th>
                                                            <th scope="col">Fornecedor</th>
                                                            <th scope="col" class="text-left">Cond de pagamento</th>
                                                            <th scope="col" class="text-center">Dias entrega</th>
                                                            <th scope="col" class="text-right">Valor unitário</th>
                                                            <th scope="col" class="text-right">Valor total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach($cotacao as $key_cotacao => $cotacoes) {  ?>
                                                        <tr>
                                                            <td class="align-middle">
                                                                <div class="checkbox text-center">
                                                                    <input name="excluir_todos[]" type="checkbox"
                                                                    <?php if($ordem->num_pedido_compra != null) echo "disabled"; ?>
                                                                        value="<?= $cotacoes->seq_cotacao_compra ?>" />
                                                                </div>
                                                            </td>
                                                            <td scope="row" class="align-middle">
                                                                <?php if($ordem->num_pedido_compra == null) { ?>
                                                                <a href="#"
                                                                    data-toggle="modal" class="text-dark"                                                                    
                                                                    data-target="#editar-cotacao<?= $cotacoes->seq_cotacao_compra ?>">
                                                                    <?= $cotacoes->cod_fornecedor ?> - <?= $cotacoes->nome_fornecedor ?>
                                                                </a>
                                                                <?php }else{ ?>
                                                                    <?= $cotacoes->cod_fornecedor ?> - <?= $cotacoes->nome_fornecedor ?>
                                                                <?php } ?>
                                                            </td>
                                                            <td class="text-left align-middle">
                                                                <?= $cotacoes->condicao_pagamento ?>
                                                            </td>
                                                            <td class="text-center align-middle">
                                                                <?= number_format($cotacoes->dias_entrega, 0, ',', '.') ?>
                                                            </td>
                                                            <td class="text-right align-middle">R$
                                                                <?= number_format($cotacoes->valor_unitario, 2, ',', '.') ?>
                                                            </td>
                                                            <td class="text-right text-info align-middle">R$
                                                                <?= number_format($cotacoes->valor_unitario * $ordem->quant_pedida, 2, ',', '.') ?>
                                                            </td>
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <?php if ($cotacao == false) { ?>
                                            <div class="text-center text-muted">
                                                <p class="font-italic mt-3">Nenhuma cotação adicionada
                                                </p>
                                            </div>
                                            <?php } ?>                                            
                                        </form>
                                    </div>
                                </div>
                                <hr class="mb-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="submit" form="OrdemCompra" class="btn btn-primary" name="Opcao"
                                        <?php if($ordem->num_pedido_compra != null) echo "disabled"; ?>
                                            value="salvar"><i class="fas fa-save"></i>
                                            Salvar</button>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row float-right">
                                            <div class="col-md-12">

                                                <a href="<?php echo base_url() ?>compras/ordem-compra"
                                                    class="link-load btn btn-secondary">Cancelar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 pl-0">
                <div class="card  mb-3">
                    <h6 class="card-header bg-white text-muted">
                        Dados do produto<br>
                        <span class="font-italic text-size-80">Dados comparativos</span>
                    </h6>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <?php if($ordem->nome_usuario != null){ ?>
                                <table class="table table-borderless table-sm mb-0">
                                    <tbody>
                                        <tr>
                                            <td class="text-left">
                                                Usuário da ordem
                                            </td>
                                            <td class="text-right">
                                                <?= $ordem->nome_usuario ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <?php } ?>
                                <table class="table table-borderless table-sm mb-0">
                                    <tbody>
                                        <tr>
                                            <td class="text-left">
                                                Quantidade pedida
                                            </td>
                                            <td class="text-right">
                                                <span id="QuantPedida"><?= number_format($ordem->quant_pedida, 3, ',', '.') ?></span> <span id="unQuanPedida"><?= $ordem->cod_unidade_medida ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">
                                                Custo médio
                                            </td>
                                            <td class="text-right">
                                                R$ <span id="CustoMedio"><?= number_format($ordem->custo_medio, 2, ',', '.') ?></span>
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
                                    <td class="text-left pt-0 text-dark"><strong>Valor comparativo</strong></td>
                                    <td class="text-right pt-0 text-info" id="idTotalPedido">
                                        <strong>
                                            R$
                                            <span
                                                id="TotalComparacao"><?= number_format($ordem->quant_pedida * $ordem->custo_medio, 2, ',', '.') ?></span>
                                        </strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php if($ordem->num_pedido_compra != null){ ?>
                <div class="card  mb-3">
                    <h6 class="card-header bg-white text-muted">
                        Dados do pedido<br>
                        <span class="font-italic text-size-80">Pedido emitido</span>
                    </h6>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-borderless table-sm mb-0">
                                    <tbody>
                                        <tr>
                                            <td class="text-left">
                                                Número do Pedido
                                            </td>
                                            <td class="text-right">
                                                <strong><?= $ordem->num_pedido_compra ?></strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">
                                                Fornecedor
                                            </td>
                                            <td class="text-right">
                                                <?= $ordem->nome_fornecedor ?>                                                
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">
                                                Quantidade pedida
                                            </td>
                                            <td class="text-right">
                                                <span id="QuantPedida"><?= number_format($ordem->quant_pedida, 3, ',', '.') ?></span> <span id="unQuanPedida"><?= $ordem->cod_unidade_medida ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">
                                                Valor unitário
                                            </td>
                                            <td class="text-right">
                                                R$ <?= number_format($ordem->valor_unitario, 2, ',', '.') ?>
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
                                    <td class="text-left pt-0 text-dark"><strong>Total de compra</strong></td>
                                    <td class="text-right pt-0 text-info" id="idTotalPedido">
                                        <strong>
                                            R$ <?= number_format($ordem->quant_pedida * $ordem->valor_unitario, 2, ',', '.') ?>
                                        </strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="nova-cotacao">
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
                                            action="<?= base_url("compras/cotacao-compra/nova-cotacao-compra/{$ordem->num_ordem_compra}") ?>" method="post"
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
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="inputDiasEntrega">Condição de Pagamento</label>
                                                    <input type="text" class="form-control" id="inputDiasEntrega"
                                                        name="CondicaoPag" value="<?= set_value('CondicaoPag'); ?>">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputDiasEntrega">Dias de Entrega</label>
                                                    <input type="text" class="form-control" id="inputDiasEntrega"
                                                        data-mask="#.##0" data-mask-reverse="true"
                                                        name="DiasEntrega" value="<?= set_value('DiasEntrega'); ?>">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="control-label" for="inputValorUnitario">Valor Unitário <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$</span>
                                                        </div>
                                                        <input type="text" class="form-control" class="form-control"
                                                            id="inputValorUnitario" type="text" name="ValorUnitario"
                                                            data-mask="#.##0,00" data-mask-reverse="true"
                                                            value="<?= set_value('ValorUnitario'); ?>" required>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="control-label" for="inputTotalCompra">Total da Compra</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$</span>
                                                        </div>
                                                        <input type="text" class="form-control" id="inputTotalCompra" type="text"
                                                            name="TotalCompra" data-mask="#.##0,00" data-mask-reverse="true"
                                                            value="<?= set_value('TotalCompra'); ?>" readonly>
                                                    </div>
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
                <button type="submit" class="btn btn-primary" form="formNovaCotacaoCompra"><i class="fas fa-save"></i>
                    Salvar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<?php foreach($cotacao as $key_cotacao => $cotacoes) {  ?>
<div class="modal fade" id="editar-cotacao<?= $cotacoes->seq_cotacao_compra ?>">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar cotação de compra</h5>
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
                                            action="<?= base_url("compras/cotacao-compra/editar-cotacao-compra/{$cotacoes->seq_cotacao_compra}/1") ?>" method="post"
                                            id='formEditarCotacaoCompra<?= $cotacoes->seq_cotacao_compra ?>'>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="inputFornecedor<?= $cotacoes->seq_cotacao_compra ?>">Fornecedor</label>
                                                    <input type="text" class="form-control" id="inputFornecedor<?= $cotacoes->seq_cotacao_compra ?>"
                                                        name="FornecedorEdit" value="<?= $cotacoes->cod_fornecedor ?> - <?= $cotacoes->nome_fornecedor ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="inputDiasEntrega">Condição de Pagamento</label>
                                                    <input type="text" class="form-control" id="inputDiasEntrega"
                                                        name="CondicaoPag" value="<?= $cotacoes->condicao_pagamento ?>">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputDiasEntrega<?= $cotacoes->seq_cotacao_compra ?>">Dias de Entrega</label>
                                                    <input type="text" class="form-control" id="inputDiasEntrega<?= $cotacoes->seq_cotacao_compra ?>"
                                                        name="DiasEntregaEdit" value="<?= $cotacoes->dias_entrega ?>">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="control-label" for="inputValorUnitario<?= $cotacoes->seq_cotacao_compra ?>">Valor Unitário <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$</span>
                                                        </div>
                                                        <input type="text" class="form-control" class="form-control"
                                                            id="inputValorUnitario<?= $cotacoes->seq_cotacao_compra ?>" type="text" name="ValorUnitarioEdit"
                                                            data-mask="#.##0,00" data-mask-reverse="true"
                                                            value="<?= number_format($cotacoes->valor_unitario, 2, ',', '.') ?>" required>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="control-label" for="inputTotalCompra<?= $cotacoes->seq_cotacao_compra ?>">Total da Compra</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$</span>
                                                        </div>
                                                        <input type="text" class="form-control" id="inputTotalCompra<?= $cotacoes->seq_cotacao_compra ?>" type="text"
                                                            name="TotalCompra" data-mask="#.##0,00" data-mask-reverse="true"
                                                            value="<?= number_format($cotacoes->valor_unitario * $ordem->quant_pedida, 2, ',', '.') ?>" readonly>
                                                    </div>
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
                <button type="submit" class="btn btn-primary" form="formEditarCotacaoCompra<?= $cotacoes->seq_cotacao_compra ?>"><i class="fas fa-save"></i>
                    Salvar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
<?php } ?> 


<div class="modal fade" id="elimina-cotacao" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Eliminar cotação de compra</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Confirma eliminação das cotações de compra selecionadas?
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger" form="DeleteCotacaoOrdem">Confirma</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<script>
$(function() {
    $.applyDataMask();
});

jQuery('#inputQuantPedida').on('keyup', function() {

    var quant = parseFloat(jQuery('#inputQuantPedida').val() != '' ? (jQuery('#inputQuantPedida').val()
        .split('.').join('')).replace(',', '.') : 0);

    var custo = parseFloat(jQuery('#CustoMedio').text() != '' ? (jQuery('#CustoMedio').text()
        .split('.').join('')).replace(',', '.') : 0);

    var total = custo * quant;  

    $("#QuantPedida").text(quant.toLocaleString("pt-BR", {
        style: "decimal",
        minimumFractionDigits: 3,
        maximumFractionDigits: 3
    }));

    $("#TotalComparacao").text(total.toLocaleString("pt-BR", {
        style: "decimal",
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    }));
});

$("[name='excluir_todos[]']").click(function() {
    var cont = $("[name='excluir_todos[]']:checked").length;
    $("#excluirCotacao").prop("disabled", cont ? false : true);
});

<?php if($ordem->num_pedido_compra == null) { ?>
$('#inputDataNecessidade').datepicker({
    uiLibrary: 'bootstrap4'
})
<?php } ?>

jQuery('#inputValorUnitario').on('keyup', function() {

    var valUnit = parseFloat(jQuery('#inputValorUnitario').val() != '' ? (jQuery('#inputValorUnitario').val()
        .split(
            '.').join('')).replace(',', '.') : 0);
    var quantPedida = <?= $ordem->quant_pedida ?>;

    var totalCompra = valUnit * quantPedida;    

    $("#inputTotalCompra").val(totalCompra.toLocaleString("pt-BR", {
        style: "decimal",
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    }));
});

<?php foreach($cotacao as $key_cotacao => $cotacoes) {  ?>
jQuery('#inputValorUnitario<?= $cotacoes->seq_cotacao_compra ?>').on('keyup', function() {

    var valUnit = parseFloat(jQuery('#inputValorUnitario<?= $cotacoes->seq_cotacao_compra ?>').val() != '' ? (jQuery('#inputValorUnitario<?= $cotacoes->seq_cotacao_compra ?>').val()
        .split(
            '.').join('')).replace(',', '.') : 0);
    var quantPedida = <?= $ordem->quant_pedida ?>;

    var totalCompra = valUnit * quantPedida;    

    $("#inputTotalCompra<?= $cotacoes->seq_cotacao_compra ?>").val(totalCompra.toLocaleString("pt-BR", {
        style: "decimal",
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    }));
});
<?php } ?>

</script>

<?php $this->load->view('gerais/footer'); ?>