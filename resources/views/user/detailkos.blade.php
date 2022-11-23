@extends("template.master")
@section("title", "Home")

@section("content")
<br><br><br><br>
<div class="container mt-5">
    <p>{{$detail->kos_nama}}</p><br>
    <p>{{$detail->kos_alamat}}</p><br>
    <p>{{$detail->kos_tipe}}</p><br>
    <p>{{$detail->kos_deskripsi}}</p><br>
    <p>{{$detail->kos_notelp}}</p><br>
    <p>{{$detail->kos_provinsi}}</p><br>
    <p>{{$detail->kos_kota}}</p><br>
    <p>{{$detail->kos_kecamatan}}</p><br>
    <p>{{$detail->kos_kelurahan}}</p><br>
    <p>{{$detail->kos_kodepos}}</p><br>
    <button class="btn btn-info">Pesan </button>
</div>
    
@endsection