<?php $this->load->view('gerais/header', $menu); ?>
<?php $this->load->view('gerais/menu', $menu); ?>

<section>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('visao-geral') ?>">Visão Geral</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('financeiro') ?>">Financeiro</a></li>
            <li class="breadcrumb-item active">Lançamento de Contas</a></li>
        </ol>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card  mb-3">                
                    <div class="card-body">
                        <nav>
                            <div class="nav nav-pills flex-column flex-sm-row mb-3" id="nav-tab" role="tablist">
                                <a class="flex-sm-fill text-sm-center nav-item nav-link active" id="result-confirmado-tab" data-toggle="tab" href="#result-confirmado" role="tab" aria-controls="result-confirmado" aria-selected="true"><i class="fa-solid fa-check"></i> Confirmado</a>
                                <a class="flex-sm-fill text-sm-center nav-item nav-link" data-toggle="tab" href="#result-projetado" role="tab" aria-controls="result-projetado" aria-selected="false"><i class="fa-solid fa-arrow-right"></i> Projetado</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="result-confirmado">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <canvas id="graph-resultado-confirmado"></canvas>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-borderless table-sm mb-3">
                                            <tbody>
                                                <tr>
                                                    <td class="text-left"><i class="fa fa-circle fa-xs text-teal pr-2"></i>
                                                        Receitas
                                                    </td>
                                                    <td
                                                        class="text-right <?php if($lista_conta_resumida->entrada_confirm > 0) echo "text-teal"; ?>">
                                                        R$
                                                        <?= number_format((float) ($lista_conta_resumida->entrada_confirm), 2, ',', '.') ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left"><i class="fa fa-circle fa-xs text-danger pr-2"></i>
                                                        Despesas</td>
                                                    <td
                                                        class="text-right <?php if($lista_conta_resumida->saida_confirm > 0) echo "text-danger"; ?>">
                                                        R$
                                                        <?= number_format((float) ($lista_conta_resumida->saida_confirm), 2, ',', '.') ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table table-borderless table-sm mb-0">
                                            <tbody>
                                                <tr>
                                                    <td class="text-left pt-0 text-dark"><strong>Resultado</strong></td>
                                                    <td
                                                        class="text-right pt-0 <?php if(($lista_conta_resumida->entrada_confirm - $lista_conta_resumida->saida_confirm) > 0) echo "text-teal";
                                                                                    elseif(($lista_conta_resumida->entrada_confirm - $lista_conta_resumida->saida_confirm) < 0) echo "text-danger"; ?>">
                                                        <strong>
                                                            R$
                                                            <?= number_format((float) (($lista_conta_resumida->entrada_confirm - $lista_conta_resumida->saida_confirm)), 2, ',', '.') ?>
                                                        </strong>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="result-projetado">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <canvas id="graph-resultado-projetado"></canvas>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-borderless table-sm mb-3">
                                            <tbody>
                                                <tr>
                                                    <td class="text-left"><i class="fa fa-circle fa-xs text-teal pr-2"></i>
                                                        Receitas
                                                    </td>
                                                    <td
                                                        class="text-right <?php if(($lista_conta_resumida->entrada_confirm + $lista_conta_resumida->entrada_proj) > 0) echo "text-teal"; ?>">
                                                        R$
                                                        <?= number_format((float) ($lista_conta_resumida->entrada_confirm + $lista_conta_resumida->entrada_proj), 2, ',', '.') ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left"><i class="fa fa-circle fa-xs text-danger pr-2"></i>
                                                        Despesas</td>
                                                    <td
                                                        class="text-right <?php if(($lista_conta_resumida->saida_confirm + $lista_conta_resumida->saida_proj) > 0) echo "text-danger"; ?>">
                                                        R$
                                                        <?= number_format((float) ($lista_conta_resumida->saida_confirm + $lista_conta_resumida->saida_proj), 2, ',', '.') ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table table-borderless table-sm mb-0">
                                            <tbody>
                                                <tr>
                                                    <td class="text-left pt-0 text-dark"><strong>Resultado</strong></td>
                                                    <td
                                                        class="text-right pt-0 <?php if((($lista_conta_resumida->entrada_confirm + $lista_conta_resumida->entrada_proj) - ($lista_conta_resumida->saida_confirm + $lista_conta_resumida->saida_proj)) > 0) echo "text-teal";
                                                                                    elseif((($lista_conta_resumida->entrada_confirm + $lista_conta_resumida->entrada_proj) - ($lista_conta_resumida->saida_confirm + $lista_conta_resumida->saida_proj)) < 0) echo "text-danger"; ?>">
                                                        <strong>
                                                            R$
                                                            <?= number_format((float) ((($lista_conta_resumida->entrada_confirm + $lista_conta_resumida->entrada_proj) - ($lista_conta_resumida->saida_confirm + $lista_conta_resumida->saida_proj))), 2, ',', '.') ?>
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
                <div class="row">
                    <div class="col-md-12">
                        <form action="<?= base_url("relatorios/lancamento-contas") ?>" method="get" class="mb-0 needs-validation" novalidate>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input class="form-control" id="inputDataInicio" type="text" name="DataInicio"
                                            value="<?= str_replace('-', '/', date("d-m-Y", strtotime($dataInicio))) ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <input class="form-control" id="inputDataFim" type="text" name="DataFim"
                                            value="<?= str_replace('-', '/', date("d-m-Y", strtotime($dataFim))) ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <select id="inputConta" name="conta[]" title="Conta Caixa" data-style="btn-input-primary" multiple data-actions-box="true" class="selectpicker show-tick form-control" data-live-search="true" data-actions-box="true">
                                        <?php $chave_conta = 0;
                                        foreach ($lista_conta as $key_conta => $conta) { ?>
                                            <option value="<?= $conta->cod_conta ?>" <?php if ($cod_conta != null) {
                                                                                            if ($conta->cod_conta == $cod_conta[$chave_conta]) {
                                                                                                if ((count($cod_conta) - 1) > $chave_conta) {
                                                                                                    $chave_conta = $chave_conta + 1;
                                                                                                }
                                                                                                echo "selected";
                                                                                            }
                                                                                        } ?>>
                                                <?= $conta->cod_conta ?> -
                                                <?= $conta->nome_conta ?> -
                                                <?= html_escape($conta->nome_estabelecimento) ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-outline-primary btn-block"><i class="fa-solid fa-rotate"></i> Atualizar Dados</button>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <a href="<?= base_url() ?>" type="button" class="btn btn-outline-warning btn-block" id="btnExport"><i class="fa-regular fa-file-excel"></i> Exportar Excel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8 pl-0">
                <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="movimentacoes-tab" data-toggle="tab" href="#movimentacoes" role="tab" aria-controls="movimentacoes" aria-selected="true">Lançamentos</a>
                    </li>
                </ul>
                <div class="card  mb-5">
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="movimentacoes" role="tabpanel" aria-labelledby="movimentacoes-tab">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-reporte">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col" class="text-center"><i class="fa-solid fa-check"></i></th>
                                                <th scope="col" class="text-center">Data</th>
                                                <th scope="col" class="text-center">Título</th>
                                                <th scope="col">Descrição</th>
                                                <th scope="col" class="text-right">Valor</th>
                                                <th scope="col" class="text-right">Saldo</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $saldo = $lista_conta_resumida->saldo_conta + $lista_conta_resumida->saida_realizadas - $lista_conta_resumida->entradas_realizadas; ?>
                                            <tr>
                                                <td class="text-left align-middle" colspan="5">
                                                    <i>Saldo anterior</i>
                                                </td>
                                                <td class="text-right align-middle <?php if (round($saldo, 2) > 0) echo "text-teal";
                                                                                    elseif (round($saldo, 2) < 0) echo "text-danger"; ?>">
                                                    R$ <?= number_format((float) ($saldo), 2, ',', '.') ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tbody class="table-sm">
                                            <?php foreach ($lista_movimento_detalhada as $key_movimento_detalhada => $titulo) {
                                                if ($titulo->confirmado == 1)
                                                    $valor_titulo = $titulo->valor_confirmado;
                                                else
                                                    $valor_titulo = $titulo->valor_titulo;

                                                if ($titulo->tipo_movimento == 1)
                                                    $saldo = $saldo + $valor_titulo;
                                                else
                                                    $saldo = $saldo - $valor_titulo;
                                            ?>
                                                <tr>
                                                    <td class="text-center align-middle small2">
                                                        <?php if ($titulo->confirmado == 1) echo "<i class='fas fa-check-circle text-teal-light'></i>";
                                                              elseif($titulo->confirmado == 0 && $titulo->data_vencimento < date('Y-m-d')) echo "<i class='fa-solid fa-circle text-danger-light'></i>";
                                                              else echo "<i class='fa-solid fa-circle text-light'></i>"; ?>
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <?php if($titulo->confirmado == 1)
                                                                echo str_replace('-', '/', date("d-m-Y", strtotime($titulo->data_confirmacao)));
                                                              else 
                                                                echo str_replace('-', '/', date("d-m-Y", strtotime($titulo->data_vencimento)));
                                                        ?>                                                        
                                                    </td>
                                                    <td class="text-center align-middle"><?= $titulo->cod_movimento_conta ?></td>
                                                    </td>
                                                    <td class="limit-text-40 align-middle align-middle" data-toggle="tooltip" data-placement="bottom" title="<?= $titulo->desc_movimento ?>">
                                                        <a href="#" data-toggle="modal" class="text-dark" data-target="#visualizar-titulo<?= $titulo->cod_movimento_conta ?>"><?= $titulo->desc_movimento ?></a><br>
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
                                                    <td class="text-right align-middle <?php if ($titulo->tipo_movimento == 2) echo "text-danger"; ?>
                                                            <?php if ($titulo->tipo_movimento == 1) echo "text-teal"; ?>">
                                                        R$
                                                        <?php if ($titulo->tipo_movimento == 2) echo "-"; ?>
                                                        <?php
                                                        if ($titulo->confirmado == 1)
                                                            echo number_format((float) ($titulo->valor_confirmado), 2, ',', '.');
                                                        else
                                                            echo number_format((float) ($titulo->valor_titulo), 2, ',', '.');  ?>
                                                    </td>
                                                    <td class="text-right align-middle <?php if ($saldo > 0) echo "text-teal";
                                                                                        elseif ($saldo < 0) echo "text-danger"; ?>">
                                                        R$ <?= number_format((float) ($saldo), 2, ',', '.') ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                        </tbody>
                                    </table>
                                </div>
                                <?php if ($lista_movimento_detalhada == false) { ?>
                                    <div class="text-center text-muted">
                                        <p class="font-italic mt-3">Nenhuma informação encontrada</p>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>

    </div>
</section>

<?php foreach ($lista_movimento_detalhada as $key_titulos => $titulo) { ?>
    <div class="modal fade" id="visualizar-titulo<?= $titulo->cod_movimento_conta ?>">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php if ($titulo->confirmado == 1) echo "<i class='fas fa-check-circle text-teal-light small2'></i>";
                                                  elseif($titulo->confirmado == 0 && $titulo->data_vencimento < date('Y-m-d')) echo "<i class='fa-solid fa-circle text-danger-light small2'></i>";
                                                  else echo "<i class='fa-solid fa-circle text-light small2'></i>"; ?> <span class="ml-1"><?= $titulo->desc_movimento ?> <?php if($titulo->especie_movimento == 2) echo "<i class='fa-solid fa-right-left text-secondary ml-1'></i>"; ?></span></h5>
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
                                        <div class="col-md-6">
                                            <table class="table table-borderless table-sm mb-0">
                                                <tbody>
                                                    <tr>
                                                        <td class="text-left align-middle text-muted">
                                                            Título
                                                        </td>
                                                        <td class="text-right align-middle">
                                                            <strong><?= $titulo->cod_movimento_conta ?></strong>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left align-middle text-muted">
                                                            Usuário criação
                                                        </td>
                                                        <td class="text-right align-middle">
                                                            <?= $titulo->nome_usuario_criacao ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left align-middle text-muted">
                                                            Usuário liquidação
                                                        </td>
                                                        <td class="text-right align-middle">
                                                            <?= $titulo->nome_usuario_liquidacao ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>                                            
                                            <table class="table table-borderless table-sm mb-0">
                                                <tbody>
                                                    <tr>
                                                        <td class="text-left align-middle text-muted">
                                                            Data de competência
                                                        </td>
                                                        <td class="text-right align-middle">
                                                            <?= str_replace('-', '/', date("d-m-Y", strtotime($titulo->data_competencia))) ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left align-middle text-muted">
                                                            Data de vencimento
                                                        </td>
                                                        <td class="text-right align-middle">
                                                            <?= str_replace('-', '/', date("d-m-Y", strtotime($titulo->data_vencimento))) ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left align-middle text-muted">
                                                            Parcela
                                                        </td>
                                                        <td class="text-right align-middle">
                                                            <?= $titulo->parcela ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <table class="table table-borderless table-sm">
                                                <tbody>
                                                    <tr>
                                                        <td class="text-left align-middle text-muted">
                                                            Origem do título
                                                        </td>
                                                        <td class="text-right align-middle">
                                                            <?php
                                                            switch ($titulo->origem_movimento) {
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
                                                            switch ($titulo->origem_movimento) {
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
                                                            if ($titulo->id_origem != null)
                                                                echo $titulo->id_origem;
                                                            else
                                                                echo $titulo->cod_movimento_conta;
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left align-middle text-muted">
                                                            Título relacionado
                                                        </td>
                                                        <td class="text-right align-middle">
                                                            <?= $titulo->cod_titulo_rel ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-md-6">
                                            <table class="table table-borderless table-sm mb-0">
                                                <tbody>
                                                    <?php if ($titulo->tipo_movimento == 2) { ?>
                                                        <tr>
                                                            <td class="text-left align-middle text-muted">
                                                                Recebedor
                                                            </td>
                                                            <td class="text-right align-middle">
                                                                <?= $titulo->nome_fornecedor ?>
                                                            </td>
                                                        </tr>
                                                    <?php } else { ?>
                                                        <tr>
                                                            <td class="text-left align-middle text-muted">
                                                                Pagador
                                                            </td>
                                                            <td class="text-right align-middle">
                                                                <?= $titulo->nome_cliente ?>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                            <table class="table table-borderless table-sm mb-0">
                                                <tbody>
                                                    <tr>
                                                        <td class="text-left align-middle text-muted">
                                                            Valor do título
                                                        </td>
                                                        <td class="text-right align-middle <?php if ($titulo->tipo_movimento == 2) echo "text-danger"; else echo "text-teal"; ?>">
                                                            R$ <?php if ($titulo->tipo_movimento == 2) echo "-"; ?><?= number_format((float) ($titulo->valor_titulo), 2, ',', '.') ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <?php if ($titulo->tipo_movimento == 2) { ?>
                                                            <td class="text-left align-middle text-muted">
                                                                Desconto
                                                            </td>
                                                        <?php } elseif ($titulo->tipo_movimento == 1) { ?>
                                                            <td class="text-left align-middle text-muted">
                                                                Taxa
                                                            </td>
                                                        <?php } ?>
                                                        <td class="text-right align-middle">
                                                            R$ <?= number_format((float) ($titulo->valor_desc_taxa), 2, ',', '.') ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <?php if ($titulo->tipo_movimento == 2) { ?>
                                                            <td class="text-left align-middle text-muted">
                                                                Juros
                                                            </td>
                                                        <?php } elseif ($titulo->tipo_movimento == 1) { ?>
                                                            <td class="text-left align-middle text-muted">
                                                                Multa
                                                            </td>
                                                        <?php } ?>
                                                        <td class="text-right align-middle">
                                                            R$ <?= number_format((float) ($titulo->valor_juros_multa), 2, ',', '.') ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left align-middle text-muted">
                                                            Valor confirmado
                                                        </td>
                                                        <td class="text-right align-middle <?php if ($titulo->tipo_movimento == 2 && $titulo->valor_confirmado != 0) echo "text-danger"; elseif ($titulo->tipo_movimento == 1 && $titulo->valor_confirmado != 0) echo "text-teal"; ?>">
                                                            <strong>R$ <?= number_format((float) ($titulo->valor_confirmado), 2, ',', '.') ?></strong>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left align-middle text-muted">
                                                            Data de confirmão
                                                        </td>
                                                        <td class="text-right align-middle">
                                                            <?php if($titulo->data_confirmacao!= null) echo str_replace('-', '/', date("d-m-Y", strtotime($titulo->data_confirmacao))) ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <table class="table table-borderless table-sm mb-0">
                                                <tbody>
                                                    <tr>
                                                        <td class="text-left align-middle text-muted">
                                                            Método de pagamento
                                                        </td>
                                                        <td class="text-right align-middle">
                                                            <?= $titulo->nome_metodo_pagamento ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left align-middle text-muted">
                                                            Centro de custo
                                                        </td>
                                                        <td class="text-right align-middle">
                                                            <?= $titulo->nome_centro_custo ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left align-middle text-muted">
                                                            Conta contábil
                                                        </td>
                                                        <td class="text-right align-middle">
                                                            <?= $titulo->nome_conta_contabil ?>
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<iframe id="downloadXLS" style="display:none">
    <meta http-equiv="content-type" content="application/vnd.ms-excel; charset=UTF-8">
    <table>
        <thead>
            <tr>
                <th scope="col" class="text-center" style="border: 1px solid; background-color: rgb(223, 215, 202)">
                    CONFIRMADO</th>
                <th style="border: 1px solid; background-color: rgb(223, 215, 202)">CONTA</th>
                <th class="text-center" style="border: 1px solid; background-color: rgb(223, 215, 202)">TÍTULO</th>
                <th class="text-center" style="border: 1px solid; background-color: rgb(223, 215, 202)">DATA VENCIMENTO</th>
                <th class="text-center" style="border: 1px solid; background-color: rgb(223, 215, 202)">DATA CONFIRMAÇÃO</th>
                <th class="text-center" style="border: 1px solid; background-color: rgb(223, 215, 202)">DATA COMPETÊNCIA</th>
                <th style="border: 1px solid; background-color: rgb(223, 215, 202)">CONTA CONTÁBIL</th>
                <th style="border: 1px solid; background-color: rgb(223, 215, 202)">CENTRO DE CUSTO</th>
                <th style="border: 1px solid; background-color: rgb(223, 215, 202)">DESCRIÇÃO</th>
                <th style="border: 1px solid; background-color: rgb(223, 215, 202)">CLIENTE/FORNECEDOR</th>
                <th style="border: 1px solid; background-color: rgb(223, 215, 202)">VENDEDOR</th>
                <th class="text-center" style="border: 1px solid; background-color: rgb(223, 215, 202)">PARCELA</th>
                <th class="text-center" style="border: 1px solid; background-color: rgb(223, 215, 202)">TP MOVIMENTO
                </th>
                <th class="text-center" style="border: 1px solid; background-color: rgb(223, 215, 202)">VALOR TÍTULO
                </th>
                <th class="text-center" style="border: 1px solid; background-color: rgb(223, 215, 202)">DESCONTO E TAXAS
                </th>
                <th class="text-center" style="border: 1px solid; background-color: rgb(223, 215, 202)">MULTAS E JUROS
                </th>
                <th class="text-center" style="border: 1px solid; background-color: rgb(223, 215, 202)">VALOR CONFIRMADO
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lista_movimento_detalhada as $key_movimento_detalhada => $titulo) { ?>
                <tr>
                    <td class="text-center text-teal" style="border: 1px solid">
                        <?php if ($titulo->confirmado == 1) echo "Sim";
                        else echo "Não"; ?></td>
                    <td scope="row" style="border: 1px solid"><?= $titulo->cod_conta ?> - <?= $titulo->nome_conta ?></td>
                    <td class="text-center" style="border: 1px solid"><?= $titulo->cod_movimento_conta ?></td>
                    <td class="text-center" style="border: 1px solid"><?= str_replace('-', '/', date("d-m-Y", strtotime($titulo->data_vencimento))) ?></td>
                    <td class="text-center" style="border: 1px solid"><?php if($titulo->data_confirmacao!= null) echo str_replace('-', '/', date("d-m-Y", strtotime($titulo->data_confirmacao))) ?></td>
                    <td class="text-center" style="border: 1px solid"><?= str_replace('-', '/', date("d-m-Y", strtotime($titulo->data_competencia))) ?></td>
                    <td style="border: 1px solid">
                        <?php if ($titulo->cod_conta_contabil != "") echo $titulo->cod_conta_contabil . " - " . $titulo->nome_conta_contabil ?>
                    </td>
                    <td style="border: 1px solid">
                        <?php if ($titulo->cod_centro_custo != 0) echo $titulo->cod_centro_custo . " - " . $titulo->nome_centro_custo ?>
                    </td>
                    <td style="border: 1px solid"><?= $titulo->desc_movimento ?></td>
                    <td style="border: 1px solid">
                        <?php if ($titulo->cod_emitente != 0) {
                            if ($titulo->tipo_movimento == 1) echo $titulo->cod_emitente . " - " . $titulo->nome_cliente;
                            if ($titulo->tipo_movimento == 2) echo $titulo->cod_emitente . " - " . $titulo->nome_fornecedor;
                        }
                        ?>
                    </td>
                    <td style="border: 1px solid">
                        <?php if ($titulo->cod_vendedor != 0) {
                            echo $titulo->cod_vendedor . " - " . $titulo->nome_vendedor;
                        }
                        ?>
                    </td>
                    <td class="text-center" style="border: 1px solid"><?= '="' . $titulo->parcela . '"' ?></td>
                    <td class="text-center" style="border: 1px solid">
                        <?php
                        switch ($titulo->tipo_movimento) {
                            case 1:
                                echo "Receita";
                                break;
                            case 2:
                                echo "Despesa";
                                break;
                        }
                        ?>
                    </td>
                    <td class="text-center <?php if ($titulo->tipo_movimento == 2) echo "text-danger"; ?>
                                       <?php if ($titulo->tipo_movimento == 1) echo "text-teal"; ?>" style="border: 1px solid">
                        R$ <?= number_format((float) ($titulo->valor_titulo), 2, ',', '.'); ?>
                    </td>
                    <td class="text-center <?php if ($titulo->tipo_movimento == 2) echo "text-danger"; ?>
                                       <?php if ($titulo->tipo_movimento == 1) echo "text-teal"; ?>" style="border: 1px solid">
                        R$ <?= number_format((float) ($titulo->valor_desc_taxa), 2, ',', '.'); ?>
                    </td>
                    <td class="text-center <?php if ($titulo->tipo_movimento == 2) echo "text-danger"; ?>
                                       <?php if ($titulo->tipo_movimento == 1) echo "text-teal"; ?>" style="border: 1px solid">
                        R$ <?= number_format((float) ($titulo->valor_juros_multa), 2, ',', '.'); ?>
                    </td>
                    <td class="text-center <?php if ($titulo->tipo_movimento == 2) echo "text-danger"; ?>
                                       <?php if ($titulo->tipo_movimento == 1) echo "text-teal"; ?>" style="border: 1px solid">
                        R$ <?= number_format((float) ($titulo->valor_confirmado), 2, ',', '.'); ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</iframe>

<script>
    $('#inputDataInicio').datepicker({
        uiLibrary: 'bootstrap4'
    });
    $('#inputDataFim').datepicker({
        uiLibrary: 'bootstrap4'
    });

    $("#btnExport").click(function(e) {
        var a = document.createElement('a');
        var data_type = 'data:application/vnd.ms-excel';
        var table_div = document.getElementById('downloadXLS');
        var table_html = table_div.outerHTML.replace(/ /g, '%20');
        a.href = data_type + ', ' + table_html;
        a.download = 'Movimento Conta.xls';
        a.click();
        e.preventDefault();
    });

new Chart(document.getElementById("graph-resultado-confirmado"), {
    type: 'bar',
    data: {
        labels: ["Resultado"],
        datasets: [{
            label: "Entradas",
            backgroundColor: "#4db6ac",
            data: [<?= $lista_conta_resumida->entrada_confirm ?>]
        },
        {
            label: "Saídas",
            backgroundColor: "#e57373",
            data: [<?= $lista_conta_resumida->saida_confirm ?>]
        }]
    },
    options: {
        plugins: {
            labels: {
                render: function(args) {
                    return "";
                },
            }
        },
        title: {
            display: false,
            text: ''
        },
        legend: {
            display: false
        },
        scales: {
            xAxes: [{
                stacked: false,
                gridLines: {
                    display: false,
                },
                ticks: {
                    display: false
                }
            }],
            yAxes: [{
                stacked: false  ,
                gridLines: {
                    drawBorder: false,
                },
                ticks: {
                    maxTicksLimit: 4,
                    beginAtZero: true,
                    fontSize: 11,
                    display: true,
                    mirror: true,
                    z: 1,
                    labelOffset: 10,
                    padding: 5,
                    maxRotation:0,
                    callback: function(value, index, values) {

                        if(value == 0){
                            return "";
                        }

                        var lbl = 0;

                        if(value >= 1000 || value <= -1000){

                            lbl = value / 1000;

                            return lbl.toLocaleString("pt-BR", {
                                style: "decimal",
                                minimumFractionDigits: 0,
                                maximumFractionDigits: 0
                            }) + ' mil';

                        }else{
                            lbl = value;

                            return lbl.toLocaleString("pt-BR", {
                                style: "decimal",
                                minimumFractionDigits: 0,
                                maximumFractionDigits: 0
                            });
                        }
                    },
                }
            }]
        },
        tooltips: {
            callbacks: {
                label: function(tooltipItem, data) {
                    var indice = tooltipItem.index;
                    return data.datasets[tooltipItem.datasetIndex].label + ": " +  " R$ " + tooltipItem.yLabel
                        .toLocaleString("pt-BR", {
                            style: "decimal",
                            minimumFractionDigits: 2,
                            maximumFractionDigits: 2
                        });
                }
            },
            displayColors: false,
        },
    }
});

new Chart(document.getElementById("graph-resultado-projetado"), {
    type: 'bar',
    data: {
        labels: ["Resultado"],
        datasets: [{
            label: "Entradas",
            backgroundColor: "#4db6ac",
            data: [<?= $lista_conta_resumida->entrada_confirm + $lista_conta_resumida->entrada_proj ?>]
        },
        {
            label: "Saídas",
            backgroundColor: "#e57373",
            data: [<?= $lista_conta_resumida->saida_confirm + $lista_conta_resumida->saida_proj ?>]
        }]
    },
    options: {
        plugins: {
            labels: {
                render: function(args) {
                    return "";
                },
            }
        },
        title: {
            display: false,
            text: ''
        },
        legend: {
            display: false
        },
        scales: {
            xAxes: [{
                stacked: false,
                gridLines: {
                    display: false,
                },
                ticks: {
                    display: false
                }
            }],
            yAxes: [{
                stacked: false  ,
                gridLines: {
                    drawBorder: false,
                },
                ticks: {
                    maxTicksLimit: 4,
                    beginAtZero: true,
                    fontSize: 11,
                    display: true,
                    mirror: true,
                    z: 1,
                    labelOffset: 10,
                    padding: 5,
                    maxRotation:0,
                    callback: function(value, index, values) {

                        if(value == 0){
                            return "";
                        }

                        var lbl = 0;

                        if(value >= 1000 || value <= -1000){

                            lbl = value / 1000;

                            return lbl.toLocaleString("pt-BR", {
                                style: "decimal",
                                minimumFractionDigits: 0,
                                maximumFractionDigits: 0
                            }) + ' mil';

                        }else{
                            lbl = value;

                            return lbl.toLocaleString("pt-BR", {
                                style: "decimal",
                                minimumFractionDigits: 0,
                                maximumFractionDigits: 0
                            });
                        }
                    },
                }
            }]
        },
        tooltips: {
            callbacks: {
                label: function(tooltipItem, data) {
                    var indice = tooltipItem.index;
                    return data.datasets[tooltipItem.datasetIndex].label + ": " +  " R$ " + tooltipItem.yLabel
                        .toLocaleString("pt-BR", {
                            style: "decimal",
                            minimumFractionDigits: 2,
                            maximumFractionDigits: 2
                        });
                }
            },
            displayColors: false,
        },
    }
});

</script>

<?php $this->load->view('gerais/footer'); ?>
