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

        .email-icon {
            position: fixed;
            left: 50px;
            bottom: 50px;
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 100;
            cursor: pointer;
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

        /* Our Story Section */
        .our-story {
            background: #F7EFE2;
            padding: 120px 80px;
        }

        .story-container {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 100px;
            align-items: center;
        }

        .story-image {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .story-image img {
            width: 85%;
            height: auto;
            border-radius: 15px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
        }

        .story-content h2 {
            font-size: 48px;
            font-weight: 400;
            color: #064852;
            margin-bottom: 30px;
            line-height: 1.3;
        }

        .story-content p {
            font-size: 18px;
            line-height: 1.8;
            color: #064852;
            margin-bottom: 20px;
            font-family: 'Work Sans', sans-serif;
            font-weight: 400;
        }

        /* Values Section */
        .values-section {
            background: #F7EFE2;
            padding: 120px 80px;
            color: #064852;
            position: relative;
            overflow: hidden;
        }

        .values-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(0, 0, 0, 0.02) 0%, rgba(0, 0, 0, 0.04) 50%, rgba(0, 0, 0, 0.02) 100%);
            pointer-events: none;
        }

        .values-container {
            max-width: 1400px;
            margin: 0 auto;
            text-align: center;
            position: relative;
            z-index: 1;
        }

        .values-header {
            margin-bottom: 80px;
        }

        .values-header small {
            font-size: 14px;
            letter-spacing: 4px;
            text-transform: uppercase;
            display: block;
            margin-bottom: 20px;
            opacity: 0.8;
            font-family: 'Work Sans', sans-serif;
            font-weight: 600;
            color: rgba(215, 180, 105, 1);
        }

        .values-header h2 {
            font-size: 56px;
            font-weight: 300;
            margin-bottom: 20px;
            letter-spacing: 2px;
            font-family: 'Esther', serif;
            color: #064852;
        }

        .values-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 40px;
            margin-top: 60px;
        }

        .value-card {
            background: white;
            padding: 50px 45px;
            border-radius: 2px;
            backdrop-filter: none;
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid rgba(215, 180, 105, 0.2);
            border-left: 3px solid rgba(215, 180, 105, 0.8);
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        .value-card::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200px;
            height: 200px;
            background: radial-gradient(circle, rgba(215, 180, 105, 0.08) 0%, transparent 70%);
            border-radius: 50%;
            transition: all 0.5s ease;
        }

        .value-card:hover {
            transform: translateY(-8px);
            background: #fafaf9;
            border-color: rgba(215, 180, 105, 0.5);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }

        .value-card:hover::before {
            top: -30%;
            right: -30%;
        }

        .value-icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, rgba(215, 180, 105, 0.15) 0%, rgba(215, 180, 105, 0.05) 100%);
            border: 2px solid rgba(215, 180, 105, 0.3);
            border-radius: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 30px;
            font-size: 32px;
            position: relative;
            z-index: 2;
        }

        .value-card h3 {
            font-size: 24px;
            font-weight: 400;
            margin-bottom: 18px;
            letter-spacing: 1px;
            font-family: 'Esther', serif;
            position: relative;
            z-index: 2;
            color: #064852;
        }

        .value-card p {
            font-size: 15px;
            line-height: 1.8;
            opacity: 0.75;
            font-family: 'Work Sans', sans-serif;
            font-weight: 400;
            position: relative;
            z-index: 2;
            letter-spacing: 0.3px;
            color: #064852;
        }

        /* Vision Section */
        .vision-section {
            background: #F7EFE2;
            padding: 120px 80px;
        }

        .vision-container {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 100px;
            align-items: center;
        }

        .vision-content {
            order: 2;
        }

        .vision-content small {
            font-size: 17px;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: #5a8aaa;
            display: block;
            margin-bottom: 20px;
            font-family: 'Work Sans', sans-serif;
            font-weight: 500;
        }

        .vision-content h2 {
            font-size: 44px;
            font-weight: 400;
            color: #064852;
            margin-bottom: 30px;
            line-height: 1.3;
        }

        .vision-content p {
            font-size: 18px;
            line-height: 1.8;
            color: #064852;
            margin-bottom: 20px;
            font-family: 'Work Sans', sans-serif;
            font-weight: 400;
        }

        .vision-image {
            position: relative;
            order: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .vision-image img {
            width: 85%;
            height: auto;
            border-radius: 15px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
        }

        /* Team Section */
        .team-section {
            background: #F7EFE2;
            padding: 100px 80px 120px;
        }

        .team-container {
            max-width: 1400px;
            margin: 0 auto;
            text-align: center;
        }

        .team-header {
            margin-bottom: 70px;
        }

        .team-header h2 {
            font-size: 52px;
            font-weight: 400;
            color: #064852;
            margin-bottom: 20px;
        }

        .team-header p {
            font-size: 20px;
            color: #5a8aaa;
            font-family: 'Work Sans', sans-serif;
            font-weight: 400;
        }

        .team-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 40px;
        }

        .team-member {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        .team-member:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
        }

        .member-image {
            width: 100%;
            height: 350px;
            overflow: hidden;
            background: #d4cec0;
        }

        .member-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: top;
            transition: transform 0.3s ease;
        }

        .team-member:hover .member-image img {
            transform: scale(1.05);
        }

        .member-info {
            padding: 30px;
            text-align: center;
        }

        .member-info h3 {
            font-size: 24px;
            font-weight: 400;
            color: #064852;
            margin-bottom: 10px;
        }

        .member-info p {
            font-size: 16px;
            color: #5a8aaa;
            font-family: 'Work Sans', sans-serif;
            font-weight: 500;
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
        }

        .cta-btn:hover {
            background: white;
            color: #064852;
        }

        /* Stats Section */
        .stats-section {
            background: #F7EFE2;
            padding: 80px 80px;
        }

        .stats-container {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 60px;
            text-align: center;
        }

        .stat-item h3 {
            font-size: 56px;
            font-weight: 400;
            color: #064852;
            margin-bottom: 15px;
        }

        .stat-item p {
            font-size: 16px;
            color: #5a8aaa;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-family: 'Work Sans', sans-serif;
            font-weight: 600;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .story-container,
            .vision-container {
                grid-template-columns: 1fr;
                gap: 60px;
            }

            .vision-content {
                order: 1;
            }

            .vision-image {
                order: 2;
            }

            .values-grid,
            .team-grid {
                grid-template-columns: 1fr;
            }

            .stats-container {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>
</head>
<body>
    @include('layouts.navbar')

    <!-- Email Icon -->
    <div class="email-icon">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#2c3e50" stroke-width="2">
            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
            <polyline points="22,6 12,13 2,6"></polyline>
        </svg>
    </div>

    <!-- Hero Section -->
    <section class="hero-about">
        <div class="hero-text">
            <small>DISCOVER</small>
            <h1>About Sakanta</h1>
            <p>Where shared ownership meets unparalleled luxury, creating a new way to experience and invest in premium properties.</p>
        </div>
        <div class="scroll-indicator" onclick="document.querySelector('.our-story').scrollIntoView({ behavior: 'smooth' })" style="cursor: pointer;">↓</div>
    </section>

    <!-- Our Story Section -->
    <section class="our-story">
        <div class="story-container">
            <div class="story-image">
                <img src="/images/homevilla.jpg" alt="Sakanta Story">
            </div>
            <div class="story-content">
                <h2>Our Story:<br>Reimagining Property Ownership</h2>
                <p>Sakanta was born from a simple yet powerful idea: luxury property ownership should be accessible, flexible, and shared. We believe that the joy of having a retreat shouldn't be limited by financial barriers or practical constraints.</p>
                <p>Founded by a team of property enthusiasts and hospitality experts, we've created a platform that democratizes access to premium properties across Indonesia's most sought-after destinations.</p>
                <p>Our name, "Sakanta," embodies the spirit of sanctuary and tranquility — a place where you can truly escape, recharge, and create lasting memories with those who matter most.</p>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="stats-container">
            <div class="stat-item">
                <h3>500+</h3>
                <p>Happy Owners</p>
            </div>
            <div class="stat-item">
                <h3>50+</h3>
                <p>Premium Villas</p>
            </div>
            <div class="stat-item">
                <h3>12</h3>
                <p>Destinations</p>
            </div>
            <div class="stat-item">
                <h3>95%</h3>
                <p>Satisfaction Rate</p>
            </div>
        </div>
    </section>

    <!-- Values Section -->
    <section class="values-section dark-section">
        <div class="values-container">
            <div class="values-header">
                <small>OUR VALUES</small>
                <h2>What We Stand For</h2>
            </div>
            <div class="values-grid">
                <div class="value-card">
                    <div class="value-icon">🏡</div>
                    <h3>Accessibility</h3>
                    <p>Making luxury property ownership achievable for more people through innovative co-ownership models that reduce financial barriers.</p>
                </div>
                <div class="value-card">
                    <div class="value-icon">🤝</div>
                    <h3>Community</h3>
                    <p>Building a community of like-minded individuals who share a passion for exceptional spaces and meaningful experiences.</p>
                </div>
                <div class="value-card">
                    <div class="value-icon">✨</div>
                    <h3>Excellence</h3>
                    <p>Maintaining the highest standards in property selection, management, and owner services to ensure exceptional experiences.</p>
                </div>
                <div class="value-card">
                    <div class="value-icon">🌿</div>
                    <h3>Sustainability</h3>
                    <p>Promoting responsible property development and management that respects local communities and the environment.</p>
                </div>
                <div class="value-card">
                    <div class="value-icon">🔒</div>
                    <h3>Transparency</h3>
                    <p>Operating with complete honesty in all transactions, ensuring legal clarity and protecting every owner's investment.</p>
                </div>
                <div class="value-card">
                    <div class="value-icon">💎</div>
                    <h3>Quality</h3>
                    <p>Curating only the finest properties in prime locations with exceptional design and outstanding amenities.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Vision Section -->
    <section class="vision-section">
        <div class="vision-container">
            <div class="vision-content">
                <small>OUR VISION</small>
                <h2>Building the Future of Shared Luxury</h2>
                <p>We envision a world where owning a piece of paradise is within reach for everyone who dreams of it. Where families can create traditions, professionals can find respite, and investors can build wealth through tangible, beautiful assets.</p>
                <p>Through technology, transparency, and trust, we're transforming how people think about second homes — not as a luxury reserved for the elite, but as a smart, accessible way to enjoy exceptional properties.</p>
                <p>Our goal is to become Indonesia's leading co-ownership platform, expanding to 100+ premium properties across the archipelago, while maintaining the personal touch and attention to detail that makes Sakanta special.</p>
            </div>
            <div class="vision-image">
                <img src="/images/homevilla2.jpg" alt="Sakanta Vision">
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="team-section">
        <div class="team-container">
            <div class="team-header">
                <h2>Meet Our Team</h2>
                <p>The passionate people behind Sakanta</p>
            </div>
            <div class="team-grid">
                <div class="team-member">
                    <div class="member-image">
                        <img src="/images/person1.jpg" alt="Team Member">
                    </div>
                    <div class="member-info">
                        <h3>Johnny Anderson</h3>
                        <p>Founder & CEO</p>
                    </div>
                </div>
                <div class="team-member">
                    <div class="member-image">
                        <img src="/images/person2.jpg" alt="Team Member">
                    </div>
                    <div class="member-info">
                        <h3>Michael Chen</h3>
                        <p>Head of Property</p>
                    </div>
                </div>
                <div class="team-member">
                    <div class="member-image">
                        <img src="/images/person3.jpg" alt="Team Member">
                    </div>
                    <div class="member-info">
                        <h3>Anderson Wijaya</h3>
                        <p>Director of Operations</p>
                    </div>
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
                        <a href="{{ route('property.detail', $property->slug) }}" class="property-card-cta">
                            <div class="property-image-cta">
                                <img src="{{ asset($property->main_image ?? '/images/villa1.jpg') }}" alt="{{ $property->title }}">
                                
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
                                    <h3 class="property-name-cta">{{ $property->title }}</h3>
                                    <div class="property-icon-cta">
                                        <svg viewBox="0 0 50 50" fill="none">
                                            <path d="M 10 25 L 25 10 L 40 25 L 25 40 Z" stroke="currentColor" fill="none"/>
                                        </svg>
                                    </div>
                                </div>
                                <p class="property-location-text-cta">{{ $property->location->name ?? $property->city }}</p>
                                <p class="property-price-text-cta">{{ $property->formatted_price }}</p>
                                <p class="property-specs-cta">1/{{ $property->total_shares }} Ownership</p>
                                <p class="property-specs-cta">{{ $property->bedrooms }} BDS  |  {{ $property->bathrooms }} BA  |  {{ number_format($property->building_area, 0) }} FT</p>
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
            <a href="/listings" class="cta-btn">EXPLORE PROPERTIES</a>
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
            flex: 0 0 calc((100% - 60px) / 3);
            min-width: calc((100% - 60px) / 3);
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
        }

        .property-name-cta {
            font-size: 18px;
            font-weight: 400;
            color: #064852;
            margin: 0;
            line-height: 1.3;
            font-family: 'Esther', serif;
            text-align: left;
        }

        .property-icon-cta {
            width: 24px;
            height: 24px;
            flex-shrink: 0;
            color: #064852;
        }

        .property-location-text-cta {
            font-size: 13px;
            color: #5a8aaa;
            margin: 0 0 8px 0;
            font-family: 'Work Sans', sans-serif;
            text-align: left;
        }

        .property-price-text-cta {
            font-size: 18px;
            font-weight: 600;
            color: #064852;
            margin: 0 0 8px 0;
            font-family: 'Work Sans', sans-serif;
            text-align: left;
        }

        .property-specs-cta {
            font-size: 12px;
            color: #064852;
            margin: 0 0 3px 0;
            font-family: 'Work Sans', sans-serif;
            text-align: left;
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
            }

            .carousel-track-cta {
                gap: 20px;
            }

            .property-card-cta {
                flex: 0 0 calc((100% - 40px) / 2);
                min-width: calc((100% - 40px) / 2);
            }

            .property-image-cta {
                height: 250px;
            }
        }

        @media (max-width: 768px) {
            .carousel-container-cta {
                gap: 12px;
            }

            .carousel-track-cta {
                gap: 15px;
            }

            .carousel-nav-btn-cta {
                width: 40px;
                height: 40px;
                font-size: 16px;
            }

            .property-card-cta {
                flex: 0 0 100%;
                min-width: 100%;
            }

            .property-image-cta {
                height: 220px;
            }

            .property-name-cta {
                font-size: 16px;
            }

            .property-specs-cta {
                font-size: 11px;
            }
        }
    </style>

    <script>
        // CTA Carousel functionality
        let currentSlideCTA = 0;
        const trackCTA = document.getElementById('carouselTrackCTA');
        const wrapperCTA = document.querySelector('.carousel-wrapper-cta');
        const cardsCTA = document.querySelectorAll('.property-card-cta');
        const prevBtnCTA = document.getElementById('prevBtnCTA');
        const nextBtnCTA = document.getElementById('nextBtnCTA');
        const cardsPerSlideCTA = 3;
        const gapCTA = 30;
        const totalCardsCTA = cardsCTA.length;
        const totalSlidesCTA = Math.ceil(totalCardsCTA / cardsPerSlideCTA);

        function updateCarouselCTA() {
            if (totalCardsCTA === 0 || !wrapperCTA || !trackCTA) return;

            const wrapperWidth = wrapperCTA.offsetWidth;
            const cardWidth = (wrapperWidth - (gapCTA * 2)) / 3;
            
            cardsCTA.forEach(card => {
                card.style.width = cardWidth + 'px';
                card.style.minWidth = cardWidth + 'px';
                card.style.flexBasis = cardWidth + 'px';
            });

            const slideWidth = cardWidth + gapCTA;
            const offset = -currentSlideCTA * slideWidth * cardsPerSlideCTA;
            
            trackCTA.style.transform = `translateX(${offset}px)`;

            if (prevBtnCTA) prevBtnCTA.disabled = currentSlideCTA === 0;
            if (nextBtnCTA) nextBtnCTA.disabled = currentSlideCTA === totalSlidesCTA - 1;
        }

        function slideCarouselCTA(direction) {
            const newSlide = currentSlideCTA + direction;
            
            if (newSlide >= 0 && newSlide < totalSlidesCTA) {
                currentSlideCTA = newSlide;
                updateCarouselCTA();
            }
        }

        // Initialize carousel only if elements exist
        if (trackCTA && wrapperCTA && cardsCTA.length > 0) {
            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', function() {
                    setTimeout(updateCarouselCTA, 50);
                });
            } else {
                setTimeout(updateCarouselCTA, 50);
            }

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

    @include('layouts.footer')
</body>
</html>


