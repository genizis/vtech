<?php $this->load->view('gerais/header', $menu); ?>
<?php $this->load->view('gerais/menu', $menu); ?>

<section>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('visao-geral') ?>">Visão Geral</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>usuario">Usuário</a></li>
            <li class="breadcrumb-item active">Editar Usuário</li>
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
                                <?php if ($this->session->flashdata('erro') <> "") { ?>
                                    <div class="alert alert-danger alert-dismissible fade show" id="alert" role="alert">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <strong>Atenção!</strong> <?= $this->session->flashdata('erro') ?>
                                    </div>
                                <?php }
                                $this->session->set_flashdata('erro', '');  ?>
                                <?php if ($this->session->flashdata('sucesso') <> "") { ?>
                                    <div class="alert alert-success alert-dismissible fade show" id="alert" role="alert">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <strong>Muito bem!</strong>
                                        <?= $this->session->flashdata('sucesso', '') ?>
                                    </div>
                                <?php }
                                $this->session->set_flashdata('sucesso', ''); ?>
                                <form action="<?= base_url("usuario/editar-usuario/{$usuario->email}") ?>" method="POST" class="needs-validation" novalidate>
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="inputUsuário">E-mail do Usuário</label>
                                            <input autocomplete="off" type="text" class="form-control" id="inputUsuário" name="Email" value="<?= $usuario->email ?>" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputNomeUsuário">Nome do Usuário <span class="text-danger">*</span></label>
                                            <input autocomplete="off" type="text" class="form-control" id="inputNomeUsuário" name="NomeUsuario" value="<?= $usuario->nome_usuario ?>">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Situação</label>
                                            <div class="btn-group btn-block" data-toggle="buttons">
                                                <label class="btn btn-outline-primary">
                                                    <input type="radio" id="radioAtivo" name="Ativo" value="1" <?php if ($usuario->ativo == 1) echo "checked";  ?>> Ativo
                                                </label>
                                                <label class="btn btn-outline-primary">
                                                    <input type="radio" id="radioInativo" name="Ativo" value="2" <?php if ($usuario->ativo == 2) echo "checked";  ?>> Inativo
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputTipoAcesso">Tipo de Acesso</label>
                                            <div class="btn-group btn-block" data-toggle="buttons">
                                                <label class="btn btn-outline-primary">
                                                    <input type="radio" id="radioTipoAcesso" name="TipoAcesso" value="0" <?php if ($usuario->tipo_acesso == 0) echo "checked";  ?>> Comum
                                                </label>
                                                <label class="btn btn-outline-primary">
                                                    <input type="radio" id="radioTipoAcesso" name="TipoAcesso" value="1" <?php if ($usuario->tipo_acesso == 1) echo "checked";  ?>> Administrador
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputSenha1">Senha <span class="text-danger">*</span></label>
                                            <input type="password" class="form-control" id="inputSenha1" name="Senha1">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputSenha2">Confirma a Senha <span class="text-danger">*</span></label>
                                            <input type="password" class="form-control" id="inputSenha2" name="Senha2">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="inputTipoAcesso" class="mb-0">Módulos Liberados</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <div class="btn-group-toggle" data-toggle="buttons">
                                                <label class="btn btn-outline-primary active btn-block">
                                                    <input type="checkbox" <?php if ($usuario->producao == 1) echo "checked" ?> autocomplete="off" name="Producao" value="1">
                                                    <i class="fa-solid fa-check"></i> Módulo Produção
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <div class="btn-group-toggle" data-toggle="buttons">
                                                <label class="btn btn-outline-primary active btn-block">
                                                    <input type="checkbox" <?php if ($usuario->vendas == 1) echo "checked" ?> autocomplete="off" name="Vendas" value="1">
                                                    <i class="fa-solid fa-check"></i> Módulo Vendas
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <div class="btn-group-toggle" data-toggle="buttons">
                                                <label class="btn btn-outline-primary active btn-block">
                                                    <input type="checkbox" <?php if ($usuario->compras == 1) echo "checked" ?> autocomplete="off" name="Compras" value="1">
                                                    <i class="fa-solid fa-check"></i> Módulo Compras
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <div class="btn-group-toggle" data-toggle="buttons">
                                                <label class="btn btn-outline-primary active btn-block">
                                                    <input type="checkbox" <?php if ($usuario->estoque == 1) echo "checked" ?> autocomplete="off" name="Estoque" value="1">
                                                    <i class="fa-solid fa-check"></i> Módulo Estoque
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <div class="btn-group-toggle" data-toggle="buttons">
                                                <label class="btn btn-outline-primary active btn-block">
                                                    <input type="checkbox" <?php if ($usuario->fiscal == 1) echo "checked" ?> autocomplete="off" name="Fiscal" value="1">
                                                    <i class="fa-solid fa-check"></i> Módulo Fiscal
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <div class="btn-group-toggle" data-toggle="buttons">
                                                <label class="btn btn-outline-primary active btn-block">
                                                    <input type="checkbox" <?php if ($usuario->financeiro == 1) echo "checked" ?> autocomplete="off" name="Financeiro" value="1">
                                                    <i class="fa-solid fa-check"></i> Módulo Financeiro
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="mb-3">
                                    <div class="row float-right">
                                        <div class="col-lg-12 col-md-12 col-xs-12">
                                            <button type="submit" class="btn btn-primary" name="Opcao" value="salvar"><i class="fas fa-save"></i> Salvar</button>
                                            <a href="<?php echo base_url() ?>usuario" class="btn btn-secondary">Cancelar</a>
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

</script>

<?php $this->load->view('gerais/footer'); ?>