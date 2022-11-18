@extends("template.master")
@section("title", "Login")

@section("content")
  <br><br>
    <section class="vh-100" style="background-color: white;">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col col-xl-10">
            <div class="card" style="border-radius: 1rem;">
              <div class="row g-0">
                <div class="col-md-6 col-lg-5 d-none d-md-block">
                  <img src="{{asset('images/register/6368592.jpg')}}"
                    alt="login form" class="img-fluid mt-4" style="border-radius: 1rem 0 0 1rem;" />
                    <a href="http://www.freepik.com" class="small text-muted ms-5">Designed by storyset / Freepik</a>
                </div>
                <div class="col-md-6 col-lg-7 d-flex align-items-center">
                  <div class="card-body p-4 p-lg-5 text-black">
    
                    <form action="{{route('registerfunc')}}" method="POST">
                      @csrf
                      <div class="d-flex align-items-center mb-3 pb-1">
                        <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                        <span class="h1 fw-bold mb-0">koskuy</span>
                      </div>
    
                      <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign up to KosKuy</h5>
    
                      <div class="form-floating mb-4">
                        <input type="text" id="regUser" name="regUser" class="form-control form-control-lg" placeholder="Username"/>
                        <label class="form-label" for="regUser">Username</label>
                      </div>
    
                      <div class="form-floating mb-4">
                        <input type="text" id="regNama" name="regNama" class="form-control form-control-lg" placeholder="Full Name"/>
                        <label class="form-label" for="regNama">Full Name</label>
                      </div>

                      <label class="form-label">
                        Register As
                      </label>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="role" id="pencari">
                        <label class="form-check-label" for="pencari">
                          Pencari
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="role" id="pemilik" checked>
                        <label class="form-check-label" for="pemilik">
                          Pemilik
                        </label>
                      </div>

                      <div class="form-floating mb-4">
                        <input type="password" id="regPass" name="regPass" class="form-control form-control-lg" placeholder="Password"/>
                        <label class="form-label" for="regPass">Password</label>
                      </div>

                      <div class="form-floating mb-4">
                        <input type="password" id="conPass" name="conPass" class="form-control form-control-lg" placeholder="Confirmation Password" />
                        <label class="form-label" for="conPass">Confirmation Password</label>
                      </div>
    
                      <div class="pt-1 mb-4">
                        <button class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
                      </div>
                      <p class="mb-5 pb-lg-2" style="color: #393f81;">have an account ? <a href="{{url('/login')}}"
                          style="color: #393f81;">Login here</a></p>
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