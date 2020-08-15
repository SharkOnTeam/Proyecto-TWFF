<?php $session = session();?>
<!-- Validación del formulario-->
<script type="text/javascript">

    //Validar para agregar 
	function validarEspacio(){

        var descripcionOferta = document.getElementById('descripcionOferta').value;
        var descuento = document.getElementById('descuento').value;
        
        //Validar espacios en blanco
	    if(descripcionOferta == null || descripcionOferta.length == 0 || /^\s*$/.test(descripcionOferta)){

            document.getElementById('alerta').style.display = 'block';
            document.getElementById('alerta2').style.display = 'none';
          
		    return false;

        }

        //Validar que sea mayor a tres
        if(descripcionOferta.length <= 3){
            document.getElementById('alerta2').style.display = 'block';
            document.getElementById('alerta').style.display = 'none';
          
		    return false;

        }

        //Validar espacios en blanco
	    if(descuento == null || descuento.length == 0 || /^\s*$/.test(descuento)){

            document.getElementById('alerta3').style.display = 'block';

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
                                        <strong>Agregar</strong> Oferta
                                    </div>
                    
                                     <?php if($oferta != null): ?>
                                    <!-- Formulario para modificar categoria-->
                                    <form action="oferta/modificar_oferta" method="post" class="">
                                    <div class="card-body card-block">
                                        <?php foreach($oferta as $cat): ?>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <input type="hidden" id="idOferta" name="idOferta" class="form-control" value="<?=$cat['idOferta'];?>">
                                                <label for="descripcionOferta" class=" form-control-label">Descripción</label>
                                                <small class="form-text text-muted">Ingrese la descripción</small>
                                                <input type="text" id="descripcionOferta" name="descripcionOferta" placeholder="Ingresa la descripción..." 
                                                class="form-control" value="<?=$cat['descripcionOferta'];?>" 
                                                oninput="return teclear()">
                                                <div class="alert alert-danger" role="alert" id="alerta" style="display: none;">
											        Porfavor ingrese una descripcion.
                                                </div>
                                                <div class="alert alert-danger" role="alert" id="alerta2" style="display: none;">
											        Porfavor ingresa una descripcion mayor a 3 carácteres.
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
                                                <label for="descuento" class=" form-control-label">Descuento</label>
                                                <small class="form-text text-muted">Ingresa el descuento</small>
                                                <input type="number" id="descuento" name="descuento" placeholder="Ingresa el descuento..." 
                                                class="form-control" value="<?=$cat['descuento'];?>" 
                                                oninput="return teclear()">
                                                <div class="alert alert-danger" role="alert" id="alerta3" style="display: none;">
											        Porfavor ingrese un descuento.
                                                </div>
                                            </div>
                                        </div>
                                        <?php   endforeach; ?>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-md" onclick="return validarEspacio()">
                                            <i class="fa fa-check"></i> Agregar
                                        </button>
                                        <a href="oferta" class="btn btn-danger btn-md">
                                        <i class="fa fa-ban"></i> Cancelar </a>
                                    </div> 
                                    </form>

                                    <?php  else:?>
                                    
                                    <!-- Formulario para agregar categoria-->
                                    <form action="oferta/guardar_oferta" method="post" class="" enctype="multipart/form-data">
                                    <div class="card-body card-block">
                                        <div class="row">
                                        <div class="form-group col-md-6">
                                                <input type="hidden" id="idOferta" name="idOferta" class="form-control" value="">
                                                <label for="descripcionOferta" class=" form-control-label">Descripción</label>
                                                <small class="form-text text-muted">Ingrese la descripción</small>
                                                <input type="text" id="descripcionOferta" name="descripcionOferta" placeholder="Ingresa la descripción..." 
                                                class="form-control" value="" 
                                                oninput="return teclear()">
                                                <div class="alert alert-danger" role="alert" id="alerta" style="display: none;">
											        Porfavor ingrese una descripcion.
                                                </div>
                                                <div class="alert alert-danger" role="alert" id="alerta2" style="display: none;">
											        Porfavor ingresa una descripcion mayor a 3 carácteres.
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
                                                <label for="descuento" class=" form-control-label">Descuento</label>
                                                <small class="form-text text-muted">Ingresa el descuento</small>
                                                <input type="number" id="descuento" name="descuento" placeholder="Ingresa el descuento..." 
                                                class="form-control" value="" 
                                                oninput="return teclear()">
                                                <div class="alert alert-danger" role="alert" id="alerta3" style="display: none;">
											        Porfavor ingrese un descuento.
                                                </div>
                                            </div>
                                    </div> 
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-md" onclick="return validarEspacio()">
                                            <i class="fa fa-check"></i> Agregar
                                        </button>
                                        <a href="oferta" class="btn btn-danger btn-md">
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