@extends('layouts.admin')

@section('title') profile View @endsection


@section('content')
@if($profile)

    <div style="float:right">
   </div>

<br>
<div class="center-algin text-center justify-content-center m-5 mx-auto">
<div class="row">
    <div class="col-md-5">
        <img class="img-rounded" width="250" src="{{$profile->photo != '' ? $profile->photo->name : '/images/default.png'}}" alt="">  
        <h4><b>Profile: {{ $profile->name }} </b></h4>
    </div>

    <div class="col-md-5">
    <table class="table table table-responsive table-bordered table-striped table-hover">
        <tbody>
            <tr>
                <th>Id</th>
                <td>{{ $profile->id }}</td>
            </tr>    
            
                <tr>
                <th>Name</th>
                <td>{{ $profile->name }}</td>
                </tr>

                <tr>   
                <th>Email</th>
                <td>{{ $profile->email }}</td>
                </tr>

                <tr>
                <th>Role</th>
                <td>{{ $profile->role != '' ? $profile->role->name : 'profile has no role' }}</td>
                </tr>

                <tr>
                <th>Active</th>
                <td> {{$profile->is_active == 1 ? 'Active' : 'Not Active'}}</td>
                </tr>

                <tr>
                <th>Created</th>
                <td>{{ $profile->created_at->diffForHumans() }}</td>
                </tr>

                <tr>
                <th>Last Update</th>
                <td>{{ $profile->updated_at->diffForHumans() }}</td>
                </tr>

            

                <tr>
                <th>Edit profile</th>
                <td><a class="btn btn-primary" href="{{ route('admin.profile.edit', $profile->id)}}">Edit profile</a></td>
                </tr>


        <tbody>
     </table>
    </div>
</div>
</div>
    
 @endif
    

@endsection