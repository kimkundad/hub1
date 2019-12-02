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
                                <li><a @if($u->id == $id) class="active" @endif href="{{ url('examination_list/'.$u->id) }}">{{$u->name_department}}</a></li>
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



                  <h3 class="instructor-all-course__title " style="font-size: 1.25rem; ">คลังข้อสอบ</h3>
                  <br />


          <div class="row">


            <div class="col-md-12">

              <div class="table-responsive">
                  <table class="table">
                    <thead>
                        <tr>
                          <th scope="col">#รหัส</th>
                          <th scope="col">ข้อสอบ</th>

                          <th scope="col">จำนวนข้อ</th>
                          <th scope="col">ผู้เข้าชม	</th>
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>

                        @if(isset($objs))
                          @foreach($objs as $u)
                          <tr>
                            <td scope="row"><a href="{{ url('examination_test/'.$u->e_id) }}">{{$u->code_course}}</a></td>
                            <td><a href="{{ url('examination_test/'.$u->e_id) }}">{{$u->examples_name}}</a></td>
                            <td>{{$u->options}}</td>

                            <td>{{$u->view}}</td>

                            @if (Auth::guest())
                            <td><a href="#" class="photo_f btn btn-primary btn-sm">เริ่มทำข้อสอบ</a></td>

                            @else
                            <td><a href="{{ url('examination_test/'.$u->e_id) }}" class="btn btn-primary btn-sm">เริ่มทำข้อสอบ</a></td>

                            @endif
                          </tr>
                          @endforeach
                        @endif



                        </tbody>
                  </table>

                  <div class="pagination"> {{ $objs->links() }} </div>
                </div>

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

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
$('.photo_f').on('click', function () {

swal("การทำแบบฝึกหัด นักเรียน ต้องทำการ login เข้าสู่ระบบก่อน")

});
</script>

@stop('scripts')
