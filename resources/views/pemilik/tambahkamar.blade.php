@extends("template.sidenavpemilik")

@section("title", "Tambah Kamar")

@section("content")
@php
    // dd(Session::get("dataKos"))
@endphp

<h2>Tambah Kamar</h2>
<form action="{{ route('doAddKamar') }}" method="post" enctype="multipart/form-data">
    @csrf
    Jenis Kamar
    <input type="text" class="form-control" style="width: 400px" name="jenis">
    <span style="color: red;">{{ $errors->first('jenis') }}</span>
    <br>
    Harga Bulanan
    <input type="text" class="form-control" style="width: 400px" name="harga">
    <span style="color: red;">{{ $errors->first('harga') }}</span>
    <br>
    Jumlah
    <input type="text" class="form-control" name="jumlah" style="width: 400px">
    <span style="color: red;">{{ $errors->first('jumlah') }}</span>
    <br>
    Luas Kamar (m2)
    <input type="text" class="form-control" name="luas" style="width: 400px">
    <span style="color: red;">{{ $errors->first('luas') }}</span>
    <br>
    Status Kamar
    <select name="status" id="" class="form-select" style="width: 400px">
        <option value="Tersedia">Tersedia</option>
        <option value="Penuh">Penuh</option>
    </select>
    <span style="color: red;">{{ $errors->first('status') }}</span>
    <br>
    Deskripsi
    <input type="text" class="form-control" name="deskripsi" style="width: 400px">
    <span style="color: red;">{{ $errors->first('deskripsi') }}</span>
    <br>
    Fasilitas : <br>
    <input name="ac" id="" type="checkbox">
    AC <br>
    <input name="kmd" id="" type="checkbox">
    Kamar Mandi Dalam <br>
    <input name="wifi" id="" type="checkbox">
    Wifi <br>
    <input name="tv" id="" type="checkbox">
    TV <br>
    <input name="kulkas" id="" type="checkbox">
    Kulkas <br>
    <br>
    Gambar
    <input type="file" class="form-control" name="gambar" style="width: 400px">
    <span style="color: red;">{{ $errors->first('gambar') }}</span>
    <br>
    <button>Tambah</button>
</form>

@endsection
