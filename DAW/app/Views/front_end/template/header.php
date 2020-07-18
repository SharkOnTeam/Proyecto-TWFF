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
    <!-- ##### Header Area Start ##### -->
    <header class="header_area">
        <div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
            <!-- Classy Menu -->
            <nav class="classy-navbar" id="essenceNav">
                <!-- Logo -->
                <a class="nav-brand" href="inicio"><img src="<?= base_url('TWFF/vendor/template/front_end/img/core-img/logo-twff2.png')?>" alt=""></a>
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
                                    <?php foreach($categorias as $cat):    ?>
                                    <ul class="single-mega cn-col-4">
                                        <li class="title"><a href="tienda"><?=$cat['categoria']?></a></li>

                                        <?php foreach($subcategorias as $sub):    
                                            if($cat['idCategoria'] == $sub['categoria_idCategoria']):?>
                                            <li><a href="tienda"><?=$sub['subcategoria']?></a></li>
                                        
                                        <?php 
                                            endif;
                                        endforeach; ?>
                                    </ul>
                                    <?php endforeach; ?>
                                    <div class="single-mega cn-col-4">
                                        <a href="tienda">Todas las piñatas</a>
                                        <img src="<?= base_url('TWFF/vendor/template/front_end/img/bg-img/bg-nav.png')?>" alt="">
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
                <!-- User Login Info -->
                <div class="user-login-info">
                    <a href="login" id="essenceUserBtn"><img src="<?= base_url('TWFF/vendor/template/front_end/img/core-img/user.svg')?>" alt=""></a>
                </div>
                <!-- Cart Area -->
                <div class="cart-area">
                    <a href="#" id="essenceCartBtn"><img src="<?= base_url('TWFF/vendor/template/front_end/img/core-img/cart.png')?>" alt=""> <span>0</span></a>
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
