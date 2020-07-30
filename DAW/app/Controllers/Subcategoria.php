<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Subcategoria extends Controller
{
	
	public function index()
	{
        $data = array(
            'titulo'=>'Subcategorías'
        );

        return view('back_end/template/b_header',$data).view('back_end/template/b_sidebar').view('back_end/subcategorias/listar_subcategorias').view('back_end/template/b_footer');
	}

}