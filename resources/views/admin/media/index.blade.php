@extends('layouts.admin')

@section('title') Media @stop 

@section('content')

@if(session('upload_img'))

<div class="alert alert-success">{{ session('upload_img')}}</div>

@endif

@if(session('del_img'))

<div class="alert alert-danger">{{ session('del_img')}}</div>

@endif
 
        <h1>All Image Uploads</h1>

    @if($photos)

    <a class="btn btn-success" href="{{ route('media.create') }}"> Upload a new image </a>
    <br>
    <br>
    <table class="table table-responsive table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th>Id</th>
                <th>Capture</th>
                <th>Created</th>
                <th>Action</th>



            </tr>
        </thead>

        <tbody>

        @foreach($photos as $photo)
            <tr>
            <td>{{ $photo->id }}</td>
            <td><img width="100" src="{{ $photo->name}}"></td>
            <td>{{ $photo->created_at->diffForHumans() }}</td>
            <td>
                {!! Form::open(['method'=>'DELETE', 'action'=>['MediaController@destroy', $photo->id] ]) !!}
                    {!! Form::submit('Delete Capture', ['class'=>'btn btn-danger']) !!}
                {!! Form::close() !!}
            </td>
            </tr>
        @endforeach


    @endif

    

@stop 