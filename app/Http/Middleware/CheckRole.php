<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle($request, Closure $next, $role)
    {
        $user = $request->user();
        $userRole = $user ? strval($user->role) : null;

        if ($user && $userRole === $role) {
            return $next($request);
        }

        return abort(403, "У вас нет доступа к этой странице.");
    }





}
