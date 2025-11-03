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

    .like-btn svg {
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
    }

    .property-name {
        font-size: 18px;
        font-weight: 400;
        color: #064852;
        margin: 0;
        line-height: 1.3;
        font-family: 'Esther', serif;
    }

    .property-icon {
        width: 24px;
        height: 24px;
        flex-shrink: 0;
        color: #064852;
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
        background: #064852;
        border: none;
        color: white;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s;
        flex-shrink: 0;
        font-size: 20px;
    }

    .carousel-nav-btn:hover {
        background: rgba(168, 198, 143, 1);
        transform: scale(1.1);
    }

    .carousel-nav-btn:disabled {
        background: #ccc;
        cursor: not-allowed;
        transform: scale(1);
    }

    /* Featured Section Styling */
    .featured-section {
        background: #F7EFE2;
        padding: 120px 80px;
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
            flex: 0 0 100%;
            min-width: 100%;
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
</style>

<section class="featured-section">
    <div class="featured-section-content">
        <!-- Section Header -->
        <div class="featured-section-header">
            <p>FEATURED LISTINGS</p>
            <h2>{{ $title ?? 'Explore More Properties' }}</h2>
            <p>{{ $description ?? 'Discover our finest investment opportunities across all locations' }}</p>
        </div>

        @if($listings->count() > 0)
        <div class="carousel-container">
            <button class="carousel-nav-btn prev-btn" onclick="slideCarousel(-1)" id="prevBtn" title="Previous">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M15 18l-6-6 6-6"/>
                </svg>
            </button>
            
            <div class="carousel-wrapper">
                <div class="carousel-track" id="carouselTrack">
                    @forelse($listings as $property)
                    <a href="{{ route('property.detail', $property->slug) }}" class="property-card">
                        <div class="property-image">
                            <img src="{{ asset($property->main_image ?? '/images/villa1.jpg') }}" alt="{{ $property->title }}">
                            
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
                                <h3 class="property-name">{{ $property->title }}</h3>
                                <div class="property-icon">
                                    <svg viewBox="0 0 50 50" fill="none">
                                        <path d="M 10 25 L 25 10 L 40 25 L 25 40 Z" stroke="currentColor" fill="none"/>
                                    </svg>
                                </div>
                            </div>
                            <p class="property-location-text">{{ $property->location->name ?? $property->city }}</p>
                            <p class="property-price-text">{{ $property->formatted_price }}</p>
                            <p class="property-specs">1/{{ $property->total_shares }} Ownership</p>
                            <p class="property-specs">{{ $property->bedrooms }} BDS  |  {{ $property->bathrooms }} BA  |  {{ number_format($property->building_area, 0) }} FT</p>
                        </div>
                    </a>
                    @empty
                    @endforelse
                </div>
            </div>
            
            <button class="carousel-nav-btn next-btn" onclick="slideCarousel(1)" id="nextBtn" title="Next">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M9 18l6-6-6-6"/>
                </svg>
            </button>
        </div>
        @else
        <div class="no-properties">
            <p>No listings available at the moment.</p>
        </div>
        @endif
    </div>
</section>

<script>
    let currentSlide = 0;
    const track = document.getElementById('carouselTrack');
    const wrapper = document.querySelector('.carousel-wrapper');
    const cards = document.querySelectorAll('.property-card');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const cardsPerSlide = 3;
    const gap = 30;
    const totalCards = cards.length;
    const totalSlides = Math.ceil(totalCards / cardsPerSlide);

    function updateCarousel() {
        if (totalCards === 0 || !wrapper) return;

        // Hitung card width berdasarkan wrapper width
        // wrapper.offsetWidth = (cardWidth * 3) + (gap * 2)
        const wrapperWidth = wrapper.offsetWidth;
        const cardWidth = (wrapperWidth - (gap * 2)) / 3;
        
        // Set width untuk semua cards
        cards.forEach(card => {
            card.style.width = cardWidth + 'px';
            card.style.minWidth = cardWidth + 'px';
            card.style.flexBasis = cardWidth + 'px';
        });

        // Hitung offset untuk slide saat ini
        const slideWidth = cardWidth + gap;
        const offset = -currentSlide * slideWidth * cardsPerSlide;
        
        track.style.transform = `translateX(${offset}px)`;

        // Update button states
        if (prevBtn) prevBtn.disabled = currentSlide === 0;
        if (nextBtn) nextBtn.disabled = currentSlide === totalSlides - 1;
    }

    function slideCarousel(direction) {
        const newSlide = currentSlide + direction;
        
        if (newSlide >= 0 && newSlide < totalSlides) {
            currentSlide = newSlide;
            updateCarousel();
        }
    }

    // Initialize carousel saat page load
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(updateCarousel, 50);
        });
    } else {
        setTimeout(updateCarousel, 50);
    }

    // Update saat window resize
    let resizeTimeout;
    window.addEventListener('resize', function() {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(updateCarousel, 250);
    });

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


