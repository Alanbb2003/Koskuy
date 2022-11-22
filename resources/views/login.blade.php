@extends("template.master")
@section("title", "Login")

@section("content")
{{-- <div class="container"> --}}
    {{-- <h1 style="color : grey">Login</h1>
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
      <a href="{{url('/register')}}" class="btn btn-outline-success">Register</a>
    </form> --}}
    <br>
    <br>  
    <section class="vh-100" style="background-color: white;">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col col-xl-10">
            <div class="card" style="border-radius: 1rem;">
              <div class="row g-0">
                <div class="col-md-6 col-lg-5 d-none d-md-block">
                  <img src="{{asset('images/login/4957136.jpg')}}"
                    alt="login form" class="img-fluid mt-4" style="border-radius: 1rem 0 0 1rem;" />
                    <a href="http://www.freepik.com/author/stories" class="small text-muted ms-5">Designed by storyset / Freepik</a>
                </div>
                <div class="col-md-6 col-lg-7 d-flex align-items-center">
                  <div class="card-body p-4 p-lg-5 text-black">
    
                    <form action="{{route('loginfunc')}}" method="POST">
                      @csrf
                      <div class="d-flex align-items-center mb-3 pb-1">
                        <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                        <span class="h1 fw-bold mb-0">koskuy</span>
                      </div>
    
                      <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>
    
                      <div class="form-floating mb-4">
                        <input type="text" id="inpUser" name="inpUser" class="form-control form-control-lg" placeholder="Username"/>
                        <label class="form-label" for="inpUser">Username</label>
                      </div>
    
                      <div class="form-floating mb-4">
                        <input type="password" id="inpPassword" name="inpPassword" class="form-control form-control-lg" placeholder="Password"/>
                        <label class="form-label" for="inpPassword">Password</label>
                      </div>
    
                      <div class="pt-1 mb-4">
                        <button class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
                      </div>
    
                      {{-- <a class="small text-muted" href="#!">Forgot password?</a> --}}
                      <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="{{url('/register')}}"
                          style="color: #393f81;">Register here</a></p>
                          <div>
                            @include("message")
                        </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection