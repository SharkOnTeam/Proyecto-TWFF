<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Inicio extends Controller
{
	public function index()
	{
        return view('front_end/inicio');
        //this->load->view('front_end/template/header');
	}

}