<?php

namespace App\Services\Carga;

use App\Models\CargaItem;
use Illuminate\Support\Facades\DB;

class CargaItemService
{
    public function __construct(
        private CargaService $cargaService
    ) {}

    public function criar(array $data): CargaItem
    {
        return DB::transaction(function () use ($data) {

            $item = CargaItem::create($data);

            $this->cargaService->recalcularTotais($item->carga);

            return $item->load('carga');
        });
    }

    public function atualizar(CargaItem $item, array $data): CargaItem
    {
        return DB::transaction(function () use ($item, $data) {

            $item->update($data);

            $this->cargaService->recalcularTotais($item->carga);

            return $item->load('carga');
        });
    }

    public function deletar(CargaItem $item): void
    {
        DB::transaction(function () use ($item) {

            $carga = $item->carga;

            $item->delete();

            $this->cargaService->recalcularTotais($carga);
        });
    }
}
