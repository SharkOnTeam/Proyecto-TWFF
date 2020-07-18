<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProductoModel;
use App\Models\CategoriaModel;
use App\Models\SubcategoriaModel;

class Tienda extends Controller
{
	private $producto_model;
	private $categoria_model;
    private $subcategoria_model;
    
    public function __construct()
    {
		$this->modelo = new ProductoModel();
		$this->categoria_model = new CategoriaModel();
        $this->subcategoria_model = new SubcategoriaModel();
	}
	
	public function index()
	{
		$data = array(
            'categorias'=>$this->categoria_model->findAll(),
			'subcategorias'=>$this->subcategoria_model->findAll(),
			'productos'=>$this->modelo->findAll()
        );

		return view('front_end/template/header',$data).view('front_end/tienda',$data).view('front_end/template/footer');
	}

}