@extends('layouts.admin')

@section('title') Replies @stop


@section('content')

<h1>All Replies</h1>

@if(session('reply_created'))
    <div class="alert alert-success">{{ session('reply_created') }}</div>
@endif

@if(session('reply_update'))
    <div class="alert alert-success">{{ session('reply_update') }}</div>
@endif

@if(session('reply_delete'))
    <div class="alert alert-danger">{{ session('reply_delete') }}</div>
@endif

@if($replies)
<table class="table table-responsive table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th>Id</th>
               <th>Author</th> 
               <th>Capture</th>
                <th>Email</th>
                <th>Comment</th>
                <th>Reply</th>
                <th>Status</th>
                <th>Created</th>
                <th>Action</th>
            </tr>
        </thead>

        @foreach($replies as $reply)
            <tr>
                <td>{{ $reply->id }}</td>
                <td>{{ $reply->author }}</td>
                <td><img width="50" class="img-rounded" src="{{ $reply->photo }}"></td>
                <td>{{ $reply->email }}</td>
                <td>{{ $reply->comment->body }}</td>
                <td>{{ $reply->reply }}</td>
                <td>{{ $reply->is_active == 1 ? 'Active' : 'InActive' }}</td>
                <td>{{ $reply->created_at->diffForHumans() }}</td>

                <td>
                    {!! Form::open(['method'=>'DELETE', 'action'=>['CommentRepliesController@destroy', $reply->id] ]) !!}
                        {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>

                @if($reply->is_active == 0)
                <td>
                    {!! Form::open(['method'=>'PUT', 'action'=>['CommentRepliesController@update', $reply->id] ]) !!}
                        {!! Form::submit('Approve', ['class'=>'btn btn-success']) !!}
                        <input type="hidden" name="is_active" value="1">
                    {!! Form::close() !!}
                </td>
                @endif

                @if($reply->is_active == 1)
                <td>
                    {!! Form::open(['method'=>'PUT', 'action'=>['CommentRepliesController@update', $reply->id] ]) !!}
                        {!! Form::submit('Unapprove', ['class'=>'btn btn-info']) !!}
                        <input type="hidden" name="is_active" value="0">
                    {!! Form::close() !!}
                </td>
                @endif


                <td><a class="btn btn-secondary" href="{{ route('replies.edit', $reply->id) }}">Update</td>

            </tr>
        @endforeach
        <tbody>
@endif

@stop