<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="<?= base_url('TWFF/vendor/template/back_end/images/logo-v2.3.png')?>" alt="TWFF"><img src="<?= base_url('TWFF/vendor/template/back_end/images/TWFF_letras_v3.png')?>" alt="TWFF">
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="usuario/iniciar_sesion" method="post">
                                <div class="form-group">
                                    <label>Usuario</label>
                                    <input class="au-input au-input--full" type="usuario" name="usuario" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                                </div>
                                <div class="login-checkbox">
                                    <label>
                                        <a href="#">¿Olvidaste tu contraseña?</a>
                                    </label>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Iniciar sesión</button>
                            </form>
                            <div class="register-link">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
