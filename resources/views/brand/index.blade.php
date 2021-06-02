<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Brands
        </h2>
    </x-slot>

        
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        @if(Session::has('success'))

                        <div class="alert alert-danger">{{Session::get('success')}}
                        </div> 
        

                        @endif
                        <div class="card">
                            <div class="card-header"> All Brand</div>
                                <div class="card-body">

                                    <table class="table">
                                    <thead>
                                    <tr>
                                    <th scope="col">SN</th>
                                    <th scope="col">Brand Name</th>
                                    <th scope="col">Brand Image</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($brands as $brand)
                                    <tr>
                                    <td>{{$brand->id}}</td>
                                    <td>{{$brand->brand_name}}</td>
                                    <td><img src="{{asset($brand->brand_image)}}" style="height:70px;width:70px" alt=""></td>
                                    <td>
                                    @if($brand->created_at==Null)
                                        <span class="text-danger">No data set</span>
                                        @else
                                        {{$brand->created_at->diffForHumans()}}
                                    @endif
                                        </td>    
                                        <td>
                                            <a href="{{route('brand.edit',$brand->id)}}" class="btn btn-info">Edit</a>
                                            <a href="{{route('brand.delete',$brand->id)}}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</a>

                                        </td>                                                                  
                                    </tr>
                                    @endforeach
                                    </tbody>
                                    </table>
                    
                                
                            </div>
                        </div>
                    
                    </div>
                        
                    <div class='col-md-4'>
                        <div class="card">
                            <div class="card-header"> Add Brand</div>
                                <div class="card-body">
                            
                                        <form method="post" action="{{route('store.brand')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="category_form">Brand Name</label>
                                            <input type="text" name="brand_name" class="form-control" id="category_form">
                                            @error('brand_name')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                            <div class="form-group">
                                            <label for="category_form">Brand Image</label>
                                            <input type="file" name="brand_image" id="category_form" class="form-control">
                                            @error('brand_image')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                            </div>
                                            
                                            
                                            
                                            <button type="submit" class="btn btn-primary">Add Brand</button>
                                        </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
                    

    

</x-app-layout>
