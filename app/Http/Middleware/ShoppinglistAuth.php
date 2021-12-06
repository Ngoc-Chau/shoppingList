<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ShoppinglistAuth
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
        if($request->session()->has('LOGIN'))
        {

        }else{
            $request->session()->flash('er','truy cập bị từ trối');
            return view('auth.login');
        }
        return $next($request);
    }
}
