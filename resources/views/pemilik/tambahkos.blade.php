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
    @php
                // \Indonesia::allProvinces()
        // \Indonesia::paginateProvinces($numRows = 15)
        // \Indonesia::allCities()
        // \Indonesia::paginateCities($numRows = 15)
        // \Indonesia::allDistricts()
        // \Indonesia::paginateDistricts($numRows = 15)
        // \Indonesia::allVillages()
        // \Indonesia::paginateVillages($numRows = 15)
        $provinces = \Indonesia::allProvinces();
        $cities = \Indonesia::allCities();
        
        $districts = \Indonesia::allDistricts();
        $villages = \Indonesia::allVillages();
        // dd($location);
    @endphp
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
    <select name="provinsi" id="" class="form-select" style="width: 400px">
        @for ($i = 0; $i < count($provinces);$i++)

            <option value="{{$provinces[$i]->id}}">{{$provinces[$i]->code." - ".$provinces[$i]->name}}</option>

        @endfor
    </select>
    <span style="color: red;">{{ $errors->first('provinsi') }}</span>
    <br>
    Kota
    <select name="kota" id="" class="form-select" style="width: 400px">
        @for ($i = 0; $i < count($cities);$i++)

            <option value="{{$cities[$i]->id}}">{{$cities[$i]->code." - ".$cities[$i]->name}}</option>

        @endfor
    </select>
    <span style="color: red;">{{ $errors->first('kota') }}</span>
    <br>
    Kecamatan
    <select name="kecamatan" id="" class="form-select" style="width: 400px">
        @for ($i = 0; $i < count($districts);$i++)

            <option value="{{$districts[$i]->id}}">{{$districts[$i]->code." - ".$districts[$i]->name}}</option>

        @endfor
    </select>
    <span style="color: red;">{{ $errors->first('kecamatan') }}</span>
    <br>
    Kelurahan
    <select name="kelurahan" id="" class="form-select" style="width: 400px">
        @for ($i = 0; $i < count($villages);$i++)

            <option value="{{$villages[$i]->id}}">{{$villages[$i]->code." - ".$villages[$i]->name}}</option>

        @endfor
    </select>
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
