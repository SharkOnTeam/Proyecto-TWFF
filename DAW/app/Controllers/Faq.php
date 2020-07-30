<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Faq extends Controller
{
	
	public function index()
	{
        $data = array(
            'titulo'=>'Faqs'
        );

        return view('back_end/template/b_header',$data).view('back_end/template/b_sidebar').view('back_end/faqs/listar_faqs').view('back_end/template/b_footer');
	}

}