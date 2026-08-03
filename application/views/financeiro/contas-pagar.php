<?php $this->load->view('gerais/header', $menu); ?>
<?php $this->load->view('gerais/menu', $menu); ?>

<section>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('visao-geral') ?>">Visão Geral</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('financeiro') ?>">Financeiro</a></li>
            <li class="breadcrumb-item active">Contas a Pagar</li>
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
                                        <a href="<?= base_url("financeiro/contas-pagar/{$mes_anterior}/{$ano_anterior}") ?>" class="btn btn-secondary link-load"><i class="fas fa-angle-left"></i></a>
                                    </div>
                                    <input type="text" class="form-control search text-center filtro-data" value="<?= $descMes ?> de <?= $ano ?>" readonly>
                                    <div class="input-group-append">
                                        <a href="<?= base_url("financeiro/contas-pagar/{$mes_seguinte}/{$ano_seguinte}") ?>" class="btn btn-secondary link-load"><i class="fas fa-angle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card  mb-3">
                    <h6 class="card-header bg-white text-muted">
                        Resultado no período
                    </h6>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 text-dark">
                                <table class="table table-borderless table-sm">
                                    <tbody>
                                        <tr>
                                            <td class="text-left">
                                                A pagar
                                            </td>
                                            <td class="text-right <?php if (($lista_conta_resumida->saida_confirm + $lista_conta_resumida->saida_proj) > 0) echo "text-danger"; ?>">
                                                R$ <?= number_format(($lista_conta_resumida->saida_confirm + $lista_conta_resumida->saida_proj), 2, ',', '.') ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">
                                                A receber
                                            </td>
                                            <td class="text-right <?php if (($lista_conta_resumida->entrada_confirm + $lista_conta_resumida->entrada_proj) > 0) echo "text-teal"; ?>">
                                                R$ <?= number_format(($lista_conta_resumida->entrada_confirm + $lista_conta_resumida->entrada_proj), 2, ',', '.') ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left limit-text-30">
                                                <strong>Resultado</strong>
                                            </td>
                                            <td class="text-right <?php if (($lista_conta_resumida->entrada_confirm + $lista_conta_resumida->entrada_proj) - ($lista_conta_resumida->saida_confirm + $lista_conta_resumida->saida_proj) > 0) echo "text-teal";
                                                                    if (($lista_conta_resumida->entrada_confirm + $lista_conta_resumida->entrada_proj) - ($lista_conta_resumida->saida_confirm + $lista_conta_resumida->saida_proj) < 0) echo "text-danger"; ?>">
                                                <strong>R$ <?= number_format(($lista_conta_resumida->entrada_confirm + $lista_conta_resumida->entrada_proj) - ($lista_conta_resumida->saida_confirm + $lista_conta_resumida->saida_proj), 2, ',', '.') ?></strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if ($lista_conta != false && $lista_conta_resumida->saida_proj > 0) { ?>
                    <div class="card  mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-borderless table-sm text-dark">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-left"></th>
                                                <th scope="col" class="text-right">Total a pagar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($lista_conta as $key_conta_resumida => $conta) if ($conta->saida_proj_total > 0) { { ?>
                                                    <tr>
                                                        <td class="text-left limit-text-30">
                                                            <?= $conta->nome_conta ?>
                                                        </td>
                                                        <td class="text-right <?php if ($conta->saida_proj_total > 0) echo "text-danger"; ?>">
                                                            R$ <?= number_format($conta->saida_proj_total, 2, ',', '.') ?>
                                                        </td>
                                                    </tr>
                                            <?php }
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <div class="row">
                    <div class="col-md-12">
                        <form action="<?= base_url("financeiro/contas-pagar/{$mes}/{$ano}") ?>" method="get" class="mb-0 needs-validation" novalidate>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <select class="selectpicker show-tick form-control" multiple data-live-search="true" data-actions-box="true" title="Conta Financeira" name="ContaFinanceiraFiltro[]" data-style="btn-input-primary">
                                        <?php $chave_conta = 0;
                                        foreach ($lista_conta as $key_conta => $conta) { ?>
                                            <option value="<?= $conta->cod_conta ?>" <?php if ($contaFinanceiraFiltro != null) {
                                                                                            if ($conta->cod_conta == $contaFinanceiraFiltro[$chave_conta]) {
                                                                                                if ((count($contaFinanceiraFiltro) - 1) > $chave_conta) {
                                                                                                    $chave_conta = $chave_conta + 1;
                                                                                                }
                                                                                                echo "selected";
                                                                                            }
                                                                                        } ?>>
                                                <?= $conta->cod_conta ?> - <?= $conta->nome_conta ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <select class="selectpicker show-tick form-control" multiple data-live-search="true" data-actions-box="true" title="Recebedor" data-style="btn-input-primary" name="fornecedorFiltro[]">
                                        <?php $chave_fornecedor = 0;
                                        foreach ($lista_fornecedor as $key_fornecedor => $fornecedor) { ?>
                                            <option value="<?= $fornecedor->cod_fornecedor ?>" <?php if ($fornecedorFiltro != null) {
                                                                                                    if ($fornecedor->cod_fornecedor == $fornecedorFiltro[$chave_fornecedor]) {
                                                                                                        if ((count($fornecedorFiltro) - 1) > $chave_fornecedor) {
                                                                                                            $chave_fornecedor = $chave_fornecedor + 1;
                                                                                                        }
                                                                                                        echo "selected";
                                                                                                    }
                                                                                                } ?>>
                                                <?= $fornecedor->cod_fornecedor ?> -
                                                <?= $fornecedor->nome_fornecedor ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <select class="selectpicker show-tick form-control" multiple data-live-search="true" data-actions-box="true" title="Método de Pagamento" name="MetodoPagamentoFiltro[]" data-style="btn-input-primary">
                                        <?php $chave_metodo_pagamento = 0;
                                        foreach ($lista_metodo_pagamento as $key_metodo_pagamento => $metodo_pagamento) { ?>
                                            <option value="<?= $metodo_pagamento->cod_metodo_pagamento ?>" <?php if ($metodoPagamentoFiltro != null) {
                                                                                                                if ($metodo_pagamento->cod_metodo_pagamento == $metodoPagamentoFiltro[$chave_metodo_pagamento]) {
                                                                                                                    if ((count($metodoPagamentoFiltro) - 1) > $chave_metodo_pagamento) {
                                                                                                                        $chave_metodo_pagamento = $chave_metodo_pagamento + 1;
                                                                                                                    }
                                                                                                                    echo "selected";
                                                                                                                }
                                                                                                            } ?>>
                                                <?= $metodo_pagamento->cod_metodo_pagamento ?> -
                                                <?= $metodo_pagamento->nome_metodo_pagamento ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <select class="selectpicker show-tick form-control" multiple data-live-search="true" data-actions-box="true" title="Centro de Custo" name="CentroCustoFiltro[]" data-style="btn-input-primary">
                                        <?php $chave_centro_custo = 0;
                                        foreach ($lista_centro_custo as $key_centro_custo => $centro_custo) { ?>
                                            <option value="<?= $centro_custo->cod_centro_custo ?>" <?php if ($centroCustoFiltro != null) {
                                                                                                        if ($centro_custo->cod_centro_custo == $centroCustoFiltro[$chave_centro_custo]) {
                                                                                                            if ((count($centroCustoFiltro) - 1) > $chave_centro_custo) {
                                                                                                                $chave_centro_custo = $chave_centro_custo + 1;
                                                                                                            }
                                                                                                            echo "selected";
                                                                                                        }
                                                                                                    } ?>>
                                                <?= $centro_custo->cod_centro_custo ?> -
                                                <?= $centro_custo->nome_centro_custo ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <select class="selectpicker show-tick form-control" multiple data-live-search="true" data-actions-box="true" title="Conta Contábil" name="ContaContabilFiltro[]" data-style="btn-input-primary">
                                        <?php $chave_conta_contabil = 0;
                                        foreach ($lista_conta_contabil as $key_conta_contabil => $conta_contabil) { ?>
                                            <option value="<?= $conta_contabil->cod_conta_contabil ?>" <?php if ($contaContabilFiltro != null) {
                                                                                                            if ($conta_contabil->cod_conta_contabil == $contaContabilFiltro[$chave_conta_contabil]) {
                                                                                                                if ((count($contaContabilFiltro) - 1) > $chave_conta_contabil) {
                                                                                                                    $chave_conta_contabil = $chave_conta_contabil + 1;
                                                                                                                }
                                                                                                                echo "selected";
                                                                                                            }
                                                                                                        } ?>>
                                                <?= $conta_contabil->cod_conta_contabil ?> -
                                                <?= $conta_contabil->nome_conta_contabil ?>
                                            </option>
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
                <ul class="nav nav-tabs mb-3">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#contas-pagar">Contas a Pagar</a>
                    </li>
                </ul>
                <div class="card  mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-9">
                                <button data-toggle="modal" data-target="#inserir-titulo" type="button" data-backdrop="static" data-keyboard="false" class="btn btn-sm btn-outline-info"><i class="fas fa-plus-circle"></i> Novo
                                    Título</button>
                                <button data-toggle="modal" data-target="#confirma-titulo" type="button" class="btn btn-outline-teal btn-sm" id="btnConfirmar" disabled><i class="fas fa-check"></i> Confirmar</button>
                                <button data-toggle="modal" data-target="#elimina-titulo" type="button" class="btn btn-outline-danger btn-sm" id="btnExcluir" disabled><i class="fas fa-trash-alt"></i> Excluir</button>
                            </div>
                            <div class="col-md-3">
                                <h4 class="font-italic mb-0 text-right text-danger" id="ValorTotalSel"></h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <?php if ($this->session->flashdata('erro') <> "") { ?>
                                    <div class="alert alert-danger alert-dismissible fade show mt-2 mb-0" id="alert" role="alert">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <strong>Atenção!</strong> <?= $this->session->flashdata('erro') ?>
                                    </div>
                                <?php }
                                $this->session->set_flashdata('erro', ''); ?>
                                <?php if ($this->session->flashdata('sucesso') <> "") { ?>
                                    <div class="alert alert-success alert-dismissible fade show mt-2 mb-0" id="alert" role="alert">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <strong>Muito bem!</strong>
                                        <?= $this->session->flashdata('sucesso') ?>
                                    </div>
                                <?php }
                                $this->session->set_flashdata('sucesso', ''); ?>
                                <form action="<?= base_url("financeiro/contas-pagar/acao-titulo/{$mes}/{$ano}") ?>" method="POST" id="formAcao" class="mb-0 needs-validation" novalidate>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th scope="col" class="text-center">
                                                        <div class="checkbox text-center">
                                                            <input id="select-all" type="checkbox" />
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="text-center">Vencimento</th>
                                                    <th scope="col">Descrição</th>
                                                    <th scope="col" class="text-center">Parcela</th>
                                                    <th scope="col" class="text-right">Valor</th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-sm">
                                                <?php foreach ($lista_contas_pagar as $key_contas_pagar => $contas_pagar) { ?>
                                                    <tr class="border-bottom border-top border-light">
                                                        <td class="align-middle">
                                                            <div class="checkbox text-center">
                                                                <input name="selecionar_todos[]" type="checkbox" value="<?= $contas_pagar->cod_movimento_conta ?>" />
                                                            </div>
                                                        </td>
                                                        <td class="text-center align-middle 
                                                            <?php if ($contas_pagar->data_vencimento < date('Y-m-d')) echo "text-danger"; ?>
                                                            <?php if ($contas_pagar->data_vencimento == date('Y-m-d')) echo "text-warning"; ?>">
                                                            <?= str_replace('-', '/', date("d-m-Y", strtotime($contas_pagar->data_vencimento))) ?>
                                                            <?php if ($contas_pagar->data_vencimento < date('Y-m-d')) { ?>
                                                                <span class="badge bg-danger-light">
                                                                    <?php
                                                                    $date1 = date_create($contas_pagar->data_vencimento);
                                                                    $date2 = date_create(date('Y-m-d'));
                                                                    $diff = date_diff($date1, $date2);
                                                                    echo $diff->format("%a");
                                                                    ?>
                                                                </span>
                                                            <?php } ?>
                                                        </td>
                                                        <td class="limit-text-50 align-middle" data-toggle="tooltip" data-placement="bottom" title="<?= $contas_pagar->desc_movimento ?>">
                                                            <a href="#" data-toggle="modal" class="text-dark" data-target="#editar-titulo<?= $contas_pagar->cod_movimento_conta ?>"><?= $contas_pagar->desc_movimento ?></a><br>

                                                            <span class="badge bg-info-light"><?= $contas_pagar->nome_conta ?>
                                                            </span>
                                                            <?php if ($contas_pagar->nome_fornecedor != null) { ?>
                                                                <span class="badge font-italic text-muted"><?= $contas_pagar->nome_fornecedor ?>
                                                                </span>
                                                            <?php } ?>
                                                        </td>
                                                        <td class="text-center align-middle"><?= $contas_pagar->parcela ?>
                                                        </td>
                                                        <td class="text-right text-danger align-middle" id="ValorTitulo<?= $contas_pagar->cod_movimento_conta ?>">
                                                            R$
                                                            <?= number_format($contas_pagar->valor_titulo, 2, ',', '.') ?>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <?php if ($lista_contas_pagar == false) { ?>
                                        <div class="text-center text-muted">
                                            <p class="font-italic mt-3">Nenhum título pendente para o período</p>
                                        </div>
                                    <?php } ?>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-xs-12">
                                <div>
                                    <?= $pagination; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="elimina-titulo" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Eliminar título</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Confirma eliminação dos títulos selecionados?
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger" name="Acao" value="Eliminar" form="formAcao">Confirma</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="confirma-titulo" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmar título</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Deseja confirmar os títulos selecionados?
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-teal" name="Acao" value="Confirmar" form="formAcao">Confirma</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="inserir-titulo">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Novo título</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modal-body-scroll bg-light">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="nav nav-tabs mb-3">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#inf-titulo">Informações do
                                    Título</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#financeiro">Financeiro</a>
                            </li>
                        </ul>
                        <form class="mb-0 needs-validation" novalidate action="<?= base_url("financeiro/contas-pagar/inserir-titulo/{$mes}/{$ano}") ?>" method='post' id='formTitulo'>
                            <div class="card">
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane fade active show" id="inf-titulo">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-3">
                                                            <label for="inputDataCompetencia">Data de Competência <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" id="inputDataCompetencia" name="DataCompetencia" value="<?php if (set_value('DataCompetencia') == "") {
                                                                                                                                                                echo str_replace('-', '/', date("d-m-Y"));
                                                                                                                                                            } else {
                                                                                                                                                                echo set_value('DataCompetencia');
                                                                                                                                                            } ?>" required>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="control-label" for="inputValorTitulo">Valor do
                                                                Título <span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">R$</span>
                                                                </div>
                                                                <input type="text" class="form-control" class="form-control" id="inputValorTitulo" type="text" name="ValorTitulo" data-mask="#.##0,00" data-mask-reverse="true" value="<?= set_value('ValorTitulo'); ?>" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="inputFornecedor">Recebedor</label>
                                                            <select id="inputFornecedor" class="selectpicker show-tick form-control" data-live-search="true" data-actions-box="true" data-style="btn-input-primary" title=" " name="CodFornecedor">
                                                                <?php foreach ($lista_fornecedor as $key_fornecedor => $fornecedor) { ?>
                                                                    <option value="<?= $fornecedor->cod_fornecedor ?>" <?php if ($fornecedor->cod_fornecedor == set_value('CodFornecedor')) echo "selected"; ?>>
                                                                        <?= $fornecedor->cod_fornecedor ?> -
                                                                        <?= $fornecedor->nome_fornecedor ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label class="control-label" for="inputDescricao">Descrição
                                                                Título</label>
                                                            <input class="form-control" id="inputDescricao" type="text" name="Descricao" value="<?= set_value('Descricao') ?>" required>
                                                        </div>
                                                    </div>

                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-row">
                                                                <div class="form-group col-md-12">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" id="inputConfirmar" name="Confirmar" value="1">
                                                                        <label class="custom-control-label" for="inputConfirmar">Confirmar
                                                                            Título</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-row" id="dataConfirmacao" style="display: none">
                                                                <div class="form-group col-md-3">
                                                                    <label class="control-label">Data da
                                                                        Confirmação</label>
                                                                    <input type="text" class="form-control" id="inputDataConfirmacao" name="DataConfirmacao" value="<?= set_value('DataConfirmacao') ?>">
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label class="control-label" for="inputValorDescontoTaxas">Descontos e
                                                                        Taxas</label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">R$</span>
                                                                        </div>
                                                                        <input type="text" class="form-control" class="form-control" id="inputValorDescontoTaxas" type="text" name="ValorDescontoTaxas" data-mask="#.##0,00" data-mask-reverse="true" value="<?= set_value('ValorDescontoTaxas'); ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label class="control-label" for="inputValorMultasJustos">Multas e
                                                                        Juros</label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">R$</span>
                                                                        </div>
                                                                        <input type="text" class="form-control" class="form-control" id="inputValorMultasJustos" type="text" name="ValorMultasJustos" data-mask="#.##0,00" data-mask-reverse="true" value="<?= set_value('ValorMultasJustos'); ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label class="control-label" for="inputValorPagar">Valor a
                                                                        Pagar</label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">R$</span>
                                                                        </div>
                                                                        <input type="text" class="form-control" class="form-control" readonly id="inputValorPagar" type="text" name="ValorPagar" data-mask="#.##0,00" data-mask-reverse="true" value="<?= set_value('ValorPagar'); ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="financeiro">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-row">
                                                                <div class="form-group col-md-5">
                                                                    <label>Centro de Custo</label>
                                                                    <select class="selectpicker show-tick form-control" data-live-search="true" data-actions-box="true" title=" " name="CodCentroCusto" data-style="btn-input-primary">
                                                                        <?php foreach ($lista_centro_custo as $key_centro_custo => $centro_custo) { ?>
                                                                            <option value="<?= $centro_custo->cod_centro_custo ?>" <?php if ($centro_custo->cod_centro_custo == set_value('CodCentroCustoa')) echo "selected"; ?>>
                                                                                <?= $centro_custo->cod_centro_custo ?> -
                                                                                <?= $centro_custo->nome_centro_custo ?>
                                                                            </option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-5">
                                                                    <label>Conta Contábil</label>
                                                                    <select class="selectpicker show-tick form-control" id="inputContaContabil" data-live-search="true" data-actions-box="true" title=" " name="CodContaContabil" data-style="btn-input-primary">
                                                                        <?php foreach ($lista_conta_contabil as $key_conta_contabil => $conta_contabil) { ?>
                                                                            <option value="<?= $conta_contabil->cod_conta_contabil ?>" <?php if ($conta_contabil->cod_conta_contabil == set_value('CodContaContabil')) echo "selected"; ?>>
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
                                                                            <label class="control-label" for="inputDataVencimento1">Data de
                                                                                Vencimento
                                                                                <span class="text-danger">*</span></label>
                                                                            <input type="text" class="form-control" id="inputDataVencimento1" name="DataVencimento[1]" value="<?php if (set_value('DataVencimento[1]') == "") {
                                                                                                                                                                                    echo str_replace('-', '/', date("d-m-Y"));
                                                                                                                                                                                } else {
                                                                                                                                                                                    echo set_value('DataVencimento[1]');
                                                                                                                                                                                } ?>" required>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="control-label" for="inputValorParcela1">Valor da
                                                                                Parcela <span class="text-danger">*</span></label>
                                                                            <div class="input-group">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text">R$</span>
                                                                                </div>
                                                                                <input class="form-control" id="inputValorParcela1" name="ValorParcela[1]" type="text" data-mask="#.##0,00" inputmode="numeric" data-mask-reverse="true" ] value="<?= set_value('ValorTitulo'); ?>" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label>Método de Pagamento</label>
                                                                            <select class="selectpicker show-tick form-control" data-live-search="true" data-actions-box="true" title=" " name="CodMetodoPagamento[1]" data-style="btn-input-primary">
                                                                                <?php foreach ($lista_metodo_pagamento as $key_metodo_pagamento => $metodo_pagamento) { ?>
                                                                                    <option value="<?= $metodo_pagamento->cod_metodo_pagamento ?>" <?php if (
                                                                                                                                                        $metodo_pagamento->cod_metodo_pagamento ==
                                                                                                                                                        set_value('CodMetodoPagamento')
                                                                                                                                                    ) echo "selected"; ?>>
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
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" form="formTitulo"><i class="fas fa-save"></i>
                    Salvar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<?php foreach ($lista_contas_pagar as $key_contas_pagar => $contas_pagar) { ?>
    <div class="modal fade" id="editar-titulo<?= $contas_pagar->cod_movimento_conta ?>">
        <div class="modal-dialog modal-xxl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar título</h5>
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
                                                    Título: <?= $contas_pagar->cod_movimento_conta ?>
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
                                                        <td class="text-left align-middle text-muted">
                                                            Usuário criação
                                                        </td>
                                                        <td class="text-right align-middle">
                                                            <?php if ($contas_pagar->nome_usuario != null) echo $contas_pagar->nome_usuario; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left align-middle text-muted">
                                                            Parcela
                                                        </td>
                                                        <td class="text-right align-middle">
                                                            <?= $contas_pagar->parcela ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left align-middle text-muted">
                                                            Origem do título
                                                        </td>
                                                        <td class="text-right align-middle">
                                                            <?php
                                                            switch ($contas_pagar->origem_movimento) {
                                                                case 2:
                                                                    echo "Compras";
                                                                    break;
                                                                case 3:
                                                                    echo "Vendas";
                                                                    break;
                                                                case 4:
                                                                    echo "Frente de Caixa";
                                                                    break;
                                                                case 5:
                                                                    echo "Movimento de Caixa";
                                                                    break;
                                                                default:
                                                                    echo "Financeiro";
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left align-middle text-muted">
                                                            <?php
                                                            switch ($contas_pagar->origem_movimento) {
                                                                case 2:
                                                                    echo "Recebimento";
                                                                    break;
                                                                case 3:
                                                                    echo "Faturamento";
                                                                    break;
                                                                case 4:
                                                                    echo "Data Caixa";
                                                                    break;
                                                                case 5:
                                                                    echo "Código";
                                                                    break;
                                                                default:
                                                                    echo "Título";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td class="text-right align-middle">
                                                            <?php
                                                            if ($contas_pagar->id_origem != null)
                                                                echo $contas_pagar->id_origem;
                                                            else
                                                                echo $contas_pagar->cod_movimento_conta;
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left align-middle text-muted">
                                                            Título relacionado
                                                        </td>
                                                        <td class="text-right align-middle">
                                                            <?php if ($contas_pagar->cod_titulo_rel != null) echo $contas_pagar->cod_titulo_rel; ?>
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
                                            <form class="mb-0 needs-validation" novalidate action="<?= base_url("financeiro/contas-pagar/editar-titulo/{$contas_pagar->cod_movimento_conta}/{$mes}/{$ano}") ?>" method='post' id='formTitulo<?= $contas_pagar->cod_movimento_conta ?>'>
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label>Data de Competência <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="inputDataCompetenciaEdit<?= $contas_pagar->cod_movimento_conta ?>" name="DataCompetencia" value="<?= str_replace('-', '/', date("d-m-Y", strtotime($contas_pagar->data_competencia))) ?>" required>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Data de Vencimento <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="inputDataVencimentoEdit<?= $contas_pagar->cod_movimento_conta ?>" name="DataVencimento" value="<?= str_replace('-', '/', date("d-m-Y", strtotime($contas_pagar->data_vencimento))) ?>" required>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label">Valor do Título <span class="text-danger">*</span></label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">R$</span>
                                                            </div>
                                                            <input type="text" class="form-control" class="form-control" id="inputValorTitulo<?= $contas_pagar->cod_movimento_conta ?>" type="text" name="ValorTitulo" data-mask="#.##0,00" data-mask-reverse="true" value="<?= $contas_pagar->valor_titulo ?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <label>Recebedor</label>
                                                        <select class="selectpicker show-tick form-control" data-live-search="true" data-actions-box="true" data-style="btn-input-primary" title=" " name="CodFornecedor">
                                                            <?php foreach ($lista_fornecedor as $key_fornecedor => $fornecedor) { ?>
                                                                <option value="<?= $fornecedor->cod_fornecedor ?>" <?php if ($fornecedor->cod_fornecedor == $contas_pagar->cod_emitente) echo "selected"; ?>>
                                                                    <?= $fornecedor->cod_fornecedor ?> -
                                                                    <?= $fornecedor->nome_fornecedor ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <label class="control-label">Descrição Título</label>
                                                        <input class="form-control" type="text" name="Descricao" value="<?= $contas_pagar->desc_movimento ?>" required>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label>Método de Pagamento</label>
                                                        <select class="selectpicker show-tick form-control" data-live-search="true" data-actions-box="true" title=" " name="CodMetodoPagamento" data-style="btn-input-primary">
                                                            <?php foreach ($lista_metodo_pagamento as $key_metodo_pagamento => $metodo_pagamento) { ?>
                                                                <option value="<?= $metodo_pagamento->cod_metodo_pagamento ?>" <?php if ($metodo_pagamento->cod_metodo_pagamento == $contas_pagar->cod_metodo_pagamento) echo "selected"; ?>>
                                                                    <?= $metodo_pagamento->cod_metodo_pagamento ?> -
                                                                    <?= $metodo_pagamento->nome_metodo_pagamento ?>
                                                                </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Conta Financeira <span class="text-danger">*</span></label>
                                                        <select class="selectpicker show-tick form-control" data-live-search="true" data-actions-box="true" title=" " name="CodConta" data-style="btn-input-primary" required>
                                                            <?php foreach ($lista_conta as $key_conta => $conta) { ?>
                                                                <option value="<?= $conta->cod_conta ?>" <?php if ($conta->cod_conta == $contas_pagar->cod_conta) echo "selected"; ?>>
                                                                    <?= $conta->cod_conta ?> - <?= $conta->nome_conta ?>
                                                                </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label>Centro de Custo</label>
                                                        <select class="selectpicker show-tick form-control" data-live-search="true" data-actions-box="true" title=" " name="CodCentroCusto" data-style="btn-input-primary">
                                                            <?php foreach ($lista_centro_custo as $key_centro_custo => $centro_custo) { ?>
                                                                <option value="<?= $centro_custo->cod_centro_custo ?>" <?php if ($centro_custo->cod_centro_custo == $contas_pagar->cod_centro_custo) echo "selected"; ?>>
                                                                    <?= $centro_custo->cod_centro_custo ?> -
                                                                    <?= $centro_custo->nome_centro_custo ?>
                                                                </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Conta Contábil</label>
                                                        <select class="selectpicker show-tick form-control" data-live-search="true" data-actions-box="true" title=" " name="CodContaContabil" data-style="btn-input-primary">
                                                            <?php foreach ($lista_conta_contabil as $key_conta_contabil => $conta_contabil) { ?>
                                                                <option value="<?= $conta_contabil->cod_conta_contabil ?>" <?php if ($conta_contabil->cod_conta_contabil == $contas_pagar->cod_conta_contabil) echo "selected"; ?>>
                                                                    <?= $conta_contabil->cod_conta_contabil ?> -
                                                                    <?= $conta_contabil->nome_conta_contabil ?>
                                                                </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="inputConfirmarEdit<?= $contas_pagar->cod_movimento_conta ?>" name="Confirmar" value="1" <?php if ($contas_pagar->confirmado == 1) echo "checked"; ?>>
                                                            <label class="custom-control-label" for="inputConfirmarEdit<?= $contas_pagar->cod_movimento_conta ?>">Confirmar
                                                                Título</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row" id="dataConfirmacao<?= $contas_pagar->cod_movimento_conta ?>" style="display: none">
                                                    <div class="form-group col-md-3">
                                                        <label class="control-label" for="inputDataConfirmacao<?= $contas_pagar->cod_movimento_conta ?>">Data
                                                            de
                                                            Confirmação <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="inputDataConfirmacao<?= $contas_pagar->cod_movimento_conta ?>" name="DataConfirmacao" value="<?= set_value('DataConfirmacao') ?>">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="control-label" for="inputValorDescontoTaxas<?= $contas_pagar->cod_movimento_conta ?>">Descontos
                                                            e Taxas</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">R$</span>
                                                            </div>
                                                            <input type="text" class="form-control" class="form-control" id="inputValorDescontoTaxas<?= $contas_pagar->cod_movimento_conta ?>" type="text" name="ValorDescontoTaxas" data-mask="#.##0,00" data-mask-reverse="true" value="<?= $contas_pagar->valor_desc_taxa ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="control-label" for="inputValorMultasJustos<?= $contas_pagar->cod_movimento_conta ?>">Multas
                                                            e
                                                            Juros</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">R$</span>
                                                            </div>
                                                            <input type="text" class="form-control" class="form-control" id="inputValorMultasJustos<?= $contas_pagar->cod_movimento_conta ?>" type="text" name="ValorMultasJustos" data-mask="#.##0,00" data-mask-reverse="true" value="<?= $contas_pagar->valor_juros_multa ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="control-label" for="inputValorPagar<?= $contas_pagar->cod_movimento_conta ?>">Valor
                                                            a
                                                            Pagar</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">R$</span>
                                                            </div>
                                                            <input type="text" class="form-control" class="form-control" readonly id="inputValorPagar<?= $contas_pagar->cod_movimento_conta ?>" type="text" name="ValorPagar" data-mask="#.##0,00" data-mask-reverse="true" value="<?= set_value('ValorPagar'); ?>">
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
                    <button type="submit" class="btn btn-primary" form="formTitulo<?= $contas_pagar->cod_movimento_conta ?>" <?php if ($contas_pagar->ativo == 2) echo "disabled"; ?>><i class="fas fa-save"></i>
                        Salvar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<script>
    $('.page-item>a').addClass("page-link");

    $(function() {
        $.applyDataMask();
    });

    function calculaTitulo() {

        var cont = $("[name='selecionar_todos[]']:checked").length;
        $("#btnExcluir").prop("disabled", cont ? false : true);

        var total = 0;
        var indice = 0;
        $("input[name='selecionar_todos[]']:checked").each(function() {

            indice = $(this).val();

            valorTitulo = parseFloat(jQuery('#ValorTitulo' + indice).text() != '' ? (jQuery('#ValorTitulo' +
                indice).text().split('.').join('')).replace(',', '.').replace('R$', '') : 0);
            total = total + valorTitulo;

        });

        if (total > 0) {

            $('#ValorTotalSel').text('R$ ' + total.toLocaleString("pt-BR", {
                style: "decimal",
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            }));
        } else {
            $('#ValorTotalSel').text('');
        }

    }

    $('#select-all').click(function(event) {
        if (this.checked) {
            // Iterate each checkbox
            $("input[name='selecionar_todos[]']").each(function() {
                this.checked = true;
            });
        } else {
            $("input[name='selecionar_todos[]']").each(function() {
                this.checked = false;
            });
        }

        var cont = $("[name='selecionar_todos[]']:checked").length;
        $("#btnConfirmar").prop("disabled", cont ? false : true);

        calculaTitulo();
    });

    $("[name='selecionar_todos[]']").click(function() {

        var cont = $("[name='selecionar_todos[]']:checked").length;
        $("#btnConfirmar").prop("disabled", cont ? false : true);

        calculaTitulo();

    });

    $('#inputDataVencimento1').datepicker({
        uiLibrary: 'bootstrap4'
    });

    $('#inputDataCompetencia').datepicker({
        uiLibrary: 'bootstrap4'
    });

    $('#inputDataConfirmacao').datepicker({
        uiLibrary: 'bootstrap4'
    });

    $("#inputConfirmar").on('change', function() {

        if ($("#dataConfirmacao").is(":hidden")) {
            $("#inputDataConfirmacao").prop('required', true);
            $("#dataConfirmacao").show(300);
            $("#inputDataConfirmacao").val("<?= str_replace('-', '/', date("d-m-Y")) ?>");
            calcValorPagar();
        } else {
            $("#inputDataConfirmacao").prop('required', false);
            $("#dataConfirmacao").hide(300);
            $("#inputDataConfirmacao").val("");
            $("#inputValorPagar").val("");
        };

    });

    jQuery('#inputValorTitulo').on('keyup', function() {
        calcValorPagar();
    });
    jQuery('#inputValorDescontoTaxas').on('keyup', function() {
        calcValorPagar();
    });
    jQuery('#inputValorMultasJustos').on('keyup', function() {
        calcValorPagar();
    });

    function calcValorPagar() {

        var chkConfirm = document.getElementById("inputConfirmar");
        if (chkConfirm.checked == true) {

            var valorTitulo = parseFloat(jQuery('#inputValorTitulo').val() != '' ? (jQuery('#inputValorTitulo').val().split(
                '.').join('')).replace(',', '.') : 0);
            var descTaxas = parseFloat(jQuery('#inputValorDescontoTaxas').val() != '' ? (jQuery('#inputValorDescontoTaxas')
                .val().split('.').join('')).replace(',', '.') : 0);
            var multJuros = parseFloat(jQuery('#inputValorMultasJustos').val() != '' ? (jQuery('#inputValorMultasJustos')
                .val().split('.').join('')).replace(',', '.') : 0);

            var totalPagar = valorTitulo - descTaxas + multJuros;

            $('#inputValorPagar').val(totalPagar.toLocaleString("pt-BR", {
                style: "decimal",
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            }));

        }

    }

    <?php foreach ($lista_contas_pagar as $key_contas_pagar => $contas_pagar) { ?>
        $('#inputDataVencimentoEdit<?= $contas_pagar->cod_movimento_conta ?>').datepicker({
            uiLibrary: 'bootstrap4'
        });

        $('#inputDataCompetenciaEdit<?= $contas_pagar->cod_movimento_conta ?>').datepicker({
            uiLibrary: 'bootstrap4'
        });

        $('#inputDataConfirmacao<?= $contas_pagar->cod_movimento_conta ?>').datepicker({
            uiLibrary: 'bootstrap4'
        });

        $("#inputConfirmarEdit<?= $contas_pagar->cod_movimento_conta ?>").on('change', function() {

            if ($("#dataConfirmacao<?= $contas_pagar->cod_movimento_conta ?>").is(":hidden")) {
                $("#inputDataConfirmacao<?= $contas_pagar->cod_movimento_conta ?>").prop('required', true);
                $("#dataConfirmacao<?= $contas_pagar->cod_movimento_conta ?>").show(300);
                $("#inputDataConfirmacao<?= $contas_pagar->cod_movimento_conta ?>").val(
                    "<?= str_replace('-', '/', date("d-m-Y")) ?>");
                calcValorPagarEdit(<?= $contas_pagar->cod_movimento_conta ?>);
            } else {
                $("#inputDataConfirmacao<?= $contas_pagar->cod_movimento_conta ?>").prop('required', false);
                $("#dataConfirmacao<?= $contas_pagar->cod_movimento_conta ?>").hide(300);
                $("#inputDataConfirmacao<?= $contas_pagar->cod_movimento_conta ?>").val("");
                $("#inputValorPagar<?= $contas_pagar->cod_movimento_conta ?>").val("");
            };

        });

        jQuery('#inputValorTitulo<?= $contas_pagar->cod_movimento_conta ?>').on('keyup', function() {
            calcValorPagarEdit(<?= $contas_pagar->cod_movimento_conta ?>);
        });
        jQuery('#inputValorDescontoTaxas<?= $contas_pagar->cod_movimento_conta ?>').on('keyup', function() {
            calcValorPagarEdit(<?= $contas_pagar->cod_movimento_conta ?>);
        });
        jQuery('#inputValorMultasJustos<?= $contas_pagar->cod_movimento_conta ?>').on('keyup', function() {
            calcValorPagarEdit(<?= $contas_pagar->cod_movimento_conta ?>);
        });


    <?php } ?>

    function calcValorPagarEdit(cod_movimento_conta) {

        var chkConfirm = document.getElementById("inputConfirmarEdit" + cod_movimento_conta);
        if (chkConfirm.checked == true) {

            var valorTitulo = parseFloat(jQuery('#inputValorTitulo' + cod_movimento_conta).val() != '' ? (jQuery(
                '#inputValorTitulo' + cod_movimento_conta).val().split('.').join('')).replace(',', '.') : 0);
            var descTaxas = parseFloat(jQuery('#inputValorDescontoTaxas' + cod_movimento_conta).val() != '' ? (jQuery(
                '#inputValorDescontoTaxas' + cod_movimento_conta).val().split('.').join('')).replace(',', '.') : 0);
            var multJuros = parseFloat(jQuery('#inputValorMultasJustos' + cod_movimento_conta).val() != '' ? (jQuery(
                '#inputValorMultasJustos' + cod_movimento_conta).val().split('.').join('')).replace(',', '.') : 0);

            var totalPagar = valorTitulo - descTaxas + multJuros;

            $('#inputValorPagar' + cod_movimento_conta).val(totalPagar.toLocaleString("pt-BR", {
                style: "decimal",
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            }));

        }
    }

    $("#btnParcelas").click(function() {

        var quantParcela = $('#inputParcelas').val();

        if (quantParcela > 1) {
            var chkConfirm = document.getElementById("inputConfirmar");
            chkConfirm.checked = false;
            chkConfirm.disabled = true;
            $("#dataConfirmacao").hide(300);
            $("#inputDataConfirmacao").val("");
            $("#inputValorDescontoTaxas").val("");
            $("#inputValorMultasJustos").val("");
            $("#inputValorPagar").val("");
        } else {
            var chkConfirm = document.getElementById("inputConfirmar");
            chkConfirm.disabled = false;
        }

        var dataParcela = new Date(String($('#inputDataVencimento1').val().split('/').reverse().join('-')));

        var valorTotal = parseFloat(jQuery('#inputValorTitulo').val() != '' ? (jQuery('#inputValorTitulo').val()
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
                'title=" "' +
                'name="CodMetodoPagamento[' + i + ']" id="selectMetodoPag' + i + '"' +
                'data-style="btn-input-primary">';
            <?php foreach ($lista_metodo_pagamento as $key_metodo_pagamento => $metodo_pagamento) { ?>
                cols += '<option ' +
                    'value="<?= $metodo_pagamento->cod_metodo_pagamento ?>" ' +
                    '<?php if ($metodo_pagamento->cod_metodo_pagamento == set_value('CodMetodoPagamento')) echo "selected"; ?>> ' +
                    '<?= $metodo_pagamento->cod_metodo_pagamento ?>' + '-' +
                    '<?= $metodo_pagamento->nome_metodo_pagamento ?>' +
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

    jQuery('#inputValorTitulo').on('keyup', function() {

        var quantParcela = $('#inputParcelas').val();

        var valorTotal = parseFloat(jQuery('#inputValorTitulo').val() != '' ? (jQuery('#inputValorTitulo').val()
            .split('.').join('')).replace(',', '.') : 0);
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

    });
</script>

<?php $this->load->view('gerais/footer'); ?>