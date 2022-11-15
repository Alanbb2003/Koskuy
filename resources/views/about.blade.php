
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
      <div class="col-lg-9 text-center" style="background-color:silver;">
        <h1 class="heading" data-aos="fade-up">
            About Us
        </h1>
        <p style="color: white">Website ini dibuat untuk membantu para pelajar maupun pekerja dalam mencari tempat kos yang dekat dengan lokasi kerja</p>  
      </div>
    </div>
  </div>
</div>

@endsection
