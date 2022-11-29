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
<form method="post"  action="{{route('searchkos')}}">
@csrf
<div class="input-group">
    <div class="form-outline">
      <input  type="text" name="searchinput" placeholder="Masukkan lokasi. contoh : Surabaya"  class="form-control" />
    </div>
    <button id="search-button" type="submit" class="btn btn-primary">
      Search
    </button>
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
