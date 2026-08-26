<?php $this->load->view('gerais/header' , $menu); ?>
<?php $this->load->view('gerais/menu', $menu); ?>

<section>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('visao-geral') ?>">Visão Geral</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('compras') ?>">Compras</a></li>
            <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>compras/ordem-compra">Ordem de Compra</a></li>
            <li class="breadcrumb-item active">Nova Ordem de Compra</a></li>
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
                                <form action="<?= base_url('compras/ordem-compra/nova-ordem-compra') ?>" 
                                     method="POST" class="needs-validation" 
                                     id="OrdemCompra" novalidate>
                                    <div class="form-row">                                        
                                        <div class="form-group col-md-12">
                                            <label for="inputProdutoCompra">Produto de Compra <span class="text-danger">*</span></label>
                                            <select id="inputProdutoCompra" class="selectpicker show-tick form-control"
                                                data-live-search="true" data-actions-box="true" data-style="btn-input-primary"
                                                title="Selecione um Produto" name="CodProduto" required>
                                                <?php foreach($lista_produto_comp as $key_produto_comp => $produto_comp) { ?>
                                                <option value="<?= $produto_comp->cod_produto ?>"
                                                <?php if($produto_comp->cod_produto == set_value('CodProduto')) echo "selected"; ?>>
                                                    <?= $produto_comp->cod_produto ?> -
                                                    <?= $produto_comp->nome_produto ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">    
                                        <div class="form-group col-md-4">
                                            <label for="inputTipoProduto">Tipo de Produto</label>
                                            <input type="text" class="form-control" id="inputTipoProduto"
                                                readonly name="TipoProduto" value="<?= set_value('TipoProduto'); ?>">
                                        </div>                                       
                                        <div class="form-group col-md-4">
                                            <label class="control-label" for="dateEntregaCompra">Data de Necessidade <span class="text-danger">*</span></label>
                                            <input class="form-control" id="dateEntregaCompra" type="text"
                                                name="DataNecessidade" value="<?= set_value('DataNecessidade'); ?>" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputQuantPedida">Quantidade Pedida <span
                                                            class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <input type="text" class="form-control"
                                                        value="<?= set_value('QuantPedida'); ?>" 
                                                        data-mask="#.##0,000" data-mask-reverse="true"
                                                    id="inputQuantPedida"
                                                    name="QuantPedida" required>
                                                <div class="input-group-append">
                                                    <span class="input-group-text"
                                                                style="width: 40px;" id="idUnProd"></span>
                                                </div>
                                            </div>
                                        </div>                                       
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="inputObservacao">Observações da Ordem de Compra</label>
                                            <textarea class="form-control" rows="3" id="inputObservacao"
                                                name="ObsOrdemCompra"><?= set_value('ObsOrdemCompra'); ?></textarea>
                                        </div>
                                    </div>
                                </form>                                    
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h6>Lista de Cotações</h6>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-xs-12">
                                                <button type="button" class="btn btn-outline-info btn-sm"
                                                        data-toggle="tooltip" data-placement="bottom"
                                                        title="Você deve primeiramente salvar a ordem de compra antes de inserir as cotações"
                                                        disabled><i class="fas fa-plus-circle"></i> Adicionar
                                                        Cotação</button>
                                                <button type="button" class="btn btn-outline-danger btn-sm"
                                                        data-toggle="tooltip" data-placement="bottom"
                                                        title="Você deve primeiramente salvar a ordem de compra antes de excluir as cotações"
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
                                                        <th scope="col">Fornecedor</th>
                                                        <th scope="col" class="text-center">Dias entrega</th>
                                                        <th scope="col" class="text-right">Valor unitário</th>
                                                        <th scope="col" class="text-right">Valor total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="text-center text-muted">
                                            <p class="font-italic mt-3">Nenhuma cotação adicionada
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <hr class="mb-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="submit" form="OrdemCompra" class="btn btn-primary" name="Opcao"
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
                                <table class="table table-borderless table-sm mb-0">
                                    <tbody>
                                        <tr>
                                            <td class="text-left">
                                                Usuário da ordem
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
                                                Quantidade pedida
                                            </td>
                                            <td class="text-right">
                                                <span id="QuantPedida"><?= number_format((float) (0), 3, ',', '.') ?></span> <span id="unQuanPedida"><?= "" ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">
                                                Custo médio
                                            </td>
                                            <td class="text-right">
                                                R$ <span id="CustoMedio"><?= number_format((float) (0), 2, ',', '.') ?></span>
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
                                                id="TotalComparacao"><?= number_format((float) (0), 2, ',', '.') ?></span>
                                        </strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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


$("#inputProdutoCompra").change(function() {

    var baseurl = "<?php echo base_url(); ?>";

    var produto = $("#inputProdutoCompra").val();

    $.post(baseurl + "ajax/busca-produto", {
        produto: produto
    }, function(valor) {
        var aValor = valor.split('|');
        $("#idUnProd").text(aValor[0]);
        $("#unQuanPedida").text(aValor[0]);
        $("#inputTipoProduto").val(aValor[1]);

        var custo = parseFloat(aValor[2]);
        var quant = parseFloat(jQuery('#inputQuantPedida').val() != '' ? (jQuery('#inputQuantPedida').val()
        .split('.').join('')).replace(',', '.') : 0);
        var total = custo * quant;

        $("#CustoMedio").text(custo.toLocaleString("pt-BR", {
            style: "decimal",
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        }));

        $("#TotalComparacao").text(total.toLocaleString("pt-BR", {
            style: "decimal",
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        }));
    });

});

$('#dateEntregaCompra').datepicker({
    uiLibrary: 'bootstrap4'
});

</script>

<?php $this->load->view('gerais/footer'); ?>