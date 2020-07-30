<script type="text/javascript">
    function confirmation() 
    {
        if(confirm("Desea seguir?")){
	        return true;
	    }
	    else{
	        return false;
	    }
    }
</script>
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        
                        <h2>Categorías</h2>

                        <div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                        <div class="rs-select2--light rs-select2--lg">
                                        <form class="form-header" action="categoria" method="POST">
                                            <input id="todas" type="hidden" name="todas"/>
                                            <button class="au-btn au-btn-icon au-btn--green au-btn--small" type="submit" title="Listar todo">
                                                <i class="fa fa-list"></i>
                                            </button>
                                        </form>
                                        </div>
                                        <div class="rs-select2--light rs-select2--lg">
                                        <form class="form-header" action="categoria" method="POST">
                                            <input class="au-input au-input--xl" id="buscador" type="text" name="buscador" placeholder="Buscar por nombre.." />
                                            <button class="au-btn--submit" type="submit" title="Buscar">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </form>
                                        </div>
                                        
                                    </div>
                                    <div class="table-data__tool-right">
                                        <div class="rs-select2--dark rs-select2--sm rs-select2--dark2"></div>
                                        <a href="agregar_categoria"> <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                            <i class="fa fa-plus"></i>Agregar</button></a>
                                    </div>
                                </div>
                        </div>

                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Imagen</th>
                                                <th>Nombre</th>
                                                <th>Estatus</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($categorias as $cat): ?>
                                            <tr>
                                                <td><?=$cat['idCategoria'];?></td>
                                                <td> <img class="img-fluid" src="<?=$cat['imagenCategoria'];?>" alt="" style="max-width: 130px;"> </td>
                                                <td><?=$cat['categoria'];?></td>
                                                <td class="<?php if($cat['deleted']==1):echo 'process';else:echo 'denied';endif;?>">
                                                    <?php if($cat['deleted']==1):?>
                                                        Activo
                                                    <?php else: ?>
                                                        Inactivo
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                <div class="table-data-feature">
                                                        <form action="agregar_categoria" method="POST">
                                                        <input type="hidden" value="<?=$cat['idCategoria'];?>" name="idCategoria">
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Editar">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                        </form>
                                                        <form action="categoria/eliminar_categoria" method="POST">
                                                        <input type="hidden" value="<?=$cat['idCategoria'];?>" name="idCategoria">
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Eliminar" onclick="return confirmation()">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->

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