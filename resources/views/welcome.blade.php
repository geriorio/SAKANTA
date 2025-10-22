<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAKANTA - Luxury Villa Resort</title>
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
        .hero-section {
            height: 100vh;
            background: url('/images/hero2.jpg') center/cover no-repeat;
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .hero-logo {
            text-align: center;
            color: white;
        }

        .hero-logo svg {
            width: 80px;
            height: 80px;
            margin-bottom: 20px;
        }

        .hero-logo h1 {
            font-size: 72px;
            font-weight: 300;
            letter-spacing: 20px;
            margin-bottom: 100px;
        }

        .scroll-down {
            text-align: center;
            color: white;
            font-size: 11px;
            letter-spacing: 3px;
            text-transform: uppercase;
        }

        .scroll-icon {
            width: 30px;
            height: 50px;
            border: 2px solid white;
            border-radius: 15px;
            margin: 20px auto;
            position: relative;
        }

        .scroll-icon::before {
            content: '';
            position: absolute;
            top: 8px;
            left: 50%;
            transform: translateX(-50%);
            width: 4px;
            height: 8px;
            background: white;
            border-radius: 2px;
            animation: scroll 2s infinite;
        }

        @keyframes scroll {
            0% {
                top: 8px;
                opacity: 1;
            }
            100% {
                top: 30px;
                opacity: 0;
            }
        }

        /* Section 2 */
        .section2 {
            min-height: 100vh;
            display: flex;
            align-items: center;
            background: #e8e3d8;
            padding: 100px 80px;
        }

        .section2-container {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 100px;
            align-items: center;
        }

        .section2-image {
            position: relative;
        }

        .section2-image img {
            width: 500px;
            height: 500px;
            height: auto;
            border-radius: 15px;
        }

        .section2-content h2 {
            font-size: 44px;
            font-weight: 400;
            line-height: 1.3;
            margin-bottom: 30px;
            color: #2c5f7f;
        }

        .section2-content p {
            font-size: 16px;
            line-height: 1.8;
            color: #2c5f7f;
            margin-bottom: 20px;
            max-width: 500px;
        }

        .section2-content p:first-of-type {
            margin-bottom: 25px;
        }

        /* Section 3 */
        .section3 {
            min-height: 100vh;
            display: flex;
            align-items: center;
            background: #e8e3d8;
            padding: 100px 80px;
        }

        .section3-container {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 120px;
            align-items: center;
        }

        .section3-content {
            order: 1;
        }

        .section3-content small {
            font-size: 13px;
            color: #5a8aaa;
            letter-spacing: 2px;
            text-transform: uppercase;
            display: block;
            margin-bottom: 20px;
        }

        .section3-content h2 {
            font-size: 44px;
            font-weight: 400;
            line-height: 1.3;
            margin-bottom: 30px;
            color: #2c5f7f;
        }

        .section3-list {
            list-style: none;
            margin-bottom: 30px;
        }

        .section3-list li {
            padding: 18px 0;
            border-bottom: 1px solid #c5bfb0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 19px;
            color: #2c5f7f;
            cursor: pointer;
            transition: padding-left 0.3s;
        }

        .section3-list li:hover {
            padding-left: 10px;
        }

        .section3-list li span {
            font-size: 20px;
        }

        .section3-button {
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

        .section3-button:hover {
            background: #2c5f7f;
            color: #e8e3d8;
        }

        .section3-image {
            position: relative;
            order: 2;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .section3-image img {
            width: 500px;
            height: 500px;
            height: auto;
            border-radius: 15px;
        }

        /* Section 4 */
        .section4 {
            min-height: 100vh;
            display: flex;
            align-items: center;
            background: #e8e3d8;
            padding: 100px 80px;
        }

        .section4-container {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 250px 1fr;
            gap: 250px;
            align-items: center;
        }

        .section4-stamp {
            position: relative;
        }

        .section4-stamp img {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .section4-content h2 {
            font-size: 34px;
            font-weight: 400;
            line-height: 1.4;
            margin-bottom: 50px;
            color: #2c5f7f;
            max-width: 600px;
        }

        .section4-features {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            margin-bottom: 40px;
            max-width: 600px;
        }

        .feature-card {
            background: transparent;
        }

        .feature-icon {
            width: 50px;
            height: 50px;
            background: #a8c68f;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .feature-card h3 {
            font-size: 18px;
            font-weight: 600;
            color: #2c5f7f;
            margin-bottom: 12px;
        }

        .feature-card p {
            font-size: 14px;
            line-height: 1.6;
            color: #2c5f7f;
        }

        .section4-button {
            display: inline-block;
            padding: 12px 30px;
            border: 2px solid #2c5f7f;
            color: #2c5f7f;
            text-decoration: none;
            font-size: 13px;
            letter-spacing: 2px;
            text-transform: uppercase;
            transition: all 0.3s;
            background: transparent;
        }

        .section4-button:hover {
            background: #2c5f7f;
            color: #e8e3d8;
        }

        /* Section 5 - Villa Carousel */
        .section5 {
            min-height: 60vh;
            display: flex;
            align-items: center;
            background: #e8e3d8;
            padding: 80px 0;
            overflow: hidden;
        }

        .section5-container {
            width: 100%;
            display: flex;
            align-items: center;
            gap: 30px;
            padding: 0 80px;
        }

        .carousel-wrapper {
            flex: 1;
            overflow: hidden;
            position: relative;
        }

        .carousel-track {
            display: flex;
            gap: 20px;
            transition: transform 0.5s ease;
        }

        .villa-card {
            height: 350px;
            position: relative;
            border-radius: 15px;
            overflow: hidden;
            cursor: pointer;
            flex-shrink: 0;
        }

        .villa-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Fixed overlay mask - tidak bergerak */
        .carousel-mask {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            display: flex;
            gap: 20px;
            pointer-events: none;
            z-index: 5;
        }

        .mask-section {
            flex: 1;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 15px;
        }

        .mask-section.left,
        .mask-section.right {
            background: rgba(0, 0, 0, 0.6);
        }

        .mask-section.center {
            background: transparent;
        }

        .mask-section h3 {
            color: white;
            font-size: 28px;
            font-weight: 300;
            letter-spacing: 4px;
            text-transform: uppercase;
        }

        .carousel-btn {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: #2c5f7f;
            border: none;
            color: white;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
            flex-shrink: 0;
            z-index: 10;
            position: relative;
        }

        .carousel-btn:hover {
            background: rgba(168, 198, 143, 1);
            transform: scale(1.1);
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
    <section class="hero-section">
        <div class="hero-logo">
            <h1>SAKANTA</h1>
        </div>
        <div class="scroll-down">
            <div class="scroll-icon"></div>
            SCROLL DOWN<br>TO START YOUR JOURNEY
        </div>
    </section>

    <!-- Section 2 -->
    <section class="section2">
        <div class="section2-container">
            <div class="section2-image">
                <img src="/images/home section 2.jpg" alt="Sakanta Villa">
            </div>
            <div class="section2-content">
                <h2>Escape the rush.<br>Find connection.<br>Live it all.</h2>
                <p>At Sakanta, we believe life is richer when rhythm and stillness dance together. Born out of a longing for a life less ordinary — where community, calm, and unhurried beauty matter — Sakanta is a place to exhale.</p>
                <p>Here, every detail whispers intention: from the architecture that embraces nature, to the yacht gently waiting at the horizon. Because we know you don't just want a property. You want a refuge. A way to reconnect. A space to love, live, and remember.</p>
            </div>
        </div>
    </section>

    <!-- Section 3 -->
    <section class="section3">
        <div class="section3-container">
            <div class="section3-content">
                <small>Explore ownership</small>
                <h2>Shared Villa Living,<br>with Privacy Intact</h2>
                <ul class="section3-list">
                    <li>
                        <span>Kintamani - Bali</span>
                        <span>↗</span>
                    </li>
                    <li>
                        <span>Raja Ampat - Papua</span>
                        <span>↗</span>
                    </li>
                    <li>
                        <span>Sumba - NTT</span>
                        <span>↗</span>
                    </li>
                    <li>
                        <span>Bukit Tinggi - Sumatra</span>
                        <span>↗</span>
                    </li>
                </ul>
                <a href="#" class="section3-button">BOOK YOUR STAY</a>
            </div>
            <div class="section3-image">
                <img src="/images/home section 3.jpg" alt="Sakanta Villa">

            </div>
        </div>
    </section>

    <!-- Section 4 -->
    <section class="section4">
        <div class="section4-container">
            <div class="section4-stamp">
                <img src="/images/perangko.jpg" alt="Sakanta Stamp">
            </div>
            <div class="section4-content">
                <h2>Thoughtfully designed spaces that give you order and flexibility: private nooks to work or rest; communal areas to gather, dine, laugh.</h2>
                <div class="section4-features">
                    <div class="feature-card">
                        <div class="feature-icon">🏡</div>
                        <h3>Design That Breathes</h3>
                        <p>Earthy materials, open light, and the rhythm of nature.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">🤝</div>
                        <h3>Coliving, Redefined</h3>
                        <p>Private villas with shared spirit — curated for connection and comfort.</p>
                    </div>
                </div>
                <a href="#" class="section4-button">LEARN MORE →</a>
            </div>
        </div>
    </section>

    <!-- Section 5 - Villa Carousel -->
    <section class="section5">
        <div class="section5-container">
            <button class="carousel-btn prev-btn" onclick="moveSlide(-1)">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M15 18l-6-6 6-6"/>
                </svg>
            </button>
            
            <div class="carousel-wrapper">
                <div class="carousel-track">
                    <div class="villa-card">
                        <img src="/images/villa1.jpg" alt="Personalized Villa">
                    </div>
                    <div class="villa-card">
                        <img src="/images/villa2.jpg" alt="Luxury Villa">
                    </div>
                    <div class="villa-card">
                        <img src="/images/villa3.jpg" alt="Premium Villa">
                    </div>
                    <div class="villa-card">
                        <img src="/images/villa4.jpg" alt="Exclusive Villa">
                    </div>
                    <div class="villa-card">
                        <img src="/images/villa5.jpg" alt="Deluxe Villa">
                    </div>
                    <div class="villa-card">
                        <img src="/images/villa6.jpg" alt="Grand Villa">
                    </div>
                </div>
                
                <!-- Fixed Mask Overlay -->
                <div class="carousel-mask">
                    <div class="mask-section left">
                        <h3 id="leftLabel">PERSONALIZED</h3>
                    </div>
                    <div class="mask-section center"></div>
                    <div class="mask-section right">
                        <h3 id="rightLabel">PREMIUM</h3>
                    </div>
                </div>
            </div>
            
            <button class="carousel-btn next-btn" onclick="moveSlide(1)">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M9 18l6-6-6-6"/>
                </svg>
            </button>
        </div>
    </section>

    <script>
        let currentSlide = 0;
        const track = document.querySelector('.carousel-track');
        const wrapper = document.querySelector('.carousel-wrapper');
        const slides = document.querySelectorAll('.villa-card');
        const totalSlides = slides.length;
        const leftLabel = document.getElementById('leftLabel');
        const rightLabel = document.getElementById('rightLabel');
        
        const labels = ['PERSONALIZED', 'LUXURY', 'PREMIUM', 'EXCLUSIVE', 'DELUXE', 'GRAND'];
        
        function setCardWidths() {
            const wrapperWidth = wrapper.offsetWidth;
            const gap = 20;
            const cardWidth = (wrapperWidth - (gap * 2)) / 3; // 3 cards with 2 gaps
            
            slides.forEach(slide => {
                slide.style.width = cardWidth + 'px';
            });
        }
        
        function updateCarousel() {
            setCardWidths();
            
            const cardWidth = slides[0].offsetWidth;
            const gap = 20;
            const slideWidth = cardWidth + gap;
            const offset = -currentSlide * slideWidth;
            track.style.transform = `translateX(${offset}px)`;
            
            // Update labels
            const leftIndex = currentSlide;
            const rightIndex = (currentSlide + 2) % totalSlides;
            
            leftLabel.textContent = labels[leftIndex];
            rightLabel.textContent = labels[rightIndex];
        }
        
        function moveSlide(direction) {
            currentSlide += direction;
            
            // Wrap around
            if (currentSlide < 0) {
                currentSlide = totalSlides - 3;
            } else if (currentSlide > totalSlides - 3) {
                currentSlide = 0;
            }
            
            updateCarousel();
        }
        
        // Initialize
        window.addEventListener('load', updateCarousel);
        window.addEventListener('resize', updateCarousel);
    </script>

    @include('layouts.footer')

</body>
</html>
