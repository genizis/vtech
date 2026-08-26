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
                            <thead class="thead-light"><tr><th class="text-center"><i class="fa-solid fa-check"></i></th><th class="text-center">Data</th><th>Movimento bancário</th><th class="text-right text-nowrap">Valor</th><th class="text-center">Conciliação</th></tr></thead>
                            <tbody class="table-sm">
                                <?php foreach($lista_extrato as $item){ ?>
                                    <tr>
                                        <td class="text-center align-middle small2">
                                            <?php if($item->id_vinculo !== null){ ?>
                                                <i class="fas fa-check-circle text-teal-light"></i>
                                            <?php }else{ ?>
                                                <i class="fa-solid fa-circle text-danger-light"></i>
                                            <?php } ?>
                                        </td>
                                        <td class="text-center align-middle"><?= date('d/m/Y', strtotime($item->data_movimento)) ?></td>
                                        <td class="align-middle">
                                            <?= html_escape($item->descricao) ?><br>
                                            <?php if($item->documento){ ?><small class="text-muted">Doc. <?= html_escape($item->documento) ?></small><?php } ?>
                                        </td>
                                        <td class="text-right text-nowrap align-middle <?= $item->valor >= 0 ? 'text-teal' : 'text-danger' ?>">R$ <?= number_format((float) ($item->valor), 2, ',', '.') ?></td>
                                        <td class="text-center align-middle">
                                            <?php if($item->id_vinculo !== null){ ?>
                                                <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal"
                                                    data-target="#consultar-conciliacao-<?= $item->id_extrato ?>">CONSULTA</button>
                                            <?php }else{ ?>
                                                <button type="button" class="btn btn-outline-teal btn-sm" data-toggle="modal"
                                                    data-target="#conciliar-extrato-<?= $item->id_extrato ?>"
                                                    data-backdrop="static" data-keyboard="false">CONCILIAR</button>
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

<?php foreach($lista_extrato as $item){ ?>
    <?php if($item->id_vinculo === null){ ?>
        <div class="modal fade" id="conciliar-extrato-<?= $item->id_extrato ?>" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Conciliar lançamento</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body bg-light">
                        <form id="formConciliar<?= $item->id_extrato ?>" class="mb-0 needs-validation" novalidate
                            method="POST" action="<?= base_url("financeiro/conciliacao-bancaria/{$conta->cod_conta}/conciliar") ?>">
                            <input type="hidden" name="IdExtrato" value="<?= $item->id_extrato ?>">
                            <input type="hidden" name="DataInicio" value="<?= date('d/m/Y', strtotime($dataInicio)) ?>">
                            <input type="hidden" name="DataFim" value="<?= date('d/m/Y', strtotime($dataFim)) ?>">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table table-borderless table-sm mb-0">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="text-muted">Descrição</div>
                                                            <div><?= html_escape($item->descricao) ?></div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <table class="table table-borderless table-sm mb-0">
                                                <tbody>
                                                    <tr>
                                                        <td class="text-left text-muted">Movimento</td>
                                                        <td class="text-right"><strong><?= $item->id_extrato ?></strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left text-muted">Data</td>
                                                        <td class="text-right"><?= date('d/m/Y', strtotime($item->data_movimento)) ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left text-muted">Tipo</td>
                                                        <td class="text-right"><?= $item->valor >= 0 ? 'Crédito' : 'Débito' ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left text-muted">Situação</td>
                                                        <td class="text-right">Pendente</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-md-6">
                                            <table class="table table-borderless table-sm mb-0">
                                                <tbody>
                                                    <tr>
                                                        <td class="text-left text-muted">Documento</td>
                                                        <td class="text-right"><?= html_escape((string)$item->documento) ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left text-muted">Identificador bancário</td>
                                                        <td class="text-right"><?= html_escape((string)$item->identificador_banco) ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left text-muted">Valor</td>
                                                        <td class="text-right <?= $item->valor >= 0 ? 'text-teal' : 'text-danger' ?>">
                                                            <strong>R$ <?= number_format(abs((float)$item->valor), 2, ',', '.') ?></strong>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group mb-0">
                                        <label for="movimentoConciliacao<?= $item->id_extrato ?>">Lançamento</label>
                                        <select id="movimentoConciliacao<?= $item->id_extrato ?>"
                                            class="selectpicker show-tick form-control movimento-conciliacao" data-live-search="true"
                                            data-width="100%" data-style="btn-input-primary" title="Selecione um lançamento"
                                            data-detalhe="#detalheMovimento<?= $item->id_extrato ?>"
                                            name="CodMovimento" required>
                                            <?php foreach($item->sugestoes as $sugestao){ ?>
                                                <?php $dataSugestao = $sugestao->confirmado == 1 ? $sugestao->data_confirmacao : $sugestao->data_vencimento; ?>
                                                <option value="<?= $sugestao->cod_movimento_conta ?>">Sugerido: #<?= $sugestao->cod_movimento_conta ?> — <?= date('d/m', strtotime($dataSugestao)) ?> — <?= html_escape($sugestao->desc_movimento) ?></option>
                                            <?php } ?>
                                            <?php foreach($lista_movimentos as $movimento){
                                                $jaSugerido = false;
                                                foreach($item->sugestoes as $sugestao){
                                                    if($sugestao->cod_movimento_conta == $movimento->cod_movimento_conta) $jaSugerido = true;
                                                }
                                                if($jaSugerido) continue;
                                                $tipoEsperado = $item->valor >= 0 ? 1 : 2;
                                                if($movimento->tipo_movimento != $tipoEsperado) continue;
                                                $valorBase = $movimento->confirmado == 1 ? $movimento->valor_confirmado : $movimento->valor_titulo;
                                                $valorAssinado = $movimento->tipo_movimento == 1 ? $valorBase : -$valorBase;
                                                if(abs($valorAssinado - $item->valor) > 0.009) continue; ?>
                                                <?php $dataOpcao = $movimento->confirmado == 1 ? $movimento->data_confirmacao : $movimento->data_vencimento; ?>
                                                <option value="<?= $movimento->cod_movimento_conta ?>">#<?= $movimento->cod_movimento_conta ?> — <?= date('d/m', strtotime($dataOpcao)) ?> — <?= html_escape($movimento->desc_movimento) ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div id="detalheMovimento<?= $item->id_extrato ?>" class="detalhe-movimento d-none">
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <table class="table table-borderless table-sm mb-0">
                                                    <tbody>
                                                        <tr><td class="text-left text-muted">Título</td><td class="text-right"><strong data-campo="titulo"></strong></td></tr>
                                                        <tr><td class="text-left text-muted">Situação</td><td class="text-right" data-campo="situacao"></td></tr>
                                                        <tr><td class="text-left text-muted">Tipo</td><td class="text-right" data-campo="tipo"></td></tr>
                                                        <tr><td class="text-left text-muted">Data de competência</td><td class="text-right" data-campo="competencia"></td></tr>
                                                        <tr><td class="text-left text-muted">Data de vencimento</td><td class="text-right" data-campo="vencimento"></td></tr>
                                                        <tr><td class="text-left text-muted">Parcela</td><td class="text-right" data-campo="parcela"></td></tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-md-6">
                                                <table class="table table-borderless table-sm mb-0">
                                                    <tbody>
                                                        <tr><td class="text-left text-muted" data-campo="rotuloEmitente"></td><td class="text-right" data-campo="emitente"></td></tr>
                                                        <tr><td class="text-left text-muted">Descrição</td><td class="text-right" data-campo="descricao"></td></tr>
                                                        <tr><td class="text-left text-muted">Método de pagamento</td><td class="text-right" data-campo="metodo"></td></tr>
                                                        <tr><td class="text-left text-muted">Valor do título</td><td class="text-right" data-campo="valorTitulo"></td></tr>
                                                        <tr><td class="text-left text-muted">Valor confirmado</td><td class="text-right"><strong data-campo="valorConfirmado"></strong></td></tr>
                                                        <tr><td class="text-left text-muted">Data de confirmação</td><td class="text-right" data-campo="confirmacao"></td></tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-info mr-auto abrir-novo-titulo"
                            data-modal-atual="#conciliar-extrato-<?= $item->id_extrato ?>"
                            data-modal-destino="#novo-titulo-extrato-<?= $item->id_extrato ?>">
                            <i class="fas fa-plus-circle"></i> Novo Título
                        </button>
                        <button type="submit" class="btn btn-teal" form="formConciliar<?= $item->id_extrato ?>">Conciliar</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="novo-titulo-extrato-<?= $item->id_extrato ?>" role="dialog">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Novo título <?= $item->valor >= 0 ? 'a receber' : 'a pagar' ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body modal-body-scroll bg-light">
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="nav nav-tabs mb-3">
                                    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#dadosTitulo<?= $item->id_extrato ?>">Informações do Título</a></li>
                                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#financeiroTitulo<?= $item->id_extrato ?>">Financeiro</a></li>
                                </ul>
                                <form id="formNovoTitulo<?= $item->id_extrato ?>" class="mb-0 needs-validation" novalidate
                                    method="POST" action="<?= base_url("financeiro/conciliacao-bancaria/{$conta->cod_conta}/novo-titulo") ?>">
                                    <input type="hidden" name="IdExtrato" value="<?= $item->id_extrato ?>">
                                    <input type="hidden" name="DataInicio" value="<?= date('d/m/Y', strtotime($dataInicio)) ?>">
                                    <input type="hidden" name="DataFim" value="<?= date('d/m/Y', strtotime($dataFim)) ?>">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="tab-content">
                                                <div class="tab-pane fade show active" id="dadosTitulo<?= $item->id_extrato ?>">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label>Estabelecimento</label>
                                                            <input type="text" class="form-control" value="<?= html_escape($conta->nome_estabelecimento) ?>" readonly>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label><?= $item->valor >= 0 ? 'Pagador' : 'Recebedor' ?></label>
                                                            <select class="selectpicker show-tick form-control" data-live-search="true"
                                                                data-style="btn-input-primary" title="Selecione" name="CodEmitente">
                                                                <?php $listaEmitente = $item->valor >= 0 ? $lista_cliente : $lista_fornecedor; ?>
                                                                <?php foreach($listaEmitente as $emitente){ ?>
                                                                    <?php $codEmitente = $item->valor >= 0 ? $emitente->cod_cliente : $emitente->cod_fornecedor; ?>
                                                                    <?php $nomeEmitente = $item->valor >= 0 ? $emitente->nome_cliente : $emitente->nome_fornecedor; ?>
                                                                    <option value="<?= $codEmitente ?>"><?= $codEmitente ?> - <?= html_escape($nomeEmitente) ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label>Data de Competência <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control data-titulo-conciliacao" name="DataCompetencia"
                                                                value="<?= date('d/m/Y', strtotime($item->data_movimento)) ?>" required>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Valor do Título <span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend"><span class="input-group-text">R$</span></div>
                                                                <input type="text" class="form-control" value="<?= number_format(abs((float)$item->valor), 2, ',', '.') ?>" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label>Descrição do Título <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="Descricao" maxlength="100"
                                                                value="<?= html_escape(mb_substr($item->descricao, 0, 100)) ?>" required>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-4">
                                                            <label>Data de Vencimento <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control data-titulo-conciliacao" name="DataVencimento"
                                                                value="<?= date('d/m/Y', strtotime($item->data_movimento)) ?>" required>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label>Data da Confirmação</label>
                                                            <input type="text" class="form-control" value="<?= date('d/m/Y', strtotime($item->data_movimento)) ?>" readonly>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label>Valor <?= $item->valor >= 0 ? 'Recebido' : 'Pago' ?></label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend"><span class="input-group-text">R$</span></div>
                                                                <input type="text" class="form-control" value="<?= number_format(abs((float)$item->valor), 2, ',', '.') ?>" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="financeiroTitulo<?= $item->id_extrato ?>">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label>Conta Financeira</label>
                                                            <input type="text" class="form-control" value="<?= html_escape($conta->nome_conta) ?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label>Centro de Custo</label>
                                                            <select class="selectpicker show-tick form-control" data-live-search="true" data-style="btn-input-primary" title=" " name="CodCentroCusto">
                                                                <?php $listaCentro = $item->valor >= 0 ? $lista_centro_custo_receita : $lista_centro_custo_despesa; ?>
                                                                <?php foreach($listaCentro as $centroCusto){ ?>
                                                                    <option value="<?= $centroCusto->cod_centro_custo ?>"><?= $centroCusto->cod_centro_custo ?> - <?= html_escape($centroCusto->nome_centro_custo) ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Conta Contábil</label>
                                                            <select class="selectpicker show-tick form-control" data-live-search="true" data-style="btn-input-primary" title=" " name="CodContaContabil">
                                                                <?php $listaContabil = $item->valor >= 0 ? $lista_conta_contabil_receita : $lista_conta_contabil_despesa; ?>
                                                                <?php foreach($listaContabil as $contaContabil){ ?>
                                                                    <option value="<?= $contaContabil->cod_conta_contabil ?>"><?= $contaContabil->cod_conta_contabil ?> - <?= html_escape($contaContabil->nome_conta_contabil) ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label>Método de Pagamento</label>
                                                            <select class="selectpicker show-tick form-control" data-live-search="true" data-style="btn-input-primary" title=" " name="CodMetodoPagamento">
                                                                <?php foreach($lista_metodo_pagamento as $metodoPagamento){ ?>
                                                                    <option value="<?= $metodoPagamento->cod_metodo_pagamento ?>"><?= $metodoPagamento->cod_metodo_pagamento ?> - <?= html_escape($metodoPagamento->nome_metodo_pagamento) ?></option>
                                                                <?php } ?>
                                                            </select>
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
                        <button type="submit" class="btn btn-primary" form="formNovoTitulo<?= $item->id_extrato ?>"><i class="fas fa-save"></i> Salvar e Conciliar</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
<?php } ?>

<?php foreach($lista_extrato as $item){ ?>
    <?php if($item->id_vinculo !== null){ ?>
        <div class="modal fade" id="consultar-conciliacao-<?= $item->id_extrato ?>" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><i class="fas fa-check-circle text-teal-light small2"></i>
                            <span class="ml-1"><?= html_escape($item->desc_movimento_sistema) ?></span>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body modal-body-scroll bg-light">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <table class="table table-borderless table-sm mb-0">
                                            <tbody>
                                                <tr><td class="text-left text-muted">Título</td><td class="text-right"><strong><?= $item->cod_movimento_conta ?></strong></td></tr>
                                                <tr><td class="text-left text-muted">Situação</td><td class="text-right">Confirmado</td></tr>
                                                <tr><td class="text-left text-muted">Tipo</td><td class="text-right"><?= $item->tipo_movimento_titulo == 1 ? 'Conta a receber' : 'Conta a pagar' ?></td></tr>
                                                <tr><td class="text-left text-muted">Usuário criação</td><td class="text-right"><?= html_escape((string)$item->usuario_criacao_titulo) ?></td></tr>
                                                <tr><td class="text-left text-muted">Usuário liquidação</td><td class="text-right"><?= html_escape((string)$item->usuario_liquidacao_titulo) ?></td></tr>
                                                <tr><td class="text-left text-muted">Data de competência</td><td class="text-right"><?= $item->data_competencia ? date('d/m/Y', strtotime($item->data_competencia)) : '' ?></td></tr>
                                                <tr><td class="text-left text-muted">Data de vencimento</td><td class="text-right"><?= $item->data_vencimento ? date('d/m/Y', strtotime($item->data_vencimento)) : '' ?></td></tr>
                                                <tr><td class="text-left text-muted">Parcela</td><td class="text-right"><?= html_escape((string)$item->parcela) ?></td></tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-6">
                                        <table class="table table-borderless table-sm mb-0">
                                            <tbody>
                                                <tr>
                                                    <td class="text-left text-muted"><?= $item->tipo_movimento_titulo == 1 ? 'Pagador' : 'Recebedor' ?></td>
                                                    <td class="text-right"><?= html_escape((string)($item->tipo_movimento_titulo == 1 ? $item->nome_cliente : $item->nome_fornecedor)) ?></td>
                                                </tr>
                                                <tr><td class="text-left text-muted">Descrição</td><td class="text-right"><?= html_escape($item->desc_movimento_sistema) ?></td></tr>
                                                <tr><td class="text-left text-muted">Método de pagamento</td><td class="text-right"><?= html_escape((string)$item->nome_metodo_pagamento) ?></td></tr>
                                                <tr>
                                                    <td class="text-left text-muted">Valor do título</td>
                                                    <td class="text-right <?= $item->tipo_movimento_titulo == 1 ? 'text-teal' : 'text-danger' ?>">R$ <?= number_format((float)$item->valor_titulo, 2, ',', '.') ?></td>
                                                </tr>
                                                <tr><td class="text-left text-muted"><?= $item->tipo_movimento_titulo == 1 ? 'Taxa' : 'Desconto' ?></td><td class="text-right">R$ <?= number_format((float)$item->valor_desc_taxa, 2, ',', '.') ?></td></tr>
                                                <tr><td class="text-left text-muted"><?= $item->tipo_movimento_titulo == 1 ? 'Multa' : 'Juros' ?></td><td class="text-right">R$ <?= number_format((float)$item->valor_juros_multa, 2, ',', '.') ?></td></tr>
                                                <tr>
                                                    <td class="text-left text-muted">Valor confirmado</td>
                                                    <td class="text-right <?= $item->tipo_movimento_titulo == 1 ? 'text-teal' : 'text-danger' ?>"><strong>R$ <?= number_format((float)$item->valor_confirmado, 2, ',', '.') ?></strong></td>
                                                </tr>
                                                <tr><td class="text-left text-muted">Data de confirmação</td><td class="text-right"><?= $item->data_confirmacao ? date('d/m/Y', strtotime($item->data_confirmacao)) : '' ?></td></tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <form class="mb-0" method="POST" action="<?= base_url("financeiro/conciliacao-bancaria/{$conta->cod_conta}/desfazer") ?>">
                            <input type="hidden" name="IdExtrato" value="<?= $item->id_extrato ?>">
                            <input type="hidden" name="DataInicio" value="<?= date('d/m/Y', strtotime($dataInicio)) ?>">
                            <input type="hidden" name="DataFim" value="<?= date('d/m/Y', strtotime($dataFim)) ?>">
                            <button class="btn btn-danger" type="submit">Desfazer</button>
                        </form>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
<?php } ?>

<script>
var detalhesMovimentosConciliacao = <?= json_encode(array_reduce($lista_movimentos, function($detalhes, $movimento){
    $detalhes[$movimento->cod_movimento_conta] = array(
        'titulo' => (string)$movimento->cod_movimento_conta,
        'situacao' => $movimento->confirmado == 1 ? 'Confirmado' : 'Pendente',
        'tipo' => $movimento->tipo_movimento == 1 ? 'Conta a receber' : 'Conta a pagar',
        'competencia' => $movimento->data_competencia ? date('d/m/Y', strtotime($movimento->data_competencia)) : '',
        'vencimento' => $movimento->data_vencimento ? date('d/m/Y', strtotime($movimento->data_vencimento)) : '',
        'parcela' => (string)$movimento->parcela,
        'rotuloEmitente' => $movimento->tipo_movimento == 1 ? 'Pagador' : 'Recebedor',
        'emitente' => $movimento->tipo_movimento == 1 ? (string)$movimento->nome_cliente : (string)$movimento->nome_fornecedor,
        'descricao' => (string)$movimento->desc_movimento,
        'metodo' => (string)$movimento->nome_metodo_pagamento,
        'valorTitulo' => 'R$ ' . number_format((float)$movimento->valor_titulo, 2, ',', '.'),
        'valorConfirmado' => $movimento->confirmado == 1 ? 'R$ ' . number_format((float)$movimento->valor_confirmado, 2, ',', '.') : '',
        'classeValor' => $movimento->tipo_movimento == 2 ? 'text-danger' : 'text-teal',
        'confirmacao' => $movimento->data_confirmacao ? date('d/m/Y', strtotime($movimento->data_confirmacao)) : ''
    );
    return $detalhes;
}, array()), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT) ?>;

$('.movimento-conciliacao').on('changed.bs.select change', function(){
    var detalhe = $($(this).data('detalhe'));
    var movimento = detalhesMovimentosConciliacao[$(this).val()];
    if(!movimento){
        detalhe.addClass('d-none');
        return;
    }
    Object.keys(movimento).forEach(function(campo){
        if(campo === 'classeValor') return;
        detalhe.find('[data-campo="' + campo + '"]').text(movimento[campo]);
    });
    detalhe.find('[data-campo="valorTitulo"], [data-campo="valorConfirmado"]')
        .removeClass('text-danger text-teal')
        .addClass(movimento.classeValor);
    detalhe.removeClass('d-none');
});

$('.abrir-novo-titulo').on('click', function(){
    var modalAtual = $($(this).data('modal-atual'));
    var modalDestino = $($(this).data('modal-destino'));
    modalAtual.one('hidden.bs.modal', function(){
        modalDestino.modal('show');
    });
    modalAtual.modal('hide');
});

$('.data-titulo-conciliacao').each(function(){
    $(this).datepicker({
        uiLibrary: 'bootstrap4'
    });
});

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
