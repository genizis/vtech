<?php $this->load->view('gerais/header' , $menu); ?>
<?php $this->load->view('gerais/menu', $menu); ?>

<section>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('visao-geral') ?>">Visão Geral</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('compras') ?>">Compras</a></li>
            <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>compras/pedido-compra">Pedido de
                    Compra</a>
            </li>
            <li class="breadcrumb-item active">Editar Pedido de Compra</a></li>
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
                                <form class="needs-validation" novalidate
                                    action="<?= base_url("compras/pedido-compra/editar-pedido-compra/{$pedido->num_pedido_compra}") ?>"
                                    method="POST" id="PedidoCompra">
                                    <div class="form-row">
                                        <div class="form-group col-md-2">
                                            <label class="control-label" for="inputNumPedido">Número do Pedido</label>
                                            <input class="form-control" id="inputNumPedido" type="text" readonly
                                                value="<?= $pedido->num_pedido_compra ?>">
                                        </div>
                                        <div class="form-group col-md-10">
                                            <label class="control-label" for="inputCodFornecedor">Fornecedor</label>
                                            <input class="form-control" id="inputCodFornecedor" type="text" readonly
                                                value="<?= $pedido->cod_fornecedor ?> - <?= $pedido->nome_fornecedor ?>">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputDateEmissao">Data de Emissão</label>
                                            <input type="text" class="form-control" id="inputDateEmissao"
                                                name="DataEmissao" readonly
                                                value="<?= str_replace('-', '/', date("d-m-Y", strtotime($pedido->data_emissao))) ?>">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputDateEntrega">Data de Entrega <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="inputDateEntrega"
                                                name="DataEntrega"
                                                value="<?= str_replace('-', '/', date("d-m-Y", strtotime($pedido->data_entrega))) ?>"
                                                required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputTipoFrete">Frete</label>
                                            <div class="input-group">
                                                <select id="inputTipoFrete" class="selectpicker show-tick form-control"
                                                    data-actions-box="true" data-style="btn-input-primary"
                                                    name="TipoFrete">
                                                    <option value="1"
                                                        <?php if($pedido->tipo_frete == 1) echo "selected"; ?>>CIF R$
                                                    </option>
                                                    <option value="2"
                                                        <?php if($pedido->tipo_frete == 2) echo "selected"; ?>>FOB R$
                                                    </option>
                                                </select>
                                                <input type="text" class="form-control" data-mask="#.##0,00"
                                                    data-mask-reverse="true" name="Frete" id="inputValorFrete"
                                                    value="<?= number_format($pedido->valor_frete, 2, ',', '.') ?>">
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
                                                    value="<?= number_format($pedido->valor_seguro, 2, ',', '.') ?>">
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
                                                    value="<?= number_format($pedido->outras_despesas, 2, ',', '.') ?>">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputTipoDesconto">Desconto</label>
                                            <div class="input-group">
                                                <select id="inputTipoDesconto"
                                                    class="selectpicker show-tick form-control" data-actions-box="true"
                                                    data-style="btn-input-primary" name="TipoDesconto">
                                                    <option value="1"
                                                        <?php if($pedido->tipo_desconto == 1) echo "selected"; ?>>R$
                                                    </option>
                                                    <option value="2"
                                                        <?php if($pedido->tipo_desconto == 2) echo "selected"; ?>>%
                                                    </option>
                                                </select>
                                                <input type="text" class="form-control" data-mask="#.##0,00"
                                                    data-mask-reverse="true" name="Desconto" id="inputValorDesconto"
                                                    value="<?= number_format($pedido->valor_desconto, 2, ',', '.') ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="inputObservacao">Observações do Pedido de Compra</label>
                                            <textarea class="form-control" rows="3" id="inputObservacao"
                                                name="ObsPedidoCompra"><?= $pedido->observacoes ?></textarea>
                                        </div>
                                    </div>
                                </form>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h6>Lista de Ordens</h6>
                                        <div class="row  button-pane">
                                            <div class="col-lg-12 col-md-12 col-xs-12">
                                                <button data-toggle="modal" data-target="#adicionar-ordem" type="button"
                                                    class="btn btn-outline-primary btn-sm"><i
                                                        class="fas fa-check-circle"></i> Adicionar
                                                    Ordem de Compra</button>
                                                <button data-toggle="modal" data-target="#nova-ordem" type="button"
                                                    class="btn btn-outline-info btn-sm"><i
                                                        class="fas fa-plus-circle"></i> Nova
                                                    Ordem de Compra</button>
                                                <button data-toggle="modal" data-target="#elimina-ordem" type="button"
                                                    class="btn btn-outline-danger btn-sm" id="excluirOrdem" disabled><i
                                                        class="fas fa-trash-alt"></i>
                                                    Excluir</button>
                                            </div>
                                        </div>
                                        <form class="mb-0 needs-validation" novalidate
                                            action="<?= base_url("compras/pedido-compra/excluir-ordem-compra/{$pedido->num_pedido_compra}") ?>"
                                            method="POST" id="DeleteOrdemCompra">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th scope="col" class="text-center"><i
                                                                    class="fa-solid fa-check"></i></th>
                                                            <th scope="col" class="text-center">Ordem</th>
                                                            <th scope="col">Produto</th>
                                                            <th scope="col">Tipo</th>
                                                            <th scope="col" class="text-right">Quantidade</th>
                                                            <th scope="col" class="text-right">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="table-sm">
                                                        <?php $total = 0; foreach($lista_ordem_compra as $key_ordem_compra => $ordem_compra) { 
                                                                    $total = $total + ($ordem_compra->valor_unitario * $ordem_compra->quant_pedida); ?>
                                                        <tr>
                                                            <td class="align-middle">
                                                                <div class="checkbox text-center">
                                                                    <input name="excluir_todos[]" type="checkbox"
                                                                        value="<?= $ordem_compra->num_ordem_compra ?>"
                                                                        <?php if($ordem_compra->quant_atendida > 0){ echo "disabled"; } ?> />
                                                                </div>
                                                            </td>
                                                            <td scope="row" class="text-center align-middle"><a href="#"
                                                                    data-toggle="modal" class="text-dark"
                                                                    data-target="#editar-ordem<?= $ordem_compra->num_ordem_compra ?>">
                                                                    <?= $ordem_compra->num_ordem_compra ?>
                                                                </a>
                                                            </td>
                                                            <td class="align-middle"><a href="#"
                                                                    data-toggle="modal" class="text-dark"
                                                                    data-target="#editar-ordem<?= $ordem_compra->num_ordem_compra ?>"><?= $ordem_compra->cod_produto ?> - <?= $ordem_compra->nome_produto ?></a><br>
                                                                <?php
                                                                if($ordem_compra->data_necessidade < date('Y-m-d') && $ordem_compra->status != 3){
                                                                    echo "<span class='badge bg-danger-light'>Atrasado</span>";
                                                                }else{
                                                                    switch ($ordem_compra->status) {
                                                                        case 1:
                                                                            echo "<span class='badge bg-light'>Pendente</span>";
                                                                            break;
                                                                        case 2:
                                                                            echo "<span class='badge bg-info-light'>Atendido Parcial</span>";
                                                                            break;
                                                                        case 3:
                                                                            echo "<span class='badge bg-teal-light'>Atendido Total</span>";
                                                                            break;
                                                                    }  

                                                                }                                                        
                                                                ?>
                                                            </td>
                                                            <td class="align-middle"><?= $ordem_compra->nome_tipo_produto ?></td>
                                                            <td class="text-right text-info align-middle">
                                                                <?= number_format($ordem_compra->quant_pedida, 3, ',', '.') ?> <?= $ordem_compra->cod_unidade_medida ?>
                                                            </td>
                                                            <td class="text-right text-teal align-middle">R$
                                                                <?= number_format($ordem_compra->valor_unitario * $ordem_compra->quant_pedida, 2, ',', '.') ?>
                                                            </td>
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <?php if ($lista_ordem_compra == false) { ?>
                                            <div class="text-center text-muted">
                                                <p class="font-italic mt-3">Nenhum produto adicionado
                                                </p>
                                            </div>
                                            <?php } ?>                                            
                                        </form>
                                    </div>
                                </div>
                                <hr class="mb-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="submit" form="PedidoCompra" class="btn btn-primary" name="Opcao"
                                            value="salvar"><i class="fas fa-save"></i>
                                            Salvar</button>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row float-right">
                                            <div class="col-md-12">

                                                <a href="<?php echo base_url() ?>compras/recebimento-material/novo-recebimento-material/<?= $pedido->num_pedido_compra ?>"
                                                    class="link-load btn btn-info"><i class="fas fa-box-open"></i>
                                                    Receber
                                                    Material</a>
                                                <a href="<?php echo base_url() ?>compras/pedido-compra"
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
                        Totais do pedido<br>
                        <span class="font-italic text-size-80">Compra planejada</span>
                    </h6>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <?php if($pedido->nome_usuario != null){ ?>
                                <table class="table table-borderless table-sm mb-0">
                                    <tbody>
                                        <tr>
                                            <td class="text-left">
                                                Usuário do pedido
                                            </td>
                                            <td class="text-right">
                                                <?= $pedido->nome_usuario ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <?php } ?>
                                <table class="table table-borderless table-sm mb-0">
                                    <tbody>
                                        <tr>
                                            <td class="text-left">
                                                Total em produtos
                                            </td>
                                            <td class="text-right <?php if($total > 0) echo "text-info"; ?>"
                                                id="idTotoProduto">
                                                R$ <span
                                                    id="idVelorProdutos"><?= number_format($total, 2, ',', '.') ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">
                                                Valor de frete <span id="idTipoFrete"><?php if($pedido->tipo_frete == 1) echo "CIF"; else echo "FOB"; ?></span>
                                            </td>
                                            <td class="text-right <?php if($pedido->valor_frete > 0) echo "text-info"; ?>"
                                                id="idValorFrete">
                                                R$ <span
                                                    id="ValorFrete"><?= number_format($pedido->valor_frete, 2, ',', '.') ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">
                                                Valor de seguro
                                            </td>
                                            <td class="text-right <?php if($pedido->valor_seguro > 0) echo "text-info"; ?>"
                                                id="idValorSeguro">
                                                R$ <span
                                                    id="ValorSeguro"><?= number_format($pedido->valor_seguro, 2, ',', '.') ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">
                                                Outras despesas
                                            </td>
                                            <td class="text-right <?php if($pedido->outras_despesas > 0) echo "text-info"; ?>"
                                                id="idOutrasDespesas">
                                                R$ <span
                                                    id="OutrasDespesas"><?= number_format($pedido->outras_despesas, 2, ',', '.') ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">
                                                Desconto
                                            </td>
                                            <td class="text-right <?php if($pedido->valor_desconto > 0) echo "text-teal"; ?>"
                                                id="idValorDesconto">
                                                <?php
                                                    $valorDesconto = 0;
                                                    if($pedido->tipo_desconto == 1){
                                                        $valorDesconto = $pedido->valor_desconto;
                                                    }elseif($pedido->tipo_desconto == 2){
                                                        $valorDesconto = $total * ($pedido->valor_desconto / 100);
                                                    }
                                                ?>
                                                <span
                                                    id="tipoDescontoValor"><?php if($pedido->tipo_desconto == 1) echo "R$"; ?></span>
                                                <span
                                                    id="ValorDesconto"><?= number_format($pedido->valor_desconto, 2, ',', '.') ?></span>
                                                <span
                                                    id="tipoDescontoPerc"><?php if($pedido->tipo_desconto == 2) echo "%"; ?></span>
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
                                    <td class="text-right pt-0 text-info" id="idTotalPedido">
                                        <strong>
                                            R$
                                            <span
                                                id="TotalPedido"><?= number_format($total + $pedido->valor_frete + $pedido->valor_seguro + $pedido->outras_despesas - $valorDesconto, 2, ',', '.') ?></span>
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
                                class="fas fa-print"></i> Imprimir Pedido</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="adicionar-ordem">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Adicionar ordem de compra</h5>
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
                                            action="<?= base_url("compras/pedido-compra/adicionar-ordem-compra/{$pedido->num_pedido_compra}") ?>"
                                            method='post' id='formOrdemCompra'>
                                            <div class="form-row">
                                                <div class="form-group col-md-9">
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
                                                <div class="form-group col-md-3">
                                                    <label class="control-label" for="inputTipoProdutoAdic">Tipo de Produto</label>
                                                    <input class="form-control" id="inputTipoProdutoAdic" type="text"
                                                        name="TipoProdutoAdic" readonly value="<?= set_value('TipoProdutoAdic'); ?>">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label for="inputDataNecessidadeAdic">Data de Necessidade</label>
                                                    <input type="text" class="form-control" id="inputDataNecessidadeAdic"
                                                        name="DataNecessidadeAdic" readonly
                                                        value="<?= set_value('DataNecessidadeAdic'); ?>">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="inputQuantPedidaAdic">Quantidade Pedida <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="inputQuantPedidaAdic"
                                                            name="QuantPedidaAdic" data-mask="#.##0,000" data-mask-reverse="true"
                                                            value="<?= set_value('QuantPedidaAdic'); ?>" required>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text" style="width: 40px;" id="idUnProdAdic"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3">
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
                                                <div class="form-group col-md-3">
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
                    Adicionar
                    Ordem de Compra</button>
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
                                            action="<?= base_url("compras/pedido-compra/nova-ordem-compra/{$pedido->num_pedido_compra}") ?>"
                                            method="post" id='formNovaOrdemCompra'>
                                            <div class="form-row">
                                                <div class="form-group col-md-9">
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
                                                <div class="form-group col-md-3">
                                                    <label for="inputTipoProduto">Tipo de Produto</label>
                                                    <input type="text" class="form-control" id="inputTipoProduto" readonly
                                                        name="TipoProduto" value="<?= set_value('TipoProduto'); ?>">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label class="control-label" for="inputDataNecessidade">Data de Necessidade <span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control" id="inputDataNecessidade" type="text"
                                                        name="DataNecessidade" value="<?= str_replace('-', '/', date("d-m-Y")) ?>" required>
                                                </div>
                                                <div class="form-group col-md-3">
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
                                                <div class="form-group col-md-3">
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
                                                <div class="form-group col-md-3">
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

<?php foreach($lista_ordem_compra as $key_ordem_compra => $ordem_compra) { ?>
<div class="modal fade" id="editar-ordem<?= $ordem_compra->num_ordem_compra ?>">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar ordem de compra</h5>
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
                                            action="<?= base_url("compras/pedido-compra/salvar-ordem-compra/{$ordem_compra->num_ordem_compra}") ?>"
                                            method='post' id='formOrdemCompraEdit<?= $ordem_compra->num_ordem_compra ?>'>
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label class="control-label" for="inputOrdemCompraEdit">Ordem Compra</label>
                                                    <input class="form-control" id="inputOrdemCompraEdit" type="text"
                                                        name="NumOrdemCompraEdit" value="<?= $ordem_compra->num_ordem_compra ?>"
                                                        readonly>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label" for="inputProdutoCompraEdit">Produto de Compra</label>
                                                    <input class="form-control" id="inputProdutoCompraEdit" type="text"
                                                        name="CodProdutoEdit"
                                                        value="<?= $ordem_compra->cod_produto ?> - <?= $ordem_compra->nome_produto ?>"
                                                        readonly>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="control-label" for="inputTipoProdutoEdit">Tipo de Produto</label>
                                                    <input class="form-control" id="inputTipoProdutoEdit" type="text"
                                                        name="TipoProdutoEdit" value="<?= $ordem_compra->nome_tipo_produto ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label for="inputDataNecessidadeEdit">Data de Necessidade</label>
                                                    <input type="text" class="form-control" id="inputDataNecessidadeEdit"
                                                        name="DataNecessidade" readonly
                                                        value="<?= str_replace('-', '/', date("d-m-Y", strtotime($ordem_compra->data_necessidade))) ?>">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="inputQuantPedidaEdit">Quantidade Pedida <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" value="<?= $ordem_compra->quant_pedida ?>"
                                                            data-mask="#.##0,000" data-mask-reverse="true"
                                                            id="inputQuantPedidaEdit<?= $ordem_compra->num_ordem_compra ?>"
                                                            name="QuantPedidaEdit" required>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"
                                                                style="width: 40px;"><?= $ordem_compra->cod_unidade_medida ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="control-label" for="inputValorUnitarioEdit">Valor Unitário <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$</span>
                                                        </div>
                                                        <input type="text" class="form-control" class="form-control"
                                                            id="inputValorUnitarioEdit<?= $ordem_compra->num_ordem_compra ?>"
                                                            type="text" name="ValorUnitarioEdit" data-mask="#.##0,00"
                                                            data-mask-reverse="true" value="<?= $ordem_compra->valor_unitario ?>"
                                                            data-mask="#.##0,000" data-mask-reverse="true" required>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="control-label"
                                                        for="inputTotalCompraEdit<?= $ordem_compra->num_ordem_compra ?>">Total da
                                                        Compra</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$</span>
                                                        </div>
                                                        <input type="text" class="form-control"
                                                            id="inputTotalCompraEdit<?= $ordem_compra->num_ordem_compra ?>" type="text"
                                                            name="TotalCompraEdit" data-mask="#.##0,00" data-mask-reverse="true"
                                                            value="<?= number_format($ordem_compra->valor_unitario * $ordem_compra->quant_pedida, 2, ',', '.') ?>"
                                                            readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="inputObservacaoOrdemEdit">Observações da Ordem de Compra</label>
                                                    <textarea class="form-control" rows="3" id="inputObservacaoOrdemEdit" readonly
                                                        name="ObsOrdemCompra"><?= $ordem_compra->observacoes ?></textarea>
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
                    form="formOrdemCompraEdit<?= $ordem_compra->num_ordem_compra ?>"><i class="fas fa-save"></i>
                    Salvar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<div class="modal fade" id="elimina-ordem" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Eliminar ordem de compra</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Confirma eliminação das ordens de compra selecionadas?
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger" form="DeleteOrdemCompra">Confirma</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

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
        iFrame.src = "<?= base_url("compras/imprimir-pedido/{$pedido->num_pedido_compra}") ?>";
        document.body.appendChild(iFrame);
    });
});

$("[name='excluir_todos[]']").click(function() {
    var cont = $("[name='excluir_todos[]']:checked").length;
    $("#excluirOrdem").prop("disabled", cont ? false : true);
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

$('#inputDataNecessidade').datepicker({
    uiLibrary: 'bootstrap4'
});

$('#inputDateEntrega').datepicker({
    uiLibrary: 'bootstrap4'
});

jQuery('#inputQuantPedidaAdic').on('keyup', function() {
    valTotalAdic();
});

jQuery('#inputValorUnitarioAdic').on('keyup', function() {
    valTotalAdic();
});

function valTotalAdic() {

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

};

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

jQuery('#inputTipoDesconto').change(function() {
    calcDesconto();
});

jQuery('#inputValorDesconto').on('keyup', function() {
    calcDesconto();
});

<?php foreach($lista_ordem_compra as $key_ordem_compra => $ordem_compra) { ?>
jQuery('#inputQuantPedidaEdit<?= $ordem_compra->num_ordem_compra ?>').on('keyup', function() {
    var valUnit = parseFloat(jQuery('#inputValorUnitarioEdit<?= $ordem_compra->num_ordem_compra ?>').val() !=
        '' ? (jQuery('#inputValorUnitarioEdit<?= $ordem_compra->num_ordem_compra ?>').val().split(
            '.').join('')).replace(',', '.') : 0);
    var quantPedida = parseFloat(jQuery('#inputQuantPedidaEdit<?= $ordem_compra->num_ordem_compra ?>').val() !=
        '' ? (jQuery('#inputQuantPedidaEdit<?= $ordem_compra->num_ordem_compra ?>').val().split(
            '.').join('')).replace(',', '.') : 0);

    var totalCompra = valUnit * quantPedida;

    $("#inputTotalCompraEdit<?= $ordem_compra->num_ordem_compra ?>").val(totalCompra.toLocaleString("pt-BR", {
        style: "decimal",
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    }));
});

jQuery('#inputValorUnitarioEdit<?= $ordem_compra->num_ordem_compra ?>').on('keyup', function() {
    var valUnit = parseFloat(jQuery('#inputValorUnitarioEdit<?= $ordem_compra->num_ordem_compra ?>').val() !=
        '' ? (jQuery('#inputValorUnitarioEdit<?= $ordem_compra->num_ordem_compra ?>').val().split(
            '.').join('')).replace(',', '.') : 0);
    var quantPedida = parseFloat(jQuery('#inputQuantPedidaEdit<?= $ordem_compra->num_ordem_compra ?>').val() !=
        '' ? (jQuery('#inputQuantPedidaEdit<?= $ordem_compra->num_ordem_compra ?>').val().split(
            '.').join('')).replace(',', '.') : 0);

    var totalCompra = valUnit * quantPedida;

    $("#inputTotalCompraEdit<?= $ordem_compra->num_ordem_compra ?>").val(totalCompra.toLocaleString("pt-BR", {
        style: "decimal",
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    }));
});
<?php } ?>

function calcDesconto() {

    var tipoDesconto = jQuery('#inputTipoDesconto').val();
    var valDesconto = parseFloat(jQuery('#inputValorDesconto').val() != '' ? (jQuery('#inputValorDesconto').val().split(
        '.').join('')).replace(',', '.') : 0);
    var valPedido = parseFloat(<?= $total ?>);

    var totalLiq = 0;
    var htmlDesconto = "";

    if (tipoDesconto == 1) {
        totalLiq = valPedido - valDesconto;
        htmlDesconto = "R$ " + valDesconto.toLocaleString("pt-BR", {
            style: "decimal",
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        })
    } else if (tipoDesconto == 2) {
        totalLiq = valPedido - (valPedido * (valDesconto / 100));
        htmlDesconto = valDesconto.toLocaleString("pt-BR", {
            style: "decimal",
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        }) + " %";
    }



    $("#inputValorDesconto").html(htmlDesconto);

    $("#inputValorLiq").html("R$ " + totalLiq.toLocaleString("pt-BR", {
        style: "decimal",
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    }));

};

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
    if(valorSeguro > 0){
        $('#idValorSeguro').addClass("text-info");        
    }else{
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
    if(valorOutrasDespesas > 0){
        $('#idOutrasDespesas').addClass("text-info");        
    }else{
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
    if(valorDesconto > 0){
        $('#idValorDesconto').addClass("text-teal");        
    }else{
        $('#idValorDesconto').removeClass("text-teal");  
    }

    var valorProduto = parseFloat(jQuery('#idVelorProdutos').text() != '' ? (jQuery(
            '#idVelorProdutos').text()
        .split('.').join('')).replace(',', '.') : 0);

    var calcDesconto = 0;
    var tipoDesconto = $('#inputTipoDesconto').val();
    if(tipoDesconto == 1){
        $('#tipoDescontoValor').text("R$");
        $('#tipoDescontoPerc').text("");
        calcDesconto = valorDesconto;
    }else{
        $('#tipoDescontoValor').text("");
        $('#tipoDescontoPerc').text("%");
        calcDesconto = valorProduto * (valorDesconto / 100);
    }    

    var totalLiquido = 0;
    totalLiquido = valorProduto + valorFrete + valorSeguro + valorOutrasDespesas - calcDesconto;

    $('#TotalPedido').text(totalLiquido.toLocaleString("pt-BR", {
                        style: "decimal",
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                    }));
    if(totalLiquido > 0){
        $('#idTotalPedido').addClass("text-info");        
    }else{
        $('#idTotalPedido').removeClass("text-info");  
    }
}
</script>

<?php $this->load->view('gerais/footer'); ?>