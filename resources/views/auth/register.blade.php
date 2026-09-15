@extends('layouts.auth')

@section('title', 'Daftar Akun - Fivora')

@section('panel-top')
  <div class="panel-top">
    Sudah punya akun?&nbsp;<a href="{{ route('login') }}">Login</a>
  </div>
@endsection

@section('form')
  <h2>Daftar Akun</h2>
  <p class="sub">Lengkapi data diri untuk membuat akun Fivora.</p>

  {{-- action mengarah ke route POST /register, ditangani AuthController@register --}}
  <form id="registerForm" method="POST" action="{{ route('register') }}" novalidate>
    @csrf

    <div class="field">
      <label for="reg-name">Nama Lengkap</label>
      <div class="input-box @error('name') invalid @enderror" id="box-reg-name">
        <span class="ic"></span>
        <input type="text" id="reg-name" name="name" value="{{ old('name') }}"
               placeholder="Masukkan nama lengkap" autocomplete="name">
      </div>
      <div class="error-msg" id="err-reg-name">@error('name') {{ $message }} @enderror</div>
    </div>

    <div class="field">
      <label for="reg-email">Email</label>
      <div class="input-box @error('email') invalid @enderror" id="box-reg-email">
        <span class="ic"></span>
        <input type="text" id="reg-email" name="email" value="{{ old('email') }}"
               placeholder="fivora@gmail.com" autocomplete="email">
      </div>
      <div class="error-msg" id="err-reg-email">@error('email') {{ $message }} @enderror</div>
    </div>

    <div class="field">
      <label for="reg-nim"> NIM / NIP</label>
      <div class="input-box @error('nim_nip') invalid @enderror" id="box-reg-nim">
        <span class="ic"></span>
        <input type="text" id="reg-nim" name="nim_nip" value="{{ old('nim_nip') }}"
               placeholder="Masukkan NIM atau NIP"
               inputmode="numeric"
               maxlength="18">
      </div>
      <div class="error-msg" id="err-reg-nim">@error('nim_nip') {{ $message }} @enderror</div>
    </div>

    <div class="field">
      <label for="reg-pass">Password</label>
      <div class="input-box @error('password') invalid @enderror" id="box-reg-pass">
        <span class="ic"></span>
        <input type="password" id="reg-pass" name="password"
               placeholder="Minimal 8 karakter" autocomplete="new-password">
        <button type="button" class="toggle-pass" data-target="reg-pass">
        <svg class="eye-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
            <circle cx="12" cy="12" r="3"/>
        </svg>
        </button>
      </div>
      <div class="error-msg" id="err-reg-pass">@error('password') {{ $message }} @enderror</div>
    </div>

    <button type="submit" class="primary">Daftar</button>
  </form>

  <div class="divider">atau</div>
  <button type="button" class="google" onclick="window.location.href='{{ route('login') }}'">
    Sudah punya akun? Login di sini
  </button>
@endsection