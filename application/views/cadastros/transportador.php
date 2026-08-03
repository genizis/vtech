<?php $this->load->view('gerais/header' , $menu); ?>
<?php $this->load->view('gerais/menu', $menu); ?>

<section>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('visao-geral') ?>">Visão Geral</a></li>
            <li class="breadcrumb-item active">Transportador</li>
        </ol>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <a href="<?php echo base_url() ?>transportador/novo-transportador" type="button"
                                    class="btn btn-info link-load"><i class="fas fa-plus-circle"></i> Novo Transportador</a>
                                <button data-toggle="modal" data-target="#elimina-transportador" type="button"
                                    class="btn btn-danger" disabled id="btnExcluir"><i class="fas fa-trash-alt"></i> Excluir</button>
                            </div>
                            <div class="col-md-4">
                                <form action="<?= base_url('transportador') ?>" method="GET" class="needs-validation" novalidate>
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
                                <form action="<?= base_url('transportador/excluir-transportador') ?>" method="POST" id="formDelete" class="mb-0 needs-validation" novalidate>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th scope="col" class="text-center"><i
                                                                        class="fa-solid fa-check"></i></th>
                                                    <th scope="col">Transportador</th>
                                                    <th scope="col">Tipo pessoa</th> 
                                                    <th scope="col">CPF/CNPJ</th>
                                                    <th scope="col" class="text-center">Situação</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($lista_transportador as $key_transportador => $transportador) { ?>
                                                <tr>
                                                    <td>
                                                        <div class="checkbox text-center">
                                                            <input name="excluir_todos[]" type="checkbox"
                                                                value="<?= $transportador->cod_transportador ?>" <?php if($transportador->count_pedido > 0) echo "disabled"; ?>/>
                                                        </div>
                                                    </td>
                                                    <td><a class="text-dark link-load"
                                                            href="<?= base_url("transportador/editar-transportador/{$transportador->cod_transportador}") ?>"><?= $transportador->cod_transportador ?> - <?= $transportador->nome_transportador ?></a></td>
                                                    <td>
                                                        <?php  
                                                            switch($transportador->tipo_pessoa){
                                                                case 1:
                                                                    echo "Pessoa Jurídica";
                                                                    break;
                                                                case 2:
                                                                    echo "Pessoa Física";
                                                                    break;
                                                                case 3:
                                                                    echo "Estrangeira";
                                                                    break;
                                                            }
                                                        ?>
                                                    </td>
                                                    <td><?= $transportador->cnpj_cpf ?></td>
                                                    <td class="text-center">
                                                        <?php if($transportador->ativo == 1) {
                                                                echo "<span class='text-teal'>Ativo</span>";
                                                            }else{
                                                                echo "<span class='text-secondary'>Inativo</span>";
                                                            }
                                                        ?>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <?php if ($lista_transportador == false) { ?>
                                    <div class="text-center text-muted">
                                        <p class="font-italic mt-3">Nenhum transportador encontrado</p>
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

<div class="modal fade" id="elimina-transportador" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Eliminar Transportador</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Confirma eliminação do(s) transportador(es) selecionado(s)?
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" form="formDelete">Confirma</button>
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