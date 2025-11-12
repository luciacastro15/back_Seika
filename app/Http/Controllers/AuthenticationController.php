<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    //POST /api/auth/login
    public function login(Request $request)
    {
        //
        $credenciales = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (!Auth::attempt($credenciales)) {
            return response()->json([
                'message' => 'Credenciales inválidas'
            ], 401);
            //401: Unauthorized
        }
        $usuario = Auth::user();
        $token = $usuario->createToken('token-auth')->plainTextToken;
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer'
        ]);
    }
    public function registro(Request $request)
    {
        ////POST /api/auth/registro
        $datosValidados = $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:usuarios',
            'password' => 'required|string|min:6',
            'rol_id' => 'required|integer'
        ]);
        $datosValidados['password'] = Hash::make($datosValidados['password']);
        //hace refrencia al modelo Usuario.php
        $usuario = Usuario::create($datosValidados);
        $token = $usuario->createToken('token-auth')->plainTextToken;
        return response()->json([
            'usuario' => $usuario,
            'access_token' => $token,
            'token_type' => 'Bearer'
        ], 201);
    }
    public function logout(Request $request)
    {
        //POST /api/auth/logout
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'Sesión cerrada correctamente'
        ]);
    }

}
