<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
     //Middleware pour empecher l'accès a la page de l'admin
     public function __construct()
	{
		$this->middleware('admin');
	}

    public function index()
    {
    	return view('admin.index');
    }
}
