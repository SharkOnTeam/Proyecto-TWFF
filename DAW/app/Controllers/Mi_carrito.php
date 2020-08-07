<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\CategoriaModel;
use App\Models\SubcategoriaModel;

class Mi_carrito extends Controller
{
	private $categoria_model;
    private $subcategoria_model;
    private $session = null;

	public function __construct()
    {
        $this->categoria_model = new CategoriaModel();
        $this->subcategoria_model = new SubcategoriaModel();
        $this->session = \Config\Services::session();
	}
	
	public function index()
	{   
        
		$data = [
            'titulo'        => 'Mi carrito-TWFF',
            'categorias'    => $this->categoria_model->findAll(),
            'subcategorias' => $this->subcategoria_model->findAll()
        ];
		
        return view('front_end/template/header',$data).view('front_end/mi_carrito').view('front_end/template/footer');
    }
    
    public function carrito(){
        
        //Proceso para agregar un nuevo producto al carrito
        if($this->session->has('mi_carrito')){

            $mi_carrito = $this->session->get('mi_carrito');

            //echo '<pre>';
            //print_r($mi_carrito);

            if($mi_carrito == null){

                if($this->request->getPost('idProducto') != null){
                    $idProducto = $this->request->getPost('idProducto') ? $this->request->getPost('idProducto') : null;
                    $producto = $this->request->getPost('producto') ? $this->request->getPost('producto') : null;
                    $precioMenudeo = $this->request->getPost('precioMenudeo') ? $this->request->getPost('precioMenudeo') : null;
                    $precioMayoreo = $this->request->getPost('precioMayoreo') ? $this->request->getPost('precioMayoreo') : null;
                    $descripcionProducto = $this->request->getPost('descripcionProducto') ? $this->request->getPost('descripcionProducto') : null;
                    $cantidad = $this->request->getPost('cantidad') ? $this->request->getPost('cantidad') : null;
                    $stock = $this->request->getPost('stock') ? $this->request->getPost('stock') : null;
                    $imagenProducto = $this->request->getPost('imagenProducto') ? $this->request->getPost('imagenProducto') : null;
                    $descuento= $this->request->getPost('descuento');
                    $precioDescuento= $this->request->getPost('precioDescuento') ? $this->request->getPost('precioDescuento') : null;
        
                    $mi_carrito []= [
                        'idProducto' => $idProducto,
                        'producto' => $producto,
                        'precioMenudeo' => $precioMenudeo,
                        'precioMayoreo' => $precioMayoreo,
                        'descripcionProducto' => $descripcionProducto,
                        'cantidad' => $cantidad,
                        'stock' => $stock,
                        'imagenProducto' => $imagenProducto,
                        'descuento' => $descuento,
                        'precioDescuento' => $precioDescuento
                    ];
        
                    $this->session->set('mi_carrito',$mi_carrito);
                    //echo '<pre>';
                    //print_r($mi_carrito);
                    return redirect()->to(base_url('TWFF/public/mi_carrito'));
                }

            } else {

                if($this->request->getPost('idProducto') != null){
                    $idProducto = $this->request->getPost('idProducto');
                    $producto = $this->request->getPost('producto');
                    $precioMenudeo = $this->request->getPost('precioMenudeo');
                    $precioMayoreo = $this->request->getPost('precioMayoreo');
                    $descripcionProducto = $this->request->getPost('descripcionProducto');
                    $cantidad = $this->request->getPost('cantidad');
                    $stock = $this->request->getPost('stock');
                    $imagenProducto = $this->request->getPost('imagenProducto');
                    $descuento= $this->request->getPost('descuento');
                    $precioDescuento= $this->request->getPost('precioDescuento');
    
                    //Verificación si el producto es repetido y lo suma al ya existente
                    $ubi = -1;
    
                    for ($i=0; $i < count($mi_carrito) ; $i++) { 

                        if($idProducto == $_SESSION['mi_carrito'][$i]['idProducto']){
                            $ubi = $i;
                        }
                    }
    
                    if($ubi != -1){
                        $numero = $_SESSION['mi_carrito'][$ubi]['cantidad'] + $cantidad;

                        $_SESSION['mi_carrito'][$ubi] = [
                            'idProducto' => $idProducto,
                            'producto' => $producto,
                            'precioMenudeo' => $precioMenudeo,
                            'precioMayoreo' => $precioMayoreo,
                            'descripcionProducto' => $descripcionProducto,
                            'cantidad' => $numero,
                            'stock' => $stock,
                            'imagenProducto' => $imagenProducto,
                            'descuento' => $descuento,
                            'precioDescuento' => $precioDescuento
                            
                        ];

                    }else{
                        $_SESSION['mi_carrito'][] = [
                            'idProducto' => $idProducto,
                            'producto' => $producto,
                            'precioMenudeo' => $precioMenudeo,
                            'precioMayoreo' => $precioMayoreo,
                            'descripcionProducto' => $descripcionProducto,
                            'cantidad' => $cantidad,
                            'stock' => $stock,
                            'imagenProducto' => $imagenProducto,
                            'descuento' => $descuento,
                            'precioDescuento' => $precioDescuento
                            
                        ];
                    }
    
                    //echo '<pre>';
                    //print_r($mi_carrito);
                    return redirect()->to(base_url('TWFF/public/mi_carrito'));
                }
            }
            
        } else {

            // Proceso para agregar el primer producto del carrito
            if($this->request->getPost('idProducto') != null){
                $idProducto = $this->request->getPost('idProducto') ? $this->request->getPost('idProducto') : null;
                $producto = $this->request->getPost('producto') ? $this->request->getPost('producto') : null;
                $precioMenudeo = $this->request->getPost('precioMenudeo') ? $this->request->getPost('precioMenudeo') : null;
                $precioMayoreo = $this->request->getPost('precioMayoreo') ? $this->request->getPost('precioMayoreo') : null;
                $descripcionProducto = $this->request->getPost('descripcionProducto') ? $this->request->getPost('descripcionProducto') : null;
                $cantidad = $this->request->getPost('cantidad') ? $this->request->getPost('cantidad') : null;
                $stock = $this->request->getPost('stock') ? $this->request->getPost('stock') : null;
                $imagenProducto = $this->request->getPost('imagenProducto') ? $this->request->getPost('imagenProducto') : null;
                $descuento= $this->request->getPost('descuento') ? $this->request->getPost('descuento') : null;
                $precioDescuento= $this->request->getPost('precioDescuento') ? $this->request->getPost('precioDescuento') : null;
    
                $mi_carrito []= [
                    'idProducto' => $idProducto,
                    'producto' => $producto,
                    'precioMenudeo' => $precioMenudeo,
                    'precioMayoreo' => $precioMayoreo,
                    'descripcionProducto' => $descripcionProducto,
                    'cantidad' => $cantidad,
                    'stock' => $stock,
                    'imagenProducto' => $imagenProducto,
                    'descuento' => $descuento,
                    'precioDescuento' => $precioDescuento
                ];
    
                $this->session->set('mi_carrito',$mi_carrito);
                //echo '<pre>';
                //print_r($mi_carrito);
                return redirect()->to(base_url('TWFF/public/mi_carrito'));
            }
        }
    }

    //Actualizar cantidad de productos del carrito
    public function actualizar_carrito(){

        if($this->request->getPost('idProductoActualizar') != null){

            $idProductoActualizar = $this->request->getPost('idProductoActualizar');
            $cantidadActualizadad = $this->request->getPost('cantidadActualizada');

            $_SESSION['mi_carrito'][$idProductoActualizar]['cantidad'] = $cantidadActualizadad;
        }
        
        //$this->session->push('mi_carrito', $mi_carrito);
        //$carrito = $this->session->get('mi_carrito');
        //echo '<pre>';
        //print_r($carrito);

        return redirect()->to(base_url('TWFF/public/mi_carrito'));
    }

    //Elminar un producto del carrito
    public function eliminar_carrito(){

        if($this->request->getPost('idProductoEliminar') != null){

            $idProductoEliminar = $this->request->getPost('idProductoEliminar');

            $_SESSION['mi_carrito'][$idProductoEliminar] = null;

        }

        return redirect()->to(base_url('TWFF/public/mi_carrito'));
    }
        
        /*if(isset($mi_carrito)){
            $this->session->set('mi_carrito',$mi_carrito);
        }

        return redirect()->to(base_url('TWFF/public/mi_carrito'));*/
    
}