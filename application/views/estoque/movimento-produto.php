<?php $this->load->view('gerais/header' , $menu); ?>
<?php $this->load->view('gerais/menu', $menu); ?>

<section>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('visao-geral') ?>">Visão Geral</a></li>
            <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>estoque/posicao-estoque">Posição de
                    Estoque</a></li>
            <li class="breadcrumb-item active">Movimentos do Produto</a></li>
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
                                        <?= $produto->cod_produto ?> - <?= $produto->nome_produto ?>
                                    </strong>
                                </h5>
                                <span class="badge bg-info-light"><?= $produto->nome_tipo_produto ?>
                                </span>
                                <?php  
                                    switch ($produto->tipo_controle) {
                                        case 1:
                                            echo "<span class='badge bg-light'>Controle Simples</span>";
                                            break;
                                        case 2:
                                            echo "<span class='badge bg-light'>Controle por Lote</span>";
                                            break;
                                        case 3:
                                            echo "<span class='badge bg-light'>Serviço</span>";
                                            break;
                                    }
                                ?>                                
                                <?php if($produto->saldo_negativo == 1) { ?>
                                <span class="badge bg-danger-light">Saldo Negativo</span>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">                                
                                <table class="table table-borderless table-sm">
                                    <tbody>
                                        <tr>
                                            <td class="text-left align-middle ">
                                                Quantidade em estoque
                                            </td>
                                            <td class="text-right align-middle <?php if($produto->quant_estoq > 0) echo "text-info"; ?>">
                                                <?php echo number_format((float) ($produto->quant_estoq), 3, ',', '.') . " " . $produto->cod_unidade_medida; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left align-middle ">
                                                Estoque mínimo
                                            </td>
                                            <td class="text-right align-middle">
                                                <?php echo number_format((float) ($produto->estoq_min), 3, ',', '.') . " " . $produto->cod_unidade_medida; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left align-middle ">
                                                Tempo de abastecimento
                                            </td>
                                            <td class="text-right align-middle">
                                                <?php echo number_format((float) ($produto->tempo_abastecimento), 0, ',', '.'); ?> dia<?php if($produto->tempo_abastecimento > 1) echo "s"; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left align-middle ">
                                                Custo médio
                                            </td>
                                            <td class="text-right align-middle <?php if($produto->custo_medio > 0) echo "text-danger"; ?>">
                                                R$ <?= number_format((float) ($produto->custo_medio), 2, ',', '.') ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left align-middle ">
                                                Preço de venda
                                            </td>
                                            <td class="text-right align-middle <?php if($produto->preco_venda > 0) echo "text-teal"; ?>">
                                                R$ <?= number_format((float) ($produto->preco_venda), 2, ',', '.') ?>
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
                                    <td class="text-left pt-0 text-dark"><strong>VALOR EM ESTOQUE</strong></td>
                                    <td 
                                        class="text-right pt-0 <?php if(($produto->quant_estoq * $produto->custo_medio) > 0) echo "text-teal"; ?>">
                                        <strong>
                                            R$
                                            <?= number_format((float) (($produto->quant_estoq * $produto->custo_medio)), 2, ',', '.') ?>
                                        </strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <form class="mb-0 needs-validation" novalidate
                              action="<?= base_url("estoque/posicao-estoque/movimento-produto/{$produto->cod_produto}") ?>"
                              method="GET">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <div class="form-row">
                                        <div class="form-group col-md-6 mb-0">
                                            <input class="form-control " id="inputDataInicio"
                                                   type="text" name="DataInicio"
                                                   value="<?= str_replace('-', '/', date("d-m-Y", strtotime($dataInicio))) ?>">
                                        </div>
                                        <div class="form-group col-md-6 mb-0">
                                            <input class="form-control " id="inputDataFim"
                                                   type="text" name="DataFim"
                                                   value="<?= str_replace('-', '/', date("d-m-Y", strtotime($dataFim))) ?>">
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit"
                                                class="btn btn-outline-primary btn-block btn-sm"><i class="fa-solid fa-rotate"></i> Atualizar Dados</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8 pl-0">
                <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#movimentos" role="tab"
                            aria-controls="home" aria-selected="true">Movimentos do Estoque</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link <?php if($produto->tipo_controle != 2) echo "disabled"; ?>" id="profile-tab" data-toggle="tab" href="#lote" role="tab"
                            aria-controls="profile" aria-selected="false">Lotes do Produto</a>
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
                                    <strong>Muito bem!</strong> <?= $this->session->flashdata('sucesso') ?>
                                </div>
                                <?php } $this->session->set_flashdata('sucesso', ''); ?>
                            </div>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="movimentos" role="tabpanel"
                                aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-xs-12">                                        
                                        <form class=" needs-validation mb-0" novalidate>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <button data-toggle="modal" data-target="#inserir-movimento"
                                                            data-backdrop="static"
                                                                type="button" class="btn btn-outline-info btn-sm"><i
                                                                    class="fas fa-plus-circle"></i> Inserir Movimento</button>
                                                        </div>
                                                    </div>
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered">
                                                            <thead class="thead-light">
                                                                <tr>
                                                                    <th scope="col" class="text-center">Data</th>
                                                                    <th scope="col">Tipo do movimento</th>
                                                                    <?php if($produto->tipo_controle == 2){ ?>
                                                                    <th scope="col" class="text-left">Lote</th>
                                                                    <?php }else{ ?>
                                                                    <th scope="col" class="text-center">Origem</th>
                                                                    <?php } ?>
                                                                    <th scope="col" class="text-right">Valor</th>
                                                                    <th scope="col" class="text-right">Quantidade</th>                                                                    
                                                                </tr>
                                                            </thead>
                                                            <tbody class="table-sm">
                                                                <?php foreach($lista_movimento as $key_movimento => $movimento) { ?>
                                                                <tr>
                                                                    <td class="text-center align-middle">
                                                                        <?= str_replace('-', '/', date("d-m-Y", strtotime($movimento->data_movimento))) ?>
                                                                    </td>
                                                                    <td class="align-middle ">
                                                                    <a href="#" data-toggle="modal" class="text-dark"
                                                                        data-target="#consulta-movimento<?= $movimento->cod_movimento_estoque ?>">
                                                                        <?php 
                                                                        switch ($movimento->especie_movimento) {
                                                                            case 1:
                                                                                echo "Estoque Inicial";
                                                                                break;
                                                                            case 2:
                                                                                echo "Reporte de Produção";
                                                                                break;
                                                                            case 3:
                                                                                echo "Consumo de Material";
                                                                                break;
                                                                            case 4:
                                                                                echo "Compra de Material";
                                                                                break;
                                                                            case 5:
                                                                                echo "Faturamento de Pedido";
                                                                                break;
                                                                            case 6:
                                                                                echo "Estorno de Produção";
                                                                                break;
                                                                            case 7:
                                                                                echo "Estorno de Cosumo";
                                                                                break;
                                                                            case 8:
                                                                                echo "Devolução de Compra";
                                                                                break;
                                                                            case 9:
                                                                                echo "Devolução de Venda";
                                                                                break;
                                                                            case 10:
                                                                                echo "Movimentos Diversos de Entrada";
                                                                                break;
                                                                            case 11:
                                                                                echo "Movimentos Diversos de Saída";
                                                                                break;
                                                                            case 12:
                                                                                echo "Entrada em Estoque Conta Azul";
                                                                                break;
                                                                            case 13:
                                                                                echo "Saída de Estoque Conta Azul";
                                                                                break;
                                                                            case 14:
                                                                                echo "Entrada por Acerto de Inventário";
                                                                                break;
                                                                            case 15:
                                                                                echo "Saída por Acerto de Inventário";
                                                                                break;
                                                                            case 16:
                                                                                echo "Requisição de Material";
                                                                                break;
                                                                            case 17:
                                                                                echo "Estorno de Requisição de Material";
                                                                                break;
                                                                            case 18:
                                                                                echo "Emissão de Nota Fiscal";
                                                                                break;
                                                                            case 19:
                                                                                echo "Cancelamento de Nota Fiscal";
                                                                                break;
                                                                        } 
                                                                    ?></a><br>
                                                                        <span class="badge bg-light">
                                                                            <?php 
                                                                        switch ($movimento->origem_movimento) {
                                                                            case 1:
                                                                                echo "Reporte de Produção";
                                                                                break;
                                                                            case 2:
                                                                                echo "Recebimento de Material";
                                                                                break;
                                                                            case 3:
                                                                                echo "Pedido de Venda";
                                                                                break;
                                                                            case 4:
                                                                                echo "Inventário";
                                                                                break;
                                                                            case 5:
                                                                                echo "Estoque";
                                                                                break;
                                                                            case 6:
                                                                                echo "Frente de Caixa";
                                                                                break;
                                                                            case 7:
                                                                                echo "Nota Fiscal";
                                                                                break;
                                                                        } 
                                                                    ?>
                                                                        </span>
                                                                    </td>
                                                                    <?php if($produto->tipo_controle == 2){ ?>
                                                                    <td class="text-left align-middle"><?= $movimento->cod_lote ?></td>
                                                                    <?php }else{ ?>
                                                                    <td class="text-center align-middle">
                                                                        <?= $movimento->id_origem ?>
                                                                    </td>
                                                                    <?php } ?>
                                                                    <td class="text-right align-middle <?php if($movimento->valor_movimento > 0) echo "text-info"; ?>">
                                                                        R$
                                                                        <?= number_format((float) ($movimento->valor_movimento), 2, ',', '.') ?>
                                                                    </td>
                                                                    <td class="text-right align-middle <?php if($movimento->tipo_movimento == 1) echo "text-teal"; else echo "text-danger"; ?>"
                                                                        <?php if($movimento->especie_movimento == 10 || $movimento->especie_movimento == 11){ ?>
                                                                        data-original-title="999" data-container="body"
                                                                        data-toggle="tooltip" data-placement="left"
                                                                        title="<?= $movimento->observacao ?>" <?php } ?>>
                                                                        <?php
                                                                        if($movimento->tipo_movimento == 1) echo "+"; else echo "-";
                                                                    ?>
                                                                        <?= number_format((float) ($movimento->quant_movimentada), 3, ',', '.') ?> <?= $produto->cod_unidade_medida ?>
                                                                    </td>                                                                    
                                                                </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <?php if ($lista_movimento == false) { ?>
                                                    <div class="text-center text-muted">
                                                        <p class="font-italic mt-3">Nenhum movimento realizado no período</p>
                                                    </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="lote">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-xs-12">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <button data-toggle="modal" data-target="#inserir-lote" type="button"
                                                    data-backdrop="static" data-keyboard="false"
                                                    class="btn btn-sm btn-outline-info"><i class="fas fa-plus-circle"></i> Novo
                                                    Lote</button>
                                                <button data-toggle="modal" data-target="#elimina-lote" type="button"
                                                    class="btn btn-outline-danger btn-sm" id="btnExcluir" disabled><i
                                                        class="fas fa-trash-alt"></i> Excluir</button>
                                            </div>
                                            <div class="col-md-3">
                                                <h4 class="font-italic mb-0 text-right text-danger" id="ValorTotalSel"></h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <form action="<?= base_url("estoque/posicao-estoque/excluir-lote/{$produto->cod_produto}") ?>" method="POST"
                                                    id="formDelete" class="mb-0 needs-validation" novalidate>
                                                    <table class="table table-bordered table-nf">
                                                        <thead class="thead-light">
                                                            <tr>
                                                                <th scope="col" class="text-center"><i
                                                                        class="fa-solid fa-check"></i>
                                                                </th>
                                                                <th scope="col" class="text-left">Lote</th>
                                                                <th scope="col" class="text-center">Validade</th>
                                                                <th scope="col" class="text-right">Dias de aviso</th>
                                                                <th scope="col" class="text-right">Estoque</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($lista_produto_lote as $key_produto_lote => $produto_lote) { ?>
                                                            <tr>
                                                                <td class="align-middle">
                                                                    <div class="checkbox text-center">
                                                                        <input name="excluir_todos[]" type="checkbox"
                                                                            value="<?= $produto_lote->cod_lote ?>"
                                                                            <?php if($produto_lote->quant_movimento > 0) echo "disabled"; ?> />
                                                                    </div>
                                                                </td>
                                                                <td scope="row" class="text-left align-middle">
                                                                <a href="#" class="text-dark"
                                                                   data-toggle="modal" data-backdrop="static"
                                                                   data-target="#inserir-lote<?= $produto_lote->cod_lote ?>">
                                                                    <?= $produto_lote->cod_lote ?>
                                                                </a>
                                                                </td>
                                                                <td class="text-center align-middle">
                                                                    <?= str_replace('-', '/', date("d-m-Y", strtotime($produto_lote->data_validade))) ?>
                                                                </td>
                                                                <td class="text-right text-dark">
                                                                    <?= $produto_lote->dias_aviso_venc ?>
                                                                </td>
                                                                <td class="text-right align-middle 
                                                                    <?php 
                                                                        if($produto_lote->quant_estoq > 0) echo "text-teal";
                                                                        elseif($produto_lote->quant_estoq < 0) echo "text-danger" ;  
                                                                    ?> ">
                                                                    <?= number_format((float) ($produto_lote->quant_estoq), 3, ',', '.') ?>
                                                                </td>
                                                            </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                    <?php if ($lista_produto_lote == false) { ?>
                                                    <div class="text-center text-muted">
                                                        <p class="font-italic mt-3">Nenhum lote do produto encontrado
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

<div class="modal fade" id="elimina-lote" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Eliminar lote</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Confirma eliminação dos lotes selecionados?
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger" form="formDelete">Confirma</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="inserir-movimento">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Inserir movimento</h5>
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
                                            action="<?= base_url("estoque/posicao-estoque/inserir-movimento/{$produto->cod_produto}") ?>"
                                            method="POST" id="InserirMovimento">
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="inputEspecieMovimento">Espécie do Movimento <span
                                                            class="text-danger">*</span></label>
                                                    <select id="inputEspecieMovimento" class="selectpicker show-tick form-control"
                                                        data-actions-box="true" title="Selecione uma Especie de Movimento"
                                                        name="EspecieMovimento" required>
                                                        <option value="10"
                                                            <?php if(set_value('EspecieMovimento') == "10") echo "selected"; ?>>
                                                            Movimentos Diversos de Entrada</option>
                                                        <option value="11"
                                                            <?php if(set_value('EspecieMovimento') == "11") echo "selected"; ?>>
                                                            Movimentos Diversos de Saída</option>
                                                    </select>
                                                </div>                                                
                                            </div>
                                            <?php if($produto->tipo_controle == 2){ ?>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="inputLote">Lote <span class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <select id="inputLote" class="selectpicker show-tick form-control"
                                                            data-live-search="true" data-actions-box="true" title="Selecione um Lote"
                                                            data-style="btn-input-primary" name="CodLote" required>
                                                            <?php foreach($lista_produto_lote_validade as $key_lote => $lote) { ?>
                                                            <option class="<?php if((date("Y-m-d", strtotime('-' . $lote->dias_aviso_venc . ' days', strtotime($lote->data_validade)))) <= date("Y-m-d") && $lote->data_validade != date("Y-m-d")) echo "text-warning";
                                                                                 elseif($lote->data_validade == date("Y-m-d")) echo "text-danger"; ?>"
                                                                value="<?= $lote->cod_lote ?>" class="limit-text-50"
                                                                <?php if($lote->cod_lote == set_value('CodLoteMov')) echo "selected"; ?>>
                                                                <?= $lote->cod_lote ?> -
                                                                <?= str_replace('-', '/', date("d-m-Y", strtotime($lote->data_validade))) ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <div class="input-group-append">
                                                            <a href="#" data-toggle="modal" data-target="#inserir-lote-ajax" type="button"
                                                            data-backdrop="static" data-keyboard="false"
                                                                class="btn btn-outline-info btn-block">Novo Lote</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } ?>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label class="control-label" for="inputDataMovimento">Data do Movimento <span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control" id="inputDataMovimento" type="text" name="DataMovimento"
                                                        value="<?php if(set_value('DataMovimento') == ""){
                                                                                echo str_replace('-', '/', date("d-m-Y"));
                                                                            }else{ echo set_value('DataMovimento'); } ?>" required>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="control-label" for="inputQtdeMovimento">Quantidade do
                                                        Movimento <span class="text-danger">*</span></label>
                                                    <input class="form-control" id="inputQtdeMovimento" type="text"
                                                        name="QuantMovimentada" data-mask="#.##0,000" data-mask-reverse="true"
                                                        value="<?= set_value('QuantMovimentada') ?>" required>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="control-label" for="inputValorMovimento">Valor do Movimento <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$</span>
                                                        </div>
                                                        <input type="text" class="form-control" class="form-control"
                                                            id="inputValorMovimento" type="text" name="ValorMovimento"
                                                            data-mask="#.##0,00" data-mask-reverse="true"
                                                            value="<?= set_value('ValorMovimento'); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="inputObservacao">Observação</label>
                                                    <textarea class="form-control" rows="3" id="inputObservacao"
                                                        name="Observacao"><?= set_value('Observacao'); ?></textarea>
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
                <button type="submit" class="btn btn-primary" form="InserirMovimento"><i class="fas fa-plus-circle"></i>
                    Inserir Movimento</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="inserir-lote-ajax">
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
                                                    <label class="control-label" for="inputCodLoteAjax">Código do Lote <span class="text-danger">*</span></label>
                                                    <input class="form-control" id="inputCodLoteAjax" type="text"
                                                        name="CodLote"
                                                        value="<?= set_value('CodLote') ?>" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label class="control-label" for="inputDataValidadeAjax">Data de Validade <span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control" id="inputDataValidadeAjax" type="text" name="DataValidade"
                                                        value="<?= str_replace('-', '/', date("d-m-Y", strtotime('+' . $produto->dias_vencimento . ' days', strtotime(date("d-m-Y"))))) ?>" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label" for="inputDiasAvisoAjax">Dias de aviso</label>
                                                    <input class="form-control" id="inputDiasAvisoAjax" type="text"
                                                        name="DiasAviso" data-mask="#.##0" data-mask-reverse="true"
                                                        value="10">
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
                <button type="submit" id="btnSalvarLote" class="btn btn-primary"><i class="fas fa-save"></i>
                    Salvar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="inserir-lote">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
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
                                            action="<?= base_url("estoque/posicao-estoque/inserir-lote/{$produto->cod_produto}") ?>"
                                            method="POST" id="InserirLote">
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label class="control-label" for="inputCodLote">Código do Lote <span class="text-danger">*</span></label>
                                                    <input class="form-control" id="inputCodLote" type="text"
                                                        name="CodLote"
                                                        value="<?= set_value('CodLote') ?>" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label class="control-label" for="inputDataValidade">Data de Validade <span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control" id="inputDataValidade" type="text" name="DataValidade"
                                                        value="<?= str_replace('-', '/', date("d-m-Y", strtotime('+' . $produto->dias_vencimento . ' days', strtotime(date("d-m-Y"))))) ?>" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label" for="inputDiasAviso">Dias de aviso</label>
                                                    <input class="form-control" id="inputDiasAviso" type="text"
                                                        name="DiasAviso" data-mask="#.##0" data-mask-reverse="true"
                                                        value="10">
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
                <button type="submit" class="btn btn-primary" form="InserirLote"><i class="fas fa-save"></i>
                    Salvar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<?php foreach ($lista_produto_lote as $key_produto_lote => $produto_lote) { ?>
<div class="modal fade" id="inserir-lote<?= $produto_lote->cod_lote ?>">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title">Editar lote</h5>
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
                                            action="<?= base_url("estoque/posicao-estoque/editar-lote/{$produto->cod_produto}/{$produto_lote->cod_lote}") ?>"
                                            method="POST" id="EditarLote<?= $produto_lote->cod_lote ?>">
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label class="control-label" for="inputCodLoteEdit<?= $produto_lote->cod_lote ?>">Código do Lote <span class="text-danger">*</span></label>
                                                    <input class="form-control" id="inputCodLoteEdit<?= $produto_lote->cod_lote ?>" type="text"
                                                        value="<?= $produto_lote->cod_lote ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label class="control-label" for="inputDataValidadeEdit<?= $produto_lote->cod_lote ?>">Data de Validade <span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control" id="inputDataValidadeEdit<?= $produto_lote->cod_lote ?>" type="text" name="DataValidade"
                                                        value="<?= str_replace('-', '/', date("d-m-Y", strtotime($produto_lote->data_validade))) ?>" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label" for="inputDiasAvisoEdit<?= $produto_lote->cod_lote ?>">Dias de aviso</label>
                                                    <input class="form-control" id="inputDiasAvisoEdit<?= $produto_lote->cod_lote ?>" type="text"
                                                        name="DiasAviso" data-mask="#.##0" data-mask-reverse="true"
                                                        value="<?= $produto_lote->dias_aviso_venc ?>">
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
                <button type="submit" class="btn btn-primary" form="EditarLote<?= $produto_lote->cod_lote ?>"><i class="fas fa-save"></i>
                    Salvar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<?php foreach($lista_movimento as $key_movimento => $movimento) { ?>
<div class="modal fade" id="consulta-movimento<?= $movimento->cod_movimento_estoque ?>">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Consultar movimento de estoque</h5>
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
                                                Movimento - <?= $movimento->cod_movimento_estoque ?>
                                            </strong>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php if($movimento->nome_usuario != null){ ?>
                                        <table class="table table-borderless table-sm mb-0">
                                            <tbody>
                                                <tr>
                                                    <td class="text-left align-middle">
                                                        Usuário movimento
                                                    </td>
                                                    <td class="text-right align-middle">
                                                        <?= $movimento->nome_usuario ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <?php } ?>
                                        <table class="table table-borderless table-sm mb-0">
                                            <tbody>
                                                <tr>
                                                    <td class="text-left align-middle">
                                                        Quantidade
                                                    </td>
                                                    <td class="text-right align-middle">
                                                        <strong class="<?php if($movimento->tipo_movimento == 1) echo "text-teal"; else echo "text-danger"; ?>"><?php if($movimento->tipo_movimento == 1) echo "+"; else echo "-"; ?><?= number_format((float) ($movimento->quant_movimentada), 3, ',', '.') ?> <?= $produto->cod_unidade_medida ?></strong>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table table-borderless table-sm mb-0">
                                            <tbody>
                                                <tr>
                                                    <td class="text-left align-middle ">
                                                        Valor de material
                                                    </td>
                                                    <td class="text-right align-middle">
                                                        R$ <?= number_format((float) ($movimento->custo_mat), 2, ',', '.') ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle ">
                                                        Valor de mão de obra
                                                    </td>
                                                    <td class="text-right align-middle">
                                                        R$ <?= number_format((float) ($movimento->custo_mob), 2, ',', '.') ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle ">
                                                        Valor total
                                                    </td>
                                                    <td class="text-right align-middle text-info">
                                                        <strong>R$ <?= number_format((float) ($movimento->valor_movimento), 2, ',', '.') ?></strong>
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
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Data do Movimento</label>
                                                <input type="text" class="form-control"
                                                        value="<?= str_replace('-', '/', date("d-m-Y", strtotime($movimento->data_movimento))) ?>" readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Lote</label>
                                                <input type="text" class="form-control"
                                                        value="<?= $movimento->cod_lote ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label>Espécie do Movimento</label>
                                                <input type="text" class="form-control"
                                                        value="<?php 
                                                                        switch ($movimento->especie_movimento) {
                                                                            case 1:
                                                                                echo "Estoque Inicial";
                                                                                break;
                                                                            case 2:
                                                                                echo "Reporte de Produção";
                                                                                break;
                                                                            case 3:
                                                                                echo "Consumo de Material";
                                                                                break;
                                                                            case 4:
                                                                                echo "Compra de Material";
                                                                                break;
                                                                            case 5:
                                                                                echo "Faturamento de Pedido";
                                                                                break;
                                                                            case 6:
                                                                                echo "Estorno de Produção";
                                                                                break;
                                                                            case 7:
                                                                                echo "Estorno de Cosumo";
                                                                                break;
                                                                            case 8:
                                                                                echo "Devolução de Compra";
                                                                                break;
                                                                            case 9:
                                                                                echo "Devolução de Venda";
                                                                                break;
                                                                            case 10:
                                                                                echo "Movimentos Diversos de Entrada";
                                                                                break;
                                                                            case 11:
                                                                                echo "Movimentos Diversos de Saída";
                                                                                break;
                                                                            case 12:
                                                                                echo "Entrada em Estoque Conta Azul";
                                                                                break;
                                                                            case 13:
                                                                                echo "Saída de Estoque Conta Azul";
                                                                                break;
                                                                            case 14:
                                                                                echo "Entrada por Acerto de Inventário";
                                                                                break;
                                                                            case 15:
                                                                                echo "Saída por Acerto de Inventário";
                                                                                break;
                                                                            case 16:
                                                                                echo "Requisição de Material";
                                                                                break;
                                                                            case 17:
                                                                                echo "Estorno de Requisição de Material";
                                                                                break;
                                                                            case 18:
                                                                                echo "Emissão de Nota Fiscal";
                                                                                break;
                                                                            case 19:
                                                                                echo "Cancelamento de Nota Fiscal";
                                                                                break;
                                                                        } 
                                                                    ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-8">
                                                <label>Origem do Movimento</label>
                                                <input type="text" class="form-control"
                                                        value="<?php 
                                                                        switch ($movimento->origem_movimento) {
                                                                            case 1:
                                                                                echo "Reporte de Produção";
                                                                                break;
                                                                            case 2:
                                                                                echo "Recebimento de Material";
                                                                                break;
                                                                            case 3:
                                                                                echo "Pedido de Venda";
                                                                                break;
                                                                            case 4:
                                                                                echo "Inventário";
                                                                                break;
                                                                            case 5:
                                                                                echo "Estoque";
                                                                                break;
                                                                            case 6:
                                                                                echo "Frente de Caixa";
                                                                                break;
                                                                            case 7:
                                                                                echo "Nota Fiscal";
                                                                                break;
                                                                        } 
                                                                    ?>" readonly>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>ID Movimento</label>
                                                <input type="text" class="form-control"
                                                        value="<?= $movimento->id_origem ?>" readonly>
                                            </div>
                                        </div>                                        
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label>Observação</label>
                                                <textarea class="form-control" rows="3" readonly><?= $movimento->observacao ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-row"> 
                                            <div class="form-group col-md-12">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="checkConsideraCalc"
                                                    <?php if($movimento->considera_calc_custo == 0) echo "checked" ?> disabled>
                                                    <label class="custom-control-label" for="checkConsideraCalc">Considera no cálculo de custo</label>
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
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
<?php } ?>



<script>
$('.page-item>a').addClass("page-link");

$("[name='excluir_todos[]']").click(function() {
    var cont = $("[name='excluir_todos[]']:checked").length;
    $("#btnExcluir").prop("disabled", cont ? false : true);
});

$(function() {
    $.applyDataMask();
});

$('#inputDataInicio').datepicker({
    uiLibrary: 'bootstrap4'
});

$('#inputDataFim').datepicker({
    uiLibrary: 'bootstrap4'
});

$('#inputEspecieMovimento').selectpicker({
    style: 'btn-input-primary'
});

$('#inputDataMovimento').datepicker({
    uiLibrary: 'bootstrap4'
});

$('#inputDataValidade').datepicker({
    uiLibrary: 'bootstrap4'
});

$('#inputDataValidadeAjax').datepicker({
    uiLibrary: 'bootstrap4'
});

<?php foreach ($lista_produto_lote as $key_produto_lote => $produto_lote) { ?>
    $('#inputDataValidadeEdit<?= $produto_lote->cod_lote ?>').datepicker({
        uiLibrary: 'bootstrap4'
    });
<?php } ?>

$("#btnSalvarLote").click(function() {

    var baseurl = "<?php echo base_url(); ?>";

    var codProduto = "<?= $produto->cod_produto ?>";
    var codLote = $("#inputCodLoteAjax").val();
    var dataValidade = $("#inputDataValidadeAjax").val();
    var diasAviso = $("#inputDiasAvisoAjax").val();

    $.post(baseurl + "ajax/inserir-lote", {
        codProduto: codProduto,
        codLote: codLote,
        dataValidade: dataValidade,
        diasAviso: diasAviso,
    }, function(data) {
        $('#inserir-lote-ajax').modal('hide');

        console.log(data);

        $("#inputLote").html(data);
        $("#inputLote").removeAttr('disabled');
        $('#inputLote').selectpicker('refresh');
        $("#inputLote").selectpicker('val', $('option:contains("' + codLote + ' - ' + dataValidade + '")').val());
    });
});

</script>

<?php $this->load->view('gerais/footer'); ?>