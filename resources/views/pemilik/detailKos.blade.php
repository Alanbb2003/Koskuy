@extends("template.sidenavpemilik")

@section("title", "Kos")

@section("content")

<h1>Detail Kos</h1>
  <div class="ok d-flex justify-content-left">
    <div class="container mt-5">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ti-icons@0.1.2/css/themify-icons.css">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-4 mb-5 mb-lg-0 wow fadeIn">
                <div class="card border-0 shadow">
                    {{-- start of form  --}}
                    <form action="" method="post">
                        @csrf
                    <img src="{{ asset("storage/gambar/".$kos->kos_gambar) }}" alt="" style="width: 365px;height: 400px;"><br>
                    <div class="card-body p-1-9 p-xl-5">
                        <div class="mb-4">
                            <h3 class="h4 mb-0">{{$kos->kos_nama}}</h3>
                            <span class="text-primary">kos {{$kos->kos_tipe}}</span>
                        </div>
                        <ul class="list-unstyled mb-4">
                            {{-- <li class="mb-3"><a href="#!"><i class="far fa-envelope display-25 me-3 text-secondary"></i>dakota@gmail.com</a></li> --}}
                            <li class="mb-3"><a href="#!"><i class="fas fa-mobile-alt display-25 me-3 text-secondary"></i>{{$kos->kos_notelp}}</a></li>
                            <li><a href="#!"><i class="fas fa-map-marker-alt display-25 me-3 text-secondary"></i>{{$kos->kos_alamat}}, {{$kos->kos_kota}}, {{$kos->kos_provinsi}}</a></li>
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
                       <p>{{$kos->kos_deskripsi}}</p>
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
                                        {{$kos->kos_kodepos}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-4 mt-4">
                                <div class="card text-center border-0 rounded-3">
                                    <div class="card-body">
                                       Kecamatan : {{$kos->kos_kecamatan}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-4 mt-4">
                                <div class="card text-center border-0 rounded-3">
                                    <div class="card-body">
                                       Kelurahan : {{$kos->kos_kelurahan}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end of form  --}}
        </form>
        </div>
        <br>
        @if($havekamar =="none")
        <div class="container">
            <h1>Pemilik belum mengisi kamar</h1>
        </div>
        @elseif ($havekamar == "have")
        {{-- <form action="{{ url('/Htambahkos/'.$kos->id) }}" method="get" style="margin: 0">
            <input type="submit" value="Detail" class="btn btn-success">
        </form> --}}
        <a href="{{ url('owner/Htambahkamarbaru/'.$kos->id) }}">
            <button class="btn btn-success">Tambah Kamar</button>
        </a>
        <div class="container">
            <h3>Kamar</h3>
            <table class="table table-striped">
            <tr>
                <th>Jenis Kamar</th>
                <th>harga kamar</th>
                <th>jumlah kamar</th>
                <th>luas kamar</th>
                <th>status kamar</th>
                <th>Gambar kamar</th>
            </tr>
            @foreach ($kamar as $h)
            <tr>
                <td>{{ $h->jenis_kamar}}</td>
                <td>{{ $h->harga_kamar}}</td>
                <td>{{ $h->jumlah_kamar}}</td>
                <td>{{ $h->luas_kamar}}</td>
                <td>{{ $h->status_kamar}}</td>
                <td><img src="{{ asset("storage/gambar/".$h->gambar_kamar) }}" class="img-fluid"></td>
                {{-- <td>
                        <a href="" class="btn btn-info">Detail</a>
                </td> --}}
            </tr>
            @endforeach
        </table>
        </div>
        @endif
    </div>
    {{-- <div class="align-self-auto" style="width: 500px;">
        <br><br>
            <form action="" method="post">
                @csrf --}}
                {{-- <h3>Kode Kos: {{ $kos->id }}</h3> --}}
                {{-- <p>Nama Kos: {{ $kos->kos_nama }}</p>
                <p>Tipe Kos: {{ $kos->kos_tipe }}</p>
                <p>Alamat Kos: {{ $kos->kos_alamat }}</p>
                <p>Deskripsi Kos: {{ $kos->kos_deskripsi }}</p>
                <p>Notelp Kos: {{ $kos->kos_notelp }}</p>
                <p>Kode Pos: {{ $kos->kos_kodepos }}</p>
                <p>Gambar Kos: </p><img src="{{ asset("storage/gambar/".$kos->kos_gambar) }}" alt="" style="width: 200px;height: 200px;"><br>
                <p>Lokasi Google Maps: {{ $kos->kos_link }}</p>
                <br>
                <input type="hidden" name="id" value="{{ $kos->kode }}">
            </form>
    </div> --}}
</div>


@endsection
