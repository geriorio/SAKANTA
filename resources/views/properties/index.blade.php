@extends('layouts.app')

@section('title', 'Jelajahi Property - Sakanta')
@section('description', 'Temukan property co-ownership terbaik di berbagai lokasi strategis. Investasi property mulai dari Rp 50 juta dengan sistem bagi hasil.')

@section('content')

<!-- Hero Section -->
<section class="bg-gradient-natural text-white py-16 relative">
    <!-- Background Image -->
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1973&q=80" 
             alt="Properties Background" class="w-full h-full object-cover opacity-20">
        <div class="absolute inset-0 bg-gradient-to-r from-black/60 via-black/40 to-black/60"></div>
    </div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-8">
            <h1 class="text-3xl md:text-4xl font-light mb-4 font-heading">Jelajahi Property Co-Ownership</h1>
            <p class="text-xl text-gray-200 max-w-3xl mx-auto font-light">
                Temukan property impian Anda dengan sistem kepemilikan bersama. Investasi property kini lebih terjangkau.
            </p>
        </div>
        
        <!-- Search Form -->
        <div class="max-w-4xl mx-auto">
            <form method="GET" action="{{ route('properties.index') }}" class="bg-white/95 backdrop-blur-sm rounded-2xl p-6 shadow-xl">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                        <label class="block text-sm font-normal text-gray-700 mb-2">Cari Property</label>
                        <input type="text" 
                               name="search" 
                               value="{{ request('search') }}"
                               placeholder="Lokasi, nama property..." 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 font-light">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-normal text-gray-700 mb-2">Tipe Property</label>
                        <select name="type" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 font-light">
                            <option value="">Semua Tipe</option>
                            @foreach($propertyTypes as $type)
                            <option value="{{ $type }}" {{ request('type') == $type ? 'selected' : '' }}>
                                {{ ucfirst($type) }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-normal text-gray-700 mb-2">Kota</label>
                        <select name="city" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 font-light">
                            <option value="">Semua Kota</option>
                            @foreach($cities as $city)
                            <option value="{{ $city }}" {{ request('city') == $city ? 'selected' : '' }}>
                                {{ $city }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="flex items-end">
                        <button type="submit" class="w-full bg-sage hover:bg-moss text-white font-normal py-3 px-6 rounded-lg transition-colors duration-200 shadow-sm">
                            Cari Property
                        </button>
                    </div>
                </div>
                
                <!-- Price Range -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                    <div>
                        <label class="block text-sm font-normal text-gray-700 mb-2">Harga Minimum (per saham)</label>
                        <input type="number" 
                               name="min_price" 
                               value="{{ request('min_price') }}"
                               placeholder="50000000" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 font-light">
                    </div>
                    <div>
                        <label class="block text-sm font-normal text-gray-700 mb-2">Harga Maksimum (per saham)</label>
                        <input type="number" 
                               name="max_price" 
                               value="{{ request('max_price') }}"
                               placeholder="500000000" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 font-light">
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- Results Section -->
<section class="py-12 bg-cream/30">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Results Header -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h2 class="text-2xl font-light text-olive font-heading">
                    Property Tersedia
                    @if(request()->hasAny(['search', 'type', 'city', 'min_price', 'max_price']))
                        - {{ $properties->total() }} hasil ditemukan
                    @endif
                </h2>
                @if(request()->hasAny(['search', 'type', 'city', 'min_price', 'max_price']))
                <div class="flex flex-wrap gap-2 mt-2">
                    @if(request('search'))
                    <span class="bg-sage/20 text-olive px-3 py-1 rounded-full text-sm font-light">
                        "{{ request('search') }}"
                        <a href="{{ request()->fullUrlWithQuery(['search' => null]) }}" class="ml-1 text-sage hover:text-moss">×</a>
                    </span>
                    @endif
                    @if(request('type'))
                    <span class="bg-taupe/20 text-olive px-3 py-1 rounded-full text-sm font-light">
                        {{ ucfirst(request('type')) }}
                        <a href="{{ request()->fullUrlWithQuery(['type' => null]) }}" class="ml-1 text-taupe hover:text-moss">×</a>
                    </span>
                    @endif
                    @if(request('city'))
                    <span class="bg-moss/20 text-olive px-3 py-1 rounded-full text-sm font-light">
                        {{ request('city') }}
                        <a href="{{ request()->fullUrlWithQuery(['city' => null]) }}" class="ml-1 text-moss hover:text-olive">×</a>
                    </span>
                    @endif
                    <a href="{{ route('properties.index') }}" class="text-sage hover:text-moss text-sm font-normal">
                        Hapus semua filter
                    </a>
                </div>
                @endif
            </div>
            
            <div class="hidden md:flex items-center space-x-4">
                <span class="text-olive text-sm font-normal">Urutkan:</span>
                <select class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-amber-500 focus:border-amber-500 font-light">
                    <option>Terbaru</option>
                    <option>Harga Terendah</option>
                    <option>Harga Tertinggi</option>
                    <option>Yield Tertinggi</option>
                </select>
            </div>
        </div>

        @if($properties->count() > 0)
        <!-- Properties Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-12">
            @foreach($properties as $property)
            <div class="bg-white/95 backdrop-blur-sm rounded-2xl shadow-lg overflow-hidden property-card group border border-sage/10">
                <div class="relative">
                    <img src="{{ $property->main_image }}" alt="{{ $property->title }}" class="w-full h-56 object-cover group-hover:scale-105 transition-transform duration-300">
                    
                    <!-- Badges -->
                    <div class="absolute top-3 left-3">
                        <span class="bg-sage text-white px-2 py-1 rounded-lg text-xs font-normal">
                            {{ $property->available_shares }}/{{ $property->total_shares }} Tersedia
                        </span>
                    </div>
                    
                    @if($property->expected_rental_yield)
                    <div class="absolute top-3 right-3">
                        <span class="bg-moss text-white px-2 py-1 rounded-lg text-xs font-normal">
                            {{ $property->expected_rental_yield }}% Yield
                        </span>
                    </div>
                    @endif
                    
                    <!-- Property Type -->
                    <div class="absolute bottom-3 left-3">
                        <span class="bg-white/95 text-olive px-2 py-1 rounded-lg text-xs font-normal">
                            {{ ucfirst($property->property_type) }}
                        </span>
                    </div>
                </div>
                
                <div class="p-5">
                    <h3 class="text-lg font-light text-olive mb-2 line-clamp-2 font-heading">{{ $property->title }}</h3>
                    <p class="text-taupe text-sm mb-3 flex items-center font-light">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        {{ $property->city }}, {{ $property->province }}
                    </p>
                    
                    <!-- Property Features -->
                    @if($property->bedrooms || $property->bathrooms)
                    <div class="flex items-center space-x-4 mb-4 text-sm text-taupe font-light">
                        @if($property->bedrooms)
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                            </svg>
                            {{ $property->bedrooms }} KT
                        </div>
                        @endif
                        @if($property->bathrooms)
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10v11M20 10v11"></path>
                            </svg>
                        </div>
                        @endif
                    </div>
                    @endif
                    
                    <!-- Price & Action -->
                    <div class="border-t border-sage/20 pt-4">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-taupe text-sm font-light">Harga per saham (1/{{ $property->total_shares }})</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="text-xl font-normal text-sage">
                                    {{ $property->formatted_price_per_share }}
                                </span>
                                @if($property->expected_rental_yield)
                                <p class="text-sm text-moss font-light">
                                    ~{{ number_format($property->price_per_share * $property->expected_rental_yield / 100 / 12, 0, ',', '.') }}/bulan
                                </p>
                                @endif
                            </div>
                            <a href="{{ route('properties.show', $property) }}" 
                               class="bg-sage text-white px-4 py-2 rounded-lg hover:bg-moss transition-colors font-normal text-sm">
                                Detail
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <!-- Pagination -->
        <div class="flex justify-center">
            {{ $properties->appends(request()->query())->links() }}
        </div>
        
        @else
        <!-- No Results -->
        <div class="text-center py-16">
            <div class="w-24 h-24 bg-cream rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-12 h-12 text-taupe" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                </svg>
            </div>
            <h3 class="text-xl font-light text-olive mb-2 font-heading">Tidak ada property yang ditemukan</h3>
            <p class="text-taupe mb-6 font-light">Coba ubah filter pencarian atau lihat semua property yang tersedia.</p>
            <a href="{{ route('properties.index') }}" class="bg-sage hover:bg-moss text-white px-6 py-3 rounded-lg font-normal">
                Lihat Semua Property
            </a>
        </div>
        @endif
    </div>
</section>

<!-- Why Choose Sakanta -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Mengapa Investasi dengan Sakanta?</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Platform co-ownership property terpercaya dengan track record yang terbukti dan transparansi penuh.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center p-6">
                <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">Proses Legal Lengkap</h3>
                <p class="text-gray-600">
                    Semua dokumen kepemilikan sah dan terdaftar secara legal dengan dukungan tim hukum berpengalaman.
                </p>
            </div>
            
            <div class="text-center p-6">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">Return Konsisten</h3>
                <p class="text-gray-600">
                    Dapatkan passive income dari rental yield dan capital appreciation dengan proyeksi return yang realistis.
                </p>
            </div>
            
            <div class="text-center p-6">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">Komunitas Investor</h3>
                <p class="text-gray-600">
                    Bergabung dengan ribuan investor yang saling berbagi pengalaman dan insight investasi property.
                </p>
            </div>
        </div>
    </div>
</section>

@endsection

@push('styles')
<style>
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>
@endpush
