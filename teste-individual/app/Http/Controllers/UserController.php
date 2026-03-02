<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use function Symfony\Component\Clock\now;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        return UserResource::collection($user);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();
        $data['password'] = '123466';
        $data['email_verified_at'] = now();


        $user = User::create($data);
        return response()->json([
            "message" => "Usuario adicionado com sucesso",
            "data" => $user
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $user = User::findOrFail($id);
            return response($user, 200);
        } catch (\Exception $ex) {
            return response()->json([
                "message" => "Usuario nao encontrado!"
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        $user = User::findOrFail($id);

        $data = $request->validated();
        $data['email_verified_at'] = now();

        $user->update($data);

        return response()->json([
            "message" => "Dados actualizados com sucesso!",
            "data" => $user
        ],200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::destroy($id);
        return response()->json([
            "message" => "Usuario eliminado com sucesso!"
        ], 200);
    }

    public function destroyAll(){
        $users = User::all();
        $cont = 0;

        foreach($users as $e){
            $e->delete($e);
            $cont++;
            echo "Usuario eliminado: " . $e->name . "<br>";
        }
        return response()->json([
            "message" => "Usuarios eliminados com  sucesso"
            . $cont
        ], 200);
    }
}
