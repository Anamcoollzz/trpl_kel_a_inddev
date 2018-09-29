<header class="main-header">
  @include('logo')
  <nav class="navbar navbar-static-top">
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="{{ Auth::user()->avatar }}" class="user-image" alt="User Image">
            <span class="hidden-xs text-capitalize">
              {{ Auth::user()->nama }}
            </span>
          </a>
          <ul class="dropdown-menu">
            <li class="user-header">
              <img src="{{ Auth::user()->avatar }}" class="img-circle" alt="User Image">
              <p class="text-capitalize">
                {{ Auth::user()->nama }}
              </p>
            </li>
            <li class="user-footer">
              <div class="pull-left">
                {{-- <a href="{{ route('profile') }}" class="btn btn-default btn-flat">Profil</a> --}}
              </div>
              <div class="pull-right">
                <a href="{{route('keluar')}}" class="btn btn-default btn-flat">Keluar</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>