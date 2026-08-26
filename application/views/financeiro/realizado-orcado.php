<?php $this->load->view('gerais/header', $menu); ?>
<?php $this->load->view('gerais/menu', $menu); ?>

<section>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('visao-geral') ?>">Visão Geral</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('financeiro') ?>">Financeiro</a></li>
            <li class="breadcrumb-item active">Realizado x Orçado</li>
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
                                        <a href="<?= base_url("relatorios/realizado-orcado/{$mes_anterior}/{$ano_anterior}") ?>" class="btn btn-secondary link-load"><i class="fas fa-angle-left"></i></a>
                                    </div>
                                    <input type="text" class="form-control search text-center filtro-data" value="<?= $descMes ?> de <?= $ano ?>" readonly>
                                    <div class="input-group-append">
                                        <a href="<?= base_url("relatorios/realizado-orcado/{$mes_seguinte}/{$ano_seguinte}") ?>" class="btn btn-secondary link-load"><i class="fas fa-angle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card  mb-3">
                    <div class="card-body">
                        <?php if ($lista_resultado_despesa != null) { ?>
                            <nav>
                                <div class="nav nav-pills flex-column flex-sm-row mb-4" id="nav-tab" role="tablist">
                                    <a class="flex-sm-fill text-sm-center nav-item nav-link active" id="despesas-tab" data-toggle="tab" href="#result-despesas" role="tab" aria-controls="result-despesas" aria-selected="true"><i class="fa-solid fa-arrow-up"></i> Despesas</a>
                                    <a class="flex-sm-fill text-sm-center nav-item nav-link" data-toggle="tab" href="#result-receitas" role="tab" aria-controls="result-receitas" aria-selected="false"><i class="fa-solid fa-arrow-right"></i> Receitas</a>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="result-despesas">
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <canvas id="graph-despesas" class=" mb-4" height="130"></canvas>
                                        </div>
                                    </div>
                                    <table class="table table-borderless table-sm mb-0">
                                        <tbody>
                                            <tr>
                                                <td class="text-left pt-0 text-dark"><strong><i class="fa fa-circle fa-xs text-danger pr-2"></i> Total</strong></td>
                                                <td class="text-right pt-0 <?php if ($total_despesa->saidas > 0) echo "text-danger"; ?>">
                                                    <strong>
                                                        R$
                                                        <?= number_format((float) ($total_despesa->saidas), 2, ',', '.') ?>
                                                    </strong>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="result-receitas">
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <canvas id="graph-receitas" class=" mb-4" height="130"></canvas>
                                        </div>
                                    </div>
                                    <table class="table table-borderless table-sm mb-0">
                                        <tbody>
                                            <tr>
                                                <td class="text-left pt-0 text-dark"><strong><i class="fa fa-circle fa-xs text-teal pr-2"></i> Total</strong></td>
                                                <td class="text-right pt-0 <?php if ($total_despesa->entradas > 0) echo "text-teal"; ?>">
                                                    <strong>
                                                        R$
                                                        <?= number_format((float) ($total_despesa->entradas), 2, ',', '.') ?>
                                                    </strong>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="text-center">
                                        <p class="text-muted mb-0 font-italic ">Sem lançamentos para o período
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <form action="<?= base_url("relatorios/realizado-orcado/{$mes}/{$ano}") ?>" method="get" class="mb-0 needs-validation" novalidate>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <select id="inputConta" name="centro" title="Centro de Custo" data-style="btn-input-primary" data-actions-box="true" class="selectpicker show-tick form-control" data-live-search="true" data-actions-box="true">
                                        <option value="">Centro de Custo</option>
                                        <option value="SC" <?php if ("SC" == $centro) {
                                                                echo "selected";
                                                            } ?>>Sem Centro de Custo</option>
                                        <?php foreach ($lista_centro_custo as $key_centro_custo => $centro_custo) { ?>
                                            <option value="<?= $centro_custo->cod_centro_custo ?>" <?php
                                                                                                    if ($centro_custo->cod_centro_custo == $centro) {
                                                                                                        echo "selected";
                                                                                                    } ?>><?= $centro_custo->cod_centro_custo ?> - <?= $centro_custo->nome_centro_custo ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-outline-primary btn-block"><i class="fa-solid fa-rotate"></i> Atualizar Dados</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8 pl-0">
                <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="despesas-tab" data-toggle="tab" href="#mov-despesas" role="tab" aria-controls="mov-despesas" aria-selected="true">Despesas</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="receitas-tab" data-toggle="tab" href="#mov-receitas" role="tab" aria-controls="mov-receitas" aria-selected="false">Receitas</a>
                    </li>
                </ul>
                <div class="card  mb-5">
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="mov-despesas" role="tabpanel" aria-labelledby="despesas-tab">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col" class="text-center small2 align-middle"><i class="fa-regular fa-circle"></i></th>
                                                <th scope="col">Conta contábil</th>
                                                <th scope="col" class="text-right">Realizado</th>
                                                <th scope="col" class="text-right">Orçado</th>
                                                <th scope="col" class="text-right">Variação</th>
                                            </tr>
                                        </thead>
                                        <?php if ($lista_resultado_despesa != false) { ?>
                                            <tbody>
                                                <?php
                                                foreach ($lista_resultado_despesa as $key_resultado => $resultado) {

                                                    $variacao = 0;

                                                    if ($resultado->orcado > 0)
                                                        $variacao = ($resultado->valor / $resultado->orcado) * 100;

                                                ?>
                                                    <tr>
                                                        <td scope="row" class="text-center align-middle small2">
                                                            <i class="text-muted"><i class='fa-solid fa-circle' style="color: <?= $resultado->color ?>"></i></i>
                                                        </td>
                                                        <?php if ($resultado->cod_conta_contabil != null) { ?>
                                                            <td scope="row">
                                                                <a href="#" data-toggle="modal" class="text-dark" data-target="#conta-despesa<?= str_replace(".", "-", $resultado->cod_conta_contabil) ?>"><?= $resultado->cod_conta_contabil ?> - <?= $resultado->nome_conta_contabil ?></a>
                                                            </td>
                                                        <?php } else { ?>
                                                            <td scope="row">
                                                                <a href="#" data-toggle="modal" class="text-dark" data-target="#conta-despesa<?= str_replace(".", "-", $resultado->cod_conta_contabil) ?>"><i>Sem conta</i></a>
                                                            </td>
                                                        <?php } ?>
                                                        <td class="text-right <?php if ($resultado->valor > 0) echo "text-danger"; ?>">
                                                            R$ <?= number_format((float) ($resultado->valor), 2, ',', '.') ?>
                                                        </td>
                                                        <td class="text-right <?php if ($resultado->orcado > 0) echo "text-info"; ?>">
                                                            R$ <?= number_format((float) ($resultado->orcado), 2, ',', '.') ?>
                                                        </td>
                                                        <td class="text-right <?php if ($variacao >= 100) echo "text-danger";
                                                                                elseif ($variacao > 0 && $variacao < 100) echo "text-muted"; ?>">
                                                            <?= number_format((float) ($variacao), 1, ',', '.') ?>%
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        <?php } ?>
                                        <tbody>
                                            <tr>
                                                <td class="text-left align-middle" colspan="4">
                                                    <i>Despesa total</i>
                                                </td>
                                                <td class="text-right align-middle <?php if ($total_despesa->saidas > 0) echo "text-danger"; ?>">
                                                    R$ <?= number_format((float) ($total_despesa->saidas), 2, ',', '.') ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="mov-receitas" role="tabpanel" aria-labelledby="receitas-tab">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col" class="text-center small2 align-middle"><i class="fa-regular fa-circle"></i></th>
                                                <th scope="col">Conta contábil</th>
                                                <th scope="col" class="text-right">Realizado</th>
                                                <th scope="col" class="text-right">Orçado</th>
                                                <th scope="col" class="text-right">Variação</th>
                                            </tr>
                                        </thead>
                                        <?php if ($lista_resultado_receita != false) { ?>
                                            <tbody>
                                                <?php
                                                foreach ($lista_resultado_receita as $key_resultado => $resultado) {

                                                    $variacao = 0;

                                                    if ($resultado->orcado > 0)
                                                        $variacao = ($resultado->valor / $resultado->orcado) * 100;

                                                ?>
                                                    <tr>
                                                        <td scope="row" class="text-center align-middle small2">
                                                            <i class="text-muted"><i class='fa-solid fa-circle' style="color: <?= $resultado->color ?>"></i></i>
                                                        </td>
                                                        <?php if ($resultado->cod_conta_contabil != null) { ?>
                                                            <td scope="row">
                                                                <a href="#" data-toggle="modal" class="text-dark" data-target="#conta-receita<?= str_replace(".", "-", $resultado->cod_conta_contabil) ?>"><?= $resultado->cod_conta_contabil ?> - <?= $resultado->nome_conta_contabil ?></a>
                                                            </td>
                                                        <?php } else { ?>
                                                            <td scope="row">
                                                                <a href="#" data-toggle="modal" class="text-dark" data-target="#conta-receita<?= str_replace(".", "-", $resultado->cod_conta_contabil) ?>"><i>Sem conta</i></a>
                                                            </td>
                                                        <?php } ?>
                                                        <td class="text-right <?php if ($resultado->valor > 0) echo "text-teal"; ?>">
                                                            R$ <?= number_format((float) ($resultado->valor), 2, ',', '.') ?>
                                                        </td>
                                                        <td class="text-right <?php if ($resultado->orcado > 0) echo "text-info"; ?>">
                                                            R$ <?= number_format((float) ($resultado->orcado), 2, ',', '.') ?>
                                                        </td>
                                                        <td class="text-right <?php if ($variacao >= 100) echo "text-teal";
                                                                                elseif ($variacao > 0 && $variacao < 100) echo "text-danger"; ?>">
                                                            <?= number_format((float) ($variacao), 1, ',', '.') ?>%
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        <?php } ?>
                                        <tbody>
                                            <tr>
                                                <td class="text-left align-middle" colspan="4">
                                                    <i>Receita total</i>
                                                </td>
                                                <td class="text-right align-middle <?php if ($total_despesa->entradas > 0) echo "text-teal"; ?>">
                                                    R$ <?= number_format((float) ($total_despesa->entradas), 2, ',', '.') ?>
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
        <br>

    </div>
</section>

<?php foreach ($lista_resultado_despesa as $key_resultado => $resultado) { ?>
    <div class="modal fade" id="conta-despesa<?= str_replace(".", "-", $resultado->cod_conta_contabil) ?>">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Lançamentos <?php if ($resultado->cod_conta_contabil != null) echo "na conta " . $resultado->cod_conta_contabil . " - " . $resultado->nome_conta_contabil . "";
                                                        else echo "<i>Sem Conta</i>"; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body modal-body-scroll bg-light">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-reporte">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th scope="col" class="text-center small2 align-middle"><i class="fa-regular fa-circle"></i></th>
                                                            <th scope="col" class="text-center">Dia</th>
                                                            <th scope="col" class="text-center">Título</th>
                                                            <th scope="col">Descrição</th>
                                                            <th scope="col" class="text-right">Valor</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="table-sm">
                                                        <?php $i = 0;
                                                        foreach ($lista_titulo_despesa as $key_titulo => $titulo) {
                                                            if ($titulo->cod_conta_contabil === $resultado->cod_conta_contabil) {
                                                                $i += 1; ?>
                                                                <tr>
                                                                    <td class="text-center align-middle small2">
                                                                        <i class="text-muted"><i class='fa-solid fa-circle' style="color: <?= $resultado->color ?>"></i></i>
                                                                    </td>
                                                                    <td class="text-center align-middle">
                                                                        <?= str_replace('-', '/', date("d-m-Y", strtotime($titulo->data_confirmacao))) ?>
                                                                    </td>
                                                                    <td class="text-center align-middle"><?= $titulo->cod_movimento_conta ?></td>
                                                                    </td>
                                                                    <td class="limit-text-40 align-middle align-middle" data-toggle="tooltip" data-placement="bottom" title="<?= $titulo->desc_movimento ?>">
                                                                        <?= $titulo->desc_movimento ?><br>
                                                                        <span class="badge bg-info-light"><?= $titulo->nome_conta ?>
                                                                        </span>
                                                                        <?php if ($titulo->nome_fornecedor != null) { ?>
                                                                            <span class="badge font-italic text-muted"><?= $titulo->nome_fornecedor ?>
                                                                            </span>
                                                                        <?php } elseif ($titulo->nome_cliente != null) { ?>
                                                                            <span class="badge font-italic text-muted"><?= $titulo->nome_cliente ?>
                                                                            </span>
                                                                        <?php } ?>
                                                                    </td>
                                                                    <td class="text-right align-middle text-danger">
                                                                        R$ -<?= number_format((float) ($titulo->valor_confirmado), 2, ',', '.') ?>
                                                                    </td>
                                                                </tr>
                                                        <?php }
                                                        } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <?php if ($i == 0) { ?>
                                                <div class="text-center text-muted">
                                                    <p class="font-italic mt-3">Nenhum lançamento realizado</p>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php foreach ($lista_resultado_receita as $key_resultado => $resultado) { ?>
    <div class="modal fade" id="conta-receita<?= str_replace(".", "-", $resultado->cod_conta_contabil) ?>">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Lançamentos <?php if ($resultado->cod_conta_contabil != null) echo "na conta " . $resultado->cod_conta_contabil . " - " . $resultado->nome_conta_contabil . "";
                                                        else echo "<i>Sem Conta</i>"; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body modal-body-scroll bg-light">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-reporte">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th scope="col" class="text-center small2 align-middle"><i class="fa-regular fa-circle"></i></th>
                                                            <th scope="col" class="text-center">Dia</th>
                                                            <th scope="col" class="text-center">Título</th>
                                                            <th scope="col">Descrição</th>
                                                            <th scope="col" class="text-right">Valor</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="table-sm">
                                                        <?php $i = 0;
                                                        foreach ($lista_titulo_receta as $key_titulo => $titulo) {
                                                            if ($titulo->cod_conta_contabil === $resultado->cod_conta_contabil) {
                                                                $i += 1; ?>
                                                                <tr>
                                                                    <td class="text-center align-middle small2">
                                                                        <i class="text-muted"><i class='fa-solid fa-circle' style="color: <?= $resultado->color ?>"></i></i>
                                                                    </td>
                                                                    <td class="text-center align-middle">
                                                                        <?= str_replace('-', '/', date("d-m-Y", strtotime($titulo->data_confirmacao))) ?>
                                                                    </td>
                                                                    <td class="text-center align-middle"><?= $titulo->cod_movimento_conta ?></td>
                                                                    </td>
                                                                    <td class="limit-text-40 align-middle align-middle" data-toggle="tooltip" data-placement="bottom" title="<?= $titulo->desc_movimento ?>">
                                                                        <?= $titulo->desc_movimento ?><br>
                                                                        <span class="badge bg-info-light"><?= $titulo->nome_conta ?>
                                                                        </span>
                                                                        <?php if ($titulo->nome_fornecedor != null) { ?>
                                                                            <span class="badge font-italic text-muted"><?= $titulo->nome_fornecedor ?>
                                                                            </span>
                                                                        <?php } elseif ($titulo->nome_cliente != null) { ?>
                                                                            <span class="badge font-italic text-muted"><?= $titulo->nome_cliente ?>
                                                                            </span>
                                                                        <?php } ?>
                                                                    </td>
                                                                    <td class="text-right align-middle text-teal">
                                                                        R$ <?= number_format((float) ($titulo->valor_confirmado), 2, ',', '.') ?>
                                                                    </td>
                                                                </tr>
                                                        <?php }
                                                        } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <?php if ($i == 0) { ?>
                                                <div class="text-center text-muted">
                                                    <p class="font-italic mt-3">Nenhum lançamento realizado</p>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>



<script>
    $('#inputDataInicio').datepicker({
        uiLibrary: 'bootstrap4'
    });
    $('#inputDataFim').datepicker({
        uiLibrary: 'bootstrap4'
    });

    new Chart(document.getElementById("graph-despesas"), {
        type: 'doughnut',
        data: {
            labels: <?php echo json_encode($label_despesa); ?>,
            datasets: [{
                label: "Produtos vendidos",
                backgroundColor: <?php echo json_encode($color_despesa); ?>,
                data: <?php echo json_encode($perc_despesa); ?>
            }]
        },
        options: {
            responsive: true,
            legend: {
                display: false,
            },
            pieceLabel: {
                mode: 'value'
            },
            plugins: {
                labels: {
                    render: function(args) {
                        if (args.percentage <= 10) {
                            return "";
                        }

                        return args.value.toLocaleString("pt-BR", {
                            style: "decimal",
                            minimumFractionDigits: 1,
                            maximumFractionDigits: 1
                        }) + "%";
                    },
                    fontColor: 'white',
                }
            },
            tooltips: {
                enabled: false,
            },
            cutoutPercentage: 35,
        }

    });

    new Chart(document.getElementById("graph-receitas"), {
        type: 'doughnut',
        data: {
            labels: <?php echo json_encode($label_receita); ?>,
            datasets: [{
                label: "Produtos vendidos",
                backgroundColor: <?php echo json_encode($color_receita); ?>,
                data: <?php echo json_encode($perc_receita); ?>
            }]
        },
        options: {
            responsive: true,
            legend: {
                display: false,
            },
            pieceLabel: {
                mode: 'value'
            },
            plugins: {
                labels: {
                    render: function(args) {
                        if (args.percentage <= 10) {
                            return "";
                        }

                        return args.value.toLocaleString("pt-BR", {
                            style: "decimal",
                            minimumFractionDigits: 1,
                            maximumFractionDigits: 1
                        }) + "%";
                    },
                    fontColor: 'white',
                }
            },
            tooltips: {
                enabled: false,
            },
            cutoutPercentage: 35,
        }

    });
</script>

<?php $this->load->view('gerais/footer'); ?>