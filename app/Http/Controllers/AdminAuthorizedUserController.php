<?php

namespace App\Http\Controllers;

use App\Models\AuthorizedUser;
use Illuminate\Http\Request;

class AdminAuthorizedUserController extends Controller
{
    /**
     * Display a listing of authorized users
     */
    public function index()
    {
        $authorizedUsers = AuthorizedUser::with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('admin.authorized-users.index', compact('authorizedUsers'));
    }

    /**
     * Show the form for creating a new authorized user
     */
    public function create()
    {
        return view('admin.authorized-users.create');
    }

    /**
     * Store a newly created authorized user
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:authorized_users,email',
        ]);

        $accessCode = AuthorizedUser::generateAccessCode();

        AuthorizedUser::create([
            'email' => $request->email,
            'access_code' => $accessCode,
        ]);

        return redirect()->route('admin.authorized-users.index')
            ->with('success', 'Access code created successfully: ' . $accessCode);
    }

    /**
     * Show the form for editing the specified authorized user
     */
    public function edit(AuthorizedUser $authorizedUser)
    {
        return view('admin.authorized-users.edit', compact('authorizedUser'));
    }

    /**
     * Update the specified authorized user
     */
    public function update(Request $request, AuthorizedUser $authorizedUser)
    {
        $request->validate([
            'email' => 'required|email|unique:authorized_users,email,' . $authorizedUser->id,
        ]);

        $authorizedUser->update([
            'email' => $request->email,
        ]);

        return redirect()->route('admin.authorized-users.index')
            ->with('success', 'Authorized user updated successfully.');
    }

    /**
     * Remove the specified authorized user
     */
    public function destroy(AuthorizedUser $authorizedUser)
    {
        $authorizedUser->delete();

        return redirect()->route('admin.authorized-users.index')
            ->with('success', 'Authorized user deleted successfully.');
    }

    /**
     * Regenerate access code
     */
    public function regenerateCode(AuthorizedUser $authorizedUser)
    {
        if ($authorizedUser->is_used) {
            return back()->with('error', 'Cannot regenerate code for used access codes.');
        }

        $newCode = AuthorizedUser::generateAccessCode();
        $authorizedUser->update([
            'access_code' => $newCode,
        ]);

        return back()->with('success', 'New access code generated: ' . $newCode);
    }
}
