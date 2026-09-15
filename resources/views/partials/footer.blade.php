<footer class="bg-fv-ink text-white mt-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="flex items-center gap-2 font-display font-bold">
                <span class="w-7 h-7 rounded-lg bg-fv-gradient flex items-center justify-center text-white text-xs">F</span>
                Fivora
            </div>
            <p class="text-sm text-white/70 text-center">Sistem Reservasi &amp; Pelaporan Fasilitas Kampus</p>
            <nav class="flex gap-5 text-sm text-white/80">
                <a href="{{ url('/') }}" class="hover:text-white">Beranda</a>
                <a href="{{ route_or('katalog') }}" class="hover:text-white">Katalog</a>
                <a href="{{ route_or('tentang') }}" class="hover:text-white">Tentang</a>
                <a href="{{ route_or('login') }}" class="hover:text-white">Login</a>
                <a href="{{ route_or('register') }}" class="hover:text-white">Daftar</a>
            </nav>
        </div>
        <p class="text-center text-xs text-white/50 mt-6">&copy; {{ date('Y') }} Fivora. All rights reserved.</p>
    </div>
</footer>