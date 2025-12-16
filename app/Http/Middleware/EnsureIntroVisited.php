<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureIntroVisited
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Skip middleware if user is authenticated or accessing intro page
        if (Auth::check() || $request->is('intro') || $request->is('auth/google/callback')) {
            return $next($request);
        }

        // Check if user has visited intro page in this session
        if (!session()->has('intro_visited')) {
            return redirect()->route('auth.intro');
        }

        return $next($request);
    }
}
