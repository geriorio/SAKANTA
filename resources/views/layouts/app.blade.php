<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('images/Logo-02.png') }}?v=2">
    <title>@yield('title', 'Sakanta - Platform Co-Ownership Property Terdepan')</title>
    <meta name="description" content="@yield('description', 'Investasi property bersama dengan sistem co-ownership. Miliki saham property impian Anda mulai dari 1/8 bagian.')">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600&family=Poppins:wght@100;200;300;400;500;600&family=Space+Grotesk:wght@300;400;500;600&family=Work+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'sage': '#727444',
                        'cream': '#d2b996',
                        'olive': '#3e381e',
                        'taupe': '#766445',
                        'moss': '#4a541c',
                        'light-sage': '#8a9456',
                        'warm-cream': '#e6d4b7',
                        'deep-forest': '#2d3317'
                    }
                }
            }
        }
    </script>
    
    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- AOS (Animate On Scroll) -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    
    <!-- Custom CSS -->
    <style>
        @font-face {
            font-family: 'Esther';
            src: url('/fonts/Esther-Regular.otf') format('opentype');
            font-weight: normal;
            font-style: normal;
            font-display: swap;
        }

        :root {
            --color-sage: #727444;
            --color-cream: #d2b996;
            --color-olive: #3e381e;
            --color-taupe: #766445;
            --color-moss: #4a541c;
            --color-light-sage: #8a9456;
            --color-warm-cream: #e6d4b7;
            --color-deep-forest: #2d3317;
        }
        
        body {
            font-family: 'Esther', 'Inter', sans-serif;
            font-weight: 300;
            background: linear-gradient(135deg, var(--color-deep-forest) 0%, var(--color-olive) 50%, var(--color-sage) 100%);
            min-height: 100vh;
            letter-spacing: 0.01em;
        }
        
        h1, h2, h3, h4, h5, h6, .font-heading {
            font-family: 'Space Grotesk', sans-serif;
            font-weight: 400;
            letter-spacing: -0.01em;
            line-height: 1.2;
        }
        
        .font-light {
            font-weight: 200;
        }
        
        .font-thin {
            font-weight: 100;
        }
        
        .font-extralight {
            font-weight: 200;
        }
        
        .tracking-tight {
            letter-spacing: -0.025em;
        }
        
        .tracking-wide {
            letter-spacing: 0.025em;
        }
        
        .navbar-transparent {
            background: rgba(255, 255, 255, 0) !important;
            backdrop-filter: blur(0px) !important;
            border: 1px solid rgba(255, 255, 255, 0) !important;
            box-shadow: none !important;
            transition: all 0.3s ease;
        }
        
        .navbar-scrolled {
            background: rgba(45, 51, 23, 0.95) !important;
            backdrop-filter: blur(20px) !important;
            border: 1px solid rgba(114, 116, 68, 0.3) !important;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2), 
                        inset 0 1px 0 rgba(114, 116, 68, 0.3),
                        0 0 30px rgba(45, 51, 23, 0.2) !important;
        }
        
        .navbar-scrolled .navbar-logo-text {
            color: #d2b996 !important;
        }
        
        .navbar-scrolled .navbar-link {
            color: #d2b996 !important;
        }
        
        .navbar-scrolled .navbar-link:hover {
            color: #e6d4b7 !important;
            background: rgba(114, 116, 68, 0.2) !important;
        }
        
        .navbar-scrolled .navbar-auth-btn {
            color: #d2b996 !important;
            background: rgba(114, 116, 68, 0.2) !important;
            border-color: rgba(114, 116, 68, 0.3) !important;
        }
        
        .navbar-scrolled .navbar-auth-btn:hover {
            color: #e6d4b7 !important;
            background: rgba(114, 116, 68, 0.3) !important;
        }
        
        .navbar-scrolled .navbar-register-btn {
            background: linear-gradient(135deg, #727444 0%, #766445 100%) !important;
            color: #ffffff !important;
            border-color: rgba(114, 116, 68, 0.5) !important;
        }
        
        .navbar-scrolled .navbar-register-btn:hover {
            background: linear-gradient(135deg, #8a9456 0%, #766445 100%) !important;
        }
        
        .video-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -2;
            object-fit: cover;
            opacity: 0.2;
        }
        
        .video-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            background: linear-gradient(135deg, 
                rgba(45, 51, 23, 0.85) 0%, 
                rgba(62, 56, 30, 0.8) 50%, 
                rgba(114, 116, 68, 0.85) 100%);
        }
        
        .bg-gradient-sakanta {
            background: linear-gradient(135deg, var(--color-sage) 0%, var(--color-taupe) 100%);
        }
        
        .bg-gradient-sunset {
            background: linear-gradient(135deg, var(--color-cream) 0%, var(--color-warm-cream) 100%);
            color: var(--color-olive);
        }
        
        .bg-gradient-ocean {
            background: linear-gradient(135deg, var(--color-light-sage) 0%, var(--color-sage) 100%);
        }
        
        .bg-gradient-forest {
            background: linear-gradient(135deg, var(--color-moss) 0%, var(--color-light-sage) 100%);
        }
        
        .bg-gradient-dark {
            background: linear-gradient(135deg, var(--color-deep-forest) 0%, var(--color-olive) 100%);
        }
        
        .bg-gradient-natural {
            background: linear-gradient(135deg, var(--color-cream) 0%, var(--color-sage) 50%, var(--color-olive) 100%);
        }
        
        .bg-gradient-earth {
            background: linear-gradient(135deg, var(--color-taupe) 0%, var(--color-moss) 50%, var(--color-deep-forest) 100%);
        }
        
        .bg-hero {
            background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.6)),
                        url('https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1973&q=80');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
        
        .bg-pattern {
            background-color: var(--color-warm-cream);
            background-image: 
                radial-gradient(circle at 25px 25px, rgba(114, 116, 68, 0.2) 2px, transparent 2px),
                radial-gradient(circle at 75px 75px, rgba(114, 116, 68, 0.2) 2px, transparent 2px);
            background-size: 100px 100px;
        }
        
        .bg-mesh {
            background: linear-gradient(135deg, var(--color-sage) 0%, var(--color-taupe) 50%, var(--color-cream) 100%);
            background-size: 400% 400%;
            animation: meshGradient 15s ease infinite;
        }
        
        @keyframes meshGradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        .navbar-glass {
            backdrop-filter: blur(20px);
            background: rgba(210, 185, 150, 0.1);
            border-bottom: 1px solid rgba(210, 185, 150, 0.3);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }
        
        .card-glass {
            backdrop-filter: blur(20px);
            background: rgba(210, 185, 150, 0.15);
            border: 1px solid rgba(210, 185, 150, 0.3);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }
        
        .card-natural {
            backdrop-filter: blur(20px);
            background: rgba(114, 116, 68, 0.1);
            border: 1px solid rgba(114, 116, 68, 0.3);
            box-shadow: 0 0 30px rgba(114, 116, 68, 0.15);
        }
        
        .card-hover {
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            border-radius: inherit;
        }
        
        .card-hover:hover {
            transform: translateY(-8px) scale(1.01);
            box-shadow: 
                0 20px 40px rgba(0, 0, 0, 0.15),
                0 0 0 1px rgba(114, 116, 68, 0.1);
            border-radius: inherit;
        }
        
        .btn-gradient {
            background: linear-gradient(135deg, var(--color-sage) 0%, var(--color-taupe) 100%);
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(114, 116, 68, 0.4);
            font-weight: 600;
            color: white;
            font-family: 'Work Sans', sans-serif;
        }
        
        .btn-gradient:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(114, 116, 68, 0.6);
        }
        
        .btn-sunset {
            background: linear-gradient(135deg, var(--color-cream) 0%, var(--color-warm-cream) 100%);
            box-shadow: 0 4px 15px rgba(210, 185, 150, 0.4);
            font-weight: 600;
            color: var(--color-olive);
            font-family: 'Work Sans', sans-serif;
        }
        
        .btn-sunset:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(210, 185, 150, 0.6);
        }
        
        .btn-ocean {
            background: linear-gradient(135deg, var(--color-light-sage) 0%, var(--color-sage) 100%);
            box-shadow: 0 4px 15px rgba(138, 148, 86, 0.4);
            font-weight: 600;
            color: white;
            font-family: 'Work Sans', sans-serif;
        }
        
        .btn-ocean:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(138, 148, 86, 0.6);
        }
        
        .btn-natural {
            background: linear-gradient(135deg, var(--color-taupe) 0%, var(--color-moss) 100%);
            box-shadow: 0 4px 15px rgba(118, 100, 69, 0.4);
            border: 1px solid rgba(118, 100, 69, 0.3);
            font-weight: 600;
            color: white;
            font-family: 'Work Sans', sans-serif;
        }
        
        .btn-natural:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(118, 100, 69, 0.6);
            border-color: rgba(118, 100, 69, 0.5);
        }
        
        .floating-element {
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }
        
        .text-gradient {
            background: linear-gradient(135deg, var(--color-sage) 0%, var(--color-taupe) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .text-gradient-natural {
            background: linear-gradient(135deg, var(--color-cream) 0%, var(--color-sage) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .text-gradient-light {
            background: linear-gradient(135deg, #ffffff 0%, var(--color-warm-cream) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .blob {
            border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
            background: linear-gradient(45deg, var(--color-sage), var(--color-cream));
            opacity: 0.1;
            animation: blob 7s infinite;
        }
        
        @keyframes blob {
            0% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1); }
        }
        
        .cyber-grid {
            background-image: 
                linear-gradient(rgba(114, 116, 68, 0.1) 1px, transparent 1px),
                linear-gradient(90deg, rgba(114, 116, 68, 0.1) 1px, transparent 1px);
            background-size: 20px 20px;
        }
        
        .glow-effect {
            box-shadow: 0 0 20px rgba(210, 185, 150, 0.3);
        }
        
        .logo-glow {
            filter: drop-shadow(0 0 10px rgba(114, 116, 68, 0.5));
        }
        
        @keyframes animate-blob {
            0% {
                transform: translate(0px, 0px) scale(1);
            }
            33% {
                transform: translate(30px, -50px) scale(1.1);
            }
            66% {
                transform: translate(-20px, 20px) scale(0.9);
            }
            100% {
                transform: translate(0px, 0px) scale(1);
            }
        }
        
        .animate-blob {
            animation: animate-blob 7s infinite;
        }
        
        .animation-delay-2000 {
            animation-delay: 2s;
        }
        
        .animation-delay-4000 {
            animation-delay: 4s;
        }
        
        .rounded-4xl {
            border-radius: 2rem;
        }
        
        /* Scrollbar styling */
        ::-webkit-scrollbar {
            width: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: rgba(45, 51, 23, 0.3);
        }
        
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, var(--color-sage) 0%, var(--color-taupe) 100%);
            border-radius: 4px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, var(--color-light-sage) 0%, var(--color-cream) 100%);
        }
        
        /* Swiper Styles */
        .swiper-container {
            overflow: hidden;
        }
        
        /* Hide all navigation arrows */
        .swiper-button-next, 
        .swiper-button-prev {
            display: none !important;
        }
        
        .swiper-pagination-bullet {
            background: rgba(114, 116, 68, 0.3) !important;
            opacity: 1 !important;
            width: 10px !important;
            height: 10px !important;
            border: 1px solid rgba(114, 116, 68, 0.2) !important;
            transition: all 0.3s ease !important;
            margin: 0 4px !important;
        }
        
        /* Additional AOS and Performance Optimizations */
        [data-aos] {
            transition-property: opacity, transform;
            transition-timing-function: ease-out-quart;
        }
        
        [data-aos].aos-animate {
            transition-timing-function: ease-out-quart;
        }
        
        /* Enhanced Swiper Visual Effects */
        .swiper {
            overflow: hidden;
            position: relative;
            z-index: 1;
        }
        
        .swiper-slide {
            transition: transform 0.3s ease, opacity 0.3s ease;
            will-change: transform;
        }
        
        .swiper-slide:hover {
            transform: translateY(-5px);
        }
        
        .swiper-slide-active {
            z-index: 2;
        }
        
        /* Enhanced pagination */
        .swiper-pagination {
            bottom: 15px !important;
            z-index: 10;
        }
        
        /* Property card enhancements */
        .property-card {
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            will-change: transform, box-shadow;
            position: relative;
            overflow: hidden;
            border-radius: inherit;
        }
        
        .property-card:hover {
            transform: translateY(-6px) scale(1.01);
            box-shadow: 
                0 15px 35px rgba(0, 0, 0, 0.12),
                0 5px 15px rgba(0, 0, 0, 0.08),
                0 0 0 1px rgba(114, 116, 68, 0.05);
            border-radius: inherit;
        }
        
        .property-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(114, 116, 68, 0.03) 0%, rgba(210, 185, 150, 0.03) 100%);
            opacity: 0;
            transition: opacity 0.4s ease;
            z-index: 1;
            border-radius: inherit;
        }
        
        .property-card:hover::before {
            opacity: 1;
        }
        
        /* Modern Property Card Styles */
        .line-clamp-1 {
            overflow: hidden;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 1;
        }
        
        .line-clamp-2 {
            overflow: hidden;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2;
        }
        
        /* Enhanced card animations */
        .modern-card {
            position: relative;
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }
        
        .modern-card:hover {
            transform: translateY(-8px);
        }
        
        .modern-card::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, var(--color-sage), var(--color-olive));
            opacity: 0;
            z-index: -1;
            border-radius: inherit;
            filter: blur(20px);
            transition: opacity 0.4s ease;
        }
        
        .modern-card:hover::after {
            opacity: 0.3;
        }
        
        /* Badge styles */
        .badge-modern {
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        /* Enhanced gradients for text */
        .text-gradient-sage {
            background: linear-gradient(135deg, var(--color-sage) 0%, var(--color-olive) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        /* Improved shadow effects */
        .shadow-premium {
            box-shadow: 
                0 10px 25px -3px rgba(0, 0, 0, 0.1), 
                0 4px 6px -2px rgba(0, 0, 0, 0.05),
                0 0 0 1px rgba(0, 0, 0, 0.05);
        }
        
        .shadow-premium-hover {
            box-shadow: 
                0 20px 40px -4px rgba(0, 0, 0, 0.15), 
                0 8px 16px -4px rgba(0, 0, 0, 0.1),
                0 0 0 1px rgba(114, 116, 68, 0.1);
        }
        
        /* Button enhancements */
        .btn, .button, [class*="btn-"] {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            font-family: 'Work Sans', sans-serif;
        }
        
        .btn:hover, .button:hover, [class*="btn-"]:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }
        
        .btn:active, .button:active, [class*="btn-"]:active {
            transform: translateY(0);
        }
        
        /* Loading and performance optimizations */
        body.loaded .swiper {
            opacity: 1;
            transition: opacity 0.5s ease;
        }
        
        .lazy-load {
            opacity: 0;
            transition: opacity 0.4s ease;
        }
        
        .lazy-load.loaded {
            opacity: 1;
        }
        
        /* Responsive improvements */
        @media (max-width: 768px) {
            .swiper-button-next, .swiper-button-prev {
                width: 36px !important;
                height: 36px !important;
                margin-top: -18px !important;
            }
            
            .swiper-button-next:after, .swiper-button-prev:after {
                font-size: 14px !important;
            }
            
            .property-card:hover, .card-hover:hover {
                transform: translateY(-4px) scale(1.005);
            }
            
            .property-card:hover {
                box-shadow: 
                    0 10px 25px rgba(0, 0, 0, 0.1),
                    0 3px 10px rgba(0, 0, 0, 0.06),
                    0 0 0 1px rgba(114, 116, 68, 0.03);
            }
        }
        
        /* Enhanced shadow effects that follow border radius */
        .rounded-xl:hover, .rounded-2xl:hover, .rounded-3xl:hover {
            box-shadow: inherit;
        }
        
        /* Ensure all cards maintain their border radius */
        .bg-white\\/95:hover,
        .bg-gradient-to-br:hover {
            border-radius: inherit !important;
        }
        
        /* Fix for rounded corners on all card elements */
        .property-card,
        .card-hover {
            position: relative;
            isolation: isolate;
        }
        
        .property-card::after,
        .card-hover::after {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: inherit;
            pointer-events: none;
            z-index: -1;
        }
        
        /* Specific border radius preservation */
        .rounded-2xl.property-card:hover {
            border-radius: 1rem !important;
            box-shadow: 
                0 15px 35px rgba(0, 0, 0, 0.12),
                0 5px 15px rgba(0, 0, 0, 0.08),
                0 0 0 1px rgba(114, 116, 68, 0.05);
        }
        
        .rounded-xl.property-card:hover {
            border-radius: 0.75rem !important;
            box-shadow: 
                0 12px 30px rgba(0, 0, 0, 0.1),
                0 4px 12px rgba(0, 0, 0, 0.06),
                0 0 0 1px rgba(114, 116, 68, 0.04);
        }
        
        .rounded-3xl.card-hover:hover {
            border-radius: 1.5rem !important;
            box-shadow: 
                0 20px 40px rgba(0, 0, 0, 0.15),
                0 0 0 1px rgba(114, 116, 68, 0.1);
        }
        
        /* Smooth transformations */
        html {
            scroll-behavior: smooth;
        }
        
        /* Performance optimizations */
        * {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
        
        /* Prevent sharp edges during transformations */
        .property-card,
        .card-hover {
            transform-style: preserve-3d;
            backface-visibility: hidden;
            -webkit-backface-visibility: hidden;
        }
        
        /* Ensure consistent rendering across browsers */
        .property-card:hover,
        .card-hover:hover {
            will-change: transform, box-shadow;
            transform-origin: center center;
        }
        
        /* Focus improvements for accessibility */
        .swiper-pagination-bullet:focus {
            outline: 2px solid var(--color-sage);
            outline-offset: 2px;
        }
        
        .swiper-pagination-bullet-active {
            background: var(--color-sage) !important;
            border-color: var(--color-olive) !important;
            transform: scale(1.3) !important;
            box-shadow: 0 2px 8px rgba(114, 116, 68, 0.4) !important;
        }
        
        /* Page Loader Styles */
        .page-loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                linear-gradient(135deg, rgba(45, 51, 23, 0.85) 0%, rgba(62, 56, 30, 0.8) 50%, rgba(114, 116, 68, 0.85) 100%),
                url('https://images.unsplash.com/photo-1441974231531-c6227db76b6e?ixlib=rb-4.0.3&auto=format&fit=crop&w=2071&q=80') center/cover;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            opacity: 1;
            visibility: visible;
            transition: opacity 0.8s cubic-bezier(0.4, 0, 0.2, 1), visibility 0.8s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .page-loader::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                radial-gradient(circle at 30% 80%, rgba(114, 116, 68, 0.4) 0%, transparent 50%),
                radial-gradient(circle at 70% 20%, rgba(210, 185, 150, 0.3) 0%, transparent 50%),
                linear-gradient(180deg, transparent 0%, rgba(45, 51, 23, 0.2) 100%);
            animation: backgroundPulse 6s ease-in-out infinite;
        }
        
        .page-loader.hidden {
            opacity: 0;
            visibility: hidden;
        }
        
        .loader-content {
            text-align: center;
            color: white;
            position: relative;
            z-index: 3;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        
        .loader-brand {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        
        .loader-logo {
            width: 140px;
            height: 140px;
            margin-bottom: 1.5rem;
            position: relative;
            background: rgba(255, 255, 255, 0.1);
            border: 3px solid rgba(210, 185, 150, 0.3);
            border-radius: 50%;
            padding: 20px;
            backdrop-filter: blur(10px);
            box-shadow: 
                0 20px 40px rgba(0, 0, 0, 0.3),
                0 0 0 1px rgba(255, 255, 255, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.2);
            filter: drop-shadow(0 10px 30px rgba(0, 0, 0, 0.4));
            animation: logoFloat 4s ease-in-out infinite;
        }
        
        .loader-logo .logo-image {
            width: 100%;
            height: 100%;
            object-fit: contain;
            transition: all 0.3s ease;
        }
        
        .loader-logo .logo-image.loaded {
            opacity: 1;
            transform: scale(1);
        }
        
        .loader-text {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 2.5rem;
            font-weight: 400;
            letter-spacing: 0.2em;
            margin: 0;
            background: linear-gradient(135deg, #ffffff 0%, var(--color-warm-cream) 50%, var(--color-cream) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            background-size: 200% 200%;
            animation: textShimmer 3s ease-in-out infinite;
            text-shadow: 0 4px 20px rgba(210, 185, 150, 0.3);
        }
        
        @keyframes backgroundPulse {
            0%, 100% {
                opacity: 0.8;
                transform: scale(1);
            }
            50% {
                opacity: 1;
                transform: scale(1.02);
            }
        }
        
        @keyframes logoFloat {
            0%, 100% {
                transform: translateY(0px) scale(1);
                border-color: rgba(210, 185, 150, 0.3);
                box-shadow: 
                    0 20px 40px rgba(0, 0, 0, 0.3),
                    0 0 0 1px rgba(255, 255, 255, 0.1),
                    inset 0 1px 0 rgba(255, 255, 255, 0.2);
            }
            25% {
                transform: translateY(-8px) scale(1.03);
                border-color: rgba(210, 185, 150, 0.4);
                box-shadow: 
                    0 25px 45px rgba(0, 0, 0, 0.4),
                    0 0 0 1px rgba(255, 255, 255, 0.15),
                    inset 0 1px 0 rgba(255, 255, 255, 0.25);
            }
            50% {
                transform: translateY(-12px) scale(1.05);
                border-color: rgba(210, 185, 150, 0.5);
                box-shadow: 
                    0 30px 50px rgba(0, 0, 0, 0.5),
                    0 0 0 1px rgba(255, 255, 255, 0.2),
                    inset 0 1px 0 rgba(255, 255, 255, 0.3);
            }
            75% {
                transform: translateY(-8px) scale(1.03);
                border-color: rgba(210, 185, 150, 0.4);
                box-shadow: 
                    0 25px 45px rgba(0, 0, 0, 0.4),
                    0 0 0 1px rgba(255, 255, 255, 0.15),
                    inset 0 1px 0 rgba(255, 255, 255, 0.25);
            }
        }
        
        @keyframes textShimmer {
            0% {
                background-position: -200% 0;
            }
            50% {
                background-position: 200% 0;
            }
            100% {
                background-position: -200% 0;
            }
        }
        
        /* Responsive loader */
        @media (max-width: 768px) {
            .loader-logo {
                width: 120px;
                height: 120px;
                padding: 18px;
            }
            
            .loader-text {
                font-size: 2rem;
            }
        }
        
        @media (max-width: 480px) {
            .loader-logo {
                width: 100px;
                height: 100px;
                padding: 15px;
            }
            
            .loader-text {
                font-size: 1.8rem;
                letter-spacing: 0.15em;
            }
        }
        
        /* Ensure body doesn't scroll while loader is active */
        body.loading {
            overflow: hidden;
        }
    </style>
    
@stack('styles')
</head>
<body class="bg-gray-50 loading">
    <!-- Page Loader -->
    <div class="page-loader" id="pageLoader">
        <div class="loader-content">
            <div class="loader-brand">
                <div class="loader-logo">
                    <!-- Sakanta Logo Image -->
                    <img src="{{ asset('images/sakanta.png') }}" alt="Sakanta Logo" class="logo-image">
                </div>
                <div class="loader-text">SAKANTA</div>
            </div>
        </div>
    </div>

    <!-- Video Background -->
    <video autoplay muted loop class="video-background">
        <source src="https://player.vimeo.com/external/370467553.sd.mp4?s=06ce6cf2b5e8f9b8c1a98b6a8a2d9a4b&profile_id=164&oauth2_token_id=57447761" type="video/mp4">
        <source src="https://assets.mixkit.co/videos/preview/mixkit-aerial-view-of-a-luxurious-house-with-pool-39765-large.mp4" type="video/mp4">
        <source src="https://assets.mixkit.co/videos/preview/mixkit-modern-house-interior-kitchen-40843-large.mp4" type="video/mp4">
    </video>
    
    <!-- Video Overlay -->
    <div class="video-overlay"></div>
    
    <!-- Cyber Grid Background -->
    <div class="fixed inset-0 cyber-grid opacity-20 pointer-events-none z-0"></div>
    <!-- Navigation -->
    <nav class="fixed w-full top-0 z-50 navbar-transparent" x-data="{ open: false }" id="navbar" style="background: transparent; border: none;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="{{ route('home') }}" class="flex items-center group">
                        <div class="w-12 h-12 flex items-center justify-center group-hover:scale-110 transition-all duration-300">
                            <img src="{{ asset('images/sakanta.png') }}" 
                                 alt="Sakanta Logo" 
                                 class="w-12 h-12 object-contain filter drop-shadow-lg" />
                        </div>
                        <span class="ml-3 text-xl font-normal text-white font-heading tracking-tight drop-shadow-lg navbar-logo-text">SAKANTA</span>
                    </a>
                </div>
                
                <!-- Desktop Navigation -->
                <div class="hidden md:block">
                    <div class="ml-10 flex items-center space-x-1">
                        <a href="{{ route('home') }}" class="navbar-link text-white hover:text-cream px-4 py-2 text-sm font-normal transition-all hover:bg-white/10 rounded-lg backdrop-blur-sm">
                            Beranda
                        </a>
                        <a href="{{ route('listings') }}" class="navbar-link text-white hover:text-cream px-4 py-2 text-sm font-normal transition-all hover:bg-white/10 rounded-lg backdrop-blur-sm">
                            Listings
                        </a>
                        <a href="{{ route('about') }}" class="navbar-link text-white hover:text-cream px-4 py-2 text-sm font-normal transition-all hover:bg-white/10 rounded-lg backdrop-blur-sm">
                            Tentang
                        </a>
                        <a href="{{ route('faq') }}" class="navbar-link text-white hover:text-cream px-4 py-2 text-sm font-normal transition-all hover:bg-white/10 rounded-lg backdrop-blur-sm">
                            FAQs
                        </a>
                        <a href="#kontak" class="navbar-link text-white hover:text-cream px-4 py-2 text-sm font-normal transition-all hover:bg-white/10 rounded-lg backdrop-blur-sm">
                            Kontak
                        </a>
                    </div>
                </div>
                
                <!-- Auth Buttons -->
                <div class="hidden md:flex items-center space-x-3">
                    @auth
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open" class="navbar-auth-btn flex items-center text-sm text-white hover:text-cream transition-colors bg-white/10 hover:bg-white/20 px-4 py-2 rounded-lg font-normal backdrop-blur-sm border border-white/20">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                <span class="font-heading">{{ auth()->user()->name }}</span>
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            
                            <div x-show="open" @click.away="open = false" x-transition class="absolute right-0 mt-2 w-48 bg-white/95 backdrop-blur-sm rounded-xl shadow-lg border border-white/30 py-2">
                                <a href="#dashboard" class="block px-4 py-2 text-sm text-gray-700 hover:bg-white/50 font-light">Dashboard</a>
                                <a href="#investasi" class="block px-4 py-2 text-sm text-gray-700 hover:bg-white/50 font-light">Investasi Saya</a>
                                <hr class="my-1 border-gray-200">
                                <form method="POST" action="{{ route('logout') }}" id="logoutForm">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50 font-light">
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="navbar-link text-white hover:text-cream px-4 py-2 text-sm font-normal transition-all hover:bg-white/10 rounded-lg backdrop-blur-sm">
                            Masuk
                        </a>
                        <a href="{{ route('register') }}" class="navbar-register-btn bg-gradient-sakanta text-white px-6 py-2 rounded-lg text-sm font-normal transition-all border border-sage/30 backdrop-blur-sm shadow-lg">
                            Daftar
                        </a>
                    @endauth
                </div>
                
                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button @click="open = !open" class="text-white hover:text-cream p-2 rounded-lg hover:bg-white/10 backdrop-blur-sm">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Mobile Navigation -->
        <div x-show="open" x-transition class="md:hidden bg-gradient-dark/95 backdrop-blur-sm border-t border-sage/30">
            <div class="px-4 py-3 space-y-1">
                <a href="{{ route('home') }}" class="block px-3 py-2 text-cream hover:text-warm-cream hover:bg-sage/20 rounded-lg font-light">Beranda</a>
                <a href="{{ route('listings') }}" class="block px-3 py-2 text-cream hover:text-warm-cream hover:bg-sage/20 rounded-lg font-light">Listings</a>
                <a href="{{ route('about') }}" class="block px-3 py-2 text-cream hover:text-warm-cream hover:bg-sage/20 rounded-lg font-light">Tentang</a>
                <a href="{{ route('faq') }}" class="block px-3 py-2 text-cream hover:text-warm-cream hover:bg-sage/20 rounded-lg font-light">FAQs</a>
                <a href="#kontak" class="block px-3 py-2 text-cream hover:text-warm-cream hover:bg-sage/20 rounded-lg font-light">Kontak</a>
                
                @auth
                    <hr class="my-3 border-sage/30">
                    <a href="#dashboard" class="block px-3 py-2 text-cream hover:bg-sage/20 rounded-lg font-light">Dashboard</a>
                    <a href="#investasi" class="block px-3 py-2 text-cream hover:bg-sage/20 rounded-lg font-light">Investasi Saya</a>
                    <form method="POST" action="{{ route('logout') }}" id="logoutFormMobile">
                        @csrf
                        <button type="submit" class="block w-full text-left px-3 py-2 text-red-400 hover:bg-red-900/20 rounded-lg font-light">Logout</button>
                    </form>
                @else
                    <hr class="my-3 border-sage/30">
                    <a href="{{ route('login') }}" class="block px-3 py-2 text-cream hover:bg-sage/20 rounded-lg font-light">Masuk</a>
                    <a href="{{ route('register') }}" class="block px-3 py-2 text-cream font-light hover:bg-sage/20 rounded-lg">Daftar</a>
                @endauth
            </div>
        </div>
    </nav>
    
    <!-- Background Elements -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="blob absolute top-10 left-10 w-72 h-72 floating-element"></div>
        <div class="blob absolute top-1/2 right-10 w-96 h-96 floating-element" style="animation-delay: -2s;"></div>
        <div class="blob absolute bottom-10 left-1/3 w-64 h-64 floating-element" style="animation-delay: -4s;"></div>
    </div>
    
    <!-- Main Content -->
    <main class="relative z-10">
        @yield('content')
    </main>
    
    <!-- Popup Notifications -->
    @if(session('success'))
        <div id="notification" class="fixed top-20 right-4 z-50 max-w-sm w-full" x-data="{ show: true }" x-show="show" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform translate-x-full" x-transition:enter-end="opacity-100 transform translate-x-0" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 transform translate-x-0" x-transition:leave-end="opacity-0 transform translate-x-full">
            <div class="bg-gradient-sakanta/95 backdrop-blur-sm border border-sage/30 text-white px-6 py-4 rounded-2xl shadow-2xl relative glow-effect">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-warm-cream mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="font-medium">{{ session('success') }}</span>
                    </div>
                    <button @click="show = false" class="text-warm-cream hover:text-white ml-4">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <script>
            setTimeout(() => {
                const notification = document.getElementById('notification');
                if (notification) {
                    notification.style.display = 'none';
                }
            }, 5000);
        </script>
    @endif
    
    @if(session('error'))
        <div id="notification" class="fixed top-20 right-4 z-50 max-w-sm w-full" x-data="{ show: true }" x-show="show" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform translate-x-full" x-transition:enter-end="opacity-100 transform translate-x-0" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 transform translate-x-0" x-transition:leave-end="opacity-0 transform translate-x-full">
            <div class="bg-red-900/95 backdrop-blur-sm border border-red-500/30 text-white px-6 py-4 rounded-2xl shadow-2xl relative">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-red-300 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="font-medium">{{ session('error') }}</span>
                    </div>
                    <button @click="show = false" class="text-red-300 hover:text-white ml-4">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <script>
            setTimeout(() => {
                const notification = document.getElementById('notification');
                if (notification) {
                    notification.style.display = 'none';
                }
            }, 5000);
        </script>
    @endif
    
    <!-- Footer -->
    <footer class="bg-gradient-dark text-white relative overflow-hidden z-10">
        <div class="absolute inset-0 bg-black/40"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="col-span-1 md:col-span-2">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 flex items-center justify-center shadow-lg logo-glow">
                            <img src="{{ asset('images/sakanta.png') }}" 
                                 alt="Sakanta Logo" 
                                 class="w-12 h-12 object-contain filter drop-shadow-lg" />
                        </div>
                        <span class="ml-3 text-2xl font-light font-heading tracking-tight">SAKANTA</span>
                    </div>
                    <p class="text-white/80 mb-6 max-w-md text-lg leading-relaxed font-light">
                        Platform co-ownership property terdepan di Indonesia. Investasi property kini lebih mudah dan terjangkau dengan sistem kepemilikan bersama yang revolusioner.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-12 h-12 card-natural rounded-xl flex items-center justify-center text-white/80 hover:text-white hover:bg-white/20 transition-all glow-effect group">
                            <svg class="w-6 h-6 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-12 h-12 card-natural rounded-xl flex items-center justify-center text-white/80 hover:text-white hover:bg-white/20 transition-all glow-effect group">
                            <svg class="w-6 h-6 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-12 h-12 card-natural rounded-xl flex items-center justify-center text-white/80 hover:text-white hover:bg-white/20 transition-all glow-effect group">
                            <svg class="w-6 h-6 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.219-.359-1.219c0-1.141.662-1.992 1.488-1.992.703 0 1.043.527 1.043 1.158 0 .705-.449 1.758-.68 2.735-.194.820.412 1.488 1.219 1.488 1.463 0 2.588-1.543 2.588-3.77 0-1.969-1.414-3.348-3.434-3.348-2.34 0-3.711 1.756-3.711 3.57 0 .706.271 1.461.608 1.871.067.082.077.154.057.237-.061.257-.196.798-.223.908-.035.146-.116.177-.268.107-1-.465-1.624-1.926-1.624-3.1 0-2.59 1.881-4.97 5.422-4.97 2.847 0 5.061 2.026 5.061 4.734 0 2.826-1.783 5.096-4.258 5.096-.831 0-1.613-.432-1.881-1.009l-.51 1.943c-.184.718-.677 1.619-1.006 2.168.757.233 1.559.359 2.395.359 6.621 0 11.988-5.367 11.988-11.987C24.005 5.367 18.638.001 12.017.001z"/>
                            </svg>
                        </a>
                    </div>
                </div>
                
                <div>
                    <h3 class="text-xl font-light mb-6 text-gradient-natural font-heading tracking-wide">LAYANAN</h3>
                    <ul class="space-y-4 text-white/80">
                        <li><a href="#" class="hover:text-white transition-all hover:translate-x-2 block font-light">Co-Ownership</a></li>
                        <li><a href="#" class="hover:text-white transition-all hover:translate-x-2 block font-light">Investasi Property</a></li>
                        <li><a href="#" class="hover:text-white transition-all hover:translate-x-2 block font-light">Konsultasi</a></li>
                        <li><a href="#" class="hover:text-white transition-all hover:translate-x-2 block font-light">Analisis ROI</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-xl font-light mb-6 text-gradient-natural font-heading tracking-wide">KONTAK</h3>
                    <ul class="space-y-4 text-white/80">
                        <li class="flex items-center group">
                            <svg class="w-5 h-5 mr-3 text-amber-400 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            <span class="font-light">info@sakanta.com</span>
                        </li>
                        <li class="flex items-center group">
                            <svg class="w-5 h-5 mr-3 text-amber-400 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            <span class="font-light">+62 21 1234 5678</span>
                        </li>
                        <li class="flex items-center group">
                            <svg class="w-5 h-5 mr-3 text-amber-400 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
                            </svg>
                            <span class="font-light">+62 812 3456 7890</span>
                        </li>
                        <li class="flex items-center group">
                            <svg class="w-5 h-5 mr-3 text-amber-400 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span class="font-light">Jakarta, Indonesia</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-white/20 mt-12 pt-8 text-center text-white/60">
                <p class="font-light text-lg">&copy; {{ date('Y') }} SAKANTA. All rights reserved.</p>
            </div>
        </div>
    </footer>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const navbar = document.getElementById('navbar');
            
            // Ensure navbar starts transparent with inline style
            navbar.classList.add('navbar-transparent');
            navbar.classList.remove('navbar-scrolled');
            navbar.style.background = 'transparent';
            navbar.style.border = 'none';
            navbar.style.boxShadow = 'none';
            
            function handleScroll() {
                // Calculate 85% of viewport height as threshold
                // This ensures navbar stays transparent throughout hero section
                const heroThreshold = window.innerHeight * 0.85;
                
                if (window.scrollY > heroThreshold) {
                    navbar.classList.remove('navbar-transparent');
                    navbar.classList.add('navbar-scrolled');
                    navbar.style.background = 'rgba(45, 51, 23, 0.95)';
                    navbar.style.backdropFilter = 'blur(20px)';
                    navbar.style.border = '1px solid rgba(114, 116, 68, 0.3)';
                    navbar.style.boxShadow = '0 4px 20px rgba(0, 0, 0, 0.2), inset 0 1px 0 rgba(114, 116, 68, 0.3), 0 0 30px rgba(45, 51, 23, 0.2)';
                } else {
                    navbar.classList.remove('navbar-scrolled');
                    navbar.classList.add('navbar-transparent');
                    navbar.style.background = 'transparent';
                    navbar.style.backdropFilter = 'none';
                    navbar.style.border = 'none';
                    navbar.style.boxShadow = 'none';
                }
            }
            
            // Listen for scroll events with throttle for performance
            let scrollTimeout;
            window.addEventListener('scroll', function() {
                if (scrollTimeout) {
                    window.cancelAnimationFrame(scrollTimeout);
                }
                scrollTimeout = window.requestAnimationFrame(function() {
                    handleScroll();
                });
            });
            
            // Initial check after a short delay
            setTimeout(handleScroll, 100);
        });
    </script>
    
    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    
    <!-- Initialize AOS -->
    <script>
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true,
            offset: 50
        });
    </script>
    
    <!-- Page Loader Script -->
    <script>
        // Loader initialization with first visit detection
        (function() {
            const loader = document.getElementById('pageLoader');
            const body = document.body;
            const logoImage = loader.querySelector('.logo-image');
            
            // Check if this is the first visit in this session
            const isFirstVisit = !sessionStorage.getItem('sakanta_visited');
            
            // If not first visit, hide loader immediately
            if (!isFirstVisit) {
                if (loader) {
                    loader.style.display = 'none';
                    body.classList.remove('loading');
                }
                return;
            }
            
            // Mark as visited for this session
            sessionStorage.setItem('sakanta_visited', 'true');
            
            // Minimum loading time (3 seconds) for better visual experience
            const minLoadTime = 3000;
            const startTime = performance.now();
            
            let isPageLoaded = false;
            let loaderHidden = false;
            
            // Preload logo image
            if (logoImage) {
                logoImage.addEventListener('error', function() {
                    console.warn('Failed to load Sakanta logo');
                });
                
                logoImage.addEventListener('load', function() {
                    logoImage.classList.add('loaded');
                });
            }
            
            function hideLoader() {
                if (loaderHidden) return;
                loaderHidden = true;
                
                const elapsedTime = performance.now() - startTime;
                const remainingTime = Math.max(0, minLoadTime - elapsedTime);
                
                setTimeout(() => {
                    if (loader) {
                        loader.classList.add('hidden');
                        body.classList.remove('loading');
                        
                        // Enable scroll restoration
                        if ('scrollRestoration' in history) {
                            history.scrollRestoration = 'auto';
                        }
                        
                        // Remove loader from DOM after animation
                        setTimeout(() => {
                            if (loader && loader.parentNode) {
                                loader.parentNode.removeChild(loader);
                            }
                        }, 800);
                    }
                }, remainingTime);
            }
            
            // Check if page is already loaded
            function checkPageReady() {
                if (document.readyState === 'complete') {
                    isPageLoaded = true;
                    hideLoader();
                }
            }
            
            // Multiple event listeners for comprehensive loading detection
            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', function() {
                    setTimeout(checkPageReady, 200);
                });
            } else {
                checkPageReady();
            }
            
            window.addEventListener('load', function() {
                isPageLoaded = true;
                hideLoader();
            });
            
            // Fallback: Hide loader after maximum 7 seconds
            setTimeout(() => {
                if (!loaderHidden) {
                    console.warn('Loader timeout reached, forcing hide');
                    hideLoader();
                }
            }, 7000);
            
            // Handle page navigation (for SPA-like behavior)
            window.addEventListener('beforeunload', function() {
                if (loader && !loader.classList.contains('hidden')) {
                    loader.style.display = 'none';
                }
            });
            
            // Disable scroll restoration while loader is active
            if ('scrollRestoration' in history) {
                history.scrollRestoration = 'manual';
            }
        })();

        // Prevent back button to access protected pages after logout
        (function() {
            // Force reload from server when page is loaded from cache (back/forward button)
            if (performance.navigation.type === 2 || performance.getEntriesByType('navigation')[0]?.type === 'back_forward') {
                // Page accessed via back/forward button - force reload from server
                window.location.reload(true);
            }

            @guest
            // User is not logged in - completely prevent back navigation
            window.history.forward();
            window.onunload = function() { null };
            @endguest
        })();

        @auth
        // Handle logout - use AJAX to prevent history issues
        const logoutForm = document.getElementById('logoutForm');
        const logoutFormMobile = document.getElementById('logoutFormMobile');
        
        function handleLogout(e) {
            e.preventDefault();
            
            const form = e.target;
            const formData = new FormData(form);
            
            fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            }).then(() => {
                // Clear all storage
                sessionStorage.clear();
                localStorage.clear();
                
                // Use replace to prevent back navigation
                window.location.replace('{{ route("auth.intro") }}');
            }).catch(() => {
                // Even on error, redirect to intro
                window.location.replace('{{ route("auth.intro") }}');
            });
            
            return false;
        }
        
        if (logoutForm) {
            logoutForm.addEventListener('submit', handleLogout);
        }
        
        if (logoutFormMobile) {
            logoutFormMobile.addEventListener('submit', handleLogout);
        }
        @endauth
    </script>
    
    @stack('scripts')
</body>
</html>


