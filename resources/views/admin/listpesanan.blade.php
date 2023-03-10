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
            <th scope="col">Bukti Transfer</th>
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
                @if ($h[$i]->bukti != null)
                <a class="portfolio-link" data-bs-toggle="modal" href="{{url('#portfolioModal'.$i)}}">
                    <div class="portfolio-hover">
                        <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                    </div>
                    <img src="{{asset('/storage/bukti/'.$h[$i]->bukti)}}" class="class="img-fluid"" style="width: 100px; height:100px ;">

                </a>

                <div class="portfolio-modal modal fade" id="portfolioModal{{$i}}" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            {{-- <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div> --}}
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8">
                                        <div class="">

                                            <img class="img-fluid d-block mx-auto" src="{{asset('/storage/bukti/'.$h[$i]->bukti)}}" alt="..." />

                                            <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                                <i class="fas fa-xmark me-1"></i>
                                                Close
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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

        @endfor
    </table>
</div>

@endsection
