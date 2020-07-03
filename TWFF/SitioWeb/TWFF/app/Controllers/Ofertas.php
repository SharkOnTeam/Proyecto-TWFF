<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\DetOfeProModel;

class Ofertas extends Controller
{
	private $modelo;
    
    public function __construct()
    {
		$this->modelo = new DetOfeProModel();
	}
	
	public function index()
	{

		$data['proofer'] = $this->modelo->findAll();

		//echo $data;

    	return view('front_end/ofertas',$data);
	}

}