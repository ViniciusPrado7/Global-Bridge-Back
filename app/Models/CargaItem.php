<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CargaItem extends Model
{
    protected $fillable = [
        'carga_id',
        'descricao',
        'categoria',
        'quantidade',
        'valor_unitario',
    ];

    public function carga()
    {
        return $this->belongsTo(Carga::class);
    }

}
