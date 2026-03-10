<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        if(Auth::attempt($request->only('email','password'))){
        return response()->json(
            [
                'message' => "Authorized",
                'token' => $request->user()->createToken("parking")->plainTextToken
            ],200
        );
        }
        return response()->json([
            'message' => 'Unauthorized'
        ], 401);

    }
}
