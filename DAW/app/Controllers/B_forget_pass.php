<?php namespace App\Controllers;

use CodeIgniter\Controller;

class B_forget_pass extends Controller
{
	
	public function index()
	{
		$data = array(
            'titulo'=>'Recuperar contraseña'
        );
        return view('back_end/template/b_header',$data).view('back_end/b_forget_pass').view('back_end/template/b_footer');
	}

}