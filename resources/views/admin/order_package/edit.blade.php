@extends('admin.layouts.template')

@section('admin.stylesheet')
<link href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
@stop('admin.stylesheet')
<style>
.form-group {
    margin-bottom: 10px;
}
</style>
@section('admin.content')



<?php
function DateThaif($strDate)
{
$strYear = date("Y",strtotime($strDate))+543;
$strMonth= date("n",strtotime($strDate));
$strDay= date("j",strtotime($strDate));
$strHour= date("H",strtotime($strDate));
$strMinute= date("i",strtotime($strDate));
$strSeconds= date("s",strtotime($strDate));
$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
$strMonthThai=$strMonthCut[$strMonth];
return "$strDay $strMonthThai";
}
 ?>



				<section role="main" class="content-body">

					<header class="page-header">
						<h2>{{$datahead}}</h2>

						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="dashboard.html">
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
							<div class="col-md-2 col-lg-3">
                <img class="img-responsive" src="{{url('assets/image/package/'.$courseinfo->package_image)}}" alt="{{$courseinfo->package_name}}" style="width:250px;">
							</div>







              <div class="col-md-8 col-lg-8">

							<div class="tabs">

								<div class="tab-content">

									<div id="edit" class="tab-pane active">




											<h4 class="mb-xlg">{{$courseinfo->package_name}} / {{$courseinfo->package_day}} วัน / ราคา {{$courseinfo->package_price}}</h4>


											<div class="table-responsive">
                      <table class="table table-striped" style="font-size: 14px;">
                        <tr>
                          <td>Order ID</td>
                          <td>{{$courseinfo->Oid}}</td>
                        </tr>
                        <tr>
                          <td>นักเรียน</td>
                          <td>{{$courseinfo->name}}</td>
                        </tr>
                        <tr>
                          <td>สถานะ</td>
                          <td>@if($courseinfo->his_status == 0)
                                <b class="text-danger">ยังไม่อนุมัติ</b>
                              @else
                              <b class="text-success">อนุมัติแล้ว</b>
                              @endif
                          </td>
                        </tr>
                        <tr>
                          <td>ยอดเงินที่โอน</td>
                          <td>{{$courseinfo->money_tran}}</td>
                        </tr>


                        <tr>
                          <td>ที่อยู่จัดส่งเอกสาร</td>
                          <td>{{$courseinfo->address}}</td>
                        </tr>
                        <tr>
                          <td>โอนมายังธนาคาร</td>
                          <td>{{$courseinfo->bank_name}}</td>
                        </tr>
                        <tr>
                          <td>โอนมาวันที่</td>
                          <td>{{$courseinfo->date_tran}} {{$courseinfo->time_tran}}</td>
                        </tr>




                        <tr>
                          <td>เอกสารการโอนเงิน</td>
                          <td>
                            @if($courseinfo->slip_img != null)
                            <img src="{{url('assets/bill/'.$courseinfo->slip_img)}}" class="img-responsive" />
                            @endif
                          </td>
                        </tr>


                      </table>
                      </div>

                      <br><br>






                      <form id="newsForm" class="form-horizontal" action="{{url('admin/update_order_package')}}" method="post" enctype="multipart/form-data">

                            {{ csrf_field() }}
                            <input type="hidden" class="form-control" name="id"  value="{{$courseinfo->Oid}}" >




                            <div class="form-group">
                              <label class="col-md-3 control-label" for="profileFirstName">จำนวนวัน ระบบจะเพิ่มให้*</label>
                                  <div class="col-md-8">
                                      <input type="text" class="form-control" name="package_day" value="{{$courseinfo->package_day}}">
                                </div>
                            </div>

                            <div class="form-group">
    													<label class="col-md-3 control-label" for="profileAddress">สถานะ*</label>
    													<div class="col-md-8">
    														<select name="status" class="form-control mb-md" required>

    								                      <option value="">-- เลือกสถานะ --</option>
                                          <option value="0" @if( $courseinfo->his_status == 0)
                                            selected='selected'
                                            @endif>ยังไม่อนุมัติ</option>
                                          <option value="1" @if( $courseinfo->his_status == 1)
                                            selected='selected'
                                            @endif>อนุมัติแล้ว</option>
    								                    </select>
    																					</div>
    																				</div>
                            <div class="panel-footer">
      												<div class="row">
      													<div class="col-md-9 col-md-offset-4">
      														<button type="submit" class="btn btn-primary">ยืนยันข้อมูล</button>
      														<a href="{{url('admin/order_package')}}" class="btn btn-default">ยกเลิก</a>
      													</div>
      												</div>
      											</div>
                        </form>













									</div>
								</div>
							</div>
						</div>











						</div>










</section>
@stop


@section('scripts')
<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js" type="text/javascript"></script>

<script>

socket.on( 'new_count_message', function( data ) {

$( "#new_count_message" ).html( data.new_count_message );
  console.log(data.new_count_message);
});

socket.on( 'new_message', function( data ) {
  console.log(data.message_in);
  if(data.check_noti === 0 ){
    if(data.provider === 'email'){
      $( "#messages_noti" ).append('<li><a href="{{url('admin/inbox_chat/')}}/'+ data.chat_user_id +'" class="clearfix"><figure class="image"><img src="{{url('assets/images/avatar/')}}/'+data.avatar+'" width="35" height="35" class="img-circle"></figure><span class="title">'+ data.name +'</span><span class="message">มีข้อความมาใหม่ถึงคุณ</span></a></li>');
    }else{
      $( "#messages_noti" ).append('<li><a href="{{url('admin/inbox_chat/')}}/'+ data.chat_user_id +'" class="clearfix"><figure class="image"><img src="//'+data.avatar+'" width="35" height="35" class="img-circle"></figure><span class="title">'+ data.name +'</span><span class="message">มีข้อความมาใหม่ถึงคุณ</span></a></li>');
    }
  }
  console.log(data.check_noti);
  $("#messages_show").scrollTop($("#messages_show")[0].scrollHeight);
  $('#notif_audio')[0].play();
});

</script>
<script>
$.fn.datepicker.defaults.format = "yyyy-mm-dd";
</script>




@stop('admin.scripts')
