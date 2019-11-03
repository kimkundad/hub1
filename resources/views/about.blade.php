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
    START BREADCRUMB AREA
================================= -->
<section class="breadcrumb-area" style="background-image: url({{url('assets/images/breadcrumb-bg.jpg')}});">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-content">

                    <h2 class="breadcrumb__title">เกี่ยวกับเรา</h2>
                  <div class="text-outline">เกี่ยวกับเรา</div>
                </div><!-- end breadcrumb-content -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end breadcrumb-area -->
<!-- ================================
    END BREADCRUMB AREA
================================= -->

<!--======================================
        START ABOUT AREA
 ======================================-->
<section class="about-area text-center" style="padding-bottom: 40px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">

                    <h2 class="section__title">“Hub of education”</h2>
                    <span class="section__divider"></span>
                </div><!-- end section-heading -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="about-text">
                  เรา คือ ศูนย์รวมแห่งการเรียนรู้ ครบวงจร ที่พร้อมจะอัพเดตความรู้ในแวดวงการศึกษาเสมอ
                  เพราะความรู้ ไม่มีวันสิ้นสุด เราจึงตั้งใจ คัดสรรเนื้อหา สาระความรู้ที่ดีที่สุด ถ่ายทอดผ่านผู้เชี่ยวชาญในแต่ละสาขาวิชา
                  เพื่อทำให้ความรู้ถูกส่งต่อออกไป อย่างมีคุณภาพ

                </div><!-- end about-text -->

                <div class="about-text">
                  Hubjung จะคอยรวบรวมเนื้อหาการศึกษา และแนวข้อสอบต่างๆ สำหรับทุกระดับชั้นไว้ที่นี่
เนื้อหาจัดเต็ม เรียนอย่างจุใจ ในรูปแบบการเรียนออนไลน์ ที่สามารถเข้าถึงได้ทุกที่ทุกเวลา

                </div><!-- end about-text -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
        <div class="row about-img-wrap">
          <div class="col-lg-2">
            </div>
            <div class="col-lg-4">
                <div class="about-img">
                    <img src="{{url('assets/images/image_about_1.jpg')}}" alt="รูปหน้า เกี่ยวกับเรา 1">
                </div><!-- end about-img -->
            </div><!-- end col-lg-6 -->
            <div class="col-lg-4">
                <div class="about-img">
                    <img src="{{url('assets/images/image_about_2.jpg')}}" alt="รูปหน้า เกี่ยวกับเรา 2">
                </div><!-- end about-img -->
            </div><!-- end col-lg-6 -->
            <div class="col-lg-2">
              </div>
        </div><!-- end row -->


    </div><!-- end container -->
</section><!-- end about-area -->
<!--======================================
        END ABOUT AREA
======================================-->
<div class="section-divider"></div>
<!--======================================
        START ABOUT AREA
 ======================================-->
<section class="about-area about-area2" style="padding-top: 60px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-heading">

                    <h2 class="section__title" style="font-size: 35px;">อยากเรียน HubJung ไม่ต้องลังเล</h2>
                    <span class="section__divider"></span>
                    <p class="section__desc">
                          เพราะเรียน HubJung มีข้อดีมากมายเหลือเกิน ไม่ว่าจะ เปิดคลิปเรียนได้ทุกที่ ทุกเวลา ว่างตอนไหนก็เข้าตอนนั้น ชิลๆ
                        เรียนเนื้อหาที่จัดเต็ม โดย ผู้เชี่ยวชาญทุกสาขาวิชา ที่ HubJung ดีรวบรวม เพื่อคุณภาพในการเรียนการสอน อัพเดตความรู้อย่างต่อเนื่อง เรียนแบบทันสถานการณ์ เพราะความรู้เกิดขึ้นใหม่ได้ตลอดเวลา
                        เพราะความรู้ ไม่มีวันสิ้นสุด เราจึงตั้งใจ คัดสรรเนื้อหา สาระความรู้ที่ดีที่สุด ถ่ายทอดผ่านผู้เชี่ยวชาญในแต่ละสาขาวิชา เพื่อทำให้ความรู้ถูกส่งต่อออกไป อย่างมีคุณภาพ
                    </p>
                    <p class="section__desc">
                      รวบรวมแนวข้อสอบต่างๆ สำหรับทุกระดับชั้น ไม่ว่าจะเป็นเนื้อหา ม.ต้น ม.ปลาย มหาวิทยาลัย และอีกมากมาย มาเถอะ มาเรียน HubJung รอเสิร์ฟความรู้ให้ทุกคนอยู่
                    </p>
                    <a href="#" class="theme-btn">เริ่มเรียนกับเราฟรี</a>
                </div><!-- end section-heading -->
            </div><!-- end col-lg-6 -->
            <div class="col-lg-6">
                <div class="about-img">
                    <img src="{{url('assets/images/image_about_3.jpg')}}" alt="รูปหน้า เกี่ยวกับเรา 3">
                </div><!-- end about-img -->
            </div><!-- end col-lg-6 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end about-area -->
<!--======================================
        END ABOUT AREA
======================================-->


@endsection

@section('scripts')



@stop('scripts')
