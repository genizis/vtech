<?php $this->load->view('gerais/header' , $menu); ?>
<?php $this->load->view('gerais/menu', $menu); ?>

<section>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('visao-geral') ?>">Visão Geral</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>conta">Conta</a></li>
            <li class="breadcrumb-item active">Editar Conta</li>
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
                                <form action="<?= base_url("conta/editar-conta/{$conta->cod_conta}") ?>"
                                      method='post' class="needs-validation" novalidate>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputEstabelecimento">Estabelecimento <span class="text-danger">*</span></label>
                                            <select id="inputEstabelecimento" name="IdEstabelecimento"
                                                class="selectpicker show-tick form-control" data-live-search="true"
                                                data-style="btn-input-primary" title="Selecione um Estabelecimento" required>
                                                <?php foreach($lista_estabelecimento as $estabelecimento) { ?>
                                                <option value="<?= $estabelecimento->id_estabelecimento ?>"
                                                    <?= (int)$conta->id_estabelecimento === (int)$estabelecimento->id_estabelecimento ? 'selected' : '' ?>>
                                                    <?= $estabelecimento->id_estabelecimento ?> - <?= html_escape($estabelecimento->nome_estabelecimento) ?>
                                                    (<?= (int)$estabelecimento->tipo_estabelecimento === 1 ? 'Matriz' : 'Filial' ?>)
                                                </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label for="inputNomeConta">Nome da Conta <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="inputNomeConta"
                                                name='NomeConta' value="<?= $conta->nome_conta ?>" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Situação</label>
                                            <div class="btn-group btn-block" data-toggle="buttons">
                                                <label class="btn btn-outline-primary">
                                                    <input type="radio" id="radioAtivo" name="Ativo" value="1" <?php if ($conta->ativo == 1) echo "checked";  ?>> Ativa
                                                </label>
                                                <label class="btn btn-outline-primary">
                                                    <input type="radio" id="radioInativo" name="Ativo" value="2" <?php if ($conta->ativo == 2) echo "checked";  ?>> Inativa
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="mb-3">
                                    <div class="row float-right">
                                        <div class="col-lg-12 col-md-12 col-xs-12">
                                            <button type="submit" class="btn btn-primary" name="Opcao" value="salvar"><i
                                                    class="fas fa-save"></i> Salvar</button>
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
