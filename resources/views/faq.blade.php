<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>FAQs - SAKANTA</title>
    
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
        .hero-faq {
            height: 100vh;
            background: url('/images/hero5.jpg') center/cover no-repeat;
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .hero-faq::before {
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
            max-width: 800px;
            padding: 0 20px;
        }

        .hero-text small {
            font-size: 18px;
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
            font-size: 20px;
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

        /* FAQ Categories Section */
        .faq-categories {
            background: #F7EFE2;
            padding: 80px 80px 40px;
        }

        .categories-container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .categories-header {
            text-align: center;
            margin-bottom: 60px;
        }

        .categories-header h2 {
            font-size: 42px;
            font-weight: 400;
            color: #064852;
            margin-bottom: 15px;
        }

        .categories-header p {
            font-size: 18px;
            color: #5a8aaa;
            font-family: 'Work Sans', sans-serif;
            font-weight: 400;
        }

        .categories-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 25px;
            margin-bottom: 60px;
        }

        .category-card {
            background: white;
            padding: 30px 25px;
            border-radius: 12px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 2px solid transparent;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .category-card:hover {
            transform: translateY(-5px);
            border-color: #064852;
            box-shadow: 0 8px 25px rgba(6, 72, 82, 0.15);
        }

        .category-card.active {
            background: #064852;
            border-color: #064852;
            transform: translateY(-5px);
        }

        .category-icon {
            font-size: 42px;
            margin-bottom: 15px;
        }

        .category-card h3 {
            font-size: 18px;
            font-weight: 600;
            color: #064852;
            margin-bottom: 8px;
            font-family: 'Work Sans', sans-serif;
        }

        .category-card.active h3,
        .category-card.active p {
            color: white;
        }

        .category-card p {
            font-size: 13px;
            color: #5a8aaa;
            font-family: 'Work Sans', sans-serif;
            font-weight: 400;
        }

        /* FAQ Content Section */
        .faq-content {
            background: #F7EFE2;
            padding: 40px 80px 100px;
        }

        .faq-container {
            max-width: 1000px;
            margin: 0 auto;
        }

        .faq-category-title {
            font-size: 36px;
            font-weight: 400;
            color: #064852;
            margin-bottom: 40px;
            padding-bottom: 20px;
            border-bottom: 2px solid #064852;
        }

        .faq-category-section {
            display: none;
        }

        .faq-category-section.active {
            display: block;
        }

        .faq-item {
            background: white;
            border-radius: 12px;
            margin-bottom: 15px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .faq-item:hover {
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .faq-question {
            padding: 25px 30px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: white;
            transition: background 0.3s ease;
        }

        .faq-question:hover {
            background: #f8f6f2;
        }

        .faq-item.active .faq-question {
            background: #064852;
        }

        .faq-question h3 {
            font-size: 18px;
            font-weight: 600;
            color: #064852;
            flex: 1;
            font-family: 'Work Sans', sans-serif;
        }

        .faq-item.active .faq-question h3 {
            color: white;
        }

        .faq-toggle {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: #F7EFE2;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            color: #064852;
            transition: all 0.3s ease;
            flex-shrink: 0;
            margin-left: 20px;
        }

        .faq-item.active .faq-toggle {
            background: white;
            transform: rotate(45deg);
        }

        .faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s ease, padding 0.4s ease;
            background: white;
        }

        .faq-item.active .faq-answer {
            max-height: 500px;
            padding: 0 30px 25px 30px;
        }

        .faq-answer p {
            font-size: 16px;
            line-height: 1.7;
            color: #064852;
            font-family: 'Work Sans', sans-serif;
            font-weight: 400;
        }

        .faq-answer ul {
            margin: 15px 0;
            padding-left: 20px;
        }

        .faq-answer li {
            font-size: 16px;
            line-height: 1.7;
            color: #064852;
            margin-bottom: 8px;
            font-family: 'Work Sans', sans-serif;
            font-weight: 400;
        }

        /* CTA Section */
        .cta-section {
            background: #064852;
            padding: 80px 80px;
            text-align: center;
            color: white;
        }

        .cta-container {
            max-width: 800px;
            margin: 0 auto;
        }

        .cta-container h2 {
            font-size: 42px;
            font-weight: 400;
            margin-bottom: 20px;
            line-height: 1.3;
        }

        .cta-container p {
            font-size: 18px;
            margin-bottom: 35px;
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
            border-radius: 5px;
        }

        .cta-btn:hover {
            background: white;
            color: #064852;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .categories-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .hero-text h1 {
                font-size: 52px;
            }
        }

        @media (max-width: 768px) {
            .categories-grid {
                grid-template-columns: 1fr;
            }

            .faq-categories,
            .faq-content,
            .cta-section {
                padding: 60px 40px;
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
    <section class="hero-faq">
        <div class="hero-text">
            <small>HELP CENTER</small>
            <h1>FAQs</h1>
            <p>Find answers to commonly asked questions about Sakanta's co-ownership model, properties, and services.</p>
        </div>
        <div class="scroll-indicator" onclick="document.querySelector('.faq-categories').scrollIntoView({ behavior: 'smooth' })" style="cursor: pointer;">↓</div>
    </section>

    <!-- FAQ Categories -->
    <section class="faq-categories">
        <div class="categories-container">
            <div class="categories-header">
                <h2>Browse by Category</h2>
                <p>Select a category to view relevant questions</p>
            </div>
            <div class="categories-grid">
                <div class="category-card active" onclick="showCategory('general')">
                    <div class="category-icon">🏠</div>
                    <h3>General</h3>
                    <p>About Sakanta</p>
                </div>
                <div class="category-card" onclick="showCategory('ownership')">
                    <div class="category-icon">🤝</div>
                    <h3>Ownership</h3>
                    <p>Co-ownership model</p>
                </div>
                <div class="category-card" onclick="showCategory('pricing')">
                    <div class="category-icon">💰</div>
                    <h3>Pricing</h3>
                    <p>Costs & payments</p>
                </div>
                <div class="category-card" onclick="showCategory('listings')">
                    <div class="category-icon">🏡</div>
                    <h3>Listings</h3>
                    <p>Properties & locations</p>
                </div>
                <div class="category-card" onclick="showCategory('booking')">
                    <div class="category-icon">📅</div>
                    <h3>Booking</h3>
                    <p>Reservations & stays</p>
                </div>
                <div class="category-card" onclick="showCategory('legal')">
                    <div class="category-icon">⚖️</div>
                    <h3>Legal</h3>
                    <p>Documents & rights</p>
                </div>
                <div class="category-card" onclick="showCategory('maintenance')">
                    <div class="category-icon">🔧</div>
                    <h3>Maintenance</h3>
                    <p>Property care</p>
                </div>
                <div class="category-card" onclick="showCategory('investment')">
                    <div class="category-icon">📈</div>
                    <h3>Investment</h3>
                    <p>Returns & resale</p>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Content -->
    <section class="faq-content">
        <div class="faq-container">
            
            <!-- General Category -->
            <div class="faq-category-section active" id="general">
                <h2 class="faq-category-title">General Questions</h2>
                
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <h3>What is Sakanta?</h3>
                        <div class="faq-toggle">+</div>
                    </div>
                    <div class="faq-answer">
                        <p>Sakanta is Indonesia's premier co-ownership platform that makes luxury property investment accessible. We offer fractional ownership of premium villas and properties across Indonesia's most desirable destinations, allowing you to own a share of high-end properties at a fraction of the full cost.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <h3>How does co-ownership work?</h3>
                        <div class="faq-toggle">+</div>
                    </div>
                    <div class="faq-answer">
                        <p>Co-ownership at Sakanta divides property ownership into shares (typically 8 or 4 shares per property). Each owner purchases one or more shares, granting them proportional ownership rights, usage time, and potential returns from rental income and property appreciation.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <h3>Where are Sakanta properties located?</h3>
                        <div class="faq-toggle">+</div>
                    </div>
                    <div class="faq-answer">
                        <p>Our properties are strategically located in Indonesia's most sought-after destinations including Bali (Ubud, Uluwatu, Seminyak, Canggu), Raja Ampat, Sumba, Kintamani, and other premium locations known for their natural beauty and investment potential.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <h3>What are the benefits of co-ownership versus full ownership?</h3>
                        <div class="faq-toggle">+</div>
                    </div>
                    <div class="faq-answer">
                        <p>Co-ownership offers several advantages:</p>
                        <ul>
                            <li>Lower entry cost - invest from Rp 50 million instead of billions</li>
                            <li>Professional property management included</li>
                            <li>No maintenance hassles or unexpected costs</li>
                            <li>Access to multiple premium locations by owning shares in different properties</li>
                            <li>Shared costs for upkeep, utilities, and improvements</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Ownership Category -->
            <div class="faq-category-section" id="ownership">
                <h2 class="faq-category-title">Ownership Questions</h2>
                
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <h3>What exactly do I own when I purchase a share?</h3>
                        <div class="faq-toggle">+</div>
                    </div>
                    <div class="faq-answer">
                        <p>You receive legal ownership of a fractional interest in the property through a registered deed. This includes proportional rights to the property's usage, rental income, and appreciation value. All ownership is legally documented and protected under Indonesian property law.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <h3>Can I sell my share?</h3>
                        <div class="faq-toggle">+</div>
                    </div>
                    <div class="faq-answer">
                        <p>Yes, you can sell your share at any time. Sakanta provides a marketplace for owners to list and sell their shares. We also assist with the transfer process to ensure all legal requirements are met. Other existing owners typically have right of first refusal.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <h3>What happens if I want to buy additional shares?</h3>
                        <div class="faq-toggle">+</div>
                    </div>
                    <div class="faq-answer">
                        <p>You can purchase additional shares in the same property or different properties as they become available. Existing owners are often given priority when new shares are released or when other owners decide to sell.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <h3>How long is the ownership period?</h3>
                        <div class="faq-toggle">+</div>
                    </div>
                    <div class="faq-answer">
                        <p>Ownership is perpetual based on the property's land title. Most properties have 25-30 year leasehold or freehold titles that can be extended. You own your share for as long as you choose to hold it or until you decide to sell.</p>
                    </div>
                </div>
            </div>

            <!-- Pricing Category -->
            <div class="faq-category-section" id="pricing">
                <h2 class="faq-category-title">Pricing & Payment</h2>
                
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <h3>How much does a share cost?</h3>
                        <div class="faq-toggle">+</div>
                    </div>
                    <div class="faq-answer">
                        <p>Share prices vary by property, location, and amenities. Entry-level shares start from approximately Rp 50 million for 1/8 ownership. Premium properties in prime locations may have higher share prices. Each listing clearly displays the price per share.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <h3>What are the ongoing costs?</h3>
                        <div class="faq-toggle">+</div>
                    </div>
                    <div class="faq-answer">
                        <p>Ongoing costs include:</p>
                        <ul>
                            <li>Monthly management fees (covers property management, utilities, insurance)</li>
                            <li>Reserve fund contributions (for major repairs and improvements)</li>
                            <li>Property taxes (divided among owners)</li>
                        </ul>
                        <p>These are typically Rp 1-3 million per month depending on property size and location.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <h3>Are there any hidden fees?</h3>
                        <div class="faq-toggle">+</div>
                    </div>
                    <div class="faq-answer">
                        <p>No hidden fees. All costs are disclosed upfront including acquisition costs, legal fees, and ongoing monthly expenses. We provide complete transparency in all financial matters before purchase.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <h3>Can I finance my purchase?</h3>
                        <div class="faq-toggle">+</div>
                    </div>
                    <div class="faq-answer">
                        <p>Currently, full payment is required at the time of purchase. However, we're working with financial institutions to offer financing options in the future. We do offer flexible payment plans for qualified buyers on select properties.</p>
                    </div>
                </div>
            </div>

            <!-- Listings Category -->
            <div class="faq-category-section" id="listings">
                <h2 class="faq-category-title">Properties & Listings</h2>
                
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <h3>How are properties selected?</h3>
                        <div class="faq-toggle">+</div>
                    </div>
                    <div class="faq-answer">
                        <p>Our team carefully curates each property based on strict criteria: prime location, exceptional design and quality, strong rental potential, proper legal documentation, and alignment with our luxury standards. Only the top 5% of properties we evaluate are added to our portfolio.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <h3>Can I visit a property before purchasing?</h3>
                        <div class="faq-toggle">+</div>
                    </div>
                    <div class="faq-answer">
                        <p>Absolutely! We encourage all potential buyers to visit properties in person. Schedule a viewing through our website or contact our team to arrange a property tour. We provide detailed virtual tours for those unable to visit in person.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <h3>How often are new properties added?</h3>
                        <div class="faq-toggle">+</div>
                    </div>
                    <div class="faq-answer">
                        <p>We add 3-5 new properties each quarter. Sign up for our newsletter or enable notifications on your account to be alerted when new listings become available.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <h3>What amenities are included with properties?</h3>
                        <div class="faq-toggle">+</div>
                    </div>
                    <div class="faq-answer">
                        <p>Amenities vary by property but typically include: fully furnished interiors, private pools, modern kitchen appliances, high-speed internet, smart home features, landscaped gardens, and access to resort-style facilities. Each listing details specific amenities.</p>
                    </div>
                </div>
            </div>

            <!-- Booking Category -->
            <div class="faq-category-section" id="booking">
                <h2 class="faq-category-title">Booking & Reservations</h2>
                
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <h3>How do I book my stay?</h3>
                        <div class="faq-toggle">+</div>
                    </div>
                    <div class="faq-answer">
                        <p>Owners can book through our dedicated owner portal. View available dates on the calendar, select your preferred dates, and confirm your reservation. You'll receive automatic confirmation and access details for your stay.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <h3>How much usage time do I get?</h3>
                        <div class="faq-toggle">+</div>
                    </div>
                    <div class="faq-answer">
                        <p>Usage time is proportional to your ownership share. For 1/8 ownership, you typically receive 6 weeks (45 days) per year. This can be used flexibly throughout the year based on availability and booking rules.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <h3>What if my desired dates are not available?</h3>
                        <div class="faq-toggle">+</div>
                    </div>
                    <div class="faq-answer">
                        <p>We use a fair rotation system for peak seasons. If your preferred dates are unavailable, you can: join a waitlist, exchange usage time with other owners, book alternative dates, or use our reciprocal program to stay at other Sakanta properties.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <h3>Can I let friends or family use my time?</h3>
                        <div class="faq-toggle">+</div>
                    </div>
                    <div class="faq-answer">
                        <p>Yes! You can transfer your booking to friends or family at no additional cost. Simply update the guest information in your owner portal when making the reservation.</p>
                    </div>
                </div>
            </div>

            <!-- Legal Category -->
            <div class="faq-category-section" id="legal">
                <h2 class="faq-category-title">Legal & Documentation</h2>
                
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <h3>Is co-ownership legal in Indonesia?</h3>
                        <div class="faq-toggle">+</div>
                    </div>
                    <div class="faq-answer">
                        <p>Yes, co-ownership is fully legal in Indonesia. All our ownership structures comply with Indonesian property law. We work with top law firms to ensure proper documentation and registration of all fractional ownership interests.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <h3>What legal documents will I receive?</h3>
                        <div class="faq-toggle">+</div>
                    </div>
                    <div class="faq-answer">
                        <p>You'll receive: Share Certificate (proof of ownership), Deed of Sale (notarized), Operating Agreement (ownership rules and rights), Property Insurance documentation, and Annual financial statements.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <h3>Can foreigners own property in Indonesia?</h3>
                        <div class="faq-toggle">+</div>
                    </div>
                    <div class="faq-answer">
                        <p>Foreign ownership is possible through specific legal structures such as Hak Pakai (Right to Use) titles or through Indonesian entities. Our legal team assists foreign buyers with compliant ownership structures.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <h3>What happens in case of disputes between owners?</h3>
                        <div class="faq-toggle">+</div>
                    </div>
                    <div class="faq-answer">
                        <p>Our Operating Agreement includes clear dispute resolution procedures. Most issues are resolved through mediation. In rare cases requiring formal resolution, binding arbitration clauses protect all parties' interests.</p>
                    </div>
                </div>
            </div>

            <!-- Maintenance Category -->
            <div class="faq-category-section" id="maintenance">
                <h2 class="faq-category-title">Property Maintenance</h2>
                
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <h3>Who manages property maintenance?</h3>
                        <div class="faq-toggle">+</div>
                    </div>
                    <div class="faq-answer">
                        <p>Sakanta's professional property management team handles all maintenance, cleaning, repairs, and upkeep. This includes regular inspections, landscaping, pool maintenance, and 24/7 emergency response.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <h3>What if something breaks during my stay?</h3>
                        <div class="faq-toggle">+</div>
                    </div>
                    <div class="faq-answer">
                        <p>Contact our 24/7 concierge service immediately. Normal wear and tear is covered by management fees. Our team will quickly address any issues to ensure your stay is not disrupted.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <h3>How are major renovations handled?</h3>
                        <div class="faq-toggle">+</div>
                    </div>
                    <div class="faq-answer">
                        <p>Major improvements require owner approval through voting. Costs are either covered by the reserve fund or split among owners proportionally. All owners vote on significant renovation decisions to ensure collective agreement.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <h3>Is the property cleaned between stays?</h3>
                        <div class="faq-toggle">+</div>
                    </div>
                    <div class="faq-answer">
                        <p>Yes, professional cleaning is performed after each owner's stay. The property is thoroughly cleaned, linens changed, and restocked before each new reservation at no additional cost to owners.</p>
                    </div>
                </div>
            </div>

            <!-- Investment Category -->
            <div class="faq-category-section" id="investment">
                <h2 class="faq-category-title">Investment & Returns</h2>
                
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <h3>What kind of returns can I expect?</h3>
                        <div class="faq-toggle">+</div>
                    </div>
                    <div class="faq-answer">
                        <p>Returns come from two sources: rental income (when not in use) and property appreciation. Historical performance shows 8-15% annual returns, though past performance doesn't guarantee future results. Each property listing includes projected yield information.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <h3>How is rental income distributed?</h3>
                        <div class="faq-toggle">+</div>
                    </div>
                    <div class="faq-answer">
                        <p>Rental income (after management costs) is distributed quarterly to all owners proportionally. You receive detailed statements showing rental activity, expenses, and your share of net income. Payments are made via bank transfer.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <h3>Can I rent out my usage time?</h3>
                        <div class="faq-toggle">+</div>
                    </div>
                    <div class="faq-answer">
                        <p>Yes! If you're not using your allocated time, you can opt into our rental program. Sakanta will market and manage rentals on your behalf, providing you additional income beyond the standard rental pool distribution.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <h3>How do property values appreciate?</h3>
                        <div class="faq-toggle">+</div>
                    </div>
                    <div class="faq-answer">
                        <p>Properties in our portfolio are in high-demand areas with limited supply. Values typically appreciate 5-10% annually due to location desirability, tourism growth, and property improvements. Annual valuations are provided to track your investment's growth.</p>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section dark-section">
        <div class="cta-container">
            <h2>Still Have Questions?</h2>
            <p>Our team is here to help. Reach out and we'll get back to you within 24 hours.</p>
            <a href="mailto:info@sakanta.com" class="cta-btn">CONTACT US</a>
        </div>
    </section>

    @include('layouts.footer')

    <script>
        // Toggle FAQ item
        function toggleFaq(element) {
            const faqItem = element.parentElement;
            const isActive = faqItem.classList.contains('active');
            
            // Close all FAQ items in the current category
            const categorySection = faqItem.closest('.faq-category-section');
            const allFaqItems = categorySection.querySelectorAll('.faq-item');
            allFaqItems.forEach(item => item.classList.remove('active'));
            
            // If the clicked item wasn't active, open it
            if (!isActive) {
                faqItem.classList.add('active');
            }
        }

        // Show category
        function showCategory(categoryId) {
            // Update active category card
            const categoryCards = document.querySelectorAll('.category-card');
            categoryCards.forEach(card => card.classList.remove('active'));
            event.target.closest('.category-card').classList.add('active');
            
            // Hide all category sections
            const categorySections = document.querySelectorAll('.faq-category-section');
            categorySections.forEach(section => section.classList.remove('active'));
            
            // Show selected category
            const selectedSection = document.getElementById(categoryId);
            if (selectedSection) {
                selectedSection.classList.add('active');
                
                // Close all FAQ items in the newly shown category
                const faqItems = selectedSection.querySelectorAll('.faq-item');
                faqItems.forEach(item => item.classList.remove('active'));
                
                // Smooth scroll to FAQ content
                document.querySelector('.faq-content').scrollIntoView({ 
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        }
    </script>
</body>
</html>


