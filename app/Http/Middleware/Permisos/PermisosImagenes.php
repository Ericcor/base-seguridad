<?php

namespace App\Http\Middleware\Permisos;

use Closure;
use Alert;

class PermisosImagenes
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!auth()->user()->hasPermissionModule('imágenes')) {
            Alert::warning('!!!','No tienes acceso a esta sección');
            return redirect()->route('inicio');
        }
        return $next($request);
    }
}
