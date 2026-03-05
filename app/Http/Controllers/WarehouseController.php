<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
  
    public function index()
    {
        $warehouse = Warehouse::all();
        return response()->json(
            $warehouse, 200
        );
    }
  
    public function store(Request $request)
    {
        $validated = $request->validate([
            'carga_id' => 'required|integer|exists:cargas,id',
            'codigo' => 'required|string',
            'data_emissao' => 'nullable|date',
            'pdf_path' => 'required|string'
        ]);

        $warehouse = Warehouse::create($validated);

        return response()->json(
            $warehouse, 201
        );
    }


    public function update(Request $request, Warehouse $warehouse)
    {
         $validated = $request->validate([
            'carga_id' => 'required|integer|exists:cargas,id',
            'codigo' => 'required|string',
            'data_emissao' => 'nullable|date',
            'pdf_path' => 'required|string'
        ]);

        $warehouse->update($validated);

        return response()->json(
            $warehouse, 201
        );
    }


    public function destroy(Warehouse $warehouse)
    {
        $warehouse->delete();
        return response()->json([
            'message' => 'deleção concluída com sucesso!'
        ]);
    }
}
