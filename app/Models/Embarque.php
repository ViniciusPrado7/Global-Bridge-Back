<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Embarque extends Model
{
    protected $fillable = [
        'carga_id',
        'codigo',
        'rota',
        'freteiro_id',
        'data_embarque',
        'data_entrega',
        'status',
    ];

    public function freteiros(){
        return $this->belongsTo(Freteiro::class);
    }

    
    public function cargas(){
        return $this->belongsTo(Carga::class);
    }
}
