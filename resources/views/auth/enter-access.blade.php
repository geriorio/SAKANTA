<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/Logo-02.png') }}?v={{ time() }}">
    <title>Enter Access Code - Sakanta</title>
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
            max-width: 500px;
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

        h1 {
            font-family: 'Esther', serif;
            font-size: 2.2rem;
            color: #064852;
            margin-bottom: 0.5rem;
            text-align: center;
        }

        p {
            text-align: center;
            color: #064852;
            margin-bottom: 2rem;
            font-weight: 400;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            font-weight: 600;
            color: #064852;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }

        input {
            width: 100%;
            padding: 1rem 1.2rem;
            border: 2px solid #e0e0e0;
            background: white;
            border-radius: 10px;
            font-size: 1rem;
            font-family: 'Work Sans', sans-serif;
            transition: all 0.3s ease;
            color: #064852;
        }

        input::placeholder {
            color: #999;
        }

        input:focus {
            outline: none;
            border-color: #064852;
            box-shadow: 0 0 0 3px rgba(6, 72, 82, 0.1);
        }

        input:disabled, input:read-only {
            background: #f5f5f5;
            color: #666;
            cursor: not-allowed;
        }

        .btn {
            width: 100%;
            padding: 1rem;
            border: none;
            border-radius: 10px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Work Sans', sans-serif;
        }

        .btn-primary {
            background: #064852;
            color: white;
        }

        .btn-primary:hover {
            background: #053640;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(6, 72, 82, 0.4);
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 1.5rem;
            color: #064852;
            text-decoration: none;
            font-weight: 500;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        .alert {
            padding: 1rem 1.2rem;
            border-radius: 10px;
            margin-bottom: 1.5rem;
            font-size: 0.95rem;
        }

        .alert.error {
            background: #fee;
            color: #c00;
            border: 1px solid #fcc;
        }

        .alert.success {
            background: #efe;
            color: #060;
            border: 1px solid #cfc;
        }

        @media (max-width: 768px) {
            h1 { font-size: 1.8rem; }
            .container { padding: 2rem 1.5rem; }
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
        <div class="logo">
            <img src="{{ asset('images/Logo-01.png') }}" alt="Sakanta">
        </div>

        <h1>Enter Access Code</h1>
        <p>Please enter your access code to continue</p>

        @if(session('error'))
            <div class="alert error">{{ session('error') }}</div>
        @endif

        @if(session('success'))
            <div class="alert success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('auth.verify-access') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ session('google_user_email') }}" readonly required>
            </div>

            <div class="form-group">
                <label for="access_code">Access Code</label>
                <input type="text" id="access_code" name="access_code" placeholder="SKT123456" required autofocus style="text-transform: uppercase;">
            </div>

            <button type="submit" class="btn btn-primary">Continue</button>
        </form>

        <a href="{{ route('auth.access-choice') }}" class="back-link">← Back to options</a>
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
