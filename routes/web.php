<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyLikeController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PropertyController as AdminPropertyController;
use App\Http\Controllers\Admin\FaqController as AdminFaqController;
use App\Http\Controllers\Admin\LocationController as AdminLocationController;
use Illuminate\Support\Facades\Route;

// Homepage
Route::get('/', function () {
    $locations = \App\Models\Location::limit(5)->get();
    $listings = \App\Models\Property::inRandomOrder()->get();
    return view('welcome', compact('locations', 'listings'));
})->name('home');

// Newsletter Subscribe
Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');

// Listings/Detail Page - Dynamic from database
Route::get('/listings', [PropertyController::class, 'listings'])->name('listings');
Route::get('/location/{location:slug}', [PropertyController::class, 'showLocation'])->name('location.show');

// Property Detail Page (Dynamic by slug)
Route::get('/property/{property:slug}', [PropertyController::class, 'show'])->name('property.detail');

// About Page
Route::get('/about', function () {
    $listings = \App\Models\Property::inRandomOrder()->get();
    return view('about', compact('listings'));
})->name('about');

// FAQ Pages - Dynamic from database
Route::get('/faq', [FaqController::class, 'index'])->name('faq');
Route::get('/faq/{faq:slug}', [FaqController::class, 'show'])->name('faq.show');

// Google Authentication Routes
Route::get('/signin', function () {
    return view('signin');
})->name('signin');

Route::get('/auth/google', [AuthController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback']);

// Profile Routes (harus login)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // Like/Unlike Property
    Route::post('/property/{property}/like', [PropertyLikeController::class, 'toggle'])->name('property.like');
});

// Authentication Routes (old - kept for backward compatibility)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout-old', [AuthController::class, 'logout'])->name('logout.old');
});

// Admin Routes
Route::prefix('admin')->group(function () {
    // Admin Login (Guest only)
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
        Route::post('/login', [AdminController::class, 'login']);
    });

    // Admin Protected Routes (Admin only)
    Route::middleware('isAdmin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
        
        // Property Management
        Route::resource('properties', AdminPropertyController::class)->names([
            'index' => 'admin.properties.index',
            'create' => 'admin.properties.create',
            'store' => 'admin.properties.store',
            'show' => 'admin.properties.show',
            'edit' => 'admin.properties.edit',
            'update' => 'admin.properties.update',
            'destroy' => 'admin.properties.destroy',
        ]);

        // FAQ Management
        Route::resource('faqs', AdminFaqController::class)->names([
            'index' => 'admin.faqs.index',
            'create' => 'admin.faqs.create',
            'store' => 'admin.faqs.store',
            'edit' => 'admin.faqs.edit',
            'update' => 'admin.faqs.update',
            'destroy' => 'admin.faqs.destroy',
        ]);

        // Location Management
        Route::resource('locations', AdminLocationController::class)->names([
            'index' => 'admin.locations.index',
            'create' => 'admin.locations.create',
            'store' => 'admin.locations.store',
            'edit' => 'admin.locations.edit',
            'update' => 'admin.locations.update',
            'destroy' => 'admin.locations.destroy',
        ]);
    });
});
