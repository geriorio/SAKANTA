<?php

namespace App\Http\Controllers;

use App\Models\MembershipRequest;
use Illuminate\Http\Request;

class MembershipRequestController extends Controller
{
    /**
     * Submit membership request
     */
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'country' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'has_referral' => 'required|boolean',
            'referral_name' => 'nullable|string|max:255',
        ]);

        // Create membership request
        MembershipRequest::create([
            'full_name' => $validated['full_name'],
            'email' => $validated['email'],
            'country' => $validated['country'],
            'phone' => $validated['phone'],
            'has_referral' => $validated['has_referral'],
            'referral_name' => $validated['has_referral'] ? $validated['referral_name'] : null,
            'status' => 'pending',
        ]);

        return response()->json(['success' => true]);
    }
}
