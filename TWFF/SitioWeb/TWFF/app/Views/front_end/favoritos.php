<?php include_once('template/header.php'); ?>

<div class="breadcumb_area bg-img" style="background-image: url(<?= base_url('TWFF/vendor/template/front_end/img/bg-img/bg-acerca.jpg')?>);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h3>Productos favoritos</h3>
                    </div>
                </div>
            </div>
        </div>
</div>

<!-- ##### Blog Wrapper Area Start ##### -->
<div class="blog-wrapper section-padding-80">
        <div class="container">
            <div class="row">

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Descripción</th>
                                <th>Precio</th>
                                <th>Disponibilidad</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><img src="<?= base_url('TWFF/vendor/template/front_end/img/product-img/producto2.PNG')?>" alt="" width="100" height="auto"></td>
                                <td>Producto 1</td>
                                <td>$300.00</td>
                                <td>Disponible</td>
                                <td><button type="submit" name="addtocart" value="5" class="btn essence-btn" width="100" height="auto">Agregar al carrito</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    <!-- ##### Blog Wrapper Area End ##### -->

<?php include_once('template/footer.php'); ?>