<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class NewUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::user()->isNew() && !$request->is('PerfilUsuario/*')) {
            notify()->flash('Para empezar a utilizar el sistema debe cambiar su contraseña.', 'warning', [
              'timer' => 5000,
              'text' => ''
            ]);
            return redirect()->route('frontend.user.perfil');
        }

        return $next($request);
    }
}