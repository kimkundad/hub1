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

                    <h2 class="breadcrumb__title" style="font-size: 40px;">{{$objs->title_blog}}</h2>

                </div><!-- end breadcrumb-content -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end breadcrumb-area -->
<!-- ================================
    END BREADCRUMB AREA
================================= -->



<!--======================================
        START BLOG AREA
======================================-->
<section class="blog-area4">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-lg-8 col-sm-12">
                <div class="blog-content-wrap">
                    <div class="blog-item">
                        <div class="blog-img-box">
                            <img src="{{url('assets/blog/'.$objs->image)}}" alt="">
                            <span class="blog__date">{{DateThai($objs->created_at)}}</span>
                        </div>
                        <div class="blog-content">
                            <h3 class="blog__title">{{$objs->title_blog}}</h3>
                            <ul class="blog__list">
                                <li><span class="la la-user"></span>By <a href="#">administrator </a></li>
                                <li><span class="la la-tags"></span>


                                    @for ($i = 0 ; $i <  $count_tags ; $i++)
                                      <a href="#">{{$man[$i]}}</a>
                                      @endfor


                                </li>
                                <li><span class="la la-heart-o"></span>{{$objs->view}} View</li>
                            </ul>

                            <div>
                              {!! $objs->detail_blog_website !!}
                            </div>



                            <div class="tags-item">
                                <ul class="tag__list">
                                    <li><span>Tags:</span></li>
                                    @for ($i = 0 ; $i <  $count_tags ; $i++)
                                      <li><a href="#">{{$man[$i]}}</a></li>
                                      @endfor
                                </ul>
                                <ul class="social__links">
                                    <li><span>Share:</span></li>
                                  <!--  <li><a href="#"><i class="fa fa-facebook"></i></a></li> -->
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div><!-- end tags-item -->
                        </div><!-- end blog-content -->






                    </div><!-- end blog-post-item -->
                </div><!-- end blog-post-wrapper -->
            </div><!-- end col-md-8-->


        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end blog-area -->
<!--======================================
        END BLOG AREA
======================================-->



@endsection

@section('scripts')



@stop('scripts')
