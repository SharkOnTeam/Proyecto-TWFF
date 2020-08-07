<?php $session = session()?>
<!-- ##### Breadcumb Area Start ##### -->
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

  .boton_cat{
    text-decoration: none;
    padding: auto;
    font-weight: 400;
    font-size: 14px;
    color: grey;
    background-color: #ffffff;
    border: solid #ffffff;
    cursor: pointer;
  }
</style>


<div class="breadcumb_area bg-img" style="background-image: url(<?= base_url('TWFF/vendor/template/front_end/img/bg-img/bg-inicio3.jpeg')?>);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>Piñatas</h2>
                        <h6><?=$nombre?></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Shop Grid Area Start ##### -->
    <section class="shop_grid_area section-padding-80">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="shop_sidebar_area">

                        <!-- ##### Single Widget ##### -->
                        <div class="widget catagory mb-50">
                            <!-- Widget Title -->
                            <h6 class="widget-title mb-30">Catagorias</h6>

                            <!--  Catagories  -->
                            <div class="catagories-menu">
                                <ul id="menu-content2" class="menu-content collapse show">
                                    <!-- Single Item -->
                                    
                                    <?php if(count($categorias)>0):
                                        foreach($categorias as $cat):
                                            if($cat['deleted']==1): ?>
                                                <li data-toggle="collapse" data-target="#<?=$cat['categoria'];?>">
                                                    <a href="#"><?=$cat['categoria'];?></a>
                                                    
                                                    <ul class="sub-menu collapse" id="<?=$cat['categoria'];?>">
                                                        <form action="tienda" method="POST">
                                                            <input type="hidden" name="filtro" id="filtro" value="<?=$cat['categoria'];?>">
                                                            <button class="boton_cat" type="submit">Todas</button>
                                                        </form>

                                                        <?php if(count($subcategorias)>0):
                                                            foreach($subcategorias as $sub):  
                                                                if($sub['deleted']==1):  
                                                                    if($cat['idCategoria'] == $sub['categoria_idCategoria']):?>
                                                                        <form action="tienda" method="POST">
                                                                            <input type="hidden" name="filtro" id="filtro" value="<?=$sub['subcategoria'];?>">
                                                                            <button class="boton_cat" type="submit"><?=$sub['subcategoria'];?></button>
                                                                        </form>
                                                                    <?php 
                                                                    endif;
                                                                endif;
                                                            endforeach; 
                                                        else:?>
                                                        <h3>No hay subcategorías registradas</h3>
                                                        <?php endif;?>

                                                    </ul>
                                                        
                                                </li>
                                        <?php endif; 
                                        endforeach; 
                                    else:?>
                                    <h3>No hay categorías registradas</h3>
                                    <?php endif;?>
                                    
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-12 col-md-8 col-lg-9">
                    <div class="shop_grid_product_area">
                        <div class="row">
                            <div class="col-12">
                                <div class="product-topbar d-flex align-items-center justify-content-between">
                                    <!-- Total Products -->
                                    <div class="total-products">
                                        <p><span><?php echo count($productos) ?></span> Productos encontrados</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <!-- Single Product -->
                            
                            <?php if(count($productos)>0):
                                foreach($productos as $produc): 
                                    if($produc['deleted'] == 1):?>                                  
                                        <div class="col-12 col-sm-6 col-lg-4">
                                            <div class="single-product-wrapper">
                                                <!-- Product Image -->
                                                <div class="product-img">
                                                    <img src="<?=base_url('TWFF/vendor/uploads').'/'.$produc['imagenProducto'];?>" alt="">
                                                    <!-- Hover Thumb -->
                                                    <img class="hover-img" src="<?=base_url('TWFF/vendor/uploads').'/'.$produc['imagenProducto2'];?>" alt="">

                                                    <!-- Product Badge -->
                                                    <?php if(count($proofer)>0):
                                                        foreach($proofer as $pro): 
                                                            if($pro['deleted'] == 1):   
                                                                if($produc['idProducto'] == $pro['idProducto']):?>
                                                                    <div class="product-badge offer-badge">
                                                                        <span>-<?=$pro['descuento'];?> %</span>
                                                                    </div>
                                                            <?php endif;
                                                            endif;
                                                        endforeach;
                                                    endif;?>
                                                    <!-- Favourite -->
                                                    <div class="product-favourite">
                                                        <a href="#" class="favme fa fa-heart"></a>
                                                    </div>
                                                </div>

                                                <!-- Product Description -->
                                                <div class="product-description">

                                                    <h6><?=$produc['producto'];?></h6>

                                                    <?php foreach($proofer as $pro):    
                                                        if($produc['idProducto'] == $pro['idProducto']):?>
                                                    <div class="product-badge offer-badge">
                                                        <p class="product-price">Menudeo: <span class="old-price">$<?=$pro['precioMenudeo'];?></span> $<?=$pro['precioDescuento'];?></p>
                                                        <p class="product-price">Mayoreo: $<?=$produc['precioMayoreo'];?></p>
                                                    </div>
                                                        <?php else:?>
                                                            <p class="product-price">Menudeo: $<?=$produc['precioMenudeo'];?></p>
                                                            <p class="product-price">Mayoreo: $<?=$produc['precioMayoreo'];?></p>
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
                                        </div>
                            <?php   endif;
                                endforeach; 
                            else:?>
                                <h3>No hay productos.</h3>
                            <?php endif;?>
                            

                        </div>
                    </div>
                    <!-- Pagination -->
                    <nav aria-label="navigation">
                        <ul class="pagination mt-50 mb-70">
                            <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-left"></i></a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Shop Grid Area End ##### -->