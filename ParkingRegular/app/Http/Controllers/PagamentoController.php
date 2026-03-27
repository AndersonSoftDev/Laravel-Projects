<?php

namespace App\Http\Controllers;

use App\Enums\MetodoPagamento;
use App\Enums\StatusTicket;
use App\Enums\StatusVaga;
use App\Http\Requests\PagamentoRequest;
use App\Models\Conta;
use App\Models\Pagamento;
use App\Models\Tarifa;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class PagamentoController extends Controller
{
    public function store(PagamentoRequest $request)
    {
        return DB::transaction(function () use ($request) {
            $data = $request->validated();

            $this->verifyPaymentConformity($data['ticket_id'], $data['valor']);
            $pagamento = Pagamento::create($data);

            $ticket = Ticket::findOrFail($data['ticket_id']);
            $ticket->status = StatusTicket::FECHADO;
            $ticket->saida = Carbon::now();
            $ticket->valor_pago = $data['valor'];
            $ticket->save();

            $vaga = $ticket->vaga;
            $vaga->status = StatusVaga::LIVRE;
            $vaga->save();

            if ($data['metodo_pagamento'] == MetodoPagamento::CONTA->value) {
                $this->reduceAccountBalance($data['conta_id'], $data['valor']);
            }

            return response()->json([
                'message' => 'Pagamento efectuado com sucesso!',
                'data' => $pagamento
            ], 201);
        });
    }

    private function verifyPaymentConformity($ticket_id, $valor)
    {
        $data = $this->calculateEstimateValue($ticket_id);

        $valorCalculado = $data['Valor_calculado'];

        if ($valorCalculado != $valor) {
            throw new \Exception("O valor pago nao corresponde ao valor por pagar de " . $valorCalculado . "Mzn");
        }

        return [
            'valor_calculado' => $valorCalculado,
            'valor_pago' => $valor,
            'conforme' => $valor == $valorCalculado
        ];
    }

    public function calculateEstimateValue($ticket_id)
    {
        $ticket = Ticket::findOrFail($ticket_id);

        $entrada = Carbon::parse($ticket->entrada);
        $saida = Carbon::parse($ticket->saida);

        $duracaoHoras = ceil($entrada->floatDiffInHours($saida));

        $tarifa = Tarifa::where('tipo', $ticket->vaga->tipo)->value('valor');

        if (!$tarifa) {
            throw new \Exception("Tarifa não encontrada para o tipo de vaga: " . $ticket->vaga->tipo);
        }

        $valorCalculado = $duracaoHoras * $tarifa;

        return [
            'Valor_calculado' => $valorCalculado ,
            'tempo_estimado' => $duracaoHoras ,
            'tarifa_aplicada' => $tarifa
        ];
    }


    public function reduceAccountBalance($conta, $valor)
    {
        $conta = Conta::findOrFail($conta);
        if ($conta->saldo >= $valor) {
            $conta->saldo -= $valor;
            $conta->save();
        } else {
            throw new \Exception('O saldo da conta é insuficiente para efectuar esta operação!');
        }
    }
}
