@extends('layouts.auth')

@section('title', 'Verify Your Email Address')

@section('content')
<div class="container h-100">
    <div class="row justify-content-center h-100">
        <div class="col-md-6 my-auto py-4">
            <div class="card border-primary p-2 p-sm-4">
                <div class="card-header bg-white border-bottom-0 text-center">
                    <h1 class="h6 text-primary">
                        <i class="fas fa-paper-plane fa-5x"></i>
                    </h1>
                </div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
