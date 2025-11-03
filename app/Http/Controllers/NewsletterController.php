<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    /**
     * Subscribe user to newsletter
     */
    public function subscribe(Request $request)
    {
        Log::info('Newsletter subscribe request received', [
            'email' => $request->get('email'),
            'all' => $request->all(),
        ]);

        try {
            // Validate email with strict rules
            $validated = $request->validate([
                'email' => [
                    'required',
                    'email:rfc,dns',
                    'unique:newsletters,email',
                ],
            ], [
                'email.required' => 'Email is required',
                'email.email' => 'Please enter a valid email address (e.g., name@example.com)',
                'email.unique' => 'This email is already subscribed',
            ]);

            Log::info('Email validation passed', ['email' => $validated['email']]);

            // Create newsletter subscriber
            $newsletter = Newsletter::create([
                'email' => $validated['email'],
                'subscribed_at' => now(),
            ]);

            Log::info('Newsletter subscriber created', [
                'id' => $newsletter->id,
                'email' => $newsletter->email,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Thank you for subscribing! Check your email for confirmation.',
                'data' => [
                    'email' => $newsletter->email,
                    'subscribed_at' => $newsletter->subscribed_at,
                ]
            ], 201);

        } catch (ValidationException $e) {
            Log::warning('Newsletter validation error', [
                'email' => $request->get('email'),
                'errors' => $e->errors(),
            ]);

            // Return validation errors properly
            $message = '';
            $title = 'Validation Error';

            if ($e->errors()['email'][0] ?? null) {
                $message = $e->errors()['email'][0];

                // Determine title based on error type
                if (strpos($message, 'already') !== false) {
                    $title = 'Email Already Registered';
                } elseif (strpos($message, 'valid') !== false) {
                    $title = 'Invalid Email Format';
                }
            }

            return response()->json([
                'success' => false,
                'message' => $message,
                'title' => $title,
            ], 422);

        } catch (\Exception $e) {
            Log::error('Newsletter subscribe error: ' . $e->getMessage(), [
                'exception' => $e,
                'email' => $request->get('email'),
                'trace' => $e->getTraceAsString(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while processing your request. Please try again later.',
                'title' => 'Server Error',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
