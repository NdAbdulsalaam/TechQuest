<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Auth\Middleware\Role as Middleware;
use Illuminate\Support\Facades\Auth;

class Role
{
    public function handle($request, Closure $next, String $role)
    {
        $user = Auth::user();

        // User has the required role, proceed with the request
        if ($user->role == $role) {
            return $next($request);
        }

        // User does not have the required role, redirect to appropriate dashboard
        return redirect('/' . $user->role . '-dashboard');
    }
}