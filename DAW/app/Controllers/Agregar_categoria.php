<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\CategoriaModel;

class Agregar_categoria extends Controller
{
    private $categoria_model;

    public function __construct()
    {
        $this->categoria_model = new CategoriaModel();
	}
	
	public function index()
	{
        $idCategoria = $this->request->getPost('idCategoria');

        if($idCategoria != null){
            
            $data = array(
                'titulo'=>'Agregar categoría',
                'categoria'=>$this->categoria_model->getCategoriaById($idCategoria)
            );
            //echo '<pre>';
            //print_r($data);
            return view('back_end/template/b_header',$data).view('back_end/template/b_sidebar').view('back_end/categorias/agregar_categoria',$data).view('back_end/template/b_footer');
        }else{
            
            $data = array(
                'titulo'=>'Agregar categoría',
                'categoria'=>null
            );
            //echo '<pre>';
            //print_r($data);
            return view('back_end/template/b_header',$data).view('back_end/template/b_sidebar').view('back_end/categorias/agregar_categoria').view('back_end/template/b_footer');
        }

    }


}