<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoriaFreteiro extends Model
{
    protected $fillable = [
        'id_categoria',
        'id_freteiro',
        'taxa',
        'moeda',
        'taxa_kg',
        'taxa_usd',
        'taxa_unidade'
    ];

    public function categoria(){
        return $this->belongsToMany(Categoria::class);
    }

    public function freteiro(){
        return $this->belongsToMany(Freteiro::class);
    }
}
