<?php

namespace App\Http\Controllers;

// use App\Models\Carga;
use App\Models\Warehouse;
use Barryvdh\DomPDF\Facade\Pdf;

class WarehousePdf extends Controller
{
    public function generate(Warehouse $warehouse)
    {
        // Carrega relacionamentos necessários
        $warehouse->load('carga');

        $pdf = Pdf::loadView('pdf.warehouse',[
            'warehouse' => $warehouse,
            'carga' => $warehouse->carga,
            'today' => now()->format('M/d/Y h:i A')
        ]);

        return $pdf->stream("warehouse-{$warehouse->codigo}.pdf");
    }

    public function preview(Warehouse $warehouse)
    {
        $warehouse->load('carga');

        return view('pdf.warehouse', [
            'warehouse' => $warehouse,
            'carga' => $warehouse->carga,
            'today' => now()->format('Y-m-d')
        ]);
    }
}