@extends('layouts.template')
@section('stylesheet')

<style>
.breadcrumb-area {
    background-image: url('{{url('assets/home/1920_450.png')}}');
}
</style>

@stop('stylesheet')
@section('content')








<!-- ================================
       START FAQ AREA
================================= -->
<section class="faq-area">
    <div class="container">
        <div class="row">

            <div class="col-lg-6 mx-auto">


            <div class="sidebar">


              <div class="sidebar-widget sidebar-feature">


                <div class="section-heading text-center">
                    <h3>คุณทำรายการสั่งซื้อสำเร็จ</h3>
                </div>
                <br /><br />

                <div class="table-responsive">
                  <table class="table">

                    <tbody>
                      <tr>
                        <td>หมายเลขสั่งซื้อ</td>
                        <td class="text-right">{{$objs->order_id}}</td>
                      </tr>
                      <tr>
                        <td>วันที่สั่งซื้อ</td>
                        <td class="text-right">{{DateThai($objs->created_ats)}}</td>
                      </tr>
                      <tr>
                        <td>ชื่อนักเรียน</td>
                        <td class="text-right">{{$objs->name}}</td>
                      </tr>
                      <tr>
                        <td>คอร์สเรียน</td>
                        <td class="text-right">{{$objs->title_course}}</td>
                      </tr>
                      <tr>
                        <td>ราคา</td>
                        <td class="text-right">{{$objs->price_course}}</td>
                      </tr>
                      <tr>
                        <td>ส่วนลด</td>
                        <td class="text-right">{{$objs->discount_price}}</td>
                      </tr>
                      <tr>
                        <th >ยอดรวมที่ต้องจ่าย</th >
                        <td class="text-right">{{$objs->price_course-$objs->discount_price}}</td>
                      </tr>


                    </tbody>
                  </table>
                </div>


                <div class="text-center">
                    <p>
                      หากท่านได้ทำการชำระเงินเรียบร้อยแล้ว สามารถนำหลักฐานการชำระเงิน กับหมายเลยสั่งซื้อ มาที่ ปุ่ม แจ้งชำระเงินที่อยู่ด้านล่างนี้ได้เลย
                      <br /><br />
                    </p>
                    <a class="btn btn-primary border-none btn-block" href="{{url('payment/'.$objs->order_id)}}"> แจ้งชำระเงินโอน</a>
                </div>
              </div>

              </div>





                </div><!-- end faq-body -->
            </div><!-- end col-lg-8-->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end faq-area -->
<!-- ================================
       START FAQ AREA
================================= -->



@endsection

@section('scripts')



@stop('scripts')
