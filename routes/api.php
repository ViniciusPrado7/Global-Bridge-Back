<?php

use App\Http\Controllers\CargaController;
use App\Http\Controllers\CargaItemController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CategoriaFreteiroController;
use App\Http\Controllers\FreteiroController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EmbarqueController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PagamentoController;
use App\Http\Controllers\UserController;


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
Route::apiResource('invoices', InvoiceController::class);
Route::apiResource('categorias', CategoriaController::class);
Route::apiResource('categoria_freteiros', CategoriaFreteiroController::class);
Route::apiResource('user', UserController::class);