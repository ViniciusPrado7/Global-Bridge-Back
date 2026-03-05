<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    protected $fillable = [
        'carga_id',
        'codigo',
        'data_emissao',
        'pdf_path'
    ];

    public function carga(){
        return $this->belongsTo(Carga::class);
    }
}
