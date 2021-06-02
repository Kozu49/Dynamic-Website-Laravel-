

<x-app-layout>

<x-slot name="header">
        <h2 class="form-semibold text-xl text-grey-800 leading-tight">
    

        Edit Category <b> </b>
        </h2>
    </x-slot>
    @if(Session::has('success'))

                     <div class="alert alert-danger">{{Session::get('success')}}</div>

    @endif

    <div class="py-12">
    <div class="container"> 
    <div class="row">

        <div class="col-md-8">
        <div class="card">
            <div class="card-header"> Edit Category</div>
                <div class="card-body">
                <form method="post" action="{{route('category.update',$category->id)}}">
                            @csrf
                                <label for="category_form">Category Name</label>
                                <input type="text" name="category_name" id="category_form" class="form-control" value="{{$category->category_name}}">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>

                


            </div>
            </div>
            </div>
        </div>
    </div>
    </div>
    </div>            
                    

                    

</x-app-layout>




