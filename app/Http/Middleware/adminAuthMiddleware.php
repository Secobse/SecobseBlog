<?php

namespace App\Http\Middleware;

use Closure;

class adminAuthMiddleware
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
        if(session('isAdminLogin') != true)
        {
            return redirect('/admin/login');
        }
        return $next($request);
    }
}
