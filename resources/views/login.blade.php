@extends("template.master")
@section("title", "Login")

@section("content")
<div class="container square">
    <h1 style="color : grey">Login</h1>
    <form action="{{route('loginfunc')}}" method="POST">
      @csrf
      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="inpUser" name="inpUser" placeholder="Username">
        <label for="inpUser"><i>Username</i></label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="inpPassword" name="inpPassword" placeholder="Password">
        <label for="inpPassword"><i>Password</i></label>
      </div>
      <br>
      <button type="submit" class="btn btn-primary" id="btnLogin">Login</button>
      <a href="/regis" class="btn btn-outline-success">Register</a>
    </form>
@endsection