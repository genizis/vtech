<?php $this->load->view('gerais/header' , $menu); ?>
<?php $this->load->view('gerais/menu', $menu); ?>

<section>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('visao-geral') ?>">Visão Geral</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>estrutura-produto">Estrutura de Produto</a>
            </li>
            <li class="breadcrumb-item active">Editar Estrutura de Produto</li>
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
                                <form action="<?= base_url("estrutura-produto/editar-estrutura-produto/{$estrutura->cod_produto}") ?>" method="POST"
                                    id="EstruturaProd" class="needs-validation mb-0" novalidate> 
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label class="control-label" for="inputCodProduto">Produto de Produção</label>
                                            <input class="form-control" id="inputCodProduto" type="text" readonly
                                                value="<?= $estrutura->cod_produto?> - <?= $estrutura->nome_produto ?>" name="CodProduto">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label class="control-label" for="inputTipoProduto">Tipo de Produto</label>
                                            <input class="form-control" id="inputTipoProduto" type="text" readonly
                                                value="<?= $estrutura->nome_tipo_produto ?>">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputQuantProducao">Quantidade de Produção <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="inputQuantProducao"
                                                data-mask="#.##0,000" data-mask-reverse="true"
                                                value="<?= $estrutura->quant_producao ?>" name="QuantProducao" required>
                                                <div class="input-group-append">
                                                    <span class="input-group-text"
                                                    style="width: 40px;"><?= $estrutura->cod_unidade_medida ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputTempoProducao">Tempo de Produção</label>    
                                            <div class="input-group">                                        
                                                <input type="text" class="form-control" id="inputTempoProducao"
                                                    data-mask="#.##0,00" data-mask-reverse="true"
                                                    value="<?= $estrutura->tempo_producao ?>" name="TempoProducao">
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
                                    <div class="col-lg-12 col-md-12 col-xs-12">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-xs-12 mb-0">
                                                <button data-toggle="modal" data-target="#inserir-componente" type="button"
                                                    class="btn btn-outline-info btn-sm"><i class="fas fa-plus-circle"></i> Novo
                                                    Componente</button>
                                                <button data-toggle="modal" data-target="#elimina-componente" type="button"
                                                    class="btn btn-outline-danger btn-sm" id="excluirComponente" disabled><i
                                                        class="fas fa-trash-alt"></i>
                                                    Excluir</button>
                                            </div>
                                        </div>
                                        <form action="<?= base_url('estrutura-produto/excluir-estrutura-componente') ?>" method="POST"
                                                id="DeleteComponente" class="needs-validation" novalidate>
                                            <input type="hidden" name="CodProdudoProd" value="<?= $estrutura->cod_produto ?>">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
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
                                                        <?php foreach($lista_componente as $key_componente => $componente) { ?>
                                                        <tr>
                                                            <td>
                                                                <div class="checkbox text-center">
                                                                    <input name="excluir_todos[]" type="checkbox"
                                                                        value="<?= $componente->seq_estrutura_componente ?>" />
                                                                </div>
                                                            </td>
                                                            <td><a
                                                                    href="#" class="text-dark"
                                                                    data-toggle="modal" data-target="#editar-componente<?= $componente->seq_estrutura_componente ?>">
                                                                        <?= $componente->cod_produto_componente ?> - <?= $componente->nome_produto ?>
                                                                    </a>
                                                            </td>
                                                            <td><?= $componente->nome_tipo_produto ?></td>
                                                            <td class="text-right text-info"><?= number_format((float) ($componente->quant_consumo), 3, ',', '.') ?> <?= $componente->cod_unidade_medida ?></td>
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <?php if ($lista_componente == false) { ?>
                                            <div class="text-center text-muted">
                                                <p class="font-italic mt-3">Nenhum componente adicionado</p>
                                            </div>
                                            <?php } ?>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="coproduto">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-xs-12">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-xs-12 mb-0">
                                                <button data-toggle="modal" data-target="#inserir-coproduto" type="button"
                                                    class="btn btn-outline-info btn-sm"><i class="fas fa-plus-circle"></i> Novo
                                                    Coproduto</button>
                                                <button data-toggle="modal" data-target="#elimina-coproduto" type="button"
                                                    class="btn btn-outline-danger btn-sm" id="excluirCoproduto" disabled><i
                                                        class="fas fa-trash-alt"></i>
                                                    Excluir</button>
                                            </div>
                                        </div>
                                        <form action="<?= base_url('estrutura-produto/excluir-estrutura-coproduto') ?>" method="POST"
                                                id="DeleteCoproduto" class="needs-validation" novalidate>
                                            <input type="hidden" name="CodProdudoProd" value="<?= $estrutura->cod_produto ?>">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
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
                                                        <?php foreach($lista_coproduto as $key_coproduto => $coproduto) { ?>
                                                        <tr>
                                                            <td>
                                                                <div class="checkbox text-center">
                                                                    <input name="excluir_todos_coproduto[]" type="checkbox"
                                                                        value="<?= $coproduto->seq_estrutura_coproduto ?>" />
                                                                </div>
                                                            </td>
                                                            <td><a
                                                                    href="#" class="text-dark"
                                                                    data-toggle="modal" data-target="#editar-coproduto<?= $coproduto->seq_estrutura_coproduto ?>">
                                                                        <?= $coproduto->cod_coproduto ?> - <?= $coproduto->nome_produto ?>
                                                                    </a>
                                                            </td>
                                                            <td><?= $coproduto->nome_tipo_produto ?></td>
                                                            <td class="text-right text-info"><?= number_format((float) ($coproduto->quant_coproduto), 3, ',', '.') ?> <?= $coproduto->cod_unidade_medida ?></td>
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <?php if ($lista_coproduto == false) { ?>
                                            <div class="text-center text-muted">
                                                <p class="font-italic mt-3">Nenhum coproduto adicionado</p>
                                            </div>
                                            <?php } ?>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <hr class="mb-3">
                            <div class="row float-right">
                                <div class="col-lg-12 col-md-12 col-xs-12">
                                    <button type="submit" form="EstruturaProd" class="btn btn-primary" name="Opcao"
                                        value="salvar"><i class="fas fa-save"></i> Salvar</button>
                                    <a href="<?php echo base_url() ?>estrutura-produto" class="btn btn-secondary link-load">Cancelar</a>
                                </div>
                            </div>
                        </div>
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

<div class="modal fade" id="elimina-coproduto" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Eliminar coproduto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Confirma eliminação dos coprodutos selecionados?
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger" form="DeleteCoproduto">Confirma</button>
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
                                        <form action="<?= base_url('estrutura-produto/inserir-estrutura-componente') ?>" method='post'
                                            id='formComponente' class="needs-validation" novalidate>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <input type="hidden" name="CodProdudoProd" value="<?= $estrutura->cod_produto ?>">
                                                    <label for="inputProdutoCons">Componente de Produção <span class="text-danger">*</span></label>
                                                    <select id="inputProdutoCons" class="selectpicker show-tick form-control" data-style="btn-input-primary"
                                                        data-live-search="true" data-actions-box="true" title=" "
                                                        name="CodProdutoCons" required>
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
                                                    <input type="text" id="inputTipoProdutoCons" class="form-control" name="TipoProdutoCons"
                                                        readonly value="<?= set_value('TipoProdutoCons'); ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputQuantConsumo">Quantidade de Consumo <span class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <input type="text" id="inputQuantConsumo" class="form-control" data-mask="#.##0,000" data-mask-reverse="true"
                                                            name="QuantConsumo" value="<?= set_value('QuantConsumo') ?>" required>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text" style="width: 40px;" id="idUnProd"></span>
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

<div class="modal fade" id="inserir-coproduto">
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
                                        <form action="<?= base_url('estrutura-produto/inserir-estrutura-coproduto') ?>" method='post'
                                            id='formCoproduto' class="needs-validation" novalidate>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <input type="hidden" name="CodProdudoProd" value="<?= $estrutura->cod_produto ?>">
                                                    <label for="inputProdutoCop">Coproduto <span class="text-danger">*</span></label>
                                                    <select id="inputProdutoCop" class="selectpicker show-tick form-control" data-style="btn-input-primary"
                                                        data-live-search="true" data-actions-box="true" title=" "
                                                        name="CodProdutoCop" required>
                                                        <?php foreach($lista_produto_cop as $key_produto_cop => $produto_cop) { ?>
                                                        <option value="<?= $produto_cop->cod_produto ?>"
                                                        <?php if($produto_cop->cod_produto == set_value('CodProdutoCop')) echo "selected"; ?>>
                                                            <?= $produto_cop->cod_produto ?> - <?= $produto_cop->nome_produto ?>
                                                        </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>                                
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputTipoProdutoCop">Tipo do Produto</label>
                                                    <input type="text" id="inputTipoProdutoCop" class="form-control" name="TipoProdutoCop"
                                                        readonly value="<?= set_value('TipoProdutoCop'); ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputQuantCoproduto">Quantidade do Coproduto <span class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <input type="text" id="inputQuantCoproduto" class="form-control" data-mask="#.##0,000" data-mask-reverse="true"
                                                            name="QuantCoproduto" value="<?= set_value('QuantCoproduto') ?>" required>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text" style="width: 40px;" id="idUnCop"></span>
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
                <button type="submit" class="btn btn-primary" form="formCoproduto"><i class="fas fa-save"></i>
                    Salvar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<?php foreach($lista_componente as $key_componente => $componente) { ?>
<div class="modal fade" id="editar-componente<?= $componente->seq_estrutura_componente ?>">
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
                                        <form action="<?= base_url("estrutura-produto/salvar-estrutura-componente/{$estrutura->cod_produto}/{$componente->seq_estrutura_componente}") ?>" method='post'
                                            id='formComponenteEdit<?= $componente->seq_estrutura_componente ?>' class="needs-validation" novalidate>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="inputProdutoConsEdit">Componente de Produção</label>
                                                    <input type="text" id="inputProdutoConsEdit" class="form-control"
                                                        value="<?= $componente->cod_produto_componente ?> - <?= $componente->nome_produto ?>" readonly>
                                                </div>                                
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputTipoProdutoConsEdit">Tipo do Produto</label>
                                                    <input type="text" id="inputTipoProdutoConsEdit" class="form-control"
                                                        value="<?= $componente->nome_tipo_produto ?>" readonly>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputQuantConsumoEdit">Quantidade de Consumo <span class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <input type="text" id="inputQuantConsumoEdit" class="form-control" data-mask="#.##0,000" data-mask-reverse="true"
                                                        name="QuantConsumoEdit" value="<?= number_format((float) ($componente->quant_consumo), 3, ',', '.') ?>" required>
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
                <button type="submit" class="btn btn-primary" form="formComponenteEdit<?= $componente->seq_estrutura_componente ?>"><i class="fas fa-save"></i>
                    Salvar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<?php foreach($lista_coproduto as $key_coproduto => $coproduto) { ?>
<div class="modal fade" id="editar-coproduto<?= $coproduto->seq_estrutura_coproduto ?>">
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
                                        <form action="<?= base_url("estrutura-produto/salvar-estrutura-coproduto/{$estrutura->cod_produto}/{$coproduto->seq_estrutura_coproduto}") ?>" method='post'
                                            id='formCoprodutoEdit<?= $coproduto->seq_estrutura_coproduto ?>' class="needs-validation" novalidate>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="inputProdutoCopEdit">Coproduto</label>
                                                    <input type="text" id="inputProdutoCopEdit" class="form-control"
                                                        value="<?= $coproduto->cod_coproduto ?> - <?= $coproduto->nome_produto ?>" readonly>
                                                </div>                                
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputTipoProdutoConsEdit">Tipo do Produto</label>
                                                    <input type="text" id="inputTipoProdutoConsEdit" class="form-control"
                                                        value="<?= $coproduto->nome_tipo_produto ?>" readonly>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputQuantCoprodutoEdit">Quantidade do Coproduto <span class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <input type="text" id="inputQuantCoprodutoEdit" class="form-control" data-mask="#.##0,000" data-mask-reverse="true"
                                                        name="QuantCoprodutoEdit" value="<?= number_format((float) ($coproduto->quant_coproduto), 3, ',', '.') ?>" required>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"
                                                                style="width: 40px;"><?= $coproduto->cod_unidade_medida ?></span>
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
                <button type="submit" class="btn btn-primary" form="formCoprodutoEdit<?= $coproduto->seq_estrutura_coproduto ?>"><i class="fas fa-save"></i>
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

$("[name='excluir_todos[]']").click(function() {
    var cont = $("[name='excluir_todos[]']:checked").length;
    $("#excluirComponente").prop("disabled", cont ? false : true);
});

$("[name='excluir_todos_coproduto[]']").click(function() {
    var cont = $("[name='excluir_todos_coproduto[]']:checked").length;
    $("#excluirCoproduto").prop("disabled", cont ? false : true);
});

$("#inputProdutoCons").change(function() {

    var baseurl = "<?php echo base_url(); ?>";

    var produto = $("#inputProdutoCons").val();

    $.post(baseurl + "ajax/busca-produto", {
        produto: produto
    }, function(valor) {
        var aValor = valor.split('|');
        console.log(aValor);
        $("#idUnProd").text(aValor[0]);
        $("#inputTipoProdutoCons").val(aValor[1]);
    });

});

$("#inputProdutoCop").change(function() {

    var baseurl = "<?php echo base_url(); ?>";

    var produto = $("#inputProdutoCop").val();

    $.post(baseurl + "ajax/busca-produto", {
        produto: produto
    }, function(valor) {
        var aValor = valor.split('|');
        console.log(aValor);
        $("#idUnCop").text(aValor[0]);
        $("#inputTipoProdutoCop").val(aValor[1]);
    });

});

</script>

<?php $this->load->view('gerais/footer'); ?>