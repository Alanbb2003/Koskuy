@extends("template.sidenavpemilik")

@section("title", "Tambah Kamar")

@section("content")
@php
    // dd(Session::get("dataKos"))
@endphp

<h2>Tambah Kamar</h2>
<form action="{{url('/owner/tambahkamarbaru/'.$idkos)}}" method="post" enctype="multipart/form-data">
    @csrf
    Jenis Kamar
    <input type="text" class="form-control" style="width: 400px" name="jeniskb">
    <span style="color: red;">{{ $errors->first('jeniskb') }}</span>
    <br>
    Harga Bulanan
    <input type="text" class="form-control" style="width: 400px" name="hargakb">
    <span style="color: red;">{{ $errors->first('hargakb') }}</span>
    <br>
    Jumlah
    <input type="text" class="form-control" name="jumlahkb" style="width: 400px">
    <span style="color: red;">{{ $errors->first('jumlahkb') }}</span>
    <br>
    Luas Kamar (m2)
    <input type="text" class="form-control" name="luaskb" style="width: 400px">
    <span style="color: red;">{{ $errors->first('luaskb') }}</span>
    <br>
    Status Kamar
    <select name="statuskb" id="" class="form-select" style="width: 400px">
        <option value="Tersedia">Tersedia</option>
        <option value="Penuh">Penuh</option>
    </select>
    <span style="color: red;">{{ $errors->first('statuskb') }}</span>
    <br>
    Deskripsi
    <input type="text" class="form-control" name="deskripsikb" style="width: 400px">
    <span style="color: red;">{{ $errors->first('deskripsikb') }}</span>
    <br>
    Fasilitas : <br>
    <input name="ackb" id="" type="checkbox">
    AC <br>
    <input name="kmdkb" id="" type="checkbox">
    Kamar Mandi Dalam <br>
    <input name="wifikb" id="" type="checkbox">
    Wifi <br>
    <input name="tvkb" id="" type="checkbox">
    TV <br>
    <input name="kulkaskb" id="" type="checkbox">
    Kulkas <br>
    <br>
    Gambar
    <input type="file" class="form-control" name="gambarkb" style="width: 400px">
    <span style="color: red;">{{ $errors->first('gambarkb') }}</span>
    <br>
    <button>Tambah</button>
</form>

@endsection
