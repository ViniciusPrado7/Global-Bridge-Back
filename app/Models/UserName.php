<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserName extends Model
{
    protected $fillable = [
        'nome',
        'email',
        'tipo_usuario',
        'senha',
        'data_nascimento'
    
    ];
}
