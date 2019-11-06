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

                    <h2 class="breadcrumb__title">บทความ</h2>
                  <div class="text-outline">บทความ</div>
                </div><!-- end breadcrumb-content -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end breadcrumb-area -->
<!-- ================================
    END BREADCRUMB AREA
================================= -->




<!-- ================================
       START BLOG AREA
================================= -->
<section class="blog-area blog-area3">
    <div class="container">
        <div class="row blog-post-wrapper">

          @if(isset($objs))
          @foreach($objs as $u)
            <div class="col-lg-4 blog-post-item">
                <div class="blog-post-img">
                    <img src="assets/blog/{{$u->image}}" alt="{{$u->title_blog}}" class="blog__img">
                    <div class="blog__date">
                        <span>{{DateThai($u->created_at)}}</span>
                    </div><!-- end blog__date -->
                </div><!-- end blog-post-img -->
                <div class="post-body">
                    <div class="blog-title">
                        <a href="{{url('blog/'.$u->id)}}" class="blog__title">
                            {{$u->title_blog}}
                        </a>
                    </div>
                    <ul class="blog__panel d-flex align-items-center">
                        <li>By<a href="{{url('blog/'.$u->id)}}" class="blog-admin-name">Admin</a></li>

                        <li><span class="blog__panel-likes">{{$u->view}} View</span></li>
                    </ul>
                </div><!-- end post-body -->
            </div><!-- end blog-post-item -->
            @endforeach
            @endif


        </div><!-- end row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="pagination-wrap">
                    <nav aria-label="Page navigation">
                        {{ $objs->links() }}
                    </nav>
                </div><!-- end pagination-wrap -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end blog-area -->
<!-- ================================
       START BLOG AREA
================================= -->


@endsection

@section('scripts')



@stop('scripts')
