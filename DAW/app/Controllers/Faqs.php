<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\FaqModel;
use App\Models\CategoriaModel;
use App\Models\SubcategoriaModel;

class Faqs extends Controller
{
	private $faq_model;
	private $categoria_model;
    private $subcategoria_model;
    
    public function __construct()
    {
		$this->faq_model = new FaqModel();
		$this->categoria_model = new CategoriaModel();
        $this->subcategoria_model = new SubcategoriaModel();
	}

	public function index()
	{
		$data = array(
            'categorias'=>$this->categoria_model->findAll(),
			'subcategorias'=>$this->subcategoria_model->findAll(),
			'faqs'=>$this->faq_model->findAll()
        );
		
		//echo '<pre>';
		//print_r($data);
        return view('front_end/template/header',$data).view('front_end/faqs',$data).view('front_end/template/footer');
	}

}