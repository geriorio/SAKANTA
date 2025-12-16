<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\AuthorizedUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
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
        
        return view('auth.intro');
    }

    /**
     * Show login page with Google button
     */
    public function showLogin()
    {
        // If already logged in, redirect to home
        if (Auth::check()) {
            return redirect('/');
        }
        
        return view('auth.login');
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
            
            // Check if user already exists
            $existingUser = User::where('email', $googleUser->email)->first();
            
            if ($existingUser) {
                // Check if user has valid access code
                $validAccessCode = AuthorizedUser::where('email', $googleUser->email)
                    ->where('is_used', true)
                    ->where('user_id', $existingUser->id)
                    ->first();
                
                if ($validAccessCode) {
                    // User has valid access, login directly
                    Auth::login($existingUser, true);
                    return redirect('/')->with('success', 'Welcome back, ' . $existingUser->name . '!');
                }
                
                // User exists but no valid access code (maybe deleted then re-registered)
                // Treat as new registration
            }
            
            // New user or user without valid access - store Google info in session for registration
            session([
                'google_user_email' => $googleUser->email,
                'google_user_name' => $googleUser->name,
                'google_user_id' => $googleUser->id,
                'google_user_avatar' => $googleUser->avatar,
            ]);

            // Redirect to access choice page for new users
            return redirect()->route('auth.access-choice');

        } catch (\Exception $e) {
            return redirect()->route('auth.intro')->with('error', 'Failed to authenticate with Google. Please try again.');
        }
    }

    /**
     * Show access choice page
     */
    public function showAccessChoice()
    {
        if (!session('google_user_email')) {
            return redirect()->route('auth.intro')->with('error', 'Please sign in with Google first.');
        }

        return view('auth.access-choice');
    }

    /**
     * Show enter access code page
     */
    public function showEnterAccess()
    {
        if (!session('google_user_email')) {
            return redirect()->route('auth.intro')->with('error', 'Please sign in with Google first.');
        }

        return view('auth.enter-access');
    }

    /**
     * Verify access code and login
     */
    public function verifyAccess(Request $request)
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

        // If already used, login existing user
        if ($authorizedUser->is_used && $authorizedUser->user_id) {
            $user = User::find($authorizedUser->user_id);
            
            if ($user) {
                Auth::login($user, true);
                
                // Clear Google session data
                session()->forget(['google_user_email', 'google_user_name', 'google_user_id', 'google_user_avatar']);
                
                return redirect('/')->with('success', 'Welcome back, ' . $user->name . '!');
            }
        }

        // Access code valid but user not registered yet - create user
        $googleEmail = session('google_user_email');
        $googleName = session('google_user_name');
        $googleId = session('google_user_id');
        $googleAvatar = session('google_user_avatar');

        if (!$googleEmail) {
            return back()->with('error', 'Session expired. Please start over.');
        }

        // Check if user already exists with this email
        $existingUser = User::where('email', $googleEmail)->first();
        
        if ($existingUser) {
            // User already exists, just mark access code as used and login
            $authorizedUser->markAsUsed($existingUser);
            Auth::login($existingUser, true);
            
            // Clear Google session data
            session()->forget(['google_user_email', 'google_user_name', 'google_user_id', 'google_user_avatar']);
            
            return redirect('/')->with('success', 'Welcome back, ' . $existingUser->name . '!');
        }

        // Create new user
        $user = User::create([
            'name' => $googleName,
            'email' => $googleEmail,
            'google_id' => $googleId,
            'avatar' => $googleAvatar,
            'password' => Hash::make('google_oauth_' . now()->timestamp),
        ]);

        // Mark access code as used
        $authorizedUser->markAsUsed($user);

        // Login user
        Auth::login($user, true);
        
        // Clear Google session data
        session()->forget(['google_user_email', 'google_user_name', 'google_user_id', 'google_user_avatar']);

        return redirect('/')->with('success', 'Welcome to Sakanta, ' . $user->name . '!');
    }

    /**
     * Show request access page
     */
    public function showRequestAccess()
    {
        if (!session('google_user_email')) {
            return redirect()->route('auth.intro')->with('error', 'Please sign in with Google first.');
        }

        return view('auth.request-access');
    }

    /**
     * Submit access request
     */
    public function submitRequest(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'name' => 'required|string|max:255',
            'phone' => 'required|string',
            'referral_code' => 'nullable|string',
        ]);

        $email = $request->email;

        // Check if user already has access
        if (AuthorizedUser::where('email', $email)->exists()) {
            return back()->with('error', 'This email already has an access code.');
        }

        // If referral code provided, validate it
        if ($request->filled('referral_code')) {
            $referrer = AuthorizedUser::where('referral_code', $request->referral_code)->first();

            if (!$referrer) {
                return back()->with('error', 'Invalid referral code.');
            }

            if (!$referrer->canAcceptReferral()) {
                return back()->with('error', 'Referral code has already been used 5 times.');
            }

            // Generate access code for user
            $accessCode = AuthorizedUser::generateAccessCode();

            // Create authorized user
            $authorizedUser = AuthorizedUser::create([
                'email' => $email,
                'access_code' => $accessCode,
                'is_used' => false,
            ]);

            // Add to referrer's referred users
            $referrer->addReferredUser($email);

            // Send email with access code
            try {
                Mail::send('emails.access-code', ['accessCode' => $accessCode, 'name' => $request->name], function($message) use ($email) {
                    $message->to($email)
                            ->subject('Your Sakanta Access Code');
                });
            } catch (\Exception $e) {
                \Log::error('Failed to send access code email: ' . $e->getMessage());
            }

            // Show success page with access code
            return view('auth.access-code-generated', ['accessCode' => $accessCode]);
        }

        // No referral code - save to membership requests
        \App\Models\MembershipRequest::create([
            'full_name' => $request->name,
            'email' => $email,
            'phone' => $request->phone,
            'has_referral' => false,
            'status' => 'pending',
        ]);

        return view('auth.request-submitted');
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
