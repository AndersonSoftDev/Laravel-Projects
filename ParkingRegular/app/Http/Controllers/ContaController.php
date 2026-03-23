<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContaRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ContaController extends Controller
{
    public function store(ContaRequest $request){
        return DB::transaction(function() use ($request) {
            $data = $request->validated();

            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'contacto' => $data['contacto'],
            ]);

           $conta = $user->conta()->create([
                'saldo' => $data['saldo'],
                'activo' => true
            ]);

            return response()->json(['message' => 'Conta criada com sucesso', 'data' => $conta], 201);
        });
    }
}
