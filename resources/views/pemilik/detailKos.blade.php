@extends("template.sidenavpemilik")

@section("title", "Edit Profile")

@section("content")

<h1>Detail Kos</h1>
  <div class="ok d-flex justify-content-left">
    <div class="align-self-auto" style="width: 500px;">
        <br><br>
            <form action="" method="post">
                @csrf
                {{-- <h3>Kode Kos: {{ $kos->id }}</h3> --}}
                <p>Nama Kos: {{ $kos->kos_nama }}</p>
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
    </div>
</div>


@endsection
