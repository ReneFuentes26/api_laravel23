<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth; //maneja los inicios de sesion

class LoginController extends Controller
{
    //
    public function login(Request $request){
        $this->validateLogin($request);
        //validar login
        if(Auth::attempt($request->only('email','password'))){
            return response()->json([
                'token'=>$request->user()->createToken($request->name)->plainTextToken,
                'message'=>'Success'
            ]);
            return response()->json(['message'=>'Unauthorized'],401);
            //El error 401 corresponde a la falta de autorizacion del usuario
        }
    }

    public function validateLogin(Request $request){
        return $request->validate([
            'email'=>'required|email',
            'password'=>'required',
            'name'=>'required'
        ]);
    }
}
