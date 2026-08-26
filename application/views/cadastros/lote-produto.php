<?php $this->load->view('gerais/header' , $menu); ?>
<?php $this->load->view('gerais/menu', $menu); ?>

<section>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('visao-geral') ?>">Visão Geral</a></li>
            <li class="breadcrumb-item active">Lote de Produto</li>
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
                            </div>
                            <div class="col-md-4">
                                <form action="<?= base_url('lote-produto') ?>" method="GET" class="needs-validation" novalidate>
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
                                <form action="<?= base_url('lote-produto/excluir-lote-produto') ?>" method="POST" id="formDelete" class="mb-0 needs-validation" novalidate>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th scope="col" class="text-center"><i
                                                                class="fa-solid fa-check"></i></th>
                                                    <th scope="col">Produto</th>
                                                    <th scope="col">Tipo</th>
                                                    <th scope="col" class="text-right">Custo médio</th>
                                                    <th scope="col" class="text-right">Estoque</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($lista_produto_lote as $key_produto => $produto) { ?>
                                                <tr>
                                                    <td>
                                                        <div class="checkbox text-center">
                                                            <input name="excluir_todos[]" type="checkbox"
                                                                value="<?= $produto->cod_produto ?>" disabled/>
                                                        </div>
                                                    </td>
                                                    <td><a class="link-load text-dark"
                                                            href="<?= base_url("lote/editar-lote-produto/{$produto->cod_produto}") ?>"><?= $produto->cod_produto ?> - <?= $produto->nome_produto ?></a></td>                                                
                                                    <td><?= $produto->nome_tipo_produto ?></td>
                                                    <td
                                                        class="text-right <?php if($produto->custo_medio > 0) echo "text-info" ?>">
                                                        R$ <?= number_format((float) ($produto->custo_medio), 2, ',', '.') ?></td>
                                                    <td
                                                        class="text-right <?php if($produto->quant_estoq < 0) echo "text-danger" ?>">
                                                        <?= number_format((float) ($produto->quant_estoq), 3, ',', '.') ?> <?= $produto->cod_unidade_medida ?></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <?php if ($lista_produto_lote == false) { ?>
                                    <div class="text-center text-muted">
                                        <p class="font-italic mt-3">Nenhum produto controlado por lote encontrado</p>
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

<script>
$('.page-item>a').addClass("page-link");

$("[name='excluir_todos[]']").click(function() {
    var cont = $("[name='excluir_todos[]']:checked").length;
    $("#btnExcluir").prop("disabled", cont ? false : true);
});
</script>

<?php $this->load->view('gerais/footer'); ?>