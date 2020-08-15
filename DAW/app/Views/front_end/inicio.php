<?php $session = session()?>

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
                <?php if(count($categorias) > 0):
                    foreach($categorias as $cat):    
                        if($cat['deleted'] == 1): ?>
                        <div class="col-12 col-sm-6 col-md-4" style="margin-top: 10px;">
                            <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url(<?=base_url('TWFF/vendor/uploads').'/'.$cat['imagenCategoria']?>);">
                                <div class="catagory-content">
                                    <a href="tienda"><?=$cat['categoria']?></a>
                                </div>
                            </div>
                        </div>                  
                <?php   endif; 
                    endforeach; 
                endif;?>
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
                        <?php if(count($productos)>0):
                            foreach($productos as $produc):
                                if($produc['deleted'] == 1):?>
                                    <div class="single-product-wrapper">
                                        <!-- Product Image -->
                                        <div class="product-img">
                                            <img src="<?=base_url('TWFF/vendor/uploads').'/'.$produc['imagenProducto'];?>" alt="">
                                            <!-- Hover Thumb -->
                                            <img class="hover-img" src="<?=base_url('TWFF/vendor/uploads').'/'.$produc['imagenProducto2'];?>" alt="">
                                            
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
                                                if($produc['deleted'] == 1):   
                                                    if($produc['idProducto'] == $pro['idProducto']):?>
                                                        <div class="product-badge offer-badge">
                                                            <p class="product-price">Menudeo: <span class="old-price">$<?=$pro['precioMenudeo'];?></span> $<?=$pro['precioDescuento'];?></p>
                                                            <p class="product-price">Mayoreo: $<?=$produc['precioMayoreo'];?></p>
                                                        </div>
                                                    <?php else:?>
                                                        <p class="product-price">Menudeo: $<?=$produc['precioMenudeo'];?></p>
                                                        <p class="product-price">Mayoreo: $<?=$produc['precioMayoreo'];?></p>
                                            <?php   endif;
                                                endif;
                                            endforeach;?>
                                            <form action="detalleproducto" method="POST">
                                                <input type="hidden" name="producto" id="producto" value="<?=$produc['idProducto'];?>">
                                                <button class="boton_personalizado" type="submit">Ver detalles</button>
                                            </form>

                                            <!-- Hover Content -->
                                            <div class="hover-content">
                                                <!-- Add to Cart -->
                                                <div class="add-to-cart-btn">
                                                    <form action="mi_carrito/carrito" method="POST">

                                                    <input type="hidden" name="idProducto" value="<?=$produc['idProducto'];?>">
                                                    <input type="hidden" name="producto" value="<?=$produc['producto'];?>">
                                                    <input type="hidden" name="precioMenudeo" value="<?=$produc['precioMenudeo'];?>">
                                                    <input type="hidden" name="precioMayoreo" value="<?=$produc['precioMayoreo'];?>">
                                                    <input type="hidden" name="descripcionProducto" value="<?=$produc['descripcionProducto'];?>">
                                                    <input type="hidden" name="cantidad" value="1">
                                                    <input type="hidden" name="stock" value="<?=$produc['stock'];?>">
                                                    <input type="hidden" name="imagenProducto" value="<?=$produc['imagenProducto'];?>">

                                                    <?php foreach($proofer as $pro):    
                                                        if($produc['idProducto'] == $pro['idProducto']):?>
                                                            <input type="hidden" name="descuento" value="<?=$pro['descuento'];?>">
                                                            <input type="hidden" name="precioDescuento" value="<?=$pro['precioDescuento'];?>">
                                                        <?php else:?>
                                                            <input type="hidden" name="descuento" value="0">
                                                            <input type="hidden" name="precioDescuento" value="<?=$produc['precioMenudeo'];?>">
                                                        <?php endif;
                                                    endforeach;?>

                                                    <button class="btn essence-btn" type="submit">Agregar al carrito</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif;
                            endforeach;
                        else:?>
                            <h3>No hay productos nuevos</h3>
                        <?php endif;?>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### New Arrivals Area End ##### -->

   