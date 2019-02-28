<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Flashy;

class AdminController extends Controller
{
	//Affiche la vue admin
	public function showLogin(){
		return view('connect_admin');
	} 
	public function logout()
	{
		//Auth::guard('admin')->logout();
		//Auth::guard('utilisateur')->logout();
		//Auth::guard('moderateur')->logout();
		Auth::logout();
		return redirect(route('admin.login'));
	}

	public function AdminLogin(Request $request){

		$this->validate($request, 
		[
			'email'=>'required',
			'password'=>'required',
		],

		[
			'required'=>'veuillez remplir ce champ',
		]);
       
       if( Auth::attempt(['email'=>$request->email, 'password'=>$request->password,'type'=>1])){

       	Flashy::success('Administrateur connecté avec succès');
       	 return redirect()->route('admin');
       } 
       session()->flash('message','Votre email ou mot de passe est incorecte');
       return redirect()->back();

	}

	public function DeconnexionAdmin(){
		Auth::guard('admin')->logout();
		return redirect()->route('adminLogout');
	} 
}	