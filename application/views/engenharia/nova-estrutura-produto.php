<?php $this->load->view('gerais/header' , $menu); ?>
<?php $this->load->view('gerais/menu', $menu); ?>

<section>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('visao-geral') ?>">Visão Geral</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>estrutura-produto">Estrutura de Produto</a>
            </li>
            <li class="breadcrumb-item active">Nova Estrutura de Produto</li>
        </ol>
    </div>
</section>


<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12">
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
                                <form action="<?= base_url('estrutura-produto/nova-estrutura-produto') ?>" method="POST" id="EstruturaProd" class="needs-validation mb-0" novalidate>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="inputProduto">Produto de Produção <span class="text-danger">*</span></label>
                                            <select id="inputProduto" class="selectpicker show-tick form-control"
                                               data-style="btn-input-primary" data-live-search="true" data-actions-box="true"
                                                title=" " name="CodProduto" required>
                                                <?php foreach($lista_produto_prod as $key_produto_prod => $produto_prod) { ?>
                                                <option value="<?= $produto_prod->cod_produto ?>"
                                                <?php if($produto_prod->cod_produto == set_value('CodProduto')) echo "selected"; ?>>
                                                    <?= $produto_prod->cod_produto ?> -
                                                    <?= $produto_prod->nome_produto ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label class="control-label" for="inputTipoProduto">Tipo de Produto</label>
                                            <input class="form-control" id="inputTipoProduto" type="text" name="TipoProduto"
                                                readonly value="<?= set_value('TipoProduto'); ?>">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputQuantProducao">Quantidade de Produção <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="inputQuantProducao" data-mask="#.##0,000" data-mask-reverse="true"
                                                    name="QuantProducao" value="<?= set_value('QuantProducao'); ?>" required>
                                                <div class="input-group-append">
                                                        <span class="input-group-text" style="width: 40px;" id="idUnProd"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputTempoProducao">Tempo de Produção</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="inputTempoProducao" data-mask="#.##0,00" data-mask-reverse="true"
                                                    name="TempoProducao" value="<?= set_value('TempoProducao'); ?>">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"
                                                    style="width: 40px;">Hrs</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-xs-12">
                        <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="consumo-tab" data-toggle="tab" href="#consumo"
                                    role="tab" aria-controls="consumo" aria-selected="true">Produtos de Consumo</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="coproduto-tab" data-toggle="tab" href="#coproduto"
                                    role="tab" aria-controls="coproduto"
                                    aria-selected="false">Coprodutos</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card  mb-3">
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="consumo">                                    
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-xs-12">
                                                <button type="button" class="btn btn-outline-info btn-sm" data-toggle="tooltip" data-placement="bottom" 
                                                title="Você deve primeiramente salvar o produto antes de inserir os componentes" disabled><i class="fas fa-plus-circle"></i> Novo
                                                    Componente</button>
                                                <button type="button"
                                                    class="btn btn-outline-danger btn-sm" data-toggle="tooltip" data-placement="bottom" 
                                                title="Você deve primeiramente salvar o produto antes de excluir os componentes" disabled><i class="fas fa-trash-alt"></i>
                                                    Excluir</button>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th scope="col" class="text-center"><i
                                                                class="fa-solid fa-check"></i></th>
                                                        <th scope="col">Componente</th>
                                                        <th scope="col">Tipo</th>
                                                        <th scope="col" class="text-right">Consumo</th>
                                                    </tr>
                                                </thead>
                                                <tbody>                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="text-center text-muted">
                                            <p class="font-italic mt-3">Nenhum componente adicionado</p>
                                        </div>
                                    </div>
                                </div>                       
                            </div>
                            <div class="tab-pane fade" id="coproduto">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-xs-12">
                                                <button type="button" class="btn btn-outline-info btn-sm" data-toggle="tooltip" data-placement="bottom" 
                                                title="Você deve primeiramente salvar o produto antes de inserir os coprodutos" disabled><i class="fas fa-plus-circle"></i> Novo
                                                    Coproduto</button>
                                                <button type="button"
                                                    class="btn btn-outline-danger btn-sm" data-toggle="tooltip" data-placement="bottom" 
                                                title="Você deve primeiramente salvar o produto antes de excluir os coprodutos" disabled><i class="fas fa-trash-alt"></i>
                                                    Excluir</button>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th scope="col" class="text-center"><i
                                                                class="fa-solid fa-check"></i></th>
                                                        <th scope="col">Coproduto</th>
                                                        <th scope="col">Tipo</th>
                                                        <th scope="col" class="text-right">Quantidade</th>
                                                    </tr>
                                                </thead>
                                                <tbody>                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="text-center text-muted">
                                            <p class="font-italic mt-3">Nenhum coprooduto adicionado</p>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                            <hr class="mb-3">
                            <div class="row float-right">
                                <div class="col-lg-12 col-md-12 col-xs-12">
                                    <button type="submit" form="EstruturaProd" class="btn btn-primary"
                                        name="Opcao" value="salvar"><i class="fas fa-save"></i> Salvar</button>
                                    <a href="<?php echo base_url() ?>estrutura-produto"
                                        class="btn btn-secondary link-load">Cancelar</a>
                                </div>
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

$("#inputProduto").change(function() {

    var baseurl = "<?php echo base_url(); ?>";

    var produto = $("#inputProduto").val();

    $.post(baseurl + "ajax/busca-produto", {
        produto: produto
    }, function(valor) {
        var aValor = valor.split('|');
        console.log(aValor);
        $("#idUnProd").text(aValor[0]);
        $("#inputTipoProduto").val(aValor[1]);
    });

});

</script>

<?php $this->load->view('gerais/footer'); ?>