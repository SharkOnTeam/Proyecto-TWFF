<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>The World Fantasy Frida</title>

    <!-- Favicon  -->
    <link rel="icon" href="<?= base_url('TWFF/vendor/template/front_end/img/core-img/icon-twff.ico')?>">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="<?= base_url('TWFF/vendor/template/front_end/css/core-style.css')?>" type="text/css">
    <link rel="stylesheet" href="<?= base_url('TWFF/vendor/template/front_end/css/style.css')?>">

</head>

<body>
<style type="text/css">
    .boton_personalizado_cat{
        text-decoration: none;
        padding: 5px;
        font-weight: 400;
        font-size: 16px;
        color: #000000;
        background-color: #ffffff;
        border-radius: 1px;
        border: 2px solid #ffffff;
        cursor: pointer;
    }
    .boton_personalizado_sub{
        text-decoration: none;
        padding: 5px;
        font-weight: 400;
        font-size: 14px;
        color: grey;
        background-color: #ffffff;
        border-radius: 1px;
        border: 2px solid #ffffff;
        cursor: pointer;
    }

    
    /* Style The Dropdown Button */
    .dropbtn {
        background-color: #ffffff;
        color: white;
        padding: 0px;
        font-size: 16px;
        border: none;
        cursor: pointer;
    }

    /* The container <div> - needed to position the dropdown content */
    .dropdown {
        position: relative;
        display: inline-block;
    }

    /* Dropdown Content (Hidden by Default) */
    .dropdown-content {
        display: none;
        position: relative;
        background-color: #ffffff;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }

    /* Links inside the dropdown */
    .dropdown-content a {
        position: relative;
        min-width: 160px;
        color: black;
        padding: 0;
        text-decoration: none;
        display: block;
    }

    /* Change color of dropdown links on hover */
    .dropdown-content a:hover {
        background-color: #ffffff;
        color: black;    
    }

    /* Show the dropdown menu on hover */
    .dropdown:hover .dropdown-content {
        display: block;
    }

    /* Change the background color of the dropdown button when the dropdown content is shown */
    .dropdown:hover .dropbtn {
        background-color: #ffffff;
    }
</style>
    <!-- ##### Header Area Start ##### -->
    <header class="header_area">
        <div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
            <!-- Classy Menu -->
            <nav class="classy-navbar" id="essenceNav">
                <!-- Logo -->
                <a class="nav-brand" href="inicio"><img class="img-fluid" src="<?= base_url('TWFF/vendor/template/front_end/img/core-img/logo-v2.3.png')?>" alt=""><img src="<?= base_url('TWFF/vendor/template/front_end/img/core-img/TWFF_letras_v3.png')?>" alt=""></a>
                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>
                <!-- Menu -->
                <div class="classy-menu">
                    <!-- close btn -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>
                    <!-- Nav Start -->
                    <div class="classynav">
                        <ul>
                        <li><a href="conocenos">Conócenos</a></li>
                            <li><a href="#">Tienda</a>
                                <div class="megamenu">

                                    <form action="tienda" method="POST">
                                        <input type="hidden" name="filtro" id="filtro" value="">
                                        <li class="title"><button class="boton_personalizado_cat" type="submit">Todas los productos</button></li>
                                    </form>

                                    <?php foreach($categorias as $cat):    ?>
                                    <ul class="single-mega cn-col-4">
                                        <form action="tienda" method="POST">
                                            <input type="hidden" name="filtro" id="filtro" value="<?=$cat['categoria'];?>">
                                            <li class="title"><button class="boton_personalizado_cat" type="submit"><?=$cat['categoria']?></button></li>
                                        </form>

                                        <?php foreach($subcategorias as $sub):    
                                            if($cat['idCategoria'] == $sub['categoria_idCategoria']):?>
                                            <form action="tienda" method="POST">
                                                <input type="hidden" name="filtro" id="filtro" value="<?=$sub['subcategoria'];?>">
                                                <li><button class="boton_personalizado_sub" type="submit"><?=$sub['subcategoria']?></button></li>
                                            </form>
                                        
                                        <?php 
                                            endif;
                                        endforeach; ?>
                                    </ul>
                                    <?php endforeach; ?>

                                    <div class="single-mega cn-col-4 float-right">
                                        <img src="<?= base_url('TWFF/vendor/template/front_end/img/bg-img/slogan_v1.png')?>" alt="">
                                    </div>
                                    
                                </div>
                            </li>
                            <li><a href="ofertas">Ofertas</a></li>
                            <li><a href="#">Más</a>
                                <ul class="dropdown">
                                    <li><a href="comentarios">Cometarios</a></li>
                                    <li><a href="contacto">Contacto</a></li>
                                    <li><a href="faqs">FAQ's</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- Nav End -->
                </div>
            </nav>

            <!-- Header Meta Data -->
            <div class="header-meta d-flex clearfix justify-content-end">
                <!-- Search Area -->
                <div class="search-area">
                    <form action="#" method="post">
                        <input type="search" name="search" id="headerSearch" placeholder="Buscar">
                        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                </div>
                <!-- Favourite Area -->
                <div class="favourite-area">
                    <a href="favoritos"><img src="<?= base_url('TWFF/vendor/template/front_end/img/core-img/heart.svg')?>" alt=""></a>
                </div>
                
                <!-- Cart Area -->
                <div class="cart-area">
                    <a href="#" id="essenceCartBtn"><img src="<?= base_url('TWFF/vendor/template/front_end/img/core-img/cart.png')?>" alt=""> <span>0</span></a>
                </div>

                <!-- User Login Info -->
                <div class="user-login-info">
                    <div class="dropdown">
                        <a class="dropbtn" href="#" id="essenceUserBtn"><img src="<?= base_url('TWFF/vendor/template/front_end/img/core-img/user.svg')?>" alt=""></a>
                        <div class="dropdown-content">
                            <a href="login">Iniciar sesión</a>
                            <a href="login">Registrar</a>
                            <a href="#">Mi cuenta</a>
                            <a href="#">Cerrar sesión</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </header>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Right Side Cart Area ##### -->
    <div class="cart-bg-overlay"></div>

    <div class="right-side-cart-area">

        <!-- Cart Button -->
        <div class="cart-button">
            <a href="#" id="rightSideCart"><img src="<?= base_url('TWFF/vendor/template/front_end/img/core-img/cart.png')?>" alt=""> <span>0</span></a>
        </div>

        <div class="cart-content d-flex">

            <!-- Cart List Area -->
            <div class="cart-list">
                <!-- Single Cart Item -->
                <div class="single-cart-item">
                    <a href="#" class="product-image">
                        <img src="<?= base_url('TWFF/vendor/template/front_end/img/product-img/producto1.jpg')?>" class="cart-thumb" alt="">
                        <!-- Cart Item Desc -->
                        <div class="cart-item-desc">
                          <span class="product-remove"><i class="fa fa-close" aria-hidden="true"></i></span>
                            <span class="badge">Unicornio</span>
                            <h6>Cara de unicornio</h6>
                            <p class="size">Tamaño: Mediano</p>
                            <p class="price">$45.00</p>
                        </div>
                    </a>
                </div>

            </div>

            <!-- Cart Summary -->
            <div class="cart-amount-summary">

                <h2>Resumen de pedido</h2>
                <ul class="summary-table">
                    <li><span>Subtotal:</span> <span>$274.00</span></li>
                    <li><span>Envio:</span> <span>Free</span></li>
                    <li><span>Descuento:</span> <span>-15%</span></li>
                    <li><span>Total:</span> <span>$232.00</span></li>
                </ul>
                <div class="checkout-btn mt-100">
                    <a href="checkout.html" class="btn essence-btn">Pagar</a>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Right Side Cart End ##### -->
