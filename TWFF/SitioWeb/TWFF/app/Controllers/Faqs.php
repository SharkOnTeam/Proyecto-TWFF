<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\FaqModel;

class Faqs extends Controller
{
	private $modelo;
    
    public function __construct()
    {
		$this->modelo = new FaqModel();
	}

	public function index()
	{
		$data['faqs'] = $this->modelo->findAll();
		
        return view('front_end/faqs',$data);
	}

}