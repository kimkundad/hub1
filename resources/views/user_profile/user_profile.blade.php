@extends('layouts.template')
@section('stylesheet')

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
                    <img class="avatar__img" style="border: 1px solid #007791; margin-right: 10px;" src="{{Auth::user()->avatar}}" alt="{{Auth::user()->name}}" title="{{Auth::user()->name}}"/>
                    @endif
                    <h6>{{Auth::user()->name}}</h6>
                  </div>




                            <span class="section__divider"></span>



      <div class="ap-user-navigation ">
      <ul id="ap-user-menu" class="ap-user-menu ap_collapse_menu clearfix">
        <li><a href="{{url('profile')}}" class="ap-user-menu-orders apicon-shopping-cart"><i class="ap-questions-featured fa fa-street-view"></i> ส่วนตัวของฉัน</a></li>


        <li><a href="{{url('my_course')}}" class="ap-user-menu-orders apicon-shopping-cart"><i class="fa fa-graduation-cap"></i> คอร์สเรียน ที่ชอบ</a></li>
        <li><a href="{{url('my_example')}}" class="ap-user-menu-orders apicon-shopping-cart"><i class=" fa fa-bar-chart"></i> สถิติแบบฝึกหัด</a></li>
        <li><a href="{{url('my_pack')}}" class="ap-user-menu-orders apicon-shopping-cart"><i class=" fa fa-cube"></i> คอร์สเรียนของฉัน</a></li>
        <li><a href="{{url('my_friends')}}" class="ap-user-menu-orders apicon-shopping-cart"><i class="fa fa-users"></i> แนะนำเพื่อน</a></li>
        <li><a href="{{url('my_payment')}}" class="ap-user-menu-orders apicon-shopping-cart"><i class="fa fa-shopping-cart"></i> ประวัติการสั่งซื้อ</a></li>

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
                  <strong>กรอกข้อมูลให้ครบด้วยนะนักเรียน </strong> เพื่อผลประโยชน์ของนักเรียน ทางเจ้าหน้าที่จะมีการส่งของน่ารักๆหรือเอกสารไปให้นักเรียน
                </div>

                <table class="table ">
                <tbody>

                  <tr>
                    <td>ชื่อของคุณ</td><td>{{Auth::user()->name}}</td>
                  </tr>
                  <tr>
                    <td>อีเมล์</td><td>{{Auth::user()->email}}</td>
                    </tr>
                    <tr>
                    <td>เบอร์โทร</td><td>{{Auth::user()->phone}}</td>
                    </tr>
                    <tr>
                    <td>ID Line</td><td>{{Auth::user()->line_id}}</td>
                    </tr>
                    <tr>
                    <td>วันเกิดของฉัน</td><td>
                      @if(Auth::user()->hbd == null)
                      @else
                      {{DateThai(Auth::user()->hbd)}}
                      @endif


                    </td>
                    </tr>
                    <tr>
                    <td>ที่อยู่</td><td>{{Auth::user()->address}}</td>
                    </tr>
                    <tr>
                    <td>เกี่ยวกับนักเรียน</td><td>{{Auth::user()->bio}}</td>
                  </tr>
                </tbody>
              </table>
                  <hr>

                  <div class="col-sm-12 text-center">

                                  <a href="{{url('edit_profile')}}" class="theme-btn">แก้ไขข้อมูลส่วนตัว</a>
                               </div>



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

@stop('scripts')
