<?php $this->load->view('gerais/header' , $menu); ?>
<?php $this->load->view('gerais/menu', $menu); ?>

<section>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('visao-geral') ?>">Visão Geral</a></li>
            <li class="breadcrumb-item active">Dados da Minha Empresa</li>
        </ol>
    </div>
</section>


<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12">
                <form action="<?php echo base_url("dados-empresa") ?>" method='post'
                                    enctype="multipart/form-data" id="formEmpresa" class="needs-validation" novalidate>
                    <div class="card  mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-xs-12">
                                    <?php if ($this->session->flashdata('erro') <> ""){ ?>
                                    <div class="alert alert-danger alert-dismissible fade show" id="alert" role="alert">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <strong>Atenção!</strong> <?php echo $this->session->flashdata('erro') ?>
                                    </div>
                                    <?php } $this->session->set_flashdata('erro', '');  ?>
                                    <?php if ($this->session->flashdata('sucesso') <> ""){ ?>
                                    <div class="alert alert-success alert-dismissible fade show" id="alert" role="alert">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <strong>Muito bem!</strong>
                                        <?php echo $this->session->flashdata('sucesso', '') ?>
                                    </div>
                                    <?php } $this->session->set_flashdata('sucesso', ''); ?>                                
                                    <div class="form-row">
                                        <div class="form-group col-md-2">
                                            <label for="inputIDEmpresa">ID da Empresa</label>
                                            <input type="text" class="form-control" id="inputIDEmpresa" name="IDEmpresa"
                                                value="<?php echo $empresa->id_empresa ?>" readonly>
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label for="inputRazaoSocial">Razão Social</label>
                                            <input type="text" class="form-control" id="inputRazaoSocial"
                                                name="RazaoSocial" value="<?php echo $empresa->razao_social ?>">
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label for="inputNomeFantasia">Nome da Empresa <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="inputNomeFantasia"
                                                name="NomeEmpresa" value="<?php echo $empresa->nome_empresa ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-xs-12">
                            <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="dados-tab" data-toggle="tab" href="#dados"
                                        role="tab" aria-controls="dados" aria-selected="true">Dados Básicos</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="vendas-tab" data-toggle="tab" href="#vendas"
                                        role="tab" aria-controls="vendas" aria-selected="false">Vendas</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="financeiro-tab" data-toggle="tab" href="#financeiro"
                                        role="tab" aria-controls="financeiro"
                                        aria-selected="false">Financeiro</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="nota-fiscal-tab" data-toggle="tab"
                                        href="#nota-fiscal" role="tab" aria-controls="nota-fiscal"
                                        aria-selected="false">Nota Fiscal</a>
                                </li>
                                <li class="nav-item" role="presentation" hidden>
                                    <a class="nav-link" id="integracao-tab" data-toggle="tab" href="#integracao"
                                        role="tab" aria-controls="integracao"
                                        aria-selected="false">Integração</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card  mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-xs-12">                                    
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="dados" role="tabpanel"
                                            aria-labelledby="dados-tab">
                                            <div class="form-row">
                                                <div class="form-group col-md-3 mb-0">
                                                    <label>Tipo Pessoa</label>
                                                    <div class="btn-group btn-block" data-toggle="buttons">
                                                        <label class="btn btn-outline-primary">
                                                            <input type="radio" id="radioJuridica" name="TipoPessoa"
                                                                value="1"
                                                                <?php if($empresa->tipo_empresa == '1') echo 'checked'; ?>>
                                                            Jurídica
                                                        </label>
                                                        <label class="btn btn-outline-primary">
                                                            <input type="radio" id="radioFisica" name="TipoPessoa"
                                                                value="2"
                                                                <?php if($empresa->tipo_empresa == '2') echo 'checked'; ?>>
                                                            Física
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3  mb-0">
                                                    <label for="inputCNPJ">CNPJ</label>
                                                    <input type="text" class="form-control" id="inputCPFCNPJ"
                                                        name="CnpjCpf" value="<?php echo $empresa->cnpj_cpf ?>">
                                                </div>
                                                <div class="form-group col-md-3  mb-0">
                                                    <label for="inputInscEstadual">Inscrição Estadual</label>
                                                    <input type="text" class="form-control" id="inputInscEstadual"
                                                        <?php if($empresa->isenta_ie == 1) echo "disabled"; ?>
                                                        name="InscEstadual"
                                                        value="<?php echo $empresa->insc_estadual ?>">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="inputLogo">Logo da Empresa</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input search"
                                                                name="logo">
                                                            <label
                                                                class="custom-file-label search"><?php if($empresa->caminho_logo != "") echo $empresa->caminho_logo; else echo "Escolha arquivo para importar";?></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row" hidden>
                                                <div class="form-group col-md-7"></div>
                                                <div class="form-group col-md-5">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="checkIsenta" name="Isenta" value="1"
                                                            <?php if($empresa->isenta_ie == 1) echo "checked"; ?>>
                                                        <label class="custom-control-label" for="checkIsenta">Empresa
                                                            Isenta
                                                            de Inscrição Estadual</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputEmailContato">E-mail de Contato</label>
                                                    <input type="text" class="form-control" id="inputEmailContato"
                                                        name="EmailContato"
                                                        value="<?php echo $empresa->email_contato ?>">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputTelefoneFixo">Telefone Fixo</label>
                                                    <input type="text" class="form-control" id="inputTelefoneFixo"
                                                        name="TelFixo" value="<?php echo $empresa->tel_fixo ?>">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputTelefoneCelular">Telefone Celular</label>
                                                    <input type="text" class="form-control" id="inputTelefoneCelular"
                                                        name="TelCel" value="<?php echo $empresa->tel_cel ?>">
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputCEP">CEP</label>
                                                    <input type="text" class="form-control" id="inputCEP" name="CEP"
                                                        value="<?php echo $empresa->cep?>" data-mask="00000-000">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputRua">Endereço</label>
                                                    <input type="text" class="form-control" id="inputEndereco"
                                                        name="Endereco" value="<?php echo $empresa->endereco ?>">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="inputNumero">Número</label>
                                                    <input type="text" class="form-control" id="inputNumero"
                                                        name="Numero" value="<?php echo $empresa->numero?>">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputComplemento">Complemento</label>
                                                    <input type="text" class="form-control" id="inputComplemento"
                                                        name="Complemento" value="<?php echo $empresa->complemento ?>">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputBairro">Bairro</label>
                                                    <input type="text" class="form-control" id="inputBairro"
                                                        name="Bairro" value="<?php echo $empresa->bairro ?>">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputCidade">Cidade</label>
                                                    <select class="form-control selectpicker show-tick"
                                                        data-live-search="true" title="Selecione a Cidade"
                                                        id="inputCidade" name="Cidade">
                                                        <?php foreach($lista_cidade as $key_cidade => $cidade) { ?>
                                                        <option value="<?php echo $cidade->id ?>"
                                                            <?php if($empresa->cod_cidade == $cidade->id) echo "selected"; ?>>
                                                            <?php echo $cidade->nome ?> - <?php echo $cidade->uf ?>
                                                        </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="vendas" role="tabpanel"
                                            aria-labelledby="vendas-tab">
                                            <div class="form-row  ">
                                                <div class="form-group col-md-6">
                                                    <label>Método de Pagamento de Dinheiro</label>
                                                    <select class="selectpicker show-tick form-control"
                                                        data-live-search="true" data-actions-box="true"
                                                        title="Selecione um Método de Pagamento"
                                                        name="MetodoPagamentoFrenteCaixa"
                                                        data-style="btn-input-primary">
                                                        <?php foreach($lista_metodo_pagamento as $key_metodo_pagamento => $metodo_pagamento) { ?>
                                                        <option
                                                            value="<?php echo $metodo_pagamento->cod_metodo_pagamento ?>"
                                                            <?php if($metodo_pagamento->cod_metodo_pagamento == $empresa->metodo_pagamento_frente_caixa) echo "selected"; ?>>
                                                            <?php echo $metodo_pagamento->cod_metodo_pagamento ?> -
                                                            <?php echo $metodo_pagamento->nome_metodo_pagamento ?>
                                                        </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="inputDiasAtivo">Clientes Ativos</label>
                                                    <div class="input-group">                                                        
                                                        <input type="text" class="form-control" id="inputDiasAtivo"
                                                            data-mask="#.##0" data-mask-reverse="true" name="DiasAtivo"
                                                            value="<?= $empresa->clientes_ativos ?>">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">dias</span>
                                                        </div>
                                                    </div>
                                                </div> 
                                                <div class="form-group col-md-3">
                                                    <label for="inputDiasInativoRecente">Clientes Inativos Recentes</label>
                                                    <div class="input-group">   
                                                        <input type="text" class="form-control" id="inputDiasInativoRecente"
                                                            data-mask="#.##0" data-mask-reverse="true" name="InativoRecente"
                                                            value="<?= $empresa->clientes_inativos_recentes ?>">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">dias</span>
                                                        </div>
                                                    </div>
                                                </div> 
                                            </div>
                                            <div class="form-row  ">
                                                <div class="form-group col-md-6">
                                                    <label for="inputCentroFrenteCaixa">Centro de Custo Padrão</label>
                                                    <select id="inputCentroFrenteCaixa"
                                                        class="selectpicker show-tick form-control"
                                                        data-live-search="true" data-actions-box="true"
                                                        title="Selecione um Centro de Custo"
                                                        name="CentroCustoFrenteCaixa" data-style="btn-input-primary">
                                                        <?php foreach($lista_centro_custo as $key_centro_custo => $centro_custo) { ?>
                                                        <option value="<?php echo $centro_custo->cod_centro_custo ?>"
                                                            <?php if($centro_custo->cod_centro_custo == $empresa->centro_custo_frente_caixa) echo "selected"; ?>>
                                                            <?php echo $centro_custo->cod_centro_custo ?> -
                                                            <?php echo $centro_custo->nome_centro_custo ?>
                                                        </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputContaContabilFrenteCaixa">Conta Contábil
                                                        Padrão</label>
                                                    <select id="inputContaContabilFrenteCaixa"
                                                        class="selectpicker show-tick form-control"
                                                        data-live-search="true" data-actions-box="true"
                                                        title="Selecione uma Conta Contábil"
                                                        name="ContaContabilFrenteCaixa" data-style="btn-input-primary">
                                                        <?php foreach($lista_conta_contabil as $key_conta_contabil => $conta_contabil) { ?>
                                                        <option
                                                            value="<?php echo $conta_contabil->cod_conta_contabil ?>"
                                                            <?php if($conta_contabil->cod_conta_contabil === $empresa->conta_contabil_frente_caixa) echo "selected"; ?>>
                                                            <?php echo $conta_contabil->cod_conta_contabil ?> -
                                                            <?php echo $conta_contabil->nome_conta_contabil ?>
                                                        </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="financeiro" role="tabpanel"
                                            aria-labelledby="financeiro-tab">
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="inputConta">Conta Financeira Padrão</label>
                                                    <select id="inputConta" class="selectpicker show-tick form-control"
                                                        data-live-search="true" data-actions-box="true"
                                                        title="Selecione uma Conta" name="CodConta"
                                                        data-style="btn-input-primary">
                                                        <?php foreach($lista_conta as $key_conta => $conta) { ?>
                                                        <option value="<?php echo $conta->cod_conta ?>"
                                                            <?php if($conta->cod_conta == $empresa->conta_padrao) echo "selected"; ?>>
                                                            <?php echo $conta->cod_conta ?> -
                                                            <?php echo $conta->nome_conta ?>
                                                        </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputCentroCustoVendas">Vendas - Centro de Custo
                                                        Padrão</label>
                                                    <select id="inputCentroCustoVendas"
                                                        class="selectpicker show-tick form-control"
                                                        data-live-search="true" data-actions-box="true"
                                                        title="Selecione um Centro de Custo" name="CentroCustoVendas"
                                                        data-style="btn-input-primary">
                                                        <?php foreach($lista_centro_custo as $key_centro_custo => $centro_custo) { ?>
                                                        <option value="<?php echo $centro_custo->cod_centro_custo ?>"
                                                            <?php if($centro_custo->cod_centro_custo == $empresa->centro_custo_vendas) echo "selected"; ?>>
                                                            <?php echo $centro_custo->cod_centro_custo ?> -
                                                            <?php echo $centro_custo->nome_centro_custo ?>
                                                        </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputContaContabilVendas">Vendas - Conta Contábil
                                                        Padrão</label>
                                                    <select id="inputContaContabilVendas"
                                                        class="selectpicker show-tick form-control"
                                                        data-live-search="true" data-actions-box="true"
                                                        title="Selecione uma Conta Contábil" name="ContaContabilVendas"
                                                        data-style="btn-input-primary">
                                                        <?php foreach($lista_conta_contabil as $key_conta_contabil => $conta_contabil) { ?>
                                                        <option
                                                            value="<?php echo $conta_contabil->cod_conta_contabil ?>"
                                                            <?php if($conta_contabil->cod_conta_contabil === $empresa->conta_contabil_vendas) echo "selected"; ?>>
                                                            <?php echo $conta_contabil->cod_conta_contabil ?> -
                                                            <?php echo $conta_contabil->nome_conta_contabil ?>
                                                        </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputCentroCustoCompras">Compras - Centro de Custo
                                                        Padrão</label>
                                                    <select id="inputCentroCustoCompras"
                                                        class="selectpicker show-tick form-control"
                                                        data-live-search="true" data-actions-box="true"
                                                        title="Selecione um Centro de Custo" name="CentroCustoCompras"
                                                        data-style="btn-input-primary">
                                                        <?php foreach($lista_centro_custo as $key_centro_custo => $centro_custo) { ?>
                                                        <option value="<?php echo $centro_custo->cod_centro_custo ?>"
                                                            <?php if($centro_custo->cod_centro_custo == $empresa->centro_custo_compras) echo "selected"; ?>>
                                                            <?php echo $centro_custo->cod_centro_custo ?> -
                                                            <?php echo $centro_custo->nome_centro_custo ?>
                                                        </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputContaContabilCompras">Compras - Conta Contábil
                                                        Padrão</label>
                                                    <select id="inputContaContabilCompras"
                                                        class="selectpicker show-tick form-control"
                                                        data-live-search="true" data-actions-box="true"
                                                        title="Selecione uma Conta Contábil" name="ContaContabilCompras"
                                                        data-style="btn-input-primary">
                                                        <?php foreach($lista_conta_contabil as $key_conta_contabil => $conta_contabil) { ?>
                                                        <option
                                                            value="<?php echo $conta_contabil->cod_conta_contabil ?>"
                                                            <?php if($conta_contabil->cod_conta_contabil === $empresa->conta_contabil_compras) echo "selected"; ?>>
                                                            <?php echo $conta_contabil->cod_conta_contabil ?> -
                                                            <?php echo $conta_contabil->nome_conta_contabil ?>
                                                        </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label class="control-label" for="inputCustoFolha">Custa Mensal
                                                        da Folha de Pagamento</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$</span>
                                                        </div>
                                                        <input type="text" class="form-control" class="form-control"
                                                            id="inputCustoFolha" type="text" name="CustoFolha"
                                                            data-mask="#.##0,00" data-mask-reverse="true"
                                                            value="<?php echo $empresa->custo_folha?>">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="control-label" for="inputHorasConsideradas">Horas
                                                        Consideradas</label>
                                                    <input class="form-control" id="inputHorasConsideradas" type="text"
                                                        name="HorasConsideradas" data-mask="#.##0,0"
                                                        data-mask-reverse="true"
                                                        value="<?php echo $empresa->horas_consideradas?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="nota-fiscal" role="tabpanel"
                                            aria-labelledby="nota-fiscal-tab">
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label for="inputAmbiente">Ambiente Sefaz</label>
                                                    <select id="inputAmbiente"
                                                        class="selectpicker show-tick form-control"
                                                        data-actions-box="true" name="AmbienteNFe"
                                                        data-style="btn-input-primary">
                                                        <option value="2"
                                                            <?php if($empresa->ambiente_nfe == 2) echo "selected"; ?>>
                                                            Homologação
                                                        </option>
                                                        <option value="1"
                                                            <?php if($empresa->ambiente_nfe == 1) echo "selected"; ?>>
                                                            Produção
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="inputVersao">Versão NFe</label>
                                                    <input type="text" class="form-control" id="inputVersao"
                                                        name="Versao" value="<?php echo $empresa->versao_nfe ?>"
                                                        data-mask="0.00">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="inputModelo">Modelo NFe</label>
                                                    <input type="text" class="form-control" id="inputModelo"
                                                        name="Modelo" value="<?php echo $empresa->modelo ?>">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="inputModelo">Modelo NFce</label>
                                                    <input type="text" class="form-control" id="inputModeloNFce"
                                                        name="ModeloNFce" value="<?php echo $empresa->modelo_nfce ?>">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label for="inputSerie">Serie NFe</label>
                                                    <input type="text" class="form-control" id="inputSerie" name="Serie"
                                                        value="<?php echo $empresa->serie ?>">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="inputNumUltNF">Número da Última NFe Emitida</label>
                                                    <input type="text" class="form-control" id="inputNumUltNF"
                                                        data-mask="00000000" name="NumUltNF"
                                                        value="<?php echo $empresa->num_ultima_nf ?>">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="inputCRT">Código Regime Tributário (CRT)</label>
                                                    <select id="inputCRT" class="selectpicker show-tick form-control"
                                                        data-actions-box="true" name="CRT"
                                                        data-style="btn-input-primary">
                                                        <option value="1"
                                                            <?php if($empresa->codigo_regime_tributario == 1) echo "selected"; ?>>
                                                            Simples Nacional
                                                        </option>
                                                        <option value="2"
                                                            <?php if($empresa->codigo_regime_tributario == 2) echo "selected"; ?>>
                                                            Simples Nacional, excesso sublimite de receita bruta
                                                        </option>
                                                        <option value="3"
                                                            <?php if($empresa->codigo_regime_tributario == 3) echo "selected"; ?>>
                                                            Regime Normal
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="percentual_credito_sn">% Crédito ICMS SN</label>
                                                    <input type="text" class="form-control" id="percentual_credito_sn"
                                                        name="percentual_credito_sn"
                                                        value="<?php echo $empresa->percentual_credito_sn ?>"
                                                        data-mask="#.##0,00" data-mask-reverse="true">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label for="inputSerieNFce">Serie NFce</label>
                                                    <input type="text" class="form-control" id="inputSerieNFce"
                                                        name="SerieNFce" value="<?php echo $empresa->serie_nfce ?>">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="inputNumUltNFce">Número da Última NFce Emitida</label>
                                                    <input type="text" class="form-control" id="inputNumUltNFce"
                                                        data-mask="00000000" name="NumUltNFce"
                                                        value="<?php echo $empresa->num_ultima_nfce ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputNaturCaixa">Natureza Operação Frente de
                                                        Caixa</label>
                                                    <select id="inputNaturCaixa"
                                                        class="selectpicker show-tick form-control"
                                                        data-live-search="true" data-actions-box="true"
                                                        title="Selecione uma Conta Contábil" name="NaturCaixa"
                                                        data-style="btn-input-primary">
                                                        <?php foreach($lista_natureza_operacao as $key_natureza_operacao => $natureza_operacao) { ?>
                                                        <option value="<?php echo $natureza_operacao->id ?>"
                                                            <?php if($natureza_operacao->id === $empresa->natureza_caixa) echo "selected"; ?>>
                                                            <?php echo $natureza_operacao->descricao ?> -
                                                            <?php echo $natureza_operacao->nome ?>
                                                        </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputCSCid">ID Token</label>
                                                    <input type="text" class="form-control" id="inputCSCid" name="CSCid"
                                                        value="<?php echo $empresa->csc_id ?>">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputCSC">CSC</label>
                                                    <input type="text" class="form-control" id="inputCSC" name="CSC"
                                                        value="<?php echo $empresa->csc ?>">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputSchema">Schema NFe</label>
                                                    <input type="text" class="form-control" id="inputSchema"
                                                        name="SchemaNFe" value="<?php echo $empresa->schema_nfe ?>">
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputCertificado">Certificado Digital</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input search"
                                                                name="certificado">
                                                            <label
                                                                class="custom-file-label search"><?php if($empresa->caminho_certificado != "") echo $empresa->caminho_certificado; else echo "Escolha arquivo para importar";?></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputSenhaCertificado">Senha do Certificado
                                                        Digital</label>
                                                    <input type="password" class="form-control"
                                                        id="inputSenhaCertificado" name="SenhaCertificado" value="">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="tab-pane fade" id="integracao" role="tabpanel"
                                            aria-labelledby="integracao-tab">
                                            <div class="form-group mt-3">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="checkVendasExternas" name="VendasExternas" value="1"
                                                        <?php if($empresa->integ_vendas_externas == 1) echo "checked"; ?>>
                                                    <label class="custom-control-label" for="checkVendasExternas">Vendas
                                                        Externas</label>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputUsuarioVendasExternas">Usuário</label>
                                                    <input type="text" class="form-control"
                                                        id="inputUsuarioVendasExternas" name="UsuarioVendasExternas"
                                                        value="<?php echo $empresa->integ_usuario_vendas_externas ?>"
                                                        <?php if($empresa->integ_vendas_externas <> 1) echo "disabled"; ?>>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputSenhaVendasExternas">Senha</label>
                                                    <input type="password" class="form-control"
                                                        id="inputSenhaVendasExternas" name="SenhaVendasExternas"
                                                        value="<?php echo $empresa->integ_senha_vendas_externas ?>"
                                                        <?php if($empresa->integ_vendas_externas <> 1) echo "disabled"; ?>>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputCreditoDevolucao">Nome do Meio de Pagamento de
                                                        Crédito Devolução</label>
                                                    <input type="text" class="form-control" id="inputCreditoDevolucao"
                                                        name="CreditoDevolucao"
                                                        value="<?php echo $empresa->cred_devol_vendas_externas ?>"
                                                        <?php if($empresa->integ_vendas_externas <> 1) echo "disabled"; ?>>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="inputTipoImportacao">Tipos de Atendimentos a
                                                        Importar</label></label>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-2">
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="inputProducao" value="1" name="Producao" checked>
                                                        <label class="custom-control-label"
                                                            for="inputProducao">Pedido/Pré-venda</label>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="inputVendas" value="1" name="Vendas" checked>
                                                        <label class="custom-control-label"
                                                            for="inputVendas">Orçamento</label>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="inputCompras" value="1" name="Compras" checked>
                                                        <label class="custom-control-label"
                                                            for="inputCompras">Encomenda</label>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="inputEstoque" value="1" name="Estoque" checked>
                                                        <label class="custom-control-label"
                                                            for="inputEstoque">Visita</label>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="inputFinanceiro" value="1" name="Financeiro" checked>
                                                        <label class="custom-control-label" for="inputFinanceiro">Pronta
                                                            entrega</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                
                                    <hr class="mb-3">
                                    <div class="row float-right">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary" form="formEmpresa"><i
                                                    class="fas fa-save"></i> Salvar</button>
                                            <a href="<?php echo base_url() ?>visao-geral"
                                                class="btn btn-secondary">Cancelar</a>
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
</section>

<script>
$(function() {
    $.applyDataMask();
});

$("#inputCEP").blur(function() {
    bucaCEP();
});

$(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});

function bucaCEP() {
    var cep = $("#inputCEP").val();
    var link = "https://ws.apicep.com/cep/" + cep + ".json";

    $.ajax({
        url: link,
        type: 'GET',
        success: function(data) {
            $("#inputEndereco").val(data.address);
            $("#inputBairro").val(data.district);
            $("#inputCidade").selectpicker('val', $('option:contains("' + data.city + ' - ' + data.state +
                '")').val());
        }
    })
}

$('#inputCidade').selectpicker({
    style: 'btn-input-primary'
});

//Verifica o tipo de pessoa para aplicar mascara
var tipoPessoa = "<?php echo $empresa->tipo_empresa ; ?>";

if (tipoPessoa == "1") {
    $('#inputCPFCNPJ').mask('00.000.000/0000-00', {
        reverse: true
    });
} else {
    $('#inputCPFCNPJ').mask('000.000.000-00', {
        reverse: true
    });
}


$("#radioJuridica").change(function() {
    $('#inputCPFCNPJ').mask('00.000.000/0000-00', {
        reverse: true
    });
});

$("#radioFisica").change(function() {
    $('#inputCPFCNPJ').mask('000.000.000-00', {
        reverse: true
    });
});

$('#inputTelefoneFixo').mask('(00) 0000-0000');

$('#inputTelefoneCelular').mask('(00) 0 0000-0000');

$("#checkIsenta").on('change', function() {

    var checkbox = document.getElementById('checkIsenta');

    if (checkbox.checked) {
        $('#inputInscEstadual').val("");
        $('#inputInscEstadual').attr("disabled", true);
    } else {
        $('#inputInscEstadual').val("<?php echo $empresa->insc_estadual ?>");
        $('#inputInscEstadual').attr("disabled", false);
    };

});

$("#checkVendasExternas").on('change', function() {

    var checkbox = document.getElementById('checkVendasExternas');

    if (checkbox.checked) {
        $('#inputUsuarioVendasExternas').val("<?php echo $empresa->integ_usuario_vendas_externas ?>");
        $('#inputUsuarioVendasExternas').attr("disabled", false);
        $('#inputSenhaVendasExternas').val("<?php echo $empresa->integ_senha_vendas_externas ?>");
        $('#inputSenhaVendasExternas').attr("disabled", false);
        $('#inputCreditoDevolucao').val("<?php echo $empresa->cred_devol_vendas_externas ?>");
        $('#inputCreditoDevolucao').attr("disabled", false);
    } else {
        $('#inputUsuarioVendasExternas').val("");
        $('#inputUsuarioVendasExternas').attr("disabled", true);
        $('#inputSenhaVendasExternas').val("");
        $('#inputSenhaVendasExternas').attr("disabled", true);
        $('#inputCreditoDevolucao').val("");
        $('#inputCreditoDevolucao').attr("disabled", true);
    };

});
</script>

<?php $this->load->view('gerais/footer'); ?>