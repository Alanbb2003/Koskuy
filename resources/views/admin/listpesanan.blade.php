@extends("template.master")
@section("title", "Home")

@section("content")

<div class="container mt-5">
<br><br><br>
    <div class="container">
        <div class="row justify-content-center align-items-center">
          <div class="col-lg-9 text-center" style="background-color:silver;">
            <h1 class="heading" data-aos="fade-up">
                List Pesanan
            </h1>
            </div>
        </div>
      </div>
</div>

<div class="container">
    <table class="table">
        <tr class="table-primary">
            <th scope="col">No</th>
            <th scope="col">Nama User</th>
            <th scope="col">Nama Kos</th>
            <th scope="col">Paket</th>
            <th scope="col">Harga</th>
            <th scope="col">Tanggal Transaksi</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
            {{-- <td></td> --}}
        </tr>
        @for ($i = 0; $i < count($data);$i++)

        <tr>
            <td>{{$i+1}}</td>
            <td>{{$data[$i]->fullname}}</td>
            <td>{{$data[$i]->kos_nama}}</td>
            <td>{{$data[$i]->nama_paket}}</td>
            <td>{{$data[$i]->harga}}</td>
            <td>{{$h[$i]->created_at}}</td>
            <td>
                @if ($h[$i]->status == 0)
                Menunggu Konfirmasi
                @elseif ($h[$i]->status == 1)
                Menunggu Konfirmasi
                @else
                Sudah Bayar
                @endif
            </td>
            <td>
                @if ($h[$i]->status == 0)
                <a href="{{url('/admin/konfirmasipesanan/'.$h[$i]->id)}}"><button class="btn btn-danger">Konfirmasi</button></a>
                @elseif ($h[$i]->status == 1)
                <a href="{{url('/admin/konfirmasipesanan/'.$h[$i]->id)}}"><button class="btn btn-danger">Konfirmasi</button></a>

                @else
                <a href="{{url('#')}}"><button class="btn btn-success">Done</button></a>
            @endif
            </td>
        </tr>

        @endfor
    </table>
</div>

@endsection
