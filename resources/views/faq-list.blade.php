<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>FAQs - SAKANTA</title>
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
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Esther', 'Georgia', serif; color: #2c3e50; }
        .hero-faq { height: 100vh; background: url('/images/hero5.jpg') center/cover no-repeat; position: relative; display: flex; flex-direction: column; align-items: center; justify-content: center; }
        .hero-faq::before { content: ''; position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.4); }
        .hero-text { position: relative; z-index: 2; text-align: center; color: white; max-width: 800px; padding: 0 20px; }
        .hero-text small { font-size: 18px; letter-spacing: 4px; text-transform: uppercase; display: block; margin-bottom: 20px; opacity: 0.9; font-family: 'Work Sans'; font-weight: 500; }
        .hero-text h1 { font-size: 82px; font-weight: 300; letter-spacing: 4px; margin-bottom: 30px; }
        .hero-text p { font-size: 20px; line-height: 1.6; opacity: 0.95; font-family: 'Work Sans'; }
        .scroll-indicator { position: relative; z-index: 2; color: white; font-size: 24px; animation: bounce 2s infinite; cursor: pointer; }
        @keyframes bounce { 0%, 20%, 50%, 80%, 100% { transform: translateY(0); } 40% { transform: translateY(-10px); } 60% { transform: translateY(-5px); } }
        .faq-section { background: #F7EFE2; padding: 100px 60px 80px; }
        .faq-container { max-width: 1200px; margin: 0 auto; }
        .faq-title { font-size: 52px; font-weight: 400; color: #064852; margin-bottom: 60px; text-align: center; }
        .categories-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; }
        .category-card { background: white; padding: 40px 35px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); cursor: pointer; transition: all 0.3s; text-align: center; text-decoration: none; color: inherit; display: flex; flex-direction: column; align-items: center; min-height: 320px; }
        .category-card:hover { transform: translateY(-8px); box-shadow: 0 8px 20px rgba(0,0,0,0.15); }
        .category-icon { font-size: 48px; margin-bottom: 20px; }
        .category-card h3 { font-size: 24px; color: #064852; margin-bottom: 15px; font-weight: 600; line-height: 1.3; }
        .category-card p { font-size: 14px; color: #999; font-family: 'Work Sans'; line-height: 1.6; flex-grow: 1; margin-bottom: 15px; }
        .category-btn { display: inline-block; padding: 12px 30px; background: #064852; color: white; text-decoration: none; border-radius: 4px; margin-top: auto; font-size: 13px; letter-spacing: 2px; text-transform: uppercase; font-family: 'Work Sans'; font-weight: 600; transition: background 0.3s; }
        .category-btn:hover { background: #1e426e; }
        .no-faqs { text-align: center; padding: 60px 20px; color: #999; }
        @media (max-width: 768px) { .faq-section { padding: 60px 30px; } .hero-text h1 { font-size: 48px; } .faq-title { font-size: 36px; } .categories-grid { grid-template-columns: 1fr; } }
    </style>
</head>
<body>
    @include('layouts.navbar')

    <section class="hero-faq">
        <div class="hero-text">
            <small>HELP CENTER</small>
            <h1>FAQs</h1>
            <p>Find answers to commonly asked questions about Sakanta's co-ownership model, properties, and services.</p>
        </div>
        <div class="scroll-indicator" onclick="document.querySelector('.faq-section').scrollIntoView({ behavior: 'smooth' })" style="cursor: pointer;">↓</div>
    </section>

    <section class="faq-section">
        <div class="faq-container">
            <h2 class="faq-title">Browse FAQ Categories</h2>

            @if($faqs->count() > 0)
            <div class="categories-grid">
                @foreach($faqs as $faq)
                <a href="{{ route('faq.show', $faq->slug) }}" class="category-card" onclick="sessionStorage.setItem('scrollToFaqCategories', 'true')">
                    @if($faq->icon)
                        <img src="{{ asset('storage/' . $faq->icon) }}" alt="{{ $faq->title }}" style="width: 60px; height: 60px; object-fit: cover; border-radius: 50%; margin-bottom: 15px;">
                    @else
                        <div class="category-icon">📖</div>
                    @endif
                    <h3>{{ $faq->title }}</h3>
                    <p>{{ $faq->description }}</p>
                    <span class="category-btn">View Questions</span>
                </a>
                @endforeach
            </div>
            @else
            <div class="no-faqs">
                <p>No FAQ categories available at the moment.</p>
            </div>
            @endif
        </div>
    </section>

    <!-- Featured Listings Section -->
    @include('components.featured-listings', ['listings' => $featuredListings ?? []])

    @include('layouts.footer')

    <script>
        // Check if coming back from detail page
        window.addEventListener('load', function() {
            if (sessionStorage.getItem('scrollToFaqCategories')) {
                sessionStorage.removeItem('scrollToFaqCategories');
                setTimeout(function() {
                    const faqSection = document.querySelector('.faq-section');
                    if (faqSection) {
                        faqSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }
                }, 100);
            }
        });
    </script>
</body>
</html>


