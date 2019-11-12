@extends('layouts.template')
@section('stylesheet')
<link rel="stylesheet" type="text/css" href="{{url('assets/datetimepicker-master/jquery.datetimepicker.css')}}"/>
<link href="{{url('home/icheck/skins/all.css?v=1.0.2')}}" rel="stylesheet">
<style>
.breadcrumb-area {
    background-image: url('{{url('assets/home/1920_450.png')}}');
}
</style>

@stop('stylesheet')
@section('content')




<!-- ================================
    START BREADCRUMB AREA
================================= -->
<section class="breadcrumb-area" style="background-image: url({{url('assets/images/breadcrumb-bg.jpg')}});">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-content">

                    <h2 class="breadcrumb__title">แจ้งชำระเงินโอน</h2>

                </div><!-- end breadcrumb-content -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end breadcrumb-area -->
<!-- ================================
    END BREADCRUMB AREA
================================= -->

<!-- ================================
       START ADMISSION AREA
================================= -->
<section class="admission-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading text-center">

                    <h2 class="section__title">แจ้งชำระเงินโอน</h2>
                    <span class="section__divider"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="admission-body">
                    <div class="contact-form-action">
                        <!--Contact Form-->
                        <form action="{{url('post_payment_notify/')}}" method="post" enctype="multipart/form-data">
                          {{ csrf_field() }}
                            <div class="row">

                              <div class="col-lg-6 form-group">
                                  <label class="form-label">เลขคำสั่งซื้อ*</label>
                                  <input class="form-control" type="text" name="order_id" value="{{ old('order_id') }}" placeholder="หมายเลขคำสั่งซื้อ">
                                  @if ($errors->has('order_id'))
                                  <p class="text-danger" style="margin-top:10px;">
                                    คุณต้องกรอก เลขคำสั่งซื้อ ด้วยค่ะ
                                  </p>
                                  @endif
                              </div><!-- end col-lg-6 -->


                                <div class="col-lg-6 form-group">
                                    <label class="form-label">ชื่อ - นามสกุล*</label>
                                    <input class="form-control" type="text" name="name" value="{{ old('name') }}">
                                    @if ($errors->has('name'))
                                    <p class="text-danger" style="margin-top:10px;">
                                      คุณต้องกรอก ชื่อ-นามสกุล ด้วยค่ะ
                                    </p>
                                    @endif
                                </div><!-- end col-lg-6 -->



                                <div class="col-lg-6 form-group">
                                    <label class="form-label">อีเมล*</label>
                                    <input class="form-control" type="text" name="email" value="{{ old('email') }}">
                                    @if ($errors->has('email'))
                                    <p class="text-danger" style="margin-top:10px;">
                                      คุณต้องกรอก email ด้วยค่ะ
                                    </p>
                                    @endif
                                </div><!-- end col-lg-6 -->


                                <div class="col-lg-6 form-group">
                                    <label class="form-label">เบอร์ติดต่อ*</label>
                                    <input class="form-control" type="text" name="phone" value="{{ old('phone') }}">
                                    @if ($errors->has('phone'))
                                    <p class="text-danger" style="margin-top:10px;">
                                      คุณต้องกรอก เบอร์ติดต่อ ด้วยค่ะ
                                    </p>
                                    @endif
                                </div><!-- end col-lg-6 -->


                                <div class="col-lg-12">
                                <div class="demo-callbacks ">
                                    <div class="demo-list">


                                      <label class="form-label">โอนเงินเข้าธนาคารไหน?*</label>
                                      <br /><br />


                                    <ul style="padding-left:30px;">
                                      @if(isset($objs))
                                      @foreach($objs as $u)
                                      <li style="margin-bottom:20px;">
                                        <img src="{{url('assets/images/bank/'.$u->image)}}" class="img-responsive" style="margin-top:-5px; height:30px; float:left; margin-right:6px;">
                                        <input tabindex="3" type="radio" id="input-3" name="bank" value="{{$u->id}}">
                                        <label for="input-3" id="label-r" style="padding-left:10px;">{{$u->bank_name}} <span style="padding-left:10px;">{{$u->bank_number}}</span> 	<span style="padding-left:10px;">{{$u->bank_owner}}</span></label>
                                      </li>
                                      @endforeach
                                    @endif



                                    </ul>
                                    <br />

                                    </div>

                                    @if ($errors->has('bank'))
                                    <p class="text-danger text-right" style="margin-top:10px;">
                                      คุณต้องเลือก โอนเงินเข้าธนาคาร ด้วยค่ะ
                                    </p>
                                    @endif
                                  </div>
                                  </div>

                                  <div class="col-lg-12 form-group">
                                      <label class="form-label">จำนวนเงิน*</label>
                                      <input class="form-control" type="text" name="money" value="{{ old('money') }}">
                                      @if ($errors->has('money'))
                                                        <p class="text-danger" style="margin-top:10px;">
                                                          คุณต้องกรอก จำนวนเงิน ด้วยค่ะ
                                                        </p>
                                                        @endif
                                  </div><!-- end col-lg-6 -->

                                  <div class="col-lg-6 form-group">
                                    <label class="form-label">วันที่-เวลาโอนเงิน*</label>
                                    <input type="text" class="form-control date-pick" name="day_tran" id="filter-date" value="<?php echo date('d/m/Y')?>"/>
                                    @if ($errors->has('day_tran'))
                                                        <p class="text-danger" style="margin-top:10px;">
                                                          คุณต้องกรอก วันที่-เวลาโอนเงิน ด้วยค่ะ
                                                        </p>
                                                        @endif

                                  </div>

                                  <div class="col-lg-6 form-group">
                                    <label class="form-label">ชั่วโมง-นาที*</label>
                                    <input type="text" class="form-control date-pick" name="time_tran"  value="<?php echo date('H:i')?>"/>


                                  </div>

                                  <div class="col-lg-12 form-group">
                                      <label class="form-label">สลิปการโอนเงิน*</label>
                                      <input class="form-control" type="file" name="image" >
                                  </div><!-- end col-lg-6 -->



                                <div class="col-lg-12 text-center">
                                    <button class="theme-btn" type="submit">Submit</button>
                                </div><!-- end col-md-12 -->
                            </div><!-- end row -->
                        </form>
                    </div><!-- end contact-form-action -->
                </div><!-- end admission-body -->
            </div><!-- end col-lg-10 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end admission-area -->
<!-- ================================
       START ADMISSION AREA
================================= -->


@endsection

@section('scripts')
<script src="{{url('home/icheck/icheck.js')}}"></script>
<script>
$('#input-3').iCheck('check');

$(document).ready(function(){

  $('.demo-list input').on('ifCreated ifClicked ifChanged ifChecked ifUnchecked ifDisabled ifEnabled ifDestroyed', function(event){

  }).iCheck({
    checkboxClass: 'icheckbox_square-blue',
    radioClass: 'iradio_square-blue',
    increaseArea: '20%'
  });
});

</script>

<script src="{{url('assets/datetimepicker-master/build/jquery.datetimepicker.full.js')}}"></script>
<script type="text/javascript">

    jQuery(document).ready(function () {
        'use strict';

        jQuery('#filter-date, #search-from-date, #search-to-date').datetimepicker({
          timepicker:false,
 format:'d/m/Y'
        });

        jQuery('#datetimepicker2').datetimepicker({
          allowTimes:[
          '22:00', '22:30', '23:00', '23:30', '24:00', '24:30',
          '01:00', '01:30', '02:00', '02:30', '03:00', '03:30', '04:00', '04:30', '05:00', '05:30', '06:00', '06:30',
          '07:00', '07:30', '08:00', '08:30', '09:00', '09:30', '10:00', '10:30', '11:00', '11:30', '12:00', '12:30',
          '13:00', '13:30', '14:00', '14:30', '15:00', '15:30', '16:00', '16:30', '17:00', '17:30', '18:00', '18:30',
          '19:00', '19:30', '20:00', '20:30', '21:00'
        ],
  datepicker:false,
  format:'H:i'
});




    });
</script>


@stop('scripts')
