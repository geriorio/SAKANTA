<style>
    .navbar-simple {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 1000;
        background: #f5f2ea;
        padding: 20px 80px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }

    .navbar-simple .logo {
        font-size: 20px;
        font-weight: 400;
        letter-spacing: 8px;
        color: #2c5f7f;
        text-decoration: none;
        text-transform: uppercase;
    }

    .navbar-simple .nav-center {
        display: flex;
        gap: 30px;
        align-items: center;
    }

    .navbar-simple .nav-center a {
        color: #2c5f7f;
        text-decoration: none;
        font-size: 12px;
        letter-spacing: 2px;
        text-transform: uppercase;
        position: relative;
        padding-bottom: 5px;
        transition: opacity 0.3s;
    }

    .navbar-simple .nav-center a::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 0;
        height: 2px;
        background: #2c5f7f;
        transition: width 0.3s ease;
    }

    .navbar-simple .nav-center a:hover::after {
        width: 100%;
    }

    .navbar-simple .nav-center .separator {
        color: #2c5f7f;
        opacity: 0.3;
    }

    .navbar-simple .nav-right {
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .navbar-simple .book-now-btn {
        padding: 12px 30px;
        background: #2c5f7f;
        color: white;
        border-radius: 25px;
        text-decoration: none;
        font-size: 12px;
        letter-spacing: 2px;
        text-transform: uppercase;
        font-weight: 600;
        transition: all 0.3s;
    }

    .navbar-simple .book-now-btn:hover {
        background: #1a3f5f;
        transform: translateY(-2px);
    }

    /* Body padding to account for fixed navbar */
    body {
        padding-top: 80px;
    }
</style>

<nav class="navbar-simple">
    <a href="/" class="logo">SAKANTA</a>
    
    <div class="nav-center">
        <a href="/">HOME</a>
        <a href="/listings">LISTINGS</a>
        <a href="/about">ABOUT</a>
        <span class="separator">|</span>
        <a href="#">ENGLISH</a>
        <span class="separator">|</span>
        <a href="#">BAHASA</a>
    </div>

    <div class="nav-right">
        <a href="#" class="book-now-btn">BOOK NOW →</a>
    </div>
</nav>
