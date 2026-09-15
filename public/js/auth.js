// public/js/auth.js
// Validasi SISI CLIENT saja (pengecekan cepat & UX).
// Validasi wajib tetap diulang di SISI SERVER (lihat app/Http/Requests/ atau Controller).

document.addEventListener('DOMContentLoaded', function () {

  // ---- Toggle tampilkan/sembunyikan password ----
  document.querySelectorAll('.toggle-pass').forEach(function (btn) {
    btn.addEventListener('click', function () {
        var target = document.getElementById(btn.dataset.target);
        if (!target) return;
        if (target.type === 'password') {
            target.type = 'text';
            btn.classList.add('showing');
        } else {
            target.type = 'password';
            btn.classList.remove('showing');
        }
    });
  });

  function setError(inputId, msg) {
    var box = document.getElementById('box-' + inputId);
    var err = document.getElementById('err-' + inputId);
    if (!box || !err) return;
    if (msg) {
      box.classList.add('invalid');
      err.textContent = msg;
    } else {
      box.classList.remove('invalid');
      err.textContent = '';
    }
  }

  var emailRe = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  // ---- Validasi form REGISTER ----
  var registerForm = document.getElementById('registerForm');
  if (registerForm) {
    registerForm.addEventListener('submit', function (e) {
      var valid = true;

      var name = document.getElementById('reg-name').value.trim();
      var email = document.getElementById('reg-email').value.trim();
      var nim = document.getElementById('reg-nim').value.trim();
      var nimInput = document.getElementById('reg-nim');
        if (nimInput) {
            nimInput.addEventListener('input', function () {
                this.value = this.value.replace(/\D/g, ''); // hapus semua yang bukan angka
            });
        }
      var pass = document.getElementById('reg-pass').value;

      if (name.length < 3) {
        setError('reg-name', 'Nama lengkap minimal 3 karakter.');
        valid = false;
      } else setError('reg-name', '');

      if (!emailRe.test(email)) {
        setError('reg-email', 'Format email tidak valid.');
        valid = false;
      } else setError('reg-email', '');

      if (!/^\d+$/.test(nim)) {
        setError('reg-nim', 'NIM/NIP hanya boleh berisi angka.');
        valid = false;
    } else if (nim.length < 14) {
        setError('reg-nim', 'NIM/NIP minimal 14 digit.');
        valid = false;
    } else setError('reg-nim', '');

      if (pass.length < 8) {
        setError('reg-pass', 'Password minimal 8 karakter.');
        valid = false;
      } else setError('reg-pass', '');

      // Kalau tidak valid, batalkan submit ke server.
      // Kalau valid, biarkan form submit natural ke route POST /register.
      if (!valid) e.preventDefault();
    });
  }

  // ---- Validasi form LOGIN ----
  var loginForm = document.getElementById('loginForm');
  if (loginForm) {
    loginForm.addEventListener('submit', function (e) {
      var valid = true;

      var email = document.getElementById('log-email').value.trim();
      var pass = document.getElementById('log-pass').value;

      if (!emailRe.test(email)) {
        setError('log-email', 'Format email tidak valid.');
        valid = false;
      } else setError('log-email', '');

      if (pass.length < 1) {
        setError('log-pass', 'Password wajib diisi.');
        valid = false;
      } else setError('log-pass', '');

      if (!valid) e.preventDefault();
    });
  }

  // Hapus pesan error saat user mulai mengetik ulang
  document.querySelectorAll('input').forEach(function (inp) {
    inp.addEventListener('input', function () {
      setError(inp.id, '');
    });
  });

  // ---- Slideshow panel kiri ----
    var slides = document.querySelectorAll('.campus-slider .slide');
    var dots = document.querySelectorAll('.slide-dots .dot');
    var currentSlide = 0;

    function goToSlide(index) {
    slides.forEach(function (s) { s.classList.remove('active'); });
    dots.forEach(function (d) { d.classList.remove('active'); });
    slides[index].classList.add('active');
    dots[index].classList.add('active');
    currentSlide = index;
    }

    if (slides.length > 0) {
    setInterval(function () {
        var next = (currentSlide + 1) % slides.length;
        goToSlide(next);
    }, 3500); // ganti gambar tiap 3.5 detik

    dots.forEach(function (dot) {
        dot.addEventListener('click', function () {
        goToSlide(parseInt(dot.dataset.index));
        });
    });
    }
});