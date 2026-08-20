<?php $this->load->view('gerais/header', $menu); ?>
<?php $this->load->view('gerais/menu', $menu); ?>

<section>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('visao-geral') ?>">Visão Geral</a></li>
            <li class="breadcrumb-item active">Empresas</li>
        </ol>
    </div>
</section>

<section>
    <div class="container">
        <div class="card mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <a href="<?= base_url('empresas/nova-empresa') ?>" class="btn btn-info link-load">
                            <i class="fas fa-plus-circle"></i> Nova Empresa
                        </a>
                    </div>
                    <div class="col-md-4">
                        <form action="<?= base_url('empresas') ?>" method="GET" class="needs-validation" novalidate>
                            <div class="input-group">
                                <input type="text" class="form-control search" name="buscar" value="<?= html_escape($filter) ?>">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-secondary"><i class="fas fa-search"></i> Buscar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?php if($this->session->flashdata('erro') <> '') { ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Atenção!</strong> <?= $this->session->flashdata('erro') ?>
                        </div>
                        <?php } $this->session->set_flashdata('erro', ''); ?>
                        <?php if($this->session->flashdata('sucesso') <> '') { ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Muito bem!</strong> <?= $this->session->flashdata('sucesso') ?>
                        </div>
                        <?php } $this->session->set_flashdata('sucesso', ''); ?>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Empresa</th>
                                        <th>Tipo pessoa</th>
                                        <th>CPF/CNPJ</th>
                                        <th>E-mail</th>
                                        <th class="text-center">Validade</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($lista_empresa as $empresa) { ?>
                                    <tr>
                                        <td><a class="text-dark link-load" href="<?= base_url("empresas/editar-empresa/{$empresa->id_empresa}") ?>">
                                            <?= (int) $empresa->id_empresa ?> - <?= html_escape($empresa->nome_empresa) ?>
                                        </a></td>
                                        <td><?= (int) $empresa->tipo_empresa === 1 ? 'Pessoa Jurídica' : 'Pessoa Física' ?></td>
                                        <td><?= html_escape($empresa->cnpj_cpf) ?></td>
                                        <td><?= html_escape($empresa->email_contato) ?></td>
                                        <td class="text-center"><?= date('d/m/Y', strtotime($empresa->data_validade)) ?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <?php if(empty($lista_empresa)) { ?>
                        <div class="text-center text-muted"><p class="font-italic mt-3">Nenhuma empresa encontrada</p></div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <?php if($pagination != null) { ?>
        <div class="card mb-3"><div class="card-body"><?= $pagination ?></div></div>
        <?php } ?>
    </div>
</section>
<script>$('.page-item>a').addClass('page-link');</script>
<?php $this->load->view('gerais/footer'); ?>
