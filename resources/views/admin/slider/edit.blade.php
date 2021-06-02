@extends('admin.admin_master')

@section('admin')

    @if(Session::has('success'))

        <div class="alert alert-danger">{{Session::get('success')}}</div> 
    

    @endif

    <div class="col-lg-12">
<div class="card card-default">
										<div class="card-header card-header-border-bottom">
											<h2>Update Slider</h2>
										</div>
										<div class="card-body">
                                            <form action="{{route('slider.update',$slider->id)}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="old_image" value="{{$slider->image}}">
												<div class="form-group">
													<label for="exampleFormControlInput1">Slider Title</label>
													<input type="text" class="form-control" value="{{$slider->title}}" name="title" id="exampleFormControlInput1" placeholder="Slider Title">
												</div>
												
												
												<div class="form-group">
													<label for="exampleFormControlTextarea1">Descriptions</label>
													<textarea class="form-control"  id="exampleFormControlTextarea1" name="description" rows="3" >{{$slider->description}}</textarea>
												</div>
												<div class="form-group">
													<label for="exampleFormControlFile1">Slider Image</label>
													<input type="file" name="image" class="form-control-file" value="{{$slider->image}}" id="exampleFormControlFile1">
												</div>
                                                
                                                <div class="form-group">
                                                <img src="{{asset($slider->image)}}" style="width:300px;height:250px" >
                    
                                                </div>

												<div class="form-footer pt-4 pt-5 mt-4 border-top">
													<button type="submit" class="btn btn-primary btn-default">Update</button>
												</div>
											</form>
										</div>
									</div>









@endsection