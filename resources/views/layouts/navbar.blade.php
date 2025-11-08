<!-- Navigation -->
<nav id="navbar" class="nav-hero">
    <div class="logo">
        <a href="/" style="display: flex; align-items: center; text-decoration: none;">
            <img id="navbar-logo" src="/images/Logo-06.png" alt="Sakanta Logo" style="height: 48px !important;">
        </a>
    </div>

    <!-- Hamburger Menu -->
    <div class="hamburger" id="hamburger" onclick="toggleMobileMenu()">
        <span></span>
        <span></span>
        <span></span>
    </div>

    <!-- Mobile Menu Backdrop -->
    <div class="mobile-backdrop" id="mobileBackdrop" onclick="toggleMobileMenu()"></div>

    <div class="nav-center" id="navCenter">
        <!-- Search Bar - Now positioned first, larger and wider -->
        <div class="search-bar" style="position: relative;">
            <input type="text" id="navbar-search" placeholder="Search location or property..." 
                   class="navbar-search-input"
                   oninput="performSearch(this.value)">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="position: absolute; right: 15px; top: 50%; transform: translateY(-50%); pointer-events: none; opacity: 0.7;">
                <circle cx="11" cy="11" r="8"></circle>
                <path d="m21 21-4.35-4.35"></path>
            </svg>
            
            <!-- Search Results Dropdown -->
            <div id="search-results" style="position: absolute; top: 55px; left: 0; right: 0; background: white; border-radius: 12px; box-shadow: 0 8px 30px rgba(0,0,0,0.2); max-height: 340px; overflow-y: auto; display: none; z-index: 1002; min-width: 350px;">
                <!-- Results will be populated here -->
            </div>
        </div>
        
        <span class="separator">|</span>
        <a href="/">HOME</a>
        <a href="/listings">LISTINGS</a>
        <a href="/about">ABOUT</a>
        <a href="/how-it-works">HOW IT WORKS</a>

        <!-- Mobile Only: Auth Section -->
        <div class="mobile-auth-section">
            @auth
                <a href="{{ route('profile') }}" class="mobile-menu-item">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                    <span>My Profile</span>
                </a>
                <form action="{{ route('logout') }}" method="POST" style="margin: 0; padding: 0;">
                    @csrf
                    <button type="submit" class="mobile-menu-item mobile-logout">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                            <polyline points="16 17 21 12 16 7"></polyline>
                            <line x1="21" y1="12" x2="9" y2="12"></line>
                        </svg>
                        <span>Sign Out</span>
                    </button>
                </form>
            @else
                <a href="{{ route('signin') }}" class="mobile-sign-in">SIGN IN</a>
            @endauth
        </div>
    </div>
    <div class="nav-right">
        <!-- Language Switcher Globe -->
        <div class="language-switcher" style="position: relative;">
            <button class="lang-btn" onclick="toggleLanguageMenu()" style="background: transparent; border: none; cursor: pointer; display: flex; align-items: center; justify-content: center; width: 40px; height: 40px; padding: 0; transition: all 0.3s;">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="10"></circle>
                    <path d="M2 12h20"></path>
                    <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                </svg>
            </button>
            
            <!-- Language Dropdown Menu -->
            <div class="lang-menu" id="langMenu" style="position: absolute; top: 50px; right: 0; background: white; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); min-width: 150px; opacity: 0; visibility: hidden; transform: translateY(-10px); transition: all 0.3s; z-index: 1001; overflow: hidden;">
                <a href="#" style="display: block; padding: 12px 20px; text-decoration: none; color: #064852; font-size: 13px; font-weight: 600; letter-spacing: 1px; text-transform: uppercase; border-bottom: 1px solid #eee; transition: background 0.2s;" onmouseover="this.style.background='#f8f9fa'" onmouseout="this.style.background='transparent'">
                    ENGLISH
                </a>
                <a href="#" style="display: block; padding: 12px 20px; text-decoration: none; color: #064852; font-size: 13px; font-weight: 600; letter-spacing: 1px; text-transform: uppercase; transition: background 0.2s;" onmouseover="this.style.background='#f8f9fa'" onmouseout="this.style.background='transparent'">
                    BAHASA
                </a>
            </div>
        </div>

        @auth
            <!-- User sudah login - tampilkan Profile dengan Dropdown -->
            <div class="user-dropdown" style="position: relative;">
                <button class="user-btn" onclick="toggleUserDropdown()" style="background: rgba(255,255,255,0.1); border: 2px solid white; padding: 8px 20px; border-radius: 50px; display: flex; align-items: center; gap: 10px; cursor: pointer; transition: all 0.3s; font-family: 'Work Sans', sans-serif;">
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
                
                <div class="dropdown-menu" id="userDropdownMenu" style="position: absolute; top: 60px; right: 0; background: white; border-radius: 15px; box-shadow: 0 8px 30px rgba(0,0,0,0.15); min-width: 220px; opacity: 0; visibility: hidden; transform: translateY(-10px); transition: all 0.3s; z-index: 1001;">
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
function toggleMobileMenu() {
    const navCenter = document.getElementById('navCenter');
    const hamburger = document.getElementById('hamburger');
    const backdrop = document.getElementById('mobileBackdrop');
    
    navCenter.classList.toggle('active');
    hamburger.classList.toggle('active');
    backdrop.classList.toggle('active');
    
    // Prevent body scroll when menu is open
    if (navCenter.classList.contains('active')) {
        document.body.style.overflow = 'hidden';
    } else {
        document.body.style.overflow = '';
    }
}

// Close mobile menu when clicking on a link
document.querySelectorAll('.nav-center a').forEach(link => {
    link.addEventListener('click', () => {
        const navCenter = document.getElementById('navCenter');
        const hamburger = document.getElementById('hamburger');
        const backdrop = document.getElementById('mobileBackdrop');
        
        navCenter.classList.remove('active');
        hamburger.classList.remove('active');
        backdrop.classList.remove('active');
        document.body.style.overflow = '';
    });
});

// Close mobile menu when clicking outside
document.addEventListener('click', function(event) {
    const navCenter = document.getElementById('navCenter');
    const hamburger = document.getElementById('hamburger');
    const backdrop = document.getElementById('mobileBackdrop');
    
    if (navCenter && hamburger && 
        !navCenter.contains(event.target) && 
        !hamburger.contains(event.target) &&
        navCenter.classList.contains('active')) {
        navCenter.classList.remove('active');
        hamburger.classList.remove('active');
        backdrop.classList.remove('active');
        document.body.style.overflow = '';
    }
});

function toggleLanguageMenu() {
    const menu = document.getElementById('langMenu');
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
    const langSwitcher = document.querySelector('.language-switcher');
    const langMenu = document.getElementById('langMenu');
    
    if (langSwitcher && !langSwitcher.contains(event.target)) {
        langMenu.style.opacity = '0';
        langMenu.style.visibility = 'hidden';
        langMenu.style.transform = 'translateY(-10px)';
    }
});

function toggleUserDropdown() {
    const menu = document.getElementById('userDropdownMenu');
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

// Close dropdown when clicking outside
document.addEventListener('click', function(event) {
    const userDropdown = document.querySelector('.user-dropdown');
    const menu = document.getElementById('userDropdownMenu');
    
    if (userDropdown && !userDropdown.contains(event.target)) {
        menu.style.opacity = '0';
        menu.style.visibility = 'hidden';
        menu.style.transform = 'translateY(-10px)';
    }
});

// Search functionality
let searchTimeout;
function performSearch(query) {
    const resultsDiv = document.getElementById('search-results');
    
    // Clear previous timeout
    clearTimeout(searchTimeout);
    
    // Hide results if query is empty
    if (query.trim().length === 0) {
        resultsDiv.style.display = 'none';
        return;
    }
    
    // Show loading state
    resultsDiv.style.display = 'block';
    resultsDiv.innerHTML = '<div style="padding: 20px; text-align: center; color: #999; font-size: 13px;">Searching...</div>';
    
    // Debounce search
    searchTimeout = setTimeout(() => {
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
                        html += `
                            <a href="/property/${property.slug}" style="display: flex; align-items: center; justify-content: space-between; padding: 14px 20px; text-decoration: none; color: #333; transition: background 0.2s; border-bottom: 1px solid #f0f0f0;" onmouseover="this.style.background='#f8f9fa'" onmouseout="this.style.background='transparent'">
                                <div style="display: flex; align-items: center; gap: 12px; flex: 1;">
                                    ${property.main_image ? 
                                        `<img src="${property.main_image}" alt="${property.name}" style="width: 45px; height: 45px; object-fit: cover; border-radius: 8px;">` :
                                        `<div style="width: 45px; height: 45px; background: #e0e0e0; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#999" stroke-width="2">
                                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                            </svg>
                                        </div>`
                                    }
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
    const searchBar = document.querySelector('.search-bar');
    const resultsDiv = document.getElementById('search-results');
    
    if (searchBar && !searchBar.contains(event.target)) {
        resultsDiv.style.display = 'none';
    }
});
</script>

<style>
    nav {
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

    /* Navbar saat di hero section - transparent ONLY */
    nav.nav-hero {
        background: transparent;
        border-bottom: none;
    }

    /* Navbar saat di section terang (cream #F7EFE2) */
    nav.nav-light {
        background: rgba(247, 239, 226, 0.95);
        backdrop-filter: blur(10px);
        border-bottom: 1px solid rgba(6, 72, 82, 0.1);
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    nav.nav-light .nav-center a,
    nav.nav-light .nav-center span {
        color: #064852;
    }

    nav.nav-light .social-icon {
        border-color: #064852;
    }

    nav.nav-light .social-icon svg {
        stroke: #064852;
        fill: #064852;
    }

    nav.nav-light .social-icon:hover {
        background: #064852;
    }

    nav.nav-light .social-icon:hover svg {
        stroke: white;
        fill: white;
    }

    nav.nav-light .book-now-btn {
        background: #064852;
        color: white;
    }

    nav.nav-light .book-now-btn:hover {
        background: #a8c68f;
    }

    /* Navbar saat di section dark/green (#064852) */
    nav.nav-dark {
        background: rgba(6, 72, 82, 0.95);
        backdrop-filter: blur(10px);
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.15);
    }

    nav.nav-dark .nav-center a,
    nav.nav-dark .nav-center span {
        color: white;
    }

    nav.nav-dark .social-icon {
        border-color: white;
    }

    nav.nav-dark .social-icon svg {
        stroke: white;
        fill: white;
    }

    nav.nav-dark .social-icon:hover {
        background: white;
    }

    nav.nav-dark .social-icon:hover svg {
        stroke: #064852;
        fill: #064852;
    }

    nav.nav-dark .book-now-btn {
        background: white;
        color: #064852;
    }

    nav.nav-dark .book-now-btn:hover {
        background: #a8c68f;
        color: white;
    }

    /* Underline color untuk setiap mode */
    nav.nav-light .nav-center a::after {
        background: #064852;
    }

    nav.nav-dark .nav-center a::after {
        background: white;
    }

    nav.nav-hidden {
        transform: translateY(-100%);
        opacity: 0;
        pointer-events: none;
    }

    nav.nav-visible {
        transform: translateY(0);
        opacity: 1;
        pointer-events: auto;
    }

    .logo {
        display: flex;
        align-items: center;
    }

    /* Base logo size - KEEP 48px */
    .logo img {
        height: 48px !important;
        width: auto !important;
        filter: drop-shadow(0 2px 8px rgba(0, 0, 0, 0.3));
        transition: all 0.3s ease;
    }

    /* Ensure all navbar states have same logo size */
    nav .logo img,
    nav.nav-hero .logo img {
        height: 48px !important;
    }

    /* Logo size - nav-light (krem) - BESARKAN sedikit untuk match mode lain */
    nav.nav-light .logo img {
        height: 52px !important; /* Slightly bigger */
        filter: drop-shadow(0 2px 4px rgba(6, 72, 82, 0.3));
    }

    nav.nav-dark .logo img {
        height: 48px !important;
        filter: drop-shadow(0 2px 8px rgba(0, 0, 0, 0.3));
    }

    nav.nav-visible .logo img {
        height: 48px !important;
    }

    .logo a:hover img {
        transform: scale(1.05);
    }

    .nav-center {
        display: flex;
        gap: 30px;
        align-items: center;
    }

    .nav-center a {
        color: white;
        text-decoration: none;
        font-size: 12px;
        letter-spacing: 2px;
        text-transform: uppercase;
        position: relative;
        padding-bottom: 5px;
        font-family: 'Work Sans', sans-serif;
        font-weight: 700;
    }

    .nav-center a::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 0;
        height: 2px;
        background: white;
        transition: width 0.3s ease;
    }

    /* Underline color untuk light mode - harus sama dengan warna text */
    nav.nav-light .nav-center a::after {
        background: #064852;
    }

    .nav-center a:hover::after {
        width: 100%;
    }

    /* Separator color - sama dengan text color */
    .nav-center .separator {
        color: white;
        opacity: 0.5;
        transition: color 0.3s;
    }

    nav.nav-light .nav-center .separator {
        color: #064852;
    }

    nav.nav-dark .nav-center .separator {
        color: white;
    }

    /* Search Bar Styling - Larger and more prominent */
    .search-bar {
        position: relative;
    }

    .search-bar input,
    .navbar-search-input {
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

    .search-bar input::placeholder,
    .navbar-search-input::placeholder {
        color: rgba(255,255,255,0.7);
        font-weight: 400;
    }

    .search-bar input:focus,
    .navbar-search-input:focus {
        outline: none;
        width: 350px;
        background: rgba(255,255,255,0.2);
        border-color: rgba(255,255,255,0.5);
    }

    /* Search bar adaptation for light mode */
    nav.nav-light .search-bar input,
    nav.nav-light .navbar-search-input {
        border: 2px solid #064852 !important;
        background: rgba(6, 72, 82, 0.05);
        color: #064852;
    }

    nav.nav-light .search-bar input::placeholder,
    nav.nav-light .navbar-search-input::placeholder {
        color: rgba(6, 72, 82, 0.5);
    }

    nav.nav-light .search-bar input:focus,
    nav.nav-light .navbar-search-input:focus {
        background: rgba(6, 72, 82, 0.1);
        border: 2px solid #064852 !important;
    }

    nav.nav-light .search-bar svg {
        stroke: #064852 !important;
    }

    /* Search bar adaptation for dark mode */
    nav.nav-dark .search-bar input,
    nav.nav-dark .navbar-search-input {
        border-color: rgba(255,255,255,0.3);
        background: rgba(255,255,255,0.1);
        color: white;
    }

    nav.nav-dark .search-bar input::placeholder,
    nav.nav-dark .navbar-search-input::placeholder {
        color: rgba(255,255,255,0.7);
    }

    nav.nav-dark .search-bar input:focus,
    nav.nav-dark .navbar-search-input:focus {
        background: rgba(255,255,255,0.2);
        border-color: rgba(255,255,255,0.5);
    }

    nav.nav-dark .search-bar svg {
        stroke: white !important;
    }

    /* Custom scrollbar for search results */
    #search-results::-webkit-scrollbar {
        width: 6px;
    }

    #search-results::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 0 12px 12px 0;
    }

    #search-results::-webkit-scrollbar-thumb {
        background: #064852;
        border-radius: 3px;
    }

    #search-results::-webkit-scrollbar-thumb:hover {
        background: #053640;
    }

    /* Language Switcher Globe */
    .lang-btn {
        color: white;
        transition: all 0.3s !important;
    }

    nav.nav-light .lang-btn {
        color: #064852 !important;
    }

    nav.nav-dark .lang-btn {
        color: white !important;
    }

    .lang-btn:hover {
        transform: scale(1.15);
    }

    nav.nav-light .lang-menu {
        background: white !important;
        box-shadow: 0 4px 15px rgba(6, 72, 82, 0.15) !important;
    }

    nav.nav-dark .lang-menu {
        background: #f8f9fa !important;
        box-shadow: 0 4px 15px rgba(0,0,0,0.2) !important;
    }

    .lang-menu a {
        color: #064852 !important;
    }

    .nav-right {
        display: flex;
        gap: 15px;
        align-items: center;
    }

    .social-icon {
        width: 40px;
        height: 40px;
        border: 1px solid white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        text-decoration: none;
        transition: all 0.3s;
    }

    /* SVG icons will use currentColor from parent */
    .social-icon svg {
        transition: all 0.3s;
    }

    /* Hero mode icons - EXPLICIT STYLING */
    nav.nav-hero .social-icon {
        border-color: white;
    }

    nav.nav-hero .social-icon svg {
        stroke: white;
        fill: white;
    }

    /* Light mode icons */
    nav.nav-light .social-icon {
        border-color: #064852;
    }

    nav.nav-light .social-icon svg {
        stroke: #064852;
        fill: #064852;
    }

    /* Dark mode icons */
    nav.nav-dark .social-icon {
        border-color: white;
    }

    nav.nav-dark .social-icon svg {
        stroke: white;
        fill: white;
    }

    /* Hover states */
    .social-icon:hover {
        background: white;
        border-color: white;
    }

    nav.nav-hero .social-icon:hover {
        background: white;
    }

    nav.nav-hero .social-icon:hover svg {
        stroke: #064852;
        fill: #064852;
    }

    nav.nav-light .social-icon:hover {
        background: #064852;
        border-color: #064852;
    }

    nav.nav-light .social-icon:hover svg {
        stroke: white;
        fill: white;
    }

    nav.nav-dark .social-icon:hover {
        background: white;
        border-color: white;
    }

    nav.nav-dark .social-icon:hover svg {
        stroke: #064852;
        fill: #064852;
    }

    .book-now-btn {
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
    }

    .book-now-btn:hover {
        background: #a8c68f;
        color: white;
    }

    /* User Button Adaptations - Make it visible in all modes */
    nav.nav-hero .user-btn {
        background: rgba(255,255,255,0.1) !important;
        border: 2px solid white !important;
    }

    nav.nav-light .user-btn {
        background: rgba(6, 72, 82, 0.1) !important;
        border: 2px solid #064852 !important;
    }

    nav.nav-light .user-btn span {
        color: #064852 !important;
    }

    nav.nav-light .user-btn svg {
        fill: #064852 !important;
    }

    nav.nav-dark .user-btn {
        background: rgba(255,255,255,0.1) !important;
        border: 2px solid white !important;
    }

    nav.nav-dark .user-btn span {
        color: white !important;
    }

    nav.nav-dark .user-btn svg {
        fill: white !important;
    }

    nav .user-btn:hover {
        background: #a8c68f !important;
        border-color: #a8c68f !important;
    }

    nav .user-btn:hover span,
    nav .user-btn:hover svg {
        color: white !important;
        fill: white !important;
    }

    /* Social icons - ensure thin stroke */
    .social-icon svg {
        stroke-width: 0 !important;
        vector-effect: non-scaling-stroke;
    }

    /* Mobile Hamburger Menu */
    .hamburger {
        display: none;
        flex-direction: column;
        align-items: flex-end;
        justify-content: center;
        gap: 5px;
        cursor: pointer;
        padding: 0;
        z-index: 1002;
        position: relative;
    }

    .hamburger span {
        width: 25px;
        height: 3px;
        background: white;
        transition: all 0.3s;
        border-radius: 2px;
        display: block;
        margin: 0;
    }

    nav.nav-light .hamburger span {
        background: #064852;
    }

    nav.nav-dark .hamburger span {
        background: white;
    }

    .hamburger.active span:nth-child(1) {
        transform: rotate(45deg) translate(6px, 6px);
        transform-origin: right center;
    }

    .hamburger.active span:nth-child(2) {
        opacity: 0;
    }

    .hamburger.active span:nth-child(3) {
        transform: rotate(-45deg) translate(6px, -6px);
        transform-origin: right center;
    }

    /* Mobile Menu Backdrop */
    .mobile-backdrop {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100vh;
        background: rgba(0, 0, 0, 0.5);
        z-index: 999;
        opacity: 0;
        transition: opacity 0.3s ease;
        pointer-events: none;
    }

    .mobile-backdrop.active {
        opacity: 1;
        pointer-events: auto;
    }

    /* Mobile Auth Section - Hidden on desktop */
    .mobile-auth-section {
        display: none;
    }

    .mobile-menu-item {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 15px 0;
        width: 100%;
        color: white !important;
        text-decoration: none;
        border-bottom: 1px solid rgba(255,255,255,0.1);
        font-size: 14px;
        font-weight: 500;
        font-family: 'Work Sans', sans-serif;
        background: transparent;
        border-left: none;
        border-right: none;
        border-top: none;
        cursor: pointer;
        text-align: left;
    }

    .mobile-menu-item svg {
        flex-shrink: 0;
    }

    .mobile-logout {
        color: #ff6b6b !important;
    }

    .mobile-sign-in {
        display: block;
        padding: 14px 0;
        margin-top: 20px;
        text-align: center;
        background: rgba(255,255,255,0.1);
        border: 2px solid white;
        color: white !important;
        text-decoration: none;
        font-size: 13px;
        font-weight: 700;
        letter-spacing: 2px;
        border-radius: 50px;
        transition: all 0.3s;
        font-family: 'Work Sans', sans-serif;
    }

    .mobile-sign-in:hover {
        background: white;
        color: #064852 !important;
    }

    /* Responsive Styles */
    @media (max-width: 1024px) {
        nav {
            padding: 15px 30px;
        }

        .nav-center {
            gap: 20px;
        }

        .nav-center a {
            font-size: 11px;
        }

        .search-bar input {
            width: 220px;
        }

        .search-bar input:focus {
            width: 260px;
        }
    }

    @media (max-width: 968px) {
        nav {
            padding: 15px 20px;
        }

        .hamburger {
            display: flex;
            margin-left: auto;
            padding: 0;
        }

        .mobile-backdrop {
            display: block;
        }

        .nav-center {
            position: fixed;
            top: 0;
            right: -100%;
            height: 100vh;
            width: 300px;
            background: #064852;
            flex-direction: column;
            align-items: flex-start;
            padding: 100px 30px 30px;
            transition: right 0.3s ease;
            z-index: 1001;
            gap: 0;
            box-shadow: -5px 0 15px rgba(0,0,0,0.2);
        }

        .nav-center.active {
            right: 0;
        }

        .nav-center a {
            color: white !important;
            padding: 15px 0;
            width: 100%;
            font-size: 14px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .nav-center a::after {
            display: none;
        }

        .nav-center .separator {
            display: none;
        }

        .search-bar {
            width: 100%;
            margin-bottom: 20px;
            order: -1;
        }

        .search-bar input {
            width: 100%;
        }

        .search-bar input:focus {
            width: 100%;
        }

        #search-results {
            min-width: auto;
            width: 100%;
        }

        .mobile-auth-section {
            display: block;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 2px solid rgba(255,255,255,0.2);
        }

        .nav-right {
            gap: 10px;
        }

        .nav-right .language-switcher,
        .nav-right .user-dropdown,
        .nav-right .book-now-btn {
            display: none;
        }

        .social-icon {
            width: 35px;
            height: 35px;
        }

        .logo img {
            height: 40px !important;
        }

        nav.nav-light .logo img {
            height: 40px !important;
        }

        nav.nav-hero .logo img,
        nav.nav-visible .logo img {
            height: 40px !important;
        }
    }

    @media (max-width: 480px) {
        nav {
            padding: 12px 15px;
        }

        .nav-center {
            width: 250px;
            padding: 80px 20px 20px;
        }

        .nav-center a {
            font-size: 12px;
            padding: 12px 0;
        }

        .logo img {
            height: 35px !important;
        }

        nav.nav-light .logo img {
            height: 35px !important;
        }

        nav.nav-hero .logo img,
        nav.nav-visible .logo img {
            height: 35px !important;
        }

        .social-icon {
            width: 32px;
            height: 32px;
        }

        .social-icon svg {
            width: 16px;
            height: 16px;
        }

        .book-now-btn,
        .user-btn {
            padding: 8px 18px;
            font-size: 10px;
        }

        .user-btn span {
            display: none;
        }

        .lang-btn svg {
            width: 18px;
            height: 18px;
        }
    }
</style>

<script>
    // Auto-hide navbar on scroll down, show on scroll up + Dynamic color based on section
    let lastScrollTop = 0;
    const navbar = document.getElementById('navbar');
    let scrollThreshold = 100; // Start hiding after scrolling 100px
    let isScrolling;

    // Function to detect current section and change navbar color + logo
    function updateNavbarColor() {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        const windowHeight = window.innerHeight;
        const navbarLogo = document.getElementById('navbar-logo');
        
        // Get all sections
        const sections = document.querySelectorAll('section, .section2, .section3, .section4, .section5');
        
        // Check if we're at hero section (ONLY at top - transparent ONLY on hero)
        if (scrollTop < windowHeight * 0.5) {
            navbar.classList.remove('nav-light', 'nav-dark');
            navbar.classList.add('nav-hero');
            // Use Logo-06 (white) for transparent hero
            if (navbarLogo) navbarLogo.src = '/images/Logo-06.png';
            return;
        }
        
        // Check which section is currently at the top of viewport
        let currentSection = null;
        sections.forEach(section => {
            const rect = section.getBoundingClientRect();
            const sectionTop = rect.top + scrollTop;
            const sectionBottom = sectionTop + rect.height;
            const navbarPosition = scrollTop + 80; // navbar height consideration
            
            if (navbarPosition >= sectionTop && navbarPosition < sectionBottom) {
                currentSection = section;
            }
        });
        
        if (currentSection) {
            const bgColor = window.getComputedStyle(currentSection).backgroundColor;
            
            // Check if section has DARK/GREEN background (#064852 atau similar) atau memiliki class dark-section
            if (bgColor.includes('6, 72, 82') || // rgb(6, 72, 82) = #064852
                bgColor.includes('42, 95, 127') ||
                currentSection.classList.contains('dark-section') ||
                currentSection.classList.contains('values-section') ||
                currentSection.classList.contains('cta-section')) {
                // DARK SECTION - navbar hijau/dark SOLID (bukan transparan)
                navbar.classList.remove('nav-hero', 'nav-light');
                navbar.classList.add('nav-dark');
                // Use Logo-06 (white) for dark background
                if (navbarLogo) navbarLogo.src = '/images/Logo-06.png';
            }
            // Check if section has LIGHT background (#F7EFE2)
            else if (bgColor.includes('247, 239, 226') || // rgb(247, 239, 226) = #F7EFE2
                bgColor.includes('245, 242, 234') || // rgb(245, 242, 234)
                currentSection.classList.contains('section2') ||
                currentSection.classList.contains('section3') ||
                currentSection.classList.contains('section4') ||
                currentSection.classList.contains('section5') ||
                currentSection.classList.contains('light-section')) {
                // LIGHT SECTION - navbar cream SOLID
                navbar.classList.remove('nav-hero', 'nav-dark');
                navbar.classList.add('nav-light');
                // Use Logo-04 (dark) for light background
                if (navbarLogo) navbarLogo.src = '/images/Logo-04.png';
            } else {
                // Default - assume dark section
                navbar.classList.remove('nav-hero', 'nav-light');
                navbar.classList.add('nav-dark');
                // Use Logo-06 (white) for dark background
                if (navbarLogo) navbarLogo.src = '/images/Logo-06.png';
            }
        }
    }

    window.addEventListener('scroll', function() {
        // Clear timeout if it exists
        window.clearTimeout(isScrolling);

        // Set a timeout to run after scrolling ends
        isScrolling = setTimeout(function() {
            let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

            // Update navbar color based on section
            updateNavbarColor();

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
        }, 50); // Wait 50ms after scroll stops
    }, false);

    // Initialize navbar
    navbar.classList.add('nav-visible', 'nav-hero');
    
    // Update color on load
    setTimeout(updateNavbarColor, 100);
</script>


