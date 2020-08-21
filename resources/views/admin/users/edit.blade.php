@extends('layouts.admin')

@section('title') Edit @stop


@section('content')

<h1>Edit Users</h1>

{!! Form::model($user,['method'=>'PATCH','action'=>['AdminUserController@update', $user->id], 'files'=>TRUE]) !!}

<input name="_method" type="hidden" value="PUT">

<div class="form-group">
{!! Form::label('name', 'Name') !!}
{!! Form::text('name',null, ['class'=>'form-control'])!!}
</div>

<div class="form-group">
    {!! Form::label('email', 'Email') !!}
    {!! Form::email('email', null, ['class'=>'form-control'])!!}
</div>

<div class="form-group">
    {!! Form::label('password', 'Password') !!}
    {!! Form::password('password', null, ['class'=>'form-control'])!!}
</div>

<div class="form-group">
    {!! Form::label('photo_id', 'Attachment') !!}
    {!! Form::file('photo_id', ['class'=>'form-control'])!!}
</div>

<div class="row">
<div class="form-group col-md-6">
    {!! Form::label('status', 'Status') !!}
    {!! Form::select('is_active', ['1' => 'Active', '0' => 'Inactive'], 0 , ['class'=> 'form-control', 'placeholder' => 'Select status...'])!!}
</div>

<div class="col-md-6">
    {!! Form::label('role_id', 'Role') !!}
    {!! Form::select('role_id', ['1' => 'Admin', '0' => 'Subscriber'], null, ['class'=> 'form-control'])!!}
</div>

</div>


<div class="form-group">
    {!! Form::submit('Edit User',['class'=>'btn btn-success']) !!}
</div>


{!! Form::close() !!}


@include('includes.error');

@endsection