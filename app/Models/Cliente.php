<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected$fillable = [
        'nome',
        'taxa_USDT',
        'telefone',
        'grupo',
    ];

    public function cargas()
{
    return $this->hasMany(Carga::class);
}
}
