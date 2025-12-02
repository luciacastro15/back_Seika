<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

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
            "plan" => $user->plan
        ]);
    }

    public function index() {
        $usuarios = Usuario::with("rol")->get();
        return response()->json($usuarios, 200);
    }
    
    public function destroy($id)
    {
        $authUser = auth()->user();
        $user = Usuario::find($id);
        if (!$user) {
            return response()->json([
                "message" => "Usuario no encontrado"
            ], 404);

        }
        if ($user->id === $authUser->id) {
            return response()->json([
                "message" => "No puedes eliminar tu propio usuario"
            ], 400);

        }
        try {
            $user->delete();
            return response()->json([
                "message" => "Se ha borrado correctamente"
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                "message" => "Error al eliminar el usuario",
                "error" => $e->getMessage()
            ]);

        }
    }
}
