<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\RequisitionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('products', ProductController::class);
Route::apiResource('requisitions', RequisitionController::class);
