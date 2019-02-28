<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class Utilisateur
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
        if (Auth::check()) {

            if (Auth::User()->type>2) {

                return redirect()->back()->with('Vous devez etre un Admin avant de voir cette page');
            }

           
        } else {
            return redirect('/');
        } 

         return $next($request);
    }

}
