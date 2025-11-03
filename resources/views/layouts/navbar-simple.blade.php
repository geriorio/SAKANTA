<style>
    .navbar-simple {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 1000;
        padding: 20px 50px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: transparent;
        border-bottom: none;
        transition: all 0.4s ease-in-out;
        transform: translateY(0);
        opacity: 1;
        font-family: 'Work Sans', sans-serif;
    }

    /* HERO STATE - Transparent at top only */
    .navbar-simple.nav-hero {
        background: transparent;
        border-bottom: none;
    }

    .navbar-simple.nav-hero .nav-center a,
    .navbar-simple.nav-hero .nav-center span {
        color: white;
    }

    .navbar-simple.nav-hero .nav-center a::after {
        background: white;
    }

    .navbar-simple.nav-hero .social-icon {
        border-color: white !important;
    }

    .navbar-simple.nav-hero .social-icon svg {
        stroke: white;
        fill: white;
    }

    .navbar-simple.nav-hero .social-icon:hover {
        background: white;
    }

    .navbar-simple.nav-hero .social-icon:hover svg {
        stroke: #064852;
        fill: #064852;
    }

    .navbar-simple.nav-hero .book-now-btn {
        background: white;
        color: #064852;
        border: 2px solid white;
    }

    .navbar-simple.nav-hero .book-now-btn:hover {
        background: #a8c68f;
        color: white;
        border-color: #a8c68f;
    }

    /* LIGHT STATE - Cream background sections */
    .navbar-simple.nav-light {
        background: rgba(247, 239, 226, 0.95);
        backdrop-filter: blur(10px);
        border-bottom: 1px solid rgba(6, 72, 82, 0.1);
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    .navbar-simple.nav-light .nav-center a,
    .navbar-simple.nav-light .nav-center span {
        color: #064852;
    }

    .navbar-simple.nav-light .nav-center a::after {
        background: #064852;
    }

    .navbar-simple.nav-light .social-icon {
        border-color: #064852 !important;
    }

    .navbar-simple.nav-light .social-icon svg {
        stroke: #064852;
        fill: #064852;
    }

    .navbar-simple.nav-light .social-icon:hover {
        background: #064852;
    }

    .navbar-simple.nav-light .social-icon:hover svg {
        stroke: white;
        fill: white;
    }

    .navbar-simple.nav-light .book-now-btn {
        background: #064852;
        color: white;
        border: 2px solid #064852;
    }

    .navbar-simple.nav-light .book-now-btn:hover {
        background: #a8c68f;
        border-color: #a8c68f;
    }

    /* DARK STATE - Teal/Green background sections */
    .navbar-simple.nav-dark {
        background: rgba(6, 72, 82, 0.95);
        backdrop-filter: blur(10px);
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.15);
    }

    .navbar-simple.nav-dark .nav-center a,
    .navbar-simple.nav-dark .nav-center span {
        color: white;
    }

    .navbar-simple.nav-dark .nav-center a::after {
        background: white;
    }

    .navbar-simple.nav-dark .social-icon {
        border-color: white !important;
    }

    .navbar-simple.nav-dark .social-icon svg {
        stroke: white;
        fill: white;
    }

    .navbar-simple.nav-dark .social-icon:hover {
        background: white;
    }

    .navbar-simple.nav-dark .social-icon:hover svg {
        stroke: #064852;
        fill: #064852;
    }

    .navbar-simple.nav-dark .book-now-btn {
        background: white;
        color: #064852;
        border: 2px solid white;
    }

    .navbar-simple.nav-dark .book-now-btn:hover {
        background: #a8c68f;
        color: white;
        border-color: #a8c68f;
    }

    /* Auto-hide states */
    .navbar-simple.nav-hidden {
        transform: translateY(-100%);
        opacity: 0;
        pointer-events: none;
    }

    .navbar-simple.nav-visible {
        transform: translateY(0);
        opacity: 1;
        pointer-events: auto;
    }

    /* Logo styling */
    .navbar-simple .logo {
        display: flex;
        align-items: center;
    }

    .navbar-simple .logo img {
        height: 48px !important;
        width: auto !important;
        filter: drop-shadow(0 2px 8px rgba(0, 0, 0, 0.3));
        transition: all 0.3s ease;
    }

    .navbar-simple.nav-light .logo img {
        height: 56px !important;
        filter: drop-shadow(0 2px 4px rgba(6, 72, 82, 0.3));
    }

    .navbar-simple.nav-dark .logo img {
        height: 48px !important;
        filter: drop-shadow(0 2px 8px rgba(0, 0, 0, 0.3));
    }

    .navbar-simple .logo a:hover img {
        transform: scale(1.05);
    }

    /* Nav Center Links */
    .navbar-simple .nav-center {
        display: flex;
        gap: 30px;
        align-items: center;
    }

    .navbar-simple .nav-center a {
        color: white;
        text-decoration: none;
        font-size: 12px;
        letter-spacing: 2px;
        text-transform: uppercase;
        position: relative;
        padding-bottom: 5px;
        font-family: 'Work Sans', sans-serif;
        font-weight: 700;
        transition: color 0.3s;
    }

    .navbar-simple .nav-center a::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 0;
        height: 2px;
        background: white;
        transition: width 0.3s ease;
    }

    .navbar-simple .nav-center a:hover::after {
        width: 100%;
    }

    .navbar-simple .nav-center .separator {
        color: white;
        opacity: 0.5;
        transition: color 0.3s;
    }

    /* Nav Right */
    .navbar-simple .nav-right {
        display: flex;
        gap: 15px;
        align-items: center;
    }

    .navbar-simple .social-icon {
        width: 40px;
        height: 40px;
        border: 1px solid white !important;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        text-decoration: none;
        transition: all 0.3s;
    }

    .navbar-simple .social-icon svg {
        transition: all 0.3s;
        stroke-width: 0 !important;
        vector-effect: non-scaling-stroke;
    }

    .navbar-simple .book-now-btn {
        padding: 10px 25px;
        background: white;
        color: #2c3e50;
        text-decoration: none;
        border-radius: 20px;
        font-size: 11px;
        letter-spacing: 2px;
        text-transform: uppercase;
        font-weight: 700;
        transition: all 0.3s;
        font-family: 'Work Sans', sans-serif;
        border: 2px solid white;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .navbar-simple .book-now-btn:hover {
        background: #a8c68f;
        color: white;
        border-color: #a8c68f;
        transform: translateY(-2px);
    }

    /* User Button Adaptations */
    .navbar-simple.nav-hero .user-btn {
        background: rgba(255,255,255,0.1) !important;
        border: 2px solid white !important;
    }

    .navbar-simple.nav-light .user-btn {
        background: rgba(6, 72, 82, 0.1) !important;
        border: 2px solid #064852 !important;
    }

    .navbar-simple.nav-light .user-btn span {
        color: #064852 !important;
    }

    .navbar-simple.nav-light .user-btn svg {
        fill: #064852 !important;
    }

    .navbar-simple.nav-dark .user-btn {
        background: rgba(255,255,255,0.1) !important;
        border: 2px solid white !important;
    }

    .navbar-simple.nav-dark .user-btn span {
        color: white !important;
    }

    .navbar-simple.nav-dark .user-btn svg {
        fill: white !important;
    }

    .navbar-simple .user-btn:hover {
        background: #a8c68f !important;
        border-color: #a8c68f !important;
    }

    .navbar-simple .user-btn:hover span,
    .navbar-simple .user-btn:hover svg {
        color: white !important;
        fill: white !important;
    }

    /* User Dropdown */
    .navbar-simple .user-dropdown {
        position: relative;
    }

    .navbar-simple .dropdown-menu {
        position: absolute;
        top: 60px;
        right: 0;
        background: white;
        border-radius: 15px;
        box-shadow: 0 8px 30px rgba(0,0,0,0.15);
        min-width: 220px;
        opacity: 0;
        visibility: hidden;
        transform: translateY(-10px);
        transition: all 0.3s;
        z-index: 1001;
    }

    .navbar-simple .dropdown-menu.show {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }
</style>

<nav class="navbar-simple nav-hero nav-visible" id="navbar-detail">
    <div class="logo">
        <a href="/" style="display: flex; align-items: center; text-decoration: none;">
            <img id="navbar-detail-logo" src="/images/Logo-06.png" alt="Sakanta Logo">
        </a>
    </div>
    
    <div class="nav-center">
        <a href="/">HOME</a>
        <a href="/listings">LISTINGS</a>
        <a href="/about">ABOUT</a>
        <a href="/faq">FAQs</a>
        <span class="separator">|</span>
        <a href="#">ENGLISH</a>
        <span class="separator">|</span>
        <a href="#">BAHASA</a>
    </div>

    <div class="nav-right">
        @auth
            <!-- User sudah login - tampilkan Profile dengan Dropdown -->
            <div class="user-dropdown" style="position: relative;">
                <button class="user-btn" onclick="toggleUserDropdownDetail()" style="background: rgba(255,255,255,0.1); border: 2px solid white; padding: 8px 20px; border-radius: 50px; display: flex; align-items: center; gap: 10px; cursor: pointer; transition: all 0.3s; font-family: 'Work Sans', sans-serif;">
                    @if(Auth::user()->avatar)
                        <img src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}" style="width: 32px; height: 32px; border-radius: 50%; object-fit: cover;">
                    @else
                        <div style="width: 32px; height: 32px; border-radius: 50%; background: white; color: #064852; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 14px;">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                    @endif
                    <span style="color: white; font-weight: 600; font-size: 12px; letter-spacing: 1px;">{{ Str::limit(Auth::user()->name, 15) }}</span>
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="white" style="transition: transform 0.3s;">
                        <path d="M7 10l5 5 5-5z"/>
                    </svg>
                </button>
                
                <div class="dropdown-menu" id="userDropdownMenuDetail" style="position: absolute; top: 60px; right: 0; background: white; border-radius: 15px; box-shadow: 0 8px 30px rgba(0,0,0,0.15); min-width: 220px; opacity: 0; visibility: hidden; transform: translateY(-10px); transition: all 0.3s; z-index: 1001;">
                    <div style="padding: 20px; border-bottom: 1px solid #eee;">
                        <div style="font-weight: 700; color: #064852; font-size: 16px; margin-bottom: 5px;">{{ Auth::user()->name }}</div>
                        <div style="font-size: 13px; color: #999;">{{ Auth::user()->email }}</div>
                    </div>
                    <a href="{{ route('profile') }}" style="display: flex; align-items: center; gap: 12px; padding: 15px 20px; text-decoration: none; color: #333; transition: background 0.2s; font-size: 14px; font-weight: 500;" onmouseover="this.style.background='#f8f9fa'" onmouseout="this.style.background='transparent'">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        <span>My Profile</span>
                    </a>
                    <form action="{{ route('logout') }}" method="POST" style="border-top: 1px solid #eee; margin: 0; padding: 0;">
                        @csrf
                        <button type="submit" style="width: 100%; display: flex; align-items: center; gap: 12px; padding: 15px 20px; border: none; background: transparent; color: #e74c3c; cursor: pointer; transition: all 0.2s ease; font-size: 14px; font-weight: 500; font-family: 'Work Sans', sans-serif; text-align: left; border-radius: 0 0 15px 15px;" onmouseover="this.style.background='#fff5f5'" onmouseout="this.style.background='transparent'">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                <polyline points="16 17 21 12 16 7"></polyline>
                                <line x1="21" y1="12" x2="9" y2="12"></line>
                            </svg>
                            <span>Sign Out</span>
                        </button>
                    </form>
                </div>
            </div>
        @else
            <!-- User belum login - tampilkan Sign In -->
            <a href="{{ route('signin') }}" class="book-now-btn">SIGN IN</a>
        @endauth
    </div>
</nav>

<script>
    // Toggle User Dropdown
    function toggleUserDropdownDetail() {
        const dropdown = document.getElementById('userDropdownMenuDetail');
        const isVisible = dropdown.style.opacity === '1';
        
        if (isVisible) {
            dropdown.style.opacity = '0';
            dropdown.style.visibility = 'hidden';
            dropdown.style.transform = 'translateY(-10px)';
        } else {
            dropdown.style.opacity = '1';
            dropdown.style.visibility = 'visible';
            dropdown.style.transform = 'translateY(0)';
        }
    }

    // Close dropdown when clicking outside
    document.addEventListener('click', function(event) {
        const dropdown = document.getElementById('userDropdownMenuDetail');
        const userDropdown = document.querySelector('.navbar-simple .user-dropdown');
        
        if (dropdown && userDropdown && !userDropdown.contains(event.target)) {
            dropdown.style.opacity = '0';
            dropdown.style.visibility = 'hidden';
            dropdown.style.transform = 'translateY(-10px)';
        }
    });

    // ===== ADVANCED NAVBAR COLOR ADAPTATION & AUTO-HIDE SYSTEM =====
    let lastScrollTop = 0;
    const navbar = document.getElementById('navbar-detail');
    const navbarLogo = document.getElementById('navbar-detail-logo');
    let scrollThreshold = 100;
    let isScrolling;

    // Function to detect background color and adapt navbar
    function updateNavbarDetail() {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        const windowHeight = window.innerHeight;
        
        // Get all sections
        const sections = document.querySelectorAll('section, .section-features, .section-faq, .founder-section, .property-info-section, .section-pied, .faq-section, .hero-section, .values-section, .cta-section, .light-section, .dark-section, .liked-section, .profile-header');
        
        // Check which section is currently at navbar position
        let currentSection = null;
        sections.forEach(section => {
            const rect = section.getBoundingClientRect();
            const sectionTop = rect.top + scrollTop;
            const sectionBottom = sectionTop + rect.height;
            const navbarPosition = scrollTop + 80; // navbar height position
            
            if (navbarPosition >= sectionTop && navbarPosition < sectionBottom) {
                currentSection = section;
            }
        });
        
        // If no section found or at very top (less than 50px), use hero style
        if (!currentSection || scrollTop < 50) {
            navbar.classList.remove('nav-light', 'nav-dark');
            navbar.classList.add('nav-hero');
            // Use Logo-06 (white) for transparent hero
            if (navbarLogo) navbarLogo.src = '/images/Logo-06.png';
            return;
        }
        
        if (currentSection) {
            const bgColor = window.getComputedStyle(currentSection).backgroundColor;
            
            // Detect DARK/GREEN backgrounds (#064852 = rgb(6, 72, 82))
            if (bgColor.includes('6, 72, 82') || 
                bgColor.includes('42, 95, 127') || 
                bgColor.includes('168, 198, 143') || // sage green
                bgColor.includes('26, 26, 26') || // #1a1a1a (profile header dark)
                currentSection.classList.contains('dark-section') ||
                currentSection.classList.contains('values-section') ||
                currentSection.classList.contains('cta-section') ||
                currentSection.classList.contains('profile-header')) {
                navbar.classList.remove('nav-hero', 'nav-light');
                navbar.classList.add('nav-dark');
                // Use Logo-06 (white) for dark backgrounds
                if (navbarLogo) navbarLogo.src = '/images/Logo-06.png';
            }
            // Detect LIGHT backgrounds (#F7EFE2 = rgb(247, 239, 226))
            else if (bgColor.includes('247, 239, 226') || 
                bgColor.includes('245, 242, 234') || 
                bgColor.includes('255, 255, 255') ||
                currentSection.classList.contains('section-features') ||
                currentSection.classList.contains('section-faq') ||
                currentSection.classList.contains('founder-section') ||
                currentSection.classList.contains('light-section') ||
                currentSection.classList.contains('liked-section')) {
                navbar.classList.remove('nav-hero', 'nav-dark');
                navbar.classList.add('nav-light');
                // Use Logo-04 (dark) for light backgrounds
                if (navbarLogo) navbarLogo.src = '/images/Logo-04.png';
            }
            // Default to dark if background is unclear
            else {
                navbar.classList.remove('nav-hero', 'nav-light');
                navbar.classList.add('nav-dark');
                if (navbarLogo) navbarLogo.src = '/images/Logo-06.png';
            }
        }
    }

    // Auto-hide navbar on scroll down, show on scroll up
    window.addEventListener('scroll', function() {
        window.clearTimeout(isScrolling);

        isScrolling = setTimeout(function() {
            let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

            // Update navbar color based on section background
            updateNavbarDetail();

            // Only apply auto-hide after scrolling past threshold
            if (scrollTop > scrollThreshold) {
                if (scrollTop > lastScrollTop) {
                    // Scrolling down - hide navbar
                    navbar.classList.add('nav-hidden');
                    navbar.classList.remove('nav-visible');
                } else {
                    // Scrolling up - show navbar
                    navbar.classList.remove('nav-hidden');
                    navbar.classList.add('nav-visible');
                }
            } else {
                // At top of page - always show navbar
                navbar.classList.remove('nav-hidden');
                navbar.classList.add('nav-visible');
            }

            lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
        }, 50); // 50ms debounce for smooth performance
    }, false);

    // Initialize navbar on page load
    document.addEventListener('DOMContentLoaded', function() {
        navbar.classList.add('nav-visible', 'nav-hero');
        
        // Update color after brief delay to ensure sections are loaded
        setTimeout(updateNavbarDetail, 100);
    });
    
    // Also update on window resize
    window.addEventListener('resize', function() {
        setTimeout(updateNavbarDetail, 100);
    });
</script>


