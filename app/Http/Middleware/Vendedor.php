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
        return redirect()->back()->with('unauthorized', "Solo accesible por un vendedor o administrador directamente.");
    }
}
