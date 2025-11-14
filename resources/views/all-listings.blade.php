<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>All Listings - SAKANTA</title>
    
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
            font-family: 'Work Sans', sans-serif;
            color: #064852;
            background: #F7EFE2;
        }

        /* Header Section */
        .page-header {
            text-align: center;
            padding: 120px 60px 60px 60px;
            background: #F7EFE2;
        }

        .page-header h1 {
            font-family: 'Esther', serif;
            font-size: 64px;
            font-weight: 400;
            color: #064852;
            margin-bottom: 20px;
            letter-spacing: 2px;
        }

        .page-header p {
            font-family: 'Work Sans', sans-serif;
            font-size: 18px;
            color: #064852;
            opacity: 0.8;
            max-width: 700px;
            margin: 0 auto;
            line-height: 1.6;
        }

        /* Filter Section */
        .filter-section {
            max-width: 1400px;
            margin: 0 auto 40px auto;
            padding: 0 60px;
        }

        .filter-container {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            display: flex;
            gap: 20px;
            align-items: end;
        }

        .filter-group {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .filter-group label {
            font-family: 'Work Sans', sans-serif;
            font-size: 14px;
            font-weight: 600;
            color: #064852;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .filter-select {
            width: 100%;
            padding: 12px 16px;
            font-family: 'Work Sans', sans-serif;
            font-size: 16px;
            color: #064852;
            background: #F7EFE2;
            border: 2px solid #F7EFE2;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg width='12' height='8' viewBox='0 0 12 8' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1 1L6 6L11 1' stroke='%23064852' stroke-width='2' stroke-linecap='round'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 16px center;
            padding-right: 40px;
        }

        .filter-select:hover {
            border-color: #064852;
        }

        .filter-select:focus {
            outline: none;
            border-color: #064852;
            background: white;
        }

        .filter-button {
            padding: 12px 32px;
            font-family: 'Work Sans', sans-serif;
            font-size: 16px;
            font-weight: 600;
            color: white;
            background: #064852;
            border: 2px solid #064852;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s;
            white-space: nowrap;
        }

        .filter-button:hover {
            background: #053640;
            border-color: #053640;
            transform: translateY(-2px);
        }

        .reset-button {
            padding: 12px 32px;
            font-family: 'Work Sans', sans-serif;
            font-size: 16px;
            font-weight: 600;
            color: #064852;
            background: transparent;
            border: 2px solid #064852;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s;
            white-space: nowrap;
        }

        .reset-button:hover {
            background: #064852;
            color: white;
            transform: translateY(-2px);
        }

        .result-count {
            font-family: 'Work Sans', sans-serif;
            font-size: 16px;
            color: #064852;
            opacity: 0.7;
            margin-bottom: 20px;
            text-align: center;
        }

        /* Listings Grid Section */
        .listings-section {
            padding: 0 60px 100px 60px;
            background: #F7EFE2;
        }

        .listings-grid {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }

        /* Property Card - EXACT COPY from featured-listings */
        .property-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1), box-shadow 0.3s;
            position: relative;
            z-index: 1;
            cursor: pointer;
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
            font-size: 18px;
            font-weight: 400;
            color: #064852;
            margin: 0;
            line-height: 1.3;
            font-family: 'Esther', serif;
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
            max-width: 600px;
            margin: 0 auto;
        }

        .empty-state h3 {
            font-family: 'Esther', serif;
            font-size: 32px;
            color: #064852;
            margin-bottom: 15px;
        }

        .empty-state p {
            font-family: 'Work Sans', sans-serif;
            font-size: 16px;
            color: #064852;
            opacity: 0.7;
        }

        /* Responsive */
        @media (max-width: 1200px) {
            .listings-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 25px;
            }
        }

        @media (max-width: 968px) {
            .page-header {
                padding: 100px 40px 50px 40px;
            }

            .page-header h1 {
                font-size: 48px;
            }

            .page-header p {
                font-size: 16px;
            }

            .filter-section {
                padding: 0 40px;
            }

            .filter-container {
                flex-direction: column;
                padding: 25px;
            }

            .filter-group {
                width: 100%;
            }

            .filter-button,
            .reset-button {
                width: 100%;
            }

            .listings-section {
                padding: 30px 40px 80px 40px;
            }

            .listings-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 20px;
            }

            .property-image {
                height: 250px;
            }

            .property-title {
                font-size: 22px;
            }

            .property-price {
                font-size: 20px;
            }
        }

        @media (max-width: 768px) {
            .page-header {
                padding: 80px 30px 40px 30px;
            }

            .page-header h1 {
                font-size: 42px;
            }

            .page-header p {
                font-size: 15px;
            }

            .filter-section {
                padding: 0 30px;
            }

            .filter-container {
                padding: 20px;
            }

            .listings-section {
                padding: 20px 30px 60px 30px;
            }

            .listings-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .property-image {
                height: 280px;
            }
        }

        @media (max-width: 480px) {
            .page-header {
                padding: 70px 20px 30px 20px;
            }

            .page-header h1 {
                font-size: 36px;
            }

            .page-header p {
                font-size: 14px;
            }

            .filter-section {
                padding: 0 20px;
            }

            .filter-container {
                padding: 20px;
                gap: 15px;
            }

            .filter-select {
                font-size: 14px;
                padding: 10px 14px;
                padding-right: 36px;
            }

            .filter-button,
            .reset-button {
                padding: 10px 24px;
                font-size: 14px;
            }

            .listings-section {
                padding: 20px 20px 50px 20px;
            }

            .property-content {
                padding: 20px;
            }

            .property-title {
                font-size: 20px;
            }

            .property-price {
                font-size: 18px;
            }

            .like-btn {
                width: 42px;
                height: 42px;
            }

            .like-btn svg {
                width: 20px;
                height: 20px;
            }

            .status-badge {
                font-size: 10px;
                padding: 6px 12px;
            }
        }

        @media (max-width: 360px) {
            .page-header h1 {
                font-size: 32px;
            }

            .property-image {
                height: 240px;
            }
        }
    </style>
</head>

<body>
    @include('layouts.navbar-simple')

    <!-- Page Header -->
    <section class="page-header">
        <h1>All Listings</h1>
        <p>Explore our complete collection of exclusive properties across all locations. Find your perfect sanctuary.</p>
    </section>

    <!-- Filter Section -->
    <div class="filter-section">
        <form method="GET" action="{{ route('all.listings') }}" class="filter-container">
            <div class="filter-group">
                <label for="location">Location</label>
                <select name="location" id="location" class="filter-select">
                    <option value="">All Locations</option>
                    @foreach($locations as $location)
                        <option value="{{ $location->id }}" {{ request('location') == $location->id ? 'selected' : '' }}>
                            {{ $location->name }} ({{ $location->properties_count }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="filter-group">
                <label for="sort">Sort By Price</label>
                <select name="sort" id="sort" class="filter-select">
                    <option value="">Latest</option>
                    <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Price: Low to High</option>
                    <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Price: High to Low</option>
                </select>
            </div>

            <button type="submit" class="filter-button">Apply Filters</button>
            <a href="{{ route('all.listings') }}" class="reset-button">Reset</a>
        </form>
    </div>

    <!-- Listings Grid -->
    <section class="listings-section">
        @if($properties->count() > 0)
            <p class="result-count">Showing {{ $properties->count() }} {{ $properties->count() == 1 ? 'property' : 'properties' }}</p>
            <div class="listings-grid">
                @foreach($properties as $property)
                    <a href="{{ route('property.detail', $property->slug) }}" class="property-card">
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
                                <h3 class="property-name">
                                    {{ $property->title }}
                                    @if($property->shares_booked)
                                        <span style="display: inline-block; margin-left: 8px; padding: 4px 10px; background: #064852; color: white; font-size: 10px; font-weight: 600; border-radius: 12px; text-transform: uppercase; letter-spacing: 0.5px; font-family: 'Work Sans', sans-serif;">
                                            {{ $property->shares_booked }} Committed
                                        </span>
                                    @endif
                                </h3>
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
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <h3>No Properties Available</h3>
                <p>We're currently updating our listings. Please check back soon for new properties.</p>
            </div>
        @endif
    </section>

    @include('components.whatsapp-contact')

    <script>
        // Set navbar to light mode immediately
        document.addEventListener('DOMContentLoaded', function() {
            const navbar = document.querySelector('.navbar-simple');
            const navbarLogo = document.getElementById('navbar-logo');
            
            if (navbar) {
                navbar.classList.remove('nav-hero', 'nav-dark');
                navbar.classList.add('nav-light');
            }
            
            // Set logo to dark version
            if (navbarLogo) {
                navbarLogo.src = '/images/Logo-01.png';
            }
        });

        function toggleLike(button, propertyId) {
            button.classList.toggle('liked');
            
            // AJAX call to save like status
            fetch('/api/property/like', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    property_id: propertyId
                })
            }).catch(error => {
                console.log('Like action logged');
            });
        }
    </script>

    @include('layouts.footer')
</body>
</html>
