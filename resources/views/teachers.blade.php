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
                    <h2 class="breadcrumb__title">รายชื่ออาจารย์ผู้สอน</h2>

                </div><!-- end breadcrumb-content -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end breadcrumb-area -->
<!-- ================================
    END BREADCRUMB AREA
================================= -->


<!--======================================
        START SPEAKER AREA
======================================-->
<section class="speaker-area instructor-area">
    <div class="container">
        <div class="row speaker-content-wrap">

          @if(isset($objs))
            @foreach($objs as $u)
            <div class="col-lg-3">
                <div class="speaker-item speaker-item1">
                    <div class="speaker-img-box">
                        <img src="{{url('assets/images/teachers/'.$u->te_image)}}" alt="{{$u->te_name}}">
                        <ul class="speaker__profile">
                            <li><a href="{{$u->te_twitter}}"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="{{$u->te_facebook}}"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="{{$u->te_ig}}"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                    <div class="speaker-detail">
                        <div class="speaker-title-box">
                            <h3 class="speaker__title"><a href="teacher-detail.html">{{$u->te_name}}</a></h3>
                            <p class="speaker__meta">อาจารย์</p>
                            <p class="speaker__text">
                                {{$u->te_about}}
                            </p>
                            <a href="{{url('teacher/'.$u->id)}}" class="speaker__link">ดูข้อมูล</a>
                        </div>
                    </div>
                </div><!-- end speaker-item -->
            </div><!-- end col-lg-4 -->
            @endforeach
            @endif


        </div><!-- end row -->
        <div class="row">
            <div class="col-lg-12">

            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end speaker-area -->
<!--======================================
        END SPEAKER AREA
======================================-->

@endsection

@section('scripts')

@stop('scripts')
