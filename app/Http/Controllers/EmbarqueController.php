<?php

namespace App\Http\Controllers;

use App\Models\Embarque;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmbarqueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $embarque = Embarque::all();
        return response()->json(
            $embarque, 200
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'carga_id'=>'required|integer|exists:cargas,id',
            'codigo'=>'required|string',
            'rota'=>'required|string',
            'freteiro_id'=>'required|integer|exists:freteiros,id', //
            'data_embarque'=>'required|date',
            'data_entrega'=>'nullable|date',
            'status'=>'required|string',
        ]);

        $embarque = Embarque::create($validated);

        return response()->json(
            $embarque, 201
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Embarque $embarque)
    {
         $validated = $request->validate([
            'codigo'=>'required|string',
            'rota'=>'required|string',
            'freteiro_id'=>'required|integer|exists:freteiros,id', //
            'data_embarque'=>'required|date',
            'data_entrega'=>'nullable|date',
            'status'=>'required|string',
        ]);

        $embarque->update($validated);

        return response()->json(
            $embarque, 200
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Embarque $embarque)
    {
        $embarque->delete();
        return response()->json([
            'message' => 'Embarque cancelado com sucesso!'
        ]);
    }
}
