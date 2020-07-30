<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Usuario extends Controller
{
	
	public function index()
	{
        $data = array(
            'titulo'=>'Usuarios'
        );

        return view('back_end/template/b_header',$data).view('back_end/template/b_sidebar').view('back_end/usuarios/listar_usuarios').view('back_end/template/b_footer');
	}

}