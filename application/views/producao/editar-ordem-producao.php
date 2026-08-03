<?php $this->load->view('gerais/header' , $menu); ?>
<?php $this->load->view('gerais/menu', $menu); ?>

<section>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('visao-geral') ?>">Visão Geral</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('producao') ?>">Produção</a></li>
            <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>producao/ordem-producao">Ordem de
                    Produção</a></li>
            <li class="breadcrumb-item active">Editar Ordem de Produção</a></li>
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
                                <form class="mb-0 needs-validation" novalidate
                                    action="<?= base_url("producao/ordem-producao/editar-ordem-producao/{$ordem->num_ordem_producao}") ?>"
                                    method="POST" id="OrdemProd">
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="inputOrdemProducao">Ordem de Produção</label>
                                            <input type="text" class="form-control" id="inputOrdemProducao"
                                                name="OrdemProducao" value="<?= $ordem->num_ordem_producao ?>" readonly>
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label for="inputProdutoOrdem">Produto de Produção</label>
                                            <input type="text" class="form-control" id="inputProdutoOrdem"
                                                name="CodProduto"
                                                value="<?= $ordem->cod_produto ?> - <?= $ordem->nome_produto ?>"
                                                readonly>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputTipoProduto">Tipo de Produto</label>
                                            <input type="text" class="form-control" id="inputTipoProduto"
                                                value="<?= $ordem->nome_tipo_produto ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="inputPedidoVenda">Pedido de Venda</label>
                                            <input type="text" class="form-control" id="inputPedidoVenda"
                                                value="<?php if($ordem->num_pedido_venda != 0) echo $ordem->num_pedido_venda .' - '. $ordem->nome_cliente ?>"
                                                readonly>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputDataEmissao">Data Emissão</label>
                                            <input type="text" class="form-control" name="DataEmissao"
                                                id="inputDataEmissao"
                                                value="<?= str_replace('-', '/', date("d-m-Y", strtotime($ordem->data_emissao))) ?>"
                                                readonly>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputDataFim">Data Fim <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="DataFim" id="inputDataFim"
                                                value="<?= str_replace('-', '/', date("d-m-Y", strtotime($ordem->data_fim))) ?>"
                                                required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputQuantPlanejada">Quantidade Planejada <span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="inputQuantPlanejada"
                                                    data-mask="#.##0,000" data-mask-reverse="true" name="QuantPlanejada"
                                                    value="<?= $ordem->quant_planejada ?>" required>
                                                <div class="input-group-append">
                                                    <span class="input-group-text"
                                                        style="width: 40px;"><?= $ordem->cod_unidade_medida ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="inputObservacao">Observações da Ordem de Produção</label>
                                            <textarea class="form-control" rows="3" id="inputObservacao"
                                                name="ObsOrdemProducao"><?= $ordem->observacoes ?></textarea>
                                        </div>
                                    </div>
                                </form>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h6>Lista de Materiais</h6>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-xs-12">
                                                <button data-toggle="modal" data-target="#inserir-componente"
                                                    type="button" class="btn btn-outline-info btn-sm"><i
                                                        class="fas fa-plus-circle"></i> Novo
                                                    Componente</button>
                                                <button data-toggle="modal" data-target="#elimina-componente"
                                                    type="button" class="btn btn-outline-danger btn-sm" id="btnExcluir"
                                                    disabled><i class="fas fa-trash-alt"></i>
                                                    Excluir</button>
                                            </div>
                                        </div>
                                        <form
                                            action="<?= base_url("producao/ordem-producao/excluir-componente-producao/{$ordem->num_ordem_producao}") ?>"
                                            method="POST" id="DeleteComponente" class="needs-validation mb-0" novalidate>
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th scope="col" class="text-center"><i
                                                                    class="fa-solid fa-check"></i></th>
                                                            <th scope="col">Produto</th>
                                                            <th scope="col">Tipo do produto</th>
                                                            <th scope="col" class="text-right">Consumo</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach($lista_componente as $key_componente => $componente) { ?>
                                                        <tr>
                                                            <td>
                                                                <div class="checkbox text-center">
                                                                    <input name="excluir_todos[]" type="checkbox"
                                                                        value="<?= $componente->seq_componente_producao ?>" />
                                                                </div>
                                                            </td>
                                                            <td><a href="#" data-toggle="modal" class="text-dark"
                                                                    data-target="#editar-componente<?= $componente->seq_componente_producao ?>"><?= $componente->cod_produto ?> - <?= $componente->nome_produto ?>
                                                            </td>
                                                            <td><?= $componente->nome_tipo_produto ?></a></td>
                                                            <td class="text-right text-info">
                                                                <?= number_format($componente->quant_consumo, 3, ',', '.') ?>
                                                                <?= $componente->cod_unidade_medida ?>
                                                            </td>
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <?php if ($lista_componente == false) { ?>
                                            <div class="text-center text-muted">
                                                <p class="font-italic mt-3">Nenhum componente inserido
                                                </p>
                                            </div>
                                            <?php } ?>
                                        </form>
                                    </div>
                                </div>
                                <hr class="mb-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="submit" form="OrdemProd" class="btn btn-primary" name="Opcao"
                                            value="salvar"><i class="fas fa-save"></i>
                                            Salvar</button>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row float-right">
                                            <div class="col-md-12">

                                                <a href="<?php echo base_url() ?>producao/reporte-producao/novo-reporte-producao/<?= $ordem->num_ordem_producao ?>"
                                                    class="link-load btn btn-info"><i class="fas fa-cogs"></i> Reportar
                                                    Produção</a>
                                                <a href="<?php echo base_url() ?>producao/ordem-producao"
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
                        Totais da ordem
                    </h6>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <?php if($ordem->nome_usuario != null) { ?>
                                <table class="table table-borderless table-sm mb-0">
                                    <tbody>
                                        <tr>
                                            <td class="text-left">
                                                Planejador
                                            </td>
                                            <td class="text-right">
                                                <?= $ordem->nome_usuario ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <?php } ?>
                                <table class="table table-borderless table-sm">
                                    <tbody>
                                        <tr>
                                            <td class="text-left">
                                                Planejado
                                            </td>
                                            <td class="text-right <?php if($ordem->quant_planejada > 0) echo "text-info"; else echo "text-muted"; ?>">
                                                <span
                                                    id="PlanTot"><?= number_format($ordem->quant_planejada, 3, ',', '.') ?></span>
                                                <?= $ordem->cod_unidade_medida ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">
                                                Produzido
                                            </td>
                                            <td class="text-right <?php if($ordem->quant_produzida > 0) echo "text-teal"; else echo "text-muted"; ?>">
                                                <?= number_format($ordem->quant_produzida, 3, ',', '.') ?>
                                                <?= $ordem->cod_unidade_medida ?>
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
                                    <td class="text-left pt-0 text-dark"><strong>SALDO DA ORDEM</strong></td>
                                    <td class="text-right pt-0 <?php if($ordem->quant_produzida < $ordem->quant_planejada) echo "text-warning"; else echo "text-muted"; ?>">
                                        <strong>
                                            <span
                                                id="TotTot"><?= number_format($ordem->quant_planejada - $ordem->quant_produzida, 3, ',', '.') ?></span>
                                            <?= $ordem->cod_unidade_medida ?>
                                        </strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card  mb-3">
                    <div class="card-body">
                        <a href="#" class="btn btn-outline-warning btn-block" type="button" id="imprimir"><i
                                class="fas fa-print"></i> Imprimir Ordem</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="elimina-componente" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Eliminar componente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Confirma eliminação dos componentes selecionados?
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger" form="DeleteComponente">Confirma</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="inserir-componente">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Novo componente</h5>
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
                                        <form class=" needs-validation" novalidate
                                            action="<?= base_url("producao/ordem-producao/inserir-produto-consumo/{$ordem->num_ordem_producao}") ?>"
                                            method='post' id='formComponente'>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="inputProdutoComponente">Componente de Produção <span
                                                            class="text-danger">*</span></label>
                                                    <select id="inputProdutoComponente" class="selectpicker show-tick form-control"
                                                        data-style="btn-input-primary" data-live-search="true" data-actions-box="true"
                                                        title=" " name="CodProdutoCons" required>
                                                        <?php foreach($lista_produto_cons as $key_produto_cons => $produto_cons) { ?>
                                                        <option value="<?= $produto_cons->cod_produto ?>"
                                                            <?php if($produto_cons->cod_produto == set_value('CodProdutoCons')) echo "selected"; ?>>
                                                            <?= $produto_cons->cod_produto ?> - <?= $produto_cons->nome_produto ?>
                                                        </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputTipoProdutoCons">Tipo do Produto</label>
                                                    <input type="text" id="inputTipoProdutoCons" class="form-control"
                                                        name="TipoProdutoCons" readonly value="<?= set_value('TipoProdutoCons'); ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputQuantConsumo">Quantidade de Consumo <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <input type="text" id="inputQuantConsumo" class="form-control"
                                                            name="QuantConsumo" data-mask="#.##0,000" data-mask-reverse="true"
                                                            value="<?= set_value('QuantConsumo') ?>" required>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text" style="width: 40px;" id="idUnCon"></span>
                                                        </div>
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
                <button type="submit" class="btn btn-primary" form="formComponente"><i class="fas fa-save"></i>
                    Salvar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<?php foreach($lista_componente as $key_componente => $componente) { ?>
<div class="modal fade" id="editar-componente<?= $componente->seq_componente_producao ?>">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar componente</h5>
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
                                        <form
                                            action="<?= base_url("producao/ordem-producao/salvar-produto-consumo/{$ordem->num_ordem_producao}/{$componente->seq_componente_producao}") ?>"
                                            method='post' id='formComponenteEdit<?= $componente->seq_componente_producao ?>'
                                            class=" needs-validation" novalidate>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="inputProdutoConsEdit">Componente de Produção</label>
                                                    <input type="text" id="inputProdutoConsEdit" class="form-control"
                                                        value="<?= $componente->cod_produto ?> - <?= $componente->nome_produto ?>"
                                                        readonly>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputTipoProdutoConsEdit">Tipo do Produto</label>
                                                    <input type="text" id="inputTipoProdutoConsEdit" class="form-control"
                                                        value="<?= $componente->nome_tipo_produto ?>" readonly>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputQuantConsumoEdit">Quantidade de Consumo <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <input type="text" id="inputQuantConsumoEdit" class="form-control"
                                                            data-mask="#.##0,000" data-mask-reverse="true" name="QuantConsumoEdit"
                                                            value="<?= number_format($componente->quant_consumo, 3, ',', '.') ?>">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"
                                                                style="width: 40px;"><?= $componente->cod_unidade_medida ?></span>
                                                        </div>
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
                <button type="submit" class="btn btn-primary"
                    form="formComponenteEdit<?= $componente->seq_componente_producao ?>"><i class="fas fa-save"></i>
                    Salvar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<script>
$(function() {
    $.applyDataMask();
});

$(function() {
    //evnto que deve carregar a janela a ser impressa 
    $('#imprimir').click(function() {

        var iFrame = document.createElement("iframe");
        iFrame.addEventListener("load", function() {
            iFrame.contentWindow.focus();
            iFrame.contentWindow.print();
            window.setTimeout(function() {
                document.body.removeChild(iFrame);
            }, 0);
        });
        iFrame.style.display = "none";
        iFrame.src = "<?= base_url("producao/imprimir-ordem/{$ordem->num_ordem_producao}") ?>";
        document.body.appendChild(iFrame);
    });
});

$("[name='excluir_todos[]']").click(function() {
    var cont = $("[name='excluir_todos[]']:checked").length;
    $("#btnExcluir").prop("disabled", cont ? false : true);
});

$("#inputProdutoComponente").change(function() {

    var baseurl = "<?php echo base_url(); ?>";

    var produto = $("#inputProdutoComponente").val();

    $.post(baseurl + "ajax/busca-produto", {
        produto: produto
    }, function(valor) {
        var aValor = valor.split('|');
        console.log(aValor);
        $("#idUnCon").text(aValor[0]);
        $("#inputTipoProdutoCons").val(aValor[1]);
    });

});

jQuery('#inputQuantPlanejada').on('keyup', function() {
    var totalPlanejado = parseFloat(jQuery('#inputQuantPlanejada').val() != '' ? (jQuery('#inputQuantPlanejada')
        .val().split(
            '.').join('')).replace(',', '.') : 0);

    var totalProduzido = <?= $ordem->quant_produzida ?>;

    var totalSaldo = totalPlanejado - totalProduzido;

    $("#PlanTot").text(totalPlanejado.toLocaleString("pt-BR", {
        style: "decimal",
        minimumFractionDigits: 3,
        maximumFractionDigits: 3
    }));

    $("#TotTot").text(totalSaldo.toLocaleString("pt-BR", {
        style: "decimal",
        minimumFractionDigits: 3,
        maximumFractionDigits: 3
    }));
});

$('#inputDataFim').datepicker({
    uiLibrary: 'bootstrap4'
});
</script>

<?php $this->load->view('gerais/footer'); ?>