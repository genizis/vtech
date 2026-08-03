<?php $this->load->view('gerais/header' , $menu); ?>

<body class="bg-default">
    <div class="modal fade bd-example-modal-lg" data-backdrop="static" data-keyboard="false" tabindex="-1" id="spinner">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="spinner-grow text-light" style="width: 7rem; height: 7rem;" role="status">
					<span class="sr-only">Loading...</span>
				</div>
			</div>
		</div>
	</div>

    <section>
        <div class="container">
            <div class="row login">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="card bg-info mt-5">
                        <div class="card-body text-center">
                            <img src="<?= base_url('img/logo-home-b.png') ?>" class="img-fluid mb-3" alt="">
                            <hr>
                            <h1 class="disp´lay-2 text-white"><strong>Estamos quase lá</strong></h1>                            
                            <h4 class="mt-4 text-white">Acesse seu e-mail e confirme seu cadastro para iniciar o uso do sistema</h4> 
                            <a type="button" href="<?php echo base_url() ?>reenviar-email/<?= $empresa ?>" form="login" class="btn btn-light btn-lg btn-block mt-4">Reenviar E-mail</a>                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-xs-3"></div>
            </div>
        </div>
    </section>

    <?php $this->load->view('gerais/footer'); ?>