<?php $session = session();
$i=0;?>

<script type="text/javascript">

    //Validar para agregar 
	function validarEspacio(){

        var palabra = document.getElementById('palabra').value;
        var comentario = document.getElementById('comentario').value;

        //Validar espacios en blanco
	    if(palabra == null || palabra.length == 0 || /^\s*$/.test(palabra)){
            document.getElementById('alerta2').style.display = 'none';
            document.getElementById('alerta').style.display = 'block';
            document.getElementById('palabra').className = 'is-invalid form-control';
		    return false;
        }

        if(comentario == null || comentario.length == 0 || /^\s*$/.test(comentario)){
            document.getElementById('alerta4').style.display = 'none';
            document.getElementById('alerta3').style.display = 'block';
            document.getElementById('comentario').className = 'is-invalid form-control';
		    return false;
        }

        //Validar que sea mayor a tres
        if(palabra.length <= 3){
            document.getElementById('alerta2').style.display = 'block';
            document.getElementById('alerta').style.display = 'none';
            document.getElementById('palabra').className = 'is-invalid form-control';
		    return false;
        }

        if(comentario.length <= 3){
            document.getElementById('alerta4').style.display = 'block';
            document.getElementById('alerta3').style.display = 'none';
            document.getElementById('comentario').className = 'is-invalid form-control';
            return false;
        }

        opciones = document.getElementsByName("estrellas");

        var seleccionado = false;
        for(var i=0; i<opciones.length; i++) {
            if(opciones[i].checked) {
                seleccionado = true;
                break;
            }
        }

        if(!seleccionado) {
            document.getElementById('alerta5').style.display = 'block';
            return false;
        }
        	
    }

    function changeColor(){

        var palabra = document.getElementById('palabra').value;

        if(palabra.length == 0 || /^\s*$/.test(palabra)){
            
            document.getElementById('palabra').className = 'is-invalid form-control';
            document.getElementById('alerta').style.display = 'block';
            document.getElementById('alerta2').style.display = 'none';

        } else {

            if(palabra.length <= 3){
                document.getElementById('palabra').className = 'is-invalid form-control';
                document.getElementById('alerta2').style.display = 'block';
                document.getElementById('alerta').style.display = 'none';

            }else{
                document.getElementById('palabra').className = 'is-valid form-control';
                document.getElementById('alerta').style.display = 'none';
                document.getElementById('alerta2').style.display = 'none';
            }
            
        }

    }

    function changeColor2(){

        var comentario = document.getElementById('comentario').value;

        if(comentario.length == 0 || /^\s*$/.test(comentario)){
            
            document.getElementById('comentario').className = 'is-invalid form-control';
            document.getElementById('alerta3').style.display = 'block';
            document.getElementById('alerta4').style.display = 'none';

        } else {

            if(comentario.length <= 3){
                document.getElementById('comentario').className = 'is-invalid form-control';
                document.getElementById('alerta4').style.display = 'block';
                document.getElementById('alerta3').style.display = 'none';

            }else{
                document.getElementById('comentario').className = 'is-valid form-control';
                document.getElementById('alerta3').style.display = 'none';
                document.getElementById('alerta4').style.display = 'none';
            }
            
        }
    }

    function cancelar(){
        document.getElementById('palabra').value = '';
        document.getElementById('comentario').value = '';
    }
    
</script>

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
                                <?php if(count($comentarios)>0):
                                    foreach($comentarios as $comen): $i = $i + 1;
                                        if($comen['deleted']==1):?>
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
                                        <?php endif; 
                                    endforeach; 
                                else:?>
                                <h3>No hay comentarios.</h3>
                                <?php endif; ?>
                            </div>
 

                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-5 ml-lg-auto">
                    <div class="order-details-confirmation">
                    <?php if($session->has('usuario')){ ?>
                        <div class="cart-page-heading">
                            <h5>Déjanos tu opinión</h5>
                        </div>

                        <form action="comentarios/guardar_comentario" method="post">
                            <div class="row">
                                <input type="hidden" class="form-control" id="idUsuario" name="idUsuario" value="<?=$session->get('idUsuario'); ?>">
                                <div class="col-md-12 mb-3">
                                    <label for="palabra">Descríbenos en una palabra... <span>*</span></label>
                                    <input type="text" class="form-control" id="palabra" name="palabra" value="" 
                                    oninput="return changeColor()" onkeypress="return soloLetras(event)" onblur="limpia()">
                                    <div class="alerta alerta-danger" id="alerta" style="display: none;">Porfavor ingresa una palabra</div>
                                    <div class="alerta alerta-danger" id="alerta2" style="display: none;">Porfavor ingresa una palabra con más de 3 carácteres. </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="comentario">Comenatrio<span>*</span></label>  
                                    <textarea name="comentario" class="form-control" id="comentario" name="comentario" cols="30" rows="6"
                                    oninput="return changeColor2()"></textarea>
                                    <div class="alerta alerta-danger" id="alerta3" style="display: none;">Porfavor ingresa una comentario</div>
                                    <div class="alerta alerta-danger" id="alerta4" style="display: none;">Porfavor ingresa una comentario con más de 3 carácteres. </div>
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
                                    <div class="alerta alerta-danger" id="alerta5" style="display: none;">Porfavor seleccione una calificación</div>
                                </div>
                            </div>

                            <button type="submit" class="btn essence-btn" onclick="return validarEspacio()">Enviar</button>
                            <button class="btn btn-cancelar" onclick="return cancelar()">Cancelar</button>
                        </form>
                    <?php }else{ ?>
                        <h5>Inicia sessión y déjanos tu opinón.</h5>
                        <a href="login">Iniciar sesión |</a>
                        <a href="login">Registrar</a>
                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Checkout Area End ##### -->