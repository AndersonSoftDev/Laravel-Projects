<?php

use App\Http\Controllers\BlocoController;
use App\Http\Controllers\ContaController;
use App\Http\Controllers\PagamentoController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\VagaController;
use App\Http\Controllers\VeiculoController;
use Illuminate\Support\Facades\Route;

/* Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum'); */

///Rotas do ticket
Route::apiResource('ticket',TicketController::class);
Route::get('ticket/vaga/{id}', [TicketController::class, 'findByVagaId']);
Route::get('ticket/veiculo/{veiculo_id}', [TicketController::class, 'getTicketAbertoPorMatricula']);

///Rotas do pagamento
Route::apiResource('pagamento',PagamentoController::class);
Route::get('pagamento/calcular/{ticket_id}',[PagamentoController::class, 'calculateEstimateValue']);

///Rotas da conta
Route::get('conta/buscar', [ContaController::class, 'buscar']);
Route::apiResource('conta',ContaController::class);

///Rotas do veiculo
Route::apiResource('veiculo', VeiculoController::class);
Route::get('veiculo/matricula/{matricula}', [VeiculoController::class, 'getByMatricula']);

///Rotas da vaga
Route::get('vaga/total',[VagaController::class, 'totalVagas']);
Route::get('vaga/sugeridas/{tipo}', [VagaController::class, 'getSugestaoVagas']);
Route::get('vaga/disponiveis', [VagaController::class, 'getVagasFiltradas']);
Route::apiResource('vaga', VagaController::class);

///Rotas do bloco
Route::apiResource('bloco', BlocoController::class);

