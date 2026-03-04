<?php

use App\Http\Controllers\ParkingController;
use App\Http\Controllers\ParkingSpotController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('parking', ParkingController::class);
Route::apiResource('parking-spot', ParkingSpotController::class);
