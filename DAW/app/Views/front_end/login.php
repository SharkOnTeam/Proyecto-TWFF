<?php $session = session();?>


<script type="text/javascript">

    function teclear(){
        document.getElementById('alerta').style.display = 'none';
    }

    //Validar para agregar 
	function validarForm(){

        var usuario = document.getElementById('usuario_r').value;
        var email = document.getElementById('email_r').value;
        var password = document.getElementById('password_r').value;
        var password2 = document.getElementById('password_r_2').value;

        //Validar espacios en blanco
        if(usuario == null || usuario.length == 0 || /^\s*$/.test(usuario)){
            document.getElementById('alerta_usuario_vacio').style.display = 'block';
            document.getElementById('alerta_usuario_lenght').style.display = 'none';
            return false;
        }

        //validar longitud de usuario
        if(usuario.length <= 3){
            document.getElementById('alerta_usuario_lenght').style.display = 'block';
            document.getElementById('alerta_usuario_vacio').style.display = 'none';
            return false;
        }

        //Validar espacios en blanco
        if(email == null || email.length == 0 || /^\s*$/.test(email)){
            document.getElementById('alerta_email_vacio').style.display = 'block';
            return false;
        }

        //Validar espacios en blanco
        if(password == null || password.length == 0 || /^\s*$/.test(password)){
            document.getElementById('alerta_password_vacio').style.display = 'block';
            document.getElementById('alerta_password_lenght').style.display = 'none';
            document.getElementById('alerta_password_igual').style.display = 'none';
            return false;
        }
 

        //Validar la contraseña
        if(password.length < 8){		
            document.getElementById('alerta_password_vacio').style.display = 'none';
            document.getElementById('alerta_password_lenght').style.display = 'block';
            document.getElementById('alerta_password_igual').style.display = 'none';
            return false;
        }

        /*if(!/^[A-Za-z0-9]$/.test(password)){
            document.getElementById('alerta_password_lenght').style.display = 'none';
            document.getElementById('alerta_password_formato').style.display = 'block';
            document.getElementById('password_r').className = 'is-invalid form-control';
            return false;
        }*/

        if(password != password2){
            document.getElementById('alerta_password_vacio').style.display = 'none';
            document.getElementById('alerta_password_lenght').style.display = 'none';
            document.getElementById('alerta_password_igual').style.display = 'block';
            return false;
        }
    
    }

    function teclear2(){
        document.getElementById('alerta_usuario_vacio').style.display = 'none';
        document.getElementById('alerta_usuario_lenght').style.display = 'none';
        document.getElementById('alerta_email_vacio').style.display = 'none';
        document.getElementById('alerta_password_vacio').style.display = 'none';
        document.getElementById('alerta_password_lenght').style.display = 'none';
        document.getElementById('alerta_password_igual').style.display = 'none';
        document.getElementById('alerta_r').style.display = 'none';
    }

</script>

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
                            <?php if($session->getFlashdata('alerta_usuario') != null): ?>
                                <div class="alerta alerta-danger" id="alerta_r"><?=$session->getFlashdata('alerta_usuario')?></div>
                            <?php
                            endif;
                            if($session->getFlashdata('alerta_email') != null): ?>
                                <div class="alerta alerta-danger" id="alerta_r"><?=$session->getFlashdata('alerta_email')?></div>
                            <?php
                            endif;?>
                            <?php if($session->getFlashdata('alerta_error') != null): ?>
                                    <div class="alerta alerta-danger" id="alerta_r"><?=$session->getFlashdata('alerta_error')?></div>
                                <?php
                            endif;?>
                            <?php if($session->getFlashdata('alerta_exitoso') != null): ?>
                                <div class="alert alert-success" id="alerta_r"><?=$session->getFlashdata('alerta_exitoso')?></div>
                            <?php
                            endif;?>

                        <form action="usuario/registrar_usuario" method="post">
                            <div class="row">
                                <div class="col-8 mb-4">
                                    <label for="usuario_r">Nombre de usuario<span>*</span></label>
                                    <input type="text" class="form-control" id="usuario_r" value="" name="usuario_r" placeholder="Ingrese su nombre de usuario"
                                    oninput="return teclear2()">
                                    <div class="alert alert-danger" role="alert" id="alerta_usuario_vacio" style="display: none;">
										Porfavor ingrese un nombre de usuario.
                                    </div>
                                    <div class="alert alert-danger" role="alert" id="alerta_usuario_lenght" style="display: none;">
										Porfavor ingresa un nombre de usuario mayor a 3 carácteres.
									</div>
                                </div>                               
                                <div class="col-8 mb-4">
                                    <label for="email_r">Correo electrónico <span>*</span></label>
                                    <input type="email" class="form-control" id="email_r" value="" name="email_r" placeholder="Ingrese su correo electrónico"
                                    oninput="return teclear2()">
                                    <div class="alert alert-danger" role="alert" id="alerta_email_vacio" style="display: none;">
										Porfavor ingrese un correo electrónico.
                                    </div>
                                </div>
                                <div class="col-md-8 mb-3">
                                    <label for="password_r">Contraseña <span>*</span></label>
                                    <input type="password" class="form-control" id="password_r" value="" name="password_r" placeholder="Ingrese su contraseña"
                                    oninput="return teclear2()">
                                    <div class="alert alert-danger" role="alert" id="alerta_password_vacio" style="display: none;">
										Porfavor ingrese una contraseña.
                                    </div>
                                    <div class="alert alert-danger" role="alert" id="alerta_password_lenght" style="display: none;">
										Porfavor ingresa una contraseña con mínimo 8 carácteres.
                                    </div>
                                    <div class="alert alert-danger" role="alert" id="alerta_password_formato" style="display: none;">
										La contraseña debe tener al menos una letra mayúscula, una letra minúscula, un número y un carácter especial (#$@!%&*?).
									</div>
                                </div>
                                <div class="col-md-8 mb-3">
                                    <label for="password_r_2">Confirmar contraseña <span>*</span></label>
                                    <input type="password" class="form-control" id="password_r_2" value="" placeholder="Vuelva a igresar su contraseña"
                                    oninput="return teclear2()">
                                    <div class="alert alert-danger" role="alert" id="alerta_password_igual" style="display: none;">
										Las contraseñas no coinciden.
									</div>
                                </div>
                                <div class="col-md-8 mb-3">
                                    <a href="" style="color: blue;">¿Olvidé mi contraseña?</a>
                                    <br>
                                </div>
                                
                                <div class="col-md-8 mb-3">
                                    <button type="submit" class="btn essence-btn" onclick="return validarForm()">Registrarme</button>
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
                        
                        <?php if($session->getFlashdata('alerta_login') != null): ?>
                                <div class="alerta alerta-danger" id="alerta"><?=$session->getFlashdata('alerta_login')?></div>
                        <?php endif;?>
                        <form action="usuario/iniciar_sesion" method="POST">
                            
                            <div class="row">                                
                                <div class="col-12 mb-4">
                                    <label for="usuario">Correo electrónico/Nombre de usuario </label>
                                    <input type="text" class="form-control" id="usuario" name="usuario" value="" placeholder="Ingresa tu correo electrónico o nombre de usuario"
                                    oninput="return teclear()">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="password">Contraseña </label>
                                    <input type="password" class="form-control" id="password" name="password" value="" placeholder="Ingresa tu contraseña"
                                    oninput="return teclear()">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <button type="submit" class="btn essence-btn">Iniciar sesión</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Checkout Area End ##### -->
