<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Fivora - Sistem Reservasi & Pelaporan Fasilitas Kampus')</title>

    {{-- Set tema SEBELUM CSS dimuat, biar gak ada flash putih->gelap --}}
    <script>
        (function () {
            const saved = localStorage.getItem('fivora-theme');
            const theme = saved || 'light';
            document.documentElement.setAttribute('data-theme', theme);
        })();
    </script>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-fv-bg text-fv-ink antialiased">

    @include('partials.navbar')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    <script>
        const themeToggle = document.getElementById('theme-toggle');
        if (themeToggle) {
            themeToggle.addEventListener('click', () => {
                const html = document.documentElement;
                const next = html.getAttribute('data-theme') === 'dark' ? 'light' : 'dark';
                html.setAttribute('data-theme', next);
                localStorage.setItem('fivora-theme', next);
            });
        }
    </script>

</body>
</html>