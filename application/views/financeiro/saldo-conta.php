<?php $this->load->view('gerais/header', $menu); ?>
<?php $this->load->view('gerais/menu', $menu); ?>

<section>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('visao-geral') ?>">Visão Geral</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('financeiro') ?>">Financeiro</a></li>
            <li class="breadcrumb-item active">Saldo Por Conta</li>
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
                                        <a href="<?= base_url("financeiro/saldo-conta/{$mes_anterior}/{$ano_anterior}") ?>" class="btn btn-secondary link-load"><i class="fas fa-angle-left"></i></a>
                                    </div>
                                    <input type="text" class="form-control search text-center filtro-data" value="<?= $descMes ?> de <?= $ano ?>" readonly>
                                    <div class="input-group-append">
                                        <a href="<?= base_url("financeiro/saldo-conta/{$mes_seguinte}/{$ano_seguinte}") ?>" class="btn btn-secondary link-load"><i class="fas fa-angle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card  mb-3">
                    <h6 class="card-header bg-white text-muted">
                        Saldos de caixa<br>
                        <span class="font-italic text-size-80">Por conta</span>
                    </h6>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-borderless table-sm">
                                    <tbody>
                                        <?php foreach ($lista_conta as $key_conta_resumida => $conta) { ?>
                                            <tr>
                                                <td colspan="2">
                                                    <strong><a href="<?= base_url("financeiro/saldo-conta/movimento-conta/{$conta->cod_conta}") ?>" class="link-load text-dark" data-toggle="tooltip" data-placement="bottom" title="<?= $conta->nome_conta ?>"><?= $conta->nome_conta ?></a></strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-left limit-text-30">
                                                    Saldo em caixa
                                                </td>
                                                <td class="text-right <?php if ($conta->saldo_conta > 0) echo "text-teal";
                                                                        if ($conta->saldo_conta < 0) echo "text-danger"; ?>">
                                                    R$ <?= number_format($conta->saldo_conta, 2, ',', '.') ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <?php if ($lista_conta == false) { ?>
                                    <div class="text-center">
                                        <p class="text-muted mb-0">Nenhuma conta disponível</p>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-8 pl-0">
                <ul class="nav nav-tabs mb-3">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#movimento-titulos">Movimentações</a>
                    </li>
                </ul>
                <div class="card  mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col" class="text-center border-right-0">
                                                </th>
                                                <th scope="col" class="text-center">Vencimento</th>
                                                <th scope="col">Descrição</th>
                                                <th scope="col" class="text-center">Parcela</th>
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
                                                    R$ <?= number_format($saldo, 2, ',', '.') ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tbody>
                                            <?php foreach ($lista_titulos as $key_titulos => $titulo) { 
                                                    if ($titulo->tipo_movimento == 1)
                                                        $saldo = $saldo + $titulo->valor_confirmado;
                                                    else
                                                        $saldo = $saldo - $titulo->valor_confirmado;
                                                ?>
                                                <tr class="border-bottom border-top border-light">
                                                    <td class="text-center align-middle small2">
                                                        <?php if ($titulo->confirmado == 1) echo "<i class='fas fa-check-circle text-teal-light'></i>";
                                                        elseif ($titulo->confirmado == 0 && $titulo->data_vencimento < date('Y-m-d')) echo "<i class='fa-solid fa-circle text-danger-light'></i>";
                                                        else echo "<i class='fa-solid fa-circle text-light'></i>"; ?>
                                                    </td>
                                                    <td class="text-center align-middle border-right-0">
                                                        <?= str_replace('-', '/', date("d-m-Y", strtotime($titulo->data_confirmacao))) ?>
                                                    </td>
                                                    <td class="limit-text-50 text-left align-middle" data-toggle="tooltip" data-placement="bottom" title="<?= $titulo->desc_movimento ?>">
                                                        <?= $titulo->desc_movimento ?>
                                                    </td>
                                                    <td class="text-center align-middle"><?= $titulo->parcela ?></td>
                                                    <td class="text-right align-middle <?php if ($titulo->tipo_movimento == 2) echo "text-danger"; ?>
                                                                    <?php if ($titulo->tipo_movimento == 1) echo "text-teal"; ?>">
                                                        R$ <?php if ($titulo->tipo_movimento == 2) echo "-";
                                                            else echo "+"; ?><?php if ($titulo->confirmado == 1) echo number_format($titulo->valor_confirmado, 2, ',', '.');
                                                                                else echo number_format($titulo->valor_titulo, 2, ',', '.');
                                                                                ?>
                                                    </td>
                                                    <td class="text-right align-middle <?php if ($saldo > 0) echo "text-teal";
                                                                                        elseif ($saldo < 0) echo "text-danger"; ?>">
                                                        R$ <?= number_format($saldo, 2, ',', '.') ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php if ($lista_titulos == false) { ?>
                                    <div class="text-center text-muted">
                                        <p class="font-italic mt-3">Nenhum movimento realizado no período</p>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $('.page-item>a').addClass("page-link");
</script>

<?php $this->load->view('gerais/footer'); ?>