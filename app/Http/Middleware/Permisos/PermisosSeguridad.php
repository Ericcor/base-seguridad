<?php

namespace App\Http\Middleware\Permisos;

use Closure;
use Alert;

class PermisosSeguridad
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
        if (!auth()->user()->hasPermissionModule('seguridad')) {
            Alert::warning('!!!','No tienes acceso a esta sección');
            return redirect()->route('inicio');
        }
        return $next($request);
    }
}
