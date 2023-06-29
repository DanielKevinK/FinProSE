<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
  <div class="navbar-header">
    <ul class="nav navbar-nav flex-row">
      <li class="nav-item me-auto"><a class="navbar-brand" href="/">
          <h2 class="brand-text">AgroBiz</h2>
        </a></li>
      <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
    </ul>
  </div>
  <div class="shadow-bottom"></div>
  <div class="main-menu-content">
    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
      @if (auth()->user()->role == 'admin')
      <li class=" {{ Route::currentRouteName() === 'home' ? 'active' : ''}} nav-item"><a class="d-flex align-items-center" href="/home">
          <i data-feather="home"></i>
          <span class="menu-title text-truncate" data-i18n="Home">Home</span>
        </a>
      </li>
      <li class=" {{ Route::currentRouteName() === 'users' ? 'active' : ''}} nav-item">
        <a class="d-flex align-items-center" href="/home/users">
          <i data-feather="user"></i>
          <span class="menu-title text-truncate">Users</span>
        </a>
      </li>
      <li class=" {{ Route::currentRouteName() === 'product' ? 'active' : ''}} nav-item">
        <a class="d-flex align-items-center" href="/home/product">
          <i data-feather="layout"></i>
          <span class="menu-title text-truncate">Product</span>
        </a>
      </li>
      <li class=" {{ Route::currentRouteName() === 'category' ? 'active' : ''}} nav-item">
        <a class="d-flex align-items-center" href="/home/category">
          <i data-feather="layout"></i>
          <span class="menu-title text-truncate">Category</span>
        </a>
      </li>
      <li class=" {{ Route::currentRouteName() === 'investment' ? 'active' : ''}} nav-item">
        <a class="d-flex align-items-center" href="/home/investment">
          <i data-feather="layout"></i>
          <span class="menu-title text-truncate">Investment</span>
        </a>
      </li>
      @else
      <li class=" {{ Route::currentRouteName() === 'home' ? 'active' : ''}} nav-item"><a class="d-flex align-items-center" href="/home">
          <i data-feather="home"></i>
          <span class="menu-title text-truncate" data-i18n="Home">Home</span>
        </a>
      </li>
      @endif
    </ul>
  </div>
</div>