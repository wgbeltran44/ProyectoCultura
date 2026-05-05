<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Obra;

#[Fillable(['name', 'email', 'password', 'role'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * RELACIÓN: Un usuario tiene muchas obras
     */
    public function obras()
    {
        return $this->hasMany(Obra::class);
    }

    /**
     * HELPERS DE ROLES (MUY ÚTILES)
     */
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isArtista()
    {
        return $this->role === 'artista';
    }

    public function isUsuario()
    {
        return $this->role === 'usuario';
    }

    /**
     * CASTS
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}