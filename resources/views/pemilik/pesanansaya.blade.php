@extends("template.sidenavpemilik")

@section("title", "Tambah Kos")

@section("content")



<h2>List Request Booking</h2>
<table class="table table-hover" >
    <thead>
      <tr>
        {{-- <th scope="col">No</th> --}}
        <th scope="col">Pembooking</th>
        <th scope="col">Nomor Telp</th>
        <th scope="col">Kos</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @if(count($data1) > 0)
            @for($i=0; $i < count($data1); $i++)
                <tr>
                    {{-- <th scope="row">{{$i+1}}</th> --}}
                    <td>{{$data1[$i]->fullname}} </td>
                    <td>{{$data1[$i]->user_telp}} </td>
                    <td>{{$data1[$i]->kos_nama}}</td>
                    {{-- <td>{{$data1[$i]->kos_deskripsi}}</td> --}}
                    <td>
                        @if ($data1[$i]->booking_status == "pending")

                        <a href="{{url('/owner/konfirmbooking/'.$data1[$i]->booking_id)}}"><button class="btn btn-warning">Konfirmasi</button></a>
                        @else
                        <a href="{{url('#')}}"><button class="btn btn-success">Sudah Di Konfirmasi</button></a>

                        @endif
                    </td>
                </tr>
            @endfor
        @else
        <tr>
            <td colspan=6><center>Belum Memiliki Kos. Tambahkan Kos Pada halaman Pasang Iklan</center></td>
        </tr>
        @endif

    </tbody>
  </table>

@endsection
