<?php $this->load->view('gerais/header' , $menu); ?>
<?php $this->load->view('gerais/menu', $menu); ?>

<section>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('visao-geral') ?>">Visão Geral</a></li>
            <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>estoque/requisicao-material">Requisição de Material</a></li>
            <li class="breadcrumb-item active">Editar Requisição de Material</a></li>
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
                                <?php } $this->session->set_flashdata('erro', ''); ?>
                                <?php if ($this->session->flashdata('sucesso') <> ""){ ?>
                                <div class="alert alert-success alert-dismissible fade show" id="alert" role="alert">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>Muito bem!</strong>
                                    <?= $this->session->flashdata('sucesso') ?>
                                </div>
                                <?php } $this->session->set_flashdata('sucesso', ''); ?>  
                                <form action="<?= base_url("estoque/requisicao-material/editar-requisicao-material/{$requisicao->cod_requisicao_material}") ?>" method="POST" id="RequisicaoMaterial" class="mb-0 needs-validation" novalidate>
                                    <div class="form-row"> 
                                        <div class="form-group col-md-4">
                                            <label for="inputCodRequisicaoMaterial">Código da Requisição de Material</label>
                                            <input type="text" class="form-control" id="inputCodRequisicaoMaterial"
                                                name="CodRequisicaoEstoque" 
                                                value="<?= $requisicao->cod_requisicao_material ?>" readonly>
                                        </div>                                      
                                        <div class="form-group col-md-4">
                                            <label for="inputDataEmissao">Data de Emissão</label>
                                            <input type="text" class="form-control" id="inputDataEmissao"
                                                name="DataEmissao" readonly
                                                value="<?= str_replace('-', '/', date("d-m-Y", strtotime($requisicao->data_emissao))) ?>">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputDataRequisicao">Data da Requisição <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="inputDataRequisicao" <?php if($requisicao->status == 2){ echo "readonly"; } ?>
                                                name="DataRequisicao" value="<?= str_replace('-', '/', date("d-m-Y", strtotime($requisicao->data_requisicao))) ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="inputObservacao">Observações da Requisição de Material</label>
                                            <textarea class="form-control" rows="3" id="inputObservacao" <?php if($requisicao->status == 2){ echo "readonly"; } ?>
                                                name="ObsRequisicaoMaterial"><?= $requisicao->observacoes ?></textarea>
                                        </div>
                                    </div>
                                </form>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h6>Produtos da Requisição</h6>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-xs-12">
                                                <button data-toggle="modal" data-target="#adicionar-produto" type="button" <?php if($requisicao->status == 2){ echo "disabled"; } ?>
                                                        class="btn btn-outline-primary btn-sm"><i class="fas fa-check-circle"></i> Adicionar Produto</button>
                                                <button data-toggle="modal" data-target="#elimina-produto" type="button"
                                                        class="btn btn-outline-danger btn-sm" id="btnExcluir" disabled><i
                                                            class="fas fa-trash-alt"></i>
                                                        Excluir</button>
                                            </div>
                                        </div>
                                        <form action="<?= base_url("estoque/requisicao-material/excluir-produto/{$requisicao->cod_requisicao_material}") ?>"
                                                method="POST" id="DeleteProduto" class="needs-validation mb-0" novalidate>
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th scope="col" class="text-center"><i
                                                                        class="fa-solid fa-check"></i></th>
                                                            <th scope="col">Produto</th>  
                                                            <th scope="col">Lote</th>                                                          
                                                            <th scope="col">Tipo do produto</th>                                                     
                                                            <th scope="col" class="text-right">Quantidade</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody> 
                                                        <?php foreach($lista_produto as $key_produto => $produto) { ?>
                                                        <tr>
                                                            <td>
                                                                <div class="checkbox text-center">
                                                                    <input name="excluir_todos[]" type="checkbox"
                                                                            value="<?= $produto->seq_produto_requisicao_material ?>" 
                                                                    <?php if($requisicao->status == 2){ echo "disabled"; } ?>/>
                                                                </div>
                                                            </td>
                                                            <td scope="row">
                                                                <a href="#" data-toggle="modal" class="text-dark"
                                                                            data-target="#editar-produto<?= $produto->seq_produto_requisicao_material ?>">
                                                                    <?= $produto->cod_produto ?> - <?= $produto->nome_produto ?>
                                                                </a>
                                                            </td>
                                                            <td><?= $produto->cod_lote ?></td>  
                                                            <td><?= $produto->nome_tipo_produto ?></td>                                                              
                                                            <td class="text-right"><?= number_format($produto->quant_requisicao, 3, ',', '.') ?> <?= $produto->cod_unidade_medida ?></td>                                   
                                                        </tr>
                                                        <?php } ?>                                                    
                                                    </tbody>
                                                </table>
                                            </div>
                                            <?php if ($lista_produto == false) { ?>
                                            <div class="text-center text-muted">
                                                <p class="font-italic mt-3">Nenhum produto adicionado
                                                </p>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>                                    
                                    <hr class="mb-3">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button class="btn btn-outline-teal" <?php if($requisicao->status == 2 || $lista_produto == false){ echo "disabled"; } ?>
                                            data-toggle="modal" data-target="#atende-requisicao" type="button"><i class="fas fa-check"></i> Atender Requisição</button>
                                            <button class="btn btn-outline-danger" <?php if($requisicao->status == 1){ echo "disabled"; } ?>
                                            data-toggle="modal" data-target="#estorna-requisicao" type="button"><i class="fas fa-undo"></i> Estornar Requisição</button>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row float-right">
                                                <div class="col-md-12">
                                                    <button type="submit" form="RequisicaoMaterial" class="btn btn-primary"
                                                        name="Opcao" value="salvar" <?php if($requisicao->status == 2){ echo "disabled"; } ?>><i class="fas fa-save"></i> Salvar</button>                                            
                                                    <a href="<?php echo base_url() ?>estoque/requisicao-material"
                                                        class="btn btn-secondary">Cancelar</a>
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
        </div>
    </div>
</section>

<div class="modal fade" id="adicionar-produto">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Adicionar produto</h5>
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
                                            action="<?= base_url("estoque/requisicao-material/adicionar-produto/{$requisicao->cod_requisicao_material}") ?>" 
                                            method="post" id='formAdicionarProduto'>
                                            <div class="form-row">                                        
                                                <div class="form-group col-md-12">
                                                    <label for="inputProdutoRequisicao">Produto de Requisição <span class="text-danger">*</span></label>
                                                    <select id="inputProdutoRequisicao" class="selectpicker show-tick form-control"
                                                        data-live-search="true" data-actions-box="true" data-style="btn-input-primary"
                                                        title="Selecione um Produto" name="CodProduto" required>
                                                        <?php foreach($lista_produto_req as $key_produto_req => $produto_req) { ?>
                                                        <option value="<?= $produto_req->cod_produto ?>"
                                                        <?php if($produto_req->cod_produto == set_value('CodProduto')) echo "selected"; ?>>
                                                            <?= $produto_req->cod_produto ?> -
                                                            <?= $produto_req->nome_produto ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-row">                                        
                                                <div class="form-group col-md-6">
                                                    <label for="inputTipoProduto">Tipo de Produto</label>
                                                    <input type="text" class="form-control" id="inputTipoProduto"
                                                        readonly name="TipoProduto" value="<?= set_value('TipoProduto'); ?>">
                                                </div>  
                                                <div class="form-group col-md-6">
                                                    <label class="control-label" for="inputQuantRequisicao">Quantidade Requisição <span class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <input class="form-control" id="inputQuantRequisicao" type="text" data-mask="#.##0,000" data-mask-reverse="true"
                                                            name="QuantRequisicao" value="<?= set_value('QuantRequisicao'); ?>" required>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text" style="width: 40px;" id="idUnProd"></span>
                                                        </div>
                                                    </div>
                                                </div>                                      
                                            </div>
                                            <div class="form-row" id="divLote" hidden>
                                                <div class="form-group col-md-12">
                                                    <label for="inputLote">Lote <span class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <select id="inputLote" class="selectpicker show-tick form-control"
                                                            data-live-search="true" data-actions-box="true"
                                                            data-style="btn-input-primary" name="CodLote">
                                                        </select>
                                                    </div>
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
                <button type="submit" class="btn btn-primary" form="formAdicionarProduto"><i class="fas fa-check-circle"></i> Adicionar Produto</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<?php foreach($lista_produto as $key_produto => $produto) { ?>
<div class="modal fade" id="editar-produto<?= $produto->seq_produto_requisicao_material ?>">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar produto</h5>
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
                                            action="<?= base_url("estoque/requisicao-material/editar-produto/{$requisicao->cod_requisicao_material}/{$produto->seq_produto_requisicao_material}") ?>"
                                            method='post' id='formEditarProduto<?= $produto->seq_produto_requisicao_material ?>'>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label class="control-label" for="inputProdutoCompraEdit">Produto de Compra</label>
                                                    <input class="form-control" id="inputProdutoCompraEdit" type="text"
                                                        name="CodProdutoEdit" value="<?= $produto->cod_produto ?> - <?= $produto->nome_produto ?>" readonly>
                                                </div>                                
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label class="control-label" for="inputTipoProdutoEdit">Tipo de Produto</label>
                                                    <input class="form-control" id="inputTipoProdutoEdit" type="text"
                                                        name="TipoProdutoEdit" value="<?= $produto->nome_tipo_produto ?>" readonly>
                                                </div>                                                              
                                                <div class="form-group col-md-6">
                                                    <label for="inputQuantRequisicaoEdit">Quantidade Requisição <span class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" value="<?= $produto->quant_requisicao ?>" data-mask="#.##0,000" data-mask-reverse="true"
                                                            id="inputQuantRequisicaoEdit" name="QuantRequisicaoEdit" <?php if($requisicao->status == 2){ echo "readonly"; } ?> required>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"
                                                                    style="width: 40px;"><?= $produto->cod_unidade_medida ?></span>
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
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" form="formEditarProduto<?= $produto->seq_produto_requisicao_material ?>"
                <?php if($requisicao->status == 2){ echo "disabled"; } ?>><i class="fas fa-save"></i>
                    Salvar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<div class="modal fade" id="elimina-produto" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Eliminar produto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Confirma eliminação dos produtos da requisição selecionados?
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger" form="DeleteProduto">Confirma</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="atende-requisicao" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Atender requisição</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Confirma atendimento da requisição de material?
            </div>
            <div class="modal-footer">
                <form class="mb-0 needs-validation" novalidate
                      action="<?= base_url("estoque/requisicao-material/atender-requisicao/{$requisicao->cod_requisicao_material}") ?>"
                      method='post'>                
                    <button type="submit" class="btn btn-teal">Confirma</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="estorna-requisicao" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Estornar requisição</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Confirma estorno da requisição de material?
            </div>
            <div class="modal-footer">
                <form class="mb-0 needs-validation" novalidate
                      action="<?= base_url("estoque/requisicao-material/estorno-requisicao/{$requisicao->cod_requisicao_material}") ?>"
                      method='post'>                
                    <button type="submit" class="btn btn-danger">Confirma</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>

$(function() {
     $.applyDataMask();
});

$("[name='excluir_todos[]']").click(function() {
    var cont = $("[name='excluir_todos[]']:checked").length;
    $("#btnExcluir").prop("disabled", cont ? false : true);
});

$("#inputProdutoRequisicao").change(function() {

    var baseurl = "<?php echo base_url(); ?>";

    var produto = $("#inputProdutoRequisicao").val();

    $.post(baseurl + "ajax/busca-produto", {
        produto: produto
    }, function(valor) {
        var aValor = valor.split('|');
        console.log(aValor);
        $("#idUnProd").text(aValor[0]);
        $("#inputTipoProduto").val(aValor[1]);
        $("#inputValorUnitario").val(aValor[2]);

        var tipoControle = aValor[5];

        if(tipoControle == 2){
            $("#divLote").prop('hidden', false);
            $("#inputLote").prop('required', true);
            var baseurl = "<?php echo base_url(); ?>";

            var produto = $('#inputProdutoRequisicao').val();

            $.post(baseurl + "ajax/busca-lote", {
                produto: produto
            }, function(data) {
                
                $("#inputLote").html(data);
                $("#inputLote").removeAttr('disabled');
                $('#inputLote').selectpicker('refresh');
            }); 
        }else{
            $("#divLote").prop('hidden', true);
            $("#inputLote").prop('required', false);
            $("#inputLote").empty();
            $('#inputLote').selectpicker('refresh');
        }
    });

});

<?php if($requisicao->status != 2){ ?>

    $('#inputDataRequisicao').datepicker({
        uiLibrary: 'bootstrap4'
    });

<?php } ?>

</script>

<?php $this->load->view('gerais/footer'); ?>