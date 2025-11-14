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
            font-family: 'Work Sans', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #F7EFE2;
            position: relative;
            overflow: hidden;
        }

        /* Background Pattern */
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url('/images/hero.jpg');
            background-size: cover;
            background-position: center;
            opacity: 0.15;
            z-index: 0;
        }

        /* Decorative Elements */
        .deco-circle {
            position: absolute;
            border-radius: 50%;
            background: rgba(6, 72, 82, 0.08);
            z-index: 0;
        }

        .deco-circle-1 {
            width: 400px;
            height: 400px;
            top: -150px;
            right: -100px;
        }

        .deco-circle-2 {
            width: 300px;
            height: 300px;
            bottom: -100px;
            left: -80px;
            background: rgba(168, 198, 143, 0.1);
        }

        /* Container */
        .signin-container {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 450px;
            padding: 20px;
        }

        /* Card */
        .signin-card {
            background: white;
            border-radius: 24px;
            padding: 45px 40px 40px;
            box-shadow: 0 30px 80px rgba(6, 72, 82, 0.12);
            text-align: center;
            position: relative;
            backdrop-filter: blur(10px);
        }

        /* Logo */
        .logo {
            margin-bottom: 25px;
            animation: fadeInDown 0.6s ease;
        }

        .logo img {
            height: 70px;
            width: auto;
        }

        /* Title */
        .title {
            font-family: 'Esther', serif;
            font-size: 34px;
            font-weight: 400;
            color: #064852;
            margin: 0 0 10px 0;
            letter-spacing: 1px;
            animation: fadeInUp 0.6s ease 0.1s both;
        }

        .subtitle {
            font-size: 15px;
            color: #666;
            margin: 0 0 35px 0;
            line-height: 1.5;
            animation: fadeInUp 0.6s ease 0.2s both;
        }

        /* Google Button */
        .google-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 18px;
            background: white;
            border: 2px solid #F7EFE2;
            padding: 18px 35px;
            border-radius: 50px;
            text-decoration: none;
            font-size: 16px;
            font-weight: 600;
            color: #064852;
            transition: all 0.3s ease;
            width: 100%;
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            animation: fadeInUp 0.6s ease 0.3s both;
        }

        .google-btn:hover {
            border-color: #064852;
            box-shadow: 0 8px 25px rgba(6, 72, 82, 0.2);
            transform: translateY(-2px);
        }

        .google-icon {
            width: 24px;
            height: 24px;
        }

        /* Divider */
        .divider {
            margin: 30px 0;
            display: flex;
            align-items: center;
            gap: 18px;
            animation: fadeInUp 0.6s ease 0.4s both;
        }

        .divider-line {
            flex: 1;
            height: 1px;
            background: linear-gradient(to right, transparent, #e0e0e0, transparent);
        }

        .divider-text {
            color: #999;
            font-size: 12px;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Benefits */
        .benefits {
            text-align: left;
            margin-top: 25px;
            animation: fadeInUp 0.6s ease 0.5s both;
        }

        .benefits-title {
            font-size: 16px;
            font-weight: 600;
            color: #064852;
            margin: 0 0 15px 0;
            font-family: 'Esther', serif;
        }

        .benefits-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .benefit-item {
            padding: 10px 0;
            font-size: 14px;
            color: #666;
            display: flex;
            align-items: center;
            gap: 12px;
            line-height: 1.4;
        }

        .benefit-dot {
            width: 7px;
            height: 7px;
            background: #a8c68f;
            border-radius: 50%;
            flex-shrink: 0;
        }

        /* Back Link */
        .back-link-container {
            margin-top: 30px;
            padding-top: 25px;
            border-top: 1px solid #f0f0f0;
            animation: fadeInUp 0.6s ease 0.6s both;
        }

        .back-link {
            color: #064852;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .back-link:hover {
            opacity: 0.7;
            transform: translateX(-3px);
        }

        /* Animations */
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive */
        @media (max-width: 600px) {
            .signin-card {
                padding: 45px 30px;
                border-radius: 20px;
            }

            .title {
                font-size: 32px;
            }

            .logo img {
                height: 70px;
            }
        }
    </style>
</head>
<body>

    <!-- Decorative Elements -->
    <div class="deco-circle deco-circle-1"></div>
    <div class="deco-circle deco-circle-2"></div>

    <div class="signin-container">
        <div class="signin-card">
            
            <!-- Logo -->
            <div class="logo">
                <img src="/images/Logo-04.png" alt="Sakanta Logo">
            </div>

            <!-- Title -->
            <h1 class="title">Welcome to Sakanta</h1>
            <p class="subtitle">Sign in with your registered Google account to continue</p>

            <!-- Alert Messages -->
            @if(session('error'))
            <div style="background: #fee; color: #c33; padding: 15px; border-radius: 10px; margin-bottom: 20px; font-size: 14px; border: 1px solid #fcc;">
                {{ session('error') }}
            </div>
            @endif

            @if(session('info'))
            <div style="background: #e7f3ff; color: #0066cc; padding: 15px; border-radius: 10px; margin-bottom: 20px; font-size: 14px; border: 1px solid #b3d9ff;">
                {{ session('info') }}
            </div>
            @endif

            @if(session('success'))
            <div style="background: #e8f5e9; color: #2e7d32; padding: 15px; border-radius: 10px; margin-bottom: 20px; font-size: 14px; border: 1px solid #c8e6c9;">
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
            <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #f0f0f0; font-size: 13px; color: #999;">
                Only registered users can access Sakanta.<br>
                Contact admin if you need access.
            </div>

        </div>
    </div>

</body>
</html>


