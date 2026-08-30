<?php $this->load->view('gerais/header', $menu); ?>
<?php $this->load->view('gerais/menu', $menu); ?>

<style>
    .visao-geral-resumo { border: 0; border-radius: .75rem; box-shadow: 0 .25rem 1rem rgba(0, 0, 0, .06); }
    .visao-geral-resumo .valor { font-size: 2.5rem; line-height: 1.1; }
    @media (max-width: 575.98px) { .visao-geral-resumo .valor { font-size: 1.9rem; } }
</style>

<section class="py-4">
    <div class="container">
        <?php if ($this->session->flashdata('erro') <> '') { ?>
        <div class="alert alert-danger alert-dismissible fade show" id="alert" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Atenção!</strong> <?= html_escape($this->session->flashdata('erro')) ?>
        </div>
        <?php } $this->session->set_flashdata('erro', ''); ?>

        <?php if ($this->session->flashdata('sucesso') <> '') { ?>
        <div class="alert alert-success alert-dismissible fade show" id="alert" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Muito bem!</strong> <?= html_escape($this->session->flashdata('sucesso')) ?>
        </div>
        <?php } $this->session->set_flashdata('sucesso', ''); ?>

        <div class="d-flex align-items-center justify-content-between flex-wrap mb-4">
            <div>
                <h1 class="h2 font-weight-bold mb-1">Visão geral</h1>
                <p class="text-muted mb-0"><?= html_escape($empresa->nome_empresa) ?></p>
            </div>
            <p class="text-muted mb-0 mt-2 mt-sm-0"><?= date('d/m/Y') ?></p>
        </div>

        <ul class="nav nav-tabs" id="visao-geral-abas" role="tablist">
            <li class="nav-item">
                <a class="nav-link active text-dark" id="financeiro-tab" data-toggle="tab" href="#financeiro"
                    role="tab" aria-controls="financeiro" aria-selected="true"><strong>FINANCEIRO</strong></a>
            </li>
        </ul>

        <div class="tab-content" id="visao-geral-conteudo">
            <div class="tab-pane fade show active" id="financeiro" role="tabpanel" aria-labelledby="financeiro-tab">
                <div class="card border-top-0 rounded-0 mb-5">
                    <div class="card-body p-3 p-md-4">
                        <div class="row mb-4">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <div class="card visao-geral-resumo h-100 border border-danger">
                                    <div class="card-body py-4">
                                        <p class="text-uppercase text-muted font-weight-bold mb-2">Total a pagar hoje</p>
                                        <p class="valor text-danger font-weight-bold mb-0">R$ <?= number_format((float) ($totais_dia->total_pagar ?? 0), 2, ',', '.') ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card visao-geral-resumo h-100 border border-success">
                                    <div class="card-body py-4">
                                        <p class="text-uppercase text-muted font-weight-bold mb-2">Total a receber hoje</p>
                                        <p class="valor text-success font-weight-bold mb-0">R$ <?= number_format((float) ($totais_dia->total_receber ?? 0), 2, ',', '.') ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex align-items-center justify-content-between flex-wrap mb-3">
                            <div>
                                <h2 class="h5 font-weight-bold mb-1">Títulos pendentes de confirmação</h2>
                                <p class="text-muted small mb-0">Títulos vencidos e com vencimento hoje</p>
                            </div>
                            <span class="badge badge-light mt-2 mt-sm-0"><?= count($lista_titulos) ?> <?= count($lista_titulos) === 1 ? 'título' : 'títulos' ?></span>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Título</th>
                                        <th scope="col">Descrição</th>
                                        <th scope="col" class="text-center">Vencimento</th>
                                        <th scope="col" class="text-right">Valor</th>
                                    </tr>
                                </thead>
                                <tbody class="table-sm">
                                    <?php foreach ($lista_titulos as $titulo) { ?>
                                    <?php $aReceber = (int) $titulo->tipo_movimento === 1; $vencido = $titulo->data_vencimento < date('Y-m-d'); ?>
                                    <tr class="border-bottom border-top border-light">
                                        <td class="align-middle"><a href="<?= base_url($aReceber ? 'financeiro/contas-receber' : 'financeiro/contas-pagar') ?>">#<?= (int) $titulo->cod_movimento_conta ?></a></td>
                                        <td class="align-middle"><?= html_escape($titulo->desc_movimento) ?></td>
                                        <td class="text-center align-middle <?= $vencido ? 'text-danger' : 'text-warning' ?>">
                                            <?= date('d/m/Y', strtotime($titulo->data_vencimento)) ?>
                                            <?php if ($vencido) { ?>
                                            <span class="badge bg-danger-light ml-1">
                                                <?php
                                                    $dataVencimento = date_create($titulo->data_vencimento);
                                                    $hoje = date_create(date('Y-m-d'));
                                                    echo date_diff($dataVencimento, $hoje)->format('%a');
                                                ?>
                                            </span>
                                            <?php } ?>
                                        </td>
                                        <td class="text-right align-middle <?= $aReceber ? 'text-success' : 'text-danger' ?>">R$ <?= number_format((float) $titulo->valor_titulo, 2, ',', '.') ?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <?php if (empty($lista_titulos)) { ?>
                        <div class="text-center text-muted">
                            <p class="font-italic mt-3">Nenhum título pendente de confirmação</p>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $this->load->view('gerais/footer'); ?>
