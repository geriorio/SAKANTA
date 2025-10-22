<!-- Footer -->
<footer class="footer">
    <div class="footer-container">
        <div class="footer-pattern">
            <svg width="80" height="40" viewBox="0 0 80 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                <!-- Diamond pattern -->
                <path d="M 10 20 L 20 10 L 30 20 L 20 30 Z" stroke="#2c5f7f" stroke-width="1.5" fill="none"/>
                <path d="M 30 20 L 40 10 L 50 20 L 40 30 Z" stroke="#2c5f7f" stroke-width="1.5" fill="none"/>
            </svg>
        </div>
        
        <h2 class="footer-title">Live It All</h2>
        
        <div class="footer-social">
            <a href="#" class="footer-social-icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                </svg>
            </a>
            <a href="#" class="footer-social-icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                    <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                </svg>
            </a>
            <a href="#" class="footer-social-icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="4"></circle>
                    <path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path>
                </svg>
            </a>
        </div>
        
        <p class="footer-copyright">© All right reserved - SAKANTA</p>
    </div>
</footer>

<style>
    .footer {
        background: #e8e3d8;
        padding: 80px 40px 40px;
        text-align: center;
    }

    .footer-container {
        max-width: 800px;
        margin: 0 auto;
    }

    .footer-pattern {
        margin-bottom: 30px;
        display: flex;
        justify-content: center;
    }

    .footer-title {
        font-size: 48px;
        font-weight: 400;
        color: #2c5f7f;
        margin-bottom: 40px;
        letter-spacing: 2px;
    }

    .footer-social {
        display: flex;
        gap: 20px;
        justify-content: center;
        margin-bottom: 30px;
    }

    .footer-social-icon {
        width: 45px;
        height: 45px;
        border: 2px solid #2c5f7f;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #2c5f7f;
        text-decoration: none;
        transition: all 0.3s;
    }

    .footer-social-icon:hover {
        background: #2c5f7f;
        color: #e8e3d8;
    }

    .footer-copyright {
        font-size: 14px;
        color: #2c5f7f;
        letter-spacing: 1px;
    }
</style>
