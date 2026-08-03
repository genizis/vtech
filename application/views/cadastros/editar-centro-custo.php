<?php $this->load->view('gerais/header', $menu); ?>
<?php $this->load->view('gerais/menu', $menu); ?>

<section>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('visao-geral') ?>">Visão Geral</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>centro-custo">Centro de Custo</a></li>
            <li class="breadcrumb-item active">Editar Centro de Custo</li>
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
                                <form class="mb-0 needs-validation" novalidate action="<?= base_url("centro-custo/editar-centro-custo/{$centro_custo->cod_centro_custo}") ?>" method='post' id="CentroCusto">
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="inputCodCentroCusto">Código Centro de Custo <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="inputCodCentroCusto" name='CodCentroCusto' value="<?= $centro_custo->cod_centro_custo ?>" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputNomeCentroCusto">Nome do Centro de Custo <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="inputNomeCentroCusto" name='NomeCentroCusto' value="<?= $centro_custo->nome_centro_custo ?>" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Situação</label>
                                            <div class="btn-group btn-block" data-toggle="buttons">
                                                <label class="btn btn-outline-primary">
                                                    <input type="radio" id="radioAtivo" name="Ativo" value="1" <?php if ($centro_custo->ativo == 1) echo "checked";  ?>> Ativa
                                                </label>
                                                <label class="btn btn-outline-primary">
                                                    <input type="radio" id="radioInativo" name="Ativo" value="2" <?php if ($centro_custo->ativo == 2) echo "checked";  ?>> Inativa
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label>Habiltar Utilização</label>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="btn-group-toggle" data-toggle="buttons">
                                                        <label class="btn btn-outline-primary active btn-block">
                                                            <input type="checkbox" <?php if ($centro_custo->mov_entrada == 1) echo "checked" ?> autocomplete="off" name="MovEntrada" value="1">
                                                            <i class="fa-solid fa-check"></i> Receita
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="btn-group-toggle" data-toggle="buttons">
                                                        <label class="btn btn-outline-primary active btn-block">
                                                            <input type="checkbox" <?php if ($centro_custo->mov_saida == 1) echo "checked" ?> autocomplete="off" name="MovSaida" value="1">
                                                            <i class="fa-solid fa-check"></i> Despesa
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h6>Orçamentos da Conta</h6>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-xs-12 mb-0">
                                                <button data-toggle="modal" data-target="#inserir-orcamento" type="button" class="btn btn-outline-info btn-sm"><i class="fas fa-plus-circle"></i> Novo
                                                    Orçamento</button>
                                                <button data-toggle="modal" data-target="#elimina-orcamento" type="button" class="btn btn-outline-danger btn-sm" id="excluirOrcamento" disabled><i class="fas fa-trash-alt"></i>
                                                    Excluir</button>
                                            </div>
                                        </div>
                                        <form action="<?= base_url("centro-custo/excluir-orcamento/{$centro_custo->cod_centro_custo}") ?>" method="POST" id="DeleteOrcamento" class="needs-validation" novalidate>
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th scope="col" class="text-center"><i class="fa-solid fa-check"></i></th>
                                                            <th scope="col" class="text-center">Ano</th>
                                                            <th scope="col">Conta contábil</th>
                                                            <th scope="col" class="text-right">Total orçado</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($lista_orcamento as $key_orcamento => $orcamento) { ?>
                                                            <tr>
                                                                <td>
                                                                    <div class="checkbox text-center">
                                                                        <input name="excluir_todos[]" type="checkbox" value="<?= $orcamento->seq_orcamento ?>" />
                                                                    </div>
                                                                </td>
                                                                <td class="text-center"><a href="#" class="text-dark" data-toggle="modal" data-target="#editar-orcamento<?= $orcamento->seq_orcamento ?>">
                                                                        <?= $orcamento->ano ?>
                                                                    </a>
                                                                </td>
                                                                <td><?php if ($orcamento->cod_conta_contabil != null) echo $orcamento->cod_conta_contabil . ' - ' . $orcamento->nome_conta_contabil ?></td>
                                                                <td class="text-right text-info">R$ <?= number_format($orcamento->total_orcado, 2, ',', '.') ?></td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <?php if ($lista_orcamento == false) { ?>
                                                <div class="text-center text-muted">
                                                    <p class="font-italic mt-3">Nenhum orçamento adicionado</p>
                                                </div>
                                            <?php } ?>
                                        </form>
                                    </div>
                                </div>
                                <hr class="mb-3">
                                <div class="row float-right">
                                    <div class="col-lg-12 col-md-12 col-xs-12">
                                        <button type="submit" class="btn btn-primary" form="CentroCusto" name="Opcao" value="salvar"><i class="fas fa-save"></i> Salvar</button>
                                        <a href="<?php echo base_url() ?>centro-custo" class="btn btn-secondary link-load">Cancelar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="elimina-orcamento" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Eliminar orçamento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Confirma eliminação dos orçamentos selecionados?
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger" form="DeleteOrcamento">Confirma</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="inserir-orcamento">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Novo orçamento</h5>
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
                                        <form action="<?= base_url("centro-custo/inserir-orcamento/{$centro_custo->cod_centro_custo}") ?>" method='post' id='formOrcamento' class="needs-validation mb-0" novalidate>
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label for="inputAno">Ano</label>
                                                    <input type="text" id="inputAno" class="form-control" name="Ano" data-mask="0000" data-mask-reverse="true" value="<?= set_value('Ano'); ?>" required>
                                                </div>
                                                <div class="form-group col-md-9">
                                                    <label>Conta Contábil</label>
                                                    <select class="selectpicker show-tick form-control" data-live-search="true" data-actions-box="true" title=" " name="CodContaContabil" data-style="btn-input-primary">
                                                        <?php foreach ($lista_conta_contabil as $key_conta_contabil => $conta_contabil) { ?>
                                                            <option value="<?= $conta_contabil->cod_conta_contabil ?>" <?php if ($conta_contabil->cod_conta_contabil == set_value('CodContaContabil')) echo "selected"; ?>>
                                                                <?= $conta_contabil->cod_conta_contabil ?> -
                                                                <?= $conta_contabil->nome_conta_contabil ?>
                                                            </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label>Janeiro</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$</span>
                                                        </div>
                                                        <input type="text" class="form-control" data-mask="#.##0,00" data-mask-reverse="true" name="Jan" id="inputJan" value="<?= set_value('Jan'); ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>Fevereiro</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$</span>
                                                        </div>
                                                        <input type="text" class="form-control" data-mask="#.##0,00" data-mask-reverse="true" name="Fev" id="inputFev" value="<?= set_value('Fev'); ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>Março</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$</span>
                                                        </div>
                                                        <input type="text" class="form-control" data-mask="#.##0,00" data-mask-reverse="true" name="Mar" id="inputMar" value="<?= set_value('Mar'); ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>Abril</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$</span>
                                                        </div>
                                                        <input type="text" class="form-control" data-mask="#.##0,00" data-mask-reverse="true" name="Abr" id="inputAbr" value="<?= set_value('Abr'); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label>Maio</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$</span>
                                                        </div>
                                                        <input type="text" class="form-control" data-mask="#.##0,00" data-mask-reverse="true" name="Mai" id="inputMai" value="<?= set_value('Mai'); ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>Junho</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$</span>
                                                        </div>
                                                        <input type="text" class="form-control" data-mask="#.##0,00" data-mask-reverse="true" name="Jun" id="inputJun" value="<?= set_value('Jun'); ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>Julho</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$</span>
                                                        </div>
                                                        <input type="text" class="form-control" data-mask="#.##0,00" data-mask-reverse="true" name="Jul" id="inputJul" value="<?= set_value('Jul'); ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>Agosto</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$</span>
                                                        </div>
                                                        <input type="text" class="form-control" data-mask="#.##0,00" data-mask-reverse="true" name="Ago" id="inputAgo" value="<?= set_value('Jun'); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label>Setembro</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$</span>
                                                        </div>
                                                        <input type="text" class="form-control" data-mask="#.##0,00" data-mask-reverse="true" name="Set" id="inputSet" value="<?= set_value('Set'); ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>Outubro</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$</span>
                                                        </div>
                                                        <input type="text" class="form-control" data-mask="#.##0,00" data-mask-reverse="true" name="Out" id="inputOut" value="<?= set_value('Out'); ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>Novembro</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$</span>
                                                        </div>
                                                        <input type="text" class="form-control" data-mask="#.##0,00" data-mask-reverse="true" name="Nov" id="inputNov" value="<?= set_value('Nov'); ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>Dezembro</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$</span>
                                                        </div>
                                                        <input type="text" class="form-control" data-mask="#.##0,00" data-mask-reverse="true" name="Dez" id="inputDez" value="<?= set_value('Dez'); ?>">
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
                <button type="submit" class="btn btn-primary" form="formOrcamento"><i class="fas fa-save"></i>
                    Salvar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<?php foreach ($lista_orcamento as $key_orcamento => $orcamento) { ?>
    <div class="modal fade" id="editar-orcamento<?= $orcamento->seq_orcamento ?>">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar orçamento</h5>
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
                                            <form action="<?= base_url("centro-custo/salvar-orcamento/{$centro_custo->cod_centro_custo}/{$orcamento->seq_orcamento}") ?>" method='post' id='formOrcamentoEdit<?= $orcamento->seq_orcamento ?>' class="needs-validation mb-0" novalidate>
                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        <label for="inputAno">Ano</label>
                                                        <input type="text" id="inputAno" class="form-control" name="Ano" data-mask="0000" readonly data-mask-reverse="true" value="<?= $orcamento->ano ?>">
                                                    </div>
                                                    <div class="form-group col-md-9">
                                                        <label for="inputContaContabil">Conta Contábil</label>
                                                        <input type="text" id="inputContaContabil" class="form-control" name="Ano" readonly data-mask-reverse="true" value="<?php if($orcamento->cod_conta_contabil != null) echo $orcamento->cod_conta_contabil . " - " . $orcamento->nome_conta_contabil; ?>">
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        <label>Janeiro</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">R$</span>
                                                            </div>
                                                            <input type="text" class="form-control" data-mask="#.##0,00" data-mask-reverse="true" name="Jan" id="inputJanAlt" value="<?= $orcamento->janeiro ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label>Fevereiro</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">R$</span>
                                                            </div>
                                                            <input type="text" class="form-control" data-mask="#.##0,00" data-mask-reverse="true" name="Fev" id="inputFevAlt" value="<?= $orcamento->fevereiro ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label>Março</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">R$</span>
                                                            </div>
                                                            <input type="text" class="form-control" data-mask="#.##0,00" data-mask-reverse="true" name="Mar" id="inputMarAlt" value="<?= $orcamento->marco ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label>Abril</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">R$</span>
                                                            </div>
                                                            <input type="text" class="form-control" data-mask="#.##0,00" data-mask-reverse="true" name="Abr" id="inputAbrAlt" value="<?= $orcamento->abril ?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        <label>Maio</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">R$</span>
                                                            </div>
                                                            <input type="text" class="form-control" data-mask="#.##0,00" data-mask-reverse="true" name="Mai" id="inputMaiAlt" value="<?= $orcamento->maio ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label>Junho</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">R$</span>
                                                            </div>
                                                            <input type="text" class="form-control" data-mask="#.##0,00" data-mask-reverse="true" name="Jun" id="inputJunAlt" value="<?= $orcamento->junho ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label>Julho</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">R$</span>
                                                            </div>
                                                            <input type="text" class="form-control" data-mask="#.##0,00" data-mask-reverse="true" name="Jul" id="inputJulAlt" value="<?= $orcamento->julho ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label>Agosto</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">R$</span>
                                                            </div>
                                                            <input type="text" class="form-control" data-mask="#.##0,00" data-mask-reverse="true" name="Ago" id="inputAgoAlt" value="<?= $orcamento->agosto ?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        <label>Setembro</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">R$</span>
                                                            </div>
                                                            <input type="text" class="form-control" data-mask="#.##0,00" data-mask-reverse="true" name="Set" id="inputSetAlt" value="<?= $orcamento->setembro ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label>Outubro</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">R$</span>
                                                            </div>
                                                            <input type="text" class="form-control" data-mask="#.##0,00" data-mask-reverse="true" name="Out" id="inputOutAlt" value="<?= $orcamento->outubro ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label>Novembro</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">R$</span>
                                                            </div>
                                                            <input type="text" class="form-control" data-mask="#.##0,00" data-mask-reverse="true" name="Nov" id="inputNovAlt" value="<?= $orcamento->novembro ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label>Dezembro</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">R$</span>
                                                            </div>
                                                            <input type="text" class="form-control" data-mask="#.##0,00" data-mask-reverse="true" name="Dez" id="inputDezAlt" value="<?= $orcamento->dezembro ?>" required>
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
                    <button type="submit" class="btn btn-primary" form="formOrcamentoEdit<?= $orcamento->seq_orcamento ?>"><i class="fas fa-save"></i>
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

    $("[name='excluir_todos[]']").click(function() {
        var cont = $("[name='excluir_todos[]']:checked").length;
        $("#excluirOrcamento").prop("disabled", cont ? false : true);
    });
</script>

<?php $this->load->view('gerais/footer'); ?>