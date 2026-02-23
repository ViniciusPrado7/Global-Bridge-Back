<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carga extends Model
{
    protected $fillable = [
        'cliente',
        'invoice',
        'metodo_entrega',
        'local_embarque',
        'destino',
        'data_recebimento',
        'data_prevista_embarque',
        'volumes',
        'peso',
        'shipper_information',
    ];

      public function itens()
    {
        return $this->hasMany(CargaItem::class);
    }
}
