<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/Logo-02.png') }}?v={{ time() }}">
    <title>Access Code Generated - Sakanta</title>
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
            padding: 1rem;
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
            max-width: 550px;
            width: 100%;
            position: relative;
            z-index: 2;
        }

        .card {
            background: #f9f7f4;
            border-radius: 20px;
            padding: 2rem 2rem;
            box-shadow: 0 8px 32px rgba(0,0,0,0.3);
            text-align: center;
        }

        .logo {
            margin-bottom: 1.5rem;
        }

        .logo img {
            height: 85px;
            filter: drop-shadow(0 4px 10px rgba(0,0,0,0.3));
        }

        .success-icon {
            display: none;
        }

        .card h1 {
            font-family: 'Esther', serif;
            color: #064852;
            font-size: 2rem;
            margin-bottom: 1.5rem;
        }

        .card p {
            color: #064852;
            line-height: 1.6;
            margin-bottom: 1.5rem;
            font-weight: 400;
            display: none;
        }

        .access-code-box {
            background: #064852;
            padding: 1.5rem;
            border-radius: 15px;
            margin: 1.5rem 0;
        }

        .access-code-label {
            color: rgba(255,255,255,0.8);
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }

        .access-code {
            color: white;
            font-size: 1.8rem;
            font-weight: bold;
            letter-spacing: 0.2rem;
            font-family: 'Courier New', monospace;
        }

        .copy-btn {
            background: white;
            color: #064852;
            border: none;
            padding: 0.7rem 1.5rem;
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
            margin-top: 1rem;
            transition: all 0.3s;
            font-family: 'Work Sans', sans-serif;
        }

        .copy-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(255,255,255,0.3);
        }

        .btn {
            display: inline-block;
            padding: 0.85rem 2rem;
            background: #064852;
            color: white;
            text-decoration: none;
            border-radius: 10px;
            font-weight: 600;
            margin-top: 1rem;
            transition: all 0.3s;
            font-family: 'Work Sans', sans-serif;
        }

        .btn:hover {
            background: #053640;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(6, 72, 82, 0.4);
        }

        .warning-box {
            background: #fff3cd;
            border: 2px solid #ffc107;
            border-radius: 10px;
            padding: 1rem;
            margin-top: 1rem;
            text-align: left;
        }

        .warning-box strong {
            color: #856404;
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        .warning-box p {
            color: #856404;
            margin-bottom: 0;
            font-size: 0.9rem;
            display: block;
        }

        @media (max-width: 768px) {
            .card h1 { font-size: 1.6rem; }
            .access-code { font-size: 1.5rem; }
        }
    </style>
</head>
<body>
    <div class="video-background">
        <video id="video1" autoplay muted playsinline style="opacity: 1;">
            <source src="{{ asset('videos/login1.mp4') }}" type="video/mp4">
        </video>
        <video id="video2" muted playsinline style="opacity: 0;">
            <source src="{{ asset('videos/login2.mp4') }}" type="video/mp4">
        </video>
    </div>

    <div class="container">
        <div class="card">
            <div class="logo">
                <img src="{{ asset('images/Logo-01.png') }}" alt="Sakanta">
            </div>

            <div class="success-icon">🎉</div>
            <h1>Access Code Generated!</h1>
            <p>Your referral code was valid! Here's your access code to sign in to Sakanta.</p>

            <div class="access-code-box">
                <div class="access-code-label">Your Access Code</div>
                <div class="access-code" id="accessCode">{{ $accessCode }}</div>
                <button onclick="copyCode()" class="copy-btn">Copy Code</button>
            </div>

            <div class="warning-box">
                <strong>Important:</strong>
                <p>Please save and remember this access code. We have also sent it to your email for your reference.</p>
            </div>

            <a href="{{ route('auth.enter-access') }}" class="btn">Continue to Sign In</a>
        </div>
    </div>

    <script>
        function copyCode() {
            const code = document.getElementById('accessCode').textContent;
            navigator.clipboard.writeText(code).then(function() {
                alert('Access code copied to clipboard!');
            }, function(err) {
                console.error('Could not copy text: ', err);
            });
        }

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
