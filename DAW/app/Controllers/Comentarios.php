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
			'titulo'=>'Comentarios-TWFF',
			'categorias'=>$this->categoria_model->findAll(),
            'subcategorias'=>$this->subcategoria_model->findAll(),
			'comentarios'=>$this->comentario_model->usu_comen()
		);

		return view('front_end/template/header',$data).view('front_end/comentarios',$data).view('front_end/template/footer');
	}

	public function guardar_comentario(){
		$idUsuario = $this->request->getPost('idUsuario');
		$palabra = $this->request->getPost('palabra');
		$comentario = $this->request->getPost('comentario');
		$calificacion = $this->request->getPost('estrellas');
		$fecha = date('d-m-y');

		$data = [
			"usuario_idUsuario" => $idUsuario,
			"palabraComentario" => $palabra,
			"comentario" => $comentario,
			"calificacion" => $calificacion,
			"fechaComentario" => $fecha,
			"deleted" => 1
		];
		
		$this->comentario_model->insert($data);

		return redirect()->to(base_url('TWFF/public/comentarios'));
	}

}