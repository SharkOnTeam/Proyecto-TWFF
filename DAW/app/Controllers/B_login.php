<?php namespace App\Controllers;

use CodeIgniter\Controller;

class B_login extends Controller
{
	
	public function index()
	{
		$data = array(
            'titulo'=>'Inicio de sesión'
		);
		
        return view('back_end/template/b_header',$data).view('back_end/b_login').view('back_end/template/b_footer');
	}

}