<?php $this->load->view('gerais/header' , $menu); ?>
<?php $this->load->view('gerais/menu', $menu); ?>

<section>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('visao-geral') ?>">Visão Geral</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('compras') ?>">Compras</a></li>
            <li class="breadcrumb-item active"><a
                    href="<?php echo base_url() ?>compras/recebimento-material">Recebimento de Material</a></li>
            <li class="breadcrumb-item active">Novo Recebimento de Material</a></li>
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
                                    <?= $pedido->cod_fornecedor ?> - <?= $pedido->nome_fornecedor ?>
                                    </strong>
                                </h5>
                                <?php
                                    if($pedido->data_entrega < date('Y-m-d') && $pedido->quant_pendente != 0 && $pedido->valor_total == 0){
                                        echo "<span class='badge bg-danger-light'>Atrasada</span>";
                                    }elseif($pedido->valor_total == 0){
                                        echo "<span class='badge bg-light'>Em digitação</span>";
                                    }elseif($pedido->quant_pendente == 0){
                                        echo "<span class='badge bg-teal-light'>Atendido Total</span>";
                                    }elseif($pedido->quant_pendente != 0){
                                        echo "<span class='badge bg-info-light'>Pendente</span>";
                                    }                                                       
                                ?>                               
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
                                                Pedido de compra
                                            </td>
                                            <td class="text-right">
                                                <strong><?= $pedido->num_pedido_compra ?></strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
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
                                            <td class="text-left align-middle ">
                                                Data emissão
                                            </td>
                                            <td class="text-right align-middle">
                                                <?= str_replace('-', '/', date("d-m-Y", strtotime($pedido->data_emissao))) ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left align-middle ">
                                                Data entrega
                                            </td>
                                            <td class="text-right align-middle">
                                                <strong><?= str_replace('-', '/', date("d-m-Y", strtotime($pedido->data_entrega))) ?></strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="table table-borderless table-sm mb-0">
                                    <tbody>
                                        <tr>
                                            <td class="text-left align-middle ">
                                                Valor em produtos
                                            </td>
                                            <td class="text-right align-middle 
                                            <?php if(($pedido->valor_pedido) > 0) echo "text-info";  ?>">
                                                R$
                                                <?= number_format($pedido->valor_pedido, 2, ',', '.') ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left align-middle ">
                                                Frete
                                                <?php
                                                    if ($pedido->tipo_frete == 1) {
                                                        echo "CIF";
                                                    } elseif ($pedido->tipo_frete == 2) {
                                                        echo "FOB";
                                                    }
                                                ?>
                                            </td>
                                            <td
                                                class="text-right align-middle <?php if($pedido->valor_frete > 0) echo "text-info"; ?>">
                                                R$ <?= number_format($pedido->valor_frete, 2, ',', '.') ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left align-middle">
                                                Seguro
                                            </td>
                                            <td
                                                class="text-right align-middle <?php if($pedido->valor_seguro > 0) echo "text-info"; ?>">
                                                R$ <?= number_format($pedido->valor_seguro, 2, ',', '.') ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left align-middle ">
                                                Outras despesas
                                            </td>
                                            <td
                                                class="text-right align-middle <?php if($pedido->outras_despesas > 0) echo "text-info"; ?>">
                                                R$ <?= number_format($pedido->outras_despesas, 2, ',', '.') ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left align-middle">
                                                Desconto
                                            </td>
                                            <td
                                                class="text-right align-middle <?php if($pedido->valor_desconto > 0) echo "text-teal"; ?>">
                                                <?php
                                                    if ($pedido->tipo_desconto == 1) {
                                                        echo "R$";
                                                    }
                                                    ?> <?= number_format($pedido->valor_desconto, 2, ',', '.') ?>
                                                <?php
                                                    if ($pedido->tipo_desconto == 2) {
                                                        echo "%";
                                                    }
                                                    ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="table table-borderless table-sm mb-0">
                                    <tbody>
                                        <tr>
                                            <td class="text-left align-middle ">
                                                Valor do pedido
                                            </td>
                                            <td
                                                class="text-right align-middle <?php if(($pedido->valor_produto + 
                                                                                                 $pedido->valor_frete +
                                                                                                 $pedido->valor_seguro +
                                                                                                 $pedido->outras_despesas - 
                                                                                                 $pedido->valor_desconto_calc) > 0) echo "text-info"; ?>">
                                                <strong>R$
                                                <?= number_format($pedido->valor_produto + 
                                                                         $pedido->valor_frete +
                                                                         $pedido->valor_seguro +
                                                                         $pedido->outras_despesas - 
                                                                         $pedido->valor_desconto_calc, 2, ',', '.') ?></strong>
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
                                    <td class="text-left pt-0 text-dark"><strong>Total recebido</strong></td>
                                    <td
                                        class="text-right pt-0 <?php if($pedido->valor_total > 0) echo "text-info"; else echo "text-dark"; ?>">
                                        <strong>
                                            R$ <?= number_format($pedido->valor_total, 2, ',', '.') ?>
                                        </strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php if($pedido->observacoes != "") { ?>
                <div class="card  mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <p class="card-text text-muted mb-0">Observação</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <?= $pedido->observacoes ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="col-md-8 pl-0">
                <ul class="nav nav-tabs mb-3">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#recebimento">Recebimento de Material</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#produto">Produtos do Pedido</a>
                    </li>
                </ul>
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
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="tab-content">
                                            <div class="tab-pane fade active show" id="recebimento">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-xs-12">
                                                        <button data-toggle="modal" data-target="#inserir-recebimento"
                                                        data-backdrop="static" data-keyboard="false"
                                                            type="button" class="btn btn-outline-info btn-sm"><i
                                                                class="fas fa-plus-circle"></i> Receber
                                                            Material</button>
                                                        <button data-toggle="modal" data-target="#estorna-recebimento"
                                                            type="button" class="btn btn-outline-danger btn-sm"
                                                            id="btnEstorno" disabled><i class="fas fa-undo"></i>
                                                            Estornar Recebimento</button>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-xs-12">
                                                        <form class="needs-validation" novalidate
                                                            action="<?= base_url("compras/recebimento-material/estornar-recebimento-material/{$pedido->num_pedido_compra}") ?>"
                                                            method="POST" id="EstornaRecebimento">
                                                            <table class="table table-bordered mb-3">
                                                                <thead class="thead-light">
                                                                    <tr>
                                                                        <th scope="col" class="text-center"><i
                                                                        class="fa-solid fa-check"></i></th>
                                                                        <th scope="col" class="text-center">Recebimento</th>
                                                                        <th scope="col" class="text-center">Data</th>
                                                                        <th scope="col">Serie</th>
                                                                        <th scope="col">Nota fiscal</th>
                                                                        <th scope="col" class="text-right">Total recebido</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php foreach($lista_recebimento as $key_recebimento => $recebimento) { ?>
                                                                    <tr>
                                                                        <td>
                                                                            <div class="checkbox text-center">
                                                                                <input name="estornar_todos[]"
                                                                                    type="checkbox"
                                                                                    value="<?= $recebimento->cod_recebimento_material ?>" />
                                                                            </div>
                                                                        </td>
                                                                        <td class="text-center"><a href="#"
                                                                                data-toggle="modal" class="text-dark"
                                                                                data-target="#produto-recebimento<?= $recebimento->cod_recebimento_material ?>">
                                                                                <?= $recebimento->cod_recebimento_material ?></a>
                                                                        </td>
                                                                        <td class="text-center" class="text-dark"><a href="#"
                                                                                data-toggle="modal" class="text-dark"
                                                                                data-target="#produto-recebimento<?= $recebimento->cod_recebimento_material ?>">
                                                                            <?= str_replace('-', '/', date("d-m-Y", strtotime($recebimento->data_recebimento))) ?></a>
                                                                        </td>
                                                                        <td><?= $recebimento->serie ?></td>
                                                                        <td><?= $recebimento->nota_fiscal ?></td>
                                                                        <td class="text-right text-info">R$
                                                                            <?= number_format($recebimento->valor_bruto + $recebimento->valor_frete + $recebimento->valor_seguro + $recebimento->outras_despesas - $recebimento->valor_desconto, 2, ',', '.') ?>
                                                                        </td>
                                                                    </tr>
                                                                    <?php } ?>
                                                                </tbody>
                                                            </table>
                                                            <?php if ($lista_recebimento == false) { ?>
                                                            <div class="text-center text-muted">
                                                                <p class="font-italic mt-3">Nenhum recebimento realizado</p>
                                                            </div>
                                                            <?php } ?>                                                            
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="produto">
                                                <table class="table table-bordered">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th scope="col">Produto</th>
                                                            <th scope="col">Tipo</th>
                                                            <th scope="col" class="text-right">Quantidade</th>
                                                            <th scope="col" class="text-right">Valor total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach($lista_produto as $key_produto => $produto) { ?>
                                                        <tr>
                                                            <td><?= $produto->cod_produto ?> - <?= $produto->nome_produto ?></td>
                                                            <td><?= $produto->nome_tipo_produto ?></td>
                                                            <td class="text-right text-info">
                                                                <?= number_format($produto->quant_pedida, 3, ',', '.') ?> <?= $produto->cod_unidade_medida ?>
                                                            </td>
                                                            <td class="text-right text-teal">R$
                                                                <?= number_format($produto->total_compra, 2, ',', '.') ?>
                                                            </td>
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                                <?php if ($lista_produto == false) { ?>
                                                <div class="text-center text-muted">
                                                    <p class="font-italic mt-3">Nenhum recebimento realizado</p>
                                                </div>
                                                <?php } ?>
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

<div class="modal fade" id="estorna-recebimento" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Estornar recebimento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Confirma o estorno dos recebimentos selecionados?
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger" form="EstornaRecebimento">Confirma</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="inserir-recebimento">
    <div class="modal-dialog modal-xxl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Receber material</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modal-body-scroll bg-light">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body border-bottom">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5 class="card-title mb-0">
                                            <strong>
                                            <?= $pedido->cod_fornecedor ?> - <?= $pedido->nome_fornecedor ?>
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
                                                        Pedido de compra
                                                    </td>
                                                    <td class="text-right">
                                                        <strong><?= $pedido->num_pedido_compra ?></strong>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table table-borderless table-sm mb-0">
                                            <tbody>
                                                <tr>
                                                    <td class="text-left align-middle ">
                                                        Data emissão
                                                    </td>
                                                    <td class="text-right align-middle">
                                                        <?= str_replace('-', '/', date("d-m-Y", strtotime($pedido->data_emissao))) ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle ">
                                                        Data entrega
                                                    </td>
                                                    <td class="text-right align-middle">
                                                        <strong><?= str_replace('-', '/', date("d-m-Y", strtotime($pedido->data_entrega))) ?></strong>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table table-borderless table-sm mb-0">
                                            <?php

                                            if($pedido->tipo_desconto == 1)
                                                $valorDesconto = $pedido->valor_desconto;
                                            elseif($pedido->tipo_desconto == 2 && $pedido->valor_desconto > 0)
                                                $valorDesconto = $pedido->valor_pedido * ($pedido->valor_desconto / 100);
                                            ?>
                                            <tbody>
                                                <tr>
                                                    <td class="text-left align-middle ">
                                                        Total em produtos
                                                    </td>
                                                    <td id="idTdProduto"
                                                        class="text-right align-middle 
                                                    <?php if(($pedido->valor_pedido) > 0) echo "text-info";  ?>">
                                                        R$
                                                        <span id="idProduto"><?= number_format($pedido->valor_pedido, 2, ',', '.') ?></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle ">
                                                        Frete <?php if($pedido->tipo_frete == 1) echo "CIF"; else echo "FOB"; ?>
                                                    </td>
                                                    <td id="idTdFrete"
                                                        class="text-right align-middle <?php if($pedido->valor_frete > 0) echo "text-info"; ?>">
                                                        R$ <span id="idFrete"><?= number_format($pedido->valor_frete, 2, ',', '.') ?></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle">
                                                        Seguro
                                                    </td>
                                                    <td id="idTdSeguro"
                                                        class="text-right align-middle <?php if($pedido->valor_seguro > 0) echo "text-info"; ?>">
                                                        R$ <span id="idSeguro"><?= number_format($pedido->valor_seguro, 2, ',', '.') ?></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle ">
                                                        Outras despesas
                                                    </td>
                                                    <td id="idTdOutrasDespesas"
                                                        class="text-right align-middle <?php if($pedido->outras_despesas > 0) echo "text-info"; ?>">
                                                        R$ <span id="idOutrasDespesas"><?= number_format($pedido->outras_despesas, 2, ',', '.') ?></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle">
                                                        Desconto
                                                    </td>
                                                    <td id="idTdDesconto"
                                                        class="text-right align-middle <?php if($valorDesconto> 0) echo "text-teal"; ?>">
                                                        R$
                                                        <span id="idDesconto"><?= number_format($valorDesconto, 2, ',', '.') ?></span>
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
                                            <td class="text-left pt-0 text-dark"><strong>Total a receber</strong></td>
                                            <td id="idTdTotalPedido"
                                                class="text-right pt-0 <?php if($pedido->valor_pedido +
                                                                                $pedido->valor_frete +
                                                                                $pedido->valor_seguro +
                                                                                $pedido->outras_despesas -
                                                                                $valorDesconto > 0) echo "text-info"; else echo "text-dark"; ?>">
                                                <strong>
                                                    R$ <span id="idTotalPedido"><?= number_format($pedido->valor_pedido +
                                                                                                  $pedido->valor_frete +
                                                                                                  $pedido->valor_seguro +
                                                                                                  $pedido->outras_despesas -
                                                                                                  $valorDesconto, 2, ',', '.') ?></span>
                                                </strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 pl-0">
                        <ul class="nav nav-tabs mb-3">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#recebimento-ped">Recebimento</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#financeiro">Financeiro</a>
                            </li>
                        </ul>
                        <form class="mb-0 needs-validation" novalidate
                            action="<?= base_url("compras/recebimento-material/inserir-recebimento/{$pedido->num_pedido_compra}/{$pedido->cod_fornecedor}") ?>"
                            method="POST" id="InserirRecebimento">
                            <div class="card">
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane fade active show" id="recebimento-ped">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-xs-12">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label class="control-label" for="inputDataRecebimento">Data do Recebimento <span
                                                                    class="text-danger">*</span></label>
                                                            <input class="form-control" id="inputDataRecebimento" type="text"
                                                                name="DataRecebimento" value="<?php if(set_value('DataRecebimento') == ""){
                                                                                        echo str_replace('-', '/', date("d-m-Y"));
                                                                                    }else{ echo set_value('DataRecebimento'); } ?>" required>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="control-label" for="inputSerie">Serie</label>
                                                            <input class="form-control" id="inputSerie" type="text" name="Serie"
                                                                value="<?= set_value('Serie'); ?>">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="control-label" for="inputNotaFiscal">Nota Fiscal</label>
                                                            <input class="form-control" id="inputNotaFiscal" type="text" name="NotaFiscal"
                                                                value="<?= set_value('NotaFiscal'); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <?php

                                                    if($pedido->tipo_desconto == 1)
                                                        $valorDesconto = $pedido->valor_desconto;
                                                    elseif($pedido->tipo_desconto == 2 && $pedido->valor_desconto > 0)
                                                        $valorDesconto = $pedido->valor_pedido * ($pedido->valor_desconto / 100);
                                                    ?>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-3">
                                                            <label class="control-label">Valor Frete</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">R$</span>
                                                                </div>
                                                                <input class="form-control" id="inputValorFrete" name="ValorFrete" type="text"
                                                                    data-mask="#.##0,00" data-mask-reverse="true"
                                                                    value="<?= number_format($pedido->valor_frete, 2, ',', '.') ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="control-label">Valor Seguro</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">R$</span>
                                                                </div>
                                                                <input class="form-control" id="inputSeguro" name="Seguro" type="text"
                                                                    data-mask="#.##0,00" data-mask-reverse="true"
                                                                    value="<?= number_format($pedido->valor_seguro, 2, ',', '.') ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="control-label">Outras Despesas</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">R$</span>
                                                                </div>
                                                                <input class="form-control" id="inputOutrasDespesas" name="OutrasDespesas"
                                                                    type="text" data-mask="#.##0,00" data-mask-reverse="true"
                                                                    value="<?= number_format($pedido->outras_despesas, 2, ',', '.') ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="control-label">Valor Desconto</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">R$</span>
                                                                </div>
                                                                <input class="form-control " id="inputValorDesconto" name="ValorDesconto"
                                                                    type="text" data-mask="#.##0,00" data-mask-reverse="true"
                                                                    value="<?= number_format($valorDesconto, 2, ',', '.') ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row" hidden>
                                                        <div class="form-group col-md-6">
                                                            <label class="control-label">Total em Produtos</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">R$</span>
                                                                </div>
                                                                <input class="form-control text-center" id="inputBruto" name="ValorBruto"
                                                                    type="text" data-mask="#.##0,00" data-mask-reverse="true"
                                                                    value="<?= number_format($pedido->valor_pedido, 2, ',', '.') ?>" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="control-label">Total da Compra</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">R$</span>
                                                                </div>
                                                                <input class="form-control text-center text-teal" id="inputValorLiq"
                                                                    name="ValorLiq" type="text" data-mask="#.##0,00" data-mask-reverse="true"
                                                                    value="<?= number_format($pedido->valor_pedido + $pedido->valor_frete + $pedido->valor_seguro + $pedido->outras_despesas - $valorDesconto, 2, ',', '.') ?>"
                                                                    readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div>
                                                                <div class="form-group">
                                                                    <label for="inputObservacao">Observações do Recebimento</label>
                                                                    <textarea class="form-control" rows="3" id="inputObservacao	"
                                                                        name="ObservReceb"><?= set_value('ObservReceb'); ?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php if ($lista_produto == false) { ?>
                                                    <div class="text-center">
                                                        <p>Nenhum produto de venda adicionado</p>
                                                    </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <hr>                                    
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <table class="table table-bordered table-reporte">
                                                        <thead class="thead-light">
                                                            <tr>
                                                                <th scope="col" class="text-center">
                                                                    <i class="fa-solid fa-ellipsis"></i>
                                                                </th>
                                                                <th scope="col">Produto</th>
                                                                <th scope="col" class="text-right">Quant</th>
                                                                <th scope="col" class="text-right">Total</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach($lista_produto as $key_produto => $produto) { ?>
                                                            <tr>
                                                                <td class="text-center">
                                                                    <?php if($produto->tipo_controle == 2) { ?>
                                                                    <a href="#" class="text-teal accordion-toggle" id="detail<?= $produto->cod_produto ?>"
                                                                    data-toggle="collapse" data-target="#produto<?= $produto->cod_produto ?>">
                                                                        <i class="fa-solid fa-angle-right"></i>                                                          
                                                                    </a>
                                                                    <?php }else{ ?>
                                                                        <i class="fa-solid fa-angle-right text-muted"></i>
                                                                    <?php } ?>
                                                                </td> 
                                                                <td class="align-middle limit-text-30" data-toggle="tooltip"
                                                                    data-placement="bottom"
                                                                    title="<?= $produto->nome_produto ?>"><?= $produto->cod_produto ?> - <?= $produto->nome_produto ?></td>
                                                                <td width="150" class="align-middle">
                                                                    <div class="input-group">
                                                                        <input class="form-control text-right"
                                                                            id="inputQuantRecebida<?= $produto->cod_produto ?>"
                                                                            name="quantRecebida[<?= $produto->cod_produto ?>]" type="text"
                                                                            data-mask="#.##0,000" data-mask-reverse="true"
                                                                            value="<?= number_format($produto->quant_pedida, 3, ',', '.') ?>"
                                                                            required>
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text"
                                                                                style="width: 40px;"><?= $produto->cod_unidade_medida ?></span>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td width="150" class="align-middle">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">R$</span>
                                                                        </div>
                                                                        <input class="form-control text-right"
                                                                            id="inputValorCompra<?= $produto->cod_produto ?>"
                                                                            name="ValorCompra[<?= $produto->cod_produto ?>]" type="text"
                                                                            data-mask="#.##0,00" data-mask-reverse="true"
                                                                            value="<?= number_format($produto->total_compra, 2, ',', '.') ?>"
                                                                            required>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <?php if($produto->tipo_controle == 2) { ?>
                                                            <tr class="accordian-body collapse p-3 hiddenRow" id="produto<?= $produto->cod_produto ?>">
                                                                <td colspan="6" class="bg-white-light "> 
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-12">
                                                                            <label for="inputLote<?= $produto->cod_produto ?>">Lote <span class="text-danger">*</span></label>
                                                                            <div class="input-group">
                                                                                <select id="inputLote<?= $produto->cod_produto ?>" class="selectpicker show-tick form-control"
                                                                                    data-live-search="true" data-actions-box="true" title="Selecione um Lote"
                                                                                    data-style="btn-input-primary" name="loteVenda[<?= $produto->cod_produto ?>]" required>
                                                                                    <?php foreach($lista_lote_produto as $key_lote => $lote) { if($lote->cod_produto == $produto->cod_produto) { ?>
                                                                                    <option  class="<?php if((date("Y-m-d", strtotime('-' . $lote->dias_aviso_venc . ' days', strtotime($lote->data_validade)))) <= date("Y-m-d") && $lote->data_validade != date("Y-m-d")) echo "text-warning";
                                                                                                          elseif($lote->data_validade == date("Y-m-d")) echo "text-danger"; ?>"
                                                                                             value="<?= $lote->cod_lote ?>" class="limit-text-50"
                                                                                        <?php if($lote->cod_lote == set_value('CodLoteMov')) echo "selected"; ?>>
                                                                                        <?= $lote->cod_lote ?> -
                                                                                        <?= str_replace('-', '/', date("d-m-Y", strtotime($lote->data_validade))) ?></option>
                                                                                    <?php }} ?>
                                                                                </select>
                                                                                <div class="input-group-append">
                                                                                    <a href="#" data-toggle="modal" data-target="#inserir-lote-ajax<?= $produto->cod_produto ?>" type="button"
                                                                                    data-backdrop="static" data-keyboard="false"
                                                                                        class="btn btn-outline-info btn-block btn-accordian">Novo Lote</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div> 
                                                                </td>
                                                            </tr> 
                                                            <?php } ?> 
                                                            <?php } ?> 
                                                        </tbody>
                                                    </table>
                                                    <?php if ($lista_produto == false) { ?>
                                                    <div class="text-center">
                                                        <p>Nenhuma ordem de compra adicionada</p>
                                                    </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="financeiro">
                                        <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-5">
                                                            <label>Centro de Custo</label>
                                                            <select class="selectpicker show-tick form-control"
                                                                data-live-search="true" data-actions-box="true"
                                                                title="Selecione um Centro de Custo"
                                                                name="CodCentroCusto" data-style="btn-input-primary">
                                                                <?php foreach ($lista_centro_custo as $key_centro_custo => $centro_custo) { ?>
                                                                <option value="<?= $centro_custo->cod_centro_custo ?>"
                                                                    <?php if ($centro_custo->cod_centro_custo ==
                                                                                                        $empresa->centro_custo_vendas) echo "selected"; ?>>
                                                                    <?= $centro_custo->cod_centro_custo ?> -
                                                                    <?= $centro_custo->nome_centro_custo ?>
                                                                </option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-5">
                                                            <label>Conta Contábil</label>
                                                            <select class="selectpicker show-tick form-control"
                                                                id="inputContaContabil<?= $produto->cod_produto ?>"
                                                                data-live-search="true" data-actions-box="true"
                                                                title="Selecione uma Conta Contábil"
                                                                name="CodContaContabil" data-style="btn-input-primary">
                                                                <?php foreach ($lista_conta_contabil as $key_conta_contabil => $conta_contabil) { ?>
                                                                <option
                                                                    value="<?= $conta_contabil->cod_conta_contabil ?>"
                                                                    <?php if ($conta_contabil->cod_conta_contabil ==
                                                                                                            $empresa->conta_contabil_vendas) echo "selected"; ?>>
                                                                    <?= $conta_contabil->cod_conta_contabil ?> -
                                                                    <?= $conta_contabil->nome_conta_contabil ?>
                                                                </option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label for="inputParcelas">Parcelamento</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control search" id="inputParcelas" data-mask="#.##0" data-mask-reverse="true" value="1" name="Parcelas">
                                                                <div class="input-group-append">
                                                                    <button type="button" class="btn btn-outline-info" id="btnParcelas"><i class="fa-solid fa-check"></i></button>
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
                                                                <div class="form-group col-md-12">
                                                                    <h5><strong>Parcela: 1/1</strong></h5>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-4">
                                                                    <label class="control-label"
                                                                        for="inputDataVencimento1">Data de Vencimento
                                                                        <span class="text-danger">*</span></label>
                                                                    <input type="text" class="form-control"
                                                                        id="inputDataVencimento1"
                                                                        name="DataVencimento[1]"
                                                                        value="<?php if(set_value('DataVencimento[1]') == ""){
                                                                                echo str_replace('-', '/', date("d-m-Y"));
                                                                            }else{ echo set_value('DataVencimento[1]'); } ?>" required>
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label class="control-label"
                                                                        for="inputValorParcela1">Valor da Parcela <span
                                                                            class="text-danger">*</span></label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">R$</span>
                                                                        </div>
                                                                        <input class="form-control"
                                                                            id="inputValorParcela1"
                                                                            name="ValorParcela[1]" type="text"
                                                                            data-mask="#.##0,00" inputmode="numeric"
                                                                            data-mask-reverse="true" ]
                                                                            value="<?= number_format($pedido->valor_pedido + $pedido->valor_frete + $pedido->valor_seguro + $pedido->outras_despesas - $valorDesconto, 2, ',', '.') ?>"
                                                                            required>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label>Método de Pagamento</label>
                                                                    <select class="selectpicker show-tick form-control"
                                                                        data-live-search="true" data-actions-box="true"
                                                                        title="Selecione um Método de Pagamento"
                                                                        name="CodMetodoPagamento[1]"
                                                                        data-style="btn-input-primary">
                                                                        <?php foreach ($lista_metodo_pagamento as $key_metodo_pagamento => $metodo_pagamento) { ?>
                                                                        <option
                                                                            value="<?= $metodo_pagamento->cod_metodo_pagamento ?>"
                                                                            <?php if ($metodo_pagamento->cod_metodo_pagamento ==
                                                                                                                set_value('CodMetodoPagamento')) echo "selected"; ?>>
                                                                            <?= $metodo_pagamento->cod_metodo_pagamento ?>
                                                                            -
                                                                            <?= $metodo_pagamento->nome_metodo_pagamento ?>
                                                                        </option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                  
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" form="InserirRecebimento"><i
                        class="fas fa-plus-circle"></i>
                    Receber Material</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<?php foreach($lista_recebimento as $key_recebimento => $recebimento) { ?>
<div class="modal fade" id="produto-recebimento<?= $recebimento->cod_recebimento_material ?>">
    <div class="modal-dialog modal-xxl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detalhes do recebimento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modal-body-scroll bg-light">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body border-bottom">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5 class="card-title mb-0">
                                            <strong>
                                                <?= $recebimento->cod_recebimento_material ?> -
                                                <?= str_replace('-', '/', date("d-m-Y", strtotime($recebimento->data_recebimento))) ?>
                                            </strong>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php if($recebimento->nome_usuario != null){ ?>
                                        <table class="table table-borderless table-sm mb-0">
                                            <tbody>
                                                <tr>
                                                    <td class="text-left align-middle">
                                                        Usuário da recebimento
                                                    </td>
                                                    <td class="text-right align-middle">
                                                        <?= $recebimento->nome_usuario ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <?php } ?>
                                        <table class="table table-borderless table-sm mb-0">
                                            <tbody>
                                                <tr>
                                                    <td class="text-left align-middle">
                                                        Serie
                                                    </td>
                                                    <td class="text-right align-middle"><?= $recebimento->serie ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle">
                                                        Nota Fiscal
                                                    </td>
                                                    <td class="text-right align-middle"><?= $recebimento->nota_fiscal ?></td>
                                                </tr>                                               
                                            </tbody>
                                        </table>
                                        <table class="table table-borderless table-sm mb-0">
                                            <tbody>
                                                <tr>
                                                    <td class="text-left align-middle">
                                                        Total em produtos
                                                    </td>
                                                    <td
                                                        class="text-right align-middle <?php if($recebimento->valor_bruto > 0) echo "text-info"; ?>">
                                                        R$ <?= number_format($recebimento->valor_bruto, 2, ',', '.') ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle ">
                                                        Frete <?php if($recebimento->tipo_frete == 1) echo "CIF"; else echo "FOB"; ?>
                                                    </td>
                                                    <td
                                                        class="text-right align-middle <?php if($recebimento->valor_frete > 0) echo "text-info"; ?>">
                                                        R$ <?= number_format($recebimento->valor_frete, 2, ',', '.') ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle">
                                                        Seguro
                                                    </td>
                                                    <td
                                                        class="text-right align-middle <?php if($recebimento->valor_seguro > 0) echo "text-info"; ?>">
                                                        R$ <?= number_format($recebimento->valor_seguro, 2, ',', '.') ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle ">
                                                        Outras despesas
                                                    </td>
                                                    <td
                                                        class="text-right align-middle <?php if($recebimento->outras_despesas > 0) echo "text-info"; ?>">
                                                        R$
                                                        <?= number_format($recebimento->outras_despesas, 2, ',', '.') ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle">
                                                        Desconto
                                                    </td>
                                                    <td
                                                        class="text-right align-middle <?php if($recebimento->valor_desconto > 0) echo "text-teal"; ?>">
                                                        R$
                                                        <?= number_format($recebimento->valor_desconto, 2, ',', '.') ?>
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
                                            <td class="text-left pt-0 text-dark"><strong>Total recebido</strong></td>
                                            <td
                                                class="text-right pt-0 <?php if($recebimento->valor_total > 0) echo "text-info"; ?>">
                                                <strong>
                                                    R$ <?= number_format($recebimento->valor_total, 2, ',', '.') ?>
                                                </strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 pl-0">
                        <ul class="nav nav-tabs mb-3">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#prod-recebimento<?= $recebimento->cod_recebimento_material ?>">Produtos Recebidos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#titulos<?= $recebimento->cod_recebimento_material ?>">Títulos Emitidos</a>
                            </li>
                        </ul>
                        <div class="card">
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane fade active show" id="prod-recebimento<?= $recebimento->cod_recebimento_material ?>">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered">
                                                        <thead class="thead-light">
                                                            <tr>
                                                                <th scope="col">Produto</th>
                                                                <th scope="col">Lote</th>
                                                                <th scope="col" class="text-right">Quant</th>
                                                                <th scope="col" class="text-right">Total</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $i = 0; foreach($lista_recebimento_pedido as $key_recebimento_pedido => $recebimento_pedido) { 
                                                                if($recebimento_pedido->cod_recebimento_material == $recebimento->cod_recebimento_material) { $i += 1;?>
                                                            <tr>
                                                                <td class="limit-text-50 align-middle" data-toggle="tooltip"
                                                                    data-placement="bottom"
                                                                    title="<?= $recebimento_pedido->nome_produto ?>"><?= $recebimento_pedido->cod_produto ?> - <?= $recebimento_pedido->nome_produto ?></td>
                                                                <td class="align-middle"><?= $recebimento_pedido->cod_lote ?></td>
                                                                <td class="text-right align-middle">
                                                                    <?= number_format($recebimento_pedido->quantidade, 3, ',', '.') ?> <?= $recebimento_pedido->cod_unidade_medida ?>
                                                                </td>
                                                                <td class="text-right text-info align-middle">
                                                                    R$ <?= number_format($recebimento_pedido->quantidade * $recebimento_pedido->valor_unitario, 2, ',', '.') ?>
                                                                </td>
                                                            </tr>
                                                            <?php } } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <?php if ($i == 0) { ?>
                                                <div class="text-center text-muted">
                                                     <p class="font-italic mt-3">Nenhum produto para receber</p>
                                                </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="titulos<?= $recebimento->cod_recebimento_material ?>">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered">
                                                        <thead class="thead-light">
                                                            <tr>
                                                                <th scope="col" class="text-center border-right-0"><i class="fa-solid fa-check"></i>
                                                                </th>
                                                                <th scope="col" class="text-center">Vencimento</th>
                                                                <th scope="col">Descrição</th>
                                                                <th scope="col" class="text-center">Parcela</th>
                                                                <th scope="col" class="text-right">Valor</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="table-sm">
                                                            <?php $i = 0; foreach ($lista_recebimento_titulo as $key_recebimento_titulo => $recebimento_titulo) {
                                                                if ($recebimento_titulo->cod_recebimento_material == $recebimento->cod_recebimento_material) { $i += 1; ?>
                                                            <tr>
                                                                <td class="align-middle text-center">
                                                                    <?php if($recebimento_titulo->confirmado == 1) { ?>
                                                                    <i class="fa-solid fa-xs fa-circle-check text-teal"></i>
                                                                    <?php } else { ?>
                                                                    <i class="fa fa-circle fa-xs text-light"> </i>
                                                                    <?php } ?>
                                                                </td>
                                                                <td class="text-center align-middle">
                                                                    <?= str_replace('-', '/', date("d-m-Y", strtotime($recebimento_titulo->data_vencimento))) ?>
                                                                </td>
                                                                <td class="limit-text-40 align-middle" data-toggle="tooltip"
                                                                    data-placement="bottom"
                                                                    title="<?= $recebimento_titulo->desc_movimento ?>">
                                                                    <?= $recebimento_titulo->desc_movimento ?><br>
                                                                    <span
                                                                        class='badge bg-info-light text-muted'><?= $recebimento_titulo->nome_conta ?></span>
                                                                    <?php if($recebimento_titulo->nome_metodo_pagamento != null) { ?>
                                                                    <span
                                                                        class="badge bg-light text-muted"><?= $recebimento_titulo->nome_metodo_pagamento ?></span>
                                                                    <?php }?>
                                                                </td>
                                                                <td class="text-center align-middle">
                                                                    <?= $recebimento_titulo->parcela ?>
                                                                </td>
                                                                <td class="text-right text-danger align-middle">
                                                                    R$
                                                                    <?= number_format($recebimento_titulo->valor_titulo, 2, ',', '.') ?>
                                                                </td>
                                                            </tr>
                                                            <?php }
                                                            } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <?php if ($i == 0) { ?>
                                                <div class="text-center text-muted">
                                                     <p class="font-italic mt-3">Nenhum título emitido para o recebimento</p>
                                                </div>
                                                <?php } ?>
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
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<?php foreach($lista_produto as $key_produto => $produto) { if($produto->tipo_controle == 2) { ?>
    <div class="modal fade" id="inserir-lote-ajax<?= $produto->cod_produto ?>">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content border-dark">
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
                                    <div class="col-md-12">
                                        <form class="mb-0 needs-validation" novalidate
                                            action=""
                                            method="POST">
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label class="control-label" for="inputCodLoteAjax<?= $produto->cod_produto ?>">Código do Lote <span class="text-danger">*</span></label>
                                                    <input class="form-control" id="inputCodLoteAjax<?= $produto->cod_produto ?>" type="text"
                                                        name="CodLote"
                                                        value="<?= set_value('CodLote') ?>" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label class="control-label" for="inputDataValidadeAjax<?= $produto->cod_produto ?>">Data de Validade <span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control" id="inputDataValidadeAjax<?= $produto->cod_produto ?>" type="text" name="DataValidade"
                                                        value="<?= str_replace('-', '/', date("d-m-Y", strtotime('+' . $produto->dias_vencimento . ' days', strtotime(date("d-m-Y"))))) ?>" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label" for="inputDiasAvisoAjax<?= $produto->cod_produto ?>">Dias de aviso</label>
                                                    <input class="form-control" id="inputDiasAvisoAjax<?= $produto->cod_produto ?>" type="text"
                                                        name="DiasAviso" data-mask="#.##0" data-mask-reverse="true"
                                                        value="<?= "10" ?>">
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
                <button type="submit" id="btnSalvarLote<?= $produto->cod_produto ?>" class="btn btn-primary"><i class="fas fa-save"></i>
                    Salvar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
<?php }} ?>

<script>
$(function() {
    $.applyDataMask();
});

<?php foreach($lista_produto as $key_produto => $produto) { if($produto->tipo_controle == 2) { ?>
$("#btnSalvarLote<?= $produto->cod_produto ?>").click(function() {

    var baseurl = "<?php echo base_url(); ?>";

    var codProduto = "<?= $produto->cod_produto ?>";
    var codLote = $("#inputCodLoteAjax<?= $produto->cod_produto ?>").val();
    var dataValidade = $("#inputDataValidadeAjax<?= $produto->cod_produto ?>").val();
    var diasAviso = $("#inputDiasAvisoAjax<?= $produto->cod_produto ?>").val();

    $.post(baseurl + "ajax/inserir-lote", {
        codProduto: codProduto,
        codLote: codLote,
        dataValidade: dataValidade,
        diasAviso: diasAviso,
    }, function(data) {
        $('#inserir-lote-ajax<?= $produto->cod_produto ?>').modal('hide');

        console.log(data);

        $("#inputLote<?= $produto->cod_produto ?>").html(data);
        $("#inputLote<?= $produto->cod_produto ?>").removeAttr('disabled');
        $('#inputLote<?= $produto->cod_produto ?>').selectpicker('refresh');
        $("#inputLote<?= $produto->cod_produto ?>").selectpicker('val', $('option:contains("' + codLote + ' - ' + dataValidade + '")').val());
    });
});

$('#inputDataValidadeAjax<?= $produto->cod_produto ?>').datepicker({
    uiLibrary: 'bootstrap4'
});

$('#detail<?= $produto->cod_produto ?>').click(function() {
    console.log("test");
    $('#produto<?= $produto->cod_produto ?>').on('shown.bs.collapse', function() {
        $('#detail<?= $produto->cod_produto ?>')
        .parent()
        .find(".fa-angle-right")
        .removeClass("fa-angle-right")
        .addClass("fa-angle-down");
    })
    .on('hidden.bs.collapse', function() {
        $('#detail<?= $produto->cod_produto ?>')
        .parent()
        .find(".fa-angle-down")
        .removeClass("fa-angle-down")
        .addClass("fa-angle-right");
    }); 
});
<?php }} ?>

$("[name='estornar_todos[]']").click(function() {
    var cont = $("[name='estornar_todos[]']:checked").length;
    $("#btnEstorno").prop("disabled", cont ? false : true);
});

$('#inputFornecedor').selectpicker({
    style: 'btn-input-primary'
});

$('#inputDataRecebimento').datepicker({
    uiLibrary: 'bootstrap4'
});

$('#inputDataVencimento1').datepicker({
    uiLibrary: 'bootstrap4'
});

<?php foreach($lista_produto as $key_produto => $produto) { ?>
jQuery('#inputValorCompra' + "<?php echo $produto->cod_produto; ?>").on('keyup', function() {

    calcTotalCompra();

});
<?php } ?>

jQuery('#inputValorDesconto').on('keyup', function() {
    calcTotalCompra();
});

jQuery('#inputValorFrete').on('keyup', function() {
    calcTotalCompra();
});

jQuery('#inputOutrasDespesas').on('keyup', function() {
    calcTotalCompra();
});

jQuery('#inputSeguro').on('keyup', function() {
    calcTotalCompra();
});

function calcTotalCompra() {

    var totalBruto = 0;
    
    var valorFrete = parseFloat(jQuery('#inputValorFrete').val() != '' ? (jQuery(
            '#inputValorFrete').val()
        .split('.').join('')).replace(',', '.') : 0);
    $('#idFrete').text(valorFrete.toLocaleString("pt-BR", {
                        style: "decimal",
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                       }));
    if(valorFrete > 0){
        $('#idTdFrete').addClass("text-info");        
    }else{
        $('#idTdFrete').removeClass("text-info");  
    }

    var valorSeguro = parseFloat(jQuery('#inputSeguro').val() != '' ? (jQuery(
            '#inputSeguro').val()
        .split('.').join('')).replace(',', '.') : 0);
    $('#idSeguro').text(valorSeguro.toLocaleString("pt-BR", {
                        style: "decimal",
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                       }));
    if(valorSeguro > 0){
        $('#idTdSeguro').addClass("text-info");        
    }else{
        $('#idTdSeguro').removeClass("text-info");  
    }

    var valorOutrasDespesas = parseFloat(jQuery('#inputOutrasDespesas').val() != '' ? (jQuery(
            '#inputOutrasDespesas').val()
        .split('.').join('')).replace(',', '.') : 0);
    $('#idOutrasDespesas').text(valorOutrasDespesas.toLocaleString("pt-BR", {
                        style: "decimal",
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                       }));
    if(valorOutrasDespesas > 0){
        $('#idTdOutrasDespesas').addClass("text-info");        
    }else{
        $('#idTdOutrasDespesas').removeClass("text-info");  
    }

    var valorDesconto = parseFloat(jQuery('#inputValorDesconto').val() != '' ? (jQuery('#inputValorDesconto').val()
        .split('.').join('')).replace(',', '.') : 0);
    $('#idDesconto').text(valorDesconto.toLocaleString("pt-BR", {
                        style: "decimal",
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                       }));
    if(valorDesconto > 0){
        $('#idTdDesconto').addClass("text-teal");        
    }else{
        $('#idTdDesconto').removeClass("text-teal");  
    }

    var totalLiquido = 0;

    <?php foreach($lista_produto as $key_produto => $produto) { ?>
    var totalBruto = totalBruto + parseFloat(jQuery('#inputValorCompra' + '<?= $produto->cod_produto ?>').val() != '' ?
        (jQuery('#inputValorCompra' + '<?= $produto->cod_produto ?>').val().split('.').join('')).replace(',', '.') :
        0);
    <?php } ?>

    $('#idProduto').text(totalBruto.toLocaleString("pt-BR", {
                        style: "decimal",
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                       }));
    if(totalBruto > 0){
        $('#idTdProduto').addClass("text-info");        
    }else{
        $('#idTdProduto').removeClass("text-info");  
    }

    totalLiquido = round(totalBruto + valorFrete + valorSeguro + valorOutrasDespesas - valorDesconto, 2);
    $('#idTotalPedido').text(totalLiquido.toLocaleString("pt-BR", {
                        style: "decimal",
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                       }));
    if(totalLiquido > 0){
        $('#idTdTotalPedido').addClass("text-teal");        
    }else{
        $('#idTdTotalPedido').removeClass("text-teal");  
    }

    $("#inputValorBruto").val(totalBruto.toLocaleString("pt-BR", {
        style: "decimal",
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    }));

    $("#inputValorLiq").val(totalLiquido.toLocaleString("pt-BR", {
        style: "decimal",
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    }));

    var quantParcela = $('#inputParcelas').val();

    var valorTotal = totalLiquido;
    var acumulado = 0;

    for (var i = 1; i <= quantParcela; i++) {

        valorParcela = round((valorTotal / quantParcela), 2);
        acumulado = acumulado + valorParcela;

        if (i == quantParcela && acumulado != valorTotal) {
            valorParcela = valorParcela + (valorTotal - acumulado);
        }

        $('#inputValorParcela' + i).val(valorParcela.toLocaleString("pt-BR", {
            style: "decimal",
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        }));

    }

};

$("#btnParcelas").click(function() {

var quantParcela = $('#inputParcelas').val();

var dataParcela = new Date(String($('#inputDataVencimento1').val().split('/').reverse().join(
    '-')));

var valorTotal = parseFloat(jQuery('#inputValorLiq').val() != '' ? (jQuery(
        '#inputValorLiq').val()
    .split('.').join('')).replace(',', '.') : 0);

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

    //Número de parcelamento     
    cols += '<div class="form-row"">';
    cols += '<div class="form-group col-md-12"">';
    cols += ' <h5><strong>Parcela: ' + i + '/' + quantParcela + '</strong></h5>';
    cols += '</div>';
    cols += '</div>';

    //Data de vencimento previsto
    cols += '<div class="form-row"">';
    cols += '<div class="form-group col-md-4">';
    cols += '<label class="control-label" for="inputDataVencimento' + i +
        '">Data de Vencimento <span class="text-danger">*</span></label>';
    cols += '<input type="text" class="form-control" id="inputDataVencimento' + i + '"';
    cols += 'name="DataVencimento[' + i + ']"';
    cols += 'value="' + dataParcela.toLocaleDateString('pt-BR', {
        timeZone: 'UTC'
    }) + '" required>';
    cols += '</div>';

    // Valor da parcela
    cols += '<div class="form-group col-md-4">';
    cols += '<label class="control-label" for="inputValorParcela' + i +
        '">Valor da Parcela <span class="text-danger">*</span></label>';
    cols += '<div class="input-group">';
    cols += '<div class="input-group-prepend">';
    cols += '<span class="input-group-text">R$</span>';
    cols += '</div>';
    cols += '<input class="form-control" id="inputValorParcela' + i +
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

    // Método de pegamento
    cols += '<div class="form-group col-md-4">';
    cols += '<label>Método de Pagamento</label>';
    cols += '<select class="selectpicker show-tick form-control"' +
            'data-live-search="true" data-actions-box="true"' +
            'title="Selecione um Método de Pagamento"' +
            'name="CodMetodoPagamento['  + i + ']" id="selectMetodoPag' + i + '"' +
            'data-style="btn-input-primary">';
    <?php foreach ($lista_metodo_pagamento as $key_metodo_pagamento => $metodo_pagamento) { ?>
    cols += '<option ' +
            'value="<?= $metodo_pagamento->cod_metodo_pagamento ?>" ' +
            '<?php if ($metodo_pagamento->cod_metodo_pagamento == set_value('CodMetodoPagamento')) echo "selected"; ?>> ' +
            '<?= $metodo_pagamento->cod_metodo_pagamento ?>' + '-' + '<?= $metodo_pagamento->nome_metodo_pagamento ?>'  +
            '</option>';
    <?php } ?>
    cols += '</select>';
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

$('.selectpicker').selectpicker('refresh');


return;

});

const round = (num, places) => {
    return +(parseFloat(num).toFixed(places));
}
</script>

<?php $this->load->view('gerais/footer'); ?>