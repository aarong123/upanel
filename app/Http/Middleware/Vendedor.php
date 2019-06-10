<?php

namespace Upanel\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Vendedor
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
        if (Auth::user()->role_id === 1 || Auth::user()->role_id === 2) {
            return $next($request);
        }
        return redirect('/main')->with('unauthorized', "Sólo un administrador o un vendedor puede acceder a esta vista");
    }
}
