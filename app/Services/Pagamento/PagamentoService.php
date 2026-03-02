<?php

namespace App\Services\Pagamento;

use App\Models\Carga;
use App\Models\Pagamento;
use App\Enums\TipoMoeda; 
use Illuminate\Support\Facades\DB;
use Exception;

class PagamentoService 
{


    public function registrar(Carga $carga, array $dados)
    {
       
        if ($dados['tipo_moeda'] === 'USDT' && empty($dados['usdt_hash'])) {
            throw new Exception("O hash é obrigatório para pagamentos em USDT.");
        }
        if ($dados['tipo_moeda'] === 'USD') {
            $dados['usdt_hash'] = null;
        }

        $valorLiquido = (float)$dados['valor'] / (float)$dados['taxa'];

        return DB::transaction(function () use ($carga, $dados, $valorLiquido) {
            return $carga->pagamentos()->create([
                'tipo_moeda'    => $dados['tipo_moeda'],
                'valor'         => $dados['valor'],
                'taxa'          => $dados['taxa'],
                'valor_liquido' => $valorLiquido,
                'usdt_hash'     => $dados['usdt_hash'],
                'observacoes'   => $dados['observacoes'] ?? null,
            ]);
        });
    }
}