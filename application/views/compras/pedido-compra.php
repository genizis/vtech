<?php $this->load->view('gerais/header' , $menu); ?>
<?php $this->load->view('gerais/menu', $menu); ?>

<section>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('visao-geral') ?>">Visão Geral</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('compras') ?>">Compras</a></li>
            <li class="breadcrumb-item active">Pedido de Compra</li>
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
                                        <a href="<?= base_url("compras/pedido-compra/{$mes_anterior}/{$ano_anterior}") ?>"
                                            class="btn btn-secondary link-load"><i class="fas fa-angle-left"></i></a>
                                    </div>
                                    <input type="text" class="form-control search text-center"
                                        value="<?= $descMes ?> de <?= $ano ?>" readonly>
                                    <div class="input-group-append">
                                        <a href="<?= base_url("compras/pedido-compra/{$mes_seguinte}/{$ano_seguinte}") ?>"
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
                        Totais em pedidos<br>
                        <span class="font-italic text-size-80">Por status</span>
                    </h6>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-borderless table-sm mb-0">
                                    <tbody>
                                        <tr>
                                            <td class="text-left">
                                                Compras emitidas
                                            </td>
                                            <td class="text-right <?php if($totais_pedido->total_pedido > 0) echo "text-info"; ?>">
                                                R$ <?= number_format((float) ($totais_pedido->total_pedido), 2, ',', '.') ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">
                                                Compras realizadas
                                            </td>
                                            <td class="text-right <?php if($totais_pedido->total_recebido > 0) echo "text-teal"; ?>">
                                                R$ <?= number_format((float) ($totais_pedido->total_recebido), 2, ',', '.') ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">
                                                Compras pendentes
                                            </td>
                                            <td class="text-right <?php if($totais_pedido->total_pendente > 0) echo "text-muted"; ?>">
                                                R$ <?= number_format((float) ($totais_pedido->total_pendente), 2, ',', '.') ?>
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
                        <a class="nav-link active" data-toggle="tab" href="#pedidos-emitidos">Pedidos emitidos</a>
                    </li>
                </ul>
                <div class="card  mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <a href="<?php echo base_url() ?>compras/pedido-compra/novo-pedido-compra" type="button"
                                    class="link-load btn btn-outline-info"><i class="fas fa-plus-circle"></i> Novo Pedido de Compra</a>
                                <button data-toggle="modal" data-target="#elimina-pedido" type="button"
                                    class="btn btn-outline-danger" id="btnExcluir" disabled><i class="fas fa-trash-alt"></i> Excluir</button>
                            </div>
                            <div class="col-md-6">
                                <form action="<?= base_url("compras/pedido-compra/{$mes}/{$ano}") ?>" method="GET"
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
                                <form action="<?= base_url('compras/pedido-compra/excluir-pedido') ?>" method="POST"
                                    id="formDelete" class="mb-0 needs-validation" novalidate>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th scope="col" class="text-center"><i
                                                            class="fa-solid fa-check"></i></th>
                                                    <th scope="col" class="text-center">Data emissão</th>
                                                    <th scope="col" class="text-center">Pedido</th>                                                    
                                                    <th scope="col">Fornecedor</th>
                                                    <th scope="col" class="text-right">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-sm">
                                                <?php foreach($lista_pedido as $key_pedido => $pedido) { ?>
                                                <tr>
                                                    <td class="align-middle">
                                                        <div class="checkbox text-center">
                                                            <input name="excluir_todos[]" type="checkbox"
                                                                value="<?= $pedido->num_pedido_compra ?>" 
                                                                <?php if($pedido->valor_produto > 0 || $pedido->estornado > 0){ echo "disabled"; } ?>/>
                                                        </div>
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <?= str_replace('-', '/', date("d-m-Y", strtotime($pedido->data_emissao))) ?>
                                                    </td>                                                
                                                    <td class="text-center align-middle"><a class="link-load text-dark"
                                                            href="<?= base_url("compras/pedido-compra/editar-pedido-compra/{$pedido->num_pedido_compra}") ?>"><?= $pedido->num_pedido_compra ?></a>
                                                    </td>                                                    
                                                    <td class="align-middle"><a class="link-load text-dark"
                                                            href="<?= base_url("compras/pedido-compra/editar-pedido-compra/{$pedido->num_pedido_compra}") ?>"><?= $pedido->cod_fornecedor ?> - <?= $pedido->nome_fornecedor ?></a><br>
                                                    <?php
                                                        if($pedido->data_entrega < date('Y-m-d') && $pedido->quant_pendente != 0 && $pedido->valor_produto != 0){
                                                            echo "<span class='badge bg-danger-light'>Atrasado</span>";
                                                        }elseif($pedido->valor_produto == 0 && $pedido->estornado == 0){
                                                            echo "<span class='badge bg-light'>Em digitação</span>";
                                                        }elseif($pedido->valor_produto == 0 && $pedido->estornado != 0){
                                                            echo "<span class='badge bg-dark'>Estornado</span>";
                                                        }elseif($pedido->quant_pendente == 0){
                                                            echo "<span class='badge bg-teal-light'>Recebido Total</span>";
                                                        }elseif($pedido->quant_pendente != 0){
                                                            echo "<span class='badge bg-info-light'>Pendente</span>";
                                                        }                                                        
                                                    ?></td>                                                   
                                                    <td class="text-right align-middle <?php if(($pedido->valor_produto + 
                                                                                                 $pedido->valor_frete +
                                                                                                 $pedido->valor_seguro +
                                                                                                 $pedido->outras_despesas - 
                                                                                                 $pedido->valor_desconto) > 0) echo "text-info"; ?>">
                                                        R$ <?= number_format((float) ($pedido->valor_produto + 
                                                                             $pedido->valor_frete +
                                                                             $pedido->valor_seguro +
                                                                             $pedido->outras_despesas - 
                                                                             $pedido->valor_desconto), 2, ',', '.') ?></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <?php if ($lista_pedido == false) { ?>
                                    <div class="text-center text-muted">
                                        <p class="font-italic mt-3">Nenhum pedido emitido para o período
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

<div class="modal fade" id="elimina-pedido" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Eliminar pedido de compra</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Confirma eliminação dos pedidos de compra selecionados?
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