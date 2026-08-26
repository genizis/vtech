<?php $this->load->view('gerais/header' , $menu); ?>
<?php $this->load->view('gerais/menu', $menu); ?>

<section>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('visao-geral') ?>">Visão Geral</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('vendas') ?>">Vendas</a></li>
            <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>vendas/pedido-venda">Pedido de Venda</a>
            </li>
            <li class="breadcrumb-item active">Editar Pedido de Venda</a></li>
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
                                    action="<?= base_url("vendas/pedido-venda/editar-pedido-venda/{$pedido->num_pedido_venda}") ?>"
                                    method="POST" id="PedidoVenda">
                                    <div class="form-row">
                                        <div class="form-group col-md-2">
                                            <label class="control-label" for="inputNumPedido">Pedido de Venda</label>
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
                                        <div class="form-group col-md-3">
                                            <label for="inputDateEmissao">Data de Emissão</label>
                                            <input type="text" class="form-control" id="inputDateEmissao"
                                                name="DataEmissao" readonly
                                                value="<?= str_replace('-', '/', date("d-m-Y", strtotime($pedido->data_emissao))) ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputVendedor">Vendedor</label>
                                            <select id="inputVendedor" class="selectpicker show-tick form-control"
                                                data-live-search="true" data-actions-box="true"
                                                title=" " data-style="btn-input-primary"
                                                name="CodVendedor">
                                                <?php foreach($lista_vendedor as $key_vendedor => $vendedor) { ?>
                                                <option value="<?= $vendedor->cod_vendedor ?>"
                                                    <?php if($vendedor->cod_vendedor == $pedido->cod_vendedor) echo "selected"; ?>>
                                                    <?= $vendedor->cod_vendedor ?> -
                                                    <?= $vendedor->nome_vendedor ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="inputPerComissao">Percentual de Comissão</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="inputPerComissao"
                                                    name="PerComissao" data-mask="##0,00" data-mask-reverse="true"
                                                    value="<?= number_format((float) ($pedido->perc_comissao), 2, ',', '.') ?>"
                                                    <?php if($pedido->cod_vendedor == null) echo "disabled"; ?>>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="inputDateEntrega">Data de Entrega <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="inputDateEntrega"
                                                name="DataEntrega"
                                                value="<?= str_replace('-', '/', date("d-m-Y", strtotime($pedido->data_entrega))) ?>"
                                                required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputTransportador">Transportador</label>
                                            <select id="inputTransportador" class="selectpicker show-tick form-control"
                                                data-live-search="true" data-actions-box="true"
                                                title=" " data-style="btn-input-primary"
                                                name="CodTransportador">
                                                <?php foreach($lista_transportador as $key_transportador => $transportador) { ?>
                                                <option value="<?= $transportador->cod_transportador ?>"
                                                    <?php if($transportador->cod_transportador == $pedido->cod_transportador) echo "selected"; ?>>
                                                    <?= $transportador->cod_transportador ?> -
                                                    <?= $transportador->nome_transportador ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
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
                                                <input type="text" class="form-control" data-mask="#.##0,00"
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
                                                <input type="text" class="form-control" data-mask="#.##0,00"
                                                    data-mask-reverse="true" name="OutrasDespesas" id="inputOutrasDespesas"
                                                    value="<?= number_format((float) ($pedido->outras_despesas), 2, ',', '.') ?>">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputTipoDesconto">Desconto</label>
                                            <div class="input-group">
                                                <select id="inputTipoDesconto"
                                                    class="selectpicker show-tick form-control" data-actions-box="true"
                                                    data-style="btn-input-primary" name="TipoDesconto" id="inputTipoDesconto">
                                                    <option value="1"
                                                        <?php if($pedido->tipo_desconto == 1) echo "selected"; ?>>R$
                                                    </option>
                                                    <option value="2"
                                                        <?php if($pedido->tipo_desconto == 2) echo "selected"; ?>>%
                                                    </option>
                                                </select>
                                                <input type="text" class="form-control" data-mask="#.##0,00"
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
                                            <div class="col-lg-12 col-md-12 col-xs-12">
                                                <button data-toggle="modal" data-target="#inserir-produto" type="button"
                                                    class="btn btn-outline-info btn-sm"><i
                                                        class="fas fa-plus-circle"></i> Adicionar
                                                    Produto</button>
                                                <button data-toggle="modal" data-target="#elimina-produto" type="button"
                                                    class="btn btn-outline-danger btn-sm" id="excluirProduto"
                                                    disabled><i class="fas fa-trash-alt"></i>
                                                    Excluir</button>
                                            </div>
                                        </div>
                                        <form class="mb-0 needs-validation" novalidate
                                            action="<?= base_url('vendas/pedido-venda/excluir-produto-venda') ?>"
                                            method="POST" id="DeleteProdutoVenda">
                                            <input type="hidden" name="NumPedidoVenda"
                                                value="<?= $pedido->num_pedido_venda ?>">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th scope="col" class="text-center"><i
                                                                    class="fa-solid fa-check"></i></th>
                                                            <th scope="col">Produto</th>
                                                            <th scope="col" class="text-right">Quantidade</th>
                                                            <th scope="col" class="text-right">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="table-sm">
                                                        <?php $total = 0; foreach($lista_produto_venda as $key_produto_venda => $produto_venda) { $total = $total + ($produto_venda->valor_unitario * $produto_venda->quant_pedida);  ?>
                                                        <tr>
                                                            <td class="align-middle">
                                                                <div class="checkbox text-center">
                                                                    <input name="excluir_todos[]" type="checkbox"
                                                                        value="<?= $produto_venda->seq_produto_venda ?>"
                                                                        <?php if($produto_venda->quant_atendida > 0){ echo "disabled"; } ?> />
                                                                </div>
                                                            </td>
                                                            <td class="align-middle"><a href="#" data-toggle="modal"
                                                                    class="text-dark"
                                                                    data-target="#editar-produto<?= $produto_venda->seq_produto_venda ?>"><?= $produto_venda->cod_produto ?> - <?= $produto_venda->nome_produto ?></a><br>
                                                            <?php
                                                            if($pedido->data_entrega < date('Y-m-d') && $produto_venda->status != 3 && $produto_venda->status != 4){
                                                                echo "<span class='badge bg-danger-light'>Atrasado</span>";
                                                            }else{
                                                                switch ($produto_venda->status) {
                                                                    case 1:
                                                                        echo "<span class='badge bg-light'>Pendente</span>";
                                                                        break;
                                                                    case 2:
                                                                        echo "<span class='badge bg-info-light'>Atendido Parcial</span>";
                                                                        break;
                                                                    case 3:
                                                                        echo "<span class='badge bg-teal-light'>Atendido Total</span>";
                                                                            break;
                                                                    case 4:
                                                                        echo "<span class='badge bg-dark text-white'>Estornado</span>";
                                                                        break;
                                                                } 

                                                            }                                                        
                                                            ?>
                                                            </td>
                                                            <td class="text-right text-info align-middle">
                                                                <?= number_format((float) ($produto_venda->quant_pedida), 3, ',', '.') ?>
                                                                <?= $produto_venda->cod_unidade_medida ?>
                                                            </td>
                                                            <td class="text-right text-teal align-middle">R$
                                                                <?= number_format((float) ($produto_venda->valor_unitario * $produto_venda->quant_pedida), 2, ',', '.') ?>
                                                            </td>
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <?php if ($lista_produto_venda == false) { ?>
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
                                        <button type="submit" form="PedidoVenda" class="btn btn-primary" name="Opcao"
                                            value="salvar"><i class="fas fa-save"></i>
                                            Salvar</button>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row float-right">
                                            <div class="col-md-12">
                                                <a href="<?php echo base_url() ?>vendas/faturamento-pedido/novo-faturamento-pedido/<?= $pedido->num_pedido_venda ?>"
                                                    class="link-load btn btn-info <?php if($pedido->situacao != 3) echo "disabled"; ?>"><i
                                                        class="fas fa-dollar-sign"></i> Faturar Pedido</a>
                                                <a href="<?php echo base_url() ?>vendas/pedido-venda"
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
                        Pedido de venda
                    </h6>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <?php if($pedido->nome_usuario_erp != null || $pedido->nome_usuario_app != null){ ?>
                                <table class="table table-borderless table-sm mb-0">
                                    <tbody>
                                        <tr>
                                            <td class="text-left">
                                                Usuário do pedido
                                            </td>
                                            <?php if($pedido->usuario_erp != null){ ?>
                                            <td class="text-right">
                                                <?= $pedido->nome_usuario_erp ?>
                                            </td>
                                            <?php }elseif($pedido->usuario_app != null){ ?>
                                            <td class="text-right">
                                                <?= $pedido->nome_usuario_app ?>
                                            </td>
                                            <?php } ?>
                                        </tr>
                                    </tbody>
                                </table>
                                <?php } ?>
                                <table class="table table-borderless table-sm">
                                    <tbody>
                                        <tr>
                                            <td class="text-left">
                                                Total em produtos
                                            </td>
                                            <td class="text-right <?php if($total > 0) echo "text-teal"; else echo "text-muted"; ?>" id="idTotoProduto">
                                                R$ <span id="idVelorProdutos"><?= number_format((float) ($total), 2, ',', '.') ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">
                                                Valor de frete <span id="idTipoFrete"><?php if($pedido->tipo_frete == 1) echo "CIF"; else echo "FOB"; ?></span>
                                            </td>
                                            <td class="text-right <?php if($pedido->valor_frete > 0) echo "text-teal"; else echo "text-muted"; ?>" id="idValorFrete">
                                                R$ <span id="ValorFrete"><?= number_format((float) ($pedido->valor_frete), 2, ',', '.') ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">
                                                Valor de seguro
                                            </td>
                                            <td
                                                class="text-right <?php if($pedido->valor_seguro > 0) echo "text-teal"; else echo "text-muted"; ?>" id="idValorSeguro">
                                                R$ <span id="ValorSeguro"><?= number_format((float) ($pedido->valor_seguro), 2, ',', '.') ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">
                                                Outras despesas
                                            </td>
                                            <td
                                                class="text-right <?php if($pedido->outras_despesas > 0) echo "text-teal"; else echo "text-muted"; ?>" id="idOutrasDespesas">
                                                R$ <span id="OutrasDespesas"><?= number_format((float) ($pedido->outras_despesas), 2, ',', '.') ?></span>
                                            </td>
                                        </tr>
                                        <tr>                                            
                                            <td class="text-left">
                                                Desconto
                                            </td>
                                            <td class="text-right <?php if($pedido->valor_desconto > 0) echo "text-danger"; else echo "text-muted"; ?>" id="idValorDesconto">
                                                <?php
                                                    $valorDesconto = 0;
                                                    if($pedido->tipo_desconto == 1){
                                                        $valorDesconto = $pedido->valor_desconto;
                                                    }elseif($pedido->tipo_desconto == 2){
                                                        $valorDesconto = $total * ($pedido->valor_desconto / 100);
                                                    }
                                                ?>
                                                <span id="tipoDescontoValor"><?php if($pedido->tipo_desconto == 1) echo "R$"; ?></span> <span id="ValorDesconto"><?= number_format((float) ($pedido->valor_desconto), 2, ',', '.') ?></span> <span id="tipoDescontoPerc"><?php if($pedido->tipo_desconto == 2) echo "%"; ?></span>
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
                                            <span id="TotalPedido"><?= number_format((float) ($total + $pedido->valor_frete + $pedido->valor_seguro + $pedido->outras_despesas - $valorDesconto), 2, ',', '.') ?></span>
                                        </strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card  mb-3">
                    <div class="card-body">
                        <a href="#"
                            class="btn btn-outline-warning btn-block <?php if($pedido->situacao == 2) echo "disabled"; ?>"
                            type="button" id="imprimir"><i class="fas fa-print"></i> Imprimir Pedido</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

<div class="modal fade" id="inserir-produto">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Adicionar produto</h5>
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
                                            action="<?= base_url("vendas/pedido-venda/inserir-produto-venda/{$pedido->num_pedido_venda}") ?>"
                                            method='post' id='formProdutoVenda'>
                                            <div class="form-row">
                                                <div class="form-group col-md-8">
                                                    <label for="inputProdutoVenda">Produto de Venda <span
                                                            class="text-danger">*</span></label>
                                                    <select id="inputProdutoVenda" class="selectpicker show-tick form-control"
                                                        data-live-search="true" data-actions-box="true" title=" "
                                                        name="CodProduto" required>
                                                        <?php foreach($lista_produto as $key_produto => $produto) { ?>
                                                        <option value="<?= $produto->cod_produto ?>"
                                                            <?php if($produto->cod_produto == set_value('CodProduto')) echo "selected"; ?>>
                                                            <?= $produto->cod_produto ?> - <?= $produto->nome_produto ?>
                                                        </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="control-label" for="inputTipoProduto">Tipo de Produto</label>
                                                    <input class="form-control" id="inputTipoProduto" type="text" name="TipoProduto"
                                                        readonly value="<?= set_value('TipoProduto'); ?>">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputQuantPedida">Quantidade Pedida <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="inputQuantPedida" name="QuantPedida"
                                                            data-mask="#.##0,000" data-mask-reverse="true"
                                                            value="<?= set_value('QuantPedida'); ?>" required>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text" style="width: 40px;" id="idUnProd"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="control-label" for="inputValorUnitario">Valor do Unitário <span
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
                                                    <label class="control-label" for="inputTotalVenda">Valor Total</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$</span>
                                                        </div>
                                                        <input type="text" class="form-control" class="form-control" readonly
                                                            id="inputTotalVenda" type="text" name="TotalVenda" data-mask="#.##0,00"
                                                            data-mask-reverse="true" value="<?= set_value('TotalVenda'); ?>">
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
                <button type="submit" class="btn btn-primary" form="formProdutoVenda"><i class="fas fa-save"></i>
                    Salvar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<?php foreach($lista_produto_venda as $key_produto_venda => $produto_venda) { ?>
<div class="modal fade" id="editar-produto<?= $produto_venda->seq_produto_venda ?>">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar produto</h5>
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
                                            action="<?= base_url("vendas/pedido-venda/salvar-produto-venda/{$pedido->num_pedido_venda}/{$produto_venda->seq_produto_venda}") ?>"
                                            method='post' id='formProdutoVendaEdit<?= $produto_venda->seq_produto_venda ?>'>
                                            <div class="form-row">
                                                <div class="form-group col-md-8">
                                                    <label class="control-label" for="inputProdutoVendaEdit">Produto de Venda</label>
                                                    <input class="form-control" id="inputProdutoVendaEdit" type="text"
                                                        name="CodProdutoEdit"
                                                        value="<?= $produto_venda->cod_produto ?> - <?= $produto_venda->nome_produto ?>"
                                                        readonly>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="control-label" for="inputTipoProdutoEdit">Tipo de Produto</label>
                                                    <input class="form-control" id="inputTipoProdutoEdit" type="text"
                                                        name="TipoProdutoEdit" value="<?= $produto_venda->nome_tipo_produto ?>"
                                                        readonly>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputQuantPedidaEdit">Quantidade Pedida <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control"
                                                            value="<?= $produto_venda->quant_pedida ?>" data-mask="#.##0,000"
                                                            data-mask-reverse="true"
                                                            id="inputQuantPedidaEdit<?= $produto_venda->seq_produto_venda ?>"
                                                            name="QuantPedidaEdit" required>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"
                                                                style="width: 40px;"><?= $produto_venda->cod_unidade_medida ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="control-label" for="inputValorUnitarioEdit">Valor Unitário <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$</span>
                                                        </div>
                                                        <input type="text" class="form-control" class="form-control"
                                                            id="inputValorUnitarioEdit<?= $produto_venda->seq_produto_venda ?>"
                                                            type="text" name="ValorUnitarioEdit" data-mask="#.##0,00"
                                                            data-mask-reverse="true" required
                                                            value="<?= number_format((float) ($produto_venda->valor_unitario), 2, ',', '.') ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="control-label" for="inputValorTotalEdit">Valor Total</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$</span>
                                                        </div>
                                                        <input type="text" class="form-control" class="form-control" readonly
                                                            id="inputValorTotalEdit<?= $produto_venda->seq_produto_venda ?>" type="text"
                                                            name="ValorTotalEdit" data-mask="#.##0,00" data-mask-reverse="true"
                                                            value="<?= number_format((float) ($produto_venda->valor_unitario * $produto_venda->quant_pedida), 2, ',', '.') ?>">
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
                <button type="submit" class="btn btn-primary"
                    form="formProdutoVendaEdit<?= $produto_venda->seq_produto_venda ?>"><i class="fas fa-save"></i>
                    Salvar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<div class="modal fade" id="elimina-produto" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Eliminar produtos do pedido</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Confirma eliminação dos produtos selecionados?
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger" form="DeleteProdutoVenda">Confirma</button>
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
        iFrame.src = "<?= base_url("vendas/imprimir-pedido/{$pedido->num_pedido_venda}") ?>";
        document.body.appendChild(iFrame);
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
        $("#idUnProd").text(aValor[0]);
        $("#inputTipoProduto").val(aValor[1]);
        $("#inputValorUnitario").val(aValor[3]);

        valTotal();
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

<?php foreach($lista_produto_venda as $key_produto_venda => $produto_venda) { ?>
jQuery('#inputQuantPedidaEdit<?= $produto_venda->seq_produto_venda ?>').on('keyup', function() {
    var valUnit = parseFloat(jQuery('#inputValorUnitarioEdit<?= $produto_venda->seq_produto_venda ?>').val() !=
        '' ? (jQuery('#inputValorUnitarioEdit<?= $produto_venda->seq_produto_venda ?>').val().split(
            '.').join('')).replace(',', '.') : 0);
    var quantPedida = parseFloat(jQuery('#inputQuantPedidaEdit<?= $produto_venda->seq_produto_venda ?>')
        .val() != '' ? (jQuery('#inputQuantPedidaEdit<?= $produto_venda->seq_produto_venda ?>').val().split(
            '.').join('')).replace(',', '.') : 0);

    var totalVenda = valUnit * quantPedida;

    $("#inputValorTotalEdit<?= $produto_venda->seq_produto_venda ?>").val(totalVenda.toLocaleString("pt-BR", {
        style: "decimal",
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    }));
});

jQuery('#inputValorUnitarioEdit<?= $produto_venda->seq_produto_venda ?>').on('keyup', function() {
    var valUnit = parseFloat(jQuery('#inputValorUnitarioEdit<?= $produto_venda->seq_produto_venda ?>').val() !=
        '' ? (jQuery('#inputValorUnitarioEdit<?= $produto_venda->seq_produto_venda ?>').val().split(
            '.').join('')).replace(',', '.') : 0);
    var quantPedida = parseFloat(jQuery('#inputQuantPedidaEdit<?= $produto_venda->seq_produto_venda ?>')
        .val() != '' ? (jQuery('#inputQuantPedidaEdit<?= $produto_venda->seq_produto_venda ?>').val().split(
            '.').join('')).replace(',', '.') : 0);

    var totalVenda = valUnit * quantPedida;

    $("#inputValorTotalEdit<?= $produto_venda->seq_produto_venda ?>").val(totalVenda.toLocaleString("pt-BR", {
        style: "decimal",
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    }));
});
<?php } ?>

$('#inputProdutoVenda').selectpicker({
    style: 'btn-input-primary'
});

$('#inputDateEntrega').datepicker({
    uiLibrary: 'bootstrap4'
});

jQuery('#inputTipoDesconto').change(function() {
    calcDesconto();
});

jQuery('#inputValorDesconto').on('keyup', function() {
    calcDesconto();
});

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

    var valorDesconto = parseFloat(jQuery('#inputValorDesconto').val() != '' ? (jQuery(
            '#inputValorDesconto').val()
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
        $('#idTotalPedido').addClass("text-teal");        
    }else{
        $('#idTotalPedido').removeClass("text-teal");  
    }
}
</script>

<?php $this->load->view('gerais/footer'); ?>