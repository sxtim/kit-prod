@extends('platform::auth')

@section('title', __('Reset Password'))

@section('content')
    <h1 class="h4 text-body-emphasis mb-3">{{ __('Reset Password') }}</h1>

    <p class="text-muted mb-4">
        {{ __('Enter your email address and we will send you a password reset link.') }}
    </p>

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST"
          action="{{ route('password.email') }}"
          data-controller="form"
          data-form-need-prevents-form-abandonment-value="false"
          data-action="form#submit">
        @csrf

        <div class="mb-3">
            <label class="form-label" for="email">{{ __('Email address') }}</label>
            <input id="email"
                   type="email"
                   name="email"
                   value="{{ old('email') }}"
                   required
                   autofocus
                   autocomplete="email"
                   class="form-control @error('email') is-invalid @enderror"
                   placeholder="{{ __('Enter your email') }}">

            @error('email')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="row align-items-center">
            <div class="col-md-6 col-xs-12 mb-3 mb-md-0">
                <a href="{{ route('platform.login') }}" class="small">
                    {{ __('Back to login') }}
                </a>
            </div>
            <div class="col-md-6 col-xs-12">
                <button type="submit" class="btn btn-default btn-block">
                    <x-orchid-icon path="bs.envelope" class="small me-2"/>
                    {{ __('Send Password Reset Link') }}
                </button>
            </div>
        </div>
    </form>
@endsection
