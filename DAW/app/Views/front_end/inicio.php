<?php //echo $cabecera; ?>

<style type="text/css">
  .boton_personalizado{
    text-decoration: none;
    padding: 5px;
    font-weight: 400;
    font-size: 12px;
    color: #ffffff;
    background-color: #0315ff;
    border-radius: 1px;
    border: 2px solid #ffffff;
    cursor: pointer;
  }
</style>

    <!-- ##### Welcome Area Start ##### -->
    <section class="welcome_area bg-img background-overlay" style="background-image: url(<?= base_url('TWFF/vendor/template/front_end/img/bg-img/bg-inicio4.jpeg')?>);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="hero-content">
                        <h6>The World Fantasy Frida</h6>
                        <h2>"Tu imaginación hecha realidad"</h2>
                        <a href="tienda" class="btn essence-btn">Ver productos</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Welcome Area End ##### -->

    <!-- ##### Top Catagory Area Start ##### -->
    <div class="top_catagory_area section-padding-80 clearfix">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Single Catagory -->
                <?php foreach($categorias as $cat):    ?>
                <div class="col-12 col-sm-6 col-md-4" style="margin-top: 10px;">
                    <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url(<?=$cat['imagenCategoria']?>);">
                        <div class="catagory-content">
                            <a href="tienda"><?=$cat['categoria']?></a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <!-- ##### Top Catagory Area End ##### -->

    <!-- ##### CTA Area Start ##### -->
    <div class="cta-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cta-content bg-img background-overlay" style="background-image: url(<?= base_url('TWFF/vendor/template/front_end/img/bg-img/bg-oferta2.png')?>);">
                        <div class="h-100 d-flex align-items-center justify-content-end">
                            <div class="cta--text">
                                <h6>Increibles</h6>
                                <h2>Ofertas</h2>
                                <a href="ofertas" class="btn essence-btn">Comprar ahora</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### CTA Area End ##### -->

    <!-- ##### New Arrivals Area Start ##### -->
    <section class="new_arrivals_area section-padding-80 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center">
                        <h2>¡Lo más nuevo!</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="popular-products-slides owl-carousel">

                        <!-- Single Product -->
                        <?php foreach($productos as $produc):?>
                        <div class="single-product-wrapper">
                            <!-- Product Image -->
                            <div class="product-img">
                                <img src="<?=$produc['imagenProducto'];?>" alt="">
                                <!-- Hover Thumb -->
                                <img class="hover-img" src="<?=$produc['imagenProducto2'];?>" alt="">
                                
                                <!-- Product Badge -->
                                <?php foreach($proofer as $pro):    
                                    if($produc['idProducto'] == $pro['idProducto']):?>
                                        <div class="product-badge offer-badge">
                                            <span>-<?=$pro['descuento'];?>%</span>
                                        </div>
                                    <?php endif;
                                endforeach;?>
                                <!-- Favourite -->
                                <div class="product-favourite">
                                    <a href="#" class="favme fa fa-heart"></a>
                                </div>
                                
                            </div>
                            <!-- Product Description -->
                            <div class="product-description">
                                <span>Producto nuevo</span>
                                <h6><?=$produc['producto'];?></h6>
                                <?php foreach($proofer as $pro):    
                                    if($produc['idProducto'] == $pro['idProducto']):?>
                                        <div class="product-badge offer-badge">
                                            <p class="product-price"><span class="old-price">$<?=$pro['precio'];?></span> $<?=$pro['precioDescuento'];?></p>
                                        </div>
                                    <?php else:?>
                                        <p class="product-price">$<?=$produc['precio'];?></p>
                                <?php endif;
                                endforeach;?>
                                <form action="detalleproducto" method="POST">
                                    <input type="hidden" name="producto" id="producto" value="<?=$produc['idProducto'];?>">
                                    <button class="boton_personalizado" type="submit">Ver detalles</button>
                                </form>

                                <!-- Hover Content -->
                                <div class="hover-content">
                                    <!-- Add to Cart -->
                                    <div class="add-to-cart-btn">
                                        <a href="#" class="btn essence-btn">Agregar al carrito</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach;?>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### New Arrivals Area End ##### -->

   