<?php $session = session();?>
<!-- Validación del formulario-->
<script type="text/javascript">

    //Validar para agregar 
	function validarEspacio(){

        var subcategoria = document.getElementById('subcategoria').value;
        
        //Validar espacios en blanco
	    if(subcategoria == null || subcategoria.length == 0 || /^\s*$/.test(subcategoria)){

            document.getElementById('alerta').style.display = 'block';
            document.getElementById('alerta2').style.display = 'none';
          
		    return false;

        }

        //Validar que sea mayor a tres
        if(subcategoria.length <= 3){
            document.getElementById('alerta2').style.display = 'block';
            document.getElementById('alerta').style.display = 'none';
          
		    return false;

        }	
    }

    //Validar para modificar
	function validarEspacio2(){

        var subcategoria = document.getElementById('subcategoria').value;
        
        //Validar espacios en blanco
        if(subcategoria == null || subcategoria.length == 0 || /^\s*$/.test(subcategoria)){

            document.getElementById('alerta').style.display = 'block';
            document.getElementById('alerta2').style.display = 'none';
        
            return false;

        }
        
        //Validar que sea mayor a tres
        if(subcategoria.length <= 3){
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
    
   
</script>
<!-- MAIN CONTENT-->
<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">

                    <?php if($session->getFlashdata('alerta_subcategoria') != null): ?>
                            <div class="col-sm-12" id="alerta_unico">
                                <div class="sufee-alert alert with-close alert-warning alert-dismissible fade show">
                                    <span class="badge badge-pill badge-warning">Error </span>
                                     <?=$session->getFlashdata('alerta_subcategoria')?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                    <?php endif;?>
                    
                        <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Agregar</strong> subcategoría
                                    </div>
                    
                                     <?php if($subcategoria != null): ?>
                                    <!-- Formulario para modificar subcategoriav-->
                                    <form action="subcategoria/modificar_subcategoria" method="post">
                                    <div class="card-body card-block">
                                        <?php foreach($subcategoria as $cat): ?>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <input type="hidden" id="idSubcategoria" name="idSubcategoria" class="form-control" value="<?=$cat['idSubcategoria'];?>">
                                                <label for="subcategoria" class=" form-control-label">Nombre</label>
                                                <small class="form-text text-muted">Ingresa el nombre de la subcategoría</small>
                                                <input type="text" id="subcategoria" name="subcategoria" placeholder="Ingresa el nombre de la subcategoría..." 
                                                class="form-control" value="<?=$cat['subcategoria'];?>" 
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
                                                <label for="categoria_idCategoria" class=" form-control-label">Categoría</label>
                                                <small class="form-text text-muted">Selecciona una opción</small>
                                                <select name="categoria_idCategoria" id="categoria_idCategoria" class="form-control">
                                                    <?php foreach($categorias as $cate): ?>
                                                    <option value="<?=$cate['idCategoria'];?>"  <?php if($cate['idCategoria'] == $cat['categoria_idCategoria']): echo 'selected'; endif; ?>> <?=$cate['categoria'];?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <?php   endforeach; ?>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-md" onclick="return validarEspacio2()">
                                            <i class="fa fa-check"></i> Agregar
                                        </button>
                                        <a href="subcategoria/cancelar" class="btn btn-danger btn-md">
                                        <i class="fa fa-ban"></i> Cancelar </a>
                                    </div> 
                                    </form>

                                    <?php  else:?>
                                    
                                    <!-- Formulario para agregar categoria-->
                                    <form action="subcategoria/guardar_subcategoria" method="post" class="" enctype="multipart/form-data">
                                    <div class="card-body card-block">
                                        <div class="row">
                                        <div class="form-group col-md-6">
                                            <input type="hidden" id="idSubcategoria" name="idSubcategoria" class="form-control" value="">
                                            <label for="subcategoria" class=" form-control-label">Nombre</label>
                                            <small class="form-text text-muted">Ingresa el nombre de la categoría</small>
                                            <input type="text" id="subcategoria" name="subcategoria" placeholder="" class="form-control" value="" oninput="return teclear()" 
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
                                        <div class="form-group col-md-6">
                                            <label for="categoria_idCategoria" class=" form-control-label">Categoría</label>
                                            <small class="form-text text-muted">Selecciona una opción</small>
                                            <select name="categoria_idCategoria" id="categoria_idCategoria" class="form-control">
                                                <?php foreach($categorias as $cate): ?>
                                                <option value="<?=$cate['idCategoria'];?>"><?=$cate['categoria'];?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div> 
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-md" onclick="return validarEspacio()">
                                            <i class="fa fa-check"></i> Agregar
                                        </button>
                                        <a href="subcategoria/cancelar" class="btn btn-danger btn-md">
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