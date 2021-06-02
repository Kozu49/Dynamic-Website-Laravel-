@extends('admin.admin_master')

@section('admin')
      
        <div class="py-12">
  
            <div class="container">
                <div class="row">
                    <!-- <h4>Home Slider</h4> <br><br> -->
                    <a href="{{route('add.service')}}"><button class="btn btn-primary">Add Services</button></a>
                    <div class="col-md-12">
                        @if(Session::has('success'))

                        <div class="alert alert-danger">{{Session::get('success')}}
                        </div> 
        

                        @endif
                        <div class="card">
                            <div class="card-header"> All Services</div>
                                <div class="card-body">

                                    <table class="table">
                                    <thead>
                                    <tr>
                                    <th scope="col">SN</th>
                                    <th scope="col">Services Info</th>
                                    <th scope="col">Services Title</th>
                                    <th scope="col">Services Descriptions</th>
                                    <th scope="col">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($services as $service)
                                    <tr>
                                    <td>{{$service->id}}</td>
                                    <td>{{$service->info}}</td>
                                    <td>{{$service->title}}</td>
                                    <td>{{$service->description}}</td>
                                   
                                        <td>
                                            <a href="{{route('service.edit',$service->id)}}" class="btn btn-info">Edit</a>
                                            <a href="{{route('service.delete',$service->id)}}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</a>


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
