@extends('admin.admin_master')

@section('admin')
<div class="col-lg-12">
<div class="card card-default">
										<div class="card-header card-header-border-bottom">
											<h2>Create Service</h2>
										</div>
										<div class="card-body">
                                            <form action="{{route('service.update',$service->id)}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
													<label for="exampleFormControlTextarea1">Service Information</label>
													<textarea class="form-control" id="exampleFormControlTextarea1" name="info" rows="3">{{$service->info}}</textarea>
												</div>


												<div class="form-group">
													<label for="exampleFormControlInput1">Service Title</label>
													<input type="text" class="form-control" name="title" value="{{$service->title}}" id="exampleFormControlInput1" placeholder="Slider Title">
												</div>
												
												
												<div class="form-group">
													<label for="exampleFormControlTextarea1">Service Descriptions</label>
													<textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3">{{$service->description}}</textarea>
												</div>
												
												<div class="form-footer pt-4 pt-5 mt-4 border-top">
													<button type="submit" class="btn btn-primary btn-default">Submit</button>
												</div>
											</form>
										</div>
									</div>

									




@endsection