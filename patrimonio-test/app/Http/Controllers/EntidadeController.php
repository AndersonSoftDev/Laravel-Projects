<?php

namespace App\Http\Controllers;

use App\Enums\Designacao;
use App\Http\Requests\EntidadeRequest;
use App\Http\Resources\EntidadeResource;
use App\Models\Entidade;
use Illuminate\Http\Request;

class EntidadeController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(EntidadeRequest $request)
    {
        $data = $request->validated();
        $entidade = Entidade::create($data);
        return response()->json([
            'message' => "Entidade adicionada com sucesso!",
            "data" => new EntidadeResource($entidade)
        ],201);
    }

    public function getPorDesignacao(Designacao $designacao){
        $entidades = Entidade::where('Designacao', $designacao->value)->get();
        return EntidadeResource::collection($entidades);
    }
}
