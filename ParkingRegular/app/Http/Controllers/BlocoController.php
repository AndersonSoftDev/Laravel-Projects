<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlocoRequest;
use App\Http\Resources\BlocoResource;
use App\Models\Bloco;
use Illuminate\Http\Request;

class BlocoController extends Controller
{
    public function store(BlocoRequest $request){
        $data = $request->validated();

        $andares= $data->andares;
        $disponibilidade = $data->disponibilidade;

        $ultimoAndar = Bloco::max('andar') ?? 0;

        $blocosCriados = [];

        for($i = 1; $i<= $andares; $i++){
            $novoAndar = $ultimoAndar +1;

            $letraBloco = chr(64+$novoAndar);

            $bloco = Bloco::create([
                'bloco' => $letraBloco,
                'andar' => $novoAndar,
                'disponibilidade' => $disponibilidade
            ]);

            $blocosCriados[] = $bloco;

        }

        return response()->json([
            'message' => 'Blocos adicionados com sucesso!',
            'data' => $blocosCriados
        ], 201);
    }

    public  function index()
    {
        $bloco = Bloco::with([
        'vagas' => function ($query) {
            $query->orderByRaw("
                CASE tipo
                    WHEN 'CARRO' THEN 1
                    WHEN 'MOTO' THEN 2
                    WHEN 'CAMINHAO' THEN 3
                END
            ")->orderBy('codigo');
        }
    ])->get();

        return BlocoResource::collection($bloco);
    }
}
