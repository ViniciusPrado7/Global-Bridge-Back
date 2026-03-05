<?php

namespace App\Http\Controllers;

use App\Models\Mia;
use App\Models\Carga;
use App\Models\Freteiro;
use Illuminate\Http\Request;

class MiaController extends Controller
{
    public function index()
    {
        $mias = Mia::with(['freteiro', 'carga'])->get();
        return response()->json($mias);
    }

    public function store(Request $request)
    {
        $request->validate([
            'freteiro_id'   => 'required|exists:freteiros,id',
            'carga_id'      => 'required|exists:cargas,id',
            'data_invoice'  => 'required|date',
            'data_embarque' => 'required|date',
            'data_entrega'  => 'required|date',
            'tipo_taxa'     => 'required|in:taxa_kg,taxa_usd,taxa_real,taxa_unidade,frete_fixo',
            'taxa_especial' => 'required|string',
        ]);

        $mia = Mia::create($request->all());
        return response()->json($mia, 201);
    }

    public function show(Mia $mia)
    {
        return response()->json($mia->load(['freteiro', 'carga']));
    }

    public function update(Request $request, Mia $mia)
    {
        $validated = $request->validate([
            'freteiro_id'   => 'required|exists:freteiros,id',
            'carga_id'      => 'required|exists:cargas,id',
            'data_invoice'  => 'required|date',
            'data_embarque' => 'required|date',
            'data_entrega'  => 'required|date',
            'tipo_taxa'     => 'required|in:taxa_kg,taxa_usd,taxa_real,taxa_unidade,frete_fixo',
            'taxa_especial' => 'required|string',
        ]);
            
        $mia->update($validated);  // 👈 use a variável $validated
        return response()->json($mia->fresh(), 200);
    }

    public function destroy(Mia $mia)
    {
        $mia->delete();
        return response()->json(['message' => 'Mia deletada com sucesso']);
    }
}