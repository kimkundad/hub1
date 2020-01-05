@extends('admin.layouts.template')

@section('admin.stylesheet')

<link rel="stylesheet" href="{{asset('./assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css')}}">

@stop('admin.stylesheet')

@section('admin.content')

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

										<form id="newsForm" class="form-horizontal" action="{{$url}}" method="post" enctype="multipart/form-data">
                      {{ method_field($method) }}
											{{ csrf_field() }}

											<h4 class="mb-xlg">ใส่ข้อมูลคอร์ส</h4>

											<fieldset>

                        <div class="form-group">
													<label class="col-md-3 control-label" for="profileFirstName">ชื่อคอร์ส*</label>
													<div class="col-md-8">
														<input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="มินนะ โนะ นิฮงโกะ みんなの日本語 かんじ N5+N4">
													</div>
												</div>

												<div class="form-group">
													<label class="col-md-3 control-label" for="profileFirstName">ลำดับ (ใส่ไม่ใส่ก็ได้)</label>
													<div class="col-md-8">
														<input type="text" class="form-control" name="sort_corse" value="{{ old('sort_corse') }}">
														</div>
												</div>



												<div class="form-group">
													<label class="col-md-3 control-label" for="profileAddress">หมวดหมู่หลัก*</label>
													<div class="col-md-8">
														<select name="name_department" onchange="getComboB(this)" id="shipping_optional" class="form-control mb-md" required>

								                      <option value="">-- หมวดหมู่หลัก --</option>
								                      @foreach($department as $departments)
													  <option value="{{$departments->id}}" data-value="{{$departments->id}}">{{$departments->name_department}}</option>
													  @endforeach
								                    </select>
													</div>
												</div>

												<div class="form-group">
													<label class="col-md-3 control-label" for="profileAddress">หมวดหมู่รอง*</label>
													<div class="col-md-8">
														<select name="typecourses" class="form-control mb-md" id="targeted" required>


								                    </select>
													</div>
												</div>




												<div class="form-group">
													<label class="col-md-3 control-label" for="profileAddress">ระบบคอร์ส เติมเงิน / รายเดือน*</label>
													<div class="col-md-8">
														<select name="set_type_c" class="form-control mb-md" required>
															  <option value="0">-- เติมเงิน --</option>
																  <option value="1">-- รายเดือน --</option>
								                    </select>
													</div>
												</div>


												<div class="form-group">
													<label class="col-md-3 control-label" for="profileFirstName">เอกสารการเรียน</label>
													<div class="col-md-8">
														<input type="text" class="form-control" name="file_study" value="{{ old('file_study') }}" placeholder="ข้อมูลเอกสารการเรียน">
													</div>
												</div>


												<div class="form-group">
													<label class="col-md-3 control-label" for="profileFirstName">อาจารย์ผู้สอน</label>
													<div class="col-md-8">


														<select name="te_study"  class="form-control mb-md" required>

								                      <option value="">-- เลือกอาจารย์ผู้สอน --</option>
								                      @foreach($teacher as $tea)
																		  <option value="{{$tea->id}}" data-value="{{$tea->id}}">{{$tea->te_name}}</option>
																		  @endforeach
								                    </select>

													</div>
												</div>








										<div class="form-group">
												<label class="col-md-3 control-label" for="profileFirstName">รหัสคอร์ส*</label>
														<div class="col-md-8">
																<input type="text" class="form-control" name="code_course" value="{{ old('code_course') }}" placeholder="EN101">
														</div>
										</div>

                      <div class="form-group">
                        <label class="col-md-3 control-label" for="profileFirstName">ราคาคอร์ส* (ไม่มีให้ใส่ 0)</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="price" value="{{ old('price') }}" placeholder="1500">
                          </div>
                      </div>


											<div class="form-group">
                        <label class="col-md-3 control-label" for="profileFirstName">ราคาส่วนลด* (ไม่มีให้ใส่ 0)</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="discount" value="{{ old('discount') }}" placeholder="500">
                          </div>
                      </div>

											<div class="form-group">
                        <label class="col-md-3 control-label" for="profileFirstName">อัตราการสูญเสีย ดู video* (ไม่มีให้ใส่ 0)</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="del_video" value="{{ old('del_video') }}" placeholder="1.75">
                          </div>
                      </div>

											<div class="form-group row">
												<label for="tags-input" class="col-lg-3 control-label text-lg-right pt-2">Input Tags</label>
												<div class="col-lg-8">
													<input name="tags" id="tags-input"  data-role="tagsinput" data-tag-class="badge badge-primary" value="{{ old('tags') }}" class="form-control"  />
													<p>
														กดเครื่องหมาย <code>" , "</code> เพื่อทำการเพิ่ม Tags
													</p>
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
                            <textarea class="form-control" name="detail" id="summernote" rows="4">{{ old('detail') }}</textarea>
													</div>
												</div>



												<div class="form-group">
	                        <label class="col-md-3 control-label" for="profileFirstName">เวลาที่ให้ (จำนวนวัน)</label>
	                            <div class="col-md-8">
																	<input type="text" class="form-control" name="time_course" value="{{ old('time_course') }}" placeholder="30">
	                          </div>
	                      </div>





											</fieldset>







											<div class="panel-footer">
												<div class="row">
													<div class="col-md-9 col-md-offset-3">
														<button type="submit" class="btn btn-primary">เพิ่มคอร์ส</button>
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

</section>
@stop


@section('scripts')


<script src="{{url('./assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>
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
<script>
$.fn.datepicker.defaults.format = "yyyy-mm-dd";
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

@stop('admin.scripts')
