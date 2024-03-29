@extends('admin.layouts.template')
@section('admin.content')

				<section role="main" class="content-body">

					<header class="page-header">
						<h2>แก้ไข Package รายเดือน</h2>

						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="dashboard.html">
										<i class="fa fa-home"></i>
									</a>
								</li>

								<li><span>แก้ไข Package รายเดือน</span></li>
							</ol>

							<a class="sidebar-right-toggle" data-open="sidebar-right" ><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>


					<!-- start: page -->




							<div class="row">
							<div class="col-md-2 col-lg-2">




							</div>







              <div class="col-md-8 col-lg-8">

							<div class="tabs">

								<div class="tab-content">

									<div id="edit" class="tab-pane active">

                    @if (count($errors) > 0)
                    <br>
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

										<form class="form-horizontal" action="{{$url}}" method="post" enctype="multipart/form-data">
                      {{ method_field($method) }}
											{{ csrf_field() }}

											<h4 class="mb-xlg">แก้ไขหมวดหมู่ภาควิชา</h4>

											<fieldset>
                        <div class="form-group">
													<label class="col-md-3 control-label" for="profileFirstName">ชื่อ Package*</label>
													<div class="col-md-8">
														<input type="text" class="form-control" name="package_name" value="{{ $objs->package_name }}" >
														</div>
												</div>

                        <div class="form-group">
													<label class="col-md-3 control-label" for="profileAddress">ภาควิชา*</label>
													<div class="col-md-8">
														<select name="department_id" class="form-control mb-md" >

								                      <option value="">-- เลือกภาควิชา --</option>
								                      @foreach($department as $departments)
													  <option value="{{$departments->id}}"
                              @if($departments->id == $objs->department_id)
                              selected='selected'
                              @endif
                              >{{$departments->name_department}}</option>
													  @endforeach
								                    </select>
													</div>
												</div>

                        <div class="form-group">
													<label class="col-md-3 control-label" for="profileAddress">ปิดใช้งาน / เปิดใช้งาน*</label>
													<div class="col-md-8">
														<select name="package_status" class="form-control mb-md" >

								                      <option value="0" @if($objs->package_status == 0)
                                      selected='selected'
                                      @endif>-- ปิดใช้งาน  --</option>
                                      <option value="1" @if($objs->package_status == 1)
                                      selected='selected'
                                      @endif>-- เปิดใช้งาน  --</option>


								                    </select>
													</div>
												</div>

                        <div class="form-group">
													<label class="col-md-3 control-label" for="profileAddress">จำนวนวัยของ Package*</label>
													<div class="col-md-8">
														<select name="package_day" class="form-control mb-md" required>

								                      <option value="60" @if($objs->package_day == 60)
                                      selected='selected'
                                      @endif>-- ทดลองเรียนฟรี  --</option>

                                      <option value="30" @if($objs->package_day == 30)
                                      selected='selected'
                                      @endif>-- 30 วัน / 1 เดือน  --</option>


                                      <option value="90" @if($objs->package_day == 90)
                                      selected='selected'
                                      @endif>-- 90 วัน / 3 เดือน  --</option>
                                      <option value="120" @if($objs->package_day == 120)
                                      selected='selected'
                                      @endif>-- 120 วัน / 4 เดือน  --</option>
                                      <option value="180" @if($objs->package_day == 180)
                                      selected='selected'
                                      @endif>-- 180 วัน / 6 เดือน  --</option>
                                      <option value="365" @if($objs->package_day == 365)
                                      selected='selected'
                                      @endif>-- 1 ปี  --</option>
								                    </select>
													</div>
												</div>

                        <div class="form-group">
													<label class="col-md-3 control-label" for="profileFirstName">ราคา Package*</label>
													<div class="col-md-8">
														<input type="text" class="form-control" name="package_price" value="{{ $objs->package_price }}" >
														</div>
												</div>

                        <div class="form-group">
													<label class="col-md-3 control-label" for="profileFirstName">Package ลำดับ (ใส่ตัวเลขเพื่อเรียงลำดับการแสดง)*</label>
													<div class="col-md-8">
														<input type="number" class="form-control" name="package_sort" value="{{ $objs->package_sort }}" >
														</div>
												</div>


												<div class="form-group">
													<label class="col-md-3 control-label" for="profileFirstName">รายละเอียด Package*</label>
													<div class="col-md-8">
														<textarea class="form-control" name="package_detail"  rows="4">{{ $objs->package_detail }}</textarea>
														</div>
												</div>


                        <div class="form-group">
													<label class="col-md-3 control-label" for="profileFirstName">รูปภาพ</label>
													<div class="col-md-8">
														<img src="{{url('assets/image/package/'.$objs->package_image)}}" class="img-responsive" />
														</div>
												</div>





												<div class="form-group">
                          <label class="col-md-3 control-label" for="exampleInputEmail1">รูป Package*</label>
                          <div class="col-md-8">

                          <div class="fileupload fileupload-new" data-provides="fileupload">
        														<div class="input-append">
        															<div class="uneditable-input">
        																<i class="fa fa-file fileupload-exists"></i>
        																<span class="fileupload-preview"></span>
        															</div>
        															<span class="btn btn-default btn-file">
        																<span class="fileupload-exists">Change</span>
        																<span class="fileupload-new">Select file</span>
        																<input type="file" name="image">
        															</span>
        															<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
        														</div>
        													</div>
                                  </div>
                        </div>





											</fieldset>







											<div class="panel-footer">
												<div class="row">
													<div class="col-md-9 col-md-offset-3">
														<button type="submit" class="btn btn-primary">บันทึก</button>
														<a href="{{url('admin/package_product/')}}" class="btn btn-default">ยกเลิก</a>
                            <a href="{{url('admin/package_product/'.$objs->id.'/del')}}" class="btn btn-danger">ลบข้อมูล</a>
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

@stop('scripts')
