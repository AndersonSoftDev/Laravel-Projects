<?php

namespace App\Http\Controllers;

use App\Enums\StatusTicket;
use App\Enums\StatusVaga;
use App\Http\Requests\TicketRequest;
use App\Models\Ticket;
use App\Models\Vaga;
use App\Models\Veiculo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    public function store(TicketRequest $request)
    {

        return DB::transaction(function () use ($request) {

            $data = $request->validated();

            $this->verifyifTicketAbertoExists($data['veiculo_id']);
            $this->verifyIfTypeAllowed($data['veiculo_id'], $data['vaga_id']);

            $ticket = new Ticket($data);
            $ticket->entrada = Carbon::now();
            $ticket->status = StatusTicket::ABERTO;
            $ticket->save();

            //Alteracao do status da vaga
            $vaga = $ticket->vaga;
            $vaga->status = StatusVaga::OCUPADO;
            $vaga->save();

            return response()->json([
                'message' => 'Ticket gerado com sucesso!',
                'data' => $ticket
            ], 201);
        });
    }

    private function verifyifTicketAbertoExists($veiculo_id):void{
        $exists = Ticket::where('veiculo_id', $veiculo_id)
        ->where('status', StatusTicket::ABERTO)
        ->exists();

        if($exists){
           throw new \Exception('Existe um ticket aberto para o veiculo em questao!');
        }
    }

    private function verifyIfTypeAllowed($veiculo_id, $vaga_id){
        $veiculo= Veiculo::findOrFail($veiculo_id);
        $vaga = Vaga::findOrFail($vaga_id);

        if($veiculo->tipo !== $vaga->tipo){
            throw new \Exception("O tipo de veiculo nao se encaixa na vaga em questao");
        }
    }

    public  function findByVagaId($vaga){
        $ticket = Ticket::where('vaga_id', $vaga)
            ->where('status', StatusTicket::ABERTO)->firstOrFail();

        return response()->json($ticket);
    }

    public function getTicketAbertoPorMatricula($matricula){
        $matricula = Veiculo::findOrFail('matricula');
        return null;    
    }
}
