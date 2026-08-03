    
    
    
    
    </body>  
    
    <footer class="fixed-bottom">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-0 pt-1 pb-0">
            <div class="container container-vendedor text-center">
                <a class="link-load nav-link text-center <?php if($menu == 'Pedidos') echo "text-white"; else echo "text-muted"; ?>" href="<?= base_url('vendas/pedidos-vendedor') ?>"><i class="fa-regular fa-file-lines fa-2x"></i></i><br><span class="">PEDIDOS</span></a>
                <a class="link-load nav-link text-center <?php if($menu == 'Atendimentos') echo "text-white"; else echo "text-muted"; ?>" href="<?= base_url('vendas/atendimentos-vendedor') ?>"><i class="fa-solid fa-headset fa-2x"></i></i></i><br><span class="">ATENDIMENTOS</span></a>
                <a class="link-load nav-link text-center <?php if($menu == 'Vendas') echo "text-white"; else echo "text-muted"; ?>" href="<?= base_url('vendas/minhas-vendas-vendedor') ?>"><i class="fa-solid fa-chart-pie fa-2x"></i></i></i><br><span class="">VENDAS</span></a>
            </div>
        </nav>
    </footer>

    <script>
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    
                    }else{
                        $('.modal').modal('hide');
                        $('#spinner').modal('show');
                    }
                    form.classList.add('was-validated');
                }, false);
                });
            }, false);
            
            $('.link-load').click(function() {
                $('.modal').modal('hide');
                $('#spinner').modal('show');
            });

            $('.breadcrumb a').click(function() {
                $('.modal').modal('hide');
                $('#spinner').modal('show');
            });
        
        })();        

        $(function(){
            var hash = window.location.hash;
            hash && $('ul.nav a[href="' + hash + '"]').tab('show');

            $('.nav-tabs a').click(function (e) {
                $(this).tab('show');
                var scrollmem = $('body').scrollTop() || $('html').scrollTop();
                window.location.hash = this.hash;
                $('html,body').scrollTop(scrollmem);
            });
        }); 
        
        $(".pop-over").popover({ trigger: "hover" });
    </script>

</html>