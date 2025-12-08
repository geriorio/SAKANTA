<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('images/Logo-02.png') }}?v=2">
    <title>SAKANTA - Luxury Villa Resort</title>
    
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

        html, body {
            overflow-x: hidden;
            width: 100%;
            max-width: 100vw;
        }

        body {
            font-family: 'Esther', 'Georgia', serif;
            color: #2c3e50;
        }

        /* Success Notification */
        .notification {
            position: fixed;
            top: 100px;
            right: 30px;
            background: white;
            padding: 20px 30px;
            border-radius: 12px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.15);
            z-index: 10000;
            display: flex;
            align-items: center;
            gap: 15px;
            opacity: 0;
            transform: translateX(400px);
            transition: all 0.4s ease;
            border-left: 4px solid #064852;
        }

        .notification.show {
            opacity: 1;
            transform: translateX(0);
        }

        .notification.success {
            border-left-color: #a8c68f;
        }

        .notification .icon {
            width: 24px;
            height: 24px;
            color: #a8c68f;
        }

        .notification .message {
            font-family: 'Work Sans', sans-serif;
            font-size: 15px;
            color: #064852;
            font-weight: 500;
        }

        .notification .close-btn {
            margin-left: 20px;
            cursor: pointer;
            color: #999;
            font-size: 20px;
            transition: color 0.3s;
        }

        .notification .close-btn:hover {
            color: #064852;
        }

        /* Split Hero Section */
        .hero-section {
            height: 100vh;
            display: flex;
            position: relative;
            overflow: hidden;
        }

        .hero-half {
            flex: 1;
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            transition: flex 0.6s ease;
            text-decoration: none;
        }

        .hero-half:hover {
            flex: 1.1;
            text-decoration: none;
        }

        .hero-half img.hero-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .hero-half:hover img.hero-bg {
            transform: scale(1.1);
        }

        .hero-half::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, rgba(0,0,0,0.3), rgba(0,0,0,0.6));
            transition: background 0.4s ease;
            z-index: 1;
        }

        .hero-half:hover::before {
            background: linear-gradient(to bottom, rgba(0,0,0,0.4), rgba(0,0,0,0.7));
        }

        .hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
            padding: 50px 40px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .hero-content img.hero-logo-img {
            width: 280px;
            height: auto;
            margin-bottom: 50px;
            filter: brightness(0) invert(1);
            opacity: 0.95;
            display: block;
        }

        .hero-button {
            display: inline-block;
            padding: 18px 42px;
            background: transparent;
            border: 2px solid white;
            color: white;
            text-decoration: none !important;
            font-family: 'Work Sans', sans-serif;
            font-size: 14px;
            font-weight: 600;
            letter-spacing: 2px;
            text-transform: uppercase;
            transition: all 0.3s ease;
            border-radius: 0;
        }

        .hero-button:hover {
            background: white;
            color: #064852;
            border-color: white;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255,255,255,0.3);
            text-decoration: none !important;
        }

        /* Responsive for Split Hero */
        @media (max-width: 768px) {
            .hero-section {
                flex-direction: column;
            }

            .hero-half {
                min-height: 50vh;
            }

            .hero-half:hover {
                flex: 1;
            }

            .hero-content img.hero-logo-img {
                width: 200px;
                margin-bottom: 30px;
            }

            .hero-button {
                padding: 14px 32px;
                font-size: 12px;
            }
        }

        .scroll-down {
            text-align: center;
            color: white;
            font-size: 15px;
            letter-spacing: 3px;
            text-transform: uppercase;
            position: relative;
            z-index: 2;
        }

        .scroll-icon {
            width: 100px;
            height: 100px;
            margin: 10px auto 20px auto;
            position: relative;
            background-image: url('/images/KV-05.svg');
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
        }

        .scroll-icon::before {
            content: '';
            display: none;
        }

        @keyframes scroll {
            0% {
                top: 8px;
                opacity: 1;
            }
            100% {
                top: 30px;
                opacity: 0;
            }
        }

        /* Section 2 */
        .section2 {
            min-height: 100vh;
            display: flex;
            align-items: center;
            background: #F7EFE2;
            padding: 100px 80px;
        }

        @media (max-width: 768px) {
            .section2 {
                min-height: auto;
            }
        }

        .section2-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 100px;
            align-items: center;
        }

        .section2-image {
            position: relative;
        }

        .section2-image img {
            width: 100%;
            max-width: 500px;
            height: auto;
            border-radius: 15px;
        }

        .section2-content h2 {
            font-size: 44px;
            font-weight: 400;
            line-height: 1.3;
            margin-bottom: 30px;
            color: #064852;
            font-family: 'Esther', serif;
        }

        .section2-content p {
            font-size: 16px;
            line-height: 1.8;
            color: #064852;
            margin-bottom: 20px;
            font-family: 'Work Sans', sans-serif;
        }

        .section2-content p:first-of-type {
            margin-bottom: 25px;
        }

        /* Section 3 */
        .section3 {
            min-height: 100vh;
            display: flex;
            align-items: center;
            background: #F7EFE2;
            padding: 100px 80px;
        }

        @media (max-width: 768px) {
            .section3 {
                min-height: auto;
            }
        }

        .section3-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 100px;
            align-items: center;
        }

        .section3-content {
            order: 1;
        }

        .section3-content small {
            font-size: 17px;
            color: #5a8aaa;
            letter-spacing: 2px;
            display: block;
            margin-bottom: 20px;
            font-family: 'Work Sans', sans-serif;
            font-weight: 500;
        }

        .section3-content h2 {
            font-size: 44px;
            font-weight: 400;
            line-height: 1.3;
            margin-bottom: 30px;
            color: #064852;
        }

        .section3-list {
            list-style: none;
            margin-bottom: 30px;
        }

        .section3-list li {
            padding: 18px 0;
            border-bottom: 1px solid #c5bfb0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 22px;
            color: #064852;
            cursor: pointer;
            transition: padding-left 0.3s;
        }

        .section3-list li a {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            text-decoration: none;
            color: inherit;
            transition: color 0.3s;
        }

        .section3-list li:hover {
            padding-left: 10px;
        }

        .section3-list li:hover a {
            color: #a8c68f;
        }

        .section3-list li span {
            font-size: 24px;
        }

        .section3-button {
            display: inline-block;
            padding: 12px 30px;
            border: 2px solid #064852;
            color: #064852;
            text-decoration: none;
            font-size: 13px;
            letter-spacing: 2px;
            text-transform: uppercase;
            transition: all 0.3s;
            font-family: 'Work Sans', sans-serif;
            font-weight: 600;
        }

        .section3-button:hover {
            background: #064852;
            color: #F7EFE2;
        }

        .section3-image {
            position: relative;
            order: 2;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .section3-image img {
            width: 100%;
            max-width: 500px;
            height: auto;
            border-radius: 15px;
        }

        /* Section 4 */
        .section4 {
            min-height: 100vh;
            display: flex;
            align-items: center;
            background: #F7EFE2;
            padding: 100px 80px;
        }

        .section4-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 250px 1fr;
            gap: 150px;
            align-items: center;
        }

        .section4-stamp {
            position: relative;
        }

        .section4-stamp img {
            width: 300px;
            height: auto;
            border-radius: 8px;
            transform: rotate(-8deg);
            transition: transform 0.3s ease;
        }

        .section4-stamp img:hover {
            transform: rotate(-5deg) scale(1.05);
        }

        .section4-content h2 {
            font-size: 34px;
            font-weight: 400;
            line-height: 1.4;
            margin-bottom: 50px;
            color: #064852;
            max-width: 600px;
        }

        .section4-features {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            margin-bottom: 40px;
            max-width: 600px;
        }

        .feature-card {
            background: transparent;
        }

        .feature-icon {
            width: 50px;
            height: 50px;
            background: #a8c68f;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .feature-card h3 {
            font-size: 18px;
            font-weight: 600;
            color: #064852;
            margin-bottom: 12px;
            font-family: 'Work Sans', sans-serif;
        }

        .feature-card p {
            font-size: 14px;
            line-height: 1.6;
            color: #064852;
            font-family: 'Work Sans', sans-serif;
            font-weight: 400;
        }

        .section4-button {
            display: inline-block;
            padding: 12px 30px;
            border: 2px solid #064852;
            color: #064852;
            text-decoration: none;
            font-size: 13px;
            letter-spacing: 2px;
            text-transform: uppercase;
            transition: all 0.3s;
            background: transparent;
            font-family: 'Work Sans', sans-serif;
            font-weight: 600;
        }

        .section4-button:hover {
            background: #064852;
            color: #F7EFE2;
        }

        /* Three Cards Section */
        .three-cards-section {
            background: #F7EFE2;
            padding: 100px 80px;
        }

        .three-cards-headline {
            font-family: 'Esther', serif;
            font-size: 3rem;
            color: #064852;
            text-align: center;
            margin: 0 auto 60px;
            max-width: 900px;
            line-height: 1.3;
            font-weight: 400;
        }

        .three-cards-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }

        .card-item {
            position: relative;
            height: 450px;
            overflow: hidden;
            cursor: pointer;
            transition: transform 0.3s ease;
            border-radius: 16px;
        }

        .card-item:hover {
            transform: translateY(-8px);
        }

        .card-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .card-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.3s ease;
        }

        .card-item:hover .card-overlay {
            background: rgba(0, 0, 0, 0.6);
        }

        .card-item.center .card-overlay {
            background: transparent;
        }

        .card-item.center:hover .card-overlay {
            background: transparent;
        }

        .card-title {
            font-family: 'Esther', serif;
            font-size: 42px;
            font-weight: 400;
            color: white;
            letter-spacing: 2px;
            text-transform: uppercase;
            transition: opacity 0.3s ease;
        }

        .card-item:hover .card-title {
            opacity: 0;
        }

        .card-popup {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            padding: 50px 40px;
            border-radius: 12px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
            width: 85%;
            max-width: 400px;
            z-index: 10;
            text-align: center;
        }

        .card-item:hover .card-popup {
            opacity: 1;
            visibility: visible;
        }

        .card-popup h3 {
            font-family: 'Esther', serif;
            font-size: 2rem;
            color: #064852;
            margin: 0 0 25px 0;
            line-height: 1.2;
        }

        .card-popup p {
            font-family: 'Work Sans', sans-serif;
            font-size: 1rem;
            color: #333;
            line-height: 1.7;
            margin: 0;
        }

        @media (max-width: 968px) {
            .three-cards-headline {
                font-size: 2.2rem;
                padding: 0 20px;
                margin-bottom: 40px;
            }

            .three-cards-container {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .card-item {
                height: 350px;
            }
        }

        /* Responsive Design for Hero Logo */
        @media (max-width: 768px) {
            .hero-logo img {
                max-width: 90% !important;
            }

            .section2,
            .section3,
            .section4 {
                min-height: auto !important;
                padding: 80px 40px !important;
            }

            .section2-container,
            .section3-container {
                grid-template-columns: 1fr;
                gap: 50px;
            }

            .section4-container {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .section4-stamp img {
                width: 200px;
                margin: 0 auto;
                display: block;
            }

            .section2-content h2,
            .section3-content h2,
            .section4-content h2 {
                font-size: 36px;
            }

            .section2-image img {
                max-width: 100%;
            }
        }

        @media (max-width: 500px) {
            .hero-logo img {
                max-width: 85% !important;
            }

            .hero-section {
                height: 100vh !important;
                min-height: 100vh !important;
            }

            .section2,
            .section3,
            .section4 {
                min-height: auto !important;
                padding: 50px 20px !important;
            }

            .section2-container,
            .section3-container {
                grid-template-columns: 1fr;
                gap: 30px;
            }

            .section4-container {
                grid-template-columns: 1fr;
                gap: 30px;
            }

            .section4-stamp img {
                width: 180px;
            }

            .section2-content h2,
            .section3-content h2,
            .section4-content h2 {
                font-size: 28px;
            }

            .section2-content p,
            .section3-content p {
                font-size: 14px;
                line-height: 1.7;
            }

            .section2-image img {
                border-radius: 10px;
            }

            .section3-content small {
                font-size: 13px;
            }

            .section3-list li {
                font-size: 16px;
                padding: 12px 0;
            }

            .section4-features li {
                font-size: 14px;
            }

            .scroll-down {
                font-size: 11px;
            }

            .scroll-icon {
                width: 25px;
                height: 45px;
            }
        }

        @media (max-width: 360px) {
            .section2,
            .section3,
            .section4 {
                padding: 40px 15px !important;
            }

            .section2-content h2,
            .section3-content h2,
            .section4-content h2 {
                font-size: 24px;
            }

            .section2-content p,
            .section3-content p {
                font-size: 13px;
            }

            .section3-list li {
                font-size: 14px;
            }

            .section4-stamp img {
                width: 150px;
            }

            .section4-features li {
                font-size: 13px;
            }
        }

    </style>
</head>
<body>
    <!-- Success Notification -->
    @if(session('success'))
    <div class="notification success show" id="notification">
        <svg class="icon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
            <polyline points="22 4 12 14.01 9 11.01"></polyline>
        </svg>
        <span class="message">{{ session('success') }}</span>
        <span class="close-btn" onclick="closeNotification()">×</span>
    </div>
    @endif

    @include('layouts.navbar')

    @include('components.whatsapp-contact')

    <!-- Split Hero Section -->
    <section class="hero-section">
        <!-- Sakanta Homes - Left Half -->
        <a href="/listings" class="hero-half">
            <img src="/images/home.jpg" alt="Sakanta Home" class="hero-bg">
            <div class="hero-content">
                <img src="/images/logohome.png" alt="Home Logo" class="hero-logo-img">
                <div class="hero-button">EXPLORE HOMES</div>
            </div>
        </a>

        <!-- Sakanta Sail - Right Half -->
        <a href="/yacht-listings" class="hero-half">
            <img src="/images/yacht.jpg" alt="Sakanta Sail" class="hero-bg">
            <div class="hero-content">
                <img src="/images/logosail.png" alt="Sail Logo" class="hero-logo-img">
                <div class="hero-button">EXPLORE SAIL</div>
            </div>
        </a>
    </section>

    <!-- Section 2 -->
    <section class="section2">
        <div class="section2-container">
            <div class="section2-image">
                <img src="/images/Image-04.png" alt="Sakanta Villa">
            </div>
            <div class="section2-content">
                <h2>Escape the rush.<br>Find connection.<br>Live it all.</h2>
                <p>At Sakanta, we believe life is richer when rhythm and stillness dance together. Born out of a longing for a life less ordinary — where community, calm, and unhurried beauty matter — Sakanta is a place to exhale.</p>
                <p>Here, every detail whispers intention: from the architecture that embraces nature, to the yacht gently waiting at the horizon. Because we know you don't just want a property. You want a refuge. A way to reconnect. A space to love, live, and remember.</p>
            </div>
        </div>
    </section>

    <!-- Section 3 -->
    <section class="section3">
        <div class="section3-container">
            <div class="section3-content">
                
                <h2>Discover your next sanctuary</h2>
                <small>From Bali’s hidden enclaves to Lombok’s untouched shores — explore properties designed for serenity, privacy, and balance.</small>
                <ul class="section3-list">
                    @foreach($locations as $location)
                    <li>
                        <a href="{{ route('location.show', $location->slug) }}" style="display: flex; justify-content: space-between; align-items: center; text-decoration: none; color: inherit; width: 100%;">
                            <span>{{ $location->name }}</span>
                            <span>↗</span>
                        </a>
                    </li>
                    @endforeach
                </ul>
                <a href="{{ route('all.listings') }}" class="section3-button">View All Homes</a>
            </div>
            <div class="section3-image">
                <img src="/images/Image-01.png" alt="Sakanta Villa">

            </div>
        </div>
    </section>

    <!-- Section 4 -->
    <section class="section4">
        <div class="section4-container">
            <div class="section4-stamp">
                <img src="/images/Stamp-01.png" alt="Sakanta Stamp">
            </div>
            <div class="section4-content">
                <h2>Thoughtfully designed spaces that give you order and flexibility: private nooks to work or rest; communal areas to gather, dine, laugh</h2>
                <div class="section4-features">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <img src="{{ asset('images/house.png') }}" alt="House" style="width: 30px; height: 30px; object-fit: contain;">
                        </div>
                        <h3>Design That Breathes</h3>
                        <p>Earthy materials, open light, and the rhythm of nature.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <img src="{{ asset('images/comfort.png') }}" alt="Comfort" style="width: 30px; height: 30px; object-fit: contain;">
                        </div>
                        <h3>Coliving, Redefined</h3>
                        <p>Private villas with shared spirit — curated for connection and comfort.</p>
                    </div>
                </div>
                <a href="{{ route('faq') }}" class="section4-button">LEARN MORE →</a>
            </div>
        </div>
    </section>

    <!-- Section 5 - Villa Carousel -->
    <!-- MOVED TO AFTER HERO SECTION -->

    <script>
        // Notification auto-hide and close
        function closeNotification() {
            const notification = document.getElementById('notification');
            if (notification) {
                notification.classList.remove('show');
                setTimeout(() => notification.remove(), 400);
            }
        }

        // Auto close notification after 5 seconds
        window.addEventListener('load', function() {
            const notification = document.getElementById('notification');
            if (notification) {
                setTimeout(closeNotification, 5000);
            }
        });
    </script>

    <!-- Three Cards Section -->
    <section class="three-cards-section">
        <h2 class="three-cards-headline">Luxury that feels like yours — because it is</h2>
        
        <div class="three-cards-container">
            <!-- Left Card - Personalized -->
            <div class="card-item">
                <img src="{{ asset('images/villa1.jpg') }}" alt="Personalized">
                <div class="card-overlay">
                </div>
                <div class="card-popup">
                    <h3>Togetherness</h3>
                    <p>Private ownership, shared with people who value harmony and respect.</p>
                </div>
            </div>

            <!-- Center Card - No Overlay -->
            <div class="card-item center">
                <img src="{{ asset('images/villa2.jpg') }}" alt="Center Image">
                <div class="card-overlay"></div>
                <div class="card-popup">
                    <h3>Sanctuary</h3>
                    <p>Homes designed to calm the senses — from architecture to the scent of the air.</p>
                </div>
            </div>

            <!-- Right Card - Premium -->
            <div class="card-item">
                <img src="{{ asset('images/villa5.jpg') }}" alt="Premium">
                <div class="card-overlay">
                </div>
                <div class="card-popup">
                    <h3>Seamless Experience</h3>
                    <p>Your property, managed end-to-end. Just arrive, stay, and feel at home.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Listings Carousel -->
    @include('components.featured-listings', [
        'listings' => $listings ?? collect(),
        'title' => 'Recommended Homes For You',
        'description' => 'Discover our finest investment opportunities across all locations'
    ])

    @include('layouts.footer')

</body>
</html>


