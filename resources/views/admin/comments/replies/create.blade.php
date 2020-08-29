@extends('layouts.admin')

@section('title') Replies @stop


@section('content')
<h2>Comment: {{ $comment->body }}</h2>
<div class="well">
                   
    <h4>Leave a Reply:</h4>
    {!! Form::open(['method'=>'POST', 'action'=>'CommentRepliesController@store']) !!}           
        <div class="form-group">
            {!! Form::label('comment', 'Reply') !!}
            {!! Form::textarea('reply', null, ['class'=>'form-control', 'row'=>3]) !!}

            <input type="hidden" name="comment_id" value="{{ $comment->id }}">

            @error('reply')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        {!! Form::submit('Sumbit', ['class'=>'btn btn-primary']) !!}

    {!! Form::close() !!}      
</div>


@stop