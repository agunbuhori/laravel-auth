@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="cover"></div>
    <div class="wrapper">
        <div class="form-header">
            <h1>@lang('Masuk')</h1>
            <p>@lang('Alhimmah media bisa diakses kapan saja melalui perangkat komputer atau handphone').</p>
        </div>
        <form class="login" method="post" action="/login">
            @csrf

            <div class="form-group">
                <div class="input-container">
                    <input id="email" name="email" class="input" type="text" value="{{ old('name') }}" required />
                    <label class="label" for="email">@lang('Email')</label>
                </div>
            </div>

            <div class="form-group">
                <div class="input-container">
                    <input id="password" name="password" class="input" type="password" required />
                    <label class="label" for="password">@lang('Kata Sandi')</label>
                </div>
            </div>

            @if ($errors->count())
            <p class="danger">@lang('Gagal masuk, akun atau kata sandi salah')</p>
            @endif

            <div class="form-group">
                <button class="primary">@lang('Masuk')</button>
            </div>

            <div class="form-group">
                <p class="or">@lang('Atau masuk dengan')</p>
            </div>

            <div class="form-group text-center">
                <a href="/auth/google" type="button" class="auth-button">
                    <span class="auth-button__icon">
                        <img src="/images/social/google.png" />
                    </span>
                    <span class="auth-button__text">Google</span>
                </a>
                <a href="/auth/facebook" type="button" class="auth-button">
                    <span class="auth-button__icon auth-button__icon--plus">
                        <img src="/images/social/facebook.png" />
                    </span>
                    <span class="auth-button__text">Facebook</span>
                </a>

            </div>

            <div class="form-group">
                <p class="or">@lang('Tidak punya akun? ') <a href="/register">Daftar</a></p>
            </div>
        </form>
    </div>
</div>
@endsection