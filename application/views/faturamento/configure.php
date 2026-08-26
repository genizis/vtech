<?php $this->load->view('gerais/header', $menu); ?>
<?php $this->load->view('gerais/menu', $menu); ?>

<section>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('visao-geral') ?>">Visão Geral</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url('vendas') ?>">Vendas</a></li>
            <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>vendas/faturamento-pedido">Faturamento
                    de Pedido</a></li>
            <li class="breadcrumb-item active"><a
                    href="<?php echo base_url() ?>vendas/faturamento-pedido/novo-faturamento-pedido/<?= $faturamento->num_pedido_venda ?>">Novo
                    Faturamento de Pedido</a></li>
            <li class="breadcrumb-item active">Emissão Nota Fiscal</a></li>
        </ol>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card  mb-3">
                    <div class="card-body border-bottom">
                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="card-title mb-0">
                                    <strong>
                                        <?= $pedido->cod_cliente ?> - <?= $pedido->nome_cliente ?>
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
                                            <td class="text-left align-middle ">
                                                Pedido
                                            </td>
                                            <td class="text-right align-middle">
                                                <strong><?= $faturamento->num_pedido_venda ?></strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left align-middle ">
                                                Faturamento
                                            </td>
                                            <td class="text-right align-middle">
                                                <?= $faturamento->cod_faturamento_pedido ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left align-middle ">
                                                Data faturamento
                                            </td>
                                            <td class="text-right align-middle">
                                                <?= str_replace('-', '/', date("d-m-Y", strtotime($faturamento->data_faturamento))) ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <?php if($faturamento->cod_vendedor != 0) { ?>
                                        <table class="table table-borderless table-sm mb-0">
                                            <tbody>
                                                <tr>
                                                    <td class="text-left align-middle ">
                                                        Vendedor
                                                    </td>
                                                    <td class="text-right align-middle">
                                                        <?= $faturamento->nome_vendedor ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle ">
                                                        Comissão
                                                    </td>
                                                    <td class="text-right align-middle <?php if($faturamento->perc_comissao > 0) echo "text-info"; else echo "text-muted"; ?>">
                                                        <?= number_format((float) ($faturamento->perc_comissao), 2, ',', '.') ?>%
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <?php } ?>
                                <?php if($faturamento->cod_transportador != 0) { ?>
                                <table class="table table-borderless table-sm mb-0">
                                    <tbody>
                                        <tr>
                                            <td class="text-left align-middle ">
                                                Transportador
                                            </td>
                                            <td class="text-right align-middle">
                                                <?= $faturamento->nome_transportador ?>
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
                                                class="text-right align-middle <?php if($faturamento->valor_total > 0) echo "text-teal"; else echo "text-muted"; ?>">
                                                R$ <?= number_format((float) ($faturamento->valor_total), 2, ',', '.') ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left align-middle ">
                                                Frete <?php if($faturamento->tipo_frete == 1) echo "CIF"; else echo "FOB"; ?>
                                            </td>
                                            <td
                                                class="text-right align-middle <?php if($faturamento->valor_frete > 0) echo "text-teal"; else echo "text-muted"; ?>">
                                                R$ <?= number_format((float) ($faturamento->valor_frete), 2, ',', '.') ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left align-middle">
                                                Seguro
                                            </td>
                                            <td
                                                class="text-right align-middle <?php if($faturamento->valor_seguro > 0) echo "text-teal"; else echo "text-muted"; ?>">
                                                R$ <?= number_format((float) ($faturamento->valor_seguro), 2, ',', '.') ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left align-middle ">
                                                Outras despesas
                                            </td>
                                            <td
                                                class="text-right align-middle <?php if($faturamento->outras_despesas > 0) echo "text-teal"; else echo "text-muted"; ?>">
                                                R$ <?= number_format((float) ($faturamento->outras_despesas), 2, ',', '.') ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left align-middle">
                                                Desconto
                                            </td>
                                            <td
                                                class="text-right align-middle <?php if($faturamento->valor_desconto > 0) echo "text-danger"; else echo "text-muted"; ?>">
                                                R$ <?= number_format((float) ($faturamento->valor_desconto), 2, ',', '.') ?>
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
                                    <td class="text-left pt-0 text-dark"><strong>TOTAL FATURADO</strong></td>
                                    <td
                                        class="text-right pt-0 <?php if($pedido->valor_total_faturado > 0) echo "text-teal"; ?>">
                                        <strong>
                                            R$ <?= number_format((float) ($faturamento->valor_total + $faturamento->valor_frete + $faturamento->valor_seguro + $faturamento->outras_despesas -
                                                      $faturamento->valor_desconto), 2, ',', '.') ?>
                                        </strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php if($faturamento->observacoes != "") { ?>
                <div class="card  mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <p class="card-text text-muted mb-0">Observação</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <?= $faturamento->observacoes ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <div class="card  mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <button type="button" class="btn btn-outline-info btn-block" data-toggle="modal"
                                    data-target="#exampleModal" disabled="disabled">Simular XML
                                </button>
                            </div>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-outline-info btn-block" id="imprimir"
                                    disabled="disabled">Simular DaNFe
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 pl-0">
                <div class="card  mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-xs-12">
                                <?php if ($this->session->flashdata('erro') <> "") { ?>
                                <div class="alert alert-danger alert-dismissible fade show" id="alert" role="alert">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>Atenção!</strong> <?php echo $this->session->flashdata('erro') ?>
                                </div>
                                <?php }
                  $this->session->set_flashdata('erro', ''); ?>
                                <?php if ($this->session->flashdata('sucesso') <> "") { ?>
                                <div class="alert alert-success alert-dismissible fade show" id="alert" role="alert">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>Muito bem!</strong>
                                    <?php echo $this->session->flashdata('sucesso') ?>
                                </div>
                                <?php }
                  $this->session->set_flashdata('sucesso', ''); ?>
                                <form class="mb-0 needs-validation" novalidate
                                    action="<?php echo base_url('faturamento/pedido/configurar-nfe-submit') ?>"
                                    method="POST" id="ConfigureNatureza">
                                    <input type="hidden" value="<?php echo $faturamentoId ?>" name="faturamento_id" />

                                    <div class="form-row">
                                        <div class="form-group col-md-9">
                                            <label for="inputCliente">Natureza de Operação <span
                                                    class="text-danger">*</span></label>
                                            <select id="inputCliente" class="selectpicker show-tick form-control"
                                                data-live-search="true" data-actions-box="true"
                                                title="Selecione uma Natureza de Operação"
                                                data-style="btn-input-primary" name="CodNatureza" required>
                                                <?php foreach ($naturezas as $key => $row) { ?>
                                                <option value="<?php echo $row->id ?>"
                                                    <?php if ($row->id == set_value('CodNatureza')) echo "selected"; ?>>
                                                    <?php echo $row->descricao ?> -
                                                    <?php echo $row->nome ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="inputDataFaturamento">Data de Emissão <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" id="inputDataFaturamento" type="text"
                                                name="DataFaturamento"
                                                value="<?= str_replace('-', '/', date("d-m-Y", strtotime($faturamento->data_faturamento))) ?>"
                                                required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="indicadorFinal">Pedido Cliente (xPed)</label>
                                            <input class="form-control" id="inputPedidoCliente" type="text"
                                                name="PedidoCliente"
                                                value="" >
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="indicadorFinal">Consumidor</label>
                                            <select class="form-control selectpicker show-tick"
                                                data-style="btn-input-primary" id="indicadorFinal"
                                                name="indicadorFinal">
                                                <?php foreach ($indicadorFinal as $key => $name) { ?>
                                                <option value="<?php echo $key ?>">
                                                    <?php echo $name ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="indicadorPresencial">Indicador de Presença</label>
                                            <select class="form-control selectpicker show-tick"
                                                data-style="btn-input-primary" id="indicadorPresencial"
                                                name="indicadorPresencial">
                                                <?php foreach ($indicadorPresencial as $key => $name) { ?>
                                                <option value="<?php echo $key ?>">
                                                    <?php echo $name ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="tipoNfe">Informações Complementares</label>
                                            <textarea name="informacoesComplementares" rows="4" readonly
                                                class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <hr>
                                    <div>
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item">
                                                <a class="nav-link active disabled" data-toggle="tab"
                                                    href="#nf-2">Produtos da
                                                    Nota</a>
                                            </li>
                                            <?php if($faturamento->cod_transportador != 0 ) { ?>
                                            <li class="nav-item">
                                                <a class="nav-link  disabled" data-toggle="tab"
                                                    href="#nf-3">Transportador</a>
                                            </li>
                                            <?php } ?>
                                            <?php if($pedido->tipo_pessoa == 3 ) { ?>
                                            <li class="nav-item">
                                                <a class="nav-link disabled" data-toggle="tab" href="#nf-4">Exportação</a>
                                            </li>
                                            <?php } ?>
                                            <?php if($titulos != null) { ?>
                                            <li class="nav-item">
                                                <a class="nav-link disabled" data-toggle="tab" href="#nf-5">Duplicatas</a>
                                            </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                    <div class="tab-content">
                                        <!-- Produtos início-->
                                        <div class="tab-pane fade active show" id="nf-2">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered mb-3">
                                                            <thead class="thead-light">
                                                                <tr>
                                                                    <th>Produto de venda</th>
                                                                    <th class="text-right">Quantidade</th>
                                                                    <th class="text-right">Valor unitário</th>
                                                                    <th class="text-right">Total da venda</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="text-center text-muted">
                                                        <p class="font-italic mt-3">Você deve clicar em continuar para
                                                            prosseguir com a emissão da NF</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="mb-3">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button type="submit" form="ConfigureNatureza" class="btn btn-primary"
                                                name="Opcao" value="salvar"><i class="fas fa-save"></i> Continuar
                                            </button>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="row float-right">
                                                <div class="col-md-12">
                                                    <a href="#" class="link-load btn btn-teal disabled"><i
                                                            class="fa-solid fa-check"></i>
                                                        Emitir NF
                                                    </a>
                                                    <a href="#" class="link-load btn btn-danger disabled"
                                                        title="Cancelar Emissão">
                                                        <i class="fas fa-trash"></i> Cancelar NF
                                                    </a>
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
</section>


<script>
$(function() {
    $.applyDataMask();
});

$('#inputDateEmissao').datepicker({
    uiLibrary: 'bootstrap4'
});

$('#inputDataFaturamento').datepicker({
    uiLibrary: 'bootstrap4'
});

$('#inputDateEntrega').datepicker({
    uiLibrary: 'bootstrap4'
});

$("#inputVendedor").change(function() {

    var baseurl = "<?php echo base_url(); ?>";

    var vendedor = $("#inputVendedor").val();

    $.post(baseurl + "ajax/busca-vendedor", {
        vendedor: vendedor
    }, function(valor) {
        console.log(valor);
        $("#inputPerComissao").val(valor);
    });

    $("#inputPerComissao").prop("disabled", false);

});
</script>

<?php $this->load->view('gerais/footer'); ?>