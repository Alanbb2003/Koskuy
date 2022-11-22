@extends("template.master")
@section("title", "Home")

@section("content")
<br><br><br><br>
<div class="container mt-5">
    <p>{{$detail->kos_alamat}}</p><br>
    <p>{{$detail->kos_tipe}}</p><br>
    <p>{{$detail->kos_harga}}</p><br>
    <button class="btn btn-info">Pesan </button>
</div>
    
@endsection