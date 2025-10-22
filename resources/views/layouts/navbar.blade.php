<!-- Navigation -->
<nav>
    <div class="logo">
        <a href="/" style="color: white; text-decoration: none;">SAKANTA</a>
    </div>
    <div class="nav-center">
        <a href="/">HOME</a>
        <a href="/listings">LISTINGS</a>
        <a href="/about">ABOUT</a>
        <span style="color: white;">|</span>
        <a href="#">ENGLISH</a>
        <span style="color: white;">|</span>
        <a href="#">BAHASA</a>
    </div>
    <div class="nav-right">
        <a href="#" class="social-icon">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="white">
                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
            </svg>
        </a>
        <a href="#" class="social-icon">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2">
                <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
            </svg>
        </a>
        <a href="#" class="social-icon">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2">
                <path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path>
            </svg>
        </a>
        <a href="#" class="book-now-btn">BOOK NOW →</a>
    </div>
</nav>

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
        background: rgba(0, 0, 0, 0.3);
    }

    .logo {
        font-size: 24px;
        font-weight: 300;
        letter-spacing: 8px;
        color: white;
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

    .nav-center a:hover::after {
        width: 100%;
    }

    .nav-right {
        display: flex;
        gap: 15px;
        align-items: center;
    }

    .social-icon {
        width: 35px;
        height: 35px;
        border: 1px solid white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        text-decoration: none;
        font-size: 14px;
        transition: all 0.3s;
    }

    .social-icon:hover {
        background: white;
    }

    .social-icon:hover svg {
        stroke: #2c3e50;
        fill: #2c3e50;
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
        font-weight: 600;
        transition: all 0.3s;
    }

    .book-now-btn:hover {
        background: #a8c68f;
        color: white;
    }
</style>
