


@extends('layouts.template')
@section('stylesheet')
<style>
.invalid-feedback {
    display: block;
    width: 100%;
    margin-top: .25rem;
    font-size: 80%;
    color: #dc3545;
}
</style>

@stop('stylesheet')
@section('content')



<!-- ================================
       START FORM AREA
================================= -->
<section class="form-shared">
    <div class="container">
        <div class="row">
          <div class="col-lg-6 mx-auto">
              <div class="contact-form-action">
                  <div class="form-heading text-center">
                      <h3 class="form__title">สมัครสมาชิก</h3>
                      <p class="form__desc">หรือผ่าน social network.</p>
                  </div>
                  <!--Contact Form-->
                  <form method="POST" action="{{ route('register') }}">
                      @csrf
                      <div class="row">
                        <div class="col-lg-6 col-sm-6 col-xs-12 form-group">
                            <button class="theme-btn sign-btn btn__facebook" >
                                <i class="fa fa-facebook"></i> Facebook
                            </button>
                        </div><!-- end col-lg-4 -->
                          <div class="col-lg-6 col-sm-6 col-xs-12 form-group">
                              <button class="theme-btn sign-btn btn__google" >
                                  <i class="fa fa-google"></i> Google
                              </button>
                          </div><!-- end col-lg-4 -->


                          <div class="col-lg-12 col-sm-12 col-xs-12 account-assist text-center">
                              <p class="account__desc account__desc2">or</p>
                          </div><!-- end col-md-12 -->

                          <div class="col-lg-12 col-sm-12 form-group">
                              <input class="form-control" type="text" name="name" value="{{ old('name') }}" required placeholder="Name">
                              <span class="la la-user input-icon"></span>
                              @if ($errors->has('name'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>กรุณากรอกชื่อของท่าน</strong>
                                  </span>
                              @endif
                          </div><!-- end col-md-12 -->
                          <div class="col-lg-12 col-sm-12 form-group">
                              <input class="form-control" type="email" name="email" value="{{ old('email') }}" required placeholder="Email Address">
                              <span class="la la-envelope-o input-icon"></span>
                              @if ($errors->has('email'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>อีเมล ของคุณถูกใช้ไปแล้วหรือไม่ถูกต้อง</strong>
                                  </span>
                              @endif
                          </div><!-- end col-md-12 -->
                          <div class="col-lg-12 col-sm-12 form-group">
                              <input class="form-control" type="password" name="password" required placeholder="Password">
                              <span class="la la-lock input-icon"></span>
                              @error('password')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>password ต้องมีอย่างน้อย 8-10 ตัว</strong>
                                  </span>
                              @enderror
                          </div><!-- end col-md-12 -->
                          <div class="col-lg-12 col-sm-12 form-group">
                              <input class="form-control" type="password" name="password_confirmation" required placeholder="Confirm Password">
                              <span class="la la-lock input-icon"></span>
                          </div><!-- end col-md-12 -->
                          <div class="col-lg-12 col-sm-12 col-xs-12">

                              <div class="custom-checkbox">
                                  <input type="checkbox" id="chb2">
                                  <label for="chb2">ฉันยอมรับ <a href="{{url('terms_conditions')}}">ข้อกำหนดในการให้บริการ</a></label>
                              </div>
                          </div><!-- end col-md-12 -->

                          <div class="col-lg-12 col-sm-12 col-xs-12 form-group">
                              <button class="theme-btn" type="submit">สมัครสมาชิก</button>
                          </div><!-- end col-md-12 -->
                          <div class="col-lg-12 col-sm-12 col-xs-12 account-assist">
                              <p class="account__desc">มีบัญชีอยู่แล้ว?<a href="{{url('login')}}"> เข้าสู่ระบบ</a></p>
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
