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

                  <h3 class="instructor-all-course__title">{{$objs->package_name}}</h3>
                  <hr />





                         <div class="form-group course-overall-wrapper">
                            <label class="control-label">ข้อมูล Package</label>
                            <table class="table " style="margin-bottom: 0rem;">
                              <tbody style="font-size:13px;">


                                <tr>
                                  <td><label class="control-label">ราคา Package {{$objs->package_price}} บาท</label></td>
                                </tr>
                                <tr>
                                  <td><label class="control-label">อายุการใช้งาน {{$objs->package_day}} / วัน</label></td>
                                </tr>




                            </tbody>
                          </table>
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

                         </style>


                         <div class="form-group course-overall-wrapper">

                           <h3 class="single_tour_desc ">ชำระผ่านบัตรเครดิต</h3>
                           <br />

                           <div class="step">

                             <form action="https://api.gbprimepay.com/gbp/gateway/qrcode" method="post">
                                 <div class="col-lg-12 form-group">
                                   <label>Amount: </label>
                                   <input type="text" class="form-control" name="amount" value="1.00" readonly/>
                                 </div>
                                 <div class="col-lg-12 form-group">
                                   <label>Response URL: </label>
                                   <input type="text" class="form-control" name="responseUrl" value="http://localhost/hub1/public/gb_pay/2" />
                                 </div>
                                 <div class="col-lg-12 form-group">
                                   <label>Background URL: </label>
                                   <input type="text" class="form-control" name="backgroundUrl" value="http://localhost/hub1/public/gb_pay/2" />
                                 </div>
                                 <div class="col-lg-12 form-group">
                                   <label>Detail: </label>
                                   <input type="text" class="form-control" name="detail" value="money" />
                                 </div>
                                 <div class="col-lg-12 form-group">
                                   <label>Reference No: </label>
                                   <input type="text" class="form-control" name="referenceNo" value="2017112800001" />
                                 </div>
                                 <div>
                                   <button type="submit" class="btn btn-primary border-none">  ชำระผ่านบัตรเครดิต </button>
                                 </div>
                                 <input type="hidden" name="token" value="S4aW3NQXU56Sc9pEThEhKXa3sr2kkj39t44VCrMkJ7sqZLLuWSj1EGHHmB7JTN05TvPuQQXTdVK5DVnrRZXonzhoCKM+QTxIBEN/uKLdtZsNqMW70fK8b8zUQifTqVxWLQFRtrkRYy9PAPD3t1Fihmt6LguVMS5R6cKxx25bmYMMZ0bJ" />
                                 <input type="hidden" name="payType" value="F" />
                               </form>


                           </div>


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
</script>

@stop('scripts')
