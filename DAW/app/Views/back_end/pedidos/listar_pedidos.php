<?php $session = session();?>
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

    function editar(){
        document.getElementById('status').style.display = 'none';
        document.getElementById('editstatus').style.display = 'block';
    }

    function editar2(){
        document.getElementById('status').style.display = 'block';
        document.getElementById('editstatus').style.display = 'none';
    }
</script>
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">

                    <?php if($session->getFlashdata('alerta_exitosa') != null): ?>
                            <div class="col-sm-12" id="alerta_unico">
                                <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                    <span class="badge badge-pill badge-success"><i class="fa fa-check"></i></span>
                                     <?=$session->getFlashdata('alerta_exitosa')?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                    <?php endif;?>
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
                        
                        <h2>Pedidos</h2>

                        <div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                        <div class="rs-select2--light rs-select2--lg">
                                        <form class="form-header" action="pedido" method="POST">
                                            <input id="todas" type="hidden" name="todas"/>
                                            <button class="au-btn au-btn-icon au-btn--green au-btn--small" type="submit" title="Listar todo">
                                                <i class="fa fa-list"></i>
                                            </button>
                                        </form>
                                        </div>
                                        <div class="rs-select2--light rs-select2--lg">
                                        <form class="form-header" action="pedido" method="POST">
                                            <input class="au-input au-input--xl" id="buscador" type="text" name="buscador" placeholder="Buscar por nombre de usuario.." />
                                            <button class="au-btn--submit" type="submit" title="Buscar">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </form>
                                        </div>
                                        
                                    </div>

                                </div>
                        </div>

                        <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Usuario</th>
                                                <th>Fecha del Pedido</th>
                                                <th>Estatus</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($pedidos as $cat): ?>
                                            <tr>
                                                <td><?=$cat['idPedido'];?></td>
                                                <?php foreach($usuario as $usu): ?>
                                                <?php if($cat['usuario_idUsuario'] == $usu['idUsuario']): ?>
                                                <td><?=$usu['usuario'];?></td>
                                                <?php endif;
                                                endforeach; ?>
                                                <td><?=$cat['fechaPedido'];?></td>
                                                <td class="<?php if($cat['deleted']==1):echo 'process';else:echo 'denied';endif;?>" style="display: 
                                                block;" id="status">
                                                    <?php if($cat['deleted']==1):?>
                                                        Activo
                                                    <?php else: ?>
                                                        Inactivo
                                                    <?php endif; ?>
                                                </td>
                                                <td class="" id="editstatus" style="display: none;">
                                                    <div class="table-data-feature">
                                                        <form action="pedido/modificar_pedido" method="POST">
                                                        <input type="hidden" value="<?=$cat['idPedido'];?>" name="idPedido">
                                                        <select name="deleted" id="deleted" class="form-control" style="min-width: auto;">
                                                            <option value="1" <?php if($cat['deleted'] == 1): echo 'selected'; endif; ?>>Activo</option>
                                                            <option value="0" <?php if($cat['deleted'] == 0): echo 'selected'; endif; ?>>Inactivo</option>
                                                        </select>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Editar">
                                                            <i class="fa fa-refresh"></i>
                                                        </button>
                                                        
                                                        </form>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Editar" onclick="return editar2()">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                                <td>
                                                <div class="table-data-feature">
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Editar" onclick="return editar()">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                        <form action="pedido/eliminar_pedido" method="POST">
                                                        <input type="hidden" value="<?=$cat['idPedido'];?>" name="idPedido">
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