@if(session('category'))
      <div class="alert alert-success">{{session('category')}}</div>

    @endif
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Category
        </h2>
    </x-slot>

        
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">

                        <div class="card">
                            <div class="card-header"> All Category</div>
                                <div class="card-body">

                                    <table class="table">
                                    <thead>
                                    <tr>
                                    <th scope="col">SN</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">User Id</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $category)
                                    <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->category_name}}</td>
                                    <td>{{$category->user->name}}</td>
                                    @if($category->created_at)
                                    <td>{{$category->created_at->diffForHumans()}}</td>
                                    @endif
                                    <td>
                                    <a href="{{route('category.edit',$category->id)}}" class="btn btn-info">Edit</a>
                                    <a href="{{route('category.delete',$category->id)}}" class="btn btn-danger">Delete</a>




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
                                    <div class="card-header"> Category Name</div>
                                    
                                        <div class="card-body">
                                    
                                   
                                            <form method="post" action="{{route('category.store')}}">
                                             @csrf
                                                <label for="category_form">Category Name</label>
                                                <input type="text" name="category_name" class="form-control"id="category_form">
                                                <button type="submit" class="btn btn-primary">Add category</button>
                                            </form>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                </div>
                <br>
  
                <div class="row">
                    <div class='col-md-9'>
                        <div class="card">
                            <div class="card-header"> Trash Lists</div>
                                <div class="card-body">
                                        <table class="table">
                                    <thead>
                                    <tr>
                                    <th scope="col">SN</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">User Id</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($trashdatas as $trashdata)

                                    <tr>
                                    
                                    <td>{{$trashdata->id}}</td>
                                    <td>{{$trashdata->category_name}}</td>
                                    <td>{{$trashdata->user->name}}</td>
                                    @if($trashdata->created_at)
                                    <td>{{$trashdata->created_at->diffForHumans()}}</td>
                                    @endif
                                    <td>
                                    <a href="{{route('category.restore',$trashdata->id)}}" class="btn btn-info">Restore</a>
                                    <a href="{{route('category.fdelete',$trashdata->id)}}" class="btn btn-danger">Force Delete</a>
                                    </td>   
                                    
                                    @endforeach
                                    </tbody>

                                    </table>


                            
                                </div>
                        
                            </div>
                
                        </div>
                    </div>
        
                </div>
            </div>
        </div>
    </div>        

            

</x-app-layout>
