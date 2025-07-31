<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);
        // Kirim email atau simpan pesan ke database di sini
        // Mail::to('info@sakanta.com')->send(new ContactMail($validated));
        return back()->with('success', 'Pesan Anda berhasil dikirim!');
    }
}
