<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\LoginAttempt;

class LoginRateLimiter
{
    public function handle(Request $request, Closure $next)
    {
        $email = $request->email;
        $ip = $request->ip();
        
        // Verificar si está bloqueado
        $blockedUntil = LoginAttempt::isBlocked($email, $ip);
        
        if ($blockedUntil) {
            $minutesLeft = ceil(now()->diffInMinutes($blockedUntil));
            
            return back()->withErrors([
                'email' => "Demasiados intentos fallidos. Tu acceso está bloqueado por {$minutesLeft} minutos.",
            ])->onlyInput('email');
        }
        
        return $next($request);
    }
}