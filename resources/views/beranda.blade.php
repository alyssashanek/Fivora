@extends('layouts.app')

@section('title', 'Fivora - Temukan & Gunakan Fasilitas Kampus dengan Mudah')

@section('content')

{{-- ============================= HERO ============================= --}}
<section class="bg-fv-hero border-b border-fv">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-20 grid lg:grid-cols-2 gap-10 items-center">
        <div>
            <h1 class="font-display font-extrabold text-4xl sm:text-5xl leading-tight text-fv-ink">
                Temukan &amp; Gunakan Fasilitas Kampus dengan Mudah
            </h1>
            <p class="mt-5 text-fv-ink-soft text-base sm:text-lg max-w-lg">
                Cari fasilitas kampus, cek ketersediaannya, dan ajukan reservasi dalam satu platform.
            </p>

            <form action="{{ route_or('katalog') }}" method="GET" class="mt-8 flex items-center gap-2 bg-white rounded-xl border-4 p-2 shadow-sm max-w-lg" style="border-color: var(--purple-300);">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-fv-ink-soft ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M17 10.5a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z" />
                </svg>
                <input type="text" name="q" placeholder="Cari fasilitas..."
                       class="flex-1 bg-transparent outline-none text-sm text-fv-ink placeholder:text-fv-ink-soft/70 px-1">
                <button type="submit" class="btn-fv-primary rounded-lg px-4 py-2.5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M17 10.5a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z" />
                    </svg>
                </button>
            </form>
        </div>

        <div class="relative hidden lg:block">
            <div class="absolute -inset-6 bg-fv-gradient rounded-[2rem] opacity-40 blur-2xl"></div>
            <img src="{{ asset('images/hero-campus.svg') }}" alt="Ilustrasi gedung kampus"
                 class="relative w-full max-w-md mx-auto drop-shadow-xl" onerror="this.style.display='none'">
        </div>
    </div>
</section>

{{-- ==================== KATEGORI FASILITAS ==================== --}}
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
    <h2 class="font-display font-bold text-xl text-fv-ink mb-6">Kategori Fasilitas</h2>

    @php
        $categories = $categories ?? [
            ['label' => 'Ruang Kelas',   'icon' => '🏫'],
            ['label' => 'Laboratorium',  'icon' => '🧪'],
            ['label' => 'Aula',          'icon' => '🏛️'],
            ['label' => 'Alat',          'icon' => '🛠️'],
            ['label' => 'Lapangan',      'icon' => '⚽'],
        ];
    @endphp

    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4">
        @foreach ($categories as $cat)
            <a href="{{ isset($cat['slug']) ? route_or('katalog') . '?tipe=' . $cat['slug'] : route_or('katalog') }}"
               class="card-fv flex flex-col items-center justify-center gap-2 py-6 px-3 text-center">
                <span class="text-2xl">{{ $cat['icon'] }}</span>
                <span class="text-sm font-semibold text-fv-ink">{{ $cat['label'] }}</span>
            </a>
        @endforeach
    </div>
</section>

{{-- ==================== FASILITAS POPULER ==================== --}}
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
    <div class="flex items-center justify-between mb-6">
        <h2 class="font-display font-bold text-xl text-fv-ink">Fasilitas Populer</h2>
        <a href="{{ route_or('katalog') }}" class="text-sm font-semibold hover:underline" style="color:var(--purple-700)">
            Lihat Semua &rarr;
        </a>
    </div>

    @php
        $popularFacilities = $popularFacilities ?? [
            ['nama' => 'Ruang Kelas A1',        'lokasi' => 'Gedung A - Lantai 1', 'status' => 'Tersedia',       'gambar' => null],
            ['nama' => 'Laboratorium Komputer',  'lokasi' => 'Gedung B - Lantai 2', 'status' => 'Tersedia',       'gambar' => null],
            ['nama' => 'Aula Serbaguna',         'lokasi' => 'Gedung C - Lantai 1', 'status' => 'Tidak Tersedia', 'gambar' => null],
            ['nama' => 'Lapangan Basket',        'lokasi' => 'Outdoor',             'status' => 'Tersedia',       'gambar' => null],
        ];
    @endphp

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        @foreach ($popularFacilities as $f)
            <div class="card-fv overflow-hidden">
                <div class="h-32 w-full" style="background: linear-gradient(135deg, var(--fv-blush), var(--fv-lilac));"></div>
                <div class="p-4">
                    <h3 class="font-semibold text-fv-ink">{{ $f['nama'] }}</h3>
                    <p class="text-xs text-fv-ink-soft mt-1">{{ $f['lokasi'] }}</p>
                    <span class="inline-block mt-3 text-xs font-semibold px-2.5 py-1 rounded-full {{ $f['status'] === 'Tersedia' ? 'badge-tersedia' : 'badge-tidak-tersedia' }}">
                        {{ $f['status'] }}
                    </span>
                    <a href="{{ route_or('fasilitas.detail', ['id' => $f['nama'] ?? 1]) }}"
                       class="block mt-3 text-sm font-semibold text-right" style="color:var(--purple-700)">
                        Lihat Detail &rarr;
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</section>

{{-- ==================== CARA MENGGUNAKAN FIVORA ==================== --}}
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
    <h2 class="font-display font-bold text-xl text-fv-ink mb-8">Cara Menggunakan Fivora</h2>

    @php
        $steps = $steps ?? [
            ['title' => 'Cari Fasilitas',        'desc' => 'Temukan fasilitas yang kamu butuhkan.'],
            ['title' => 'Cek Ketersediaan',      'desc' => 'Lihat jadwal slot fasilitas.'],
            ['title' => 'Login / Daftar',        'desc' => 'Buat akun untuk melanjutkan reservasi.'],
            ['title' => 'Ajukan Reservasi',      'desc' => 'Isi form reservasi dengan tujuan penggunaan.'],
            ['title' => 'Pantau Status',         'desc' => 'Cek status reservasi dan laporan kamu.'],
        ];
    @endphp

    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-6">
        @foreach ($steps as $i => $step)
            <div class="text-center">
                <div class="step-number mx-auto flex items-center justify-center font-display font-bold">
                    {{ $i + 1 }}
                </div>
                <h3 class="mt-3 text-sm font-semibold text-fv-ink">{{ $step['title'] }}</h3>
                <p class="mt-1 text-xs text-fv-ink-soft">{{ $step['desc'] }}</p>
            </div>
        @endforeach
    </div>
</section>

{{-- ==================== BANNER LAPORAN MASALAH ==================== --}}
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-16">
    <div class="rounded-2xl p-8 flex flex-col sm:flex-row items-center justify-between gap-5"
         style="background: linear-gradient(120deg, var(--fv-lilac), var(--purple-500));">
        <div class="text-white">
            <h3 class="font-display font-bold text-lg">Ada fasilitas yang bermasalah?</h3>
            <p class="text-sm text-white/85 mt-1 max-w-md">
                Bantu kami menjaga kualitas fasilitas kampus dengan melaporkan kerusakan melalui form laporan setelah login.
            </p>
        </div>
        <a href="{{ route_or('login') }}" class="bg-white text-sm font-semibold px-5 py-2.5 rounded-lg whitespace-nowrap" style="color:var(--purple-700)">
            Laporkan Masalah
        </a>
    </div>
</section>

@endsection