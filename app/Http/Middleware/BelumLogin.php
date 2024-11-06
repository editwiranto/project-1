<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class BelumLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!Auth::check()){
            return redirect('/login')->with('fail','Silahkan Login Terlebih Dahulu');
        }

        if($request->is('login')){
            return redirect('/index')->with('fail','Tidak bisa kembali ke halaman login');
        }


        return $next($request);
    }


}
