<?php

namespace App\Services\Carga;

use App\Models\Carga;
use Illuminate\Support\Facades\DB;

class CargaService
{

    public function recalcularTotais(Carga $carga): void
    {
        $carga->volumes = $carga->itens()->sum('quantidade');

        $carga->valor_total = $carga->itens()
            ->selectRaw('SUM(quantidade * valor_unitario) as total')
            ->value('total') ?? 0;

        $carga->save();
    }

    public function criar(array $data): Carga
    {
        return DB::transaction(function () use ($data) {

            $carga = Carga::create(
                collect($data)->except('itens')->toArray()
            );

            foreach ($data['itens'] as $item) {
                $carga->itens()->create($item);
            }

            $this->recalcularTotais($carga);

            return $carga->load('itens');
        });
    }

    public function atualizar(Carga $carga, array $data): Carga
    {
        return DB::transaction(function () use ($carga, $data) {

            $carga->update(
                collect($data)->except('itens')->toArray()
            );

            $carga->itens()->delete();

            foreach ($data['itens'] as $item) {
                $carga->itens()->create($item);
            }

            $this->recalcularTotais($carga);

            return $carga->load('itens');
        });
    }

    public function deletar(Carga $carga): void
    {
        $carga->delete();
    }
}
