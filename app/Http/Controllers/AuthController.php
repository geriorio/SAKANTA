<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\AuthorizedUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    /**
     * Show intro page
     */
    public function showIntro()
    {
        // If already logged in, skip intro
        if (Auth::check()) {
            return redirect('/');
        }
        
        // Set session that intro has been seen
        session(['intro_seen' => true]);
        
        return view('auth.intro');
    }

    /**
     * Show signin page
     */
    public function showSignin()
    {
        // If already logged in, redirect to home
        if (Auth::check()) {
            return redirect('/');
        }
        
        // If intro not seen, redirect to intro
        if (!session('intro_seen')) {
            return redirect()->route('auth.intro');
        }
        
        return view('auth.signin');
    }

    /**
     * Show signup page
     */
    public function showSignup()
    {
        // If already logged in, redirect to home
        if (Auth::check()) {
            return redirect('/');
        }
        
        // Signup can be accessed directly (no intro required)
        return view('auth.signup');
    }

    /**
     * Handle signin with access code
     */
    public function signin(Request $request)
    {
        $request->validate([
            'access_code' => 'required|string',
            'email' => 'required|email',
        ]);

        // Find authorized user
        $authorizedUser = AuthorizedUser::where('access_code', $request->access_code)
            ->where('email', $request->email)
            ->first();

        if (!$authorizedUser) {
            return back()->with('error', 'Invalid access code or email.');
        }

        if ($authorizedUser->is_used && $authorizedUser->user_id) {
            // User already registered, log them in
            $user = User::find($authorizedUser->user_id);
            
            if ($user) {
                Auth::login($user);
                return redirect()->route('properties.index')->with('success', 'Welcome back!');
            }
        }

        // Access code valid but user not registered yet
        return back()->with('error', 'Please sign up first with this access code.');
    }

    /**
     * Handle signup
     */
    public function signup(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string',
            'access_code' => 'required|string',
        ]);

        // Verify access code
        $authorizedUser = AuthorizedUser::where('access_code', $request->access_code)
            ->where('email', $request->email)
            ->where('is_used', false)
            ->first();

        if (!$authorizedUser) {
            return back()->with('error', 'Invalid access code or this code has already been used.');
        }

        // Create user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make('default_password_' . now()->timestamp),
        ]);

        // Mark access code as used
        $authorizedUser->markAsUsed($user);

        // Log the user in
        Auth::login($user);

        return redirect()->route('properties.index')->with('success', 'Welcome to Sakanta!');
    }

    /**
     * Redirect ke Google OAuth
     */
    public function redirectToGoogle(Request $request)
    {
        // Validate access code
        $request->validate([
            'access_code' => 'required|string',
        ]);

        // Store access code in session
        session(['pending_access_code' => $request->access_code]);

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
            $accessCode = session('pending_access_code');

            // Validate access code from session
            if (!$accessCode) {
                return redirect()->route('auth.signin')->with('error', 'Access code is required. Please try again.');
            }

            // Find authorized user with matching email and access code
            $authorizedUser = AuthorizedUser::where('access_code', $accessCode)
                ->where('email', $googleUser->email)
                ->first();

            if (!$authorizedUser) {
                session()->forget('pending_access_code');
                return redirect()->route('auth.signin')->with('error', 'Access code does not match your Google account email.');
            }

            // Check if access code is already used by different user
            if ($authorizedUser->is_used && $authorizedUser->user_id) {
                $existingUser = User::find($authorizedUser->user_id);
                
                if ($existingUser && $existingUser->email === $googleUser->email) {
                    // Same user logging in again - allow
                    Auth::login($existingUser, true);
                    session()->forget('pending_access_code');
                    return redirect()->intended('/')->with('success', 'Welcome back, ' . $existingUser->name . '!');
                } else {
                    // Access code used by different user
                    session()->forget('pending_access_code');
                    return redirect()->route('auth.signin')->with('error', 'This access code has already been used by another account.');
                }
            }

            // Create new user or update existing
            $user = User::where('email', $googleUser->email)->first();

            if (!$user) {
                // Create new user
                $user = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'google_id' => $googleUser->id,
                    'avatar' => $googleUser->avatar,
                    'password' => Hash::make('google_oauth_' . now()->timestamp),
                ]);
            } else {
                // Update existing user
                $user->google_id = $googleUser->id;
                $user->avatar = $googleUser->avatar;
                $user->name = $googleUser->name;
                $user->save();
            }

            // Mark access code as used
            $authorizedUser->markAsUsed($user);

            // Login user
            Auth::login($user, true);
            session()->forget('pending_access_code');

            return redirect()->intended('/')->with('success', 'Welcome to Sakanta, ' . $user->name . '!');

        } catch (\Exception $e) {
            session()->forget('pending_access_code');
            return redirect()->route('auth.signin')->with('error', 'Failed to authenticate with Google. Please try again.');
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

        return redirect()->route('auth.intro')->with('success', 'You have been logged out successfully.');
    }
}
