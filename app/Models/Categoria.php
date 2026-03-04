<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillabel =[
        'MI-PY',
        'PY-SP'
    ];

    public function freteiro(){
        return $this->hasMany(Freteiro::class);
    }
}
