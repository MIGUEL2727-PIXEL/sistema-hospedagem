<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropriedadeController;
use App\Http\Controllers\QuartoController;
use App\Http\Controllers\HospedeController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('propriedades', PropriedadeController::class)->parameters(['propriedades' => 'propriedade']);
Route::apiResource('quartos', QuartoController::class);
Route::apiResource('hospedes', HospedeController::class);