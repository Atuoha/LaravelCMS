@extends('layouts.admin')

@section('title') Comments @stop


@section('content')

<h1>All Comments</h1>

@if(session('comment_update'))
    <div class="alert alert-success">{{ session('comment_update') }}</div>
@endif

@if(session('comment_delete'))
    <div class="alert alert-danger">{{ session('comment_delete') }}</div>
@endif

@if($comments)
<table class="table table-responsive table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th>Id</th>
               <th>Author</th> 
               <th>Capture</th>
                <th>Email</th>
                <th>Post</th>
                <th>Comment</th>
                <th>Status</th>
                <th>Created</th>
                <th>Action</th>
            </tr>
        </thead>

        @foreach($comments as $comment)
            <tr>
                <td>{{ $comment->id }}</td>
                <td>{{ $comment->author }}</td>
                <td><img width="50" class="img-rounded" src="{{ $comment->photo }}"></td>
                <td>{{ $comment->email }}</td>
                <td>{{ $comment->post->title }}</td>
                <td>{{ $comment->body }}</td>
                <td>{{ $comment->is_active == 1 ? 'Active' : 'InActive' }}</td>
                <td>{{ $comment->created_at->diffForHumans() }}</td>

                <td>
                    {!! Form::open(['method'=>'DELETE', 'action'=>['PostCommentController@destroy', $comment->id] ]) !!}
                        {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>

                @if($comment->is_active == 0)
                <td>
                    {!! Form::open(['method'=>'PUT', 'action'=>['PostCommentController@update', $comment->id] ]) !!}
                        {!! Form::submit('Approve', ['class'=>'btn btn-success']) !!}
                        <input type="hidden" name="is_active" value="1">
                    {!! Form::close() !!}
                </td>
                @endif

                @if($comment->is_active == 1)

                <td>
                    {!! Form::open(['method'=>'PUT', 'action'=>['PostCommentController@update', $comment->id] ]) !!}
                        {!! Form::submit('Unapprove', ['class'=>'btn btn-info']) !!}
                        <input type="hidden" name="is_active" value="0">
                    {!! Form::close() !!}
                </td>
                @endif

                <td><a class="btn btn-secondary" href="{{ route('replies.show', $comment->id) }}">Reply</td>
                <td><a class="btn btn-secondary" href="{{ route('comment.replies', $comment->id) }}">Replies</td>
                <td><a class="btn btn-secondary" href="{{ route('home.post', $comment->post->id) }}">View Post</td>



                


            </tr>
        @endforeach
        <tbody>
@endif

@stop