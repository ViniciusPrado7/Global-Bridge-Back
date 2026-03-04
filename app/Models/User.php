<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'nome',
        'email',
        'tipo_usuario',
        'senha',
        'data_nascimento'
    
    ];
}
