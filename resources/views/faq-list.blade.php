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
        .categories-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; margin-bottom: 80px; }
        .category-card { background: white; padding: 40px 35px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); cursor: pointer; transition: all 0.3s; text-align: center; text-decoration: none; color: inherit; display: flex; flex-direction: column; align-items: center; min-height: 320px; }
        .category-card:hover { transform: translateY(-8px); box-shadow: 0 8px 20px rgba(0,0,0,0.15); }
        .category-icon { font-size: 48px; margin-bottom: 20px; }
        .category-card h3 { font-size: 24px; color: #064852; margin-bottom: 15px; font-weight: 600; line-height: 1.3; }
        .category-card p { font-size: 14px; color: #999; font-family: 'Work Sans'; line-height: 1.6; flex-grow: 1; margin-bottom: 15px; }
        .category-btn { display: inline-block; padding: 12px 30px; background: #064852; color: white; text-decoration: none; border-radius: 4px; margin-top: auto; font-size: 13px; letter-spacing: 2px; text-transform: uppercase; font-family: 'Work Sans'; font-weight: 600; transition: background 0.3s; }
        .category-btn:hover { background: #1e426e; }
        .no-faqs { text-align: center; padding: 60px 20px; color: #999; }
        
        /* Content Row Styles - Match About Page */
        .content-row-wrapper { max-width: 1200px; margin: 0 auto; padding-top: 120px; }
        .content-row { display: grid; grid-template-columns: 1fr 1fr; gap: 80px; align-items: center; }
        .content-image { width: 100%; height: 500px; border-radius: 20px; overflow: hidden; position: relative; }
        .content-image img { width: 100%; height: 100%; object-fit: cover; }
        .content-image::before { content: ''; position: absolute; top: -80px; left: -80px; width: 250px; height: 250px; border: 2px solid rgba(6, 72, 82, 0.15); border-radius: 50%; z-index: 1; }
        .content-text small { font-size: 14px; letter-spacing: 3px; text-transform: uppercase; color: #5a8aaa; display: block; margin-bottom: 20px; font-family: 'Work Sans', sans-serif; font-weight: 600; }
        .content-text h2 { font-size: 42px; font-weight: 400; color: #064852; margin-bottom: 25px; line-height: 1.3; font-family: 'Esther', serif; }
        .content-text p { font-size: 17px; line-height: 1.8; color: #064852; font-family: 'Work Sans', sans-serif; font-weight: 400; margin-bottom: 30px; }
        .content-cta { display: inline-block; padding: 14px 35px; background: transparent; color: #064852; text-decoration: none; border-radius: 0; font-size: 13px; letter-spacing: 2px; text-transform: uppercase; font-family: 'Work Sans', sans-serif; font-weight: 600; transition: all 0.3s; border: 2px solid #064852; }
        .content-cta:hover { background: #064852; color: white; transform: translateY(-2px); box-shadow: 0 6px 20px rgba(6, 72, 82, 0.3); }
        
        /* Contact Form Spacing - Override default padding */
        .contact-form-section { 
            padding-top: 80px !important;
            padding-bottom: 80px !important;
        }
        
        /* Common Questions Accordion Styles */
        .common-questions-wrapper { max-width: 900px; margin: 0 auto; padding-top: 120px; padding-bottom: 80px; }
        .common-questions-title { font-size: 42px; font-weight: 400; color: #064852; margin-bottom: 40px; text-align: center; font-family: 'Esther', serif; }
        .faq-accordion { display: flex; flex-direction: column; gap: 15px; }
        .faq-item { background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.08); transition: all 0.3s; }
        .faq-item:hover { box-shadow: 0 4px 12px rgba(0,0,0,0.12); }
        .faq-question { display: flex; justify-content: space-between; align-items: center; padding: 25px 30px; cursor: pointer; font-family: 'Work Sans', sans-serif; font-size: 17px; font-weight: 600; color: #064852; user-select: none; transition: all 0.3s; }
        .faq-question:hover { background: rgba(6, 72, 82, 0.03); }
        .faq-icon { font-size: 28px; font-weight: 300; color: #064852; transition: transform 0.3s; line-height: 1; }
        .faq-item.active .faq-icon { transform: rotate(45deg); }
        .faq-answer { max-height: 0; overflow: hidden; transition: max-height 0.4s ease, padding 0.4s ease; }
        .faq-item.active .faq-answer { max-height: 500px; padding: 0 30px 25px 30px; }
        .faq-answer p { font-family: 'Work Sans', sans-serif; font-size: 16px; line-height: 1.8; color: #064852; margin: 0; }
        
                @media (max-width: 768px) { 
            .faq-section { padding: 60px 30px; } 
            .hero-text h1 { font-size: 48px; } 
            .faq-title { font-size: 36px; } 
            .categories-grid { grid-template-columns: 1fr; }
            .content-row { grid-template-columns: 1fr; gap: 40px; }
            .content-image { height: 350px; }
            .content-image::before { display: none; }
            .content-text h2 { font-size: 32px; }
            .content-text p { font-size: 15px; }
            .content-cta { width: 100%; text-align: center; }
            .common-questions-wrapper { margin: 60px auto 0; padding-top: 60px; }
            .common-questions-title { font-size: 32px; }
            .faq-question { padding: 20px 20px; font-size: 15px; }
            .faq-answer p { font-size: 14px; }
            .faq-item.active .faq-answer-inner { padding: 15px 0; }
            .contact-form-section { padding-top: 60px !important; padding-bottom: 60px !important; }
        }

        @media (max-width: 480px) {
            .hero-text h1 { font-size: 36px; letter-spacing: 2px; }
            .hero-text p { font-size: 16px; }
            .faq-section { padding: 40px 20px; }
            .faq-title { font-size: 28px; margin-bottom: 40px; }
            .category-card { padding: 30px 25px; min-height: 280px; }
            .category-card h3 { font-size: 20px; }
            .category-icon { font-size: 40px; }
            .content-row { gap: 30px; }
            .content-text h2 { font-size: 28px; }
            .content-text p { font-size: 14px; }
            .content-cta { padding: 12px 25px; font-size: 12px; }
            .common-questions-title { font-size: 28px; }
            .faq-question { padding: 18px 15px; font-size: 14px; }
            .faq-icon { font-size: 24px; }
        }
    </style>
</head>
<body>
    @include('layouts.navbar')

    <section class="hero-faq">
        <div class="hero-text">
            <small>HELP CENTER</small>
            <h1>FAQs</h1>
            <p>Everything you need to know about co-owning with Sakanta — in one place.</p>
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

        <!-- Content Row Section -->
        <div class="content-row-wrapper" style="max-width: 1200px; margin: 80px auto 0;">
            <div class="content-row">
                <div class="content-image">
                    <img src="{{ asset('images/home section 2.jpg') }}" alt="Still Have Questions?">
                </div>
                <div class="content-text">
                    <h2>Still curious about how Sakanta works?</h2>
                    <p>Sakanta is built for those who value both serenity and certainty.
                    If you'd like to understand more about our process, ownership model, or how to start your journey, our representatives are here to help — personally and privately.</p>
                    <a href="https://wa.me/6281234567890?text=Hi%20Sakanta,%20I%20would%20like%20to%20know%20more%20about%20co-ownership" target="_blank" class="content-cta">Book a Private Talk with Our Team</a>
                </div>
            </div>
        </div>

        <!-- Common Questions Section -->
        <div class="common-questions-wrapper" style="max-width: 900px; margin: 100px auto 0;">
            <h2 class="common-questions-title">Common Questions</h2>
            
            <div class="faq-accordion">
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <span>What is co-ownership?</span>
                        <span class="faq-icon">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>Co-ownership with Sakanta allows you to own a fraction of a luxury property in Indonesia. You purchase shares in a property, giving you the right to use it for a designated number of days per year, proportional to your ownership stake.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <span>How does the ownership structure work?</span>
                        <span class="faq-icon">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>Each property is divided into fractional shares. When you purchase shares, you become a legal co-owner with proportional rights. All ownership is registered and legally binding under Indonesian property law.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <span>Can I sell my shares?</span>
                        <span class="faq-icon">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>Yes, shares can be sold to other interested buyers. Sakanta provides a marketplace platform to facilitate the buying and selling of shares among co-owners and new investors.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <span>What are the ongoing costs?</span>
                        <span class="faq-icon">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>Co-owners share the costs of property maintenance, management fees, and utilities proportional to their ownership stake. These costs are transparent and communicated annually.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <span>How do I book my stay?</span>
                        <span class="faq-icon">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>Owners can book their allocated days through our online portal. The booking system is managed fairly to ensure all co-owners have equal access to prime dates throughout the year.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Listings Section -->
    @include('components.featured-listings', ['listings' => $featuredListings ?? []])

    <!-- Contact Form Section -->
    @include('components.contact-form', [
        'title' => "We're here to help",
        'subtitle' => "Whether you're exploring co-ownership or just getting to know Sakanta, our team is happy to answer your questions and guide your next step.",
        'pageSource' => 'faq',
        'buttonText' => 'SUBMIT INQUIRY'
    ])

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

        // Toggle FAQ accordion
        function toggleFaq(element) {
            const faqItem = element.parentElement;
            const isActive = faqItem.classList.contains('active');
            
            // Close all other FAQ items
            document.querySelectorAll('.faq-item').forEach(item => {
                item.classList.remove('active');
            });
            
            // Toggle current item
            if (!isActive) {
                faqItem.classList.add('active');
            }
        }
    </script>
</body>
</html>


