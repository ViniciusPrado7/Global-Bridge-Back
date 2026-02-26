<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carga extends Model
{
    protected $fillable = [
        'codigo',
        'cliente_id',
        'freteiro_id',
        'status',
        'metodo_entrega',
        'pais_origem',
        'pais_destino',
        'moeda',
        'data_recebimento',
        'data_prevista_embarque',
        'volumes',
        'peso',
        'shipper_information',
        'valor_total'
    ];

    public function itens()
    {
        return $this->hasMany(CargaItem::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function freteiro()
    {
        return $this->belongsTo(Freteiro::class);
    }
}
