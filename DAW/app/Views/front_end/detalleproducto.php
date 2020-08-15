<?php $session = session()?>
<!-- ##### Single Product Details Area Start ##### -->
<?php if(count($detalle_producto)>0):
    foreach($detalle_producto as $det): 
        if($det['deleted'] == 1):?>
    <section class="single_product_details_area d-flex align-items-center">
        <!-- Single Product Thumb -->
        <div class="single_product_desc clearfix ">
            <div class="product_thumbnail_slides owl-carousel">
                <img src="<?=$det['imagenProducto'];?>" alt="" style="width: 85%; height:auto;" class="mx-auto">
                <img src="<?=$det['imagenProducto2'];?>" alt="" style="width: 85%; height:auto;" class="mx-auto">
            </div>
        </div>

        <!-- Single Product Description -->
        <div class="single_product_desc clearfix fluid-right">
            <span></span>
            <h2><?=$det['producto'];?></h2>
            <h6 class="product-desc"><?=$det['descripcionProducto'];?></h6>

            <?php if(count($proofer)>0):
                foreach($proofer as $pro): 
                    if($pro['deleted'] == 1):   
                        if($pro['idProducto'] == $det['idProducto']):?>
                            <p>Descuento: <span class="product-price">-<?=$pro['descuento'];?> %</span></p>
                            <p>Precio por menudeo: </p><p class="product-price"><span class="old-price">$<?=$pro['precioMenudeo'];?></span> $<?=$pro['precioDescuento'];?></p>
                            <p>Precio por mayoreo: </p><p class="product-price">$<?=$det['precioMayoreo'];?></p>
                        <?php else:?>
                            <p>Precio por menudeo: </p><p class="product-price">$<?=$det['precioMenudeo'];?></p>
                            <p>Precio por mayoreo: </p><p class="product-price">$<?=$det['precioMayoreo'];?></p>
                        <?php endif;
                    endif;
                endforeach;
            endif;?>

            <!-- Form -->
            <form class="cart-form clearfix" method="post">
                            
                <!-- Cart & Favourite Box -->
                <div class="cart-fav-box d-flex align-items-center">
                    <!-- Cart -->
                    <button type="submit" name="addtocart" value="5" class="btn essence-btn">Agregar al carrito</button>
                    <!-- Favourite -->
                    <div class="product-favourite ml-4">
                        <a href="#" class="favme fa fa-heart"></a>
                    </div>
                </div>
            </form>

        </div>            
    </section>
    <?php endif;
        endforeach; 
    endif;?>

    <!-- ##### Single Product Details Area End ##### -->