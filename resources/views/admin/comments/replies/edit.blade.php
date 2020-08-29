@extends('layouts.admin')

@section('title') Replies @stop


@section('content')
<h2>Old Reply: {{ $reply->reply }}</h2>
<div class="well">
                   
    <h4>Leave a Reply:</h4>
    {!! Form::model($reply, ['method'=>'PUT', 'action'=>['CommentRepliesController@update', $reply->id] ]) !!}           
        <div class="form-group">
            {!! Form::label('comment', 'Reply') !!}
            {!! Form::textarea('reply', null, ['class'=>'form-control', 'row'=>3]) !!}
            
            @error('reply')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        {!! Form::submit('Sumbit', ['class'=>'btn btn-primary']) !!}

    {!! Form::close() !!}      
</div>


@stop