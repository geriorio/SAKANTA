<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $location->name }} - SAKANTA</title>
    
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
            color: #2c3e50;
            background: #F7EFE2;
        }
        
        .area-guide-btn, .ownership-btn {
            font-family: 'Work Sans', sans-serif !important;
            font-weight: 600 !important;
        }

        /* Hero Section */
        .hero-location {
            height: 100vh;
            background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('/images/locations/{{ $location->image }}') center/cover no-repeat;
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
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

        /* Properties Section */
        .properties-section {
            background: #F7EFE2;
            padding: 100px 60px 80px 60px;
        }

        .section-label {
            font-size: 20px;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: #064852;
            margin-bottom: 30px;
            text-align: center;
            font-family: "Work Sans", sans-serif;
        }

        .section-title {
            font-size: 52px;
            font-weight: 400;
            color: #064852;
            margin-bottom: 60px;
            text-align: center;
            line-height: 1.3;
        }

        /* Carousel Container */
        .carousel-container {
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            gap: 20px;
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

        .grid-container {
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

        /* Status Badge */
        .status-badge {
            position: absolute;
            top: 20px;
            left: 20px;
            padding: 8px 16px;
            border-radius: 20px;
            font-family: 'Work Sans', sans-serif;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            z-index: 20;
            box-shadow: 0 2px 8px rgba(0,0,0,0.2);
        }

        .status-badge.coming-soon {
            background: #f39c12;
            color: white;
        }

        .status-badge.sold-out {
            background: #e74c3c;
            color: white;
        }

        .property-card.faded {
            opacity: 0.7;
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
            z-index: 20;
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
            padding: 25px;
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
            font-size: 20px;
            font-weight: 400;
            color: #064852;
            line-height: 1.3;
            flex: 1;
            font-family: 'Esther', 'Georgia', serif;
            padding-right: 10px;
        }

        .property-icon {
            width: 100px;
            height: 100px;
            flex-shrink: 0;
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
            margin-bottom: 10px;
            font-family: 'Work Sans', sans-serif;
        }

        .property-price-text {
            font-size: 20px;
            font-weight: 600;
            color: #064852;
            margin-bottom: 10px;
            font-family: 'Work Sans', sans-serif;
        }

        .property-specs {
            font-size: 12px;
            color: #666;
            margin-bottom: 4px;
            line-height: 1.4;
            font-family: 'Work Sans', sans-serif;
        }

        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 15px;
            margin-top: 60px;
        }

        .page-link {
            color: #064852;
            border: 2px solid #064852;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
        }

        .page-link:hover,
        .page-item.active .page-link {
            background: #064852;
            color: white;
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

        .no-properties {
            grid-column: 1 / -1;
            text-align: center;
            padding: 60px 20px;
        }
        .no-properties p {
            font-size: 18px;
            color: #999;
        }

        /* Area Guide Section */
        .area-guide {
            background: #064852;
            padding: 120px 80px;
            margin-bottom: 80px;
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

        /* Back Button */
        .back-btn {
            display: inline-block;
            padding: 12px 30px;
            border: 2px solid #064852;
            color: #064852;
            text-decoration: none;
            font-size: 13px;
            letter-spacing: 2px;
            text-transform: uppercase;
            font-family: "Work Sans", sans-serif;
            font-weight: 600;
            transition: all 0.3s;
            margin-bottom: 40px;
        }

        .back-btn:hover {
            background: #064852;
            color: #F7EFE2;
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
                flex: 0 0 calc((100% - 40px) / 2);
                min-width: calc((100% - 40px) / 2);
            }

            .property-image {
                height: 250px;
            }

            .grid-container {
                grid-template-columns: repeat(2, 1fr);
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
                font-size: 16px;
            }

            .property-specs {
                font-size: 11px;
            }

            .grid-container {
                grid-template-columns: 1fr;
            }

            .hero-text h1 {
                font-size: 48px;
            }

            .properties-section {
                padding: 60px 30px 40px 30px;
            }

            .section-title {
                font-size: 36px;
            }

            .carousel-wrapper {
                padding: 15px 0;
            }

            .area-guide {
                padding: 80px 40px;
                margin-bottom: 60px;
            }

            .area-guide h2 {
                font-size: 36px;
            }

            .area-guide p {
                font-size: 16px;
            }
        }

        @media (max-width: 480px) {
            .carousel-container {
                gap: 8px;
            }

            .carousel-nav-btn {
                width: 35px;
                height: 35px;
                font-size: 13px;
            }

            .property-card {
                flex: 0 0 100% !important;
                min-width: 100% !important;
            }

            .properties-section {
                padding: 40px 20px 30px 20px;
            }

            .property-image {
                height: 200px;
            }

            .property-name {
                font-size: 14px;
            }

            .property-price-text {
                font-size: 16px;
            }

            .property-info-card {
                padding: 20px;
            }

            .carousel-wrapper {
                padding: 10px 0;
            }

            .area-guide {
                padding: 60px 20px;
                margin-bottom: 50px;
            }

            .area-guide h2 {
                font-size: 28px;
            }

            .area-guide p {
                font-size: 14px;
            }

            .area-guide-btn {
                padding: 12px 30px;
                font-size: 11px;
            }
        }
    </style>
</head>
<body>
    @include('layouts.navbar')

    @include('components.whatsapp-contact')

    <!-- Hero Section -->
    <section class="hero-location">
        <div class="hero-text">
            <small>EXPLORE VILLAS IN</small>
            <h1>{{ $location->name }}</h1>
        </div>
        <div class="scroll-indicator" onclick="document.querySelector('.properties-section').scrollIntoView({ behavior: 'smooth' })" style="cursor: pointer;">↓</div>
    </section>

    <!-- Properties Section -->
    <section class="properties-section">
        <a href="{{ route('listings') }}" class="back-btn">← BACK TO LOCATIONS</a>
        
        <p class="section-label">AVAILABLE PROPERTIES</p>
        <h2 class="section-title">Villas in {{ $location->name }}</h2>

        @if($properties->count() > 0)
        <div class="carousel-container">
            <button class="carousel-nav-btn prev-btn" onclick="slideCarousel(-1)" id="prevBtn" title="Previous">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M15 18l-6-6 6-6"/>
                </svg>
            </button>
            
            <div class="carousel-wrapper">
                <div class="carousel-track" id="carouselTrack">
                    @forelse($properties as $property)
                    <a href="{{ route('property.detail', $property->slug) }}" class="property-card {{ $property->status !== 'available' ? 'faded' : '' }}">
                        <div class="property-image">
                            <img src="{{ asset($property->main_image ?? '/images/villa1.jpg') }}" alt="{{ $property->title }}">
                            
                            @if($property->status === 'coming_soon')
                                <div class="status-badge coming-soon">Coming Soon</div>
                            @elseif($property->status === 'fully_owned')
                                <div class="status-badge sold-out">Sold Out</div>
                            @endif
                            
                            @auth
                            <button class="like-btn {{ Auth::user()->hasLiked($property->id) ? 'liked' : '' }}" 
                                    data-property-id="{{ $property->id}}"
                                    onclick="event.preventDefault(); event.stopPropagation(); toggleLike(this, {{ $property->id }})">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="{{ Auth::user()->hasLiked($property->id) ? '#e74c3c' : 'none' }}" stroke="{{ Auth::user()->hasLiked($property->id) ? '#e74c3c' : '#666' }}" stroke-width="2">
                                    <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                                </svg>
                            </button>
                            @endauth
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
                    </a>
                    @empty
                    @endforelse
                </div>
            </div>
            
            <button class="carousel-nav-btn next-btn" onclick="slideCarousel(1)" id="nextBtn" title="Next">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M9 18l6-6-6-6"/>
                </svg>
            </button>
        </div>
        @else
        <div class="no-properties">
            <p>No properties available in {{ $location->name }} at the moment.</p>
        </div>
        @endif
    </section>

    <!-- Area Guide Section -->
    <section class="area-guide dark-section">
        <h2>Discover the Region's Charm</h2>
        <p>Explore the story behind the region and why it's chosen as one of Sakanta's signature locations.</p>
        <a href="{{ route('location.article', $location->slug) }}" class="area-guide-btn">Discover More</a>
    </section>

    @include('layouts.footer')

    <script>
        let currentSlide = 0;
        const track = document.getElementById('carouselTrack');
        const wrapper = document.querySelector('.carousel-wrapper');
        const cards = document.querySelectorAll('.property-card');
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

        const totalCards = cards.length;

        function getTotalSlides() {
            const cardsPerSlide = getCardsPerSlide();
            return Math.ceil(totalCards / cardsPerSlide);
        }

        function updateCarousel() {
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
    </script>
</body>
</html>


