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
       
    ];

    public function cargas(){
        return $this->hasMany(Carga::class);
    }

    public function invoice(){
        return $this->hasMany(Freteiro::class);
    }

    public function categoria_freteiro(){
        return $this->hasMany(Categoria_Freteiro::class);
    }
}
