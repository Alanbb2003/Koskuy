@extends("template.sidenavpemilik")

@section("title", "Preview dan Pembayaran")

@section("content")
<form action="">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<table class="table">
    <h1>Detail Kos</h1>
    <thead>
      <th>Nama</th>
      <th>Tipe</th>
      <th>Alamat</th>
      <th>Deskripsi</th>
      <th>Notelp</th>
      <th>Kode Pos</th>
      <th>Gambar</th>
    </thead>
    <tbody>
      @php
    //dd(Session::get("dataKamar"))
    // dd(Session::get("dataKos"))
      // $listSubs = DB::select('select * from item where user = ?', [$userNow->username]);
        $kos = Session::get("dataKos");
        $kamar = Session::get("dataKamar");
      @endphp
          <tr>
            <td>{{ $kos->nama }}</td>
            <td>{{ $kos->tipe }}</td>
            <td>{{ $kos->alamat}}, {{$kos->kelurahan}}, {{$kos->kecamatan}}, {{$kos->kota}}, {{$kos->provinsi }}</td>
            <td>{{ $kos->deskripsi }}</td>
            <td>{{ $kos->notelp }}</td>
            <td>{{ $kos->kodepos }}</td>
            <td><img src="{{ asset("storage/gambar/".$kos->kos_gambar) }}" alt="" style="width: 200px;height: 200px;"><br></td>
            <td>
              {{-- <a href="/editSubsUser" class="btn btn-warning">Edit Item</a> --}}
                  {{-- <form action="{{ route('addToCart', ['kode' => $subs->kode]) }}" method="get" style="margin: 0">
                    <input type="submit" value="Add To Cart" class="btn btn-primary">
                  </form>
                  <br><br>
                  <form action="{{ route('detailSubs', ['kode' => $subs->kode]) }}" method="get" style="margin: 0">
                      <input type="submit" value="Detail" class="btn btn-primary">
                  </form> --}}
            </td>
          </tr>
    </tbody>
  </table>

  <table class="table">
    <h1>Detail Kamar</h1>
    <thead>
      <th>Jenis</th>
      <th>Harga</th>
      <th>Jumlah</th>
      <th>Luas</th>
      <th>Status</th>
      <th>Deskripsi</th>
      <th>AC</th>
      <th>KM Dalam</th>
      <th>Wifi</th>
      <th>TV</th>
      <th>Kulkas</th>
      <th>Gambar</th>
    </thead>
    <tbody>
      @php
    // dd(Session::get("dataKamar"))
    // dd(Session::get("dataKos"))
      // $listSubs = DB::select('select * from item where user = ?', [$userNow->username]);
        $kos = Session::get("dataKos");
        $kamar = Session::get("dataKamar");
      @endphp
          <tr>
            <td>{{ $kamar->jenis }}</td>
            <td>{{ $kamar->harga }}</td>
            <td>{{ $kamar->jumlah }}</td>
            <td>{{ $kamar->luas }} m2</td>
            <td>{{ $kamar->status }}</td>
            <td>{{ $kamar->deskripsi }}</td>
            <td>
                @if ($kamar->ac == null)
                {{"Tidak Tersedia"}}
                @else
                {{"Tersedia"}}
                @endif
            </td>
            <td>
                @if ($kamar->kmd == null)
                {{"Tidak Tersedia"}}
                @else
                {{"Tersedia"}}
                @endif
            </td>
            <td>
                @if ($kamar->wifi == null)
                {{"Tidak Tersedia"}}
                @else
                {{"Tersedia"}}
                @endif
            </td>
            <td>
                @if ($kamar->tv == null)
                {{"Tidak Tersedia"}}
                @else
                {{"Tersedia"}}
                @endif
            </td>
            <td>
                @if ($kamar->kulkas == null)
                {{"Tidak Tersedia"}}
                @else
                {{"Tersedia"}}
                @endif
            </td>
            <td><img src="{{ asset("storage/gambar/".$kamar->gambar_kamar) }}" alt="" style="width: 200px;height: 200px;"><br></td>
          </tr>
    </tbody>
  </table>
  <h3>Pemilihan Paket</h3>
  <div class="card">
    <div class="card-body">
      @php
          $kos = Session::get("dataKos");
          $detailpaket = DB::table("paket_iklan")->where("id", "=",$kos->paket)->first();
      @endphp
      Nama Paket : <b>{{$detailpaket->nama_paket}}</b>  <br>
      Harga : <b>Rp.{{$detailpaket->harga}}</b><br>
    </div>
  </div>
  <br>
  <h3>Pembayaran</h3>
  <div class="card">
    <div class="card-body">
      Mohon melakukan transfer sejumlah <b>Rp.{{$detailpaket->harga}}</b> ke rekening berikut: <br>
      Bank : <b>Bank BCA</b>  <br>
      No. Rek : <b>3131 3213 3457 6788</b>  <br>
      Atas Nama : <b>PT ISTTS CARI KOS</b>  <br>
        
      Validasi pembayaran akan dilakukan oleh admin dan setelah itu iklan anda akan publish.
    </div>
  </div>
</form>
{{-- <a href="addKosToDB"><button>Simpan & Bayar</button></a> --}}
  <form action="{{ route('addKosToDB') }}" method="get" style="margin: 0">
    <input type="submit" value="Simpan & Bayar" class="btn btn-primary">
 </form>
@endsection
