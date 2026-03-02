<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContaRequest;
use App\Http\Resources\ContaResource;
use App\Models\Contas;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ContaController extends Controller
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
    public function store(ContaRequest $request)
    {
       $conta = DB::transaction(function () use($request) {
           $data = $request->validated();

           $conta =Contas::create($data);

           $conta->load('user');

           return $conta;

       });

       return new ContaResource($conta);
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
