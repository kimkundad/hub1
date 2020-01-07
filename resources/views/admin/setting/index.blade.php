@extends('admin.layouts.template')
@section('admin.content')

        <section role="main" class="content-body">

          <header class="page-header">
            <h2>ตั้งค่าเว็บไซต์</h2>

            <div class="right-wrapper pull-right">
              <ol class="breadcrumbs">
                <li>
                  <a href="dashboard.html">
                    <i class="fa fa-home"></i>
                  </a>
                </li>

                <li><span></span></li>
              </ol>

              <a class="sidebar-right-toggle" data-open="sidebar-right" ><i class="fa fa-chevron-left"></i></a>
            </div>
          </header>


          <!-- start: page -->



<div class="row">
              <div class="row">
              <div class="col-xs-12">

            <section class="panel">
              <header class="panel-heading">
                <div class="panel-actions">
                  <a href="#"  class="panel-action panel-action-toggle" data-panel-toggle></a>

                </div>

                <h2 class="panel-title">ตั้งค่าเว็บไซต์</h2>
              </header>
              <div class="panel-body">

                <div class="row">

                  <form action="{{ url('admin/post_setting') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}


                  <div class="col-md-6">

                    <div class="form-group">
                      <label for="exampleInputEmail1">youtube หน้าแรก</label>
                      <input type="text" class="form-control" name="youyube_index"  value="{{ $objs->youyube_index }}" >

                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Email website</label>
                      <input type="text" class="form-control" name="email"  value="{{ $objs->email }}" >

                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Phone number website</label>
                      <input type="text" class="form-control" name="phone"  value="{{ $objs->phone }}" >

                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Address website</label>
                      <input type="text" class="form-control" name="address"  value="{{ $objs->address }}" >

                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">เวลาติดต่อ</label>
                      <input type="text" class="form-control" name="time_open"  value="{{ $objs->time_open }}" >

                    </div>


                    <div class="form-group">
                      <label for="exampleInputEmail1">line</label>
                      <input type="text" class="form-control" name="line"  value="{{ $objs->line }}" >

                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">line_url</label>
                      <input type="text" class="form-control" name="line_url"  value="{{ $objs->line_url }}" >

                    </div>


                  </div>

                  <div class="col-md-6">

                    <div class="form-group">
                      <label for="exampleInputEmail1">facebook</label>
                      <input type="text" class="form-control" name="facebook"  value="{{ $objs->facebook }}" >

                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">IG</label>
                      <input type="text" class="form-control" name="ig"  value="{{ $objs->ig }}" >

                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">title_website</label>
                      <input type="text" class="form-control" name="title_website"  value="{{ $objs->title_website }}" >

                    </div>


                    <div class="form-group">
                      <label for="exampleInputEmail1">google_analytics</label>
                      <textarea class="form-control" name="google_analytics" rows="4" >{{$objs->google_analytics}}</textarea>
                    </div>



                  </div>

                  <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-default pull-right">อัพเดทข้อมูล</button>
                  </div>


                </form>






                </div>

                <br>

              </div>
            </section>

              </div>
            </div>
        </div>
</section>
@stop



@section('scripts')



@if ($message = Session::get('edit_success'))
<script type="text/javascript">

  var stack_topleft = {"dir1": "down", "dir2": "right", "push": "top"};
      var notice = new PNotify({
            title: 'ทำการอัพเดทข้อมูลสำเร็จ',
            text: '{{$message}}',
            type: 'success',
            addclass: 'stack-topright'
          });
</script>
@endif



@stop('scripts')
