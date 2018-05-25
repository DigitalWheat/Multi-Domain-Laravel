<?php

namespace App\Http\Middleware;

use Closure;

class IsAppAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->isAppAdmin()) {
            return $next($request);
        }
        return redirect()->route('app.home');
    }
}
