<?php

namespace Upanel\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Administrador
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()->role_id !== 1) {
            return redirect()->back()->with('unauthorized', "Sólo un administrador puede acceder a esta vista");
        }

        return $next($request);
    }
}
