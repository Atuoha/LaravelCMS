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
               <th>Category</th> 
               <th>Capture</th>
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
                <td>{{ $post->category == "" ? "Uncategorized" : $post->category->name }}</td>
                <td><img class="img-rounded" width="100" src="{{$post->photo != '' ?  $post->photo->name : '/images/default.png'}}" alt=""></td>
                <td>{{ Str::title($post->title)  }}</td>
                <td>{{ Str::limit($post->body, 30)  }}</td>
                <td>{{ $post->user->name }}</td>
                <td> {{$post->status == 1 ? 'Active' : 'Not Active'}}</td>
                <td>{{ $post->created_at->diffForHumans() }}</td>
                <td>{{ $post->updated_at->diffForHumans() }}</td>
                <td><a class="btn btn-primary" href="{{ route('posts.edit', $post->slug)}}">Edit</a></td>
                <td><a class="btn btn-success" href="{{ route('posts.show', $post->slug)}}">View</a></td>
                <td>
                    {!! Form::open(['method'=>'DELETE', 'action'=>['PostController@destroy', $post->id] ]) !!}

                        {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}

                    {!! Form::close() !!}
                </td>
                <td><a href="{{ route('home.post', $post->slug) }}">View Post</td>
                <td><a href="{{ route('comments.show', $post->id) }}">Comments</td>


               
        </tr>
        @endforeach

        @endif
        </tbody>
    </table>

    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">
            {{ $posts->render() }}
        </div>
    </div>
    


@stop