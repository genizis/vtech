<?php $this->load->view('gerais/header', $menu); ?>
<?php $this->load->view('gerais/menu', $menu); ?>

<section><div class="container"><ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?= base_url('visao-geral') ?>">Visão Geral</a></li>
    <li class="breadcrumb-item active">Estabelecimentos</li>
</ol></div></section>

<section><div class="container">
    <div class="card mb-3"><div class="card-body">
        <div class="row">
            <div class="col-md-8"><a href="<?= base_url('estabelecimentos/novo-estabelecimento') ?>" class="btn btn-info link-load"><i class="fas fa-plus-circle"></i> Novo Estabelecimento</a></div>
            <div class="col-md-4"><form action="<?= base_url('estabelecimentos') ?>" method="GET"><div class="input-group">
                <input type="text" class="form-control search" name="buscar" value="<?= html_escape($filter) ?>">
                <div class="input-group-append"><button class="btn btn-secondary" type="submit"><i class="fas fa-search"></i> Buscar</button></div>
            </div></form></div>
        </div>
        <?php if($this->session->flashdata('erro') <> '') { ?><div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Atenção!</strong> <?= $this->session->flashdata('erro') ?></div><?php } ?>
        <?php if($this->session->flashdata('sucesso') <> '') { ?><div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Muito bem!</strong> <?= $this->session->flashdata('sucesso') ?></div><?php } ?>
        <div class="table-responsive"><table class="table table-bordered">
            <thead class="thead-light"><tr><th>Estabelecimento</th><th>Tipo</th><th>Tipo pessoa</th><th>CPF/CNPJ</th><th>E-mail</th></tr></thead>
            <tbody><?php foreach($lista_estabelecimento as $estabelecimento) { ?><tr>
                <td><a class="text-dark link-load" href="<?= base_url("estabelecimentos/editar-estabelecimento/{$estabelecimento->id_estabelecimento}") ?>"><?= (int)$estabelecimento->id_estabelecimento ?> - <?= html_escape($estabelecimento->nome_estabelecimento) ?></a></td>
                <td><?= (int)$estabelecimento->tipo_estabelecimento === 1 ? 'Matriz' : 'Filial' ?></td>
                <td><?= (int)$estabelecimento->tipo_pessoa === 1 ? 'Pessoa Jurídica' : 'Pessoa Física' ?></td>
                <td><?= html_escape($estabelecimento->cnpj_cpf) ?></td><td><?= html_escape($estabelecimento->email_contato) ?></td>
            </tr><?php } ?></tbody>
        </table></div>
        <?php if(empty($lista_estabelecimento)) { ?><div class="text-center text-muted"><p class="font-italic mt-3">Nenhum estabelecimento encontrado</p></div><?php } ?>
    </div></div>
    <?php if($pagination != null) { ?><div class="card mb-3"><div class="card-body"><?= $pagination ?></div></div><?php } ?>
</div></section>
<script>$('.page-item>a').addClass('page-link');</script>
<?php $this->load->view('gerais/footer'); ?>
