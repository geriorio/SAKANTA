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

    /* Base logo size - Match main navbar nav-light size */
    .navbar-simple .logo img {
        height: 48px !important;
        width: auto !important;
        filter: drop-shadow(0 2px 8px rgba(0, 0, 0, 0.3));
        transition: all 0.3s ease;
    }

    /* Force all navbar-simple states to have same size */
    .navbar-simple.nav-hero .logo img,
    .navbar-simple.nav-visible .logo img {
        height: 48px !important;
    }

    .navbar-simple.nav-light .logo img {
        height: 52px !important; /* Slightly bigger for consistency */
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

    /* Search Bar Styling - Larger and more prominent */
    .navbar-simple .search-bar {
        position: relative;
    }

    .navbar-simple .search-bar input,
    .navbar-simple .navbar-search-input {
        padding: 12px 45px 12px 20px;
        border-radius: 25px;
        border: 1px solid rgba(255,255,255,0.3);
        background: rgba(255,255,255,0.1);
        color: white;
        font-size: 13px;
        letter-spacing: 0.5px;
        width: 300px;
        transition: all 0.3s;
        font-family: 'Work Sans', sans-serif;
        font-weight: 400;
    }

    .navbar-simple .search-bar input::placeholder,
    .navbar-simple .navbar-search-input::placeholder {
        color: rgba(255,255,255,0.7);
        font-weight: 400;
    }

    .navbar-simple .search-bar input:focus,
    .navbar-simple .navbar-search-input:focus {
        outline: none;
        width: 350px;
        background: rgba(255,255,255,0.2);
        border-color: rgba(255,255,255,0.5);
    }

    /* Search bar adaptation for light mode */
    .navbar-simple.nav-light .search-bar input,
    .navbar-simple.nav-light .navbar-search-input {
        border: 2px solid #064852 !important;
        background: rgba(6, 72, 82, 0.05);
        color: #064852;
    }

    .navbar-simple.nav-light .search-bar input::placeholder,
    .navbar-simple.nav-light .navbar-search-input::placeholder {
        color: rgba(6, 72, 82, 0.5);
    }

    .navbar-simple.nav-light .search-bar input:focus,
    .navbar-simple.nav-light .navbar-search-input:focus {
        background: rgba(6, 72, 82, 0.1);
        border: 2px solid #064852 !important;
    }

    /* Search bar adaptation for dark mode */
    .navbar-simple.nav-dark .search-bar input,
    .navbar-simple.nav-dark .navbar-search-input {
        border-color: rgba(255,255,255,0.3);
        background: rgba(255,255,255,0.1);
        color: white;
    }

    .navbar-simple.nav-dark .search-bar input::placeholder,
    .navbar-simple.nav-dark .navbar-search-input::placeholder {
        color: rgba(255,255,255,0.7);
    }

    .navbar-simple.nav-dark .search-bar input:focus,
    .navbar-simple.nav-dark .navbar-search-input:focus {
        background: rgba(255,255,255,0.2);
        border-color: rgba(255,255,255,0.5);
    }

    /* Nav Right - Social & Auth */
    /* Custom scrollbar for search results */
    #search-results-simple::-webkit-scrollbar {
        width: 6px;
    }

    #search-results-simple::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 0 12px 12px 0;
    }

    #search-results-simple::-webkit-scrollbar-thumb {
        background: #064852;
        border-radius: 3px;
    }

    #search-results-simple::-webkit-scrollbar-thumb:hover {
        background: #053640;
    }

    /* Language Switcher Globe */
    .navbar-simple .lang-btn {
        color: white;
        transition: all 0.3s !important;
    }

    .navbar-simple.nav-light .lang-btn {
        color: #064852 !important;
    }

    .navbar-simple.nav-dark .lang-btn {
        color: white !important;
    }

    .navbar-simple .lang-btn:hover {
        transform: scale(1.15);
    }

    .navbar-simple.nav-light .lang-menu {
        background: white !important;
        box-shadow: 0 4px 15px rgba(6, 72, 82, 0.15) !important;
    }

    .navbar-simple.nav-dark .lang-menu {
        background: #f8f9fa !important;
        box-shadow: 0 4px 15px rgba(0,0,0,0.2) !important;
    }

    .navbar-simple .lang-menu a {
        color: #064852 !important;
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

    /* ====================== MOBILE STYLES ====================== */
    
    /* Hamburger Menu */
    .navbar-simple .hamburger {
        display: none;
        flex-direction: column;
        align-items: flex-end;
        justify-content: center;
        cursor: pointer;
        gap: 5px;
        z-index: 1003;
        padding: 0;
        position: relative;
    }

    .navbar-simple .hamburger span {
        width: 25px;
        height: 3px;
        background: white;
        transition: all 0.3s;
        border-radius: 2px;
        display: block;
        margin: 0;
    }

    .navbar-simple.nav-light .hamburger span {
        background: #064852;
    }

    .navbar-simple .hamburger.active span:nth-child(1) {
        transform: rotate(45deg) translate(6px, 6px);
        transform-origin: right center;
    }

    .navbar-simple .hamburger.active span:nth-child(2) {
        opacity: 0;
    }

    .navbar-simple .hamburger.active span:nth-child(3) {
        transform: rotate(-45deg) translate(6px, -6px);
        transform-origin: right center;
    }

    /* Mobile Backdrop */
    .navbar-simple .mobile-backdrop {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.5);
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s;
        z-index: 998;
        display: none;
    }

    .navbar-simple .mobile-backdrop.active {
        opacity: 1;
        visibility: visible;
    }

    /* Mobile Auth Section */
    .navbar-simple .mobile-auth-section {
        display: none;
        padding: 20px 0;
        border-top: 1px solid rgba(6, 72, 82, 0.1);
        margin-top: 20px;
    }

    .navbar-simple .mobile-menu-item {
        display: flex;
        align-items: center;
        padding: 15px 30px;
        text-decoration: none;
        color: #064852;
        font-size: 14px;
        font-weight: 600;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        transition: background 0.2s;
        border: none;
        background: transparent;
        width: 100%;
        text-align: left;
        cursor: pointer;
    }

    .navbar-simple .mobile-menu-item:hover {
        background: rgba(168, 198, 143, 0.1);
    }

    .navbar-simple .mobile-sign-in {
        display: block;
        margin: 15px 30px;
        padding: 12px 24px;
        background: #064852;
        color: white;
        text-align: center;
        text-decoration: none;
        font-size: 13px;
        font-weight: 700;
        letter-spacing: 2px;
        border-radius: 8px;
        transition: all 0.3s;
    }

    .navbar-simple .mobile-sign-in:hover {
        background: #a8c68f;
    }

    @media (max-width: 968px) {
        .navbar-simple {
            padding: 15px 20px;
        }

        /* Show hamburger */
        .navbar-simple .hamburger {
            display: flex;
            margin-left: auto;
            padding: 0;
        }

        /* Show backdrop when needed */
        .navbar-simple .mobile-backdrop {
            display: block;
        }

        /* Transform nav-center into mobile menu */
        .navbar-simple .nav-center {
            position: fixed;
            top: 0;
            right: -100%;
            width: 280px;
            height: 100vh;
            background: white;
            padding: 80px 0 30px 0;
            flex-direction: column;
            align-items: flex-start;
            gap: 0;
            transition: right 0.3s ease-in-out;
            z-index: 999;
            overflow-y: auto;
            box-shadow: -5px 0 25px rgba(0,0,0,0.2);
        }

        .navbar-simple .nav-center.active {
            right: 0;
        }

        .navbar-simple .nav-center a {
            width: 100%;
            padding: 15px 30px;
            color: #064852 !important;
            font-size: 14px;
            font-weight: 600;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            transition: background 0.2s;
        }

        .navbar-simple .nav-center a:hover {
            background: rgba(168, 198, 143, 0.1);
        }

        .navbar-simple .nav-center a::after {
            display: none;
        }

        .navbar-simple .nav-center .separator {
            display: none;
        }

        .navbar-simple .nav-center .search-bar {
            width: calc(100% - 60px);
            margin: 0 30px 20px 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid rgba(6, 72, 82, 0.1);
        }

        /* Hide desktop nav-right elements on mobile */
        .navbar-simple .nav-right .language-switcher,
        .navbar-simple .nav-right .user-dropdown,
        .navbar-simple .nav-right .book-now-btn {
            display: none;
        }

        /* Show mobile auth section */
        .navbar-simple .mobile-auth-section {
            display: block;
        }

        /* Logo size - consistent with main navbar */
        .navbar-simple .logo img {
            height: 40px !important; /* Changed from 30px */
        }

        .navbar-simple.nav-light .logo img {
            height: 40px !important; /* Same size for all modes */
        }
    }

    @media (max-width: 480px) {
        .navbar-simple {
            padding: 12px 15px;
        }

        .navbar-simple .nav-center {
            width: 260px;
        }

        .navbar-simple .logo img {
            height: 35px !important; /* Changed from 28px */
        }

        .navbar-simple.nav-light .logo img {
            height: 35px !important; /* Same size for all modes */
        }
    }
</style>

<nav class="navbar-simple nav-light nav-visible" id="navbar-detail">
    <div class="logo">
        <a href="/" style="display: flex; align-items: center; text-decoration: none;">
            <img id="navbar-detail-logo" src="/images/Logo-04.png" alt="Sakanta Logo" style="height: 48px !important;">
        </a>
    </div>

    <!-- Hamburger Menu -->
    <div class="hamburger" id="hamburgerSimple" onclick="toggleMobileMenuSimple()">
        <span></span>
        <span></span>
        <span></span>
    </div>

    <!-- Mobile Menu Backdrop -->
    <div class="mobile-backdrop" id="mobileBackdropSimple" onclick="toggleMobileMenuSimple()"></div>
    
    <div class="nav-center" id="navCenterSimple">
        <!-- Search Bar - Now positioned first, larger and wider -->
        <div class="search-bar" style="position: relative;">
            <input type="text" id="navbar-search-simple" placeholder="Search location or property..." 
                   class="navbar-search-input"
                   oninput="performSearchSimple(this.value)">
            <svg id="search-icon-simple" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke-width="2" style="position: absolute; right: 15px; top: 50%; transform: translateY(-50%); pointer-events: none; opacity: 0.7;">
                <circle cx="11" cy="11" r="8"></circle>
                <path d="m21 21-4.35-4.35"></path>
            </svg>
            
            <!-- Search Results Dropdown -->
            <div id="search-results-simple" style="position: absolute; top: 55px; left: 0; right: 0; background: white; border-radius: 12px; box-shadow: 0 8px 30px rgba(0,0,0,0.2); max-height: 340px; overflow-y: auto; display: none; z-index: 1002; min-width: 350px;">
                <!-- Results will be populated here -->
            </div>
        </div>
        
        <span class="separator">|</span>
        <a href="/listings">HOMES</a>
        <a href="/yacht-listings">SAIL</a>
        <a href="/about">ABOUT</a>
        <a href="/how-it-works">HOW IT WORKS</a>

        <!-- Mobile Auth Section -->
        <div class="mobile-auth-section">
            @auth
                <a href="/profile" class="mobile-menu-item">
                    <span style="margin-right: 10px;">👤</span>
                    My Profile
                </a>
                <button onclick="handleLogout()" class="mobile-menu-item mobile-logout">
                    <span style="margin-right: 10px;">🚪</span>
                    Sign Out
                </button>
            @else
                <a href="/signin" class="mobile-sign-in">
                    SIGN IN
                </a>
            @endauth
        </div>
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
    // Toggle Mobile Menu
    function toggleMobileMenuSimple() {
        const hamburger = document.getElementById('hamburgerSimple');
        const navCenter = document.getElementById('navCenterSimple');
        const backdrop = document.getElementById('mobileBackdropSimple');
        
        hamburger.classList.toggle('active');
        navCenter.classList.toggle('active');
        backdrop.classList.toggle('active');
        
        // Prevent body scroll when menu is open
        if (navCenter.classList.contains('active')) {
            document.body.style.overflow = 'hidden';
        } else {
            document.body.style.overflow = '';
        }
    }

    // Close mobile menu when clicking on a link
    document.addEventListener('DOMContentLoaded', function() {
        const navLinks = document.querySelectorAll('#navCenterSimple a');
        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                if (window.innerWidth <= 968) {
                    toggleMobileMenuSimple();
                }
            });
        });
    });

    // Toggle Language Menu
    function toggleLanguageMenuSimple() {
        const menu = document.getElementById('langMenuSimple');
        const isVisible = menu.style.visibility === 'visible';
        
        if (isVisible) {
            menu.style.opacity = '0';
            menu.style.visibility = 'hidden';
            menu.style.transform = 'translateY(-10px)';
        } else {
            menu.style.opacity = '1';
            menu.style.visibility = 'visible';
            menu.style.transform = 'translateY(0)';
        }
    }

    // Close language menu when clicking outside
    document.addEventListener('click', function(event) {
        const langSwitcher = document.querySelector('.navbar-simple .language-switcher');
        const langMenu = document.getElementById('langMenuSimple');
        
        if (langSwitcher && !langSwitcher.contains(event.target)) {
            langMenu.style.opacity = '0';
            langMenu.style.visibility = 'hidden';
            langMenu.style.transform = 'translateY(-10px)';
        }
    });

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

    // Search functionality
    let searchTimeoutSimple;
    function performSearchSimple(query) {
        const resultsDiv = document.getElementById('search-results-simple');
        
        // Clear previous timeout
        clearTimeout(searchTimeoutSimple);
        
        // Hide results if query is empty
        if (query.trim().length === 0) {
            resultsDiv.style.display = 'none';
            return;
        }
        
        // Show loading state
        resultsDiv.style.display = 'block';
        resultsDiv.innerHTML = '<div style="padding: 20px; text-align: center; color: #999; font-size: 13px;">Searching...</div>';
        
        // Debounce search
        searchTimeoutSimple = setTimeout(() => {
            fetch(`/api/search?q=${encodeURIComponent(query)}`)
                .then(response => response.json())
                .then(data => {
                if (data.locations.length === 0 && data.properties.length === 0) {
                    resultsDiv.innerHTML = '<div style="padding: 20px; text-align: center; color: #999; font-size: 13px;">No results found</div>';
                    return;
                }
                
                let html = '';
                
                // Locations - tanpa header
                if (data.locations.length > 0) {
                    data.locations.forEach(location => {
                        html += `
                            <a href="/location/${location.slug}" style="display: flex; align-items: center; justify-content: space-between; padding: 14px 20px; text-decoration: none; color: #333; transition: background 0.2s; border-bottom: 1px solid #f0f0f0;" onmouseover="this.style.background='#f8f9fa'" onmouseout="this.style.background='transparent'">
                                <div style="display: flex; align-items: center; gap: 12px; flex: 1;">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#064852" stroke-width="2">
                                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                        <circle cx="12" cy="10" r="3"></circle>
                                    </svg>
                                    <div style="font-weight: 600; font-size: 14px; color: #064852;">${location.name}</div>
                                </div>
                                <div style="font-size: 11px; color: #999; text-transform: uppercase; letter-spacing: 0.5px; font-weight: 600;">location</div>
                            </a>
                        `;
                    });
                }
                
                // Properties - tanpa header
                if (data.properties.length > 0) {
                    data.properties.forEach(property => {
                        const imageHtml = property.main_image ? 
                            `<img src="${property.main_image}" 
                                  alt="${property.name}" 
                                  style="width: 45px; height: 45px; object-fit: cover; border-radius: 8px;" 
                                  loading="eager"
                                  onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                             <div style="width: 45px; height: 45px; background: #e0e0e0; border-radius: 8px; display: none; align-items: center; justify-content: center;">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#999" stroke-width="2">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                </svg>
                             </div>` :
                            `<div style="width: 45px; height: 45px; background: #e0e0e0; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#999" stroke-width="2">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                </svg>
                             </div>`;
                        
                        html += `
                            <a href="/property/${property.slug}" style="display: flex; align-items: center; justify-content: space-between; padding: 14px 20px; text-decoration: none; color: #333; transition: background 0.2s; border-bottom: 1px solid #f0f0f0;" onmouseover="this.style.background='#f8f9fa'" onmouseout="this.style.background='transparent'">
                                <div style="display: flex; align-items: center; gap: 12px; flex: 1;">
                                    ${imageHtml}
                                    <div>
                                        <div style="font-weight: 600; font-size: 14px; color: #064852;">${property.name}</div>
                                        <div style="font-size: 11px; color: #999;">${property.location_name || 'No location'}</div>
                                    </div>
                                </div>
                                <div style="font-size: 11px; color: #999; text-transform: uppercase; letter-spacing: 0.5px; font-weight: 600; white-space: nowrap; margin-left: 10px;">property</div>
                            </a>
                        `;
                    });
                }
                resultsDiv.innerHTML = html;
                })
                .catch(error => {
                    console.error('Search error:', error);
                    resultsDiv.innerHTML = '<div style="padding: 20px; text-align: center; color: #e74c3c; font-size: 13px;">Error loading results</div>';
                });
        }, 300); // 300ms debounce
    }

    // Close search results when clicking outside
    document.addEventListener('click', function(event) {
        const searchBar = document.querySelector('.navbar-simple .search-bar');
        const resultsDiv = document.getElementById('search-results-simple');
        
        if (searchBar && !searchBar.contains(event.target)) {
            resultsDiv.style.display = 'none';
        }
    });

    // AUTO-HIDE NAVBAR: scroll down hide, scroll up show
    let lastScrollTop = 0;
    const navbar = document.getElementById('navbar-detail');
    const logo = document.getElementById('navbar-detail-logo');
    let scrollThreshold = 100;
    let isScrolling;

    // Force nav-light and logo dark on load
    document.addEventListener('DOMContentLoaded', function() {
        const searchIcon = document.getElementById('search-icon-simple');
        if (navbar) {
            navbar.classList.remove('nav-hero', 'nav-dark', 'nav-hidden');
            navbar.classList.add('nav-light', 'nav-visible');
        }
        if (logo) {
            logo.src = '/images/Logo-04.png';
        }
        // Set search icon to dark by default
        if (searchIcon) {
            searchIcon.setAttribute('stroke', '#064852');
        }
        
        // Check if page has nav-hero override (like all-listings)
        // If navbar gets set to nav-hero by page script, change icon to white
        const observer = new MutationObserver(function(mutations) {
            mutations.forEach(function(mutation) {
                if (mutation.attributeName === 'class') {
                    const searchIcon = document.getElementById('search-icon-simple');
                    if (navbar.classList.contains('nav-hero')) {
                        if (searchIcon) searchIcon.setAttribute('stroke', 'white');
                    } else if (navbar.classList.contains('nav-light')) {
                        if (searchIcon) searchIcon.setAttribute('stroke', '#064852');
                    } else if (navbar.classList.contains('nav-dark')) {
                        if (searchIcon) searchIcon.setAttribute('stroke', 'white');
                    }
                }
            });
        });
        
        if (navbar) {
            observer.observe(navbar, { attributes: true });
        }
    });

    // Auto-hide on scroll
    window.addEventListener('scroll', function() {
        window.clearTimeout(isScrolling);
        isScrolling = setTimeout(function() {
            let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
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
        }, 50);
    }, false);
</script>


