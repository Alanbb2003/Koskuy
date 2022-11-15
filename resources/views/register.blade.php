@extends("template.master")
@section("title", "Login")

@section("content")
    <div class="container square">
        <h1 style="color : grey">Register</h1>
        <form action=" " method="POST">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="inpUser" placeholder="Username">
            <label for="inpUser" ><i>Username</i></label>
          </div>
          <div class="form-floating">
            <input type="password" class="form-control" id="inpPassword" placeholder="Password">
            <label for="inpPassword"><i>Password</i></label>
          </div>
          <br>
          <div class="form-floating">
            <input type="password" class="form-control" id="inpPassword" placeholder="Password">
            <label for="inpPassword"><i>Confirm Password</i></label>
          </div>
          <br>
          <button type="submit" class="btn btn-primary button1" id="btnLogin">Regis</button>
          <a href="/login" class="btn btn-primary button2">Login</a>
        </form>
    </div>
@endsection