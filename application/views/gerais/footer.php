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
                        if (!event.submitter.classList.contains('no-spinner')) {
                            $('.modal').modal('hide');
                            $('#spinner').modal('show');
                        }
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
    </body>   

</html>