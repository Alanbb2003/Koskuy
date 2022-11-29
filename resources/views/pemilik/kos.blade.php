@extends("template.sidenavpemilik")

@section("title", "Kos")


@section("content")

{{-- <a href="/owner/HTambahKos"><button class="btn btn-success">Tambah Kos</button></a> --}}

<h2>List Kos Anda</h2>
<table class="table table-hover" >
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama kos</th>
        <th scope="col">Alamat</th>
        <th scope="col">Tipe</th>
        <th scope="col">Deskripsi</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @if(count($datakos) > 0)
            @for($i=0; $i < count($datakos); $i++)
                <tr>
                    <th scope="row">{{$i+1}}</th>
                    <td>{{$datakos[$i]->kos_nama}} </td>
                    <td>{{$datakos[$i]->kos_alamat}} </td>
                    <td>{{$datakos[$i]->kos_tipe}}</td>
                    <td>{{$datakos[$i]->kos_deskripsi}}</td>
                    <td>

                        <a href="{{url('/owner/editkos'.$datakos[$i]->id)}}"><button class="btn btn-danger">Edit</button></a>
                        {{-- <a href="{{url('/owner/detailkos'.$datakos[$i]->id)}}"><button class="btn btn-success">Detail Kos</button></a> --}}
                        <form action="{{ route('detailkos', ['id' => $datakos[$i]->id]) }}" method="get" style="margin: 0">
                            <input type="submit" value="Detail" class="btn btn-success">
                        </form>
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
