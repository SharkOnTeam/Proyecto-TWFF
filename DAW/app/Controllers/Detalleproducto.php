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
		$data = array(
            'categorias'=>$this->categoria_model->findAll(),
            'subcategorias'=>$this->subcategoria_model->findAll()
		);
		
        return view('front_end/template/header',$data).view('front_end/detalleproducto').view('front_end/template/footer');
	}

	public function mostrar_detalle()
	{
		$producto = $this->request->getPost('producto');
	}

}