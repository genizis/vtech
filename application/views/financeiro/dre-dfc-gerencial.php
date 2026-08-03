<?php $this->load->view('gerais/header' , $menu); ?>
<?php $this->load->view('gerais/menu', $menu); ?>

<section>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('visao-geral') ?>">Visão Geral</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('financeiro') ?>">Financeiro</a></li>
            <li class="breadcrumb-item active">DRE e DFC Gerencial</a></li>
        </ol>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card  mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <a href="<?= base_url("relatorios/dre-dfc-gerencial/{$ano_anterior}") ?>"
                                            class="btn btn-secondary link-load"><i class="fas fa-angle-left"></i></a>
                                    </div>
                                    <input type="text" class="form-control search text-center"
                                        value="<?= $ano ?>" readonly>
                                    <div class="input-group-append">
                                        <a href="<?= base_url("relatorios/dre-dfc-gerencial/{$ano_seguinte}") ?>"
                                            class="btn btn-secondary link-load"><i class="fas fa-angle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="dre-tab" data-toggle="tab" href="#dre" role="tab"
                            aria-controls="dre" aria-selected="true">DRE Gerencial</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link disabled" id="dfc-tab" data-toggle="tab" href="#dfc" role="tab"
                            aria-controls="dfc" aria-selected="false">DFC Gerencial</a>
                    </li>
                </ul>
                <div class="card  mb-5">
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <table class="table table-bordered table-reporte small2">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">DRE</th>
                                            <th scope="col" class="text-right">Jan</th>
                                            <th scope="col" class="text-right">Fev</th>
                                            <th scope="col" class="text-right">Mar</th>
                                            <th scope="col" class="text-right">Abr</th>
                                            <th scope="col" class="text-right">Mai</th>
                                            <th scope="col" class="text-right">Jun</th>
                                            <th scope="col" class="text-right">Jul</th>
                                            <th scope="col" class="text-right">Ago</th>
                                            <th scope="col" class="text-right">Set</th>
                                            <th scope="col" class="text-right">Out</th>
                                            <th scope="col" class="text-right">Nov</th>
                                            <th scope="col" class="text-right">Dez</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="bg-light">
                                            <th scope="row">Receita</th>    
                                            <th scope="row" class="text-right">R$ <?= @number_format($dre_receita[0]->total, 2, ',', '.') ?></th>
                                            <th scope="row" class="text-right">R$ <?= @number_format($dre_receita[1]->total, 2, ',', '.') ?></th>    
                                            <th scope="row" class="text-right">R$ <?= @number_format($dre_receita[2]->total, 2, ',', '.') ?></th> 
                                            <th scope="row" class="text-right">R$ <?= @number_format($dre_receita[3]->total, 2, ',', '.') ?></th>
                                            <th scope="row" class="text-right">R$ <?= @number_format($dre_receita[4]->total, 2, ',', '.') ?></th>
                                            <th scope="row" class="text-right">R$ <?= @number_format($dre_receita[5]->total, 2, ',', '.') ?></th>
                                            <th scope="row" class="text-right">R$ <?= @number_format($dre_receita[6]->total, 2, ',', '.') ?></th>
                                            <th scope="row" class="text-right">R$ <?= @number_format($dre_receita[7]->total, 2, ',', '.') ?></th>
                                            <th scope="row" class="text-right">R$ <?= @number_format($dre_receita[8]->total, 2, ',', '.') ?></th>
                                            <th scope="row" class="text-right">R$ <?= @number_format($dre_receita[9]->total, 2, ',', '.') ?></th>
                                            <th scope="row" class="text-right">R$ <?= @number_format($dre_receita[10]->total, 2, ',', '.') ?></th>
                                            <th scope="row" class="text-right">R$ <?= @number_format($dre_receita[11]->total, 2, ',', '.') ?></th>
                                        </tr>
                                        <tr>
                                            <td>(-) Deduções (Impostos e Devoluções)</td>    
                                            <td class="text-right <?php if($dre_deducoes[0]->total > 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_deducoes[0]->total, 2, ',', '.') ?></td>
                                            <td class="text-right <?php if($dre_deducoes[1]->total > 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_deducoes[1]->total, 2, ',', '.') ?></td>    
                                            <td class="text-right <?php if($dre_deducoes[2]->total > 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_deducoes[2]->total, 2, ',', '.') ?></td> 
                                            <td class="text-right <?php if($dre_deducoes[3]->total > 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_deducoes[3]->total, 2, ',', '.') ?></td>
                                            <td class="text-right <?php if($dre_deducoes[4]->total > 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_deducoes[4]->total, 2, ',', '.') ?></td>
                                            <td class="text-right <?php if($dre_deducoes[5]->total > 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_deducoes[5]->total, 2, ',', '.') ?></td>
                                            <td class="text-right <?php if($dre_deducoes[6]->total > 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_deducoes[6]->total, 2, ',', '.') ?></td>
                                            <td class="text-right <?php if($dre_deducoes[7]->total > 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_deducoes[7]->total, 2, ',', '.') ?></td>
                                            <td class="text-right <?php if($dre_deducoes[8]->total > 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_deducoes[8]->total, 2, ',', '.') ?></td>
                                            <td class="text-right <?php if($dre_deducoes[9]->total > 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_deducoes[9]->total, 2, ',', '.') ?></td>
                                            <td class="text-right <?php if($dre_deducoes[10]->total > 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_deducoes[10]->total, 2, ',', '.') ?></td>
                                            <td class="text-right <?php if($dre_deducoes[11]->total > 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_deducoes[11]->total, 2, ',', '.') ?></td>
                                        </tr>
                                        <tr class="bg-light">
                                            <th scope="row">(=) Receita Líquida de Vendas</th>    
                                            <th scope="row" class="text-right <?php if(($dre_receita[0]->total - $dre_deducoes[0]->total) < 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_receita[0]->total - $dre_deducoes[0]->total, 2, ',', '.') ?></th>
                                            <th scope="row" class="text-right <?php if(($dre_receita[1]->total - $dre_deducoes[1]->total) < 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_receita[1]->total - $dre_deducoes[1]->total, 2, ',', '.') ?></th>    
                                            <th scope="row" class="text-right <?php if(($dre_receita[2]->total - $dre_deducoes[2]->total) < 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_receita[2]->total - $dre_deducoes[2]->total, 2, ',', '.') ?></th> 
                                            <th scope="row" class="text-right <?php if(($dre_receita[3]->total - $dre_deducoes[3]->total) < 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_receita[3]->total - $dre_deducoes[3]->total, 2, ',', '.') ?></th>
                                            <th scope="row" class="text-right <?php if(($dre_receita[4]->total - $dre_deducoes[4]->total) < 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_receita[4]->total - $dre_deducoes[4]->total, 2, ',', '.') ?></th>
                                            <th scope="row" class="text-right <?php if(($dre_receita[5]->total - $dre_deducoes[5]->total) < 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_receita[5]->total - $dre_deducoes[5]->total, 2, ',', '.') ?></th>
                                            <th scope="row" class="text-right <?php if(($dre_receita[6]->total - $dre_deducoes[6]->total) < 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_receita[6]->total - $dre_deducoes[6]->total, 2, ',', '.') ?></th>
                                            <th scope="row" class="text-right <?php if(($dre_receita[7]->total - $dre_deducoes[7]->total) < 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_receita[7]->total - $dre_deducoes[7]->total, 2, ',', '.') ?></th>
                                            <th scope="row" class="text-right <?php if(($dre_receita[8]->total - $dre_deducoes[8]->total) < 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_receita[8]->total - $dre_deducoes[8]->total, 2, ',', '.') ?></th>
                                            <th scope="row" class="text-right <?php if(($dre_receita[9]->total - $dre_deducoes[9]->total) < 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_receita[9]->total - $dre_deducoes[9]->total, 2, ',', '.') ?></th>
                                            <th scope="row" class="text-right <?php if(($dre_receita[10]->total - $dre_deducoes[10]->total) < 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_receita[10]->total - $dre_deducoes[10]->total, 2, ',', '.') ?></th>
                                            <th scope="row" class="text-right <?php if(($dre_receita[11]->total - $dre_deducoes[11]->total) < 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_receita[11]->total - $dre_deducoes[11]->total, 2, ',', '.') ?></th>
                                        </tr>
                                        <tr>
                                            <td>(-) Custos sobre Venda</td>    
                                            <td class="text-right <?php if($dre_custos[0]->total > 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_custos[0]->total, 2, ',', '.') ?></td>
                                            <td class="text-right <?php if($dre_custos[1]->total > 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_custos[1]->total, 2, ',', '.') ?></td>    
                                            <td class="text-right <?php if($dre_custos[2]->total > 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_custos[2]->total, 2, ',', '.') ?></td> 
                                            <td class="text-right <?php if($dre_custos[3]->total > 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_custos[3]->total, 2, ',', '.') ?></td>
                                            <td class="text-right <?php if($dre_custos[4]->total > 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_custos[4]->total, 2, ',', '.') ?></td>
                                            <td class="text-right <?php if($dre_custos[5]->total > 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_custos[5]->total, 2, ',', '.') ?></td>
                                            <td class="text-right <?php if($dre_custos[6]->total > 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_custos[6]->total, 2, ',', '.') ?></td>
                                            <td class="text-right <?php if($dre_custos[7]->total > 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_custos[7]->total, 2, ',', '.') ?></td>
                                            <td class="text-right <?php if($dre_custos[8]->total > 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_custos[8]->total, 2, ',', '.') ?></td>
                                            <td class="text-right <?php if($dre_custos[9]->total > 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_custos[9]->total, 2, ',', '.') ?></td>
                                            <td class="text-right <?php if($dre_custos[10]->total > 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_custos[10]->total, 2, ',', '.') ?></td>
                                            <td class="text-right <?php if($dre_custos[11]->total > 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_custos[11]->total, 2, ',', '.') ?></td>
                                        </tr>
                                        <tr class="bg-light">
                                            <th scope="row">(=) Resultado Operacional</th>    
                                            <th scope="row" class="text-right <?php if(($dre_receita[0]->total - $dre_deducoes[0]->total - $dre_custos[0]->total) < 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_receita[0]->total - $dre_deducoes[0]->total - $dre_custos[0]->total, 2, ',', '.') ?></th>
                                            <th scope="row" class="text-right <?php if(($dre_receita[1]->total - $dre_deducoes[1]->total - $dre_custos[1]->total) < 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_receita[1]->total - $dre_deducoes[1]->total - $dre_custos[1]->total, 2, ',', '.') ?></th>    
                                            <th scope="row" class="text-right <?php if(($dre_receita[2]->total - $dre_deducoes[2]->total - $dre_custos[2]->total) < 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_receita[2]->total - $dre_deducoes[2]->total - $dre_custos[2]->total, 2, ',', '.') ?></th> 
                                            <th scope="row" class="text-right <?php if(($dre_receita[3]->total - $dre_deducoes[3]->total - $dre_custos[3]->total) < 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_receita[3]->total - $dre_deducoes[3]->total - $dre_custos[3]->total, 2, ',', '.') ?></th>
                                            <th scope="row" class="text-right <?php if(($dre_receita[4]->total - $dre_deducoes[4]->total - $dre_custos[4]->total) < 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_receita[4]->total - $dre_deducoes[4]->total - $dre_custos[4]->total, 2, ',', '.') ?></th>
                                            <th scope="row" class="text-right <?php if(($dre_receita[5]->total - $dre_deducoes[5]->total - $dre_custos[5]->total) < 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_receita[5]->total - $dre_deducoes[5]->total - $dre_custos[5]->total, 2, ',', '.') ?></th>
                                            <th scope="row" class="text-right <?php if(($dre_receita[6]->total - $dre_deducoes[6]->total - $dre_custos[6]->total) < 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_receita[6]->total - $dre_deducoes[6]->total - $dre_custos[6]->total, 2, ',', '.') ?></th>
                                            <th scope="row" class="text-right <?php if(($dre_receita[7]->total - $dre_deducoes[7]->total - $dre_custos[7]->total) < 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_receita[7]->total - $dre_deducoes[7]->total - $dre_custos[7]->total, 2, ',', '.') ?></th>
                                            <th scope="row" class="text-right <?php if(($dre_receita[8]->total - $dre_deducoes[8]->total - $dre_custos[8]->total) < 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_receita[8]->total - $dre_deducoes[8]->total - $dre_custos[8]->total, 2, ',', '.') ?></th>
                                            <th scope="row" class="text-right <?php if(($dre_receita[9]->total - $dre_deducoes[9]->total - $dre_custos[9]->total) < 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_receita[9]->total - $dre_deducoes[9]->total - $dre_custos[9]->total, 2, ',', '.') ?></th>
                                            <th scope="row" class="text-right <?php if(($dre_receita[10]->total - $dre_deducoes[10]->total - $dre_custos[10]->total) < 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_receita[10]->total - $dre_deducoes[10]->total - $dre_custos[10]->total, 2, ',', '.') ?></th>
                                            <th scope="row" class="text-right <?php if(($dre_receita[11]->total - $dre_deducoes[11]->total - $dre_custos[11]->total) < 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_receita[11]->total - $dre_deducoes[11]->total - $dre_custos[11]->total, 2, ',', '.') ?></th>
                                        </tr>
                                        <tr>
                                            <td>(-) Despesas Operacionais</td>    
                                            <td class="text-right <?php if($dre_desp_oper[0]->total > 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_desp_oper[0]->total, 2, ',', '.') ?></td>
                                            <td class="text-right <?php if($dre_desp_oper[1]->total > 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_desp_oper[1]->total, 2, ',', '.') ?></td>    
                                            <td class="text-right <?php if($dre_desp_oper[2]->total > 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_desp_oper[2]->total, 2, ',', '.') ?></td> 
                                            <td class="text-right <?php if($dre_desp_oper[3]->total > 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_desp_oper[3]->total, 2, ',', '.') ?></td>
                                            <td class="text-right <?php if($dre_desp_oper[4]->total > 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_desp_oper[4]->total, 2, ',', '.') ?></td>
                                            <td class="text-right <?php if($dre_desp_oper[5]->total > 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_desp_oper[5]->total, 2, ',', '.') ?></td>
                                            <td class="text-right <?php if($dre_desp_oper[6]->total > 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_desp_oper[6]->total, 2, ',', '.') ?></td>
                                            <td class="text-right <?php if($dre_desp_oper[7]->total > 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_desp_oper[7]->total, 2, ',', '.') ?></td>
                                            <td class="text-right <?php if($dre_desp_oper[8]->total > 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_desp_oper[8]->total, 2, ',', '.') ?></td>
                                            <td class="text-right <?php if($dre_desp_oper[9]->total > 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_desp_oper[9]->total, 2, ',', '.') ?></td>
                                            <td class="text-right <?php if($dre_desp_oper[10]->total > 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_desp_oper[10]->total, 2, ',', '.') ?></td>
                                            <td class="text-right <?php if($dre_desp_oper[11]->total > 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_desp_oper[11]->total, 2, ',', '.') ?></td>
                                        </tr>
                                        <tr class="bg-light">
                                            <th scope="row">(=) Resultado Operacional Líquido</th>    
                                            <th scope="row" class="text-right <?php if(($dre_receita[0]->total - $dre_deducoes[0]->total - $dre_custos[0]->total - $dre_desp_oper[0]->total) < 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_receita[0]->total - $dre_deducoes[0]->total - $dre_custos[0]->total - $dre_desp_oper[0]->total, 2, ',', '.') ?></th>
                                            <th scope="row" class="text-right <?php if(($dre_receita[1]->total - $dre_deducoes[1]->total - $dre_custos[1]->total - $dre_desp_oper[1]->total) < 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_receita[1]->total - $dre_deducoes[1]->total - $dre_custos[1]->total - $dre_desp_oper[1]->total, 2, ',', '.') ?></th>    
                                            <th scope="row" class="text-right <?php if(($dre_receita[2]->total - $dre_deducoes[2]->total - $dre_custos[2]->total - $dre_desp_oper[2]->total) < 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_receita[2]->total - $dre_deducoes[2]->total - $dre_custos[2]->total - $dre_desp_oper[2]->total, 2, ',', '.') ?></th> 
                                            <th scope="row" class="text-right <?php if(($dre_receita[3]->total - $dre_deducoes[3]->total - $dre_custos[3]->total - $dre_desp_oper[3]->total) < 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_receita[3]->total - $dre_deducoes[3]->total - $dre_custos[3]->total - $dre_desp_oper[3]->total, 2, ',', '.') ?></th>
                                            <th scope="row" class="text-right <?php if(($dre_receita[4]->total - $dre_deducoes[4]->total - $dre_custos[4]->total - $dre_desp_oper[4]->total) < 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_receita[4]->total - $dre_deducoes[4]->total - $dre_custos[4]->total - $dre_desp_oper[4]->total, 2, ',', '.') ?></th>
                                            <th scope="row" class="text-right <?php if(($dre_receita[5]->total - $dre_deducoes[5]->total - $dre_custos[5]->total - $dre_desp_oper[5]->total) < 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_receita[5]->total - $dre_deducoes[5]->total - $dre_custos[5]->total - $dre_desp_oper[5]->total, 2, ',', '.') ?></th>
                                            <th scope="row" class="text-right <?php if(($dre_receita[6]->total - $dre_deducoes[6]->total - $dre_custos[6]->total - $dre_desp_oper[6]->total) < 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_receita[6]->total - $dre_deducoes[6]->total - $dre_custos[6]->total - $dre_desp_oper[6]->total, 2, ',', '.') ?></th>
                                            <th scope="row" class="text-right <?php if(($dre_receita[7]->total - $dre_deducoes[7]->total - $dre_custos[7]->total - $dre_desp_oper[7]->total) < 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_receita[7]->total - $dre_deducoes[7]->total - $dre_custos[7]->total - $dre_desp_oper[7]->total, 2, ',', '.') ?></th>
                                            <th scope="row" class="text-right <?php if(($dre_receita[8]->total - $dre_deducoes[8]->total - $dre_custos[8]->total - $dre_desp_oper[8]->total) < 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_receita[8]->total - $dre_deducoes[8]->total - $dre_custos[8]->total - $dre_desp_oper[8]->total, 2, ',', '.') ?></th>
                                            <th scope="row" class="text-right <?php if(($dre_receita[9]->total - $dre_deducoes[9]->total - $dre_custos[9]->total - $dre_desp_oper[9]->total) < 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_receita[9]->total - $dre_deducoes[9]->total - $dre_custos[9]->total - $dre_desp_oper[9]->total, 2, ',', '.') ?></th>
                                            <th scope="row" class="text-right <?php if(($dre_receita[10]->total - $dre_deducoes[10]->total - $dre_custos[10]->total - $dre_desp_oper[10]->total) < 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_receita[10]->total - $dre_deducoes[10]->total - $dre_custos[10]->total - $dre_desp_oper[10]->total, 2, ',', '.') ?></th>
                                            <th scope="row" class="text-right <?php if(($dre_receita[11]->total - $dre_deducoes[11]->total - $dre_custos[11]->total - $dre_desp_oper[11]->total) < 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_receita[11]->total - $dre_deducoes[11]->total - $dre_custos[11]->total - $dre_desp_oper[11]->total, 2, ',', '.') ?></th>
                                        </tr>
                                        <tr>
                                            <td>(+) Outras Receitas não Operacionais</td>    
                                            <td class="text-right <?php if($dre_out_rece_noper[0]->total > 0) echo "text-teal"; ?>">R$ <?= @number_format($dre_out_rece_noper[0]->total, 2, ',', '.') ?></td>
                                            <td class="text-right <?php if($dre_out_rece_noper[1]->total > 0) echo "text-teal"; ?>">R$ <?= @number_format($dre_out_rece_noper[1]->total, 2, ',', '.') ?></td>    
                                            <td class="text-right <?php if($dre_out_rece_noper[2]->total > 0) echo "text-teal"; ?>">R$ <?= @number_format($dre_out_rece_noper[2]->total, 2, ',', '.') ?></td> 
                                            <td class="text-right <?php if($dre_out_rece_noper[3]->total > 0) echo "text-teal"; ?>">R$ <?= @number_format($dre_out_rece_noper[3]->total, 2, ',', '.') ?></td>
                                            <td class="text-right <?php if($dre_out_rece_noper[4]->total > 0) echo "text-teal"; ?>">R$ <?= @number_format($dre_out_rece_noper[4]->total, 2, ',', '.') ?></td>
                                            <td class="text-right <?php if($dre_out_rece_noper[5]->total > 0) echo "text-teal"; ?>">R$ <?= @number_format($dre_out_rece_noper[5]->total, 2, ',', '.') ?></td>
                                            <td class="text-right <?php if($dre_out_rece_noper[6]->total > 0) echo "text-teal"; ?>">R$ <?= @number_format($dre_out_rece_noper[6]->total, 2, ',', '.') ?></td>
                                            <td class="text-right <?php if($dre_out_rece_noper[7]->total > 0) echo "text-teal"; ?>">R$ <?= @number_format($dre_out_rece_noper[7]->total, 2, ',', '.') ?></td>
                                            <td class="text-right <?php if($dre_out_rece_noper[8]->total > 0) echo "text-teal"; ?>">R$ <?= @number_format($dre_out_rece_noper[8]->total, 2, ',', '.') ?></td>
                                            <td class="text-right <?php if($dre_out_rece_noper[9]->total > 0) echo "text-teal"; ?>">R$ <?= @number_format($dre_out_rece_noper[9]->total, 2, ',', '.') ?></td>
                                            <td class="text-right <?php if($dre_out_rece_noper[10]->total > 0) echo "text-teal"; ?>">R$ <?= @number_format($dre_out_rece_noper[10]->total, 2, ',', '.') ?></td>
                                            <td class="text-right <?php if($dre_out_rece_noper[11]->total > 0) echo "text-teal"; ?>">R$ <?= @number_format($dre_out_rece_noper[11]->total, 2, ',', '.') ?></td>
                                        </tr>
                                        <tr>
                                            <td>(-) Outras Despesas não Operacionais</td>    
                                            <td class="text-right <?php if($dre_out_desp_noper[0]->total > 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_out_desp_noper[0]->total, 2, ',', '.') ?></td>
                                            <td class="text-right <?php if($dre_out_desp_noper[1]->total > 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_out_desp_noper[1]->total, 2, ',', '.') ?></td>    
                                            <td class="text-right <?php if($dre_out_desp_noper[2]->total > 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_out_desp_noper[2]->total, 2, ',', '.') ?></td> 
                                            <td class="text-right <?php if($dre_out_desp_noper[3]->total > 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_out_desp_noper[3]->total, 2, ',', '.') ?></td>
                                            <td class="text-right <?php if($dre_out_desp_noper[4]->total > 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_out_desp_noper[4]->total, 2, ',', '.') ?></td>
                                            <td class="text-right <?php if($dre_out_desp_noper[5]->total > 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_out_desp_noper[5]->total, 2, ',', '.') ?></td>
                                            <td class="text-right <?php if($dre_out_desp_noper[6]->total > 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_out_desp_noper[6]->total, 2, ',', '.') ?></td>
                                            <td class="text-right <?php if($dre_out_desp_noper[7]->total > 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_out_desp_noper[7]->total, 2, ',', '.') ?></td>
                                            <td class="text-right <?php if($dre_out_desp_noper[8]->total > 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_out_desp_noper[8]->total, 2, ',', '.') ?></td>
                                            <td class="text-right <?php if($dre_out_desp_noper[9]->total > 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_out_desp_noper[9]->total, 2, ',', '.') ?></td>
                                            <td class="text-right <?php if($dre_out_desp_noper[10]->total > 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_out_desp_noper[10]->total, 2, ',', '.') ?></td>
                                            <td class="text-right <?php if($dre_out_desp_noper[11]->total > 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_out_desp_noper[11]->total, 2, ',', '.') ?></td>
                                        </tr>
                                        <tr class="bg-light">
                                            <th scope="row">EBTIDA</th>    
                                            <th scope="row" class="text-right <?php if(($dre_receita[0]->total - $dre_deducoes[0]->total - $dre_custos[0]->total - $dre_desp_oper[0]->total + $dre_out_rece_noper[0]->total - $dre_out_desp_noper[0]->total) < 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_receita[0]->total - $dre_deducoes[0]->total - $dre_custos[0]->total - $dre_desp_oper[0]->total + $dre_out_rece_noper[0]->total - $dre_out_desp_noper[0]->total, 2, ',', '.') ?></th>
                                            <th scope="row" class="text-right <?php if(($dre_receita[1]->total - $dre_deducoes[1]->total - $dre_custos[1]->total - $dre_desp_oper[1]->total + $dre_out_rece_noper[1]->total - $dre_out_desp_noper[1]->total) < 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_receita[1]->total - $dre_deducoes[1]->total - $dre_custos[1]->total - $dre_desp_oper[1]->total + $dre_out_rece_noper[1]->total - $dre_out_desp_noper[1]->total, 2, ',', '.') ?></th>    
                                            <th scope="row" class="text-right <?php if(($dre_receita[2]->total - $dre_deducoes[2]->total - $dre_custos[2]->total - $dre_desp_oper[2]->total + $dre_out_rece_noper[2]->total - $dre_out_desp_noper[2]->total) < 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_receita[2]->total - $dre_deducoes[2]->total - $dre_custos[2]->total - $dre_desp_oper[2]->total + $dre_out_rece_noper[2]->total - $dre_out_desp_noper[2]->total, 2, ',', '.') ?></th> 
                                            <th scope="row" class="text-right <?php if(($dre_receita[3]->total - $dre_deducoes[3]->total - $dre_custos[3]->total - $dre_desp_oper[3]->total + $dre_out_rece_noper[3]->total - $dre_out_desp_noper[3]->total) < 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_receita[3]->total - $dre_deducoes[3]->total - $dre_custos[3]->total - $dre_desp_oper[3]->total + $dre_out_rece_noper[3]->total - $dre_out_desp_noper[3]->total, 2, ',', '.') ?></th>
                                            <th scope="row" class="text-right <?php if(($dre_receita[4]->total - $dre_deducoes[4]->total - $dre_custos[4]->total - $dre_desp_oper[4]->total + $dre_out_rece_noper[4]->total - $dre_out_desp_noper[4]->total) < 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_receita[4]->total - $dre_deducoes[4]->total - $dre_custos[4]->total - $dre_desp_oper[4]->total + $dre_out_rece_noper[4]->total - $dre_out_desp_noper[4]->total, 2, ',', '.') ?></th>
                                            <th scope="row" class="text-right <?php if(($dre_receita[5]->total - $dre_deducoes[5]->total - $dre_custos[5]->total - $dre_desp_oper[5]->total + $dre_out_rece_noper[5]->total - $dre_out_desp_noper[5]->total) < 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_receita[5]->total - $dre_deducoes[5]->total - $dre_custos[5]->total - $dre_desp_oper[5]->total + $dre_out_rece_noper[5]->total - $dre_out_desp_noper[5]->total, 2, ',', '.') ?></th>
                                            <th scope="row" class="text-right <?php if(($dre_receita[6]->total - $dre_deducoes[6]->total - $dre_custos[6]->total - $dre_desp_oper[6]->total + $dre_out_rece_noper[6]->total - $dre_out_desp_noper[6]->total) < 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_receita[6]->total - $dre_deducoes[6]->total - $dre_custos[6]->total - $dre_desp_oper[6]->total + $dre_out_rece_noper[6]->total - $dre_out_desp_noper[6]->total, 2, ',', '.') ?></th>
                                            <th scope="row" class="text-right <?php if(($dre_receita[7]->total - $dre_deducoes[7]->total - $dre_custos[7]->total - $dre_desp_oper[7]->total + $dre_out_rece_noper[7]->total - $dre_out_desp_noper[7]->total) < 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_receita[7]->total - $dre_deducoes[7]->total - $dre_custos[7]->total - $dre_desp_oper[7]->total + $dre_out_rece_noper[7]->total - $dre_out_desp_noper[7]->total, 2, ',', '.') ?></th>
                                            <th scope="row" class="text-right <?php if(($dre_receita[8]->total - $dre_deducoes[8]->total - $dre_custos[8]->total - $dre_desp_oper[8]->total + $dre_out_rece_noper[8]->total - $dre_out_desp_noper[8]->total) < 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_receita[8]->total - $dre_deducoes[8]->total - $dre_custos[8]->total - $dre_desp_oper[8]->total + $dre_out_rece_noper[8]->total - $dre_out_desp_noper[8]->total, 2, ',', '.') ?></th>
                                            <th scope="row" class="text-right <?php if(($dre_receita[9]->total - $dre_deducoes[9]->total - $dre_custos[9]->total - $dre_desp_oper[9]->total + $dre_out_rece_noper[9]->total - $dre_out_desp_noper[9]->total) < 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_receita[9]->total - $dre_deducoes[9]->total - $dre_custos[9]->total - $dre_desp_oper[9]->total + $dre_out_rece_noper[9]->total - $dre_out_desp_noper[9]->total, 2, ',', '.') ?></th>
                                            <th scope="row" class="text-right <?php if(($dre_receita[10]->total - $dre_deducoes[10]->total - $dre_custos[10]->total - $dre_desp_oper[10]->total + $dre_out_rece_noper[10]->total - $dre_out_desp_noper[10]->total) < 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_receita[10]->total - $dre_deducoes[10]->total - $dre_custos[10]->total - $dre_desp_oper[10]->total + $dre_out_rece_noper[10]->total - $dre_out_desp_noper[10]->total, 2, ',', '.') ?></th>
                                            <th scope="row" class="text-right <?php if(($dre_receita[11]->total - $dre_deducoes[11]->total - $dre_custos[11]->total - $dre_desp_oper[11]->total + $dre_out_rece_noper[11]->total - $dre_out_desp_noper[11]->total) < 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_receita[11]->total - $dre_deducoes[11]->total - $dre_custos[11]->total - $dre_desp_oper[11]->total + $dre_out_rece_noper[11]->total - $dre_out_desp_noper[11]->total, 2, ',', '.') ?></th>
                                        </tr>
                                        <tr>
                                            <td>(-) Investimentos</td>    
                                            <td class="text-right <?php if($dre_investimentos[0]->total > 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_investimentos[0]->total, 2, ',', '.') ?></td>
                                            <td class="text-right <?php if($dre_investimentos[1]->total > 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_investimentos[1]->total, 2, ',', '.') ?></td>    
                                            <td class="text-right <?php if($dre_investimentos[2]->total > 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_investimentos[2]->total, 2, ',', '.') ?></td> 
                                            <td class="text-right <?php if($dre_investimentos[3]->total > 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_investimentos[3]->total, 2, ',', '.') ?></td>
                                            <td class="text-right <?php if($dre_investimentos[4]->total > 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_investimentos[4]->total, 2, ',', '.') ?></td>
                                            <td class="text-right <?php if($dre_investimentos[5]->total > 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_investimentos[5]->total, 2, ',', '.') ?></td>
                                            <td class="text-right <?php if($dre_investimentos[6]->total > 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_investimentos[6]->total, 2, ',', '.') ?></td>
                                            <td class="text-right <?php if($dre_investimentos[7]->total > 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_investimentos[7]->total, 2, ',', '.') ?></td>
                                            <td class="text-right <?php if($dre_investimentos[8]->total > 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_investimentos[8]->total, 2, ',', '.') ?></td>
                                            <td class="text-right <?php if($dre_investimentos[9]->total > 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_investimentos[9]->total, 2, ',', '.') ?></td>
                                            <td class="text-right <?php if($dre_investimentos[10]->total > 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_investimentos[10]->total, 2, ',', '.') ?></td>
                                            <td class="text-right <?php if($dre_investimentos[11]->total > 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_investimentos[11]->total, 2, ',', '.') ?></td>
                                        </tr>
                                        <tr class="bg-teal-light">
                                            <th scope="row">(=) Lucro Líquido</th>    
                                            <th scope="row" class="text-right <?php if(($dre_receita[0]->total - $dre_deducoes[0]->total - $dre_custos[0]->total - $dre_desp_oper[0]->total + $dre_out_rece_noper[0]->total - $dre_out_desp_noper[0]->total - $dre_investimentos[0]->total) < 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_receita[0]->total - $dre_deducoes[0]->total - $dre_custos[0]->total - $dre_desp_oper[0]->total + $dre_out_rece_noper[0]->total - $dre_out_desp_noper[0]->total - $dre_investimentos[0]->total, 2, ',', '.') ?></th>
                                            <th scope="row" class="text-right <?php if(($dre_receita[1]->total - $dre_deducoes[1]->total - $dre_custos[1]->total - $dre_desp_oper[1]->total + $dre_out_rece_noper[1]->total - $dre_out_desp_noper[1]->total - $dre_investimentos[1]->total) < 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_receita[1]->total - $dre_deducoes[1]->total - $dre_custos[1]->total - $dre_desp_oper[1]->total + $dre_out_rece_noper[1]->total - $dre_out_desp_noper[1]->total - $dre_investimentos[1]->total, 2, ',', '.') ?></th>    
                                            <th scope="row" class="text-right <?php if(($dre_receita[2]->total - $dre_deducoes[2]->total - $dre_custos[2]->total - $dre_desp_oper[2]->total + $dre_out_rece_noper[2]->total - $dre_out_desp_noper[2]->total - $dre_investimentos[2]->total) < 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_receita[2]->total - $dre_deducoes[2]->total - $dre_custos[2]->total - $dre_desp_oper[2]->total + $dre_out_rece_noper[2]->total - $dre_out_desp_noper[2]->total - $dre_investimentos[2]->total, 2, ',', '.') ?></th> 
                                            <th scope="row" class="text-right <?php if(($dre_receita[3]->total - $dre_deducoes[3]->total - $dre_custos[3]->total - $dre_desp_oper[3]->total + $dre_out_rece_noper[3]->total - $dre_out_desp_noper[3]->total - $dre_investimentos[3]->total) < 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_receita[3]->total - $dre_deducoes[3]->total - $dre_custos[3]->total - $dre_desp_oper[3]->total + $dre_out_rece_noper[3]->total - $dre_out_desp_noper[3]->total - $dre_investimentos[3]->total, 2, ',', '.') ?></th>
                                            <th scope="row" class="text-right <?php if(($dre_receita[4]->total - $dre_deducoes[4]->total - $dre_custos[4]->total - $dre_desp_oper[4]->total + $dre_out_rece_noper[4]->total - $dre_out_desp_noper[4]->total - $dre_investimentos[4]->total) < 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_receita[4]->total - $dre_deducoes[4]->total - $dre_custos[4]->total - $dre_desp_oper[4]->total + $dre_out_rece_noper[4]->total - $dre_out_desp_noper[4]->total - $dre_investimentos[4]->total, 2, ',', '.') ?></th>
                                            <th scope="row" class="text-right <?php if(($dre_receita[5]->total - $dre_deducoes[5]->total - $dre_custos[5]->total - $dre_desp_oper[5]->total + $dre_out_rece_noper[5]->total - $dre_out_desp_noper[5]->total - $dre_investimentos[5]->total) < 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_receita[5]->total - $dre_deducoes[5]->total - $dre_custos[5]->total - $dre_desp_oper[5]->total + $dre_out_rece_noper[5]->total - $dre_out_desp_noper[5]->total - $dre_investimentos[5]->total, 2, ',', '.') ?></th>
                                            <th scope="row" class="text-right <?php if(($dre_receita[6]->total - $dre_deducoes[6]->total - $dre_custos[6]->total - $dre_desp_oper[6]->total + $dre_out_rece_noper[6]->total - $dre_out_desp_noper[6]->total - $dre_investimentos[6]->total) < 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_receita[6]->total - $dre_deducoes[6]->total - $dre_custos[6]->total - $dre_desp_oper[6]->total + $dre_out_rece_noper[6]->total - $dre_out_desp_noper[6]->total - $dre_investimentos[6]->total, 2, ',', '.') ?></th>
                                            <th scope="row" class="text-right <?php if(($dre_receita[7]->total - $dre_deducoes[7]->total - $dre_custos[7]->total - $dre_desp_oper[7]->total + $dre_out_rece_noper[7]->total - $dre_out_desp_noper[7]->total - $dre_investimentos[7]->total) < 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_receita[7]->total - $dre_deducoes[7]->total - $dre_custos[7]->total - $dre_desp_oper[7]->total + $dre_out_rece_noper[7]->total - $dre_out_desp_noper[7]->total - $dre_investimentos[7]->total, 2, ',', '.') ?></th>
                                            <th scope="row" class="text-right <?php if(($dre_receita[8]->total - $dre_deducoes[8]->total - $dre_custos[8]->total - $dre_desp_oper[8]->total + $dre_out_rece_noper[8]->total - $dre_out_desp_noper[8]->total - $dre_investimentos[8]->total) < 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_receita[8]->total - $dre_deducoes[8]->total - $dre_custos[8]->total - $dre_desp_oper[8]->total + $dre_out_rece_noper[8]->total - $dre_out_desp_noper[8]->total - $dre_investimentos[8]->total, 2, ',', '.') ?></th>
                                            <th scope="row" class="text-right <?php if(($dre_receita[9]->total - $dre_deducoes[9]->total - $dre_custos[9]->total - $dre_desp_oper[9]->total + $dre_out_rece_noper[9]->total - $dre_out_desp_noper[9]->total - $dre_investimentos[9]->total) < 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_receita[9]->total - $dre_deducoes[9]->total - $dre_custos[9]->total - $dre_desp_oper[9]->total + $dre_out_rece_noper[9]->total - $dre_out_desp_noper[9]->total - $dre_investimentos[9]->total, 2, ',', '.') ?></th>
                                            <th scope="row" class="text-right <?php if(($dre_receita[10]->total - $dre_deducoes[10]->total - $dre_custos[10]->total - $dre_desp_oper[10]->total + $dre_out_rece_noper[10]->total - $dre_out_desp_noper[10]->total - $dre_investimentos[10]->total) < 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_receita[10]->total - $dre_deducoes[10]->total - $dre_custos[10]->total - $dre_desp_oper[10]->total + $dre_out_rece_noper[10]->total - $dre_out_desp_noper[10]->total - $dre_investimentos[10]->total, 2, ',', '.') ?></th>
                                            <th scope="row" class="text-right <?php if(($dre_receita[11]->total - $dre_deducoes[11]->total - $dre_custos[11]->total - $dre_desp_oper[11]->total + $dre_out_rece_noper[11]->total - $dre_out_desp_noper[11]->total - $dre_investimentos[11]->total) < 0) echo "text-danger"; ?>">R$ <?= @number_format($dre_receita[11]->total - $dre_deducoes[11]->total - $dre_custos[11]->total - $dre_desp_oper[11]->total + $dre_out_rece_noper[11]->total - $dre_out_desp_noper[11]->total - $dre_investimentos[11]->total, 2, ',', '.') ?></th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <table class="table table-bordered table-hover table-reporte small2">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col" class="text-center">Data de Vencimento</th>
                                            <th scope="col">Conta Contábil</th>
                                            <th scope="col">Conta Financeira</th>
                                            <th scope="col" class="text-center">Tíulo</th>
                                            <th scope="col">Descrição</th>
                                            <th scope="col" class="text-center">Parcela</th>
                                            <th scope="col" class="text-center">Valor do Título</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                                <?php if (false == false) { ?>
                                <div class="text-center">
                                    <p class="text-muted mb-0">Nenhuma informação encontrada</p>
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

<script>
$('#inputDataInicio').datepicker({
    uiLibrary: 'bootstrap4'
});
$('#inputDataFim').datepicker({
    uiLibrary: 'bootstrap4'
});
</script>

<?php $this->load->view('gerais/footer'); ?>