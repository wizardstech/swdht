@extends('layouts.splash')

@section('content')
<div class="hero is-fullheight login-bg">
    <div class="hero-body">
        <div class="container has-text-centered">
            <div class="column is-4 is-offset-4">
                <h3 class="title has-text-grey">{{ __('messages.login-title') }}</h3>
                <p class="subtitle has-text-grey">{{ __('messages.login') }}</p>
                <div class="box">
                    <figure class="avatar">
                        <img src="{{ asset('wizard-user.png') }}">
                    </figure>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="field">
                            <div class="control">
                                <input id="username" placeholder="{{ __('fields.username') }}" type="text" class="input{{ $errors->has('email') ? ' is-danger' : '' }}" name="username" value="{{ old('username') }}" required autofocus>

                                @if ($errors->has('username'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <input id="password" placeholder="{{ __('fields.password') }}" type="password" class="input{{ $errors->has('password') ? ' is-danger' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <label class="checkbox">
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('fields.rememberMe') }}
                            </label>
                        </label>
                        <button type="submit" class="button is-block is-info is-fullwidth">
                            {{ __('fields.login') }}
                        </button>

                    </div>

                    @if (Route::has('password.request'))
                    <a class="has-text-grey" href="{{ route('password.request') }}">
                        {{ __('fields.forgotPassword') }}
                    </a>
                    @endif

                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
