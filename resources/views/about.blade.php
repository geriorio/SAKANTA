<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>About Us - SAKANTA</title>
    
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
        }

        /* Hero Section */
        .hero-about {
            height: 100vh;
            background: url('/images/hero2.jpg') center/cover no-repeat;
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .hero-about::before {
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
            font-family: 'Work Sans', sans-serif;
            font-weight: 500;
        }

        .hero-text h1 {
            font-size: 82px;
            font-weight: 300;
            letter-spacing: 4px;
            margin-bottom: 30px;
        }

        .hero-text p {
            font-size: 22px;
            max-width: 700px;
            margin: 0 auto;
            line-height: 1.6;
            opacity: 0.95;
            font-family: 'Work Sans', sans-serif;
            font-weight: 400;
        }

        .scroll-indicator {
            position: relative;
            z-index: 2;
            color: white;
            font-size: 24px;
            animation: bounce 2s infinite;
            margin-top: 60px;
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

        /* Content Sections */
        .content-section {
            background: #F7EFE2;
            padding: 140px 60px;
        }

        .content-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .content-row {
            margin: 140px auto 140px auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 80px;
            align-items: center;
        }

        .content-row:first-child {
            margin-top: 0;
        }

        .content-row:last-child {
            margin-bottom: 0;
        }

        .content-row.reverse {
            direction: rtl;
        }

        .content-row.reverse > * {
            direction: ltr;
        }

        .content-image {
            width: 100%;
            height: 500px;
            border-radius: 20px;
            overflow: hidden;
            position: relative;
        }

        .content-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .content-image::before {
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

        .content-text small {
            font-size: 14px;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: #5a8aaa;
            display: block;
            margin-bottom: 20px;
            font-family: 'Work Sans', sans-serif;
            font-weight: 600;
        }

        .content-text h2 {
            font-size: 42px;
            font-weight: 400;
            color: #064852;
            margin-bottom: 25px;
            line-height: 1.3;
            font-family: 'Esther', serif;
        }

        .content-text p {
            font-size: 17px;
            line-height: 1.8;
            color: #064852;
            font-family: 'Work Sans', sans-serif;
            font-weight: 400;
            margin-bottom: 15px;
        }

        /* CTA Section */
        .cta-section {
            background: #064852;
            padding: 80px 0 120px 0;
            text-align: center;
            color: white;
        }

        .cta-container {
            max-width: 900px;
            margin: 0 auto;
            padding: 0 80px;
        }

        .cta-container:first-child {
            padding-top: 40px;
            padding-bottom: 20px;
        }

        .cta-container h2 {
            font-size: 52px;
            font-weight: 400;
            margin-bottom: 30px;
            line-height: 1.3;
        }

        .cta-container p {
            font-size: 20px;
            margin-bottom: 40px;
            opacity: 0.95;
            font-family: 'Work Sans', sans-serif;
            font-weight: 400;
        }

        .cta-btn {
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
            font-family: 'Work Sans', sans-serif;
            margin-top: 20px;
            margin-bottom: 60px;
        }

        .cta-btn:hover {
            background: white;
            color: #064852;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .content-section {
                padding: 80px 40px;
            }

            .content-row {
                grid-template-columns: 1fr;
                gap: 50px;
                margin-bottom: 80px;
            }

            .content-row.reverse {
                direction: ltr;
            }

            .content-image {
                height: 400px;
            }

            .content-text h2 {
                font-size: 36px;
            }
        }

        @media (max-width: 768px) {
            .hero-text h1 {
                font-size: 48px;
            }

            .hero-text p {
                font-size: 18px;
            }

            .content-section {
                padding: 60px 30px;
            }

            .content-row {
                gap: 40px;
                margin-bottom: 60px;
            }

            .content-image {
                height: 300px;
            }

            .content-text h2 {
                font-size: 32px;
            }

            .content-text p {
                font-size: 16px;
            }

            .cta-container h2 {
                font-size: 36px;
            }

            .cta-container p {
                font-size: 16px;
            }
        }

        @media (max-width: 480px) {
            .hero-text h1 {
                font-size: 36px;
            }

            .content-section {
                padding: 40px 20px;
            }

            .content-image {
                height: 250px;
            }

            .content-text small {
                font-size: 12px;
            }

            .content-text h2 {
                font-size: 28px;
            }

            .content-text p {
                font-size: 15px;
            }
        }
    </style>
</head>
<body>
    @include('layouts.navbar')

    @include('components.whatsapp-contact')

    <!-- Hero Section -->
    <section class="hero-about">
        <div class="hero-text">
            <small>DISCOVER</small>
            <h1>About Sakanta</h1>
            <p>Where shared ownership meets unparalleled luxury, creating a new way to experience and invest in premium properties.</p>
        </div>
        <div class="scroll-indicator" onclick="document.querySelector('.content-section').scrollIntoView({ behavior: 'smooth' })" style="cursor: pointer;">↓</div>
    </section>

    <!-- Content Sections -->
    <section class="content-section">
        <div class="content-container">
            <!-- Row 1 - Image Left -->
            <div class="content-row">
                <div class="content-image">
                    <img src="/images/homevilla.jpg" alt="Sakanta Villa">
                </div>
                <div class="content-text">
                    <small>About Sakanta</small>
                    <h2>Where luxury meets belonging</h2>
                    <p>Sakanta redefines second-home ownership in Indonesia.
                    We make it possible for up to <b>1 in 10 co-owners</b> to share ownership of a luxury home across the Islands of Gods — combining modern elegance with the warmth of Indonesian hospitality.
                    <br><br>Because true luxury isn’t about having more — it’s about living better, together.
                    </p>
                </div>
            </div>

            <!-- Row 2 - Image Right -->
            <div class="content-row reverse">
                <div class="content-image">
                    <img src="/images/homevilla2.jpg" alt="Sakanta Ownership">
                </div>
                <div class="content-text">
                    <small>Our Mission</small>
                    <h2>Making dreams livable</h2>
                    <p>We believe luxury living should be within reach.
                    Through co-ownership, Sakanta opens new doors — reducing high entry barriers, adding flexibility through share resale, and ensuring every home is used and enjoyed, not left empty. <br><br>We’re here to democratize luxury and elevate life’s quality, one home at a time.
                    </p>
                </div>
            </div>

            <!-- Row 3 - Image Left -->
            <div class="content-row">
                <div class="content-image">
                    <img src="/images/Image-05.png" alt="Luxury Living">
                </div>
                <div class="content-text">
                    <small>Our Vision</small>
                    <h2>Elevating life’s possibilities</h2>
                    <p>Sakanta imagines a future where families from around the world can own, share, and celebrate homes across Indonesia’s most beloved destinations — from Bali’s ocean breeze to Lombok’s serene hills. <br><br>A life where every stay brings connection, comfort, and meaning.
                    </p>
                </div>
            </div>

            <!-- Row 4 - Image Right -->
            <div class="content-row reverse">
                <div class="content-image">
                    <img src="/images/hero2.jpg" alt="Flexible Ownership">
                </div>
                <div class="content-text">
                    <small>Our People</small>
                    <h2>Meet the minds behind the homes</h2>
                    <p>We’re a team of builders, thinkers, and dreamers inspired by Indonesia’s natural beauty and cultural grace.
                    From hospitality to technology, every member of Sakanta shares one mission — to craft ownership experiences that feel effortless, personal, and deeply human.</p>
                </div>
            </div>

            <!-- Row 5 - Image Left -->
            <div class="content-row">
                <div class="content-image">
                    <img src="/images/hero.jpg" alt="Community">
                </div>
                <div class="content-text">
                    <small>Our Journey</small>
                    <h2>From dream to destination</h2>
                    <p>It all began with one question: Why should second-home ownership be out of reach for most people?
                    That question shaped Sakanta — a movement to make owning a dream home more possible and purposeful. <br><br>Every family that joins Sakanta becomes part of this story — creating shared memories, lasting connections, and a new way of living beautifully.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section with Carousel -->
    <section class="cta-section dark-section">
        <div class="cta-container">
            <h2>Ready to Own Your<br>Share of Paradise?</h2>
            <p>Join hundreds of satisfied owners who have discovered a smarter way to invest in luxury properties.</p>
        </div>
            
        <!-- Carousel Cards (outside container for full width) -->
        @if($listings->count() > 0)
        <div class="carousel-container-cta">
                <button class="carousel-nav-btn-cta prev-btn-cta" onclick="slideCarouselCTA(-1)" id="prevBtnCTA" title="Previous">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M15 18l-6-6 6-6"/>
                    </svg>
                </button>
                
                <div class="carousel-wrapper-cta">
                    <div class="carousel-track-cta" id="carouselTrackCTA">
                        @forelse($listings as $property)
                        <a href="{{ route('property.detail', $property->slug) }}" class="property-card-cta {{ $property->status !== 'available' ? 'faded' : '' }}">
                            <div class="property-image-cta">
                                <img src="{{ asset($property->main_image ?? '/images/villa1.jpg') }}" alt="{{ $property->title }}">
                                
                                @if($property->status === 'coming_soon')
                                    <div class="status-badge coming-soon">Coming Soon</div>
                                @elseif($property->status === 'fully_owned')
                                    <div class="status-badge sold-out">Sold Out</div>
                                @endif
                                
                                @auth
                                <button class="like-btn-cta {{ Auth::user()->hasLiked($property->id) ? 'liked' : '' }}" 
                                        data-property-id="{{ $property->id}}"
                                        onclick="event.preventDefault(); event.stopPropagation(); toggleLikeCTA(this, {{ $property->id }})">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="{{ Auth::user()->hasLiked($property->id) ? '#e74c3c' : 'none' }}" stroke="{{ Auth::user()->hasLiked($property->id) ? '#e74c3c' : '#666' }}" stroke-width="2">
                                        <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                                    </svg>
                                </button>
                                @endauth
                            </div>
                            <div class="property-info-card-cta">
                                <div class="property-header-cta">
                                    <h3 class="property-name-cta">
                                        {{ $property->title }}
                                        @if($property->shares_booked)
                                            <span style="display: inline-block; margin-left: 8px; padding: 4px 10px; background: #064852; color: white; font-size: 10px; font-weight: 600; border-radius: 12px; text-transform: uppercase; letter-spacing: 0.5px; font-family: 'Work Sans', sans-serif;">
                                                {{ $property->shares_booked }} Committed
                                            </span>
                                        @endif
                                    </h3>
                                    <div class="property-icon-cta"></div>
                                </div>
                                <p class="property-location-text-cta">{{ $property->location->name ?? $property->city }}</p>
                                <p class="property-price-text-cta">{{ $property->formatted_price }}</p>
                                <p class="property-specs-cta">{{ $property->ownership ?? '1/4 Ownership' }}</p>
                                <p class="property-specs-cta" style="display: flex; align-items: center; gap: 6px; flex-wrap: wrap; font-size: 12px; color: #666; font-family: 'Work Sans', sans-serif;">
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
                                        {{ number_format($property->building_area, 0) }} m²
                                    </span>
                                    <span style="color: #666; opacity: 0.4; font-weight: 300;">|</span>
                                    <span style="display: inline-flex; align-items: center; gap: 4px;">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#064852" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                            <rect x="3" y="3" width="18" height="18" rx="1" stroke-dasharray="2,2"/>
                                            <path d="M3 3l-2 -2M21 3l2 -2M3 21l-2 2M21 21l2 2"/>
                                        </svg>
                                        {{ number_format($property->land_area, 0) }} m²
                                    </span>
                                </p>
                            </div>
                        </a>
                        @empty
                        @endforelse
                    </div>
                </div>
                
                <button class="carousel-nav-btn-cta next-btn-cta" onclick="slideCarouselCTA(1)" id="nextBtnCTA" title="Next">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M9 18l6-6-6-6"/>
                    </svg>
                </button>
            </div>
            @endif
        
        <div class="cta-container">
            <a href="{{ route('all.listings') }}" class="cta-btn">EXPLORE HOMES</a>
        </div>
    </section>

    <style>
        /* Carousel in CTA Section - EXACT COPY FROM featured-listings component */
        .carousel-container-cta {
            max-width: 100%;
            width: 100%;
            margin: 50px 0;
            display: flex;
            align-items: center;
            gap: 20px;
            padding: 0 80px;
        }

        .carousel-wrapper-cta {
            flex: 1;
            overflow: hidden;
            position: relative;
            z-index: 1;
            padding: 20px 0;
            border-radius: 0;
        }

        .carousel-track-cta {
            display: flex;
            gap: 30px;
            transition: transform 0.5s ease;
            margin-top: -20px;
            margin-bottom: -20px;
            padding: 20px 0;
        }

        .property-card-cta {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1), box-shadow 0.3s;
            position: relative;
            z-index: 1;
            cursor: pointer;
            /* Width will be set by JavaScript - responsive */
            flex-shrink: 0;
            height: fit-content;
            text-decoration: none;
            color: inherit;
            display: flex;
            flex-direction: column;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .property-card-cta:hover {
            transform: translateY(-12px);
            z-index: 100;
            box-shadow: 0 15px 30px rgba(0,0,0,0.15);
        }

        .property-image-cta {
            width: 100%;
            height: 300px;
            position: relative;
            overflow: hidden;
        }

        .property-image-cta img {
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

        .property-card-cta.faded {
            opacity: 0.7;
        }

        /* Like Button */
        .like-btn-cta {
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

        .like-btn-cta:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 20px rgba(0,0,0,0.3);
        }

        .like-btn-cta svg {
            transition: all 0.3s;
        }

        .like-btn-cta.liked svg {
            fill: #e74c3c;
        }

        .property-info-card-cta {
            padding: 25px;
            text-align: left;
        }

        .property-header-cta {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 12px;
            gap: 10px;
            text-align: left;
            position: relative;
            min-height: 24px;
        }

        .property-name-cta {
            font-size: 20px;
            font-weight: 400;
            color: #064852;
            margin: 0;
            line-height: 1.3;
            font-family: 'Esther', serif;
            text-align: left;
            flex: 1;
            padding-right: 10px;
        }

        .property-icon-cta {
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

        .property-icon-cta svg {
            display: none;
        }

        .property-location-text-cta {
            font-size: 13px;
            color: #5a8aaa;
            margin: 0 0 10px 0;
            font-family: 'Work Sans', sans-serif;
            text-align: left;
        }

        .property-price-text-cta {
            font-size: 20px;
            font-weight: 600;
            color: #064852;
            margin: 0 0 10px 0;
            font-family: 'Work Sans', sans-serif;
            text-align: left;
        }

        .property-specs-cta {
            font-size: 12px;
            color: #666;
            margin: 0 0 4px 0;
            font-family: 'Work Sans', sans-serif;
            text-align: left;
            line-height: 1.4;
        }

        /* Carousel Navigation Buttons */
        .carousel-nav-btn-cta {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: white;
            border: 2px solid rgba(255,255,255,0.3);
            color: #064852;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
            flex-shrink: 0;
            font-size: 20px;
        }

        .carousel-nav-btn-cta:hover {
            background: rgba(255,255,255,0.95);
            transform: scale(1.1);
        }

        .carousel-nav-btn-cta:disabled {
            background: rgba(255,255,255,0.3);
            cursor: not-allowed;
            transform: scale(1);
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .carousel-container-cta {
                gap: 15px;
                padding: 0 40px;
            }

            .carousel-track-cta {
                gap: 20px;
            }

            .property-image-cta {
                height: 250px;
            }
        }

        @media (max-width: 768px) {
            .carousel-container-cta {
                gap: 12px;
                padding: 0 30px;
            }

            .carousel-track-cta {
                gap: 15px !important; /* Force on mobile */
            }

            .carousel-nav-btn-cta {
                width: 40px;
                height: 40px;
                font-size: 16px;
            }

            .property-card-cta {
                /* Width will be set to 100% by JavaScript */
                flex: 0 0 100% !important;
                min-width: 100% !important;
            }

            .property-image-cta {
                height: 300px !important;
            }

            .property-name-cta {
                font-size: 18px;
            }

            .property-specs-cta {
                font-size: 11px;
            }
        }

        @media (max-width: 480px) {
            .carousel-container-cta {
                padding: 0 20px;
            }

            .property-image-cta {
                height: 250px !important;
            }

            .property-info-card-cta {
                padding: 20px;
            }
        }

        @media (max-width: 360px) {
            .carousel-container-cta {
                padding: 0 15px;
            }

            .property-image-cta {
                height: 220px !important;
            }

            .property-name-cta {
                font-size: 16px;
            }
        }
    </style>

    <script>
        // CTA Carousel functionality with RESPONSIVE support
        let currentSlideCTA = 0;
        const trackCTA = document.getElementById('carouselTrackCTA');
        const wrapperCTA = document.querySelector('.carousel-wrapper-cta');
        const cardsCTA = document.querySelectorAll('.property-card-cta');
        const prevBtnCTA = document.getElementById('prevBtnCTA');
        const nextBtnCTA = document.getElementById('nextBtnCTA');
        const totalCardsCTA = cardsCTA.length;

        // Responsive cards per slide
        function getCardsPerSlideCTA() {
            const screenWidth = window.innerWidth;
            if (screenWidth <= 768) {
                return 1; // Mobile: 1 card
            } else if (screenWidth <= 1024) {
                return 2; // Tablet: 2 cards
            } else {
                return 3; // Desktop: 3 cards
            }
        }

        // Responsive gap
        function getGapCTA() {
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

        function updateCarouselCTA() {
            if (totalCardsCTA === 0 || !wrapperCTA || !trackCTA) return;

            const cardsPerSlide = getCardsPerSlideCTA();
            const gap = getGapCTA();
            const totalSlides = Math.ceil(totalCardsCTA / cardsPerSlide);

            // Reset slide if out of bounds
            if (currentSlideCTA >= totalSlides) {
                currentSlideCTA = totalSlides - 1;
            }
            if (currentSlideCTA < 0) {
                currentSlideCTA = 0;
            }

            // Set gap on track
            trackCTA.style.gap = `${gap}px`;

            const wrapperWidth = wrapperCTA.offsetWidth;
            let cardWidth;
            
            if (cardsPerSlide === 1) {
                cardWidth = wrapperWidth; // Full width for mobile
            } else if (cardsPerSlide === 2) {
                cardWidth = (wrapperWidth - gap) / 2;
            } else {
                cardWidth = (wrapperWidth - (gap * 2)) / 3;
            }
            
            // Set width for all cards
            cardsCTA.forEach(card => {
                card.style.width = cardWidth + 'px';
                card.style.minWidth = cardWidth + 'px';
                card.style.flexBasis = cardWidth + 'px';
            });

            // Calculate offset
            const slideWidth = cardWidth + gap;
            const offset = -currentSlideCTA * slideWidth * cardsPerSlide;
            
            trackCTA.style.transform = `translateX(${offset}px)`;

            // Update button states
            if (prevBtnCTA) prevBtnCTA.disabled = currentSlideCTA === 0;
            if (nextBtnCTA) nextBtnCTA.disabled = currentSlideCTA === totalSlides - 1;
        }

        function slideCarouselCTA(direction) {
            const cardsPerSlide = getCardsPerSlideCTA();
            const totalSlides = Math.ceil(totalCardsCTA / cardsPerSlide);
            const newSlide = currentSlideCTA + direction;
            
            if (newSlide >= 0 && newSlide < totalSlides) {
                currentSlideCTA = newSlide;
                updateCarouselCTA();
            }
        }

        // Initialize carousel only if elements exist
        if (trackCTA && wrapperCTA && cardsCTA.length > 0) {
            // Use requestAnimationFrame for better initialization
            requestAnimationFrame(() => {
                requestAnimationFrame(() => {
                    updateCarouselCTA();
                });
            });

            // Update on resize with debounce
            let resizeTimeoutCTA;
            window.addEventListener('resize', function() {
                clearTimeout(resizeTimeoutCTA);
                resizeTimeoutCTA = setTimeout(updateCarouselCTA, 250);
            });
        }

        // AJAX Like/Unlike Function for CTA
        function toggleLikeCTA(button, propertyId) {
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
                    // Liked - Red fill
                    svg.setAttribute('fill', '#e74c3c');
                    svg.setAttribute('stroke', '#e74c3c');
                } else {
                    // Unliked - Empty
                    svg.setAttribute('fill', 'none');
                    svg.setAttribute('stroke', 'currentColor');
                }
            })
            .catch(error => console.error('Error:', error));
        }

        // Carousel functionality
        let currentSlide = 0;
        const carouselTrack = document.getElementById('carouselTrack');
        const cards = document.querySelectorAll('.property-card-carousel');
        const totalCards = cards.length;
        const nextBtn = document.getElementById('nextBtn');
        const prevBtn = document.getElementById('prevBtn');

        function slideCarousel(direction) {
            if (totalCards === 0) return;

            currentSlide += direction;

            // Loop back
            if (currentSlide < 0) {
                currentSlide = totalCards - 3;
            } else if (currentSlide > totalCards - 3) {
                currentSlide = 0;
            }

            const cardWidth = cards[0].offsetWidth;
            const gap = 24;
            const offset = currentSlide * (cardWidth + gap);

            carouselTrack.style.transform = `translateX(-${offset}px)`;
            updateButtons();
        }

        function updateButtons() {
            if (totalCards <= 3) {
                nextBtn.style.display = 'none';
                prevBtn.style.display = 'none';
            }
        }

        window.addEventListener('load', updateButtons);
    </script>

    <!-- Contact Form Component -->
    @include('components.contact-form', [
        'title' => "Don't Miss Out",
        'subtitle' => "Be the first to hear about new homes, exclusive listings, and upcoming releases.",
        'pageSource' => 'about'
    ])

    @include('layouts.footer')
</body>
</html>


