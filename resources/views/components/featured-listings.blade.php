<!-- Featured Listings Slider for FAQ Pages - EXACT COPY FROM locations.blade.php -->

<style>
    /* Carousel Container */
    .carousel-container {
        max-width: 1400px;
        margin: 0 auto;
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .carousel-wrapper {
        flex: 1;
        overflow: hidden;
        position: relative;
        z-index: 1;
        padding: 20px 0;
        border-radius: 0;
    }

    .carousel-track {
        display: flex;
        gap: 30px;
        transition: transform 0.5s ease;
        margin-top: -20px;
        margin-bottom: -20px;
        padding: 20px 0;
    }

    .property-card {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1), box-shadow 0.3s;
        position: relative;
        z-index: 1;
        cursor: pointer;
        flex: 0 0 calc((100% - 60px) / 3);
        min-width: calc((100% - 60px) / 3);
        height: fit-content;
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

        .property-card.faded {
            opacity: 0.7;
        }    .like-btn svg {
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

    /* Carousel Navigation Buttons */
    .carousel-nav-btn {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: white;
        border: 2px solid rgba(255,255,255,0.3);
        color: #064852;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s;
        flex-shrink: 0;
        font-size: 20px;
    }

    .carousel-nav-btn:hover {
        background: rgba(255,255,255,0.95);
        transform: scale(1.1);
    }

    .carousel-nav-btn:disabled {
        background: rgba(255,255,255,0.3);
        cursor: not-allowed;
        transform: scale(1);
    }

    /* Featured Section Styling */
    .featured-section {
        background: #F7EFE2;
        padding: 80px 80px;
    }

    .featured-section-content {
        max-width: 1400px;
        margin: 0 auto;
    }

    .featured-section-header {
        text-align: center;
        margin-bottom: 60px;
    }

    .featured-section-header p {
        font-size: 20px;
        letter-spacing: 3px;
        text-transform: uppercase;
        color: #064852;
        margin-bottom: 20px;
        font-family: 'Work Sans', sans-serif;
        font-weight: 600;
    }

    .featured-section-header h2 {
        font-size: 52px;
        font-weight: 400;
        color: #064852;
        margin: 0 0 20px 0;
        font-family: 'Esther', serif;
        line-height: 1.3;
    }

    .featured-section-header > p:last-child {
        font-size: 18px;
        color: #064852;
        font-family: 'Work Sans', sans-serif;
        font-weight: 300;
    }

    .no-properties {
        grid-column: 1 / -1;
        text-align: center;
        padding: 60px 20px;
    }
    .no-properties p {
        font-size: 18px;
        color: #999;
    }

    /* Explore Button */
    .explore-properties-btn {
        display: inline-block;
        margin: 20px auto 60px;
        padding: 15px 40px;
        background: transparent;
        color: #064852;
        text-decoration: none;
        border-radius: 0;
        font-family: 'Work Sans', sans-serif;
        font-size: 13px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 2px;
        transition: all 0.3s ease;
        text-align: center;
        border: 2px solid #064852;
    }

    .explore-properties-btn:hover {
        background: #064852;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(6, 72, 82, 0.3);
    }

    .button-container {
        text-align: center;
        margin-top: 20px;
        margin-bottom: 60px;
    }

    /* Responsive */
    @media (max-width: 1024px) {
        .carousel-container {
            gap: 15px;
        }

        .carousel-track {
            gap: 20px;
        }

        .property-card {
            flex: 0 0 calc((100% - 40px) / 2);
            min-width: calc((100% - 40px) / 2);
        }

        .property-image {
            height: 250px;
        }

        .featured-section {
            padding: 80px 50px;
        }
    }

    @media (max-width: 768px) {
        .carousel-container {
            gap: 12px;
        }

        .carousel-track {
            gap: 15px;
        }

        .carousel-nav-btn {
            width: 40px;
            height: 40px;
            font-size: 16px;
        }

        .property-card {
            flex: 0 0 100% !important;
            min-width: 100% !important;
        }

        .property-image {
            height: 220px;
        }

        .property-name {
            font-size: 16px;
        }

        .property-specs {
            font-size: 11px;
        }

        .featured-section {
            padding: 60px 30px 40px 30px;
        }

        .featured-section-header h2 {
            font-size: 36px;
        }
    }

    @media (max-width: 480px) {
        .carousel-container {
            gap: 10px;
        }

        .carousel-track {
            gap: 12px;
        }

        .carousel-nav-btn {
            width: 36px;
            height: 36px;
            font-size: 14px;
        }

        .property-card {
            flex: 0 0 100% !important;
            min-width: 100% !important;
        }

        .property-image {
            height: 200px;
        }

        .property-name {
            font-size: 15px;
        }

        .property-specs {
            font-size: 10px;
        }

        .featured-section {
            padding: 50px 20px 30px 20px;
        }

        .featured-section-header p {
            font-size: 16px;
        }

        .featured-section-header h2 {
            font-size: 32px;
        }

        .featured-section-header > p:last-child {
            font-size: 15px;
        }
    }

    @media (max-width: 360px) {
        .carousel-container {
            gap: 8px;
        }

        .carousel-track {
            gap: 10px;
        }

        .carousel-nav-btn {
            width: 32px;
            height: 32px;
            font-size: 12px;
        }

        .property-card {
            flex: 0 0 100% !important;
            min-width: 100% !important;
        }

        .property-image {
            height: 180px;
        }

        .property-name {
            font-size: 14px;
        }

        .property-price-text {
            font-size: 14px;
        }

        .property-specs {
            font-size: 9px;
        }

        .featured-section {
            padding: 40px 15px 25px 15px;
        }

        .featured-section-header p {
            font-size: 14px;
            letter-spacing: 2px;
        }

        .featured-section-header h2 {
            font-size: 28px;
        }

        .featured-section-header > p:last-child {
            font-size: 14px;
        }
    }
</style>

@php
    // Generate numeric-only unique ID for valid JavaScript function names
    $carouselId = 'c' . substr(str_replace('.', '', microtime(true)), 0, 10);
    $trackId = $carouselId . '_track';
    $prevBtnId = $carouselId . '_prev';
    $nextBtnId = $carouselId . '_next';
@endphp

<section class="featured-section" style="background: {{ $bgColor ?? '#F7EFE2' }};">
    <div class="featured-section-content">
        <!-- Section Header -->
        <div class="featured-section-header" style="color: {{ $textColor ?? '#064852' }};">
            <p style="color: {{ $textColor ?? '#064852' }};">FEATURED LISTINGS</p>
            <h2 style="color: {{ $textColor ?? '#064852' }};">{{ $title ?? 'Explore More Properties' }}</h2>
            <p style="color: {{ $textColor ?? '#064852' }};">{{ $description ?? 'Discover our finest investment opportunities across all locations' }}</p>
        </div>

        @if($listings->count() > 0)
        <div class="carousel-container">
            <button class="carousel-nav-btn prev-btn" onclick="slideCarousel_{{ $carouselId }}(-1)" id="{{ $prevBtnId }}" title="Previous">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M15 18l-6-6 6-6"/>
                </svg>
            </button>
            
            <div class="carousel-wrapper">
                <div class="carousel-track" id="{{ $trackId }}">
                    @forelse($listings as $property)
                    <a href="{{ route('property.detail', $property->slug) }}" class="property-card {{ $property->status !== 'available' ? 'faded' : '' }}">
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
                            <p class="property-price-text">{{ $property->formatted_price }} / share</p>
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
                    @empty
                    @endforelse
                </div>
            </div>
            
            <button class="carousel-nav-btn next-btn" onclick="slideCarousel_{{ $carouselId }}(1)" id="{{ $nextBtnId }}" title="Next">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M9 18l6-6-6-6"/>
                </svg>
            </button>
        </div>

        <!-- Explore Homes Button -->
        <div class="button-container">
            <a href="{{ route('all.listings') }}" class="explore-properties-btn">Explore Homes</a>
        </div>

        @else
        <div class="no-properties">
            <p>No listings available at the moment.</p>
        </div>
        @endif
    </div>
</section>

<script>
(function() {
    const carouselId = '{{ $carouselId }}';
    let currentSlide_{{ $carouselId }} = 0;
    const track_{{ $carouselId }} = document.getElementById('{{ $trackId }}');
    const wrapper_{{ $carouselId }} = track_{{ $carouselId }} ? track_{{ $carouselId }}.closest('.carousel-wrapper') : null;
    const cards_{{ $carouselId }} = track_{{ $carouselId }} ? track_{{ $carouselId }}.querySelectorAll('.property-card') : [];
    const prevBtn_{{ $carouselId }} = document.getElementById('{{ $prevBtnId }}');
    const nextBtn_{{ $carouselId }} = document.getElementById('{{ $nextBtnId }}');
    const totalCards_{{ $carouselId }} = cards_{{ $carouselId }}.length;

    if (totalCards_{{ $carouselId }} === 0 || !wrapper_{{ $carouselId }}) return;

    // Function to determine cards per slide based on screen width
    function getCardsPerSlide_{{ $carouselId }}() {
        const screenWidth = window.innerWidth;
        if (screenWidth <= 768) {
            return 1; // Mobile: 1 card per slide
        } else if (screenWidth <= 1024) {
            return 2; // Tablet: 2 cards per slide
        } else {
            return 3; // Desktop: 3 cards per slide
        }
    }

    // Function to get gap based on screen width
    function getGap_{{ $carouselId }}() {
        const screenWidth = window.innerWidth;
        if (screenWidth <= 480) {
            return 12;
        } else if (screenWidth <= 768) {
            return 15;
        } else {
            return 30;
        }
    }

    function updateCarousel_{{ $carouselId }}() {
        const cardsPerSlide = getCardsPerSlide_{{ $carouselId }}();
        const gap = getGap_{{ $carouselId }}();
        const totalSlides = Math.ceil(totalCards_{{ $carouselId }} / cardsPerSlide);

        // Reset current slide if out of bounds
        if (currentSlide_{{ $carouselId }} >= totalSlides) {
            currentSlide_{{ $carouselId }} = totalSlides - 1;
        }
        if (currentSlide_{{ $carouselId }} < 0) {
            currentSlide_{{ $carouselId }} = 0;
        }

        // Hitung card width berdasarkan wrapper width
        const wrapperWidth = wrapper_{{ $carouselId }}.offsetWidth;
        let cardWidth;
        
        if (cardsPerSlide === 1) {
            cardWidth = wrapperWidth; // Full width for mobile
        } else if (cardsPerSlide === 2) {
            cardWidth = (wrapperWidth - gap) / 2;
        } else {
            cardWidth = (wrapperWidth - (gap * 2)) / 3;
        }
        
        // Set width untuk semua cards
        cards_{{ $carouselId }}.forEach(card => {
            card.style.width = cardWidth + 'px';
            card.style.minWidth = cardWidth + 'px';
            card.style.flexBasis = cardWidth + 'px';
        });

        // Hitung offset untuk slide saat ini
        const slideWidth = cardWidth + gap;
        const offset = -currentSlide_{{ $carouselId }} * slideWidth * cardsPerSlide;
        
        track_{{ $carouselId }}.style.transform = `translateX(${offset}px)`;

        // Update button states
        if (prevBtn_{{ $carouselId }}) prevBtn_{{ $carouselId }}.disabled = currentSlide_{{ $carouselId }} === 0;
        if (nextBtn_{{ $carouselId }}) nextBtn_{{ $carouselId }}.disabled = currentSlide_{{ $carouselId }} === totalSlides - 1;
    }

    window['slideCarousel_{{ $carouselId }}'] = function(direction) {
        const cardsPerSlide = getCardsPerSlide_{{ $carouselId }}();
        const totalSlides = Math.ceil(totalCards_{{ $carouselId }} / cardsPerSlide);
        const newSlide = currentSlide_{{ $carouselId }} + direction;
        
        if (newSlide >= 0 && newSlide < totalSlides) {
            currentSlide_{{ $carouselId }} = newSlide;
            updateCarousel_{{ $carouselId }}();
        }
    };

    // Initialize carousel immediately with RAF to ensure DOM is ready
    requestAnimationFrame(() => {
        requestAnimationFrame(() => {
            updateCarousel_{{ $carouselId }}();
        });
    });

    // Update saat window resize
    let resizeTimeout_{{ $carouselId }};
    window.addEventListener('resize', function() {
        clearTimeout(resizeTimeout_{{ $carouselId }});
        resizeTimeout_{{ $carouselId }} = setTimeout(updateCarousel_{{ $carouselId }}, 250);
    });
})();

    // AJAX Like/Unlike Function
    function toggleLike(button, propertyId) {
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const svg = button.querySelector('svg');
        
        fetch(`/property/${propertyId}/like`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({})
        })
        .then(response => response.json())
        .then(data => {
            if (data.liked) {
                button.classList.add('liked');
                svg.setAttribute('fill', '#e74c3c');
                svg.setAttribute('stroke', '#e74c3c');
            } else {
                button.classList.remove('liked');
                svg.setAttribute('fill', 'none');
                svg.setAttribute('stroke', '#666');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Please sign in to like properties');
        });
    }
</script>


