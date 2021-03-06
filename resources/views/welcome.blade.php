@extends('layouts.template')
@section('stylesheet')
<link rel="stylesheet" href="{{url('css/owl.carousel.css')}}">
<link rel="stylesheet" href="{{url('css/owl.theme.css')}}">
<style>

.category-area .category-wrapper .category-item:after {
    opacity: .40;
}
.slider-area .single-slide-item:after {

  /*  opacity: .50; */

  opacity: 0;
}
.sp-buttons {
    top: -40px;
}
.p-slides {
    top: -34px;
}
@media (max-width: 767px){
  .sp-buttons {
      display: none;
  }
.p-slides {
    display: none;
    top: -42px;
}
}

.owl-pagination{
  display: none;
}
.owl-theme .owl-controls {
    margin-top: -10px;
    text-align: right;
}
.slider-area2 .single-slide-item .how-we-work-content {
    background: #429b85;
    background: -moz-linear-gradient(-45deg, #429b85 0%, #5f7b8c 100%);
    background: -webkit-linear-gradient(-45deg, #429b85 0%, #5f7b8c 100%);
    background: linear-gradient(135deg, #003977 0%, #003977 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#429b85', endColorstr='#5f7b8c',GradientType=1 );

}
</style>

@stop('stylesheet')
@section('content')



<div class="slider-pro slide_set_t" id="my-slider">
  <div class="sp-slides">

		@if(isset($slide))
		@foreach($slide as $slide1)
    <div class="sp-slide">
      @if($slide1->btn_url != null)
      <a href="{{$slide1->btn_url}}">
      @else
      <a href="#">
      @endif

        <img class="sp-image" src="{{url('assets/image/slide/'.$slide1->image_slide)}}" />
      </a>
    </div>
		@endforeach
		@endif


  </div>
</div>



<!--================================
         START SLIDER AREA
=================================-->
<section class="p-slides slider-area slider-area2" >
    <div class="homepage-slide2">
        <div class="single-slide-item " style="padding-top: 0px;">

            <div class="slide-item-table">
                <div class="slide-item-tablecell">

                    <div class="how-we-work-content" style="    margin-top: 0px;">
                        <span class="hw-circle"></span>
                        <span class="hw-circle"></span>
                        <span class="hw-circle"></span>
                        <div class="container">
                            <div class="row how-we-work-wrap">
                                <div class="col-lg-4">
                                    <div class="how-we-work-item">
                                        <span class="la la-mouse-pointer"></span>
                                        <div class="how-work__text">
                                            <h4 class="hww__sub-title">ทบทวนซ้ำตลอดอายุคอร์ส</h4>
                                            <p class="hww__sub-desc">ดูได้ไม่จำกัด</p>
                                        </div><!-- how-work__text -->
                                    </div><!-- how-we-work-item -->
                                </div><!-- col-lg-4 -->
                                <div class="col-lg-4">
                                    <div class="how-we-work-item">
                                        <span class="la la-users"></span>
                                        <div class="how-work__text">
                                            <h4 class="hww__sub-title">อัพเดทเนื้อหาใหม่ทุกวัน</h4>
                                            <p class="hww__sub-desc">สอนโดยครูผู้เชี่ยวชาญ</p>
                                        </div><!-- how-work__text -->
                                    </div><!-- how-we-work-item -->
                                </div><!-- col-lg-4 -->
                                <div class="col-lg-4">
                                    <div class="how-we-work-item">
                                        <span class="la la-graduation-cap"></span>
                                        <div class="how-work__text">
                                            <h4 class="hww__sub-title">เรียนรู้ได้ทุกที่ ตลอด 24 ชม</h4>
                                            <p class="hww__sub-desc">ทุกคอร์สเรียนออนไลน์</p>
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


    <div class="course-content-wrapper" style="padding-bottom: 10px;">
        <div class="container">

          <div class="row">
              <div class="col-lg-12">
                  <div class="button-shared">
                      <h4 class="benefit__title">คอร์สใหม่ล่าสุด</h4>
                  </div><!-- end button-shared -->
              </div><!-- end col-lg-12 -->
          </div><!-- end row -->


            <div class="row course-item-wrap">
                <div class="col-lg-12">
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade show active" id="tab1">
                            <div class="row course-block">

                              <div id="owl-demo" class="owl-carousel owl-theme">
                                @if(isset($objs))
                                @foreach($objs as $u)
                                <div class=" item" style="padding: 15px;">
                                    <div class="course-item">
                                        <div class="course-img">
                                            <a href="{{url('course_details/'.$u->A)}}" class="course__img"><img src="{{url('assets/uploads/'.$u->image_course)}}" alt="{{$u->title_course}}"></a>
                                          <!--  <div class="course-tooltip">
                                                <span class="tooltip-label">bestseller</span>
                                            </div> -->
                                        </div><!-- end course-img -->
                                        <div class="course-content">
                                            <p class="course__label">

                                              @if (Auth::guest())
                                                <span class="course__label-text" style="color: #2196F3;">{{$u->name_department}}</span>
                                                <a href="#" class="photo_f course__collection-icon" data-toggle="tooltip" data-placement="top" title="Add to Wishlist">
                                                  <span class="la la-heart-o"></span>
                                                </a>

                                              @else
                                              <form id="cutproduct" class="" novalidate="novalidate" action="" method="post"  role="form">
                                              <span class="course__label-text" style="color: #2196F3;">{{$u->name_department}}</span>
                                              <input class="user_id form hide" type="hidden" name="id" value="{{$u->A}}" />

                                              <a href="#" class="course__collection-icon add_wishlist"  data-value="{{$u->A}}" data-toggle="tooltip" data-placement="top" title="Add to Wishlist">
                                                <span class="la la-heart-o"></span>
                                              </a>

                                              </form>
                                              @endif


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
                                                        <span class="meta__date" style="font-size:13px">
                                                            <i class="la la-play-circle"></i> {{$u->count_video}} Video
                                                        </span>
                                                    </li>
                                                    <li style="padding: 0px;">
                                                      <span class="course__price">{{$u->time_course_text}} </span>
                                                    </li>
                                                </ul>
                                            </div><!-- end course-meta -->
                                            <br>
                                            <div class="course-price-wrap">
                                                <span class="course__price" style="color: #f00;">
                                                  @if($u->discount != 0)
                                                  <span class="course__before-price">{{($u->discount+$u->price_course)}}</span>
                                                  @endif
                                                  {{($u->price_course)}} บาท</span>
                                            </div>

                                        </div><!-- end course-content -->
                                    </div><!-- end course-item -->
                                </div><!-- end col-lg-4 -->
                                @endforeach
                                @endif

                                </div>




                            </div><!-- end course-block -->
                        </div><!-- end tab-pane -->





                    </div><!-- end tab-content -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->

        </div><!-- end container -->
    </div><!-- end course-content-wrapper -->
</section><!-- end courses-area -->
<!--======================================
        END COURSE AREA
======================================-->



<hr />



<!--======================================
        START COURSE AREA
======================================-->
<section class="course-area course-area3">


    <div class="course-content-wrapper" style="padding-bottom: 10px;">
        <div class="container">

          <div class="row">
              <div class="col-lg-12">
                  <div class="button-shared">
                      <h4 class="benefit__title">คอร์สยอดนิยม</h4>
                  </div><!-- end button-shared -->
              </div><!-- end col-lg-12 -->
          </div><!-- end row -->


            <div class="row course-item-wrap">
                <div class="col-lg-12">
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade show active" id="tab1">
                            <div class="row course-block">

                              <div id="owl-demo2" class="owl-carousel owl-theme">
                                @if(isset($objs2))
                                @foreach($objs2 as $u)
                                <div class=" item" style="padding: 15px;">
                                    <div class="course-item">
                                        <div class="course-img">
                                            <a href="{{url('course_details/'.$u->A)}}" class="course__img"><img src="{{url('assets/uploads/'.$u->image_course)}}" alt="{{$u->title_course}}"></a>
                                          <!--  <div class="course-tooltip">
                                                <span class="tooltip-label">bestseller</span>
                                            </div> -->
                                        </div><!-- end course-img -->
                                        <div class="course-content">
                                            <p class="course__label">

                                              @if (Auth::guest())
                                                <span class="course__label-text" style="color: #2196F3;">{{$u->name_department}}</span>
                                                <a href="#" class="photo_f course__collection-icon" data-toggle="tooltip" data-placement="top" title="Add to Wishlist">
                                                  <span class="la la-heart-o"></span>
                                                </a>

                                              @else
                                              <form id="cutproduct" class="" novalidate="novalidate" action="" method="post"  role="form">
                                              <span class="course__label-text" style="color: #2196F3;">{{$u->name_department}}</span>
                                              <input class="user_id form hide" type="hidden" name="id" value="{{$u->A}}" />

                                              <a href="#" class="course__collection-icon add_wishlist"  data-value="{{$u->A}}" data-toggle="tooltip" data-placement="top" title="Add to Wishlist">
                                                <span class="la la-heart-o"></span>
                                              </a>

                                              </form>
                                              @endif


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
                                                        <span class="meta__date" style="font-size:13px">
                                                            <i class="la la-play-circle"></i> {{$u->count_video}} Video
                                                        </span>
                                                    </li>
                                                    <li style="padding: 0px;">
                                                      <span class="course__price">{{$u->time_course_text}} </span>
                                                    </li>
                                                </ul>
                                            </div><!-- end course-meta -->
                                            <br>
                                            <div class="course-price-wrap">
                                                <span class="course__price" style="color: #f00;">
                                                  @if($u->discount != 0)
                                                  <span class="course__before-price">{{($u->discount+$u->price_course)}}</span>
                                                  @endif
                                                  {{($u->price_course)}} บาท</span>
                                            </div>

                                        </div><!-- end course-content -->
                                    </div><!-- end course-item -->
                                </div><!-- end col-lg-4 -->
                                @endforeach
                                @endif

                                </div>




                            </div><!-- end course-block -->
                        </div><!-- end tab-pane -->





                    </div><!-- end tab-content -->
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
    color: #3F51B5;

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

@media (max-width: 767px){
  .category-area2 .category-wrapper .category-item .category-content .cat__title {
    font-size: 16px;
}
.p-slides {

}
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

                </div><!-- end section-heading -->
            </div><!-- end col-lg-6 -->
        </div><!-- end row -->
        <div class="row category-wrapper">

            @if(isset($get_cat))
            @foreach($get_cat as $u)

            <div class="col-6 col-md-3">

                <div class="category-item">
                    <div class="category-content">
                        <a href="{{url('course_department/'.$u->id)}}" style="padding-left: 10px;">
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

                <iframe style="width:100%" height="350" src="{{ setting()->youyube_index }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div><!-- end col-lg-6 -->
            <div class="col-lg-6">
                <div class="benefit-heading">
                    <div class="section-heading">

                        <h2 class="section__title" style="font-size: 35px;">การเรียนรู้ในช่วงเวลาที่สำคัญ</h2>
                        <!-- <span class="section__divider"></span> -->
                        <p class="section__desc">
                          ผู้นำนวัตกรรมเพื่อพัฒนาการศึกษา
  ระบบเรียนออนไลน์แบบใหม่
   Hubjung.com  Hub of Education
  ปรับระบบการเรียนใหม่ เพื่อให้ชีวิตน้องง่ายยิ่งขึ้น
                        </p>
                        <div class="row benefit-course-box">
                            <div class="col-lg-4">
                                <div class="benefit-item benefit-item1">
                                    <span class="la la-mouse-pointer benefit__icon"></span>
                                    <h4 class="benefit__title">เทคนิคครบจากข้อสอบจริง</h4>
                                </div><!-- end benefit-item -->
                            </div><!-- end col-lg-4 -->
                            <div class="col-lg-4">
                                <div class="benefit-item benefit-item2">
                                    <span class="la la-bolt benefit__icon"></span>
                                    <h4 class="benefit__title">หลักสูตร มากมาย อัพเดททุกวัน</h4>
                                </div><!-- end benefit-item -->
                            </div><!-- end col-lg-4 -->
                            <div class="col-lg-4">
                                <div class="benefit-item benefit-item3">
                                    <span class="la la-users benefit__icon"></span>
                                    <h4 class="benefit__title">ภาพเสียง คมชัด Full HD</h4>
                                </div><!-- end benefit-item -->
                            </div><!-- end col-lg-4 -->
                        </div><!-- end row -->
                        <div class="get-start-btn">
                            <a href="{{url('about')}}" class="theme-btn theme-btn2">เพิ่มเติม</a>
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

<hr />

<style>
.blog-area .blog-post-wrapper .blog-post-item .post-body .blog-title {
    margin-bottom: 1px;
}.align-items-center {
    font-size: 12px;
}
.blog-area .blog-post-wrapper .blog-post-item .post-body {
    padding: 15px;
}
.blog-area .blog-post-wrapper .blog-post-item .blog-post-img:after {
    display: none;
}
</style>

<!-- ================================
       START BLOG AREA
================================= -->
<section class="blog-area blog-area3">
    <div class="container">
      <div class="row">
          <div class="col-lg-12">
              <div class="button-shared">
                  <h4 class="benefit__title">บทความที่น่าสนใจ</h4>
                  <br />
              </div><!-- end button-shared -->
          </div><!-- end col-lg-12 -->
      </div><!-- end row -->
        <div class="row blog-post-wrapper">

          @if(isset($blog))
          @foreach($blog as $u)
            <div class="col-lg-3 blog-post-item">
                <div class="blog-post-img">
                  <a href="{{url('blog/'.$u->B)}}">
                    <img src="{{url('assets/blog/'.$u->image)}}" alt="{{ $u->title_blog }}" class="blog__img">
                    </a>
                    <div class="blog__date">
                        <span style="font-size: 13px;">{{DateThai($u->created_ats)}}</span>
                    </div><!-- end blog__date -->
                </div><!-- end blog-post-img -->
                <div class="post-body">
                    <div class="blog-title">
                        <a href="{{url('blog/'.$u->B)}}" class="blog__title" style="height:56px; overflow: hidden; font-size:13px;">
                            {{ $u->title_blog }}
                        </a>
                    </div>
                    <ul class="blog__panel d-flex align-items-center">
                        <li>โดย<a href="#" class="blog-admin-name">{{ $u->name }}</a></li>
                        <li><span class="blog__panel-comment">{{ $u->view }} ยอดวิว</span></li>
                    </ul>
                </div><!-- end post-body -->
            </div><!-- end blog-post-item -->
            @endforeach
            @endif


        </div><!-- end row -->


    </div><!-- end container -->
</section><!-- end blog-area -->
<!-- ================================
       START BLOG AREA
================================= -->



<div class="section-divider"></div>



@endsection

@section('scripts')

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>


$('#my-slider').sliderPro({
    width: '100%',
    autoHeight: true,
    arrows: true,
    visibleSize: '100%',
    responsive:false,
    imageScaleMode:'contain'
  });



$('.photo_f').on('click', function () {

swal("การเก็บคอร์สเรียนที่ นักเรียนชื่นชอบ ต้องทำการ login เข้าสู่ระบบก่อน")

});
</script>

<script type="text/javascript">


    $('.add_wishlist').click(function(e){
          e.preventDefault();
        //  var username = $('form#cutproduct input[name=id]').val();


        var $form = $(this).closest("form#cutproduct");
        var formData =  $form.serializeArray();
        var userId =  $form.find(".user_id").val();

          if(userId){
            $.ajax({
              type: "POST",
              url: "{{url('add_wishlist')}}",
              headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
              data: "id="+userId,
              dataType: "json",
           success: function(json){
               if(json.status == 1001) {

                 swal("เพิ่มสำเร็จ!", "คุณทำการเพิ่มรายการที่ชื่นชอบ", "success");

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



        $(document).ready(function() {

          var owl = $("#owl-demo");
          var owl2 = $("#owl-demo2");

  owl.owlCarousel({
      items : 4, //10 items above 1000px browser width
      itemsDesktop : [1000,5], //5 items between 1000px and 901px
      itemsDesktopSmall : [900,3], // betweem 900px and 601px
      itemsTablet: [600,1], //2 items between 600 and 0
      itemsMobile : false, // itemsMobile disabled - inherit from itemsTablet option

      navigation : true,
    navigationText : ["prev","next"],
    rewindNav : true,
    scrollPerPage : false,

  });


  owl2.owlCarousel({
      items : 4, //10 items above 1000px browser width
      itemsDesktop : [1000,5], //5 items between 1000px and 901px
      itemsDesktopSmall : [900,3], // betweem 900px and 601px
      itemsTablet: [600,1], //2 items between 600 and 0
      itemsMobile : false, // itemsMobile disabled - inherit from itemsTablet option

      navigation : true,
    navigationText : ["prev","next"],
    rewindNav : true,
    scrollPerPage : false,

  });

        });


</script>

@stop('scripts')
