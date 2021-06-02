@extends('admin.admin_master')

@section('admin')
      
        <div class="py-12">
  
            <div class="container">
                <div class="row">
                    <!-- <h4>Home Slider</h4> <br><br> -->
                    <a href="{{route('add.slider')}}"><button class="btn btn-primary">Add Slider</button></a>
                    <div class="col-md-12">
                        @if(Session::has('success'))

                        <div class="alert alert-danger">{{Session::get('success')}}
                        </div> 
        

                        @endif
                        <div class="card">
                            <div class="card-header"> All Sliders</div>
                                <div class="card-body">

                                    <table class="table">
                                    <thead>
                                    <tr>
                                    <th scope="col">SN</th>
                                    <th scope="col">Slider Title</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sliders as $slider)
                                    <tr>
                                    <td>{{$slider->id}}</td>
                                    <td>{{$slider->title}}</td>
                                    <td>{{$slider->description}}</td>
                                    <td><img src="{{asset($slider->image)}}" style="height:100px;width:100" alt=""></td>
                                   
                                        <td>
                                            <a href="{{route('slider.edit',$slider->id)}}" class="btn btn-info">Edit</a>
                                            <a href="{{route('slider.delete',$slider->id)}}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</a>


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
