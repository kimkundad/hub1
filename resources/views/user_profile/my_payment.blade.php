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
                    <img class="avatar__img" style="border: 1px solid #007791; margin-right: 10px;" src="{{$objs->avatar}}" alt="{{Auth::user()->name}}" title="{{$objs->name}}"/>
                    @endif
                    <h6>{{Auth::user()->name}}</h6>
                  </div>




                            <span class="section__divider"></span>



      <div class="ap-user-navigation ">
        <ul id="ap-user-menu" class="ap-user-menu ap_collapse_menu clearfix">
          <li><a href="{{url('profile')}}" class="ap-user-menu-orders apicon-shopping-cart"><i class=" fa fa-street-view"></i> ส่วนตัวของฉัน</a></li>


          <li><a href="{{url('my_course')}}" class="ap-user-menu-orders apicon-shopping-cart"><i class="fa fa-graduation-cap"></i> คอร์สเรียน</a></li>
          <li><a href="{{url('my_example')}}" class="ap-user-menu-orders apicon-shopping-cart"><i class=" fa fa-bar-chart"></i> สถิติแบบฝึกหัด</a></li>
          <li><a href="{{url('my_pack')}}" class="ap-user-menu-orders apicon-shopping-cart"><i class=" fa fa-cube"></i> Package ปัจจุบัน</a></li>
          <li><a href="{{url('my_friends')}}" class="ap-user-menu-orders apicon-shopping-cart"><i class="fa fa-users"></i> แนะนำเพื่อน</a></li>
          <li><a href="{{url('my_payment')}}" class="ap-user-menu-orders apicon-shopping-cart"><i class="ap-questions-featured fa fa-shopping-cart"></i> ประวัติการเติมเงิน </a></li>

          <li><a href="{{url('logout')}}" class="ap-user-menu-activity-feed apicon-rss"><i class="fa fa-sign-out"></i> ออกจากระบบ</a></li>
        </ul>
    </div>



                        </div>

              </div><br />



            </div><!-- end col-lg-4 -->


<style>
.blog-post-img{
  border: 1px solid rgba(127, 136, 151, 0.2);
  padding: 7px;
}
.te{
  font-size: 12px;
  font-weight: 600;
}
</style>


            <div class="col-lg-9">
                <div class="team-single-content">



                  <h3 class="instructor-all-course__title " style="font-size: 1.25rem; margin-bottom:15px;"> ประวัติการเติมเงิน</h3>



                  <div class="table-responsive">
                  <table class="table ">
               <tbody>
                 <tr>
                   <td><div class="osahan-title">วันที่</div></td>
                   <td><div class="osahan-title">Package</div></td>
                   <td><div class="osahan-title">ราคา</div></td>
                   <td><div class="osahan-title">เริ่มใช้</div></td>
                   <td><div class="osahan-title">สิ้นสุด</div></td>
                 </tr>

                 @if(isset($pack))
                   @foreach($pack as $u)
                 <tr>
                   <td>{{DateThai($u->Dcre)}}</td>
                   <td>{{$u->package_name}}</td>
                   <td>

                     @if($u->package_price < 10)
                     ทดลองใช้ฟรี {{$u->package_day}} วัน
                     @else
                     {{$u->package_price}}
                     @endif

                   </td>
                   <td>
                     @if($u->start != '0000-00-00')
                     {{DateThai($u->start)}}
                     @else
                     @endif
                   </td>
                   <td>
                     @if($u->end_date != '0000-00-00')
                     {{DateThai($u->end_date)}}
                     @else
                     @endif

                   </td>
                 </tr>
                   @endforeach
                 @endif


               </tbody>
             </table>

             </div>


                  <hr>

                  <div class="col-sm-12 text-center">



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



<script type="text/javascript">


    $('.del_wishlist').click(function(e){
          e.preventDefault();
        //  var username = $('form#cutproduct input[name=id]').val();


        var $form = $(this).closest("form#cutproduct");
        var formData =  $form.serializeArray();
        var userId =  $form.find(".user_id").val();

        var del_obj = 'wish_'+userId;

        console.log(del_obj);

          if(userId){
            $.ajax({
              type: "POST",
              url: "{{url('del_wishlist')}}",
              headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
              data: "id="+userId,
              dataType: "json",
           success: function(json){
               if(json.status == 1001) {

                 swal("ลบสำเร็จ!", "คุณทำการลบรายการที่ชื่นชอบ", "success");


                 document.getElementById(del_obj).remove();


                } else {


                  swal("คอร์ส นี้อยู่ในรายการชื่นชอบอยุ่แล้ว");

                }
              },
              failure: function(errMsg) {
                alert(errMsg.Msg);
              }
            });
          }else{




          }
        });






</script>

@stop('scripts')
