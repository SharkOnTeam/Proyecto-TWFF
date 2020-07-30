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
                                    <?php foreach($categorias as $cat):?>
                                    <li data-toggle="collapse" data-target="#<?=$cat['categoria'];?>">
                                        <a href="#"><?=$cat['categoria'];?></a>
                                        
                                        <ul class="sub-menu collapse" id="<?=$cat['categoria'];?>">
                                            <form action="tienda" method="POST">
                                                <input type="hidden" name="filtro" id="filtro" value="<?=$cat['categoria'];?>">
                                                <button class="boton_cat" type="submit">Todas</button>
                                            </form>
                                            <?php foreach($subcategorias as $sub):    
                                            if($cat['idCategoria'] == $sub['categoria_idCategoria']):?>
                                                <form action="tienda" method="POST">
                                                    <input type="hidden" name="filtro" id="filtro" value="<?=$sub['subcategoria'];?>">
                                                    <button class="boton_cat" type="submit"><?=$sub['subcategoria'];?></button>
                                                </form>
                                            <?php 
                                            endif;
                                        endforeach; ?>
                                        </ul>
                                            
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>

                        <!-- ##### Single Widget ##### -->
                        <div class="widget price mb-50">
                            <!-- Widget Title -->
                            <h6 class="widget-title mb-30">Filtrar por</h6>
                            <!-- Widget Title 2 -->
                            <p class="widget-title2 mb-30">Precio</p>

                            <div class="widget-desc">
                                <div class="slider-range">
                                    <div data-min="0" data-max="3000" data-unit="$" class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" data-value-min="0" data-value-max="3000" data-label-result="Rango:">
                                        <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                                        <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                        <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                    </div>
                                    <div class="range-price">Rango: $0.00 - $3000.00</div>
                                </div>
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
                            
                            <?php foreach($productos as $produc): ?>
                            <div class="col-12 col-sm-6 col-lg-4">
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
                            </div>
                            <?php endforeach; ?>
                            

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