<?php

namespace App\Services\Pagamento;

use App\Models\Carga;
use App\Models\Pagamento;
use Illuminate\Support\Facades\DB;
use Exception;

class PagamentoService
{
    public function registrar(Carga $carga, array $dados): Pagamento
    {
        return DB::transaction(function () use ($carga, $dados) {

            $carga = Carga::where('id', $carga->id)
                ->lockForUpdate()
                ->first();

            if ((float) $carga->saldo_devedor <= 0) {
                $carga->saldo_devedor = $carga->valor_total;
                $carga->save();
            }

            $valorOriginal = (float) $dados['valor'];
            $taxa = (float) ($dados['taxa'] ?? 0);

            $valorDesconto = $valorOriginal * ($taxa / 100);
            $valorLiquido = $valorOriginal - $valorDesconto;

            if ($valorLiquido <= 0) {
                throw new Exception("O valor líquido resultante deve ser maior que zero.");
            }

            if ($valorLiquido > (float) $carga->saldo_devedor) {
                throw new Exception("Pagamento líquido ($valorLiquido) maior que o saldo disponível.");
            }

            $novoSaldo = (float) $carga->saldo_devedor - $valorLiquido;

           
            $carga->saldo_devedor = $novoSaldo;
            $carga->save();

            return $carga->pagamentos()->create([
                'tipo_moeda'    => $dados['tipo_moeda'],
                'valor'         => $valorOriginal,
                'taxa'          => $taxa,
                'valor_liquido' => $valorLiquido,
                'usdt_hash'     => $dados['usdt_hash'] ?? null,
                'observacoes'   => $dados['observacoes'] ?? null,
            ]);
        });
    }
}