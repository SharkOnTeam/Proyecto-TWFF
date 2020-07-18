<?php $i=0?>

<style>

    p.cali {
        position: relative;
        overflow: hidden;
        display: inline-block;
    }

    p.cali input {
        position: absolute;
        top: -100px;
    }

    p.cali label {
        font-size: 30px;
        float: right;
        color: #DCDCDC;
    }
    p.cali input:checked ~ label {
        color: #ECF700;
    }

    p.clasificacion {
        position: relative;
        overflow: hidden;
        display: inline-block;
    }

    p.clasificacion input {
        position: absolute;
        top: -100px;
    }

    p.clasificacion label {
        font-size: 40px;
        float: right;
        color: #DCDCDC;
        cursor: pointer;
    }

    p.clasificacion label:hover,
    p.clasificacion label:hover ~ label,
    p.clasificacion input:checked ~ label {
        color: #ECF700;
    }
    
    textarea{
        resize:none;
    }
</style>

<div class="breadcumb_area bg-img" style="background-image: url(<?= base_url('TWFF/vendor/template/front_end/img/bg-img/bg-acerca.jpg')?>);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>Comentarios</h2>
                    </div>
                </div>
            </div>
        </div>
</div>
    <!-- ##### Checkout Area Start ##### -->
    <div class="checkout_area section-padding-80">
        <div class="container">
            <div class="row">

                <div class="col-12 col-md-6">
                    <div class="checkout_details_area mt-50 clearfix">

                        <div class="cart-page-heading mb-30">
                            <h5>Lo que opinan de nosotros...</h5>
                            <br>
                            <div class="row" style="height: 500px; overflow-x:auto;">
                                <?php foreach($comentarios as $comen): $i = $i + 1;?>
                                <div class="col-12 col-md-6">
                                    <p class="cali" id="radio<?=$i?>">
                                        <input id="radio1" type="radio" name="estrellas<?=$i?>" disabled <?php if($comen['calificacion'] == 5){echo "checked";}?> >
                                        <label for="radio1">★</label>
                                        <input id="radio2" type="radio" name="estrellas<?=$i?>" disabled <?php if($comen['calificacion'] == 4){echo "checked";}?>>
                                        <label for="radio2">★</label>
                                        <input id="radio3" type="radio" name="estrellas<?=$i?>" disabled <?php if($comen['calificacion'] == 3){echo "checked";}?>>
                                        <label for="radio3">★</label>
                                        <input id="radio4" type="radio" name="estrellas<?=$i?>" disabled <?php if($comen['calificacion'] == 2){echo "checked";}?>>
                                        <label for="radio4">★</label>
                                        <input id="radio5" type="radio" name="estrellas<?=$i?>" disabled <?php if($comen['calificacion'] == 1){echo "checked";}?>>
                                        <label for="radio5">★</label>   
                                    </p>
                                    <h5><?=$comen['palabraComentario'];?></h5>
                                    <p><?=$comen['usuario'];?> | <?=$comen['fechaComentario'];?></p>
                                    <p><?=$comen['comentario'];?></p>
                                </div>
                                <?php endforeach; ?>
                            </div>
 

                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-5 ml-lg-auto">
                    <div class="order-details-confirmation">

                        <div class="cart-page-heading">
                            <h5>Déjanos tu opinión</h5>
                        </div>

                        <form action="#" method="post">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="first_name">Nombre <span>*</span></label>
                                    <input type="text" class="form-control" id="first_name" value="" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="asunto">Descríbenos en una palabra... <span>*</span></label>
                                    <input type="text" class="form-control" id="asunto" value="" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="comentario">Comenatrio<span>*</span></label>  
                                    <textarea name="comentario" class="form-control" id="comentario" cols="30" rows="6"></textarea>
                                </div>

                                <label for="">Califícanos</label>
                                <div class="col-md-12 mb-3">
                                    <p class="clasificacion" id="radio">
                                        <input id="radioA" type="radio" name="estrellas" value="5">
                                        <label for="radioA">★</label>
                                        <input id="radioB" type="radio" name="estrellas" value="4">
                                        <label for="radioB">★</label>
                                        <input id="radioC" type="radio" name="estrellas" value="3">
                                        <label for="radioC">★</label>
                                        <input id="radioD" type="radio" name="estrellas" value="2">
                                        <label for="radioD">★</label>
                                        <input id="radioE" type="radio" name="estrellas" value="1">
                                        <label for="radioE">★</label>
                                    </p>
                                </div>
                            </div>

                            <a href="#" class="btn essence-btn">Enviar</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Checkout Area End ##### -->