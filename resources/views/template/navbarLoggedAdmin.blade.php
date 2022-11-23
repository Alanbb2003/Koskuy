<nav class="site-nav">
  <div class="container">
    <div class="menu-bg-wrap">
      <div class="site-navigation">
        <a href="index.html" class="logo m-0 float-start">Koskuy</a>

        <ul
          class="js-clone-nav d-none d-lg-inline-block text-start site-menu float-end"
        >
          <li class="active"><a href="{{url('/')}}">Home admin</a></li>
          <li class="has-children">
            <a href="properties.html">Kos</a>
            <ul class="dropdown">
              <li><a href="/listkos">Buy Property</a></li>
              <li><a href="#">Sell Property</a></li>
              {{-- <li class="has-children">
                <a href="#">Dropdown</a>
                <ul class="dropdown">
                  <li><a href="#">Sub Menu One</a></li>
                  <li><a href="#">Sub Menu Two</a></li>
                  <li><a href="#">Sub Menu Three</a></li>
                </ul>
              </li> --}}
            </ul>
          </li>
          <li><a href="services.html">Services</a></li>
          <li><a href="{{url('/about')}}">About</a></li>
          <li>
            <a href="{{url('/logout')}}" class="btn btn-danger">
              Logout
            </a>
          </li>
        </ul>

        <a
          href="#"
          class="burger light me-auto float-end mt-1 site-menu-toggle js-menu-toggle d-inline-block d-lg-none"
          data-toggle="collapse"
          data-target="#main-navbar"
        >
          <span></span>
        </a>
      </div>
    </div>
  </div>
</nav>
