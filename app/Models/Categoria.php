<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable =[
        'MI-PY',
        'PY-SP'
    ];

    public function categoria_freteiro(){
        return $this->hasMany(Categoria_Freteiro::class);
    }
}
