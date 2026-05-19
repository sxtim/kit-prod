@extends('platform::auth')
@section('title', __('Sign in to your account'))

@section('content')
    <h1 class="h4 text-body-emphasis mb-4">{{ __('Sign in to your account') }}</h1>

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form class="m-t-md"
          role="form"
          method="POST"
          data-controller="form"
          data-form-need-prevents-form-abandonment-value="false"
          data-action="form#submit"
          action="{{ route('platform.login.auth') }}">
        @csrf

        @includeWhen($isLockUser, 'platform::auth.lockme')
        @includeWhen(!$isLockUser, 'platform::auth.signin')
    </form>
@endsection
