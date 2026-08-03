<?php $this->load->view('gerais/header' , $menu); ?>
<?php $this->load->view('gerais/menu-vendedor', $menu); ?>

<section>
    <div class="container container-vendedor">
        <div class="row">
            <div class="col-md-12">
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
                        <form class="mb-0 needs-validation" novalidate
                            action="<?= base_url('vendas/novo-atendimento-vendedor') ?>"
                            method="POST" id="Atendimento">
                            <div class="form-row">
                                <div class="form-group col-md-9">
                                    <label for="inputTipoContato">Tipo de Contato <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <select id="inputTipoContato" class="selectpicker show-tick form-control"
                                            data-actions-box="true"
                                            data-style="btn-input-primary" name="TipoContato" required>
                                            <option value="1">Visita</option>
                                            <option value="2">Reunião</option>
                                            <option value="3">Telefone/WhatsApp</option>
                                            <option value="4">E-mail</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-9">
                                    <label for="inputCliente">Cliente <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <select id="inputCliente" class="selectpicker show-tick form-control"
                                            data-live-search="true" data-actions-box="true" title=" "
                                            data-style="btn-input-primary" name="CodCliente" required>
                                            <?php foreach($lista_cliente as $key_cliente => $cliente) { ?>
                                            <option value="<?= $cliente->cod_cliente ?>" class="limit-text-50"
                                                <?php if($cliente->cod_cliente == set_value('CodCliente')) echo "selected"; ?>>
                                                <?= $cliente->cod_cliente ?> -
                                                <?= $cliente->nome_cliente ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputDataNota">Data do Atendimento <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="inputDataNota" name="DataNota"
                                        value="<?php if(set_value('DataNota') == ""){
                                                                echo str_replace('-', '/', date("d-m-Y"));
                                                            }else{ echo set_value('DataNota'); } ?>" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Assunto <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="Assunto" id="inputAssunto"
                                            value="<?= set_value('Assunto'); ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputComentarios">Comentários <span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control" rows="6" id="inputComentarios"
                                        name="Comentarios"><?= set_value('Comentarios'); ?></textarea>
                                </div>
                            </div>                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <hr class="mb-3">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-12">
                        <button type="submit" form="Atendimento" class="btn btn-primary btn-block mb-2" name="Opcao"
                            value="salvar"><i class="fas fa-save"></i> Salvar</button>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-12">
                        <a href="<?php echo base_url() ?>vendas/atendimentos-vendedor"
                            class="btn btn-secondary btn-block link-load">Cancelar</a>
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

$('#inputDataNota').datepicker({
    uiLibrary: 'bootstrap4'
});

</script>

<?php $this->load->view('gerais/footer-vendedor'); ?>