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
                <a href="{{ route('properties.index') }}" class="btn-sunset px-8 py-4 rounded-xl text-lg font-light inline-block">
                    Lihat Property
                </a>
                <a href="#cara-kerja" class="card-natural border-2 border-white/30 text-white hover:bg-white/10 px-8 py-4 rounded-xl text-lg font-light transition-all">
                    Cara Kerja
                </a>
            </div>
        </div>
        
        <!-- Scroll indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
            <a href="#features" class="block w-12 h-12 card-natural rounded-full flex items-center justify-center hover:bg-white/20 transition-all cursor-pointer group" onclick="smoothScrollTo('#features')">
                <svg class="w-6 h-6 text-white group-hover:text-warm-cream transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                </svg>
            </a>
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
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-light text-gray-900 mb-4 font-heading">
                Mengapa Memilih 
                <span class="text-gradient">Sakanta</span>?
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto font-light">
                Platform co-ownership property pertama di Indonesia yang memberikan akses investasi property premium dengan modal terjangkau.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center p-8 rounded-3xl bg-gradient-to-br from-amber-100 to-orange-200 text-gray-800 card-hover relative overflow-hidden" data-aos="fade-up" data-aos-delay="100">
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
            
            <div class="text-center p-8 rounded-3xl bg-gradient-to-br from-emerald-100 to-teal-200 text-gray-800 card-hover relative overflow-hidden" data-aos="fade-up" data-aos-delay="200">
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
            
            <div class="text-center p-8 rounded-3xl bg-gradient-to-br from-rose-100 to-pink-200 text-gray-800 card-hover relative overflow-hidden" data-aos="fade-up" data-aos-delay="300">
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
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-light mb-4 font-heading">
                Cara Kerja <span class="text-gradient-natural">Co-Ownership</span>
            </h2>
            <p class="text-xl text-gray-300 max-w-3xl mx-auto font-light">
                Proses investasi property dengan sistem co-ownership sangat mudah dan transparan.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="text-center relative" data-aos="fade-up" data-aos-delay="100">
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
            
            <div class="text-center relative" data-aos="fade-up" data-aos-delay="200">
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
            
            <div class="text-center relative" data-aos="fade-up" data-aos-delay="300">
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
            
            <div class="text-center" data-aos="fade-up" data-aos-delay="400">
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
<section class="py-20 bg-gradient-to-br from-amber-50 via-orange-50 to-yellow-50 relative">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-5">
        <img src="https://images.unsplash.com/photo-1600585154526-990dced4db0d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" 
             alt="House Pattern" class="w-full h-full object-cover">
    </div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="flex justify-between items-center mb-12" data-aos="fade-up">
            <div>
                <h2 class="text-3xl md:text-4xl font-light text-gray-900 mb-4 font-heading">
                    Property <span class="text-gradient">Unggulan</span>
                </h2>
                <p class="text-xl text-gray-600 font-light">
                    Property pilihan dengan potensi return terbaik dan lokasi strategis.
                </p>
            </div>
            <a href="{{ route('properties.index') }}" class="hidden md:inline-block btn-ocean text-white px-6 py-3 rounded-xl font-light hover:shadow-lg transition-all">
                Lihat Semua
            </a>
        </div>
        
        <!-- Featured Properties Swiper -->
        <div class="swiper-container" data-aos="fade-up" data-aos-delay="200">
            <div class="featured-properties-swiper">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        @foreach($featuredProperties as $property)
                        <div class="swiper-slide">
                            <div class="card-natural rounded-3xl overflow-hidden card-hover group h-full">
                                <div class="relative">
                                    <img src="{{ $property->main_image }}" alt="{{ $property->title }}" class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent"></div>
                                    <div class="absolute top-4 left-4">
                                        <span class="bg-emerald-500 text-white px-3 py-1 rounded-full text-sm font-light shadow-lg">
                                            {{ $property->available_shares }}/{{ $property->total_shares }} Tersedia
                                        </span>
                                    </div>
                                    @if($property->expected_rental_yield)
                                    <div class="absolute top-4 right-4">
                                        <span class="bg-orange-500 text-white px-3 py-1 rounded-full text-sm font-light shadow-lg">
                                            {{ $property->expected_rental_yield }}% Yield
                                        </span>
                                    </div>
                                    @endif
                                </div>
                                
                                <div class="p-6 bg-white/80 backdrop-blur-sm flex-1 flex flex-col">
                                    <h3 class="text-xl font-normal text-gray-900 mb-2 font-heading">{{ $property->title }}</h3>
                                    <p class="text-gray-600 mb-4 flex items-center font-light">
                                        <svg class="w-4 h-4 mr-2 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        {{ $property->city }}, {{ $property->province }}
                                    </p>
                                    
                                    <div class="grid grid-cols-2 gap-4 mb-4 text-sm text-gray-600">
                                        @if($property->bedrooms)
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                                            </svg>
                                            <span class="font-light">{{ $property->bedrooms }} Kamar</span>
                                        </div>
                                        @endif
                                        @if($property->bathrooms)
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10v11M20 10v11"></path>
                                            </svg>
                                            <span class="font-light">{{ $property->bathrooms }} Kamar Mandi</span>
                                        </div>
                                        @endif
                                    </div>
                                    
                                    <div class="border-t border-gray-200 pt-4 mt-auto">
                                        <div class="flex justify-between items-center mb-2">
                                            <span class="text-gray-600 text-sm font-light">Harga per saham (1/{{ $property->total_shares }})</span>
                                        </div>
                                        <div class="flex justify-between items-center">
                                            <span class="text-2xl font-normal text-transparent bg-clip-text bg-gradient-to-r from-amber-600 to-orange-600 font-heading">
                                                {{ $property->formatted_price_per_share }}
                                            </span>
                                            <a href="{{ route('properties.show', $property) }}" class="bg-gradient-to-r from-amber-500 to-orange-500 text-white px-4 py-2 rounded-xl hover:from-amber-600 hover:to-orange-600 transition-all transform hover:scale-105 font-light">
                                                Detail
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    
                    <!-- Swiper Navigation -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    
                    <!-- Swiper Pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-12 md:hidden">
            <a href="{{ route('properties.index') }}" class="btn-ocean text-white px-8 py-3 rounded-xl font-light">
                Lihat Semua Property
            </a>
        </div>
    </div>
</section>
@endif

<!-- Latest Properties Section -->
@if($latestProperties->count() > 0)
<section class="py-20 bg-gradient-to-br from-emerald-50 via-teal-50 to-cyan-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Property <span class="text-gradient">Terbaru</span>
            </h2>
            <p class="text-xl text-gray-600">
                Jelajahi pilihan property terbaru dengan berbagai lokasi strategis.
            </p>
        </div>
        
        <!-- Latest Properties Swiper -->
        <div class="swiper-container" data-aos="fade-up" data-aos-delay="200">
            <div class="latest-properties-swiper">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        @foreach($latestProperties as $property)
                        <div class="swiper-slide">
                            <div class="card-glass rounded-2xl overflow-hidden card-hover group h-full">
                                <div class="relative">
                                    <img src="{{ $property->main_image }}" alt="{{ $property->title }}" class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-500">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/30 via-transparent to-transparent"></div>
                                    <div class="absolute top-3 left-3">
                                        <span class="bg-white/90 backdrop-blur-sm text-gray-900 px-3 py-1 rounded-xl text-xs font-semibold shadow-lg">
                                            {{ $property->property_type }}
                                        </span>
                                    </div>
                                </div>
                                
                                <div class="p-5 bg-white/80 backdrop-blur-sm flex-1 flex flex-col">
                                    <h3 class="font-bold text-gray-900 mb-1 truncate">{{ $property->title }}</h3>
                                    <p class="text-gray-600 text-sm mb-3 flex items-center">
                                        <svg class="w-3 h-3 mr-1 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        {{ $property->city }}
                                    </p>
                                    
                                    <div class="flex justify-between items-center mt-auto">
                                        <span class="text-lg font-bold text-transparent bg-clip-text bg-gradient-to-r from-emerald-600 to-teal-600">
                                            {{ $property->formatted_price_per_share }}
                                        </span>
                                        <a href="{{ route('properties.show', $property) }}" class="bg-gradient-to-r from-emerald-500 to-teal-500 text-white px-3 py-1.5 rounded-xl text-sm font-semibold hover:from-emerald-600 hover:to-teal-600 transition-all transform hover:scale-105">
                                            Lihat →
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    
                    <!-- Swiper Navigation -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    
                    <!-- Swiper Pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>
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
        <div class="card-natural p-12 rounded-4xl" data-aos="zoom-in" data-aos-delay="100">
            <h2 class="text-3xl md:text-4xl font-light mb-6 text-white font-heading">
                Siap Memulai <span class="text-gradient-light">Investasi</span> Property?
            </h2>
            <p class="text-xl mb-8 max-w-3xl mx-auto text-gray-200 font-light">
                Bergabunglah dengan ribuan investor yang sudah merasakan keuntungan co-ownership property bersama Sakanta.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('register') }}" class="bg-white text-gray-800 px-8 py-4 rounded-2xl text-lg font-light hover:bg-gray-100 transition-all transform hover:scale-105 shadow-xl" data-aos="fade-up" data-aos-delay="200">
                    Daftar Sekarang
                </a>
                <a href="{{ route('properties.index') }}" class="border-2 border-white/50 text-white hover:bg-white/10 backdrop-blur-sm px-8 py-4 rounded-2xl text-lg font-light transition-all transform hover:scale-105" data-aos="fade-up" data-aos-delay="300">
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

// Also enable smooth scrolling for all anchor links
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
    
    // Initialize Featured Properties Swiper
    const featuredSwiper = new Swiper('.featured-properties-swiper .swiper', {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,
        grabCursor: true,
        autoplay: {
            delay: 4000,
            disableOnInteraction: false,
            pauseOnMouseEnter: true,
        },
        pagination: {
            el: '.featured-properties-swiper .swiper-pagination',
            clickable: true,
            dynamicBullets: true,
        },
        navigation: {
            nextEl: '.featured-properties-swiper .swiper-button-next',
            prevEl: '.featured-properties-swiper .swiper-button-prev',
        },
        breakpoints: {
            640: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 30,
            }
        },
        on: {
            init: function() {
                // Ensure equal height cards
                this.update();
            }
        }
    });
    
    // Initialize Latest Properties Swiper
    const latestSwiper = new Swiper('.latest-properties-swiper .swiper', {
        slidesPerView: 1,
        spaceBetween: 15,
        loop: true,
        grabCursor: true,
        autoplay: {
            delay: 3500,
            disableOnInteraction: false,
            pauseOnMouseEnter: true,
        },
        pagination: {
            el: '.latest-properties-swiper .swiper-pagination',
            clickable: true,
            dynamicBullets: true,
        },
        navigation: {
            nextEl: '.latest-properties-swiper .swiper-button-next',
            prevEl: '.latest-properties-swiper .swiper-button-prev',
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
            }
        },
        on: {
            init: function() {
                // Ensure equal height cards
                this.update();
            }
        }
    });
});
</script>
@endpush
