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
                    <img src="{{url('assets/image/package/'.$objs->package_image)}}" alt="{{$objs->package_name}}" class="team__img img-thumbnail">
                </div><!-- end team-single-img -->
            </div><!-- end col-lg-4 -->
            <div class="col-lg-8">
                <div class="team-single-content">

                  <h3 class="instructor-all-course__title text-success">ทำการสมัครทดลองเรียนฟรี สำเร็จ</h3>
                  <hr />
                  <h3 class="instructor-all-course__title" style="font-size: 1.25rem; margin-bottom:15px;">เงื่อนไขและข้อตกลง Package แบบทดลองเรียนฟรี</h3>

                  <p>
                    Package ฟรีที่นักเรียนได้ทำการสมัครไปนั้น จะสามารถดู Video ได้เป็นบางส่วนที่ทาง learnsbuy ได้ตั้งค่าไว้แล้วเท่านั้น ในระหว่างการใช้ Package ฟรี
                    นักเรียนสมารถ เข้าไปคลังข้อสอบและสามารถทำข้อสอบได้ปกติ แต่ถ้าหากนักเรียนต้องการสมัคร Package รายเดือน นักเรียนสามารถสมัครได้ทันที โดยไม่ต้องรอให้หมดอายุก่อน
                  </p>
                  <br />


                  <div class="form-group course-overall-wrapper">
                     <label class="control-label">ข้อมูล Package</label>
                     <table class="table ">
                       <tbody>
                       <tr>
                         </tr><tr>
                           <td><label class="control-label">ทดลองเรียนฟรี {{$objs->package_day}} วัน</label></td>
                         </tr>
                         <tr>
                           <td><label class="control-label">อายุการใช้งาน {{$objs->package_day}} / วัน</label></td>
                         </tr>
                         <tr>
                           <td><label class="control-label">สมัครประเภท ทดลองเรียนฟรี</label></td>
                         </tr>
                         <tr>
                                  <td><label class="control-label">เริ่มใช้งานได้ : <span class="text-success">{{DateThai($check->start)}}</span></label></td>
                                </tr>

                                <tr>
                                  <td><label class="control-label">สิ้นสุดวันที่ : <span class="text-danger">{{DateThai($check->end_date)}}</span> </label></td>
                                </tr>


                     </tbody>
                   </table>
                  </div>


                </div><!-- end team-single-content -->
            </div><!-- end col-lg-8 -->

            <div class="col-sm-12 text-right">

                            <a href="{{url('/')}}" class="btn btn-success border-none">  กลับไปยังหน้าหลัก </a>
                         </div>
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
