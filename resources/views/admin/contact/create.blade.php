@extends('admin.admin_master')

@section('admin')
<div class="col-lg-12">
<div class="card card-default">
										<div class="card-header card-header-border-bottom">
											<h2>Create Admin Contact</h2>
										</div>
										<div class="card-body">
                                            <form action="{{route('store.admincontact')}}" method="POST" enctype="multipart/form-data">
                                                @csrf
												<div class="form-group">
													<label for="exampleFormControlInput1">Contact Email</label>
													<input type="text" class="form-control" name="email" id="exampleFormControlInput1" placeholder="Contact Email">
												</div>
												
												
												<div class="form-group">
													<label for="exampleFormControlTextarea1">Contact Phone</label>
													<textarea class="form-control" id="exampleFormControlTextarea1" name="phone" rows="3" placeholder="Contact Phone"></textarea>
												</div>

                                                <div class="form-group">
													<label for="exampleFormControlTextarea1">Contact Address</label>
													<textarea class="form-control" id="exampleFormControlTextarea1" name="address" rows="3" placeholder="Contact Address"></textarea>
												</div>
												
												<div class="form-footer pt-4 pt-5 mt-4 border-top">
													<button type="submit" class="btn btn-primary btn-default">Submit</button>
												</div>
											</form>
										</div>
									</div>

									




@endsection