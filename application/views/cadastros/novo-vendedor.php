<?php $this->load->view('gerais/header' , $menu); ?>
<?php $this->load->view('gerais/menu', $menu); ?>

<section>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('visao-geral') ?>">Visão Geral</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>vendedor">Vendedor</a></li>
            <li class="breadcrumb-item active">Novo Vendedor</li>
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
                                    <strong>Muito bem!</strong>
                                    <?= $this->session->flashdata('sucesso', '') ?>
                                </div>
                                <?php } $this->session->set_flashdata('sucesso', ''); ?>                                
                                <form action='novo-vendedor' method='post' class="mb-0 needs-validation" id="formInserirVendedor" novalidate>
                                <div class="form-row">
                                    <div class="form-group col-md-9">
                                        <label for="inputNomeVendedor">Nome do Vendedor <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="inputNomeVendedor"
                                            name="NomeVendedor" value="<?= set_value('NomeVendedor'); ?>" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Situação</label>
                                        <div class="btn-group btn-block" data-toggle="buttons">
                                            <label class="btn btn-outline-primary">
                                                <input type="radio" id="radioAtivo" name="Ativo" value="1" checked> Ativa
                                            </label>
                                            <label class="btn btn-outline-primary">
                                                <input type="radio" id="radioInativo" name="Ativo" value="2"> Inativa
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="inputUsuario">Usuário App</label>
                                        <input type="text" class="form-control" id="inputUsuario"
                                            name="Usuario" value="<?= set_value('Usuario'); ?>">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputSenha">Senha de Acesso</label>
                                        <input type="password" class="form-control" id="inputSenha"
                                            name="Senha">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputPerComissao">Percentual de Comissão</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="PerComissao" data-mask="##0,00" data-mask-reverse="true"
                                            value="<?= set_value('PerComissao') ?>">
                                            <div class="input-group-append">
                                                <span class="input-group-text">%</span>
                                            </div>
                                        </div>
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
                                <a class="nav-link" id="meta-tab" data-toggle="tab" href="#meta"
                                    role="tab" aria-controls="meta"
                                    aria-selected="false">Metas de Venda</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card  mb-3">
                    <div class="card-body">
                        <div class="tab-content">
                                <div class="tab-pane fade active show" id="dados">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-xs-12">                                            
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
                                            <hr>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputCEP">CEP</label>
                                                    <input type="text" class="form-control" id="inputCEP"
                                                        name="CEP" value="<?= set_value('CEP'); ?>" data-mask="00000-000">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputEndereco">Endereço</label>
                                                    <input type="text" class="form-control" id="inputEndereco"
                                                        name="Endereco" value="<?= set_value('Endereco'); ?>">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="inputNumero">Número</label>
                                                    <input type="text" class="form-control" id="inputNumero"
                                                        name="Numero" value="<?= set_value('Numero'); ?>">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputComplemento">Complemento</label>
                                                    <input type="text" class="form-control" id="inputComplemento"
                                                        name="Complemento" value="<?= set_value('Complemento'); ?>">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputBairro">Bairro</label>
                                                    <input type="text" class="form-control" id="inputBairro"
                                                        name="Bairro" value="<?= set_value('Bairro'); ?>">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputCidade">Cidade</label>
                                                    <select class="form-control selectpicker show-tick" data-live-search="true"
                                                        title="Selecione a Cidade" id="inputCidade" name="Cidade"> 
                                                        <?php foreach($lista_cidade as $key_cidade => $cidade) { ?>
                                                        <option value="<?= $cidade->id ?>" <?php if($cidade->id == set_value('Cidade')) echo "selected"; ?>><?= $cidade->nome ?> - <?= $cidade->uf ?></option>
                                                        <?php } ?>                                           
                                                    </select>
                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="meta">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-xs-12">
                                                    <button type="button"
                                                        class="btn btn-outline-info btn-sm" disabled><i
                                                            class="fas fa-plus-circle"></i> Adicionar
                                                        Meta</button>
                                                    <button type="button"
                                                        class="btn btn-outline-danger btn-sm" id="excluirMeta"
                                                        disabled><i class="fas fa-trash-alt"></i>
                                                        Excluir</button>
                                                </div>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th scope="col" class="text-center border-right-0"><i class="fa-solid fa-check"></i>
                                                            </th>
                                                            <th scope="col" class="text-center">Ano</th>
                                                            <th scope="col" class="text-right">Total da meta</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>                                                            
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="text-center text-muted">
                                                    <p class="font-italic mt-3">Nenhuma meta cadastrada para o vendedor</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="mb-3">
                                <div class="row float-right">
                                    <div class="col-lg-12 col-md-12 col-xs-12">
                                        <button type="submit" class="btn btn-primary" name="Opcao" value="salvar" form="formInserirVendedor"><i
                                                class="fas fa-save"></i> Salvar</button>
                                        <button type="submit" class="btn btn-info" name="Opcao"
                                            value="salvarContinuar" form="formInserirVendedor">Salvar e Continuar</button>
                                        <a href="<?php echo base_url() ?>vendedor"
                                            class="btn btn-secondary link-load">Cancelar</a>
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

$("#inputCEP").blur(function(){
    bucaCEP();
});

function bucaCEP() {
    var cep = $("#inputCEP").val();
    var link ="https://ws.apicep.com/cep/" + cep + ".json";

    $.ajax({
        url: link,
        type: 'GET',
        success: function(data) {            
            $("#inputEndereco").val(data.address);
            $("#inputBairro").val(data.district);
            $("#inputCidade").selectpicker('val', $('option:contains("' + data.city + ' - ' + data.state + '")').val());
        }
    })
}

    $('#inputCidade').selectpicker({
        style: 'btn-input-primary'
    });  

    $('#inputTelefoneFixo').mask('(00) 0000-0000');

    $('#inputTelefoneCelular').mask('(00) 0 0000-0000'); 

    
</script>

<?php $this->load->view('gerais/footer'); ?>