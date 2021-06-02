@extends('admin.admin_master')

@section('admin')
<div class="col-lg-12">
<div class="card card-default">
										<div class="card-header card-header-border-bottom">
											<h2>Update About</h2>
										</div>
										<div class="card-body">
                                            <form action="{{route('about.update',$about->id)}}" method="POST" enctype="multipart/form-data">
                                                @csrf
												<div class="form-group">
													<label for="exampleFormControlInput1">About Title</label>
													<input type="text" class="form-control" value="{{$about->title}}" name="title" id="exampleFormControlInput1" placeholder="Slider Title">
												</div>
												
												
												<div class="form-group">
													<label for="exampleFormControlTextarea1">Short Descriptions</label>
													<textarea class="form-control" id="exampleFormControlTextarea1"  name="short_des" rows="3">{{$about->short_des}}</textarea>
												</div>

                                                <div class="form-group">
													<label for="exampleFormControlTextarea1">Long Descriptions</label>
													<textarea class="form-control" id="exampleFormControlTextarea1"  name="long_des" rows="3">{{$about->long_des}}</textarea>
												</div>
												
												<div class="form-footer pt-4 pt-5 mt-4 border-top">
													<button type="submit" class="btn btn-primary btn-default">Update</button>
												</div>
											</form>
										</div>
									</div>

									




@endsection