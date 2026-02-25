<?php

namespace App\Http\Controllers;

use App\Models\Freteiro;
use Illuminate\Http\Request;

class FreteiroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $freteiros = Freteiro::all();
        return response()->json(
            $freteiros, 200
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string',
            'bill_to' => 'required|string',
            'ship_to' => 'required|string',
            'grupo' => 'required|string',
            'telefone' => 'required|string',
            'taxa_MIA_PY' => 'required|numeric',
            'taxa_PY_SP' => 'required|numeric',
        ]);

        $freteiro = Freteiro::create($validated);

        return response()->json(
                $freteiro,201
            );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Freteiro $freteiro)
    {
        $validated = $request->validate([
            'nome' => 'required|string',
            'bill_to' => 'required|string',
            'ship_to' => 'required|string',
            'grupo' => 'required|string',
            'telefone' => 'required|string',
            'taxa_MIA_PY' => 'required|numeric',
            'taxa_PY_SP' => 'required|numeric',
        ]);
        
        $freteiro->update($validated);

        return response()->json(
            $freteiro, 200
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Freteiro $freteiro)
    {
        $freteiro->delete();
        return response()->json([
            'message' => 'Freteiro deletado com sucesso!'
        ]);
    }
}
