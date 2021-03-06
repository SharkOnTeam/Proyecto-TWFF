<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProductoModel;
use App\Models\CategoriaModel;
use App\Models\SubcategoriaModel;
use App\Models\DetOfeProModel;

class Tienda extends Controller
{
	private $producto_model;
	private $categoria_model;
    private $subcategoria_model;
    private $oferta_model;
    
    public function __construct()
    {
		$this->producto_model = new ProductoModel();
		$this->categoria_model = new CategoriaModel();
		$this->subcategoria_model = new SubcategoriaModel();
		$this->oferta_model = new DetOfeProModel();
	}
	
	public function index()
	{
		$filtro = $this->request->getPost('filtro');
		if($filtro != null){
			$data = array(
				'titulo'=>'Tienda-TWFF',
				'categorias'=>$this->categoria_model->findAll(),
				'subcategorias'=>$this->subcategoria_model->findAll(),
				'productos'=>$this->producto_model->filtrar_producto($filtro),
				'nombre' =>$filtro,
				'proofer'=>$this->oferta_model->detalle_producto_oferta()
			);
			
			//echo '<pre>';
			//print_r($data);
			return view('front_end/template/header',$data).view('front_end/tienda',$data).view('front_end/template/footer');
		}else{
			$data = array(
				'titulo'=>'Tienda-TWFF',
				'categorias'=>$this->categoria_model->findAll(),
				'subcategorias'=>$this->subcategoria_model->findAll(),
				'productos'=>$this->producto_model->findAll(),
				'nombre' =>'Todas',
				'proofer'=>$this->oferta_model->detalle_producto_oferta()
				
			);
			
			//echo '<pre>';
			//print_r($data);
			return view('front_end/template/header',$data).view('front_end/tienda',$data).view('front_end/template/footer');

		}
		
	}

}