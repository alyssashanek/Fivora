<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title', 'Fivora')</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>

<div class="shell">
  {{-- PANEL KIRI: beda teks tergantung halaman (login/register) --}}
  <div class="side">
    <div class="brand"><span class="dot"></span> Fivora</div>

    <h1>@yield('side-title')</h1>
    <p class="lead">@yield('side-lead')</p>

    <div class="campus-slider">
    <img src="{{ asset('images/campus1.jpg') }}" class="slide active" alt="Fasilitas kampus 1">
    <img src="{{ asset('images/campus2.jpg') }}" class="slide" alt="Fasilitas kampus 2">
    <img src="{{ asset('images/campus3.jpg') }}" class="slide" alt="Fasilitas kampus 3">

    <div class="slide-dots">
        <span class="dot active" data-index="0"></span>
        <span class="dot" data-index="1"></span>
        <span class="dot" data-index="2"></span>
    </div>
    </div>

    <!-- <div class="features">
      <div class="feature">
        <div class="icon">📅</div>
        <div><b>Reservasi Fasilitas</b><span>Cek ketersediaan dan ajukan reservasi ruang, kelas, laboratorium, dan lainnya.</span></div>
      </div>
      <div class="feature">
        <div class="icon">🛠️</div>
        <div><b>Laporkan Kerusakan</b><span>Bantu kami menjaga fasilitas kampus tetap dalam kondisi baik.</span></div>
      </div>
      <div class="feature">
        <div class="icon">🛡️</div>
        <div><b>Sistem Terintegrasi</b><span>Semua proses dalam satu platform, mudah dan aman.</span></div>
      </div>
    </div> -->

    <!-- <div class="tagline">Satu Sistem, Banyak Manfaat</div> -->
  </div>

  {{-- PANEL KANAN: form login/register diisi lewat @yield('form') --}}
  <div class="panel">
    @yield('panel-top')

    <div class="form-wrap">
      @yield('form')
    </div>
  </div>
</div>

<div class="toast" id="toast"></div>

<script src="{{ asset('js/auth.js') }}"></script>
@yield('scripts')

</body>
</html>