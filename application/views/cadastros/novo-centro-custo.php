<?php $this->load->view('gerais/header' , $menu); ?>
<?php $this->load->view('gerais/menu', $menu); ?>

<section>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('visao-geral') ?>">Visão Geral</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>centro-custo">Centro de Custo</a></li>
            <li class="breadcrumb-item active">Novo Centro de Custo</li>
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
                                <form action='novo-centro-custo' method='post' class="needs-validation" novalidate>
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="inputCodCentroCusto">Código Centro de Custo <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="inputCodCentroCusto" oninput="handleInput(event)"
                                                name='CodCentroCusto' value="<?= set_value('CodCentroCusto'); ?>" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputNomeCentroCusto">Nome do Centro de Custo <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="inputNomeCentroCusto"
                                                name='NomeCentroCusto' value="<?= set_value('NomeCentroCusto'); ?>" required>
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
                                    <hr class="mb-3">
                                    <div class="row float-right">
                                        <div class="col-lg-12 col-md-12 col-xs-12">
                                            <button type="submit" class="btn btn-primary" name="Opcao" value="salvar"><i
                                                    class="fas fa-save"></i> Salvar</button>
                                            <button type="submit" class="btn btn-info" name="Opcao"
                                                value="salvarContinuar">Salvar e Continuar</button>
                                            <a href="<?php echo base_url() ?>centro-custo"
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
});  

function handleInput(e) {
    var ss = e.target.selectionStart;
    var se = e.target.selectionEnd;
    e.target.value = e.target.value.toUpperCase().replace(/\s/g, '');
    e.target.selectionStart = ss;
    e.target.selectionEnd = se;
}

</script>

<?php $this->load->view('gerais/footer'); ?>