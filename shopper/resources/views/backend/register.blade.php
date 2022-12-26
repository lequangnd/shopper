<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
  <title>Document</title>
</head>

<body>
  <section class="vh-100" style="background-color: #9A616D;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
          <div class="card" style="border-radius: 1rem;">
            <div class="row g-0">
              <div class="col-md-6 col-lg-5 d-none d-md-block">
                <img src="{{asset('images/img1.png')}}" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
              </div>
              <div class="col-md-6 col-lg-7 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">

                  <form method="post" action="{{route('addregister')}}">
                    @csrf

                    <div class="d-flex align-items-center mb-3 pb-1">
                      <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                      <span class="h1 fw-bold mb-0">Register</span>
                    </div>

                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign up your account</h5>
                    <div class="form-outline mb-4 @error('name') is-invalid @enderror">
                      <input type="text" name="name" id="form2Example17" class="form-control form-control-lg" placeholder="Name" />
                      @error('name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </div>

                    <div class="form-outline mb-4 @error('email') is-invalid @enderror">
                      <input type="email" name="email" id="form2Example17" class="form-control form-control-lg" placeholder="Email" />
                      @error('email')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </div>

                    <div class="form-outline mb-4 @error('password') is-invalid @enderror">
                      <input type="password" name="password" id="form2Example27" class="form-control form-control-lg" placeholder="Password" />
                      @error('password')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </div>

                    <div class="form-outline mb-4 @error('SDT') is-invalid @enderror">
                      <input type="text" name="SDT" id="form2Example17" class="form-control form-control-lg" placeholder="Number phone" />
                      @error('SDT')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </div>

                    <div class="form-outline mb-4 @error('DiaChi') is-invalid @enderror">
                      <input type="text" name="DiaChi" id="form2Example17" class="form-control form-control-lg" placeholder="Address" />
                      @error('DiaChi')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </div>

                    <div class="pt-1 mb-4">
                      <button class="btn btn-dark btn-lg btn-block" type="submit">Register</button>
                    </div>

                    <p class="mb-5 pb-lg-2" style="color: #393f81;">I have an account <a href="{{route('login')}}" style="color: #393f81;">Login here</a></p>
                    <a href="#!" class="small text-muted">Terms of use.</a>
                    <a href="#!" class="small text-muted">Privacy policy</a>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>

</html>