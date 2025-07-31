@extends('layouts.app')

@section('title', $property->title . ' - Sakanta')
@section('description', 'Investasi co-ownership untuk ' . $property->title . ' di ' . $property->city . '. Mulai dari ' . $property->formatted_price_per_share . ' untuk 1/' . $property->total_shares . ' bagian.')

@section('content')

<!-- Property Header -->
<section class="bg-gradient-natural text-white py-12 relative">
    <!-- Background Image -->
    <div class="absolute inset-0 z-0">
        <img src="{{ $property->main_image }}" 
             alt="{{ $property->title }}" class="w-full h-full object-cover opacity-20">
        <div class="absolute inset-0 bg-gradient-to-r from-black/60 via-black/40 to-black/60"></div>
    </div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <nav class="text-sm mb-6">
            <ol class="flex items-center space-x-2 text-gray-300">
                <li><a href="{{ route('home') }}" class="hover:text-white font-light">Beranda</a></li>
                <li>/</li>
                <li><a href="{{ route('properties.index') }}" class="hover:text-white font-light">Property</a></li>
                <li>/</li>
                <li class="text-white font-light">{{ $property->title }}</li>
            </ol>
        </nav>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
            <div>
                <div class="flex items-center mb-4">
                    <span class="bg-sage text-white px-3 py-1 rounded-full text-sm font-normal mr-3">
                        {{ $property->available_shares }}/{{ $property->total_shares }} Saham Tersedia
                    </span>
                    @if($property->expected_rental_yield)
                    <span class="bg-moss text-white px-3 py-1 rounded-full text-sm font-normal">
                        {{ $property->expected_rental_yield }}% Yield/Tahun
                    </span>
                    @endif
                </div>
                
                <h1 class="text-3xl md:text-4xl font-light mb-4 font-heading">{{ $property->title }}</h1>
                <p class="text-xl text-gray-200 mb-6 font-light">
                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    {{ $property->address }}, {{ $property->city }}, {{ $property->province }}
                </p>
                
                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-6">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <span class="text-gray-300 text-sm font-light">Total Harga</span>
                            <div class="text-2xl font-normal">{{ $property->formatted_price }}</div>
                        </div>
                        <div>
                            <span class="text-gray-300 text-sm font-light">Harga per Saham (1/{{ $property->total_shares }})</span>
                            <div class="text-2xl font-normal text-cream">{{ $property->formatted_price_per_share }}</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="lg:text-right">
                <div class="bg-white/95 backdrop-blur-sm rounded-2xl p-6 shadow-xl border border-sage/10">
                    <h3 class="text-xl font-light text-olive mb-4 font-heading">Mulai Investasi</h3>
                    
                    <form action="#" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label class="block text-sm font-normal text-olive mb-2">Jumlah Saham</label>
                            <select class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-amber-500 focus:border-amber-500 font-light">
                                @for($i = 1; $i <= $property->available_shares; $i++)
                                <option value="{{ $i }}">{{ $i }} Saham ({{ number_format($property->price_per_share * $i, 0, ',', '.') }})</option>
                                @endfor
                            </select>
                        </div>
                        
                        <div class="bg-cream/30 rounded-lg p-4">
                            <div class="flex justify-between text-sm text-taupe mb-2 font-light">
                                <span>Subtotal</span>
                                <span>{{ $property->formatted_price_per_share }}</span>
                            </div>
                            <div class="flex justify-between text-sm text-taupe mb-2 font-light">
                                <span>Biaya Admin</span>
                                <span>Rp 500.000</span>
                            </div>
                            <div class="border-t border-sage/20 pt-2">
                                <div class="flex justify-between font-normal text-olive">
                                    <span>Total</span>
                                    <span>Rp {{ number_format($property->price_per_share + 500000, 0, ',', '.') }}</span>
                                </div>
                            </div>
                        </div>
                        
                        @auth
                            <button type="submit" class="w-full bg-sage hover:bg-moss text-white py-3 rounded-lg font-normal">
                                Beli Sekarang
                            </button>
                        @else
                            <a href="{{ route('login') }}" class="block w-full bg-sage hover:bg-moss text-white py-3 rounded-lg font-normal text-center">
                                Login untuk Investasi
                            </a>
                        @endauth
                        
                        <p class="text-xs text-taupe text-center font-light">
                            Dengan melakukan pembelian, Anda menyetujui syarat dan ketentuan kami.
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Property Images -->
<section class="py-12 bg-cream/20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-4">
            @if(isset($property->images[0]))
            <div class="lg:col-span-2 lg:row-span-2">
                <img src="{{ $property->images[0] }}" alt="{{ $property->title }}" class="w-full h-96 lg:h-full object-cover rounded-xl">
            </div>
            @endif
            
            @for($i = 1; $i < min(5, count($property->images)); $i++)
            <div class="{{ $i > 2 ? 'hidden lg:block' : '' }}">
                <img src="{{ $property->images[$i] }}" alt="{{ $property->title }}" class="w-full h-44 object-cover rounded-xl">
            </div>
            @endfor
            
            @if(count($property->images) > 5)
            <div class="relative">
                <img src="{{ $property->images[4] }}" alt="{{ $property->title }}" class="w-full h-44 object-cover rounded-xl">
                <div class="absolute inset-0 bg-black bg-opacity-50 rounded-xl flex items-center justify-center">
                    <span class="text-white text-lg font-normal">+{{ count($property->images) - 4 }} Foto</span>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>

<!-- Property Details -->
<section class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Main Content -->
            <div class="lg:col-span-2">
                <!-- Description -->
                <div class="bg-white/95 backdrop-blur-sm rounded-xl p-6 mb-8 border border-sage/10">
                    <h2 class="text-2xl font-light text-olive mb-4 font-heading">Deskripsi Property</h2>
                    <div class="prose prose-olive max-w-none text-taupe font-light">
                        {!! nl2br(e($property->description)) !!}
                    </div>
                </div>
                
                <!-- Specifications -->
                <div class="bg-white/95 backdrop-blur-sm rounded-xl p-6 mb-8 border border-sage/10">
                    <h2 class="text-2xl font-light text-olive mb-6 font-heading">Spesifikasi</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-4">
                            <div class="flex items-center justify-between py-2 border-b border-sage/20">
                                <span class="text-taupe font-light">Tipe Property</span>
                                <span class="font-normal text-olive">{{ ucfirst($property->property_type) }}</span>
                            </div>
                            @if($property->bedrooms)
                            <div class="flex items-center justify-between py-2 border-b border-sage/20">
                                <span class="text-taupe font-light">Kamar Tidur</span>
                                <span class="font-normal text-olive">{{ $property->bedrooms }}</span>
                            </div>
                            @endif
                            @if($property->bathrooms)
                            <div class="flex items-center justify-between py-2 border-b border-sage/20">
                                <span class="text-taupe font-light">Kamar Mandi</span>
                                <span class="font-normal text-olive">{{ $property->bathrooms }}</span>
                            </div>
                            @endif
                        </div>
                        <div class="space-y-4">
                            @if($property->land_area)
                            <div class="flex items-center justify-between py-2 border-b border-sage/20">
                                <span class="text-taupe font-light">Luas Tanah</span>
                                <span class="font-normal text-olive">{{ $property->land_area }} m²</span>
                            </div>
                            @endif
                            @if($property->building_area)
                            <div class="flex items-center justify-between py-2 border-b border-sage/20">
                                <span class="text-taupe font-light">Luas Bangunan</span>
                                <span class="font-normal text-olive">{{ $property->building_area }} m²</span>
                            </div>
                            @endif
                            <div class="flex items-center justify-between py-2 border-b border-sage/20">
                                <span class="text-taupe font-light">Total Saham</span>
                                <span class="font-normal text-olive">{{ $property->total_shares }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Amenities -->
                @if($property->amenities && count($property->amenities) > 0)
                <div class="bg-white/95 backdrop-blur-sm rounded-xl p-6 border border-sage/10">
                    <h2 class="text-2xl font-light text-olive mb-6 font-heading">Fasilitas</h2>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                        @foreach($property->amenities as $amenity)
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-sage mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-taupe font-light">{{ $amenity }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
            
            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <!-- Investment Summary -->
                <div class="bg-white/95 backdrop-blur-sm rounded-xl p-6 mb-6 sticky top-24 border border-sage/10">
                    <h3 class="text-xl font-light text-olive mb-4 font-heading">Ringkasan Investasi</h3>
                    
                    <div class="space-y-4">
                        <div class="flex justify-between items-center py-2 border-b border-sage/20">
                            <span class="text-taupe font-light">Harga per Saham</span>
                            <span class="font-normal text-sage">{{ $property->formatted_price_per_share }}</span>
                        </div>
                        
                        <div class="flex justify-between items-center py-2 border-b border-sage/20">
                            <span class="text-taupe font-light">Saham Tersedia</span>
                            <span class="font-normal text-olive">{{ $property->available_shares }}/{{ $property->total_shares }}</span>
                        </div>
                        
                        @if($property->expected_rental_yield)
                        <div class="flex justify-between items-center py-2 border-b border-sage/20">
                            <span class="text-taupe font-light">Rental Yield</span>
                            <span class="font-normal text-moss">{{ $property->expected_rental_yield }}%/tahun</span>
                        </div>
                        @endif
                        
                        <div class="bg-cream/30 rounded-lg p-4">
                            <h4 class="font-normal text-olive mb-2">Proyeksi Return (1 saham)</h4>
                            <div class="text-sm text-taupe space-y-1 font-light">
                                @if($property->expected_rental_yield)
                                <div class="flex justify-between">
                                    <span>Rental yield/tahun:</span>
                                    <span>Rp {{ number_format($property->price_per_share * $property->expected_rental_yield / 100, 0, ',', '.') }}</span>
                                </div>
                                @endif
                                <div class="flex justify-between">
                                    <span>Capital appreciation (5 tahun, 5%):</span>
                                    <span>Rp {{ number_format($property->price_per_share * 0.28, 0, ',', '.') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Contact Agent -->
                <div class="bg-gradient-natural text-white rounded-xl p-6">
                    <h3 class="text-lg font-light mb-4 font-heading">Butuh Konsultasi?</h3>
                    <p class="text-sm mb-4 text-gray-200 font-light">
                        Tim ahli kami siap membantu Anda membuat keputusan investasi terbaik.
                    </p>
                    <a href="https://wa.me/628123456789" target="_blank" class="block w-full bg-white text-sage py-3 rounded-lg font-normal text-center hover:bg-cream transition-colors">
                        Chat WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Properties -->
@if($relatedProperties->count() > 0)
<section class="py-12 bg-cream/20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl md:text-3xl font-light text-olive mb-8 font-heading">Property Serupa di {{ $property->city }}</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($relatedProperties as $related)
            <div class="bg-white/95 backdrop-blur-sm rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 border border-sage/10">
                <div class="relative">
                    <img src="{{ $related->main_image }}" alt="{{ $related->title }}" class="w-full h-48 object-cover">
                    <div class="absolute top-3 left-3">
                        <span class="bg-sage text-white px-2 py-1 rounded-lg text-xs font-normal">
                            {{ $related->available_shares }}/{{ $related->total_shares }}
                        </span>
                    </div>
                </div>
                
                <div class="p-4">
                    <h3 class="font-light text-olive mb-1 truncate font-heading">{{ $related->title }}</h3>
                    <p class="text-taupe text-sm mb-3 font-light">{{ $related->city }}</p>
                    
                    <div class="flex justify-between items-center">
                        <span class="text-lg font-normal text-sage">
                            {{ $related->formatted_price_per_share }}
                        </span>
                        <a href="{{ route('properties.show', $related) }}" class="text-sage text-sm font-normal hover:text-moss">
                            Lihat →
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection
