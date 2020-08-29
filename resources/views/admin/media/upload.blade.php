@extends('layouts.admin')



@section('footer')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>

@stop')

@section('title') Upload @stop 

@section('content') 

<h1>Upload Capture</h1>

{!! Form::open(['method'=>'POST', 'action'=>'MediaController@store', 'class'=>'dropzone']) !!}



{!! Form::close() !!}

@endsection