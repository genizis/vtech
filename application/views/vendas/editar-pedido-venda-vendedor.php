<?php $this->load->view('gerais/header' , $menu); ?>
<?php $this->load->view('gerais/menu-vendedor', $menu); ?>

<section>
    <div class="container container-vendedor">
        <div class="row">
            <div class="col-md-12 mb-3">
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
                            action="<?= base_url("vendas/pedido-venda-vendedor/editar-pedido-venda-vendedor/{$pedido->num_pedido_venda}") ?>"
                            method="POST" id="PedidoVenda">
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label class="control-label" for="inputNumPedido">Número do Pedido</label>
                                    <input class="form-control" id="inputNumPedido" type="text" readonly
                                        value="<?= $pedido->num_pedido_venda ?>">
                                </div>
                                <div class="form-group col-md-7">
                                    <label class="control-label" for="inputCodCliente">Cliente</label>
                                    <input class="form-control" id="inputCodCliente" type="text" readonly
                                        value="<?= $pedido->cod_cliente ?> - <?= $pedido->nome_cliente ?>">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputSituacao">Situação da Venda</label>
                                    <?php if($pedido->quant_atendida == 0) { ?>
                                    <select id="inputSituacao" class="selectpicker show-tick form-control"
                                        data-actions-box="true" data-style="btn-input-primary" name="Situacao">
                                        <option value="1" <?php if($pedido->situacao == 1) echo "selected"; ?>>
                                            Em Orçamento</option>
                                        <option value="2" <?php if($pedido->situacao == 2) echo "selected"; ?>>
                                            Orçamento Reprovado</option>
                                        <option value="3" <?php if($pedido->situacao == 3) echo "selected"; ?>>
                                            Venda Confirmada</option>
                                    </select>
                                    <?php }else{ ?>
                                    <input class="form-control" id="inputCodCliente" type="text" disabled value="<?php
                                                        if($pedido->situacao == 1) echo "Em Orçamento";
                                                        if($pedido->situacao == 2) echo "Orçamento Reprovado";
                                                        if($pedido->situacao == 3) echo "Venda Confirmada";
                                                       ?>">
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputDateEmissao">Data de Emissão</label>
                                    <input type="text" class="form-control" id="inputDateEmissao" name="DataEmissao"
                                        readonly
                                        value="<?= str_replace('-', '/', date("d-m-Y", strtotime($pedido->data_emissao))) ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputDateEntrega">Data de Entrega <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="inputDateEntrega" name="DataEntrega"
                                        value="<?= str_replace('-', '/', date("d-m-Y", strtotime($pedido->data_entrega))) ?>"
                                        required>
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
                                            <?php if($transportador->cod_transportador == $pedido->cod_transportador) echo "selected"; ?>>
                                            <?= $transportador->cod_transportador ?> -
                                            <?= $transportador->nome_transportador ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputTipoFrete">Frete</label>
                                    <div class="input-group">
                                        <select id="inputTipoFrete" class="selectpicker show-tick form-control"
                                            data-actions-box="true" data-style="btn-input-primary" name="TipoFrete">
                                            <option value="1" <?php if($pedido->tipo_frete == 1) echo "selected"; ?>>CIF
                                                R$</option>
                                            <option value="2" <?php if($pedido->tipo_frete == 2) echo "selected"; ?>>FOB
                                                R$</option>
                                        </select>
                                        <input type="text" class="form-control" data-mask="#.##0,00" inputmode="numeric"
                                            data-mask-reverse="true" name="Frete" id="inputValorFrete"
                                            value="<?= number_format((float) ($pedido->valor_frete), 2, ',', '.') ?>">
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
                                        <input type="text" class="form-control" data-mask="#.##0,00" inputmode="numeric"
                                            data-mask-reverse="true" name="Seguro" id="inputSeguro"
                                            value="<?= number_format((float) ($pedido->valor_seguro), 2, ',', '.') ?>">
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Outras Despesas</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">R$</span>
                                        </div>
                                        <input type="text" class="form-control" data-mask="#.##0,00" inputmode="numeric"
                                            data-mask-reverse="true" name="OutrasDespesas" id="inputOutrasDespesas"
                                            value="<?= number_format((float) ($pedido->outras_despesas), 2, ',', '.') ?>">
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputTipoDesconto">Desconto</label>
                                    <div class="input-group">
                                        <select id="inputTipoDesconto" class="selectpicker show-tick form-control"
                                            data-actions-box="true" data-style="btn-input-primary" name="TipoDesconto">
                                            <option value="1" <?php if($pedido->tipo_desconto == 1) echo "selected"; ?>>
                                                R$
                                            </option>
                                            <option value="2" <?php if($pedido->tipo_desconto == 2) echo "selected"; ?>>
                                                %
                                            </option>
                                        </select>
                                        <input type="text" class="form-control" data-mask="#.##0,00" inputmode="numeric"
                                            data-mask-reverse="true" name="Desconto" id="inputValorDesconto"
                                            value="<?= number_format((float) ($pedido->valor_desconto), 2, ',', '.') ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputObservacao">Observações do Pedido de Venda</label>
                                    <textarea class="form-control" rows="3" id="inputObservacao"
                                        name="ObsPedidoVenda"><?= $pedido->observacoes ?></textarea>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <h6>Lista de Produtos</h6>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button data-toggle="modal" data-target="#inserir-produto" type="button"
                                            class="btn btn-outline-info btn-sm btn-block mb-2"><i
                                                class="fas fa-plus-circle"></i> Adicionar
                                            Produto</button>
                                    </div>
                                </div>
                                <form class="mb-0 needs-validation" novalidate
                                    action="<?= base_url('vendas/pedido-venda/excluir-produto-venda') ?>" method="POST"
                                    id="DeleteProdutoVenda">
                                    <input type="hidden" name="NumPedidoVenda" value="<?= $pedido->num_pedido_venda ?>">

                                    <?php $total = 0; foreach($lista_produto_venda as $key_produto_venda => $produto_venda) { 
                                            $total = $total + ($produto_venda->valor_unitario * $produto_venda->quant_pedida); ?>
                                    <a href="#" data-toggle="modal"
                                        data-target="#editar-produto<?= $produto_venda->seq_produto_venda ?>"
                                        class="list-group-item list-group-item-action flex-column align-items-start pb-0">
                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <h5><strong><?= $produto_venda->cod_produto ?> - <?= $produto_venda->nome_produto ?></strong></h5>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <p class="mb-1 font-weight-bold text-muted">Quantidade</p>
                                                <p><?= number_format((float) ($produto_venda->quant_pedida), 3, ',', '.') ?> <?= $produto_venda->cod_unidade_medida ?></p>
                                            </div>
                                            <div class="col-4">
                                                <p class="mb-1 font-weight-bold text-center text-muted">Valor Unit</p>
                                                <p class="text-center">R$ <?= number_format((float) ($produto_venda->valor_unitario), 2, ',', '.') ?></p>
                                            </div>
                                            <div class="col-4">
                                                <p class="mb-1 font-weight-bold text-right text-muted">Total</p>
                                                <p class="text-teal text-right"><?= number_format((float) ($produto_venda->valor_unitario * $produto_venda->quant_pedida), 2, ',', '.') ?></p>
                                            </div>
                                        </div>
                                    </a>
                                    <?php } ?>
                                    <?php if ($lista_produto_venda == false) { ?>
                                    <div class="text-center mt-3" id="divAviso">
                                        <p id="pAviso" class="font-italic">Nenhum produto adicionado</p>
                                    </div>
                                    <?php } ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mb-2">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-borderless table-sm">
                                    <tbody>
                                        <tr>
                                            <td class="text-left">
                                                Total em produtos
                                            </td>
                                            <td class="text-right <?php if($total > 0) echo "text-teal"; else echo"text-muted"; ?>"
                                                id="idTotoProduto">
                                                R$ <span
                                                    id="idVelorProdutos"><?= number_format((float) ($total), 2, ',', '.') ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">
                                                Valor de frete <span
                                                    id="idTipoFrete"><?php if($pedido->tipo_frete == 1) echo "CIF"; else echo "FOB"; ?></span>
                                            </td>
                                            <td class="text-right <?php if($pedido->valor_frete > 0) echo "text-teal"; else echo"text-muted"; ?>"
                                                id="idValorFrete">
                                                R$ <span
                                                    id="ValorFrete"><?= number_format((float) ($pedido->valor_frete), 2, ',', '.') ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">
                                                Valor de seguro
                                            </td>
                                            <td class="text-right <?php if($pedido->valor_seguro > 0) echo "text-teal"; else echo"text-muted"; ?>"
                                                id="idValorSeguro">
                                                R$ <span
                                                    id="ValorSeguro"><?= number_format((float) ($pedido->valor_seguro), 2, ',', '.') ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">
                                                Outras despesas
                                            </td>
                                            <td class="text-right <?php if($pedido->outras_despesas > 0) echo "text-teal"; else echo"text-muted"; ?>"
                                                id="idOutrasDespesas">
                                                R$ <span
                                                    id="OutrasDespesas"><?= number_format((float) ($pedido->outras_despesas), 2, ',', '.') ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">
                                                Desconto
                                            </td>
                                            <td class="text-right <?php if($pedido->valor_desconto > 0) echo "text-danger"; else echo"text-muted"; ?>"
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
                                                    id="ValorDesconto"><?= number_format((float) ($pedido->valor_desconto), 2, ',', '.') ?></span>
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
                        <table class="table table-borderless table-sm mb-1">
                            <tbody>
                                <tr>
                                    <td class="text-left pt-0 text-dark"><strong>TOTAL DO PEDIDO</strong></td>
                                    <td class="text-right pt-0 text-teal" id="idTotalPedido">
                                        <strong>
                                            R$
                                            <span
                                                id="TotalPedido"><?= number_format((float) ($total + $pedido->valor_frete + $pedido->valor_seguro + $pedido->outras_despesas - $valorDesconto), 2, ',', '.') ?></span>
                                        </strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-3">
                <hr class="mb-3">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-12">
                        <button type="submit" form="PedidoVenda" class="btn btn-primary btn-block mb-2" name="Opcao"
                            value="salvar"><i class="fas fa-save"></i> Salvar</button>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-12">
                        <button data-toggle="modal" data-target="#inserir-faturamento" type="button"
                            class="btn btn-teal btn-block mb-2"
                            <?php if ($lista_produto == false || $pedido->situacao != 3) echo "disabled"; ?>><i
                                class="fas fa-dollar-sign"></i> Faturar Pedido</button>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-12">
                        <a href="#"
                            class="btn btn-warning <?php if($pedido->situacao == 2) echo "disabled"; ?> btn-block mb-2"
                            type="button" id="imprimir"><i class="fas fa-print"></i> Imprimir Pedido</a>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-12">
                        <a href="<?php echo base_url() ?>vendas/pedido-venda-vendedor"
                            class="btn btn-secondary btn-block mb-2 link-load">Cancelar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="inserir-produto">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Adicionar produto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-xs-12">
                        <form class="mb-0 needs-validation" novalidate
                            action="<?= base_url("vendas/pedido-venda-vendedor/inserir-produto-venda-vendedor/{$pedido->num_pedido_venda}") ?>"
                            method='post' id='formProdutoVenda'>
                            <div class="form-row">
                                <div class="form-group col-md-9">
                                    <label for="inputProdutoVenda">Código do Produto <span
                                            class="text-danger">*</span></label>
                                    <select id="inputProdutoVenda" class="selectpicker show-tick form-control"
                                        data-live-search="true" data-actions-box="true" title="Selecione um Produto"
                                        name="CodProduto" required>
                                        <?php foreach($lista_produto as $key_produto => $produto) { ?>
                                        <option value="<?= $produto->cod_produto ?>" class="limit-text-50"
                                            <?php if($produto->cod_produto == set_value('CodProduto')) echo "selected"; ?>>
                                            <?= $produto->cod_produto ?> - <?= $produto->nome_produto ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="control-label" for="inputTipoProduto">Tipo de Produto</label>
                                    <input class="form-control" id="inputTipoProduto" type="text" name="TipoProduto"
                                        readonly value="<?= set_value('TipoProduto'); ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="inputQuantEstoq">Quantidade em Estoque</label>
                                    <div class="input-group">
                                        <input type="text" inputmode="numeric" class="form-control" id="inputQuantEstoq"
                                            name="QuantEstoqEdit" value="<?= set_value('QuantEstoq'); ?>" readonly>
                                        <div class="input-group-append">
                                            <span class="input-group-text" style="width: 40px;" id="idUnEstoq"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputQuantPedida">Quantidade Pedida <span
                                            class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="inputQuantPedida" name="QuantPedida"
                                            data-mask="#.##0,000" data-mask-reverse="true" inputmode="numeric"
                                            value="<?= set_value('QuantPedida'); ?>" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text" style="width: 40px;" id="idUnProd"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="control-label" for="inputValorUnitario">Valor do Unitário <span
                                            class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">R$</span>
                                        </div>
                                        <input type="text" class="form-control" class="form-control"
                                            id="inputValorUnitario" type="text" name="ValorUnitario"
                                            data-mask="#.##0,00" data-mask-reverse="true" inputmode="numeric"
                                            value="<?= set_value('ValorUnitario'); ?>" required>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="control-label" for="inputTotalVenda">Valor Total</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">R$</span>
                                        </div>
                                        <input type="text" class="form-control" class="form-control" readonly
                                            id="inputTotalVenda" type="text" name="TotalVenda" data-mask="#.##0,00"
                                            inputmode="numeric" data-mask-reverse="true"
                                            value="<?= set_value('TotalVenda'); ?>">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-block" form="formProdutoVenda"><i class="fas fa-save"></i>
                    Salvar</button>
                <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<?php foreach($lista_produto_venda as $key_produto_venda => $produto_venda) { ?>
<div class="modal fade" id="editar-produto<?= $produto_venda->seq_produto_venda ?>">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar produto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-xs-12">
                        <form class="mb-0 needs-validation" novalidate
                            action="<?= base_url("vendas/pedido-venda-vendedor/salvar-produto-venda-vendedor/{$pedido->num_pedido_venda}/{$produto_venda->seq_produto_venda}") ?>"
                            method='post' id='formProdutoVendaEdit<?= $produto_venda->seq_produto_venda ?>'>
                            <div class="form-row">
                                <div class="form-group col-md-9">
                                    <label class="control-label" for="inputProdutoVendaEdit">Produto de Venda</label>
                                    <input class="form-control" id="inputProdutoVendaEdit" type="text"
                                        name="CodProdutoEdit"
                                        value="<?= $produto_venda->cod_produto ?> - <?= $produto_venda->nome_produto ?>"
                                        readonly>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="control-label" for="inputTipoProdutoEdit">Tipo de Produto</label>
                                    <input class="form-control" id="inputTipoProdutoEdit" type="text"
                                        name="TipoProdutoEdit" value="<?= $produto_venda->nome_tipo_produto ?>"
                                        readonly>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="inputQuantEstoqEdit">Quantidade em Estoque</label>
                                    <div class="input-group">
                                        <input type="text" inputmode="numeric" class="form-control 
                                        <?php if($produto_venda->quant_estoq < 0) echo "text-danger"; ?>"
                                            id="inputQuantEstoqEdit" name="QuantEstoqEdit"
                                            value="<?= number_format((float) ($produto_venda->quant_estoq), 3, ',', '.') ?>"
                                            readonly>
                                        <div class="input-group-append">
                                            <span class="input-group-text"
                                                style="width: 40px;"><?= $produto_venda->cod_unidade_medida ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputQuantPedidaEdit">Quantidade Pedida <span
                                            class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="text" inputmode="numeric" class="form-control"
                                            data-mask="#.##0,000" data-mask-reverse="true" id="inputQuantPedidaEdit"
                                            name="QuantPedidaEdit" 
                                            value="<?= number_format((float) ($produto_venda->quant_pedida), 3, ',', '.') ?>">
                                        <div class="input-group-append">
                                            <span class="input-group-text"
                                                style="width: 40px;"><?= $produto_venda->cod_unidade_medida ?></span>
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
                                            id="inputValorUnitarioEdit" type="text" name="ValorUnitarioEdit"
                                            data-mask="#.##0,00" data-mask-reverse="true" inputmode="numeric"
                                            value="<?= number_format((float) ($produto_venda->valor_unitario), 2, ',', '.') ?>">
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="control-label" for="inputValorTotalEdit">Valor Total</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">R$</span>
                                        </div>
                                        <input type="text" class="form-control" class="form-control" readonly
                                            id="inputValorTotalEdit" type="text" name="ValorTotalEdit"
                                            data-mask="#.##0,00" data-mask-reverse="true" inputmode="numeric"
                                            value="<?= number_format((float) ($produto_venda->valor_unitario * $produto_venda->quant_pedida), 2, ',', '.') ?>">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-block"
                    form="formProdutoVendaEdit<?= $produto_venda->seq_produto_venda ?>"><i class="fas fa-save"></i>
                    Salvar</button>
                <a href="<?php echo base_url() ?>vendas/pedido-venda-vendedor/excluir-produto-venda-vendedor/<?= $produto_venda->seq_produto_venda ?>" class="link-load btn btn-danger <?php if($produto_venda->quant_atendida > 0){ echo "disabled"; } ?> btn-block"
                    type="button"><i class="fas fa-trash-alt"></i> Excluir</a>
                <button type="button" class="btn btn-secondary btn-block " data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<div class="modal fade" id="inserir-faturamento">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Faturar pedido</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="mb-0 needs-validation" novalidate
                    action="<?= base_url("vendas/faturamento-pedido/inserir-faturamento-vendedor/{$pedido->num_pedido_venda}/{$pedido->cod_cliente}") ?>"
                    method="POST" id="InserirFaturamento">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <label class="control-label" for="inputDataFaturamento">Data do Faturamento <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" id="inputDataFaturamento" type="text"
                                        name="DataFaturamento" value="<?php if(set_value('DataFaturamento') == ""){
                                                                echo str_replace('-', '/', date("d-m-Y"));
                                                            }else{ echo set_value('DataFaturamento'); } ?>" required>
                                </div>
                                <div class="form-group col-md-5">
                                    <label>Método de Pagamento</label>
                                    <select class="selectpicker show-tick form-control" data-live-search="true"
                                        data-actions-box="true" title="Selecione um Método de Pagamento"
                                        name="CodMetodoPagamento" data-style="btn-input-primary" required>
                                        <?php foreach($lista_metodo_pagamento as $key_metodo_pagamento => $metodo_pagamento) { ?>
                                        <option value="<?= $metodo_pagamento->cod_metodo_pagamento ?>"
                                            <?php if($metodo_pagamento->cod_metodo_pagamento == set_value('CodMetodoPagamento')) echo "selected"; ?>>
                                            <?= $metodo_pagamento->cod_metodo_pagamento ?> -
                                            <?= $metodo_pagamento->nome_metodo_pagamento ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputParcelas">Parcelamento</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control search" id="inputParcelas" inputmode="numeric"
                                            data-mask="#.##0" data-mask-reverse="true" value="1" name="Parcelas">
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-outline-info" id="btnParcelas"><i
                                                    class="fa-solid fa-check"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="list-group list-group-flush" id="pacela-table">
                                <li class="list-group-item row">
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <h5><strong>Parcela: 1/1</strong></h5>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label class="control-label" for="inputDataVencimento1">Data de Vencimento
                                                <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="inputDataVencimento1"
                                                name="DataVencimento[1]"
                                                value="<?php if(set_value('DataVencimento[1]') == ""){
                                                                                echo str_replace('-', '/', date("d-m-Y"));
                                                                            }else{ echo set_value('DataVencimento[1]'); } ?>" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="control-label" for="inputValorParcela1">Valor da Parcela <span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">R$</span>
                                                </div>
                                                <input class="form-control" id="inputValorParcela1" inputmode="numeric"
                                                    name="ValorParcela[1]" type="text" data-mask="#.##0,00"
                                                    inputmode="numeric" data-mask-reverse="true" value="<?php if($pedido->valor_desconto != 0){
                                                                            if($pedido->tipo_desconto == 1){
                                                                                echo number_format((float) ($total - $pedido->valor_desconto), 2, ',', '.');
                                                                            }elseif($pedido->tipo_desconto == 2){
                                                                                echo number_format((float) ($total - ($total * ($pedido->valor_desconto / 100))), 2, ',', '.');
                                                                            }
                                                                         }else{
                                                                             echo number_format((float) ($total), 2, ',', '.');
                                                                         }
                                                                    ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div>
                                <div class="form-group">
                                    <label for="inputObservacao">Observações do Faturamento</label>
                                    <textarea class="form-control" rows="3" id="inputObservacao	"
                                        name="ObservFatur"><?= set_value('ObservReceb'); ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" form="InserirFaturamento"><i
                        class="fas fa-plus-circle"></i>
                    Faturar Pedido</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="elimina-produto" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Eliminar Produto do Pedido</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Confirma eliminação do(s) produto(s) do pedido selecionado(s)?
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" form="DeleteProdutoVenda">Confirma</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<script>
$(function() {
    $.applyDataMask();
});

$("[name='excluir_todos[]']").click(function() {
    var cont = $("[name='excluir_todos[]']:checked").length;
    $("#excluirProduto").prop("disabled", cont ? false : true);
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

$(function() {
    var doc = new jsPDF('p', 'pt', 'letter');
    //evnto que deve carregar a janela a ser impressa 
    $('#imprimir').click(function() {

        doc.fromHTML("<?= base_url("vendas/imprimir-pedido-vendedor/{$pedido->num_pedido_venda}") ?>",
            15, 15, {
                'width': 170,
                'elementHandlers': specialElementHandlers
            });
        doc.save('PEDIDO_<?= $pedido->num_pedido_venda ?>.pdf');
    });
});

$("#inputProdutoVenda").change(function() {

    var baseurl = "<?php echo base_url(); ?>";

    var produto = $("#inputProdutoVenda").val();

    $.post(baseurl + "ajax/busca-produto", {
        produto: produto
    }, function(valor) {
        var aValor = valor.split('|');
        console.log(aValor);

        $saldoEstoq = parseFloat((aValor[4].split('.').join('')).replace(',', '.'));

        if ($saldoEstoq < 0) {
            $("#inputQuantEstoq").addClass("text-danger");
        } else {
            $("#inputQuantEstoq").removeClass("text-danger");
        }

        $("#idUnProd").text(aValor[0]);
        $("#idUnEstoq").text(aValor[0]);
        $("#inputTipoProduto").val(aValor[1]);
        $("#inputValorUnitario").val(aValor[3]);
        $("#inputQuantEstoq").val(aValor[4]);
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

    var totalVenda = valUnit * quantPedida;

    $("#inputTotalVenda").val(totalVenda.toLocaleString("pt-BR", {
        style: "decimal",
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    }));

};

$('#inputDataFaturamento').datepicker({
    uiLibrary: 'bootstrap4'
});

$('#inputProdutoVenda').selectpicker({
    style: 'btn-input-primary'
});

$('#inputDateEntrega').datepicker({
    uiLibrary: 'bootstrap4'
});

$("#btnParcelas").click(function() {

    var quantParcela = $('#inputParcelas').val();

    var dataParcela = new Date(String($('#inputDataVencimento1').val().split('/').reverse().join(
        '-')));

    var valorTotal = parseFloat(jQuery('#TotalPedido').text() != '' ? (jQuery('#TotalPedido')
        .text()
        .split(
            '.').join('')).replace(',', '.').replace('R$', '') : 0);
    var acumulado = 0;

    $("#pacela-table").empty();

    for (var i = 1; i <= quantParcela; i++) {

        valorParcela = round((valorTotal / quantParcela), 2);
        acumulado = acumulado + valorParcela;

        if (i == quantParcela && acumulado != valorTotal) {
            valorParcela = valorParcela + (valorTotal - acumulado);
        }

        var newRow = $('<li class="list-group-item row">');
        var cols = "";

        if (i > 1) {
            var currentDay = dataParcela.getDate();
            var currentMonth = dataParcela.getMonth();
            dataParcela.setMonth(currentMonth + 1, currentDay);
        }

        cols += '<div class="form-row">';



        //Número de parcelamento        
        cols += '<div class="form-group col-md-4">';
        cols += ' <h5><strong>Parcela: ' + i + '/' + quantParcela + '</strong></h5>';
        cols += '</div>';
        cols += '</div>';

        //Data de vencimento previsto
        cols += '<div class="form-row">';
        cols += '<div class="form-group col-md-6">';
        cols += '<label class="control-label" for="inputDataVencimento' + i +
            '">Data de Vencimento <span class="text-danger">*</span></label>';
        cols += '<input type="text" class="form-control" id="inputDataVencimento' + i + '"';
        cols += 'name="DataVencimento[' + i + ']"';
        cols += 'value="' + dataParcela.toLocaleDateString('pt-BR', {
            timeZone: 'UTC'
        }) + '" required>';
        cols += '</div>';

        // Valor da parcela
        cols += '<div class="form-group col-md-6">';
        cols += '<label class="control-label" for="inputValorParcela' + i +
            '">Valor da Parcela <span class="text-danger">*</span></label>';
        cols += '<div class="input-group">';
        cols += '<div class="input-group-prepend">';
        cols += '<span class="input-group-text">R$</span>';
        cols += '</div>';
        cols += '<input class="form-control" id="inputValorParcela' + i + ' inputmode="numeric" ' +
            '" name="ValorParcela[' +
            i + ']" type="text" ';
        cols += 'data-mask="#.##0,00" data-mask-reverse="true" inputmode="numeric"';
        cols += 'value="' + valorParcela.toLocaleString("pt-BR", {
            style: "decimal",
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });
        cols += '" required>';
        cols += '</div>';
        cols += '</div>';

        cols += '</div>';
        cols += '</li>';

        newRow.append(cols);
        $("#pacela-table").append(newRow);

        $('#inputDataVencimento' + i).datepicker({
            uiLibrary: 'bootstrap4'
        });

    }

    $.applyDataMask();


    return;

});

$('#inputDataVencimento1').datepicker({
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
    if (tipoFrete == 1) {
        $('#idTipoFrete').text('CIF');
    } else {
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
        $('#idValorFrete').removeClass("text-muted");
        $('#idValorFrete').addClass("text-teal");                
    }else{
        $('#idValorFrete').removeClass("text-teal");  
        $('#idValorFrete').addClass("text-muted"); 
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
        $('#idValorSeguro').removeClass("text-muted");
        $('#idValorSeguro').addClass("text-teal");        
    }else{
        $('#idValorSeguro').removeClass("text-teal");
        $('#idValorSeguro').addClass("text-muted");     
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
        $('#idOutrasDespesas').removeClass("text-muted"); 
        $('#idOutrasDespesas').addClass("text-teal");        
    }else{
        $('#idOutrasDespesas').removeClass("text-teal"); 
        $('#idOutrasDespesas').addClass("text-muted");  
    } 

    var valorDesconto = parseFloat(jQuery('#inputValorDesconto').val() != '' ? (jQuery('#inputValorDesconto').val()
        .split('.').join('')).replace(',', '.') : 0);
    $('#ValorDesconto').text(valorDesconto.toLocaleString("pt-BR", {
        style: "decimal",
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    }));
    if(valorDesconto > 0){
        $('#idValorDesconto').removeClass("text-muted");
        $('#idValorDesconto').addClass("text-danger");        
    }else{
        $('#idValorDesconto').addClass("text-muted");  
        $('#idValorDesconto').removeClass("text-danger");  
    }

    var valorProduto = parseFloat(jQuery('#idVelorProdutos').text() != '' ? (jQuery(
            '#idVelorProdutos').text()
        .split('.').join('')).replace(',', '.') : 0);

    var calcDesconto = 0;
    var tipoDesconto = $('#inputTipoDesconto').val();
    if (tipoDesconto == 1) {
        $('#tipoDescontoValor').text("R$");
        $('#tipoDescontoPerc').text("");
        calcDesconto = valorDesconto;
    } else {
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
    if (totalLiquido > 0) {
        $('#idTotalPedido').addClass("text-teal");
    } else {
        $('#idTotalPedido').removeClass("text-teal");
    }
}

const round = (num, places) => {
    return +(parseFloat(num).toFixed(places));
}
</script>

<?php $this->load->view('gerais/footer-vendedor'); ?>