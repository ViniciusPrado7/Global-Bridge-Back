<?php

use App\Http\Controllers\InvoicePdf;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
 return response()->json([
        'status' => 'ok',
        'service' => 'Global Bridge API',
        'environment' => app()->environment()
        
    ]);
});

Route::get('/pdf/{carga}', [InvoicePdf::class, "generate"]);