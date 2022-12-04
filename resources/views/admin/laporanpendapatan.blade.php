@extends("template.master")
@section("title", "Home")


@section("content")

<div class="container mt-5">
    <br><br><br>
        <div class="container">
            <div class="row justify-content-center align-items-center">

                <h1 class="heading" data-aos="fade-up">
                    Laporan Pendapatan
                </h1>

            </div>
        </div>
</div>
<center>
<div class="form-control" style="background-color: cornflowerblue; padding: 10px; width: 85%; height: 150px;" >
    <form action="" method="POST"  >
        <div class="d-flex">
            <div class="" style="width: 500px;height: 90px;">
                <label class="label">
                    <span class="">Tanggal awal</span>
                </label><br>
                <input type="date"  name="tgl1" class="form-control" style="height: 40px">
            </div>
            &nbsp;
            &nbsp;
            &nbsp;
            <div  style="width: 500px;height: 90px;">
                <label class="label">
                    <span class="">Tanggal akhir</span>
                </label>
                <br>
                <input type="date"  name="tgl2" class="form-control" style="height: 40px" >
            </div>
            &nbsp;
            <br>
            <button class="btn btn-secondary" style="height: 50px; margin-top: 15px; ">Search!</button>
        </div>
    </form>
    <div class="d-flex">

        <button onclick="window.print()" class="btn btn-secondary" style="margin-top: -20px">Print</button>
    </div>
</div>
</center>
<br>
<center>

    <div class="form-control" style="background-color: cornflowerblue; padding: 10px; width: 85%; height: 100%;" >
        <table class="table w-full" style="border-radius: 50%">
            <tr class="table-primary">
                <th scope="col">No</th>
                <th scope="col">Waktu Transaksi</th>
                <th scope="col">Tipe Paket</th>
                <th scope="col">Pendapatan</th>
                
            </tr>
            {{-- @for ($i = 0; $i < count($data);$i++)

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
                    @if ($h[$i]->bukti != null)

                    <img src="{{asset('/storage/bukti/'.$h[$i]->bukti)}}" style="width: 100px; height:100px ;">
                    @else
                        Belum Ada

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

            @endfor --}}
        </table>
    </div>
</center>





@endsection
