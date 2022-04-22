<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if(Auth::check() AND Auth::user()->nivel == 1){

            return $next($request);
        }

        return redirect()->route('home');

        //dd('Acesso negado, você não é um administrador');
        
    }
}
