<!-- ##### Single Product Details Area Start ##### -->
    <section class="single_product_details_area d-flex align-items-center">

        <!-- Single Product Thumb -->
        <?php foreach($detalle_producto as $det): ?>
        <div class="single_product_thumb clearfix">
            <div class="product_thumbnail_slides owl-carousel">
                <img src="<?=$det['imagenProducto'];?>" alt="" style="width: 85%; height:auto;" class="mx-auto">
                <img src="<?=$det['imagenProducto2'];?>" alt="" style="width: 85%; height:auto;" class="mx-auto">
            </div>
        </div>

        <!-- Single Product Description -->
        <div class="single_product_desc clearfix">
            <span></span>
            <h2><?=$det['producto'];?></h2>
            <p class="product-price"><span class="old-price">$65.00</span>$ <?=$det['precio'];?></p>
            <p class="product-desc"><?=$det['descripcionProducto'];?></p>

            <!-- Form -->
            <form class="cart-form clearfix" method="post">
                <!-- Select Box 
                <div class="select-box d-flex mt-50 mb-30">
                    <select name="select" id="productSize" class="mr-5">
                        <option value="value">Tamaño Garnde</option>
                        <option value="value">Tmaño Chica</option>
                    </select>
                </div>-->
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
        <?php endforeach; ?>
    </section>
    <!-- ##### Single Product Details Area End ##### -->