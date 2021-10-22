<?php

namespace App\Http\Middleware;

use Closure;

class CheckRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if (auth()->check()){
            if (($role == 'admin' && auth()->user()->is_admin)
            || ($role == 'chef' && auth()->user()->is_chef)
            || ($role == 'clerk' && auth()->user()->is_clerk)
            ){
                return $next($request);
            }
        }
        return redirect()->route('login');    
    }
}
