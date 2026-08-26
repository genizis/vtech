<?php $this->load->view('gerais/header', $menu); ?>
<?php $this->load->view('gerais/menu', $menu); ?>

<section>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('visao-geral') ?>">Visão Geral</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('vendas') ?>">Vendas</a></li>
            <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>painel/clientes">Painel de Cliente</a></li>
            <li class="breadcrumb-item active">Dados de Venda do Cliente</li>
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
                                    <strong>
                                        <?= $cliente->cod_cliente ?> - <?= $cliente->nome_cliente ?>
                                    </strong>
                                </h5>
                                <span class='badge bg-light'><?= $cliente->nome_segmento ?></span>                             
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12"> 
                                                           
                                <table class="table table-borderless table-sm mb-0">
                                    <tbody>
                                        <?php if($cliente->razao_social != null){ ?>  
                                        <tr>
                                            <td class="text-left">
                                                Razão Social
                                            </td>
                                            <td class="text-right">
                                                <strong><?= $cliente->razao_social ?></strong>
                                            </td>
                                        </tr>
                                        <?php } ?> 
                                        <tr>
                                            <td class="text-left">
                                                Tipo pessoa
                                            </td>
                                            <td class="text-right">
                                            <?php  
                                                switch($cliente->tipo_pessoa){
                                                    case 1:
                                                        echo "Pessoa Jurídica";
                                                        break;
                                                    case 2:
                                                        echo "Pessoa Física";
                                                        break;
                                                    case 3:
                                                        echo "Estrangeira";
                                                        break;
                                                }
                                            ?>
                                            </td>
                                        </tr>
                                        <?php if($cliente->cnpj_cpf != null){ ?>  
                                        <tr>                                      
                                            <td class="text-left">
                                                CNPJ/CPF
                                            </td>
                                            <td class="text-right">
                                                <?= $cliente->cnpj_cpf ?>
                                            </td>
                                        <tr>
                                        <?php } ?>
                                        <tr>                                      
                                            <td class="text-left">
                                                Tipo Contribuinte ICMS
                                            </td>
                                            <td class="text-right">
                                            <?php  
                                                switch($cliente->tipo_contrib_icms){
                                                    case 1:
                                                        echo "Contribuinte";
                                                        break;
                                                    case 2:
                                                        echo "Contribuinte Isento";
                                                        break;
                                                    case 9:
                                                        echo "Não Contribuinte";
                                                        break;
                                                }
                                            ?>
                                            </td>
                                        <tr>
                                        <?php if($cliente->insc_estadual != null){ ?>  
                                        <tr>                                      
                                            <td class="text-left">
                                                Insc Estadual
                                            </td>
                                            <td class="text-right">
                                                <?= $cliente->insc_estadual ?>
                                            </td>
                                        <tr>
                                        <?php } ?>
                                        <?php if($cliente->insc_municipal != null){ ?>  
                                        <tr>                                      
                                            <td class="text-left">
                                                Insc Municipal
                                            </td>
                                            <td class="text-right">
                                                <?= $cliente->insc_municipal ?>
                                            </td>
                                        <tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <?php if($cliente->tel_fixo != null || $cliente->tel_cel != null || $cliente->email != null){ ?>  
                                <table class="table table-borderless table-sm mb-0">
                                    <tbody>
                                        <?php if($cliente->tel_fixo != null){ ?>  
                                        <tr>                                      
                                            <td class="text-left">
                                                Telefone Fixo
                                            </td>
                                            <td class="text-right">
                                                <?= $cliente->tel_fixo ?>
                                            </td>
                                        <tr>
                                        <?php } ?>
                                        <?php if($cliente->tel_cel != null){ ?>  
                                        <tr>                                      
                                            <td class="text-left">
                                                Telefone Celular
                                            </td>
                                            <td class="text-right">
                                                <?= $cliente->tel_cel ?>
                                            </td>
                                        <tr>
                                        <?php } ?>
                                        <?php if($cliente->email != null){ ?>  
                                        <tr>                                      
                                            <td class="text-left">
                                                E-mail
                                            </td>
                                            <td class="text-right">
                                                <?= $cliente->email ?>
                                            </td>
                                        <tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <?php } ?>
                                <?php if($cliente->contato_comercial != null || $cliente->tel_comercial != null || $cliente->email_comercial != null){ ?>  
                                <table class="table table-borderless table-sm mb-0">
                                    <tbody>
                                        <?php if($cliente->contato_comercial != null){ ?>  
                                        <tr>                                      
                                            <td class="text-left">
                                                Contato Comercial
                                            </td>
                                            <td class="text-right">
                                                <?= $cliente->contato_comercial ?>
                                            </td>
                                        <tr>
                                        <?php } ?>
                                        <?php if($cliente->tel_comercial != null){ ?>  
                                        <tr>                                      
                                            <td class="text-left">
                                                Telefone Comercial
                                            </td>
                                            <td class="text-right">
                                                <?= $cliente->tel_comercial ?>
                                            </td>
                                        <tr>
                                        <?php } ?>
                                        <?php if($cliente->email_comercial != null){ ?>  
                                        <tr>                                      
                                            <td class="text-left">
                                                E-mail Comercial
                                            </td>
                                            <td class="text-right">
                                                <?= $cliente->email_comercial ?>
                                            </td>
                                        <tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <?php } ?>
                                <?php if($cliente->contato_financeiro != null || $cliente->tel_financeiro != null || $cliente->email_financeiro != null){ ?>  
                                <table class="table table-borderless table-sm mb-0">
                                    <tbody>
                                        <?php if($cliente->contato_financeiro != null){ ?>  
                                        <tr>                                      
                                            <td class="text-left">
                                                Contato Financeiro
                                            </td>
                                            <td class="text-right">
                                                <?= $cliente->contato_financeiro ?>
                                            </td>
                                        <tr>
                                        <?php } ?>
                                        <?php if($cliente->tel_financeiro != null){ ?>  
                                        <tr>                                      
                                            <td class="text-left">
                                                Telefone Financeiro
                                            </td>
                                            <td class="text-right">
                                                <?= $cliente->tel_financeiro ?>
                                            </td>
                                        <tr>
                                        <?php } ?>
                                        <?php if($cliente->email_financeiro != null){ ?>  
                                        <tr>                                      
                                            <td class="text-left">
                                                E-mail Financeiro
                                            </td>
                                            <td class="text-right">
                                                <?= $cliente->email_financeiro ?>
                                            </td>
                                        <tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <?php } ?>
                                <?php if($cliente->cep != null || $cliente->endereco != null || $cliente->numero != null ||
                                         $cliente->complemento != null || $cliente->bairro != null || $cliente->nome_cidade != null){ ?>  
                                <table class="table table-borderless table-sm mb-0">
                                    <tbody>
                                        <?php if($cliente->cep != null){ ?>  
                                        <tr>                                      
                                            <td class="text-left">
                                                CEP
                                            </td>
                                            <td class="text-right">
                                                <?= $cliente->cep ?>
                                            </td>
                                        <tr>
                                        <?php } ?>
                                        <?php if($cliente->endereco != null){ ?>  
                                        <tr>                                      
                                            <td class="text-left">
                                                Endereço
                                            </td>
                                            <td class="text-right">
                                                <?= $cliente->endereco ?>
                                            </td>
                                        <tr>
                                        <?php } ?>
                                        <?php if($cliente->numero != null){ ?>  
                                        <tr>                                      
                                            <td class="text-left">
                                                Número
                                            </td>
                                            <td class="text-right">
                                                <?= $cliente->numero ?>
                                            </td>
                                        <tr>
                                        <?php } ?>
                                        <?php if($cliente->complemento != null){ ?>  
                                        <tr>                                      
                                            <td class="text-left">
                                                Complemento
                                            </td>
                                            <td class="text-right">
                                                <?= $cliente->complemento ?>
                                            </td>
                                        <tr>
                                        <?php } ?>
                                        <?php if($cliente->bairro != null){ ?>  
                                        <tr>                                      
                                            <td class="text-left">
                                                Bairro
                                            </td>
                                            <td class="text-right">
                                                <?= $cliente->bairro ?>
                                            </td>
                                        <tr>
                                        <?php } ?>
                                        <?php if($cliente->nome_cidade != null){ ?>  
                                        <tr>                                      
                                            <td class="text-left">
                                                Cidade
                                            </td>
                                            <td class="text-right">
                                                <?= $cliente->nome_cidade ?>/<?= $cliente->uf ?>
                                            </td>
                                        <tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 pl-0">
                <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" data-toggle="tab" href="#pedidos" role="tab"
                            aria-controls="home" aria-selected="true">Pedidos</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-toggle="tab" href="#faturamentos" role="tab"
                            aria-controls="faturamentos" aria-selected="false">Faturamentos</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-toggle="tab" href="#produtos" role="tab"
                            aria-controls="produtos" aria-selected="false">Produtos</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-toggle="tab" href="#titulos" role="tab"
                            aria-controls="titulos" aria-selected="false">Títulos</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="pedidos" role="tabpanel"
                                aria-labelledby="home-tab">
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <div class="card text-left">
                                    <div class="card-body">
                                        <h4 class="mb-0 text-dark"><strong><?= number_format((float) ($valores->quant_pedido_aprov), 0, ',', '.') ?></strong></h4>
                                        <p class=" text-muted"><i>aprovados</i></p>
                                        <h4 class="mb-0 text-teal"><strong>R$ <?= number_format((float) ($valores->total_pedido_aprov), 2, ',', '.') ?></strong></h4>
                                        <p class="mb-0 text-muted"><i>total vendido</i></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card text-left">
                                    <div class="card-body">
                                        <h4 class="mb-0 text-dark"><strong>2</strong></h4>
                                        <p class="text-muted"><i>reprovados</i></p>
                                        <h4 class="mb-0 text-danger"><strong>R$ <?= number_format((float) (0), 2, ',', '.') ?></strong></h4>
                                        <p class="mb-0 text-muted"><i>total perdido</i></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card text-left">
                                    <div class="card-body">
                                        <h4 class="mb-0 text-dark"><strong>2</strong></h4>
                                        <p class="text-muted"><i>em orçamento</i></p>
                                        <h4 class="mb-0 text-muted"><strong>R$ <?= number_format((float) (0), 2, ',', '.') ?></strong></h4>
                                        <p class="mb-0 text-muted"><i>total previsto</i></p>
                                    </div>
                                </div>
                            </div>
                        </div>                
                        <div class="card  mb-3">
                            <div class="card-body">                        
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
                                                <table class="table table-bordered table-nf mb-3">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th scope="col" class="text-center"><i
                                                                    class="fa-solid fa-check"></i></th>
                                                            <th scope="col" class="text-center">Pedido</th>
                                                            <th scope="col" class="text-center">Data de emissão</th>                                                            
                                                            <th scope="col" class="text-center">Data de entrega</th>
                                                            <th scope="col" class="text-left">Vendedor</th>
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
                                                                <?= $pedido->num_pedido_venda ?>
                                                            </td>
                                                            <td class="text-center align-middle">
                                                                <?= str_replace('-', '/', date("d-m-Y", strtotime($pedido->data_emissao))) ?>
                                                            </td>
                                                            <td class="text-center align-middle">
                                                                <?= str_replace('-', '/', date("d-m-Y", strtotime($pedido->data_entrega))) ?>
                                                            </td>
                                                            <td class="text-left align-middle">
                                                                <?= $pedido->nome_vendedor ?>
                                                            </td>
                                                            <td class="text-right align-middle text-teal">
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
                                                <?php if ($pedido_venda == false) { ?>
                                                <div class="text-center text-muted">
                                                    <p class="font-italic mt-3">Nenhum pedido emitido</p>
                                                </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="faturamentos">
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <h4 class="mb-1 text-teal"><strong>R$ <?= number_format((float) ($valores->valor_total_pedido), 2, ',', '.') ?></strong></h4>
                                        <p class="mb-0 text-secondary"><i>total produtos</i></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <h4 class="mb-1 text-teal"><strong>R$ <?= number_format((float) ($valores->valor_total_faturado), 2, ',', '.') ?></strong></h4>
                                        <p class="mb-0 text-secondary"><i>total frete</i></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <h4 class="mb-1 text-info"><strong>R$ <?= number_format((float) ($valores->valor_total_titulo), 2, ',', '.') ?></strong></h4>
                                        <p class="mb-0 text-secondary"><i>desconto</i></p>
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

<script>
$(function() {
    $.applyDataMask();
});

</script>

<?php $this->load->view('gerais/footer'); ?>