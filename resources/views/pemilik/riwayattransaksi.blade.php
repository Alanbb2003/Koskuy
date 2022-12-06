@extends("template.sidenavpemilik")

@section("title", "Kos")


@section("content")

{{-- <a href="/owner/HTambahKos"><button class="btn btn-success">Tambah Kos</button></a> --}}

<h2>Riwayat Transaksi</h2>
<table class="table table-hover" >
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama Kos</th>
        <th scope="col">Paket</th>
        <th scope="col">Harga</th>
        <th scope="col">Status</th>
        <th scope="col">Tanggal Transaksi</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @if(count($datatrans) > 0)
            @for($i=0; $i < count($datatrans); $i++)
                <tr>
                    <th scope="row">{{$i+1}}</th>
                    <td>{{$datatrans[$i]->kos_nama}} </td>
                    <td>{{$datatrans[$i]->nama_paket}} </td>
                    <td>{{$datatrans[$i]->harga}}</td>
                    <td>
                        @if ($h[$i]->status == 0)
                            Menunggu Konfirmasi
                            @elseif ($h[$i]->status == 1)
                            Menunggu Konfirmasi
                            @else
                            Sudah Bayar
                        @endif

                    </td>
                    <td>{{$h[$i]->created_at}}</td>
                    <td>
                        @if ($h[$i]->status == 0)
                            <a href="{{url('/owner/Huploadbukti/'.$h[$i]->id)}}"><button class="btn btn-danger">Upload Bukti Pembayaran</button></a>
                        @elseif ($h[$i]->status == 1)

                            <a href="#"><button class="btn btn-danger">Menunggu Konfirmasi</button></a>
                            @else
                            <a href="#"><button class="btn btn-success">Done</button></a>
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
