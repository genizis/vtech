<?php $this->load->view('gerais/header' , $menu); ?>
<?php $this->load->view('gerais/menu', $menu); ?>

<section>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('visao-geral') ?>">Visão Geral</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('producao') ?>">Produção</a></li>
            <li class="breadcrumb-item active">Reporte de Produção</li>
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
                                        <a href="<?= base_url("producao/reporte-producao/{$mes_anterior}/{$ano_anterior}") ?>"
                                            class="btn btn-secondary link-load"><i class="fas fa-angle-left"></i></a>
                                    </div>
                                    <input type="text" class="form-control search text-center filtro-data"
                                        value="<?= $descMes ?> de <?= $ano ?>" readonly>
                                    <div class="input-group-append">
                                        <a href="<?= base_url("producao/reporte-producao/{$mes_seguinte}/{$ano_seguinte}") ?>"
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
                                                Produzido total
                                            </td>
                                            <td class="text-right <?php if($lista_status->produzido_total > 0) echo "text-teal"; else echo "text-muted"; ?>">
                                                <?= number_format($lista_status->produzido_total, 0, ',', '.') ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">
                                                Produzido parcial</td>
                                            <td class="text-right <?php if($lista_status->produzido_parcial > 0) echo "text-info"; else echo "text-muted"; ?>">
                                                <?= number_format($lista_status->produzido_parcial, 0, ',', '.') ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">
                                                Pendentes</td>
                                            <td class="text-right <?php if($lista_status->pendente > 0) echo "text-muted"; else echo "text-muted"; ?>">
                                                <?= number_format($lista_status->pendente, 0, ',', '.') ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">
                                                Atrasadas</td>
                                            <td class="text-right <?php if($lista_status->atrasado > 0) echo "text-danger"; else echo "text-muted"; ?>">
                                                <?= number_format($lista_status->atrasado, 0, ',', '.') ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">
                                                Estornadas</td>
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
                        <table class="table table-borderless table-sm mb-0 mt-0">
                            <tbody>
                                <tr>
                                    <td class="text-left pt-0 text-dark"><strong>Total de ordens</strong></td>
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
            </div>
            <div class="col-md-8 pl-0">
                <ul class="nav nav-tabs mb-3">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#ordem-planejadas">Ordens planejadas</a>
                    </li>
                </ul>
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6"></div>
                            <div class="col-md-6">
                                <form action="<?= base_url("producao/reporte-producao/{$mes}/{$ano}") ?>" method="GET"
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
                                    <strong>Muito bem!</strong> <?= $this->session->flashdata('sucesso') ?>
                                </div>
                                <?php } $this->session->set_flashdata('sucesso', ''); ?>
                                <form action="<?= base_url('producao/ordem-producao/excluir-ordem-producao') ?>"
                                    method="POST" id="formDelete" class="mb-0 needs-validation" novalidate>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th scope="col" class="text-center">Data fim</th>
                                                    <th scope="col" class="text-center">Ordem</th>                                                    
                                                    <th scope="col">Produto</th>
                                                    <th scope="col" class="text-right">Planejado</th>
                                                    <th scope="col" class="text-right">Produzido</th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-sm">
                                                <?php foreach($lista_ordem as $key_ordem => $ordem) { ?>
                                                <tr>
                                                    <td class="text-center align-middle">
                                                        <?= str_replace('-', '/', date("d-m-Y", strtotime($ordem->data_fim))) ?>
                                                    </td>
                                                    <td scope="row" class="text-center align-middle"><a
                                                            class="link-load text-dark"
                                                            href="<?php echo base_url() ?>producao/reporte-producao/novo-reporte-producao/<?= $ordem->num_ordem_producao ?>""><?= $ordem->num_ordem_producao?></a>
                                                    </td>                                                    
                                                    <td class="limit-text-50 align-middle" data-toggle="tooltip"
                                                        data-placement="bottom"
                                                        title="<?= $ordem->cod_produto ?> - <?= $ordem->nome_produto ?>">
                                                        <a class="link-load text-dark"
                                                            href="<?php echo base_url() ?>producao/reporte-producao/novo-reporte-producao/<?= $ordem->num_ordem_producao ?>"><?= $ordem->cod_produto ?> - <?= $ordem->nome_produto ?></a><br>
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
                                                        <?= $ordem->cod_unidade_medida ?></td>
                                                    <td class="text-right align-middle <?php if($ordem->quant_produzida > 0) echo "text-teal"; ?>">
                                                        <?= number_format($ordem->quant_produzida, 3, ',', '.') ?>
                                                        <?= $ordem->cod_unidade_medida ?></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <?php if($lista_ordem == false) { ?>
                                    <div class="text-center text-muted">
                                        <p class="font-italic mt-3">Nenhuma ordem de produção planejada para o período
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
                <h5 class="modal-title">Eliminar Ordem de Produção</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Confirma eliminação da(s) ordem(s) de produção selecionada(s)?
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