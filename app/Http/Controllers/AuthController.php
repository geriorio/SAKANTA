<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    /**
     * Redirect ke Google OAuth
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')
            ->with(['prompt' => 'select_account'])
            ->redirect();
    }

    /**
     * Handle callback dari Google
     */
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            
            // Cek apakah email sudah terdaftar di database
            $user = User::where('email', $googleUser->email)->first();

            if (!$user) {
                // Email belum terdaftar - tolak akses
                return redirect('/signin')->with('error', 'Your email is not registered. Please contact admin to get access.');
            }

            // Cek apakah user aktif
            if (!$user->is_active) {
                return redirect('/signin')->with('error', 'Your account is inactive. Please contact admin.');
            }

            // Update google_id dan avatar
            if (!$user->google_id) {
                $user->google_id = $googleUser->id;
            }
            $user->avatar = $googleUser->avatar;
            $user->name = $googleUser->name; // Update nama jika berubah di Google
            $user->save();

            // Login user
            Auth::login($user, true);

            return redirect()->intended('/')->with('success', 'Welcome back, ' . $user->name . '!');

        } catch (\Exception $e) {
            return redirect('/signin')->with('error', 'Failed to authenticate with Google. Please try again.');
        }
    }

    /**
     * Logout user
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'You have been logged out successfully.');
    }
}
