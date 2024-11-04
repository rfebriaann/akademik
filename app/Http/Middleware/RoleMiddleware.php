<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  mixed  ...$roles
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = Auth::user();

        // Cek jika user memiliki salah satu dari role yang dibutuhkan
        if ($user && $user->hasAnyRole($roles)) {
            return $next($request);
        }

        // Jika tidak memiliki akses, redirect ke halaman lain (misalnya halaman home atau 403)
        return redirect('/')->with('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
    }
}
