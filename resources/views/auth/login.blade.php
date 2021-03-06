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
            <div class="col-lg-6 mx-auto">
                <div class="contact-form-action">
                    <div class="form-heading text-center">
                        <h3 class="form__title">เข้าสู่ระบบ <!-- {{Session::get('refer_code')}} --></h3>
                        <p class="form__desc">ผ่านโดย social network.</p>
                    </div>
                    <form class="form-horizontal" name="social">
                      <div class="row text-center">
                        <div class="col-lg-6 col-sm-6 col-xs-12 form-group">
                            <a class="theme-btn sign-btn btn__facebook" href="{{ route('social.oauth', 'facebook') }}">
                                <i class="fa fa-facebook"></i> Facebook
                            </a>
                        </div><!-- end col-lg-4 -->
                          <div class="col-lg-6 col-sm-6 col-xs-12 form-group">
                              <a class="theme-btn sign-btn btn__google" href="{{ route('social.oauth', 'google') }}">
                                  <i class="fa fa-google"></i> Google
                              </a>
                          </div><!-- end col-lg-4 -->
                      </div>
                    </form>

                    <!--Contact Form-->
                    <form class="form-horizontal" role="form" method="POST" name="login" action="{{ url('/login') }}">
                        {{ csrf_field() }}
                        <div class="row">



                            <div class="col-lg-12 col-sm-12 col-xs-12 account-assist text-center">
                                <p class="account__desc account__desc2">or</p>
                            </div><!-- end col-md-12 -->
                            <div class="col-lg-12 col-sm-12 form-group">
                                <input class="form-control" type="text" name="email" placeholder="Email">
                                @if ($errors->has('email'))
                                  <span class="help-block">
                                      <strong>อีเมลของท่านไม่อยู่ในระบบ</strong>
                                  </span>
                              @endif
                                <span class="la la-user input-icon"></span>
                            </div><!-- end col-md-12 -->
                            <div class="col-lg-12 col-sm-12 form-group">
                                <input class="form-control" type="password" name="password" placeholder="Password">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                <span class="la la-lock input-icon"></span>
                            </div><!-- end col-md-12 -->
                            <div class="col-lg-12 col-sm-12 col-xs-12 form-condition">
                                <div class="custom-checkbox">
                                    <input type="checkbox" id="chb1">
                                    <label for="chb1">จดจำฉันไว้</label>
                                    <a href="{{url('password/reset')}}" class="pass__desc"> ลืมรหัสผ่านใช่ไหม?</a>
                                </div>
                            </div>
                            <div class="col-lg-12 col-sm-12 col-xs-12 form-group">
                                <button class="theme-btn" type="submit">เข้าสู่ระบบ</button>
                            </div><!-- end col-md-12 -->
                            <div class="col-lg-12 col-sm-12 col-xs-12 account-assist">
                                <p class="account__desc">ยังไม่ได้เป็นสมาชิก?<a href="{{url('register')}}"> สมัครสมาชิก</a></p>
                            </div><!-- end col-md-12 -->
                        </div><!-- end row -->
                    </form>
                </div><!-- end contact-form -->
            </div><!-- end col-md-7 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end form-shared -->
<!-- ================================
       START FORM AREA
================================= -->

@endsection

@section('scripts')

@stop('scripts')
