<?php

use App\Http\Controllers\BlocoController;
use App\Http\Controllers\ContaController;
use App\Http\Controllers\PagamentoController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\VagaController;
use App\Http\Controllers\VeiculoController;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/* Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum'); */

Route::apiResource('ticket',TicketController::class);
Route::apiResource('pagamento',PagamentoController::class);
Route::apiResource('conta',ContaController::class);
Route::get('veiculo/{matricula}', [VeiculoController::class, 'getByMatricula']);
Route::get('vaga/total',[VagaController::class, 'totalVagas']);
Route::apiResource('bloco', BlocoController::class);
