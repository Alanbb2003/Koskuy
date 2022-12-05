@extends("template.master")
@section("title", "Home")



@section("content")





<div class="container mt-5">
    <br><br><br>
        <div class="container">
            <div class="row justify-content-center align-items-center">

                <h1 class="heading" data-aos="fade-up">
                    Laporan Paket Iklan terjual
                </h1>

            </div>
        </div>
</div>
    <center>

        <div style="width: 500px; height: 500px;">

            <canvas id="myChart"></canvas>
        </div>
    </center>





<br><br>





{{-- @foreach ($data as $h)
            String({{$h->paket}}),
        @endforeach --}}


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script type="text/javascript">

    @foreach ($data as $h)
        var paket =  String({{ $h->jumlah }});
        var labels =  String({{ $h->paket }});
    @endforeach


  const data = {
    labels:[
        "paket biasa", "paket premium"
    ],
    datasets: [{
      label: "Jumlah ",
      backgroundColor: ['rgb(255, 0, 0)',
                        'rgb(0, 0, 255)',
                        ],
      borderColor: 'rgb(255, 255, 255)',
      data:  [@foreach ($data as $h)
                String({{ $h->jumlah }}),
            @endforeach]
    }]
  };

  const config = {
    type: 'pie',
    data: data,

  };

  new Chart(
    document.getElementById('myChart'),
    config
  );
</script>



@endsection
