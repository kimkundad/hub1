@extends('layouts.template')
@section('stylesheet')




@stop('stylesheet')
@section('content')







<!-- ================================
       START GOOGLE MAP
================================= -->

<!-- ================================
       END GOOGLE MAP
================================= -->

<!-- ================================
       START CONTACT AREA
================================= -->
<hr />
<section class="contact-area" style="padding-top: 0px;">
    <div class="container">


        <div class="row contact-form-wrap">
            <div class="col-lg-5">
                <div class="section-heading">
                    <p class="section__meta">สถาบันออนไลน์ </p>
                    <h2 class="section__title">hubjung</h2>
                    <span class="section__divider"></span>
                    <p class="section__desc">
                        เรียนตามตารางเวลาของคุณเอง ศึกษาหัวข้อใดก็ได้ทุกเวลา<br /> เลือกจากหลักสูตรโดยผู้เชี่ยวชาญหลายพันหลักสูตร สอนในสิ่งที่คุณรัก <br /> hubjung พร้อมเป็นเครื่องมือในการสร้างหลักสูตรออนไลน์ให้กับคุณ
                    </p>
                    <ul class="section__list">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
                    </ul>
                </div><!-- end sec-heading -->
            </div><!-- end col-md-5 -->
            <div class="col-lg-7">
                <div class="contact-form-action">
                    <!--Contact Form-->

                    <form >
                        <div class="row">
                            <div class="col-lg-12 col-sm-6 form-group">
                                <input class="name form-control" type="text" name="name" placeholder="Your Name">
                                <span class="la la-user input-icon"></span>
                            </div><!-- end col-lg-6 -->

                            <div class="col-lg-6 col-sm-6 form-group">
                                <input class="phone form-control" type="text" name="phone" placeholder="Phone Number">
                                <span class="la la-phone input-icon"></span>
                            </div><!-- end col-lg-6 -->

                            <div class="col-lg-6 col-sm-6 form-group">
                              <input class="email form-control" type="email" name="email" placeholder="Email Address">
                              <span class="la la-envelope-o input-icon"></span>
                            </div><!-- end col-lg-6 -->

                            <div class="col-lg-12 col-sm-6 form-group">
                                <div class="g-recaptcha" data-sitekey="6LdQnlkUAAAAAOfsIz7o-U6JSgrSMseulLvu7lI8"></div>
                            </div><!-- end col-lg-6 -->

                            <div class="col-lg-12 col-sm-12 form-group">
                                <textarea class="message message-control form-control" name="message" placeholder="Write Message Here"></textarea>
                                <span class="la la-pencil input-icon"></span>
                            </div><!-- end col-lg-12 -->

                            <div class="col-lg-12 col-sm-12 col-xs-12">
                                <a class="postbutton theme-btn" >Send Message</a>
                            </div><!-- end col-md-12 -->
                        </div><!-- end row -->
                    </form>


                </div><!-- end contact-form-action -->
            </div><!-- end col-md-7 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end contact-area -->
<!-- ================================
       START CONTACT AREA
================================= -->
<hr />

@endsection

@section('scripts')
<script src="{{url('home/js/gmap-script.js')}}"></script>
<script src="https://maps.google.com/maps/api/js?v=quarterly&language=en&key=AIzaSyDvwYEsIXbjzlpUz05eDPFqDVdOr6mZwV8&libraries=geometry%2Cplaces%2Cvisualization&"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script src='https://www.google.com/recaptcha/api.js?hl=th'></script>

<script>

$(".postbutton").click(function(){

    var name_user = $(".name").val()
    var phone = $(".phone").val()
    var email = $(".email").val()
    var message = $(".message").val()
    var g_response = grecaptcha.getResponse();

    //console.log(response);

    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    if(name_user == "" || phone == "" || email == "" || message == "" || g_response == ""){

      swal("กรอกชื่อ อีเมล เบอร์ติดต่อ และข้อความให้ครบด้วยค่ะ");

    }else{


      $.ajax({
          /* the route pointing to the post function */
          url: '{{url('post_contact')}}',
          type: 'POST',
          /* send the csrf-token and the input to the controller */
          data: {_token: CSRF_TOKEN, name_user:name_user, phone:phone, email:email, message:message, g_response:g_response},
          dataType: 'JSON',
          /* remind that 'data' is the response of the AjaxController */
          success: function (data) {
              $(".writeinfo").append(data.msg);

              if(data.status == 'success'){

                swal("เพิ่มสำเร็จ!", "คุณได้ส่งข้อความไปยังระบบเรียบร้อยแล้ว", "success");

                setTimeout(function() {
                     $(".name").val('');
                     $(".phone").val('');
                     $(".email").val('');
                     $(".message").val('');
                }, 3000);

            //    document.getElementById("gb_pay3").value = total_money+'.00'
          }else{
            swal("กรอก recaptcha ให้ครบด้วยค่ะ");
          }


          }
      });




    }




});

</script>


@stop('scripts')
