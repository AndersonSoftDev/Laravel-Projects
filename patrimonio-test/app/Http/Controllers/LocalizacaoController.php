<?php

namespace App\Http\Controllers;

use App\Http\Requests\LocalizacaoRequest;
use App\Models\Localizacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LocalizacaoController extends Controller
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
    public function store(LocalizacaoRequest $request)
    {
        $localizacao = DB::transaction(function() use($request){
            $data = $request->validated();
            return Localizacao::create($data);
        });
        return response()->json([
            'message' => "Localizacao adicionada com sucesso!",
            'data' => $localizacao
        ],201);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
