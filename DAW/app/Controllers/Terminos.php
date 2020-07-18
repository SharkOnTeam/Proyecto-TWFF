<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\CategoriaModel;
use App\Models\SubcategoriaModel;

class Terminos extends Controller
{
	private $categoria_model;
	private $subcategoria_model;
	
	public function __construct()
    {
        $this->categoria_model = new CategoriaModel();
        $this->subcategoria_model = new SubcategoriaModel();
	}
	
	public function index()
	{
        $data = array(
            'categorias'=>$this->categoria_model->findAll(),
            'subcategorias'=>$this->subcategoria_model->findAll()
		);
		
        return view('front_end/template/header',$data).view('front_end/terminos').view('front_end/template/footer');
	}

}