<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ComentarioModel;

class Comentarios extends Controller
{
	private $modelo;
    
    public function __construct()
    {
		$this->modelo = new ComentarioModel();
	}

	public function index()
	{
        $data['comentarios'] = $this->modelo->findAll();

    	return view('front_end/comentarios',$data);
	}

}