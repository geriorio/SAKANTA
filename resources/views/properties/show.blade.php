<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Barnfield Cottage - SAKANTA</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Georgia', serif;
            color: #2c3e50;
            background: #f5f2ea;
        }

        /* ===== SECTION 1: HERO WITH OVERLAY TEXT ===== */
        .hero-property {
            height: 100vh;
            background-size: cover;
            background-position: center;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            padding-left: 80px;
        }

        .hero-property::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.3);
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
            margin-bottom: 30px;
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
            background: #2c5f7f;
            color: white;
            text-decoration: none;
            font-size: 13px;
            letter-spacing: 2px;
            text-transform: uppercase;
            font-weight: 600;
            transition: all 0.3s;
            border-radius: 3px;
        }

        .view-gallery-btn:hover {
            background: #1a3f5f;
            transform: translateY(-2px);
        }

        /* ===== SECTION 2: PROPERTY INFO ===== */
        .property-info-section {
            background: #f5f2ea;
            padding: 80px 80px 60px;
        }

        .property-info-container {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 280px 1fr;
            gap: 80px;
            position: relative;
        }

        .property-left-column {
            /* Left column for title, price and features only */
        }

        .property-right-column {
            /* Right column for specs, address, button, description */
            position: relative;
        }

        .property-main-info h2 {
            font-size: 42px;
            font-weight: 400;
            color: #2c5f7f;
            margin-bottom: 25px;
            line-height: 1.2;
        }

        .property-price {
            font-size: 26px;
            font-weight: 600;
            color: #2c5f7f;
            margin-bottom: 50px;
        }

        .property-specs-list {
            font-size: 14px;
            color: #2c5f7f;
            line-height: 1.5;
            margin-bottom: 12px;
        }

        .property-address {
            font-size: 14px;
            color: #2c5f7f;
            margin-bottom: 12px;
        }

        .check-maps-btn {
            display: inline-block;
            padding: 8px 18px;
            border: 2px solid #2c5f7f;
            color: #2c5f7f;
            text-decoration: none;
            font-size: 10px;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            transition: all 0.3s;
            margin-bottom: 30px;
        }

        .check-maps-btn:hover {
            background: #2c5f7f;
            color: white;
        }

        .property-features {
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        .feature-item {
            display: flex;
            gap: 18px;
            align-items: flex-start;
        }

        .feature-icon {
            width: 40px;
            height: 40px;
            flex-shrink: 0;
        }

        .feature-icon svg {
            width: 100%;
            height: 100%;
            stroke: #2c5f7f;
            stroke-width: 1.5;
        }

        .feature-text h3 {
            font-size: 15px;
            font-weight: 600;
            color: #2c5f7f;
            margin-bottom: 5px;
        }

        .feature-text p {
            font-size: 12px;
            color: #2c5f7f;
            line-height: 1.5;
        }

        .property-icon-large {
            position: absolute;
            top: 0;
            right: 0;
            width: 120px;
            height: 120px;
        }

        .property-icon-large svg {
            width: 100%;
            height: 100%;
            stroke: #2c5f7f;
            stroke-width: 1;
        }

        /* Right column content */
        .property-right-content {
            padding-right: 140px;
        }

        .property-description-right {
            margin-top: 25px;
        }

        .property-description-right p {
            font-size: 14px;
            line-height: 1.7;
            color: #2c5f7f;
            margin-bottom: 16px;
        }

        /* ===== SECTION 3: INTERIOR IMAGES ===== */
        .interior-section {
            background: #f5f2ea;
            padding: 0;
            position: relative;
        }

        .interior-container {
            max-width: 100%;
            margin: 0;
            position: relative;
        }

        .interior-single-image {
            position: relative;
            width: 100%;
            height: 70vh;
            min-height: 500px;
            overflow: hidden;
        }

        .interior-single-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .interior-overlay-text {
            position: absolute;
            top: 60px;
            left: 80px;
            z-index: 2;
        }

        .interior-overlay-text h2 {
            font-size: 48px;
            font-weight: 400;
            color: white;
            line-height: 1.3;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }

        /* ===== SECTION 4: PIED-A-TERRE HEADER ===== */
        .pied-header-section {
            background: #f5f2ea;
            padding: 80px 80px 40px;
            text-align: center;
        }

        .pied-header-container {
            max-width: 900px;
            margin: 0 auto;
        }

        .pied-header-icon {
            width: 70px;
            height: 70px;
            margin: 0 auto 30px;
        }

        .pied-header-icon svg {
            width: 100%;
            height: 100%;
            stroke: #2c5f7f;
            stroke-width: 1.5;
        }

        .pied-header-container h2 {
            font-size: 42px;
            font-weight: 400;
            color: #2c5f7f;
            margin-bottom: 25px;
            line-height: 1.3;
        }

        .pied-header-container p {
            font-size: 16px;
            line-height: 1.7;
            color: #2c5f7f;
        }

        /* ===== SECTION 5: PIED-A-TERRE GRID ===== */
        .pied-a-terre-section {
            background: #f5f2ea;
            padding: 40px 80px 80px;
        }

        .pied-a-terre-container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .pied-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .pied-box {
            position: relative;
            height: 500px;
            overflow: hidden;
            border: 2px solid #2c5f7f;
            border-radius: 15px;
        }

        .pied-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .pied-box-icon {
            position: absolute;
            bottom: 30px;
            left: 30px;
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s;
        }

        .pied-box-icon:hover {
            background: white;
            transform: scale(1.1);
        }

        .pied-box-icon svg {
            width: 24px;
            height: 24px;
            stroke: #2c5f7f;
            stroke-width: 2;
        }

        .pied-box-text {
            background: #f5f2ea;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-end;
            padding: 50px 40px;
            text-align: center;
        }

        .pied-text-icon {
            width: 80px;
            height: 80px;
            margin-bottom: 30px;
        }

        .pied-text-icon svg {
            width: 100%;
            height: 100%;
            stroke: #2c5f7f;
            stroke-width: 1.5;
        }

        .pied-box-text h3 {
            font-size: 20px;
            font-weight: 600;
            color: #2c5f7f;
            margin-bottom: 15px;
            line-height: 1.3;
        }

        .pied-box-text p {
            font-size: 14px;
            line-height: 1.6;
            color: #2c5f7f;
        }

        /* ===== SECTION 5: FAQ SECTION ===== */
        .faq-section {
            background: #2c5f7f;
            padding: 80px 80px;
        }

        .faq-container {
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .faq-header {
            flex: 0 0 300px;
        }

        .faq-header h2 {
            font-size: 42px;
            font-weight: 400;
            color: white;
            margin-bottom: 20px;
        }

        .faq-icon {
            width: 100px;
            height: 100px;
            margin-top: 20px;
        }

        .faq-icon svg {
            width: 100%;
            height: 100%;
            stroke: white;
            stroke-width: 1;
        }

        .faq-list {
            flex: 1;
            max-width: 900px;
        }

        .faq-item {
            border-top: 1px solid rgba(255, 255, 255, 0.3);
            padding: 30px 0;
        }

        .faq-question {
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            user-select: none;
        }

        .faq-question h3 {
            font-size: 20px;
            font-weight: 600;
            color: white;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .faq-toggle {
            font-size: 32px;
            color: white;
            font-weight: 300;
            transition: transform 0.3s;
        }

        .faq-item.active .faq-toggle {
            transform: rotate(45deg);
        }

        .faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
        }

        .faq-item.active .faq-answer {
            max-height: 500px;
            margin-top: 20px;
        }

        .faq-answer p {
            font-size: 16px;
            line-height: 1.8;
            color: white;
            opacity: 0.9;
        }

        /* ===== SECTION 6: FOUNDER SECTION ===== */
        .founder-section {
            background: #f5f2ea;
            display: grid;
            grid-template-columns: 1fr 1fr;
            min-height: 700px;
        }

        .founder-image {
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        .founder-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .founder-content {
            padding: 80px 80px 80px 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .founder-icon-group {
            display: flex;
            gap: 15px;
            margin-bottom: 30px;
        }

        .founder-small-icon {
            width: 50px;
            height: 50px;
        }

        .founder-small-icon svg {
            width: 100%;
            height: 100%;
            stroke: #2c5f7f;
            stroke-width: 1;
        }

        .founder-content p {
            font-size: 16px;
            line-height: 1.8;
            color: #2c5f7f;
            margin-bottom: 25px;
        }

        .founder-content h2 {
            font-size: 52px;
            font-weight: 400;
            color: #2c5f7f;
            margin-bottom: 30px;
            line-height: 1.2;
        }

        .founder-social {
            display: flex;
            gap: 20px;
            margin-top: 30px;
        }

        .social-icon {
            width: 40px;
            height: 40px;
            border: 2px solid #2c5f7f;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
            cursor: pointer;
        }

        .social-icon:hover {
            background: #2c5f7f;
        }

        .social-icon:hover svg {
            stroke: white;
        }

        .social-icon svg {
            width: 20px;
            height: 20px;
            stroke: #2c5f7f;
            stroke-width: 2;
            transition: stroke 0.3s;
        }

        .founder-copyright {
            font-size: 13px;
            color: #2c5f7f;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    @include('layouts.navbar-simple')

    <!-- SECTION 1: Hero with Property Image -->
    <section class="hero-property" style="background-image: url('/images/villa1.jpg');">
        <div class="hero-content">
            <h1>Your Sanctuary,<br>To Recharge Life's Battery.</h1>
            <p>Explore the space that blends comfort with natural beauty.</p>
            <a href="#" class="view-gallery-btn">VIEW GALLERY</a>
        </div>
    </section>

    <!-- SECTION 2: Property Information -->
    <section class="property-info-section">
        <div class="property-info-container">
            <!-- LEFT COLUMN: Title, Price, Features ONLY -->
            <div class="property-left-column">
                <div class="property-main-info">
                    <h2>The Barnfield Cottage</h2>
                    <p class="property-price">Rp. 5.000.000.000</p>
                </div>

                <div class="property-features">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <svg viewBox="0 0 24 24" fill="none">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg>
                        </div>
                        <div class="feature-text">
                            <h3>New Construction</h3>
                            <p>Brand-new townhouse with steel design and top-tier amenities.</p>
                        </div>
                    </div>

                    <div class="feature-item">
                        <div class="feature-icon">
                            <svg viewBox="0 0 24 24" fill="none">
                                <circle cx="12" cy="12" r="10"></circle>
                                <path d="M12 6v6l4 2"></path>
                            </svg>
                        </div>
                        <div class="feature-text">
                            <h3>Central Location</h3>
                            <p>Located in the heart of town, close to dining, shopping & adventure.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- RIGHT COLUMN: Specs, Address, Button, Description + Diamond Icon -->
            <div class="property-right-column">
                <div class="property-icon-large">
                    <svg viewBox="0 0 100 100" fill="none">
                        <path d="M 20 50 L 50 20 L 80 50 L 50 80 Z" stroke="currentColor" fill="none"/>
                        <path d="M 35 50 L 50 35 L 65 50 L 50 65 Z" stroke="currentColor" fill="none"/>
                    </svg>
                </div>

                <div class="property-right-content">
                    <p class="property-specs-list">
                        1/4 Ownership<br>
                        3 BDS  |  3.5 BA  |  1,921 FT
                    </p>
                    
                    <p class="property-address">Suweta St No. 190, Ubud, Bali 80571</p>
                    
                    <a href="#" class="check-maps-btn">CHECK MAPS →</a>

                    <div class="property-description-right">
                        <p>Nestled in the heart of nature, The Barnfield reimagines modern comfort through the soul of Balinese tranquility. This newly built villa harmoniously blends minimalist architecture with the warmth of handcrafted materials — creating a sanctuary that feels both refined and grounded.</p>
                        
                        <p>Step inside and feel the openness of high wooden ceilings and expansive glass doors that frame the lush rice terraces beyond. Natural light flows through every corner, connecting the indoors with the gentle rhythm of the fields outside.</p>
                        
                        <p>Whether you're seeking a peaceful retreat, a creative escape, or a gathering space for loved ones, The Barnfield offers a seamless blend of contemporary design and the timeless calm of Ubud's landscape.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 3: Interior Image with Overlay -->
    <section class="interior-section">
        <div class="interior-container">
            <div class="interior-single-image">
                <img src="/images/villa2.jpg" alt="Interior">
                <div class="interior-overlay-text">
                    <h2>Your Space, Your Story.</h2>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== SECTION 4: PIED-A-TERRE HEADER ===== -->
    <section class="pied-header-section">
        <div class="pied-header-container">
            <div class="pied-header-icon">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z" />
                </svg>
            </div>
            <h2>Your Pied-à-terre in The Mountains,<br>The Forest or The Countryside.</h2>
            <p>The cottage has evolved. That's why we're creating a simpler and more accessible alternative by building it better and faster, and by future-proofing it with our Base Ecosystem.</p>
        </div>
    </section>

    <!-- ===== SECTION 5: PIED-A-TERRE GRID ===== -->
    <section class="pied-a-terre-section">
        <div class="pied-a-terre-container">
            <div class="pied-grid">
                <!-- Box 1: Image with zoom icon -->
                <div class="pied-box">
                    <img src="/images/villa2.jpg" alt="Interior 1">
                    <div class="pied-box-icon">
                        <svg viewBox="0 0 24 24" fill="none">
                            <circle cx="11" cy="11" r="8"></circle>
                            <path d="m21 21-4.35-4.35"></path>
                            <line x1="11" y1="8" x2="11" y2="14"></line>
                            <line x1="8" y1="11" x2="14" y2="11"></line>
                        </svg>
                    </div>
                </div>

                <!-- Box 2: Image with zoom icon -->
                <div class="pied-box">
                    <img src="/images/villa3.jpg" alt="Interior 2">
                    <div class="pied-box-icon">
                        <svg viewBox="0 0 24 24" fill="none">
                            <circle cx="11" cy="11" r="8"></circle>
                            <path d="m21 21-4.35-4.35"></path>
                            <line x1="11" y1="8" x2="11" y2="14"></line>
                            <line x1="8" y1="11" x2="14" y2="11"></line>
                        </svg>
                    </div>
                </div>

                <!-- Box 3: Text with icon at bottom -->
                <div class="pied-box pied-box-text">
                    <div class="pied-text-icon">
                        <svg viewBox="0 0 100 100" fill="none">
                            <rect x="30" y="20" width="40" height="60" rx="5" stroke="currentColor" stroke-width="2"/>
                            <line x1="50" y1="30" x2="50" y2="40" stroke="currentColor" stroke-width="2"/>
                            <line x1="50" y1="50" x2="50" y2="60" stroke="currentColor" stroke-width="2"/>
                            <circle cx="50" cy="70" r="3" fill="currentColor"/>
                        </svg>
                    </div>
                    <h3>More time, to do less</h3>
                    <p>An easy to manage home means less to worry about - giving you more time to do what you love with those you love.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 5: FAQ -->
    <section class="faq-section">
        <div class="faq-container">
            <div class="faq-header">
                <h2>FAQ</h2>
                <div class="faq-icon">
                    <svg viewBox="0 0 100 100" fill="none">
                        <path d="M 20 50 L 50 20 L 80 50 L 50 80 Z" stroke="currentColor"/>
                        <path d="M 35 50 L 50 35 L 65 50 L 50 65 Z" stroke="currentColor"/>
                    </svg>
                </div>
            </div>

            <div class="faq-list">
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <h3>GENERAL</h3>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>Sakanta offers fractional ownership of luxury villas in Bali. You own a share of the property and can use it for a set number of weeks per year. All maintenance, management, and booking are handled for you.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <h3>PRICING</h3>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>Pricing varies based on the property and ownership share. We offer 1/4 and 1/8 ownership options. Contact us for detailed pricing and payment plans.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <h3>DESIGN</h3>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>Each villa is designed with sustainability and comfort in mind. We use natural materials, maximize natural light, and blend modern architecture with Balinese aesthetics.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 6: Founder Section -->
    <section class="founder-section">
        <div class="founder-image">
            <img src="/images/villa1.jpg" alt="Founder">
        </div>

        <div class="founder-content">
            <div class="founder-icon-group">
                <div class="founder-small-icon">
                    <svg viewBox="0 0 50 50" fill="none">
                        <path d="M 10 25 L 25 10 L 40 25 L 25 40 Z" stroke="currentColor"/>
                    </svg>
                </div>
                <div class="founder-small-icon">
                    <svg viewBox="0 0 50 50" fill="none">
                        <path d="M 10 25 L 25 10 L 40 25 L 25 40 Z" stroke="currentColor"/>
                    </svg>
                </div>
            </div>

            <p>Hi! I'm Julien, founder of Sakanta Living. As an architect with experience in the Arctic, the Amazonian jungle and Copenhagen, I've had the chance to study some truly amazing ways of living. They almost always come down to two basic ideas: building smarter and living simpler.</p>

            <p>Shouldn't we strive for that too? I think so – and that's why I created Sakanta.</p>

            <h2>Live It All</h2>

            <div class="founder-social">
                <div class="social-icon">
                    <svg viewBox="0 0 24 24" fill="none">
                        <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                    </svg>
                </div>
                <div class="social-icon">
                    <svg viewBox="0 0 24 24" fill="none">
                        <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                        <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                        <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                    </svg>
                </div>
                <div class="social-icon">
                    <svg viewBox="0 0 24 24" fill="none">
                        <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path>
                    </svg>
                </div>
            </div>

            <p class="founder-copyright">© All right reserved - SAKANTA</p>
        </div>
    </section>

    <script>
        function toggleFaq(element) {
            const faqItem = element.parentElement;
            const isActive = faqItem.classList.contains('active');
            
            // Close all FAQ items
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
