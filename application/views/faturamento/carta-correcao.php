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
            <li class="breadcrumb-item active">Emissão de Carta de Correção</a></li>
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
                                                Serie
                                            </td>
                                            <td class="text-right align-middle">
                                                <?= $nota->serie ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left align-middle ">
                                                Nota fiscal
                                            </td>
                                            <td class="text-right align-middle">
                                                <strong><?= $nota->numero ?></strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left align-middle ">
                                                Data emissão
                                            </td>
                                            <td class="text-right align-middle">
                                                <?= str_replace('-', '/', date("d-m-Y", strtotime($nota->data_emissao))) ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
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
                                                        <?= number_format($faturamento->perc_comissao, 2, ',', '.') ?>%
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
                                                R$ <?= number_format($faturamento->valor_total, 2, ',', '.') ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left align-middle ">
                                                Frete <?php if($faturamento->tipo_frete == 1) echo "CIF"; else echo "FOB"; ?>
                                            </td>
                                            <td
                                                class="text-right align-middle <?php if($faturamento->valor_frete > 0) echo "text-teal"; else echo "text-muted"; ?>">
                                                R$ <?= number_format($faturamento->valor_frete, 2, ',', '.') ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left align-middle">
                                                Seguro
                                            </td>
                                            <td
                                                class="text-right align-middle <?php if($faturamento->valor_seguro > 0) echo "text-teal"; else echo "text-muted"; ?>">
                                                R$ <?= number_format($faturamento->valor_seguro, 2, ',', '.') ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left align-middle ">
                                                Outras despesas
                                            </td>
                                            <td
                                                class="text-right align-middle <?php if($faturamento->outras_despesas > 0) echo "text-teal"; else echo "text-muted"; ?>">
                                                R$ <?= number_format($faturamento->outras_despesas, 2, ',', '.') ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left align-middle">
                                                Desconto
                                            </td>
                                            <td
                                                class="text-right align-middle <?php if($faturamento->valor_desconto > 0) echo "text-danger"; else echo "text-muted"; ?>">
                                                R$ <?= number_format($faturamento->valor_desconto, 2, ',', '.') ?>
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
                                            R$ <?= number_format($faturamento->valor_total + $faturamento->valor_frete + $faturamento->valor_seguro + $faturamento->outras_despesas -
                                                      $faturamento->valor_desconto, 2, ',', '.') ?>
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
                                <form class="mb-0 needs-validation"
                                    action="<?php echo base_url('faturamento/pedido/emitir-carta-correcao/' . $nf) ?>"
                                    method="POST" id="cartaCorrecaoNFe">
                                    <input type="hidden" value="<?php echo $nf ?>" name="nf_id" />                                    
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="inputCliente">Descrição da Correção <span
                                                    class="text-danger">*</span></label>
                                            <textarea name="correcao" class="form-control" required rows="6"></textarea>
                                        </div>
                                    </div>
                                    <hr class="mb-3">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" form="cartaCorrecaoNFe" class="btn btn-warning pull-right"
                                                    name="Opcao" value="salvar"><i class="fa-solid fa-eraser"></i>
                                                        Emitir Carta de Correção
                                            </button>

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