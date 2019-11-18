@extends('layouts.template')
@section('stylesheet')
<link rel="stylesheet" type="text/css" href="{{url('assets/datetimepicker-master/jquery.datetimepicker.css')}}"/>
<style>
ul {
    padding: 0;
    margin: 0;
    list-style-type: none;
}
@media (min-width: 1200px){
#kimkundad  .ap-user-navigation {

      width: 200px;
  }
#kimkundad  #ap-user-menu {

    list-style: outside none none;
    margin: 0 0 20px;
    padding: 0 15px 0 0;
}
#kimkundad ul {
    line-height: 1.4;
}
}


#kimkundad #ap-user-menu>li {
    border-bottom: 1px solid #eee;
    margin: 0;
    padding: 0;
}

#kimkundad #ap-user-menu>li>a {
    color: #555;
    display: block;
    font-size: 13px;
    font-weight: 600;
    padding: 15px 15px;
}
#kimkundad a {
    text-decoration: none;
    color: #2488B7;
}

#kimkundad #ap-user-menu>li>a i {
    background: none;
    border-right: 1px solid #eee;
    display: block;
    float: left;
    font-size: 17px;
    height: 49px;
    line-height: 51px;
    margin-left: -15px;
    margin-right: 10px;
    margin-top: -16px;
    text-align: center;
    width: 49px;
}
#kimkundad .ap-questions-featured {
    margin-left: -10px;
    border: medium none;
    color: #ff951e;
    display: inline;
    font-size: 16px;
    height: auto;
    margin-right: 5px;
    padding: 0;
    position: static;
    vertical-align: baseline;
    width: auto;
}
.avatar__img {
    width: 45px;
    height: 45px;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    margin-right: 20px;
    float: left;
}
</style>

@stop('stylesheet')
@section('content')



<hr />



<section class="team-detail-area" style="padding-top: 20px;">
    <div class="container">

      <div class="row justify-content-md-center">
        <div class="col-lg-10">
        <div class="row">
            <div class="col-lg-3">

              <div class="sidebar" id="kimkundad">

                <div class="sidebar-widget sidebar-feature" style="padding: 15px;">
                  <div style="margin-bottom:10px;">
                    @if(Auth::user()->provider == 'email')
                    <img class="avatar__img" style="border: 1px solid #007791; margin-right: 10px;" src="{{url('assets/images/avatar/'.Auth::user()->avatar)}}" alt="{{Auth::user()->anme}}" title="{{Auth::user()->name}}"/>
                    @else
                    <img class="avatar__img" style="border: 1px solid #007791; margin-right: 10px;" src="{{$objs->avatar}}" alt="{{Auth::user()->name}}" title="{{$objs->name}}"/>
                    @endif
                    <h6>{{Auth::user()->name}}</h6>
                  </div>




                            <span class="section__divider"></span>



      <div class="ap-user-navigation ">
      <ul id="ap-user-menu" class="ap-user-menu ap_collapse_menu clearfix">
        <li><a href="{{url('profile')}}" class="ap-user-menu-orders apicon-shopping-cart"><i class="ap-questions-featured fa fa-street-view"></i> ส่วนตัวของฉัน</a></li>


        <li><a href="{{url('my_course')}}" class="ap-user-menu-orders apicon-shopping-cart"><i class="fa fa-graduation-cap"></i> คอร์สเรียน</a></li>
        <li><a href="{{url('my_example')}}" class="ap-user-menu-orders apicon-shopping-cart"><i class=" fa fa-bar-chart"></i> สถิติแบบฝึกหัด</a></li>
        <li><a href="{{url('my_pack')}}" class="ap-user-menu-orders apicon-shopping-cart"><i class=" fa fa-cube"></i> Package ปัจจุบัน</a></li>
        <li><a href="{{url('my_friends')}}" class="ap-user-menu-orders apicon-shopping-cart"><i class="fa fa-users"></i> แนะนำเพื่อน</a></li>
        <li><a href="{{url('my_payment')}}" class="ap-user-menu-orders apicon-shopping-cart"><i class="fa fa-shopping-cart"></i> ประวัติการเติมเงิน</a></li>

          <li><a href="{{url('logout')}}" class="ap-user-menu-activity-feed apicon-rss"><i class="fa fa-sign-out"></i> ออกจากระบบ</a></li>
      </ul></div>



                        </div>

              </div><br />



            </div><!-- end col-lg-4 -->





            <div class="col-lg-9">
                <div class="team-single-content">



                  <h3 class="instructor-all-course__title " style="font-size: 1.25rem; margin-bottom:15px;">ข้อมูลส่วนตัว</h3>
                  <hr />



                  <div class="alert alert-success" style="font-size:14px;">
                  <strong>กรอกข้อมูลให้ครบด้วยนะนักเรียน </strong> เพื่อผลประโยชน์ของนักเรียน ทางครูพี่โฮมจะมีการส่งของน่ารักๆหรือเอกสารไปให้นักเรียน
                </div>



                <form action="{{url('profile_user/'.Auth::user()->id)}}" method="post" enctype="multipart/form-data" name="product">
                {{ csrf_field() }}
                {{ method_field($method) }}
              <input type="hidden" class="form-control" name="id" value="{{Auth::user()->id}}" required="">

                <div class="form-group">

                  <label for="exampleInputPassword1">ชื่อของคุณ</label>
                  <input type="text" class="form-control" name="nickname" value="{{$objs->name}}" required="">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">อีเมล์</label>
                  <input type="email" class="form-control" name="email" value="{{$objs->email}}" readonly="">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">เบอร์โทร</label>
                  <input type="text" class="form-control" name="phone" value="{{$objs->phone}}" required="">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">ID Line</label>
                  <input type="text" class="form-control" name="line_id" value="{{$objs->line_id}}" required="">
                </div>

                @if($objs->provider == 'email')
                <div class="form-group">
                  <label for="exampleInputEmail1">รูปประจำตัว</label>
                  <input class="form-control" type="file" name="image" >
                </div>
                @endif

                <div class="form-group">
                  <label for="exampleInputPassword1">วันเกิดของฉัน **คศ คริสตศักราช</label>

                  <div class="input-group">

                    @if($objs->hbd == null)

                    <input type="text" data-plugin-datepicker name="hbd" id="filter-date" class="form-control datepicker" required="">
                    @else
                    <input type="text" data-plugin-datepicker name="hbd" id="filter-date" class="form-control datepicker" value="{{$objs->hbd}}" required="">
                    @endif
                  </div>
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">ที่อยู่ รับเอกสาร ของขวัญ</label>
                  <textarea class="form-control" rows="4" name="address" placeholder="Textarea" required="">{{$objs->address}}</textarea>
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">เกี่ยวกับนักเรียน</label>
                  <textarea class="form-control" rows="4" name="bio" placeholder="Textarea">{{$objs->bio}}</textarea>
                </div>



                      <div class="clearfix"></div>
               <hr>
               <div class="col-sm-12 text-center">
                <button type="submit" class="theme-btn">อัพเดทข้อมูล</button>
                </div>
              </form>







                </div><!-- end team-single-content -->
            </div><!-- end col-lg-8 -->















        </div><!-- end row -->

      </div><!-- end col-lg-10 -->
          </div><!-- end row -->










    </div><!-- end container -->
</section>





@endsection

@section('scripts')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
$('.photo_f').on('click', function () {

swal("นักเรียนต้องทำการ Login เข้าสู่ระบบก่อนซื้อ Pagkage")
.then((value) => {
  if(value == true){
    window.location.href = "{{url('login')}}";
  }
});

});
</script>

<script src="{{url('assets/datetimepicker-master/build/jquery.datetimepicker.full.js')}}"></script>
<script type="text/javascript">

    jQuery(document).ready(function () {
        'use strict';

        jQuery('#filter-date, #search-from-date, #search-to-date').datetimepicker({
          timepicker:false,
 format:'Y-m-d'
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
