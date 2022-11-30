@extends("template.master")
@section("title", "History")

@section("content")
<br><br><br><br>
<div class="container mt-5">
@if($havehistory =="none")
    <div class="container">
        <h1>User belum memesan kos</h1>
    </div>
@elseif ($havehistory == "have")
<div class="container">
    <table class="table">
      <tr>
          <th>No</th>
          <th>Nama Kos</th>
          <th>Tipe Kos</th>
          <th>Alamat_kos</th>
          <th>No Telephone</th>
          <th>Tanggal Pesan</th>
      </tr>
      @foreach ($history as $h)
      <tr>
          <td>{{ $h->id}}</td>
          <td>{{ $h->kos_nama}}</td>
          <td>{{ $h->kos_tipe}}</td>
          <td>{{ $h->kos_alamat}}</td>
          <td>{{ $h->kos_notelp}}</td>
          <td>{{ $h->created_at}}</td>
          {{-- <td>
                <a href="" class="btn btn-info">Detail</a>
          </td> --}}
      </tr>
      @endforeach
  </table>
  </div>
@endif
</div>
    
@endsection