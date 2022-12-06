<nav class="site-nav">
  <div class="container">
    <div class="menu-bg-wrap">
      <div class="site-navigation">
        <a href="{{url('/admin')}}" class="logo m-0 float-start">Koskuy</a>
        @php
        $user = "";
        if (session()->has("user"))
        {
            $user= session()->get("user");
        }
        @endphp
        @if ($user != "")
            <a href="#" class="logo mx-5 float-start">welcome, {{$user->username}}</a>
        @endif
        <ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu float-end">
          <li class="active"><a href="{{url('/admin')}}">Home admin</a></li>

          <li class="has-children ">
            <p style="color: white">Menu</p>
            <ul class="dropdown " >
              <li><a href="{{url('/admin/listPemilik')}}">List Pemilik</a></li>
              <li><a href="{{url('/admin/listPenyewa')}}">List Penyewa</a></li>
              <li><a href="{{url('/admin/listpesanan')}}">Pesanan</a></li>
            </ul>
          </li>
          &nbsp;
          &nbsp;

          <li class="has-children ">
            <p style="color: white">Laporan</p>
            <ul class="dropdown " >
              <li><a href="{{url('/admin/laporanpendapatan')}}">Pendapatan</a></li>
              <li><a href="{{url('/admin/chartpaket')}}">Chart Paket</a></li>
              <li><a href="{{url('/admin/listpesanan')}}">Pesanan</a></li>
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
