<?php $session = session()?>
<div class="blog-wrapper section-padding-80">
        <div class="container">
            <div class="row"><h3><i class="fa fa-shopping-cart" aria-hidden="true"></i> Mi carrito</h3></div>
            <div class="row">

            
            

            <?php  
            
            if($session->has('usuario')): 
            if($session->has('mi_carrito')):
                
                $carrito []= null;

                $numero_producto = 0;

                $carrito = $session->get('mi_carrito');
                /*echo '<pre>';
                print_r($carrito);
                echo '</pre>';*/

                for($i = 0; $i < count($carrito); $i++):

                    if($carrito[$i] != null):

                        $numero_producto = $numero_producto + 1;

                    endif;

                endfor;
                
                if($numero_producto > 0):
            ?> 
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <thead style="border-bottom: 2px solid grey;">
                                <tr>
                                    <th>Imagen</th>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Precio</th>
                                    <th>Descuento</th>
                                    <th>Cantidad</th>
                                    <th>Subtotal</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php  
                            if (isset($carrito)):
                                $total = 0;
                                for ($i=0; $i < count($carrito); $i++): 								
                                    if ($carrito[$i] != null) :
                            ?>
                                <tr>
                                    <td><img src="<?= base_url('TWFF/vendor/uploads').'/'.$carrito[$i]['imagenProducto']?>" alt="" width="100" height="auto"></td>
                                    <td><?=$carrito[$i]['producto']; ?></td>
                                    <td><?=$carrito[$i]['descripcionProducto']; ?></td>
                                    <td>
                                        <?php 
                                            if($carrito[$i]['cantidad'] < 30):
                                                echo 'Menudeo: $ '.$carrito[$i]['precioMenudeo'];
                                            else:
                                                echo 'Mayoreo: $ '.$carrito[$i]['precioMayoreo'];
                                            endif;
                                        ?>
                                    </td>
                                    <td><?=$carrito[$i]['descuento'];?> %</td>
                                    <td><form action="mi_carrito/actualizar_carrito" method="post">
											<input type="hidden" name="" value="<?=$i;?>">
											<input type="hidden" name="idProductoActualizar" value="<?=$i;?>">
											<input type="number" name="cantidadActualizada" value="<?=$carrito[$i]['cantidad'];?>" min="1" max="<?=$carrito[$i]['stock'];?>" style="text-align: center;">
											
											<button class="btn btn-default" type="submit"><i class="fa fa-refresh"></i></button>

                                        </form>
                                    </td>
                                    <td><?php 
                                        if($carrito[$i]['cantidad'] < 30):
                                            if($carrito[$i]['descuento'] > 0): 
                                                $subtotal = $carrito[$i]['precioDescuento'] * $carrito[$i]['cantidad'];
                                                $total = $total + $subtotal;
                                                echo '$ '.$subtotal;
                                            else: 
                                                $subtotal = $carrito[$i]['precioMenudeo'] * $carrito[$i]['cantidad'];
                                                $total = $total + $subtotal;
                                                echo '$ '.$subtotal;
                                            endif;
                                        else:
                                            $subtotal = $carrito[$i]['precioMayoreo'] * $carrito[$i]['cantidad'];
                                            $total = $total + $subtotal;
                                            echo '$ '.$subtotal;
                                        endif;
                                        ?>
                                    </td>
                                    <td>
                                        <form action="mi_carrito/eliminar_carrito" method="post">
                                            <input type="hidden" name="idProductoEliminar" value="<?=$i;?>">
                                            <button class="btn btn-default" type="submit"><i class="fa fa-trash"></i></button>
										</form>
                                    </td>
                                </tr>
                            <?php	
                                    endif;
                                endfor;
                            endif;

                            $session->set('total',$total);
                            ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td style="font-weight: bold;">Total:</td>
                                <td style="font-weight: bold;">$<?=$total;?></td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <form action="mi_carrito" method="post">
                        <input type="hidden" name="total" value="<?=$total; ?>">
                        <a href="tienda" class="essence-btn">Seguir comprando</a>
                        <a href="form_pagar" class="essence-btn" style="background-color:#1fac5a;">Continuar</a>
                    </form>

                <?php else: ?>

                    <div class="alert alert-warning">
                        <h4>No hay productos en el carrito.</h4>
                    </div>

                <?php endif;

                else: ?>

                    <div class="alert alert-warning">
                        <h4>No hay productos en el carrito.</h4>
                    </div>

                <?php endif;

            else: ?>
                <div class="alert alert-warning">
                    <h4>Necesita iniciar sesión para acceder a "Mi carrito".</h4>
                </div>
            <?php endif; ?>

            </div>
        </div>
    </div>