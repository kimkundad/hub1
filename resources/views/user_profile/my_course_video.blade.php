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


          <li><a href="{{url('my_course')}}" class="ap-user-menu-orders apicon-shopping-cart"><i class="fa fa-graduation-cap"></i> คอร์สเรียน ที่ชอบ</a></li>
          <li><a href="{{url('my_example')}}" class="ap-user-menu-orders apicon-shopping-cart"><i class=" fa fa-bar-chart"></i> สถิติแบบฝึกหัด</a></li>
          <li><a href="{{url('my_pack')}}" class="ap-user-menu-orders apicon-shopping-cart"><i class="ap-questions-featured fa fa-cube"></i> คอร์สเรียนของฉัน</a></li>
          <li><a href="{{url('my_friends')}}" class="ap-user-menu-orders apicon-shopping-cart"><i class="fa fa-users"></i> แนะนำเพื่อน</a></li>
          <li><a href="{{url('my_payment')}}" class="ap-user-menu-orders apicon-shopping-cart"><i class=" fa fa-shopping-cart"></i> ประวัติการสั่งซื้อ </a></li>

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
.video-card {
    background: #fff none repeat scroll 0 0;
    border-radius: 2px;
    box-shadow: 0 0 11px #ececec;
    transition-duration: 0.4s;
}
.comment__btn {
    color: #7f8897;
    position: relative;
    -webkit-transition: all 0.3s;
    -moz-transition: all 0.3s;
    -ms-transition: all 0.3s;
    -o-transition: all 0.3s;
    transition: all 0.3s;
    font-size: 16px;
    display: inline-block;
    padding: 7px 18px;
    border: 1px solid #eee;
    -webkit-border-radius: 30px;
    -moz-border-radius: 30px;
    border-radius: 30px;
    font-weight: 500;
}
</style>


            <div class="col-lg-9">
                <div class="team-single-content">



                  <h3 class="instructor-all-course__title " style="font-size: 1.25rem; margin-bottom:15px;"> คอร์สเรียนของฉัน &nbsp&nbsp<a class="comment__btn" href="#">
                                                    {{$objs->title_course}}
                                                </a> </h3>

                  <div class="row">
                    <div class="col-md-12">



                      @if(isset($filecourses))

                      <div class="table-scrollable table-scrollable-borderless">
                                           <table class="table table-hover table-light">
                                            <thead class="uppercase">
                                                <tr>
                                                    <th>เอกสาร Download</th>
                                                    <th></th>
                                                </tr>
                                            </thead>

                                            <tbody>

                        @foreach($filecourses as $u)

                              <tr>
                                <td>
                                  <a href="{{url('download_file_course/'.$u->id)}}"> {{$u->file_of_name}}</a>
                                </td>
                                <td class="text-right"><a href="#" >
                                <a href="{{url('download_file_course/'.$u->id)}}">  <i class="fa fa-download"></i> ดาวน์โหลด</a>
                                </td>
                              </tr>

                        @endforeach

                        </tbody>
                      </table>
                    </div>
                      @endif



                    @if(isset($get_video))



                      <div class="table-scrollable table-scrollable-borderless">
                                           <table class="table table-hover table-light">
                                            <thead class="uppercase">
                                                <tr>
                                                    <th>รายชื่อของ Video</th>
                                                    <th></th>
                                                </tr>
                                            </thead>

                                            <tbody>

                                              @foreach($get_video as $u)
                                              <tr>
                                                <td><a href="#" data-toggle="modal" data-target="#exampleModalCenter-{{$u->id}}"><i class="fa fa-video-camera "></i> {{$u->course_video_name}}</a>  </td>

                                                <div class="modal fade bd-example-modal-lg" id="exampleModalCenter-{{$u->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLongTitle">{{$u->course_video_name}}</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true" class="la la-close"></span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <video controls crossorigin playsinline poster="{{url('assets/uploads/'.$u->thumbnail_img)}}" id="player">
                                                                        <!-- Video files -->
                                                                        <source src="{{url('assets/videos/'.$u->course_video)}}" type="video/mp4" size="576"/>
                                                                        <source src="{{url('assets/videos/'.$u->course_video)}}" type="video/mp4" size="720"/>
                                                                        <source src="{{url('assets/videos/'.$u->course_video)}}" type="video/mp4" size="1080"/>

                                                                    </video>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!-- end modal -->


                                                <td class="text-right"><a href="#" data-toggle="modal" data-target="#exampleModalCenter-{{$u->id}}">
                                                  <i class="fa fa-play-circle-o" style="font-size:18px; color:red"></i> {{$u->time_video}} / นาที</a>
                                                </td>

                                              </tr>


                                              @endforeach


                                            </tbody>
                                            </table>
                                          </div>





                    @endif

                    </div>
                    </div>



                  <br />




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
