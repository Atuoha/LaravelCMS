@extends('layouts.admin')

@section('title') Create @stop

@section('content') 

<h1>Create Category</h1>


{!! Form::open(['method'=>'POST', 'action'=>'CatController@store']) !!}

<div class="row">
    <div class="col-md-12">
        {!! Form::label('name', 'Category Name') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}

        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    
</div>

<div class="row pull-right">
    {!! Form::submit('Create post', ['class'=>'btn btn-success' ]) !!}
</div>

{!! Form::close() !!}

@stop