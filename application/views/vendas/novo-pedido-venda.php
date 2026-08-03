<?php $this->load->view('gerais/header' , $menu); ?>
<?php $this->load->view('gerais/menu', $menu); ?>

<section>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('visao-geral') ?>">Visão Geral</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('vendas') ?>">Vendas</a></li>
            <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>vendas/pedido-venda">Pedido de Venda</a>
            </li>
            <li class="breadcrumb-item active">Novo Pedido de Venda</a></li>
        </ol>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
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
                                <form class="mb-0 needs-validation" novalidate
                                    action="<?= base_url('vendas/pedido-venda/novo-pedido-venda') ?>" method="POST"
                                    id="PedidoVenda">
                                    <div class="form-row">
                                        <div class="form-group col-md-9">
                                            <label for="inputCliente">Cliente <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <select id="inputCliente" class="selectpicker show-tick form-control"
                                                    data-live-search="true" data-actions-box="true"
                                                    title=" " data-style="btn-input-primary"
                                                    name="CodCliente" required>
                                                    <?php foreach($lista_cliente as $key_cliente => $cliente) { ?>
                                                    <option value="<?= $cliente->cod_cliente ?>"
                                                        <?php if($cliente->cod_cliente == set_value('CodCliente')) echo "selected"; ?>>
                                                        <?= $cliente->cod_cliente ?> -
                                                        <?= $cliente->nome_cliente ?></option>
                                                    <?php } ?>
                                                </select>
                                                <div class="input-group-append">
                                                    <a href="#" data-toggle="modal" data-target="#novo-cliente" type="button"
                                                        class="btn btn-outline-info btn-block">Novo Cliente</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="inputSituacao">Situação da Venda</label>
                                            <select id="inputSituacao" class="selectpicker show-tick form-control"
                                                data-actions-box="true" data-style="btn-input-primary" name="Situacao">
                                                <option value="1" selected>Orçamento</option>
                                                <option value="2">Orçamento Reprovado</option>
                                                <option value="3">Venda Confirmada</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="inputDateEmissao">Data de Emissão <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="inputDateEmissao"
                                                name="DataEmissao" value="<?php if(set_value('DataEmissao') == ""){
                                                                echo str_replace('-', '/', date("d-m-Y"));
                                                            }else{ echo set_value('DataEmissao'); } ?>" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputVendedor">Vendedor</label>
                                            <select id="inputVendedor" class="selectpicker show-tick form-control"
                                                data-live-search="true" data-actions-box="true"
                                                title=" " data-style="btn-input-primary"
                                                name="CodVendedor">
                                                <?php foreach($lista_vendedor as $key_vendedor => $vendedor) { ?>
                                                <option value="<?= $vendedor->cod_vendedor ?>"
                                                    <?php if($vendedor->cod_vendedor == set_value('CodVendedor')) echo "selected"; ?>>
                                                    <?= $vendedor->cod_vendedor ?> -
                                                    <?= $vendedor->nome_vendedor ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="inputPerComissao">Percentual de Comissão</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="inputPerComissao"
                                                    name="PerComissao" data-mask="##0,00" data-mask-reverse="true"
                                                    <?php if(set_value('CodVendedor') == null) echo "disabled"; ?>
                                                    value="<?= set_value('PerComissao') ?>">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="inputDateEntrega">Data de Entrega <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="inputDateEntrega"
                                                name="DataEntrega" value="<?= set_value('DataEntrega'); ?>" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputTransportador">Transportador</label>
                                            <select id="inputTransportador" class="selectpicker show-tick form-control"
                                                data-live-search="true" data-actions-box="true"
                                                title=" " data-style="btn-input-primary"
                                                name="CodTransportador">
                                                <?php foreach($lista_transportador as $key_transportador => $transportador) { ?>
                                                <option value="<?= $transportador->cod_transportador ?>"
                                                    <?php if($transportador->cod_transportador == set_value('CodTransportador')) echo "selected"; ?>>
                                                    <?= $transportador->cod_transportador ?> -
                                                    <?= $transportador->nome_transportador ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="inputTipoFrete">Frete</label>
                                            <div class="input-group">
                                                <select id="inputTipoFrete" class="selectpicker show-tick form-control"
                                                    data-actions-box="true" data-style="btn-input-primary"
                                                    name="TipoFrete">
                                                    <option value="1">CIF R$</option>
                                                    <option value="2">FOB R$</option>
                                                </select>
                                                <input type="text" class="form-control" data-mask="#.##0,00"
                                                    data-mask-reverse="true" name="Frete" id="inputValorFrete"
                                                    value="<?= set_value('Frete'); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label>Seguro</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">R$</span>
                                                </div>
                                                <input type="text" class="form-control" data-mask="#.##0,00"
                                                    data-mask-reverse="true" name="Seguro" id="inputSeguro"
                                                    value="<?= set_value('Seguro'); ?>">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Outras Despesas</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">R$</span>
                                                </div>
                                                <input type="text" class="form-control" data-mask="#.##0,00"
                                                    data-mask-reverse="true" name="OutrasDespesas" id="inputOutrasDespesas"
                                                    value="<?= set_value('OutrasDespesas'); ?>">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputTipoDesconto">Desconto</label>
                                            <div class="input-group">
                                                <select id="inputTipoDesconto"
                                                    class="selectpicker show-tick form-control" data-actions-box="true"
                                                    data-style="btn-input-primary" name="TipoDesconto">
                                                    <option value="1">R$</option>
                                                    <option value="2">%</option>
                                                </select>
                                                <input type="text" class="form-control" data-mask="#.##0,00"
                                                    data-mask-reverse="true" name="Desconto" id="inputValorDesconto"
                                                    value="<?= set_value('Desconto'); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="inputObservacao">Observações do Pedido de Venda</label>
                                            <textarea class="form-control" rows="3" id="inputObservacao"
                                                name="ObsPedidoVenda"><?= set_value('ObsPedidoVenda'); ?></textarea>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h6>Lista de Produtos</h6>
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-xs-12">
                                                    <button type="button" class="btn btn-outline-info btn-sm"
                                                        data-toggle="tooltip" data-placement="bottom"
                                                        title="Você deve primeiramente salvar o pedido antes de inserir os produtos"
                                                        disabled><i class="fas fa-plus-circle"></i> Adicionar
                                                        Produto</button>
                                                    <button type="button" class="btn btn-outline-danger btn-sm"
                                                        data-toggle="tooltip" data-placement="bottom"
                                                        title="Você deve primeiramente salvar o pedido antes de excluir os produtos"
                                                        disabled><i class="fas fa-trash-alt"></i>
                                                        Excluir</button>
                                                </div>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-hover">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th scope="col" class="text-center"><i
                                                                    class="fa-solid fa-check"></i></th>
                                                            <th scope="col">Produto</th>
                                                            <th scope="col" class="text-right">Quantidade</th>
                                                            <th scope="col" class="text-right">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="text-center text-muted">
                                                <p class="font-italic mt-3">Nenhum produto adicionado
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="mb-3">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button type="submit" form="PedidoVenda" class="btn btn-primary"
                                                name="Opcao" value="salvar"><i class="fas fa-save"></i>
                                                Salvar</button>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row float-right">
                                                <div class="col-md-12">

                                                    <button class="btn btn-info" disabled><i
                                                            class="fas fa-dollar-sign"></i> Faturar Pedido</button>
                                                    <a href="<?php echo base_url() ?>vendas/pedido-venda"
                                                        class="btn btn-secondary link-load">Cancelar</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 pl-0">
                <div class="card  mb-3">
                    <h6 class="card-header bg-white text-muted">
                        Pedido de venda
                    </h6>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-borderless table-sm mb-0">
                                    <tbody>
                                        <tr>
                                            <td class="text-left">
                                                Usuário do pedido
                                            </td>
                                            <td class="text-right">
                                                <?= getDadosUsuarioLogado()['nome_usuario'] ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="table table-borderless table-sm">
                                    <tbody>
                                        <tr>
                                            <td class="text-left">
                                                Total em produtos
                                            </td>
                                            <td class="text-right text-muted" id="idTotoProduto">
                                                R$ <span id="TotoProduto">0,00</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">
                                                Valor de frete <span id="idTipoFrete">CIF</span>
                                            </td>
                                            <td class="text-right text-muted" id="idValorFrete">
                                                R$ <span id="ValorFrete">0,00</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">
                                                Valor de seguro
                                            </td>
                                            <td class="text-right text-muted" id="idValorSeguro">
                                                R$ <span id="ValorSeguro">0,00</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">
                                                Outras despesas
                                            </td>
                                            <td class="text-right text-muted" id="idOutrasDespesas">
                                                R$ <span id="OutrasDespesas">0,00</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">
                                                Desconto
                                            </td>
                                            <td class="text-right text-muted" id="idValorDesconto">
                                            <span id="tipoDescontoValor">R$</span> <span id="ValorDesconto">0,00</span><span id="tipoDescontoPerc"></span>
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
                                    <td class="text-right pt-0" id="idTotalPedido">
                                        <strong>
                                            R$ <span id="TotalPedido">0,00</span>
                                        </strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card  mb-3">
                    <div class="card-body">
                        <a href="#" class="btn btn-outline-warning btn-block disabled" type="button" id="imprimir"><i
                                class="fas fa-print"></i> Imprimir Pedido</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="novo-cliente" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-xxl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Novo cliente</h5>
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
                                    <div class="col-md-12">
                                        <form action='novo-cliente' method='post' class="mb-0 needs-validation" novalidate>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputNomeCliente">Nome do Cliente <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="inputNomeCliente"
                                                        name="NomeCliente" value="<?= set_value('NomeCliente'); ?>" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputRazaoSocial">Razão Social</label>
                                                    <input type="text" class="form-control" id="inputRazaoSocial"
                                                        name="RazaoSocial" value="<?= set_value('RazaoSocial'); ?>">
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label>Tipo Pessoa</label>
                                                    <div class="btn-group btn-block" data-toggle="buttons">
                                                        <label class="btn btn-outline-primary">
                                                            <input type="radio" id="radioJuridica" name="TipoPessoa" value="1"
                                                            <?php if(set_value('TipoPessoa') == 1 || set_value('TipoPessoa') == "") echo 'checked'; ?>> Jurídica
                                                        </label>
                                                        <label class="btn btn-outline-primary">
                                                            <input type="radio" id="radioFisica" name="TipoPessoa" value="2"
                                                            <?php if(set_value('TipoPessoa') == 2) echo 'checked'; ?>> Física
                                                        </label>
                                                        <label class="btn btn-outline-primary">
                                                            <input type="radio" id="radioEstrangeira" name="TipoPessoa" value="3"
                                                            <?php if(set_value('TipoPessoa') == 3) echo 'checked'; ?>> Estrangeira
                                                        </label>
                                                    </div> 
                                                </div>
                                                <div class="form-group col-md-5">
                                                    <label for="inputCPFCNPJ">CNPJ/CPF</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" class="form-control" id="inputCPFCNPJ"
                                                            name="CnpjCpf" value="<?= set_value('CnpjCpf'); ?>">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-outline-info" type="button" id="btnConsultaCNPJ">Consultar CNPJ</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputSegmento">Segmento do Cliente</label>
                                                    <select id="inputSegmento" name="Segmento"
                                                        class="selectpicker show-tick form-control" data-live-search="true"
                                                        data-actions-box="true" title=" ">
                                                        <?php foreach($lista_segmento as $key_segmento => $segmento) { ?>
                                                        <option value="<?= $segmento->cod_segmento ?>" <?php if($segmento->cod_segmento == set_value('Segmento')) echo "selected"; ?>>
                                                            <?= $segmento->nome_segmento ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>                                    
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputContribuinteICMS">Tipo de Contribuição ICMS</label>
                                                    <select id="inputContribuinteICMS" name="ContribuinteICMS" data-style="btn-input-primary"
                                                        class="selectpicker show-tick form-control"
                                                        data-actions-box="true">
                                                        <option value="9" <?php if(set_value('ContribuinteICMS') == 9) echo "selected"; ?>>Não Contribuinte</option>
                                                        <option value="1" <?php if(set_value('ContribuinteICMS') == 1) echo "selected"; ?>>Contribuinte</option>
                                                        <option value="2" <?php if(set_value('ContribuinteICMS') == 2) echo "selected"; ?>>Contribuinte Isento</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputIE">Inscrição Estadual</label>
                                                    <input type="text" class="form-control" id="inputIE"
                                                        name="IE" value="<?= set_value('IE'); ?>">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputIM">Inscrição Municipal</label>
                                                    <input type="text" class="form-control" id="inputIM"
                                                        name="IM" value="<?= set_value('IM'); ?>">
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputTelefoneFixo">Telefone Fixo</label>
                                                    <input type="text" class="form-control" id="inputTelefoneFixo"
                                                        name="TelFixo" value="<?= set_value('TelFixo'); ?>">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputTelefoneCelular">Telefone Celular</label>
                                                    <input type="text" class="form-control" id="inputTelefoneCelular"
                                                        name="TelCel" value="<?= set_value('TelCel'); ?>">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputEmail">E-mail</label>
                                                    <input type="text" class="form-control" id="inputEmail"
                                                        name="Email" value="<?= set_value('Email'); ?>">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label for="inputCEP">CEP</label>
                                                    <input type="text" class="form-control" id="inputCEP"
                                                        name="CEP" value="<?= set_value('CEP'); ?>" data-mask="00000-000">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputEndereco">Endereço</label>
                                                    <input type="text" class="form-control" id="inputEndereco"
                                                        name="Endereco" value="<?= set_value('Endereco'); ?>">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="inputNumero">Número</label>
                                                    <input type="text" class="form-control" id="inputNumero"
                                                        name="Numero" value="<?= set_value('Numero'); ?>">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label for="inputComplemento">Complemento</label>
                                                    <input type="text" class="form-control" id="inputComplemento"
                                                        name="Complemento" value="<?= set_value('Complemento'); ?>">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="inputBairro">Bairro</label>
                                                    <input type="text" class="form-control" id="inputBairro"
                                                        name="Bairro" value="<?= set_value('Bairro'); ?>">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="inputCidade">Cidade</label>
                                                    <select class="form-control selectpicker show-tick" data-live-search="true"
                                                        title=" " id="inputCidade" name="Cidade"> 
                                                        <?php foreach($lista_cidade as $key_cidade => $cidade) { ?>
                                                        <option value="<?= $cidade->id ?>" <?php if($cidade->id == set_value('Cidade')) echo "selected"; ?>><?= $cidade->nome ?> - <?= $cidade->uf ?></option>
                                                        <?php } ?>                                           
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="inputPais">País</label>
                                                    <select class="form-control selectpicker show-tick" data-live-search="true"
                                                        title=" " id="inputPais" name="Pais" disabled>
                                                        <?php foreach($lista_pais as $key_pais => $pais) { ?>
                                                        <option value="<?= $pais->bacen ?>"
                                                            <?php if(1058 == $pais->bacen) echo "selected"; ?>>
                                                            <?= $pais->nome_pt ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <p class="small2 text-muted mb-0 mt-2"><i>* Para preenchimento dos demais campos, acesse o cadastro do cliente</i></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSalvarCliente" class="btn btn-primary">Salvar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>



<script>
$(function() {
    $.applyDataMask();
});

$('#inputDateEmissao').datepicker({
    uiLibrary: 'bootstrap4'
});

$('#inputDateEntrega').datepicker({
    uiLibrary: 'bootstrap4'
});

$('#inputCidade').selectpicker({
    style: 'btn-input-primary'
});

$('#inputEstado').selectpicker({
    style: 'btn-input-primary'
});

$('#inputSegmento').selectpicker({
    style: 'btn-input-primary'
}); 

$('#inputPais').selectpicker({
    style: 'btn-input-primary'
});

$("#inputVendedor").change(function() {

    var baseurl = "<?php echo base_url(); ?>";

    var vendedor = $("#inputVendedor").val();

    $.post(baseurl + "ajax/busca-vendedor", {
        vendedor: vendedor
    }, function(valor) {
        console.log(valor);
        $("#inputPerComissao").val(valor);
    });

    $("#inputPerComissao").prop("disabled", false);

});

$('#inputCidade').change(function() {
    var cidade = $('#inputCidade').val();

    if(cidade != 9999999){
        $('#inputPais').selectpicker('val', 1058).val();
        $("#inputPais").prop('disabled', 'disabled');
    }else{
        $("#inputPais").prop('disabled', false);
    }

    $('.selectpicker').selectpicker('refresh');
        
});
    
$('#inputCPFCNPJ').mask('00.000.000/0000-00', {
    reverse: true
});  
    
$('#inputTelComercial').mask('(00) 0000-0000');
$('#inputTelFinanceiro').mask('(00) 0000-0000');

$('#inputTelefoneFixo').mask('(00) 0000-0000');

$('#inputTelefoneCelular').mask('(00) 0 0000-0000');

$("#radioJuridica").change(function() {
    $('#inputCPFCNPJ').mask('00.000.000/0000-00', {
        reverse: true
    });

    $("#btnConsultaCNPJ").prop("disabled", false);
    $('#inputCPFCNPJ').prop("disabled", false);
});

$("#radioFisica").change(function() {
    $('#inputCPFCNPJ').mask('000.000.000-00', {
        reverse: true
    });

    $("#btnConsultaCNPJ").prop("disabled", true);
    $('#inputCPFCNPJ').prop("disabled", false);
}); 
    
$("#radioEstrangeira").change(function() {
    $('#inputCPFCNPJ').unmask();
    $("#btnConsultaCNPJ").prop("disabled", true);
    $('#inputContribuinteICMS').selectpicker('val', 9).val();
    $('#inputCidade').selectpicker('val', 9999999).val();
    $("#inputPais").prop('disabled', false);  

    $('.selectpicker').selectpicker('refresh');
});

$( "#btnConsultaCNPJ").click(function() {

    var cnpj = $("#inputCPFCNPJ").val().replaceAll(".", "").replaceAll("/", "").replaceAll("-", "");
    var link ="https://www.receitaws.com.br/v1/cnpj/" + cnpj;

    $.ajax({
        url: link,
        type: 'GET',
        dataType: 'jsonp',
        headers: {
            'Content-Type':  'application/json',
            'Access-Control-Allow-Origin': 'http://localhost',
            "Authorization":"Bearer  af60c3794c78c9ec052a6e91ebb68c85259388f9131e0f8ae729e7efca6ec51e",
        },
        success: function(data) {            
            $("#inputNomeCliente").val(data.fantasia);
            $("#inputRazaoSocial").val(data.nome);
            $("#inputTelefoneFixo").val(data.telefone);
            $("#inputEmail").val(data.email);
            $("#inputCEP").val(data.cep.replaceAll(".", ""));
            $("#inputEndereco").val(data.logradouro);
            $("#inputNumero").val(data.numero);
            $("#inputComplemento").val(data.complemento);
            $("#inputBairro").val(data.bairro);
            
            $("#inputCidade").selectpicker('val', $('option:contains("' + data.municipio + ' - ' + data.uf + '")').val());
        }
    })
});

$("#btnSalvarCliente").click(function() {

    var baseurl = "<?php echo base_url(); ?>";

    var nomeCliente = $("#inputNomeCliente").val();

    if(nomeCliente != ""){

        var razaoSocial = $("#inputRazaoSocial").val();

        if ($("#radioJuridica").is(":checked") == true)
            var tipoPessoa = 1;
        if ($("#radioFisica").is(":checked") == true)
            var tipoPessoa = 2;
        if ($("#radioEstrangeira").is(":checked") == true)
            var tipoPessoa = 3;

        var cpfCnpj = $("#inputCPFCNPJ").val();
        var segmento = $("#inputSegmento").val();
        var contribuinteICMS = $("#inputContribuinteICMS").val();    
        var inscEstadual = $("#inputIE").val();
        var inscMunicipal = $("#inputIM").val();
        var telFixo = $("#inputTelefoneFixo").val();
        var telCel = $("#inputTelefoneCelular").val();
        var eMail = $("#inputEmail").val();
        var cep = $("#inputCEP").val();
        var endereco = $("#inputEndereco").val();
        var numero = $("#inputNumero").val();
        var complemento = $("#inputComplemento").val();
        var bairro = $("#inputBairro").val();
        var cidade = $("#inputCidade").val();

        $.post(baseurl + "ajax/inserir-cliente", {
            nomeCliente: nomeCliente,
            razaoSocial: razaoSocial,
            tipoPessoa: tipoPessoa,
            segmento: segmento,
            contribuinteICMS: contribuinteICMS,
            cpfCnpj: cpfCnpj,
            inscEstadual: inscEstadual,
            inscMunicipal: inscMunicipal,
            telFixo: telFixo,
            telCel: telCel,
            eMail: eMail,
            cep: cep,
            endereco: endereco,
            numero: numero,
            complemento: complemento,
            bairro: bairro,
            cidade: cidade
        }, function(retorno) {
            $('#novo-cliente').modal('hide');

            var data = JSON.parse(retorno);

            $("#inputCliente").html(data.options);
            $("#inputCliente").removeAttr('disabled');
            $('#inputCliente').selectpicker('refresh');

            $("#inputCliente").selectpicker('val', $('option:contains("' + data.cod_cliente + ' - ' + nomeCliente + '")').val());
    
        });
    }
});

$("#inputTipoFrete").change(function() {
    calcTotalVenda();
});

jQuery('#inputValorFrete').on('keyup', function() {
    calcTotalVenda();
});

jQuery('#inputSeguro').on('keyup', function() {
    calcTotalVenda();
});

jQuery('#inputOutrasDespesas').on('keyup', function() {
    calcTotalVenda();
});

$("#inputTipoDesconto").change(function() {
    calcTotalVenda();
});

jQuery('#inputValorDesconto').on('keyup', function() {
    calcTotalVenda();
});

function calcTotalVenda() {

    var tipoFrete = $('#inputTipoFrete').val(); 
    if(tipoFrete == 1){
        $('#idTipoFrete').text('CIF'); 
    }else{
        $('#idTipoFrete').text('FOB'); 
    }    

    var valorFrete = parseFloat(jQuery('#inputValorFrete').val() != '' ? (jQuery(
            '#inputValorFrete').val()
        .split('.').join('')).replace(',', '.') : 0);
    $('#ValorFrete').text(valorFrete.toLocaleString("pt-BR", {
                        style: "decimal",
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                       }));
    if(valorFrete > 0){
        $('#idValorFrete').removeClass("text-muted");
        $('#idValorFrete').addClass("text-teal");                
    }else{
        $('#idValorFrete').removeClass("text-teal");  
        $('#idValorFrete').addClass("text-muted"); 
    }

    var valorSeguro = parseFloat(jQuery('#inputSeguro').val() != '' ? (jQuery(
            '#inputSeguro').val()
        .split('.').join('')).replace(',', '.') : 0);
    $('#ValorSeguro').text(valorSeguro.toLocaleString("pt-BR", {
                        style: "decimal",
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                       }));
    if(valorSeguro > 0){
        $('#idValorSeguro').removeClass("text-muted");
        $('#idValorSeguro').addClass("text-teal");        
    }else{
        $('#idValorSeguro').removeClass("text-teal");
        $('#idValorSeguro').addClass("text-muted");     
    }

    var valorOutrasDespesas = parseFloat(jQuery('#inputOutrasDespesas').val() != '' ? (jQuery(
            '#inputOutrasDespesas').val()
        .split('.').join('')).replace(',', '.') : 0);
    $('#OutrasDespesas').text(valorOutrasDespesas.toLocaleString("pt-BR", {
                        style: "decimal",
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                       }));
    if(valorOutrasDespesas > 0){
        $('#idOutrasDespesas').removeClass("text-muted"); 
        $('#idOutrasDespesas').addClass("text-teal");        
    }else{
        $('#idOutrasDespesas').removeClass("text-teal"); 
        $('#idOutrasDespesas').addClass("text-muted");  
    }    
    
    var valorDesconto = parseFloat(jQuery('#inputValorDesconto').val() != '' ? (jQuery(
            '#inputValorDesconto').val()
        .split('.').join('')).replace(',', '.') : 0);
    $('#ValorDesconto').text(valorDesconto.toLocaleString("pt-BR", {
                        style: "decimal",
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                       }));
    if(valorDesconto > 0){
        $('#idValorDesconto').removeClass("text-muted");
        $('#idValorDesconto').addClass("text-danger");        
    }else{
        $('#idValorDesconto').addClass("text-muted");  
        $('#idValorDesconto').removeClass("text-danger");  
    }

    var calcDesconto = 0;
    var tipoDesconto = $('#inputTipoDesconto').val();
    if(tipoDesconto == 1){
        $('#tipoDescontoValor').text("R$");
        $('#tipoDescontoPerc').text("");
        calcDesconto = valorDesconto;
    }else{
        $('#tipoDescontoValor').text("");
        $('#tipoDescontoPerc').text("%");
        calcDesconto = 0;
    }

    var totalLiquido = 0;
    totalLiquido = valorFrete + valorSeguro + valorOutrasDespesas - calcDesconto;

    $('#TotalPedido').text(totalLiquido.toLocaleString("pt-BR", {
                        style: "decimal",
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                       }));
    if(totalLiquido > 0){
        $('#idTotalPedido').addClass("text-teal");        
    }else{
        $('#idTotalPedido').removeClass("text-teal");  
    }
}

</script>

<?php $this->load->view('gerais/footer'); ?>