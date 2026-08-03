<?php $this->load->view('gerais/header' , $menu); ?>
<?php $this->load->view('gerais/menu-vendedor', $menu); ?>

<section>
    <div class="container container-vendedor">
        <div class="row">
            <div class="col-md-12">
                <div class="row mb-2">
                    <div class="col-md-12">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <a href="<?= base_url("vendas/atendimentos-vendedor/{$diaAnterior}") ?>"
                                    class="btn btn-secondary link-load"><i
                                        class="fas fa-angle-left"></i></a>
                            </div>
                            <input type="text" class="form-control search text-center filtro-data"
                                value="<?= $descDia ?> de <?= $descMes ?> de <?= $descAno ?>" name="dataCaixa" readonly>
                            <div class="input-group-append">
                                <a href="<?= base_url("vendas/atendimentos-vendedor/{$diaSeguinte}") ?>"
                                    class="btn btn-secondary link-load"><i
                                        class="fas fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-12">
                        <form action="<?= base_url('vendas/pedido-venda-vendedor') ?>" method="GET"
                            class=" needs-validation mb-0" novalidate>
                            <div class="input-group">
                                <input type="text" class="form-control search" name="buscar">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-secondary"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>                
                <div class="row">
                    <div class="col-md-12">
                        <a href="<?php echo base_url() ?>vendas/novo-atendimento-vendedor"
                            type="button" class="btn btn-block btn-info mb-2 link-load"><i class="fas fa-plus-circle"></i> Novo
                            Atendimento</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
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
                        <div class="list-group mb-2">
                            <?php foreach($lista_notas as $key_notas => $nota) { ?>
                            <a href="<?= base_url("vendas/pedido-venda-vendedor/editar-pedido-venda-vendedor/{$nota->cod_nota_cliente}") ?>"
                                class="list-group-item list-group-item-action flex-column align-items-start link-load">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-0"><strong><?= $nota->cod_cliente ?> -
                                            <?= $nota->nome_cliente ?></strong></h5>
                                </div>
                                <h6 class="mb-3">
                                    <span class="text-muted"><i>
                                    <?php
                                        switch($nota->tipo_contato) {
                                            case 1:
                                                echo "Visita";
                                                break;
                                            case 2:
                                                echo "Reunião";
                                                break;
                                            case 3:
                                                echo "Telefone/WhatsApp";
                                                break;
                                            case 4:
                                                echo "E-mail";
                                                break;                                            
                                        }                                    
                                    ?>
                                </i></span>
                                </h6>
                                <p class="mb-0 lead font-weight-bold text-warning"><?= $nota->titulo ?></p>
                                <p class="mb-2 lead"><i><?= $nota->comentario ?></i></p>
                            </a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?php if ($lista_notas == false) { ?>
                        <div class="text-center text-dark">
                            <p class="font-italic mt-5">Nenhuma atendimento para este dia
                            </p>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
$('.page-item>a').addClass("page-link");

$("[name='excluir_todos[]']").click(function() {
    var cont = $("[name='excluir_todos[]']:checked").length;
    $("#btnExcluir").prop("disabled", cont ? false : true);
});

$('#inputDataAtendimento').datepicker({
    uiLibrary: 'bootstrap4'
});
</script>

<?php $this->load->view('gerais/footer-vendedor'); ?>