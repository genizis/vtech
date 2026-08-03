<?php $this->load->view('gerais/header' , $menu); ?>
<?php $this->load->view('gerais/menu', $menu); ?>

<section>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('visao-geral') ?>">Visão Geral</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('producao') ?>">Produção</a></li>
            <li class="breadcrumb-item active">Ficha de Composição</a></li>
        </ol>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="<?= base_url('relatorios/ficha-composicao') ?>" method="get" class="mb-0 needs-validation" novalidate>
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputTipoProduto">Produto</label>
                                    <select id="inputProduto" name="produto" data-style="btn-input-primary"
                                        data-actions-box="true" class="selectpicker show-tick form-control"
                                        data-live-search="true" data-actions-box="true" title="Produto de Produção">
                                        <?php $chave_produto = 0; foreach($lista_produto_prod as $key_produto_prod => $produto_prod) { ?>
                                        <option value="<?= $produto_prod->cod_produto ?>" <?php if($produto_prod->cod_produto == $cod_produto){ echo "selected"; } ?>>
                                            <?= $produto_prod->cod_produto ?> -
                                            <?= $produto_prod->nome_produto ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-10 mb-0">                                    
                                </div> 
                                <div class="form-group col-md-2 mb-0"> 
                                    <button type="submit" class="btn btn-outline-primary btn-block"><i class="fa-solid fa-rotate"></i> Atualizar Dados</button>
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
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#ficha" role="tab"
                            aria-controls="ficha" aria-selected="true">Ficha de Composição</a>
                    </li>
                </ul>
                <div class="card  mb-5">
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="ficha" role="tabpanel" aria-labelledby="home-tab">
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
                                                <th scope="col" class="text-center">Ordem</th>
                                                <th scope="col" class="text-center">Nível</th>
                                                <th scope="col">Produto</th>
                                                <th scope="col">Tipo produto</th>
                                                <th scope="col" class="text-right">Quantidade</th>
                                                <th scope="col" class="text-right">Custo</th>
                                                <th scope="col" class="text-right">Custo total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            if($lista_estrutura != null) { $ordem = 0;
                                                foreach($lista_estrutura as $key_estrutura => $estrutura) { $ordem = $ordem + 1;?>
                                            <tr>
                                                <td class="align-middle text-center <?php if($estrutura->est_pai == 1) echo "reg-bold"; ?>"><?= $ordem ?></td>
                                                <td class="align-middle text-center <?php if($estrutura->est_pai == 1) echo "reg-bold"; ?>"><?= $estrutura->nivel ?></td>
                                                <td class="align-middle <?php if($estrutura->est_pai == 1) echo "reg-bold table-success"; ?>">
                                                    <?php 
                                                    for($i = 1; $i < $estrutura->nivel; $i++){
                                                        echo "&emsp;&emsp;";
                                                    }
                                                    ?>
                                                    <?= $estrutura->cod_produto ?> - <?= $estrutura->nome_produto ?>
                                                </td>
                                                <td class="align-middle <?php if($estrutura->est_pai == 1) echo "reg-bold"; ?>"><?= $estrutura->tipo_produto ?></td>
                                                <td class="align-middle text-right <?php if($estrutura->est_pai == 1) echo "reg-bold"; ?>"><?= number_format($estrutura->quantidade, 3, ',', '.') ?> <?= $estrutura->cod_unidade_medida ?></td>
                                                <td class="align-middle text-right <?php if($estrutura->est_pai == 1) echo "reg-bold"; ?>">R$ <?= number_format($estrutura->custo_unit, 2, ',', '.') ?></td>
                                                <td class="align-middle text-right <?php if($estrutura->est_pai == 1) echo "reg-bold"; ?>">R$ <?= number_format($estrutura->custo_total, 2, ',', '.') ?></td>
                                            </tr>
                                            <?php }} ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php if($lista_estrutura == false) { ?>
                                    <div class="text-center text-muted">
                                        <p class="font-italic mt-3">Nenhum produto selecionado</p>
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

<?php $this->load->view('gerais/footer'); ?>