@extends('layouts.template')
@section('stylesheet')



@stop('stylesheet')
@section('content')




<!-- ================================
    START BREADCRUMB AREA
================================= -->
<section class="breadcrumb-area" style="background-image: url({{url('assets/images/breadcrumb-bg.jpg')}});">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-content">

                    <h2 class="breadcrumb__title">เลือก Pagkage</h2>
                  <div class="text-outline">Pagkage</div>
                </div><!-- end breadcrumb-content -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end breadcrumb-area -->
<!-- ================================
    END BREADCRUMB AREA
================================= -->




<section class="package-area">
    <div class="container">
        <div class="row package-content-wrap">

          @if(isset($objs))
            @foreach($objs as $u)
            <div class="col-lg-4">
                <div class="package-item

                @if($u->id == 1)
                package-item2
                @else
                 package-item1
                 @endif
                 ">
                    @if($u->id == 1)
                    <div class="package-tooltip">
                        <span class="package__tooltip">package แนะนำ</span>
                    </div>
                    @endif
                    <div class="package-title">
                        <h3 class="package__price"><span>฿</span>{{$u->package_price}}</h3>
                        <h3 class="package__title">{{$u->package_name}}</h3>
                    </div><!-- end package-title -->
                    <ul class="package-list">
                        <li><span class="la la-check"></span> ดูได้ทุก Courses</li>
                        <li><span class="la la-check"></span> การสนับสนุนผู้ใช้ที่ไม่จำกัด</li>
                        <li><span class="la la-check"></span> ข่าวสารการอัพเดทเนื้อหา</li>
                        <li><span class="la la-check"></span> เอกสารการเรียนรู้</li>
                        <li><span class="la la-check"></span> เข้าถึงฟรีตลอดอายุการใช้งาน</li>
                        <li><span class="la la-check"></span> ข้อเสนอระยะเวลาที่ จำกัด</li>
                        <li><span class="la la-check"></span> เพิ่มเนื้อหาทุกอาทิตย์</li>
                        <li><span class="la la-check"></span> {{$u->package_day}} วัน</li>
                    </ul>
                    <div class="package-price">
                      @if (Auth::guest())
                        <a href="#" class="photo_f theme-btn">เลือก package นี้</a>
                      @else
                        <a href="{{url('submit_info_package/'.$u->id)}}" class="theme-btn">เลือก package นี้</a>
                      @endif
                    </div>
                </div><!-- end package-item -->
            </div><!-- end col-lg-4 -->
              @endforeach
            @endif


        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end package-area -->
<!--======================================
        END PACKAGE AREA
======================================-->



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
