@extends("template.sidenavpemilik")

@section("title", "Tambah Kos")

@section("content")


<h2>Tambah Kos</h2>
<form action="{{ route('doAddKos') }}" method="post" enctype="multipart/form-data">
    @csrf
    Pilih Paket
    <br>
    (nama - harga - lama iklan)
<br>
    <select name="paketkos" id="" class="form-select" style="width: 400px">
        @for ($i = 0; $i < count($paket);$i++)

            <option value="{{$paket[$i]->id}}">{{$paket[$i]->nama_paket." - ".$paket[$i]->harga." - ".$paket[$i]->waktu }}</option>



        @endfor
    </select>
    <br><br>
    Nama Kos
    <input type="text" class="form-control" style="width: 400px" name="nama">
    <span style="color: red;">{{ $errors->first('nama') }}</span>
    <br>
    Tipe Kos
    <select name="tipe" id="" class="form-select" style="width: 400px">
        <option value="Putra">Putra</option>
        <option value="Putri">Putri</option>
        <option value="Campur">Campur</option>
    </select>
    <span style="color: red;">{{ $errors->first('tipe') }}</span>
    <br>
    Alamat
    <input type="text" class="form-control" name="alamat" style="width: 400px">
    <span style="color: red;">{{ $errors->first('alamat') }}</span>
    <br>
    Deskripsi Kos
    <input type="text" class="form-control" name="deskripsi" style="width: 400px">
    <span style="color: red;">{{ $errors->first('deskripsi') }}</span>
    <br>
    Gambar
    <input type="file" class="form-control" name="gambar" style="width: 400px">
    <span style="color: red;">{{ $errors->first('gambar') }}</span>
    <br>
    No telp
    <input type="text" class="form-control" name="notelp" style="width: 400px">
    <span style="color: red;">{{ $errors->first('notelp') }}</span>
    <br>
    Provinsi
    <input type="text" class="form-control" name="provinsi" style="width: 400px">
    <span style="color: red;">{{ $errors->first('provinsi') }}</span>
    <br>
    Kota
    <input type="text" class="form-control" name="kota" style="width: 400px">
    <span style="color: red;">{{ $errors->first('kota') }}</span>
    <br>
    Kecamatan
    <input type="text" class="form-control" name="kecamatan" style="width: 400px">
    <span style="color: red;">{{ $errors->first('kecamatan') }}</span>
    <br>
    Kelurahan
    <input type="text" class="form-control" name="kelurahan" style="width: 400px">
    <span style="color: red;">{{ $errors->first('kelurahan') }}</span>
    <br>
    Kode Pos
    <input type="text" class="form-control" name="kodepos" style="width: 400px">
    <span style="color: red;">{{ $errors->first('kodepos') }}</span>
    <br>
    Link Google Maps
    <input type="text" class="form-control" name="link" style="width: 400px">
    <span style="color: red;">{{ $errors->first('link') }}</span>

    <br>
    <button type="submit">Tambah</button>




</form>

@endsection
