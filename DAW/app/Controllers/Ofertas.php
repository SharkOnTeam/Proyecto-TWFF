<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\DetOfeProModel;
use App\Models\CategoriaModel;
use App\Models\SubcategoriaModel;

class Ofertas extends Controller
{
	private $oferta_model;
	private $categoria_model;
    private $subcategoria_model;
    
    public function __construct()
    {
		$this->oferta_model = new DetOfeProModel();
		$this->categoria_model = new CategoriaModel();
        $this->subcategoria_model = new SubcategoriaModel();
	}
	
	public function index()
	{

		$data = array(
			'titulo'=>'Ofertas-TWFF',
            'categorias'=>$this->categoria_model->findAll(),
			'subcategorias'=>$this->subcategoria_model->findAll(),
			'proofer'=>$this->oferta_model->detalle_producto_oferta()
        );

		//echo '<pre>';
		//print_r($data);

		return view('front_end/template/header',$data).view('front_end/ofertas',$data).view('front_end/template/footer');
	}

}