<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\OfertaModel;

class Agregar_oferta extends Controller
{
    private $oferta_model;

    public function __construct()
    {
        $this->oferta_model = new OfertaModel();
	}
	
	public function index()
	{
        $idOferta = $this->request->getPost('idOferta');

        if($idOferta != null){
            
            $data = array(
                'titulo'=>'Agregar Oferta',
                'oferta'=>$this->oferta_model->getOfertaById($idOferta)
            );
            //echo '<pre>';
            //print_r($data);
            return view('back_end/template/b_header',$data).view('back_end/template/b_sidebar').view('back_end/ofertas/agregar_oferta',$data).view('back_end/template/b_footer');
        }else{
            
            $data = array(
                'titulo'=>'Agregar Ofreta',
                'oferta'=>null
            );
            //echo '<pre>';
            //print_r($data);
            return view('back_end/template/b_header',$data).view('back_end/template/b_sidebar').view('back_end/ofertas/agregar_oferta').view('back_end/template/b_footer');
        }

    }


}