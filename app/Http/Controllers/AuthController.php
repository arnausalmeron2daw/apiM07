<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        $credential=$request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        var_dump($credential);
        if(Auth::attempt($credential)){
            $user=User::where('email',$request->email)->first();
            $token=$user->createToken('api-token')->plainTextToken;
            return response()->json(['token'=>$token],200);
        }else{
            return response()->json(['Credenciais invalidas'],401);
        }
    }

    public function register(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'password' => 'required'
        ]);


        $user = User::create($validatedData);

        return response()->json([
            'success' => true,
            'data' => $user
        ], 201);
    }
}
