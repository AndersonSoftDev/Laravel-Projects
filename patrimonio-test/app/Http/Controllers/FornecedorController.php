<?php

namespace App\Http\Controllers;

use App\Http\Requests\FornecedorRequest;
use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function store(FornecedorRequest $request){
        $data = $request->validated();

        $fornecedor = Fornecedor::create($data);

        return response()->json([
            'message' => "Fornecedor adicionado com sucesso!",
            'data' => $fornecedor
        ]);
    }
}
