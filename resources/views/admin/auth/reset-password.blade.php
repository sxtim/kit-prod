@extends('platform::auth')

@section('title', __('Reset Password'))

@section('content')
    <h1 class="h4 text-body-emphasis mb-4">{{ __('Reset Password') }}</h1>

    <form method="POST"
          action="{{ route('password.update') }}"
          data-controller="form"
          data-form-need-prevents-form-abandonment-value="false"
          data-action="form#submit">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="mb-3">
            <label class="form-label" for="email">{{ __('Email address') }}</label>
            <input id="email"
                   type="email"
                   name="email"
                   value="{{ old('email', $email) }}"
                   required
                   autofocus
                   autocomplete="email"
                   class="form-control @error('email') is-invalid @enderror"
                   placeholder="{{ __('Enter your email') }}">

            @error('email')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label" for="password">{{ __('Password') }}</label>
            <input id="password"
                   type="password"
                   name="password"
                   required
                   autocomplete="new-password"
                   class="form-control @error('password') is-invalid @enderror"
                   placeholder="{{ __('Enter your password') }}">

            @error('password')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label class="form-label" for="password_confirmation">{{ __('Confirm Password') }}</label>
            <input id="password_confirmation"
                   type="password"
                   name="password_confirmation"
                   required
                   autocomplete="new-password"
                   class="form-control"
                   placeholder="{{ __('Confirm Password') }}">
        </div>

        <div class="row align-items-center">
            <div class="col-md-6 col-xs-12 mb-3 mb-md-0">
                <a href="{{ route('platform.login') }}" class="small">
                    {{ __('Back to login') }}
                </a>
            </div>
            <div class="col-md-6 col-xs-12">
                <button type="submit" class="btn btn-default btn-block">
                    <x-orchid-icon path="bs.key" class="small me-2"/>
                    {{ __('Reset Password') }}
                </button>
            </div>
        </div>
    </form>
@endsection
