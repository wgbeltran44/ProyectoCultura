<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // Verifica que el usuario esté autenticado
        if (!Auth::check()) {
            abort(403);
        }

        // Verifica que tenga rol admin
        if (Auth::user()->role !== 'admin') {
            abort(403, 'No tienes permisos para acceder a esta sección');
        }

        return $next($request);
    }
}