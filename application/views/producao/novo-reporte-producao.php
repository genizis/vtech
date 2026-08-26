<?php $this->load->view('gerais/header' , $menu); ?>
<?php $this->load->view('gerais/menu', $menu); ?>

<section>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('visao-geral') ?>">Visão Geral</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('producao') ?>">Produção</a></li>
            <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>producao/reporte-producao">Reporte de
                    Produção</a></li>
            <li class="breadcrumb-item active">Novo Reporte Produção</a></li>
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
                                        <?= $ordem->cod_produto ?> - <?= $ordem->nome_produto ?>
                                    </strong>
                                </h5>
                                <?php
                                if($ordem->data_fim < date('Y-m-d') && $ordem->status != 3 && $ordem->status != 4 && $ordem->quant_produzida == 0){
                                    echo "<span class='badge bg-danger-light text-dark'>Atrasada</span>";
                                }else{
                                    switch ($ordem->status) {
                                        case 1:
                                            echo "<span class='badge bg-light text-dark'>Pendente</span>";
                                            break;
                                        case 2:
                                            echo "<span class='badge bg-info-light text-dark'>Produzido Parcial</span>";
                                            break;
                                        case 3:
                                            echo "<span class='badge bg-teal-light text-dark'>Produzido Total</span>";
                                            break;
                                        case 4:
                                            echo "<span class='badge bg-secondary text-white'>Estornado</span>";
                                            break;
                                    } 

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
                                                Ordem de produção
                                            </td>
                                            <td class="text-right">
                                                <strong><?= $ordem->num_ordem_producao ?></strong>
                                            </td>
                                        </tr>
                                        <?php if($ordem->nome_usuario != null) { ?>
                                        <tr>
                                            <td class="text-left">
                                                Planejador
                                            </td>
                                            <td class="text-right">
                                                <?= $ordem->nome_usuario ?>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <?php if($ordem->num_pedido_venda != 0) { ?>
                                <table class="table table-borderless table-sm mb-0">
                                    <tbody>
                                        <tr>
                                            <td class="text-left align-middle ">
                                                Pedido venda
                                            </td>
                                            <td class="text-right align-middle">
                                                <?= $ordem->num_pedido_venda ?> - <?= $ordem->nome_cliente ?>
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
                                                <?= str_replace('-', '/', date("d-m-Y", strtotime($ordem->data_emissao))) ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left align-middle ">
                                                Data entrega
                                            </td>
                                            <td
                                                class="text-right align-middle <?php if($ordem->data_fim < date('Y-m-d') && $ordem->status != 3 && $ordem->status != 4 && $ordem->quant_produzida == 0) echo "text-danger"; ?>">
                                                <?= str_replace('-', '/', date("d-m-Y", strtotime($ordem->data_fim))) ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left align-middle ">
                                                Quantidade planejada
                                            </td>
                                            <td class="text-right align-middle text-info">
                                                <?php echo number_format((float) ($ordem->quant_planejada), 3, ',', '.') . " " . $ordem->cod_unidade_medida; ?>
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
                                    <td class="text-left pt-0 text-dark"><strong>Quantidade produzida</strong></td>
                                    <td
                                        class="text-right pt-0 <?php if($ordem->quant_produzida > 0) echo "text-teal"; ?>">
                                        <strong>
                                            <?php echo number_format((float) ($ordem->quant_produzida), 3, ',', '.') . " " . $ordem->cod_unidade_medida; ?>
                                        </strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-8 pl-0">
                <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#reporte" role="tab"
                            aria-controls="home" aria-selected="true">Reporte de Produção</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#produtos" role="tab"
                            aria-controls="profile" aria-selected="false">Produtos de Consumo</a>
                    </li>
                </ul>
                <div class="card  mb-3">
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="reporte" role="tabpanel"
                                aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php if ($this->session->flashdata('erro') <> ""){ ?>
                                        <div class="alert alert-danger alert-dismissible fade show" id="alert"
                                            role="alert">
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                            <strong>Atenção!</strong> <?= $this->session->flashdata('erro') ?>
                                        </div>
                                        <?php } $this->session->set_flashdata('erro', ''); ?>
                                        <?php if ($this->session->flashdata('sucesso') <> ""){ ?>
                                        <div class="alert alert-success alert-dismissible fade show" id="alert"
                                            role="alert">
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                            <strong>Muito bem!</strong>
                                            <?= $this->session->flashdata('sucesso') ?>
                                        </div>
                                        <?php } $this->session->set_flashdata('sucesso', ''); ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-xs-12">
                                                        <button data-toggle="modal" data-target="#inserir-reporte"
                                                            type="button" class="btn btn-outline-info btn-sm"
                                                            data-backdrop="static" data-keyboard="false"><i
                                                                class="fas fa-plus-circle"></i> Reportar
                                                            Produção</button>
                                                        <button data-toggle="modal" data-target="#estorna-producao"
                                                            type="button" class="btn btn-outline-danger btn-sm"
                                                            id="btnExcluir" disabled><i class="fas fa-undo"></i>
                                                            Estornar Reporte</button>
                                                        <button data-toggle="modal" data-target="#movimentos-ordem"
                                                            type="button" class="btn btn-outline-secondary btn-sm"
                                                            hidden><i class="fas fa-list"></i> Movimentos da
                                                            Ordem</button>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <form class=" needs-validation" novalidate
                                                            action="<?= base_url("producao/reporte-producao/estornar-reporte-producao/{$ordem->num_ordem_producao}") ?>"
                                                            method="POST" id="EstornaReporte">
                                                            <div class="table-responsive">
                                                                <table class="table table-bordered table-nf">
                                                                    <thead class="thead-light">
                                                                        <tr>
                                                                            <th scope="col" class="text-center"><i
                                                                                    class="fa-solid fa-check"></i></th>
                                                                            <th scope="col" class="text-center">Reporte
                                                                            </th>
                                                                            <th scope="col" class="text-center">Data
                                                                            </th>
                                                                            <th scope="col" class="text-center">Horas
                                                                                trabalhadas</th>
                                                                            <th scope="col" class="text-right">Quant
                                                                                produção
                                                                            </th>
                                                                            <th scope="col" class="text-right">Custo de
                                                                                produção
                                                                            </th>
                                                                            <th scope="col" class="text-center"><i
                                                                                class="fa-solid fa-ellipsis"></i></th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php foreach($lista_reporte as $key_reporte => $reporte) { ?>
                                                                        <tr>
                                                                            <td>
                                                                                <div class="checkbox text-center">
                                                                                    <input name="estornar_todos[]"
                                                                                        type="checkbox"
                                                                                        value="<?= $reporte->cod_reporte_producao ?>" />
                                                                                </div>
                                                                            </td>
                                                                            <td scope="row" class="text-center"><a
                                                                                    href="#" data-toggle="modal"
                                                                                    class="text-dark"
                                                                                    data-target="#movimentos-reporte<?= $reporte->cod_reporte_producao ?>">
                                                                                    <?= $reporte->cod_reporte_producao ?>
                                                                                </a>
                                                                            </td>
                                                                            <td class="text-center">
                                                                                <a href="#" data-toggle="modal"
                                                                                    class="text-dark"
                                                                                    data-target="#movimentos-reporte<?= $reporte->cod_reporte_producao ?>"><?= str_replace('-', '/', date("d-m-Y", strtotime($reporte->data_reporte))) ?></a>
                                                                            </td>
                                                                            <td class="text-center">
                                                                                <?= number_format((float) ($reporte->horas_trabalhadas), 2, ',', '.') ?>
                                                                            </td>
                                                                            <td class="text-right">
                                                                                <?= number_format((float) ($reporte->quant_reportada), 3, ',', '.') ?>
                                                                                <?= $ordem->cod_unidade_medida ?>
                                                                            </td>
                                                                            <td
                                                                                class="text-right <?php if(($reporte->custo_producao + $reporte->custo_mob) > 0) echo "text-danger"; ?>">
                                                                                R$
                                                                                <?= number_format((float) ($reporte->custo_producao + $reporte->custo_mob), 2, ',', '.') ?>
                                                                            </td>
                                                                            <td class="text-center">
                                                                                <a href="#" data-value="<?= $reporte->cod_reporte_producao ?>"
                                                                                    class="btnImprimi btn btn-outline-dark btn-sm"><i class="fa-regular fa-file-lines"></i> Etiqueta
                                                                            </a>
                                                                        </tr>
                                                                        <?php } ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <?php if ($lista_reporte == false) { ?>
                                                            <div class="text-center text-muted">
                                                                <p class="font-italic mt-3">Nenhum reporte realizado</p>
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
                            <div class="tab-pane fade" id="produtos">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-xs-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="table table-bordered table-nf">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th scope="col" class="text-left">Produto</th>
                                                            <th scope="col" class="text-left">Tipo produto</th>
                                                            <th scope="col" class="text-right">Quant consumos</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach($lista_componente as $key_componente => $componente) { ?>
                                                        <tr>
                                                            <td scope="row" class="text-left align-middle">
                                                                <?= $componente->cod_produto ?> -
                                                                <?= $componente->nome_produto ?>
                                                            </td>
                                                            <td class="text-left align-middle">
                                                                <?= $componente->nome_tipo_produto ?>
                                                            </td>
                                                            <td class="text-right align-middle text-info">
                                                                <?= number_format((float) ($componente->quant_consumo), 3, ',', '.') ?>
                                                                <?= $componente->cod_unidade_medida ?>
                                                            </td>
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                                <?php if ($lista_componente == false) { ?>
                                                <div class="text-center text-muted">
                                                    <p class="font-italic mt-3">Nenhum componente na ordem
                                                    </p>
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

<div class="modal fade" id="estorna-producao" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Estornar reporte</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Confirma o estorno dos reportes selecionados?
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger" form="EstornaReporte">Confirma</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="inserir-reporte">
    <div class="modal-dialog modal-xxl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Reportar produção</h5>
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
                                                <?= $ordem->cod_produto ?> - <?= $ordem->nome_produto ?>
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
                                                        Ordem de produção
                                                    </td>
                                                    <td class="text-right">
                                                        <strong><?= $ordem->num_ordem_producao ?></strong>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle ">
                                                        Usuário do reporte
                                                    </td>
                                                    <td class="text-right align-middle">
                                                        <?= getDadosUsuarioLogado()['nome_usuario'] ?>
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
                                                        <?= str_replace('-', '/', date("d-m-Y", strtotime($ordem->data_emissao))) ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle ">
                                                        Data entrega
                                                    </td>
                                                    <td
                                                        class="text-right align-middle <?php if($ordem->data_fim < date('Y-m-d') && $ordem->status != 3 && $ordem->status != 4 && $ordem->quant_produzida == 0) echo "text-danger"; ?>">
                                                        <?= str_replace('-', '/', date("d-m-Y", strtotime($ordem->data_fim))) ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle ">
                                                        Quantidade planejada
                                                    </td>
                                                    <td class="text-right align-middle text-info">
                                                        <?php echo number_format((float) ($ordem->quant_planejada), 3, ',', '.') . " " . $ordem->cod_unidade_medida; ?>
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
                                            <td class="text-left pt-0 text-dark"><strong>Quantidade produzida</strong>
                                            </td>
                                            <td
                                                class="text-right pt-0 <?php if($ordem->quant_produzida > 0) echo "text-teal"; ?>">
                                                <strong>
                                                    <?php echo number_format((float) ($ordem->quant_produzida), 3, ',', '.') . " " . $ordem->cod_unidade_medida; ?>
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
                                <a class="nav-link active" data-toggle="tab" href="#reporte-prod">Reporte de Produção</a>
                            </li>
                        </ul>
                        <form class="mb-0 needs-validation" novalidate
                            action="<?= base_url("producao/reporte-producao/reportar-producao/{$ordem->num_ordem_producao}/{$ordem->cod_produto}/{$ordem->quant_planejada}") ?>"
                            method="POST" id="InserirReporte">
                            <div class="card">
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane fade active show" id="reporte-prod">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-xs-12">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-4">
                                                            <label class="control-label" for="inputDataReporte">Data do Reporte
                                                                <span class="text-danger">*</span></label>
                                                            <input class="form-control" id="inputDataReporte" type="text"
                                                                name="DataReporte" value="<?php if(set_value('DataReporte') == "" && $ordem->data_fim > date('Y-m-d')){
                                                                                    echo str_replace('-', '/', date("d-m-Y"));
                                                                                }elseif(set_value('DataReporte') == "" && $ordem->data_fim <= date('Y-m-d')){
                                                                                    echo str_replace('-', '/', date("d-m-Y", strtotime($ordem->data_fim)));
                                                                                }else{ echo set_value('DataReporte'); } ?>"
                                                                required>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label class="control-label" for="inputQuantProducao">Quantidade
                                                                Produzida <span class="text-danger">*</span></label>
                                                            <input class="form-control" id="inputQuantProducao" type="text"
                                                                name="QuantProducao" data-mask="#.##0,000"
                                                                data-mask-reverse="true"
                                                                value="<?= set_value('QuantProduzida'); ?>" required>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label class="control-label" for="inputQuantPerda">Quantidade
                                                                Perdida</label>
                                                            <input class="form-control" id="inputQuantPerda" type="text"
                                                                name="QuantPerda" data-mask="#.##0,000" data-mask-reverse="true"
                                                                value="<?= set_value('QuantPerdida'); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-xs-12">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-4">
                                                            <label class="control-label" for="inputHoraInicio">Hora Início
                                                                Produção</label>
                                                            <input class="form-control" id="inputHoraInicio" type="text"
                                                                name="inputHoraInicio" data-mask="00:00"
                                                                data-mask-reverse="true"
                                                                value="<?= set_value('inputHoraInicio'); ?>">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label class="control-label" for="inputHoraFim">Hora Fim
                                                                Produção</label>
                                                            <input class="form-control" id="inputHoraFim" type="text"
                                                                name="inputHoraFim" data-mask="00:00" data-mask-reverse="true"
                                                                value="<?= set_value('inputHoraFim'); ?>">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label class="control-label" for="inputHorasTrabalhadas">Horas em
                                                                Produção</label>
                                                            <input class="form-control" id="inputHorasTrabalhadas" type="text"
                                                                name="HorasTrabalhadas"
                                                                value="<?= set_value('HorasTrabalhadas'); ?>" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php if($ordem->tipo_controle == 2){ ?>
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-xs-12">                                        
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label for="inputLote">Lote</label>
                                                            <div class="input-group">
                                                                <select id="inputLote" class="selectpicker show-tick form-control"
                                                                    data-live-search="true" data-actions-box="true" title="Selecione um Lote"
                                                                    data-style="btn-input-primary" name="CodLote">
                                                                    <?php foreach($lista_produto_lote as $key_lote => $lote) { ?>
                                                                    <option class="<?php if((date("Y-m-d", strtotime('-' . $lote->dias_aviso_venc . ' days', strtotime($lote->data_validade)))) <= date("Y-m-d") && $lote->data_validade != date("Y-m-d")) echo "text-warning";
                                                                                                         elseif($lote->data_validade == date("Y-m-d")) echo "text-danger"; ?>"
                                                                             value="<?= $lote->cod_lote ?>" class="limit-text-50"
                                                                        <?php if($lote->cod_lote == set_value('CodLote')) echo "selected"; ?>>
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
                                                </div>
                                            </div>
                                            <?php } ?>                                            
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h6>Produtos de Consumo</h6>
                                                    <table class="table table-bordered table-reporte">
                                                        <thead class="thead-light">
                                                            <tr>
                                                                <th scope="col" class="text-center">
                                                                <i class="fa-solid fa-ellipsis"></i>
                                                                </th>
                                                                <th scope="col">Produto</th>
                                                                <th scope="col">Tipo</th>
                                                                <th scope="col" class="text-right">Consumo</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach($lista_componente as $key_componente => $componente) { ?>                                                        
                                                            <tr>
                                                                <td class="text-center">
                                                                    <?php if($componente->tipo_controle == 2) { ?>
                                                                    <a href="#" class="text-teal accordion-toggle" id="detail<?= $componente->cod_produto ?>"
                                                                    data-toggle="collapse" data-target="#produto<?= $componente->cod_produto ?>">
                                                                        <i class="fa-solid fa-angle-right"></i>                                                          
                                                                    </a>
                                                                    <?php }else{ ?>
                                                                        <i class="fa-solid fa-angle-right text-muted"></i>
                                                                    <?php } ?>
                                                                </td>                                                        
                                                                <td scope="row" class="align-middle limit-text-30"
                                                                    data-toggle="tooltip" data-placement="bottom"
                                                                    title="<?= $componente->nome_produto ?>">
                                                                    <?= $componente->cod_produto ?> -
                                                                    <?= $componente->nome_produto ?></td>
                                                                <td class="align-middle"><?= $componente->nome_tipo_produto ?>
                                                                </td>
                                                                <td width="150" class="align-middle">
                                                                    <div class="input-group">
                                                                        <input class="form-control text-right"
                                                                            id="inputConsumo<?= $componente->seq_componente_producao ?>"
                                                                            name="consumo[<?= $componente->seq_componente_producao ?>]"
                                                                            type="text" name="ZZZ" data-mask="#.##0,000"
                                                                            data-mask-reverse="true" value="0,000">
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text"
                                                                                style="width: 40px;"><?= $componente->cod_unidade_medida ?></span>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <?php if($componente->tipo_controle == 2) { ?>
                                                            <tr class="accordian-body collapse p-3 hiddenRow" id="produto<?= $componente->cod_produto ?>">
                                                                <td colspan="6" class="bg-white-light "> 
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-12">
                                                                            <label for="inputLote<?= $componente->cod_produto ?>">Lote <span class="text-danger">*</span></label>
                                                                            <div class="input-group">
                                                                                <select id="inputLote<?= $componente->cod_produto ?>" class="selectpicker show-tick form-control"
                                                                                    data-live-search="true" data-actions-box="true" 
                                                                                    data-style="btn-input-primary" name="lote_consumo[<?= $componente->seq_componente_producao ?>]" required>
                                                                                    <?php foreach($lista_componente_lote as $key_lote => $lote) { if($lote->cod_produto == $componente->cod_produto) { ?>
                                                                                    <option class="<?php if((date("Y-m-d", strtotime('-' . $lote->dias_aviso_venc . ' days', strtotime($lote->data_validade)))) <= date("Y-m-d") && $lote->data_validade != date("Y-m-d")) echo "text-warning";
                                                                                                         elseif($lote->data_validade == date("Y-m-d")) echo "text-danger"; ?>" 
                                                                                            value="<?= $lote->cod_lote ?>" class="limit-text-50"
                                                                                        <?php if($lote->cod_lote == set_value('CodLoteMov')) echo "selected"; ?>>
                                                                                        <?= $lote->cod_lote ?> -
                                                                                        <?= str_replace('-', '/', date("d-m-Y", strtotime($lote->data_validade))) ?></option>
                                                                                    <?php }} ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div> 
                                                                </td>
                                                            </tr> 
                                                            <?php } ?>                                                   
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                    <div class="form-row mb-0" hidden>
                                                        <div class="form-group col-md-12">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="inputConsumoPlan" name="ConsPlanejado" value="1">
                                                                <label class="custom-control-label"
                                                                    for="inputConsumoPlan">Considerar Consumo
                                                                    Planejado</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php if ($lista_componente == false) { ?>
                                                    <div class="text-center text-muted">
                                                        <p class="font-italic mt-3">Nenhum componente para a ordem</p>
                                                    </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="inputObservacao">Observações</label>
                                                    <textarea class="form-control" rows="3" id="inputObservacao"
                                                        name="ObsReporte"><?= set_value('ObsReporte'); ?></textarea>
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
                <button type="submit" class="btn btn-primary" form="InserirReporte"><i class="fas fa-plus-circle"></i>
                    Reportar
                    Produção</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="movimentos-ordem">
    <div class="modal-dialog modal-xxl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detalhes da produção</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modal-body-scroll">
                <div class="col-md-8 pl-0">
                    <div class="card  mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 mb-0">
                                    <p class="card-text text-muted mb-0">Reportes de produção<br><span
                                            class="font-italic text-size-80">Data e quantidade</span>
                                    <p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-bordered table-striped table-reporte">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col" class="text-center">Data Movto</th>
                                                <th scope="col" class="text-center">Reporte</th>
                                                <th scope="col">Especie Movto</th>
                                                <th scope="col">Produto</th>
                                                <th scope="col" class="text-center">Un</th>
                                                <th scope="col">Tipo Movto</th>
                                                <th scope="col" class="text-center">Qtde Mov</th>
                                                <th scope="col" class="text-center">Valor Mov</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($lista_movimento_ordem as $key_movimento_ordem => $movimento_ordem) { ?>
                                            <tr>
                                                <td class="text-center">
                                                    <?= str_replace('-', '/', date("d-m-Y", strtotime($movimento_ordem->data_movimento))) ?>
                                                </td>
                                                <td class="text-center"><?= $movimento_ordem->cod_reporte_producao ?>
                                                </td>
                                                <td>
                                                    <?php 
                                            switch ($movimento_ordem->especie_movimento) {
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
                                                    echo "Venda de Material";
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
                                            } 
                                        ?>
                                                </td>
                                                <td><?= $movimento_ordem->cod_produto ?> -
                                                    <?= $movimento_ordem->nome_produto ?>
                                                </td>
                                                <td class="text-center"><?= $movimento_ordem->cod_unidade_medida ?></td>
                                                <td>
                                                    <?php 
                                            switch ($movimento_ordem->tipo_movimento) {
                                                case 1:
                                                    echo "Entrada em Estoque";
                                                    break;
                                                case 2:
                                                    echo "Saída de Estoque";
                                                    break;
                                            } 
                                        ?>
                                                </td>
                                                <td
                                                    class="text-center <?php if($movimento_ordem->tipo_movimento == 2) echo "text-danger"; else echo "text-teal"; ?>">
                                                    <?= number_format((float) ($movimento_ordem->quant_movimentada), 3, ',', '.') ?>
                                                </td>
                                                <td
                                                    class="text-center <?php if($movimento_ordem->tipo_movimento == 2) echo "text-danger"; else echo "text-teal"; ?>">
                                                    R$
                                                    <?= number_format((float) ($movimento_ordem->valor_movimento), 2, ',', '.') ?>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    <?php if ($lista_movimento_ordem == false) { ?>
                                    <div class="text-center">
                                        <p>Nenhum movimento realizado</p>
                                    </div>
                                    <?php } ?>
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

<?php foreach($lista_reporte as $key_reporte => $reporte) { ?>
<div class="modal fade" id="movimentos-reporte<?= $reporte->cod_reporte_producao ?>">
    <div class="modal-dialog modal-xxl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Destalhes da produção</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modal-body-scroll bg-light ">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body border-bottom">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5 class="card-title mb-0">
                                            <strong>
                                                <?= $reporte->cod_reporte_producao ?> -
                                                <?= str_replace('-', '/', date("d-m-Y", strtotime($reporte->data_reporte))) ?>
                                            </strong>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php if($reporte->nome_usuario != null){ ?>
                                        <table class="table table-borderless table-sm mb-0">
                                            <tbody>
                                                <tr>
                                                    <td class="text-left align-middle">
                                                        Usuário do reporte
                                                    </td>
                                                    <td class="text-right align-middle">
                                                        <?= $reporte->nome_usuario ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <?php } ?>
                                        <table class="table table-borderless table-sm mb-0">
                                            <tbody>
                                                <tr>
                                                    <td class="text-left align-middle">
                                                        Quantidade perdida
                                                    </td>
                                                    <td class="text-right align-middle">
                                                        <?= number_format((float) ($reporte->quant_perdida), 3, ',', '.') ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle">
                                                        Quantidade produzida
                                                    </td>
                                                    <td class="text-right align-middle font-weight-bold text-teal">
                                                        <?= number_format((float) ($reporte->quant_reportada), 3, ',', '.') ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table table-borderless table-sm mb-0">
                                            <tbody>
                                                <tr>
                                                    <td class="text-left align-middle">
                                                        Hora ínício
                                                    </td>
                                                    <td class="text-right align-middle">
                                                        <?php if($reporte->hora_inicio != "") echo $reporte->hora_inicio; else echo "00:00" ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle">
                                                        Hora fim
                                                    </td>
                                                    <td class="text-right align-middle">
                                                        <?php if($reporte->hora_fim != "") echo $reporte->hora_fim; else echo "00:00" ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle">
                                                        Horas trabalhadas
                                                    </td>
                                                    <td class="text-right align-middle font-weight-bold">
                                                        <?= number_format((float) ($reporte->horas_trabalhadas), 2, ',', '.') ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>                                        
                                        <table class="table table-borderless table-sm mb-0">
                                            <tbody>
                                                <tr>
                                                    <td class="text-left align-middle">
                                                        Custo de material
                                                    </td>
                                                    <td class="text-right align-middle">
                                                        R$ <?= number_format((float) ($reporte->custo_producao), 2, ',', '.') ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle">
                                                        Custo de mão de obra
                                                    </td>
                                                    <td class="text-right align-middle">
                                                        R$ <?= number_format((float) ($reporte->custo_mob), 2, ',', '.') ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle">
                                                        Custo total de produção
                                                    </td>
                                                    <td class="text-right align-middle text-danger font-weight-bold">
                                                        R$
                                                        <?= number_format((float) ($reporte->custo_producao + $reporte->custo_mob), 2, ',', '.') ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if($reporte->observacoes != ""){ ?>
                        <div class="card mt-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 mb-0">
                                        <p class="card-text text-muted mb-0">Observação da produção
                                        <p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <?= $reporte->observacoes ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="col-md-8 pl-0">
                        <ul class="nav nav-tabs mb-3">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#mov-estoq<?= $movimento_ordem->cod_reporte_producao ?>">Movimentos do Estoque</a>
                            </li>
                        </ul>
                        <div class="card">
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane fade active show" id="mov-estoq<?= $movimento_ordem->cod_reporte_producao ?>">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered">
                                                        <thead class="thead-light">
                                                            <tr>
                                                                <th scope="col" class="text-center">Data</th>
                                                                <th scope="col">Produto</th>
                                                                <th scope="col">Lote</th>
                                                                <th scope="col" class="text-right">Quantidade</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach($lista_movimento_ordem as $key_movimento_ordem => $movimento_ordem) { 
                                                        if($reporte->cod_reporte_producao == $movimento_ordem->cod_reporte_producao) {?>
                                                            <tr>
                                                                <td class="text-center align-middle">
                                                                    <?= str_replace('-', '/', date("d-m-Y", strtotime($movimento_ordem->data_movimento))) ?>
                                                                </td>
                                                                <td class="align-middle">
                                                                    <?= $movimento_ordem->cod_produto ?> - <?= $movimento_ordem->nome_produto ?>
                                                                </td>
                                                                <td class="align-middle">
                                                                    <?= $movimento_ordem->cod_lote ?>
                                                                </td>
                                                                <td
                                                                    class="text-right align-middle <?php if($movimento_ordem->tipo_movimento == 2) echo "text-danger"; else echo "text-teal"; ?>">
                                                                    <?php
                                                                        if($movimento_ordem->tipo_movimento == 1) echo "+"; else echo "-";
                                                                    ?>
                                                                    <?= number_format((float) ($movimento_ordem->quant_movimentada), 3, ',', '.') ?>
                                                                    <?= $movimento_ordem->cod_unidade_medida ?>
                                                                </td>
                                                            </tr>
                                                            <?php }} ?>
                                                        </tbody>
                                                    </table>
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
                                                        value="<?= str_replace('-', '/', date("d-m-Y", strtotime('+' . $ordem->dias_vencimento . ' days', strtotime(date("d-m-Y"))))) ?>" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label" for="inputDiasAvisoAjax">Dias de aviso</label>
                                                    <input class="form-control" id="inputDiasAvisoAjax" type="text"
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
                <button type="submit" id="btnSalvarLote" class="btn btn-primary"><i class="fas fa-save"></i>
                    Salvar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<script>
$(function() {
    $.applyDataMask();
});

$("#btnSalvarLote").click(function() {

    var baseurl = "<?php echo base_url(); ?>";

    var codProduto = "<?= $ordem->cod_produto ?>";
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

<?php foreach($lista_componente as $key_componente => $componente) { ?>  
$('#detail<?= $componente->cod_produto ?>').click(function() {
    console.log("test");
    $('#produto<?= $componente->cod_produto ?>').on('shown.bs.collapse', function() {
        $('#detail<?= $componente->cod_produto ?>')
        .parent()
        .find(".fa-angle-right")
        .removeClass("fa-angle-right")
        .addClass("fa-angle-down");
    })
    .on('hidden.bs.collapse', function() {
        $('#detail<?= $componente->cod_produto ?>')
        .parent()
        .find(".fa-angle-down")
        .removeClass("fa-angle-down")
        .addClass("fa-angle-right");
    }); 
});
<?php } ?>

$('table').on("click", ".accordion-toggle", function() {
    $(this).closest('tr').next().toggle();
});

$("[name='estornar_todos[]']").click(function() {
    var cont = $("[name='estornar_todos[]']:checked").length;
    $("#btnExcluir").prop("disabled", cont ? false : true);
});

jQuery('#inputQuantProducao').on('keyup', function() {
    valTotalConsumo();
});

jQuery('#inputQuantPerda').on('keyup', function() {
    valTotalConsumo();
});

$('#inputDataValidadeAjax').datepicker({
    uiLibrary: 'bootstrap4'
});

jQuery('#inputHoraInicio').on('keyup', function() {
    if (jQuery('#inputHoraInicio').val().length === 5 && jQuery('#inputHoraFim').val().length === 5)
        valTotalHoras();
    else
        $("#inputHorasTrabalhadas").val('');
});

jQuery('#inputHoraFim').on('keyup', function() {
    if (jQuery('#inputHoraInicio').val().length === 5 && jQuery('#inputHoraFim').val().length === 5)
        valTotalHoras();
    else
        $("#inputHorasTrabalhadas").val('');

});

function valTotalHoras() {

    var horaInicioProd = jQuery('#inputHoraInicio').val().split(':');
    var horaFimProd = jQuery('#inputHoraFim').val().split(':');

    var horaIni = parseInt(horaInicioProd[0] * 60);
    var minIni = parseInt(horaInicioProd[1]);
    var horaFim = parseInt(horaFimProd[0] * 60);
    var minFim = parseInt(horaFimProd[1]);



    var horaDecimal = 0;

    if (horaInicioProd > horaFimProd) {
        horaDecimal = ((23 * 60 + 60) - (horaIni + minIni)) + (horaFim + minFim);
    } else {
        horaDecimal = (horaFim + minFim) - (horaIni + minIni);
    }

    horaDecimal = round((horaDecimal / 60), 2);

    $("#inputHorasTrabalhadas").val(horaDecimal.toLocaleString("pt-BR", {
        style: "decimal",
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    }));
}

function valTotalConsumo() {

    if ($("#inputConsumoPlan").is(':checked') === false) {

        var quantProd = parseFloat(jQuery('#inputQuantProducao').val() != '' ? (jQuery('#inputQuantProducao').val()
            .split(
                '.').join('')).replace(',', '.') : 0);
        var quantPerd = parseFloat(jQuery('#inputQuantPerda').val() != '' ? (jQuery('#inputQuantPerda').val().split(
            '.').join('')).replace(',', '.') : 0);

        var quantPlan = parseFloat("<?= $ordem->quant_planejada ?>");
        var percCons = round(((quantProd + quantPerd) / quantPlan), 6);

        var quantCons = 0;
        var quantConsCalc = 0;
        <?php foreach($lista_componente as $key_componente => $componente) { ?>
        quantCons = parseFloat("<?= $componente->quant_consumo ?>");
        quantConsCalc = round((quantCons * percCons), 3);

        $("#inputConsumo<?= $componente->seq_componente_producao ?>").val(quantConsCalc.toLocaleString("pt-BR", {
            style: "decimal",
            minimumFractionDigits: 3,
            maximumFractionDigits: 3
        }));

        <?php } ?>
    }

    return;
};

$("#inputConsumoPlan").change(function() {

    if ($("#inputConsumoPlan").is(':checked')) {
        <?php foreach($lista_componente as $key_componente => $componente) { ?>

        quantCons = parseFloat("<?= $componente->quant_consumo ?>");

        $("#inputConsumo<?= $componente->seq_componente_producao ?>").val(quantCons.toLocaleString("pt-BR", {
            style: "decimal",
            minimumFractionDigits: 3,
            maximumFractionDigits: 3
        }));

        <?php } ?>
    } else {
        valTotalConsumo();
    }

});

$('#inputDataReporte').datepicker({
    uiLibrary: 'bootstrap4'
});

const round = (num, places) => {
    return +(parseFloat(num).toFixed(places));
}

$(function() {
    //evnto que deve carregar a janela a ser impressa     
    $('.btnImprimi').click(function() {

        console.log($(this).data("value")); 

        var iFrame = document.createElement("iframe");
        iFrame.addEventListener("load", function() {
            iFrame.contentWindow.focus();
            iFrame.contentWindow.print();
            window.setTimeout(function() {
                document.body.removeChild(iFrame);
            }, 0);
        });
        iFrame.style.display = "none";
        iFrame.src = "<?= base_url("producao/imprimir-etiqueta-producao/") ?>" + $(this).data("value");
        document.body.appendChild(iFrame);
    });
});
</script>

<?php $this->load->view('gerais/footer'); ?>