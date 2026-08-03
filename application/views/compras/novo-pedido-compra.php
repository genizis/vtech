<?php $this->load->view('gerais/header' , $menu); ?>
<?php $this->load->view('gerais/menu', $menu); ?>

<section>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('visao-geral') ?>">Visão Geral</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('compras') ?>">Compras</a></li>
            <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>compras/pedido-compra">Pedido de
                    Compra</a></li>
            <li class="breadcrumb-item active">Novo Pedido de Compra</a></li>
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
                                <form action="<?= base_url('compras/pedido-compra/novo-pedido-compra') ?>" method="POST"
                                    id="PedidoCompra" class="needs-validation mb-0" novalidate>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="inputFornecedor">Fornecedor <span
                                                    class="text-danger">*</span></label>
                                            <select id="inputFornecedor" class="selectpicker show-tick form-control"
                                                data-live-search="true" data-actions-box="true"
                                                data-style="btn-input-primary" title="Selecione um Fornecedor"
                                                name="CodFornecedor" required>
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
                                        <div class="form-group col-md-4">
                                            <label for="inputDateEmissao">Data de Emissão <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="inputDateEmissao"
                                                name="DataEmissao" value="<?php if(set_value('DataEmissao') == ""){
                                                                echo str_replace('-', '/', date("d-m-Y"));
                                                            }else{ echo set_value('DataEmissao'); } ?>" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputDateEntrega">Data de Entrega <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="inputDateEntrega"
                                                name="DataEntrega" value="<?= set_value('DataEntrega'); ?>" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputTipoFrete">Frete</label>
                                            <div class="input-group">
                                                <select id="inputTipoFrete" class="selectpicker show-tick form-control"
                                                    data-actions-box="true" data-style="btn-input-primary"
                                                    name="TipoFrete">
                                                    <option value="1">CIF R$</option>
                                                    <option value="2">FOB R$</option>
                                                </select>
                                                <input type="text" class="form-control" data-mask="#.##0,00"
                                                    data-mask-reverse="true" name="Frete" id="inputValorFrete"
                                                    value="<?= set_value('Frete'); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label>Seguro</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">R$</span>
                                                </div>
                                                <input type="text" class="form-control" data-mask="#.##0,00"
                                                    data-mask-reverse="true" name="Seguro" id="inputSeguro"
                                                    value="<?= set_value('Seguro'); ?>">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Outras Despesas</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">R$</span>
                                                </div>
                                                <input type="text" class="form-control" data-mask="#.##0,00"
                                                    data-mask-reverse="true" name="OutrasDespesas"
                                                    id="inputOutrasDespesas"
                                                    value="<?= set_value('OutrasDespesas'); ?>">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputTipoDesconto">Desconto</label>
                                            <div class="input-group">
                                                <select id="inputTipoDesconto"
                                                    class="selectpicker show-tick form-control" data-actions-box="true"
                                                    data-style="btn-input-primary" name="TipoDesconto">
                                                    <option value="1">R$</option>
                                                    <option value="2">%</option>
                                                </select>
                                                <input type="text" class="form-control" data-mask="#.##0,00"
                                                    data-mask-reverse="true" name="Desconto" id="inputValorDesconto"
                                                    value="<?= set_value('Desconto'); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="inputObservacao">Observações do Pedido de Compra</label>
                                            <textarea class="form-control" rows="3" id="inputObservacao"
                                                name="ObsPedidoCompra"><?= set_value('ObsPedidoCompra'); ?></textarea>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h6>Lista de Ordens</h6>
                                            <div class="row  button-pane">
                                                <div class="col-lg-12 col-md-12 col-xs-12">
                                                    <button type="button" class="btn btn-outline-primary btn-sm"
                                                        data-toggle="tooltip" data-placement="bottom"
                                                        title="Você deve primeiramente salvar o pedido antes de adicionar uma ordem"
                                                        disabled><i class="fas fa-check-circle"></i> Adicionar
                                                        Ordem de Compra</button>
                                                    <button type="button" class="btn btn-outline-info btn-sm"
                                                        data-toggle="tooltip" data-placement="bottom"
                                                        title="Você deve primeiramente salvar o pedido antes de criar um nova ordem"
                                                        disabled><i class="fas fa-plus-circle"></i> Nova
                                                        Ordem de Compra</button>
                                                    <button type="button" class="btn btn-outline-danger btn-sm"
                                                        data-toggle="tooltip" data-placement="bottom"
                                                        title="Você deve primeiramente salvar o pedido antes de excluir as ordens"
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
                                                            <th scope="col" class="text-center">Ordem</th>
                                                            <th scope="col">Produto</th>
                                                            <th scope="col" class="text-left">Tipo</th>
                                                            <th scope="col" class="text-right">Quantidade</th>
                                                            <th scope="col" class="text-right">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="text-center text-muted">
                                                <p class="font-italic mt-3">Nenhum produto adicionado</p>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="mb-3">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button type="submit" form="PedidoCompra" class="btn btn-primary"
                                                name="Opcao" value="salvar"><i class="fas fa-save"></i>
                                                Salvar</button>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row float-right">
                                                <div class="col-md-12">
                                                    <button class="btn btn-info" disabled><i
                                                            class="fas fa-box-open"></i> Receber Material</button>
                                                    <a href="<?php echo base_url() ?>compras/pedido-compra"
                                                        class="link-load btn btn-secondary">Cancelar</a>
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
                        Totais do pedido<br>
                        <span class="font-italic text-size-80">Compra planejada</span>
                    </h6>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-borderless table-sm mb-0">
                                    <tbody>
                                        <tr>
                                            <td class="text-left">
                                                Usuário do pedido
                                            </td>
                                            <td class="text-right">
                                                <?= getDadosUsuarioLogado()['nome_usuario'] ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="table table-borderless table-sm mb-0">
                                    <tbody>
                                        <tr>
                                            <td class="text-left">
                                                Total em produtos
                                            </td>
                                            <td class="text-right" id="idTotoProduto">
                                                R$ <span id="TotoProduto">0,00</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">
                                                Valor de frete <span id="idTipoFrete">CIF</span>
                                            </td>
                                            <td class="text-right" id="idValorFrete">
                                                R$ <span id="ValorFrete">0,00</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">
                                                Valor de seguro
                                            </td>
                                            <td class="text-right" id="idValorSeguro">
                                                R$ <span id="ValorSeguro">0,00</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">
                                                Outras despesas
                                            </td>
                                            <td class="text-right" id="idOutrasDespesas">
                                                R$ <span id="OutrasDespesas">0,00</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">
                                                Desconto
                                            </td>
                                            <td class="text-right" id="idValorDesconto">
                                                <span id="tipoDescontoValor">R$</span> <span
                                                    id="ValorDesconto">0,00</span><span id="tipoDescontoPerc"></span>
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
                                    <td class="text-left pt-0 text-dark"><strong>Total do pedido</strong></td>
                                    <td class="text-right pt-0" id="idTotalPedido">
                                        <strong>
                                            R$ <span id="TotalPedido">0,00</span>
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
                                class="fas fa-print"></i> Imprimir Pedido</a>
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

$("#inputTipoFrete").change(function() {
    calcTotalVenda();
});

jQuery('#inputValorFrete').on('keyup', function() {
    calcTotalVenda();
});

jQuery('#inputSeguro').on('keyup', function() {
    calcTotalVenda();
});

jQuery('#inputOutrasDespesas').on('keyup', function() {
    calcTotalVenda();
});

$("#inputTipoDesconto").change(function() {
    calcTotalVenda();
});

jQuery('#inputValorDesconto').on('keyup', function() {
    calcTotalVenda();
});

function calcTotalVenda() {

    var tipoFrete = $('#inputTipoFrete').val(); 
    if(tipoFrete == 1){
        $('#idTipoFrete').text('CIF'); 
    }else{
        $('#idTipoFrete').text('FOB'); 
    }    

    var valorFrete = parseFloat(jQuery('#inputValorFrete').val() != '' ? (jQuery(
            '#inputValorFrete').val()
        .split('.').join('')).replace(',', '.') : 0);
    $('#ValorFrete').text(valorFrete.toLocaleString("pt-BR", {
                        style: "decimal",
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                       }));
    if(valorFrete > 0){
        $('#idValorFrete').addClass("text-info");        
    }else{
        $('#idValorFrete').removeClass("text-info");  
    }

    var valorSeguro = parseFloat(jQuery('#inputSeguro').val() != '' ? (jQuery(
            '#inputSeguro').val()
        .split('.').join('')).replace(',', '.') : 0);
    $('#ValorSeguro').text(valorSeguro.toLocaleString("pt-BR", {
        style: "decimal",
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    }));
    if (valorSeguro > 0) {
        $('#idValorSeguro').addClass("text-info");
    } else {
        $('#idValorSeguro').removeClass("text-info");
    }

    var valorOutrasDespesas = parseFloat(jQuery('#inputOutrasDespesas').val() != '' ? (jQuery(
            '#inputOutrasDespesas').val()
        .split('.').join('')).replace(',', '.') : 0);
    $('#OutrasDespesas').text(valorOutrasDespesas.toLocaleString("pt-BR", {
        style: "decimal",
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    }));
    if (valorOutrasDespesas > 0) {
        $('#idOutrasDespesas').addClass("text-info");
    } else {
        $('#idOutrasDespesas').removeClass("text-info");
    }

    var valorDesconto = parseFloat(jQuery('#inputValorDesconto').val() != '' ? (jQuery(
            '#inputValorDesconto').val()
        .split('.').join('')).replace(',', '.') : 0);
    $('#ValorDesconto').text(valorDesconto.toLocaleString("pt-BR", {
        style: "decimal",
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    }));
    if (valorDesconto > 0) {
        $('#idValorDesconto').addClass("text-teal");
    } else {
        $('#idValorDesconto').removeClass("text-teal");
    }

    var calcDesconto = 0;
    var tipoDesconto = $('#inputTipoDesconto').val();
    if (tipoDesconto == 1) {
        $('#tipoDescontoValor').text("R$");
        $('#tipoDescontoPerc').text("");
        calcDesconto = valorDesconto;
    } else {
        $('#tipoDescontoValor').text("");
        $('#tipoDescontoPerc').text("%");
        calcDesconto = 0;
    }

    var totalLiquido = 0;
    totalLiquido = valorFrete + valorSeguro + valorOutrasDespesas - calcDesconto;

    $('#TotalPedido').text(totalLiquido.toLocaleString("pt-BR", {
        style: "decimal",
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    }));
    if (totalLiquido > 0) {
        $('#idTotalPedido').addClass("text-info");
    } else {
        $('#idTotalPedido').removeClass("text-info");
    }
}
</script>

<?php $this->load->view('gerais/footer'); ?>