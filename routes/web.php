<?php

use App\Http\Controllers\InvoicePdf;
use App\Http\Controllers\WarehousePdf;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
 return response()->json([
        'status' => 'ok',
        'service' => 'Global Bridge API',
        'environment' => app()->environment()
        
    ]);
});

Route::get('/pdf/{carga}', [InvoicePdf::class, "generate"]);
Route::get('/warehouse/{warehouse}/pdf', [WarehousePdf::class, 'generate']);
Route::get('/warehouse/{warehouse}/preview', [WarehousePdf::class, 'preview']);