@extends('layouts.template')
@section('stylesheet')

<style>

.category-area .category-wrapper .category-item:after {
    opacity: .40;
}
.slider-area .single-slide-item:after {

    opacity: .50;
}
</style>

@stop('stylesheet')
@section('content')




<!--================================
         START SLIDER AREA
=================================-->
<section class="slider-area slider-area2">
    <div class="homepage-slide2">
        <div class="single-slide-item slide-bg1" style="background-image: url({{url('assets/image/slide/'.$slide->image_slide)}});">
            <div id="perticles-js-2"></div>
            <div class="slide-item-table">
                <div class="slide-item-tablecell">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="slider-heading">
                                    <h2 class="slider__title">{{$slide->text_slide1}}</h2>
                                    <p class="slider__text" style="margin-bottom: 0px;">
                                        {{$slide->text_slide3}}
                                    </p>

                                </div>
                            </div><!-- col-md-7 -->
                        </div><!-- row -->
                    </div><!-- container -->
                    <div class="how-we-work-content">
                        <span class="hw-circle"></span>
                        <span class="hw-circle"></span>
                        <span class="hw-circle"></span>
                        <div class="container">
                            <div class="row how-we-work-wrap">
                                <div class="col-lg-4">
                                    <div class="how-we-work-item">
                                        <span class="la la-mouse-pointer"></span>
                                        <div class="how-work__text">
                                            <h4 class="hww__sub-title">100,000 หลักสูตรออนไลน์</h4>
                                            <p class="hww__sub-desc">สำรวจหัวข้อสดใหม่อันหลากหลาย</p>
                                        </div><!-- how-work__text -->
                                    </div><!-- how-we-work-item -->
                                </div><!-- col-lg-4 -->
                                <div class="col-lg-4">
                                    <div class="how-we-work-item">
                                        <span class="la la-users"></span>
                                        <div class="how-work__text">
                                            <h4 class="hww__sub-title">การสอนโดยผู้เชี่ยวชาญ</h4>
                                            <p class="hww__sub-desc">ค้นหาวิทยากรที่เหมาะกับคุณ</p>
                                        </div><!-- how-work__text -->
                                    </div><!-- how-we-work-item -->
                                </div><!-- col-lg-4 -->
                                <div class="col-lg-4">
                                    <div class="how-we-work-item">
                                        <span class="la la-graduation-cap"></span>
                                        <div class="how-work__text">
                                            <h4 class="hww__sub-title">การเข้าถึงตลอดชีวิต</h4>
                                            <p class="hww__sub-desc">เรียนตามตารางเวลาของคุณเอง</p>
                                        </div><!-- how-work__text -->
                                    </div><!-- how-we-work-item -->
                                </div><!-- col-lg-4 -->
                            </div><!-- row -->
                        </div><!-- container -->
                    </div><!-- how-we-work-content -->
                </div><!-- slide-item-tablecell -->
            </div><!-- slide-item-table -->
        </div><!-- end single-slide-item -->
    </div><!-- end homepage-slides -->
</section><!-- end slider-area -->
<!--================================
        END SLIDER AREA
=================================-->






<!--======================================
        START COURSE AREA
======================================-->
<section class="course-area course-area3">
    <div class="course-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="course-tab-wrap">
                        <ul class="course-tab-list nav nav-tabs justify-content-center text-center" role="tablist" id="review">
                            <li role="presentation">
                                <a href="#tab1" role="tab" data-toggle="tab" class="active" aria-selected="true">
                                    วิทยาศาสตร์
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#tab2" role="tab" data-toggle="tab" aria-selected="false">
                                    เรียนภาษา
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#tab3" role="tab" data-toggle="tab" aria-selected="false">
                                    เตรียมสอบ
                                </a>
                            </li>
                        </ul>
                    </div><!-- end course-tab-wrap -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end course-wrapper -->
    <div class="course-content-wrapper">
        <div class="container">
            <div class="row course-item-wrap">
                <div class="col-lg-12">
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade show active" id="tab1">
                            <div class="row course-block">

                                @if(isset($objs))
                                @foreach($objs as $u)
                                <div class="col-lg-3">
                                    <div class="course-item">
                                        <div class="course-img">
                                            <a href="{{url('course_details/'.$u->A)}}" class="course__img"><img src="{{url('assets/uploads/'.$u->image_course)}}" alt=""></a>
                                          <!--  <div class="course-tooltip">
                                                <span class="tooltip-label">bestseller</span>
                                            </div> -->
                                        </div><!-- end course-img -->
                                        <div class="course-content">
                                            <p class="course__label">

                                                <a href="{{url('course_details/'.$u->A)}}" class="course__collection-icon" data-toggle="tooltip" data-placement="top" title="Add to Wishlist">
                                                  <span class="la la-heart-o"></span>
                                                </a>
                                            </p>
                                            <h3 class="course__title">
                                                <a href="{{url('course_details/'.$u->A)}}">{{$u->title_course}}</a>
                                            </h3>
                                            <p class="course__author">
                                                <a href="{{url('course_details/'.$u->A)}}">{{$u->te_name}}</a>
                                            </p>
                                            <div class="rating-wrap d-flex">

                                            </div><!-- end rating-wrap -->
                                            <div class="course-meta">
                                                <ul class="course__list d-flex">
                                                    <li>
                                                        <span class="meta__date">
                                                            <i class="la la-play-circle"></i> {{$u->count_video}} Video
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <span class="meta__date">
                                                            <i class="la la-clock-o"></i> {{$u->time_course_text}}
                                                        </span>
                                                    </li>
                                                </ul>
                                            </div><!-- end course-meta -->

                                        </div><!-- end course-content -->
                                    </div><!-- end course-item -->
                                </div><!-- end col-lg-4 -->
                                @endforeach
                                @endif






                            </div><!-- end course-block -->
                        </div><!-- end tab-pane -->
                        <div role="tabpanel" class="tab-pane fade" id="tab2">
                            <div class="row course-block">

                              @if(isset($objs2))
                              @foreach($objs2 as $u)
                              <div class="col-lg-4">
                                  <div class="course-item">
                                      <div class="course-img">
                                          <a href="course-details.html" class="course__img"><img src="{{url('assets/uploads/'.$u->image_course)}}" alt=""></a>
                                        <!--  <div class="course-tooltip">
                                              <span class="tooltip-label">bestseller</span>
                                          </div> -->
                                      </div><!-- end course-img -->
                                      <div class="course-content">
                                          <p class="course__label">

                                              <a href="#" class="course__collection-icon" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="la la-heart-o"></span></a>
                                          </p>
                                          <h3 class="course__title">
                                              <a href="course-details.html">{{$u->title_course}}</a>
                                          </h3>
                                          <p class="course__author">
                                              <a href="#">{{$u->te_name}}</a>
                                          </p>
                                          <div class="rating-wrap d-flex">

                                          </div><!-- end rating-wrap -->
                                          <div class="course-meta">
                                              <ul class="course__list d-flex">
                                                  <li>
                                                      <span class="meta__date">
                                                          <i class="la la-play-circle"></i> {{$u->count_video}} Video
                                                      </span>
                                                  </li>
                                                  <li>
                                                      <span class="meta__date">
                                                          <i class="la la-clock-o"></i> {{$u->time_course_text}}
                                                      </span>
                                                  </li>
                                              </ul>
                                          </div><!-- end course-meta -->

                                      </div><!-- end course-content -->
                                  </div><!-- end course-item -->
                              </div><!-- end col-lg-4 -->
                              @endforeach
                              @endif

                            </div><!-- end course-block -->
                        </div><!-- end tab-pane -->
                        <div role="tabpanel" class="tab-pane fade" id="tab3">
                            <div class="row course-block">


                              @if(isset($objs3))
                              @foreach($objs3 as $u)
                              <div class="col-lg-4">
                                  <div class="course-item">
                                      <div class="course-img">
                                          <a href="course-details.html" class="course__img"><img src="{{url('assets/uploads/'.$u->image_course)}}" alt=""></a>
                                        <!--  <div class="course-tooltip">
                                              <span class="tooltip-label">bestseller</span>
                                          </div> -->
                                      </div><!-- end course-img -->
                                      <div class="course-content">
                                          <p class="course__label">

                                              <a href="#" class="course__collection-icon" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="la la-heart-o"></span></a>
                                          </p>
                                          <h3 class="course__title">
                                              <a href="course-details.html">{{$u->title_course}}</a>
                                          </h3>
                                          <p class="course__author">
                                              <a href="#">{{$u->te_name}}</a>
                                          </p>
                                          <div class="rating-wrap d-flex">

                                          </div><!-- end rating-wrap -->
                                          <div class="course-meta">
                                              <ul class="course__list d-flex">
                                                  <li>
                                                      <span class="meta__date">
                                                          <i class="la la-play-circle"></i> {{$u->count_video}} Video
                                                      </span>
                                                  </li>
                                                  <li>
                                                      <span class="meta__date">
                                                          <i class="la la-clock-o"></i> {{$u->time_course_text}}
                                                      </span>
                                                  </li>
                                              </ul>
                                          </div><!-- end course-meta -->

                                      </div><!-- end course-content -->
                                  </div><!-- end course-item -->
                              </div><!-- end col-lg-4 -->
                              @endforeach
                              @endif


                            </div><!-- end course-block -->
                        </div><!-- end tab-pane -->
                    </div><!-- end tab-content -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="button-shared text-center">
                        <a href="course-grid.html" class="theme-btn theme-btn2">คอร์สเรียนอื่นๆ</a>
                    </div><!-- end button-shared -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end course-content-wrapper -->
</section><!-- end courses-area -->
<!--======================================
        END COURSE AREA
======================================-->


<div class="section-divider"></div>

<style>
.category-area2 .category-wrapper .category-item .category-content .cat__title {
    color: #233d63;
    padding-top: 10px;
    margin-top: 1px;
    margin-bottom: 0;
}
.category-area2 .category-wrapper .category-item {
    background-color: #fff;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
    padding: 10px 0 10px 0;
    border: 1px solid rgba(127, 136, 151, 0.2);
    overflow: hidden;
}
.category-area2 .category-wrapper .category-item .category-content .la {
    color: #51be78;

    width: 50px;
    height: 50px;
    line-height: 50px;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    background-color: rgba(81, 190, 120, 0.1);
    font-size: 30px;
    -webkit-transition: all 0.3s;
    -moz-transition: all 0.3s;
    -ms-transition: all 0.3s;
    -o-transition: all 0.3s;
    transition: all 0.3s;
}
.category-area2 .category-wrapper .category-item:before {
    position: absolute;
    content: '';
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: url('{{url('/assets/images/congruent_outline.png')}}');
    background-size: cover;
    background-position: center;
    background-color: transparent;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
    opacity: 0;
    visibility: hidden;
}
</style>

<!--======================================
        START CATEGORY AREA
======================================-->
<section class="category-area category-area2">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading ">

                    <h2 class="section__title" style="font-size: 35px;">หมวดหมู่ยอดนิยม</h2>
                    <span class="section__divider"></span>
                </div><!-- end section-heading -->
            </div><!-- end col-lg-6 -->
        </div><!-- end row -->
        <div class="row category-wrapper">

            @if(isset($get_cat))
            @foreach($get_cat as $u)
            <div class="col-lg-3">
                <div class="category-item">
                    <div class="category-content">
                        <a href="#" style="padding-left: 10px;">
                            <span class="{{$u->icon_de}}" style="float: left;"></span>
                            <h3 class="cat__title">{{$u->name_department}}</h3>
                        </a>
                    </div><!-- end category-content -->
                </div><!-- end category-item -->
            </div><!-- end col-lg-3 -->
            @endforeach
            @endif

        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end category-area -->
<!--======================================
        END CATEGORY AREA
======================================-->

<div class="section-divider"></div>



<!--======================================
        START BENEFIT AREA
======================================-->
<section class="benefit-area benefit-area2">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">

                <iframe style="width:100%" height="350" src="https://www.youtube.com/embed/j1-utpFMkms" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div><!-- end col-lg-6 -->
            <div class="col-lg-6">
                <div class="benefit-heading">
                    <div class="section-heading">

                        <h2 class="section__title" style="font-size: 35px;">การเรียนรู้ในช่วงเวลาที่สำคัญ</h2>
                        <span class="section__divider"></span>
                        <p class="section__desc">
                          เรียนตามตารางเวลาของคุณเอง  ศึกษาหัวข้อใดก็ได้ทุกเวลา เลือกจากหลักสูตรโดยผู้เชี่ยวชาญหลายพันหลักสูตร สอนในสิ่งที่คุณรัก Udemy พร้อมเป็นเครื่องมือในการสร้างหลักสูตรออนไลน์ให้กับคุณ
                        </p>
                        <div class="row benefit-course-box">
                            <div class="col-lg-4">
                                <div class="benefit-item benefit-item1">
                                    <span class="la la-mouse-pointer benefit__icon"></span>
                                    <h4 class="benefit__title">100,000 หลักสูตรออนไลน์</h4>
                                </div><!-- end benefit-item -->
                            </div><!-- end col-lg-4 -->
                            <div class="col-lg-4">
                                <div class="benefit-item benefit-item2">
                                    <span class="la la-bolt benefit__icon"></span>
                                    <h4 class="benefit__title">การสอนโดยผู้เชี่ยวชาญ</h4>
                                </div><!-- end benefit-item -->
                            </div><!-- end col-lg-4 -->
                            <div class="col-lg-4">
                                <div class="benefit-item benefit-item3">
                                    <span class="la la-users benefit__icon"></span>
                                    <h4 class="benefit__title">การเข้าถึงตลอดชีวิต</h4>
                                </div><!-- end benefit-item -->
                            </div><!-- end col-lg-4 -->
                        </div><!-- end row -->
                        <div class="get-start-btn">
                            <a href="#" class="theme-btn theme-btn2">learn more</a>
                        </div>
                    </div><!-- end section-heading -->
                </div><!-- end benefit-heading -->
            </div><!-- end col-lg-6 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end benefit-area -->
<!--======================================
        END BENEFIT AREA
======================================-->



<div class="section-divider"></div>



@endsection

@section('scripts')

@stop('scripts')