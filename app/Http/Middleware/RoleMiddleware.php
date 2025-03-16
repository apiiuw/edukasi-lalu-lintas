<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu!');
        }

        // Jika user tidak memiliki role yang diizinkan
        if (!in_array($user->role, $roles)) {
            return abort(403);
        }

        return $next($request);
    }
}
