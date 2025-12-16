<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/Logo-02.png') }}?v={{ time() }}">
    <title>Access Choice - Sakanta</title>
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

        * { margin: 0; padding: 0; box-sizing: border-box; }
        
        body {
            font-family: 'Work Sans', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #000000;
            position: relative;
            overflow-x: hidden;
            padding: 2rem 1rem;
        }

        /* Video Background */
        .video-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
        }

        .video-background video {
            width: 100%;
            height: 100%;
            object-fit: cover;
            position: absolute;
            top: 0;
            left: 0;
            transition: opacity 1.5s ease-in-out;
        }

        .video-background::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            z-index: 1;
        }

        .container {
            max-width: 650px;
            width: 100%;
            position: relative;
            z-index: 2;
            background: #f9f7f4;
            border-radius: 20px;
            padding: 3rem 2.5rem;
            box-shadow: 0 8px 32px rgba(0,0,0,0.3);
        }

        .logo {
            text-align: center;
            margin-bottom: 2rem;
        }

        .logo img {
            height: 80px;
            filter: drop-shadow(0 4px 10px rgba(0,0,0,0.3));
        }

        .header {
            text-align: center;
            color: #064852;
            margin-bottom: 2rem;
        }

        .header h1 {
            font-family: 'Esther', serif;
            font-size: 2.2rem;
            margin-bottom: 1rem;
        }

        .header p {
            font-size: 1rem;
            font-weight: 400;
            color: #064852;
        }

        .email-display {
            background: rgba(6, 72, 82, 0.1);
            padding: 1rem 1.5rem;
            border-radius: 10px;
            border: 1px solid rgba(6, 72, 82, 0.2);
            color: #064852;
            text-align: center;
            margin-bottom: 2rem;
        }

        .email-display p {
            font-size: 0.85rem;
            margin-bottom: 0.3rem;
            opacity: 0.8;
        }

        .email-display strong {
            font-size: 1.1rem;
            font-weight: 600;
        }

        .choices {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
        }

        .choice-card {
            background: white;
            border: 2px solid #064852;
            border-radius: 15px;
            padding: 2rem 1.5rem;
            text-align: center;
            transition: all 0.3s ease;
            cursor: pointer;
            text-decoration: none;
            color: #064852;
            display: block;
            position: relative;
            z-index: 1;
        }

        .choice-card:hover {
            transform: translateY(-5px);
            background: #064852;
            color: white;
            box-shadow: 0 8px 20px rgba(6, 72, 82, 0.3);
            z-index: 2;
        }

        .choice-icon {
            margin-bottom: 1rem;
        }

        .choice-icon img {
            width: 60px;
            height: 60px;
            object-fit: contain;
            transition: filter 0.3s ease;
        }

        .choice-card:hover .choice-icon img {
            filter: brightness(0) invert(1);
        }

        .choice-card h2 {
            font-family: 'Work Sans', sans-serif;
            font-size: 1.3rem;
            margin-bottom: 0.8rem;
            font-weight: 600;
        }

        .choice-card p {
            line-height: 1.5;
            font-weight: 400;
            font-size: 0.9rem;
            display: none;
        }

        .choice-card:hover p {
            color: rgba(255,255,255,0.9);
        }

        @media (max-width: 768px) {
            .header h1 {
                font-size: 2rem;
            }
            .choices {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Video Background -->
    <div class="video-background">
        <video id="video1" autoplay muted playsinline style="opacity: 1;">
            <source src="{{ asset('videos/login1.mp4') }}" type="video/mp4">
        </video>
        <video id="video2" muted playsinline style="opacity: 0;">
            <source src="{{ asset('videos/login2.mp4') }}" type="video/mp4">
        </video>
    </div>

    <div class="container">
        <div class="logo">
            <img src="{{ asset('images/Logo-01.png') }}" alt="Sakanta">
        </div>

        <div class="header">
            <h1>Welcome to Sakanta</h1>
            <p>Choose how you'd like to proceed</p>
        </div>

        <div class="email-display">
            <p>Signed in as</p>
            <strong>{{ session('google_user_email') }}</strong>
        </div>

        <div class="choices">
            <a href="{{ route('auth.enter-access') }}" class="choice-card">
                <div class="choice-icon">
                    <img src="{{ asset('images/success.png') }}" alt="Enter Access Code">
                </div>
                <h2>Enter Access Code</h2>
                <p>I already have an access code and want to sign in immediately</p>
            </a>

            <a href="{{ route('auth.request-access') }}" class="choice-card">
                <div class="choice-icon">
                    <img src="{{ asset('images/wait.png') }}" alt="Request Access">
                </div>
                <h2>Request Access</h2>
                <p>I don't have an access code yet and need to request access</p>
            </a>
        </div>
    </div>

    <script>
        const video1 = document.getElementById('video1');
        const video2 = document.getElementById('video2');
        let isVideo1Active = true;

        function crossfadeVideos() {
            if (isVideo1Active) {
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
</body>
</html>
