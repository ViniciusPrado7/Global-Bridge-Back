<?php

use App\Http\Controllers\CargaController;
use App\Http\Controllers\CargaItemController;
use App\Http\Controllers\FreteiroController;
use App\Http\Controllers\UserNameController;
use Illuminate\Support\Facades\Route;

Route::apiResource('cargas', CargaController::class);
Route::apiResource('itens', CargaItemController::class)
    ->parameters([
        'itens' => 'cargaItem'
    ]);
Route::apiResource('freteiros', FreteiroController::class);
Route::apiResource('usernames',UserNameController::class)
 ->parameters(['usernames' => 'userName']);
