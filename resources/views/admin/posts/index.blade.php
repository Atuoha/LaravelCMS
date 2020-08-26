@extends('layouts.admin')


@section('title') Posts @stop

@section('content')

<h1>All Posts</h1>

@if(session('created_post'))
    <div class="alert alert-success">{{ session('created_post') }}</div>
@endif


@if(session('deleted_post'))
    <div class="alert alert-danger">{{ session('deleted_post') }}</div>
@endif



<a class="btn btn-success" href="{{ route('posts.create') }}"> Create New Post </a>
<br>
<br>
@if($posts)

    <table class="table table-responsive table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th>Id</th>
                <th>Capture</th>
               <th>Category</th> 
                <th>Title</th>
                <th>Body</th>
                <th>Author</th>
                <th>Status</th>
                <th>Created</th>
                <th>Last Update</th>
                <th>Action</th>



            </tr>
        </thead>

        <tbody>

        
        @foreach($posts as $post)
        <tr>
                <td>{{ $post->id }}</td>
                <td><img class="img-rounded" width="100" src="{{$post->photo != '' ?  $post->photo->name : '/images/default.png'}}" alt=""></td>
               <td> {{$post->category_id == 0 ? 'No Category' : $post->category->name}}</td> 
                <td>{{ $post->title }}</td>
            
                <td>{{ $post->body }}</td>
                <td>{{ $post->user != '' ? $post->user->name : 'Post has no author' }}</td>
                <td> {{$post->status == 1 ? 'Active' : 'Not Active'}}</td>
                <td>{{ $post->created_at->diffForHumans() }}</td>
                <td>{{ $post->updated_at->diffForHumans() }}</td>
                <td><a class="btn btn-primary" href="{{ route('posts.edit', $post->id)}}">Edit</a></td>
                <td><a class="btn btn-success" href="{{ route('posts.show', $post->id)}}">View</a></td>

               
        </tr>
        @endforeach

        @endif
        </tbody>
    </table>
    


@stop