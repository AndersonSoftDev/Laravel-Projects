<?php

namespace App\Http\Controllers;

use App\Http\Requests\SectorRequest;
use App\Models\Sector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SectorController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(SectorRequest $request)
    {
        $sector = DB::transaction(function () use($request) {
            $data = $request->validated();
            return Sector::create($data);

        });
        return response()->json([
                'message' => 'Sector criado com sucesso!',
                'data' => $sector
            ],201);
    }

    public function getPorEntidade(string $id){
        return Sector::where("entidade_id", $id)->get();
    }

}
