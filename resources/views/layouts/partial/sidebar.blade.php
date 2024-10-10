<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile border-bottom">
      <a href="#" class="nav-link flex-column">
        <div class="nav-profile-image">
          <img src="{{asset('assets_plugin_admin/images/faces/face1.jpg')}}" alt="profile" />
          <!--change to offline or busy as needed-->
        </div>
        <div class="nav-profile-text d-flex ml-0 mb-3 flex-column">
          <span class="font-weight-semibold mb-1 mt-2 text-center">{{ Auth::user()->name }}</span>
          <span class="text-secondary icon-sm text-center">{{ Auth::user()->position }}</span>
        </div>
      </a>
    </li>
    <li class="nav-item pt-3">
      <a class="nav-link d-block" href="{{ route('dashboard') }}">
        <img class="sidebar-brand-logo" src="{{asset('LogoSajiraTeks.png')}}" alt="" />
        <img class="sidebar-brand-logomini" src="{{asset('LogoSajiraIcon.png')}}" alt="" style="width: 3rem" />
        <div class="small font-weight-light pt-1">Vehicle Management System</div>
      </a>
    </li>
    <li class="pt-2 pb-1">
      <span class="nav-item-head">Menu</span>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('dashboard') }}">
        <i class="mdi mdi-compass-outline menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <i class="mdi mdi-table-large menu-icon"></i>
        <span class="menu-title">Master Data</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="{{route('branches.index')}}">Branches</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('drivers.index')}}">Drivers</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('vehicles.index')}}">Vehicles</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('owners.index')}}">Vehicle Owner</a>
          </li>
        </ul>
      </div>
    </li>
    @if(\Auth::user()->role == "superadmin")
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <i class="mdi mdi-table-large menu-icon"></i>
        <span class="menu-title">Master Admin</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="{{route('users.index')}}">Manage User</a>
          </li>
        </ul>
      </div>
    </li>
    @endif
    <li class="nav-item"> 
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <a class="nav-link" href="route('logout')" 
            onclick="event.preventDefault();
                this.closest('form').submit();">
          <i class="mdi mdi-logout menu-icon text-danger"></i>
          <span class="menu-title">Sign Out</span>
        </a>
      </form>
    </li>
  </ul>
</nav>