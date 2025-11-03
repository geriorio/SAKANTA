<!-- Footer -->
<footer class="footer">
    <div class="footer-container">
        <div class="footer-content">
            <!-- Left Column -->
            <div class="footer-left">
                <h2 class="footer-logo">Live It All</h2>
                
                <div class="footer-subscribe">
                    <h3 class="subscribe-title">Subscribe</h3>
                    <p class="subscribe-subtitle">Join our newsletter for the latest updates.</p>
                    
                    <form class="subscribe-form" id="subscribeForm">
                        <input 
                            type="email" 
                            class="subscribe-input" 
                            placeholder="ENTER YOUR EMAIL" 
                            required
                            id="subscribeEmail"
                        >
                        <button type="submit" class="subscribe-btn">SUBSCRIBE</button>
                    </form>
                    
                    <label class="subscribe-terms">
                        <input type="checkbox" required>
                        <span>I have read and agree to the <a href="#">terms & conditions</a></span>
                    </label>
                </div>
            </div>
            
            <!-- Right Column - Navigation -->
            <div class="footer-nav">
                <div class="footer-nav-column">
                    <h4 class="footer-nav-title">About us</h4>
                    <h4 class="footer-nav-title">Blog</h4>
                    <h4 class="footer-nav-title">Careers</h4>
                    <h4 class="footer-nav-title">Contact us</h4>
                </div>
                <div class="footer-nav-column">
                    <h4 class="footer-nav-title">Destination</h4>
                    <h4 class="footer-nav-title">Homes</h4>
                    <h4 class="footer-nav-title">Sails</h4>
                </div>
                <div class="footer-nav-column">
                    <h4 class="footer-nav-title">How it works</h4>
                    <h4 class="footer-nav-title">Agents</h4>
                    <h4 class="footer-nav-title">FAQ</h4>
                </div>
            </div>
        </div>
        
        <!-- Social Icons & Copyright -->
        <div class="footer-bottom">
            <div class="footer-social">
                <a href="#" class="footer-social-icon" title="Facebook">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                    </svg>
                </a>
                <a href="#" class="footer-social-icon" title="Instagram">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                        <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                        <circle cx="17.5" cy="6.5" r="1.5"></circle>
                    </svg>
                </a>
                <a href="#" class="footer-social-icon" title="Email">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                        <polyline points="22,6 12,13 2,6"></polyline>
                    </svg>
                </a>
            </div>
            
            <p class="footer-copyright">© All right reserved - SAKANTA</p>
        </div>
    </div>
</footer>

<style>
    .footer {
        background: #F7EFE2;
        padding: 80px 60px 40px;
        font-family: 'Esther', serif;
    }

    .footer-container {
        max-width: 1400px;
        margin: 0 auto;
    }

    .footer-content {
        display: flex;
        gap: 100px;
        margin-bottom: 80px;
    }

    /* Left Column */
    .footer-left {
        flex: 0 0 auto;
        min-width: 300px;
    }

    .footer-logo {
        font-size: 36px;
        font-weight: 400;
        color: #064852;
        margin-bottom: 50px;
        letter-spacing: 2px;
        font-family: 'Esther', serif;
    }

    .footer-subscribe {
        display: flex;
        flex-direction: column;
    }

    .subscribe-title {
        font-size: 24px;
        font-weight: 400;
        color: #064852;
        margin-bottom: 15px;
        letter-spacing: 1px;
        font-family: 'Esther', serif;
    }

    .subscribe-subtitle {
        font-size: 14px;
        color: #5a8aaa;
        margin-bottom: 20px;
        font-family: 'Work Sans', sans-serif;
    }

    .subscribe-form {
        display: flex;
        gap: 0;
        margin-bottom: 20px;
    }

    .subscribe-input {
        flex: 1;
        padding: 12px 16px;
        border: 2px solid #064852;
        font-size: 12px;
        letter-spacing: 1px;
        text-transform: uppercase;
        color: #064852;
        font-family: 'Work Sans', sans-serif;
        background: white;
        outline: none;
    }

    .subscribe-input::placeholder {
        color: #a0a0a0;
    }

    .subscribe-input:focus {
        background: #f9f8f5;
    }

    .subscribe-btn {
        padding: 12px 24px;
        background: #064852;
        color: white;
        border: 2px solid #064852;
        font-size: 12px;
        letter-spacing: 1px;
        text-transform: uppercase;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
        font-family: 'Work Sans', sans-serif;
    }

    .subscribe-btn:hover {
        background: #1a3f5f;
        border-color: #1a3f5f;
    }

    .subscribe-terms {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        font-size: 13px;
        color: #064852;
        cursor: pointer;
        font-family: 'Work Sans', sans-serif;
    }

    .subscribe-terms input {
        width: 18px;
        height: 18px;
        margin-top: 2px;
        cursor: pointer;
    }

    .subscribe-terms a {
        color: #064852;
        text-decoration: underline;
    }

    /* Right Column - Navigation */
    .footer-nav {
        flex: 1;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 40px;
    }

    .footer-nav-column {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .footer-nav-title {
        font-size: 14px;
        color: #064852;
        font-weight: 400;
        letter-spacing: 0.5px;
        cursor: pointer;
        transition: text-decoration-color 0.3s ease;
        font-family: 'Work Sans', sans-serif;
        margin: 0;
        padding-bottom: 0;
        display: inline-block;
        text-decoration: underline;
        text-decoration-color: transparent;
        text-decoration-thickness: 2px;
        text-underline-offset: 6px;
    }

    .footer-nav-title:hover {
        color: #064852;
        text-decoration-color: #064852;
    }

    /* Bottom Section */
    .footer-bottom {
        border-top: 1px solid rgba(6, 72, 82, 0.2);
        padding-top: 30px;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 20px;
    }

    .footer-social {
        display: flex;
        gap: 20px;
        justify-content: center;
    }

    .footer-social-icon {
        width: 48px;
        height: 48px;
        border: 2px solid #064852;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #064852;
        text-decoration: none;
        transition: all 0.3s;
    }

    .footer-social-icon:hover {
        background: #064852;
        color: #F7EFE2;
        transform: scale(1.1);
    }

    .footer-copyright {
        font-size: 13px;
        color: #064852;
        letter-spacing: 0.5px;
        font-family: 'Work Sans', sans-serif;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .footer {
            padding: 60px 30px 30px;
        }

        .footer-content {
            flex-direction: column;
            gap: 50px;
        }

        .footer-nav {
            grid-template-columns: 1fr;
        }

        .footer-logo {
            font-size: 28px;
            margin-bottom: 40px;
        }
    }

    /* Toast Notification Styles */
    .notification-toast {
        position: fixed;
        bottom: 30px;
        right: 30px;
        background: white;
        border: 2px solid #064852;
        border-radius: 8px;
        padding: 20px 24px;
        box-shadow: 0 8px 24px rgba(6, 72, 82, 0.15);
        font-family: 'Work Sans', sans-serif;
        font-size: 14px;
        max-width: 320px;
        animation: slideIn 0.4s ease-out;
        z-index: 9999;
    }

    .notification-toast.success {
        border-left: 4px solid #4CAF50;
        background: linear-gradient(to right, rgba(76, 175, 80, 0.05), white);
    }

    .notification-toast.error {
        border-left: 4px solid #f44336;
        background: linear-gradient(to right, rgba(244, 67, 54, 0.05), white);
    }

    .notification-toast.warning {
        border-left: 4px solid #ff9800;
        background: linear-gradient(to right, rgba(255, 152, 0, 0.05), white);
    }

    .notification-content {
        display: flex;
        align-items: flex-start;
        gap: 12px;
    }

    .notification-icon {
        width: 24px;
        height: 24px;
        min-width: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        font-size: 16px;
    }

    .notification-toast.success .notification-icon {
        color: #4CAF50;
    }

    .notification-toast.error .notification-icon {
        color: #f44336;
    }

    .notification-toast.warning .notification-icon {
        color: #ff9800;
    }

    .notification-text {
        display: flex;
        flex-direction: column;
        gap: 4px;
        color: #064852;
    }

    .notification-title {
        font-weight: 600;
        font-size: 15px;
    }

    .notification-message {
        font-size: 13px;
        color: #5a8aaa;
    }

    .notification-close {
        position: absolute;
        top: 12px;
        right: 12px;
        background: none;
        border: none;
        color: #064852;
        font-size: 20px;
        cursor: pointer;
        padding: 0;
        width: 24px;
        height: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s;
    }

    .notification-close:hover {
        color: #f44336;
        transform: rotate(90deg);
    }

    @keyframes slideIn {
        from {
            transform: translateX(400px);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }

    @keyframes slideOut {
        from {
            transform: translateX(0);
            opacity: 1;
        }
        to {
            transform: translateX(400px);
            opacity: 0;
        }
    }

    .notification-toast.closing {
        animation: slideOut 0.4s ease-in forwards;
    }

    @media (max-width: 768px) {
        .notification-toast {
            bottom: 20px;
            right: 20px;
            left: 20px;
            max-width: none;
        }
    }

</style>

<script>
    // Show Toast Notification
    function showNotification(message, title = '', type = 'success', duration = 4000) {
        const container = document.body;
        
        const toast = document.createElement('div');
        toast.className = `notification-toast ${type}`;
        
        const icons = {
            success: '✓',
            error: '✕',
            warning: '⚠'
        };
        
        toast.innerHTML = `
            <button class="notification-close" onclick="this.parentElement.classList.add('closing'); setTimeout(() => this.parentElement.remove(), 400);">×</button>
            <div class="notification-content">
                <div class="notification-icon">${icons[type]}</div>
                <div class="notification-text">
                    ${title ? `<div class="notification-title">${title}</div>` : ''}
                    <div class="notification-message">${message}</div>
                </div>
            </div>
        `;
        
        container.appendChild(toast);
        
        // Auto remove after duration
        setTimeout(() => {
            toast.classList.add('closing');
            setTimeout(() => {
                if (toast.parentElement) {
                    toast.remove();
                }
            }, 400);
        }, duration);
    }

    // Handle Subscribe Form
    document.getElementById('subscribeForm')?.addEventListener('submit', function(e) {
        e.preventDefault();
        const email = document.getElementById('subscribeEmail').value;
        const checkbox = document.querySelector('.subscribe-terms input[type="checkbox"]');
        const submitBtn = document.querySelector('.subscribe-btn');
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
        
        console.log('Subscribe form submitted', {
            email: email,
            csrf: csrfToken ? 'present' : 'MISSING',
            checkbox: checkbox.checked
        });

        if (!checkbox.checked) {
            showNotification('Please agree to the terms & conditions', 'Oops!', 'warning');
            return;
        }

        if (!csrfToken) {
            showNotification('Please refresh the page and try again.', 'Security Error', 'error');
            console.error('CSRF token is missing!');
            return;
        }

        // Disable button and show loading state
        submitBtn.disabled = true;
        const originalText = submitBtn.textContent;
        submitBtn.textContent = 'SUBSCRIBING...';
        
        // Send to backend
        fetch('/newsletter/subscribe', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
            },
            body: JSON.stringify({ email: email })
        })
        .then(response => {
            console.log('Response received', {
                status: response.status,
                statusText: response.statusText
            });
            return response.json().then(data => ({
                status: response.status,
                data: data
            }));
        })
        .then(({status, data}) => {
            console.log('Response data:', data);
            
            if (status === 201 && data.success) {
                // Success
                showNotification(
                    data.message || 'We will send you the latest updates and exclusive offers.',
                    'Thank you for subscribing!',
                    'success',
                    5000
                );
                document.getElementById('subscribeForm').reset();
            } else if (status === 422) {
                // Validation error - email already registered or invalid format
                const errorType = data.message && data.message.toLowerCase().includes('already') ? 'warning' : 'warning';
                showNotification(
                    data.message || 'Please check your email format.',
                    data.title || 'Invalid Email',
                    errorType,
                    4000
                );
            } else {
                // Other errors
                showNotification(
                    data.message || 'Something went wrong. Please try again.',
                    data.title || 'Subscription Failed',
                    'error',
                    4000
                );
            }
        })
        .catch(error => {
            console.error('Fetch error:', error);
            showNotification(
                'Please check your connection and try again.',
                'Connection Error',
                'error',
                4000
            );
        })
        .finally(() => {
            submitBtn.disabled = false;
            submitBtn.textContent = originalText;
        });
    });
</script>


