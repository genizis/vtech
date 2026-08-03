<?php $this->load->view('gerais/header' , $menu); ?>
<?php $this->load->view('gerais/menu', $menu); ?>

<section>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('visao-geral') ?>">Visão Geral</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('producao') ?>">Produção</a></li>
            <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>producao/ordem-producao">Ordem de
                    Produção</a></li>
            <li class="breadcrumb-item active">Nova Ordem de Produção</a></li>
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
                                    action="<?= base_url('producao/ordem-producao/nova-ordem-producao') ?>"
                                    method="POST" id="OrdemProd">
                                    <div class="form-row">
                                        <div class="form-group col-md-8">
                                            <label for="inputProdutoOrdem">Produto de Produção <span
                                                    class="text-danger">*</span></label>
                                            <select id="inputProdutoOrdem" class="selectpicker show-tick form-control"
                                                data-live-search="true" data-actions-box="true" name="CodProduto"
                                                data-style="btn-input-primary" title=" " required>
                                                <?php foreach($lista_produto_prod as $key_produto_prod => $produto_prod) { ?>
                                                <option value="<?= $produto_prod->cod_produto ?>"
                                                    <?php if($produto_prod->cod_produto == set_value('CodProduto')) echo "selected"; ?>>
                                                    <?= $produto_prod->cod_produto ?> -
                                                    <?= $produto_prod->nome_produto ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="control-label" for="inputTipoProduto">Tipo de Produto</label>
                                            <input class="form-control" id="inputTipoProduto" type="text"
                                                name="TipoProduto" readonly value="<?= set_value('TipoProduto'); ?>">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="inputPedidoVenda">Pedido de Venda</label>
                                            <select id="inputPedidoVenda" class="selectpicker show-tick form-control"
                                                data-live-search="true" data-actions-box="true" name="PedidoVenda"
                                                data-style="btn-input-primary" title=" ">
                                                <?php foreach($lista_pedido as $key_pedido => $pedido) { ?>
                                                <option value="<?= $pedido->num_pedido_venda ?>"
                                                    <?php if($pedido->num_pedido_venda == set_value('PedidoVenda')) echo "selected"; ?>>
                                                    <?= $pedido->num_pedido_venda ?> -
                                                    <?= $pedido->nome_cliente ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputDataEmissao">Data Emissão <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="DataEmissao" value="<?php if(set_value('DataEmissao') == ""){
                                                                echo str_replace('-', '/', date("d-m-Y"));
                                                            }else{ echo set_value('DataEmissao'); } ?>"
                                                id="inputDataEmissao" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputDataFim">Data Fim <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="DataFim"
                                                value="<?= set_value('DataFim'); ?>" id="inputDataFim" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputQtdePlanejada">Quantidade Planejada <span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="inputQtdePlanejada"
                                                    name="QuantPlanejada" data-mask="#.##0,000" data-mask-reverse="true"
                                                    value="<?= set_value('QuantPlanejada'); ?>" required>
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="idUnPlan"
                                                        style="width: 40px;"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="inputObservacao">Observações da Ordem de Produção</label>
                                            <textarea class="form-control" rows="3" id="inputObservacao"
                                                name="ObsOrdemProducao"><?= set_value('ObsOrdemProducao'); ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-row" hidden>
                                        <div class="form-group col-md-12">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="inputPlanejaOrdem" name="PlanejaOrdens" value="1">
                                                <label class="custom-control-label" for="inputPlanejaOrdem">Planejar
                                                    Ordens dos Produtos da Estrutura</label>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h6>Lista de Materiais</h6>
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-xs-12">
                                                    <button type="button" class="btn btn-outline-info btn-sm"
                                                        data-toggle="tooltip" data-placement="bottom"
                                                        title="Você deve primeiramente salvar a ordem de produção antes de inserir os componentes"
                                                        disabled><i class="fas fa-plus-circle"></i> Novo
                                                        Componente</button>
                                                    <button type="button" class="btn btn-outline-danger btn-sm"
                                                        data-toggle="tooltip" data-placement="bottom"
                                                        title="Você deve primeiramente salvar oa ordem de produção antes de excluir os componentes"
                                                        disabled><i class="fas fa-trash-alt"></i>
                                                        Excluir</button>
                                                </div>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-hover">
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
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="text-center text-muted">
                                                <p class="font-italic mt-3">Nenhum componente inserido
                                                </p>
                                            </div>
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

                                                    <button class="btn btn-info" disabled><i class="fas fa-cogs"></i>
                                                        Reportar Produção</button>
                                                    <a href="<?php echo base_url() ?>producao/ordem-producao"
                                                        class="btn btn-secondary link-load">Cancelar</a>
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
            <div class="col-md-3 pl-0">
                <div class="card  mb-3">
                    <h6 class="card-header bg-white text-muted">
                        Totais da ordem
                    </h6>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-borderless table-sm mb-0">
                                    <tbody>
                                        <tr>
                                            <td class="text-left">
                                                Planejador
                                            </td>
                                            <td class="text-right">
                                                <?= getDadosUsuarioLogado()['nome_usuario'] ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="table table-borderless table-sm">
                                    <tbody>
                                        <tr>
                                            <td class="text-left">
                                                Planejado
                                            </td>
                                            <td class="text-right text-muted" id="idProdPlan">
                                                <span id="PlanTot">0,000</span> <span id="UnPlanTot"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">
                                                Produzido
                                            </td>
                                            <td class="text-right text-muted" id="idProdReal">
                                                0,000 <span id="UnProdTot"></span>
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
                                    <td class="text-right pt-0 text-warning" id="idSaldo">
                                        <strong>
                                            <span id="TotTot">0,000</span> <span id="UnTotTot"></span>
                                        </strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card  mb-3">
                    <div class="card-body">
                        <a href="#" class="btn btn-outline-warning btn-block disabled" type="button" id="imprimir"><i
                                class="fas fa-print"></i> Imprimir Ordem</a>
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

$("#inputProdutoOrdem").change(function() {

    var baseurl = "<?php echo base_url(); ?>";

    var produto = $("#inputProdutoOrdem").val();

    $.post(baseurl + "ajax/busca-produto", {
        produto: produto
    }, function(valor) {
        var aValor = valor.split('|');
        console.log(aValor);
        $("#idUnPlan").text(aValor[0]);
        $("#UnPlanTot").text(aValor[0]);
        $("#UnProdTot").text(aValor[0]);
        $("#UnTotTot").text(aValor[0]);
        $("#inputTipoProduto").val(aValor[1]);
    });

});

$('#inputDataEmissao').datepicker({
    uiLibrary: 'bootstrap4'
});

$('#inputDataFim').datepicker({
    uiLibrary: 'bootstrap4'
});

jQuery('#inputQtdePlanejada').on('keyup', function() {
    var totalPlanejado = parseFloat(jQuery('#inputQtdePlanejada').val() != '' ? (jQuery('#inputQtdePlanejada').val().split(
        '.').join('')).replace(',', '.') : 0);

    $("#PlanTot").text(totalPlanejado.toLocaleString("pt-BR", {
        style: "decimal",
        minimumFractionDigits: 3,
        maximumFractionDigits: 3
    }));
    if(totalPlanejado > 0){
        $('#idProdPlan').addClass("text-info");    
        $('#idProdPlan').removeClass("text-muted");    
    }else{
        $('#idProdPlan').removeClass("text-info");  
        $('#idProdPlan').addClass("text-muted"); 
    }

    $("#TotTot").text(totalPlanejado.toLocaleString("pt-BR", {
        style: "decimal",
        minimumFractionDigits: 3,
        maximumFractionDigits: 3
    }));
});

</script>

<?php $this->load->view('gerais/footer'); ?>