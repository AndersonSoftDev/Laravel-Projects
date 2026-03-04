<?php

use App\Http\Controllers\ParkingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('parking', ParkingController::class);
