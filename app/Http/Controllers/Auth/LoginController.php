<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
    use Auth;
    use Flashy;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

 // Gaestion de l'authentification de l'admin

    public function showAdminLoginForm()
    {
        return view('forms.login_user', ['url' => 'admin']);
    }

    public function login(Request $request)
    {

        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password,'type'=>3])) {
            Flashy::primary($request->email. ' : Utilidateur connecté avec succès  ');
            return redirect()->route('utilisateur.dashboard');
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password,'type'=>2])) {
            Flashy::message($request->email.'  : Moderateur connecté avec succès ');
            return redirect()->route('moderateur.dashboard');
        }
        
        session()->flash('message','Votre email ou mot de passe est incorecte');
       return redirect()->back();
    }
}
