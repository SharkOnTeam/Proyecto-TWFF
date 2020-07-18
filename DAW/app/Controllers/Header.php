<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\CategoriaModel;
use App\Models\SubcategoriaModel;

class Header extends Controller
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
        //echo '<pre>';
        //print_r($data);
    	return view('front_end/template/header',$data).view('front_end/template/footer');
	}

}