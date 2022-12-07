@extends("template.master")
@section("title", "Kos")

@section("content")
<br><br><br><br><br><br><br>
<div class="container mt-5">

@if ($searchstring != "")
<div class="position-absolute start-50 translate-middle">
  <h1>Search Berdasarkan "{{$searchstring}}"</h1><br>
</div>
@endif
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
<form method="post"  action="{{route('searchkos')}}">
  @csrf
  <div class="input-group mb-3">

    <div class="form-outline">
      <input  type="text" name="searchinput" placeholder="Masukkan Nama Kos"  class="form-control" style="width : 300px" />
    </div>
    <button id="search-button" type="submit" class="btn btn-primary">
      Search
    </button> 
    <br>
    &nbsp;&nbsp;
    <h5>Jenis Kos : &nbsp;&nbsp;</h5>
      <select class="custom-select theSelect" id="inputGroupSelect01" name="jeniskos" style="width: 150px">
        <option selected  value="Semua">Semua</option>
        <option value="Putra">Putra</option>
        <option value="Putri">Putri</option>
        <option value="Campur">Campur</option>
      </select>

      {{-- <h5>Harga : </h5>
      <input  type="text" name="hawal" class="form-control"/> - <input  type="text" name="hakhir" class="form-control"/> --}}
      &nbsp;&nbsp;
    <h5>Kota :&nbsp;&nbsp; </h5>  <br>
    <select name="kotafilter" id="" class="form-select theSelect" style="width: 400px">
        <option value="Semua">Semua</option>
        @for ($i = 0; $i < count($cities);$i++)

            <option value="{{$cities[$i]->name}}">{{$cities[$i]->code." - ".$cities[$i]->name}}</option>

        @endfor
    </select>
  </div>

</form>

<div id="search-result">
    <?php $listKos = $hasilsearch; ?>
    @if (count($listKos) > 0)
    @foreach ($listKos as $d)
    <div class="card mb-3">
        <img src="{{ asset("/storage/gambarkos/" .$d->kos_gambar . ".jpg") }}" class="card-img-top" alt="">
        <div class="card-body">
          <h4 class="card-title">{{$d->kos_nama}}</h4>
          <h5 class="card-title">{{$d->kos_alamat}}</h5>
          <a href="{{ url("user/kos/"
                .$d->id) }}">
                <button class="btn btn-primary">Sewa</button>
          </a>
        </div>
      </div>
    @endforeach
    @endif
</div>
</div>
<script>
  $(".theSelect").select2();
</script>
@endsection

<script>
    function search(e)
{
    e.preventDefault(); // berhentikan form submit
    console.log(e);
    var q = new URLSearchParams({ q: e.srcElement.elements.q.value });
    var req = new Request("{{ url('/master/barang/search-ajax') }}?"+q.toString(), {
        method: 'GET'
    });

    fetch(req)
    .then((resp) => resp.json())
    .then((d) => {
        console.log(d);
        renderHasil(d.data.barang);
    });
}

function renderHasil(data)
{
    var html = "";
    data.forEach(el => {
        html += `<div id='${el.kode_barang}'>
            Kode : ${el.kode_barang} <br>
            Nama Barang : ${el.nama_barang} <br>
            Harga : ${el.harga_barang} <br>
            Stok : ${el.stok_barang} <br>
            </div>`;
    });
    document
        .getElementById("search-result")
        .innerHTML = html;
}
</script>


