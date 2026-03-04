<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
   
    public function index()
    {
        $categoria = Categoria::all();
        return response()->json(
            $categoria, 200
        );
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'MI-PY' => 'required|string',
            'PY-SP' => 'required|string',
        ]);

        $categoria = Categoria::create($validated);

        return response()->json(
            $categoria, 201
        );
    }

    public function update(Request $request, Categoria $categoria)
    {
        $validated = $request->validate([
            'MI-PY' => 'required|string',
            'PY-SP' => 'required|string',
        ]);

        $categoria->update($validated);

        return response()->json(
            $categoria, 200
        );
    }
    
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return response()->json([
            'message' => 'Categoria deletada com sucesso!'
        ]);;
    }
}
