<?php $session = session()?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title><?=$titulo?></title>

    <!-- Favicon  -->
    <link rel="icon" href="<?= base_url('TWFF/vendor/template/front_end/img/core-img/icon-twff.ico')?>">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="<?= base_url('TWFF/vendor/template/front_end/css/core-style.css')?>" type="text/css">
    <link rel="stylesheet" href="<?= base_url('TWFF/vendor/template/front_end/css/style.css')?>">
    <link rel="stylesheet" href="<?= base_url('TWFF/vendor/template/front_end/css/estilo.css')?>">

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

                                    <?php foreach($categorias as $cat):
                                        if($cat['deleted'] == 1):?>
                                            <ul class="single-mega cn-col-4">
                                            <form action="tienda" method="POST">
                                                <input type="hidden" name="filtro" id="filtro" value="<?=$cat['categoria'];?>">
                                                <li class="title"><button class="boton_personalizado_cat" type="submit"><?=$cat['categoria']?></button></li>
                                            </form>

                                            <?php foreach($subcategorias as $sub): 
                                                if($sub['deleted']==1):   
                                                    if($cat['idCategoria'] == $sub['categoria_idCategoria']):?>
                                                        <form action="tienda" method="POST">
                                                            <input type="hidden" name="filtro" id="filtro" value="<?=$sub['subcategoria'];?>">
                                                            <li><button class="boton_personalizado_sub" type="submit"><?=$sub['subcategoria']?></button></li>
                                                        </form>
                                                <?php endif;
                                                endif;
                                            endforeach; ?>
                                        </ul>
                                    <?php endif;
                                    endforeach; ?>

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
                    <a href="#" id="essenceCartBtn"><img src="<?= base_url('TWFF/vendor/template/front_end/img/core-img/cart.png')?>" alt=""> 
                    <?php if($session->has('usuario')):
                        if($session->has('mi_carrito')):
                            $carrito = $session->get('mi_carrito');
                            $numero_producto = 0;
                            for($i = 0; $i < count($carrito); $i++):

                                if($carrito[$i] != null):
                
                                    $numero_producto = $numero_producto + 1;
                
                                endif;
                
                            endfor;

                            echo '<span>'.$numero_producto.'</span>';
                        else:
                            echo '<span>0</span>';
                        endif;
                    else:
                        echo '<span>0</span>';
                    endif;
                    ?> 
                    </a>
                </div>

                <!-- User Login Info -->
                <div class="user-login-info">
                    <div class="dropdown">
                        <a class="dropbtn" href="#" id="essenceUserBtn"><img src="<?= base_url('TWFF/vendor/template/front_end/img/core-img/user.svg')?>" alt=""></a>
                        <div class="dropdown-content">
                            <?php if($session->has('usuario')){ ?><?php }else{?> <a href="login">Iniciar sesión</a> <?php } ?>
                            <?php if($session->has('usuario')){ ?><?php }else{?>  <a href="login">Registrar</a><?php } ?>
                            <?php if($session->has('usuario')){ ?> <a href="miperfil">Mi cuenta</a> <?php } ?>
                            <?php if($session->has('usuario')){ ?> <a href="usuario/cerrar_sesion">Cerrar sesión</a> <?php } ?>
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
            <a href="#" id="rightSideCart"><img src="<?= base_url('TWFF/vendor/template/front_end/img/core-img/cart.png')?>" alt=""> 
            <?php if($session->has('usuario')):
                if($session->has('mi_carrito')):
                    $carrito = $session->get('mi_carrito');
                    $numero_producto = 0;
                    for($i = 0; $i < count($carrito); $i++):
                        if($carrito[$i] != null):               
                            $numero_producto = $numero_producto + 1;               
                        endif;                
                    endfor;
                        echo '<span>'.$numero_producto.'</span>';
                    else:
                        echo '<span>0</span>';
                    endif;
                else:
                    echo '<span>0</span>';
                endif;
            ?> 
            </a>
        </div>

        <?php if($session->has('usuario')):
            if($session->has('mi_carrito')):
            $numero_producto = 0;

            $carrito = $session->get('mi_carrito');

            for($i = 0; $i < count($carrito); $i++):

                if($carrito[$i] != null):

                    $numero_producto = $numero_producto + 1;

                endif;

            endfor;

            if($numero_producto > 0):
            ?> 

                <div class="cart-content d-flex">
                    
                    <!-- Cart List Area -->
                    <div class="cart-list">
                        <!-- Single Cart Item -->
                        <?php  
                        if (isset($carrito)):
                            for ($i=0; $i < count($carrito); $i++): 								
                                if ($carrito[$i] != null) :
                            ?>
                        <div class="single-cart-item">
                            <a class="product-image">
                                <img src="<?= base_url('TWFF/vendor/uploads').'/'.$carrito[$i]['imagenProducto']?>" class="cart-thumb" alt="">
                                <!-- Cart Item Desc -->
                                <div class="cart-item-desc">
                                    <form action="mi_carrito/eliminar_carrito" method="POST">
                                        <input type="hidden" name="idProductoEliminar" value="<?=$i;?>">
                                        <span class="product-remove"><button class="btn" type="submit"><i class="fa fa-close" aria-hidden="true"></i></button></span>
                                    </form>
                                    <span class="badge"><?=$carrito[$i]['producto']; ?></span>
                                    <h6><?=$carrito[$i]['descripcionProducto']; ?></h6>
                                    <p class="color">Precio menudeo: <?=$carrito[$i]['precioMenudeo']?></p>
                                    <p class="color">Precio mayoreo: <?=$carrito[$i]['precioMayoreo']?></p>
                                    <?php if($carrito[$i]['descuento'] > 0): ?>
                                    <p class="color">Descuento: <?=$carrito[$i]['descuento'];?>%</p>  
                                    <?php endif;?>
                                </div>
                            </a>
                        </div>

                        <?php	
                                endif;
                            endfor;
                        endif;
                        ?>

                    </div>

                    <!-- Cart Summary -->
                    <div class="cart-amount-summary">

                        <div style="border-bottom: 3px solid black;" ><h3>Mi carrito</h3> </div>
                        <div style="margin-top:10px; margin-bottom:10px; height: 350px; overflow-x:auto; border-bottom: 3px solid black;">
                            <ul class="summary-table">
                                <?php  
                                if (isset($carrito)):
                                    $total = 0;
                                    for ($i=0; $i < count($carrito); $i++): 								
                                        if ($carrito[$i] != null) :
                                ?>
                                <div style="border-bottom: 2px solid grey; margin-top:5px;">
                                    <li><span>Producto:</span> <span><?=$carrito[$i]['producto']; ?></span></li>
                                    <li>
                                        <span>Cantidad:</span> 
                                        <form action="mi_carrito/actualizar_carrito" method="post">
                                            <input type="hidden" name="" value="<?=$i;?>">
                                            <input type="hidden" name="idProductoActualizar" value="<?=$i;?>">
                                            <span>
                                                <input type="number" name="cantidadActualizada" value="<?=$carrito[$i]['cantidad'];?>" min="1" max="<?=$carrito[$i]['stock'];?>" style="text-align: center;">
                                                <button class="btn btn-default" type="submit"><i class="fa fa-refresh"></i></button>
                                            </span>											
                                    </form>
                                    </li>
                                    <li><?php 
                                        if($carrito[$i]['cantidad'] < 30):
                                            echo '<span>Menudeo:</span>  <span>$ '.$carrito[$i]['precioMenudeo'].'</span>';
                                        else:
                                            echo '<span>Mayoreo:</span>  <span>$ '.$carrito[$i]['precioMayoreo'].'</span>';
                                        endif;
                                        ?>
                                    </li>
                                    <li><span>Descuento:</span> <span><?=$carrito[$i]['descuento'];?> % </span> </li>
                                    <li>
                                        <?php 
                                        if($carrito[$i]['cantidad'] < 30):
                                            if($carrito[$i]['descuento'] > 0): 
                                                $subtotal = $carrito[$i]['precioDescuento'] * $carrito[$i]['cantidad'];
                                                $total = $total + $subtotal;
                                                echo '<span>Subtotal:</span> <span> $ '.$subtotal.'</span>';
                                            else: 
                                                $subtotal = $carrito[$i]['precioMenudeo'] * $carrito[$i]['cantidad'];
                                                $total = $total + $subtotal;
                                                echo '<span>Subtotal:</span> <span> $ '.$subtotal.'</span>';
                                            endif;
                                        else:
                                            $subtotal = $carrito[$i]['precioMayoreo'] * $carrito[$i]['cantidad'];
                                            $total = $total + $subtotal;
                                            echo '<span>Subtotal:</span> <span> $ '.$subtotal.'</span>';
                                        endif;
                                        ?>
                                    </li>
                                </div>
                                <?php	
                                        endif;
                                    endfor;
                                endif;
                                $session->set('total',$total);
                                ?>
                                
                                
                            </ul>
                        </div>
                        <div>
                            <p style="font-weight: bold; padding-left:25px; color:black">Total: $<?=$total?></p>
                            <a href="mi_carrito" class="btn essence-btn">Continuar</a>
                        </div>
                    </div>
                
                </div>

            <?php else: ?>
                <div class="alert alert-warning" ><h5 style="text-align: center;">No hay productos en el carrito.</h5></div>
            <?php endif; 
            else: ?>
                <div class="alert alert-warning" ><h5 style="text-align: center;">No hay productos en el carrito.</h5></div>
            <?php endif; 
        else: ?>
            <div class="alert alert-warning" ><h5 style="text-align: center;">No hay productos en el carrito.</h5></div>
        <?php endif; ?>

    </div>
    <!-- ##### Right Side Cart End ##### -->
