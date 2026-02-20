<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (!auth()->check()) {
            return redirect('/login');
        }

        if ($role === 'admin' && !auth()->user()->isAdmin()) {
            abort(403, 'Unauthorized.');
        }

        if ($role === 'employer' && !auth()->user()->isEmployer()) {
            abort(403, 'Unauthorized.');
        }

        if ($role === 'user' && !auth()->user()->isUser()) {
            abort(403, 'Unauthorized.');
        }

        return $next($request);
    }
}