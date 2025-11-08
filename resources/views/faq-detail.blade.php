<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $faq->title }} - SAKANTA</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        @font-face {
            font-family: 'Esther';
            src: url('/fonts/Esther-Regular.otf') format('opentype');
            font-weight: normal;
            font-style: normal;
            font-display: swap;
        }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Esther', 'Georgia', serif; color: #2c3e50; }
        .hero-faq { height: 100vh; background: url('/images/hero5.jpg') center/cover no-repeat; position: relative; display: flex; flex-direction: column; align-items: center; justify-content: center; }
        .hero-faq::before { content: ''; position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.4); }
        .hero-text { position: relative; z-index: 2; text-align: center; color: white; max-width: 800px; }
        .hero-text small { font-size: 18px; letter-spacing: 4px; text-transform: uppercase; display: block; margin-bottom: 20px; opacity: 0.9; font-family: 'Work Sans'; font-weight: 500; }
        .hero-text h1 { font-size: 82px; font-weight: 300; letter-spacing: 4px; margin-bottom: 30px; }
        .hero-text p { font-size: 22px; font-family: 'Work Sans'; font-weight: 300; opacity: 0.9; }
        .scroll-indicator { position: relative; z-index: 2; color: white; font-size: 24px; animation: bounce 2s infinite; cursor: pointer; margin-top: 60px; }
        @keyframes bounce { 0%, 20%, 50%, 80%, 100% { transform: translateY(0); } 40% { transform: translateY(-10px); } 60% { transform: translateY(-5px); } }
        .faq-section { background: #F7EFE2; padding: 100px 60px 80px; }
        .faq-container { max-width: 1000px; margin: 0 auto; }
        .back-btn { display: inline-block; padding: 12px 30px; border: 2px solid #064852; color: #064852; text-decoration: none; font-size: 13px; letter-spacing: 2px; text-transform: uppercase; font-family: 'Work Sans'; font-weight: 600; margin-bottom: 40px; }
        .back-btn:hover { background: #064852; color: #F7EFE2; }
        .faq-title { font-size: 52px; font-weight: 400; color: #064852; margin-bottom: 50px; text-align: center; }
        .faq-item { background: white; border: 2px solid #064852; border-radius: 8px; margin-bottom: 20px; overflow: hidden; }
        .faq-question { padding: 25px; background: #f9f9f9; cursor: pointer; display: flex; justify-content: space-between; align-items: center; font-weight: 600; color: #064852; transition: background 0.3s; font-family: 'Work Sans'; }
        .faq-question:hover { background: #efefef; }
        .faq-question.active { background: #064852; color: white; }
        .faq-toggle { font-size: 24px; transition: transform 0.3s; }
        .faq-answer { 
            height: 0; 
            overflow: hidden; 
            transition: height 0.4s cubic-bezier(0.4, 0, 0.2, 1); 
            padding: 0 25px; 
            color: #555; 
            line-height: 1.8; 
            font-family: 'Work Sans'; 
            font-weight: 400; 
            box-sizing: border-box; 
        }
        .faq-answer-inner {
            padding: 20px 0 5px 0;
        }
        @media (max-width: 768px) { 
            .faq-section { padding: 60px 30px; } 
            .hero-text h1 { font-size: 48px; } 
            .faq-title { font-size: 36px; } 
            .back-btn { padding: 10px 20px; font-size: 12px; margin-bottom: 30px; }
            .faq-question { padding: 20px; font-size: 15px; }
            .faq-answer-inner { padding: 15px 0; }
        }

        @media (max-width: 480px) {
            .hero-text h1 { font-size: 36px; letter-spacing: 2px; }
            .hero-text p { font-size: 16px; }
            .faq-section { padding: 40px 20px; }
            .faq-title { font-size: 28px; margin-bottom: 30px; }
            .back-btn { padding: 8px 18px; font-size: 11px; }
            .faq-question { padding: 18px 15px; font-size: 14px; }
            .faq-toggle { font-size: 22px; }
        }
    </style>
</head>
<body>
    @include('layouts.navbar')

    <section class="hero-faq">
        <div class="hero-text">
            <h1>{{ $faq->hero_big_title }}</h1>
            <p>{{ $faq->hero_small_title }}</p>
        </div>
        <div class="scroll-indicator" onclick="document.querySelector('.faq-section').scrollIntoView({ behavior: 'smooth' })" style="cursor: pointer;">↓</div>
    </section>

    <section class="faq-section">
        <div class="faq-container">
            <a href="{{ route('faq') }}" class="back-btn">← BACK TO ALL FAQs</a>
            
            <h2 class="faq-title">{{ $faq->title }}</h2>

            @if($faq->questions->count() > 0)
                @foreach($faq->questions as $question)
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <span>{{ $question->question }}</span>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <div class="faq-answer-inner">
                            {!! nl2br($question->answer) !!}
                        </div>
                    </div>
                </div>
                @endforeach
            @else
            <p style="text-align: center; color: #999; margin: 60px 0;">No questions available for this category.</p>
            @endif
        </div>
    </section>

    <!-- Featured Listings Section -->
    @include('components.featured-listings', ['listings' => $featuredListings ?? []])

    @include('layouts.footer')

    <script>
        function toggleFaq(element) {
            const answer = element.nextElementSibling;
            const inner = answer.querySelector('.faq-answer-inner');
            const isOpen = answer.style.height && answer.style.height !== '0px';
            
            if (isOpen) {
                // Closing
                answer.style.height = '0';
                element.classList.remove('active');
                element.querySelector('.faq-toggle').textContent = '+';
            } else {
                // Opening
                const height = inner.offsetHeight;
                answer.style.height = height + 'px';
                element.classList.add('active');
                element.querySelector('.faq-toggle').textContent = '−';
            }
        }
    </script>
</body>
</html>


