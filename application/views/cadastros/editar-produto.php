    <?php $this->load->view('gerais/header' , $menu); ?>
    <?php $this->load->view('gerais/menu', $menu); ?>

    <section>
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('visao-geral') ?>">Visão Geral</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url() ?>produto">Produto</a></li>
                <li class="breadcrumb-item active">Editar Produto</li>
            </ol>
        </div>
    </section>


    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-xs-12">
                    <div class="card  mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-xs-12">
                                    <?php if ($this->session->flashdata('erro') <> ""){ ?>
                                    <div class="alert alert-danger alert-dismissible fade show" id="alert" role="alert">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <strong>Atenção!</strong> <?= $this->session->flashdata('erro') ?>
                                    </div>
                                    <?php } $this->session->set_flashdata('erro', '');  ?>
                                    <?php if ($this->session->flashdata('sucesso') <> ""){ ?>
                                    <div class="alert alert-success alert-dismissible fade show" id="alert" role="alert">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <strong>Muito bem!</strong> <?= $this->session->flashdata('sucesso') ?>
                                    </div>
                                    <?php } $this->session->set_flashdata('sucesso', '');  ?>
                                    <form class="needs-validation" novalidate
                                        action="<?= base_url("produto/editar-produto/{$produto->cod_produto}") ?>"
                                        method='post' enctype="multipart/form-data" >
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <label for="inputCodProduto">Código do Produto</label>
                                                <input type="text" class="form-control" id="inputCodProduto"
                                                    name="CodProduto" value="<?= $produto->cod_produto?>" readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputNomeProduto">Nome do Produto <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="inputNomeProduto"
                                                    name="NomeProduto" value="<?= htmlentities($produto->nome_produto, ENT_QUOTES) ?>" required>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="inputTipoProduto">Tipo do Produto <span
                                                        class="text-danger">*</span></label>
                                                <select id="inputTipoProduto" name="TipoProduto"
                                                    data-style="btn-input-primary"
                                                    class="selectpicker show-tick form-control" data-live-search="true"
                                                    data-actions-box="true" title="Informe o Tipo de Produto" required>
                                                    <?php foreach($lista_tipo_produto as $key_tipo_produto => $tipoProduto) { ?>
                                                    <option value="<?= $tipoProduto->cod_tipo_produto ?>"
                                                        <?php if($tipoProduto->cod_tipo_produto == $produto->cod_tipo_produto) echo "selected"; ?>>
                                                        <?= $tipoProduto->nome_tipo_produto ?>
                                                    </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="inputDescricao">Descrição do Produto</label>
                                                <textarea class="form-control" rows="3" id="inputDescricao"
                                                    name="DescProduto"><?= $produto->desc_produto?></textarea>
                                            </div>
                                        </div>                                    
                                        <hr>
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link active" id="dados-tab" data-toggle="tab" href="#estoque"
                                                    role="tab" aria-controls="dados" aria-selected="true">Dados de Estoque</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" id="vendas-tab" data-toggle="tab" href="#comercial"
                                                    role="tab" aria-controls="vendas" aria-selected="false">Dados Comerciais</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" id="financeiro-tab" data-toggle="tab" href="#fiscal"
                                                    role="tab" aria-controls="financeiro"
                                                    aria-selected="false">Dados Fiscais</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="estoque" role="tabpanel"
                                                aria-labelledby="dados-tab">
                                                <div class="form-row mt-3">   
                                                    <div class="form-group col-md-12">
                                                        <label for="inputTipoControle">Tipo de Controle de Estoque</label>
                                                        <select id="inputTipoControle" 
                                                            <?php if($produto->quant_estoq != 0 || $produto->count_estoq_lote > 0) echo "disabled"; else "required"; ?>
                                                            name="TipoControle" data-style="btn-input-primary"                                                 
                                                            class="selectpicker show-tick form-control" >
                                                            <option value="1" <?php if($produto->tipo_controle == 1) echo "selected"; ?>>Controle Simples</option>
                                                            <option value="2" <?php if($produto->tipo_controle == 2) echo "selected"; ?>>Controle por Lote</option>
                                                            <option value="3" <?php if($produto->tipo_controle == 3) echo "selected"; ?>>Sem Controle</option>
                                                        </select>
                                                    </div>                                     
                                                    
                                                </div>
                                                <div class="form-row"> 
                                                    <div class="form-group col-md-3">
                                                        <label for="inputUnidadeMedida">Unidade de Medida <span
                                                                class="text-danger">*</span></label>
                                                        <select id="inputUnidadeMedida" name="UnidadeMedida"
                                                            data-style="btn-input-primary"
                                                            class="selectpicker show-tick form-control" data-live-search="true"
                                                            data-actions-box="true" title="Informe a Unidade de Medida" required>
                                                            <?php foreach($lista_unidade_medida as $key_unidade_medida => $unidadeMedida) { ?>
                                                            <option value="<?= $unidadeMedida->cod_unidade_medida ?>"
                                                                <?php if($unidadeMedida->cod_unidade_medida == $produto->cod_unidade_medida) echo "selected"; ?>>
                                                                <?= $unidadeMedida->cod_unidade_medida ?>
                                                            </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>      
                                                    <div class="form-group col-md-3">
                                                        <label for="inputDiasVencimento">Dias de Vencimento</label>
                                                        <input type="text" class="form-control" id="inputDiasVencimento"
                                                            data-mask="#.##0" data-mask-reverse="true" name="DiasVencimento"
                                                            value="<?= $produto->dias_vencimento ?>">
                                                    </div>                                              
                                                    <div class="form-group col-md-3">
                                                        <label for="inputTempoAbastecimento">Tempo de Abastecimento (Dias) <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="inputTempoAbastecimento"
                                                            data-mask="#.##0" data-mask-reverse="true" name="TempoAbastecimento"
                                                            value="<?= $produto->tempo_abastecimento ?>" required>
                                                    </div>                   
                                                    <div class="form-group col-md-3">
                                                        <label for="inputEstoqueMin">Estoque Mínimo <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="inputEstoqueMin"
                                                            data-mask="#.##0,000" data-mask-reverse="true" name="EstoqMinimo"
                                                            value="<?= $produto->estoq_min ?>" required>
                                                    </div>                                                  
                                                </div>
                                                <div class="form-row"> 
                                                   <div class="form-group col-md-12">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="checkSaldoNegativo"
                                                                name="SaldoNegativo" value="1"
                                                                <?php if($produto->saldo_negativo == 1) echo "checked" ?>>
                                                            <label class="custom-control-label" for="checkSaldoNegativo">Permitir Saldo
                                                                    Negativo</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                        
                                            <div class="tab-pane fade" id="comercial" role="tabpanel"
                                                aria-labelledby="vendas-tab">
                                                <div class="form-row mt-3">  
                                                    <div class="form-group col-md-3">
                                                        <label class="control-label" for="inputCustoMedio">Custo Médio <span
                                                        class="text-danger">*</span></label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">R$</span>
                                                            </div>
                                                            <input type="text" class="form-control" class="form-control"
                                                                id="inputCustoMedio" type="text" name="CustoMedio"
                                                                data-mask="#.##0,00" data-mask-reverse="true"
                                                                value="<?= $produto->custo_medio ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="control-label" for="inputPrecoVenda">Preço de Venda</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">R$</span>
                                                            </div>
                                                            <input type="text" class="form-control" class="form-control"
                                                                id="inputPrecoVenda" type="text" name="PrecoVenda"
                                                                data-mask="#.##0,00" data-mask-reverse="true"
                                                                value="<?= $produto->preco_venda ?>">
                                                        </div>
                                                    </div> 
                                                    <div class="form-group col-md-3">
                                                        <label for="inputUMFaturamento">Unidade de Medida de Faturamento</label>
                                                        <select id="inputUMFaturamento" name="UMFaturamento"
                                                            data-style="btn-input-primary"
                                                            class="selectpicker show-tick form-control" data-live-search="true"
                                                            data-actions-box="true" title="Informe a Unidade de Medida">
                                                            <?php foreach($lista_unidade_medida as $key_unidade_medida => $unidadeMedida) { ?>
                                                            <option value="<?= $unidadeMedida->cod_unidade_medida ?>"
                                                                <?php if($unidadeMedida->cod_unidade_medida == $produto->cod_unidade_medida_fat) echo "selected"; ?>>
                                                                <?= $unidadeMedida->cod_unidade_medida ?>
                                                            </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="control-label" for="inputQuantFaturamento">Quantidade de Faturamento</label>
                                                        <input type="text" class="form-control" class="form-control"
                                                                id="inputQuantFaturamento" type="text" name="QuantFaturamento"
                                                                data-mask="#.##0,000" data-mask-reverse="true"
                                                                value="<?= $produto->quant_faturamento ?>">
                                                    </div>
                                                </div>  
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="checkFaturavel"
                                                                name="Faturavel" value="1"
                                                                <?php if($produto->faturavel == 1) echo "checked" ?>>
                                                            <label class="custom-control-label" for="checkFaturavel">Produto
                                                                Faturável</label>
                                                        </div>
                                                    </div>
                                                </div>                                                                             
                                            </div>
                                            <div class="tab-pane fade" id="fiscal" role="tabpanel"
                                                    aria-labelledby="vendas-tab">
                                                <div class="form-row mt-3">
                                                    <div class="form-group col-md-9">
                                                        <label for="inputNCM">NCM</label>
                                                        <select id="inputNCM" name="NCM" data-style="btn-input-primary"
                                                            class="selectpicker show-tick form-control" data-live-search="true"
                                                            data-actions-box="true" title="Informe a NCM do Produto">
                                                            <?php foreach($lista_ncm as $key_ncm => $ncm) { ?>
                                                            <option value="<?= $ncm->cod_ncm ?>"
                                                                <?php if($ncm->cod_ncm == $produto->cod_ncm) echo "selected"; ?>>
                                                                <?= substr($ncm->desc_ncm, 0, 102) ?>
                                                            </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="inputOrigemProduto">Origem do Produto</label>
                                                        <select id="inputOrigemProduto" name="OrigemProduto"
                                                            data-style="btn-input-primary"
                                                            class="selectpicker show-tick form-control" data-live-search="true"
                                                            data-actions-box="true" title="Informe a Origem do Produto">
                                                            <option value="0"
                                                                <?php if($produto->cod_origem == 0) echo "selected"; ?>>
                                                                0 - Nacional
                                                            </option>
                                                            <option value="1"
                                                                <?php if($produto->cod_origem == 1) echo "selected"; ?>>
                                                                1 - Estrangeira - Importação direta
                                                            </option>
                                                            <option value="2"
                                                                <?php if($produto->cod_origem == 2) echo "selected"; ?>>
                                                                2 - Estrangeira - Adquirida no mercado interno
                                                            </option>
                                                            <option value="3"
                                                                <?php if($produto->cod_origem == 3) echo "selected"; ?>>
                                                                3 - Nacional, mercadoria ou bem com Conteúdo de Importação superior
                                                                a 40%
                                                            </option>
                                                            <option value="4"
                                                                <?php if($produto->cod_origem == 4) echo "selected"; ?>>
                                                                4 - Nacional, cuja produção tenha sido feita em conformidade com a
                                                                MP 252(MP do BEM)
                                                            </option>
                                                            <option value="5"
                                                                <?php if($produto->cod_origem == 5) echo "selected"; ?>>
                                                                5 - Nacional, mercadoria ou bem com Conteúdo de Importação inferior
                                                                ou igual a 40%
                                                            </option>
                                                            <option value="6"
                                                                <?php if($produto->cod_origem == 6) echo "selected"; ?>>
                                                                6 - Estrangeira - Importação direta, sem similar nacional, constante
                                                                em lista de Resolução CAMEX
                                                            </option>
                                                            <option value="7"
                                                                <?php if($produto->cod_origem == 7) echo "selected"; ?>>
                                                                7 - Estrangeira - Adquirida no mercado interno, sem similar
                                                                nacional, constante em lista de Resolução CAMEX
                                                            </option>
                                                            <option value="8"
                                                                <?php if($produto->cod_origem == 8) echo "selected"; ?>>
                                                                8 - Nacional, mercadoria ou bem com Conteúdo de Importação superior
                                                                a 70%
                                                            </option>
                                                        </select>
                                                    </div>                                                    
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="inputCEST">CEST</label>
                                                        <select id="inputCEST" name="CEST" data-style="btn-input-primary"
                                                            class="selectpicker show-tick form-control" data-live-search="true"
                                                            data-actions-box="true" title="Informe o CEST do Produto">
                                                            <?php foreach($lista_cest as $key_cest => $cest) { ?>
                                                            <option value="<?= $cest->cod_cest ?>"
                                                                <?php if($cest->cod_cest == $produto->cod_cest) echo "selected"; ?>>
                                                                <?= $cest->cod_cest ?> - <?= substr($cest->desc_cest, 0, 102) ?>
                                                            </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="control-label" for="inputPesoLiq">Peso Líquido</label>
                                                        <div class="input-group">                                                
                                                            <input type="text" class="form-control" class="form-control"
                                                                id="inputPesoLiq" type="text" data-mask="#.##0,000"
                                                                data-mask-reverse="true" name="PesoLiq"
                                                                value="<?= $produto->peso_liq ?>">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">KG</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="control-label" for="inputPesoBruto">Peso Bruto</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" class="form-control"
                                                                id="inputPesoBruto" type="text" data-mask="#.##0,000"
                                                                data-mask-reverse="true" name="PesoBruto"
                                                                value="<?= $produto->peso_bruto ?>">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">KG</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label class="control-label" for="inputCodBarras">Código de Barras</label>
                                                        <input type="text" class="form-control" class="form-control"
                                                            id="inputCodBarras" type="text" name="CodBarras"
                                                            value="<?= $produto->cod_barras ?>">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="control-label" for="inputCodGTIN">GTIN</label>
                                                        <input type="text" class="form-control" class="form-control"
                                                            id="inputCodGTIN" type="text" name="CodGTIN"
                                                            value="<?= $produto->cod_gtin ?>">
                                                    </div>
                                                </div>
                                            </div>                                                                                   
                                        </div>  
                                        <div class="form-row" hidden>
                                            <div class="form-group col-md-6">
                                                <label for="inputDesenho">Desenho Técnico</label>
                                                <div class="input-group mb-2">
                                                    <div class="custom-file">
                                                        <input id="inputDesenho" type="file" class="custom-file-input search" name="desenho" onchange="previewDesenho()">
                                                        <label id="labelDesenho" class="custom-file-label search"><?php if($produto->caminho_desenho != "") echo $produto->caminho_desenho; else echo "Escolha imagem para importar";?></label>
                                                    </div>
                                                </div>
                                                <a href="#" id="btnDesenho" data-toggle="modal" data-target="#desenho-tecnico" class="btn btn-link <?php if($produto->caminho_desenho == null) echo "disabled";?>">Visualizar imagem</a>
                                                <a href="#" id="btnExcluirDesenho" class="btn btn-link text-danger <?php if($produto->caminho_desenho == null) echo "disabled";?>">Excluir imagem</a>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputImageProduto">Foto do Produto</label>
                                                <div class="input-group mb-2">
                                                    <div class="custom-file">
                                                        <input id="inputFoto" type="file" class="custom-file-input search" name="foto" onchange="previewFoto()">
                                                        <label id="labelFoto" class="custom-file-label search"><?php if($produto->caminho_foto != "") echo $produto->caminho_foto; else echo "Escolha imagem para importar";?></label>
                                                    </div>
                                                </div>
                                                <a href="#" id="btnFoto" data-toggle="modal" data-target="#foto-produto" class="btn btn-link <?php if($produto->caminho_foto == null) echo "disabled";?>">Visualizar imagem</a>
                                                <a href="#" id="btnExcluirFoto" class="btn btn-link text-danger <?php if($produto->caminho_desenho == null) echo "disabled";?>">Excluir imagem</a>
                                            </div>
                                        </div>                                        
                                        <hr class="mb-3">
                                        <div class="row float-right">
                                            <div class="col-lg-12 col-md-12 col-xs-12">
                                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>
                                                    Salvar</button>
                                                <a href="<?php echo base_url() ?>produto"
                                                    class="btn btn-secondary link-load">Cancelar</a>
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
    </section>

    <script>
    $(function() {
        $.applyDataMask();
    });

    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

    function previewDesenho() {
        desenho.src = URL.createObjectURL(event.target.files[0]);
        $("#btnDesenho").removeClass("disabled");
    }

    function previewFoto() {
        foto.src = URL.createObjectURL(event.target.files[0]);
        $("#btnFoto").removeClass("disabled");
    }

    $("#btnExcluirDesenho").on('click', function() {

        $("#btnDesenho").addClass("disabled");
        $("#btnExcluirDesenho").addClass("disabled");
        $("#inputDesenho").value = "";
        $("#labelDesenho").html("Escolha imagem para importar");    

    });

    $("#btnExcluirFoto").on('click', function() {

        $("#btnFoto").addClass("disabled");
        $("#btnExcluirFoto").addClass("disabled");
        $("#inputFoto").value = "";
        $("#labelFoto").html("Escolha imagem para importar");    

    });
    </script>

    <?php $this->load->view('gerais/footer'); ?>