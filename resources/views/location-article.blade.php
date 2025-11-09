<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $article->section1_title }} - {{ $location->name }} - SAKANTA</title>
    
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
            color: #2c3e50;
            background: #F7EFE2;
        }

        /* Section 1: Title - Image - Description */
        .section-one {
            background: #F7EFE2;
            padding: 120px 80px 80px 80px;
        }

        .section-one-title {
            font-family: 'Esther', 'Georgia', serif;
            font-size: 56px;
            font-weight: 400;
            color: #064852;
            margin-bottom: 50px;
            line-height: 1.3;
            text-align: left;
        }

        .section-one-image {
            max-width: 100%;
            margin: 0 0 50px 0;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
            height: 500px;
        }

        .section-one-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .section-one-desc {
            max-width: 900px;
            font-size: 18px;
            line-height: 1.8;
            color: #2c3e50;
            font-family: 'Work Sans', sans-serif;
            text-align: left;
        }

        /* Section 2: Subtitle - Paragraphs - Image */
        .section-two {
            background: #F7EFE2;
            padding: 100px 80px;
        }

        .section-two-container {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 0.8fr 2fr 1.2fr;
            gap: 60px;
            align-items: start;
        }

        .section-two-title h2 {
            font-family: 'Esther', 'Georgia', serif;
            font-size: 42px;
            font-weight: 400;
            color: #064852;
            margin: 0;
            line-height: 1.3;
            text-align: left;
        }

        .section-two-paragraphs {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .section-two-paragraphs p {
            font-size: 16px;
            line-height: 1.8;
            color: #555;
            text-align: left;
        }

        .section-two-image {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
            height: 300px;
        }

        .section-two-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        /* Section 3: Punchline - Button */
        .section-three {
            background: #F7EFE2;
            padding: 100px 80px;
        }

        .section-three-container {
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 60px;
        }

        .section-three-punchline {
            font-family: 'Esther', 'Georgia', serif;
            font-size: 48px;
            font-weight: 400;
            color: #064852;
            line-height: 1.4;
            width: 60%;
            text-align: left;
        }

        .section-three-button-wrapper {
            width: 40%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .section-three-btn {
            display: inline-block;
            padding: 15px 40px;
            border: 2px solid #064852;
            color: #064852;
            text-decoration: none;
            font-size: 13px;
            letter-spacing: 2px;
            text-transform: uppercase;
            font-family: "Work Sans", sans-serif;
            font-weight: 600;
            transition: all 0.3s;
            border-radius: 3px;
            white-space: nowrap;
        }

        .section-three-btn:hover {
            background: #064852;
            color: #F7EFE2;
        }

        /* Section 4: Take Away Points */
        .section-four {
            background: #F7EFE2;
            padding: 100px 80px;
        }

        .section-four-grid {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 40px;
        }

        .takeaway-point {
            text-align: left;
        }

        .takeaway-icon {
            width: 60px;
            height: 60px;
            background: rgba(6, 72, 82, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 0 20px 0;
        }

        .takeaway-icon svg {
            width: 30px;
            height: 30px;
            stroke: #064852;
            stroke-width: 2;
        }

        .takeaway-title {
            font-family: 'Esther', 'Georgia', serif;
            font-size: 20px;
            font-weight: 400;
            color: #064852;
            margin-bottom: 12px;
            line-height: 1.3;
            text-align: left;
        }

        .takeaway-explanation {
            font-size: 14px;
            line-height: 1.6;
            color: #666;
            text-align: left;
        }

        /* Section 5: CTA Section */
        .section-five {
            background: #064852;
            padding: 120px 80px;
            margin-bottom: 80px;
            text-align: center;
        }

        .section-five-container {
            max-width: 900px;
            margin: 0 auto;
        }

        .section-five-headline {
            font-family: 'Esther', 'Georgia', serif;
            font-size: 48px;
            font-weight: 400;
            color: #F7EFE2;
            margin-bottom: 30px;
            line-height: 1.3;
        }

        .section-five-desc {
            font-family: 'Work Sans', sans-serif;
            font-size: 18px;
            line-height: 1.8;
            color: rgba(247, 239, 226, 0.9);
            margin-bottom: 40px;
        }

        .section-five-btn {
            display: inline-block;
            padding: 18px 45px;
            border: 2px solid #F7EFE2;
            color: #F7EFE2;
            text-decoration: none;
            font-size: 13px;
            letter-spacing: 2px;
            text-transform: uppercase;
            font-family: "Work Sans", sans-serif;
            font-weight: 600;
            transition: all 0.3s;
            border-radius: 3px;
        }

        .section-five-btn:hover {
            background: #F7EFE2;
            color: #064852;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .section-two-container {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .section-three-container {
                flex-direction: column;
                align-items: flex-start;
                gap: 30px;
            }

            .section-three-punchline {
                width: 100%;
            }

            .section-three-button-wrapper {
                width: 100%;
                justify-content: flex-start;
            }

            .section-four-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 30px;
            }
        }

        @media (max-width: 768px) {
            .section-one,
            .section-two,
            .section-three,
            .section-four {
                padding: 60px 40px;
            }

            .section-five {
                padding: 60px 40px;
                margin-bottom: 60px;
            }

            .section-one-title {
                font-size: 38px;
            }

            .section-one-image {
                height: 350px;
            }

            .section-two-title h2 {
                font-size: 32px;
            }

            .section-two-image {
                height: 250px;
            }

            .section-three-punchline {
                font-size: 32px;
            }

            .section-four-grid {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .section-five-headline {
                font-size: 36px;
            }

            .section-five-desc {
                font-size: 16px;
            }
        }

        @media (max-width: 480px) {
            .section-one,
            .section-two,
            .section-three,
            .section-four {
                padding: 50px 25px;
            }

            .section-five {
                padding: 50px 25px;
                margin-bottom: 50px;
            }

            .section-one-title {
                font-size: 32px;
            }

            .section-one-image {
                height: 250px;
            }

            .section-one-desc {
                font-size: 16px;
            }

            .section-two-title h2 {
                font-size: 28px;
            }

            .section-two-image {
                height: 200px;
            }

            .section-three-punchline {
                font-size: 26px;
            }

            .section-three-btn {
                padding: 12px 30px;
                font-size: 11px;
            }

            .section-five-headline {
                font-size: 28px;
            }

            .section-five-desc {
                font-size: 15px;
            }

            .section-five-btn {
                padding: 14px 35px;
                font-size: 11px;
            }
        }
    </style>
    
    <script>
        // Disable navbar color change IMMEDIATELY - before navbar loads
        // Override the updateNavbarDetail function before it's called
        window.updateNavbarDetail = function() {
            const navbar = document.getElementById('navbar-detail');
            const navbarLogo = document.getElementById('navbar-detail-logo');
            if (navbar && navbarLogo) {
                navbar.classList.remove('nav-hero', 'nav-dark');
                navbar.classList.add('nav-light');
                navbarLogo.src = '/images/Logo-04.png';
            }
        };
    </script>
</head>
<body>
    <style>
        /* Override navbar to always cream/beige color - placed before navbar include */
        .navbar-simple {
            background: #F7EFE2 !important;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1) !important;
        }
        .navbar-simple a,
        .navbar-simple .nav-center a {
            color: #064852 !important;
        }
        .navbar-simple .logo,
        .navbar-simple .logo-text {
            color: #064852 !important;
        }
        .navbar-simple .hamburger span {
            background: #064852 !important;
        }
        .navbar-simple .nav-center .separator {
            color: #064852 !important;
            opacity: 0.3 !important;
        }
        /* Search bar styling */
        .navbar-simple .search-bar input,
        .navbar-simple .navbar-search-input {
            border: 2px solid #064852 !important;
            background: rgba(6, 72, 82, 0.05) !important;
            color: #064852 !important;
        }
        .navbar-simple .search-bar input::placeholder,
        .navbar-simple .navbar-search-input::placeholder {
            color: rgba(6, 72, 82, 0.5) !important;
        }
        .navbar-simple .search-bar svg {
            stroke: #064852 !important;
        }
        /* Language button */
        .navbar-simple .lang-btn {
            color: #064852 !important;
        }
        .navbar-simple .lang-btn svg {
            stroke: #064852 !important;
        }
        /* User button */
        .navbar-simple .user-btn {
            background: rgba(6, 72, 82, 0.1) !important;
            border: 2px solid #064852 !important;
        }
        .navbar-simple .user-btn span {
            color: #064852 !important;
        }
        .navbar-simple .user-btn svg {
            fill: #064852 !important;
        }
        /* Sign in button */
        .navbar-simple .book-now-btn {
            background: #064852 !important;
            color: white !important;
            border: 2px solid #064852 !important;
        }
        /* Ensure no transparency on scroll - override all states */
        .navbar-simple.nav-hero,
        .navbar-simple.nav-light,
        .navbar-simple.nav-dark,
        .navbar-simple.scrolled {
            background: #F7EFE2 !important;
        }
        .navbar-simple.nav-hero a,
        .navbar-simple.nav-light a,
        .navbar-simple.nav-dark a,
        .navbar-simple.scrolled a {
            color: #064852 !important;
        }
        /* Override initial hero state */
        .navbar-simple.nav-hero .nav-center a,
        .navbar-simple.nav-hero .nav-center span {
            color: #064852 !important;
        }
        .navbar-simple.nav-hero .nav-center a::after {
            background: #064852 !important;
        }
    </style>
    
    @include('layouts.navbar-simple')
    
    <script>
        // Immediately force logo change (before DOMContentLoaded)
        (function() {
            const checkAndUpdate = function() {
                const navbar = document.getElementById('navbar-detail');
                const navbarLogo = document.getElementById('navbar-detail-logo');
                
                if (navbar && navbarLogo) {
                    navbar.classList.remove('nav-hero', 'nav-dark');
                    navbar.classList.add('nav-light');
                    navbarLogo.src = '/images/Logo-04.png';
                } else {
                    // If elements not found, try again in 10ms
                    setTimeout(checkAndUpdate, 10);
                }
            };
            
            // Run immediately
            checkAndUpdate();
        })();
    </script>

    <!-- Section 1: Title - Image - Description -->
    <section class="section-one">
        <h1 class="section-one-title">{{ $article->section1_title }}</h1>
        
        @if($article->section1_image)
        <div class="section-one-image">
            <img src="{{ asset($article->section1_image) }}" alt="{{ $article->section1_title }}">
        </div>
        @endif
        
        <div class="section-one-desc">
            {!! nl2br(e($article->section1_desc)) !!}
        </div>
    </section>

    <!-- Section 2: Subtitle - Paragraphs - Image Template -->
    <section class="section-two">
        <div class="section-two-container">
            <div class="section-two-title">
                <h2>{{ $article->section2_subtitle }}</h2>
            </div>
            <div class="section-two-paragraphs">
                @foreach($article->section2_paragraphs as $paragraph)
                    <p>{{ $paragraph }}</p>
                @endforeach
            </div>
            <div class="section-two-image">
                <!-- Template image - tidak dari input -->
                <img src="/images/article-template.jpg" alt="Location Feature" onerror="this.src='/images/locations/{{ $location->image }}'">
            </div>
        </div>
    </section>

    <!-- Section 3: Punchline - Button -->
    <section class="section-three">
        <div class="section-three-container">
            <p class="section-three-punchline">{{ $article->section3_punchline }}</p>
            <div class="section-three-button-wrapper">
                <a href="{{ route('location.properties', $location->slug) }}" class="section-three-btn">View Open Villas</a>
            </div>
        </div>
    </section>

    <!-- Section 4: Take Away Points -->
    <section class="section-four">
        <div class="section-four-grid">
            @foreach($article->section4_points as $point)
            <div class="takeaway-point">
                <div class="takeaway-icon">
                    <svg fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
                <h3 class="takeaway-title">{{ $point['title'] }}</h3>
                <p class="takeaway-explanation">{{ $point['explanation'] }}</p>
            </div>
            @endforeach
        </div>
    </section>

    <!-- Section 5: CTA Section -->
    <section class="section-five">
        <div class="section-five-container">
            <h2 class="section-five-headline">Ready to make your dream home a reality?</h2>
            <p class="section-five-desc">
                Owning a luxury second home doesn't have to stay a dream.<br>
                With Sakanta, you can co-own a fully managed, high-end property — and enjoy the privacy, comfort, and cultural richness of Indonesia's finest destinations.<br>
                Start your journey today and see how effortless co-ownership can be.
            </p>
            <a href="{{ route('listings') }}#location-section" class="section-five-btn">Explore Co-Ownership</a>
        </div>
    </section>

    @include('layouts.footer')

    @include('components.whatsapp-contact')
</body>
</html>
