<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carga;
// Importação obrigatória para resolver o erro "Class Controller not found"
use App\Http\Controllers\Controller;
// Importação do seu Service com o caminho correto
use App\Services\Carga\Pagamento\PagamentoService;

class PagamentoController extends Controller
{
    /**
     * Registra um novo pagamento para uma carga específica.
     */
    public function store(Request $request, Carga $carga, PagamentoService $service)
    {
        $validated = $request->validate([
            'tipo_moeda'  => 'required|in:USD,USDT',
            'valor'       => 'required|numeric|min:0.01',
            'taxa'        => 'required|numeric|min:0.0001',
            'usdt_hash'   => 'nullable|string',
            'observacoes' => 'nullable|string',
        ]);

        try {
            $pagamento = $service->registrar($carga, $validated);

            return response()->json([
                'message' => 'Pagamento registrado com sucesso!',
                'data'    => $pagamento
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 422);
        }
    }
}
