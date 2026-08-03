<?php $this->load->view('gerais/header' , $menu); ?>
<?php $this->load->view('gerais/menu', $menu); ?>

<section>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('visao-geral') ?>">Visão Geral</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('fiscal') ?>">Fiscal</a></li>
            <li class="breadcrumb-item active">Nota Fiscal</li>
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
                                        <a href="<?= base_url("fiscal/nota-fiscal/{$mes_anterior}/{$ano_anterior}") ?>"
                                            class="btn btn-secondary link-load"><i class="fas fa-angle-left"></i></a>
                                    </div>
                                    <input type="text" class="form-control search text-center"
                                        value="<?= $descMes ?> de <?= $ano ?>" readonly>
                                    <div class="input-group-append">
                                        <a href="<?= base_url("fiscal/nota-fiscal/{$mes_seguinte}/{$ano_seguinte}") ?>"
                                            class="btn btn-secondary link-load <?php if(date(''.$ano.'-'.$mes.'-01') == date('Y-m-01')) echo "disabled"; ?>"><i
                                                class="fas fa-angle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card  mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <p class="card-text text-muted mb-0">Notas emitidas<br><span
                                        class="font-italic text-size-80">Valores totais</span>
                                <p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-borderless table-sm mb-0">
                                    <tbody>
                                        <tr>
                                            <td class="text-left">
                                                Total autorizado
                                            </td>
                                            <td class="text-right <?php if($total_nota_fiscal->tota_emitida > 0) echo "text-teal"; ?>">
                                                R$ <?= number_format($total_nota_fiscal->tota_emitida, 2, ',', '.') ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">
                                                Total pendente
                                            </td>
                                            <td class="text-right <?php if($total_nota_fiscal->tota_pendente > 0) echo "text-muted"; ?>">
                                                R$ <?= number_format($total_nota_fiscal->tota_pendente, 2, ',', '.') ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">
                                                Total cancelado
                                            </td>
                                            <td class="text-right <?php if($total_nota_fiscal->tota_cancelado > 0) echo "text-danger"; ?>">
                                                R$ <?= number_format($total_nota_fiscal->tota_cancelado, 2, ',', '.') ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card  mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="<?= base_url("fiscal/nota-fiscal/{$mes}/{$ano}") ?>" method="GET"
                                    class="mb-0 needs-validation" novalidate>
                                    <div class="input-group">
                                        <input type="text" class="form-control search" name="buscar"
                                            value="<?= $filter ?>">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-secondary"><i
                                                    class="fas fa-search"></i> Buscar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 pl-0">
                <div class="card  mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-0">
                                <p class="card-text text-muted mb-0">Notas Fiscais<br><span
                                        class="font-italic text-size-80">Emitidas no período</span>
                                <p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="<?php echo base_url() ?>fiscal/nota-fiscal/nova-nota-fiscal" type="button"
                                    class="btn btn-outline-info link-load"><i class="fas fa-plus-circle"></i> Nova Nota Fiscal</a>
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
                                <form action="<?= base_url('vendas/pedido-venda/excluir-pedido-venda') ?>" method="POST"
                                    id="formDelete"  class="mb-0 needs-validation" novalidate>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th scope="col" class="text-center">Código</th>
                                                    <th scope="col" class="text-center">Tipo NF</th>
                                                    <th scope="col">Cliente</th> 
                                                    <th scope="col">Natur operação</th>
                                                    <th scope="col" class="text-center">Data emissão</th>  
                                                </tr>
                                            </thead>
                                            <tbody class="table-sm">
                                                <?php foreach($lista_nota_fiscal as $key_nota_fiscal => $nota_fiscal) { ?>
                                                <tr>
                                                    <td scope="row" class="text-center align-middle"><a class="link-load text-dark"
                                                            href="<?= base_url("fiscal/nota-fiscal/editar-nota-fiscal/{$nota_fiscal->cod_nota_fiscal}") ?>"><?= $nota_fiscal->cod_nota_fiscal ?></a>
                                                    </td>
                                                    <td class="text-center align-middle"><a class="link-load text-dark"
                                                            href="<?= base_url("fiscal/nota-fiscal/editar-nota-fiscal/{$nota_fiscal->cod_nota_fiscal}") ?>">
                                                        <?php
                                                            switch ($nota_fiscal->operacao_fiscal) {
                                                                case 0:
                                                                    echo "Entrada";
                                                                    break;
                                                                case 1:
                                                                    echo "Saída";
                                                                    break;
                                                            }                                                         
                                                        ?></a>
                                                    </td>                                                    
                                                    <td class="align-middle"><a class="link-load text-dark"
                                                            href="<?= base_url("fiscal/nota-fiscal/editar-nota-fiscal/{$nota_fiscal->cod_nota_fiscal}") ?>"><?= $nota_fiscal->nome_cliente ?></a><br>
                                                        <span
                                                            class='badge bg-light text-muted'><?= $nota_fiscal->cod_cliente ?></span>
                                                        <?php  
                                                            switch ($nota_fiscal->status) {
                                                                case 1:
                                                                    echo "<span class='badge bg-light'>Em Digitação</span>";
                                                                    break;
                                                                case 2:
                                                                    echo "<span class='badge bg-info-light'>NF Calculada</span>";
                                                                    break;
                                                                case 3:
                                                                    echo "<span class='badge bg-teal-light'>NF Emitida</span>";
                                                                    break;
                                                                case 4:
                                                                    echo "<span class='badge bg-danger-light'>NF Cancelada</span>";
                                                                    break;
                                                            }
                                                        ?>
                                                    </td>
                                                    <td class="align-middle"><a class="link-load text-dark"
                                                            href="<?= base_url("fiscal/nota-fiscal/editar-nota-fiscal/{$nota_fiscal->cod_nota_fiscal}") ?>"><?= $nota_fiscal->nome ?></a></td>
                                                    <td class="text-center align-middle">
                                                        <?= str_replace('-', '/', date("d-m-Y", strtotime($nota_fiscal->data_emissao))) ?>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <?php if ($lista_nota_fiscal == false) { ?>
                                    <div class="text-center text-muted">
                                        <p class="font-italic mt-3">Nenhuma nota fiscal emitida para o período
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

<script>
$('.page-item>a').addClass("page-link");

$("[name='excluir_todos[]']").click(function() {
    var cont = $("[name='excluir_todos[]']:checked").length;
    $("#btnExcluir").prop("disabled", cont ? false : true);
});
</script>

<?php $this->load->view('gerais/footer'); ?>