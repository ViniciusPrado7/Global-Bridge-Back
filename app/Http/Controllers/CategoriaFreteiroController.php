<?php

namespace App\Http\Controllers;

use App\Models\CategoriaFreteiro;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriaFreteiroController extends Controller
{

    public function index()
    {
        $categoria_freteiro = CategoriaFreteiro::all();
        return response()->json(
            $categoria_freteiro, 200
        );
    }
 
    public function store(Request $request)
    {
         $validated = $request->validate([
            'id_categoria' => 'required|exists:categorias,id',
            'id_freteiro' => 'required|exists:freteiros,id',
            'taxa' => 'nullable|numeric',
            'moeda' => 'required|string',
            'taxa_kg' => 'nullable|numeric',
            'taxa_usd' => 'nullable|numeric',
            'taxa_unidade' => 'nullable|numeric',   
        ]);

        $categoria_freteiro = CategoriaFreteiro::create($validated);

        return response()->json(
            $categoria_freteiro, 201
        );
    }


    public function update(Request $request, CategoriaFreteiro $categoria_freteiro)
    {
         $validated = $request->validate([
            'id_categoria' => 'required|exists: categorias,id',
            'id_freteiro' => 'required|exists:freteiros,id',
            'taxa' => 'required|numeric',
            'moeda' => 'required|string',
            'taxa_kg' => 'nullable|numeric',
            'taxa_usd' => 'nullable|numeric',
            'taxa_unidade' => 'nullable|numeric',   

        ]);

        $categoria_freteiro->update($validated);

        return response()->json(
            $categoria_freteiro, 200
        );
    }

    public function destroy(CategoriaFreteiro $categoria_freteiro)
    {
        $categoria_freteiro->delete();
        return response()->json([
            'message' => 'ID deletado com sucesso'
        ]);
    }
}
