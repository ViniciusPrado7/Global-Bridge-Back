<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{

    public function index()
    {
        $invoice = Invoice::all();
        return response()->json(
            $invoice, 200
        );
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'carga_id' => 'required|integer|exists:cargas,id',
            'numero_invoice' => 'required|string',
            'data_emissao' => 'required|date',
            'data_vencimento' => 'required|date',
            'bill_to' => 'required|string',
            'ship_to' => 'required|string',
            'moeda' => 'required|string',
            'taxa' => 'required|numeric',
            'descontos' => 'required|numeric',
            'valor_total' => 'required|numeric',
            'pdf_path' => 'required|string',
            'observacoes' => 'required|string'
        ]);

        $invoice = Invoice::create($validated);

        return response()->json(
            $invoice, 201
        );
    }

    public function update(Request $request, Invoice $invoice)
    {
        $validated = $request->validate([
            'carga_id' => 'required|integer|exists:cargas,id',
            'numero_invoice' => 'required|string',
            'data_emissao' => 'required|date',
            'data_vencimento' => 'required|date',
            'bill_to' => 'required|string',
            'ship_to' => 'required|string',
            'moeda' => 'required|string',
            'taxa' => 'required|numeric',
            'descontos' => 'required|numeric',
            'valor_total' => 'required|numeric',
            'pdf_path' => 'required|string',
            'observacoes' => 'required|string'
        ]);

        $invoice->update($validated);

        return response()->json(
            $invoice, 200
        );
    }

    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
        return response()->json([
            'message' => 'deleção concluída com sucesso!'
        ]);
    }
}
