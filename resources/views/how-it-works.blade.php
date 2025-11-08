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
                <img src="{{ asset('images/homevilla2.jpg') }}" alt="Designed for the soul">
            </div>
        </div>
    </section>

    <!-- Step 3 - Image Left, Text Right -->
    <section class="step-section light-section">
        <div class="step-row">
            <div class="step-image">
                <img src="{{ asset('images/homevilla.jpg') }}" alt="Begin your journey">
            </div>
            <div class="step-content">
                <h2 class="step-title">Begin your journey toward shared serenity.</h2>
                <p class="step-description">
                    Sakanta is more than co-ownership — it's your invitation to belong to a new way of living.
                </p>
                <a href="https://wa.me/6281234567890?text=Hi%20Sakanta,%20I%20would%20like%20to%20book%20a%20private%20consultation" target="_blank" class="step-cta-button">Book a Private Consultation</a>
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
        <div class="footer-content" style="flex: 1; padding: 100px 80px; display: flex; flex-direction: column; justify-content: center; background: #F7EFE2; box-sizing: border-box;">
            <!-- Logo/Icon -->
            <div style="margin-bottom: 40px;">
                <svg width="80" height="30" viewBox="0 0 80 30" fill="none">
                    <rect x="7.5" y="7.5" width="10" height="10" transform="rotate(45 7.5 7.5)" stroke="#064852" stroke-width="2" fill="none"/>
                    <rect x="32.5" y="7.5" width="10" height="10" transform="rotate(45 32.5 7.5)" stroke="#064852" stroke-width="2" fill="none"/>
                </svg>
            </div>
            
            <!-- Text Content -->
            <p style="font-family: 'Work Sans', sans-serif; font-size: 16px; line-height: 1.9; margin-bottom: 25px; font-weight: 400; color: #064852; max-width: 550px;">
                Sakanta is more than a new model of property ownership — it's an invitation to rediscover balance. We believe that true luxury lies in stillness, connection, and the ability to feel at home wherever you are. Every Sakanta home is a shared sanctuary, crafted for those who value both privacy and presence.
            </p>
            
            <p style="font-family: 'Work Sans', sans-serif; font-size: 16px; line-height: 1.9; margin-bottom: 50px; font-weight: 400; color: #064852; max-width: 550px;">
                Through thoughtful design, trusted management, and a spirit of togetherness, Sakanta turns ownership into an effortless experience. Here, you don't just buy a place — you belong to one.
            </p>
            
            <!-- Live It All -->
            <h2 style="font-family: 'Esther', serif; font-size: 64px; font-weight: 400; margin-bottom: 40px; letter-spacing: 2px; line-height: 1.1; color: #064852;">
                Live It All
            </h2>
            
            <!-- Social Icons -->
            <div style="display: flex; gap: 18px; margin-bottom: 40px;">
                <a href="#" style="width: 45px; height: 45px; border: 2px solid #064852; border-radius: 50%; display: flex; align-items: center; justify-content: center; text-decoration: none; color: #064852; transition: all 0.3s; flex-shrink: 0;">
                    <span style="font-family: 'Work Sans', sans-serif; font-size: 18px; font-weight: 600;">f</span>
                </a>
                <a href="#" style="width: 45px; height: 45px; border: 2px solid #064852; border-radius: 50%; display: flex; align-items: center; justify-content: center; text-decoration: none; color: #064852; transition: all 0.3s; flex-shrink: 0;">
                    <span style="font-family: 'Work Sans', sans-serif; font-size: 16px; font-weight: 600;">in</span>
                </a>
                <a href="#" style="width: 45px; height: 45px; border: 2px solid #064852; border-radius: 50%; display: flex; align-items: center; justify-content: center; text-decoration: none; color: #064852; transition: all 0.3s; flex-shrink: 0;">
                    <span style="font-family: 'Work Sans', sans-serif; font-size: 18px; font-weight: 600;">@</span>
                </a>
            </div>
            
            <!-- Copyright -->
            <p style="font-family: 'Work Sans', sans-serif; font-size: 12px; color: #064852; opacity: 0.7; letter-spacing: 1px; text-transform: uppercase; margin: 0;">
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

            .footer-content > div:first-child svg {
                width: 60px !important;
                height: 25px !important;
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
        }
    </style>
</body>
</html>
