<nav class="site-nav">
  <div class="container">
    <div class="menu-bg-wrap">
      <div class="site-navigation">
        <a href="{{url('/admin')}}" class="logo m-0 float-start">Koskuy</a>

        <ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu float-end">
          <li class="active"><a href="{{url('/admin')}}">Home admin</a></li>

          <li class="has-children ">
            <a href="properties.html">List</a>
            <ul class="dropdown " >
              <li><a href="{{url('/admin/listPemilik')}}">List Pemilik</a></li>
              <li><a href="{{url('/admin/listPenyewa')}}">List Penyewa</a></li>
            </ul>
          </li>

          {{-- <li><a href="services.html">Services</a></li>
          <li><a href="{{url('/about')}}">About</a></li> --}}
          <li style="margin-left: 20px">
            <a href="{{url('/logout')}}" class="btn btn-danger " >
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
