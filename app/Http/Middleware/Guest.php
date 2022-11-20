<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Guest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(session()->has('role')){
            // Jika iya kembalikan sesuai posisi semula
            if (session()->get('role') == "pelanggan"){
                return redirect('/user');
            }else if(session()->get('role')== "pemilik"){
                return redirect('/owner');
            }else{
                return redirect('/owner');
            }
            
        }
        return $next($request);
    }
}
