@extends("template.master")
@section("title", "Home")

@section("content")
<br><br><br><br>
<div class="container mt-5">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ti-icons@0.1.2/css/themify-icons.css">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-4 mb-5 mb-lg-0 wow fadeIn">
            <div class="card border-0 shadow">
                <img src="#" alt="...">
                <div class="card-body p-1-9 p-xl-5">
                    <div class="mb-4">
                        <h3 class="h4 mb-0">{{$detail->kos_nama}}</h3>
                        <span class="text-primary">kos {{$detail->kos_tipe}}</span>
                    </div>
                    <ul class="list-unstyled mb-4">
                        {{-- <li class="mb-3"><a href="#!"><i class="far fa-envelope display-25 me-3 text-secondary"></i>dakota@gmail.com</a></li> --}}
                        <li class="mb-3"><a href="#!"><i class="fas fa-mobile-alt display-25 me-3 text-secondary"></i>{{$detail->kos_notelp}}</a></li>
                        <li><a href="#!"><i class="fas fa-map-marker-alt display-25 me-3 text-secondary"></i>{{$detail->kos_alamat}}, {{$detail->kos_kota}}, {{$detail->kos_provinsi}}</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="ps-lg-1-6 ps-xl-5">
                <div class="mb-5 wow fadeIn">
                    <div class="text-start mb-1-6 wow fadeIn">
                        <h2 class="h1 mb-0 text-primary">#Deskripsi</h2>
                    </div>
                   <p>{{$detail->kos_deskripsi}}</p>
                </div>
                <div class="mb-5 wow fadeIn">
                    {{-- <div class="text-start mb-1-6 wow fadeIn">
                        <h2 class="mb-0 text-primary">#Education</h2>
                    </div> --}}
                    <div class="row mt-n4">
                        <div class="col-sm-6 col-xl-4 mt-4">
                            <div class="card text-center border-0 rounded-3">
                                <div class="card-body">
                                    Kode pos :
                                    {{$detail->kos_kodepos}}
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-4 mt-4">
                            <div class="card text-center border-0 rounded-3">
                                <div class="card-body">
                                   Kecamatan : {{$detail->kos_kecamatan}}
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-4 mt-4">
                            <div class="card text-center border-0 rounded-3">
                                <div class="card-body">
                                   Kelurahan : {{$detail->kos_kelurahan}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-sm mt-3">
            <button class="btn btn-success">Pesan </button>
        </div>
    </div>
</div>
    {{-- <p>{{$detail->kos_nama}}</p><br> --}}
    {{-- <p>{{$detail->kos_alamat}}</p><br> --}}
    {{-- <p>{{$detail->kos_tipe}}</p><br> --}}
    {{-- <p>{{$detail->kos_deskripsi}}</p><br> --}}
    {{-- <p>{{$detail->kos_notelp}}</p><br> --}}
    {{-- <p>{{$detail->kos_provinsi}}</p><br> --}}
    {{-- <p>{{$detail->kos_kota}}</p><br> --}}
    {{-- <p>{{$detail->kos_kecamatan}}</p><br>
    <p>{{$detail->kos_kelurahan}}</p><br>
    <p>{{$detail->kos_kodepos}}</p><br> --}}
   
</div>
    
@endsection