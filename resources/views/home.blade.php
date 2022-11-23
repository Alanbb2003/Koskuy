
@extends("template.master")
@section("title", "Home")

@section("content")
<div class="hero ">
  <div class="hero-slide carousel slide" data-ride="carousel">
    <div
      class="img overlay carousel-item active" data-bs-interval="1000"
      style="background-image: url('{{asset('images/hero_bg_1.jpg')}}')"
    ></div>
    <div
      class="img overlay carousel-item" data-bs-interval="1000"
      style="background-image: url('{{asset('images/hero_bg_2.jpg')}}')"
    ></div>
    <div
      class="img overlay carousel-item" data-bs-interval="1000"
      style="background-image: url('public/images/hero_bg_1.jpg')"
    ></div>
  </div>

  <div class="container">
    <div class="row justify-content-center align-items-center">
      <div class="col-lg-9 text-center">
        <h1 class="heading" data-aos="fade-up">
          Cari lokasi kos sekarang juga !
        </h1>
        <form
          method="POST"
          action="{{route('searchfunc')}}"
          class="narrow-w form-search d-flex align-items-stretch mb-3"
          data-aos="fade-up"
          data-aos-delay="200"
        >
          <input
            name="searchinput"
            type="text"
            class="form-control px-4"
            placeholder="Masukkan lokasi. contoh : Surabaya"
          />
          <button type="submit" class="btn btn-primary">Search</button>
        </form>
      </div>
    </div>
  </div>
</div>


<div class="container my-5">

<hr class="my-5">

<!--Carousel Wrapper-->
<div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

  {{-- <!--Controls-->
  <div class="controls-top">
    <a class="btn-floating" href="#multi-item-example" data-slide="prev"><i class="fas fa-chevron-left"></i></a>
    <a class="btn-floating" href="#multi-item-example" data-slide="next"><i
                                                                            class="fas fa-chevron-right"></i></a>
  </div>
  <!--/.Controls-->

  <!--Indicators-->
  <ol class="carousel-indicators">
    <li data-target="#multi-item-example" data-slide-to="0" class="active"></li>
    <li data-target="#multi-item-example" data-slide-to="1"></li>

  </ol>
  <!--/.Indicators--> --}}

  <div class="overflow-auto">
    <div class="row text-center">
    @foreach ($kos as $k)
    <div class="col-md-3 mx-1" style="float:left">
      <div class="card mb-2">
        <img class="card-img-top"
             src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(60).jpg" alt="Card image cap">
        <div class="card-body">
          <h4 class="card-title">{{$k->kos_alamat}}</h4>
          <p class="card-text">{{$k->kos_tipe}}</p>
          <a class="btn btn-primary" href="{{url('user/detail/'.$k->id)}}">Detail</a>
        </div>
      </div>
    </div>
    @endforeach
    </div>
  </div>
  {{-- <!--Slides-->
  <div class="carousel-inner" role="listbox">

    <!--First slide-->
    <div class="carousel-item active">

    @foreach ($kos as $k)
    <div class="col-md-3 mx-2" style="float:left">
      <div class="card mb-2">
        <img class="card-img-top"
             src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(60).jpg" alt="Card image cap">
        <div class="card-body">
          <h4 class="card-title">{{$k->kos_alamat}}</h4>
          <p class="card-text">{{$k->kos_tipe}}</p>
          <a class="btn btn-primary" href="{{url('user/detail/'.$k->id)}}">Detail</a>
        </div>
      </div>
    </div>
    @endforeach
    <div class="col-md-3 mx-2" style="float:left">
      <div class="card mb-2">
        <img class="card-img-top"
             src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(60).jpg" alt="Card image cap">
        <div class="card-body">
          <h4 class="card-title">a</h4>
          <p class="card-text">a</p>
          <a class="btn btn-primary" >Detail</a>
        </div>
      </div>
    </div>

    </div>
    <!--/.First slide-->

    <!--Second slide-->
    <div class="carousel-item">
    @foreach ($kos as $k)
    <div class="col-md-3 mr-4" style="float:left">
      <div class="card mb-2">
        <img class="card-img-top"
             src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(60).jpg" alt="Card image cap">
        <div class="card-body">
          <h4 class="card-title">{{$k->kos_alamat}}</h4>
          <p class="card-text">{{$k->kos_tipe}}</p>
          <a class="btn btn-primary">Detail</a>
        </div>
      </div>
    </div>
    @endforeach

    </div>
    <!--/.Second slide-->



  </div>
  <!--/.Slides--> --}}

</div>
<!--/.Carousel Wrapper-->

@endsection



