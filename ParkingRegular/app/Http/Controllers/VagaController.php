<?php

namespace App\Http\Controllers;

use App\Http\Requests\VagaRequest;
use App\Models\Vaga;
use Illuminate\Http\Request;

class VagaController extends Controller
{
      public function store(VagaRequest $request){
        $data = $request->validated();
        $vaga = Vaga::create($data);
        return response()->json([
            'message' => "Vaga adicionada com sucesso",
            'data' => $vaga
        ],201);
    }
}
