<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PuntosInteresController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/LoginController', [LoginController::class, 'credentials']);

Route::post('/PuntosInteres', [PuntosInteresController::class, 'store']);
Route::get('/PuntosInteres/{Categoria}', [PuntosInteresController::class, 'ListarPuntosDeInteres']);
Route::patch('/PuntosInteres/{id}', [PuntosInteresController::class, 'update']);
Route::delete('/PuntosInteres/{id}/{Categoria}', [PuntosInteresController::class, 'destroy']);
