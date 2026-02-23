<?php

use App\Http\Controllers\CargaController;
use App\Http\Controllers\CargaItemController;
use Illuminate\Support\Facades\Route;

Route::apiResource('cargas', CargaController::class);
Route::apiResource('itens', CargaItemController::class)
    ->parameters([
        'itens' => 'cargaItem'
    ]);
