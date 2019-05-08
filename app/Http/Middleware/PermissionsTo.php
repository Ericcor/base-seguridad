<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Alert;

use Closure;

class PermissionsTo
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next $permissions
     * @return mixed
     */

    public function handle($request, Closure $next,$permissions)
    {
        
        if (!Auth::user()->hasPermission([$permissions])) {

            Alert::warning('!!!','No tienes acceso a esta sección');
            return redirect()->route('inicio');
        }else {
            return $next($request);
        }
    }
}
