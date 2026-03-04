<?php

namespace App\Models;

// Ajustado para bater com a pasta que vi no seu VS Code: App\Enum\TipoMoeda
use App\Enums\TipoMoeda; // Mude para este caminho
use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    protected $fillable = [
        'carga_id', 
        'tipo_moeda', 
        'valor', 
        'taxa', 
        'valor_liquido', 
        'usdt_hash', 
        'observacoes'
    ];

    // O "Cast" garante que o Laravel transforme a string do banco no objeto Enum
    protected $casts = [
        'tipo_moeda' => TipoMoeda::class,
    ];

    public function carga()
    {
        return $this->belongsTo(Carga::class);
    }
}