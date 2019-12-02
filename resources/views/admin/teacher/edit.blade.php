@extends('admin.layouts.template')
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

											<h4 class="mb-xlg">ใส่ข้อมูลครูผู้สอน</h4>

											<fieldset>
                        <div class="form-group">
													<label class="col-md-3 control-label" for="profileFirstName">ชื่อครูผู้สอน*</label>
													<div class="col-md-8">
														<input type="text" class="form-control" name="te_name" value="{{ $objs->te_name }}" id="profileFirstName">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileFirstName">หมวดหมู่หลัก*</label>
													<div class="col-md-8">
                            <select name="depart_id" class="form-control mb-md" required>

								                      <option value="">-- เลือกหมวดหมู่หลัก --</option>
								                      @foreach($depart as $u)
													  <option value="{{$u->id}}" @if( $u->id == $objs->depart_id)
                              selected='selected'
                              @endif>{{$u->name_department}}</option>
													  @endforeach
								                    </select>
														</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileAddress">เกี่ยวกับครูผู้สอน</label>
													<div class="col-md-8">
														<textarea class="form-control" rows="3" name="te_about" id="profileBio">{{ $objs->te_about }}</textarea>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileFirstName">เบอร์ติดต่อ</label>
													<div class="col-md-8">
														<input type="text" class="form-control" name="te_phone" value="{{ $objs->te_phone }}" id="profileFirstName">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileLastName">อีเมลครูผู้สอน</label>
													<div class="col-md-8">
														<input type="text" class="form-control" name="te_email" value="{{ $objs->te_email }}" id="profileLastName">
													</div>
												</div>
                        <div class="form-group">
													<label class="col-md-3 control-label" for="profileCompany">อายุ*</label>
													<div class="col-md-8">
														<input type="text" class="form-control" name="te_old" value="{{ $objs->te_old }}" id="profileCompany" >
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileCompany">facebook</label>
													<div class="col-md-8">
														<input type="number" class="form-control" name="te_facebook" value="{{ $objs->te_facebook }}" id="profileCompany" >
													</div>
												</div>

												<div class="form-group">
													<label class="col-md-3 control-label" for="profileCompany">Twitter</label>
													<div class="col-md-8">
														<input type="number" class="form-control" name="te_twitter" value="{{ $objs->te_twitter }}" id="profileCompany" >
													</div>
												</div>


												<div class="form-group">
													<label class="col-md-3 control-label" for="profileCompany">Instagram</label>
													<div class="col-md-8">
														<input type="number" class="form-control" name="te_ig" value="{{ $objs->te_ig }}" id="profileCompany" >
													</div>
												</div>


												<div class="form-group">
													<label class="col-md-3 control-label" for="profileCompany">รูปภาพ</label>
													<div class="col-md-8">
														<img src="{{url('assets/images/teachers/'.$objs->te_image)}}" class="img-responsive" />
													</div>
												</div>


                        <div class="form-group">
                          <label class="col-md-3 control-label" for="exampleInputEmail1">รูป Avatar 500 x 500 px*</label>
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
													<label class="col-md-3 control-label" for="profileAddress">Expertise</label>
													<div class="col-md-8">
														<textarea class="form-control" rows="2" name="te_exper" id="summernote">{{ $objs->te_exper }}</textarea>
													</div>
												</div>


												<div class="form-group">
													<label class="col-md-3 control-label" for="profileAddress">Education</label>
													<div class="col-md-8">
														<textarea class="form-control" rows="2" name="te_edu" id="summernote2">{{ $objs->te_edu }}</textarea>
													</div>
												</div>

											</fieldset>








											<div class="panel-footer">
												<div class="row">
													<div class="col-md-9 col-md-offset-3">
														<button type="submit" class="btn btn-primary">Submit</button>
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

<!-- include summernote css/js -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>

<script>
      $('#summernote').summernote({
        placeholder: 'Hello stand alone ui',
        tabsize: 2,
        height: 150,
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

			$('#summernote2').summernote({
        placeholder: 'Hello stand alone ui',
        tabsize: 2,
        height: 150,
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


		@if ($message = Session::get('success'))
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

@stop('scripts')
