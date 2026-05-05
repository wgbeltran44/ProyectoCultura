<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Obra extends Model
{
    protected $fillable = [
        'titulo',
        'descripcion',
        'tipo',
        'autor',
        'fecha',
        'imagen',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

