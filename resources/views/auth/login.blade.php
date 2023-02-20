@extends('layouts.app')

@section('content')
<section class="vh-100">
  <div class="container h-100">
    <div class="row d-flex align-items-center justify-content-center h-100">
      <div class="col-md-8 col-lg-7 col-xl-6">
        <img src="{{ url('uploads/login-register.png') }}" class="card-img-top"
                                alt="" />
      </div>
      <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
        <form method="POST" action="{{ route('login') }}">
            @csrf
          <!-- Email input -->
          <div class="form-outline mb-4">
            <label class="form-label" for="form1Example13">Email address</label>
            <input type="email" id="form1Example13" 
            class="form-control-lg form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" />
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <!-- Password input -->
          <div class="form-outline mb-4">
            <label class="form-label" for="form1Example23">Password</label>
            <input type="password" id="form1Example23"
            class="form-control-lg form-control @error('password') is-invalid @enderror" name="password" required/>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <!-- Submit button -->
          <div class="text-center">
              <button type="submit" class="btn btn-primary col-3" >Log in</button>


                <p class="text-center fw-bold my-3 mb-0 text-muted">OR</p>

    
              <a class="" href="{{route('register')}}"
                role="button">
                <i class="fab fa-facebook-f me-2"></i>Register
              </a>
          </div>



        </form>
      </div>
    </div>
  </div>
</section>

@endsection
