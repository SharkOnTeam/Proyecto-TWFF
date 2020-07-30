<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Comentario extends Controller
{
	
	public function index()
	{
        $data = array(
            'titulo'=>'Comentarios'
        );

        return view('back_end/template/b_header',$data).view('back_end/template/b_sidebar').view('back_end/comentarios/listar_comentarios').view('back_end/template/b_footer');
	}

}