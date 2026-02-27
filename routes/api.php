<?php

use App\Http\Controllers\CargaController;
use App\Http\Controllers\CargaItemController;
use App\Http\Controllers\FreteiroController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EmbarqueController;
use App\Http\Controllers\PagamentoController;

Route::apiResource('cargas/{carga}/pagamentos', PagamentoController::class);
Route::apiResource('cargas', CargaController::class);
Route::apiResource('itens', CargaItemController::class)
    ->parameters([
        'itens' => 'cargaItem'
    ]);
Route::apiResource('freteiros', FreteiroController::class);
Route::apiResource('tasks', TaskController::class);
Route::apiResource('clientes', ClienteController::class);
Route::apiResource('embarques', EmbarqueController::class);

