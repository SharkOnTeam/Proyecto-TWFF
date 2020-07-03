<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Login extends Controller
{
	public function index()
	{
        return view('front_end/login');
        //this->load->view('front_end/template/header');
	}

}