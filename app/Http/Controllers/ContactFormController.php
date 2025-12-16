<?php

namespace App\Http\Controllers;

use App\Models\ContactForm;
use Illuminate\Http\Request;

class ContactFormController extends Controller
{
    public function submit(Request $request)
    {
        // Validasi input dengan email format check
        $validated = $request->validate([
            'user_type' => 'required|in:buyer,seller,agent',
            'full_name' => 'required|string|max:255',
            'email' => 'required|email:rfc,dns|max:255', // Email format validation
            'message' => 'nullable|string',
            'page_source' => 'nullable|string',
        ], [
            'email.email' => 'Please enter a valid email address.',
            'email.required' => 'Email address is required.',
        ]);

        // Check if email already exists
        $existingContact = ContactForm::where('email', $validated['email'])->first();
        
        if ($existingContact) {
            return redirect()->back()
                ->withInput()
                ->with('info', "We've already received your message! We'll get back to you soon. Thank you for your patience.");
        }

        // Create new contact form entry
        ContactForm::create($validated);

        return redirect()->back()->with('success', 'Our representative will reach out within 24 hours to provide the information you need.');
    }
}
