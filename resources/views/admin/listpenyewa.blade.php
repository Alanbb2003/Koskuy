@extends("template.master")
@section("title", "Home")

@section("content")

<div class="container mt-5">
<br><br><br>
    <div class="container">
        <div class="row justify-content-center align-items-center">
          <div class="col-lg-9 text-center" style="background-color:silver;">
            <h1 class="heading" data-aos="fade-up">
                List Penyewa
            </h1>
           </div>
        </div>
      </div>
</div>
<div class="container">
    <table class="table">
        <tr class="table-primary">
            <td>Username</td>
            <td>Fullname</td>
            <td>Email</td>
            <td>telp</td>
            {{-- <td></td> --}}
        </tr>
        @foreach ($listUser as $m)
        <tr>
            <td>{{$m->username}}</td>
            <td>{{$m->fullname}}</td>
            <td>{{$m->email}}</td>
            <td>{{$m->user_telp}}</td>
            {{-- <td><button type="button" class="btn btn-danger">Delete</button></td>  --}}
        </tr>     
        @endforeach
    </table>
</div>

@endsection