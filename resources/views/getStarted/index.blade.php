@extends('layouts.app')

@section('title', 'Mulai Investasi Properti Co-Ownership - Sakanta')
@section('description', 'Temukan cara cerdas memiliki properti liburan mewah. Mulai perjalanan investasi Anda bersama Sakanta hari ini.')

@section('content')

<!-- Hero Section (Tanpa background image, hanya warna/gradient) -->
<section class="relative bg-gradient-to-br from-brand-charcoal via-brand-blue/80 to-brand-cream text-white overflow-hidden">
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 md:py-32">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <!-- Text Content -->
            <div class="text-left" data-aos="fade-down" data-aos-delay="100">
                <h1 class="text-4xl md:text-5xl font-extralight mb-6 leading-tight font-heading text-brand-cream drop-shadow-lg" data-aos="zoom-in" data-aos-delay="200">
                    Miliki Rumah Impian,
                    <span class="block text-brand-blue font-semibold" data-aos="fade-right" data-aos-delay="400">
                        Dengan Cara Lebih Cerdas
                    </span>
                </h1>
                <p class="text-lg md:text-xl mb-8 text-gray-200 leading-relaxed font-light drop-shadow" data-aos="fade-up" data-aos-delay="600">
                    SAKANTA mewujudkan impian kepemilikan properti mewah melalui sistem co-ownership. Investasikan sebagian kecil dari harga total dan nikmati semua manfaat memiliki rumah liburan premium.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 mt-10">
                    <a href="{{ route('properties.index') }}" class="bg-brand-green text-white px-8 py-4 rounded-lg text-lg font-light inline-block shadow-lg transform transition-all hover:bg-opacity-90 hover:scale-105 text-center" data-aos="flip-left" data-aos-delay="800">
                        Jelajahi Properti
                    </a>
                    <a href="#how-it-works" class="border-2 border-white/30 text-white hover:bg-white/10 px-8 py-4 rounded-lg text-lg font-light transition-all text-center" data-aos="flip-right" data-aos-delay="1000">
                        Lihat Cara Kerja
                    </a>
                </div>
            </div>
            <!-- Image (hidden on mobile for focus) -->
            <div class="relative hidden lg:block" data-aos="zoom-in-up" data-aos-delay="1200">
                <!-- Kosongkan gambar, bisa tambahkan ilustrasi SVG atau icon jika ingin -->
            </div>
        </div>
    </div>
</section>

<!-- How It Works Section (Glassmorphism + Icon) -->
<section id="how-it-works" class="py-24 relative bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=2070&q=80');">
    <div class="absolute inset-0 bg-gradient-to-b from-brand-charcoal/80 via-brand-blue/60 to-transparent"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-down" data-aos-delay="100">
            <h2 class="text-3xl md:text-4xl font-light mb-4 text-white font-heading drop-shadow-lg" data-aos="zoom-in" data-aos-delay="200">
                Cara Kerja Co-Ownership
            </h2>
            <p class="text-xl text-white max-w-3xl mx-auto font-light drop-shadow" data-aos="fade-up" data-aos-delay="400">
                Proses investasi property dengan sistem co-ownership sangat mudah dan transparan.
            </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @php
                $icons = [
                    'heroicons-outline:home-modern',
                    'heroicons-outline:chart-pie',
                    'heroicons-outline:document-check',
                    'heroicons-outline:currency-dollar',
                ];
                $steps = [
                    ['delay' => '100', 'title' => 'Pilih Properti', 'description' => 'Browse dan pilih property yang sesuai dengan budget dan preferensi Anda.'],
                    ['delay' => '200', 'title' => 'Tentukan Saham', 'description' => 'Pilih jumlah saham yang ingin dibeli, mulai dari 1/8 hingga beberapa bagian.'],
                    ['delay' => '300', 'title' => 'Proses Legal', 'description' => 'Tim legal kami akan mengurus semua dokumen kepemilikan dan sertifikat.'],
                    ['delay' => '400', 'title' => 'Nikmati Return', 'description' => 'Dapatkan return dari rental yield dan appreciation value property.']
                ];
            @endphp
            @foreach($steps as $index => $step)
            <div class="text-center p-8 bg-white/10 backdrop-blur-xl rounded-2xl border border-white/30 shadow-xl text-white flex flex-col items-center justify-start transition-transform duration-300 hover:scale-105"
                data-aos="{{ $index % 2 == 0 ? 'fade-up-right' : 'fade-up-left' }}" data-aos-delay="{{ 200 + $index * 200 }}">
                <span class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-brand-blue/80 mb-6 shadow-lg">
                    @if($index === 0)
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6m-6 0H7m6 0v6m0 0h6m-6 0H7"/></svg>
                    @elseif($index === 1)
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17a4 4 0 100-8 4 4 0 000 8zm0 0v4m0-4H7m4 0h4"/></svg>
                    @elseif($index === 2)
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2l4-4m-6 4V6a2 2 0 012-2h4a2 2 0 012 2v12a2 2 0 01-2 2H7a2 2 0 01-2-2v-4"/></svg>
                    @else
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 1.343-3 3s1.343 3 3 3 3-1.343 3-3-1.343-3-3-3zm0 0V4m0 8v8"/></svg>
                    @endif
                </span>
                <p class="text-5xl font-bold mb-4 text-white/80">{{ $index + 1 }}</p>
                <h3 class="text-xl font-semibold mb-3 text-white">{{ $step['title'] }}</h3>
                <p class="font-light leading-relaxed text-gray-200">
                    {{ $step['description'] }}
                </p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Discover Now Section with Light Cream Background and White Text -->
<section id="discover" class="py-24 bg-brand-cream">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-down" data-aos-delay="100">
            <h2 class="text-3xl md:text-4xl font-bold mb-4 text-white uppercase tracking-wider font-heading" data-aos="zoom-in" data-aos-delay="200">
                Discover Now
            </h2>
            <p class="text-xl text-white max-w-3xl mx-auto font-light" data-aos="fade-up" data-aos-delay="400">
                Temukan properti pilihan dengan potensi return terbaik dan lokasi strategis.
            </p>
        </div>

        @php
        // Dummy Data - Harap ganti dengan data dari database Anda
        $properties = [
            [
                'name' => 'GOLF VIEW, CANGGU',
                'price' => '1.2 Miliar',
                'ownership' => '1/8 OWNERSHIP',
                'image_url' => 'https://images.unsplash.com/photo-1613977257365-aaae5a9817ff?auto=format&fit=crop&w=1920&q=80',
                'details' => 'Termasuk biaya properti, renovasi, perabotan, dan biaya tahunan.',
            ],
            [
                'name' => 'OCEANFRONT, ULUWATU',
                'price' => '2.5 Miliar',
                'ownership' => '1/8 OWNERSHIP',
                'image_url' => 'https://images.unsplash.com/photo-1596394516093-501ba68a0ba6?auto=format&fit=crop&w=1920&q=80',
                'details' => 'Termasuk biaya properti, renovasi, perabotan, dan biaya tahunan.',
            ],
            [
                'name' => 'SERENITY, UBUD',
                'price' => '900 Juta',
                'ownership' => '1/8 OWNERSHIP',
                'image_url' => 'https://images.unsplash.com/photo-1573843981267-be1999ff37cd?auto=format&fit=crop&w=1920&q=80',
                'details' => 'Termasuk biaya properti, renovasi, perabotan, dan biaya tahunan.',
            ],
        ];
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($properties as $i => $property)
            <div class="bg-white/20 rounded-2xl p-4 transition-all duration-300 hover:shadow-2xl hover:-translate-y-2 relative group"
                data-aos="{{ $i % 2 == 0 ? 'flip-left' : 'flip-right' }}" data-aos-delay="{{ 200 + $i * 200 }}">
                <a href="#" class="block">
                    <div class="overflow-hidden rounded-xl relative">
                        <img src="{{ $property['image_url'] }}" alt="Gambar properti {{ $property['name'] }}" class="w-full h-64 object-cover transform transition-transform duration-500 group-hover:scale-105">
                        <span class="absolute top-4 left-4 bg-brand-blue text-white text-xs font-semibold px-3 py-1 rounded-full shadow-md">Featured</span>
                    </div>
                    <div class="mt-4">
                        <div class="flex justify-between items-start">
                            <h3 class="text-xl font-semibold text-white">{{ $property['name'] }}</h3>
                            <button class="text-gray-200 hover:text-red-500 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </button>
                        </div>
                        <p class="mt-1 text-lg font-bold text-white">{{ $property['price'] }} <span class="text-base font-normal text-white/80"> ({{ $property['ownership'] }})</span></p>
                        <p class="mt-2 text-sm text-white/80 font-light">{{ $property['details'] }}</p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-16" data-aos="flip-up" data-aos-delay="1500">
            <a href="{{ route('properties.index') }}" class="bg-brand-blue text-white px-10 py-4 rounded-lg text-lg font-light inline-block shadow-lg transform transition-all hover:bg-opacity-90 hover:scale-105" data-aos="pulse" data-aos-delay="1700">
                Lihat Semua Properti
            </a>
        </div>
    </div>
</section>

<!-- Sell Your Home Section (Gradient bg + improved layout) -->
<section class="py-24 bg-gradient-to-br from-white via-brand-cream/60 to-brand-blue/10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <!-- Image -->
            <div class="relative rounded-2xl overflow-hidden shadow-2xl order-last lg:order-first" data-aos="flip-left" data-aos-delay="100">
                <img src="https://images.unsplash.com/photo-1600607687644-c7171b42498b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" 
                     alt="Interior rumah modern dan cerah" class="w-full h-auto object-cover">
            </div>
            <!-- Content -->
            <div data-aos="fade-up" data-aos-delay="300">
                <h2 class="text-3xl md:text-4xl font-light text-brand-charcoal font-heading mb-4">
                    Jual Properti Anda <span class="text-brand-blue font-semibold">Bersama Sakanta</span>
                </h2>
                <p class="text-lg text-gray-700 font-light leading-relaxed mb-6">
                    Ingin menjual properti Anda dengan lebih cepat dan harga optimal? Sakanta membantu Anda menjangkau banyak pembeli terverifikasi melalui sistem co-ownership yang transparan.
                </p>
                <ul class="space-y-4 mb-8">
                    @php
                        $features = [
                            'Proses penjualan properti yang cepat & transparan',
                            'Akses ke jaringan pembeli premium yang luas',
                            'Pendampingan legal & administrasi lengkap'
                        ];
                    @endphp
                    @foreach($features as $feature)
                    <li class="flex items-start">
                        <span class="inline-block w-7 h-7 bg-brand-green/20 rounded-full flex items-center justify-center mr-3 mt-1 flex-shrink-0">
                            <svg class="w-5 h-5 text-brand-green" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        </span>
                        <span class="text-gray-700">{{ $feature }}</span>
                    </li>
                    @endforeach
                </ul>
                <div class="pt-2" data-aos="zoom-in" data-aos-delay="600">
                    <a href="#contact" class="inline-block bg-brand-charcoal text-white px-8 py-4 rounded-lg text-lg font-light hover:bg-opacity-90 transition-all transform hover:scale-105 shadow-lg">
                        Hubungi Tim Kami
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
{{-- Script Anda tetap sama --}}
<script>
// ...
</script>
@endpush