<?php $this->load->view('gerais/header' , $menu); ?>
<?php $this->load->view('gerais/menu', $menu); ?>

<section>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('visao-geral') ?>">Visão Geral</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('fiscal') ?>">Fiscal</a></li>
            <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>fiscal/nota-fiscal">Nota Fiscal</a></li>
            <li class="breadcrumb-item active">Editar Nota Fiscal</li>
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
                                    action="<?= base_url("fiscal/nota-fiscal/editar-nota-fiscal/{$nota_fiscal->cod_nota_fiscal}") ?>"
                                    method="POST" id="NotaFistal">
                                    <div class="form-row">
                                        <div class="form-group col-md-8">
                                            <label for="inputCliente">Cliente <span class="text-danger">*</span></label>
                                            <select id="inputCliente" class="selectpicker show-tick form-control"
                                                data-live-search="true" data-actions-box="true"
                                                <?php if($nota_fiscal->status != 1) echo "disabled"; ?>
                                                title="Selecione um Cliente" data-style="btn-input-primary"
                                                name="CodCliente" required>
                                                <?php foreach($lista_cliente as $key_cliente => $cliente) { ?>
                                                <option value="<?= $cliente->cod_cliente ?>"
                                                    <?php if($cliente->cod_cliente == $nota_fiscal->cod_cliente) echo "selected"; ?>>
                                                    <?= $cliente->cod_cliente ?> -
                                                    <?= $cliente->nome_cliente ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputDateEmissao">Data de Emissão <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="inputDateEmissao"
                                                name="DataEmissao"
                                                <?php if($nota_fiscal->status != 1) echo "readonly"; ?>
                                                value="<?= str_replace('-', '/', date("d-m-Y", strtotime($nota_fiscal->data_emissao))) ?>"
                                                required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-8">
                                            <label for="inputNaturezaOperacao">Natureza de Operação <span
                                                    class="text-danger">*</span></label>
                                            <select id="inputNaturezaOperacao"
                                                class="selectpicker show-tick form-control"
                                                <?php if($nota_fiscal->status != 1) echo "disabled"; ?>
                                                data-live-search="true" data-actions-box="true"
                                                title="Selecione uma Natureza de Operação"
                                                data-style="btn-input-primary" name="CodNatureza" required>
                                                <?php foreach ($naturezas as $key => $row) { ?>
                                                <option value="<?php echo $row->id ?>"
                                                    <?php if ($row->id == $nota_fiscal->id_natureza_operacao) echo "selected"; ?>>
                                                    <?php echo $row->descricao ?> -
                                                    <?php echo $row->nome ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="indicadorFinal">NF Referência</label>
                                            <input class="form-control" id="inputPedidoCliente" type="text"
                                                name="NFReferencia" <?php if($nota_fiscal->status != 1) echo "readonly"; ?>
                                                value="<?= $nota_fiscal->nf_referencia ?>" >
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="indicadorFinal">Pedido Cliente (xPed)</label>
                                            <input class="form-control" id="inputPedidoCliente" type="text"
                                                name="PedidoCliente" <?php if($nota_fiscal->status != 1) echo "readonly"; ?>
                                                value="<?= $nota_fiscal->x_ped ?>">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="indicadorFinal">Consumidor</label>
                                            <select class="form-control selectpicker show-tick"
                                                data-style="btn-input-primary" id="indicadorFinal"
                                                <?php if($nota_fiscal->status != 1) echo "disabled"; ?>
                                                name="indicadorFinal">
                                                <?php foreach ($indicadorFinal as $key => $name) { ?>
                                                <option value="<?php echo $key ?>"
                                                    <?php if ($key == $nota_fiscal->indicador_final) echo "selected"; ?>>
                                                    <?php echo $name ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="indicadorPresencial">Indicador de Presença</label>
                                            <select class="form-control selectpicker show-tick"
                                                data-style="btn-input-primary" id="indicadorPresencial"
                                                <?php if($nota_fiscal->status != 1) echo "disabled"; ?>
                                                name="indicadorPresencial">
                                                <?php foreach ($indicadorPresencial as $key => $name) { ?>
                                                <option value="<?php echo $key ?>"
                                                    <?php if($key == $nota_fiscal->indicador_presenca) echo "selected"; ?>>
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
                                                    data-mask-reverse="true"
                                                    <?php if($nota_fiscal->status != 1) echo "readonly"; ?>
                                                    name="Seguro" id="inputSeguro"
                                                    value="<?= number_format($nota_fiscal->valor_seguro, 2, ',', '.') ?>">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Outras Despesas</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">R$</span>
                                                </div>
                                                <input type="text" class="form-control" data-mask="#.##0,00"
                                                    data-mask-reverse="true" id="inputOutrasDespesas"
                                                    <?php if($nota_fiscal->status != 1) echo "readonly"; ?>
                                                    name="OutrasDespesas"
                                                    value="<?= number_format($nota_fiscal->outras_despesas, 2, ',', '.') ?>">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputTipoDesconto">Desconto</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">R$</span>
                                                </div>
                                                <input type="text" class="form-control" data-mask="#.##0,00"
                                                    data-mask-reverse="true"
                                                    <?php if($nota_fiscal->status != 1) echo "readonly"; ?>
                                                    name="Desconto" id="inputValorDesconto"
                                                    value="<?= number_format($nota_fiscal->valor_desconto, 2, ',', '.') ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-8">
                                            <label for="inputTransportador">Transportador</label>
                                            <select id="inputTransportador" class="selectpicker show-tick form-control"
                                                data-live-search="true" data-actions-box="true"
                                                title="Selecione um Transportador" data-style="btn-input-primary"
                                                <?php if($nota_fiscal->status != 1) echo "disabled"; ?>
                                                name="CodTransportador">
                                                <?php foreach($lista_transportador as $key_transportador => $transportador) { ?>
                                                <option value="<?= $transportador->cod_transportador ?>"
                                                    <?php if($transportador->cod_transportador == $nota_fiscal->cod_transportador) echo "selected"; ?>>
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
                                                    <?php if($nota_fiscal->status != 1) echo "disabled"; ?>
                                                    name="TipoFrete">
                                                    <option value="1"
                                                        <?php if($nota_fiscal->tipo_frete == 1) echo "selected"; ?>>CIF
                                                        R$</option>
                                                    <option value="2"
                                                        <?php if($nota_fiscal->tipo_frete == 2) echo "selected"; ?>>FOB
                                                        R$</option>
                                                </select>
                                                <input type="text" class="form-control" data-mask="#.##0,00"
                                                    data-mask-reverse="true" name="Frete" id="inputValorFrete"
                                                    <?php if($nota_fiscal->status != 1) echo "readonly"; ?>
                                                    value="<?= number_format($nota_fiscal->valor_frete, 2, ',', '.') ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputQuantidadeEmb">Quantidade</label>
                                                    <input type="text" class="form-control" id="inputQuantidadeEmb"
                                                        <?php if($nota_fiscal->status != 1) echo "readonly"; ?>
                                                        value="<?= $nota_fiscal->quant_volume ?>" name="Quantidade">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputEspecie">Espécie</label>
                                                    <input type="text" class="form-control" id="inputEspecie"
                                                        <?php if($nota_fiscal->status != 1) echo "readonly"; ?>
                                                        value="<?= $nota_fiscal->especie_volume ?>" name="Especie">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputMarca">Marca</label>
                                                    <input type="text" class="form-control" id="inputMarca"
                                                        <?php if($nota_fiscal->status != 1) echo "readonly"; ?>
                                                        value="<?= $nota_fiscal->marca ?>" name="Marca">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputCodAntt">Código ANTT</label>
                                                    <input type="text" class="form-control" id="inputCodAntt"
                                                        <?php if($nota_fiscal->status != 1) echo "readonly"; ?>
                                                        value="<?= $nota_fiscal->cod_antt ?>" name="CodAntt">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputPlacaVeiculo">Placa Veículo</label>
                                                    <input type="text" class="form-control" id="inputPlacaVeiculo"
                                                        <?php if($nota_fiscal->status != 1) echo "readonly"; ?>
                                                        value="<?= $nota_fiscal->placa_veiculo ?>" name="PlacaVeiculo">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputUFVeiculo">UF Veículo</label>
                                                    <select class="form-control selectpicker show-tick"
                                                        data-live-search="true" title="Selecione a UF"
                                                        <?php if($nota_fiscal->status != 1) echo "disabled"; ?>
                                                        data-style="btn-input-primary" id="inputUFVeiculo"
                                                        name="UFVeiculo">
                                                        <?php foreach($estado as $key_estado => $estado) { ?>
                                                        <option value="<?= $estado->uf ?>"
                                                            <?php if($estado->uf == $nota_fiscal->uf_veiculo) echo "selected"; ?>>
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
                                                <?php if($nota_fiscal->status != 1) echo "readonly"; ?>
                                                class="form-control"><?= $nota_fiscal->inf_complementar ?></textarea>
                                        </div>
                                    </div>
                                    <?php if($nota_fiscal->status != 1 && $nota_fiscal->c_stat >= 200) { ?>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="NFRejeitada">Nota Fiscal Rejeitada</label>
                                            <textarea name="NFRejeitada" readonly
                                                class="form-control text-danger"><?php echo "(" . $nota_fiscal->c_stat . ") " . $nota_fiscal->x_motivo ?></textarea>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </form>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h6>Lista de Produtos</h6>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-xs-12">
                                                <button data-toggle="modal" data-target="#inserir-produto" type="button"
                                                    <?php if($nota_fiscal->status != 1) echo "disabled"; ?>
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
                                            action="<?= base_url("fiscal/nota-fiscal/excluir-produto-nf/{$nota_fiscal->cod_nota_fiscal}") ?>"
                                            method="POST" id="DeleteProdutoVenda">
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
                                                    <?php 
                                                        $total = 0; 
                                                        foreach($lista_produto_nf as $key_produto => $produto) {  
                                                            $total = $total + ($produto->valor_unitario * $produto->quantidade);?>
                                                    <tr>
                                                        <td>
                                                            <div class="checkbox text-center">
                                                                <input name="excluir_todos[]" type="checkbox"
                                                                    <?php if($nota_fiscal->status != 1) echo "disabled"; ?>
                                                                    value="<?= $produto->seq_produto_nf ?>"
                                                                    <?php if(0 != 0) echo "disabled"; ?> />
                                                            </div>
                                                        </td>
                                                        <td scope="row"><a href="#" class="text-dark"
                                                                data-toggle="modal"
                                                                data-target="#editar-produto<?= $produto->seq_produto_nf ?>">
                                                                <?= $produto->cod_produto ?> -
                                                                <?= $produto->nome_produto ?>
                                                            </a>
                                                        </td>
                                                        <td class="text-right text-info">
                                                            <?= number_format($produto->quantidade, 3, ',', '.') ?>
                                                            <?= $produto->cod_unidade_medida ?></td>
                                                        <td class="text-right">R$
                                                            <?= number_format($produto->valor_unitario, 2, ',', '.') ?>
                                                        </td>
                                                        <td class="text-right text-teal">R$
                                                            <?= number_format($produto->quantidade * $produto->valor_unitario, 2, ',', '.') ?>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                            <?php if ($lista_produto_nf == false) { ?>
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
                                        <button type="submit" form="NotaFistal" class="btn btn-primary"
                                            <?php if($nota_fiscal->status != 1) echo "disabled"; ?> name="Opcao"
                                            value="salvar"><i class="fas fa-save"></i>
                                            Salvar</button>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row float-right">
                                            <div class="col-md-12">

                                                <?php if($nota_fiscal->status == 1) { ?>
                                                <a href="<?php echo base_url() ?>fiscal/nota-fiscal/calcular-nota-fiscal/<?= $nota_fiscal->cod_nota_fiscal ?>"
                                                    class="btn btn-info link-load"><i
                                                        class="fa-solid fa-calculator"></i> Calcular NF</a>
                                                <?php } ?>
                                                <?php if($nota_fiscal->status == 2) { ?>
                                                <a href="<?php echo base_url() ?>fiscal/nota-fiscal/descalcular-nota-fiscal/<?= $nota_fiscal->cod_nota_fiscal ?>"
                                                    class="btn btn-warning link-load"><i
                                                        class="fa-solid fa-rotate-left"></i> Desalcular NF</a>
                                                <?php } ?>
                                                <?php if($nota_fiscal->status == 2) { ?>
                                                <a href="<?php echo base_url() ?>fiscal/nota-fiscal/emitir-nfe/<?= $nota_fiscal->cod_nota_fiscal ?>"
                                                    class="btn btn-teal link-load"><i class="fa-solid fa-check"></i>
                                                    Emitir NF</a>
                                                <?php } ?>
                                                <?php if($nota_fiscal->status == 3) { ?>
                                                <a href="#" class="btn btn-danger" data-toggle='modal'
                                                    data-target='#cancelar-nfe'>
                                                    <i class="fas fa-trash"></i> Cancelar NF
                                                </a>
                                                <?php } ?>
                                                <?php if($nota_fiscal->status == 3) { ?>
                                                <a href="#" class="btn btn-warning" data-toggle='modal'
                                                    data-target='#carta-correcao-nfe'>
                                                    <i class="fa-solid fa-eraser"></i> Emitir Carta de Correção
                                                </a>
                                                <?php } ?>
                                                <a href="<?php echo base_url() ?>fiscal/nota-fiscal"
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
                                            <td class="text-right <?php if($total > 0) echo "text-teal"; ?>"
                                                id="idTotoProduto">
                                                R$ <span
                                                    id="idVelorProdutos"><?= number_format($total, 2, ',', '.') ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">
                                                Valor de frete <span
                                                    id="idTipoFrete"><?php if($nota_fiscal->tipo_frete == 1) echo "CIF"; else echo "FOB"; ?></span>
                                            </td>
                                            <td class="text-right <?php if($nota_fiscal->valor_frete > 0) echo "text-teal"; ?>"
                                                id="idValorFrete">
                                                R$ <span
                                                    id="ValorFrete"><?= number_format($nota_fiscal->valor_frete, 2, ',', '.') ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">
                                                Valor de seguro
                                            </td>
                                            <td class="text-right <?php if($nota_fiscal->valor_seguro > 0) echo "text-teal"; ?>"
                                                id="idValorSeguro">
                                                R$ <span
                                                    id="ValorSeguro"><?= number_format($nota_fiscal->valor_seguro, 2, ',', '.') ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">
                                                Outras despesas
                                            </td>
                                            <td class="text-right <?php if($nota_fiscal->outras_despesas > 0) echo "text-teal"; ?>"
                                                id="idOutrasDespesas">
                                                R$ <span
                                                    id="OutrasDespesas"><?= number_format($nota_fiscal->outras_despesas, 2, ',', '.') ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">
                                                Desconto
                                            </td>
                                            <td class="text-right <?php if($nota_fiscal->valor_desconto > 0) echo "text-danger"; ?>"
                                                id="idValorDesconto">
                                                R$ <span
                                                    id="ValorDesconto"><?= number_format($nota_fiscal->valor_desconto, 2, ',', '.') ?></span>
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
                                    <td class="text-right pt-0 text-teal" id="idTotalPedido">
                                        <strong>
                                            R$
                                            <span
                                                id="TotalPedido"><?= number_format($total + $nota_fiscal->valor_frete + $nota_fiscal->valor_seguro + $nota_fiscal->outras_despesas - $nota_fiscal->valor_desconto, 2, ',', '.') ?></span>
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
                                <a type="button" class="btn btn-outline-info btn-block" href="<?= $xml ?>" target="_blank"
                                <?php if($nota_fiscal->status == 1) echo "disabled"; ?>>
                                    Visualizar XML
                                </a>
                            </div>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-outline-info btn-block" id="imprimir"
                                    <?php if($nota_fiscal->status == 1) echo "disabled"; ?>>
                                    Visualizar Danfe
                                </button>
                            </div>
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
                                            action="<?= base_url("fiscal/nota-fiscal/inserir-produto-nf/{$nota_fiscal->cod_nota_fiscal}") ?>"
                                            method='post' id='formProdutoVenda'>
                                            <div class="form-row">
                                                <div class="form-group col-md-8">
                                                    <label for="inputProdutoVenda">Código do Produto <span
                                                            class="text-danger">*</span></label>
                                                    <select id="inputProdutoVenda" class="selectpicker show-tick form-control"
                                                        data-live-search="true" data-actions-box="true" title="Selecione um Produto"
                                                        name="CodProduto" data-style="btn-input-primary" required>
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
                                                    <label for="inputQuantidade">Quantidade <span class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="inputQuantidade" name="Quantidade"
                                                            data-mask="#.##0,000" data-mask-reverse="true"
                                                            value="<?= set_value('Quantidade'); ?>" required>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text" style="width: 40px;" id="idUnProd"></span>
                                                        </div>
                                                    </div>
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

<?php foreach($lista_produto_nf as $key_produto_nf => $produto_nf) { ?>
<div class="modal fade" id="editar-produto<?= $produto_nf->seq_produto_nf ?>">
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
                                            action="<?= base_url("fiscal/nota-fiscal/salvar-produto-nf/{$nota_fiscal->cod_nota_fiscal}/{$produto_nf->seq_produto_nf}") ?>"
                                            method='post' id='formProdutoVendaEdit<?= $produto_nf->seq_produto_nf ?>'>
                                            <div class="form-row">
                                                <div class="form-group col-md-8">
                                                    <label class="control-label" for="inputProdutoVendaEdit">Produto de
                                                        Venda</label>
                                                    <input class="form-control" id="inputProdutoVendaEdit" type="text"
                                                        name="CodProdutoEdit"
                                                        value="<?= $produto_nf->cod_produto ?> - <?= $produto_nf->nome_produto ?>"
                                                        readonly>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="control-label" for="inputTipoProdutoEdit">Tipo de
                                                        Produto</label>
                                                    <input class="form-control" id="inputTipoProdutoEdit" type="text"
                                                        name="TipoProdutoEdit"
                                                        value="<?= $produto_nf->nome_tipo_produto ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputQuantidadeEdit">Quantidade Pedida <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control"
                                                            value="<?= $produto_nf->quantidade ?>" data-mask="#.##0,000"
                                                            data-mask-reverse="true"
                                                            <?php if($nota_fiscal->status != 1) echo "readonly"; ?>
                                                            id="inputQuantidadeEdit<?= $produto_nf->seq_produto_nf ?>"
                                                            name="QuantidadeEdit">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"
                                                                style="width: 40px;"><?= $produto_nf->cod_unidade_medida ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="control-label" for="inputValorUnitarioEdit">Valor
                                                        Unitário <span class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$</span>
                                                        </div>
                                                        <input type="text" class="form-control" class="form-control"
                                                            <?php if($nota_fiscal->status != 1) echo "readonly"; ?>
                                                            id="inputValorUnitarioEdit<?= $produto_nf->seq_produto_nf ?>"
                                                            type="text" name="ValorUnitarioEdit" data-mask="#.##0,00"
                                                            data-mask-reverse="true"
                                                            value="<?= number_format($produto_nf->valor_unitario, 2, ',', '.') ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="control-label" for="inputValorTotalEdit">Valor
                                                        Total</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$</span>
                                                        </div>
                                                        <input type="text" class="form-control" class="form-control"
                                                            readonly
                                                            id="inputValorTotalEdit<?= $produto_nf->seq_produto_nf ?>"
                                                            type="text" name="ValorTotalEdit" data-mask="#.##0,00"
                                                            data-mask-reverse="true"
                                                            value="<?= number_format($produto_nf->valor_unitario * $produto_nf->quantidade, 2, ',', '.') ?>">
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
                    form="formProdutoVendaEdit<?= $produto_nf->seq_produto_nf ?>"
                    <?php if($nota_fiscal->status != 1) echo "disabled"; ?>><i class="fas fa-save"></i>
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
                <h5 class="modal-title">Eliminar produto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Confirma eliminação dos produtos do pedido selecionados?
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger" form="DeleteProdutoVenda">Confirma</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="cancelar-nfe" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cancelar NFe</h5>
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
                                        <form action="<?php echo base_url("fiscal/nota-fiscal/cancelar-nfe/{$nota_fiscal->cod_nota_fiscal}") ?>"
                                            method='post' class="mb-0 needs-validation" novalidate id="CancelarNF">
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="inputMotivo">Motivo do Cancelamento <span class="text-danger">*</span></label>
                                                    <textarea class="form-control" rows="3" id="inputMotivo" required
                                                        name="MotivoCancelamento"><?= set_value('MotivoCancelamento'); ?></textarea>
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
                <button type="submit" class="btn btn-danger" form="CancelarNF">Confirmar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="carta-correcao-nfe" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Emitir Carta de Correção</h5>
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
                                        <form action="<?php echo base_url("fiscal/nota-fiscal/emitir-carta-correcao/{$nota_fiscal->cod_nota_fiscal}") ?>"
                                            method='post' class="mb-0 needs-validation" novalidate id="CartaNF">
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="inputMotivo">Descrição da Correção <span class="text-danger">*</span></label>
                                                    <textarea class="form-control" rows="3" id="inputMotivo" required
                                                        name="correcao"><?= set_value('correcao'); ?></textarea>
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
                <button type="submit" class="btn btn-warning" form="CartaNF">Confirmar</button>
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

<?php if($nota_fiscal->status == 1) { ?>

$('#inputDateEmissao').datepicker({
    uiLibrary: 'bootstrap4'
});

<?php } ?>

$('#inputDateEntrega').datepicker({
    uiLibrary: 'bootstrap4'
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

jQuery('#inputQuantidade').on('keyup', function() {
    valTotal();
});

jQuery('#inputValorUnitario').on('keyup', function() {
    valTotal();
});

function valTotal() {

    var valUnit = parseFloat(jQuery('#inputValorUnitario').val() != '' ? (jQuery('#inputValorUnitario').val().split(
        '.').join('')).replace(',', '.') : 0);
    var quantPedida = parseFloat(jQuery('#inputQuantidade').val() != '' ? (jQuery('#inputQuantidade').val().split(
        '.').join('')).replace(',', '.') : 0);

    var totalVenda = valUnit * quantPedida;

    $("#inputTotalVenda").val(totalVenda.toLocaleString("pt-BR", {
        style: "decimal",
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    }));

};

<?php foreach($lista_produto_nf as $key_produto_nf => $produto_nf) { ?>
jQuery('#inputQuantidadeEdit<?= $produto_nf->seq_produto_nf ?>').on('keyup', function() {
    var valUnit = parseFloat(jQuery('#inputValorUnitarioEdit<?= $produto_nf->seq_produto_nf ?>').val() != '' ? (
        jQuery('#inputValorUnitarioEdit<?= $produto_nf->seq_produto_nf ?>').val().split(
            '.').join('')).replace(',', '.') : 0);
    var quantidade = parseFloat(jQuery('#inputQuantidadeEdit<?= $produto_nf->seq_produto_nf ?>').val() != '' ? (
        jQuery('#inputQuantidadeEdit<?= $produto_nf->seq_produto_nf ?>').val().split(
            '.').join('')).replace(',', '.') : 0);

    var totalVenda = valUnit * quantidade;

    $("#inputValorTotalEdit<?= $produto_nf->seq_produto_nf ?>").val(totalVenda.toLocaleString("pt-BR", {
        style: "decimal",
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    }));
});

jQuery('#inputValorUnitarioEdit<?= $produto_nf->seq_produto_nf ?>').on('keyup', function() {
    var valUnit = parseFloat(jQuery('#inputValorUnitarioEdit<?= $produto_nf->seq_produto_nf ?>').val() != '' ? (
        jQuery('#inputValorUnitarioEdit<?= $produto_nf->seq_produto_nf ?>').val().split(
            '.').join('')).replace(',', '.') : 0);
    var quantidade = parseFloat(jQuery('#inputQuantidadeEdit<?= $produto_nf->seq_produto_nf ?>').val() != '' ? (
        jQuery('#inputQuantidadeEdit<?= $produto_nf->seq_produto_nf ?>').val().split(
            '.').join('')).replace(',', '.') : 0);

    var totalVenda = valUnit * quantidade;

    $("#inputValorTotalEdit<?= $produto_nf->seq_produto_nf ?>").val(totalVenda.toLocaleString("pt-BR", {
        style: "decimal",
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    }));
});
<?php } ?>

$(function() {
    //evnto que deve carregar a janela a ser impressa 
    $('#imprimir').click(function() {

        var iframe = this._printIframe;
        if (!this._printIframe) {
            iframe = this._printIframe = document.createElement('iframe');
            document.body.appendChild(iframe);

            iframe.style.display = 'none';
            iframe.onload = function() {
                setTimeout(function() {
                    iframe.focus();
                    iframe.contentWindow.print();
                }, 1);
            };
        }

        iframe.src = "<?= base_url("fiscal/nota-fiscal/danfe/" . $nota_fiscal->nf_id) ?>";
    });
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

    var valorProduto = parseFloat(jQuery('#idVelorProdutos').text() != '' ? (jQuery(
            '#idVelorProdutos').text()
        .split('.').join('')).replace(',', '.') : 0);

    var calcDesconto = valorDesconto;  

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