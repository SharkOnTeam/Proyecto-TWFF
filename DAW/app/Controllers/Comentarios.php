<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ComentarioModel;
use App\Models\CategoriaModel;
use App\Models\SubcategoriaModel;

class Comentarios extends Controller
{
	private $comentario_model;
	private $categoria_model;
    private $subcategoria_model;
    
    public function __construct()
    {
		$this->comentario_model = new ComentarioModel();
		$this->categoria_model = new CategoriaModel();
        $this->subcategoria_model = new SubcategoriaModel();
	}

	public function index()
	{
		$data = array(
			'categorias'=>$this->categoria_model->findAll(),
            'subcategorias'=>$this->subcategoria_model->findAll(),
			'comentarios'=>$this->comentario_model->usu_comen()
		);

		return view('front_end/template/header',$data).view('front_end/comentarios',$data).view('front_end/template/footer');
	}

}