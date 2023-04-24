<?php

namespace App\Http\Middleware;

use Closure;

class AuthExternal
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
        if (\Auth::guard('external')->check()) {
            return $next($request);
        }

        return redirect('login');
    }
}
