<?php

namespace App\Http\Middleware;
use Closure;
class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle($request, Closure $next, ...$roles)
    {
        $user = $request->user();
        if (!$user){
            return response()->json(['message' => 'No autenticado'], 401);
        }
        $userRole = $user->rol_nombre;
        $allowedRoles = array_map('trim', $roles);
        if (!in_array($userRole, $allowedRoles)) {
            return response()->json(['message' => 'Acceso denegado'], 403);
        }
        return $next($request);
    }
}