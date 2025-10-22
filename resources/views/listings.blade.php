<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listings - SAKANTA</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Georgia', serif;
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
        .hero-listings {
            height: 100vh;
            background: url('/images/hero.jpg') center/cover no-repeat;
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .hero-listings::before {
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
            font-size: 12px;
            letter-spacing: 4px;
            text-transform: uppercase;
            display: block;
            margin-bottom: 20px;
            opacity: 0.9;
        }

        .hero-text h1 {
            font-size: 82px;
            font-weight: 300;
            letter-spacing: 4px;
            margin-bottom: 60px;
        }

        .scroll-indicator {
            position: relative;
            z-index: 2;
            color: white;
            font-size: 24px;
            animation: bounce 2s infinite;
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

        /* Section 2 - What We Offer */
        .what-we-offer {
            background: #e8e3d8;
            padding: 120px 80px;
            text-align: center;
        }

        .offer-container {
            max-width: 900px;
            margin: 0 auto;
        }

        .offer-icon {
            margin-bottom: 30px;
        }

        .offer-icon svg {
            width: 60px;
            height: 60px;
            stroke: #2c5f7f;
            stroke-width: 1.5;
        }

        .offer-label {
            font-size: 13px;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: #2c5f7f;
            margin-bottom: 30px;
        }

        .offer-title {
            font-size: 48px;
            font-weight: 400;
            color: #2c5f7f;
            margin-bottom: 40px;
            line-height: 1.3;
        }

        .offer-description {
            font-size: 18px;
            line-height: 1.8;
            color: #2c5f7f;
        }

        /* Section 3 - Properties Grid */
        .properties-grid {
            background: #e8e3d8;
            padding: 80px 80px 120px;
            overflow: visible;
        }

        .grid-container {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }

        .property-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            transition: transform 0.3s;
            position: relative;
            z-index: 1;
            cursor: pointer;
        }

        .property-card:hover {
            transform: translateY(-10px);
            z-index: 10;
        }

        .property-image {
            width: 100%;
            height: 350px;
            position: relative;
            overflow: hidden;
        }

        .property-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .property-info-card {
            padding: 30px;
        }

        .property-header {
            display: flex;
            justify-content: space-between;
            align-items: start;
            margin-bottom: 15px;
        }

        .property-name {
            font-size: 24px;
            font-weight: 400;
            color: #2c5f7f;
        }

        .property-icon {
            width: 40px;
            height: 40px;
        }

        .property-icon svg {
            width: 100%;
            height: 100%;
            stroke: #2c5f7f;
            stroke-width: 1.5;
        }

        .property-location-text {
            font-size: 14px;
            color: #5a8aaa;
            margin-bottom: 20px;
        }

        .property-price-text {
            font-size: 28px;
            font-weight: 600;
            color: #2c5f7f;
            margin-bottom: 15px;
        }

        .property-specs {
            font-size: 14px;
            color: #2c5f7f;
            margin-bottom: 5px;
        }

        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 15px;
            margin-top: 60px;
        }

        .page-btn {
            width: 40px;
            height: 40px;
            border: 2px solid #2c5f7f;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #2c5f7f;
            text-decoration: none;
            transition: all 0.3s;
        }

        .page-btn:hover,
        .page-btn.active {
            background: #2c5f7f;
            color: white;
        }

        /* Section 4 - Area Guide */
        .area-guide {
            background: #2c5f7f;
            padding: 120px 80px;
            text-align: center;
        }

        .area-guide h2 {
            font-size: 52px;
            font-weight: 400;
            color: white;
            margin-bottom: 30px;
            line-height: 1.3;
        }

        .area-guide p {
            font-size: 18px;
            color: white;
            margin-bottom: 40px;
            opacity: 0.95;
        }

        .area-guide-btn {
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
        }

        .area-guide-btn:hover {
            background: white;
            color: #2c5f7f;
        }

        /* Section 5 - Ownership */
        .ownership-section {
            background: #e8e3d8;
            padding: 100px 80px;
            align-items: center;
        }

        .ownership-container {
            max-width: 1150px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 250px 1fr;
            gap: 280px;
            align-items: center;
            justify-items: start;
        }

        .ownership-stamp {
            position: relative;
            width: 100%;
        }

        .ownership-stamp img {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .ownership-content {
            max-width: 600px;
            text-align: start;
        }

        .ownership-label {
            font-size: 13px;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: #5a8aaa;
            margin-bottom: 20px;
        }

        .ownership-content h2 {
            font-size: 34px;
            font-weight: 400;
            line-height: 1.4;
            margin-bottom: 40px;
            color: #2c5f7f;
        }

        .ownership-btn {
            display: inline-block;
            padding: 12px 30px;
            border: 2px solid #2c5f7f;
            color: #2c5f7f;
            text-decoration: none;
            font-size: 13px;
            letter-spacing: 2px;
            text-transform: uppercase;
            transition: all 0.3s;
        }

        .ownership-btn:hover {
            background: #2c5f7f;
            color: #e8e3d8;
        }

        /* Slider Container */
        .slider-wrapper {
            overflow: hidden;
            position: relative;
            padding-top: 20px;
            margin-top: -20px;
        }

        .slider-container {
            display: flex;
            transition: transform 0.5s ease-in-out;
            gap: 30px;
        }

        .slider-container .property-card {
            flex: 0 0 calc((100% - 60px) / 3);
            max-width: calc((100% - 60px) / 3);
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
    <section class="hero-listings">
        <div class="hero-text">
            <small>FIND YOUR SANCTUARY IN</small>
            <h1>Bali</h1>
        </div>
        <div class="scroll-indicator">↓</div>
    </section>

    <!-- Section 2 - What We Offer -->
    <section class="what-we-offer">
        <div class="offer-container">
            <div class="offer-icon">
                <svg viewBox="0 0 100 100" fill="none">
                    <rect x="30" y="20" width="40" height="50" stroke="currentColor" stroke-width="2" rx="3"/>
                    <line x1="50" y1="20" x2="50" y2="70" stroke="currentColor" stroke-width="2"/>
                    <line x1="30" y1="45" x2="70" y2="45" stroke="currentColor" stroke-width="2"/>
                    <circle cx="40" cy="32" r="3" fill="currentColor" opacity="0.3"/>
                    <circle cx="60" cy="32" r="3" fill="currentColor" opacity="0.3"/>
                    <circle cx="40" cy="57" r="3" fill="currentColor" opacity="0.3"/>
                    <circle cx="60" cy="57" r="3" fill="currentColor" opacity="0.3"/>
                </svg>
            </div>
            <p class="offer-label">WHAT WE OFFER</p>
            <h2 class="offer-title">A Home That Moves With You</h2>
            <p class="offer-description">
                Each villa comes with transparent ownership rights, flexible usage, & the invitation to belong — anytime.
            </p>
        </div>
    </section>

    <!-- Section 3 - Properties Grid -->
    <section class="properties-grid">
        <div class="slider-wrapper">
            <div class="slider-container" id="propertySlider">
                <!-- Property 1 -->
                <div class="property-card">
                <div class="property-image">
                    <img src="/images/villa1.jpg" alt="Green Garden">
                </div>
                <div class="property-info-card">
                    <div class="property-header">
                        <h3 class="property-name">Green Garden</h3>
                        <div class="property-icon">
                            <svg viewBox="0 0 50 50" fill="none">
                                <path d="M 10 25 L 25 10 L 40 25 L 25 40 Z" stroke="currentColor" fill="none"/>
                            </svg>
                        </div>
                    </div>
                    <p class="property-location-text">Uluwatu</p>
                    <p class="property-price-text">Rp. 5.000.000.000</p>
                    <p class="property-specs">1/8 Ownership</p>
                    <p class="property-specs">4 BDS  |  4.5 BA  |  1,545 FT</p>
                </div>
            </div>

            <!-- Property 2 -->
            <div class="property-card">
                <div class="property-image">
                    <img src="/images/villa2.jpg" alt="Mountain Side">
                </div>
                <div class="property-info-card">
                    <div class="property-header">
                        <h3 class="property-name">Mountain Side</h3>
                        <div class="property-icon">
                            <svg viewBox="0 0 50 50" fill="none">
                                <path d="M 10 25 L 25 10 L 40 25 L 25 40 Z" stroke="currentColor" fill="none"/>
                            </svg>
                        </div>
                    </div>
                    <p class="property-location-text">Kintamani</p>
                    <p class="property-price-text">Rp. 5.000.000.000</p>
                    <p class="property-specs">1/8 Ownership</p>
                    <p class="property-specs">4 BDS  |  4.5 BA  |  2,300 FT</p>
                </div>
            </div>

            <!-- Property 3 -->
            <div class="property-card">
                <div class="property-image">
                    <img src="/images/villa3.jpg" alt="The Barnfield">
                </div>
                <div class="property-info-card">
                    <div class="property-header">
                        <h3 class="property-name">The Barnfield</h3>
                        <div class="property-icon">
                            <svg viewBox="0 0 50 50" fill="none">
                                <path d="M 10 25 L 25 10 L 40 25 L 25 40 Z" stroke="currentColor" fill="none"/>
                            </svg>
                        </div>
                    </div>
                    <p class="property-location-text">Ubud</p>
                    <p class="property-price-text">Rp. 5.000.000.000</p>
                    <p class="property-specs">1/4 Ownership</p>
                    <p class="property-specs">3 BDS  |  3.5 BA  |  1,921 FT</p>
                </div>
            </div>

            <!-- Property 4 -->
            <div class="property-card">
                <div class="property-image">
                    <img src="/images/villa1.jpg" alt="Ocean Breeze">
                </div>
                <div class="property-info-card">
                    <div class="property-header">
                        <h3 class="property-name">Ocean Breeze</h3>
                        <div class="property-icon">
                            <svg viewBox="0 0 50 50" fill="none">
                                <path d="M 10 25 L 25 10 L 40 25 L 25 40 Z" stroke="currentColor" fill="none"/>
                            </svg>
                        </div>
                    </div>
                    <p class="property-location-text">Seminyak</p>
                    <p class="property-price-text">Rp. 6.500.000.000</p>
                    <p class="property-specs">1/8 Ownership</p>
                    <p class="property-specs">5 BDS  |  5 BA  |  2,100 FT</p>
                </div>
            </div>

            <!-- Property 5 -->
            <div class="property-card">
                <div class="property-image">
                    <img src="/images/villa2.jpg" alt="Sunset Villa">
                </div>
                <div class="property-info-card">
                    <div class="property-header">
                        <h3 class="property-name">Sunset Villa</h3>
                        <div class="property-icon">
                            <svg viewBox="0 0 50 50" fill="none">
                                <path d="M 10 25 L 25 10 L 40 25 L 25 40 Z" stroke="currentColor" fill="none"/>
                            </svg>
                        </div>
                    </div>
                    <p class="property-location-text">Canggu</p>
                    <p class="property-price-text">Rp. 7.000.000.000</p>
                    <p class="property-specs">1/4 Ownership</p>
                    <p class="property-specs">4 BDS  |  4 BA  |  1,800 FT</p>
                </div>
            </div>

            <!-- Property 6 -->
            <div class="property-card">
                <div class="property-image">
                    <img src="/images/villa3.jpg" alt="Rice Field Retreat">
                </div>
                <div class="property-info-card">
                    <div class="property-header">
                        <h3 class="property-name">Rice Field Retreat</h3>
                        <div class="property-icon">
                            <svg viewBox="0 0 50 50" fill="none">
                                <path d="M 10 25 L 25 10 L 40 25 L 25 40 Z" stroke="currentColor" fill="none"/>
                            </svg>
                        </div>
                    </div>
                    <p class="property-location-text">Ubud</p>
                    <p class="property-price-text">Rp. 4.500.000.000</p>
                    <p class="property-specs">1/8 Ownership</p>
                    <p class="property-specs">3 BDS  |  3 BA  |  1,400 FT</p>
                </div>
            </div>

            <!-- Property 7 -->
            <div class="property-card">
                <div class="property-image">
                    <img src="/images/villa1.jpg" alt="Cliff House">
                </div>
                <div class="property-info-card">
                    <div class="property-header">
                        <h3 class="property-name">Cliff House</h3>
                        <div class="property-icon">
                            <svg viewBox="0 0 50 50" fill="none">
                                <path d="M 10 25 L 25 10 L 40 25 L 25 40 Z" stroke="currentColor" fill="none"/>
                            </svg>
                        </div>
                    </div>
                    <p class="property-location-text">Uluwatu</p>
                    <p class="property-price-text">Rp. 8.000.000.000</p>
                    <p class="property-specs">1/4 Ownership</p>
                    <p class="property-specs">5 BDS  |  5.5 BA  |  2,500 FT</p>
                </div>
            </div>

            <!-- Property 8 -->
            <div class="property-card">
                <div class="property-image">
                    <img src="/images/villa2.jpg" alt="Tropical Haven">
                </div>
                <div class="property-info-card">
                    <div class="property-header">
                        <h3 class="property-name">Tropical Haven</h3>
                        <div class="property-icon">
                            <svg viewBox="0 0 50 50" fill="none">
                                <path d="M 10 25 L 25 10 L 40 25 L 25 40 Z" stroke="currentColor" fill="none"/>
                            </svg>
                        </div>
                    </div>
                    <p class="property-location-text">Sanur</p>
                    <p class="property-price-text">Rp. 5.500.000.000</p>
                    <p class="property-specs">1/8 Ownership</p>
                    <p class="property-specs">4 BDS  |  4 BA  |  1,750 FT</p>
                </div>
            </div>

            <!-- Property 9 -->
            <div class="property-card">
                <div class="property-image">
                    <img src="/images/villa3.jpg" alt="Jungle Villa">
                </div>
                <div class="property-info-card">
                    <div class="property-header">
                        <h3 class="property-name">Jungle Villa</h3>
                        <div class="property-icon">
                            <svg viewBox="0 0 50 50" fill="none">
                                <path d="M 10 25 L 25 10 L 40 25 L 25 40 Z" stroke="currentColor" fill="none"/>
                            </svg>
                        </div>
                    </div>
                    <p class="property-location-text">Ubud</p>
                    <p class="property-price-text">Rp. 4.800.000.000</p>
                    <p class="property-specs">1/8 Ownership</p>
                    <p class="property-specs">3 BDS  |  3.5 BA  |  1,650 FT</p>
                </div>
            </div>

            <!-- Property 10 -->
            <div class="property-card">
                <div class="property-image">
                    <img src="/images/villa1.jpg" alt="Paradise View">
                </div>
                <div class="property-info-card">
                    <div class="property-header">
                        <h3 class="property-name">Paradise View</h3>
                        <div class="property-icon">
                            <svg viewBox="0 0 50 50" fill="none">
                                <path d="M 10 25 L 25 10 L 40 25 L 25 40 Z" stroke="currentColor" fill="none"/>
                            </svg>
                        </div>
                    </div>
                    <p class="property-location-text">Nusa Dua</p>
                    <p class="property-price-text">Rp. 9.000.000.000</p>
                    <p class="property-specs">1/4 Ownership</p>
                    <p class="property-specs">6 BDS  |  6 BA  |  3,000 FT</p>
                </div>
            </div>

            <!-- Property 11 -->
            <div class="property-card">
                <div class="property-image">
                    <img src="/images/villa2.jpg" alt="Beach Front">
                </div>
                <div class="property-info-card">
                    <div class="property-header">
                        <h3 class="property-name">Beach Front</h3>
                        <div class="property-icon">
                            <svg viewBox="0 0 50 50" fill="none">
                                <path d="M 10 25 L 25 10 L 40 25 L 25 40 Z" stroke="currentColor" fill="none"/>
                            </svg>
                        </div>
                    </div>
                    <p class="property-location-text">Jimbaran</p>
                    <p class="property-price-text">Rp. 7.500.000.000</p>
                    <p class="property-specs">1/4 Ownership</p>
                    <p class="property-specs">5 BDS  |  5 BA  |  2,200 FT</p>
                </div>
            </div>

            <!-- Property 12 -->
            <div class="property-card">
                <div class="property-image">
                    <img src="/images/villa3.jpg" alt="Serene Escape">
                </div>
                <div class="property-info-card">
                    <div class="property-header">
                        <h3 class="property-name">Serene Escape</h3>
                        <div class="property-icon">
                            <svg viewBox="0 0 50 50" fill="none">
                                <path d="M 10 25 L 25 10 L 40 25 L 25 40 Z" stroke="currentColor" fill="none"/>
                            </svg>
                        </div>
                    </div>
                    <p class="property-location-text">Tabanan</p>
                    <p class="property-price-text">Rp. 4.200.000.000</p>
                    <p class="property-specs">1/8 Ownership</p>
                    <p class="property-specs">3 BDS  |  3 BA  |  1,350 FT</p>
                </div>
            </div>
        </div>
        </div>

        <!-- Pagination -->
        <div class="pagination">
            <a href="#" class="page-btn" onclick="changeSlide('prev'); return false;">←</a>
            <a href="#" class="page-btn page-number" data-page="1" onclick="goToPage(1); return false;">1</a>
            <a href="#" class="page-btn page-number active" data-page="2" onclick="goToPage(2); return false;">2</a>
            <a href="#" class="page-btn page-number" data-page="3" onclick="goToPage(3); return false;">3</a>
            <a href="#" class="page-btn page-number" data-page="4" onclick="goToPage(4); return false;">4</a>
            <a href="#" class="page-btn" onclick="changeSlide('next'); return false;">→</a>
        </div>
    </section>

    <script>
        let currentPage = 1;
        const itemsPerPage = 3;
        const slider = document.getElementById('propertySlider');
        const totalItems = slider.children.length;
        const totalPages = Math.ceil(totalItems / itemsPerPage);

        function updateSlider() {
            // Calculate card width including gap
            const sliderWrapper = slider.parentElement;
            const wrapperWidth = sliderWrapper.offsetWidth;
            const gap = 30; // gap between cards
            const cardWidth = (wrapperWidth - (gap * 2)) / 3; // width of one card
            const moveDistance = (cardWidth + gap) * 3; // move exactly 3 cards + their gaps
            
            // Calculate offset in pixels
            const offset = -(currentPage - 1) * moveDistance;
            slider.style.transform = `translateX(${offset}px)`;
            
            // Update active pagination
            document.querySelectorAll('.page-number').forEach(btn => {
                btn.classList.remove('active');
                if (parseInt(btn.dataset.page) === currentPage) {
                    btn.classList.add('active');
                }
            });
        }

        function changeSlide(direction) {
            if (direction === 'next' && currentPage < totalPages) {
                currentPage++;
            } else if (direction === 'prev' && currentPage > 1) {
                currentPage--;
            }
            updateSlider();
        }

        function goToPage(page) {
            if (page >= 1 && page <= totalPages) {
                currentPage = page;
                updateSlider();
            }
        }

        // Initialize
        updateSlider();
        
        // Recalculate on window resize
        window.addEventListener('resize', updateSlider);

        // Make property cards clickable
        document.querySelectorAll('.property-card').forEach((card, index) => {
            card.style.cursor = 'pointer';
            card.addEventListener('click', function(e) {
                // Get property name from the card
                const propertyName = this.querySelector('.property-name').textContent;
                const slug = propertyName.toLowerCase().replace(/\s+/g, '-');
                window.location.href = `/property/${slug}`;
            });
        });
    </script>

    <!-- Section 4 - Area Guide -->
    <section class="area-guide">
        <h2>Not Sure Where To<br>Hang Your Hat?</h2>
        <p>Every place whispers a different kind of peace.</p>
        <a href="#" class="area-guide-btn">AREA GUIDES</a>
    </section>

    <!-- Section 5 - Ownership -->
    <section class="ownership-section">
        <div class="ownership-container">
            <div class="ownership-stamp">
                <img src="/images/perangko.jpg" alt="Sakanta Stamp">
            </div>
            <div class="ownership-content">
                <p class="ownership-label">EXPLORE SAKANTA OWNERSHIP</p>
                <h2>Thoughtfully designed spaces that give you order and flexibility: private nooks to work or rest; communal areas to gather, dine, laugh.</h2>
                <a href="#" class="ownership-btn">LEARN MORE →</a>
            </div>
        </div>
    </section>

    @include('layouts.footer')
</body>
</html>
