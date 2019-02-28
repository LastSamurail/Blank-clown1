<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    
        public function handle($request, Closure $next, $guard = null)
        {
            /*if (Auth::guard($guard)->check()) {
                return redirect('/admin_page');
            }
            if ($guard == "utilisateur" && Auth::guard($guard)->check()) {
                return redirect(route('utilisateur.dashboard'));
            }
            if ($guard == "moderateur" && Auth::guard($guard)->check()) {
                return redirect(route('moderateur.dashboard'));
            }*/

            return $next($request);
        }
    }

