<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class Usersimple
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        

        //Auth::check() pour verifier si un quelqun est connecté
        if (Auth::check()) {

            if (Auth::User()->type!=3) {

        return redirect()->back()->with('Vous devez etre un administrateur avant de voir cette page');
            }

        }
         else {

            return redirect(route('index'));
        }

        return $next($request);
    }
    
}
