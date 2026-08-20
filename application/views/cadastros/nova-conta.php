<?php $this->load->view('gerais/header' , $menu); ?>
<?php $this->load->view('gerais/menu', $menu); ?>

<section>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('visao-geral') ?>">Visão Geral</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>conta">Conta</a></li>
            <li class="breadcrumb-item active">Nova Conta</li>
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
                                <?php if ($this->session->flashdata('erro') <> ""){ ?>
                                <div class="alert alert-danger alert-dismissible fade show" id="alert" role="alert">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>Atenção!</strong> <?= $this->session->flashdata('erro') ?>
                                </div>
                                <?php } $this->session->set_flashdata('erro', ''); ?>
                                <?php if ($this->session->flashdata('sucesso') <> ""){ ?>
                                <div class="alert alert-success alert-dismissible fade show" id="alert" role="alert">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>Muito bem!</strong>
                                    <?= $this->session->flashdata('sucesso') ?>
                                </div>
                                <?php } $this->session->set_flashdata('sucesso', ''); ?>                                
                                <form action='nova-conta' method='post' class="needs-validation" novalidate>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputEstabelecimento">Estabelecimento <span class="text-danger">*</span></label>
                                            <select id="inputEstabelecimento" name="IdEstabelecimento"
                                                class="selectpicker show-tick form-control" data-live-search="true"
                                                data-style="btn-input-primary" title="Selecione um Estabelecimento" required>
                                                <?php foreach($lista_estabelecimento as $estabelecimento) { ?>
                                                <option value="<?= $estabelecimento->id_estabelecimento ?>"
                                                    <?= set_select('IdEstabelecimento', $estabelecimento->id_estabelecimento) ?>>
                                                    <?= $estabelecimento->id_estabelecimento ?> - <?= html_escape($estabelecimento->nome_estabelecimento) ?>
                                                    (<?= (int)$estabelecimento->tipo_estabelecimento === 1 ? 'Matriz' : 'Filial' ?>)
                                                </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label for="inputNomeConta">Nome da Conta <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="inputNomeConta"
                                                name='NomeConta' value="<?= set_value('NomeConta'); ?>" required>
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
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label class="control-label" for="inputSaldoInicial">Saldo Inicial</label>
                                            <div class="input-group">                                                
                                                <select id="inputTipoSaldo" class="selectpicker show-tick form-control"
                                                        data-actions-box="true" data-style="btn-input-primary" name="TipoSaldo">
                                                    <option value="1">Credor</option>
                                                    <option value="2">Devedor</option>
                                                </select>
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">R$</span>
                                                </div>
                                                <input type="text" class="form-control" class="form-control"
                                                    id="inputSaldoInicial" type="text" name="SaldoInicial" data-mask="#.##0,00" data-mask-reverse="true"
                                                    value="<?= set_value('SaldoInicial'); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="mb-3">
                                    <div class="row float-right">
                                        <div class="col-lg-12 col-md-12 col-xs-12">
                                            <button type="submit" class="btn btn-primary" name="Opcao" value="salvar"><i
                                                    class="fas fa-save"></i> Salvar</button>
                                            <button type="submit" class="btn btn-info" name="Opcao"
                                                value="salvarContinuar">Salvar e Continuar</button>
                                            <a href="<?php echo base_url() ?>conta"
                                                class="btn btn-secondary link-load">Cancelar</a>
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
     $('#inputEstabelecimento').selectpicker({style: 'btn-input-primary'});
});    
</script>

<?php $this->load->view('gerais/footer'); ?>
