<?php $this->load->view('gerais/header', $menu); ?>
<?php $this->load->view('gerais/menu', $menu); ?>

<section>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('visao-geral') ?>">Visão Geral</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>fiscal/natureza-operacao">Naturezas de
                    Operação</a></li>
            <li class="breadcrumb-item active">Editar Natureza de Operação</li>
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
                                <form action="<?php echo base_url("fiscal/natureza-operacao/salvar/{$row->id}") ?>"
                                    method="post" class="needs-validation" novalidate>
                                    <div class="form-row">
                                        <div class="form-group col-md-2">
                                            <label for="inputCodCentroCusto">Código</label>
                                            <input type="text" class="form-control" name='codigo'
                                                value="<?php echo $row->id ?>" readonly>
                                        </div>
                                        <div class="form-group col-md-8">
                                            <label for="inputNome">Nome da Natureza de Operação <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="inputNome" name='nome'
                                                value="<?php echo $row->nome ?>" required>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="tipoNfe">Tipo NF-e</label>
                                            <select class="form-control selectpicker show-tick"
                                                data-style="btn-input-primary" id="tipoNfe" name="tipoNfe">
                                                <?php foreach ($tipoNfe as $key => $name) { ?>
                                                <option value="<?php echo $key ?>"
                                                    <?php if ($key == $row->operacao_fiscal) echo "selected"; ?>>
                                                    <?php echo $name ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-10">
                                            <label for="descInterna">Descrição Interna</label>
                                            <input type="text" class="form-control" id="descInterna" name='descInterna'
                                                value="<?php echo $row->descricao ?>">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="finalidade">Finalidade NF-e</label>
                                            <select class="form-control selectpicker show-tick"
                                                data-style="btn-input-primary" id="finalidade" name="finalidade">
                                                <?php foreach ($finalidade as $key => $name) { ?>
                                                <option value="<?php echo $key ?>"
                                                    <?php if ($key == $row->finalidade) echo "selected"; ?>>
                                                    <?php echo $name ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkMovimentaEstoque" name="MovimentaEstoque" value="1" <?php if($row->movimenta_estoque == 1) echo "checked" ?>>
                                        <label class="custom-control-label" for="checkMovimentaEstoque">Movimenta Estoque</label>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="tb_fis_cfop_id_estad">CFOP Estadual <span
                                                    class="text-danger">*</span></label>
                                            <select id="tb_fis_cfop_id_estad"
                                                class="selectpicker show-tick form-control" data-live-search="true"
                                                data-actions-box="true" title="Selecione uma CFOP"
                                                data-style="btn-input-primary" name="tb_fis_cfop_id_estad" required>
                                                <?php foreach ($cfops as $key => $value) { ?>
                                                <option value="<?php echo $value->id ?>"
                                                    <?php if ($row->tb_fis_cfop_id_estad == $value->id) echo "selected"; ?>>
                                                    <?php echo $value->codigo ?> - <?php echo $value->nome ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="tb_fis_cfop_id_inter">CFOP Interestadual <span
                                                    class="text-danger">*</span></label>
                                            <select id="tb_fis_cfop_id_inter"
                                                class="selectpicker show-tick form-control" data-live-search="true"
                                                data-actions-box="true" title="Selecione uma CFOP"
                                                data-style="btn-input-primary" name="tb_fis_cfop_id_inter" required>
                                                <?php foreach ($cfops as $key => $value) { ?>
                                                <option value="<?php echo $value->id ?>"
                                                    <?php if ($row->tb_fis_cfop_id_inter == $value->id) echo "selected"; ?>>
                                                    <?php echo $value->codigo ?> - <?php echo $value->nome ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="tb_fis_cfop_id_ext">CFOP Exterior <span
                                                    class="text-danger">*</span></label>
                                            <select id="tb_fis_cfop_id_ext" class="selectpicker show-tick form-control"
                                                data-live-search="true" data-actions-box="true"
                                                title="Selecione uma CFOP" data-style="btn-input-primary"
                                                name="tb_fis_cfop_id_ext" required>
                                                <?php foreach ($cfops as $key => $value) { ?>
                                                <option value="<?php echo $value->id ?>"
                                                    <?php if ($row->tb_fis_cfop_id_ext == $value->id) echo "selected"; ?>>
                                                    <?php echo $value->codigo ?> - <?php echo $value->nome ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="inputInfComplementares">Informações Complementares</label>
                                            <textarea class="form-control" rows="3" id="inputInfComplementares"
                                                name="informComplementares"><?php echo $row->informacoes_complementares ?></textarea>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <a href="#" class="float-right" data-toggle="modal"
                                                data-target="#variaveis-informacoes">Variáveis para utilizar nas
                                                informações complementares</a>
                                        </div>
                                    </div>
                                    <div>
                                        <hr>
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" href="#icms">
                                                    <?php echo ($empresa->codigo_regime_tributario != 1) ? 'ICMS' : 'ICMSSN' ?>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#ipi">IPI</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#pis">PIS</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#cofins">COFINS</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tab-content">
                                        <!-- ICMS -->
                                        <div class="tab-pane fade active show" id="icms">
                                            <?php if ($empresa->codigo_regime_tributario != 1) { ?>
                                            <div class="form-row mt-3">
                                                <div class="form-group col-md-4">
                                                    <label for="tipoNfe">ICMS CST</label>
                                                    <select class="form-control selectpicker show-tick"
                                                        data-style="btn-input-primary" id="icmsCST" name="icmsCST">
                                                        <?php foreach ($icmsCST as $key => $icms) { ?>
                                                        <option value="<?php echo $icms->id ?>" <?php echo ($icms->id ==
                                                    $row->tb_fis_icms_cst_id) ? 'selected="selected"' : '' ?>>
                                                            <?php echo $icms->codigo . ' - ' . $icms->nome ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="p_red_bc">Percentual Redução BC ICMS</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name='p_red_bc'
                                                            id="p_red_bc" value="<?php echo $row->p_red_bc ?>"
                                                            data-mask="##0,00" data-mask-reverse="true">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">%</span>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="c_benef">Codigo do Benefício Fiscal</label>
                                                    <input type="text" class="form-control" name='c_benef'
                                                            id="c_benef" value="<?php echo $row->c_benef ?>">
                                                </div>
                                            </div>
                                            <?php
                                                } else {
                                            ?>
                                            <div class="form-row  mt-3">
                                                <div class="form-group col-md-6">
                                                    <label for="tipoNfe">ICMS CSOSN</label>
                                                    <select class="form-control selectpicker show-tick"
                                                        data-style="btn-input-primary" id="icmsCSOSN" name="icmsCSOSN">
                                                        <?php foreach ($icmsCSOSN as $key => $icms) { ?>
                                                        <option value="<?php echo $icms->id ?>" <?php echo ($icms->id ==
                                                    $row->tb_fis_icms_csosn_id) ? 'selected="selected"' : '' ?>>
                                                            <?php echo $icms->codigo . ' - ' . $icms->descricao ?>
                                                        </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="p_mvast">Percentual Margem ICMS ST (PMVAST)</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name='p_mvast'
                                                            id="p_mvast" value="<?php echo $row->p_mvast ?>"
                                                            data-mask="##0,00" data-mask-reverse="true">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">%</span>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="p_red_bc_st">Percentual Redução BC ICMS ST</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name='p_red_bc_st'
                                                            id="p_red_bc_st" value="<?php echo $row->p_red_bc_st ?>"
                                                            data-mask="##0,00" data-mask-reverse="true">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">%</span>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <?php
                                                }
                                            ?>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="tipoNfe">Modalidade da B.C. do ICMS</label>
                                                    <select class="form-control selectpicker show-tick"
                                                        data-style="btn-input-primary" id="mod_bc" name="mod_bc">
                                                        <?php foreach ($modBC as $key => $name) { ?>
                                                        <option value="<?php echo $key ?>"
                                                            <?php if ($key == $row->mod_bc) echo "selected"; ?>>
                                                            <?php echo $name ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="mod_bc_st">Modalidade da B.C. do ICMS ST</label>
                                                    <select class="form-control selectpicker show-tick"
                                                        data-style="btn-input-primary" id="mod_bc_st" name="mod_bc_st">
                                                        <?php foreach ($modBCST as $key => $name) { ?>
                                                        <option value="<?php echo $key ?>"
                                                            <?php if ($key == $row->mod_bc_st) echo "selected"; ?>>
                                                            <?php echo $name ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <?php if ($empresa->codigo_regime_tributario != 1) { ?>
                                                <div class="form-group col-md-6">
                                                    <label for="tipoNfe">ICMS Suspenso</label>
                                                    <select class="form-control selectpicker show-tick"
                                                        data-style="btn-input-primary" id="icms_suspenso"
                                                        name="icms_suspenso">
                                                        <option value=""
                                                            <?php if (!$row->icms_suspenso) echo "selected"; ?>>Não
                                                        </option>
                                                        <option value="1"
                                                            <?php if ($row->icms_suspenso == 1) echo "selected"; ?>>
                                                            Sim
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="tipoNfe">Converter ICMS em Desconto</label>
                                                    <select class="form-control selectpicker show-tick"
                                                        data-style="btn-input-primary" id="icms_suspenso"
                                                        name="icms_suspenso">
                                                        <option value=""
                                                            <?php if (!$row->converter_icms_em_desconto) echo "selected"; ?>>
                                                            Não
                                                        </option>
                                                        <option value="1"
                                                            <?php if ($row->converter_icms_em_desconto == 1) echo "selected"; ?>>
                                                            Sim
                                                        </option>
                                                    </select>
                                                </div>
                                                <?php
                                                        }
                                                    ?>
                                                <div class="col-md-12">
                                                    <hr>
                                                    <div>
                                                        <ul class="nav nav-tabs">
                                                            <li class="nav-item">
                                                                <a class="nav-link active" data-toggle="tab" href="#icms-aliq">
                                                                    Alíquotas ICMS
                                                                </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" data-toggle="tab" href="#fcp">FCP</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="tab-content">
                                                        <div class="tab-pane fade active show" id="icms-aliq">
                                                            <div class="row button-pane">
                                                                <div class="col-lg-12 col-md-12 col-xs-12 mb-0 mt-0">
                                                                    <button data-toggle="modal" data-target="#inserir-icms"
                                                                        type="button" class="btn btn-outline-info btn-sm"><i
                                                                            class="fas fa-plus-circle"></i> Nova Alíquota
                                                                        ICMS</button>
                                                                    <button data-toggle="modal" data-target="#elimina-icms"
                                                                        type="button" class="btn btn-outline-danger btn-sm"
                                                                        id="excluirFCP" disabled><i
                                                                            class="fas fa-trash-alt"></i>
                                                                        Excluir</button>
                                                                </div>
                                                            </div>
                                                            <!-- <form
                                                                action="<?= base_url("fiscal/natureza-operacao/excluir-icms/{$row->id}") ?>"
                                                                method="post" id="DeleteFCP" class="needs-validation"
                                                                novalidate> -->
                                                                <div class="table-responsive">
                                                                    <table class="table table-bordered">
                                                                        <thead class="thead-light">
                                                                            <tr>
                                                                                <th scope="col" class="text-center"><i
                                                                                    class="fa-solid fa-check"></i></th>
                                                                                <th scope="col" class="text-center">UF</th>
                                                                                <th scope="col" class="text-center">Alíquota</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php foreach($lista_ICMS as $key_icms => $icms) { ?>
                                                                            <tr>
                                                                                <td>
                                                                                    <div class="checkbox text-center">
                                                                                        <input name="excluir_todos_icms[]"
                                                                                            type="checkbox"
                                                                                            value="<?= $icms->id ?>" />
                                                                                    </div>
                                                                                </td>
                                                                                <td class="text-center"><a href="#" class="text-dark"
                                                                                        data-toggle="modal"
                                                                                        data-target="#editar-icms<?= $icms->id ?>"><?= $icms->uf ?></a></td>
                                                                                <td class="text-center">
                                                                                    <?= number_format($icms->aliquota, 2, ',', '.') ?>%
                                                                                </td>
                                                                            </tr>
                                                                            <?php } ?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <?php if ($lista_ICMS == false) { ?>
                                                                <div class="text-center text-muted">
                                                                    <p class="font-italic mt-3">Nenhuma alíquota ICMS adicionada</p>
                                                                </div>
                                                                <?php } ?>
                                                            <!-- </form> -->
                                                        </div>
                                                        <div class="tab-pane fade" id="fcp">
                                                            <div class="row button-pane">
                                                                <div class="col-lg-12 col-md-12 col-xs-12 mb-0 mt-0">
                                                                    <button data-toggle="modal" data-target="#inserir-fcp"
                                                                        type="button" class="btn btn-outline-info btn-sm"><i
                                                                            class="fas fa-plus-circle"></i> Nova Alíquota
                                                                        FCP</button>
                                                                    <button data-toggle="modal" data-target="#elimina-fcp"
                                                                        type="button" class="btn btn-outline-danger btn-sm"
                                                                        id="excluirFCP" disabled><i
                                                                            class="fas fa-trash-alt"></i>
                                                                        Excluir</button>
                                                                </div>
                                                            </div>
                                                            <!-- <form
                                                                action="<?= base_url("fiscal/natureza-operacao/excluir-fcp/{$row->id}") ?>"
                                                                method="post" id="DeleteFCP" class="needs-validation"
                                                                novalidate> -->
                                                                <div class="table-responsive">
                                                                    <table class="table table-bordered">
                                                                        <thead class="thead-light">
                                                                            <tr>
                                                                                <th scope="col" class="text-center"><i
                                                                                    class="fa-solid fa-check"></i></th>
                                                                                <th scope="col" class="text-center">UF</th>
                                                                                <th scope="col">NCM</th>
                                                                                <th scope="col" class="text-center">Alíquota</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php foreach($lista_FCP as $key_fcp => $fcp) { ?>
                                                                            <tr>
                                                                                <td>
                                                                                    <div class="checkbox text-center">
                                                                                        <input name="excluir_todos_fcp[]"
                                                                                            type="checkbox"
                                                                                            value="<?= $fcp->id ?>" />
                                                                                    </div>
                                                                                </td>
                                                                                <td class="text-center"><a href="#" class="text-dark"
                                                                                        data-toggle="modal"
                                                                                        data-target="#editar-fcp<?= $fcp->id ?>"><?= $fcp->uf ?></a></td>
                                                                                <td><a href="#" class="text-dark"
                                                                                        data-toggle="modal"
                                                                                        data-target="#editar-fcp<?= $fcp->id ?>"><?= $fcp->desc_ncm ?></a></td>
                                                                                <td class="text-center">
                                                                                    <?= number_format($fcp->aliquota, 2, ',', '.') ?>%
                                                                                </td>
                                                                            </tr>
                                                                            <?php } ?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <?php if ($lista_FCP == false) { ?>
                                                                <div class="text-center text-muted">
                                                                    <p class="font-italic mt-3">Nenhuma alíquota FCP adicionada</p>
                                                                </div>
                                                                <?php } ?>
                                                            <!-- </form> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- IPI -->
                                        <div class="tab-pane fade" id="ipi">
                                            <div class="form-row mt-3">
                                                <div class="form-group col-md-3">
                                                    <label for="ipiCST">IPI CST</label>
                                                    <select class="form-control selectpicker show-tick"
                                                        data-style="btn-input-primary" id="ipiCST" name="ipiCST">
                                                        <option value="">-- Sem IPI --</option>
                                                        <?php foreach ($ipiCST as $key => $cst) { ?>
                                                        <option value="<?php echo $cst->id ?>"
                                                            <?php echo ($cst->id == $row->tb_fis_ipi_cst_id) ? 'selected="selected"' : '' ?>>
                                                            <?php echo $cst->codigo . ' - ' . $cst->nome ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="c_enq">Código de Enquadramento Legal do IPI</label>
                                                    <input type="text" class="form-control" id="c_enq" name='c_enq'
                                                        value="<?php echo $row->c_enq ?>">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="ipi_suspenso">IPI Suspenso</label>
                                                    <select class="form-control selectpicker show-tick"
                                                        data-style="btn-input-primary" id="ipi_suspenso"
                                                        name="ipi_suspenso">
                                                        <option value="0"
                                                            <?php if (!$row->ipi_suspenso) echo "selected"; ?>>Não
                                                        </option>
                                                        <option value="1"
                                                            <?php if ($row->ipi_suspenso == 1) echo "selected"; ?>>
                                                            Sim
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="ipi_integra_vbcicms">IPI integra a Base do
                                                        ICMS</label>
                                                    <select class="form-control selectpicker show-tick"
                                                        data-style="btn-input-primary" id="ipi_integra_vbcicms"
                                                        name="ipi_integra_vbcicms">
                                                        <option value="0"
                                                            <?php if (!$row->ipi_integra_vbcicms) echo "selected"; ?>>
                                                            Não
                                                        </option>
                                                        <option value="1"
                                                            <?php if ($row->ipi_integra_vbcicms == 1) echo "selected"; ?>>
                                                            Sim
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- PIS -->
                                        <div class="tab-pane fade" id="pis">
                                            <div class="form-row mt-3">
                                                <div class="form-group col-md-4">
                                                    <label for="pisCST">PIS CST</label>
                                                    <select class="form-control selectpicker show-tick"
                                                        data-style="btn-input-primary" id="pisCST" name="pisCST">
                                                        <?php foreach ($pisCofinsCST as $key => $cst) { ?>
                                                        <option value="<?php echo $cst->id ?>"
                                                            <?php echo ($cst->id == $row->tb_fis_pis_cst_id) ? 'selected="selected"' : '' ?>>
                                                            <?php echo $cst->codigo . ' - ' . $cst->nome ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputCodCentroCusto">Percentual PIS</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name='p_pis'
                                                            value="<?php echo $row->p_pis ?>" data-mask="##0,00"
                                                            data-mask-reverse="true">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="pis_exclui_icms_vbc ">Exclui ICMS da Base de Cálculo
                                                        do
                                                        PIS</label>
                                                    <select class="form-control selectpicker show-tick"
                                                        data-style="btn-input-primary" id="pis_exclui_icms_vbc"
                                                        name="pis_exclui_icms_vbc">
                                                        <option value=""
                                                            <?php if (!$row->pis_exclui_icms_vbc) echo "selected"; ?>>
                                                            Não
                                                        </option>
                                                        <option value="1"
                                                            <?php if ($row->pis_exclui_icms_vbc == 1) echo "selected"; ?>>
                                                            Sim
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- COFINS -->
                                        <div class="tab-pane fade" id="cofins">
                                            <div class="form-row mt-3">
                                                <div class="form-group col-md-4">
                                                    <label for="cofinsCST">COFINS CST</label>
                                                    <select class="form-control selectpicker show-tick"
                                                        data-style="btn-input-primary" id="cofinsCST" name="cofinsCST">
                                                        <?php foreach ($pisCofinsCST as $key => $cst) { ?>
                                                        <option value="<?php echo $cst->id ?>"
                                                            <?php echo ($cst->id == $row->tb_fis_cofins_cst_id) ? 'selected="selected"' : '' ?>>
                                                            <?php echo $cst->codigo . ' - ' . $cst->nome ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputCodCentroCusto">Percentual COFINS</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name='p_cofins'
                                                            value="<?php echo $row->p_cofins ?>" data-mask="##0,00"
                                                            data-mask-reverse="true">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="cofins_exclui_icms_vbc ">Exclui ICMS da Base de
                                                        Cálculo
                                                        do COFINS</label>
                                                    <select class="form-control selectpicker show-tick"
                                                        data-style="btn-input-primary" id="cofins_exclui_icms_vbc"
                                                        name="cofins_exclui_icms_vbc">
                                                        <option value=""
                                                            <?php if (!$row->cofins_exclui_icms_vbc) echo "selected"; ?>>
                                                            Não
                                                        </option>
                                                        <option value="1"
                                                            <?php if ($row->cofins_exclui_icms_vbc == 1) echo "selected"; ?>>
                                                            Sim
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="mb-3">
                                    <div class="row float-right">
                                        <div class="col-lg-12 col-md-12 col-xs-12">
                                            <button type="submit" class="btn btn-primary" name="Opcao" value="salvar"><i
                                                    class="fas fa-save"></i> Salvar
                                            </button>
                                            <a href="<?php echo base_url() ?>fiscal/natureza-operacao"
                                                class="btn btn-secondary">Cancelar</a>
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

<div class="modal fade" id="elimina-fcp" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Eliminar alíquota FCP</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Confirma eliminação das alíquotas FCPs selecionadas?
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger" form="DeleteFCP">Confirma</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="variaveis-informacoes" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Variáveis das Informações Complementares</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-dark font-italic">Para exibir valores nas informações complementares, usar as variáveis
                    listadas abaixo (inclusive
                    colchetes)</p>
                <h4 class="mt-3"><strong>Impostos</strong></h4>
                <hr>
                <table class="table table-bordered table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Variavel</th>
                            <th scope="col">Utilização</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-info">[VALOR_CREDITO_ICMS]</td>
                            <td>Valor total do crédito do ICMS (somente contribuintes do SIMPLES)</td>
                        </tr>
                        <tr>
                            <td class="text-info">[ALIQUOTA_CREDITO_ICMS]</td>
                            <td>Alíquota de crédito do ICMS (somente contribuintes do SIMPLES)</td>
                        </tr>
                        <tr>
                            <td class="text-info">[VALOR_FCP]</td>
                            <td>Valor total do FCP</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="inserir-fcp">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nova alíquota FCP</h5>
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
                                        <form action="<?= base_url("fiscal/natureza-operacao/novo-fcp/{$row->id}") ?>" method='post'
                                            id='formFCP' class="needs-validation" novalidate>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="inputNCM">NCM</label>
                                                    <select id="inputNCM" name="NCM" data-style="btn-input-primary"
                                                        class="selectpicker show-tick form-control" data-live-search="true"
                                                        data-actions-box="true" title="Informe a NCM do Produto">
                                                        <?php foreach($lista_ncm as $key_ncm => $ncm) { ?>
                                                        <option value="<?= $ncm->cod_ncm ?>">
                                                            <?= substr($ncm->desc_ncm, 0, 102) ?>
                                                        </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-8">
                                                    <label for="inputUF">Estado (UF)</label>
                                                    <select id="inputUF" name="UF" data-style="btn-input-primary"
                                                        class="selectpicker show-tick form-control" data-live-search="true"
                                                        data-actions-box="true" title="Informe a UF">
                                                        <?php foreach($lista_estado as $key_estado => $estado) { ?>
                                                        <option value="<?= $estado->uf ?>">
                                                            <?php echo $estado->uf . " - " . $estado->nome; ?>
                                                        </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputAliquotaFCP">Alíquota FCP <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <input type="text" id="inputAliquotaFCP" class="form-control" data-mask="#.##0,00"
                                                            data-mask-reverse="true" name="AliquotaFCP"
                                                            value="<?= set_value('AliquotaFCP') ?>" required>
                                                            <div class="input-group-append">
                                                            <span class="input-group-text">%</span>
                                                        </div>
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
                <button type="submit" class="btn btn-primary" form="formFCP"><i class="fas fa-save"></i>
                    Salvar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="inserir-icms">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nova alíquota ICMS</h5>
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
                                        <form action="<?= base_url("fiscal/natureza-operacao/novo-icms/{$row->id}") ?>" method='post'
                                            id='formICMS' class="mb-0 needs-validation" novalidate>
                                            <div class="form-row">
                                                <div class="form-group col-md-8">
                                                    <label for="inputUF">Estado (UF)</label>
                                                    <select id="inputUF" name="UF" data-style="btn-input-primary"
                                                        class="selectpicker show-tick form-control" data-live-search="true"
                                                        data-actions-box="true" title="Informe a UF">
                                                        <?php foreach($lista_estado as $key_estado => $estado) { ?>
                                                        <option value="<?= $estado->uf ?>">
                                                            <?php echo $estado->uf . " - " . $estado->nome; ?>
                                                        </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputAliquotaICMS">Alíquota ICMS <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <input type="text" id="inputAliquotaICMS" class="form-control" data-mask="#.##0,00"
                                                            data-mask-reverse="true" name="AliquotaICMS"
                                                            value="<?= set_value('AliquotaICMS') ?>" required>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">%</span>
                                                        </div>
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
                <button type="submit" class="btn btn-primary" form="formICMS"><i class="fas fa-save"></i>
                    Salvar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<?php foreach($lista_FCP as $key_fcp => $fcp) { ?>
<div class="modal fade" id="editar-fcp<?= $fcp->id ?>">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar alíquota FCP</h5>
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
                                        <form action="<?= base_url("fiscal/natureza-operacao/salvar-fcp/{$fcp->id}") ?>" method='post'
                                            id='formFCPEdit<?= $fcp->id ?>' class="needs-validation" novalidate>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="inputNCMEdit">NCM</label>
                                                    <input type="text" id="inputNCMEdit" class="form-control"
                                                        value="<?= $fcp->desc_ncm ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-8">
                                                    <label for="inputUFEdit">Estado (UF)</label>
                                                    <input type="text" id="inputUFEdit" class="form-control"
                                                        value="<?php echo $fcp->uf . " - " . $fcp->estado; ?>" readonly>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputAliquotaFCPEdit">Alíquota FCP <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <input type="text" id="inputAliquotaFCPEdit" class="form-control"
                                                            data-mask="#.##0,00" data-mask-reverse="true" name="AliquotaFCPEdit"
                                                            value="<?= number_format($fcp->aliquota, 2, ',', '.') ?>" required>
                                                            <div class="input-group-append">
                                                            <span class="input-group-text">%</span>
                                                        </div>
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
                <button type="submit" class="btn btn-primary" form="formFCPEdit<?= $fcp->id ?>"><i
                        class="fas fa-save"></i>
                    Salvar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<?php foreach($lista_ICMS as $key_icms => $icms) { ?>
<div class="modal fade" id="editar-icms<?= $icms->id ?>">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar alíquota ICMS</h5>
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
                                        <form action="<?= base_url("fiscal/natureza-operacao/salvar-icms/{$icms->id}") ?>" method='post'
                                            id='formICMSEdit<?= $icms->id ?>' class="needs-validation mb-0" novalidate>
                                            <div class="form-row">
                                                <div class="form-group col-md-8">
                                                    <label for="inputUFEdit">Estado (UF)</label>
                                                    <input type="text" id="inputUFEdit" class="form-control"
                                                        value="<?php echo $icms->uf . " - " . $icms->estado; ?>" readonly>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputAliquotaFCPEdit">Alíquota ICMS <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <input type="text" id="inputAliquotaICMSEdit" class="form-control"
                                                            data-mask="#.##0,00" data-mask-reverse="true" name="AliquotaICMSEdit"
                                                            value="<?= number_format($icms->aliquota, 2, ',', '.') ?>" required>
                                                            <div class="input-group-append">
                                                            <span class="input-group-text">%</span>
                                                        </div>
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
                <button type="submit" class="btn btn-primary" form="formICMSEdit<?= $icms->id ?>"><i
                        class="fas fa-save"></i>
                    Salvar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<script>
$(function() {
    $.applyDataMask();
});

$("[name='excluir_todos_fcp[]']").click(function() {
    var cont = $("[name='excluir_todos_fcp[]']:checked").length;
    $("#excluirFCP").prop("disabled", cont ? false : true);
});
</script>

<?php $this->load->view('gerais/footer'); ?>