<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Jika user belum login, redirect ke signin
        if (!auth()->check()) {
            return redirect('/signin')->with('info', 'Please sign in to continue.');
        }

        // Jika user tidak aktif, logout dan redirect
        if (!auth()->user()->is_active) {
            auth()->logout();
            return redirect('/signin')->with('error', 'Your account is inactive. Please contact admin.');
        }

        return $next($request);
    }
}
