<?php

namespace App\Service;

use App\Enums\TipoTransacao;
use App\Http\Requests\TransacaoRequest;
use App\Models\Contas;
use App\Models\Transacao;
use App\Models\Transferencia;
use Illuminate\Support\Facades\DB;

class TransacaoService
{

    public function criarTransacao(Transferencia $transferencia)
    {
        return DB::transaction(function () use ($transferencia) {

            $contaOrigem = Contas::where('id', $transferencia->conta_origem_id)
                ->lockForUpdate()
                ->first();

            $contaDestino = Contas::where('id', $transferencia->conta_destino_id)
                ->lockForUpdate()
                ->first();

            $valor = $transferencia->valor;

            $contaOrigem->debitar($valor);

            Transacao::create([
                'tipo' => TipoTransacao::DEBITO,
                'valor' => $transferencia->valor,
                'descricao' => $transferencia->descricao,
                'referencia' => $transferencia->referencia,
                'conta_id' => $transferencia->conta_origem_id,
            ]);

            $contaDestino->creditar($valor);
            Transacao::create([
                'tipo' => TipoTransacao::CREDITO,
                'valor' => $transferencia->valor,
                'descricao' => $transferencia->descricao,
                'referencia' => $transferencia->referencia,
                'conta_id' => $transferencia->conta_destino_id,
            ]);


            return true;
        });
    }
}
