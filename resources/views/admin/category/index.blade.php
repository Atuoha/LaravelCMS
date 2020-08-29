@extends('layouts.admin')

@section('title') Category @stop

@section('content')

<h1>All Categories</h1>

@if(session('created_cat'))
    <div class="alert alert-success">{{ session('created_cat') }}</div>
@endif

@if(session('updated_cat'))
    <div class="alert alert-success">{{ session('updated_cat') }}</div>
@endif

@if(session('deleted_cat'))
    <div class="alert alert-danger">{{ session('deleted_cat') }}</div>
@endif




<a class="btn btn-primary" href="{{ route('category.create') }}"> Create New Category </a>
<br>
<br>
@if($categories)

    <table class="table table-responsive table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th>Id</th>
               <th>Category Name</th> 
                <th>Created</th>
                <th>Last Update</th>
                <th>Action</th>
            </tr>
        </thead>

        @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name}}</td>
                <td>{{ $category->created_at->diffForHumans() }}</td>
                <td>{{ $category->updated_at->diffForHumans() }}</td>
                <td><a class="btn btn-success" href="{{ route('category.edit', $category->id) }}">Edit</a></td>

                <td>
                    {!! Form::open(['method'=>'DELETE', 'action'=>['CatController@destroy', $category->id] ]) !!}

                    {!! Form::submit('Delete Category', ['class'=>'btn btn-danger']) !!}

                    {!! Form::close() !!}
                </td>
            </tr>



        @endforeach

        <tbody>
</table>


@endif

@stop


