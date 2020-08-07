<?php $session = session();?>
<!-- Validación del formulario-->
<script type="text/javascript">

    //Validar para agregar 
	function validarEspacio(){

        var categoria = document.getElementById('categoria').value;
        var imagenCategoria = document.getElementById('imagenCategoria');
        
        //Validar espacios en blanco
	    if(categoria == null || categoria.length == 0 || /^\s*$/.test(categoria)){

            document.getElementById('alerta').style.display = 'block';
            document.getElementById('alerta2').style.display = 'none';
          
		    return false;

        }

        //Validar que sea mayor a tres
        if(categoria.length <= 3){
            document.getElementById('alerta2').style.display = 'block';
            document.getElementById('alerta').style.display = 'none';
          
		    return false;

        }
        
        //Validar que el campo de archivo no esté vacío
        if(imagenCategoria.value == ''){
            document.getElementById('alerta4').style.display = 'block';
            document.getElementById('alerta3').style.display = 'none';
            return false;
        }

			
    }

    //Validar para modificar
	function validarEspacio2(){

        var categoria = document.getElementById('categoria').value;
        var imagenCategoria = document.getElementById('imagenCategoria');
        
        //Validar espacios en blanco
        if(categoria == null || categoria.length == 0 || /^\s*$/.test(categoria)){

            document.getElementById('alerta').style.display = 'block';
            document.getElementById('alerta2').style.display = 'none';
        
            return false;

        }
        
        //Validar que sea mayor a tres
        if(categoria.length <= 3){
            document.getElementById('alerta2').style.display = 'block';
            document.getElementById('alerta').style.display = 'none';
        
            return false;

        }
   
    }

    function teclear(){
        document.getElementById('alerta').style.display = 'none';
        document.getElementById('alerta2').style.display = 'none';
        document.getElementById('alerta3').style.display = 'none';
        document.getElementById('alerta4').style.display = 'none';
    }
    
    //Validar la imagen
    function fileValidation(){
        var imagenCategoria = document.getElementById('imagenCategoria');
        var filePath = imagenCategoria.value;
        var allowedExtensions = /(.jpg|.jpeg|.png|.gif)$/i;
        if(!allowedExtensions.exec(filePath)){
            document.getElementById('alerta3').style.display = 'block';
            document.getElementById('alerta4').style.display = 'none';
            document.getElementById('imagenPre').style.display = 'none';
            imagenCategoria.value = '';
            return false;
        }else{
            //Image preview
            if (imagenCategoria.files && imagenCategoria.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('imagenPreview').innerHTML = '<img src="'+e.target.result+'" class="img-fluid" style="max-width: 150px;"/>';
                };
                reader.readAsDataURL(imagenCategoria.files[0]);
                document.getElementById('imagenPre').style.display = 'none';
            }
            print_r(imagenCategoria.files[0]);
            document.getElementById('alerta3').style.display = 'none';
            document.getElementById('alerta4').style.display = 'none';
            document.getElementById('imagenPre').style.display = 'none';
            
        }
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
                                        <strong>Agregar</strong> categoría
                                    </div>
                    
                                     <?php if($categoria != null): ?>
                                    <!-- Formulario para modificar categoria-->
                                    <form action="categoria/modificar_categoria" method="post" class="" enctype="multipart/form-data">
                                    <div class="card-body card-block">
                                        <?php foreach($categoria as $cat): ?>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <input type="hidden" id="idCategoria" name="idCategoria" class="form-control" value="<?=$cat['idCategoria'];?>">
                                                <label for="categoria" class=" form-control-label">Nombre</label>
                                                <small class="form-text text-muted">Ingresa el nombre de la categoría</small>
                                                <input type="text" id="categoria" name="categoria" placeholder="Ingresa el nombre de la categoría..." 
                                                class="form-control" value="<?=$cat['categoria'];?>" 
                                                oninput="return teclear()">
                                                <div class="alert alert-danger" role="alert" id="alerta" style="display: none;">
											        Porfavor ingrese un nombre.
                                                </div>
                                                <div class="alert alert-danger" role="alert" id="alerta2" style="display: none;">
											        Porfavor ingresa un nombre mayor a 3 carácteres.
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
                                                <label for="imagenCategoria" class=" form-control-label">Imagen</label>
                                                <div id="imagenPreview"></div>
                                                <div id="imagenPre" style="display: block;"><img class="img-fluid" style="max-width: 150px;" src="<?=base_url('TWFF/vendor/uploads').'/'.$cat['imagenCategoria']?>"></div>
                                                <br>
                                                <input type="file" id="imagenCategoria" name="imagenCategoria" class="form-control-file" onchange="return fileValidation()">
                                                <input type="hidden" id="imagenCategoria2" name="imagenCategoria2" class="form-control-file" value="<?=$cat['imagenCategoria']?>">
                                                <div class="alert alert-danger" role="alert" id="alerta3" style="display: none;">
                                                    Porfavor selccione un archivo con extensión .jpeg/.jpg/.png/.gif
                                                </div>
                                                <div class="alert alert-danger" role="alert" id="alerta4" style="display: none;">
                                                    Seleccione un archivo.
										        </div>
                                            </div>
                                        </div>
                                        <?php   endforeach; ?>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-md" onclick="return validarEspacio2()">
                                            <i class="fa fa-check"></i> Agregar
                                        </button>
                                        <a href="categoria/cancelar" class="btn btn-danger btn-md">
                                        <i class="fa fa-ban"></i> Cancelar </a>
                                    </div> 
                                    </form>

                                    <?php  else:?>
                                    
                                    <!-- Formulario para agregar categoria-->
                                    <form action="categoria/guardar_categoria" method="post" class="" enctype="multipart/form-data">
                                    <div class="card-body card-block">
                                        <div class="row">
                                        <div class="form-group col-md-6">
                                            <input type="hidden" id="idCategoria" name="idCategoria" class="form-control" value="">
                                            <label for="categoria" class=" form-control-label">Nombre</label>
                                            <small class="form-text text-muted">Ingresa el nombre de la categoría</small>
                                            <input type="text" id="categoria" name="categoria" placeholder="" class="form-control" value="" oninput="return teclear()" 
                                             onblur="limpia()">
                                            <div class="alert alert-danger" role="alert" id="alerta" style="display: none;">
											    Porfavor ingrese un nombre.
                                            </div>
                                            <div class="alert alert-danger" role="alert" id="alerta2" style="display: none;">
											    Porfavor ingresa un nombre mayor a 3 carácteres.
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
                                            <label for="imagenCategoria" class=" form-control-label">Imagen</label>
                                            <div id="imagenPreview"></div>
                                            <br>
                                            <input type="file" id="imagenCategoria" name="imagenCategoria" class="form-control-file" onchange="return fileValidation()">
                                            <div class="alert alert-danger" role="alert" id="alerta3" style="display: none;">
                                                Porfavor selccione un archivo con extensión .jpeg/.jpg/.png/.gif
                                            </div>
                                            <div class="alert alert-danger" role="alert" id="alerta4" style="display: none;">
                                                Seleccione un archivo.
										    </div>
                                        </div>
                                    </div> 
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-md" onclick="return validarEspacio()">
                                            <i class="fa fa-check"></i> Agregar
                                        </button>
                                        <a href="categoria/cancelar" class="btn btn-danger btn-md">
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