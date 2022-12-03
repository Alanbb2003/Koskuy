
@extends("template.master")
@section("title", "Home")

@section("content")

<div class="container mt-5">
<br><br><br>
    <div class="container">
        <div class="row justify-content-center align-items-center">
          {{-- <div class="col-lg-9 text-center" style="background-color:silver;">
            <h1 class="heading" data-aos="fade-up">
                ini Admin HomePage
            </h1>
            <p style="color: white">Website ini dibuat untuk membantu para pelajar maupun pekerja dalam mencari tempat kos yang dekat dengan lokasi kerja</p>  
          </div> --}}
          <div>
            <h1>Kos booked per month</h1>
            <canvas id="myChart" height="100px"></canvas>
          </div>
        </div>
      </div>

</div>
@endsection

@section("jscode")
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script type="text/javascript">
      var labels =  {{ Js::from($labels) }};
      var users =  {{ Js::from($data) }};
      const data = {
        labels: labels,
        datasets: [{
          label: 'Kos Booked',
          backgroundColor: 'rgb(255, 99, 132)',
          borderColor: 'rgb(255, 99, 132)',
          data: users,
        }]
      };
      const config = {
        type: 'line',
        data: data,
        options: {}
      };
      const myChart = new Chart(
        document.getElementById('myChart'),
        config
      );
</script>
@endsection