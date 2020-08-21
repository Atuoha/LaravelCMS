@extends('layouts.admin')

@section('title') User View @endsection


@section('content')

    <h1>Users</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <td>Capture</td>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Created</th>
                <th>Active</th>


            </tr>
        </thead>

        <tbody>

        @if($users)
        
        @foreach($users as $user)
        <tr>
                <td>{{ $user->id }}</td>
                <td><img width="50" src="{{$user->photo != '' ? $user->photo->name : 'No image'}}" alt=""></td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role != '' ? $user->role->name : 'User has no role' }}</td>
                <td>{{ $user->created_at->diffForHumans() }}</td>
                <td> {{$user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
                <td><a href="{{ route('edit', $user->id)}}">Edit</a></td>

        </tr>
        @endforeach

        @endif
        </tbody>
    </table>
    
    

@endsection