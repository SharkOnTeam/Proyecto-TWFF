<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Producto extends Controller
{
	
	public function index()
	{
        $data = array(
            'titulo'=>'Productos'
        );

        return view('back_end/template/b_header',$data).view('back_end/template/b_sidebar').view('back_end/productos/listar_productos').view('back_end/template/b_footer');
	}

}