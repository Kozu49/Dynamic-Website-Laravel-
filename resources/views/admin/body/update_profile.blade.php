@extends('admin.admin_master')

@section('admin')
@if(Session::has('success'))

                <div class="alert alert-danger">{{Session::get('success')}}
                </div> 
                

            @endif

<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>User Profile Update</h2>
    </div>
    <div class="card-body">
        <form method="POST" action="{{route('update.user.profile')}}" class="form-pill" enctype="multipart/form-data">
        @csrf
        <!-- <input type="hidden" name="old_image" value="{{Auth::user()->profile_photo_url}}"> -->
            <div  class="form-group">
                <label for="exampleFormControlInput3">User Name</label>
                <input type="text"  name="name" class="form-control"  value="{{$user->name}}" >
                
            </div>
            <div  class="form-group">
                <label for="exampleFormControlInput3">User Email</label>
                <input type="text"  name="email" class="form-control"  value="{{$user->email}}" >
                
            </div>

            

            <button class="btn btn-primary btn-default" type="submit">Update</button>
            
        </form>
    </div>
</div>




@endsection