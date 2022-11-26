@extends("template.master")
@section("title", "Home")

@section("content")
<br><br><br><br>
<div class="container mt-5">
@if($havehistory !="none")
    <div class="container">
        <h1>User belum memesan kos</h1>
    </div>
@elseif ($havehistory == "have")
<div class="container">
    <table class="table">
      <tr>
          <th>No</th>
          {{-- <th>Nama kos</th> --}}
          <th>tanggal mulai sewa</th>
          <th>tanggal akhir sewa</th>
          {{-- <th>Jumlah terjual</th> --}}
          <th>tanggal tagihan</th>
      </tr>
      @foreach ($history as $h)
      <tr>
          <td>{{ $h->id}}"</td>
          <td>{{ $h->tanggal_mulai_sewa}}</td>
          <td>{{ $h->tanggal_akhir_sewa }}</td>
          <td>{{ $h->tanggal_tagihan}}</td>
          <td>
                <a href="" class="btn btn-info">Detail</a>
          </td>
      </tr>
      @endforeach
  </table>
  </div>
@endif
</div>
    
@endsection