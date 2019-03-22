<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserAdmin
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
        if(Auth::guest()){
            return redirect()->intended('admin/login');
        }else if(Auth::user()->load('Roles')->roles->first()->name == 'admin'){
            return $next($request);
        }
        return redirect()->intended('admin/login');
    }
}
