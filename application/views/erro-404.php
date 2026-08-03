<?php $this->load->view('gerais/header' , $menu); ?>
<?php $this->load->view('gerais/menu', $menu); ?>

<section>
    <div class="container">        
        <div class="row">
            <div class="col-md-3"></div> 
            <div class="col-md-6 mt-5 text-center">
                <h1 class="display-4 font-weight-bold"><i class="fa-solid fa-4x fa-triangle-exclamation"></i></h1>
                <h1 class="display-3 font-weight-bold">ERRO 404</h1>
                <h3 class="mt-3 text-muted">A página que você tentou acessar <strong>não existe</strong> ou você <strong>não possui permissão</strong></h3>  
                <a href="<?= base_url() ?>" class="btn btn-outline-primary btn-lg mt-3">Página Inicial<a>            
            </div> 
            <div class="col-md-3"></div>  
        </div> 
    </div>         

</section>



<?php $this->load->view('gerais/footer'); ?>