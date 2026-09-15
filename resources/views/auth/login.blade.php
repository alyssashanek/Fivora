@extends('layouts.auth')

@section('title', 'Login - Fivora')

@section('side-title', 'Selamat Datang Kembali')
@section('side-lead', 'Login untuk melanjutkan akses ke akun Fivora Anda.')

@section('panel-top')
  <div class="panel-top">
    Belum punya akun?&nbsp;<a href="{{ route('register') }}"> Daftar</a>
  </div>
@endsection

@section('form')
  <h2>Login</h2>
  <p class="sub">Masukkan email dan password anda.</p>

  {{-- action mengarah ke route POST /login, ditangani AuthController@login --}}
  <form id="loginForm" method="POST" action="{{ route('login') }}" novalidate>
    @csrf

    <div class="field">
      <label for="log-email">Email</label>
      <div class="input-box @error('email') invalid @enderror" id="box-log-email">
        <span class="ic"></span>
        <input type="text" id="log-email" name="email" value="{{ old('email') }}"
               placeholder="fivora@gmail.com" autocomplete="email">
      </div>
      <div class="error-msg" id="err-log-email">@error('email') {{ $message }} @enderror</div>
    </div>

    <div class="field">
      <label for="log-pass">Password</label>
      <div class="input-box @error('password') invalid @enderror" id="box-log-pass">
        <span class="ic"></span>
        <input type="password" id="log-pass" name="password"
               placeholder="Masukkan password" autocomplete="current-password">
        <button type="button" class="toggle-pass" data-target="log-pass">
        <svg class="eye-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
            <circle cx="12" cy="12" r="3"/>
        </svg>
        </button>
      </div>
      <div class="error-msg" id="err-log-pass">@error('password') {{ $message }} @enderror</div>
    </div>

    <div class="row-between">
      <label class="checkbox-line">
        <input type="checkbox" name="remember" id="remember"> Ingat saya
      </label>
      <a href="#">Lupa password?</a>
    </div>

    <button type="submit" class="primary">Login</button>
  </form>

  <div class="divider">atau</div>
  <button type="button" class="google" onclick="return false;">
    <svg width="16" height="16" viewBox="0 0 48 48"><path fill="#FFC107" d="M43.6 20.5H42V20H24v8h11.3C33.6 32.9 29.2 36 24 36c-6.6 0-12-5.4-12-12s5.4-12 12-12c3.1 0 5.9 1.2 8 3.1l5.7-5.7C34.6 6.1 29.6 4 24 4 12.9 4 4 12.9 4 24s8.9 20 20 20 20-8.9 20-20c0-1.3-.1-2.7-.4-3.5z"/><path fill="#FF3D00" d="m6.3 14.7 6.6 4.8C14.6 15.9 18.9 13 24 13c3.1 0 5.9 1.2 8 3.1l5.7-5.7C34.6 6.1 29.6 4 24 4 16.3 4 9.7 8.3 6.3 14.7z"/><path fill="#4CAF50" d="M24 44c5.5 0 10.4-1.9 14.1-5.1l-6.5-5.5C29.6 35 26.9 36 24 36c-5.2 0-9.6-3.1-11.3-7.6l-6.6 5.1C9.6 39.6 16.3 44 24 44z"/><path fill="#1976D2" d="M43.6 20.5H42V20H24v8h11.3c-.8 2.4-2.3 4.4-4.3 5.9l6.5 5.5C39.9 37.4 44 31.5 44 24c0-1.3-.1-2.7-.4-3.5z"/></svg>
    Login dengan Google
  </button>

  <div class="switch-line">
    Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a>
  </div>
@endsection