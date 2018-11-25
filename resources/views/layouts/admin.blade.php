<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
  <nav class="navbar is-info" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
      <a class="navbar-item" href="{{ route('home') }}">
        <img src="{{ asset('wizards.png') }}">
      </a>

      <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
      </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
      @auth
      <div class="navbar-start">
        <a class="navbar-item">
          {{ __("app.home") }}
        </a>        
        <div class="navbar-item has-dropdown is-hoverable">
          <a class="navbar-link">
            {{ __('app.vacations') }}
          </a>

          <div class="navbar-dropdown">
            <a class="navbar-item">
              {{ __('app.vacations') }}
            </a>
            <a class="navbar-item">
              {{ __('app.requestVacation') }}
            </a>
            <a class="navbar-item">
              {{ __('app.pendingVacation') }} 
            </a>
          </div>
        </div>
        <a class="navbar-item">
            {{ __('app.expense') }}
        </a>
        <a class="navbar-item">
          {{ __("app.wallOfSalt") }}
        </a>
      </div>
      @endauth

      <div class="navbar-end">
        <div class="navbar-item">
          <div class="buttons">
            @guest    
            <a class="button is-primary" href="{{ route('login') }}">{{ __('fields.login') }}</a>
            @if (Route::has('register'))
            <a class="button is-light" href="{{ route('register') }}">{{ __('fields.register') }}</a>
            @endif
            @else
            <div class="navbar-item has-dropdown is-hoverable">
              <a class="navbar-item navbar-link">
                {{ Auth::user()->name }}
              </a>

              <div class="navbar-dropdown dropdown-right">
                <a class="navbar-item" href="{{ route('logout') }}">
                  {{ __('auth.logout') }}
                </a>
              </div>
            </div>
            @endguest
          </div>
        </div>
      </div>
    </div>
  </nav>
  <div class="container mt-50">
    @yield('content')
  </div>
</body>
</html>
