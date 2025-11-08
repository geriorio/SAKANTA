<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $property->title }} - SAKANTA</title>
    
    <!-- Google Fonts - Work Sans -->
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

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Esther', 'Georgia', serif;
            color: #2c3e50;
            background: #F7EFE2;
        }
        
        /* Apply Work Sans to all buttons */
        button, .btn, [type="submit"], a[class*="btn"] {
            font-family: 'Work Sans', sans-serif !important;
        }

        /* ===== SECTION 1: HERO WITH OVERLAY TEXT ===== */
        .hero-property {
            height: 100vh;
            background-size: cover;
            background-position: center;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            padding-left: 80px;
        }

        .hero-property::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.3);
        }

        .hero-content {
            position: relative;
            z-index: 2;
            color: white;
            max-width: 600px;
        }

        .hero-content h1 {
            font-size: 56px;
            font-weight: 400;
            line-height: 1.2;
            margin-bottom: 30px;
        }

        .hero-content p {
            font-size: 20px;
            line-height: 1.6;
            margin-bottom: 40px;
            opacity: 0.95;
        }

        .view-gallery-btn {
            display: inline-block;
            padding: 15px 35px;
            background: #064852;
            color: white;
            text-decoration: none;
            font-size: 13px;
            letter-spacing: 2px;
            text-transform: uppercase;
            font-weight: 600;
            transition: all 0.3s;
            border-radius: 3px;
            font-family: 'Work Sans', sans-serif;
        }

        .view-gallery-btn:hover {
            background: #1a3f5f;
            transform: translateY(-2px);
        }

        /* ===== SECTION 2: PROPERTY INFO ===== */
        .property-info-section {
            background: #F7EFE2;
            padding: 80px 80px 60px;
        }

        .property-info-container {
            max-width: 1400px;
            margin: 0 auto;
            position: relative;
        }

        .property-title-row {
            margin-bottom: 60px;
        }

        .property-content-row {
            display: grid;
            grid-template-columns: 280px 1fr;
            gap: 80px;
            position: relative;
        }

        .property-left-column {
            /* Left column for facilities and surroundings */
        }

        .property-right-column {
            position: relative;
        }

        /* Decorative Diamond Icon - Top Right */
        .property-right-column::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 120px;
            height: 120px;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M 20 50 L 50 20 L 80 50 L 50 80 Z' stroke='%23064852' stroke-width='1' fill='none'/%3E%3Cpath d='M 35 50 L 50 35 L 65 50 L 50 65 Z' stroke='%23064852' stroke-width='1' fill='none'/%3E%3C/svg%3E");
            background-size: contain;
            background-repeat: no-repeat;
            opacity: 0.1;
            pointer-events: none;
        }

        /* Left Column - Title, Subtitle, Price, Details */
        .property-main-info h2 {
            font-size: 42px;
            font-weight: 400;
            color: #064852;
            margin-bottom: 15px;
            line-height: 1.2;
        }

        .property-subtitle {
            font-size: 16px;
            font-weight: 400;
            color: #5a8aaa;
            margin-bottom: 20px;
            font-style: italic;
            line-height: 1.4;
        }

        .property-price {
            font-size: 26px;
            font-weight: 600;
            color: #064852;
            margin-bottom: 40px;
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 0;
        }

        .ownership-separator {
            font-size: 26px;
            font-weight: 600;
            color: #064852;
            margin: 0 15px;
        }

        .property-ownership {
            font-size: 26px;
            font-weight: 600;
            color: #064852;
        }

        .property-details-list {
            display: flex;
            flex-direction: column;
            gap: 0;
        }

        .detail-item {
            padding: 12px 0;
            border-bottom: 1px solid rgba(6, 72, 82, 0.15);
        }

        .detail-item:first-child {
            padding-top: 0;
        }

        .detail-item strong {
            display: block;
            font-size: 10px;
            font-weight: 700;
            color: #5a8aaa;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-bottom: 4px;
            font-family: 'Work Sans', sans-serif;
        }

        .detail-item span {
            font-size: 14px;
            color: #064852;
            line-height: 1.6;
            font-family: 'Work Sans', sans-serif;
            font-weight: 400;
        }

        /* Right Column Content */
        .property-right-content {
            padding-right: 140px;
        }

        .property-specs-list {
            font-size: 14px;
            color: #064852;
            line-height: 1.5;
            margin-bottom: 8px;
            font-family: 'Work Sans', sans-serif;
        }

        .property-specs-detail {
            font-size: 14px;
            color: #064852;
            line-height: 1.8;
            margin-bottom: 12px;
            font-family: 'Work Sans', sans-serif;
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 8px;
        }

        .spec-item {
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .spec-item svg {
            flex-shrink: 0;
            vertical-align: middle;
        }

        .spec-separator {
            color: #064852;
            opacity: 0.3;
            font-weight: 300;
        }

        .property-airport-distance {
            font-size: 14px;
            color: #064852;
            margin-bottom: 12px;
            font-family: 'Work Sans', sans-serif;
            display: flex;
            align-items: center;
        }

        .property-address {
            font-size: 14px;
            color: #064852;
            margin-bottom: 12px;
            font-family: 'Work Sans', sans-serif;
            display: flex;
            align-items: flex-start;
            line-height: 1.6;
        }

        .check-maps-btn {
            display: inline-block;
            padding: 8px 18px;
            border: 2px solid #064852;
            color: #064852;
            text-decoration: none;
            font-size: 10px;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            transition: all 0.3s;
            margin-bottom: 30px;
            font-family: 'Work Sans', sans-serif;
            font-weight: 600;
        }

        .check-maps-btn:hover {
            background: #064852;
            color: white;
        }

        /* Property Description */
        .property-description-right {
            margin-top: 25px;
            font-size: 14px;
            line-height: 1.7;
            color: #064852;
            font-family: 'Work Sans', sans-serif;
            font-weight: 400;
        }

        /* Perfect For Section - Horizontal Grid */
        .perfect-for-horizontal {
            margin-top: 60px;
            padding-top: 60px;
            border-top: 1px solid rgba(6, 72, 82, 0.1);
        }

        .perfect-for-horizontal-container {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 3fr;
            gap: 40px;
            align-items: start;
        }

        .perfect-for-title {
            font-size: 14px;
            font-weight: 600;
            color: #064852;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-family: 'Work Sans', sans-serif;
        }

        .perfect-for-content {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            font-size: 14px;
            line-height: 1.7;
            color: #064852;
            font-family: 'Work Sans', sans-serif;
            font-weight: 400;
        }

        .perfect-for-item {
            font-size: 14px;
            line-height: 1.7;
            color: #064852;
            position: relative;
            padding-left: 18px;
        }

        .perfect-for-item:before {
            content: "•";
            position: absolute;
            left: 0;
            font-size: 20px;
            line-height: 1.4;
        }

        /* Additional Photos Section */
        .additional-photos-section {
            margin-top: 60px;
            padding-top: 60px;
            border-top: 1px solid rgba(6, 72, 82, 0.1);
        }

        .additional-photos-container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .additional-photos-title {
            font-size: 14px;
            font-weight: 600;
            color: #064852;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 30px;
            font-family: 'Work Sans', sans-serif;
        }

        .photos-grid {
            display: grid;
            grid-template-columns: repeat(12, 1fr);
            gap: 15px;
            margin-bottom: 30px;
        }

        .photo-item {
            position: relative;
            overflow: hidden;
            border-radius: 12px;
            transition: all 0.3s ease;
            cursor: pointer;
            background: #F7EFE2;
            height: 280px;
        }

        .photo-item.hidden-photo {
            display: none;
        }

        /* Layout dengan tinggi sama, lebar berbeda - lumayan kotak */
        
        /* Baris 1 */
        .photo-item:nth-child(1) {
            grid-column: span 5;
        }

        .photo-item:nth-child(2) {
            grid-column: span 4;
        }

        .photo-item:nth-child(3) {
            grid-column: span 3;
        }

        /* Baris 2 */
        .photo-item:nth-child(4) {
            grid-column: span 3;
        }

        .photo-item:nth-child(5) {
            grid-column: span 4;
        }

        .photo-item:nth-child(6) {
            grid-column: span 5;
        }

        /* Baris 3 */
        .photo-item:nth-child(7) {
            grid-column: span 4;
        }

        .photo-item:nth-child(8) {
            grid-column: span 3;
        }

        .photo-item:nth-child(9) {
            grid-column: span 5;
        }

        /* Pattern untuk foto selanjutnya (setelah view more) */
        .photo-item:nth-child(10) {
            grid-column: span 5;
        }

        .photo-item:nth-child(11) {
            grid-column: span 4;
        }

        .photo-item:nth-child(12) {
            grid-column: span 3;
        }

        .photo-item:nth-child(13) {
            grid-column: span 3;
        }

        .photo-item:nth-child(14) {
            grid-column: span 5;
        }

        .photo-item:nth-child(15) {
            grid-column: span 4;
        }

        .photo-item:nth-child(n+16) {
            grid-column: span 4;
        }

        .photo-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.3s ease;
        }

        .photo-item:hover img {
            transform: scale(1.05);
        }

        .view-more-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 12px 30px;
            background: transparent;
            border: 2px solid #064852;
            color: #064852;
            font-family: 'Work Sans', sans-serif;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            cursor: pointer;
            transition: all 0.3s;
            margin: 0 auto;
            border-radius: 3px;
        }

        .view-more-btn:hover {
            background: #064852;
            color: white;
        }

        .view-more-btn #btnIcon {
            transition: transform 0.3s;
        }

        .view-more-btn.expanded #btnIcon {
            transform: rotate(180deg);
        }

        /* Lightbox Modal */
        .lightbox-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.95);
            z-index: 9999;
            align-items: center;
            justify-content: center;
        }

        .lightbox-modal.active {
            display: flex;
        }

        .lightbox-content {
            position: relative;
            max-width: 90vw;
            max-height: 90vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .lightbox-image {
            max-width: 100%;
            max-height: 90vh;
            object-fit: contain;
            border-radius: 8px;
        }

        .lightbox-close {
            position: absolute;
            top: 20px;
            right: 30px;
            font-size: 50px;
            color: white;
            cursor: pointer;
            background: none;
            border: none;
            transition: transform 0.3s;
            z-index: 10000;
            line-height: 1;
            font-weight: 300;
        }

        .lightbox-close:hover {
            transform: scale(1.1);
        }

        .lightbox-prev,
        .lightbox-next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            font-size: 50px;
            color: white;
            cursor: pointer;
            background: rgba(6, 72, 82, 0.5);
            border: none;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
            font-weight: 300;
        }

        .lightbox-prev:hover,
        .lightbox-next:hover {
            background: rgba(6, 72, 82, 0.8);
        }

        .lightbox-prev {
            left: 30px;
        }

        .lightbox-next {
            right: 30px;
        }

        .lightbox-counter {
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            color: white;
            font-family: 'Work Sans', sans-serif;
            font-size: 16px;
            background: rgba(0, 0, 0, 0.5);
            padding: 8px 20px;
            border-radius: 20px;
        }

        .lightbox-info {
            position: absolute;
            bottom: 80px;
            left: 50%;
            transform: translateX(-50%);
            color: white;
            font-family: 'Work Sans', sans-serif;
            text-align: center;
            background: rgba(0, 0, 0, 0.7);
            padding: 20px 30px;
            border-radius: 12px;
            max-width: 600px;
            width: 90%;
        }

        .lightbox-info h3 {
            font-family: 'Esther', serif;
            font-size: 24px;
            margin: 0 0 10px 0;
            color: white;
        }

        .lightbox-info p {
            font-size: 14px;
            margin: 0;
            color: rgba(255, 255, 255, 0.9);
            line-height: 1.6;
        }

        /* Map Section */
        .map-section {
            margin-top: 60px;
            padding-top: 60px;
            border-top: 1px solid rgba(6, 72, 82, 0.1);
            scroll-margin-top: 100px;
        }

        .map-container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .map-title {
            font-size: 14px;
            font-weight: 600;
            color: #064852;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 30px;
            font-family: 'Work Sans', sans-serif;
        }

        .map-wrapper {
            margin-bottom: 20px;
            box-shadow: 0 4px 20px rgba(6, 72, 82, 0.1);
            border-radius: 12px;
            overflow: hidden;
        }

        .map-address {
            font-size: 14px;
            color: #064852;
            font-family: 'Work Sans', sans-serif;
            font-weight: 400;
            display: flex;
            align-items: center;
            padding: 15px 0;
        }
        .section5 {
            min-height: 100vh;
            display: flex;
            align-items: center;
            background: #F7EFE2;
            padding: 100px 80px;
        }

        .section5-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 100px;
            align-items: center;
        }

        .section5-image {
            position: relative;
        }

        .section5-image img {
            width: 100%;
            max-width: 500px;
            height: auto;
            border-radius: 15px;
        }

        .section5-content h2 {
            font-size: 44px;
            font-weight: 400;
            line-height: 1.3;
            margin-bottom: 30px;
            color: #064852;
            font-family: 'Esther', serif;
        }

        .section5-content p {
            font-size: 16px;
            line-height: 1.8;
            color: #064852;
            margin-bottom: 20px;
            font-family: 'Work Sans', sans-serif;
        }

        .section5-content p:first-of-type {
            margin-bottom: 25px;
        }

        .section5-content .cta-button {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 30px;
            background: transparent;
            color: #064852;
            text-decoration: none;
            border-radius: 3px;
            font-family: 'Work Sans', sans-serif;
            font-weight: 600;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            transition: all 0.3s;
            border: 2px solid #064852;
        }

        .section5-content .cta-button:hover {
            background: #064852;
            color: white;
        }

        /* Section 6 - Reversed Layout */
        .section6 {
            min-height: 100vh;
            display: flex;
            align-items: center;
            background: #F7EFE2;
            padding: 100px 80px;
        }

        .section6-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 100px;
            align-items: center;
        }

        .section6-content h2 {
            font-size: 44px;
            font-weight: 400;
            line-height: 1.3;
            margin-bottom: 30px;
            color: #064852;
            font-family: 'Esther', serif;
        }

        .section6-content p {
            font-size: 16px;
            line-height: 1.8;
            color: #064852;
            margin-bottom: 20px;
            font-family: 'Work Sans', sans-serif;
        }

        .section6-content p:first-of-type {
            margin-bottom: 25px;
        }

        .section6-content .cta-button {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 30px;
            background: transparent;
            color: #064852;
            text-decoration: none;
            border-radius: 3px;
            font-family: 'Work Sans', sans-serif;
            font-weight: 600;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            transition: all 0.3s;
            border: 2px solid #064852;
        }

        .section6-content .cta-button:hover {
            background: #064852;
            color: white;
        }

        .section6-image {
            position: relative;
        }

        .section6-image img {
            width: 100%;
            max-width: 500px;
            height: auto;
            border-radius: 15px;
            margin-left: auto;
            display: block;
        }

        /* Related Properties Section */
        .related-properties-section {
            margin-top: 60px;
            padding-top: 60px;
            border-top: 1px solid rgba(6, 72, 82, 0.1);
        }

        .related-properties-container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .related-properties-title {
            font-size: 14px;
            font-weight: 600;
            color: #064852;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 40px;
            font-family: 'Work Sans', sans-serif;
        }

        .related-properties-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 30px;
        }

        .related-property-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 2px 10px rgba(6, 72, 82, 0.08);
            text-decoration: none;
            color: inherit;
            display: block;
        }

        .related-property-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(6, 72, 82, 0.15);
        }

        .related-property-image {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }

        .related-property-content {
            padding: 20px;
        }

        .related-property-title {
            font-size: 18px;
            font-weight: 600;
            color: #064852;
            margin-bottom: 8px;
            font-family: 'Work Sans', sans-serif;
        }

        .related-property-location {
            font-size: 13px;
            color: #5a8aaa;
            margin-bottom: 12px;
            font-family: 'Work Sans', sans-serif;
        }

        .related-property-specs {
            font-size: 12px;
            color: #666;
            margin-bottom: 12px;
            font-family: 'Work Sans', sans-serif;
            display: flex;
            align-items: center;
            gap: 6px;
            flex-wrap: wrap;
        }

        .related-property-specs .spec-item {
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        .related-property-specs .spec-item svg {
            flex-shrink: 0;
            vertical-align: middle;
        }

        .related-property-specs .spec-separator {
            color: #666;
            opacity: 0.4;
            font-weight: 300;
        }

        .related-property-price {
            font-size: 20px;
            font-weight: 600;
            color: #064852;
            font-family: 'Work Sans', sans-serif;
        }

        /* Property Features Carousel */
        .property-features {
            margin-top: 50px;
        }

        .carousel-title {
            font-size: 14px;
            font-weight: 600;
            color: #064852;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 20px;
            font-family: 'Work Sans', sans-serif;
        }

        .feature-carousel {
            position: relative;
            overflow: hidden;
            width: 100%;
            min-height: 150px;
        }

        .feature-carousel-wrapper {
            display: flex;
            transition: transform 0.5s ease;
            width: 100%;
        }

        .feature-slide {
            min-width: 100%;
            width: 100%;
            flex-shrink: 0;
            box-sizing: border-box;
            padding: 5px 0;
        }

        .feature-item {
            display: flex;
            gap: 18px;
            align-items: flex-start;
            width: 100%;
            box-sizing: border-box;
        }

        .feature-icon {
            width: 120px;
            height: 120px;
            flex-shrink: 0;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(6, 72, 82, 0.1);
        }

        .feature-icon img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .feature-text {
            flex: 1;
            min-width: 0;
            padding-right: 10px;
        }

        .feature-text h3 {
            font-size: 18px;
            font-weight: 600;
            color: #064852;
            margin-bottom: 8px;
            font-family: 'Work Sans', sans-serif;
            line-height: 1.3;
            word-wrap: break-word;
            overflow-wrap: break-word;
        }

        .feature-text p {
            font-size: 13px;
            color: #064852;
            line-height: 1.6;
            font-family: 'Work Sans', sans-serif;
            word-wrap: break-word;
            overflow-wrap: break-word;
            white-space: normal;
        }

        .carousel-controls {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }

        .carousel-btn {
            width: 40px;
            height: 40px;
            border: 2px solid #064852;
            background: transparent;
            color: #064852;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
            font-size: 20px;
        }

        .carousel-btn:hover {
            background: #064852;
            color: white;
        }

        .carousel-btn:disabled {
            opacity: 0.3;
            cursor: not-allowed;
        }



        /* Responsive */
        @media (max-width: 1024px) {
            .property-content-row {
                grid-template-columns: 1fr;
                gap: 60px;
            }

            .hero-property {
                padding-left: 40px;
                padding-bottom: 60px;
            }

            .property-info-section {
                padding: 60px 40px;
            }

            .section5-container,
            .section6-container {
                grid-template-columns: 1fr;
                gap: 60px;
            }

            .section6-image img {
                margin-left: 0;
            }

            .photos-grid {
                grid-template-columns: repeat(6, 1fr);
                gap: 12px;
            }

            .photo-item {
                height: 200px;
            }

            /* Baris 1 - 2 foto besar */
            .photo-item:nth-child(1),
            .photo-item:nth-child(2) {
                grid-column: span 3;
            }

            /* Baris 2 - 3 foto sedang */
            .photo-item:nth-child(3),
            .photo-item:nth-child(4),
            .photo-item:nth-child(5) {
                grid-column: span 2;
            }

            /* Baris 3 - 3 foto sedang */
            .photo-item:nth-child(6),
            .photo-item:nth-child(7),
            .photo-item:nth-child(8) {
                grid-column: span 2;
            }

            /* Foto selanjutnya 2 kolom */
            .photo-item:nth-child(n+9) {
                grid-column: span 3;
            }

            .lightbox-prev {
                left: 10px;
            }

            .lightbox-next {
                right: 10px;
            }

            .perfect-for-horizontal-container {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .perfect-for-content {
                grid-template-columns: repeat(2, 1fr);
            }

            .related-properties-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 20px;
            }

            .feature-icon {
                width: 100px;
                height: 100px;
            }

            .feature-text h3 {
                font-size: 16px;
            }

            .feature-text p {
                font-size: 12px;
            }
        }

        @media (max-width: 768px) {
            .hero-property {
                padding-left: 30px;
                padding-right: 30px;
                padding-bottom: 50px;
                height: 70vh;
            }

            .hero-content h1 {
                font-size: 32px;
            }

            .hero-content p {
                font-size: 15px;
            }

            .property-info-section {
                padding: 50px 30px;
            }

            /* Mobile: Reorder - Specs first, then Facilities/Surroundings */
            .property-content-row {
                display: flex;
                flex-direction: column;
                gap: 40px;
            }

            .property-right-column {
                order: 1;
            }

            .property-left-column {
                order: 2;
            }

            .property-right-column::before {
                display: none;
            }

            .property-right-content {
                padding-right: 0;
            }

            .section5,
            .section6 {
                padding: 60px 30px;
            }

            .section5-content h2,
            .section6-content h2 {
                font-size: 28px;
            }

            .section5-content p,
            .section6-content p {
                font-size: 14px;
            }

            .property-title-row {
                margin-bottom: 40px;
            }

            .property-main-info h2 {
                font-size: 28px;
            }

            .property-price {
                font-size: 20px;
                flex-wrap: wrap;
            }

            .ownership-separator {
                font-size: 20px;
                margin: 0 8px;
            }

            .property-ownership {
                font-size: 20px;
            }

            .property-specs-detail {
                font-size: 13px;
                gap: 6px;
                flex-wrap: wrap;
            }

            .spec-item svg {
                width: 15px;
                height: 15px;
            }

            /* Photos Grid - Responsif 2 kolom di tablet */
            .photos-grid {
                grid-template-columns: repeat(6, 1fr);
                gap: 12px;
            }

            .photo-item {
                height: 200px;
            }

            /* Baris 1 - 2 foto besar */
            .photo-item:nth-child(1),
            .photo-item:nth-child(2) {
                grid-column: span 3;
            }

            /* Baris 2 - 3 foto sedang */
            .photo-item:nth-child(3),
            .photo-item:nth-child(4),
            .photo-item:nth-child(5) {
                grid-column: span 2;
            }

            /* Baris 3 - 3 foto sedang */
            .photo-item:nth-child(6),
            .photo-item:nth-child(7),
            .photo-item:nth-child(8) {
                grid-column: span 2;
            }

            /* Foto selanjutnya 2 kolom */
            .photo-item:nth-child(n+9) {
                grid-column: span 3;
            }

            .lightbox-prev,
            .lightbox-next {
                width: 45px;
                height: 45px;
                font-size: 30px;
            }

            .lightbox-close {
                top: 10px;
                right: 15px;
                font-size: 40px;
            }

            .lightbox-counter {
                bottom: 20px;
                font-size: 14px;
                padding: 6px 15px;
            }

            .lightbox-info {
                bottom: 60px;
                padding: 15px 20px;
            }

            .lightbox-info h3 {
                font-size: 18px;
            }

            .lightbox-info p {
                font-size: 12px;
            }

            .perfect-for-horizontal-container {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            .perfect-for-content {
                grid-template-columns: 1fr;
            }

            .related-properties-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .related-property-image {
                height: 200px;
            }

            .feature-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .feature-icon {
                width: 100%;
                height: 200px;
            }

            .feature-text {
                padding-right: 0;
            }

            .feature-text h3 {
                font-size: 16px;
            }

            .feature-text p {
                font-size: 13px;
            }

            .carousel-btn {
                width: 35px;
                height: 35px;
                font-size: 16px;
            }
        }

        @media (max-width: 480px) {
            .hero-property {
                height: 60vh;
                padding: 20px;
                justify-content: center;
            }

            .hero-content h1 {
                font-size: 24px;
                margin-bottom: 20px;
            }

            .hero-content p {
                font-size: 13px;
            }

            .view-gallery-btn {
                font-size: 11px;
                padding: 12px 25px;
            }

            .property-info-section {
                padding: 40px 20px;
            }

            .property-main-info h2 {
                font-size: 22px;
            }

            .property-subtitle {
                font-size: 13px;
            }

            .property-price,
            .property-ownership {
                font-size: 18px;
            }

            .ownership-separator {
                display: none;
            }

            .property-price {
                flex-direction: column;
                align-items: flex-start;
                gap: 8px;
            }

            .detail-item strong {
                font-size: 9px;
            }

            .detail-item span {
                font-size: 12px;
            }

            .property-specs-list,
            .property-specs-detail,
            .property-airport-distance,
            .property-address,
            .property-description-right {
                font-size: 12px;
            }

            .spec-item svg {
                width: 14px;
                height: 14px;
            }

            .check-maps-btn {
                padding: 8px 16px;
                font-size: 9px;
            }

            /* Photos Grid - 1 kolom untuk mobile kecil */
            .photos-grid {
                grid-template-columns: 1fr;
                gap: 8px;
            }

            .photo-item {
                grid-column: span 1;
                height: 220px;
            }

            .photo-item:nth-child(n+1) {
                grid-column: span 1;
            }

            .view-more-btn {
                font-size: 10px;
                padding: 10px 20px;
            }

            .section5,
            .section6 {
                padding: 50px 20px;
            }

            .section5-content h2,
            .section6-content h2 {
                font-size: 24px;
            }

            .section5-content p,
            .section6-content p {
                font-size: 13px;
            }

            .section5-content .cta-button,
            .section6-content .cta-button {
                font-size: 10px;
                padding: 10px 20px;
            }

            .carousel-title,
            .map-title,
            .additional-photos-title,
            .perfect-for-title,
            .related-properties-title {
                font-size: 12px;
            }

            .lightbox-close {
                font-size: 36px;
                top: 8px;
                right: 12px;
            }

            .lightbox-prev,
            .lightbox-next {
                width: 35px;
                height: 35px;
                font-size: 24px;
            }

            .lightbox-prev {
                left: 8px;
            }

            .lightbox-next {
                right: 8px;
            }

            .lightbox-counter {
                bottom: 15px;
                font-size: 12px;
                padding: 5px 12px;
            }

            .lightbox-info {
                display: none;
            }

            .related-property-title {
                font-size: 16px;
            }

            .related-property-location {
                font-size: 12px;
            }

            .related-property-specs {
                font-size: 11px;
            }

            .related-property-price {
                font-size: 18px;
            }

            .related-property-image {
                height: 180px;
            }

            .feature-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 12px;
            }

            .feature-icon {
                width: 100%;
                height: 180px;
            }

            .feature-text h3 {
                font-size: 15px;
            }

            .feature-text p {
                font-size: 12px;
                line-height: 1.7;
            }

            .carousel-btn {
                width: 35px;
                height: 35px;
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    @include('layouts.navbar-simple')

    <!-- SECTION 1: Hero with Property Image -->
    <section class="hero-property" style="background-image: url('{{ asset($property->main_image ?? '/images/villa1.jpg') }}');">
        <div class="hero-content">
            <h1>{{ $property->title }}@if($property->subtitle),<br>{{ $property->subtitle }}@endif</h1>
            <a href="#" class="view-gallery-btn">VIEW GALLERY</a>
        </div>
    </section>

    <!-- SECTION 2: Property Information -->
    <section class="property-info-section">
        <div class="property-info-container">
            <!-- Title and Price Row (Full Width) -->
            <div class="property-title-row">
                <div class="property-main-info">
                    <h2>{{ $property->title }}</h2>
                    <p class="property-price">
                        {{ $property->formatted_price }}
                        @if($property->ownership)
                            <span class="ownership-separator"> • </span>
                            <span class="property-ownership">{{ $property->ownership }}</span>
                        @endif
                    </p>
                </div>
            </div>

            <!-- Content Row: Left (Facilities/Surroundings) + Right (Specs/Details) -->
            <div class="property-content-row">
                <!-- LEFT COLUMN: Facilities & Surroundings Carousel -->
                <div class="property-left-column">
                    <!-- Facilities Carousel -->
                    @if($property->facilities && is_array($property->facilities) && count($property->facilities) > 0)
                    <div class="property-features">
                        <h4 class="carousel-title">Facilities</h4>
                        <div class="feature-carousel" id="facilities-carousel">
                            <div class="feature-carousel-wrapper">
                                @foreach($property->facilities as $index => $facility)
                                <div class="feature-slide">
                                    <div class="feature-item" onclick="openFacilitiesLightbox({{ $index }})" style="cursor: pointer;">
                                        <div class="feature-icon">
                                            <img src="{{ asset($facility['image'] ?? '/images/placeholder.jpg') }}" alt="{{ $facility['name'] ?? 'Facility' }}">
                                        </div>
                                        <div class="feature-text">
                                            <h3>{{ $facility['name'] ?? 'Facility' }}</h3>
                                            <p>{{ $facility['description'] ?? '' }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @if(count($property->facilities) > 1)
                            <div class="carousel-controls">
                                <button class="carousel-btn" onclick="slideFacilities(-1)">‹</button>
                                <button class="carousel-btn" onclick="slideFacilities(1)">›</button>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endif

                    <!-- Surroundings Carousel -->
                    @if($property->surroundings && is_array($property->surroundings) && count($property->surroundings) > 0)
                    <div class="property-features">
                        <h4 class="carousel-title">Surroundings</h4>
                        <div class="feature-carousel" id="surroundings-carousel">
                            <div class="feature-carousel-wrapper">
                                @foreach($property->surroundings as $index => $surrounding)
                                <div class="feature-slide">
                                    <div class="feature-item" onclick="openSurroundingsLightbox({{ $index }})" style="cursor: pointer;">
                                        <div class="feature-icon">
                                            <img src="{{ asset($surrounding['image'] ?? '/images/placeholder.jpg') }}" alt="{{ $surrounding['name'] ?? 'Surrounding' }}">
                                        </div>
                                        <div class="feature-text">
                                            <h3>{{ $surrounding['name'] ?? 'Surrounding' }}</h3>
                                            <p>{{ $surrounding['description'] ?? '' }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @if(count($property->surroundings) > 1)
                            <div class="carousel-controls">
                                <button class="carousel-btn" onclick="slideSurroundings(-1)">‹</button>
                                <button class="carousel-btn" onclick="slideSurroundings(1)">›</button>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endif
                </div>

                <!-- RIGHT COLUMN: Specs, Address, Button, Description -->
                <div class="property-right-column">
                <div class="property-right-content">
                    <p class="property-specs-detail">
                        <!-- Bedrooms -->
                        <span class="spec-item">
                            <img src="{{ asset('images/icons/bedroom.png') }}" alt="Bedroom" style="width: 18px; height: 18px; object-fit: contain;">
                            {{ $property->bedrooms }}
                        </span>
                        
                        <span class="spec-separator">|</span>
                        
                        <!-- Bathrooms -->
                        <span class="spec-item">
                            <img src="{{ asset('images/icons/bathroom.png') }}" alt="Bathroom" style="width: 18px; height: 18px; object-fit: contain;">
                            {{ $property->bathrooms }}
                        </span>
                        
                        <span class="spec-separator">|</span>
                        
                        <!-- Building Size -->
                        <span class="spec-item">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#064852" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 21h18"/>
                                <path d="M5 21V7l8-4v18"/>
                                <path d="M19 21V11l-6-4"/>
                                <rect x="7" y="10" width="2" height="2"/>
                                <rect x="7" y="14" width="2" height="2"/>
                                <rect x="7" y="18" width="2" height="2"/>
                                <rect x="15" y="14" width="2" height="2"/>
                                <rect x="15" y="18" width="2" height="2"/>
                            </svg>
                            {{ number_format($property->building_area, 0) }} FT²
                        </span>
                        
                        <span class="spec-separator">|</span>
                        
                        <!-- Land Size -->
                        <span class="spec-item">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#064852" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="3" width="18" height="18" stroke-dasharray="2 2"/>
                                <path d="M3 3 L8 8 M21 3 L16 8 M3 21 L8 16 M21 21 L16 16"/>
                            </svg>
                            {{ number_format($property->land_area, 0) }} FT²
                        </span>
                        
                        <span class="spec-separator">|</span>
                        
                        <!-- Built Year with Hammer Icon -->
                        <span class="spec-item">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#064852" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/>
                            </svg>
                            {{ $property->built_in ?? 'N/A' }}
                        </span>
                    </p>

                    @if($property->distance_from_airport)
                    <p class="property-airport-distance">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#064852" stroke-width="2" style="vertical-align: middle; margin-right: 8px;">
                            <path d="M21 16v-2l-8-5V3.5c0-.83-.67-1.5-1.5-1.5S10 2.67 10 3.5V9l-8 5v2l8-2.5V19l-2 1.5V22l3.5-1 3.5 1v-1.5L13 19v-5.5l8 2.5z"/>
                        </svg>
                        {{ $property->distance_from_airport }} from airport
                    </p>
                    @endif
                    
                    <p class="property-address">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#064852" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: middle; margin-right: 8px; flex-shrink: 0;">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                            <circle cx="12" cy="10" r="3"/>
                        </svg>
                        {{ $property->address }}, {{ $property->location->name ?? $property->city }}, {{ $property->province }}
                    </p>
                    
                    <a href="#map-section" class="check-maps-btn">CHECK MAPS →</a>

                    @if($property->description)
                    <div class="property-description-right">
                        {!! nl2br(e($property->description)) !!}
                    </div>
                    @endif
                </div>
            </div>
            </div>
        </div>

        <!-- Perfect For Section (Horizontal Grid) -->
        @if($property->perfect_for)
        <div class="perfect-for-horizontal">
            <div class="perfect-for-horizontal-container">
                <h4 class="perfect-for-title">Perfect For</h4>
                <div class="perfect-for-content">
                    @php
                        // Split by line breaks to create items
                        $items = array_filter(array_map('trim', explode("\n", $property->perfect_for)));
                    @endphp
                    @foreach($items as $item)
                        <div class="perfect-for-item">{{ $item }}</div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif

        <!-- Additional Photos Section -->
        @if($property->images && count($property->images) > 0)
        <div class="additional-photos-section">
            <div class="additional-photos-container">                
                <div class="photos-grid" id="photosGrid">
                    @foreach($property->images as $index => $photo)
                        <div class="photo-item" data-index="{{ $index }}" onclick="openLightbox({{ $index }})">
                            <img src="{{ asset($photo) }}" alt="Property Photo {{ $index + 1 }}">
                        </div>
                    @endforeach
                </div>

                <button class="view-more-btn" id="viewMoreBtn" onclick="togglePhotos()" style="display: none;">
                    <span id="btnText">View More</span>
                    <span id="btnIcon">↓</span>
                </button>
            </div>
        </div>

        <!-- Lightbox Modal -->
        <div class="lightbox-modal" id="lightboxModal" onclick="closeLightbox(event)">
            <button class="lightbox-close" onclick="closeLightbox()">&times;</button>
            <button class="lightbox-prev" onclick="changeLightboxImage(-1); event.stopPropagation();">‹</button>
            <div class="lightbox-content">
                <img class="lightbox-image" id="lightboxImage" src="" alt="Property Photo">
            </div>
            <button class="lightbox-next" onclick="changeLightboxImage(1); event.stopPropagation();">›</button>
            <div class="lightbox-counter" id="lightboxCounter"></div>
        </div>

        <!-- Facilities Lightbox Modal -->
        <div class="lightbox-modal" id="facilitiesLightboxModal" onclick="closeFacilitiesLightbox(event)">
            <button class="lightbox-close" onclick="closeFacilitiesLightbox()">&times;</button>
            <button class="lightbox-prev" onclick="changeFacilitiesLightbox(-1); event.stopPropagation();">‹</button>
            <div class="lightbox-content">
                <img class="lightbox-image" id="facilitiesLightboxImage" src="" alt="Facility Photo">
                <div class="lightbox-info">
                    <h3 id="facilitiesLightboxTitle"></h3>
                    <p id="facilitiesLightboxDescription"></p>
                </div>
            </div>
            <button class="lightbox-next" onclick="changeFacilitiesLightbox(1); event.stopPropagation();">›</button>
            <div class="lightbox-counter" id="facilitiesLightboxCounter"></div>
        </div>

        <!-- Surroundings Lightbox Modal -->
        <div class="lightbox-modal" id="surroundingsLightboxModal" onclick="closeSurroundingsLightbox(event)">
            <button class="lightbox-close" onclick="closeSurroundingsLightbox()">&times;</button>
            <button class="lightbox-prev" onclick="changeSurroundingsLightbox(-1); event.stopPropagation();">‹</button>
            <div class="lightbox-content">
                <img class="lightbox-image" id="surroundingsLightboxImage" src="" alt="Surrounding Photo">
                <div class="lightbox-info">
                    <h3 id="surroundingsLightboxTitle"></h3>
                    <p id="surroundingsLightboxDescription"></p>
                </div>
            </div>
            <button class="lightbox-next" onclick="changeSurroundingsLightbox(1); event.stopPropagation();">›</button>
            <div class="lightbox-counter" id="surroundingsLightboxCounter"></div>
        </div>
        @endif

        <!-- Map Section -->
        @if($property->map_embed_url || ($property->latitude && $property->longitude))
        <div class="map-section" id="map-section">
            <div class="map-container">
                <h4 class="map-title">Location</h4>
                
                <div class="map-wrapper">
                    @if($property->map_embed_url)
                        <!-- Google Maps Embed -->
                        <iframe 
                            src="{{ $property->map_embed_url }}" 
                            width="100%" 
                            height="500" 
                            style="border:0; border-radius: 12px;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    @elseif($property->latitude && $property->longitude)
                        <!-- Google Maps dengan koordinat -->
                        <iframe 
                            src="https://maps.google.com/maps?q={{ $property->latitude }},{{ $property->longitude }}&t=&z=15&ie=UTF8&iwloc=&output=embed" 
                            width="100%" 
                            height="500" 
                            style="border:0; border-radius: 12px;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    @endif
                </div>
                
                @if($property->address)
                <div class="map-address">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#064852" stroke-width="2" style="vertical-align: middle; margin-right: 8px;">
                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                        <circle cx="12" cy="10" r="3"></circle>
                    </svg>
                    {{ $property->address }}, {{ $property->location->name ?? $property->city }}, {{ $property->province }}
                </div>
                @endif
            </div>
        </div>
        @endif

                <!-- Section 5 -->
        <section class="section5">
            <div class="section5-container">
                <div class="section5-image">
                    <img src="/images/home section 2.jpg" alt="Sakanta Villa">
                </div>
                <div class="section5-content">
                    <h2>Ready to make it yours?</h2>
                    <p>Every Sakanta home begins with a conversation.
                    Our team will guide you through ownership details, legal clarity, and experience design — so you can see how your next sanctuary fits into your lifestyle.
                    </p>
                    <a href="https://wa.me/6281234567890?text=Hi%20Sakanta,%20I%20want%20to%20buy%20this%20luxury%20villa" target="_blank" class="cta-button">Book A Private Call</a>
                </div>
            </div>
        </section>

        <!-- Section 6 - Reversed Layout -->
        <section class="section6">
            <div class="section6-container">
                <div class="section6-content">
                    <h2>Still curious about how Sakanta works?</h2>
                    <p>Behind every Sakanta home is a story — of shared ownership, thoughtful management, and people who value serenity as much as you do.
                        From how we structure ownership to how stays are scheduled, each step is designed for peace of mind and effortless belonging.</p>
                    <a href="{{ route('faq') }}" class="cta-button">Explore the Full Story</a>
                </div>
                <div class="section6-image">
                    <img src="/images/home section 2.jpg" alt="Sakanta Property">
                </div>
            </div>
        </section>

        <!-- Related Properties Section -->
        @if(isset($relatedProperties) && $relatedProperties->count() > 0)
        <div class="related-properties-section">
            <div class="related-properties-container">
                <h4 class="related-properties-title">Similar Properties</h4>
                
                <div class="related-properties-grid">
                    @foreach($relatedProperties as $relatedProperty)
                    <a href="{{ route('property.detail', $relatedProperty->slug) }}" class="related-property-card">
                        <img src="{{ asset($relatedProperty->main_image ?? '/images/placeholder.jpg') }}" 
                             alt="{{ $relatedProperty->title }}" 
                             class="related-property-image">
                        
                        <div class="related-property-content">
                            <h5 class="related-property-title">{{ $relatedProperty->title }}</h5>
                            <p class="related-property-location">
                                {{ $relatedProperty->location->name ?? $relatedProperty->city }}
                            </p>
                            <p class="related-property-specs">
                                <!-- Bedrooms -->
                                <span class="spec-item">
                                    <img src="{{ asset('images/icons/bedroom.png') }}" alt="Bedroom" style="width: 16px; height: 16px; object-fit: contain;">
                                    {{ $relatedProperty->bedrooms }}
                                </span>
                                <span class="spec-separator">|</span>
                                <!-- Bathrooms -->
                                <span class="spec-item">
                                    <img src="{{ asset('images/icons/bathroom.png') }}" alt="Bathroom" style="width: 16px; height: 16px; object-fit: contain;">
                                    {{ $relatedProperty->bathrooms }}
                                </span>
                                <span class="spec-separator">|</span>
                                <!-- Building Size -->
                                <span class="spec-item">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#064852" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M3 21h18"/>
                                        <path d="M5 21V7l8-4v18"/>
                                        <path d="M19 21V11l-6-4"/>
                                        <rect x="7" y="10" width="2" height="2"/>
                                        <rect x="7" y="14" width="2" height="2"/>
                                        <rect x="7" y="18" width="2" height="2"/>
                                        <rect x="15" y="14" width="2" height="2"/>
                                        <rect x="15" y="18" width="2" height="2"/>
                                    </svg>
                                    {{ number_format($relatedProperty->building_area, 0) }} FT²
                                </span>
                                <span class="spec-separator">|</span>
                                <!-- Land Size -->
                                <span class="spec-item">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#064852" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/>
                                        <line x1="3" y1="9" x2="21" y2="9"/>
                                        <line x1="9" y1="21" x2="9" y2="9"/>
                                    </svg>
                                    {{ number_format($relatedProperty->land_area, 0) }} m²
                                </span>
                            </p>
                            <p class="related-property-price">{{ $relatedProperty->formatted_price }}</p>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
        @endif
    </section>

    @include('layouts.footer')

    <script>
        // Facilities Carousel
        let facilitiesIndex = 0;
        const facilitiesCarousel = document.querySelector('#facilities-carousel .feature-carousel-wrapper');
        const facilitiesSlides = facilitiesCarousel ? facilitiesCarousel.children.length : 0;

        function slideFacilities(direction) {
            facilitiesIndex += direction;
            if (facilitiesIndex < 0) facilitiesIndex = facilitiesSlides - 1;
            if (facilitiesIndex >= facilitiesSlides) facilitiesIndex = 0;
            facilitiesCarousel.style.transform = `translateX(-${facilitiesIndex * 100}%)`;
        }

        // Surroundings Carousel
        let surroundingsIndex = 0;
        const surroundingsCarousel = document.querySelector('#surroundings-carousel .feature-carousel-wrapper');
        const surroundingsSlides = surroundingsCarousel ? surroundingsCarousel.children.length : 0;

        function slideSurroundings(direction) {
            surroundingsIndex += direction;
            if (surroundingsIndex < 0) surroundingsIndex = surroundingsSlides - 1;
            if (surroundingsIndex >= surroundingsSlides) surroundingsIndex = 0;
            surroundingsCarousel.style.transform = `translateX(-${surroundingsIndex * 100}%)`;
        }

        // Property Images for Lightbox
        const propertyImages = [
            @foreach($property->images as $photo)
                "{{ asset($photo) }}",
            @endforeach
        ];

        let currentLightboxIndex = 0;

        // Toggle Additional Photos
        function togglePhotos() {
            const btn = document.getElementById('viewMoreBtn');
            const btnText = document.getElementById('btnText');
            const allPhotos = document.querySelectorAll('.photo-item');
            
            const isExpanded = btn.classList.contains('expanded');
            const threshold = getPhotoThreshold();
            
            if (isExpanded) {
                // Hide photos beyond threshold
                allPhotos.forEach((photo, index) => {
                    if (index >= threshold) {
                        photo.classList.add('hidden-photo');
                    }
                });
                btnText.textContent = 'View More';
                btn.classList.remove('expanded');
                // Scroll to photos section
                document.querySelector('.additional-photos-section').scrollIntoView({ behavior: 'smooth', block: 'start' });
            } else {
                // Show all photos
                allPhotos.forEach(photo => {
                    photo.classList.remove('hidden-photo');
                });
                btnText.textContent = 'View Less';
                btn.classList.add('expanded');
            }
        }

        // Get photo threshold based on screen size
        function getPhotoThreshold() {
            const width = window.innerWidth;
            if (width <= 480) {
                return 6; // Mobile: 1 column, show 6 photos
            } else if (width <= 768) {
                return 8; // Tablet: 2-3 columns, show 8 photos
            } else {
                return 6; // Desktop: 12 columns grid, show 6 photos (2 baris x 3 foto)
            }
        }

        // Initialize photos display
        function initializePhotos() {
            const allPhotos = document.querySelectorAll('.photo-item');
            const btn = document.getElementById('viewMoreBtn');
            const threshold = getPhotoThreshold();
            
            // Reset all photos first
            allPhotos.forEach(photo => {
                photo.classList.remove('hidden-photo');
            });
            
            // Hide photos beyond threshold
            allPhotos.forEach((photo, index) => {
                if (index >= threshold) {
                    photo.classList.add('hidden-photo');
                }
            });
            
            // Show button only if there are more photos than threshold
            if (allPhotos.length > threshold) {
                btn.style.display = 'flex';
            } else {
                btn.style.display = 'none';
            }
            
            // Reset button state
            btn.classList.remove('expanded');
            document.getElementById('btnText').textContent = 'View More';
        }

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function() {
            initializePhotos();
        });

        // Re-initialize on window resize
        let resizeTimer;
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function() {
                initializePhotos();
            }, 250);
        });

        // Open Lightbox
        function openLightbox(index) {
            currentLightboxIndex = index;
            updateLightboxImage();
            document.getElementById('lightboxModal').classList.add('active');
            document.body.style.overflow = 'hidden'; // Prevent scrolling
        }

        // Close Lightbox
        function closeLightbox(event) {
            if (event && event.target.id !== 'lightboxModal') return;
            document.getElementById('lightboxModal').classList.remove('active');
            document.body.style.overflow = ''; // Restore scrolling
        }

        // Change Lightbox Image
        function changeLightboxImage(direction) {
            currentLightboxIndex += direction;
            if (currentLightboxIndex < 0) {
                currentLightboxIndex = propertyImages.length - 1;
            }
            if (currentLightboxIndex >= propertyImages.length) {
                currentLightboxIndex = 0;
            }
            updateLightboxImage();
        }

        // Update Lightbox Image
        function updateLightboxImage() {
            document.getElementById('lightboxImage').src = propertyImages[currentLightboxIndex];
            document.getElementById('lightboxCounter').textContent = `${currentLightboxIndex + 1} / ${propertyImages.length}`;
        }

        // Keyboard Navigation for Lightbox
        document.addEventListener('keydown', function(e) {
            const modal = document.getElementById('lightboxModal');
            if (modal.classList.contains('active')) {
                if (e.key === 'ArrowLeft') {
                    changeLightboxImage(-1);
                } else if (e.key === 'ArrowRight') {
                    changeLightboxImage(1);
                } else if (e.key === 'Escape') {
                    closeLightbox({ target: { id: 'lightboxModal' } });
                }
            }

            const facilitiesModal = document.getElementById('facilitiesLightboxModal');
            if (facilitiesModal && facilitiesModal.classList.contains('active')) {
                if (e.key === 'ArrowLeft') {
                    changeFacilitiesLightbox(-1);
                } else if (e.key === 'ArrowRight') {
                    changeFacilitiesLightbox(1);
                } else if (e.key === 'Escape') {
                    closeFacilitiesLightbox({ target: { id: 'facilitiesLightboxModal' } });
                }
            }

            const surroundingsModal = document.getElementById('surroundingsLightboxModal');
            if (surroundingsModal && surroundingsModal.classList.contains('active')) {
                if (e.key === 'ArrowLeft') {
                    changeSurroundingsLightbox(-1);
                } else if (e.key === 'ArrowRight') {
                    changeSurroundingsLightbox(1);
                } else if (e.key === 'Escape') {
                    closeSurroundingsLightbox({ target: { id: 'surroundingsLightboxModal' } });
                }
            }
        });

        // Facilities Lightbox
        const facilitiesData = [
            @foreach($property->facilities ?? [] as $facility)
                {
                    image: "{{ asset($facility['image'] ?? '/images/placeholder.jpg') }}",
                    name: "{{ $facility['name'] ?? 'Facility' }}",
                    description: "{{ $facility['description'] ?? '' }}"
                },
            @endforeach
        ];

        let currentFacilitiesIndex = 0;

        function openFacilitiesLightbox(index) {
            currentFacilitiesIndex = index;
            updateFacilitiesLightbox();
            document.getElementById('facilitiesLightboxModal').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeFacilitiesLightbox(event) {
            if (event && event.target.id !== 'facilitiesLightboxModal') return;
            document.getElementById('facilitiesLightboxModal').classList.remove('active');
            document.body.style.overflow = '';
        }

        function changeFacilitiesLightbox(direction) {
            currentFacilitiesIndex += direction;
            if (currentFacilitiesIndex < 0) {
                currentFacilitiesIndex = facilitiesData.length - 1;
            }
            if (currentFacilitiesIndex >= facilitiesData.length) {
                currentFacilitiesIndex = 0;
            }
            updateFacilitiesLightbox();
        }

        function updateFacilitiesLightbox() {
            const facility = facilitiesData[currentFacilitiesIndex];
            document.getElementById('facilitiesLightboxImage').src = facility.image;
            document.getElementById('facilitiesLightboxTitle').textContent = facility.name;
            document.getElementById('facilitiesLightboxDescription').textContent = facility.description;
            document.getElementById('facilitiesLightboxCounter').textContent = `${currentFacilitiesIndex + 1} / ${facilitiesData.length}`;
        }

        // Surroundings Lightbox
        const surroundingsData = [
            @foreach($property->surroundings ?? [] as $surrounding)
                {
                    image: "{{ asset($surrounding['image'] ?? '/images/placeholder.jpg') }}",
                    name: "{{ $surrounding['name'] ?? 'Surrounding' }}",
                    description: "{{ $surrounding['description'] ?? '' }}"
                },
            @endforeach
        ];

        let currentSurroundingsIndex = 0;

        function openSurroundingsLightbox(index) {
            currentSurroundingsIndex = index;
            updateSurroundingsLightbox();
            document.getElementById('surroundingsLightboxModal').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeSurroundingsLightbox(event) {
            if (event && event.target.id !== 'surroundingsLightboxModal') return;
            document.getElementById('surroundingsLightboxModal').classList.remove('active');
            document.body.style.overflow = '';
        }

        function changeSurroundingsLightbox(direction) {
            currentSurroundingsIndex += direction;
            if (currentSurroundingsIndex < 0) {
                currentSurroundingsIndex = surroundingsData.length - 1;
            }
            if (currentSurroundingsIndex >= surroundingsData.length) {
                currentSurroundingsIndex = 0;
            }
            updateSurroundingsLightbox();
        }

        function updateSurroundingsLightbox() {
            const surrounding = surroundingsData[currentSurroundingsIndex];
            document.getElementById('surroundingsLightboxImage').src = surrounding.image;
            document.getElementById('surroundingsLightboxTitle').textContent = surrounding.name;
            document.getElementById('surroundingsLightboxDescription').textContent = surrounding.description;
            document.getElementById('surroundingsLightboxCounter').textContent = `${currentSurroundingsIndex + 1} / ${surroundingsData.length}`;
        }
    </script>
</body>
</html>
