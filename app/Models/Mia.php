<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mia extends Model
{
    protected $fillable = [
        'freteiro_id',
        'carga_id',
        'data_invoice',  
        'data_embarque',
        'data_entrega', 
        'tipo_taxa',
        'taxa_especial',
    ];

    public function freteiro()
    {
        return $this->belongsTo(Freteiro::class);
    }

    public function carga()
    {
        return $this->belongsTo(Carga::class);
    }
}