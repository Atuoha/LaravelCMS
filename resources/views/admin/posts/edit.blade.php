@extends('layouts.admin')
@include('includes.tinymce')


@section('title') Edit @stop

@section('content')

<h1>Editing Post</h1>



{!! Form::model($post, ['method'=>'PUT', 'action'=>['PostController@update', $post->id], 'files'=> True]) !!}



<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('title','Title') !!}
            {!! Form::text('title',null,['class'=>'form-control']) !!}

            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('imagery','Imagery') !!}
            {!! Form::file('photo_id',['class'=>'form-control']) !!}

            @error('photo_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        </div>

        <div class="col-md-6">
         <img class="img-rounded img-responsive" src="{{ $post->photo ? $post->photo->name : '/images/default.png' }}" width="100">
        </div>
        </div>
    </div>

</div>


<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('status','Status') !!}
            {!! Form::select('status', ['1' => 'Active', '0' => 'Inactive'], 0 , ['class'=> 'form-control', 'placeholder' => 'Select status...'])!!}
        </div>
    </div>

  

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('Category','Category') !!}
            {!! Form::select('category_id', [''=> 'Select Category'] + $Category, null, ['class'=> 'form-control'])!!}
        </div>

        @error('category_id')
                <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

</div>



<div class="row">
<div class="col-md-12">
        {!! Form::label('body','Body') !!}
        {!! Form::textarea('body',null, ['class'=>'form-control']) !!}

        @error('body')
                <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-6">
        {!! Form::submit('Edit Post', ['class'=>'btn btn-success']) !!}
    </div>
</div>


{!! Form::close() !!}
@stop