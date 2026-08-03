<?php $this->load->view('gerais/header', $menu); ?>
<?php $this->load->view('gerais/menu', $menu); ?>

<section>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('visao-geral') ?>">Visão Geral</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>conta-contabil">Conta Contábil</a></li>
            <li class="breadcrumb-item active">Nova Conta Contábil</li>
        </ol>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="card  mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-xs-12">
                                <?php if ($this->session->flashdata('erro') <> "") { ?>
                                    <div class="alert alert-danger alert-dismissible fade show" id="alert" role="alert">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <strong>Atenção!</strong> <?= $this->session->flashdata('erro') ?>
                                    </div>
                                <?php }
                                $this->session->set_flashdata('erro', ''); ?>
                                <?php if ($this->session->flashdata('sucesso') <> "") { ?>
                                    <div class="alert alert-success alert-dismissible fade show" id="alert" role="alert">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <strong>Muito bem!</strong>
                                        <?= $this->session->flashdata('sucesso') ?>
                                    </div>
                                <?php }
                                $this->session->set_flashdata('sucesso', ''); ?>
                                <form action='nova-conta-contabil' method='post' class="needs-validation mb-0" novalidate>
                                    <div class="form-row">
                                        <div class="form-group col-md-9">
                                            <label for="inputCodContaContabilPai">Conta Contábil Pai</label>
                                            <select id="inputCodContaContabilPai" class="selectpicker show-tick form-control" data-live-search="true" data-actions-box="true" title=" " data-style="btn-input-primary" name="CodContaContabilPai">
                                                <?php foreach ($lista_conta_contabil as $key_conta_contabil => $conta_contabil) { ?>
                                                    <option value="<?= $conta_contabil->cod_conta_contabil ?>" <?php if ($conta_contabil->cod_conta_contabil == set_value('CodContaContabilPai')) echo "selected"; ?>>
                                                        <?= $conta_contabil->cod_conta_contabil ?> -
                                                        <?= $conta_contabil->nome_conta_contabil ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Situação</label>
                                            <div class="btn-group btn-block" data-toggle="buttons">
                                                <label class="btn btn-outline-primary">
                                                    <input type="radio" id="radioAtivo" name="Ativo" value="1" checked> Ativa
                                                </label>
                                                <label class="btn btn-outline-primary">
                                                    <input type="radio" id="radioInativo" name="Ativo" value="2"> Inativa
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row ">
                                        <div class="form-group col-md-3">
                                            <label for="inputCodContaContabil">Código Conta Contábil <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <input type="text" id="inputCodContaContabilComp" class="form-control text-right" readonly>
                                                <input type="text" name='CodContaContabil' value="<?= set_value('CodContaContabil'); ?>" class="form-control" data-mask="#0" data-mask-reverse="true" required>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputNomeContaContabil">Nome da Conta Contábil <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="inputNomeContaContabil" name='NomeContaContabil' value="<?= set_value('NomeContaContabil'); ?>" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="inputDemonsResult">Demonstração de Resultado</label>
                                            <select id="inputDemonsResult" class="selectpicker show-tick form-control" data-actions-box="true" data-style="btn-input-primary" name="DemonsResult">
                                                <option value="1">Não Classificado</option>
                                                <option value="1">Receita</option>
                                                <option value="2">Deduções (Impostos e Devoluções)</option>
                                                <option value="3">Custos</option>
                                                <option value="4">Despesas Operacionais</option>
                                                <option value="5">Outras Receitas não Operacionais</option>
                                                <option value="6">>Outras Despesas não Operacionais</option>
                                                <option value="7">Investimento</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">                                        
                                        <div class="form-group col-md-3">
                                            <label>Habiltar Utilização</label>
                                            <div class="form-row"> 
                                                <div class="col-md-6">
                                                    <div class="btn-group-toggle" data-toggle="buttons">
                                                        <label class="btn btn-outline-primary active btn-block">
                                                            <input type="checkbox" checked autocomplete="off" name="MovEntrada" value="1">
                                                            <i class="fa-solid fa-check"></i> Receita
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="btn-group-toggle" data-toggle="buttons">
                                                        <label class="btn btn-outline-primary active btn-block">
                                                            <input type="checkbox" checked autocomplete="off" name="MovSaida" value="1">
                                                            <i class="fa-solid fa-check"></i> Despesa
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h6>Orçamentos da Conta</h6>
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-xs-12">
                                                    <button type="button" class="btn btn-outline-info btn-sm" data-toggle="tooltip" data-placement="bottom" title="Você deve primeiramente salvar a conta contábil antes de inserir os orçamentos" disabled><i class="fas fa-plus-circle"></i> Novo
                                                        Orçamento</button>
                                                    <button type="button" class="btn btn-outline-danger btn-sm" disabled><i class="fas fa-trash-alt"></i>
                                                        Excluir</button>
                                                </div>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-hover">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th scope="col" class="text-center"><i class="fa-solid fa-check"></i></th>
                                                            <th scope="col" class="text-center">Ano</th>
                                                            <th scope="col">Centro de Custo</th>
                                                            <th scope="col" class="text-right">Total orçado</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="text-center text-muted">
                                                <p class="font-italic mt-3">Nenhum orçamento adicionado</p>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="mb-3">
                                    <div class="row float-right">
                                        <div class="col-lg-12 col-md-12 col-xs-12">
                                            <button type="submit" class="btn btn-primary" name="Opcao" value="salvar"><i class="fas fa-save"></i> Salvar</button>
                                            <button type="submit" class="btn btn-info" name="Opcao" value="salvarContinuar">Salvar e Continuar</button>
                                            <a href="<?php echo base_url() ?>conta-contabil" class="btn btn-secondary link-load">Cancelar</a>
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
</section>

<script>
    $(function() {
        $.applyDataMask();
    });

    $("#inputCodContaContabilPai").change(function() {

        $("#inputCodContaContabilComp").val($("#inputCodContaContabilPai").val() + ".");

    });
</script>

<?php $this->load->view('gerais/footer'); ?>