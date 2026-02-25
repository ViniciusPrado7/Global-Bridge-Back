<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cliente = cliente::all();
        return response()->Json(
            $cliente,200
        );
    }    

    /**
     * Show the form for creating a new resource.
     */
   

    /**
     * Store a newly created resource in storage.
     */
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
            $cliente,201 
          );

    }
    

    

    /**
     * Update the specified resource in storage.
     */
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
        $cliente,200  
     );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return response()->json([
            'message' => 'Cliente deletado com sucesso!'
        ]);
    }
}
