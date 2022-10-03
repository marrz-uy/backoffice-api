<?php

use App\Http\Controllers\PuntosInteresController;
use App\Http\Controllers\EventosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/PuntosInteres', [PuntosInteresController::class, 'store']);
Route::get('/PuntosInteres/{Categoria}', [PuntosInteresController::class, 'ListarPuntosDeInteres']);
Route::patch('/PuntosInteres/{id}', [PuntosInteresController::class, 'update']);
Route::delete('/PuntosInteres/{id}', [PuntosInteresController::class, 'destroy']);

Route::get('/Eventos', [EventosController::class, 'show']);