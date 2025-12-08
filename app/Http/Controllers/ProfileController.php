<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Tampilkan halaman profile user
     */
    public function index()
    {
        $user = Auth::user();
        
        // Get properties yang dilike oleh user dengan pagination
        $likedProperties = $user->likedProperties()
                                ->with('propertyShares')
                                ->paginate(12);
        
        // Get yachts yang dilike oleh user dengan pagination
        $likedYachts = $user->likedYachts()
                            ->paginate(12);

        return view('profile', compact('user', 'likedProperties', 'likedYachts'));
    }
}
