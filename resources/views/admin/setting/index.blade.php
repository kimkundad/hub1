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





                  <div class="col-md-6">


                  </div>

                  <div class="col-md-6">


                  </div>






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



@if ($message = Session::get('success_file_del'))
<script type="text/javascript">

  var stack_topleft = {"dir1": "down", "dir2": "right", "push": "top"};
      var notice = new PNotify({
            title: 'ทำรายการสำเร็จ',
            text: '{{$message}}',
            type: 'success',
            addclass: 'stack-topright'
          });
</script>
@endif



@stop('scripts')
