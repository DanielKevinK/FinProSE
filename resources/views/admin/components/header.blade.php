<nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-shadow container-xxl">
  <div class="navbar-container d-flex content">
    <ul class="nav navbar-nav align-items-center ms-auto">
      @auth
      <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <div class="user-nav d-sm-flex d-none">
            <span class="user-name fw-bolder">{{ Auth::user()->name }}</span>
            <span class="user-status">{{ Auth::user()->role }}</span>
          </div>
          <span class="avatar">
            <img class="round" src="../../../app-assets/images/portrait/small/avatar-s-11.jpg" alt="avatar" height="40" width="40">
            <span class="avatar-status-online"></span>
          </span>
        </a>
        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
          <!-- <div class="dropdown-divider"></div> -->
          <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit(); logout();">
            <i class="me-50" data-feather="power"></i>
            Logout
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </div>
      </li>
      @endauth
    </ul>
  </div>
</nav>
<script>
  function logout() {
    sessionStorage.removeItem('accessToken');
  }
</script>