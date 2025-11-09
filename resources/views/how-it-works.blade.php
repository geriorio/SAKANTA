<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>How It Works - SAKANTA</title>
    
    <!-- Google Fonts - Work Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        @font-face {
            font-family: 'Esther';
            src: url('/fonts/Esther-Regular.otf') format('opentype');
            font-weight: normal;
            font-style: normal;
            font-display: swap;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Esther', 'Georgia', serif;
            color: #064852;
            background: #F7EFE2;
        }

        /* Hero Section */
        .hero-section {
            height: 100vh;
            background-image: url('{{ asset('images/hero3.jpg') }}');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            padding: 0 20px;
            position: relative;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
        }

        .hero-content {
            position: relative;
            z-index: 1;
            max-width: 900px;
        }

        .hero-content h1 {
            font-size: 72px;
            font-weight: 400;
            margin-bottom: 25px;
            letter-spacing: 4px;
            font-family: 'Esther', serif;
        }

        .hero-content p {
            font-size: 20px;
            font-weight: 300;
            letter-spacing: 1px;
            opacity: 0.95;
            line-height: 1.7;
            font-family: 'Work Sans', sans-serif;
            margin-bottom: 60px;
        }

        .scroll-indicator {
            position: relative;
            z-index: 2;
            color: white;
            font-size: 24px;
            animation: bounce 2s infinite;
            cursor: pointer;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-10px);
            }
            60% {
                transform: translateY(-5px);
            }
        }

        /* Step Section - Image Left, Text Right */
        .step-section {
            background: #F7EFE2;
            padding: 140px 60px;
        }

        .step-section.reverse {
            background: #064852;
        }

        .step-row {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 80px;
            align-items: center;
        }

        .step-section.reverse .step-row {
            grid-template-columns: 1fr 1fr;
        }

        .step-image {
            width: 100%;
            height: 500px;
            border-radius: 20px;
            overflow: hidden;
            position: relative;
        }

        .step-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .step-image::before {
            content: '';
            position: absolute;
            top: -80px;
            left: -80px;
            width: 250px;
            height: 250px;
            border: 2px solid rgba(6, 72, 82, 0.15);
            border-radius: 50%;
            z-index: 1;
        }

        .step-section.reverse .step-image::before {
            border-color: rgba(247, 239, 226, 0.15);
        }

        .step-content {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .step-title {
            font-size: 42px;
            font-weight: 400;
            color: #064852;
            margin-bottom: 25px;
            letter-spacing: 1px;
            font-family: 'Esther', serif;
            line-height: 1.3;
        }

        .step-section.reverse .step-title {
            color: #F7EFE2;
        }

        .step-number {
            font-size: 14px;
            font-weight: 600;
            color: #5a8aaa;
            letter-spacing: 3px;
            margin-bottom: 20px;
            text-transform: uppercase;
            font-family: 'Work Sans', sans-serif;
        }

        .step-section.reverse .step-number {
            color: #a8c68f;
        }

        .step-description {
            font-size: 17px;
            line-height: 1.8;
            color: #064852;
            font-family: 'Work Sans', sans-serif;
            font-weight: 400;
            margin-bottom: 30px;
        }

        .step-section.reverse .step-description {
            color: #F7EFE2;
        }

        .step-cta-button {
            display: inline-block;
            padding: 14px 35px;
            background: transparent;
            color: #064852;
            text-decoration: none;
            border-radius: 0;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: 2px;
            text-transform: uppercase;
            transition: all 0.3s;
            border: 2px solid #064852;
            font-family: 'Work Sans', sans-serif;
            width: fit-content;
        }

        .step-cta-button:hover {
            background: #064852;
            color: #F7EFE2;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(6, 72, 82, 0.3);
        }

        .step-section.reverse .step-cta-button {
            background: transparent;
            color: #F7EFE2;
            border-color: #F7EFE2;
        }

        .step-section.reverse .step-cta-button:hover {
            background: #F7EFE2;
            color: #064852;
            box-shadow: 0 6px 20px rgba(247, 239, 226, 0.3);
        }

        .step-features {
            display: none;
        }

        /* CTA Section */
        .cta-section {
            background: #064852;
            padding: 0;
            min-height: auto;
        }
        
        .cta-section .featured-section {
            padding: 80px 60px !important;
        }

        /* Footer Styles */
        footer {
            display: flex;
            min-height: 700px;
            background: #F7EFE2;
            width: 100%;
            overflow: hidden;
        }

        .footer-image {
            flex: 1;
            position: relative;
            min-height: 700px;
        }

        .footer-content {
            flex: 1;
            padding: 100px 80px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: #F7EFE2;
            box-sizing: border-box;
        }

        /* Responsive */
        @media (max-width: 968px) {
            .hero-content h1 {
                font-size: 48px;
            }

            .hero-content p {
                font-size: 17px;
            }

            .step-section {
                padding: 80px 30px;
            }

            .step-row {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .step-section.reverse .step-row {
                grid-template-columns: 1fr;
            }

            .step-image {
                height: 350px;
            }

            .step-image::before {
                width: 150px;
                height: 150px;
                top: -40px;
                left: -40px;
            }

            .step-title {
                font-size: 32px;
            }

            .step-description {
                font-size: 15px;
            }

            .cta-section {
                padding: 0;
            }
            
            .cta-section .featured-section {
                padding: 60px 30px !important;
            }
        }

        @media (max-width: 600px) {
            .hero-content h1 {
                font-size: 36px;
                letter-spacing: 2px;
            }

            .hero-content p {
                font-size: 15px;
            }

            .step-section {
                padding: 60px 20px;
            }

            .step-title {
                font-size: 28px;
            }

            .step-number {
                font-size: 12px;
            }

            .step-description {
                font-size: 14px;
            }

            .step-cta-button {
                padding: 12px 25px;
                font-size: 12px;
                width: 100%;
                text-align: center;
            }

            .cta-section .featured-section {
                padding: 50px 20px !important;
            }

            footer {
                flex-direction: column;
                min-height: auto;
            }

            .footer-image {
                min-height: 300px;
                order: 2;
            }

            .footer-content {
                padding: 60px 30px !important;
                order: 1;
            }

            .footer-content h2 {
                font-size: 42px !important;
            }

            .footer-content p {
                font-size: 14px !important;
                max-width: 100% !important;
            }
        }

        @media (max-width: 360px) {
            .hero-content h1 {
                font-size: 28px;
            }

            .hero-content p {
                font-size: 14px;
            }

            .step-section {
                padding: 50px 15px;
            }

            .step-title {
                font-size: 24px;
            }

            .step-description {
                font-size: 13px;
            }

            .step-image {
                height: 280px;
            }

            .footer-content h2 {
                font-size: 36px !important;
            }

            .footer-content p {
                font-size: 13px !important;
            }
        }
    </style>
</head>

<body>
    @include('layouts.navbar')

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-content">
            <h1>How It Works</h1>
            <p>Your Journey to Fractional Ownership Simplified. Discover how easy it is to own a piece of paradise with SAKANTA.</p>
            <div class="scroll-indicator" onclick="document.querySelector('.step-section-1').scrollIntoView({ behavior: 'smooth' })">↓</div>
        </div>
    </section>

    <!-- Step 1 - Image Left, Text Right -->
    <section class="step-section step-section-1 light-section">
        <div class="step-row">
            <div class="step-image">
                <img src="{{ asset('images/labuanbajo1.jpg') }}" alt="Ownership made effortless">
            </div>
            <div class="step-content">
                <div class="step-number">This is how co-owning with Sakanta works</div>
                <h2 class="step-title">Ownership made effortless.</h2>
                <p class="step-description">
                    Each home is divided into shares, with every co-owner receiving real, deed-backed ownership.
                    Sakanta handles everything — from legal setup and home maintenance to stay scheduling and resale support — ensuring you enjoy the benefits without the burden.
                </p>
                <a href="{{ route('faq.show', 'become-a-co-owner') }}" class="step-cta-button">Learn More About Co-Ownership</a>
            </div>
        </div>
    </section>

    <!-- Step 2 - Image Right, Text Left (Dark Background) -->
    <section class="step-section reverse dark-section">
        <div class="step-row">
            <div class="step-content">
                <h2 class="step-title">Designed for the soul, inspired by place.</h2>
                <p class="step-description">
                Every Sakanta property blends wellness, culture, and design to create a restorative experience.
                Morning yoga overlooking rice terraces, private dinners with local chefs, and artfully crafted interiors — every moment is curated for calm and connection.
                </p>
                <a href="/listings" class="step-cta-button">Explore Listings</a>
            </div>
            <div class="step-image">
                <img src="{{ asset('images/Image-02.png') }}" alt="Designed for the soul">
            </div>
        </div>
    </section>

    <!-- Step 3 - Image Left, Text Right -->
    <section class="step-section light-section">
        <div class="step-row">
            <div class="step-image">
                <img src="{{ asset('images/Image-03.png') }}" alt="Begin your journey">
            </div>
            <div class="step-content">
                <h2 class="step-title">Begin your journey toward shared serenity.</h2>
                <p class="step-description">
                    Sakanta is more than co-ownership — it's your invitation to belong to a new way of living.
                </p>
                <button type="button" class="step-cta-button" onclick="openConsultationModal()">Book a Private Consultation</button>
            </div>
        </div>
    </section>

    <!-- Recommended Properties Carousel -->
    <section class="cta-section dark-section">
        @include('components.featured-listings', [
            'listings' => $properties ?? [],
            'title' => 'Recommended Homes For You',
            'description' => 'Discover handpicked properties that match your investment goals and lifestyle preferences',
            'bgColor' => '#064852',
            'textColor' => 'white'
        ])
    </section>

    <!-- Custom Footer for How It Works -->
    <footer style="display: flex; min-height: 700px; background: #F7EFE2; width: 100%; overflow: hidden;">
        <!-- Left Side - Image (50%) -->
        <div class="footer-image" style="flex: 1; position: relative; min-height: 700px;">
            <img src="{{ asset('images/villa1.jpg') }}" alt="Villa" style="width: 100%; height: 100%; object-fit: cover; display: block;">
        </div>
        
        <!-- Right Side - Content (50%) -->
        <div class="footer-content" style="flex: 1; padding: 80px 80px 60px 80px; display: flex; flex-direction: column; justify-content: center; background: #F7EFE2; box-sizing: border-box;">
            <!-- Logo/Icon -->
            <div style="margin-bottom: 25px; display: flex; gap: 20px; align-items: center;">
                <img src="{{ asset('images/KV-13.png') }}" alt="Sakanta Icon" style="width: 120px; height: 120px; object-fit: contain;">
                <img src="{{ asset('images/KV-13.png') }}" alt="Sakanta Icon" style="width: 120px; height: 120px; object-fit: contain;">
            </div>
            
            <!-- Text Content -->
            <p style="font-family: 'Work Sans', sans-serif; font-size: 15px; line-height: 1.7; margin-bottom: 20px; font-weight: 400; color: #064852; max-width: 550px;">
                Sakanta is more than a new model of property ownership — it's an invitation to rediscover balance. We believe that true luxury lies in stillness, connection, and the ability to feel at home wherever you are. Every Sakanta home is a shared sanctuary, crafted for those who value both privacy and presence.
            </p>
            
            <p style="font-family: 'Work Sans', sans-serif; font-size: 15px; line-height: 1.7; margin-bottom: 35px; font-weight: 400; color: #064852; max-width: 550px;">
                Through thoughtful design, trusted management, and a spirit of togetherness, Sakanta turns ownership into an effortless experience. Here, you don't just buy a place — you belong to one.
            </p>
            
            <!-- Live It All -->
            <h2 style="font-family: 'Esther', serif; font-size: 56px; font-weight: 400; margin-bottom: 30px; letter-spacing: 2px; line-height: 1.1; color: #064852;">
                Live It All
            </h2>
            
            <!-- Social Icons -->
            <div style="display: flex; gap: 15px; margin-bottom: 30px;">
                <a href="#" style="width: 40px; height: 40px; border: 2px solid #064852; border-radius: 50%; display: flex; align-items: center; justify-content: center; text-decoration: none; color: #064852; transition: all 0.3s; flex-shrink: 0;">
                    <span style="font-family: 'Work Sans', sans-serif; font-size: 16px; font-weight: 600;">f</span>
                </a>
                <a href="#" style="width: 40px; height: 40px; border: 2px solid #064852; border-radius: 50%; display: flex; align-items: center; justify-content: center; text-decoration: none; color: #064852; transition: all 0.3s; flex-shrink: 0;">
                    <span style="font-family: 'Work Sans', sans-serif; font-size: 14px; font-weight: 600;">in</span>
                </a>
                <a href="#" style="width: 40px; height: 40px; border: 2px solid #064852; border-radius: 50%; display: flex; align-items: center; justify-content: center; text-decoration: none; color: #064852; transition: all 0.3s; flex-shrink: 0;">
                    <span style="font-family: 'Work Sans', sans-serif; font-size: 16px; font-weight: 600;">@</span>
                </a>
            </div>
            
            <!-- Copyright -->
            <p style="font-family: 'Work Sans', sans-serif; font-size: 11px; color: #064852; opacity: 0.7; letter-spacing: 1px; text-transform: uppercase; margin: 0;">
                © All right reserved — SAKANTA
            </p>
        </div>
    </footer>

    <style>
        /* Footer Responsive Styles */
        @media (max-width: 968px) {
            footer {
                flex-direction: column !important;
                min-height: auto !important;
            }

            /* Hide image when layout becomes too tight */
            .footer-image {
                display: none !important;
            }

            .footer-content {
                padding: 60px 40px !important;
                order: 1;
            }

            .footer-content h2 {
                font-size: 48px !important;
            }

            .footer-content > div:first-child img {
                width: 100px !important;
                height: 100px !important;
            }

            .footer-content > div:first-child {
                gap: 15px !important;
            }
        }

        @media (max-width: 768px) {
            /* Already hidden above, just adjust content */
            .footer-image {
                display: none !important;
            }

            .footer-content {
                padding: 50px 30px !important;
            }

            .footer-content h2 {
                font-size: 42px !important;
            }

            .footer-content p {
                font-size: 15px !important;
            }

            .footer-content > div:first-child img {
                width: 90px !important;
                height: 90px !important;
            }

            .footer-content > div:first-child {
                gap: 12px !important;
            }
        }

        @media (max-width: 480px) {
            .footer-content {
                padding: 40px 20px !important;
            }

            .footer-content h2 {
                font-size: 36px !important;
                margin-bottom: 30px !important;
            }

            .footer-content p {
                font-size: 14px !important;
                line-height: 1.7 !important;
            }

            .footer-content > div:first-child img {
                width: 70px !important;
                height: 70px !important;
            }

            .footer-content > div:first-child {
                gap: 10px !important;
            }
        }

        @media (max-width: 360px) {
            .footer-content {
                padding: 30px 15px !important;
            }

            .footer-content h2 {
                font-size: 32px !important;
            }

            .footer-content p {
                font-size: 13px !important;
            }

            .footer-content > div:first-child img {
                width: 60px !important;
                height: 60px !important;
            }

            .footer-content > div:first-child {
                gap: 8px !important;
            }
        }
    </style>

    @include('components.whatsapp-contact')

    <!-- Consultation Modal -->
    <div class="modal-overlay" id="consultationModal">
        <div class="modal-container">
            <button class="modal-close" onclick="closeConsultationModal()">&times;</button>
            
            <div class="modal-header">
                <h2>Book a Private Consultation</h2>
                <p>Be the first to hear about new homes, exclusive listings, and upcoming releases.</p>
            </div>

            <form action="{{ route('contact.submit') }}" method="POST" class="modal-form" id="consultationForm">
                @csrf
                <input type="hidden" name="page_source" value="how-it-works-consultation">

                <!-- User Type Selection -->
                <div class="form-group-radio">
                    <label class="form-label-main">Select one of the following</label>
                    <div class="radio-group">
                        <label class="radio-option">
                            <input type="radio" name="user_type" value="buyer" {{ old('user_type') == 'buyer' || !old('user_type') ? 'checked' : '' }} required>
                            <span>I am a buyer</span>
                        </label>
                        <label class="radio-option">
                            <input type="radio" name="user_type" value="seller" {{ old('user_type') == 'seller' ? 'checked' : '' }} required>
                            <span>I am a seller</span>
                        </label>
                        <label class="radio-option">
                            <input type="radio" name="user_type" value="agent" {{ old('user_type') == 'agent' ? 'checked' : '' }} required>
                            <span>I'm an agent or broker</span>
                        </label>
                    </div>
                    @error('user_type')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Full Name and Email -->
                <div class="form-row">
                    <div class="form-group">
                        <label for="modal_full_name">Full Name <span class="required">*</span></label>
                        <input type="text" id="modal_full_name" name="full_name" value="{{ old('full_name') }}" required>
                        @error('full_name')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="modal_email">Email <span class="required">*</span></label>
                        <input type="email" id="modal_email" name="email" value="{{ old('email') }}" required>
                        @error('email')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Message -->
                <div class="form-group">
                    <label for="modal_message">Message (optional)</label>
                    <textarea id="modal_message" name="message" rows="4" placeholder="Tell us how we can help you...">{{ old('message') }}</textarea>
                    @error('message')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button type="submit" class="modal-submit-btn">SUBMIT</button>
            </form>
        </div>
    </div>

    <!-- Pop-up Notification -->
    @if(session('success') || session('info') || $errors->any())
    <div class="popup-overlay" id="popupOverlay">
        <div class="popup-container">
            <div class="popup-icon {{ session('success') ? 'success' : ($errors->any() ? 'error' : 'info') }}">
                @if(session('success'))
                    <img src="{{ asset('images/success.png') }}" alt="Success">
                @elseif($errors->any())
                    <img src="{{ asset('images/fail.png') }}" alt="Error">
                @else
                    <img src="{{ asset('images/wait.png') }}" alt="Info">
                @endif
            </div>
            <h3 class="popup-title">
                @if(session('success'))
                    Success!
                @elseif($errors->any())
                    Validation Error
                @else
                    Already Registered
                @endif
            </h3>
            <p class="popup-message">
                @if(session('success'))
                    {{ session('success') }}
                @elseif(session('info'))
                    {{ session('info') }}
                @else
                    @foreach($errors->all() as $error)
                        {{ $error }}@if(!$loop->last)<br>@endif
                    @endforeach
                @endif
            </p>
            <button class="popup-btn" onclick="closePopup()">OK</button>
        </div>
    </div>
    @endif

    <style>
        /* Modal Styles */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.7);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 10000;
            animation: fadeIn 0.3s ease;
        }

        .modal-overlay.active {
            display: flex;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes fadeOut {
            from { opacity: 1; }
            to { opacity: 0; }
        }

        @keyframes slideUp {
            from {
                transform: translateY(50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .modal-container {
            background: #F7EFE2;
            border-radius: 16px;
            padding: 50px;
            max-width: 600px;
            width: 90%;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.4);
            animation: slideUp 0.4s ease;
            position: relative;
        }

        .modal-close {
            position: absolute;
            top: 20px;
            right: 20px;
            background: transparent;
            border: none;
            font-size: 36px;
            color: #064852;
            cursor: pointer;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
            line-height: 1;
        }

        .modal-close:hover {
            transform: rotate(90deg);
            color: #e74c3c;
        }

        .modal-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .modal-header h2 {
            font-size: 36px;
            font-weight: 400;
            color: #064852;
            margin-bottom: 15px;
            font-family: 'Esther', serif;
            line-height: 1.3;
        }

        .modal-header p {
            font-size: 15px;
            color: #064852;
            font-family: 'Work Sans', sans-serif;
            line-height: 1.6;
        }

        .modal-form {
            background: transparent;
        }

        .modal-form .form-label-main {
            display: block;
            font-size: 14px;
            color: #064852;
            margin-bottom: 15px;
            font-family: 'Work Sans', sans-serif;
            font-weight: 500;
        }

        .modal-form .form-group-radio {
            margin-bottom: 30px;
        }

        .modal-form .radio-group {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .modal-form .radio-option {
            display: flex;
            align-items: center;
            cursor: pointer;
            font-family: 'Work Sans', sans-serif;
            font-size: 15px;
            color: #064852;
        }

        .modal-form .radio-option input[type="radio"] {
            width: 20px;
            height: 20px;
            margin-right: 10px;
            cursor: pointer;
            accent-color: #064852;
        }

        .modal-form .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 25px;
        }

        .modal-form .form-group {
            margin-bottom: 25px;
        }

        .modal-form .form-group label {
            display: block;
            font-size: 14px;
            color: #064852;
            margin-bottom: 8px;
            font-family: 'Work Sans', sans-serif;
            font-weight: 500;
        }

        .modal-form .required {
            color: #e74c3c;
        }

        .modal-form .form-group input,
        .modal-form .form-group textarea {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid rgba(6, 72, 82, 0.2);
            border-radius: 6px;
            font-size: 15px;
            font-family: 'Work Sans', sans-serif;
            color: #064852;
            transition: all 0.3s;
            background: rgba(255, 255, 255, 0.7);
        }

        .modal-form .form-group input:focus,
        .modal-form .form-group textarea:focus {
            outline: none;
            border-color: #064852;
            background: white;
        }

        .modal-form .form-group textarea {
            resize: vertical;
            min-height: 100px;
        }

        .modal-submit-btn {
            width: 100%;
            padding: 15px 40px;
            background: #064852;
            color: white;
            border: none;
            font-size: 13px;
            letter-spacing: 2px;
            text-transform: uppercase;
            font-weight: 600;
            transition: all 0.3s;
            font-family: 'Work Sans', sans-serif;
            cursor: pointer;
            border-radius: 6px;
        }

        .modal-submit-btn:hover {
            background: #053640;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(6, 72, 82, 0.3);
        }

        .error-message {
            display: block;
            color: #e74c3c;
            font-size: 13px;
            margin-top: 5px;
            font-family: 'Work Sans', sans-serif;
        }

        /* Pop-up Notification Styles */
        .popup-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.6);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 99999;
            animation: fadeIn 0.3s ease;
        }

        .popup-container {
            background: white;
            border-radius: 16px;
            padding: 40px;
            max-width: 450px;
            width: 90%;
            text-align: center;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            animation: slideUp 0.4s ease;
            position: relative;
        }

        .popup-icon {
            width: 100px;
            height: 100px;
            margin: 0 auto 25px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .popup-icon img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .popup-title {
            font-size: 28px;
            font-weight: 400;
            color: #064852;
            margin-bottom: 15px;
            font-family: 'Esther', serif;
        }

        .popup-message {
            font-size: 16px;
            color: #064852;
            line-height: 1.6;
            margin-bottom: 30px;
            font-family: 'Work Sans', sans-serif;
        }

        .popup-btn {
            background: #064852;
            color: white;
            border: none;
            padding: 12px 40px;
            font-size: 14px;
            letter-spacing: 2px;
            text-transform: uppercase;
            font-weight: 600;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.3s;
            font-family: 'Work Sans', sans-serif;
        }

        .popup-btn:hover {
            background: #053640;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(6, 72, 82, 0.3);
        }

        /* Responsive Modal */
        @media (max-width: 768px) {
            .modal-container {
                padding: 40px 30px;
                max-width: 95%;
            }

            .modal-header h2 {
                font-size: 28px;
            }

            .modal-header p {
                font-size: 14px;
            }

            .modal-form .form-row {
                grid-template-columns: 1fr;
                gap: 0;
            }

            .popup-container {
                padding: 30px 25px;
                max-width: 90%;
            }

            .popup-icon {
                width: 80px;
                height: 80px;
            }

            .popup-title {
                font-size: 24px;
            }

            .popup-message {
                font-size: 15px;
            }
        }

        @media (max-width: 480px) {
            .modal-container {
                padding: 30px 20px;
            }

            .modal-header h2 {
                font-size: 24px;
            }

            .modal-close {
                top: 15px;
                right: 15px;
                font-size: 30px;
            }
        }
    </style>

    <script>
        function openConsultationModal() {
            document.getElementById('consultationModal').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeConsultationModal() {
            const modal = document.getElementById('consultationModal');
            modal.style.animation = 'fadeOut 0.3s ease';
            setTimeout(() => {
                modal.classList.remove('active');
                modal.style.animation = '';
                document.body.style.overflow = '';
            }, 300);
        }

        function closePopup() {
            const overlay = document.querySelector('.popup-overlay');
            if (overlay) {
                overlay.style.animation = 'fadeOut 0.3s ease';
                setTimeout(() => {
                    overlay.style.display = 'none';
                }, 300);
            }
        }

        // Close on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                const modal = document.getElementById('consultationModal');
                if (modal && modal.classList.contains('active')) {
                    closeConsultationModal();
                }
                
                const popup = document.querySelector('.popup-overlay');
                if (popup) {
                    closePopup();
                }
            }
        });

        // Close modal when clicking outside
        document.addEventListener('click', function(e) {
            if (e.target.id === 'consultationModal') {
                closeConsultationModal();
            }
            
            if (e.target.classList.contains('popup-overlay')) {
                closePopup();
            }
        });

        // Auto-open modal if there are validation errors
        @if($errors->any())
            window.addEventListener('DOMContentLoaded', function() {
                openConsultationModal();
            });
        @endif
    </script>
</body>
</html>
