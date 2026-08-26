<?php $this->load->view('gerais/header' , $menu); ?>
<?php $this->load->view('gerais/menu', $menu); ?>

<section>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('visao-geral') ?>">Visão Geral</a></li>
            <li class="breadcrumb-item active">Posição de Estoque</li>
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
                                        <a href="<?= base_url("estoque/posicao-estoque/{$mes_anterior}/{$ano_anterior}") ?>"
                                            class="btn btn-secondary link-load"><i class="fas fa-angle-left"></i></a>
                                    </div>
                                    <input type="text" class="form-control search text-center"
                                        value="<?= $descMes ?> de <?= $ano ?>" readonly>
                                    <div class="input-group-append">
                                        <a href="<?= base_url("estoque/posicao-estoque/{$mes_seguinte}/{$ano_seguinte}") ?>"
                                            class="btn btn-secondary link-load <?php if(date(''.$ano.'-'.$mes.'-01') == date('Y-m-01')) echo "disabled"; ?>"><i
                                                class="fas fa-angle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card  mb-3">
                    <h6 class="card-header bg-white text-muted">
                        Valor em estoque<br>
                        <span class="font-italic text-size-80">Por tipo de produto</span>
                    </h6>
                    <div class="card-body">  
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-borderless table-sm mb-0">
                                    <tbody>
                                        <?php 
                                            $totalEstoq = 0; 
                                            foreach($valor_tipo_produto as $key_tipo_produto => $tipo) { 
                                                $totalEstoq = $totalEstoq + $tipo->valor_estoque; ?>

                                        <tr>
                                            <td class="text-left align-middle ">
                                                <?= $tipo->nome_tipo_produto ?>
                                            </td>
                                            <td 
                                                class="text-right align-middle <?php if($tipo->valor_estoque > 0) echo "text-teal"; ?>">
                                                R$
                                                <?= number_format((float) (($tipo->valor_estoque)), 2, ',', '.') ?>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <?php if ($valor_tipo_produto == false) { ?>
                                <div class="text-center">
                                    <p class="text-muted mb-0">Nenhuma conta disponível</p>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <table class="table table-borderless table-sm mb-0 mt-0">
                            <tbody>
                                <tr>
                                    <td class="text-left pt-0 text-dark"><strong>Total em estoque</strong></td>
                                    <td 
                                        class="text-right pt-0 <?php if($totalEstoq > 0) echo "text-teal"; ?>">
                                        <strong>
                                            R$
                                            <?= number_format((float) ($totalEstoq), 2, ',', '.') ?>
                                        </strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <form action="<?= base_url("estoque/posicao-estoque/{$mes}/{$ano}") ?>" method="get"
                            class="mb-0 needs-validation" novalidate>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <select class="selectpicker show-tick form-control" multiple data-live-search="true"
                                        data-actions-box="true" title="Produto" data-style="btn-input-primary"
                                        name="produtoFiltro[]">
                                        <?php $chave_produto = 0; foreach($lista_produto_filtro as $key_produto => $produto) { ?>
                                        <option value="<?= $produto->cod_produto ?>" <?php if($produtoFiltro != null){if($produto->cod_produto == $produtoFiltro[$chave_produto]){ 
                                                if((count($produtoFiltro) - 1) > $chave_produto) {$chave_produto = $chave_produto + 1; } 
                                                echo "selected"; }}?>>
                                            <?= $produto->cod_produto ?> -
                                            <?= $produto->nome_produto ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <select class="selectpicker show-tick form-control" multiple data-live-search="true"
                                        data-actions-box="true" title="Tipo de Produto" name="TipoProdutoFiltro[]"
                                        data-style="btn-input-primary">
                                        <?php $chave_tipo_produto = 0; foreach($lista_tipo_produto as $key_tipo_produto => $tipo_produto) { ?>
                                        <option value="<?= $tipo_produto->cod_tipo_produto ?>" <?php if($tipoProdutoFiltro != null){if($tipo_produto->cod_tipo_produto == $tipoProdutoFiltro[$chave_tipo_produto]){ 
                                                if((count($tipoProdutoFiltro) - 1) > $chave_tipo_produto) {$chave_tipo_produto = $chave_tipo_produto + 1; } 
                                                echo "selected"; }}?>>
                                            <?= $tipo_produto->cod_tipo_produto ?> -
                                            <?= $tipo_produto->nome_tipo_produto ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <select class="selectpicker show-tick form-control" multiple data-live-search="true"
                                        data-actions-box="true" title="Unidade de Medida" name="unFiltro[]"
                                        data-style="btn-input-primary">
                                        <?php $chave_un = 0; foreach($lista_un as $key_un => $un) { ?>
                                        <option value="<?= $un->cod_unidade_medida ?>" <?php if($unFiltro != null){if($un->cod_unidade_medida == $unFiltro[$chave_un]){ 
                                                if((count($unFiltro) - 1) > $chave_un) {$chave_un = $chave_un + 1; } 
                                                echo "selected"; }}?>>
                                            <?= $un->cod_unidade_medida ?> - <?= $un->nome_unidade_medida ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-outline-primary btn-block">Filtrar
                                        Produtos</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8 pl-0">
                <ul class="nav nav-tabs mb-3">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#posicao-estoque">Posição do Estoque</a>
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
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">Produto</th>
                                                <th scope="col">Tipo do produto</th>
                                                <th scope="col" class="text-right">Estoque</th>
                                                <th scope="col" class="text-right">Valor</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-sm">
                                            <?php foreach($lista_produto as $key_produto => $produto) {
                                                    $quantEstoq = $produto->quant_estoq + $produto->quant_saida - $produto->quant_entrada; 
                                            ?>
                                            <tr>
                                                <td class="align-middle limit-text-50"><a class="text-dark link-load"
                                                        href="<?= base_url("estoque/posicao-estoque/movimento-produto/{$produto->cod_produto}") ?>"><?= $produto->cod_produto ?> - <?= $produto->nome_produto ?></a><br>
                                                        <?php  
                                                            switch ($produto->tipo_controle) {
                                                                case 1:
                                                                    echo "<span class='badge bg-light'>Controle Simples</span>";
                                                                    break;
                                                                case 2:
                                                                    echo "<span class='badge bg-danger-light'>Controle por Lote</span>";
                                                                    break;
                                                                case 3:
                                                                    echo "<span class='badge bg-teal-light'>Serviço</span>";
                                                                    break;
                                                            }
                                                        ?>
                                                </td>
                                                <td class="align-middle"><?= $produto->nome_tipo_produto ?></td>
                                                <td
                                                    class="text-right align-middle <?php if($quantEstoq < 0) echo "text-danger"; else echo "text-info"; ?>">
                                                    <?= number_format((float) ($quantEstoq), 3, ',', '.') ?> <?= $produto->cod_unidade_medida ?>
                                                </td>
                                                <td class="text-right align-middle <?php if($quantEstoq > 0) echo "text-teal"; ?>">
                                                    R$
                                                    <?php if($quantEstoq > 0) echo number_format((float) ($produto->custo_medio * $quantEstoq), 2, ',', '.'); else echo 0; ?>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php if ($lista_produto == false) { ?>
                                <div class="text-center text-muted">
                                    <p class="font-italic mt-3">Nenhuma produto encontrado</p>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if($pagination != null){ ?>
                <div class="card  mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div>
                                    <?= $pagination; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

<script>
$('.page-item>a').addClass("page-link");
</script>

<?php $this->load->view('gerais/footer'); ?>