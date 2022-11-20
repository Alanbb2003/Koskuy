@extends("template.sidenavpemilik")

@section("title", "Tambah Kos")

@section("content")


<h2>Tambah Kos</h2>
<form action="#" method="post">
    @csrf
    Nama Kos
    <input type="text" class="form-control" style="width: 400px" name="nama">

    <br>
    Tipe Kos
    <select name="" id="" class="form-select" style="width: 400px">
        <option value="Putra">Putra</option>
        <option value="Putri">Putri</option>
        <option value="Campur">Campur</option>
    </select>
    <br>
    Alamat
    <input type="text" class="form-control" style="width: 400px">
    <br>
    Provinsi
    <input type="text" class="form-control" style="width: 400px">
    <br>
    Kota
    <input type="text" class="form-control" style="width: 400px">
    <br>
    Kecamatan
    <input type="text" class="form-control" style="width: 400px">
    <br>
    Kelurahan
    <input type="text" class="form-control" style="width: 400px">
    <br>
    Kode Pos
    <input type="text" class="form-control" style="width: 400px">
    <br>
    Link Google Maps
    <input type="text" class="form-control" style="width: 400px">

    <br>
    <button>tambah</button>




</form>

@endsection
