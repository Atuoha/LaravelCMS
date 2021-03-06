@extends('layouts.admin')

@section('title') Edit @stop


@section('content')

<h3>Edit Profile | {{$user->name}} |</h3>

@if(Session::has('updated_user'))

    <div class="alert alert-success">
        {{ session('updated_user') }}
    </div>

@endif

{!! Form::model($user,['method'=>'PUT','action'=>['AdminUserController@update', $user->id], 'files'=>TRUE]) !!}


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

    
</div>

<div class="row">
<div class="col-md-6 col-12">
<div class="form-group">
    {!! Form::label('photo_id', 'Attachment') !!}
    {!! Form::file('photo_id', ['class'=>'form-control'])!!}
  
</div>
</div>

<div class="col-md-6 col-12">
    <img class="img-circle img-responsive" src="{{ $user->photo ? $user->photo->name : '/images/default.png' }}" width="100">
</div>
</div>

<div class="row">
<div class="form-group col-md-6">
    {!! Form::label('status', 'Status') !!}
    {!! Form::select('is_active', ['1' => 'Active', '0' => 'Inactive'], null , ['class'=> 'form-control', 'placeholder' => 'Select status...'])!!}

</div>

<div class="col-md-6">
    {!! Form::label('role_id', 'Role') !!}
    {!! Form::select('role_id', ['' => 'Select Role'] +$role, null, ['class'=> 'form-control'])!!}

@error('role_id')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
</div>

</div>


<div class="form-group  mt-2">
    {!! Form::submit('Submit Edit',['class'=>'btn btn-success']) !!}
</div>


{!! Form::close() !!}



@endsection