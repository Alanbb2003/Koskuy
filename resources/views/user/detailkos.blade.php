@extends("template.master")
@section("title", "Home")

@section("content")
<br><br><br><br>
@if (Session::has('success'))
<?php echo '<script>alert("Berhasil Booking")</script>'?>
@endif
<div class="container mt-5">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ti-icons@0.1.2/css/themify-icons.css">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-4 mb-5 mb-lg-0 wow fadeIn">
            <div class="card border-0 shadow">
                <img src="{{ asset("storage/gambar/".$detail->kos_gambar) }}" alt="" style="width: 392px;height: 400px;"><br>
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
                    <div class="text-start mb-1-6 wow fadeIn">
                        <h2 class="h1 mb-0 text-primary">#Tipe Kamar</h2><br>
                    </div>
                    @if ($havekamar =="have")
                        <ol>
                        @foreach ($kamar as $i)
                        <div class="text-start mb-1-6 wow fadeIn">
                            <li class="h2 mb-1 text-primary"><h3 class="h2 mb-1 text-primary">Kamar {{ $i->jenis_kamar}}</h3></li>
                        </div>
                        <div class="text-start ml-1 mb-1-6 wow fadeIn">
                            <h4 class="h3 mb-0 text-primary">Fasilitas</h4>
                            <ul>
                            <li><h4 class="h4 mb-0 text-primary">Luas Kamar: {{ $i->luas_kamar}}M²</h4></li>
                            @if ($i->ac != null)
                                <li><h4 class="h4 mb-0 text-primary">Ac</h4></li>
                            @endif
                            @if ($i->kmd != null)
                                <li><h4 class="h4 mb-0 text-primary">Kamar Mandi Dalam</h4></li>
                            @endif
                            @if ($i->wifi != null)
                                <li><h4 class="h4 mb-0 text-primary">WiFi</h4></li>
                            @endif
                            @if ($i->tv != null)
                                <li><h4 class="h4 mb-0 text-primary">TV</h4></li>
                            @endif
                            @if ($i->kulkas != null)
                                <li><h4 class="h4 mb-0 text-primary">Kulkas</h4></li>
                            @endif
                            </ul>
                        </div>
                        @endforeach
                    </ol>
                    @elseif ($havekamar == "none")
                    <div class="text-start mb-1-6 wow fadeIn">
                        <h3 class="h1 mb-0 text-primary">Tidak Ada Kamar</h3>
                    </div>
                    @endif

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
        {{-- <div class="container-sm mt-3">
            <form method="post"  action="{{route('booking')}}">
                @csrf
                <input type="hidden" name="id_kos" value="{{$detail->id}}">
                <input type="hidden" name="id_owner" value="{{$detail->owner}}">
                <input type="hidden" name="id_penyewa" value="{{$users}}">

                <button class="btn btn-success">Pesan </button>
            </form>
        </div> --}}
    </div>
    <br>
        @if($havekamar =="none")
        <div class="container">
            <h1>Pemilik belum mengisi kamar</h1>
        </div>
        @elseif ($havekamar == "have")
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
                <td><img src="{{ asset("storage/gambar/".$h->gambar_kamar) }}" class="img-fluid" style="width: 100px;height: 100px;"></td>
                <td>
                    <form method="post"  action="{{route('booking')}}">
                        @csrf
                        <input type="hidden" name="id_kos" value="{{$detail->id}}">
                        <input type="hidden" name="id_owner" value="{{$detail->owner}}">
                        <input type="hidden" name="id_penyewa" value="{{$users}}">
                        <input type="hidden" name="id_kamar" value="{{$h->kamar_id}}">

                        <button class="btn btn-success">Pesan </button>
                    </form>
                    {{-- <a href="" class="btn btn-info">Pesan</a> --}}
                </td>
            </tr>
            @endforeach
        </table>
        </div>
        @endif
</div>
<div aria-live="polite" aria-atomic="true" style="position: relative; min-height: 200px;">
    <div class="toast" style="position: absolute; bottom: 0; right: 0;">
      <div class="toast-header">
        <strong class="mr-auto">Success!</strong>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="toast-body">
        @if (Session::has('success'))
            {{Session::get("success")}}
        @endif
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
<script type="text/javascript">
    function showToast(){
        $('.toast').toast('show');
    }
</script>
