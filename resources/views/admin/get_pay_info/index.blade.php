@extends('admin.layouts.template')
@section('admin.content')






        <section role="main" class="content-body">

          <header class="page-header">
            <h2>{{$datahead}}</h2>

            <div class="right-wrapper pull-right">
              <ol class="breadcrumbs">
                <li>
                  <a href="{{url('admin/dashboard')}}">
                    <i class="fa fa-home"></i>
                  </a>
                </li>

                <li><span>{{$datahead}}</span></li>
              </ol>

              <a class="sidebar-right-toggle" data-open="sidebar-right" ><i class="fa fa-chevron-left"></i></a>
            </div>
          </header>


          <!-- start: page -->



<div class="row">
              <div class="row">
              <div class="col-xs-12">

            <section class="panel">



              <div class="panel-body">




                <table class="table table-responsive-lg table-striped table-sm mb-0" id="datatable-default">
                  <thead>
                    <tr>
                      <th>Order ID</th>
                      <th>ชื่อ-นามสกุล</th>
                      <th>
                        เบอร์ติดต่อ
                      </th>
                      <th>ธนาคาร</th>
                      <th>จำนวนเงิน</th>
                      <th>วัน-เวลา</th>
                      <th>สถานะ</th>
                      <th>จัดการ</th>
                    </tr>
                  </thead>
                  <tbody>
             @if($objs)
                @foreach($objs as $u)
                    <tr id="{{$u->ids}}">
                      <td>#{{$u->order_id}}</td>
                      <td>{{$u->name}}</td>
                      <td>{{$u->phone}}</td>
                      <td>{{$u->bank_name}}</td>
                      <td>{{$u->money}}</td>
                      <th>{{$u->time_tran}}</th>


                      <td>
                        <div class="switch switch-sm switch-success">
                          <input type="checkbox" name="switch" data-plugin-ios-switch
                          @if($u->pay_status == 1)
                          checked="checked"
                          @endif
                          />
                        </div>
                      </td>

                      <td>
                        <a class="btn btn-default " data-toggle="modal" data-target="#myModal-{{$u->ids}}" >ดูข้อมูล</a>

                        <!-- Modal -->
                        <div class="modal fade" id="myModal-{{$u->ids}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">แจ้แจ้งชำระโอน : {{$u->name}}</h4>
                              </div>
                              <div class="modal-body">
                                <fieldset>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">ชื่อ-นามสกุล</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="name" value="{{$u->name}}">
          														</div>
          												</div>
                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">อีเมล</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="email" value="{{$u->email}}">
          														</div>
          												</div>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">จำนวนเงิน</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="money" value="{{$u->money}}">
          														</div>
          												</div>


                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">ธนาคาร</label>
          													<div class="col-md-8">
                                      <select name="bank" class="form-control mb-md" required>
                                        @if(isset($bank))
                                        @foreach($bank as $j)
                                        <option value="{{$j->id}}" @if( $j->id == $u->bank)
                                        selected='selected'
                                        @endif>{{$j->bank_name}}</option>
                                        @endforeach
  								                      @endif
  								                    </select>
          														</div>
          												</div>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">วัน-เวลา</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="time_tran" value="{{$u->time_tran}}">
          														</div>
          												</div>





                                  @if($u->image_tran != null)
                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">หลักฐานการโอนเงิน</label>
          													<div class="col-md-8">
          														<img src="{{url('assets/image/slip/'.$u->image_tran)}}" class="img-responsive" style="width:70%">
          														</div>
          												</div>
                                  @endif








          											</fieldset>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                                <a href="{{url('admin/order_package/'.$u->order_id.'/edit')}}" class="btn btn-primary">ไปที่ Order</a>
                              </div>
                            </div>
                          </div>
                        </div>

                      </td>
                    </tr>
                 @endforeach
              @endif

                  </tbody>
                </table>
              </div>
            </section>

              </div>
            </div>
        </div>
</section>
@stop



@section('scripts')
<script src="{{asset('/assets/javascripts/tables/examples.datatables.default.js')}}"></script>


<script type="text/javascript">
$(document).ready(function(){
  $("input:checkbox").change(function() {
    var user_id = $(this).closest('tr').attr('id');

    $.ajax({
            type:'POST',
            url:'{{url('api/api_pay_status')}}',
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            data: { "user_id" : user_id },
            success: function(data){
              if(data.data.success){


                var stack_topleft = {"dir1": "down", "dir2": "right", "push": "top"};
                      var notice = new PNotify({
                            title: 'ทำรายการสำเร็จ',
                            text: 'คุณเปลี่ยนการแสดงผล สำเร็จเรียบร้อยแล้วค่ะ',
                            type: 'success',
                            addclass: 'stack-topright'
                          });



              }
            }
        });
    });
});
</script>

@if ($message = Session::get('add_success'))
<script type="text/javascript">

  var stack_topleft = {"dir1": "down", "dir2": "right", "push": "top"};
      var notice = new PNotify({
            title: 'ทำรายการสำเร็จ',
            text: 'ยินดีด้วย ได้ทำการเพิ่มข้อมูล สำเร็จเรียบร้อยแล้วค่ะ',
            type: 'success',
            addclass: 'stack-topright'
          });
</script>
@endif

@if ($message = Session::get('edit_success'))
<script type="text/javascript">

  var stack_topleft = {"dir1": "down", "dir2": "right", "push": "top"};
      var notice = new PNotify({
            title: 'ทำรายการสำเร็จ',
            text: 'ยินดีด้วย ได้ทำการแก้ไขข้อมูล สำเร็จเรียบร้อยแล้วค่ะ',
            type: 'success',
            addclass: 'stack-topright'
          });
</script>
@endif


@if ($message = Session::get('delete'))
<script type="text/javascript">


    var stack_topleft = {"dir1": "down", "dir2": "right", "push": "top"};
        var notice = new PNotify({
              title: 'ทำรายการสำเร็จ',
              text: 'ยินดีด้วย ได้ทำการลบข้อมูล สำเร็จเรียบร้อยแล้วค่ะ',
              type: 'success',
              addclass: 'stack-topright'
            });
</script>
@endif

@stop('scripts')
