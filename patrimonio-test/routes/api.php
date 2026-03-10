<?php

use App\Http\Controllers\ActivoController;
use App\Http\Controllers\EntidadeController;
use App\Http\Controllers\LocalizacaoController;
use App\Http\Controllers\SectorController;
use App\Models\Activo;
use App\Models\Entidade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('entidade', EntidadeController::class);
Route::apiResource('sector', SectorController::class);
Route::apiResource('localizacao', LocalizacaoController::class);
Route::apiResource('activo', ActivoController::class);
