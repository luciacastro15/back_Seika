<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pregunta;

class PreguntaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $preguntas = Pregunta::all();
        return response()->json($preguntas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'texto' => 'required|string',
            'bloque_id' => 'required|integer',
        ]);
        $pregunta = Pregunta::create($data);
        return response()->json($pregunta, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pregunta = Pregunta::find($id);
        if (!$pregunta) {
            return response()->json(['mensaje' => 'Pregunta no encontrada'], 404);
        }
        return response()->json($pregunta);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pregunta = Pregunta::find($id);
        if (!$pregunta) {
            return response()->json(['mensaje' => 'Pregunta no encontrada'], 404);
        }
        $data = $request->validate([
            'texto' => 'sometimes|required|string',
            'bloque_id' => 'sometimes|required|integer',
        ]);
        $pregunta->update($data);
        return response()->json($pregunta);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pregunta = Pregunta::find($id);
        if (!$pregunta) {
            return response()->json(['mensaje' => 'Pregunta no encontrada'], 404);
        }
        $pregunta->delete();
        return response()->json(['mensaje' => 'Pregunta eliminada']);
    }
}
