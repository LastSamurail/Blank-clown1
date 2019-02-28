<?php

namespace App\Http\Controllers;
use App\Http\Middleware\administrateur;
use Illuminate\Http\Request;

class UtilisateurDashboardController extends Controller
{
    public function __construct()
	{
		$this->middleware('usersimple');
	}


    public function index()
    {
    	return view('utilisateur.index');
    }
}
