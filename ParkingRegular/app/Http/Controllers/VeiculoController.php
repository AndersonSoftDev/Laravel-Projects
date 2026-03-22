<?php

namespace App\Http\Controllers;

use App\Http\Requests\VeiculoRequest;
use App\Models\Veiculo;
use Illuminate\Http\Request;
use Nette\Utils\Json;

class VeiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VeiculoRequest $request)
    {
        $data = $request->validate();
        $veiculo = Veiculo::create($data);
        return response()->json([
            'message' => "Veiculo adicionado com sucesso",
            'data' => $veiculo
        ], 201);
    }

    public function getByMatricula(string $matricula) {
        $veiculo = Veiculo::where('matricula', $matricula)->firstOrFail();

        return response()->json(
            [
                'data' => $veiculo
            ],200
        );
    }
}
