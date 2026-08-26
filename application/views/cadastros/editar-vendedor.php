<?php $this->load->view('gerais/header' , $menu); ?>
<?php $this->load->view('gerais/menu', $menu); ?>

<section>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('visao-geral') ?>">Visão Geral</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>vendedor">Vendedor</a></li>
            <li class="breadcrumb-item active">Editar Vendedor</li>
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
                                    <strong>Muito bem!</strong> <?= $this->session->flashdata('sucesso') ?>
                                </div>
                                <?php } $this->session->set_flashdata('sucesso', ''); ?>     
                                <form action="<?= base_url("vendedor/editar-vendedor/{$vendedor->cod_vendedor}") ?>"
                                    method='post' class="needs-validation mb-0" id="formEditVendedor" novalidate>                           
                                <div class="form-row">
                                    <div class="form-group col-md-9">
                                        <label for="inputNomeVendedor">Nome do Vendedor <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="inputNomeVendedor"
                                            name="NomeVendedor"
                                            value="<?= $vendedor->nome_vendedor?>" required>
                                    </div>                                      
                                    
                                    <div class="form-group col-md-3">
                                        <label>Situação</label>
                                        <div class="btn-group btn-block" data-toggle="buttons">
                                            <label class="btn btn-outline-primary">
                                                <input type="radio" id="radioAtivo" name="Ativo" value="1" <?php if ($vendedor->ativo == 1) echo "checked";  ?>> Ativa
                                            </label>
                                            <label class="btn btn-outline-primary">
                                                <input type="radio" id="radioInativo" name="Ativo" value="2" <?php if ($vendedor->ativo == 2) echo "checked";  ?>> Inativa
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="inputUsuario">Usuário App</label>
                                        <input type="text" class="form-control" id="inputUsuario"
                                            name="Usuario" value="<?= $vendedor->nome_usuario ?>">
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
                                            value="<?= number_format((float) ($vendedor->perc_comissao), 2, ',', '.') ?>">
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
                                                        name="TelFixo"
                                                        value="<?= $vendedor->tel_fixo ?>">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputTelefoneCelular">Telefone Celular</label>
                                                    <input type="text" class="form-control" id="inputTelefoneCelular"
                                                        name="TelCel"
                                                        value="<?= $vendedor->tel_cel ?>">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputEmail">E-mail</label>
                                                    <input type="text" class="form-control" id="inputEmail"
                                                        name="Email"
                                                        value="<?= $vendedor->email ?>">
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputCEP">CEP</label>
                                                    <input type="text" class="form-control" id="inputCEP"
                                                            name="CEP" value="<?= $vendedor->cep?>" data-mask="00000-000">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputEndereco">Endereço</label>
                                                    <input type="text" class="form-control" id="inputEndereco"
                                                        name="Endereco"
                                                        value="<?= $vendedor->endereco?>">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="inputNumero">Número</label>
                                                    <input type="text" class="form-control" id="inputNumero"
                                                        name="Numero" value="<?= $vendedor->numero?>">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputComplemento">Complemento</label>
                                                    <input type="text" class="form-control" id="inputComplemento"
                                                        name="Complemento" value="<?= $vendedor->complemento ?>">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputBairro">Bairro</label>
                                                    <input type="text" class="form-control" id="inputBairro"
                                                        name="Bairro" value="<?= $vendedor->bairro ?>">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputCidade">Cidade</label>
                                                    <select class="form-control selectpicker show-tick" data-live-search="true"
                                                        title="Selecione a Cidade" id="inputCidade" name="Cidade">
                                                        <?php foreach($lista_cidade as $key_cidade => $cidade) { ?>
                                                        <option value="<?= $cidade->id ?>"
                                                            <?php if($vendedor->cod_cidade == $cidade->id) echo "selected"; ?>>
                                                            <?= $cidade->nome ?> - <?= $cidade->uf ?></option>
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
                                                    <button data-toggle="modal" data-target="#inserir-meta" type="button"
                                                        class="btn btn-outline-info btn-sm"><i
                                                            class="fas fa-plus-circle"></i> Adicionar
                                                        Meta</button>
                                                    <button data-toggle="modal" data-target="#elimina-meta" type="button"
                                                        class="btn btn-outline-danger btn-sm" id="excluirMeta"
                                                        disabled><i class="fas fa-trash-alt"></i>
                                                        Excluir</button>
                                                </div>
                                            </div>
                                            <form action="<?= base_url("vendedor/excluir-meta/{$vendedor->cod_vendedor}") ?>" method="POST"
                                            id="formDeleteMeta" class="mb-0 needs-validation" novalidate>
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
                                                            <?php foreach ($lista_meta as $key_meta => $meta) { ?>
                                                                <tr>
                                                                    <td>
                                                                        <div class="checkbox text-center">
                                                                            <input name="excluir_todos_meta[]" type="checkbox" value="<?= $meta->id_meta ?>" />
                                                                        </div>
                                                                    </td>
                                                                    <td class="text-center"><a href="#" class="text-dark" data-toggle="modal" data-target="#editar-meta<?= $meta->id_meta ?>">
                                                                            <?= $meta->ano ?>
                                                                        </a>
                                                                    </td>
                                                                    <td class="text-right text-info">R$ <?= number_format((float) ($meta->total_meta), 2, ',', '.') ?></td>
                                                                </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <?php if ($lista_meta == false) { ?>
                                                <div class="text-center text-muted">
                                                        <p class="font-italic mt-3">Nenhuma meta cadastrada para o vendedor</p>
                                                </div>
                                                <?php } ?>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <hr class="mb-3">
                                <div class="row float-right">
                                    <div class="col-lg-12 col-md-12 col-xs-12">
                                        <button type="submit" class="btn btn-primary" form="formEditVendedor"><i class="fas fa-save"></i>
                                            Salvar</button>
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



<div class="modal fade" id="elimina-comissao" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Eliminar comissão</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Confirma eliminação das comissões selecionadas?
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger" form="formDeleteComissao">Confirma</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="inserir-meta">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nova meta</h5>
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
                                        <form action="<?= base_url("vendedor/inserir-meta/{$vendedor->cod_vendedor}") ?>" method='post' id='formMeta' class="needs-validation mb-0" novalidate>
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label for="inputAno">Ano</label>
                                                    <input type="text" id="inputAno" class="form-control" name="Ano" data-mask="0000" data-mask-reverse="true" value="<?= set_value('Ano'); ?>" required>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label>Janeiro</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$</span>
                                                        </div>
                                                        <input type="text" class="form-control" data-mask="#.##0,00" data-mask-reverse="true" name="Jan" id="inputJan" value="<?= set_value('Jan'); ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>Fevereiro</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$</span>
                                                        </div>
                                                        <input type="text" class="form-control" data-mask="#.##0,00" data-mask-reverse="true" name="Fev" id="inputFev" value="<?= set_value('Fev'); ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>Março</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$</span>
                                                        </div>
                                                        <input type="text" class="form-control" data-mask="#.##0,00" data-mask-reverse="true" name="Mar" id="inputMar" value="<?= set_value('Mar'); ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>Abril</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$</span>
                                                        </div>
                                                        <input type="text" class="form-control" data-mask="#.##0,00" data-mask-reverse="true" name="Abr" id="inputAbr" value="<?= set_value('Abr'); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label>Maio</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$</span>
                                                        </div>
                                                        <input type="text" class="form-control" data-mask="#.##0,00" data-mask-reverse="true" name="Mai" id="inputMai" value="<?= set_value('Mai'); ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>Junho</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$</span>
                                                        </div>
                                                        <input type="text" class="form-control" data-mask="#.##0,00" data-mask-reverse="true" name="Jun" id="inputJun" value="<?= set_value('Jun'); ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>Julho</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$</span>
                                                        </div>
                                                        <input type="text" class="form-control" data-mask="#.##0,00" data-mask-reverse="true" name="Jul" id="inputJul" value="<?= set_value('Jul'); ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>Agosto</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$</span>
                                                        </div>
                                                        <input type="text" class="form-control" data-mask="#.##0,00" data-mask-reverse="true" name="Ago" id="inputAgo" value="<?= set_value('Jun'); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label>Setembro</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$</span>
                                                        </div>
                                                        <input type="text" class="form-control" data-mask="#.##0,00" data-mask-reverse="true" name="Set" id="inputSet" value="<?= set_value('Set'); ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>Outubro</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$</span>
                                                        </div>
                                                        <input type="text" class="form-control" data-mask="#.##0,00" data-mask-reverse="true" name="Out" id="inputOut" value="<?= set_value('Out'); ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>Novembro</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$</span>
                                                        </div>
                                                        <input type="text" class="form-control" data-mask="#.##0,00" data-mask-reverse="true" name="Nov" id="inputNov" value="<?= set_value('Nov'); ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>Dezembro</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$</span>
                                                        </div>
                                                        <input type="text" class="form-control" data-mask="#.##0,00" data-mask-reverse="true" name="Dez" id="inputDez" value="<?= set_value('Dez'); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <p class="small2 text-muted mb-0 mt-2"><i>* Considere o valor das vendas de produtos e serviços, subtraindo os descontos aplicados</i></p>
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
                <button type="submit" class="btn btn-primary" form="formMeta"><i class="fas fa-save"></i>
                    Salvar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<?php foreach ($lista_meta as $key_meta => $meta) { ?>
    <div class="modal fade" id="editar-meta<?= $meta->id_meta ?>">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar meta</h5>
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
                                            <form action="<?= base_url("vendedor/editar-meta/{$vendedor->cod_vendedor}") ?>" method='post' id='formMetaEdit<?= $meta->id_meta ?>' class="needs-validation mb-0" novalidate>
                                            <input type="hidden" name="idMeta"
                                                value="<?= $meta->id_meta ?>">
                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        <label for="inputAno">Ano</label>
                                                        <input type="text" id="inputAno" class="form-control" name="Ano" data-mask="0000" readonly data-mask-reverse="true" value="<?= $meta->ano ?>">
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        <label>Janeiro</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">R$</span>
                                                            </div>
                                                            <input type="text" class="form-control" data-mask="#.##0,00" data-mask-reverse="true" name="Jan" id="inputJanAlt" value="<?= $meta->janeiro ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label>Fevereiro</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">R$</span>
                                                            </div>
                                                            <input type="text" class="form-control" data-mask="#.##0,00" data-mask-reverse="true" name="Fev" id="inputFevAlt" value="<?= $meta->fevereiro ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label>Março</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">R$</span>
                                                            </div>
                                                            <input type="text" class="form-control" data-mask="#.##0,00" data-mask-reverse="true" name="Mar" id="inputMarAlt" value="<?= $meta->marco ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label>Abril</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">R$</span>
                                                            </div>
                                                            <input type="text" class="form-control" data-mask="#.##0,00" data-mask-reverse="true" name="Abr" id="inputAbrAlt" value="<?= $meta->abril ?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        <label>Maio</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">R$</span>
                                                            </div>
                                                            <input type="text" class="form-control" data-mask="#.##0,00" data-mask-reverse="true" name="Mai" id="inputMaiAlt" value="<?= $meta->maio ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label>Junho</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">R$</span>
                                                            </div>
                                                            <input type="text" class="form-control" data-mask="#.##0,00" data-mask-reverse="true" name="Jun" id="inputJunAlt" value="<?= $meta->junho ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label>Julho</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">R$</span>
                                                            </div>
                                                            <input type="text" class="form-control" data-mask="#.##0,00" data-mask-reverse="true" name="Jul" id="inputJulAlt" value="<?= $meta->julho ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label>Agosto</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">R$</span>
                                                            </div>
                                                            <input type="text" class="form-control" data-mask="#.##0,00" data-mask-reverse="true" name="Ago" id="inputAgoAlt" value="<?= $meta->agosto ?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        <label>Setembro</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">R$</span>
                                                            </div>
                                                            <input type="text" class="form-control" data-mask="#.##0,00" data-mask-reverse="true" name="Set" id="inputSetAlt" value="<?= $meta->setembro ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label>Outubro</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">R$</span>
                                                            </div>
                                                            <input type="text" class="form-control" data-mask="#.##0,00" data-mask-reverse="true" name="Out" id="inputOutAlt" value="<?= $meta->outubro ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label>Novembro</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">R$</span>
                                                            </div>
                                                            <input type="text" class="form-control" data-mask="#.##0,00" data-mask-reverse="true" name="Nov" id="inputNovAlt" value="<?= $meta->novembro ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label>Dezembro</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">R$</span>
                                                            </div>
                                                            <input type="text" class="form-control" data-mask="#.##0,00" data-mask-reverse="true" name="Dez" id="inputDezAlt" value="<?= $meta->dezembro ?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-12">
                                                        <p class="small2 text-muted mb-0 mt-2"><i>* Considere o valor das vendas de produtos e serviços, subtraindo os descontos aplicados</i></p>
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
                    <button type="submit" class="btn btn-primary" form="formMetaEdit<?= $meta->id_meta ?>"><i class="fas fa-save"></i>
                        Salvar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<div class="modal fade" id="elimina-meta" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Eliminar meta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Confirma eliminação das metas selecionadas?
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger" form="formDeleteMeta">Confirma</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>


<script>

$("[name='excluir_todos_comissao[]']").click(function() {
    var cont = $("[name='excluir_todos_comissao[]']:checked").length;
    $("#excluirComissao").prop("disabled", cont ? false : true);
});

$("[name='excluir_todos_meta[]']").click(function() {
    var cont = $("[name='excluir_todos_meta[]']:checked").length;
    $("#excluirMeta").prop("disabled", cont ? false : true);
});

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