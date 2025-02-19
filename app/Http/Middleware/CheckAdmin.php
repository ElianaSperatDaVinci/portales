<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verificar si el usuario está autenticado y si es administrador
        if (Auth::check() && Auth::user()->role_fk === 1) {
            // Si no está verificado como administrador, redirigir a la página de verificación
            if (!session()->get('admin-verified', false)) {
                // return to_route('discos.check-admin.form');
            }

            return $next($request);
        }

        // Si no es administrador, redirigir a una página de acceso denegado o a la página principal
        return redirect()->route('discos.index')->with('error', 'No tenés permiso para acceder a esta página.');
    }
}
