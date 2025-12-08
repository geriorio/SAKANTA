<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('images/Logo-02.png') }}?v=2">
    <title>{{ $yacht->name }} - SAKANTA Yacht</title>
    
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

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Esther', 'Georgia', serif;
            color: #2c3e50;
            background: #F7EFE2;
        }
        
        button, .btn, [type="submit"], a[class*="btn"] {
            font-family: 'Work Sans', sans-serif !important;
        }

        /* Hero Section */
        .hero-yacht {
            height: 100vh;
            background-size: cover;
            background-position: center;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            padding-left: 80px;
        }

        .hero-yacht::before {
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
            z-index: 2;
            color: white;
            max-width: 600px;
        }

        .hero-content h1 {
            font-size: 56px;
            font-weight: 400;
            line-height: 1.2;
            margin-bottom: 20px;
        }

        .hero-content p {
            font-size: 20px;
            line-height: 1.6;
            margin-bottom: 40px;
            opacity: 0.95;
        }

        .view-gallery-btn {
            display: inline-block;
            padding: 15px 35px;
            background: #064852;
            color: white;
            text-decoration: none;
            font-size: 13px;
            letter-spacing: 2px;
            text-transform: uppercase;
            font-weight: 600;
            transition: all 0.3s;
            border-radius: 3px;
            font-family: 'Work Sans', sans-serif;
        }

        .view-gallery-btn:hover {
            background: #1a3f5f;
            transform: translateY(-2px);
        }

        /* Yacht Info Section */
        .yacht-info-section {
            background: #F7EFE2;
            padding: 80px 80px 60px;
        }

        .yacht-info-container {
            max-width: 1400px;
            margin: 0 auto;
            position: relative;
        }

        .yacht-title-row {
            margin-bottom: 60px;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 40px;
        }

        .yacht-content-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            position: relative;
            align-items: start;
            margin-bottom: 40px;
            background: rgba(255, 255, 255, 0.5);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(6, 72, 82, 0.15);
            border-radius: 12px;
            padding: 40px;
            box-shadow: 0 2px 10px rgba(6, 72, 82, 0.05);
        }

        .yacht-left-column {
            /* Specs column 1 - left */
        }

        .yacht-middle-column {
            /* Specs column 2 - middle */
        }

        .yacht-details-section {
            margin-top: 40px;
            padding-top: 40px;
            border-top: 1px solid rgba(6, 72, 82, 0.1);
        }

        .yacht-main-info h2 {
            font-size: 42px;
            font-weight: 400;
            color: #064852;
            margin-bottom: 15px;
            line-height: 1.2;
        }

        .yacht-subtitle {
            font-size: 16px;
            font-weight: 400;
            color: #5a8aaa;
            margin-bottom: 20px;
            font-style: italic;
            line-height: 1.4;
        }

        .yacht-price {
            font-size: 26px;
            font-weight: 600;
            color: #064852;
            margin-bottom: 40px;
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 0;
        }

        .ownership-separator {
            font-size: 26px;
            font-weight: 600;
            color: #064852;
            margin: 0 15px;
        }

        .yacht-ownership {
            font-size: 26px;
            font-weight: 600;
            color: #064852;
        }

        .yacht-details-list {
            display: flex;
            flex-direction: column;
            gap: 0;
        }

        .detail-item {
            padding: 12px 0;
            border-bottom: 1px solid rgba(6, 72, 82, 0.15);
        }

        .detail-item:first-child {
            padding-top: 0;
        }

        .detail-item strong {
            display: block;
            font-size: 16px;
            font-weight: 700;
            color: #5a8aaa;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-bottom: 8px;
            font-family: 'Work Sans', sans-serif;
        }

        .detail-item span {
            font-size: 14px;
            color: #064852;
            line-height: 1.6;
            font-family: 'Work Sans', sans-serif;
            font-weight: 400;
        }

        .yacht-right-content {
            padding-right: 80px;
        }

        .yacht-specs-detail {
            font-size: 14px;
            color: #064852;
            line-height: 1.8;
            margin-bottom: 12px;
            font-family: 'Work Sans', sans-serif;
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 8px;
        }

        .spec-section-title {
            font-size: 13px;
            font-weight: 700;
            color: #064852;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            margin-top: 24px;
            margin-bottom: 12px;
            font-family: 'Work Sans', sans-serif;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .spec-section-title:first-child {
            margin-top: 0;
        }

        .spec-section-title svg {
            width: 18px;
            height: 18px;
        }

        .spec-item {
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .spec-separator {
            color: #064852;
            opacity: 0.3;
            font-weight: 300;
        }

        .download-brochure-btn {
            display: inline-block;
            padding: 8px 18px;
            border: 2px solid #064852;
            color: #064852;
            text-decoration: none;
            font-size: 10px;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            transition: all 0.3s;
            margin-bottom: 30px;
            font-family: 'Work Sans', sans-serif;
            font-weight: 600;
        }

        .download-brochure-btn:hover {
            background: #064852;
            color: white;
        }

        /* Additional Photos Section */
        .additional-photos-section {
            margin-top: 60px;
            padding-top: 60px;
            border-top: 1px solid rgba(6, 72, 82, 0.1);
        }

        .additional-photos-container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .photos-grid {
            display: grid;
            grid-template-columns: repeat(12, 1fr);
            gap: 15px;
            margin-bottom: 30px;
        }

        .photo-item {
            position: relative;
            overflow: hidden;
            border-radius: 12px;
            transition: all 0.3s ease;
            cursor: pointer;
            background: #F7EFE2;
            height: 280px;
        }

        .photo-item.hidden-photo {
            display: none;
        }

        .view-more-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 12px 30px;
            background: transparent;
            border: 2px solid #064852;
            color: #064852;
            font-family: 'Work Sans', sans-serif;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            cursor: pointer;
            transition: all 0.3s;
            margin: 30px auto 0;
            border-radius: 3px;
        }

        .view-more-btn:hover {
            background: #064852;
            color: white;
        }

        .view-more-btn #btnIcon {
            transition: transform 0.3s;
        }

        .view-more-btn.expanded #btnIcon {
            transform: rotate(180deg);
        }

        .photo-item:nth-child(1) { grid-column: span 5; }
        .photo-item:nth-child(2) { grid-column: span 4; }
        .photo-item:nth-child(3) { grid-column: span 3; }
        .photo-item:nth-child(4) { grid-column: span 3; }
        .photo-item:nth-child(5) { grid-column: span 4; }
        .photo-item:nth-child(6) { grid-column: span 5; }
        .photo-item:nth-child(7) { grid-column: span 4; }
        .photo-item:nth-child(8) { grid-column: span 3; }
        .photo-item:nth-child(9) { grid-column: span 5; }
        .photo-item:nth-child(n+10) { grid-column: span 4; }

        .photo-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.3s ease;
        }

        .photo-item:hover img {
            transform: scale(1.05);
        }

        /* Lightbox Modal */
        .lightbox-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.95);
            z-index: 9999;
            align-items: center;
            justify-content: center;
        }

        .lightbox-modal.active {
            display: flex;
        }

        .lightbox-content {
            position: relative;
            max-width: 90vw;
            max-height: 90vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .lightbox-image {
            max-width: 100%;
            max-height: 90vh;
            object-fit: contain;
            border-radius: 8px;
        }

        .lightbox-close {
            position: absolute;
            top: 20px;
            right: 30px;
            font-size: 50px;
            color: white;
            cursor: pointer;
            background: none;
            border: none;
            transition: transform 0.3s;
            z-index: 10000;
            line-height: 1;
            font-weight: 300;
        }

        .lightbox-close:hover {
            transform: scale(1.1);
        }

        .lightbox-prev,
        .lightbox-next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            font-size: 50px;
            color: white;
            cursor: pointer;
            background: rgba(6, 72, 82, 0.5);
            border: none;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
            font-weight: 300;
        }

        .lightbox-prev:hover,
        .lightbox-next:hover {
            background: rgba(6, 72, 82, 0.8);
        }

        .lightbox-prev { left: 30px; }
        .lightbox-next { right: 30px; }

        .lightbox-counter {
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            color: white;
            font-family: 'Work Sans', sans-serif;
            font-size: 16px;
            background: rgba(0, 0, 0, 0.5);
            padding: 8px 20px;
            border-radius: 20px;
        }

        /* Section 5 & 6 */
        .section5 {
            display: flex;
            align-items: center;
            background: #F7EFE2;
            padding: 60px 80px;
            margin-top: 60px;
        }

        .section5-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            align-items: center;
        }

        .section5-image {
            position: relative;
        }

        .section5-image img {
            width: 100%;
            max-width: 500px;
            height: auto;
            border-radius: 15px;
        }

        .section5-content h2 {
            font-size: 44px;
            font-weight: 400;
            line-height: 1.3;
            margin-bottom: 30px;
            color: #064852;
            font-family: 'Esther', serif;
        }

        .section5-content p {
            font-size: 16px;
            line-height: 1.8;
            color: #064852;
            margin-bottom: 20px;
            font-family: 'Work Sans', sans-serif;
        }

        .section5-content .cta-button {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 30px;
            background: transparent;
            color: #064852;
            text-decoration: none;
            border-radius: 3px;
            font-family: 'Work Sans', sans-serif;
            font-weight: 600;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            transition: all 0.3s;
            border: 2px solid #064852;
        }

        .section5-content .cta-button:hover {
            background: #064852;
            color: white;
        }

        .section6 {
            display: flex;
            align-items: center;
            background: #F7EFE2;
            padding: 60px 80px;
        }

        .section6-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            align-items: center;
        }

        .section6-content h2 {
            font-size: 44px;
            font-weight: 400;
            line-height: 1.3;
            margin-bottom: 30px;
            color: #064852;
            font-family: 'Esther', serif;
        }

        .section6-content p {
            font-size: 16px;
            line-height: 1.8;
            color: #064852;
            margin-bottom: 20px;
            font-family: 'Work Sans', sans-serif;
        }

        .section6-content .cta-button {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 30px;
            background: transparent;
            color: #064852;
            text-decoration: none;
            border-radius: 3px;
            font-family: 'Work Sans', sans-serif;
            font-weight: 600;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            transition: all 0.3s;
            border: 2px solid #064852;
        }

        .section6-content .cta-button:hover {
            background: #064852;
            color: white;
        }

        .section6-image {
            position: relative;
        }

        .section6-image img {
            width: 100%;
            max-width: 500px;
            height: auto;
            border-radius: 15px;
            margin-left: auto;
            display: block;
        }

        /* Related Yachts Section */
        .related-yachts-section {
            margin-top: 60px;
            padding-top: 60px;
            border-top: 1px solid rgba(6, 72, 82, 0.1);
        }

        .related-yachts-container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .related-yachts-title {
            font-size: 14px;
            font-weight: 600;
            color: #064852;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 40px;
            font-family: 'Work Sans', sans-serif;
        }

        .related-yachts-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 30px;
        }

        .related-yacht-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 2px 10px rgba(6, 72, 82, 0.08);
            text-decoration: none;
            color: inherit;
            display: block;
        }

        .related-yacht-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(6, 72, 82, 0.15);
        }

        .related-yacht-image {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }

        .related-yacht-content {
            padding: 20px;
        }

        .related-yacht-title {
            font-size: 18px;
            font-weight: 600;
            color: #064852;
            margin-bottom: 8px;
            font-family: 'Work Sans', sans-serif;
        }

        .related-yacht-brand {
            font-size: 13px;
            color: #5a8aaa;
            margin-bottom: 12px;
            font-family: 'Work Sans', sans-serif;
        }

        .related-yacht-specs {
            font-size: 12px;
            color: #666;
            margin-bottom: 12px;
            font-family: 'Work Sans', sans-serif;
            display: flex;
            align-items: center;
            gap: 6px;
            flex-wrap: wrap;
        }

        .related-yacht-specs .spec-item {
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        .related-yacht-specs .spec-item img {
            flex-shrink: 0;
            vertical-align: middle;
        }

        .related-yacht-specs .spec-separator {
            color: #666;
            opacity: 0.4;
            font-weight: 300;
        }

        .related-yacht-price {
            font-size: 20px;
            font-weight: 600;
            color: #064852;
            font-family: 'Work Sans', sans-serif;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .yacht-content-row {
                grid-template-columns: 1fr;
                gap: 60px;
            }

            .hero-yacht {
                padding-left: 40px;
                padding-bottom: 60px;
            }

            .yacht-info-section {
                padding: 60px 40px;
            }

            .yacht-left-content {
                padding-right: 0;
            }

            .yacht-right-content {
                padding-right: 0;
            }

            .related-yachts-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 20px;
            }
        }

        @media (max-width: 768px) {
            .hero-yacht {
                padding: 30px;
                height: 70vh;
            }

            .hero-content h1 {
                font-size: 32px;
            }

            .hero-content p {
                font-size: 15px;
            }

            .yacht-info-section {
                padding: 50px 30px;
            }

            .yacht-title-row {
                flex-direction: column;
                gap: 30px;
            }

            .yacht-main-info h2 {
                font-size: 28px;
            }

            .yacht-price,
            .yacht-ownership {
                font-size: 20px;
            }

            .yacht-content-row {
                display: flex;
                flex-direction: column;
                gap: 40px;
            }

            .yacht-right-column {
                order: 1;
            }

            .yacht-left-column {
                order: 2;
            }

            .related-yachts-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .section5,
            .section6 {
                padding: 50px 30px;
            }

            .section5-container,
            .section6-container {
                grid-template-columns: 1fr;
                gap: 30px;
            }

            .section5-content h2,
            .section6-content h2 {
                font-size: 28px;
            }

            .section5-content p,
            .section6-content p {
                font-size: 14px;
            }

            .section6-image img {
                margin-left: 0;
            }
        }

        @media (max-width: 480px) {
            .hero-yacht {
                height: 60vh;
                padding: 20px;
            }

            .hero-content h1 {
                font-size: 24px;
            }

            .yacht-info-section {
                padding: 40px 20px;
            }

            .yacht-main-info h2 {
                font-size: 22px;
            }

            .related-yacht-image {
                height: 180px;
            }

            .related-yacht-title {
                font-size: 16px;
            }

            .related-yacht-brand {
                font-size: 12px;
            }

            .related-yacht-specs {
                font-size: 11px;
            }

            .related-yacht-price {
                font-size: 18px;
            }

            .section5,
            .section6 {
                padding: 40px 20px;
            }

            .section5-content h2,
            .section6-content h2 {
                font-size: 24px;
            }

            .section5-content p,
            .section6-content p {
                font-size: 13px;
            }

            .section5-content .cta-button,
            .section6-content .cta-button {
                font-size: 10px;
                padding: 10px 20px;
            }
        }
    </style>
</head>
<body>
    @include('layouts.navbar-simple')

    <!-- Hero with Yacht Image and Description -->
    <section class="hero-yacht" style="background-image: url('{{ asset($yacht->main_image ?? '/images/yacht-default.jpg') }}');">
        <div class="hero-content">
            <h1>{{ $yacht->name }}</h1>
            <p>{{ $yacht->description }}</p>
            <a href="#photosGrid" class="view-gallery-btn" onclick="event.preventDefault(); document.getElementById('photosGrid').scrollIntoView({ behavior: 'smooth', block: 'start' });">VIEW GALLERY</a>
        </div>
    </section>

    <!-- Yacht Information -->
    <section class="yacht-info-section">
        <div class="yacht-info-container">
            <!-- Title and Price Row -->
            <div class="yacht-title-row">
                <div class="yacht-main-info">
                    <h2>{{ $yacht->name }}</h2>
                    <p class="yacht-price">
                        {{ $yacht->formatted_price }}
                        @if($yacht->ownership)
                            <span class="ownership-separator"> • </span>
                            <span class="yacht-ownership">{{ $yacht->ownership }}</span>
                        @endif
                    </p>
                    
                    <!-- Shares Committed Badge -->
                    @if($yacht->shares_committed)
                    <div style="margin-top: 12px;">
                        <span style="display: inline-block; padding: 6px 14px; background: rgba(6, 72, 82, 0.1); color: #064852; font-size: 11px; font-weight: 600; border-radius: 14px; text-transform: uppercase; letter-spacing: 0.5px; font-family: 'Work Sans', sans-serif;">
                            {{ $yacht->shares_committed }} Committed
                        </span>
                    </div>
                    @endif
                </div>

                <!-- Brand and Status Box (Right Side) -->
                <div style="padding: 0; min-width: 250px; display: flex; flex-direction: column; align-items: center; justify-content: flex-start; gap: 15px; margin-left: auto; margin-right: 60px;">
                    @if($yacht->brand)
                        <div style="font-family: 'Work Sans', sans-serif; font-size: 14px; font-weight: 600; color: #064852; text-transform: uppercase; letter-spacing: 1px; text-align: center; width: 100%;">
                            {{ $yacht->brand }}
                        </div>
                    @endif

                    @if($yacht->brand_logo)
                        <img src="{{ asset($yacht->brand_logo) }}" alt="{{ $yacht->brand }} Logo" style="max-width: 150px; max-height: 80px; object-fit: contain; margin: 0 auto;">
                    @endif

                    @if($yacht->status)
                        <div style="font-family: 'Work Sans', sans-serif; font-size: 12px; font-weight: 500; color: #064852; text-align: center; width: 100%;">
                            {{ ucfirst(str_replace('_', ' ', $yacht->status)) }}
                        </div>
                    @endif
                </div>
            </div>

            <!-- Content Row: 2 Columns Specifications -->
            <div class="yacht-content-row">
                <!-- LEFT COLUMN: Specifications Part 1 -->
                <div class="yacht-left-column">
                    <div class="yacht-specs-list">
                        <h4 class="spec-section-title">
                            <svg viewBox="0 0 24 24" fill="none" stroke="#064852" stroke-width="1.5">
                                <path d="M12 2L2 7l10 5 10-5-10-5z"/>
                                <path d="M2 17l10 5 10-5"/>
                                <path d="M2 12l10 5 10-5"/>
                            </svg>
                            Specifications
                        </h4>

                        @if($yacht->length_overall)
                        <p class="yacht-specs-detail">
                            <span class="spec-item">LOA: {{ $yacht->length_overall }}</span>
                        </p>
                        @endif

                        @if($yacht->beam)
                        <p class="yacht-specs-detail">
                            <span class="spec-item">Beam: {{ $yacht->beam }}</span>
                        </p>
                        @endif

                        @if($yacht->height)
                        <p class="yacht-specs-detail">
                            <span class="spec-item">Height: {{ $yacht->height }}</span>
                        </p>
                        @endif

                        @if($yacht->draft)
                        <p class="yacht-specs-detail">
                            <span class="spec-item">Draft: {{ $yacht->draft }}</span>
                        </p>
                        @endif

                        @if($yacht->loaded_displacement)
                        <p class="yacht-specs-detail">
                            <span class="spec-item">Loaded Displacement: {{ $yacht->loaded_displacement }}</span>
                        </p>
                        @endif

                        @if($yacht->cruising_speed)
                        <p class="yacht-specs-detail">
                            <span class="spec-item">Cruising Speed: {{ $yacht->cruising_speed }}</span>
                        </p>
                        @endif

                        @if($yacht->max_speed)
                        <p class="yacht-specs-detail">
                            <span class="spec-item">Max Speed: {{ $yacht->max_speed }}</span>
                        </p>
                        @endif

                        @if($yacht->main_engine)
                        <p class="yacht-specs-detail">
                            <span class="spec-item">Main Engine: {{ $yacht->main_engine }}</span>
                        </p>
                        @endif

                        @if($yacht->range)
                        <p class="yacht-specs-detail">
                            <span class="spec-item">Range: {{ $yacht->range }}</span>
                        </p>
                        @endif

                        @if($yacht->stabilizer)
                        <p class="yacht-specs-detail">
                            <span class="spec-item">Stabilizer: {{ $yacht->stabilizer }}</span>
                        </p>
                        @endif

                        @if($yacht->hull_material)
                        <p class="yacht-specs-detail">
                            <span class="spec-item">Hull Material: {{ $yacht->hull_material }}</span>
                        </p>
                        @endif
                    </div>
                </div>

                <!-- RIGHT COLUMN: Specifications Part 2 -->
                <div class="yacht-middle-column">
                    <div class="yacht-specs-list">
                        <h4 class="spec-section-title" style="visibility: hidden;">
                            Specifications
                        </h4>

                        @if($yacht->maximum_passengers)
                        <p class="yacht-specs-detail">
                            <span class="spec-item">Maximum Passengers: {{ $yacht->maximum_passengers }}</span>
                        </p>
                        @endif

                        @if($yacht->cabins)
                        <p class="yacht-specs-detail">
                            <span class="spec-item">Cabins: {{ $yacht->cabins }}</span>
                        </p>
                        @endif

                        @if($yacht->berths)
                        <p class="yacht-specs-detail">
                            <span class="spec-item">Berths: {{ $yacht->berths }}</span>
                        </p>
                        @endif

                        @if($yacht->heads)
                        <p class="yacht-specs-detail">
                            <span class="spec-item">Heads: {{ $yacht->heads }}</span>
                        </p>
                        @endif

                        @if($yacht->fuel_capacity)
                        <p class="yacht-specs-detail">
                            <span class="spec-item">Fuel Capacity: {{ $yacht->fuel_capacity }}</span>
                        </p>
                        @endif

                        @if($yacht->freshwater_capacity)
                        <p class="yacht-specs-detail">
                            <span class="spec-item">Freshwater Capacity: {{ $yacht->freshwater_capacity }}</span>
                        </p>
                        @endif

                        @if($yacht->holding_tank)
                        <p class="yacht-specs-detail">
                            <span class="spec-item">Holding Tank: {{ $yacht->holding_tank }}</span>
                        </p>
                        @endif

                        @if($yacht->hull_structure)
                        <p class="yacht-specs-detail">
                            <span class="spec-item">Hull Structure: {{ $yacht->hull_structure }}</span>
                        </p>
                        @endif

                        @if($yacht->equipment)
                        <p class="yacht-specs-detail">
                            <span class="spec-item">Equipment: {{ $yacht->equipment }}</span>
                        </p>
                        @endif

                        @if($yacht->certifications)
                        <p class="yacht-specs-detail">
                            <span class="spec-item">Certifications: {{ $yacht->certifications }}</span>
                        </p>
                        @endif

                        @if($yacht->brochure_url)
                        <a href="{{ $yacht->brochure_url }}" download class="download-brochure-btn" style="margin-top: 20px; display: inline-block;">DOWNLOAD BROCHURE →</a>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Details Section (Full Width Below) -->
            @if($yacht->details && is_array($yacht->details))
            <div class="yacht-details-section">
                <div class="yacht-details-list">
                    @foreach($yacht->details as $detail)
                        @if(isset($detail['title']) && isset($detail['subtitle']))
                        <div class="detail-item">
                            <strong>{{ $detail['title'] }}</strong>
                            <span>{{ $detail['subtitle'] }}</span>
                        </div>
                        @endif
                    @endforeach
                </div>
            </div>
            @endif
        </div>

        <!-- Additional Photos Section -->
        @if($yacht->gallery_images && is_array($yacht->gallery_images) && count($yacht->gallery_images) > 0)
        <div class="additional-photos-section">
            <div class="additional-photos-container">                
                <div class="photos-grid" id="photosGrid">
                    @foreach($yacht->gallery_images as $index => $photo)
                        <div class="photo-item {{ $index >= 6 ? 'hidden-photo' : '' }}" data-index="{{ $index }}" onclick="openLightbox({{ $index }})">
                            <img src="{{ asset($photo) }}" alt="Yacht Photo {{ $index + 1 }}">
                        </div>
                    @endforeach
                    
                </div>
                
                @if(count($yacht->gallery_images) > 6)
                <button class="view-more-btn" id="viewMoreBtn" onclick="togglePhotos()" style="display: none;">
                    <span id="btnText">View More</span>
                    <span id="btnIcon">↓</span>
                </button>
                @endif
                </div>
            </div>
        </div>

        <!-- Lightbox Modal -->
        <div class="lightbox-modal" id="lightboxModal" onclick="closeLightbox(event)">
            <button class="lightbox-close" onclick="closeLightbox()">&times;</button>
            <button class="lightbox-prev" onclick="changeLightboxImage(-1); event.stopPropagation();">‹</button>
            <div class="lightbox-content">
                <img class="lightbox-image" id="lightboxImage" src="" alt="Yacht Photo">
            </div>
            <button class="lightbox-next" onclick="changeLightboxImage(1); event.stopPropagation();">›</button>
            <div class="lightbox-counter" id="lightboxCounter"></div>
        </div>
        @endif

        <!-- Section 5 -->
        <section class="section5">
            <div class="section5-container">
                <div class="section5-image">
                    <img src="/images/sail01.png" alt="Sakanta Sail">
                </div>
                <div class="section5-content">
                    <h2>Ready to make it yours?</h2>
                    <p>Every Sakanta sail begins with a conversation.
                    Our team will guide you through ownership details, legal clarity, and experience design — so you can see how your next ocean sanctuary fits into your lifestyle.
                    </p>
                    <a href="https://wa.me/6281234567890?text=Hi%20Sakanta,%20I%20want%20to%20buy%20this%20luxury%20yacht" target="_blank" class="cta-button">Book A Private Call</a>
                </div>
            </div>
        </section>

        <!-- Section 6 - Reversed Layout -->
        <section class="section6">
            <div class="section6-container">
                <div class="section6-content">
                    <h2>Still curious about how Sakanta works?</h2>
                    <p>Behind every Sakanta sail is a story — of shared ownership, thoughtful management, and people who value serenity as much as you do.
                        From how we structure ownership to how voyages are scheduled, each step is designed for peace of mind and effortless belonging.</p>
                    <a href="{{ route('faq') }}" class="cta-button">Explore the Full Story</a>
                </div>
                <div class="section6-image">
                    <img src="/images/sail02.png" alt="Sakanta Sail">
                </div>
            </div>
        </section>

        <!-- Related Yachts Section -->
        @if(isset($relatedYachts) && $relatedYachts->count() > 0)
        <div class="related-yachts-section">
            <div class="related-yachts-container">
                <h4 class="related-yachts-title">Similar Yachts</h4>
                
                <div class="related-yachts-grid">
                    @foreach($relatedYachts as $relatedYacht)
                    <a href="{{ route('yacht.detail', $relatedYacht->slug) }}" class="related-yacht-card">
                        <img src="{{ asset($relatedYacht->main_image ?? '/images/yacht-default.jpg') }}" 
                             alt="{{ $relatedYacht->name }}" 
                             class="related-yacht-image">
                        
                        <div class="related-yacht-content">
                            <h5 class="related-yacht-title">{{ $relatedYacht->name }}</h5>
                            <p class="related-yacht-brand">{{ $relatedYacht->brand }}</p>
                            <p class="related-yacht-specs">
                                <!-- LOA -->
                                @if($relatedYacht->length_overall)
                                <span class="spec-item">
                                    <img src="{{ asset('images/Icon-22.png') }}" alt="LOA" style="width: 24px; height: 24px; object-fit: contain;">
                                    {{ $relatedYacht->length_overall }}
                                </span>
                                <span class="spec-separator">|</span>
                                @endif
                                <!-- Cruising Speed -->
                                @if($relatedYacht->cruising_speed)
                                <span class="spec-item">
                                    <img src="{{ asset('images/Icon-24.png') }}" alt="Cruising Speed" style="width: 24px; height: 24px; object-fit: contain;">
                                    {{ $relatedYacht->cruising_speed }}
                                </span>
                                <span class="spec-separator">|</span>
                                @endif
                                <!-- Maximum Passengers -->
                                @if($relatedYacht->maximum_passengers)
                                <span class="spec-item">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#064852" stroke-width="1.5">
                                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                                        <circle cx="9" cy="7" r="4"/>
                                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                                    </svg>
                                    {{ $relatedYacht->maximum_passengers }} pax
                                </span>
                                @endif
                            </p>
                            <p class="related-yacht-price">{{ $relatedYacht->formatted_price }}</p>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
        @endif
    </section>

    @include('layouts.footer')

    <script>
        // Toggle photos function
        function togglePhotos() {
            const btn = document.getElementById('viewMoreBtn');
            const btnText = document.getElementById('btnText');
            const allPhotos = document.querySelectorAll('.photo-item');
            const isExpanded = btn.classList.contains('expanded');
            
            if (isExpanded) {
                // Hide photos beyond 6
                allPhotos.forEach((photo, index) => {
                    if (index >= 6) {
                        photo.classList.add('hidden-photo');
                    }
                });
                btnText.textContent = 'View More';
                btn.classList.remove('expanded');
                // Scroll to photos section
                document.querySelector('.additional-photos-section').scrollIntoView({ behavior: 'smooth', block: 'start' });
            } else {
                // Show all photos
                allPhotos.forEach(photo => {
                    photo.classList.remove('hidden-photo');
                });
                btnText.textContent = 'View Less';
                btn.classList.add('expanded');
            }
        }

        // Initialize photos display
        function initializePhotos() {
            const allPhotos = document.querySelectorAll('.photo-item');
            const btn = document.getElementById('viewMoreBtn');
            
            // Hide photos beyond 6
            allPhotos.forEach((photo, index) => {
                if (index >= 6) {
                    photo.classList.add('hidden-photo');
                }
            });
            
            // Show button only if there are more than 6 photos
            if (allPhotos.length > 6 && btn) {
                btn.style.display = 'flex';
            }
        }

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', initializePhotos);

        // Lightbox functionality
        const galleryImages = @json($yacht->gallery_images ?? []);
        let currentImageIndex = 0;

        function openLightbox(index) {
            currentImageIndex = index;
            const modal = document.getElementById('lightboxModal');
            const img = document.getElementById('lightboxImage');
            const counter = document.getElementById('lightboxCounter');
            
            img.src = '{{ asset('') }}' + galleryImages[currentImageIndex];
            counter.textContent = `${currentImageIndex + 1} / ${galleryImages.length}`;
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeLightbox(event) {
            if (event && event.target.id !== 'lightboxModal' && event.type === 'click') {
                return;
            }
            const modal = document.getElementById('lightboxModal');
            modal.classList.remove('active');
            document.body.style.overflow = '';
        }

        function changeLightboxImage(direction) {
            currentImageIndex += direction;
            
            if (currentImageIndex < 0) {
                currentImageIndex = galleryImages.length - 1;
            } else if (currentImageIndex >= galleryImages.length) {
                currentImageIndex = 0;
            }
            
            const img = document.getElementById('lightboxImage');
            const counter = document.getElementById('lightboxCounter');
            
            img.src = '{{ asset('') }}' + galleryImages[currentImageIndex];
            counter.textContent = `${currentImageIndex + 1} / ${galleryImages.length}`;
        }

        // Keyboard navigation
        document.addEventListener('keydown', function(e) {
            const modal = document.getElementById('lightboxModal');
            if (modal.classList.contains('active')) {
                if (e.key === 'Escape') {
                    closeLightbox();
                } else if (e.key === 'ArrowLeft') {
                    changeLightboxImage(-1);
                } else if (e.key === 'ArrowRight') {
                    changeLightboxImage(1);
                }
            }
        });
    </script>
</body>
</html>
