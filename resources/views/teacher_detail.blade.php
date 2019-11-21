@extends('layouts.template')
@section('stylesheet')




@stop('stylesheet')
@section('content')




<hr />

<!--======================================
        START SPEAKER AREA
======================================-->
<section class="team-detail-area" style="padding-top: 40px;">
    <div class="container">
        <div class="row">
          <div class="col-lg-12">
             <h3 class="instructor-all-course__title">ข้อมูลอาจารย์ผู้สอน : {{$objs->te_name}}</h3>

             <ul class="breadcrumb__list">
                        <li>ประจำสาขา : {{$objs->name_department}}</li>
                    </ul>
                    <br />
                    <br />
          </div><!-- end col-lg-12 -->
            <div class="col-lg-4">
                <div class="team-single-img">
                    <img src="{{url('assets/images/teachers/'.$objs->te_image)}}" alt="{{$objs->te_name}}" class="team__img">
                </div><!-- end team-single-img -->
            </div><!-- end col-lg-4 -->
            <div class="col-lg-8">
                <div class="team-single-content">
                    <div class="tsd-box row">
                        <div class="col-lg-6">
                            <div class="tsd-item">
                                <h3 class="tsdi__title">สาขาที่เชี่ยวชาญ</h3>
                                <p>
                                  {!! $objs->te_exper !!}
                                </p>
                            </div><!-- end tsd-item -->
                        </div><!-- end col-lg-6 -->
                        <div class="col-lg-6">
                            <div class="tsd-item education-detail">
                                <h3 class="tsdi__title">การศึกษา</h3>
                                {!! $objs->te_edu !!}
                            </div><!-- end tsd-item -->
                        </div><!-- end col-lg-6 -->
                    </div><!-- end tsd-box -->
                    <div class="tsd-box-2 row">
                        
                    </div><!-- end tsd-box -->
                    <div class="tsd-box tsd-box-3 row">
                        <div class="col-lg-4">
                            <div class="tsd-item">
                                <h3 class="tsdi__title">Total students</h3>
                                <p class="tsdi__meta ">0</p>
                            </div><!-- end tsd-item -->
                        </div><!-- end col-lg-4 -->
                        <div class="col-lg-4">
                            <div class="tsd-item">
                                <h3 class="tsdi__title">Courses</h3>
                                <p class="tsdi__meta ">{{$count_c}}</p>
                            </div><!-- end tsd-item -->
                        </div><!-- end col-lg-4 -->
                        <div class="col-lg-4">
                            <div class="tsd-item">
                                <h3 class="tsdi__title">Reviews</h3>
                                <p class="tsdi__meta ">{{$objs->te_view}}</p>
                            </div><!-- end tsd-item -->
                        </div><!-- end col-lg-4 -->
                    </div><!-- end tsd-box -->
                </div><!-- end team-single-content -->
            </div><!-- end col-lg-8 -->
        </div><!-- end row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="about-tab-wrap">
                    <ul class="course-tab-list nav nav-tabs " role="tablist" id="review">
                        <li role="presentation">
                            <a href="#tab1" role="tab" data-toggle="tab" class="active" aria-selected="true">
                                เกี่ยวกับ {{$objs->te_name}}
                            </a>
                        </li>

                    </ul>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade show active" id="tab1">
                            <div class="pane-body">
                                {{$objs->te_about}}
                            </div>
                        </div>

                    </div><!-- end tab-content -->
                </div><!-- end about-tab-wrap -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
        <div class="row course-block instructor-all-course">
            <div class="col-lg-12">
               <h3 class="instructor-all-course__title">คอร์สการสอนโดย {{$objs->te_name}}</h3>
            </div><!-- end col-lg-12 -->



            @if(isset($get_course))
            @foreach($get_course as $u)
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



        </div><!-- end row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="pagination-wrap">
                    <nav aria-label="Page navigation">
                        {{ $get_course->links() }}
                    </nav>
                </div><!-- end pagination-wrap -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end team-detail-area -->
<!--======================================
        END SPEAKER AREA
======================================-->



@endsection

@section('scripts')

@stop('scripts')
