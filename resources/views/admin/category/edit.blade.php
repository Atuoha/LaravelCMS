@extends('layouts.admin')

@section('title') Edit @stop

@section('content') 

<h1>Edit Category</h1>


{!! Form::model($category, ['method'=>'PUT', 'action'=>['CatController@update', $category->id] ]) !!}

<div class="row">
    <div class="col-md-12">
        {!! Form::label('name', 'Category Name') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}

        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="row  pull-right">
    {!! Form::submit('Edit post', ['class'=>'btn btn-success' ]) !!}
</div>

{!! Form::close() !!}

@stop