<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\SubcategoriaModel;
use App\Models\CategoriaModel;

class Agregar_subcategoria extends Controller
{
    private $categoria_model;

    public function __construct()
    {
        $this->subcategoria_model = new SubcategoriaModel();
        $this->categoria_model = new CategoriaModel();
	}
	
	public function index()
	{
        $idSubcategoria = $this->request->getPost('idSubcategoria');

        if($idSubcategoria != null){
            
            $data = array(
                'titulo'=>'Agregar subcategoría',
                'subcategoria'=>$this->subcategoria_model->getSubById($idSubcategoria),
                'categorias' => $this->categoria_model->findAll()
            );
            //echo '<pre>';
            //print_r($data);
            return view('back_end/template/b_header',$data).view('back_end/template/b_sidebar').view('back_end/subcategorias/agregar_subcategoria',$data).view('back_end/template/b_footer');
        }else{
            
            $data = array(
                'titulo'=>'Agregar subcategoría',
                'subcategoria'=>null,
                'categorias' => $this->categoria_model->findAll()
            );
            //echo '<pre>';
            //print_r($data);
            return view('back_end/template/b_header',$data).view('back_end/template/b_sidebar').view('back_end/subcategorias/agregar_subcategoria').view('back_end/template/b_footer');
        }

    }


}