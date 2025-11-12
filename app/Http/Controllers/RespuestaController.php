<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Respuesta;

class RespuestaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $respuestas = Respuesta::all();
        return response()->json($respuestas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'pregunta_id' => 'required|integer',
            'auditoria_id' => 'required|integer',
            'respuesta_texto' => 'required|string',
            'comentario' => 'nullable|string',
        ]);
        $respuesta = Respuesta::create($data);
        return response()->json($respuesta, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $respuesta = Respuesta::find($id);
        if (!$respuesta) {
            return response()->json(['mensaje' => 'Respuesta no encontrada'], 404);
        }
        return response()->json($respuesta);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $respuesta = Respuesta::find($id);
        if (!$respuesta) {
            return response()->json(['mensaje' => 'Respuesta no encontrada'], 404);
        }
        $data = $request->validate([
            'pregunta_id' => 'sometimes|required|integer',
            'auditoria_id' => 'sometimes|required|integer',
            'respuesta_texto' => 'sometimes|required|string',
            'comentario' => 'nullable|string',
        ]);
        $respuesta->update($data);
        return response()->json($respuesta);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $respuesta = Respuesta::find($id);
        if (!$respuesta) {
            return response()->json(['mensaje' => 'Respuesta no encontrada'], 404);
        }
        $respuesta->delete();
        return response()->json(['mensaje' => 'Respuesta eliminada']);
    }
}
