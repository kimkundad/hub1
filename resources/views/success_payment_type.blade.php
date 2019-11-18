@extends('layouts.template')
@section('stylesheet')
<link rel="stylesheet" type="text/css" href="{{url('assets/datetimepicker-master/jquery.datetimepicker.css')}}"/>
<link href="{{url('home/icheck/skins/all.css?v=1.0.2')}}" rel="stylesheet">
<style>
.breadcrumb-area {
    background-image: url('{{url('assets/home/1920_450.png')}}');
}
.theme-payment-success-summary {
    list-style: none;
    margin: 0;
    padding: 0;
    font-size: 13px;
}
.theme-payment-success-summary > li {
    padding-bottom: 10px;
    margin-bottom: 10px;
    border-bottom: 1px dashed #d9d9d9;
    position: relative;
    color: #808080;
}
.theme-payment-success-summary > li > span {
    color: #4d4d4d;
    position: absolute;
    top: 0;
    right: 0;
    font-weight: bold;
}
</style>

@stop('stylesheet')
@section('content')




<!-- ================================
       START ERROR AREA
================================= -->
<section class="error-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 mx-auto">
                <div class="error-content ">

                    <h3 class="error__title text-center">ทำรายการสำเร็จ</h3>
                    <p class="error__text text-center">
                        คุณได้ทำการสั่งซื้อ Package รายเดือน ให้ทำการโอนเงินชำระตามยอดที่กำหนด แล้วใช้หมายเลข Order ID ในการแจ้งการชำระเงินได้ที่ <a href="{{url('payment')}}" target="_blank">ยืนยันการชำระเงิน</a>
                        กรอกข้อมูลให้ครบ หลังจากนั้นรอเจ้าหน้าที่เข้ามาตรวจสอบและยืนยัน เวลาถึงจะเข้าระบบ
                    </p>

                    <ul class="theme-payment-success-summary">
                      <li>Payment ID
                        <span>#{{$objs->Oid}}</span>
                      </li>
                      <li>Package
                        <span>{{$objs->package_name}}</span>
                      </li>
                      <li>วันที่ทำรายการ
                        <span>{{DateThai($objs->created_ats)}}</span>
                      </li>
                      <li>ชื่อผู้สั่งซื้อ
                        <span>{{$objs->name}}</span>
                      </li>
                      <li>Email
                        <span>{{$objs->email}}</span>
                      </li>
                      <li>การชำระเงิน
                        <span>แบบโอนผ่านบัญชีธนาคาร</span>
                      </li>

                      <li>ยอดที่ต้องชำระ
                        <span>{{$objs->package_price}} บาท</span>
                      </li>
                    </ul>

                    <div class="text-center">
                      <a href="{{url('/payment')}}" class="theme-btn">ยืนยันการชำระเงิน</a>
                    </div>

                </div><!-- end error-content -->
            </div><!-- end col-lg-7 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end error-area -->
<!-- ================================
       START ERROR AREA
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
