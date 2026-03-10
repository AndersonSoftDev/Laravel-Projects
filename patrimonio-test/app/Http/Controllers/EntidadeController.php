<?php

namespace App\Http\Controllers;

use App\Http\Requests\EntidadeRequest;
use App\Http\Resources\EntidadeResource;
use App\Models\Entidade;
use Illuminate\Http\Request;

class EntidadeController extends Controller
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
    public function store(EntidadeRequest $request)
    {
        $data = $request->validated();
        $entidade = Entidade::create($data);
        return response()->json([
            'message' => "Entidade adicionada com sucesso!",
            "data" => new EntidadeResource($entidade)
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
