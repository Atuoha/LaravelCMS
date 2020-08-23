@extends('layouts.admin')

@section('title') User View @endsection


@section('content')

    <h1>All Users</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Capture</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Active</th>
                <th>Created</th>
                <th>Last Update</th>
                <th>Action</th>



            </tr>
        </thead>

        <tbody>

        @if($users)
        
        @foreach($users as $user)
        <tr>
                <td>{{ $user->id }}</td>
                <td><img class="img-circle" width="100" src="{{$user->photo != '' ? $user->photo->name : '/images/default.png'}}" alt=""></td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role != '' ? $user->role->name : 'User has no role' }}</td>
                <td> {{$user->is_admin == 1 ? 'Active' : 'Not Active'}}</td>
                <td>{{ $user->created_at->diffForHumans() }}</td>
                <td>{{ $user->updated_at->diffForHumans() }}</td>
                <td><a class="btn btn-primary" href="{{ route('edit', $user->id)}}">Edit</a></td>
               
        </tr>
        @endforeach

        @endif
        </tbody>
    </table>
    
    

@endsection