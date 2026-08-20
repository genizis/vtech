<?php $this->load->view('gerais/header' , $menu); ?>
<?php $this->load->view('gerais/menu', $menu); ?>

<section>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('visao-geral') ?>">Visão Geral</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('producao') ?>">Produção</a></li>
            <li class="breadcrumb-item active">Produção por Produto</a></li>
        </ol>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="<?= base_url('relatorios/producao-produto') ?>" method="get" class="mb-0 needs-validation" novalidate>
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label for="inputTipoProduto">Data Início</label>
                                    <input class="form-control" id="inputDataInicio" type="text" name="DataInicio"
                                        value="<?= str_replace('-', '/', date("d-m-Y", strtotime($dataInicio))) ?>">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputTipoProduto">Data Fim</label>
                                    <input class="form-control" id="inputDataFim" type="text" name="DataFim"
                                        value="<?= str_replace('-', '/', date("d-m-Y", strtotime($dataFim))) ?>">
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="inputTipoProduto">Produto</label>
                                    <select id="inputProduto" name="produto[]" data-style="btn-input-primary" multiple
                                        data-actions-box="true" class="selectpicker show-tick form-control"
                                        data-live-search="true" data-actions-box="true" title="Produtos Produzidos">
                                        <?php $chave_produto = 0; foreach($lista_produto_prod as $key_produto_prod => $produto_prod) { ?>
                                        <option value="<?= $produto_prod->cod_produto ?>" <?php if($cod_produto != null){if($produto_prod->cod_produto == $cod_produto[$chave_produto]){ 
                                        if((count($cod_produto) - 1) > $chave_produto) {$chave_produto = $chave_produto + 1; } 
                                        echo "selected"; }}?>>
                                            <?= $produto_prod->cod_produto ?> -
                                            <?= $produto_prod->nome_produto ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-8 mb-0">                                    
                                </div> 
                                <div class="form-group col-md-2 mb-0"> 
                                    <button type="submit" class="btn btn-outline-warning btn-block no-spinner" name="acao" value="2"><i class="fa-regular fa-file-excel"></i> Exportar Excel</button>
                                </div> 
                                <div class="form-group col-md-2 mb-0"> 
                                    <button type="submit" class="btn btn-outline-primary btn-block" name="acao" value="1"><i class="fa-solid fa-rotate"></i> Atualizar Dados</button>
                                </div> 
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                            aria-controls="home" aria-selected="true">Produção Resumida</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                            aria-controls="profile" aria-selected="false">Produção Detalhada</a>
                    </li>
                </ul>
                <div class="card  mb-5">
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="form-group col-md-2 mb-0">                                    
                                        <button type="button" id="btnExportProdutoResumido" class="btn btn-outline-warning btn-block"><i class="fa-regular fa-file-excel"></i> Exportar Excel</button>
                                    </div> 
                                    <div class="form-group col-md-10 mb-0">                                    
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-reporte small2">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">Produto</th>
                                                <th scope="col">Tipo produto</th>
                                                <th scope="col" class="text-center">Hrs Trabalhadas</th>
                                                <th scope="col" class="text-right">Produção</th>
                                                <th scope="col" class="text-right">Perca</th>
                                                <th scope="col" class="text-right">Mão de obra</th>
                                                <th scope="col" class="text-right">Materiais</th>
                                                <th scope="col" class="text-right">Custo total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($lista_producao_resumida as $key_producao_resumida => $producao_resumida) { ?>
                                            <tr>
                                                <td scope="row" class="align-middle"><?= $producao_resumida->cod_produto ?> -
                                                    <?= $producao_resumida->nome_produto ?></td>
                                                <td><?= $producao_resumida->nome_tipo_produto ?></td>
                                                <td
                                                    class="text-center align-middle">
                                                    <?= number_format($producao_resumida->horas_trabalhadas, 2, ',', '.') ?>
                                                </td>
                                                <td
                                                    class="text-right align-middle <?php if($producao_resumida->quant_reportada > 0) echo "text-teal"; ?>">
                                                    <?= number_format($producao_resumida->quant_reportada, 3, ',', '.') ?> <?= $producao_resumida->cod_unidade_medida ?>
                                                </td>
                                                <td
                                                    class="text-right align-middle <?php if($producao_resumida->quant_perdida > 0) echo "text-warning"; ?>">
                                                    <?= number_format($producao_resumida->quant_perdida, 3, ',', '.') ?> <?= $producao_resumida->cod_unidade_medida ?>
                                                </td>
                                                <td
                                                    class="text-right align-middle <?php if($producao_resumida->custo_mob > 0) echo "text-danger"; ?>">
                                                    R$ <?= number_format($producao_resumida->custo_mob, 2, ',', '.') ?>
                                                </td>
                                                <td
                                                    class="text-right align-middle <?php if($producao_resumida->custo_producao > 0) echo "text-danger"; ?>">
                                                    R$ <?= number_format($producao_resumida->custo_producao, 2, ',', '.') ?>
                                                </td>
                                                <td
                                                    class="text-right align-middle <?php if(($producao_resumida->custo_producao + $producao_resumida->custo_mob) > 0) echo "text-danger"; ?>">
                                                    <strong>R$ <?= number_format($producao_resumida->custo_producao + $producao_resumida->custo_mob, 2, ',', '.') ?></strong>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php if($lista_producao_resumida == false) { ?>
                                    <div class="text-center text-muted">
                                        <p class="font-italic mt-3">Nenhuma informação encontrada</p>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="row">
                                    <div class="form-group col-md-2 mb-0">                                    
                                        <button type="button" id="btnExportProdutoDetalhado" class="btn btn-outline-warning btn-block"><i class="fa-regular fa-file-excel"></i> Exportar Excel</button>
                                    </div> 
                                    <div class="form-group col-md-10 mb-0">                                    
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-reporte small2">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col" class="text-center">Data</th>
                                                <th scope="col" class="text-center">Ordem</th>
                                                <th scope="col">Produto</th>
                                                <th scope="col">Tipo produto</th>
                                                <th scope="col" class="text-center">Hrs Trab.</th>
                                                <th scope="col" class="text-right">Produção</th>
                                                <th scope="col" class="text-right">Perca</th>
                                                <th scope="col" class="text-right">Mão de obra</th>
                                                <th scope="col" class="text-right">Materiais</th>
                                                <th scope="col" class="text-right">Custo produção</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($lista_producao_detalhada as $key_producao_detalhada => $producao_detalhada) { ?>
                                            <tr>
                                                <td class="text-center align-middle">
                                                    <?= str_replace('-', '/', date("d-m-Y", strtotime($producao_detalhada->data_reporte))) ?>
                                                </td>
                                                <td class="text-center align-middle"><?= $producao_detalhada->num_ordem_producao ?></td>
                                                <td scope="row" class="align-middle"><?= $producao_detalhada->cod_produto ?> -
                                                    <?= $producao_detalhada->nome_produto ?></td>
                                                <td class="align-middle"><?= $producao_detalhada->nome_tipo_produto ?></td>
                                                <td class="text-center align-middle"><?= number_format($producao_detalhada->horas_trabalhadas, 2, ',', '.') ?></td>
                                                <td
                                                    class="text-right align-middle <?php if($producao_detalhada->quant_reportada > 0) echo "text-teal"; ?>">
                                                    <?= number_format($producao_detalhada->quant_reportada, 3, ',', '.') ?> <?= $producao_detalhada->cod_unidade_medida ?>
                                                </td>
                                                <td
                                                    class="text-right align-middle <?php if($producao_detalhada->quant_perdida > 0) echo "text-warning"; ?>">
                                                    <?= number_format($producao_detalhada->quant_perdida, 3, ',', '.') ?> <?= $producao_detalhada->cod_unidade_medida ?>
                                                </td>
                                                <td
                                                    class="text-right align-middle <?php if($producao_detalhada->custo_mob > 0) echo "text-danger"; ?>">
                                                    R$
                                                    <?= number_format($producao_detalhada->custo_mob, 2, ',', '.') ?>
                                                </td>
                                                <td
                                                    class="text-right align-middle <?php if($producao_detalhada->custo_producao > 0) echo "text-danger"; ?>">
                                                    R$
                                                    <?= number_format($producao_detalhada->custo_producao, 2, ',', '.') ?>
                                                </td>
                                                <td
                                                    class="text-right align-middle <?php if(($producao_detalhada->custo_mob + $producao_detalhada->custo_producao) > 0) echo "text-danger"; ?>">
                                                    <strong>R$
                                                    <?= number_format($producao_detalhada->custo_mob + $producao_detalhada->custo_producao, 2, ',', '.') ?></strong>
                                                </td>
                                            </tr>
                                            <?php } ?>

                                        </tbody>
                                    </table>
                                </div>
                                <?php if($lista_producao_detalhada == false) { ?>
                                    <div class="text-center text-muted">
                                        <p class="font-italic mt-3">Nenhuma informação encontrada</p>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>

    </div>
</section>

<iframe id="downloadXLSResumido" style="display:none">
    <meta http-equiv="content-type" content="application/vnd.ms-excel; charset=UTF-8">
    <table>
        <tbody>
            <tr>
                <th colspan="9" style="text-align: left; background-color: rgb(245, 245, 245)">
                    <h1><?= $empresa->nome_empresa ?></h1>
                </th>
            </tr> 
            <tr>
                <th colspan="9" style="text-align: left; background-color: rgb(245, 245, 245)">
                    Relatório resumido de produtos produzidos: <?= str_replace('-', '/', date("d-m-Y", strtotime($dataInicio))) ?> até  <?= str_replace('-', '/', date("d-m-Y", strtotime($dataFim))) ?>
                </th>
            </tr> 
            <tr>
            </tr>
        </tbody>
    </table>
    <table>
        <thead>
            <tr>
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">PRODUTO</th> 
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">UN</th>                
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">TIPO DO PRODUTO</th>
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">HRS TRABALHADAS</th>
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">PRODUÇÃO</th>   
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">PERCA</th> 
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">MÃO DE OBRA</th>           
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">MATERIAIS</th>
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">CUSTO TOTAL</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($lista_producao_resumida as $key_producao_resumida => $producao_resumida) { ?>
            <tr>
                <td style="border: 1px solid">
                    <?= $producao_resumida->cod_produto ?> - <?= $producao_resumida->nome_produto ?>
                </td>
                <td style="border: 1px solid">
                    <?= $producao_resumida->cod_unidade_medida ?>
                </td> 
                <td style="border: 1px solid">
                    <?= $producao_resumida->nome_tipo_produto ?>
                </td> 
                <td style="border: 1px solid">
                    <?= number_format($producao_resumida->horas_trabalhadas, 2, ',', '.') ?>
                </td> 
                <td style="border: 1px solid">
                    <?= number_format($producao_resumida->quant_reportada, 3, ',', '.') ?>
                </td> 
                <td style="border: 1px solid">
                    <?= number_format($producao_resumida->quant_perdida, 3, ',', '.') ?>
                </td>
                <td style="border: 1px solid">
                    R$ <?= number_format($producao_resumida->custo_mob, 2, ',', '.') ?>
                </td>
                <td style="border: 1px solid">
                    R$ <?= number_format($producao_resumida->custo_producao, 2, ',', '.') ?>
                </td>
                <td style="border: 1px solid">
                    R$ <?= number_format($producao_resumida->custo_producao + $producao_resumida->custo_mob, 2, ',', '.') ?>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</iframe>

<iframe id="downloadXLSDetalhado" style="display:none">
    <meta http-equiv="content-type" content="application/vnd.ms-excel; charset=UTF-8">
    <table>
        <tbody>
            <tr>
                <th colspan="11" style="text-align: left; background-color: rgb(245, 245, 245)">
                    <h1><?= $empresa->nome_empresa ?></h1>
                </th>
            </tr> 
            <tr>
                <th colspan="11" style="text-align: left; background-color: rgb(245, 245, 245)">
                    Relatório detalhado de produtos produzidos: <?= str_replace('-', '/', date("d-m-Y", strtotime($dataInicio))) ?> até  <?= str_replace('-', '/', date("d-m-Y", strtotime($dataFim))) ?>
                </th>
            </tr> 
            <tr>
            </tr>
        </tbody>
    </table>
    <table>
        <thead>
            <tr>
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">DATA</th> 
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">ORDEM</th> 
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">PRODUTO</th> 
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">UN</th>                
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">TIPO DO PRODUTO</th>
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">HRS TRABALHADAS</th>
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">PRODUÇÃO</th>   
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">PERCA</th> 
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">MÃO DE OBRA</th>           
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">MATERIAIS</th>
                <th style="border: 1px solid; background-color: rgb(245, 245, 245)">CUSTO PRODUÇÃO</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($lista_producao_detalhada as $key_producao_detalhada => $producao_detalhada) { ?>
            <tr>
                <td style="border: 1px solid">
                    <?= str_replace('-', '/', date("d-m-Y", strtotime($producao_detalhada->data_reporte))) ?>
                </td>
                <td style="border: 1px solid"><?= $producao_detalhada->num_ordem_producao ?></td>
                <td style="border: 1px solid">
                    <?= $producao_detalhada->cod_produto ?> - <?= $producao_detalhada->nome_produto ?>
                </td>
                <td style="border: 1px solid">
                    <?= $producao_detalhada->cod_unidade_medida ?>
                </td> 
                <td style="border: 1px solid">
                    <?= $producao_detalhada->nome_tipo_produto ?>
                </td> 
                <td style="border: 1px solid">
                    <?= number_format($producao_detalhada->horas_trabalhadas, 2, ',', '.') ?>
                </td> 
                <td style="border: 1px solid">
                    <?= number_format($producao_detalhada->quant_reportada, 3, ',', '.') ?>
                </td> 
                <td style="border: 1px solid">
                    <?= number_format($producao_detalhada->quant_perdida, 3, ',', '.') ?>
                </td>
                <td style="border: 1px solid">
                    R$ <?= number_format($producao_detalhada->custo_mob, 2, ',', '.') ?>
                </td>
                <td style="border: 1px solid">
                    R$ <?= number_format($producao_detalhada->custo_producao, 2, ',', '.') ?>
                </td>
                <td style="border: 1px solid">
                    R$ <?= number_format($producao_detalhada->custo_producao + $producao_detalhada->custo_mob, 2, ',', '.') ?>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</iframe>

<script>
$('#inputDataInicio').datepicker({
    uiLibrary: 'bootstrap4'
});
$('#inputDataFim').datepicker({
    uiLibrary: 'bootstrap4'
});

$("#btnExportProdutoResumido").click(function(e) {
    var a = document.createElement('a');
    var data_type = 'data:application/x-msexcel';
    var table_div = document.getElementById('downloadXLSResumido');
    var table_html = table_div.outerHTML.replace(/ /g, '%20');
    a.href = data_type + ', ' + table_html;
    a.download = 'VTech - Produção Por Produto (Resumido).xls';
    a.click();
    e.preventDefault();
});

$("#btnExportProdutoDetalhado").click(function(e) {
    var a = document.createElement('a');
    var data_type = 'data:application/x-msexcel';
    var table_div = document.getElementById('downloadXLSDetalhado');
    var table_html = table_div.outerHTML.replace(/ /g, '%20');
    a.href = data_type + ', ' + table_html;
    a.download = 'VTech - Produção Por Produto (Detalhado).xls';
    a.click();
    e.preventDefault();
});
</script>

<?php $this->load->view('gerais/footer'); ?>