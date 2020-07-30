<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Oferta extends Controller
{
	
	public function index()
	{
        $data = array(
            'titulo'=>'Ofertas'
        );

        return view('back_end/template/b_header',$data).view('back_end/template/b_sidebar').view('back_end/ofertas/listar_ofertas').view('back_end/template/b_footer');
	}

}