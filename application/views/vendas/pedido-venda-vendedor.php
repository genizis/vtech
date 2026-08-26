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
                                <a href="<?= base_url("vendas/pedido-venda-vendedor/{$mes_anterior}/{$ano_anterior}") ?>"
                                    class="btn btn-secondary link-load"><i class="fas fa-angle-left align-middle"></i></a>
                            </div>
                            <input type="text" class="form-control text-center filtro-data "
                                value="<?= $descMes ?> de <?= $ano ?>" readonly>
                            <div class="input-group-append">
                                <a href="<?= base_url("vendas/pedido-venda-vendedor/{$mes_seguinte}/{$ano_seguinte}") ?>"
                                    class="btn btn-secondary link-load <?php if(date(''.$ano.'-'.$mes.'-01') == date('Y-m-01')) echo "disabled"; ?>"><i
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
                        <a href="<?php echo base_url() ?>vendas/pedido-venda-vendedor/novo-pedido-venda-vendedor"
                            type="button" class="btn btn-block btn-info mb-2 link-load"><i class="fas fa-plus-circle"></i> Novo
                            Pedido
                            de Venda</a>
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
                            <?php foreach($lista_pedido as $key_pedido => $pedido) { ?>
                            <a href="<?= base_url("vendas/pedido-venda-vendedor/editar-pedido-venda-vendedor/{$pedido->num_pedido_venda}") ?>"
                                class="list-group-item list-group-item-action flex-column align-items-start link-load">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-0"><strong><?= $pedido->num_pedido_venda ?> -
                                            <?= $pedido->nome_cliente ?></strong></h5>
                                </div>
                                <h6 class="mb-2">
                                    <span class="text-teal">
                                        R$ <?php 
                                                $valorDesconto = 0;
                                                if($pedido->tipo_desconto == 1){
                                                    $valorDesconto = $pedido->valor_desconto;
                                                }elseif($pedido->tipo_desconto == 2){
                                                    $valorDesconto = $pedido->valor_total_pedido * ($pedido->valor_desconto / 100);
                                                }

                                                $valor_pedido = $pedido->valor_total_pedido + $pedido->valor_frete + $pedido->valor_seguro + $pedido->outras_despesas - $valorDesconto;

                                                echo number_format((float) ($valor_pedido), 2, ',', '.');

                                           ?></span>
                                </h6>
                                <p class="mb-2 lead"><i>Data de emissão:
                                    <?= str_replace('-', '/', date("d-m-Y", strtotime($pedido->data_emissao))) ?>; Data
                                    de entrega:
                                    <?= str_replace('-', '/', date("d-m-Y", strtotime($pedido->data_entrega))) ?></i></p>
                                <span><?php  
                                                    switch ($pedido->situacao) {
                                                        case 1:
                                                            echo "<span class='badge badge-secondary'>Em Orçamento</span>";
                                                            break;
                                                        case 2:
                                                            echo "<span class='badge badge-danger'>Orçamento Reprovado</span>";
                                                            break;
                                                        case 3:
                                                            echo "<span class='badge badge-info'>Venda Confirmada</span>";
                                                            break;
                                                    }

                                                    if($pedido->count_faturamento > 0)
                                                        echo " <span class='badge badge-teal'>Faturado</span>";
                                                    ?></span>
                            </a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?php if ($lista_pedido == false) { ?>
                        <div class="text-center text-dark">
                            <p class="font-italic mt-5">Nenhum pedido emitido para o período
                            </p>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="elimina-pedido" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Eliminar Pedido Venda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Confirma eliminação do(s) pedido(s) de venda selecionado(s)?
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" form="formDelete">Confirma</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="importa-atendimento" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Importar Atendimentos - Vendas Externas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formAtendimento" class="mb-0 needs-validation" novalidate
                    action="<?= base_url("vendas/importar-atendimentos-vendas-externas") ?>" method="GET">
                    <div class="form-group">
                        <label for="inputDataAtendimento">Data dos Atendimentos</label>
                        <input type="text" class="form-control" id="inputDataAtendimento" name="DataAtendimento"
                            value="<?= str_replace('-', '/', date("d-m-Y")) ?>">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" form="formAtendimento" id="btnSpinner">Confirma</button>
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

$('#inputDataAtendimento').datepicker({
    uiLibrary: 'bootstrap4'
});
</script>

<?php $this->load->view('gerais/footer-vendedor'); ?>