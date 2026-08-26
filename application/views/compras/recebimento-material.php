<?php $this->load->view('gerais/header' , $menu); ?>
<?php $this->load->view('gerais/menu', $menu); ?>

<section>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('visao-geral') ?>">Visão Geral</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('compras') ?>">Compras</a></li>
            <li class="breadcrumb-item active">Recebimento de Material</li>
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
                                        <a href="<?= base_url("compras/recebimento-material/{$mes_anterior}/{$ano_anterior}") ?>"
                                            class="btn btn-secondary link-load"><i class="fas fa-angle-left"></i></a>
                                    </div>
                                    <input type="text" class="form-control search text-center"
                                        value="<?= $descMes ?> de <?= $ano ?>" readonly>
                                    <div class="input-group-append">
                                        <a href="<?= base_url("compras/recebimento-material/{$mes_seguinte}/{$ano_seguinte}") ?>"
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
                        Pedidos por status<br>
                        <span class="font-italic text-size-80">Valores totais</span>
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
                        <a class="nav-link active" data-toggle="tab" href="#pedidos-receber">Pedidos a receber</a>
                    </li>
                </ul>
                <div class="card  mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6"></div>
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
                                <div class="">
                                    <table class="table table-bordered mb-3">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col" class="text-center">Data entrega</th>
                                                <th scope="col" class="text-center">Pedido</th>                                                
                                                <th scope="col">Fornecedor</th>
                                                <th scope="col" class="text-right">Total pedido</th>
                                                <th scope="col" class="text-right">Total recebido</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-sm">
                                            <?php foreach($lista_pedido as $key_pedido => $pedido) { ?>
                                            <tr>
                                                <td class="text-center align-middle">
                                                    <?= str_replace('-', '/', date("d-m-Y", strtotime($pedido->data_entrega))) ?>
                                                </td> 
                                                <td class="text-center align-middle"><a class="text-dark link-load"
                                                        href="<?= base_url("compras/recebimento-material/novo-recebimento-material/{$pedido->num_pedido_compra}") ?>"><?= $pedido->num_pedido_compra ?></a>
                                                </td>                                                
                                                <td class="align-middle"><a class="text-dark link-load"
                                                        href="<?= base_url("compras/recebimento-material/novo-recebimento-material/{$pedido->num_pedido_compra}") ?>"><?= $pedido->cod_fornecedor ?> - <?= $pedido->nome_fornecedor ?></a><br>
                                                <?php
                                                    if($pedido->data_entrega < date('Y-m-d') && $pedido->quant_pendente != 0 && $pedido->valor_total == 0){
                                                        echo "<span class='badge bg-danger-light'>Atrasada</span>";
                                                    }elseif($pedido->valor_total == 0){
                                                        echo "<span class='badge bg-light'>Em digitação</span>";
                                                    }elseif($pedido->quant_pendente == 0){
                                                        echo "<span class='badge bg-teal-light'>Atendido Total</span>";
                                                    }elseif($pedido->quant_pendente != 0){
                                                        echo "<span class='badge bg-info-light'>Pendente</span>";
                                                    }                                                       
                                                    ?>
                                                </td>                                                                                             
                                                <td class="text-right align-middle <?php if(($pedido->valor_produto + 
                                                                                                 $pedido->valor_frete +
                                                                                                 $pedido->valor_seguro +
                                                                                                 $pedido->outras_despesas - 
                                                                                                 $pedido->valor_desconto) > 0) echo "text-info"; ?>">
                                                    R$ <?= number_format((float) ($pedido->valor_produto + 
                                                                         $pedido->valor_frete +
                                                                         $pedido->valor_seguro +
                                                                         $pedido->outras_despesas - 
                                                                         $pedido->valor_desconto), 2, ',', '.') ?>
                                                </td> 
                                                <td class="text-right align-middle <?php if($pedido->valor_total > 0) echo "text-teal"; else echo "text-dark"; ?>">
                                                    R$ <?= number_format((float) ($pedido->valor_total), 2, ',', '.') ?>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    <?php if ($lista_pedido == false) { ?>
                                    <div class="text-center text-muted">
                                        <p class="font-italic mt-3">Nenhum pedido com recebimento para o período
                                        </p>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
$('.page-item>a').addClass("page-link");
</script>

<?php $this->load->view('gerais/footer'); ?>