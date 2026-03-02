<?php

use App\Http\Controllers\ContaController;
use App\Http\Controllers\TransferenciaController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('users', UserController::class);
Route::apiResource('contas', ContaController::class);
Route::apiResource('transferencia', TransferenciaController::class);
