<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Favoritos extends Controller
{
	public function index()
	{
        return view('front_end/favoritos');
	}

}