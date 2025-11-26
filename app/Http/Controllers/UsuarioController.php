<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function update_plan(Request $request)
    {
        $user = auth()->user();
        if ($user->rol->nombre !== "jefe_concesionario") {
            return response()->json(["message" => "solo los jefes pueden cambiar de plan"]);
        }
        $data = $request->validate([
            "plan" => "required|in:individual,continuo"
        ]);
        $user->plan = $data["plan"];
        $user->save();
        return response()->json([
            "message" => "plan actualizado correctamente", 
            "plan"=>$user->plan
        ]);
    }
}
