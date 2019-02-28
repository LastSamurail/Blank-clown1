<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ModerateurDashboardController extends Controller
{
	public function __construct()
	{
		$this->middleware('moderateur');
	}

    public function index()
    {
    	return view('moderateur.index');
    }
}
