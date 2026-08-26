<?php $this->load->view('gerais/header', $menu); ?>
<?php $this->load->view('gerais/menu', $menu); ?>

<section>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('visao-geral') ?>">Visão Geral</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('vendas') ?>">Vendas</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('painel/clientes') ?>">Painel de Cliente</a></li>
            <li class="breadcrumb-item active">Detalhe do Cliente</a></li>
        </ol>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card  mb-3">
                    <div class="card-header">
                        <h2 class="mb-0 font-weight-bold"><?php if($cliente->ativo == 1) echo "<i class='fa-solid fa-check text-teal'></i>"; else echo "<i class='fa-solid fa-xmark text-danger'></i>"; ?> <?= $cliente->cod_cliente ?> - <?= $cliente->nome_cliente ?></h2>
                    </div>                    
                    <div class="card-body">   
                                     
                        <div class="row">
                            <div class="col-md-4">
                                <p class="mb-1 font-weight-bold">CEP</p>
                                <p><?php if($cliente->cep != "") echo $cliente->cep; else echo "-"; ?></p>
                            </div>
                            <div class="col-md-4">
                                <p class="mb-1 font-weight-bold">Endereço</p>
                                <p><?php if($cliente->endereco != "") echo $cliente->endereco; else echo "-"; ?> 
                                <a href="http://maps.google.com.br/maps?q=<?= $cliente->endereco . " " . $cliente->numero . " " . $cliente->nome_cidade . " " . $cliente->uf . " " . $cliente->cep . " " . $cliente->nome_pais ?>" class="text-info" target="_blank"><i class="fa-solid fa-location-dot"></i></a>
                                </p>
                            </div>
                            <div class="col-md-4">
                                <p class="mb-1 font-weight-bold">Número</p>
                                <p><?php if($cliente->numero != "") echo $cliente->numero; else echo "-"; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p class="mb-1 font-weight-bold">Complemento</p>
                                <p><?php if($cliente->complemento != "") echo $cliente->complemento; else echo "-"; ?></p>
                            </div>
                            <div class="col-md-4">
                                <p class="mb-1 font-weight-bold">Bairro</p>
                                <p><?php if($cliente->bairro != "") echo $cliente->bairro; else echo "-"; ?></p>
                            </div>
                            <div class="col-md-4">
                                <p class="mb-1 font-weight-bold">Cidade</p>
                                <p><?php if($cliente->nome_cidade != "") echo $cliente->nome_cidade . "/". $cliente->uf; else echo "-"; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p class="mb-1 font-weight-bold">Telefone Fixo</p>
                                <p><?php if($cliente->tel_fixo != "") echo $cliente->tel_fixo; else echo "-"; ?></p>
                            </div>
                            <div class="col-md-4">
                                <p class="mb-1 font-weight-bold">Telefone Celular</p>
                                <p><?php if($cliente->tel_cel != "") echo $cliente->tel_cel; else echo "-"; ?></p>
                            </div>
                            <div class="col-md-4">
                                <p class="mb-1 font-weight-bold">E-mail</p>
                                <p><?php if($cliente->email != "") echo $cliente->email; else echo "-"; ?></p>
                            </div>
                        </div>                       
                        <div class="collapse " id="maisDados">  
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="mb-1 font-weight-bold">Razão Social</p>
                                    <p><?= $cliente->razao_social ?></p>
                                </div>
                                <div class="col-md-4">
                                    <p class="mb-1 font-weight-bold">Tipo Pessoa</p>
                                    <p><?php if($cliente->tipo_pessoa == 1) echo "Jurídica"; elseif($cliente->tipo_pessoa == 2) echo "Física"; elseif($cliente->tipo_pessoa == 3) echo "Estrangeira"; ?></p>
                                </div>
                                <div class="col-md-4">
                                    <p class="mb-1 font-weight-bold">Segmento</p>
                                    <p><?= $cliente->nome_segmento ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="mb-1 font-weight-bold">CNPJ/CPF</p>
                                    <p><?= $cliente->cnpj_cpf ?></p>
                                </div>
                                <div class="col-md-4">
                                    <p class="mb-1 font-weight-bold">Inscrição Estadual</p>
                                    <p><?php if($cliente->insc_estadual != "") echo $cliente->insc_estadual; else echo "-"; ?></p>
                                </div>
                                <div class="col-md-4">
                                    <p class="mb-1 font-weight-bold">Inscrição Municipal</p>
                                    <p><?php if($cliente->insc_municipal != "") echo $cliente->insc_municipal; else echo "-"; ?></p>
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-4">
                                    <p class="mb-1 font-weight-bold">Contribuinte ICMS</p>
                                    <p><?php if($cliente->tipo_contrib_icms == 9) echo "Não Contribuinte"; elseif($cliente->tipo_contrib_icms == 1) echo "Contribuinte"; elseif($cliente->tipo_contrib_icms == 2) echo "Contribuinte Isento"; ?></p>
                                </div>                                
                            </div>  
                        </div> 
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-12">
                                <a class="btn btn-link small text-center text-success pull-right" data-toggle="collapse" href="#maisDados" role="button" aria-expanded="false" aria-controls="maisDados" id="cad-completo">
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
                            <h4 class="text-teal mb-1"><b>R$ <?= number_format((float) ($lista_valores3->total_vendas), 2, ',', '.') ?></b></h4>
                            <p class="mb-0 small2 text-muted">total vendido</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 text-center pr-0">
                        <div class="card mb-3">
                            <div class="card-body bg-light">
                            <h4 class="text-info mb-1"><b><?= $lista_count3->quant_pedidos ?></b></h4>
                            <p class="mb-0 small2 text-muted">pedidos feitos</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 text-center pr-0">
                        <div class="card mb-3">
                            <div class="card-body bg-light">
                            <h4 class="text-muted mb-1"><b>R$ <?php if($lista_count3->quant_pedidos != 0) echo number_format((float) ($lista_valores3->total_vendas / $lista_count3->quant_pedidos), 2, ',', '.'); else echo number_format((float) (0), 2, ',', '.'); ?></b></h4>
                            <p class="mb-0 small2 text-muted">ticket médio</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 text-center">
                        <div class="card mb-3">
                            <div class="card-body bg-light">
                            <h4 class="text-warning mb-1"><b><?php if($dados_venda != null) echo $dados_venda->dias_venda; else echo "N/C"; ?></b></h4>
                            <p class="mb-0 small2 text-muted">dias sem comprar</p>
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="nav nav-tabs mb-3">                    
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#pedidos-venda">Pedidos de Venda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#titulos-emitidos">Títulos Emitidos</a>
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
                                                                        <th scope="col" class="text-left">Vendedor</th>
                                                                        <th scope="col" class="text-center">Data emissão</th>                                                            
                                                                        <th scope="col" class="text-center">Data entrega</th>                                                                    
                                                                        <th scope="col" class="text-right">Total pedido</th>
                                                                        <th scope="col" class="text-right">Total faturado</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                <?php foreach($pedido_venda as $key_pedido => $pedido) { ?>
                                                                    <tr>
                                                                        <td class="text-center align-middle">
                                                                            <?php  
                                                                                switch ($pedido->situacao) {
                                                                                    case 1:
                                                                                        echo "<i class='fa-solid fa-xs fa-circle text-muted' data-toggle='tooltip'
                                                                                        data-placement='right'
                                                                                        title='Em Orçamento'></i>";
                                                                                        break;
                                                                                    case 2:
                                                                                        echo "<i class='fa-solid fa-xs fa-circle text-danger' data-toggle='tooltip'
                                                                                        data-placement='right'
                                                                                        title='Orçamento Reprovado'></i>";
                                                                                        break;
                                                                                    case 3:
                                                                                        echo "<i class='fa-solid fa-xs fa-circle text-teal' data-toggle='tooltip'
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
                                                                            <?= $pedido->nome_vendedor ?>
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
                                                                        <td class="text-right align-middle text-info">
                                                                            R$ <?= number_format((float) ($pedido->valor_total_pedido + 
                                                                                    $pedido->valor_frete +
                                                                                    $pedido->valor_seguro +
                                                                                    $pedido->outras_despesas - 
                                                                                    $pedido->valor_desconto), 2, ',', '.') ?>
                                                                        </td>
                                                                        <td class="text-right align-middle <?php if($pedido->valor_total_faturado > 0) echo "text-teal"; else echo "text-muted" ?>">
                                                                            R$ <?= number_format((float) ($pedido->valor_total_faturado), 2, ',', '.') ?>
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
                                            <div class="tab-pane fade" id="titulos-emitidos">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered table-reporte">
                                                                <thead class="thead-light">
                                                                    <tr>
                                                                        <th scope="col" class="text-center"><i class="fa-solid fa-check"></i></th>
                                                                        <th scope="col" class="text-center">Data</th>
                                                                        <th scope="col" class="text-center">Título</th>
                                                                        <th scope="col">Descrição</th>
                                                                        <th scope="col" class="text-center">Parcela</th>
                                                                        <th scope="col" class="text-right">Valor</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody class="table-sm">
                                                                    <?php foreach ($lista_titulo as $key_movimento_detalhada => $titulo) {
                                                                        if ($titulo->confirmado == 1)
                                                                            $valor_titulo = $titulo->valor_confirmado;
                                                                        else
                                                                            $valor_titulo = $titulo->valor_titulo;
                                                                    ?>
                                                                        <tr>
                                                                            <td class="text-center align-middle small2">
                                                                                <?php if ($titulo->confirmado == 1) echo "<i class='fas fa-check-circle text-teal-light'></i>";
                                                                                    elseif($titulo->confirmado == 0 && $titulo->data_vencimento < date('Y-m-d')) echo "<i class='fa-solid fa-circle text-danger-light'></i>";
                                                                                    else echo "<i class='fa-solid fa-circle text-light'></i>"; ?>
                                                                            </td>
                                                                            <td class="text-center align-middle <?php if ($titulo->confirmado != 1 && $titulo->data_vencimento < date('Y-m-d')) echo "text-danger"; ?>
                                                                                                                <?php if ($titulo->confirmado != 1 && $titulo->data_vencimento == date('Y-m-d')) echo "text-warning"; ?>">
                                                                                <?= str_replace('-', '/', date("d-m-Y", strtotime($titulo->data_movimento))) ?>
                                                                                <?php if ($titulo->confirmado != 1 && $titulo->data_vencimento < date('Y-m-d')) { ?>
                                                                                <span class="badge bg-danger-light">
                                                                                    <?php
                                                                                        
                                                                                        $date1 = date_create($titulo->data_vencimento);
                                                                                        $date2 = date_create(date('Y-m-d'));
                                                                                        $diff = date_diff($date1, $date2);
                                                                                        echo $diff->format("%a");
                                                                                    ?>
                                                                                </span>
                                                                                <?php } ?>                                                        
                                                                            </td>
                                                                            <td class="text-center align-middle"><?= $titulo->cod_movimento_conta ?></td>
                                                                            </td>
                                                                            <td class="limit-text-40 align-middle align-middle" data-toggle="tooltip" data-placement="bottom" title="<?= $titulo->desc_movimento ?>">
                                                                                <a href="#" data-toggle="modal" class="text-dark" data-target="#visualizar-titulo<?= $titulo->cod_movimento_conta ?>"><?= $titulo->desc_movimento ?></a><br>
                                                                                <span class="badge bg-info-light"><?= $titulo->nome_conta ?>
                                                                                </span>
                                                                                <span class="badge font-italic text-muted"><?= $titulo->nome_metodo_pagamento ?></span>
                                                                            </td>
                                                                            <td class="text-center align-middle"><?= $titulo->parcela ?></td>
                                                                            <td class="text-right align-middle <?php if ($titulo->tipo_movimento == 2) echo "text-danger"; ?>
                                                                                    <?php if ($titulo->tipo_movimento == 1) echo "text-teal"; ?>">
                                                                                R$
                                                                                <?php if ($titulo->tipo_movimento == 2) echo "-"; ?>
                                                                                <?php
                                                                                if ($titulo->confirmado == 1)
                                                                                    echo number_format((float) ($titulo->valor_confirmado), 2, ',', '.');
                                                                                else
                                                                                    echo number_format((float) ($titulo->valor_titulo), 2, ',', '.');  ?>
                                                                            </td>
                                                                        </tr>
                                                                    <?php } ?>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <?php if ($lista_titulo == false) { ?>
                                                            <div class="text-center text-muted">
                                                                <p class="font-italic mt-3">Nenhum título encontrado para o cliente</p>
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
                                                    <div class="col-lg-12 col-md-12 col-xs-12">
                                                        <form class="mb-0 needs-validation" novalidate
                                                            action="<?= base_url("painel/clientes/excluir-nota") ?>"
                                                            method="POST" id="DeleteNota">
                                                            <input type="hidden" name="CodCliente"
                                                                value="<?= $cliente->cod_cliente ?>">
                                                            <div class="list-group mt-2">
                                                                <?php foreach($notas as $key_nota => $nota) { ?>
                                                                <div class="list-group-item ">
                                                                    <div class="d-flex w-100 justify-content-between">
                                                                        <h5 class="mb-0"><input name="excluir_todos[]" type="checkbox"
                                                                            value="<?= $nota->cod_nota_cliente ?>"
                                                                            <?php if($nota->usuario != getDadosUsuarioLogado()['email'] && getDadosUsuarioLogado()['tipo_acesso'] != 1){ echo "disabled"; } ?> /> <a href="#" class="text-dark" data-toggle="modal" data-target="#atualizar-nota<?= $nota->cod_nota_cliente ?>">
                                                                                <strong>
                                                                                <?php if($nota->nome_usuario != ""){ ?>
                                                                                    <?= $nota->nome_usuario ?>
                                                                                    <?php } ?>
                                                                                    <?php if($nota->nome_vendedor != ""){ ?>
                                                                                    <?= $nota->nome_vendedor ?> <i><?= "(Vendedor)" ?></i>
                                                                                    <?php } ?>
                                                                                </strong>
                                                                            </a>
                                                                        </h5>
                                                                    <small class="text-muted"><?= str_replace('-', '/', date("d-m-Y", strtotime($nota->data_nota))) ?></small>
                                                                    </div>                                                                    
                                                                    <p class="mb-1 mt-3"><i><?= $nota->comentario ?></i></p>
                                                                </div>
                                                                <?php } ?>
                                                            </div>                                                            
                                                            <?php if ($notas == false) { ?>
                                                                <div class="text-center text-muted">
                                                                    <p class="font-italic mt-3">Nenhuma nota encontrada para o cliente</p>
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
                                                        R$ <?= number_format((float) ($lista_valores1->total_vendas), 2, ',', '.') ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left">
                                                    <i class="fa-solid fa-circle fa-xs pr-2 text-info"></i> Pedidos realizados
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
                                                        R$ <?php if($lista_count1->quant_pedidos != 0) echo number_format((float) ($lista_valores1->total_vendas / $lista_count1->quant_pedidos), 2, ',', '.'); else echo number_format((float) (0), 2, ',', '.'); ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left">
                                                    <i class="fa-solid fa-circle fa-xs pr-2 text-warning"></i> Dias sem comprar
                                                    </td>
                                                    <td class="text-right <?php if($dados_venda != null){ if($dados_venda->dias_venda > 0) echo "text-warning"; else echo "text-muted";} else echo "text-muted"; ?>">
                                                        <?php if($dados_venda != null) echo $dados_venda->dias_venda . " dias"; else echo "nunca comprou"; ?>
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
                                                            <span class="text-teal">R$ <?= number_format((float) ($produto->valor_total), 2, ',', '.') ?></span>
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
                                                        R$ <?= number_format((float) ($lista_valores2->total_vendas), 2, ',', '.') ?>
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
                                                        R$ <?php if($lista_count2->quant_pedidos != 0) echo number_format((float) ($lista_valores2->total_vendas / $lista_count2->quant_pedidos), 2, ',', '.'); else echo number_format((float) (0), 2, ',', '.'); ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left">
                                                    <i class="fa-solid fa-circle fa-xs pr-2 text-warning"></i> Dias sem comprar
                                                    </td>
                                                    <td class="text-right <?php if($dados_venda != null){ if($dados_venda->dias_venda > 0) echo "text-warning"; else echo "text-muted";} else echo "text-muted"; ?>">
                                                        <?php if($dados_venda != null) echo $dados_venda->dias_venda . " dias"; else echo "nunca comprou"; ?>
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
                                                            R$ <?= number_format((float) ($produto->valor_total), 2, ',', '.') ?>
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
                                                        R$ <?= number_format((float) ($lista_valores3->total_vendas), 2, ',', '.') ?>
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
                                                        R$ <?php if($lista_count3->quant_pedidos != 0) echo number_format((float) ($lista_valores3->total_vendas / $lista_count3->quant_pedidos), 2, ',', '.'); else echo number_format((float) (0), 2, ',', '.'); ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left">
                                                    <i class="fa-solid fa-circle fa-xs pr-2 text-warning"></i> Dias sem comprar
                                                    </td>
                                                    <td class="text-right <?php if($dados_venda != null){ if($dados_venda->dias_venda > 0) echo "text-warning"; else echo "text-muted";} else echo "text-muted"; ?>">
                                                        <?php if($dados_venda != null) echo $dados_venda->dias_venda . " dias"; else echo "nunca comprou"; ?>
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
                                                            R$ <?= number_format((float) ($produto->valor_total), 2, ',', '.') ?>
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
                                            action="<?= base_url("painel/clientes/inserir-nota/{$cliente->cod_cliente}") ?>"
                                            method="POST" id="InserirNota">
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label class="control-label" for="inputTituloNota">Assunto da Nota <span
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
                <h5 class="modal-title">Alterar nota</h5>
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
                                            action="<?= base_url("painel/clientes/alterar-nota/{$nota->cod_nota_cliente}") ?>"
                                            method="POST" id="AtualizarNota">
                                            <div class="form-row">
                                                <div class="form-group col-md-8">
                                                    <label class="control-label" for="inputTituloNota<?= $nota->cod_nota_cliente ?>">Assunto da Nota <span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control" id="inputTituloNota<?= $nota->cod_nota_cliente ?>" type="text" name="TituloNota"
                                                        value="<?= $nota->titulo ?>" required <?php if($nota->usuario != getDadosUsuarioLogado()['email']) echo "readonly"; ?>>
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
                <button type="submit" class="btn btn-primary" form="AtualizarNota" <?php if($nota->usuario != getDadosUsuarioLogado()['email']) echo "disabled"; ?>><i class="fa-solid fa-note-sticky"></i>
                    Atualizar Nota</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<?php foreach ($lista_titulo as $key_titulos => $titulo) { ?>
    <div class="modal fade" id="visualizar-titulo<?= $titulo->cod_movimento_conta ?>">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Destalhes do título</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body modal-body-scroll bg-light">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p class="mb-1 font-weight-bold">Situação</p>
                                            <p><?php if ($titulo->confirmado == 1) echo "<span class='text-teal'>Pago</span>";
                                                  elseif($titulo->confirmado == 0 && $titulo->data_vencimento < date('Y-m-d')) echo "<span class='text-danger'>Vencido</span>";
                                                  else echo "<span class='text-secondary'>Pendente</span>"; ?></p>
                                        </div>
                                        <div class="col-md-8">
                                            <p class="mb-1 font-weight-bold">Descrição</p>
                                            <p><?= $titulo->desc_movimento; ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p class="mb-1 font-weight-bold">Título</p>
                                            <p><?=  $titulo->cod_movimento_conta ?></p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="mb-1 font-weight-bold">Usuário criação</p>
                                            <p><?php if($titulo->nome_usuario_criacao != "") echo $titulo->nome_usuario_criacao; else echo "-"; ?></p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="mb-1 font-weight-bold">Usuário liquidação</p>
                                            <p><?php if($titulo->nome_usuario_liquidacao != "") echo $titulo->nome_usuario_liquidacao; else echo "-"; ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p class="mb-1 font-weight-bold">Data de competência</p>
                                            <p><?= str_replace('-', '/', date("d-m-Y", strtotime($titulo->data_competencia))) ?></p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="mb-1 font-weight-bold">Data de vencimento</p>
                                            <p class="<?php if ($titulo->confirmado != 1 && $titulo->data_vencimento < date('Y-m-d')) echo "text-danger"; ?>
                                                                                                                <?php if ($titulo->confirmado != 1 && $titulo->data_vencimento == date('Y-m-d')) echo "text-warning"; ?>">
                                                <?= str_replace('-', '/', date("d-m-Y", strtotime($titulo->data_vencimento))) ?>
                                                <?php if ($titulo->confirmado != 1 && $titulo->data_vencimento < date('Y-m-d')) { ?>
                                                <span class="badge bg-danger-light">
                                                    <?php
                                                        
                                                        $date1 = date_create($titulo->data_vencimento);
                                                        $date2 = date_create(date('Y-m-d'));
                                                        $diff = date_diff($date1, $date2);
                                                        echo $diff->format("%a");
                                                    ?>
                                                </span>
                                                <?php } ?>
                                            </p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="mb-1 font-weight-bold">Parcela</p>
                                            <p><?= $titulo->parcela ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p class="mb-1 font-weight-bold">Método de pagamento</p>
                                            <p><?php if($titulo->nome_metodo_pagamento != "") echo $titulo->nome_metodo_pagamento; else echo "-"; ?></p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="mb-1 font-weight-bold">Centro de custo</p>
                                            <p><?php if($titulo->nome_centro_custo != "") echo $titulo->nome_centro_custo; else echo "-"; ?></p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="mb-1 font-weight-bold">Conta contábil</p>
                                            <p><?php if($titulo->nome_conta_contabil != "") echo $titulo->nome_conta_contabil; else echo "-"; ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p class="mb-1 font-weight-bold">Origem do título</p>
                                            <p>
                                                <?php
                                                    switch ($titulo->origem_movimento) {
                                                        case 2:
                                                            echo "Compras";
                                                            break;
                                                        case 3:
                                                            echo "Vendas";
                                                            break;
                                                        case 4:
                                                            echo "Frente de Caixa";
                                                            break;
                                                        case 5:
                                                            echo "Movimento de Caixa";
                                                            break;
                                                        default:
                                                            echo "Financeiro";
                                                    }
                                                ?>
                                            </p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="mb-1 font-weight-bold">
                                                <?php
                                                    switch ($titulo->origem_movimento) {
                                                        case 2:
                                                            echo "Recebimento";
                                                            break;
                                                        case 3:
                                                            echo "Faturamento";
                                                            break;
                                                        case 4:
                                                            echo "Data Caixa";
                                                            break;
                                                        case 5:
                                                            echo "Código";
                                                            break;
                                                        default:
                                                            echo "Título";
                                                    }
                                                ?>
                                            </p>
                                            <p>
                                                <?php
                                                if ($titulo->id_origem != null)
                                                    echo $titulo->id_origem;
                                                else
                                                    echo $titulo->cod_movimento_conta;
                                                ?>
                                            </p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="mb-1 font-weight-bold">Título relacionado</p>
                                            <p><?php if($titulo->cod_titulo_rel != "") echo $titulo->cod_titulo_rel; else echo "-"; ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p class="mb-1 font-weight-bold">Valor do título</p>
                                            <p class="text-teal">R$ <?= number_format((float) ($titulo->valor_titulo), 2, ',', '.') ?></p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="mb-1 font-weight-bold">Desconto</p>
                                            <p class="<?php if($titulo->valor_desc_taxa > 0) echo "text-danger"; else echo "text-muted"; ?>">R$ <?= number_format((float) ($titulo->valor_desc_taxa), 2, ',', '.') ?></p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="mb-1 font-weight-bold">Multa</p>
                                            <p class="<?php if($titulo->valor_desc_taxa > 0) echo "text-teal"; else echo "text-muted"; ?>">R$ <?= number_format((float) ($titulo->valor_juros_multa), 2, ',', '.') ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p class="mb-1 font-weight-bold">Valor confirmado</p>
                                            <p class="<?php if($titulo->valor_confirmado > 0) echo "text-teal font-weight-bold"; else echo "text-muted"; ?>">R$ <?= number_format((float) ($titulo->valor_confirmado), 2, ',', '.') ?></p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="mb-1 font-weight-bold">Data de confirmação</p>
                                            <p class=""><?php if($titulo->data_confirmacao != null) echo str_replace('-', '/', date("d-m-Y", strtotime($titulo->data_confirmacao))); else echo "-"; ?></p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="mb-1 font-weight-bold">Pagador</p>
                                            <p><?= $titulo->nome_cliente ?></p>
                                        </div>
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
                                                        Situação
                                                    </td>
                                                    <td class="text-right align-middle"><strong>
                                                    <?php  
                                                            switch ($pedido->situacao) {
                                                                case 1:
                                                                    echo "<span class='text-muted'>Em orçamento</span>";
                                                                    break;
                                                                case 2:
                                                                    echo "<span class='text-danger'>Orçamento reprovado</span>";
                                                                    break;
                                                                case 3:
                                                                    echo "<span class='text-teal'>Venda confirmada</span>";
                                                                    break;
                                                            }
                                                        ?>
                                                    </strong></td>
                                                </tr>
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
                                        <table class="table table-borderless table-sm mb-0">
                                            <tbody>
                                                <tr>
                                                    <td class="text-left align-middle ">
                                                        Vendedor
                                                    </td>
                                                    <td class="text-right align-middle">
                                                        <?= $venda->nome_vendedor ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle ">
                                                        Comissão
                                                    </td>
                                                    <td class="text-right align-middle <?php if($venda->perc_comissao > 0) echo "text-info"; else echo "text-muted"; ?>">
                                                        <?= number_format((float) ($venda->perc_comissao), 2, ',', '.') ?>%
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
                                                        R$ <?= number_format((float) ($venda->valor_total_pedido), 2, ',', '.') ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle ">
                                                        Frete <?php if($venda->tipo_frete == 1) echo "CIF"; else echo "FOB"; ?>
                                                    </td>
                                                    <td
                                                        class="text-right align-middle <?php if($venda->valor_frete > 0) echo "text-teal"; else echo "text-muted"; ?>">
                                                        R$ <?= number_format((float) ($venda->valor_frete), 2, ',', '.') ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle">
                                                        Seguro
                                                    </td>
                                                    <td
                                                        class="text-right align-middle <?php if($venda->valor_seguro > 0) echo "text-teal"; else echo "text-muted"; ?>">
                                                        R$ <?= number_format((float) ($venda->valor_seguro), 2, ',', '.') ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle ">
                                                        Outras despesas
                                                    </td>
                                                    <td
                                                        class="text-right align-middle <?php if($venda->outras_despesas > 0) echo "text-teal"; else echo "text-muted"; ?>">
                                                        R$
                                                        <?= number_format((float) ($venda->outras_despesas), 2, ',', '.') ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle">
                                                        Desconto
                                                    </td>
                                                    <td
                                                        class="text-right align-middle <?php if($venda->valor_desconto > 0) echo "text-danger"; else echo "text-muted"; ?>">
                                                        R$
                                                        <?= number_format((float) ($venda->valor_desconto), 2, ',', '.') ?>
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
                                                    R$ <?= number_format((float) ($venda->valor_total_pedido + $venda->valor_frete + $venda->valor_seguro + $venda->outras_despesas -
                                                      $venda->valor_desconto), 2, ',', '.') ?>
                                                </strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left pt-0 text-dark"><strong>TOTAL FATURADO</strong></td>
                                            <td
                                                class="text-right pt-0 <?php if($venda->valor_total_faturado > 0) echo "text-teal"; else echo "text-muted"; ?>">
                                                <strong>
                                                    R$ <?= number_format((float) ($venda->valor_total_faturado), 2, ',', '.') ?>
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
                                                                    <?= number_format((float) ($produto->quant_pedida), 3, ',', '.') ?>
                                                                    <?= $produto->cod_unidade_medida ?>
                                                                </td>
                                                                <td class="text-right align-middle">
                                                                    R$
                                                                    <?= number_format((float) ($produto->valor_unitario), 2, ',', '.') ?>
                                                                </td>
                                                                <td class="text-right text-teal align-middle">
                                                                    R$
                                                                    <?= number_format((float) ($produto->quant_pedida * $produto->valor_unitario), 2, ',', '.') ?>
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
                <h5 class="modal-title">Eliminar notas do cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Confirma eliminação das notas selecionadas?
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