{{-- <nav class="navbar navbar-expand-lg bg-primary" style="box-shadow:0px 0px 2px 1px;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">PictBox</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/listitem">List Item</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/listseller">List Seller</a>
        </li>
      </ul>
      <div class="d-flex">
        <a href="/"><button class="btn btn-success" type="submit">
          Login
        </button></a>
      </div>
    </div>
  </div>
</nav> --}}

<nav class="site-nav">
  <div class="container">
    <div class="menu-bg-wrap">
      <div class="site-navigation">
        <a href="index.html" class="logo m-0 float-start">Property</a>

        <ul
          class="js-clone-nav d-none d-lg-inline-block text-start site-menu float-end"
        >
          <li class="active"><a href="index.html">Home</a></li>
          <li class="has-children">
            <a href="properties.html">Kos</a>
            <ul class="dropdown">
              <li><a href="#">Buy Property</a></li>
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
          <li><a href="about.html">About</a></li>
          <li>
            <a href="/login">
              Login
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