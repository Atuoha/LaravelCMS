@extends('layouts.admin')

@section('title') User View @endsection


@section('content')
@if($user)

    <div style="float:right">
   <img class="img-rounded" width="100" src="{{$user->photo != '' ? $user->photo->name : '/images/default.png'}}" alt="">
   <h4>User: {{ $user->name }}</h4>
   </div>

<br>
    <table class="table table table-responsive table-bordered table-striped table-hover">
        <tbody>
            <tr>
                <th>Id</th>
                <td>{{ $user->id }}</td>
            </tr>    
            
                <tr>
                <th>Name</th>
                <td>{{ $user->name }}</td>
                </tr>

                <tr>   
                <th>Email</th>
                <td>{{ $user->email }}</td>
                </tr>

                <tr>
                <th>Role</th>
                <td>{{ $user->role != '' ? $user->role->name : 'User has no role' }}</td>
                </tr>

                <tr>
                <th>Active</th>
                <td> {{$user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
                </tr>

                <tr>
                <th>Created</th>
                <td>{{ $user->created_at->diffForHumans() }}</td>
                </tr>

                <tr>
                <th>Last Update</th>
                <td>{{ $user->updated_at->diffForHumans() }}</td>
                </tr>

                <tr>
                <th>Delete Action</th>
                <td>
                    {!! Form::open(['method'=>'DELETE', 'action'=>['AdminUserController@destroy', $user->id] ]) !!}

                        {!! Form::submit('Delete User',['class'=>'btn btn-danger']) !!}

                    {!! Form::close() !!}
                </td>
                </tr>  

                <tr>
                <th>Edit User</th>
                <td><a class="btn btn-primary" href="{{ route('edit', $user->id)}}">Edit User</a></td>
                </tr>


        <tbody>
    </table>
    
 @endif
    

@endsection