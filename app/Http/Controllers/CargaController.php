<?php

namespace App\Http\Controllers;

use App\Models\Carga;
use App\Services\Carga\CargaService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CargaController extends Controller
{
    public function __construct(
        private CargaService $service
    ) {
    }

    public function index()
    {
        return response()->json(
            Carga::with(['cliente', 'freteiro', 'itens'])->get()
        );
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'codigo' => 'required|string|unique:cargas,codigo',
            'cliente_id' => 'required|exists:clientes,id',
            'metodo_entrega' => 'required|string',
            'pais_origem' => 'required|string',
            'pais_destino' => 'required|string',
            'data_recebimento' => 'required|date',
            'data_prevista_embarque' => 'required|date|after_or_equal:data_recebimento',
            'peso' => 'required|numeric|min:0',
            'shipper_information' => 'nullable|string',
            'itens' => 'required|array|min:1',
        ]);

        foreach ($validated['itens'] as $item) {
            validator($item, [
                'descricao' => 'required|string',
                'categoria' => 'required|string',
                'quantidade' => 'required|integer|min:1',
                'valor_unitario' => 'required|numeric|min:0',
            ])->validate();
        }

        $carga = $this->service->criar($validated);

        return response()->json($carga, 201);
    }

    public function update(Request $request, Carga $carga)
    {
        $validated = $request->validate([
            'codigo' => [
                'required',
                'string',
                Rule::unique('cargas', 'codigo')->ignore($carga->id),
            ],
            'cliente_id' => 'required|exists:clientes,id',
            'metodo_entrega' => 'required|string',
            'pais_origem' => 'required|string',
            'pais_destino' => 'required|string',
            'data_recebimento' => 'required|date',
            'data_prevista_embarque' => 'required|date|after_or_equal:data_recebimento',
            'peso' => 'required|numeric|min:0',
            'shipper_information' => 'nullable|string',
            'itens' => 'required|array|min:1',
        ]);

        foreach ($validated['itens'] as $item) {
            validator($item, [
                'descricao' => 'required|string',
                'categoria' => 'required|string',
                'quantidade' => 'required|integer|min:1',
                'valor_unitario' => 'required|numeric|min:0',
            ])->validate();
        }

        $cargaAtualizada = $this->service->atualizar($carga, $validated);

        return response()->json($cargaAtualizada);
    }

    public function destroy(Carga $carga)
    {
        $this->service->deletar($carga);

        return response()->json([
            'message' => 'Carga deletada com sucesso!'
        ]);
    }
}
