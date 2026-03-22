<?php

namespace App\Http\Controllers;

use App\Enums\StatusVaga;
use App\Http\Requests\VagaRequest;
use App\Models\Vaga;
use Illuminate\Http\Request;

class VagaController extends Controller
{
    public function store(VagaRequest $request)
    {
        $data = $request->validated();
        $vaga = Vaga::create($data);
        return response()->json([
            'message' => "Vaga adicionada com sucesso",
            'data' => $vaga
        ], 201);
    }

    public function getDisponibilidadeVagaPorTipo($tipo)
    {
        $quantidade = Vaga::where('tipo', $tipo)
            ->where('status', StatusVaga::LIVRE)
            ->count();

        if ($quantidade === 0) {
            return response()->json([
                'message' => 'Não há vagas disponíveis'
            ], 400);
        }

        return response()->json([
            'disponiveis' => $quantidade
        ], 200);
    }
}
