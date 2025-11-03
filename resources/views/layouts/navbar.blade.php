<!-- Navigation -->
<nav id="navbar" class="nav-hero">
    <div class="logo">
        <a href="/" style="display: flex; align-items: center; text-decoration: none;">
            <img id="navbar-logo" src="/images/Logo-06.png" alt="Sakanta Logo">
        </a>
    </div>
    <div class="nav-center">
        <a href="/">HOME</a>
        <a href="/listings">LISTINGS</a>
        <a href="/about">ABOUT</a>
        <a href="/faq">FAQs</a>
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

    .logo img {
        height: 48px !important;
        width: auto !important;
        filter: drop-shadow(0 2px 8px rgba(0, 0, 0, 0.3));
        transition: all 0.3s ease;
    }

    /* Logo size adjustment for light mode - MUCH BIGGER for better visibility */
    nav.nav-light .logo img {
        height: 56px !important;
        filter: drop-shadow(0 2px 4px rgba(6, 72, 82, 0.3));
    }

    nav.nav-dark .logo img {
        height: 48px !important;
        filter: drop-shadow(0 2px 8px rgba(0, 0, 0, 0.3));
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


