<?php $this->load->view('gerais/header' , $menu); ?>
<?php $this->load->view('gerais/menu', $menu); ?>

<section>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('visao-geral') ?>">Visão Geral</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('compras') ?>">Compras</a></li>
            <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>compras/ordem-compra">Ordem de Compra</a>
            </li>
            <li class="breadcrumb-item active">Nova Cotação de Fornecedor</a></li>
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
                                        <?= $fornecedor->cod_fornecedor ?> - <?= $fornecedor->nome_fornecedor ?>
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
                                            <td class="text-left">
                                                CNPJ/CPF
                                            </td>
                                            <td class="text-right">
                                                <?= $fornecedor->cnpj_cpf ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="table table-borderless table-sm mb-0">
                                    <tbody>
                                        <tr>
                                            <td class="text-left">
                                                Telefone Fixo
                                            </td>
                                            <td class="text-right">
                                                <?= $fornecedor->tel_fixo ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">
                                                Telefone Celular
                                            </td>
                                            <td class="text-right">
                                                <?= $fornecedor->tel_cel ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">
                                                E-mail
                                            </td>
                                            <td class="text-right">
                                                <?= $fornecedor->email ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="table table-borderless table-sm mb-0">
                                    <tbody>
                                        <tr>
                                            <td class="text-left align-middle ">
                                                CEP
                                            </td>
                                            <td class="text-right">
                                                <?= $fornecedor->cep ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left align-middle ">
                                                Endereço
                                            </td>
                                            <td class="text-right">
                                                <?= $fornecedor->endereco ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left align-middle ">
                                                Número
                                            </td>
                                            <td class="text-right">
                                                <?= $fornecedor->numero ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left align-middle ">
                                                Complemento
                                            </td>
                                            <td class="text-right">
                                                <?= $fornecedor->complemento ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left align-middle ">
                                                Bairro
                                            </td>
                                            <td class="text-right">
                                                <?= $fornecedor->bairro ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left align-middle ">
                                                Cidade/UF
                                            </td>
                                            <td class="text-right">
                                            <?= $fornecedor->nome_cidade ?>/<?= $fornecedor->uf ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 pl-0">
                <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#cotacoes" role="tab"
                            aria-controls="home" aria-selected="true">Cotações</a>
                    </li>
                </ul>
                <div class="card  mb-3">
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="faturamento" role="tabpanel"
                                aria-labelledby="home-tab">
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
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row ">
                                                    <div class="col-md-8">
                                                        <button data-toggle="modal" data-target="#adicionar-cotacao"
                                                            type="button" class="btn btn-outline-primary btn-sm"
                                                            data-backdrop="static" data-keyboard="false"><i class="fa-solid fa-circle-check"></i> Nova Cotação
                                                        </button> 
                                                        <button data-toggle="modal" data-target="#nova-ordem"
                                                            type="button" class="btn btn-outline-info btn-sm"
                                                            data-backdrop="static" data-keyboard="false"><i
                                                                class="fas fa-plus-circle"></i> Nova Ordem
                                                        </button>                                              
                                                        <button data-toggle="modal" data-target="#elimina-cotacao"
                                                            type="button" class="btn btn-outline-danger btn-sm"
                                                            id="excluirCotacao" disabled><i class="fa-solid fa-trash-can"></i>
                                                            Excluir Cotação
                                                        </button>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <button data-toggle="modal" data-target="#emitir-pedido"
                                                            type="button" class="btn btn-outline-teal btn-sm pull-right"
                                                            data-backdrop="static" data-keyboard="false"
                                                            id="emitirPedido" disabled><i class="fa-solid fa-cart-shopping"></i> Emitir Pedido
                                                        </button>
                                                    </div>
                                                </div>
                                                <form class="mb-0 needs-validation" novalidate
                                                    action="<?= base_url("compras/cotacao-compra/acao-cotacao-fornecedor/{$fornecedor->cod_fornecedor}") ?>"
                                                    method="POST" id="AcaoCotacaoOrdem">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered">
                                                            <thead class="thead-light">
                                                                <tr>
                                                                    <th scope="col" class="text-center"><i
                                                                            class="fa-solid fa-check"></i></th>
                                                                    <th scope="col" class="text-center">Ordem</th>
                                                                    <th scope="col">Produto</th>
                                                                    <th scope="col" class="text-center">Dias entrega</th>
                                                                    <th scope="col" class="text-right">Valor unitário</th>
                                                                    <th scope="col" class="text-right">Valor total</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach($lista_cotacao_fornecedor as $key_cotacao => $cotacoes) {  ?>
                                                                <tr>
                                                                    <td class="align-middle">
                                                                        <div class="checkbox text-center">
                                                                            <input name="seleconar_todos[]" type="checkbox"
                                                                                value="<?= $cotacoes->seq_cotacao_compra ?>" />
                                                                        </div>
                                                                    </td>
                                                                    <td class="text-center align-middle">
                                                                        <?= $cotacoes->num_ordem_compra ?>
                                                                    </td>
                                                                    <td scope="row" class="align-middle">
                                                                        <a href="#"
                                                                            data-toggle="modal" class="text-dark"                                                                    
                                                                            data-target="#editar-cotacao<?= $cotacoes->seq_cotacao_compra ?>">
                                                                            <?= $cotacoes->cod_produto ?> - <?= $cotacoes->nome_produto ?>
                                                                        </a>
                                                                    </td>
                                                                    <td class="text-center align-middle">
                                                                        <?= number_format($cotacoes->dias_entrega, 0, ',', '.') ?>
                                                                    </td>
                                                                    <td class="text-right align-middle">R$
                                                                        <?= number_format($cotacoes->valor_unitario, 2, ',', '.') ?>
                                                                    </td>
                                                                    <td class="text-right text-info align-middle">R$
                                                                        <?= number_format($cotacoes->valor_unitario * $cotacoes->quant_pedida, 2, ',', '.') ?>
                                                                    </td>
                                                                </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <?php if ($lista_cotacao_fornecedor == false) { ?>
                                                    <div class="text-center text-muted">
                                                        <p class="font-italic mt-3">Nenhuma cotação adicionada
                                                        </p>
                                                    </div>
                                                    <?php } ?>                                            
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="emitir-pedido" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Emitir pedido de compra</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Confirma emissão de pedido para as cotações selecionadas?
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-teal" form="AcaoCotacaoOrdem" name="action" value="1">Confirma</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

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
                <button type="submit" class="btn btn-danger" form="AcaoCotacaoOrdem" name="action" value="2">Confirma</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="adicionar-cotacao">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Adicionar nova cotação</h5>
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
                                            action="<?= base_url("compras/ordem-compra/adicionar-cotacao-fornecedor/{$fornecedor->cod_fornecedor}") ?>"
                                            method='post' id='formOrdemCompra'>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="inputOrdemCompraAdic">Ordem de Compra <span
                                                            class="text-danger">*</span></label>
                                                    <select id="inputOrdemCompraAdic" class="selectpicker show-tick form-control"
                                                        data-live-search="true" data-actions-box="true"
                                                        title="Selecione uma Ordem de Compra" name="NumOrdemCompraAdic"
                                                        data-style="btn-input-primary" required>
                                                        <?php foreach($lista_ordem_sem_pedido as $key_ordem_compra => $ordem_compra) { ?>
                                                        <option value="<?= $ordem_compra->num_ordem_compra ?>"
                                                            <?php if($ordem_compra->num_ordem_compra == set_value('NumOrdemCompra')) echo "selected"; ?>>
                                                            <?= $ordem_compra->num_ordem_compra ?> (<?= $ordem_compra->cod_produto ?> -
                                                            <?= $ordem_compra->nome_produto ?>)
                                                        </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>                                                
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label class="control-label" for="inputTipoProdutoAdic">Tipo de Produto</label>
                                                    <input class="form-control" id="inputTipoProdutoAdic" type="text"
                                                        name="TipoProdutoAdic" readonly value="<?= set_value('TipoProdutoAdic'); ?>">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputDataNecessidadeAdic">Data de Necessidade</label>
                                                    <input type="text" class="form-control" id="inputDataNecessidadeAdic"
                                                        name="DataNecessidadeAdic" readonly
                                                        value="<?= set_value('DataNecessidadeAdic'); ?>">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputQuantPedidaAdic">Quantidade Pedida <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="inputQuantPedidaAdic"
                                                            name="QuantPedidaAdic" data-mask="#.##0,000" data-mask-reverse="true"
                                                            value="<?= set_value('QuantPedidaAdic'); ?>" readonly>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text" style="width: 40px;" id="idUnProdAdic"></span>
                                                        </div>
                                                    </div>
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
                                                    <label class="control-label" for="inputValorUnitarioAdic">Valor Unitário <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$</span>
                                                        </div>
                                                        <input type="text" class="form-control" id="inputValorUnitarioAdic" type="text"
                                                            name="ValorUnitarioAdic" data-mask="#.##0,00" data-mask-reverse="true"
                                                            value="<?= set_value('ValorUnitarioAdic'); ?>" required>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="control-label" for="inputTotalCompraAdic">Total da Compra</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$</span>
                                                        </div>
                                                        <input type="text" class="form-control" id="inputTotalCompraAdic" type="text"
                                                            name="TotalCompraAdic" data-mask="#.##0,00" data-mask-reverse="true"
                                                            value="<?= set_value('TotalCompraAdic'); ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="inputObservacaoOrdemAdic">Observações da Ordem de Compra</label>
                                                    <textarea class="form-control" rows="3" id="inputObservacaoOrdemAdic" readonly
                                                        name="ObsOrdemCompraAdic"><?= set_value('ObsOrdemCompraAdic'); ?></textarea>
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
                <button type="submit" class="btn btn-primary" form="formOrdemCompra"><i class="fas fa-check-circle"></i>
                    Adicionar Cotação</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="nova-ordem">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nova ordem de compra</h5>
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
                                            action="<?= base_url("compras/ordem-compra/nova-ordem-cotacao/{$fornecedor->cod_fornecedor}") ?>"
                                            method="post" id='formNovaOrdemCompra'>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="inputProdutoCompra">Produto de Compra <span
                                                            class="text-danger">*</span></label>
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
                                                    <input type="text" class="form-control" id="inputTipoProduto" readonly
                                                        name="TipoProduto" value="<?= set_value('TipoProduto'); ?>">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="control-label" for="inputDataNecessidade">Data de Necessidade <span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control" id="inputDataNecessidade" type="text"
                                                        name="DataNecessidade" value="<?= str_replace('-', '/', date("d-m-Y")) ?>" required>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="control-label" for="inputQuantPedida">Quantidade Pedida <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <input class="form-control" id="inputQuantPedida" type="text" data-mask="#.##0,000"
                                                            data-mask-reverse="true" name="QuantPedida"
                                                            value="<?= set_value('QuantPedida'); ?>" required>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text" style="width: 40px;" id="idUnProd"></span>
                                                        </div>
                                                    </div>
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
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="inputObservacao">Observações da Ordem de Compra</label>
                                                    <textarea class="form-control" rows="3" id="inputObservacao"
                                                        name="ObsOrdemCompra"><?= set_value('ObsOrdemCompra'); ?></textarea>
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
                <button type="submit" class="btn btn-primary" form="formNovaOrdemCompra"><i class="fas fa-save"></i>
                    Salvar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>


<?php foreach($lista_cotacao_fornecedor as $key_cotacao => $cotacoes) {  ?>
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
                                            action="<?= base_url("compras/cotacao-compra/editar-cotacao-compra/{$cotacoes->seq_cotacao_compra}/2") ?>" method="post"
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
                                                            value="<?= number_format($cotacoes->valor_unitario * $cotacoes->quant_pedida, 2, ',', '.') ?>" readonly>
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

<script>
$(function() {
    $.applyDataMask();
});

$("[name='seleconar_todos[]']").click(function() {
    var cont = $("[name='seleconar_todos[]']:checked").length;
    $("#excluirCotacao").prop("disabled", cont ? false : true);
    $("#emitirPedido").prop("disabled", cont ? false : true);
});

$("#inputProdutoCompra").change(function() {

    var baseurl = "<?php echo base_url(); ?>";

    var produto = $("#inputProdutoCompra").val();

    $.post(baseurl + "ajax/busca-produto", {
        produto: produto
    }, function(valor) {
        var aValor = valor.split('|');
        console.log(aValor);
        $("#idUnProd").text(aValor[0]);
        $("#inputTipoProduto").val(aValor[1]);
        $("#inputValorUnitario").val(aValor[2]);
    });

});

jQuery('#inputQuantPedida').on('keyup', function() {
    valTotal();
});

jQuery('#inputValorUnitario').on('keyup', function() {
    valTotal();
});

function valTotal() {

    var valUnit = parseFloat(jQuery('#inputValorUnitario').val() != '' ? (jQuery('#inputValorUnitario').val().split(
        '.').join('')).replace(',', '.') : 0);
    var quantPedida = parseFloat(jQuery('#inputQuantPedida').val() != '' ? (jQuery('#inputQuantPedida').val().split(
        '.').join('')).replace(',', '.') : 0);

    var totalCompra = valUnit * quantPedida;

    $("#inputTotalCompra").val(totalCompra.toLocaleString("pt-BR", {
        style: "decimal",
        minimumFractionDigits: 2,
        maximumFractionDigits: 2    
    }));

};

$('#inputDataNecessidade').datepicker({
    uiLibrary: 'bootstrap4'
});

jQuery('#inputValorUnitario').on('keyup', function() {

    var valUnit = parseFloat(jQuery('#inputValorUnitario').val() != '' ? (jQuery('#inputValorUnitario').val()
        .split(
            '.').join('')).replace(',', '.') : 0);
    var quantPedida = <?= $cotacoes->quant_pedida ?>;

    var totalCompra = valUnit * quantPedida;    

    $("#inputTotalCompra").val(totalCompra.toLocaleString("pt-BR", {
        style: "decimal",
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    }));
});

<?php foreach($lista_cotacao_fornecedor as $key_cotacao => $cotacoes) {  ?>
jQuery('#inputValorUnitario<?= $cotacoes->seq_cotacao_compra ?>').on('keyup', function() {

    var valUnit = parseFloat(jQuery('#inputValorUnitario<?= $cotacoes->seq_cotacao_compra ?>').val() != '' ? (jQuery('#inputValorUnitario<?= $cotacoes->seq_cotacao_compra ?>').val()
        .split(
            '.').join('')).replace(',', '.') : 0);
    var quantPedida = <?= $cotacoes->quant_pedida ?>;

    var totalCompra = valUnit * quantPedida;    

    $("#inputTotalCompra<?= $cotacoes->seq_cotacao_compra ?>").val(totalCompra.toLocaleString("pt-BR", {
        style: "decimal",
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    }));
});

$("#inputOrdemCompraAdic").change(function() {

    var baseurl = "<?php echo base_url(); ?>";

    var ordem = $("#inputOrdemCompraAdic").val();

    $.post(baseurl + "ajax/busca-ordem-compra", {
        ordem: ordem
    }, function(valor) {
        var aValor = valor.split('|');
        console.log(aValor);
        $("#inputTipoProdutoAdic").val(aValor[0]);
        $("#idUnProdAdic").text(aValor[1]);
        $("#inputDataNecessidadeAdic").val(aValor[2]);
        $("#inputQuantPedidaAdic").val(aValor[3]);
        $("#inputValorUnitarioAdic").val(aValor[4]);
        $("#inputTotalCompraAdic").val(aValor[5]);
        $("#inputObservacaoOrdemAdic").val(aValor[6]);

    });

});
<?php } ?>

jQuery('#inputValorUnitarioAdic').on('keyup', function() {
    var valUnit = parseFloat(jQuery('#inputValorUnitarioAdic').val() != '' ? (jQuery('#inputValorUnitarioAdic').val()
        .split(
            '.').join('')).replace(',', '.') : 0);
    var quantPedida = parseFloat(jQuery('#inputQuantPedidaAdic').val() != '' ? (jQuery('#inputQuantPedidaAdic').val()
        .split(
            '.').join('')).replace(',', '.') : 0);

    var totalCompra = valUnit * quantPedida;

    $("#inputTotalCompraAdic").val(totalCompra.toLocaleString("pt-BR", {
        style: "decimal",
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    }));
});

</script>

<?php $this->load->view('gerais/footer'); ?>