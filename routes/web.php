<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminAuthorizedUserController;
use App\Http\Controllers\MembershipRequestController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyLikeController;
use App\Http\Controllers\YachtLikeController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PropertyController as AdminPropertyController;
use App\Http\Controllers\Admin\FaqController as AdminFaqController;
use App\Http\Controllers\Admin\LocationController as AdminLocationController;
use Illuminate\Support\Facades\Route;

// Public Routes (No Auth Required)
// Intro Page
Route::get('/intro', [AuthController::class, 'showIntro'])->name('auth.intro');

// Authentication Routes
Route::get('/signin', [AuthController::class, 'showSignin'])->name('auth.signin');
Route::post('/signin', [AuthController::class, 'signin'])->name('auth.signin.submit');
Route::get('/signup', [AuthController::class, 'showSignup'])->name('auth.signup');
Route::post('/signup', [AuthController::class, 'signup'])->name('auth.signup.submit');

// Membership Request
Route::post('/membership/request', [MembershipRequestController::class, 'submit'])->name('membership.request.submit');

// Google Authentication Routes
Route::get('/auth/google', [AuthController::class, 'redirectToGoogle'])->name('auth.google.redirect');
Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback'])->name('auth.google.callback');

// Protected Routes (User Must Be Authenticated)
Route::middleware(['userAuth', 'prevent.back'])->group(function () {
    // Homepage
    Route::get('/', function () {
        $locations = \App\Models\Location::limit(5)->get();
        $listings = \App\Models\Property::inRandomOrder()->get();
        return view('welcome', compact('locations', 'listings'));
    })->name('welcome');

    // Newsletter Subscribe
    Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');

    // Contact Form Submit
    Route::post('/contact/submit', [ContactFormController::class, 'submit'])->name('contact.submit');

    // Search API
    Route::get('/api/search', [PropertyController::class, 'search'])->name('api.search');

    // Listings/Detail Page - Dynamic from database
    Route::get('/listings', [PropertyController::class, 'listings'])->name('listings');
    Route::get('/locations', [PropertyController::class, 'listings'])->name('locations');
    Route::get('/all-listings', [PropertyController::class, 'allListings'])->name('all.listings');
    Route::get('/yacht-listings', [PropertyController::class, 'yachtListings'])->name('yacht.listings');
    Route::get('/location/{location:slug}', [PropertyController::class, 'showLocation'])->name('location.show');
    Route::get('/location/{location:slug}/properties', [PropertyController::class, 'showLocation'])->name('location.properties');
    Route::get('/location/{location:slug}/article', [PropertyController::class, 'showArticle'])->name('location.article');

    // Property Detail Page (Dynamic by slug)
    Route::get('/property/{property:slug}', [PropertyController::class, 'show'])->name('property.detail');

    // Yacht Detail Page (Dynamic by slug)
    Route::get('/yacht/{yacht:slug}', [PropertyController::class, 'showYacht'])->name('yacht.detail');

    // About Page
    Route::get('/about', function () {
        $listings = \App\Models\Property::inRandomOrder()->get();
        return view('about', compact('listings'));
    })->name('about');

    // How It Works Page
    Route::get('/how-it-works', function () {
        $properties = \App\Models\Property::inRandomOrder()->get();
        return view('how-it-works', compact('properties'));
    })->name('how-it-works');

    // FAQ Pages - Dynamic from database
    Route::get('/faq', [FaqController::class, 'index'])->name('faq');
    Route::get('/faq/{faq:slug}', [FaqController::class, 'show'])->name('faq.show');

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // Like/Unlike Property
    Route::post('/property/{property}/like', [PropertyLikeController::class, 'toggle'])->name('property.like');
    
    // Like/Unlike Yacht
    Route::post('/yacht/{yacht}/like', [YachtLikeController::class, 'toggle'])->name('yacht.like');
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
        
        // Delete Property Additional Image
        Route::delete('/properties/{property}/images/{index}', [AdminPropertyController::class, 'deleteImage'])->name('admin.properties.deleteImage');

        // Yacht Management
        Route::resource('yachts', \App\Http\Controllers\Admin\YachtController::class)->names([
            'index' => 'admin.yachts.index',
            'create' => 'admin.yachts.create',
            'store' => 'admin.yachts.store',
            'show' => 'admin.yachts.show',
            'edit' => 'admin.yachts.edit',
            'update' => 'admin.yachts.update',
            'destroy' => 'admin.yachts.destroy',
        ]);
        
        // Delete Yacht Gallery Image
        Route::delete('/yachts/{yacht}/images/{index}', [\App\Http\Controllers\Admin\YachtController::class, 'deleteImage'])->name('admin.yachts.deleteImage');

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

        // Location Article Management
        Route::resource('articles', \App\Http\Controllers\Admin\LocationArticleController::class)->names([
            'index' => 'admin.articles.index',
            'create' => 'admin.articles.create',
            'store' => 'admin.articles.store',
            'edit' => 'admin.articles.edit',
            'update' => 'admin.articles.update',
            'destroy' => 'admin.articles.destroy',
        ]);

        // User Management
        Route::get('/users', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.users.index');
        Route::post('/users', [\App\Http\Controllers\Admin\UserController::class, 'store'])->name('admin.users.store');
        Route::patch('/users/{id}/toggle', [\App\Http\Controllers\Admin\UserController::class, 'toggleActive'])->name('admin.users.toggle');
        Route::delete('/users/{id}', [\App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('admin.users.destroy');

        // Authorized Users Management
        Route::resource('authorized-users', AdminAuthorizedUserController::class)->names([
            'index' => 'admin.authorized-users.index',
            'create' => 'admin.authorized-users.create',
            'store' => 'admin.authorized-users.store',
            'edit' => 'admin.authorized-users.edit',
            'update' => 'admin.authorized-users.update',
            'destroy' => 'admin.authorized-users.destroy',
        ]);
        Route::post('/authorized-users/{authorizedUser}/regenerate', [AdminAuthorizedUserController::class, 'regenerateCode'])->name('admin.authorized-users.regenerate');
    });
});
