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
    <div class="navbar-end">
      <div class="navbar-item">
        <div class="buttons">
          <div class="navbar-item has-dropdown is-hoverable">
            <a class="navbar-item navbar-link">
              {{ Auth::user()->username }}
            </a>
            <div class="navbar-dropdown dropdown-right">
              <a class="navbar-item" href="{{ route('logout') }}">
                {{ __('auth.logout') }}
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</nav>