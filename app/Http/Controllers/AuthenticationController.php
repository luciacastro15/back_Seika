<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewUserRegisterMail;
use App\Mail\WelcomeUserMail;

class AuthenticationController extends Controller
{
    public function login(Request $request)
    {
        $credenciales = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (!Auth::attempt($credenciales)) {
            return response()->json([
                'message' => 'Credenciales inválidas'
            ], 401);
        }
        $usuario = Auth::user();
        $token = $usuario->createToken('token-auth')->plainTextToken;
        return response()->json([
            'usuario' => [
                'id' => $usuario->id,
                'nombre' => $usuario->nombre,
                'email' => $usuario->email,
                'rol_id' => $usuario->rol_id
            ],
            'access_token' => $token,
            'token_type' => 'Bearer'
        ]);
    }
    public function registro(Request $request)
    {
        $datosValidados = $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:usuarios',
            'password' => 'required|string|min:6',
            'rol_id' => 'required|integer'
        ]);
        $datosValidados['password'] = Hash::make($datosValidados['password']);
        $usuario = Usuario::create($datosValidados);
        Mail::to($usuario->email)->send(new WelcomeUserMail($usuario));
        Mail::to(env('ADMIN_EMAIL'))->send(new NewUserRegisterMail($usuario));

        $token = $usuario->createToken('token-auth')->plainTextToken;
        return response()->json([
            'usuario' => $usuario,
            'access_token' => $token,
            'token_type' => 'Bearer'
        ], 201);
    }
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'Sesión cerrada correctamente'
        ]);
    }

}
