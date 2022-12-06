@extends("template.master")
@section("title", "History")

@section("content")
<br><br><br><br>
<div class="container mt-5">
@if($history == null)
    <div class="container">
        <h1>User belum memesan kos</h1>
    </div>
@elseif ($history != null)
<div class="container">
    <table class="table">
      <tr>
          <th>Nama Kos</th>
          <th>Tipe Kos</th>
          <th>Alamat_kos</th>
          <th>No Telephone</th>
          <th>Status</th>
          <th>Action</th>
      </tr>
      @foreach ($history as $h)
      <tr>
<<<<<<< HEAD
=======
          <td>{{ $h->booking_id}}</td>
>>>>>>> 044f667b69eb4b266a0f53d3a188a592be41ff53
          <td>{{ $h->kos_nama}}</td>
          <td>{{ $h->kos_tipe}}</td>
          <td>{{ $h->kos_alamat}}</td>
          <td>{{ $h->kos_notelp}}</td>
          <td>{{ $h->status}}</td>
          @if ($h->status == "pending")
          <form method="post"  action="{{route('cancelbook')}}">
            @csrf
            <input type="hidden" name="id_booking" value="{{$h->id}}">

            <td><button type="submit" class="btn btn-danger">Cancel</button></td>
        </form>
            @else
            <td></td>
        @endif
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
