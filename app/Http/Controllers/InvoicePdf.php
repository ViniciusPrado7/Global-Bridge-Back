<?php

namespace App\Http\Controllers;

use App\Models\Carga;
use Barryvdh\DomPDF\Facade\Pdf;

class InvoicePdf extends Controller
{
    public function generate(Carga $carga)
    {
        // Carrega relacionamentos necessários
        $carga->load(['freteiro', 'itens']);

        $totalGeral = $carga->itens->sum(function ($item) {
            return $item->quantidade * $item->valor_unitario;
        });

        $pdf = Pdf::loadView('pdf.invoice', [
            'carga' => $carga,
            'totalGeral' => $totalGeral,
            'today' => now()->format('Y-m-d')
        ]);

        return $pdf->stream("invoice-{$carga->codigo}.pdf");
    }
}