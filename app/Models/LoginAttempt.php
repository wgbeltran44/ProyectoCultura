<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoginAttempt extends Model
{
    protected $fillable = [
        'email', 
        'ip_address', 
        'attempts', 
        'last_attempt_at',
        'blocked_until'
    ];
    
    protected $casts = [
        'last_attempt_at' => 'datetime',
        'blocked_until' => 'datetime'
    ];
    
    /**
     * Verificar si la IP o email está bloqueado
     */
    public static function isBlocked($email, $ip)
    {
        $attempt = self::where('email', $email)
            ->orWhere('ip_address', $ip)
            ->where('blocked_until', '>', now())
            ->first();
            
        return $attempt ? $attempt->blocked_until : false;
    }
    
    /**
     * Registrar un intento fallido
     */
    public static function registerFailedAttempt($email, $ip)
    {
        $attempt = self::where('email', $email)
            ->where('ip_address', $ip)
            ->first();
            
        $maxAttempts = 5; // Intentos máximos
        $blockMinutes = 15; // Minutos de bloqueo
        
        if ($attempt) {
            $attempt->attempts++;
            $attempt->last_attempt_at = now();
            
            if ($attempt->attempts >= $maxAttempts) {
                $attempt->blocked_until = now()->addMinutes($blockMinutes);
            }
            
            $attempt->save();
        } else {
            self::create([
                'email' => $email,
                'ip_address' => $ip,
                'attempts' => 1,
                'last_attempt_at' => now(),
                'blocked_until' => null
            ]);
        }
    }
    
    /**
     * Limpiar intentos después de un login exitoso
     */
    public static function clearAttempts($email, $ip)
    {
        self::where('email', $email)
            ->where('ip_address', $ip)
            ->delete();
    }
    
    /**
     * Obtener intentos restantes
     */
    public static function getRemainingAttempts($email, $ip)
    {
        $attempt = self::where('email', $email)
            ->where('ip_address', $ip)
            ->first();
            
        if (!$attempt) {
            return 5; // Intentos máximos
        }
        
        if ($attempt->blocked_until && $attempt->blocked_until > now()) {
            return 0;
        }
        
        return max(0, 5 - $attempt->attempts);
    }
}