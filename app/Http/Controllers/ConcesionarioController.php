<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Concesionario;

class ConcesionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $concesionarios = Concesionario::with("jefe")->get();
        return response()->json(["concesionarios" => $concesionarios]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'ubicacion' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'marca' => 'required|string|max:100',
            'img' => 'required|image|max:2048',
            'jefe_id' => 'required|integer',
        ]);
        if ($request->hasFile("img")) {
            $path = $request->file("img")->store("concesionarios", "public");
            $data["img"] = "storage/" . $path;
        }
        $concesionario = Concesionario::create($data);
        return response()->json($concesionario, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $concesionario = Concesionario::find($id);
        if (!$concesionario) {
            return response()->json(['mensaje' => 'Concesionario no encontrado'], 404);
        }
        return response()->json($concesionario);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $concesionario = Concesionario::find($id);

        if (!$concesionario) {
            return response()->json(['mensaje' => 'Concesionario no encontrado'], 404);
        }

        // Validación
        $data = $request->validate([
            'nombre' => 'sometimes|required|string|max:255',
            'ubicacion' => 'sometimes|required|string|max:255',
            'telefono' => 'sometimes|required|string|max:20',
            'marca' => 'sometimes|required|string|max:100',
            'jefe_id' => 'sometimes|required|integer',
            'img' => 'sometimes|image|max:2048'  // OPCIONAL
        ]);

        // Si viene imagen, procesarla
        if ($request->hasFile("img")) {
            $path = $request->file("img")->store("concesionarios", "public");
            $data["img"] = "storage/" . $path;
        }
        // Actualizar datos
        $concesionario->update($data);

        return response()->json($concesionario);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $concesionario = Concesionario::find($id);
        if (!$concesionario) {
            return response()->json(['mensaje' => 'Concesionario no encontrado'], 404);
        }
        $concesionario->delete();
        return response()->json(['mensaje' => 'Concesionario eliminado']);
    }
}
