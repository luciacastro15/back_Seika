<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    UsuarioController,
    RolController,
    AuditoriaController,
    BloqueController,
    ConcesionarioController,
    PreguntaController,
    RespuestaController,
    AuthenticationController
};
Route::get('health', function () {
    return response()->json(['mensaje' => true]);
});

// Route::apiResource('usuarios', UsuarioController::class);
// Route::apiResource('roles', RolController::class);
// Route::apiResource('auditorias', AuditoriaController::class);
// Route::apiResource('bloques', BloqueController::class);
// Route::apiResource('concesionarios', ConcesionarioController::class);
// Route::apiResource('preguntas', PreguntaController::class);
// Route::apiResource('respuestas', RespuestaController::class);
//apiResource = todos los metodos CRUD

//Rutas de autenticación
Route::prefix('auth')->group(function () {
    Route::post('login', [AuthenticationController::class, 'login']);
    Route::post('registro', [AuthenticationController::class, 'registro']);
    Route::post('logout', [AuthenticationController::class, 'logout'])->middleware('auth:sanctum');
});

//protegemos las rutas que necesiten autenticacion
Route::middleware('auth:sanctum')->group(function () {
    //Auditorias-solo create
    Route::post('auditorias', [AuditoriaController::class, 'store']);
    Route::get('auditorias', [AuditoriaController::class, 'index']);
    Route::get('auditorias/auditor/{id}/detalle', [AuditoriaController::class, 'auditoriasPorAuditor']);
    //Bloques-Crud completo
    Route::apiResource('bloques', BloqueController::class);
    //apiResource es para no crear una ruta para cada metodo CRUD como abajo
    //Concesionarios-Crud completo
    Route::get('concesionarios', [ConcesionarioController::class, 'index']);
    Route::post('concesionarios', [ConcesionarioController::class, 'store']);
    Route::put('concesionarios/{id}', [ConcesionarioController::class, 'update']);
    Route::delete('concesionarios/{id}', [ConcesionarioController::class, 'destroy']);
    //Preguntas-Crud completo
    Route::apiResource('preguntas', PreguntaController::class);
    //Respuestas-Crud completo
    Route::apiResource('respuestas', RespuestaController::class);
});
