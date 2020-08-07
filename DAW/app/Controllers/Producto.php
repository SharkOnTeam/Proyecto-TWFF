<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProductoModel;

class Producto extends Controller
{
	private $producto_model;
    private $session = null;

    public function __construct()
    {
        $this->producto_model = new ProductoModel();
        $this->session = \Config\Services::session();
    }
    
	public function index()
	{
        $texto = $this->request->getPost('buscador');

        if($texto == null){
            $data = array(
                'titulo'=>'Productos',
                'productos' => $this->producto_model->findAll(),
                'pro_sub' => $this->producto_model->producto_subcategoria()
            );

            return view('back_end/template/b_header',$data).view('back_end/template/b_sidebar').view('back_end/productos/listar_productos',$data).view('back_end/template/b_footer');
        }else{
            $data = array(
                'titulo'=>'Productos',
                'productos' => $this->producto_model->getProductoByNombre($texto),
                'pro_sub' => $this->producto_model->producto_subcategoria()
            );

            return view('back_end/template/b_header',$data).view('back_end/template/b_sidebar').view('back_end/productos/listar_productos',$data).view('back_end/template/b_footer'); 
        }
    }
    
    public function cancelar(){
        return redirect()->to(base_url('TWFF/public/producto'));
    }

    public function guardar_producto(){   
        
        $ruta = $this->request->getFile('imagenProducto');
        $ruta2 = $this->request->getFile('imagenProducto2');
        $producto = $this->request->getPost('producto');
        $subcategoria_idSubcategoria = $this->request->getPost('subcategoria_idSubcategoria');
        $precioMenudeo = $this->request->getPost('precioMenudeo');
        $precioMayoreo = $this->request->getPost('precioMayoreo');
        $descripcionProducto = $this->request->getPost('descripcionProducto');
        $stock = $this->request->getPost('stock');
        $deleted = $this->request->getPost('deleted');
        $bd_productos = $this->producto_model->getNombresProducto();
        $i=0;

        foreach($bd_productos as $bd_cat){
            if($bd_cat['producto'] == $producto){
                $i = $i +1;
            }
        }

        if(!$ruta->hasMoved()){
            $ruta->move(ROOTPATH . 'vendor/uploads');
        }

        if(!$ruta2->hasMoved()){
            $ruta2->move(ROOTPATH . 'vendor/uploads');
        }

       $data = [
            "producto" => trim($producto),
            "precioMenudeo" => trim($precioMenudeo),
            "precioMayoreo" => trim($precioMayoreo),
            "descripcionProducto" => trim($descripcionProducto),
            "subcategoria_idSubcategoria" => trim($subcategoria_idSubcategoria),
            "stock" => trim($stock),
            "imagenProducto" => $ruta->getName(),
            "imagenProducto2" => $ruta2->getName(),
            "deleted" => $deleted
        ];

        /*echo '<pre>';
        print_r($i);*/

        if($i > 0){
            //echo 'Hola';
            unlink(ROOTPATH . 'vendor/uploads/' . $ruta->getName());
            unlink(ROOTPATH . 'vendor/uploads/' . $ruta2->getName());
            $this->session->setFlashdata('alerta_categoria', 'Ya existe un producto con ese nombre.');
            return redirect()->to(base_url('TWFF/public/agregar_producto'));

        }else{
            //echo 'Hola 2';
            //echo '<pre>';
            //print_r($data);
            if($this->producto_model->insert($data)==false){
                unlink(ROOTPATH . 'vendor/uploads/' . $ruta->getName());
                unlink(ROOTPATH . 'vendor/uploads/' . $ruta2->getName());
                $errors = $this->producto_model->errors();
                foreach($errors as $error){
                    $error;
                }
                $this->session->setFlashdata('alerta_categoria',$error);
                return redirect()->to(base_url('TWFF/public/agregar_producto'));
                //echo 'Error';
            }else{
                $this->session->setFlashdata('alerta_exitosa', 'Registro exitoso.');
                return redirect()->to(base_url('TWFF/public/producto'));
                //echo 'Exitoso';
            }

        }
    }

    public function modificar_producto(){
        $idProducto = $this->request->getPost('idProducto');
        $ruta = $this->request->getFile('imagenProducto');
        $imagenProducto_2 = $this->request->getPost('imagenProducto_2');
        $ruta2 = $this->request->getFile('imagenProducto2');
        $imagenProducto2_2 = $this->request->getPost('imagenProducto2_2');
        $producto = $this->request->getPost('producto');
        $precioMenudeo = $this->request->getPost('precioMenudeo');
        $precioMayoreo = $this->request->getPost('precioMayoreo');
        $descripcionProducto = $this->request->getPost('descripcionProducto');
        $stock = $this->request->getPost('stock');
        $deleted = $this->request->getPost('deleted');

        $bd_productos = $this->producto_model->getNombresProducto();
        $i=0;
        $producto2 = $this->producto_model->getProductoById($idProducto);
        
        if($producto2[0]['producto'] == $producto){

            if($ruta->getName() != ""){
                if(!$ruta->hasMoved()){
                    $ruta->move(ROOTPATH . 'vendor/uploads');
                }
                unlink(ROOTPATH . 'vendor/uploads/' . $imagenProducto_2);
                $imagenProducto = $ruta->getName();
            }else{
                $imagenProducto = $imagenProducto_2;   
            }

            if($ruta2->getName() != ""){
                if(!$ruta2->hasMoved()){
                    $ruta2->move(ROOTPATH . 'vendor/uploads');
                }
                unlink(ROOTPATH . 'vendor/uploads/' . $imagenProducto2_2);
                $imagenProducto2 = $ruta->getName();
            }else{
                $imagenProducto2 = $imagenProducto2_2;   
            }
            
            $data = [
                "producto" => trim($producto),
                "precioMenudeo" => trim($precioMenudeo),
                "precioMayoreo" => trim($precioMayoreo),
                "descripcionProducto" => trim($descripcionProducto),
                "stock" => trim($stock),
                "imagenProducto" => $imagenProducto,
                "imagenProducto2" => $imagenProducto2,
                "deleted" => $deleted
            ];

            $this->producto_model->update($idProducto,$data);
            $this->session->setFlashdata('alerta_exitosa', 'El producto se modificó correctamente.');
            return redirect()->to(base_url('TWFF/public/producto'));
        }else{
            foreach($bd_productos as $bd_cat){
                if($bd_cat['producto'] == $producto){
                    $i = $i +1;
                }
            }
            if($i > 0){
                $this->session->setFlashdata('alerta_categoria', 'Ya existe un producto con ese nombre.');
                return redirect()->to(base_url('TWFF/public/producto'));
            }else{

                if($ruta->getName() != ""){
                    if(!$ruta->hasMoved()){
                        $ruta->move(ROOTPATH . 'vendor/uploads');
                    }
                    $imagenProducto = $ruta->getName();
                }else{
                    $imagenProducto = $imagenProducto_2;   
                }

                if($ruta2->getName() != ""){
                    if(!$ruta2->hasMoved()){
                        $ruta2->move(ROOTPATH . 'vendor/uploads');
                    }
                    unlink(ROOTPATH . 'vendor/uploads/' . $imagenProducto2_2);
                    $imagenProducto2 = $ruta->getName();
                }else{
                    $imagenProducto2 = $imagenProducto2_2;   
                }
                
                $data = [
                    "producto" => trim($producto),
                    "precioMenudeo" => trim($precioMenudeo),
                    "precioMayoreo" => trim($precioMayoreo),
                    "descripcionProducto" => trim($descripcionProducto),
                    "stock" => trim($stock),
                    "imagenProducto" => $imagenProducto,
                    "imagenProducto2" => $imagenProducto2,
                    "deleted" => $deleted
                ];

                if($this->producto_model->update($idProducto,$data)==false){
                    if($imagenProducto = $imagenProducto_2 && $imagenProducto2 = $imagenProducto2_2){
                        $errors = $this->producto_model->errors();
                        foreach($errors as $error){
                            $error;
                        }
                        $this->session->setFlashdata('alerta_categoria', $error);
                        return redirect()->to(base_url('TWFF/public/producto'));
                    }else{
                                               
                        unlink(ROOTPATH . 'vendor/uploads/' . $ruta->getName());
                        unlink(ROOTPATH . 'vendor/uploads/' . $ruta2->getName());
                        $errors = $this->producto_model->errors();
                        foreach($errors as $error){
                            $error;
                        }
                        $this->session->setFlashdata('alerta_categoria', $error);
                        return redirect()->to(base_url('TWFF/public/producto'));
                    }                  
                    
                }else{
                    if($imagenProducto = $imagenProducto_2 && $imagenProducto2 = $imagenProducto2_2){
                        
                        $this->session->setFlashdata('alerta_exitosa', 'El producto se modificó correctamente.');
                        return redirect()->to(base_url('TWFF/public/producto'));
                    }else{
                        unlink(ROOTPATH . 'vendor/uploads/' . $ruta->getName());
                        unlink(ROOTPATH . 'vendor/uploads/' . $ruta2->getName());
                        $this->session->setFlashdata('alerta_exitosa', 'El producto se modificó correctamente.');
                        return redirect()->to(base_url('TWFF/public/producto'));
                    } 
                }
            }
        }
    }

    public function eliminar_producto(){
        $idProducto = $this->request->getPost('idProducto');
        $imagenProducto = $this->request->getPost('imagenProducto');
        $imagenProducto2 = $this->request->getPost('imagenProducto2');
        $this->producto_model->delete($idProducto);
        unlink(ROOTPATH . 'vendor/uploads/' . $imagenProducto);
        unlink(ROOTPATH . 'vendor/uploads/' . $imagenProducto2);
        return redirect()->to(base_url('TWFF/public/producto'));
    }

}