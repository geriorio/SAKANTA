<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            font-family: 'Work Sans', -apple-system, BlinkMacSystemFont, sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #000000;
            position: relative;
            overflow: hidden;
        }

        /* Fullscreen Video Background */
        .video-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
            overflow: hidden;
        }

        .video-background video {
            position: absolute;
            top: 50%;
            left: 50%;
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            transform: translate(-50%, -50%);
            object-fit: cover;
        }

        /* Video Overlay */
        .video-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.3);
            z-index: 1;
        }

        /* Main Container */
        .main-container {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 480px;
            padding: 20px;
        }


        @keyframes gradientShift {
            0%, 100% { transform: translate(0, 0) rotate(0deg); }
            50% { transform: translate(5%, 5%) rotate(180deg); }
        }

        /* Sign In Card */
        .signin-card {
            background: transparent;
            backdrop-filter: blur(10px);
            border-radius: 28px;
            padding: 48px 40px;
            text-align: center;
            position: relative;
            animation: slideUp 0.8s cubic-bezier(0.16, 1, 0.3, 1);
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(40px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* Logo */
        .logo {
            margin-bottom: 24px;
            animation: fadeInScale 0.6s ease 0.2s both;
        }

        .logo-wrapper {
            display: inline-block;
        }

        .logo img {
            height: 48px;
            width: auto;
            display: block;
        }

        /* Title */
        .title {
            font-family: 'Esther', serif;
            font-size: 28px;
            font-weight: 400;
            color: #ffffff;
            margin: 0 0 10px 0;
            letter-spacing: 0.5px;
            line-height: 1.2;
            animation: fadeInScale 0.6s ease 0.3s both;
        }

        .subtitle {
            font-size: 14px;
            color: rgba(255, 255, 255, 0.8);
            margin: 0 0 32px 0;
            line-height: 1.5;
            font-weight: 400;
            animation: fadeInScale 0.6s ease 0.4s both;
        }

        /* Alert Messages */
        .alert {
            padding: 12px 16px;
            border-radius: 12px;
            margin-bottom: 20px;
            font-size: 13px;
            font-weight: 500;
            line-height: 1.4;
            display: flex;
            align-items: center;
            gap: 10px;
            animation: slideIn 0.4s ease;
        }

        .alert-error {
            background: linear-gradient(135deg, #fef2f2 0%, #fee2e2 100%);
            color: #dc2626;
            border: 1px solid #fecaca;
        }

        .alert-info {
            background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%);
            color: #2563eb;
            border: 1px solid #bfdbfe;
        }

        .alert-success {
            background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
            color: #16a34a;
            border: 1px solid #bbf7d0;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Google Button */
        .google-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
            border: 2px solid #e2e8f0;
            padding: 15px 28px;
            border-radius: 14px;
            text-decoration: none;
            font-size: 15px;
            font-weight: 600;
            color: #1e293b;
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            width: 100%;
            cursor: pointer;
            box-shadow: 
                0 4px 20px rgba(0, 0, 0, 0.06),
                inset 0 1px 0 rgba(255, 255, 255, 0.8);
            position: relative;
            overflow: hidden;
            animation: fadeInScale 0.6s ease 0.5s both;
        }

        .google-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
            transition: left 0.6s;
        }

        .google-btn:hover::before {
            left: 100%;
        }

        .google-btn:hover {
            border-color: #064852;
            box-shadow: 
                0 12px 40px rgba(6, 72, 82, 0.15),
                inset 0 1px 0 rgba(255, 255, 255, 0.8);
            transform: translateY(-2px);
        }

        .google-btn:active {
            transform: translateY(0);
            box-shadow: 
                0 4px 20px rgba(6, 72, 82, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.8);
        }

        .google-icon {
            width: 22px;
            height: 22px;
            z-index: 1;
        }

        .google-btn span {
            z-index: 1;
        }

        /* Divider */
        .divider {
            margin: 24px 0;
            display: flex;
            align-items: center;
            gap: 16px;
            animation: fadeInScale 0.6s ease 0.6s both;
        }

        .divider-line {
            flex: 1;
            height: 1px;
            background: linear-gradient(to right, transparent, rgba(255, 255, 255, 0.3), transparent);
        }

        .divider-text {
            color: rgba(255, 255, 255, 0.6);
            font-size: 13px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1.5px;
        }

        /* Footer Note */
        .footer-note {
            margin-top: 24px;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            font-size: 13px;
            color: rgba(255, 255, 255, 0.7);
            line-height: 1.5;
            animation: fadeInScale 0.6s ease 0.7s both;
        }

        .footer-note strong {
            color: #ffffff;
            font-weight: 600;
        }

        /* Security Badge */
        .security-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-top: 20px;
            padding: 8px 16px;
            background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
            border-radius: 50px;
            font-size: 12px;
            color: #16a34a;
            font-weight: 500;
            animation: fadeInScale 0.6s ease 0.8s both;
        }

        .security-icon {
            width: 16px;
            height: 16px;
        }

        /* Animations */
        @keyframes fadeInScale {
            from {
                opacity: 0;
                transform: scale(0.95);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .main-container {
                max-width: 90%;
            }

            .signin-card {
                padding: 40px 32px;
            }

            .title {
                font-size: 26px;
            }

            .google-btn {
                padding: 14px 24px;
                font-size: 14px;
            }
        }

        @media (max-width: 480px) {
            .signin-card {
                padding: 36px 28px;
                border-radius: 24px;
            }

            .logo img {
                height: 42px;
            }

            .title {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>

    <!-- Fullscreen Video Background -->
    <div class="video-background">
        <video autoplay muted loop playsinline preload="auto">
            <source src="{{ asset('videos/login2.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <div class="video-overlay"></div>
    </div>

    <div class="main-container">
        <div class="signin-card">
    <div class="main-container">
        <div class="signin-card">
            
            <!-- Logo -->
            <div class="logo">
                <div class="logo-wrapper">
                    <img src="/images/Logo-04.png" alt="Sakanta Logo">
                </div>
            </div>

            <!-- Title -->
            <h1 class="title">Welcome to Sakanta</h1>
            <p class="subtitle">Sign in with your registered Google account to continue</p>

            <!-- Alert Messages -->
            @if(session('error'))
            <div class="alert alert-error">
                <svg class="security-icon" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                </svg>
                {{ session('error') }}
            </div>
            @endif

            @if(session('info'))
            <div class="alert alert-info">
                <svg class="security-icon" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                </svg>
                {{ session('info') }}
            </div>
            @endif

            @if(session('success'))
            <div class="alert alert-success">
                <svg class="security-icon" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                {{ session('success') }}
            </div>
            @endif

            <!-- Google Sign In Button -->
            <a href="{{ route('auth.google') }}" class="google-btn">
                <svg class="google-icon" viewBox="0 0 24 24" fill="none">
                    <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                    <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                    <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
                    <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                </svg>
                <span>Continue with Google</span>
            </a>

            <!-- Divider -->
            <div class="divider">
                <div class="divider-line"></div>
                <span class="divider-text">Or</span>
                <div class="divider-line"></div>
            </div>

            <!-- Footer Note -->
            <div class="footer-note">
                <strong>Access is restricted to registered users only.</strong><br>
                Please contact the administrator if you need access.
            </div>

            <!-- Security Badge -->
            <div class="security-badge">
                <svg class="security-icon" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <span>Secure Authentication</span>
            </div>

                </div>
            </div>

        </div>

    </div>

</body>
</html>


