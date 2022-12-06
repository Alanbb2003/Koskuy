@extends("template.master")
@section("title", "Home")


@section("content")

<div class="container mt-5">
    <br><br><br>
        <div class="container">
            <div class="row justify-content-center align-items-center">

                <h1 class="heading" data-aos="fade-up">
                    Laporan Jumlah Kos
                </h1>

            </div>
        </div>
</div>
<center>

{{-- <button onclick="window.print()" class="btn btn-secondary" style="margin-top: -20px">Print</button> --}}
</center>
<br>
<center>

    <div class="form-control" style="background-color: cornflowerblue; padding: 10px; width: 85%; height: 100%;" >
        <table class="table w-full" style="border-radius: 50%">
            <tr class="table-primary">
                <th scope="col">No</th>
                <th scope="col">Nama Pemilik</th>
                <th scope="col">Nomor Telp</th>
                <th scope="col">Jumlah Kos</th>

            </tr>
            @if(count($data) > 0)
                @for($i=0; $i < count($data); $i++)
                    <tr>
                        <th scope="row">{{$i+1}}</th>
                        <td>{{$data[$i]->fullname}}</td>
                        <td>{{$data[$i]->user_telp}}</td>
                        <td>{{$data[$i]->jumlah}}</td>
                    </tr>
                @endfor


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
