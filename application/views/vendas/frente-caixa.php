<?php $this->load->view('gerais/header' , $menu); ?>
<?php $this->load->view('gerais/menu', $menu); ?>

<section>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('visao-geral') ?>">Visão Geral</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('vendas') ?>">Vendas</a></li>
            <li class="breadcrumb-item active">Frente de Caixa</li>
        </ol>
    </div>
</section>


<section>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card  mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <a href="<?= base_url("vendas/frente-caixa/{$diaAnterior}") ?>"
                                            class="btn btn-secondary link-load"><i
                                                class="fas fa-angle-left"></i></a>
                                    </div>
                                    <input type="text" class="form-control search text-center filtro-data"
                                        value="<?= $descDia ?> de <?= $descMes ?> de <?= $descAno ?>" name="dataCaixa" readonly>
                                    <div class="input-group-append">
                                        <button data-toggle="modal" data-target="#dia-caixa" type="button" class="btn btn-dark"><i class="fa-solid fa-magnifying-glass"></i></button>
                                    </div>
                                    <div class="input-group-append">
                                        <a href="<?= base_url("vendas/frente-caixa/{$diaSeguinte}") ?>"
                                            class="btn btn-secondary link-load"><i
                                                class="fas fa-angle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card  mb-3">
                    <h6 class="card-header bg-white text-muted">
                        Totais do dia
                    </h6>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-borderless table-sm">
                                    <tbody>
                                        <tr>
                                            <td>Saldo inicial</td>
                                            <td
                                                class="text-right <?php if($frente_caixa == true && $frente_caixa->saldo_inicial > 0) echo "text-teal"; else echo "text-muted"; ?>">
                                                R$
                                                <?php 
                                                    if($frente_caixa == true)
                                                        echo number_format($frente_caixa->saldo_inicial, 2, ',', '.');
                                                    else
                                                        echo number_format(0, 2, ',', '.');
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Recolhimento</td>
                                            <td
                                                class="text-right <?php if($frente_caixa == true && $frente_caixa->total_recolhimento > 0) echo "text-danger"; else echo "text-muted"; ?>">
                                                R$
                                                <?php 
                                                    if($frente_caixa == true)
                                                        echo number_format($frente_caixa->total_recolhimento, 2, ',', '.');
                                                    else
                                                        echo number_format(0, 2, ',', '.');
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Incremento</td>
                                            <td
                                                class="text-right <?php if($frente_caixa == true && $frente_caixa->total_incremento > 0) echo "text-teal"; else echo "text-muted"; ?>">
                                                R$
                                                <?php 
                                                    if($frente_caixa == true)
                                                        echo number_format($frente_caixa->total_incremento, 2, ',', '.');
                                                    else
                                                        echo number_format(0, 2, ',', '.');
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Total em vendas</td>
                                            <td
                                                class="text-right <?php if($frente_caixa == true && $frente_caixa->total_venda > 0) echo "text-teal"; else echo "text-muted"; ?>">
                                                R$
                                                <?php 
                                                    if($frente_caixa == true)
                                                        echo number_format($frente_caixa->total_venda, 2, ',', '.');
                                                    else
                                                        echo number_format(0, 2, ',', '.');
                                                ?>
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
                                    <td class="text-left pt-0 text-dark"><strong>SALDO FINAL</strong></td>
                                    <td class="text-right pt-0 <?php 
                                                                    if($frente_caixa == true){
                                                                        if($frente_caixa->saldo_inicial + $frente_caixa->total_venda + $frente_caixa->total_incremento - $frente_caixa->total_recolhimento > 0)
                                                                            echo "text-teal";
                                                                        elseif($frente_caixa->saldo_inicial + $frente_caixa->total_venda + $frente_caixa->total_incremento - $frente_caixa->total_recolhimento == 0)
                                                                            echo "text-dark";
                                                                        else
                                                                            echo "text-danger";
                                                                    } ?>">
                                        <strong>
                                            R$
                                            <?php 
                                                    if($frente_caixa <> null)
                                                        echo number_format($frente_caixa->saldo_inicial + $frente_caixa->total_venda + $frente_caixa->total_incremento - $frente_caixa->total_recolhimento, 2, ',', '.');
                                                    else
                                                        echo number_format(0, 2, ',', '.');
                                                ?>
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
                            <div class="col-md-12">
                                <?php if($frente_caixa == false ){?>
                                <button data-toggle="modal" data-target="#abrir-caixa" type="button"
                                    class="btn btn-primary btn-block"><i class="fas fa-cash-register"></i>
                                    Abrir Caixa
                                </button>
                                <?php }elseif($frente_caixa->data_hora_fechamento == null){?>
                                <button data-toggle="modal" data-target="#fechar-caixa" type="button"
                                    class="btn btn-teal btn-block" data-backdrop="static" data-keyboard="false"
                                    <?php if($frente_caixa->saldo_inicial + $frente_caixa->total_venda + $frente_caixa->total_incremento - $frente_caixa->total_recolhimento < 0) echo "disabled"; ?>><i
                                        class="fas fa-cash-register"></i>
                                    Fechar Caixa
                                </button>
                                <?php }elseif($frente_caixa->data_hora_fechamento != null){?>
                                <button data-toggle="modal" data-target="#reabrir-caixa" type="button"
                                    class="btn btn-warning btn-block"><i class="fas fa-cash-register"></i>
                                    Reabrir Caixa
                                </button>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 pl-0">
                <div lass="row">
                    <ul class="nav nav-tabs mb-3">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#venda">Venda de
                                Caixa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#incremento">Incremento /
                                Recolhimento</a>
                        </li>
                    </ul>
                </div>
                <div class="card  mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="tab-content">
                                    <div class="tab-pane fade active show" id="venda">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <a href="<?php echo base_url("vendas/frente-caixa/{$dia}/nova-venda-caixa") ?>"
                                                    type="button"
                                                    class="link-load btn btn-outline-info btn-sm <?php if($frente_caixa == false || $frente_caixa->data_hora_fechamento != null) echo "disabled"; ?>"><i
                                                        class="fas fa-plus-circle"></i> Nova
                                                    Venda</a>
                                                <button data-toggle="modal" data-target="#estorna-venda" type="button"
                                                    class="btn btn-outline-danger btn-sm" id="btnEstornarVenda"
                                                    disabled><i class="fas fa-undo"></i>
                                                    Estornar</button>
                                            </div>
                                            <?php if($frente_caixa != false && $frente_caixa->data_hora_fechamento != null){?>
                                            <div class="col-md-6 ">
                                                <div class="row float-right">
                                                    <div class="col-md-12">
                                                        <a href="#" type="button" class="btn btn-outline-warning btn-sm"
                                                            id="btnImprimir"><i class="fas fa-print"></i> Imprimir
                                                            Fechamento</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <?php if ($this->session->flashdata('erro') <> ""){ ?>
                                                <div class="alert alert-danger alert-dismissible fade show mt-2 mb-0"
                                                    id="alert" role="alert">
                                                    <button type="button" class="close"
                                                        data-dismiss="alert">&times;</button>
                                                    <strong>Atenção!</strong> <?= $this->session->flashdata('erro') ?>
                                                </div>
                                                <?php } $this->session->set_flashdata('erro', ''); ?>
                                                <?php if ($this->session->flashdata('sucesso') <> ""){ ?>
                                                <div class="alert alert-success alert-dismissible fade show mt-2 mb-0"
                                                    id="alert" role="alert">
                                                    <button type="button" class="close"
                                                        data-dismiss="alert">&times;</button>
                                                    <strong>Muito bem!</strong>
                                                    <?= $this->session->flashdata('sucesso') ?>
                                                </div>
                                                <?php } $this->session->set_flashdata('sucesso', ''); ?>
                                                <form
                                                    action="<?= base_url("vendas/frente-caixa/estorno-venda/{$dia}") ?>"
                                                    method="POST" id="formEstornaVendas" class="mb-0 needs-validation"
                                                    novalidate>
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered table-nf">
                                                            <thead class="thead-light">
                                                                <tr>
                                                                    <th scope="col" class="text-center"><i
                                                                            class="fa-solid fa-check"></i></th>
                                                                    <th scope="col" class="text-center">Venda</th>
                                                                    <th scope="col">Cliente</th>
                                                                    <th scope="col" class="text-right">Valor da Venda</th>
                                                                    <th scope="col" class="text-right">Dinheiro
                                                                    </th>
                                                                    <th scope="col" class="text-center"><i
                                                                            class="fa-solid fa-ellipsis"></i></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="table-sm">
                                                                <?php foreach($venda_caixa as $key_venda_caixa => $venda) { ?>
                                                                <tr>
                                                                    <td class="align-middle">
                                                                        <div class="checkbox text-center">
                                                                            <input name="selecionar_vendas[]"
                                                                                type="checkbox"
                                                                                <?php if($frente_caixa->data_hora_fechamento != null || $venda->c_stat == 100) echo "disabled"; ?>
                                                                                value="<?= $venda->num_venda_caixa ?>"
                                                                                <?php if($venda->status == 3) echo "disabled"; ?> />
                                                                        </div>
                                                                    </td>
                                                                    <td class="text-center align-middle">
                                                                        <a class="link-load text-dark"
                                                                            href="<?= base_url("vendas/frente-caixa/editar-venda-caixa/{$venda->num_venda_caixa}") ?>"><?= $venda->num_venda_caixa ?></a>
                                                                    </td>
                                                                    <td class="align-middle"><a class="link-load text-dark"
                                                                            href="<?= base_url("vendas/frente-caixa/editar-venda-caixa/{$venda->num_venda_caixa}") ?>">
                                                                            <?php
                                                                        if($venda->cod_cliente <> 0)
                                                                            echo $venda->cod_cliente . " - " . $venda->nome_cliente;
                                                                        else
                                                                            echo "Consumidor Final";
                                                                        ?></a><br>
                                                                        <?php if($venda->status == 1){ ?>
                                                                        <span class='badge bg-info-light'>Venda salva</span>
                                                                        <?php } ?>
                                                                        <?php if($venda->status == 2){ ?>
                                                                        <span class='badge bg-teal-light'>Venda
                                                                            efetivada</span>
                                                                        <?php } ?>
                                                                        <?php if($venda->status == 3){ ?>
                                                                        <span class='badge bg-dark'>Estornado</span>
                                                                        <?php } ?>
                                                                    </td>
                                                                    <td class="text-right align-middle" id="ValorTitulo">
                                                                        R$
                                                                        <?= number_format($venda->valor_total_pedido, 2, ',', '.') ?>
                                                                    </td>
                                                                    <td class="text-right text-teal align-middle"
                                                                        id="ValorTitulo">
                                                                        R$
                                                                        <?= number_format($venda->valor_dinheiro_pedido, 2, ',', '.') ?>
                                                                    </td>
                                                                    <td class="text-center align-middle">
                                                                        <?php
                                                                            switch ($venda->c_stat) {
                                                                                case '100':
                                                                                    $xml = $baseNFeDir . $venda->chave . '-nfe.xml';
                                                                                    $danfe = base_url("vendas/frente-caixa/danfce/" . $venda->nf_id);
                                                                                    $cancela = base_url("data-toggle='modal' data-target='#cancelar-nfce" . $venda->nf_id . "'");
                                                                                    echo ' 
                                                                                        <div class="btn-group" role="group">
                                                                                            <button type="button" class="btn btn-outline-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                            <i class="fas fa-bars"></i> NF EMITIDA
                                                                                            </button>
                                                                                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                                                            <a class="dropdown-item" href="#" onclick="ImprimeNF(' . $venda->nf_id .');">Imprimir DANFCE</a>
                                                                                            <a class="dropdown-item" href="' . $xml . ' " target="_blank">Download XML</a>                                                                                    
                                                                                            <a class="dropdown-item" href="" ' . $cancela . '">Cancelar NFce</a>
                                                                                            </div>
                                                                                        </div>';
                                                                                    break;
                                                                                default:
                                                                                    break;

                                                                            }
                                                                            ?>
                                                                        <?php if (!$venda->c_stat || $venda->c_stat > 199) { ?>
                                                                        <span>
                                                                            <a href="<?php echo base_url("vendas/frente-caixa/emitir-nfce/$venda->num_venda_caixa") ?>"
                                                                                class="link-load btn btn-outline-teal btn-sm <?php if($venda->status != 2 || $frente_caixa->data_hora_fechamento != null) echo "disabled"; ?>"><i
                                                                                    class="far fa-file-alt"></i> Emitir
                                                                                NFCe</a>

                                                                        </span>
                                                                        <?php } ?>
                                                                    </td>
                                                                </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <?php if ($venda_caixa == false) { ?>
                                                    <div class="text-center text-muted">
                                                        <p class="font-italic mt-3">Nenhuma venda realizada
                                                        </p>
                                                    </div>
                                                    <?php } ?>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="incremento">
                                        <div class="row ">
                                            <div class="col-md-12">
                                                <button data-toggle="modal" data-target="#inserir-entrada"
                                                    type="button" class="btn btn-outline-teal btn-sm"
                                                    id="btnInserirMovimento"
                                                    <?php if($frente_caixa == false || $frente_caixa->data_hora_fechamento != null) echo "disabled"; ?>><i class="fa-solid fa-arrow-down"></i> Registrar Entrada</button>
                                                <button data-toggle="modal" data-target="#inserir-saida"
                                                    type="button" class="btn btn-outline-warning btn-sm"
                                                    id="btnInserirMovimento"
                                                    <?php if($frente_caixa == false || $frente_caixa->data_hora_fechamento != null) echo "disabled"; ?>><i class="fa-solid fa-arrow-up"></i> Registrar Saída</button>
                                                <button data-toggle="modal" data-target="#delete-movimento"
                                                    type="button" class="btn btn-outline-danger btn-sm"
                                                    id="btnExcluirMovimento" disabled><i class="fas fa-trash-alt"></i>
                                                    Excluir</button>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <?php if ($this->session->flashdata('erro') <> ""){ ?>
                                                <div class="alert alert-danger alert-dismissible fade show mt-2 mb-0"
                                                    id="alert" role="alert">
                                                    <button type="button" class="close"
                                                        data-dismiss="alert">&times;</button>
                                                    <strong>Atenção!</strong> <?= $this->session->flashdata('erro') ?>
                                                </div>
                                                <?php } $this->session->set_flashdata('erro', ''); ?>
                                                <?php if ($this->session->flashdata('sucesso') <> ""){ ?>
                                                <div class="alert alert-success alert-dismissible fade show mt-2 mb-0"
                                                    id="alert" role="alert">
                                                    <button type="button" class="close"
                                                        data-dismiss="alert">&times;</button>
                                                    <strong>Muito bem!</strong>
                                                    <?= $this->session->flashdata('sucesso') ?>
                                                </div>
                                                <?php } $this->session->set_flashdata('sucesso', ''); ?>
                                                <form
                                                    action="<?= base_url("vendas/frente-caixa/excluir-movimento/{$dia}") ?>"
                                                    method="POST" id="formDeleteMovimentos"
                                                    class="mb-0 needs-validation" novalidate>
                                                    <div class="table-responsive">
                                                        <table class="table table-hover table-bordered">
                                                            <thead class="thead-light">
                                                                <tr>
                                                                    <th scope="col" class="text-center"><i
                                                                            class="fa-solid fa-check"></i></th>
                                                                    <th scope="col" class="text-center">Código</th>
                                                                    <th scope="col" class="text-center">Tipo</th>
                                                                    <th scope="col" class="text-left">Espécie</th>
                                                                    <th scope="col" class="text-right">Valor</th>
                                                                    <th scope="col">Observação</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach($movimento_caixa as $key_movimento_caixa => $movimento) { ?>
                                                                <tr>
                                                                    <td>
                                                                        <div class="checkbox text-center">
                                                                            <input name="selecionar_movimentos[]"
                                                                                type="checkbox"
                                                                                <?php if($frente_caixa->data_hora_fechamento <> null) echo "disabled"; ?>
                                                                                value="<?= $movimento->cod_movimento_frente_caixa ?>" />
                                                                        </div>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <?= $movimento->cod_movimento_frente_caixa ?>
                                                                    </td>
                                                                    <td class="text-center">
                                                                    <?php 
                                                                        if($movimento->tipo_movimento == 1)
                                                                            echo "Entrada";
                                                                        else
                                                                            echo "Saída";
                                                                    ?>
                                                                    </td>
                                                                    <td class="text-Recolhimento do caixa">
                                                                    <?php 
                                                                        switch($movimento->especie_movimento){
                                                                            case 1:
                                                                                echo "Transferência para o caixa";
                                                                                break;
                                                                            case 2:
                                                                                echo "Incremento para o caixa";
                                                                                break;
                                                                            case 3:
                                                                                echo "Sangria do caixa";
                                                                                break;
                                                                            case 4:
                                                                                echo "Recolhimento do caixa";
                                                                                break;
                                                                        }
                                                                    ?>
                                                                    </td>
                                                                    <td class="text-right <?php if($movimento->tipo_movimento == 1) echo "text-teal"; else echo "text-danger"; ?>"
                                                                        id="ValorTitulo">
                                                                        R$
                                                                        <?= number_format($movimento->valor_movimento, 2, ',', '.') ?>
                                                                    </td>
                                                                    <td>
                                                                        <?= $movimento->observacao ?>
                                                                    </td>
                                                                </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <?php if($movimento_caixa == false) { ?>
                                                    <div class="text-center text-muted">
                                                        <p class="font-italic mt-3">Nenhum movimento realizado
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

<div class="modal fade" id="abrir-caixa" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Abrir caixa</h5>
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
                                        <form action="<?php echo base_url("vendas/abrir-caixa/{$dia}") ?>" method='post'
                                            class="mb-0 needs-validation" novalidate id="AbrirCaixa">
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label class="control-label" for="inputValorUnitario">Saldo Inicial
                                                        do Caixa <span class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$</span>
                                                        </div>
                                                        <input type="text" class="form-control" class="form-control"
                                                            id="inputValorUnitario" type="text" name="SaldoInicial"
                                                            data-mask="#.##0,00" data-mask-reverse="true"
                                                            value="<?= set_value('SaldoInicial'); ?>">
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
                <button type="submit" class="btn btn-primary" form="AbrirCaixa">Confirma</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="dia-caixa" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Buscar dia caixa</h5>
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
                                        <form class="mb-0 needs-validation" novalidate id="BuscarData"
                                            action="<?= base_url('vendas/frente-caixa/buscar-data') ?>" method="GET">
                                            <div class="form-row">
                                                <label class="control-label" for="inputValorUnitario">Dia do caixa <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="inputDateCaixa"
                                                       value="" data-mask="99/99/9999" data-mask-reverse="true" name="dataCaixa" required>
                                                
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
                <button type="submit" class="btn btn-primary" form="BuscarData">Confirma</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<?php foreach($venda_caixa as $key_venda_caixa => $venda) {
        if($venda->c_stat == 100) { 
?>
<div class="modal fade" id="cancelar-nfce<?= $venda->nf_id ?>" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cancelar NFCe</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url("vendas/frente-caixa/cancelar-nfce/{$venda->nf_id}") ?>" method='post'
                    class="mb-0 needs-validation" novalidate id="CancelarNF<?= $venda->nf_id ?>">
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label class="control-label" for="inputValorUnitario">Venda</label>
                            <input type="text" class="form-control" class="form-control" id="inputValorUnitario"
                                value="<?= $venda->num_venda_caixa ?>" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label" for="inputValorUnitario">Cliente</label>
                            <input type="text" class="form-control" class="form-control" id="inputValorUnitario" value="<?php
                                            if($venda->cod_cliente <> 0)
                                                echo $venda->cod_cliente . " - " . $venda->nome_cliente;
                                            else
                                                 echo "Consumidor Final";
                                           ?>" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="control-label" for="inputValorUnitario">Valor da Venda</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">R$</span>
                                </div>
                                <input type="text" class="form-control" class="form-control" id="inputValorUnitario"
                                    type="text" name="SaldoInicial" data-mask="#.##0,00" data-mask-reverse="true"
                                    value="<?= number_format($venda->valor_total_pedido, 2, ',', '.') ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputMotivo">Motivo do Cancelamento <span class="text-danger">*</span></label>
                            <textarea class="form-control" rows="3" id="inputMotivo"
                                name="MotivoCancelamento"><?= set_value('MotivoCancelamento'); ?></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger" form="CancelarNF<?= $venda->nf_id ?>">Confirmar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
<?php }} ?>

<div class="modal fade" id="inserir-entrada" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Registrar entrada</h5>
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
                                        <form action="<?php echo base_url("vendas/inserir-movimento/{$dia}/1") ?>"
                                            method='post' class="mb-0 needs-validation" novalidate
                                            id="InserirEntrada">
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label class="control-label">Tipo de Entrada</label>
                                                    <select id="inputAmbiente"
                                                        class="selectpicker show-tick form-control"
                                                        data-actions-box="true" name="EspecieMovimento"
                                                        data-style="btn-input-primary">
                                                        <option value="1">
                                                            Transferência para o caixa
                                                        </option>
                                                        <option value="2">
                                                            Incremento para o caixa
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label class="control-label" for="inputValorMovimento">Valor
                                                        Movimento <span class="text-danger">*</span></label>
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
                                                    <label for="inputObservacao">Observações</label>
                                                    <textarea class="form-control" rows="3"
                                                        name="ObsMovimento"><?= set_value('ObsMovimento'); ?></textarea>
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
                <button type="submit" class="btn btn-primary" form="InserirEntrada">Confirma</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="inserir-saida" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Registrar saída</h5>
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
                                        <form action="<?php echo base_url("vendas/inserir-movimento/{$dia}/2") ?>"
                                            method='post' class="mb-0 needs-validation" novalidate
                                            id="InserirSaida">
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label class="control-label">Tipo de Saída</label>
                                                    <select id="inputAmbiente"
                                                        class="selectpicker show-tick form-control"
                                                        data-actions-box="true" name="EspecieMovimento"
                                                        data-style="btn-input-primary">
                                                        <option value="3">
                                                            Sangria do caixa
                                                        </option>
                                                        <option value="4">
                                                            Recolhimento do caixa
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label class="control-label" for="inputValorMovimento">Valor
                                                        Movimento <span class="text-danger">*</span></label>
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
                                                    <label for="inputObservacao">Observações</label>
                                                    <textarea class="form-control" rows="3"
                                                        name="ObsMovimento"><?= set_value('ObsMovimento'); ?></textarea>
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
                <button type="submit" class="btn btn-primary" form="InserirSaida">Confirma</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="estorna-venda" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Estornar vendas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Confirma estorno das vendas selecionadas?
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger" name="Acao" value="Confirmar"
                    form="formEstornaVendas">Confirma</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="delete-movimento" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Eliminar movimentos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Confirma eliminação dos movimentos selecionados?
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger" name="Acao" value="Confirmar"
                    form="formDeleteMovimentos">Confirma</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="reabrir-caixa" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Reabrir caixa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url("vendas/reabrir-caixa/{$dia}") ?>" method='post'
                    class="mb-0 needs-validation" novalidate id="ReabrirCaixa">
                    Confirma reabertura do caixa?
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-teal" name="Acao" value="Confirmar"
                    form="ReabrirCaixa">Confirma</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="fechar-caixa" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-xxl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Fechar caixa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modal-body-scroll bg-light">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card  mb-3">
                            <div class="card-body border-bottom">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5 class="card-title mb-0">
                                            <strong>
                                                Caixa dia <?= str_replace('-', '/', date("d-m-Y", strtotime($frente_caixa->data_caixa))) ?>
                                            </strong>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-borderless table-sm">
                                            <tbody>
                                                <tr>
                                                    <td class="text-left align-middle">
                                                        Total produto
                                                    </td>
                                                    <td
                                                        class="text-right align-middle <?php if($frente_caixa->total_produto > 0) echo "text-teal"; else echo "text-muted"; ?>">
                                                        R$
                                                        <?= number_format($frente_caixa->total_produto, 2, ',', '.') ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle">
                                                        Total frete
                                                    </td>
                                                    <td
                                                        class="text-right align-middle <?php if($frente_caixa->total_frete > 0) echo "text-teal"; else echo "text-muted"; ?>">
                                                        R$ <?= number_format($frente_caixa->total_frete, 2, ',', '.') ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle">
                                                        Total desconto
                                                    </td>
                                                    <td
                                                        class="text-right align-middle <?php if($frente_caixa->total_desconto > 0) echo "text-danger"; else echo "text-muted"; ?>">
                                                        R$
                                                        <?= number_format($frente_caixa->total_desconto, 2, ',', '.') ?>
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
                                            <td class="text-left pt-0 text-dark"><strong>TOTAL VENDIDO</strong></td>
                                            <td id="idTdTotalPedido"
                                                class="text-right pt-0 <?php if(($frente_caixa->total_produto + $frente_caixa->total_frete - $frente_caixa->total_desconto) > 0) echo "text-teal"; ?>">
                                                <strong>
                                                    R$
                                                    <?= number_format(($frente_caixa->total_produto + $frente_caixa->total_frete - $frente_caixa->total_desconto), 2, ',', '.') ?>
                                                </strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card">
                            <h6 class="card-header bg-white text-muted">
                                Saldo do caixa
                            </h6>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-borderless table-sm">
                                            <tbody>
                                                <tr>
                                                    <td class="text-left align-middle ">
                                                        Saldo inicial
                                                    </td>
                                                    <td
                                                        class="text-right align-middle <?php if($frente_caixa->saldo_inicial > 0) echo "text-teal"; else echo "text-muted"; ?>">
                                                        R$
                                                        <?= number_format($frente_caixa->saldo_inicial, 2, ',', '.') ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle">
                                                        Total recolhido
                                                    </td>
                                                    <td
                                                        class="text-right align-middle <?php if($frente_caixa->total_recolhimento > 0) echo "text-danger"; else echo "text-muted"; ?>">
                                                        R$
                                                        <?= number_format($frente_caixa->total_recolhimento, 2, ',', '.') ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle ">
                                                        Total incrementado
                                                    </td>
                                                    <td
                                                        class="text-right align-middle <?php if($frente_caixa->total_incremento > 0) echo "text-teal"; else echo "text-muted"; ?>">
                                                        R$
                                                        <?= number_format($frente_caixa->total_incremento, 2, ',', '.') ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle ">
                                                        Total vendido
                                                    </td>
                                                    <td
                                                        class="text-right align-middle <?php if($frente_caixa->total_venda > 0) echo "text-teal"; else echo "text-muted"; ?>">
                                                        R$ <?= number_format($frente_caixa->total_venda, 2, ',', '.') ?>
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
                                            <td class="text-left pt-0 text-dark"><strong>SALDO FINAL</strong></td>
                                            <td
                                                class="text-right pt-0 <?php if(($frente_caixa->saldo_inicial + $frente_caixa->total_venda + $frente_caixa->total_incremento - $frente_caixa->total_recolhimento) > 0) echo "text-teal"; ?>">
                                                <strong>
                                                    R$
                                                    <?= number_format($frente_caixa->saldo_inicial + $frente_caixa->total_venda + $frente_caixa->total_incremento - $frente_caixa->total_recolhimento, 2, ',', '.') ?>
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
                                <a class="nav-link active" data-toggle="tab" href="#pagamentos">Pagamentos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#movimentos-caixa">Movimentos Caixa</a>
                            </li>
                        </ul>
                        <form action="<?php echo base_url("vendas/fechar-caixa/{$dia}") ?>" method='post'
                            class="mb-0 needs-validation" novalidate id="fechaCaixa">
                            <div class="card">
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane fade active show" id="pagamentos">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered">
                                                            <thead class="thead-light">
                                                                <tr>
                                                                    <th scope="col">Origem da receita</th>
                                                                    <th scope="col" class="text-center">Vencimento do título
                                                                    </th>
                                                                    <th scope="col" class="text-right">Valor do titulo</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php 
                                                                $temValor = false;
                                                                $saldoCaixa = $frente_caixa->saldo_inicial + $frente_caixa->total_incremento - $frente_caixa->total_recolhimento;

                                                                $descontoReceita = 0;
                                                                if($saldoCaixa > 0) {
                                                                    $temValor = true;
                                                                ?>
                                                                <tr>
                                                                    <td>Devolução de Caixa</td>                                                                
                                                                    <td class="text-center">
                                                                        <?= str_replace('-', '/', date("d-m-Y", strtotime($frente_caixa->data_caixa))) ?>
                                                                    </td>
                                                                    <td class="text-right text-teal">R$
                                                                        <?= number_format($saldoCaixa, 2, ',', '.') ?>
                                                                    </td>
                                                                </tr>
                                                                <?php }else{
                                                                    $descontoReceita = $saldoCaixa;
                                                                } ?>
                                                                <?php 
                                                                    foreach($recebeimento_metodo as $key_recebeimento_metodo => $recebimento) { 
                                                                        $temValor = true; 

                                                                        $valorReceita = $recebimento->total_venda;
                                                                        if($frente_caixa->cod_metodo_pagamento == $recebimento->cod_metodo_pagamento)
                                                                            $valorReceita = $recebimento->total_venda + $descontoReceita;
                                                                ?>
                                                                <tr>
                                                                    <td><?= $recebimento->nome_metodo_pagamento ?></td>
                                                                    <?php if($recebimento->dias_recebimento <> 0) { ?>
                                                                    <td class="text-center">
                                                                        <?= str_replace('-', '/', date("d-m-Y", strtotime('+' . $recebimento->dias_recebimento . ' day', strtotime($recebimento->data_caixa)))) ?>
                                                                    </td>
                                                                    <?php }else{ ?>
                                                                    <td class="text-center">
                                                                        <?= str_replace('-', '/', date("d-m-Y", strtotime($recebimento->data_caixa))) ?>
                                                                    </td>
                                                                    <?php } ?>
                                                                    <td class="text-right text-teal">R$
                                                                        <?= number_format($valorReceita, 2, ',', '.') ?>
                                                                    </td>
                                                                </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <?php if($temValor == false) { ?>
                                                    <div class="text-center text-muted">
                                                        <p class="font-italic mt-3">Nenhum título para integrar ao financeiro</p>
                                                    </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="movimentos-caixa">
                                            <div class="row">
                                                <div class="col-md-12">   
                                                    <div class="table-responsive">                                                 
                                                        <table class="table table-bordered">
                                                            <thead class="thead-light">
                                                                <tr>
                                                                    <th scope="col" class="text-left">Movimento</th>
                                                                    <th scope="col">Observação</th>
                                                                    <th scope="col" class="text-right">Valor</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach($movimento_caixa as $key_movimento_caixa => $movimento) { ?>
                                                                <tr>
                                                                    <td class="text-left">
                                                                        <?php 
                                                                                if($movimento->tipo_movimento == 1)
                                                                                    echo "Incremento";
                                                                                else
                                                                                    echo "Recolhimento";
                                                                            ?>
                                                                    </td>
                                                                    <td>
                                                                        <?= $movimento->observacao ?>
                                                                    </td>
                                                                    <td
                                                                        class="text-right <?php if($movimento->tipo_movimento == 1) echo "text-teal"; else echo "text-danger"; ?>">
                                                                        R$
                                                                        <?= number_format($movimento->valor_movimento, 2, ',', '.') ?>
                                                                    </td>
                                                                </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <?php if($movimento_caixa == false) { ?>
                                                    <div class="text-center text-muted">
                                                        <p class="font-italic mt-3">Nenhum incremento ou recolhimento</p>
                                                    </div>
                                                    <?php } ?>
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
                <a href="#" type="button" class="btn btn-outline-warning btn-sm" id="btnImprimir"><i
                        class="fas fa-print"></i> Imprimir Fechamento</a>
                <button type="submit" class="btn btn-teal" name="Acao" value="Confirmar"
                    form="fechaCaixa"><i class="fa-solid fa-calendar-check"></i> Confirma</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<script>
$('.page-item>a').addClass("page-link");

$('#inputDateCaixa').datepicker({
    uiLibrary: 'bootstrap4'
});

(function() {
    'use strict';
    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var elemento = document.getElementsByClassName('elemento');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(elemento, function(elemento) {
            elemento.addEventListener('click', function(event) {
                if (elemento.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();

                } else {
                    $('.modal').modal('hide');
                    $('#spinner').modal('show');
                }
                elemento.classList.add('was-validated');
            }, false);
        });
    }, false);
})();

$("[name='selecionar_vendas[]']").click(function() {
    var cont = $("[name='selecionar_vendas[]']:checked").length;
    $("#btnEstornarVenda").prop("disabled", cont ? false : true);
});

$("[name='selecionar_movimentos[]']").click(function() {
    var cont = $("[name='selecionar_movimentos[]']:checked").length;
    $("#btnExcluirMovimento").prop("disabled", cont ? false : true);
});

$(function() {
    $.applyDataMask();
});

<?php if($frente_caixa == true){ ?>

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
        iFrame.src = "<?= base_url("vendas/imprimir-fechamento-caixa/{$frente_caixa->data_caixa}") ?>";
        document.body.appendChild(iFrame);
    });
});

<?php } ?>

function ImprimeNF(idNF) {

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

    iframe.src = "<?= base_url("vendas/frente-caixa/danfce/") ?>" + idNF;
};
</script>

<?php $this->load->view('gerais/footer'); ?>