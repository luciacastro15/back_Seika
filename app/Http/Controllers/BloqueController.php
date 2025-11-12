<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bloque;

class BloqueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bloques = Bloque::all();
        return response()->json($bloques);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
        ]);
        $bloque = Bloque::create($data);
        return response()->json($bloque, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $bloque = Bloque::find($id);
        if (!$bloque) {
            return response()->json(['mensaje' => 'Bloque no encontrado'], 404);
        }
        return response()->json($bloque);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $bloque = Bloque::find($id);
        if (!$bloque) {
            return response()->json(['mensaje' => 'Bloque no encontrado'], 404);
        }
        $data = $request->validate([
            'nombre' => 'sometimes|required|string|max:255',
        ]);
        $bloque->update($data);
        return response()->json($bloque);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bloque = Bloque::find($id);
        if (!$bloque) {
            return response()->json(['mensaje' => 'Bloque no encontrado'], 404);
        }
        $bloque->delete();
        return response()->json(['mensaje' => 'Bloque eliminado']);
    }
}
