{{-- Navbar Start --}}
<section id="Navbar">
  <nav class="navbar navbar-expand-lg" style="height: 70px">
    <div class="container-fluid">
      <a class="navbar-brand ms-2 fs-4" href="/">Agro<b>Store</b></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active ms-1" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Shop
            </a>
            <ul class="dropdown-menu">
              @yield('categories')
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link active ms-1" aria-current="page" href="/about">About us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active ms-1" aria-current="page" href="/home">Dashboard</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link active ms-1" aria-current="page" href="#">Invest</a>
          </li> -->
        </ul>
        <div class="d-flex me-auto ms-4 w-50" role="search">
          <input class="form-control me-2" type="search" id="searchInput" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-secondary" onclick="openNewWindowSearch()">Search</button>
        </div>
        <div class="me-5">
          <ul class="navbar-nav me-5">
            @auth
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ Auth::user()->name }}
              </a>
              <ul class="dropdown-menu dropdown-menu-right">
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li><a class="dropdown-item" href="/cart">View Cart</a></li>
                <li>
                  <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit(); logout();">
                    Logout
                  </a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              </ul>
            </li>
            @endauth
          </ul>
        </div>
        <!-- </div> -->
      </div>
    </div>
  </nav>
</section>
{{-- End Navbar --}}
<script>
  function openNewWindowSearch() {
    var query = document.getElementById('searchInput').value;
    var url = '/search?q=' + query
    window.location.href = url;
  }

  function logout() {
    sessionStorage.removeItem('accessToken');
  }
</script>