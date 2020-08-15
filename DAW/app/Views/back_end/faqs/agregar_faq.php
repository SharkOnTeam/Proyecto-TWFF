<?php $session = session();?>
<!-- Validación del formulario-->
<script type="text/javascript">

    //Validar para agregar 
	function validarEspacio(){

        var pregunta = document.getElementById('pregunta').value;
        var respuesta = document.getElementById('respuesta').value;
        
        //Validar espacios en blanco
	    if(pregunta == null || pregunta.length == 0 || /^\s*$/.test(pregunta)){

            document.getElementById('alerta').style.display = 'block';
            document.getElementById('alerta2').style.display = 'none';
          
		    return false;

        }

        //Validar que sea mayor a tres
        if(pregunta.length <= 3){
            document.getElementById('alerta2').style.display = 'block';
            document.getElementById('alerta').style.display = 'none';
          
		    return false;

        }

        //Validar espacios en blanco
	    if(respuesta == null || respuesta.length == 0 || /^\s*$/.test(respuesta)){

            document.getElementById('alerta3').style.display = 'block';
            document.getElementById('alerta4').style.display = 'none';

            return false;

        }

            //Validar que sea mayor a tres
        if(respuesta.length <= 3){
            document.getElementById('alerta4').style.display = 'block';
            document.getElementById('alerta3').style.display = 'none';

            return false;

        }

			
    }

    function teclear(){
        document.getElementById('alerta').style.display = 'none';
        document.getElementById('alerta2').style.display = 'none';
        document.getElementById('alerta3').style.display = 'none';
        document.getElementById('alerta4').style.display = 'none';
    }


</script>


            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">

                    <?php if($session->getFlashdata('alerta_categoria') != null): ?>
                            <div class="col-sm-12" id="alerta_unico">
                                <div class="sufee-alert alert with-close alert-warning alert-dismissible fade show">
                                    <span class="badge badge-pill badge-warning">Error </span>
                                     <?=$session->getFlashdata('alerta_categoria')?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                    <?php endif;?>
                    
                        <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Agregar</strong> FAQ
                                    </div>
                    
                                     <?php if($faq != null): ?>
                                    <!-- Formulario para modificar categoria-->
                                    <form action="faq/modificar_faq" method="post" class="">
                                    <div class="card-body card-block">
                                        <?php foreach($faq as $cat): ?>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <input type="hidden" id="idFaq" name="idFaq" class="form-control" value="<?=$cat['idFaq'];?>">
                                                <label for="pregunta" class=" form-control-label">Pregunta</label>
                                                <small class="form-text text-muted">Ingresa la pregunta</small>
                                                <input type="text" id="pregunta" name="pregunta" placeholder="Ingresa la pregunta..." 
                                                class="form-control" value="<?=$cat['pregunta'];?>" 
                                                oninput="return teclear()">
                                                <div class="alert alert-danger" role="alert" id="alerta" style="display: none;">
											        Porfavor ingrese una pregunta.
                                                </div>
                                                <div class="alert alert-danger" role="alert" id="alerta2" style="display: none;">
											        Porfavor ingresa una pregunta mayor a 3 carácteres.
										        </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="deleted" class=" form-control-label">Estatus</label>
                                                <small class="form-text text-muted">Selecciona una opción</small>
                                                <select name="deleted" id="deleted" class="form-control">
                                                    <option value="1" <?php if($cat['deleted'] == 1): echo 'selected'; endif; ?>>Activo</option>
                                                    <option value="0" <?php if($cat['deleted'] == 0): echo 'selected'; endif; ?>>Inactivo</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="respuesta" class=" form-control-label">Respuesta</label>
                                                <small class="form-text text-muted">Ingresa la respuesta</small>
                                                <input type="text" id="respuesta" name="respuesta" placeholder="Ingresa la respuesta..." 
                                                class="form-control" value="<?=$cat['respuesta'];?>" 
                                                oninput="return teclear()">
                                                <div class="alert alert-danger" role="alert" id="alerta3" style="display: none;">
											        Porfavor ingrese una respuesta.
                                                </div>
                                                <div class="alert alert-danger" role="alert" id="alerta4" style="display: none;">
											        Porfavor ingresa una respuesta mayor a 3 carácteres.
										        </div>
                                            </div>
                                        </div>
                                        <?php   endforeach; ?>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-md" onclick="return validarEspacio()">
                                            <i class="fa fa-check"></i> Agregar
                                        </button>
                                        <a href="faq" class="btn btn-danger btn-md">
                                        <i class="fa fa-ban"></i> Cancelar </a>
                                    </div> 
                                    </form>

                                    <?php  else:?>
                                    
                                    <!-- Formulario para agregar categoria-->
                                    <form action="faq/guardar_faq" method="post" class="" enctype="multipart/form-data">
                                    <div class="card-body card-block">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="pregunta" class=" form-control-label">Pregunta</label>
                                                <small class="form-text text-muted">Ingresa la pregunta</small>
                                                <input type="text" id="pregunta" name="pregunta" placeholder="Ingresa la pregunta..." 
                                                class="form-control" value="" 
                                                oninput="return teclear()">
                                                <div class="alert alert-danger" role="alert" id="alerta" style="display: none;">
											        Porfavor ingrese una pregunta.
                                                </div>
                                                <div class="alert alert-danger" role="alert" id="alerta2" style="display: none;">
											        Porfavor ingresa una pregunta mayor a 3 carácteres.
										        </div>
                                            </div>
                                        <div class="form-group col-md-6">
                                            <label for="deleted" class=" form-control-label">Estatus</label>
                                            <small class="form-text text-muted">Selecciona una opción</small>
                                            <select name="deleted" id="deleted" class="form-control">
                                                <option value="1">Activo</option>
                                                <option value="0">Inactivo</option>
                                            </select>
                                        </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                                <label for="respuesta" class=" form-control-label">Respuesta</label>
                                                <small class="form-text text-muted">Ingresa la respuesta</small>
                                                <input type="text" id="respuesta" name="respuesta" placeholder="Ingresa la respuesta..." 
                                                class="form-control" value="" 
                                                oninput="return teclear()">
                                                <div class="alert alert-danger" role="alert" id="alerta3" style="display: none;">
											        Porfavor ingrese una respuesta.
                                                </div>
                                                <div class="alert alert-danger" role="alert" id="alerta4" style="display: none;">
											        Porfavor ingresa una respuesta mayor a 3 carácteres.
										        </div>
                                            </div>
                                    </div> 
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-md" onclick="return validarEspacio()">
                                            <i class="fa fa-check"></i> Agregar
                                        </button>
                                        <a href="faq" class="btn btn-danger btn-md">
                                        <i class="fa fa-ban"></i> Cancelar </a>
                                    </div>
                                    </form>
                                    <?php endif;?>                                  
                                                                       
                                </div>
                        </div>
                    
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>