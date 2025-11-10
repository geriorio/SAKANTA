<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Listings - SAKANTA</title>
    
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
        
        /* Apply Work Sans ONLY to buttons */
        .area-guide-btn, .ownership-btn {
            font-family: 'Work Sans', sans-serif !important;
            font-weight: 600 !important;
        }

        /* Hero Section */
        .hero-listings {
            height: 100vh;
            background: url('/images/herolistings.jpg') center/cover no-repeat;
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .hero-listings::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.4);
        }

        .hero-text {
            position: relative;
            z-index: 2;
            text-align: center;
            color: white;
        }

        .hero-text small {
            font-size: 20px;
            letter-spacing: 4px;
            text-transform: uppercase;
            display: block;
            margin-bottom: 20px;
            opacity: 0.9;
        }

        .hero-text h1 {
            font-size: 82px;
            font-weight: 300;
            letter-spacing: 4px;
            margin-bottom: 60px;
        }

        .scroll-indicator {
            position: relative;
            z-index: 2;
            color: white;
            font-size: 24px;
            animation: bounce 2s infinite;
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

        /* Section 2 - What We Offer */
        .what-we-offer {
            background: #F7EFE2;
            padding: 100px 80px;
            text-align: center;
        }

        .offer-container {
            max-width: 900px;
            margin: 0 auto;
        }

        .offer-icon {
            margin-bottom: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .offer-icon img {
            max-width: 120px;
            height: auto;
            filter: drop-shadow(0 4px 12px rgba(6, 72, 82, 0.25)) brightness(1.05) contrast(1.1);
        }

        .offer-icon svg {
            width: 60px;
            height: 60px;
            stroke: #064852;
            stroke-width: 1.5;
        }

        .offer-label {
            font-size: 20px;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: #064852;
            margin-bottom: 15px;
        }

        .offer-title {
            font-size: 48px;
            font-weight: 400;
            color: #064852;
            margin-bottom: 25px;
            line-height: 1.3;
        }

        .offer-description {
            font-size: 20px;
            line-height: 1.8;
            color: #064852;
            font-family: 'Work Sans', sans-serif;
        }

        /* Section 3 - Properties Grid */
        .properties-grid {
            background: #F7EFE2;
            padding: 80px 80px 120px;
            overflow: visible;
        }

        .properties-section-label {
            font-size: 20px;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: #064852;
            margin-bottom: 30px;
            text-align: center;
            font-family: "Work Sans", sans-serif;
        }

        .properties-section-title {
            font-size: 48px;
            font-weight: 400;
            color: #064852;
            margin-bottom: 60px;
            text-align: center;
            line-height: 1.3;
        }
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }

        .property-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            transition: transform 0.3s;
            position: relative;
            z-index: 1;
            cursor: pointer;
        }

        .property-card:hover {
            transform: translateY(-10px);
            z-index: 10;
        }

        .property-image {
            width: 100%;
            height: 350px;
            position: relative;
            overflow: hidden;
        }

        .property-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Like Button */
        .like-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: white;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            transition: all 0.3s;
            z-index: 10;
        }

        .like-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 20px rgba(0,0,0,0.3);
        }

        .like-btn svg {
            transition: all 0.3s;
        }

        .like-btn.liked svg {
            fill: #e74c3c;
        }

        .property-info-card {
            padding: 30px;
        }

        .property-header {
            display: flex;
            justify-content: space-between;
            align-items: start;
            margin-bottom: 15px;
            position: relative;
            min-height: 30px;
        }

        .property-name {
            font-size: 28px;
            font-weight: 400;
            color: #064852;
            flex: 1;
            padding-right: 10px;
        }

        .property-icon {
            width: 100px;
            height: 100px;
            background-image: url('/images/KV-13.png');
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
            position: absolute;
            top: -35px;
            right: -10px;
        }

        .property-icon svg {
            display: none;
        }

        .property-location-text {
            font-size: 17px;
            color: #5a8aaa;
            margin-bottom: 20px;
        }

        .property-price-text {
            font-size: 30px;
            font-weight: 600;
            color: #064852;
            margin-bottom: 15px;
        }

        .property-specs {
            font-size: 17px;
            color: #064852;
            margin-bottom: 5px;
        }

        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 15px;
            margin-top: 60px;
        }

        .page-btn {
            width: 40px;
            height: 40px;
            border: 2px solid #064852;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #064852;
            text-decoration: none;
            transition: all 0.3s;
        }

        .page-btn:hover,
        .page-btn.active {
            background: #064852;
            color: white;
        }

        /* Section 4 - Area Guide */
        .area-guide {
            background: #064852;
            padding: 120px 80px;
            text-align: center;
        }

        .area-guide h2 {
            font-size: 52px;
            font-weight: 400;
            color: white;
            margin-bottom: 30px;
            line-height: 1.3;
        }

        .area-guide p {
            font-size: 20px;
            color: white;
            margin-bottom: 40px;
            opacity: 0.95;
            font-family: "Work Sans", sans-serif;
        }

        .area-guide-btn {
            display: inline-block;
            padding: 15px 40px;
            border: 2px solid white;
            color: white;
            text-decoration: none;
            font-size: 13px;
            letter-spacing: 2px;
            text-transform: uppercase;
            font-weight: 600;
            transition: all 0.3s;
        }

        .area-guide-btn:hover {
            background: white;
            color: #064852;
        }

        /* Section 5 - Ownership */
        .ownership-section {
            background: #F7EFE2;
            padding: 100px 80px;
            align-items: center;
        }

        .ownership-container {
            max-width: 1150px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 250px 1fr;
            gap: 280px;
            align-items: center;
            justify-items: start;
        }

        .ownership-stamp {
            position: relative;
            width: 100%;
        }

        .ownership-stamp img {
            width: 300px;
            height: auto;
            border-radius: 8px;
            transform: rotate(-8deg);
            transition: transform 0.3s ease;
        }

        .ownership-stamp img:hover {
            transform: rotate(-5deg) scale(1.05);
        }

        .ownership-content {
            max-width: 600px;
            text-align: start;
        }

        .ownership-label {
            font-size: 17px;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: #5a8aaa;
            margin-bottom: 20px;
            font-family: "Work Sans", sans-serif;
        }

        .ownership-content h2 {
            font-size: 34px;
            font-weight: 400;
            line-height: 1.4;
            margin-bottom: 40px;
            color: #064852;
        }

        .ownership-btn {
            display: inline-block;
            padding: 12px 30px;
            border: 2px solid #064852;
            color: #064852;
            text-decoration: none;
            font-size: 13px;
            letter-spacing: 2px;
            text-transform: uppercase;
            transition: all 0.3s;
        }

        .ownership-btn:hover {
            background: #064852;
            color: #F7EFE2;
        }

        /* Location Section */
        .location-section {
            background: #F7EFE2;
            padding: 120px 80px 40px;
            text-align: center;
        }

        .location-section-label {
            font-size: 20px;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: #064852;
            margin-bottom: 30px;
            font-family: "Work Sans", sans-serif;
        }

        .location-section h2 {
            font-size: 52px;
            font-weight: 400;
            color: #064852;
            margin-bottom: 60px;
            line-height: 1.3;
        }

        /* Location Carousel */
        .location-carousel-wrapper {
            position: relative;
            max-width: 1400px;
            margin: 0 auto;
            overflow: hidden;
            padding: 20px 0;
        }

        .location-carousel-container {
            display: flex;
            gap: 30px; /* Default gap - will be overridden by JS on mobile */
            transition: transform 0.5s ease-in-out;
        }

        .location-card {
            /* Width will be set by JavaScript */
            cursor: pointer;
            position: relative;
            height: 500px;
            border-radius: 15px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            flex-shrink: 0; /* Prevent cards from shrinking */
        }

        .location-card:hover {
            transform: translateY(-15px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.2);
        }

        .location-card-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            position: absolute;
            top: 0;
            left: 0;
        }

        .location-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.3);
            z-index: 1;
            transition: background 0.3s ease;
        }

        .location-card:hover::before {
            background: rgba(0, 0, 0, 0.4);
        }

        .location-card-content {
            position: absolute;
            bottom: 30px;
            left: 30px;
            right: 30px;
            z-index: 2;
            color: white;
            text-align: left;
        }

        .location-card-name {
            font-size: 36px;
            font-weight: 400;
            margin-bottom: 10px;
            letter-spacing: 2px;
        }

        .location-card-description {
            font-size: 16px;
            opacity: 0.9;
            font-family: "Work Sans", sans-serif;
        }

        .location-card.active::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: #064852;
            z-index: 3;
        }

        /* Carousel Controls */
        .carousel-controls {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
            margin-top: 50px;
        }

        .carousel-btn {
            width: 50px;
            height: 50px;
            border: 2px solid #064852;
            border-radius: 50%;
            background: white;
            color: #064852;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            transition: all 0.3s ease;
        }

        .carousel-btn:hover {
            background: #064852;
            color: white;
        }

        .carousel-dots {
            display: flex;
            gap: 10px;
        }

        .carousel-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            border: 2px solid #064852;
            background: white;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .carousel-dot.active {
            background: #064852;
        }

        /* No properties message */
        .no-properties {
            grid-column: 1 / -1;
            text-align: center;
            padding: 60px 20px;
        }

        .no-properties p {
            font-size: 18px;
            color: #999;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .grid-container {
                grid-template-columns: repeat(2, 1fr);
            }

            .location-card {
                flex: 0 0 calc((100% - 30px) / 2);
                min-width: calc((100% - 30px) / 2);
            }
        }

        @media (max-width: 768px) {
            .grid-container {
                grid-template-columns: 1fr;
            }

            .location-card {
                flex: 0 0 100% !important;
                min-width: 100% !important;
                height: 400px;
            }

            .hero-text h1 {
                font-size: 48px;
            }

            .location-section,
            .what-we-offer,
            .properties-grid,
            .area-guide,
            .ownership-section {
                padding: 60px 30px !important;
            }

            /* Ownership section - vertical stack */
            .ownership-container {
                grid-template-columns: 1fr !important;
                gap: 40px !important;
                justify-items: center;
                text-align: center;
            }

            .ownership-stamp img {
                width: 200px;
                margin: 0 auto;
                display: block;
            }

            .ownership-content {
                text-align: center;
                max-width: 100%;
            }
        }

        @media (max-width: 480px) {
            .hero-text h1 {
                font-size: 36px;
            }

            .hero-text small {
                font-size: 14px;
                letter-spacing: 2px;
            }

            .location-section,
            .what-we-offer,
            .properties-grid,
            .area-guide,
            .ownership-section {
                padding: 50px 20px !important;
            }

            .location-card {
                height: 350px;
            }

            .location-section h2,
            .what-we-offer h2,
            .area-guide h2,
            .ownership-section h2 {
                font-size: 28px;
            }

            .property-card-title {
                font-size: 20px;
            }

            .area-guide-btn,
            .ownership-btn {
                padding: 12px 25px;
                font-size: 12px;
                width: 100%;
            }

            .ownership-stamp img {
                width: 180px;
            }

            .ownership-content h2 {
                font-size: 28px !important;
            }

            .ownership-label {
                font-size: 14px;
            }
        }

        @media (max-width: 360px) {
            .hero-text h1 {
                font-size: 28px;
            }

            .hero-text small {
                font-size: 12px;
            }

            .location-section,
            .what-we-offer,
            .properties-grid,
            .area-guide,
            .ownership-section {
                padding: 40px 15px !important;
            }

            .location-card {
                height: 300px;
            }

            .location-card-name {
                font-size: 20px;
            }

            .location-card-description {
                font-size: 13px;
            }

            .location-section h2,
            .what-we-offer h2,
            .area-guide h2,
            .ownership-section h2 {
                font-size: 24px;
            }

            .property-card-title {
                font-size: 18px;
            }

            .area-guide-btn,
            .ownership-btn {
                font-size: 11px;
                padding: 10px 20px;
            }

            .ownership-stamp img {
                width: 150px;
            }

            .ownership-content h2 {
                font-size: 24px !important;
                line-height: 1.3;
            }

            .ownership-label {
                font-size: 12px;
                letter-spacing: 2px;
            }
        }
    </style>
</head>
<body>
    @include('layouts.navbar')

    @include('components.whatsapp-contact')

    <!-- Hero Section -->
    <section class="hero-listings">
        <div class="hero-text">
            <small>FIND YOUR SANCTUARY IN</small>
            <h1 id="heroTitle">SAKANTA</h1>
        </div>
        <div class="scroll-indicator" onclick="document.querySelector('.location-section').scrollIntoView({ behavior: 'smooth' })" style="cursor: pointer;">↓</div>
    </section>

    <!-- Location Section -->
    <section class="location-section" id="location-section">
        <p class="location-section-label">EXPLORE DESTINATIONS</p>
        <h2>Choose Your Dream Location</h2>
        
        <div class="location-carousel-wrapper">
            <div class="location-carousel-container" id="locationCarousel">
                @foreach($locations as $location)
                <div class="location-card" data-location-id="{{ $location->id }}" data-location-slug="{{ $location->slug }}" data-location-name="{{ $location->name }}" onclick="selectLocation('{{ $location->slug }}')">
                    <img src="/images/locations/{{ $location->image }}" alt="{{ $location->name }}" class="location-card-image">
                    <div class="location-card-content">
                        <div class="location-card-name">{{ $location->name }}</div>
                        <div class="location-card-description">{{ $location->description }}</div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="carousel-controls">
            <button class="carousel-btn" onclick="slideLocation('prev')">←</button>
            <div class="carousel-dots" id="carouselDots">
                @foreach($locations as $index => $location)
                <div class="carousel-dot {{ $index === 0 ? 'active' : '' }}" onclick="slideToLocation({{ $index }})"></div>
                @endforeach
            </div>
            <button class="carousel-btn" onclick="slideLocation('next')">→</button>
        </div>
    </section>

    <!-- Section 2 - What We Offer -->
    <section class="what-we-offer">
        <div class="offer-container">
            <div class="offer-icon">
                <img src="/images/Icon Test-01.svg" alt="Sakanta Icon" style="width: 80px; height: auto;">
            </div>
            <p class="offer-label">WHAT WE OFFER</p>
            <h2 class="offer-title">A Home That Moves With You</h2>
            <p class="offer-description">
                Each villa comes with transparent ownership rights, flexible usage, & the invitation to belong — anytime.
            </p>
        </div>
    </section>



    <script>
        let currentLocationSlide = 0;
        const totalLocations = {{ count($locations) }};

        // Function to determine cards per view based on screen width
        function getCardsPerView() {
            const screenWidth = window.innerWidth;
            if (screenWidth <= 768) {
                return 1; // Mobile: 1 card
            } else if (screenWidth <= 1024) {
                return 2; // Tablet: 2 cards
            } else {
                return 3; // Desktop: 3 cards
            }
        }

        // Function to get gap based on screen width
        function getGap() {
            const screenWidth = window.innerWidth;
            if (screenWidth <= 768) {
                return 25; // Increased for better spacing
            } else {
                return 30;
            }
        }

        function slideLocation(direction) {
            const cardsPerView = getCardsPerView();
            const maxSlide = Math.max(0, totalLocations - cardsPerView);
            
            // Geser 1 kartu per klik
            if (direction === 'next' && currentLocationSlide < maxSlide) {
                currentLocationSlide++;
            } else if (direction === 'prev' && currentLocationSlide > 0) {
                currentLocationSlide--;
            }
            updateLocationCarousel();
        }

        function slideToLocation(index) {
            const cardsPerView = getCardsPerView();
            const maxSlide = Math.max(0, totalLocations - cardsPerView);
            currentLocationSlide = Math.min(index, maxSlide);
            updateLocationCarousel();
        }

        function updateLocationCarousel() {
            const carousel = document.getElementById('locationCarousel');
            if (!carousel) return;
            
            const wrapper = carousel.parentElement;
            const cardsPerView = getCardsPerView();
            const gap = getGap();
            
            // Set gap on carousel container
            carousel.style.gap = `${gap}px`;
            
            // Reset current slide if out of bounds
            const maxSlide = Math.max(0, totalLocations - cardsPerView);
            if (currentLocationSlide > maxSlide) {
                currentLocationSlide = maxSlide;
            }
            
            // Hitung card width dengan benar memperhitungkan gap
            let cardWidth;
            if (cardsPerView === 1) {
                cardWidth = wrapper.offsetWidth; // Full width for mobile
            } else if (cardsPerView === 2) {
                cardWidth = (wrapper.offsetWidth - gap) / 2;
            } else {
                cardWidth = (wrapper.offsetWidth - (gap * 2)) / 3;
            }
            
            // Set width untuk semua cards
            const cards = carousel.querySelectorAll('.location-card');
            cards.forEach(card => {
                card.style.flex = `0 0 ${cardWidth}px`;
                card.style.minWidth = `${cardWidth}px`;
                card.style.maxWidth = `${cardWidth}px`;
            });
            
            // Offset untuk geser 1 kartu per klik
            const moveDistance = currentLocationSlide * (cardWidth + gap);
            carousel.style.transform = `translateX(-${moveDistance}px)`;

            // Update active dots
            const dots = document.querySelectorAll('.carousel-dot');
            dots.forEach((dot, index) => {
                dot.classList.toggle('active', index === currentLocationSlide);
            });
        }

        function selectLocation(locationSlug) {
            // Redirect ke halaman location menggunakan slug
            window.location.href = `/location/${locationSlug}`;
        }

        // Initialize on load
        document.addEventListener('DOMContentLoaded', function() {
            updateLocationCarousel();
        });

        // Update on resize
        let resizeTimeout;
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(updateLocationCarousel, 250);
        });
    </script>

    <!-- Section 4 - Area Guide -->
    <section class="area-guide dark-section">
        <h2>Not Sure Where To<br>Hang Your Hat?</h2>
        <p>Every place whispers a different kind of peace.</p>
        <a href="{{ route('all.listings') }}" class="area-guide-btn">AREA GUIDES</a>
    </section>

    <!-- Section 5 - Ownership -->
    <section class="ownership-section">
        <div class="ownership-container">
            <div class="ownership-stamp">
                <img src="/images/Stamp-01.png" alt="Sakanta Stamp">
            </div>
            <div class="ownership-content">
                <p class="ownership-label">EXPLORE SAKANTA OWNERSHIP</p>
                <h2>Thoughtfully designed spaces that give you order and flexibility: private nooks to work or rest; communal areas to gather, dine, laugh</h2>
                <a href="{{ route('faq.show', 'become-a-co-owner') }}" class="ownership-btn">LEARN MORE →</a>
            </div>
        </div>
    </section>

    <!-- Featured Listings Carousel -->
    @include('components.featured-listings', [
        'listings' => $listings ?? collect(),
        'title' => 'Hot Listings',
        'description' => 'Discover our finest investment opportunities across all locations'
    ])

    @include('layouts.footer')
    
    <script>
        // AJAX Like/Unlike Function
        function toggleLike(button, propertyId) {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            const svg = button.querySelector('svg');
            
            fetch(`/property/${propertyId}/like`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({})
            })
            .then(response => response.json())
            .then(data => {
                if (data.liked) {
                    button.classList.add('liked');
                    svg.setAttribute('fill', '#e74c3c');
                    svg.setAttribute('stroke', '#e74c3c');
                } else {
                    button.classList.remove('liked');
                    svg.setAttribute('fill', 'none');
                    svg.setAttribute('stroke', '#666');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Please sign in to like properties');
            });
        }

        // Handle anchor scroll with offset for locationCarousel
        document.addEventListener('DOMContentLoaded', function() {
            if (window.location.hash === '#locationCarousel') {
                const element = document.getElementById('locationCarousel');
                if (element) {
                    setTimeout(() => {
                        element.scrollIntoView({ behavior: 'smooth', block: 'start' });
                        // Scroll up a bit more (100px offset)
                        window.scrollBy(0, -100);
                    }, 100);
                }
            }
        });
    </script>
</body>
</html>


