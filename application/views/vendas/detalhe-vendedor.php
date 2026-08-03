<?php $this->load->view('gerais/header', $menu); ?>
<?php $this->load->view('gerais/menu', $menu); ?>

<section>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('visao-geral') ?>">Visão Geral</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('vendas') ?>">Vendas</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('painel/vendedores') ?>">Painel de Vendedor</a></li>
            <li class="breadcrumb-item active">Detalhe do Vendedor</a></li>
        </ol>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card  mb-3">
                    <div class="card-header">
                        <h2 class="mb-0 font-weight-bold"><?php if($vendedor->ativo == 1) echo "<i class='fa-solid fa-check text-teal'></i>"; else echo "<i class='fa-solid fa-xmark text-danger'></i>"; ?> <?= $vendedor->cod_vendedor ?> - <?= $vendedor->nome_vendedor ?>
                        </h2>
                    </div>                    
                    <div class="card-body">                        
                        <div class="row">
                            <div class="col-md-4">
                                <p class="mb-1 font-weight-bold">CEP</p>
                                <p><?php if($vendedor->cep != "") echo $vendedor->cep; else echo "-"; ?></p>
                            </div>
                            <div class="col-md-4">
                                <p class="mb-1 font-weight-bold">Endereço</p>
                                <p><?php if($vendedor->endereco != "") echo $vendedor->endereco; else echo "-"; ?> 
                                <a href="http://maps.google.com.br/maps?q=<?= $vendedor->endereco . " " . $vendedor->numero . " " . $vendedor->nome_cidade . " " . $vendedor->uf . " " . $vendedor->cep . " " . "Brasil" ?>" class="text-info" target="_blank"><i class="fa-solid fa-location-dot"></i></a>
                                </p>
                            </div>
                            <div class="col-md-4">
                                <p class="mb-1 font-weight-bold">Número</p>
                                <p><?php if($vendedor->numero != "") echo $vendedor->numero; else echo "-"; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p class="mb-1 font-weight-bold">Complemento</p>
                                <p><?php if($vendedor->complemento != "") echo $vendedor->complemento; else echo "-"; ?></p>
                            </div>
                            <div class="col-md-4">
                                <p class="mb-1 font-weight-bold">Bairro</p>
                                <p><?php if($vendedor->bairro != "") echo $vendedor->bairro; else echo "-"; ?></p>
                            </div>
                            <div class="col-md-4">
                                <p class="mb-1 font-weight-bold">Cidade</p>
                                <p><?php if($vendedor->nome_cidade != "") echo $vendedor->nome_cidade . "/". $vendedor->uf; else echo "-"; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p class="mb-1 font-weight-bold">Telefone Fixo</p>
                                <p><?php if($vendedor->tel_fixo != "") echo $vendedor->tel_fixo; else echo "-"; ?></p>
                            </div>
                            <div class="col-md-4">
                                <p class="mb-1 font-weight-bold">Telefone Celular</p>
                                <p><?php if($vendedor->tel_cel != "") echo $vendedor->tel_cel; else echo "-"; ?></p>
                            </div>
                            <div class="col-md-4">
                                <p class="mb-1 font-weight-bold">E-mail</p>
                                <p><?php if($vendedor->email != "") echo $vendedor->email; else echo "-"; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <p class="mb-1 font-weight-bold">Usuário App</p>
                                <p><?php if($vendedor->nome_usuario != "") echo $vendedor->nome_usuario; else echo "-"; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-12">
                                <a class="btn btn-link small text-center text-success pull-right" href="<?= base_url("vendedor/editar-vendedor/{$vendedor->cod_vendedor}") ?>">
                                    <i class="fa-solid fa-angle-right"></i> Ver cadastro completo
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 text-center pr-0">
                        <div class="card mb-3">
                            <div class="card-body bg-light">
                            <h4 class="text-teal mb-1"><b>R$ <?= number_format($lista_valores3->total_vendas, 2, ',', '.') ?></b></h4>
                            <p class="mb-0 small2 text-muted">total vendido</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 text-center pr-0">
                        <div class="card mb-3">
                            <div class="card-body bg-light">
                            <h4 class="text-warning mb-1"><b><?= $lista_count3->quant_pedidos ?></b></h4>
                            <p class="mb-0 small2 text-muted">pedidos feitos</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 text-center pr-0">
                        <div class="card mb-3">
                            <div class="card-body bg-light">
                            <h4 class="text-muted mb-1"><b>R$ <?php if($lista_count3->quant_pedidos != 0) echo number_format($lista_valores3->total_vendas / $lista_count3->quant_pedidos, 2, ',', '.'); else echo number_format(0, 2, ',', '.'); ?></b></h4>
                            <p class="mb-0 small2 text-muted">ticket médio</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 text-center">
                        <div class="card mb-3">
                            <div class="card-body bg-light">
                            <h4 class="text-info mb-1"><b>R$ <?= number_format(0, 2, ',', '.') ?></b></h4>
                            <p class="mb-0 small2 text-muted">total comissão</p>
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="nav nav-tabs mb-3">                    
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#pedidos-venda">Pedidos de Venda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#atendimentos">Atendimentos</a>
                    </li>
                </ul>
                <div class="card  mb-3">
                    <div class="card-body">
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
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="tab-content">                                            
                                            <div class="tab-pane fade active show" id="pedidos-venda">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered table-nf">
                                                                <thead class="thead-light">
                                                                    <tr>
                                                                        <th scope="col" class="text-center"><i
                                                                                class="fa-solid fa-check"></i></th>
                                                                        <th scope="col" class="text-center">Pedido</th>
                                                                        <th scope="col" class="text-left">Cliente</th>
                                                                        <th scope="col" class="text-center">Data emissão</th>                                                            
                                                                        <th scope="col" class="text-center">Data entrega</th>                                                                    
                                                                        <th scope="col" class="text-right">Total pedido</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                <?php foreach($pedido_venda as $key_pedido => $pedido) { ?>
                                                                    <tr>
                                                                        <td class="text-center align-middle small2">
                                                                            <?php  
                                                                                switch ($pedido->situacao) {
                                                                                    case 1:
                                                                                        echo "<i class='fa-solid fa-circle text-warning-light' data-toggle='tooltip'
                                                                                        data-placement='right'
                                                                                        title='Em Orçamento'></i>";
                                                                                        break;
                                                                                    case 2:
                                                                                        echo "<i class='fa-solid fa-circle-xmark text-danger-light' data-toggle='tooltip'
                                                                                        data-placement='right'
                                                                                        title='Orçamento Reprovado'></i>";
                                                                                        break;
                                                                                    case 3:
                                                                                        echo "<i class='fa-solid fa-circle-check text-teal-light' data-toggle='tooltip'
                                                                                        data-placement='right'
                                                                                        title='Venda Confirmada'></i>";
                                                                                        break;
                                                                                }
                                                                            ?>
                                                                        </td>
                                                                        <td class="text-center align-middle">
                                                                            <a href="#" data-toggle="modal" class="text-dark"
                                                                            data-target="#pedido-cliente<?= $pedido->num_pedido_venda ?>"><?= $pedido->num_pedido_venda ?></a>
                                                                        </td>
                                                                        <td class="text-left align-middle">
                                                                            <a href="#" data-toggle="modal" class="text-dark"
                                                                            data-target="#pedido-cliente<?= $pedido->num_pedido_venda ?>"><?= $pedido->cod_cliente ?> - <?= $pedido->nome_cliente ?></a>
                                                                        </td>
                                                                        <td class="text-center align-middle">
                                                                            <?= str_replace('-', '/', date("d-m-Y", strtotime($pedido->data_emissao))) ?>
                                                                        </td>
                                                                        <td class="text-center align-middle <?php if ($pedido->situacao == 3 && $pedido->valor_total_faturado == 0 && $pedido->data_entrega < date('Y-m-d')) echo "text-danger"; ?>
                                                                                                            <?php if ($pedido->situacao == 3 && $pedido->valor_total_faturado == 0 && $pedido->data_entrega == date('Y-m-d')) echo "text-warning"; ?>">
                                                                            <?= str_replace('-', '/', date("d-m-Y", strtotime($pedido->data_entrega))) ?>
                                                                            <?php if ($pedido->situacao == 3 && $pedido->valor_total_faturado == 0 && $pedido->data_entrega < date('Y-m-d')) { ?>
                                                                            <span class="badge bg-danger-light">
                                                                                <?php
                                                                                    
                                                                                    $date1 = date_create($pedido->data_entrega);
                                                                                    $date2 = date_create(date('Y-m-d'));
                                                                                    $diff = date_diff($date1, $date2);
                                                                                    echo $diff->format("%a");
                                                                                ?>
                                                                            </span>
                                                                            <?php } ?> 
                                                                        </td>                                                                    
                                                                        <td class="text-right align-middle text-teal">
                                                                            R$ <?= number_format($pedido->valor_total_pedido + 
                                                                                    $pedido->valor_frete +
                                                                                    $pedido->valor_seguro +
                                                                                    $pedido->outras_despesas - 
                                                                                    $pedido->valor_desconto, 2, ',', '.') ?>
                                                                        </td>
                                                                    </tr>
                                                                <?php } ?>                                                    
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <?php if ($pedido_venda == false) { ?>
                                                        <div class="text-center text-muted">
                                                            <p class="font-italic mt-3">Nenhum pedido encontrado para o cliente</p>
                                                        </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>                                            
                                            <div class="tab-pane fade" id="atendimentos">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <button data-toggle="modal" data-target="#inserir-atendimento"
                                                            data-backdrop="static"
                                                                type="button" class="btn btn-outline-info btn-sm"><i
                                                                    class="fas fa-plus-circle"></i> Inserir Atedimento</button>       
                                                        <button data-toggle="modal" data-target="#elimina-nota" type="button"
                                                            class="btn btn-outline-danger btn-sm" id="excluirNota"
                                                            disabled><i class="fas fa-trash-alt"></i>
                                                            Excluir</button>                                                 
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <form class="mb-0 needs-validation" novalidate
                                                            action="<?= base_url("painel/vendedores/excluir-nota/{$vendedor->cod_vendedor}") ?>"
                                                            method="POST" id="DeleteNota">
                                                            <div class="table-responsive">
                                                                <table class="table table-bordered table-reporte">
                                                                    <thead class="thead-light">
                                                                        <tr>
                                                                            <th scope="col" class="text-center"><i class="fa-solid fa-check"></i></th>
                                                                            <th scope="col" class="text-center">Data</th>
                                                                            <th scope="col">Cliente</th>
                                                                            <th scope="col">Título</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody class="table-sm">
                                                                        <?php foreach($notas as $key_nota => $nota) { ?>
                                                                            <tr>
                                                                                <td class="text-center align-middle small2">
                                                                                    <input name="excluir_todos[]" type="checkbox"
                                                                                        value="<?= $nota->cod_nota_cliente ?>">
                                                                                </td>
                                                                                <td class="text-center align-middle">
                                                                                    <a href="#" data-toggle="modal" class="text-dark"
                                                                                    data-target="#atualizar-nota<?= $nota->cod_nota_cliente ?>"><?= str_replace('-', '/', date("d-m-Y", strtotime($nota->data_nota))) ?></a>                                                       
                                                                                </td>
                                                                                <td class="align-middle">
                                                                                    <a href="#" data-toggle="modal" class="text-dark"
                                                                                    data-target="#atualizar-nota<?= $nota->cod_nota_cliente ?>"><?= $nota->cod_cliente ?> - <?= $nota->nome_cliente ?></a><br>
                                                                                <span class='badge bg-teal-light font-italic'>
                                                                                <?php
                                                                                    switch($nota->tipo_contato) {
                                                                                        case 1:
                                                                                            echo "Visita";
                                                                                            break;
                                                                                        case 2:
                                                                                            echo "Reunião";
                                                                                            break;
                                                                                        case 3:
                                                                                            echo "Telefone/WhatsApp";
                                                                                            break;
                                                                                        case 4:
                                                                                            echo "E-mail";
                                                                                            break;                                            
                                                                                    }                                    
                                                                                ?> 
                                                                                </span>                                                    
                                                                                </td>
                                                                                <td class="align-middle">
                                                                                    <?= $nota->titulo ?>                                                       
                                                                                </td>
                                                                            </tr>
                                                                        <?php } ?>
                                                                    </tbody>
                                                                </table>                                                            
                                                            </div>
                                                            <?php if ($notas == false) { ?>
                                                            <div class="text-center text-muted">
                                                                <p class="font-italic mt-3">Nenhum atendimento inserido pelo vendedor</p>
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
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 pl-0">
                <nav>
                    <div class="nav nav-pills flex-column flex-sm-row mb-3" id="nav-tab" role="tablist">
                        <a class="flex-sm-fill text-sm-center nav-item nav-link active" id="primeiro-fitro-tab" data-toggle="tab" href="#primeiro-fitro" role="tab" aria-controls="primeiro-fitro" aria-selected="true"><i class="fa-solid fa-angle-right"></i> Últimos <?= $empresa->clientes_ativos ?> dias</a>
                        <a class="flex-sm-fill text-sm-center nav-item nav-link" data-toggle="tab" href="#segundo-filtro" role="tab" aria-controls="segundo-filtro" aria-selected="false"><i class="fa-solid fa-angle-right"></i> Últimos <?= $empresa->clientes_inativos_recentes ?> dias</a>
                        <a class="flex-sm-fill text-sm-center nav-item nav-link" data-toggle="tab" href="#terceiro-filtro" role="tab" aria-controls="terceiro-filtro" aria-selected="false"><i class="fa-solid fa-angle-right"></i> Desde sempre</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="primeiro-fitro"> 
                        <div class="card  mb-3"> 
                            <h6 class="card-header bg-white text-muted">
                                Resumo
                            </h6>               
                            <div class="card-body">                                           
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-borderless table-sm">
                                            <tbody>
                                                <tr>
                                                    <td class="text-left">
                                                        <i class="fa-solid fa-circle fa-xs pr-2 text-teal"></i> Total vendido
                                                    </td>
                                                    <td class="text-right <?php if($lista_valores1->total_vendas > 0) echo "text-teal"; else echo "text-muted"; ?>">
                                                        R$ <?= number_format($lista_valores1->total_vendas, 2, ',', '.') ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left">
                                                    <i class="fa-solid fa-circle fa-xs pr-2 text-info"></i> Pedidos emitidos
                                                    </td>
                                                    <td class="text-right <?php if($lista_count1->quant_pedidos > 0) echo "text-info"; else echo "text-muted"; ?>">
                                                        <?= $lista_count1->quant_pedidos ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left">
                                                    <i class="fa-solid fa-circle fa-xs pr-2 text-muted"></i> Ticket médio
                                                    </td>
                                                    <td class="text-right <?php if($lista_count1->quant_pedidos != 0) { if(($lista_valores1->total_vendas / $lista_count1->quant_pedidos) > 0) echo "text-muted"; else echo "text-muted"; } else echo "text-muted"; ?>">
                                                        R$ <?php if($lista_count1->quant_pedidos != 0) echo number_format($lista_valores1->total_vendas / $lista_count1->quant_pedidos, 2, ',', '.'); else echo number_format(0, 2, ',', '.'); ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left">
                                                    <i class="fa-solid fa-circle fa-xs pr-2 text-warning"></i> Comissão pago
                                                    </td>
                                                    <td class="text-right text-muted">
                                                        R$ <?= number_format(0, 2, ',', '.') ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <?php if($lista_produto1 != null){ ?>
                        <div class="card  mb-3"> 
                            <h6 class="card-header bg-white text-muted">
                                Produtos mais comprados
                            </h6>               
                            <div class="card-body">                  
                                <div class="row mb-3">
                                    <div class="col-md-12 text-center">
                                        <canvas id="graph-produto1"></canvas>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12 height-scroll-200">
                                                <table class="table table-borderless table-sm mb-0 small2">
                                                    <tbody>
                                                        <?php foreach($lista_produto1 as $key_produto => $produto) { ?>
                                                        <tr>
                                                            <td class="text-left limit-text-30"><i
                                                                    class="fa fa-circle fa-xs pr-2" style="color: <?= $produto->color ?>"></i>
                                                                <?= $produto->nome_produto ?>
                                                            </td>
                                                            <td class="text-right">
                                                            <span class="text-teal">R$ <?= number_format($produto->valor_total, 2, ',', '.') ?></span>
                                                            </td>
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="tab-pane fade" id="segundo-filtro">
                        <div class="card  mb-3"> 
                            <h6 class="card-header bg-white text-muted">
                                Resumo
                            </h6>               
                            <div class="card-body">                                           
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-borderless table-sm">
                                            <tbody>
                                                <tr>
                                                    <td class="text-left">
                                                        <i class="fa-solid fa-circle fa-xs pr-2 text-teal"></i> Total vendido
                                                    </td>
                                                    <td class="text-right <?php if($lista_valores2->total_vendas > 0) echo "text-teal"; else echo "text-muted"; ?>">
                                                        R$ <?= number_format($lista_valores2->total_vendas, 2, ',', '.') ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left">
                                                    <i class="fa-solid fa-circle fa-xs pr-2 text-info"></i> Pedidos realizados
                                                    </td>
                                                    <td class="text-right <?php if($lista_count2->quant_pedidos > 0) echo "text-info"; else echo "text-muted"; ?>">
                                                        <?= $lista_count2->quant_pedidos ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left">
                                                    <i class="fa-solid fa-circle fa-xs pr-2 text-muted"></i> Ticket médio
                                                    </td>
                                                    <td class="text-right <?php if($lista_count2->quant_pedidos != 0) { if(($lista_valores2->total_vendas / $lista_count2->quant_pedidos) > 0) echo "text-muted"; else echo "text-muted"; } else echo "text-muted"; ?>">
                                                        R$ <?php if($lista_count2->quant_pedidos != 0) echo number_format($lista_valores2->total_vendas / $lista_count2->quant_pedidos, 2, ',', '.'); else echo number_format(0, 2, ',', '.'); ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left">
                                                    <i class="fa-solid fa-circle fa-xs pr-2 text-info"></i> Comissão paga
                                                    </td>
                                                    <td class="text-right text-muted">
                                                        R$ <?= number_format(0, 2, ',', '.') ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <?php if($lista_produto2 != null){ ?>
                        <div class="card  mb-3"> 
                            <h6 class="card-header bg-white text-muted">
                                Produtos mais comprados
                            </h6>               
                            <div class="card-body">                  
                                <div class="row mb-3">
                                    <div class="col-md-12 text-center">
                                        <canvas id="graph-produto2"></canvas>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12 height-scroll-200">
                                                <table class="table table-borderless table-sm mb-0 small2">
                                                    <tbody>
                                                        <?php foreach($lista_produto2 as $key_produto => $produto) { ?>
                                                        <tr>
                                                            <td class="text-left limit-text-30"><i
                                                                    class="fa fa-circle fa-xs pr-2" style="color: <?= $produto->color ?>"></i>
                                                                <?= $produto->nome_produto ?>
                                                            </td>
                                                            <td class="text-right text-teal">
                                                            R$ <?= number_format($produto->valor_total, 2, ',', '.') ?>
                                                            </td>
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                        <?php } ?>
                    </div>
                    <div class="tab-pane fade" id="terceiro-filtro">
                        <div class="card  mb-3"> 
                            <h6 class="card-header bg-white text-muted">
                                Resumo
                            </h6>               
                            <div class="card-body">                                           
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-borderless table-sm">
                                            <tbody>
                                                <tr>
                                                    <td class="text-left">
                                                        <i class="fa-solid fa-circle fa-xs pr-2 text-teal"></i> Total vendido
                                                    </td>
                                                    <td class="text-right <?php if($lista_valores3->total_vendas > 0) echo "text-teal"; else echo "text-muted"; ?>">
                                                        R$ <?= number_format($lista_valores3->total_vendas, 2, ',', '.') ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left">
                                                    <i class="fa-solid fa-circle fa-xs pr-2 text-info"></i> Pedidos realizados
                                                    </td>
                                                    <td class="text-right <?php if($lista_count3->quant_pedidos > 0) echo "text-info"; else echo "text-muted"; ?>">
                                                        <?= $lista_count3->quant_pedidos ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left">
                                                    <i class="fa-solid fa-circle fa-xs pr-2 text-muted"></i> Ticket médio
                                                    </td>
                                                    <td class="text-right <?php if($lista_count3->quant_pedidos != 0) { if(($lista_valores3->total_vendas / $lista_count3->quant_pedidos) > 0) echo "text-muted"; else echo "text-muted"; } else echo "text-muted"; ?>">
                                                        R$ <?php if($lista_count3->quant_pedidos != 0) echo number_format($lista_valores3->total_vendas / $lista_count3->quant_pedidos, 2, ',', '.'); else echo number_format(0, 2, ',', '.'); ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left">
                                                    <i class="fa-solid fa-circle fa-xs pr-2 text-info"></i> Comissão paga
                                                    </td>
                                                    <td class="text-right text-muted">
                                                        R$ <?= number_format(0, 2, ',', '.') ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <?php if($lista_produto3 != null){ ?>
                        <div class="card  mb-3"> 
                            <h6 class="card-header bg-white text-muted">
                                Produtos mais comprados
                            </h6>               
                            <div class="card-body">                  
                                <div class="row mb-3">
                                    <div class="col-md-12 text-center">
                                        <canvas id="graph-produto3"></canvas>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12 height-scroll-200">
                                                <table class="table table-borderless table-sm mb-0 small2">
                                                    <tbody>
                                                        <?php foreach($lista_produto3 as $key_produto => $produto) { ?>
                                                        <tr>
                                                            <td class="text-left limit-text-30"><i
                                                                    class="fa fa-circle fa-xs pr-2" style="color: <?= $produto->color ?>"></i>
                                                                <?= $produto->nome_produto ?>
                                                            </td>
                                                            <td class="text-right text-teal">
                                                            R$ <?= number_format($produto->valor_total, 2, ',', '.') ?>
                                                            </td>
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>                    
                </div>                
            </div>               
            
        </div>
        <br>

    </div>
</section>

<div class="modal fade" id="inserir-atendimento">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Inserir atendimento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body bg-light">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form class="mb-0 needs-validation" novalidate
                                            action="<?= base_url("painel/vendedores/inserir-nota/{$vendedor->cod_vendedor}") ?>"
                                            method="POST" id="InserirNota">
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="inputCliente">Cliente <span class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <select id="inputCliente" class="selectpicker show-tick form-control"
                                                            data-live-search="true" data-actions-box="true" title=" "
                                                            data-style="btn-input-primary" name="CodCliente" required>
                                                            <?php foreach($lista_cliente as $key_cliente => $cliente) { ?>
                                                            <option value="<?= $cliente->cod_cliente ?>" class="limit-text-50"
                                                                <?php if($cliente->cod_cliente == set_value('CodCliente')) echo "selected"; ?>>
                                                                <?= $cliente->cod_cliente ?> -
                                                                <?= $cliente->nome_cliente ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label class="control-label" for="inputTituloNota">Assunto do Atendimento <span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control" id="inputTituloNota" type="text" name="TituloNota"
                                                        value="<?php set_value('TituloNota') ?>" required>
                                                </div>
                                                                                               
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-8">
                                                    <label for="inputTipoContato">Tipo de Contato <span class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <select id="inputTipoContato" class="selectpicker show-tick form-control"
                                                            data-actions-box="true"
                                                            data-style="btn-input-primary" name="TipoContato" required>
                                                            <option value="1">Visita</option>
                                                            <option value="2">Reunião</option>
                                                            <option value="3">Telefone/WhatsApp</option>
                                                            <option value="4">E-mail</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="control-label" for="inputDataNota">Data da Nota <span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control" id="inputDataNota" type="text" name="DataNota"
                                                        value="<?php if(set_value('DataNota') == ""){
                                                                                echo str_replace('-', '/', date("d-m-Y"));
                                                                            }else{ echo set_value('DataNota'); } ?>" required>
                                                </div> 
                                            </div>                                            
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="inputComentario">Comentários <span
                                                            class="text-danger">*</span></label>
                                                    <textarea class="form-control" rows="6" id="inputComentario"
                                                        name="Comentario" required><?= set_value('Comentario'); ?></textarea>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" form="InserirNota"><i class="fa-solid fa-headset"></i>
                    Inserir Atendimento</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<?php foreach($notas as $key_nota => $nota) { ?>
<div class="modal fade" id="atualizar-nota<?= $nota->cod_nota_cliente ?>">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Alterar atendimento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body bg-light">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form class="mb-0 needs-validation" novalidate
                                            action="<?= base_url("painel/vendedores/alterar-nota/{$nota->cod_nota_cliente}") ?>"
                                            method="POST" id="AtualizarNota<?= $nota->cod_nota_cliente ?>">
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label class="control-label" for="inputCliente<?= $nota->cod_nota_cliente ?>">Cliente</label>
                                                    <input class="form-control" id="inputCliente<?= $nota->cod_nota_cliente ?>" type="text" name="CodCliente"
                                                        value="<?= $nota->cod_cliente ?> - <?= $nota->nome_cliente ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label class="control-label" for="inputTituloNota<?= $nota->cod_nota_cliente ?>">Assunto da Nota <span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control" id="inputTituloNota<?= $nota->cod_nota_cliente ?>" type="text" name="TituloNota"
                                                        value="<?= $nota->titulo ?>" required <?php if($nota->usuario != getDadosUsuarioLogado()['email']) echo "readonly"; ?>>
                                                </div>
                                            </div>
                                            <div class="form-row">                                                
                                                <div class="form-group col-md-8">
                                                    <label for="inputTipoContato">Tipo de Contato <span class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <select id="inputTipoContato" class="selectpicker show-tick form-control"
                                                            data-actions-box="true"
                                                            data-style="btn-input-primary" name="TipoContato" required>
                                                            <option value="1" <?php if($nota->tipo_contato == 1) echo "selected"; ?>>Visita</option>
                                                            <option value="2" <?php if($nota->tipo_contato == 2) echo "selected"; ?>>Reunião</option>
                                                            <option value="3" <?php if($nota->tipo_contato == 3) echo "selected"; ?>>Telefone/WhatsApp</option>
                                                            <option value="4" <?php if($nota->tipo_contato == 4) echo "selected"; ?>>E-mail</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="control-label" for="inputDataNota<?= $nota->cod_nota_cliente ?>">Data da Nota <span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control" id="inputDataNota<?= $nota->cod_nota_cliente ?>" type="text" name="DataNota"
                                                        value="<?= str_replace('-', '/', date("d-m-Y", strtotime($nota->data_nota))) ?>" required <?php if($nota->usuario != getDadosUsuarioLogado()['email']) echo "readonly"; ?>>
                                                </div>                                                
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="inputComentario<?= $nota->cod_nota_cliente ?>">Comentários <span
                                                            class="text-danger">*</span></label>
                                                    <textarea class="form-control" rows="6" id="inputComentario<?= $nota->cod_nota_cliente ?>"
                                                        name="Comentario" required <?php if($nota->usuario != getDadosUsuarioLogado()['email']) echo "readonly"; ?>><?= $nota->comentario ?></textarea>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" form="AtualizarNota<?= $nota->cod_nota_cliente ?>" <?php if($nota->usuario != getDadosUsuarioLogado()['email']) echo "disabled"; ?>><i class="fa-solid fa-note-sticky"></i>
                    Atualizar Nota</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<?php foreach ($pedido_venda as $key_venda => $venda) { ?>
<div class="modal fade" id="pedido-cliente<?= $venda->num_pedido_venda ?>">
    <div class="modal-dialog modal-dialog-centered modal-xxl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detalhes do pedido</h5>
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
                                                Pedido <?= $venda->num_pedido_venda ?> 
                                                <span class="text-center align-middle small2">
                                                <?php  
                                                    switch ($venda->situacao) {
                                                        case 1:
                                                            echo "<i class='fa-solid fa-circle text-warning-light' data-toggle='tooltip'
                                                            data-placement='right'
                                                            title='Em Orçamento'></i>";
                                                            break;
                                                        case 2:
                                                            echo "<i class='fa-solid fa-circle-xmark text-danger-light' data-toggle='tooltip'
                                                            data-placement='right'
                                                            title='Orçamento Reprovado'></i>";
                                                            break;
                                                        case 3:
                                                            echo "<i class='fa-solid fa-circle-check text-teal-light' data-toggle='tooltip'
                                                            data-placement='right'
                                                            title='Venda Confirmada'></i>";
                                                            break;
                                                    }
                                                ?>
                                                </span> 
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
                                                    <td class="text-left align-middle ">
                                                        Cliente
                                                    </td>
                                                    <td class="text-right align-middle">
                                                        <b><?= $venda->cod_cliente ?> - <?= $venda->nome_cliente ?></b>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table table-borderless table-sm mb-0">
                                            <tbody>
                                                <tr>
                                                    <td class="text-left align-middle">
                                                        Data de emissão
                                                    </td>
                                                    <td class="text-right align-middle">
                                                        <?= str_replace('-', '/', date("d-m-Y", strtotime($venda->data_emissao))) ?> 
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle">
                                                        Data de entrega
                                                    </td>
                                                    <td class="text-right align-middle">
                                                        <?= str_replace('-', '/', date("d-m-Y", strtotime($venda->data_entrega))) ?> 
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <?php if($venda->nome_usuario != null){ ?>
                                        <table class="table table-borderless table-sm mb-0">
                                            <tbody>
                                                <tr>
                                                    <td class="text-left align-middle">
                                                        Usuário de criação
                                                    </td>
                                                    <td class="text-right align-middle">
                                                        <?= $venda->nome_usuario ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <?php } ?>                                        
                                        <?php if($venda->cod_transportador != 0) { ?>
                                        <table class="table table-borderless table-sm mb-0">
                                            <tbody>
                                                <tr>
                                                    <td class="text-left align-middle ">
                                                        Transportador
                                                    </td>
                                                    <td class="text-right align-middle">
                                                        <?= $venda->nome_transportador ?>
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
                                                        class="text-right align-middle <?php if($venda->valor_total_pedido > 0) echo "text-teal"; else echo "text-muted"; ?>">
                                                        R$ <?= number_format($venda->valor_total_pedido, 2, ',', '.') ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle ">
                                                        Frete <?php if($venda->tipo_frete == 1) echo "CIF"; else echo "FOB"; ?>
                                                    </td>
                                                    <td
                                                        class="text-right align-middle <?php if($venda->valor_frete > 0) echo "text-teal"; else echo "text-muted"; ?>">
                                                        R$ <?= number_format($venda->valor_frete, 2, ',', '.') ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle">
                                                        Seguro
                                                    </td>
                                                    <td
                                                        class="text-right align-middle <?php if($venda->valor_seguro > 0) echo "text-teal"; else echo "text-muted"; ?>">
                                                        R$ <?= number_format($venda->valor_seguro, 2, ',', '.') ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle ">
                                                        Outras despesas
                                                    </td>
                                                    <td
                                                        class="text-right align-middle <?php if($venda->outras_despesas > 0) echo "text-teal"; else echo "text-muted"; ?>">
                                                        R$
                                                        <?= number_format($venda->outras_despesas, 2, ',', '.') ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle">
                                                        Desconto
                                                    </td>
                                                    <td
                                                        class="text-right align-middle <?php if($venda->valor_desconto > 0) echo "text-danger"; else echo "text-muted"; ?>">
                                                        R$
                                                        <?= number_format($venda->valor_desconto, 2, ',', '.') ?>
                                                    </td>
                                                </tr>                                                
                                            </tbody>
                                        </table>                                        
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <table class="table table-borderless table-sm">
                                    <tbody>
                                        <tr>
                                            <td class="text-left pt-0 text-dark"><strong>TOTAL DO PEDIDO</strong></td>
                                            <td
                                                class="text-right pt-0 text-teal">
                                                <strong>
                                                    R$ <?= number_format($venda->valor_total_pedido + $venda->valor_frete + $venda->valor_seguro + $venda->outras_despesas -
                                                      $venda->valor_desconto, 2, ',', '.') ?>
                                                </strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left pt-0 text-dark"><strong>TOTAL FATURADO</strong></td>
                                            <td
                                                class="text-right pt-0 <?php if($venda->valor_total_faturado > 0) echo "text-teal"; else echo "text-muted"; ?>">
                                                <strong>
                                                    R$ <?= number_format($venda->valor_total_faturado, 2, ',', '.') ?>
                                                </strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <?php if($venda->observacoes != "") { ?>
                        <div class="card  mt-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 mb-2">
                                        <p class="card-text text-muted mb-0">Observação</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <?= $venda->observacoes ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="col-md-8 pl-0">
                        <ul class="nav nav-tabs mb-3">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#prod-faturado<?= $venda->num_pedido_venda ?>">Produtos do Pedido</a>
                            </li>
                        </ul>
                        <div class="card">
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane fade active show" id="prod-faturado<?= $venda->num_pedido_venda ?>">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered">
                                                        <thead class="thead-light">
                                                            <tr>
                                                                <th scope="col">Produto</th>
                                                                <th scope="col" class="text-right">Quantidade</th>
                                                                <th scope="col" class="text-right">Valor unit</th>
                                                                <th scope="col" class="text-right">Total</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $i = 0; foreach ($produto_venda as $key_produto => $produto) {
                                                                if ($produto->num_pedido_venda == $venda->num_pedido_venda) { $i += 1; ?>
                                                            <tr>
                                                                <td class="limit-text-50 align-middle" data-toggle="tooltip"
                                                                    data-placement="bottom"
                                                                    title="<?= $produto->nome_produto ?>">
                                                                    <?= $produto->cod_produto ?> - <?= $produto->nome_produto ?>
                                                                </td>
                                                                <td class="text-right text-info align-middle">
                                                                    <?= number_format($produto->quant_pedida, 3, ',', '.') ?>
                                                                    <?= $produto->cod_unidade_medida ?>
                                                                </td>
                                                                <td class="text-right align-middle">
                                                                    R$
                                                                    <?= number_format($produto->valor_unitario, 2, ',', '.') ?>
                                                                </td>
                                                                <td class="text-right text-teal align-middle">
                                                                    R$
                                                                    <?= number_format($produto->quant_pedida * $produto->valor_unitario, 2, ',', '.') ?>
                                                                </td>
                                                            </tr>
                                                            <?php }
                                                            } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <?php if ($i == 0) { ?>
                                                <div class="text-center text-muted">
                                                     <p class="font-italic mt-3">Nenhum produto inserido no pedido</p>
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
            <div class="modal-footer">
                <a type="button" target="_blank" class="btn btn-info" href="<?php echo base_url() ?>vendas/faturamento-pedido/novo-faturamento-pedido/<?= $venda->num_pedido_venda ?>"><i class="fa-solid fa-magnifying-glass-dollar"></i> Consultar Faturamento</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<div class="modal fade" id="elimina-nota" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Eliminar atendimento do cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Confirma eliminação dos atendimentos selecionados?
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger" form="DeleteNota">Confirma</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>


<script>

$("[name='excluir_todos[]']").click(function() {
    var cont = $("[name='excluir_todos[]']:checked").length;
    $("#excluirNota").prop("disabled", cont ? false : true);
});

$('#inputDataNota').datepicker({
    uiLibrary: 'bootstrap4'
});

<?php foreach($notas as $key_nota => $nota) { ?>
$('#inputDataNota<?= $nota->cod_nota_cliente ?>').datepicker({
    uiLibrary: 'bootstrap4'
});
<?php } ?>

$('#cad-completo').click(function() {
    console.log("test");
    $('#maisDados').on('shown.bs.collapse', function() {
        $('#cad-completo')
        .parent()
        .find(".fa-angle-right")
        .removeClass("fa-angle-right")
        .addClass("fa-angle-up");
    })
    .on('hidden.bs.collapse', function() {
        $('#cad-completo')
        .parent()
        .find(".fa-angle-up")
        .removeClass("fa-angle-up")
        .addClass("fa-angle-right");
    }); 
});

<?php if($lista_produto1 != null){ ?>
new Chart(document.getElementById("graph-produto1"), {
    type: 'doughnut',
    data: {
        labels: <?php echo json_encode($label_produto1); ?>,
        datasets: [{
            label: "Produtos vendidos",
            backgroundColor: <?php echo json_encode($color_produto1); ?>,
            data: <?php echo json_encode($perc_produto1); ?>
        }]
    },    
    options: {            
        responsive: true,        
        legend: {
            display: false,
        },
        pieceLabel: {
            mode: 'value'
        },
        plugins: {
            labels: {
                render: function (args) {
                    if(args.percentage <= 10){
                        return "";
                    }

                    return args.value.toLocaleString("pt-BR", {
                            style: "decimal",
                            minimumFractionDigits: 1,
                            maximumFractionDigits: 1
                    }) + "%";
                },
                fontColor: 'white',
            }
        },
        tooltips: {
            enabled: false,
        },        
        cutoutPercentage: 35,  
    }
    
});
<?php } ?>

<?php if($lista_produto2 != null){ ?>
new Chart(document.getElementById("graph-produto2"), {
    type: 'doughnut',
    data: {
        labels: <?php echo json_encode($label_produto2); ?>,
        datasets: [{
            label: "Produtos vendidos",
            backgroundColor: <?php echo json_encode($color_produto2); ?>,
            data: <?php echo json_encode($perc_produto2); ?>
        }]
    },    
    options: {            
        responsive: true,        
        legend: {
            display: false,
        },
        pieceLabel: {
            mode: 'value'
        },
        plugins: {
            labels: {
                render: function (args) {
                    if(args.percentage <= 10){
                        return "";
                    }

                    return args.value.toLocaleString("pt-BR", {
                            style: "decimal",
                            minimumFractionDigits: 1,
                            maximumFractionDigits: 1
                    }) + "%";
                },
                fontColor: 'white',
            }
        },
        tooltips: {
            enabled: false,
        },        
        cutoutPercentage: 35,  
    }
    
});
<?php } ?>

<?php if($lista_produto3 != null){ ?>
new Chart(document.getElementById("graph-produto3"), {
    type: 'doughnut',
    data: {
        labels: <?php echo json_encode($label_produto3); ?>,
        datasets: [{
            label: "Produtos vendidos",
            backgroundColor: <?php echo json_encode($color_produto3); ?>,
            data: <?php echo json_encode($perc_produto3); ?>
        }]
    },    
    options: {            
        responsive: true,        
        legend: {
            display: false,
        },
        pieceLabel: {
            mode: 'value'
        },
        plugins: {
            labels: {
                render: function (args) {
                    if(args.percentage <= 10){
                        return "";
                    }

                    return args.value.toLocaleString("pt-BR", {
                            style: "decimal",
                            minimumFractionDigits: 1,
                            maximumFractionDigits: 1
                    }) + "%";
                },
                fontColor: 'white',
            }
        },
        tooltips: {
            enabled: false,
        },        
        cutoutPercentage: 35,  
    }
    
});
<?php } ?>
    

</script>

<?php $this->load->view('gerais/footer'); ?>