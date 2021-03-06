<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\CategoriaModel;
use App\Models\SubcategoriaModel;

class Login extends Controller
{
	private $categoria_model;
    private $subcategoria_model;
    private $session = null;

    public function __construct()
    {
        $this->categoria_model = new CategoriaModel();
        $this->subcategoria_model = new SubcategoriaModel();
        $this->session = \Config\Services::session();
	}
	
	public function index()
	{
        if($this->session->has('usuario')){
            return redirect()->to(base_url('TWFF/public/miperfil'));
            
        }else{
        $data = array(
            'titulo'=>'Iniciar sesión/Registrarse-TWFF',
            'categorias'=>$this->categoria_model->findAll(),
            'subcategorias'=>$this->subcategoria_model->findAll()
        );
            
        return view('front_end/template/header',$data).view('front_end/login').view('front_end/template/footer');
        }
    }

}