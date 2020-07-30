<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Pedido extends Controller
{
	
	public function index()
	{
        $data = array(
            'titulo'=>'Pedidos'
        );

        return view('back_end/template/b_header',$data).view('back_end/template/b_sidebar').view('back_end/pedidos/listar_pedidos').view('back_end/template/b_footer');
	}

}