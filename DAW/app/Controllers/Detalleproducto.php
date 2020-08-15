<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\CategoriaModel;
use App\Models\SubcategoriaModel;
use App\Models\ProductoModel;
use App\Models\DetOfeProModel;

class Detalleproducto extends Controller
{
	private $categoria_model;
	private $subcategoria_model;
	private $producto_model;
	private $oferta_model;
	
	public function __construct()
    {
        $this->categoria_model = new CategoriaModel();
		$this->subcategoria_model = new SubcategoriaModel();
		$this->producto_model = new ProductoModel();
		$this->oferta_model = new DetOfeProModel();
	}
	
	public function index()
	{	
		$idProducto = $this->request->getPost('producto');

		$data = array(
			'titulo'=>'Detalle del producto-TWFF',
            'categorias'=>$this->categoria_model->findAll(),
			'subcategorias'=>$this->subcategoria_model->findAll(),
			'detalle_producto'=>$this->producto_model->detalle_producto($idProducto),
			'proofer'=>$this->oferta_model->detalle_producto_oferta()
		);
		
        return view('front_end/template/header',$data).view('front_end/detalleproducto',$data).view('front_end/template/footer');
	}


}