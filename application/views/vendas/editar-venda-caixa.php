<?php $this->load->view('gerais/header' , $menu); ?>
<?php $this->load->view('gerais/menu', $menu); ?>

<section>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('visao-geral') ?>">Visão Geral</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>vendas/frente-caixa">Frente de Caixa</a>
            </li>
            <li class="breadcrumb-item active">Editar Venda Caixa</li>
        </ol>
    </div>
</section>


<section>
    <div class="container">
        <form action="<?php echo base_url("vendas/frente-caixa/salvar-venda-caixa/{$venda_caixa->num_venda_caixa}") ?>"
            method='post' class="mb-0 needs-validation" novalidate>
            <div class="row">
                <div class="col-md-4">
                    <div lass="row">
                        <ul class="nav nav-tabs mb-3">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#produto">Produto</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#cliente">Cliente</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#entrega">Entrega</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#pagamento">Pagamento</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card  mb-3">
                        <div class="card-body">                            
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="produto">
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="inputCodigoBarras">Código de Barras</label>
                                            <input type="text" class="form-control" id="inputCodigoBarras"
                                            <?php if($venda_caixa->status != 1) echo "readonly"; ?>
                                                name="CodigoBarras" value="">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="inputProdutoVenda">Produto <span
                                                    class="text-danger">*</span></label>
                                            <select id="inputProdutoVenda" class="selectpicker show-tick form-control"
                                                data-live-search="true" data-actions-box="true"
                                                title="Selecione um Produto" name="CodProduto"
                                                data-style="btn-input-primary"
                                                <?php if($venda_caixa->status != 1) echo "disabled"; ?>>
                                                <?php foreach($lista_produto as $key_produto => $produto) { ?>
                                                <option value="<?= $produto->cod_produto ?>"
                                                    <?php if($produto->cod_produto == set_value('CodProduto')) echo "selected"; ?>>
                                                    <?= $produto->cod_produto ?> - <?= $produto->nome_produto ?>
                                                </option>
                                                <?php } ?>
                                            </select>
                                            <input type="text" class="form-control" id="inputTipoControle"
                                                    name="TipoControle" value="" hidden>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputQuant">Quantidade <span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="inputQuant"
                                                    name="QuantProduto" data-mask="#.##0,000" data-mask-reverse="true"
                                                    value="<?= set_value('QuantProduto'); ?>"
                                                    <?php if($venda_caixa->status != 1) echo "readonly"; ?>>
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="inputUnidadeMedida">UN</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="control-label" for="inputValorUnitario">Valor Unitário <span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">R$</span>
                                                </div>
                                                <input type="text" class="form-control" class="form-control"
                                                    id="inputValorUnitario" type="text" name="ValorUnitario"
                                                    data-mask="#.##0,00" data-mask-reverse="true"
                                                    <?php if($venda_caixa->status != 1) echo "readonly"; ?>
                                                    value="<?= set_value('ValorUnitario'); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="mb-3">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-xs-12">
                                            <button type="button" class="btn btn-outline-teal btn-block"
                                                id="btnAdicionarProduto" value="salvar" disabled><i
                                                    class="fas fa-plus"></i>
                                                Adicionar Produto</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="cliente">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-xs-12">
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="inputCliente">Cliente</label>
                                                    <select id="inputCliente"
                                                        class="selectpicker show-tick form-control"
                                                        data-live-search="true" data-actions-box="true"
                                                        <?php if($venda_caixa->status != 1) echo "disabled"; ?>
                                                        data-style="btn-input-primary" name="CodCliente">
                                                        <option value="0">Consumidor Final</option>
                                                        <?php foreach($lista_cliente as $key_cliente => $cliente) { ?>
                                                        <option value="<?= $cliente->cod_cliente ?>"
                                                            <?php if($cliente->cod_cliente == $venda_caixa->cod_cliente) echo "selected"; ?>>
                                                            <?= $cliente->cod_cliente ?> -
                                                            <?= $cliente->nome_cliente ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12 mb-0">
                                                    <label>Tipo Pessoa</label>
                                                    <div class="btn-group btn-block" data-toggle="buttons">
                                                        <label class="btn btn-outline-secondary">
                                                            <input type="radio" id="radioJuridica" name="TipoPessoa"
                                                                value="1"
                                                                <?php if($venda_caixa->tipo_pessoa == 1) echo 'checked'; ?>
                                                                <?php if($venda_caixa->status != 1) echo "disabled"; ?>>
                                                            Jurídica
                                                        </label>
                                                        <label class="btn btn-outline-secondary">
                                                            <input type="radio" id="radioFisica" name="TipoPessoa"
                                                                value="2"
                                                                <?php if($venda_caixa->tipo_pessoa == 2) echo 'checked'; ?>
                                                                <?php if($venda_caixa->status != 1) echo "disabled"; ?>>
                                                            Física
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="inputCPFCNPJ">CNPJ/CPF</label>
                                                    <input type="text" class="form-control" class="form-control"
                                                        id="inputCPFCNPJ"
                                                        data-mask="<?php if($venda_caixa->tipo_pessoa == 1) echo "00.000.000/0000-00"; else echo "000.000.000-00"; ?>"
                                                        data-mask-reverse="true" name="CnpjCpf"
                                                        <?php if($venda_caixa->status != 1) echo "readonly"; ?>
                                                        value="<?= $venda_caixa->cnpj_cpf ?>">
                                                </div>
                                            </div>
                                            <hr class="mb-3">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <a href="#" data-toggle="modal" data-target="#novo-cliente"
                                                        type="button"
                                                        class="btn btn-outline-info btn-block <?php if($venda_caixa->status != 1) echo "disabled"; ?>"><i
                                                            class="fas fa-plus-circle"></i> Novo Cliente</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="entrega">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-xs-12">
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="inputIndicadorPresencial">Indicador de Presença</label>
                                                    <select class="form-control selectpicker show-tick"
                                                        <?php if($venda_caixa->status != 1) echo "disabled"; ?>
                                                        data-style="btn-input-primary" id="inputIndicadorPresencial"
                                                        name="indicadorPresencial">
                                                        <?php foreach ($indicadorPresencial as $key => $name) { ?>
                                                        <option value="<?php echo $key ?>"
                                                            <?php if ($key == $venda_caixa->indicador_presenca) echo "selected"; ?>>
                                                            <?php echo $name ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="inputTransportador">Transportador</label>
                                                    <select id="inputTransportador"
                                                        class="selectpicker show-tick form-control"
                                                        <?php if($venda_caixa->status != 1) echo "disabled"; ?>
                                                        data-live-search="true" data-actions-box="true"
                                                        data-style="btn-input-primary" name="CodTransportador">
                                                        <option value="0">Sem Transportador</option>
                                                        <?php foreach($lista_transportador as $key_transportador => $transportador) { ?>
                                                        <option value="<?= $transportador->cod_transportador ?>"
                                                            <?php if($transportador->cod_transportador == $venda_caixa->cod_transportador) echo "selected"; ?>>
                                                            <?= $transportador->cod_transportador ?> -
                                                            <?= $transportador->nome_transportador ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <hr class="mb-3">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <a href="#" data-toggle="modal" data-target="#novo-transportador"
                                                        type="button" class="btn btn-outline-info btn-block"><i
                                                            class="fas fa-plus-circle"></i> Novo Transportador</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pagamento">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-xs-12">
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label class="control-label" for="inputSubTotal">Total em
                                                        Produtos</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$</span>
                                                        </div>
                                                        <input type="text" class="form-control" class="form-control"
                                                            id="inputSubTotal" type="text" name="SubTotal"
                                                            data-mask="#.##0,00" data-mask-reverse="true"
                                                            value="<?= number_format($venda_caixa->sub_total, 2, ',', '.') ?>"
                                                            readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputValorFrete">Frete</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$</span>
                                                        </div>
                                                        <input type="text" class="form-control" data-mask="#.##0,00"
                                                            <?php if($venda_caixa->status != 1) echo "readonly"; ?>
                                                            data-mask-reverse="true" name="ValorFrete"
                                                            id="inputValorFrete"
                                                            value="<?= number_format($venda_caixa->valor_frete, 2, ',', '.') ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputTipoDesconto">Desconto</label>
                                                    <div class="input-group">
                                                        <select id="inputTipoDesconto"
                                                            <?php if($venda_caixa->status != 1) echo "disabled"; ?>
                                                            class="selectpicker show-tick form-control"
                                                            data-actions-box="true" data-style="btn-input-primary"
                                                            name="TipoDesconto">
                                                            <option value="1"
                                                                <?php if($venda_caixa->tipo_desconto == 1) echo "selected"; ?>>
                                                                R$</option>
                                                            <option value="2"
                                                                <?php if($venda_caixa->tipo_desconto == 2) echo "selected"; ?>>
                                                                %</option>
                                                        </select>
                                                        <input type="text" class="form-control" data-mask="#.##0,00"
                                                            <?php if($venda_caixa->status != 1) echo "readonly"; ?>
                                                            data-mask-reverse="true" name="ValorDesconto"
                                                            id="inputValorDesconto"
                                                            value="<?= number_format($venda_caixa->valor_desconto, 2, ',', '.') ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label class="control-label" for="inputValorLiquido">Total
                                                        do Pedido</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$</span>
                                                        </div>
                                                        <input type="text" class="form-control text-teal"
                                                            id="inputValorLiquido" type="text" name="TotalPedido"
                                                            data-mask="#.##0,00" data-mask-reverse="true" value="<?php
                                                                if($venda_caixa->tipo_desconto == 1)
                                                                    echo number_format($venda_caixa->sub_total + $venda_caixa->valor_frete - $venda_caixa->valor_desconto, 2, ',', '.');
                                                                else{
                                                                    echo number_format($venda_caixa->sub_total + $venda_caixa->valor_frete - ($venda_caixa->sub_total * ($venda_caixa->valor_desconto / 100)), 2, ',', '.');
                                                                }
                                                            ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <h6>Formas de Pagamento</h6>
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-xs-12">
                                                    <button type="button" id="btnAdicionarFormaPagamento"
                                                        class="btn btn-outline-primary btn-sm"
                                                        <?php if($venda_caixa->status != 1) echo "disabled"; ?>><i
                                                            class="fas fa-plus-circle"></i>
                                                        Adicionar</button>
                                                    <button type="button" id="btnRemoverFormaPagamento"
                                                        class="btn btn-outline-danger btn-sm" id="btnExcluir"
                                                        <?php if($venda_caixa->status != 1) echo "disabled"; ?>><i
                                                            class="fas fa-minus-circle"></i>
                                                        Remover</button>
                                                </div>
                                            </div>
                                            <table class="table table-bordered table-hover table-reporte">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th scope="col">Forma de Pagamento</th>
                                                        <th scope="col" class="text-center">Valor</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="forma-pagamento">
                                                    <?php foreach($metodo_venda_caixa as $key_metodo_venda_caixa => $metodo_caixa) { ?>
                                                    <tr id="avista">
                                                        <td>
                                                            <select class="selectpicker show-tick form-control"
                                                                data-live-search="true" data-actions-box="true"
                                                                <?php if($venda_caixa->status != 1) echo "disabled"; ?>
                                                                name="codMetodoPagamento[]"
                                                                data-style="btn-input-primary">
                                                                <?php foreach($lista_metodo_pagamento as $key_metodo_pagamento => $metodo_pagamento) { ?>
                                                                <option
                                                                    value="<?= $metodo_pagamento->cod_metodo_pagamento ?>"
                                                                    <?php if($metodo_pagamento->cod_metodo_pagamento == $metodo_caixa->cod_metodo_pagamento) echo "selected"; ?>>
                                                                    <?= $metodo_pagamento->cod_metodo_pagamento ?> -
                                                                    <?= $metodo_pagamento->nome_metodo_pagamento ?>
                                                                </option>
                                                                <?php } ?>
                                                            </select>
                                                        </td>
                                                        <td class="text-center w-30">
                                                            <div class="input-group ">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">R$</span>
                                                                </div>
                                                                <input class="form-control text-center"
                                                                    id="inputValorForma<?= $key_metodo_venda_caixa + 1 ?>"
                                                                    name="valorFormaPagamento[]" type="text"
                                                                    data-mask="#.##0,00"
                                                                    <?php if($venda_caixa->status != 1) echo "readonly"; ?>
                                                                    data-mask-reverse="true"
                                                                    value="<?= number_format($metodo_caixa->valor_pagamento, 2, ',', '.') ?>">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card  mb-3">
                        <div class="card-body">
                            <a href="#" type="button" class="btn btn-outline-warning btn-block" id="btnImprimir"><i
                                    class="fas fa-print"></i> Imprimir Venda</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 pl-0">
                    <div class="card  mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-xs-12">
                                    <?php if ($this->session->flashdata('erro') <> ""){ ?>
                                    <div class="alert alert-danger alert-dismissible fade show" id="alert" role="alert">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <strong>Atenção!</strong> <?= $this->session->flashdata('erro') ?>
                                    </div>
                                    <?php } $this->session->set_flashdata('erro', '');  ?>
                                    <?php if ($this->session->flashdata('sucesso') <> ""){ ?>
                                    <div class="alert alert-success alert-dismissible fade show" id="alert"
                                        role="alert">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <strong>Muito bem!</strong>
                                        <?= $this->session->flashdata('sucesso', '') ?>
                                    </div>
                                    <?php } $this->session->set_flashdata('sucesso', ''); ?>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-xs-12">
                                                    <button type="button" class="btn btn-outline-danger btn-sm"
                                                        data-toggle="tooltip" data-placement="bottom"
                                                        id="btnExcluirProduto" disabled><i class="fas fa-trash-alt"></i>
                                                        Excluir</button>
                                                </div>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-hover table-reporte">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th scope="col" class="text-center"><i
                                                                    class="fa-solid fa-check"></i></th>
                                                            <th scope="col">Produto</th>
                                                            <th scope="col">Lote</th>
                                                            <th scope="col" class="text-right">Qtde</th>
                                                            <th scope="col" class="text-right">Preço unit</th>
                                                            <th scope="col" class="text-right">Sub total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="produto-caixa">
                                                        <?php foreach($produto_venda_caixa as $key_produto_caixa => $produto_caixa) { ?>
                                                        <tr>
                                                            <td class="align-middle">
                                                                <div class="checkbox text-center">
                                                                    <input type="checkbox" name="check_produto[]"
                                                                        <?php if($venda_caixa->status != 1) echo "disabled"; ?>
                                                                        value="<?= $produto_caixa->cod_produto ?>" />
                                                                    <input type="hidden" name="codProduto[]"
                                                                        value="<?= $produto_caixa->cod_produto ?>" />
                                                                </div>
                                                            </td>
                                                            <td class="align-middle"><?= $produto_caixa->cod_produto ?>
                                                                -
                                                                <?= $produto_caixa->nome_produto ?></td>
                                                            <td class="align-middle">
                                                                <input type="hidden" class="form-control"
                                                                    class="form-control" name="codLote[]"
                                                                    value="<?= $produto_caixa->cod_lote ?>">
                                                                <?= $produto_caixa->cod_lote ?>
                                                            </td>
                                                            <td class="text-right align-middle" width="90">
                                                                <input type="hidden" class="form-control text-center"
                                                                    class="form-control" name="quantProduto[]"
                                                                    id="inputSubTotal" type="text" name="SubTotal"
                                                                    data-mask="#.##0,000" data-mask-reverse="true"
                                                                    value="<?= $produto_caixa->quant_venda ?>">
                                                                <?= number_format($produto_caixa->quant_venda, 3, ',', '.') ?>
                                                                <?= $produto_caixa->cod_unidade_medida ?>
                                                            </td>
                                                            <td class="text-right align-middle" width="90">
                                                                <input type="hidden" class="form-control text-center"
                                                                    class="form-control" name="valorUnitProduto[]"
                                                                    id="inputSubTotal" type="text" name="SubTotal"
                                                                    data-mask="#.##0,00" data-mask-reverse="true"
                                                                    value="<?= $produto_caixa->valor_unit ?>">
                                                                R$
                                                                <?= number_format($produto_caixa->valor_unit, 2, ',', '.') ?>
                                                            </td>
                                                            <td class="text-right font-weight-bold align-middle"
                                                                width="90">
                                                                R$
                                                                <?= number_format($produto_caixa->valor_unit * $produto_caixa->quant_venda, 2, ',', '.') ?>
                                                            </td>
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="text-center text-muted" id="nenhumProduto">
                                                <p class="font-italic mt-3">Nenhum produto adicionado
                                                </p>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-7"></div>
                                                <div class="col-md-5">
                                                    <div class="card mb-3 mt-3 bg-light">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <table
                                                                    class="table table-borderless table-sm">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>Total em produtos</td>
                                                                            <td class="text-right"><strong
                                                                                    id="totalBruto">R$
                                                                                    <?= number_format($venda_caixa->sub_total, 2, ',', '.') ?></strong>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Frete</td>
                                                                            <td class="text-right" id="valorFrete">R$
                                                                                <?= number_format($venda_caixa->valor_frete, 2, ',', '.') ?>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Desconto</td>
                                                                            <td class="text-right" id="valorDesconto">R$
                                                                                <?php
                                                                                    if($venda_caixa->tipo_desconto == 1)
                                                                                        echo number_format($venda_caixa->valor_desconto, 2, ',', '.');
                                                                                    else{
                                                                                        echo number_format(round($venda_caixa->sub_total * ($venda_caixa->valor_desconto / 100), 2), 2, ',', '.');
                                                                                    }
                                                                                ?>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="card-footer">
                                                            <div class="row">
                                                                <table
                                                                    class="table table-borderless table-sm">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="text-left pt-0 text-dark">
                                                                                <strong>TOTAL DO PEDIDO</strong></td>
                                                                            <td class="text-right pt-0 text-teal">
                                                                                <strong id="valorLiquido">R$
                                                                                    <?php
                                                                                        if($venda_caixa->tipo_desconto == 1)
                                                                                            echo number_format(($venda_caixa->sub_total - $venda_caixa->valor_desconto) + $venda_caixa->valor_frete, 2, ',', '.');
                                                                                        else{
                                                                                            echo number_format(($venda_caixa->sub_total - round($venda_caixa->sub_total * ($venda_caixa->valor_desconto / 100), 2)) + $venda_caixa->valor_frete, 2, ',', '.');
                                                                                        }
                                                                                    ?>
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
                                        </div>
                                    </div>
                                    <hr class="mb-3">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-primary" name="Opcao" value="1"
                                                id="btnSalvaPedido"
                                                <?php if($venda_caixa->status != 1) echo "disabled"; ?>><i
                                                    class="fas fa-save"></i>
                                                Salvar</button>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row float-right">
                                                <div class="col-md-12">
                                                    <?php if($venda_caixa->status == 1) { ?>
                                                    <button type="submit" class="btn btn-teal" id="btnFinalizaPedido"
                                                        name="Opcao" value="2"
                                                        <?php if($venda_caixa->status != 1) echo "disabled"; ?>><i
                                                            class="fas fa-dollar-sign"></i>
                                                        Finalizar Venda</button>
                                                    <?php }else{ ?>
                                                    <button type="submit" class="btn btn-danger" id="btnFinalizaPedido"
                                                        name="Opcao" value="3"
                                                        <?php if($venda_caixa->c_stat == 100) echo "disabled"; ?>><i
                                                            class="fa-solid fa-lock-open"></i>
                                                        Reabrir Venda</button>
                                                    <?php } ?>
                                                    <a href="<?php echo base_url() ?>vendas/frente-caixa"
                                                        class="btn btn-secondary link-load">Cancelar</a>
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
        </form>
    </div>
</section>

<div class="modal fade" id="novo-cliente" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Novo Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action='novo-cliente' method='post' class="mb-0 needs-validation" novalidate>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputNomeCliente">Nome do Cliente <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="inputNomeCliente" name="NomeCliente"
                                value="<?= set_value('NomeCliente'); ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputRazaoSocial">Razão Social</label>
                            <input type="text" class="form-control" id="inputRazaoSocial" name="RazaoSocial"
                                value="<?= set_value('RazaoSocial'); ?>">
                        </div>
                    </div>
                    <hr>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label>Tipo Pessoa</label>
                            <div class="btn-group btn-block" data-toggle="buttons">
                                <label class="btn btn-outline-secondary">
                                    <input type="radio" id="radioJuridicaCliente" name="TipoPessoaCliente" value="1"
                                        <?php if(set_value('TipoPessoaCliente') == 1 || set_value('TipoPessoaCliente') == "") echo 'checked'; ?>>
                                    Jurídica
                                </label>
                                <label class="btn btn-outline-secondary">
                                    <input type="radio" id="radioFisicaCliente" name="TipoPessoaCliente" value="2"
                                        <?php if(set_value('TipoPessoaCliente') == 2) echo 'checked'; ?>> Física
                                </label>
                            </div>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="inputCPFCNPJCliente">CNPJ/CPF</label>
                            <div class="input-group">
                                <input type="text" class="form-control" class="form-control" id="inputCPFCNPJCliente"
                                    name="CnpjCpf" value="<?= set_value('CnpjCpfCliente'); ?>">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-info" type="button" id="btnConsultaCNPJ">Consultar
                                        CNPJ</button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="inputSegmento">Segmento do Cliente</label>
                            <select id="inputSegmento" name="Segmento" class="selectpicker show-tick form-control"
                                data-style="btn-input-primary" data-live-search="true" data-actions-box="true"
                                title="Informe o Segmento do Cliente">
                                <?php foreach($lista_segmento as $key_segmento => $segmento) { ?>
                                <option value="<?= $segmento->cod_segmento ?>"
                                    <?php if($segmento->cod_segmento == set_value('Segmento')) echo "selected"; ?>>
                                    <?= $segmento->nome_segmento ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputContribuinteICMS">Tipo de Contribuição ICMS</label>
                            <select id="inputContribuinteICMS" name="ContribuinteICMS" data-style="btn-input-primary"
                                class="selectpicker show-tick form-control" data-actions-box="true">
                                <option value="9" <?php if(set_value('ContribuinteICMS') == 9) echo "selected"; ?>>Não
                                    Contribuinte</option>
                                <option value="1" <?php if(set_value('ContribuinteICMS') == 1) echo "selected"; ?>>
                                    Contribuinte</option>
                                <option value="2" <?php if(set_value('ContribuinteICMS') == 2) echo "selected"; ?>>
                                    Contribuinte Isento</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputIE">Inscrição Estadual</label>
                            <input type="text" class="form-control" id="inputIE" name="IE"
                                value="<?= set_value('IE'); ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputIM">Inscrição Municipal</label>
                            <input type="text" class="form-control" id="inputIM" name="IM"
                                value="<?= set_value('IM'); ?>">
                        </div>
                    </div>
                    <hr>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputTelefoneFixo">Telefone Fixo</label>
                            <input type="text" class="form-control" id="inputTelefoneFixo" name="TelFixo"
                                value="<?= set_value('TelFixo'); ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputTelefoneCelular">Telefone Celular</label>
                            <input type="text" class="form-control" id="inputTelefoneCelular" name="TelCel"
                                value="<?= set_value('TelCel'); ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputEmail">E-mail</label>
                            <input type="text" class="form-control" id="inputEmail" name="Email"
                                value="<?= set_value('Email'); ?>">
                        </div>
                    </div>
                    <hr>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputCEP">CEP</label>
                            <input type="text" class="form-control" id="inputCEP" name="CEP"
                                value="<?= set_value('CEP'); ?>" data-mask="00000-000">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEndereco">Endereço</label>
                            <input type="text" class="form-control" id="inputEndereco" name="Endereco"
                                value="<?= set_value('Endereco'); ?>">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputNumero">Número</label>
                            <input type="text" class="form-control" id="inputNumero" name="Numero"
                                value="<?= set_value('Numero'); ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputComplemento">Complemento</label>
                            <input type="text" class="form-control" id="inputComplemento" name="Complemento"
                                value="<?= set_value('Complemento'); ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputBairro">Bairro</label>
                            <input type="text" class="form-control" id="inputBairro" name="Bairro"
                                value="<?= set_value('Bairro'); ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputCidade">Cidade</label>
                            <select class="form-control selectpicker show-tick" data-live-search="true"
                                title="Selecione a Cidade" id="inputCidade" name="Cidade"
                                data-style="btn-input-primary">
                                <?php foreach($lista_cidade as $key_cidade => $cidade) { ?>
                                <option value="<?= $cidade->id ?>"
                                    <?php if($cidade->id == set_value('Cidade')) echo "selected"; ?>>
                                    <?= $cidade->nome ?> - <?= $cidade->uf ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSalvarCliente" class="btn btn-primary" disabled>Salvar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="inserir-lote">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Inserir lote</h5>
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
                                    <div class="col-lg-12 col-md-12 col-xs-12">                                        
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="inputLote">Lote <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <select id="inputLote" class="selectpicker show-tick form-control"
                                                            data-live-search="true" data-actions-box="true"
                                                            data-style="btn-input-primary" name="CodLote" required>
                                                    </select>
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
            <div class="modal-footer">
                <button type="submit" id="btnSalvarLote" class="btn btn-primary"><i class="fas fa-save"></i>
                    Salvar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<script>
$("#radioJuridica").change(function() {
    $('#inputCPFCNPJ').mask('00.000.000/0000-00', {
        reverse: true
    });
});


$("#radioFisica").change(function() {
    $('#inputCPFCNPJ').mask('000.000.000-00', {
        reverse: true
    });
});

$("[name='check_produto[]']").click(function() {
    var cont = $("[name='check_produto[]']:checked").length;
    $("#btnExcluirProduto").prop("disabled", cont ? false : true);
});

$('#nenhumProduto').hide();

$(function() {
    $.applyDataMask();
    $("#inputCodigoBarras").focus();
});

function validaAdicProduto() {

    var quantProd = parseFloat(jQuery('#inputQuant').val() != '' ? (jQuery('#inputQuant')
        .val().split('.').join('')).replace(',', '.') : 0);
    var valorUnit = parseFloat(jQuery('#inputValorUnitario').val() != '' ? (jQuery('#inputValorUnitario')
        .val().split('.').join('')).replace(',', '.') : 0);

    if (quantProd > 0 && valorUnit > 0) {
        $("#btnAdicionarProduto").prop("disabled", false);
    } else {
        $("#btnAdicionarProduto").prop("disabled", true);
    }
}

$("#inputQuant").on('keyup', function() {

    validaAdicProduto();

});

$("#inputValorUnitario").on('keyup', function() {

    validaAdicProduto();

});


function validaImprimePedido() {

    if ($('#produto-caixa tr').length != 0) {
        $("#btnImprimir").prop("disabled", false);
    } else {
        $("#btnImprimir").prop("disabled", true);
    }

}

function validaSalvarFinalizarPedido() {

    var totalLiquido = parseFloat(jQuery('#inputValorLiquido').val() != '' ? (jQuery('#inputValorLiquido')
        .val().split('.').join('')).replace(',', '.') : 0);

    totalLiquido = round(totalLiquido, 2);

    var totalPedido = 0
    for (let i = 1; i <= $('#forma-pagamento tr').length; i++) {

        var valorParcela = parseFloat(jQuery('#inputValorForma' + i).val() != '' ? (jQuery('#inputValorForma' + i)
            .val().split('.').join('')).replace(',', '.') : 0);

        totalPedido = round(totalPedido + valorParcela, 2);

    }

    totalPedido = round(totalPedido, 2);

    if (totalLiquido > 0 && totalPedido == totalLiquido) {
        $("#btnFinalizaPedido").prop("disabled", false);
        $("#btnSalvaPedido").prop("disabled", false);
    } else {
        $("#btnFinalizaPedido").prop("disabled", true);
        $("#btnSalvaPedido").prop("disabled", true);
    }
}

$('#inputCodigoBarras').keypress(function(event) {

    if (event.keyCode == 13) {

        var baseurl = "<?php echo base_url(); ?>";
        var barras = $("#inputCodigoBarras").val();
        var codProduto = 0;
        var nomeProduto = "";

        $.post(baseurl + "ajax/busca-produto-cod-barras", {
            barras: barras
        }, function(valor) {
            if (valor != "") {

                var aValor = valor.split('|');
                console.log(valor);


                codProduto = aValor[0];
                nomeProduto = aValor[1];
                tipoControle = aValor[3];
                $("#inputValorUnitario").val(aValor[2]);

                $("#inputProdutoVenda").selectpicker('val', $('option:contains("' + codProduto + ' - ' +
                    nomeProduto + '")').val());

                var quantProd = parseFloat(jQuery('#inputQuant').val() != '' ? (jQuery('#inputQuant')
                    .val().split('.').join('')).replace(',', '.') : 0);

                if (quantProd == 0) {
                    $("#inputQuant").val(1);
                }

                $("#inputTipoControle").val(tipoControle);

                $("#btnAdicionarProduto").click();
            }
            
        });
    }
});



$("#inputProdutoVenda").change(function() {

    var baseurl = "<?php echo base_url(); ?>";

    var produto = $("#inputProdutoVenda").val();

    $.post(baseurl + "ajax/busca-produto", {
        produto: produto
    }, function(valor) {
        var aValor = valor.split('|');
        $("#inputUnidadeMedida").text(aValor[0]);
        $("#inputValorUnitario").val(aValor[3]);
        $("#inputTipoControle").val(aValor[5]);

        var quantProd = parseFloat(jQuery('#inputQuant').val() != '' ? (jQuery('#inputQuant')
        .val().split('.').join('')).replace(',', '.') : 0);

        if (quantProd == 0) {

            $("#inputQuant").val(1);

        }

        validaAdicProduto();
    });

    calcTotalVenda();

});

$("#inputCliente").change(function() {

    var baseurl = "<?php echo base_url(); ?>";

    var cliente = $("#inputCliente").val();

    $.post(baseurl + "ajax/busca-cliente", {
        cliente: cliente
    }, function(valor) {
        var aValor = valor.split('|');
        $("#inputCPFCNPJ").val(aValor[1]);

        if (aValor[0] == 1) {
            $("#radioJuridica").prop("checked", true).click();
            $('#inputCPFCNPJ').mask('00.000.000/0000-00', {
                reverse: true
            });
        } else {
            $("#radioFisica").prop("checked", true).click();
            $('#inputCPFCNPJ').mask('000.000.000-00', {
                reverse: true
            });
        }
    });

});

$("#btnAdicionarProduto").click(function() {
    var tipoProduto = $('#inputTipoControle').val();

    if(tipoProduto == 2){
        var baseurl = "<?php echo base_url(); ?>";

        var produto = $('#inputProdutoVenda').val();

        $.post(baseurl + "ajax/busca-lote", {
            produto: produto
        }, function(data) {
            
            $("#inputLote").html(data);
            $("#inputLote").removeAttr('disabled');
            $('#inputLote').selectpicker('refresh');
        });  
        $('#inserir-lote').modal('show');
    }else{
        adicionaProduto();        
    }    
});

$("#btnSalvarLote").click(function() {

    $('#inserir-lote').modal('hide');    
    adicionaProduto();

});

function adicionaProduto() {

    $('#nenhumProduto').hide();

    var codProduto = $('#inputProdutoVenda').val();
    var codLote = "";
    if($('#inputLote').val() != "" && $('#inputLote').val() != null)
        codLote = $('#inputLote').val();
    var nomeProduto = $('#inputProdutoVenda option:selected').text();
    var unidadeMedida = $('#inputUnidadeMedida').text();

    var quantProd = parseFloat(jQuery('#inputQuant').val() != '' ? (jQuery('#inputQuant')
        .val().split('.').join('')).replace(',', '.') : 0);

    var valorUnit = parseFloat(jQuery('#inputValorUnitario').val() != '' ? (jQuery('#inputValorUnitario')
        .val().split('.').join('')).replace(',', '.') : 0);

    var valorTotal = quantProd * valorUnit;

    var newRow = $("<tr>");
    var cols = "";

    cols += '<td class="align-middle">';
    cols += '<div class="checkbox text-center">' +
        '<input type="checkbox" name="check_produto[]"' +
        'value="' + codProduto + '" />' +
        '<input type="hidden" name="codProduto[]"' +
        'value="' + codProduto + '" />' +
        '</div>'
    cols += '</td>';

    // Produto inserido
    cols += '<td>';
    cols += nomeProduto;
    cols += '</td>';

    // Lote do Produto
    cols += '<td>';
    cols += '<input type="hidden" name="codLote[]"' +
                  'value="' + codLote + '" />';
    cols += codLote;
    cols += '</td>';

    // Quantidade
    cols += '<td class="text-right align-middle" width="90">';
    cols += '<input type="hidden" class="form-control text-center" class="form-control" name="quantProduto[]"' +
        'id="inputSubTotal" type="text" name="quantProduto[]" data-mask="#.##0,000"' +
        'data-mask-reverse="true" value="' +
        quantProd.toLocaleString("pt-BR", {
            style: "decimal",
            minimumFractionDigits: 3,
            maximumFractionDigits: 3
        }) +
        '">';
    cols += quantProd.toLocaleString("pt-BR", {
        style: "decimal",
        minimumFractionDigits: 3,
        maximumFractionDigits: 3
    }) + ' ' + unidadeMedida;
    cols += '</td>';

    // Valor Unitário
    cols += '<td class="text-right align-middle" width="90">';
    cols +=
        '<input type="hidden" class="form-control text-center" class="form-control" name="valorUnitProduto[]"' +
        'id="inputSubTotal" type="text" name="valorUnitProduto[]" data-mask="#.##0,00"' +
        'data-mask-reverse="true" value="' +
        valorUnit.toLocaleString("pt-BR", {
            style: "decimal",
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        }) +
        '">';
    cols += 'R$ ' + valorUnit.toLocaleString("pt-BR", {
        style: "decimal",
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    });
    cols += '</td>';

    // Valor Total
    cols += '<td class="text-right font-weight-bold align-middle" width="90">';
    cols += 'R$ ' + valorTotal.toLocaleString("pt-BR", {
        style: "decimal",
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    });
    cols += '</td>';

    newRow.append(cols);
    $("#produto-caixa").append(newRow);

    $.applyDataMask();

    calcTotalVenda();

    $("[name='check_produto[]']").click(function() {
        var cont = $("[name='check_produto[]']:checked").length;
        $("#btnExcluirProduto").prop("disabled", cont ? false : true);
    });

    $('#inputLote').val(null);
    $("#inputCodigoBarras").val("");
    $("#inputCodigoBarras").focus();

    return;

}

$("#btnExcluirProduto").click(function() {

    var $selecionados = document.querySelectorAll(
        '#produto-caixa [type="checkbox"]:checked') // aqui seleciona todos os elementos checados
    for (let i = 0; i < $selecionados.length; i++) {
        $selecionados[i].parentNode.parentNode.parentNode.remove()
    }

    if ($('#produto-caixa').children().length <= 0) {
        $('#nenhumProduto').show();
        $("#btnExcluirProduto").prop("disabled", true);
    }

    calcTotalVenda();

});

$("#btnAdicionarFormaPagamento").click(function() {

    var newRow = $("<tr>");
    var cols = "";

    var $pagamento = document.querySelectorAll('#forma-pagamento tr')
    var i = $pagamento.length + 1;

    // Forma de Pagamento
    cols += '<td>';
    cols += '<select class="selectpicker show-tick form-control" ' +
        'data-live-search="true" data-actions-box="true" ' +
        'name="codMetodoPagamento[]" ' +
        'data-style="btn-input-primary"> ' +
        <?php foreach($lista_metodo_pagamento as $key_metodo_pagamento => $metodo_pagamento) { ?> '<option value="<?= $metodo_pagamento->cod_metodo_pagamento ?>">' +
        '<?= $metodo_pagamento->cod_metodo_pagamento ?> - <?= $metodo_pagamento->nome_metodo_pagamento ?>' +
        '</option> ' +
        <?php } ?> '</select>';
    cols += '</td>';

    // Valor Forma
    cols += '<td class="text-center w-30">';
    cols += '<div class="input-group">' +
        '<div class="input-group-prepend">' +
        '<span class="input-group-text">R$</span>' +
        '</div>' +
        '<input class="form-control text-center" id="inputValorForma' + i + '" ' +
        'name="valorFormaPagamento[]" type="text" data-mask="#.##0,00"' +
        'data-mask-reverse="true" value="0,00">' +
        '</div>';
    cols += '</td>';

    newRow.append(cols);
    $("#forma-pagamento").append(newRow);

    $('.selectpicker').selectpicker('refresh');

    $.applyDataMask();

    calcTotalVenda();

});

$("#btnRemoverFormaPagamento").on('click', function() {
    $("#forma-pagamento tr:last").remove();
    validaSalvarFinalizarPedido();
});

function calcTotalVenda() {

    var totalBruto = 0;
    $('#produto-caixa tr').each(function() {
        var valProd = $(this).find("td").eq(5).html();
        subTotal = parseFloat($(this).find("td").eq(5).html() != '' ? ($(this).find("td").eq(5).html().split(
            '.').join('')).replace(',', '.').replace('R$', '') : 0);
        totalBruto = totalBruto + subTotal;
    });

    $('#totalBruto').text('R$ ' + totalBruto.toLocaleString("pt-BR", {
        style: "decimal",
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    }));



    $('#inputSubTotal').val(totalBruto.toLocaleString("pt-BR", {
        style: "decimal",
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    }));

    calcDesconto();

};

$("#inputTipoDesconto").change(function() {

    calcDesconto();

});

$("#inputValorDesconto").on('keyup', function() {

    calcDesconto();

});

$("#inputValorFrete").on('keyup', function() {

    calcDesconto();

});

function calcDesconto() {

    var valBruto = parseFloat($('#inputSubTotal').val() != '' ? ($('#inputSubTotal')
        .val().split('.').join('')).replace(',', '.') : 0);

    var valDesconto = parseFloat($('#inputValorDesconto').val() != '' ? ($('#inputValorDesconto')
        .val().split('.').join('')).replace(',', '.') : 0);

    var valFrete = parseFloat($('#inputValorFrete').val() != '' ? ($('#inputValorFrete')
        .val().split('.').join('')).replace(',', '.') : 0);

    var totalLiquido = 0;
    var totalDesconto = 0;
    if ($('#inputTipoDesconto').val() == 1) {
        totalLiquido = valBruto - valDesconto;
    } else {
        totalLiquido = round(valBruto - (valBruto * (valDesconto / 100)), 2);
    }
    totalDesconto = valBruto - totalLiquido;
    totalLiquido = totalLiquido + valFrete;
    totalFrete = valFrete;

    $('#inputValorLiquido').val(totalLiquido.toLocaleString("pt-BR", {
        style: "decimal",
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    }));

    $('#valorFrete').text('R$ ' + totalFrete.toLocaleString("pt-BR", {
        style: "decimal",
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    }));

    $('#valorDesconto').text('R$ ' + totalDesconto.toLocaleString("pt-BR", {
        style: "decimal",
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    }));

    $('#valorLiquido').text('R$ ' + totalLiquido.toLocaleString("pt-BR", {
        style: "decimal",
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    }));

    var valorForma = 0;
    var acumulado = 0;
    var $pagamento = document.querySelectorAll('#forma-pagamento tr')
    for (let i = 1; i <= $pagamento.length; i++) {

        valorForma = round((totalLiquido / $pagamento.length), 2);
        acumulado = acumulado + valorForma;

        if (i == valorForma && acumulado != totalLiquido) {
            valorForma = valorForma + (totalLiquido - acumulado);
        }

        $('#inputValorForma' + i).val(
            valorForma.toLocaleString("pt-BR", {
                style: "decimal",
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            }));

    }

    validaImprimePedido();
    validaSalvarFinalizarPedido();

    for (let i = 1; i <= $('#forma-pagamento tr').length; i++) {
        $("#inputValorForma" + i).on('keyup', function() {

            validaSalvarFinalizarPedido();

        });
    }

    for (let i = 1; i <= $('#produto-caixa tr').length; i++) {
        $("#inputQuant" + i).on('keyup', function() {

            var quantProd = parseFloat(jQuery('#inputQuant').val() != '' ? (jQuery('#inputQuant')
                .val().split('.').join('')).replace(',', '.') : 0);

            var valorUnit = parseFloat(jQuery('#inputValorUnitario').val() != '' ? (jQuery(
                    '#inputValorUnitario')
                .val().split('.').join('')).replace(',', '.') : 0);



        });

        $("#inputQuant" + i).on('keyup', function() {

            validaSalvarFinalizarPedido();

        });
    }
}

$(function() {
    //evnto que deve carregar a janela a ser impressa 
    $('#btnImprimir').click(function() {

        var iFrame = document.createElement("iframe");
        iFrame.addEventListener("load", function() {
            iFrame.contentWindow.focus();
            iFrame.contentWindow.print();
            window.setTimeout(function() {
                document.body.removeChild(iFrame);
            }, 0);
        });
        iFrame.style.display = "none";
        iFrame.src =
            "<?= base_url("vendas/imprimir-venda-frente-caixa/{$venda_caixa->num_venda_caixa}") ?>";
        document.body.appendChild(iFrame);
    });
});

$("#btnSalvarCliente").click(function() {

    var baseurl = "<?php echo base_url(); ?>";

    var nomeCliente = $("#inputNomeCliente").val();
    var razaoSocial = $("#inputRazaoSocial").val();

    if ($("#radioJuridicaCliente").is(":checked") == true)
        var tipoPessoa = 1;
    if ($("#radioFisicaCliente").is(":checked") == true)
        var tipoPessoa = 2;

    var segmento = $("#inputSegmento").val();
    var contribuinteICMS = $("#inputContribuinteICMS").val();
    var cpfCnpj = $("#inputCPFCNPJCliente").val();
    var inscEstadual = $("#inputIE").val();
    var inscMunicipal = $("#inputIM").val();
    var telFixo = $("#inputTelefoneFixo").val();
    var telCel = $("#inputTelefoneCelular").val();
    var eMail = $("#inputEmail").val();
    var cep = $("#inputCEP").val();
    var endereco = $("#inputEndereco").val();
    var numero = $("#inputNumero").val();
    var complemento = $("#inputComplemento").val();
    var bairro = $("#inputBairro").val();
    var cidade = $("#inputCidade").val();

    $.post(baseurl + "ajax/inserir-cliente", {
        nomeCliente: nomeCliente,
        razaoSocial: razaoSocial,
        tipoPessoa: tipoPessoa,
        segmento: segmento,
        contribuinteICMS: contribuinteICMS,
        cpfCnpj: cpfCnpj,
        inscEstadual: inscEstadual,
        inscMunicipal: inscMunicipal,
        telFixo: telFixo,
        telCel: telCel,
        eMail: eMail,
        cep: cep,
        endereco: endereco,
        numero: numero,
        complemento: complemento,
        bairro: bairro,
        cidade: cidade
    }, function(data) {
        $('#novo-cliente').modal('hide');

        $("#inputCliente").html(data);
        $("#inputCliente").removeAttr('disabled');
        $('#inputCliente').selectpicker('refresh');

        $("#inputCliente").change();
    });
});

$("#inputCEP").blur(function() {
    bucaCEP();
});

$("#inputNomeCliente").on('keyup', function() {

    if ($("#inputNomeCliente").val() != "")
        $("#btnSalvarCliente").prop("disabled", false);
    else
        $("#btnSalvarCliente").prop("disabled", true);

});

function bucaCEP() {
    var cep = $("#inputCEP").val();
    var link = "https://ws.apicep.com/cep/" + cep + ".json";

    $.ajax({
        url: link,
        type: 'GET',
        success: function(data) {
            $("#inputEndereco").val(data.address);
            $("#inputBairro").val(data.district);
            $("#inputCidade").selectpicker('val', $('option:contains("' + data.city + ' - ' + data.state +
                '")').val());
        }
    })
}

$("#btnConsultaCNPJ").click(function() {

    var cnpj = $("#inputCPFCNPJ").val().replaceAll(".", "").replaceAll("/", "").replaceAll("-", "");
    var link = "https://www.receitaws.com.br/v1/cnpj/" + cnpj;

    $.ajax({
        url: link,
        type: 'GET',
        dataType: 'jsonp',
        headers: {
            'Content-Type': 'application/json',
            'Access-Control-Allow-Origin': 'http://localhost',
            "Authorization": "Bearer  af60c3794c78c9ec052a6e91ebb68c85259388f9131e0f8ae729e7efca6ec51e",
        },
        success: function(data) {
            $("#inputNomeCliente").val(data.fantasia);
            $("#inputRazaoSocial").val(data.nome);
            $("#inputTelefoneFixo").val(data.telefone);
            $("#inputCEP").val(data.cep.replaceAll(".", ""));
            $("#inputNumero").val(data.numero);
            $("#inputComplemento").val(data.complemento);
            bucaCEP();
            console.log(data);
        }
    })
});

$('#inputCPFCNPJCliente').mask('00.000.000/0000-00', {
    reverse: true
});

$('#inputTelefoneFixo').mask('(00) 0000-0000');

$('#inputTelefoneCelular').mask('(00) 0 0000-0000');

$("#radioJuridicaCliente").change(function() {
    $('#inputCPFCNPJCliente').mask('00.000.000/0000-00', {
        reverse: true
    });

    $("#btnConsultaCNPJ").prop("disabled", false);
});

$("#radioFisicaCliente").change(function() {
    $('#inputCPFCNPJCliente').mask('000.000.000-00', {
        reverse: true
    });

    $("#btnConsultaCNPJ").prop("disabled", true);
});

$("form").keypress(function(e) {
    if (e.keyCode == 13) {
        e.preventDefault();
        return false;
    }
})

const round = (num, places) => {
    return +(parseFloat(num).toFixed(places));
}
</script>

<?php $this->load->view('gerais/footer'); ?>