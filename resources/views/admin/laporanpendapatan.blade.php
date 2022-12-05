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
    <form action="{{url('/admin/Flaporanpendapatan')}}" method="GET"  >
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
            <button class="btn btn-secondary" style="height: 50px; margin-top: 15px; ">Search</button>
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
                <th scope="col">Tanggal Transaksi</th>
                <th scope="col">Tipe Paket</th>
                <th scope="col">Pendapatan</th>

            </tr>
            @if(count($data) > 0)
                @for($i=0; $i < count($data); $i++)
                    <tr>
                        <th scope="row">{{$i+1}}</th>
                        <td>{{$data[$i]->tgl_trans}}</td>
                        <td>{{$data[$i]->nama_paket}}</td>
                        <td>{{number_format($data[$i]->harga)}}</td>
                    </tr>
                @endfor
                <tr>
                    <td colspan="4"><b>Total = IDR {{number_format($total)}} </b> </td>
                </tr>
            @else

            <tr>
                <td colspan=6><center>Empty</center></td>
            </tr>
            @endif
        </table>
    </div>
</center>

<br><br>










@endsection
