<?php $this->load->view('gerais/header', $menu); ?>
<?php $this->load->view('gerais/menu', $menu); ?>

<section>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('visao-geral') ?>">Visão Geral</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url('vendas') ?>">Vendas</a></li>
            <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>vendas/faturamento-pedido">Faturamento
                    de Pedido</a></li>
            <li class="breadcrumb-item active"><a
                    href="<?php echo base_url() ?>vendas/faturamento-pedido/novo-faturamento-pedido/<?= $faturamento->num_pedido_venda ?>">Novo
                    Faturamento de Pedido</a></li>
            <li class="breadcrumb-item active">Emissão Nota Fiscal</a></li>
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
                                        <?= $pedido->cod_cliente ?> - <?= $pedido->nome_cliente ?>
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
                                            <td class="text-left align-middle ">
                                                Pedido
                                            </td>
                                            <td class="text-right align-middle">
                                                <strong><?= $faturamento->num_pedido_venda ?></strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left align-middle ">
                                                Faturamento
                                            </td>
                                            <td class="text-right align-middle">
                                                <?= $faturamento->cod_faturamento_pedido ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left align-middle ">
                                                Data faturamento
                                            </td>
                                            <td class="text-right align-middle">
                                                <?= str_replace('-', '/', date("d-m-Y", strtotime($faturamento->data_faturamento))) ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <?php if($faturamento->cod_vendedor != 0) { ?>
                                        <table class="table table-borderless table-sm mb-0">
                                            <tbody>
                                                <tr>
                                                    <td class="text-left align-middle ">
                                                        Vendedor
                                                    </td>
                                                    <td class="text-right align-middle">
                                                        <?= $faturamento->nome_vendedor ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle ">
                                                        Comissão
                                                    </td>
                                                    <td class="text-right align-middle <?php if($faturamento->perc_comissao > 0) echo "text-info"; else echo "text-muted"; ?>">
                                                        <?= number_format($faturamento->perc_comissao, 2, ',', '.') ?>%
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <?php } ?>
                                <?php if($faturamento->cod_transportador != 0) { ?>
                                <table class="table table-borderless table-sm mb-0">
                                    <tbody>
                                        <tr>
                                            <td class="text-left align-middle ">
                                                Transportador
                                            </td>
                                            <td class="text-right align-middle">
                                                <?= $faturamento->nome_transportador ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <?php } ?>  
                                <table class="table table-borderless table-sm">
                                    <tbody>
                                        <tr>
                                            <td class="text-left align-middle">
                                                Total em produtos
                                            </td>
                                            <td
                                                class="text-right align-middle <?php if($faturamento->valor_total > 0) echo "text-teal"; else echo "text-muted"; ?>">
                                                R$ <?= number_format($faturamento->valor_total, 2, ',', '.') ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left align-middle ">
                                                Frete <?php if($faturamento->tipo_frete == 1) echo "CIF"; else echo "FOB"; ?>
                                            </td>
                                            <td
                                                class="text-right align-middle <?php if($faturamento->valor_frete > 0) echo "text-teal"; else echo "text-muted"; ?>">
                                                R$ <?= number_format($faturamento->valor_frete, 2, ',', '.') ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left align-middle">
                                                Seguro
                                            </td>
                                            <td
                                                class="text-right align-middle <?php if($faturamento->valor_seguro > 0) echo "text-teal"; else echo "text-muted"; ?>">
                                                R$ <?= number_format($faturamento->valor_seguro, 2, ',', '.') ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left align-middle ">
                                                Outras despesas
                                            </td>
                                            <td
                                                class="text-right align-middle <?php if($faturamento->outras_despesas > 0) echo "text-teal"; else echo "text-muted"; ?>">
                                                R$ <?= number_format($faturamento->outras_despesas, 2, ',', '.') ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left align-middle">
                                                Desconto
                                            </td>
                                            <td
                                                class="text-right align-middle <?php if($faturamento->valor_desconto > 0) echo "text-danger"; else echo "text-muted"; ?>">
                                                R$ <?= number_format($faturamento->valor_desconto, 2, ',', '.') ?>
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
                                    <td class="text-left pt-0 text-dark"><strong>TOTAL FATURADO</strong></td>
                                    <td
                                        class="text-right pt-0 <?php if($pedido->valor_total_faturado > 0) echo "text-teal"; ?>">
                                        <strong>
                                            R$ <?= number_format($faturamento->valor_total + $faturamento->valor_frete + $faturamento->valor_seguro + $faturamento->outras_despesas -
                                                      $faturamento->valor_desconto, 2, ',', '.') ?>
                                        </strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php if($faturamento->observacoes != "") { ?>
                <div class="card  mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <p class="card-text text-muted mb-0">Observação</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <?= $faturamento->observacoes ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <div class="card  mb-3">
                    <div class="card-body">
                    <div class="row">
                        <div class="col-md-6"> 
                        <?php if (empty($cStat)) { ?>
                            <button type="button" class="btn btn-outline-info btn-block" data-toggle="modal"
                                    data-target="#exampleModal"
                                    <?php echo((strlen($xml) == 0) ? 'disabled="disabled"' : '') ?>>Simular XML
                            </button>
                        </div>
                        <div class="col-md-6">
                            <button type="button" class="btn btn-outline-info btn-block" id="imprimir"
                                    <?php echo((strlen($xml) == 0) ? 'disabled="disabled"' : '') ?>>Simular DaNFe
                            </button>
                            <?php
                                }
                            ?>
                            <?php
                                if (!empty($cStat) && ($cStat >= 100 && $cStat < 200)) {
                            ?>
                                A nota fiscal não pode ser mais alterada, status atual: <?php echo $cStat ?>
                            <?php
                            }
                            ?>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 pl-0">
                <div class="card  mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-xs-12">
                                <?php if ($this->session->flashdata('erro') <> "") { ?>
                                <div class="alert alert-danger alert-dismissible fade show" id="alert" role="alert">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>Atenção!</strong> <?php echo $this->session->flashdata('erro') ?>
                                </div>
                                <?php }
                  $this->session->set_flashdata('erro', ''); ?>
                                <?php if ($this->session->flashdata('sucesso') <> "") { ?>
                                <div class="alert alert-success alert-dismissible fade show" id="alert" role="alert">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>Muito bem!</strong>
                                    <?php echo $this->session->flashdata('sucesso') ?>
                                </div>
                                <?php }
                  $this->session->set_flashdata('sucesso', ''); ?>
                                <form class="mb-0 needs-validation" novalidate
                                    action="<?php echo base_url('faturamento/pedido/configurar-nfe-submit') ?>"
                                    method="POST" id="ConfigureNatureza">
                                    <input type="hidden" value="<?php echo $nota->id ?>" name="nota_fiscal_id" />                                    
                                    <div class="form-row">
                                        <div class="form-group col-md-9">
                                            <label for="inputCliente">Natureza de Operação <span
                                                    class="text-danger">*</span></label>
                                            <select id="inputCliente" class="selectpicker show-tick form-control"
                                                data-live-search="true" data-actions-box="true"
                                                title="Selecione uma Natureza" data-style="btn-input-primary"
                                                name="CodNatureza" required>
                                                <?php foreach ($naturezas as $key => $row) { ?>
                                                <option value="<?php echo $row->id ?>"
                                                    <?php if ($row->id == $nota->tb_fis_natureza_operacao_id) echo "selected"; ?>>
                                                    <?php echo $row->descricao ?> -
                                                    <?php echo $row->nome ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="inputDataFaturamento">Data de Emissão <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" id="inputDataFaturamento" type="text"
                                                name="DataFaturamento"
                                                value="<?= str_replace('-', '/', date("d-m-Y", strtotime($faturamento->data_faturamento))) ?>"
                                                required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="indicadorFinal">Pedido Cliente (xPed)</label>
                                            <input class="form-control" id="inputPedidoCliente" type="text"
                                                name="PedidoCliente"
                                                value="<?= $nota->x_ped ?>">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="indicadorFinal">Consumidor</label>
                                            <select class="form-control selectpicker show-tick"
                                                data-style="btn-input-primary" id="indicadorFinal"
                                                name="indicadorFinal">
                                                <?php foreach ($indicadorFinal as $key => $name) { ?>
                                                <option value="<?php echo $key ?>"
                                                    <?php if ($key == $nota->indicador_final) echo "selected"; ?>>
                                                    <?php echo $name ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="indicadorPresencial">Indicador de Presença</label>
                                            <select class="form-control selectpicker show-tick"
                                                data-style="btn-input-primary" id="indicadorPresencial"
                                                name="indicadorPresencial">
                                                <?php foreach ($indicadorPresencial as $key => $name) { ?>
                                                <option value="<?php echo $key ?>"
                                                    <?php if ($key == $nota->indicador_presencial) echo "selected"; ?>>
                                                    <?php echo $name ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="tipoNfe">Informações Complementares</label>
                                            <textarea name="informacoesComplementares" rows="4"
                                                class="form-control"><?php echo $nota->informacoes_complementares ;?></textarea>
                                        </div>
                                    </div>
                                    <hr>
                                    <div>
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" href="#nf-2">Produtos da
                                                    Nota</a>
                                            </li>
                                            <?php if($faturamento->cod_transportador != 0 ) { ?>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#nf-3">Transportador</a>
                                            </li>
                                            <?php } ?>
                                            <?php if($pedido->tipo_pessoa == 3 ) { ?>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#nf-4">Exportação</a>
                                            </li>
                                            <?php } ?>
                                            <?php if($titulos != null) { ?>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#nf-5">Duplicatas</a>
                                            </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                    <div class="tab-content">
                                        <!-- Produtos início-->
                                        <div class="tab-pane fade active show" id="nf-2">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered">
                                                            <thead class="thead-light">
                                                                <tr>
                                                                    <th>Produto de venda</th>
                                                                    <th class="text-right">Quantidade</th>
                                                                    <th class="text-right">Valor unitário</th>
                                                                    <th class="text-right">Total da venda</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($produtos as $key_faturamento_produto => $produto) {
                                                                ?>
                                                                <tr>
                                                                    <td class="align-middle"><?= $produto->cod_produto ?> - <?= $produto->nome_produto ?></td>
                                                                    <td class="text-right align-middle text-info">
                                                                        <?php echo number_format($produto->quantidade, 3, ',', '.') ?> <?php echo $produto->cod_unidade_medida ?>
                                                                    </td>
                                                                    <td class="text-right align-middle">
                                                                        R$
                                                                        <?php echo number_format($produto->valor_unitario, 2, ',', '.') ?>
                                                                    </td>
                                                                    <td class="text-right text-teal align-middle">
                                                                        R$
                                                                        <?php echo number_format($produto->valor_total_produtos, 2, ',', '.') ?>
                                                                    </td>
                                                                </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <?php if ($produtos == false) { ?>
                                                    <div class="text-center text-muted">
                                                        <p class="font-italic mt-3">Nenhum produto para faturar</p>
                                                    </div>
                                                    <?php } ?>
                                                </div>

                                            </div>
                                        </div>
                                        <!-- Produtos início-->
                                        <?php if($faturamento->cod_transportador != 0 ) { ?>
                                        <div class="tab-pane fade" id="nf-3">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-row mt-3">
                                                        <div class="form-group col-md-6">
                                                            <label for="inputTransportadora">Transportador</label>
                                                            <input type="text" class="form-control"
                                                                id="inputTransportadora"
                                                                value="<?= $transportador->cod_transportador ?> - <?= $transportador->nome_transportador ?>"
                                                                readonly>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="inputCNPJTransportador">CNPJ/CPF</label>
                                                            <input type="text" class="form-control"
                                                                id="inputCNPJTransportador"
                                                                value="<?= $transportador->cnpj_cpf ?>" readonly>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="inputInscEstadualTrans">Inscrição Estual</label>
                                                            <input type="text" class="form-control"
                                                                id="inputInscEstadualTrans"
                                                                value="<?= $transportador->insc_estadual ?>" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-4">
                                                            <label for="inputQuantidade">Quantidade</label>
                                                            <input type="text" class="form-control" id="inputQuantidade"
                                                                value="<?= $nota->quant_volume ?>" name="Quantidade">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="inputEspecie">Espécie</label>
                                                            <input type="text" class="form-control"
                                                                id="inputEspecie"
                                                                value="<?= $nota->especie_volume ?>" name="Especie">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="inputMarca">Marca</label>
                                                            <input type="text" class="form-control"
                                                                id="inputMarca"
                                                                value="<?= $nota->marca ?>" name="Marca">
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-4">
                                                            <label for="inputCodAntt">Código ANTT</label>
                                                            <input type="text" class="form-control" id="inputCodAntt"
                                                                value="<?= $nota->cod_antt ?>" name="CodAntt">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="inputPlacaVeiculo">Placa Veículo</label>
                                                            <input type="text" class="form-control"
                                                                id="inputPlacaVeiculo"
                                                                value="<?= $nota->placa_veiculo ?>" name="PlacaVeiculo">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="inputUFVeiculo">UF Veículo</label>
                                                            <select class="form-control selectpicker show-tick"
                                                                data-live-search="true" title="Selecione a UF"
                                                                data-style="btn-input-primary" id="inputUFVeiculo"
                                                                name="UFVeiculo">
                                                                <?php foreach($estado as $key_estado => $estado_veiculo) { ?>
                                                                <option value="<?= $estado_veiculo->uf ?>"
                                                                    <?php if($estado_veiculo->uf === $nota->uf_veiculo) echo "selected"; ?>>
                                                                    <?= $estado_veiculo->uf ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        <?php if($pedido->tipo_pessoa == 3 ) { ?>
                                        <div class="tab-pane fade" id="nf-4">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-row mt-3">
                                                        <div class="form-group col-md-6">
                                                            <label for="inputLocalEmbarque">Local de Embarque</label>
                                                            <input type="text" class="form-control"
                                                                id="inputLocalEmbarque" name="LocalEmbarque"
                                                                value="<?= $nota->local_embarque ?>">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="inputUFEmbarque">UF Embarque</label>
                                                            <select class="form-control selectpicker show-tick"
                                                                data-live-search="true" title="Selecione a UF"
                                                                data-style="btn-input-primary" id="inputUFEmbarque"
                                                                name="UFEmbarque">
                                                                <?php foreach($estado as $key_estado => $estado_emb) { ?>
                                                                <option value="<?= $estado_emb->uf ?>"
                                                                    <?php if($estado_emb->uf === $nota->uf_embarque) echo "selected"; ?>>
                                                                    <?= $estado_emb->uf ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                            
                                        </div>
                                        <?php } ?>
                                        <?php if($titulos != null) { ?>
                                        <div class="tab-pane fade" id="nf-5">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <table class="table table-bordered">
                                                        <thead class="thead-light">
                                                            <tr>
                                                                <th scope="col" class="text-center">Vencimento</th>
                                                                <th scope="col">Descrição</th>
                                                                <th scope="col" class="text-center">Parcela</th>
                                                                <th scope="col" class="text-right">Valor</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($titulos as $key_titulos => $titulo) {
                                                            ?>
                                                            <tr>
                                                                <td class="text-center align-middle">
                                                                    <?= str_replace('-', '/', date("d-m-Y", strtotime($titulo->data_vencimento))) ?>
                                                                </td>
                                                                <td class="limit-text-50 align-middle" data-toggle="tooltip"
                                                                    data-placement="bottom"
                                                                    title="<?= $titulo->desc_movimento ?>">
                                                                    <?= $titulo->desc_movimento ?>                                                                    
                                                                </td>
                                                                <td class="text-center align-middle">
                                                                    <?= $titulo->parcela ?>
                                                                </td>
                                                                <td class="text-right text-teal align-middle">
                                                                    R$
                                                                    <?= number_format($titulo->valor_titulo, 2, ',', '.') ?>
                                                                </td>
                                                            </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                    <?php if ($titulos == false) { ?>
                                                    <div class="text-center text-muted">
                                                        <p class="font-italic mt-3">Nenhum título emitido</p>
                                                    </div>
                                                    <?php } ?>
                                                </div>

                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                    <hr class="mb-3">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <?php
                                            if (empty($cStat) || $cStat > 200) { ?>
                                            <button type="submit" form="ConfigureNatureza"
                                                class="btn btn-primary" name="Opcao" value="salvar"><i
                                                    class="fas fa-save"></i> Salvar
                                            </button>                                            
                                            <?php } ?>                                            
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row float-right">
                                                <div class="col-md-12">
                                                    <?php
                                                    if (empty($cStat) || $cStat > 200) { ?>      
                                                    <a href="<?php echo base_url("faturamento/pedido/emitir-nfe/" . $nota->id) ?>"
                                                        class="btn btn-teal link-load"><i class="fa-solid fa-check"></i>
                                                        Emitir NF
                                                    </a>                                               
                                                    <a href="<?php echo base_url("faturamento/pedido/cancelar-emissao-nfe/" . $nota->id . "/" .
                                                           $nota->num_pedido_venda) ?>"
                                                        class="btn btn-danger link-load" title="Cancelar Emissão">
                                                        <i class="fas fa-trash"></i> Cancelar NF
                                                    </a>
                                                    <?php } ?>
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Simulador XML NF-e</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <pre
                        style="font-family: monospace; overflow-y: scroll; height: 400px; background-color: #f5efea"><?php echo $xml ?></pre>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnDownload" class="btn btn-warning"><i
                                        class="fa-regular fa-file-code"></i> Download do XML</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

</section>


<script>
$.applyDataMask();

$('#inputDataFaturamento').datepicker({
    uiLibrary: 'bootstrap4'
});

$('#inputDateEmissao').datepicker({
    uiLibrary: 'bootstrap4'
});

$('#inputDateEntrega').datepicker({
    uiLibrary: 'bootstrap4'
});

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

        iframe.src = "<?= base_url("faturamento/pedido/danfe/" . $nota->id) ?>";
    });
});


</script>

<?php $this->load->view('gerais/footer'); ?>