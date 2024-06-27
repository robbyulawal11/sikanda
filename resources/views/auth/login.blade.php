@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 m-3 p-2">
                <div class="shadow border-none rounded-4 d-flex flex-column align-items-center pt-5">
                    <div class="w-auto h-auto d-flex flex-column justify-content-center align-items-center mb-3">
                        <img alt="Logo" src="{{ asset('assets/media/images/logo.png') }}" style="width: 80px" />
                        <h5 class="text-center fw-bold fs-3">Selamat Datang!</h5>
                    </div>
                    <div class="card-body w-75">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="d-flex flex-column justify-content-start mb-3">
                                <label for="email" class=" text-start mb-2 fw-semibold">{{ __('Email') }}</label>

                                <div class="">
                                    <input id="email" type="email" placeholder="Alamat Email Anda"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="d-flex flex-column justify-content-start mb-3">
                                <div class="d-flex justify-content-between">
                                    <label for="password" class="text-start mb-2 fw-semibold">{{ __('Kata Sandi') }}</label>
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link text-start p-0" href="{{ route('password.request') }}">
                                            {{ __('Lupa Kata Sandi?') }}
                                        </a>
                                    @endif
                                </div>

                                <div class="">
                                    <input id="password" type="password" placeholder="Kata Sandi Anda"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Ingat Saya') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-5">
                                <div class="d-flex flex-column justify-content-start">
                                    <button type="submit" class="btn btn-danger">
                                        {{ __('Masuk') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
