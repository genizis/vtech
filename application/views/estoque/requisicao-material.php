<?php $this->load->view('gerais/header' , $menu); ?>
<?php $this->load->view('gerais/menu', $menu); ?>

<section>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('visao-geral') ?>">Visão Geral</a></li>
            <li class="breadcrumb-item active">Requisição de Material</li>
        </ol>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card  mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <a href="<?= base_url("estoque/requisicao-material/{$mes_anterior}/{$ano_anterior}") ?>"
                                            class="btn btn-secondary link-load"><i class="fas fa-angle-left"></i></a>
                                    </div>
                                    <input type="text" class="form-control search text-center"
                                        value="<?= $descMes ?> de <?= $ano ?>" readonly>
                                    <div class="input-group-append">
                                        <a href="<?= base_url("estoque/requisicao-material/{$mes_seguinte}/{$ano_seguinte}") ?>"
                                            class="btn btn-secondary link-load"><i
                                                class="fas fa-angle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card  mb-3">
                    <h6 class="card-header bg-white text-muted">
                        Indicador de requisição<br>
                        <span class="font-italic text-size-80">Valores totais</span>
                    </h6>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-borderless table-sm mb-0">
                                    <tbody>
                                        <tr>
                                            <td class="text-left">
                                                Total em requisição pendente
                                            </td>
                                            <td class="text-right <?php if($indicador_requisicao->valor_pendente > 0) echo "text-info"; ?>">
                                                R$ <?= number_format($indicador_requisicao->valor_pendente, 2, ',', '.') ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">
                                                Total em requisição atendida
                                            </td>
                                            <td class="text-right <?php if($indicador_requisicao->valor_atendido > 0) echo "text-info"; ?>">
                                                R$ <?= number_format($indicador_requisicao->valor_atendido, 2, ',', '.') ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 pl-0">
                <ul class="nav nav-tabs mb-3">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#requisicao-material">Requisição de material</a>
                    </li>
                </ul>
                <div class="card  mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <a href="<?php echo base_url() ?>estoque/requisicao-material/nova-requisicao-material" type="button"
                                    class="btn btn-outline-info link-load"><i class="fas fa-plus-circle"></i> Nova Nova Requisição de Material</a>
                                <button data-toggle="modal" data-target="#elimina-requisicao-material" type="button"
                                    class="btn btn-outline-danger" id="btnExcluir" disabled><i class="fas fa-trash-alt"></i> Excluir</button>                                
                            </div>
                            <div class="col-md-6">
                                <form action="<?= base_url("estoque/requisicao-material/{$mes}/{$ano}") ?>" method="GET"
                                    class="mb-0 needs-validation" novalidate>
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
                                <form action="<?= base_url('estoque/requisicao-material/excluir-requisicao-material') ?>" method="POST"
                                    id="formDelete"  class="mb-0 needs-validation" novalidate>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th scope="col" class="text-center"><i
                                                            class="fa-solid fa-check"></i>
                                                    </th>
                                                    <th scope="col" class="text-center">Requisição</th>
                                                    <th scope="col" class="text-center">Data emissão</th>
                                                    <th scope="col" class="text-center">Data requisição</th>
                                                    <th scope="col" class="text-center">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($lista_requisicao as $key_requisicao => $requisicao) { ?>
                                                <tr>
                                                    <td>
                                                        <div class="checkbox text-center">
                                                            <input name="excluir_todos[]" type="checkbox" id="inputSelecionar"
                                                                value="<?= $requisicao->cod_requisicao_material ?>"
                                                                <?php if($requisicao->status == 2 || $requisicao->quant_produto > 0) { echo "disabled"; } ?>/>
                                                        </div>
                                                    </td>
                                                    <td class="text-center"><a class="text-dark link-load"
                                                            href="<?= base_url("estoque/requisicao-material/editar-requisicao-material/{$requisicao->cod_requisicao_material}") ?>"><?= $requisicao->cod_requisicao_material ?></a>
                                                    </td>
                                                    <td class="text-center">
                                                        <?= str_replace('-', '/', date("d-m-Y", strtotime($requisicao->data_emissao))) ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <?= str_replace('-', '/', date("d-m-Y", strtotime($requisicao->data_requisicao))) ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <?php
                                                            switch ($requisicao->status) {
                                                                case 1:
                                                                    echo "<span class='text-secondary'>Pendente</span>";
                                                                    break;
                                                                case 2:
                                                                    echo "<span class='text-teal'>Requisição atendida</span>";
                                                                    break; 
                                                            }                                                        
                                                        ?>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <?php if ($lista_requisicao == false) { ?>
                                    <div class="text-center text-muted">
                                        <p class="font-italic mt-3">Nenhuma requisição de material realizada para o período
                                        </p>
                                    </div>
                                    <?php } ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="elimina-requisicao-material" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Eliminar Requisição de Material</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Confirma eliminação da(s) requisição(ões) de material(eis) selecionado(s)?
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