@extends('layouts.app')

@section('title', 'Kontak Kami - Sakanta')
@section('description', 'Hubungi tim Sakanta untuk pertanyaan, konsultasi, atau kerjasama investasi properti.')

@section('content')
<section class="py-24 bg-gradient-to-br from-brand-blue/90 via-brand-cream/60 to-brand-green/80 min-h-[60vh]">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12" data-aos="fade-down" data-aos-delay="100">
            <h1 class="text-3xl md:text-4xl font-bold mb-4 text-white font-heading drop-shadow-lg" data-aos="zoom-in" data-aos-delay="200">
                Hubungi Kami
            </h1>
            <p class="text-lg text-white max-w-xl mx-auto font-light" data-aos="fade-up" data-aos-delay="400">
                Tim Sakanta siap membantu Anda untuk segala pertanyaan, konsultasi investasi, atau kerjasama bisnis.
            </p>
        </div>
        <div class="bg-white/60 backdrop-blur-xl rounded-3xl shadow-2xl border border-brand-blue/20 p-8 md:p-12 animate__animated animate__fadeInUp" data-aos="fade-up" data-aos-delay="300">
            @if(session('success'))
                <div class="mb-6 p-4 rounded-lg bg-green-100/90 text-green-900 text-center font-semibold shadow-md animate-fade-in">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('contact.send') }}" method="POST" class="space-y-7">
                @csrf
                <div data-aos="fade-right" data-aos-delay="350">
                    <label for="name" class="block text-sm font-medium text-brand-blue mb-1">Nama Lengkap</label>
                    <input type="text" id="name" name="name" required class="w-full px-4 py-3 rounded-xl border border-brand-blue/30 bg-white/80 focus:ring-2 focus:ring-brand-blue/40 focus:outline-none transition-all duration-200 focus:border-brand-green placeholder-brand-blue/40 text-brand-blue shadow-sm" placeholder="Nama Anda">
                </div>
                <div data-aos="fade-right" data-aos-delay="400">
                    <label for="email" class="block text-sm font-medium text-brand-blue mb-1">Email</label>
                    <input type="email" id="email" name="email" required class="w-full px-4 py-3 rounded-xl border border-brand-blue/30 bg-white/80 focus:ring-2 focus:ring-brand-blue/40 focus:outline-none transition-all duration-200 focus:border-brand-green placeholder-brand-blue/40 text-brand-blue shadow-sm" placeholder="email@anda.com">
                </div>
                <div data-aos="fade-right" data-aos-delay="450">
                    <label for="message" class="block text-sm font-medium text-brand-blue mb-1">Pesan</label>
                    <textarea id="message" name="message" rows="5" required class="w-full px-4 py-3 rounded-xl border border-brand-blue/30 bg-white/80 focus:ring-2 focus:ring-brand-blue/40 focus:outline-none transition-all duration-200 focus:border-brand-green placeholder-brand-blue/40 text-brand-blue shadow-sm" placeholder="Tulis pesan Anda di sini..."></textarea>
                </div>
                <div class="pt-2 text-center" data-aos="zoom-in" data-aos-delay="500">
                    <button type="submit" class="relative bg-gradient-to-r from-brand-blue via-brand-green to-brand-blue text-white px-10 py-4 rounded-xl text-lg font-semibold shadow-xl transition-all duration-100 focus:outline-none focus:ring-4 focus:ring-brand-blue/30 group overflow-hidden animate__animated animate__pulse animate__infinite animate__faster"
                        style="box-shadow: 0 2px 8px 0 rgba(30,64,175,0.15);">
                        Kirim Pesan
                    </button>
                </div>
            </form>
            <div class="mt-10 text-center text-brand-blue/90 text-base flex flex-col gap-2 items-center" data-aos="fade-up" data-aos-delay="600">
                <a href="mailto:info@sakanta.com" class="underline hover:text-brand-green transition block">info@sakanta.com</a>
                <a href="https://wa.me/6281234567890" class="underline hover:text-brand-blue transition block">+62 812-3456-7890</a>
            </div>
        </div>
    </div>
</section>
@endsection
