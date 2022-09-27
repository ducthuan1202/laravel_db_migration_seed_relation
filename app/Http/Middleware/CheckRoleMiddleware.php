<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class CheckRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, string $role)
    {
        $roles = [
            'admin' => [1, 2],
            'member' => [2],
        ];

        if(!Arr::exists($roles, $role)){
            abort(400);
        }

        if (!in_array(Auth::id(), $roles[$role])) {
            abort(403);
        }

        return $next($request);
    }
}
