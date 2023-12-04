<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verificar se o usuário é autenticado com o guard 'admin'
        if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->is_admin) {
            return $next($request);
        }

        return redirect('/'); // Redirecionar se não for admin
    }
}
