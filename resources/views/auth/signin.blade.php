<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('images/Logo-02.png') }}?v=2">
    <title>Sign In - Sakanta</title>
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
            align-items: center;
            justify-content: center;
            background: #000000;
            position: relative;
            overflow-x: hidden;
        }

        /* Fullscreen Video Background */
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
            top: 0;
            left: 0;
            min-width: 100%;
            min-height: 100%;
            width: 100%;
            height: 100%;
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

        /* Main Container */
        .main-container {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 540px;
            padding: 20px;
        }

        /* Sign In Card */
        .signin-card {
            background: transparent;
            padding: 48px 40px;
            text-align: center;
            animation: fadeIn 0.8s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        /* Logo */
        .logo {
            margin-bottom: 32px;
        }

        .logo img {
            height: 56px;
            width: auto;
        }

        /* Title */
        .title {
            font-family: 'Esther', serif;
            font-size: 32px;
            font-weight: 400;
            color: #ffffff;
            margin: 0 0 40px 0;
            letter-spacing: 1px;
            line-height: 1.2;
        }

        /* Form */
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

        /* Submit Button */
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
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(255, 255, 255, 0.3);
        }

        .submit-btn:active {
            transform: translateY(0);
        }

        /* Helper Text */
        .helper-text {
            margin-top: 24px;
            font-size: 12px;
            color: rgba(255, 255, 255, 0.6);
            line-height: 1.6;
            display: flex;
            align-items: flex-start;
            gap: 8px;
        }

        .helper-icon {
            width: 14px;
            height: 14px;
            flex-shrink: 0;
            margin-top: 2px;
            color: rgba(255, 255, 255, 0.5);
        }

        /* Toggle Links */
        .toggle-link {
            margin-top: 28px;
            padding-top: 24px;
            border-top: 1px solid rgba(255, 255, 255, 0.15);
            font-size: 14px;
            color: rgba(255, 255, 255, 0.7);
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

        /* Alert Messages */
        .alert {
            padding: 12px 16px;
            border-radius: 12px;
            margin-bottom: 24px;
            font-size: 13px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .alert-error {
            background: rgba(220, 38, 38, 0.2);
            color: #fca5a5;
            border: 1px solid rgba(220, 38, 38, 0.3);
        }

        .alert-success {
            background: rgba(34, 197, 94, 0.2);
            color: #86efac;
            border: 1px solid rgba(34, 197, 94, 0.3);
        }

        .alert-icon {
            width: 16px;
            height: 16px;
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

        /* Responsive */
        @media (max-width: 480px) {
            .signin-card {
                padding: 40px 28px;
            }

            .title {
                font-size: 28px;
            }

            .logo img {
                height: 48px;
            }
        }
    </style>
</head>
<body>

    <!-- Fullscreen Video Background -->
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
        <div class="signin-card">
            
            <!-- Logo -->
            <div class="logo">
                <img src="{{ asset('images/logo-06.png') }}" alt="Sakanta Logo">
            </div>

            <!-- Title -->
            <h1 class="title">Discover Your Sanctuary</h1>

            <!-- Alert Messages -->
            @if(session('error'))
            <div class="alert alert-error">
                <svg class="alert-icon" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                </svg>
                {{ session('error') }}
            </div>
            @endif

            @if(session('success'))
            <div class="alert alert-success">
                <svg class="alert-icon" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                {{ session('success') }}
            </div>
            @endif

            <!-- Sign In Form -->
            <form id="signinForm">
                @csrf
                
                <div class="form-group">
                    <label for="access_code" class="form-label">Access Code</label>
                    <input 
                        type="text" 
                        id="access_code" 
                        name="access_code" 
                        class="form-input" 
                        placeholder="XXX-XXX-XXX"
                        value="{{ old('access_code') }}"
                        required
                        autofocus
                    >
                </div>

                <button type="button" id="googleSignInBtn" class="submit-btn">
                    <svg style="width: 20px; height: 20px; margin-right: 12px;" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                        <path fill="currentColor" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                        <path fill="currentColor" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                        <path fill="currentColor" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                    </svg>
                    Sign in with Google
                </button>
            </form>

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

                document.getElementById('googleSignInBtn').addEventListener('click', function() {
                    const accessCode = document.getElementById('access_code').value.trim();
                    
                    if (!accessCode) {
                        showNotification('Please enter your access code', 'error');
                        document.getElementById('access_code').focus();
                        return;
                    }
                    
                    // Store access code in session and redirect to Google OAuth
                    window.location.href = '{{ route("auth.google.redirect") }}?access_code=' + encodeURIComponent(accessCode);
                });
            </script>

            <!-- Helper Text -->
            <div class="helper-text">
                <svg class="helper-icon" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <span>Access codes are granted directly by Sakanta. If you haven't received one, you may <a href="{{ route('auth.signup') }}" style="color: #ffffff; text-decoration: underline;">request an invitation</a>.</span>
            </div>

        </div>
    </div>

</body>
</html>
