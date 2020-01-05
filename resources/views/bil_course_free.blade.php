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
                    <h3>ทำรายการสำเร็จ สามารถเริ่มเรียนได้ทันที</h3>
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
                        <td class="text-right">
                          @if($objs->price_course-$objs->discount_price <= 0)
                          0
                          @else
                          {{$objs->price_course-$objs->discount_price}}
                          @endif


                        </td>
                      </tr>


                    </tbody>
                  </table>
                </div>


                <div class="text-center">
                    <p>
                      คอร์สเรียนของนักเรียนพร้อมแล้ว สามารถเริ่มเรียนได้ทันที
                      <br /><br />
                    </p>
                    <a class="btn btn-primary border-none btn-block" href="{{url('my_pack/')}}"> เร่มเรียนกันได้เลย</a>
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
