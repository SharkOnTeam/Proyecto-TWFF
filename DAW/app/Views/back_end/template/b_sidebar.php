<?php $session = session();?>  
<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="b_inicio">
                            <img src="<?=base_url('TWFF/vendor/template/back_end/images/logo-v2.3.png')?>" alt="TWFF"><img src="<?=base_url('TWFF/vendor/template/back_end/images/TWFF_letras_v3.png')?>" alt="TWFF">
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li>
                            <a href="b_inicio">
                                <i class="fas fa-home"></i>Inicio</a>
                        </li>
                        <li>
                            <a href="categoria">
                                <i class="fas fa-tag"></i>Categorías</a>
                        </li>
                        <li>
                            <a href="comentario">
                                <i class="fas fa-comment"></i>Comentarios</a>
                        </li>
                        <li>
                            <a href="faq">
                                <i class="fas fa-question"></i>Faqs</a>
                        </li>
                        <li>
                            <a href="oferta">
                                <i class="fas fa-percent"></i>Ofertas</a>
                        </li>
                        <li>
                            <a href="pedido">
                                <i class="fas fa-list-ul"></i>Pedidos</a>
                        </li>
                        <li>
                            <a href="producto">
                                <i class="fas fa-cubes"></i>Productos</a>
                        </li>
                        <li>
                            <a href="subcategoria">
                                <i class="fas fa-tags"></i>Subcategorías</a>
                        </li>
                        <li>
                            <a href="usuario">
                                <i class="fas fa-users"></i>Usuarios</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Pages</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="login.html">Login</a>
                                </li>
                                <li>
                                    <a href="register.html">Register</a>
                                </li>
                                <li>
                                    <a href="forget-pass.html">Forget Password</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="b_inicio">
                <img src="<?=base_url('TWFF/vendor/template/back_end/images/logo-v2.3.png')?>" alt="TWFF"><img src="<?=base_url('TWFF/vendor/template/back_end/images/TWFF_letras_v3.png')?>" alt="TWFF">
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                    <li>
                            <a href="b_inicio">
                                <i class="fas fa-home"></i>Inicio</a>
                        </li>
                        <li>
                            <a href="categoria">
                                <i class="fas fa-tag"></i>Categorías</a>
                        </li>
                        <li>
                            <a href="comentario">
                                <i class="fas fa-comment"></i>Comentarios</a>
                        </li>
                        <li>
                            <a href="faq">
                                <i class="fas fa-question"></i>Faqs</a>
                        </li>
                        <li>
                            <a href="oferta">
                                <i class="fas fa-percent"></i>Ofertas</a>
                        </li>
                        <li>
                            <a href="pedido">
                                <i class="fas fa-list-ul"></i>Pedidos</a>
                        </li>
                        <li>
                            <a href="producto">
                                <i class="fas fa-cubes"></i>Productos</a>
                        </li>
                        <li>
                            <a href="subcategoria">
                                <i class="fas fa-tags"></i>Subcategorías</a>
                        </li>
                        <li>
                            <a href="usuario">
                                <i class="fas fa-users"></i>Usuarios</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Pages</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="login.html">Login</a>
                                </li>
                                <li>
                                    <a href="register.html">Register</a>
                                </li>
                                <li>
                                    <a href="forget-pass.html">Forget Password</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->
        
         <!-- PAGE CONTAINER-->
         <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                
                            </form>
                            <div class="header-button">
                                <div class="noti-wrap">
                                    <div class="noti__item js-item-menu">
                                       
                                    </div>
                                    <div class="noti__item js-item-menu">
                                       
                                       
                                    </div>
                                    <div class="noti__item js-item-menu">
                                       
                                    </div>
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><?=$session->get('usuario')?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="account-dropdown__footer">
                                                <form action="usuario/cerrar_sesion" method="post">
                                                    <a href="usuario/cerrar_sesion"><i class="zmdi zmdi-power"></i>Cerrar sesión</a>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->
 