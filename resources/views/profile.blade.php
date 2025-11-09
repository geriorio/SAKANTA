<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile - Sakanta</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <style>
        @font-face {
            font-family: 'Esther';
            src: url('/fonts/Esther-Regular.otf') format('opentype');
            font-weight: normal;
            font-style: normal;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            background: #F7EFE2;
        }
        
        /* Profile Header */
        .profile-header {
            background: #1a1a1a;
            padding: 140px 40px 80px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .profile-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('/images/hero.jpg') center/cover;
            opacity: 0.3;
        }
        
        .profile-header::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(0,0,0,0.7) 0%, rgba(0,0,0,0.5) 100%);
        }
        
        .profile-content {
            position: relative;
            z-index: 1;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .avatar-container {
            margin-bottom: 25px;
        }
        
        .avatar {
            width: 140px;
            height: 140px;
            border-radius: 50%;
            border: 6px solid white;
            box-shadow: 0 8px 30px rgba(0,0,0,0.3);
            object-fit: cover;
            display: inline-block;
        }
        
        .avatar-placeholder {
            width: 140px;
            height: 140px;
            border-radius: 50%;
            background: white;
            color: #064852;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 56px;
            font-weight: 700;
            border: 6px solid white;
            box-shadow: 0 8px 30px rgba(0,0,0,0.3);
        }
        
        .profile-name {
            font-size: 42px;
            font-weight: 700;
            color: white;
            margin: 0 0 12px 0;
            letter-spacing: 1px;
            font-family: 'Esther', serif;
        }
        
        .profile-email {
            font-size: 18px;
            color: rgba(255,255,255,0.9);
            margin-bottom: 30px;
            font-family: 'Work Sans', sans-serif;
        }
        
        .logout-btn {
            background: rgba(255,255,255,0.15);
            color: white;
            border: 2px solid white;
            padding: 14px 35px;
            border-radius: 50px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            font-family: 'Work Sans', sans-serif;
        }
        
        .logout-btn:hover {
            background: white;
            color: #064852;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255,255,255,0.3);
        }
        
        /* Liked Properties Section */
        .liked-section {
            padding: 80px 40px;
            max-width: 1400px;
            margin: 0 auto;
        }
        
        .section-title {
            text-align: center;
            margin-bottom: 60px;
        }
        
        .section-title h2 {
            font-size: 48px;
            font-weight: 700;
            color: #064852;
            margin-bottom: 15px;
            letter-spacing: 1px;
            font-family: 'Esther', serif;
        }
        
        .section-title p {
            font-size: 18px;
            color: #666;
            font-family: 'Work Sans', sans-serif;
        }
        
        /* Property Grid - CAROUSEL */
        .carousel-container {
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            gap: 20px;
            padding: 20px 0;
        }

        .carousel-wrapper {
            flex: 1;
            overflow: hidden;
            position: relative;
            z-index: 1;
            padding: 20px 0;
            border-radius: 0;
        }

        .carousel-track {
            display: flex;
            gap: 30px;
            transition: transform 0.5s ease;
            margin-top: -20px;
            margin-bottom: -20px;
            padding: 20px 0;
        }
        
        .property-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            margin-bottom: 60px;
        }
        
        .property-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1), box-shadow 0.3s;
            position: relative;
            z-index: 1;
            cursor: pointer;
            flex: 0 0 calc((100% - 60px) / 3);
            min-width: calc((100% - 60px) / 3);
            height: fit-content;
            text-decoration: none;
            color: inherit;
            display: flex;
            flex-direction: column;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        
        .property-card:hover {
            transform: translateY(-12px);
            z-index: 100;
            box-shadow: 0 15px 30px rgba(0,0,0,0.15);
        }

        /* Carousel Navigation Buttons */
        .carousel-nav-btn {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: #064852;
            border: none;
            color: white;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
            flex-shrink: 0;
            font-size: 20px;
        }

        .carousel-nav-btn:hover {
            background: rgba(168, 198, 143, 1);
            transform: scale(1.1);
        }

        .carousel-nav-btn:disabled {
            background: #ccc;
            cursor: not-allowed;
            transform: scale(1);
        }
        
        .property-image {
            width: 100%;
            height: 300px;
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
        
        /* Status Badge */
        .status-badge {
            position: absolute;
            top: 20px;
            left: 20px;
            padding: 8px 16px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 600;
            font-family: 'Work Sans', sans-serif;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            z-index: 5;
        }

        .status-badge.coming-soon {
            background: rgba(255, 193, 7, 0.95);
            color: #1a1a1a;
        }

        .status-badge.sold-out {
            background: rgba(220, 53, 69, 0.95);
            color: white;
        }

        /* Faded card untuk non-available properties */
        .property-card.faded {
            opacity: 0.6;
        }

        .property-card.faded:hover {
            opacity: 0.8;
        }
        
        .property-info-card {
            padding: 25px;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
        }
        
        .property-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 12px;
            gap: 10px;
            position: relative;
            min-height: 24px;
        }
        
        .property-name {
            font-size: 18px;
            font-weight: 400;
            color: #064852;
            font-family: 'Esther', serif;
            line-height: 1.3;
            margin: 0;
            flex: 1;
            padding-right: 10px;
        }
        
        .property-icon {
            width: 100px;
            height: 100px;
            flex-shrink: 0;
            color: #064852;
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
            font-size: 13px;
            color: #5a8aaa;
            margin: 0 0 8px 0;
            font-family: 'Work Sans', sans-serif;
        }
        
        .property-price-text {
            font-size: 18px;
            font-weight: 600;
            color: #064852;
            margin: 0 0 8px 0;
            font-family: 'Work Sans', sans-serif;
        }
        
        .property-specs {
            font-size: 12px;
            color: #064852;
            margin: 0 0 3px 0;
            font-family: 'Work Sans', sans-serif;
        }
        
        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 100px 20px;
        }
        
        .empty-state svg {
            margin: 0 auto 35px;
            opacity: 0.3;
        }
        
        .empty-state h3 {
            font-size: 28px;
            font-weight: 600;
            color: #999;
            margin-bottom: 18px;
            font-family: 'Esther', serif;
        }
        
        .empty-state p {
            font-size: 17px;
            color: #999;
            margin-bottom: 35px;
            font-family: 'Work Sans', sans-serif;
        }
        
        .browse-btn {
            display: inline-block;
            background: #064852;
            color: white;
            padding: 16px 40px;
            border-radius: 50px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            transition: all 0.3s;
            letter-spacing: 1.2px;
            text-transform: uppercase;
            font-family: 'Work Sans', sans-serif;
        }
        
        .browse-btn:hover {
            background: #a8c68f;
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(44,95,127,0.3);
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .carousel-container {
                gap: 15px;
            }

            .carousel-track {
                gap: 20px;
            }

            .property-card {
                flex: 0 0 calc((100% - 20px) / 2) !important;
                min-width: calc((100% - 20px) / 2) !important;
            }

            .property-image {
                height: 250px;
            }

            .liked-section {
                padding: 80px 50px;
            }
        }

        @media (max-width: 768px) {
            .carousel-container {
                gap: 12px;
            }

            .carousel-track {
                gap: 15px;
            }

            .carousel-nav-btn {
                width: 40px;
                height: 40px;
                font-size: 16px;
            }

            .property-card {
                flex: 0 0 100% !important;
                min-width: 100% !important;
            }

            .property-image {
                height: 220px;
            }

            .property-name {
                font-size: 18px;
            }

            .property-location-text {
                font-size: 16px;
            }

            .property-price-text {
                font-size: 22px;
            }

            .property-specs {
                font-size: 11px;
            }

            .liked-section {
                padding: 60px 30px;
            }

            .section-title h2 {
                font-size: 40px;
            }
        }

        @media (max-width: 480px) {
            .profile-header {
                padding: 80px 20px 60px;
            }

            .profile-name {
                font-size: 28px;
            }

            .profile-email {
                font-size: 14px;
            }

            .liked-section {
                padding: 50px 20px;
            }

            .section-title h2 {
                font-size: 32px;
            }

            .section-title p {
                font-size: 16px;
            }

            .carousel-container {
                gap: 10px;
            }

            .carousel-track {
                gap: 12px;
            }

            .property-image {
                height: 200px;
            }

            .property-name {
                font-size: 15px;
            }

            .property-location-text {
                font-size: 14px;
            }

            .property-price-text {
                font-size: 18px;
            }

            .property-specs {
                font-size: 10px;
            }

            .carousel-nav-btn {
                width: 36px;
                height: 36px;
                font-size: 14px;
            }

            .property-info-card {
                padding: 20px;
            }
        }

        @media (max-width: 360px) {
            .carousel-container {
                gap: 8px;
            }

            .carousel-track {
                gap: 10px;
            }

            .carousel-nav-btn {
                width: 32px;
                height: 32px;
                font-size: 12px;
            }

            .property-image {
                height: 180px;
            }

            .property-name {
                font-size: 14px;
            }

            .property-price-text {
                font-size: 16px;
            }

            .property-specs {
                font-size: 9px;
            }

            .section-title h2 {
                font-size: 28px;
            }

            .section-title p {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>

    @include('layouts.navbar')

    <!-- Profile Header -->
    <section class="profile-header">
        <div class="profile-content">
            <div class="avatar-container">
                @if($user->avatar)
                    <img src="{{ $user->avatar }}" alt="{{ $user->name }}" class="avatar">
                @else
                    <div class="avatar-placeholder">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </div>
                @endif
            </div>

            <h1 class="profile-name">{{ $user->name }}</h1>
            <p class="profile-email">{{ $user->email }}</p>

            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="logout-btn">Sign Out</button>
            </form>
        </div>
    </section>

    <!-- Liked Properties Section -->
    <section class="liked-section light-section">
        <div class="section-title">
            <h2>My Liked Properties</h2>
            <p>Properties you've saved for later</p>
        </div>

        @if($likedProperties->count() > 0)
            <div class="carousel-container">
                <button class="carousel-nav-btn prev-btn" onclick="slideCarousel(-1)" id="prevBtn" title="Previous">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M15 18l-6-6 6-6"/>
                    </svg>
                </button>
                
                <div class="carousel-wrapper">
                    <div class="carousel-track" id="carouselTrack">
                        @foreach($likedProperties as $property)
                            <div class="property-card {{ $property->status !== 'available' ? 'faded' : '' }}" style="cursor: pointer;" onclick="window.location.href='/property/{{ $property->slug }}'">
                                <div class="property-image">
                                    <img src="{{ asset($property->main_image ?? '/images/villa1.jpg') }}" alt="{{ $property->title }}">
                                    
                                    @if($property->status === 'coming_soon')
                                        <div class="status-badge coming-soon">Coming Soon</div>
                                    @elseif($property->status === 'fully_owned')
                                        <div class="status-badge sold-out">Sold Out</div>
                                    @endif
                                    
                                    <button class="like-btn liked" 
                                            data-property-id="{{ $property->id}}"
                                            onclick="event.stopPropagation(); toggleLike(this, {{ $property->id }})">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="#e74c3c" stroke="#e74c3c" stroke-width="2">
                                            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                                        </svg>
                                    </button>
                                </div>
                                <div class="property-info-card">
                                    <div class="property-header">
                                        <h3 class="property-name">{{ $property->title }}</h3>
                                        <div class="property-icon"></div>
                                    </div>
                                    <p class="property-location-text">{{ $property->location->name ?? $property->city }}</p>
                                    <p class="property-price-text">{{ $property->formatted_price }}</p>
                                    <p class="property-specs">{{ $property->ownership ?? '1/4 Ownership' }}</p>
                                    <p class="property-specs" style="display: flex; align-items: center; gap: 6px; flex-wrap: wrap; font-size: 12px; color: #666; font-family: 'Work Sans', sans-serif;">
                                        <span style="display: inline-flex; align-items: center; gap: 4px;">
                                            <img src="{{ asset('images/icons/bedroom.png') }}" alt="Bedroom" style="width: 25px; height: 25px; object-fit: contain;">
                                            {{ $property->bedrooms }}
                                        </span>
                                        <span style="color: #666; opacity: 0.4; font-weight: 300;">|</span>
                                        <span style="display: inline-flex; align-items: center; gap: 4px;">
                                            <img src="{{ asset('images/icons/bathroom.png') }}" alt="Bathroom" style="width: 25px; height: 25px; object-fit: contain;">
                                            {{ $property->bathrooms }}
                                        </span>
                                        <span style="color: #666; opacity: 0.4; font-weight: 300;">|</span>
                                        <span style="display: inline-flex; align-items: center; gap: 4px;">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#064852" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M3 21h18"/>
                                                <path d="M5 21V7l8-4v18"/>
                                                <path d="M19 21V11l-6-4"/>
                                                <rect x="7" y="10" width="2" height="2"/>
                                                <rect x="7" y="14" width="2" height="2"/>
                                                <rect x="7" y="18" width="2" height="2"/>
                                                <rect x="15" y="14" width="2" height="2"/>
                                                <rect x="15" y="18" width="2" height="2"/>
                                            </svg>
                                            {{ number_format($property->building_area, 0) }} FT²
                                        </span>
                                        <span style="color: #666; opacity: 0.4; font-weight: 300;">|</span>
                                        <span style="display: inline-flex; align-items: center; gap: 4px;">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#064852" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                <rect x="3" y="3" width="18" height="18" rx="1" stroke-dasharray="2,2"/>
                                                <path d="M3 3l-2 -2M21 3l2 -2M3 21l-2 2M21 21l2 2"/>
                                            </svg>
                                            {{ number_format($property->land_area, 0) }} FT²
                                        </span>
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                
                <button class="carousel-nav-btn next-btn" onclick="slideCarousel(1)" id="nextBtn" title="Next">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M9 18l6-6-6-6"/>
                    </svg>
                </button>
            </div>

            @if($likedProperties->hasPages())
                <div style="display: flex; justify-content: center; margin-top: 40px;">
                    {{ $likedProperties->links() }}
                </div>
            @endif

        @else
            <div class="empty-state">
                <svg width="140" height="140" viewBox="0 0 24 24" fill="none" stroke="#ccc" stroke-width="1.5">
                    <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                </svg>
                <h3>No Favorites Yet</h3>
                <p>Start exploring and save properties you love!</p>
                <a href="{{ route('listings') }}" class="browse-btn">Browse Properties</a>
            </div>
        @endif
    </section>

    <script>
        let currentSlide = 0;
        const track = document.getElementById('carouselTrack');
        const wrapper = document.querySelector('.carousel-wrapper');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');

        // Function to determine cards per slide based on screen width
        function getCardsPerSlide() {
            const screenWidth = window.innerWidth;
            if (screenWidth <= 768) {
                return 1; // Mobile: 1 card per slide
            } else if (screenWidth <= 1024) {
                return 2; // Tablet: 2 cards per slide
            } else {
                return 3; // Desktop: 3 cards per slide
            }
        }

        // Function to get gap based on screen width
        function getGap() {
            const screenWidth = window.innerWidth;
            if (screenWidth <= 480) {
                return 12;
            } else if (screenWidth <= 768) {
                return 15;
            } else if (screenWidth <= 1024) {
                return 20;
            } else {
                return 30;
            }
        }

        function getCardCount() {
            return document.querySelectorAll('.property-card').length;
        }

        function getTotalSlides() {
            const totalCards = getCardCount();
            const cardsPerSlide = getCardsPerSlide();
            return Math.ceil(totalCards / cardsPerSlide);
        }

        function updateCarousel() {
            const totalCards = getCardCount();
            const cards = document.querySelectorAll('.property-card');
            
            if (totalCards === 0 || !wrapper) return;

            const cardsPerSlide = getCardsPerSlide();
            const gap = getGap();
            const totalSlides = getTotalSlides();

            // Reset current slide if out of bounds
            if (currentSlide >= totalSlides) {
                currentSlide = totalSlides - 1;
            }
            if (currentSlide < 0) {
                currentSlide = 0;
            }

            // Hitung card width berdasarkan wrapper width
            const wrapperWidth = wrapper.offsetWidth;
            let cardWidth;
            
            if (cardsPerSlide === 1) {
                cardWidth = wrapperWidth; // Full width for mobile
            } else if (cardsPerSlide === 2) {
                cardWidth = (wrapperWidth - gap) / 2;
            } else {
                cardWidth = (wrapperWidth - (gap * 2)) / 3;
            }
            
            // Set width untuk semua cards
            cards.forEach(card => {
                card.style.width = cardWidth + 'px';
                card.style.minWidth = cardWidth + 'px';
                card.style.flexBasis = cardWidth + 'px';
            });

            // Update gap di track
            track.style.gap = gap + 'px';

            // Hitung offset untuk slide saat ini
            const slideWidth = cardWidth + gap;
            const offset = -currentSlide * slideWidth * cardsPerSlide;
            
            track.style.transform = `translateX(${offset}px)`;

            // Update button states
            if (prevBtn) prevBtn.disabled = currentSlide === 0;
            if (nextBtn) nextBtn.disabled = currentSlide === totalSlides - 1;
        }

        function slideCarousel(direction) {
            const cardsPerSlide = getCardsPerSlide();
            const totalSlides = getTotalSlides();
            const newSlide = currentSlide + direction;
            
            if (newSlide >= 0 && newSlide < totalSlides) {
                currentSlide = newSlide;
                updateCarousel();
            }
        }

        // Initialize carousel saat page load
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', function() {
                setTimeout(updateCarousel, 100);
            });
        } else {
            setTimeout(updateCarousel, 100);
        }

        // Update saat window resize dengan reset slide position
        let resizeTimeout;
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(() => {
                // Reset slide position on significant resize to prevent overflow
                const newTotalSlides = getTotalSlides();
                if (currentSlide >= newTotalSlides && newTotalSlides > 0) {
                    currentSlide = Math.max(0, newTotalSlides - 1);
                }
                updateCarousel();
            }, 250);
        });

        function toggleLike(button, propertyId) {
            const card = button.closest('.property-card');
            const svg = button.querySelector('svg');
            const path = svg.querySelector('path');
            
            fetch(`/property/${propertyId}/like`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    if (data.liked) {
                        // Liked
                        button.classList.add('liked');
                        svg.setAttribute('fill', '#e74c3c');
                        svg.setAttribute('stroke', '#e74c3c');
                    } else {
                        // Unliked - remove card with animation from profile
                        button.classList.remove('liked');
                        card.style.opacity = '0';
                        card.style.transform = 'scale(0.9) translateY(20px)';
                        card.style.transition = 'all 0.4s ease';
                        
                        setTimeout(() => {
                            card.remove();
                            
                            // Update carousel after card removal
                            const remainingCards = document.querySelectorAll('.property-card').length;
                            if (remainingCards === 0) {
                                location.reload();
                            } else {
                                // Recalculate total slides with remaining cards
                                const newTotalCards = remainingCards;
                                const newTotalSlides = Math.ceil(newTotalCards / cardsPerSlide);
                                
                                // If current slide is beyond available slides, go back one slide
                                if (currentSlide >= newTotalSlides) {
                                    currentSlide = Math.max(0, newTotalSlides - 1);
                                }
                                
                                // Update carousel
                                updateCarousel();
                            }
                        }, 400);
                    }
                }
            })
            .catch(error => console.error('Error:', error));
        }
    </script>

    @include('layouts.footer')

    @include('components.whatsapp-contact')
</body>
</html>


