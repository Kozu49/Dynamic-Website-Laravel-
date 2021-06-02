@extends('admin.admin_master')

@section('admin')
      
        <div class="py-12">
  
            <div class="container">
                <div class="row">
                    <a href="{{route('add.contact')}}"><button class="btn btn-primary">Add Contact</button></a>
                    <div class="col-md-12">
                        @if(Session::has('success'))

                        <div class="alert alert-danger">{{Session::get('success')}}
                        </div> 
        

                        @endif
                        <div class="card">
                            <div class="card-header"> All Contact Data </div>
                                <div class="card-body">

                                    <table class="table">
                                    <thead>
                                    <tr>
                                    <th scope="col">SN</th>
                                    <th scope="col">Contact Address</th>
                                    <th scope="col">Contact Email</th>
                                    <th scope="col">Contact Phone</th>
                                    <th scope="col">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($contacts as $contact)
                                    <tr>
                                    <td>{{$contact->id}}</td>
                                    <td>{{$contact->address}}</td>
                                    <td>{{$contact->email}}</td>
                                    <td>{{$contact->phone}}</td>
                                    <td>
                                            <a href="{{route('contact.edit',$contact->id)}}" class="btn btn-info">Edit</a>
                                            <a href="{{route('contact.delete',$contact->id)}}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</a>



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
