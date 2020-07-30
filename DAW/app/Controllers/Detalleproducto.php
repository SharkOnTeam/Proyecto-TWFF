<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\CategoriaModel;
use App\Models\SubcategoriaModel;
use App\Models\ProductoModel;

class Detalleproducto extends Controller
{
	private $categoria_model;
	private $subcategoria_model;
	private $producto_model;
	
	public function __construct()
    {
        $this->categoria_model = new CategoriaModel();
		$this->subcategoria_model = new SubcategoriaModel();
		$this->producto_model = new ProductoModel();
	}
	
	public function index()
	{	
		$idProducto = $this->request->getPost('producto');

		$data = array(
            'categorias'=>$this->categoria_model->findAll(),
			'subcategorias'=>$this->subcategoria_model->findAll(),
			'detalle_producto'=>$this->producto_model->detalle_producto($idProducto)
		);
		
        return view('front_end/template/header',$data).view('front_end/detalleproducto',$data).view('front_end/template/footer');
	}


}