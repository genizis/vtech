<?php $this->load->view('gerais/header', $menu); ?>
<?php $this->load->view('gerais/menu', $menu); ?>

<section>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('visao-geral') ?>">Visão Geral</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('financeiro') ?>">Financeiro</a></li>
            <li class="breadcrumb-item active">Conciliação Bancária</li>
        </ol>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <select class="selectpicker show-tick form-control" id="contaConciliacao"
                            data-live-search="true" data-width="100%" data-style="btn-input-primary">
                            <?php foreach($lista_conta as $itemConta){ ?>
                                <option value="<?= $itemConta->cod_conta ?>" <?= $itemConta->cod_conta == $conta->cod_conta ? 'selected' : '' ?>>
                                    <?= html_escape($itemConta->nome_conta) ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="card mb-3">
                    <h6 class="card-header bg-white text-muted">
                        Dados de conciliação
                    </h6>
                    <div class="card-body">
                        <table class="table table-borderless table-sm">
                            <tbody>
                                <tr>
                                    <td>Valor conciliado</td>
                                    <td class="text-right text-teal">R$ <?= number_format((float) ($resumo['conciliado']), 2, ',', '.') ?></td>
                                </tr>
                                <tr>
                                    <td>Valor não conciliado</td>
                                    <td class="text-right text-danger">R$ <?= number_format((float) ($resumo['pendente']), 2, ',', '.') ?></td>
                                </tr>
                                <tr>
                                    <td>Itens conciliados</td>
                                    <td class="text-right"><?= $resumo['quant_conciliado'] ?></td>
                                </tr>
                                <tr>
                                    <td>Itens pendentes</td>
                                    <td class="text-right"><?= $resumo['quant_pendente'] ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <form action="<?= base_url("financeiro/conciliacao-bancaria/{$conta->cod_conta}") ?>"
                            method="GET" class="mb-0 needs-validation" novalidate>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input class="form-control" id="inputDataInicio" type="text" name="DataInicio"
                                        value="<?= str_replace('-', '/', date('d-m-Y', strtotime($dataInicio))) ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <input class="form-control" id="inputDataFim" type="text" name="DataFim"
                                        value="<?= str_replace('-', '/', date('d-m-Y', strtotime($dataFim))) ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-outline-primary btn-block"><i
                                            class="fa-solid fa-rotate"></i> Atualizar Dados</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

            <div class="col-md-8 pl-0">
                <ul class="nav nav-tabs mb-3"><li class="nav-item"><a class="nav-link active">Movimentos do extrato</a></li></ul>

                <?php if($this->session->flashdata('erro')){ ?>
                    <div class="alert alert-danger alert-dismissible fade show"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Atenção!</strong> <?= html_escape($this->session->flashdata('erro')) ?></div>
                <?php } ?>
                <?php if($this->session->flashdata('sucesso')){ ?>
                    <div class="alert alert-success alert-dismissible fade show"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Muito bem!</strong> <?= html_escape($this->session->flashdata('sucesso')) ?></div>
                <?php } ?>

                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <button data-toggle="modal" data-target="#importar-extrato" type="button"
                                    data-backdrop="static" data-keyboard="false" class="btn btn-outline-info btn-sm">
                                    <i class="fas fa-file-import"></i> Importar Extrato
                                </button>
                            </div>
                        </div>
                        <div class="table-responsive"> 
                        <table class="table table-bordered">
                            <thead class="thead-light"><tr><th class="text-center">Data</th><th>Movimento bancário</th><th class="text-right">Valor</th><th>Conciliação</th></tr></thead>
                            <tbody class="table-sm">
                                <?php foreach($lista_extrato as $item){ ?>
                                    <tr>
                                        <td class="text-center align-middle"><?= date('d/m/Y', strtotime($item->data_movimento)) ?></td>
                                        <td class="align-middle">
                                            <?= html_escape($item->descricao) ?><br>
                                            <?php if($item->documento){ ?><small class="text-muted">Doc. <?= html_escape($item->documento) ?></small><?php } ?>
                                        </td>
                                        <td class="text-right align-middle <?= $item->valor >= 0 ? 'text-teal' : 'text-danger' ?>">R$ <?= number_format((float) ($item->valor), 2, ',', '.') ?></td>
                                        <td class="align-middle" style="min-width: 260px">
                                            <?php if($item->id_vinculo !== null){ ?>
                                                <span class="badge bg-success-light text-success"><i class="fas fa-check-circle"></i> Conciliado</span><br>
                                                <small>#<?= $item->cod_movimento_conta ?> — <?= html_escape($item->desc_movimento_sistema) ?></small>
                                                <form class="d-inline" method="POST" action="<?= base_url("financeiro/conciliacao-bancaria/{$conta->cod_conta}/desfazer") ?>">
                                                    <input type="hidden" name="IdExtrato" value="<?= $item->id_extrato ?>">
                                                    <input type="hidden" name="DataInicio" value="<?= date('d/m/Y', strtotime($dataInicio)) ?>"><input type="hidden" name="DataFim" value="<?= date('d/m/Y', strtotime($dataFim)) ?>">
                                                    <button class="btn btn-link btn-sm text-danger p-0 ml-1" type="submit">Desfazer</button>
                                                </form>
                                            <?php }else{ ?>
                                                <form method="POST" action="<?= base_url("financeiro/conciliacao-bancaria/{$conta->cod_conta}/conciliar") ?>">
                                                    <input type="hidden" name="IdExtrato" value="<?= $item->id_extrato ?>">
                                                    <input type="hidden" name="DataInicio" value="<?= date('d/m/Y', strtotime($dataInicio)) ?>"><input type="hidden" name="DataFim" value="<?= date('d/m/Y', strtotime($dataFim)) ?>">
                                                    <div class="input-group input-group-sm">
                                                        <select class="form-control" name="CodMovimento" required>
                                                            <option value="">Selecionar lançamento...</option>
                                                            <?php foreach($item->sugestoes as $sugestao){ ?>
                                                                <option value="<?= $sugestao->cod_movimento_conta ?>">Sugerido: #<?= $sugestao->cod_movimento_conta ?> — <?= date('d/m', strtotime($sugestao->data_confirmacao)) ?> — <?= html_escape($sugestao->desc_movimento) ?></option>
                                                            <?php } ?>
                                                            <?php foreach($lista_movimentos as $movimento){
                                                                $jaSugerido = false; foreach($item->sugestoes as $sugestao) if($sugestao->cod_movimento_conta == $movimento->cod_movimento_conta) $jaSugerido = true;
                                                                if($jaSugerido) continue;
                                                                $valorAssinado = $movimento->tipo_movimento == 1 ? $movimento->valor_confirmado : -$movimento->valor_confirmado;
                                                                if(abs($valorAssinado - $item->valor) > 0.009) continue; ?>
                                                                <option value="<?= $movimento->cod_movimento_conta ?>">#<?= $movimento->cod_movimento_conta ?> — <?= date('d/m', strtotime($movimento->data_confirmacao)) ?> — <?= html_escape($movimento->desc_movimento) ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <div class="input-group-append"><button class="btn btn-outline-teal" type="submit"><i class="fas fa-check"></i></button></div>
                                                    </div>
                                                    <?php if(!empty($item->sugestoes)){ ?><small class="text-teal"><i class="fas fa-magic"></i> Correspondência sugerida</small><?php }else{ ?><small class="text-muted">Pendente de associação</small><?php } ?>
                                                </form>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        </div>
                        <?php if(empty($lista_extrato)){ ?>
                            <div class="text-center text-muted">
                                <p class="font-italic mt-3">Nenhum movimento bancário no período</p>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="importar-extrato" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Importar extrato</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body bg-light">
                <form id="formImportarExtrato" class="mb-0 needs-validation" novalidate
                    action="<?= base_url("financeiro/conciliacao-bancaria/{$conta->cod_conta}/importar") ?>"
                    method="POST" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group mb-0">
                                <label for="arquivoExtrato">Arquivo OFX ou CSV</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="arquivoExtrato"
                                        name="arquivo_extrato" accept=".ofx,.csv" required>
                                    <label class="custom-file-label" for="arquivoExtrato">Escolher arquivo</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" form="formImportarExtrato">Importar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<script>
$('#inputDataInicio').datepicker({
    uiLibrary: 'bootstrap4'
});
$('#inputDataFim').datepicker({
    uiLibrary: 'bootstrap4'
});
document.getElementById('contaConciliacao').addEventListener('change', function(){ window.location.href = '<?= base_url('financeiro/conciliacao-bancaria/') ?>' + this.value; });
document.getElementById('arquivoExtrato').addEventListener('change', function(){ var nome = this.files.length ? this.files[0].name : 'Escolher arquivo'; this.nextElementSibling.innerText = nome; });
</script>

<?php $this->load->view('gerais/footer'); ?>
