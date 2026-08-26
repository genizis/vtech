<?php $this->load->view('gerais/header' , $menu); ?>
<?php $this->load->view('gerais/menu', $menu); ?>

<section>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('visao-geral') ?>">Visão Geral</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('fiscal') ?>">Fiscal</a></li>
            <li class="breadcrumb-item active">Notas Fiscais Emitidas</a></li>
        </ol>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="<?= base_url('relatorios/notas-emitidas') ?>" method="get" class="mb-0 needs-validation"
                    novalidate>
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
                                    <label for="inputTipoProduto">Cliente</label>
                                    <select id="inputCliente" name="cliente[]" data-style="btn-input-primary" multiple
                                        data-actions-box="true" class="selectpicker show-tick form-control"
                                        data-live-search="true" data-actions-box="true" title="Clientes">
                                        <?php $chave_cliente = 0; foreach($lista_cliente as $key_cliente => $cliente) { ?>
                                        <option value="<?= $cliente->cod_cliente ?>" <?php if($cod_cliente != null){if($cliente->cod_cliente == $cod_cliente[$chave_cliente]){ 
                                        if((count($cod_cliente) - 1) > $chave_cliente) {$chave_cliente = $chave_cliente + 1; } 
                                        echo "selected"; }}?>>
                                            <?= $cliente->cod_cliente ?> -
                                            <?= $cliente->nome_cliente ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <hr class="mb-3">
                            <div class="form-row">
                                <div class="form-group col-md-6 mb-0">
                                </div>
                                <div class="form-group col-md-2 mb-0">
                                    <a href="<?php echo base_url() ?>relatorios/notas-emitidas/imprimir-xml/<?= $dataInicio ?>/<?= $dataFim ?>" 
                                        type="button" class="btn btn-outline-teal btn-block"><i
                                        class="fa-regular fa-file-code"></i> Download do XML</a>
                                </div>
                                <div class="form-group col-md-2 mb-0">
                                    <button type="button" id="btnExport" class="btn btn-outline-warning btn-block"><i
                                            class="fa-regular fa-file-excel"></i> Exportar Dados</button>
                                </div>
                                <div class="form-group col-md-2 mb-0">
                                    <button type="submit" class="btn btn-outline-primary btn-block">Atualizar
                                        Dados</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-reporte small2">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" class="text-center">Data emissão</th>
                                        <th scope="col" class="text-center">Pedido</th>
                                        <th scope="col" class="text-center">Serie</th>
                                        <th scope="col" class="text-center">Número</th>
                                        <th scope="col" class="text-center">Modelo</th>
                                        <th scope="col">Cliente</th>  
                                        <th scope="col" class="text-center">CNPJ/CPF</th>                                      
                                        <th scope="col" class="text-center">Status</th>
                                        <th scope="col" class="text-center">Motivo</th>
                                        <th scope="col" class="text-right" width="120">Total nota</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($lista_nota_detalhada as $key_nota_detalhada => $nota_detalhada) { ?>
                                    <tr>
                                        <td class="text-center align-middle">
                                            <?= str_replace('-', '/', date("d-m-Y", strtotime($nota_detalhada->data_emissao))) ?>
                                        </td>
                                        <td class="text-center align-middle"><?= $nota_detalhada->num_pedido_venda ?></td>
                                        <td class="text-center align-middle"><?= $nota_detalhada->serie ?></td>
                                        <td class="text-center align-middle"><?= $nota_detalhada->numero ?></td>
                                        <td class="text-center align-middle"><?= $nota_detalhada->modelo ?></td>
                                        <td class="align-middle">
                                            <?php
                                                    if($nota_detalhada->cod_cliente <> 0)
                                                        echo $nota_detalhada->cod_cliente . " - " . $nota_detalhada->nome_cliente;
                                                    else
                                                        echo "0 - Consumidor Final";
                                                ?>
                                        </td>
                                        <td class="text-center align-middle"><?= $nota_detalhada->cnpj_cpf ?></td>                                        
                                        <td class="text-center align-middle"><?= $nota_detalhada->c_stat ?></td>
                                        <td class="text-center align-middle"><?= $nota_detalhada->x_motivo ?></td>
                                        <td class="text-right align-middle text-teal">
                                            R$ <?= number_format((float) ($nota_detalhada->total_nota), 2, ',', '.') ?>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <?php if ($lista_nota_detalhada == false) { ?>
                        <div class="text-center text-muted">
                            <p class="font-italic mt-3">Nenhuma NF emitida no período</p>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <br>

    </div>
</section>

<iframe id="downloadXLS" style="display:none">
    <meta http-equiv="content-type" content="application/vnd.ms-excel; charset=UTF-8">
    <table>
        <thead>
            <tr>
                <th class="text-center" style="border: 1px solid; background-color: rgb(223, 215, 202)">DATA EMISSÃO
                </th>
                <th class="text-center" style="border: 1px solid; background-color: rgb(223, 215, 202)">SERIE</th>
                <th class="text-center" style="border: 1px solid; background-color: rgb(223, 215, 202)">NÚMERO</th>
                <th class="text-center" style="border: 1px solid; background-color: rgb(223, 215, 202)">MODELO</th>
                <th style="border: 1px solid; background-color: rgb(223, 215, 202)">CLIENTE</th>
                <th class="text-center" style="border: 1px solid; background-color: rgb(223, 215, 202)">CNPJ/CPF
                </th>
                <th class="text-center" style="border: 1px solid; background-color: rgb(223, 215, 202)">STATUS
                </th>
                <th class="text-center" style="border: 1px solid; background-color: rgb(223, 215, 202)">MOTIVO
                </th>
                <th class="text-right" style="border: 1px solid; background-color: rgb(223, 215, 202)">TOTAL NOTA
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($lista_nota_detalhada as $key_nota_detalhada => $nota_detalhada) { ?>
            <tr>
                <td class="text-center" style="border: 1px solid">
                    <?= str_replace('-', '/', date("d-m-Y", strtotime($nota_detalhada->data_emissao))) ?>
                </td>
                <td class="text-center" style="border: 1px solid">
                    <?= $nota_detalhada->serie ?>
                </td>
                <td class="text-center" style="border: 1px solid">
                    <?= $nota_detalhada->numero ?>
                </td>
                <td class="text-center" style="border: 1px solid">
                    <?= $nota_detalhada->modelo ?>
                </td>
                <td class="text-center" style="border: 1px solid">
                <?php
                    if($nota_detalhada->cod_cliente <> 0)
                        echo $nota_detalhada->cod_cliente . " - " . $nota_detalhada->nome_cliente;
                    else
                        echo "0 - Consumidor Final";
                ?>
                </td>
                <td class="text-center" style="border: 1px solid">
                    <?= $nota_detalhada->cnpj_cpf ?>
                </td>
                <td class="text-center" style="border: 1px solid">
                    <?= $nota_detalhada->c_stat ?>
                </td>
                <td class="text-center" style="border: 1px solid">
                    <?= $nota_detalhada->x_motivo ?>
                </td>
                <td class="text-center <?php if($nota_detalhada->total_nota) echo "text-teal"; ?>"
                    style="border: 1px solid; background-color: rgb(245,245,245)">
                    R$ <?= number_format((float) ($nota_detalhada->total_nota), 2, ',', '.'); ?>
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

$("#btnExport").click(function(e) {
    var a = document.createElement('a');
    var data_type = 'data:application/vnd.ms-excel';
    var table_div = document.getElementById('downloadXLS');
    var table_html = table_div.outerHTML.replace(/ /g, '%20');
    a.href = data_type + ', ' + table_html;
    a.download = 'VTech - Notas Fiscais Emitidas.xls';
    a.click();
    e.preventDefault();
});
</script>

<?php $this->load->view('gerais/footer'); ?>