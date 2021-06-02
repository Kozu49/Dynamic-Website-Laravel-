@extends('admin.admin_master')

@section('admin')
      
        <div class="py-12">
  
            <div class="container">
                <div class="row">
                    <!-- <h4>Home Slider</h4> <br><br> -->
                    <a href="{{route('add.about')}}"><button class="btn btn-primary">Add About</button></a>
                    <div class="col-md-12">
                        @if(Session::has('success'))

                        <div class="alert alert-danger">{{Session::get('success')}}
                        </div> 
        

                        @endif
                        <div class="card">
                            <div class="card-header">  About Data</div>
                                <div class="card-body">

                                    <table class="table">
                                    <thead>
                                    <tr>
                                    <th scope="col">SN</th>
                                    <th scope="col">About Title</th>
                                    <th scope="col">Short Description</th>
                                    <th scope="col">Long Description</th>
                                    <th scope="col">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($homeabouts as $about)
                                    <tr>
                                    <td>{{$about->id}}</td>
                                    <td>{{$about->title}}</td>
                                    <td>{{$about->short_des}}</td>
                                    <td>{{$about->long_des}}</td>
                                   
                                        <td>
                                            <a href="{{route('about.edit',$about->id)}}" class="btn btn-info">Edit</a>
                                            <a href="{{route('about.delete',$about->id)}}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</a>



                                        </td>                                                                  
                                    </tr>
                                    @endforeach
                                    </tbody>
                                    </table>
                    
                                
                            </div>
                        </div>
                    
                    </div>
                        
                    
                </div>
            
        </div>
    </div>
                    

    @endsection
