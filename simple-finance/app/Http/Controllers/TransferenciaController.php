<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransferenciaRequest;
use App\Models\Transferencia;
use App\Service\TransacaoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransferenciaController extends Controller
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
    public function store(TransferenciaRequest $request, TransacaoService $transacaoService)
    {
        $transferencia = DB::transaction(function () use($request, $transacaoService){
            $data = $request->validated();
            $transferencia = new Transferencia($data);
            $transferencia->save();

            $transacaoService->criarTransacao($transferencia);

            return response()->json([
                'message' => 'Transferencia feita com sucesso!'
            ],201);
        });
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
