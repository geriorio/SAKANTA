<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/Logo-02.png') }}?v={{ time() }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/Logo-02.png') }}?v={{ time() }}">
    <link rel="apple-touch-icon" href="{{ asset('images/Logo-02.png') }}?v={{ time() }}">
    <title>Welcome to Sakanta</title>
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
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background: #F7EFE2;
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

        /* Content */
        .intro-content {
            position: relative;
            z-index: 2;
            text-align: center;
            animation: fadeInUp 1s ease;
        }

        .intro-logo {
            margin-bottom: 40px;
            animation: fadeInDown 1s ease;
        }

        .intro-logo img {
            height: 150px;
            width: auto;
        }

        .intro-text {
            color: rgba(255, 255, 255, 0.9);
            font-size: 16px;
            font-weight: 400;
            line-height: 1.8;
            animation: fadeInUp 1s ease 0.3s both;
        }

        .scroll-indicator {
            position: absolute;
            bottom: 40px;
            left: 50%;
            transform: translateX(-50%);
            color: rgba(255, 255, 255, 0.7);
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 2px;
            animation: bounce 2s infinite;
            cursor: pointer;
            z-index: 2;
            transition: opacity 0.3s ease;
        }

        .scroll-indicator:hover {
            color: rgba(255, 255, 255, 1);
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes bounce {
            0%, 100% {
                transform: translateX(-50%) translateY(0);
            }
            50% {
                transform: translateX(-50%) translateY(-10px);
            }
        }

        /* Responsive */
        @media (max-width: 480px) {
            .intro-logo img {
                height: 64px;
            }

            .intro-text {
                font-size: 14px;
                padding: 0 30px;
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

    <!-- Intro Content -->
    <div class="intro-content">
        <div class="intro-logo">
            <img src="{{ asset('images/Logo-05.png') }}" alt="Sakanta">
        </div>
        <div class="intro-text">
            A Private World of Homes & Yachts,<br>Curated Just for You
        </div>
    </div>

    <div class="scroll-indicator" onclick="window.location.href='{{ route('auth.login') }}'"> 
        ↓ Scroll Down to Log In
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

        // Scroll down to login
        let scrollTimeout;
        window.addEventListener('wheel', function(e) {
            if (e.deltaY > 0) {
                clearTimeout(scrollTimeout);
                scrollTimeout = setTimeout(function() {
                    window.location.href = "{{ route('auth.login') }}";
                }, 100);
            }
        });

        // Touch scroll for mobile
        let touchStartY = 0;
        window.addEventListener('touchstart', function(e) {
            touchStartY = e.touches[0].clientY;
        });

        window.addEventListener('touchmove', function(e) {
            const touchEndY = e.touches[0].clientY;
            const deltaY = touchStartY - touchEndY;
            
            if (deltaY > 50) {
                window.location.href = "{{ route('auth.login') }}";
            }
        });

        // Clear forward history (prevent back button to protected pages)
        if (window.history && window.history.pushState) {
            window.history.pushState(null, null, window.location.href);
            window.onpopstate = function() {
                window.history.pushState(null, null, window.location.href);
            };
        }
    </script>

</body>
</html>
