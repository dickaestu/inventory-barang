<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class isKepalaBidang
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
        if(Auth::user() && Auth::user()->roles == 'Kepala Bidang'){

            return $next($request);
        } else if(Auth::user() && Auth::user()->roles == 'Admin'){

            return $next($request);
        }
        return redirect('/');    }
}
