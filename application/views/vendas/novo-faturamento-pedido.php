<?php $this->load->view('gerais/header', $menu); ?>
<?php $this->load->view('gerais/menu', $menu); ?>

<section>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('visao-geral') ?>">Visão Geral</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('vendas') ?>">Vendas</a></li>
            <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>vendas/faturamento-pedido">Faturamento
                    de Pedido</a></li>
            <li class="breadcrumb-item active">Novo Faturamento de Pedido</li>
        </ol>
    </div>
</section>


<section>
    <div class="container" id="app">
        <div class="row">
            <div class="col-md-4">
                <div class="card  mb-3">
                    <div class="card-body border-bottom">
                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="card-title mb-0">
                                    <strong class="pop-over" data-html="true"  data-toggle="popover" 
                                    title="<strong><?php if($cliente->razao_social != null) echo $cliente->razao_social; else echo $cliente->nome_cliente; ?></strong>" 
                                    data-content="
                                    <ul class='fa-ul ml-4 mb-0'>
                                        <?php if($cliente->tel_fixo != null) echo "<li><i class='fa-li fa-solid fa-square-phone text-muted'></i>" . $cliente->tel_fixo . "</li>"; ?>
                                        <?php if($cliente->tel_cel != null) echo "<li><i class='fa-li fa-solid fa-mobile-retro text-muted'></i>" . $cliente->tel_cel . "</li>"; ?>
                                        <?php if($cliente->email != null) echo "<li><i class='fa-li fa-solid fa-envelope text-muted'></i>" . $cliente->email . "</li>"; ?>
                                        <?php if($cliente->cod_cidade != null && $cliente->cod_cidade != 0) echo "<li><i class='fa-li fa-solid fa-location-dot text-muted'></i>" . $cliente->nome_cidade . " - " . $cliente->uf . "</li>"; ?>
                                    </ul>
                                    ">
                                    <a class="text-dark" target="_blank" href="<?= base_url("painel/clientes/detalhe-cliente/{$cliente->cod_cliente}") ?>"><?= $pedido->cod_cliente ?> - <?= $pedido->nome_cliente ?></a>
                                    </strong>
                                </h5>
                                <?php
                                    if($pedido->data_entrega < date('Y-m-d') && $status != 3 && $status != 4){
                                        echo "<span class='badge bg-danger-light'>Atrasado</span>";

                                    }else{
                                        switch ($status) {
                                            case 1:
                                                echo "<span class='badge bg-light'>Pendente</span>";
                                                break;
                                            case 2:
                                                echo "<span class='badge bg-info-light'>Atendido Parcial</span>";
                                                break;
                                            case 3:
                                                echo "<span class='badge bg-teal-light'>Atendido Total</span>";
                                                break;
                                            case 4:
                                                echo "<span class='badge bg-dark text-white'>Estornado</span>";
                                                break;
                                        } 

                                    }                                                        
                                ?>                               
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">                                
                                <table class="table table-borderless table-sm mb-0">
                                    <tbody>
                                        <tr>
                                            <td class="text-left">
                                                Pedido de venda
                                            </td>
                                            <td class="text-right">
                                                <strong><?= $pedido->num_pedido_venda ?></strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <?php if($pedido->nome_usuario_erp != null || $pedido->nome_usuario_app != null){ ?>
                                <table class="table table-borderless table-sm mb-0">
                                    <tbody>
                                        <tr>
                                            <td class="text-left">
                                                Usuário de criação
                                            </td>
                                            <?php if($pedido->usuario_erp != null){ ?>
                                            <td class="text-right">
                                                <?= $pedido->nome_usuario_erp ?>
                                            </td>
                                            <?php }elseif($pedido->usuario_app != null){ ?>
                                            <td class="text-right">
                                                <?= $pedido->nome_usuario_app ?>
                                            </td>
                                            <?php } ?>
                                        </tr>
                                    </tbody>
                                </table>
                                <?php } ?>
                                <table class="table table-borderless table-sm mb-0">
                                    <tbody>
                                        <tr>
                                            <td class="text-left align-middle ">
                                                Data emissão
                                            </td>
                                            <td class="text-right align-middle">
                                                <?= str_replace('-', '/', date("d-m-Y", strtotime($pedido->data_emissao))) ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left align-middle ">
                                                Data entrega
                                            </td>
                                            <td class="text-right align-middle">
                                                <strong><?= str_replace('-', '/', date("d-m-Y", strtotime($pedido->data_entrega))) ?><strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <?php if($pedido->cod_vendedor != 0) { ?>
                                <table class="table table-borderless table-sm mb-0">
                                    <tbody>
                                        <tr>
                                            <td class="text-left align-middle ">
                                                Vendedor
                                            </td>
                                            <td class="text-right align-middle">
                                                <?= $pedido->nome_vendedor ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <?php } ?>
                                <?php if($pedido->cod_transportador != 0) { ?>
                                <table class="table table-borderless table-sm mb-0">
                                    <tbody>
                                        <tr>
                                            <td class="text-left align-middle ">
                                                Transportador
                                            </td>
                                            <td class="text-right align-middle">
                                                <?= $pedido->nome_transportador ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <?php } ?>
                                <table class="table table-borderless table-sm mb-0">
                                    <tbody>
                                        <tr>
                                            <td class="text-left align-middle ">
                                                Valor em produtos
                                            </td>
                                            <td class="text-right align-middle 
                                            <?php if(($pedido->valor_pedido) > 0) echo "text-teal"; else echo "text-muted";  ?>">
                                                R$
                                                <?= number_format((float) ($pedido->valor_pedido), 2, ',', '.') ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left align-middle ">
                                                Frete
                                                <?php
                                                    if ($pedido->tipo_frete == 1) {
                                                        echo "CIF";
                                                    } elseif ($pedido->tipo_frete == 2) {
                                                        echo "FOB";
                                                    }
                                                ?>
                                            </td>
                                            <td
                                                class="text-right align-middle <?php if($pedido->valor_frete > 0) echo "text-teal"; else echo "text-muted"; ?>">
                                                R$ <?= number_format((float) ($pedido->valor_frete), 2, ',', '.') ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left align-middle">
                                                Seguro
                                            </td>
                                            <td
                                                class="text-right align-middle <?php if($pedido->valor_seguro > 0) echo "text-teal"; else echo "text-muted"; ?>">
                                                R$ <?= number_format((float) ($pedido->valor_seguro), 2, ',', '.') ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left align-middle ">
                                                Outras despesas
                                            </td>
                                            <td
                                                class="text-right align-middle <?php if($pedido->outras_despesas > 0) echo "text-teal"; else echo "text-muted"; ?>">
                                                R$ <?= number_format((float) ($pedido->outras_despesas), 2, ',', '.') ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left align-middle">
                                                Desconto
                                            </td>
                                            <td
                                                class="text-right align-middle <?php if($pedido->valor_desconto > 0) echo "text-danger"; else echo "text-muted"; ?>">
                                                <?php
                                                    if ($pedido->tipo_desconto == 1) {
                                                        echo "R$";
                                                    }
                                                    ?> <?= number_format((float) ($pedido->valor_desconto), 2, ',', '.') ?>
                                                <?php
                                                    if ($pedido->tipo_desconto == 2) {
                                                        echo "%";
                                                    }
                                                    ?>
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
                                    <td class="text-left pt-0 text-dark"><strong>TOTAL DO PEDIDO</strong></td>
                                    <td
                                        class="text-right pt-0 <?php if(($pedido->valor_pedido + $pedido->valor_frete + $pedido->valor_seguro + $pedido->outras_despesas - $pedido->valor_desconto_con) > 0) echo "text-teal";  ?>">
                                        <strong>
                                            R$ <?= number_format((float) ($pedido->valor_pedido + $pedido->valor_frete + $pedido->valor_seguro + $pedido->outras_despesas - $pedido->valor_desconto_con), 2, ',', '.') ?>
                                        </strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-left pt-0 text-dark"><strong>TOTAL FATURADO</strong></td>
                                    <td
                                        class="text-right pt-0 <?php if($pedido->valor_total_faturado > 0) echo "text-teal"; else echo "text-muted"; ?>">
                                        <strong>
                                            R$ <?= number_format((float) ($pedido->valor_total_faturado), 2, ',', '.') ?>
                                        </strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php if($pedido->observacoes != "") { ?>
                <div class="card  mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <p class="card-text text-muted mb-0">Observação</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <?= $pedido->observacoes ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="col-md-8 pl-0">
                <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#faturamento" role="tab"
                            aria-controls="home" aria-selected="true">Faturamentos do Pedido</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#produtos" role="tab"
                            aria-controls="profile" aria-selected="false">Produtos do Pedido</a>
                    </li>
                </ul>
                <div class="card  mb-3">
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="faturamento" role="tabpanel"
                                aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-xs-12">
                                        <?php if ($this->session->flashdata('erro') <> "") { ?>
                                        <div class="alert alert-danger alert-dismissible fade show" id="alert"
                                            role="alert">
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                            <strong>Atenção!</strong> <?= $this->session->flashdata('erro') ?>
                                        </div>
                                        <?php }
                                        $this->session->set_flashdata('erro', ''); ?>
                                        <?php if ($this->session->flashdata('sucesso') <> "") { ?>
                                        <div class="alert alert-success alert-dismissible fade show" id="alert"
                                            role="alert">
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                            <strong>Muito bem!</strong>
                                            <?= $this->session->flashdata('sucesso') ?>
                                        </div>
                                        <?php }
                                        $this->session->set_flashdata('sucesso', ''); ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row ">
                                                    <div class="col-md-12">
                                                        <button data-toggle="modal" data-target="#inserir-faturamento"
                                                            type="button" class="btn btn-outline-info btn-sm"
                                                            data-backdrop="static" data-keyboard="false"
                                                            <?php if ($lista_produto == false) echo "disabled"; ?>><i
                                                                class="fas fa-plus-circle"></i> Inserir
                                                            Faturamento
                                                        </button>
                                                        <button data-toggle="modal" data-target="#estorna-faturamento"
                                                            type="button" class="btn btn-outline-danger btn-sm"
                                                            id="btnEstorno" disabled><i class="fas fa-undo"></i>
                                                            Estornar Faturamento
                                                        </button>
                                                    </div>
                                                </div>
                                                <form class="mb-0 needs-validation" novalidate
                                                    action="<?= base_url("vendas/faturamento-pedido/estornar-faturamento-pedido/{$pedido->num_pedido_venda}") ?>"
                                                    method="POST" id="EstornaSaida">
                                                    <table class="table table-bordered table-nf mb-3">
                                                        <thead class="thead-light">
                                                            <tr>
                                                                <th scope="col" class="text-center"><i
                                                                        class="fa-solid fa-check"></i></th>
                                                                <th scope="col" class="text-center">Faturamento</th>
                                                                <th scope="col" class="text-center">Data</th>
                                                                <th scope="col" class="text-right">Total faturado</th>
                                                                <th scope="col" class="text-center"><i
                                                                        class="fa-solid fa-ellipsis"></i></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($lista_faturamento as $key_faturamento => $faturamento) { ?>
                                                            <tr>
                                                                <td>
                                                                    <div class="checkbox text-center">
                                                                        <input name="estornar_todos[]" type="checkbox"
                                                                            <?php if($faturamento->nf_id != null && $faturamento->c_stat != "101") echo "disabled"; ?>
                                                                            value="<?= $faturamento->cod_faturamento_pedido ?>" />
                                                                    </div>
                                                                </td>
                                                                <td scope="row" class="text-center">
                                                                    <a href="#" data-toggle="modal" class="text-dark"
                                                                        data-target="#produto-faturado<?= $faturamento->cod_faturamento_pedido ?>">
                                                                        <?= $faturamento->cod_faturamento_pedido ?>
                                                                    </a>
                                                                </td>
                                                                <td class="text-center">
                                                                    <a href="#" data-toggle="modal" class="text-dark"
                                                                        data-target="#produto-faturado<?= $faturamento->cod_faturamento_pedido ?>"><?= str_replace('-', '/', date("d-m-Y", strtotime($faturamento->data_faturamento))) ?></a>
                                                                </td>
                                                                <td class="text-right text-teal">
                                                                    R$
                                                                    <?= number_format((float) ($faturamento->valor_total + $faturamento->valor_frete + $faturamento->valor_seguro + $faturamento->outras_despesas -
                                                                                    $faturamento->valor_desconto), 2, ',', '.') ?>
                                                                </td>
                                                                <td class="text-center">
                                                                    <?php
                                                                                switch ($faturamento->c_stat) {
                                                                                    case '100':
                                                                                        $xml = $baseNFeDir . $faturamento->chave . '-nfe.xml';
                                                                                        $danfe = base_url("faturamento/pedido/danfe/" . $faturamento->nf_id);
                                                                                        $cancela = base_url("faturamento/pedido/cancelar-nfe/" .
                                                                                                            $faturamento->nf_id);
                                                                                        $cartaCorrecao = base_url("faturamento/pedido/emitir-carta-correcao/" .
                                                                                                            $faturamento->nf_id);
                                                                                        echo ' 
                                                                                            <div class="btn-group" role="group">
                                                                                                <button type="button" class="btn btn-outline-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                                <i class="fas fa-bars"></i> Opções
                                                                                                </button>
                                                                                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">                                                                                                
                                                                                                <a class="dropdown-item" href="#" onclick="ImprimeNF(' . $faturamento->nf_id.');">Imprimir DANFE</a>
                                                                                                <a class="dropdown-item" href="' . $xml . ' " target="_blank">Download XML</a>
                                                                                                <div class="dropdown-divider"></div>
                                                                                                <a class="dropdown-item link-load" href="' . $cartaCorrecao . '">Emitir Carta de Correção</a>
                                                                                                <a class="dropdown-item link-load" href="' . $cancela . '">Cancelar NF-e</a>
                                                                                                </div>
                                                                                            </div>';
                                                                                        break;
                                                                                    default:
                                                                                        break;

                                                                                }
                                                                                ?>
                                                                    <?php if (!$faturamento->c_stat || $faturamento->c_stat > 199) { ?>
                                                                    <a href="<?php echo base_url("faturamento/pedido/{$faturamento->cod_faturamento_pedido}/configurar-nfe") ?>"
                                                                        class="link-load btn btn-outline-teal btn-sm"><i
                                                                            class="far fa-file-alt"></i> Emitir NF-e</a>
                                                                    <?php } ?>
                                                                </td>
                                                            </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                    <?php if ($lista_faturamento == false) { ?>
                                                    <div class="text-center text-muted">
                                                        <p class="font-italic mt-3">Nenhum faturamento realizado</p>
                                                    </div>
                                                    <?php } ?>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="produtos">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-xs-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="table table-bordered table-nf">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th scope="col" class="text-left">Produto</th>
                                                            <th scope="col" class="text-right">Quant</th>
                                                            <th scope="col" class="text-right">Valor unit</th>
                                                            <th scope="col" class="text-right">Valor total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($lista_produto as $key_produto_venda => $produto_venda) { ?>
                                                        <tr>
                                                            <td scope="row" class="text-left align-middle">
                                                                <?= $produto_venda->cod_produto ?> -
                                                                <?= $produto_venda->nome_produto ?>
                                                            </td>
                                                            <td class="text-right text-info align-middle">
                                                                <?= number_format((float) ($produto_venda->quant_pedida), 3, ',', '.') ?>
                                                                <?= $produto_venda->cod_unidade_medida ?>
                                                            </td>
                                                            <td class="text-right text-dark">
                                                                R$
                                                                <?= number_format((float) ($produto_venda->valor_unitario), 2, ',', '.') ?>
                                                            </td>
                                                            <td class="text-right align-middle text-teal">
                                                                R$
                                                                <?= number_format((float) ($produto_venda->valor_unitario * $produto_venda->quant_pedida), 2, ',', '.') ?>
                                                            </td>
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                                <?php if ($lista_produto == false) { ?>
                                                <div class="text-center text-muted">
                                                    <p class="font-italic mt-3">Nenhum produto no pedido
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
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="estorna-faturamento" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Estornar faturamento do pedido</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Confirma o estorno dos faturamentos selecionadas?
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger" form="EstornaSaida">Confirma</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="inserir-faturamento">
    <div class="modal-dialog modal-dialog-centered modal-xxl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Faturar pedido</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modal-body-scroll bg-light">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body border-bottom">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5 class="card-title mb-0">
                                            <strong>
                                                <?= $pedido->cod_cliente ?> - <?= $pedido->nome_cliente ?>
                                            </strong>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-borderless table-sm mb-0">
                                            <tbody>
                                                <tr>
                                                    <td class="text-left">
                                                        Pedido de venda
                                                    </td>
                                                    <td class="text-right">
                                                        <strong><?= $pedido->num_pedido_venda ?></strong>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table table-borderless table-sm mb-0">
                                            <tbody>
                                                <tr>
                                                    <td class="text-left align-middle ">
                                                        Data emissão
                                                    </td>
                                                    <td class="text-right align-middle">
                                                        <?= str_replace('-', '/', date("d-m-Y", strtotime($pedido->data_emissao))) ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle ">
                                                        Data entrega
                                                    </td>
                                                    <td class="text-right align-middle">
                                                        <strong><?= str_replace('-', '/', date("d-m-Y", strtotime($pedido->data_entrega))) ?></strong>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <?php if($pedido->cod_vendedor != 0 || $pedido->cod_transportador != 0) { ?>
                                        <table class="table table-borderless table-sm mb-0">
                                            <tbody>
                                                <?php if($pedido->cod_vendedor != 0) { ?>
                                                <tr>
                                                    <td class="text-left align-middle ">
                                                        Vendedor
                                                    </td>
                                                    <td class="text-right align-middle">
                                                        <?= $pedido->nome_vendedor ?>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        <?php } ?>
                                        <?php if($pedido->cod_transportador != 0) { ?>
                                        <table class="table table-borderless table-sm mb-0">
                                            <tbody>
                                                <tr>
                                                    <td class="text-left align-middle ">
                                                        Transportador
                                                    </td>
                                                    <td class="text-right align-middle">
                                                        <?= $pedido->nome_transportador ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <?php } ?> 
                                        <table class="table table-borderless table-sm">
                                            <?php
                                            if($pedido->tipo_desconto == 1)
                                                $valorDesconto = $pedido->valor_desconto;
                                            elseif($pedido->tipo_desconto == 2 && $pedido->valor_desconto > 0)
                                                $valorDesconto = $pedido->valor_pedido * ($pedido->valor_desconto / 100);
                                            ?>
                                            <tbody>
                                                <tr>
                                                    <td class="text-left align-middle">
                                                        Total em produtos
                                                    </td>
                                                    <td id="idTdProduto"
                                                        class="text-right align-middle <?php if($pedido->valor_pedido > 0) echo "text-teal"; else echo "text-muted"; ?>">
                                                        R$ <span id="idProduto"><?= number_format((float) ($pedido->valor_pedido), 2, ',', '.') ?><span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle ">
                                                        Frete <?php if($pedido->tipo_frete == 1) echo "CIF"; else echo "FOB"; ?>
                                                    </td>
                                                    <td id="idTdFrete"
                                                        class="text-right align-middle <?php if($pedido->valor_frete > 0) echo "text-teal"; else echo "text-muted"; ?>">
                                                        R$ <span id="idFrete"><?= number_format((float) ($pedido->valor_frete), 2, ',', '.') ?></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle">
                                                        Seguro
                                                    </td>
                                                    <td id="idTdSeguro"
                                                        class="text-right align-middle <?php if($pedido->valor_seguro > 0) echo "text-teal"; else echo "text-muted"; ?>">
                                                        R$ <span id="idSeguro"><?= number_format((float) ($pedido->valor_seguro), 2, ',', '.') ?></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle ">
                                                        Outras despesas
                                                    </td>
                                                    <td id="idTdOutrasDespesas"
                                                        class="text-right align-middle <?php if($pedido->outras_despesas > 0) echo "text-teal"; else echo "text-muted"; ?>">
                                                        R$
                                                        <span id="idOutrasDespesas"><?= number_format((float) ($pedido->outras_despesas), 2, ',', '.') ?></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle">
                                                        Desconto
                                                    </td>
                                                    <td id="idTdDesconto"
                                                        class="text-right align-middle <?php if($valorDesconto> 0) echo "text-danger"; else echo "text-muted"; ?>">
                                                        R$
                                                        <span id="idDesconto"><?= number_format((float) ($valorDesconto), 2, ',', '.') ?></span>
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
                                            <td class="text-left pt-0 text-dark"><strong>TOTAL A FATURAR</strong></td>
                                            <td id="idTdTotalPedido"
                                                class="text-right pt-0 <?php if($pedido->valor_pedido + $pedido->valor_frete + $pedido->valor_seguro + $pedido->outras_despesas - $valorDesconto > 0) echo "text-teal"; ?>">
                                                <strong>
                                                    R$
                                                    <span id="idTotalPedido"><?= number_format((float) ($pedido->valor_pedido + $pedido->valor_frete + $pedido->valor_seguro + $pedido->outras_despesas - $valorDesconto), 2, ',', '.') ?></span>
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
                                <a class="nav-link active" data-toggle="tab" href="#faturamento-ped">Faturamento</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#financeiro">Financeiro</a>
                            </li>
                        </ul>
                        <form class="mb-0 needs-validation" novalidate
                            action="<?= base_url("vendas/faturamento-pedido/inserir-faturamento/{$pedido->num_pedido_venda}/{$pedido->cod_cliente}") ?>"
                            method="POST" id="InserirFaturamento">
                            <div class="card">
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane fade active show" id="faturamento-ped">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label class="control-label" for="inputDataFaturamento">Data
                                                                do Faturamento <span
                                                                    class="text-danger">*</span></label>
                                                            <input class="form-control" id="inputDataFaturamento"
                                                                type="text" name="DataFaturamento" value="<?php if (set_value('DataFaturamento') == "") {
                                                                                echo str_replace('-', '/', date("d-m-Y"));
                                                                              } else {
                                                                                echo set_value('DataFaturamento');
                                                                              } ?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <?php

                                                    if($pedido->tipo_desconto == 1)
                                                        $valorDesconto = $pedido->valor_desconto;
                                                    elseif($pedido->tipo_desconto == 2 && $pedido->valor_desconto > 0)
                                                        $valorDesconto = $pedido->valor_pedido * ($pedido->valor_desconto / 100);
                                                    ?>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-3">
                                                            <label class="control-label">Valor Frete</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">R$</span>
                                                                </div>
                                                                <input class="form-control" id="inputValorFrete"
                                                                    name="ValorFrete" type="text" data-mask="#.##0,00"
                                                                    data-mask-reverse="true"
                                                                    value="<?= number_format((float) ($pedido->valor_frete), 2, ',', '.') ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="control-label">Valor Seguro</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">R$</span>
                                                                </div>
                                                                <input class="form-control" id="inputSeguro"
                                                                    name="Seguro" type="text" data-mask="#.##0,00"
                                                                    data-mask-reverse="true"
                                                                    value="<?= number_format((float) ($pedido->valor_seguro), 2, ',', '.') ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="control-label">Outras Despesas</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">R$</span>
                                                                </div>
                                                                <input class="form-control" id="inputOutrasDespesas"
                                                                    name="OutrasDespesas" type="text"
                                                                    data-mask="#.##0,00" data-mask-reverse="true"
                                                                    value="<?= number_format((float) ($pedido->outras_despesas), 2, ',', '.') ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="control-label">Valor Desconto</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">R$</span>
                                                                </div>
                                                                <input class="form-control " id="inputValorDesconto"
                                                                    name="ValorDesconto" type="text"
                                                                    data-mask="#.##0,00" data-mask-reverse="true"
                                                                    value="<?= number_format((float) ($valorDesconto), 2, ',', '.') ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row" hidden>
                                                        <div class="form-group col-md-6">
                                                            <label class="control-label">Total em Produtos</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">R$</span>
                                                                </div>
                                                                <input class="form-control text-center" id="inputBruto"
                                                                    name="ValorBruto" type="text" data-mask="#.##0,00"
                                                                    data-mask-reverse="true"
                                                                    value="<?= number_format((float) ($pedido->valor_pedido), 2, ',', '.') ?>"
                                                                    readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="control-label">Total a Faturar</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">R$</span>
                                                                </div>
                                                                <input class="form-control text-center text-teal"
                                                                    id="inputValorLiq" name="ValorLiq" type="text"
                                                                    data-mask="#.##0,00" data-mask-reverse="true"
                                                                    value="<?= number_format((float) ($pedido->valor_pedido + $pedido->valor_frete + $pedido->valor_seguro + $pedido->outras_despesas - $valorDesconto), 2, ',', '.') ?>"
                                                                    readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <table class="table table-bordered table-reporte">
                                                        <thead class="thead-light">
                                                            <tr>
                                                                <th scope="col" class="text-center">
                                                                    <i class="fa-solid fa-ellipsis"></i>
                                                                </th>
                                                                <th scope="col">Produto</th>
                                                                <th scope="col" class="text-right">Quant</th>
                                                                <th scope="col" class="text-right">Total</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($lista_produto as $key_produto => $produto) {
                                                                if (($produto->quant_pedida - $produto->quant_atendida) > 0) {
                                                                    $quantSaldo = $produto->quant_pedida - $produto->quant_atendida;
                                                                } else {
                                                                    $quantSaldo = $produto->quant_pedida;
                                                                }
                                                                ?>
                                                            <tr>
                                                                <td class="text-center">
                                                                    <?php if($produto->tipo_controle == 2) { ?>
                                                                    <a href="#" class="text-teal accordion-toggle" id="detail<?= $produto->cod_produto ?>"
                                                                    data-toggle="collapse" data-target="#produto<?= $produto->cod_produto ?>">
                                                                        <i class="fa-solid fa-angle-right"></i>                                                          
                                                                    </a>
                                                                    <?php }else{ ?>
                                                                        <i class="fa-solid fa-angle-right text-muted"></i>
                                                                    <?php } ?>
                                                                </td> 
                                                                <td class="align-middle limit-text-30" data-toggle="tooltip"
                                                                    data-placement="bottom"
                                                                    title="<?= $produto->nome_produto ?>"><?= $produto->cod_produto ?> -
                                                                    <?= $produto->nome_produto ?></td>
                                                                <td width="150" class="align-middle">
                                                                    <div class="input-group">
                                                                        <input class="form-control text-right"
                                                                            id="inputQuantVendida<?= $produto->cod_produto ?>"
                                                                            name="quantVendida[<?= $produto->seq_produto_venda ?>]"
                                                                            type="text" data-mask="#.##0,000"
                                                                            data-mask-reverse="true"
                                                                            value="<?= number_format((float) ($quantSaldo), 3, ',', '.') ?>"
                                                                            required>
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text"
                                                                                style="width: 40px;"><?= $produto->cod_unidade_medida ?></span>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="text-right text-teal align-middle" width="120"
                                                                    id="inputValorVenda<?= $produto->cod_produto ?>">
                                                                    R$
                                                                    <?= number_format((float) ($quantSaldo * $produto->valor_unitario), 2, ',', '.') ?>
                                                                </td>
                                                            </tr>
                                                            <?php if($produto->tipo_controle == 2) { ?>
                                                            <tr class="accordian-body collapse p-3 hiddenRow" id="produto<?= $produto->cod_produto ?>">
                                                                <td colspan="6" class="bg-white-light "> 
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-12">
                                                                            <label for="inputLote<?= $produto->cod_produto ?>">Lote <span class="text-danger">*</span></label>
                                                                            <div class="input-group">
                                                                                <select id="inputLote<?= $produto->cod_produto ?>" class="selectpicker show-tick form-control"
                                                                                    data-live-search="true" data-actions-box="true" title=" "
                                                                                    data-style="btn-input-primary" name="loteVenda[<?= $produto->seq_produto_venda ?>]" required>
                                                                                    <?php foreach($lista_lote_produto as $key_lote => $lote) { if($lote->cod_produto == $produto->cod_produto) { ?>
                                                                                    <option  class="<?php if((date("Y-m-d", strtotime('-' . $lote->dias_aviso_venc . ' days', strtotime($lote->data_validade)))) <= date("Y-m-d") && $lote->data_validade != date("Y-m-d")) echo "text-warning";
                                                                                                          elseif($lote->data_validade == date("Y-m-d")) echo "text-danger"; ?>"
                                                                                             value="<?= $lote->cod_lote ?>" class="limit-text-50"
                                                                                        <?php if($lote->cod_lote == set_value('CodLoteMov')) echo "selected"; ?>>
                                                                                        <?= $lote->cod_lote ?> -
                                                                                        <?= str_replace('-', '/', date("d-m-Y", strtotime($lote->data_validade))) ?></option>
                                                                                    <?php }} ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div> 
                                                                </td>
                                                            </tr> 
                                                            <?php } ?> 
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                    <?php if ($lista_produto == false) { ?>
                                                    <div class="text-center">
                                                        <p>Nenhum produto de venda adicionado</p>
                                                    </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="inputObservacao">Observações do Faturamento</label>
                                                    <textarea class="form-control" rows="3"
                                                              id="inputObservacao	"
                                                              name="ObservFatur"><?= set_value('ObservReceb'); ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="financeiro">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-5">
                                                            <label>Centro de Custo</label>
                                                            <select class="selectpicker show-tick form-control"
                                                                data-live-search="true" data-actions-box="true"
                                                                title=" "
                                                                name="CodCentroCusto" data-style="btn-input-primary">
                                                                <?php foreach ($lista_centro_custo as $key_centro_custo => $centro_custo) { ?>
                                                                <option value="<?= $centro_custo->cod_centro_custo ?>"
                                                                    <?php if ($centro_custo->cod_centro_custo ==
                                                                                                        $empresa->centro_custo_vendas) echo "selected"; ?>>
                                                                    <?= $centro_custo->cod_centro_custo ?> -
                                                                    <?= $centro_custo->nome_centro_custo ?>
                                                                </option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-5">
                                                            <label>Conta Contábil</label>
                                                            <select class="selectpicker show-tick form-control"
                                                                id="inputContaContabil<?= $produto->cod_produto ?>"
                                                                data-live-search="true" data-actions-box="true"
                                                                title=" "
                                                                name="CodContaContabil" data-style="btn-input-primary">
                                                                <?php foreach ($lista_conta_contabil as $key_conta_contabil => $conta_contabil) { ?>
                                                                <option
                                                                    value="<?= $conta_contabil->cod_conta_contabil ?>"
                                                                    <?php if ($conta_contabil->cod_conta_contabil ==
                                                                                                            $empresa->conta_contabil_vendas) echo "selected"; ?>>
                                                                    <?= $conta_contabil->cod_conta_contabil ?> -
                                                                    <?= $conta_contabil->nome_conta_contabil ?>
                                                                </option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label for="inputParcelas">Parcelamento</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control search" id="inputParcelas" data-mask="#.##0" data-mask-reverse="true" value="1" name="Parcelas">
                                                                <div class="input-group-append">
                                                                    <button type="button" class="btn btn-outline-info" id="btnParcelas"><i class="fa-solid fa-check"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <ul class="list-group list-group-flush" id="pacela-table">
                                                        <li class="list-group-item row">
                                                            <div class="form-row">
                                                                <div class="form-group col-md-12">
                                                                    <h5><strong>Parcela: 1/1</strong></h5>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-4">
                                                                    <label class="control-label"
                                                                        for="inputDataVencimento1">Data de Vencimento
                                                                        <span class="text-danger">*</span></label>
                                                                    <input type="text" class="form-control"
                                                                        id="inputDataVencimento1"
                                                                        name="DataVencimento[1]"
                                                                        value="<?php if(set_value('DataVencimento[1]') == ""){
                                                                                echo str_replace('-', '/', date("d-m-Y"));
                                                                            }else{ echo set_value('DataVencimento[1]'); } ?>" required>
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label class="control-label"
                                                                        for="inputValorParcela1">Valor da Parcela <span
                                                                            class="text-danger">*</span></label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">R$</span>
                                                                        </div>
                                                                        <input class="form-control"
                                                                            id="inputValorParcela1"
                                                                            name="ValorParcela[1]" type="text"
                                                                            data-mask="#.##0,00" inputmode="numeric"
                                                                            data-mask-reverse="true" ]
                                                                            value="<?= number_format((float) ($pedido->valor_pedido + $pedido->valor_frete + $pedido->valor_seguro + $pedido->outras_despesas - $valorDesconto), 2, ',', '.') ?>"
                                                                            required>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label>Método de Pagamento</label>
                                                                    <select class="selectpicker show-tick form-control"
                                                                        data-live-search="true" data-actions-box="true"
                                                                        title=" "
                                                                        name="CodMetodoPagamento[1]"
                                                                        data-style="btn-input-primary">
                                                                        <?php foreach ($lista_metodo_pagamento as $key_metodo_pagamento => $metodo_pagamento) { ?>
                                                                        <option
                                                                            value="<?= $metodo_pagamento->cod_metodo_pagamento ?>"
                                                                            <?php if ($metodo_pagamento->cod_metodo_pagamento ==
                                                                                                                set_value('CodMetodoPagamento')) echo "selected"; ?>>
                                                                            <?= $metodo_pagamento->cod_metodo_pagamento ?>
                                                                            -
                                                                            <?= $metodo_pagamento->nome_metodo_pagamento ?>
                                                                        </option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-teal" form="InserirFaturamento"><i class="fa-solid fa-circle-dollar-to-slot"></i>
                    Faturar Pedido
                </button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<?php foreach ($lista_faturamento as $key_faturamento => $faturamento) { ?>
<div class="modal fade" id="produto-faturado<?= $faturamento->cod_faturamento_pedido ?>">
    <div class="modal-dialog modal-dialog-centered modal-xxl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detalhes do faturamento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modal-body-scroll bg-light">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body border-bottom">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5 class="card-title mb-0">
                                            <strong>
                                                Faturamento <?= $faturamento->cod_faturamento_pedido ?>
                                            </strong>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-borderless table-sm mb-0">
                                            <tbody>
                                                <tr>
                                                    <td class="text-left align-middle">
                                                        Pedido
                                                    </td>
                                                    <td class="text-right align-middle">
                                                        <strong><?= $faturamento->num_pedido_venda ?></strong>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle">
                                                        Data de entrega
                                                    </td>
                                                    <td class="text-right align-middle">
                                                        <?= str_replace('-', '/', date("d-m-Y", strtotime($pedido->data_entrega))) ?> 
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle">
                                                        Data de faturamento
                                                    </td>
                                                    <td class="text-right align-middle">
                                                        <?= str_replace('-', '/', date("d-m-Y", strtotime($faturamento->data_faturamento))) ?> 
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <?php if($faturamento->nome_usuario != null){ ?>
                                        <table class="table table-borderless table-sm mb-0">
                                            <tbody>
                                                <tr>
                                                    <td class="text-left align-middle">
                                                        Usuário de faturamento
                                                    </td>
                                                    <td class="text-right align-middle">
                                                        <?= $faturamento->nome_usuario ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <?php } ?>
                                        <?php if($faturamento->cod_vendedor != 0) { ?>
                                        <table class="table table-borderless table-sm mb-0">
                                            <tbody>
                                                <tr>
                                                    <td class="text-left align-middle ">
                                                        Vendedor
                                                    </td>
                                                    <td class="text-right align-middle">
                                                        <?= $faturamento->nome_vendedor ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle ">
                                                        Comissão
                                                    </td>
                                                    <td class="text-right align-middle <?php if($faturamento->perc_comissao > 0) echo "text-info"; else echo "text-muted"; ?>">
                                                        <?= number_format((float) ($faturamento->perc_comissao), 2, ',', '.') ?>%
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <?php } ?>
                                        <?php if($faturamento->cod_transportador != 0) { ?>
                                        <table class="table table-borderless table-sm mb-0">
                                            <tbody>
                                                <tr>
                                                    <td class="text-left align-middle ">
                                                        Transportador
                                                    </td>
                                                    <td class="text-right align-middle">
                                                        <?= $pedido->nome_transportador ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <?php } ?>                                        
                                        <table class="table table-borderless table-sm">
                                            <tbody>
                                                <tr>
                                                    <td class="text-left align-middle">
                                                        Total em produtos
                                                    </td>
                                                    <td
                                                        class="text-right align-middle <?php if($faturamento->valor_total > 0) echo "text-teal"; else echo "text-muted"; ?>">
                                                        R$ <?= number_format((float) ($faturamento->valor_total), 2, ',', '.') ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle ">
                                                        Frete <?php if($faturamento->tipo_frete == 1) echo "CIF"; else echo "FOB"; ?>
                                                    </td>
                                                    <td
                                                        class="text-right align-middle <?php if($faturamento->valor_frete > 0) echo "text-teal"; else echo "text-muted"; ?>">
                                                        R$ <?= number_format((float) ($faturamento->valor_frete), 2, ',', '.') ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle">
                                                        Seguro
                                                    </td>
                                                    <td
                                                        class="text-right align-middle <?php if($faturamento->valor_seguro > 0) echo "text-teal"; else echo "text-muted"; ?>">
                                                        R$ <?= number_format((float) ($faturamento->valor_seguro), 2, ',', '.') ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle ">
                                                        Outras despesas
                                                    </td>
                                                    <td
                                                        class="text-right align-middle <?php if($faturamento->outras_despesas > 0) echo "text-teal"; else echo "text-muted"; ?>">
                                                        R$
                                                        <?= number_format((float) ($faturamento->outras_despesas), 2, ',', '.') ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle">
                                                        Desconto
                                                    </td>
                                                    <td
                                                        class="text-right align-middle <?php if($faturamento->valor_desconto > 0) echo "text-danger"; else echo "text-muted"; ?>">
                                                        R$
                                                        <?= number_format((float) ($faturamento->valor_desconto), 2, ',', '.') ?>
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
                                            <td class="text-left pt-0 text-dark"><strong>TOTAL FATURADO</strong></td>
                                            <td
                                                class="text-right pt-0 <?php if($pedido->valor_total_faturado > 0) echo "text-teal"; ?>">
                                                <strong>
                                                    R$ <?= number_format((float) ($faturamento->valor_total + $faturamento->valor_frete + $faturamento->valor_seguro + $faturamento->outras_despesas -
                                                      $faturamento->valor_desconto), 2, ',', '.') ?>
                                                </strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <?php if($faturamento->observacoes != "") { ?>
                        <div class="card  mt-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 mb-2">
                                        <p class="card-text text-muted mb-0">Observação</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <?= $faturamento->observacoes ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="col-md-8 pl-0">
                        <ul class="nav nav-tabs mb-3">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#prod-faturado<?= $faturamento->cod_faturamento_pedido ?>">Produtos Faturados</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#titulos<?= $faturamento->cod_faturamento_pedido ?>">Títulos Emitidos</a>
                            </li>
                            <?php if($faturamento->nf_id != null){ ?>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#eventos-nf<?= $faturamento->cod_faturamento_pedido ?>">Eventos da NF</a>
                            </li>
                            <?php } ?>
                        </ul>
                        <div class="card">
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane fade active show" id="prod-faturado<?= $faturamento->cod_faturamento_pedido ?>">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered">
                                                        <thead class="thead-light">
                                                            <tr>
                                                                <th scope="col">Produto</th>
                                                                <th scope="col">Lote</th>
                                                                <th scope="col" class="text-right">Quant</th>
                                                                <th scope="col" class="text-right">Total</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $i = 0; foreach ($lista_faturamento_produto as $key_faturamento_produto => $faturamento_produto) {
                                                                if ($faturamento_produto->faturamento_pedido == $faturamento->cod_faturamento_pedido) { $i += 1; ?>
                                                            <tr>
                                                                <td class="limit-text-50 align-middle" data-toggle="tooltip"
                                                                    data-placement="bottom"
                                                                    title="<?= $faturamento_produto->nome_produto ?>">
                                                                    <?= $faturamento_produto->cod_produto ?> - <?= $faturamento_produto->nome_produto ?>
                                                                </td>
                                                                <td class="align-middle">
                                                                    <?= $faturamento_produto->cod_lote ?>
                                                                </td>
                                                                <td class="text-right align-middle">
                                                                    <?= number_format((float) ($faturamento_produto->quantidade), 3, ',', '.') ?>
                                                                    <?= $faturamento_produto->cod_unidade_medida ?>
                                                                </td>
                                                                <td class="text-right text-teal align-middle">
                                                                    R$
                                                                    <?= number_format((float) ($faturamento_produto->quantidade * $faturamento_produto->valor_unitario), 2, ',', '.') ?>
                                                                </td>
                                                            </tr>
                                                            <?php }
                                                            } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <?php if ($i == 0) { ?>
                                                <div class="text-center text-muted">
                                                     <p class="font-italic mt-3">Nenhum produto para vender</p>
                                                </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="titulos<?= $faturamento->cod_faturamento_pedido ?>">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered">
                                                        <thead class="thead-light">
                                                            <tr>
                                                                <th scope="col" class="text-center border-right-0"><i class="fa-solid fa-check"></i>
                                                                </th>
                                                                <th scope="col" class="text-center">Vencimento</th>
                                                                <th scope="col">Descrição</th>
                                                                <th scope="col" class="text-center">Parcela</th>
                                                                <th scope="col" class="text-right">Valor</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="table-sm">
                                                            <?php $i = 0; foreach ($lista_faturamento_titulo as $key_faturamento_titulo => $faturamento_titulo) {
                                                                if ($faturamento_titulo->cod_faturamento_pedido == $faturamento->cod_faturamento_pedido) { $i += 1; ?>
                                                            <tr>
                                                                <td class="align-middle text-center">
                                                                    <?php if($faturamento_titulo->confirmado == 1) { ?>
                                                                    <i class="fa-solid fa-xs fa-circle-check text-teal"></i>
                                                                    <?php } else { ?>
                                                                    <i class="fa fa-circle fa-xs text-light"> </i>
                                                                    <?php } ?>
                                                                </td>
                                                                <td class="text-center align-middle">
                                                                    <?= str_replace('-', '/', date("d-m-Y", strtotime($faturamento_titulo->data_vencimento))) ?>
                                                                </td>
                                                                <td class="limit-text-40 align-middle" data-toggle="tooltip"
                                                                    data-placement="bottom"
                                                                    title="<?= $faturamento_titulo->desc_movimento ?>">
                                                                    <?= $faturamento_titulo->desc_movimento ?><br>
                                                                    <span
                                                                        class='badge bg-info-light'><?= $faturamento_titulo->nome_conta ?></span>
                                                                    <?php if($faturamento_titulo->nome_metodo_pagamento != null) { ?>
                                                                    <span
                                                                        class="badge text-muted font-italic"><?= $faturamento_titulo->nome_metodo_pagamento ?></span>
                                                                    <?php }?>
                                                                </td>
                                                                <td class="text-center align-middle">
                                                                    <?= $faturamento_titulo->parcela ?>
                                                                </td>
                                                                <td class="text-right text-teal align-middle">
                                                                    R$
                                                                    <?= number_format((float) ($faturamento_titulo->valor_titulo), 2, ',', '.') ?>
                                                                </td>
                                                            </tr>
                                                            <?php }
                                                            } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <?php if ($i == 0) { ?>
                                                <div class="text-center text-muted">
                                                     <p class="font-italic mt-3">Nenhum título emitido para o faturamento</p>
                                                </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if($faturamento->nf_id != null){ ?>
                                    <div class="tab-pane fade" id="eventos-nf<?= $faturamento->cod_faturamento_pedido ?>">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered">
                                                        <thead class="thead-light">
                                                            <tr>
                                                                <th scope="col" class="text-center">Data hora</th>
                                                                <th scope="col">Tipo</th>
                                                                <th scope="col">Justificativa</th>
                                                                <th scope="col">Motivo</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $i = 0; foreach ($lista_evento as $key_evento => $evento) {
                                                                if ($evento->cod_faturamento_pedido == $faturamento->cod_faturamento_pedido) { $i += 1; ?>
                                                            <tr>
                                                                <td class="text-center align-middle">
                                                                    <?= str_replace('-', '/', date("d-m-Y H:i:s", strtotime($evento->dh_evento))) ?>
                                                                </td>
                                                                <td class="align-middle">
                                                                <?php 
                                                                    if($evento->tp_evento == 110111){
                                                                        echo "Cancelamento";
                                                                    }elseif($evento->tp_evento == 110110){
                                                                        echo "Carta de Correção";
                                                                    }
                                                                ?>
                                                                </td>
                                                                <td class="limit-text-40 align-middle" data-toggle="tooltip"
                                                                    data-placement="bottom"
                                                                    title="<?php 
                                                                                if($evento->tp_evento == 110111){
                                                                                    echo $evento->x_just;
                                                                                }elseif($evento->tp_evento == 110110){
                                                                                    echo $evento->x_correcao;
                                                                                }
                                                                            ?>">
                                                                <?php 
                                                                    if($evento->tp_evento == 110111){
                                                                        echo $evento->x_just;
                                                                    }elseif($evento->tp_evento == 110110){
                                                                        echo $evento->x_correcao;
                                                                    }
                                                                ?>
                                                                </td>                                                                
                                                                <td class="limit-text-40 align-middle" data-toggle="tooltip"
                                                                    data-placement="bottom"
                                                                    title="<?= $evento->x_motivo ?>">
                                                                <?= $evento->x_motivo ?>
                                                                </td> 
                                                            </tr>
                                                            <?php }
                                                            } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <?php if ($i == 0) { ?>
                                                <div class="text-center text-muted">
                                                     <p class="font-italic mt-3">Nenhum evento adicionado a nota fiscal</p>
                                                </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<script>
$(function() {
    $.applyDataMask();
});

$("[name='estornar_todos[]']").click(function() {
    var cont = $("[name='estornar_todos[]']:checked").length;
    $("#btnEstorno").prop("disabled", cont ? false : true);
});

$('#inputDataFaturamento').datepicker({
    uiLibrary: 'bootstrap4'
});

$('#inputQuantSaida').mask("###0,000", {
    reverse: true
});

$('#inputValorVenda').mask("#.##0,00", {
    reverse: true
});

<?php foreach($lista_produto as $key_produto => $produto) { ?>  
$('#detail<?= $produto->cod_produto ?>').click(function() {
    console.log("test");
    $('#produto<?= $produto->cod_produto ?>').on('shown.bs.collapse', function() {
        $('#detail<?= $produto->cod_produto ?>')
        .parent()
        .find(".fa-angle-right")
        .removeClass("fa-angle-right")
        .addClass("fa-angle-down");
    })
    .on('hidden.bs.collapse', function() {
        $('#detail<?= $produto->cod_produto ?>')
        .parent()
        .find(".fa-angle-down")
        .removeClass("fa-angle-down")
        .addClass("fa-angle-right");
    }); 
});
<?php } ?>

<?php foreach ($lista_produto as $key_produto => $produto) { ?>
jQuery('#inputQuantVendida' + "<?php echo $produto->cod_produto; ?>").on('keyup', function() {

    var quantVendida = parseFloat(jQuery('#inputQuantVendida' +
            "<?php echo $produto->cod_produto; ?>")
        .val() !=
        '' ?
        (jQuery('#inputQuantVendida' + "<?php echo $produto->cod_produto; ?>").val().split('.')
            .join(
                ''))
        .replace(',', '.') : 0);
    var precoUnitario = parseFloat("<?php echo $produto->valor_unitario; ?>");

    var totalVenda = quantVendida * precoUnitario;

    $("#inputValorVenda" + "<?= $produto->cod_produto ?>").html("R$ " + totalVenda.toLocaleString(
        "pt-BR", {
            style: "decimal",
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        }));

    if(totalVenda <= 0){
        $("#inputValorVenda" + "<?= $produto->cod_produto ?>").removeClass("text-teal");
        $("#inputValorVenda" + "<?= $produto->cod_produto ?>").addClass("text-muted");    
    }else{
        $("#inputValorVenda" + "<?= $produto->cod_produto ?>").removeClass("text-muted");
        $("#inputValorVenda" + "<?= $produto->cod_produto ?>").addClass("text-teal"); 
    }

    calcTotalVenda();

});
<?php } ?>

jQuery('#inputValorDesconto').on('keyup', function() {
    calcTotalVenda();
});

jQuery('#inputValorFrete').on('keyup', function() {
    calcTotalVenda();
});

jQuery('#inputOutrasDespesas').on('keyup', function() {
    calcTotalVenda();
});

jQuery('#inputSeguro').on('keyup', function() {
    calcTotalVenda();
});

function calcTotalVenda() {

    var totalBruto = 0;

    var valorFrete = parseFloat(jQuery('#inputValorFrete').val() != '' ? (jQuery(
            '#inputValorFrete').val()
        .split('.').join('')).replace(',', '.') : 0);
    $('#idFrete').text(valorFrete.toLocaleString("pt-BR", {
                        style: "decimal",
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                       }));
    if(valorFrete > 0){
        $('#idTdFrete').removeClass("text-muted"); 
        $('#idTdFrete').addClass("text-teal");        
    }else{
        $('#idTdFrete').removeClass("text-teal");  
        $('#idTdFrete').addClass("text-muted");   
    }

    var valorSeguro = parseFloat(jQuery('#inputSeguro').val() != '' ? (jQuery(
            '#inputSeguro').val()
        .split('.').join('')).replace(',', '.') : 0);
    $('#idSeguro').text(valorSeguro.toLocaleString("pt-BR", {
                        style: "decimal",
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                       }));
    if(valorSeguro > 0){
        $('#idTdSeguro').removeClass("text-muted");
        $('#idTdSeguro').addClass("text-teal");        
    }else{
        $('#idTdSeguro').removeClass("text-teal");  
        $('#idTdSeguro').addClass("text-muted"); 
    }

    var valorOutrasDespesas = parseFloat(jQuery('#inputOutrasDespesas').val() != '' ? (jQuery(
            '#inputOutrasDespesas').val()
        .split('.').join('')).replace(',', '.') : 0);
    $('#idOutrasDespesas').text(valorOutrasDespesas.toLocaleString("pt-BR", {
                        style: "decimal",
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                       }));
    if(valorOutrasDespesas > 0){
        $('#idTdOutrasDespesas').removeClass("text-muted"); 
        $('#idTdOutrasDespesas').addClass("text-teal");        
    }else{
        $('#idTdOutrasDespesas').removeClass("text-teal");  
        $('#idTdOutrasDespesas').addClass("text-muted"); 
    }

    var valorDesconto = parseFloat(jQuery('#inputValorDesconto').val() != '' ? (jQuery(
            '#inputValorDesconto').val()
        .split('.').join('')).replace(',', '.') : 0);
    $('#idDesconto').text(valorDesconto.toLocaleString("pt-BR", {
                        style: "decimal",
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                       }));
    if(valorDesconto > 0){
        $('#idTdDesconto').removeClass("text-muted");  
        $('#idTdDesconto').addClass("text-danger");        
    }else{
        $('#idTdDesconto').removeClass("text-danger");  
        $('#idTdDesconto').addClass("text-muted");   
    }

    var totalLiquido = 0;

    <?php foreach ($lista_produto as $key_produto => $produto) { ?>
    var totalBruto = totalBruto + parseFloat(jQuery('#inputValorVenda' + '<?= $produto->cod_produto ?>')
        .text() !=
        '' ?
        (jQuery('#inputValorVenda' + '<?= $produto->cod_produto ?>').text().split('.').join(''))
        .replace('R$',
            '')
        .replace(',', '.') : 0);
    <?php } ?>

    $('#idProduto').text(totalBruto.toLocaleString("pt-BR", {
                        style: "decimal",
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                       }));
    if(totalBruto > 0){
        $('#idTdProduto').addClass("text-teal");        
    }else{
        $('#idTdProduto').removeClass("text-teal");  
    }

    totalLiquido = totalBruto + valorFrete + valorSeguro + valorOutrasDespesas - valorDesconto;
    $('#idTotalPedido').text(totalLiquido.toLocaleString("pt-BR", {
                        style: "decimal",
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                       }));
    if(totalLiquido > 0){
        $('#idTdTotalPedido').addClass("text-teal");        
    }else{
        $('#idTdTotalPedido').removeClass("text-teal");  
    }

    $("#inputBruto").val(totalBruto.toLocaleString("pt-BR", {
        style: "decimal",
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    }));

    $("#inputValorLiq").val(totalLiquido.toLocaleString("pt-BR", {
        style: "decimal",
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    }));

    var quantParcela = $('#inputParcelas').val();
    var acumulado = 0;

    for (var i = 1; i <= quantParcela; i++) {

        valorParcela = round((totalLiquido / quantParcela), 2);
        acumulado = acumulado + valorParcela;

        if (i == quantParcela && acumulado != totalLiquido) {
            valorParcela = valorParcela + (totalLiquido - acumulado);
        }

        $('#inputValorParcela' + i).val(valorParcela.toLocaleString("pt-BR", {
            style: "decimal",
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        }));

    }

};

$("#btnParcelas").click(function() {

    var quantParcela = $('#inputParcelas').val();

    var dataParcela = new Date(String($('#inputDataVencimento1').val().split('/').reverse().join(
        '-')));

    var valorTotal = parseFloat(jQuery('#inputValorLiq').val() != '' ? (jQuery(
            '#inputValorLiq').val()
        .split('.').join('')).replace(',', '.') : 0);

    var acumulado = 0;

    $("#pacela-table").empty();

    for (var i = 1; i <= quantParcela; i++) {

        valorParcela = round((valorTotal / quantParcela), 2);
        acumulado = acumulado + valorParcela;

        if (i == quantParcela && acumulado != valorTotal) {
            valorParcela = valorParcela + (valorTotal - acumulado);
        }

        var newRow = $('<li class="list-group-item row">');
        var cols = "";

        if (i > 1) {
            var currentDay = dataParcela.getDate();
            var currentMonth = dataParcela.getMonth();
            dataParcela.setMonth(currentMonth + 1, currentDay);
        }

        //Número de parcelamento     
        cols += '<div class="form-row"">';
        cols += '<div class="form-group col-md-12"">';
        cols += ' <h5><strong>Parcela: ' + i + '/' + quantParcela + '</strong></h5>';
        cols += '</div>';
        cols += '</div>';

        //Data de vencimento previsto
        cols += '<div class="form-row"">';
        cols += '<div class="form-group col-md-4">';
        cols += '<label class="control-label" for="inputDataVencimento' + i +
            '">Data de Vencimento <span class="text-danger">*</span></label>';
        cols += '<input type="text" class="form-control" id="inputDataVencimento' + i + '"';
        cols += 'name="DataVencimento[' + i + ']"';
        cols += 'value="' + dataParcela.toLocaleDateString('pt-BR', {
            timeZone: 'UTC'
        }) + '" required>';
        cols += '</div>';

        // Valor da parcela
        cols += '<div class="form-group col-md-4">';
        cols += '<label class="control-label" for="inputValorParcela' + i +
            '">Valor da Parcela <span class="text-danger">*</span></label>';
        cols += '<div class="input-group">';
        cols += '<div class="input-group-prepend">';
        cols += '<span class="input-group-text">R$</span>';
        cols += '</div>';
        cols += '<input class="form-control" id="inputValorParcela' + i +
            '" name="ValorParcela[' +
            i + ']" type="text" ';
        cols += 'data-mask="#.##0,00" data-mask-reverse="true" inputmode="numeric"';
        cols += 'value="' + valorParcela.toLocaleString("pt-BR", {
            style: "decimal",
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });
        cols += '" required>';
        cols += '</div>';
        cols += '</div>';

        // Método de pegamento
        cols += '<div class="form-group col-md-4">';
        cols += '<label>Método de Pagamento</label>';
        cols += '<select class="selectpicker show-tick form-control"' +
                'data-live-search="true" data-actions-box="true"' +
                'title=" "' +
                'name="CodMetodoPagamento['  + i + ']" id="selectMetodoPag' + i + '"' +
                'data-style="btn-input-primary">';
        <?php foreach ($lista_metodo_pagamento as $key_metodo_pagamento => $metodo_pagamento) { ?>
        cols += '<option ' +
                'value="<?= $metodo_pagamento->cod_metodo_pagamento ?>" ' +
                '<?php if ($metodo_pagamento->cod_metodo_pagamento == set_value('CodMetodoPagamento')) echo "selected"; ?>> ' +
                '<?= $metodo_pagamento->cod_metodo_pagamento ?>' + '-' + '<?= $metodo_pagamento->nome_metodo_pagamento ?>'  +
                '</option>';
        <?php } ?>
        cols += '</select>';
        cols += '</div>';


        cols += '</div>';
        cols += '</li>';

        newRow.append(cols);
        $("#pacela-table").append(newRow);

        $('#inputDataVencimento' + i).datepicker({
            uiLibrary: 'bootstrap4'
        });

    }

    $.applyDataMask();

    $('.selectpicker').selectpicker('refresh');


    return;

});

$('#inputDataVencimento1').datepicker({
    uiLibrary: 'bootstrap4'
});

function ImprimeNF(idNF) {

    var iframe = this._printIframe;
    if (!this._printIframe) {
        iframe = this._printIframe = document.createElement('iframe');
        document.body.appendChild(iframe);

        iframe.style.display = 'none';
        iframe.onload = function() {
            setTimeout(function() {
                iframe.focus();
                iframe.contentWindow.print();
            }, 1);
        };
    }

    iframe.src = "<?= base_url("faturamento/pedido/danfe/") ?>" + idNF;
};


const round = (num, places) => {
    return +(parseFloat(num).toFixed(places));
}
</script>

<?php $this->load->view('gerais/footer'); ?>