<?php

namespace App\Http\Controllers;

use App\Models\CargaItem;
use App\Services\Carga\CargaItemService;
use Illuminate\Http\Request;

class CargaItemController extends Controller
{
    public function __construct(
        private CargaItemService $service
    ) {}

    public function index()
    {
        return response()->json(
            CargaItem::with('carga')->latest()->get()
        );
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'carga_id' => 'required|exists:cargas,id',
            'descricao' => 'required|string',
            'categoria' => 'required|string',
            'quantidade' => 'required|integer|min:1',
            'valor_unitario' => 'required|numeric|min:0',
        ]);

        $item = $this->service->criar($validated);

        return response()->json($item, 201);
    }

    public function update(Request $request, CargaItem $cargaItem)
    {
        $validated = $request->validate([
            'descricao' => 'required|string',
            'categoria' => 'required|string',
            'quantidade' => 'required|integer|min:1',
            'valor_unitario' => 'required|numeric|min:0',
        ]);

        $itemAtualizado = $this->service->atualizar($cargaItem, $validated);

        return response()->json($itemAtualizado, 200);
    }

    public function destroy(CargaItem $cargaItem)
    {
        $this->service->deletar($cargaItem);

        return response()->json([
            'message' => 'Item removido com sucesso'
        ]);
    }
}
