@extends('layouts.admin')

@section('title') Create @stop

@section('content')

<h1>Create Users</h1>

{!! Form::open(['method'=>'POST','action'=>'AdminUserController@store', 'files'=>TRUE]) !!}

<div class="form-group">
{!! Form::label('name', 'Name') !!}
{!! Form::text('name',null, ['class'=>'form-control'])!!}

@error('name')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
</div>

<div class="form-group">
    {!! Form::label('email', 'Email') !!}
    {!! Form::email('email', null, ['class'=>'form-control'])!!}

@error('email')
<div class="alert alert-danger">{{ $message }}</div>
@enderror    
</div>

<div class="form-group">
    {!! Form::label('password', 'Password') !!}
    {!! Form::password('password', ['class'=>'form-control'])!!}

@error('password')
<div class="alert alert-danger">{{ $message }}</div>
@enderror    
</div>

<div class="form-group">
    {!! Form::label('photo_id', 'Attachment') !!}
    {!! Form::file('photo_id', ['class'=>'form-control'])!!}

@error('photo_id')
<div class="alert alert-danger">{{ $message }}</div>
@enderror    
</div>

<div class="row">
<div class="form-group col-md-6">
    {!! Form::label('status', 'Status') !!}
    {!! Form::select('is_active', ['1' => 'Active', '0' => 'Inactive'], 0 , ['class'=> 'form-control', 'placeholder' => 'Select status...'])!!}


</div>

<div class="col-md-6">
    {!! Form::label('role_id', 'Role') !!}
    {!! Form::select('role_id', ['1' => 'Admin', '2' => 'Subscriber'], null, ['class'=> 'form-control','placeholder' => 'Select role...'])!!}

@error('role_id')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
</div>

</div>


<div class="form-group">
    {!! Form::submit('Create User',['class'=>'btn btn-primary']) !!}
</div>


{!! Form::close() !!}


{{-- @include('includes.error');  --}}

@endsection