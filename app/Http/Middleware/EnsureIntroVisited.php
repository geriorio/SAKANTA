<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureIntroVisited
{
    public function handle(Request $request, Closure $next): Response
    {
        // Jika user sudah login → bebas
        if (Auth::check()) {
            return $next($request);
        }

        // Jika sedang akses intro atau callback → bebas
        if (
            $request->is('intro') ||
            $request->is('auth/google/callback')
        ) {
            return $next($request);
        }

        // Paksa intro HANYA SEKALI
        if (!session()->has('intro_visited')) {
            session(['intro_visited' => true]);
            return redirect()->route('auth.intro');
        }

        return $next($request);
    }
}
