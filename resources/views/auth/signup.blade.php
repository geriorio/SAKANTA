<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('images/Logo-02.png') }}?v=2">
    <title>Join Sakanta Circle</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        @font-face {
            font-family: 'Esther';
            src: url('/fonts/Esther-Regular.otf') format('opentype');
            font-weight: normal;
            font-style: normal;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Work Sans', sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background: #000000;
            position: relative;
            overflow-x: hidden;
        }

        .video-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
        }

        .video-background video {
            position: absolute;
            top: 50%;
            left: 50%;
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            transform: translate(-50%, -50%) scale(0.9);
            object-fit: cover;
            transition: opacity 1.5s ease-in-out;
        }

        .video-background video.video-fade-out {
            opacity: 0;
        }

        .video-background video.video-fade-in {
            opacity: 1;
        }

        .video-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            z-index: 1;
        }

        .main-container {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 600px;
            padding: 40px 20px;
            margin: auto;
        }

        .signup-card {
            background: transparent;
            padding: 48px 40px;
            text-align: center;
            animation: slideUp 0.8s ease;
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(40px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .logo {
            margin-bottom: 32px;
        }

        .logo img {
            height: 56px;
            width: auto;
        }

        .title {
            font-family: 'Esther', serif;
            font-size: 36px;
            font-weight: 400;
            color: #ffffff;
            margin: 0 0 16px 0;
            letter-spacing: 1px;
            line-height: 1.2;
        }

        .subtitle {
            font-size: 15px;
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 40px;
            line-height: 1.6;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-label {
            display: block;
            color: rgba(255, 255, 255, 0.9);
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 8px;
        }

        .form-input {
            width: 100%;
            padding: 14px 18px;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            color: #ffffff;
            font-size: 15px;
            font-family: 'Work Sans', sans-serif;
            transition: all 0.3s ease;
        }

        .form-input::placeholder {
            color: rgba(255, 255, 255, 0.4);
        }

        .form-input:focus {
            outline: none;
            background: rgba(255, 255, 255, 0.15);
            border-color: rgba(255, 255, 255, 0.4);
        }

        .country-phone-group {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }

        .referral-section {
            background: rgba(255, 255, 255, 0.05);
            padding: 20px;
            border-radius: 12px;
            margin-bottom: 20px;
        }

        .radio-group {
            display: flex;
            gap: 24px;
            margin-bottom: 16px;
        }

        .radio-label {
            display: flex;
            align-items: center;
            color: rgba(255, 255, 255, 0.9);
            font-size: 14px;
            cursor: pointer;
        }

        .radio-label input[type="radio"] {
            margin-right: 8px;
            width: 18px;
            height: 18px;
            cursor: pointer;
        }

        .referral-input {
            display: none;
        }

        .referral-input.show {
            display: block;
        }

        .submit-btn {
            width: 100%;
            padding: 16px 32px;
            background: linear-gradient(135deg, #ffffff 0%, #f0f0f0 100%);
            border: none;
            border-radius: 12px;
            color: #064852;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 8px;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(255, 255, 255, 0.3);
        }

        .submit-btn:active {
            transform: translateY(0);
        }

        .toggle-link {
            margin-top: 28px;
            padding-top: 24px;
            border-top: 1px solid rgba(255, 255, 255, 0.15);
            font-size: 14px;
            color: rgba(255, 255, 255, 0.7);
            text-align: center;
        }

        .toggle-link a {
            color: #ffffff;
            text-decoration: none;
            font-weight: 600;
            transition: opacity 0.3s;
        }

        .toggle-link a:hover {
            opacity: 0.8;
        }

        .footer {
            position: relative;
            z-index: 2;
            text-align: center;
            padding: 40px 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            margin-top: auto;
        }

        .footer-title {
            color: rgba(255, 255, 255, 0.7);
            font-size: 13px;
            margin-bottom: 16px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .social-icons {
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .social-icon {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
        }

        .social-icon:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-3px);
        }

        /* Success Modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            align-items: center;
            justify-content: center;
        }

        .modal.show {
            display: flex;
        }

        .modal-content {
            background: #F5F1E8;
            padding: 48px 40px;
            border-radius: 20px;
            text-align: center;
            max-width: 520px;
            margin: 20px;
            animation: modalSlideUp 0.4s ease;
        }

        @keyframes modalSlideUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .modal-logo {
            margin-bottom: 32px;
        }

        .modal-logo img {
            height: 120px;
        }

        .modal-message {
            color: #064852;
            font-size: 16px;
            line-height: 1.8;
            margin-bottom: 32px;
        }

        .modal-close-btn {
            padding: 12px 32px;
            background: linear-gradient(135deg, #064852 0%, #0a5f6d 100%);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .modal-close-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(6, 72, 82, 0.4);
        }

        /* Custom Notification */
        .custom-notification {
            position: fixed;
            top: 20px;
            right: 20px;
            background: rgba(220, 38, 38, 0.95);
            color: white;
            padding: 16px 20px;
            border-radius: 12px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
            z-index: 9999;
            display: flex;
            align-items: center;
            gap: 12px;
            animation: slideInRight 0.3s ease;
            min-width: 300px;
        }

        .custom-notification.success {
            background: rgba(34, 197, 94, 0.95);
        }

        @keyframes slideInRight {
            from {
                transform: translateX(400px);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @media (max-width: 480px) {
            .signup-card {
                padding: 40px 28px;
            }

            .title {
                font-size: 30px;
            }

            .logo img {
                height: 48px;
            }

            .country-phone-group {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

    <div class="video-background">
        <video id="bgVideo1" class="video-fade-in" autoplay muted playsinline preload="auto">
            <source src="{{ asset('videos/login1.mp4') }}" type="video/mp4">
        </video>
        <video id="bgVideo2" class="video-fade-out" muted playsinline preload="auto" style="opacity: 0;">
            <source src="{{ asset('videos/login2.mp4') }}" type="video/mp4">
        </video>
        <div class="video-overlay"></div>
    </div>

    <script>
        const video1 = document.getElementById('bgVideo1');
        const video2 = document.getElementById('bgVideo2');
        let isVideo1Active = true;

        // Preload and prepare both videos
        video1.load();
        video2.load();

        // Smooth crossfade between videos
        function crossfadeVideos() {
            if (isVideo1Active) {
                // Switch to video 2
                video2.currentTime = 0;
                video2.play().then(() => {
                    video2.style.opacity = '1';
                    video1.style.opacity = '0';
                }).catch(e => console.error('Play error:', e));
                
                setTimeout(() => {
                    video1.pause();
                    video1.currentTime = 0;
                }, 1500);
                
                isVideo1Active = false;
            } else {
                // Switch to video 1
                video1.currentTime = 0;
                video1.play().then(() => {
                    video1.style.opacity = '1';
                    video2.style.opacity = '0';
                }).catch(e => console.error('Play error:', e));
                
                setTimeout(() => {
                    video2.pause();
                    video2.currentTime = 0;
                }, 1500);
                
                isVideo1Active = true;
            }
        }

        video1.addEventListener('ended', crossfadeVideos);
        video2.addEventListener('ended', crossfadeVideos);
    </script>

    <div class="main-container">
        <div class="signup-card">
            
            <div class="logo">
                <img src="{{ asset('images/Logo-06.png') }}" alt="Sakanta Logo">
            </div>

            <h1 class="title">Join Sakanta Circle</h1>
            <p class="subtitle">Join Sakanta's private circle and unlock access to exclusive homes & yachts</p>

            <form id="membershipForm" action="{{ route('membership.request.submit') }}" method="POST">
                @csrf
                
                <div class="form-group">
                    <label for="full_name" class="form-label">Full Name</label>
                    <input 
                        type="text" 
                        id="full_name" 
                        name="full_name" 
                        class="form-input" 
                        placeholder="Your full name"
                        required
                        autofocus
                    >
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        class="form-input" 
                        placeholder="your@email.com"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="country" class="form-label">Country of Residence</label>
                    <input 
                        type="text" 
                        id="country" 
                        name="country" 
                        class="form-input" 
                        placeholder="Country"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input 
                        type="tel" 
                        id="phone" 
                        name="phone" 
                        class="form-input" 
                        placeholder="Phone number"
                        required
                    >
                </div>

                <div class="referral-section">
                    <label class="form-label">Referral</label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="has_referral" value="0" checked onchange="toggleReferralInput()">
                            No
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="has_referral" value="1" onchange="toggleReferralInput()">
                            Yes
                        </label>
                    </div>
                    <div id="referralInput" class="referral-input">
                        <input 
                            type="text" 
                            id="referral_name" 
                            name="referral_name" 
                            class="form-input" 
                            placeholder="Referral name"
                        >
                    </div>
                </div>

                <button type="submit" class="submit-btn">Submit Request</button>
            </form>

            <div class="toggle-link">
                Already have an account? <a href="{{ route('auth.signin') }}">Sign in here</a>
            </div>

        </div>
    </div>

    <footer class="footer">
        <div class="footer-title">Contact & Social Media</div>
        <div class="social-icons">
            <a href="#" class="social-icon" title="Instagram">
                <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                </svg>
            </a>
            <a href="#" class="social-icon" title="WhatsApp">
                <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                </svg>
            </a>
            <a href="#" class="social-icon" title="Email">
                <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                </svg>
            </a>
        </div>
    </footer>

    <!-- Success Modal -->
    <div id="successModal" class="modal">
        <div class="modal-content">
            <div class="modal-logo">
                <img src="{{ asset('images/Logo-01.png') }}" alt="Sakanta">
            </div>
            <div class="modal-message">
                We appreciate your interest.<br>
                Our membership liaison will follow up with a personal invitation.
            </div>
            <button class="modal-close-btn" onclick="closeModal()">Close</button>
        </div>
    </div>

    <script>
        function showNotification(message, type = 'error') {
            // Remove existing notification if any
            const existing = document.querySelector('.custom-notification');
            if (existing) existing.remove();

            // Create notification
            const notification = document.createElement('div');
            notification.className = `custom-notification ${type}`;
            notification.innerHTML = `
                <svg style="width: 20px; height: 20px; flex-shrink: 0;" fill="currentColor" viewBox="0 0 20 20">
                    ${type === 'error' ? 
                        '<path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>' :
                        '<path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>'
                    }
                </svg>
                <span>${message}</span>
            `;
            document.body.appendChild(notification);

            // Auto remove after 4 seconds
            setTimeout(() => {
                notification.style.animation = 'slideInRight 0.3s ease reverse';
                setTimeout(() => notification.remove(), 300);
            }, 4000);
        }

        function toggleReferralInput() {
            const hasReferral = document.querySelector('input[name="has_referral"]:checked').value;
            const referralInput = document.getElementById('referralInput');
            const referralNameField = document.getElementById('referral_name');
            
            if (hasReferral === '1') {
                referralInput.classList.add('show');
                referralNameField.required = true;
            } else {
                referralInput.classList.remove('show');
                referralNameField.required = false;
                referralNameField.value = '';
            }
        }

        document.getElementById('membershipForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Validate all required fields
            const fullName = document.getElementById('full_name').value.trim();
            const email = document.getElementById('email').value.trim();
            const country = document.getElementById('country').value.trim();
            const phone = document.getElementById('phone').value.trim();
            const hasReferral = document.querySelector('input[name="has_referral"]:checked').value;
            const referralName = document.getElementById('referral_name').value.trim();

            if (!fullName) {
                showNotification('Please enter your full name', 'error');
                document.getElementById('full_name').focus();
                return;
            }

            if (!email) {
                showNotification('Please enter your email address', 'error');
                document.getElementById('email').focus();
                return;
            }

            // Basic email validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                showNotification('Please enter a valid email address', 'error');
                document.getElementById('email').focus();
                return;
            }

            if (!country) {
                showNotification('Please enter your country', 'error');
                document.getElementById('country').focus();
                return;
            }

            if (!phone) {
                showNotification('Please enter your phone number', 'error');
                document.getElementById('phone').focus();
                return;
            }

            if (hasReferral === '1' && !referralName) {
                showNotification('Please enter the referral name', 'error');
                document.getElementById('referral_name').focus();
                return;
            }
            
            const formData = new FormData(this);
            
            fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('successModal').classList.add('show');
                    this.reset();
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showNotification('Something went wrong. Please try again.', 'error');
            });
        });

        function closeModal() {
            document.getElementById('successModal').classList.remove('show');
        }
    </script>

</body>
</html>
