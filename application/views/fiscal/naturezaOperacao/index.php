<?php $this->load->view('gerais/header' , $menu); ?>
<?php $this->load->view('gerais/menu', $menu); ?>

<section>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('visao-geral') ?>">Visão Geral</a></li>
            <li class="breadcrumb-item active">Natureza de Operação</li>
        </ol>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card  mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <a href="<?php echo base_url() ?>fiscal/natureza-operacao/inserir" type="button"
                                    class="btn btn-info link-load"><i class="fas fa-plus-circle"></i> Nova Natureza de Operação</a>
                                <button data-toggle="modal" data-target="#elimina-natureza" type="button"
                                    class="btn btn-danger" disabled id="btnExcluir"><i class="fas fa-trash-alt"></i> Excluir</button>
                            </div>
                            <div class="col-md-4">
                                <form action="<?php echo base_url($baseURL) ?>" method="GET" class="needs-validation" novalidate>
                                    <div class="input-group">
                                        <input type="text" class="form-control search" name="buscar" value="<?= $filter ?>">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-secondary"><i
                                                    class="fas fa-search"></i> Buscar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-xs-12">
                                <?php if ($this->session->flashdata('erro') <> ""){ ?>
                                <div class="alert alert-danger alert-dismissible fade show" id="alert" role="alert">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>Atenção!</strong> <?php echo $this->session->flashdata('erro') ?>
                                </div>
                                <?php } $this->session->set_flashdata('erro', ''); ?>
                                <?php if ($this->session->flashdata('sucesso') <> ""){ ?>
                                <div class="alert alert-success alert-dismissible fade show" id="alert" role="alert">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>Muito bem!</strong>
                                    <?php echo $this->session->flashdata('sucesso') ?>
                                </div>
                                <?php } $this->session->set_flashdata('sucesso', ''); ?>
                                <form action="<?php echo base_url('fiscal/natureza-operacao/excluir-natureza') ?>" method="POST" id="formDelete" class="mb-0 needs-validation" novalidate>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th scope="col" class="text-center"><i
                                                                    class="fa-solid fa-check"></i></th>
                                                    <th scope="col" class="text-left">Natureza de operação</th>
                                                    <th scope="col">Descrição interna</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($rows as $key => $row) { ?>
                                                <tr>
                                                <td>
                                                    <div class="checkbox text-center">
                                                    <input name="excluir_todos[]" type="checkbox" <?php if($row->count_nat > 0) echo "disabled"; ?>
                                                            value="<?php echo $row->id ?>"/>
                                                    </div>
                                                </td>
                                                <td class="text-left"><a class="text-dark link-load" href="<?php echo base_url($baseURL."/editar/{$row->id}") ?>"><?php echo $row->id?> - <?php echo $row->nome ?></a></td>
                                                <td scope="row"><?php echo $row->descricao ?></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <?php if ($rows == false) { ?>
                                    <div class="text-center text-muted">
                                        <p class="font-italic mt-3">Nenhuma natureza de operação encontrada</p>
                                    </div>
                                    <?php } ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if($pagination != null){ ?>
                <div class="card  mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div>
                                    <?= $pagination; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="elimina-natureza" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Eliminar natureza</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Confirma eliminação das naturezas selecionadas?
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger" form="formDelete">Confirma</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<script>
$('.page-item>a').addClass("page-link");

$("[name='excluir_todos[]']").click(function() {
    var cont = $("[name='excluir_todos[]']:checked").length;
    $("#btnExcluir").prop("disabled", cont ? false : true);
});
</script>

<?php $this->load->view('gerais/footer'); ?>
