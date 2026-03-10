<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActivoRequest;
use App\Models\Activo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActivoController extends Controller
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
    public function store(ActivoRequest $request)
    {
        $activo = DB::transaction(function () use($request){
            $data = $request->validated();
            $ultimaOrdem = Activo::lockForUpdate()->max('ordem');
            $data['ordem'] = $ultimaOrdem ? $ultimaOrdem+1 : 1;
            return Activo::create($data);
        });
        return response()->json([
            'message' =>"Activo adicionado com sucesso!",
            'data'=> $activo
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
