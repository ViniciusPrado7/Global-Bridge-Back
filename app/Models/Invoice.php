<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'carga_id',
        'numero_invoice',
        'data_emissao',
        'data_vencimento',
        'bill_to',
        'ship_to',
        'moeda',
        'taxa',
        'descontos',
        'valor_total',
        'pdf_path',
        'observacoes'
    ];

    public function carga(){
        return $this->belongsTo(Carga::class);
    }

    public function cargaIten(){
        return $this->hasMany(Carga::class);
    }

    public function freteiro(){
        return $this->belongsTo(Freteiro::class);
    }



}
