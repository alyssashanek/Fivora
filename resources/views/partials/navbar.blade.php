<header class="sticky top-0 z-40 bg-fv-surface/90 backdrop-blur border-b border-fv">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">

            <a href="{{ url('/') }}" class="flex items-center gap-2 font-display font-extrabold text-lg text-fv-ink">
                <span class="w-8 h-8 rounded-lg bg-fv-gradient flex items-center justify-center text-white text-sm">F</span>
                Fivora
            </a>

            <nav class="hidden md:flex items-center gap-8 text-sm font-medium text-fv-ink-soft">
                <a href="{{ url('/') }}" class="text-fv-ink font-semibold">Beranda</a>
                <a href="{{ route_or('katalog') }}" class="hover:text-fv-ink transition">Katalog</a>
                <a href="{{ route_or('tentang') }}" class="hover:text-fv-ink transition">Tentang</a>
            </nav>

            <div class="flex items-center gap-3">
                <div class="hidden lg:flex items-center gap-2 px-3 py-1.5 rounded-full border border-fv text-sm text-fv-ink-soft w-56">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-fv-ink-soft" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M17 10.5a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z" />
                    </svg>
                    <span class="truncate">Cari fasilitas...</span>
                </div>

                <button id="theme-toggle" type="button" class="theme-toggle" aria-label="Ganti tema gelap/terang">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-sun w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1.5M12 19.5V21M4.22 4.22l1.06 1.06M18.72 18.72l1.06 1.06M3 12h1.5M19.5 12H21M4.22 19.78l1.06-1.06M18.72 5.28l1.06-1.06M16.5 12a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-moon w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z" />
                    </svg>
                </button>

                <a href="{{ route_or('login') }}" class="hidden sm:inline-flex px-4 py-2 rounded-lg text-sm font-semibold btn-fv-outline transition">
                    Login
                </a>
                <a href="{{ route_or('register') }}" class="inline-flex px-4 py-2 rounded-lg text-sm font-semibold btn-fv-primary transition">
                    Daftar
                </a>
            </div>
        </div>
    </div>
</header>