<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $property->title }} - SAKANTA</title>
    
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

        /* ===== SECTION 1: HERO WITH OVERLAY ===== */
        .hero-detail {
            height: 100vh;
            position: relative;
            overflow: hidden;
        }

        .hero-detail-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .hero-overlay {
            position: absolute;
            bottom: 60px;
            left: 80px;
            z-index: 2;
            background: rgba(255, 255, 255, 0.95);
            padding: 40px 50px;
            border-radius: 10px;
            max-width: 500px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
        }

        .hero-overlay h1 {
            font-size: 42px;
            font-weight: 400;
            color: #064852;
            margin-bottom: 15px;
            line-height: 1.2;
            font-family: 'Esther', serif;
        }

        .hero-overlay .subtitle {
            font-size: 16px;
            color: #5a8aaa;
            margin-bottom: 20px;
            font-family: 'Work Sans', sans-serif;
            font-weight: 400;
        }

        .hero-overlay .location {
            font-size: 14px;
            color: #064852;
            margin-bottom: 8px;
            font-family: 'Work Sans', sans-serif;
        }

        .hero-overlay .price {
            font-size: 28px;
            font-weight: 600;
            color: #064852;
            font-family: 'Work Sans', sans-serif;
        }

        /* ===== SECTION 2: PROPERTY DETAILS ===== */
        .details-section {
            background: #F7EFE2;
            padding: 100px 80px;
        }

        .details-container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .details-subtitle {
            font-size: 14px;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: #5a8aaa;
            margin-bottom: 40px;
            font-family: 'Work Sans', sans-serif;
            font-weight: 600;
        }

        .details-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 80px;
        }

        /* Left Column - Property Info */
        .details-left {
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        .detail-item {
            border-bottom: 1px solid rgba(6, 72, 82, 0.2);
            padding-bottom: 15px;
        }

        .detail-item h3 {
            font-size: 13px;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: #5a8aaa;
            margin-bottom: 8px;
            font-family: 'Work Sans', sans-serif;
            font-weight: 600;
        }

        .detail-item p {
            font-size: 16px;
            color: #064852;
            line-height: 1.6;
            font-family: 'Work Sans', sans-serif;
            font-weight: 400;
        }

        /* Right Column - Facilities & Surroundings */
        .details-right {
            display: flex;
            flex-direction: column;
            gap: 50px;
        }

        .facilities-section,
        .surroundings-section {
            /* Styling for both sections */
        }

        .section-header {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 30px;
        }

        .section-icon {
            width: 40px;
            height: 40px;
            flex-shrink: 0;
        }

        .section-icon svg {
            width: 100%;
            height: 100%;
            stroke: #064852;
            stroke-width: 1.5;
        }

        .section-header h2 {
            font-size: 24px;
            font-weight: 400;
            color: #064852;
            font-family: 'Esther', serif;
        }

        .items-list {
            display: flex;
            flex-direction: column;
            gap: 25px;
        }

        .item-row {
            display: flex;
            gap: 20px;
            align-items: flex-start;
        }

        .item-image {
            width: 80px;
            height: 80px;
            border-radius: 8px;
            overflow: hidden;
            flex-shrink: 0;
        }

        .item-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .item-content {
            flex: 1;
        }

        .item-content h4 {
            font-size: 16px;
            font-weight: 600;
            color: #064852;
            margin-bottom: 5px;
            font-family: 'Work Sans', sans-serif;
        }

        .item-content p {
            font-size: 14px;
            color: #064852;
            line-height: 1.6;
            font-family: 'Work Sans', sans-serif;
            font-weight: 400;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .details-grid {
                grid-template-columns: 1fr;
                gap: 60px;
            }

            .hero-overlay {
                left: 40px;
                right: 40px;
                max-width: none;
                padding: 30px;
            }

            .details-section {
                padding: 80px 40px;
            }
        }

        @media (max-width: 768px) {
            .hero-overlay {
                left: 20px;
                right: 20px;
                bottom: 30px;
                padding: 25px;
            }

            .hero-overlay h1 {
                font-size: 32px;
            }

            .details-section {
                padding: 60px 30px;
            }

            .details-grid {
                gap: 40px;
            }
        }
    </style>
</head>
<body>
    @include('layouts.navbar')

    <!-- SECTION 1: Hero with Overlay -->
    <section class="hero-detail">
        <img src="{{ asset($property->main_image ?? '/images/villa1.jpg') }}" alt="{{ $property->title }}" class="hero-detail-image">
        
        <div class="hero-overlay">
            <h1>{{ $property->title }}</h1>
            @if($property->subtitle)
                <p class="subtitle">{{ $property->subtitle }}</p>
                @endif
            <p class="location">📍 {{ $property->location->name ?? $property->city }}</p>
            <p class="price">{{ $property->formatted_price }} / share</p>
        </div>
    </section>

    <!-- SECTION 2: Property Details -->
    <section class="details-section">
        <div class="details-container">
            <p class="details-subtitle">PROPERTY DETAILS</p>
            
            <div class="details-grid">
                <!-- Left Column: Property Info -->
                <div class="details-left">
                    <div class="detail-item">
                        <h3>Name</h3>
                        <p>{{ $property->title }}</p>
                    </div>

                    @if($property->subtitle)
                    <div class="detail-item">
                        <h3>Subtitle</h3>
                        <p>{{ $property->subtitle }}</p>
                    </div>
                    @endif

                    <div class="detail-item">
                        <h3>Photos</h3>
                        <p>{{ is_array($property->images) ? count($property->images) : 0 }} Photos Available</p>
                    </div>

                    <div class="detail-item">
                        <h3>Location</h3>
                        <p>{{ $property->address }}<br>{{ $property->location->name ?? $property->city }}, {{ $property->province }}</p>
                    </div>

                <div class="detail-item">
                    <h3>Price</h3>
                    <p>{{ $property->formatted_price }} / share</p>
                </div>                    <div class="detail-item">
                        <h3>Desc</h3>
                        <p>{{ $property->description }}</p>
                    </div>

                    <div class="detail-item">
                        <h3>Bedrooms</h3>
                        <p>{{ $property->bedrooms }} Bedrooms</p>
                    </div>

                    <div class="detail-item">
                        <h3>Bathrooms</h3>
                        <p>{{ $property->bathrooms }} Bathrooms</p>
                    </div>

                    <div class="detail-item">
                        <h3>Building size</h3>
                        <p>{{ number_format($property->building_area, 0) }} m²</p>
                    </div>

                    <div class="detail-item">
                        <h3>Land size</h3>
                        <p>{{ number_format($property->land_area, 0) }} m²</p>
                    </div>

                    <div class="detail-item">
                        <h3>Built in</h3>
                        <p>{{ $property->created_at->format('Y') }}</p>
                    </div>
                </div>

                <!-- Right Column: Facilities & Surroundings -->
                <div class="details-right">
                    <!-- Facilities Section -->
                    <div class="facilities-section">
                        <div class="section-header">
                            <div class="section-icon">
                                <svg viewBox="0 0 24 24" fill="none">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                </svg>
                            </div>
                            <h2>Facilities</h2>
                        </div>

                        <div class="items-list">
                            @if($property->facilities && is_array($property->facilities))
                                @foreach($property->facilities as $facility)
                                <div class="item-row">
                                    <div class="item-image">
                                        <img src="{{ asset($facility['image'] ?? '/images/placeholder.jpg') }}" alt="{{ $facility['name'] ?? 'Facility' }}">
                                    </div>
                                    <div class="item-content">
                                        <h4>{{ $facility['name'] ?? 'Facility' }}</h4>
                                        <p>{{ $facility['description'] ?? '' }}</p>
                                    </div>
                                </div>
                                @endforeach
                            @else
                                <p style="color: #999;">No facilities information available.</p>
                            @endif
                        </div>
                    </div>

                    <!-- Surroundings Section -->
                    <div class="surroundings-section">
                        <div class="section-header">
                            <div class="section-icon">
                                <svg viewBox="0 0 24 24" fill="none">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                                    <line x1="2" y1="12" x2="22" y2="12"></line>
                                </svg>
                            </div>
                            <h2>Surroundings</h2>
                        </div>

                        <div class="items-list">
                            @if($property->surroundings && is_array($property->surroundings))
                                @foreach($property->surroundings as $surrounding)
                                <div class="item-row">
                                    <div class="item-image">
                                        <img src="{{ asset($surrounding['image'] ?? '/images/placeholder.jpg') }}" alt="{{ $surrounding['name'] ?? 'Surrounding' }}">
                                    </div>
                                    <div class="item-content">
                                        <h4>{{ $surrounding['name'] ?? 'Surrounding' }}</h4>
                                        <p>{{ $surrounding['description'] ?? '' }}</p>
                                    </div>
                                </div>
                                @endforeach
                            @else
                                <p style="color: #999;">No surroundings information available.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('layouts.footer')
</body>
</html>
