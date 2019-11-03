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
<section class="breadcrumb-area breadcrumb-area2">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-content">

                    <h2 class="breadcrumb__title">{{$objs->title_course}}</h2>
                    <ul class="breadcrumb__list">
                        <li>Created by <a href="teacher-detail.html">{{$objs->te_name}}</a></li>


                        <li>0 นักเรียนที่สมัครคอร์ส</li>

                        <li>Last updated {{DateThai($objs->created_ats)}}</li>
                    </ul>
                </div><!-- end breadcrumb-content -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end breadcrumb-area -->
<!-- ================================
    END BREADCRUMB AREA
================================= -->


<!--======================================
        START COURSE DETAIL
======================================-->
<section class="course-detail">
    <div class="container">
        <div class="row course-item-wrap">
            <div class="col-lg-8">
                <div class="course-item-content">


                    <br /><br />
                    <div class="description-wrap">
                        <h3 class="description__title course-detail__title">รายละเอียด</h3>
                        <p class="description__text">
                          {!! $objs->detail_course !!}
                        </p>

                    </div><!-- end description-wrap -->
                    <div class="requirement-wrap audience-wrap">
                        <h3 class="requirements__title course-detail__title">เอกสาร Download</h3>
                        <ul class="requirements__list">
                          @if(isset($filecourses))
                            @foreach($filecourses as $u)
                            <li class="requirements__item">
                                <span class="la la-angle-right requirements__icon"></span>
                                <a href="{{url('download_file_course/'.$u->id)}}"> {{$u->file_of_name}}</a>
                            </li>
                            @endforeach
                          @endif
                        </ul>
                    </div><!-- end requirement-wrap -->
                    <div class="curriculum-wrap">
                        <div class="curriculum-header d-flex align-items-center">
                            <div class="curriculum-header-left">
                                <h3 class="requirements__title course-detail__title">Video คอร์ส</h3>
                            </div>
                            <div class="curriculum-header-right ml-auto">
                                <span class="curriculum-total__text"><strong>ทั้งหมด:</strong> {{$objs->count_video}} คอร์ส</span>
                                <span class="curriculum-total__hours"><strong>เวลาทั้งหมด:</strong> {{$objs->time_course_text}}</span>
                            </div>
                        </div><!-- end curriculum-header -->
                        <div class="curriculum-content">
                            <div class="accordion course-accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                <i class="la la-angle-up"></i>
                                                <i class="la la-angle-down"></i>
                                                รายชื่อของ Video
                                                <span class="btn-text">{{$objs->count_video}} Video </span>
                                            </button>
                                        </h2>
                                    </div><!-- end card-header -->

                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <ul class="card-list">

                                              @if(isset($get_video))
                                                @foreach($get_video as $u)
                                                <li class="card-list-item">
                                                    <span class="course-duration">{{$u->time_video}}</span>
                                                    <button type="button" class="preview-link" data-toggle="modal" data-target="#exampleModalCenter">
                                                        <i class="la la-play-circle-o course-play__icon"></i> {{$u->course_video_name}}
                                                    </button>
                                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLongTitle">{{$u->course_video_name}}</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true" class="la la-close"></span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <video controls crossorigin playsinline poster="{{url('assets/uploads/'.$u->thumbnail_img)}}" id="player">
                                                                        <!-- Video files -->
                                                                        <source src="{{url('assets/videos/'.$u->course_video)}}" type="video/mp4" size="576"/>
                                                                        <source src="{{url('assets/videos/'.$u->course_video)}}" type="video/mp4" size="720"/>
                                                                        <source src="{{url('assets/videos/'.$u->course_video)}}" type="video/mp4" size="1080"/>


                                                                    </video>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!-- end modal -->
                                                </li>
                                                  @endforeach
                                                @endif



                                            </ul>
                                        </div><!-- end card-body -->
                                    </div><!-- end collapse -->
                                </div><!-- end card -->








                            </div><!-- end accordion -->
                        </div><!-- end curriculum-content -->
                    </div><!-- end curriculum-wrap -->










<style>
.testimonial-item .testimonial__name {
    position: relative;
    padding-left: 64px;
    padding-top: 14px;
    padding-bottom: 30px;
    line-height: 18px;
    border-bottom: 1px solid rgba(127, 136, 151, 0.2);
}
.testimonial-item .testimonial__name img {
    position: absolute;
    width: 54px;
    height: 54px;
    overflow: hidden;
    left: 0;
    top: 8px;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
}
.testimonial-item .testimonial__name .testimonial__name-title {
    font-size: 20px;
    line-height: 20px;
    font-weight: 600;
    -webkit-transition: all 0.3s;
    -moz-transition: all 0.3s;
    -ms-transition: all 0.3s;
    -o-transition: all 0.3s;
    transition: all 0.3s;
    margin-bottom: 5px;
}
.testimonial-item .testimonial__desc {
    margin-top: 20px;
}
</style>




                </div><!-- end course-item-content -->
            </div><!-- end col-lg-8 -->
            <div class="col-lg-4">
                <div class="sidebar-component">
                    <div class="sidebar">
                        <div class="sidebar-widget sidebar-preview">

                            <div class="preview-video-and-details">
                                <div class="preview-course-video">

                                  <video controls crossorigin playsinline style="width:100%"
                                         poster="{{url('web_stream/thumbnail_video/'.$get_video_ex->thumbnail_img)}}" id="player2">
                                      <!-- Video files -->
                                      <source src="{{url('web_stream/example_video/'.$get_video_ex->course_video)}}" type="video/mp4" size="576"/>
                                      <source src="{{url('web_stream/example_video/'.$get_video_ex->course_video)}}" type="video/mp4" size="720"/>
                                      <source src="{{url('web_stream/example_video/'.$get_video_ex->course_video)}}" type="video/mp4" size="1080"/>



                                  </video>
                                </div>
                                <div class="preview-course-content">


                                    <div class="preview-course-incentives">

                                        <p class="preview-course-incentives__title">หลักสูตรนี้รวมถึง</p>
                                        <ul class="preview-course-incentives__list">
                                            <li><span class="la la-play-circle-o"></span>{{$objs->time_course_text}} on-demand video</li>
                                            <li><span class="la la-file"></span>{{$objs->count_video}} Video</li>
                                            <li><span class="la la-key"></span>Full lifetime access</li>
                                            <li><span class="la la-television"></span>Access on mobile and TV</li>
                                            <li><span class="la la-certificate"></span>Certificate of Completion</li>
                                        </ul>
                                    </div><!-- end preview-course-incentives -->
                                </div><!-- end preview-course-content -->
                            </div><!-- end preview-video-and-details -->
                        </div><!-- end sidebar-widget -->

                        <div class="sidebar-widget recent-widget">
                            <h3 class="widget__title">ครูผู้สอน</h3>
                            <span class="section__divider"></span>

                            <div class="testimonial-item">
                        <div class="testimonial__name">
                            <img src="{{url('assets/images/teachers/'.$objs->te_image)}}" alt="small-avatar">
                            <h3 class="testimonial__name-title">{{$objs->te_name}}</h3>
                            <span class="testimonial__name-meta">{{$objs->name_department}}</span>

                        </div><!-- end testimonial__name -->
                        <div class="testimonial__desc">
                            <p class="testimonial__desc-desc">
                                {{$objs->te_about}}
                            </p>
                        </div>

                        <div class="testimonial__desc">
                            <p class="testimonial__desc-desc">
                                {!! $objs->te_exper !!}
                            </p>
                        </div><!-- end testimonial__desc te_exper -->
                    </div>

                        </div><!-- end sidebar-widget -->


                    <!--    <div class="sidebar-widget sidebar-feature">
                            <h3 class="widget__title">Course Features</h3>
                            <span class="section__divider"></span>
                            <ul class="widget__list">
                                <li>
                                    <span class="la la-clock-o course-feature__icon"></span>Duration
                                    <span class="course-feature__meta">2.5 hours</span>
                                </li>
                                <li>
                                    <span class="la la-play-circle-o course-feature__icon"></span>Lectures
                                    <span class="course-feature__meta">17</span></li>
                                <li>
                                    <span class="la la-puzzle-piece course-feature__icon"></span>Quizzes
                                    <span class="course-feature__meta">26</span>
                                </li>
                                <li>
                                    <span class="la la-eye course-feature__icon"></span>Preview Lessons
                                    <span class="course-feature__meta">4</span>
                                </li>
                                <li>
                                    <span class="la la-language course-feature__icon"></span>Language
                                    <span class="course-feature__meta">English</span>
                                </li>
                                <li>
                                    <span class="la la-level-up course-feature__icon"></span>Skill level
                                    <span class="course-feature__meta">All levels</span>
                                </li>
                                <li>
                                    <span class="la la-users course-feature__icon"></span>Students
                                    <span class="course-feature__meta">585</span>
                                </li>
                                <li>
                                    <span class="la la-certificate course-feature__icon"></span>Certificate
                                    <span class="course-feature__meta">Yes</span>
                                </li>
                            </ul>
                        </div><!-- end sidebar-widget -->










                        <div class="sidebar-widget tag-widget">
                            <h3 class="widget__title">Course Tags</h3>
                            <span class="section__divider"></span>
                            <ul class="widget__list">
                              @for ($i = 0 ; $i <  $count_tags ; $i++)
                                <li><a href="#">{{$man[$i]}}</a></li>
                                @endfor
                            </ul>
                        </div><!-- end sidebar-widget -->
                        <div class="sidebar-widget social-widget">
                            <h3 class="widget__title">Share with</h3>
                            <span class="section__divider"></span>
                            <ul class="social__links">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div><!-- end sidebar-widget -->
                    </div><!-- end sidebar -->
                </div><!-- end sidebar-component -->
            </div><!-- end col-lg-4 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end course-detail -->
<!--======================================
        END COURSE DETAIL
======================================-->




@endsection

@section('scripts')



@stop('scripts')