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

											<h4 class="mb-xlg">แก้ไขหมวดหมู่ย่อย</h4>

											<fieldset>
                        <div class="form-group">
													<label class="col-md-3 control-label" for="profileFirstName">หมวดหมู่ย่อย*</label>
													<div class="col-md-8">
														<input type="text" class="form-control" name="name_sub_depart" value="{{ $objs->name_sub_depart }}" >
														</div>
												</div>

                        <div class="form-group">
													<label class="col-md-3 control-label" for="profileFirstName">หมวดหมู่หลัก*</label>
													<div class="col-md-8">
                            <select name="id_depart" class="form-control mb-md" required>

								                      <option value="">-- เลือกหมวดหมู่หลัก --</option>
								                      @foreach($depart as $u)
													  <option value="{{$u->id}}" @if( $u->id == $objs->id_depart)
                              selected='selected'
                              @endif>{{$u->name_department}}</option>
													  @endforeach
								                    </select>
														</div>
												</div>

                        <div class="form-group">
													<label class="col-md-3 control-label" for="profileFirstName">ลำดับ*</label>
													<div class="col-md-8">
														<input type="text" class="form-control" name="sub_depart_sort" value="{{ $objs->sub_depart_sort }}" >
														</div>
												</div>

                        <div class="form-group">
													<label class="col-md-3 control-label" for="profileFirstName"></label>
													<div class="col-md-8">
														<img src="{{url('assets/images/sub_de/'.$objs->image_sub_depart)}}" class="img-responsive" />
														</div>
												</div>


											<div class="form-group">
                          <label class="col-md-3 control-label" for="exampleInputEmail1">รูปภาพ (1920 x 450 px)*</label>
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




@stop('scripts')
