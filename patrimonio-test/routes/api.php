<?php

use App\Http\Controllers\ActivoController;
use App\Http\Controllers\EntidadeController;
use App\Http\Controllers\LocalizacaoController;
use App\Http\Controllers\SectorController;
use Illuminate\Support\Facades\Route;

Route::apiResource('entidade', EntidadeController::class);
Route::apiResource('sector', SectorController::class);
Route::apiResource('localizacao', LocalizacaoController::class);
Route::apiResource('activo', ActivoController::class);
Route::get('entidade/designacao/{designacao}', [EntidadeController::class, 'getPorDesignacao']);
Route::get('sector/entidade/{id}', [SectorController::class,'getPorEntidade']);
