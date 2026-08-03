<!DOCTYPE html>
<html lang="pt">

<head>

    <!-- Google Tag Manager -->
    <script>
    (function(w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
            'gtm.start': new Date().getTime(),
            event: 'gtm.js'
        });
        var f = d.getElementsByTagName(s)[0],
            j = d.createElement(s),
            dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src =
            'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-5QG4XHV');
    </script>
    <!-- End Google Tag Manager -->

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-6KRKW1QJ23"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-6KRKW1QJ23');
    </script>

    <!-- Tags Facebook -->
    <meta property="og:url" content="https://shopfloor.com.br" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="ShopFloor - ERP online e compacto para sua empresa" />
    <meta property="og:description"
        content="Software que controla a linha de produção de forma simples, rápida e eficiente. Além de gerenciar as áreas de compra e venda, financeira, estoque e muito mais!" />
    <meta property="og:image" content="<?php echo base_url('img/cover.jpg') ?>" />
    <meta property="fb:app_id" content="1076836432769187" />

    <meta name="twitter:image" content="<?php echo base_url('img/cover.jpg') ?>" />

    <meta charset="utf-8">
    <meta name="twitter:card" content="summary" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="Software que controla a linha de produção de forma simples, rápida e eficiente. Além de gerenciar as áreas de compra e venda, financeira, estoque e muito mais!">
    <meta name="keywords"
        content="ShooFloor, ERP, Sistema de Gestão, Produção, Nota Fiscal, Compras, Vendas, Financeiro">
    <meta name="author" content="ShopFloor">

    <link rel="shortcut icon" href="<?php echo base_url('img/logo-ico.ico') ?>" type="image/x-icon" />

    <title>ShopFloor - ERP online e compacto para sua empresa</title>

    <!-- Boostrap -->
    <link href="<?= base_url('/css/bootstrap.css'); ?>" rel="stylesheet" type="text/css" />

    <!-- Font Awesome Icons -->
    <link href="<?= base_url('/fontawesome-free/css/all.css'); ?>" rel="stylesheet" type="text/css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic'
        rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="<?= base_url('/css/magnific-popup.css'); ?>" rel="stylesheet" type="text/css" />

    <!-- Theme CSS - Includes Bootstrap -->
    <link href="<?= base_url('/css/creative.css'); ?>" rel="stylesheet" type="text/css" />

</head>

<body id="page-top">

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5QG4XHV" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
    <script>
    window.fbAsyncInit = function() {
        FB.init({
            xfbml: true,
            version: 'v6.0'
        });
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/pt_BR/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    </script>

    <!-- Your customer chat code -->
    <div class="fb-customerchat" attribution=setup_tool page_id="100170578264778" theme_color="#325D88"
        logged_in_greeting="Olá! Como podemos te ajudar?" logged_out_greeting="Olá! Como podemos te ajudar?">
    </div>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">&nbsp</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto my-2 my-lg-0">
                    <li class="nav-item">
                        <a class="link-start js-scroll-trigger" href="<?php echo base_url() ?>comece-agora">Experimente Grátis</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#modulos">Módulos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#precos">Preços</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#contact">Contato</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="<?php echo base_url() ?>login">Entrar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Masthead -->
    <header class="masthead">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-10 align-self-end">
                    <h1 class="text-uppercase text-white font-weight-bold">UM ERP Compacto e online para o Gerenciamento
                        da sua Empresa</h1>
                    <hr class="divider my-4">
                </div>
                <div class="col-lg-8 align-self-baseline">
                    <p class="text-white-75 mb-5">Somos um <strong>Sistema de Gestão</strong> simples, completo e eficiente
                        que controla todos processos da sua empresa. Da produção ao financeiro, das compras às vendas</p>
                    <a class="btn btn-primary btn-xl js-scroll-trigger" href="#modulos">Saiba Mais</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Services Section -->
    <section class="page-section bg-dark" id="modulos">
        <div class="container">            
            <div class="row">
                <div class="col-md-12 text-center mb-5">
                    <h2 class="section-heading text-white"><strong>Módulos</strong></h2>
                    <hr class="divider my-4">
                </div>
            </div>
            <div class="row mb-3">

                <div class="col-lg-4 col-md-6 text-center">
                    <div class="card border-secondary bg-transparent mb-5 mb-lg-0 card-modulo rounded-half-pill">
                        <div class="card-body">
                            <i class="fas fa-4x fa-cogs text-secondary mb-4"></i>
                            <h3 class="h3 text-white mb-2"><b>Produção</b></h3>
                            <hr class="bg-secondary">
                            <ul class="fa-ul text-muted">
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Engenharia de Produto</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Emissão de Ordem de Produção</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Reporte de Produção</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Baixa automática de Insumos</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Custo de Material</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Custo de Mão de Obra</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 text-center">
                    <div class="card border-secondary bg-transparent mb-5 mb-lg-0 card-modulo rounded-half-pill">
                        <div class="card-body">
                            <i class="fas fa-4x  fa-cash-register text-secondary mb-4"></i>
                            <h3 class="h3 text-white mb-2"><b>Vendas</b></h3>
                            <hr class="bg-secondary">
                            <ul class="fa-ul text-muted">
                            <li><span class="fa-li"><i class="fas fa-check"></i></span>Emissão de Orçamentos</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Emissão de Pedido de Venda</li>                                
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Controle de Comissão de Vendedores</li>                                
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Frente de Caixa</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Emissão de NFe e NFCe</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Integração Contas a Receber</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 text-center">
                    <div class="card border-secondary bg-transparent mb-5 mb-lg-0 card-modulo rounded-half-pill">
                        <div class="card-body">
                            <i class="fas fa-4x fa-shopping-cart text-secondary mb-4"></i>
                            <h3 class="h3 text-white mb-2"><b>Compras</b></h3>
                            <hr class="bg-secondary">
                            <ul class="fa-ul text-muted">
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Emissão de Ordens de Compra</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Emissão de Pedidos de Compra</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Conferência e Recebimento de Material</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Cálculo de Preço Médio</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Integração Contas a Pagar</li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">

                <div class="col-lg-4 col-md-6 text-center">
                    <div class="card border-secondary bg-transparent mb-5 mb-lg-0 card-modulo rounded-half-pill">
                        <div class="card-body">
                            <i class="fas fa-4x  fa-dolly text-secondary mb-4"></i>
                            <h3 class="h3 text-white mb-2"><b>Estoque</b></h3>
                            <hr class="bg-secondary">
                            <ul class="fa-ul text-muted">
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Posição de Estoque</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Custo de Estoque</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Movimentação de Materiais</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Execução de Inventário</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Requisição de Itens de Almoxarifado</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Controle por lote e validade</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 text-center">
                    <div class="card border-secondary bg-transparent mb-5 mb-lg-0 card-modulo rounded-half-pill">
                        <div class="card-body">
                            <i class="fas fa-4x  fa-hand-holding-usd text-secondary mb-4"></i>
                            <h3 class="h3 text-white mb-2"><b>Financeiro</b></h3>
                            <hr class="bg-secondary">
                            <ul class="fa-ul text-muted">
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Emissão de Títulos</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Controle de Contas a Receber</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Controle de Contas a Pagar</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Fluxo de Caixa</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>DRE e DFC Gerencial</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Controle de Orçamento</li>                                                                
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 text-center">
                    <div class="card border-secondary bg-transparent mb-5 mb-lg-0 card-modulo rounded-half-pill">
                        <div class="card-body">
                            <i class="fas fa-4x fa-clipboard-list text-secondary mb-4"></i>
                            <h3 class="h3 text-white mb-2"><b>Cadastro</b></h3>
                            <hr class="bg-secondary">
                            <ul class="fa-ul text-muted">
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Cadastro de Produtos</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Cadastro de Clientes</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Cadastro de Fornecedores e Trasportadores</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Cadastro de Vendedores</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Cadastros Financeiros</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Natureza de Operação</li>                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="page-section bg-light" id="app">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-5">
                        <div class="clearfix"></div>
                        <h2 class="section-heading text-info"><strong>Realize vendas externas através do nosso aplicativo</strong></h2>
                        <p class="lead">Onde seu vendedor estiver, ele pode emitir orçamentos, pedidos e efetuar faturamento para seus clientes. Este e outros recursos estão disponíveis no app ShopFloor - Vendedores. Baixe agora!</p>
                        <div class="badges">
                            <a class="badge-link" target="_blank" href="https://play.google.com/store/apps/details?id=br.com.shopfloor"><img src="img/google-play-badge.png" alt="" width="200"></a>
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-1"></div>
                    <div class="col-lg-6 col-md-6 text-center">
                        <img src="img/demo-screen-1.png" class="img-responsive" alt="">
                    </div>
                </div>

            </div>
            <!-- /.container -->

        </div>
    </section>

    <section class="page-section" id="industria">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center mb-5">
                    <h2 class="section-heading"><strong>Pra quem o ShopFloor é indicado</strong></h2>
                    <hr class="divider my-4">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 none">
                    <div class="col-md-1"></div>
                    <div class="col-md-10 text-center text-dark">
                        <p class="graph-omicron"><i class="fa-solid fa-4x fa-chart-line"></i></p>
                    </div>
                    <div class="col-md-1"></div>                     
                </div>
                <div class="col-md-6 col-xs-12 texto-center">
                    <h2 class="section-heading text-success">Somos um <strong>Sistema de Gestão</strong> focado em micro, pequenas e médias empresas da indústria de transformação</h2>
                    <p class="lead">
                        Para empresas que precisam melhorar a eficiência de suas operações e controlar os custos do seu negócio
                    </p> 
                    <p class="lead">
                        Para o empresário que busca otimizar seu processo de produção e aumentar a qualidade de seus produtos vendidos
                    </p> 
                    <p class="lead">
                        Para você que busca o controle completo da sua empresa. Experimente grátis por 30 dias!
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="page-section bg-primary" id="precos">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center mb-5">
                    <h2 class="section-heading text-white"><strong>Planos e preços</strong></h2>
                    <hr class="divider light my-4">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 ">
                    <div class="card border-secondary mb-3 rounded-half-pill">
                        <div class="card-body">
                            <h3 class="card-title mb-4"><span class="badge badge-secondary">Básico</span></h3>
                            <h3 class="card-title font-weight-bold mb-0">R$ 146,99/mês</h3>
                            <h5 class="text-muted mb-3">Plano Anual</h5>
                            <h3 class="card-title font-weight-bold mb-0">R$ 180,00/mês</h3>
                            <h5 class="text-muted mb-3">Plano Mensal</h5>
                            <hr>
                            <p class="card-text mb-0 text-dark"><i class="fas fa-check"></i> Até <strong>2</strong>
                                usuários</p>
                            <p class="card-text mb-0 text-dark"><i class="fa-solid fa-x text-danger"></i> Sem app vendedor</p>
                            <p class="card-text mb-0 text-dark"><i class="fas fa-check"></i> Acesso a todos módulos</p>
                            <a class="btn btn-secondary btn-xl btn-block js-scroll-trigger mt-3"
                                href="<?php echo base_url() ?>comece-agora">Quero Testar</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 ">
                    <div class="card border-warning mb-3 rounded-half-pill">
                        <div class="card-body">
                            <h3 class="card-title mb-4"><span class="badge badge-warning">Intermediário</span></h3>
                            <h3 class="card-title font-weight-bold mb-0">R$ 187,99/mês</h3>
                            <h5 class="text-muted mb-3">Plano Anual</h5>
                            <h3 class="card-title font-weight-bold mb-0">R$ 207,99/mês</h3>
                            <h5 class="text-muted mb-3">Plano Mensal</h5>
                            <hr>
                            <p class="card-text mb-0 text-dark"><i class="fas fa-check"></i> Até <strong>5</strong>
                                usuários</p>
                            <p class="card-text mb-0 text-dark"><i class="fas fa-check"></i> Até <strong>10</strong>
                                vendedores no app</p>
                            <p class="card-text mb-0 text-dark"><i class="fas fa-check"></i> Acesso a todos módulos</p>
                            <a class="btn btn-warning btn-xl btn-block js-scroll-trigger mt-3"
                                href="<?php echo base_url() ?>comece-agora">Quero Testar</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 ">
                    <div class="card border-info mb-3 rounded-half-pill">
                        <div class="card-body">
                            <h3 class="card-title mb-4"><span class="badge badge-info">Avançado</span></h3>
                            <h3 class="card-title font-weight-bold mb-0">R$ 224,99/mês</h3>
                            <h5 class="text-muted mb-3">Plano Anual</h5>
                            <h3 class="card-title font-weight-bold mb-0">R$ 248,00/mês</h3>
                            <h5 class="text-muted mb-3">Plano Mensal</h5>
                            <hr>
                            <p class="card-text mb-0 text-dark"><i class="fas fa-check"></i> Até <strong>10</strong>
                                usuários</p>
                            <p class="card-text mb-0 text-dark"><i class="fas fa-check"></i> Até <strong>15</strong>
                                vendedores no app</p>
                            <p class="card-text mb-0 text-dark"><i class="fas fa-check"></i> Acesso a todos módulos</p>
                            <a class="btn btn-info btn-xl btn-block js-scroll-trigger mt-3"
                                href="<?php echo base_url() ?>comece-agora">Quero Testar</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 ">
                    <div class="card border-success mb-3 rounded-half-pill">
                        <div class="card-body">
                            <h3 class="card-title mb-4"><span class="badge badge-success">Premium</span></h3>
                            <h3 class="card-title font-weight-bold mb-0">R$ 251,99/mês</h3>
                            <h5 class="text-muted mb-3">Plano Anual</h5>
                            <h3 class="card-title font-weight-bold mb-0">R$ 285,00/mês</h3>
                            <h5 class="text-muted mb-3">Plano Mensal</h5>
                            <hr>
                            <p class="card-text mb-0 text-dark"><i class="fas fa-check"></i> Até <strong>15</strong>
                                usuários</p>
                            <p class="card-text mb-0 text-dark"><i class="fas fa-check"></i> Até <strong>20</strong>
                                vendedores no app</p>
                            <p class="card-text mb-0 text-dark"><i class="fas fa-check"></i> Acesso a todos módulos</p>
                            <a class="btn btn-success btn-xl btn-block js-scroll-trigger mt-3"
                                href="<?php echo base_url() ?>comece-agora">Quero Testar</a>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <!-- Footer -->
    <!-- Footer -->
    <footer class="bg-dark text-white" id="contact">
        <!-- Grid container -->
        <div class="container p-4">
            <!-- Section: Social media -->
            <section class="mb-4 text-center">
                <!-- Facebook -->
                <a class="btn btn-outline-light btn-floating m-1" href="https://www.facebook.com/shopfloor.com.br"
                    role="button" target="_blank"><i class="fab fa-facebook-f"></i></a>

                <!-- Instagram -->
                <a class="btn btn-outline-light btn-floating m-1" href="https://www.instagram.com/shopfloor_erp/"
                    role="button" target="_blank"><i class="fab fa-instagram"></i></a>

                <!-- Linkedin -->
                <a class="btn btn-outline-light btn-floating m-1" href="https://www.linkedin.com/company/shopfloor-erp"
                    role="button" target="_blank"><i class="fab fa-linkedin-in"></i></a>
            </section>
            <!-- Section: Social media -->

            <!-- Section: Form -->
            <section class="mb-5">
                <form action="">
                    <!--Grid row-->
                    <div class="row d-flex justify-content-center">
                        <!--Grid column-->
                        <div class="col-auto">
                            <p class="pt-2">
                                <strong>Assine nossa newsletter</strong>
                            </p>
                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-md-5 col-12">
                            <!-- Email input -->
                            <div class="form-outline form-white mb-4">
                                <input type="email" id="form5Example2" class="form-control" />
                            </div>
                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-auto">
                            <!-- Submit button -->
                            <button type="submit" class="btn btn-outline-light mb-4">
                                Assinar!
                            </button>
                        </div>
                        <!--Grid column-->
                    </div>
                    <!--Grid row-->
                </form>
            </section>
            <!-- Section: Form -->

            <!-- Section: Links -->
            <section class="">
                <!--Grid row-->
                <div class="row">
                    <!--Grid column-->
                    <div class="col-lg-3 col-md-12 mb-4 mb-md-0">
                        <h5>Contato</h5>
                        <ul class="list-unstyled mb-0">
                            <li>
                                <i class="far fa-envelope text-muted"></i> <a href="#!"
                                    class="text-white">contato@shopfloor.com.br</a>
                            </li>
                            <br>
                            <li>
                                <i class="fab fa-whatsapp text-muted"></i> (41) 9 9619-2794
                            </li>
                            <li>
                                <i class="fas fa-map-marker-alt  text-muted"></i> Curitiba/PR
                            </li>
                            <br>
                            <li>
                                <i class="fab fa-whatsapp text-muted"></i> (42) 9 8819-2794
                            </li>
                            <li>
                                <i class="fas fa-map-marker-alt  text-muted"></i> Guarapuava/PR
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-12 mb-4 mb-md-0">
                        <h5>O ShopFloor</h5>
                        <p>
                            O Shopfloor é um sistema de gestão 100% online, você pode acessar de qualquer lugar e gerenciar a sua empresa mesmo à distância.
                        </p>
                    </div>                   

                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0 text-center">
                        <h5>Acessos</h5>

                        <ul class="list-unstyled mb-0">
                            <li>
                                <a href="https://shopfloor.com.br/login" class="text-white">Login</a>
                            </li>
                            <li>
                                <a href="https://shopfloor.com.br/login-vendedor" class="text-white">Login do
                                    Vendedor</a>
                            </li>
                            <li>
                                <a href="https://shopfloor.com.br/comece-agora" class="text-white">Quero testar</a>
                            </li>
                            <li>
                                <a href="http://blog.shopfloor.com.br/termos-condicoes-uso/" class="text-white">Termos
                                    de uso</a>
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0 text-center">
                        <h5>Suporte</h5>

                        <ul class="list-unstyled mb-0">
                            <li>
                                <a href="https://blog.shopfloor.com.br/category/base-conhecimento/" class="text-white"
                                    target="_blank">Base de Conhecimento</a>
                            </li>
                            <li>
                                <a href="https://blog.shopfloor.com.br/category/novas-funcionalidades/"
                                    class="text-white" target="_blank">Novas Funcionalidades</a>
                            </li>
                            <li>
                                <a href="https://blog.shopfloor.com.br/category/apoio-teorico/" class="text-white"
                                    target="_blank">Apoio Teórico</a>
                            </li>
                            <li>
                                <a href="https://blog.shopfloor.com.br" class="text-white" target="_blank">Blog do
                                    ShopFloor</a>
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->
                    <!--Grid column-->
                </div>
                <!--Grid row-->
            </section>
            <!-- Section: Links -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2023 Copyright - ShopFloor
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->


    <script src="<?= base_url('/js/jquery-3.4.1.min.js'); ?>" type="text/javascript"></script>

    <!-- Bootstrap core JavaScript -->
    <script src="<?= base_url('/js/bootstrap.bundle.min.js'); ?>" type="text/javascript"></script>

    <!-- Plugin JavaScript -->
    <script src="<?= base_url('/js/jquery.easing.min.js'); ?>" type="text/javascript"></script>
    <script src="<?= base_url('/js/jquery.magnific-popup.min.js'); ?>" type="text/javascript"></script>

    <!-- Custom scripts for this template -->

    <script src="<?= base_url('/js/creative.min.js'); ?>" type="text/javascript"></script>

</body>

</html>