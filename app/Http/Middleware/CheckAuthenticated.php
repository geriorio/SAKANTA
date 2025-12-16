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
        // Jika user belum login, redirect ke intro
        if (!auth()->check()) {
            return redirect()->route('auth.intro')->with('info', 'Please sign in to continue.');
        }

        // Jika user tidak aktif, logout dan redirect
        if (!auth()->user()->is_active) {
            auth()->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('auth.intro')->with('error', 'Your account is inactive. Please contact admin.');
        }

        return $next($request);
    }
}
