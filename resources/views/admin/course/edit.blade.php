@extends('admin.layouts.template')

@section('admin.stylesheet')
<link href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{asset('./assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css')}}">
@stop('admin.stylesheet')

@section('admin.content')
<style>

</style>
				<section role="main" class="content-body">

					<header class="page-header">
						<h2>{{$header}}</h2>

						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="dashboard.html">
										<i class="fa fa-home"></i>
									</a>
								</li>

								<li><span>{{$header}}</span></li>
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
                      <input type="hidden" class="form-control" name="id"  value="{{$courseinfo->id}}" >
											<h4 class="mb-xlg">แก้ไขข้อมูลคอร์ส</h4>

											<fieldset>




                        <div class="form-group">
													<label class="col-md-3 control-label" for="profileFirstName">ชื่อคอร์ส*</label>
													<div class="col-md-8">
														<input type="text" class="form-control" name="name" value="{{$courseinfo->title_course}}" placeholder="มินนะ โนะ นิฮงโกะ みんなの日本語 かんじ N5+N4">
													</div>
												</div>


												<div class="form-group">
													<label class="col-md-3 control-label" for="profileFirstName">ลำดับ (ใส่ไม่ใส่ก็ได้)</label>
													<div class="col-md-8">
														<input type="text" class="form-control" name="sort_corse" value="{{$courseinfo->sort_corse}}">
														</div>
												</div>


												<div class="form-group">
													<label class="col-md-3 control-label" for="profileAddress">การแสดงผลหน้าแรก*</label>
													<div class="col-md-8">
														<select name="index_status" class="form-control mb-md" required>
															  <option value="0" @if( $courseinfo->index_status == 0)
																	selected='selected'
																	@endif>-- ไม่แสดง --</option>
																  <option value="1" @if( $courseinfo->index_status == 1)
																		selected='selected'
																		@endif>-- แสดงหน้าแรก --</option>
								                    </select>
													</div>
												</div>

												<div class="form-group">
													<label class="col-md-3 control-label" for="profileAddress">ระบบคอร์ส เติมเงิน / รายเดือน*</label>
													<div class="col-md-8">
														<select name="set_type_c" class="form-control mb-md" required>
															  <option value="0" @if( $courseinfo->set_type_c == 0)
																	selected='selected'
																	@endif>-- เติมเงิน --</option>
																  <option value="1" @if( $courseinfo->set_type_c == 1)
																		selected='selected'
																		@endif>-- รายเดือน --</option>
								                    </select>
													</div>
												</div>





												<div class="form-group">
													<label class="col-md-3 control-label" for="profileAddress">หมวดหมู่หลัก*</label>
													<div class="col-md-8">
														<select name="name_department" onchange="getComboB(this)" id="shipping_optional" class="form-control mb-md" required>

								                      <option value="">-- หมวดหมู่หลัก --</option>
								                      @foreach($department as $departments)
													  <option value="{{$departments->id}}" data-value="{{$departments->id}}"  @if( $courseinfo->department_id == $departments->id)
                              selected='selected'
                              @endif>{{$departments->name_department}}</option>
													  @endforeach
								                    </select>
																					</div>
																				</div>




												<div class="form-group">
													<label class="col-md-3 control-label" for="profileAddress">หมวดหมู่รอง*</label>
													<div class="col-md-8">
														<select name="typecourses" id="targeted" class="form-control mb-md" required>

								                      <option value="{{$get_typecourses->id}}">{{$get_typecourses->name_sub_depart}}</option>

								                    </select>
																					</div>
																				</div>





																				<div class="form-group">
																					<label class="col-md-3 control-label" for="profileFirstName">เอกสารการเรียน</label>
																					<div class="col-md-8">
																						<input type="text" class="form-control" name="file_study" value="{{$courseinfo->file_study}}" placeholder="ข้อมูลเอกสารการเรียน">
																					</div>
																					</div>


																					<div class="form-group">
																						<label class="col-md-3 control-label" for="profileFirstName">อาจารย์ผู้สอน (ไม่ต้องใส่ก็ได้)</label>
																						<div class="col-md-8">

																							<select name="te_study"  class="form-control mb-md" required>

																	                      <option value="">-- เลือกอาจารย์ผู้สอน --</option>
																	                      @foreach($teacher as $tea)
																											  <option value="{{$tea->id}}" data-value="{{$tea->id}}" @if( $courseinfo->te_study == $tea->id)
														                              selected='selected'
														                              @endif>{{$tea->te_name}}</option>
																											  @endforeach
																	                    </select>
																						</div>
																					</div>

																				<div class="form-group">
									 											 <label class="col-md-3 control-label" for="profileFirstName">รหัสคอร์ส*</label>
									 													 <div class="col-md-8">
									 															 <input type="text" class="form-control" name="code_course" value="{{$courseinfo->code_course}}" placeholder="EN101">
									 												 </div>
									 										 </div>


                      <div class="form-group">
                        <label class="col-md-3 control-label" for="profileFirstName">ราคาคอร์ส* (ให้ใส่ราคาที่ลดแล้ว)</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="price" value="{{$courseinfo->price_course}}" placeholder="1500">
                          </div>
                      </div>


											<div class="form-group">
                        <label class="col-md-3 control-label" for="profileFirstName">ราคาส่วนลด* (ราคาจริง + ราคาส่วนลด หรือ ไม่ลดก็ใส่ 0 ไป)</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="discount" value="{{$courseinfo->discount}}" placeholder="1500">
                          </div>
                      </div>

											<div class="form-group">
                        <label class="col-md-3 control-label" for="profileFirstName">อัตราการสูญเสีย ดู video* (ไม่มีให้ใส่ 0)</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="del_video" value="{{$courseinfo->del_video}}" placeholder="1.75">
                          </div>
                      </div>

											<div class="form-group row">
												<label for="tags-input" class="col-lg-3 control-label text-lg-right pt-2">Input Tags</label>
												<div class="col-lg-8">
													<input name="tags" id="tags-input"  data-role="tagsinput" data-tag-class="badge badge-primary" class="form-control" value="{{$courseinfo->tags}}" />
													<p>
														กดเครื่องหมาย <code>" , "</code> เพื่อทำการเพิ่ม Tags
													</p>
												</div>
											</div>






                      <div class="form-group">
                        <label class="col-md-3 control-label" for="exampleInputEmail1">รูป คอร์ส*</label>
                        <div class="col-md-8">

                      <img src="{{url('assets/uploads/'.$courseinfo->image_course)}}" class="img-responsive">
                                </div>
                      </div>


                        <div class="form-group">
                          <label class="col-md-3 control-label" for="exampleInputEmail1">รูป คอร์ส*</label>
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





                        <div class="form-group">
													<label class="col-md-3 control-label" for="profileFirstName">รายละเอียดคอร์ส*</label>
													<div class="col-md-8">
                            <textarea class="form-control" name="detail" id="summernote" rows="8">{{$courseinfo->detail_course}}</textarea>
													</div>
												</div>


                    <!--    <div class="form-group">
													<label class="col-md-3 control-label" for="profileFirstName">วันเริ่มคอร์ส*</label>
													<div class="col-md-8">
                            <div class="input-group">
														<span class="input-group-addon">
															<i class="fa fa-calendar"></i>
														</span>
														<input type="text" data-plugin-datepicker="" name="start_course" value="{{$courseinfo->start_course}}" class="form-control">
													</div>
													</div>
												</div>


                        <div class="form-group">
													<label class="col-md-3 control-label" for="profileFirstName">วันสิ้นสุดคอร์ส*</label>
													<div class="col-md-8">
                            <div class="input-group">
														<span class="input-group-addon">
															<i class="fa fa-calendar"></i>
														</span>
														<input type="text" data-plugin-datepicker="" name="end_course" value="{{$courseinfo->end_course}}" class="form-control">
													</div>
													</div>
												</div> -->





												<div class="form-group">
	                        <label class="col-md-3 control-label" for="profileFirstName">เวลาที่ให้ (จำนวนวัน)</label>
	                            <div class="col-md-8">
																	<input type="text" class="form-control" name="time_course" value="{{ $courseinfo->time_course }}" placeholder="30">
	                          </div>
	                      </div>


												<div class="form-group">
	                        <label class="col-md-3 control-label" for="profileFirstName">ใส่เวลาทั้งหมดของคอร์สเรียน</label>
	                            <div class="col-md-8">
																	<input type="text" class="form-control" name="time_course_text" value="{{ $courseinfo->time_course_text }}" placeholder="3 hours 20 min หรือ คอร์ส มีอายุ 30 วัน">
	                          </div>
	                      </div>




											</fieldset>







											<div class="panel-footer">
												<div class="row">
													<div class="col-md-9 col-md-offset-3">
														<button type="submit" class="btn btn-primary">แก้ไขคอร์ส</button>
														<button type="reset" class="btn btn-default">Reset</button>
													</div>
												</div>
											</div>

										</form>

									</div>
								</div>
							</div>
						</div>



						</div>



						<div class="row">
						<div class="col-md-2 col-lg-2">
						</div>
						<div class="col-md-8 col-lg-8">
						<div class="tabs">
							<div class="tab-content">
								<h4 class="mb-xlg">รูป cover บน</h4>

								@if($courseinfo->image_cover != null)
								<img src="{{url('assets/uploads/'.$courseinfo->image_cover)}}" class="img-responsive">
								@endif
								<br><br>
								<form class="form-horizontal" name="cover_image" action="{{url('admin/add_cover_image')}}" method="post" enctype="multipart/form-data">
									{{ csrf_field() }}
									<input type="hidden" class="form-control" name="course_id"  value="{{$courseinfo->id}}" >

									<div class="form-group">
										<label class="col-md-3 control-label" for="exampleInputEmail1">รูป cover*</label>
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


									<div class="panel-footer">
										<div class="row">
											<div class="col-md-9 col-md-offset-3">
												<button type="submit" class="btn btn-primary">เพิ่มข้อมูล</button>
												<button type="reset" class="btn btn-default">Reset</button>
											</div>
										</div>
									</div>
								</form>
								</div>
					</div>
					</div>
					</div>






						<div class="row">
						<div class="col-md-2 col-lg-2">
						</div>
						<div class="col-md-8 col-lg-8">
						<div class="tabs">
							<div class="tab-content">
								<h4 class="mb-xlg">หัวข้อเนื้อหา video</h4>

								<form class="form-horizontal" action="{{url('admin/add_head_video')}}" method="post" enctype="multipart/form-data">
									{{ csrf_field() }}
									<input type="hidden" class="form-control" name="course_id"  value="{{$courseinfo->id}}" >

									<div class="form-group">
										<label class="col-md-3 control-label" for="profileFirstName">ชื่อหัวข้อ*</label>
												<div class="col-md-8">
														<input type="text" class="form-control" name="header_name" required>
											</div>
									</div>


									<div class="panel-footer">
										<div class="row">
											<div class="col-md-9 col-md-offset-3">
												<button type="submit" class="btn btn-primary">เพิ่มข้อมูล</button>
												<button type="reset" class="btn btn-default">Reset</button>
											</div>
										</div>
									</div>
								</form>
								</div>
					</div>
					</div>
					</div>




					<div class="row">
					<div class="col-md-2 col-lg-2">
					</div>

					<div class="col-md-8 col-lg-8">

					<div class="tabs">

						<div class="tab-content">
							<h4 class="mb-xlg">ตารางข้อมูล หัวข้อเนื้อหา video</h4>

							<div class="table-responsive">
									<table class="table table-striped mb-none">

										<tbody>
											@if($head_videos)
			               						 @foreach($head_videos as $u)
											<tr>

												<td>{{$u->head_name}}</td>
												<td>

													<a href="#" data-toggle="modal" data-target="#myModal-{{$u->id}}" class="mb-1 mt-1 mr-1 btn btn-sm btn-default pull-left" style="margin-right:5px;">แก้ไขข้อมูล</a>
													<form  action="{{url('admin/del_header_course/'.$u->id)}}" method="post" onsubmit="return(confirm('Do you want Delete'))">
														<input type="hidden" name="_method" value="post">
														<input type="hidden" class="form-control" name="course_id"  value="{{$courseinfo->id}}" >
														 <input type="hidden" name="_token" value="{{ csrf_token() }}">
														<button type="submit" class="mb-1 mt-1 mr-1 btn btn-sm btn-danger"><i class="fa fa-times "></i> ลบ</button>
													</form>





													<!-- Modal -->
													<div class="modal fade" id="myModal-{{$u->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
														<div class="modal-dialog" role="document">
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																	<h4 class="modal-title" id="myModalLabel">แก้ไข : หัวข้อเนื้อหา video</h4>
																</div>

																<form class="form-horizontal" action="{{url('admin/edit_head_video/'.$u->id)}}" method="post" enctype="multipart/form-data">
																	{{ csrf_field() }}


																<div class="modal-body">
																	<fieldset>
																		<input type="hidden" class="form-control" name="course_id"  value="{{$courseinfo->id}}" >
																		<div class="form-group">
																			<label class="col-md-3 control-label" for="profileFirstName">ชื่อหัวข้อ</label>
																			<div class="col-md-8">
																				<input type="text" class="form-control" name="header_name" value="{{$u->head_name}}">
																				</div>
																		</div>

																	</fieldset>
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
																	<button type="submit" class="btn btn-primary">อัพเดทข้อมูล</button>
																</div>
																	</form>

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


							</div>

				</div>

				</div>

				</div>









						<div class="row">
            <div class="col-md-2 col-lg-2">
            </div>

            <div class="col-md-8 col-lg-8">

            <div class="tabs">

              <div class="tab-content">
                <h4 class="mb-xlg">เพิ่มไฟล์ Course</h4>

								<form class="form-horizontal" action="{{url('add_file_course')}}" method="post" enctype="multipart/form-data">

									{{ csrf_field() }}
									<input type="hidden" class="form-control" name="course_id"  value="{{$courseinfo->id}}" >

									<div class="form-group">
										<label class="col-md-3 control-label" for="profileFirstName">ชื่อไฟล์เอกสาร*</label>
												<div class="col-md-8">
														<input type="text" class="form-control" name="file_of_name" required>
											</div>
									</div>



									<div class="form-group">
										<label class="col-md-3 control-label" for="exampleInputEmail1">แนบ ชื่อไฟล์เอกสาร*</label>
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
																		<input type="file" name="file" required>
																	</span>
																	<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
																</div>
															</div>
														</div>
									</div>







									<div class="panel-footer">
										<div class="row">
											<div class="col-md-9 col-md-offset-3">
												<button type="submit" class="btn btn-primary">เพิ่ม fileคอร์ส</button>
												<button type="reset" class="btn btn-default">Reset</button>
											</div>
										</div>
									</div>

								</form>

                </div>

          </div>

          </div>

          </div>



					<div class="row">
					<div class="col-md-2 col-lg-2">
					</div>

					<div class="col-md-8 col-lg-8">

					<div class="tabs">

						<div class="tab-content">
							<h4 class="mb-xlg">ไฟล์เอกสารการเรียนรู้</h4>

							<div class="table-responsive">
									<table class="table table-striped mb-none">

										<tbody>
											@if($file_course)
			               						 @foreach($file_course as $u)
											<tr>

												<td>{{$u->file_of_name}}</td>
												<td>

													<a href="{{url('admin/get_file_course/'.$u->id)}}" class="mb-1 mt-1 mr-1 btn btn-sm btn-default pull-left" style="margin-right:5px;">download</a>
													<form  action="{{url('admin/del_file_course/'.$u->id)}}" method="post" onsubmit="return(confirm('Do you want Delete'))">
														<input type="hidden" name="_method" value="post">
														<input type="hidden" class="form-control" name="course_id"  value="{{$courseinfo->id}}" >
														 <input type="hidden" name="_token" value="{{ csrf_token() }}">
														<button type="submit" class="mb-1 mt-1 mr-1 btn btn-sm btn-danger"><i class="fa fa-times "></i> ลบ</button>
													</form>
												</td>


											</tr>
											@endforeach
											@endif
										</tbody>
									</table>
								</div>


							</div>

				</div>

				</div>

				</div>





				<div class="row">
				<div class="col-md-2 col-lg-2">
				</div>

				<div class="col-md-8 col-lg-8">

				<div class="tabs">

					<div class="tab-content">
						<h4 class="mb-xlg">เพิ่มไฟล์ Video Example</h4>

						<form id="newsForm121_example" name="add_video_course_example" class="form-horizontal" action="{{url('add_video_course_example')}}" method="post" enctype="multipart/form-data">

							{{ csrf_field() }}
							<input type="hidden" class="form-control" name="course_id1"  value="{{$courseinfo->id}}" >

							<div class="form-group">
								<label class="col-md-3 control-label" for="profileFirstName">ชื่อวีดีโอคอร์ส*</label>
										<div class="col-md-8">
												<input type="text" class="form-control" name="name_video1" required>
									</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="profileFirstName">ความยาววีดีโอ*</label>
										<div class="col-md-8">
												<input type="text" class="form-control" name="time_video1" placeholder="30.25">
									</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="profileFirstName">คำอธิบายวีดีโอคอร์ส*</label>
										<div class="col-md-8">
												<textarea class="form-control" name="course_video_detail1" rows="3"></textarea>
									</div>
							</div>



							<div class="form-group">
								<label class="col-md-3 control-label" for="exampleInputEmail1">code วีดีโอคอร์ส*</label>
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
															<input type="file" name="file1" required>
														</span>
														<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
													</div>
												</div>
												</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label" for="exampleInputEmail1">รูป วีดีโอคอร์ส*</label>
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
															<input type="file" name="image1" required>
														</span>
														<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
													</div>
												</div>
												</div>
							</div>







							<div class="panel-footer">
								<div class="row">
									<div class="col-md-9 col-md-offset-3">
										<button type="submit" class="btn btn-primary">เพิ่มวิดีโอคอร์ส</button>
										<button type="reset" class="btn btn-default">Reset</button>
									</div>
								</div>
							</div>

						</form>

						</div>

			</div>

			</div>

			</div>





			<div class="row">
			<div class="col-md-2 col-lg-2">
			</div>

			<div class="col-md-8 col-lg-8">

			<div class="tabs" id="video_set">

				<div class="tab-content">
					<h4 class="mb-xlg">จัดการไฟล์ Video Example ทั้งหมด..</h4>

					<div class="table-responsive">
							<table class="table table-striped mb-none">

								<tbody>
									@if(isset($video_list_ex))
														 @foreach($video_list_ex as $video_lists)
									<tr>
										<td><img class="img-responsive" src="{{url('web_stream/thumbnail_video/'.$video_lists->thumbnail_img)}}" alt="{{$video_lists->course_video_name}}" style="height:45px;"></td>
										<td>{{$video_lists->time_video}} นาที</td>
										<td style="text-align: left">{{$video_lists->course_video_name}}

										</td>
										<td>
											<a style="float:left; margin:3px;" class="btn btn-primary btn-xs" href="{{url('video_course_edit2/'.$video_lists->id)}}" role="button"><i class="fa fa-wrench"></i> </a>
											<form  action="{{url('admin/del_video2/'.$video_lists->id)}}" method="post" onsubmit="return(confirm('Do you want Delete'))">
												<input type="hidden" name="_method" value="post">
												<input type="hidden" class="form-control" name="course_id"  value="{{$courseinfo->id}}" >
												 <input type="hidden" name="_token" value="{{ csrf_token() }}">
												<button type="submit" style="float:left; margin:3px;" class="btn btn-danger btn-xs"><i class="fa fa-times "></i></button>
											</form>
										</td>

									</tr>
									@endforeach
									@endif
								</tbody>
							</table>
						</div>



					</div>

		</div>

		</div>

		</div>





















						<div class="row">
            <div class="col-md-2 col-lg-2">
            </div>

            <div class="col-md-8 col-lg-8">

            <div class="tabs">

              <div class="tab-content">
                <h4 class="mb-xlg">เพิ่มไฟล์ Video</h4>

								<form id="newsForm121" class="form-horizontal" action="{{url('add_video_course')}}" method="post" enctype="multipart/form-data">

									{{ csrf_field() }}
									<input type="hidden" class="form-control" name="course_id"  value="{{$courseinfo->id}}" >

									<div class="form-group">
										<label class="col-md-3 control-label" for="profileFirstName">ชื่อวีดีโอคอร์ส*</label>
												<div class="col-md-8">
														<input type="text" class="form-control" name="name_video" required>
											</div>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label" for="profileFirstName">หัวข้อของ Video*</label>
										<div class="col-md-8">
											<select name="head_id" class="form-control mb-md" required>

																<option value="">-- เลือกหัวข้อของ --</option>
																@foreach($head_videos as $u)
																<option value="{{$u->id}}">{{$u->head_name}}</option>
																@endforeach
											 </select>
											</div>
									</div>



									<div class="form-group">
										<label class="col-md-3 control-label" for="profileFirstName">ความยาววีดีโอ*</label>
												<div class="col-md-8">
														<input type="text" class="form-control" name="time_video" placeholder="30.25">
											</div>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label" for="profileFirstName">คำอธิบายวีดีโอคอร์ส*</label>
												<div class="col-md-8">
														<textarea class="form-control" name="course_video_detail" rows="3"></textarea>
											</div>
									</div>



									<div class="form-group">
										<label class="col-md-3 control-label" for="exampleInputEmail1">code วีดีโอคอร์ส*</label>
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
																	<input type="file" name="file" >
																</span>
																<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
															</div>
														</div>
														</div>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label" for="exampleInputEmail1">รูป วีดีโอคอร์ส ถ้าไม่มี Video ก็ไม่ต้องใส่</label>
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







									<div class="panel-footer">
										<div class="row">
											<div class="col-md-9 col-md-offset-3">
												<button type="submit" class="btn btn-primary">เพิ่มวิดีโอคอร์ส</button>
												<button type="reset" class="btn btn-default">Reset</button>
											</div>
										</div>
									</div>

								</form>

                </div>

          </div>

          </div>

          </div>
















					<div class="row">
					<div class="col-md-2 col-lg-2">
					</div>

					<div class="col-md-8 col-lg-8">

					<div class="tabs">

						<div class="tab-content">
							<h4 class="mb-xlg">ไฟล์ Video ทั้งหมด</h4>

<form id="dd-form" action="{{url('admin/updatesort_video/'.$courseinfo->id)}}" method="post">
	{{ csrf_field() }}
							<div class="dd" id="nestable">
							<ol class="dd-list">
								@if($video_list)
               						 @foreach($video_list as $video_lists)
								<li class="dd-item" data-id="{{ $video_lists->id }}">
									<div class="dd-handle row mar-top">
										{{$video_lists->course_video_name}}
									</div>
								</li>
								@endforeach
										 @endif
							</ol>

							<br>
							<input type="hidden" name="sort_order" id="nestable-output"  />
							<button class="btn btn-default pull-right" type="submit">บันทึกข้อมูล</button>


								</div>
								</form>

							</div>

				</div>

				</div>

				</div>












				<div class="row">
				<div class="col-md-2 col-lg-2">
				</div>

				<div class="col-md-8 col-lg-8">

				<div class="tabs" id="video_set">

					<div class="tab-content">
						<h4 class="mb-xlg">จัดการไฟล์ Video ทั้งหมด..</h4>

						<div class="table-responsive">
								<table class="table table-striped mb-none">

									<tbody>
										@if($video_list)
		               						 @foreach($video_list as $video_lists)
										<tr>
											<td>{{$video_lists->order_sort}}</td>
											<td>{{$video_lists->time_video}} นาที</td>
											<td style="text-align: left">{{$video_lists->course_video_name}}

											</td>
											<td>
												{{$video_lists->name_op}}
											</td>
											<td>
												<a style="float:left; margin:3px;" class="btn btn-primary btn-xs" href="{{url('video_course_edit/'.$video_lists->id)}}" role="button"><i class="fa fa-wrench"></i> </a>
												<form  action="{{url('admin/del_video/'.$video_lists->id)}}" method="post" onsubmit="return(confirm('Do you want Delete'))">
													<input type="hidden" name="_method" value="post">
													<input type="hidden" class="form-control" name="course_id"  value="{{$courseinfo->id}}" >
													 <input type="hidden" name="_token" value="{{ csrf_token() }}">
													<button type="submit" style="float:left; margin:3px;" class="btn btn-danger btn-xs"><i class="fa fa-times "></i></button>
												</form>
											</td>

										</tr>
										@endforeach
										@endif
									</tbody>
								</table>
							</div>



						</div>

			</div>

			</div>

			</div>




















</section>
@stop


@section('scripts')
<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="{{url('./assets/vendor/jquery-nestable/jquery.nestable.js')}}"></script>
<script src="{{url('./assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>
<script src="{{url('js/bootstrap-uploadprogress.js')}}?v5-5"></script>

<script>


</script>


<script>
	$("#newsForm121").uploadprogress({redirect_url: '{{url('admin/course/'.$courseinfo->id.'/edit')}}'});


	//$("#newsForm121").uploadprogress();

$.fn.datepicker.defaults.format = "yyyy-mm-dd";
</script>

@if ($message = Session::get('success_course'))

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

@if ($message = Session::get('success_course_video'))
<script type="text/javascript">
var stack_bar_top = {"dir1": "down", "dir2": "right", "push": "top", "spacing1": 0, "spacing2": 0};
var notice = new PNotify({
      title: 'ยินดีด้วยค่ะ',
      text: '{{$message}}',
      type: 'success',
      addclass: 'stack-bar-top',
      stack: stack_bar_top,
      width: "100%"
    });
</script>
@endif

@if ($message = Session::get('edit_sort_video'))

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

@if ($message = Session::get('add_file_of_course'))

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


@if ($message = Session::get('add_head_video'))

<script type="text/javascript">

  var stack_topleft = {"dir1": "down", "dir2": "right", "push": "top"};
      var notice = new PNotify({
            title: 'ทำการเพิ่มข้อมูล',
            text: '{{$message}}',
            type: 'success',
            addclass: 'stack-topright'
          });
</script>
@endif


@if ($message = Session::get('del_header_course'))

<script type="text/javascript">

  var stack_topleft = {"dir1": "down", "dir2": "right", "push": "top"};
      var notice = new PNotify({
            title: 'ทำการลบข้อมูลสำเร็จ',
            text: '{{$message}}',
            type: 'success',
            addclass: 'stack-topright'
          });
</script>
@endif





@if ($message = Session::get('success_edit_video'))
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

@if ($message = Session::get('delete_video'))
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



<script type="text/javascript">

/*
Name: 			UI Elements / Nestable - Examples
Written by: 	Okler Themes - (http://www.okler.net)
Theme Version: 	1.4.1
*/

(function( $ ) {

	'use strict';

	/*
	Update Output
	*/
	var updateOutput = function (e) {
		var list = e.length ? e : $(e.target),
			output = list.data('output');

		if (window.JSON) {
			output.val(window.JSON.stringify(list.nestable('serialize')));
		} else {
			output.val('JSON browser support required for this demo.');
		}
	};

	/*
	Nestable 1
	*/
	$('#nestable').nestable({
		group: 1
	}).on('change', updateOutput);

	/*
	Output Initial Serialised Data
	*/
	$(function() {
		updateOutput($('#nestable').data('output', $('#nestable-output')));
	});

}).apply(this, [ jQuery ]);
</script>


<!-- include summernote css/js -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>

<script>
      $('#summernote').summernote({
        placeholder: 'Hello stand alone ui',
        tabsize: 2,
        height: 250,
				toolbar: [
    // [groupName, [list of button]]
    ['style', ['bold', 'italic', 'underline', 'clear']],
    ['font', ['strikethrough', 'superscript', 'subscript']],
    ['fontsize', ['fontsize']],
    ['color', ['color']],
    ['para', ['ul', 'ol', 'paragraph']],
    ['height', ['height']]
  ]
      });


    </script>

		<script>

		function getComboB(selectObject) {

			var e = document.getElementById("shipping_optional");
		    value2 = e.options[e.selectedIndex].getAttribute('data-value');

				console.log(value2);
				$.ajax({
		      type: "POST",
		      headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
		      data: { "ship_id" : value2 },
		      url: "{{url('/api/shipping_data_2')}}",
		      success: function(data) {
		          $('#targeted').html(data.data.html);

		      }
		      });

		}


		</script>
@stop('admin.scripts')
