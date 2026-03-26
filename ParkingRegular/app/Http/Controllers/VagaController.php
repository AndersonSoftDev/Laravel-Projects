<?php

namespace App\Http\Controllers;

use App\Enums\StatusVaga;
use App\Enums\TipoVeiculo;
use App\Http\Requests\FiltroVagaRequest;
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

    public function totalVagas()
    {
        $total_vagas = Vaga::count();
        $total_livre = Vaga::where('status', 'LIVRE')->count();
        $total_ocupadas = Vaga::where('status', 'OCUPADO')->count();
        $total_manutencao = Vaga::where('status', 'MANUTENCAO')->count();

        return response()->json([
            'total_vagas' => $total_vagas,
            'total_livre' => $total_livre,
            'total_ocupadas' => $total_ocupadas,
            'total_manutencao' => $total_manutencao
        ], 200);
    }

    public function getSugestaoVagas($tipoVeiculo)
    {

        return Vaga::query()
            ->where('status', StatusVaga::LIVRE)
            ->where('tipo', $tipoVeiculo)
            ->orderBy('bloco_id', 'asc')
            ->orderBy('codigo', 'asc')
            ->limit(5)->get();
    }

    public function getVagasFiltradas(FiltroVagaRequest $filtro)
    {
        $query = Vaga::query()->where('status', StatusVaga::LIVRE)
            ->where('tipo', $filtro['tipo']);

        if (!empty($filtro['bloco_id'])) {
            $query->where('bloco_id', $filtro['bloco_id']);
        }

        if (!empty($filtro['limit'])) {
            $query->limit($filtro['limit']);
        } else {
            $query->limit($filtro[10]);
        }

        return $query->orderBy('codigo', 'asc')->get();
    }
}
