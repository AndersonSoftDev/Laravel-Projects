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

///Rotas do pagamento
Route::apiResource('pagamento',PagamentoController::class);

///Rotas da conta
Route::apiResource('conta',ContaController::class);

///Rotas do veiculo
Route::apiResource('veiculo', VeiculoController::class);
Route::get('veiculo/matricula/{matricula}', [VeiculoController::class, 'getByMatricula']);

///Rotas da vaga
Route::get('vaga/total',[VagaController::class, 'totalVagas']);
Route::get('vaga/sugeridas/{tipo}', [VagaController::class, 'getSugestaoVagas']);
Route::get('vaga/disponiveis', [VagaController::class, 'getVagasFiltradas']);

///Rotas do bloco
Route::apiResource('bloco', BlocoController::class);

