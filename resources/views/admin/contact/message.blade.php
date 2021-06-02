@extends('admin.admin_master')

@section('admin')
@if(Session::has('success'))

                <div class="alert alert-danger">{{Session::get('success')}}
                </div> 


                @endif   
      
        <div class="py-12">
  
            <div class="container">
                <div class="row">
                   
                    <h1>Admin Message</h1>
                    <!-- <a href="{{route('add.contact')}}"><button class="btn btn-primary">Add Contact</button></a> -->
                    <div class="col-md-12">
                       
                        <div class="card">
                            <div class="card-header"> Admin Message </div>
                                <div class="card-body">

                                    <table class="table">
                                    <thead>
                                    <tr>
                                    <th scope="col">SN</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Message</th>
                                    <th scope="col">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($messages as $message)
                                    <tr>
                                    <td>{{$message->id}}</td>
                                    <td>{{$message->name}}</td>
                                    <td>{{$message->email}}</td>
                                    <td>{{$message->subject}}</td>
                                    <td>{{$message->message}}</td>
                                    <td>
                                            <a href="{{route('admin.message.delete',$message->id)}}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</a>



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
