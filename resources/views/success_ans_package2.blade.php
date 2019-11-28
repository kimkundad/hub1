@extends('layouts.template')
@section('stylesheet')

<style>
.sidebar .sidebar-widget .widget__list li a:hover {
    color: #2196f3;
}
.sidebar .sidebar-widget .widget__list li:hover:after {
    background-color: #2196f3;
    border-color: #2196f3;
}
</style>


@stop('stylesheet')
@section('content')



<hr />



<section class="team-detail-area" style="padding-top: 20px;">
    <div class="container">

      <div class="row justify-content-md-center">
        <div class="col-lg-10">
        <div class="row">
            <div class="col-lg-3">

              <div class="sidebar" id="kimkundad">

                <div class="sidebar-widget sidebar-feature" style="padding: 15px;">

                  <h3 class="widget__title" style="font-size: 1rem; margin-bottom:15px;">หมวดหมู่</h3>

                  <ul class="widget__list" style="font-size: 0.9rem;">
                              <li><a href="{{ url('examination') }}" >ข้อสอบทั้งหมด</a></li>
                              @if((get_menu()))
                                @foreach(get_menu() as $u)
                                <li><a href="{{ url('examination_list/'.$u->id) }}">{{$u->name_department}}</a></li>
                                @endforeach
                              @endif
                            </ul>


                        </div>

              </div><br />



            </div><!-- end col-lg-4 -->


<style>
.active{
  color: #007bff !important;
  font-weight: 700 !important;
}
.blog-post-img{
  border: 1px solid rgba(127, 136, 151, 0.2);
  padding: 7px;
}
.te{
  font-size: 12px;
  font-weight: 600;
}
.table td, .table th {
    font-size: 13px;
}
.team-detail-area .team-single-content {
    padding-left: 0px;
}
</style>


            <div class="col-lg-9">
                <div class="team-single-content">



                  <h3 class="instructor-all-course__title " style="font-size: 1.1rem; "> แบบฝึกหัด : {{$course_detail->examples_name}}</h3>
                  <br />
                  ทำเวลาในการทำข้อสอบ : <button class="btn btn-outline-danger"><span id="timestamp">{{$course_tech_get->time_ans}} / นาที</span></button>
                  <br /><br />
                  ทำคะแนนรวมได้ : <button class="btn btn-outline-success"><span id="timestamp">{{$course_tech_count}} / {{$course_tech_count_all}} คะแนน</span></button>
                  <input type="hidden" name="timmery_time" value="" id="timestamp2">

                  <br /><br />

                  <div class="main-title">
                 <h6>ดูข้อสอบที่ทำล่าสุดตอนนี้</h6>
               </div>
               <hr />


          <div class="row">


            <div class="col-md-12">


              @if($course_tech)
                   @foreach($course_tech as $u)

             <label for="e3">{{$u->name_questions}}
               @if( $u->ans_status == 1)
                 <span class="text-success"> (ตอบถูก)</span>
                 @else
                 <span class="text-danger"> (ผิด)</span>
                 @endif
             </label>

             @if(isset($u->options))
             @foreach($u->options as $uu)
             <div class="custom-control custom-checkbox">
                <input readonly type="checkbox" class="custom-control-input" id="customCheck1" @if( $u->answers == $uu->id_option)
                  checked='checked'
                  @endif readonly>
                <label class="custom-control-label" for="customCheck1">{{$uu->name_option}}</label>
             </div>
             @endforeach
             @endif


             <hr />
                  @endforeach
             @endif





            </div>


            <div class="col-md-12 text-center">
              <a href="{{url('examination/')}}" class="btn btn-danger border-none"> กลับไปยังคลังข้อสอบ </a>
              <a href="{{url('examination_test/'.$course_detail->Eid)}}" class="btn btn-success border-none">  ทำแบบฝึกหัดอีกครั้ง </a>
            </div>

            </div>








                </div><!-- end team-single-content -->
            </div><!-- end col-lg-8 -->















        </div><!-- end row -->

      </div><!-- end col-lg-10 -->
          </div><!-- end row -->










    </div><!-- end container -->
</section>





@endsection

@section('scripts')



@stop('scripts')
