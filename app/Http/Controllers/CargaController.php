<?php

namespace App\Http\Controllers;

use App\Models\Carga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CargaController extends Controller
{
    public function index()
    {
        return response()->json(
            Carga::with('itens')->latest()->get()
        );
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'cliente' => 'required|string',
            'invoice' => 'required|string',
            'metodo_entrega' => 'required|string',
            'local_embarque' => 'required|string',
            'destino' => 'required|string',
            'data_recebimento' => 'required|date',
            'data_prevista_embarque' => 'required|date',
            'volumes' => 'required|integer',
            'peso' => 'required|numeric',
            'shipper_information' => 'nullable|string',
            'itens' => 'required|array|min:1',
        ]);

        foreach ($request->itens as $item) {
            Validator::make($item, [
                'descricao' => 'required|string',
                'categoria' => 'required|string',
                'quantidade' => 'required|integer|min:1',
                'valor_unitario' => 'required|numeric|min:0',
            ])->validate();
        }

        $carga = Carga::create($validated);

        foreach ($request->itens as $item) {
            $carga->itens()->create($item);
        }

        return response()->json(
            $carga->load('itens'),
            201
        );

    }

    public function update(Request $request, Carga $carga)
    {
        $validated = $request->validate([
            'cliente' => 'required|string',
            'invoice' => 'required|string',
            'metodo_entrega' => 'required|string',
            'local_embarque' => 'required|string',
            'destino' => 'required|string',
            'data_recebimento' => 'required|date',
            'data_prevista_embarque' => 'required|date',
            'volumes' => 'required|interger',
            'peso' => 'required|numeric',
            'shipper_information' => 'nullable|string',
            'itens' => 'required|array|min:1',
        ]);

        foreach ($request->itens as $item) {
            Validator::make($item, [
                'descricao' => 'required|string',
                'categoria' => 'required|string',
                'quantidade' => 'required|integer|min:1',
                'valor_unitario' => 'required|numeric|min:0',
            ])->validate();
        }

        $carga->update($validated);

        $carga->itens()->delete();

        foreach ($request->itens as $item) {
            $carga->itens()->create($item);
        }

        return response()->json(
            $carga->load('itens')
        );
    }

    public function destroy(Carga $carga)
    {
        $carga->delete();
        return response()->json([
            'message' => 'Carga deletada com sucesso!'
        ]);
    }
}
