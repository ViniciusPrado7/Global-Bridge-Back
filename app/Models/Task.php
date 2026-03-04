<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'tarefa',
        'prioridade',
        'responsavel',
        'data_cadastro',
        'data_inicio',
        'data_conclusao',
    ];
}
