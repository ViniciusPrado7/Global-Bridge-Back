<?php

namespace App\Http\Controllers;

use App\Models\CargaItem;
use Illuminate\Http\Request;

class CargaItemController extends Controller
{
    public function index()
    {
        return response()->json(
            CargaItem::with('carga'->latest()->get())
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

        $item = CargaItem::create($validated);

        return response()->json(
            $item->load('carga'),
            201
        );
    }

    public function update(Request $request, CargaItem $cargaItem)
    {
          $validated = $request->validate([
            'descricao' => 'required|string',
            'categoria' => 'required|string',
            'quantidade' => 'required|integer|min:1',
            'valor_unitario' => 'required|numeric|min:0',
        ]);

        $cargaItem->update($validated);

        return response()->json(
            $cargaItem->load('carga'),
            200
        );
    }

    public function destroy(CargaItem $cargaItem)
    {
        $cargaItem->delete();

        return response()->json([
            'message' => 'Item removido com sucesso'
        ]);
    }
}
