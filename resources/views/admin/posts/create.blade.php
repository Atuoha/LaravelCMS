@extends('layouts.admin')


@section('title') Create @stop

@section('content')

<h1>Create Post</h1>



{!! Form::open(['method'=>'POST', 'action'=>'PostController@store', 'files'=> True]) !!}

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
        <div class="form-group">
            {!! Form::label('imagery','Imagery') !!}
            {!! Form::file('photo_id',['class'=>'form-control']) !!}

            @error('photo_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
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
        {!! Form::label('category_id','Category') !!}
            <select class="form-control" name="category_id">
                <option>Select A Category</option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
            </select>

            @error('category_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
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

<div class="row">
    <div class="col-md-6">
        {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}
    </div>
</div>


{!! Form::close() !!}
@stop