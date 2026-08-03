<?php $this->load->view('gerais/header', $menu); ?>
<?php $this->load->view('gerais/menu', $menu); ?>

<section>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('visao-geral') ?>">Visão Geral</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>fiscal/natureza-operacao">Naturezas de
                    Operação</a></li>
            <li class="breadcrumb-item active">Adicionar</li>
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
                                    <strong>Atenção!</strong> <?php echo $this->session->flashdata('erro') ?>
                                </div>
                                <?php }
                  $this->session->set_flashdata('erro', ''); ?>
                                <?php if ($this->session->flashdata('sucesso') <> "") { ?>
                                <div class="alert alert-success alert-dismissible fade show" id="alert" role="alert">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>Muito bem!</strong>
                                    <?php echo $this->session->flashdata('sucesso') ?>
                                </div>
                                <?php }
                  $this->session->set_flashdata('sucesso', ''); ?>
                                <form action='inserir' method='post' class="mb-0 needs-validation" novalidate>
                                    <div class="form-row">
                                        <div class="form-group col-md-10">
                                            <label for="inputNome">Nome da Natureza de Operação <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="inputNome" name='nome' required>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="tipoNfe">Tipo NF-e</label>
                                            <select class="form-control selectpicker show-tick"
                                                data-style="btn-input-primary" id="tipoNfe" name="tipoNfe">
                                                <?php foreach ($tipoNfe as $key => $name) { ?>
                                                <option value="<?php echo $key ?>">
                                                    <?php echo $name ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>                                        
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-10">
                                            <label for="descInterna">Descrição Interna</label>
                                            <input type="text" class="form-control" id="descInterna" name='descInterna'>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="finalidade">Finalidade NF-e</label>
                                            <select class="form-control selectpicker show-tick"
                                                data-style="btn-input-primary" id="finalidade" name="finalidade">
                                                <?php foreach ($finalidade as $key => $name) { ?>
                                                <option value="<?php echo $key ?>">
                                                    <?php echo $name ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>                                        
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkMovimentaEstoque" name="MovimentaEstoque" value="1" checked>
                                        <label class="custom-control-label" for="checkMovimentaEstoque">Movimenta Estoque</label>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="tb_fis_cfop_id_estad">CFOP Estadual <span class="text-danger">*</span></label>
                                            <select id="tb_fis_cfop_id_estad" class="selectpicker show-tick form-control"
                                                data-live-search="true" data-actions-box="true"
                                                title="Selecione uma CFOP" data-style="btn-input-primary"
                                                name="tb_fis_cfop_id_estad" required>
                                                <?php foreach ($cfops as $key => $value) { ?>
                                                <option value="<?php echo $value->id ?>">
                                                    <?php echo $value->codigo ?> - <?php echo $value->nome ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>                                      
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="tb_fis_cfop_id_inter">CFOP Interestadual <span class="text-danger">*</span></label>
                                            <select id="tb_fis_cfop_id_inter" class="selectpicker show-tick form-control"
                                                data-live-search="true" data-actions-box="true"
                                                title="Selecione uma CFOP" data-style="btn-input-primary"
                                                name="tb_fis_cfop_id_inter" required>
                                                <?php foreach ($cfops as $key => $value) { ?>
                                                <option value="<?php echo $value->id ?>">
                                                    <?php echo $value->codigo ?> - <?php echo $value->nome ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>                                      
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="tb_fis_cfop_id_ext">CFOP Exterior <span class="text-danger">*</span></label>
                                            <select id="tb_fis_cfop_id_ext" class="selectpicker show-tick form-control"
                                                data-live-search="true" data-actions-box="true"
                                                title="Selecione uma CFOP" data-style="btn-input-primary"
                                                name="tb_fis_cfop_id_ext" required>
                                                <?php foreach ($cfops as $key => $value) { ?>
                                                <option value="<?php echo $value->id ?>">
                                                    <?php echo $value->codigo ?> - <?php echo $value->nome ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>                                      
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="inputInfComplementares">Informações Complementares</label>
                                            <textarea class="form-control" rows="3" id="inputInfComplementares"
                                                name="informComplementares"><?= set_value('informComplementares'); ?></textarea>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <a href="#" class="float-right" data-toggle="modal" data-target="#variaveis-informacoes">Variáveis para utilizar nas informações complementares</a>
                                        </div>
                                    </div>
                                    <div>
                                        <hr>
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" href="#nf-1">
                                                    <?php echo ($empresa->codigo_regime_tributario != 1) ? 'ICMS' : 'ICMSSN' ?>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#nf-2">FCP</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#nf-3">IPI</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#nf-4">PIS</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#nf-5">COFINS</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tab-content">
                                        <!-- ICMS -->
                                        <div class="tab-pane fade active show" id="nf-1">
                                          <div class="text-center mt-3">
                                            <p class="text-muted mb-0">Necessário salvar natureza de operação antes de informar <?php echo ($empresa->codigo_regime_tributario != 1) ? 'ICMS' : 'ICMSSN' ?></p>
                                          </div>
                                        </div>
                                        <div class="tab-pane fade" id="nf-3">
                                          <div class="text-center mt-3">
                                            <p class="text-muted mb-0">Necessário salvar natureza de operação antes de informar IPI</p>
                                          </div>
                                        </div>
                                        <div class="tab-pane fade" id="nf-4">
                                          <div class="text-center mt-3">
                                            <p class="text-muted mb-0">Necessário salvar natureza de operação antes de informar PIS</p>
                                          </div>
                                        </div>
                                        <div class="tab-pane fade" id="nf-5">
                                          <div class="text-center mt-3">
                                            <p class="text-muted mb-0">Necessário salvar natureza de operação antes de informar COFINS</p>
                                          </div>
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="row float-right">
                                        <div class="col-lg-12 col-md-12 col-xs-12">
                                            <button type="submit" class="btn btn-primary" name="Opcao" value="salvar"><i
                                                    class="fas fa-save"></i> Salvar</button>
                                            </button>
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

<div class="modal fade" id="variaveis-informacoes" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Variáveis Informações Complementares</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3>Variáveis</h3>
                <p class="text-muted">Para exibir valores nas informações complementares, usar as variáveis (inclusive colchetes):</p>
                <h3>Impostos</h3><p class="text-muted">
                <strong>[VALOR_CREDITO_ICMS]</strong> - Valor total do crédito do ICMS (somente contribuintes do SIMPLES)<br>
                <strong>[ALIQUOTA_CREDITO_ICMS]</strong> - Alíquota de crédito do ICMS (somente contribuintes do SIMPLES)<br>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<script>
$(function() {
    $.applyDataMask();
});
</script>

<?php $this->load->view('gerais/footer'); ?>