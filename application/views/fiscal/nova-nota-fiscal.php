<?php $this->load->view('gerais/header' , $menu); ?>
<?php $this->load->view('gerais/menu', $menu); ?>

<section>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('visao-geral') ?>">Visão Geral</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('fiscal') ?>">Fiscal</a></li>
            <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>fiscal/nota-fiscal">Nota Fiscal</a></li>
            <li class="breadcrumb-item active">Nova Nota Fiscal</li>
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
                                    action="<?= base_url('fiscal/nota-fiscal/inserir-nota-fiscal') ?>" method="POST"
                                    id="NotaFistal">
                                    <div class="form-row">
                                        <div class="form-group col-md-8">
                                            <label for="inputCliente">Cliente <span class="text-danger">*</span></label>
                                            <select id="inputCliente" class="selectpicker show-tick form-control"
                                                data-live-search="true" data-actions-box="true"
                                                title="Selecione um Cliente" data-style="btn-input-primary"
                                                name="CodCliente" required>
                                                <?php foreach($lista_cliente as $key_cliente => $cliente) { ?>
                                                <option value="<?= $cliente->cod_cliente ?>"
                                                    <?php if($cliente->cod_cliente == set_value('CodCliente')) echo "selected"; ?>>
                                                    <?= $cliente->cod_cliente ?> -
                                                    <?= $cliente->nome_cliente ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputDateEmissao">Data de Emissão <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="inputDateEmissao"
                                                name="DataEmissao" value="<?php if(set_value('DataEmissao') == ""){
                                                                echo str_replace('-', '/', date("d-m-Y"));
                                                            }else{ echo set_value('DataEmissao'); } ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-8">
                                            <label for="inputNaturezaOperacao">Natureza de Operação <span
                                                    class="text-danger">*</span></label>
                                            <select id="inputNaturezaOperacao"
                                                class="selectpicker show-tick form-control" data-live-search="true"
                                                data-actions-box="true" title="Selecione uma Natureza de Operação"
                                                data-style="btn-input-primary" name="CodNatureza" required>
                                                <?php foreach ($naturezas as $key => $row) { ?>
                                                <option value="<?php echo $row->id ?>"
                                                    <?php if ($row->id == set_value('CodNatureza')) echo "selected"; ?>>
                                                    <?php echo $row->descricao ?> -
                                                    <?php echo $row->nome ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="indicadorFinal">NF Referência</label>
                                            <input class="form-control" id="inputPedidoCliente" type="text"
                                                name="NFReferencia"
                                                value="" >
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
                                                    data-mask-reverse="true" name="OutrasDespesas" id="inputOutrasDespesas"
                                                    value="<?= set_value('OutrasDespesas'); ?>">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputTipoDesconto">Desconto</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">R$</span>
                                                </div>
                                                <input type="text" class="form-control" data-mask="#.##0,00"
                                                    data-mask-reverse="true" name="Desconto" id="inputValorDesconto"
                                                    value="<?= set_value('Desconto'); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-8">
                                            <label for="inputTransportador">Transportador</label>
                                            <select id="inputTransportador" class="selectpicker show-tick form-control"
                                                data-live-search="true" data-actions-box="true"
                                                title="Selecione um Transportador" data-style="btn-input-primary"
                                                name="CodTransportador">
                                                <?php foreach($lista_transportador as $key_transportador => $transportador) { ?>
                                                <option value="<?= $transportador->cod_transportador ?>"
                                                    <?php if($transportador->cod_transportador == set_value('CodTransportador')) echo "selected"; ?>>
                                                    <?= $transportador->cod_transportador ?> -
                                                    <?= $transportador->nome_transportador ?></option>
                                                <?php } ?>
                                            </select>
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
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputQuantidade">Quantidade</label>
                                                    <input type="text" class="form-control" id="inputQuantidade"
                                                        value="<?= set_value('Quantidade'); ?>" name="Quantidade">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputEspecie">Espécie</label>
                                                    <input type="text" class="form-control" id="inputEspecie"
                                                        value="<?= set_value('Especie'); ?>" name="Especie">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputMarca">Marca</label>
                                                    <input type="text" class="form-control" id="inputMarca"
                                                        value="<?= set_value('Marca'); ?>" name="Marca">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputCodAntt">Código ANTT</label>
                                                    <input type="text" class="form-control" id="inputCodAntt"
                                                        value="<?= set_value('CodAntt'); ?>" name="CodAntt">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputPlacaVeiculo">Placa Veículo</label>
                                                    <input type="text" class="form-control" id="inputPlacaVeiculo"
                                                        value="<?= set_value('PlacaVeiculo'); ?>" name="PlacaVeiculo">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputUFVeiculo">UF Veículo</label>
                                                    <select class="form-control selectpicker show-tick"
                                                        data-live-search="true" title="Selecione a UF"
                                                        data-style="btn-input-primary" id="inputUFVeiculo"
                                                        name="UFVeiculo">
                                                        <?php foreach($estado as $key_estado => $estado) { ?>
                                                        <option value="<?= $estado->uf ?>"
                                                            <?php if($estado->uf == set_value('UFVeiculo')) echo "selected"; ?>>
                                                            <?= $estado->uf ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="tipoNfe">Informações Complementares</label>
                                            <textarea name="informacoesComplementares"
                                                class="form-control"><?= set_value('informacoesComplementares'); ?></textarea>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h6>Lista de Produtos</h6>
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-xs-12">
                                                    <button type="button" class="btn btn-outline-info btn-sm"
                                                        data-toggle="tooltip" data-placement="bottom"
                                                        title="Você deve primeiramente salvar o pedido antes de inserir os produtos"
                                                        disabled><i class="fas fa-plus-circle"></i> Adicionar
                                                        Produto</button>
                                                    <button type="button" class="btn btn-outline-danger btn-sm"
                                                        data-toggle="tooltip" data-placement="bottom"
                                                        title="Você deve primeiramente salvar o pedido antes de excluir os produtos"
                                                        disabled><i class="fas fa-trash-alt"></i>
                                                        Excluir</button>
                                                </div>
                                            </div>
                                            <table class="table table-bordered table-hover">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th scope="col" class="text-center"><i
                                                                    class="fa-solid fa-check"></i></th>
                                                        <th scope="col">Produto da NF</th>
                                                        <th scope="col" class="text-right">Quantidade</th>
                                                        <th scope="col" class="text-right">Valor unit</th>
                                                        <th scope="col" class="text-right">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                            <div class="text-center text-muted">
                                                <p class="font-italic mt-3">Nenhum produto adicionado
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="mb-3">
                                    <div class="row">
                                        <div class="col-md-6">
                                        <button type="submit" form="NotaFistal" class="btn btn-primary"
                                                        name="Opcao" value="salvar"><i class="fas fa-save"></i>
                                                        Salvar</button>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row float-right">
                                                <div class="col-md-12">
                                                    
                                                    <a href="#" class="btn btn-info link-load disabled"><i class="fa-solid fa-calculator"></i> Calcular NF</a>
                                                    <a href="<?php echo base_url() ?>fiscal/nota-fiscal"
                                                        class="btn btn-secondary">Cancelar</a>
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
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <p class="card-text text-muted mb-0">Emissão de nota fiscal<br><span
                                        class="font-italic text-size-80">Totais da nota</span>
                                <p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
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
                                            <span id="tipoDescontoValor">R$</span> <span id="ValorDesconto">0,00</span><span id="tipoDescontoPerc"></span>
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
                                    <td class="text-left pt-0 text-dark"><strong>Total da nota</strong></td>
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
                        <div class="row">
                            <div class="col-md-6">
                                <button type="button" class="btn btn-outline-info btn-block" data-toggle="modal"
                                    data-target="#exampleModal" disabled="disabled">Visualizar XML
                                </button>
                            </div>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-outline-info btn-block" id="imprimir"
                                    disabled="disabled">Visualizar Danfe
                                </button>
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
        $('#idValorFrete').addClass("text-teal");        
    }else{
        $('#idValorFrete').removeClass("text-teal");  
    }

    var valorSeguro = parseFloat(jQuery('#inputSeguro').val() != '' ? (jQuery(
            '#inputSeguro').val()
        .split('.').join('')).replace(',', '.') : 0);
    $('#ValorSeguro').text(valorSeguro.toLocaleString("pt-BR", {
                        style: "decimal",
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                       }));
    if(valorSeguro > 0){
        $('#idValorSeguro').addClass("text-teal");        
    }else{
        $('#idValorSeguro').removeClass("text-teal");  
    }

    var valorOutrasDespesas = parseFloat(jQuery('#inputOutrasDespesas').val() != '' ? (jQuery(
            '#inputOutrasDespesas').val()
        .split('.').join('')).replace(',', '.') : 0);
    $('#OutrasDespesas').text(valorOutrasDespesas.toLocaleString("pt-BR", {
                        style: "decimal",
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                       }));
    if(valorOutrasDespesas > 0){
        $('#idOutrasDespesas').addClass("text-teal");        
    }else{
        $('#idOutrasDespesas').removeClass("text-teal");  
    }    
    
    var valorDesconto = parseFloat(jQuery('#inputValorDesconto').val() != '' ? (jQuery(
            '#inputValorDesconto').val()
        .split('.').join('')).replace(',', '.') : 0);
    $('#ValorDesconto').text(valorDesconto.toLocaleString("pt-BR", {
                        style: "decimal",
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                       }));
    if(valorDesconto > 0){
        $('#idValorDesconto').addClass("text-danger");        
    }else{
        $('#idValorDesconto').removeClass("text-danger");  
    }

    var calcDesconto = valorDesconto;

    var totalLiquido = 0;
    totalLiquido = valorFrete + valorSeguro + valorOutrasDespesas - calcDesconto;

    $('#TotalPedido').text(totalLiquido.toLocaleString("pt-BR", {
                        style: "decimal",
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                       }));
    if(totalLiquido > 0){
        $('#idTotalPedido').addClass("text-teal");        
    }else{
        $('#idTotalPedido').removeClass("text-teal");  
    }
}
</script>

<?php $this->load->view('gerais/footer'); ?>