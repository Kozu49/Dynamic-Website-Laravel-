@if(session('category'))
      <div class="alert alert-success">{{session('category')}}</div>

    @endif
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Hi.. {{ auth()->user()->name }}
        </h2>
    </x-slot>

        
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container">
                <div class="row">
                    <div class="col-md-10">

                        <div class="card">
                            <div class="card-header"> Users</div>
                                <div class="card-body">

                                    <table class="table">
                                    <thead>
                                    <tr>
                                    <th scope="col">SN</th>
                                    <th scope="col"> Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Created At</th>
                                    
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    @if($user->created_at)
                                    <td>{{$user->created_at->diffForHumans()}}</td>
                                    @endif
                                                         
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
    </div>        

            

</x-app-layout>
