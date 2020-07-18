<?php include_once('template/header.php'); ?>

<div class="breadcumb_area bg-img" style="background-image: url(<?= base_url('TWFF/vendor/template/front_end/img/bg-img/bg-acerca.jpg')?>);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 ">
                    <div class="page-title text-center">
                        <h2>Iniciar sesión</h2>
                    </div>
                </div>
            </div>
        </div>
</div>

    <!-- ##### Checkout Area Start ##### -->
    <div class="checkout_area section-padding-80">
        <div class="container">
            <div class="row">

                <div class="col-12 col-md-6 col-lg-5 ml-lg-auto">
                    <div class="checkout_details_area mt-50 clearfix">

                        <div class="cart-page-heading mb-30">
                            <h5>Regístrate</h5>
                        </div>

                        <form action="#" method="post">
                            <div class="row">                                
                                <div class="col-8 mb-4">
                                    <label for="email_address">Correo electrónico <span>*</span></label>
                                    <input type="email" class="form-control" id="email_address" value="" placeholder="Ingresa tu correo electrónico" required>
                                </div>
                                <div class="col-md-8 mb-3">
                                    <label for="password">Contraseña <span>*</span></label>
                                    <input type="password" class="form-control" id="password" value="" required placeholder="Ingresa contraseña">
                                </div>
                                <div class="col-md-8 mb-3">
                                    <a href="">¿Olvidé mi contraseña?</a>
                                    <br>
                                </div>
                                <div class="col-md-8 mb-3">
                                    <br>
                                </div>
                                
                                <div class="col-md-8 mb-3">
                                    <a href="#" class="btn essence-btn">Registrarme</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-5 ml-lg-auto">
                    <div class="order-details-confirmation">

                        <div class="cart-page-heading">
                            <h5>Iniciar sesión</h5>
                        </div>

                        <form action="#" method="post">
                            <div class="row">                                
                                <div class="col-12 mb-4">
                                    <label for="email_address">Correo electrónico </label>
                                    <input type="email" class="form-control" id="email_address" value="" placeholder="Ingresa tu correo electrónico">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="password">Contraseña </label>
                                    <input type="password" class="form-control" id="password" value="" required placeholder="Ingresa tu contraseña">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <a href="#" class="btn essence-btn">Iniciar sesión</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Checkout Area End ##### -->

<?php include_once('template/footer.php'); ?>