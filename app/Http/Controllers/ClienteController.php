<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClienteController extends Controller
{

    public function index()
    {
        $cliente = Cliente::all();
        return response()->Json(
            $cliente,
            200
        );
    }

    public function store(Request $request)
    {
        $validated = $request->validate([


            'nome' => 'required|string',
            'taxa_USDT' => 'required|numeric',
            'telefone' => 'required|string',
            'grupo' => 'required|string',
        ]);
        $cliente = Cliente::create($validated);
        return response()->json(
            $cliente,
            201
        );

    }

    public function update(Request $request, Cliente $cliente)
    {
        $validated = $request->validate([
            'nome' => 'required|string',
            'taxa_USDT' => 'required|numeric',
            'telefone' => 'required|string',
            'grupo' => 'required|string',
        ]);

        $cliente->update($validated);
        return response()->json(
            $cliente,
            200
        );
    }

    public function destroy(Cliente $cliente)
    {
        if ($cliente->cargas()->exists()) {
            return response()->json([
                'error' => 'Cliente possui cargas vinculadas'
            ], 400);
        }

        $cliente->delete();
        return response()->json([
            'message' => 'Cliente deletado com sucesso!'
        ]);
    }
}
