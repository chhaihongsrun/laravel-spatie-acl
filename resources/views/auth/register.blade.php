@extends('layouts.auth')

@section('title', 'Register')

@section('content')
<div class="container h-100">
    <div class="row justify-content-center h-100">
        <div class="col-md-5 my-auto py-4">
            <div class="card border-primary p-2 p-sm-4">
                <div class="card-header bg-white border-bottom-0 text-center">
                    <h1 class="h6 text-primary">
                        <i class="fas fa-users fa-5x"></i>
                    </h1>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group">
                            <input id="name" type="text" class="form-control rounded-pill @error('name') is-invalid @enderror" name="name" placeholder="Name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input id="email" type="email" class="form-control rounded-pill @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email">
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
                                {{ __('Register') }}
                            </button>
                        </div>
                    </form>
                </div>

                <div class="card-footer bg-white border-top-0 text-center">
                    @if (Route::has('password.request'))
                        <a class="btn btn-link btn-block p-0" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                    @if (Route::has('login'))
                        <a class="btn btn-link btn-block mt-0 p-0" href="{{ route('login') }}">
                            {{ __('Already Have an Account? Login!') }}
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
