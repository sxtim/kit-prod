<div class="mb-3">

    <label class="form-label">
        {{__('Email address')}}
    </label>

    {!!  \Orchid\Screen\Fields\Input::make('email')
        ->type('email')
        ->required()
        ->tabindex(1)
        ->autofocus()
        ->autocomplete('email')
        ->inputmode('email')
        ->placeholder(__('Enter your email'))
    !!}
</div>


<div class="mb-3">
    <div class="d-flex justify-content-between align-items-center">
        <label class="form-label">
            {{__('Password')}}
        </label>

        <a href="{{ route('password.request') }}" class="small mb-2">
            {{ __('Forgot your password?') }}
        </a>
    </div>

    {!!  \Orchid\Screen\Fields\Password::make('password')
        ->required()
        ->autocomplete('current-password')
        ->tabindex(2)
        ->placeholder(__('Enter your password'))
    !!}
</div>

<div class="row align-items-center">
    <div class="col-md-6 col-xs-12">
        <label class="form-check">
            <input type="hidden" name="remember">
            <input type="checkbox" name="remember" value="true"
                   class="form-check-input" {{ !old('remember') || old('remember') === 'true'  ? 'checked' : '' }}>
            <span class="form-check-label"> {{__('Remember Me')}}</span>
        </label>
    </div>
    <div class="col-md-6 col-xs-12">
        <button id="button-login" type="submit" class="btn btn-default btn-block" tabindex="3">
            <x-orchid-icon path="bs.box-arrow-in-right" class="small me-2"/>
            {{__('Login')}}
        </button>
    </div>
</div>
