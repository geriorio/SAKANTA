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
        return Socialite::driver('google')->redirect();
    }

    /**
     * Handle callback dari Google
     */
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            
            // Cari atau buat user
            $user = User::where('google_id', $googleUser->id)
                        ->orWhere('email', $googleUser->email)
                        ->first();

            if ($user) {
                // Update google_id dan avatar jika belum ada
                if (!$user->google_id) {
                    $user->google_id = $googleUser->id;
                }
                if (!$user->avatar || $user->avatar !== $googleUser->avatar) {
                    $user->avatar = $googleUser->avatar;
                }
                $user->save();
            } else {
                // Buat user baru
                $user = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'google_id' => $googleUser->id,
                    'avatar' => $googleUser->avatar,
                    'password' => bcrypt(uniqid()), // Random password untuk keamanan
                ]);
            }

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
