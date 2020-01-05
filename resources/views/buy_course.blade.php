@extends('layouts.template')
@section('stylesheet')



@stop('stylesheet')
@section('content')



<hr />



<section class="team-detail-area" style="padding-top: 20px;">
    <div class="container">

      <div class="row justify-content-md-center">
        <div class="col-lg-10">
        <div class="row">
            <div class="col-lg-4">
                <div class="team-single-img">
                    <img src="{{url('assets/uploads/'.$objs->image_course)}}" alt="{{$objs->title_course}}" class="team__img img-thumbnail">
                </div><!-- end team-single-img -->
            </div><!-- end col-lg-4 -->




            <div class="col-lg-8">
                <div class="team-single-content">

                  <h3 class="instructor-all-course__title">{{$objs->title_course}}</h3>
                  <hr />
                  <h3 class="instructor-all-course__title" style="font-size: 1.25rem; margin-bottom:15px;">เงื่อนไขและข้อตกลง Package </h3>

                  <p style="font-size:13px; color: #999;">
                    {!! $objs->detail_course !!}
                  </p>
                  <br />


                         <div class="form-group course-overall-wrapper">
                            <label class="control-label">ข้อมูล Package</label>
                            <table class="table " style="margin-bottom: 0rem;">
                              <tbody style="font-size:13px;">


                                <tr>
                                  <td><label class="control-label text-danger" style="font-size:18px;">ราคา {{$objs->price_course}} บาท</label></td>
                                </tr>
                                <tr>
                                  <td><label class="control-label text-danger" style="font-size:18px;">อายุการใช้งาน {{$objs->time_course_text}} </label></td>
                                </tr>




                            </tbody>
                          </table>
                         </div>

                         <div>

                           <div class="writeinfo text-success" style=" font-size: 16px;"></div>
                           <div class="writeinfo_error text-danger" style=" font-size: 16px;"></div>

                             <div class="row">
                             <input type="hidden" name="course" class="course_ids" value="{{$objs->id}}" placeholder="">
                             <input type="hidden" name="order_id" class="order_id" value="{{$order_id}}" placeholder="">

                           <div class="form-group col-md-8">
                             <label class=" control-label" for="profileFirstName">ใช้คูปองส่วนลด</label>

                               <input type="text"  class="coupon form-control" placeholder="ใส่ รหัส Coupon" name="coupon">


                           </div>

                           <div class="form-group col-md-4">

                             <button type="submit" style="margin-top: 30px;" class="postbutton btn btn-primary border-none">  เช็คคูปองส่วนลด </button>
                             </div>

                           </div>

                         </div>
                         <hr />

                         <style>

                         .form_title {
    position: relative;
    padding-left: 55px;
    margin-bottom: 10px;
}
.single_tour_desc h3 {
    font-size: 18px;
    margin-top: 5px;
}
.form_title h3 {
    margin: 0;
    padding: 0;

    font-size: 18px;
}
.table td, .table th {
    padding: .55rem;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
}
.form_title h3 strong {
    background-color: #ffd430;
    text-align: center;
    width: 40px;
    height: 40px;
    display: inline-block;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    color: #fff;
    font-size: 18px;
    line-height: 40px;
    text-align: center;
    position: absolute;
    left: 0;
    top: 0;
}
.step {
    border-left: 1px solid #ddd;
    padding: 20px 0 20px 31px;
    margin: 0 0 10px 20px;
}
.btn-sss{
  display: none;
}
.hidden{
  display: none;
}

                         </style>


                         <div class="form-group course-overall-wrapper">

                           <h3 class="single_tour_desc ">เลือกวิธีการชำระเงิน</h3>
                           <br />




                            <div class="form_title " id="hid_free">
                               <h3 class="single_tour_desc "><strong>1</strong>ชำระผ่าน QR CODE</h3>
                               <p style="font-size:13px; color: #999;">
                                ทุกธุรกรรมผ่านบัตรเครดิตและบัตรเดบิตได้รับการรับรองความปลอดภัย ด้วยเทคโนโลยี <b style="color: #2196F3;">GB Prime ระบบชำระเงินออนไลน์</b><br />
                                หลังจากชำระเงินเสร้จเรียบร้อยแล้ว ท่านสามารถแจ้ง <a href="" target="_blank">ยืนยันการชำระเงิน</a>
                               </p>
                             </div>



                             <div class="step" id="hid_free2">

                                 <img src="{{url('assets/image/gb_payment2.png')}}" class="team__img img-thumbnail">


                               <br /><br />





                               <form action="{{url('submit_buy_course_2')}}" method="post" target="_blank" name="product_z">
                                 {{ csrf_field() }}
                                 <input class="form-control border-form-control" value="{{$order_id}}" name="order_id" type="hidden">
                                 <input class="form-control border-form-control" value="{{$objs->id}}" name="course_id" type="hidden">
                                   <input type="hidden" id="gb_pay5" value="{{$objs->price_course}}" name="master_price" >
                                 <div class="form-group col-md-8">
                                   <label class=" control-label" for="profileFirstName">ราคาคอร์ส</label>
                                     <input type="text" id="gb_pay2" class="gb_pay1 form-control" value="{{$objs->price_course}}" >
                                 </div>


                                 <div class="form-group">
                                   <div class="col-md-6">
                                 <button type="submit" id="btn-show" class=" btn btn-primary border-none">  ชำระผ่าน QR CODE </button>
                                 </div>



                                 </div>
                               </form>



                               <div id="myDIV" class="col-md-12 btn-sss " >
                                 <br />

                                   <p>เราได้สร้าง QR CODE เพื่อชำระเงินแล้ว ที่สามารถ Svae รุปเก็บไว้ชำระภายหลังได้ แล้วท่านสามารถเข้ามาแจ้งชำระเงินได้ที่ปุ่มด้านล่างนี้</p>
                                   <br />

                                 <a href="{{url('payment/'.$order_id)}}"  class="btn btn-primary">  แจ้งการชำระเงิน </a>
                             </div>



                               <br />




                             </div>



                             <div class="form_title">
                                <h3 class="single_tour_desc "><strong>2</strong>โอนเงินผ่านธนาคาร</h3>
                                <p style="font-size:13px; color: #999;">
                                  สามารถชำระเงินได้โดยผ่านทางธนาคาร จากนั้นกรุณาแจ้งการชำระเงินผ่านทาง <a href="{{url('payment')}}" target="_blank">ยืนยันการชำระเงิน</a>
                                </p>
                              </div>

                              <div class="step">









                                <form action="{{url('submit_buy_course')}}" method="post" enctype="multipart/form-data" name="product1">
                                  {{ csrf_field() }}
                                  <input class="form-control border-form-control" value="{{$order_id}}" name="order_id" type="hidden">
                                  <input class="form-control border-form-control" value="{{$objs->id}}" name="course_id" type="hidden">
                                    <input type="hidden" id="gb_pay4" value="{{$objs->price_course}}" name="master_price" >
                                  <div class="form-group col-md-8">
                                    <label class=" control-label" for="profileFirstName">ราคาคอร์ส</label>
                                      <input type="text" id="gb_pay1" class="gb_pay1 form-control" name="value_money" value="{{$objs->price_course}}" >
                                  </div>


                                  <div class="form-group">
                                    <div class="col-md-8">
                                  <button type="submit" class="btn btn-primary border-none">  เลือกชำระโอนเงินผ่านธนาคาร </button>
                                  </div>
                                  </div>
                                </form>

                              </div>


                              <!--
                              <div class="form_title">
                                 <h3 class="single_tour_desc "><strong>3</strong>ผ่านบัตรเครดิตและบัตรเดบิต GB Prime</h3>
                                 <p style="font-size:13px; color: #999;">
                                  ทุกธุรกรรมผ่านบัตรเครดิตและบัตรเดบิตได้รับการรับรองความปลอดภัย ด้วยเทคโนโลยี <b style="color: #2196F3;">GB Prime ระบบชำระเงินออนไลน์</b>
                                 </p>
                               </div>


                               <div class="step">
                                 <form id="checkout-form" action="{{url('post_gb_pay')}}" method="POST">
                                   <div id="gb-form" style="height: 600px;"></div>
                                 </form>
                                </div>
                              -->

                         </div>
                         <hr />




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



$(document).ready(function(){


  $('#btn-show').click(function(){

      $("#myDIV").removeClass("btn-sss");


        //Some code btn-sss
   });



            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            var total_money = 0;

            $(".postbutton").click(function(){
                $.ajax({
                    /* the route pointing to the post function */
                    url: '{{url('post_coupon')}}',
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {_token: CSRF_TOKEN, coupon:$(".coupon").val(), max_price:$(".course_ids").val(), order_id:$(".order_id").val()},
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) {



                        if(data.status == 'success'){
                          $(".writeinfo").append(data.msg);
                          $(".writeinfo3").empty()
                          $(".writeinfo2").append('คุณได้รับส่วนลดจำนวน '+data.coupon);



                          total_money = {{$objs->price_course}}-data.coupon;

                          if(total_money < 0){
                            total_money = 0;
                            $('#hid_free').addClass('hidden');
                            $('#hid_free2').addClass('hidden');
                          }

                          document.getElementById("gb_pay1").value = total_money;
                          document.getElementById("gb_pay2").value = total_money
                          document.getElementById("gb_pay4").value = total_money
                          document.getElementById("gb_pay5").value = total_money

                        }else{
                          $(".writeinfo_error").append(data.msg);
                        }

                        setTimeout(function() {
                             $(".writeinfo").empty()
                             $(".writeinfo_error").empty()
                        }, 3000);
                    }
                });
            });
       });
</script>


<script src="{{url('home/js/GBPrimePay.js')}}"></script>
<script>
new GBPrimePay({
publicKey: '5RjrJwedCYzx1cvSPxuT8HhTz1co2O34',
gbForm: '#gb-form',
merchantForm: '#checkout-form',
amount: 1.00,
enableRememberCard: true,
customStyle: {
backgroundColor: 'transparent'
},
env: 'prd' // default prd | optional: test, prd
});
</script>








@stop('scripts')
