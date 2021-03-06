@extends('layouts.auth')

@section('title', 'Reset Password')

@section('content')
<div class="container h-100">
    <div class="row justify-content-center h-100">
        <div class="col-md-5 my-auto py-4">
            <div class="card border-primary p-2 p-sm-4">
                <div class="card-header bg-white border-bottom-0">
                    <h1 class="h6 text-primary text-center">
                        <i class="fas fa-fingerprint fa-5x"></i>
                    </h1>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group">
                            <input id="email" type="email" class="form-control rounded-pill @error('email') is-invalid @enderror" name="email" placeholder="E-Mail" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input id="password" type="password" class="form-control rounded-pill @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input id="password-confirm" type="password" class="form-control rounded-pill" name="password_confirmation" placeholder="Confirm password" required autocomplete="new-password">
                        </div>

                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary btn-block rounded-pill text-uppercase">
                                {{ __('Reset Password') }}
                            </button>
                        </div>
                    </form>
                </div>

                <div class="card-footer bg-white border-top-0 text-center">
                    @if (Route::has('login'))
                        <a class="btn btn-link btn-block mt-0 p-0" href="{{ route('login') }}">
                            {{ __('Remember Your Password? Login!') }}
                        </a>
                    @endif
                    @if (Route::has('register'))
                        <a class="btn btn-link btn-block mt-0 p-0" href="{{ route('register') }}">
                            {{ __('Create an Account!') }}
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
