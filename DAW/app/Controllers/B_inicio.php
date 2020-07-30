<?php namespace App\Controllers;

use CodeIgniter\Controller;

class B_inicio extends Controller
{
	
	public function index()
	{
		$data = array(
            'titulo'=>'Inicio'
		);
		
        return view('back_end/template/b_header',$data).view('back_end/template/b_sidebar').view('back_end/b_inicio').view('back_end/template/b_footer');
	}

}