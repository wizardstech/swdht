<nav class="navbar is-light" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="{{ route('home') }}">
      <img src="{{ asset('logo.png') }}">
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
          {{ __('app.absences') }}
        </a>
        <div class="navbar-dropdown">
          <a class="navbar-item">
            {{ __('app.myAbsences') }}
          </a>
          <a class="navbar-item">
            {{ __('app.submitAbsence') }}
          </a>
          <a class="navbar-item">
            {{ __('app.pendingAbsence') }}
          </a>
        </div>
      </div>
      <a class="navbar-item" href="{{ route('invoices.index') }}">
        {{ __('app.invoice') }}
      </a>
      <a class="navbar-item" href="{{ route('invoices.index') }}">
        {{ __('app.ideas') }}
      </a>
    </div>
    @endauth
    <div class="navbar-end">
          @guest
      <div class="navbar-item">
        <div class="buttons">
          <a class="button is-primary" href="{{ route('login') }}">{{ __('fields.login') }}</a>
          @if (Route::has('register'))
          <a class="button is-light" href="{{ route('register') }}">{{ __('fields.register') }}</a>
          @endif
          @else
          <div class="navbar-item has-dropdown is-hoverable">
            <a class="navbar-item navbar-link">
              <i class="material-icons">notifications</i>
              @if(!\Auth::user()->unreadNotifications->isEmpty())
              <span class="notifications-count">{{ \Auth::user()->unreadNotifications->count() }}</span>
              @endif
            </a>
            <div class="navbar-dropdown dropdown-right">
              @each('parts.notifications', Auth::user()->unreadNotifications, 'notification', 'parts.notifications_empty')
              <a class="navbar-item" href="{{ route('notifications_index') }}"> See all notifications </a>
            </div>
          </div>
          <div class="navbar-item has-dropdown is-hoverable">
            <a class="navbar-item navbar-link">
              {{ Auth::user()->username }}
            </a>
            <div class="navbar-dropdown dropdown-right">
              <a class="navbar-item" href="{{ route('profile',['username' => Auth::user()->username]) }}">
                {{ __('app.profile') }}
              </a>
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
