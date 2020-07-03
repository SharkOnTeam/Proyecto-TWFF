<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProductoModel;

class Tienda extends Controller
{
	private $modelo;
    
    public function __construct()
    {
		$this->modelo = new ProductoModel();
	}
	
	public function index()
	{
		$data['productos'] = $this->modelo->findAll();

    	return view('front_end/tienda',$data);
	}

}