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

                    <h2 class="breadcrumb__title">{{$objs->name_sub_depart}}</h2>
                  <div class="text-outline">{{$objs->name_sub_depart}}</div>
                </div><!-- end breadcrumb-content -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end breadcrumb-area -->
<!-- ================================
    END BREADCRUMB AREA
================================= -->




<!--======================================
        START COURSE AREA
======================================-->
<section class="course-area course-area4">
    <div class="course-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="course-tab-wrap d-flex align-items-center">
                        <ul class="course-tab-list nav nav-tabs align-items-center" role="tablist"
                            id="review">
                            <li role="presentation">
                                <a href="#tab1" role="tab" data-toggle="tab" class="active" aria-selected="true">
                                    <span class="la la-th-large" data-toggle="tooltip" data-placement="top" title="Grid view"></span>
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#tab2" role="tab" data-toggle="tab" aria-selected="false">
                                    <span class="la la-th-list" data-toggle="tooltip" data-placement="top" title="List view"></span>
                                </a>
                            </li>
                            <li><span class="courses-showing-text"> {{$get_count}} คอร์ส ที่พบ</span></li>
                        </ul>
                        <div class="course-filter d-flex align-items-center ml-auto">
                            <div class="courses-ordering">
                                <select class="target-course">
                                    <option value="all-category">หมวดหมู่ทั้งหมด</option>
                                    <option value="newest">คอร์สใหม่</option>
                                    <option value="oldest">คอร์สเก่า</option>
                                    <option value="Popular-courses">คอร์สเรียนสูงสุด</option>

                                </select>
                            </div><!-- end courses-ordering -->
                        </div><!-- end course-filter -->
                    </div><!-- end course-tab-wrap -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end course-wrapper -->
    <div class="course-content-wrapper">
        <div class="container">
            <div class="row course-item-wrap">
                <div class="col-lg-8">
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade show active" id="tab1">
                            <div class="row course-block">


                              @if(isset($get_course))
                              @foreach($get_course as $u)

                                <div class="col-lg-6">
                                  <div class="course-item">
                                      <div class="course-img">
                                          <a href="{{url('course_details/'.$u->A)}}" class="course__img"><img src="{{url('assets/uploads/'.$u->image_course)}}" alt=""></a>
                                        <!--  <div class="course-tooltip">
                                              <span class="tooltip-label">bestseller</span>
                                          </div> -->
                                      </div><!-- end course-img -->
                                      <div class="course-content">
                                          <p class="course__label">

                                            @if (Auth::guest())
                                              <span class="course__label-text">{{$u->name_department}}</span>
                                              <a href="#" class="photo_f course__collection-icon" data-toggle="tooltip" data-placement="top" title="Add to Wishlist">
                                                <span class="la la-heart-o"></span>
                                              </a>

                                            @else
                                            <form id="cutproduct" class="" novalidate="novalidate" action="" method="post"  role="form">
                                            <span class="course__label-text">{{$u->name_department}}</span>
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
                                                          <i class="la la-play-circle"></i> {{$u->count_video}} Classes
                                                      </span>
                                                  </li>
                                                  <li style="padding: 0px;">
                                                      <span class="course__price">{{number_format($u->price_course, 2)}} <small>บาท</small></span>
                                                  </li>
                                              </ul>
                                          </div><!-- end course-meta -->

                                      </div><!-- end course-content -->
                                  </div><!-- end course-item -->
                                </div><!-- end col-lg-6 -->

                                @endforeach
                                @endif


                            </div><!-- end course-block -->
                        </div><!-- end tab-pane -->

                        <div role="tabpanel" class="tab-pane fade" id="tab2">
                            <div class="row course-block course-list-block">

                              @if(isset($get_course))
                              @foreach($get_course as $u)
                                <div class="col-lg-12">
                                    <div class="course-item">
                                        <div class="course-img">
                                            <a href="{{url('course_details/'.$u->A)}}" class="course__img"><img src="{{url('assets/uploads/'.$u->image_course)}}" alt=""></a>
                                        </div><!-- end course-img -->
                                        <div class="course-content">
                                            <p class="course__label">

                                              @if (Auth::guest())

                                                <a href="#" class="photo_f course__collection-icon" data-toggle="tooltip" data-placement="top" title="Add to Wishlist">
                                                  <span class="la la-heart-o"></span>
                                                </a>

                                              @else
                                              <form id="cutproduct" class="" novalidate="novalidate" action="" method="post"  role="form">

                                              <input class="user_id form hide" type="hidden" name="id" value="{{$u->A}}" />

                                              <a href="#" class="course__collection-icon add_wishlist"  data-value="{{$u->A}}" data-toggle="tooltip" data-placement="top" title="Add to Wishlist">
                                                <span class="la la-heart-o"></span>
                                              </a>

                                              </form>
                                              @endif
                                            </p>
                                            <h3 class="course__title">
                                                <a href="course-details.html">{{$u->title_course}}</a>
                                            </h3>
                                            <p class="course__author">
                                                <a href="{{url('course_details/'.$u->A)}}">{{$u->te_name}}</a>
                                            </p>

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
                                            <div class="course-price-wrap">
                                                <span class="course__price">Free</span>
                                                <a href="{{url('course_details/'.$u->A)}}" class="course__btn">Get Enrolled</a>
                                            </div><!-- end course-price-wrap -->
                                        </div><!-- end course-content -->
                                    </div><!-- end course-item -->
                                </div><!-- end col-lg-12 -->

                                @endforeach
                                @endif













                            </div><!-- end course-block -->
                        </div><!-- end tab-pane -->
                    </div><!-- end tab-content -->


                  <!--  <div class="pagination-wrap">
                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true"><i class="fa fa-angle-double-left"></i></span>
                                    </a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true"><i class="fa fa-angle-double-right"></i></span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div><!-- end pagination-wrap -->


                </div><!-- end col-lg-8 -->
                <div class="col-lg-4">
                    <div class="sidebar">
                        <div class="sidebar-widget">
                            <h3 class="widget__title">ค้นหา</h3>
                            <span class="section__divider"></span>
                            <div class="contact-form-action">
                                <form action="{{url('search_course')}}" method="post" name="search_course2" id="search_course2">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <input class="form-control" type="search" name="search" placeholder="ค้นหาคอร์สเรียน...">
                                        <button type="submit" class="search__btn"><span class="la la-search"></span></button>
                                    </div>
                                </form>
                            </div><!-- end contact-form-action -->
                        </div><!-- end sidebar-widget -->
                        <div class="sidebar-widget category-widget">
                            <h3 class="widget__title">หมวดหมู่เดียวกัน</h3>
                            <span class="section__divider"></span>
                            <ul class="widget__list">

                              @if(isset($get_sub))
                                @foreach($get_sub as $u)
                                <li><a href="{{url('category/'.$u->id)}}">{{$u->name_sub_depart}}</a></li>
                                @endforeach
                              @endif
                            </ul>
                        </div><!-- end sidebar-widget -->



                        <div class="sidebar-widget price-widget">
                            <h3 class="widget__title">ราคาคอร์ส</h3>
                            <span class="section__divider"></span>
                            <ul class="instructor__list">
                                <li>
                                    <div class="custom-checkbox">
                                        <input type="checkbox" id="chb4"/>
                                        <label for="chb4">ฟรี</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-checkbox">
                                        <input type="checkbox" id="chb5"/>
                                        <label for="chb5">แบบรายเดือน</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-checkbox">
                                        <input type="checkbox" id="chb5"/>
                                        <label for="chb5">รายคอร์ส</label>
                                    </div>
                                </li>
                            </ul>
                        </div><!-- end sidebar-widget -->





                    </div><!-- end sidebar -->
                </div><!-- end col-lg-4 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end course-content-wrapper -->
</section><!-- end courses-area -->
<!--======================================
        END COURSE AREA
======================================-->


@endsection

@section('scripts')

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
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






</script>

@stop('scripts')
