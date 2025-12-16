<!-- Featured Yachts Slider for FAQ Sail Pages -->

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

    .yacht-card {
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

    .yacht-card:hover {
        transform: translateY(-12px);
        z-index: 100;
        box-shadow: 0 15px 30px rgba(0,0,0,0.15);
    }

    .yacht-image {
        width: 100%;
        height: 300px;
        position: relative;
        overflow: hidden;
    }

    .yacht-image img {
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

    .like-btn svg {
        transition: all 0.3s;
    }

    .like-btn.liked svg {
        fill: #e74c3c;
    }

    .yacht-info-card {
        padding: 25px;
    }

    .yacht-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 12px;
        gap: 10px;
        position: relative;
        min-height: 24px;
    }

    .yacht-name {
        font-size: 18px;
        font-weight: 400;
        color: #064852;
        margin: 0;
        line-height: 1.3;
        font-family: 'Esther', serif;
        flex: 1;
        padding-right: 10px;
    }

    .yacht-icon {
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

    .yacht-price-text {
        font-size: 18px;
        font-weight: 600;
        color: #064852;
        margin: 0 0 8px 0;
        font-family: 'Work Sans', sans-serif;
    }

    .yacht-specs {
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
    .featured-yachts-section {
        background: #F7EFE2;
        padding: 80px 80px;
    }

    .featured-yachts-content {
        max-width: 1400px;
        margin: 0 auto;
    }

    .featured-yachts-header {
        text-align: center;
        margin-bottom: 60px;
    }

    .featured-yachts-header p {
        font-size: 20px;
        letter-spacing: 3px;
        text-transform: uppercase;
        color: #064852;
        margin-bottom: 20px;
        font-family: 'Work Sans', sans-serif;
        font-weight: 600;
    }

    .featured-yachts-header h2 {
        font-size: 52px;
        font-weight: 400;
        color: #064852;
        margin: 0 0 20px 0;
        font-family: 'Esther', serif;
        line-height: 1.3;
    }

    .featured-yachts-header > p:last-child {
        font-size: 18px;
        color: #064852;
        font-family: 'Work Sans', sans-serif;
        font-weight: 300;
    }

    .no-yachts {
        text-align: center;
        padding: 60px 20px;
    }
    
    .no-yachts p {
        font-size: 18px;
        color: #999;
    }

    /* Explore Button */
    .explore-yachts-btn {
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

    .explore-yachts-btn:hover {
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

    @media (max-width: 1024px) {
        .yacht-card {
            flex: 0 0 calc((100% - 30px) / 2);
            min-width: calc((100% - 30px) / 2);
        }
        .featured-yachts-section {
            padding: 60px 40px;
        }
        .featured-yachts-header h2 {
            font-size: 40px;
        }
    }

    @media (max-width: 768px) {
        .yacht-card {
            flex: 0 0 100%;
            min-width: 100%;
        }
        .carousel-nav-btn {
            width: 40px;
            height: 40px;
            font-size: 16px;
        }
        .featured-yachts-section {
            padding: 40px 20px;
        }
        .featured-yachts-header h2 {
            font-size: 32px;
        }
        .featured-yachts-header p {
            font-size: 16px;
        }
    }
</style>

<section class="featured-yachts-section">
    <div class="featured-yachts-content">
        <div class="featured-yachts-header">
            <p>DISCOVER</p>
            <h2>Explore More Yachts</h2>
            <p>DISCOVER OUR FINEST INVESTMENT OPPORTUNITIES ACROSS ALL LOCATIONS</p>
        </div>

        @if(isset($yachts) && $yachts->count() > 0)
            <div class="carousel-container">
                <button class="carousel-nav-btn" id="prevBtn" onclick="moveCarousel(-1)">‹</button>
                
                <div class="carousel-wrapper">
                    <div class="carousel-track" id="carouselTrack">
                        @foreach($yachts as $yacht)
                            <a href="{{ route('yacht.detail', $yacht->slug) }}" class="yacht-card">
                                <div class="yacht-image">
                                    <img src="{{ asset($yacht->main_image ?? '/images/yacht1.jpg') }}" alt="{{ $yacht->name }}">
                                    
                                    @if($yacht->status === 'coming_soon')
                                        <div class="status-badge coming-soon">Coming Soon</div>
                                    @elseif($yacht->status === 'fully_owned')
                                        <div class="status-badge sold-out">Sold Out</div>
                                    @endif
                                    
                                    @auth
                                    <button class="like-btn {{ Auth::user()->hasLikedYacht($yacht->id) ? 'liked' : '' }}" 
                                            data-yacht-id="{{ $yacht->id }}"
                                            onclick="event.preventDefault(); event.stopPropagation(); toggleYachtLike(this, {{ $yacht->id }})">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="{{ Auth::user()->hasLikedYacht($yacht->id) ? '#e74c3c' : 'none' }}" stroke="{{ Auth::user()->hasLikedYacht($yacht->id) ? '#e74c3c' : '#666' }}" stroke-width="2">
                                            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                                        </svg>
                                    </button>
                                    @endauth
                                </div>
                                <div class="yacht-info-card">
                                    <div class="yacht-header">
                                        <h3 class="yacht-name">
                                            {{ $yacht->name }}
                                            @if($yacht->shares_committed ?? $yacht->shares_booked)
                                                <span style="display: inline-block; margin-left: 8px; padding: 4px 10px; background: #064852; color: white; font-size: 10px; font-weight: 600; border-radius: 12px; text-transform: uppercase; letter-spacing: 0.5px; font-family: 'Work Sans', sans-serif;">
                                                    {{ $yacht->shares_committed ?? $yacht->shares_booked }} Committed
                                                </span>
                                            @endif
                                        </h3>
                                        <div class="yacht-icon"></div>
                                    </div>
                                    
                                    <p class="yacht-price-text">{{ $yacht->formatted_price }} / share</p>
                                    <p class="yacht-specs">{{ $yacht->ownership ?? '1/4 Ownership' }}</p>
                                    <p class="yacht-specs" style="display: flex; align-items: center; gap: 6px; flex-wrap: wrap; font-size: 12px; color: #666; font-family: 'Work Sans', sans-serif;">
                                        @if($yacht->length_overall)
                                        <span style="display: inline-flex; align-items: center; gap: 4px;">
                                            <img src="{{ asset('images/Icon-22.png') }}" alt="LOA" style="width: 24px; height: 24px; object-fit: contain;">
                                            {{ $yacht->length_overall }}
                                        </span>
                                        @endif
                                        @if($yacht->cruising_speed)
                                        <span style="color: #666; opacity: 0.4; font-weight: 300;">|</span>
                                        <span style="display: inline-flex; align-items: center; gap: 4px;">
                                            <img src="{{ asset('images/Icon-24.png') }}" alt="Cruising Speed" style="width: 24px; height: 24px; object-fit: contain;">
                                            {{ $yacht->cruising_speed }}
                                        </span>
                                        @endif
                                        @if($yacht->maximum_passengers)
                                        <span style="color: #666; opacity: 0.4; font-weight: 300;">|</span>
                                        <span style="display: inline-flex; align-items: center; gap: 4px;">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#064852" stroke-width="1.5">
                                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                                                <circle cx="9" cy="7" r="4"/>
                                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                                                <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                                            </svg>
                                            {{ $yacht->maximum_passengers }} Guests
                                        </span>
                                        @endif
                                    </p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>

                <button class="carousel-nav-btn" id="nextBtn" onclick="moveCarousel(1)">›</button>
            </div>

            <div class="button-container">
                <a href="{{ route('yacht.listings') }}" class="explore-yachts-btn">EXPLORE ALL YACHTS</a>
            </div>
        @else
            <div class="no-yachts">
                <p>No yachts available at the moment.</p>
            </div>
        @endif
    </div>
</section>

<script>
    let currentPosition = 0;
    const track = document.getElementById('carouselTrack');
    const cards = document.querySelectorAll('.yacht-card');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    
    // Calculate how many cards to show based on screen size
    function getCardsToShow() {
        if (window.innerWidth <= 768) return 1;
        if (window.innerWidth <= 1024) return 2;
        return 3;
    }

    function updateButtons() {
        const cardsToShow = getCardsToShow();
        const maxPosition = Math.max(0, cards.length - cardsToShow);
        
        prevBtn.disabled = currentPosition === 0;
        nextBtn.disabled = currentPosition >= maxPosition;
    }

    function moveCarousel(direction) {
        const cardsToShow = getCardsToShow();
        const maxPosition = Math.max(0, cards.length - cardsToShow);
        
        currentPosition += direction;
        currentPosition = Math.max(0, Math.min(currentPosition, maxPosition));
        
        const cardWidth = cards[0].offsetWidth;
        const gap = 30;
        const offset = currentPosition * (cardWidth + gap);
        
        track.style.transform = `translateX(-${offset}px)`;
        updateButtons();
    }

    // Initialize button states
    updateButtons();

    // Update on window resize
    window.addEventListener('resize', updateButtons);

    // Yacht Like Toggle Function
    function toggleYachtLike(button, yachtId) {
        fetch(`/yacht/${yachtId}/like`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.liked) {
                button.classList.add('liked');
                button.querySelector('svg').setAttribute('fill', '#e74c3c');
                button.querySelector('svg').setAttribute('stroke', '#e74c3c');
            } else {
                button.classList.remove('liked');
                button.querySelector('svg').setAttribute('fill', 'none');
                button.querySelector('svg').setAttribute('stroke', '#666');
            }
        })
        .catch(error => console.error('Error:', error));
    }
</script>
