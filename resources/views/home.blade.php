@extends('layouts.app')

@section('title', 'Sakanta - Platform Co-Ownership Property Terdepan')
@section('description', 'Investasi property bersama dengan sistem co-ownership. Miliki saham property impian Anda mulai dari 1/8 bagian. Mulai dari Rp 50 juta.')

@section('content')

<!-- Hero Section -->
<section class="relative min-h-screen flex items-center justify-center text-white overflow-hidden">
    <!-- Background Image -->
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2053&q=80" 
             alt="Luxury Modern House" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-slate-900/80 via-slate-800/70 to-slate-900/80"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent"></div>
    </div>
    
    <!-- Natural Pattern Overlay -->
    <div class="absolute inset-0 z-0 opacity-10">
        <div class="w-full h-full" style="background-image: url('data:image/svg+xml,<svg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd"><g fill="%23727444" fill-opacity="0.1"><circle cx="30" cy="30" r="2"/></g></svg>'); background-size: 60px 60px;"></div>
    </div>
    
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-4xl md:text-6xl font-light mb-6 leading-tight font-heading" data-aos="fade-up" data-aos-delay="100">
                Investasi Property Kini
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-300 via-yellow-400 to-orange-400 font-normal">
                    Lebih Terjangkau
                </span>
            </h1>
            <p class="text-xl md:text-2xl mb-8 text-white/90 leading-relaxed font-light" data-aos="fade-up" data-aos-delay="200">
                Miliki saham property impian Anda dengan sistem co-ownership.<br>
                Mulai dari <strong class="text-amber-300 font-normal">Rp 50 juta</strong> untuk 1/8 bagian property.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center" data-aos="fade-up" data-aos-delay="300">
                <a href="{{ route('properties.index') }}" class="btn-sunset px-8 py-4 rounded-xl text-lg font-light inline-block" data-aos="zoom-in" data-aos-delay="400">
                    Lihat Property
                </a>
                <a href="#cara-kerja" class="card-natural border-2 border-white/30 text-white hover:bg-white/10 px-8 py-4 rounded-xl text-lg font-light transition-all" data-aos="zoom-in" data-aos-delay="500">
                    Cara Kerja
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section id="features" class="py-20 bg-gradient-to-br from-stone-50 via-amber-50 to-orange-50 relative">
    <!-- House Background -->
    <div class="absolute inset-0 opacity-10">
        <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" 
             alt="Modern House Interior" class="w-full h-full object-cover">
    </div>
    
    <div class="absolute inset-0 bg-pattern opacity-30"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up" data-aos-delay="100">
            <h2 class="text-3xl md:text-4xl font-light text-gray-900 mb-4 font-heading">
                Mengapa Memilih 
                <span class="text-gradient">Sakanta</span>?
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto font-light">
                Platform co-ownership property pertama di Indonesia yang memberikan akses investasi property premium dengan modal terjangkau.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center p-8 rounded-3xl bg-gradient-to-br from-amber-100 to-orange-200 text-gray-800 card-hover relative overflow-hidden" data-aos="fade-up" data-aos-delay="200">
                <div class="absolute inset-0 bg-white/20 backdrop-blur-sm"></div>
                <div class="relative">
                    <div class="w-16 h-16 bg-gradient-to-br from-amber-500 to-orange-600 rounded-2xl flex items-center justify-center mx-auto mb-6 floating-element">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-normal mb-4 font-heading">Modal Terjangkau</h3>
                    <p class="text-amber-800 font-light">
                        Mulai investasi property premium hanya dengan Rp 50 juta untuk kepemilikan 1/8 bagian.
                    </p>
                </div>
            </div>
            
            <div class="text-center p-8 rounded-3xl bg-gradient-to-br from-emerald-100 to-teal-200 text-gray-800 card-hover relative overflow-hidden" data-aos="fade-up" data-aos-delay="300">
                <div class="absolute inset-0 bg-white/20 backdrop-blur-sm"></div>
                <div class="relative">
                    <div class="w-16 h-16 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-2xl flex items-center justify-center mx-auto mb-6 floating-element" style="animation-delay: -2s;">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-normal mb-4 font-heading">Legal & Aman</h3>
                    <p class="text-emerald-800 font-light">
                        Semua transaksi dijamin aman dengan sertifikat kepemilikan yang sah dan terdaftar.
                    </p>
                </div>
            </div>
            
            <div class="text-center p-8 rounded-3xl bg-gradient-to-br from-rose-100 to-pink-200 text-gray-800 card-hover relative overflow-hidden" data-aos="fade-up" data-aos-delay="400">
                <div class="absolute inset-0 bg-white/20 backdrop-blur-sm"></div>
                <div class="relative">
                    <div class="w-16 h-16 bg-gradient-to-br from-rose-500 to-pink-600 rounded-2xl flex items-center justify-center mx-auto mb-6 floating-element" style="animation-delay: -4s;">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-normal mb-4 font-heading">ROI Menarik</h3>
                    <p class="text-rose-800 font-light">
                        Potensi return investasi 8-15% per tahun dari appreciation dan rental yield.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- How It Works Section -->
<section id="cara-kerja" class="py-20 bg-gradient-dark text-white relative overflow-hidden">
    <!-- Luxury House Background -->
    <div class="absolute inset-0 opacity-10">
        <img src="https://images.unsplash.com/photo-1600566753376-12c8ab7fb75b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" 
             alt="Luxury Villa" class="w-full h-full object-cover">
    </div>
    
    <div class="absolute inset-0">
        <div class="absolute top-20 left-10 w-32 h-32 bg-amber-500/20 rounded-full blur-xl"></div>
        <div class="absolute bottom-20 right-10 w-40 h-40 bg-orange-500/20 rounded-full blur-xl"></div>
        <div class="absolute top-1/2 left-1/2 w-60 h-60 bg-yellow-500/10 rounded-full blur-2xl"></div>
    </div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up" data-aos-delay="100">
            <h2 class="text-3xl md:text-4xl font-light mb-4 font-heading">
                Cara Kerja <span class="text-gradient-natural">Co-Ownership</span>
            </h2>
            <p class="text-xl text-gray-300 max-w-3xl mx-auto font-light">
                Proses investasi property dengan sistem co-ownership sangat mudah dan transparan.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="text-center relative" data-aos="fade-up" data-aos-delay="200">
                <div class="card-natural p-8 rounded-3xl">
                    <div class="w-20 h-20 bg-gradient-sunset rounded-2xl flex items-center justify-center mx-auto mb-6 text-gray-800 text-2xl font-normal floating-element">
                        1
                    </div>
                    <h3 class="text-lg font-normal mb-3 font-heading">Pilih Property</h3>
                    <p class="text-gray-300 font-light">
                        Browse dan pilih property yang sesuai dengan budget dan preferensi Anda.
                    </p>
                </div>
                <!-- Connector -->
                <div class="hidden md:block absolute top-1/2 right-0 transform translate-x-1/2 -translate-y-1/2">
                    <div class="w-8 h-0.5 bg-gradient-to-r from-amber-400 to-transparent"></div>
                </div>
            </div>
            
            <div class="text-center relative" data-aos="fade-up" data-aos-delay="300">
                <div class="card-natural p-8 rounded-3xl">
                    <div class="w-20 h-20 bg-gradient-ocean rounded-2xl flex items-center justify-center mx-auto mb-6 text-white text-2xl font-normal floating-element" style="animation-delay: -1s;">
                        2
                    </div>
                    <h3 class="text-lg font-normal mb-3 font-heading">Tentukan Saham</h3>
                    <p class="text-gray-300 font-light">
                        Pilih jumlah saham yang ingin dibeli, mulai dari 1/8 hingga beberapa bagian.
                    </p>
                </div>
                <!-- Connector -->
                <div class="hidden md:block absolute top-1/2 right-0 transform translate-x-1/2 -translate-y-1/2">
                    <div class="w-8 h-0.5 bg-gradient-to-r from-green-400 to-transparent"></div>
                </div>
            </div>
            
            <div class="text-center relative" data-aos="fade-up" data-aos-delay="400">
                <div class="card-natural p-8 rounded-3xl">
                    <div class="w-20 h-20 bg-gradient-forest rounded-2xl flex items-center justify-center mx-auto mb-6 text-white text-2xl font-normal floating-element" style="animation-delay: -2s;">
                        3
                    </div>
                    <h3 class="text-lg font-normal mb-3 font-heading">Proses Legal</h3>
                    <p class="text-gray-300 font-light">
                        Tim legal kami akan mengurus semua dokumen kepemilikan dan sertifikat.
                    </p>
                </div>
                <!-- Connector -->
                <div class="hidden md:block absolute top-1/2 right-0 transform translate-x-1/2 -translate-y-1/2">
                    <div class="w-8 h-0.5 bg-gradient-to-r from-yellow-400 to-transparent"></div>
                </div>
            </div>
            
            <div class="text-center" data-aos="fade-up" data-aos-delay="500">
                <div class="card-natural p-8 rounded-3xl">
                    <div class="w-20 h-20 bg-gradient-sakanta rounded-2xl flex items-center justify-center mx-auto mb-6 text-white text-2xl font-normal floating-element" style="animation-delay: -3s;">
                        4
                    </div>
                    <h3 class="text-lg font-normal mb-3 font-heading">Nikmati Return</h3>
                    <p class="text-gray-300 font-light">
                        Dapatkan return dari rental yield dan appreciation value property.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Properties Section -->
@if($featuredProperties->count() > 0)
<section class="py-20 bg-gradient-to-br from-white via-gray-50 to-cream/20 relative">
    <!-- Subtle Background Pattern -->
    <div class="absolute inset-0 opacity-30">
        <div class="w-full h-full" style="background-image: radial-gradient(circle at 25px 25px, rgba(114, 116, 68, 0.08) 2px, transparent 2px), radial-gradient(circle at 75px 75px, rgba(210, 185, 150, 0.08) 2px, transparent 2px); background-size: 100px 100px;"></div>
    </div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="flex justify-between items-center mb-12" data-aos="fade-up" data-aos-delay="100">
            <div>
                <h2 class="text-3xl md:text-4xl font-light text-gray-900 mb-4 font-heading">
                    Property <span class="text-gradient-sage">Unggulan</span>
                </h2>
                <p class="text-xl text-gray-600 font-light">
                    Property pilihan dengan potensi return terbaik dan lokasi strategis untuk investasi jangka panjang.
                </p>
            </div>
            <a href="{{ route('properties.index') }}" class="hidden md:inline-flex items-center px-6 py-3 rounded-xl text-sm font-medium text-white bg-gradient-to-r from-sage to-olive hover:from-olive hover:to-sage transition-all duration-300 shadow-lg hover:shadow-xl" data-aos="zoom-in" data-aos-delay="300">
                <span>Lihat Semua</span>
                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </div>
        
        <!-- Swiper Container for Featured Properties -->
        <div class="swiper-container featured-properties-swiper pt-8">
            <div class="swiper-wrapper" data-aos="fade-up" data-aos-delay="200">
                @foreach($featuredProperties as $property)
                <div class="swiper-slide">
                    <div class="group relative">
                        <!-- Main Card -->
                        <div class="relative overflow-hidden rounded-2xl bg-white shadow-xl property-card">
                            <!-- Image Container -->
                            <div class="relative h-72 overflow-hidden rounded-t-2xl">
                                <img src="{{ $property->main_image }}" alt="{{ $property->title }}" 
                                     class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                                
                                <!-- Gradient Overlay -->
                                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                                
                                <!-- Status Badges -->
                                <div class="absolute top-4 left-4 flex flex-col gap-2">
                                    <span class="inline-flex items-center px-3 py-1.5 rounded-full text-xs font-medium bg-sage text-white shadow-lg backdrop-blur-sm">
                                        <svg class="w-3 h-3 mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        {{ $property->available_shares }}/{{ $property->total_shares }} Tersedia
                                    </span>
                                </div>
                                
                                @if($property->expected_rental_yield)
                                <div class="absolute top-4 right-4">
                                    <span class="inline-flex items-center px-3 py-1.5 rounded-full text-xs font-medium bg-gradient-to-r from-amber-500 to-orange-500 text-white shadow-lg backdrop-blur-sm">
                                        <svg class="w-3 h-3 mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                                        </svg>
                                        {{ $property->expected_rental_yield }}% Yield
                                    </span>
                                </div>
                                @endif
                                
                                <!-- Property Type Badge -->
                                <div class="absolute bottom-4 left-4">
                                    <span class="inline-flex items-center px-3 py-1.5 rounded-lg text-sm font-medium bg-white/20 backdrop-blur-md text-white border border-white/30">
                                        {{ $property->property_type ?? 'Premium Property' }}
                                    </span>
                                </div>
                            </div>
                            
                            <!-- Content Container -->
                            <div class="p-6 bg-gradient-to-br from-white to-gray-50">
                                <!-- Title & Location -->
                                <div class="mb-4">
                                    <h3 class="text-xl font-semibold text-gray-900 mb-2 line-clamp-1 group-hover:text-sage transition-colors">
                                        {{ $property->title }}
                                    </h3>
                                    <div class="flex items-center text-gray-500 text-sm">
                                        <svg class="w-4 h-4 mr-2 text-sage" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        {{ $property->city }}, {{ $property->province }}
                                    </div>
                                </div>
                                
                                <!-- Property Features -->
                                <div class="flex items-center gap-4 mb-6">
                                    @if($property->bedrooms)
                                    <div class="flex items-center text-gray-600 text-sm">
                                        <div class="w-8 h-8 rounded-lg bg-sage/10 flex items-center justify-center mr-2">
                                            <svg class="w-4 h-4 text-sage" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                                            </svg>
                                        </div>
                                        <span class="font-medium">{{ $property->bedrooms }} Kamar</span>
                                    </div>
                                    @endif
                                    @if($property->bathrooms)
                                    <div class="flex items-center text-gray-600 text-sm">
                                        <div class="w-8 h-8 rounded-lg bg-sage/10 flex items-center justify-center mr-2">
                                            <svg class="w-4 h-4 text-sage" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10v11M20 10v11"></path>
                                            </svg>
                                        </div>
                                        <span class="font-medium">{{ $property->bathrooms }} Bath</span>
                                    </div>
                                    @endif
                                </div>
                                
                                <!-- Price Section -->
                                <div class="border-t border-gray-200 pt-4">
                                    <div class="flex items-center justify-between mb-2">
                                        <span class="text-xs text-gray-500 font-medium uppercase tracking-wide">
                                            Harga per saham (1/{{ $property->total_shares }})
                                        </span>
                                        <div class="flex items-center space-x-1">
                                            <svg class="w-4 h-4 text-amber-500" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                            </svg>
                                            <span class="text-xs text-gray-500">Premium</span>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <div class="flex flex-col">
                                            <span class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-sage to-olive">
                                                {{ $property->formatted_price_per_share }}
                                            </span>
                                            <span class="text-xs text-gray-500">ROI: {{ $property->expected_rental_yield ?? '8-12' }}% /tahun</span>
                                        </div>
                                        <a href="{{ route('properties.show', $property) }}" 
                                           class="inline-flex items-center px-6 py-3 rounded-xl text-sm font-semibold text-white bg-gradient-to-r from-sage to-olive hover:from-olive hover:to-sage transition-all duration-300 shadow-lg hover:shadow-xl">
                                            <span>Detail</span>
                                            <svg class="w-4 h-4 ml-2 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Decorative Elements -->
                        <div class="absolute -inset-1 bg-gradient-to-r from-sage to-olive rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-500 -z-10 blur-lg"></div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <!-- Swiper Pagination -->
            <div class="swiper-pagination"></div>
        </div>
        
        <div class="text-center mt-12 md:hidden">
            <a href="{{ route('properties.index') }}" class="inline-flex items-center px-8 py-3 rounded-xl text-sm font-medium text-white bg-gradient-to-r from-sage to-olive hover:from-olive hover:to-sage transition-all duration-300 shadow-lg hover:shadow-xl" data-aos="zoom-in" data-aos-delay="400">
                <span>Lihat Semua Property</span>
                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </div>
    </div>
</section>
@endif

<!-- Latest Properties Section -->
@if($latestProperties->count() > 0)
<section class="py-20 bg-gradient-to-br from-gray-50 via-white to-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12" data-aos="fade-up" data-aos-delay="100">
            <h2 class="text-3xl md:text-4xl font-light text-gray-900 mb-4 font-heading">
                Property <span class="text-gradient-sage">Terbaru</span>
            </h2>
            <p class="text-xl text-gray-600 font-light">
                Jelajahi pilihan property terbaru dengan berbagai lokasi strategis dan potensi investasi menarik.
            </p>
        </div>
        
        <!-- Swiper Container for Latest Properties -->
        <div class="swiper-container latest-properties-swiper pt-8">
            <div class="swiper-wrapper" data-aos="fade-up" data-aos-delay="200">
                @foreach($latestProperties as $property)
                <div class="swiper-slide">
                    <div class="group relative">
                        <!-- Compact Card Design -->
                        <div class="relative overflow-hidden rounded-xl bg-white shadow-lg transition-all duration-300 hover:shadow-xl hover:-translate-y-1 border border-gray-100">
                            <!-- Image Container -->
                            <div class="relative h-48 overflow-hidden">
                                <img src="{{ $property->main_image }}" alt="{{ $property->title }}" 
                                     class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                                
                                <!-- Gradient Overlay -->
                                <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent"></div>
                                
                                <!-- Property Type Badge -->
                                <div class="absolute top-3 left-3">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-medium bg-white/90 backdrop-blur-sm text-gray-700 shadow-sm">
                                        {{ $property->property_type ?? 'New Property' }}
                                    </span>
                                </div>
                                
                                <!-- New Badge -->
                                <div class="absolute top-3 right-3">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-medium bg-sage text-white shadow-sm">
                                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                        </svg>
                                        Baru
                                    </span>
                                </div>
                            </div>
                            
                            <!-- Content Container -->
                            <div class="p-4">
                                <!-- Title & Location -->
                                <div class="mb-3">
                                    <h3 class="text-lg font-semibold text-gray-900 mb-1 line-clamp-1 group-hover:text-sage transition-colors">
                                        {{ $property->title }}
                                    </h3>
                                    <div class="flex items-center text-gray-500 text-sm">
                                        <svg class="w-3 h-3 mr-1.5 text-sage" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        {{ $property->city }}
                                    </div>
                                </div>
                                
                                <!-- Price & Action -->
                                <div class="flex items-center justify-between">
                                    <div class="flex flex-col">
                                        <span class="text-lg font-bold text-transparent bg-clip-text bg-gradient-to-r from-sage to-olive">
                                            {{ $property->formatted_price_per_share }}
                                        </span>
                                        <span class="text-xs text-gray-500">per saham</span>
                                    </div>
                                    <a href="{{ route('properties.show', $property) }}" 
                                       class="inline-flex items-center px-4 py-2 rounded-lg text-sm font-medium text-white bg-gradient-to-r from-sage to-olive hover:from-olive hover:to-sage transform hover:scale-105 transition-all duration-200 shadow-sm hover:shadow-md">
                                        Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Subtle Glow Effect -->
                        <div class="absolute -inset-0.5 bg-gradient-to-r from-sage to-olive rounded-xl opacity-0 group-hover:opacity-20 transition-opacity duration-300 -z-10 blur-sm"></div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <!-- Swiper Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>
@endif

<!-- CTA Section -->
<section class="py-20 bg-gradient-earth relative overflow-hidden">
    <!-- Luxury Estate Background -->
    <div class="absolute inset-0 opacity-20">
        <img src="https://images.unsplash.com/photo-1600607687644-c7171b42498b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" 
             alt="Luxury Estate" class="w-full h-full object-cover">
    </div>
    
    <!-- Animated background elements -->
    <div class="absolute inset-0">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-amber-500 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-orange-500 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob animation-delay-2000"></div>
        <div class="absolute top-40 left-1/3 w-80 h-80 bg-yellow-500 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob animation-delay-4000"></div>
    </div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        <div class="card-natural p-12 rounded-4xl" data-aos="fade-up" data-aos-delay="100">
            <h2 class="text-3xl md:text-4xl font-light mb-6 text-white font-heading" data-aos="fade-up" data-aos-delay="200">
                Siap Memulai <span class="text-gradient-light">Investasi</span> Property?
            </h2>
            <p class="text-xl mb-8 max-w-3xl mx-auto text-gray-200 font-light" data-aos="fade-up" data-aos-delay="300">
                Bergabunglah dengan ribuan investor yang sudah merasakan keuntungan co-ownership property bersama Sakanta.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center" data-aos="fade-up" data-aos-delay="400">
                <a href="{{ route('register') }}" class="bg-white text-gray-800 px-8 py-4 rounded-2xl text-lg font-light hover:bg-gray-100 transition-all transform hover:scale-105 shadow-xl" data-aos="zoom-in" data-aos-delay="500">
                    Daftar Sekarang
                </a>
                <a href="{{ route('properties.index') }}" class="border-2 border-white/50 text-white hover:bg-white/10 backdrop-blur-sm px-8 py-4 rounded-2xl text-lg font-light transition-all transform hover:scale-105" data-aos="zoom-in" data-aos-delay="600">
                    Lihat Property
                </a>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
function smoothScrollTo(targetId) {
    const target = document.querySelector(targetId);
    if (target) {
        target.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
    }
}

// Enhanced smooth scrolling and initialization
document.addEventListener('DOMContentLoaded', function() {
    // Add smooth scrolling to all links with # href
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            if (targetId && targetId !== '#') {
                smoothScrollTo(targetId);
            }
        });
    });
    
    // Wait for page to be fully loaded before initializing Swiper
    setTimeout(() => {
        // Initialize Swiper for Featured Properties
        const featuredSwiper = new Swiper('.featured-properties-swiper', {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
            pagination: {
                el: '.featured-properties-swiper .swiper-pagination',
                clickable: true,
                dynamicBullets: true,
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                },
            },
            effect: 'slide',
            grabCursor: true,
            centeredSlides: false,
            observer: true,
            observeParents: true,
            touchRatio: 1,
            touchAngle: 45,
            allowTouchMove: true,
        });
        
        // Initialize Swiper for Latest Properties
        const latestSwiper = new Swiper('.latest-properties-swiper', {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,
            autoplay: {
                delay: 6000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
            pagination: {
                el: '.latest-properties-swiper .swiper-pagination',
                clickable: true,
                dynamicBullets: true,
            },
            breakpoints: {
                480: {
                    slidesPerView: 2,
                    spaceBetween: 15,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 20,
                },
            },
            effect: 'slide',
            grabCursor: true,
            centeredSlides: false,
            observer: true,
            observeParents: true,
            touchRatio: 1,
            touchAngle: 45,
            allowTouchMove: true,
        });
        
        // Pause autoplay when page is not visible
        document.addEventListener('visibilitychange', function() {
            if (document.hidden) {
                featuredSwiper.autoplay.stop();
                latestSwiper.autoplay.stop();
            } else {
                featuredSwiper.autoplay.start();
                latestSwiper.autoplay.start();
            }
        });
        
    }, 500); // Small delay to ensure DOM is ready
});

// Optimize performance
window.addEventListener('load', function() {
    // Remove loading states
    document.body.classList.add('loaded');
    
    // Lazy load images that are not in viewport
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.classList.remove('lazy');
                    imageObserver.unobserve(img);
                }
            });
        });

        document.querySelectorAll('img[data-src]').forEach(img => {
            imageObserver.observe(img);
        });
    }
});
</script>
@endpush
