<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/Logo-02.png') }}?v={{ time() }}">
    <title>Request Submitted - Sakanta</title>
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
            background: #F7EFE2;
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
            background: #F7EFE2;
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

        .card {
            text-align: center;
        }

        .card h1 {
            font-family: 'Esther', serif;
            color: #064852;
            font-size: 2.2rem;
            margin-bottom: 1.5rem;
        }
        
        .card p {
            color: #064852;
            line-height: 1.8;
            margin-bottom: 1rem;
            font-size: 1rem;
            font-weight: 400;
        }
        
        .info-box {
            background: rgba(6, 72, 82, 0.1);
            border: 2px solid rgba(6, 72, 82, 0.2);
            border-radius: 15px;
            padding: 1.5rem;
            margin: 2rem 0;
            text-align: left;
        }
        
        .info-box strong {
            color: #064852;
            display: block;
            margin-bottom: 0.8rem;
            font-size: 1.1rem;
            font-weight: 600;
        }
        
        .info-box ul {
            color: #064852;
            margin-left: 1.5rem;
            line-height: 1.8;
        }

        .info-box ul li {
            margin-bottom: 0.5rem;
        }
        
        .btn {
            display: inline-block;
            padding: 1rem 2.5rem;
            background: #064852;
            color: white;
            text-decoration: none;
            border-radius: 10px;
            font-weight: 600;
            margin-top: 1rem;
            transition: all 0.3s ease;
            border: 2px solid #064852;
        }
        
        .btn:hover {
            background: transparent;
            color: #064852;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(6, 72, 82, 0.3);
        }

        @media (max-width: 768px) {
            .card h1 {
                font-size: 1.8rem;
            }
            .container {
                padding: 2rem 1.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- Video Background -->
    <div class="video-background">
        <video id="video1" autoplay muted playsinline loop style="opacity: 1;">
            <source src="{{ asset('videos/login1.mp4') }}" type="video/mp4">
        </video>
        <video id="video2" muted playsinline loop style="opacity: 0;">
            <source src="{{ asset('videos/login2.mp4') }}" type="video/mp4">
        </video>
    </div>

    <div class="container">
        <div class="logo">
            <img src="{{ asset('images/Logo-02.png') }}" alt="Sakanta">
        </div>
        
        <div class="card">
            <h1>Request Submitted!</h1>
            <p>Thank you for your interest in Sakanta. Your access request has been received.</p>

            <div class="info-box">
                <strong>What happens next?</strong>
                <ul>
                    <li>Our admin team will review your request</li>
                    <li>You'll receive an access code via email once approved</li>
                    <li>Use the access code to sign in to Sakanta</li>
                </ul>
            </div>

            <p style="color: #064852; opacity: 0.8; font-size: 0.95rem;">We typically process requests within 1-2 business days.</p>

            <a href="{{ route('welcome') }}" class="btn">Back to Homepage</a>
        </div>
    </div>

    <script>
        const video1 = document.getElementById('video1');
        const video2 = document.getElementById('video2');
        let isVideo1Active = true;

        function switchVideo() {
            if (isVideo1Active) {
                video2.style.opacity = '1';
                video1.style.opacity = '0';
                video2.play();
            } else {
                video1.style.opacity = '1';
                video2.style.opacity = '0';
                video1.play();
            }
            isVideo1Active = !isVideo1Active;
        }

        // Switch video when one ends
        video1.addEventListener('ended', switchVideo);
        video2.addEventListener('ended', switchVideo);

        // Ensure videos are ready
        video1.load();
        video2.load();
    </script>
</body>
</html>
