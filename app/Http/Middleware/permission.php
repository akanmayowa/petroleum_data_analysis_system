<?php

namespace App\Http\Middleware;

use Closure;

class permission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $perm)
    {
        app(\App\Http\Controllers\MicrosoftController::class)->refresh_token();

        // $role = \Auth::user()->role_obj->whereHas('permission', function ($query) use ($perm)
        // {
        //     $query->where('constant', $perm);
        // })->first();

        // dd($role);
        if (\Auth::user()->role_obj->permission->contains('constant', $perm)) {
            return $next($request);
        } else {
            return abort(403);
        }
    }
}
