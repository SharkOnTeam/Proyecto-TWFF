<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProductoModel;
use App\Models\SubcategoriaModel;

class Agregar_producto extends Controller
{
    private $producto_model;
    private $subcategoria_model;

    public function __construct()
    {
        $this->producto_model = new ProductoModel();
        $this->subcategoria_model = new SubcategoriaModel();
	}
	
	public function index()
	{
        $idProducto = $this->request->getPost('idProducto');

        if($idProducto != null){
            
            $data = array(
                'titulo'=>'Agregar producto',
                'producto'=>$this->producto_model->getProductoById($idProducto),
                'subcategoria' => $this->subcategoria_model->findAll()
            );
            //echo '<pre>';
            //print_r($data);
            return view('back_end/template/b_header',$data).view('back_end/template/b_sidebar').view('back_end/productos/agregar_producto',$data).view('back_end/template/b_footer');
        }else{
            
            $data = array(
                'titulo'=>'Agregar producto',
                'producto'=>null,
                'subcategoria' => $this->subcategoria_model->findAll()
            );
            //echo '<pre>';
            //print_r($data);
            return view('back_end/template/b_header',$data).view('back_end/template/b_sidebar').view('back_end/productos/agregar_producto').view('back_end/template/b_footer');
        }

    }


}