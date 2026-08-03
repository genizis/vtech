<?php $this->load->view('gerais/header' , $menu); ?>
<?php $this->load->view('gerais/menu', $menu); ?>

<section>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('visao-geral') ?>">Visão Geral</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('producao') ?>">Produção</a></li>
            <li class="breadcrumb-item active">Ordem de Produção</li>
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
                                        <a href="<?= base_url("producao/ordem-producao/{$mes_anterior}/{$ano_anterior}") ?>"
                                            class="btn btn-secondary link-load"><i class="fas fa-angle-left"></i></a>
                                    </div>
                                    <input type="text" class="form-control search text-center filtro-data"
                                        value="<?= $descMes ?> de <?= $ano ?>" readonly>
                                    <div class="input-group-append">
                                        <a href="<?= base_url("producao/ordem-producao/{$mes_seguinte}/{$ano_seguinte}") ?>"
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
                        Ordens por status
                    </h6>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-borderless table-sm">
                                    <tbody>
                                        <tr>
                                            <td class="text-left">
                                            <i class="fa-duotone fa-solid fa-circle-small pr-2 text-teal"></i>  Produzido total
                                            </td>
                                            <td class="text-right <?php if($lista_status->produzido_total > 0) echo "text-teal"; else echo "text-muted"; ?>">
                                                <?= number_format($lista_status->produzido_total, 0, ',', '.') ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">
                                            <i class="fa-duotone fa-solid fa-circle-small pr-2 text-info"></i> Produzido parcial</td>
                                            <td class="text-right <?php if($lista_status->produzido_parcial > 0) echo "text-info"; else echo "text-muted"; ?>">
                                                <?= number_format($lista_status->produzido_parcial, 0, ',', '.') ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">
                                            <i class="fa-duotone fa-solid fa-circle-small pr-2 text-warning"></i> Pendentes</td>
                                            <td class="text-right <?php if($lista_status->pendente > 0) echo "text-warning"; else echo "text-muted"; ?>">
                                                <?= number_format($lista_status->pendente, 0, ',', '.') ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">
                                            <i class="fa-duotone fa-solid fa-circle-small pr-2 text-danger"></i> Atrasadas</td>
                                            <td class="text-right <?php if($lista_status->atrasado > 0) echo "text-danger"; else echo "text-muted"; ?>">
                                                <?= number_format($lista_status->atrasado, 0, ',', '.') ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">
                                            <i class="fa-duotone fa-solid fa-circle-small pr-2 text-dark"></i> Estornadas</td>
                                            <td class="text-right <?php if($lista_status->estornado > 0) echo "text-dark"; else echo "text-muted"; ?>">
                                                <?= number_format($lista_status->estornado, 0, ',', '.') ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <table class="table table-borderless table-sm mb-1">
                            <tbody>
                                <tr>
                                    <td class="text-left pt-0 text-dark"><strong>TOTAL ORDENS</strong></td>
                                    <td class="text-right pt-0">
                                        <strong>
                                            <?= number_format(($lista_status->produzido_total + $lista_status->produzido_parcial + $lista_status->pendente + $lista_status->atrasado + $lista_status->estornado), 0, ',', '.') ?>
                                        </strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <form action="<?= base_url("producao/ordem-producao/{$mes}/{$ano}") ?>" method="get" class="mb-0 needs-validation" novalidate>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <select class="selectpicker show-tick form-control" multiple data-live-search="true" data-actions-box="true" title="Produto" name="ProdutoFiltro[]" data-style="btn-input-primary">
                                        <?php $chave_produto = 0;
                                        foreach ($lista_produto_prod as $key_produto => $produto) { ?>
                                            <option value="<?= $produto->cod_produto ?>" <?php if ($produtoFiltro != null) {
                                                                                            if ($produto->cod_produto == $produtoFiltro[$chave_produto]) {
                                                                                                if ((count($produtoFiltro) - 1) > $chave_produto) {
                                                                                                    $chave_produto = $chave_produto + 1;
                                                                                                }
                                                                                                echo "selected";
                                                                                            }
                                                                                        } ?>>
                                                <?= $produto->cod_produto ?> - <?= $produto->nome_produto ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <select class="selectpicker show-tick form-control" multiple data-live-search="true" data-actions-box="true" title="Status" data-style="btn-input-primary" name="StatusFiltro[]">
                                        <option value="1" <?php if ($statusFiltro != null) { foreach ($statusFiltro as $status) {
                                                                    if($status == 1) echo "selected";
                                                                }}
                                                           ?>>1 - Pendente</option>
                                        <option value="2" <?php if ($statusFiltro != null) { foreach ($statusFiltro as $status) {
                                                                    if($status == 2) echo "selected";
                                                                }}
                                                           ?>>2 - Produzido Parcial</option>
                                        <option value="3" <?php if ($statusFiltro != null) { foreach ($statusFiltro as $status) {
                                                                    if($status == 3) echo "selected";
                                                                }} 
                                                           ?>>3 - Produzido Total</option>
                                        <option value="4" <?php if ($statusFiltro != null) { foreach ($statusFiltro as $status) {
                                                                    if($status == 4) echo "selected";
                                                                }} 
                                                           ?>>4 - Estornado</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <select class="selectpicker show-tick form-control" multiple data-live-search="true" data-actions-box="true" title="Pedido" name="PedidoFiltro[]" data-style="btn-input-primary">
                                        <?php $chave_pedido = 0;
                                        foreach ($lista_pedido as $key_pedido => $pedido) { ?>
                                            <option value="<?= $pedido->num_pedido_venda ?>" <?php if ($pedidoFiltro != null) {
                                                                                                                if ($pedido->num_pedido_venda == $pedidoFiltro[$chave_pedido]) {
                                                                                                                    if ((count($pedidoFiltro) - 1) > $chave_pedido) {
                                                                                                                        $chave_pedido = $chave_pedido + 1;
                                                                                                                    }
                                                                                                                    echo "selected";
                                                                                                                }
                                                                                                            } ?>>
                                                <?= $pedido->num_pedido_venda ?> -
                                                <?= $pedido->nome_cliente ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-outline-secondary btn-block"><i class="fa-regular fa-filter"></i> Filtrar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8 pl-0">
                <ul class="nav nav-tabs mb-3">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#ordem-emitidas">Ordens emitidas</a>
                    </li>
                </ul>
                <div class="card mb-3">
                    <div class="card-body">                        
                        <div class="row">
                            <div class="col-md-6">
                                <a href="<?php echo base_url() ?>producao/ordem-producao/nova-ordem-producao"
                                    type="button" class="link-load btn btn-outline-info"><i class="fa-solid fa-circle-plus"></i> Nova
                                    Ordem de
                                    Produção</a>
                                <button data-toggle="modal" data-target="#elimina-ordem" type="button"
                                    class="btn btn-outline-danger" id="btnExcluir" disabled><i
                                        class="fas fa-trash-alt"></i>
                                    Excluir</button>
                            </div>
                            <div class="col-md-6">
                                <form action="<?= base_url("producao/ordem-producao/{$mes}/{$ano}") ?>" method="GET"
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
                                <div class="alert alert-danger alert-dismissible fade show mb-0 mt-2" id="alert" role="alert">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>Atenção!</strong> <?= $this->session->flashdata('erro') ?>
                                </div>
                                <?php } $this->session->set_flashdata('erro', ''); ?>
                                <?php if ($this->session->flashdata('sucesso') <> ""){ ?>
                                <div class="alert alert-success alert-dismissible fade show mb-0 mt-2" id="alert" role="alert">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>Muito bem!</strong>
                                    <?= $this->session->flashdata('sucesso') ?>
                                </div>
                                <?php } $this->session->set_flashdata('sucesso', ''); ?>
                                <form action="<?= base_url('producao/ordem-producao/excluir-ordem-producao') ?>"
                                    method="POST" id="formDelete" class="mb-0 needs-validation" novalidate>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th scope="col" class="text-center"><i
                                                            class="fa-solid fa-check"></i></th>                                                    
                                                    <th scope="col" class="text-center">Data emissão</th>
                                                    <th scope="col" class="text-center">Ordem</th>
                                                    <th scope="col">Produto</th>
                                                    <th scope="col" class="text-right">Planejado</th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-sm">
                                                <?php foreach($lista_ordem as $key_ordem => $ordem) { ?>
                                                <tr>
                                                    <td class="align-middle">
                                                        <div class="checkbox text-center">
                                                            <input name="excluir_todos[]" type="checkbox"
                                                                <?php if($ordem->count_mov > 0) echo "disabled"; ?>
                                                                value="<?= $ordem->num_ordem_producao ?>" />
                                                        </div>
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <?= str_replace('-', '/', date("d-m-Y", strtotime($ordem->data_emissao))) ?>
                                                    </td>
                                                    <td scope="row" class="text-center align-middle"><a
                                                            class="link-load text-dark"
                                                            href="<?= base_url("producao/ordem-producao/editar-ordem-producao/{$ordem->num_ordem_producao}") ?>"><?= $ordem->num_ordem_producao?></a>
                                                    </td>
                                                    
                                                    <td class="limit-text-50 align-middle" data-toggle="tooltip"
                                                        data-placement="bottom"
                                                        title="<?= $ordem->cod_produto ?> - <?= $ordem->nome_produto ?>">
                                                        <a class="link-load text-dark"
                                                            href="<?= base_url("producao/ordem-producao/editar-ordem-producao/{$ordem->num_ordem_producao}") ?>"><?= $ordem->cod_produto ?> - <?= $ordem->nome_produto ?></a><br>
                                                        <?php
                                                        if($ordem->data_fim < date('Y-m-d') && $ordem->status != 3 && $ordem->status != 4 && $ordem->quant_produzida == 0){
                                                            echo "<span class='badge bg-danger-light'>Atrasada</span>";

                                                        }else{
                                                            switch ($ordem->status) {
                                                                case 1:
                                                                    echo "<span class='badge bg-light'>Pendente</span>";
                                                                    break;
                                                                case 2:
                                                                    echo "<span class='badge bg-info-light'>Produzido Parcial</span>";
                                                                    break;
                                                                case 3:
                                                                    echo "<span class='badge bg-teal-light'>Produzido Total</span>";
                                                                    break;
                                                                case 4:
                                                                    echo "<span class='badge bg-secondary text-white'>Estornado</span>";
                                                                    break;
                                                            } 

                                                        }                                                        
                                                        ?>
                                                        <?php if($ordem->num_pedido_venda != 0 && $ordem->num_pedido_venda != null){ ?>
                                                            <span class='badge  text-muted font-italic'><?= $ordem->num_pedido_venda ?> - <?= $ordem->nome_cliente ?></span>
                                                        <?php } ?>
                                                    </td>
                                                    <td class="text-right align-middle text-info">
                                                        <?= number_format($ordem->quant_planejada, 3, ',', '.') ?>
                                                        <span class="small2"><?= $ordem->cod_unidade_medida ?></span></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <?php if($lista_ordem == false) { ?>
                                    <div class="text-center text-muted">
                                        <p class="font-italic mt-3">Nenhuma ordem de produção emitida para o período
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

<div class="modal fade" id="elimina-ordem" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Eliminar ordens de produção</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Confirma eliminação das ordens de produção selecionadas?
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