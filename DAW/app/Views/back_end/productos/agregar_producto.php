<?php $session = session();?>
<!-- Validación del formulario-->
<script type="text/javascript">

    //Validar para agregar 
	function validarEspacio(){
        
        var producto = document.getElementById('producto').value;
        var descripcionProducto = document.getElementById('descripcionProducto').value;
        var precioMenudeo = document.getElementById('precioMenudeo').value;
        var precioMayoreo = document.getElementById('precioMayoreo').value;
        var stock = document.getElementById('stock').value;
        var imagenProducto = document.getElementById('imagenProducto');
        var imagenProducto2 = document.getElementById('imagenProducto2');
        
        //Validar espacios en blanco
        if(producto == null || producto.length == 0 || /^\s*$/.test(producto)){

            document.getElementById('alerta1').style.display = 'block';
            document.getElementById('alerta2').style.display = 'none';
        
            return false;

        }
        
        //Validar que sea mayor a tres
        if(producto.length <= 3){
            document.getElementById('alerta2').style.display = 'block';
            document.getElementById('alerta1').style.display = 'none';
        
            return false;
        }

        //Validar espacios en blanco
        if(descripcionProducto == null || descripcionProducto.length == 0 || /^\s*$/.test(descripcionProducto)){

            document.getElementById('alerta3').style.display = 'block';
            document.getElementById('alerta4').style.display = 'none';

            return false;

        }

        if(descripcionProducto.length <= 10){
            document.getElementById('alerta4').style.display = 'block';
            document.getElementById('alerta3').style.display = 'none';
        
            return false;
        }

        if(precioMenudeo == null || precioMenudeo.length == 0 || /^\s*$/.test(precioMenudeo)){

            document.getElementById('alerta5').style.display = 'block';
            document.getElementById('alerta6').style.display = 'none';

            return false;

        }

        if(precioMenudeo <= 0){
            document.getElementById('alerta6').style.display = 'block';
            document.getElementById('alerta5').style.display = 'none';
        
            return false;
        }

        if(precioMayoreo == null || precioMayoreo.length == 0 || /^\s*$/.test(precioMayoreo)){

            document.getElementById('alerta7').style.display = 'block';
            document.getElementById('alerta8').style.display = 'none';

            return false;

        }

        if(precioMayoreo <= 0){
            document.getElementById('alerta8').style.display = 'block';
            document.getElementById('alerta7').style.display = 'none';

            return false;
        }

        if(stock == null || stock.length == 0 || /^\s*$/.test(stock)){

            document.getElementById('alerta9').style.display = 'block';

            return false;

        }

        //Validar que el campo de archivo no esté vacío
        if(imagenProducto.value == ''){
            document.getElementById('alerta11').style.display = 'block';
            document.getElementById('alerta10').style.display = 'none';
            return false;
        }

        //Validar que el campo de archivo no esté vacío
        if(imagenProducto2.value == ''){
            document.getElementById('alerta13').style.display = 'block';
            document.getElementById('alerta12').style.display = 'none';
            return false;
        }
   
    }

    //Validar para modificar
	function validarEspacio2(){
        
        var producto = document.getElementById('producto').value;
        var descripcionProducto = document.getElementById('descripcionProducto').value;
        var precioMenudeo = document.getElementById('precioMenudeo').value;
        var precioMayoreo = document.getElementById('precioMayoreo').value;
        var stock = document.getElementById('stock').value;
        var imagenProducto = document.getElementById('imagenProducto');
        var imagenProducto2 = document.getElementById('imagenProducto2');
        
        //Validar espacios en blanco
        if(producto == null || producto.length == 0 || /^\s*$/.test(producto)){

            document.getElementById('alerta1').style.display = 'block';
            document.getElementById('alerta2').style.display = 'none';
        
            return false;

        }
        
        //Validar que sea mayor a tres
        if(producto.length <= 3){
            document.getElementById('alerta2').style.display = 'block';
            document.getElementById('alerta1').style.display = 'none';
        
            return false;
        }

        //Validar espacios en blanco
        if(descripcionProducto == null || descripcionProducto.length == 0 || /^\s*$/.test(descripcionProducto)){

            document.getElementById('alerta3').style.display = 'block';
            document.getElementById('alerta4').style.display = 'none';

            return false;

        }

        if(descripcionProducto.length <= 10){
            document.getElementById('alerta4').style.display = 'block';
            document.getElementById('alerta3').style.display = 'none';
        
            return false;
        }

        if(precioMenudeo == null || precioMenudeo.length == 0 || /^\s*$/.test(precioMenudeo)){

            document.getElementById('alerta5').style.display = 'block';
            document.getElementById('alerta6').style.display = 'none';

            return false;

        }

        if(precioMenudeo <= 0){
            document.getElementById('alerta6').style.display = 'block';
            document.getElementById('alerta5').style.display = 'none';
        
            return false;
        }

        if(precioMayoreo == null || precioMayoreo.length == 0 || /^\s*$/.test(precioMayoreo)){

            document.getElementById('alerta7').style.display = 'block';
            document.getElementById('alerta8').style.display = 'none';

            return false;

        }

        if(precioMayoreo <= 0){
            document.getElementById('alerta8').style.display = 'block';
            document.getElementById('alerta7').style.display = 'none';

            return false;
        }

        if(stock == null || stock.length == 0 || /^\s*$/.test(stock)){

            document.getElementById('alerta9').style.display = 'block';

            return false;

        }
   
    }

    function teclear(){
        document.getElementById('alerta1').style.display = 'none';
        document.getElementById('alerta2').style.display = 'none';
        document.getElementById('alerta3').style.display = 'none';
        document.getElementById('alerta4').style.display = 'none';
        document.getElementById('alerta5').style.display = 'none';
        document.getElementById('alerta6').style.display = 'none';
        document.getElementById('alerta7').style.display = 'none';
        document.getElementById('alerta8').style.display = 'none';
        document.getElementById('alerta9').style.display = 'none';
        document.getElementById('alerta10').style.display = 'none';
        document.getElementById('alerta11').style.display = 'none';
        document.getElementById('alerta12').style.display = 'none';
        document.getElementById('alerta13').style.display = 'none';
    }
    
    //Validar la imagen
    function fileValidation(){
        var imagenProducto = document.getElementById('imagenProducto');
        var filePath = imagenProducto.value;
        var allowedExtensions = /(.jpg|.jpeg|.png|.gif)$/i;
        if(!allowedExtensions.exec(filePath)){
            document.getElementById('alerta10').style.display = 'block';
            document.getElementById('alerta11').style.display = 'none';
            document.getElementById('imagenPre').style.display = 'none';
            imagenProducto.value = '';
            return false;
        }else{
            //Image preview
            if (imagenProducto.files && imagenProducto.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('imagenPreview').innerHTML = '<img src="'+e.target.result+'" class="img-fluid" style="max-width: 150px;"/>';
                };
                reader.readAsDataURL(imagenProducto.files[0]);
                document.getElementById('imagenPre').style.display = 'none';
            }
            print_r(imagenProducto.files[0]);
            document.getElementById('alerta10').style.display = 'none';
            document.getElementById('alerta11').style.display = 'none';
            document.getElementById('imagenPre').style.display = 'none';
            
        }
    }
    function fileValidation2(){
        var imagenProducto2 = document.getElementById('imagenProducto2');
        var filePath = imagenProducto2.value;
        var allowedExtensions = /(.jpg|.jpeg|.png|.gif)$/i;
        if(!allowedExtensions.exec(filePath)){
            document.getElementById('alerta12').style.display = 'block';
            document.getElementById('alerta13').style.display = 'none';
            document.getElementById('imagenPre2').style.display = 'none';
            imagenProducto2.value = '';
            return false;
        }else{
            //Image preview
            if (imagenProducto2.files && imagenProducto2.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('imagenPreview2').innerHTML = '<img src="'+e.target.result+'" class="img-fluid" style="max-width: 150px;"/>';
                };
                reader.readAsDataURL(imagenProducto2.files[0]);
                document.getElementById('imagenPre2').style.display = 'none';
            }
            print_r(imagenProducto2.files[0]);
            document.getElementById('alerta12').style.display = 'none';
            document.getElementById('alerta13').style.display = 'none';
            document.getElementById('imagenPre2').style.display = 'none';
            
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
                                        <strong>Agregar</strong> producto
                                    </div>
                    
                                     <?php if($producto != null): ?>
                                    <!-- Formulario para modificar producto-->
                                    <form action="producto/modificar_producto" method="post" class="" enctype="multipart/form-data">
                                    <div class="card-body card-block">
                                        <?php foreach($producto as $cat): ?>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <input type="hidden" id="idProducto" name="idProducto" class="form-control" value="<?=$cat['idProducto'];?>">
                                                <label for="producto" class=" form-control-label">Nombre</label>
                                                <small class="form-text text-muted">Ingresa el nombre del producto</small>
                                                <input type="text" id="producto" name="producto" placeholder="Ingresa el nombre del producto..." 
                                                class="form-control" value="<?=$cat['producto'];?>" 
                                                oninput="return teclear()">
                                                <div class="alert alert-danger" role="alert" id="alerta1" style="display: none;">
											        Porfavor ingrese un nombre.
                                                </div>
                                                <div class="alert alert-danger" role="alert" id="alerta2" style="display: none;">
											        Porfavor ingresa un nombre mayor a 3 carácteres.
										        </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="descripcionProducto" class=" form-control-label">Descripción del producto</label>
                                                <small class="form-text text-muted">Ingresa la descripción del producto</small>
                                                <textarea class="form-control" name="descripcionProducto" id="descripcionProducto" cols="15" rows="5" 
                                                value="<?=$cat['descripcionProducto'];?>" oninput="return teclear()" style="resize: none;"></textarea>
                                                <div class="alert alert-danger" role="alert" id="alerta3" style="display: none;">
											        Porfavor ingrese una descripción.
                                                </div>
                                                <div class="alert alert-danger" role="alert" id="alerta4" style="display: none;">
											        Porfavor ingresa una descripción mayor a 10 carácteres.
										        </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="subcategoria_idSubcategoria" class=" form-control-label">Subcategoría</label>
                                                <small class="form-text text-muted">Selecciona una opción</small>
                                                <select name="subcategoria_idSubcategoria" id="subcategoria_idSubcategoria" class="form-control">
                                                <?php foreach($subcategoria as $cate): ?>
                                                    <option value="<?=$cate['idSubcategoria'];?>"  <?php if($cate['idSubcategoria'] == $cat['subcategoria_idSubategoria']): echo 'selected'; endif; ?>> <?=$cate['subcategoria'];?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="precioMenudeo" class=" form-control-label">Precio por menudeo</label>
                                                <small class="form-text text-muted">Ingresa el precio por menudeo</small>
                                                $<input type="text" id="precioMenudeo" name="precioMenudeo"  
                                                class="form-control" value="<?=$cat['precioMenudeo'];?>" 
                                                oninput="return teclear()">
                                                <div class="alert alert-danger" role="alert" id="alerta5" style="display: none;">
											        Porfavor ingrese un precio por menudeo.
                                                </div>
                                                <div class="alert alert-danger" role="alert" id="alerta6" style="display: none;">
											        Porfavor ingresa un precio mayor a 0.
										        </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="precioMayoreo" class=" form-control-label">Precio por mayoreo</label>
                                                <small class="form-text text-muted">Ingresa el precio por mayoreo</small>
                                                $<input type="text" id="precioMayoreo" name="precioMayoreo"
                                                class="form-control" value="<?=$cat['precioMayoreo'];?>" 
                                                oninput="return teclear()">
                                                <div class="alert alert-danger" role="alert" id="alerta7" style="display: none;">
											        Porfavor ingrese un precio por mayoreo.
                                                </div>
                                                <div class="alert alert-danger" role="alert" id="alerta8" style="display: none;">
											        Porfavor ingresa un precio mayor a 0.
										        </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="stock" class=" form-control-label">Stock</label>
                                                <small class="form-text text-muted">Ingresa el stock</small>
                                                $<input type="number" id="stock" name="stock"
                                                class="form-control" value="<?=$cat['stock'];?>" 
                                                oninput="return teclear()" min="0">
                                                <div class="alert alert-danger" role="alert" id="alerta9" style="display: none;">
											        Porfavor ingrese un numero.
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
                                                <label for="imagenProducto" class=" form-control-label">Imagen 1</label>
                                                <div id="imagenPreview"></div>
                                                <div id="imagenPre" style="display: block;"><img class="img-fluid" style="max-width: 150px;" src="<?=base_url('TWFF/vendor/uploads').'/'.$cat['imagenProducto']?>"></div>
                                                <br>
                                                <input type="file" id="imagenProducto" name="imagenProducto" class="form-control-file" onchange="return fileValidation()">
                                                <input type="hidden" id="imagenProducto_2" name="imagenProducto_2" class="form-control-file" value="<?=$cat['imagenProducto']?>">
                                                <div class="alert alert-danger" role="alert" id="alerta10" style="display: none;">
                                                    Porfavor selccione un archivo con extensión .jpeg/.jpg/.png/.gif
                                                </div>
                                                <div class="alert alert-danger" role="alert" id="alerta11" style="display: none;">
                                                    Seleccione un archivo.
										        </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="imagenProducto2" class=" form-control-label">Imagen 2</label>
                                                <div id="imagenPreview2"></div>
                                                <div id="imagenPre2" style="display: block;"><img class="img-fluid" style="max-width: 150px;" src="<?=base_url('TWFF/vendor/uploads').'/'.$cat['imagenProducto2']?>"></div>
                                                <br>
                                                <input type="file" id="imagenProducto2" name="imagenProducto2" class="form-control-file" onchange="return fileValidation2()">
                                                <input type="hidden" id="imagenProducto2_2" name="imagenProducto2_2" class="form-control-file" value="<?=$cat['imagenProducto2']?>">
                                                <div class="alert alert-danger" role="alert" id="alerta12" style="display: none;">
                                                    Porfavor selccione un archivo con extensión .jpeg/.jpg/.png/.gif
                                                </div>
                                                <div class="alert alert-danger" role="alert" id="alerta13" style="display: none;">
                                                    Seleccione un archivo.
										        </div>
                                            </div>
                                        </div>
                                        <?php   endforeach; ?>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-md" onclick="return validarEspacio()">
                                            <i class="fa fa-check"></i> Agregar
                                        </button>
                                        <a href="subcategoria/cancelar" class="btn btn-danger btn-md">
                                        <i class="fa fa-ban"></i> Cancelar </a>
                                    </div> 
                                    </form>

                                    <?php  else:?>
                                    
                                    <!-- Formulario para agregar categoria-->
                                    <form action="producto/guardar_producto" method="post" class="" enctype="multipart/form-data">
                                    <div class="card-body card-block">
                                        <div class="row">
                                            <div class="form-group col-md-5">
                                                <input type="hidden" id="idProducto" name="idProducto" class="form-control" value="">
                                                <label for="producto" class=" form-control-label">Nombre</label>
                                                <small class="form-text text-muted">Ingresa el nombre del producto</small>
                                                <input type="text" id="producto" name="producto" placeholder="Ingresa el nombre del producto..." 
                                                class="form-control" value="" 
                                                oninput="return teclear()">
                                                <div class="alert alert-danger" role="alert" id="alerta1" style="display: none;">
											        Porfavor ingrese un nombre.
                                                </div>
                                                <div class="alert alert-danger" role="alert" id="alerta2" style="display: none;">
											        Porfavor ingresa un nombre mayor a 3 carácteres.
										        </div>
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label for="descripcionProducto" class=" form-control-label">Descripción del producto</label>
                                                <small class="form-text text-muted">Ingresa la descripción del producto</small>
                                                <textarea class="form-control" name="descripcionProducto" id="descripcionProducto" cols="15" rows="5" 
                                                value="" oninput="return teclear()" style="resize: none;"></textarea>
                                                <div class="alert alert-danger" role="alert" id="alerta3" style="display: none;">
											        Porfavor ingrese una descripción.
                                                </div>
                                                <div class="alert alert-danger" role="alert" id="alerta4" style="display: none;">
											        Porfavor ingresa una descripción mayor a 10 carácteres.
										        </div>
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label for="subcategoria_idSubcategoria" class=" form-control-label">Subcategoría</label>
                                                <small class="form-text text-muted">Selecciona una opción</small>
                                                <select name="subcategoria_idSubcategoria" id="subcategoria_idSubcategoria" class="form-control">
                                                <?php foreach($subcategoria as $cate): ?>
                                                    <option value="<?=$cate['idSubcategoria'];?>"> <?=$cate['subcategoria'];?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label for="precioMenudeo" class=" form-control-label">Precio por menudeo</label>
                                                <small class="form-text text-muted">Ingresa el precio por menudeo</small>
                                                <input type="text" id="precioMenudeo" name="precioMenudeo"  
                                                class="form-control" value="" oninput="return teclear()" placeholder="$">
                                                <div class="alert alert-danger" role="alert" id="alerta5" style="display: none;">
											        Porfavor ingrese un precio por menudeo.
                                                </div>
                                                <div class="alert alert-danger" role="alert" id="alerta6" style="display: none;">
											        Porfavor ingresa un precio mayor a 0.
										        </div>
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label for="precioMayoreo" class=" form-control-label">Precio por mayoreo</label>
                                                <small class="form-text text-muted">Ingresa el precio por mayoreo</small>
                                                <input type="text" id="precioMayoreo" name="precioMayoreo" class="form-control" value="" 
                                                oninput="return teclear()" placeholder="$">
                                                <div class="alert alert-danger" role="alert" id="alerta7" style="display: none;">
											        Porfavor ingrese un precio por mayoreo.
                                                </div>
                                                <div class="alert alert-danger" role="alert" id="alerta8" style="display: none;">
											        Porfavor ingresa un precio mayor a 0.
										        </div>
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label for="stock" class=" form-control-label">Stock</label>
                                                <small class="form-text text-muted">Ingresa el stock</small>
                                                <input type="number" id="stock" name="stock"
                                                class="form-control" value="" 
                                                oninput="return teclear()" min="0">
                                                <div class="alert alert-danger" role="alert" id="alerta9" style="display: none;">
											        Porfavor ingrese un numero.
                                                </div>
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label for="deleted" class=" form-control-label">Estatus</label>
                                                <small class="form-text text-muted">Selecciona una opción</small>
                                                <select name="deleted" id="deleted" class="form-control">
                                                    <option value="1">Activo</option>
                                                    <option value="0">Inactivo</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label for="imagenProducto" class=" form-control-label">Imagen 1</label>
                                                <div id="imagenPreview"></div>
                                                <br>
                                                <input type="file" id="imagenProducto" name="imagenProducto" class="form-control-file" onchange="return fileValidation()">
                                                <div class="alert alert-danger" role="alert" id="alerta10" style="display: none;">
                                                    Porfavor selccione un archivo con extensión .jpeg/.jpg/.png/.gif
                                                </div>
                                                <div class="alert alert-danger" role="alert" id="alerta11" style="display: none;">
                                                    Seleccione un archivo.
										        </div>
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label for="imagenProducto2" class=" form-control-label">Imagen 2</label>
                                                <div id="imagenPreview2"></div>
                                                <br>
                                                <input type="file" id="imagenProducto2" name="imagenProducto2" class="form-control-file" onchange="return fileValidation2()">
                                                <div class="alert alert-danger" role="alert" id="alerta12" style="display: none;">
                                                    Porfavor selccione un archivo con extensión .jpeg/.jpg/.png/.gif
                                                </div>
                                                <div class="alert alert-danger" role="alert" id="alerta13" style="display: none;">
                                                    Seleccione un archivo.
										        </div>
                                            </div>
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