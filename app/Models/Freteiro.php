<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Freteiro extends Model
{
     protected$fillable = [
        'nome',
        'bill_to',
        'ship_to',
        'grupo',
        'telefone',
        'taxa_MIA_PY',
        'taxa_PY_SP',
    ];

    public function cargas()
{
    return $this->hasMany(Carga::class);
}
}
