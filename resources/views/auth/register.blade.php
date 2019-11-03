


@extends('layouts.template')
@section('stylesheet')


@stop('stylesheet')
@section('content')



<!-- ================================
       START FORM AREA
================================= -->
<section class="form-shared">
    <div class="container">
        <div class="row">
          <div class="col-lg-7 mx-auto">
              <div class="contact-form-action">
                  <div class="form-heading text-center">
                      <h3 class="form__title">Create an account!</h3>
                      <p class="form__desc">with your social network.</p>
                  </div>
                  <!--Contact Form-->
                  <form method="POST" action="{{ route('register') }}">
                      @csrf
                      <div class="row">
                          <div class="col-lg-6 col-sm-6 col-xs-12 form-group">
                              <button class="theme-btn sign-btn btn__google" >
                                  <i class="fa fa-google"></i> Google
                              </button>
                          </div><!-- end col-lg-4 -->
                          <div class="col-lg-6 col-sm-6 col-xs-12 form-group">
                              <button class="theme-btn sign-btn btn__facebook" >
                                  <i class="fa fa-facebook"></i> Facebook
                              </button>
                          </div><!-- end col-lg-4 -->

                          <div class="col-lg-12 col-sm-12 col-xs-12 account-assist text-center">
                              <p class="account__desc account__desc2">or</p>
                          </div><!-- end col-md-12 -->

                          <div class="col-lg-12 col-sm-12 form-group">
                              <input class="form-control" type="text" name="name" value="{{ old('name') }}" required placeholder="Name">
                              <span class="la la-user input-icon"></span>
                              @error('name')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div><!-- end col-md-12 -->
                          <div class="col-lg-12 col-sm-12 form-group">
                              <input class="form-control" type="email" name="email" value="{{ old('email') }}" required placeholder="Email Address">
                              <span class="la la-envelope-o input-icon"></span>
                              @error('email')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div><!-- end col-md-12 -->
                          <div class="col-lg-12 col-sm-12 form-group">
                              <input class="form-control" type="text" name="password" required placeholder="Password">
                              <span class="la la-lock input-icon"></span>
                              @error('password')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div><!-- end col-md-12 -->
                          <div class="col-lg-12 col-sm-12 form-group">
                              <input class="form-control" type="text" name="password_confirmation" required placeholder="Confirm Password">
                              <span class="la la-lock input-icon"></span>
                          </div><!-- end col-md-12 -->
                          <div class="col-lg-12 col-sm-12 col-xs-12">

                              <div class="custom-checkbox">
                                  <input type="checkbox" id="chb2">
                                  <label for="chb2">I agree to Aduca's <a href="#">Terms of Services</a></label>
                              </div>
                          </div><!-- end col-md-12 -->

                          <div class="col-lg-12 col-sm-12 col-xs-12 form-group">
                              <button class="theme-btn" type="submit">Register Account</button>
                          </div><!-- end col-md-12 -->
                          <div class="col-lg-12 col-sm-12 col-xs-12 account-assist">
                              <p class="account__desc">Already have an account?<a href="{{url('login')}}"> Log in</a></p>
                          </div><!-- end col-md-12 -->
                      </div><!-- end row -->
                  </form>
              </div><!-- end contact-form -->
          </div>
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end form-shared -->
<!-- ================================
       START FORM AREA
================================= -->


@endsection

@section('scripts')

@stop('scripts')
