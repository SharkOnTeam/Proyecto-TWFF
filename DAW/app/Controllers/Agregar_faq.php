<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\FaqModel;

class Agregar_faq extends Controller
{
    private $faq_model;

    public function __construct()
    {
        $this->faq_model = new FaqModel();
	}
	
	public function index()
	{
        $idFaq = $this->request->getPost('idFaq');

        if($idFaq != null){
            
            $data = array(
                'titulo'=>'Agregar FAQ',
                'faq'=>$this->faq_model->getFaqById($idFaq)
            );
            //echo '<pre>';
            //print_r($data);
            return view('back_end/template/b_header',$data).view('back_end/template/b_sidebar').view('back_end/faqs/agregar_faq',$data).view('back_end/template/b_footer');
        }else{
            
            $data = array(
                'titulo'=>'Agregar FAQ',
                'faq'=>null
            );
            //echo '<pre>';
            //print_r($data);
            return view('back_end/template/b_header',$data).view('back_end/template/b_sidebar').view('back_end/faqs/agregar_faq').view('back_end/template/b_footer');
        }

    }


}