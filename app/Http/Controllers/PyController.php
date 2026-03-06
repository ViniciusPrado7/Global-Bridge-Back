<?php

namespace App\Http\Controllers;

use App\Models\Py;
use App\Models\Carga;
use App\Models\Freteiro;
use Illuminate\Http\Request;

class PyController extends Controller
{
    public function index()
    {
        $pys = Py::with(['freteiro', 'carga'])->get();
        return response()->json($pys);
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

        $py = Py::create($request->all());
        return response()->json($py, 201);
    }

    public function show(Py $py)
    {
        return response()->json($py->load(['freteiro', 'carga']));
    }

    public function update(Request $request, Py $py)
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
            
        $py->update($validated);
        return response()->json($py->fresh(), 200);
    }

    public function destroy(Py $py)
    {
        $py->delete();
        return response()->json(['message' => 'Py deletada com sucesso']);
    }
}